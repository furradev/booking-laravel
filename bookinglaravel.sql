-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 03:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookinglaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `start_booking` time NOT NULL,
  `end_booking` time NOT NULL,
  `jenis_lapangan` varchar(20) NOT NULL,
  `price` int(100) NOT NULL,
  `status` enum('pending','unverified','verified','rejected','finished') NOT NULL DEFAULT 'pending',
  `image` varchar(200) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `nama_pemesan`, `nohp`, `alamat`, `start_booking`, `end_booking`, `jenis_lapangan`, `price`, `status`, `image`, `user_id`) VALUES
(64, 'asd', '1234', 'adsad', '12:00:00', '13:00:00', 'Lapangan 1', 35000, 'verified', 'bukti-pembayaran/Rux0yXyWBf3N6wfXJsrXm6ST3y4rX1MXs10eS9wG.png', 1),
(66, 'rsas', '3232132', 'fwdfdwwfa', '10:00:00', '11:59:00', 'Lapangan 1', 69416, 'verified', 'bukti-pembayaran/RbbWzzxmSfudA3wiJ8JnD1xwe2cQ1GCAB1Nm0DzC.png', 1),
(71, 'wsddwaw', '12124421', 'adwadwadw', '00:00:00', '00:00:00', 'Lapangan 1', 35000, 'finished', NULL, 1),
(73, 'adwsw', '12142', 'adsadws', '07:00:00', '07:59:00', 'Lapangan 1', 34416, 'finished', 'bukti-pembayaran/bEHszGCtRGpy71NhsGSeBkcOq38hoSXV1KVGVWPH.png', 1),
(74, 'asd', '1224', 'adad', '00:00:00', '00:00:00', 'Lapangan 1', 35000, 'rejected', 'bukti-pembayaran/ezn0kCDo1hRJQwMjfFDjFnp4nhmmF9jRmths7uS5.png', 1),
(75, 'adsa', '241412', 'dadada', '07:00:00', '08:00:00', 'Lapangan 2', 35000, 'unverified', 'bukti-pembayaran/509mlIZTtlY6RAr7kIqi7UDNGQbdkYvKjI0HX2AV.jpg', 1),
(76, 'hohojie', '124', 'adw', '09:00:00', '10:00:00', 'Lapangan 2', 35000, 'unverified', 'bukti-pembayaran/roGvKQFz7sEO4xgkBmPfbOxCdb9Bi7cimc9Ha6dR.png', 1),
(77, 'raul adlan', '21442', 'adadawd', '19:00:00', '21:00:00', 'Lapangan 2', 70000, 'pending', NULL, 1),
(78, 'Rehan Wangsaf', '082338392', 'Jl. Rindang', '11:00:00', '12:00:00', 'Lapangan 2', 35000, 'unverified', 'bukti-pembayaran/VobO4Hh7JbmgTG7VAewRlEj0qU96kQA9QRUk4s8U.png', 3),
(79, 'Rehan Wangsaf', '0829482933', 'Jl. Rindang', '13:00:00', '14:00:00', 'Lapangan 2', 35000, 'unverified', 'bukti-pembayaran/2vOwJBy8Zf200a2AcqjkC9MuTIzdAPIAdpk9eC6s.png', 3),
(80, 'Rehan Wangsaf', '082738924', 'Jl. Rindang', '00:00:00', '00:00:00', 'Lapangan 2', 35000, 'rejected', 'bukti-pembayaran/Di2HxpNJrMsuKkyg5qmO614bIEjMf2GMLxrMUhjh.png', 3),
(81, 'Rehan Wangsaf', '082387442', 'Jl. Rindang', '17:00:00', '18:00:00', 'Lapangan 2', 35000, 'verified', 'bukti-pembayaran/Ve2MRdzQ9avsObYFU7u2anFO6VNCxd1nVKUBKMqF.png', 3),
(82, 'Rehan Wangsaf', '082837482', 'Jl. Rindang', '15:00:00', '17:00:00', 'Lapangan 1', 70000, 'finished', 'bukti-pembayaran/N1t1fYxpxtiFebopYSLYuUpAMAb2S6CGDGLXCLcA.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('fakih@gmail.com', '$2y$12$YChc.P4sNhm.eIf8RmwhcuqRJSDuMBqAYdGPzxEVUOScW2dsXq43C', '2024-01-26 03:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akulah Sang Admin 😈', 'fakih@gmail.com', NULL, '$2y$12$d.9l6tIK2bjyfOC.LljIrOKP8FnJWnD1xcinqaXacIigX5JBv4Rz6', 'admin', 'EMSa7o1cELFK4206byxoBEQkw7VOWn6tT8Rnxjh67B6FPMnhMLsjc5stFor8', '2023-12-22 20:23:53', '2024-01-17 06:39:26'),
(2, 'Riski Dewa Laravel 🤑', 'riski@gmail.com', NULL, '$2y$12$7tD8L7ajnJ/slCBUVvslYOkuKns/OWFM7.SsY5uHCxLrAqWykePA2', 'customer', 'TxZzshglSZOWUKV90CwyrQpSPQgpaQJNxiMdvBC09gtRCVzR3EFe6FtvoFIc', '2023-12-22 20:59:19', '2024-01-02 21:59:52'),
(3, 'Rehan Wangsaf', 'rehan@gmail.com', NULL, '$2y$12$fWiR0iJc2wF/rgQyATO0QOBYNQMl1cAFlMmLyrT6k.OwS3/U1smKK', 'customer', '3cHFbMgd75dfTOvS9tb7jTtSE8CrVZH5LluHANQH0zWao8Y2nLYGiAozgket', '2024-01-04 02:00:22', '2024-01-17 06:29:30'),
(4, 'Zikri Tamvan', 'zikri@gmail.com', NULL, '$2y$12$Ld.iqEZBv7KHfvHyynIV9.th80yteWyhwqaM.jHs/09qb4743N6G2', 'customer', NULL, '2024-01-12 00:01:19', '2024-01-12 00:01:19');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
