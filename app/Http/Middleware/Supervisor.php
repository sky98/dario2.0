<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Supervisor
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
        if(Auth::check()){
            if(Auth()->user()->role == 's')
                return $next($request);

            return redirect()->action('LoginController@login');
        }
        else{
            return redirect()->action('LoginController@login');
        }
    }
}
