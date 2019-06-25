<?php

namespace Airtickets\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (!(Auth::check() && Auth::user()->isAdmin()) ) // if user is not authenticated and user is not admin
        {
            return redirect('home')->withErrors('This page is ONLY for administrators');
        }
        return $next($request);
    }
}
