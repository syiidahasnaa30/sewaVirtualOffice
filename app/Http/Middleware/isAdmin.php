<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::user() && \Auth::user()->is_admin == true) {
            return $next($request);
        }
        return back()->with('error','Opps, You\'re not Admin');
        //return $next($request);
    }
}