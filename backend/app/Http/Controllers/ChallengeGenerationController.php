<?php

namespace App\Http\Controllers;

use App\Services\OllamaChallengeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class ChallengeGenerationController extends Controller
{
    public function __invoke(Request $request, OllamaChallengeService $ollama): JsonResponse
    {
        // Local Ollama generation may take longer while the model loads into memory.
        set_time_limit(300);

        $data = $request->validate([
            'website_url' => ['nullable', 'string', 'url', 'max:2048'],
            'screenshots' => ['nullable', 'array', 'max:3'],
            'screenshots.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $websiteUrl = trim((string) ($data['website_url'] ?? ''));
        $screenshots = $data['screenshots'] ?? [];

        if ($websiteUrl === '' && $screenshots === []) {
            throw ValidationException::withMessages([
                'website_url' => 'Add a public website URL, upload at least one screenshot, or use both.',
            ]);
        }

        if ($websiteUrl !== '') {
            $this->ensurePublicWebsiteUrl($websiteUrl);
        }

        try {
            $websiteContext = '';
            $notice = null;

            if ($websiteUrl !== '') {
                try {
                    $websiteContext = $ollama->inspectWebsite($websiteUrl);
                } catch (RuntimeException $exception) {
                    if ($screenshots === []) {
                        throw $exception;
                    }

                    $notice = 'Ollama could not read the URL, so this draft uses your screenshots only.';
                }
            }

            $challenge = $ollama->generate($websiteUrl, $websiteContext, $screenshots);
        } catch (RuntimeException $exception) {
            $status = str_contains($exception->getMessage(), 'not configured') ? 503 : 502;

            return response()->json(['message' => $exception->getMessage()], $status);
        }

        return response()->json(['challenge' => $challenge, 'notice' => $notice]);
    }

    private function ensurePublicWebsiteUrl(string $url): void
    {
        $parts = parse_url($url);
        $scheme = strtolower((string) ($parts['scheme'] ?? ''));
        $host = strtolower(trim(rtrim((string) ($parts['host'] ?? ''), '.'), '[]'));

        if (! in_array($scheme, ['http', 'https'], true)
            || $host === ''
            || isset($parts['user'])
            || isset($parts['pass'])
            || (isset($parts['port']) && ! in_array((int) $parts['port'], [80, 443], true))) {
            throw ValidationException::withMessages([
                'website_url' => 'Use a complete public HTTP or HTTPS website URL.',
            ]);
        }

        if (filter_var($host, FILTER_VALIDATE_IP)) {
            $isPublicIp = filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);
        } else {
            $isPublicIp = ! in_array($host, ['localhost'], true)
                && str_contains($host, '.')
                && ! preg_match('/\.(?:localhost|local|internal|lan|home\.arpa|test|invalid)$/i', $host);
        }

        if (! $isPublicIp) {
            throw ValidationException::withMessages([
                'website_url' => 'The URL must point to a public website that Ollama can analyze.',
            ]);
        }
    }
}
