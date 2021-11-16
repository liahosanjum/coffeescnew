<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkLoggedUser
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
        if(session()->has('loggedUserId'))
        {
            return redirect('profile');
        }
        return $next($request);
    }
}
