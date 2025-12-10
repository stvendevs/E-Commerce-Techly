<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index(Request $request)
    {
        $productId = $request->query('product');
        $product = Product::with('productImages')->findOrFail($productId);

        return view('checkout.index', compact('product'));
    }

    // Memproses form checkout
    public function process(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'nama'       => 'required|string|max:255',
            'telepon'    => 'required|string|max:20',
            'alamat'     => 'required|string',
            'kota'       => 'required|string|max:100',
            'kodepos'    => 'required|string|max:10',
            'pengiriman' => 'required|string',
            'payment'    => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        $ongkir = match($request->pengiriman) {
            'reguler' => 15000,
            'express' => 25000,
            'same-day' => 35000,
            default => 15000
        };

        $order = Order::create([
            'product_id' => $product->id,
            'nama'       => $request->nama,
            'telepon'    => $request->telepon,
            'alamat'     => $request->alamat,
            'kota'       => $request->kota,
            'kodepos'    => $request->kodepos,
            'pengiriman' => $request->pengiriman,
            'payment'    => $request->payment,
            'subtotal'   => $product->price,
            'ongkir'     => $ongkir,
            'total'      => $product->price + $ongkir,
            'status'     => 'pending',
        ]);

        // Redirect ke halaman sukses pembayaran
        return redirect()->route('checkout.success', ['order' => $order->id]);
    }

    // Halaman sukses pembayaran
    public function success($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);
        return view('checkout.success', compact('order'));
    }
}
