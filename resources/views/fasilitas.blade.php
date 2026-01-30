<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas - Wisata Kaltim</title>
    
    <!-- CSS -->
    @vite(['resources/css/style.css'])
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            --color-accent: #d4f05c;
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #000; 
            color: #fff; 
            overflow: hidden; 
            height: 100vh; 
        }

        .page-bg { 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            z-index: -1; 
        }
        
        .page-bg img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            filter: brightness(0.3) blur(20px); 
            scale: 1.1; 
            transition: 1s ease-in-out;
        }

        .spotify-layout { 
            display: grid; 
            grid-template-columns: 240px 1fr; 
            grid-template-rows: 1fr; 
            height: 100vh; 
            width: 100vw; 
            position: relative; 
            z-index: 10; 
            padding: 12px; 
            gap: 12px; 
            max-width: 1800px;
            margin: 0 auto;
        }

        /* Sidebar Styles */
        .sidebar-left { 
            background: rgba(0, 0, 0, 0.4); 
            backdrop-filter: blur(20px); 
            border-radius: 24px; 
            border: 1px solid var(--glass-border);
            padding: 24px 12px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .brand-link { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            padding: 0 12px; 
            font-size: 20px; 
            font-weight: 800; 
            color: white; 
            text-decoration: none;
        }
        
        .brand-link i { color: var(--color-accent); }

        .side-nav ul { list-style: none; }
        .side-nav li a { 
            display: flex; 
            align-items: center; 
            gap: 16px; 
            padding: 10px 12px; 
            color: #b3b3b3; 
            font-size: 14px; 
            font-weight: 700; 
            border-radius: 8px; 
            transition: 0.2s; 
            text-decoration: none;
        }
        
        .side-nav li.active a, .side-nav li a:hover { 
            color: white; 
            background: rgba(255,255,255,0.1); 
        }

        /* Main Content Wrapper */
        .content-wrapper { 
            grid-row: 1/2; 
            grid-column: 2/3; 
            background: rgba(0, 0, 0, 0.4); 
            backdrop-filter: blur(20px); 
            -webkit-backdrop-filter: blur(20px); 
            display: flex; 
            flex-direction: column; 
            position: relative; 
            overflow: hidden; 
            border-radius: 24px; 
            border: 1px solid rgba(255,255,255,0.1); 
        }

        @media (max-width: 1024px) {
            .spotify-layout { padding: 12px; grid-template-columns: 1fr; }
            .sidebar-left { display: none; }
        }

        /* PREMIUM FACILITIES SLIDER (SYNCED FROM LANDING) */
        .facility-immersive-section {
            position: relative;
            width: 100%;
            height: 100%;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 60px;
            display: flex;
            align-items: center;
        }

        .facility-text-content {
            flex: 1;
            max-width: 550px;
            padding-bottom: 50px;
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
            height: 300px;
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
            font-size: clamp(50px, 6vw, 90px);
            line-height: 0.95;
            margin-bottom: 40px;
            text-shadow: 0 20px 40px rgba(0,0,0,0.5);
            letter-spacing: -2px;
            font-weight: 900;
            font-family: 'Poppins', sans-serif;
        }

        .facility-description {
            font-size: 16px;
            line-height: 1.8;
            color: rgba(255,255,255,0.7);
            max-width: 480px;
        }

        .facility-visual-slider {
            width: 450px;
            height: 500px;
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
            width: 300px;
            height: 450px;
            border-radius: 25px;
            overflow: hidden;
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
        }

        .facility-card.active {
            opacity: 0;
            visibility: hidden;
            transform: translateX(-150px) scale(0.8);
        }

        .facility-card.visible-1 { z-index: 5; transform: translateX(0) scale(1); opacity: 1; }
        .facility-card.visible-2 { z-index: 4; transform: translateX(350px) scale(0.9); opacity: 0.7; }
        .facility-card.visible-3 { z-index: 3; transform: translateX(700px) scale(0.8); opacity: 0.4; }

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

        .nav-arrows-facil { display: flex; gap: 15px; }
        .control-btn-facil {
            width: 55px; height: 55px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.2);
            background: transparent;
            color: white;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all 0.3s ease;
        }
        .control-btn-facil:hover { background: #fff; color: #000; }

        .progress-wrapper-facil { flex: 1; display: flex; align-items: center; gap: 30px; }
        .progress-bar-facil { flex: 1; height: 2px; background: rgba(255,255,255,0.1); position: relative; }
        .progress-line-facil { position: absolute; left: 0; top: 0; height: 100%; width: 0%; background: #d4f05c; transition: width 0.8s ease; }
        
        .slide-count-facil { font-size: 32px; font-weight: 900; display: flex; align-items: baseline; gap: 10px; }
        .total-num-facil { font-size: 16px; opacity: 0.5; }

        @media (max-width: 1100px) {
            .facility-immersive-section { height: auto; padding: 100px 0; }
            .facility-container { flex-direction: column; padding: 20px; }
            .facility-visual-slider { display: none; }
            .facility-text-content { text-align: center; max-width: 100%; }
            .active-facility-info { height: auto; position: relative; display: block; margin-bottom: 50px; }
            .facility-info-item { position: relative; width: 100%; }
            .facility-controls { position: relative; bottom: 0; left: 0; right: 0; justify-content: center; margin-top: 40px; }
        }

        @media (max-width: 1024px) {
            .fasilitas-layout { grid-template-columns: 1fr; }
            .fasilitas-visuals { display: none; }
            .fasilitas-glass-card { padding: 40px; }
            .fasilitas-title { font-size: 60px; }
        }
    </style>
</head>
<body>
    <div class="page-bg">
        <img src="{{ asset('images/beach.jpeg') }}" alt="" id="hero-bg-img">
    </div>

    <div class="spotify-layout">
        <!-- Sidebar -->
        <aside class="sidebar-left">
            <div class="sidebar-top">
                <div style="padding: 0 12px 20px; display: flex; align-items: center; gap: 12px;">
                    <button class="nav-btn-circle" onclick="window.history.back()" style="background: rgba(255,255,255,0.1); width: 32px; height: 32px; border: none; border-radius: 50%; color: white; cursor: pointer;"><i class="fas fa-chevron-left"></i></button>
                    <a href="{{ url('/') }}" class="brand-link">
                        <i class="fas fa-mountain"></i>
                        <span>Wisata Kaltim</span>
                    </a>
                </div>
                
                <nav class="side-nav">
                    <ul>
                        <li><a href="{{ url('/detail?id=1') }}"><i class="fas fa-map-marker-alt"></i> Detail Wisata</a></li>
                        <li class="active"><a href="{{ url('/fasilitas') }}"><i class="fas fa-list-check"></i> Fasilitas</a></li>
                        <li><a href="{{ url('/packages') }}"><i class="fas fa-cube"></i> Paket Wisata</a></li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="content-wrapper">
             @php
                $displayFacilities = $facilities->isEmpty() ? collect([
                    (object)[ 'id' => 1, 'name' => 'Konektivitas Digital', 'description' => 'Akses internet tanpa batas untuk produktivitas dan hiburan Anda di berbagai lokasi wisata.' ],
                    (object)[ 'id' => 2, 'name' => 'Layanan Kuliner', 'description' => 'Sajian makanan khas dan internasional dari koki berpengalaman untuk menemani perjalanan Anda.' ],
                    (object)[ 'id' => 3, 'name' => 'Area Parkir Luas', 'description' => 'Keamanan kendaraan Anda adalah prioritas utama kami dengan pengawasan 24 jam.' ],
                    (object)[ 'id' => 4, 'name' => 'Tur Terpadu', 'description' => 'Layanan transportasi eksklusif untuk menemani perjalanan wisata Anda dengan aman.' ]
                ]) : $facilities;
            @endphp

            <section class="facility-immersive-section" id="fasilitas">
                <div class="facility-bg-layer">
                    @foreach($displayFacilities as $index => $item)
                        @php
                            $img = ($item instanceof \App\Models\Facility && $item->image) ? asset($item->image) : asset('images/facility-pool.png');
                        @endphp
                    <div class="bg-img {{ $loop->first ? 'active' : '' }}" data-id="{{ $item->id }}" style="background-image: url('{{ $img }}')"></div>
                    @endforeach
                    <div class="bg-overlay"></div>
                </div>

                <div class="facility-container">
                    <div class="facility-text-content">
                        <span class="facility-label">FASILITAS UTAMA</span>
                        <div class="active-facility-info">
                            @foreach($displayFacilities as $index => $item)
                            <div class="facility-info-item {{ $loop->first ? 'active' : '' }}" data-id="{{ $item->id }}">
                                <h2 class="facility-big-title">KALIMANTAN<br>TIMUR</h2>
                                <h3 style="font-size: 24px; color: var(--color-accent); margin-bottom: 20px;">{{ $item->name }}</h3>
                                <p class="facility-description">{{ $item->description ?? "Fasilitas terbaik untuk kenyamanan Anda." }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="facility-visual-slider">
                        <div class="card-stack">
                            @foreach($displayFacilities as $index => $item)
                                @php
                                    $img = ($item instanceof \App\Models\Facility && $item->image) ? asset($item->image) : asset('images/facility-pool.png');
                                @endphp
                            <div class="facility-card {{ $loop->first ? 'active' : '' }}" data-id="{{ $item->id }}">
                                <div class="card-inner">
                                    <img src="{{ $img }}" alt="{{ $item->name }}">
                                    <div class="card-text">
                                        <span class="card-subtitle">Fasilitas {{ $index + 1 }}</span>
                                        <h4 class="card-title">{{ $item->name }}</h4>
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
                                <span class="total-num-facil">/ {{ str_pad($displayFacilities->count(), 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
                
                // Initial update
                updateFacilitySlider(0);
            }
        });
    </script>
</body>
</html>