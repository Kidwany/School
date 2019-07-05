-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 12:01 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(10) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `grade_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1/1', 1, 2, '2019-06-29 17:49:47', '2019-06-29 18:02:41'),
(2, '1/2', 1, 2, '2019-06-29 17:50:46', '2019-06-29 17:50:46'),
(3, '1/3', 1, 2, '2019-06-29 17:51:21', '2019-06-29 17:51:21'),
(4, '2/1', 10, 2, '2019-07-04 07:32:46', '2019-07-04 07:32:46'),
(5, '2/2', 10, 2, '2019-07-04 07:33:00', '2019-07-04 07:33:00'),
(6, '3/1', 11, 2, '2019-07-04 07:33:15', '2019-07-04 07:33:15'),
(7, '4/1', 12, 2, '2019-07-04 07:33:23', '2019-07-04 07:33:23'),
(8, '4/2', 12, 2, '2019-07-04 07:33:31', '2019-07-04 07:33:31'),
(9, '5/1', 13, 2, '2019-07-04 07:34:25', '2019-07-04 07:34:25'),
(10, '5/3', 13, 2, '2019-07-04 07:35:35', '2019-07-04 07:35:35'),
(11, '6/2', 14, 2, '2019-07-04 07:35:58', '2019-07-04 07:35:58'),
(12, '6/3', 14, 2, '2019-07-04 07:36:19', '2019-07-04 07:36:19'),
(13, '2/2', 16, 2, '2019-07-04 07:36:33', '2019-07-04 07:36:33'),
(14, '3/4', 20, 3, '2019-07-04 07:36:40', '2019-07-05 15:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `classes_teachers`
--

CREATE TABLE `classes_teachers` (
  `id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `classes_teachers`
--

INSERT INTO `classes_teachers` (`id`, `teacher_id`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '2019-07-29 22:00:00', '2019-07-30 22:00:00'),
(2, 2, 2, '2019-07-29 22:00:00', '2019-07-30 22:00:00'),
(3, 2, 14, '2019-07-29 22:00:00', '2019-07-30 22:00:00'),
(4, 1, 2, '2019-07-23 22:00:00', '2019-07-24 22:00:00'),
(5, 4, 14, '2019-07-30 22:00:00', '2019-07-22 22:00:00'),
(7, 3, 3, NULL, NULL),
(8, 3, 9, '2019-07-23 22:00:00', '2019-07-17 22:00:00'),
(9, 8, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) NOT NULL,
  `level_id` int(10) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `level_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2019-06-16 22:00:00', '2019-06-18 22:00:00'),
(10, 1, 2, '2019-06-29 20:44:49', '2019-06-29 20:44:49'),
(11, 1, 2, '2019-06-29 22:06:54', '2019-06-29 22:06:54'),
(12, 1, 2, '2019-06-29 22:08:16', '2019-06-29 22:08:16'),
(13, 1, 2, '2019-06-29 22:08:36', '2019-06-29 22:08:36'),
(14, 1, 2, '2019-06-29 22:09:18', '2019-06-29 22:09:18'),
(15, 3, 2, '2019-06-29 22:09:40', '2019-06-29 22:09:40'),
(16, 3, 2, '2019-07-04 07:30:45', '2019-07-04 07:30:45'),
(17, 3, 2, '2019-07-04 07:31:15', '2019-07-04 07:31:15'),
(18, 4, 2, '2019-07-04 07:31:40', '2019-07-04 07:31:40'),
(19, 4, 2, '2019-07-04 07:32:00', '2019-07-04 07:32:00'),
(20, 4, 2, '2019-07-04 07:32:19', '2019-07-04 07:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `grades_teachers`
--

CREATE TABLE `grades_teachers` (
  `id` int(10) NOT NULL,
  `grade_id` int(10) DEFAULT NULL,
  `teacher_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `grades_teachers`
--

INSERT INTO `grades_teachers` (`id`, `grade_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 10, 3, '2019-07-03 15:20:57', '2019-07-03 15:20:57'),
(3, 12, 3, '2019-07-03 15:48:45', '2019-07-03 15:48:45'),
(4, 10, 2, '2019-07-04 07:16:39', '2019-07-04 07:16:39'),
(5, 18, 4, '2019-07-05 10:07:20', '2019-07-05 10:07:20'),
(6, 19, 4, '2019-07-05 10:07:20', '2019-07-05 10:07:20'),
(7, 20, 4, '2019-07-05 10:07:20', '2019-07-05 10:07:20'),
(8, 10, 1, '2019-07-05 14:11:55', '2019-07-05 14:11:55'),
(9, 11, 1, '2019-07-05 14:11:55', '2019-07-05 14:11:55'),
(10, 1, 3, '2019-07-05 15:25:44', '2019-07-05 15:25:44'),
(17, 13, 3, '2019-07-22 22:00:00', '2019-07-29 22:00:00'),
(18, 1, 8, '2019-07-05 18:32:22', '2019-07-05 18:32:22'),
(19, 10, 8, '2019-07-05 18:32:22', '2019-07-05 18:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `album_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `path`, `album_id`, `created_at`, `updated_at`) VALUES
(1, '15623377978583d7f2-95c5-466d-9d27-a230d823cf0f.jpg', 'public/images/dashboard/users/15623377978583d7f2-95c5-466d-9d27-a230d823cf0f.jpg', NULL, '2019-07-05 12:43:17', '2019-07-05 12:43:17'),
(2, '1562338177IMG-20161230-WA0016.jpg', 'images/dashboard/users/1562338177IMG-20161230-WA0016.jpg', NULL, '2019-07-05 12:49:37', '2019-07-05 12:49:37'),
(3, '15623382168583d7f2-95c5-466d-9d27-a230d823cf0f.jpg', 'images/dashboard/users/15623382168583d7f2-95c5-466d-9d27-a230d823cf0f.jpg', NULL, '2019-07-05 12:50:16', '2019-07-05 12:50:16'),
(4, '1562341909user.png', 'images/dashboard/teachers/1562341909user.png', NULL, '2019-07-05 13:51:49', '2019-07-05 13:51:49'),
(5, '1562343114user.png', 'images/dashboard/teachers/1562343114user.png', NULL, '2019-07-05 14:11:54', '2019-07-05 14:11:54'),
(6, '1562345046IMG-20170423-WA0007.jpg', 'images/dashboard/teachers/1562345046IMG-20170423-WA0007.jpg', NULL, '2019-07-05 14:44:06', '2019-07-05 14:44:06'),
(7, '1562347544IMG-20170423-WA0010.jpg', 'images/dashboard/teachers/1562347544IMG-20170423-WA0010.jpg', NULL, '2019-07-05 15:25:44', '2019-07-05 15:25:44'),
(8, '1562349686IMG-20170423-WA0015.jpg', 'images/dashboard/teachers/1562349686IMG-20170423-WA0015.jpg', NULL, '2019-07-05 16:01:26', '2019-07-05 16:01:26'),
(9, '1562349809IMG-20170423-WA0015.jpg', 'images/dashboard/teachers/1562349809IMG-20170423-WA0015.jpg', NULL, '2019-07-05 16:03:29', '2019-07-05 16:03:29'),
(10, '1562349990IMG-20170423-WA0015.jpg', 'images/dashboard/teachers/1562349990IMG-20170423-WA0015.jpg', NULL, '2019-07-05 16:06:30', '2019-07-05 16:06:30'),
(11, '1562358565e36706b7-47bd-4709-8af6-3fdd47d68266.jpg', 'images/dashboard/users/1562358565e36706b7-47bd-4709-8af6-3fdd47d68266.jpg', NULL, '2019-07-05 18:29:25', '2019-07-05 18:29:25'),
(12, '1562358742IMG-20170423-WA0010.jpg', 'images/dashboard/teachers/1562358742IMG-20170423-WA0010.jpg', NULL, '2019-07-05 18:32:22', '2019-07-05 18:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, '2019-06-10 22:00:00', '2019-06-18 22:00:00'),
(3, 2, '2019-06-29 22:05:48', '2019-06-29 22:05:48'),
(4, 2, '2019-06-29 22:06:13', '2019-06-29 22:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'teacher', NULL, NULL),
(3, 'student', NULL, NULL),
(4, 'Support', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `open` int(11) NOT NULL,
  `thumb` int(10) UNSIGNED DEFAULT NULL,
  `logo` int(10) UNSIGNED DEFAULT NULL,
  `favicon` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(10) NOT NULL,
  `grade_id` int(10) DEFAULT NULL,
  `level_id` int(10) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `address`, `class_id`, `grade_id`, `level_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Mahmoud', 'kidwany@gmail.com', '01100960900', 'Cairo', 14, 20, 4, 3, '2019-06-30 08:02:37', '2019-07-05 15:50:34'),
(2, 'GiGi Murad', 'gugugycufa@mailinator.com', '0112234445', 'Cairo', 2, 1, 1, 2, '2019-07-04 07:26:29', '2019-07-04 07:26:47'),
(4, 'Sayed Dahsan', 'pigoja@mailinator.net', '0122258971', 'Mansura', 1, 1, 1, 2, '2019-07-04 07:28:39', '2019-07-04 07:28:39'),
(5, 'Ahmed Kidwany', 'vaxafef@mailinator.com', '01100960900', 'kepikerel@mailinator.com', 3, 1, 1, 2, '2019-07-04 07:29:21', '2019-07-04 07:29:21'),
(6, 'Kahled Nabawy Raouf', 'zenag@mailinator.net', '0112265985', 'zarot@mailinator.net', 3, 1, 1, 2, '2019-07-04 07:30:01', '2019-07-04 07:30:01'),
(8, 'Mona Essam', 'mona@gmail.com', '0112256354', 'Cairo', 3, 1, 3, 2, '2019-07-04 13:17:00', '2019-07-04 13:17:00'),
(10, 'Mona Mohsen', 'm.mohsen@gmail.com', '01125688894', 'Syria', 3, 1, 1, 3, '2019-07-05 17:05:21', '2019-07-05 17:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, '2019-06-11 22:00:00', '2019-06-18 22:00:00'),
(6, 2, '2019-06-30 17:42:58', '2019-06-30 17:42:58'),
(7, 2, '2019-06-30 17:44:47', '2019-06-30 17:44:47'),
(8, 2, '2019-06-30 17:59:00', '2019-06-30 17:59:00'),
(9, 2, '2019-06-30 18:01:04', '2019-06-30 18:01:04'),
(14, 2, '2019-06-30 18:13:43', '2019-06-30 18:13:43'),
(15, 2, '2019-07-03 07:57:11', '2019-07-03 07:57:11'),
(18, 2, '2019-07-04 07:37:25', '2019-07-04 07:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_grades`
--

CREATE TABLE `subjects_grades` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `grade_id` int(10) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects_grades`
--

INSERT INTO `subjects_grades` (`id`, `subject_id`, `grade_id`, `created_by`, `created_at`, `updated_at`) VALUES
(26, 7, 10, NULL, NULL, NULL),
(30, 7, 1, NULL, '2019-07-03 10:41:24', '2019-07-03 10:41:24'),
(31, 7, 12, NULL, '2019-07-03 10:47:06', '2019-07-03 10:47:06'),
(32, 7, 13, NULL, '2019-07-03 11:02:01', '2019-07-03 11:02:01'),
(34, 6, 1, NULL, '2019-07-03 12:35:00', '2019-07-03 12:35:00'),
(35, 6, 10, NULL, '2019-07-03 12:35:00', '2019-07-03 12:35:00'),
(36, 6, 11, NULL, '2019-07-03 12:35:00', '2019-07-03 12:35:00'),
(37, 18, 19, NULL, '2019-07-04 07:37:25', '2019-07-04 07:37:25'),
(38, 18, 20, NULL, '2019-07-04 07:37:25', '2019-07-04 07:37:25'),
(39, 1, 10, NULL, '2019-07-04 10:25:06', '2019-07-04 10:25:06'),
(40, 1, 12, NULL, '2019-07-04 10:25:06', '2019-07-04 10:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_teachers`
--

CREATE TABLE `subjects_teachers` (
  `id` int(10) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `subjects_teachers`
--

INSERT INTO `subjects_teachers` (`id`, `subject_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 6, 2, NULL, NULL),
(3, 6, 3, NULL, NULL),
(4, 15, 4, NULL, NULL),
(5, 18, 4, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(12, 6, 8, NULL, NULL),
(13, 7, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `address`, `image_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Mahmoud Osama Sayed', 'osama@gmail.com', '0255984566', 'Assuit', 5, 3, '2019-06-18 22:00:00', '2019-07-05 14:11:55'),
(2, 'Ahmed Abd El Moez', 'ahmed@gmail.com', '01100960900', 'Cairo', NULL, 2, '2019-07-03 15:07:33', '2019-07-03 15:07:33'),
(3, 'Khaled Nabawy Raouf', 'khalednabawy7@gmail.com', '01025695841', 'Fayoum, Egypt', 7, 3, '2019-07-03 15:20:57', '2019-07-05 15:25:44'),
(4, 'Ahmed Fathi', 'fathi@gmail.com', '0112256348', 'Helwan', NULL, 2, '2019-07-05 10:07:20', '2019-07-05 10:07:20'),
(8, 'Bahaa', 'bebo2@gmail.com', '02556985488', 'Cairo, Nasr City', 12, 3, '2019-07-05 18:32:22', '2019-07-05 18:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_students`
--

CREATE TABLE `teachers_students` (
  `id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `image_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ahmed Kidwany', 'ahmed@gmail.com', 1, NULL, NULL, '$2y$10$nKEdHs80k0y8iezFBtWVOODsFXlvxX4Y2ezYDY2f1HQ8hpFPTrdbO', 'nGU0JqPhFavmnnvHOlcZeKLRUfWYKc84om6cgNawNewDfCDELXSTRoiPiTPY', '2019-06-18 15:45:49', '2019-06-18 16:12:57'),
(3, 'Mohamed Kidwany', 'kidwany60@gmail.com', NULL, 3, NULL, '$2y$10$6L8cZIIfdAp1wUnCBw66j.08LOnj3DNfF/TpsiDx7wcM12Ee.KxyG', '919R7SePtHNFUdHnQrr74xQn9f4uEUZIEfm27cUrYwa5Am7mENkEz9lZMj3K', '2019-07-05 10:32:15', '2019-07-05 19:21:26'),
(5, 'Ayman Nano', 'ayman_nano@gmail.com', NULL, 2, NULL, '$2y$10$HyGLdHRv4ScI.PcINE3ZDu2ubc5qlreqXt.Jotgo2V1mbKVzVXoye', NULL, '2019-07-05 12:43:17', '2019-07-05 12:49:37'),
(6, 'Salem Sabry', 'sabry@gmail.com', NULL, 11, NULL, '$2y$10$xBU86E0QgfCFBPmNf/0FIuh40lQ7sVUwQ5Qnq16xvuiHlQ62JFDIm', NULL, '2019-07-05 18:29:26', '2019-07-05 18:29:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_created_by` (`created_by`),
  ADD KEY `class_grade_id` (`grade_id`);

--
-- Indexes for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teacher_id_pk` (`teacher_id`),
  ADD KEY `teacher_class_id_pk` (`class_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_created_by` (`created_by`),
  ADD KEY `grade_level_id` (`level_id`);

--
-- Indexes for table `grades_teachers`
--
ALTER TABLE `grades_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_teacher_id` (`teacher_id`),
  ADD KEY `teacher_grade_id_fk` (`grade_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_album_id` (`album_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_created_by` (`created_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logo_image_id` (`logo`),
  ADD KEY `thumb_image_id` (`thumb`),
  ADD KEY `favicon_image_id` (`favicon`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_created_by` (`created_by`),
  ADD KEY `student_class_id` (`class_id`),
  ADD KEY `student_grade_id` (`grade_id`),
  ADD KEY `student_level_id` (`level_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_created_by` (`created_by`);

--
-- Indexes for table `subjects_grades`
--
ALTER TABLE `subjects_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id_subjects` (`subject_id`),
  ADD KEY `grade_id_grades` (`grade_id`);

--
-- Indexes for table `subjects_teachers`
--
ALTER TABLE `subjects_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teacher_id` (`teacher_id`),
  ADD KEY `teacher_subject_id` (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_created_by_user` (`created_by`),
  ADD KEY `teacher_image_id` (`image_id`);

--
-- Indexes for table `teachers_students`
--
ALTER TABLE `teachers_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teacher_id` (`teacher_id`),
  ADD KEY `teacher_class_id` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_role_id` (`role_id`),
  ADD KEY `user_image_id` (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grades_teachers`
--
ALTER TABLE `grades_teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subjects_grades`
--
ALTER TABLE `subjects_grades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `subjects_teachers`
--
ALTER TABLE `subjects_teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers_students`
--
ALTER TABLE `teachers_students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `class_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `class_grade_id` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`);

--
-- Constraints for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  ADD CONSTRAINT `class_teacher_id_pk` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_class_id_pk` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grade_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `grade_level_id` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `grades_teachers`
--
ALTER TABLE `grades_teachers`
  ADD CONSTRAINT `grade_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_grade_id_fk` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `level_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `setting`
--
ALTER TABLE `setting`
  ADD CONSTRAINT `favicon_image_id` FOREIGN KEY (`favicon`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `logo_image_id` FOREIGN KEY (`logo`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `thumb_image_id` FOREIGN KEY (`thumb`) REFERENCES `images` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_class_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `student_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_grade_id` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `student_level_id` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `subjects_grades`
--
ALTER TABLE `subjects_grades`
  ADD CONSTRAINT `grade_id_grades` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_id_subjects` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects_teachers`
--
ALTER TABLE `subjects_teachers`
  ADD CONSTRAINT `subject_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teacher_created_by_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `teacher_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers_students`
--
ALTER TABLE `teachers_students`
  ADD CONSTRAINT `class_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_class_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
