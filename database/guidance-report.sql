-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 08:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guidance-report`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 'Online PQ', 2, NULL, NULL),
(2, 'Fallout', 2, NULL, NULL),
(3, 'Others', 2, NULL, NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_18_165640_create_stats_table', 1),
(6, '2022_02_18_165704_create_teams_table', 1),
(7, '2022_02_18_172048_create_categories_table', 1),
(8, '2022_03_08_164032_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 9),
(5, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 11),
(5, 'App\\Models\\User', 12),
(5, 'App\\Models\\User', 13),
(5, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 15),
(5, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 17),
(5, 'App\\Models\\User', 18),
(5, 'App\\Models\\User', 19),
(5, 'App\\Models\\User', 20),
(5, 'App\\Models\\User', 21);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', NULL, NULL),
(3, 'Manager', 'web', NULL, NULL),
(4, 'Team Lead', 'web', NULL, NULL),
(5, 'Associate', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `transfer_per_day` int(11) DEFAULT NULL,
  `call_per_day` int(11) DEFAULT NULL,
  `rea_sign_up` int(11) DEFAULT NULL,
  `tbd_assigned` int(11) DEFAULT NULL,
  `no_of_matches` int(11) DEFAULT NULL,
  `leads` int(11) DEFAULT NULL,
  `conversations` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `user_id`, `categories_id`, `transfer_per_day`, `call_per_day`, `rea_sign_up`, `tbd_assigned`, `no_of_matches`, `leads`, `conversations`, `created_at`, `updated_at`) VALUES
(3, 21, NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, '2022-03-15 05:00:00', '2022-03-15 05:00:00'),
(4, 21, NULL, NULL, NULL, 55, NULL, NULL, NULL, NULL, '2022-03-16 05:00:00', NULL),
(5, 21, NULL, NULL, NULL, 99, NULL, NULL, NULL, NULL, '2022-03-17 05:00:00', NULL),
(7, 21, NULL, NULL, NULL, 55, NULL, NULL, NULL, NULL, '2022-04-01 05:00:00', NULL),
(8, 21, NULL, NULL, NULL, 98, NULL, NULL, NULL, NULL, '2022-04-02 05:00:00', NULL),
(9, 21, NULL, NULL, NULL, 66, NULL, NULL, NULL, NULL, '2022-04-03 05:00:00', NULL),
(10, 21, NULL, NULL, NULL, 57, NULL, NULL, NULL, NULL, '2022-05-04 05:00:00', NULL),
(11, 21, NULL, NULL, NULL, 78, NULL, NULL, NULL, NULL, '2022-05-05 05:00:00', NULL),
(12, 21, NULL, NULL, NULL, 120, NULL, NULL, NULL, NULL, '2022-05-06 05:00:00', NULL),
(13, 21, NULL, NULL, NULL, 88, NULL, NULL, NULL, NULL, '2022-05-07 05:00:00', '0000-00-00 00:00:00'),
(14, 14, NULL, NULL, NULL, NULL, 11, 22, NULL, NULL, '2022-03-16 14:07:48', NULL),
(15, 14, NULL, NULL, NULL, NULL, 33, 44, NULL, NULL, '2022-03-17 14:07:48', NULL),
(16, 14, NULL, NULL, NULL, NULL, 22, 11, NULL, NULL, '2022-03-18 14:07:48', NULL),
(17, 13, NULL, NULL, NULL, NULL, 33, 44, NULL, NULL, '2022-03-19 14:07:48', NULL),
(18, 13, NULL, NULL, NULL, NULL, 55, 66, NULL, NULL, '2022-03-20 14:07:48', NULL),
(19, 6, 1, 11, 22, NULL, NULL, NULL, NULL, NULL, '2022-03-16 15:50:41', NULL),
(20, 6, 1, 22, 33, NULL, NULL, NULL, NULL, NULL, '2022-03-17 15:50:41', NULL),
(21, 6, 2, 99, 77, NULL, NULL, NULL, NULL, NULL, '2022-03-18 15:53:16', NULL),
(22, 6, 2, 55, 66, NULL, NULL, NULL, NULL, NULL, '2022-03-19 15:53:41', NULL),
(23, 6, 3, 79, 46, NULL, NULL, NULL, NULL, NULL, '2022-03-20 15:53:59', NULL),
(24, 6, 3, 33, 12, NULL, NULL, NULL, NULL, NULL, '2022-03-21 15:54:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Team One', NULL, NULL),
(2, 'Team Two', NULL, NULL),
(3, 'Team Three', NULL, NULL),
(4, 'Team Chat', NULL, NULL),
(5, 'Team Inbound', NULL, NULL),
(8, '-', '2022-03-15 16:39:28', '2022-03-15 16:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hrms_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `status` enum('Active','InActive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `hrms_id`, `team_id`, `status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@touchstone.com.pk', '$2y$10$av5XxWvluAU/o5JvKVAvh.1UC8NqJAI44x1aARAqb5btnTJzkYexm', 896075, 8, 'Active', NULL, NULL, '2022-03-11 01:22:21', '2022-03-15 16:39:43'),
(2, 'Huma ARSHAD', 'huma@example.net', '$2y$10$4RuYjNzS16b60AN6N6HSi.nBNFLAKjDpuIWSPZhYt9.chl5RZioEG', 170442, 2, 'Active', NULL, NULL, '2022-03-11 01:22:21', '2022-03-14 19:48:26'),
(3, 'LAVIZA FATIMA', 'twisoky@example.com', '$2y$10$k4PsqMKT04onEwtY4GPPKO.XnssBZPLsIhM6VFuyPSxIIt3mMVnE.', 50966, 2, 'Active', NULL, NULL, '2022-03-11 01:22:21', '2022-03-11 22:43:24'),
(4, 'M TABRAIZ ANJUM', 'jo86@example.net', '$2y$10$UqCBaDVuZGuvORDRGOeleePQFTxzsbMNxsyQ2GbQLdDbjwFmURZf6', 983441, 2, 'Active', NULL, NULL, '2022-03-11 01:22:21', '2022-03-11 01:22:21'),
(5, 'Maheen Arshad Khan', 'jammie.streich@example.com', '$2y$10$6ndrSE.aNNMprQ2ibTYALOJB9qtKKTAVqRewdp4IAu2iOpIelm0I.', 401372, 2, 'Active', NULL, NULL, '2022-03-11 01:22:21', '2022-03-11 01:22:21'),
(6, 'Mohammed Humza Bin Zulfiqar', 'leon00@example.com', '$2y$10$kuYS0vJ2sdeTv2FgdSN8IODPStPBxVPfNckD5gKLbJCJYpm9cTNRe', 942633, 2, 'Active', NULL, NULL, '2022-03-11 01:22:22', '2022-03-11 01:22:22'),
(7, 'MUHAMMAD SAAD TANVEER', 'dschinner@example.com', '$2y$10$lN3wXXN9B6UjSBCsWdxImOCp7h6zH1qT5K/QEHkqNEjQufxbmQ58q', 959265, 2, 'Active', NULL, NULL, '2022-03-11 01:22:22', '2022-03-11 01:22:22'),
(8, 'NIMRA ALEEM', 'joannie09@example.com', '$2y$10$qd5Br6mC1P2iySM.aOwtt.Az3Y3HVKPA4YsrEK3t5UIeGJ6/AC8KK', 223202, 2, 'Active', NULL, NULL, '2022-03-11 01:22:22', '2022-03-11 01:22:22'),
(9, 'REHMAN NAWAZ', 'bashirian.anya@example.net', '$2y$10$1dAYH62.MEyYaZSbiEtHQu2m2zOVpzgIbITsJ/a6.CEI75XgdyUDG', 374129, 2, 'Active', NULL, NULL, '2022-03-11 01:22:22', '2022-03-11 01:22:22'),
(10, 'Saher Gloria Qamar', 'eulah.trantow@example.net', '$2y$10$1b9OuzF0HhoW1K1JNe09VunndwEDTq92XCCj7ooVlVR6K.71Kx9jG', 676620, 2, 'Active', NULL, NULL, '2022-03-11 01:22:22', '2022-03-11 01:22:22'),
(11, 'SEYED HASSAN RAZAVI', 'joany.waelchi@example.org', '$2y$10$ZT8rOSNc7Gb4dv9eA6Vs6.21rclcpqsFZCHoIZYe6dasROMeZuQW.', 11125, 2, 'Active', NULL, NULL, '2022-03-11 01:22:22', '2022-03-11 01:22:22'),
(12, 'SUNDAS ASLAM', 'jlemke@example.net', '$2y$10$dYyNY9.SD1pBNp/1NGA8TONK.LJ2jF6BLlFQ29QDc/Q.ZkQbi40jy', 518106, 2, 'Active', NULL, NULL, '2022-03-11 01:22:23', '2022-03-11 01:22:23'),
(13, 'HAFSA AAMIR', 'pbotsford@example.com', '$2y$10$Io2WXVaOIKVpFfvYFJ6kPeT84ZtlSH5NS6dIgdIVSLxjoH6EFMk4K', 317432, 3, 'Active', NULL, NULL, '2022-03-11 01:22:23', '2022-03-11 01:22:23'),
(14, 'HYDER QASIM KHAN', 'kyle.robel@example.com', '$2y$10$TLdmdB61X37AqK5kfe1EYe1LuLeltl.q5h525fzX8zF/XcTFDZSUC', 684605, 3, 'Active', NULL, NULL, '2022-03-11 01:22:23', '2022-03-11 01:22:23'),
(15, 'TABITHA SOMMER ALBERT', 'quitzon.rogers@example.net', '$2y$10$sOMmRtsRqiAvPzovAgkx5evf4wH2yZ0vLZqrlC2wBu8Dc5O8AZzMu', 74026, 3, 'Active', NULL, NULL, '2022-03-11 01:22:23', '2022-03-11 01:22:23'),
(16, 'AMMARA BRAIKHNA', 'klocko.clair@example.net', '$2y$10$udKuEcz4ZrMfChDq.u5sF.KVlhhW/qNzzvD4f8GCt1G8FhrZPD7By', 649128, 4, 'Active', NULL, NULL, '2022-03-11 01:22:23', '2022-03-11 01:22:23'),
(17, 'Hassan Khan', 'nikita46@example.net', '$2y$10$9T0W16ebOt1fLSR8O1fLqeCwkBbBFwdgei8mUNtnkEfjLPkz0Wo1C', 391219, 4, 'Active', NULL, NULL, '2022-03-11 01:22:23', '2022-03-11 01:22:23'),
(18, 'SUFYAN NAZIR', 'frami.eldridge@example.net', '$2y$10$N2BF4g0kZ2e4qi7NALX0juBeLqEH7A473XYvWFmRRLKhYCsP2gNqa', 658803, 4, 'Active', NULL, NULL, '2022-03-11 01:22:24', '2022-03-11 01:22:24'),
(19, 'MUHAMMAD AYAZ', 'madilyn68@example.org', '$2y$10$slHDgiNAhq5zVmAMEZt89Oe8O84p9ZtSVtrYD1QW1p9xGD6YTZTzm', 408049, 5, 'Active', NULL, NULL, '2022-03-11 01:22:24', '2022-03-15 16:31:45'),
(20, 'RABBIA KHAN', 'rupert.reichert@example.org', '$2y$10$orfZA/OQuNXd1cPEuewN0Ohg9W.7Lpe4bQTKjHT6akip1.wkMun3O', 499696, 5, 'Active', NULL, NULL, '2022-03-11 01:22:24', '2022-03-11 01:22:24'),
(21, 'HASSAN RAZA HASHMI', 'djacobi@example.org', '$2y$10$SPKkru0eToWItNu0LFa4yu3JDRlhy0eZniKSxnoeCnLX3Dwo5lO3i', 593215, 1, 'Active', NULL, NULL, '2022-03-11 01:22:24', '2022-03-11 01:22:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
