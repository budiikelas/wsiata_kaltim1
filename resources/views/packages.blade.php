<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pilihan Paket Wisata Terbaik di Kalimantan Timur dan Seluruh Indonesia.">
    <title>NexTrip - Packages App</title>
    
    <!-- CSS -->
    @vite(['resources/css/style.css'])
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --app-bg: #0f1113;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --glass-blur: 50px;
            --accent-glow: rgba(212, 240, 92, 0.2);
            --sidebar-width: 80px;
        }

        body {
            background: #000;
            background-image: radial-gradient(circle at 50% 50%, #1a1e21 0%, #000 100%);
            height: 100vh;
            overflow: hidden;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* The Main App Container Overlaying the Background */
        .app-window {
            width: 95vw;
            height: 90vh;
            background: rgba(20, 25, 30, 0.6);
            backdrop-filter: blur(var(--glass-blur));
            -webkit-backdrop-filter: blur(var(--glass-blur));
            border: 1px solid var(--glass-border);
            border-radius: 40px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 50px 100px rgba(0,0,0,0.8);
            position: relative;
        }

        /* Sidebar - Left Vertical Icons */
        .app-sidebar {
            width: var(--sidebar-width);
            background: rgba(255, 255, 255, 0.02);
            border-right: 1px solid var(--glass-border);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 0;
            gap: 40px;
        }

        .sidebar-logo {
            font-size: 24px;
            color: var(--color-accent);
            margin-bottom: 20px;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 30px;
            align-items: center;
        }

        .nav-icon {
            color: rgba(255,255,255,0.4);
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .nav-icon.active, .nav-icon:hover {
            color: var(--color-accent);
            transform: scale(1.1);
        }

        .sidebar-footer {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 25px;
            align-items: center;
        }

        /* Main Content Container */
        .app-main {
            flex: 1;
            padding: 40px 50px;
            overflow-y: auto;
            position: relative;
        }

        /* Custom Scrollbar */
        .app-main::-webkit-scrollbar {
            width: 6px;
        }
        .app-main::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        /* TopBar - Search & Categories */
        .app-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
            z-index: 1000;
        }

        .app-search {
            background: rgba(255,255,255,0.05);
            padding: 12px 25px;
            border-radius: 100px;
            display: flex;
            align-items: center;
            gap: 15px;
            width: 400px;
            border: 1px solid rgba(255,255,255,0.05);
            position: relative;
            z-index: 1001;
            cursor: text;
        }

        .app-search i { color: #888; }
        .app-search input {
            background: transparent;
            border: none;
            outline: none;
            color: white;
            font-size: 14px;
            width: 100%;
            cursor: text;
            pointer-events: auto;
        }

        .app-categories {
            display: flex;
            gap: 25px;
        }

        .cat-pill {
            font-size: 13px;
            font-weight: 500;
            color: rgba(255,255,255,0.5);
            cursor: pointer;
            padding: 8px 15px; /* Increased padding */
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid transparent;
            border-radius: 100px;
        }

        .cat-pill:hover {
            color: white;
            background: rgba(212, 240, 92, 0.05);
            border-color: rgba(212, 240, 92, 0.3);
            box-shadow: 0 0 20px rgba(212, 240, 92, 0.15);
            transform: translateY(-2px);
        }

        .cat-pill.active {
            color: white;
        }

        .cat-pill.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 15px;
            height: 3px;
            background: var(--color-accent);
            border-radius: 10px;
        }

        /* Hero Featured Card */
        .hero-featured {
            position: relative;
            height: 450px;
            border-radius: 30px;
            overflow: hidden;
            margin-bottom: 50px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
        }

        .hero-featured-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-featured-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 60px;
        }

        .hero-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--color-accent);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            max-width: 500px;
            margin-bottom: 20px;
            line-height:1.2;
        }

        .hero-desc {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.7;
            margin-bottom: 25px;
            display: -webkit-box;
            /* -webkit-line-clamp: 3; */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .package-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .package-price {
            display: flex;
            flex-direction: column;
        }

        .price-label {
            font-size: 11px;
            opacity: 0.7;
            margin-bottom: 2px;
        }

        .price-value {
            font-size: 18px;
            font-weight: 700;
        }

        .price-value span {
            font-size: 12px;
            font-weight: 400;
            opacity: 0.7;
        }

        .btn-learn-more {
            padding: 12px 25px;
            background: var(--color-white);
            color: var(--color-black);
            text-decoration: none;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-learn-more:hover {
            background: var(--color-accent);
            color: var(--color-white);
        }

        /* NexTrip Footer Style */
        .nextrip-footer {
            background: #111;
            color: #fff;
            padding: 80px 0 40px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 60px;
            margin-bottom: 60px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
        }

        .btn-main {
            background: #fff;
            color: #000;
            padding: 15px 35px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .btn-sub {
            background: rgba(255,255,255,0.1);
            color: #fff;
            padding: 15px 25px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 600;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-main:hover { transform: scale(1.05); background: var(--color-accent); }
        .btn-sub:hover { background: rgba(255,255,255,0.2); }

        /* Shelf Section (Grid) */
        .shelf-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .shelf-title {
            font-size: 20px;
            font-weight: 700;
        }

        .shelf-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .small-card {
            background: rgba(255,255,255,0.02);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.05);
            transition: all 0.4s ease;
        }

        .small-card:hover {
            transform: translateY(-8px) scale(1.02);
            background: rgba(255,255,255,0.08);
            border-color: var(--color-accent);
            box-shadow: 0 20px 40px rgba(0,0,0,0.6), 0 0 25px rgba(212, 240, 92, 0.2);
        }

        .small-card-img-box {
            height: 140px;
            position: relative;
        }

        .small-card-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .play-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .small-card:hover .play-overlay { opacity: 1; }

        .small-card-content {
            padding: 15px;
        }

        .small-card-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .small-card-meta {
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            display: flex;
            justify-content: space-between;
        }

        .package-item, .glass-mini-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* MOBILE RESPONSIVE STYLES */
        .mobile-header {
            display: none;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background: rgba(0,0,0,0.4);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 2000;
        }

        .burger-btn {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .sidebar-close {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            body { 
                display: block; 
                height: auto; 
                overflow-y: auto; 
            }
            .app-window { 
                width: 100%; 
                height: auto; 
                min-height: 100vh; 
                border-radius: 0; 
                border: none; 
                margin: 0;
                display: block;
            }
            .app-sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                height: 100vh;
                width: 280px;
                z-index: 5000;
                background: rgba(15, 17, 19, 0.98);
                backdrop-filter: blur(20px);
                transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                display: flex;
            }
            .app-sidebar.active { left: 0; }
            .sidebar-close { display: block; }
            .mobile-header { display: flex; }
            .app-main { padding: 20px; width: 100%; }
            .app-topbar { flex-direction: column; gap: 20px; align-items: stretch; }
            .app-search { width: 100%; }
            .app-categories { overflow-x: auto; padding-bottom: 10px; }
            .cat-pill { white-space: nowrap; }
            .hero-featured { height: 350px; padding: 20px; }
            .hero-featured-overlay { padding: 30px; }
            .hero-title { font-size: 32px; }
            .shelf-grid { grid-template-columns: repeat(2, 1fr); }
            #main-shelves-container { grid-template-columns: 1fr !important; }
        }

        @media (max-width: 600px) {
            .shelf-grid { grid-template-columns: 1fr; }
            .hero-btns { flex-direction: column; }
            .btn-main { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

    <div class="mobile-header">
        <div class="sidebar-logo" style="margin-bottom: 0;">
            <i class="fas fa-mountain"></i>
        </div>
        <button class="burger-btn" id="burger-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="app-window">
        <!-- Sidebar -->
        <aside class="app-sidebar" id="app-sidebar">
            <button class="sidebar-close" id="sidebar-close">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="sidebar-logo">
                <i class="fas fa-mountain"></i>
            </div>
            
            <div class="sidebar-nav">
                <a href="{{ url('/') }}" class="nav-icon" title="Kembali ke Landing">
                    <i class="fas fa-home"></i>
                </a>
                <a href="{{ url('/packages') }}" class="nav-icon active" title="Packages Shelf">
                    <i class="fas fa-th-large"></i>
                </a>
                <a href="{{ url('/trending') }}" class="nav-icon" title="Trending">
                    <i class="fas fa-fire"></i>
                </a>
                <a href="{{ url('/favorites') }}" class="nav-icon" title="Favorites">
                    <i class="fas fa-heart"></i>
                </a>
            </div>

            <div class="sidebar-footer">
                <div style="width: 35px; height: 35px; border-radius: 12px; overflow: hidden; border: 2px solid var(--color-accent);">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::check() ? Auth::user()->name : 'Guest' }}&background=d4f05c&color=000" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </aside>

        <!-- Main Panel -->
        <main class="app-main">
            <!-- Top Bar -->
            <div class="app-topbar">
                <div class="app-search">
                    <i class="fas fa-search"></i>
                    <input type="text" id="pkg-search" placeholder="Search destinations, mountain, beach...">
                </div>

                <div class="app-categories">
                    <div class="cat-pill active" data-filter="all">All Packages</div>
                    @foreach($categories as $category)
                        <div class="cat-pill" data-filter="{{ Str::slug($category->name) }}">{{ $category->name }}</div>
                    @endforeach
                </div>
            </div>

            @php $featured = $destinations->first(); @endphp
            @if($featured)
            <!-- Featured Hero -->
            <div class="hero-featured" id="featured-hero-section">
                <img src="{{ $featured->thumbnail ? asset($featured->thumbnail) : asset('images/beach.jpeg') }}" class="hero-featured-img" alt="Featured">
                <div class="hero-featured-overlay">
                    <div class="hero-label">Now Trending</div>
                    <h2 class="hero-title search-title">{{ $featured->name }}</h2>
                    <p class="hero-desc">{{ Str::limit($featured->description, 200) }}</p>
                    <div class="hero-btns">
                        <a href="{{ url('/detail?id='.$featured->id) }}" class="btn-main">
                            <i class="fas fa-play"></i> Explore Now
                        </a>
                        <a href="#" class="btn-sub">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a href="#" class="btn-sub" style="font-size: 14px; width: auto;">
                            <i class="fas fa-ellipsis-h"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Destination Shelves -->
            <div style="display: grid; grid-template-columns: 300px 1fr; gap: 40px;" id="main-shelves-container">
                <!-- Left Shelf: Continue Browsing -->
                <div class="continue-shelf" id="continue-browsing-shelf">
                    <div class="shelf-header">
                        <h3 class="shelf-title">Continue Browsing</h3>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 20px;" id="mini-cards-container">
                        @foreach($destinations->take(3) as $dest)
                        <div class="glass-mini-card" data-category="{{ Str::slug($dest->category->name ?? 'other') }}" style="display: flex; gap: 15px; align-items: center; padding: 10px; background: rgba(255,255,255,0.02); border-radius: 15px; border: 1px solid rgba(255,255,255,0.05);">
                            <div style="width: 60px; height: 60px; border-radius: 10px; overflow: hidden; position: relative;">
                                <img src="{{ $dest->thumbnail ? asset($dest->thumbnail) : asset('images/beach.jpeg') }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="flex: 1;">
                                <div class="mini-card-title search-title" style="font-size: 13px; font-weight: 600; margin-bottom: 3px;">{{ $dest->name }}</div>
                                <div style="font-size: 11px; color: rgba(255,255,255,0.4);">Session 01 • Trip 02</div>
                            </div>
                            <a href="{{ url('/detail?id='.$dest->id) }}" style="color: white; opacity: 0.5;"><i class="fas fa-play-circle" style="font-size: 20px;"></i></a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right Shelf: You Might Like -->
                <div class="recommend-shelf" id="recommend-shelf-container">
                    <div class="shelf-header">
                        <h3 class="shelf-title">You might like</h3>
                        <a href="#" id="btn-see-all" style="font-size: 13px; color: var(--color-accent); text-decoration: none; font-weight: 600;">See all</a>
                    </div>

                    <div class="shelf-grid" id="pkg-grid">
                        @foreach($destinations as $index => $dest)
                        <div class="small-card package-item" data-category="{{ Str::slug($dest->category->name ?? 'other') }}"
                             @if($index >= 8) style="display: none; opacity: 0;" data-hidden="true" @endif>
                            <div class="small-card-img-box">
                                <img src="{{ $dest->thumbnail ? asset($dest->thumbnail) : asset('images/beach.jpeg') }}" alt="{{ $dest->name }}">
                                <div class="play-overlay">
                                    <i class="fas fa-play" style="font-size: 12px; margin-left: 3px;"></i>
                                </div>
                            </div>
                            <div class="small-card-content" style="display: flex; flex-direction: column; gap: 8px;">
                                <div class="small-card-title search-title" style="margin-bottom: 0;">{{ $dest->name }}</div>
                                <div style="font-size: 11px; color: rgba(255,255,255,0.4); line-height: 1.4;">
                                    {{ Str::limit($dest->description, 80) }}
                                </div>
                                <div class="small-card-meta">
                                    <span style="color: var(--color-accent); font-weight: 700;">
                                        <i class="fas fa-clock" style="font-size: 10px; margin-right: 5px;"></i>
                                        {{ $dest->duration ?? rand(2, 7) . ' Days' }}
                                    </span>
                                    <span style="color: #ffc107; font-weight: 700; display: flex; align-items: center; gap: 4px;">
                                        <i class="fas fa-star" style="font-size: 10px;"></i>
                                        {{ number_format(rand(40, 50) / 10, 1) }}
                                    </span>
                                </div>
                                <a href="{{ url('/detail?id='.$dest->id) }}" class="btn-detail" style="margin-top: 5px; background: rgba(255,255,255,0.05); color: #fff; text-decoration: none; padding: 8px; border-radius: 12px; font-size: 11px; font-weight: 600; text-align: center; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                    Lihat Detail <i class="fas fa-arrow-right" style="font-size: 10px;"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- No Results Container -->
                    <div id="no-results" style="display: none; text-align: center; padding: 100px 40px; color: rgba(255,255,255,0.3); grid-column: 1/-1;">
                        <i class="fas fa-search" style="font-size: 50px; margin-bottom: 20px; display: block;"></i>
                        <h3 style="color: #fff; margin-bottom: 10px;">No Results Found</h3>
                        <p>We couldn't find any destinations matching your search or category.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Script for Search -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pkgSearch = document.getElementById('pkg-search');
            const catPills = document.querySelectorAll('.cat-pill');
            const gridItems = document.querySelectorAll('.package-item');
            const miniCards = document.querySelectorAll('.glass-mini-card');
            const heroSection = document.getElementById('featured-hero-section');
            const noResults = document.getElementById('no-results');
            const continueShelf = document.getElementById('continue-browsing-shelf');
            const btnSeeAll = document.getElementById('btn-see-all');
            
            let currentFilter = 'all';
            let isExpanded = false;

            if (btnSeeAll) {
                btnSeeAll.addEventListener('click', (e) => {
                    e.preventDefault();
                    isExpanded = true;
                    btnSeeAll.style.display = 'none';
                    performFilter(); // Re-run filter to show everything
                });
            }

            function performFilter() {
                const term = pkgSearch.value.toLowerCase().trim();
                let foundInGrid = 0;
                let foundInMini = 0;
                const shelvesContainer = document.getElementById('main-shelves-container');

                // 1. Filter Main Grid
                gridItems.forEach(item => {
                    const title = item.querySelector('.search-title').innerText.toLowerCase();
                    const category = item.getAttribute('data-category'); // Use getAttribute for consistency
                    
                    const matchesSearch = title.includes(term);
                    const matchesCategory = currentFilter === 'all' || category === currentFilter;

                    // Visibility Logic:
                    // 1. If searching or filtering by category -> Show all matches (ignore limit)
                    // 2. If "See All" was clicked -> Show all matches
                    // 3. Otherwise (Default view) -> Show only first 8 matches

                    if (matchesSearch && matchesCategory) {
                        // Check if we should show this item
                        let shouldShow = true;
                        
                        if (term === '' && currentFilter === 'all' && !isExpanded) {
                            if (foundInGrid >= 8) {
                                shouldShow = false;
                            }
                        }

                        if (shouldShow) {
                            item.style.display = 'block';
                            setTimeout(() => { 
                                if (item.style.display === 'block') {
                                    item.style.opacity = '1'; 
                                    item.style.transform = 'scale(1)'; 
                                }
                            }, 50);
                            foundInGrid++;
                        } else {
                            item.style.opacity = '0';
                            item.style.transform = 'scale(0.95)';
                             setTimeout(() => { 
                                if (item.style.opacity === '0') {
                                    item.style.display = 'none'; 
                                }
                            }, 400);
                        }
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.95)';
                        // Match transition duration
                        setTimeout(() => { 
                            if (item.style.opacity === '0') {
                                item.style.display = 'none'; 
                            }
                        }, 400);
                    }
                });

                // 2. Filter Sidebar Mini Cards
                miniCards.forEach(card => {
                    const title = card.querySelector('.search-title').innerText.toLowerCase();
                    const category = card.getAttribute('data-category');
                    
                    const matchesSearch = title.includes(term);
                    const matchesCategory = currentFilter === 'all' || category === currentFilter;

                    if (matchesSearch && matchesCategory) {
                        card.style.display = 'flex';
                        setTimeout(() => {
                           if (card.style.display === 'flex') card.style.opacity = '1';
                        }, 50);
                        foundInMini++;
                    } else {
                        card.style.opacity = '0';
                        setTimeout(() => { if (card.style.opacity === '0') card.style.display = 'none'; }, 400);
                    }
                });

                // 3. Handle Hero Section & Layout
                if (term !== '' || currentFilter !== 'all') {
                    if (heroSection) {
                        heroSection.style.opacity = '0';
                        setTimeout(() => { if (heroSection.style.opacity === '0') heroSection.style.display = 'none'; }, 400);
                    }
                    
                    if (continueShelf && foundInMini === 0) {
                        continueShelf.style.display = 'none';
                        if (shelvesContainer) shelvesContainer.style.gridTemplateColumns = '1fr';
                    } else if (continueShelf) {
                        continueShelf.style.display = 'block';
                        if (shelvesContainer) shelvesContainer.style.gridTemplateColumns = '300px 1fr';
                    }
                } else {
                    if (heroSection) {
                        heroSection.style.display = 'block';
                        setTimeout(() => { heroSection.style.opacity = '1'; }, 50);
                    }
                    if (continueShelf) {
                        continueShelf.style.display = 'block';
                        if (shelvesContainer) shelvesContainer.style.gridTemplateColumns = '300px 1fr';
                    }
                }

                // 4. Show/Hide No Results Message
                if (foundInGrid === 0 && foundInMini === 0) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }
            }

            // Event Listeners
            if (pkgSearch) {
                pkgSearch.addEventListener('input', performFilter);
                pkgSearch.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        performFilter();
                    }
                });
                pkgSearch.addEventListener('click', (e) => e.stopPropagation());
            }

            catPills.forEach(pill => {
                pill.addEventListener('click', () => {
                    catPills.forEach(p => p.classList.remove('active'));
                    pill.classList.add('active');
                    currentFilter = pill.dataset.filter;
                    performFilter();
                });
            });

            // Sidebar Toggle Logic
            const sidebar = document.getElementById('app-sidebar');
            const burgerBtn = document.getElementById('burger-toggle');
            const closeBtn = document.getElementById('sidebar-close');

            if (burgerBtn && sidebar) {
                burgerBtn.addEventListener('click', () => {
                    sidebar.classList.add('active');
                });
            }

            if (closeBtn && sidebar) {
                closeBtn.addEventListener('click', () => {
                    sidebar.classList.remove('active');
                });
            }

            // Close sidebar on nav link click (mobile)
            const navLinks = sidebar.querySelectorAll('.nav-icon');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 1024) {
                        sidebar.classList.remove('active');
                    }
                });
            });
        });
    </script>
</body>
</html>
