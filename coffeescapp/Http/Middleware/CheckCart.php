<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCart
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
        if(empty(session()->get('cart'))){
            return redirect('/');
         }
        return $next($request);
    }
}
