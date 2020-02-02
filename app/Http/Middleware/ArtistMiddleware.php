<?php

namespace App\Http\Middleware;

use Closure;

class ArtistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role != 'artist')
        {
            return new Response(view('unauthorized')->with('role', 'artist'));
        }
        return $next($request);
    }
}
