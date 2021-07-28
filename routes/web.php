<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login');
});

Route::get('/confirmed_order', function () {
    return view('order-confirmed');
});

Route::post('/login', [UserController::class, 'login']);

Route::get('/', [ProductController::class, 'index']);
Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/search', [ProductController::class, 'search']);
Route::post('/add_to_cart', [ProductController::class, 'addToCart']);

Route::get('/cart_list', [ProductController::class, 'cartList']);
Route::get('/remove_to_cart/{id}', [ProductController::class, 'cartRemove']);
Route::get('/order_now', [ProductController::class, 'orderNow']);
Route::post('/confirm_order', [ProductController::class, 'confirmOrder']);
Route::get('/my_orders', [ProductController::class, 'listOrders']);
