@extends('layouts.app')

@section('title', $product->name . ' – RonaWear')

@section('content')
<div class="container py-5">
    <!-- ===== BREADCRUMB ===== -->
    <nav aria-label="breadcrumb" class="mb-4" data-aos="fade-down">
        <ol class="breadcrumb small bg-light rounded-pill px-4 py-2 d-inline-flex">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-dark hover-gold"><i class="bi bi-house me-1"></i>Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none text-dark hover-gold">Produk</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category->id]) }}" class="text-decoration-none text-dark hover-gold">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active text-gold fw-semibold" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row g-5 align-items-start">
        <!-- ===== FOTO PRODUK ===== -->
        <div class="col-lg-6" data-aos="fade-right">
            <div class="rounded-4 overflow-hidden border shadow-sm position-relative" style="background: linear-gradient(135deg, #f8f8f8, #f0f0f0);">
                @if ($product->image)
                    <img src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid w-100" style="min-height: 450px; max-height: 550px; object-fit: cover;" loading="lazy">
                @else
                    <div class="text-center text-muted p-5 d-flex flex-column align-items-center justify-content-center" style="min-height: 450px;">
                        <i class="bi bi-image display-1 text-gold d-block mb-3" style="opacity:0.5;"></i>
                        <p class="mb-0 fw-semibold">Belum ada foto produk</p>
                    </div>
                @endif
                <!-- Badge -->
                <span class="badge-gold position-absolute top-0 start-0 m-3 py-2 px-3">
                    <i class="bi bi-tags me-1"></i>{{ $product->category->name }}
                </span>
            </div>
        </div>

        <!-- ===== INFORMASI PRODUK ===== -->
        <div class="col-lg-6" data-aos="fade-left">
            <!-- Category & Name -->
            <span class="badge-gold mb-3 d-inline-block">{{ $product->category->name }}</span>
            <h1 class="fw-bold mb-3" style="font-size: 2rem; line-height:1.2;">{{ $product->name }}</h1>

            <!-- Price -->
            <div class="mb-4 p-3 rounded-3 d-inline-block" style="background:linear-gradient(135deg, #FFF8E1, #FFFDE7); border:1px solid rgba(212,175,55,0.3);">
                <span class="text-gold fw-bold" style="font-size: 1.8rem; font-family: 'Playfair Display', serif;">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </span>
            </div>

            <!-- Stock Status -->
            <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom">
                <span class="text-muted fw-semibold small text-uppercase" style="letter-spacing:1px;">Ketersediaan:</span>
                @if ($product->stock > 0)
                    <span class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill fw-bold">
                        <i class="bi bi-check-circle-fill me-1"></i>Tersedia ({{ $product->stock }} pcs)
                    </span>
                @else
                    <span class="badge bg-danger-subtle text-danger border border-danger px-3 py-2 rounded-pill fw-bold">
                        <i class="bi bi-x-circle-fill me-1"></i>Stok Habis
                    </span>
                @endif
            </div>

            <!-- Size Guide (Decorative) -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase small text-muted mb-3" style="letter-spacing:1.5px;">
                    <i class="bi bi-rulers me-1 text-gold"></i>Pilih Ukuran
                </h6>
                <div class="d-flex flex-wrap gap-2">
                    @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                        <button class="btn btn-outline-dark btn-sm px-3 py-2 rounded-pill fw-bold {{ $size == 'L' ? 'btn-dark text-white' : '' }}" style="min-width:50px;" disabled>
                            {{ $size }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Description -->
            <div class="mb-4 pb-4 border-bottom">
                <h6 class="fw-bold text-uppercase small text-muted mb-3" style="letter-spacing:1.5px;">
                    <i class="bi bi-file-text me-1 text-gold"></i>Deskripsi Produk
                </h6>
                <p class="text-secondary mb-0" style="line-height: 1.9; font-size: 0.95rem;">
                    {{ $product->description }}
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-3 mb-4">
                <a href="https://wa.me/6281234567890?text=Halo%20RonaWear,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}%20(Rp%20{{ number_format($product->price, 0, ',', '.') }})" target="_blank" class="btn btn-gold btn-lg px-4 py-3 flex-grow-1">
                    <i class="bi bi-whatsapp me-2"></i>Pesan via WhatsApp
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg px-4 py-3">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>

            <!-- Share Buttons -->
            <div>
                <h6 class="fw-bold text-uppercase small text-muted mb-3" style="letter-spacing:1.5px;">
                    <i class="bi bi-share me-1 text-gold"></i>Bagikan
                </h6>
                <div class="d-flex gap-2">
                    <a href="#" class="social-icon" style="width:38px; height:38px; font-size:0.85rem;" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon" style="width:38px; height:38px; font-size:0.85rem;" title="Twitter/X">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" style="width:38px; height:38px; font-size:0.85rem;" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($product->name . ' - Rp ' . number_format($product->price, 0, ',', '.') . ' | RonaWear') }}" class="social-icon" style="width:38px; height:38px; font-size:0.85rem;" title="WhatsApp" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== DETAIL TAMBAHAN ===== -->
    <div class="row mt-5 g-4" data-aos="fade-up">
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon" style="width:60px; height:60px;">
                    <i class="bi bi-truck" style="font-size:1.4rem;"></i>
                </div>
                <h6 class="fw-bold mb-2">Pengiriman Cepat</h6>
                <p class="text-muted small mb-0">Dikirim 1–2 hari kerja ke seluruh Indonesia via JNE, J&T, SiCepat</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon" style="width:60px; height:60px;">
                    <i class="bi bi-shield-check" style="font-size:1.4rem;"></i>
                </div>
                <h6 class="fw-bold mb-2">Garansi Kualitas</h6>
                <p class="text-muted small mb-0">Produk dijamin 100% original dan sesuai deskripsi atau uang kembali</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <div class="feature-icon" style="width:60px; height:60px;">
                    <i class="bi bi-headset" style="font-size:1.4rem;"></i>
                </div>
                <h6 class="fw-bold mb-2">Customer Service</h6>
                <p class="text-muted small mb-0">Tim CS siap membantu Anda setiap hari via WhatsApp & email</p>
            </div>
        </div>
    </div>
</div>
@endsection
