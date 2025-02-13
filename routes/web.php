<?php

use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('app')->middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('produk', ProdukController::class);
});
