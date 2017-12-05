<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BlockedUser
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
        if (Auth::check()){
            if (Auth::user()->isBlocked()){
                return abort(412);
            } else {
                return $next($request);
            }
        }
    }
}
