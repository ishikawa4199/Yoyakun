<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IndexController;
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
Route::get('admin/create/seat',[SeatController::class,'createSeat'])->name('createSeat');
Route::get('/admin/product/register',[ProductController::class,'register'])->name('product.register');
Route::post('/admin/product/store',[ProductController::class,'store'])->name('product.store');


Route::get('/',[IndexController::class,'index'])->name('index');


Route::get('/order/list',[ProductController::class,'list'])->name('product.list');




Route::get('/order/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
Route::post('/order/addcart',[OrderController::class,'addCart'])->name('product.addCart');
Route::get('/order/cart/list',[OrderController::class,'cartList'])->name('cart.list');
Route::post('/order/store',[OrderController::class,'store'])->name('order.store');
Route::get('/order/noCart',[OrderController::class,'noCart'])->name('order.noCart');
Route::get('/account/list/{seat_num}',[OrderController::class,'accountList'])->name('order.accountList');
Route::post('/account/complete',[OrderController::class,'accountComplete'])->name('account.complete');
Route::get('/order/cart/remove/{index}',[OrderController::class,'remove'])->name('order.remove');
Route::get('/settings',[OrderController::class,'setting'])->name('setting');
Route::post('/settings/store',[OrderController::class,'settingStore'])->name('setting.store');


//コックさん専用オーダー表
Route::get('/cook/order/list',[OrderController::class,'ordersList'])->name('cook.orderList');
Route::get('/cook/get/orders',[OrderController::class,'getOrdersList'])->name('json.orderList');


