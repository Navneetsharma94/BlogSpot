<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AccessAdmin
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
        if(!is_null(\Auth::user()->roles()->first()) && \Auth::user()->roles()->first()->name == 'admin'){
            return $next($request);
        }
        else{
            return redirect('/');   
        }
    }
       
}
