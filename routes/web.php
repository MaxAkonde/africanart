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
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/single/{product}', [PageController::class, 'single'])->name('single');
Route::get('/post/single/{post}', [PageController::class, 'postSingle'])->name('postSingle');
Route::get('/tracking', [PageController::class, 'tracking'])->name('tracking');
Route::post('/tracking', [PageController::class, 'findOrder'])->name('findOrder');
Route::get('/confirmation/{codepin}', [PageController::class, 'confirmation'])->name('confirmation');
Route::get('/commandes', [PageController::class, 'commande'])->name('commandes');
Route::post('/search', [PageController::class, 'search'])->name('search');
Route::get('/category/{name}', [PageController::class, 'category'])->name('category');
Route::get('/addproduct', [PageController::class, 'addproduct'])->name('addproduct');
Route::post('/addproduct', [PageController::class, 'storeproduct'])->name('storeproduct');
Route::get('/myshop', [PageController::class, 'myshop'])->name('myshop');
Route::get('/profil/{user}/edit', [PageController::class, 'editprofil'])->name('edit.user.profil');
Route::put('/profil/{user}', [PageController::class, 'updateprofil'])->name('update.user.profil');

Route::get('/checkout', [OrderController::class, 'create'])->name('order.create');
Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');

Route::resource('orders', 'App\Http\Controllers\OrderController')->except('create', 'store')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/empty', [CartController::class, 'empty'])->name('cart.empty');
Route::delete('/cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin'], 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'], function () {

    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('countries', 'CountryController');
    Route::resource('payments', 'PaymentController');
    Route::resource('shippings', 'ShippingController');
    Route::resource('attributes', 'AttributeController');
    Route::resource('values', 'ValueController');
    Route::resource('posts', 'PostController');
    Route::resource('topics', 'TopicController');

});
