<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // roles is een variadische parameter moet geschreven worden met drie punten

        $user = Auth::user();
        if (!$user) {
            // niet ingelogd
            return redirect()->route('login');
        }

        $userRole = strtolower($user->rolename ?? '');

        if (!in_array($userRole, $roles, true)) {
            abort(403, 'onvoldoende rechten.');
        }


        return $next($request);
    }
}
