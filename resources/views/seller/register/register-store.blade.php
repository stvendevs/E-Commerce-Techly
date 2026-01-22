@extends('layouts.seller.seller')

@section('title', 'Registrasi Toko')

@section('head')
<link rel="stylesheet" href="{{ asset('css/seller/register-store.css') }}">
@endsection

@section('content')
<div class="register-store-container">
    <!-- Header -->
    <div class="page-header">
        <div>
            <h1>Daftarkan Toko Anda</h1>
            <p>Lengkapi informasi toko untuk mulai berjualan di Techly</p>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            {{ session('warning') }}
        </div>
    @endif

    <!-- Form Card -->
    <div class="form-card">
        <form action="{{ route('seller.store.store') }}" method="POST" enctype="multipart/form-data" id="storeForm">
            @csrf

            <!-- Informasi Dasar -->
            <div class="form-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Informasi Dasar
                </h2>

                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="name">
                            Nama Toko <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}"
                            placeholder="Contoh: Techly Store"
                            required
                            class="@error('name') error @enderror"
                        >
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full-width">
                        <label for="about">
                            Deskripsi Toko <span class="required">*</span>
                        </label>
                        <textarea 
                            id="about" 
                            name="about" 
                            rows="4"
                            placeholder="Jelaskan tentang toko Anda, produk yang dijual, dan keunggulan toko..."
                            required
                            class="@error('about') error @enderror"
                        >{{ old('about') }}</textarea>
                        @error('about')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <small class="help-text">Minimal 50 karakter</small>
                    </div>
                </div>
            </div>

            <!-- Kontak & Lokasi -->
            <div class="form-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Kontak & Lokasi
                </h2>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="phone">
                            No Telepon / WhatsApp <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="phone" 
                            name="phone" 
                            value="{{ old('phone') }}"
                            placeholder="08xxxxxxxxxx"
                            required
                            class="@error('phone') error @enderror"
                        >
                        @error('phone')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="city">
                            Kota <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="city" 
                            name="city" 
                            value="{{ old('city') }}"
                            placeholder="Contoh: Jakarta"
                            required
                            class="@error('city') error @enderror"
                        >
                        @error('city')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full-width">
                        <label for="address">
                            Alamat Lengkap <span class="required">*</span>
                        </label>
                        <textarea 
                            id="address" 
                            name="address" 
                            rows="3"
                            placeholder="Jalan, Nomor, RT/RW, Kelurahan, Kecamatan"
                            required
                            class="@error('address') error @enderror"
                        >{{ old('address') }}</textarea>
                        @error('address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="postal_code">
                            Kode Pos <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="postal_code" 
                            name="postal_code" 
                            value="{{ old('postal_code') }}"
                            placeholder="12345"
                            maxlength="5"
                            required
                            class="@error('postal_code') error @enderror"
                        >
                        @error('postal_code')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Logo Toko -->
            <div class="form-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Logo Toko
                </h2>

                <div class="form-group full-width">
                    <label for="logo">Logo Toko (Opsional)</label>
                    <div class="upload-area" id="uploadArea">
                        <input 
                            type="file" 
                            id="logo" 
                            name="logo" 
                            accept="image/jpeg,image/png,image/jpg"
                            class="file-input @error('logo') error @enderror"
                        >
                        <div class="upload-content">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <p class="upload-text">Klik atau drag & drop untuk upload</p>
                            <p class="upload-hint">JPG, PNG (Max. 2MB)</p>
                        </div>
                        <div class="preview-container" id="previewContainer" style="display: none;">
                            <img id="preview" src="" alt="Logo Preview">
                            <button type="button" class="remove-btn" id="removeBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('logo')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <small class="help-text">Ukuran rekomendasi: 500x500 px</small>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
                <a href="{{ route('seller.dashboard') }}" class="btn-cancel">
                    Kembali
                </a>
                <button type="submit" class="btn-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Daftarkan Toko
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Image Preview
const fileInput = document.getElementById('logo');
const uploadArea = document.getElementById('uploadArea');
const previewContainer = document.getElementById('previewContainer');
const preview = document.getElementById('preview');
const removeBtn = document.getElementById('removeBtn');

fileInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            uploadArea.querySelector('.upload-content').style.display = 'none';
            previewContainer.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});

removeBtn.addEventListener('click', function() {
    fileInput.value = '';
    preview.src = '';
    uploadArea.querySelector('.upload-content').style.display = 'flex';
    previewContainer.style.display = 'none';
});

// Drag & Drop
uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('dragover');
});

uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('dragover');
});

uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('dragover');
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        fileInput.files = e.dataTransfer.files;
        fileInput.dispatchEvent(new Event('change'));
    }
});
</script>
@endsection
