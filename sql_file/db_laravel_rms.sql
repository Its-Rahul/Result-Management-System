-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 03:39 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laravel_rms`
--

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
(4, '2021_02_17_182450_create_table_classes', 1),
(5, '2021_02_17_182636_create_table_subjects', 1),
(6, '2021_02_17_190113_create_table_students', 1),
(7, '2021_02_17_190217_create_table_results', 1),
(8, '2021_03_05_204030_create_table_notice', 1);

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
-- Table structure for table `table_classes`
--

CREATE TABLE `table_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `className` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `classNameNumeric` int(11) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_classes`
--

INSERT INTO `table_classes` (`id`, `created_at`, `updated_at`, `className`, `classNameNumeric`, `section`) VALUES
(1, '2021-03-29 07:58:29', '2021-09-08 06:46:17', 'One', 1, 's'),
(2, '2021-03-29 08:42:35', '2021-09-08 06:46:33', 'two', 2, 'a'),
(3, '2021-09-08 06:46:53', '2021-09-08 06:46:53', 'Three', 3, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `table_notice`
--

CREATE TABLE `table_notice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `notice` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_notice`
--

INSERT INTO `table_notice` (`id`, `date`, `notice`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-09-02', 'result of class 10 published', 1, '2021-09-02 02:43:01', '2021-09-02 02:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `table_results`
--

CREATE TABLE `table_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `marks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_students`
--

CREATE TABLE `table_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `roll_id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_students`
--

INSERT INTO `table_students` (`id`, `class_id`, `roll_id`, `fullname`, `email`, `dob`, `phone`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 64, 'Griffith Shannon', 'fuzyjetofa@mailinator.com', '1988-04-25', '+1 (985) 771-4111', 'Quis voluptatem ist', '1617185691_admin.png', 1, '2021-03-31 04:29:51', '2021-03-31 04:29:51'),
(3, 1, 89, 'Nola Sutton', 'qoco@mailinator.com', '2011-01-05', '+1 (845) 159-8693', 'Ad et eaque impedit', '1617185709_user.png', 1, '2021-03-31 04:30:09', '2021-03-31 04:30:09'),
(4, 2, 88, 'Taylor Moran', 'vycabid@mailinator.com', '1997-08-08', '+1 (614) 562-9835', 'Sit rem magni et nul', '1630778939_jerry.png', 1, '2021-09-04 12:23:59', '2021-09-04 12:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `table_subjects`
--

CREATE TABLE `table_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_subjects`
--

INSERT INTO `table_subjects` (`id`, `class_id`, `subject_name`, `subject_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'English', '341', '2021-03-29 08:06:12', '2021-09-06 03:42:38'),
(2, 1, 'Social', '788', '2021-03-29 08:23:49', '2021-03-29 08:23:49'),
(3, 2, 'Social', '779', '2021-03-29 08:42:53', '2021-03-29 08:42:53'),
(4, 3, 'English', '096', '2021-09-08 06:47:11', '2021-09-08 06:47:11'),
(5, 1, 'Math', '999', '2021-09-08 06:47:26', '2021-09-08 06:47:26'),
(6, 2, 'English', '899', '2021-09-08 06:47:40', '2021-09-08 06:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'rahul mandal', 'rahul123@gmail.com', NULL, '$2y$10$xE2654z7LOx7plMPK49VAeHROs7/HbBsVK0xl18aA5L6ZwjEX7Hxa', '9807948315', 'Jhapa', 'Admin1.png', 1, NULL, '2021-03-31 04:28:02', '2021-03-31 04:28:02');

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `table_classes`
--
ALTER TABLE `table_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_notice`
--
ALTER TABLE `table_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_results`
--
ALTER TABLE `table_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_results_student_id_foreign` (`student_id`),
  ADD KEY `table_results_class_id_foreign` (`class_id`),
  ADD KEY `table_results_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `table_students`
--
ALTER TABLE `table_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_students_class_id_foreign` (`class_id`);

--
-- Indexes for table `table_subjects`
--
ALTER TABLE `table_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_subjects_class_id_foreign` (`class_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_classes`
--
ALTER TABLE `table_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_notice`
--
ALTER TABLE `table_notice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_results`
--
ALTER TABLE `table_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_students`
--
ALTER TABLE `table_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_subjects`
--
ALTER TABLE `table_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_results`
--
ALTER TABLE `table_results`
  ADD CONSTRAINT `table_results_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `table_classes` (`id`),
  ADD CONSTRAINT `table_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `table_students` (`id`),
  ADD CONSTRAINT `table_results_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `table_subjects` (`id`);

--
-- Constraints for table `table_students`
--
ALTER TABLE `table_students`
  ADD CONSTRAINT `table_students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `table_classes` (`id`);

--
-- Constraints for table `table_subjects`
--
ALTER TABLE `table_subjects`
  ADD CONSTRAINT `table_subjects_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `table_classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
