-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 06:32 AM
-- Server version: 8.0.39-0ubuntu0.24.04.2
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitor_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve_bookings`
--

CREATE TABLE `approve_bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approve_bookings`
--

INSERT INTO `approve_bookings` (`id`, `note`, `booking_id`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 5, 1, '2024-11-13 22:13:57', '2024-11-13 22:13:57', NULL),
(2, NULL, 1, 4, 1, '2024-11-13 22:13:57', '2024-11-13 22:13:57', NULL),
(3, NULL, 2, 2, 2, '2024-11-13 22:14:31', '2024-11-13 22:14:31', NULL),
(4, NULL, 2, 3, 0, '2024-11-13 22:14:31', '2024-11-13 22:14:31', NULL),
(5, NULL, 3, 3, 1, '2024-11-13 22:15:14', '2024-11-13 22:15:14', NULL),
(6, NULL, 3, 4, 0, '2024-11-13 22:15:14', '2024-11-13 22:15:14', NULL),
(7, NULL, 4, 2, 1, '2024-11-13 23:21:47', '2024-11-13 23:21:47', NULL),
(8, NULL, 4, 4, 1, '2024-11-13 23:21:47', '2024-11-13 23:21:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `vehicle_id` int NOT NULL,
  `user_id` int NOT NULL,
  `booker_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `date_end` date NOT NULL,
  `vehicle_condition` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `vehicle_id`, `user_id`, `booker_name`, `purpose`, `date`, `date_end`, `vehicle_condition`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Stephen', 'Angkut Barang', '2024-11-01', '2024-11-07', 'Bensin Fuel', 1, '2024-11-13 22:13:57', '2024-11-13 22:13:57', NULL),
(2, 4, 1, 'Jack', 'Meeting Perusahaan A', '2024-11-07', '2024-11-15', 'Clear', 2, '2024-11-13 22:14:31', '2024-11-13 22:14:31', NULL),
(3, 2, 1, 'Malik', 'Angkut Barang Berat', '2024-11-08', '2024-11-11', 'Bensin Clear', 0, '2024-11-13 22:15:14', '2024-11-13 22:15:14', NULL),
(4, 6, 1, 'Stephen', 'Meeting Perusahaan N', '2024-11-16', '2024-11-18', 'Clear', 1, '2024-11-13 23:21:47', '2024-11-13 23:21:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_12_115756_create_vehicles_table', 1),
(6, '2024_11_12_130402_create_bookings_table', 1),
(7, '2024_11_13_011152_create_approve_bookings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@test.co', NULL, 'admin', 1, NULL, '2024-11-13 22:08:55', '2024-11-13 22:08:55', NULL),
(2, 'Supervisor', 'test@test.co', NULL, 'test', 2, NULL, '2024-11-13 22:09:11', '2024-11-13 22:09:27', NULL),
(3, 'Stephen', 'stephen@test.co', NULL, 'stephen', 3, NULL, '2024-11-13 22:11:59', '2024-11-13 22:11:59', NULL),
(4, 'Aria Jinny', 'aria@test.co', NULL, 'aria', 5, NULL, '2024-11-13 22:12:48', '2024-11-13 22:45:40', NULL),
(5, 'Jacob', 'jacob@test.co', NULL, 'jacob', 4, NULL, '2024-11-13 22:13:09', '2024-11-13 22:13:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HINO 45', 'Goods Transport', 'Booking', '2024-11-13 22:10:19', '2024-11-13 22:13:57', NULL),
(2, 'HINO 25', 'Goods Transport', 'Booking', '2024-11-13 22:10:27', '2024-11-13 22:15:14', NULL),
(3, 'HINO 2024', 'Goods Transport', 'Ready', '2024-11-13 22:10:38', '2024-11-13 23:10:58', NULL),
(4, 'Daihatsu', 'Passenger Transport', 'Booking', '2024-11-13 22:10:49', '2024-11-13 22:14:31', NULL),
(5, 'BRIO 2023', 'Passenger Transport', 'Ready', '2024-11-13 22:11:02', '2024-11-13 22:11:02', NULL),
(6, 'Yamaha', 'Passenger Transport', 'Booking', '2024-11-13 22:11:24', '2024-11-13 23:21:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve_bookings`
--
ALTER TABLE `approve_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve_bookings`
--
ALTER TABLE `approve_bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
