<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, \Closure $next, ...$guards)
    { 
        return auth()->check() ? $next($request) : response()->error('Not Authenticated', [], 401);
    }
    
}
