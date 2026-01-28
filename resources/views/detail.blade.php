<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - Detail Wisata</title>
    
    <!-- CSS -->
    @vite(['resources/css/style.css', 'resources/css/detail.css'])
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        .btn-favorite {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-right: 15px;
        }
        .btn-favorite:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }
        .btn-favorite.active {
            color: #ff4757;
            background: rgba(255, 71, 87, 0.1);
            border-color: #ff4757;
        }

        /* Review Section Refinements */
        .reviews-container {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 50px;
            padding: 30px 0;
            margin-top: 30px;
        }

        .review-list-side {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .reviews-header-summary {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 10px;
            background: rgba(255, 255, 255, 0.03);
            padding: 20px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .avg-rating-box {
            background: var(--color-accent);
            color: black;
            padding: 15px 20px;
            border-radius: 18px;
            text-align: center;
        }

        .avg-value { font-size: 28px; font-weight: 800; display: block; line-height: 1; }
        .avg-label { font-size: 10px; font-weight: 700; text-transform: uppercase; opacity: 0.7; }

        .summary-info h4 { font-size: 18px; margin-bottom: 5px; }
        .summary-info p { font-size: 13px; color: rgba(255,255,255,0.5); }

        .review-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 450px;
            overflow-y: auto;
            padding-right: 15px;
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,0.1) transparent;
        }

        .review-list::-webkit-scrollbar { width: 4px; }
        .review-list::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }

        .review-item {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 22px;
            padding: 20px;
            display: flex;
            gap: 18px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .review-item:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--color-accent), #ffd700);
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-weight: 800;
            font-size: 18px;
            flex-shrink: 0;
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.2);
        }

        .review-content { flex: 1; }
        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .reviewer-name { font-weight: 700; font-size: 15px; color: white; }
        .review-stars { color: #ffc107; font-size: 11px; display: flex; gap: 2px; }
        .review-text { 
            font-size: 14px; 
            color: rgba(255,255,255,0.7); 
            line-height: 1.6; 
            margin-bottom: 10px;
        }
        .review-date { font-size: 11px; color: rgba(255,255,255,0.3); font-weight: 500; }

        .review-form-card {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 35px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            position: sticky;
            top: 20px;
        }

        .form-title { font-size: 22px; font-weight: 800; margin-bottom: 8px; letter-spacing: -0.5px; }
        .form-subtitle { font-size: 13px; color: rgba(255,255,255,0.4); margin-bottom: 25px; display: block; }
        
        .rating-input {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            gap: 12px;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.03);
            padding: 15px;
            border-radius: 20px;
        }
        .rating-input input { display: none; }
        .rating-input label {
            font-size: 32px;
            color: rgba(255,255,255,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .rating-input label:hover,
        .rating-input label:hover ~ label,
        .rating-input input:checked ~ label {
            color: #ffc107;
            transform: scale(1.2);
            text-shadow: 0 0 15px rgba(255, 193, 7, 0.4);
        }

        .comment-wrapper { position: relative; margin-bottom: 20px; }
        .comment-textarea {
            width: 100%;
            background: rgba(0,0,0,0.3);
            border: 2px solid rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 20px;
            color: white;
            font-family: inherit;
            font-size: 15px;
            resize: none;
            transition: all 0.3s ease;
        }
        .comment-textarea:focus {
            outline: none;
            border-color: var(--color-accent);
            background: rgba(0,0,0,0.4);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.05);
        }

        .btn-submit-review {
            width: 100%;
            background: linear-gradient(135deg, var(--color-accent), #ffd700);
            color: black;
            border: none;
            padding: 16px;
            border-radius: 18px;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-submit-review:hover { 
            transform: scale(1.02) translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.3);
        }
        .btn-submit-review:active { transform: scale(0.98); }

        .success-alert {
            background: linear-gradient(135deg, rgba(46, 213, 115, 0.2), rgba(46, 213, 115, 0.1));
            border: 1px solid rgba(46, 213, 115, 0.4);
            color: #2ed573;
            padding: 18px;
            border-radius: 20px;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .empty-reviews {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 30px;
            border: 2px dashed rgba(255, 255, 255, 0.05);
        }
        .empty-reviews i { font-size: 50px; color: rgba(255, 255, 255, 0.1); margin-bottom: 20px; }
        .empty-reviews p { color: rgba(255, 255, 255, 0.4); font-size: 15px; }

        .auth-lock-card {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body>
    
    <!-- App Container (The "Screen" look) -->
    <div class="app-container">
        
        <!-- Background Image -->
        <div class="bg-layer">
            <img src="{{ $destination->thumbnail ? asset($destination->thumbnail) : asset('images/beach.jpeg') }}" alt="Background">
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
                <li><a href="{{ url('/packages') }}">Packages</a></li>
            </ul>
            <div class="nav-items-right">
                <div class="nav-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="nav-auth">
                    @guest
                        <a href="{{ url('/') }}" class="btn-auth btn-login">Kembali</a>
                    @endguest

                    @auth
                        <div class="nav-user-profile">
                            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down" style="font-size: 10px; opacity: 0.5;"></i>
                            
                            <div class="user-dropdown">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-user-circle"></i> Profil Saya
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-heart"></i> Favorit
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout">
                                        <i class="fas fa-sign-out-alt"></i> Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="main-content">
            
            <div class="content-left">
                <h1 class="hero-title">{{ $destination->name }}</h1>
                <p class="hero-desc">{{ $destination->description }}</p>
                
                <!-- Stats Bars -->
                <div class="stats-row">
                    <div class="stat-item">
                        <span class="stat-label">Popularitas</span>
                        <div class="stat-dots">
                            @for($i=0; $i<5; $i++)
                                <span class="dot {{ $i < ($destination->rating ?? 4) ? 'filled' : '' }}"></span>
                            @endfor
                        </div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Aksesibilitas</span>
                        <div class="stat-dots">
                            @for($i=0; $i<5; $i++)
                                <span class="dot {{ $i < 4 ? 'filled' : '' }}"></span>
                            @endfor
                        </div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Luas Area</span>
                        <div class="stat-dots">
                            @for($i=0; $i<5; $i++)
                                <span class="dot {{ $i < 3 ? 'filled' : '' }}"></span>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="action-buttons" style="display: flex; align-items: center;">
                    @auth
                        @php $isFavorited = Auth::user()->favorites()->where('destination_id', $destination->id)->exists(); @endphp
                        <button class="btn-favorite {{ $isFavorited ? 'active' : '' }}" id="fav-btn" data-id="{{ $destination->id }}">
                            <i class="{{ $isFavorited ? 'fas' : 'far' }} fa-heart"></i>
                        </button>
                    @endauth
                    <a href="#" class="btn-learn-more">Learn more</a>
                </div>
            </div>

            <!-- Right Content: Detailed Location Card -->
            <div class="content-right">
                <div class="location-card">
                    <!-- Top Map View -->
                    <div class="map-view-container">
                        <img src="{{ asset('images/gps-map-final.jpg') }}" alt="Location Map Aesthetic" class="map-img-rect">
                        <div class="map-pin-pulse"></div>
                        @php
                            $mapUrl = "https://www.google.com/maps/search/?api=1&query=" . urlencode($destination->name . ' ' . $destination->location);
                            if($destination->latitude && $destination->longitude) {
                                $mapUrl = "https://www.google.com/maps/search/?api=1&query={$destination->latitude},{$destination->longitude}";
                            }
                        @endphp
                        <a href="{{ $mapUrl }}" target="_blank" class="btn-play-mini" style="text-decoration:none;">
                            <i class="fas fa-location-arrow"></i>
                        </a>
                    </div>

                    <!-- Bottom Details -->
                    <div class="location-details">
                        <div class="loc-header">
                            <span class="loc-subtitle">EXPLORE AREA</span>
                            <h3>{{ $destination->name }}</h3>
                        </div>
                        <p class="loc-desc">
                            {{ $destination->location }}. Terletak strategis dengan akses mudah ke spot utama.
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

                        <a href="{{ $mapUrl }}" target="_blank" class="btn-open-map">
                            Open Full Map <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

        </main>

        <!-- Bottom Panel -->
        <footer class="bottom-panel">
            
            <!-- Reviews Section -->
            <div class="reviews-container">
                <div class="review-list-side">
                    @php
                        $avgRating = $destination->reviews->avg('rating');
                        $reviewCount = $destination->reviews->count();
                    @endphp
                    
                    <div class="reviews-header-summary">
                        <div class="avg-rating-box">
                            <span class="avg-value">{{ number_format($avgRating ?: 5.0, 1) }}</span>
                            <span class="avg-label">RATING</span>
                        </div>
                        <div class="summary-info">
                            <h4>Suara Pengunjung</h4>
                            <p>Berdasarkan {{ $reviewCount }} ulasan dari para traveler.</p>
                        </div>
                    </div>
                    
                    @if(session('success'))
                        <div class="success-alert">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="review-list">
                        @forelse($destination->reviews()->latest()->get() as $review)
                            <div class="review-item">
                                <div class="reviewer-avatar">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div class="review-content">
                                    <div class="review-header">
                                        <span class="reviewer-name">{{ $review->user->name }}</span>
                                        <div class="review-stars">
                                            @for($i=0; $i<5; $i++)
                                                <i class="{{ $i < $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="review-text">{{ $review->comment }}</p>
                                    <div class="review-date">
                                        <i class="far fa-clock" style="margin-right: 5px;"></i>
                                        {{ $review->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-reviews">
                                <i class="far fa-comment-dots"></i>
                                <p>Belum ada ulasan. Jadilah yang pertama memberikan kesan!</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="review-form-side">
                    @auth
                        <div class="review-form-card">
                            <span class="form-subtitle">BERIKAN PENILAIAN</span>
                            <h4 class="form-title">Bagikan Pengalaman</h4>
                            
                            <form action="{{ route('reviews.store') }}" method="POST" id="review-form">
                                @csrf
                                <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                                
                                <div class="rating-input">
                                    <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" title="Sempurna"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Bagus"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Cukup"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Buruk"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sangat Buruk"><i class="fas fa-star"></i></label>
                                </div>

                                <div class="comment-wrapper">
                                    <textarea name="comment" class="comment-textarea" rows="5" placeholder="Apa yang membuat kunjungan Anda berkesan?" required></textarea>
                                </div>
                                
                                <button type="submit" class="btn-submit-review">
                                    <span>Kirim Ulasan Sekarang</span>
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="auth-lock-card">
                            <div style="background: rgba(255,255,255,0.05); width: 70px; height: 70px; border-radius: 25px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                                <i class="fas fa-lock" style="font-size: 28px; color: var(--color-accent);"></i>
                            </div>
                            <h4 style="margin-bottom: 10px;">Ingin Memberi Ulasan?</h4>
                            <p style="font-size: 14px; color: rgba(255,255,255,0.4); margin-bottom: 25px;">Silakan masuk ke akun Anda untuk berbagi pengalaman bersama kami.</p>
                            <a href="{{ url('/') }}" class="btn-submit-review" style="text-decoration: none;">
                                <i class="fas fa-sign-in-alt"></i> Login Sekarang
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Navigation Controls -->
            <div class="nav-controls">
                
                <a href="{{ url('/detail?id=' . $nextDestination->id) }}" class="nav-arrow prev">
                    <i class="fas fa-arrow-left"></i>
                </a>
                
                <a href="{{ url('/detail?id=' . $nextDestination->id) }}" class="nav-arrow next">
                    <i class="fas fa-arrow-right"></i>
                </a>

                <!-- Next Preview -->
                <div class="next-preview">
                    <img src="{{ $nextDestination->thumbnail ? asset($nextDestination->thumbnail) : asset('images/beach.jpeg') }}" alt="Next">
                </div>
            </div>

        </footer>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const favBtn = document.getElementById('fav-btn');
            if (favBtn) {
                favBtn.addEventListener('click', async function() {
                    const destId = this.dataset.id;
                    const icon = this.querySelector('i');
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
                            if (data.status === 'added') {
                                this.classList.add('active');
                                icon.classList.replace('far', 'fas');
                            } else {
                                this.classList.remove('active');
                                icon.classList.replace('fas', 'far');
                            }
                        } else {
                            alert(data.message || 'Something went wrong');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Error toggling favorite');
                    }
                });
            }
        });
    </script>
</body>
</html>
