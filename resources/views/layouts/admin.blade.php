<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Wisata Kaltim</title>
    
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
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <i class="fas fa-crown"></i>
                <h2>ADMIN DASHBOARD</h2>
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
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Consumers</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <span>Statistics</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </nav>

            <div class="sidebar-footer">
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
            
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-left">
                    @yield('header_title')
                </div>

                <div class="header-right">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search data...">
                    </div>
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
</body>
</html>
