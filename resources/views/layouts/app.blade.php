<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RonaWear - Fashion Store modern dari PT Zidan Pakaian Lampung. Pakaian berkualitas premium dengan harga terjangkau.">
    <title>@yield('title', 'RonaWear – Fashion Store')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- AOS Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-ronawear.jpg') }}" type="image/jpeg">

    <style>
        /* ===== CSS VARIABLES ===== */
        :root {
            --rw-black: #111111;
            --rw-dark: #1C1C1C;
            --rw-darker: #0a0a0a;
            --rw-gold: #D4AF37;
            --rw-gold-light: #E8D48B;
            --rw-gold-hover: #B8941F;
            --rw-gold-glow: rgba(212, 175, 55, 0.3);
            --rw-light: #F8F8F8;
            --rw-gray: #6c757d;
            --rw-white: #FFFFFF;
            --rw-transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            --rw-shadow: 0 10px 40px rgba(0,0,0,0.08);
            --rw-shadow-hover: 0 20px 60px rgba(0,0,0,0.15);
            --rw-radius: 16px;
            --rw-radius-sm: 10px;
        }

        /* ===== GLOBAL ===== */
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--rw-white);
            color: var(--rw-black);
            overflow-x: hidden;
        }
        h1, h2, h3, h4, .brand-font {
            font-family: 'Playfair Display', serif;
        }
        ::selection {
            background: var(--rw-gold);
            color: var(--rw-black);
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--rw-black); }
        ::-webkit-scrollbar-thumb { background: var(--rw-gold); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--rw-gold-hover); }

        img { max-width: 100%; }

        /* ===== NAVBAR ===== */
        .navbar-ronawear {
            background: rgba(17, 17, 17, 0.92);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            padding: 12px 0;
            transition: var(--rw-transition);
        }
        .navbar-ronawear.scrolled {
            background: rgba(10, 10, 10, 0.98);
            padding: 8px 0;
            box-shadow: 0 4px 30px rgba(0,0,0,0.3);
        }
        .navbar-brand-logo {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid var(--rw-gold);
            object-fit: cover;
            transition: var(--rw-transition);
        }
        .navbar-brand:hover .navbar-brand-logo {
            transform: rotate(10deg) scale(1.05);
            box-shadow: 0 0 20px var(--rw-gold-glow);
        }
        .navbar-ronawear .nav-link {
            color: #E0E0E0;
            font-weight: 500;
            font-size: 0.92rem;
            margin: 0 4px;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: var(--rw-transition);
            position: relative;
            letter-spacing: 0.3px;
        }
        .navbar-ronawear .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--rw-gold);
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        .navbar-ronawear .nav-link:hover::after,
        .navbar-ronawear .nav-link.active::after {
            width: 60%;
        }
        .navbar-ronawear .nav-link:hover,
        .navbar-ronawear .nav-link.active {
            color: var(--rw-gold);
        }
        .navbar-toggler {
            border-color: var(--rw-gold) !important;
            padding: 6px 10px;
        }
        .navbar-toggler:focus { box-shadow: 0 0 0 3px var(--rw-gold-glow); }

        /* ===== BUTTONS ===== */
        .btn-gold {
            background: linear-gradient(135deg, var(--rw-gold), var(--rw-gold-hover));
            color: var(--rw-black);
            font-weight: 700;
            border: none;
            border-radius: var(--rw-radius-sm);
            padding: 10px 28px;
            transition: var(--rw-transition);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.88rem;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, var(--rw-gold-hover), #9A7B16);
            color: var(--rw-white);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--rw-gold-glow);
        }
        .btn-outline-gold {
            border: 2px solid var(--rw-gold);
            color: var(--rw-gold);
            font-weight: 700;
            border-radius: var(--rw-radius-sm);
            padding: 10px 28px;
            transition: var(--rw-transition);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.88rem;
            background: transparent;
        }
        .btn-outline-gold:hover {
            background: var(--rw-gold);
            color: var(--rw-black);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--rw-gold-glow);
        }
        .text-gold { color: var(--rw-gold) !important; }
        .bg-gold { background-color: var(--rw-gold) !important; }

        /* ===== SECTION HEADER ===== */
        .section-subtitle {
            color: var(--rw-gold);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.82rem;
            letter-spacing: 3px;
            margin-bottom: 8px;
            display: inline-block;
        }
        .section-title {
            font-weight: 800;
            font-size: 2.4rem;
            margin-bottom: 15px;
            line-height: 1.2;
        }
        .section-divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--rw-gold), var(--rw-gold-light));
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .section-divider-center {
            margin-left: auto;
            margin-right: auto;
        }

        /* ===== PRODUCT CARD ===== */
        .product-card {
            border: 1px solid #EAEAEA;
            border-radius: var(--rw-radius);
            overflow: hidden;
            transition: var(--rw-transition);
            background: var(--rw-white);
            position: relative;
        }
        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--rw-gold), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }
        .product-card:hover::before {
            opacity: 1;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--rw-shadow-hover);
            border-color: var(--rw-gold);
        }
        .product-img-wrap {
            height: 280px;
            background: linear-gradient(135deg, #f5f5f5, #ebebeb);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .product-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .product-card:hover .product-img-wrap img {
            transform: scale(1.08);
        }
        .product-img-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.3));
            height: 60px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .product-card:hover .product-img-overlay {
            opacity: 1;
        }

        /* ===== CATEGORY CARD ===== */
        .category-card {
            border: 1px solid #eee;
            border-radius: var(--rw-radius);
            padding: 32px 24px;
            text-align: center;
            transition: var(--rw-transition);
            background: var(--rw-white);
            position: relative;
            overflow: hidden;
        }
        .category-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--rw-gold);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        .category-card:hover::after {
            transform: scaleX(1);
        }
        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--rw-shadow);
            border-color: var(--rw-gold);
        }
        .category-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--rw-black), var(--rw-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            transition: var(--rw-transition);
        }
        .category-card:hover .category-icon {
            background: linear-gradient(135deg, var(--rw-gold), var(--rw-gold-hover));
            transform: scale(1.1) rotate(5deg);
        }
        .category-icon i {
            font-size: 1.6rem;
            color: var(--rw-gold);
            transition: color 0.3s ease;
        }
        .category-card:hover .category-icon i {
            color: var(--rw-black);
        }

        /* ===== STAT CARD ===== */
        .stat-card {
            text-align: center;
            padding: 30px 20px;
        }
        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--rw-gold);
            line-height: 1;
            margin-bottom: 8px;
        }
        .stat-label {
            font-size: 0.88rem;
            color: rgba(255,255,255,0.7);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ===== FEATURE CARD ===== */
        .feature-card {
            padding: 40px 30px;
            border-radius: var(--rw-radius);
            background: var(--rw-white);
            border: 1px solid #eee;
            transition: var(--rw-transition);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--rw-shadow);
            border-color: var(--rw-gold);
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFF8E1, #FFF3CD);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: var(--rw-transition);
        }
        .feature-card:hover .feature-icon {
            background: linear-gradient(135deg, var(--rw-gold), var(--rw-gold-hover));
            transform: scale(1.1);
        }
        .feature-icon i {
            font-size: 2rem;
            color: var(--rw-gold);
            transition: color 0.3s ease;
        }
        .feature-card:hover .feature-icon i {
            color: var(--rw-white);
        }

        /* ===== TESTIMONIAL ===== */
        .testimonial-card {
            background: var(--rw-white);
            border: 1px solid #eee;
            border-radius: var(--rw-radius);
            padding: 35px 30px;
            transition: var(--rw-transition);
            position: relative;
        }
        .testimonial-card::before {
            content: '\201C';
            font-family: 'Playfair Display', serif;
            font-size: 5rem;
            color: var(--rw-gold);
            opacity: 0.2;
            position: absolute;
            top: 10px;
            left: 20px;
            line-height: 1;
        }
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--rw-shadow);
            border-color: var(--rw-gold);
        }
        .testimonial-stars { color: var(--rw-gold); font-size: 0.9rem; }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, var(--rw-black) 0%, var(--rw-dark) 50%, #2a2a2a 100%);
            padding: 70px 0 60px;
            position: relative;
            overflow: hidden;
        }
        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, var(--rw-gold-glow), transparent 50%),
                        radial-gradient(circle at 80% 50%, rgba(212,175,55,0.1), transparent 50%);
            pointer-events: none;
        }
        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--rw-gold), transparent);
        }

        /* ===== BADGE ===== */
        .badge-gold {
            background: linear-gradient(135deg, var(--rw-black), var(--rw-dark));
            color: var(--rw-gold);
            font-weight: 600;
            font-size: 0.75rem;
            padding: 6px 14px;
            border-radius: 6px;
            border: 1px solid rgba(212,175,55,0.3);
        }

        /* ===== PRICE ===== */
        .product-price {
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--rw-black);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* ===== FOOTER ===== */
        .footer-ronawear {
            background: linear-gradient(180deg, var(--rw-black), var(--rw-darker));
            color: #CCCCCC;
            position: relative;
        }
        .footer-ronawear::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--rw-gold), transparent);
        }
        .footer-link {
            color: #aaa;
            text-decoration: none;
            transition: var(--rw-transition);
            font-size: 0.9rem;
        }
        .footer-link:hover {
            color: var(--rw-gold);
            padding-left: 5px;
        }
        .social-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1.5px solid rgba(212,175,55,0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--rw-gold);
            transition: var(--rw-transition);
            font-size: 1rem;
        }
        .social-icon:hover {
            background: var(--rw-gold);
            color: var(--rw-black);
            border-color: var(--rw-gold);
            transform: translateY(-3px);
        }

        /* ===== BACK TO TOP ===== */
        .back-to-top {
            position: fixed;
            bottom: 100px;
            right: 25px;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--rw-gold);
            color: var(--rw-black);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--rw-transition);
            z-index: 999;
            box-shadow: 0 4px 15px var(--rw-gold-glow);
        }
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        .back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--rw-gold-glow);
        }

        /* ===== WHATSAPP FLOAT ===== */
        .wa-float {
            position: fixed;
            bottom: 30px;
            right: 25px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #25D366;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            z-index: 999;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            transition: var(--rw-transition);
            text-decoration: none;
            animation: waFloat 3s ease-in-out infinite;
        }
        .wa-float:hover {
            transform: scale(1.1);
            color: white;
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.5);
        }
        @keyframes waFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* ===== FILTER PILL ===== */
        .filter-pill {
            border: 1.5px solid #ddd;
            color: var(--rw-black);
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 22px;
            transition: var(--rw-transition);
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-block;
        }
        .filter-pill:hover, .filter-pill.active {
            background: var(--rw-gold);
            border-color: var(--rw-gold);
            color: var(--rw-black);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px var(--rw-gold-glow);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991.98px) {
            .section-title { font-size: 1.8rem; }
            .stat-number { font-size: 2.2rem; }
            .navbar-collapse {
                background: rgba(17,17,17,0.98);
                border-radius: 12px;
                padding: 15px;
                margin-top: 10px;
                border: 1px solid rgba(212,175,55,0.2);
            }
        }
        @media (max-width: 767.98px) {
            .section-title { font-size: 1.5rem; }
            .product-img-wrap { height: 220px; }
            .page-header { padding: 50px 0 40px; }
            .stat-number { font-size: 1.8rem; }
        }
        @media (max-width: 575.98px) {
            .product-img-wrap { height: 200px; }
            .btn-gold, .btn-outline-gold { padding: 8px 20px; font-size: 0.82rem; }
        }

        /* ===== EXTRA ===== */
        .gradient-text {
            background: linear-gradient(135deg, var(--rw-gold), var(--rw-gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hover-gold:hover { color: var(--rw-gold) !important; }

        @yield('styles')
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-ronawear sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-ronawear.jpg') }}" alt="Logo RonaWear" class="navbar-brand-logo">
                <span class="brand-font fw-bold fs-4 text-white">Rona<span class="text-gold">Wear</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="bi bi-house-door me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                            <i class="bi bi-bag me-1"></i>Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ url('/categories') }}">
                            <i class="bi bi-grid me-1"></i>Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#about') }}">
                            <i class="bi bi-info-circle me-1"></i>About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#contact') }}">
                            <i class="bi bi-telephone me-1"></i>Kontak
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="btn btn-outline-gold btn-sm px-3 py-2" href="{{ url('/admin/login') }}">
                            <i class="bi bi-shield-lock me-1"></i>Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer-ronawear py-5 mt-auto" id="contact">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <!-- Brand -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('images/logo-ronawear.jpg') }}" alt="Logo" width="50" height="50" class="rounded-circle border border-warning" style="border-width:2px!important">
                        <div>
                            <span class="brand-font fw-bold fs-4 text-white d-block">Rona<span class="text-gold">Wear</span></span>
                            <small class="text-gold fw-semibold" style="font-size:0.75rem; letter-spacing:1px;">FASHION STORE</small>
                        </div>
                    </div>
                    <p class="small text-white-50 mb-3" style="line-height:1.8">
                        UMKM fashion lokal di bawah naungan <strong class="text-white">PT Zidan Pakaian Lampung</strong> yang memproduksi pakaian modern berkualitas dengan harga terjangkau.
                    </p>
                    <!-- Social Media -->
                    <div class="d-flex gap-2">
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/6281234567890" class="social-icon" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h6 class="text-gold text-uppercase fw-bold mb-3" style="letter-spacing:2px; font-size:0.8rem;">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}" class="footer-link"><i class="bi bi-chevron-right me-1 small"></i>Home</a></li>
                        <li class="mb-2"><a href="{{ url('/products') }}" class="footer-link"><i class="bi bi-chevron-right me-1 small"></i>Produk</a></li>
                        <li class="mb-2"><a href="{{ url('/categories') }}" class="footer-link"><i class="bi bi-chevron-right me-1 small"></i>Kategori</a></li>
                        <li class="mb-2"><a href="{{ url('/#about') }}" class="footer-link"><i class="bi bi-chevron-right me-1 small"></i>About</a></li>
                    </ul>
                </div>

                <!-- Kategori -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h6 class="text-gold text-uppercase fw-bold mb-3" style="letter-spacing:2px; font-size:0.8rem;">Kategori</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/products?category=1') }}" class="footer-link">Kaos</a></li>
                        <li class="mb-2"><a href="{{ url('/products?category=2') }}" class="footer-link">Kemeja</a></li>
                        <li class="mb-2"><a href="{{ url('/products?category=3') }}" class="footer-link">Hoodie</a></li>
                        <li class="mb-2"><a href="{{ url('/products?category=4') }}" class="footer-link">Jaket</a></li>
                        <li class="mb-2"><a href="{{ url('/products?category=5') }}" class="footer-link">Celana</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-lg-4 col-md-6">
                    <h6 class="text-gold text-uppercase fw-bold mb-3" style="letter-spacing:2px; font-size:0.8rem;">Hubungi Kami</h6>
                    <div class="mb-3">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <i class="bi bi-geo-alt-fill text-gold mt-1"></i>
                            <span class="small text-white-50">Jl. Raden Intan No. 45, Bandar Lampung, Lampung 35118, Indonesia</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="bi bi-envelope-fill text-gold"></i>
                            <span class="small text-white-50">cs@ronawear.id</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="bi bi-whatsapp text-gold"></i>
                            <span class="small text-white-50">+62 812-3456-7890</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-clock text-gold"></i>
                            <span class="small text-white-50">Sen – Sab: 08.00 – 21.00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-secondary my-4" style="opacity:0.2">

            <!-- Copyright -->
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small text-white-50 mb-0">
                        &copy; {{ date('Y') }} <span class="text-white fw-semibold">RonaWear</span> — All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <small class="text-white-50">
                        Dikelola oleh <span class="text-gold fw-semibold">PT Zidan Pakaian Lampung</span>
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- ===== WHATSAPP FLOAT ===== -->
    <a href="https://wa.me/6281234567890?text=Halo%20RonaWear,%20saya%20ingin%20bertanya%20tentang%20produk" class="wa-float" target="_blank" title="Chat via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- ===== BACK TO TOP ===== -->
    <button class="back-to-top" id="backToTop" title="Kembali ke atas">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Init AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Navbar scroll effect
        const navbar = document.getElementById('mainNavbar');
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 80) {
                navbar.classList.add('scrolled');
                backToTop.classList.add('show');
            } else {
                navbar.classList.remove('scrolled');
                backToTop.classList.remove('show');
            }
        });

        // Back to top
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    @yield('scripts')
</body>
</html>
