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

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'] ,function () {

    Route::resource('roles', 'RoleController');
 
});
