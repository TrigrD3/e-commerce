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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/items/index', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
route::get('/admin/items/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
route::post('/admin/items', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
route::get('/admin/items/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('items.show');
route::get('/admin/items/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
route::put('/admin/items/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
route::delete('/admin/items/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.delete');

