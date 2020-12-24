<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SettingsController;
use App\Models\Cart;
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
//Products
Route::resource('/products',ProductsController::class);
Route::get('products/remove/{product}',[ProductsController::class,'remove']);

Route::resource('/categories', CategoryController::class);
Route::resource('/brands', BrandController::class);
Route::resource('/profiles', ProfilesController::class);

//Cart
Route::get('/carts/add/{product}',[CartsController::class,'addToCart']);
Route::get('/carts/remove/{product}',[CartsController::class,'removeFromCart']);
Route::get('/carts/show/',[CartsController::class,'show']);

//Orders
Route::post('/orders/store',[OrdersController::class,'checkOut']);
Route::get('orders/show',[OrdersController::class,'show']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/login/mod',[LoginController::class,'showModLoginForm']);
Route::get('/register/mod', [RegisterController::class,'showModRegistrationForm']);


Route::post('/login/mod', [LoginController::class,'modLogin']);

Route::post('/register/mod', [RegisterController::class,'createMod']);


//Route::view('/home', 'home')->middleware('auth');
Route::view('/mod', 'mod');



//Settings
Route::get('/settings/my-products',[SettingsController::class,'myProducts']);
