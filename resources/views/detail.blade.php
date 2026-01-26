<?php
// Data Source
$destinations = [
    'derawan' => [
        'title' => 'Kepulauan Derawan',
        'subtitle' => 'Surga tropis dengan pantai pasir putih.',
        'desc' => 'Kepulauan Derawan adalah surga tropis yang menawarkan pesona bawah laut tak tertandingi. Rumah bagi penyu hijau raksasa, pari manta, dan terumbu karang yang masih sangat alami.',
        'image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=1920&q=80',
        'map_image' => 'images/gps-map-final.jpg',
        'map_url' => 'https://www.google.com/maps/search/?api=1&query=Kepulauan+Derawan+Berau',
        'stats' => [
            'popularity' => 5,    // 1-5 dots
            'access' => 3,        // Aksesibilitas (Aggressiveness map)
            'area' => 4           // Size map
        ],
        'bottom_stats' => [ // The 4 columns at bottom
            ['label' => 'Wisatawan', 'value' => '15k / thn', 'sub' => 'Domestik & Asing'],
            ['label' => 'Lokasi', 'value' => 'Kab. Berau', 'sub' => 'Kalimantan Timur'],
            ['label' => 'Biaya', 'value' => '$$$', 'sub' => 'Paket Premium'],
            ['label' => 'Status', 'value' => 'Aman', 'sub' => 'Ramah Keluarga'],
        ],
        'next_id' => 'kakaban',
        'next_img' => 'https://images.unsplash.com/photo-1516683667744-4a4205226c9f?w=600&q=80',
        'next_name' => 'Kakaban'
    ],
    'kakaban' => [
        'title' => 'Danau Kakaban',
        'subtitle' => 'Danau ubur-ubur purba tanpa sengat.',
        'desc' => 'Danau Kakaban adalah fenomena alam langka, danau air payau purba yang terperangkap di tengah pulau karang. Berenang bersama jutaan ubur-ubur endemik yang tidak menyengat.',
        'image' => 'https://images.unsplash.com/photo-1516683667744-4a4205226c9f?w=1920&q=80',
        'map_image' => 'images/gps-map-final.jpg',
        'map_url' => 'https://www.google.com/maps/search/?api=1&query=Danau+Kakaban',
        'stats' => [
            'popularity' => 5,
            'access' => 4,
            'area' => 2
        ],
        'bottom_stats' => [
            ['label' => 'Wisatawan', 'value' => '10k / thn', 'sub' => 'Pengunjung Terbatasi'],
            ['label' => 'Lokasi', 'value' => 'P. Kakaban', 'sub' => 'Dekat Derawan'],
            ['label' => 'Biaya', 'value' => '$$', 'sub' => 'Tiket Masuk'],
            ['label' => 'Status', 'value' => 'Unik', 'sub' => 'Situs Warisan'],
        ],
        'next_id' => 'maratua',
        'next_img' => 'https://images.unsplash.com/photo-1596423238612-4cf30eba2523?w=600&q=80',
        'next_name' => 'Maratua'
    ],
    'maratua' => [
        'title' => 'Pantai Maratua',
        'subtitle' => 'Maldives-nya Indonesia.',
        'desc' => 'Maratua sering disebut sebagai Maldives-nya Indonesia. Resort terapung di atas air sebening kristal, tempat sempurna untuk relaksasi total and honeymoon.',
        'image' => 'https://images.unsplash.com/photo-1596423238612-4cf30eba2523?w=1920&q=80',
        'map_image' => 'images/gps-map-final.jpg',
        'map_url' => 'https://www.google.com/maps/search/?api=1&query=Pulau+Maratua',
        'stats' => [
            'popularity' => 4,
            'access' => 3,
            'area' => 5
        ],
        'bottom_stats' => [
            ['label' => 'Wisatawan', 'value' => '8k / thn', 'sub' => 'Eksklusif'],
            ['label' => 'Lokasi', 'value' => 'P. Maratua', 'sub' => 'Kepulauan Derawan'],
            ['label' => 'Biaya', 'value' => '$$$$', 'sub' => 'Luxury Resort'],
            ['label' => 'Status', 'value' => 'Tenang', 'sub' => 'Private Vibes'],
        ],
        'next_id' => 'mahakam',
        'next_img' => 'https://images.unsplash.com/photo-1551244072-5d12893278ab?w=600&q=80',
        'next_name' => 'Mahakam'
    ],
    'mahakam' => [
        'title' => 'Sungai Mahakam',
        'subtitle' => 'Nadi kehidupan Kalimantan.',
        'desc' => 'Sungai Mahakam menghubungkan pedalaman Kalimantan dengan dunia luar. Selami budaya Dayak, desa terapung, dan habitat Pesut Mahakam yang langka.',
        'image' => 'https://images.unsplash.com/photo-1551244072-5d12893278ab?w=1920&q=80',
        'map_image' => 'images/gps-map-final.jpg',
        'map_url' => 'https://www.google.com/maps/search/?api=1&query=Sungai+Mahakam+Samarinda',
        'stats' => [
            'popularity' => 4,
            'access' => 4,
            'area' => 5
        ],
        'bottom_stats' => [
            ['label' => 'Panjang', 'value' => '920 km', 'sub' => 'Sungai Terpanjang ke-2'],
            ['label' => 'Lokasi', 'value' => 'Samarinda', 'sub' => 'Hulu Mahakam'],
            ['label' => 'Biaya', 'value' => '$$', 'sub' => 'Sewa Kapal'],
            ['label' => 'Status', 'value' => 'Kultur', 'sub' => 'Wisata Budaya'],
        ],
        'next_id' => 'kutai',
        'next_img' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=600&q=80',
        'next_name' => 'Kutai'
    ],
    'kutai' => [
        'title' => 'Hutan Tropis Kutai',
        'subtitle' => 'Habitat asli Orangutan Kalimantan.',
        'desc' => 'Taman Nasional Kutai, benteng terakhir hutan hujan dataran rendah. Saksikan Orangutan liar di habitat aslinya dan nikmati udara murni hutan Kalimantan.',
        'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=1920&q=80',
        'map_image' => 'images/gps-map-final.jpg',
        'map_url' => 'https://www.google.com/maps/search/?api=1&query=Taman+Nasional+Kutai',
        'stats' => [
            'popularity' => 3,
            'access' => 2,
            'area' => 5
        ],
        'bottom_stats' => [
            ['label' => 'Luas', 'value' => '198k Ha', 'sub' => 'Area Konservasi'],
            ['label' => 'Lokasi', 'value' => 'Kutai Timur', 'sub' => 'Jalan Poros'],
            ['label' => 'Biaya', 'value' => '$', 'sub' => 'Tiket Masuk'],
            ['label' => 'Status', 'value' => 'Liar', 'sub' => 'Eco-Tourism'],
        ],
        'next_id' => 'biduk',
        'next_img' => 'images/beach.jpeg',
        'next_name' => 'Biduk'
    ],
    'biduk' => [
        'title' => 'Labuan Cermin',
        'subtitle' => 'Danau dua rasa sebening kaca.',
        'desc' => 'Fenomena unik pertemuan air tawar dan asin. Airnya begitu jernih hingga perahu terlihat melayang. Keajaiban alam di ujung timur Kalimantan.',
        'image' => 'images/beach.jpeg',
        'map_image' => 'images/gps-map-final.jpg',
        'map_url' => 'https://www.google.com/maps/search/?api=1&query=Labuan+Cermin+Biduk+Biduk',
        'stats' => [
            'popularity' => 5,
            'access' => 2,
            'area' => 1
        ],
        'bottom_stats' => [
            ['label' => 'Kedalaman', 'value' => '4-5 m', 'sub' => 'Dua Lapisan Air'],
            ['label' => 'Lokasi', 'value' => 'Biduk-Biduk', 'sub' => 'Berau Pesisir'],
            ['label' => 'Biaya', 'value' => '$', 'sub' => 'Sewa Perahu'],
            ['label' => 'Status', 'value' => 'Viral', 'sub' => 'Photography'],
        ],
        'next_id' => 'derawan',
        'next_img' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=600&q=80',
        'next_name' => 'Derawan'
    ]
];

// Get ID from URL, default to 'derawan'
$id = isset($_GET['id']) ? $_GET['id'] : 'derawan';

if (!array_key_exists($id, $destinations)) {
    $id = 'derawan';
}

$data = $destinations[$id];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?> - Detail Wisata</title>
    
    <!-- CSS -->
    @vite(['resources/css/style.css', 'resources/css/detail.css'])
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <!-- App Container (The "Screen" look) -->
    <div class="app-container">
        
        <!-- Background Image -->
        <div class="bg-layer">
            <img src="{{ str_starts_with($data['image'], 'http') ? $data['image'] : asset($data['image']) }}" alt="Background">
            <div class="bg-overlay"></div>
        </div>

        <!-- Navigation (Standard with Integrated Back Button) -->
        <nav class="main-nav" style="position: absolute; top: 0; left: 0; width: 100%; z-index: 100;">
            <div class="nav-logo">
                <a href="{{ url('/') }}" class="nav-back-arrow" style="margin-right: 15px; text-decoration: none; color: white;">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <i class="fas fa-mountain"></i>
                <span>Wisata</span>
            </div>

            <ul class="nav-links">
                <li><a href="{{ url('/#beranda') }}">Beranda</a></li>
                <li><a href="{{ url('/#destinasi') }}">Destinasi</a></li>
                <li><a href="{{ url('/#paket') }}">Paket Wisata</a></li>
            </ul>
            <div class="nav-items-right">
                <div class="nav-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="nav-auth">
                    <a href="{{ url('/') }}" class="btn-auth btn-login">Kembali</a>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="main-content">
            
            <div class="content-left">
                <h1 class="hero-title"><?php echo $data['title']; ?></h1>
                <p class="hero-desc"><?php echo $data['desc']; ?></p>
                
                <!-- Stats Bars -->
                <div class="stats-row">
                    <div class="stat-item">
                        <span class="stat-label">Popularitas</span>
                        <div class="stat-dots">
                            <?php for($i=0; $i<5; $i++): ?>
                                <span class="dot <?php echo $i < $data['stats']['popularity'] ? 'filled' : ''; ?>"></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Aksesibilitas</span>
                        <div class="stat-dots">
                            <?php for($i=0; $i<5; $i++): ?>
                                <span class="dot <?php echo $i < $data['stats']['access'] ? 'filled' : ''; ?>"></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Luas Area</span>
                        <div class="stat-dots">
                            <?php for($i=0; $i<5; $i++): ?>
                                <span class="dot <?php echo $i < $data['stats']['area'] ? 'filled' : ''; ?>"></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="#" class="btn-learn-more">Learn more</a>
                </div>
            </div>

            <!-- Right Content: Detailed Location Card -->
            <div class="content-right">
                <div class="location-card">
                    <!-- Top Map View -->
                    <div class="map-view-container">
                        <img src="{{ asset($data['map_image']) }}" alt="Location Map Aesthetic" class="map-img-rect">
                        <div class="map-pin-pulse"></div>
                        <a href="<?php echo $data['map_url']; ?>" target="_blank" class="btn-play-mini" style="text-decoration:none;">
                            <i class="fas fa-location-arrow"></i>
                        </a>
                    </div>

                    <!-- Bottom Details -->
                    <div class="location-details">
                        <div class="loc-header">
                            <span class="loc-subtitle">EXPLORE AREA</span>
                            <h3><?php echo $data['title']; ?></h3>
                        </div>
                        <p class="loc-desc">
                            <?php echo $data['subtitle']; ?> Terletak strategis dengan akses mudah ke spot utama.
                        </p>
                        
                        <div class="mini-stats-grid">
                            <div class="mini-stat">
                                <i class="fas fa-temperature-high"></i>
                                <span>28°C</span>
                            </div>
                            <div class="mini-stat">
                                <i class="fas fa-wind"></i>
                                <span>12 km/h</span>
                            </div>
                            <div class="mini-stat">
                                <i class="fas fa-compass"></i>
                                <span>NE</span>
                            </div>
                        </div>

                        <a href="<?php echo $data['map_url']; ?>" target="_blank" class="btn-open-map">
                            Open Full Map <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

        </main>

        <!-- Bottom Panel -->
        <footer class="bottom-panel">
            
            <!-- Info Columns -->
            <div class="info-grid">
                <?php foreach($data['bottom_stats'] as $index => $stat): ?>
                <div class="info-col">
                    <span class="info-num">0<?php echo $index + 1; ?></span>
                    <h4 class="info-label"><?php echo $stat['label']; ?></h4>
                    <p class="info-desc">
                        <?php echo $stat['sub']; ?><br>
                        <strong><?php echo $stat['value']; ?></strong>
                    </p>
                    <a href="#" class="info-link">Learn more <i class="fas fa-arrow-right"></i></a>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Navigation Controls -->
            <div class="nav-controls">
                
                <a href="{{ url('/detail?id=' . $data['next_id']) }}" class="nav-arrow prev">
                    <i class="fas fa-arrow-left"></i>
                </a>
                
                <a href="{{ url('/detail?id=' . $data['next_id']) }}" class="nav-arrow next">
                    <i class="fas fa-arrow-right"></i>
                </a>

                <!-- Next Preview -->
                <div class="next-preview">
                    <img src="{{ str_starts_with($data['next_img'], 'http') ? $data['next_img'] : asset($data['next_img']) }}" alt="Next">
                </div>
            </div>

        </footer>

    </div>

</body>
</html>
