<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
{


    public function handle($request, Closure $next)
    {
        if(auth()->user()->role_id != 2)
        {
            abort(404);
        }
        return $next($request);
    }

}
