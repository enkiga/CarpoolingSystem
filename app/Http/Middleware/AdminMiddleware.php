<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // Check if the authenticated user has the 'admin' role
            if (auth()->user()->role === 'admin') {
                // If the user has the 'admin' role, proceed with the request
                return $next($request);
            }
        }

        // If the user is not authenticated or doesn't have the 'admin' role, redirect to the welcome page
        return redirect()->route('welcome');
    }
}
