@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Ringkasan Toko & Inventaris')

@section('content')
<!-- Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card-admin p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Total Produk</span>
                    <h3 class="fw-bold mb-0 text-dark mt-1">{{ $totalProducts }}</h3>
                    <small class="text-success"><i class="bi bi-box-seam me-1"></i>Tersedia di katalog</small>
                </div>
                <div class="rounded-circle bg-dark p-3 text-gold fs-4 d-flex align-items-center justify-content-center" style="width:54px; height:54px;">
                    <i class="bi bi-bag-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card-admin p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Total Kategori</span>
                    <h3 class="fw-bold mb-0 text-dark mt-1">{{ $totalCategories }}</h3>
                    <small class="text-info"><i class="bi bi-tags me-1"></i>Jenis pakaian</small>
                </div>
                <div class="rounded-circle bg-dark p-3 text-gold fs-4 d-flex align-items-center justify-content-center" style="width:54px; height:54px;">
                    <i class="bi bi-grid-3x3-gap"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card-admin p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Total Stok Fisik</span>
                    <h3 class="fw-bold mb-0 text-dark mt-1">{{ number_format($totalStock, 0, ',', '.') }}</h3>
                    <small class="text-primary"><i class="bi bi-layers me-1"></i>Pcs di gudang</small>
                </div>
                <div class="rounded-circle bg-dark p-3 text-gold fs-4 d-flex align-items-center justify-content-center" style="width:54px; height:54px;">
                    <i class="bi bi-boxes"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card-admin p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Nilai Inventaris</span>
                    <h4 class="fw-bold mb-0 text-dark mt-1">Rp {{ number_format($totalValue, 0, ',', '.') }}</h4>
                    <small class="text-muted"><i class="bi bi-cash-stack me-1"></i>Estimasi aset</small>
                </div>
                <div class="rounded-circle bg-dark p-3 text-gold fs-4 d-flex align-items-center justify-content-center" style="width:54px; height:54px;">
                    <i class="bi bi-cash-coin"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Categories Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0"><i class="bi bi-clock-history me-2 text-gold"></i>Produk Terbaru</h6>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-dark">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Foto</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentProducts as $p)
                                <tr>
                                    <td class="ps-4">
                                        <img src="{{ \Illuminate\Support\Str::startsWith($p->image, ['http://', 'https://']) ? $p->image : asset($p->image) }}" alt="{{ $p->name }}" width="45" height="45" class="rounded object-fit-cover border">
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $p->name }}</div>
                                    </td>
                                    <td><span class="badge bg-dark text-gold">{{ $p->category->name }}</span></td>
                                    <td class="fw-semibold">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($p->stock > 10)
                                            <span class="badge bg-success-subtle text-success border border-success">{{ $p->stock }} pcs</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger border border-danger">{{ $p->stock }} pcs</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm btn-outline-dark">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories List -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0"><i class="bi bi-pie-chart me-2 text-gold"></i>Kategori Pakaian</h6>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-dark">Kelola</a>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($categories as $cat)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                            <div>
                                <span class="fw-bold text-dark d-block">{{ $cat->name }}</span>
                                <small class="text-muted">{{ \Illuminate\Support\Str::limit($cat->description, 35) }}</small>
                            </div>
                            <span class="badge bg-dark text-gold rounded-pill px-3 py-2">{{ $cat->products_count }} produk</span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4 pt-3 border-top d-grid gap-2">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-gold py-2">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Produk Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

