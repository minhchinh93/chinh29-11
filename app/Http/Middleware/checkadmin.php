<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

class checkadmin
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

        if(Auth::check()){
            if(Auth::user()->role == 3){
                return $next($request);
            }else {

                return redirect()->route('home') ;
            }
        }



    }



}
