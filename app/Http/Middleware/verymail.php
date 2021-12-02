<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\regmail;
use Closure;
use Illuminate\Http\Request;

class verymail
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
            // dd((Auth::user()->email_verified_at == null));
           if(Auth::user()->email_verified_at == null){
            $data= [
                'link'=> route('senmail',[Auth::user()->remember_token]),
                'name'=> Auth::user()->name
            ];
            Mail::to(Auth::user()->email)->send(new regmail($data));
            return $next($request);
           } else{
            return $next($request);
           }
        }

    }
}
