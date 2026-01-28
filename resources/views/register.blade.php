<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Wisata Indonesia</title>
    @vite(['resources/css/style.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-yellow: #f8ff00;
            --dark-bg: #050505;
            --input-bg: #1a1a1a;
            --text-gray: #a0a0a0;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: white;
            overflow: hidden;
        }

        .reg-wrapper {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* Left Panel - Image */
        .reg-left {
            flex: 1.2;
            position: relative;
            background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=2070&auto=format&fit=crop') center/cover no-repeat;
            display: flex;
            align-items: flex-end;
            padding: 60px;
        }

        .reg-left::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 60%, transparent 100%);
        }

        .left-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
        }

        .left-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .logo-box {
            background: var(--primary-yellow);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-size: 20px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .left-title {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .left-title span {
            color: var(--primary-yellow);
            display: block;
        }

        .left-desc {
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
            font-size: 15px;
        }

        /* Right Panel - Form */
        .reg-right {
            flex: 0.8;
            background-color: var(--dark-bg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 8%;
            overflow-y: auto;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-header h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .form-header p {
            color: var(--text-gray);
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
        }

        .input-control {
            width: 100%;
            padding: 16px 20px;
            background: var(--input-bg);
            border: 1px solid #333;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            transition: all 0.3s;
        }

        .input-control:focus {
            outline: none;
            border-color: var(--primary-yellow);
            background: #222;
        }

        .input-with-icon {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 18px;
            background: var(--primary-yellow);
            color: black;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 30px;
            transition: transform 0.2s, opacity 0.2s;
        }

        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
            color: #333;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #333;
        }

        .divider span {
            padding: 0 15px;
        }

        .btn-google {
            width: 100%;
            padding: 16px;
            background: #1a1a1a;
            color: white;
            border: 1px solid #333;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-google:hover {
            background: #252525;
        }

        .login-link {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: var(--text-gray);
        }

        .login-link a {
            color: var(--primary-yellow);
            text-decoration: none;
            font-weight: 700;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 60px;
            font-size: 12px;
            color: #444;
        }

        .footer-links a {
            color: inherit;
            text-decoration: none;
        }

        .error-msg {
            color: #ff4d4d;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        @media (max-width: 992px) {
            .reg-left {
                display: none;
            }
            .reg-right {
                flex: 1;
                padding: 0 15%;
            }
        }
    </style>
</head>
<body>
    <div class="reg-wrapper">
        <!-- Left Section - Image & Branding -->
        <div class="reg-left">
            <div class="left-content">
                <div class="left-logo">
                    <div class="logo-box">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <span class="logo-text">Wisata</span>
                </div>
                <h1 class="left-title">
                    Jelajahi Jantung<br>
                    <span>Kalimantan Timur.</span>
                </h1>
                <p class="left-desc">
                    Temukan keajaiban alam tersembunyi dan warisan budaya yang tak ternilai di tanah Borneo.
                </p>
            </div>
        </div>

        <!-- Right Section - Form -->
        <div class="reg-right">
            <div class="form-header">
                <h2>Mulai Petualangan Anda</h2>
                <p>Buat akun untuk menjelajahi keindahan Kalimantan Timur.</p>
            </div>

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" id="fullname" name="fullname" class="input-control" placeholder="Masukkan nama lengkap" value="{{ old('fullname') }}" required>
                    @error('fullname')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="input-control" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-with-icon">
                        <input type="password" id="password" name="password" class="input-control" placeholder="Buat kata sandi" required>
                        <i class="far fa-eye eye-icon"></i>
                    </div>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input-control" placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit" class="btn-submit">Daftar</button>
            </form>

            <div class="divider">
                <span>ATAU</span>
            </div>

            <button class="btn-google">
                <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" width="18" alt="Google">
                Daftar dengan Google
            </button>

            <div class="login-link">
                Sudah punya akun? <a href="{{ url('/login') }}">Masuk</a>
            </div>

            <div class="footer-links">
                <a href="#">Syarat & Ketentuan</a>
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Bantuan</a>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggle
        document.querySelector('.eye-icon').addEventListener('click', function() {
            const passInput = document.getElementById('password');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                passInput.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
