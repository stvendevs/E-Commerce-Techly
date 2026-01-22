<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerStoreController extends Controller
{
    public function create()
    {
        return view('seller.register.register-store');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:stores,name',
            'about' => 'required|string|min:50',
            'phone' => 'required|string|min:10|max:15',
            'city' => 'required|string|max:100',
            'address' => 'required|string',
            'postal_code' => 'required|string|size:5',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.unique' => 'Nama toko sudah digunakan, silakan pilih nama lain.',
            'about.min' => 'Deskripsi toko minimal 50 karakter.',
            'phone.min' => 'Nomor telepon minimal 10 digit.',
            'postal_code.size' => 'Kode pos harus 5 digit.',
        ]);

        $logoName = null;

        if ($request->hasFile('logo')) {
            // Create directory if not exists
            $uploadPath = public_path('uploads/toko_logo/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $logoName = time() . '-' . $request->logo->getClientOriginalName();
            $request->logo->move($uploadPath, $logoName);
        }

        // Generate slug from store name
        $slug = \Illuminate\Support\Str::slug($request->name);
        
        // Check if slug exists, if yes, append number
        $originalSlug = $slug;
        $counter = 1;
        while (Store::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Store::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'slug' => $slug,
            'about' => $request->about,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'logo' => $logoName,
            'is_verified' => 0,
        ]);

        return redirect()->route('seller.dashboard')
            ->with('success', 'Toko berhasil didaftarkan! Selamat datang di Techly Seller.');
    }
}
