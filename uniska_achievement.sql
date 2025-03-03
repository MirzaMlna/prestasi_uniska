-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2025 at 03:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniska_achievement`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement_type` enum('akademik','non akademik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement_level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participation_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `execution_model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_count` int NOT NULL,
  `achievement_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `news_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `award_photo_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_assignment_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_assignment_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('tunda','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tunda',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `student_id`, `nim`, `name`, `study_program`, `achievement_type`, `achievement_level`, `participation_type`, `execution_model`, `event_name`, `participant_count`, `achievement_title`, `start_date`, `end_date`, `news_link`, `certificate_file`, `award_photo_file`, `student_assignment_letter`, `supervisor_assignment_letter`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, '2237230076', 'Miss Angela Kirlin', 'Ekonomi Syari’ah', 'akademik', 'Wilayah', 'Individu', 'Daring', 'KMI EXPO XIV', 120, 'Juara 1', '2025-03-01', '2025-03-31', 'https://kemahasiswaan.uniska-bjm.ac.id/2023/11/tim-tambalin-dari-uniska-mab-banjarmasin-meraih-juara-kewirausahaan-mahasiswa-indonesia-kmi-expo-2023/', 'certificates/mcQemxpinvRfNQlKYltgKg3YTS8C2W3yHStNOuYT.pdf', 'awards/xMaTJ5W1UmNuuMyIRWlPapF6py0LF0m9259xwq2U.pdf', 'assignment_letters/H64eKafA0HJbi5etZk0HpAISjsAObYc51iByznkt.pdf', 'assignment_letters/xak28BwCUCdfpwxPiCZPEUHo9Ao25PfzYk16zYzJ.pdf', 'diterima', '2025-03-03 00:52:59', '2025-03-03 00:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_11_055519_create_achievements_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('L2Ap7685YXaqHwl4Wr09wxC3gk7q2AmjiXdX1IhV', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU1phbjU0Q2hOdVBTMzRRb2lIS2NCVkFYQ2R2NzU2SUloYmJqQ1VhbSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjg4OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWNoaWV2ZW1lbnRzL3ByaW50P3N0YXJ0X3llYXI9MjAyNSZzdHVkeV9wcm9ncmFtPUVrb25vbWklMjBTeWFyaWFoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjE7fQ==', 1740964745),
('Tj6S1xZ9sKRJFG9R4eAXfYMXY10qKNalBYHPiQSL', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoielF5eHY4SXlndHpyUlFSYTkxRmZ2cGJCaUtZQ2dtNTRYZWFCRmpHaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2hpZXZlbWVudHMvcHJpbnQ/c3RhcnRfeWVhcj0yMDI1JnN0dWR5X3Byb2dyYW09RWtvbm9taSUyMFN5YXJpYWgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyMTt9', 1740964458);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `study_program`, `phone`, `password`, `role`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2251596288', 'Lewis Gottlieb', 'Pendidikan Guru Madrasah Ibtidaiyah', '080517739787', '$2y$12$JT8bnPBHZm.SOpt.jcxOJezLk6SyNwi4gP2/TbpBpklGCAbCPuyTy', 'mahasiswa', 0, '4jrr9pOeWC', '2025-03-03 00:51:51', '2025-03-03 00:51:51'),
(2, '2267543076', 'Aylin Hessel', 'Pendidikan Bahasa Inggris', '088257374794', '$2y$12$ArYb4sIQapWWRPw7FFjsXONkA.bx1A5bo.3rjzmmuC932UUug3DLy', 'mahasiswa', 0, '7sO1kkb2QE', '2025-03-03 00:51:51', '2025-03-03 00:51:51'),
(3, '2202808849', 'Eleanore Fay', 'Agribisnis', '088910139155', '$2y$12$uXlFkLxmbcYYGCoiZyV8xeTxIGci00/iboIotvu9mc6P.rVElOZ.G', 'admin', 0, 'poDMQVx2sS', '2025-03-03 00:51:51', '2025-03-03 00:51:51'),
(4, '2217806881', 'Prof. Maryse McClure V', 'Agribisnis', '087566204983', '$2y$12$uwR55JaLLYsXgtm1MOUK6OEctwtxXQJLkHKV29I5te6ffRVMlw.Bq', 'mahasiswa', 0, '7zXt9MUP2l', '2025-03-03 00:51:52', '2025-03-03 00:51:52'),
(5, '2248594182', 'Barrett Kohler', 'Agribisnis', '081811947203', '$2y$12$W6JHACKOP2KAzaPMYYMYWuJdadYYo0EcYt1HPnPZnTvbHZJFEWGeq', 'admin', 0, 'DOwfVxBVXB', '2025-03-03 00:51:52', '2025-03-03 00:51:52'),
(6, '2275329722', 'Raphael Glover', 'Ilmu Komunikasi', '085782838328', '$2y$12$bwA2EYBhc9pn1F8iSjHLauMJcKgIg33HTdhIgB4Z82A65kVmwYoUq', 'mahasiswa', 0, 'p5uO1922SZ', '2025-03-03 00:51:52', '2025-03-03 00:51:52'),
(7, '2250849515', 'Prof. Ena Crooks I', 'Teknik Mesin', '088427216426', '$2y$12$npkz1UXpTFdjh6wg4YZ68.tL468V/1.XQinY3D.YniCnQ9dQSO87K', 'admin', 0, '9JPuAqr2ad', '2025-03-03 00:51:52', '2025-03-03 00:51:52'),
(8, '2247314110', 'Haylie Morar', 'Manajemen', '088836776668', '$2y$12$8rqxRt.IUmyjiocqycDRDenGeczFK/ZL5jpsKBRs1ZGJtnqoQg2y2', 'admin', 0, 'RsVNUeG6pe', '2025-03-03 00:51:52', '2025-03-03 00:51:52'),
(9, '2246658199', 'Kaden Boyle I', 'Peternakan', '086040714365', '$2y$12$sEc6yk6NQ3IgF/PTUxC7rO5Gf//PZ3h9zB6h1PCnVjzWdMjdkw5Ga', 'admin', 0, 'aDV2c7iQ0w', '2025-03-03 00:51:53', '2025-03-03 00:51:53'),
(10, '2259456042', 'Natalia Lang', 'Agribisnis', '080986058350', '$2y$12$TVjIkO4U9QWPE879W0T12.WzdXkkFTyM9ZTr5xk.4nasq/89tgXsu', 'admin', 1, 'sxn4dhqcBr', '2025-03-03 00:51:53', '2025-03-03 00:51:53'),
(11, '2203391704', 'Kyler Donnelly', 'Agribisnis', '082716195029', '$2y$12$A/uP8VyF3rZZ6EhDo2.sX.gEvfBoRsXc5P7XG3eEZLnk.GjlumMfa', 'mahasiswa', 0, 'HSxyiyJN1w', '2025-03-03 00:51:53', '2025-03-03 00:51:53'),
(12, '2298739661', 'Mrs. Dulce Beahan', 'Kesehatan Masyarakat', '088071916237', '$2y$12$yfS8wLRmF8jJQmhLTYEKvuT9H2F4aFH0VT5PwcKZ3/dML4/vGn1bK', 'admin', 1, 'QZO5Mxqt6b', '2025-03-03 00:51:53', '2025-03-03 00:51:53'),
(13, '2229471388', 'Ray Renner Jr.', 'Pendidikan Guru Madrasah Ibtidaiyah', '082642499641', '$2y$12$sxp6Tz5zA.1HsVehigpvsOb/lkS.f5P9Sp2dgxcWM5s8UyrlasRnS', 'mahasiswa', 0, 'lbcBkpgt1y', '2025-03-03 00:51:53', '2025-03-03 00:51:53'),
(14, '2299724352', 'Alexis Stokes', 'Bimbingan dan Konseling', '085515409423', '$2y$12$8eyNdryqRB61KO0IC0r35Ow8AGXxK2JokUTNXcHCqTtZksk6Uerau', 'mahasiswa', 0, '6VtkdsTkQd', '2025-03-03 00:51:54', '2025-03-03 00:51:54'),
(15, '2270831674', 'Miss Ruthie Hessel', 'Peternakan', '081427007673', '$2y$12$cVmJucqCT.yKN7jAZ6mpkO7IyJGa7B93lqaiUZ/e.9GTCZvfmwUOG', 'mahasiswa', 0, 'OYzVGIdltl', '2025-03-03 00:51:54', '2025-03-03 00:51:54'),
(16, '2258862353', 'Mason Lueilwitz V', 'Teknik Informatika', '083365334397', '$2y$12$Bqj2x5eHt7gczna1wHVBGuJYXAwY3Fa31m22DYT1QhMDJAXSDA90S', 'admin', 0, 'ZGUeWERrnV', '2025-03-03 00:51:54', '2025-03-03 00:51:54'),
(17, '2255547562', 'Prof. Stevie Buckridge Sr.', 'Ekonomi Syari’ah', '086816023278', '$2y$12$d9LMcT5N5VI2x6foW0QavuAv3wFk0SFc1zFtHfpMq04oaAeH5TAjS', 'mahasiswa', 0, '1GHt4tZjm8', '2025-03-03 00:51:54', '2025-03-03 00:51:54'),
(18, '2268401104', 'Nico Mohr', 'Teknik Industri', '087674689104', '$2y$12$9VmshmZruQrJ0qEjf4IpEO6br6G4bViLu9pEQ4PSBZdsVNz7LNxnu', 'mahasiswa', 0, '8uCSUH7Ws6', '2025-03-03 00:51:54', '2025-03-03 00:51:54'),
(19, '2237957987', 'Horacio Mills', 'Agribisnis', '088847548735', '$2y$12$c5JRUuu3z1diEWY2nInGB.zdEe4N.fxwXsxCf2vEt9tp5n2D1Tsy2', 'admin', 0, 'tar9m8uwOe', '2025-03-03 00:51:55', '2025-03-03 00:51:55'),
(20, '2237230076', 'Miss Angela Kirlin', 'Ekonomi Syari’ah', '083887580559', '$2y$12$.z6LQYI.Qwx0GtIwV5etEO..TnrcIvuvvx2oHhEpQtYQF1Zk6GZie', 'mahasiswa', 1, 'G3GPqv6kY1kBbO4Vwk93ZbmhvRCvkr7yvUcA6KKmfm1ROf524kqjn7wF8vnL', '2025-03-03 00:51:55', '2025-03-03 00:52:18'),
(21, '2210010156', 'Admin User', 'Kemahasiswaan', '085814313224', '$2y$12$WXea6F8jQzRTbb1QC0UCkO3AeodRVzUqg350YoR0oDvlj9U53eYqG', 'admin', 1, 'Em2MasrSBqVCa89Mmrb0LFjDgyzx3VsFcsiLXpXDPs0dntK9u44iOMFB2XI9', '2025-03-03 00:51:59', '2025-03-03 00:51:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achievements_student_id_foreign` (`student_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
