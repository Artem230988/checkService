<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if(auth()->user()->role_id == 1)
        {
            abort(404);
        }
        return $next($request);
    }

}
