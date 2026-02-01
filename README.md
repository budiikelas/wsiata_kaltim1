# Wisata Kaltim

**Deskripsi singkat**
Aplikasi ini adalah aplikasi sederhana untuk katalog destinasi wisata di Kalimantan Timur. Dibangun dengan Laravel; berfungsi menampilkan kategori, destinasi, galeri, fasilitas, dan review pengguna.

## Fitur utama 
- Manajemen kategori destinasi
- CRUD destinasi dengan galeri dan fasilitas
- Sistem review untuk setiap destinasi
- Autentikasi pengguna (Laravel auth)
- Seeder & migrasi untuk data awal

## Persyaratan 
- PHP 8.x
- Composer
- MySQL atau MariaDB
- Node.js & npm (untuk asset bundling)
- XAMPP (opsional di Windows)

## Instalasi (cepat) 
1. Clone repository:
   ```bash
   git clone <repo-url> wsiata_kaltim1
   cd wsiata_kaltim1
   ```
2. Install dependensi PHP:
   ```bash
   composer install
   ```
3. Salin file environment dan atur konfigurasi database:
   ```bash
   cp .env.example .env
   # lalu sesuaikan DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD
   ```
4. Generate aplikasi key:
   ```bash
   php artisan key:generate
   ```
5. Jalankan migrasi dan seeder (opsional untuk data contoh):
   ```bash
   php artisan migrate --seed
   ```
6. Install dependensi Node dan build asset:
   ```bash
   npm install
   npm run dev    # atau npm run build untuk produksi
   ```
7. (Windows/XAMPP) Pastikan virtual host atau server mengarah ke folder `public/` dan jalankan:
   ```bash
   php artisan serve
   ```

## Menjalankan test 
```bash
php artisan test
```

## Struktur singkat repository 
- `app/Models` — model Eloquent (Category, Destination, Facility, Gallery, Review, User)
- `database/migrations` — struktur tabel
- `resources/views` — tampilan (Blade)
- `public/` — publik asset


## Alur Aplikasi (Flowchart)
---
config:
  theme: redux
  layout: elk
---
flowchart LR
  %% 1. Entry Point
  Start((Mulai)) --> LandingPage

  %% 2. Guest Area (Ditulis paling awal agar muncul di kiri)
  subgraph Guest[Pengunjung Umum]
    direction TB
    LandingPage[Landing Page / Home] --> DaftarDestinasi[Daftar Destinasi]
    DaftarDestinasi --> Detail[Detail Destinasi]
    Detail --> Galeri[View Gallery]
    Detail --> ReviewSection[Lihat Review]
  end

  %% 3. Logika Auth (Di tengah)
  subgraph Auth[Sistem Autentikasi]
    direction TB
    LoginPage[Login/Register] --> AuthProcess[Proses Auth]
    AuthProcess --> CekLogin{Berhasil?}
    CekLogin -- Tidak --> LoginPage
    CekLogin -- Ya --> CekRole{Cek Role}
  end

  %% 4. User Area (Kanan Atas)
  subgraph UserArea[User Logged In]
    direction TB
    FormReview[Form Review] --> Simpan[Simpan Review]
    Simpan --> Redirect[Redirect]
    Logout --> LandingPage
  end

  %% 5. Admin Area (Kanan Bawah)
  subgraph AdminArea[Admin Panel]
    direction TB
    DashAdmin[Dashboard] --> ManDest[Manajemen Destinasi]
    ManDest --> CRUD[Create/Edit/Delete]
    CRUD --> DB[(Database)]
  end

  %% --- CONNECTIONS ---
  %% Hubungkan antar subgraph di sini agar layout lebih terkontrol
  
  ReviewSection -->|Ingin Tulis Review| CekSession{Sudah Login?}
  
  CekSession -- Belum --> LoginPage
  CekSession -- Sudah --> FormReview
  
  Redirect --> Detail
  
  CekRole -->|User| ReviewSection
  CekRole -->|Admin| DashAdmin

  %% API (Opsional, taruh di bawah atau atas)
  subgraph API_System[API Routes]
    GetDest[GET /api/destinations] -.-> DaftarDestinasi
    PostRev[POST /api/reviews] -.-> Simpan
  end
  
  %% Styling (Sama seperti sebelumnya)
  classDef green fill:#d4edda,stroke:#28a745;
  classDef yellow fill:#fff3cd,stroke:#ffc107;
  classDef blue fill:#cfe2ff,stroke:#0d6efd;
  classDef gray fill:#f8f9fa,stroke:#6c757d;

  class Guest,Start gray;
  class Auth,CekSession yellow;
  class UserArea green;
  class AdminArea blue;


---