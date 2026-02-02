<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Destinasi Favorit Anda di NexTrip.">
    <title>NexTrip - My Favorites</title>
    
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

        .app-main {
            flex: 1;
            padding: 40px 50px;
            overflow-y: auto;
            position: relative;
        }

        .app-main::-webkit-scrollbar {
            width: 6px;
        }
        .app-main::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .app-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
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
        }

        .app-search input {
            background: transparent;
            border: none;
            outline: none;
            color: white;
            font-size: 14px;
            width: 100%;
        }

        .shelf-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .shelf-title {
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .shelf-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
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
            height: 160px;
            position: relative;
        }

        .small-card-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .fav-indicator {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #ff4757;
            font-size: 18px;
            filter: drop-shadow(0 2px 5px rgba(0,0,0,0.5));
        }

        .small-card-content {
            padding: 20px;
        }

        .small-card-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .small-card-meta {
            font-size: 13px;
            color: rgba(255,255,255,0.4);
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .btn-detail {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: rgba(255,255,255,0.05);
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }

        .btn-detail:hover {
            background: var(--color-accent);
            color: black;
            border-color: var(--color-accent);
        }

        .empty-state {
            text-align: center;
            padding: 100px 40px;
            color: rgba(255,255,255,0.3);
        }

        .empty-state i {
            font-size: 60px;
            margin-bottom: 20px;
            display: block;
        }

        .empty-state h3 {
            color: white;
            margin-bottom: 10px;
        }

        .btn-browse {
            display: inline-flex;
            margin-top: 20px;
            background: var(--color-accent);
            color: black;
            padding: 12px 30px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-browse:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="app-window">
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
                <a href="{{ url('/trending') }}" class="nav-icon" title="Trending">
                    <i class="fas fa-fire"></i>
                </a>
                <a href="{{ url('/favorites') }}" class="nav-icon active" title="Favorites">
                    <i class="fas fa-heart"></i>
                </a>

            </div>

            <div class="sidebar-footer">
                <a href="#" class="nav-icon"><i class="fas fa-bell"></i></a>
                <div style="width: 35px; height: 35px; border-radius: 12px; overflow: hidden; border: 2px solid var(--color-accent);">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=d4f05c&color=000" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </aside>

        <main class="app-main">
            <div class="app-topbar">
                <div class="app-search">
                    <i class="fas fa-search"></i>
                    <input type="text" id="pkg-search" placeholder="Search my favorites...">
                </div>
            </div>

            <div class="shelf-header">
                <h3 class="shelf-title">
                    <i class="fas fa-heart" style="color: #ff4757;"></i> 
                    My Favorites
                </h3>
            </div>

            @if($destinations->count() > 0)
                <div class="shelf-grid" id="pkg-grid">
                    @foreach($destinations as $dest)
                    <div class="small-card package-item" data-category="{{ Str::slug($dest->category->name ?? 'other') }}">
                        <div class="small-card-img-box">
                            <i class="fas fa-heart fav-indicator"></i>
                            <img src="{{ $dest->thumbnail ? asset($dest->thumbnail) : asset('images/beach.jpeg') }}" alt="{{ $dest->name }}">
                        </div>
                        <div class="small-card-content">
                            <div class="small-card-title search-title">{{ $dest->name }}</div>
                            <div class="small-card-meta">
                                <span style="color: var(--color-accent); font-weight: 700;">
                                    <i class="fas fa-clock"></i> {{ $dest->duration ?? rand(2, 7) . ' Days' }}
                                </span>
                                <span style="color: #ffc107; font-weight: 700;">
                                    <i class="fas fa-star"></i> {{ number_format(rand(46, 50) / 10, 1) }}
                                </span>
                            </div>
                            <a href="{{ url('/detail?id='.$dest->id) }}" class="btn-detail">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="far fa-heart"></i>
                    <h3>No Favorites Yet</h3>
                    <p>Start exploring and save your favorite destinations here!</p>
                    <a href="{{ url('/packages') }}" class="btn-browse">Explore Destinations</a>
                </div>
            @endif

            <div id="no-results" style="display: none;" class="empty-state">
                <i class="fas fa-search"></i>
                <h3>No Matching Favorites</h3>
                <p>We couldn't find anything matching your search term.</p>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pkgSearch = document.getElementById('pkg-search');
            const gridItems = document.querySelectorAll('.package-item');
            const noResults = document.getElementById('no-results');
            
            if (pkgSearch) {
                pkgSearch.addEventListener('input', function() {
                    const term = this.value.toLowerCase().trim();
                    let found = 0;

                    gridItems.forEach(item => {
                        const title = item.querySelector('.search-title').innerText.toLowerCase();
                        if (title.includes(term)) {
                            item.style.display = 'block';
                            found++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    noResults.style.display = found === 0 ? 'block' : 'none';
                });
            }
        });
    </script>
</body>
</html>
