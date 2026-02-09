<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Destinasi Terpopuler dan Paling Banyak Dicari di Kalimantan Timur.">
    <title>NexTrip - Trending Destinations</title>
    
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
            padding: 8px 15px;
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
            color: #ffc107;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
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
            color: rgba(255,255,255,0.6);
            max-width: 450px;
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
            display: flex;
            align-items: center;
            gap: 12px;
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

        .trending-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 193, 7, 0.9);
            color: #000;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            backdrop-filter: blur(5px);
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
    </style>
</head>
<body>

    <div class="app-window">
        <!-- Sidebar -->
        <aside class="app-sidebar">
            <div class="sidebar-logo">
                <i class="fas fa-mountain"></i>
            </div>
            
            <div class="sidebar-nav">
                <a href="{{ url('/') }}" class="nav-icon" title="Kembali ke Landing">
                    <i class="fas fa-home"></i>
                </a>
                <a href="{{ url('/packages') }}" class="nav-icon" title="Packages Shelf">
                    <i class="fas fa-th-large"></i>
                </a>
                <a href="{{ url('/trending') }}" class="nav-icon active" title="Trending">
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
                    <input type="text" id="pkg-search" placeholder="Search trending destinations...">
                </div>

                <div class="app-categories">
                    <div class="cat-pill active" data-filter="all">All Trending</div>
                    @foreach($categories as $category)
                        <div class="cat-pill" data-filter="{{ Str::slug($category->name) }}">{{ $category->name }}</div>
                    @endforeach
                </div>
            </div>

            @php $featured = $destinations->first(); @endphp
            @if($featured)
            <!-- Trending Hero -->
            <div class="hero-featured" id="featured-hero-section">
                <img src="{{ $featured->thumbnail ? asset($featured->thumbnail) : asset('images/beach.jpeg') }}" class="hero-featured-img" alt="Featured">
                <div class="hero-featured-overlay">
                    <div class="hero-label">
                        <i class="fas fa-chart-line"></i> #1 Most Popular
                    </div>
                    <h2 class="hero-title search-title">{{ $featured->name }}</h2>
                    <p class="hero-desc">{{ Str::limit($featured->description, 200) }}</p>
                    <div class="hero-btns">
                        <a href="{{ url('/detail?id='.$featured->id) }}" class="btn-main">
                            <i class="fas fa-play"></i> Explore Now
                        </a>
                        <a href="#" class="btn-sub">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Trending Shelf -->
            <div id="recommend-shelf-container">
                <div class="shelf-header">
                    <h3 class="shelf-title">
                        <i class="fas fa-fire" style="color: #ff5722;"></i> 
                        Popular Right Now
                    </h3>
                </div>

                <div class="shelf-grid" id="pkg-grid">
                    @foreach($destinations as $index => $dest)
                    <div class="small-card package-item" data-category="{{ Str::slug($dest->category->name ?? 'other') }}">
                        <div class="small-card-img-box">
                            <div class="trending-badge">#{{ $index + 1 }}</div>
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
                                <span style="color: #ffc107; font-weight: 700; display: flex; align-items: center; gap: 4px;">
                                    <i class="fas fa-star" style="font-size: 10px;"></i>
                                    {{ number_format($dest->rating ?? 4.8, 1) }}
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
                <div id="no-results" style="display: none; text-align: center; padding: 100px 40px; color: rgba(255,255,255,0.3);">
                    <i class="fas fa-search" style="font-size: 50px; margin-bottom: 20px; display: block;"></i>
                    <h3 style="color: #fff; margin-bottom: 10px;">No Results Found</h3>
                    <p>We couldn't find any trending destinations matching your filter.</p>
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
            const heroSection = document.getElementById('featured-hero-section');
            const noResults = document.getElementById('no-results');
            
            let currentFilter = 'all';

            function performFilter() {
                const term = pkgSearch.value.toLowerCase().trim();
                let foundInGrid = 0;

                // Filter Main Grid
                gridItems.forEach(item => {
                    const title = item.querySelector('.search-title').innerText.toLowerCase();
                    const category = item.getAttribute('data-category');
                    
                    const matchesSearch = title.includes(term);
                    const matchesCategory = currentFilter === 'all' || category === currentFilter;

                    if (matchesSearch && matchesCategory) {
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
                });

                // Handle Hero Section
                if (term !== '' || currentFilter !== 'all') {
                    if (heroSection) {
                        heroSection.style.opacity = '0';
                        setTimeout(() => { if (heroSection.style.opacity === '0') heroSection.style.display = 'none'; }, 400);
                    }
                } else {
                    if (heroSection) {
                        heroSection.style.display = 'block';
                        setTimeout(() => { heroSection.style.opacity = '1'; }, 50);
                    }
                }

                // Show/Hide No Results Message
                if (foundInGrid === 0) {
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
            }

            catPills.forEach(pill => {
                pill.addEventListener('click', () => {
                    catPills.forEach(p => p.classList.remove('active'));
                    pill.classList.add('active');
                    currentFilter = pill.getAttribute('data-filter');
                    performFilter();
                });
            });
        });
    </script>
</body>
</html>
