<p align="center">
  <h1 align="center">🛒 E-Commerce Techly</h1>
  <p align="center">Platform E-Commerce Modern untuk Gadget & Elektronik</p>
</p>

## 📖 Tentang Project

Techly adalah platform e-commerce modern yang dirancang untuk memudahkan jual-beli produk gadget dan elektronik. Dibangun menggunakan Laravel 12 dengan antarmuka yang responsif dan user-friendly.

## ✨ Fitur Utama

### 🛍️ Halaman Pengguna (Customer)
- **Homepage** - Menampilkan katalog produk dengan kategori
- **Detail Produk** - Informasi lengkap produk dengan gambar, deskripsi, dan ulasan
- **Checkout** - Proses pembelian dengan pemilihan alamat dan metode pengiriman
- **Riwayat Transaksi** - Lacak semua pembelian yang telah dilakukan
- **Verifikasi OTP Email** - Keamanan akun dengan verifikasi email

### 🏪 Dashboard Seller
- **Registrasi Toko** - Buat profil toko dengan mudah
- **Manajemen Produk** - CRUD produk dengan multiple image upload
- **Manajemen Pesanan** - Kelola pesanan dan update status pengiriman
- **Saldo & Penarikan** - Kelola pendapatan dan ajukan penarikan dana

### 👨‍💼 Panel Admin
- **Verifikasi Toko** - Approve/reject pengajuan toko baru
- **Manajemen Pengguna** - Kelola semua user yang terdaftar

## 🛠️ Tech Stack

- **Backend:** PHP 8.3, Laravel 12
- **Frontend:** Blade, CSS, JavaScript
- **Authentication:** Laravel Breeze
- **Database:** MySQL/MariaDB

## 📋 Prasyarat

- PHP >= 8.3
- Composer
- NPM
- Database server (MySQL/MariaDB)

## 🚀 Instalasi

1. **Clone repository:**
```bash
git clone https://github.com/stvendevs/E-Commerce-Techly.git
```

2. **Masuk ke folder project:**
```bash
cd E-Commerce-Techly
```

3. **Install dependensi PHP:**
```bash
composer install
```

4. **Setup environment:**
```bash
cp .env.example .env
```

5. **Generate application key:**
```bash
php artisan key:generate
```

6. **Konfigurasi database di file `.env`:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techly_ecommerce
DB_USERNAME=root
DB_PASSWORD=
```

7. **Jalankan migrasi database:**
```bash
php artisan migrate
```

Untuk data dummy:
```bash
php artisan migrate --seed
```

8. **Install dependensi NPM:**
```bash
npm install
npm run build
```

9. **Jalankan development server:**
```bash
php artisan serve
npm run dev
```

10. **Akses aplikasi:**
```
http://localhost:8000
```

## 📁 Struktur Project

```
├── app/
│   ├── Http/Controllers/    # Controller aplikasi
│   ├── Models/              # Model Eloquent
│   └── Mail/                # Mailable classes
├── resources/
│   └── views/               # Blade templates
├── routes/
│   ├── web.php              # Routes utama
│   └── auth.php             # Routes autentikasi
├── database/
│   └── migrations/          # Database migrations
└── public/                  # Assets publik
```

## 📧 Konfigurasi Email (OTP)

Untuk mengaktifkan fitur verifikasi OTP via email, konfigurasi SMTP di `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
```

## 📄 License

Project ini dibuat untuk keperluan pembelajaran dan portfolio.
