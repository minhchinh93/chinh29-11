<?php

use App\Http\Controllers\auth\logincontroller;
use App\Http\Controllers\auth\regitercontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/index', function () {

//     return view('admin.users.index');
// });
// Route::get('/client', function () {

//     return view('client.index');
// });
// Route::get('/shop', function () {

//     return view('client.shop.checkout');
// });
// Route::get('/cart', function () {

//     return view('auth.body.register');
// });
// Route::get('/auth', function () {

//     return view('auth.index');
// });

Auth::routes();

//phan auth
Route::prefix('auth')->group(function () {

  //========= khoi dang ky========//
    // show register mail
    Route::get('/regiter/index',[regitercontroller::class,'index'])->name('register.index');
   // nhapj du lieu + gui mail
    Route::post('/regiter',[regitercontroller::class,'create'])->name('auth.regiter');
  //========= khoi very mail user========//
   //verry mail
    Route::get('/senmail/{remember_token}',[ConfirmPasswordController::class,'update'])->name('senmail');
//==========  khoi login===============//
    //show index login
    Route::get('/login',[loginController::class,'index'])->name('login');
    //dang nhap
    Route::post('/login',[logincontroller::class,'login'])->name('auth.login');
  // =========== quen pass ==============//
    //show confirm email
    Route::get('/email',[ForgotPasswordController::class,'forgotpass'])->name('email.index');
    //check mail va gui mail
    Route::post('/chekcmail',[ForgotPasswordController::class,'checkmail'])->name('checkmail');
    //show template comfimg passs
    Route::get('/sendMailChangepass/{email}',[ResetPasswordController::class,'sendMailChangepass'])->name('sendMailChangepass');
    Route::post('/changePasss/{email}',[ResetPasswordController::class,'changePass'])->name('changePass');


});
    //======== khối thông báo ===========//

    Route::get('/alert', function () {

    return view('auth.layout.alert');
})->name('alert');







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
