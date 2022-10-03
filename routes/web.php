<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [PageController::class, 'home'])->name('index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/single/{product}', [PageController::class, 'single'])->name('single');
Route::get('/tracking', [PageController::class, 'tracking'])->name('tracking');
Route::post('/tracking', [PageController::class, 'findOrder'])->name('findOrder');
Route::get('/confirmation/{codepin}', [PageController::class, 'confirmation'])->name('confirmation');

Route::get('/checkout', [OrderController::class, 'create'])->name('order.create');
Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::match(array('PUT', 'PATCH'), '/cart/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/empty', [CartController::class, 'empty'])->name('cart.empty');
Route::delete('/cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin'], 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'], function () {

    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');

    Route::get('/produits', 'ProductController@index')->name('produits.index');
    Route::post('/produits', 'ProductController@store')->name('produits.store');
    Route::get('/produits/create', 'ProductController@create')->name('produits.create');
    Route::get('/produits/{product}', 'ProductController@show')->name('produits.show');
    Route::match(array('PUT', 'PATCH'), '/produits/{product}', 'ProductController@update')->name('produits.update');
    Route::delete('/produits/{product}', 'ProductController@destroy')->name('produits.destroy');
    Route::get('/produits/{product}/edit', 'ProductController@edit')->name('produits.edit');
});
