<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ToyController;
use App\Http\Controllers\TypeController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/contact', [IndexController::class, 'contactGet'])->name('contactGet');
Route::post('/contact', [IndexController::class, 'contactSend'])->name('contactSend');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/cart', [IndexController::class, 'getCart'])->name('getCart');
Route::get('/cart/buy', [IndexController::class, 'buyCart'])->name('buyCart');
Route::resource('toys', ToyController::class);
Route::get('/toys/cart_add/{id}', [ToyController::class, 'cartAdd'])->name('toys.cart.add');
Route::get('/toys/cart_remove/{id}', [ToyController::class, 'cartRemove'])->name('toys.cart.remove');
Route::resource('types', TypeController::class);
Route::resource('materials', MaterialController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
