<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Wisata Indonesia</title>
    @vite(['resources/css/style.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="auth-page">
    <div class="auth-bg">
        <img src="{{ asset('images/hero-beach.png') }}" alt="Background">
        <div class="auth-overlay"></div>
    </div>

    <div class="auth-container">
        <div class="auth-card glass-effect">
            <div class="auth-header">
                <a href="{{ url('/') }}" class="auth-logo">
                    <i class="fas fa-mountain"></i>
                    <span>Wisata</span>
                </a>
                <h2>Buat Akun Baru</h2>
                <p>Mulai petualangan tak terlupakan bersama kami</p>
            </div>

            <form action="#" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="fullname" name="fullname" placeholder="Nama Anda" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="auth-btn">Daftar</button>
            </form>

            <div class="auth-footer">
                <p>Sudah punya akun? <a href="{{ url('/login') }}">Masuk disini</a></p>
            </div>
        </div>
    </div>
</body>
</html>
