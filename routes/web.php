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
Route::get('/detailproduct/{title}', [PageController::class, 'productdetail'])->name('detailproduct');
Route::post('/detailproduct/{title}', [PageController::class, 'cartInput'])->name('cartInput');

Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::post('/profile', [PageController::class, 'updateProfile'])->name('updateProfile');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/products', [PageController::class, 'searchProduct'])->name('products');
Route::get('/products/category/{id}', [PageController::Class, 'viewCategory']);

Route::get('/transaction', [PageController::class, 'transaction'])->name('transaction');

Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::post('/cart', [PageController::class, 'cartInput'])->name('cartInput');
Route::post('/cart/{id}', [PageController::class, 'cartDelete'])->name('cartDelete');

Route::get('/insert', [PageController::class, 'insert'])->name('insert');
Route::post('/insert', [PageController::class, 'insertProduct'])->name('insertProduct');

Route::get('/update/{title}', [PageController::class, 'update'])->name('update');
Route::post('/update/{title}', [PageController::class, 'updateProduct'])->name('updateProduct');

Route::get('/manage', [PageController::class, 'manage'])->name('manage');
Route::post('/manage', [PageController::class, 'deleteUser'])->name('deleteUser');

// Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
// Route::post('/profile/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
