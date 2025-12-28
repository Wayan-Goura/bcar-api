# 🚗 BCAR: API & Web Booking System

[![Laravel](https://img.shields.io/badge/Laravel-v12.0-FF2D20?style=flat&logo=laravel)](https://laravel.com)  
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)](https://www.php.net/)  
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)  
[![Status](https://img.shields.io/badge/Status-Ready_for_UAS-blue)](https://github.com/)

**BCAR** adalah aplikasi **Booking Car & Tour** berbasis Laravel yang menggabungkan **Web Application** dan **REST API** dengan konsep **CRUD**, **Authentication**, dan **Relasi Database**. Proyek ini dirancang menggunakan best practice agar dapat digunakan langsung melalui browser maupun diakses melalui API modern seperti Postman atau aplikasi mobile. Aplikasi terdiri dari tiga komponen utama:  
1. **Web Application**: Digunakan oleh user untuk melakukan booking secara langsung melalui browser (menggunakan Session & Blade).  
2. **REST API**: Menyediakan endpoint JSON untuk integrasi mobile atau pengujian Postman dengan token Bearer Laravel Sanctum.  
3. **Admin Dashboard API**: Menyajikan statistik data, status booking, dan relasi antar modul secara real-time.

---

## 📌 Features

- **Dual-Interface System**: Separate logic for Web (Blade) and RESTful API (Sanctum).
- **Smart Dashboard**: Real-time statistics for total cars, tours, and booking requests.
- **Advanced CRUD**: Complete management for vehicles, tour packages, and client reservations.
- **Search & Filter**: Find bookings by customer name or filter by status (Pending/Confirmed).
- **Relational Data**: Seamless integration between Cars ↔ Bookings using Eloquent ORM.
- **Secure Auth**: Token-based authentication for all API endpoints.
- **Image Handling**: Integrated support for car and tour gallery thumbnails.

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
### 🔐 Authentication
| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `POST` | `/api/login` | Mendapatkan access token (Bearer) |
| `POST` | `/api/logout` | Revoke / menghapus access token |

### 🚙 Car & Tour Management
| Modul | Method | Endpoint | Description |
| :--- | :--- | :--- | :--- |
| **Cars** | `GET/POST/PUT/DELETE` | `/api/cars` | Manajemen armada mobil |
| **Tours** | `GET/POST/PUT/DELETE` | `/api/tours` | Manajemen paket tour |
| **Bookings** | `POST` | `/api/book-cars` | Kirim reservasi mobil baru |
| **Bookings** | `GET` | `/api/book-tours` | Tarik semua riwayat tour |
| **Dashboard** | `GET` | `/api/dashboard` | Statistik & aktivitas terbaru |

---

## 🔍 Search & Filter Implementation

Sistem ini mendukung pencarian dinamis melalui **URL Parameters** untuk memudahkan integrasi frontend:

* **Search by Name**: `GET /api/book-cars?search=John`  
    *Mencari data booking berdasarkan nama pemesan.*
* **Filter by Status**: `GET /api/book-tours?status=pending`  
    *Menyaring data berdasarkan status (pending, confirmed, dll).*
* **Dashboard Summary**:  
    *Menampilkan total pendapatan dan jumlah antrian booking secara otomatis.*

---

## 🛠️ How to Setup (Local)

Ikuti langkah-langkah berikut untuk menjalankan project di lingkungan lokal:

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/username/bcar-system.git](https://github.com/username/bcar-system.git)
    cd bcar-system
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan kredensial database Anda:
    - `DB_DATABASE=nama_database`
    - `DB_USERNAME=root`
    - `DB_PASSWORD=password`

4.  **Generate Key & Migrate**
    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

5.  **Jalankan Aplikasi**
    ```bash
    php artisan serve
    ```

---

## 👨‍🎓 Catatan Akademik

Project BCAR telah memenuhi kriteria penilaian **UAS Web Programming / Backend Development**:

* ✅ **CRUD**: Implementasi lengkap (Create, Read, Update, Delete) pada semua modul utama.
* ✅ **Authentication**: Keamanan API terjamin menggunakan Laravel Sanctum.
* ✅ **Relasi Database**: Menghubungkan tabel secara efisien (**Car ↔ BookCar** & **Tour ↔ BookTour**).
* ✅ **REST API**: Standarisasi respon JSON dengan HTTP Status Code yang akurat.
* ✅ **Dashboard**: Menampilkan data agregat untuk membantu pengambilan keputusan admin.

---
## 🗂️ Struktur Project

Folder dan file utama yang menangani logika aplikasi:

```text
app/
├── Http/Controllers/
│   ├── Api/                    
│   │   ├── AuthController.php      # Login & Token Management
│   │   ├── CarController.php       # Resource Mobil
│   │   ├── TourController.php      # Resource Tour
│   │   ├── BookCarController.php   # Transaksi Booking Mobil
│   │   ├── BookTourController.php  # Transaksi Booking Tour
│   │   └── DashboardController.php # Agregasi Data & Stats
├── Models/                     
│   ├── Car.php                 # Relasi HasMany ke BookCar
│   ├── Tour.php                # Relasi HasMany ke BookTour
│   ├── BookCar.php             # Relasi BelongsTo ke Car
│   └── BookTour.php            # Relasi BelongsTo ke Tour
routes/
├── web.php                     # Rute untuk UI Browser (Session)
└── api.php                     # Rute untuk RESTful API (Stateless)
