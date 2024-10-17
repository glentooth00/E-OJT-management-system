-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2024 at 12:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_ojt_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin User', 'admin@gmail.com', '2024-04-18 23:17:39', '$2y$12$8LSeWPAHzu4cgkX4nq5fTuj3M7UGAX37pSXvHohAwWwHOwJERltsC', 'FVpVBdQbzGBlmASeNqym1dCHoVSKtjmcMtziFUE2BVSeh7LTrRPVMBqQf2Xv', '2024-04-18 23:17:39', '2024-04-18 23:17:39', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint UNSIGNED NOT NULL,
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_supervisor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `agency_name`, `agency_email`, `agency_contact`, `agency_supervisor`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DSWD', 'dswd@gmail.com', '0912019212', 'MR.Supervisor', 'Active', '2024-09-20 18:15:14', '2024-09-20 18:15:14'),
(2, 'MDRRMO', 'MDRRMO@gmail.com', '092992929', 'Mr.MDRRMO', 'Active', '2024-09-20 18:25:21', '2024-09-20 18:25:21'),
(3, 'Mayors Office', 'mayors@gmai.com', '1012920192', 'Mr.Mayor', 'Active', '2024-09-20 21:53:33', '2024-09-20 21:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `category_name`) VALUES
(1, '2024-04-21 08:34:48', '2024-04-21 08:34:48', 'Bank'),
(2, '2024-04-21 09:00:49', '2024-04-21 09:00:49', 'Municipal Hall'),
(3, '2024-04-21 09:00:57', '2024-04-21 09:00:57', 'Hospital'),
(4, '2024-04-22 19:30:53', '2024-04-22 19:30:53', 'Resturant'),
(5, '2024-04-23 16:09:33', '2024-04-23 16:09:33', 'bank 2');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_initials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `course_code`, `course_initials`, `created_at`, `updated_at`) VALUES
(7, 'Bachelor of Science in Information Technology(major in: Web & Mobile Dev\'t. & Network and Security)', 'BSIT', 'BSIT', '2024-09-22 22:55:18', '2024-09-22 22:55:18'),
(8, 'Bachelor of Science in Information Technology(major in: Web & Mobile Dev\'t. & Network and Security)', 'BSCS', 'BSCS', '2024-09-22 22:55:26', '2024-09-22 22:55:26'),
(9, 'Bachelor of Elementary Education', 'BSED', 'BSED', '2024-09-22 22:59:11', '2024-09-22 22:59:11'),
(10, 'tesrt7tygbuhyijnh', 'tesrt7tygbuhyijnh', 'tesrt7tygbuhyijnh', '2024-10-12 00:02:42', '2024-10-12 00:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'CICS', '2024-09-24 21:22:51', '2024-09-24 21:22:51'),
(2, 'CICS', '2024-09-24 21:23:55', '2024-09-24 21:23:55'),
(3, 'TEST', '2024-09-24 21:24:40', '2024-09-24 21:24:40'),
(4, 'Information Technology Department', '2024-10-12 00:03:39', '2024-10-12 00:03:39'),
(5, 'Computer science Department', '2024-10-12 00:03:59', '2024-10-12 00:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `department_heads`
--

CREATE TABLE `department_heads` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_heads`
--

INSERT INTO `department_heads` (`id`, `created_at`, `updated_at`, `first_name`, `middle_name`, `last_name`, `role`, `email`, `password`, `status`, `department`, `course`) VALUES
(3, '2024-04-22 17:20:10', '2024-04-22 17:20:10', 'John', 'A.', 'Doe', 'Department head', 'admin@gmail.com', '$2y$12$Zai48NAE2ZFydnuGwHnYKuH0hkSksspUihW.sLyVXQN7FSkYhaKma', 'active', '', NULL),
(12, '2024-10-16 00:31:53', '2024-10-16 00:31:53', 'Jenny Rose', NULL, 'Wenceslao', NULL, 'BSIT@gmail.com', '$2y$12$wbn7cCLTojRxkORLFCITQePoBmOgGcaVljWNzDd67UG7D6Az1PQJ.', NULL, 'IICS', 'BSIT'),
(13, '2024-10-16 00:35:38', '2024-10-16 00:35:38', 'Arnold', NULL, 'Banes', NULL, 'BSCS@gmail.com', '$2y$12$h/Hrooft6KfYUI9LJ0RTTuy2EDj/UB6.qcvZbIkkABuJsOG8nuvza', NULL, 'IICS', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `good_moral` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `student_id`, `studentName`, `letter`, `good_moral`, `consent`, `created_at`, `updated_at`, `remarks`) VALUES
(1, '63', 'Juan Dela Cruz', 'student_documents/IAYvC2wMWNtCk5KDPI98c4TUY9aLFSazwlMBHZRt.png', 'student_documents/Bt8R33MCqkGjAkz4BWzMje0QwM6PR5KtHNohExtN.png', 'student_documents/uLKwvCjtRgqdMYgIqzS9lYuZRxKozd1D5K1M8r0D.png', '2024-05-27 17:55:14', '2024-05-27 17:55:14', 'TEST'),
(2, '65', 'John Doeeeee', 'student_documents/gKrCEFXM1nWYAFlHjh2ewGs1vtHYgk11E9cR8V43.jpg', 'student_documents/gq28YgQq9KY2zKO0aLzngZskT80n4EuqvOW61sBL.jpg', 'student_documents/qMZ8vEmesEL8tg4WhS6R1TnxjK85bi0UuwKwazc4.jpg', '2024-09-21 13:22:07', '2024-09-21 13:22:07', 'DOCUMENTS'),
(3, '69', 'Xavier', 'student_documents/Vx6CrsW0MTKW0toq5eJl1OD6CVdieiMZ36UYXPAs.jpg', 'student_documents/XNjPA580xRZJeh907nyFPPcoFXyoonORbrIYpP8E.jpg', 'student_documents/YpW75izsgbDAySvz4fS8tkh9nTGSXCBDxJqDqZPa.jpg', '2024-09-25 21:54:35', '2024-09-25 21:54:35', 'Xaviers documents'),
(4, '74', 'john Wick', 'student_documents/0WHU2j23WsjUYVZnv9qMzIQLGDSSVXN9rIIB6iyx.png', 'student_documents/OJZ229SaH4fFAv6Uzi9S467yZpbvApeYcBsrcKiL.jpg', 'student_documents/nvMb3InkD3okCCZYKnsrcyKb0r8Rj5F3pFK4OSsX.jpg', '2024-10-15 23:49:42', '2024-10-15 23:49:42', 'sddAFFSDF');

-- --------------------------------------------------------

--
-- Table structure for table `endorsement_letters`
--

CREATE TABLE `endorsement_letters` (
  `id` bigint UNSIGNED NOT NULL,
  `letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `endorsement_letters`
--

INSERT INTO `endorsement_letters` (`id`, `letter`, `letter_course`, `letter_status`, `created_at`, `updated_at`) VALUES
(1, 'storage/letter/qZHd7XXu67AbmlNMS47FWNkvNxGpB8248LVXkVGK.jpg', 'TEST', 'Active', '2024-09-23 18:49:08', '2024-09-23 18:49:08'),
(2, 'storage/letter/qsVSHSj4XWQ2mydX30Nh7GLLpFQus4mXhZ6INcid.jpg', 'BSIT', 'Active', '2024-09-23 19:09:39', '2024-09-23 19:09:39'),
(3, 'storage/letter/RbhvqrWXI3DR0uq5fLjl4BDepvbIBvszXceQG1ib.jpg', 'BSCS', 'Active', '2024-09-23 19:10:14', '2024-09-23 19:10:14'),
(4, 'storage/letter/w7xV767G8w07amTsCjYooTDsdTdMt9Vdegw9IETh.png', 'BSENG', 'Active', '2024-09-24 08:43:16', '2024-09-24 08:43:16'),
(5, 'storage/letter/WAhMTD0LuvRnRxNEv68wap3zgzYUE9D1MlATbvdS.jpg', 'BSSED', 'Active', '2024-09-24 08:44:34', '2024-09-24 08:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_points` decimal(5,2) NOT NULL DEFAULT '0.00',
  `comments` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_criteria`
--

CREATE TABLE `evaluation_criteria` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_scores`
--

CREATE TABLE `evaluation_scores` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluation_id` bigint UNSIGNED NOT NULL,
  `criterion_id` bigint UNSIGNED NOT NULL,
  `score` decimal(3,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `week_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in` text COLLATE utf8mb4_unicode_ci,
  `time_out` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_hours` int DEFAULT NULL,
  `activities` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studentId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `date`, `week_no`, `time_in`, `time_out`, `no_of_hours`, `activities`, `created_at`, `updated_at`, `status`, `attendance`, `student`, `designation`, `studentId`) VALUES
(40, '2024-10-12', '1', '3:53 PM', '3:57 PM', 7, 'test222252', '2024-10-11 23:53:51', '2024-10-24 23:57:03', 'Logged-Out', 'out', 'john Wick', 'MDRRMO', '74'),
(41, '2024-10-25', '1', '3:57 PM', '2:53 PM', 2, 'l;knm[lkmlkjkioj63636', '2024-10-24 23:57:06', '2024-10-15 22:53:25', 'Logged-Out', 'out', 'john Wick', 'MDRRMO', '74');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_17_173008_create_students_table', 1),
(6, '2024_04_17_173341_add_username_password_to_users_table', 2),
(7, '2024_04_19_070852_create_admins_table', 3),
(8, '2024_04_19_071235_create_admins_table', 4),
(9, '2024_04_19_072356_create_students_table', 5),
(10, '2014_10_12_100000_create_password_resets_table', 6),
(11, '2024_04_19_073145_create_department_heads_table', 6),
(12, '2024_04_21_052615_add_status_and_user_type_to_users_table', 6),
(13, '2024_04_21_071123_create_students_table', 7),
(14, '2024_04_21_125526_add_id_number_to_students_table', 8),
(15, '2024_04_21_130144_add_application_status_to_students_table', 9),
(16, '2024_04_21_152309_add_role_to_students_table', 10),
(17, '2024_04_21_152439_add_role_columm_to__admins_table', 11),
(18, '2024_04_21_160907_create_categories_table', 12),
(19, '2024_04_21_161027_add_category_column_in_categories_table', 13),
(20, '2024_04_23_011615_add_columns_in_department_head_table', 14),
(21, '2024_04_23_215302_create_weekly_reports_table', 15),
(22, '2024_04_23_220052_add_file_path_column_in_weekly_reports_table', 16),
(23, '2024_04_23_220257_add_column_in_weekly_reports', 17),
(24, '2024_05_13_195909_create_accounts_table', 18),
(25, '2024_05_13_202438_add_department_column_in_department_heads_table', 18),
(26, '2024_05_13_202921_create_supervisors_table', 19),
(27, '2024_05_15_023231_add_email_column_in_supervisors_table', 20),
(28, '2024_05_15_024110_add_password_column_in_supervisors_table', 21),
(29, '2024_05_22_162434_update_photos_column_in_weekly_reports_table', 22),
(30, '2024_05_22_171354_create_archives_table', 22),
(31, '2024_05_23_032311_add_school_year_column_in_students_table', 22),
(32, '2024_05_23_033205_create_schoolyears_table', 23),
(33, '2024_05_24_054821_add_studentname_column_in_weekly_report_table', 24),
(34, '2024_05_27_015716_create_eveluations_table', 25),
(35, '2024_05_27_032614_add_designation_column_in_students_table', 25),
(36, '2024_05_28_011732_create_documents_table', 26),
(37, '2024_05_28_013256_add_remarks_column_in_documents_table', 27),
(38, '2024_09_20_170917_create_questionaires_table', 28),
(39, '2024_09_20_173835_create_questionnaires_table', 29),
(40, '2024_09_20_190740_add_type_column_in_questionnaire_table', 30),
(41, '2024_09_20_192214_create_evaluations_table', 31),
(42, '2024_09_20_202222_evaluation', 32),
(43, '2024_09_20_203624_add_columns_in_evaluation_table', 33),
(44, '2024_09_20_210458_add_status_column_to_questionnaires_table', 34),
(45, '2024_09_21_004250_create_agencies_table', 35),
(46, '2024_09_21_213006_create_evaluations_table', 36),
(47, '2024_09_21_213051_create_evaluation_criteria_table', 36),
(48, '2024_09_21_213106_create_evaluation_scores_table', 36),
(49, '2024_09_23_005913_add_moa_column_students_table', 37),
(50, '2024_09_23_031006_create_moas_table', 38),
(51, '2024_09_23_033927_add_moa_file_column_in_moas_table', 39),
(52, '2024_09_23_055305_create_courses_table', 40),
(53, '2024_09_23_060114_add_course_initials_column_in_course_table', 41),
(54, '2024_09_24_020040_create_endorsement_letters_table', 42),
(55, '2024_09_24_031710_add_endorsement_column_in_students_table', 43),
(56, '2024_09_25_041116_create_departments_table', 44),
(57, '2024_09_26_032617_add_year_level_in_students_table', 45),
(58, '2024_09_26_032941_create_year_levels_table', 46),
(59, '2024_09_27_062438_add_status_to_weekly_reports_table', 47),
(60, '2024_09_27_063925_create_activity_logs_table', 48),
(61, '2024_09_28_194013_add_date_registered_column_in_students_table', 48),
(62, '2024_10_01_151251_add_day_column_in_weekly_reports', 49),
(63, '2024_10_01_151504_add_day_no_in_weekly_reports', 50),
(64, '2024_10_07_062415_create_experiences_table', 51),
(65, '2024_10_07_071527_add_column_in_experiences_table', 52),
(66, '2024_10_07_071833_move_column_time_out', 53),
(67, '2024_10_07_072148_add_status_column_in_experience_table', 54),
(68, '2024_10_07_080239_add_columns_in_table', 55),
(69, '2024_10_08_032024_add_week_no_column', 56),
(70, '2024_10_10_033341_add_column_in_table', 57),
(71, '2024_10_11_041142_add_designation_column_in_experience_table', 58),
(72, '2024_10_12_081421_add_course_column_in_department_head_table', 59);

-- --------------------------------------------------------

--
-- Table structure for table `moas`
--

CREATE TABLE `moas` (
  `id` bigint UNSIGNED NOT NULL,
  `moa_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moa_course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moa_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moa_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moas`
--

INSERT INTO `moas` (`id`, `moa_name`, `moa`, `moa_course`, `moa_status`, `moa_file`, `created_at`, `updated_at`) VALUES
(1, 'CS MOA', NULL, 'COMSCIE', 'Active', 'storage/moa/1727062846_SAMPLE_MOA.png', '2024-09-22 19:40:46', '2024-09-22 19:40:46'),
(2, 'IT MOA', NULL, 'BSIT', 'Active', 'storage/moa/1727069603_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0001.jpg', '2024-09-22 21:33:23', '2024-09-22 21:33:23'),
(3, 'BSED MOA', NULL, 'Education MOA', 'Active', 'storage/moa/1727069668_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0002.jpg', '2024-09-22 21:34:28', '2024-09-22 21:34:28'),
(4, 'BSENG MOA', NULL, 'Civil Eng.', 'Active', 'storage/moa/1727070436_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0001.jpg', '2024-09-22 21:47:16', '2024-09-22 21:47:16'),
(5, 'TEST', NULL, 'TEST', 'Active', 'storage/moa/1727070458_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0001.jpg', '2024-09-22 21:47:38', '2024-09-22 21:47:38'),
(6, 'BSED MOA', NULL, 'BSED', 'Active', 'storage/moa/1727083839_sampleMOA.png', '2024-09-23 01:30:39', '2024-09-23 01:30:39');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` bigint UNSIGNED NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `points`, `question`, `type`, `status`, `created_at`, `updated_at`) VALUES
(10, '1', 'Always Absent', 'Attendance', '0', '2024-09-20 11:11:32', '2024-09-22 22:26:44'),
(11, '0.8', 'Absent Occasionally', 'Attendance', '0', '2024-09-20 11:12:06', '2024-09-22 22:26:46'),
(12, '1', 'Attending regularly', 'Attendance', '0', '2024-09-20 11:12:25', '2024-09-22 22:26:48'),
(13, '0.6', 'Late frequently', 'Punctuality', '1', '2024-09-20 11:13:06', '2024-09-20 22:48:06'),
(14, '0.8', 'Late Occasionally', 'Punctuality', '1', '2024-09-20 11:13:21', '2024-09-20 22:48:39'),
(15, '1', 'Report to work on time', 'Punctuality', '1', '2024-09-20 11:14:00', '2024-09-20 22:48:41'),
(16, '0.6', 'Never goes beyond minimum duty', 'Initiative', '1', '2024-09-20 11:14:19', '2024-09-22 13:34:13'),
(17, '0.8', 'Occasionally initiate action', 'Initiative', '0', '2024-09-20 11:14:43', '2024-09-20 22:43:35'),
(18, '1', 'Self-starter of good ideas', 'Initiative', '0', '2024-09-20 11:15:07', '2024-09-20 22:43:37'),
(19, '0.6', 'Requires constant supervision', 'Ability to Plan Activities', '0', '2024-09-20 11:15:34', '2024-09-20 22:43:39'),
(20, '0.8', 'Follows work plans effectively', 'Ability to Plan Activities', '0', '2024-09-20 11:15:53', '2024-09-20 11:15:53'),
(21, '1', 'Handles work well', 'Ability to Plan Activities', '0', '2024-09-20 11:16:05', '2024-09-20 11:16:05'),
(22, '0.6', 'Does not cooparate', 'Cooperation', '0', '2024-09-20 11:16:25', '2024-09-20 11:16:25'),
(23, '0.8', 'Works well with others', 'Cooperation', '0', '2024-09-20 11:16:42', '2024-09-20 11:16:42'),
(24, '1', 'Sets good example in teamwork', 'Cooperation', '0', '2024-09-20 11:17:05', '2024-09-20 11:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyears`
--

CREATE TABLE `schoolyears` (
  `id` bigint UNSIGNED NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolyears`
--

INSERT INTO `schoolyears` (`id`, `school_year`, `created_at`, `updated_at`) VALUES
(9, '2024-2028', '2024-05-26 16:59:17', '2024-05-26 16:59:17'),
(10, '2028-2031', '2024-09-22 16:28:29', '2024-09-22 16:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_registered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endorsement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `id_attachment`, `password`, `email`, `course`, `year_level`, `department`, `address`, `contact_number`, `dob`, `sex`, `created_at`, `updated_at`, `id_number`, `application_status`, `date_registered`, `moa`, `endorsement`, `role`, `school_year`, `designation`) VALUES
(67, 'Glen Donn Alpasan', 'id_attachments/id-photo2.jpg', '$2y$12$TajeYCxa.0GwnEwXWPsc6O6brS3B1dT6G/cY.Sz/1J8aewhrAaZEa', 'glen@gmail.com', 'BSIT', NULL, 'CICS', 'Brgy Bayuyan Estancia Iloilo', '09770682947', '2024-12-06', 'MALE', '2024-09-23 13:28:36', '2024-09-28 12:37:10', '12-121212121212', 'registered', '2024-09-29 03:45:29', 'storage/moa/1727069603_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0001.jpg', 'storage/letter/WAhMTD0LuvRnRxNEv68wap3zgzYUE9D1MlATbvdS.jpg', 'student', '2024-2028', 'Mayors Office'),
(69, 'Xavier', 'id_attachments/images.jpeg', '$2y$12$5OvvzdYW8hyMfmRP7dcfq.EZ4dWFgaBwsFcR.TOu6z3IR0B1mqt56', 'xavier@gmail.com', 'BSIT', NULL, 'CICS', 'Brgy Bayuyan Estancia Iloilo', '09770682947', '2024-09-25', 'MALE', '2024-09-25 19:05:33', '2024-09-28 12:37:16', '90-112222222', 'registered', '2024-09-16 03:45:29', 'storage/moa/1727069603_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0001.jpg', 'storage/letter/qsVSHSj4XWQ2mydX30Nh7GLLpFQus4mXhZ6INcid.jpg', 'student', '2024-2028', 'DSWD'),
(70, 'layla De lima', 'id_attachments/images (2).jpeg', '$2y$12$jWCMhaVs5sM8g8kaq/LTN.KQYg7Rsgvvd08Me7TkI3zy3X/dscjp6', 'layla@gmail.com', 'BSIT', NULL, 'CICS', 'Brgy Bayuyan Estancia Iloilo', '09770682947', '2024-09-25', 'FEMALE', '2024-09-25 20:13:09', '2024-09-28 12:37:19', '11-21229331', 'registered', '2024-09-04 03:45:29', 'storage/moa/1727069603_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0001.jpg', 'storage/letter/qsVSHSj4XWQ2mydX30Nh7GLLpFQus4mXhZ6INcid.jpg', 'student', '2024-2028', 'MDRRMO'),
(71, 'napoles', 'id_attachments/napoles.jpg', '$2y$12$41no9vUJpPUbjZ4Q3qZnYOUw6ENUjdpTgflmNmcmAefLD73DCWB5m', 'napoles@gmail.com', 'BSCS', NULL, 'CICS', 'Brgy Bayuyan Estancia Iloilo', '09770682947', '2024-09-03', 'FEMALE', '2024-09-25 20:13:42', '2024-09-28 12:37:23', '90-1222-21222', 'registered', '2024-09-21 03:45:29', 'storage/moa/1727069668_ilide.info-4-memorandum-agreement-pr_1d5069fb6e43c59ad3f1475293ffdce1_page-0002.jpg', 'storage/letter/qsVSHSj4XWQ2mydX30Nh7GLLpFQus4mXhZ6INcid.jpg', 'student', '2024-2028', 'DSWD'),
(72, 'MArlou', 'id_attachments/xander-ford-mug-shot.jpg', '$2y$12$yvahqLva1xlwX2SbtEyGbeC6T6uYxmkF68Y2wN1mvwsd/c3bJSgtC', 'marlou@gmail.com', 'BSED', NULL, 'CICS', 'Brgy Bayuyan Estancia Iloilo', '09770682947', '2024-09-10', 'MALE', '2024-09-25 20:14:16', '2024-09-28 12:37:28', '11-2122933122', 'registered', '2024-09-01 03:45:29', 'storage/moa/1727083839_sampleMOA.png', 'storage/letter/qsVSHSj4XWQ2mydX30Nh7GLLpFQus4mXhZ6INcid.jpg', 'student', '2024-2028', 'DSWD'),
(74, 'john Wick', 'id_attachments/john_wick_portrait_dynamic_grunge_watercolor_6936654.jpg', '$2y$12$MGsK8iXpsW6u5849Pruww.bRYHapZWRrAYQ1ATcfa9Wmxjd9MwbV.', 'wick@gmail.com', 'BSCS', '4th yr A', 'CICS', 'Brgy Bayuyan Estancia Iloilo', '09770682947', '2024-09-23', 'MALE', '2024-09-28 12:32:33', '2024-09-28 12:33:16', '8924573623408956', 'registered', '2024-09-29 04:32:49', 'storage/moa/1727062846_SAMPLE_MOA.png', 'storage/letter/RbhvqrWXI3DR0uq5fLjl4BDepvbIBvszXceQG1ib.jpg', 'student', '2024-2028', 'MDRRMO'),
(75, 'juan juan', 'id_attachments/john_wick_portrait_dynamic_grunge_watercolor_6936654.jpg', '$2y$12$x8u18ebTdJSAiwv5OTDT4O7rRNOcncAr9w.puE3NIfrc0v7WncA2m', 'juanita@gmail.com', 'BSCS', '3rd yr C', 'CICS', 'fasdfadfadsfasdfasdfasdf', '09770682947', '2024-09-30', 'MALE', '2024-09-30 13:42:26', '2024-09-30 13:43:13', '1212121212121', 'registered', '2024-10-01 05:42:49', 'storage/moa/1727062846_SAMPLE_MOA.png', 'storage/letter/RbhvqrWXI3DR0uq5fLjl4BDepvbIBvszXceQG1ib.jpg', 'student', '2024-2028', 'MDRRMO'),
(76, 'Glen Donn Alpasan', NULL, '$2y$12$ZBjOCFIsAwn4R.TQU.wtPeju3Pi.h62RtiFJy2cP786hgtKc6s0vm', 'glendonn@gmail.com', 'BSIT', '2nd yr C', 'CICS', 'Brgy Bayuyan Estancia Iloilo', '09770682947', '2024-10-09', 'MALE', '2024-10-09 17:24:07', '2024-10-09 21:52:36', '11-21229331', 'registered', NULL, 'storage/moa/1727062846_SAMPLE_MOA.png', NULL, 'student', '2024-2028', 'DSWD');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `first_name`, `middle_name`, `last_name`, `office`, `category`, `created_at`, `updated_at`, `email`, `password`) VALUES
(1, 'TEST', 'TEST', 'TEST', 'TEST', 'Municipal Hall', '2024-05-14 18:53:22', '2024-05-14 18:53:22', 'TEST@gmail.com', '$2y$12$V5zCOnDesYE9bez5ItpOYOuw3dhbs/5NfjOfQkSmwcGkDdSJ.BYJy'),
(2, 'TEST2', 'TEST2', 'TEST2', 'TEST2', 'Bank', '2024-05-14 19:33:08', '2024-05-14 19:33:08', 'TEST2@gmail.com', '$2y$12$/zRzsIM2Swxu4zPV1XCgJuDpgnU0g/aFbE//8sJtF52/UAy5gEnvW'),
(3, 'Juan', 'Dela', 'Cruz', 'DSWD', 'Municipal Hall', '2024-05-23 17:54:46', '2024-05-23 17:54:46', 'admin@gmail.com', '$2y$12$OE1dHcT6zhpGE1MAIC03eO1Y7vlrFE7jwkgVLt9tghU/2y6eZArEq'),
(4, 'Agency', 'Agencvy', 'Agency', 'MDRRMO', 'Municipal Hall', '2024-09-20 16:47:57', '2024-09-20 16:47:57', 'agency@gmail.com', '$2y$12$MmCWhhM8IUer3O.UKFxLCOjRSRgoZRkzInwpODd/THcf9gMkzzFrS'),
(5, 'Glen Donn', 'Bayhon', 'Alpasan', 'Mayors Office', 'Municipal Hall', '2024-09-20 21:57:25', '2024-09-20 21:57:25', 'mayor@gmail.com', '$2y$12$jyVSJejfNwGMEUbK14STaeBtNwYQ0Z68Vk6VxljrV2UP2h5Y99zXO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `role`) VALUES
(1, 'Admin User', 'admin@gmail.com', '2024-04-20 21:45:34', '$2y$12$XfbByaZ0lZODYiw4MfebseYlJ698mdV0XpfeOb3ghnFbLXltkCEWi', 'cVu32lCjMt', '2024-04-20 21:45:34', '2024-04-20 21:45:34', '1', 'Admin'),
(2, 'Student user', 'student@gmail.com', '2024-04-20 21:46:16', '$2y$12$lssG00F423nj0A19g.qrqeP8E1GYwJ5ngQujT3Iu1KlRNRONdXWqu', '6cNLzCMANk', '2024-04-20 21:46:16', '2024-04-20 21:46:16', '1', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_reports`
--

CREATE TABLE `weekly_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_number` int DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_no` int DEFAULT NULL,
  `photos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekly_reports`
--

INSERT INTO `weekly_reports` (`id`, `student_id`, `week_number`, `day`, `day_no`, `photos`, `created_at`, `updated_at`, `file_path`, `activity_description`, `status`, `studentname`) VALUES
(216, '74', 2, 'Monday', 1, NULL, '2024-10-15 23:41:55', '2024-10-15 23:43:09', 'activity_photos/1729064515_NISU_sign.jpg', 'TEST', 'Approved', 'john Wick'),
(217, '74', 2, 'Monday', 1, NULL, '2024-10-15 23:41:55', '2024-10-15 23:43:09', 'activity_photos/1729064515_AAAABUI4RrOFewQCOF_c08YV5C095954HMgpL2X8OrXig7JDX8XqWqky5kArdworjSTpKZuUrrXpApNwp-4uovF4NiatQMn-0oO6sw.png', 'TEST', 'Approved', 'john Wick'),
(218, '74', 2, 'Monday', 1, NULL, '2024-10-15 23:41:55', '2024-10-15 23:43:09', 'activity_photos/1729064515_AAAABYbdfggp3sDnDL8-6_1l2nVcBlaGBIrqan9YncHNLYTrE84p3vfGXG8j7L5QTGVqGZDDNOSEttBn8hxY-0JbVRPpGzmZgnauzg.png', 'TEST', 'Approved', 'john Wick'),
(219, '74', 2, 'Monday', 1, NULL, '2024-10-15 23:41:55', '2024-10-15 23:43:09', 'activity_photos/1729064515_AAAABexmOgsezvs4hbuL-Uizs9K37Xl53i6izIJJnFH2ejNo-cxD5NjaeVG1zk-8UREXqW6EddhLifr5Hi94BkIY9GN75EAHXN0GHA.png', 'TEST', 'Approved', 'john Wick'),
(220, '74', 2, 'Tuesday', 2, NULL, '2024-10-15 23:45:31', '2024-10-15 23:46:14', 'activity_photos/1729064731_salford___co.-removebg-preview.png', 'for day 2', 'Approved', 'john Wick'),
(221, '74', 2, 'Tuesday', 2, NULL, '2024-10-15 23:45:31', '2024-10-15 23:46:14', 'activity_photos/1729064731_salford & co..png', 'for day 2', 'Approved', 'john Wick'),
(222, '74', 2, 'Tuesday', 2, NULL, '2024-10-15 23:45:31', '2024-10-15 23:46:14', 'activity_photos/1729064731_1723055763547.gif', 'for day 2', 'Approved', 'john Wick'),
(223, '74', 2, 'Wednesday', 3, NULL, '2024-10-15 23:52:56', '2024-10-15 23:53:36', 'activity_photos/1729065176_NISU_sign.jpg', 'WEEK 2 DAY 3', 'Approved', 'john Wick'),
(224, '74', 2, 'Wednesday', 3, NULL, '2024-10-15 23:52:56', '2024-10-15 23:53:36', 'activity_photos/1729065176_422299465_761003559382340_5207540865979360793_n.jpg', 'WEEK 2 DAY 3', 'Approved', 'john Wick'),
(225, '74', 2, 'Wednesday', 3, NULL, '2024-10-15 23:52:56', '2024-10-15 23:53:36', 'activity_photos/1729065176_form updaet.png', 'WEEK 2 DAY 3', 'Approved', 'john Wick');

-- --------------------------------------------------------

--
-- Table structure for table `year_levels`
--

CREATE TABLE `year_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `year_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `year_levels`
--

INSERT INTO `year_levels` (`id`, `year_level`, `section`, `course`, `created_at`, `updated_at`) VALUES
(7, '1st yr', 'A', 'BSIT', '2024-09-25 20:02:35', '2024-09-25 20:02:35'),
(8, '2nd yr', 'A', NULL, '2024-09-25 20:04:30', '2024-09-25 20:04:30'),
(9, '3rd yr', 'A', NULL, '2024-09-25 20:05:00', '2024-09-25 20:05:00'),
(10, '4th yr', 'A', NULL, '2024-09-25 20:05:10', '2024-09-25 20:05:10'),
(11, '1st yr', 'B', NULL, '2024-09-25 20:05:21', '2024-09-25 20:05:21'),
(12, '2nd yr', 'B', NULL, '2024-09-25 20:05:31', '2024-09-25 20:05:31'),
(13, '3rd yr', 'B', NULL, '2024-09-25 20:05:55', '2024-09-25 20:05:55'),
(14, '4th yr', 'B', NULL, '2024-09-25 20:06:02', '2024-09-25 20:06:02'),
(15, '1st yr', 'C', NULL, '2024-09-25 20:06:19', '2024-09-25 20:06:19'),
(16, '2nd yr', 'C', NULL, '2024-09-25 20:06:26', '2024-09-25 20:06:26'),
(17, '3rd yr', 'C', NULL, '2024-09-25 20:06:32', '2024-09-25 20:06:32'),
(18, '4th yr', 'C', NULL, '2024-09-25 20:06:42', '2024-09-25 20:06:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_heads`
--
ALTER TABLE `department_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endorsement_letters`
--
ALTER TABLE `endorsement_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_student_id_foreign` (`student_id`);

--
-- Indexes for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_scores`
--
ALTER TABLE `evaluation_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_scores_evaluation_id_foreign` (`evaluation_id`),
  ADD KEY `evaluation_scores_criterion_id_foreign` (`criterion_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
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
-- Indexes for table `moas`
--
ALTER TABLE `moas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolyears`
--
ALTER TABLE `schoolyears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weekly_reports`
--
ALTER TABLE `weekly_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_levels`
--
ALTER TABLE `year_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_heads`
--
ALTER TABLE `department_heads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `endorsement_letters`
--
ALTER TABLE `endorsement_letters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_scores`
--
ALTER TABLE `evaluation_scores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `moas`
--
ALTER TABLE `moas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `schoolyears`
--
ALTER TABLE `schoolyears`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weekly_reports`
--
ALTER TABLE `weekly_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `year_levels`
--
ALTER TABLE `year_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluation_scores`
--
ALTER TABLE `evaluation_scores`
  ADD CONSTRAINT `evaluation_scores_criterion_id_foreign` FOREIGN KEY (`criterion_id`) REFERENCES `evaluation_criteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_scores_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
