<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Faculty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is a faculty member
        if ($request->user() && $request->user()->is_faculty) {
            return $next($request);
        }

        // If not a faculty member, you can redirect or return a response
        abort(403, 'Access Denied: Only faculty members are allowed.');
    }
}
