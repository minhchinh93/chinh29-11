<?php

namespace App\Http\Controllers\client;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class homeController extends Controller
{
    //
    public function index()
    {
            $data= Auth::user();
            $menu= Category::all();
            $product= product::all();
            return view('client.index',['data'=>$data, 'menus'=>$menu,'product'=>$product]);
    }
    public function logout(){
            Auth::logout();
            $data= Auth::check();
            return view('client.index',['data'=>$data]);

    }

    }

