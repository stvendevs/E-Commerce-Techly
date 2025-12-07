<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method untuk menampilkan detail produk
    public function detail($slug)
    {
        // 1. Ambil data produk dari database berdasarkan $slug
        // Contoh: $product = Product::where('slug', $slug)->firstOrFail();

        // 2. Jika Anda belum memiliki database/Model,
        // Anda bisa membuat data dummy (hanya untuk testing tampilan):
        $product = [
            'name' => 'Smartphone X Pro',
            'category' => 'Smartphone',
            'price' => '4.299.000'
            // ... data lain yang diperlukan oleh detail.blade.php
        ];

        // 3. Render view detail.blade.php dan oper data
        return view('detail', compact('product'));
    }
}