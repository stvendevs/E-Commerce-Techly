<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
public function index()
{
    $store = Store::where('user_id', Auth::id())->first();

    // kalau toko belum dibuat
    if (!$store) {
        return redirect()->route('seller.store.create')
            ->with('warning', 'Silakan buat toko terlebih dahulu.');
    }

    // produk berdasarkan store_id
    $productCount = Product::where('store_id', $store->id)->count();

    return view('seller.dashboard', compact('store', 'productCount'));
}
}
