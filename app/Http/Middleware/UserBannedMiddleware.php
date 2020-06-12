<?php

namespace App\Http\Middleware;

use Closure;

class UserBannedMiddleware
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
        if(auth()->user()->banned)
        {
            abort(404);
        }
        return $next($request);
    }
    
}
