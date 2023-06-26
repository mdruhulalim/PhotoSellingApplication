-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 01:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_photosellingapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ruhul', '$2y$10$6X9ARC.Fd.prgG11p9GxFuKj1FLXa6akOlkqYGjJ7nB8zPKjPkHwu', 'mdruhulalim8@gmail.com', '2023-06-19 01:10:11', '2023-06-19 01:10:11'),
(2, 'ratul', '$2y$10$bLg2ssNOYrq50KNFKfx2z.uUA2nrsAyvHLK.rl0x0iqVj5SZouoLy', 'ratul@gmail.com', '2023-06-20 00:57:07', '2023-06-20 00:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `cashouts`
--

CREATE TABLE `cashouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `financial_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashouts`
--

INSERT INTO `cashouts` (`id`, `user_id`, `financial_id`, `status`, `created_at`, `updated_at`, `amount`) VALUES
(1, 3, 3, 'pending', '2023-06-22 07:31:21', '2023-06-22 07:31:21', 60),
(2, 3, 3, 'pending', '2023-06-22 07:36:23', '2023-06-22 07:36:23', 20),
(3, 1, 1, 'declined', '2023-06-23 02:49:59', '2023-06-24 04:09:42', 15),
(4, 1, 1, 'pending', '2023-06-23 05:03:32', '2023-06-23 05:03:32', 55),
(5, 2, 2, 'approved', '2023-06-24 01:39:37', '2023-06-24 03:53:23', 500);

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
-- Table structure for table `financials`
--

CREATE TABLE `financials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blance` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financials`
--

INSERT INTO `financials` (`id`, `user_id`, `blance`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2023-06-18 07:20:06', '2023-06-23 05:03:32'),
(2, 2, 0, '2023-06-20 01:39:38', '2023-06-24 01:39:37'),
(3, 3, 0, '2023-06-20 06:26:08', '2023-06-22 07:36:23');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_06_17_141326_create_admins_table', 1),
(14, '2023_06_18_091247_create_photos_table', 1),
(15, '2023_06_18_091314_create_financials_table', 1),
(16, '2023_06_18_091330_create_cashouts_table', 1),
(17, '2023_06_22_131905_alter_cashout_table_add_amount_col', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `approve_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `boyout_by` bigint(20) UNSIGNED DEFAULT NULL,
  `buyout_date` date DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `status` enum('pending','approved','declined','selling','buy_out','approve_unsellable') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `name`, `details`, `image`, `approve_by`, `approve_date`, `boyout_by`, `buyout_date`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Carter Bates', 'Repudiandae voluptat', '64903581581578749f5bad0754ddc52e5945049175078943a69ad.png', 1, '2023-06-21', 1, '2023-06-23', 5, 'buy_out', '2023-06-19 05:01:21', '2023-06-23 02:52:52'),
(2, 1, 'Melodie Morales', 'Suscipit dolor volup', '649035c0d37d88d1218244d96823a1ecdf1b383e010d29b57a3cc.png', NULL, NULL, NULL, NULL, NULL, 'declined', '2023-06-19 05:02:24', '2023-06-21 01:18:12'),
(3, 2, 'Ifeoma Jacobs', 'Autem necessitatibus', '649157dac9f0eacfdd18ea7f4a2ba74132ba977dc207204142994.jpg', 1, '2023-06-21', 1, '2023-06-24', 500, 'buy_out', '2023-06-20 01:40:10', '2023-06-24 01:39:25'),
(4, 3, 'Willow Webster', 'Vel consequuntur min', '64919b07107789f682df245668969bbcd5395bdc2882591eeecde.png', 1, '2023-06-21', 1, '2023-06-22', 10, 'buy_out', '2023-06-20 06:26:47', '2023-06-22 03:00:48'),
(5, 1, 'Taylor Maldonado', 'Odit sunt ipsum qui', '6492a6cc5aab69deb867b96b097fccf9bd932719fe347c49a2a7b.jpg', 1, '2023-06-21', 1, '2023-06-23', 15, 'buy_out', '2023-06-21 01:29:16', '2023-06-23 02:49:44'),
(6, 1, 'Hashim Keith', 'Voluptas et doloremq', '6492e431274b60b93caee71a9d214d0bbbc5622ea29507e3b8a7a.png', 1, '2023-06-21', 1, '2023-06-23', 50, 'buy_out', '2023-06-21 05:51:13', '2023-06-23 02:53:48'),
(7, 3, 'Chaney Barnett', 'Doloribus dignissimo', '6492e68f160ea0159a99ed28b0581890608d24ada9decc4874197.jpg', 1, '2023-06-22', 1, '2023-06-22', 50, 'buy_out', '2023-06-21 06:01:19', '2023-06-22 03:14:10'),
(8, 3, 'Velma Spencer', 'Laudantium soluta i', '64944e0503c2f581a8ed69cf5d505b989c438becd65e37c8de61e.jpg', 1, '2023-06-22', 1, '2023-06-22', 20, 'buy_out', '2023-06-22 07:35:01', '2023-06-22 07:35:27'),
(9, 3, 'Melyssa Emerson', 'Dolor eveniet eiusm', '64952465576ce99316daea530a41f7e3cddaea0561a59d2dc23f0.png', 1, '2023-06-23', NULL, NULL, NULL, 'selling', '2023-06-22 22:49:41', '2023-06-25 00:31:55'),
(10, 2, 'Nyssa Tran', 'Aliqua Veritatis ma', '6496b727a1dfe38afd2ec2f9db9276c61839b6a900df67a7c9544.jpg', NULL, NULL, NULL, NULL, NULL, 'pending', '2023-06-24 03:28:07', '2023-06-24 03:28:07'),
(11, 1, 'Mia Robertson', 'Cum laboris a sunt p', '6497deb0525d1ac2646028f5b8b9bbf7a967f4ac71b8866135211.jpg', 1, '2023-06-25', NULL, NULL, NULL, 'approved', '2023-06-25 00:29:04', '2023-06-25 00:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ronny', 'ruhul', '$2y$10$XwNh/uhrx9abKLVlELozCekYYLXooyiCH30OMeaQ0xjR4V173p5Ci', 'ruhulronny8@gmail.com', NULL, '2023-06-18 07:20:04', '2023-06-18 07:20:04'),
(2, 'ratul', 'ratul', '$2y$10$ZDWlIlaEuXHtj2Ldn2Ljc.YwpvphUQ4aFKH1frOZV2sosiDZPLfpe', 'ratul@gmail.com', NULL, '2023-06-20 01:39:37', '2023-06-20 01:39:37'),
(3, 'onu', 'onu', '$2y$10$xfKyu.WJZxJF9ZzM7JhJo.GT1OJyBbes7MbEJePyHjotVqbpSxCoW', 'onu@gmail.com', NULL, '2023-06-20 06:26:08', '2023-06-20 06:26:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashouts`
--
ALTER TABLE `cashouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cashouts_user_id_foreign` (`user_id`),
  ADD KEY `cashouts_financial_id_foreign` (`financial_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `financials`
--
ALTER TABLE `financials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financials_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_user_id_foreign` (`user_id`),
  ADD KEY `photos_approve_by_foreign` (`approve_by`),
  ADD KEY `photos_boyout_by_foreign` (`boyout_by`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashouts`
--
ALTER TABLE `cashouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financials`
--
ALTER TABLE `financials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashouts`
--
ALTER TABLE `cashouts`
  ADD CONSTRAINT `cashouts_financial_id_foreign` FOREIGN KEY (`financial_id`) REFERENCES `financials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cashouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `financials`
--
ALTER TABLE `financials`
  ADD CONSTRAINT `financials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_approve_by_foreign` FOREIGN KEY (`approve_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photos_boyout_by_foreign` FOREIGN KEY (`boyout_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
