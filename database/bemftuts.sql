-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 01:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bemftuts`
--

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_09_135618_create_mahasiswa_table', 1);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_prodi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`) VALUES
(1, 'Teknik Elektro'),
(2, 'Teknik Industri'),
(3, 'Teknik Informatika'),
(4, 'Teknik Metalurgi'),
(5, 'Teknik Mesin'),
(6, 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspirasi` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `nama`, `aspirasi`, `created_at`, `updated_at`) VALUES
(1, 'Lenga Offcial', 'Bagus!', '2019-10-03 20:18:50', '2019-10-03 20:18:50'),
(2, 'Lenga Offcial', 'Bagus!2', '2019-10-03 20:19:22', '2019-10-03 20:19:22'),
(3, 'Trisman Sanjaya', 'Test Kotak Aspirasi', '2019-10-04 09:21:32', '2019-10-04 09:21:32'),
(4, 'Lala', 'Anda', '2019-10-04 09:28:55', '2019-10-04 09:28:55'),
(5, 'Sandy Maulana', 'EEK', '2019-10-04 09:31:32', '2019-10-04 09:31:32'),
(6, 'Sandy Maulana', 'SS', '2019-10-04 09:34:17', '2019-10-04 09:34:17'),
(7, 'Trisman Sanjaya', 'A', '2019-10-04 09:46:31', '2019-10-04 09:46:31'),
(8, 'Andi Maslahah', 'aaa', '2019-10-04 09:52:43', '2019-10-04 09:52:43'),
(9, 'sdfgh', 'sdfgh', '2019-10-04 10:16:49', '2019-10-04 10:16:49'),
(10, 'Yasser', 'lala', '2019-10-04 10:37:50', '2019-10-04 10:37:50'),
(11, 'Trisman Sanjaya', 'asa', '2019-10-13 14:00:50', '2019-10-13 14:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(10) UNSIGNED NOT NULL,
  `bidang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `bidang`) VALUES
(1, 'MEDINFO'),
(8, 'Internal'),
(9, 'BPH'),
(10, 'Relasi'),
(11, 'Sospol'),
(12, 'Ekraf');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `roles` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `bidang_id` int(10) UNSIGNED DEFAULT NULL,
  `prodi_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `bidang_id`, `prodi_id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `nim`, `angkatan`, `no_telp`, `alamat`, `avatar`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 'Sandy Maulana', 'sandy@google.co.lc', NULL, '$2y$12$KE0r1UOshvtC5OPQEf8S8.S6uuIyLYDZdon7KbIrsOo7adLb3uZLW', '17.01.071.106', '2017', '082260879023', 'Bukit Cimanggu City Blok S11 No.4', NULL, 'User - MEDINFO', NULL, '2019-09-17 13:51:49', '2019-09-22 01:38:58'),
(7, 1, 3, 2, 'Fadel Muhammad Rizky', 'fm936080@gmail.com', NULL, '$2y$10$MF591Gucr9gpwhamNOYG5eRzkououitvWzBwFZ8MZYeZ0MEaj0FyO', '17.01.071.030', '2017', '081322119636', 'Jalan lintas kebayan', NULL, NULL, NULL, '2019-09-19 04:14:59', '2019-09-20 09:38:03'),
(8, 1, 3, 3, 'Sukma Asyfinawati', 'sukmaasyfina@gmail.com', NULL, '$2y$10$PpC4AefOmXlksJH/DzGgu.eMGnvP1RW6Gu3ajb3kHVl0KbMJaGhaa', '17.01.071.113', '2017', '085359425620', 'Samapuin', NULL, NULL, NULL, '2019-09-19 04:51:18', '2019-09-19 04:51:18'),
(9, 1, 6, 3, 'Ghibra Maulana Umaro', 'ghibramaulana@gmail.com', NULL, '$2y$10$pHWZROHmQH06sG4Yuen1.eP8gKPYa7RyeVYVi5ESOLADR.hz/pA9q', '18.01.016.014', '2018', '082339168952', 'Jalan Ki Hajar Dewantara No. 112 Rt 02 Rw 03 Kel. Pekat', NULL, NULL, NULL, '2019-09-19 04:56:17', '2019-09-19 04:56:17'),
(10, 1, 3, 2, 'AZZAHRAH MAULYA SAFIRA', 'azzahra.maulya@gmail.com', NULL, '$2y$12$YoHQkmTuhtKZ.KCox9i.x./0U/GmcEo3nDoIxdY/FH9fs8ofNxaoy', '17.01.071.016', '2017', '082386383900', 'Desa Pungka', NULL, 'Sandy Maulana - MEDINFO', NULL, '2019-09-19 05:16:19', '2019-09-22 18:29:40'),
(11, 9, 4, 2, 'Muhammad Farhan Fakhrudin', 'muhammadfarhanfakhrudin@gmail.com', NULL, '$2y$12$HN9DHPNplwrm0r34rdcugetq882xxUtM6BA2bBclxxOHemjyPHz0.', '16.01.011.017', '2016', '085320224447', 'Brang Biji, NTB', NULL, 'Sandy Maulana - MEDINFO', NULL, '2019-09-19 06:11:23', '2019-10-03 20:20:32'),
(12, 11, 1, 2, 'Lenga Offcial', 'muhammadrusdizulkaidi@gmail.com', NULL, '$2y$12$1R8Nyn9WVMXpyzZ/EWrlCO/ThCYpbT/jITEqfFgQRnoMy0J4.RBc.', '11.11.111.111', '1111', '082237080478', 'NTB', NULL, 'Sandy Maulana - MEDINFO', NULL, '2019-10-15 01:15:50', '2019-10-15 01:15:50');

--
-- Indexes for dumped tables
--
-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodi_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` tinyint(4) NOT NULL,
  `edit_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `prodi_id`, `nama`, `nim`, `no_telp`, `angkatan`, `email`, `alamat`, `telegram`, `edit_by`, `created_at`, `updated_at`) VALUES
(5, 3, 'Sandy Maulana', '17.01.071.106', '082260879023', '2017', 'sandy@google.co.lc', 'Brang Biji, NTB', 0, 11, '2019-09-20 17:11:47', '2019-09-22 00:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bidang_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `gambar`, `user_id`, `bidang_id`, `created_at`, `updated_at`) VALUES
(1, 'Post 1 BPH', 'Post 1 BPH', '1570847582_5da13b5e07c67_IMG_9881.JPG', 1, 9, '2019-10-12 02:33:04', '2019-10-12 02:33:04'),
(2, 'Post 1 Internal', 'Post 1 Internal', '1570847618_5da13b8228ecf_IMG_9763.JPG', 1, 8, '2019-10-12 02:33:40', '2019-10-12 02:33:40'),
(3, 'Post 1 Relasi', 'Post 1 Relasi', '1570974013_5da3293d78246_IMG_0053.JPG', 1, 10, '2019-10-13 13:40:16', '2019-10-13 13:40:16'),
(4, 'Post 1 Sospol', 'Post 1 Sospol Edited', '1570974240_5da32a2068ee2_IMG_0057.JPG', 12, 11, '2019-10-13 13:44:03', '2019-10-15 01:16:36'),
(5, 'Post 1 Medinfo', 'Post 1 Medinfo', '1570974262_5da32a360a73f_IMG_9856.JPG', 1, 1, '2019-10-13 13:44:25', '2019-10-13 13:44:25'),
(6, 'Post 1 Ekraf', 'Post 1 Ekraf', '1570975093_5da32d75b7808_IMG_9886.JPG', 1, 12, '2019-10-13 13:58:15', '2019-10-13 13:58:15'),
(7, 'Post 2 BPH', 'Post 2 BPH', '1570975114_5da32d8acf85a_IMG_9834.JPG', 1, 9, '2019-10-13 13:58:36', '2019-10-13 13:58:36'),
(8, 'Post 2 Internal', 'Post 2 Internal', '1570975132_5da32d9ce96dd_IMG_9799.JPG', 1, 8, '2019-10-13 13:58:55', '2019-10-13 13:58:55'),
(9, 'Post 2 Relasi', 'Post 2 Relasi', '1570975157_5da32db5e533e_IMG_9974.JPG', 1, 10, '2019-10-13 13:59:19', '2019-10-13 13:59:19'),
(10, 'Post 2 Sospol', 'Post 2 Sospol', '1570975179_5da32dcb97ab3_IMG_9988.JPG', 1, 11, '2019-10-13 13:59:42', '2019-10-13 13:59:42'),
(11, 'Post 2 Medinfo', 'Post 2 Medinfo', '1570975201_5da32de1a3124_IMG_9815.JPG', 1, 1, '2019-10-13 14:00:04', '2019-10-13 14:00:04'),
(12, 'Post 2 Ekraf', 'Post 2 Ekraf', '1570975223_5da32df7d89e5_IMG_0060.JPG', 1, 12, '2019-10-13 14:00:25', '2019-10-13 14:00:25');

-- --------------------------------------------------------

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);
-- --------------------------------------------------------

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD KEY `users_bidang_id_foreign` (`bidang_id`),
  ADD KEY `users_prodi_id_foreign` (`prodi_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD KEY `mahasiswa_prodi_id_foreign` (`prodi_id`),
  ADD KEY `mahasiswa_edit_by_foreign` (`edit_by`);


--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_bidang_id_foreign` (`bidang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_edit_by_foreign` FOREIGN KEY (`edit_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
