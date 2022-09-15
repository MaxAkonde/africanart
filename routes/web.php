<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'home'])->name('index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin'], 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'] ,function () {

    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');
    
    Route::get('/produits', 'ProductController@index')->name('produits.index');
    Route::post('/produits', 'ProductController@store')->name('produits.store');
    Route::get('/produits/create', 'ProductController@create')->name('produits.create');
    Route::get('/produits/{product}', 'ProductController@show')->name('produits.show');
    Route::match(array('PUT', 'PATCH'),'/produits/{product}', 'ProductController@update')->name('produits.update');
    Route::delete('/produits/{product}', 'ProductController@destroy')->name('produits.destroy');
    Route::get('/produits/{product}/edit', 'ProductController@edit')->name('produits.edit');
 
});
