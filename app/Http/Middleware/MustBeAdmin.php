<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $profimakAdmin)
    {
        if(auth()->check() && auth()->user()->email == $profimakAdmin){
            return $next($request);
        }
        return redirect('/');
    }
}
