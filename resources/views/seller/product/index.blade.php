@extends('layouts.seller.seller')

@section('head')
<link rel="stylesheet" href="{{ asset('css/seller/product-management.css') }}">
@endsection

@section('content')
<div class="product-container">
    <div class="product-header">
        <div>
            <h1>Daftar Produk</h1>
            <p>Kelola semua produk yang Anda jual di Techly.</p>
        </div>
        <a href="{{ route('seller.products.create') }}" class="btn-add">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Produk
        </a>
    </div>

    @if(session('success'))
    <div class="alert-success" style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem; border: 1px solid #10b981;">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-card">
        <table class="product-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>
                        <div class="product-info-cell">
                            @php
                                $firstImage = $product->productImages->first();
                                $imagePath = $firstImage ? asset('uploads/products/' . $firstImage->image) : asset('img/no-image.png');
                            @endphp
                            <img src="{{ $imagePath }}" alt="{{ $product->name }}" class="product-thumb">
                            <div class="product-details">
                                <span class="name">{{ $product->name }}</span>
                                <span class="category">{{ $product->productCategory->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td>{{ $product->productCategory->name }}</td>
                    <td><span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span></td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if($product->stock > 10)
                            <span class="stock-badge stock-in">Tersedia</span>
                        @elseif($product->stock > 0)
                            <span class="stock-badge stock-low">Stok Rendah</span>
                        @else
                            <span class="stock-badge stock-out">Habis</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn-icon" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z" />
                                </svg>
                            </a>
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon delete" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-2.586 2.586a1 1 0 01-1.414 0L12 13M4 13l2.586 2.586a1 1 0 001.414 0L10 13" />
                            </svg>
                            <p>Belum ada produk. Mulailah berjualan dengan menambahkan produk pertama Anda!</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
