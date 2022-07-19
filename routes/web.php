<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Auth::routes();
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/deposite',[App\Http\Controllers\HomeController::class,'deposite'])->name('deposite.io')->middleware(['auth','verified']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/user/details/{id}',[App\Http\Controllers\HomeController::class, 'details'])->name('user.details');
Route::post('/user/password',[App\Http\Controllers\HomeController::class, 'storePassword'])->name('user.password');
Route::get('/changepassowrd',function(){
    return view('changepassword');
})->name('change.password');
Route::post('/password',[App\Http\Controllers\HomeController::class,'changePassword'])->name('password.change');