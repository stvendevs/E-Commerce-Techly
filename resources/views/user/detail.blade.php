<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Detail | Techly</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/landingpage/detail.css') }}">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="main-header">
        <div class="container header-content">
            <a href="index.html" class="logo">
            <img src="{{ asset('uploads/weblogo.png') }}" alt="Techly" class="logo-img">
            </a>

            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ route('kategori') }}">Kategori</a></li>
                    <li><a href="{{ route('produk') }}">Produk</a></li>
                    <li><a href="{{ route('keranjang') }}">Keranjang</a></li>
                </ul>
            </nav>
        </div>
    </header>
 

    <!-- ================= PRODUCT DETAIL ================= -->
    <section class="product-detail container">

        <div class="product-gallery">
            <div class="thumbnail-list">
                <div class="thumbnail-wrapper">
                    <img src="{{ asset('uploads/fotoip161.svg') }}" alt="Thumbnail 0" class="thumb-img" />
                    <img src="{{ asset('uploads/fotoip162.svg') }}" alt="Thumbnail 1" class="thumb-img" />
                    <img src="{{ asset('uploads/fotoip163.svg') }}" alt="Thumbnail 2" class="thumb-img" />
                </div>
            </div>
            
            <div class="main-image-container">
                <img src="{{ asset('uploads/produksatu.svg') }}" alt="gambar utama" class="produk-img">
            </div>
        </div>
        
        <div class="product-info">

            <div class="store-header">
                <span class="store-badge"></span>
                <h3 class="store-name">EVERNEXT PHONE</h3>
                <button class="follow-btn" id="follow-btn">IKUTI</button>
            </div>
            <div class="store-rating">
                <span class="rating-star">⭐⭐⭐⭐</span>
                <span class="rating-value">4.9</span>
                <span class="rating-count">(120)</span>
            </div>
            <h1 class="product-title">Iphone 16 Pro Max</h1>
            <p class="product-category">Kategori: <strong>Smartphone</strong></p>

            <p class="product-description">
                iPhone 16 Pro Max mendefinisikan ulang batas performa dengan chip A18 Pro Bionic revolusioner, menghadirkan kecepatan rendering grafis yang belum pernah ada sebelumnya dan kemampuan AI terdepan di industri. 
                Rasakan pengalaman visual yang imersif dan super mulus pada Layar ProMotion Adaptif 144Hz generasi terbaru, ditenagai oleh baterai Ultra-Tahan Lama yang siap menemani kreativitas dan produktivitas Anda sepanjang hari.
                Dengan material Titanium Aerospace Grade yang diperkuat dan sistem kamera Quad-Lens Pro yang menghasilkan detail sinematik, iPhone 16 Pro Max bukan sekadar smartphone, melainkan ekstensi kekuatan, gaya, dan andalan mutlak Anda sehari-hari.
            </p>

            <div class="product-price">Rp 21.499.000</div>



            <!-- ================= Add to Cart dengan quantity ================= -->
            <div class="add-to-cart" style="margin: 20px 0;">
                <label for="quantity">Jumlah:</label>
                <div style="display: flex; align-items: center; gap: 10px; margin-top: 5px;">
                    <button type="button" id="minus-btn">-</button>
                    <input type="number" id="quantity" value="1" min="1" style="width: 50px; text-align:center;" />
                    <button type="button" id="plus-btn">+</button>
                </div>
                <button class="btn-add-cart" style="margin-top: 10px;">Tambahkan ke Keranjang</button>

                <a href="{{ route('checkout', $product->id) }}" class="btn-checkout">
    Beli Sekarang
</a>
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
        // ================= Tombol Ikuti =================
    const followBtn = document.getElementById('follow-btn');

    if (followBtn) {
        followBtn.addEventListener('click', () => {
        followBtn.classList.toggle('is-following');

        // Ubah teks tombol berdasarkan keberadaan class
        if (followBtn.classList.contains('is-following')) {
            followBtn.textContent = 'MENGIKUTI';
            alert('Anda sekarang mengikuti toko Evernext Phone!');
        } else {
            followBtn.textContent = 'IKUTI';
            alert('Anda berhenti mengikuti toko Evernext Phone.');
        }
    });
}
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
        
        const thumbnaillist = document.querySelector('.thumbnail-list');
        const leftArrow = document.querySelector('.left-arrow');
        const rightArrow = document.querySelector('.right-arrow');
        const scrollAmount = 100;

        if (thumbnailList && rightArrow && leftArrow) {
        rightArrow.addEventListener('click', () => {
            thumbnailList.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });

        leftArrow.addEventListener('click', () => {
            thumbnailList.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
    }


    // ================= Main Image Switching =================
    const mainImage = document.querySelector('.produk-img');
    const thumbnails = document.querySelectorAll('.thumb-img');

    if (mainImage && thumbnails.length > 0) {
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                thumbnails.forEach(t => t.classList.remove('active'));
                thumb.classList.add('active');
                mainImage.src = thumb.src;
            });
        });
    } 
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