<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seller Panel')</title>

    {{-- CSS Layout --}}
    <link rel="stylesheet" href="{{ asset('css/seller/seller-layout.css') }}">

    {{-- CSS Halaman --}}
    @yield('head')
</head>
<body>

    {{-- Navbar --}}
    <nav class="seller-navbar">
        <!-- Kiri: Logo + Menu -->
        <div class="nav-left" style="display:flex; align-items:center;">
            <a href="#" class="nav-logo">ShopCo</a>
            <ul class="nav-links">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Produk</a></li>
                <li><a href="#">Pesanan</a></li>
            </ul>
        </div>

        <!-- Kanan: Search + Profil -->
        <div class="nav-right">
            <div class="nav-search">
                <input type="text" placeholder="Cari produk...">
                <i class="fa fa-search"></i>
            </div>
            <div class="nav-profile"></div>
        </div>
    </nav>


    {{-- Konten Halaman --}}
    <main class="seller-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="foot-inner">
            <div style="min-width:200px">
                <div style="font-weight:800;font-family:'Montserrat',sans-serif">SHOP.CO</div>
                <div class="muted-small">Kembangkan toko Anda dengan mudah dan cepat di platform kami.</div>
            </div>

            <div style="display:flex;gap:24px;flex-wrap:wrap">
                <div>
                    <div style="font-weight:700;margin-bottom:8px">Company</div>
                    <div class="muted-small">About<br>Careers<br>Contact</div>
                </div>
                <div>
                    <div style="font-weight:700;margin-bottom:8px">Help</div>
                    <div class="muted-small">Customer Support<br>Delivery Details<br>Terms</div>
                </div>
            </div>
        </div>
    </footer>


</body>
</html>
