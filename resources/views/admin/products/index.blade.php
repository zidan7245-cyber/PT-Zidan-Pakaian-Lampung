@extends('admin.layout')

@section('title', 'Kelola Produk')
@section('page-title', 'Daftar Produk RonaWear')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <!-- Header with actions & filters -->
    <div class="card-header bg-white py-3 border-bottom">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-md-4">
                <form action="{{ route('admin.products.index') }}" method="GET" class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama / deskripsi..." value="{{ request('search') }}">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('admin.products.index') }}" method="GET" id="filterCategoryForm">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <select name="category" class="form-select" onchange="document.getElementById('filterCategoryForm').submit()">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('admin.products.create') }}" class="btn btn-gold">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Produk Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi Singkat</th>
                        <th class="text-end pe-4" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $p)
                        <tr>
                            <td class="ps-4">
                                <img src="{{ \Illuminate\Support\Str::startsWith($p->image, ['http://', 'https://']) ? $p->image : asset($p->image) }}" alt="{{ $p->name }}" width="50" height="50" class="rounded object-fit-cover border shadow-sm">
                            </td>
                            <td>
                                <strong class="text-dark d-block">{{ $p->name }}</strong>
                                <small class="text-muted">ID: #{{ $p->id }}</small>
                            </td>
                            <td>
                                <span class="badge bg-dark text-gold">{{ $p->category->name }}</span>
                            </td>
                            <td>
                                <span class="fw-bold text-dark">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                @if($p->stock > 10)
                                    <span class="badge bg-success-subtle text-success border border-success">{{ $p->stock }} pcs</span>
                                @elseif($p->stock > 0)
                                    <span class="badge bg-warning-subtle text-warning border border-warning">{{ $p->stock }} pcs</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger">Habis</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">{{ \Illuminate\Support\Str::limit($p->description, 60) }}</small>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-outline-dark" title="Edit Produk">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ $p->name }}?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Hapus Produk">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Tidak ada produk ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if ($products->hasPages())
        <div class="card-footer bg-white py-3 border-top">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Menampilkan {{ $products->firstItem() }} – {{ $products->lastItem() }} dari total {{ $products->total() }} produk
                </small>
                <div>
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

