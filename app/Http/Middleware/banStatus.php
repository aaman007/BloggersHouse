<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class banStatus
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
        if(!auth()->guest() && auth()->user()->banned == true)
            return redirect('/');
        return $next($request);
    }
}
