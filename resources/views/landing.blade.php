<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temukan dirimu melalui keindahan alam Indonesia. Jelajahi destinasi wisata terbaik di Kalimantan Timur dan seluruh Indonesia.">
    <title>Wisata Indonesia - Temukan Akar Budayamu</title>
    
    <!-- CSS -->
    @vite(['resources/css/style.css'])
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    
    <style>
        /* Immersive Facilities Section Wrapper */
        .facility-immersive-section {
            position: relative;
            height: 100vh;
            min-height: 800px;
            overflow: hidden;
            color: #fff;
            background: #000;
        }

        .facility-bg-layer {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 1;
        }

        .bg-img {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1), transform 8s linear;
            transform: scale(1.1);
        }

        .bg-img.active {
            opacity: 1;
            transform: scale(1);
            z-index: 2;
        }

        .bg-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.1) 100%);
            z-index: 3;
        }

        .facility-container {
            position: relative;
            z-index: 10;
            height: 100%;
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .facility-text-content {
            flex: 1;
            max-width: 650px;
            padding-bottom: 50px;
        }

        .facility-label {
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 5px;
            color: #d4f05c; /* Gold/Accent */
            margin-bottom: 30px;
            position: relative;
            padding-left: 50px;
        }

        .facility-label::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            width: 35px; height: 2px;
            background: #d4f05c;
        }

        .active-facility-info {
            position: relative;
            min-height: 250px;
        }

        .facility-info-item {
            position: absolute;
            top: 0; left: 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
            transform: translateY(30px);
        }

        .facility-info-item.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .facility-big-title {
            font-size: clamp(60px, 8vw, 110px);
            line-height: 0.95;
            margin-bottom: 25px;
            text-shadow: 0 20px 40px rgba(0,0,0,0.5);
            letter-spacing: -2px;
            font-weight: 900;
            font-family: 'Poppins', sans-serif;
        }

        .facility-description {
            font-size: 16px;
            line-height: 1.8;
            color: rgba(255,255,255,0.7);
            max-width: 500px;
            margin-bottom: 30px;
        }

        .btn-discover {
            display: inline-flex;
            align-items: center;
            gap: 20px;
            padding: 20px 40px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 100px;
            color: white;
            text-decoration: none;
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 13px;
            transition: all 0.4s ease;
        }

        .btn-discover:hover {
            background: #fff;
            color: #000;
            transform: translateY(-5px);
        }

        .facility-visual-slider {
            width: 400px;
            height: 400px;
            position: relative;
        }

        .card-stack {
            position: relative;
            width: 100%; height: 100%;
            display: flex;
            align-items: center;
        }

        .facility-card {
            position: absolute;
            width: 250px;
            height: 380px;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .facility-card.active {
            opacity: 0;
            visibility: hidden;
            transform: translateX(-150px) scale(0.8);
        }

        .facility-card.visible-1 { z-index: 5; transform: translateX(0) scale(1); opacity: 1; visibility: visible; pointer-events: auto; }
        .facility-card.visible-2 { z-index: 4; transform: translateX(280px) scale(0.9); opacity: 0.7; visibility: visible; pointer-events: auto; }
        .facility-card.visible-3 { z-index: 3; transform: translateX(560px) scale(0.8); opacity: 0.4; visibility: visible; pointer-events: auto; }

        .card-inner { position: relative; width: 100%; height: 100%; }
        .card-inner img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
        .facility-card:hover img { transform: scale(1.1); }

        .card-text {
            position: absolute;
            bottom: 0; left: 0;
            width: 100%; padding: 40px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        }

        .card-subtitle { display: block; font-size: 12px; font-weight: 700; color: #d4f05c; margin-bottom: 10px; }
        .card-title { font-size: 20px; font-weight: 700; color: white; }

        .facility-controls {
            position: absolute;
            bottom: 80px; left: 60px; right: 60px;
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .nav-arrows { display: flex; gap: 15px; }
        .control-btn {
            width: 55px; height: 55px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.2);
            background: transparent;
            color: white;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all 0.3s ease;
        }
        .control-btn:hover { background: #fff; color: #000; }

        .progress-wrapper { flex: 1; display: flex; align-items: center; gap: 30px; }
        .progress-bar { flex: 1; height: 2px; background: rgba(255,255,255,0.1); position: relative; }
        .progress-line { position: absolute; left: 0; top: 0; height: 100%; width: 0%; background: #d4f05c; transition: width 0.8s ease; }
        
        .slide-count { font-size: 32px; font-weight: 900; display: flex; align-items: baseline; gap: 10px; }
        .total-num { font-size: 16px; opacity: 0.5; }

        @media (max-width: 1100px) {
            .facility-immersive-section { height: auto; padding: 100px 0; }
            .facility-container { flex-direction: column; padding: 0 20px; }
            .facility-visual-slider { display: none; }
            .facility-text-content { text-align: center; max-width: 100%; }
            .active-facility-info { height: auto; position: relative; display: block; margin-bottom: 50px; }
            .facility-info-item { position: relative; width: 100%; }
            .facility-controls { position: relative; bottom: 0; left: 0; right: 0; justify-content: center; margin-top: 40px; }
        }

        /* Restored destination button styles */
        .btn-more-dest {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 18px 45px;
            background: linear-gradient(135deg, #d4f05c 0%, #b8d64a 100%);
            color: #050505;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 100px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 15px 35px rgba(212, 240, 92, 0.25);
            border: 2px solid transparent;
        }
        .btn-more-dest:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 45px rgba(212, 240, 92, 0.4);
            background: #ffffff;
            color: #d4f05c;
            border-color: #d4f05c;
        }
        .btn-more-dest i { font-size: 16px; transition: transform 0.4s ease; }
        .btn-more-dest:hover i { transform: translateX(8px); }
        .more-dest-wrapper { position: relative; padding-bottom: 20px; }
        .more-dest-wrapper::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%;
            transform: translateX(-50%);
            width: 100px; height: 2px;
            background: linear-gradient(90deg, transparent, #d4f05c, transparent);
            opacity: 0.5;
        }
        @media (max-width: 768px) {
            .burger-menu {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                height: 100vh;
                background: rgba(0,0,0,0.95);
                backdrop-filter: blur(10px);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transition: right 0.4s ease;
                z-index: 2000;
                display: flex !important;
            }

            .nav-links.active {
                right: 0;
            }
            
            .nav-items-right {
                display: none; /* Simplify mobile header for now */
            }

            /* Mobile Logout Button */
            .btn-mobile-logout {
                background: rgba(255, 69, 58, 0.1); 
                border: 1px solid rgba(255, 69, 58, 0.3);
                color: #ff453a; 
                padding: 10px 25px;
                border-radius: 100px;
                cursor: pointer;
                text-transform: uppercase;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: 2px;
                transition: all 0.3s ease;
                margin-top: 10px;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .btn-mobile-logout:hover {
                background: #ff453a;
                color: white;
                box-shadow: 0 10px 20px rgba(255, 69, 58, 0.3);
                transform: translateY(-2px);
                border-color: #ff453a;
            }

            .mobile-only-nav {
                display: block;
                margin-top: 20px;
                text-align: center;
                width: 100%;
                border-top: 1px solid rgba(255,255,255,0.1);
                padding-top: 20px;
            }
            .mobile-only-nav li {
                margin: 10px 0;
            }

            /* Mobile Profile Card */
            .mobile-profile-card {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 15px;
                padding: 20px;
                margin: 20px 20px 10px;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .mobile-avatar {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: var(--color-accent);
                color: #000;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
                font-weight: 800;
                box-shadow: 0 0 20px rgba(212, 240, 92, 0.3);
            }

            .mobile-user-name {
                font-size: 16px;
                font-weight: 700;
                color: white;
                letter-spacing: 1px;
            }

            .mobile-role-badge {
                font-size: 10px;
                text-transform: uppercase;
                letter-spacing: 2px;
                color: rgba(255, 255, 255, 0.6);
                background: rgba(255, 255, 255, 0.1);
                padding: 4px 12px;
                border-radius: 20px;
            }

            .admin-panel-btn {
                font-size: 11px;
                color: #000;
                background: var(--color-accent);
                text-decoration: none;
                margin-top: 10px;
                padding: 8px 20px;
                border-radius: 20px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1px;
                box-shadow: 0 0 15px rgba(212, 240, 92, 0.4);
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .admin-panel-btn:active {
                transform: scale(0.95);
                box-shadow: 0 0 5px rgba(212, 240, 92, 0.4);
            }
        }

        @media (min-width: 769px) {
            .mobile-only-nav {
                display: none;
            }
        }

        /* FAQ Styles */
        .faq-section {
            padding: 100px 20px;
            background: #111111;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .faq-title {
            font-size: 36px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 15px;
        }

        .faq-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
        }

        .faq-item {
            background: #1a1a1a;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .faq-question {
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
            color: #ffffff;
        }

        .faq-question i {
            transition: transform 0.3s ease;
            color: #d4f05c;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #1a1a1a;
        }

        .faq-answer-content {
            padding: 0 30px 25px;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
            font-size: 15px;
        }

        .faq-item.active .faq-answer {
            max-height: 300px;
        }

        /* Footer Styles */
        .modern-footer {
            background: #1a1a1a;
            color: #fff;
            padding: 80px 20px 30px;
        }

        .footer-grid {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 60px;
            margin-bottom: 60px;
        }

        .footer-brand .logo {
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            text-decoration: none;
        }

        .footer-brand .logo i {
            color: #d4f05c;
        }

        .footer-brand p {
            color: rgba(255,255,255,0.6);
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background: #d4f05c;
            color: #1a1a1a;
            transform: translateY(-5px);
        }

        .footer-heading {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #fff;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links li a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .footer-links li a:hover {
            color: #d4f05c;
            padding-left: 5px;
        }

        .footer-contact {
            list-style: none;
            padding: 0;
        }

        .footer-contact li {
            display: flex;
            gap: 15px;
            color: rgba(255,255,255,0.6);
            margin-bottom: 20px;
            font-size: 15px;
        }

        .footer-contact i {
            color: #d4f05c;
            margin-top: 5px;
        }

        .footer-bottom {
            max-width: 1300px;
            margin: 0 auto;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgba(255,255,255,0.4);
            font-size: 14px;
        }

        @media (max-width: 1100px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .footer-bottom {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }
    </style>
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="landing-page">
    <!-- Premium Preloader -->
    <div class="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">WISATA</div>
            <div class="preloader-progress">
                <div class="preloader-bar"></div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="main-nav">
        <div class="nav-logo">
            <a href="{{ url('/') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 12px;">
                <i class="fas fa-mountain"></i>
                <span>Wisata</span>
            </a>
        </div>
        

        <ul class="nav-links" id="nav-links-list">
            <li><a href="{{ url('/#beranda') }}">Beranda</a></li>
            <li><a href="{{ url('/#wisata') }}">Destinasi</a></li>
            <li><a href="{{ url('/#faq') }}">FAQ</a></li>

            @guest
                <li class="mobile-only-nav"><a href="{{ url('/login') }}">Masuk</a></li>
                <li class="mobile-only-nav"><a href="{{ url('/register') }}">Daftar</a></li>
            @endguest

            @auth
                <li class="mobile-only-nav">
                    <div class="mobile-profile-card">
                        <div class="mobile-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="mobile-user-name">{{ Auth::user()->name }}</div>
                        <div class="mobile-role-badge">
                            {{ Auth::user()->is_admin ? 'Administrator' : 'Explorer' }}
                        </div>
                        
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="admin-panel-btn">
                                <i class="fas fa-user-shield"></i> Admin Panel
                            </a>
                        @endif
                    </div>
                </li>

                <li class="mobile-only-nav">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-mobile-logout">
                            Keluar
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
        <div class="nav-items-right">
            <div class="nav-auth">
                @guest
                    <a href="{{ url('/login') }}" class="btn-auth btn-login">Masuk</a>
                    <a href="{{ url('/register') }}" class="btn-auth btn-register">Daftar</a>
                @endguest

                @auth
                    <div class="nav-user-profile">
                        <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down" style="font-size: 10px; opacity: 0.5;"></i>
                        
                        <div class="user-dropdown">
                            <div class="dropdown-header">
                                <span class="header-name">{{ Auth::user()->name }}</span>
                                <span class="header-email">{{ Auth::user()->email }}</span>
                            </div>

                            @if(Auth::user()->is_admin)
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/admin') }}" class="dropdown-item" style="color: var(--color-accent);">
                                <i class="fas fa-crown"></i> <span>Admin Panel</span>
                            </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                                <button type="submit" class="logout-btn">
                                    <i class="fas fa-sign-out-alt"></i> Keluar & Hapus Sesi
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="hero-bg-wrapper">
            <!-- Hero Background Video -->
            <video autoplay muted loop playsinline class="hero-bg hero-bg-video" style="object-fit: cover; width: 100%; height: 100%;">
                <source src="{{ asset('images/video-bg.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="hero-overlay"></div>
        </div>
        
        <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        TEMUKAN DIRIMU<br>
                        <span class="hero-title-large">KALIMANTAN TIMUR</span>
                    </h1>
                    <p class="hero-subtitle">
                        Jelajahi keindahan alam dan budaya Indonesia yang memukau.<br>
                        Temukan akar budayamu di setiap destinasi.
                    </p>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
                <div class="scroll-line"></div>
                <span>Scroll</span>
            </div>

            <!-- Side Navigation Dots -->
            <div class="side-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </section>




        <!-- Schedule Section - Modern Card Layout -->
        <section class="schedule-section" id="wisata">
            <div class="schedule-container">
                <div class="schedule-header reveal reveal-fade-up">
                    <span class="schedule-subtitle"></span>
                    <h2 class="schedule-title">Wisata Kaltim</h2>
                    <p class="schedule-desc-text">
                        Pilihlah destinasi yang sesuai dengan gaya petualangan Anda. 
                        Dari pulau eksotis hingga hutan hujan tropis yang menakjubkan.
                    </p>
                </div>
                
                <div class="search-filter-wrapper reveal reveal-fade-up">
                    <div class="search-container">
                        <div class="search-input-group">
                            <i class="fas fa-search"></i>
                            <input type="text" id="dest-search" placeholder="Cari destinasi impian Anda...">
                        </div>
                    </div>
                    
                    <div class="category-filters">
                        <button class="filter-btn active" data-filter="all">Semua</button>
                        @foreach($categories as $category)
                            <button class="filter-btn" data-filter="{{ Str::slug($category->name) }}">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>
                
                <div class="schedule-grid" id="dest-grid">
                    @forelse($destinations as $dest)
                    <div class="schedule-card" 
                         data-category="{{ Str::slug($dest->category->name) }}" 
                         data-name="{{ strtolower($dest->name) }}"
                         @if($loop->iteration > 4) style="display: none; opacity: 0;" @endif>
                        <div class="card-image-wrapper">
                            <img src="{{ $dest->thumbnail ? asset($dest->thumbnail) : asset('images/beach.jpeg') }}" alt="{{ $dest->name }}" class="card-image">
                            <div class="card-badge">
                                <i class="fas fa-star"></i> {{ number_format($dest->rating ?? 4.8, 1) }}
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-location">
                                <i class="fas fa-map-marker-alt"></i> {{ $dest->location }}
                            </div>
                            <h3 class="card-title">{{ $dest->name }}</h3>
                            <p class="card-desc">
                                {{ Str::limit($dest->description, 80) }}
                            </p>
                            <div class="card-footer">
                                <a href="{{ url('/detail?id=' . $dest->id) }}" class="card-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 50px; color: rgba(255,255,255,0.5);">
                        <i class="fas fa-map-marked-alt" style="font-size: 40px; margin-bottom: 20px; display: block;"></i>
                        <p>Belum ada destinasi yang tersedia. Silakan tambahkan melalui Admin Panel.</p>
                    </div>
                    @endforelse
                </div>

                <!-- More Destinations Button -->
                <div class="more-dest-wrapper reveal reveal-fade-up" id="more-dest-btn-container" style="text-align: center; margin-top: 40px;">
                    <a href="{{ url('/packages') }}" class="btn-more-dest">
                        Wisata Lainnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>



        <!-- FAQ Section -->
        <section class="faq-section" id="faq">
            <div class="faq-container reveal reveal-fade-up">
                <div class="faq-header">
                    <h2 class="faq-title">Pertanyaan Umum</h2>
                    <p class="faq-subtitle">Segala hal yang perlu Anda ketahui tentang petualangan bersama kami.</p>
                </div>

                <div class="faq-list">
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Di mana saja lokasi wisata yang tersedia di platform ini?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Saat ini kami fokus pada destinasi unggulan di Kalimantan Timur, mulai dari wisata bahari di Kepulauan Derawan, wisata budaya di Desa Pampang, hingga wisata alam di Bukit Bangkirai dan Pulau Kumala.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Bagaimana cara mendaftarkan destinasi wisata baru?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Jika Anda adalah pengelola destinasi dan ingin bergabung, silakan hubungi tim administrasi kami melalui email mitra@wisatakaltim.com atau melalui kontak WhatsApp yang tertera di footer.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Apakah ada paket tour guide untuk wisatawan asing?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Ya, kami memiliki jaringan pemandu wisata profesional yang fasih berbahasa Inggris dan beberapa bahasa asing lainnya untuk memastikan pengalaman terbaik bagi wisatawan internasional.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Bagaimana jika saya ingin melakukan kerja sama sponsorship?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Kami sangat terbuka untuk kolaborasi yang mendukung kemajuan pariwisata daerah. Silakan kirimkan proposal Anda ke bagian marketing kami melalui alamat email resmi kami.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modern Footer -->
        <footer class="modern-footer">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ url('/') }}" class="logo">
                        <i class="fas fa-mountain"></i>
                        <span>WISATA</span>
                    </a>
                    <p>Membantu Anda menemukan akar budaya dan keindahan alam tersembunyi di seluruh penjuru Kalimantan Timur dan Indonesia.</p>
                    <div class="social-links">
                        <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-nav">
                    <h4 class="footer-heading">NavigasiCepat</h4>
                    <ul class="footer-links">
                        <li><a href="{{ url('/#beranda') }}">Beranda</a></li>
                        <li><a href="{{ url('/#wisata') }}">Destinasi</a></li>
                        <li><a href="{{ url('/packages') }}">Paket Wisata</a></li>
                        <li><a href="{{ url('/trending') }}">Trending</a></li>
                        <li><a href="{{ url('/#faq') }}">FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-nav">
                    <h4 class="footer-heading">Lainnya</h4>
                    <ul class="footer-links">
                        <li><a href="{{ url('/favorites') }}">Favorit Saya</a></li>
                        <li><a href="{{ url('/login') }}">Masuk Akun</a></li>
                        <li><a href="{{ url('/register') }}">Daftar Baru</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Privasi</a></li>
                    </ul>
                </div>

                <div class="footer-nav">
                    <h4 class="footer-heading">Kontak Kami</h4>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Ahmad Yani No. 123, Samarinda, Kalimantan Timur, Indonesia</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <span>+62 812 3456 7890</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>halo@wisatakaltim.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Wisata Kaltim. All rights reserved.</p>
                <p>Designed with <i class="fas fa-heart" style="color: #ff453a;"></i> in Kaltim</p>
            </div>
        </footer>

        <!-- Scroll to Top -->
        <div class="scroll-top">
            <i class="fas fa-chevron-up"></i>
        </div>

    <!-- Footer Hidden as it's now integrated or redundant, keeping empty if needed for JS -->
    <footer class="footer-hidden" style="display:none;"></footer>

    <!-- JavaScript -->
    <script>
        // Preloader & Pageload Animations
        window.addEventListener('load', () => {
            const preloader = document.querySelector('.preloader');
            const preloaderBar = document.querySelector('.preloader-bar');
            
            // Progress bar animation
            if (preloaderBar) preloaderBar.style.width = '100%';
            
            setTimeout(() => {
                if (preloader) preloader.classList.add('fade-out');
                
                // Trigger page entrance animations
                setTimeout(() => {
                    document.querySelector('.main-nav')?.classList.add('is-visible');
                    document.querySelector('.hero-section')?.classList.add('is-visible');
                    
                    // Trigger initial destination filtering
                    if (typeof filterDestinations === 'function') {
                        filterDestinations();
                    }
                }, 300);
            }, 1000);
        });

        // Search and Filter Logic
        const searchInput = document.getElementById('dest-search');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const destCards = document.querySelectorAll('.schedule-card');
        const moreDestBtn = document.getElementById('more-dest-btn-container');

        function filterDestinations() {
            const searchTerm = searchInput.value.toLowerCase();
            const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
            let visibleCount = 0;

            destCards.forEach(card => {
                const name = card.dataset.name;
                const category = card.dataset.category;
                
                const matchesSearch = name.includes(searchTerm);
                const matchesCategory = activeFilter === 'all' || category === activeFilter;

                // Logic: If activeFilter is 'all', only show first 4 that match search
                if (matchesSearch && matchesCategory) {
                    if (activeFilter === 'all' && searchTerm === '') {
                        if (visibleCount < 4) {
                            card.style.display = 'block';
                            setTimeout(() => card.style.opacity = '1', 10);
                            visibleCount++;
                        } else {
                            card.style.opacity = '0';
                            setTimeout(() => card.style.display = 'none', 400);
                        }
                    } else {
                        // For specific category or searching, show all matches
                        card.style.display = 'block';
                        setTimeout(() => card.style.opacity = '1', 10);
                        visibleCount++;
                    }
                } else {
                    card.style.opacity = '0';
                    setTimeout(() => card.style.display = 'none', 400);
                }
            });

            // Show 'Wisata Lainnya' button always
            moreDestBtn.style.display = 'block';
            setTimeout(() => moreDestBtn.style.opacity = '1', 10);
        }

        if (searchInput) {
            searchInput.addEventListener('input', filterDestinations);
            searchInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') e.preventDefault();
            });
            searchInput.addEventListener('click', (e) => e.stopPropagation());
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                filterDestinations();
            });
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Intersection Observer for scroll reveals
        const revealObserverOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        };

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, revealObserverOptions);

        document.querySelectorAll('.reveal').forEach(el => {
            revealObserver.observe(el);
        });

        // Advanced Parallax Effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            
            // Hero Section Parallax
            const heroBg = document.querySelector('.hero-bg');
            const heroContent = document.querySelector('.hero-content');
            
            if (heroBg) {
                // Slower movement for background (0.5 speed)
                heroBg.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
            
            if (heroContent) {
                // Faster/Opposite movement for content for depth
                heroContent.style.transform = `translateY(${scrolled * 0.2}px)`;
                heroContent.style.opacity = 1 - (scrolled / 700);
            }

            // Dynamic Parallax for all elements with data-parallax="true"
            const parallaxElements = document.querySelectorAll('[data-parallax="true"]');
            
            parallaxElements.forEach(el => {
                const section = el.closest('section');
                const speed = parseFloat(el.dataset.speed) || 0.15;
                
                if (section) {
                    const rect = section.getBoundingClientRect();
                    const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                    
                    if (isVisible) {
                        const baseOffset = section.offsetTop;
                        const distance = (window.scrollY - baseOffset) * speed;
                        el.style.transform = `translateY(${distance}px)`;
                    }
                }
            });

            // Navigation background on scroll
            const nav = document.querySelector('.main-nav');
            if (scrolled > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }

            // Enhanced Parallax for Facilities Section
            const facilBg = document.querySelector('.facility-bg-layer[data-parallax="true"]');
            if (facilBg) {
                const rect = facilBg.closest('section').getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    const speed = 0.3;
                    const yPos = -(rect.top * speed);
                    facilBg.style.transform = `translateY(${yPos}px) scale(1.1)`;
                }
            }

            // Update side dots based on scroll position - Smooth active state
            const sections = document.querySelectorAll('section');
            const dots = document.querySelectorAll('.side-dots .dot');
            
            let currentSection = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrolled >= sectionTop - 300) {
                    currentSection = section.getAttribute('id') || ''; 
                    // Basic index fallback if no ID matches
                }
            });
            // (Note: To strictly match dots to sections index-wise as before)
            sections.forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                // Check if section is mainly in view
                if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 2) {
                     dots.forEach(dot => dot.classList.remove('active'));
                     if (dots[index]) dots[index].classList.add('active');
                }
            });
        });

        // Scroll to top button
        const scrollTopBtn = document.querySelector('.scroll-top');
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.story-section, .gallery-section, .schedule-section, .pricing-section, .cta-section').forEach(el => {
            observer.observe(el);
        });

        // Immersive Facilities Slider Logic
        const facilitySection = document.getElementById('fasilitas');
        if (facilitySection) {
            const bgImages = facilitySection.querySelectorAll('.bg-img');
            const infoItems = facilitySection.querySelectorAll('.facility-info-item');
            const facilityCards = facilitySection.querySelectorAll('.facility-card');
            const prevControl = facilitySection.querySelector('.control-btn.prev');
            const nextControl = facilitySection.querySelector('.control-btn.next');
            const progressLine = facilitySection.querySelector('.progress-line');
            const currentNum = facilitySection.querySelector('.current-num');
            
            let curIndex = 0;
            const total = facilityCards.length;
            let isMoving = false;

            function updateFacilitySlider(index) {
                if (isMoving) return;
                isMoving = true;

                // Update Backgrounds
                bgImages.forEach(img => img.classList.remove('active'));
                bgImages[index].classList.add('active');

                // Update Text Info
                infoItems.forEach(item => item.classList.remove('active'));
                infoItems[index].classList.add('active');

                // Update Card Stack Visibility
                facilityCards.forEach((card, i) => {
                    card.classList.remove('active', 'visible-1', 'visible-2', 'visible-3');
                    
                    if (i === index) {
                        card.classList.add('active');
                    } else {
                        // Logic to show next 3 cards in stack
                        let pos = (i - index + total) % total;
                        if (pos > 0 && pos <= 3) {
                            card.classList.add(`visible-${pos}`);
                        }
                    }
                });

                // Update Controls
                if (currentNum) currentNum.textContent = String(index + 1).padStart(2, '0');
                if (progressLine) {
                    const progress = ((index + 1) / total) * 100;
                    progressLine.style.width = `${progress}%`;
                }

                setTimeout(() => {
                    isMoving = false;
                }, 1200);
            }

            if (nextControl) {
                nextControl.addEventListener('click', () => {
                    curIndex = (curIndex + 1) % total;
                    updateFacilitySlider(curIndex);
                });
            }

            if (prevControl) {
                prevControl.addEventListener('click', () => {
                    curIndex = (curIndex - 1 + total) % total;
                    updateFacilitySlider(curIndex);
                });
            }

            // Click on card to go to that slide
            facilityCards.forEach((card, i) => {
                card.addEventListener('click', () => {
                    if (i !== curIndex) {
                        curIndex = i;
                        updateFacilitySlider(curIndex);
                    }
                });
            });

            // Auto init progress
            if (progressLine) progressLine.style.width = `${(1 / total) * 100}%`;

        }

        // Mobile Menu Toggle (DOMContentLoaded wrapper added)
        document.addEventListener('DOMContentLoaded', () => {
            // FAQ Accordion Logic
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all other items
                    faqItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                    });

                    // Toggle current item
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });

            const burgerBtn = document.getElementById('mobile-menu-btn');
            const navLinks = document.getElementById('nav-links-list');
            
            console.log('Mobile menu initialized', burgerBtn, navLinks);

            if (burgerBtn && navLinks) {
                burgerBtn.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default behavior
                    e.stopPropagation(); // Stop bubbling
                    
                    navLinks.classList.toggle('active');
                    console.log('Burger clicked, menu active:', navLinks.classList.contains('active'));
                    
                    // Toggle Icon
                    const icon = burgerBtn.querySelector('i');
                    if (navLinks.classList.contains('active')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
                
                // Close menu when clicking a link
                navLinks.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        navLinks.classList.remove('active');
                        const icon = burgerBtn.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    });
                });

                // Close menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!burgerBtn.contains(e.target) && !navLinks.contains(e.target) && navLinks.classList.contains('active')) {
                        navLinks.classList.remove('active');
                        const icon = burgerBtn.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
            }
        });
    </script>
</body>
</html>
