<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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


route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
route::get('/login',[LoginController::class,'halamanLogin'])->name('login');
route::post('/postLogin',[LoginController::class,'postLogin'])->name('postLogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function(){
    route::get('/home',[HomeController::class,'index'])->name('home');    
});