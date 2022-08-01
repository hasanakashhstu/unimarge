-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2018 at 06:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicsyllabus`
--

CREATE TABLE `academicsyllabus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploader` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `academicsyllabus`
--

INSERT INTO `academicsyllabus` (`id`, `title`, `class`, `subject`, `display_file`, `file`, `uploader`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Test Purpose', 'one', 'one', 'Screenshot from 2017-06-02 01-37-25.png', '1496354690.png', 'Rahib Hasan', 'Description', '2017-06-01 16:04:50', '2017-06-01 16:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `academic_syllebus`
--

CREATE TABLE `academic_syllebus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `accontant_id` int(11) NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `accountant_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fathers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mothers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accountant_address_child`
--

CREATE TABLE `accountant_address_child` (
  `parent` int(11) NOT NULL,
  `post_office` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accountant_qualification_child`
--

CREATE TABLE `accountant_qualification_child` (
  `parent` int(11) NOT NULL,
  `degree_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `board_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passing_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_student`
--

CREATE TABLE `applicant_student` (
  `applicant_id` int(11) NOT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admission_test` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8 DEFAULT 'Applicant',
  `batch` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shift` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_student`
--

INSERT INTO `applicant_student` (`applicant_id`, `student_name`, `parent_name`, `relation`, `session`, `class`, `admission_test`, `department`, `birth_date`, `gender`, `postal_code`, `phone`, `email`, `created_at`, `updated_at`, `status`, `batch`, `shift`, `medium`) VALUES
(1539176597, 'None', 'Guest', 's', '2018-2019', 'First Semester', 'Admission Test', 'Computer Science & Technology', '2018-01-01', 'Male', '5800', '0170000000', 'fultola@tmss.com', '2018-10-10 07:04:44', '2018-10-10 07:06:59', 'Pass', '2', '1st', 'TISI'),
(1541925782, 'Mahir', 'Late. Hafez Uddin', 'Father', '2018-2019', 'First Semester', 'Admission Test', 'Computer Science & Technology', '2018-11-01', 'Male', '3900', '1849942053', 'SSSSSSSSSSSSS@codebool.com', '2018-11-11 02:43:35', '2018-11-11 02:43:35', 'Applicant', '2', '1st', 'TISI');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_student_child`
--

CREATE TABLE `applicant_student_child` (
  `parent` int(11) NOT NULL,
  `post_office` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_student_child`
--

INSERT INTO `applicant_student_child` (`parent`, `post_office`, `home_district`, `division`, `village_name`, `created_at`, `updated_at`) VALUES
(1539176597, 's', 's', 's', 's', '2018-10-10 07:04:44', '2018-10-10 07:04:44'),
(1541925782, 'Dhaka', 'Dhaka', 'Dhaka', 'Dhaka', '2018-11-11 02:43:35', '2018-11-11 02:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `apprisals`
--

CREATE TABLE `apprisals` (
  `apprisal_id` int(11) NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `apprisal_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apprisal_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apprisal_template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_score` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `convert` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8_unicode_ci,
  `apprisals` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apprisals`
--

INSERT INTO `apprisals` (`apprisal_id`, `medium`, `apprisal_type`, `apprisal_name`, `apprisal_template`, `start_date`, `end_date`, `total_score`, `created_at`, `updated_at`, `convert`, `remarks`, `apprisals`) VALUES
(1509314404, 'English', 'Student', '1720001', '1509046426', '10/01/2017', '10/31/2017', '93', '2017-10-29 16:00:37', '2018-10-04 07:41:14', '5', '', '4.6'),
(1515254507, 'Bangla', 'Student', '1720012', '1509046426', '01/08/2018', '01/31/2018', '28', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4', '454', '1.12'),
(1539177768, 'TISI', 'Student', '', '1539177619', '01/01/2018', '01/08/2018', '28', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '50', 'sss', '14');

-- --------------------------------------------------------

--
-- Table structure for table `apprisal_goals`
--

CREATE TABLE `apprisal_goals` (
  `id` int(11) NOT NULL,
  `parent` varchar(45) DEFAULT NULL COMMENT 'TIMESTAMP()',
  `goals` varchar(45) DEFAULT NULL,
  `weightage` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'TIMESTAMP()',
  `score` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apprisal_goals`
--

INSERT INTO `apprisal_goals` (`id`, `parent`, `goals`, `weightage`, `created_at`, `updated_at`, `score`) VALUES
(45, '1509314404', 'Attendence', '20', '2017-10-29 16:00:37', '2018-10-04 07:41:14', '20'),
(46, '1509314404', 'Class Attitude ', '20', '2017-10-29 16:00:37', '2018-10-04 07:41:14', '20'),
(47, '1509314404', 'Performence', '40', '2017-10-29 16:00:37', '2018-10-04 07:41:14', '30'),
(48, '1509314404', 'Activity', '10', '2017-10-29 16:00:37', '2018-10-04 07:41:14', '10'),
(49, '1509314404', 'More', '5', '2017-10-29 16:00:37', '2018-10-04 07:41:14', '5'),
(50, '1509314404', 'More', '2', '2017-10-29 16:00:37', '2018-10-04 07:41:15', '5'),
(51, '1509314404', 'More', '3', '2017-10-29 16:00:37', '2018-10-04 07:41:15', '3'),
(52, '1515254507', 'Attendence', '20', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4'),
(53, '1515254507', 'Class Attitude ', '20', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4'),
(54, '1515254507', 'Performence', '40', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4'),
(55, '1515254507', 'Activity', '10', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4'),
(56, '1515254507', 'More', '5', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4'),
(57, '1515254507', 'More', '2', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4'),
(58, '1515254507', 'More', '3', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4'),
(59, '1539177768', 'Behavior ', '20', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '5'),
(60, '1539177768', 'Dress', '20', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '20'),
(61, '1539177768', 'Class Attendance ', '20', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '1'),
(62, '1539177768', 'Attitude ', '20', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '1'),
(63, '1539177768', 'Class Attention ', '20', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `apprisal_template`
--

CREATE TABLE `apprisal_template` (
  `template_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apprisal_template`
--

INSERT INTO `apprisal_template` (`template_id`, `title`, `active_status`, `created_at`, `updated_at`) VALUES
(1539177619, 'student-appraisal', 'yes', '2018-10-10 07:22:28', '2018-10-10 07:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `apprisal_templete_child`
--

CREATE TABLE `apprisal_templete_child` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL,
  `kra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weightage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apprisal_templete_child`
--

INSERT INTO `apprisal_templete_child` (`id`, `parent`, `kra`, `weightage`, `created_at`, `updated_at`) VALUES
(43, 1539177619, 'Behavior ', '20', '2018-10-10 07:22:28', '2018-10-22 06:15:31'),
(44, 1539177619, 'Dress', '20', '2018-10-10 07:22:28', '2018-10-22 06:15:31'),
(45, 1539177619, 'Class Attendance ', '20', '2018-10-10 07:22:28', '2018-10-22 06:15:31'),
(46, 1539177619, 'Attitude ', '20', '2018-10-10 07:22:28', '2018-10-22 06:15:31'),
(47, 1539177619, 'Class Attention ', '20', '2018-10-10 07:22:28', '2018-10-22 06:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `article_info`
--

CREATE TABLE `article_info` (
  `article_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_info`
--

INSERT INTO `article_info` (`article_id`, `stock_id`, `article_name`, `language`, `author`, `isbn`, `publisher`, `description`, `stock_date`, `purchase_price`, `available_status`, `created_at`, `updated_at`) VALUES
(1508860955, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860956, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860957, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860958, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860959, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860960, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860961, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860962, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860963, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860964, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860965, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860966, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860967, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860968, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860969, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860970, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860971, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860972, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860973, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860974, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860975, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860976, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860977, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860978, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860979, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860980, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860981, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860982, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860983, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860984, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860985, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860986, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860987, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860988, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860989, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860990, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860991, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860992, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860993, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860994, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860995, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860996, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860997, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860998, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508860999, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508861000, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508861001, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508861002, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508861003, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508861004, 1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1508861005, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861006, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861007, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861008, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861009, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861010, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861011, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861012, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861013, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861014, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861015, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861016, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861017, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861018, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861019, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861020, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861021, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861022, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861023, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861024, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861025, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861026, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861027, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861028, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861029, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861030, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861031, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861032, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861033, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861034, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861035, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861036, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861037, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861038, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861039, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861040, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861041, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1508861042, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861043, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861044, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861045, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861046, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861047, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861048, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861049, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861050, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861051, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861052, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861053, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861054, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861055, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861056, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861057, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861058, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861059, 1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', 'Technical Prokashoni', '', '2018-08-02', '0', 'Available', '2018-10-22 05:20:49', '2018-10-22 05:20:49'),
(1508861060, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861061, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861062, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861063, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861064, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861065, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861066, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861067, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861068, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861069, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861070, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861071, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861072, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861073, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861074, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861075, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861076, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861077, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861078, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861079, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861080, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861081, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861082, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861083, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861084, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861085, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861086, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861087, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861088, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861089, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861090, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861091, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861092, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861093, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861094, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861095, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861096, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861097, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861098, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861099, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861100, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861101, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861102, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861103, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861104, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861105, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861106, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861107, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861108, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861109, 1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', 'Technical Prokashoni', '', '2018-07-28', '0', 'Available', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1508861110, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861111, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861112, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861113, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861114, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861115, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861116, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861117, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861118, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861119, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861120, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861121, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861122, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861123, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861124, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861125, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861126, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861127, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861128, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861129, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861130, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861131, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861132, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861133, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861134, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861135, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861136, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861137, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861138, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861139, 1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', 'Technical Prokashoni', '', '2018-02-08', '0', 'Available', '2018-10-22 05:29:11', '2018-10-22 05:29:11'),
(1508861140, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861141, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861142, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861143, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861144, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861145, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861146, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861147, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861148, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861149, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861150, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861151, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861152, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861153, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861154, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861155, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861156, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861157, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861158, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861159, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861160, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861161, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861162, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861163, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861164, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861165, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861166, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861167, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861168, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861169, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861170, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861171, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861172, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861173, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861174, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861175, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861176, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861177, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861178, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861179, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861180, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861181, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861182, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861183, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861184, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861185, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861186, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861187, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861188, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50'),
(1508861189, 1540207751, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', 'N/A', 'Technical Prokashoni', '', '2018-10-01', '240', 'Available', '2018-10-22 05:33:50', '2018-10-22 05:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `article_issue`
--

CREATE TABLE `article_issue` (
  `article_issue_id` int(11) NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `member_reg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `article_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Issue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_issue`
--

INSERT INTO `article_issue` (`article_issue_id`, `article_name`, `member_roll`, `member_reg`, `member_name`, `issue_date`, `return_date`, `e_mail`, `phone`, `status`, `total_day`, `created_at`, `updated_at`, `article_id`, `article_status`) VALUES
(1502737769, 'The Human Society of Trubute', '1', 'Registration', 'Hasan Ali Haolader', '01-01-2017', '01-02-2017', 'rahibhasan689009@gmail.com', '1751783698', 'Active', '30', '2017-08-14 13:09:29', '2017-08-14 13:09:29', NULL, 'Issue');

-- --------------------------------------------------------

--
-- Table structure for table `article_recive`
--

CREATE TABLE `article_recive` (
  `article_recive_id` int(11) NOT NULL,
  `article_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_recive`
--

INSERT INTO `article_recive` (`article_recive_id`, `article_id`, `article_name`, `member_name`, `issue_date`, `return_date`, `e_mail`, `phone`, `total_day`, `created_at`, `updated_at`) VALUES
(1504692072, '3', 'The Human Society of Trubute', 'Hasan Ali Haolader', '2017-09-06', '2017-09-14', 'rahibhasan689009@gmail.com', '3', '3', '2017-09-06 04:01:12', '2017-09-06 04:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `assign_canteen`
--

CREATE TABLE `assign_canteen` (
  `assign_canteen_id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8 NOT NULL,
  `student_roll` varchar(191) CHARACTER SET utf8 NOT NULL,
  `student_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `department` varchar(191) CHARACTER SET utf8 NOT NULL,
  `class` varchar(191) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_canteen`
--

INSERT INTO `assign_canteen` (`assign_canteen_id`, `title`, `student_roll`, `student_name`, `department`, `class`, `description`, `created_at`, `updated_at`) VALUES
(1540431121, '182006 ', '182006', 'Mst. Manisha Akter', 'Graphics Technology', 'First Semester', '182006', '2018-10-24 19:32:01', '2018-10-24 19:32:01'),
(1540569774, '', '1820035', 'Shamima Khatun', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:02:54', '2018-10-26 10:02:54'),
(1540569788, '', '1820036', 'Anika Tahseen', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:03:08', '2018-10-26 10:03:08'),
(1540569809, '', '1820037', 'Ziaul Haque', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:03:29', '2018-10-26 10:03:29'),
(1540569859, '1820038', '1820038', 'Rahima Khatun', 'Computer Science & Technology', 'First Semester', '1820038', '2018-10-26 10:04:19', '2018-10-26 10:04:19'),
(1540569871, '', '1820039', 'ZAGAD BANDU', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:04:31', '2018-10-26 10:04:31'),
(1540569883, '', '1820040', 'MD. MIZANUR RAHMAN', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:04:43', '2018-10-26 10:04:43'),
(1540569894, '', '1820041', 'Md. Anik Mia ', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:04:54', '2018-10-26 10:04:54'),
(1540569907, '', '1820042', 'Md.Nazmul Hasan Sourov', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:05:07', '2018-10-26 10:05:07'),
(1540569917, '', '1820043', 'Md. Mamunur Rahman', 'Computer Science & Technology', 'First Semester', '', '2018-10-26 10:05:17', '2018-10-26 10:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `assign_dormitory`
--

CREATE TABLE `assign_dormitory` (
  `assign_dormitory_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `student_roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `department` varchar(255) CHARACTER SET utf8 NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dormitory_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dormitory_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `room_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_dormitory`
--

INSERT INTO `assign_dormitory` (`assign_dormitory_id`, `title`, `student_name`, `student_roll`, `department`, `semester`, `dormitory_no`, `dormitory_name`, `room_number`, `description`, `created_at`, `updated_at`) VALUES
(1540205600, 'TISI Dormatory', 'Md. Anik Mia ', '1820041', 'Computer Science & Engineering', '1st', '01', 'Bijoy', '132', 'N/A', '2018-10-22 04:53:20', '2018-10-22 04:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `assign_transport`
--

CREATE TABLE `assign_transport` (
  `transport_id` int(11) NOT NULL,
  `route_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_transport` varchar(255) CHARACTER SET utf8 NOT NULL,
  `transport_color` varchar(255) CHARACTER SET utf8 NOT NULL,
  `number_of_transport` varchar(255) CHARACTER SET utf8 NOT NULL,
  `student_roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `route_fare` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_transport`
--

INSERT INTO `assign_transport` (`transport_id`, `route_name`, `name_transport`, `transport_color`, `number_of_transport`, `student_roll`, `route_fare`, `created_at`, `updated_at`) VALUES
(1540911732, 'Dhaka', 'Ena', 'Red', '234956', '182006', '120', '2018-10-30 09:02:29', '2018-10-30 09:02:29'),
(1540911749, 'Dhaka', 'Ena', 'Red', '234956', '1820068', '120', '2018-10-30 09:03:16', '2018-10-30 09:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `canteen_component`
--

CREATE TABLE `canteen_component` (
  `canteen_component_id` int(11) NOT NULL,
  `component_title` varchar(191) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `canteen_component`
--

INSERT INTO `canteen_component` (`canteen_component_id`, `component_title`, `description`, `created_at`, `updated_at`) VALUES
(1540148344, 'BREAKFAST', 'Breakfast ', '2018-10-25 01:29:16', '2018-10-24 19:29:16'),
(1540149072, 'LUNCH', 'Lunch ', '2018-10-25 01:30:04', '2018-10-24 19:30:04'),
(1540149084, 'DINNER', 'Dinner', '2018-10-25 01:29:37', '2018-10-24 19:29:37'),
(1540149099, 'SEHERI', 'Seheri ', '2018-10-25 01:30:22', '2018-10-24 19:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `parent_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`id`, `account_name`, `account_code`, `parent_account`, `transaction_amount`, `transaction_type`, `created_at`, `updated_at`) VALUES
(21, 'Accounts Receivable', '2', 'Asset', '100000', 'Cash', '2018-10-10 14:28:06', '2018-10-10 14:28:06'),
(22, 'Accumulated Depreciation Buildigs', '8', 'Asset', '100000', 'Cash', '2018-10-10 14:28:22', '2018-10-10 14:28:22'),
(23, 'Accumulated Depreciation Equipment', '10', 'Asset', '100000', 'Cash', '2018-10-10 14:28:41', '2018-10-10 14:28:41'),
(24, 'Admission', '105', 'Income', '100000', 'Cash', '2018-10-10 14:29:15', '2018-10-10 14:29:15'),
(25, 'Admission Form', '104', 'Income', '100000', 'Cash', '2018-10-10 14:29:32', '2018-10-10 14:29:32'),
(26, 'Advertisement	', '161', 'Expense', '100000', 'Cash', '2018-10-10 14:29:55', '2018-10-10 14:29:55'),
(27, 'Book Sale', '103', 'Income', '100000', 'Cash', '2018-10-10 14:30:11', '2018-10-10 14:30:11'),
(28, 'Buildings	', '7', 'Asset', '100000', 'Cash', '2018-10-10 14:30:41', '2018-10-10 14:30:41'),
(29, 'Cash		', '1', 'Asset', '100000', 'Cash', '2018-10-10 14:30:55', '2018-10-10 14:30:55'),
(30, 'Conveyance		', '159', 'Expense', '100000', 'Cash', '2018-10-10 14:31:13', '2018-10-10 14:31:13'),
(31, 'Donation Form	', '111', 'Income', '100000', 'Cash', '2018-10-10 14:31:36', '2018-10-10 14:31:36'),
(32, 'Electricity Bill	', '154', 'Expense', '100000', 'Cash', '2018-10-10 14:31:53', '2018-10-10 14:31:53'),
(33, 'Entertainment Bill	', '158', 'Expense', '100000', 'Check', '2018-10-10 14:34:30', '2018-10-10 14:43:34'),
(34, 'Equipment', '9', 'Asset', '100000', 'Cash', '2018-10-10 14:35:24', '2018-10-10 14:35:24'),
(35, 'Exam Fees	', '107', 'Income', '100000', 'Cash', '2018-10-10 14:35:53', '2018-10-10 14:35:53'),
(36, 'Fines', '112', 'Income', '100000', 'Cash', '2018-10-10 14:36:07', '2018-10-10 14:36:07'),
(37, 'Gas Bill	', '155', 'Expense', '100000', 'Cash', '2018-10-10 14:36:25', '2018-10-10 14:36:25'),
(38, 'Higher Purchase Bill	', '164', 'Expense', '100000', 'Cash', '2018-10-10 14:36:44', '2018-10-10 14:36:44'),
(39, 'Internet/Wi-Fi Service Charge	', '163', 'Expense', '100000', 'Cash', '2018-10-10 14:36:57', '2018-10-10 14:36:57'),
(40, 'Land', '6', 'Asset', '100000', 'Cash', '2018-10-10 14:37:18', '2018-10-10 14:37:18'),
(41, 'Maintenance/ Repair Cost	', '162', 'Expense', '100000', 'Cash', '2018-10-10 14:37:36', '2018-10-10 14:37:36'),
(42, 'Merchandise Inventory	', '3', 'Asset', '100000', 'Cash', '2018-10-10 14:37:53', '2018-10-10 14:37:53'),
(43, 'Office Rent	', '153', 'Expense', '100000', 'Cash', '2018-10-10 14:38:11', '2018-10-10 14:38:11'),
(44, 'Opening Balance	', '101', 'Income', '100000', 'Cash', '2018-10-10 14:38:28', '2018-10-10 14:38:28'),
(45, 'Others	', '167', 'Expense', '100000', 'Cash', '2018-10-10 14:38:46', '2018-10-10 14:38:46'),
(46, 'Photo Copy/ Stationary	', '160', 'Expense', '100000', 'Cash', '2018-10-10 14:38:58', '2018-10-10 14:38:58'),
(47, 'Prepaid Insurance	', '5', 'Asset', '100000', 'Cash', '2018-10-10 14:39:12', '2018-10-10 14:39:12'),
(48, 'Receved From Authority	', '102', 'Income', '100000', 'Cash', '2018-10-10 14:39:33', '2018-10-10 14:39:33'),
(49, 'Residence Cost(Monthly)	', '165', 'Expense', '100000', 'Cash', '2018-10-10 14:39:53', '2018-10-10 14:39:53'),
(50, 'Salary		', '151', 'Expense', '100000', 'Cash', '2018-10-10 14:40:11', '2018-10-10 14:40:11'),
(51, 'Session Charges		', '108', 'Income', '100000', 'Cash', '2018-10-10 14:40:27', '2018-10-10 14:40:27'),
(52, 'Stationary Sale		', '110', 'Income', '100000', 'Cash', '2018-10-10 14:40:39', '2018-10-10 14:40:39'),
(53, 'Supplies', '4', 'Asset', '100000', 'Cash', '2018-10-10 14:40:51', '2018-10-10 14:40:51'),
(54, 'Telephone / Mobile Bill	', '157', 'Expense', '100000', 'Cash', '2018-10-10 14:41:05', '2018-10-10 14:41:05'),
(55, 'Transport	', '113', 'Income', '100000', 'Cash', '2018-10-10 14:41:20', '2018-10-10 14:41:20'),
(56, 'Tuition Fees	', '106', 'Income', '100000', 'Cash', '2018-10-10 14:41:34', '2018-10-10 14:41:34'),
(57, 'Uniform Making Cost		', '166', 'Expense', '100000', 'Cash', '2018-10-10 14:41:56', '2018-10-10 14:41:56'),
(58, 'UniForm Sale		', '109', 'Income', '100000', 'Cash', '2018-10-10 14:42:12', '2018-10-10 14:42:12'),
(59, 'Wages		', '152', 'Expense', '100000', 'Cash', '2018-10-10 14:42:24', '2018-10-10 14:42:24'),
(60, 'Water Bill	', '56', 'Expense', '100000', 'Cash', '2018-10-10 14:42:37', '2018-10-10 14:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `class_notice_child`
--

CREATE TABLE `class_notice_child` (
  `notice_id` int(11) NOT NULL,
  `cw_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cw_department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cw_section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_notice_child`
--

INSERT INTO `class_notice_child` (`notice_id`, `cw_class`, `cw_department`, `cw_section`, `created_at`, `updated_at`) VALUES
(1502736346, '1', 'fdfdfd', 'dfdf', '2017-08-14 12:46:23', '2017-08-14 12:46:23'),
(1508861875, 'One', 'None', 'A', '2017-10-24 10:21:28', '2017-10-24 10:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `class_routine_id` int(11) NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_name`, `department`, `medium`, `section`, `class_day`, `created_at`, `updated_at`, `subject`, `teacher`) VALUES
(1505597114, 'Two', '', '', 'One', '1', '2017-09-16 15:25:14', '2017-09-16 15:25:14', 'Bangla', 'MR Abdus Samad'),
(1505597193, 'Two', '', '', 'One', '1', '2017-09-16 15:26:33', '2017-09-16 15:26:33', 'Bangla', 'MR Abdus Samad'),
(1505671889, 'Two', '', '', 'One', '1', '2017-09-17 12:11:29', '2017-09-17 12:11:29', 'Bangla', 'MR Abdus Samad'),
(1505678379, 'Two', '', '', 'One', '4', '2017-09-17 13:59:39', '2017-09-17 13:59:39', 'English', 'MR Abdus Samad'),
(1509737945, 'Four', '', '', 'A', '1', '2017-11-03 13:39:05', '2017-11-03 13:39:05', 'Bangla', 'MR Abdus Samad'),
(1509738006, 'Four', '', '', 'A', '1', '2017-11-03 13:40:06', '2017-11-03 13:40:06', 'English', 'Mr Sahed Ahammed'),
(1509738059, 'Four', '', '', 'A', '1', '2017-11-03 13:40:59', '2017-11-03 13:40:59', 'Social Science', 'MR Abdus Samad'),
(1509738106, 'Four', '', '', 'A', '1', '2017-11-03 13:41:46', '2017-11-03 13:41:46', 'Math', 'Miss Roksana '),
(1509738130, 'Four', '', '', 'A', '1', '2017-11-03 13:42:10', '2017-11-03 13:42:10', 'Bilogy', 'Miss Roksana '),
(1509738190, 'Four', '', '', 'A', '2', '2017-11-03 13:43:10', '2017-11-03 13:43:10', 'Bilogy', 'MR Abdus Samad'),
(1509738218, 'Four', '', '', 'A', '2', '2017-11-03 13:43:38', '2017-11-03 13:43:38', 'Bangla', 'MR Abdus Samad'),
(1509738252, 'Four', '', '', 'A', '2', '2017-11-03 13:44:12', '2017-11-03 13:44:12', 'Math', 'Mr Abul Hasnat'),
(1509738330, 'Four', '', '', 'A', '2', '2017-11-03 13:45:30', '2017-11-03 13:45:30', 'Chesmistry', 'MR Abdus Samad'),
(1509738409, 'Four', '', '', 'A', '2', '2017-11-03 13:46:49', '2017-11-03 13:46:49', 'Physic', 'MR Abdus Samad'),
(1509738481, 'Four', '', '', 'A', '3', '2017-11-03 13:48:01', '2017-11-03 13:48:01', 'Bangla', 'MR Abdus Samad'),
(1509738531, 'Four', '', '', 'A', '3', '2017-11-03 13:48:51', '2017-11-03 13:48:51', 'Chesmistry', 'MR Abdus Samad'),
(1509738576, 'Four', '', '', 'A', '4', '2017-11-03 13:49:36', '2017-11-03 13:49:36', 'Math', 'Mr Selim Ahammed'),
(1509738605, 'Four', '', '', 'A', '4', '2017-11-03 13:50:05', '2017-11-03 13:50:05', 'Social Science', 'MR Abdus Samad'),
(1509739623, 'Four', '', '', 'A', '5', '2017-11-03 14:07:03', '2017-11-03 14:07:03', 'Math', 'MR Abdus Samad'),
(1509741931, 'Four', '', '', 'A', '1', '2017-11-03 14:45:31', '2017-11-03 14:45:31', 'Physic', 'MR Abdus Samad'),
(1509744522, 'Four', '', '', 'B', '1', '2017-11-03 15:28:42', '2017-11-03 15:28:42', 'Bangla', 'MR Abdus Samad'),
(1510071720, 'One', '', 'Bangla', 'A', '1', '2017-11-07 10:22:00', '2017-11-07 10:22:00', 'Bangla', 'MR Abdus Samad'),
(1538664362, 'One', '', 'English', 'A', '1', '2018-10-04 08:46:02', '2018-10-04 08:46:02', 'English', 'MR Abdus Samad'),
(1540390878, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2018-10-24 08:21:18', '2018-10-24 08:21:18', 'Physical Education & Life Skill Development', 'Md Sohel Rana'),
(1540390982, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2018-10-24 08:23:02', '2018-10-24 08:23:02', 'Mathematics-1', 'Md. Imran Ali'),
(1540391074, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2018-10-24 08:24:34', '2018-10-24 08:24:34', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1540391118, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2018-10-24 08:25:18', '2018-10-24 08:25:18', 'Electrical Engineering Fundamentals', 'Jakiya Jafrin'),
(1540391182, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2018-10-24 08:26:22', '2018-10-24 08:26:22', 'Computer Lab. Practice (IT support-I)', 'Md. Masud Rana'),
(1540391243, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2018-10-24 08:27:23', '2018-10-24 08:27:23', 'Mathematics-1', 'Md. Imran Ali'),
(1540391300, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2018-10-24 08:28:20', '2018-10-24 08:28:20', 'Computer Application', 'Md. Jubayer Hossain'),
(1540391343, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2018-10-24 08:29:03', '2018-10-24 08:29:03', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1540391401, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2018-10-24 08:30:01', '2018-10-24 08:30:01', 'Mathematics-1', 'Md. Imran Ali'),
(1540391513, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2018-10-24 08:31:53', '2018-10-24 08:31:53', 'Social Science', 'Rabya Khathun'),
(1540391559, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2018-10-24 08:32:39', '2018-10-24 08:32:39', 'Mathematics-1', 'Md. Imran Ali'),
(1540391951, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2018-10-24 08:39:11', '2018-10-24 08:39:11', 'Physical Education & Life Skill Development', 'Md. Masud Rana'),
(1540392084, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2018-10-24 08:41:24', '2018-10-24 08:41:24', 'Social Science', 'Rabya Khathun'),
(1540392709, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2018-10-24 08:51:49', '2018-10-24 08:51:49', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1540392811, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2018-10-24 08:53:31', '2018-10-24 08:53:31', 'Computer Application', 'Md. Jubayer Hossain'),
(1540392880, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2018-10-24 08:54:40', '2018-10-24 08:54:40', 'Social Science', 'Rabya Khathun'),
(1540393053, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2018-10-24 08:57:33', '2018-10-24 08:57:33', 'Social Science', 'Rabya Khathun'),
(1540393115, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2018-10-24 08:58:35', '2018-10-24 08:58:35', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1540393223, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2018-10-24 09:00:23', '2018-10-24 09:00:23', 'Electrical Engineering Fundamentals', 'Jakiya Jafrin'),
(1540393281, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2018-10-24 09:01:21', '2018-10-24 09:01:21', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1540393326, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2018-10-24 09:02:06', '2018-10-24 09:02:06', 'Mathematics-1', 'Md. Imran Ali'),
(1540393365, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2018-10-24 09:02:45', '2018-10-24 09:02:45', 'Physical Education & Life Skill Development', 'Md Sohel Rana');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine_end_child`
--

CREATE TABLE `class_routine_end_child` (
  `parent` int(11) NOT NULL,
  `class_ending_time` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine_end_child`
--

INSERT INTO `class_routine_end_child` (`parent`, `class_ending_time`, `created_at`, `updated_at`) VALUES
(1505597114, '1505559000', '2017-09-16 15:25:15', '2017-09-16 15:25:15'),
(1505597193, '1505540700', '2017-09-16 15:26:33', '2017-09-16 15:26:33'),
(1505671889, '1505622600', '2017-09-17 12:11:29', '2017-09-17 12:11:29'),
(1505678379, '1505624400', '2017-09-17 13:59:39', '2017-09-17 13:59:39'),
(1509737945, '1509706800', '2017-11-03 13:39:05', '2017-11-03 13:39:05'),
(1509738006, '1509710400', '2017-11-03 13:40:06', '2017-11-03 13:40:06'),
(1509738059, '1509670800', '2017-11-03 13:40:59', '2017-11-03 13:40:59'),
(1509738106, '1509678000', '2017-11-03 13:41:46', '2017-11-03 13:41:46'),
(1509738130, '1509681600', '2017-11-03 13:42:11', '2017-11-03 13:42:11'),
(1509738190, '1509706800', '2017-11-03 13:43:10', '2017-11-03 13:43:10'),
(1509738218, '1509710400', '2017-11-03 13:43:38', '2017-11-03 13:43:38'),
(1509738252, '1509670800', '2017-11-03 13:44:12', '2017-11-03 13:44:12'),
(1509738330, '1509678000', '2017-11-03 13:45:30', '2017-11-03 13:45:30'),
(1509738409, '1509681600', '2017-11-03 13:46:49', '2017-11-03 13:46:49'),
(1509738481, '1509706800', '2017-11-03 13:48:02', '2017-11-03 13:48:02'),
(1509738531, '1509670800', '2017-11-03 13:48:51', '2017-11-03 13:48:51'),
(1509738576, '1509710400', '2017-11-03 13:49:36', '2017-11-03 13:49:36'),
(1509738605, '1509681600', '2017-11-03 13:50:05', '2017-11-03 13:50:05'),
(1509739623, '1509706800', '2017-11-03 14:07:04', '2017-11-03 14:07:04'),
(1509741931, '1509685200', '2017-11-03 14:45:31', '2017-11-03 14:45:31'),
(1509744522, '1509667200', '2017-11-03 15:28:42', '2017-11-03 15:28:42'),
(1510071720, '1510020000', '2017-11-07 10:22:01', '2017-11-07 10:22:01'),
(1538664362, '1538646600', '2018-10-04 08:46:02', '2018-10-04 08:46:02'),
(1540390878, '1540378800', '2018-10-24 08:21:18', '2018-10-24 08:21:18'),
(1540390982, '1540387800', '2018-10-24 08:23:02', '2018-10-24 08:23:02'),
(1540391074, '1540376100', '2018-10-24 08:24:34', '2018-10-24 08:24:34'),
(1540391118, '1540381500', '2018-10-24 08:25:18', '2018-10-24 08:25:18'),
(1540391182, '1540387800', '2018-10-24 08:26:22', '2018-10-24 08:26:22'),
(1540391243, '1540393200', '2018-10-24 08:27:23', '2018-10-24 08:27:23'),
(1540391300, '1541245200', '2018-10-24 08:28:20', '2018-11-03 08:59:04'),
(1540391343, '1540381500', '2018-10-24 08:29:03', '2018-10-24 08:29:03'),
(1540391401, '1540387800', '2018-10-24 08:30:01', '2018-10-24 08:30:01'),
(1540391513, '1540393200', '2018-10-24 08:31:53', '2018-10-24 08:31:53'),
(1540391559, '1540376100', '2018-10-24 08:32:39', '2018-10-24 08:32:39'),
(1540391951, '1540381500', '2018-10-24 08:39:11', '2018-10-24 08:39:11'),
(1540392084, '1540385100', '2018-10-24 08:41:24', '2018-10-24 08:41:24'),
(1540392709, '1540387800', '2018-10-24 08:51:49', '2018-10-24 08:51:49'),
(1540392811, '1540376100', '2018-10-24 08:53:31', '2018-10-24 08:53:31'),
(1540392880, '1540381500', '2018-10-24 08:54:40', '2018-10-24 08:54:40'),
(1540393053, '1540381500', '2018-10-24 08:57:33', '2018-10-24 08:57:33'),
(1540393115, '1540393200', '2018-10-24 08:58:35', '2018-10-24 08:58:35'),
(1540393223, '1540393200', '2018-10-24 09:00:23', '2018-10-24 09:00:23'),
(1540393281, '1540387800', '2018-10-24 09:01:21', '2018-10-24 09:01:21'),
(1540393326, '1540393200', '2018-10-24 09:02:06', '2018-10-24 09:02:06'),
(1540393365, '1540376100', '2018-10-24 09:02:45', '2018-10-24 09:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine_start_child`
--

CREATE TABLE `class_routine_start_child` (
  `parent` int(11) NOT NULL,
  `class_starting_time` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine_start_child`
--

INSERT INTO `class_routine_start_child` (`parent`, `class_starting_time`, `created_at`, `updated_at`) VALUES
(1505597114, '1505556300', '2017-09-16 15:25:14', '2017-09-16 15:25:14'),
(1505597193, '1505538900', '2017-09-16 15:26:33', '2017-09-16 15:26:33'),
(1505671889, '1505620800', '2017-09-17 12:11:29', '2017-09-17 12:11:29'),
(1505678379, '1505621700', '2017-09-17 13:59:39', '2017-09-17 13:59:39'),
(1509737945, '1509703200', '2017-11-03 13:39:05', '2017-11-03 13:39:05'),
(1509738006, '1509706800', '2017-11-03 13:40:06', '2017-11-03 13:40:06'),
(1509738059, '1509710400', '2017-11-03 13:40:59', '2017-11-03 13:40:59'),
(1509738106, '1509674400', '2017-11-03 13:41:46', '2017-11-03 13:41:46'),
(1509738130, '1509678000', '2017-11-03 13:42:11', '2017-11-03 13:42:11'),
(1509738190, '1509703200', '2017-11-03 13:43:10', '2017-11-03 13:43:10'),
(1509738218, '1509706800', '2017-11-03 13:43:38', '2017-11-03 13:43:38'),
(1509738252, '1509710400', '2017-11-03 13:44:12', '2017-11-03 13:44:12'),
(1509738330, '1509674400', '2017-11-03 13:45:30', '2017-11-03 13:45:30'),
(1509738409, '1509678000', '2017-11-03 13:46:49', '2017-11-03 13:46:49'),
(1509738481, '1509703200', '2017-11-03 13:48:02', '2017-11-03 13:48:02'),
(1509738531, '1509710400', '2017-11-03 13:48:51', '2017-11-03 13:48:51'),
(1509738576, '1509703200', '2017-11-03 13:49:36', '2017-11-03 13:49:36'),
(1509738605, '1509674400', '2017-11-03 13:50:05', '2017-11-03 13:50:05'),
(1509739623, '1509703200', '2017-11-03 14:07:04', '2017-11-03 14:07:04'),
(1509741931, '1509681600', '2017-11-03 14:45:31', '2017-11-03 14:45:31'),
(1509744522, '1509667200', '2017-11-03 15:28:42', '2017-11-03 15:28:42'),
(1510071720, '1510016400', '2017-11-07 10:22:01', '2017-11-07 10:22:01'),
(1538664362, '1538643600', '2018-10-04 08:46:02', '2018-10-04 08:46:02'),
(1540390878, '1540373400', '2018-10-24 08:21:18', '2018-10-24 08:21:18'),
(1540390982, '1540382400', '2018-10-24 08:23:02', '2018-10-24 08:23:02'),
(1540391074, '1540373400', '2018-10-24 08:24:34', '2018-10-24 08:24:34'),
(1540391118, '1540376100', '2018-10-24 08:25:18', '2018-10-24 08:25:18'),
(1540391182, '1540382400', '2018-10-24 08:26:22', '2018-10-24 08:26:22'),
(1540391243, '1540390500', '2018-10-24 08:27:23', '2018-10-24 08:27:23'),
(1540391300, '1541237400', '2018-10-24 08:28:20', '2018-11-03 08:59:04'),
(1540391343, '1540378800', '2018-10-24 08:29:03', '2018-10-24 08:29:03'),
(1540391401, '1540382400', '2018-10-24 08:30:01', '2018-10-24 08:30:01'),
(1540391513, '1540390500', '2018-10-24 08:31:53', '2018-10-24 08:31:53'),
(1540391559, '1540373400', '2018-10-24 08:32:39', '2018-10-24 08:32:39'),
(1540391951, '1540376100', '2018-10-24 08:39:11', '2018-10-24 08:39:11'),
(1540392084, '1540382400', '2018-10-24 08:41:24', '2018-10-24 08:41:24'),
(1540392709, '1540385100', '2018-10-24 08:51:49', '2018-10-24 08:51:49'),
(1540392811, '1540373400', '2018-10-24 08:53:31', '2018-10-24 08:53:31'),
(1540392880, '1540378800', '2018-10-24 08:54:40', '2018-10-24 08:54:40'),
(1540393053, '1540378800', '2018-10-24 08:57:33', '2018-10-24 08:57:33'),
(1540393115, '1540390500', '2018-10-24 08:58:35', '2018-10-24 08:58:35'),
(1540393223, '1540390500', '2018-10-24 09:00:23', '2018-10-24 09:00:23'),
(1540393281, '1540382400', '2018-10-24 09:01:21', '2018-10-24 09:01:21'),
(1540393326, '1540390500', '2018-10-24 09:02:06', '2018-10-24 09:02:06'),
(1540393365, '1540373400', '2018-10-24 09:02:45', '2018-10-24 09:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `component_id` int(11) NOT NULL,
  `component_name` varchar(45) DEFAULT NULL COMMENT '				',
  `abbr` varchar(45) DEFAULT NULL,
  `mark` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `calculate_percent` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`component_id`, `component_name`, `abbr`, `mark`, `created_at`, `updated_at`, `calculate_percent`) VALUES
(1510074756, 'practical', 'practical', '20', '2017-11-07 11:12:36', '2017-11-11 02:15:55', '50'),
(1510388196, 'T', 'T', '80', '2017-11-11 02:16:36', '2017-11-11 02:16:36', '40'),
(1515756206, 'com', 'com', '20', '2018-01-12 05:23:26', '2018-01-12 05:23:26', '10'),
(1541048871, 'Home Work', 'hw', NULL, '2018-10-31 23:07:51', '2018-10-31 23:07:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendance`
--

CREATE TABLE `daily_attendance` (
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sl_no` int(11) NOT NULL,
  `department` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_attendance`
--

INSERT INTO `daily_attendance` (`student_id`, `device_id`, `date`, `time`, `status`, `created_at`, `updated_at`, `sl_no`, `department`, `subject`) VALUES
('1820035', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:58', '2018-10-30 07:03:58', 51, '', 'Physical Education & Life Skill Development'),
('1820036', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:58', '2018-10-30 07:03:58', 52, '', 'Physical Education & Life Skill Development'),
('1820037', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:58', '2018-10-30 07:03:58', 53, '', 'Physical Education & Life Skill Development'),
('1820038', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:58', '2018-10-30 07:03:58', 54, '', 'Physical Education & Life Skill Development'),
('1820039', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 55, '', 'Physical Education & Life Skill Development'),
('1820040', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 56, '', 'Physical Education & Life Skill Development'),
('1820041', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 57, '', 'Physical Education & Life Skill Development'),
('1820042', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 58, '', 'Physical Education & Life Skill Development'),
('1820043', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 59, '', 'Physical Education & Life Skill Development'),
('1820044', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 60, '', 'Physical Education & Life Skill Development'),
('1820045', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 61, '', 'Physical Education & Life Skill Development'),
('1820046', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 62, '', 'Physical Education & Life Skill Development'),
('1820047', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 63, '', 'Physical Education & Life Skill Development'),
('1820048', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 64, '', 'Physical Education & Life Skill Development'),
('1820048', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 65, '', 'Physical Education & Life Skill Development'),
('1820049', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 66, '', 'Physical Education & Life Skill Development'),
('1820050', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 67, '', 'Physical Education & Life Skill Development'),
('1820051', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 68, '', 'Physical Education & Life Skill Development'),
('1820052', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 69, '', 'Physical Education & Life Skill Development'),
('1820053', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 70, '', 'Physical Education & Life Skill Development'),
('1820054', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 71, '', 'Physical Education & Life Skill Development'),
('1820055', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 72, '', 'Physical Education & Life Skill Development'),
('1820056', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 73, '', 'Physical Education & Life Skill Development'),
('1820057', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 74, '', 'Physical Education & Life Skill Development'),
('1820058', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 75, '', 'Physical Education & Life Skill Development'),
('1820059', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 76, '', 'Physical Education & Life Skill Development'),
('1820060', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 77, '', 'Physical Education & Life Skill Development'),
('1820061', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 78, '', 'Physical Education & Life Skill Development'),
('1820062', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 79, '', 'Physical Education & Life Skill Development'),
('1820063', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 80, '', 'Physical Education & Life Skill Development'),
('1820064', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:03:59', '2018-10-30 07:03:59', 81, '', 'Physical Education & Life Skill Development'),
('1820065', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:04:00', '2018-10-30 07:04:00', 82, '', 'Physical Education & Life Skill Development'),
('1820066', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:04:00', '2018-10-30 07:04:00', 83, '', 'Physical Education & Life Skill Development'),
('1820096', 'system_does_not_track', '30-10-2018', '1540904638', 'Present', '2018-10-30 07:04:00', '2018-10-30 07:04:00', 84, '', 'Physical Education & Life Skill Development'),
('1820035', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 85, '', 'Physical Education & Life Skill Development'),
('1820036', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 86, '', 'Physical Education & Life Skill Development'),
('1820037', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 87, '', 'Physical Education & Life Skill Development'),
('1820038', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 88, '', 'Physical Education & Life Skill Development'),
('1820039', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 89, '', 'Physical Education & Life Skill Development'),
('1820040', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 90, '', 'Physical Education & Life Skill Development'),
('1820041', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 91, '', 'Physical Education & Life Skill Development'),
('1820042', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:49', '2018-10-31 22:55:49', 92, '', 'Physical Education & Life Skill Development'),
('1820043', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 93, '', 'Physical Education & Life Skill Development'),
('1820044', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 94, '', 'Physical Education & Life Skill Development'),
('1820045', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 95, '', 'Physical Education & Life Skill Development'),
('1820046', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 96, '', 'Physical Education & Life Skill Development'),
('1820047', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 97, '', 'Physical Education & Life Skill Development'),
('1820048', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 98, '', 'Physical Education & Life Skill Development'),
('1820048', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 99, '', 'Physical Education & Life Skill Development'),
('1820049', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 100, '', 'Physical Education & Life Skill Development'),
('1820050', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 101, '', 'Physical Education & Life Skill Development'),
('1820051', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 102, '', 'Physical Education & Life Skill Development'),
('1820052', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 103, '', 'Physical Education & Life Skill Development'),
('1820053', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 104, '', 'Physical Education & Life Skill Development'),
('1820054', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 105, '', 'Physical Education & Life Skill Development'),
('1820055', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 106, '', 'Physical Education & Life Skill Development'),
('1820056', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 107, '', 'Physical Education & Life Skill Development'),
('1820057', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 108, '', 'Physical Education & Life Skill Development'),
('1820058', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 109, '', 'Physical Education & Life Skill Development'),
('1820059', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 110, '', 'Physical Education & Life Skill Development'),
('1820060', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 111, '', 'Physical Education & Life Skill Development'),
('1820061', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 112, '', 'Physical Education & Life Skill Development'),
('1820062', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 113, '', 'Physical Education & Life Skill Development'),
('1820063', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 114, '', 'Physical Education & Life Skill Development'),
('1820064', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 115, '', 'Physical Education & Life Skill Development'),
('1820065', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 116, '', 'Physical Education & Life Skill Development'),
('1820066', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:50', '2018-10-31 22:55:50', 117, '', 'Physical Education & Life Skill Development'),
('1820096', 'system_does_not_track', '01-11-2018', '1541048149', 'Present', '2018-10-31 22:55:51', '2018-10-31 22:55:51', 118, '', 'Physical Education & Life Skill Development'),
('1820035', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:44', '2018-10-31 23:00:44', 119, '', 'Social Science'),
('1820036', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:44', '2018-10-31 23:00:44', 120, '', 'Social Science'),
('1820037', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:44', '2018-10-31 23:00:44', 121, '', 'Social Science'),
('1820038', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:44', '2018-10-31 23:00:44', 122, '', 'Social Science'),
('1820039', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:44', '2018-10-31 23:00:44', 123, '', 'Social Science'),
('1820040', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:44', '2018-10-31 23:00:44', 124, '', 'Social Science'),
('1820041', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 125, '', 'Social Science'),
('1820042', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 126, '', 'Social Science'),
('1820043', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 127, '', 'Social Science'),
('1820044', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 128, '', 'Social Science'),
('1820045', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 129, '', 'Social Science'),
('1820046', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 130, '', 'Social Science'),
('1820047', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 131, '', 'Social Science'),
('1820048', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 132, '', 'Social Science'),
('1820048', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 133, '', 'Social Science'),
('1820049', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 134, '', 'Social Science'),
('1820050', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 135, '', 'Social Science'),
('1820051', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 136, '', 'Social Science'),
('1820052', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 137, '', 'Social Science'),
('1820053', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 138, '', 'Social Science'),
('1820054', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 139, '', 'Social Science'),
('1820055', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 140, '', 'Social Science'),
('1820056', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 141, '', 'Social Science'),
('1820057', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 142, '', 'Social Science'),
('1820058', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 143, '', 'Social Science'),
('1820059', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 144, '', 'Social Science'),
('1820060', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:45', '2018-10-31 23:00:45', 145, '', 'Social Science'),
('1820061', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:46', '2018-10-31 23:00:46', 146, '', 'Social Science'),
('1820062', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:46', '2018-10-31 23:00:46', 147, '', 'Social Science'),
('1820063', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:46', '2018-10-31 23:00:46', 148, '', 'Social Science'),
('1820064', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:46', '2018-10-31 23:00:46', 149, '', 'Social Science'),
('1820065', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:46', '2018-10-31 23:00:46', 150, '', 'Social Science'),
('1820066', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:46', '2018-10-31 23:00:46', 151, '', 'Social Science'),
('1820096', 'system_does_not_track', '01-11-2018', '1541048444', 'Present', '2018-10-31 23:00:46', '2018-10-31 23:00:46', 152, '', 'Social Science');

-- --------------------------------------------------------

--
-- Table structure for table `exam_grade_list`
--

CREATE TABLE `exam_grade_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark_upto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_grade_list`
--

INSERT INTO `exam_grade_list` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `created_at`, `updated_at`) VALUES
(2, 'AB', '4.00', '70', '79', '2017-07-24 14:42:49', '2017-07-24 14:43:22'),
(3, 'A-', '3.50', '40', '69', '2017-07-24 14:43:14', '2017-08-26 03:59:41'),
(4, 'A+', '5.00', '80', '100', '2018-04-14 00:03:51', '2018-04-14 00:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `exam_list`
--

CREATE TABLE `exam_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exam_start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exam_end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_list`
--

INSERT INTO `exam_list` (`id`, `exam_name`, `controller`, `exam_start_date`, `exam_end_date`, `publish`, `created_at`, `updated_at`) VALUES
(9, 'Midterm Exam', '1539174032', '2018-10-01', '2018-10-31', 'Yes', '2018-10-10 06:24:34', '2018-10-10 06:24:34'),
(10, 'Final Exam', '1539174032', '2018-10-01', '2018-10-31', 'Yes', '2018-10-10 06:24:59', '2018-10-10 06:24:59'),
(11, 'Admission Test', '1539174032', '2018-10-01', '2018-10-31', 'Yes', '2018-10-10 07:03:10', '2018-10-10 07:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `journal_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `journal_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `asset_account` varchar(255) CHARACTER SET utf8 NOT NULL,
  `expense_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cheque_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `journal_title`, `journal_type`, `asset_account`, `expense_account`, `amount_method`, `bank_name`, `status`, `remark`, `created_at`, `updated_at`, `cheque_no`) VALUES
(1511269285, 'School Fund Income', 'Earnings', 'UCBL 0124E309-001N', '', 'Cash', '', 'Draft', 'School Fund', '2017-11-21 07:01:25', '2017-11-21 07:01:25', ''),
(1511279805, 'EXPENSE DETSAILS', 'Expense', 'UCBL 0124E309-001N', 'School Print Stationary ', 'cheque', 'UCBL', 'Submit', 'RESS', '2017-11-21 09:56:45', '2017-11-21 09:57:49', '0012');

-- --------------------------------------------------------

--
-- Table structure for table `expense_child`
--

CREATE TABLE `expense_child` (
  `expense_id` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allocate_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense_child`
--

INSERT INTO `expense_child` (`expense_id`, `purpose`, `amount`, `allocate_amount`, `party_name`, `created_at`, `updated_at`) VALUES
(1511269285, 'School Fund', '100000', '100000', 'Bida Niketon', '2017-11-21 07:01:25', '2017-11-21 07:01:25'),
(1511279805, 'PRINT', '10000', '10000', 'PRINT COMPANY', '2017-11-21 09:56:45', '2017-11-21 09:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `general_settings_id` int(11) NOT NULL,
  `system_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `system_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_eiin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `default_batch` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_session` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_exam_venue` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_exam_time` time DEFAULT NULL,
  `admission_exam_end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`general_settings_id`, `system_name`, `system_title`, `Phone`, `address`, `country`, `postal_code`, `school_eiin`, `created_at`, `updated_at`, `default_batch`, `default_session`, `admission_exam_venue`, `admission_exam_time`, `admission_exam_end_time`) VALUES
(1, ' TMSS INSTITUTE OF SCIENCE & ICT (TISI)', ' TMSS INSTITUTE OF SCIENCE & ICT (TISI)', '01709646569', 'Sujabad ( Dohopara  ) , Sajahanpur , Bogra ', 'Bangladesh', '5800', '0000', NULL, '2018-10-11 10:06:54', '2', '2018-2019', 'TISI Conference Room', '22:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `medium` varchar(191) CHARACTER SET utf8 NOT NULL,
  `class_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `department` varchar(191) CHARACTER SET utf8 NOT NULL,
  `student_roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `on_net_total` varchar(255) CHARACTER SET utf8 NOT NULL,
  `waber` varchar(255) CHARACTER SET utf8 NOT NULL,
  `waber_purpose` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Payment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `from_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `to_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `invoice_creator` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `form_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `cash_status` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `medium`, `class_name`, `department`, `student_roll`, `title`, `on_net_total`, `waber`, `waber_purpose`, `Payment`, `from_date`, `to_date`, `invoice_creator`, `created_at`, `updated_at`, `form_name`, `cash_status`) VALUES
(132, 'TISI', 'First Semester', 'Graphics Technology', '182006', 'Mst. Manisha Akter/182006-First Semester-Payment Invoice', '1200', '', '', '0', '2018-01-01', '2018-01-31', 'Md Abu Raihan', '2018-11-05 13:10:51', '2018-11-09 13:10:51', 'academic', ''),
(133, 'TISI', 'First Semester', 'Graphics Technology', '182006', 'Mst. Manisha Akter/182006-First Semester-Payment Invoice', '1400', '', '', '0', '2018-02-01', '2018-02-28', 'Md Abu Raihan', '2018-11-09 13:12:23', '2018-11-09 13:12:23', 'academic', ''),
(134, 'TISI', 'First Semester', 'Graphics Technology', '182006', 'Mst. Manisha Akter/182006-First Semester-Library Invoice', '500', '0', '', '0', '2018-1-01', '2018-1-31', 'Md Abu Raihan', '2018-11-13 10:46:12', '2018-11-13 10:46:12', 'library', ''),
(135, 'TISI', 'First Semester', 'Graphics Technology', '182006', 'Mst. Manisha Akter/182006-First Semester-Transport Invoice', '1200', '0', '', '0', '2018-11-01', '2018-11-31', 'Md Abu Raihan', '2018-11-21 07:43:26', '2018-11-21 07:43:26', 'transport', ''),
(136, 'TISI', 'First Semester', 'Graphics Technology', '182006', 'Mst. Manisha Akter/182006-First Semester-Transport Invoice', '700', '0', '', '0', '2018-3-01', '2018-3-31', 'Md Abu Raihan', '2018-11-21 08:02:57', '2018-11-21 08:02:57', 'transport', ''),
(137, 'TISI', 'First Semester', 'Graphics Technology', '182006', 'Mst. Manisha Akter/182006-First Semester-Dormitory Invoice', '3000', '0', '', '0', '2018-8-01', '2018-8-31', 'Md Abu Raihan', '2018-11-23 10:44:22', '2018-11-23 10:44:22', 'dormitory', ''),
(138, '', 'First Semester', 'Graphics Technology', '182006', 'Mst. Manisha Akter/182006/Canteen Payment', '340', '0', '0', '', '2018-11-01', '2018-11-30', 'Md Abu Raihan', '2018-11-23 11:06:22', '2018-11-23 11:06:22', 'canteen', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_child`
--

CREATE TABLE `invoice_child` (
  `invoice_child_id` int(11) NOT NULL,
  `invoice_id` varchar(191) NOT NULL,
  `component_id` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_child`
--

INSERT INTO `invoice_child` (`invoice_child_id`, `invoice_id`, `component_id`, `amount`, `created_at`, `updated_at`) VALUES
(111, '132', '1539255451', '500', '2018-11-05 13:10:51', '2018-11-09 13:10:51'),
(112, '132', '1539255467', '700', '2018-11-09 13:10:51', '2018-11-09 13:10:51'),
(113, '133', '1539255451', '400', '2018-11-03 13:12:23', '2018-11-09 13:12:23'),
(114, '133', '1539255467', '1000', '2018-11-09 13:12:23', '2018-11-09 13:12:23'),
(115, '134', '1539255814', '500', '2018-11-13 10:46:12', '2018-11-13 10:46:12'),
(116, '135', '1539257056', '1200', '2018-11-21 07:43:27', '2018-11-21 07:43:27'),
(117, '136', '1539257056', '700', '2018-11-21 08:02:57', '2018-11-21 08:02:57'),
(118, '137', '1539257207', '3000', '2018-11-23 10:44:22', '2018-11-23 10:44:22'),
(119, '138', '1539255552', '340', '2018-11-23 11:06:23', '2018-11-23 11:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_component`
--

CREATE TABLE `invoice_component` (
  `invoice_component_id` int(10) UNSIGNED NOT NULL,
  `component_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `set_max_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `set_min_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `income_account` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `asset_account` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_component`
--

INSERT INTO `invoice_component` (`invoice_component_id`, `component_name`, `set_max_value`, `set_min_value`, `payment_term`, `income_account`, `asset_account`, `created_at`, `updated_at`) VALUES
(1539255451, 'Admission Form', '', '', 'Cash', '105', '104', '2018-10-11 04:57:31', '2018-10-11 04:57:31'),
(1539255467, 'Admission Fee', '', '', 'Cash', '105', '104', '2018-10-11 04:57:47', '2018-10-11 04:57:47'),
(1539255489, 'Re - Admission Fee', '', '', 'Cash', '105', '104', '2018-10-11 04:58:09', '2018-10-11 04:58:09'),
(1539255506, 'Department Transfer Fee', '', '', 'Cash', '105', '104', '2018-10-11 04:58:26', '2018-10-11 04:58:26'),
(1539255552, 'Board Registration Fee ', '', '', 'Cash', '105', '104', '2018-10-11 04:59:12', '2018-10-11 04:59:12'),
(1539255706, 'Semester Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:01:46', '2018-10-11 05:01:46'),
(1539255743, 'Tuition Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:02:23', '2018-10-11 05:02:23'),
(1539255759, 'Development Fee ', '', '', 'Cash', '105', '104', '2018-10-11 05:02:39', '2018-10-11 05:02:39'),
(1539255780, 'Identity Card Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:03:00', '2018-10-11 05:03:00'),
(1539255814, 'Library & Lab Fee ', '', '', 'Cash', '105', '104', '2018-10-11 05:03:34', '2018-10-11 05:04:24'),
(1539255837, 'Library Card Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:03:57', '2018-10-11 05:04:49'),
(1539256598, 'Library & Lab Security ( Returnable )', '', '', 'Cash', '105', '104', '2018-10-11 05:16:38', '2018-10-11 05:16:38'),
(1539257024, 'Electricity Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:23:44', '2018-10-11 05:23:44'),
(1539257039, 'Garage Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:23:59', '2018-10-11 05:23:59'),
(1539257056, 'Transport Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:24:16', '2018-10-11 05:24:16'),
(1539257118, 'Sports / Milad / Cultural Acti / Others Fee ', '', '', 'Cash', '105', '104', '2018-10-11 05:25:18', '2018-10-11 05:25:18'),
(1539257133, 'Health Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:25:33', '2018-10-11 05:25:33'),
(1539257148, 'Service Charge ', '', '', 'Cash', '105', '104', '2018-10-11 05:25:48', '2018-10-11 05:25:48'),
(1539257207, 'Hostel Fee ', '', '', 'Cash', '105', '104', '2018-10-11 05:26:47', '2018-10-11 05:26:47'),
(1539257228, 'Money Receipts ', '', '', 'Cash', '105', '104', '2018-10-11 05:27:08', '2018-10-11 05:27:08'),
(1539257247, 'Mid Term Examination Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:27:27', '2018-10-11 05:27:27'),
(1539257303, 'Semester Final Examination Fee', '', '', 'Cash', '105', '104', '2018-10-11 05:28:23', '2018-10-11 05:28:23'),
(1539257349, 'Refered Examination Fee ', '', '', 'Cash', '105', '104', '2018-10-11 05:29:09', '2018-10-11 05:29:09'),
(1539257568, 'Late Fine ( Form Fill - up & Others )', '', '', 'Cash', '105', '104', '2018-10-11 05:32:48', '2018-10-11 05:32:48'),
(1539257590, 'Tie , Solider ', '', '', 'Cash', '105', '104', '2018-10-11 05:33:10', '2018-10-11 05:33:10'),
(1539257657, 'Appeared / Mark Sheet / Testimonial Fee ', '', '', 'Cash', '105', '104', '2018-10-11 05:34:17', '2018-10-11 05:34:17'),
(1539257673, 'Previous Due', '', '', 'Cash', '105', '104', '2018-10-11 05:34:33', '2018-10-11 05:34:33'),
(1539257701, 'Miscellaneous', '', '', 'Cash', '105', '104', '2018-10-11 05:35:01', '2018-10-11 05:35:01'),
(1540673832, 'Canteen Fee', '', '', 'Cash', '106', '2', '2018-10-27 14:57:12', '2018-10-27 14:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_templete`
--

CREATE TABLE `invoice_templete` (
  `id` int(10) UNSIGNED NOT NULL,
  `templete_json` text COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `default_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Not',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_month` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_templete`
--

INSERT INTO `invoice_templete` (`id`, `templete_json`, `class`, `medium`, `default_status`, `created_at`, `updated_at`, `from_date`, `to_date`, `total_month`) VALUES
(7, '{\"_method\":\"PUT\",\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"First Semester\",\"title\":\"Jan - Mar #1 Quarter For CST\",\"account_name\":\"Cash\\t\\t\",\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"total\":\"6500\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\"03\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'First Semester', 'TISI', 'Default', '2018-10-11 06:02:36', '2018-10-11 09:23:34', '01/01/2018', '03/01/2018', '3'),
(8, '{\"_method\":\"PUT\",\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"First Semester\",\"title\":\"APR - JUN #2 Quarter For CST\",\"account_name\":\"Cash\\t\\t\",\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"total\":\"6500\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'First Semester', 'TISI', 'Not', '2018-10-11 06:25:11', '2018-10-11 09:24:35', '04/01/2018', '06/01/2018', '3'),
(9, '{\"_method\":\"PUT\",\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"First Semester\",\"title\":\"JUL - SEP #1 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"total\":\"6500\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'First Semester', 'TISI', 'Not', '2018-10-11 06:34:36', '2018-10-11 09:30:54', '07/01/2018', '09/01/2018', '3'),
(10, '{\"_method\":\"PUT\",\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"First Semester\",\"title\":\"OCT - DEC #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"total\":\"6500\",\"from_date\":\"10\\/01\\/2018\",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'First Semester', 'TISI', 'Not', '2018-10-11 06:36:53', '2018-10-11 09:31:27', '10/01/2018', '12/01/2018', '3'),
(11, '{\"_token\":\"FM0ESBNkoi8x1at97KD4qjDBAFloMHpa5cEQlacI\",\"medium\":\"TISI\",\"class_name\":\"Second Semester\",\"title\":\"JAN - MAR Second Semester #1 For CST\",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\"03\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Second Semester', 'TISI', 'Default', '2018-10-11 06:38:41', '2018-10-11 06:55:00', '01/01/2018', '03/01/2018', '3'),
(12, '{\"_token\":\"FM0ESBNkoi8x1at97KD4qjDBAFloMHpa5cEQlacI\",\"medium\":\"TISI\",\"class_name\":\"Second Semester\",\"title\":\"APR - JUN Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"00\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Second Semester', 'TISI', 'Not', '2018-10-11 06:58:41', '2018-10-11 06:58:41', '04/01/2018', '06/01/2018', '3'),
(13, '{\"_token\":\"FM0ESBNkoi8x1at97KD4qjDBAFloMHpa5cEQlacI\",\"medium\":\"TISI\",\"class_name\":\"Second Semester\",\"title\":\"JUL - SEP Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Second Semester', 'TISI', 'Not', '2018-10-11 07:03:46', '2018-10-11 07:03:46', '07/01/2018', '09/01/2018', '3'),
(14, '{\"_token\":\"ueTVcEVdkZEw5qpvV2XPzNM5t9ERjTSuyBNr7ZJg\",\"medium\":\"TISI\",\"class_name\":\"Second Semester\",\"title\":\"OCT - DEC  Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"10\\/01\\/2018\",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"2\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Second Semester', 'TISI', 'Not', '2018-10-11 07:28:36', '2018-10-11 07:28:36', '10/01/2018', '12/01/2018', '2'),
(15, '{\"_method\":\"PUT\",\"_token\":\"WitwOaOUzZwRXFE8JiKqUeM7FjqwucbTEFgLHYTW\",\"medium\":\"TISI\",\"class_name\":\"Third Semester\",\"title\":\"JAN - MAR Second Semester #1 For CST\",\"account_name\":\"Cash\\t\\t\",\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"total\":\"6500\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\"02\\/01\\/2018\",\"total_month\":\"1\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"00\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"00\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Third Semester', 'TISI', 'Default', '2018-10-11 07:47:19', '2018-10-11 10:05:49', '01/01/2018', '02/01/2018', '1'),
(16, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Third Semester\",\"title\":\"APR - JUN Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"00\",\"0\",\"00000\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"00\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"00000\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"00000\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"00\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"00\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Third Semester', 'TISI', 'Not', '2018-10-11 07:49:46', '2018-10-11 07:49:46', '04/01/2018', '06/01/2018', '3'),
(17, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Third Semester\",\"title\":\"OCT - DEC  Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"00\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"1500\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"10\\/01\\/2018\",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"00\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"00\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"00\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"00\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"00\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Third Semester', 'TISI', 'Not', '2018-10-11 07:52:16', '2018-10-11 07:52:16', '10/01/2018', '12/01/2018', '3'),
(18, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Forth Semester\",\"title\":\"OCT - DEC  Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"10\\/01\\/2018\",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"00\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"00\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"00\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Forth Semester', 'TISI', 'Default', '2018-10-11 07:55:18', '2018-10-11 09:13:22', '10/01/2018', '12/01/2018', '3'),
(19, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Fifth Semester\",\"title\":\"OCT - DEC  Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"00\",\"0\",\"5000\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"1500\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"10\\/01\\/2018\",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"00\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"00\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"00\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"00\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"00\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"00\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"00\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"00\",\"Miscellaneous\":\"0\"}}', 'Fifth Semester', 'TISI', 'Default', '2018-10-11 07:57:04', '2018-10-11 09:13:32', '10/01/2018', '12/01/2018', '3'),
(20, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Sixth Semester\",\"title\":\"OCT - DEC  Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"00\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"10\\/01\\/2018\",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"00\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"00\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"00\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"00\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Sixth Semester', 'TISI', 'Default', '2018-10-11 07:58:35', '2018-10-11 09:13:39', '10/01/2018', '12/01/2018', '3'),
(21, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Seventh Semester\",\"title\":\"OCT - DEC  Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"00\",\"00\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"00\",\"00\",\"0\",\"00\",\"00\",\"0000\",\"1500\",\"00000\",\"00000000000\",\"000\",\"00\",\"0\",\"00\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\" 10\\/01\\/2018  \",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"00\",\"Re - Admission Fee\":\"00\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"00\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"00\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"00\",\"Service Charge \":\"00\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"00\",\"Money Receipts \":\"00\",\"Mid Term Examination Fee\":\"0000\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"00000\",\"Late Fine ( Form Fill - up & Others )\":\"00000000000\",\"Tie , Solider \":\"000\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"00\",\"Previous Due\":\"0\",\"Miscellaneous\":\"00\"}}', 'Seventh Semester', 'TISI', 'Default', '2018-10-11 08:00:06', '2018-10-11 09:13:46', ' 10/01/2018  ', '12/01/2018', '3'),
(22, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Eighth Semester\",\"title\":\"OCT - DEC  Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"00\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"00\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"10\\/01\\/2018\",\"to_date\":\"12\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"00\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"00\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"00\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"00\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Eighth Semester', 'TISI', 'Default', '2018-10-11 08:01:16', '2018-10-11 09:19:58', '10/01/2018', '12/01/2018', '3'),
(23, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Forth Semester\",\"title\":\"JUL - SEP Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"00\",\"5000\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"00\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"00\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"00\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"00\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"00\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"00\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Forth Semester', 'TISI', 'Not', '2018-10-11 08:03:03', '2018-10-11 08:03:03', '07/01/2018', '09/01/2018', '3'),
(24, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Fifth Semester\",\"title\":\"APR - JUN Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"00\",\"0\",\"5000\",\"0\",\"00\",\"\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"\",\"0\",\"0\",\"00\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"00\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"00\",\"Identity Card Fee\":\"\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"00\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"00\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Fifth Semester', 'TISI', 'Not', '2018-10-11 08:37:21', '2018-10-11 08:37:21', '04/01/2018', '06/01/2018', '3'),
(25, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Fifth Semester\",\"title\":\"JAN - MAR Second Semester #1 For CST\",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"00\",\"0\",\"000\",\"5000\",\"0\",\"00\",\"0000000\",\"00\",\"0\",\"00\",\"0\",\"0000000\",\"\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"\",\"0\",\"0\",\"0\",\"00\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\" 03\\/01\\/2018  \",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"00\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"000\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"00\",\"Identity Card Fee\":\"0000000\",\"Library & Lab Fee \":\"00\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"00\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0000000\",\"Transport Fee\":\"\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"00\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"00\",\"Miscellaneous\":\"0\"}}', 'Fifth Semester', 'TISI', 'Not', '2018-10-11 08:39:10', '2018-10-11 08:39:10', '01/01/2018', ' 03/01/2018  ', '3'),
(26, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Forth Semester\",\"title\":\"JAN - MAR Second Semester #1 For CST\",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"00\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"00\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\"03\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"00\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"00\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"00\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"00\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"\"}}', 'Forth Semester', 'TISI', 'Not', '2018-10-11 08:41:53', '2018-10-11 08:41:53', '01/01/2018', '03/01/2018', '3'),
(27, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Forth Semester\",\"title\":\"APR - JUN Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"00\",\"5000\",\"000\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"00\",\"\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"00\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"000\",\"Development Fee \":\"00\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"00\",\"Transport Fee\":\"\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"00\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"00\",\"Miscellaneous\":\"\"}}', 'Forth Semester', 'TISI', 'Not', '2018-10-11 08:45:08', '2018-10-11 08:45:08', '04/01/2018', '06/01/2018', '3');
INSERT INTO `invoice_templete` (`id`, `templete_json`, `class`, `medium`, `default_status`, `created_at`, `updated_at`, `from_date`, `to_date`, `total_month`) VALUES
(28, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Third Semester\",\"title\":\"JUL - SEP Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Third Semester', 'TISI', 'Not', '2018-10-11 08:53:03', '2018-10-11 08:53:03', '07/01/2018', '09/01/2018', '3'),
(29, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Fifth Semester\",\"title\":\"JUL - SEP Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"00\",\"0\",\"00\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"00\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"00\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"00\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Fifth Semester', 'TISI', 'Not', '2018-10-11 08:56:20', '2018-10-11 08:56:20', '07/01/2018', '09/01/2018', '3'),
(30, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Sixth Semester\",\"title\":\"JUL - SEP Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Sixth Semester', 'TISI', 'Not', '2018-10-11 08:58:04', '2018-10-11 08:58:04', '07/01/2018', '09/01/2018', '3'),
(31, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Sixth Semester\",\"title\":\"APR - JUN Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Sixth Semester', 'TISI', 'Not', '2018-10-11 08:59:23', '2018-10-11 08:59:23', '04/01/2018', '06/01/2018', '3'),
(32, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Sixth Semester\",\"title\":\"JAN - MAR Second Semester #1 For CST\",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\"03\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"00\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"00\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Sixth Semester', 'TISI', 'Not', '2018-10-11 09:00:50', '2018-10-11 09:00:50', '01/01/2018', '03/01/2018', '3'),
(33, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Seventh Semester\",\"title\":\"JUL - SEP Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"\",\"00\",\"1500\",\"0\",\"0\",\"0\",\"00\",\"0\",\"000\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"\",\"Mid Term Examination Fee\":\"00\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"00\",\"Previous Due\":\"0\",\"Miscellaneous\":\"000\"}}', 'Seventh Semester', 'TISI', 'Not', '2018-10-11 09:03:29', '2018-10-11 09:03:29', '07/01/2018', '09/01/2018', '3'),
(34, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Seventh Semester\",\"title\":\"APR - JUN Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"000\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Seventh Semester', 'TISI', 'Not', '2018-10-11 09:07:09', '2018-10-11 09:07:09', '04/01/2018', '06/01/2018', '3'),
(35, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Seventh Semester\",\"title\":\"JAN - MAR Second Semester #1 For CST\",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"00\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\"03\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"00\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"00\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"00\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Seventh Semester', 'TISI', 'Not', '2018-10-11 09:11:31', '2018-10-11 09:11:31', '01/01/2018', '03/01/2018', '3'),
(36, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Eighth Semester\",\"title\":\"JUL - SEP Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"07\\/01\\/2018\",\"to_date\":\"09\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"00\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Eighth Semester', 'TISI', 'Not', '2018-10-11 09:13:27', '2018-10-11 09:13:27', '07/01/2018', '09/01/2018', '3'),
(37, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Eighth Semester\",\"title\":\"APR - JUN Second Semester #2 Quarter \",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"04\\/01\\/2018\",\"to_date\":\"06\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"0\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"0\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Eighth Semester', 'TISI', 'Not', '2018-10-11 09:15:17', '2018-10-11 09:15:17', '04/01/2018', '06/01/2018', '3'),
(38, '{\"_token\":\"d1n6NtqImT94xW5M4KQZVyWUd8V67emdT5SmKOgZ\",\"medium\":\"TISI\",\"class_name\":\"Eighth Semester\",\"title\":\"JAN - MAR Second Semester #1 For CST\",\"account_name\":\"Cash\\t\\t\",\"component_value\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"5000\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"1500\",\"0\",\"0\",\"0\",\"00\",\"0\",\"0\"],\"component_name\":[\"Admission Form\",\"Admission Fee\",\"Re - Admission Fee\",\"Department Transfer Fee\",\"Board Registration Fee \",\"Semester Fee\",\"Tuition Fee\",\"Development Fee \",\"Identity Card Fee\",\"Library & Lab Fee \",\"Library Card Fee\",\"Library & Lab Security ( Returnable )\",\"Electricity Fee\",\"Garage Fee\",\"Transport Fee\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \",\"Health Fee\",\"Service Charge \",\"Poor Fund \",\"Hostel Fee \",\"Money Receipts \",\"Mid Term Examination Fee\",\"Semester Final Examination Fee\",\"Refered Examination Fee \",\"Late Fine ( Form Fill - up & Others )\",\"Tie , Solider \",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \",\"Previous Due\",\"Miscellaneous\"],\"total\":\"6500\",\"from_date\":\"01\\/01\\/2018\",\"to_date\":\"03\\/01\\/2018\",\"total_month\":\"3\",\"all_value\":{\"Admission Form\":\"0\",\"Admission Fee\":\"0\",\"Re - Admission Fee\":\"0\",\"Department Transfer Fee\":\"0\",\"Board Registration Fee \":\"0\",\"Semester Fee\":\"5000\",\"Tuition Fee\":\"0\",\"Development Fee \":\"0\",\"Identity Card Fee\":\"0\",\"Library & Lab Fee \":\"0\",\"Library Card Fee\":\"0\",\"Library & Lab Security ( Returnable )\":\"0\",\"Electricity Fee\":\"0\",\"Garage Fee\":\"0\",\"Transport Fee\":\"0\",\"Sports \\/ Milad \\/ Cultural Acti \\/ Others Fee \":\"00\",\"Health Fee\":\"0\",\"Service Charge \":\"0\",\"Poor Fund \":\"0\",\"Hostel Fee \":\"0\",\"Money Receipts \":\"0\",\"Mid Term Examination Fee\":\"0\",\"Semester Final Examination Fee\":\"1500\",\"Refered Examination Fee \":\"0\",\"Late Fine ( Form Fill - up & Others )\":\"0\",\"Tie , Solider \":\"0\",\"Appeared \\/ Mark Sheet \\/ Testimonial Fee \":\"00\",\"Previous Due\":\"0\",\"Miscellaneous\":\"0\"}}', 'Eighth Semester', 'TISI', 'Not', '2018-10-11 09:16:32', '2018-10-11 09:16:32', '01/01/2018', '03/01/2018', '3');

-- --------------------------------------------------------

--
-- Table structure for table `manage_class`
--

CREATE TABLE `manage_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numeric_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_teacher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_class`
--

INSERT INTO `manage_class` (`id`, `class_name`, `numeric_name`, `class_teacher`, `created_at`, `updated_at`) VALUES
(51, 'First Semester', '1st', ' H M Deloar Hussain ', '2018-10-07 19:44:44', '2018-10-07 19:44:44'),
(52, 'Second Semester', '2nd', ' H M Deloar Hussain ', '2018-10-07 19:45:01', '2018-10-07 19:45:01'),
(53, 'Third Semester', '3rd', ' H M Deloar Hussain ', '2018-10-07 19:45:18', '2018-10-07 19:45:18'),
(54, 'Forth Semester', '4th', ' H M Deloar Hussain ', '2018-10-07 19:45:31', '2018-10-07 19:45:31'),
(55, 'Fifth Semester', '5th', ' H M Deloar Hussain ', '2018-10-07 19:45:49', '2018-10-07 19:45:49'),
(56, 'Sixth Semester', '6th', ' H M Deloar Hussain ', '2018-10-07 19:46:04', '2018-10-07 19:46:04'),
(57, 'Seventh Semester', '7th', ' H M Deloar Hussain ', '2018-10-07 19:47:23', '2018-10-07 19:47:23'),
(58, 'Eighth Semester', '8th', ' H M Deloar Hussain ', '2018-10-07 19:47:46', '2018-10-07 19:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `manage_department`
--

CREATE TABLE `manage_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_department`
--

INSERT INTO `manage_department` (`id`, `department_name`, `class_name`, `medium`, `description`, `created_at`, `updated_at`) VALUES
(31, 'Computer Science & Technology', 'First Semester', 'TISI', '', '2018-10-10 06:05:10', '2018-10-10 06:05:10'),
(32, 'Computer Science & Technology', 'Second Semester', 'TISI', '', '2018-10-10 06:05:29', '2018-10-10 06:05:29'),
(33, 'Computer Science & Technology', 'Third Semester', 'TISI', '', '2018-10-10 06:05:43', '2018-10-10 06:05:43'),
(34, 'Computer Science & Technology', 'Forth Semester', 'TISI', '', '2018-10-10 06:05:50', '2018-10-10 06:05:50'),
(35, 'Computer Science & Technology', 'Fifth Semester', 'TISI', '', '2018-10-10 06:05:57', '2018-10-10 06:05:57'),
(36, 'Computer Science & Technology', 'Sixth Semester', 'TISI', '', '2018-10-10 06:06:03', '2018-10-10 06:06:03'),
(37, 'Computer Science & Technology', 'Seventh Semester', 'TISI', '', '2018-10-10 06:06:11', '2018-10-10 06:06:11'),
(38, 'Computer Science & Technology', 'Eighth Semester', 'TISI', '', '2018-10-10 06:06:21', '2018-10-10 06:06:21'),
(39, 'Graphics Technology ', 'First Semester', 'TISI', '', '2018-10-10 06:06:40', '2018-10-10 06:06:40'),
(40, 'Graphics Technology ', 'Second Semester', 'TISI', '', '2018-10-10 06:06:47', '2018-10-10 06:06:47'),
(41, 'Graphics Technology ', 'Third Semester', 'TISI', '', '2018-10-10 06:06:54', '2018-10-10 06:06:54'),
(42, 'Graphics Technology ', 'Forth Semester', 'TISI', '', '2018-10-10 06:07:02', '2018-10-10 06:07:02'),
(43, 'Graphics Technology ', 'Fifth Semester', 'TISI', '', '2018-10-10 06:07:15', '2018-10-10 06:07:15'),
(44, 'Graphics Technology ', 'Sixth Semester', 'TISI', '', '2018-10-10 06:07:22', '2018-10-10 06:07:22'),
(45, 'Graphics Technology ', 'Seventh Semester', 'TISI', '', '2018-10-10 06:07:30', '2018-10-10 06:07:30'),
(46, 'Graphics Technology ', 'Eighth Semester', 'TISI', '', '2018-10-10 06:07:48', '2018-10-10 06:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `manage_dormitory`
--

CREATE TABLE `manage_dormitory` (
  `manage_dormitory_id` int(11) NOT NULL,
  `dormitory_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_floor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_room_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_dormitory`
--

INSERT INTO `manage_dormitory` (`manage_dormitory_id`, `dormitory_title`, `dormitory_author`, `dormitory_no`, `dormitory_name`, `dormitory_floor`, `total_room_number`, `dormitory_location`, `description`, `created_at`, `updated_at`) VALUES
(1540205105, 'TISI Dormatory', 'Md. Imran Ali', '01', 'Bijoy', '01', '04', 'TISI Campus', 'N/A', '2018-10-22 04:45:05', '2018-10-22 04:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `manage_mark`
--

CREATE TABLE `manage_mark` (
  `exam_id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entry_here` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default_session` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish_status` varchar(45) COLLATE utf8_unicode_ci DEFAULT 'pendding'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_mark`
--

INSERT INTO `manage_mark` (`exam_id`, `exam_name`, `class_name`, `section`, `Department`, `subject`, `entry_here`, `default_session`, `created_at`, `updated_at`, `publish_status`) VALUES
(16, 'Frist Term Exam ', 'One', 'A', 'None', 'Bangla', 'Rahib Hasan', '', '2017-09-06 12:37:50', '2017-09-06 12:37:50', 'pendding'),
(17, '2 nd Term Exam ', 'Two', 'A', 'None', 'English Grammer', 'Rahib Hasan', '', '2017-09-11 12:25:42', '2017-09-11 12:25:42', 'pendding'),
(22, 'Admission Test ', 'One', 'A', 'Science', 'Bangla', 'Rahib Hasan', '2017-2018', '2018-03-13 09:51:59', '2018-03-13 09:51:59', 'pendding'),
(23, 'Admission Test ', 'One', 'A', 'Science', 'English', 'Rahib Hasan', '2017-2018', '2018-03-13 11:16:55', '2018-03-13 11:16:55', 'pendding'),
(24, 'Admission Test ', 'One', 'A', 'Science', 'Riligion', 'Rahib Hasan', '2017-2018', '2018-03-13 12:08:03', '2018-03-13 12:08:03', 'pendding'),
(25, 'Admission Test ', 'One', 'A', 'sss', 'Bangla', 'Rahib Hasan', '2017-2018', '2018-03-13 12:11:28', '2018-03-13 12:11:28', 'pendding'),
(26, 'Admission Test ', 'One', 'A', 'Science', 'Higher Mathematics', 'Rahib Hasan', '2017-2018', '2018-03-13 13:50:56', '2018-03-13 13:50:56', 'pendding'),
(27, 'Lab Test', 'One', 'A', 'None', 'Bangla', 'Rahib Hasan', '2017-2018', '2018-04-05 00:34:00', '2018-04-05 00:34:00', 'pendding'),
(28, 'Lab Test', 'One', 'A', 'Science', 'Bangla', 'Rahib Hasan', '2018-2019', '2018-04-14 00:11:12', '2018-04-14 00:11:12', 'pendding'),
(29, 'Midterm Exam', 'First Semester', 'General', 'Computer Science & Technology', 'Physical Education & Life Skill Development', 'Rahib Hasan', '2018-2019', '2018-10-10 07:47:08', '2018-10-10 07:47:08', 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `manage_mark_child`
--

CREATE TABLE `manage_mark_child` (
  `parents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exam_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cgpa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_mark_child`
--

INSERT INTO `manage_mark_child` (`parents`, `exam_id`, `roll`, `cgpa`, `grade_name`, `mark`, `comment`, `created_at`, `updated_at`) VALUES
('Admission Test ', '22', '1820014', '5.00', 'A+', '90', 'Good', '2018-03-13 09:51:59', '2018-03-13 12:39:41'),
('Admission Test ', '22', '1820015', '5.00', 'A+', '100', 'Best', '2018-03-13 09:51:59', '2018-03-13 15:04:51'),
('Admission Test ', '23', '1820014', '5.00', 'A+', '90', 'Bad', '2018-03-13 11:16:55', '2018-03-13 12:39:41'),
('Admission Test ', '23', '1820015', '5.00', 'A+', '100', 'Good', '2018-03-13 11:16:55', '2018-03-13 15:04:51'),
('Admission Test ', '24', '1820014', '5.00', 'A+', '90', 'Good', '2018-03-13 12:08:04', '2018-03-13 12:39:41'),
('Admission Test ', '24', '1820015', '5.00', 'A+', '100', 'Bad', '2018-03-13 12:08:04', '2018-03-13 15:04:51'),
('Admission Test ', '25', '1820016', '4.00', 'AB', '70', 'Not Good', '2018-03-13 12:11:28', '2018-03-13 12:11:28'),
('Admission Test ', '25', '1820017', '3.50', 'A-', '60', 'Not Good', '2018-03-13 12:11:29', '2018-03-13 12:11:29'),
('Admission Test ', '26', '1820014', '5.00', 'A+', '80', 'Good', '2018-03-13 13:50:56', '2018-03-13 13:50:56'),
('Admission Test ', '26', '1820015', '5.00', 'A+', '100', 'Not Good', '2018-03-13 13:50:57', '2018-03-13 15:04:51'),
('Lab Test', '27', '1720012', '5.00', 'A+', '90', 'good', '2018-04-05 00:34:01', '2018-04-05 00:34:01'),
('Lab Test', '28', '1820018', '4.00', 'AB', '70', 'Do Better', '2018-04-14 00:11:12', '2018-04-14 00:11:12'),
('Lab Test', '28', '1820019', '4.00', 'AB', '75', 'Do Better', '2018-04-14 00:11:13', '2018-04-14 00:11:13'),
('Lab Test', '28', '1820020', '5.00', 'A+', '80', 'Do Better', '2018-04-14 00:11:13', '2018-04-14 00:11:13'),
('Lab Test', '28', '1820021', '5.00', 'A+', '87', 'Do Better', '2018-04-14 00:11:13', '2018-04-14 00:11:39'),
('Midterm Exam', '29', '1820025', '5.00', 'A+', '80', '', '2018-10-10 07:47:08', '2018-10-10 07:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `manage_section`
--

CREATE TABLE `manage_section` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_section`
--

INSERT INTO `manage_section` (`id`, `section_name`, `nick_name`, `class`, `teacher`, `created_at`, `updated_at`) VALUES
(36, 'General', 'General', 'First Semester', 'Md Sohel Rana', '2018-10-10 07:09:41', '2018-10-10 07:09:41'),
(37, 'General', 'General', 'Second Semester', 'Md Sohel Rana', '2018-10-10 07:10:03', '2018-10-10 07:10:03'),
(38, 'General', 'General', 'Third Semester', ' H M Deloar Hussain ', '2018-10-10 07:10:16', '2018-10-10 07:10:16'),
(39, 'General', 'General', 'Forth Semester', 'Md Sohel Rana', '2018-10-10 07:10:31', '2018-10-10 07:10:31'),
(40, 'General', 'General', 'Fifth Semester', 'Md Sohel Rana', '2018-10-10 07:11:23', '2018-10-10 07:11:23'),
(41, 'General', 'General', 'Sixth Semester', ' H M Deloar Hussain ', '2018-10-10 07:11:36', '2018-10-10 07:11:36'),
(42, 'General', 'General', 'Seventh Semester', ' H M Deloar Hussain ', '2018-10-10 07:11:47', '2018-10-10 07:11:47'),
(43, 'General', 'General', 'Eighth Semester', ' H M Deloar Hussain ', '2018-10-10 07:12:00', '2018-10-10 07:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `manage_subject`
--

CREATE TABLE `manage_subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `teacher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_mark` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `subject_credit` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_subject`
--

INSERT INTO `manage_subject` (`id`, `subject_name`, `class`, `medium`, `type`, `teacher`, `user`, `created_at`, `updated_at`, `subject_code`, `subject_mark`, `subject_credit`, `department`, `section`) VALUES
(3, 'Bangla', 'One', 'English', '', 'Hasan', 'Rahib Hasan', '2017-06-05 12:19:02', '2018-10-04 08:16:38', '', '', '', '', ''),
(4, 'English', 'One', 'Bangla', '', 'Tania', 'Rahib Hasan', '2017-06-05 12:19:19', '2018-10-04 08:17:26', '', '', '', '', ''),
(6, 'English Grammer', 'Two', '', '', 'Hasan', 'Rahib Hasan', '2017-06-05 12:20:11', '2017-06-05 12:21:13', NULL, NULL, NULL, '', ''),
(8, 'Riligion', 'One', '', '', 'This Teacher Name ', 'Rahib Hasan', '2017-08-14 15:21:11', '2017-08-14 15:21:11', NULL, NULL, NULL, '', ''),
(9, 'Higher Mathematics', 'One', '', '', 'This Teacher Name ', 'Rahib Hasan', '2017-08-14 15:21:40', '2017-08-14 15:21:40', NULL, NULL, NULL, '', ''),
(10, 'Riligion', 'Two', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:22:52', '2017-08-14 15:22:52', NULL, NULL, NULL, '', ''),
(11, 'Drawing', 'Two', '', '', 'Hasan', 'Rahib Hasan', '2017-08-14 15:23:11', '2017-08-14 15:23:11', NULL, NULL, NULL, '', ''),
(12, 'Riligion', 'Three', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:23:36', '2017-08-14 15:23:36', NULL, NULL, NULL, '', ''),
(13, 'Drawing', 'Three', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:23:45', '2017-08-14 15:23:45', NULL, NULL, NULL, '', ''),
(14, 'Bangla', 'Three', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:24:09', '2017-08-14 15:24:09', NULL, NULL, NULL, '', ''),
(18, 'Riligion', 'Five', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:25:30', '2017-08-14 15:25:30', NULL, NULL, NULL, '', ''),
(19, 'Drawing', 'Five', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:25:36', '2017-08-14 15:25:36', NULL, NULL, NULL, '', ''),
(20, 'Bangla', 'Five', '', '', 'Hasan', 'Rahib Hasan', '2017-08-14 15:25:46', '2017-08-14 15:25:46', NULL, NULL, NULL, '', ''),
(21, 'Riligion', 'six', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:26:05', '2017-08-14 15:26:05', NULL, NULL, NULL, '', ''),
(22, 'Drawing', 'six', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:26:12', '2017-08-14 15:26:12', NULL, NULL, NULL, '', ''),
(23, 'Bangla', 'six', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:26:23', '2017-08-14 15:26:23', NULL, NULL, NULL, '', ''),
(24, 'Riligion', 'seven', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:26:41', '2017-08-14 15:26:41', NULL, NULL, NULL, '', ''),
(25, 'Drawing', 'seven', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:26:47', '2017-08-14 15:26:47', NULL, NULL, NULL, '', ''),
(26, 'Bangla', 'seven', '', '', 'Hasan', 'Rahib Hasan', '2017-08-14 15:26:56', '2017-08-14 15:26:56', NULL, NULL, NULL, '', ''),
(27, 'Riligion', 'Eight', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:27:12', '2017-08-14 15:27:12', NULL, NULL, NULL, '', ''),
(28, 'Drawing', 'Eight', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:27:19', '2017-08-14 15:27:19', NULL, NULL, NULL, '', ''),
(29, 'Bangla', 'Eight', '', '', 'Hasan', 'Rahib Hasan', '2017-08-14 15:27:26', '2017-08-14 15:27:26', NULL, NULL, NULL, '', ''),
(30, 'Bangla', 'Nine', '', '', 'Hasan', 'Rahib Hasan', '2017-08-14 15:27:43', '2017-08-14 15:27:43', NULL, NULL, NULL, '', ''),
(31, 'Higher Mathematics', 'Nine', '', '', 'Hasan', 'Rahib Hasan', '2017-08-14 15:27:53', '2017-08-14 15:27:53', NULL, NULL, NULL, '', ''),
(32, ' Mathematics', 'Nine', '', '', 'This Teacher Name ', 'Rahib Hasan', '2017-08-14 15:28:11', '2017-08-14 15:28:11', NULL, NULL, NULL, '', ''),
(33, 'Riligion', 'Ten', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:28:30', '2017-08-14 15:28:30', NULL, NULL, NULL, '', ''),
(34, 'Drawing', 'Ten', '', '', 'Tania', 'Rahib Hasan', '2017-08-14 15:28:35', '2017-08-14 15:28:35', NULL, NULL, NULL, '', ''),
(35, 'Higher Mathematics', 'Ten', '', '', 'Hasan', 'Rahib Hasan', '2017-08-14 15:29:33', '2017-08-14 15:29:33', NULL, NULL, NULL, '', ''),
(36, 'Bangla', 'Four', '', '', 'Mrs Samim Haolader', 'Rahib Hasan', '2017-11-03 13:34:50', '2017-11-03 13:34:50', '001', '100', '4', '', ''),
(37, 'English', 'Four', '', '', 'Mrs Samim Haolader', 'Rahib Hasan', '2017-11-03 13:35:29', '2017-11-03 13:35:29', '002', '100', '4', '', ''),
(38, 'Social Science', 'Four', '', '', 'Mrs Samim Haolader', 'Rahib Hasan', '2017-11-03 13:35:46', '2017-11-03 13:35:46', '003', '100', '4', '', ''),
(39, 'Math', 'Four', '', '', 'Mrs Samim Haolader', 'Rahib Hasan', '2017-11-03 13:36:09', '2017-11-03 13:36:09', '004', '100', '4', '', ''),
(40, 'Physic', 'Four', '', '', 'Mrs Samim Haolader', 'Rahib Hasan', '2017-11-03 13:36:36', '2017-11-03 13:36:36', '006', '100', '4', '', ''),
(41, 'Chesmistry', 'Four', '', '', 'Mrs Samim Haolader', 'Rahib Hasan', '2017-11-03 13:36:56', '2017-11-03 13:36:56', '005', '100', '5', '', ''),
(42, 'Bilogy', 'Four', '', '', 'Mrs Samim Haolader', 'Rahib Hasan', '2017-11-03 13:37:12', '2017-11-03 13:37:12', '007', '100', '4', '', ''),
(1539174343, 'Physical Education & Life Skill Development', 'First Semester', 'TISI', 'Tech', 'Md Sohel Rana', 'Demo', '2018-10-10 06:40:35', '2018-10-21 20:37:20', '65812', '50', '1', 'Computer Science & Technology', 'General'),
(1539175237, 'Social Science', 'First Semester', 'TISI', 'Tech', 'Rabya Khathun', 'Md Abu Raihan', '2018-10-10 06:41:39', '2018-10-31 22:58:20', '65811', '150', '3', 'Computer Science & Technology', 'General'),
(1539178157, 'Mathematics-1', 'First Semester', 'TISI', '', 'Md. Imran Ali', 'Jakiya Jafrin', '2018-10-10 07:29:52', '2018-10-11 09:33:26', '65911', '200', '4', '', ''),
(1539271906, 'Electrical Engineering Fundamentals', 'First Semester', 'TISI', '', 'Jakiya Jafrin', 'Jakiya Jafrin', '2018-10-11 09:33:11', '2018-10-11 09:33:11', '66712', '200', '4', '', ''),
(1539272019, 'Engineering Drawing', 'First Semester', 'TISI', '', 'Jakiya Jafrin', 'Jakiya Jafrin', '2018-10-11 09:34:39', '2018-10-11 09:34:39', '61011', '100', '2', '', ''),
(1539272579, 'Chemistry', 'First Semester', 'TISI', '', 'A.T.M Tazmilur Rahman', 'Jakiya Jafrin', '2018-10-11 09:44:29', '2018-10-11 09:44:29', '65913', '200', '4', '', ''),
(1539272726, 'Computer Application', 'First Semester', 'TISI', '', 'Md. Jubayer Hossain', 'Jakiya Jafrin', '2018-10-11 09:49:08', '2018-10-11 09:49:08', '66611', '100', '2', '', ''),
(1539272948, 'Basic Graphics Design', 'First Semester', 'TISI', '', 'Md. Shariful Islam', 'Jakiya Jafrin', '2018-10-11 09:50:54', '2018-10-11 09:50:54', '69611', '150', '3', '', ''),
(1539273064, 'Programming Essentials', 'Third Semester', 'TISI', '', 'Md. Jubayer Hossain', 'Jakiya Jafrin', '2018-10-11 09:53:10', '2018-10-11 09:53:10', '66631', '150', '3', '', ''),
(1539273191, 'Mathematics ‐III', 'Third Semester', 'TISI', '', 'Md. Imran Ali', 'Jakiya Jafrin', '2018-10-11 09:54:23', '2018-10-11 09:54:23', '65931', '200', '4', '', ''),
(1539273263, 'Image Preparation‐I', 'Third Semester', 'TISI', '', 'Md. Shariful Islam', 'Jakiya Jafrin', '2018-10-11 09:56:55', '2018-10-11 09:56:55', '69531', '150', '3', '', ''),
(1539273415, 'Basic Design & Drawing', 'Third Semester', 'TISI', '', 'Md Sohel Rana', 'Jakiya Jafrin', '2018-10-11 09:57:44', '2018-10-11 09:57:44', '69532', '100', '2', '', ''),
(1539273464, 'Database Application', 'Third Semester', 'TISI', '', 'Md Sohel Rana', 'Jakiya Jafrin', '2018-10-11 09:58:55', '2018-10-11 09:58:55', ' 66621', '100', '2', '', ''),
(1539273535, 'Physics‐2', 'Third Semester', 'TISI', '', 'Md. Muraduzzaman', 'Jakiya Jafrin', '2018-10-11 09:59:31', '2018-10-11 09:59:31', '65922', '200', '4', '', ''),
(1539273572, 'Communicative English', 'Third Semester', 'TISI', '', 'Md Sohel Rana', 'Jakiya Jafrin', '2018-10-11 10:00:21', '2018-10-11 10:00:21', '65722', '100', '2', '', ''),
(1539273622, 'Graphics Materials', 'Third Semester', 'TISI', '', 'Md. Arif Ahmed', 'Jakiya Jafrin', '2018-10-11 10:01:26', '2018-10-11 10:01:26', '69533', '150', '3', '', ''),
(1539273686, 'Graphics Design‐II', 'Third Semester', 'TISI', '', 'Md. Shariful Islam', 'Jakiya Jafrin', '2018-10-11 10:03:18', '2018-10-11 10:03:18', '66633', '100', '2', '', ''),
(1539273799, 'Digital Electronics', 'Third Semester', 'TISI', '', 'Shaima Hanif', 'Jakiya Jafrin', '2018-10-11 10:04:20', '2018-10-11 10:04:20', '66834', '200', '4', '', ''),
(1539273860, 'Web Design', 'Third Semester', 'TISI', '', 'Md. Masud Rana', 'Jakiya Jafrin', '2018-10-11 10:05:09', '2018-10-11 10:05:09', '66632', '100', '2', '', ''),
(1539274000, 'Computer Lab. Practice (IT support-I)', 'First Semester', 'TISI', '', 'Md. Masud Rana', 'Jakiya Jafrin', '2018-10-11 10:07:27', '2018-10-11 10:07:27', '66622', '100', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `manage_transport`
--

CREATE TABLE `manage_transport` (
  `transport_id` int(11) NOT NULL,
  `route_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_of_transport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_transport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `licence_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transport_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_seat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_transport`
--

INSERT INTO `manage_transport` (`transport_id`, `route_name`, `name_of_transport`, `number_of_transport`, `licence_no`, `start_date`, `transport_color`, `number_of_seat`, `created_at`, `updated_at`) VALUES
(1540911684, 'Dhaka', 'Ena', '234956', '222', '2018-10-01', 'Red', '30', '2018-10-30 09:01:24', '2018-10-30 09:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `roll_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reg_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `from_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `to_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`member_id`, `member_name`, `roll_number`, `reg_number`, `status`, `email`, `phone`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1540910954, 'Mst. Manisha Akter', '182006', '35', 'Active', '1820069', '01764716946', '2018-10-01', '2018-10-31', '2018-10-30 08:49:14', '2018-10-30 08:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2017_06_05_152146_entrust_setup_tables', 1),
(8, '2017_05_16_174106_aplicant_student', 1),
(9, '2017_05_26_093335_exam_list', 2),
(10, '2017_05_27_183540_manage_class', 3),
(11, '2017_05_28_224015_manage_section', 4),
(12, '2017_05_31_165126_manage_department', 5),
(13, '2017_05_23_200710_user_access', 6),
(14, '2017_05_26_173751_teacher', 6),
(15, '2017_05_28_105408_parents_info', 6),
(18, '2017_06_01_174336_academic_syllabus', 7),
(19, '2017_06_04_210025_manage_subject', 8),
(20, '2017_06_05_193710_route_inf', 9),
(21, '2017_06_05_194622_assign_transport', 10),
(22, '2017_06_20_195504_admit_student', 11),
(23, '2017_07_04_155239_create_accountant', 12),
(24, '2017_07_07_144848_create_chart_of_account', 12),
(25, '2017_07_11_155152_create_exam_grade', 12),
(26, '2017_07_21_064732_create_question_paper', 12),
(27, '2017_07_23_180933_create_upload_syllabus', 12),
(30, '2017_06_20_035154_table_apprisal_template', 14),
(31, '2017_06_21_103543_tble_apprisal', 14),
(34, '2017_06_16_200943_manage_dormitory', 15),
(36, '2017_06_21_103633_tble_apprisal_goals', 16),
(37, '2017_07_08_174300_tble_salary_slip', 16),
(38, '2017_07_24_195809_article', 16),
(39, '2017_07_28_185117_assign_dormitory', 16),
(42, '2017_07_30_193547_notice_board', 17),
(43, '2017_08_05_193530_salary_structure', 18),
(44, '2017_08_06_152438_salary_component', 19),
(45, '2017_08_07_175548_expense', 20),
(46, '2017_08_08_160949_manage_transport', 20),
(47, '2017_07_20_140829_templet_article', 21),
(50, '2017_08_11_192017_slary_slip', 22),
(51, '2017_07_21_175030_membership', 23),
(52, '2017_08_12_151140_article_info', 23),
(53, '2017_08_14_062511_article_issue', 23),
(54, '2017_08_10_192752_stock_article', 24),
(55, '2017_08_15_153131_article_recive', 25),
(57, '2017_09_06_092424_manage_mark', 26),
(58, '2017_09_15_122301_class_routine', 27),
(59, '2017_09_18_195433_invoice_templete', 28),
(60, '2017_06_02_173508_manage_transport', 29),
(63, '2017_09_22_191004_student_payment_entry', 30),
(64, '2017_09_22_192041_invoice_templete', 30),
(65, '2017_09_26_192924_daily_attendence', 31),
(66, '2017_09_27_143025_general_settings', 32),
(67, '2017_09_30_203331_ov_setup', 33);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notice_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Notice` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ov_setup`
--

CREATE TABLE `ov_setup` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ov_setup`
--

INSERT INTO `ov_setup` (`id`, `type`, `type_name`, `created_at`, `updated_at`) VALUES
(4, 'Job Type', 'Teacher', '2017-10-01 12:04:33', '2017-10-01 12:04:33'),
(5, 'work Department', 'Academic ', '2017-10-01 12:04:41', '2018-10-10 05:43:26'),
(6, 'Shift', '1st', '2017-10-01 12:04:48', '2017-10-01 12:04:48'),
(8, 'Batch', '1', '2017-10-03 15:28:25', '2017-10-11 13:07:03'),
(9, 'Batch', '2', '2017-10-03 15:28:51', '2017-10-11 13:07:12'),
(10, 'Shift', '2nd', '2017-10-05 12:53:16', '2017-10-05 12:53:16'),
(11, 'Shift', '3rd', '2017-10-06 13:34:33', '2017-10-06 13:34:33'),
(15, 'Job Type', 'Instructor  & Head Of Department', '2017-10-18 14:52:09', '2017-10-18 14:52:09'),
(16, 'Job Type', 'Head Of The Department', '2017-10-18 14:52:18', '2017-10-18 14:52:18'),
(17, 'Job Type', 'Junior Instructor', '2017-10-18 14:52:25', '2017-10-18 14:52:25'),
(18, 'Job Type', 'instructor', '2017-10-18 14:52:30', '2017-10-18 14:52:30'),
(19, 'Job Type', 'Guest Lecturar', '2017-10-18 14:52:36', '2017-10-18 14:52:36'),
(20, 'Job Type', 'Lab Assistant', '2017-10-18 14:52:43', '2017-10-18 14:52:43'),
(21, 'work Department', 'Administrative ', '2017-10-18 14:55:09', '2018-10-10 05:43:55'),
(22, 'work Department', 'Finance & Accounts ', '2017-10-18 14:55:15', '2018-10-10 05:44:14'),
(23, 'work Department', 'Canteen', '2017-10-18 14:55:20', '2018-10-10 05:44:28'),
(25, 'Session', '2017-2018', '2018-03-09 12:14:58', '2018-03-09 12:14:58'),
(29, 'Medium', 'TISI', '2018-10-10 05:33:45', '2018-10-10 05:33:45'),
(30, 'Medium', 'TFAUMCH', '2018-10-10 05:36:05', '2018-10-10 05:36:05'),
(31, 'Job Type', 'Principal', '2018-10-10 05:45:14', '2018-10-10 05:45:25'),
(32, 'Job Type', 'Vice Principal', '2018-10-10 05:45:39', '2018-10-10 05:45:39'),
(33, 'Session', '2018-2019', '2018-10-10 05:46:21', '2018-10-10 05:46:21'),
(34, 'work Department', 'Academic & Administrative', '2018-10-11 07:23:29', '2018-10-11 07:23:29'),
(35, 'work Department', 'Non Tech', '2018-10-11 08:59:26', '2018-10-11 08:59:26'),
(37, 'Job Type', 'Junior Instructor part time ', '2018-10-11 09:16:41', '2018-10-11 09:16:41'),
(38, 'Job Type', 'Instructor Part time ', '2018-10-11 09:16:55', '2018-10-11 09:16:55'),
(39, 'Job Type', 'Librarian', '2018-10-20 07:28:28', '2018-10-20 07:28:28'),
(40, 'Job Type', 'Computer Operator', '2018-10-20 07:29:02', '2018-10-20 07:29:02'),
(41, 'Job Type', 'Office Assistant', '2018-10-20 07:29:21', '2018-10-20 07:29:21'),
(42, 'Job Type', 'Admin ', '2018-10-20 07:29:31', '2018-10-20 07:29:31'),
(43, 'Job Type', 'Marketing Officer', '2018-10-20 07:29:50', '2018-10-20 07:29:50'),
(44, 'Job Type', 'MLS', '2018-10-20 07:29:58', '2018-10-20 07:29:58'),
(45, 'Job Type', 'Foreman', '2018-10-20 07:30:52', '2018-10-20 07:30:52'),
(46, 'Job Type', 'Canteen Manager', '2018-10-20 07:31:20', '2018-10-20 07:31:20'),
(47, 'Job Type', 'Store Keeper', '2018-10-21 06:46:48', '2018-10-21 06:46:48'),
(48, 'work Department', 'Library', '2018-10-21 10:35:33', '2018-10-21 10:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `parents_info`
--

CREATE TABLE `parents_info` (
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monthly_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parents_info`
--

INSERT INTO `parents_info` (`parent_id`, `name`, `email`, `password`, `phone`, `gender`, `profession`, `monthly_salary`, `created_at`, `updated_at`) VALUES
(1539264076, 'Late. Hafez Uddin', 'N/A', '$2y$10$opiZOOgSUvPd6D0WOqDqXORntKSc8NVR2AIR7vHSsosuxQfRjpxS.', '01727855569', 'Male', 'farmer', '10000', '2018-10-11 07:21:16', '2018-10-11 07:21:16'),
(1540133545, 'Abdul Aziz', '0', '$2y$10$/kVJWd5jkWQu1avQzQ.RZOquZrvBlw6CUbl0sDV9QnAoTgABDu6Vu', '01745579912', 'Male', '0', '10000', '2018-10-21 08:52:25', '2018-10-21 09:00:37'),
(1540134426, 'Aminul Haq', '02', '$2y$10$SVu8oj/CU./M46FuXMBg9OGV4kW3f5jfX6gnJgmmiAmfRl/71CIwu', '01712276556', 'Male', '0', '10000', '2018-10-21 09:07:06', '2018-10-21 09:07:06'),
(1540134915, 'Jakir Hossain', '03', '$2y$10$rnSx6a6jdT6N8foszyCDieqAOXDyKZ9XqNMOWzo6nosdYiFpR40j.', '01983619292', 'Male', '03', '10000', '2018-10-21 09:15:15', '2018-10-21 09:15:15'),
(1540135419, 'Md. Pares Fakir', '04', '$2y$10$jVnkQGfMzs5br65pADnOMOtM82vH3rvPDGMyqpXV.ESAVYlfcweqa', '01915306837', 'Male', '04', '10000', '2018-10-21 09:23:39', '2018-10-21 09:23:39'),
(1540136000, 'Shafiqul Islam', '07', '$2y$10$TF/chHTscQR/VYr740FHMOTWrVcMlB/XVU7ScWjmfWT.a6ESSSbBi', '01713528376', 'Male', '07', '10000', '2018-10-21 09:33:20', '2018-10-21 09:33:20'),
(1540136621, 'Md. Nazrul Islam', '08', '$2y$10$IDVK1lxcs6C2Ovj9m5re6.Y9R2vuPeX2ea8.OUuiWVKQFvIkBcr3y', '01723208444', 'Male', '08', '10000', '2018-10-21 09:43:41', '2018-10-21 09:43:41'),
(1540137329, 'Md. Masud Rana', '09', '$2y$10$W94lIGkBb1C.bjFBlCXiLetCAWVl1eaiG.dmxCZTBphASuHHPOiDu', '01750791165', 'Male', '09', '10000', '2018-10-21 09:55:29', '2018-10-21 09:55:29'),
(1540138202, 'Md. Joinal Abedin', '10', '$2y$10$UzwBQ6L/B87URrs7o1u9B.by4YfkdRJXTvqbgQmIKYlg5ELufPzVC', '01771504001', 'Male', '10', '10000', '2018-10-21 10:10:02', '2018-10-21 10:10:02'),
(1540138505, 'Md. Moian Uddin', '11', '$2y$10$l6FCkzzUSHfMv.OF21UTX.pcvomTtdau1RQV0qJQr.tIQl/qpqWKG', '01738401123', 'Male', '11', '10000', '2018-10-21 10:15:05', '2018-10-21 10:15:05'),
(1540139008, 'Md. Shamser Ali', '12', '$2y$10$biyWojYGQN.3Kv7I4gWHVuIt0jjty5leBLiTFbSQqpKfpwLr3G2zG', '01731142432', 'Male', '12', '10000', '2018-10-21 10:23:28', '2018-10-21 10:23:28'),
(1540200617, 'Harun Muhammad Afjal', '13', '$2y$10$DnRsWs5l6YlO4r6wocDfQesOrlshI7pkY0nbzsjJXcMmZoybHV74e', '01710055101', 'Male', '13', '10000', '2018-10-22 03:30:17', '2018-10-22 03:30:17'),
(1540201010, 'Md. Asrafuzzaman', '14', '$2y$10$Z9C22lqMfSOzreZCmWsJb.S1ftW0cOjMBUh2Uo8Wk1ith/r4j/6Ne', '01717181469', 'Male', '14', '10000', '2018-10-22 03:36:50', '2018-10-22 03:36:50'),
(1540201660, 'Md. Abdul Karim', '16', '$2y$10$xU9KR6zQzAfBl844FeEAz..OLjQeXJZwxggnX6Orc9egfuLSygoEy', '01933525017', 'Male', '16', '10000', '2018-10-22 03:47:40', '2018-10-22 03:47:40'),
(1540285171, 'Md. Abdur Razzak', '19', '$2y$10$D6vaXN8s.fwd73iQ/UvmMOXXF9EdH75zVjjO5XCw9qj7IF8dgo2BS', '01713720394', 'Male', '19', '10000', '2018-10-23 02:59:31', '2018-10-23 02:59:31'),
(1540285579, 'Md. Bablu', '22', '$2y$10$4AZjbEPpOo0m0MERbrldeOdxx1jkIcedeGTrRhb6hk2w7EZSlb2Om', '01722305583', 'Male', '22', '10000', '2018-10-23 03:06:19', '2018-10-23 03:06:19'),
(1540285936, 'Md. Hidar Ali', '23', '$2y$10$7TMqFkw0NUFqqrRADn3hROZoP24sZxGo9UbOMtRp3cK3pYJ/vG1LG', '01774887254', 'Male', '23', '10000', '2018-10-23 03:12:16', '2018-10-23 03:12:16'),
(1540286301, 'Md. Amjad Hossain', '24', '$2y$10$twNDXDCuAcUpRZ9y.u0vR.jKSuQsYTxf5wKjXJOGbBV1AwyK64e5a', '01740129411', 'Male', '24', '10000', '2018-10-23 03:18:21', '2018-10-23 03:18:21'),
(1540286760, 'Sowpon Chandra Saha', '25', '$2y$10$arsCsOPowxVGj.hBVLcyYO.g9G4vYjBwZQ4rakAo2U8DgVdiT0W7y', '01750021625', 'Male', '25', '10000', '2018-10-23 03:26:00', '2018-10-23 03:26:00'),
(1540287099, 'Md. Ashraful Alom ', '27', '$2y$10$nNtXxSA8zjVHCCexgdEDKeflB5nLZpDQMw68qFNiYNKQEDtj/PO9S', '01737332448', 'Male', '27', '10000', '2018-10-23 03:31:39', '2018-10-23 03:31:39'),
(1540287417, 'Md. Afzal Hossen', '28', '$2y$10$5bxHKD7EUjLRUuL8dtgTk.n3LekOzDQ62ht4nW3gIZPtJIFSCn.Oq', '01726009511', 'Male', '28', '10000', '2018-10-23 03:36:57', '2018-10-23 03:36:57'),
(1540288064, 'Md. Farhad Hossain', '29', '$2y$10$q1fE/3nfgABILsAYNlIsjetm9.jrijpJTs8rSUvQdZEIudogHC8X6', '01756422805', 'Male', '29', '10000', '2018-10-23 03:47:44', '2018-10-23 03:47:44'),
(1540288746, 'Dhiren Pahan', '31', '$2y$10$Q1A/dafE3JEdaHz3sv4Ex.UjQLJv8CE.5W03lhx0eOk1/lse89LQm', '01772880639', 'Male', '31', '10000', '2018-10-23 03:59:06', '2018-10-23 03:59:06'),
(1540289312, 'Md. Juyel Khandaker', '32', '$2y$10$2jZSMoZVDW5k9ppRF1H7F.E9XJ.Xbaj35VzmTIqRZy5gZZi/vXj.a', '01868370027', 'Male', '32', '10000', '2018-10-23 04:08:32', '2018-10-23 04:08:32'),
(1540289780, 'Md. Rafiqul Islam', '33', '$2y$10$d7qdlEPObX7q3j4iRS46mO7YMSjOF4qz19KuHskdQBXH6DEPFvM8e', '01741683023', 'Male', '33', '10000', '2018-10-23 04:16:20', '2018-10-23 04:16:20'),
(1540298657, 'Abdul Motin', '34', '$2y$10$gJGAew.qEkKJWubB1CXMUu/MCy7VxHqAGCj2RNnraUk3FFFOYGLEG', '01716989753', 'Female', '34', '10000', '2018-10-23 06:44:18', '2018-10-23 06:44:18'),
(1540299407, 'Rabindra Nath Sarma', '60', '$2y$10$4JWAYlgW6RBcx4Q0zTlJ9eqOIPDLdqqBOveeKhZTJUzLpywiWZgvu', '01746473215', 'Male', 'Farmer', '10000', '2018-10-23 06:56:47', '2018-10-23 06:56:47'),
(1540301970, 'Md. Saidul Islam', '61', '$2y$10$a/Goj5p8wUK7gnIRCEC2eukrQSiyqKJDTa66zblRUIerWKzpLDcfq', '01747262432', 'Male', 'Farmer', '10000', '2018-10-23 07:39:30', '2018-10-23 07:39:30'),
(1540302351, 'Md. Aminur Islam', '35', '$2y$10$xB6z8VdzbqyUTiw4hXGDLOayF3KBOWvuCazdpyEqI1hiX7fhoIaVK', '01764716946', 'Male', 'Farmer', '10000', '2018-10-23 07:45:51', '2018-10-23 07:45:51'),
(1540303011, 'Md. Atoar Rahman', '36', '$2y$10$azUEfSQaFa9m1Txszs/2NenllXM1A4lIFgLIKCu6U.pZ3Xi1JHbWu', '01701930189', 'Male', 'Farmer', '10000', '2018-10-23 07:56:51', '2018-10-23 07:56:51'),
(1540303772, 'Abdur Rahaman', '37', '$2y$10$rdjL7H6vqtHxCXf/wr7AcOyJLitjZQaHD8dV/0kMI9XTWXmX8fm/2', '01727590544', 'Male', 'Farmer', '10000', '2018-10-23 08:09:32', '2018-10-23 08:09:32'),
(1540304048, 'Md. Faruk Hossain', '38', '$2y$10$GlJV5/32InwvYUcXnuF4LuGF7n1nyMV/JNfPo6zTOSDb4.kPd.fBi', '01780587608', 'Male', 'Farmer', '10000', '2018-10-23 08:14:08', '2018-10-23 08:14:08'),
(1540304536, 'Anamul Hossain', '40', '$2y$10$ykUKRBH6pHUfL4LcCWyrfOq8a/iHI.mRJqj0IdFQdxXKG1PvA1SLS', '01729104010', 'Male', 'Farmer', '10000', '2018-10-23 08:22:16', '2018-10-23 08:22:16'),
(1540305034, 'Md. Osman Goni', '43', '$2y$10$wsUOrUcZzYQGqX62xgTdUOMIoiUko0exGwMiyzWRFTCDMKNZgFjeu', '01751723396', 'Male', 'Farmer', '10000', '2018-10-23 08:30:34', '2018-10-23 08:30:34'),
(1540305436, 'Md. Tofazzal Hossaen', '44', '$2y$10$kyPOcf3ANd.ZpPUO4wUWI.wklFAxgzVHOCUs5Loih1US5e/Eejqgu', '01732155308', 'Male', 'Farmer', '10000', '2018-10-23 08:37:16', '2018-10-23 08:37:16'),
(1540305874, 'Md. Abul Kalam Azad', '45', '$2y$10$gSx15H.n9K7PWywSnBKoeuUMCoQc7aG.1mzf/b0Oa13L2X5cIhkJi', '01722539611', 'Male', 'Farmer', '10000', '2018-10-23 08:44:34', '2018-10-23 08:44:34'),
(1540306386, 'Sunil Kumar', '48', '$2y$10$/45cKPxXcHGwxlzlsmKkae5/3N3tc9Hrbb4lTk8gTXNTagBOZ3xUO', '01733438004', 'Male', 'Farmer', '10000', '2018-10-23 08:53:06', '2018-10-23 08:53:06'),
(1540307072, 'Md. Abdul Aziz', '49', '$2y$10$1d8p0vka0Ef3WSCTiqAUvOhg9g62bnIDpP./.8TceLsXiB/BcBzT6', '01761521053', 'Male', 'Farmer', '10000', '2018-10-23 09:04:32', '2018-10-23 09:04:32'),
(1540307596, 'Wares Ali', '50', '$2y$10$Ay2v.AFkbGx3XnVFCRWGxevfSpz26qgWEt6AxqPsOSkdVwOqO7cIK', '01793780451', 'Male', 'Farmer', '10000', '2018-10-23 09:13:16', '2018-10-23 09:13:16'),
(1540308173, 'Md. Ahshan Habib Sarkar', '53', '$2y$10$B5qVhDMLlRn6ROvvyLd/IOEmrLf9SW67Vt/lthF/axHO8HNWBL4QS', '01782964346', 'Male', 'Farmer', '10000', '2018-10-23 09:22:53', '2018-10-23 09:22:53'),
(1540308738, 'Md. Motin Sarkar', '55', '$2y$10$TfxFuK.MOKwhZggkK7f.muFPX7G0zVIuYguomBGqZzk7nWc492NFK', '01724384385', 'Male', 'Farmer', '10000', '2018-10-23 09:32:18', '2018-10-23 09:32:18'),
(1540309266, 'Md. Ashadul Islam', '56', '$2y$10$fKEdkXW8mSrUrSRvOKlVV.FbK0yN9hsS5n/oF3JQKYKQ8/7yhU4wS', '01703202067', 'Male', 'Farmer', '10000', '2018-10-23 09:41:06', '2018-10-23 09:41:06'),
(1540309735, 'Md. Rafiqul Islam', '57', '$2y$10$0.ItuIWNv8vb4Q5mKa3EwuZ/PMAgu.Bp4KWi2CjJebnfZxYDuzQDC', '01732082406', 'Male', 'Farmer', '10000', '2018-10-23 09:48:55', '2018-10-23 09:48:55'),
(1540310147, 'Md. Solayman Ali', '59', '$2y$10$so6Crs7du0t7htWsPctGre/5mM2DcJHCSZBQNI2nqSdo8zU22BEyS', '01771671975', 'Male', 'Farmer', '10000', '2018-10-23 09:55:47', '2018-10-23 09:55:47'),
(1540483844, 'Md. Aftab Hossain Pk', '0172195625', '$2y$10$XGkFN.IScWvC72YTDAfzuOxEsFwhBMbRTRZ5NfPyK5PEZPOK2Q6zS', '0172195625', 'Male', 'Farmer', '10000', '2018-10-25 10:10:44', '2018-10-25 10:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `parents_info_child`
--

CREATE TABLE `parents_info_child` (
  `parent` int(11) NOT NULL,
  `post_office` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parents_info_child`
--

INSERT INTO `parents_info_child` (`parent`, `post_office`, `home_district`, `division`, `village_name`, `created_at`, `updated_at`) VALUES
(1539264076, 'Modonpur', 'Lalmonirhat', 'Rangpur', 'Modonpur', '2018-10-11 07:21:16', '2018-10-11 07:21:16'),
(1540133545, 'Mollikpur', 'Nougong', 'Rajshahi', 'Patiamlai', '2018-10-21 09:00:37', '2018-10-21 09:00:37'),
(1540134426, 'Malotinagar', 'Bogra', 'Bogra', 'Malotinagar', '2018-10-21 09:07:06', '2018-10-21 09:07:06'),
(1540134915, 'Baura', 'Lalmonirhat', 'Rangpur', 'Baura', '2018-10-21 09:15:15', '2018-10-21 09:15:15'),
(1540135419, 'Chamrul', 'Bogra', 'Rajshahi', 'Chamrul', '2018-10-21 09:23:39', '2018-10-21 09:23:39'),
(1540136000, 'Bhuapur', 'Tangail', 'Dhaka', 'Bhuapur', '2018-10-21 09:33:20', '2018-10-21 09:33:20'),
(1540136621, 'Chadmoha', 'Bogra', 'Rajshahi', 'Chadmoha', '2018-10-21 09:43:41', '2018-10-21 09:43:41'),
(1540137329, 'Gaptoli', 'Bogra', 'Rajshahi', 'Gaptoli', '2018-10-21 09:55:29', '2018-10-21 09:55:29'),
(1540138202, 'Bogra', 'Bogra', 'Rajshahi', 'Bogra', '2018-10-21 10:10:02', '2018-10-21 10:10:02'),
(1540138505, 'Dhunot', 'Bogra', 'Rajshahi', 'Dhunot', '2018-10-21 10:15:05', '2018-10-21 10:15:05'),
(1540139008, 'Chapi Nawabganj', 'Rajshahi', 'Rajshahi', 'Chapi Nawabganj', '2018-10-21 10:23:28', '2018-10-21 10:23:28'),
(1540200617, 'Gaibandha', 'Bogra', 'Rajshahi', 'Gaibandha', '2018-10-22 03:30:17', '2018-10-22 03:30:17'),
(1540201010, 'Thanthania', 'Bogra', 'Rajshahi', 'Thanthania', '2018-10-22 03:36:50', '2018-10-22 03:36:50'),
(1540201660, 'Shariyakandi', 'Bogra', 'Rajshahi', 'Shariyakandi', '2018-10-22 03:47:40', '2018-10-22 03:47:40'),
(1540285171, 'Potnotola', 'Nougong', 'Rajshahi', 'Potnotola', '2018-10-23 02:59:31', '2018-10-23 02:59:31'),
(1540285579, 'Domar', 'Nilphamari', 'Rangpur', 'Domar', '2018-10-23 03:06:19', '2018-10-23 03:06:19'),
(1540285936, 'Kanaikandor', 'Bogra', 'Rajshahi', 'Kanaikandor', '2018-10-23 03:12:16', '2018-10-23 03:12:16'),
(1540286301, 'Ghaibandha', 'Bogra', 'Rajshahi', 'Ghaibandha', '2018-10-23 03:18:21', '2018-10-23 03:18:21'),
(1540286760, 'Lalpur', 'Nator', 'Rajshahi', 'Lalpur', '2018-10-23 03:26:00', '2018-10-23 03:26:00'),
(1540287099, 'Gobindogonj', 'Gaibandha', 'Rajshahi', 'Gobindogonj', '2018-10-23 03:31:39', '2018-10-23 03:31:39'),
(1540287417, 'Perihat', 'Bogra', 'Rajshahi', 'Perihat', '2018-10-23 03:36:57', '2018-10-23 03:36:57'),
(1540288064, 'Potnitola', 'Nougong', 'Rajshahi', 'Potnitola', '2018-10-23 03:47:44', '2018-10-23 03:47:44'),
(1540288746, 'Bagdobe', 'Nougaon', 'Rajshahi', 'Bagdobe', '2018-10-23 03:59:06', '2018-10-23 03:59:06'),
(1540289312, 'Gobindogonj', 'Gaibandha', 'Rajshahi', 'Gobindogonj', '2018-10-23 04:08:32', '2018-10-23 04:08:32'),
(1540289780, 'Gaptoli', 'Bogra', 'Rajshahi', 'Gaptoli', '2018-10-23 04:16:20', '2018-10-23 04:16:20'),
(1540298658, 'Shahajahanpur', 'Bogra', 'Rajshahi', 'Madla', '2018-10-23 06:44:18', '2018-10-23 06:44:18'),
(1540299407, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 06:56:47', '2018-10-23 06:56:47'),
(1540301970, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 07:39:30', '2018-10-23 07:39:30'),
(1540302351, 'Pollimongle', 'Bogra', 'Rajshahi', 'Pollimongle', '2018-10-23 07:45:51', '2018-10-23 07:45:51'),
(1540303011, 'Kahalu', 'Bogra', 'Rajshahi', 'Kahalu', '2018-10-23 07:56:51', '2018-10-23 07:56:51'),
(1540303772, 'Panchagarh', 'Panchagarh', 'Rajshahi', 'Panchagarh', '2018-10-23 08:09:32', '2018-10-23 08:09:32'),
(1540304048, 'Dinajpur', 'Dinajpur', 'Rangpur', 'Dinajpur', '2018-10-23 08:14:08', '2018-10-23 08:14:08'),
(1540304536, 'Shiyalkol', 'Sirajganj', 'Rajshahi', 'Shiyalkol', '2018-10-23 08:22:16', '2018-10-23 08:22:16'),
(1540305034, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 08:30:34', '2018-10-23 08:30:34'),
(1540305436, 'Pollimongle', 'Bogra', 'Rajshahi', 'Pollimongle', '2018-10-23 08:37:16', '2018-10-23 08:37:16'),
(1540305874, 'Pollimongle', 'Bogra', 'Rajshahi', 'Pollimongle', '2018-10-23 08:44:34', '2018-10-23 08:44:34'),
(1540306386, 'Mahadebpur', 'Bogra', 'Rajshahi', 'Mahadebpur', '2018-10-23 08:53:06', '2018-10-23 08:53:06'),
(1540307072, 'Dupcaciya', 'Bogra', 'Rajshahi', 'Dupcaciya', '2018-10-23 09:04:32', '2018-10-23 09:04:32'),
(1540307596, 'Sabgram', 'Bogra', 'Rajshahi', 'Sabgram', '2018-10-23 09:13:16', '2018-10-23 09:13:16'),
(1540308173, 'Potnitola', 'Nougaon', 'Rangpur', 'Potnitola', '2018-10-23 09:22:53', '2018-10-23 09:22:53'),
(1540308738, 'Potnitola', 'Naogaon', 'Rangpur', 'Potnitola', '2018-10-23 09:32:18', '2018-10-23 09:32:18'),
(1540309266, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 09:41:06', '2018-10-23 09:41:06'),
(1540309735, 'Akkelpur', 'Joypurhat', 'Rangpur', 'Akkelpur', '2018-10-23 09:48:55', '2018-10-23 09:48:55'),
(1540310147, 'Chilmari', 'Kurigram', 'Rangpur', 'Chilmari', '2018-10-23 09:55:47', '2018-10-23 09:55:47'),
(1540483844, 'Malda', 'Bogra', 'Rajshahi', 'Nondogram', '2018-10-25 10:10:44', '2018-10-25 10:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `parent_notice_child`
--

CREATE TABLE `parent_notice_child` (
  `notice_id` int(11) NOT NULL,
  `pw_parents_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pw_parents_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pw_student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pw_student_roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shakil_461@outlook.com', '74c65f1210328f326d49e424e353c96378814c4857f19fa761405e473ba598e1', '2017-06-06 11:09:05'),
('admin@admin.com', '3cc07890334b6e841f9d38793c39374906aae39845afa71795e8e6cdfffed1fc', '2017-06-13 12:38:02'),
('rahibhasan689009@gmail.com', '9de0500e1f7478e6876023b560eaa694a6ce0a55a78cb22be734b7eb8e95845c', '2017-10-02 14:53:42'),
('shakilfci461@gmail.com', '7e60d1be34abc680fc70468fac70df7d70a1d155577c2a442032ca086547758f', '2018-09-29 10:48:47'),
('Sharifbdd@gmail.com', 'aa22b0c8999b3867dec0b0fd9bfac3be6a1d31e51cfc2b0a503a0acfcdd2cc46', '2018-10-21 06:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment_receipt`
--

CREATE TABLE `payment_receipt` (
  `payment_receipt_id` int(11) NOT NULL,
  `receipt_date` varchar(191) NOT NULL,
  `receipt_by` varchar(191) NOT NULL,
  `receipt_amount` varchar(191) NOT NULL,
  `student_roll` varchar(191) NOT NULL,
  `class` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_receipt`
--

INSERT INTO `payment_receipt` (`payment_receipt_id`, `receipt_date`, `receipt_by`, `receipt_amount`, `student_roll`, `class`, `created_at`, `updated_at`) VALUES
(1541790847, '2018-11-09', 'Md Abu Raihan', '300', '182006', 'First Semester', '2018-11-09 13:14:07', '2018-11-09 13:14:07'),
(1541790956, '2018-11-09', 'Md Abu Raihan', '200', '182006', 'First Semester', '2018-11-09 13:15:56', '2018-11-09 13:15:56'),
(1541791588, '2018-11-09', 'Md Abu Raihan', '500', '182006', 'First Semester', '2018-11-09 13:26:28', '2018-11-09 13:26:28'),
(1542901861, '2018-11-22', 'Md Abu Raihan', '1500', '182006', 'First Semester', '2018-11-22 09:51:01', '2018-11-22 09:51:01'),
(1542901862, '2018-11-22', 'Md Abu Raihan', '1500', '182006', 'First Semester', '2018-11-22 09:51:02', '2018-11-22 09:51:02'),
(1542903000, '2018-10-01', 'Md Abu Raihan', '300', '182006', 'First Semester', '2018-11-22 10:10:00', '2018-11-22 10:10:00'),
(1542987323, '2018-11-23', 'Md Abu Raihan', '200', '182006', 'First Semester', '2018-11-23 09:35:23', '2018-11-23 09:35:23'),
(1542990766, '2018-11-23', 'Md Abu Raihan', '200', '182006', 'First Semester', '2018-11-23 10:32:46', '2018-11-23 10:32:46'),
(1542991489, '2018-11-23', 'Md Abu Raihan', '500', '182006', 'First Semester', '2018-11-23 10:44:49', '2018-11-23 10:44:49'),
(1542993131, '2018-12-05', 'Md Abu Raihan', '200', '182006', 'First Semester', '2018-11-23 11:12:11', '2018-11-23 11:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `payment_receipt_child`
--

CREATE TABLE `payment_receipt_child` (
  `payment_receipt_child_id` int(11) NOT NULL,
  `payment_receipt_id` varchar(191) NOT NULL,
  `component_id` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_receipt_child`
--

INSERT INTO `payment_receipt_child` (`payment_receipt_child_id`, `payment_receipt_id`, `component_id`, `amount`, `created_at`, `updated_at`) VALUES
(1541089189, '1541790847', '1539255451', '300', '2018-11-03 13:14:07', '2018-11-09 13:14:07'),
(1541089190, '1541790956', '1539255451', '200', '2018-11-09 13:15:56', '2018-11-09 13:15:56'),
(1541089191, '1541791588', '1539255467', '500', '2018-11-09 13:26:28', '2018-11-09 13:26:28'),
(1541089192, '1542901861', '1539257056', '1500', '2018-11-22 09:51:01', '2018-11-22 09:51:01'),
(1541089193, '1542901862', '1539257056', '1500', '2018-11-22 09:51:02', '2018-11-22 09:51:02'),
(1541089194, '1542903000', '1539257056', '300', '2018-11-22 10:10:00', '2018-11-22 10:10:00'),
(1541089195, '1542987323', '1539255837', '200', '2018-11-23 09:35:23', '2018-11-23 09:35:23'),
(1541089196, '1542990766', '1539255814', '200', '2018-11-23 10:32:47', '2018-11-23 10:32:47'),
(1541089197, '1542991489', '1539257207', '500', '2018-11-23 10:44:49', '2018-11-23 10:44:49'),
(1541089198, '1542993131', '1540673832', '200', '2018-11-23 11:12:11', '2018-11-23 11:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'INSERT', 'INSERT', 'Content Permission', NULL, NULL),
(2, 'EDIT', 'EDIT', 'Content Permission', NULL, NULL),
(3, 'DELETE', 'DELETE', 'Content Permission', NULL, NULL),
(4, 'APROVE', 'APROVE', 'Content Permission', NULL, NULL),
(5, 'ROLE MANAGE', 'ROLE MANAGE', 'MODULE', NULL, NULL),
(6, 'STUDENTS', 'STUDENTS', 'MODULE', NULL, NULL),
(7, 'APPRISAL', 'APPRISAL', 'MODULE', NULL, NULL),
(8, 'TEACHER_AND_STAFF', 'TEACHER AND STAFF', 'MODULE', NULL, NULL),
(9, 'PARENT', 'PARENT', 'MODULE', NULL, NULL),
(10, 'CLASS', 'CLASS', 'MODULE', NULL, NULL),
(11, 'SUBJECT', 'SUBJECT', 'MODULE', NULL, NULL),
(12, 'CLASS_ROUTINE', 'CLASS ROUTINE', 'MODULE', NULL, NULL),
(13, 'DAILY_ATTENDENCE', 'DAILY ATTENDENCE', 'MODULE', NULL, NULL),
(14, 'EXAM', 'EXAM', 'MODULE', NULL, NULL),
(15, 'PAYROLL', 'PAYROLL', 'MODULE', NULL, NULL),
(16, 'ACCOUNTING', 'ACCOUNTING', 'MODULE', NULL, NULL),
(17, 'LIBRAY', 'LIBRAY', 'MODULE', NULL, NULL),
(18, 'TRANSPORT', 'TRANSPORT', 'MODULE', NULL, NULL),
(19, 'DORMITORY', 'DORMITORY', 'MODULE', NULL, NULL),
(20, 'NOTICEBOARD', 'NOTICEBOARD', 'MODULE', NULL, NULL),
(21, 'MESSAGES', 'MESSAGES', 'MODULE', NULL, NULL),
(22, 'SETTINGS', 'SETTINGS', 'MODULE', NULL, NULL),
(23, 'CREATE_ADMIN', 'CREATE ADMIN', 'Feature', NULL, NULL),
(24, 'CREATE_PERMISSION', 'CREATE PERMISSION', 'Feature', NULL, NULL),
(25, 'CREATE_ROLE', 'CREATE ROLE', 'Feature', NULL, NULL),
(26, 'PERMISSION ROLE', 'PERMISSION ROLE', 'Feature', NULL, NULL),
(27, 'USER_ACCESS', 'USER ACCESS', 'Feature', NULL, NULL),
(28, 'APPLICANT_STUDENTS', 'APPLICANT STUDENTS', 'Feature', NULL, NULL),
(29, 'APPLICANT_STUDNETS REPORT', 'APPLICANT STUDNETS REPORT', 'Feature', NULL, NULL),
(30, 'ADMISSION_TEST', 'ADMISSION TEST', 'Feature', NULL, NULL),
(31, 'ADMIT_STUDNETS', 'ADMIT STUDNETS', 'Feature', NULL, NULL),
(32, 'ADMIT_BULK STUDENTS', 'ADMIT BULK STUDENTS', 'Feature', NULL, NULL),
(33, 'STUDNETS_INFORMATION', 'STUDNETS INFORMATION', 'Feature', NULL, NULL),
(34, 'STUDENTS_PROMATION', 'STUDENTS PROMATION', 'Feature', NULL, NULL),
(35, 'STUDENT_APPRISAL', 'STUDENT APPRISAL', 'Feature', NULL, NULL),
(36, 'STUDENTS_APPRISAL TEMPLETE', 'STUDENTS APPRISAL TEMPLETE', 'Feature', NULL, NULL),
(37, 'APPRISAL_REPORT', 'APPRISAL REPORT', 'Feature', NULL, NULL),
(38, 'TEACHER', 'TEACHER', 'Feature', NULL, NULL),
(39, 'TEACHER REPORT', 'TEACHER REPORT', 'Feature', NULL, NULL),
(40, 'STAFF_INFORMATION', 'STAFF INFORMATION', 'Feature', NULL, NULL),
(41, 'STAFF_REPORT', 'STAFF REPORT', 'Feature', NULL, NULL),
(42, 'PARENTS', 'PARENTS', 'Feature', NULL, NULL),
(43, 'PARENTS_REPORT', 'PARENTS REPORT', 'Feature', NULL, NULL),
(44, 'MANAGE_CLASSES', 'MANAGE CLASSES', 'Feature', NULL, NULL),
(45, 'MANAGE_SECTIONS', 'MANAGE SECTIONS', 'Feature', NULL, NULL),
(46, 'ACADEMIC_SYLLABUS', 'ACADEMIC SYLLABUS', 'Feature', NULL, NULL),
(47, 'MANAGE_DEPARTMENT', 'MANAGE DEPARTMENT', 'Feature', NULL, NULL),
(48, 'ATTENDENCE_REPORT', 'ATTENDENCE REPORT', 'Feature', NULL, NULL),
(49, 'EXAM_GRADE', 'EXAM GRADE', 'Feature', NULL, NULL),
(50, 'EXAM_LIST', 'EXAM LIST', 'Feature', NULL, NULL),
(51, 'MANAGE_MARKS', 'MANAGE MARKS', 'Feature', NULL, NULL),
(52, 'TABULATION_SHEET', 'TABULATION SHEET', 'Feature', NULL, NULL),
(53, 'QUESTION_PAPER', 'QUESTION_PAPER', 'Feature', NULL, NULL),
(54, 'SALARY_SLIP', 'SALARY SLIP', 'Feature', NULL, NULL),
(55, 'SALARY_STRUCTURE', 'SALARY STRUCTURE', 'Feature', NULL, NULL),
(56, 'SLARY_COMPONENTS', 'SLARY COMPONENTS', 'Feature', NULL, NULL),
(57, 'ACCOUNTANT', 'ACCOUNTANT', 'Feature', NULL, NULL),
(58, 'CHART_OF_ACCOUNT', 'CHART OF ACCOUNT', 'Feature', NULL, NULL),
(59, 'CREATE_STUDENTS_PAYMENTS', 'CREATE STUDENTS PAYMENT', 'Feature', NULL, NULL),
(60, 'INVOICE', 'INVOICE', 'Feature', NULL, NULL),
(61, 'PAYMENT_HISTROY', 'PAYMENT HISTROY', 'Feature', NULL, NULL),
(62, 'EXPENSE', 'EXPENSE', 'Feature', NULL, NULL),
(63, 'EXPENSE_REPORT', 'EXPENSE REPORT', 'Feature', NULL, NULL),
(64, 'TEMPLETE_ARTICLE', 'TEMPLETE ARTICLE', 'Feature', NULL, NULL),
(65, 'STOCK_ARTICLE', 'STOCK ARTICLE', 'Feature', NULL, NULL),
(66, 'MANAGE_ARTICLE', 'ADMISSION TEST', 'Feature', NULL, NULL),
(67, 'MEMBERSHIP', 'MEMBERSHIP', 'Feature', NULL, NULL),
(68, 'ARTICLE_ISSUE', 'ARTICLE ISSUE', 'Feature', NULL, NULL),
(69, 'ARTICLE_RECIVED', 'ARTICLE RECIVED', 'Feature', NULL, NULL),
(70, 'ROUTE', 'ROUTE', 'Feature', NULL, NULL),
(71, 'MANAGE_TRANSPORT', 'MANAGE TRANSPORT', 'Feature', NULL, NULL),
(72, 'ASSIGN_TRANSPORT', 'ASSIGN TRANSPORT', 'Feature', NULL, NULL),
(73, 'MANAGE_DORMITORY', 'MANAGE DORMITORY', 'Feature', NULL, NULL),
(74, 'ASSIGN_DORMITORY', 'ASSIGN DORMITORY', 'Feature', NULL, NULL),
(75, 'PRINT', 'PRINT', 'Content Permission', NULL, NULL),
(76, 'DOWNLOAD', 'DOWNLOAD', 'Content Permission', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 32, '2018-04-05 00:23:57', '2018-04-05 00:23:57'),
(1, 41, '2017-10-03 12:01:45', '2017-10-03 12:01:45'),
(1, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(2, 32, '2018-04-05 00:46:33', '2018-04-05 00:46:33'),
(2, 41, '2017-10-03 12:20:21', '2017-10-03 12:20:21'),
(2, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(3, 32, '2018-04-13 23:59:31', '2018-04-13 23:59:31'),
(3, 41, '2017-10-03 12:21:45', '2017-10-03 12:21:45'),
(3, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(4, 32, '2018-04-04 22:41:51', '2018-04-04 22:41:51'),
(4, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(5, 32, '2017-10-03 10:30:48', '2017-10-03 10:30:48'),
(6, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(6, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(7, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(7, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(8, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(8, 42, '2018-10-11 08:46:32', '2018-10-11 08:46:32'),
(9, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(9, 42, '2018-10-11 07:13:55', '2018-10-11 07:13:55'),
(10, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(10, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(11, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(11, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(12, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(12, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(13, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(13, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(14, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(14, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(15, 32, '2018-04-04 22:55:41', '2018-04-04 22:55:41'),
(16, 32, '2018-04-04 22:55:42', '2018-04-04 22:55:42'),
(17, 32, '2018-04-04 22:55:42', '2018-04-04 22:55:42'),
(18, 32, '2018-04-04 22:55:42', '2018-04-04 22:55:42'),
(19, 32, '2018-04-04 22:55:42', '2018-04-04 22:55:42'),
(20, 32, '2018-04-04 22:55:42', '2018-04-04 22:55:42'),
(21, 32, '2018-04-04 22:55:42', '2018-04-04 22:55:42'),
(22, 32, '2018-04-04 22:55:42', '2018-04-04 22:55:42'),
(23, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(24, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(25, 32, '2018-04-04 22:37:06', '2018-04-04 22:37:06'),
(26, 32, '2018-04-04 22:37:06', '2018-04-04 22:37:06'),
(27, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(28, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(28, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(29, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(29, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(30, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(30, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(31, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(31, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(32, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(32, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(33, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(33, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(34, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(34, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(35, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(35, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(36, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(36, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(37, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(37, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(38, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(38, 41, '2018-10-11 08:44:52', '2018-10-11 08:44:52'),
(38, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(39, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(39, 41, '2018-10-11 08:44:52', '2018-10-11 08:44:52'),
(39, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(40, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(40, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(41, 32, '2018-04-04 22:56:26', '2018-04-04 22:56:26'),
(41, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(42, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(42, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(43, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(43, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(44, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(44, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(45, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(45, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(46, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(46, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(47, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(47, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(48, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(48, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(49, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(49, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(50, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(50, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(51, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(51, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(52, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(52, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(53, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(53, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(54, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(55, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(56, 32, '2018-04-04 22:56:27', '2018-04-04 22:56:27'),
(57, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(58, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(59, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(60, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(61, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(62, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(63, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(64, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(65, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(66, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(67, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(68, 32, '2018-04-04 22:56:28', '2018-04-04 22:56:28'),
(69, 32, '2018-04-04 22:56:29', '2018-04-04 22:56:29'),
(70, 32, '2018-04-04 22:56:29', '2018-04-04 22:56:29'),
(71, 32, '2018-04-04 22:56:29', '2018-04-04 22:56:29'),
(72, 32, '2018-04-04 22:56:29', '2018-04-04 22:56:29'),
(73, 32, '2018-04-04 22:56:29', '2018-04-04 22:56:29'),
(74, 32, '2018-04-04 22:56:29', '2018-04-04 22:56:29'),
(75, 32, '2018-04-05 00:22:15', '2018-04-05 00:22:15'),
(75, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(76, 32, '2018-04-04 23:33:55', '2018-04-04 23:33:55'),
(76, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_extension` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`id`, `exam_name`, `class_name`, `section_name`, `teacher_name`, `department`, `created_at`, `updated_at`, `file_extension`, `title`) VALUES
(1, 'Frist Term Exam ss', 'Two', 'A', 'Tania', 'Science ', '2017-08-09 15:13:00', '2017-08-09 15:13:00', 'pdf', 'frist-term-exam-ss-a-science');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(32, 'super_admin1', 'Super Admin1', 'Admin', '2017-06-08 10:34:19', '2017-06-08 11:01:28'),
(41, 'parent', 'Parent', 'Super Admin ss', '2017-06-08 10:55:14', '2017-10-03 11:47:09'),
(42, 'instructor', 'Instructor ', 'Instructor ', '2018-10-10 06:50:32', '2018-10-10 06:50:32'),
(44, 'librarian', 'Librarian', 'Librarian', '2018-10-24 07:31:19', '2018-10-24 07:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(47, 32, '2018-10-10 06:49:48', '2018-10-10 06:49:48'),
(48, 42, '2018-10-11 06:49:47', '2018-10-11 06:49:47'),
(49, 42, '2018-10-11 08:38:15', '2018-10-11 08:38:15'),
(50, 32, '2018-10-11 08:48:04', '2018-10-11 08:48:04'),
(51, 32, '2018-10-24 07:30:25', '2018-10-24 07:30:25'),
(53, 42, '2018-10-24 07:39:43', '2018-10-24 07:39:43'),
(54, 42, '2018-10-24 07:02:24', '2018-10-24 07:02:24'),
(56, 42, '2018-10-24 07:40:26', '2018-10-24 07:40:26'),
(58, 42, '2018-10-24 07:41:10', '2018-10-24 07:41:10'),
(59, 42, '2018-10-24 07:41:37', '2018-10-24 07:41:37'),
(60, 42, '2018-10-24 07:40:52', '2018-10-24 07:40:52'),
(63, 42, '2018-10-24 07:34:47', '2018-10-24 07:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE `roster` (
  `roster_id` int(11) NOT NULL,
  `date` varchar(191) CHARACTER SET utf8 NOT NULL,
  `student_roll` varchar(191) CHARACTER SET utf8 NOT NULL,
  `component_id` varchar(191) CHARACTER SET utf8 NOT NULL,
  `amount` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`roster_id`, `date`, `student_roll`, `component_id`, `amount`, `created_at`, `updated_at`) VALUES
(77, '2018-10-25', '182006', '1540148344', '50', '2018-10-26 16:59:44', '2018-10-26 10:59:44'),
(78, '2018-10-25', '1820035', '1540148344', '50', '2018-10-26 16:59:47', '2018-10-26 10:59:47'),
(79, '2018-10-25', '1820036', '1540148344', '60', '2018-10-26 16:59:49', '2018-10-26 10:59:49'),
(80, '2018-10-25', '1820037', '1540148344', '40', '2018-10-26 16:59:51', '2018-10-26 10:59:51'),
(81, '2018-10-25', '182006', '1540149072', '70', '2018-10-26 16:59:58', '2018-10-26 10:59:58'),
(82, '2018-10-25', '1820035', '1540149072', '70', '2018-10-26 17:00:01', '2018-10-26 11:00:01'),
(83, '2018-10-25', '1820036', '1540149072', '70', '2018-10-26 17:00:03', '2018-10-26 11:00:03'),
(84, '2018-10-25', '1820037', '1540149072', '70', '2018-10-26 17:00:06', '2018-10-26 11:00:06'),
(85, '2018-10-26', '182006', '1540148344', '50', '2018-10-26 17:11:23', '2018-10-26 11:11:23'),
(86, '2018-10-26', '1820035', '1540148344', '50', '2018-10-26 17:00:16', '2018-10-26 11:00:16'),
(87, '2018-10-26', '1820036', '1540148344', '50', '2018-10-26 17:00:18', '2018-10-26 11:00:18'),
(88, '2018-10-26', '182006', '1540149072', '100', '2018-10-26 17:11:27', '2018-10-26 11:11:27'),
(89, '2018-10-26', '1820035', '1540149072', '60', '2018-10-26 17:00:23', '2018-10-26 11:00:23'),
(90, '2018-10-26', '1820036', '1540149072', '60', '2018-10-26 17:00:25', '2018-10-26 11:00:25'),
(91, '2018-10-26', '182006', '1540149084', '100', '2018-10-26 17:11:30', '2018-10-26 11:11:30'),
(92, '2018-10-27', '182006', '1540148344', '25', '2018-10-27 05:47:09', '2018-10-26 23:47:09'),
(93, '2018-10-27', '1820035', '1540148344', '32', '2018-10-27 05:47:13', '2018-10-26 23:47:13'),
(94, '2018-10-27', '1820036', '1540148344', '30', '2018-10-27 05:47:16', '2018-10-26 23:47:16'),
(95, '2018-10-27', '1820037', '1540148344', '40', '2018-10-27 05:47:18', '2018-10-26 23:47:18'),
(96, '2018-10-27', '182006', '1540149072', '40', '2018-10-27 06:31:59', '2018-10-27 00:31:59'),
(97, '2018-10-27', '1820035', '1540149072', '48', '2018-10-27 06:32:00', '2018-10-27 00:32:00'),
(98, '2018-10-27', '1820036', '1540149072', '50', '2018-10-27 06:32:02', '2018-10-27 00:32:02'),
(99, '2018-10-27', '1820037', '1540149072', '50', '2018-10-27 06:32:04', '2018-10-27 00:32:04'),
(100, '2018-10-24', '182006', '1540148344', '30', '2018-10-27 06:28:29', '2018-10-27 00:28:29'),
(101, '2018-10-24', '182006', '1540149072', '0', '2018-10-27 06:31:41', '2018-10-27 00:28:31'),
(102, '2018-10-24', '1820035', '1540148344', '25', '2018-10-27 06:28:34', '2018-10-27 00:28:34'),
(103, '2018-10-24', '1820036', '1540148344', '30', '2018-10-27 06:28:37', '2018-10-27 00:28:37'),
(104, '2018-10-24', '1820037', '1540148344', '25', '2018-10-27 06:28:40', '2018-10-27 00:28:40'),
(105, '2018-10-24', '1820038', '1540148344', '28', '2018-10-27 06:28:42', '2018-10-27 00:28:42'),
(106, '2018-10-24', '1820039', '1540148344', '30', '2018-10-27 06:28:44', '2018-10-27 00:28:44'),
(107, '2018-10-24', '1820040', '1540148344', '35', '2018-10-27 06:28:46', '2018-10-27 00:28:46'),
(108, '2018-10-24', '1820041', '1540148344', '40', '2018-10-27 06:28:49', '2018-10-27 00:28:49'),
(109, '2018-10-24', '1820042', '1540148344', '45', '2018-10-27 06:28:51', '2018-10-27 00:28:51'),
(110, '2018-10-24', '1820043', '1540148344', '20', '2018-10-27 06:28:53', '2018-10-27 00:28:53'),
(111, '2018-10-27', '1820038', '1540148344', '30', '2018-10-27 06:29:49', '2018-10-27 00:29:49'),
(112, '2018-10-27', '1820039', '1540148344', '30', '2018-10-27 06:29:51', '2018-10-27 00:29:51'),
(113, '2018-10-27', '1820040', '1540148344', '30', '2018-10-27 06:29:53', '2018-10-27 00:29:53'),
(114, '2018-10-27', '1820041', '1540148344', '30', '2018-10-27 06:29:55', '2018-10-27 00:29:55'),
(115, '2018-10-27', '1820042', '1540148344', '40', '2018-10-27 06:29:57', '2018-10-27 00:29:57'),
(116, '2018-10-27', '1820043', '1540148344', '50', '2018-10-27 06:29:59', '2018-10-27 00:29:59'),
(117, '2018-10-27', '1820038', '1540149072', '55', '2018-10-27 06:32:06', '2018-10-27 00:32:06'),
(118, '2018-10-27', '1820039', '1540149072', '55', '2018-10-27 06:32:09', '2018-10-27 00:32:09'),
(119, '2018-10-27', '1820040', '1540149072', '56', '2018-10-27 06:32:12', '2018-10-27 00:32:12'),
(120, '2018-10-27', '1820041', '1540149072', '60', '2018-10-27 06:32:15', '2018-10-27 00:32:15'),
(121, '2018-10-27', '1820042', '1540149072', '70', '2018-10-27 06:32:17', '2018-10-27 00:32:17'),
(122, '2018-10-27', '1820043', '1540149072', '30', '2018-10-27 06:36:58', '2018-10-27 00:36:58'),
(123, '2018-10-01', '182006', '1540148344', '50', '2018-10-27 20:32:24', '2018-10-27 14:32:24'),
(124, '2018-10-01', '182006', '1540149072', '40', '2018-10-27 20:32:57', '2018-10-27 14:32:57'),
(125, '2018-10-01', '182006', '1540149084', '20', '2018-10-27 20:33:00', '2018-10-27 14:33:00'),
(126, '2018-11-01', '182006', '1540148344', '70', '2018-11-09 19:17:19', '2018-11-09 13:17:19'),
(127, '2018-11-16', '182006', '1540148344', '50', '2018-11-15 19:51:20', '2018-11-15 13:51:20'),
(128, '2018-11-16', '182006', '1540149072', '70', '2018-11-15 19:51:53', '2018-11-15 13:51:53'),
(129, '2018-11-16', '182006', '1540149084', '80', '2018-11-15 20:03:30', '2018-11-15 14:03:30'),
(130, '2018-11-16', '182006', '1540149099', '70', '2018-11-15 20:45:32', '2018-11-15 14:45:32'),
(131, '2018-11-16', '1820035', '1540148344', '250', '2018-11-15 20:45:44', '2018-11-15 14:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `roster_configuration`
--

CREATE TABLE `roster_configuration` (
  `id` int(11) NOT NULL,
  `default_component` varchar(191) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster_configuration`
--

INSERT INTO `roster_configuration` (`id`, `default_component`, `created_at`, `updated_at`) VALUES
(1540318856, '1539255552', '2018-10-27 20:31:49', '2018-10-27 14:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `route_info`
--

CREATE TABLE `route_info` (
  `route_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fare` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hour` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `route_info`
--

INSERT INTO `route_info` (`route_id`, `name`, `fare`, `distance`, `hour`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1540911644, 'Dhaka', '120', '2', '1', '1', '2', '2018-10-30 09:00:44', '2018-10-30 09:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `salary_component`
--

CREATE TABLE `salary_component` (
  `salary_component_id` int(10) UNSIGNED NOT NULL,
  `components_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_component`
--

INSERT INTO `salary_component` (`salary_component_id`, `components_name`, `abbr`, `type`, `created_at`, `updated_at`) VALUES
(15, 'Basic', 'B', 'Earning', '2018-10-10 14:49:22', '2018-10-10 14:49:22'),
(17, 'Medical', 'Medical', 'Earning', '2018-10-10 14:49:44', '2018-10-10 14:49:44'),
(18, 'Convey Allowance ', 'CA', 'Earning', '2018-10-10 14:50:17', '2018-10-10 14:50:17'),
(19, 'CPF ', 'CPF', 'Earning', '2018-10-10 14:50:29', '2018-10-10 14:50:29'),
(20, 'GIA', 'GIA', 'Earning', '2018-10-10 14:50:39', '2018-10-10 14:50:39'),
(21, 'BF', 'BF', 'Earning', '2018-10-10 14:50:50', '2018-10-10 14:50:50'),
(22, 'CPF - TMSS', 'CPF - TMSS ', 'Deduction', '2018-10-10 14:51:26', '2018-10-10 14:51:26'),
(23, 'CPF - OWN', 'CPF - OWN', 'Deduction', '2018-10-10 14:51:48', '2018-10-10 14:51:48'),
(24, 'GIA - TMSS', 'GIA - TMSS', 'Deduction', '2018-10-10 14:52:05', '2018-10-10 14:52:05'),
(25, 'GIA - OWN', 'GIA - OWN', 'Deduction', '2018-10-10 14:52:56', '2018-10-10 14:52:56'),
(26, 'BF - TMSS', 'BF - TMSS', 'Deduction', '2018-10-10 14:53:27', '2018-10-10 14:53:27'),
(27, 'BF - OWN', 'BF - OWN', 'Deduction', '2018-10-10 14:53:49', '2018-10-10 14:53:49'),
(28, 'Credit Allowance ', 'CRA', 'Earning', '2018-10-10 14:54:23', '2018-10-10 14:54:23'),
(29, 'City Allowance ', 'CITY Al', 'Earning', '2018-10-10 14:54:49', '2018-10-10 15:14:15'),
(30, 'Aya Allowance ', 'AAI', 'Earning', '2018-10-10 14:58:27', '2018-10-10 14:58:27'),
(31, 'House Rent ', 'HR', 'Earning', '2018-10-10 15:01:24', '2018-10-10 15:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `salary_slip`
--

CREATE TABLE `salary_slip` (
  `slip_id` int(11) NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payroll_frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posting_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_earning` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_deduction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gross_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_account` varchar(255) CHARACTER SET utf8 NOT NULL,
  `round_of` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salary_structure` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_slip`
--

INSERT INTO `salary_slip` (`slip_id`, `medium`, `type`, `person_id`, `person_name`, `payroll_frequency`, `posting_date`, `total_earning`, `total_deduction`, `gross_salary`, `payment_account`, `expense_account`, `round_of`, `created_at`, `updated_at`, `salary_structure`, `month`) VALUES
(91, 'TISI', 'Teacher', '1539174032', 'Md Sohel Rana', 'Monthly', '2018', '67760', '5040', '62720', '0', 'Salary		', '0', '2018-10-11 10:15:12', '2018-10-11 10:15:12', 'Grade 02 DED', 'January');

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure`
--

CREATE TABLE `salary_structure` (
  `payroll_structure_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_acount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_acount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_structure`
--

INSERT INTO `salary_structure` (`payroll_structure_id`, `title`, `status`, `frequency`, `payment_acount`, `expense_acount`, `created_at`, `updated_at`) VALUES
(1539206668, 'Grade 01 ED', 'Yes', 'Monthly', '0', 'Salary		', '2018-10-10 15:31:49', '2018-10-21 05:18:27'),
(1539219506, 'Grade 02 DED', 'Yes', 'Monthly', '0', 'Salary		', '2018-10-10 19:01:47', '2018-10-11 06:26:12'),
(1539257552, 'Grade 03 D', 'Yes', 'Monthly', '0', 'Salary		', '2018-10-11 05:33:47', '2018-10-11 06:28:21'),
(1539259154, 'Grade 04 JD-AD', 'Yes', 'Monthly', '0', 'Salary		', '2018-10-11 06:04:24', '2018-10-11 06:29:35'),
(1539259464, 'Grade 05 SZM-ABM', 'Yes', 'Monthly', '0', 'Salary		', '2018-10-11 06:11:04', '2018-10-11 06:30:31'),
(1539259865, 'Grade 06 SS-VO', 'Yes', 'Monthly', '0', 'Salary		', '2018-10-11 06:14:03', '2018-10-11 06:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure_deduction_component`
--

CREATE TABLE `salary_structure_deduction_component` (
  `parent` int(11) NOT NULL,
  `deduction_component_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deduction_formula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deduction_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_structure_deduction_component`
--

INSERT INTO `salary_structure_deduction_component` (`parent`, `deduction_component_name`, `deduction_formula`, `deduction_amount`, `created_at`, `updated_at`, `id`) VALUES
(1539206668, 'CPF - TMSS', 'Base*.10', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 21),
(1539206668, 'CPF - OWN', 'Base*.05', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 22),
(1539206668, 'GIA - TMSS', 'Base*.01', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 23),
(1539206668, 'GIA - OWN', 'Base*.005', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 24),
(1539206668, 'BF - TMSS', 'Base*.01', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 25),
(1539206668, 'BF - OWN', 'Base*.005', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 26),
(1539219506, 'CPF - TMSS', 'Base*.10', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 27),
(1539219506, 'CPF - OWN', 'Base*.05', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 28),
(1539219506, 'GIA - TMSS', 'Base*.01', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 29),
(1539219506, 'GIA - OWN', 'Base*.005', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 30),
(1539219506, 'BF - TMSS', 'Base*.01', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 31),
(1539219506, 'BF - OWN', 'Base*.005', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 32),
(1539257552, 'CPF - TMSS', 'Base*.10', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 33),
(1539257552, 'CPF - OWN', 'Base*.05', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 34),
(1539257552, 'GIA - TMSS', 'Base*.01', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 35),
(1539257552, 'GIA - OWN', 'Base*.005', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 36),
(1539257552, 'BF - TMSS', 'Base*.01', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 37),
(1539257552, 'BF - OWN', 'Base*.005', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 38),
(1539259154, 'CPF - TMSS', 'Base*.10', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 39),
(1539259154, 'CPF - OWN', 'Base*.05', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 40),
(1539259154, 'GIA - TMSS', 'Base*.01', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 41),
(1539259154, 'GIA - OWN', 'Base*.005', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 42),
(1539259154, 'BF - TMSS', 'Base*.01', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 43),
(1539259154, 'BF - OWN', 'Base*.005', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 44),
(1539259464, 'CPF - TMSS', 'Base*.10', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 45),
(1539259464, 'CPF - OWN', 'Base*.05', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 46),
(1539259464, 'GIA - TMSS', 'Base*.01', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 47),
(1539259464, 'GIA - OWN', 'Base*.005', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 48),
(1539259464, 'BF - TMSS', 'Base*.01', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 49),
(1539259464, 'BF - OWN', 'Base*.005', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 50),
(1539259865, 'CPF - TMSS', 'Base*.10', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 51),
(1539259865, 'CPF - OWN', 'Base*.05', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 52),
(1539259865, 'GIA - TMSS', 'Base*.01', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 53),
(1539259865, 'GIA - OWN', 'Base*.005', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 54),
(1539259865, 'BF - TMSS', 'Base*.01', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 55),
(1539259865, 'BF - OWN', 'Base*.005', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 56);

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure_earning_component`
--

CREATE TABLE `salary_structure_earning_component` (
  `parent` int(11) NOT NULL,
  `earn_component_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `earn_formula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `earn_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_structure_earning_component`
--

INSERT INTO `salary_structure_earning_component` (`parent`, `earn_component_name`, `earn_formula`, `earn_amount`, `created_at`, `updated_at`, `id`) VALUES
(1539206668, 'Basic', 'Base.*1', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 34),
(1539206668, 'Medical', 'Base*.20', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 35),
(1539206668, 'Convey Allowance ', 'Base*.10', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 36),
(1539206668, 'CPF ', 'Base*.10', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 37),
(1539206668, 'GIA', 'Base*.01', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 38),
(1539206668, 'BF', 'Base*.01', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 39),
(1539206668, 'Credit Allowance ', 'Base*.0', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 40),
(1539206668, 'City Allowance ', 'Base*.0', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 41),
(1539206668, 'Aya Allowance ', 'Base*.10', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 42),
(1539206668, 'House Rent ', 'Base*.95', '', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 43),
(1539219506, 'Basic', 'Base.*1', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 44),
(1539219506, 'Medical', 'Base*.20', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 45),
(1539219506, 'Convey Allowance ', 'Base*.10', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 46),
(1539219506, 'CPF ', 'Base*.10', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 47),
(1539219506, 'GIA', 'Base*.01', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 48),
(1539219506, 'BF', 'Base*.01', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 49),
(1539219506, 'Credit Allowance ', 'Base.*0', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 50),
(1539219506, 'City Allowance ', 'Base*.0', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 51),
(1539219506, 'Aya Allowance ', 'Base*.10', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 52),
(1539219506, 'House Rent ', 'Base*.90', '', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 53),
(1539257552, 'Basic', 'Base.*1', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 54),
(1539257552, 'Medical', 'Base*.20', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 55),
(1539257552, 'Convey Allowance ', 'Base*.10', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 56),
(1539257552, 'CPF ', 'Base*.10', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 57),
(1539257552, 'GIA', 'Base*.01', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 58),
(1539257552, 'BF', 'Base*.01', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 59),
(1539257552, 'Credit Allowance ', 'Base*.0', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 60),
(1539257552, 'City Allowance ', 'Base*.0', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 61),
(1539257552, 'Aya Allowance ', 'Base*.10', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 62),
(1539257552, 'House Rent ', 'Base*.85', '', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 63),
(1539259154, 'Basic', 'Base.*1', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 64),
(1539259154, 'Medical', 'Base*.20', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 65),
(1539259154, 'Convey Allowance ', 'Base*.10', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 66),
(1539259154, 'CPF ', 'Base*.10', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 67),
(1539259154, 'GIA', 'Base*.01', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 68),
(1539259154, 'BF', 'Base*.01', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 69),
(1539259154, 'Credit Allowance ', 'Base*.0', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 70),
(1539259154, 'City Allowance ', 'Base*.0', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 71),
(1539259154, 'Aya Allowance ', 'Base*.10', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 72),
(1539259154, 'House Rent ', 'Base*.80', '', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 73),
(1539259464, 'Basic', 'Base.*1', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 74),
(1539259464, 'Medical', 'Base*.20', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 75),
(1539259464, 'Convey Allowance ', 'Base*.10', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 76),
(1539259464, 'CPF ', 'Base*.10', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 77),
(1539259464, 'GIA', 'Base*.01', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 78),
(1539259464, 'BF', 'Base*.01', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 79),
(1539259464, 'Credit Allowance ', 'Base*.0', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 80),
(1539259464, 'City Allowance ', 'Base*.0', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 81),
(1539259464, 'Aya Allowance ', 'Base*.10', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 82),
(1539259464, 'House Rent ', 'Base*.50', '', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 83),
(1539259865, 'Basic', 'Base.*1', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 84),
(1539259865, 'Medical', 'Base*.20', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 85),
(1539259865, 'Convey Allowance ', 'Base*.10', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 86),
(1539259865, 'CPF ', 'Base*.10', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 87),
(1539259865, 'GIA', 'Base*.01', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 88),
(1539259865, 'BF', 'Base*.01', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 89),
(1539259865, 'Credit Allowance ', 'Base*.0', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 90),
(1539259865, 'City Allowance ', 'Base*.0', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 91),
(1539259865, 'Aya Allowance ', 'Base*.0', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 92),
(1539259865, 'House Rent ', 'Base*.50', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 93);

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure_teacher_staff_details`
--

CREATE TABLE `salary_structure_teacher_staff_details` (
  `parent` int(11) NOT NULL,
  `teacher_or_staff_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `variable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_structure_teacher_staff_details`
--

INSERT INTO `salary_structure_teacher_staff_details` (`parent`, `teacher_or_staff_name`, `from_date`, `base`, `variable`, `created_at`, `updated_at`, `id`) VALUES
(1539206668, '1539174032', '2018-10-10', '74000', '0', '2018-10-10 15:31:49', '2018-10-21 05:18:27', 14),
(1539219506, '1539174032', '2018-10-11', '28000', '0', '2018-10-10 19:01:47', '2018-10-11 06:26:12', 15),
(1539257552, '1538963058', '2018-10-11', '5000', '0', '2018-10-11 05:33:47', '2018-10-11 06:28:21', 16),
(1539259154, '1538963058', '2018-10-11', '23000', '0', '2018-10-11 06:04:24', '2018-10-11 06:29:35', 17),
(1539259464, '1538963058', '2018-10-11', '11500', '0', '2018-10-11 06:11:04', '2018-10-11 06:30:31', 18),
(1539259865, '1538963058', '2018-10-11', '5000', '', '2018-10-11 06:14:03', '2018-10-11 06:30:59', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `name`, `info`, `create_at`, `updated_at`) VALUES
(1, 'ORSMS', '{\"username\":\"01865801556\",\"password\":\"84513\",\"mask\":\"i-school\",\"option\":\"active\"}', '2018-11-11 05:09:10', '2018-11-10 23:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `stock_article`
--

CREATE TABLE `stock_article` (
  `stock_id` int(11) NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_article`
--

INSERT INTO `stock_article` (`stock_id`, `article_name`, `language`, `author`, `isbn`, `stock_date`, `publisher`, `price_details`, `net_price`, `purchase_price`, `discount`, `quantity`, `created_at`, `updated_at`) VALUES
(1540202697, 'Mathematics-3', 'Bangla', 'Md. Delower Hossain Mia', '65931', '2018-02-08', 'Technical Prokashoni', '300', '300', '0', '37%', '50', '2018-10-22 04:06:56', '2018-10-22 04:06:56'),
(1540207090, 'Bangla', 'Bangla', 'D. MM Mizanur Rahman', 'N/A', '2018-08-02', 'Technical Prokashoni', '160', '160', '0', '37%', '55', '2018-10-22 05:20:48', '2018-10-22 05:20:48'),
(1540207249, 'Communicative English', 'English', 'Md.Iqbal hossain', 'N/A', '2018-07-28', 'Technical Prokashoni', '232', '232', '0', '37%', '50', '2018-10-22 05:27:18', '2018-10-22 05:27:18'),
(1540207638, 'Analog Electronics', 'Bangla', 'Md.Ziaul karim', 'N/A', '2018-02-08', 'Technical Prokashoni', '300', '300', '0', '37%', '30', '2018-10-22 05:29:11', '2018-10-22 05:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_name` int(20) NOT NULL,
  `relation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reg_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `birth_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `section` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `department` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `session` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `batch` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `shift` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `medium` varchar(191) CHARACTER SET utf8 NOT NULL,
  `applicant_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `reponsible_teacher` varchar(191) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `parent_name`, `relation`, `roll`, `class`, `reg_number`, `birth_date`, `gender`, `phone`, `mobile`, `status`, `created_at`, `updated_at`, `type`, `section`, `department`, `email`, `password`, `session`, `batch`, `shift`, `medium`, `applicant_id`, `reponsible_teacher`) VALUES
(1, 'Md. Abu Tarek', 0, '', '1810001', 'Third Semester', '813447', '', '', '', '', 'Active', '2018-10-11 09:11:50', '2018-10-11 09:11:50', NULL, 'General', 'Computer Science & Technology', '1810001', '$2y$10$BWX0eXQND5XXMDRSTQaf8.E7TmHqWLA/SoUpBM', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(2, 'Mst. Hashi Akter', 0, '', '1810002', 'Third Semester', '813446', '', '', '', '', 'Active', '2018-10-11 09:12:48', '2018-10-11 09:12:48', NULL, 'General', 'Computer Science & Technology', '1810002', '$2y$10$GRTbBwdL2GhudgDnPH6n.Ods6LVjhkaVqTypfO', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(3, 'Md. Mehedi Hasan', 0, '', '1810003', 'Third Semester', '813444', '', '', '', '', 'Active', '2018-10-11 09:14:16', '2018-10-11 09:14:16', NULL, 'General', 'Computer Science & Technology', '1810003', '$2y$10$7fqWg701Urzg8ORDvTwXDOkyHtgFlanB.DwYri', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(4, 'Hojorot Ali', 0, '', '1810004', 'Third Semester', '813443', '', '', '', '', 'Active', '2018-10-11 09:14:16', '2018-10-11 09:14:16', NULL, 'General', 'Computer Science & Technology', '1810004', '$2y$10$wf1j2PRDtRF9aWgmP/oAgOMnsNJThjnTo8Y5MZ', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(5, 'Anisul Ashikin', 0, '', '1810005', 'Third Semester', '813442', '', '', '', '', 'Active', '2018-10-11 09:22:07', '2018-10-11 09:22:07', NULL, 'General', 'Computer Science & Technology', '1810005', '$2y$10$xB2XuTT7L8qilvcjTiQOpOhlPcEoczEpuNfVFL', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(6, 'Md. Mangudur Rahman', 0, '', '1810006', 'Third Semester', '813440', '', '', '', '', 'Active', '2018-10-11 09:22:07', '2018-10-11 09:22:07', NULL, 'General', 'Computer Science & Technology', '1810006', '$2y$10$95uRCchsty2H667tMCwOmeBAcvl9WbQG3eWuJ0', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(7, 'Md. Ziaul Haque Uddom', 0, '', '1810007', 'Third Semester', '813439', '', '', '', '', 'Active', '2018-10-11 09:22:07', '2018-10-11 09:22:07', NULL, 'General', 'Computer Science & Technology', '1810007', '$2y$10$BIomfEmYzp200PPaWx5r1OT8.XXOiSMPrcKA5T', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(8, 'Kamrul Hasan', 0, '', '1810008', 'Third Semester', '813438', '', '', '', '', 'Active', '2018-10-11 09:22:07', '2018-10-11 09:22:07', NULL, 'General', 'Computer Science & Technology', '1810008', '$2y$10$pBNKeVGd4OrZXIcrir4wkO50CzPckTeUdoJb4h', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(9, 'Md. Ammar Hossain Selim', 0, '', '1810009', 'Third Semester', '813436', '', '', '', '', 'Active', '2018-10-11 09:28:22', '2018-10-11 09:28:22', NULL, 'General', 'Computer Science & Technology', '1810009', '$2y$10$gAM.7uedw0J1KlGXx.gP2u5tIWVT9ocO8V4D67', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(10, 'Md. Touhidur Rahman', 0, '', '1810010', 'Third Semester', '813433', '', '', '', '', 'Active', '2018-10-11 09:28:22', '2018-10-11 09:28:22', NULL, 'General', 'Computer Science & Technology', '1810010', '$2y$10$LZH4prPLDaz0vrwwbiVoQueJQfYF6LYyjqyCMb', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(11, 'Md. Al Hasnat Nahid', 0, '', '1810011', 'Third Semester', '813432', '', '', '', '', 'Active', '2018-10-11 09:28:22', '2018-10-11 09:28:22', NULL, 'General', 'Computer Science & Technology', '1810011', '$2y$10$XXQgZKB53gzRH/k2CsawC./zLlC4.B/Fp2Zfdc', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(12, 'Md. Yakhruzzaman Rony', 0, '', '1810012', 'Third Semester', '813431', '', '', '', '', 'Active', '2018-10-11 09:28:22', '2018-10-11 09:28:22', NULL, 'General', 'Computer Science & Technology', '1810012', '$2y$10$9uJ98TrSs4Wo9MULk6WBFuYwTcWusjgMMCTyAb', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(13, 'Md. Moktarul Islam', 0, '', '1810013', 'Third Semester', '813430', '', '', '', '', 'Active', '2018-10-11 09:28:22', '2018-10-11 09:28:22', NULL, 'General', 'Computer Science & Technology', '1810013', '$2y$10$4y67EB.6qbOXLXwaqO48U.RqIP18tfnZYxKkLe', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(14, 'Md. Shojibul Islam', 0, '', '1810014', 'Third Semester', '813428', '', '', '', '', 'Active', '2018-10-11 09:28:22', '2018-10-11 09:28:22', NULL, 'General', 'Computer Science & Technology', '1810014', '$2y$10$dRXKm5b1ePtWjzhypNkOuunFc2zEjRWHiXBS0F', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(15, 'Md. Forhat Mamun', 0, '', '1810015', 'Third Semester', '813427', '', '', '', '', 'Active', '2018-10-11 09:48:36', '2018-10-11 09:48:36', NULL, 'General', 'Computer Science & Technology', '1810015', '$2y$10$xRSOEZdSq8pe7ZkOrYsLo.UYrKwkUmr99TJ9rZ', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(16, 'Rabeya Khatun', 0, '', '1810016', 'Third Semester', '813426', '', '', '', '', 'Active', '2018-10-11 09:48:36', '2018-10-11 09:48:36', NULL, 'General', 'Computer Science & Technology', '1810016', '$2y$10$Qd4.K8cDQ4lD6z2.dg.A5ekRU6RMo415pgRyh.', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(17, 'Md. Osman Goni', 0, '', '1810017', 'Third Semester', '813425', '', '', '', '', 'Active', '2018-10-11 09:48:36', '2018-10-11 09:48:36', NULL, 'General', 'Computer Science & Technology', '1810017', '$2y$10$A.zXpghabhNH2TQZ5lyU5uaoWOb1.4o2VT2kcQ', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(18, 'Rabbi Hasan', 0, '', '1810018', 'Third Semester', '813424', '', '', '', '', 'Active', '2018-10-11 09:48:37', '2018-10-11 09:48:37', NULL, 'General', 'Computer Science & Technology', '1810018', '$2y$10$S1AXRjtpkWnTLQjcyMqKheU0fNwoIozxbyI7QD', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(19, 'Md. Masud Rana', 0, '', '1810019', 'Third Semester', '813422', '', '', '', '', 'Active', '2018-10-11 09:48:37', '2018-10-11 09:48:37', NULL, 'General', 'Computer Science & Technology', '1810019', '$2y$10$LJ./0J0oZO5GowyrMLyAE.98QZMuW7gzi9W/qi', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(20, 'Deloyar Hossain', 0, '', '1810020', 'Third Semester', '813176', '', '', '', '', 'Active', '2018-10-11 09:48:37', '2018-10-11 09:48:37', NULL, 'General', 'Computer Science & Technology', '1810020', '$2y$10$fQfzBEbZBII72.9.MutOxezDhup/qEBIQF6VxX', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(21, 'Mst. Samima Akter', 0, '', '1810021', 'Third Semester', '813419', '', '', '', '', 'Active', '2018-10-11 10:00:28', '2018-10-11 10:00:28', NULL, 'General', 'Graphics Technology', '1810021', '$2y$10$GRlJkRtsSPeWdToG4eKkEunBunI/2LotgO0DZ.', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(22, 'Mst. Fatema Akter Mita', 0, '', '1810022', 'Third Semester', '813418', '', '', '', '', 'Active', '2018-10-11 10:00:28', '2018-10-11 10:00:28', NULL, 'General', 'Graphics Technology', '1810022', '$2y$10$A7euXpKpWZMw7v9RM/uRaejWOB46GhCG2CUvTS', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(23, 'Ashikur Rahman', 0, '', '1810023', 'Third Semester', '813417', '', '', '', '', 'Active', '2018-10-11 10:00:28', '2018-10-11 10:00:28', NULL, 'General', 'Graphics Technology', '1810023', '$2y$10$jFXqFmOKdfPvYrs77YkQ5uHGYAgitEMJ7OzMLq', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(24, 'Md. Jobayer Rahman', 0, '', '1810024', 'Third Semester', '813416', '', '', '', '', 'Active', '2018-10-11 10:00:28', '2018-10-11 10:00:28', NULL, 'General', 'Graphics Technology', '1810024', '$2y$10$JJz9wUPt3SAkr8egGQWXM.yoBB1VVuMT7KHMwy', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(25, 'Newton Bhormon', 0, '', '1810025', 'Third Semester', '813415', '', '', '', '', 'Active', '2018-10-11 10:00:29', '2018-10-11 10:00:29', NULL, 'General', 'Graphics Technology', '1810025', '$2y$10$kViR85ikE2X/kqQrziZG9u4dLU79/MhMe6HNA9', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(26, 'Md. Robiul Islam', 0, '', '1810026', 'Third Semester', '813414', '', '', '', '', 'Active', '2018-10-11 10:00:29', '2018-10-11 10:00:29', NULL, 'General', 'Graphics Technology', '1810026', '$2y$10$ItkH/mtoRFq4gMhKyW.V2u8f9p3ro0cHffj.Ld', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(27, 'Md. Pavel Ahmed', 0, '', '1810027', 'Third Semester', '813413', '', '', '', '', 'Active', '2018-10-11 10:04:32', '2018-10-11 10:04:32', NULL, 'General', 'Graphics Technology', '1810027', '$2y$10$zSt0ukyiz8vI9ichKfRfReHPWGYjneF8NmYGZu', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(28, 'Abdullah Al Galib', 0, '', '1810028', 'Third Semester', '813412', '', '', '', '', 'Active', '2018-10-11 10:04:32', '2018-10-11 10:04:32', NULL, 'General', 'Graphics Technology', '1810028', '$2y$10$27ylrSRoBChCs4MhoOD7EOyqh5aktu.rZC5W8i', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(29, 'Md. Abdullah Al Hadi', 0, '', '1810029', 'Third Semester', '813411', '', '', '', '', 'Active', '2018-10-11 10:04:32', '2018-10-11 10:04:32', NULL, 'General', 'Graphics Technology', '1810029', '$2y$10$ict5LXnwoSpGd9s0G.VIbOjCDriYCKgRlskgvc', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(30, 'Md. Tanvir Ahmed', 0, '', '1810030', 'Third Semester', '813405', '', '', '', '', 'Active', '2018-10-11 10:04:32', '2018-10-11 10:04:32', NULL, 'General', 'Graphics Technology', '1810030', '$2y$10$5aRS596JdQC.MROL8XAuR.uknG998TQ8iuwsfX', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(31, 'Md. Arif Hossain', 0, '', '1810031', 'Third Semester', '813407', '', '', '', '', 'Active', '2018-10-11 10:04:32', '2018-10-11 10:04:32', NULL, 'General', 'Graphics Technology', '1810031', '$2y$10$MGCYKe8RFqUTFXiJJ/uXaeLreiKmp/vHcWE1Fn', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(32, 'Md. Rakibul Islam', 0, '', '1810032', 'Third Semester', '813408', '', '', '', '', 'Active', '2018-10-11 10:04:33', '2018-10-11 10:04:33', NULL, 'General', 'Graphics Technology', '1810032', '$2y$10$3nDobgWApNjQb80g4J8jpu3dZ8SFtyVE4xUiUU', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(33, 'Md. Toufique Hasan', 0, '', '1810033', 'Third Semester', '813409', '', '', '', '', 'Active', '2018-10-11 10:04:33', '2018-10-11 10:04:33', NULL, 'General', 'Graphics Technology', '1810033', '$2y$10$NnzcMoWV0bo1BlDImGFrsuild3nRxLu5Xvs8GP', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(34, 'Md. Nahid Rana', 0, '', '1810034', 'Third Semester', '813410', '', '', '', '', 'Active', '2018-10-11 10:04:33', '2018-10-11 10:04:33', NULL, 'General', 'Graphics Technology', '1810034', '$2y$10$GMefc/6Cs.aCgj7lQqqnOej3ixDxodlBClo6Xj', '2017-2018', '1', '1st', 'TISI', NULL, ''),
(35, 'Shamima Khatun', 1540133545, 'Father', '1820035', 'First Semester', '1', '04/10/1999', 'Female', '', '', 'Active', '2018-10-15 08:57:31', '2018-10-21 09:00:37', 'Regular', 'General', 'Computer Science & Technology', '1820035', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(36, 'Anika Tahseen', 1540134426, 'Father', '1820036', 'First Semester', '2', '12/19/1998', 'Female', '', '', 'Active', '2018-10-15 08:57:31', '2018-10-21 09:08:55', 'Regular', 'General', 'Computer Science & Technology', '1820036', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(37, 'Ziaul Haque', 1540134915, 'Father', '1820037', 'First Semester', '3', '01/11/2000', 'Male', '', '01983619292', 'Active', '2018-10-15 08:57:31', '2018-10-21 09:17:18', 'Regular', 'General', 'Computer Science & Technology', '1820037', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(38, 'Rahima Khatun', 1540135419, 'Father', '1820038', 'First Semester', '4', '07/08/2000', 'Female', '', '01732369578', 'Active', '2018-10-15 08:57:31', '2018-10-21 09:27:11', 'Regular', 'General', 'Computer Science & Technology', '1820038', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(39, 'ZAGAD BANDU', 0, '', '1820039', 'First Semester', '5', '', '', '', '', 'Active', '2018-10-15 08:57:32', '2018-10-15 08:57:32', NULL, 'General', 'Computer Science & Technology', '1820039', '$2y$10$tnr2tEAC7jzkaft6e0bIEOZz3f/Amy4JmaEgVE', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(40, 'MD. MIZANUR RAHMAN', 0, '', '1820040', 'First Semester', '6', '', '', '', '', 'Active', '2018-10-15 08:57:32', '2018-10-15 08:57:32', NULL, 'General', 'Computer Science & Technology', '1820040', '$2y$10$rKG90MKezTKFKh5OKL/Y5Op0JXnHLKP1MC1q53', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(41, 'Md. Anik Mia ', 1540136000, 'Father', '1820041', 'First Semester', '7', '08/01/2001', 'Male', '', '01735113585', 'Active', '2018-10-15 08:57:32', '2018-10-22 04:51:19', 'Regular', 'General', 'Computer Science & Technology', '1820041', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(42, 'Md.Nazmul Hasan Sourov', 1540136621, 'Father', '1820042', 'First Semester', '8', '01/01/2003', 'Male', '', '01881746895', 'Active', '2018-10-15 08:57:32', '2018-10-22 04:59:17', 'Regular', 'General', 'Computer Science & Technology', '1820042', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(43, 'Md. Mamunur Rahman', 1540137329, 'Father', '1820043', 'First Semester', '9', '07/06/2002', 'Male', '', '01771405817', 'Active', '2018-10-15 08:57:32', '2018-10-21 09:57:54', 'Regular', 'General', 'Computer Science & Technology', '1820043', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(44, 'MD. Nasir Uddin', 1540138202, 'Father', '1820044', 'First Semester', '10', '05/20/1998', 'Male', '', '01750810883', 'Active', '2018-10-15 08:57:32', '2018-10-21 10:11:32', 'Regular', 'General', 'Computer Science & Technology', '1820044', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(45, 'Mst. Moharani Khatun', 1540138505, 'Father', '1820045', 'First Semester', '11', '01/21/2003', 'Female', '', '01735286728', 'Active', '2018-10-15 08:57:32', '2018-10-21 10:16:45', 'Regular', 'General', 'Computer Science & Technology', '1820045', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(46, 'Md. Jisan Ahmed', 1540139008, 'Father', '1820046', 'First Semester', '12', '01/10/2001', 'Male', '', '01738529283', 'Active', '2018-10-15 08:57:32', '2018-10-21 10:25:08', 'Regular', 'General', 'Computer Science & Technology', '1820046', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(47, 'Faisal Muhammad Jahin ', 1540200617, 'Father', '1820047', 'First Semester', '13', '01/01/2003', 'Male', '', '01710098574', 'Active', '2018-10-15 09:02:52', '2018-10-22 03:32:20', 'Regular', 'General', 'Computer Science & Technology', '1820047', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(48, 'Md. Nazmus Sakib', 1540201010, 'Father', '1820048', 'First Semester', '14', '12/27/2003', 'Male', '', '01717181469', 'Active', '2018-10-15 09:02:52', '2018-10-22 03:38:48', 'Regular', 'General', 'Computer Science & Technology', '1820048', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(49, 'FERDUSI AKTER', 0, '', '1820048', 'First Semester', '15', '', '', '', '', 'Active', '2018-10-15 09:02:52', '2018-10-15 09:02:52', NULL, 'General', 'Computer Science & Technology', '1820048', '$2y$10$w6AOrTTH6nQzlMfsk/GAd.D8U3L9ehr3DGhhmw', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(50, 'Md. Sumon Mia', 1540201660, 'Father', '1820049', 'First Semester', '16', '07/06/2002', 'Male', '', '01758640807', 'Active', '2018-10-15 09:02:52', '2018-10-22 03:49:21', '', 'General', 'Computer Science & Technology', '1820049', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(51, 'MST. RUBINA AKTER', 0, '', '1820050', 'First Semester', '17', '', '', '', '', 'Active', '2018-10-15 09:02:52', '2018-10-15 09:02:52', NULL, 'General', 'Computer Science & Technology', '1820050', '$2y$10$Vx5071JkH8GfY7EH0sGM0.EHLEFbVs9IWECx54', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(52, 'MD. NUR-E-ALAM', 0, '', '1820051', 'First Semester', '18', '', '', '', '', 'Active', '2018-10-15 09:02:52', '2018-10-15 09:02:52', NULL, 'General', 'Computer Science & Technology', '1820051', '$2y$10$U9OKVra.4eOOEaRRBId/oeIg6xI8DLObhn7sEB', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(53, 'Md. Sakib Babu', 1540285171, 'Father', '1820052', 'First Semester', '19', '04/04/2001', 'Male', '', '01758166564', 'Active', '2018-10-15 09:02:52', '2018-10-23 03:01:28', 'Regular', 'General', 'Computer Science & Technology', '1820052', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(54, 'MD. LIPON SARDAR', 0, '', '1820053', 'First Semester', '20', '', '', '', '', 'Active', '2018-10-15 09:02:52', '2018-10-15 09:02:52', NULL, 'General', 'Computer Science & Technology', '1820053', '$2y$10$MMTYujTpdQZE/esPeF7ERuZd2.boMmZG38TpPQ', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(55, 'MST. ISRAT JAHAN', 0, '', '1820054', 'First Semester', '21', '', '', '', '', 'Active', '2018-10-15 09:02:52', '2018-10-15 09:02:52', NULL, 'General', 'Computer Science & Technology', '1820054', '$2y$10$lH.l6EEoj4pZR4IepylJQe9.j2QDxwUHoYDi4x', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(56, 'Md. Sujon Islam', 1540285579, 'Father', '1820055', 'First Semester', '22', '05/05/2002', 'Male', '', '01737076352', 'Active', '2018-10-15 09:02:52', '2018-10-23 03:07:56', 'Regular', 'General', 'Computer Science & Technology', '1820055', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(57, 'Mst. Aduri Khatun', 1540285936, 'Father', '1820056', 'First Semester', '23', '12/12/2001', 'Female', '', '01703273380', 'Active', '2018-10-15 09:02:52', '2018-10-23 03:14:33', 'Regular', 'General', 'Computer Science & Technology', '1820056', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(58, 'Md. Mosharrof Hossain', 1540286301, 'Father', '1820057', 'First Semester', '24', '05/03/1999', 'Male', '', '01995044856', 'Active', '2018-10-15 09:02:52', '2018-10-23 03:20:30', 'Regular', 'General', 'Computer Science & Technology', '1820057', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(59, 'Akhi Rani Saha', 1540286760, 'Father', '1820058', 'First Semester', '25', '01/10/1997', 'Female', '', '01750021625', 'Active', '2018-10-15 09:02:52', '2018-10-23 03:27:24', 'Regular', 'General', 'Computer Science & Technology', '1820058', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(60, 'MD. TAUKIR HASSAN', 0, '', '1820059', 'First Semester', '26', '', '', '', '', 'Active', '2018-10-15 09:02:53', '2018-10-15 09:02:53', NULL, 'General', 'Computer Science & Technology', '1820059', '$2y$10$ihxGiHORArkw8ey2ufQzbeeRdwrTGKWjf9I0mg', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(61, 'Md. Nokibul Islam', 1540287099, 'Father', '1820060', 'First Semester', '27', '12/01/2000', 'Male', '', '01783166615', 'Active', '2018-10-15 09:02:53', '2018-10-23 03:33:05', 'Regular', 'General', 'Computer Science & Technology', '1820060', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(62, 'Mst. Sumaiya Akther', 1540287417, 'Father', '1820061', 'First Semester', '28', '04/05/2003', 'Female', '', '01783151312', 'Active', '2018-10-15 09:02:53', '2018-10-23 03:38:57', 'Regular', 'General', 'Computer Science & Technology', '1820061', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(63, 'Md. Nasim Mahmud', 1540288064, 'Father', '1820062', 'First Semester', '29', '12/18/1999', 'Male', '', '01768618385', 'Active', '2018-10-15 09:02:53', '2018-10-23 03:49:52', 'Regular', 'General', 'Computer Science & Technology', '1820062', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(64, 'MST: MOLY KHATUN', 0, '', '1820063', 'First Semester', '30', '', '', '', '', 'Active', '2018-10-15 09:02:53', '2018-10-15 09:02:53', NULL, 'General', 'Computer Science & Technology', '1820063', '$2y$10$4v5jz9gDCzUGliT4VKGOy.D4w1cKcVmjdlnU6D', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(65, 'Monjit Pahan', 1540288746, 'Father', '1820064', 'First Semester', '31', '07/30/2001', 'Male', '', '01772880639', 'Active', '2018-10-15 09:02:53', '2018-10-23 04:00:48', 'Regular', 'General', 'Computer Science & Technology', '1820064', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(66, 'Mst. Jannati Akter Jui', 1540289312, 'Father', '1820065', 'First Semester', '32', '01/07/1999', 'Female', '', '01818949576', 'Active', '2018-10-15 09:02:53', '2018-10-23 04:11:00', 'Regular', 'General', 'Computer Science & Technology', '1820065', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(67, 'Md. Yeusuf Ali', 1540289780, 'Father', '1820066', 'First Semester', '33', '02/02/2002', 'Male', '', '01983855624', 'Active', '2018-10-15 09:02:53', '2018-10-23 04:19:08', 'Regular', 'General', 'Computer Science & Technology', '1820066', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(68, 'JIHAN ALI', 0, '', '1820068', 'First Semester', '34', '', '', '', '', 'Active', '2018-10-15 09:19:39', '2018-10-15 09:19:39', NULL, 'General', 'Graphics Technology', '1820068', '$2y$10$NO0JQNbhGv7Acx8ytGhNHeAZRjqcS/ug5aqvmJ', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(69, 'Mst. Manisha Akter', 1540302351, 'Father', '182006', 'First Semester', '35', '09/25/1994', 'Female', '01764716946', '01764716946', 'Active', '2018-10-15 09:19:39', '2018-10-30 08:48:57', 'Regular', 'General', 'Graphics Technology', '1820069', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(70, 'Md. Hasanuzzaman Hridoy', 1540303011, 'Father', '1820069', 'First Semester', '36', '06/18/2001', 'Male', '', '01773804474', 'Active', '2018-10-15 09:19:39', '2018-10-23 08:06:15', 'Regular', 'General', 'Graphics Technology', '1820069', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(71, 'Md. Minhazul Islam', 1540303772, 'Father', '1820070', 'First Semester', '37', '11/05/2000', 'Male', '', '01722118697', 'Active', '2018-10-15 09:19:39', '2018-10-23 08:11:47', 'Regular', 'General', 'Graphics Technology', '1820070', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(72, 'Md. Faysal Habib', 1540304048, 'Father', '1820071', 'First Semester', '38', '05/13/2001', 'Male', '', '01725506219', 'Active', '2018-10-15 09:19:39', '2018-10-23 08:16:17', 'Regular', 'General', 'Graphics Technology', '1820071', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(73, 'MST. MANISHA AKTER SHOYA', 0, '', '1820072', 'First Semester', '39', '', '', '', '', 'Active', '2018-10-15 09:19:39', '2018-10-15 09:19:39', NULL, 'General', 'Graphics Technology', '1820072', '$2y$10$0p725xp6.7n4puo6r25CPeaKOL9vcMzubZWM6P', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(74, 'Naim Hasan', 1540304536, 'Father', '1820073', 'First Semester', '40', '03/05/2003', 'Male', '', '01729104010', 'Active', '2018-10-15 09:19:39', '2018-10-23 08:24:23', 'Regular', 'General', 'Graphics Technology', '1820073', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(75, 'MD. EBRAHIM KHALILULLAH', 0, '', '1820074', 'First Semester', '41', '', '', '', '', 'Active', '2018-10-15 09:19:39', '2018-10-15 09:19:39', NULL, 'General', 'Graphics Technology', '1820074', '$2y$10$hQVOnFIRF7U96bMYjX0MlOhfHKzjJFt7kuahEX', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(76, 'MD. SAJID REZOAN', 0, '', '1820075', 'First Semester', '42', '', '', '', '', 'Active', '2018-10-15 09:19:39', '2018-10-15 09:19:39', NULL, 'General', 'Graphics Technology', '1820075', '$2y$10$tpCokJr5Azl.oZqmS43I0eFMm0IXcpKoeBVNOg', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(77, 'Md. Belal Hossain', 1540305034, 'Father', '1820076', 'First Semester', '43', '06/08/2000', 'Male', '', '01777026472', 'Active', '2018-10-15 09:19:39', '2018-10-23 08:33:30', 'Regular', 'General', 'Graphics Technology', '1820076', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(78, 'Mst. Tania Khatun', 1540305436, 'Father', '1820077', 'First Semester', '44', '11/10/1994', 'Female', '', '01795799901', 'Active', '2018-10-15 09:19:39', '2018-10-23 08:39:16', 'Regular', 'General', 'Graphics Technology', '1820077', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(79, 'MST. Suria Zahan Nupur', 1540305874, 'Father', '1820078', 'First Semester', '45', '05/07/1994', 'Female', '', '01761294420', 'Active', '2018-10-15 09:19:39', '2018-10-23 08:47:47', 'Regular', 'General', 'Graphics Technology', '1820078', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(80, 'ROCKTIM ROY', 0, '', '1820079', 'First Semester', '46', '', '', '', '', 'Active', '2018-10-15 09:19:40', '2018-10-15 09:19:40', NULL, 'General', 'Graphics Technology', '1820079', '$2y$10$cHJVtH67IujU6Ndh1Jio5eckPs4YX/7f9OVnAH', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(81, 'MD. TAYFIQIC HASAN', 0, '', '1820080', 'First Semester', '47', '', '', '', '', 'Active', '2018-10-15 09:19:40', '2018-10-15 09:19:40', NULL, 'General', 'Graphics Technology', '1820080', '$2y$10$23T2teulEEjOB.ihXVVY1OJhsPHadPWg51QbNr', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(82, 'Sagor Kumar', 1540306386, 'Father', '1820081', 'First Semester', '48', '04/25/2001', 'Male', '', '01733438004', 'Active', '2018-10-15 09:19:40', '2018-10-23 08:56:21', 'Regular', 'General', 'Graphics Technology', '1820081', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(83, 'Md. Mehedi Hasan', 1540307072, 'Father', '1820082', 'First Semester', '49', '12/31/2001', 'Male', '', '01761521053', 'Active', '2018-10-15 09:19:40', '2018-10-23 09:07:48', 'Regular', 'General', 'Graphics Technology', '1820082', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(84, 'Md. Nazmul Hossain', 1540307596, 'Father', '1820083', 'First Semester', '50', '02/05/2002', 'Male', '', '01774-014303', 'Active', '2018-10-15 09:19:40', '2018-10-23 09:17:16', 'Regular', 'General', 'Graphics Technology', '1820083', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(85, 'MD. RAFIUL ISLAM', 0, '', '1820084', 'First Semester', '51', '', '', '', '', 'Active', '2018-10-15 09:19:40', '2018-10-15 09:19:40', NULL, 'General', 'Graphics Technology', '1820084', '$2y$10$tKr4zAa7JegXHs.5Ej5zgOBTR.yKbI8/d9Rwl.', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(86, 'MD. SHIHAB MIA', 0, '', '1820085', 'First Semester', '52', '', '', '', '', 'Active', '2018-10-15 09:19:40', '2018-10-15 09:19:40', NULL, 'General', 'Graphics Technology', '1820085', '$2y$10$AN7nmJu.zUL0QP47H3JSouTlBjABlSC7V9rUH6', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(87, 'Ishita Sarker', 1540308173, '', '1820086', 'First Semester', '53', '06/08/2002', 'Female', '', '01782964346', 'Active', '2018-10-15 09:19:40', '2018-10-23 09:24:49', 'Regular', 'General', 'Graphics Technology', '1820086', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(88, 'SHANTO CHANDRO BARMAN', 0, '', '1820087', 'First Semester', '54', '', '', '', '', 'Active', '2018-10-15 09:19:40', '2018-10-15 09:19:40', NULL, 'General', 'Graphics Technology', '1820087', '$2y$10$xeNUFqjjOHLuCQUQw5.fXua8QqUAby3EvsyyUK', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(89, 'Asaduzzaman', 1540308738, 'Father', '1820088', 'First Semester', '55', '06/052002', 'Male', '', '01758170619', 'Active', '2018-10-15 09:19:40', '2018-10-23 09:34:00', 'Regular', 'General', 'Graphics Technology', '1820088', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(90, 'Mst. Asha Akter', 1540309266, 'Father', '1820089', 'First Semester', '56', '01/11/1999', 'Female', '', '01767-091954', 'Active', '2018-10-15 09:19:40', '2018-10-23 09:43:09', 'Regular', 'General', 'Graphics Technology', '1820089', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(91, 'Mst. Ratna Banu', 1540309735, 'Father', '1820090', 'First Semester', '57', '05/09/2000', 'Female', '', '01798449457', 'Active', '2018-10-15 09:19:40', '2018-10-23 09:50:59', 'Regular', 'General', 'Graphics Technology', '1820090', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(92, 'MD. FOYSAL', 0, '', '1820091', 'First Semester', '58', '', '', '', '', 'Active', '2018-10-15 09:19:40', '2018-10-15 09:19:40', NULL, 'General', 'Graphics Technology', '1820091', '$2y$10$q7FXwcfA9Cy73sT5.SXpZuTB4rdJ4p/a2KVmuN', '2018-2019', '2', '2nd', 'TISI', NULL, ''),
(93, 'Md. Al Amin', 1540310147, 'Father', '1820092', 'First Semester', '59', '03/02/1999', 'Male', '', '01771671975', 'Active', '2018-10-15 09:19:41', '2018-10-23 10:14:28', 'Regular', 'General', 'Graphics Technology', '1820092', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(94, 'Tushar Sarma', 1540299407, 'Father', '1820093', 'First Semester', '60', '12/18/1998', 'Male', '', '01784540337', 'Active', '2018-10-15 09:19:41', '2018-10-23 06:59:03', 'Regular', 'General', 'Graphics Technology', '1820093', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(95, 'Md. Sakaout Hossain', 1540301970, 'Father', '1820094', 'First Semester', '61', '04/04/2000', 'Male', '', '01793066654', 'Active', '2018-10-15 09:19:41', '2018-10-23 07:41:33', 'Regular', 'General', 'Graphics Technology', '1820094', '', '2018-2019', '2', '1st', 'TISI', NULL, ''),
(96, 'Umme Hani', 1540298657, 'Father', '1820096', 'First Semester', '62', '10/25/1997', 'Female', '', '01716989753', 'Active', '2018-10-16 03:37:10', '2018-10-23 06:47:45', 'Regular', 'General', 'Computer Science & Technology', '1820096', '', '2018-2019', '2', '1st', 'TISI', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `students_child`
--

CREATE TABLE `students_child` (
  `id` int(10) UNSIGNED NOT NULL,
  `roll` int(20) NOT NULL,
  `post_office` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students_child`
--

INSERT INTO `students_child` (`id`, `roll`, `post_office`, `home_district`, `division`, `village_name`, `created_at`, `updated_at`) VALUES
(56, 0, 'Modonpur', 'Lalmonirhat', 'Rangpur', 'Modonpur', '2018-10-11 07:29:52', '2018-10-11 07:29:52'),
(57, 1820035, 'Mollikpur', 'Nougong', 'Rajshahi', 'Patiamlai', '2018-10-21 09:00:37', '2018-10-21 09:00:37'),
(58, 1820036, 'Malotinagar', 'Bogra', 'Bogra', 'Malotinagar', '2018-10-21 09:08:55', '2018-10-21 09:08:55'),
(59, 1820037, 'Baura', 'Lalmonirhat', 'Rangpur', 'Baura', '2018-10-21 09:17:18', '2018-10-21 09:17:18'),
(60, 1820038, 'Chamrul', 'Bogra', 'Rajshahi', 'Chamrul', '2018-10-21 09:27:11', '2018-10-21 09:27:11'),
(61, 1820041, 'Bhuapur', 'Tangail', 'Dhaka', 'Bhuapur', '2018-10-21 09:36:42', '2018-10-21 09:36:42'),
(62, 1820042, 'Chadmoha', 'Bogra', 'Rajshahi', 'Chadmoha', '2018-10-21 09:45:09', '2018-10-21 09:45:09'),
(63, 1820043, 'Gaptoli', 'Bogra', 'Rajshahi', 'Gaptoli', '2018-10-21 09:57:54', '2018-10-21 09:57:54'),
(64, 1820044, 'Bogra', 'Bogra', 'Rajshahi', 'Bogra', '2018-10-21 10:11:32', '2018-10-21 10:11:32'),
(65, 1820045, 'Dhunot', 'Bogra', 'Rajshahi', 'Dhunot', '2018-10-21 10:16:45', '2018-10-21 10:16:45'),
(66, 1820046, 'Chapi Nawabganj', 'Rajshahi', 'Rajshahi', 'Chapi Nawabganj', '2018-10-21 10:25:08', '2018-10-21 10:25:08'),
(67, 1820047, 'Gaibandha', 'Bogra', 'Rajshahi', 'Gaibandha', '2018-10-22 03:32:20', '2018-10-22 03:32:20'),
(68, 1820048, 'Thanthania', 'Bogra', 'Rajshahi', 'Thanthania', '2018-10-22 03:38:48', '2018-10-22 03:38:48'),
(69, 1820049, 'Shariyakandi', 'Bogra', 'Rajshahi', 'Shariyakandi', '2018-10-22 03:49:21', '2018-10-22 03:49:21'),
(70, 1820052, 'Potnotola', 'Nougong', 'Rajshahi', 'Potnotola', '2018-10-23 03:01:28', '2018-10-23 03:01:28'),
(71, 1820055, 'Domar', 'Nilphamari', 'Rangpur', 'Domar', '2018-10-23 03:07:56', '2018-10-23 03:07:56'),
(72, 1820056, 'Kanaikandor', 'Bogra', 'Rajshahi', 'Kanaikandor', '2018-10-23 03:14:33', '2018-10-23 03:14:33'),
(73, 1820057, 'Gaibandha', 'Bogra', 'Rajshahi', 'Gaibandha', '2018-10-23 03:20:30', '2018-10-23 03:20:30'),
(74, 1820058, 'Lalpur', 'Nator', 'Rajshahi', 'Lalpur', '2018-10-23 03:27:24', '2018-10-23 03:27:24'),
(75, 1820060, 'Gobindogonj', 'Gaibandha', 'Rajshahi', 'Gobindogonj', '2018-10-23 03:33:05', '2018-10-23 03:33:05'),
(76, 1820061, 'Perihat', 'Bogra', 'Rajshahi', 'Perihat', '2018-10-23 03:38:57', '2018-10-23 03:38:57'),
(77, 1820062, 'Potnitola', 'Nougong', 'Rajshahi', 'Potnitola', '2018-10-23 03:49:52', '2018-10-23 03:49:52'),
(78, 1820064, 'Bagdobe', 'Nougaon', 'Rajshahi', 'Bagdobe', '2018-10-23 04:00:48', '2018-10-23 04:00:48'),
(79, 1820065, 'Gobindogonj', 'Gaibandha', 'Rajshahi', 'Gobindogonj', '2018-10-23 04:11:00', '2018-10-23 04:11:00'),
(80, 1820066, 'Gaptoli', 'Bogra', 'Rajshahi', 'Gaptoli', '2018-10-23 04:19:08', '2018-10-23 04:19:08'),
(81, 1820096, 'Shahajahanpur', 'Bogra', 'Rajshahi', 'Madla', '2018-10-23 06:47:45', '2018-10-23 06:47:45'),
(82, 1820093, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 06:59:03', '2018-10-23 06:59:03'),
(83, 1820094, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 07:41:33', '2018-10-23 07:41:33'),
(84, 182006, 'Pollimongle', 'Bogra', 'Rajshahi', 'Pollimongle', '2018-10-23 07:48:58', '2018-10-23 07:53:02'),
(85, 1820069, 'Kahalu', 'Bogra', 'Rajshahi', 'Kahalu', '2018-10-23 08:06:15', '2018-10-23 08:06:15'),
(86, 1820070, 'Panchagarh', 'Panchagarh', 'Rangpur', 'Panchagarh', '2018-10-23 08:11:47', '2018-10-23 08:11:47'),
(87, 1820071, 'Dinajpur', 'Dinajpur', 'Rangpur', 'Dinajpur', '2018-10-23 08:16:17', '2018-10-23 08:16:17'),
(88, 1820073, 'Shiyalkol', 'Sirajganj', 'Rajshahi', 'Shiyalkol', '2018-10-23 08:24:23', '2018-10-23 08:24:23'),
(89, 1820076, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 08:33:30', '2018-10-23 08:33:30'),
(90, 1820077, 'Pollimongle', 'Bogra', 'Rajshahi', 'Pollimongle', '2018-10-23 08:39:16', '2018-10-23 08:39:16'),
(91, 1820078, 'Pollimongle', 'Bogra', 'Rajshahi', 'Pollimongle', '2018-10-23 08:47:47', '2018-10-23 08:47:47'),
(92, 1820081, 'Mahadebpur', 'Bogra', 'Rajshahi', 'Mahadebpur', '2018-10-23 08:56:21', '2018-10-23 08:56:21'),
(93, 1820082, 'Dupcaciya', 'Bogra', 'Rajshahi', 'Dupcaciya', '2018-10-23 09:07:48', '2018-10-23 09:07:48'),
(94, 1820083, 'Sabgram', 'Bogra', 'Rajshahi', 'Sabgram', '2018-10-23 09:15:08', '2018-10-23 09:15:08'),
(95, 1820086, 'Potnitola', 'Nougaon', 'Rangpur', 'Potnitola', '2018-10-23 09:24:49', '2018-10-23 09:24:49'),
(96, 1820088, 'Potnitola', 'Naogaon', 'Rangpur', 'Potnitola', '2018-10-23 09:34:00', '2018-10-23 09:34:00'),
(97, 1820089, 'Sherpur', 'Bogra', 'Rajshahi', 'Sherpur', '2018-10-23 09:43:09', '2018-10-23 09:43:09'),
(98, 1820090, 'Akkelpur', 'Joypurhat', 'Rangpur', 'Akkelpur', '2018-10-23 09:50:59', '2018-10-23 09:50:59'),
(99, 1820092, 'Chilmari', 'Kurigram', 'Rangpur', 'Chilmari', '2018-10-23 10:14:28', '2018-10-23 10:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `stuent_notice_child`
--

CREATE TABLE `stuent_notice_child` (
  `notice_id` int(11) NOT NULL,
  `sw_student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sw_student_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sw_student_roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sw_student_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sw_student_section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stuent_notice_child`
--

INSERT INTO `stuent_notice_child` (`notice_id`, `sw_student_name`, `sw_student_email`, `sw_student_roll`, `sw_student_class`, `sw_student_section`, `created_at`, `updated_at`) VALUES
(0, '', 'info@mail.com', '1', 'Eleven', 'A', '2017-08-01 15:08:55', '2017-08-01 15:08:55'),
(1501622013, 'Shakil Ahmmed', 'info@mail.com', '1', 'Eleven', 'A', '2017-08-01 15:14:05', '2017-08-01 15:14:05'),
(1502736291, 'Shakil Ahmmed', 'info@mail.com', '1', 'Eleven', 'A', '2017-08-14 12:45:45', '2017-08-14 12:45:45'),
(1511247226, 'Rahim Ullah', 'rahibhasan689009@gmail.com', '1720012 ', 'One', 'A', '2017-11-21 00:54:52', '2017-11-21 00:54:52'),
(1511247351, 'Rahim Ullah', 'rahibhasan689009@gmail.com', '1720012 ', 'One', 'A', '2017-11-21 00:56:13', '2017-11-21 00:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `subject_component`
--

CREATE TABLE `subject_component` (
  `subject_component_id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `component_id` varchar(255) DEFAULT NULL,
  `total_mark` varchar(191) NOT NULL,
  `pass_mark` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_component`
--

INSERT INTO `subject_component` (`subject_component_id`, `subject_id`, `component_id`, `total_mark`, `pass_mark`, `created_at`, `updated_at`) VALUES
(1523808837, '1523808820', '1515756206', '', '', '2018-04-15 10:13:57', '2018-04-15 10:13:57'),
(1537986244, '1537985662', NULL, '', '', '2018-09-26 12:24:04', '2018-09-26 12:24:04'),
(1537986276, '1537986244', NULL, '', '', '2018-09-26 12:24:36', '2018-09-26 12:24:36'),
(1537986288, '1537986277', '1510388196', '', '', '2018-09-26 12:24:48', '2018-09-26 12:24:48'),
(1539178192, '1539178157', '1515756206', '', '', '2018-10-10 07:29:52', '2018-10-10 07:29:52'),
(1539271991, '1539271906', '1515756206', '', '', '2018-10-11 09:33:11', '2018-10-11 09:33:11'),
(1539272079, '1539272019', '1515756206', '', '', '2018-10-11 09:34:39', '2018-10-11 09:34:39'),
(1539272669, '1539272579', '1515756206', '', '', '2018-10-11 09:44:29', '2018-10-11 09:44:29'),
(1539272948, '1539272726', '1515756206', '', '', '2018-10-11 09:49:08', '2018-10-11 09:49:08'),
(1539273054, '1539272948', '1515756206', '', '', '2018-10-11 09:50:54', '2018-10-11 09:50:54'),
(1539273190, '1539273064', '1515756206', '', '', '2018-10-11 09:53:10', '2018-10-11 09:53:10'),
(1539273263, '1539273191', '1515756206', '', '', '2018-10-11 09:54:23', '2018-10-11 09:54:23'),
(1539273415, '1539273263', '1515756206', '', '', '2018-10-11 09:56:55', '2018-10-11 09:56:55'),
(1539273464, '1539273415', '1515756206', '', '', '2018-10-11 09:57:44', '2018-10-11 09:57:44'),
(1539273535, '1539273464', '1515756206', '', '', '2018-10-11 09:58:55', '2018-10-11 09:58:55'),
(1539273571, '1539273535', '1515756206', '', '', '2018-10-11 09:59:31', '2018-10-11 09:59:31'),
(1539273621, '1539273572', '1515756206', '', '', '2018-10-11 10:00:21', '2018-10-11 10:00:21'),
(1539273686, '1539273622', '1515756206', '', '', '2018-10-11 10:01:26', '2018-10-11 10:01:26'),
(1539273798, '1539273686', '1515756206', '', '', '2018-10-11 10:03:18', '2018-10-11 10:03:18'),
(1539273860, '1539273799', '1515756206', '', '', '2018-10-11 10:04:20', '2018-10-11 10:04:20'),
(1539273909, '1539273860', '1515756206', '', '', '2018-10-11 10:05:09', '2018-10-11 10:05:09'),
(1539274047, '1539274000', '1515756206', '', '', '2018-10-11 10:07:27', '2018-10-11 10:07:27'),
(1539274048, '1539175237', '1510074756', '20', '20', '2018-10-31 23:00:03', '2018-10-31 23:00:03'),
(1539274049, '1539175237', '1510388196', '20', '10', '2018-10-31 23:00:03', '2018-10-31 23:00:03'),
(1539274050, '1539175237', '1515756206', '20', '10', '2018-10-31 23:00:03', '2018-10-31 23:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `subsidiary_cal`
--

CREATE TABLE `subsidiary_cal` (
  `trancation_id` int(11) NOT NULL,
  `dr_amount` int(11) DEFAULT NULL,
  `cr_amount` int(11) DEFAULT NULL,
  `account_name` int(11) DEFAULT NULL,
  `Party` varchar(50) DEFAULT NULL,
  `party_type` varchar(191) DEFAULT NULL,
  `form_name` varchar(50) DEFAULT NULL,
  `aganist_transcation` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subsidiary_cal`
--

INSERT INTO `subsidiary_cal` (`trancation_id`, `dr_amount`, `cr_amount`, `account_name`, `Party`, `party_type`, `form_name`, `aganist_transcation`, `created_at`, `updated_at`) VALUES
(1541089016, 700, NULL, 105, '182006', 'Student', 'Student Payment', 1541363899, '2018-11-04 14:38:19', '2018-11-04 14:38:19'),
(1541089017, NULL, 700, 104, '182006', 'Student', 'Student Payment', 1541363899, '2018-11-04 14:38:19', '2018-11-04 14:38:19'),
(1541089018, 500, NULL, 105, '182006', 'Student', 'Student Payment', 1541363899, '2018-11-04 14:38:19', '2018-11-04 14:38:19'),
(1541089019, NULL, 500, 104, '182006', 'Student', 'Student Payment', 1541363899, '2018-11-04 14:38:19', '2018-11-04 14:38:19'),
(1541089020, 700, NULL, 105, '182006', 'Student', 'Student Payment', 1541438923, '2018-11-05 11:28:43', '2018-11-05 11:28:43'),
(1541089021, NULL, 700, 104, '182006', 'Student', 'Student Payment', 1541438923, '2018-11-05 11:28:43', '2018-11-05 11:28:43'),
(1541089022, 500, NULL, 105, '182006', 'Student', 'Student Payment', 1541438923, '2018-11-05 11:28:44', '2018-11-05 11:28:44'),
(1541089023, NULL, 500, 104, '182006', 'Student', 'Student Payment', 1541438923, '2018-11-05 11:28:44', '2018-11-05 11:28:44'),
(1541089024, NULL, 90, 102, '182006', 'Student', 'Student Library Invoice', 124, '2018-11-08 09:38:09', '2018-11-08 09:38:09'),
(1541089025, NULL, 500, 102, '182006', 'Student', 'Student Transport Invoice', 125, '2018-11-08 09:46:27', '2018-11-08 09:46:27'),
(1541089026, NULL, 200, 102, '1820041', 'Student', 'Student Dormitory Invoice', 126, '2018-11-08 09:47:18', '2018-11-08 09:47:18'),
(1541089027, NULL, 1200, 102, '182006', 'Student', 'Student Invoice', 129, '2018-11-09 09:47:38', '2018-11-09 09:47:38'),
(1541089028, NULL, 1200, 102, '182006', 'Student', 'Student Invoice', 130, '2018-11-09 09:48:19', '2018-11-09 09:48:19'),
(1541089029, NULL, 1300, 102, '182006', 'Student', 'Student Invoice', 131, '2018-11-09 13:06:21', '2018-11-09 13:06:21'),
(1541089030, 300, NULL, 105, '182006', 'Student', 'Student Payment', 1541790439, '2018-11-09 13:07:19', '2018-11-09 13:07:19'),
(1541089031, NULL, 300, 104, '182006', 'Student', 'Student Payment', 1541790439, '2018-11-09 13:07:19', '2018-11-09 13:07:19'),
(1541089032, 200, NULL, 105, '182006', 'Student', 'Student Payment', 1541790439, '2018-11-09 13:07:19', '2018-11-09 13:07:19'),
(1541089033, NULL, 200, 104, '182006', 'Student', 'Student Payment', 1541790439, '2018-11-09 13:07:20', '2018-11-09 13:07:20'),
(1541089034, NULL, 1200, 102, '182006', 'Student', 'Student Invoice', 132, '2018-11-09 13:10:51', '2018-11-09 13:10:51'),
(1541089035, NULL, 1400, 102, '182006', 'Student', 'Student Invoice', 133, '2018-11-09 13:12:23', '2018-11-09 13:12:23'),
(1541089036, 300, NULL, 105, '182006', 'Student', 'Student Payment', 1541790847, '2018-11-09 13:14:07', '2018-11-09 13:14:07'),
(1541089037, NULL, 300, 104, '182006', 'Student', 'Student Payment', 1541790847, '2018-11-09 13:14:07', '2018-11-09 13:14:07'),
(1541089038, 200, NULL, 105, '182006', 'Student', 'Student Payment', 1541790956, '2018-11-09 13:15:57', '2018-11-09 13:15:57'),
(1541089039, NULL, 200, 104, '182006', 'Student', 'Student Payment', 1541790956, '2018-11-09 13:15:57', '2018-11-09 13:15:57'),
(1541089040, 500, NULL, 105, '182006', 'Student', 'Student Payment', 1541791588, '2018-11-09 13:26:28', '2018-11-09 13:26:28'),
(1541089041, NULL, 500, 104, '182006', 'Student', 'Student Payment', 1541791588, '2018-11-09 13:26:28', '2018-11-09 13:26:28'),
(1541089042, NULL, 500, 102, '182006', 'Student', 'Student Library Invoice', 134, '2018-11-13 10:46:12', '2018-11-13 10:46:12'),
(1541089043, NULL, 1200, 102, '182006', 'Student', 'Student Transport Invoice', 135, '2018-11-21 07:43:27', '2018-11-21 07:43:27'),
(1541089044, NULL, 700, 102, '182006', 'Student', 'Student Transport Invoice', 136, '2018-11-21 08:02:57', '2018-11-21 08:02:57'),
(1541089045, 1500, NULL, 105, '182006', 'Student', 'Student Payment', 1542901861, '2018-11-22 09:51:02', '2018-11-22 09:51:02'),
(1541089046, NULL, 1500, 104, '182006', 'Student', 'Student Payment', 1542901861, '2018-11-22 09:51:02', '2018-11-22 09:51:02'),
(1541089047, 1500, NULL, 105, '182006', 'Student', 'Student Payment', 1542901862, '2018-11-22 09:51:02', '2018-11-22 09:51:02'),
(1541089048, NULL, 1500, 104, '182006', 'Student', 'Student Payment', 1542901862, '2018-11-22 09:51:03', '2018-11-22 09:51:03'),
(1541089049, 300, NULL, 105, '182006', 'Student', 'Student Payment', 1542903000, '2018-11-22 10:10:00', '2018-11-22 10:10:00'),
(1541089050, NULL, 300, 104, '182006', 'Student', 'Student Payment', 1542903000, '2018-11-22 10:10:00', '2018-11-22 10:10:00'),
(1541089051, 200, NULL, 105, '182006', 'Student', 'Student Payment', 1542987323, '2018-11-23 09:35:23', '2018-11-23 09:35:23'),
(1541089052, NULL, 200, 104, '182006', 'Student', 'Student Payment', 1542987323, '2018-11-23 09:35:23', '2018-11-23 09:35:23'),
(1541089053, 200, NULL, 105, '182006', 'Student', 'Student Payment', 1542990766, '2018-11-23 10:32:47', '2018-11-23 10:32:47'),
(1541089054, NULL, 200, 104, '182006', 'Student', 'Student Payment', 1542990766, '2018-11-23 10:32:47', '2018-11-23 10:32:47'),
(1541089055, NULL, 3000, 102, '182006', 'Student', 'Student Dormitory Invoice', 137, '2018-11-23 10:44:22', '2018-11-23 10:44:22'),
(1541089056, 500, NULL, 105, '182006', 'Student', 'Student Payment', 1542991489, '2018-11-23 10:44:49', '2018-11-23 10:44:49'),
(1541089057, NULL, 500, 104, '182006', 'Student', 'Student Payment', 1542991489, '2018-11-23 10:44:49', '2018-11-23 10:44:49'),
(1541089058, 200, NULL, 106, '182006', 'Student', 'Student Payment', 1542993131, '2018-11-23 11:12:11', '2018-11-23 11:12:11'),
(1541089059, NULL, 200, 2, '182006', 'Student', 'Student Payment', 1542993131, '2018-11-23 11:12:12', '2018-11-23 11:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `subsidiary_configuration`
--

CREATE TABLE `subsidiary_configuration` (
  `configuration_id` int(11) NOT NULL,
  `transcation_purpose` varchar(50) DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `asset` int(11) DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `transcation_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subsidiary_configuration`
--

INSERT INTO `subsidiary_configuration` (`configuration_id`, `transcation_purpose`, `income`, `asset`, `expense`, `transcation_type`, `created_at`, `updated_at`) VALUES
(1, 'student_invoice', 102, 1990, 0, 'Recipt', NULL, '2018-10-10 08:53:04'),
(2, 'salary_slip', 0, 1990, 1990, 'Payment', NULL, '2018-10-01 07:49:18'),
(3, 'transport', 1539257056, 1990, 0, 'Receipt', NULL, '2018-11-23 10:24:03'),
(4, 'library', 1539255814, 1990, 0, 'Receipt', NULL, '2018-11-23 10:24:08'),
(5, 'dormitory', 1539257207, 1990, 0, 'Receipt', NULL, NULL),
(6, 'canteen', 1540673832, 1990, 0, 'Receipt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fathers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mothers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `fathers_name`, `mothers_name`, `birth_date`, `marital_status`, `gender`, `religion`, `mobile_no`, `job_type`, `work_department`, `medium`, `created_at`, `updated_at`, `status`, `user_id`, `email`, `type`, `designation`) VALUES
(1539174032, 'Md Sohel Rana', 'Md Zobed Ali', 'Forida Begum', '1990-11-22', 'Married', 'Male', 'Islam', '01738664192', 'Computer Science & Technology', 'Academic ', 'TISI', '2018-10-10 06:20:32', '2018-10-27 14:05:18', 'Teacher', '47', 'manikmilon@gmail.com', 'Tech', ''),
(1539269536, 'Md. Imran Ali', 'Md. Abdul Malek', 'Sultana Razia', '1989-08-14', 'Married', 'Male', 'Islam', '01749786797', 'instructor', 'Academic ', 'TISI', '2018-10-11 08:52:16', '2018-10-28 00:39:55', 'Teacher', '52', 'mindcreative264@gmail.com', '', ''),
(1539269726, 'Md. Jubayer Hossain', 'Md. Moksed Hossain', 'Most. Afsana Khatun', '1993-01-01', 'Married', 'Male', 'Islam', '01737170087', 'Computer Science & Technology', 'Academic ', 'TISI', '2018-10-11 08:55:26', '2018-10-27 14:06:09', 'Teacher', '53', 'jubayer.inf1@gmail.com', '', ''),
(1539270198, 'A.T.M Tazmilur Rahman', 'Late Haris Uddin Talukdar  ', 'Mst . Akhterun Nessa', '1978-10-07', 'Married', 'Male', 'Islam', '01716190099', 'Computer Science & Technology', 'Academic ', 'TISI', '2018-10-11 09:03:19', '2018-10-27 14:06:24', 'Teacher', '54', 'tazmilurtmss@gmail.com', '', ''),
(1539270355, 'Md. Muraduzzaman', 'Md. Abdul Karim Talukdar', 'Mst. Mile Begum', '1982-11-27', 'Married', 'Male', 'Islam', '01722713671', 'instructor', 'Academic ', 'TISI', '2018-10-11 09:05:55', '2018-10-11 09:05:55', 'Teacher', '55', 'muraduzzamanmrd@gmail.com', '', ''),
(1539270530, 'Jakiya Jafrin', 'Md. Shahabuddin Ahmed', 'Sharmin Ahmed', '1995-09-01', 'Married', 'Female', 'Islam', '01754355639', 'instructor', 'Academic ', 'TISI', '2018-10-11 09:08:50', '2018-10-11 09:08:50', 'Teacher', '56', 'jakiya.tisi@gmail.com', '', ''),
(1539270700, 'Md. Shariful Islam', 'Md. Baschu', 'Mrs. Shirina Begum', '1994-06-25', 'Married', 'Male', 'Islam', '01707558402', 'instructor', 'Academic ', 'TISI', '2018-10-11 09:11:40', '2018-10-11 09:11:40', 'Teacher', '57', 'Sharifbdd@gmail.com', '', ''),
(1539271044, 'Rabya Khathun', 'Md. Abdur Rahim', 'Mst. Merina Begum', '1990-12-11', 'Unmarried', 'Female', 'Islam', '01684883090', 'instructor', 'Academic ', 'TISI', '2018-10-11 09:17:24', '2018-10-11 09:17:24', 'Teacher', '58', 'rabyarabu112@gmail.com', '', ''),
(1539271331, 'Md. Arif Ahmed', 'Md. Golam Mostafa', 'Miss. Sajeda Begum', '1993-12-01', 'Unmarried', 'Male', 'Islam', '01722741750', 'Junior Instructor', 'Academic ', 'TISI', '2018-10-11 09:22:11', '2018-10-11 09:22:11', 'Teacher', '59', 'arif.dtp@gmail.com', '', ''),
(1539271725, 'Shaima Hanif', 'Md. Abu Hanif', 'Kohinoor Begum', '1993-12-14', 'Unmarried', 'Female', 'Islam', '01737502224', 'Instructor Part time ', 'Academic ', 'TISI', '2018-10-11 09:28:45', '2018-10-11 09:28:45', 'Teacher', '60', 'shaimashuchi@gmail.com', '', ''),
(1539273589, 'Md. Masud Rana', 'Md. Nurul Islam', 'Delara Begum', '1997-12-12', 'Unmarried', 'Male', 'Islam', '01794352889', 'Junior Instructor', 'Academic ', 'TISI', '2018-10-11 09:59:49', '2018-10-11 09:59:49', 'Teacher', '61', 'masudrana.bbpi@gmail.com', '', ''),
(1540375462, 'Supriya Islam', 'Md.Zohurul Islam', 'Fatema Islam', '1990-01-01', 'Married', 'Female', 'Islam', '01721706902', 'Librarian', 'Library', 'TISI', '2018-10-24 04:04:22', '2018-10-24 04:04:22', 'Staff', NULL, 'supriyaislam01@gmail.com', '', ''),
(1540376166, 'Md. Abu Sayed', 'Md. Abdul Hakim', 'Mst. Nurjahan Begum', '1984-10-04', 'Married', 'Male', 'Islam', '01715272456', 'Marketing Officer', 'Administrative ', 'TISI', '2018-10-24 04:16:06', '2018-10-24 04:16:06', 'Staff', NULL, 'a01715272456@gmail.com', '', ''),
(1540376808, 'Mostak Ahmmed', 'Mosaddar Ali', 'Shefaly Begum', '1990-06-27', 'Unmarried', 'Male', 'Islam', '01722947665', 'Marketing Officer', 'Administrative ', 'TISI', '2018-10-24 04:26:48', '2018-10-24 04:26:48', 'Staff', NULL, 'mostakahmmed2222@gmail.com', '', ''),
(1540385207, 'Mst. Sanzida Khatun', 'Md. Solaiman Ali', 'Mst. Nurefa Begum', '1994-01-20', 'Unmarried', 'Male', 'Islam', '01740157773', 'Computer Operator', 'Administrative ', 'TISI', '2018-10-24 06:46:47', '2018-10-24 06:46:47', 'Staff', NULL, 'nishekazi429@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_address_child`
--

CREATE TABLE `teacher_address_child` (
  `parent` int(11) NOT NULL,
  `post_office` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_address_child`
--

INSERT INTO `teacher_address_child` (`parent`, `post_office`, `home_district`, `division`, `village_name`, `home_name`, `created_at`, `updated_at`) VALUES
(1539174032, 'Ramchandrpur', 'Bogra', 'Rajshahi', 'Ramchandrpur', 'None', '2018-10-10 06:20:32', '2018-10-10 06:20:32'),
(1539269536, 'Golapnagar-7040', 'Kushtia', 'Khulna', 'Gopinathpur', '', '2018-10-11 08:52:16', '2018-10-11 08:52:16'),
(1539269726, 'Basudebpur', 'Dinajpur', 'Rangpur', 'Basudebpur', 'Hossain Vila', '2018-10-11 08:55:26', '2018-10-11 08:55:26'),
(1539270198, 'Taluch hat', 'Bogra', 'Rajshai ', 'Boronilahaly', 'None', '2018-10-11 09:03:19', '2018-10-11 09:03:19'),
(1539270355, 'Paikor-5870', 'Bogura', 'Rajshahi', 'Borongashoni', '', '2018-10-11 09:05:55', '2018-10-11 09:05:55'),
(1539270530, 'Madla-5800', 'Bogra', 'Rajshahi', 'Sujabad', '', '2018-10-11 09:08:50', '2018-10-11 09:08:50'),
(1539270700, 'Moshipur 6770', 'Sirajganj', 'Rajshahi', 'Moshirpur', '', '2018-10-11 09:11:40', '2018-10-11 09:11:40'),
(1539271044, 'Bogra', 'Bogra', 'Bogra', 'Bogra', '', '2018-10-11 09:17:24', '2018-10-11 09:17:24'),
(1539271331, 'Bozra', 'Kurigram', 'Rajshahi', 'Modha Bozra', '', '2018-10-11 09:22:11', '2018-10-11 09:22:11'),
(1539271725, 'Bogra', 'Bogra', 'Bogra', 'Bogra', '', '2018-10-11 09:28:45', '2018-10-11 09:28:45'),
(1539273589, 'Charkasimnagor', 'Narsingdi', 'Dhaka', 'Charchayet', '', '2018-10-11 09:59:49', '2018-10-11 09:59:49'),
(1540375462, 'Bogura', 'Bogura', 'Rajshahi', 'Badurtala', '', '2018-10-24 04:04:22', '2018-10-24 04:04:22'),
(1540376166, 'Pirgacha', 'Bogura', 'Rajshahi', 'Satchua', 'Nurjahan Villa', '2018-10-24 04:16:06', '2018-10-24 04:16:06'),
(1540376808, 'Nandangachhi', 'Rajshahi', 'Rajshahi', 'Fakir Para', '', '2018-10-24 04:26:48', '2018-10-24 04:26:48'),
(1540385207, 'Boriahat', 'Bogura', 'Rajshahi', 'Sayedpur', 'Kazibari', '2018-10-24 06:46:47', '2018-10-24 06:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notice_child`
--

CREATE TABLE `teacher_notice_child` (
  `notice_id` int(11) NOT NULL,
  `tw_teacher_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tw_teacher_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tw_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_qualification_child`
--

CREATE TABLE `teacher_qualification_child` (
  `parent` int(11) NOT NULL,
  `degree_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `board_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passing_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_qualification_child`
--

INSERT INTO `teacher_qualification_child` (`parent`, `degree_name`, `board_name`, `passing_year`, `department_name`, `created_at`, `updated_at`) VALUES
(1539174032, 'MA', 'NU', '2013', 'English', '2018-10-10 06:20:32', '2018-10-10 06:20:32'),
(1539269536, 'M.Sc', 'National University', '2013', 'Mathematics', '2018-10-11 08:52:16', '2018-10-11 08:52:16'),
(1539269726, 'BSc', 'Daffodil International University', '2016', 'CSE', '2018-10-11 08:55:26', '2018-10-11 08:55:26'),
(1539270198, 'MSC', 'NU', '2003', 'CHEMISTRY', '2018-10-11 09:03:19', '2018-10-11 09:03:19'),
(1539270355, 'M.Sc', 'National University', '2008', 'Physics', '2018-10-11 09:05:55', '2018-10-11 09:05:55'),
(1539270530, 'B.Sc Engineering', 'Rajshahi University Of Engineering & Technology', '2017', 'Glass & Ceramic Engineering', '2018-10-11 09:08:50', '2018-10-11 09:08:50'),
(1539270700, 'B.Sc', 'Bangladesh University', '2018', 'CSE', '2018-10-11 09:11:40', '2018-10-11 09:11:40'),
(1539271044, 'MSS', 'National University', '2012', 'Sociology', '2018-10-11 09:17:24', '2018-10-11 09:17:24'),
(1539271331, 'Diploma-in-Engineering', 'Graphic Arts Institute', '2016', 'Graphic Design', '2018-10-11 09:22:11', '2018-10-11 09:22:11'),
(1539271725, 'M.Sc', 'America International University-Bangladesh', '2017', 'Computer Science & Engineering', '2018-10-11 09:28:45', '2018-10-11 09:28:45'),
(1539273589, 'Diploma-in-Engineering', 'BTEB', '2018', 'Computer Technology', '2018-10-11 09:59:49', '2018-10-11 09:59:49'),
(1540375462, 'MA', 'National University', '2011', 'English', '2018-10-24 04:04:22', '2018-10-24 04:04:22'),
(1540376166, 'MA', 'National University', '2011', 'Philosophy', '2018-10-24 04:16:06', '2018-10-24 04:16:06'),
(1540376808, 'MA', 'National University', '2013', 'Islamic History and Culture', '2018-10-24 04:26:48', '2018-10-24 04:26:48'),
(1540385207, 'Diploma In Engineering', 'BTEB', '2014', 'Computer Technology', '2018-10-24 06:46:47', '2018-10-24 06:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `templet_article`
--

CREATE TABLE `templet_article` (
  `templet_id` int(11) NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `templet_article`
--

INSERT INTO `templet_article` (`templet_id`, `article_name`, `author`, `publisher`, `language`, `isbn`, `created_at`, `updated_at`) VALUES
(1540203662, 'Mathematics-3', 'Md. Delower Hossain Mia', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:21:02', '2018-10-22 04:21:02'),
(1540203747, 'Bangla', 'D. MM Mizanur Rahman', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:22:27', '2018-10-22 04:22:27'),
(1540203806, 'Analog Electronics', 'Md.Ziaul karim', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:23:26', '2018-10-22 04:23:26'),
(1540203844, 'Communicative English', 'Md.Iqbal hossain', 'Technical Prokashoni', 'English', 'N/A', '2018-10-22 04:24:04', '2018-10-22 04:24:04'),
(1540203933, 'Graphics Design-1', 'Md.Shahabuddin', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:25:33', '2018-10-22 04:25:33'),
(1540203963, 'Graphics Design-2', 'Hena Akter,Roksana Nahar', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:26:03', '2018-10-22 04:26:03'),
(1540203998, 'Programming Essential', 'Md.Azizul aman al-amin', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:26:38', '2018-10-22 04:26:38'),
(1540204169, 'Basic Computer Graphics Design', 'TISI', 'TISI', 'English', 'N/A', '2018-10-22 04:29:29', '2018-10-22 04:29:29'),
(1540204253, 'It Support', 'Jahed Ahmed Chowdhury', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:30:53', '2018-10-22 04:30:53'),
(1540204311, 'Database Application', 'Rumana Khatun,Roksana Nahar', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:31:51', '2018-10-22 04:31:51'),
(1540204373, 'Chymistry', 'Md.Zobaidur Rahman', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:32:53', '2018-10-22 04:32:53'),
(1540204422, 'Web Design', 'Hena Akter,Roksana Nahar', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:33:42', '2018-10-22 04:33:42'),
(1540205571, 'Electrical Engineering Fundamental', 'Md.Nijam Uddin', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:52:51', '2018-10-22 04:52:51'),
(1540205626, 'Engineering Drawing', 'Md. Yesin Ali', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:53:46', '2018-10-22 04:53:46'),
(1540205712, 'Physical Education & Life Skill Development', 'Md.Illius,Md.Shaiful Islam', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:55:12', '2018-10-22 04:55:12'),
(1540205831, 'Digital Electronics', 'Md.Saleh Ahmed,Md.Mijanur Rahman', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:57:11', '2018-10-22 04:57:11'),
(1540205899, 'Mathematics-1', 'Md. Delower Hossain Mia', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:58:19', '2018-10-22 04:58:19'),
(1540205957, 'Mathematics-3 (solution)', 'Md. Delower Hossain Mia', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 04:59:17', '2018-10-22 04:59:17'),
(1540206009, 'Mathematics-1 (solution)', 'Md. Delower Hossain Mia', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:00:09', '2018-10-22 05:00:09'),
(1540206043, 'Mathematics-2 (solution)', 'Md. Delower Hossain Mia', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:00:43', '2018-10-22 05:00:43'),
(1540206069, 'Mathematics-2', 'Md. Delower Hossain Mia', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:01:09', '2018-10-22 05:01:09'),
(1540206152, 'Physics-1', 'Md.Mosharaf Hossain,Md. Farhad Hossain', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:02:32', '2018-10-22 05:02:32'),
(1540206184, 'Physics-2', 'Md.Mosharaf Hossain,Md. Farhad Hossain', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:03:04', '2018-10-22 05:03:04'),
(1540206500, 'Computer Application', 'A.F.M Mizanur Rahman', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:08:20', '2018-10-22 05:08:20'),
(1540206565, 'Material Tecnology', 'Md.Harunnur Rashid', 'TISI', 'Bangla', 'N/A', '2018-10-22 05:09:25', '2018-10-22 05:09:25'),
(1540206669, 'Surface Preperation', 'Dr.Ad.K. Molla', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:11:09', '2018-10-22 05:11:09'),
(1540206777, 'Computer Lab Practices', 'Shayma Akter,Md.Fazlulu Karim', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:12:57', '2018-10-22 05:12:57'),
(1540206845, 'Social science ', 'Md.Mojammel Hag,Abdul Mmun', 'Technical Prokashoni', 'Bangla', 'N/A', '2018-10-22 05:14:05', '2018-10-22 05:14:05'),
(1540206913, 'English', 'Md.Iqbal hossain & Md.Yesin Ali', 'Technical Prokashoni', 'English', 'N/A', '2018-10-22 05:15:13', '2018-10-22 05:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(47, 'Md Imran', 'mdimranali246@gmail.com', '$2y$10$uP5kJdHx4LMSKK0j0Q4Sduvdu1kTKHg.KQcFPB3i14oK2sSyaQm52', 'Active', 'BEsqBj1c1H3qvbQu0mUGzQa0dIpi9ZFHhbAJjTclsqXc65JRl6cRzPHkxgow', '2018-10-10 06:49:31', '2018-10-24 07:35:02', 'Software User'),
(48, 'Md Jubayer Hossain', 'jubayer.inf@gmail.com', '$2y$10$hZRkINIaYT29ezo6uiVqZ.QirjRoMplieRoJDQq3T6b0l6jS7JzCW', 'Active', 'PReWrke6NKQyfFHAoug2JhYC5mcdq3y1CbkckVP0LGJlQl8JZqhL2v1ZMCys', '2018-10-11 06:49:14', '2018-10-20 08:29:09', 'Software User'),
(49, 'Jakiya Jafrin', 'jakjafrin28@gmail.com', '$2y$10$R0f7JNsqJegsSeoIowVgdeiqNR0abEizbu2uERJOZviwYkJ3GT266', 'Active', 'ueTVcEVdkZEw5qpvV2XPzNM5t9ERjTSuyBNr7ZJg', '2018-10-11 08:38:02', '2018-10-11 08:38:02', 'Software User'),
(50, 'Md Abu Raihan', 'raihantmss@gmail.com', '$2y$10$Jchy/Oy0x33H1K5PcJV/jO.ToygpOOtwxAIShMYD/uoExuM5g3JSi', 'Active', 'Y2tFOmv1sf2765ZwtKZP3HIqcyZbPd970JoRdhiyU5Q9w9nyM1EvNPQakmHd', '2018-10-11 08:47:38', '2018-11-15 12:55:46', 'Software User'),
(51, 'Md. Imran Ali', 'mindcreative264@gmail.com', '$2y$10$cFTdD/8VX1inj/FwwkMMd.Z5y2OBU4O7N.6A.j5cprfVbw6CcgfCa', 'Active', 'CTQNAsMuCDNtsexyOKKll1DCj9UggcjwmWXT73wwn5RmpYFBA5RoIasrv50a', '2018-10-11 08:52:16', '2018-10-24 07:27:37', 'Software User'),
(52, 'Md. Jubayer Hossain', 'jubayer.inf1@gmail.com', '$2y$10$US0BqRScCDb4gNT5RJtUYuHn5S9cFIE8gE2RI/hi6K0.8UZb2QhGq', 'Active', NULL, '2018-10-11 08:55:26', '2018-10-11 08:55:26', 'Software User'),
(53, 'A.T.M Tazmilur Rahman', 'tazmilurtmss@gmail.com', '$2y$10$lPs6MKdbn5IYNQqlY2dFpeJA0h3mIOs3SkTueVQkCQ6NteA2vEko6', 'Active', 'L0MtTEJEpqAnhahU7mC01J3LVeOFKsCcMJf9xcSeSgulsgN0fVbkB00eILCj', '2018-10-11 09:03:19', '2018-10-11 09:05:07', 'Software User'),
(54, 'Md. Muraduzzaman', 'muraduzzamanmrd@gmail.com', '$2y$10$DGA3n5Ami7hRbkR5KN52rewwD0n0xv9SMX2Swxt2v1PuiIW5egGB6', 'Active', 'bC8xR6bhJn5C8HYX05CE0NKbGH9fGEHD37HUuytDJmd7lpJh95MLST8ohLP4', '2018-10-11 09:05:55', '2018-10-24 07:16:58', 'Software User'),
(55, 'Jakiya Jafrin', 'jakiya.tisi@gmail.com', '$2y$10$I/K6AmmAZvmAC/CDlu5a3O80rZFzf2zjEmDx04NmZuGUgfbBsYmyO', 'Active', NULL, '2018-10-11 09:08:50', '2018-10-11 09:08:50', 'Software User'),
(56, 'Md. Shariful Islam', 'Sharifbdd@gmail.com', '$2y$10$AQktR7IcSOcgwbF0EKU6UeUic9VyBb7lWxhAjCNnEUBIDx6KW26iO', 'Active', NULL, '2018-10-11 09:11:40', '2018-10-11 09:11:40', 'Software User'),
(57, 'Rabya Khathun', 'rabyarabu112@gmail.com', '$2y$10$Uv99vPt6EZZzGzLxkTYa.OWT8tRsfZBJtxarD56ktwI09i/4i/YMe', 'Active', NULL, '2018-10-11 09:17:24', '2018-10-11 09:17:24', 'Software User'),
(58, 'Md. Arif Ahmed', 'arif.dtp@gmail.com', '$2y$10$2FpubmD/MwYMVU0YfbjepemW3LaQx0skbuVwD.5KXlnAsWJPilr6u', 'Active', NULL, '2018-10-11 09:22:11', '2018-10-11 09:22:11', 'Software User'),
(59, 'Shaima Hanif', 'shaimashuchi@gmail.com', '$2y$10$X..ZFk5/BgbsNzRGV/BdaOqT34kffTIrnSV6pbQwBwbzhnSytJjDu', 'Active', NULL, '2018-10-11 09:28:45', '2018-10-11 09:28:45', 'Software User'),
(60, 'Md. Masud Rana', 'masudrana.bbpi@gmail.com', '$2y$10$hc7WATx/7BYFtT/NaCfNWeYkuMxL4EbQV8oR15fMw4LMmzNKIiWrC', 'Active', NULL, '2018-10-11 09:59:49', '2018-10-11 09:59:49', 'Software User'),
(63, 'Supriya Islam', 'supriyaislam01@gmail.com', '$2y$10$PdEPFAa3NaW3lIQI3lPmuutAu.Ge0dM/kV8brctvWg4AcTPth0Qeu', 'Active', 'X1BBXqygZhdSOKQGj4CfwsYZZ0XTQM5PMb6Q5vWamfpZjLRDpQh2F81cBLH1', '2018-10-24 07:33:02', '2018-10-24 07:37:26', 'Software User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicsyllabus`
--
ALTER TABLE `academicsyllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_syllebus`
--
ALTER TABLE `academic_syllebus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`accontant_id`);

--
-- Indexes for table `accountant_address_child`
--
ALTER TABLE `accountant_address_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `accountant_qualification_child`
--
ALTER TABLE `accountant_qualification_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `applicant_student`
--
ALTER TABLE `applicant_student`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `applicant_student_child`
--
ALTER TABLE `applicant_student_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `apprisals`
--
ALTER TABLE `apprisals`
  ADD PRIMARY KEY (`apprisal_id`);

--
-- Indexes for table `apprisal_goals`
--
ALTER TABLE `apprisal_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apprisal_template`
--
ALTER TABLE `apprisal_template`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `apprisal_templete_child`
--
ALTER TABLE `apprisal_templete_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_info`
--
ALTER TABLE `article_info`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `article_issue`
--
ALTER TABLE `article_issue`
  ADD PRIMARY KEY (`article_issue_id`);

--
-- Indexes for table `article_recive`
--
ALTER TABLE `article_recive`
  ADD PRIMARY KEY (`article_recive_id`);

--
-- Indexes for table `assign_canteen`
--
ALTER TABLE `assign_canteen`
  ADD PRIMARY KEY (`assign_canteen_id`);

--
-- Indexes for table `assign_dormitory`
--
ALTER TABLE `assign_dormitory`
  ADD PRIMARY KEY (`assign_dormitory_id`);

--
-- Indexes for table `canteen_component`
--
ALTER TABLE `canteen_component`
  ADD PRIMARY KEY (`canteen_component_id`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_notice_child`
--
ALTER TABLE `class_notice_child`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`class_routine_id`);

--
-- Indexes for table `class_routine_end_child`
--
ALTER TABLE `class_routine_end_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `class_routine_start_child`
--
ALTER TABLE `class_routine_start_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `exam_grade_list`
--
ALTER TABLE `exam_grade_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_list`
--
ALTER TABLE `exam_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_child`
--
ALTER TABLE `expense_child`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`general_settings_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_child`
--
ALTER TABLE `invoice_child`
  ADD PRIMARY KEY (`invoice_child_id`);

--
-- Indexes for table `invoice_component`
--
ALTER TABLE `invoice_component`
  ADD PRIMARY KEY (`invoice_component_id`);

--
-- Indexes for table `invoice_templete`
--
ALTER TABLE `invoice_templete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_class`
--
ALTER TABLE `manage_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_department`
--
ALTER TABLE `manage_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_dormitory`
--
ALTER TABLE `manage_dormitory`
  ADD PRIMARY KEY (`manage_dormitory_id`);

--
-- Indexes for table `manage_mark`
--
ALTER TABLE `manage_mark`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `manage_section`
--
ALTER TABLE `manage_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_subject`
--
ALTER TABLE `manage_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_transport`
--
ALTER TABLE `manage_transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `ov_setup`
--
ALTER TABLE `ov_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents_info`
--
ALTER TABLE `parents_info`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `parents_info_child`
--
ALTER TABLE `parents_info_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `parent_notice_child`
--
ALTER TABLE `parent_notice_child`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  ADD PRIMARY KEY (`payment_receipt_id`);

--
-- Indexes for table `payment_receipt_child`
--
ALTER TABLE `payment_receipt_child`
  ADD PRIMARY KEY (`payment_receipt_child_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`id`,`title`),
  ADD UNIQUE KEY `title_UNIQUE` (`title`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`roster_id`);

--
-- Indexes for table `roster_configuration`
--
ALTER TABLE `roster_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_component`
--
ALTER TABLE `salary_component`
  ADD PRIMARY KEY (`salary_component_id`);

--
-- Indexes for table `salary_slip`
--
ALTER TABLE `salary_slip`
  ADD PRIMARY KEY (`slip_id`);

--
-- Indexes for table `salary_structure`
--
ALTER TABLE `salary_structure`
  ADD PRIMARY KEY (`payroll_structure_id`);

--
-- Indexes for table `salary_structure_deduction_component`
--
ALTER TABLE `salary_structure_deduction_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_structure_earning_component`
--
ALTER TABLE `salary_structure_earning_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_structure_teacher_staff_details`
--
ALTER TABLE `salary_structure_teacher_staff_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_article`
--
ALTER TABLE `stock_article`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_child`
--
ALTER TABLE `students_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuent_notice_child`
--
ALTER TABLE `stuent_notice_child`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `subject_component`
--
ALTER TABLE `subject_component`
  ADD PRIMARY KEY (`subject_component_id`);

--
-- Indexes for table `subsidiary_cal`
--
ALTER TABLE `subsidiary_cal`
  ADD PRIMARY KEY (`trancation_id`);

--
-- Indexes for table `subsidiary_configuration`
--
ALTER TABLE `subsidiary_configuration`
  ADD PRIMARY KEY (`configuration_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_address_child`
--
ALTER TABLE `teacher_address_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `teacher_notice_child`
--
ALTER TABLE `teacher_notice_child`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `teacher_qualification_child`
--
ALTER TABLE `teacher_qualification_child`
  ADD PRIMARY KEY (`parent`);

--
-- Indexes for table `templet_article`
--
ALTER TABLE `templet_article`
  ADD PRIMARY KEY (`templet_id`);

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
-- AUTO_INCREMENT for table `academicsyllabus`
--
ALTER TABLE `academicsyllabus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `academic_syllebus`
--
ALTER TABLE `academic_syllebus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apprisal_goals`
--
ALTER TABLE `apprisal_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `apprisal_templete_child`
--
ALTER TABLE `apprisal_templete_child`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `article_info`
--
ALTER TABLE `article_info`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1508861190;

--
-- AUTO_INCREMENT for table `assign_canteen`
--
ALTER TABLE `assign_canteen`
  MODIFY `assign_canteen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1540569918;

--
-- AUTO_INCREMENT for table `canteen_component`
--
ALTER TABLE `canteen_component`
  MODIFY `canteen_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1540149100;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1541048872;

--
-- AUTO_INCREMENT for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `exam_grade_list`
--
ALTER TABLE `exam_grade_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_list`
--
ALTER TABLE `exam_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `invoice_child`
--
ALTER TABLE `invoice_child`
  MODIFY `invoice_child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `invoice_component`
--
ALTER TABLE `invoice_component`
  MODIFY `invoice_component_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1540673833;

--
-- AUTO_INCREMENT for table `invoice_templete`
--
ALTER TABLE `invoice_templete`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `manage_class`
--
ALTER TABLE `manage_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `manage_department`
--
ALTER TABLE `manage_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `manage_mark`
--
ALTER TABLE `manage_mark`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `manage_section`
--
ALTER TABLE `manage_section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `manage_subject`
--
ALTER TABLE `manage_subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1539274001;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `ov_setup`
--
ALTER TABLE `ov_setup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  MODIFY `payment_receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1542993132;

--
-- AUTO_INCREMENT for table `payment_receipt_child`
--
ALTER TABLE `payment_receipt_child`
  MODIFY `payment_receipt_child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1541089199;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `roster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `roster_configuration`
--
ALTER TABLE `roster_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1540318857;

--
-- AUTO_INCREMENT for table `salary_component`
--
ALTER TABLE `salary_component`
  MODIFY `salary_component_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `salary_slip`
--
ALTER TABLE `salary_slip`
  MODIFY `slip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `salary_structure_deduction_component`
--
ALTER TABLE `salary_structure_deduction_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `salary_structure_earning_component`
--
ALTER TABLE `salary_structure_earning_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `salary_structure_teacher_staff_details`
--
ALTER TABLE `salary_structure_teacher_staff_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `students_child`
--
ALTER TABLE `students_child`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `subject_component`
--
ALTER TABLE `subject_component`
  MODIFY `subject_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1539274051;

--
-- AUTO_INCREMENT for table `subsidiary_cal`
--
ALTER TABLE `subsidiary_cal`
  MODIFY `trancation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1541089060;

--
-- AUTO_INCREMENT for table `subsidiary_configuration`
--
ALTER TABLE `subsidiary_configuration`
  MODIFY `configuration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
