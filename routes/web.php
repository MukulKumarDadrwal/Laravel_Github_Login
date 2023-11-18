<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware'=>'guest'] , function(){

    Route::get('/', function () {
        return view('Login');
    })->name('login');
    
    Route::get('/auth/redirect',[AuthController::class,'github_redirect']);
    Route::get('auth/callback',[AuthController::class,'github_callback']);
});



Route::group(['middleware'=>'auth'],function(){

    Route::get('/home',function(){
        return view('home');
    });


    Route::get('/auth/logout' ,[AuthController::class,'logout']);
});