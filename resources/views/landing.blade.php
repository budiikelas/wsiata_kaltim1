<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temukan dirimu melalui keindahan alam Indonesia. Jelajahi destinasi wisata terbaik di Kalimantan Timur dan seluruh Indonesia.">
    <title>Wisata Indonesia - Temukan Akar Budayamu</title>
    
    <!-- CSS -->
    @vite(['resources/css/style.css'])
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="nav-logo">
            <a href="{{ url('/') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 12px;">
                <i class="fas fa-mountain"></i>
                <span>Wisata</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/#beranda') }}">Beranda</a></li>
            <li><a href="{{ url('/#destinasi') }}">Destinasi</a></li>
            <li><a href="{{ url('/packages') }}">Packages</a></li>
            <li><a href="{{ url('/#fasilitas') }}">Fasilitas</a></li>
            <li><a href="{{ url('/#contact') }}">Kontak</a></li>
        </ul>
        <div class="nav-items-right">
            <div class="nav-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="nav-auth">
                <a href="{{ url('/login') }}" class="btn-auth btn-login">Masuk</a>
                <a href="{{ url('/register') }}" class="btn-auth btn-register">Daftar</a>
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
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </section>

        <!-- Story Section - Wildlife Documentary Theme -->
        <section class="story-section wildlife-section">
            <!-- Wildlife Background with Parallax -->
            <div class="wildlife-bg-wrapper">
                <div class="wildlife-bg" data-parallax="true">
                    <img src="{{ asset('images/orangutan-hero.png') }}" alt="Bornean Orangutan">
                </div>
                <!-- Smoke/Mist Overlay -->
                <div class="smoke-overlay"></div>
                <div class="dark-gradient-overlay"></div>
            </div>
            
            <div class="wildlife-container">
                <!-- Cinematic Content -->
                <div class="wildlife-content">
                    <!-- Small Label -->
                    <div class="wildlife-label">
                        <span class="label-line"></span>
                        <span class="label-text">KALIMANTAN TIMUR</span>
                    </div>
                    
                    <!-- Main Headline - Bold & Minimal -->
                    <h2 class="wildlife-title">
                        LIAR
                    </h2>
                    
                    <!-- Supporting Text -->
                    <p class="wildlife-description">
                        Orangutan Kalimantan, secara ilmiah dikenal sebagai Pongo pygmaeus, adalah spesies kera besar yang terancam punah<br>
                        yang mendiami hutan hujan Kalimantan. Mereka adalah salah satu primata paling cerdas di dunia.
                    </p>

                    <!-- Watch Trailer Button -->
                    <a href="https://youtu.be/0fts6x_EE_E?si=hZhJ4FwWlq4Kei0J" class="watch-trailer-btn" target="_blank">
                        <span>TONTON TRAILER</span>
                    </a>
                </div>

                <!-- Wildlife Info Cards -->
                <div class="wildlife-info-grid">
                    <div class="wildlife-info-card">
                        <div class="info-icon">
                            <i class="fas fa-paw"></i>
                        </div>
                        <h4>Orangutan</h4>
                        <p>Kera Besar Kalimantan</p>
                    </div>
                    
                    <div class="wildlife-info-card">
                        <div class="info-icon">
                            <i class="fas fa-tree"></i>
                        </div>
                        <h4>Habitat</h4>
                        <p>Hutan Hujan Tropis</p>
                    </div>
                    
                    <div class="wildlife-info-card">
                        <div class="info-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h4>Status</h4>
                        <p>Terancam Punah</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section - East Kalimantan Tourism Carousel -->
        <section class="gallery-section" id="destinasi">
            <div class="gallery-bg-wrapper section-bg-wrapper">
                <div class="gallery-bg section-parallax-bg" data-parallax="true">
                    <img src="{{ asset('images/beach.jpeg') }}" alt="Gallery Section Background">
                </div>
                <div class="gallery-overlay section-overlay"></div>
            </div>
            <div class="gallery-container">
                <div class="gallery-glass-card">
                    <div class="gallery-layout">
                    <!-- Left Column: Content -->
                    <div class="gallery-content">
                        <div class="content-header">
                            <span class="gallery-subtitle">DESTINASI POPULER</span>
                            <h2 class="gallery-title">KALIMANTAN TIMUR</h2>
                        </div>
                        
                        <div class="destination-info" id="destination-info">
                            <h3 class="active-dest-title">Kepulauan Derawan</h3>
                            <p class="active-dest-desc">Surga tropis dengan pantai pasir putih dan kehidupan laut yang memukau. Nikmati keindahan bawah laut yang tak tertandingi.</p>
                            <div class="active-dest-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <a href="{{ url('/detail?id=derawan') }}" class="explore-btn gallery-explore-btn">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Navigation -->
                        <div class="gallery-nav">
                            <button class="nav-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
                            <button class="nav-btn next-btn"><i class="fas fa-chevron-right"></i></button>
                            <div class="slide-counter">
                                <span class="current">01</span>
                                <span class="divider">/</span>
                                <span class="total">05</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Carousel -->
                    <div class="gallery-visuals">
                        <div class="carousel-track">
                            <!-- Slide 1 -->
                            <div class="carousel-card active" 
                                 data-id="derawan"
                                 data-title="Kepulauan Derawan" 
                                 data-desc="Surga tropis dengan pantai pasir putih dan kehidupan laut yang memukau. Nikmati keindahan bawah laut yang tak tertandingi."
                                 data-rating="5">
                                <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800&q=80" alt="Derawan">
                                <div class="card-overlay"></div>
                            </div>

                            <!-- Slide 2: Kakaban -->
                            <div class="carousel-card" 
                                 data-id="kakaban"
                                 data-title="Danau Kakaban" 
                                 data-desc="Berenang bersama jutaan ubur-ubur tanpa sengat di danau purba yang magis. Pengalaman langka yang hanya ada di dua tempat di dunia."
                                 data-rating="5">
                                <img src="https://images.unsplash.com/photo-1516683667744-4a4205226c9f?w=1000&q=80" alt="Jellyfish at Kakaban">
                                <div class="card-overlay"></div>
                            </div>

                            <!-- Slide 3: Maratua -->
                            <div class="carousel-card" 
                                 data-id="maratua"
                                 data-title="Pantai Maratua" 
                                 data-desc="Surga bahari dengan pasir putih selembut tepung dan air sebening kristal. Destinasi eksotis yang sering disebut sebagai Maldives-nya Indonesia."
                                 data-rating="4.5">
                                <img src="https://images.unsplash.com/photo-1596423238612-4cf30eba2523?w=1000&q=80" alt="Pantai Maratua">
                                <div class="card-overlay"></div>
                            </div>

                            <!-- Slide 4 -->
                            <div class="carousel-card" 
                                 data-id="mahakam"
                                 data-title="Sungai Mahakam" 
                                 data-desc="Jantung Kalimantan dengan budaya Dayak yang kaya dan alam yang asri. Telusuri kehidupan sungai yang autentik."
                                 data-rating="5">
                                <img src="https://images.unsplash.com/photo-1551244072-5d12893278ab?w=800&q=80" alt="Mahakam">
                                <div class="card-overlay"></div>
                            </div>

                            <!-- Slide 5 -->
                            <div class="carousel-card" 
                                 data-id="kutai"
                                 data-title="Hutan Hujan Tropis" 
                                 data-desc="Eksplorasi keanekaragaman hayati dan habitat orangutan Kalimantan. Paru-paru dunia yang menakjubkan."
                                 data-rating="4.5">
                                <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800&q=80" alt="Rainforest">
                                <div class="card-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <!-- Schedule Section - Modern Card Layout -->
        <section class="schedule-section">
            <div class="schedule-bg-wrapper section-bg-wrapper">
                <div class="schedule-bg section-parallax-bg" data-parallax="true">
                    <img src="{{ asset('images/islandia.png') }}" alt="Schedule Section Background">
                </div>
                <div class="schedule-overlay section-overlay"></div>
            </div>
            <div class="schedule-container">
                <div class="schedule-header">
                    <span class="schedule-subtitle">Destinasi Pilihan</span>
                    <h2 class="schedule-title">Jadwal Perjalanan Tersedia</h2>
                    <p class="schedule-desc-text">
                        Pilihlah paket perjalanan yang sesuai dengan gaya petualangan Anda. 
                        Dari pulau eksotis hingga hutan hujan tropis yang menakjubkan.
                    </p>
                </div>
                
                <div class="schedule-grid">
                    <!-- Card 1: Island Hopping -->
                    <div class="schedule-card">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/maladewa.png') }}" alt="Derawan Island" class="card-image">
                            <div class="card-badge">
                                <i class="fas fa-star"></i> 4.9
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-location">
                                <i class="fas fa-map-marker-alt"></i> Derawan & Maratua
                            </div>
                            <h3 class="card-title">Island Hopping Paradise</h3>
                            <p class="card-desc">
                                Nikmati keindahan 4 pulau eksotis dalam satu perjalanan. Snorkeling dengan penyu, 
                                berenang dengan ubur-ubur tanpa sengat di Kakaban, dan foto di Laguna Kehe Daing.
                            </p>
                            <div class="card-footer">
                                <span class="trip-duration">
                                    <i class="far fa-clock"></i> 4 Hari 3 Malam
                                </span>
                                <a href="{{ url('/detail?id=derawan') }}" class="card-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: River Safari -->
                    <div class="schedule-card">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/retreat.png') }}" alt="Mahakam River" class="card-image">
                            <div class="card-badge">
                                <i class="fas fa-fire"></i> Populer
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-location">
                                <i class="fas fa-water"></i> Sungai Mahakam
                            </div>
                            <h3 class="card-title">Mahakam River Safari</h3>
                            <p class="card-desc">
                                Susuri sungai Mahakam dengan kapal wisata. Kunjungi desa budaya Dayak, 
                                saksikan kehidupan pesut Mahakam, dan nikmati tarian tradisional.
                            </p>
                            <div class="card-footer">
                                <span class="trip-duration">
                                    <i class="far fa-clock"></i> 3 Hari 2 Malam
                                </span>
                                <a href="{{ url('/detail?id=mahakam') }}" class="card-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Wildlife -->
                    <div class="schedule-card">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/orangutan-hero.png') }}" alt="Orangutan" class="card-image">
                            <div class="card-badge">
                                <i class="fas fa-leaf"></i> Eco-Tour
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-location">
                                <i class="fas fa-tree"></i> Taman Nasional Kutai
                            </div>
                            <h3 class="card-title">Borneo Wildlife Trek</h3>
                            <p class="card-desc">
                                Petualangan masuk ke habitat asli Orangutan liar. Trekking di hutan hujan tropis 
                                yang masih asri dan pengamatan satwa liar endemik Kalimantan.
                            </p>
                            <div class="card-footer">
                                <span class="trip-duration">
                                    <i class="far fa-clock"></i> 2 Hari 1 Malam
                                </span>
                                <a href="{{ url('/detail?id=kutai') }}" class="card-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Hidden Gem -->
                    <div class="schedule-card">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/beach.jpeg') }}" alt="Labuan Cermin" class="card-image">
                            <div class="card-badge">
                                <i class="fas fa-camera"></i> Viral
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-location">
                                <i class="fas fa-mountain"></i> Biduk-Biduk
                            </div>
                            <h3 class="card-title">Crystal Lake Voyage</h3>
                            <p class="card-desc">
                                Menyelam di danau dua rasa Labuan Cermin yang sebening kristal. 
                                Dilanjutkan dengan santai di pantai pasir putih Biduk-biduk.
                            </p>
                            <div class="card-footer">
                                <span class="trip-duration">
                                    <i class="far fa-clock"></i> 3 Hari 2 Malam
                                </span>
                                <a href="{{ url('/detail?id=biduk') }}" class="card-btn">Lihat Detail</a>
                            </div>
                        </div>
                </div>
            </div>

            <div class="schedule-view-more">
                <a href="{{ url('/packages') }}" class="view-more-btn">
                    Tampilkan Lebih Banyak Wisata <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Reviews Section -->
                <div class="reviews-grid">
                    <div class="review-card">
                        <div class="reviewer-profile">
                            <img src="https://ui-avatars.com/api/?name=Sarah+J&background=random" alt="User" class="reviewer-img">
                            <div class="reviewer-info">
                                <h4>Sarah Jenkins</h4>
                                <span>Traveller, USA</span>
                            </div>
                        </div>
                        <p class="review-text">
                            "Kalimantan Timur adalah permata tersembunyi! Derawan sangat menakjubkan, 
                            seperti Maldives tapi lebih alami. Sangat merekomendasikan paket Island Hopping."
                        </p>
                    </div>

                    <div class="review-card">
                        <div class="reviewer-profile">
                            <img src="https://ui-avatars.com/api/?name=Budi+S&background=random" alt="User" class="reviewer-img">
                            <div class="reviewer-info">
                                <h4>Budi Santoso</h4>
                                <span>Photographer, Jakarta</span>
                            </div>
                        </div>
                        <p class="review-text">
                            "Sebagai fotografer, Mahakam River Safari memberikan banyak momen magis. 
                            Budaya Dayak sangat kaya dan orang-orangnya ramah."
                        </p>
                    </div>
                    
                    <div class="review-card">
                        <div class="reviewer-profile">
                            <img src="https://ui-avatars.com/api/?name=Jessica+W&background=random" alt="User" class="reviewer-img">
                            <div class="reviewer-info">
                                <h4>Jessica Wong</h4>
                                <span>Singapore</span>
                            </div>
                        </div>
                        <p class="review-text">
                            "Melihat orangutan liar di habitat aslinya adalah pengalaman seumur hidup. 
                            Panduannya sangat profesional dan peduli lingkungan."
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Facilities Section -->
        <section class="facilities-section" id="fasilitas">
            <div id="paket"></div> <!-- Anchor for backward compatibility -->
            
            <div class="facilities-bg-wrapper section-bg-wrapper">
                <div class="facilities-bg section-parallax-bg" data-parallax="true">
                    <img src="{{ asset('images/retreat.png') }}" alt="Facilities Background">
                </div>
                <div class="facilities-overlay section-overlay"></div>
            </div>

            <div class="facilities-container">
                <!-- Left Column: Hero-like Intro -->
                <div class="facilities-left">
                    <div class="facilities-hero-content">
                        <span class="facilities-subtitle">KENYAMANAN ANDA</span>
                        <h2 class="facilities-title">Fasilitas<br>Unggulan</h2>
                        <p class="facilities-desc">
                            Nikmati pengalaman wisata tanpa khawatir. Kami menyediakan akomodasi 
                            dan transportasi terbaik untuk memastikan perjalanan Anda tak terlupakan.
                        </p>
                        
                        <div class="facilities-widget glass-panel">
                            <div class="widget-item">
                                <i class="fas fa-temperature-high"></i>
                                <div>
                                    <span class="widget-value">28°C</span>
                                    <span class="widget-label">Rata-rata Suhu</span>
                                </div>
                            </div>
                            <div class="widget-line"></div>
                            <div class="widget-item">
                                <i class="fas fa-wind"></i>
                                <div>
                                    <span class="widget-value">12 km/h</span>
                                    <span class="widget-label">Kecepatan Angin</span>
                                </div>
                            </div>
                        </div>

                        <a href="#contact" class="explore-facilities-btn">
                            Info Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Glassmorphism List -->
                <div class="facilities-right">
                    <div class="facilities-sidebar glass-panel">
                        <div class="sidebar-header">
                            <div class="search-bar">
                                <input type="text" placeholder="Cari fasilitas...">
                                <i class="fas fa-search"></i>
                            </div>
                            <i class="fas fa-bars menu-icon"></i>
                        </div>

                        <h3 class="sidebar-title">Daftar Fasilitas</h3>

                        <div class="facilities-list">
                            <!-- Card 1 -->
                            <div class="facility-card">
                                <div class="facility-img">
                                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=500&q=80" alt="Hotel">
                                </div>
                                <div class="facility-info">
                                    <h4>Akomodasi Premium</h4>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p>Hotel bintang 4 dengan view laut</p>
                                </div>
                                <div class="facility-action">
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="facility-card">
                                <div class="facility-img">
                                    <img src="https://images.unsplash.com/photo-1517153295259-74eb0b416cee?w=500&q=80" alt="Transport">
                                </div>
                                <div class="facility-info">
                                    <h4>Transportasi VIP</h4>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <p>Antar jemput bandara & mobil pribadi</p>
                                </div>
                                <div class="facility-action">
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="facility-card">
                                <div class="facility-img">
                                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=500&q=80" alt="Food">
                                </div>
                                <div class="facility-info">
                                    <h4>Full Board Meals</h4>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p>Sarapan, makan siang & malam</p>
                                </div>
                                <div class="facility-action">
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>
                            
                             <!-- Card 4 -->
                            <div class="facility-card">
                                <div class="facility-img">
                                    <img src="https://images.unsplash.com/photo-1533613220915-609f661a6fe1?w=500&q=80" alt="Guide">
                                </div>
                                <div class="facility-info">
                                    <h4>Pemandu Profesional</h4>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p>Berlisensi & berpengalaman</p>
                                </div>
                                <div class="facility-action">
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>

                            <!-- Pagination Mock -->
                             <div class="sidebar-pagination">
                                 <button class="page-btn prev"><i class="fas fa-chevron-left"></i></button>
                                 <button class="page-btn next"><i class="fas fa-chevron-right"></i></button>
                                 <span class="page-indicator">01 — 04</span>
                             </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section - Airplane Split Layout with 3D Breakthrough -->
        <section class="contact-section" id="contact">
            <div class="contact-bg-wrapper section-bg-wrapper">
                <div class="contact-bg section-parallax-bg" data-parallax="true">
                    <img src="{{ asset('images/tropical-bg.png') }}" alt="Contact Section Background">
                </div>
                <div class="contact-overlay section-overlay"></div>
            </div>
            <div class="contact-split-container">
                <!-- Left Content Area (White) -->
                <div class="contact-left-content">
                    <div class="contact-header">
                        <span class="contact-label">HUBUNGI KAMI</span>
                        <h2 class="contact-main-title">Ayo Jelajahi Dunia<br>Bersama <span>Kami.</span></h2>
                        <p class="contact-subtitle-text">
                            Pesan tiket perjalanan Anda sekarang dan temukan keindahan Kalimantan Timur serta seluruh penjuru Indonesia.
                        </p>
                    </div>

                    <div class="modern-form-wrapper">
                        <form action="#" class="airplane-form">
                            <div class="airplane-form-grid">
                                <div class="airplane-form-group">
                                    <label>Nama Lengkap</label>
                                    <div class="airplane-input-box">
                                        <input type="text" placeholder="Masukkan nama Anda">
                                    </div>
                                </div>
                                <div class="airplane-form-group">
                                    <label>Alamat Email</label>
                                    <div class="airplane-input-box">
                                        <input type="email" placeholder="email@contoh.com">
                                    </div>
                                </div>
                                <div class="airplane-form-group">
                                    <label>Destinasi Tujuan</label>
                                    <div class="airplane-input-box">
                                        <input type="text" placeholder="Pilih destinasi">
                                    </div>
                                </div>
                                <div class="airplane-form-group">
                                    <label>Tanggal Rencana</label>
                                    <div class="airplane-input-box">
                                        <input type="text" placeholder="Bulan/Tahun">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="airplane-submit-btn">
                                <i class="fas fa-search"></i> Kirim Pesan
                            </button>
                        </form>
                    </div>

                    <div class="airplane-contact-info">
                        <div class="info-item">
                            <i class="fab fa-whatsapp"></i>
                            <span>+62 812 3456 7890</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <span>halo@wisatakaltim.com</span>
                        </div>
                    </div>
                </div>

                <!-- Right Visual Area (Tropical Background) -->
                <div class="contact-right-visual">
                    <img src="{{ asset('images/tropical-bg.png') }}" alt="Tropical Islands Background" class="airplane-bg-img">
                    <div class="visual-overlay"></div>
                    <div class="airplane-float-card glass-panel">
                        <div class="float-card-content">
                            <i class="fas fa-plane-departure"></i>
                            <div>
                                <h4>Popular Destinations</h4>
                                <p>Kepulauan Derawan & Maratua</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- The 3D Breakthrough Airplane -->
            <div class="airplane-breakthrough">
                <img src="{{ asset('images/plane-3d-final.png') }}" alt="3D Airplane Fly-in" class="plane-3d-img">
            </div>
        </section>

        <!-- Scroll to Top -->
        <div class="scroll-top">
            <i class="fas fa-chevron-up"></i>
        </div>

    <!-- Footer Hidden as it's now integrated or redundant, keeping empty if needed for JS -->
    <footer class="footer-hidden" style="display:none;"></footer>

    <!-- JavaScript -->
    <script>
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

        document.querySelectorAll('.story-section, .gallery-section, .schedule-section, .pricing-section, .facilities-section, .contact-section, .cta-section').forEach(el => {
            observer.observe(el);
        });

        // Special Observer for Airplane Fly-in
        const airplaneObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const plane = entry.target.querySelector('.airplane-breakthrough');
                    if (plane) plane.classList.add('fly-in-started');
                }
            });
        }, { threshold: 0.3 });

        const contactSec = document.querySelector('.contact-section');
        if (contactSec) airplaneObserver.observe(contactSec);

        // Carousel Functionality - Split Layout
        const carouselTrack = document.querySelector('.carousel-track');
        const slides = document.querySelectorAll('.carousel-card');
        const prevBtn = document.querySelector('.carousel-prev') || document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.carousel-next') || document.querySelector('.next-btn');
        const slideCounterCurrent = document.querySelector('.slide-counter .current') || document.querySelector('.current-slide');
        const slideCounterTotal = document.querySelector('.slide-counter .total') || document.querySelector('.total-slides');
        
        // Text Content Elements
        const titleEl = document.querySelector('.active-dest-title');
        const descEl = document.querySelector('.active-dest-desc');
        const ratingEl = document.querySelector('.active-dest-rating');
        const infoContainer = document.querySelector('.destination-info');
        const exploreBtn = document.querySelector('.gallery-explore-btn'); // Get explore button

        let currentSlide = 0;
        const totalSlides = slides.length;
        let isAnimating = false;

        // Initialize
        function initCarousel() {
            if (slideCounterTotal) slideCounterTotal.textContent = String(totalSlides).padStart(2, '0');
            updateSlideClasses();
            updateContent(0);
        }

        // Update Text Content with Fade Effect
        function updateContent(index) {
            if (!titleEl || !slides[index]) return;
            
            // Fade out
            if (infoContainer) infoContainer.style.opacity = '0';
            
            setTimeout(() => {
                const slide = slides[index];
                
                // Update text
                titleEl.textContent = slide.dataset.title;
                descEl.textContent = slide.dataset.desc;
                
                // Update Button Link
                if (exploreBtn) {
                    const destId = slide.dataset.id || 'derawan'; // Fallback
                    exploreBtn.href = `/detail?id=${destId}`;
                }
                
                // Update rating
                const rating = parseFloat(slide.dataset.rating);
                if (ratingEl) {
                    ratingEl.innerHTML = '';
                    for (let i = 1; i <= 5; i++) {
                        const icon = document.createElement('i');
                        if (i <= rating) {
                            icon.className = 'fas fa-star';
                        } else if (i - 0.5 === rating) {
                            icon.className = 'fas fa-star-half-alt';
                        } else {
                            icon.className = 'far fa-star';
                        }
                        ratingEl.appendChild(icon);
                    }
                }
                
                // Fade in
                if (infoContainer) infoContainer.style.opacity = '1';
            }, 300);
        }

        // Update Classes for Visuals (Active, Prev, Next, Next-2)
        function updateSlideClasses() {
            slides.forEach(slide => {
                slide.className = 'carousel-card'; // Reset
            });

            // Active
            slides[currentSlide].classList.add('active');

            // Previous
            const prevIndex = (currentSlide - 1 + totalSlides) % totalSlides;
            slides[prevIndex].classList.add('prev');

            // Next
            const nextIndex = (currentSlide + 1) % totalSlides;
            slides[nextIndex].classList.add('next');

            // Next + 2 (For the deep stack effect)
            const next2Index = (currentSlide + 2) % totalSlides;
            if (next2Index !== prevIndex && next2Index !== currentSlide) {
                slides[next2Index].classList.add('next-2');
            }
            
            // Update Counter
            if (slideCounterCurrent) {
                slideCounterCurrent.textContent = String(currentSlide + 1).padStart(2, '0');
            }
        }

        // Go to slide
        function goToSlide(index) {
            if (isAnimating || index === currentSlide) return;
            isAnimating = true;

            currentSlide = index;
            
            updateSlideClasses();
            updateContent(currentSlide);

            setTimeout(() => {
                isAnimating = false;
            }, 800); // Match CSS transition
        }

        function nextSlide() {
            goToSlide((currentSlide + 1) % totalSlides);
        }

        function prevSlide() {
            goToSlide((currentSlide - 1 + totalSlides) % totalSlides);
        }

        // Event Listeners
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);

        // Keyboard
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') prevSlide();
            if (e.key === 'ArrowRight') nextSlide();
        });

        // Init
        initCarousel();
    </script>
</body>
</html>
