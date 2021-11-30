<?php

use App\Http\Controllers\auth\logincontroller;
use App\Http\Controllers\auth\regitercontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {

    return view('admin.users.index');
});
Route::get('/client', function () {

    return view('client.index');
});
Route::get('/shop', function () {

    return view('client.shop.checkout');
});
Route::get('/cart', function () {

    return view('auth.body.register');
});
Route::get('/auth', function () {

    return view('auth.index');
});

//phan auth
Route::prefix('auth')->group(function () {
    //dang ky
    Route::post('/regiter',[regitercontroller::class,'create'])->name('auth.regiter');
    //dang nhap
    Route::post('/login',[logincontroller::class,'login'])->name('auth.login');

});




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
