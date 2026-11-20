@extends('admin.layout')

@section('title', 'Tambah Produk Baru')
@section('page-title', 'Tambah Produk Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0"><i class="bi bi-plus-circle me-2 text-gold"></i>Form Tambah Produk</h6>
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

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Kemeja Tapis Lampung Modern" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
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
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="150000" value="{{ old('price') }}" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jumlah Stok (Pcs) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="30" value="{{ old('stock', 20) }}" min="0" required>
                                <span class="input-group-text">pcs</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi Produk <span class="text-danger">*</span></label>
                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan detail bahan, ukuran, dan keistimewaan produk khas Lampung..." required>{{ old('description') }}</textarea>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Foto Produk (File)</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*" onchange="previewImage(this)">
                            <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 2MB)</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Atau Masukkan URL Gambar</label>
                            <input type="text" name="image_url" class="form-control" placeholder="https://..." value="{{ old('image_url') }}">
                            <small class="text-muted">Jika menggunakan link gambar online</small>
                        </div>
                    </div>

                    <!-- Image Preview -->
                    <div class="mb-4 d-none" id="previewContainer">
                        <label class="form-label fw-semibold d-block">Preview Foto:</label>
                        <img id="imagePreview" src="#" alt="Preview" class="rounded border shadow-sm" style="max-height: 200px; object-fit: cover;">
                    </div>

                    <div class="d-flex gap-2 justify-content-end pt-3 border-top">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-gold px-4">
                            <i class="bi bi-check2-circle me-1"></i> Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(input) {
        const container = document.getElementById('previewContainer');
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
