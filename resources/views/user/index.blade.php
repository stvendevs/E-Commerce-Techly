<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Techly | Gadget & Elektronik Terbaru</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/landingpage/home.css') }}"/>
</head>

<body>
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <a href="index.html" class="logo">
                    <img src="{{ asset('uploads/weblogo.png') }}" alt="Techly" class="logo-img" />
                </a>
                <nav class="nav-menu">
                    <a href="#products" class="nav-link">Produk</a>
                    <a href="#categories" class="nav-link">Kategori</a>
                    <a href="#about" class="nav-link">Tentang</a>

                    <a href="checkout.html" class="nav-link cart-link">
                        <span class="cart-icon">🛒</span> Keranjang
                        <span class="cart-count">(0)</span>
                    </a>
                    <a href="login.html" class="nav-link nav-login">
                        <span class="login-icon"></span>Login
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-background"></div>
        <div class="container hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    Upgrade Gadgetmu<br />
                    <span class="gradient-text">Hidup Lebih Smart!</span>
                </h1>
                <p class="hero-subtitle">
                  Dapatkan inovasi elektronik terbaru dengan teknologi mutakhir, harga kompetitif, dan garansi resmi, hanya di sini.
                </p>
                <div class="hero-buttons">
                    <a href="#products" class="btn btn-primary">Lihat Produk</a>
                    <a href="#categories" class="btn btn-secondary">Jelajahi Kategori</a
            >
          </div>
        </div>
        <div class="hero-image">
          <div class="floating-card card-1">📱 Smartphone</div>
          <div class="floating-card card-2">💻 Laptop</div>
          <div class="floating-card card-3">🎧 Audio</div>
          <div class="floating-card card-4">🔌 Aksesoris</div>
        </div>
      </div>
    </section>

    <!-- FEATURED PRODUCTS SECTION -->
    <section id="products" class="product-list-section">
      <div class="container">
        <div class="section-header">
          <h2>Produk Pilihan Terbaik</h2>
          <p class="section-subtitle">
            Koleksi gadget favorit pelanggan dengan rating tertinggi
          </p>
        </div>

        <div class="products-toolbar">
          <div class="toolbar-left">
            <div class="search-input-wrapper">
              <svg
                class="search-icon"
                viewBox="0 0 24 24"
                aria-hidden="true"
                focusable="false"
              >
                <path
                  d="M21 21l-4.35-4.35"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  fill="none"
                />
                <circle
                  cx="11"
                  cy="11"
                  r="6"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  fill="none"
                />
              </svg>

              <input
                id="searchInput"
                class="input-search"
                type="search"
                placeholder="Cari produk..."
                aria-label="Cari produk"
              />
            </div>
          </div>
          <div class="toolbar-right">
            <!-- FILTER KATEGORI -->
            <select id="filterCategory" class="select-sort">
              <option value="">Semua Kategori</option>
              <option value="Smartphone">Smartphone</option>
              <option value="Laptop">Laptop</option>
              <option value="Audio">Audio</option>
              <option value="Aksesoris">Aksesoris</option>
            </select>

            <!-- SORT -->
            <select id="sortSelect" class="select-sort">
              <option value="">Terpopuler</option>
              <option value="price-asc">Harga: Rendah → Tinggi</option>
              <option value="price-desc">Harga: Tinggi → Rendah</option>
              <option value="rating">Rating</option>
              <option value="newest">Terbaru</option>
            </select>

            <div class="view-toggle" role="tablist" aria-label="View toggle">
              <button class="view-btn active" data-view="grid" title="Grid">
                ◻️
              </button>
            </div>
          </div>
        </div>

        <div id="all-products" class="product-grid"></div>
      </div>
    </section>

 <div class="best-seller-container">
            <h3>Produk Paling Laris di Techly</h3>
            <div class="best-seller-grid" id="bestSellerGrid">

                <div class="bs-card">
                    <div class="bs-image">
                        <img src="{{ asset('uploads/produksatu.svg') }}" alt="Smartphone Best Seller">
                    </div>
                    <div class="bs-content">
                        <span class="bs-category">Smartphone</span>
                        <p class="bs-name">Iphone 16 Pro Max</p>
                        <p class="bs-price">Rp 21.499.000 <s class="bs-disc">Rp 23.500.000</s></p>
                        <p class="bs-rating">⭐ 4.9 | 120 Terjual</p>
                        <a href="{{ route('detail') }}#" class="btn btn-add-cart btn-detail-bs">Lihat Detail</a>
                    </div>
                </div>

                <div class="bs-card">
                    <div class="bs-image">
                        <img src="{{ asset('uploads/produkdua.svg') }}" alt="Laptop Best Seller">
                    </div>
                    <div class="bs-content">
                        <span class="bs-category">Laptop</span>
                        <p class="bs-name">Macbook Air M4 13inch</p>
                        <p class="bs-price">Rp 16.599.000 <s class="bs-disc">Rp 18.000.000</s></p>
                        <p class="bs-rating">⭐ 4.8 | 99 Terjual</p>
                        <a href="#" class="btn btn-add-cart btn-detail-bs">Lihat Detail</a>
                    </div>
                </div>

                <div class="bs-card">
                    <div class="bs-image">
                        <img src="{{ asset('uploads/produktiga.svg') }}" alt="Audio Best Seller">
                    </div>
                    <div class="bs-content">
                        <span class="bs-category">Audio</span>
                        <p class="bs-name">Airpods M4</p>
                        <p class="bs-price">Rp 1.975.000 <s class="bs-disc">Rp 2.999.000</s></p>
                        <p class="bs-rating">⭐ 4.7 | 155 Terjual</p>
                        <a href="#" class="btn btn-add-cart btn-detail-bs">Lihat Detail</a>
                    </div>
                </div>

                <div class="bs-card">
                    <div class="bs-image">
                        <img src="{{ asset('uploads/produkempat.svg') }}" alt="Aksesoris Best Seller">
                    </div>
                    <div class="bs-content">
                        <span class="bs-category">Aksesoris</span>
                        <p class="bs-name">Grotic Powebank</p>
                        <p class="bs-price">Rp 249.000 <s class="bs-disc">Rp 115.500</s></p>
                        <p class="bs-rating">⭐ 4.6 | 210 Terjual</p>
                        <a href="#" class="btn btn-add-cart btn-detail-bs">Lihat Detail</a>
                    </div>
                </div>

            </div>
            <div class="best-seller-footer">
              <a href="javascript:void(0)" id="viewMoreBtn" class="btn btn-primary btn-view-more">Lihat Produk Lainnya</a>
            </div>
        </div>

    <!-- CATEGORIES SECTION -->
   <section id="categories" class="category-section">
  <div class="container">

    <!-- SECTION HEADER -->
    <div class="section-header">
      <h2>Telusuri Kategori</h2>
      <p class="section-subtitle">Temukan produk sesuai kebutuhan Anda</p>
    </div>

    <!-- TOP FILTER BAR -->
    <div class="category-top-bar">

      <!-- SEARCH -->
      <div class="search-input-wrapper">
        <svg class="search-icon" viewBox="0 0 24 24">
          <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" fill="none"/>
          <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" fill="none"/>
        </svg>
        <input id="categorySearch" class="input-search" type="search"
          placeholder="Cari kategori atau produk..." aria-label="Cari kategori atau produk">
      </div>

      <!-- FILTER CATEGORY -->
      <select id="filterCategoryRight" class="select-sort">
        <option value="">Semua Kategori</option>
        <option value="Smartphone">Smartphone</option>
        <option value="Laptop">Laptop</option>
        <option value="Audio">Audio</option>
        <option value="Aksesoris">Aksesoris</option>
      </select>

      <!-- PRICE FILTER -->
      <div class="price-filter-group">
        <input id="minPrice" type="number" placeholder="Min: Rp" class="price-input" min="0">
        <span class="separator">-</span>
        <input id="maxPrice" type="number" placeholder="Max: Rp" class="price-input" min="0">
        <button id="filterPriceBtn" class="btn btn-primary">Lihat Hasil </button>
      </div>

    </div>

    <!-- GRID KATEGORI BARU -->
    <div class="category-grid">

      <div class="category-card" data-category="Smartphone">
        <div class="category-img">
          <img src="{{ asset('uploads/hp.svg') }}" alt="Smartphone">
        </div>
        <h3>Smartphone</h3>
        <p>Ponsel pintar terbaru</p>
      </div>

      <div class="category-card" data-category="Laptop">
        <div class="category-img">
          <img src="{{ asset('uploads/laptop.svg') }}" alt="Laptop">
        </div>
        <h3>Laptop</h3>
        <p>Komputer portable bertenaga</p>
      </div>

      <div class="category-card" data-category="Audio">
        <div class="category-img">
          <img src="{{ asset('uploads/audio.svg') }}" alt="Audio">
        </div>
        <h3>Audio</h3>
        <p>Headphone & speaker premium</p>
      </div>

      <div class="category-card" data-category="Aksesoris">
        <div class="category-img">
          <img src="{{ asset('uploads/aksesoris.svg') }}" alt="Aksesoris">
        </div>
        <h3>Aksesoris</h3>
        <p>Perlengkapan & aksesori gadget</p>
      </div>

    </div>

    <div id="category-products" class="product-grid"></div>
  </div>
</section>

    <!-- ABOUT SECTION -->
    <section id="about" class="about-section">
      <div class="container">
        <div class="about-grid">
          <div class="about-text">
            <h2>Apa itu Techly?</h2>
            <p>
              Techly didirikan oleh sekelompok Mahasiswa Fakultas Ilmu Komputer
              Universitas Brawijaya dengan tujuan membuat gadget berkualitas
              lebih mudah diakses oleh semua orang. Kami memilih produk resmi
              dan tepercaya, menjaga harga kompetitif, serta menempatkan layanan
              pelanggan dan transparansi sebagai prioritas.
            </p>
            <p>
              Visi kami adalah menjadi destinasi elektronik terpercaya di
              Indonesia, sedangkan misi kami mencakup kurasi produk bermutu,
              pengiriman cepat, dukungan purna jual yang responsif, dan
              pengalaman belanja yang aman.
            </p>
            <p>
              Kami berpegang pada nilai kepercayaan, kualitas, dan kenyamanan.
              Semua transaksi diproses aman, produk dilengkapi garansi resmi,
              dan kebijakan pengembalian jelas untuk melindungi pelanggan.
            </p>
            <a
              href="about.html"
              class="btn btn-secondary"
              style="margin-top: 12px; display: inline-block"
            >
              Pelajari Lebih Lanjut
            </a>
                </div>

                <div class="about-image" aria-hidden="true">
                    <div class="about-illustration">
                        <img src="{{ asset('uploads/weblogo.png') }}" alt="Ilustrasi Tentang Techly" />
                </div>
            </div>
        </div>
    </section>

    <!-- SIMPLE & USEFUL FOOTER -->
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
      // set dynamic year
      (function () {
        const y = new Date().getFullYear();
        const el = document.getElementById("footerYear");
        if (el) el.textContent = y;
      })();
    </script>
    <!-- SCRIPT -->
    <script src="script.js"></script>
    <script>
    document.getElementById("viewMoreBtn").addEventListener("click", function() {

    const grid = document.getElementById("bestSellerGrid");


    // Tambahkan ke grid
    grid.insertAdjacentHTML("beforeend", newProduct);
});
</script>
<script src="script.js">
</script>

<script>
    // Array produk tambahan ketika dia ngeklik "Lihat Produk Lainnya"
    const newProducts = [
        {
            gambar: 'produkbaru.svg',
            kategori: 'Aksesoris',
            nama: 'Smartwatch Apple Series 6',
            harga: 'Rp 4.899.000',
            diskon: 'Rp 5.000.000',
            rating: '⭐ 4.8 | 199 Terjual',
            detailRoute: "{{ route('detail') }}"
        },
        {
            gambar: 'produkbaru2.svg',
            kategori: 'Audio',
            nama: 'Speaker Nirkabel JBL',
            harga: 'Rp 399.000',
            diskon: 'Rp 500.000',
            rating: '⭐ 4.7 | 133 Terjual',
            detailRoute: "{{ route('detail') }}"
        }
    ];

    let loadIndex = 0;
    const loadLimit = 2; // maksimal 2 produk per klik

    document.getElementById("viewMoreBtn").addEventListener("click", function() {
        const grid = document.getElementById("bestSellerGrid");
        const nextProducts = newProducts.slice(loadIndex, loadIndex + loadLimit);

        nextProducts.forEach(p => {
            const html = `
                <div class="bs-card">
                    <div class="bs-image">
                        <img src="{{ asset('uploads/${p.gambar}') }}" alt="${p.nama}">
                    </div>
                    <div class="bs-content">
                        <span class="bs-category">${p.kategori}</span>
                        <p class="bs-name">${p.nama}</p>
                        <p class="bs-price">${p.harga} <s class="bs-disc">${p.diskon}</s></p>
                        <p class="bs-rating">${p.rating}</p>
                        <a href="${p.detailRoute}" class="btn btn-add-cart btn-detail-bs">Lihat Detail</a>
                    </div>
                </div>
            `;
            grid.insertAdjacentHTML("beforeend", html);
        });

        loadIndex += nextProducts.length;

        if (loadIndex >= newProducts.length) {
            document.getElementById("viewMoreBtn").style.display = 'none';
        }
    });
</script>
  </body>
</html>
