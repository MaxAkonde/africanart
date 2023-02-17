<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

/** PageController Route */
Route::get('/', [PageController::class, 'home'])->name('index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

/** ProductController Route */
Route::get('/shop', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{name}', [ProductController::class, 'category'])->name('category');
Route::post('/search', [ProductController::class, 'search'])->name('search');

/** PostController Route */
Route::get('/blog', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

/** OrderController Route */
Route::resource('orders', 'App\Http\Controllers\OrderController')->except('create', 'store')->middleware('auth');
Route::get('/tracking', [OrderController::class, 'tracking'])->name('tracking');
Route::post('/tracking', [OrderController::class, 'findOrder'])->name('findOrder');
Route::get('/confirmation/{codepin}', [OrderController::class, 'confirmation'])->name('confirmation');
Route::get('/checkout', [OrderController::class, 'create'])->name('order.create');
Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');

/** UserController Route */
Route::get('/commandes', [UserController::class, 'commande'])->name('commandes');
Route::get('/profil/{user}/edit', [UserController::class, 'editprofil'])->name('edit.user.profil');
Route::put('/profil/{user}', [UserController::class, 'updateprofil'])->name('update.user.profil');
Route::get('/addproduct', [UserController::class, 'addproduct'])->name('addproduct');
Route::post('/addproduct', [UserController::class, 'storeproduct'])->name('storeproduct');
Route::get('/myshop', [UserController::class, 'myshop'])->name('myshop');

/** CartController Route */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/empty', [CartController::class, 'empty'])->name('cart.empty');
Route::delete('/cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

/** Authenticate Route */
Auth::routes();

/** Dashboard Home Route */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/** Admin Group Route */
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
