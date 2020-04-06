<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
{
    public function handle($request, Closure $next)
    {
        if(auth()->user() == null) {
            abort(404);
        }

        return $next($request);
    }
}
