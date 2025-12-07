<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Detail | Techly</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="detail.css" />
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="main-header">
        <div class="container header-content">
            <a href="index.html" class="logo">
                <img src="logo.png" alt="Techly" class="logo-img" />
            </a>

            <nav class="nav-menu">
                <ul>
                    <li><a href="index.html">Beranda</a></li>
                    <li><a href="#categories">Kategori</a></li>
                    <li><a href="#products">Produk</a></li>
                    <li><a href="checkout.html">Keranjang</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- ================= PRODUCT DETAIL ================= -->
    <!-- ================= DETAIL PRODUK ================= -->
    <section class="product-detail container">

        <div class="product-gallery">
            <div class="thumbnail-list">
                <img src="thumb-1.jpg" alt="Thumbnail 1" class="thumb-img active" />
                <img src="thumb-2.jpg" alt="Thumbnail 2" class="thumb-img" />
                <img src="thumb-3.jpg" alt="Thumbnail 3" class="thumb-img" />
            </div>

            <div class="main-image-container">
                <img src="product-sample.jpg" alt="Gambar Produk" class="main-img" />
            </div>
        </div>

        <div class="product-info">

            <div class="store-header">
                <span class="store-badge"></span>
                <h3 class="store-name">EVERNEXT PROJECT</h3>
                <button class="follow-btn">Follow</button>
            </div>
            <div class="store-rating">
                <span class="rating-star">⭐⭐</span>
                <span class="rating-value">4.9</span>
                <span class="rating-count">(130,4 rb)</span>
            </div>
            <h1 class="product-title">Smartphone X Pro</h1>
            <p class="product-category">Kategori: <strong>Smartphone</strong></p>

            <p class="product-description">
                Smartphone X Pro memberikan performa luar biasa dengan prosesor terbaru, layar super mulus, dan baterai tahan lama. Dirancang untuk kecepatan, gaya, dan keandalan sehari-hari.
            </p>

            <div class="product-price">Rp 4.299.000</div>



            <!-- ================= Add to Cart dengan quantity ================= -->
            <div class="add-to-cart" style="margin: 20px 0;">
                <label for="quantity">Jumlah:</label>
                <div style="display: flex; align-items: center; gap: 10px; margin-top: 5px;">
                    <button type="button" id="minus-btn">-</button>
                    <input type="number" id="quantity" value="1" min="1" style="width: 50px; text-align:center;" />
                    <button type="button" id="plus-btn">+</button>
                </div>
                <button class="btn-add-cart" style="margin-top: 10px;">Tambahkan ke Keranjang</button>
            </div>

            <!-- ================= Fitur Ulasan ================= -->
            <div class="product-reviews" style="margin-top: 30px;">
                <h3>Ulasan Produk</h3>
                <div id="reviews-list" style="margin-bottom: 15px;"></div>
                <textarea id="review-input" placeholder="Tulis ulasan Anda..." rows="3" style="width: 100%; padding: 8px;"></textarea>
                <button id="add-review-btn" style="margin-top: 10px;">Kirim Ulasan</button>
            </div>
        </div>
    </section>

    <script>
        // ================= Quantity Add to Cart =================
        const quantityInput = document.getElementById('quantity');
        const plusBtn = document.getElementById('plus-btn');
        const minusBtn = document.getElementById('minus-btn');

        plusBtn.addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });

        minusBtn.addEventListener('click', () => {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });

        document.querySelector('.btn-add-cart').addEventListener('click', () => {
            alert(`Berhasil menambahkan ${quantityInput.value} produk ke keranjang!`);
        });

        // ================= Ulasan Produk =================
        const reviewsList = document.getElementById('reviews-list');
        const reviewInput = document.getElementById('review-input');
        const addReviewBtn = document.getElementById('add-review-btn');

        addReviewBtn.addEventListener('click', () => {
            const text = reviewInput.value.trim();
            if (text === '') return alert('Tulis ulasan terlebih dahulu!');

            const reviewEl = document.createElement('div');
            reviewEl.style.background = '#f1f1f1';
            reviewEl.style.padding = '8px';
            reviewEl.style.marginBottom = '8px';
            reviewEl.style.borderRadius = '6px';
            reviewEl.textContent = text;

            reviewsList.appendChild(reviewEl);
            reviewInput.value = '';
        });
    </script>


    <!-- ================= FOOTER (FROM YOU) ================= -->
    <footer class="footer">
        <div class="footer-container">

            <!-- BRAND -->
            <div class="footer-col">
                <img src="{{ asset('uploads/logotbg.svg') }}" class="footer-logo" alt="Techly">
                <p class="footer-desc">
                    Techly — Gadget & Elektronik terpercaya. Pengiriman cepat dan bergaransi.
                </p>

                <div class="footer-social">
                    <a href="#"><img src="{{ asset('uploads/logofb.svg') }}" class="social-icon-img" alt="Facebook"></a>
                    <a href="#"><img src="{{ asset('uploads/logoig.svg') }}" class="social-icon-img" alt="Instagram"></a>
                    <a href="#"><img src="{{ asset('uploads/logowa.svg') }}" class="social-icon-img" alt="Whatsapp"></a>
                    <a href="#"><img src="{{ asset('uploads/logolinkedin.svg') }}" class="social-icon-img" alt="LinkedIn"></a>
                </div>
            </div>

            <!-- NAVIGASI -->
            <div class="footer-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <!-- KEBIJAKAN -->
            <div class="footer-col">
                <h4>Kebijakan</h4>
                <ul>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Keamanan Pengguna</a></li>
                </ul>
            </div>

            <!-- KONTAK -->
            <div class="footer-col">
                <h4>Kontak</h4>
                <p>Email: <a href="mailto:admintechly@techly.id">admintechly@techly.id</a></p>
                <p>Telp: +62 812-3456-7890</p>
                <p>Alamat: Malang, Jawa Timur</p>
            </div>

            <!-- NEWSLETTER -->
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p>Dapatkan promo & update terbaru.</p>

                <form class="newsletter-form">
                    <input type="email" placeholder="Email kamu..." required>
                    <button type="submit">Daftar</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            © 2025 Techly. Semua hak dilindungi.
        </div>
    </footer>

    <script>
        document.getElementById("footerYear").innerText = new Date().getFullYear();
    </script>

</body>

</html>