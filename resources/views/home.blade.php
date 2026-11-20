@extends('layouts.app')

@section('title', 'RonaWear – Fashion Store | PT Zidan Pakaian Lampung')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="position-relative text-white d-flex align-items-center" style="min-height: 90vh; background: linear-gradient(135deg, rgba(10,10,10,0.85), rgba(17,17,17,0.75), rgba(30,30,30,0.80)), url('https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat fixed;">
    <!-- Decorative Elements -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(ellipse at 30% 50%, rgba(212,175,55,0.08), transparent 60%); pointer-events:none;"></div>
    <div class="position-absolute bottom-0 start-0 w-100" style="height:120px; background:linear-gradient(transparent, rgba(255,255,255,0.03)); pointer-events:none;"></div>

    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                <span class="badge bg-dark border border-warning text-gold px-4 py-2 mb-4 text-uppercase fw-bold" style="letter-spacing: 2.5px; font-size: 0.72rem;">
                    <i class="bi bi-stars me-1"></i> PT Zidan Pakaian Lampung
                </span>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.1;">
                    Gaya Modern,<br>
                    Kualitas <span class="gradient-text">Premium</span>,<br>
                    Harga Terjangkau.
                </h1>
                <p class="lead text-light mb-5" style="opacity: 0.8; max-width: 540px; line-height: 1.8; font-size: 1.05rem;">
                    RonaWear menghadirkan koleksi pakaian harian terbaik — mulai dari kaos, kemeja, hoodie, jaket, hingga celana — diproduksi dengan standar jahitan rapi untuk menunjang kepercayaan diri Anda.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-gold btn-lg px-5 py-3">
                        <i class="bi bi-bag-check me-2"></i>Lihat Koleksi
                    </a>
                    <a href="#about" class="btn btn-outline-gold btn-lg px-5 py-3">
                        <i class="bi bi-info-circle me-2"></i>Tentang Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                <div class="position-relative">
                    <img src="{{ asset('images/logo-ronawear.jpg') }}" alt="RonaWear" class="img-fluid rounded-circle shadow-lg" style="max-width: 320px; border: 4px solid rgba(212,175,55,0.4);">
                    <div class="position-absolute" style="top:-20px;right:-20px;width:100px;height:100px;border:2px solid rgba(212,175,55,0.3);border-radius:50%;"></div>
                    <div class="position-absolute" style="bottom:-15px;left:-15px;width:70px;height:70px;border:2px solid rgba(212,175,55,0.2);border-radius:50%;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4 text-center" data-aos="fade-up" data-aos-delay="800">
        <a href="#stats" class="text-white text-decoration-none" style="opacity:0.5">
            <small class="d-block mb-2" style="letter-spacing:2px; font-size:0.7rem;">SCROLL</small>
            <i class="bi bi-chevron-double-down" style="animation: waFloat 2s ease-in-out infinite;"></i>
        </a>
    </div>
</section>

<!-- ===== STATISTIK ===== -->
<section class="py-5 bg-dark text-white" id="stats">
    <div class="container py-4">
        <div class="row g-4" data-aos="fade-up">
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="mb-2"><i class="bi bi-people-fill text-gold fs-3"></i></div>
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Pelanggan</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="mb-2"><i class="bi bi-box-seam-fill text-gold fs-3"></i></div>
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Produk</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="mb-2"><i class="bi bi-grid-fill text-gold fs-3"></i></div>
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Kategori</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="mb-2"><i class="bi bi-patch-check-fill text-gold fs-3"></i></div>
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Produksi Lokal</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== KATEGORI POPULER ===== -->
<section class="py-5" style="background: var(--rw-light);">
    <div class="container py-4">
        <div class="row mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-subtitle">Eksplorasi</span>
                <h2 class="section-title">Kategori Pakaian</h2>
                <div class="section-divider"></div>
                <p class="text-muted">Temukan berbagai jenis pakaian sesuai gaya dan kebutuhan Anda.</p>
            </div>
            <div class="col-lg-6 text-lg-end d-flex align-items-end justify-content-lg-end" data-aos="fade-left">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-dark btn-sm px-4 py-2 rounded-pill fw-bold">
                    Semua Kategori <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">
            @php
                $icons = ['Kaos' => 'bi-tshirt', 'Kemeja' => 'bi-person-badge', 'Hoodie' => 'bi-cloud-snow', 'Jaket' => 'bi-shield', 'Celana' => 'bi-scissors'];
            @endphp
            @foreach ($categories as $index => $category)
                <div class="col-6 col-md-4 col-lg" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" class="text-decoration-none">
                        <div class="category-card h-100">
                            <div class="category-icon">
                                <i class="bi {{ $icons[$category->name] ?? 'bi-tags' }}"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-2">{{ $category->name }}</h6>
                            <span class="badge bg-light text-dark border small">{{ $category->products_count }} Produk</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== PRODUK TERBARU ===== -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Katalog Pilihan</span>
            <h2 class="section-title">Produk Terbaru RonaWear</h2>
            <div class="section-divider section-divider-center"></div>
            <p class="text-muted mx-auto" style="max-width:550px;">Koleksi terbaru kami yang siap menemani aktivitas harian Anda dengan gaya dan kenyamanan.</p>
        </div>

        <div class="row g-4">
            @forelse ($products as $index => $product)
                <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
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
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h5 class="fw-bold mb-2" style="font-size:1.05rem;">{{ $product->name }}</h5>
                            <p class="text-muted small mb-3 flex-grow-1" style="line-height:1.7;">
                                {{ \Illuminate\Support\Str::limit($product->description, 85) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-gold btn-sm px-3 py-2">
                                    <i class="bi bi-eye me-1"></i>Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-box-seam display-3 text-gold d-block mb-3"></i>
                    <p class="fs-5">Belum ada produk yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg px-5 py-3 rounded-pill fw-bold">
                Lihat Semua Produk <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- ===== KEUNGGULAN ===== -->
<section class="py-5" style="background: var(--rw-light);">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Mengapa Kami?</span>
            <h2 class="section-title">Keunggulan RonaWear</h2>
            <div class="section-divider section-divider-center"></div>
        </div>
        <div class="row g-4">
            <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-size:1.05rem;">Kualitas Premium</h5>
                    <p class="text-muted small mb-0" style="line-height:1.7;">Bahan pilihan dengan jahitan rapi dan standar kontrol kualitas tinggi.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-size:1.05rem;">Harga Terjangkau</h5>
                    <p class="text-muted small mb-0" style="line-height:1.7;">Produk UMKM lokal berkualitas dengan harga yang ramah kantong.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-size:1.05rem;">Desain Modern</h5>
                    <p class="text-muted small mb-0" style="line-height:1.7;">Mengikuti tren fashion terkini dengan sentuhan gaya minimalis.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-size:1.05rem;">Pengiriman Cepat</h5>
                    <p class="text-muted small mb-0" style="line-height:1.7;">Proses cepat dengan pengiriman ke seluruh Indonesia via kurir terpercaya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== ABOUT SECTION ===== -->
<section class="py-5 bg-dark text-white" id="about">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 text-center" data-aos="fade-right">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('images/logo-ronawear.jpg') }}" alt="Logo RonaWear" class="img-fluid rounded-4 shadow-lg" style="max-width: 320px; border: 3px solid rgba(212,175,55,0.4);">
                    <!-- Decorative frame -->
                    <div class="position-absolute" style="top:-15px;left:-15px;width:80px;height:80px;border-top:3px solid var(--rw-gold);border-left:3px solid var(--rw-gold);border-radius:12px 0 0 0;"></div>
                    <div class="position-absolute" style="bottom:-15px;right:-15px;width:80px;height:80px;border-bottom:3px solid var(--rw-gold);border-right:3px solid var(--rw-gold);border-radius:0 0 12px 0;"></div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <span class="section-subtitle">Tentang Perusahaan</span>
                <h2 class="section-title text-white">PT Zidan Pakaian Lampung</h2>
                <div class="section-divider"></div>
                <p class="text-white-50 mb-3" style="line-height: 1.9;">
                    <strong class="text-white">RonaWear</strong> adalah merek fashion lokal yang bernaung di bawah <strong class="text-white">PT Zidan Pakaian Lampung</strong>, sebuah UMKM yang bergerak di bidang produksi dan penjualan pakaian modern dengan harga terjangkau.
                </p>
                <p class="text-white-50 mb-4" style="line-height: 1.9;">
                    Kami memproduksi berbagai kebutuhan busana harian seperti kaos, kemeja, hoodie, jaket, dan celana dengan bahan pilihan serta desain minimalis yang cocok untuk pelajar, mahasiswa, hingga pekerja profesional.
                </p>
                <div class="row g-4 text-center">
                    <div class="col-4">
                        <div class="p-3 rounded-3" style="background:rgba(212,175,55,0.1); border:1px solid rgba(212,175,55,0.2);">
                            <h3 class="text-gold fw-bold mb-1">100%</h3>
                            <small class="text-white-50 fw-semibold">Produksi Lokal</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 rounded-3" style="background:rgba(212,175,55,0.1); border:1px solid rgba(212,175,55,0.2);">
                            <h3 class="text-gold fw-bold mb-1">5+</h3>
                            <small class="text-white-50 fw-semibold">Kategori Fashion</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 rounded-3" style="background:rgba(212,175,55,0.1); border:1px solid rgba(212,175,55,0.2);">
                            <h3 class="text-gold fw-bold mb-1">20+</h3>
                            <small class="text-white-50 fw-semibold">Produk Tersedia</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== TESTIMONIAL ===== -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">Testimoni</span>
            <h2 class="section-title">Apa Kata Pelanggan?</h2>
            <div class="section-divider section-divider-center"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="testimonial-card h-100">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted mb-4" style="line-height:1.8; font-style:italic;">
                        "Hoodie premium-nya super nyaman! Bahannya tebal tapi nggak bikin gerah. Desainnya juga keren banget, sering dapat pujian dari temen-temen kampus."
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center text-gold fw-bold" style="width:45px;height:45px;">AR</div>
                        <div>
                            <h6 class="fw-bold mb-0 small">Ahmad Rizky</h6>
                            <small class="text-muted">Mahasiswa, Lampung</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="testimonial-card h-100">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted mb-4" style="line-height:1.8; font-style:italic;">
                        "Kemeja formalnya bagus banget buat ke kantor. Jahitannya rapi, bahannya adem, dan harganya sangat terjangkau dibanding brand lain. Pasti repeat order!"
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center text-gold fw-bold" style="width:45px;height:45px;">DS</div>
                        <div>
                            <h6 class="fw-bold mb-0 small">Dina Safitri</h6>
                            <small class="text-muted">Karyawan, Jakarta</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card h-100">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <p class="text-muted mb-4" style="line-height:1.8; font-style:italic;">
                        "Celana chino-nya pas banget di badan, bahan stretch-nya enak dipakai seharian. Pengiriman juga cepat, cuma 2 hari sampai. Recommended banget!"
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center text-gold fw-bold" style="width:45px;height:45px;">BP</div>
                        <div>
                            <h6 class="fw-bold mb-0 small">Bayu Pratama</h6>
                            <small class="text-muted">Freelancer, Bandung</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="py-5" style="background: linear-gradient(135deg, var(--rw-black) 0%, #1a1a1a 50%, var(--rw-dark) 100%);">
    <div class="container py-4">
        <div class="row align-items-center justify-content-center text-center" data-aos="zoom-in">
            <div class="col-lg-8">
                <h2 class="text-white fw-bold mb-3 display-6">
                    Siap Tampil <span class="gradient-text">Lebih Keren?</span>
                </h2>
                <p class="text-white-50 mb-4 mx-auto" style="max-width:500px; line-height:1.8;">
                    Jelajahi koleksi lengkap RonaWear atau langsung hubungi kami via WhatsApp untuk pemesanan dan informasi lebih lanjut.
                </p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('products.index') }}" class="btn btn-gold btn-lg px-5 py-3">
                        <i class="bi bi-bag-check me-2"></i>Belanja Sekarang
                    </a>
                    <a href="https://wa.me/6281234567890?text=Halo%20RonaWear,%20saya%20ingin%20memesan%20produk" target="_blank" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">
                        <i class="bi bi-whatsapp me-2"></i>Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
