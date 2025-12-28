# 🚗 BCAR: API & Web Booking System

[![Laravel](https://img.shields.io/badge/Laravel-v12.0-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)](https://www.php.net/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Status](https://img.shields.io/badge/Status-Ready_for_UAS-blue)](https://github.com/)

**BCAR** adalah aplikasi **Booking Car & Tour** berbasis Laravel yang menerapkan konsep **RESTful API**, **Authentication**, **CRUD**, dan **Relasi Database**. Proyek ini dirancang menggunakan best practice pemisahan antara **Web Application** dan **REST API**.

---

## 📌 Konsep Aplikasi

Aplikasi ini terdiri dari tiga komponen utama:
- **Web Application:** Digunakan oleh user untuk melakukan booking secara langsung melalui browser (menggunakan Session & Blade).
- **REST API:** Untuk kebutuhan integrasi mobile app, frontend modern, atau pengujian via Postman (menggunakan JSON & Sanctum).
- **Admin Dashboard API:** Menyajikan data statistik, status booking, dan relasi data secara otomatis.

---

## ⚙️ Tech Stack

| Komponen | Teknologi |
| :--- | :--- |
| **Backend** | Laravel 12 |
| **Database** | MySQL |
| **Authentication** | Laravel Sanctum (Bearer Token) |
| **API Testing** | Postman |
| **Web Template** | Blade Engine |
| **Server** | PHP 8.2+ |

---

## 🗂️ Struktur Proyek

Berikut adalah struktur folder utama yang menangani logika bisnis:

```text
app/
├── Http/Controllers/
│   ├── Api/                    # Logika RESTful API
│   │   ├── AuthController.php
│   │   ├── CarController.php
│   │   ├── TourController.php
│   │   ├── BookCarController.php
│   │   ├── BookTourController.php
│   │   └── DashboardController.php
├── Models/                     # Definisi Relasi Eloquent
│   ├── Car.php                 # Relasi ke BookCar
│   ├── Tour.php                # Relasi ke BookTour
│   ├── BookCar.php             
│   └── BookTour.php            
routes/
├── web.php                     # Rute Web (UI Browser)
└── api.php                     # Rute REST API
🔐 Panduan Pengguna API (Postman)
1. Autentikasi
Kirim permintaan POST untuk mendapatkan akses token.

Endpoint: POST /api/login

JSON

{
  "email": "admin@admin.com",
  "password": "admin123"
}
2. Set Token
Tambahkan header berikut pada setiap request API setelah login: Authorization: Bearer {token_anda}

3. Endpoint Fitur
CRUD Cars: GET|POST|PUT|DELETE /api/cars

CRUD Tours: GET|POST|PUT|DELETE /api/tours

Bookings: POST /api/book-cars | GET /api/book-tours

Dashboard: GET /api/dashboard (Menampilkan total data & status terbaru)

🛠️ Instalasi Lokal
Clone Repository

Bash

git clone [https://github.com/username/bcar-system.git](https://github.com/username/bcar-system.git)
Install Dependencies

Bash

composer install
Konfigurasi Environment Salin .env.example menjadi .env dan sesuaikan database.

Generate Key & Migrate

Bash

php artisan key:generate
php artisan migrate --seed
Jalankan Aplikasi

Bash

php artisan serve
👨‍🎓 Catatan Akademik
Project ini telah memenuhi kriteria penilaian UAS Web Programming / Backend Development:

[x] CRUD: Berhasil diimplementasikan pada semua modul.

[x] Authentication: Menggunakan Laravel Sanctum.

[x] Relasi Database: Car ↔ BookCar & Tour ↔ BookTour.

[x] REST API: Output standar JSON dengan status code yang sesuai.

[x] Dashboard: Statistik data agregat untuk kebutuhan admin
