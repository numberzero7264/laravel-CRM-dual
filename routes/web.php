<?php

use App\Http\Controllers\Admin\User\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\auth;

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
Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('login/store', [LoginController::class,'store'])->name('store');

Route::middleware('Auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('home',[HomeController::class,'index'])->name('home');

    });
 
});

// Route::middleware('checklog')->prefix('admin')->group(function () {
//     Route::prefix('user')->name('user.')->group(function () {
//         route::get('index',[UserController::class,'index']);
//     });
// });

    
