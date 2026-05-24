<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SIMASMAS') }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --sidebar-bg: #ffffff;
            --sidebar-color: #475569;
            --sidebar-active-bg: #eff6ff;
            --sidebar-active-color: #2563eb;
            --sidebar-border: #e2e8f0;
            --body-bg: #f8fafc;
            --navbar-bg: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }

        /* Layout Sidebar & Content */
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        .sidebar {
            min-width: 260px;
            max-width: 260px;
            min-height: 100vh;
            background: var(--sidebar-bg);
            color: var(--sidebar-color);
            transition: all 0.3s;
            border-right: 1px solid var(--sidebar-border);
            z-index: 1040;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            width: 100%;
            margin-left: 260px;
            min-height: 100vh;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
        }

        /* Sidebar Styling */
        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--sidebar-border);
        }

        .sidebar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -0.025em;
        }

        .sidebar-nav {
            padding: 1rem 0.75rem;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 0.25rem;
        }

        .nav-link {
            color: var(--sidebar-color);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }

        .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 0.75rem;
            font-size: 1.1rem;
            color: #94a3b8;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: var(--sidebar-active-color);
            background-color: var(--sidebar-active-bg);
        }

        .nav-link:hover i {
            color: var(--sidebar-active-color);
        }

        .nav-link.active {
            color: var(--sidebar-active-color);
            background-color: var(--sidebar-active-bg);
            font-weight: 600;
        }

        .nav-link.active i {
            color: var(--sidebar-active-color);
        }

        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid var(--sidebar-border);
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--navbar-bg);
            border-bottom: 1px solid var(--sidebar-border);
            padding: 0.75rem 1.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.02);
            z-index: 1030;
        }

        .navbar-toggler-icon-custom {
            font-size: 1.25rem;
            color: #64748b;
        }

        /* Content Styling */
        .content {
            padding: 1.5rem 2rem;
            flex-grow: 1;
        }

        /* Modern Cards */
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.025);
            background-color: #fff;
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem 1.5rem;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -260px;
            }

            .sidebar.active {
                margin-left: 0;
                box-shadow: 4px 0 15px rgba(0, 0, 0, 0.05);
            }

            .content-wrapper {
                margin-left: 0;
            }

            .content {
                padding: 1rem;
            }

            /* Overlay */
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.4);
                z-index: 1035;
                display: none;
                backdrop-filter: blur(2px);
            }

            .sidebar-overlay.active {
                display: block;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <i class="fas fa-mosque me-2"></i>{{ config('app.name') }}
                </a>
            </div>

            <div class="sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item mt-3 mb-1 px-3 text-uppercase text-muted"
                        style="font-size: 0.7rem; font-weight: 700; letter-spacing: 0.5px;">Menu Utama</li>

                    @if(auth()->user()->role == 'admin_masjid' || auth()->user()->role == 'super_admin')
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-users"></i> Data Jamaah
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('keuangan.*') ? 'active' : '' }}"
                            href="{{ route('keuangan.index') }}">
                            <i class="fas fa-wallet"></i> Keuangan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kegiatan.*') ? 'active' : '' }}"
                            href="{{ route('kegiatan.index') }}">
                            <i class="fas fa-calendar-alt"></i> Kegiatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-boxes"></i> Inventaris
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-danger w-100 border-0 bg-transparent text-start">
                        <i class="fas fa-sign-out-alt text-danger"></i> Keluar
                    </button>
                </form>
            </div>
        </nav>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand sticky-top">
                <button type="button" id="sidebarCollapse" class="btn btn-link text-decoration-none d-md-none p-0 me-3">
                    <i class="fas fa-bars navbar-toggler-icon-custom"></i>
                </button>

                <div class="ms-auto d-flex align-items-center">
                    <!-- Notifications -->
                    <a href="#" class="text-secondary me-4 position-relative">
                        <i class="far fa-bell fs-5"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    </a>

                    <!-- User Profile Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle"
                            id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-none d-sm-block text-end me-2">
                                <div class="fw-semibold text-dark" style="font-size: 0.875rem;">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="text-muted" style="font-size: 0.75rem;">
                                    {{ ucwords(str_replace('_', ' ', auth()->user()->role)) }}
                                </div>
                            </div>
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2563eb&color=fff"
                                alt="User" width="36" height="36"
                                class="rounded-circle border border-2 border-white shadow-sm">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-2 rounded-3"
                            aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item py-2" href="#"><i class="far fa-user me-2 text-muted"></i>
                                    Profil Saya</a></li>
                            <li><a class="dropdown-item py-2" href="#"><i class="fas fa-cog me-2 text-muted"></i>
                                    Pengaturan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2 text-danger"><i
                                            class="fas fa-sign-out-alt me-2"></i> Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle Logic for Mobile
        document.addEventListener("DOMContentLoaded", fun ction () {
            const sidebar = document.getElementById('sidebar');
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
            }

             if (sidebarCollapse) {
                sidebarCollapse.addEventListener('click', toggleSidebar);
            }
             if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', toggleSidebar);
            }
    });
    </script>
    @stack('scripts')
</body>

</html>