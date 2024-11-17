<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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
    return view('home');
});

Route::controller(AuthController::class)->group( function (){
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');

    Route::get('logout','logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::get('dashboard/{user}', [AuthController::class, 'dashboard'])->name('dashboard')->where([
        'user' => "[0-9]+"
    ]);
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::get('','index')->name('users');
        Route::get('create','create')->name('users.create');
        Route::post('store','store')->name('users.store');
        Route::get('show/{id}','show')->name('users.show');
        Route::get('edit/{id}', 'edit')->name('users.edit');
        Route::put('edit/{id}', 'update')->name('users.update');
        Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function(){
        Route::get('','index')->name('products');
        Route::get('create','create')->name('products.create');
        Route::post('store','store')->name('products.store');
        Route::get('show/{id}','show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::controller(OrderController::class)->prefix('orders')->group(function(){
        Route::get('','index')->name('orders');
        Route::get('create','create')->name('orders.create');
        Route::post('store','store')->name('orders.store');
        Route::get('show/{id}','show')->name('orders.show');
        Route::get('edit/{id}', 'edit')->name('orders.edit');
        Route::put('edit/{id}', 'update')->name('orders.update');
        Route::delete('destroy/{id}', 'destroy')->name('orders.destroy');
        Route::post('/orders/display', [OrderController::class, 'displayOrder'])->name('orders.display');
        Route::get('/orders/simulator', [OrderController::class, 'simulator'])->name('orders.simulator');
    });
    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
