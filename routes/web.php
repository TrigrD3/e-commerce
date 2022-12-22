<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});


Route::get('/admin/dashboard', [App\Http\Controllers\PegawaiController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/admins/index', [App\Http\Controllers\PegawaiController::class, 'getPegawai'])->name('admin.users.pegawai');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.item');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');


Route::get('/admin/items/index', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
route::get('/admin/items/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
route::post('/admin/items', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
route::get('/admin/items/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('items.show');
route::get('/admin/items/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
route::put('/admin/items/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
route::delete('/admin/items/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.delete');

