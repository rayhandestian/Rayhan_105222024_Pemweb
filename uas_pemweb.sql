-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 13 Jan 2025 pada 03.52
-- Versi server: 8.3.0
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_09_084843_create_events_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User 105221010', '105221010', '105221010@example.com', '$2y$12$ejx3w4GCJyHuTbKdbuy0dOzqPFNm5NoTWJnfheHiHl3dVmE8W/x9e', NULL, '2025-01-08 20:05:14', '2025-01-08 20:05:14'),
(2, 'User 105221011', '105221011', '105221011@example.com', '$2y$12$ScHHhMZ0DT/UumZh2mElU.JYALsHf7SoKMGHzfgL/OFQRt8kpsdf6', NULL, '2025-01-08 20:05:14', '2025-01-08 20:05:14'),
(3, 'User 105221012', '105221012', '105221012@example.com', '$2y$12$1i0wrGBnoYPSNuPc9oMn/esA9PG.3IWoEkSfpQrakj13eeF.hKePW', NULL, '2025-01-08 20:05:15', '2025-01-08 20:05:15'),
(4, 'User 105221013', '105221013', '105221013@example.com', '$2y$12$pOMULtCdnw5zd0cjL1rs6OzOulqt9ONnyRrGtSiPrZDgfyZf.SxY2', NULL, '2025-01-08 20:05:15', '2025-01-08 20:05:15'),
(5, 'User 105221014', '105221014', '105221014@example.com', '$2y$12$2xVGY9YJftQCMp9Kb2iGde0o7iCGsM2mQg3hbY0fVS5LUnMFLU8xS', NULL, '2025-01-08 20:05:15', '2025-01-08 20:05:15'),
(6, 'User 105221015', '105221015', '105221015@example.com', '$2y$12$o7WmuDUSzyxZYKOsUUa17.v04G6YvuvymtGH7NLjbD0rboSSaZGG.', NULL, '2025-01-08 20:05:16', '2025-01-08 20:05:16'),
(7, 'User 105221016', '105221016', '105221016@example.com', '$2y$12$HDOoJIaYxm0.cBDQbgQJLOLdW0Rm8gSbG6PBk2WWcgYjPReBtgEzC', NULL, '2025-01-08 20:05:16', '2025-01-08 20:05:16'),
(8, 'User 105221017', '105221017', '105221017@example.com', '$2y$12$kvYEKHSPpT2kjruif8OVs.H9myj8oL7m5fgaONr8vCjm0i7dbILIa', NULL, '2025-01-08 20:05:17', '2025-01-08 20:05:17'),
(9, 'User 105221018', '105221018', '105221018@example.com', '$2y$12$JCtYiQuGdB6D7Ot/kgazceTMQ1mI95VrGt5KhM8MCQQnGcwiXFpYS', NULL, '2025-01-08 20:05:17', '2025-01-08 20:05:17'),
(10, 'User 105221019', '105221019', '105221019@example.com', '$2y$12$wxZpmmag9Y.td996L0d3qeeQZeL9TDuId3j44U1M8y8wK3lHuq/dO', NULL, '2025-01-08 20:05:17', '2025-01-08 20:05:17'),
(11, 'User 105221020', '105221020', '105221020@example.com', '$2y$12$rcCq1Vkm7BCdCdhLiMTw3Ods2zQTPUxeXIugjoP3N2vZe4dzU7KRa', NULL, '2025-01-08 20:05:18', '2025-01-08 20:05:18'),
(12, 'User 105221021', '105221021', '105221021@example.com', '$2y$12$.3mU02afeMmVDdhcJTafvuZS2AGhNWuxs0ZZC/1xHMoT7q/nfsX1S', NULL, '2025-01-08 20:05:19', '2025-01-08 20:05:19'),
(13, 'User 105221022', '105221022', '105221022@example.com', '$2y$12$qVOJjw5S/dwjfoo.yM7V.OfTEc0ZsURAKlHQePcPD61p2MFx2Hk7y', NULL, '2025-01-08 20:05:19', '2025-01-08 20:05:19'),
(14, 'User 105221023', '105221023', '105221023@example.com', '$2y$12$lYU6llEHdUq1pBs4299oheJbOAHSnJukzaj6uI5TS9SfXo1H5BmV2', NULL, '2025-01-08 20:05:20', '2025-01-08 20:05:20'),
(15, 'User 105221024', '105221024', '105221024@example.com', '$2y$12$DukciYHQPh1a800hVQoo/eNka/GtNzX0X88XWGl8.3ScZ5.v4wt1S', NULL, '2025-01-08 20:05:20', '2025-01-08 20:05:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
