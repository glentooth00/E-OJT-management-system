-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2025 at 09:25 AM
-- Server version: 8.4.3
-- PHP Version: 8.2.10

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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `firstname`, `middlename`, `lastname`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin User', 'admin123', NULL, NULL, NULL, '2024-11-12 07:53:01', '$2y$12$j8rVJb/cN4ET4U3yMhuixuujPi0m3VjhuUPZeV6K3EWL7cpKgOBEO', 'JIXCwQsleccJcqrzybpJps4L1kB60zwCnITn9bsjxTXdVsORA1LMg77yiIKz', '2024-11-12 07:53:01', '2024-11-12 07:53:01', 'admin'),
(2, 'Taylor Kennedy Franks Cooke', 'ArnoldB', 'Taylor', 'Kennedy Franks', 'Cooke', NULL, '$2y$12$G.padwvrWar9xwSOCddCCeH.2yXKGrvdky5K/x.MnFQ7GoCertIpq', NULL, '2024-11-12 08:59:02', '2024-11-12 08:59:02', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint UNSIGNED NOT NULL,
  `agency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_supervisor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `agency_name`, `agency_email`, `agency_contact`, `agency_supervisor`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MDRRMO2', 'test@gmail.com2', '0912019212222', 'MR.Supervisor2', 'Active', '2024-11-12 21:00:07', '2024-11-12 22:06:44'),
(2, 'DSWD', 'dswd@gmail.com', '0912019212', 'Juan Dela Cruz', 'Active', '2024-11-12 21:02:53', '2024-11-12 21:02:53');

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
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_initials` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department`, `course`, `course_code`, `course_initials`, `created_at`, `updated_at`, `department_id`) VALUES
(1, NULL, 'Bachelor of Science in Computer Science', 'BSCS', 'BSCS', '2024-11-12 08:15:38', '2024-11-12 08:15:38', 8),
(2, NULL, 'Bachelor of Science in Information Technology', 'BSIT', 'BSIT', '2024-11-12 08:16:08', '2024-11-12 08:16:08', 8);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`, `course`) VALUES
(8, 'College of Information and Computing Studies', '2024-11-12 08:14:48', '2024-11-12 08:14:48', NULL);

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
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_heads`
--

INSERT INTO `department_heads` (`id`, `created_at`, `updated_at`, `first_name`, `middle_name`, `last_name`, `role`, `username`, `password`, `status`, `department`, `course`) VALUES
(14, '2024-11-12 08:40:58', '2024-11-12 08:40:58', 'Glen Donn', 'Bayhon', 'Alpasan', NULL, 'BSCS@gmail.com', '$2y$12$5zlUB3J9aPEwQLC0.da3n.rRhrrCbeoQtalzpYBYgsEQEZnenAqiO', NULL, 'College of Information and Computing Studies', 'BSCS'),
(18, '2024-11-12 20:44:21', '2024-11-12 20:44:21', 'Arnold', NULL, 'Banes', NULL, 'arnoldB', '$2y$12$KehE43o7lJgfpZJcWqZL4.E8T4TrSmA7TCSIASCVxIYwfgznfrtF.', NULL, 'College of Information and Computing Studies', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `good_moral` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `consent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `endorsements`
--

CREATE TABLE `endorsements` (
  `id` bigint UNSIGNED NOT NULL,
  `agency_personnel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endorsement_letter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `students_info` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `endorsement_letters`
--

CREATE TABLE `endorsement_letters` (
  `id` bigint UNSIGNED NOT NULL,
  `letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_points` decimal(5,2) NOT NULL DEFAULT '0.00',
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_criteria`
--

CREATE TABLE `evaluation_criteria` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `week_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `time_out` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_hours` int DEFAULT NULL,
  `activities` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studentId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_certificates`
--

CREATE TABLE `health_certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(72, '2024_10_12_081421_add_course_column_in_department_head_table', 59),
(73, '2024_10_18_014125_create_student_documents', 60),
(74, '2024_10_24_065555_create_student_evaluations_table', 61),
(75, '2024_10_24_065854_create_supervisor_student_evaluations_table', 62),
(76, '2024_10_24_072818_add_columns_in_supervisor_student_evaluations_table', 63),
(77, '2024_10_24_081816_add_fields_to_supervisor_student_evaluations_table', 64),
(78, '2024_10_30_164835_add_department_id_to_courses_table', 65),
(79, '2024_10_30_171551_add_course_column_in_departments_table', 66),
(80, '2024_10_31_200552_add_course_column_to_courses_table', 67),
(81, '2024_10_31_200728_rename_column_in_table_name', 68),
(82, '2024_10_31_202603_create_health_certificates_table', 69),
(83, '2024_11_08_041953_create_reports_table', 70),
(84, '2024_11_11_112318_add_firstname_middlename_lastname_in_admin_table', 71),
(85, '2024_11_12_163718_create_sessions_table', 72),
(86, '2024_11_12_164427_rename_email_column_tousername', 73),
(87, '2024_11_12_164907_rename_email_column_tousername', 74);

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
  `moa_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `points`, `question`, `type`, `status`, `created_at`, `updated_at`) VALUES
(10, '1.6', 'Always Absent', 'Attendance', '1', '2024-09-20 11:11:32', '2024-10-26 08:11:14'),
(11, '0.8', 'Absent Occasionally', 'Attendance', '1', '2024-09-20 11:12:06', '2024-10-26 08:12:18'),
(12, '1', 'Attending regularly', 'Attendance', '1', '2024-09-20 11:12:25', '2024-10-26 08:12:20'),
(13, '0.6', 'Late frequently', 'Punctuality', '1', '2024-09-20 11:13:06', '2024-09-20 22:48:06'),
(14, '0.8', 'Late Occasionally', 'Punctuality', '1', '2024-09-20 11:13:21', '2024-09-20 22:48:39'),
(15, '1', 'Report to work on time', 'Punctuality', '1', '2024-09-20 11:14:00', '2024-09-20 22:48:41'),
(16, '0.6', 'Never goes beyond minimum duty', 'Initiative', '1', '2024-09-20 11:14:19', '2024-09-22 13:34:13'),
(17, '0.8', 'Occasionally initiate action', 'Initiative', '1', '2024-09-20 11:14:43', '2024-10-26 08:12:29'),
(18, '1', 'Self-starter of good ideas', 'Initiative', '1', '2024-09-20 11:15:07', '2024-10-26 08:12:31'),
(19, '0.6', 'Requires constant supervision', 'Ability to Plan Activities', '0', '2024-09-20 11:15:34', '2024-10-27 06:47:16'),
(20, '0.8', 'Follows work plans effectively', 'Ability to Plan Activities', '1', '2024-09-20 11:15:53', '2024-10-26 08:12:44'),
(21, '1', 'Handles work well', 'Ability to Plan Activities', '1', '2024-09-20 11:16:05', '2024-10-26 08:12:48'),
(22, '0.6', 'Does not cooparate', 'Cooperation', '1', '2024-09-20 11:16:25', '2024-10-26 08:12:51'),
(23, '0.8', 'Works well with others', 'Cooperation', '1', '2024-09-20 11:16:42', '2024-10-26 08:12:53'),
(24, '1', 'Sets good example in teamwork', 'Cooperation', '1', '2024-09-20 11:17:05', '2024-10-26 08:13:29'),
(26, '0.6', 'indifferent and lacks interest', 'Interest and attitudes towards work', '1', '2024-10-23 23:49:10', '2024-10-26 08:21:16'),
(27, '0.8', 'Industrious', 'Interest and attitudes towards work', '1', '2024-10-23 23:49:29', '2024-10-26 08:21:18'),
(28, '1', 'Hardworking and strives to get head', 'Interest and attitudes towards work', '1', '2024-10-23 23:50:23', '2024-10-26 08:21:18'),
(29, '0.6', 'Lacks practice', 'Major Field of Concentration', '1', '2024-10-23 23:51:15', '2024-10-26 08:21:20'),
(30, '0.8', 'Create distinctly impression', 'Major Field of Concentration', '1', '2024-10-23 23:51:38', '2024-10-26 08:21:21'),
(31, '1', 'Knowledgeable', 'Major Field of Concentration', '1', '2024-10-23 23:51:58', '2024-10-26 08:21:25'),
(32, '0.6', 'Suitable and acceptable', 'Appearance', '1', '2024-10-23 23:52:19', '2024-10-26 08:21:26'),
(33, '0.8', 'Create distinctly impression', 'Appearance', '1', '2024-10-23 23:52:51', '2024-10-26 08:21:28'),
(34, '1', 'Impressive, command, admration', 'Appearance', '1', '2024-10-23 23:53:13', '2024-10-26 08:21:32'),
(35, '0.6', 'Low in grasping instructions', 'Alertness', '1', '2024-10-23 23:53:34', '2024-10-26 08:21:34'),
(36, '0.8', 'Nearly grasps intent instructions', 'Alertness', '1', '2024-10-23 23:53:58', '2024-10-26 08:21:36'),
(37, '1', 'Exceptionally quick to understand', 'Alertness', '1', '2024-10-23 23:54:32', '2024-10-26 08:21:38'),
(38, '0.6', 'Timid, hesitant, is easily influenced', 'Self-Confidence', '1', '2024-10-23 23:55:11', '2024-10-26 08:21:42'),
(39, '0.8', 'Moderately confident of himself/herself', 'Self-Confidence', '1', '2024-10-23 23:55:52', '2024-10-26 08:21:45'),
(40, '1', 'Show superior self-assurance', 'Self-Confidence', '1', '2024-10-23 23:56:12', '2024-10-26 08:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schoolyears`
--

CREATE TABLE `schoolyears` (
  `id` bigint UNSIGNED NOT NULL,
  `school_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_registered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endorsement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_documents`
--

CREATE TABLE `student_documents` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `good_moral` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endorsement_letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_of_consent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_student_evaluations`
--

CREATE TABLE `supervisor_student_evaluations` (
  `id` bigint UNSIGNED NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `attendance_questions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `punctuality_questions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `punctuality_points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initiative_questions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initiative_points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `planning_questions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `planning_points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cooperation_questions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cooperation_points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_score` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_questions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `interest_points` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `field_questions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `field_points` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `appearance_questions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `appearance_points` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alert_questions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alert_points` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `self_questions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `self_points` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_reports`
--

CREATE TABLE `weekly_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_number` int DEFAULT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_no` int DEFAULT NULL,
  `photos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studentname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `year_levels`
--

CREATE TABLE `year_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `year_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  ADD UNIQUE KEY `admins_email_unique` (`username`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_department_id_foreign` (`department_id`);

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
-- Indexes for table `endorsements`
--
ALTER TABLE `endorsements`
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
-- Indexes for table `health_certificates`
--
ALTER TABLE `health_certificates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolyears`
--
ALTER TABLE `schoolyears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_documents`
--
ALTER TABLE `student_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_student_evaluations`
--
ALTER TABLE `supervisor_student_evaluations`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department_heads`
--
ALTER TABLE `department_heads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `endorsements`
--
ALTER TABLE `endorsements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_certificates`
--
ALTER TABLE `health_certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolyears`
--
ALTER TABLE `schoolyears`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `student_documents`
--
ALTER TABLE `student_documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supervisor_student_evaluations`
--
ALTER TABLE `supervisor_student_evaluations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weekly_reports`
--
ALTER TABLE `weekly_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `year_levels`
--
ALTER TABLE `year_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `student_documents`
--
ALTER TABLE `student_documents`
  ADD CONSTRAINT `student_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
