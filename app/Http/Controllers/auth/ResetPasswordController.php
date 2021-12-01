<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function sendMailChangepass($email){
        return view('auth.body.repassword',['email'=>$email]);
    }

    public function changePass(Request $request, $email){
        $password = bcrypt($request->password);

        if (User::where('email',$email)){
            User::where('email',$email)->update(['password'=>$password]);
            return redirect()->route('login')->with('success','succset password,try login !');
        } else{
            return redirect()->route('login')->with('erros','erros password,try login !');
        }

    }
}
