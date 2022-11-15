<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\PeminjamanController;
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
    return view('login');
});

Route::resource('produk', ProdukController::class);
Route::resource('sopir', SopirController::class);
Route::resource('peminjaman', PeminjamanController::class);

Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name(
    'login'
)->middleware('guest');

Route::post('login', [App\Http\Controllers\LoginController::class, 'authenticate']);