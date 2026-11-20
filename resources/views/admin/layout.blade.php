<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') – RonaWear</title>
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
            --rw-dark: #1a1a1a;
            --rw-gold: #D4AF37;
            --rw-gold-hover: #B8941F;
            --sidebar-width: 260px;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }
        .brand-font { font-family: 'Playfair Display', serif; }

        /* Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: var(--rw-black);
            color: #fff;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            display: flex;
            flex-column;
            border-right: 1px solid rgba(212, 175, 55, 0.25);
            transition: all 0.3s ease;
        }
        .admin-sidebar .nav-link {
            color: #b0b0b0;
            font-weight: 500;
            padding: 12px 20px;
            margin: 4px 12px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            color: #111;
            background: var(--rw-gold);
            font-weight: 600;
        }
        .admin-sidebar .nav-link i { font-size: 1.15rem; }

        /* Content area */
        .admin-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }
        .admin-topbar {
            background: #fff;
            border-bottom: 1px solid #e0e0e0;
            padding: 14px 28px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        /* Buttons */
        .btn-gold {
            background: var(--rw-gold);
            color: var(--rw-black);
            font-weight: 600;
            border: none;
        }
        .btn-gold:hover {
            background: var(--rw-gold-hover);
            color: #fff;
        }
        .btn-outline-gold {
            border: 1.5px solid var(--rw-gold);
            color: var(--rw-gold);
            font-weight: 600;
        }
        .btn-outline-gold:hover {
            background: var(--rw-gold);
            color: var(--rw-black);
        }
        .text-gold { color: var(--rw-gold) !important; }

        /* Cards */
        .stat-card-admin {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: transform 0.25s ease;
        }
        .stat-card-admin:hover { transform: translateY(-4px); }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                left: -100%;
            }
            .admin-sidebar.show {
                left: 0;
            }
            .admin-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar d-flex flex-column" id="adminSidebar">
        <!-- Brand -->
        <div class="p-4 border-bottom border-dark border-opacity-50 text-center">
            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none d-flex align-items-center justify-content-center gap-2">
                <img src="{{ asset('images/logo-ronawear.jpg') }}" alt="Logo" width="40" height="40" class="rounded-circle border border-warning">
                <span class="brand-font fw-bold fs-4 text-white">Rona<span class="text-gold">Wear</span></span>
            </a>
            <small class="text-muted d-block mt-1">Admin Panel PT Zidan</small>
        </div>

        <!-- Nav Links -->
        <div class="py-3 flex-grow-1">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Kelola Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-grid"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="nav-item mt-3 pt-3 border-top border-dark border-opacity-50">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link">
                        <i class="bi bi-globe"></i>
                        <span>Lihat Website</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- User / Logout -->
        <div class="p-3 border-top border-dark border-opacity-50 bg-black bg-opacity-25">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2 overflow-hidden">
                    <div class="rounded-circle bg-warning bg-opacity-25 text-gold d-flex align-items-center justify-content-center fw-bold" style="width:36px; height:36px;">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="text-truncate">
                        <small class="d-block fw-bold text-white text-truncate">{{ Auth::user()->name ?? 'Admin Zidan' }}</small>
                        <small class="text-muted text-truncate d-block" style="font-size:0.75rem;">{{ Auth::user()->email ?? 'admin' }}</small>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm p-1 px-2" title="Logout">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Topbar -->
        <header class="admin-topbar d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-dark d-lg-none" type="button" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <h5 class="mb-0 fw-bold">@yield('page-title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-dark text-gold px-3 py-2 border border-warning border-opacity-50">
                    <i class="bi bi-shield-check me-1"></i> PT Zidan Pakaian Lampung
                </span>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-dark btn-sm">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Website
                </a>
            </div>
        </header>

        <!-- Body -->
        <main class="p-4 flex-grow-1">
            <!-- Flash Alert -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Admin Footer -->
        <footer class="bg-white border-top py-3 px-4 text-muted small text-center text-md-start d-flex justify-content-between">
            <span>&copy; {{ date('Y') }} <strong>RonaWear</strong> — Panel Admin PT Zidan Pakaian Lampung</span>
            <span>Versi UTS Fashion Store 1.0</span>
        </footer>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.getElementById('adminSidebar');
        if (sidebarToggle && adminSidebar) {
            sidebarToggle.addEventListener('click', () => {
                adminSidebar.classList.toggle('show');
            });
        }
    </script>
    @yield('scripts')
</body>
</html>

