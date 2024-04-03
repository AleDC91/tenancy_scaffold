<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has any of the specified roles
            foreach ($roles as $role) {
                if ($request->user()->hasRole($role)) {
                    return $next($request);
                }
            }
        }

        // Redirect or respond with an error if the user does not have the required role
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
