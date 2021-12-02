<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    //
    public function index(){
        $shows=  User::all();
        return view('admin.users.index',['shows'=>$shows]);
    }

    // show du lieu len index
    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('showList')->with('success','ban da xoa thanh cong');
    }
    //show form update
    public function updateshow ($id){
        $show = User::find($id);

        return view('admin.users.update',['show'=>$show]);
    }
}
