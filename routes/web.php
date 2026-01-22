<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\SellerProductController;

use App\Http\Controllers\Product\ProductController; // pastikan sesuai folder
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\User\HistoryController;

// HOMEPAGE
Route::get('/', [HomepageController::class, 'indexGuest'])->name('home');
Route::get('/dashboard', [HomepageController::class, 'indexAuth'])->middleware(['auth', 'verified'])->name('dashboard');

// DETAIL PRODUK (HANYA PAKAI SLUG)
Route::get('/produk/{slug}', [ProductController::class, 'detail'])->name('product.detail');

// CHECKOUT
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

// KATEGORI
Route::get('/category/{slug}', [HomepageController::class, 'getByCategory'])->name('category.products');
Route::get('/api/all-products', [HomepageController::class, 'allProducts'])->name('api.all-products');

// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
});

// SELLER
Route::middleware(['auth'])->prefix('seller')->name('seller.')->group(function () {

    Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/register-store', [SellerStoreController::class, 'create'])->name('store.create');
    Route::post('/register-store', [SellerStoreController::class, 'store'])->name('store.store');

    // Products
    Route::resource('products', SellerProductController::class);

});

require __DIR__.'/auth.php';
