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
        <ul class="nav-links">
            <li><a href="{{ url('/#beranda') }}">Beranda</a></li>
            <li><a href="{{ url('/#destinasi') }}">Destinasi</a></li>
            <li><a href="{{ url('/packages') }}">Packages</a></li>
            <li><a href="{{ url('/#contact') }}">Kontak</a></li>
        </ul>
        <div class="nav-items-right">
            <div class="nav-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
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
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-circle"></i> <span>Profil Saya</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-heart"></i> <span>Favorit</span>
                            </a>
                            @if(Auth::user()->is_admin)
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/admin') }}" class="dropdown-item" style="color: var(--color-accent);">
                                <i class="fas fa-crown"></i> <span>Dashboard Admin</span>
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
        <section class="schedule-section">
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
                                <span class="trip-duration">
                                    <i class="far fa-clock"></i> {{ $dest->duration ?? '2 Hari 1 Malam' }}
                                </span>
                                <a href="{{ url('/detail?id=' . $dest->id) }}" class="card-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 50px; color: rgba(255,255,255,0.5);">
                        <i class="fas fa-map-marked-alt" style="font-size: 40px; margin-bottom: 20px; display: block;"></i>
                        <p>Belum ada destinasi yang tersedia. Silakan tambahkan melalui Dashboard Admin.</p>
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
                        
                        @php $firstDest = $destinations->first(); @endphp
                        <div class="destination-info reveal reveal-fade-up reveal-delay-2" id="destination-info">
                            <h3 class="active-dest-title">{{ $firstDest->name ?? 'Destinasi Populer' }}</h3>
                            <p class="active-dest-desc">{{ Str::limit($firstDest->description ?? 'Jelajahi keindahan alam Kalimantan Timur.', 150) }}</p>
                            <div class="active-dest-rating">
                                @php $rating = $firstDest->rating ?? 5; @endphp
                                @for($i=1; $i<=5; $i++)
                                    <i class="{{ $i <= $rating ? 'fas' : 'far' }} fa-star"></i>
                                @endfor
                            </div>
                            <a href="{{ url('/detail?id=' . ($firstDest->id ?? '')) }}" class="explore-btn gallery-explore-btn">
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
                            @foreach($destinations as $dest)
                            <div class="carousel-card {{ $loop->first ? 'active' : '' }}" 
                                 data-id="{{ $dest->id }}"
                                 data-title="{{ $dest->name }}" 
                                 data-desc="{{ Str::limit($dest->description, 150) }}"
                                 data-rating="{{ $dest->rating ?? 5 }}">
                                <img src="{{ $dest->thumbnail ? asset($dest->thumbnail) : asset('images/beach.jpeg') }}" alt="{{ $dest->name }}">
                                <div class="card-overlay"></div>
                            </div>
                            @endforeach
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
                                <h4>Top Destination</h4>
                                <p>{{ $firstDest->name ?? 'Explore Kaltim' }}</p>
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

            // Show 'Wisata Lainnya' button only on 'all' filter and empty search
            if (activeFilter === 'all' && searchTerm === '') {
                moreDestBtn.style.display = 'block';
                setTimeout(() => moreDestBtn.style.opacity = '1', 10);
            } else {
                moreDestBtn.style.opacity = '0';
                setTimeout(() => moreDestBtn.style.display = 'none', 400);
            }
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

        document.querySelectorAll('.story-section, .gallery-section, .schedule-section, .pricing-section, .contact-section, .cta-section').forEach(el => {
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

    <!-- Enhanced Styles for Custom Buttons -->
    <style>
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

        .btn-more-dest i {
            font-size: 16px;
            transition: transform 0.4s ease;
        }

        .btn-more-dest:hover i {
            transform: translateX(8px);
        }

        /* Pulsing effect for the button container to make it pop */
        .more-dest-wrapper {
            position: relative;
            padding-bottom: 20px;
        }

        .more-dest-wrapper::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--color-accent), transparent);
            opacity: 0.5;
        }
    </style>
</body>
</html>
