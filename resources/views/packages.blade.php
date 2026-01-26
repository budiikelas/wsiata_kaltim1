<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pilihan Paket Wisata Terbaik di Kalimantan Timur dan Seluruh Indonesia.">
    <title>NexTrip - Travel Packages</title>
    
    <!-- CSS -->
    @vite(['resources/css/style.css'])
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Specific Styles for Packages Page to match NexTrip design */
        .packages-hero {
            position: relative;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--color-white);
            overflow: hidden;
            background: url('{{ asset("images/packages-hero-v3.png") }}') center/cover no-repeat;
        }

        .packages-hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .packages-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 0 20px;
        }

        .packages-hero-title {
            font-family: var(--font-body); /* Using body font for NexTrip style title */
            font-size: 64px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.1;
        }

        .packages-hero-title span {
            font-style: italic;
            font-weight: 400;
            display: block;
        }

        .packages-hero-subtitle {
            font-size: 18px;
            opacity: 0.9;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto;
        }

        .packages-section {
            padding: 100px 0;
            background: #fdfdfd; /* Light background for the grid */
            color: #333;
        }

        .packages-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .package-card {
            position: relative;
            height: 600px;
            border-radius: 12px;
            overflow: hidden;
            color: var(--color-white);
            transition: transform 0.4s ease;
            cursor: pointer;
        }

        .package-card:hover {
            transform: translateY(-10px);
        }

        .package-card-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .package-card:hover .package-card-img {
            transform: scale(1.1);
        }

        .package-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 50%, transparent 100%);
            z-index: 1;
        }

        .package-card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 40px 30px;
            z-index: 2;
        }

        .package-duration {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .package-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .package-desc {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.7;
            margin-bottom: 25px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
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
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-about p {
            font-size: 14px;
            line-height: 1.8;
            color: #888;
            margin-bottom: 30px;
            max-width: 300px;
        }

        .footer-socials {
            display: flex;
            gap: 20px;
        }

        .footer-socials a {
            color: #fff;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .footer-socials a:hover {
            color: var(--color-accent);
        }

        .footer-links h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links ul li {
            margin-bottom: 15px;
        }

        .footer-links ul li a {
            color: #888;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-links ul li a:hover {
            color: #fff;
        }

        .footer-contact h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #888;
        }

        .contact-item i {
            color: var(--color-accent);
            margin-top: 3px;
        }

        .footer-bottom {
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #555;
        }

        .footer-bottom-links {
            display: flex;
            gap: 30px;
        }

        .footer-bottom-links a {
            color: #555;
            text-decoration: none;
        }

        @media (max-width: 1024px) {
            .packages-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .packages-grid {
                grid-template-columns: 1fr;
            }
            .packages-hero-title {
                font-size: 40px;
            }
            .footer-grid {
                grid-template-columns: 1fr;
            }
            .packages-container {
                padding: 0 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation (Same as Landing) -->
    <nav class="main-nav">
        <div class="nav-logo">
            <i class="fas fa-mountain"></i>
            <span>NexTrip</span>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/#beranda') }}">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="{{ url('/#destinasi') }}">Destinations</a></li>
            <li><a href="{{ url('/packages') }}" class="active">Packages</a></li>
        </ul>
        <div class="nav-items-right">
            <div class="nav-info">
                <a href="mailto:mail@nextrip.co"><i class="fas fa-envelope"></i> mail@nextrip.co</a>
            </div>
            <div class="nav-auth">
                <a href="{{ url('/login') }}" class="btn-auth btn-login">Masuk</a>
                <a href="{{ url('/register') }}" class="btn-auth btn-register">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="packages-hero">
        <div class="packages-hero-content">
            <h1 class="packages-hero-title">
                Travel Packages
                <span>Crafted for You</span>
            </h1>
            <p class="packages-hero-subtitle">
                Discover stunning destinations, unique experiences, and custom itineraries that make your travel dreams real.
            </p>
        </div>
    </section>

    <!-- Packages Grid Section -->
    <section class="packages-section">
        <div class="packages-container">
            <div class="packages-grid">
                <!-- Package 1: Explore Bromo -->
                <div class="package-card">
                    <img src="{{ asset('images/bromo.png') }}" alt="Explore Bromo" class="package-card-img">
                    <div class="package-card-overlay"></div>
                    <div class="package-card-content">
                        <div class="package-duration">7 Days Trip</div>
                        <h3 class="package-title">Explore Bromo</h3>
                        <p class="package-desc">We offer more than just trips. We craft journeys that immerse you in the culture, history of every destination.</p>
                        <div class="package-footer">
                            <div class="package-price">
                                <span class="price-label">From</span>
                                <span class="price-value">$450<span>/pack</span></span>
                            </div>
                            <a href="{{ url('/detail?id=bromo') }}" class="btn-learn-more">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Package 2: Wildlife Safari -->
                <div class="package-card">
                    <img src="{{ asset('images/orangutan-hero.png') }}" alt="Wildlife Safari" class="package-card-img">
                    <div class="package-card-overlay"></div>
                    <div class="package-card-content">
                        <div class="package-duration">3 Days Trip</div>
                        <h3 class="package-title">Wildlife Safari</h3>
                        <p class="package-desc">We offer more than just trips. We craft journeys that immerse you in the culture, history of every destination.</p>
                        <div class="package-footer">
                            <div class="package-price">
                                <span class="price-label">From</span>
                                <span class="price-value">$950<span>/pack</span></span>
                            </div>
                            <a href="{{ url('/detail?id=safari') }}" class="btn-learn-more">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Package 3: Fuji Midnights -->
                <div class="package-card">
                    <img src="{{ asset('images/islandia.png') }}" alt="Fuji Midnights" class="package-card-img">
                    <div class="package-card-overlay"></div>
                    <div class="package-card-content">
                        <div class="package-duration">5 Days Trip</div>
                        <h3 class="package-title">Fuji Midnights</h3>
                        <p class="package-desc">We offer more than just trips. We craft journeys that immerse you in the culture, history of every destination.</p>
                        <div class="package-footer">
                            <div class="package-price">
                                <span class="price-label">From</span>
                                <span class="price-value">$750<span>/pack</span></span>
                            </div>
                            <a href="{{ url('/detail?id=fuji') }}" class="btn-learn-more">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Package 4: Enjoy Hawaii -->
                <div class="package-card">
                    <img src="{{ asset('images/beach.jpeg') }}" alt="Enjoy Hawaii" class="package-card-img">
                    <div class="package-card-overlay"></div>
                    <div class="package-card-content">
                        <div class="package-duration">7 Days Trip</div>
                        <h3 class="package-title">Enjoy Hawaii</h3>
                        <p class="package-desc">We offer more than just trips. We craft journeys that immerse you in the culture, history of every destination.</p>
                        <div class="package-footer">
                            <div class="package-price">
                                <span class="price-label">From</span>
                                <span class="price-value">$450<span>/pack</span></span>
                            </div>
                            <a href="{{ url('/detail?id=hawaii') }}" class="btn-learn-more">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Package 5: Bali Surfing -->
                <div class="package-card">
                    <img src="{{ asset('images/maladewa.png') }}" alt="Bali Surfing" class="package-card-img">
                    <div class="package-card-overlay"></div>
                    <div class="package-card-content">
                        <div class="package-duration">3 Days Trip</div>
                        <h3 class="package-title">Bali Surfing</h3>
                        <p class="package-desc">We offer more than just trips. We craft journeys that immerse you in the culture, history of every destination.</p>
                        <div class="package-footer">
                            <div class="package-price">
                                <span class="price-label">From</span>
                                <span class="price-value">$950<span>/pack</span></span>
                            </div>
                            <a href="{{ url('/detail?id=bali') }}" class="btn-learn-more">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Package 6: Nusa Penida -->
                <div class="package-card">
                    <img src="{{ asset('images/retreat.png') }}" alt="Nusa Penida" class="package-card-img">
                    <div class="package-card-overlay"></div>
                    <div class="package-card-content">
                        <div class="package-duration">5 Days Trip</div>
                        <h3 class="package-title">Nusa Penida</h3>
                        <p class="package-desc">We offer more than just trips. We craft journeys that immerse you in the culture, history of every destination.</p>
                        <div class="package-footer">
                            <div class="package-price">
                                <span class="price-label">From</span>
                                <span class="price-value">$750<span>/pack</span></span>
                            </div>
                            <a href="{{ url('/detail?id=penida') }}" class="btn-learn-more">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NexTrip Footer -->
    <footer class="nextrip-footer">
        <div class="packages-container">
            <div class="footer-grid">
                <div class="footer-about">
                    <div class="footer-logo">
                        <i class="fas fa-mountain"></i>
                        <span>NexTrip</span>
                    </div>
                    <p>Join our travel community for exclusive tips, destination inspiration, and special offers.</p>
                    <div class="footer-socials">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-x-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Discover</h4>
                    <ul>
                        <li><a href="#">Destinations</a></li>
                        <li><a href="#">Packages</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Travel Tips</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Destination</h4>
                    <ul>
                        <li><a href="#">Lombok</a></li>
                        <li><a href="#">Seribu Islands</a></li>
                        <li><a href="#">Yogyakarta</a></li>
                        <li><a href="#">West Sumatra</a></li>
                        <li><a href="#">Baturraden</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>Contact</h4>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Mountain View Parkway, Paradise Road 70, CA.</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>mail@nextrip.co</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+123 456 789</span>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Powered by SocioLib</p>
                <p>www.DownloadNewThemes.com</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Our Terms</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll and other interactions can be added here
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('.main-nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
