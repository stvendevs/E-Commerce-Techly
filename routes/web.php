<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/detail', function () {
    return view('user.detail');
});

//lihat detail produk
Route::get('/detail', function () {
    return view('user.detail');
})->name('detail');

//beranda
Route::get('/', function () {
    return view('user.index');
})->name('beranda');

// Kategori
Route::get('/kategori', function () {
    return view('user.index');
})->name('kategori');

// Produk
Route::get('/produk', function () {
    return view('user.index');
})->name('produk');

// Keranjang
Route::get('/keranjang', function () {
    return view('user.index');
})->name('keranjang');

// Checkout (gunakan Controller)
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
