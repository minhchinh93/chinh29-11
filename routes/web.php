<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\productController;
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
use UniSharp\LaravelFilemanager\Lfm;


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
    Route::post('update/show/{id}',[userController::class,'updatesuser'])->name('updatesuser');
    // show trackuser
    Route::get('trackuser', [userController::class,'trackuser'])->name('trackuser');
    //show activeruser
    Route::get('activeruser', [userController::class,'activeruser'])->name('activeruser');
    // khoi phuc thung rac
    Route::get('restore/{id}',[userController::class,'restore'])->name('restore');
    // action tổng hợp trong uer
    Route::get('action',[userController::class,'action'])->name('action');


//==========ket thuc khoi user=========//

//=========khoi categoru============//
    //show list ctegori
    Route::get('categoriesList',[categoryController::class,'categoriesList'])->name('categoriesList');
    //show index add
    Route::get('addCategory',[categoryController::class,'addCategory'])->name('addCategory');
    // show add post
    Route::post('postCategory',[categoryController::class,'postCategory'])->name('postCategory');
    // show index update
    Route::get('updatetemplateCategory/{id}',[categoryController::class,'updatetemplateCategory'])->name('updatetemplateCategory');
    Route::post('updateCategory/{id}',[categoryController::class,'updateCategory'])->name('updateCategory');
    // delete categori
    Route::get('deleteCategory/{id}',[categoryController::class,'deleteCategory'])->name('deleteCategory');
        // show trackuser
        Route::get('trackCategory', [categoryController::class,'trackCategory'])->name('trackCategory');
        //show activeruser
        Route::get('activerCategory', [categoryController::class,'activerCategory'])->name('activerCategory');
        // khoi phuc thung rac
        Route::get('restoreCategory/{id}',[categoryController::class,'restoreCategory'])->name('restoreCategory');
        // thực hiện tác vụ
        Route::get('categoryaction',[categoryController::class,'action'])->name('categoryaction');
    //=====khoi product===========//
    Route::get('ProductList',[productController::class,'ProductList'])->name('ProductList');
    //show index add
    Route::get('addProduct',[productController::class,'addProduct'])->name('addProduct');
    // show add post
    Route::post('postProduct',[productController::class,'postProduct'])->name('postProduct');
    // show index update
    Route::get('updatetemplateProduct/{id}',[productController::class,'updatetemplateProduct'])->name('updatetemplateProduct');
    Route::post('updateProduct/{id}',[productController::class,'updateProduct'])->name('updateProduct');
    // delete categori
    Route::get('deleteProduct/{id}',[productController::class,'deleteProduct'])->name('deleteProduct');
        // show trackuser
        Route::get('trackProduct', [productController::class,'trackProduct'])->name('trackProduct');
        //show activeruser
        Route::get('activerProduct', [productController::class,'activerProduct'])->name('activerProduct');
        // khoi phuc thung rac
        Route::get('restoreProduct/{id}',[productController::class,'restoreProduct'])->name('restoreProduct');
        // thực hiện tac vụ
        Route::get('productaction',[productController::class,'action'])->name('productaction');
    });



//========khet thuc khoi admin========//


//========khoi client===========//

//========khoi index===========//
Route::prefix('/clients')->group(function () {
    Route::get('/index',[homeController::class,'index'])->name('home');
});


Route::group(['prefix' => 'laravel-filemanager',], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
