<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Wisata Kaltim</title>
    
    <!-- CSS -->
    @vite(['resources/css/admin.css'])
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body>

    <div class="admin-wrapper">
        <div class="sidebar-overlay"></div>
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <i class="fas fa-crown"></i>
                <h2>ADMIN PANEL</h2>
            </div>

            <nav class="nav-menu">
                <div class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.destinations') }}" class="nav-link {{ request()->routeIs('admin.destinations') ? 'active' : '' }}">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Destinations</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.consumers') }}" class="nav-link {{ request()->routeIs('admin.consumers') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="{{ route('admin.facilities') }}" class="nav-link {{ request()->routeIs('admin.facilities') ? 'active' : '' }}">
                        <i class="fas fa-concierge-bell"></i>
                        <span>Fasilitas</span>
                    </a>
                </div>
            </nav>

            <div class="sidebar-footer">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Beranda</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" id="admin-logout-form" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log Out</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-dashboard">
            
            <header class="dashboard-header">
                <div class="header-left">
                    <div class="admin-burger">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="header-title-text">
                        @yield('header_title')
                    </div>
                </div>

                <div class="header-right">

                    <div class="admin-profile">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=d4af37&color=000" alt="Admin">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </header>

            @if(session('success'))
                <div style="background: rgba(39, 174, 96, 0.1); color: #27ae60; padding: 15px 25px; border-radius: 12px; margin-bottom: 25px; border: 1px solid rgba(39, 174, 96, 0.2); display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const burger = document.querySelector('.admin-burger');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            const body = document.body;

            if (burger && sidebar && overlay) {
                burger.addEventListener('click', (e) => {
                    sidebar.classList.add('active');
                    overlay.classList.add('active');
                    body.style.overflow = 'hidden';
                });

                overlay.addEventListener('click', () => {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                    body.style.overflow = '';
                });
            }

            // Close sidebar on window resize if it gets larger than 900px
            window.addEventListener('resize', () => {
                if (window.innerWidth > 900) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                    body.style.overflow = '';
                }
            });
        });
    </script>
</body>
</html>
