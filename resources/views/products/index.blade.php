@extends('layouts.app')

@section('title', 'Katalog Produk – RonaWear')

@section('content')
<!-- ===== PAGE HEADER ===== -->
<div class="page-header text-white text-center position-relative">
    <div class="container position-relative" style="z-index:2;">
        <span class="section-subtitle" data-aos="fade-down">Koleksi Lengkap</span>
        <h1 class="fw-bold mb-3 display-5" data-aos="fade-up">
            {{ $selectedCategory ? 'Kategori: ' . $selectedCategory->name : 'Semua Produk RonaWear' }}
        </h1>
        <p class="text-white-50 mb-0 mx-auto" data-aos="fade-up" data-aos-delay="100" style="max-width:500px;">
            Temukan pakaian modern berkualitas premium dari PT Zidan Pakaian Lampung
        </p>
    </div>
</div>

<div class="container py-5">
    <!-- ===== SEARCH BAR (Decorative) ===== -->
    <div class="row justify-content-center mb-4" data-aos="fade-up">
        <div class="col-md-8 col-lg-6">
            <div class="input-group shadow-sm rounded-pill overflow-hidden border">
                <span class="input-group-text bg-white border-0 ps-4"><i class="bi bi-search text-muted"></i></span>
                <input type="text" class="form-control border-0 py-3" placeholder="Cari produk..." style="box-shadow:none; font-size:0.92rem;" disabled>
                <button class="btn btn-gold px-4 rounded-0" type="button" disabled>Cari</button>
            </div>
        </div>
    </div>

    <!-- ===== FILTER KATEGORI ===== -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5" data-aos="fade-up" data-aos-delay="100">
        <a href="{{ route('products.index') }}" class="filter-pill {{ !$selectedCategory ? 'active' : '' }}">
            <i class="bi bi-grid-3x3-gap me-1"></i>Semua
        </a>
        @foreach ($categories as $cat)
            <a href="{{ route('products.index', ['category' => $cat->id]) }}"
               class="filter-pill {{ ($selectedCategory && $selectedCategory->id == $cat->id) ? 'active' : '' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <!-- ===== HASIL & COUNT ===== -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-muted mb-0 small">
            Menampilkan <strong class="text-dark">{{ $products->count() }}</strong> produk
            @if($selectedCategory)
                dalam kategori <strong class="text-gold">{{ $selectedCategory->name }}</strong>
            @endif
        </p>
    </div>

    <!-- ===== DAFTAR PRODUK ===== -->
    <div class="row g-4">
        @forelse ($products as $index => $product)
            <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 80 }}">
                <div class="product-card h-100 d-flex flex-column">
                    <div class="product-img-wrap position-relative">
                        @if ($product->image)
                            <img src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" loading="lazy">
                        @else
                            <div class="text-center text-muted p-4">
                                <i class="bi bi-image fs-1 d-block mb-2 text-gold"></i>
                                <small>{{ $product->name }}</small>
                            </div>
                        @endif
                        <div class="product-img-overlay"></div>
                        <span class="badge-gold position-absolute top-0 end-0 m-3">
                            {{ $product->category->name }}
                        </span>
                        @if($product->stock > 0 && $product->stock <= 10)
                            <span class="badge bg-danger position-absolute top-0 start-0 m-3 small" style="border-radius:6px;">
                                <i class="bi bi-fire me-1"></i>Stok Terbatas
                            </span>
                        @endif
                    </div>
                    <div class="p-3 p-md-4 d-flex flex-column flex-grow-1">
                        <h6 class="fw-bold mb-2" style="font-size:0.95rem;">{{ $product->name }}</h6>
                        <p class="text-muted small mb-3 flex-grow-1 d-none d-md-block" style="line-height:1.7;">
                            {{ \Illuminate\Support\Str::limit($product->description, 90) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center pt-2 pt-md-3 border-top">
                            <span class="product-price" style="font-size:1rem;">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-gold btn-sm px-3 py-1">
                                <i class="bi bi-eye me-1 d-none d-md-inline"></i>Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="py-5" data-aos="fade-up">
                    <i class="bi bi-search display-1 text-gold d-block mb-4" style="opacity:0.5;"></i>
                    <h4 class="fw-bold mb-2">Produk Tidak Ditemukan</h4>
                    <p class="text-muted mb-4">Belum ada produk pada kategori ini. Coba lihat kategori lainnya.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-gold px-4 py-2">
                        <i class="bi bi-arrow-left me-2"></i>Lihat Semua Produk
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
