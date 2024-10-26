<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('Middleware check: '.auth()->check());
        if (! auth()->check()) {
            return redirect('/')->with('error', 'You need to be authenticated to access this page.');
        }

        return $next($request);
    }
}
