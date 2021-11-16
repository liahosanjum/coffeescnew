<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAuthAdmin
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
        $userAdmin = Auth::guard('admin')->user();
        if(isset($userAdmin->type) && $userAdmin->type != "" && $userAdmin->type != null )
        {
            if($userAdmin->type != 'admin')
            {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
