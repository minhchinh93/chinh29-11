<?php

namespace App\Http\Controllers\auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\regmail;
use Carbon\Carbon;
// use App\Mail;

use App\Http\Controllers\Controller;
use App\Jobs\queueJob;
use Illuminate\Http\Request;

class regitercontroller extends Controller
{
    public function index(){
        return view('auth.body.register');
    }
    //
    public function create(UserRequest $request)
    {
    //ma hoa token
    $remember_token= md5($request->name.time());
    $url = route('senmail',[$remember_token]);
    // lay du lieu
    $data=[
        'name'=> $request->name,
        'email'=> $request->email,
        'phone'=> $request->phone,
        'password'=> bcrypt($request->password),
        'remember_token'=> $remember_token,
    ];
    //   import data vao database
    $input= [
        'link'=> $url,
        'name'=>$request->name
    ];
    $email= $request->email;
    // send mail queue job
    $emailJob = (new queueJob( $email, $input))->delay(Carbon::now()->addMinutes(5));
    dispatch($emailJob);
    //check tạo user thành công
  if(User::create($data))  {
    return redirect()->route('login')->with('success','succset password,check mail in verymail');
        } else{
    return redirect()->route('login')->with('erros','erros password,try login !');
            }
        }
}
