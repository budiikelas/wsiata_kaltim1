<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - Detail Wisata</title>
    
    <!-- Spotify Premium Theme (Fail-safe Inline) -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap');
        :root {
            --spotify-black: #121212; --spotify-dark-grey: #181818; --spotify-grey: #282828;
            --spotify-light-grey: #b3b3b3; --spotify-green: #1db954; --spotify-white: #ffffff;
            --accent-yellow: #fdbc3b; --transition-standard: all 0.3s cubic-bezier(0.3, 0, 0.4, 1);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; -webkit-font-smoothing: antialiased; }
        body { font-family: 'Outfit', sans-serif; background-color: #000; color: var(--spotify-white); overflow: hidden; height: 100vh; position: relative; }
        .page-bg { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
        .page-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.3) blur(15px); scale: 1.1; }
        
        
        /* Link & Text Reset */
        a, a:visited, a:hover, a:active { text-decoration: none !important; color: inherit; }
        
        .spotify-layout { 
            display: grid; 
            grid-template-columns: 240px 1fr; 
            grid-template-rows: 1fr; 
            height: 100vh; 
            width: 100vw; 
            position: relative; 
            z-index: 10; 
            padding: 20px 40px; 
            gap: 20px; 
            max-width: 1800px;
            margin: 0 auto;
        }
        .sidebar-left { grid-row: 1/2; background-color: rgba(0, 0, 0, 0.4); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); display: flex; flex-direction: column; padding: 24px 12px; gap: 24px; border-radius: 24px; border: 1px solid rgba(255,255,255,0.1); }
        .brand-link { display: flex; align-items: center; gap: 12px; padding: 0 12px; font-size: 20px; font-weight: 800; margin-bottom: 8px; color: white !important; }
        .brand-link i { color: var(--accent-yellow); }
        .side-nav ul { list-style: none; }
        .side-nav li a { display: flex; align-items: center; gap: 16px; padding: 10px 12px; color: var(--spotify-light-grey) !important; font-size: 14px; font-weight: 700; border-radius: 4px; transition: 0.2s; }
        .side-nav li.active a, .side-nav li a:hover { color: white !important; background-color: var(--spotify-grey); }
        .side-nav-group ul { list-style: none; }
        .side-nav-group li a { display: flex; align-items: center; gap: 16px; padding: 8px 12px; color: var(--spotify-light-grey) !important; font-size: 13px; font-weight: 700; transition: 0.2s; }
        .side-nav-group li a:hover { color: white !important; }
        .section-title { font-size: 11px; font-weight: 800; letter-spacing: 1px; color: var(--spotify-light-grey); margin: 20px 12px 10px; text-transform: uppercase; }
        .install-app-link { display: flex; align-items: center; gap: 12px; color: var(--spotify-light-grey) !important; font-size: 13px; font-weight: 700; padding: 12px; }
        .install-app-link:hover { color: white !important; }
        
        .content-wrapper { grid-row: 1/2; grid-column: 2/3; background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); display: flex; flex-direction: column; position: relative; overflow: hidden; border-radius: 24px; border: 1px solid rgba(255,255,255,0.1); }
        .spotify-header { height: 64px; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; background-color: rgba(18, 18, 18, 0.7); backdrop-filter: blur(20px); }
        .header-nav { display: flex; align-items: center; gap: 24px; }
        .nav-arrows { display: flex; align-items: center; gap: 8px; }
        .nav-btn-circle { width: 32px; height: 32px; border-radius: 50%; background-color: rgba(0,0,0,0.7); border: none; color: white; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: 0.2s; }
        .nav-btn-circle:hover { background-color: rgba(0,0,0,0.9); transform: scale(1.05); }
        .nav-btn-circle i { font-size: 14px; }
        .breadcrumb-text { font-size: 13px; font-weight: 700; color: var(--spotify-light-grey); display: flex; align-items: center; gap: 8px; }
        .breadcrumb-text span:last-child { color: white; }
        .breadcrumb-text i { font-size: 10px; opacity: 0.6; }
        .header-user { display: flex; align-items: center; gap: 16px; }
        .user-pill { background-color: rgba(0,0,0,0.7); padding: 2px 8px 2px 2px; border-radius: 20px; display: flex; align-items: center; gap: 8px; cursor: pointer; border: none; font-family: inherit; color: white; transition: 0.2s; }
        .user-pill:hover { background-color: #282828; }
        .user-avatar { width: 28px; height: 28px; border-radius: 50%; background-color: #535353; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; }
        .scroll-area { flex: 1; overflow-y: auto; padding: 24px 32px; }
        .top-row-grid { display: grid; grid-template-columns: 1.2fr 300px; gap: 24px; margin-bottom: 32px; align-items: stretch; }
        
        /* Banner Card Style */
        .banner-card { position: relative; min-height: 450px; height: auto; border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; justify-content: center; padding: 50px; background: #282828; }
        .banner-bg { position: absolute; top:0; left:0; width:100%; height:100%; z-index: 1; }
        .banner-bg img { width:100%; height:100%; object-fit:cover; filter: brightness(0.6); }
        .banner-bg::after { content:''; position:absolute; top:0; left:0; width:100%; height:100%; background: linear-gradient(90deg, rgba(0,0,0,0.8) 0%, transparent 100%); z-index: 2; }
        
        .banner-content { position: relative; z-index: 10; max-width: 85%; }
        .verified-badge { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; margin-bottom: 12px; color: white; }
        .verified-badge i { color: #4cb3ff; font-size: 20px; }
        .destination-title { font-size: 64px; font-weight: 900; margin-bottom: 8px; letter-spacing: -2px; line-height: 1; color: white; text-shadow: 0 4px 12px rgba(0,0,0,0.5); }
        .destination-description { font-size: 14px; color: #b3b3b3; margin-bottom: 24px; max-width: 600px; line-height: 1.6; font-weight: 500; }
        .destination-stats { font-size: 16px; font-weight: 700; margin-bottom: 32px; color: white; display: flex; align-items: center; gap: 12px; }
        
        .banner-actions { display: flex; align-items: center; gap: 20px; }
        .btn-play-large { width: 56px; height: 56px; border-radius: 50%; background-color: var(--spotify-green); border: none; display: flex; align-items: center; justify-content: center; font-size: 20px; cursor: pointer; color: black !important; transition: 0.2s; box-shadow: 0 8px 16px rgba(0,0,0,0.3); }
        .btn-play-large:hover { transform: scale(1.05); background-color: #1ed760; }
        .btn-outline-text { background: transparent; border: 1px solid rgba(255,255,255,0.4); color: white !important; padding: 8px 20px; border-radius: 20px; font-size: 12px; font-weight: 800; cursor: pointer; text-transform: uppercase; transition: 0.2s; letter-spacing: 1px; }
        .btn-outline-text:hover { border-color: white; transform: scale(1.05); }

        /* Map Card Style (Right Side) */
        .popular-card { background: #181818; border-radius: 12px; padding: 20px; display: flex; flex-direction: column; position: relative; }
        .popular-card h3 { font-size: 14px; font-weight: 800; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center; }
        .popular-card h3::after { content: '\f00d'; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--spotify-light-grey); cursor: pointer; }
        .map-preview-spotify { position: relative; flex: 1; border-radius: 8px; overflow: hidden; background: #282828; }
        .map-preview-spotify img { width: 100%; height: 100%; object-fit: cover; }
        .btn-open-spotify-map { position: absolute; bottom: 12px; left: 50%; transform: translateX(-50%); background: #1db954; color: black !important; padding: 6px 16px; border-radius: 20px; font-size: 10px; font-weight: 800; display: block; }
        
        .main-body-grid { display: grid; grid-template-columns: 1fr 340px; gap: 32px; align-items: start; }
        .area-title { font-size: 20px; font-weight: 800; margin-bottom: 16px; }
        .spotify-table { display: flex; flex-direction: column; }
        .table-header { display: grid; grid-template-columns: 40px 1.2fr 1.5fr 100px; padding: 0 16px 10px; border-bottom: 1px solid rgba(255,255,255,0.1); color: var(--spotify-light-grey); font-size: 10px; font-weight: 700; letter-spacing: 1.5px; margin-bottom: 12px; }
        .table-row { display: grid; grid-template-columns: 40px 1.2fr 1.5fr 100px; padding: 10px 16px; border-radius: 4px; transition: 0.2s; align-items: center; cursor: pointer; }
        .table-row:hover { background: rgba(255,255,255,0.1); }
        .row-avatar { width: 40px; height: 40px; border-radius: 4px; background: #282828; display: flex; align-items: center; justify-content: center; color: var(--accent-yellow); font-weight: 700; font-size: 16px; }
        .row-username { color: white; font-weight: 700; font-size: 14px; }
        .row-rating-stars { color: var(--accent-yellow); font-size: 10px; }
        .col-comment { color: var(--spotify-light-grey); font-size: 13px; }
        .col-date { color: var(--spotify-light-grey); font-size: 12px; }
        .empty-state { padding: 40px; text-align: center; color: var(--spotify-light-grey); font-size: 14px; background: rgba(255,255,255,0.02); border-radius: 8px; border: 1px dashed rgba(255,255,255,0.1); }
        .side-panel { display: flex; flex-direction: column; gap: 24px; }
        .panel-card { background: #1a1a1a; border-radius: 12px; padding: 20px; transition: 0.3s; }
        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
        .panel-header h3 { font-size: 14px; font-weight: 800; }
        .player-bar { grid-row: 2/3; grid-column: 1/3; background: #000; border-top: 1px solid #121212; padding: 0 16px; display: flex; align-items: center; justify-content: space-between; z-index: 1000; }
        .playing-info img { width: 56px; height: 56px; border-radius: 4px; }
        .song-name { font-size: 14px; font-weight: 700; margin-bottom: 2px; }
        .song-artist { font-size: 11px; color: var(--spotify-light-grey); }
        .btn-spotify-submit { background: var(--spotify-green); border: none; padding: 12px; width: 100%; border-radius: 30px; font-weight: 800; font-size: 13px; cursor: pointer; transition: 0.2s; color: black !important; }
        .btn-spotify-submit:hover { transform: scale(1.02); background: #1ed760; }
        .spotify-form textarea { width: 100%; background: #2a2a2a; border: none; border-radius: 8px; padding: 12px; color: white !important; font-family: inherit; font-size: 13px; margin-bottom: 12px; resize: none; border: 1px solid transparent; }
        .spotify-form textarea:focus { outline: none; border-color: #444; }
        .rating-selector { display: flex; flex-direction: row-reverse; justify-content: flex-end; gap: 8px; margin-bottom: 16px; }
        .rating-selector input { display: none; }
        .rating-selector label { font-size: 24px; color: #333; cursor: pointer; }
        .rating-selector input:checked ~ label, .rating-selector label:hover, .rating-selector label:hover ~ label { color: var(--accent-yellow); }
        .queue-item { display: flex; align-items: center; gap: 12px; background: #282828; padding: 10px; border-radius: 6px; transition: 0.2s; }
        .queue-item:hover { background: #333; }
        .queue-item img { width: 48px; height: 48px; border-radius: 4px; object-fit: cover; }

        /* Mobile Responsive */
        .mobile-menu-btn { display: none; width: 32px; height: 32px; border-radius: 50%; background-color: rgba(0,0,0,0.7); border: none; color: white; align-items: center; justify-content: center; cursor: pointer; }
        .sidebar-close { display: none; position: absolute; top: 20px; right: 20px; background: none; border: none; color: white; font-size: 24px; cursor: pointer; }

        @media (max-width: 1024px) {
            .spotify-layout { padding: 12px; grid-template-columns: 1fr; }
            .sidebar-left { 
                position: fixed; top: 0; left: -280px; height: 100vh; width: 260px; z-index: 1000;
                transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .sidebar-left.active { left: 0; }
            .mobile-menu-btn { display: flex; }
            .sidebar-close { display: block; }
            .top-row-grid { grid-template-columns: 1fr; }
            .main-body-grid { grid-template-columns: 1fr; }
            .breadcrumb-text { display: none; }
        }

        @media (max-width: 768px) {
            .destination-title { font-size: 36px; }
            .banner-card { height: auto; padding: 24px; }
            .banner-actions { flex-wrap: wrap; }
            .spotify-header { padding: 16px; }
        }

        /* PREMIUM FACILITIES SLIDER (SYNCED FROM LANDING) */
        .facility-immersive-section {
            position: relative;
            min-height: 450px;
            margin: 32px 0;
            border-radius: 24px;
            overflow: hidden;
            color: #fff;
            background: #000;
            border: 1px solid rgba(255,255,255,0.1);
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
            width: 100%;
            max-width: 1300px;
            margin: 0 auto;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 450px;
        }

        .facility-text-content {
            flex: 1;
            max-width: 550px;
        }

        .facility-label {
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 5px;
            color: #d4f05c;
            margin-bottom: 30px;
            position: relative;
            padding-left: 50px;
            font-family: 'Poppins', sans-serif;
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
            height: 180px;
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
            font-size: clamp(40px, 5vw, 80px);
            line-height: 0.95;
            margin-bottom: 30px;
            text-shadow: 0 20px 40px rgba(0,0,0,0.5);
            letter-spacing: -2px;
            font-weight: 900;
            font-family: 'Poppins', sans-serif;
        }

        .facility-description {
            font-size: 15px;
            line-height: 1.8;
            color: rgba(255,255,255,0.7);
            max-width: 450px;
            font-family: 'Poppins', sans-serif;
        }

        .facility-visual-slider {
            width: 280px;
            height: 280px;
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
            width: 180px;
            height: 260px;
            border-radius: 15px;
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
        .facility-card.visible-2 { z-index: 4; transform: translateX(80px) scale(0.9); opacity: 0.7; visibility: visible; pointer-events: auto; }
        .facility-card.visible-3 { z-index: 3; transform: translateX(160px) scale(0.8); opacity: 0.4; visibility: visible; pointer-events: auto; }

        .card-inner { position: relative; width: 100%; height: 100%; }
        .card-inner img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
        .facility-card:hover img { transform: scale(1.1); }

        .card-text {
            position: absolute;
            bottom: 0; left: 0;
            width: 100%; padding: 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        }

        .card-subtitle { display: block; font-size: 11px; font-weight: 700; color: #d4f05c; margin-bottom: 8px; }
        .card-title { font-size: 18px; font-weight: 700; color: white; }

        .facility-controls {
            position: absolute;
            bottom: 40px; left: 60px; right: 60px;
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .nav-arrows-facil { display: flex; gap: 15px; }
        .control-btn-facil {
            width: 45px; height: 45px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.2);
            background: transparent;
            color: white;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all 0.3s ease;
        }
        .control-btn-facil:hover { background: #fff; color: #000; }

        .progress-wrapper-facil { flex: 1; display: flex; align-items: center; gap: 20px; }
        .progress-bar-facil { flex: 1; height: 2px; background: rgba(255,255,255,0.1); position: relative; }
        .progress-line-facil { position: absolute; left: 0; top: 0; height: 100%; width: 0%; background: #d4f05c; transition: width 0.8s ease; }
        
        .slide-count-facil { font-size: 24px; font-weight: 900; display: flex; align-items: baseline; gap: 8px; font-family: 'Poppins', sans-serif; }
        .total-num-facil { font-size: 14px; opacity: 0.5; }

        @media (max-width: 1100px) {
            .facility-immersive-section { min-height: auto; padding: 60px 0; }
            .facility-container { flex-direction: column; padding: 20px; min-height: auto; }
            .facility-visual-slider { display: none; }
            .facility-text-content { text-align: center; max-width: 100%; }
            .active-facility-info { height: auto; position: relative; display: block; margin-bottom: 40px; }
            .facility-info-item { position: relative; width: 100%; }
            .facility-controls { position: relative; bottom: 0; left: 0; right: 0; justify-content: center; margin-top: 30px; }
        }

        /* NEW PREMIUM STYLES */
        .info-pill {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .info-pill:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            border-color: var(--accent-yellow);
        }
        .info-pill i { color: var(--accent-yellow); font-size: 16px; }

        .facilities-grid-display {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .facility-card-item {
            background: linear-gradient(145deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.02) 100%);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .facility-card-item::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at center, rgba(253, 188, 59, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .facility-card-item:hover {
            transform: translateY(-5px);
            border-color: rgba(253, 188, 59, 0.3);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }
        .facility-card-item:hover::before { opacity: 1; }
        
        .facility-icon-placeholder {
            width: 50px; height: 50px;
            border-radius: 12px;
            background: rgba(253, 188, 59, 0.1);
            display: flex; align-items: center; justify-content: center;
            color: var(--accent-yellow);
            font-size: 20px;
            margin-bottom: 5px;
            transition: transform 0.3s ease;
        }
        .facility-card-item:hover .facility-icon-placeholder {
            transform: scale(1.1) rotate(5deg);
            background: var(--accent-yellow);
            color: #000;
        }
        .facility-img {
            width: 50px; height: 50px;
            border-radius: 12px;
            object-fit: cover;
            margin-bottom: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .facility-card-item:hover .facility-img { transform: scale(1.1); }
        .facility-name {
            font-weight: 600;
            font-size: 14px;
            color: rgba(255,255,255,0.9);
            z-index: 1;
        }
    </style>
    
    <!-- External Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/detail.css'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="page-bg">
        <img src="{{ $destination->thumbnail ? asset($destination->thumbnail) : asset('images/beach.jpeg') }}" alt="">
    </div>

    <div class="spotify-layout">
        <!-- Sidebar Left -->
        <aside class="sidebar-left" id="sidebar">
            <button class="sidebar-close" id="sidebarClose"><i class="fas fa-times"></i></button>
            <div class="sidebar-top">
                <div class="sidebar-nav-header" style="padding: 0 12px 20px; display: flex; align-items: center; gap: 12px;">
                    <button class="nav-btn-circle" onclick="window.location.href='{{ url('/packages') }}'" style="background: rgba(255,255,255,0.1); width: 32px; height: 32px;"><i class="fas fa-chevron-left"></i></button>
                    <a href="{{ url('/') }}" class="brand-link" style="margin-bottom: 0; padding: 0;">
                        <i class="fas fa-mountain"></i>
                        <span>Wisata Kaltim</span>
                    </a>
                </div>
                
                <nav class="side-nav">
                    <ul>
                        <li class="active"><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    </ul>
                </nav>

            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="content-wrapper">
            <!-- Header -->
            <header class="spotify-header">
                <div class="header-nav">
                    <button class="mobile-menu-btn" id="menuBtn"><i class="fas fa-bars"></i></button>
                    <div class="breadcrumb-text">
                        <span>Detail Wisata</span> <i class="fas fa-chevron-right"></i> <span>Popular Destination</span>
                    </div>
                </div>
                
                <div class="header-user">
                    @auth
                        <div class="user-pill">
                            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-caret-down"></i>
                        </div>
                    @else
                        <a href="{{ url('/') }}" class="btn-login-round">Masuk</a>
                    @endauth
                </div>
            </header>

            <!-- Scrollable Area -->
            <div class="scroll-area">
                <!-- DESTINATION PHOTOS GALLERY -->
                @php 
                    // Start with destination thumbnail as the first image
                    $galleryImages = collect([
                        (object)[ 'id' => 0, 'image' => $destination->thumbnail ?: 'images/beach.jpeg', 'caption' => 'Pemandangan Utama - ' . $destination->name ]
                    ]);
                    
                    // Then add all gallery images from database
                    if(!$destination->galleries->isEmpty()) {
                        $galleryImages = $galleryImages->merge($destination->galleries);
                    } else {
                        // If no galleries, add default placeholder images
                        $galleryImages = $galleryImages->merge(collect([
                            (object)[ 'id' => 2, 'image' => 'images/islandia.png', 'caption' => 'Sudut Panorama' ],
                            (object)[ 'id' => 3, 'image' => 'images/kyoto.png', 'caption' => 'Suasana Destinasi' ],
                            (object)[ 'id' => 4, 'image' => 'images/retreat.png', 'caption' => 'Keindahan Alam' ]
                        ]));
                    }
                @endphp

                <section class="facility-immersive-section" id="fasilitas">
                    <div class="facility-bg-layer">
                        @foreach($galleryImages as $index => $item)
                            @php
                                $img = asset($item->image ?? 'images/beach.jpeg');
                            @endphp
                        <div class="bg-img {{ $loop->first ? 'active' : '' }}" data-id="{{ $item->id }}" style="background-image: url('{{ $img }}')"></div>
                        @endforeach
                        <div class="bg-overlay"></div>
                    </div>

                    <div class="facility-container">
                        <div class="facility-text-content">
                            <span class="facility-label">GALERI WISATA</span>
                            <div class="active-facility-info">
                                @foreach($galleryImages as $index => $item)
                                <div class="facility-info-item {{ $loop->first ? 'active' : '' }}" data-id="{{ $item->id }}">
                                    <h2 class="facility-big-title">{{ strtoupper($destination->name) }}</h2>
                                    <p class="facility-description">{{ $item->caption ?? "Jelajahi keindahan visual dari destinasi " . $destination->name . " melalui lensa kamera kami." }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="facility-visual-slider">
                            <div class="card-stack">
                                @foreach($galleryImages as $index => $item)
                                    @php
                                        $img = asset($item->image ?? 'images/beach.jpeg');
                                    @endphp
                                <div class="facility-card {{ $loop->first ? 'active' : '' }}" data-id="{{ $item->id }}">
                                    <div class="card-inner">
                                        <img src="{{ $img }}" alt="{{ $destination->name }}">
                                        <div class="card-text">
                                            <span class="card-subtitle">Foto {{ $index + 1 }}</span>
                                            <h4 class="card-title">{{ $item->caption ?? $destination->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="facility-controls">
                            <div class="nav-arrows-facil">
                                <button class="control-btn-facil prev"><i class="fas fa-chevron-left"></i></button>
                                <button class="control-btn-facil next"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <div class="progress-wrapper-facil">
                                <div class="progress-bar-facil">
                                    <div class="progress-line-facil"></div>
                                </div>
                                <div class="slide-count-facil">
                                    <span class="current-num-facil">01</span>
                                    <span class="total-num-facil">/ {{ str_pad($galleryImages->count(), 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Top Row: Banner Card + Map Card -->
                <div class="top-row-grid">
                    <!-- Hero Banner Card -->
                    <div class="banner-card">
                        <div class="banner-bg">
                            <img src="{{ $destination->thumbnail ? asset($destination->thumbnail) : asset('images/beach.jpeg') }}" alt="Background">
                        </div>
                        <div class="banner-content">
                            <div class="verified-badge">
                                <i class="fas fa-check-circle"></i> Destination Verified
                            </div>
                            <h1 class="destination-title text-truncate">{{ $destination->name }}</h1>
                            <p class="destination-description">{{ $destination->description ?? 'Nikmati pesona alam Kalimantan Timur yang memukau. Destinasi ini menawarkan perpaduan sempurna antara ketenangan alam, petualangan seru, dan keindahan visual yang tak terlupakan bagi setiap pengunjung.' }}</p>
                            <p class="destination-stats">
                                <i class="fas fa-star"></i> {{ number_format($destination->reviews->avg('rating') ?: 5.0, 1) }} 
                                • {{ $destination->reviews->count() }} ulasan
                            </p>
                            
                            <div class="destination-info-pills" style="display: flex; gap: 16px; margin-bottom: 28px; flex-wrap: wrap;">
                                <div class="info-pill">
                                    <i class="far fa-clock"></i>
                                    <div style="display: flex; flex-direction: column; gap: 2px;">
                                        <span style="font-size: 10px; opacity: 0.7; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">Jam Operasional</span>
                                        <span style="font-size: 14px; font-weight: 700;">{{ $destination->operational_hours ?? '08:00 - 17:00' }}</span>
                                    </div>
                                </div>
                                <div class="info-pill">
                                    <i class="fas fa-tag"></i>
                                    <div style="display: flex; flex-direction: column; gap: 2px;">
                                        <span style="font-size: 10px; opacity: 0.7; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">Harga Tiket</span>
                                        <span style="font-size: 14px; font-weight: 700;">Rp {{ number_format($destination->ticket_price, 0, ',', '.') }} <small style="opacity: 0.7; font-weight: 400; font-size: 11px;">/ orang</small></span>
                                    </div>
                                </div>
                                <div class="info-pill">
                                    @if($destination->status == 'aktif')
                                        <i class="fas fa-check-circle" style="color: #2ecc71;"></i>
                                        <div style="display: flex; flex-direction: column; gap: 2px;">
                                            <span style="font-size: 10px; opacity: 0.7; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">Status</span>
                                            <span style="font-size: 14px; font-weight: 700; color: #2ecc71;">Aktif</span>
                                        </div>
                                    @else
                                        <i class="fas fa-times-circle" style="color: #e74c3c;"></i>
                                        <div style="display: flex; flex-direction: column; gap: 2px;">
                                            <span style="font-size: 10px; opacity: 0.7; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">Status</span>
                                            <span style="font-size: 14px; font-weight: 700; color: #e74c3c;">Nonaktif</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="banner-actions">
                                @auth
                                    @php $isFavorited = Auth::user()->favorites()->where('destination_id', $destination->id)->exists(); @endphp
                                    <button class="btn-play-large" id="love-btn-main"><i class="{{ $isFavorited ? 'fas' : 'far' }} fa-heart"></i></button>
                                @else
                                    <button class="btn-play-large" id="love-btn-main"><i class="far fa-heart"></i></button>
                                @endauth
                                <button class="btn-outline-text" id="fav-btn" data-id="{{ $destination->id }}">
                                    @auth
                                        @php $isFavorited = Auth::user()->favorites()->where('destination_id', $destination->id)->exists(); @endphp
                                        {{ $isFavorited ? 'DIFAVORITKAN' : 'FAVORITKAN' }}
                                    @else
                                        FAVORITKAN
                                    @endauth
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Card (Map) -->
                    <div class="popular-card">
                        <h3>Popular Location</h3>
                        <div class="map-preview-spotify">
                            <img src="{{ asset('images/gps-map-final.jpg') }}" alt="Map">
                            <div class="map-pulse"></div>
                            @php
                                $mapUrl = "https://www.google.com/maps/search/?api=1&query=" . urlencode($destination->name . ' ' . $destination->location);
                                if($destination->latitude && $destination->longitude) {
                                    $mapUrl = "https://www.google.com/maps/search/?api=1&query={$destination->latitude},{$destination->longitude}";
                                }
                            @endphp
                            <a href="{{ $mapUrl }}" target="_blank" class="btn-open-spotify-map">BUKA PETA</a>
                        </div>
                    </div>
                </div>

                <!-- Facilities Section -->
                <div class="facilities-list-container" style="margin-bottom: 50px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <h3 class="area-title" style="margin-bottom: 0;">Fasilitas Tersedia</h3>
                            <span style="background: rgba(253, 188, 59, 0.2); color: var(--accent-yellow); padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700;">{{ $destination->facilities->count() }} Fasilitas</span>
                        </div>
                        <div style="height: 1px; flex: 1; margin-left: 20px; background: linear-gradient(90deg, rgba(255,255,255,0.1), transparent);"></div>
                    </div>
                    
                    <div class="facilities-grid-display">
                        @forelse($destination->facilities as $facility)
                            <div class="facility-card-item">
                                @if($facility->image)
                                    <img src="{{ asset($facility->image) }}" alt="{{ $facility->name }}" class="facility-img">
                                @else
                                    <div class="facility-icon-placeholder">
                                        @php
                                            $iconMap = [
                                                'parkir' => 'fa-parking',
                                                'toilet' => 'fa-restroom',
                                                'mushola' => 'fa-mosque',
                                                'wifi' => 'fa-wifi',
                                                'restoran' => 'fa-utensils',
                                                'cafe' => 'fa-coffee',
                                                'gazebo' => 'fa-campground',
                                                'playground' => 'fa-child',
                                                'kolam' => 'fa-swimming-pool',
                                                'default' => 'fa-check-circle'
                                            ];
                                            $facilityLower = strtolower($facility->name);
                                            $icon = 'fa-check-circle';
                                            foreach($iconMap as $key => $value) {
                                                if(str_contains($facilityLower, $key)) {
                                                    $icon = $value;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <i class="fas {{ $icon }}"></i>
                                    </div>
                                @endif
                                <span class="facility-name">{{ $facility->name }}</span>
                            </div>
                        @empty
                            <div class="empty-message" style="grid-column: 1/-1; color: var(--spotify-light-grey); font-size: 15px; font-style: italic; text-align: center; padding: 40px; background: rgba(255,255,255,0.02); border-radius: 12px; border: 1px dashed rgba(255,255,255,0.1);">
                                <i class="far fa-eye-slash" style="font-size: 24px; margin-bottom: 10px; display: block; opacity: 0.5;"></i>
                                Belum ada data fasilitas untuk destinasi ini.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Grid: Reviews Area vs Form Sidebar -->
                <div class="main-body-grid">
                    <!-- Left: Popular Content (Reviews) -->
                    <div class="popular-list-area">
                        <h2 class="area-title">Popular Reviews</h2>
                        <div class="spotify-table">
                            <div class="table-header">
                                <div class="col-index">#</div>
                                <div class="col-user">USER</div>
                                <div class="col-comment">KOMENTAR</div>
                                <div class="col-date"><i class="far fa-clock"></i></div>
                            </div>
                            
                            <div class="table-body">
                                @forelse($destination->reviews()->latest()->limit(5)->get() as $review)
                                    <div class="table-row">
                                        <div class="col-index">{{ $loop->iteration }}</div>
                                        <div class="col-user">
                                            <div class="row-user-info">
                                                <div class="row-avatar">{{ strtoupper(substr($review->user->name, 0, 1)) }}</div>
                                                <div class="row-names">
                                                    <span class="row-username text-truncate">{{ $review->user->name }}</span>
                                                    <span class="row-rating-stars">
                                                        @for($i=0; $i<5; $i++)
                                                            <i class="{{ $i < $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                                        @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-comment text-truncate">{{ $review->comment }}</div>
                                        <div class="col-date">{{ $review->created_at->diffForHumans() }}</div>
                                    </div>
                                @empty
                                    <div class="empty-state">Belum ada ulasan populer.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar: Rating Form -->
                    <div class="side-panel">
                        <!-- Rating Form -->

                        <!-- Rating Form -->
                        @auth
                            <div class="panel-card rating-panel">
                                <h3>Tulis Rating</h3>
                                <form action="{{ route('reviews.store') }}" method="POST" class="spotify-form">
                                    @csrf
                                    <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                                    <div class="rating-selector">
                                        @for($i=5; $i>=1; $i--)
                                            <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" required><label for="star{{$i}}"><i class="fas fa-star"></i></label>
                                        @endfor
                                    </div>
                                    <textarea name="comment" placeholder="Bagikan kesan Anda..." rows="3" required></textarea>
                                    <button type="submit" class="btn-spotify-submit">KIRIM ULASAN</button>
                                </form>
                            </div>
                        @endauth
                        

                    </div>
                </div>
            </div>
        </main>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const favBtn = document.getElementById('fav-btn');
            const loveBtnMain = document.getElementById('love-btn-main');
            
            const toggleFavorite = async () => {
                if (!favBtn) return;
                const destId = favBtn.dataset.id;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                try {
                    const response = await fetch('{{ route('favorites.toggle') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ destination_id: destId })
                    });

                    const data = await response.json();
                    if (data.success) {
                        const isFavorited = data.status === 'added';
                        favBtn.innerText = isFavorited ? 'DIFAVORITKAN' : 'FAVORITKAN';
                        
                        // Update heart icon in main button
                        if (loveBtnMain) {
                            const heartIcon = loveBtnMain.querySelector('i');
                            if (isFavorited) {
                                heartIcon.classList.remove('far');
                                heartIcon.classList.add('fas');
                            } else {
                                heartIcon.classList.remove('fas');
                                heartIcon.classList.add('far');
                            }
                        }
                    } else if (response.status === 401) {
                        window.location.href = '{{ url('/') }}';
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            };

            if (favBtn) favBtn.addEventListener('click', toggleFavorite);
            if (loveBtnMain) loveBtnMain.addEventListener('click', toggleFavorite);

            // Responsive Sidebar Logic
            const menuBtn = document.getElementById('menuBtn');
            const sidebar = document.getElementById('sidebar');
            const sidebarClose = document.getElementById('sidebarClose');

            if (menuBtn && sidebar) {
                menuBtn.addEventListener('click', () => {
                    sidebar.classList.add('active');
                });
            }

            if (sidebarClose && sidebar) {
                sidebarClose.addEventListener('click', () => {
                    sidebar.classList.remove('active');
                });
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (sidebar.classList.contains('active')) {
                    if (!sidebar.contains(e.target) && !menuBtn.contains(e.target)) {
                        sidebar.classList.remove('active');
                    }
                }
            });

            // Premium Facilities Slider Logic
            const facilitySection = document.getElementById('fasilitas');
            if (facilitySection) {
                const bgImages = facilitySection.querySelectorAll('.bg-img');
                const infoItems = facilitySection.querySelectorAll('.facility-info-item');
                const facilityCards = facilitySection.querySelectorAll('.facility-card');
                const prevControl = facilitySection.querySelector('.control-btn-facil.prev');
                const nextControl = facilitySection.querySelector('.control-btn-facil.next');
                const progressLine = facilitySection.querySelector('.progress-line-facil');
                const currentNum = facilitySection.querySelector('.current-num-facil');
                
                let curIndex = 0;
                const total = facilityCards.length;
                let isMoving = false;

                function updateFacilitySlider(index) {
                    if (isMoving) return;
                    isMoving = true;

                    bgImages.forEach(img => img.classList.remove('active'));
                    bgImages[index].classList.add('active');

                    infoItems.forEach(item => item.classList.remove('active'));
                    infoItems[index].classList.add('active');

                    facilityCards.forEach((card, i) => {
                        card.classList.remove('active', 'visible-1', 'visible-2', 'visible-3');
                        if (i === index) {
                            card.classList.add('active');
                        } else {
                            let pos = (i - index + total) % total;
                            if (pos > 0 && pos <= 3) {
                                card.classList.add(`visible-${pos}`);
                            }
                        }
                    });

                    if (currentNum) currentNum.textContent = String(index + 1).padStart(2, '0');
                    if (progressLine) {
                        const progress = ((index + 1) / total) * 100;
                        progressLine.style.width = `${progress}%`;
                    }

                    setTimeout(() => { isMoving = false; }, 1000);
                }

                if (nextControl) nextControl.addEventListener('click', () => { curIndex = (curIndex + 1) % total; updateFacilitySlider(curIndex); });
                if (prevControl) prevControl.addEventListener('click', () => { curIndex = (curIndex - 1 + total) % total; updateFacilitySlider(curIndex); });

                facilityCards.forEach((card, i) => {
                    card.addEventListener('click', () => { if (i !== curIndex) { curIndex = i; updateFacilitySlider(curIndex); } });
                });

                if (progressLine) progressLine.style.width = `${(1 / total) * 100}%`;
            }
        });
    </script>
</body>
</html>
