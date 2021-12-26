<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::post('/profile', [PageController::class, 'updateProfile'])->name('updateProfile');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/products', [PageController::class, 'searchProduct']);
Route::get('/products/category/{id}', [PageController::Class, 'viewCategory']);

Route::get('/transaction', [PageController::class, 'transaction'])->name('transaction');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/insert', [PageController::class, 'insert'])->name('insert');
Route::get('/update', [PageController::class, 'update'])->name('update');

Route::get('/manage', [PageController::class, 'manage'])->name('manage');
Route::post('/manage', [PageController::class, 'deleteUser'])->name('deleteUser');

// Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
// Route::post('/profile/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
