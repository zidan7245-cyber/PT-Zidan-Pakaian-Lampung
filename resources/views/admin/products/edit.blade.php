@extends('admin.layout')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk: ' . $product->name)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0"><i class="bi bi-pencil-square me-2 text-gold"></i>Edit Produk #{{ $product->id }}</h6>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger py-2 small mb-4">
                        <strong class="d-block mb-1">Ada kesalahan dalam form:</strong>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jumlah Stok (Pcs) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" min="0" required>
                                <span class="input-group-text">pcs</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi Produk <span class="text-danger">*</span></label>
                        <textarea name="description" rows="4" class="form-control" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <!-- Current Image -->
                    <div class="mb-3 p-3 bg-light rounded-3 border">
                        <label class="form-label fw-semibold d-block mb-2">Foto Saat Ini:</label>
                        <div class="d-flex align-items-center gap-3">
                            @if ($product->image)
                                <img src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" width="90" height="90" class="rounded object-fit-cover border shadow-sm">
                                <div>
                                    <small class="text-muted d-block">Path / URL:</small>
                                    <code class="small text-break">{{ $product->image }}</code>
                                </div>
                            @else
                                <span class="text-muted small">Belum ada foto</span>
                            @endif
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ganti Foto Baru (File)</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Atau Ubah URL Gambar</label>
                            <input type="text" name="image_url" class="form-control" placeholder="https://..." value="{{ old('image_url', \Illuminate\Support\Str::startsWith($product->image, 'http') ? $product->image : '') }}">
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end pt-3 border-top">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-gold px-4">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
