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
                    <a href="#products" class="nav-link">Product</a>
                    <a href="#categories" class="nav-link">Categories</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="checkout.html" class="nav-link cart-link">
                        <span class="cart-icon">🛒</span> Keranjang
                        <span class="cart-count">(0)</span>
                    </a>
                    <a href="login.html" class="nav-link nav-login">
                        <span class="login-icon">👤</span> Login
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
                    Upgrade Gadgetmu. <br />
                    <span class="gradient-text">Hidup Lebih Smart.</span>
                </h1>
                <p class="hero-subtitle">
                    Temukan inovasi elektronik terbaru dengan teknologi mutakhir, harga kompetitif, dan garansi resmi.
                </p>
                <div class="hero-buttons">
                    <a href="#products" class="btn btn-primary">🔍 Lihat Produk</a>
                    <a href="#categories" class="btn btn-secondary">📂 Jelajahi Kategori</a
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
              <!-- svg icon (left) -->
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
            <!-- FILTER HARGA (DIPINDAHKAN KE BAWAH KATEGORI) -->
            <!-- <div class="filter-price"> ... </div> -->
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
              <option value="">Urutkan: Terpopuler</option>
              <option value="price-asc">Harga: Rendah → Tinggi</option>
              <option value="price-desc">Harga: Tinggi → Rendah</option>
              <option value="rating">Rating</option>
              <option value="newest">Terbaru</option>
            </select>

            <div class="view-toggle" role="tablist" aria-label="View toggle">
              <button class="view-btn active" data-view="grid" title="Grid">
                ◻️
              </button>
              <button class="view-btn" data-view="list" title="List">📋</button>
            </div>
          </div>
        </div>

        <div id="all-products" class="product-grid"></div>
      </div>
    </section>

    <!-- CATEGORIES SECTION -->
    <section id="categories" class="category-section">
      <div class="container">
        <div class="section-header">
          <h2>Telusuri Kategori</h2>
          <p class="section-subtitle">Temukan produk sesuai kebutuhan Anda</p>
        </div>

        <!-- LAYOUT: kategori (kiri) + controls (kanan) -->
        <div class="categories-layout">
          <!-- KIRI: kartu kategori -->
          <div class="category-grid">
            <div class="category-card" data-category="Smartphone">
              <div class="category-icon">📱</div>
              <h3>Smartphone</h3>
              <p>Ponsel pintar terbaru</p>
            </div>
            <div class="category-card" data-category="Laptop">
              <div class="category-icon">💻</div>
              <h3>Laptop</h3>
              <p>Komputer portable bertenaga</p>
            </div>
            <div class="category-card" data-category="Audio">
              <div class="category-icon">🎧</div>
              <h3>Audio</h3>
              <p>Headphone & speaker premium</p>
            </div>
            <div class="category-card" data-category="Aksesoris">
              <div class="category-icon">🔌</div>
              <h3>Aksesoris</h3>
              <p>Perlengkapan & aksesori gadget</p>
            </div>
          </div>

          <!-- KANAN: controls (search + filter harga) -->
          <aside class="category-controls" aria-label="Kontrol Kategori">
            <div class="search-input-wrapper small">
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
                id="categorySearch"
                class="input-search input-search--small"
                type="search"
                placeholder="Cari kategori atau produk..."
                aria-label="Cari kategori atau produk"
              />
            </div>

            <label class="control-label">Filter Kategori</label>
            <select id="filterCategoryRight" class="select-sort">
              <option value="">Semua Kategori</option>
              <option value="Smartphone">Smartphone</option>
              <option value="Laptop">Laptop</option>
              <option value="Audio">Audio</option>
              <option value="Aksesoris">Aksesoris</option>
            </select>

            <label class="control-label" style="margin-top: 12px"
              >Filter Harga</label
            >
            <div class="filter-price-vertical">
              <div class="price-row">
                <input
                  id="minPrice"
                  type="number"
                  placeholder="Min: Rp"
                  class="price-input"
                  min="0"
                  step="1000"
                  inputmode="numeric"
                  aria-label="Harga minimum"
                />
                <small class="price-note">Min</small>
              </div>

              <div class="price-row">
                <input
                  id="maxPrice"
                  type="number"
                  placeholder="Max: Rp"
                  class="price-input"
                  min="0"
                  step="1000"
                  inputmode="numeric"
                  aria-label="Harga maksimum"
                />
                <small class="price-note">Max</small>
              </div>

              <button
                id="filterPriceBtn"
                class="btn btn-primary btn-block"
                style="margin-top: 10px"
              >
                🔍 Terapkan
              </button>
            </div>
          </aside>
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
                    <div class="about-illustration">📦</div>
                </div>
            </div>
        </div>
    </section>

    <!-- IMPROVED FOOTER -->
    <footer class="main-footer simple-footer" role="contentinfo">
        <div class="container footer-inner">
            <div class="footer-brand">
                <a href="index.html" class="footer-logo" aria-label="Techly — Beranda">
                    <span class="footer-logo-icon">⚡</span>
                    <span class="footer-logo-text">Techly</span>
                </a>
                <p class="footer-desc">
                    Gadget & elektronik berkualitas. Pengiriman cepat, garansi resmi.
                </p>
                <div class="social-links" aria-hidden="true">
                    <a href="#" class="social-icon" aria-label="Facebook">f</a>
                    <a href="#" class="social-icon" aria-label="Instagram">📷</a>
                    <a href="#" class="social-icon" aria-label="Twitter">𝕏</a>
                </div>
            </div>

            <nav class="footer-nav" aria-label="Footer navigation">
                <ul>
                    <li><a href="#products">Produk</a></li>
                    <li><a href="#categories">Kategori</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="checkout.html">Keranjang</a></li>
                </ul>
            </nav>

            <div class="footer-contact">
                <a href="mailto:hello@techly.id" class="contact-email">hello@techly.id</a
          >
          <div class="footer-badges">
            <span class="badge small">🔒 Aman</span>
            <span class="badge small">⭐ Garansi</span>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="container">
          <p>
            © <span id="footerYear">2025</span> Techly. Semua hak dilindungi.
          </p>
        </div>
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
  </body>
</html>