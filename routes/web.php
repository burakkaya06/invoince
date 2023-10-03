<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HtmlController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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



Route::get('/' , [ LoginController::class , 'index' ])->name('index')->middleware('guest');;
Route::post('/login' , [ LoginController::class , 'login' ])->name('login');
Route::post('/logout' , [ LoginController::class , 'logout' ])->name('logout');
Route::get('/dashboard' , [ DashboardController::class , 'index' ])->name('dashboard');

Route::get('/customers' , [ CustomerController::class , 'index' ])->name('customers.index');
Route::post('/customers' , [ CustomerController::class , 'store' ])->name('customers.store');
Route::delete('/customer/{id}' , [ CustomerController::class , 'delete' ])->name('customer.delete');
Route::put('/customer/update/{id}' , [ CustomerController::class , 'update' ])->name('customer.update');
Route::get('/customer/show/{id}' , [ CustomerController::class , 'show' ])->name('customer.edit');
Route::post('/customer/check-customer-id', [CustomerController::class, 'checkId'])->name('customer.checkid');

Route::get('/products' , [ ProductController::class , 'index' ])->name('product.index');
Route::post('/products' , [ ProductController::class , 'store' ])->name('products.store');
Route::get('/product/show/{id}' , [ ProductController::class , 'show' ])->name('product.edit');
Route::delete('/product/{id}' , [ ProductController::class , 'delete' ])->name('product.delete');
Route::put('/product/update/{id}' , [ ProductController::class , 'update' ])->name('product.update');

Route::get('/html' , [ HtmlController::class , 'index' ])->name('html.index');

Route::get('/orders' , [ OrderController::class , 'index' ])->name('order.index');
Route::post('/orders' , [ OrderController::class , 'store' ])->name('order.store');
Route::get('/order/detail/{id}' , [ OrderController::class , 'detail' ])->name('order.detail');
Route::get('/order/show/{id}' , [ OrderController::class , 'show' ])->name('order.edit');
Route::delete('/order/{id}' , [ OrderController::class , 'delete' ])->name('order.delete');
Route::get('/orders/custom-search' , [ OrderController::class , 'custom' ])->name('order.custom');
Route::get('/orders/create-order-id' , [ OrderController::class , 'createOrderId' ])->name('order.createorderid');






