<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produk/{slug}', [ProductController::class, 'detail'])->name('product.detail');
});

Route::middleware(['auth'])
->prefix('seller')
->name('seller.')
->group(function () {

    // Dashboard Seller
    Route::get('/dashboard', [SellerDashboardController::class, 'index'])
        ->name('dashboard');

    // Registrasi Toko
    Route::get('/register-store', [SellerStoreController::class, 'create'])
        ->name('store.create');

    Route::post('/register-store', [SellerStoreController::class, 'store'])
        ->name('store.store');



});

require __DIR__.'/auth.php';
