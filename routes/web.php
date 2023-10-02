<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/' , function () {
    return view('welcome');
});

Route::get('/login' , [ LoginController::class , 'index' ])->name('login');
Route::get('/dashboard' , [ DashboardController::class , 'index' ])->name('dashboard');

Route::get('/customers' , [ CustomerController::class , 'index' ])->name('customers.index');
Route::post('/customers' , [ CustomerController::class , 'store' ])->name('customers.store');
Route::delete('/customer/{id}' , [ CustomerController::class , 'delete' ])->name('customer.delete');
Route::put('/customer/update/{id}' , [ CustomerController::class , 'update' ])->name('customer.update');
Route::get('/customer/show/{id}' , [ CustomerController::class , 'show' ])->name('customer.edit');

Route::get('/products' , [ ProductController::class , 'index' ])->name('product.index');
Route::post('/products' , [ ProductController::class , 'store' ])->name('products.store');
Route::get('/product/show/{id}' , [ ProductController::class , 'show' ])->name('product.edit');
Route::delete('/product/{id}' , [ ProductController::class , 'delete' ])->name('product.delete');
Route::put('/customer/update/{id}' , [ ProductController::class , 'update' ])->name('product.update');





