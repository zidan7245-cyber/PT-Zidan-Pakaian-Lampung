@extends('layouts.app')

@section('title', 'Kategori Pakaian – RonaWear')

@section('content')
<!-- ===== PAGE HEADER ===== -->
<div class="page-header text-white text-center position-relative">
    <div class="container position-relative" style="z-index:2;">
        <span class="section-subtitle" data-aos="fade-down">RonaWear</span>
        <h1 class="fw-bold mb-3 display-5" data-aos="fade-up">Kategori Pakaian</h1>
        <p class="text-white-50 mb-0 mx-auto" data-aos="fade-up" data-aos-delay="100" style="max-width:500px;">
            Pilih kategori pakaian sesuai gaya dan kebutuhan Anda
        </p>
    </div>
</div>

<div class="container py-5">
    @php
        $icons = ['Kaos' => 'bi-tshirt', 'Kemeja' => 'bi-person-badge', 'Hoodie' => 'bi-cloud-snow', 'Jaket' => 'bi-shield', 'Celana' => 'bi-scissors'];
        $colors = ['Kaos' => '#FF6B6B', 'Kemeja' => '#4ECDC4', 'Hoodie' => '#45B7D1', 'Jaket' => '#96CEB4', 'Celana' => '#FFEAA7'];
    @endphp

    <div class="row g-4">
        @foreach ($categories as $index => $category)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="card h-100 product-card border-0 shadow-sm overflow-hidden">
                    <!-- Card Header Gradient -->
                    <div class="p-4 text-center" style="background: linear-gradient(135deg, var(--rw-black), var(--rw-dark));">
                        <div class="category-icon mx-auto" style="border: 2px solid rgba(212,175,55,0.3);">
                            <i class="bi {{ $icons[$category->name] ?? 'bi-tags-fill' }}" style="font-size:1.8rem;"></i>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold mb-0">{{ $category->name }}</h4>
                            <span class="badge bg-dark text-gold px-3 py-2 rounded-pill fw-bold">
                                {{ $category->products_count }} Produk
                            </span>
                        </div>

                        <p class="text-muted mb-4 flex-grow-1" style="line-height:1.8; font-size:0.92rem;">
                            {{ $category->description ?? 'Koleksi pakaian modern berkualitas dari RonaWear.' }}
                        </p>

                        <a href="{{ route('products.index', ['category' => $category->id]) }}" class="btn btn-gold w-100 py-3">
                            Lihat Produk <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ===== CTA ===== -->
    <div class="text-center mt-5 pt-4" data-aos="fade-up">
        <div class="p-5 rounded-4" style="background: linear-gradient(135deg, var(--rw-black), var(--rw-dark)); border: 1px solid rgba(212,175,55,0.2);">
            <h3 class="text-white fw-bold mb-3">Tidak Menemukan Yang Dicari?</h3>
            <p class="text-white-50 mb-4 mx-auto" style="max-width:500px;">
                Hubungi kami langsung via WhatsApp untuk request produk custom atau tanya ketersediaan.
            </p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('products.index') }}" class="btn btn-gold px-4 py-3">
                    <i class="bi bi-bag me-2"></i>Lihat Semua Produk
                </a>
                <a href="https://wa.me/6281234567890?text=Halo%20RonaWear,%20saya%20ingin%20bertanya" target="_blank" class="btn btn-outline-gold px-4 py-3">
                    <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
