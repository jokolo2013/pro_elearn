-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 06:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_elearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `course_type_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_images` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_videos` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_detail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_difficulty` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_times` int(11) NOT NULL,
  `course_will_learn` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_objective` varchar(255) CHARACTER SET utf8 NOT NULL,
  `viewer` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses_type`
--

CREATE TABLE `courses_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_type`
--

INSERT INTO `courses_type` (`id`, `courses_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Computer', '2022-03-18 13:54:46', '2022-03-18 13:54:46'),
(2, 'Graphic', '2022-03-18 13:54:46', '2022-03-18 13:54:46'),
(3, 'Math', '2022-03-18 13:55:32', '2022-03-18 13:55:32'),
(4, 'Internet of Things', '2022-03-18 13:55:32', '2022-03-18 13:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_course` bigint(20) UNSIGNED NOT NULL,
  `lesson_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lesson_sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_files`
--

CREATE TABLE `lesson_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lessons_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_files_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lesson_files_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_video`
--

CREATE TABLE `lesson_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lessons_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_video_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_video_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2022_02_24_213558_create_role_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 3),
(4, '2019_08_19_000000_create_failed_jobs_table', 3),
(5, '2022_03_17_214454_create_courses_type_table', 4),
(6, '2022_03_17_212828_create_courses_table', 5),
(7, '2022_03_17_214830_create_lessons_table', 6),
(8, '2022_03_17_215100_create_lesson_files_table', 7),
(9, '2022_03_17_215615_create_lesson_video_table', 8);

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(0, 'Admin', '2022-02-24 15:05:22', '2022-02-24 15:05:22'),
(1, 'Author', '2022-02-24 15:06:15', '2022-02-24 15:06:15'),
(2, 'Member', '2022-02-24 15:06:23', '2022-02-24 15:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_profile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `Fname`, `Lname`, `Gender`, `tel`, `email`, `email_verified_at`, `password`, `pic_profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Eddy', 'Suttipongs', '2', '094019048', 'admin@admin.com', NULL, '$2y$10$SZXlRmy1MM0ubCjqDRkrX.LCo9MG7mhtTZgx3tPhilz/NWEG47bkm', 'ZJAzj5HqTw.jpg', NULL, '2022-02-24 15:12:09', '2022-03-10 06:18:12'),
(54, 1, 'ytytyty', 'tytytyty', '3', '0940190485', 'tytyt0a1y@tytyty.ty', NULL, '$2y$10$nQAe8bd/LHW4Vpjdg6orjui/HCQP4tOJ7gaVGbClVu55OI2ZJedEG', 'nopic.jpg', NULL, '2022-02-24 18:54:34', '2022-02-24 18:54:34'),
(55, 1, 'user', 'user', '1', '0856565656', 'dddssaasasa@dddd.ddd', NULL, '$2y$10$e1lbQHJZv/n3H4lqVSOqJ.RJ4h6CTRZfuSAybCvXDSkxQTglQPaRi', 'nopic.jpg', NULL, '2022-02-25 04:33:29', '2022-02-25 04:33:29'),
(56, 1, 'user', 'user', '2', '0856565656', 'dddssaasasa@dddd.ddda', NULL, '$2y$10$KoODbFSA6igbaRNmKLPv2ueRARE4vWqCR9iu.Y/4ZOeFjxO60ot2G', 'nopic.jpg', NULL, '2022-02-25 04:34:37', '2022-02-25 04:34:37'),
(57, 2, 'test', 'test', '2', '0856565656', 'test@dddd.ddd', NULL, '$2y$10$SYfpfeFn0l4B.niDGoszAO/tkPZG313isnRVZaxpUVAC8BfvNujTe', 'nopic.jpg', NULL, '2022-02-25 04:41:15', '2022-02-25 04:41:15'),
(58, 2, 'test', 'test', '2', '0856565656', 'testd@dddd.ddd', NULL, '$2y$10$7Ez4dCGDLJf18AHfaznC/.LEtsS6gSYcBucrgg.5aauk88YGc9k8a', 'nopic.jpg', NULL, '2022-02-25 04:43:17', '2022-02-25 04:43:17'),
(59, 2, 'test', 'test', '1', '0856565656', 'tes1td@dddd.ddd', NULL, '$2y$10$4ZY9oXM60cTg1FjPCYjFw.kx58EWkFV1sysTfoL5b2XRrvjpC/DDy', 'nopic.jpg', NULL, '2022-02-25 04:43:31', '2022-02-25 04:43:31'),
(72, 2, 'Nattapong', 'LongKeaw', '2', '0810592178', 'Nattapong@gmail.com', NULL, '$2y$10$BK01o2ZDzv3TfUXTRQnu3OlyGkPdohGCzHWr5X/J0xhw4kQLm9KN2', 'hHL45Rd0dp.jpg', NULL, '2022-03-10 06:27:27', '2022-03-10 06:27:38'),
(75, 2, 'นพรุจ', 'ชูธรรม', '1', '0940190485', 'Nobpharut@gmail.com', NULL, '$2y$10$SEYWAb72/rF4dcsfSmHM1.ad4atTOvRLWY2uXSflHCKn5HY.EeP8O', 'MezYIxQaQa.jpg', NULL, '2022-03-11 07:10:03', '2022-03-11 07:11:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_id_users_foreign` (`id_users`),
  ADD KEY `courses_course_type_id_foreign` (`course_type_id`);

--
-- Indexes for table `courses_type`
--
ALTER TABLE `courses_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_id_course_foreign` (`id_course`);

--
-- Indexes for table `lesson_files`
--
ALTER TABLE `lesson_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_files_lessons_id_foreign` (`lessons_id`);

--
-- Indexes for table `lesson_video`
--
ALTER TABLE `lesson_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_video_lessons_id_foreign` (`lessons_id`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_type`
--
ALTER TABLE `courses_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_files`
--
ALTER TABLE `lesson_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_video`
--
ALTER TABLE `lesson_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_course_type_id_foreign` FOREIGN KEY (`course_type_id`) REFERENCES `courses_type` (`id`),
  ADD CONSTRAINT `courses_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_id_course_foreign` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `lesson_files`
--
ALTER TABLE `lesson_files`
  ADD CONSTRAINT `lesson_files_lessons_id_foreign` FOREIGN KEY (`lessons_id`) REFERENCES `lessons` (`id`);

--
-- Constraints for table `lesson_video`
--
ALTER TABLE `lesson_video`
  ADD CONSTRAINT `lesson_video_lessons_id_foreign` FOREIGN KEY (`lessons_id`) REFERENCES `lessons` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
