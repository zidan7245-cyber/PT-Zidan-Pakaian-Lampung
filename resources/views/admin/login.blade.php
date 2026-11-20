<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin – RonaWear | PT Zidan Pakaian Lampung</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-ronawear.jpg') }}" type="image/jpeg">

    <style>
        :root {
            --rw-black: #111111;
            --rw-dark: #1C1C1C;
            --rw-gold: #D4AF37;
            --rw-gold-hover: #B8941F;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0d0d0d 0%, #1a1a1a 50%, #111111 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .brand-font { font-family: 'Playfair Display', serif; }
        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            overflow: hidden;
            max-width: 440px;
            width: 100%;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }
        .login-header {
            background: var(--rw-black);
            padding: 35px 30px;
            text-align: center;
            position: relative;
        }
        .login-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--rw-gold), transparent);
        }
        .btn-gold {
            background: var(--rw-gold);
            color: var(--rw-black);
            font-weight: 700;
            border: none;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-gold:hover {
            background: var(--rw-gold-hover);
            color: #ffffff;
            transform: translateY(-2px);
        }
        .text-gold { color: var(--rw-gold) !important; }
        .form-control:focus {
            border-color: var(--rw-gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.25);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Header -->
        <div class="login-header">
            <img src="{{ asset('images/logo-ronawear.jpg') }}" alt="Logo" width="70" height="70" class="rounded-circle border border-warning mb-3" style="border-width:2px!important">
            <h3 class="brand-font fw-bold text-white mb-1">Rona<span class="text-gold">Wear</span></h3>
            <span class="badge bg-dark border border-warning text-gold small px-3 py-1 text-uppercase" style="letter-spacing:1px; font-size:0.7rem;">
                Panel Admin PT Zidan Pakaian Lampung
            </span>
        </div>

        <!-- Body -->
        <div class="p-4 p-md-5">
            <h5 class="fw-bold mb-1">Masuk ke Dashboard</h5>
            <p class="text-muted small mb-4">Kelola produk pakaian, kategori, dan stok toko RonaWear.</p>

            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger py-2 small mb-3">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success py-2 small mb-3">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email Admin</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                        <input type="email" name="email" class="form-control border-start-0" placeholder="zidan@ronawear.com" value="{{ old('email', 'zidan@ronawear.com') }}" required autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control border-start-0" placeholder="••••••••" value="zidan123" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                        <label class="form-check-label small text-muted" for="remember">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-gold w-100 mb-3">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
                </button>

                <!-- Helper info for UTS evaluator -->
                <div class="p-3 bg-light rounded-3 small border text-muted">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-info-circle me-1 text-gold"></i>Akun Admin Siap Pakai:</strong>
                    <div>Email: <code class="text-dark">zidan@ronawear.com</code> / Pass: <code class="text-dark">zidan123</code></div>
                    <div>Email: <code class="text-dark">admin@ronawear.com</code> / Pass: <code class="text-dark">admin123</code></div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="text-decoration-none small text-muted">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Toko RonaWear
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
