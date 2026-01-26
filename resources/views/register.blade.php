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

            <form action="{{ url('/register') }}" method="POST" class="auth-form">
                @csrf
                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="fullname" name="fullname" placeholder="Nama Anda" value="{{ old('fullname') }}" required>
                    </div>
                    @error('fullname')
                        <span class="error-msg" style="color: #ff4d4d; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <span class="error-msg" style="color: #ff4d4d; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                    @error('password')
                        <span class="error-msg" style="color: #ff4d4d; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
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
