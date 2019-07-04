-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 05:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_ar`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) NOT NULL,
  `grade_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade_name`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, 'الصف الأول الإبتدائي', 1, '2019-06-18 22:00:00', '2019-06-18 22:00:00'),
(8, 'الصف الثاني الإبتدائي', 10, '2019-06-29 20:44:49', '2019-06-29 20:44:49'),
(9, 'الصف الثالث الإبتدائي', 11, '2019-06-29 22:06:55', '2019-07-03 13:29:03'),
(10, 'الصف الرابع الإبتدائي', 12, '2019-06-29 22:08:16', '2019-06-29 22:08:16'),
(11, 'الصف الخامس الإبتدائي', 13, '2019-06-29 22:08:36', '2019-06-29 22:08:36'),
(12, 'الصف السادس الإبتدائي', 14, '2019-06-29 22:09:18', '2019-06-29 22:09:18'),
(13, 'الصف الأول الإعدادي', 15, '2019-06-29 22:09:40', '2019-06-29 22:09:40'),
(14, 'الصف الثاني الإعدادي', 16, '2019-07-04 07:30:45', '2019-07-04 07:30:45'),
(15, 'الصف الثالث الإعدادي', 17, '2019-07-04 07:31:15', '2019-07-04 07:31:15'),
(16, 'الصف الأول الثانوي', 18, '2019-07-04 07:31:40', '2019-07-04 07:31:40'),
(17, 'الصف الثاني الثانوي', 19, '2019-07-04 07:32:00', '2019-07-04 07:32:00'),
(18, 'الصف الثالث الثانوي', 20, '2019-07-04 07:32:20', '2019-07-04 07:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) NOT NULL,
  `level_id` int(10) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'المرحلة الإبتدائية', '2019-06-18 22:00:00', '2019-06-29 22:04:05'),
(3, 3, 'المرحلة الإعدادية', '2019-06-29 22:05:48', '2019-06-29 22:05:48'),
(4, 4, 'المرحلة الثانوية', '2019-06-29 22:06:13', '2019-06-29 22:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'لغة عربيية', '2019-06-25 22:00:00', '2019-07-04 10:26:00'),
(2, 6, 'لغة انجليزيية', '2019-06-30 17:42:58', '2019-07-03 12:34:59'),
(3, 7, 'لغة فرنسية', '2019-06-30 17:44:47', '2019-07-03 11:04:01'),
(4, 8, 'رياضييات', '2019-06-30 17:59:00', '2019-06-30 17:59:00'),
(5, 9, 'جغرافيا', '2019-06-30 18:01:04', '2019-06-30 18:01:04'),
(10, 14, 'تاريخ', '2019-06-30 18:13:43', '2019-07-03 10:17:06'),
(11, 15, 'تربية رياضية', '2019-07-03 07:57:12', '2019-07-03 09:43:37'),
(14, 18, 'الفلسفة', '2019-07-04 07:37:25', '2019-07-04 07:37:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garde_name_ar_id` (`grade_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_name_ar_id` (`level_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_ar_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `garde_name_ar_id` FOREIGN KEY (`grade_id`) REFERENCES `school`.`grades` (`id`);

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `level_name_ar_id` FOREIGN KEY (`level_id`) REFERENCES `school`.`levels` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_ar_id` FOREIGN KEY (`subject_id`) REFERENCES `school`.`subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
