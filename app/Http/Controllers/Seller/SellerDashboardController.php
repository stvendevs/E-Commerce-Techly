<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        // Dynamic Greeting
        $hour = date('H');
        $greeting = 'Selamat ';
        if ($hour >= 5 && $hour < 11) {
            $greeting .= 'Pagi';
        } elseif ($hour >= 11 && $hour < 15) {
            $greeting .= 'Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            $greeting .= 'Sore';
        } else {
            $greeting .= 'Malam';
        }

        // Statistics
        $totalProducts = Product::where('store_id', $store->id)->count();
        
        // Get transactions through products
        $productIds = Product::where('store_id', $store->id)->pluck('id');
        
        $totalRevenue = DB::table('transaction_details')
            ->whereIn('product_id', $productIds)
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->where('transactions.payment_status', 'paid')
            ->sum(DB::raw('transaction_details.qty * transaction_details.price'));
            
        $totalTransactions = DB::table('transaction_details')
            ->whereIn('product_id', $productIds)
            ->distinct('transaction_id')
            ->count('transaction_id');
            
        $totalBuyers = DB::table('transaction_details')
            ->whereIn('product_id', $productIds)
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('buyers', 'transactions.buyer_id', '=', 'buyers.id')
            ->distinct('buyers.user_id')
            ->count('buyers.user_id');

        // Latest 5 transactions
        $latestTransactions = DB::table('transaction_details')
            ->whereIn('product_id', $productIds)
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('buyers', 'transactions.buyer_id', '=', 'buyers.id')
            ->join('users', 'buyers.user_id', '=', 'users.id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->select(
                'transactions.id',
                'transactions.code as transaction_code',
                'transactions.created_at',
                'transactions.payment_status as status',
                'users.name as buyer_name',
                'products.name as product_name',
                DB::raw('transaction_details.qty * transaction_details.price as total')
            )
            ->orderBy('transactions.created_at', 'desc')
            ->limit(5)
            ->get();

        // Latest Reviews
        $latestReviews = DB::table('product_reviews')
            ->whereIn('product_id', $productIds)
            // Reviews join transactions -> buyers -> users
            ->join('transactions', 'product_reviews.transaction_id', '=', 'transactions.id')
            ->join('buyers', 'transactions.buyer_id', '=', 'buyers.id')
            ->join('users', 'buyers.user_id', '=', 'users.id')
            ->join('products', 'product_reviews.product_id', '=', 'products.id')
            ->select(
                'product_reviews.*',
                'users.name as buyer_name',
                'products.name as product_name'
            )
            ->orderBy('product_reviews.created_at', 'desc')
            ->limit(5)
            ->get();

        return view('seller.dashboard.dashboard', compact(
            'store', 
            'totalProducts',
            'totalRevenue',
            'totalTransactions',
            'totalBuyers',
            'latestTransactions',
            'latestReviews',
            'greeting'
        ));
    }
}
