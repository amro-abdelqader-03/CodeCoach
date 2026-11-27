<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class EnsureRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $allowedRoles = explode('|', $role);
        $user = $request->user();

        if (! $user || ! in_array($user->role, $allowedRoles, true)) {
            if ($allowedRoles === ['admin']) {
                return redirect()->route('admin.login');
            }

            return redirect()->route('login');
        }
        return $next($request);
    }
}
