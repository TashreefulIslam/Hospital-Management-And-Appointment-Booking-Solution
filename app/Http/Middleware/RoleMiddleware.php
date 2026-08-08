<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            if ($role === 'admin') {
                return redirect('/dashboard');
            }

            return redirect('/');
        }

        return $next($request);
    }
}
