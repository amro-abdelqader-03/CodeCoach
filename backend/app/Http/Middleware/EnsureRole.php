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
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => $user ? 'You are not authorized to access this resource.' : 'Unauthenticated.',
                ], $user ? 403 : 401);
            }

            if ($allowedRoles === ['admin']) {
                return redirect()->route('admin.login');
            }

            return redirect()->route('login');
        }
        return $next($request);
    }
}
