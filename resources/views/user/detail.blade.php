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
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="#">Kategori</a></li>
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Keranjang</a></li>
                </ul>
            </nav>
        </div>
    </header>
 

    <!-- ================= BREADCRUMB ================= -->
    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" class="breadcrumb-item">Beranda</a>
            <span class="breadcrumb-separator">&gt;</span>
            <a href="#" class="breadcrumb-item">Produk</a>
            <span class="breadcrumb-separator">&gt;</span>
            <span class="breadcrumb-item active">{{ $product->name }}</span>
        </div>
    </div>

    <!-- ================= PRODUCT DETAIL ================= -->
    <section class="product-detail container">

        <div class="product-gallery">
            <div class="thumbnail-list">
                <div class="thumbnail-wrapper">
                    @foreach($product->productImages as $key => $image)
                        <img src="{{ asset($image->image) }}" alt="Thumbnail {{ $key }}" class="thumb-img {{ $loop->first ? 'active' : '' }}" />
                    @endforeach
                </div>
            </div>
            
            <div class="main-image-container">
                <img src="{{ asset($product->productImages->first()->image ?? 'uploads/default.png') }}" alt="{{ $product->name }}" class="produk-img">
            </div>
        </div>
        
        <div class="product-info">

            <div class="store-header">
                <span class="store-badge"></span>
                <h3 class="store-name">{{ $product->store->name ?? 'Toko' }}</h3>
                <button class="follow-btn" id="follow-btn">IKUTI</button>
            </div>
            <div class="store-rating">
                <span class="rating-star">⭐⭐⭐⭐</span>
                <span class="rating-value">{{ number_format($average_rating ?? 4.9, 1) }}</span>
                <span class="rating-count">({{ $product->productReviews->count() }})</span>
            </div>
            <h1 class="product-title">{{ $product->name }}</h1>
            <p class="product-category">Kategori: <strong>{{ $product->productCategory->name ?? 'Umum' }}</strong></p>

            <p class="product-description">
                {{ $product->description }}
            </p>

            <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>



            <!-- ================= Add to Cart dengan quantity ================= -->
            <div class="add-to-cart" style="margin: 20px 0;">
                <label for="quantity" style="font-size: 14px; font-weight: 600; color: #333;">Jumlah:</label>
                <div style="display: flex; align-items: center; gap: 10px; margin-top: 8px;">
                    <button type="button" id="minus-btn" style="width: 40px; height: 40px; font-size: 18px; font-weight: 600;">-</button>
                    <input type="number" id="quantity" value="1" min="1" style="width: 60px; height: 40px; text-align:center; font-size: 16px; font-weight: 600;" />
                    <button type="button" id="plus-btn" style="width: 40px; height: 40px; font-size: 18px; font-weight: 600;">+</button>
                </div>

                <div class="button-group" style="display: flex; gap: 12px; margin-top: 25px; width: 100%;">
                    <button class="btn-add-cart" style="margin-top: 0; flex: 1; min-height: 50px;">
                        Tambahkan ke Keranjang
                    </button>

                    <button type="button" onclick="goToCheckout()" class="btn-checkout" style="margin-top: 0; flex: 1; min-height: 50px;">
                        Beli Sekarang
                    </button>
                </div>
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
            alert('Anda sekarang mengikuti toko GadgetHub Official Store!');
        } else {
            followBtn.textContent = 'IKUTI';
            alert('Anda berhenti mengikuti toko GadgetHub Official Store.');
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

        // Update summary when user manually types quantity
        quantityInput.addEventListener('input', () => {
            if (parseInt(quantityInput.value) < 1) {
                quantityInput.value = 1;
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

    // ================= Thumbnail Slider =================
    const thumbnailList = document.querySelector('.thumbnail-list');
    const wrapper = document.querySelector('.thumbnail-wrapper');
    
    // ================= Beli Sekarang Logic =================
    function goToCheckout() {
        const qty = parseInt(document.getElementById('quantity').value) || 1;
        const productId = {{ $product->id }};
        const checkoutUrl = '/checkout?product=' + productId + '&qty=' + qty;
        
        console.log('Going to checkout with qty:', qty);
        console.log('URL:', checkoutUrl);
        
        window.location.href = checkoutUrl;
    }
    
    if (thumbnailList) {
        // Simple scroll implementation
        let isDown = false;
        let startX;
        let scrollLeft;

        thumbnailList.addEventListener('mousedown', (e) => {
            isDown = true;
            thumbnailList.classList.add('active');
            startX = e.pageX - thumbnailList.offsetLeft;
            scrollLeft = thumbnailList.scrollLeft;
        });
        thumbnailList.addEventListener('mouseleave', () => {
            isDown = false;
            thumbnailList.classList.remove('active');
        });
        thumbnailList.addEventListener('mouseup', () => {
            isDown = false;
            thumbnailList.classList.remove('active');
        });
        thumbnailList.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - thumbnailList.offsetLeft;
            const walk = (x - startX) * 3; // scroll-fast
            thumbnailList.scrollLeft = scrollLeft - walk;
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