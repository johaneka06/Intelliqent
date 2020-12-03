<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::user()) 
        {
            return redirect('/login');
        }

        if(Auth::user()->isAdmin())
        {
            return $next($request);
        } 
        else
        {
            return abort(403, "Only " . $role . " is allowed");
        }

    }
}
