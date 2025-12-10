<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Techly</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container nav-flex">
            <a href="/" class="nav-logo">
                <img src="{{ asset('uploads/logotbg.svg') }}" alt="Techly">
            </a>
            <div class="nav-menu">
                <a href="/">Beranda</a>
                <a href="/produk">Produk</a>
                <a href="/keranjang">Keranjang</a>
                <a href="/akun">Akun</a>
            </div>
        </div>
    </nav>

    <section class="checkout container">
        <h2 class="checkout-title">Checkout Pesanan</h2>

        <div class="checkout-wrapper">

            <!-- FORM KIRI -->
            <div class="checkout-card checkout-left">

                <h3>Informasi Pengiriman</h3>

                @if ($errors->any())
                    <div class="alert-error">
                        <p><strong>Harap isi semua field yang wajib.</strong></p>
                    </div>
                @endif

                <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="form-group">
                        <label>Nama Lengkap <span>*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required>
                    </div>

                    <div class="form-group">
                        <label>No. Telepon <span>*</span></label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap <span>*</span></label>
                        <textarea name="alamat" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Kota <span>*</span></label>
                        <input type="text" name="kota" value="{{ old('kota') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kode Pos <span>*</span></label>
                        <input type="text" name="kodepos" value="{{ old('kodepos') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Metode Pengiriman</label>
                        <select name="pengiriman" id="pengiriman" required>
                            <option value="reguler" data-cost="15000">Reguler (Rp 15.000)</option>
                            <option value="express" data-cost="25000">Express (Rp 25.000)</option>
                            <option value="same-day" data-cost="35000">Same Day (Rp 35.000)</option>
                        </select>
                    </div>

                    <h3>Metode Pembayaran</h3>

                    <label class="payment-method">
                        <input type="radio" name="payment" value="bank" required>
                        <div>
                            <strong>Transfer Bank</strong>
                            <p>BRI, BCA, Mandiri, BNI</p>
                        </div>
                    </label>

                    <label class="payment-method">
                        <input type="radio" name="payment" value="kartu">
                        <div>
                            <strong>Kartu Kredit/Debit</strong>
                            <p>Visa, Mastercard</p>
                        </div>
                    </label>

                    <label class="payment-method">
                        <input type="radio" name="payment" value="ewallet">
                        <div>
                            <strong>Dompet Digital</strong>
                            <p>GoPay, OVO, DANA</p>
                        </div>
                    </label>

                    <label class="payment-method">
                        <input type="radio" name="payment" value="cod">
                        <div>
                            <strong>Cash on Delivery (COD)</strong>
                        </div>
                    </label>

                    <div class="security-box">
                        <img src="{{ asset('uploads/lock.svg') }}" alt="secure" class="lock-icon">
                        <span>Pembayaran Aman • Data Anda Terenkripsi</span>
                    </div>

                    <button type="submit" class="btn-pay">Bayar Sekarang</button>

                    <p class="policy-links">
                        Dengan melanjutkan, Anda menyetujui
                        <a href="/kebijakan-pengembalian">Kebijakan Pengembalian</a>
                        dan
                        <a href="/syarat-ketentuan">Syarat & Ketentuan</a>.
                    </p>
                </form>
            </div>

            <!-- RINGKASAN KANAN -->
            <div class="checkout-card checkout-right">

                <h3>Ringkasan Pesanan</h3>

                <div class="product-summary">
                    <img src="{{ asset('uploads/' . ($product->productImages->first()->image ?? 'default.png')) }}" alt="Produk">
                    <div class="product-info">
                        <h4>{{ $product->name }}</h4>
                        <p class="price-text">Rp {{ number_format($product->price,0,',','.') }}</p>
                    </div>
                </div>

                <div class="total-section">
                    <div class="total-line">
                        <span>Subtotal</span>
                        <span id="subtotal">Rp {{ number_format($product->price,0,',','.') }}</span>
                    </div>
                    <div class="total-line">
                        <span>Ongkir</span>
                        <span id="ongkir">Rp 15.000</span>
                    </div>
                    <div class="total-line">
                        <strong>Total</strong>
                        <strong id="total">Rp {{ number_format($product->price + 15000,0,',','.') }}</strong>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('components.footer')

    <script>
        const pengiriman = document.getElementById("pengiriman");
        const ongkirText = document.getElementById("ongkir");
        const totalText = document.getElementById("total");
        const subtotal = {{ $product->price }};

        pengiriman.addEventListener("change", () => {
            const cost = parseInt(pengiriman.selectedOptions[0].dataset.cost);
            ongkirText.textContent = "Rp " + cost.toLocaleString();
            totalText.textContent = "Rp " + (subtotal + cost).toLocaleString();
        });
    </script>

</body>
</html>
