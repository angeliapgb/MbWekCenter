<?php

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
    return view('Auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\PageController::class, 'profile'])->name('profile');
Route::get('/transaction', [App\Http\Controllers\PageController::class, 'transaction'])->name('transaction');
Route::get('/cart', [App\Http\Controllers\PageController::class, 'cart'])->name('cart');
Route::get('/insert', [App\Http\Controllers\PageController::class, 'insert'])->name('insert');
Route::get('/manage', [App\Http\Controllers\PageController::class, 'manage'])->name('manage');

// Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
// Route::post('/profile/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
