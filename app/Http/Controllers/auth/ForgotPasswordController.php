<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\regmail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function forgotpass(){

        return view('auth.body.comfimgmail');

    }

    public function checkmail(Request $request){

        $input=[

            'link'=> route('sendMailChangepass',[$request->email]),
            'name'=>$request->name,
        ];

        if(User::where('email', $request->email)){
            Mail::to($request->email)->send(new regmail($input));
            return redirect()->route('alert')->with('success','kiem tra mail de doi mk') ;
        }else{
            return redirect()->route('alert')->with('erros','mail nay khong ton tai tren he thong') ;;
        }

    }
}
