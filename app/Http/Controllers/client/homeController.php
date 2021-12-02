<?php

namespace App\Http\Controllers\client;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index()
    {
        // dd(Auth::check());
         if(Auth::check()){
            $data= Auth::user();
            //  $data=[
            //      'email'=>Auth::user()->email,
            //      'name'=>Auth::user()->name,
            //      'address'=>Auth::user()->address,
            //      'address'=>Auth::user()->phone,
            //  ];
                  return view('client.index',['data'=>$data]);
         }
        }
         public function logout(){

               Auth::logout();
                $data= Auth::check();
            
                return view('client.index',['data'=>$data]);

        }

    }

