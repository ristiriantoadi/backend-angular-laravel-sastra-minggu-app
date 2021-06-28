-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2021 at 09:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angular_laravel_sastra_minggu_backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `entris`
--

CREATE TABLE `entris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_karya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_karya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_muat` date NOT NULL,
  `user_id_pengarang` bigint(20) UNSIGNED NOT NULL,
  `user_id_pembuat_entri` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bukti_pemuatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entris`
--

INSERT INTO `entris` (`id`, `nama_pengarang`, `judul_karya`, `jenis_karya`, `media`, `tanggal_muat`, `user_id_pengarang`, `user_id_pembuat_entri`, `created_at`, `updated_at`, `bukti_pemuatan`) VALUES
(1, 'Ristirianto Adi', 'Tidak Ada Pesan Moral', 'cerpen', 'Horison', '2021-01-11', 2, 1, '2021-01-26 18:23:12', '2021-01-26 18:23:12', 'img-faktapohon-0.jpeg'),
(2, 'Anggoro P Poer', 'Ada Apa dengan Cinta', 'esai', 'Tempo', '2021-01-27', 3, 1, '2021-01-26 18:24:10', '2021-01-26 18:24:10', 'arti-penting-pohon-bagi-kehidupan-89.png'),
(3, 'Jihan Salsabila', 'Ananta Kembali', 'cerpen', 'Basabasi', '2021-01-24', 0, 1, '2021-01-26 18:24:55', '2021-01-26 18:24:55', 'pic01.jpg'),
(7, 'Ristirianto Adi', 'abcde', 'puisi', 'aaa', '2021-01-27', 2, 1, '2021-01-26 22:51:29', '2021-01-26 22:51:29', '074701500_1516342754-szxdhsrszs.jpeg'),
(8, 'Ristirianto Adi', 'aaasas', 'cerpen', 'sdsd', '2021-01-13', 2, 1, '2021-01-27 01:04:40', '2021-01-27 01:04:41', 'trees-helping-trees-2-3f1cd43353e39f762fe883f76e8cd20a_600x400.jpeg'),
(9, 'Ristirianto Adi', 'asasals', 'cerpen', 'aslaksak', '2021-01-20', 2, 3, '2021-01-27 01:25:27', '2021-01-27 01:25:28', 'img-faktapohon-0.jpeg'),
(10, 'Ristirianto Adi', 'sdsdjsk', 'cerpen', 'sdsd', '2021-01-25', 2, 3, '2021-01-27 01:25:55', '2021-01-27 01:25:55', '074701500_1516342754-szxdhsrszs.jpeg'),
(11, 'Anggoro P Poer', 'asas', 'puisi', 'adad', '2021-01-20', 3, 3, '2021-01-27 01:27:39', '2021-01-27 01:27:39', '074701500_1516342754-szxdhsrszs.jpeg'),
(12, 'Hana Afifah', 'Bunga Mawar di Makam Bunda', 'puisi', 'Media Indonesia', '2021-01-27', 0, 1, '2021-01-27 01:43:16', '2021-01-27 01:43:17', '074701500_1516342754-szxdhsrszs.jpeg'),
(13, 'Anggoro P Poer', 'Orang-orang Bloomington', 'cerpen', 'Basabasi', '2021-01-20', 3, 2, '2021-01-27 01:45:16', '2021-01-27 01:45:17', 'img-faktapohon-0.jpeg'),
(14, 'Anggoro P Poer', 'Sintawati', 'puisi', 'Media Indonesia', '2021-01-31', 3, 1, '2021-01-27 01:46:12', '2021-01-27 01:46:12', '4156837544.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(5, '2021_01_23_070429_create_entris_table', 3),
(6, '2021_01_25_001134_drop_foreign_key_user_id_pengarang_on_entris', 4),
(7, '2021_01_25_022112_add_bukti_pemuatan_to_entris_table', 4),
(8, '2021_01_27_062354_create_notifications_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('212656d3-a1ca-438a-b44a-6762f9417cc3', 'App\\Notifications\\KaryaDimuat', 'App\\Models\\User', 3, '{\"entri_id\":11}', '2021-01-27 01:30:39', '2021-01-27 01:27:40', '2021-01-27 01:30:39'),
('557e2073-fef2-4c55-9839-32d12ff62019', 'App\\Notifications\\KaryaDimuat', 'App\\Models\\User', 3, '{\"entri_id\":13}', '2021-01-27 01:46:24', '2021-01-27 01:45:17', '2021-01-27 01:46:24'),
('9a34e939-7ba6-442e-8bf4-9fe13d8535e3', 'App\\Notifications\\KaryaDimuat', 'App\\Models\\User', 2, '{\"entri_id\":10}', '2021-01-27 01:30:16', '2021-01-27 01:25:55', '2021-01-27 01:30:16'),
('aa065bee-4142-4069-a07e-a7b67b5af980', 'App\\Notifications\\KaryaDimuat', 'App\\Models\\User', 2, '{\"entri_id\":9}', '2021-01-27 01:30:16', '2021-01-27 01:25:28', '2021-01-27 01:30:16'),
('cc3e8296-300d-447f-9a4c-47f73bdc27af', 'App\\Notifications\\KaryaDimuat', 'App\\Models\\User', 2, '{\"entri_id\":8}', '2021-01-27 01:15:51', '2021-01-27 01:04:41', '2021-01-27 01:15:51'),
('cce7c4ac-460a-4a47-b320-2ab501553311', 'App\\Notifications\\KaryaDimuat', 'App\\Models\\User', 3, '{\"entri_id\":14}', '2021-01-27 01:46:23', '2021-01-27 01:46:13', '2021-01-27 01:46:23');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$H/J.KVc6fxsdKjsYi/2EGeq3mUUOal04O4xbdMlePjRWnAaSFnnRe', 'CiXVm53CjDrQdi7HPYth3bnaBXX0EJLyqTRXzKUSYE297IGYaJQDFl6EFHzx', '2021-01-20 18:02:41', '2021-01-20 18:02:41'),
(2, 'Ristirianto Adi', 'adi', 'user', '$2y$10$Ai03EjaPF4dtyw9a90YuAu/rNL7aPYgHQ1Ng1Sn6G44yN5tC3d8oi', 'YW8HVk9VuGFxsZIgNCAqbv3m2n9jcExjwLoeTE4Qjdxe6a2dWJBMTbAoc39E', '2021-01-21 00:21:40', '2021-01-21 00:21:40'),
(3, 'Anggoro P Poer', 'anggoro', 'user', '$2y$10$zme91hyThGAfB1GeFHmPqOpBp/hly485pFwYBfLRMwAfVLPY26DWy', 'cumlKK22rltQcYUQjDSBX9Bkse9gXzQ81ukAYiHUcBfVuO0qrdXXHxklng2e', '2021-01-21 00:30:24', '2021-01-21 00:30:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entris`
--
ALTER TABLE `entris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entris_user_id_pengarang_foreign` (`user_id_pengarang`),
  ADD KEY `entris_user_id_pembuat_entri_foreign` (`user_id_pembuat_entri`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entris`
--
ALTER TABLE `entris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entris`
--
ALTER TABLE `entris`
  ADD CONSTRAINT `entris_user_id_pembuat_entri_foreign` FOREIGN KEY (`user_id_pembuat_entri`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
