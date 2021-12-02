<?php

use App\Http\Controllers\admin\userController;
use App\Http\Controllers\auth\logincontroller;
use App\Http\Controllers\auth\regitercontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\User;
use App\Http\Middleware\checkadmin;
use App\Http\Controllers\auth\sendMailController;
use App\Http\Controllers\Client\homeController;


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
//     User::create([

//             'name'=> 'nguyen minh chinh',
//             'email'=> 'ccccc@gmail.com',
//             'phone'=> '09343332222',
//             'password'=> bcrypt('123@@@'),
//             // 'remember_token'=> $remember_token,
//             'role'=> 3
//     ]);
// });

Auth::routes();

//phan auth
Route::prefix('auth')->group(function () {

  //========= khoi dang ky========//
    // show register mailsendMail
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
    // dang xuat
    Route::get('/logout',[logincontroller::class,'logout'])->name('logout');
  // =========== quen pass ==============//
    //show confirm email
    Route::get('/email',[ForgotPasswordController::class,'forgotpass'])->name('email.index');
    //check mail va gui mail
    Route::post('/chekcmail',[ForgotPasswordController::class,'checkmail'])->name('checkmail');
    //show template comfimg passs
    Route::get('/sendMailChangepass/{email}',[ResetPasswordController::class,'sendMailChangepass'])->name('sendMailChangepass');
    Route::post('/changePasss/{email}',[ResetPasswordController::class,'changePass'])->name('changePass');
    // ham send mail
    Route::get('sendMail',[sendMailController::class,'senmail'])->middleware('verymail')->name('');
});
    //======== khối thông báo ===========//

    Route::get('/alert', function () {

    return view('auth.layout.alert');
})->name('alert');

//=========== khoi admin================//
//============khoi admin user===========//

Route::middleware('checkadmin')->prefix('admin')->group(function () {
    //logout
    Route::get('/logout',[homeController::class,'logout'])->name('auth.logout');
    // show liss user
    Route::get('/listUser',[userController::class,'index'])->name('showList');
    // xoa user
    Route::get('/deleteUser/{id}',[userController::class,'delete'])->name('deleteUser');
    //show updatenUser
    Route::get('update/show/{id}',[userController::class,'updateshow'])->name('update.show');
});
//==========ket thuc khoi user=========//






//========khet thuc khoi admin========//


//========khoi client===========//

//========khoi index===========//
Route::prefix('/clients')->group(function () {
    Route::get('/index',[homeController::class,'index'])->name('home');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
