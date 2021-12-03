<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->user() != null) {
        if (auth()->user()->role == 1) {
            return $next($request);
        } else {
            return abort(403);
        }
        // } else {
        //     return route('login');
        // }
    }
}
