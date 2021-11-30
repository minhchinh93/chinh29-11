<?php

namespace App\Http\Controllers\auth;
use App\Http\Requests\UserRequest;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class regitercontroller extends Controller
{
    //
    public function create(UserRequest $request)
    {
    //ma hoa token
    $remember_token= bcrypt($request->name.now());
    // lay du lieu
    $data=[
        'name'=> $request->name,
        'email'=> $request->email,
        'phone'=> $request->phone,
        'password'=> $request->password,
        'remember_token'=> $remember_token,
    ];
//   import data vao database
    User::create($data);
    return 'ban da dang ky thanh cong';

    }
}
