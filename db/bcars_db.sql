-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2026 pada 01.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcars_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_cars`
--

CREATE TABLE `book_cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(50) DEFAULT NULL,
  `car_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `passenger` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `rental_duration` int(11) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `pickup_time` time NOT NULL,
  `message` text DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `status` enum('pending','approved','completed','canceled') NOT NULL DEFAULT 'pending',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `book_cars`
--

INSERT INTO `book_cars` (`id`, `booking_code`, `car_name`, `name`, `email`, `phone`, `country`, `passenger`, `booking_date`, `rental_duration`, `pickup_location`, `room_no`, `pickup_time`, `message`, `price`, `status`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Porshce', 'Wayan', 'wayangoura123@gmail.com', '0881037757134', 'USA', 2, '2025-12-18', 2, 'https://maps.app.goo.gl/ZA7r9gHP2dPMutUw5', '23211', '11:11:00', 'tidak ada', NULL, 'approved', NULL, '2025-12-16 17:50:36', '2025-12-31 00:06:47'),
(4, NULL, 'elf kleng', 'Komang', 'admin@mail.com', '0881037757134', 'United Pejeng', 3, '2025-11-11', 1, 'Vilaa kayon', '12312', '00:11:00', 'tidak ada', NULL, 'completed', NULL, '2025-12-17 20:18:01', '2025-12-17 20:51:55'),
(5, NULL, 'Komang', 'azwesxdrctfvgybhu', 'qwesdcrtfvgbyhu@mail.com', '1234567890', 'azwesxdctfvgby', 2, '2025-12-02', 1, 'kuta', NULL, '00:00:00', 'awazesdfxcgvh', NULL, 'pending', NULL, '2025-12-29 02:56:23', '2025-12-29 02:56:23'),
(7, NULL, 'Innova Reborn', 'Agus', 'agus@gmail.com', '08123456789', 'Indonesia', 4, '2025-12-25', 2, 'Hotel Bali', '203', '08:00:00', 'Please on time', NULL, 'approved', NULL, '2025-12-31 01:02:17', '2025-12-31 01:05:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_tours`
--

CREATE TABLE `book_tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(50) DEFAULT NULL,
  `tour_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `participants` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `pickup_time` time NOT NULL,
  `message` text DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `status` enum('pending','approved','completed','canceled') NOT NULL DEFAULT 'pending',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `book_tours`
--

INSERT INTO `book_tours` (`id`, `booking_code`, `tour_name`, `name`, `email`, `phone`, `participants`, `booking_date`, `pickup_location`, `room_no`, `pickup_time`, `message`, `price`, `status`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Kintamani Plantation', 'Komanggg', 'bepasih@gmail.com', '0882345678', 4, '2025-12-17', 'Buruan', '23322', '02:33:00', 'kleee', NULL, 'completed', NULL, '2025-12-16 17:53:32', '2025-12-16 17:53:57'),
(2, NULL, 'Kintamani Plantation', 'admin', 'wayangoura123@gmail.com', '33333333', 5, '0333-03-31', 'Maya ubud', '33', '03:33:00', '444', NULL, 'completed', NULL, '2025-12-16 17:57:48', '2025-12-17 20:52:18'),
(3, NULL, 'Fun Bali Tour', 'Anna', 'anna@gmail.com', '08123456788', 5, '2025-12-22', 'Hotel Kuta', '202', '09:00:00', 'Please prepare guide', NULL, 'completed', NULL, '2025-12-17 19:25:07', '2025-12-29 02:48:34'),
(4, NULL, 'Fun Bali Tour', 'Porshce', 'putuuuuuu@gmail.com', '081236108442', 4, '2026-11-12', 'Maya ubud', '21432', '12:22:00', 'nothing', NULL, 'completed', NULL, '2025-12-17 20:19:16', '2025-12-29 02:48:30'),
(5, NULL, 'Kintamani Plantation', 'Alex Xnader', 'putuuuuuu@gmail.com', '0881037757134', 4, '2039-12-22', 'Vilaa kayon', '2', '00:14:00', 'Nothing', NULL, 'completed', NULL, '2025-12-17 20:39:31', '2025-12-29 02:48:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `duration_hours` int(11) NOT NULL DEFAULT 10,
  `description` text DEFAULT NULL,
  `recommend_passenger` int(11) DEFAULT NULL,
  `max_passenger` int(11) DEFAULT NULL,
  `facilities` text DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cars`
--

INSERT INTO `cars` (`id`, `name`, `image`, `price`, `duration_hours`, `description`, `recommend_passenger`, `max_passenger`, `facilities`, `owner_id`, `created_at`, `updated_at`) VALUES
(5, 'Avanza', 'cars/gfAtxvwWSCNOKSEitXnPgOvp191qJmJ4KakoAmst.jpg', 560000, 10, 'Avanza ini adalah keluaran terbaru, dengan abillity keren dan canggih', 4, 6, 'Arak Bali', NULL, '2025-12-15 05:02:44', '2025-12-15 05:02:44'),
(6, 'Xpander', 'cars/kKF9hwUeqMxeTRJRvECEPBOovs7mkok19tK2RioY.jpg', 780000, 10, 'Xpander ini sangat kencang sekali', 4, 6, 'Bir bintang', NULL, '2025-12-15 05:13:15', '2025-12-15 05:13:15'),
(7, 'Innova Reborn', 'cars/4DuPyp6NUiOCbZ85R9wfDYjV4ZqtpMEmt7XV3kzg.jpg', 800000, 10, 'Innova ni boss senggol dong', 4, 6, 'Aqua gen nah', NULL, '2025-12-15 05:14:08', '2025-12-15 05:14:08'),
(8, 'Porshce 1232', 'cars/JedAE8MQvVJunoHU2SnoNFpKLzlE5wIA6Acf8ew8.jpg', 4000000, 10, 'Ini mobil mahal bos', 2, 2, 'Azul dan captain morgan kondom', NULL, '2025-12-15 05:51:58', '2025-12-17 21:01:05'),
(9, 'ELF 2025', 'cars/29rVpVlRX1Hs5UIvK6auLEznXAmx9gTMJUSWBmSu.jpg', 600000, 10, 'barune', 10, 12, 'okee', NULL, '2025-12-15 06:24:16', '2025-12-17 20:53:37'),
(11, 'Supra MK4', 'cars/QRWNPu3stqP2DInr7i9f0fymOFPQ5AhiGlzUbFBd.jpg', 12322332, 10, 'dfrevr', 2, 3, 'cdcdc', NULL, '2025-12-17 21:03:16', '2025-12-17 21:03:16'),
(12, 'Komang', 'cars/A4qPeeMrSEoUtaJF9MCplZroJJVqNMxFMdI3pAxg.jpg', 32323232, 1, 'eefsgr', 2, 2, 'cgbdbfd', NULL, '2025-12-17 21:04:46', '2025-12-17 21:04:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_12_032317_create_owners_table', 1),
(5, '2025_11_12_032329_create_cars_table', 1),
(6, '2025_12_02_121241_create_personal_access_tokens_table', 2),
(7, '2025_12_15_092955_create_tours_table', 3),
(8, '2025_12_15_093024_create_bookings_table', 3),
(9, '2025_12_15_093031_create_reviews_table', 3),
(10, '2025_12_15_095113_add_is_admin_to_users_table', 3),
(11, '2025_12_15_122732_create_book_cars_table', 4),
(12, '2025_12_15_122820_create_book_tours_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `owners`
--

INSERT INTO `owners` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'Budi Santoso', 'budi@example.com', '0812345678', '2025-11-16 04:54:32', '2025-11-16 04:54:32'),
(3, 'Budi Santoso', 'budi2@gmail.com', '0812345678', '2025-11-16 04:58:20', '2025-11-16 04:58:20'),
(5, 'goura NEW UPDATE', 'goura@example.com', '0812345678', '2025-11-19 22:29:52', '2025-11-19 22:29:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api_token', 'db0b11447c3d56f7531c9fa18e89dcf541fceaf8f894319e08c1e38eb41fd070', '[\"*\"]', NULL, NULL, '2025-12-02 04:33:13', '2025-12-02 04:33:13'),
(3, 'App\\Models\\User', 1, 'api_token', '614d71718e0b4e49aa20191b1ae8d16bff0355af823a2712198b5c31638c2d47', '[\"*\"]', NULL, NULL, '2025-12-02 04:55:14', '2025-12-02 04:55:14'),
(4, 'App\\Models\\User', 1, 'api_token', '2db1583237578965ba6846da216364395850596f6bf487a2a84b15c06d27d643', '[\"*\"]', NULL, NULL, '2025-12-02 04:56:16', '2025-12-02 04:56:16'),
(5, 'App\\Models\\User', 1, 'api_token', '0497416b5afae1c66b97f774ce7b33014217338fc593e96437483c674867bbf7', '[\"*\"]', '2025-12-02 05:08:04', NULL, '2025-12-02 05:07:37', '2025-12-02 05:08:04'),
(12, 'App\\Models\\User', 2, 'api-token', '6807f2bb73cc2d7fb1f4e8e78bf8c5583fe0e32639f4347d23610ac938a70c56', '[\"*\"]', '2025-12-31 01:13:20', NULL, '2025-12-31 00:21:59', '2025-12-31 01:13:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `name`, `rating`, `message`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Wayan', 5, 'Mantap anyinngggg', '2025-12-17 20:19:53', '2025-12-17 20:19:53'),
(2, NULL, 'Wayan', 3, 'Mantap anyinngggg', '2025-12-17 20:20:19', '2025-12-17 20:20:19'),
(3, NULL, 'putu', 3, 'swwwsws', '2025-12-17 20:20:33', '2025-12-17 20:20:33'),
(4, NULL, 'Komang', 5, 'Mantap', '2025-12-17 20:34:14', '2025-12-17 20:34:14'),
(5, NULL, 'Porshce', 5, 'Mantap anyinngggg', '2025-12-18 03:31:04', '2025-12-18 03:31:04'),
(6, NULL, 'Wayan', 4, 'swwwsws', '2025-12-26 21:23:40', '2025-12-26 21:23:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LBgoHn8zs7YrauXRCNxnT8J5vVAuKt1gQQeWd1wt', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1hZeU1ZQ2VYSXY1d0RPdnJWenJsMXRNazFLS3d3N2JqWTlwOEdSSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1767484239);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `desc_1` text DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `desc_2` text DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `desc_3` text DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `desc_4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tours`
--

INSERT INTO `tours` (`id`, `name`, `cover_image`, `price`, `created_at`, `updated_at`, `image_1`, `desc_1`, `image_2`, `desc_2`, `image_3`, `desc_3`, `image_4`, `desc_4`) VALUES
(1, 'Kintamani Plantation', 'tours/18LquoIglZstDID1K0yHXwR4bJ2AGO78oKrDykHj.jpg', 23498000, '2025-12-16 16:12:22', '2025-12-27 18:31:14', 'tours/details/UBfe428C4pz35etvwpPySB0tFEPx4YxodpJjOwbQ.jpg', 'waww bali ini sangat i dah', 'tours/details/PWZuHA73XzQNDoxICPg8tnoYVNMEnt1RNITqcP7E.jpg', 'anjirrrr', 'tours/details/vfxzwXFsU8CeaxxeCPIXPy9FFRUuv5wKP4Lsv3Xl.jpg', 'ahhhhh', 'tours/details/WWOg8RKBE2xD0OaJ3NGDrx4XovO7o0aOhi3IRl8L.jpg', 'dahsyattt'),
(3, 'Bali Full Day Free', 'bali.jpg', 4560000, '2025-12-17 18:36:14', '2025-12-30 17:28:38', 'img1.jpg', 'Visit temple', 'img2.jpg', 'Beach trip', 'img3.jpg', 'Lunch', 'img4.jpg', 'Sunset'),
(4, 'Bali Asri', 'tours/oVKCkhknpqJphkk6wQOAmyhwDSlbTW3DEq2BdOMw.jpg', 4560000, '2025-12-17 21:09:33', '2025-12-27 18:30:55', 'tours/details/2xBajxmohpQiMd29Jbb1jlILNcjobrgDbkEq9xmU.jpg', 'Menurut laman Kemdikbud, teks deskripsi adalah teks yang memberikan gambaran tentang sifat-sifat suatu benda. Dengan kalimat deskriptif, pembaca seolah-olah dapat mendengar, merasakan, dan melihat objek yang digambarkan dalam teks tersebut.', 'tours/details/1wdotcFjMwgdH94BRFpBQEQfwDG5cMxtIiNY6aJp.jpg', 'Dalam teks deskripsi, penulis berusaha agar pembaca \"melihat\" apa yang digambarkan melalui kata-kata, menciptakan pengalaman sensorik dalam pikiran pembaca, seperti melihat, mendengar, mencium, merasakan, dan menyentuh suatu hal.', 'tours/details/lmIBf4j0FcMSfmd4tZR5UulY5GXEx4Ao5YUz2MCk.jpg', 'Dalam teks deskripsi, penulis berusaha agar pembaca \"melihat\" apa yang digambarkan melalui kata-kata, menciptakan pengalaman sensorik dalam pikiran pembaca, seperti melihat, mendengar, mencium, merasakan, dan menyentuh suatu hal.', 'tours/details/b7c9joxldvqPAa0LUhm64ezPEo6U9ZfjfOioD9Vr.jpg', 'Dalam teks deskripsi, penulis berusaha agar pembaca \"melihat\" apa yang digambarkan melalui kata-kata, menciptakan pengalaman sensorik dalam pikiran pembaca, seperti melihat, mendengar, mencium, merasakan, dan menyentuh suatu hal.'),
(5, 'Gianyar', 'tours/6fuZD0HTBVmosfv51gV2e72zzZn8mnwH8q5iuO5s.jpg', 4560000, '2025-12-27 18:27:24', '2025-12-27 18:30:49', 'tours/details/zXQXIIHkgnp7VILKrg3BsINV2bSAS9ceUodMrzbz.jpg', 'kdflllllnwslx nwljqllllllllllllllllllllllllllllllllllllnnnnnnnnnnnnnnnssssssssssd', 'tours/details/j1AdIOSXAASLgSm1ZxNHXbQXkkgVFQCLUvhyMvAr.jpg', 'eeeeeeeeeeeeeeeeeeeeeekkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'tours/details/w8CroNTi9X1SXUwmECkj7LV5Isf3gX0NPQ9l2Fk3.jpg', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'tours/details/RmoAVtv7CDqM4WM5A9s6cWvaoKeGFN9phHHuvKQg.jpg', 'kleeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee'),
(6, 'Bali Full Day Tour', 'bali.jpg', 500000, '2025-12-30 17:27:12', '2025-12-30 17:27:12', 'img1.jpg', 'Beach', 'img2.jpg', 'Temple', 'img3.jpg', 'Rice Field', 'img4.jpg', 'Sunset');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'gourakkk', 'gourakk@gmail.com', NULL, '$2y$12$27gHj3QkUxbfdK3SoNGPm.pOcHicSGwDO3e74kp8wuNTRbaOR67la', NULL, '2025-12-02 04:25:20', '2025-12-02 04:25:20', 0),
(2, 'Super Admin', 'admin@admin.com', NULL, '$2y$12$jY5XHaSBKtOk7EmBqiRcieblYgS/pVWvVqxkmktGaIZmGYYpgSRMi', NULL, '2025-12-15 04:05:30', '2025-12-15 04:05:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book_cars`
--
ALTER TABLE `book_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book_tours`
--
ALTER TABLE `book_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_owner_id_foreign` (`owner_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_email_unique` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `book_cars`
--
ALTER TABLE `book_cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `book_tours`
--
ALTER TABLE `book_tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
