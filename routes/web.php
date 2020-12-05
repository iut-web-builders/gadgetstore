<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
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
    return view('gadgetstore');
});

Route::get('/index',function (){
    return view('gadgetstore');
});

Route::resource('/products',ProductsController::class);

Route::resource('/categories', CategoryController::class);
Route::resource('/brands', BrandController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/login/mod',[LoginController::class,'showModLoginForm']);
Route::get('/register/mod', [RegisterController::class,'showModRegistrationForm']);


Route::post('/login/mod', [LoginController::class,'modLogin']);

Route::post('/register/mod', [RegisterController::class,'createMod']);


//Route::view('/home', 'home')->middleware('auth');
Route::view('/mod', 'mod');

