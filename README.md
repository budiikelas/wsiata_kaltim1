# Wisata Kaltim

**Deskripsi singkat**
Aplikasi ini adalah clone sederhana untuk katalog destinasi wisata di Kalimantan Timur. Dibangun dengan Laravel; berfungsi menampilkan kategori, destinasi, galeri, fasilitas, dan review pengguna.

---

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

---

## Struktur singkat repository 📂
- `app/Models` — model Eloquent (Category, Destination, Facility, Gallery, Review, User)
- `database/migrations` — struktur tabel
- `resources/views` — tampilan (Blade)
- `public/` — publik asset

## Kontribusi 
- Buka issue atau kirim PR dengan perubahan kecil dulu.
- Ikuti standar penulisan kode (PSR-12) dan sertakan test jika perlu.
