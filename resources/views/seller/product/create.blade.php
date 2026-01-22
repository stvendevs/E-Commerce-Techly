@extends('layouts.seller.seller')

@section('head')
<link rel="stylesheet" href="{{ asset('css/seller/product-management.css') }}">
@endsection

@section('content')
<div class="product-container">
    <div class="product-header">
        <div>
            <h1>Tambah Produk Baru</h1>
            <p>Lengkapi detail produk Anda untuk mulai berjualan.</p>
        </div>
        <a href="{{ route('seller.products.index') }}" class="btn-secondary">
            Batal
        </a>
    </div>

    @if($errors->any())
    <div class="alert-danger" style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem; border: 1px solid #ef4444;">
        <ul style="margin: 0; padding-left: 1.5rem;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data" class="form-card">
        @csrf
        <div class="form-grid">
            <!-- Basic Info -->
            <div class="form-group full">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Contoh: iPhone 15 Pro Max 256GB Platinum" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="product_category_id">Kategori Produk</label>
                <select name="product_category_id" id="product_category_id" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="condition">Kondisi Barang</label>
                <select name="condition" id="condition" class="form-control" required>
                    <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>Baru</option>
                    <option value="second" {{ old('condition') == 'second' ? 'selected' : '' }}>Bekas (Pre-loved)</option>
                </select>
            </div>

            <div class="form-group full">
                <label for="description">Deskripsi Produk</label>
                <textarea name="description" id="description" class="form-control" placeholder="Jelaskan spesifikasi, keunggulan, dan kondisi produk Anda secara detail..." required>{{ old('description') }}</textarea>
            </div>

            <!-- Pricing & Inventory -->
            <div class="form-group">
                <label for="price">Harga Jual</label>
                <div class="input-prefix">
                    <span class="prefix">Rp</span>
                    <input type="number" name="price" id="price" class="form-control" placeholder="0" value="{{ old('price') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="stock">Stok Produk</label>
                <input type="number" name="stock" id="stock" class="form-control" placeholder="0" value="{{ old('stock') }}" required>
            </div>

            <!-- Media -->
            <div class="form-group full">
                <label>Foto Produk (Maks. 5 Foto)</label>
                <div class="upload-zone" onclick="document.getElementById('images').click()">
                    <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a1 1 0 011.414 0L19 21m-4-4l3 3m1-9a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p>Klik atau Seret foto ke sini untuk mengupload</p>
                    <p style="font-size: 0.75rem; color: var(--gray-600); margin-top: 0.5rem;">Format: JPG, PNG, WEBP (Maks. 2MB per foto)</p>
                </div>
                <input type="file" name="images[]" id="images" class="form-control" style="display: none;" multiple accept="image/*" onchange="previewImages(this)">
                
                <div id="imagePreview" class="preview-container">
                    <!-- Previews will appear here -->
                </div>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('seller.products.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
        </div>
    </form>
</div>

<script>
function previewImages(input) {
    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = '';
    
    if (input.files) {
        const filesArray = Array.from(input.files);
        filesArray.slice(0, 5).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'preview-item';
                div.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                previewContainer.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endsection
