<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SellerProductController extends Controller
{
    public function index()
    {
        $store = Store::where('user_id', Auth::id())->firstOrFail();
        $products = Product::where('store_id', $store->id)
            ->with(['productCategory', 'productImages'])
            ->latest()
            ->get();

        return view('seller.product.index', compact('products', 'store'));
    }

    public function create()
    {
        $store = Store::where('user_id', Auth::id())->firstOrFail();
        $categories = ProductCategory::all();
        return view('seller.product.create', compact('categories', 'store'));
    }

    public function store(Request $request)
    {
        $store = Store::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,id',
            'description' => 'required|string',
            'condition' => 'required|in:new,second',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'images' => 'required|array|min:1|max:5',
        ]);

        $slug = Str::slug($request->name);
        // Ensure unique slug
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $product = Product::create([
            'store_id' => $store->id,
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'condition' => $request->condition,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . Str::random(10) . '.' . $image->extension();
                $image->move(public_path('uploads/products'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $this->authorizeOwner($product);
        $categories = ProductCategory::all();
        $store = Store::where('user_id', Auth::id())->firstOrFail();
        return view('seller.product.edit', compact('product', 'categories', 'store'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeOwner($product);

        $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,id',
            'description' => 'required|string',
            'condition' => 'required|in:new,second',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'images' => 'nullable|array|max:5',
        ]);

        // Update product data
        $product->update([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'condition' => $request->condition,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Update slug if name changed
        if ($product->wasChanged('name')) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $product->update(['slug' => $slug]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . Str::random(10) . '.' . $image->extension();
                $image->move(public_path('uploads/products'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $this->authorizeOwner($product);

        // Delete images from public folder
        foreach ($product->productImages as $image) {
            $imagePath = public_path('uploads/products/' . $image->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function authorizeOwner(Product $product)
    {
        $store = Store::where('user_id', Auth::id())->firstOrFail();
        if ($product->store_id !== $store->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
