-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 01:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edudesk_tisi`
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
  `section` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `is_family_member_of_hem_section` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_student`
--

INSERT INTO `applicant_student` (`applicant_id`, `student_name`, `parent_name`, `relation`, `session`, `class`, `admission_test`, `department`, `section`, `birth_date`, `gender`, `postal_code`, `phone`, `email`, `created_at`, `updated_at`, `status`, `batch`, `shift`, `medium`, `is_family_member_of_hem_section`) VALUES
(1574752753, 'Shakil Ahmmed', 'Late. Hafez Uddin', 'Father', '2018-2019', 'First Semester', 'Admission Test', 'Computer Science & Technology', 'Please Frist Fill Class', '2019-11-26', 'Male', '3900', '01849942053', 'shakil@codebool.com', '2019-11-26 01:20:15', '2019-11-26 01:37:43', 'Applicant', '2', '1st', 'TISI', 'no'),
(1574752843, 'ANOTHER', 'Abdul Aziz', 'Father', '2018-2019', 'First Semester', 'Admission Test', 'Computer Science & Technology', 'Please Frist Fill Class', '2019-11-26', 'Male', '3900', '01849942053', 'shakil2@codebool.com', '2019-11-26 01:21:23', '2019-11-26 01:37:03', 'Applicant', '2', '1st', 'TISI', 'no'),
(1574789237, 'Md Mukhter Hossain', 'Guest', 'Mother', '2018-2019', 'First Semester', 'Admission Test', 'Please Frist Fill Class', 'Please Frist Fill Class', '2019-07-01', 'Male', '3900', '01849942053', 'mukhter@gmail.com', '2019-11-26 11:29:26', '2019-11-26 11:33:53', 'Applicant', '2', '1st', 'TISI', 'yes'),
(1575105856, 'Mst. Sharmin Khatun', 'Md. Sharajul Islam', '', '2018-2019', 'First Semester', 'Admission Test', 'Civil Technology', 'General', '2002-04-02', 'Female', '5800', '01305195067', 'Sharajul@gmail.com', '2019-11-30 03:29:56', '2019-11-30 03:29:56', 'Applicant', '0', '1st', 'TISI', 'no'),
(1575106307, 'Md.Joy Pramanik', 'Md.Johurul Islam', 'Father', '2019-2020', 'First Semester', 'Admission Test', 'Electrical Technology', 'General', '2001-07-06', 'Male', '5800', '01776396783', 'Joy@gmail.com', '2019-11-30 03:34:26', '2019-11-30 03:34:26', 'Applicant', '1', '1st', 'TISI', 'no'),
(1575106391, 'Kiran Chandra', 'SwapanChandra', 'Father', '2018-2019', 'First Semester', 'Admission Test', 'Civil Technology', 'General', '2003-02-01', 'Male', '5800', '01736895342', 'Swapan@gmail.com', '2019-11-30 03:36:19', '2019-11-30 03:36:19', 'Applicant', '1', '1st', 'TISI', 'no'),
(1575107046, 'Chiranjit Kumar', 'Kartik Kumar', 'Father', '2019-2020', 'First Semester', 'Admission Test', 'Electrical Technology', 'General', '2000-09-12', 'Male', '5800', '01758498733', 'Chiranjitroy@gmail.com', '2019-11-30 03:45:39', '2019-11-30 03:45:39', 'Applicant', '1', '1st', 'TISI', 'no');

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
(1574751840, 'Feni', 'Feni', 'Feni', 'Feni', '2019-11-26 01:06:53', '2019-11-26 01:06:53'),
(1574752462, 'sss', 'ss', 'sss', 'sss', '2019-11-26 01:15:19', '2019-11-26 01:15:19'),
(1574752592, 'Feni', '', '', '', '2019-11-26 01:18:44', '2019-11-26 01:18:44'),
(1574752753, 'Feni', 'Feni', 'Feni', 'Feni', '2019-11-26 01:20:15', '2019-11-26 01:20:15'),
(1574752843, 'Feni', 'Feni', 'Feni', 'Feni', '2019-11-26 01:21:23', '2019-11-26 01:21:23'),
(1574789237, 'Feni', 'Feni', 'Feni', 'Feni', '2019-11-26 11:29:26', '2019-11-26 11:29:26'),
(1575105856, 'Gokul', 'Bogura', 'Rajshahi', 'Bagopara', '2019-11-30 03:29:56', '2019-11-30 03:29:56'),
(1575106307, 'Narsatpur', 'Bogura', 'Rajshahi', 'Muriall', '2019-11-30 03:34:26', '2019-11-30 03:34:26'),
(1575106391, 'Kundarhat', 'Bogura', 'Rajshahi', 'Singjani', '2019-11-30 03:36:19', '2019-11-30 03:36:19'),
(1575107046, 'Tushbhandar', 'Lalmonirhat', 'Rangpur', 'Gegra', '2019-11-30 03:45:39', '2019-11-30 03:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_student_educational_q`
--

CREATE TABLE `applicant_student_educational_q` (
  `eqalification_id` int(11) NOT NULL,
  `applicant_id` varchar(191) NOT NULL,
  `exam_name` varchar(191) NOT NULL,
  `borad` varchar(191) NOT NULL,
  `reg_no` varchar(191) NOT NULL,
  `roll_no` varchar(191) NOT NULL,
  `group` varchar(191) NOT NULL,
  `passing_year` varchar(50) NOT NULL,
  `gpa` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_student_educational_q`
--

INSERT INTO `applicant_student_educational_q` (`eqalification_id`, `applicant_id`, `exam_name`, `borad`, `reg_no`, `roll_no`, `group`, `passing_year`, `gpa`, `created_at`, `updated_at`) VALUES
(30, '1574751840', 'SSC', 'Comilla', '199061', '28965812', 'Science', '2019', '5.00', '2019-11-26 07:06:53', '0000-00-00 00:00:00'),
(31, '1574751840', 'HSC', 'Comilla', '199061', '289658123333', 'Science', '2019', '5.00', '2019-11-26 07:06:53', '0000-00-00 00:00:00'),
(32, '1574751840', 'Diploma', 'BTEB', '199061', '256985683333', 'CST', '2023', '5.00', '2019-11-26 07:06:53', '0000-00-00 00:00:00'),
(33, '1574752462', 'sss', 'ss', 'sss', 'ss', 'sss', 'ss', 'sss', '2019-11-26 07:15:19', '0000-00-00 00:00:00'),
(34, '1574752592', '', '', '', '', '', '', '', '2019-11-26 07:18:44', '0000-00-00 00:00:00'),
(40, '1574752843', 'HSC', 'Comilla', '199061', '28965812', 'Science', '2019', '5.00', '2019-11-26 07:37:03', '0000-00-00 00:00:00'),
(44, '1574752753', 'SSC', 'Comilla', '199061', '28965812', 'Science', '2019', '5.00', '2019-11-26 07:37:43', '0000-00-00 00:00:00'),
(45, '1574752753', 'HSC', 'Comilla', '199061', '2896581222', 'Science', '2019', '5.00', '2019-11-26 07:37:43', '0000-00-00 00:00:00'),
(46, '1574752753', 'Diploma', 'Comilla', '199061', '28658965', 'CST', '2023', '5.00', '2019-11-26 07:37:43', '0000-00-00 00:00:00'),
(52, '1574789237', 'SSC', 'Comilla', '199061', '28965812', 'Science', '2023', '5.00', '2019-11-26 17:33:53', '0000-00-00 00:00:00'),
(53, '1574789237', 'HSC', 'Chittagong', '199061', '2896581222', 'Science', '2023', '5.00', '2019-11-26 17:33:53', '0000-00-00 00:00:00'),
(54, '1575105856', 'SSC', 'Rajshahi', '162794323', '568471', 'Humanaties', '2019', '3.72', '2019-11-30 09:29:56', '0000-00-00 00:00:00'),
(55, '1575106307', 'SSC', 'Rajshahi', '6719101', '6719101', 'Humanities', '2019', '3.50', '2019-11-30 09:34:26', '0000-00-00 00:00:00'),
(56, '1575106391', 'SSC', 'Rajshahi', '1612812895', '173073', 'Science', '2019', '4.50', '2019-11-30 09:36:19', '0000-00-00 00:00:00'),
(57, '1575107046', 'SSC', 'Dinajpur', '6719102', '6719102', 'Business', '2019', '3.32', '2019-11-30 09:45:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_student_hem_info`
--

CREATE TABLE `applicant_student_hem_info` (
  `applicant_student_hem_info_id` int(11) NOT NULL,
  `hem_member_no` varchar(50) NOT NULL,
  `hem_group` varchar(50) NOT NULL,
  `hem_village` varchar(50) NOT NULL,
  `hem_section` varchar(50) NOT NULL,
  `hem_zilla` varchar(50) NOT NULL,
  `applicant_id` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_student_hem_info`
--

INSERT INTO `applicant_student_hem_info` (`applicant_student_hem_info_id`, `hem_member_no`, `hem_group`, `hem_village`, `hem_section`, `hem_zilla`, `applicant_id`, `created_at`, `updated_at`) VALUES
(1, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '1574751840', '2019-11-26 01:06:53', '2019-11-26 01:06:53'),
(2, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '1574752462', '2019-11-26 01:15:19', '2019-11-26 01:15:19'),
(3, 'ddd', 'ddd', 'ddd', 'ddd', 'ddd', '1574752592', '2019-11-26 01:18:44', '2019-11-26 01:18:44'),
(7, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '1574789237', '2019-11-26 11:33:53', '2019-11-26 11:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_student_office_copy`
--

CREATE TABLE `applicant_student_office_copy` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(191) NOT NULL,
  `inspection_no` varchar(191) NOT NULL,
  `reference` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_student_office_copy`
--

INSERT INTO `applicant_student_office_copy` (`id`, `applicant_id`, `inspection_no`, `reference`, `created_at`, `updated_at`) VALUES
(4, '1575105856', '1', 'Mst.Rabeya Khatun', '2019-11-30 09:29:56', '0000-00-00 00:00:00'),
(5, '1575106307', '19101', 'Rejawana', '2019-11-30 09:34:26', '0000-00-00 00:00:00'),
(6, '1575106391', '1', 'Amran', '2019-11-30 09:36:19', '0000-00-00 00:00:00'),
(7, '1575107046', '19102', 'Sohel Rana', '2019-11-30 09:45:39', '0000-00-00 00:00:00');

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
  `remarks` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `apprisals` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apprisals`
--

INSERT INTO `apprisals` (`apprisal_id`, `medium`, `apprisal_type`, `apprisal_name`, `apprisal_template`, `start_date`, `end_date`, `total_score`, `created_at`, `updated_at`, `convert`, `remarks`, `apprisals`) VALUES
(1509314404, 'English', 'Teacher', '1574917694', '1509046426', '10/01/2017', '10/31/2017', '93', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '5', '', '4.6'),
(1515254507, 'Bangla', 'Student', '1720012', '1509046426', '01/08/2018', '01/31/2018', '28', '2018-01-06 10:03:25', '2018-10-04 07:41:34', '4', '454', '1.12'),
(1539177768, 'TISI', 'Student', '', '1539177619', '01/01/2018', '01/08/2018', '28', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '50', 'sss', '14'),
(1584270871, 'TISI', 'Student', '343', '1539177619', '565656', '56456', '15', '2020-03-15 05:15:07', '2020-03-15 05:15:07', '3', '', '0.45');

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
(45, '1509314404', 'Attendence', '20', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '20'),
(46, '1509314404', 'Class Attitude ', '20', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '20'),
(47, '1509314404', 'Performence', '40', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '30'),
(48, '1509314404', 'Activity', '10', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '10'),
(49, '1509314404', 'More', '5', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '5'),
(50, '1509314404', 'More', '2', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '5'),
(51, '1509314404', 'More', '3', '2017-10-29 16:00:37', '2020-03-15 05:07:06', '3'),
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
(63, '1539177768', 'Class Attention ', '20', '2018-10-10 07:25:57', '2018-10-10 07:25:57', '1'),
(64, '1584270871', 'Behavior ', '20', '2020-03-15 05:15:07', '2020-03-15 05:15:07', '3'),
(65, '1584270871', 'Dress', '20', '2020-03-15 05:15:07', '2020-03-15 05:15:07', '3'),
(66, '1584270871', 'Class Attendance ', '20', '2020-03-15 05:15:07', '2020-03-15 05:15:07', '3'),
(67, '1584270871', 'Attitude ', '20', '2020-03-15 05:15:07', '2020-03-15 05:15:07', '3'),
(68, '1584270871', 'Class Attention ', '20', '2020-03-15 05:15:07', '2020-03-15 05:15:07', '3');

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
  `accession_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `article_info` (`article_id`, `accession_code`, `stock_id`, `article_name`, `language`, `author`, `isbn`, `publisher`, `description`, `stock_date`, `purchase_price`, `available_status`, `created_at`, `updated_at`) VALUES
(1508861250, '1', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-02 04:35:45'),
(1508861251, '2', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861252, '3', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861253, '4', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861254, '5', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861255, '6', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861256, '7', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861257, '8', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861258, '9', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861259, '10', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861260, '11', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861261, '12', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861262, '13', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861263, '14', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861264, '15', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861265, '16', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861266, '17', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861267, '18', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861268, '19', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861269, '20', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861270, '21', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861271, '22', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861272, '23', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861273, '24', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861274, '25', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861275, '26', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861276, '27', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861277, '28', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861278, '29', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861279, '30', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861280, '31', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861281, '32', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861282, '33', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861283, '34', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861284, '35', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861285, '36', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861286, '37', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861287, '38', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861288, '39', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861289, '40', 1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2017-09-16', '200', 'Available', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1508861290, '41', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861291, '42', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861292, '43', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861293, '44', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861294, '45', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861295, '46', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861296, '47', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861297, '48', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861298, '49', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861299, '50', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861300, '51', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861301, '52', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861302, '53', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861303, '54', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861304, '55', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861305, '56', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861306, '57', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861307, '58', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861308, '59', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861309, '60', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861310, '61', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861311, '62', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861312, '63', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861313, '64', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861314, '65', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861315, '66', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861316, '67', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861317, '68', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861318, '69', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861319, '70', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861320, '71', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861321, '72', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861322, '73', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861323, '74', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861324, '75', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861325, '76', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861326, '77', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861327, '78', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861328, '79', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861329, '80', 1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '260', 'Available', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1508861330, '81', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861331, '82', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861332, '83', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861333, '84', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861334, '85', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861335, '86', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861336, '87', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861337, '88', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861338, '89', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861339, '90', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861340, '91', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861341, '92', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861342, '93', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861343, '94', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861344, '95', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861345, '96', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861346, '97', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861347, '98', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861348, '99', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861349, '100', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861350, '101', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Not Available', '2019-12-01 03:23:38', '2019-12-02 04:59:58'),
(1508861351, '102', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861352, '103', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861353, '104', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861354, '105', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861355, '106', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861356, '107', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861357, '108', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861358, '109', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861359, '110', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861360, '111', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861361, '112', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861362, '113', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861363, '114', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861364, '115', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861365, '116', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861366, '117', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861367, '118', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861368, '119', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861369, '120', 1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', 'Technical Publication', '', '2017-09-16', '100', 'Available', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1508861370, '121', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861371, '122', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861372, '123', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861373, '124', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861374, '125', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861375, '126', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861376, '127', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861377, '128', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861378, '129', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861379, '130', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861380, '131', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861381, '132', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861382, '133', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861383, '134', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861384, '135', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861385, '136', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861386, '137', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861387, '138', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861388, '139', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861389, '140', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861390, '141', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861391, '142', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861392, '143', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861393, '144', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861394, '145', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861395, '146', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861396, '147', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861397, '148', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861398, '149', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861399, '150', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861400, '151', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861401, '152', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861402, '153', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861403, '154', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861404, '155', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861405, '156', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861406, '157', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861407, '158', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861408, '159', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861409, '160', 1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2017-09-16', '250', 'Available', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1508861410, '161', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861411, '162', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861412, '163', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861413, '164', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861414, '165', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861415, '166', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861416, '167', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861417, '168', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861418, '169', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861419, '170', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861420, '171', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861421, '172', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861422, '173', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861423, '174', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861424, '175', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861425, '176', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861426, '177', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861427, '178', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861428, '179', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861429, '180', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861430, '181', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861431, '182', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861432, '183', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861433, '184', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861434, '185', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861435, '186', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861436, '187', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861437, '188', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861438, '189', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861439, '190', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861440, '191', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861441, '192', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861442, '193', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861443, '194', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861444, '195', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861445, '196', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861446, '197', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861447, '198', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861448, '199', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861449, '200', 1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1508861450, '201', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861451, '202', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861452, '203', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861453, '204', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861454, '205', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861455, '206', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861456, '207', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861457, '208', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861458, '209', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861459, '210', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861460, '211', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861461, '212', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861462, '213', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861463, '214', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861464, '215', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861465, '216', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861466, '217', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861467, '218', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861468, '219', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861469, '220', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861470, '221', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861471, '222', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861472, '223', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861473, '224', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861474, '225', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861475, '226', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861476, '227', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861477, '228', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861478, '229', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861479, '230', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861480, '231', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861481, '232', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861482, '233', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861483, '234', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861484, '235', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861485, '236', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861486, '237', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861487, '238', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861488, '239', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861489, '240', 1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-09-16', '130', 'Available', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1508861490, '241', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861491, '242', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861492, '243', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861493, '244', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861494, '245', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861495, '246', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17');
INSERT INTO `article_info` (`article_id`, `accession_code`, `stock_id`, `article_name`, `language`, `author`, `isbn`, `publisher`, `description`, `stock_date`, `purchase_price`, `available_status`, `created_at`, `updated_at`) VALUES
(1508861496, '247', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861497, '248', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861498, '249', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861499, '250', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861500, '251', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861501, '252', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861502, '253', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861503, '254', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861504, '255', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861505, '256', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861506, '257', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861507, '258', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861508, '259', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861509, '260', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861510, '261', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861511, '262', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861512, '263', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861513, '264', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861514, '265', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861515, '266', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861516, '267', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861517, '268', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861518, '269', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861519, '270', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861520, '271', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861521, '272', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861522, '273', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861523, '274', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861524, '275', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861525, '276', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861526, '277', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861527, '278', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861528, '279', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861529, '280', 1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2017-09-16', '170', 'Available', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1508861530, '281', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861531, '282', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861532, '283', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861533, '284', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861534, '285', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861535, '286', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861536, '287', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861537, '288', 1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1508861538, '289', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861539, '290', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861540, '291', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861541, '292', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861542, '293', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861543, '294', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861544, '295', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861545, '296', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861546, '297', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861547, '298', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861548, '299', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861549, '300', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861550, '301', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861551, '302', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861552, '303', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861553, '304', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861554, '305', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861555, '306', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861556, '307', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861557, '308', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861558, '309', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861559, '310', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861560, '311', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861561, '312', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861562, '313', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861563, '314', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861564, '315', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861565, '316', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861566, '317', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861567, '318', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861568, '319', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861569, '320', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861570, '321', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861571, '322', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861572, '323', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861573, '324', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861574, '325', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1508861575, '326', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861576, '327', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861577, '328', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861578, '329', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861579, '330', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861580, '331', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861581, '332', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861582, '333', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861583, '334', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861584, '335', 1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:21:42', '2019-12-01 04:21:42'),
(1508861585, '336', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861586, '337', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861587, '338', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861588, '339', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861589, '340', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861590, '341', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861591, '342', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861592, '343', 1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', 'Technical Publication', '', '2017-10-14', '250', 'Available', '2019-12-01 04:24:46', '2019-12-01 04:24:46'),
(1508861593, '344', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861594, '345', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861595, '346', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861596, '347', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861597, '348', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861598, '349', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861599, '350', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861600, '351', 1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', 'Technical Publication', '', '2017-10-14', '130', 'Available', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1508861601, '352', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861602, '353', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861603, '354', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861604, '355', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861605, '356', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861606, '357', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861607, '358', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861608, '359', 1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2019-10-14', '170', 'Available', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1508861609, '360', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861610, '361', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861611, '362', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861612, '363', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861613, '364', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861614, '365', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861615, '366', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861616, '367', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861617, '368', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861618, '369', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861619, '370', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861620, '371', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861621, '372', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861622, '373', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861623, '374', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861624, '375', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861625, '376', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861626, '377', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861627, '378', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861628, '379', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861629, '380', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861630, '381', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861631, '382', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861632, '383', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861633, '384', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861634, '385', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861635, '386', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861636, '387', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861637, '388', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861638, '389', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861639, '390', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861640, '391', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861641, '392', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861642, '393', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861643, '394', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861644, '395', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861645, '396', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861646, '397', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861647, '398', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861648, '399', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861649, '400', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861650, '401', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861651, '402', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861652, '403', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861653, '404', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861654, '405', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861655, '406', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861656, '407', 1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', 'Haque Publications', '', '2017-10-14', '120', 'Available', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1508861657, '408', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861658, '409', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861659, '410', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861660, '411', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861661, '412', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861662, '413', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861663, '414', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861664, '415', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861665, '416', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861666, '417', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861667, '418', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861668, '419', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861669, '420', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861670, '421', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861671, '422', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861672, '423', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861673, '424', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861674, '425', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861675, '426', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861676, '427', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861677, '428', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861678, '429', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861679, '430', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861680, '431', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861681, '432', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861682, '433', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861683, '434', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861684, '435', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861685, '436', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861686, '437', 1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', 'Technical Publication', '', '2018-02-08', '70', 'Available', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1508861687, '438', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861688, '439', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861689, '440', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861690, '441', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861691, '442', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861692, '443', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861693, '444', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861694, '445', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861695, '446', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861696, '447', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861697, '448', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861698, '449', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861699, '450', 1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1508861700, '451', 1575430620, 'অসমাপ্ত আত্নজীবনী', 'বাংলা', 'শেখ মুজিবুর রহমান', '9789845061957', 'ইউনিভার্সিটি প্রেস', '', '2019-02-07', '190', 'Available', '2019-12-03 21:39:39', '2019-12-03 21:39:39'),
(1508861701, '452', 1575430620, 'অসমাপ্ত আত্নজীবনী', 'বাংলা', 'শেখ মুজিবুর রহমান', '9789845061957', 'ইউনিভার্সিটি প্রেস', '', '2019-02-07', '190', 'Available', '2019-12-03 21:39:39', '2019-12-03 21:39:39'),
(1508861702, '453', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861703, '454', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861704, '455', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861705, '456', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861706, '457', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861707, '458', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861708, '459', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861709, '460', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861710, '461', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861711, '462', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861712, '463', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861713, '464', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861714, '465', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861715, '466', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861716, '467', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861717, '468', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861718, '469', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861719, '470', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861720, '471', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861721, '472', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861722, '473', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861723, '474', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861724, '475', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861725, '476', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861726, '477', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861727, '478', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861728, '479', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861729, '480', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861730, '481', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861731, '482', 1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1508861732, '483', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861733, '484', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861734, '485', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861735, '486', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861736, '487', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861737, '488', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861738, '489', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861739, '490', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861740, '491', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861741, '492', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861742, '493', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861743, '494', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861744, '495', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07');
INSERT INTO `article_info` (`article_id`, `accession_code`, `stock_id`, `article_name`, `language`, `author`, `isbn`, `publisher`, `description`, `stock_date`, `purchase_price`, `available_status`, `created_at`, `updated_at`) VALUES
(1508861745, '496', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861746, '497', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861747, '498', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861748, '499', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861749, '500', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861750, '501', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861751, '502', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861752, '503', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861753, '504', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861754, '505', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861755, '506', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861756, '507', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861757, '508', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861758, '509', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861759, '510', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861760, '511', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861761, '512', 1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', 'Technical Publication', '', '2018-02-08', '80', 'Available', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1508861762, '513', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861763, '514', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861764, '515', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861765, '516', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861766, '517', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861767, '518', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861768, '519', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861769, '520', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861770, '521', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861771, '522', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861772, '523', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861773, '524', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861774, '525', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861775, '526', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861776, '527', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861777, '528', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861778, '529', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861779, '530', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861780, '531', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861781, '532', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861782, '533', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861783, '534', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861784, '535', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861785, '536', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861786, '537', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861787, '538', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861788, '539', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861789, '540', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861790, '541', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861791, '542', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861792, '543', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861793, '544', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861794, '545', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861795, '546', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861796, '547', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861797, '548', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861798, '549', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861799, '550', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861800, '551', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861801, '552', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861802, '553', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861803, '554', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861804, '555', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861805, '556', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861806, '557', 1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '260', 'Available', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1508861807, '558', 1575443936, 'Mathematics-2 (Solution)', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '230', 'Available', '2019-12-04 01:19:43', '2019-12-04 01:19:43'),
(1508861808, '559', 1575443936, 'Mathematics-2 (Solution)', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '230', 'Available', '2019-12-04 01:19:43', '2019-12-04 01:19:43'),
(1508861809, '560', 1575443936, 'Mathematics-2 (Solution)', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '230', 'Available', '2019-12-04 01:19:43', '2019-12-04 01:19:43'),
(1508861810, '561', 1575443936, 'Mathematics-2 (Solution)', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '230', 'Available', '2019-12-04 01:19:43', '2019-12-04 01:19:43'),
(1508861811, '562', 1575443936, 'Mathematics-2 (Solution)', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', 'Technical Publication', '', '2018-02-08', '230', 'Available', '2019-12-04 01:19:43', '2019-12-04 01:19:43'),
(1508861812, '563', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861813, '564', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861814, '565', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861815, '566', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861816, '567', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861817, '568', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861818, '569', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861819, '570', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861820, '571', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861821, '572', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861822, '573', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861823, '574', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861824, '575', 1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', 'Technical Publication', '', '2018-02-08', '250', 'Available', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1508861825, '576', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861826, '577', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861827, '578', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861828, '579', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861829, '580', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861830, '581', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861831, '582', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861832, '583', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861833, '584', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861834, '585', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861835, '586', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861836, '587', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861837, '588', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861838, '589', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861839, '590', 1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', 'Technical Publication', '', '2018-02-08', '200', 'Available', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1508861840, '591', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861841, '592', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861842, '593', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861843, '594', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861844, '595', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861845, '596', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861846, '597', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861847, '598', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861848, '599', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861849, '600', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861850, '601', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861851, '602', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861852, '603', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861853, '604', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861854, '605', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861855, '606', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861856, '607', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861857, '608', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861858, '609', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861859, '610', 1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1508861860, '611', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861861, '612', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861862, '613', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861863, '614', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861864, '615', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861865, '616', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861866, '617', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861867, '618', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861868, '619', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861869, '620', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861870, '621', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861871, '622', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861872, '623', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861873, '624', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861874, '625', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861875, '626', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861876, '627', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861877, '628', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861878, '629', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861879, '630', 1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1508861880, '631', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861881, '632', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861882, '633', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861883, '634', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861884, '635', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861885, '636', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861886, '637', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861887, '638', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861888, '639', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861889, '640', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861890, '641', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861891, '642', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861892, '643', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861893, '644', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861894, '645', 1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', 'BTEB', '', '2018-07-20', '150', 'Available', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1508861895, '646', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861896, '647', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861897, '648', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861898, '649', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861899, '650', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861900, '651', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861901, '652', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861902, '653', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861903, '654', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861904, '655', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861905, '656', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861906, '657', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861907, '658', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861908, '659', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861909, '660', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861910, '661', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861911, '662', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861912, '663', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861913, '664', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861914, '665', 1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', 'Haque Publications', '', '2018-07-28', '140', 'Available', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1508861916, '666', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861917, '667', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861918, '668', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861919, '669', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861920, '670', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861921, '671', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861922, '672', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861923, '673', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861924, '674', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861925, '675', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861926, '676', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861927, '677', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861928, '678', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861929, '679', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861930, '680', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861931, '681', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861932, '682', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861933, '683', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861934, '684', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861935, '685', 1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', 'Technical Publication', '', '2018-07-29', '250', 'Available', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1508861936, '686', 1575454299, 'Graphic Design-2', 'Bangla', 'Hena Akter', 'N/A', 'Technical Publication', '', '2018-07-29', '72', 'Available', '2019-12-04 04:12:40', '2019-12-04 04:12:40'),
(1508861937, '687', 1575454299, 'Graphic Design-2', 'Bangla', 'Hena Akter', 'N/A', 'Technical Publication', '', '2018-07-29', '72', 'Available', '2019-12-04 04:12:40', '2019-12-04 04:12:40'),
(1508861938, '688', 1575454299, 'Graphic Design-2', 'Bangla', 'Hena Akter', 'N/A', 'Technical Publication', '', '2018-07-29', '72', 'Available', '2019-12-04 04:12:40', '2019-12-04 04:12:40'),
(1508861939, '689', 1575454299, 'Graphic Design-2', 'Bangla', 'Hena Akter', 'N/A', 'Technical Publication', '', '2018-07-29', '72', 'Available', '2019-12-04 04:12:40', '2019-12-04 04:12:40'),
(1508861940, '690', 1575454299, 'Graphic Design-2', 'Bangla', 'Hena Akter', 'N/A', 'Technical Publication', '', '2018-07-29', '72', 'Available', '2019-12-04 04:12:40', '2019-12-04 04:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `article_issue`
--

CREATE TABLE `article_issue` (
  `article_issue_id` int(11) NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `teacher_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
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
  `article_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Issue',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_issue`
--

INSERT INTO `article_issue` (`article_issue_id`, `article_name`, `member_roll`, `teacher_id`, `teacher_name`, `teacher_email`, `teacher_phone`, `member_reg`, `member_name`, `issue_date`, `return_date`, `e_mail`, `phone`, `status`, `total_day`, `created_at`, `updated_at`, `article_id`, `article_status`, `type`) VALUES
(1575282920, 'Bangla', '6519101', '', '', '', '', '1502008258', 'Mst.jima khatun', '2019-12-01', '2019-12-10', 'jima@gmail.com', '01799348311', 'Recived', '9', NULL, '2019-12-02 04:35:45', '1', 'Issue', 'Student'),
(1575284398, 'Physical Education & Life Skill Development', '19103', '', '', '', '', '1502008257', 'MD. Milon Mia', '2019-12-02', '2019-12-30', 'milon@gmail.com', '', 'Issue', '28', NULL, NULL, '101', 'Issue', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `article_recive`
--

CREATE TABLE `article_recive` (
  `article_recive_id` int(11) NOT NULL,
  `article_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_roll` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_canteen`
--

INSERT INTO `assign_canteen` (`assign_canteen_id`, `title`, `student_roll`, `student_name`, `department`, `class`, `description`, `created_at`, `updated_at`) VALUES
(1543021096, '182006', '182006', 'Mst. Manisha Akter', 'Graphics Technology', 'First Semester', '182006', '2018-11-23 18:58:16', '2018-11-23 18:58:16');

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
  `arrive_date` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dormitory_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dormitory_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `room_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `seat_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_dormitory`
--

INSERT INTO `assign_dormitory` (`assign_dormitory_id`, `title`, `student_name`, `student_roll`, `department`, `arrive_date`, `semester`, `dormitory_no`, `dormitory_name`, `room_number`, `seat_number`, `description`, `created_at`, `updated_at`) VALUES
(1575276975, '8519135-Nasima Khatun', 'Nasima Khatun', '8519135', 'Computer Science & Technology', '2019-07-31', 'First Semester', '2', 'Bonolota TISI Dormitory', '124', '1', '8519135-Nasima Khatun', '2019-12-02 02:56:15', '2019-12-02 02:56:15'),
(1575277143, '19114-Mst. Yasmin Akter', 'Mst. Yasmin Akter', '19114', 'Graphics Technology', '2019-07-31', 'First Semester', '2', 'Bonolota TISI Dormitory', '124', '124D', '19114-Mst. Yasmin Akter', '2019-12-02 02:59:03', '2019-12-09 02:20:02'),
(1575277322, '19133-Farzana Akter', 'Farzana Akter', '19133', 'Graphics Technology', '2019-08-01', 'First Semester', '2', 'Bonolota TISI Dormitory', '123', '123C', '19133-Farzana Akter', '2019-12-02 03:02:02', '2019-12-09 02:10:15'),
(1575277385, '19101-Mst.jima khatun', 'Mst.jima khatun', '19101', 'Graphics Technology', '2019-11-07', 'First Semester', '2', 'Bonolota TISI Dormitory', '123', '123D', '19101-Mst.jima khatun', '2019-12-02 03:03:05', '2019-12-09 02:11:39'),
(1575277456, '19128-MST. SAFIYA KHATUN', 'MST. SAFIYA KHATUN', '19128', 'Graphics Technology', '2019-08-01', 'First Semester', '2', 'Bonolota TISI Dormitory', '123', '123E', '19128-MST. SAFIYA KHATUN', '2019-12-02 03:04:16', '2019-12-09 02:12:38'),
(1575534524, '17103-AJ Asikur Rahman', 'AJ Asikur Rahman', '6517103', 'Graphics Technology', '2017-08-10', 'Fifth Semester', '1', 'Bijoy Hostel TISI', '121', '121A', '17103-AJ Asikur Rahman', '2019-12-05 02:28:44', '2019-12-05 02:28:44'),
(1575877690, '8517109-Ammar', 'Md. Ammar Hossain Selim', '8517109', 'Computer Science & Technology', '2017-09-25', 'Fifth Semester', '1', 'Bijoy Hostel TISI', '121', '121C', '8517109-Ammar', '2019-12-09 01:48:10', '2019-12-09 01:48:10'),
(1575877980, '6719119-Md.Monirul Islam', 'Md.Monirul Islam', '6719119', 'Electrical Technology', '2019-07-27', 'First Semester', '1', 'Bijoy Hostel TISI', '121', '121D', '6719119-Md.Monirul Islam', '2019-12-09 01:53:00', '2019-12-09 01:53:00'),
(1575878285, '8519154-Md:Abu Sayed', 'Md:Abu Sayed', '8519154', 'Computer Science & Technology', '2019-09-22', 'First Semester', '1', 'Bijoy Hostel TISI', '122', '122B', '8519154-Md:Abu Sayed', '2019-12-09 01:58:05', '2019-12-09 01:58:05'),
(1575878465, '113752-Md. Mosharrof Hossain', 'Md. Mosharrof Hossain', '113752', 'Computer Science & Technology', '2018-09-01', 'Third Semester', '1', 'Bijoy Hostel TISI', '122', '122C', '113752-Md. Mosharrof Hossain', '2019-12-09 02:01:05', '2019-12-09 02:01:05'),
(1575878641, '177306-Md sumon mia ', 'Md sumon mia ', '177306', 'Computer Science & Technology', '2018-08-09', 'Third Semester', '1', 'Bijoy Hostel TISI', '122', '122E', '177306-Md sumon mia ', '2019-12-09 02:04:01', '2019-12-09 02:04:01'),
(1575878811, '6518125-Mst.Asha Akter', 'Mst.Asha Akter', '6518125', 'Graphics Technology', '2018-09-25', 'Third Semester', '2', 'Bonolota TISI Dormitory', '123', '123A', '6518125-Mst.Asha Akter', '2019-12-09 02:06:51', '2019-12-09 02:06:51'),
(1575878910, '8518114-Rahima Khatun', 'Rahima Khatun', '8518114', 'Computer Science & Technology', '2018-09-01', 'Third Semester', '2', 'Bonolota TISI Dormitory', '123', '123B', '8518114-Rahima Khatun', '2019-12-09 02:08:30', '2019-12-09 02:08:30'),
(1575879317, '177308-Mst.RATNA Banu', 'Mst.RATNA Banu', '177308', 'Graphics Technology', '2018-09-17', 'Third Semester', '2', 'Bonolota TISI Dormitory', '124', '124A', '177308-Mst.RATNA Banu', '2019-12-09 02:15:17', '2019-12-09 02:15:17'),
(1575879526, '8519135-Nasima Khatun', 'Nasima Khatun', '8519135', 'Computer Science & Technology', '2019-07-31', 'First Semester', '2', 'Bonolota TISI Dormitory', '124', '124C', '8519135-Nasima Khatun', '2019-12-09 02:18:46', '2019-12-09 02:18:46'),
(1575879733, '6518122-Eshita Sarkar', 'Eshita Sarkar', '6518122', 'Graphics Technology', '2018-08-11', 'Third Semester', '2', 'Bonolota TISI Dormitory', '125', '125A', '6518122-Eshita Sarkar', '2019-12-09 02:22:13', '2019-12-09 02:22:13'),
(1575879856, '6518114-Mst. Suraiya Jahan Nupur', 'Mst. Suraiya Jahan Nupur', '6518114', 'Graphics Technology', '2018-05-11', 'Third Semester', '2', 'Bonolota TISI Dormitory', '125', '125B', '6518114-Mst. Suraiya Jahan Nupur', '2019-12-09 02:24:16', '2019-12-09 02:24:16'),
(1575880991, '6517104-Newton Barman', 'Newton Barman', '6517104', 'Graphics Technology', '2017-11-04', 'Fifth Semester', '1', 'Bijoy Hostel TISI', '126', '126A', '6517104-Newton Barman', '2019-12-09 02:43:11', '2019-12-09 02:43:11'),
(1575881124, '8518105-Md.Nokibul Islam', 'Md.Nokibul Islam', '8518105', 'Computer Science & Technology', '2018-08-09', 'Third Semester', '1', 'Bijoy Hostel TISI', '126', '126B', '8518105-Md.Nokibul Islam', '2019-12-09 02:45:24', '2019-12-09 02:45:24'),
(1575881193, '8518106-Md.Nasim Mahmud', 'Md.Nasim Mahmud', '8518106', 'Computer Science & Technology', '2018-08-10', 'Third Semester', '1', 'Bijoy Hostel TISI', '126', '126C', '8518106-Md.Nasim Mahmud', '2019-12-09 02:46:33', '2019-12-09 02:46:33'),
(1575881318, '8517111-Eakhruzzaman Rony', 'Eakhruzzaman Rony', '8517111', 'Computer Science & Technology', '2017-09-25', 'Fifth Semester', '1', 'Bijoy Hostel TISI', '126', '126F', '8517111-Eakhruzzaman Rony', '2019-12-09 02:48:38', '2019-12-09 02:48:38'),
(1575881425, '113768-Asadujjaman', 'Asadujjaman', '113768', 'Graphics Technology', '2018-08-09', 'Third Semester', '3', 'Sadhen', '129', '129A', '113768-Asadujjaman', '2019-12-09 02:50:25', '2019-12-09 02:50:25'),
(1575881506, '113748-Md. Mamunur Rahman', 'Md. Mamunur Rahman', '113748', 'Computer Science & Technology', '2018-08-09', 'Third Semester', '3', 'Sadhen', '129', '129B', '113748-Md. Mamunur Rahman', '2019-12-09 02:51:46', '2019-12-09 02:51:46'),
(1575881585, '113745-Md. Sujon Islam', 'Md. Sujon Islam', '113745', 'Computer Science & Technology', '2018-08-10', 'Third Semester', '3', 'Sadhen', '129', '129C', '113745-Md. Sujon Islam', '2019-12-09 02:53:05', '2019-12-09 02:53:05'),
(1575881781, '113742-Faisal Muhammad Jahin', 'Faisal Muhammad Jahin', '113742', 'Computer Science & Technology', '2018-08-01', 'Third Semester', '3', 'Sadhen', '129', '129D', '113742-Faisal Muhammad Jahin', '2019-12-09 02:56:21', '2019-12-09 02:56:21'),
(1575881922, '113736-Md.Jisan Ahmed', 'Md.Jisan Ahmed', '113736', 'Computer Science & Technology', '2018-08-10', 'Third Semester', '3', 'Sadhen', '129', '129E', '113736-Md.Jisan Ahmed', '2019-12-09 02:58:42', '2019-12-09 02:58:42'),
(1575882000, '8517104-Hazrat Ali', 'Hazrat Ali', '8517104', 'Computer Science & Technology', '2017-10-10', 'Fifth Semester', '3', 'Sadhen', '129', '129F', '8517104-Hazrat Ali', '2019-12-09 03:00:00', '2019-12-09 03:00:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `canteen_component`
--

CREATE TABLE `canteen_component` (
  `canteen_component_id` int(11) NOT NULL,
  `component_title` varchar(191) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
(29, 'Cash		', '1', 'Asset', '100000', 'Cash', '2018-10-10 14:30:55', '2018-10-10 14:30:55'),
(67, 'Admission Form', '101', 'Income', '1000', 'Cash', '2019-01-20 06:48:23', '2019-01-20 06:48:23'),
(68, 'Admission Fee', '102', 'Asset', '20000', 'Check', '2019-01-20 06:48:54', '2020-03-31 04:38:32'),
(69, 'Development / Reg Fee', '103', 'Income', '5000', 'Cash', '2019-01-20 06:52:17', '2019-01-20 06:52:17'),
(70, 'Exam Fee', '104', 'Income', '3000', 'Cash', '2019-01-20 06:52:55', '2019-01-20 06:52:55'),
(71, 'Tie, Solder Fee', '105', 'Income', '200', 'Cash', '2019-01-20 06:53:38', '2019-01-20 06:53:38'),
(72, 'Semester Fee', '106', 'Income', '20000', 'Cash', '2019-01-20 06:54:13', '2019-01-20 06:54:13'),
(73, 'Dormitory/Hostel Fee', '107', 'Income', '500', 'Cash', '2019-01-20 06:54:58', '2019-01-20 06:54:58'),
(74, 'Bus Rent', '108', 'Income', '500', 'Cash', '2019-01-20 06:55:13', '2019-01-20 06:55:13'),
(75, 'Canteen fee( Food seal)', '109', 'Income', '3000', 'Cash', '2019-01-20 06:57:21', '2019-01-20 06:57:21'),
(76, 'Bus rent (Owner)', '151', 'Expense', '30000', 'Check', '2019-01-20 06:59:50', '2019-01-20 06:59:50'),
(77, 'Fuel, oil & Gas Bill', '152', 'Expense', '20000', 'Cash', '2019-01-20 07:01:26', '2019-01-20 07:01:26'),
(78, 'Demo Account', '10', '878', '343', 'sads', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_files`
--

CREATE TABLE `class_files` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_files`
--

INSERT INTO `class_files` (`id`, `class_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 46, 'cxvxcvxc', 'images/class_files/1585472842.html', '2020-03-29 09:07:22', '2020-03-29 09:07:22'),
(3, 47, 'fgfg', 'images/class_files/1585473697.html', '2020-03-29 09:21:37', '2020-03-29 09:21:37'),
(4, 48, 'fgfg', 'images/class_files/1585473712.html', '2020-03-29 09:21:52', '2020-03-29 09:21:52'),
(5, 49, 'fgfg', 'images/class_files/1585473997.html', '2020-03-29 09:26:37', '2020-03-29 09:26:37');

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
(1575190863, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-01 03:01:03', '2019-12-01 03:01:03', 'Computer Application', 'Md. Jubayer Hossain'),
(1575190924, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-01 03:02:04', '2019-12-01 03:02:04', 'Computer Application', 'Md. Jubayer Hossain'),
(1575190993, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-01 03:03:13', '2019-12-01 03:03:13', 'Computer Lab. Practice (IT support-I)', 'Md. Masud Rana'),
(1575191043, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-01 03:04:03', '2019-12-01 03:04:03', 'Computer Lab. Practice (IT support-I)', 'Md. Masud Rana'),
(1575191105, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-01 03:05:05', '2019-12-01 03:05:05', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575191149, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-01 03:05:49', '2019-12-01 03:05:49', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575191202, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-01 03:06:42', '2019-12-01 03:06:42', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575191253, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-01 03:07:33', '2019-12-01 03:07:33', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575191300, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-01 03:08:20', '2019-12-01 03:08:20', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575191356, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-01 03:09:16', '2019-12-01 03:09:16', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575191409, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-01 03:10:09', '2019-12-01 03:10:09', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575191456, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-01 03:10:56', '2019-12-01 03:10:56', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575191501, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-01 03:11:41', '2019-12-01 03:11:41', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575191541, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-01 03:12:21', '2019-12-01 03:12:21', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575191631, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2019-12-01 03:13:51', '2019-12-01 03:13:51', 'Physical Education & Life Skill Development', 'Md Sohel Rana'),
(1575191679, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-01 03:14:39', '2019-12-01 03:14:39', 'Social Science', 'Rabya Khathun'),
(1575191735, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-01 03:15:35', '2019-12-01 03:15:35', 'Social Science', 'Rabya Khathun'),
(1575191786, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-01 03:16:26', '2019-12-01 03:16:26', 'Social Science', 'Rabya Khathun'),
(1575191834, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-01 03:17:14', '2019-12-01 03:17:14', 'Social Science', 'Rabya Khathun'),
(1575191916, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-01 03:18:36', '2019-12-01 03:18:36', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575191970, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-01 03:19:30', '2019-12-01 03:19:30', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575192021, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-01 03:20:21', '2019-12-01 03:20:21', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575192079, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-01 03:21:19', '2019-12-01 03:21:19', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575192129, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-01 03:22:09', '2019-12-01 03:22:09', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575192173, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2019-12-01 03:22:53', '2019-12-01 03:22:53', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575193015, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-01 03:36:55', '2019-12-01 03:36:55', 'Engineering Drawing', 'Mizanur Rahman'),
(1575193134, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-01 03:38:54', '2019-12-01 03:38:54', 'Engineering Drawing', 'Mizanur Rahman'),
(1575193248, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-01 03:40:48', '2019-12-01 03:40:48', 'Computer Lab. Practice (IT support-I)', 'Md. Masud Rana'),
(1575193310, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-01 03:41:50', '2019-12-01 03:41:50', 'Computer Lab. Practice (IT support-I)', 'Md. Masud Rana'),
(1575193413, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-01 03:43:33', '2019-12-01 03:43:33', 'Physical Education & Life Skill Development', 'Md Sohel Rana'),
(1575193491, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-01 03:44:51', '2019-12-01 03:44:51', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575193527, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-01 03:45:27', '2019-12-01 03:45:27', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575193565, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-01 03:46:05', '2019-12-01 03:46:05', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575193609, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-01 03:46:49', '2019-12-01 03:46:49', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575193650, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-01 03:47:30', '2019-12-01 03:47:30', 'Mathematics-1', 'ANKUR KUMER DEY'),
(1575193698, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-01 03:48:18', '2019-12-01 03:48:18', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575193745, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-01 03:49:05', '2019-12-01 03:49:05', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575193792, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-01 03:49:52', '2019-12-01 03:49:52', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575193835, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-01 03:50:35', '2019-12-01 03:50:35', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575193874, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-01 03:51:14', '2019-12-01 03:51:14', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575193965, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-01 03:52:45', '2019-12-01 03:52:45', 'Social Science', 'Rabya Khathun'),
(1575194020, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-01 03:53:40', '2019-12-01 03:53:40', 'Social Science', 'Rabya Khathun'),
(1575194082, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-01 03:54:42', '2019-12-01 03:54:42', 'Social Science', 'Rabya Khathun'),
(1575194137, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-01 03:55:37', '2019-12-01 03:55:37', 'Social Science', 'Rabya Khathun'),
(1575194179, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '6', '2019-12-01 03:56:19', '2019-12-01 03:56:19', 'Social Science', 'Rabya Khathun'),
(1575194299, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-01 03:58:19', '2019-12-01 03:58:19', 'Basic Graphics Design', 'Md. Shariful Islam'),
(1575194353, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-01 03:59:13', '2019-12-01 03:59:13', 'Basic Graphics Design', 'Md. Shariful Islam'),
(1575194398, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-01 03:59:58', '2019-12-01 03:59:58', 'Basic Graphics Design', 'Md. Shariful Islam'),
(1575194439, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '6', '2019-12-01 04:00:39', '2019-12-01 04:00:39', 'Basic Graphics Design', 'Md. Shariful Islam'),
(1575194586, 'First Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-01 04:03:06', '2019-12-01 04:03:06', 'Computer Lab. Practice (IT support-I)', 'Md. Masud Rana'),
(1575194677, 'First Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-01 04:04:37', '2019-12-01 04:04:37', 'Computer Lab. Practice (IT support-I)', 'Md. Masud Rana'),
(1575195398, 'First Semester', 'Civil Technology', 'TISI', 'General', '1', '2019-12-01 04:16:38', '2019-12-01 04:16:38', 'Engineering Drawing', 'Engr Zakia Sultana'),
(1575195448, 'First Semester', 'Civil Technology', 'TISI', 'General', '4', '2019-12-01 04:17:28', '2019-12-01 04:17:28', 'Engineering Drawing', 'Engr Zakia Sultana'),
(1575195501, 'First Semester', 'Civil Technology', 'TISI', 'General', '1', '2019-12-01 04:18:21', '2019-12-01 04:18:21', 'Bangla', 'Md Maznu Miah'),
(1575195551, 'First Semester', 'Civil Technology', 'TISI', 'General', '2', '2019-12-01 04:19:11', '2019-12-01 04:19:11', 'Bangla', 'Md Maznu Miah'),
(1575195595, 'First Semester', 'Civil Technology', 'TISI', 'General', '3', '2019-12-01 04:19:55', '2019-12-01 04:19:55', 'Bangla', 'Md Maznu Miah'),
(1575195641, 'First Semester', 'Civil Technology', 'TISI', 'General', '5', '2019-12-01 04:20:41', '2019-12-01 04:20:41', 'Bangla', 'Md Maznu Miah'),
(1575195683, 'First Semester', 'Civil Technology', 'TISI', 'General', '6', '2019-12-01 04:21:23', '2019-12-01 04:21:23', 'Bangla', 'Md Maznu Miah'),
(1575196096, 'First Semester', 'Civil Technology', 'TISI', 'General', '1', '2019-12-01 04:28:16', '2019-12-01 04:28:16', 'English', 'Md Sohel Rana'),
(1575196138, 'First Semester', 'Civil Technology', 'TISI', 'General', '2', '2019-12-01 04:28:58', '2019-12-01 04:28:58', 'English', 'Md Sohel Rana'),
(1575196188, 'First Semester', 'Civil Technology', 'TISI', 'General', '3', '2019-12-01 04:29:48', '2019-12-01 04:29:48', 'English', 'Md Sohel Rana'),
(1575196231, 'First Semester', 'Civil Technology', 'TISI', 'General', '4', '2019-12-01 04:30:31', '2019-12-01 04:30:31', 'English', 'Md Sohel Rana'),
(1575196294, 'First Semester', 'Civil Technology', 'TISI', 'General', '1', '2019-12-01 04:31:34', '2019-12-01 04:31:34', 'Mathematics-1', 'Md.Altab Hossain'),
(1575196342, 'First Semester', 'Civil Technology', 'TISI', 'General', '2', '2019-12-01 04:32:22', '2019-12-01 04:32:22', 'Mathematics-1', 'Md.Altab Hossain'),
(1575196386, 'First Semester', 'Civil Technology', 'TISI', 'General', '3', '2019-12-01 04:33:06', '2019-12-01 04:33:06', 'Mathematics-1', 'Md.Altab Hossain'),
(1575196431, 'First Semester', 'Civil Technology', 'TISI', 'General', '4', '2019-12-01 04:33:51', '2019-12-01 04:33:51', 'Mathematics-1', 'Md.Altab Hossain'),
(1575196475, 'First Semester', 'Civil Technology', 'TISI', 'General', '5', '2019-12-01 04:34:35', '2019-12-01 04:34:35', 'Mathematics-1', 'Md.Altab Hossain'),
(1575196552, 'First Semester', 'Civil Technology', 'TISI', 'General', '2', '2019-12-01 04:35:52', '2019-12-01 04:35:52', 'Physics-1', 'Md. Muraduzzaman'),
(1575196604, 'First Semester', 'Civil Technology', 'TISI', 'General', '4', '2019-12-01 04:36:44', '2019-12-01 04:36:44', 'Physics-1', 'Md. Muraduzzaman'),
(1575196657, 'First Semester', 'Civil Technology', 'TISI', 'General', '5', '2019-12-01 04:37:37', '2019-12-01 04:37:37', 'Physics-1', 'Md. Muraduzzaman'),
(1575196698, 'First Semester', 'Civil Technology', 'TISI', 'General', '6', '2019-12-01 04:38:18', '2019-12-01 04:38:18', 'Physics-1', 'Md. Muraduzzaman'),
(1575196759, 'First Semester', 'Civil Technology', 'TISI', 'General', '1', '2019-12-01 04:39:19', '2019-12-01 04:39:19', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575196804, 'First Semester', 'Civil Technology', 'TISI', 'General', '2', '2019-12-01 04:40:04', '2019-12-01 04:40:04', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575196841, 'First Semester', 'Civil Technology', 'TISI', 'General', '3', '2019-12-01 04:40:41', '2019-12-01 04:40:41', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575196966, 'First Semester', 'Civil Technology', 'TISI', 'General', '4', '2019-12-01 04:42:46', '2019-12-01 04:42:46', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575197006, 'First Semester', 'Civil Technology', 'TISI', 'General', '5', '2019-12-01 04:43:26', '2019-12-01 04:43:26', 'Electrical Engineering Fundamentals', 'Md. Touhidul Islam'),
(1575197111, 'First Semester', 'Civil Technology', 'TISI', 'General', '3', '2019-12-01 04:45:11', '2019-12-01 04:45:11', 'Workshop Practice', 'Mizanur Rahman'),
(1575197335, 'First Semester', 'Electrical Technology', 'TISI', 'General', '1', '2019-12-01 04:48:55', '2019-12-01 04:48:55', 'Basic Electricity', 'Shaima Hanif'),
(1575197391, 'First Semester', 'Electrical Technology', 'TISI', 'General', '2', '2019-12-01 04:49:51', '2019-12-01 04:49:51', 'Basic Electricity', 'Shaima Hanif'),
(1575197447, 'First Semester', 'Electrical Technology', 'TISI', 'General', '4', '2019-12-01 04:50:47', '2019-12-01 04:50:47', 'Basic Electricity', 'Shaima Hanif'),
(1575197512, 'First Semester', 'Electrical Technology', 'TISI', 'General', '5', '2019-12-01 04:51:52', '2019-12-01 04:51:52', 'Basic Electricity', 'Shaima Hanif'),
(1575197556, 'First Semester', 'Electrical Technology', 'TISI', 'General', '6', '2019-12-01 04:52:36', '2019-12-01 04:52:36', 'Basic Electricity', 'Shaima Hanif'),
(1575197632, 'First Semester', 'Electrical Technology', 'TISI', 'General', '1', '2019-12-01 04:53:52', '2019-12-01 04:53:52', 'Electrical Engineering Materials', 'Md. Touhidul Islam'),
(1575197681, 'First Semester', 'Electrical Technology', 'TISI', 'General', '3', '2019-12-01 04:54:41', '2019-12-01 04:54:41', 'Electrical Engineering Materials', 'Md. Touhidul Islam'),
(1575197741, 'First Semester', 'Electrical Technology', 'TISI', 'General', '5', '2019-12-01 04:55:41', '2019-12-01 04:55:41', 'Electrical Engineering Materials', 'Md. Touhidul Islam'),
(1575197789, 'First Semester', 'Electrical Technology', 'TISI', 'General', '6', '2019-12-01 04:56:29', '2019-12-01 04:56:29', 'Electrical Engineering Materials', 'Md. Touhidul Islam'),
(1575197854, 'First Semester', 'Electrical Technology', 'TISI', 'General', '1', '2019-12-01 04:57:34', '2019-12-01 04:57:34', 'Basic Electronics', 'Shaima Hanif'),
(1575197919, 'First Semester', 'Electrical Technology', 'TISI', 'General', '3', '2019-12-01 04:58:39', '2019-12-01 04:58:39', 'Basic Electronics', 'Shaima Hanif'),
(1575197976, 'First Semester', 'Electrical Technology', 'TISI', 'General', '4', '2019-12-01 04:59:36', '2019-12-01 04:59:36', 'Basic Electronics', 'Shaima Hanif'),
(1575198029, 'First Semester', 'Electrical Technology', 'TISI', 'General', '5', '2019-12-01 05:00:29', '2019-12-01 05:00:29', 'Basic Electronics', 'Shaima Hanif'),
(1575198088, 'First Semester', 'Electrical Technology', 'TISI', 'General', '2', '2019-12-01 05:01:28', '2019-12-01 05:01:28', 'Engineering Drawing', 'Engr Zakia Sultana'),
(1575198134, 'First Semester', 'Electrical Technology', 'TISI', 'General', '5', '2019-12-01 05:02:14', '2019-12-01 05:02:14', 'Engineering Drawing', 'Engr Zakia Sultana'),
(1575198385, 'First Semester', 'Electrical Technology', 'TISI', 'General', '4', '2019-12-01 05:06:25', '2019-12-01 05:06:25', 'Physical Education & Life Skill Development', 'Md Sohel Rana'),
(1575198429, 'First Semester', 'Electrical Technology', 'TISI', 'General', '1', '2019-12-01 05:07:09', '2019-12-01 05:07:09', 'Mathematics-1', 'Md.Altab Hossain'),
(1575198464, 'First Semester', 'Electrical Technology', 'TISI', 'General', '2', '2019-12-01 05:07:44', '2019-12-01 05:07:44', 'Mathematics-1', 'Md.Altab Hossain'),
(1575198498, 'First Semester', 'Electrical Technology', 'TISI', 'General', '3', '2019-12-01 05:08:18', '2019-12-01 05:08:18', 'Mathematics-1', 'Md.Altab Hossain'),
(1575198546, 'First Semester', 'Electrical Technology', 'TISI', 'General', '5', '2019-12-01 05:09:06', '2019-12-01 05:09:06', 'Mathematics-1', 'Md.Altab Hossain'),
(1575198588, 'First Semester', 'Electrical Technology', 'TISI', 'General', '1', '2019-12-01 05:09:48', '2019-12-01 05:09:48', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575198626, 'First Semester', 'Electrical Technology', 'TISI', 'General', '2', '2019-12-01 05:10:26', '2019-12-01 05:10:26', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575198662, 'First Semester', 'Electrical Technology', 'TISI', 'General', '3', '2019-12-01 05:11:02', '2019-12-01 05:11:02', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575198701, 'First Semester', 'Electrical Technology', 'TISI', 'General', '4', '2019-12-01 05:11:41', '2019-12-01 05:11:41', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575198765, 'First Semester', 'Electrical Technology', 'TISI', 'General', '6', '2019-12-01 05:12:45', '2019-12-01 05:12:45', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575266199, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '2', '2019-12-01 23:56:39', '2019-12-01 23:56:39', 'Engineering Drawing', 'Engr Zakia Sultana'),
(1575266278, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '5', '2019-12-01 23:57:58', '2019-12-01 23:57:58', 'Engineering Drawing', 'Engr Zakia Sultana'),
(1575266328, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '1', '2019-12-01 23:58:48', '2019-12-01 23:58:48', 'Mathematics-1', 'Md.Altab Hossain'),
(1575266378, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '2', '2019-12-01 23:59:38', '2019-12-01 23:59:38', 'Mathematics-1', 'Md.Altab Hossain'),
(1575266420, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '3', '2019-12-02 00:00:20', '2019-12-02 00:00:20', 'Mathematics-1', 'Md.Altab Hossain'),
(1575266472, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '4', '2019-12-02 00:01:12', '2019-12-02 00:01:12', 'Mathematics-1', 'Md.Altab Hossain'),
(1575266516, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '5', '2019-12-02 00:01:56', '2019-12-02 00:01:56', 'Mathematics-1', 'Md.Altab Hossain'),
(1575266681, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '1', '2019-12-02 00:04:41', '2019-12-02 00:04:41', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575266739, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '2', '2019-12-02 00:05:39', '2019-12-02 00:05:39', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575266786, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '3', '2019-12-02 00:06:26', '2019-12-02 00:06:26', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575266828, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '4', '2019-12-02 00:07:08', '2019-12-02 00:07:08', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575266909, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '6', '2019-12-02 00:08:29', '2019-12-02 00:08:29', 'Chemistry', 'A.T.M Tazmilur Rahman'),
(1575266973, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '1', '2019-12-02 00:09:33', '2019-12-02 00:09:33', 'Basic Electricity', 'Shaima Hanif'),
(1575267030, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '2', '2019-12-02 00:10:30', '2019-12-02 00:10:30', 'Basic Electricity', 'Shaima Hanif'),
(1575267085, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '4', '2019-12-02 00:11:25', '2019-12-02 00:11:25', 'Basic Electricity', 'Shaima Hanif'),
(1575267358, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '5', '2019-12-02 00:15:58', '2019-12-02 00:15:58', 'Basic Electricity', 'Shaima Hanif'),
(1575267426, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '6', '2019-12-02 00:17:06', '2019-12-02 00:17:06', 'Basic Electricity', 'Shaima Hanif'),
(1575267482, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '1', '2019-12-02 00:18:02', '2019-12-02 00:18:02', 'Social Science', 'Rabya Khathun'),
(1575267536, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '3', '2019-12-02 00:18:56', '2019-12-02 00:18:56', 'Social Science', 'Rabya Khathun'),
(1575267581, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '5', '2019-12-02 00:19:41', '2019-12-02 00:19:41', 'Social Science', 'Rabya Khathun'),
(1575267625, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '6', '2019-12-02 00:20:25', '2019-12-02 00:20:25', 'Social Science', 'Rabya Khathun'),
(1575267986, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '1', '2019-12-02 00:26:26', '2019-12-02 00:26:26', 'Ceramic Engineering Materials-1', 'Jakiya Jafrin'),
(1575268034, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '3', '2019-12-02 00:27:14', '2019-12-02 00:27:14', 'Ceramic Engineering Materials-1', 'Jakiya Jafrin'),
(1575268088, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '4', '2019-12-02 00:28:08', '2019-12-02 00:28:08', 'Ceramic Engineering Materials-1', 'Jakiya Jafrin'),
(1575268159, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '5', '2019-12-02 00:29:19', '2019-12-02 00:29:19', 'Ceramic Engineering Materials-1', 'Jakiya Jafrin'),
(1575268207, 'First Semester', 'Ceramic Technology', 'TISI', 'General', '4', '2019-12-02 00:30:07', '2019-12-02 00:30:07', 'Physical Education & Life Skill Development', 'Md Sohel Rana'),
(1575268518, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 00:35:18', '2019-12-02 00:35:18', 'Programming Essentials', 'Md. Jubayer Hossain'),
(1575268562, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 00:36:02', '2019-12-02 00:36:02', 'Programming Essentials', 'Md. Jubayer Hossain'),
(1575268621, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 00:37:01', '2019-12-02 00:37:01', 'Programming Essentials', 'Md. Jubayer Hossain'),
(1575268689, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 00:38:09', '2019-12-02 00:38:09', 'Web Design', 'Md. Masud Rana'),
(1575268737, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 00:38:57', '2019-12-02 00:38:57', 'Web Design', 'Md. Masud Rana'),
(1575268799, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 00:39:59', '2019-12-02 00:39:59', 'Graphics Design-2', 'Md. Arif Ahmed'),
(1575268854, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 00:40:54', '2019-12-02 00:40:54', 'Graphics Design-2', 'Md. Arif Ahmed'),
(1575268948, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 00:42:28', '2019-12-02 00:42:28', 'Digital Electronics', 'Shaima Hanif'),
(1575268994, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 00:43:14', '2019-12-02 00:43:14', 'Digital Electronics', 'Shaima Hanif'),
(1575269044, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 00:44:04', '2019-12-02 00:44:04', 'Digital Electronics', 'Shaima Hanif'),
(1575269086, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 00:44:46', '2019-12-02 00:44:46', 'Digital Electronics', 'Shaima Hanif'),
(1575269130, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 00:45:30', '2019-12-02 00:45:30', 'Mathematics-3', 'Md.Altab Hossain'),
(1575269172, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 00:46:12', '2019-12-02 00:46:12', 'Mathematics-3', 'Md.Altab Hossain'),
(1575269221, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 00:47:01', '2019-12-02 00:47:01', 'Mathematics-3', 'Md.Altab Hossain'),
(1575269263, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 00:47:43', '2019-12-02 00:47:43', 'Mathematics-3', 'Md.Altab Hossain'),
(1575269303, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2019-12-02 00:48:23', '2019-12-02 00:48:23', 'Mathematics-3', 'Md.Altab Hossain'),
(1575269430, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 00:50:30', '2019-12-02 00:50:30', 'Physics‐2', 'Md. Muraduzzaman'),
(1575269482, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 00:51:22', '2019-12-02 00:51:22', 'Physics‐2', 'Md. Muraduzzaman'),
(1575269538, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 00:52:18', '2019-12-02 00:52:18', 'Physics‐2', 'Md. Muraduzzaman'),
(1575269581, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 00:53:01', '2019-12-02 00:53:01', 'Physics‐2', 'Md. Muraduzzaman'),
(1575269623, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 00:53:43', '2019-12-02 00:53:43', 'Physics‐2', 'Md. Muraduzzaman'),
(1575270805, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 01:13:25', '2019-12-02 01:13:25', 'Communicative English', 'Md Sohel Rana'),
(1575270857, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 01:14:17', '2019-12-02 01:14:17', 'Communicative English', 'Md Sohel Rana'),
(1575270895, 'Third Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2019-12-02 01:14:55', '2019-12-02 01:14:55', 'Communicative English', 'Md Sohel Rana'),
(1575270981, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 01:16:21', '2019-12-02 01:16:21', 'Image Preparation 1', 'towfiq hasan'),
(1575271035, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 01:17:15', '2019-12-02 01:17:15', 'Image Preparation 1', 'towfiq hasan'),
(1575271081, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 01:18:01', '2019-12-02 01:18:01', 'Image Preparation 1', 'towfiq hasan'),
(1575271128, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 01:18:48', '2019-12-02 01:18:48', 'Image Preparation 1', 'towfiq hasan'),
(1575271179, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 01:19:39', '2019-12-02 01:19:39', 'Basic Design & Drawing', 'Md. Arif Ahmed'),
(1575271325, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 01:22:05', '2019-12-02 01:22:05', 'Basic Design & Drawing', 'Md. Arif Ahmed'),
(1575271406, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 01:23:26', '2019-12-02 01:23:26', 'Database Aplication', 'Ali Azom'),
(1575271449, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-02 01:24:09', '2019-12-02 01:24:09', 'Database Aplication', 'Ali Azom'),
(1575271512, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 01:25:12', '2019-12-02 01:25:12', 'Mathematics-3', 'Md.Altab Hossain'),
(1575271548, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 01:25:48', '2019-12-02 01:25:48', 'Mathematics-3', 'Md.Altab Hossain'),
(1575271592, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 01:26:32', '2019-12-02 01:26:32', 'Mathematics-3', 'Md.Altab Hossain'),
(1575271638, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 01:27:18', '2019-12-02 01:27:18', 'Mathematics-3', 'Md.Altab Hossain'),
(1575271675, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '6', '2019-12-02 01:27:55', '2019-12-02 01:27:55', 'Mathematics-3', 'Md.Altab Hossain'),
(1575271713, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 01:28:33', '2019-12-02 01:28:33', 'Physics‐2', 'Md. Muraduzzaman'),
(1575271744, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 01:29:04', '2019-12-02 01:29:04', 'Physics‐2', 'Md. Muraduzzaman'),
(1575271788, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-02 01:29:48', '2019-12-02 01:29:48', 'Physics‐2', 'Md. Muraduzzaman'),
(1575271826, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 01:30:26', '2019-12-02 01:30:26', 'Physics‐2', 'Md. Muraduzzaman'),
(1575271882, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 01:31:22', '2019-12-02 01:31:22', 'Physics‐2', 'Md. Muraduzzaman'),
(1575272021, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 01:33:41', '2019-12-02 01:33:41', 'Communicative English', 'Md Sohel Rana'),
(1575272059, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 01:34:19', '2019-12-02 01:34:19', 'Communicative English', 'Md Sohel Rana'),
(1575272095, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '6', '2019-12-02 01:34:55', '2019-12-02 01:34:55', 'Communicative English', 'Md Sohel Rana'),
(1575272150, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 01:35:50', '2019-12-02 01:35:50', 'Graphics Materials', 'towfiq hasan'),
(1575272191, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 01:36:31', '2019-12-02 01:36:31', 'Graphics Materials', 'towfiq hasan'),
(1575272231, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-02 01:37:11', '2019-12-02 01:37:11', 'Graphics Materials', 'towfiq hasan'),
(1575272277, 'Third Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 01:37:57', '2019-12-02 01:37:57', 'Graphics Materials', 'towfiq hasan'),
(1575279645, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 03:40:45', '2019-12-02 03:40:45', 'Database Management System', 'Ali Azom'),
(1575279696, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 03:41:36', '2019-12-02 03:41:36', 'Database Management System', 'Ali Azom'),
(1575279740, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 03:42:20', '2019-12-02 03:42:20', 'Database Management System', 'Ali Azom'),
(1575279777, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 03:42:57', '2019-12-02 03:42:57', 'Fabric Design', 'Ali Azom'),
(1575279841, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 03:44:01', '2019-12-02 03:44:01', 'Content Management System', 'Ali Azom'),
(1575280051, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 03:47:31', '2019-12-02 03:47:31', 'Data Communication System', 'Md. Jubayer Hossain'),
(1575280145, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 03:49:05', '2019-12-02 03:49:05', 'Data Communication System', 'Md. Jubayer Hossain'),
(1575280246, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 03:50:46', '2019-12-02 03:50:46', 'Data Communication System', 'Md. Jubayer Hossain'),
(1575280331, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 03:52:11', '2019-12-02 03:52:11', 'Data Communication System', 'Md. Jubayer Hossain'),
(1575280380, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2019-12-02 03:53:00', '2019-12-02 03:53:00', 'Data Communication System', 'Md. Jubayer Hossain'),
(1575280447, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 03:54:07', '2019-12-02 03:54:07', 'Programming in Java', 'Ali Azom'),
(1575280495, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 03:54:55', '2019-12-02 03:54:55', 'Programming in Java', 'Ali Azom'),
(1575280552, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 03:55:52', '2019-12-02 03:55:52', 'Programming in Java', 'Ali Azom'),
(1575280596, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 03:56:36', '2019-12-02 03:56:36', 'Programming in Java', 'Ali Azom'),
(1575280643, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 03:57:23', '2019-12-02 03:57:23', 'Microprocessor & interfacing', 'Md. Masud Rana'),
(1575280731, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 03:58:51', '2019-12-02 03:58:51', 'Microprocessor & interfacing', 'Md. Masud Rana'),
(1575280837, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 04:00:37', '2019-12-02 04:00:37', 'Microprocessor & interfacing', 'Md. Masud Rana'),
(1575280878, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2019-12-02 04:01:18', '2019-12-02 04:01:18', 'Microprocessor & interfacing', 'Md. Masud Rana'),
(1575280961, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2019-12-02 04:02:41', '2019-12-02 04:02:41', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1575281035, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 04:03:55', '2019-12-02 04:03:55', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1575281077, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2019-12-02 04:04:37', '2019-12-02 04:04:37', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1575281145, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 04:05:45', '2019-12-02 04:05:45', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1575281453, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2019-12-02 04:10:53', '2019-12-02 04:10:53', 'Environmental Studies', 'Jakiya Jafrin'),
(1575281499, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2019-12-02 04:11:39', '2019-12-02 04:11:39', 'Environmental Studies', 'Jakiya Jafrin'),
(1575281545, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2019-12-02 04:12:25', '2019-12-02 04:12:25', 'Environmental Studies', 'Jakiya Jafrin'),
(1575281670, 'Fifth Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2019-12-02 04:14:30', '2019-12-02 04:14:30', 'Environmental Studies', 'Jakiya Jafrin'),
(1575281832, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 04:17:12', '2019-12-02 04:17:12', 'Advertising Design', 'Md. Arif Ahmed'),
(1575281938, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 04:18:58', '2019-12-02 04:18:58', 'Advertising Design', 'Md. Arif Ahmed'),
(1575281983, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '6', '2019-12-02 04:19:43', '2019-12-02 04:19:43', 'Advertising Design', 'Md. Arif Ahmed'),
(1575282039, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 04:20:39', '2019-12-02 04:20:39', 'Fabric Design', 'towfiq hasan'),
(1575282092, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-02 04:21:32', '2019-12-02 04:21:32', 'Fabric Design', 'towfiq hasan'),
(1575282152, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 04:22:32', '2019-12-02 04:22:32', 'Fabric Design', 'towfiq hasan'),
(1575282192, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 04:23:12', '2019-12-02 04:23:12', 'Fabric Design', 'towfiq hasan'),
(1575282365, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 04:26:05', '2019-12-02 04:26:05', 'Design & Editing', 'Md. Arif Ahmed'),
(1575282428, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 04:27:08', '2019-12-02 04:27:08', 'Design & Editing', 'Md. Arif Ahmed'),
(1575282537, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 04:28:57', '2019-12-02 04:28:57', 'Design & Editing', 'Md. Arif Ahmed'),
(1575282584, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 04:29:44', '2019-12-02 04:29:44', 'Design & Editing', 'Md. Arif Ahmed'),
(1575282655, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 04:30:55', '2019-12-02 04:30:55', 'Packaging Design-1', 'Md. Shariful Islam'),
(1575282714, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-02 04:31:54', '2019-12-02 04:31:54', 'Packaging Design-1', 'Md. Shariful Islam'),
(1575282786, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 04:33:06', '2019-12-02 04:33:06', 'Computer Graphics Design-1', 'Md. Shariful Islam'),
(1575282858, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-02 04:34:18', '2019-12-02 04:34:18', 'Computer Graphics Design-1', 'Md. Shariful Islam'),
(1575282923, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 04:35:23', '2019-12-02 04:35:23', 'Computer Graphics Design-1', 'Md. Shariful Islam'),
(1575283013, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 04:36:53', '2019-12-02 04:36:53', 'Video & Sound Editing', 'towfiq hasan'),
(1575283057, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '4', '2019-12-02 04:37:37', '2019-12-02 04:37:37', 'Video & Sound Editing', 'towfiq hasan'),
(1575283165, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '6', '2019-12-02 04:39:25', '2019-12-02 04:39:25', 'Video & Sound Editing', 'towfiq hasan'),
(1575283251, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2019-12-02 04:40:51', '2019-12-02 04:40:51', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1575283322, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2019-12-02 04:42:02', '2019-12-02 04:42:02', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1575283376, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2019-12-02 04:42:56', '2019-12-02 04:42:56', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1575283441, 'Fifth Semester', 'Graphics Technology ', 'TISI', 'General', '5', '2019-12-02 04:44:01', '2019-12-02 04:44:01', 'Accounting Theory & Practice', 'Md. Rezaul Haque'),
(1583724426, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2020-03-08 21:27:06', '2020-03-08 21:27:06', 'Physics-1', 'Md. Muraduzzaman'),
(1583725466, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2020-03-08 21:44:26', '2020-03-08 21:44:26', 'Analog Electronics', 'Md. Touhidul Islam'),
(1583725499, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2020-03-08 21:44:59', '2020-03-08 21:44:59', 'Bangla', 'Md Maznu Miah'),
(1583725567, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2020-03-08 21:46:07', '2020-03-08 21:46:07', 'Math-2', 'ANKUR KUMER DEY'),
(1583725714, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '1', '2020-03-08 21:48:34', '2020-03-08 21:48:34', 'English', 'Md Sohel Rana'),
(1583725854, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2020-03-08 21:50:54', '2020-03-08 21:50:54', 'English', 'Md Sohel Rana'),
(1583725997, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2020-03-08 21:53:17', '2020-03-08 21:53:17', 'Physics-1', 'Md. Muraduzzaman'),
(1583726029, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2020-03-08 21:53:49', '2020-03-08 21:53:49', 'Physics-1', 'Md. Muraduzzaman'),
(1583726093, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2020-03-08 21:54:53', '2020-03-08 21:54:53', 'Bangla', 'Md Maznu Miah'),
(1583726126, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '2', '2020-03-08 21:55:26', '2020-03-08 21:55:26', 'Bangla', 'Md Maznu Miah'),
(1583726162, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2020-03-08 21:56:02', '2020-03-08 21:56:02', 'Analog Electronics', 'Md. Touhidul Islam'),
(1583726203, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2020-03-08 21:56:43', '2020-03-08 21:56:43', 'Database Application', 'Md. Masud Rana'),
(1583726254, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2020-03-08 21:57:34', '2020-03-08 21:57:34', 'Database Application', 'Md. Masud Rana'),
(1583726290, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2020-03-08 21:58:10', '2020-03-08 21:58:10', 'Math-2', 'ANKUR KUMER DEY'),
(1583726383, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2020-03-08 21:59:43', '2020-03-08 21:59:43', 'Math-2', 'ANKUR KUMER DEY'),
(1583726422, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2020-03-08 22:00:22', '2020-03-08 22:00:22', 'Math-2', 'ANKUR KUMER DEY'),
(1583726448, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2020-03-08 22:00:48', '2020-03-08 22:00:48', 'Bangla', 'Md Maznu Miah'),
(1583726486, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2020-03-08 22:01:26', '2020-03-08 22:01:26', 'Analog Electronics', 'Md. Touhidul Islam'),
(1583726527, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '4', '2020-03-08 22:02:07', '2020-03-08 22:02:07', 'Analog Electronics', 'Md. Touhidul Islam'),
(1583726568, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2020-03-08 22:02:48', '2020-03-08 22:02:48', 'Bangla', 'Md Maznu Miah'),
(1583726599, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2020-03-08 22:03:19', '2020-03-08 22:03:19', 'Analog Electronics', 'Md. Touhidul Islam'),
(1583726679, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2020-03-08 22:04:39', '2020-03-08 22:04:39', 'Math-2', 'ANKUR KUMER DEY'),
(1583726809, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2020-03-08 22:06:49', '2020-03-08 22:06:49', 'Graphic Design-1', 'Md. Shariful Islam'),
(1583726853, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '5', '2020-03-08 22:07:33', '2020-03-08 22:07:33', 'Graphic Design-1', 'Md. Shariful Islam'),
(1583730543, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2020-03-08 23:09:03', '2020-03-08 23:09:03', 'Database Application', 'Md. Masud Rana'),
(1583730579, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2020-03-08 23:09:39', '2020-03-08 23:09:39', 'Database Application', 'Md. Masud Rana'),
(1583730629, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '6', '2020-03-08 23:10:29', '2020-03-08 23:10:29', 'English', 'Md Sohel Rana'),
(1583732050, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2020-03-08 23:34:10', '2020-03-08 23:34:10', 'Offset Machine operation', 'Towfiq Hasan'),
(1583732138, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2020-03-08 23:35:38', '2020-03-08 23:35:38', 'English', 'Md Sohel Rana'),
(1583732299, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2020-03-08 23:38:19', '2020-03-08 23:38:19', 'Math-2', 'Md.Altab Hossain'),
(1583732406, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2020-03-08 23:40:06', '2020-03-08 23:40:06', 'Physics-1', 'Md. Muraduzzaman'),
(1583732439, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '1', '2020-03-08 23:40:39', '2020-03-08 23:40:39', 'Physics-1', 'Md. Muraduzzaman'),
(1583732542, 'Second Semester', 'Computer Science & Technology', 'TISI', 'General', '3', '2020-03-08 23:42:22', '2020-03-08 23:42:22', 'Physics-1', 'Md. Muraduzzaman'),
(1583732624, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:43:44', '2020-03-08 23:43:44', 'English', 'Md Sohel Rana'),
(1583732723, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:45:23', '2020-03-08 23:45:23', 'Math-2', 'Md.Altab Hossain'),
(1583732770, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:46:10', '2020-03-08 23:46:10', 'Physics-1', 'Md. Muraduzzaman'),
(1583732858, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:47:38', '2020-03-08 23:47:38', 'Bangla', 'Md Maznu Miah'),
(1583732896, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:48:16', '2020-03-08 23:48:16', 'Electrical Engineering Fundamental', 'Shaima Hanif'),
(1583732956, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2020-03-08 23:49:16', '2020-03-08 23:49:16', 'Bangla', 'Md Maznu Miah'),
(1583732998, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2020-03-08 23:49:58', '2020-03-08 23:49:58', 'Bangla', 'Md Maznu Miah'),
(1583733032, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:50:32', '2020-03-08 23:50:32', 'Physics-1', 'Md. Muraduzzaman'),
(1583733091, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:51:31', '2020-03-08 23:51:31', 'Math-2', 'Md.Altab Hossain'),
(1583733096, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '2', '2020-03-08 23:51:36', '2020-03-08 23:51:36', 'Math-2', 'Md.Altab Hossain'),
(1583733136, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2020-03-08 23:52:16', '2020-03-08 23:52:16', 'Computer Application', 'Md. Jubayer Hossain'),
(1583733168, 'Second Semester', 'Graphics Technology ', 'TISI', 'General', '3', '2020-03-08 23:52:48', '2020-03-08 23:52:48', 'Computer Application', 'Md. Jubayer Hossain');

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
(1575190863, '1575165600', '2019-12-01 03:01:03', '2019-12-01 03:01:03'),
(1575190924, '1575165600', '2019-12-01 03:02:04', '2019-12-01 03:02:04'),
(1575190993, '1575196800', '2019-12-01 03:03:13', '2019-12-01 03:03:13'),
(1575191043, '1575165600', '2019-12-01 03:04:03', '2019-12-01 03:04:03'),
(1575191105, '1575196800', '2019-12-01 03:05:05', '2019-12-01 03:05:05'),
(1575191149, '1575165600', '2019-12-01 03:05:49', '2019-12-01 03:05:49'),
(1575191202, '1575199800', '2019-12-01 03:06:42', '2019-12-01 03:06:42'),
(1575191253, '1575202800', '2019-12-01 03:07:33', '2019-12-01 03:07:33'),
(1575191300, '1575199800', '2019-12-01 03:08:20', '2019-12-01 03:08:20'),
(1575191356, '1575193800', '2019-12-01 03:09:16', '2019-12-01 03:09:16'),
(1575191409, '1575202800', '2019-12-01 03:10:09', '2019-12-01 03:10:09'),
(1575191456, '1575202800', '2019-12-01 03:10:56', '2019-12-01 03:10:56'),
(1575191501, '1575165600', '2019-12-01 03:11:41', '2019-12-01 03:11:41'),
(1575191541, '1575193800', '2019-12-01 03:12:21', '2019-12-01 03:12:21'),
(1575191631, '1575196800', '2019-12-01 03:13:51', '2019-12-01 03:13:51'),
(1575191679, '1575199800', '2019-12-01 03:14:39', '2019-12-01 03:14:39'),
(1575191735, '1575162600', '2019-12-01 03:15:35', '2019-12-01 03:15:35'),
(1575191786, '1575193800', '2019-12-01 03:16:26', '2019-12-01 03:16:26'),
(1575191834, '1575196800', '2019-12-01 03:17:14', '2019-12-01 03:17:14'),
(1575191916, '1575202800', '2019-12-01 03:18:36', '2019-12-01 03:18:36'),
(1575191970, '1575199800', '2019-12-01 03:19:30', '2019-12-01 03:19:30'),
(1575192021, '1575193800', '2019-12-01 03:20:21', '2019-12-01 03:20:21'),
(1575192079, '1575199800', '2019-12-01 03:21:19', '2019-12-01 03:21:19'),
(1575192129, '1575202800', '2019-12-01 03:22:09', '2019-12-01 03:22:09'),
(1575192173, '1575199800', '2019-12-01 03:22:53', '2019-12-01 03:22:53'),
(1575193015, '1575162600', '2019-12-01 03:36:55', '2019-12-01 03:36:55'),
(1575193134, '1575165600', '2019-12-01 03:38:54', '2019-12-01 03:38:54'),
(1575193248, '1575202800', '2019-12-01 03:40:48', '2019-12-01 03:40:48'),
(1575193310, '1575199800', '2019-12-01 03:41:50', '2019-12-01 03:41:50'),
(1575193413, '1575196800', '2019-12-01 03:43:33', '2019-12-01 03:43:33'),
(1575193491, '1575162600', '2019-12-01 03:44:51', '2019-12-01 03:44:51'),
(1575193527, '1575193800', '2019-12-01 03:45:27', '2019-12-01 03:45:27'),
(1575193565, '1575196800', '2019-12-01 03:46:05', '2019-12-01 03:46:05'),
(1575193609, '1575199800', '2019-12-01 03:46:49', '2019-12-01 03:46:49'),
(1575193650, '1575162600', '2019-12-01 03:47:30', '2019-12-01 03:47:30'),
(1575193698, '1575165600', '2019-12-01 03:48:18', '2019-12-01 03:48:18'),
(1575193745, '1575196800', '2019-12-01 03:49:05', '2019-12-01 03:49:05'),
(1575193792, '1575202800', '2019-12-01 03:49:52', '2019-12-01 03:49:52'),
(1575193835, '1575196800', '2019-12-01 03:50:35', '2019-12-01 03:50:35'),
(1575193874, '1575193800', '2019-12-01 03:51:14', '2019-12-01 03:51:14'),
(1575193965, '1575199800', '2019-12-01 03:52:45', '2019-12-01 03:52:45'),
(1575194020, '1575162600', '2019-12-01 03:53:40', '2019-12-01 03:53:40'),
(1575194082, '1575202800', '2019-12-01 03:54:42', '2019-12-01 03:54:42'),
(1575194137, '1575202800', '2019-12-01 03:55:37', '2019-12-01 03:55:37'),
(1575194179, '1575199800', '2019-12-01 03:56:19', '2019-12-01 03:56:19'),
(1575194299, '1575165600', '2019-12-01 03:58:19', '2019-12-01 03:58:19'),
(1575194353, '1575199800', '2019-12-01 03:59:13', '2019-12-01 03:59:13'),
(1575194398, '1575165600', '2019-12-01 03:59:58', '2019-12-01 03:59:58'),
(1575194439, '1575196800', '2019-12-01 04:00:39', '2019-12-01 04:00:39'),
(1575194586, '1575199800', '2019-12-01 04:03:06', '2019-12-01 04:03:06'),
(1575194677, '1575165600', '2019-12-01 04:04:37', '2019-12-01 04:04:37'),
(1575195398, '1575202800', '2019-12-01 04:16:38', '2019-12-01 04:16:38'),
(1575195448, '1575199800', '2019-12-01 04:17:28', '2019-12-01 04:17:28'),
(1575195501, '1575196800', '2019-12-01 04:18:21', '2019-12-01 04:18:21'),
(1575195551, '1575196800', '2019-12-01 04:19:11', '2019-12-01 04:19:11'),
(1575195595, '1575199800', '2019-12-01 04:19:56', '2019-12-01 04:19:56'),
(1575195641, '1575162600', '2019-12-01 04:20:41', '2019-12-01 04:20:41'),
(1575195683, '1575196800', '2019-12-01 04:21:23', '2019-12-01 04:21:23'),
(1575196096, '1575162600', '2019-12-01 04:28:16', '2019-12-01 04:28:16'),
(1575196138, '1575193800', '2019-12-01 04:28:58', '2019-12-01 04:28:58'),
(1575196188, '1575162600', '2019-12-01 04:29:48', '2019-12-01 04:29:48'),
(1575196231, '1575165600', '2019-12-01 04:30:31', '2019-12-01 04:30:31'),
(1575196294, '1575193800', '2019-12-01 04:31:34', '2019-12-01 04:31:34'),
(1575196342, '1575202800', '2019-12-01 04:32:22', '2019-12-01 04:32:22'),
(1575196386, '1575202800', '2019-12-01 04:33:06', '2019-12-01 04:33:06'),
(1575196431, '1575193800', '2019-12-01 04:33:51', '2019-12-01 04:33:51'),
(1575196475, '1575196800', '2019-12-01 04:34:35', '2019-12-01 04:34:35'),
(1575196552, '1575199800', '2019-12-01 04:35:52', '2019-12-01 04:35:52'),
(1575196604, '1575202800', '2019-12-01 04:36:44', '2019-12-01 04:36:44'),
(1575196657, '1575202800', '2019-12-01 04:37:37', '2019-12-01 04:37:37'),
(1575196698, '1575199800', '2019-12-01 04:38:18', '2019-12-01 04:38:18'),
(1575196759, '1575165600', '2019-12-01 04:39:19', '2019-12-01 04:39:19'),
(1575196804, '1575165600', '2019-12-01 04:40:04', '2019-12-01 04:40:04'),
(1575196841, '1575165600', '2019-12-01 04:40:41', '2019-12-01 04:40:41'),
(1575196966, '1575162600', '2019-12-01 04:42:46', '2019-12-01 04:42:46'),
(1575197006, '1575165600', '2019-12-01 04:43:26', '2019-12-01 04:43:26'),
(1575197111, '1575196800', '2019-12-01 04:45:11', '2019-12-01 04:45:11'),
(1575197335, '1575199800', '2019-12-01 04:48:55', '2019-12-01 04:48:55'),
(1575197391, '1575165600', '2019-12-01 04:49:51', '2019-12-01 04:49:51'),
(1575197447, '1575199800', '2019-12-01 04:50:47', '2019-12-01 04:50:47'),
(1575197512, '1575202800', '2019-12-01 04:51:52', '2019-12-01 04:51:52'),
(1575197556, '1575199800', '2019-12-01 04:52:36', '2019-12-01 04:52:36'),
(1575197632, '1575193800', '2019-12-01 04:53:52', '2019-12-01 04:53:52'),
(1575197681, '1575199800', '2019-12-01 04:54:41', '2019-12-01 04:54:41'),
(1575197741, '1575193800', '2019-12-01 04:55:41', '2019-12-01 04:55:41'),
(1575197789, '1575196800', '2019-12-01 04:56:29', '2019-12-01 04:56:29'),
(1575197854, '1575162600', '2019-12-01 04:57:34', '2019-12-01 04:57:34'),
(1575197919, '1575162600', '2019-12-01 04:58:39', '2019-12-01 04:58:39'),
(1575197976, '1575162600', '2019-12-01 04:59:36', '2019-12-01 04:59:36'),
(1575198029, '1575196800', '2019-12-01 05:00:29', '2019-12-01 05:00:29'),
(1575198088, '1575199800', '2019-12-01 05:01:28', '2019-12-01 05:01:28'),
(1575198134, '1575165600', '2019-12-01 05:02:14', '2019-12-01 05:02:14'),
(1575198385, '1575196800', '2019-12-01 05:06:25', '2019-12-01 05:06:25'),
(1575198429, '1575165600', '2019-12-01 05:07:09', '2019-12-01 05:07:09'),
(1575198464, '1575193800', '2019-12-01 05:07:44', '2019-12-01 05:07:44'),
(1575198498, '1575196800', '2019-12-01 05:08:18', '2019-12-01 05:08:18'),
(1575198546, '1575199800', '2019-12-01 05:09:06', '2019-12-01 05:09:06'),
(1575198588, '1575202800', '2019-12-01 05:09:48', '2019-12-01 05:09:48'),
(1575198626, '1575162600', '2019-12-01 05:10:26', '2019-12-01 05:10:26'),
(1575198662, '1575165600', '2019-12-01 05:11:02', '2019-12-01 05:11:02'),
(1575198701, '1575165600', '2019-12-01 05:11:41', '2019-12-01 05:11:41'),
(1575198765, '1575193800', '2019-12-01 05:12:45', '2019-12-01 05:12:45'),
(1575266199, '1575286200', '2019-12-01 23:56:39', '2019-12-01 23:56:39'),
(1575266278, '1575252000', '2019-12-01 23:57:58', '2019-12-01 23:57:58'),
(1575266328, '1575252000', '2019-12-01 23:58:48', '2019-12-01 23:58:48'),
(1575266378, '1575280200', '2019-12-01 23:59:38', '2019-12-01 23:59:38'),
(1575266420, '1575283200', '2019-12-02 00:00:20', '2019-12-02 00:00:20'),
(1575266472, '1575289200', '2019-12-02 00:01:12', '2019-12-02 00:01:12'),
(1575266516, '1575286200', '2019-12-02 00:01:56', '2019-12-02 00:01:56'),
(1575266681, '1575289200', '2019-12-02 00:04:41', '2019-12-02 00:04:41'),
(1575266739, '1575249000', '2019-12-02 00:05:39', '2019-12-02 00:05:39'),
(1575266786, '1575252000', '2019-12-02 00:06:26', '2019-12-02 00:06:26'),
(1575266828, '1575252000', '2019-12-02 00:07:08', '2019-12-02 00:07:08'),
(1575266909, '1575280200', '2019-12-02 00:08:29', '2019-12-02 00:08:29'),
(1575266973, '1575286200', '2019-12-02 00:09:33', '2019-12-02 00:09:33'),
(1575267030, '1575252000', '2019-12-02 00:10:30', '2019-12-02 00:10:30'),
(1575267085, '1575286200', '2019-12-02 00:11:25', '2019-12-02 00:11:25'),
(1575267358, '1575289200', '2019-12-02 00:15:58', '2019-12-02 00:15:58'),
(1575267426, '1575286200', '2019-12-02 00:17:06', '2019-12-02 00:17:06'),
(1575267482, '1575280200', '2019-12-02 00:18:02', '2019-12-02 00:18:02'),
(1575267536, '1575286200', '2019-12-02 00:18:56', '2019-12-02 00:18:56'),
(1575267581, '1575280200', '2019-12-02 00:19:41', '2019-12-02 00:19:41'),
(1575267625, '1575283200', '2019-12-02 00:20:25', '2019-12-02 00:20:25'),
(1575267986, '1575249000', '2019-12-02 00:26:26', '2019-12-02 00:26:26'),
(1575268034, '1575249000', '2019-12-02 00:27:14', '2019-12-02 00:27:14'),
(1575268088, '1575249000', '2019-12-02 00:28:08', '2019-12-02 00:28:08'),
(1575268159, '1575283200', '2019-12-02 00:29:19', '2019-12-02 00:29:19'),
(1575268207, '1575283200', '2019-12-02 00:30:07', '2019-12-02 00:30:07'),
(1575268518, '1575283200', '2019-12-02 00:35:18', '2019-12-02 00:35:18'),
(1575268562, '1575280200', '2019-12-02 00:36:02', '2019-12-02 00:36:02'),
(1575268621, '1575289200', '2019-12-02 00:37:01', '2019-12-02 00:37:01'),
(1575268689, '1575249000', '2019-12-02 00:38:09', '2019-12-02 00:38:09'),
(1575268737, '1575289200', '2019-12-02 00:38:57', '2019-12-02 00:38:57'),
(1575268799, '1575249000', '2019-12-02 00:39:59', '2019-12-02 00:39:59'),
(1575268854, '1575289200', '2019-12-02 00:40:54', '2019-12-02 00:40:54'),
(1575268948, '1575286200', '2019-12-02 00:42:28', '2019-12-02 00:42:28'),
(1575268994, '1575283200', '2019-12-02 00:43:14', '2019-12-02 00:43:14'),
(1575269044, '1575283200', '2019-12-02 00:44:04', '2019-12-02 00:44:04'),
(1575269086, '1575252000', '2019-12-02 00:44:46', '2019-12-02 00:44:46'),
(1575269130, '1575286200', '2019-12-02 00:45:30', '2019-12-02 00:45:30'),
(1575269172, '1575252000', '2019-12-02 00:46:12', '2019-12-02 00:46:12'),
(1575269221, '1575252000', '2019-12-02 00:47:01', '2019-12-02 00:47:01'),
(1575269263, '1575249000', '2019-12-02 00:47:43', '2019-12-02 00:47:43'),
(1575269303, '1575283200', '2019-12-02 00:48:23', '2019-12-02 00:48:23'),
(1575269430, '1575252000', '2019-12-02 00:50:30', '2019-12-02 00:50:30'),
(1575269482, '1575280200', '2019-12-02 00:51:22', '2019-12-02 00:51:22'),
(1575269538, '1575252000', '2019-12-02 00:52:18', '2019-12-02 00:52:18'),
(1575269581, '1575280200', '2019-12-02 00:53:01', '2019-12-02 00:53:01'),
(1575269623, '1575280200', '2019-12-02 00:53:43', '2019-12-02 00:53:43'),
(1575270805, '1575248700', '2019-12-02 01:13:25', '2019-12-02 01:13:25'),
(1575270857, '1575286200', '2019-12-02 01:14:17', '2019-12-02 01:14:17'),
(1575270895, '1575286200', '2019-12-02 01:14:55', '2019-12-02 01:14:55'),
(1575270981, '1575249000', '2019-12-02 01:16:21', '2019-12-02 01:16:21'),
(1575271035, '1575283200', '2019-12-02 01:17:15', '2019-12-02 01:17:15'),
(1575271081, '1575289200', '2019-12-02 01:18:01', '2019-12-02 01:18:01'),
(1575271128, '1575289200', '2019-12-02 01:18:48', '2019-12-02 01:18:48'),
(1575271179, '1575280200', '2019-12-02 01:19:39', '2019-12-02 01:19:39'),
(1575271325, '1575286200', '2019-12-02 01:22:05', '2019-12-02 01:22:05'),
(1575271406, '1575289200', '2019-12-02 01:23:26', '2019-12-02 01:23:26'),
(1575271449, '1575289200', '2019-12-02 01:24:09', '2019-12-02 01:24:09'),
(1575271512, '1575286200', '2019-12-02 01:25:12', '2019-12-02 01:25:12'),
(1575271548, '1575252000', '2019-12-02 01:25:48', '2019-12-02 01:25:48'),
(1575271592, '1575252000', '2019-12-02 01:26:32', '2019-12-02 01:26:32'),
(1575271638, '1575249000', '2019-12-02 01:27:18', '2019-12-02 01:27:18'),
(1575271675, '1575283200', '2019-12-02 01:27:55', '2019-12-02 01:27:55'),
(1575271713, '1575252000', '2019-12-02 01:28:33', '2019-12-02 01:28:33'),
(1575271744, '1575280200', '2019-12-02 01:29:04', '2019-12-02 01:29:04'),
(1575271788, '1575252000', '2019-12-02 01:29:48', '2019-12-02 01:29:48'),
(1575271826, '1575280200', '2019-12-02 01:30:26', '2019-12-02 01:30:26'),
(1575271882, '1575280200', '2019-12-02 01:31:22', '2019-12-02 01:31:22'),
(1575272021, '1575249000', '2019-12-02 01:33:41', '2019-12-02 01:33:41'),
(1575272059, '1575286200', '2019-12-02 01:34:19', '2019-12-02 01:34:19'),
(1575272095, '1575286200', '2019-12-02 01:34:55', '2019-12-02 01:34:55'),
(1575272150, '1575283200', '2019-12-02 01:35:50', '2019-12-02 01:35:50'),
(1575272191, '1575249000', '2019-12-02 01:36:31', '2019-12-02 01:36:31'),
(1575272231, '1575283200', '2019-12-02 01:37:11', '2019-12-02 01:37:11'),
(1575272277, '1575252000', '2019-12-02 01:37:57', '2019-12-02 01:37:57'),
(1575279645, '1575249000', '2019-12-02 03:40:45', '2019-12-02 03:40:45'),
(1575279696, '1575252000', '2019-12-02 03:41:36', '2019-12-02 03:41:36'),
(1575279740, '1575286200', '2019-12-02 03:42:20', '2019-12-02 03:42:20'),
(1575279777, '1575252000', '2019-12-02 03:42:57', '2019-12-02 03:42:57'),
(1575279841, '1575286200', '2019-12-02 03:44:01', '2019-12-02 03:44:01'),
(1575280051, '1575289200', '2019-12-02 03:47:31', '2019-12-02 03:47:31'),
(1575280145, '1575283200', '2019-12-02 03:49:05', '2019-12-02 03:49:05'),
(1575280246, '1575289200', '2019-12-02 03:50:46', '2019-12-02 03:50:46'),
(1575280331, '1575283200', '2019-12-02 03:52:11', '2019-12-02 03:52:11'),
(1575280380, '1575283200', '2019-12-02 03:53:00', '2019-12-02 03:53:00'),
(1575280447, '1575249000', '2019-12-02 03:54:07', '2019-12-02 03:54:07'),
(1575280495, '1575283200', '2019-12-02 03:54:55', '2019-12-02 03:54:55'),
(1575280552, '1575249000', '2019-12-02 03:55:52', '2019-12-02 03:55:52'),
(1575280596, '1575280200', '2019-12-02 03:56:36', '2019-12-02 03:56:36'),
(1575280643, '1575280200', '2019-12-02 03:57:23', '2019-12-02 03:57:23'),
(1575280731, '1575252000', '2019-12-02 03:58:51', '2019-12-02 03:58:51'),
(1575280837, '1575252000', '2019-12-02 04:00:37', '2019-12-02 04:00:37'),
(1575280878, '1575280200', '2019-12-02 04:01:18', '2019-12-02 04:01:18'),
(1575280961, '1575252000', '2019-12-02 04:02:41', '2019-12-02 04:02:41'),
(1575281035, '1575289200', '2019-12-02 04:03:55', '2019-12-02 04:03:55'),
(1575281077, '1575286200', '2019-12-02 04:04:37', '2019-12-02 04:04:37'),
(1575281145, '1575286200', '2019-12-02 04:05:45', '2019-12-02 04:05:45'),
(1575281453, '1575286200', '2019-12-02 04:10:53', '2019-12-02 04:10:53'),
(1575281499, '1575289200', '2019-12-02 04:11:39', '2019-12-02 04:11:39'),
(1575281545, '1575289200', '2019-12-02 04:12:25', '2019-12-02 04:12:25'),
(1575281670, '1575286200', '2019-12-02 04:14:30', '2019-12-02 04:14:30'),
(1575281832, '1575283200', '2019-12-02 04:17:12', '2019-12-02 04:17:12'),
(1575281938, '1575289200', '2019-12-02 04:18:58', '2019-12-02 04:18:58'),
(1575281983, '1575286200', '2019-12-02 04:19:43', '2019-12-02 04:19:43'),
(1575282039, '1575286200', '2019-12-02 04:20:39', '2019-12-02 04:20:39'),
(1575282092, '1575249000', '2019-12-02 04:21:32', '2019-12-02 04:21:32'),
(1575282152, '1575252000', '2019-12-02 04:22:32', '2019-12-02 04:22:32'),
(1575282192, '1575280200', '2019-12-02 04:23:12', '2019-12-02 04:23:12'),
(1575282365, '1575286200', '2019-12-02 04:26:05', '2019-12-02 04:26:05'),
(1575282428, '1575249000', '2019-12-02 04:27:08', '2019-12-02 04:27:08'),
(1575282537, '1575249000', '2019-12-02 04:28:57', '2019-12-02 04:28:57'),
(1575282584, '1575252000', '2019-12-02 04:29:44', '2019-12-02 04:29:44'),
(1575282655, '1575283200', '2019-12-02 04:30:55', '2019-12-02 04:30:55'),
(1575282714, '1575283200', '2019-12-02 04:31:54', '2019-12-02 04:31:54'),
(1575282786, '1575249000', '2019-12-02 04:33:06', '2019-12-02 04:33:06'),
(1575282858, '1575252000', '2019-12-02 04:34:18', '2019-12-02 04:34:18'),
(1575282923, '1575286200', '2019-12-02 04:35:23', '2019-12-02 04:35:23'),
(1575283013, '1575252000', '2019-12-02 04:36:53', '2019-12-02 04:36:53'),
(1575283057, '1575283200', '2019-12-02 04:37:37', '2019-12-02 04:37:37'),
(1575283165, '1575283200', '2019-12-02 04:39:25', '2019-12-02 04:39:25'),
(1575283251, '1575252000', '2019-12-02 04:40:51', '2019-12-02 04:40:51'),
(1575283322, '1575289200', '2019-12-02 04:42:02', '2019-12-02 04:42:02'),
(1575283376, '1575286200', '2019-12-02 04:42:56', '2019-12-02 04:42:56'),
(1575283441, '1575286200', '2019-12-02 04:44:01', '2019-12-02 04:44:01'),
(1583724426, '1583747100', '2020-03-08 21:27:06', '2020-03-08 21:27:06'),
(1583725466, '1583749800', '2020-03-08 21:44:26', '2020-03-08 21:44:26'),
(1583725499, '1583752500', '2020-03-08 21:44:59', '2020-03-08 21:44:59'),
(1583725567, '1583755200', '2020-03-08 21:46:08', '2020-03-08 21:46:08'),
(1583725714, '1583757900', '2020-03-08 21:48:34', '2020-03-08 21:48:34'),
(1583725854, '1583752500', '2020-03-08 21:50:54', '2020-03-08 21:50:54'),
(1583725997, '1583755200', '2020-03-08 21:53:17', '2020-03-08 21:53:17'),
(1583726029, '1583757900', '2020-03-08 21:53:49', '2020-03-08 21:53:49'),
(1583726093, '1583747100', '2020-03-08 21:54:53', '2020-03-08 21:54:53'),
(1583726126, '1583749800', '2020-03-08 21:55:26', '2020-03-08 21:55:26'),
(1583726162, '1583747100', '2020-03-08 21:56:02', '2020-03-08 21:56:02'),
(1583726203, '1583749800', '2020-03-08 21:56:43', '2020-03-08 21:56:43'),
(1583726254, '1583752500', '2020-03-08 21:57:34', '2020-03-08 21:57:34'),
(1583726290, '1583755200', '2020-03-08 21:58:10', '2020-03-08 21:58:10'),
(1583726383, '1583747100', '2020-03-08 21:59:43', '2020-03-08 21:59:43'),
(1583726422, '1583749800', '2020-03-08 22:00:22', '2020-03-08 22:00:22'),
(1583726448, '1583752500', '2020-03-08 22:00:48', '2020-03-08 22:00:48'),
(1583726486, '1583755200', '2020-03-08 22:01:26', '2020-03-08 22:01:26'),
(1583726527, '1583757900', '2020-03-08 22:02:07', '2020-03-08 22:02:07'),
(1583726568, '1583747100', '2020-03-08 22:02:48', '2020-03-08 22:02:48'),
(1583726599, '1583749800', '2020-03-08 22:03:19', '2020-03-08 22:03:19'),
(1583726679, '1583757900', '2020-03-08 22:04:40', '2020-03-08 22:04:40'),
(1583726809, '1583752500', '2020-03-08 22:06:49', '2020-03-08 22:06:49'),
(1583726853, '1583755200', '2020-03-08 22:07:33', '2020-03-08 22:07:33'),
(1583730543, '1583747100', '2020-03-08 23:09:03', '2020-03-08 23:09:03'),
(1583730579, '1583749800', '2020-03-08 23:09:39', '2020-03-08 23:09:39'),
(1583730629, '1583752500', '2020-03-08 23:10:29', '2020-03-08 23:10:29'),
(1583732050, '1583747100', '2020-03-08 23:34:10', '2020-03-08 23:34:10'),
(1583732138, '1583749800', '2020-03-08 23:35:38', '2020-03-08 23:35:38'),
(1583732299, '1583752500', '2020-03-08 23:38:19', '2020-03-08 23:38:19'),
(1583732406, '1583755200', '2020-03-08 23:40:06', '2020-03-08 23:40:06'),
(1583732439, '1583757900', '2020-03-08 23:40:39', '2020-03-08 23:40:39'),
(1583732542, '1583757900', '2020-03-08 23:42:22', '2020-03-08 23:42:22'),
(1583732624, '1583747100', '2020-03-08 23:43:44', '2020-03-08 23:43:44'),
(1583732723, '1583749800', '2020-03-08 23:45:23', '2020-03-08 23:45:23'),
(1583732770, '1583752500', '2020-03-08 23:46:10', '2020-03-08 23:46:10'),
(1583732858, '1583755200', '2020-03-08 23:47:38', '2020-03-08 23:47:38'),
(1583732896, '1583757900', '2020-03-08 23:48:16', '2020-03-08 23:48:16'),
(1583732956, '1583747100', '2020-03-08 23:49:16', '2020-03-08 23:49:16'),
(1583732998, '1583749800', '2020-03-08 23:49:58', '2020-03-08 23:49:58'),
(1583733032, '1583752500', '2020-03-08 23:50:32', '2020-03-08 23:50:32'),
(1583733091, '1583752500', '2020-03-08 23:51:31', '2020-03-08 23:51:31'),
(1583733096, '1583752500', '2020-03-08 23:51:36', '2020-03-08 23:51:36'),
(1583733136, '1583755200', '2020-03-08 23:52:16', '2020-03-08 23:52:16'),
(1583733168, '1583757900', '2020-03-08 23:52:48', '2020-03-08 23:52:48');

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
(1575190863, '1575202800', '2019-12-01 03:01:03', '2019-12-01 03:01:03'),
(1575190924, '1575202800', '2019-12-01 03:02:04', '2019-12-01 03:02:04'),
(1575190993, '1575190800', '2019-12-01 03:03:13', '2019-12-01 03:03:13'),
(1575191043, '1575202800', '2019-12-01 03:04:03', '2019-12-01 03:04:03'),
(1575191105, '1575193800', '2019-12-01 03:05:05', '2019-12-01 03:05:05'),
(1575191149, '1575162600', '2019-12-01 03:05:49', '2019-12-01 03:05:49'),
(1575191202, '1575193800', '2019-12-01 03:06:42', '2019-12-01 03:06:42'),
(1575191253, '1575199800', '2019-12-01 03:07:33', '2019-12-01 03:07:33'),
(1575191300, '1575196800', '2019-12-01 03:08:20', '2019-12-01 03:08:20'),
(1575191356, '1575190800', '2019-12-01 03:09:16', '2019-12-01 03:09:16'),
(1575191409, '1575199800', '2019-12-01 03:10:09', '2019-12-01 03:10:09'),
(1575191456, '1575199800', '2019-12-01 03:10:56', '2019-12-01 03:10:56'),
(1575191501, '1575202800', '2019-12-01 03:11:41', '2019-12-01 03:11:41'),
(1575191541, '1575190800', '2019-12-01 03:12:21', '2019-12-01 03:12:21'),
(1575191631, '1575190800', '2019-12-01 03:13:51', '2019-12-01 03:13:51'),
(1575191679, '1575196800', '2019-12-01 03:14:39', '2019-12-01 03:14:39'),
(1575191735, '1575202800', '2019-12-01 03:15:35', '2019-12-01 03:15:35'),
(1575191786, '1575190800', '2019-12-01 03:16:26', '2019-12-01 03:16:26'),
(1575191834, '1575193800', '2019-12-01 03:17:14', '2019-12-01 03:17:14'),
(1575191916, '1575199800', '2019-12-01 03:18:36', '2019-12-01 03:18:36'),
(1575191970, '1575196800', '2019-12-01 03:19:30', '2019-12-01 03:19:30'),
(1575192021, '1575190800', '2019-12-01 03:20:21', '2019-12-01 03:20:21'),
(1575192079, '1575193800', '2019-12-01 03:21:19', '2019-12-01 03:21:19'),
(1575192129, '1575199800', '2019-12-01 03:22:09', '2019-12-01 03:22:09'),
(1575192173, '1575196800', '2019-12-01 03:22:53', '2019-12-01 03:22:53'),
(1575193015, '1575199800', '2019-12-01 03:36:55', '2019-12-01 03:36:55'),
(1575193134, '1575202800', '2019-12-01 03:38:54', '2019-12-01 03:38:54'),
(1575193248, '1575196800', '2019-12-01 03:40:48', '2019-12-01 03:40:48'),
(1575193310, '1575193800', '2019-12-01 03:41:50', '2019-12-01 03:41:50'),
(1575193413, '1575190800', '2019-12-01 03:43:33', '2019-12-01 03:43:33'),
(1575193491, '1575202800', '2019-12-01 03:44:51', '2019-12-01 03:44:51'),
(1575193527, '1575190800', '2019-12-01 03:45:27', '2019-12-01 03:45:27'),
(1575193565, '1575190800', '2019-12-01 03:46:05', '2019-12-01 03:46:05'),
(1575193609, '1575196800', '2019-12-01 03:46:49', '2019-12-01 03:46:49'),
(1575193650, '1575202800', '2019-12-01 03:47:30', '2019-12-01 03:47:30'),
(1575193698, '1575162600', '2019-12-01 03:48:18', '2019-12-01 03:48:18'),
(1575193745, '1575193800', '2019-12-01 03:49:05', '2019-12-01 03:49:05'),
(1575193792, '1575199800', '2019-12-01 03:49:52', '2019-12-01 03:49:52'),
(1575193835, '1575190800', '2019-12-01 03:50:35', '2019-12-01 03:50:35'),
(1575193874, '1575190800', '2019-12-01 03:51:14', '2019-12-01 03:51:14'),
(1575193965, '1575196800', '2019-12-01 03:52:45', '2019-12-01 03:52:45'),
(1575194020, '1575202800', '2019-12-01 03:53:40', '2019-12-01 03:53:40'),
(1575194082, '1575199800', '2019-12-01 03:54:42', '2019-12-01 03:54:42'),
(1575194137, '1575199800', '2019-12-01 03:55:37', '2019-12-01 03:55:37'),
(1575194179, '1575196800', '2019-12-01 03:56:19', '2019-12-01 03:56:19'),
(1575194299, '1575162600', '2019-12-01 03:58:19', '2019-12-01 03:58:19'),
(1575194353, '1575196800', '2019-12-01 03:59:13', '2019-12-01 03:59:13'),
(1575194398, '1575162600', '2019-12-01 03:59:58', '2019-12-01 03:59:58'),
(1575194439, '1575190800', '2019-12-01 04:00:39', '2019-12-01 04:00:39'),
(1575194586, '1575193800', '2019-12-01 04:03:06', '2019-12-01 04:03:06'),
(1575194677, '1575202800', '2019-12-01 04:04:37', '2019-12-01 04:04:37'),
(1575195398, '1575196800', '2019-12-01 04:16:38', '2019-12-01 04:16:38'),
(1575195448, '1575193800', '2019-12-01 04:17:28', '2019-12-01 04:17:28'),
(1575195501, '1575193800', '2019-12-01 04:18:21', '2019-12-01 04:18:21'),
(1575195551, '1575193800', '2019-12-01 04:19:11', '2019-12-01 04:19:11'),
(1575195595, '1575196800', '2019-12-01 04:19:55', '2019-12-01 04:19:55'),
(1575195641, '1575202800', '2019-12-01 04:20:41', '2019-12-01 04:20:41'),
(1575195683, '1575190800', '2019-12-01 04:21:23', '2019-12-01 04:21:23'),
(1575196096, '1575202800', '2019-12-01 04:28:16', '2019-12-01 04:28:16'),
(1575196138, '1575190800', '2019-12-01 04:28:58', '2019-12-01 04:28:58'),
(1575196188, '1575202800', '2019-12-01 04:29:48', '2019-12-01 04:29:48'),
(1575196231, '1575162600', '2019-12-01 04:30:31', '2019-12-01 04:30:31'),
(1575196294, '1575190800', '2019-12-01 04:31:34', '2019-12-01 04:31:34'),
(1575196342, '1575199800', '2019-12-01 04:32:22', '2019-12-01 04:32:22'),
(1575196386, '1575199800', '2019-12-01 04:33:06', '2019-12-01 04:33:06'),
(1575196431, '1575190800', '2019-12-01 04:33:51', '2019-12-01 04:33:51'),
(1575196475, '1575190800', '2019-12-01 04:34:35', '2019-12-01 04:34:35'),
(1575196552, '1575196800', '2019-12-01 04:35:52', '2019-12-01 04:35:52'),
(1575196604, '1575199800', '2019-12-01 04:36:44', '2019-12-01 04:36:44'),
(1575196657, '1575196800', '2019-12-01 04:37:37', '2019-12-01 04:37:37'),
(1575196698, '1575196800', '2019-12-01 04:38:18', '2019-12-01 04:38:18'),
(1575196759, '1575162600', '2019-12-01 04:39:19', '2019-12-01 04:39:19'),
(1575196804, '1575202800', '2019-12-01 04:40:04', '2019-12-01 04:40:04'),
(1575196841, '1575162600', '2019-12-01 04:40:41', '2019-12-01 04:40:41'),
(1575196966, '1575202800', '2019-12-01 04:42:46', '2019-12-01 04:42:46'),
(1575197006, '1575202800', '2019-12-01 04:43:26', '2019-12-01 04:43:26'),
(1575197111, '1575190800', '2019-12-01 04:45:11', '2019-12-01 04:45:11'),
(1575197335, '1575193800', '2019-12-01 04:48:55', '2019-12-01 04:48:55'),
(1575197391, '1575162600', '2019-12-01 04:49:51', '2019-12-01 04:49:51'),
(1575197447, '1575196800', '2019-12-01 04:50:47', '2019-12-01 04:50:47'),
(1575197512, '1575199800', '2019-12-01 04:51:52', '2019-12-01 04:51:52'),
(1575197556, '1575196800', '2019-12-01 04:52:36', '2019-12-01 04:52:36'),
(1575197632, '1575190800', '2019-12-01 04:53:52', '2019-12-01 04:53:52'),
(1575197681, '1575196800', '2019-12-01 04:54:41', '2019-12-01 04:54:41'),
(1575197741, '1575190800', '2019-12-01 04:55:41', '2019-12-01 04:55:41'),
(1575197789, '1575193800', '2019-12-01 04:56:29', '2019-12-01 04:56:29'),
(1575197854, '1575202800', '2019-12-01 04:57:34', '2019-12-01 04:57:34'),
(1575197919, '1575199800', '2019-12-01 04:58:39', '2019-12-01 04:58:39'),
(1575197976, '1575202800', '2019-12-01 04:59:36', '2019-12-01 04:59:36'),
(1575198029, '1575193800', '2019-12-01 05:00:29', '2019-12-01 05:00:29'),
(1575198088, '1575193800', '2019-12-01 05:01:28', '2019-12-01 05:01:28'),
(1575198134, '1575202800', '2019-12-01 05:02:14', '2019-12-01 05:02:14'),
(1575198385, '1575190800', '2019-12-01 05:06:25', '2019-12-01 05:06:25'),
(1575198429, '1575162600', '2019-12-01 05:07:09', '2019-12-01 05:07:09'),
(1575198464, '1575190800', '2019-12-01 05:07:44', '2019-12-01 05:07:44'),
(1575198498, '1575190800', '2019-12-01 05:08:18', '2019-12-01 05:08:18'),
(1575198546, '1575196800', '2019-12-01 05:09:06', '2019-12-01 05:09:06'),
(1575198588, '1575199800', '2019-12-01 05:09:48', '2019-12-01 05:09:48'),
(1575198626, '1575199800', '2019-12-01 05:10:26', '2019-12-01 05:10:26'),
(1575198662, '1575162600', '2019-12-01 05:11:02', '2019-12-01 05:11:02'),
(1575198701, '1575162600', '2019-12-01 05:11:41', '2019-12-01 05:11:41'),
(1575198765, '1575190800', '2019-12-01 05:12:45', '2019-12-01 05:12:45'),
(1575266199, '1575280200', '2019-12-01 23:56:39', '2019-12-01 23:56:39'),
(1575266278, '1575289200', '2019-12-01 23:57:58', '2019-12-01 23:57:58'),
(1575266328, '1575249000', '2019-12-01 23:58:48', '2019-12-01 23:58:48'),
(1575266378, '1575277200', '2019-12-01 23:59:38', '2019-12-01 23:59:38'),
(1575266420, '1575277200', '2019-12-02 00:00:20', '2019-12-02 00:00:20'),
(1575266472, '1575286200', '2019-12-02 00:01:12', '2019-12-02 00:01:12'),
(1575266516, '1575283200', '2019-12-02 00:01:56', '2019-12-02 00:01:56'),
(1575266681, '1575286200', '2019-12-02 00:04:41', '2019-12-02 00:04:41'),
(1575266739, '1575286200', '2019-12-02 00:05:39', '2019-12-02 00:05:39'),
(1575266786, '1575249000', '2019-12-02 00:06:26', '2019-12-02 00:06:26'),
(1575266828, '1575249000', '2019-12-02 00:07:08', '2019-12-02 00:07:08'),
(1575266909, '1575277200', '2019-12-02 00:08:29', '2019-12-02 00:08:29'),
(1575266973, '1575280200', '2019-12-02 00:09:33', '2019-12-02 00:09:33'),
(1575267030, '1575249000', '2019-12-02 00:10:30', '2019-12-02 00:10:30'),
(1575267085, '1575283200', '2019-12-02 00:11:25', '2019-12-02 00:11:25'),
(1575267358, '1575286200', '2019-12-02 00:15:58', '2019-12-02 00:15:58'),
(1575267426, '1575283200', '2019-12-02 00:17:06', '2019-12-02 00:17:06'),
(1575267482, '1575277200', '2019-12-02 00:18:02', '2019-12-02 00:18:02'),
(1575267536, '1575283200', '2019-12-02 00:18:56', '2019-12-02 00:18:56'),
(1575267581, '1575277200', '2019-12-02 00:19:41', '2019-12-02 00:19:41'),
(1575267625, '1575280200', '2019-12-02 00:20:25', '2019-12-02 00:20:25'),
(1575267986, '1575289200', '2019-12-02 00:26:26', '2019-12-02 00:26:26'),
(1575268034, '1575286200', '2019-12-02 00:27:14', '2019-12-02 00:27:14'),
(1575268088, '1575289200', '2019-12-02 00:28:08', '2019-12-02 00:28:08'),
(1575268159, '1575280200', '2019-12-02 00:29:19', '2019-12-02 00:29:19'),
(1575268207, '1575277200', '2019-12-02 00:30:07', '2019-12-02 00:30:07'),
(1575268518, '1575277200', '2019-12-02 00:35:18', '2019-12-02 00:35:18'),
(1575268562, '1575277200', '2019-12-02 00:36:02', '2019-12-02 00:36:02'),
(1575268621, '1575286200', '2019-12-02 00:37:01', '2019-12-02 00:37:01'),
(1575268689, '1575286200', '2019-12-02 00:38:09', '2019-12-02 00:38:09'),
(1575268737, '1575283200', '2019-12-02 00:38:57', '2019-12-02 00:38:57'),
(1575268799, '1575286200', '2019-12-02 00:39:59', '2019-12-02 00:39:59'),
(1575268854, '1575283200', '2019-12-02 00:40:54', '2019-12-02 00:40:54'),
(1575268948, '1575280200', '2019-12-02 00:42:28', '2019-12-02 00:42:28'),
(1575268994, '1575280200', '2019-12-02 00:43:14', '2019-12-02 00:43:14'),
(1575269044, '1575280200', '2019-12-02 00:44:04', '2019-12-02 00:44:04'),
(1575269086, '1575249000', '2019-12-02 00:44:46', '2019-12-02 00:44:46'),
(1575269130, '1575283200', '2019-12-02 00:45:30', '2019-12-02 00:45:30'),
(1575269172, '1575249000', '2019-12-02 00:46:12', '2019-12-02 00:46:12'),
(1575269221, '1575249000', '2019-12-02 00:47:01', '2019-12-02 00:47:01'),
(1575269263, '1575289200', '2019-12-02 00:47:43', '2019-12-02 00:47:43'),
(1575269303, '1575277200', '2019-12-02 00:48:23', '2019-12-02 00:48:23'),
(1575269430, '1575249000', '2019-12-02 00:50:30', '2019-12-02 00:50:30'),
(1575269482, '1575277200', '2019-12-02 00:51:22', '2019-12-02 00:51:22'),
(1575269538, '1575289200', '2019-12-02 00:52:18', '2019-12-02 00:52:18'),
(1575269581, '1575277200', '2019-12-02 00:53:01', '2019-12-02 00:53:01'),
(1575269623, '1575277200', '2019-12-02 00:53:43', '2019-12-02 00:53:43'),
(1575270805, '1575289200', '2019-12-02 01:13:25', '2019-12-02 01:13:25'),
(1575270857, '1575280200', '2019-12-02 01:14:17', '2019-12-02 01:14:17'),
(1575270895, '1575283200', '2019-12-02 01:14:55', '2019-12-02 01:14:55'),
(1575270981, '1575286200', '2019-12-02 01:16:21', '2019-12-02 01:16:21'),
(1575271035, '1575280200', '2019-12-02 01:17:15', '2019-12-02 01:17:15'),
(1575271081, '1575286200', '2019-12-02 01:18:01', '2019-12-02 01:18:01'),
(1575271128, '1575286200', '2019-12-02 01:18:48', '2019-12-02 01:18:48'),
(1575271179, '1575277200', '2019-12-02 01:19:39', '2019-12-02 01:19:39'),
(1575271325, '1575280200', '2019-12-02 01:22:05', '2019-12-02 01:22:05'),
(1575271406, '1575283200', '2019-12-02 01:23:26', '2019-12-02 01:23:26'),
(1575271449, '1575283200', '2019-12-02 01:24:09', '2019-12-02 01:24:09'),
(1575271512, '1575283200', '2019-12-02 01:25:12', '2019-12-02 01:25:12'),
(1575271548, '1575249000', '2019-12-02 01:25:48', '2019-12-02 01:25:48'),
(1575271592, '1575249000', '2019-12-02 01:26:32', '2019-12-02 01:26:32'),
(1575271638, '1575289200', '2019-12-02 01:27:18', '2019-12-02 01:27:18'),
(1575271675, '1575277200', '2019-12-02 01:27:55', '2019-12-02 01:27:55'),
(1575271713, '1575249000', '2019-12-02 01:28:33', '2019-12-02 01:28:33'),
(1575271744, '1575277200', '2019-12-02 01:29:04', '2019-12-02 01:29:04'),
(1575271788, '1575289200', '2019-12-02 01:29:48', '2019-12-02 01:29:48'),
(1575271826, '1575277200', '2019-12-02 01:30:26', '2019-12-02 01:30:26'),
(1575271882, '1575277200', '2019-12-02 01:31:22', '2019-12-02 01:31:22'),
(1575272021, '1575289200', '2019-12-02 01:33:41', '2019-12-02 01:33:41'),
(1575272059, '1575280200', '2019-12-02 01:34:19', '2019-12-02 01:34:19'),
(1575272095, '1575283200', '2019-12-02 01:34:55', '2019-12-02 01:34:55'),
(1575272150, '1575280200', '2019-12-02 01:35:50', '2019-12-02 01:35:50'),
(1575272191, '1575289200', '2019-12-02 01:36:31', '2019-12-02 01:36:31'),
(1575272231, '1575277200', '2019-12-02 01:37:11', '2019-12-02 01:37:11'),
(1575272277, '1575249000', '2019-12-02 01:37:57', '2019-12-02 01:37:57'),
(1575279645, '1575289200', '2019-12-02 03:40:45', '2019-12-02 03:40:45'),
(1575279696, '1575249000', '2019-12-02 03:41:36', '2019-12-02 03:41:36'),
(1575279740, '1575283200', '2019-12-02 03:42:20', '2019-12-02 03:42:20'),
(1575279777, '1575289200', '2019-12-02 03:42:57', '2019-12-02 03:42:57'),
(1575279841, '1575280200', '2019-12-02 03:44:01', '2019-12-02 03:44:01'),
(1575280051, '1575286200', '2019-12-02 03:47:31', '2019-12-02 03:47:31'),
(1575280145, '1575277200', '2019-12-02 03:49:05', '2019-12-02 03:49:05'),
(1575280246, '1575286200', '2019-12-02 03:50:46', '2019-12-02 03:50:46'),
(1575280331, '1575277200', '2019-12-02 03:52:11', '2019-12-02 03:52:11'),
(1575280380, '1575280200', '2019-12-02 03:53:00', '2019-12-02 03:53:00'),
(1575280447, '1575289200', '2019-12-02 03:54:07', '2019-12-02 03:54:07'),
(1575280495, '1575277200', '2019-12-02 03:54:55', '2019-12-02 03:54:55'),
(1575280552, '1575289200', '2019-12-02 03:55:52', '2019-12-02 03:55:52'),
(1575280596, '1575277200', '2019-12-02 03:56:36', '2019-12-02 03:56:36'),
(1575280643, '1575277200', '2019-12-02 03:57:23', '2019-12-02 03:57:23'),
(1575280731, '1575289200', '2019-12-02 03:58:51', '2019-12-02 03:58:51'),
(1575280837, '1575249000', '2019-12-02 04:00:37', '2019-12-02 04:00:37'),
(1575280878, '1575277200', '2019-12-02 04:01:18', '2019-12-02 04:01:18'),
(1575280961, '1575249000', '2019-12-02 04:02:41', '2019-12-02 04:02:41'),
(1575281035, '1575286200', '2019-12-02 04:03:55', '2019-12-02 04:03:55'),
(1575281077, '1575283200', '2019-12-02 04:04:37', '2019-12-02 04:04:37'),
(1575281145, '1575280200', '2019-12-02 04:05:45', '2019-12-02 04:05:45'),
(1575281453, '1575283200', '2019-12-02 04:10:53', '2019-12-02 04:10:53'),
(1575281499, '1575286200', '2019-12-02 04:11:39', '2019-12-02 04:11:39'),
(1575281545, '1575286200', '2019-12-02 04:12:25', '2019-12-02 04:12:25'),
(1575281670, '1575283200', '2019-12-02 04:14:30', '2019-12-02 04:14:30'),
(1575281832, '1575277200', '2019-12-02 04:17:12', '2019-12-02 04:17:12'),
(1575281938, '1575286200', '2019-12-02 04:18:58', '2019-12-02 04:18:58'),
(1575281983, '1575283200', '2019-12-02 04:19:43', '2019-12-02 04:19:43'),
(1575282039, '1575283200', '2019-12-02 04:20:39', '2019-12-02 04:20:39'),
(1575282092, '1575286200', '2019-12-02 04:21:32', '2019-12-02 04:21:32'),
(1575282152, '1575249000', '2019-12-02 04:22:32', '2019-12-02 04:22:32'),
(1575282192, '1575277200', '2019-12-02 04:23:12', '2019-12-02 04:23:12'),
(1575282365, '1575283200', '2019-12-02 04:26:05', '2019-12-02 04:26:05'),
(1575282428, '1575289200', '2019-12-02 04:27:08', '2019-12-02 04:27:08'),
(1575282537, '1575286200', '2019-12-02 04:28:57', '2019-12-02 04:28:57'),
(1575282584, '1575289200', '2019-12-02 04:29:44', '2019-12-02 04:29:44'),
(1575282655, '1575277200', '2019-12-02 04:30:55', '2019-12-02 04:30:55'),
(1575282714, '1575277200', '2019-12-02 04:31:54', '2019-12-02 04:31:54'),
(1575282786, '1575286200', '2019-12-02 04:33:06', '2019-12-02 04:33:06'),
(1575282858, '1575249000', '2019-12-02 04:34:18', '2019-12-02 04:34:18'),
(1575282923, '1575283200', '2019-12-02 04:35:23', '2019-12-02 04:35:23'),
(1575283013, '1575249000', '2019-12-02 04:36:53', '2019-12-02 04:36:53'),
(1575283057, '1575277200', '2019-12-02 04:37:37', '2019-12-02 04:37:37'),
(1575283165, '1575277200', '2019-12-02 04:39:25', '2019-12-02 04:39:25'),
(1575283251, '1575249000', '2019-12-02 04:40:51', '2019-12-02 04:40:51'),
(1575283322, '1575286200', '2019-12-02 04:42:02', '2019-12-02 04:42:02'),
(1575283376, '1575283200', '2019-12-02 04:42:56', '2019-12-02 04:42:56'),
(1575283441, '1575280200', '2019-12-02 04:44:01', '2019-12-02 04:44:01'),
(1583724426, '1583744400', '2020-03-08 21:27:06', '2020-03-08 21:27:06'),
(1583725466, '1583747100', '2020-03-08 21:44:26', '2020-03-08 21:44:26'),
(1583725499, '1583749800', '2020-03-08 21:44:59', '2020-03-08 21:44:59'),
(1583725567, '1583752500', '2020-03-08 21:46:07', '2020-03-08 21:46:07'),
(1583725714, '1583755200', '2020-03-08 21:48:34', '2020-03-08 21:48:34'),
(1583725854, '1583749800', '2020-03-08 21:50:54', '2020-03-08 21:50:54'),
(1583725997, '1583752500', '2020-03-08 21:53:17', '2020-03-08 21:53:17'),
(1583726029, '1583755200', '2020-03-08 21:53:49', '2020-03-08 21:53:49'),
(1583726093, '1583744400', '2020-03-08 21:54:53', '2020-03-08 21:54:53'),
(1583726126, '1583747100', '2020-03-08 21:55:26', '2020-03-08 21:55:26'),
(1583726162, '1583744400', '2020-03-08 21:56:02', '2020-03-08 21:56:02'),
(1583726203, '1583747100', '2020-03-08 21:56:43', '2020-03-08 21:56:43'),
(1583726254, '1583749800', '2020-03-08 21:57:34', '2020-03-08 21:57:34'),
(1583726290, '1583752500', '2020-03-08 21:58:10', '2020-03-08 21:58:10'),
(1583726383, '1583744400', '2020-03-08 21:59:43', '2020-03-08 21:59:43'),
(1583726422, '1583747100', '2020-03-08 22:00:22', '2020-03-08 22:00:22'),
(1583726448, '1583749800', '2020-03-08 22:00:48', '2020-03-08 22:00:48'),
(1583726486, '1583752500', '2020-03-08 22:01:26', '2020-03-08 22:01:26'),
(1583726527, '1583755200', '2020-03-08 22:02:07', '2020-03-08 22:02:07'),
(1583726568, '1583744400', '2020-03-08 22:02:48', '2020-03-08 22:02:48'),
(1583726599, '1583747100', '2020-03-08 22:03:19', '2020-03-08 22:03:19'),
(1583726679, '1583755200', '2020-03-08 22:04:40', '2020-03-08 22:04:40'),
(1583726809, '1583749800', '2020-03-08 22:06:49', '2020-03-08 22:06:49'),
(1583726853, '1583752500', '2020-03-08 22:07:33', '2020-03-08 22:07:33'),
(1583730543, '1583744400', '2020-03-08 23:09:03', '2020-03-08 23:09:03'),
(1583730579, '1583747100', '2020-03-08 23:09:39', '2020-03-08 23:09:39'),
(1583730629, '1583749800', '2020-03-08 23:10:29', '2020-03-08 23:10:29'),
(1583732050, '1583744400', '2020-03-08 23:34:10', '2020-03-08 23:34:10'),
(1583732138, '1583747100', '2020-03-08 23:35:38', '2020-03-08 23:35:38'),
(1583732299, '1583749800', '2020-03-08 23:38:19', '2020-03-08 23:38:19'),
(1583732406, '1583752500', '2020-03-08 23:40:06', '2020-03-08 23:40:06'),
(1583732439, '1583755200', '2020-03-08 23:40:39', '2020-03-08 23:40:39'),
(1583732542, '1583755200', '2020-03-08 23:42:22', '2020-03-08 23:42:22'),
(1583732624, '1583744400', '2020-03-08 23:43:44', '2020-03-08 23:43:44'),
(1583732723, '1583747100', '2020-03-08 23:45:23', '2020-03-08 23:45:23'),
(1583732770, '1583749800', '2020-03-08 23:46:10', '2020-03-08 23:46:10'),
(1583732858, '1583752500', '2020-03-08 23:47:38', '2020-03-08 23:47:38'),
(1583732896, '1583755200', '2020-03-08 23:48:16', '2020-03-08 23:48:16'),
(1583732956, '1583744400', '2020-03-08 23:49:16', '2020-03-08 23:49:16'),
(1583732998, '1583747100', '2020-03-08 23:49:58', '2020-03-08 23:49:58'),
(1583733032, '1583749800', '2020-03-08 23:50:32', '2020-03-08 23:50:32'),
(1583733091, '1583749800', '2020-03-08 23:51:31', '2020-03-08 23:51:31'),
(1583733096, '1583749800', '2020-03-08 23:51:36', '2020-03-08 23:51:36'),
(1583733136, '1583752500', '2020-03-08 23:52:16', '2020-03-08 23:52:16'),
(1583733168, '1583755200', '2020-03-08 23:52:48', '2020-03-08 23:52:48');

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
(1574849085, 'TC', 'TC', NULL, '2019-11-27 04:04:45', '2019-11-27 04:04:45', NULL),
(1574849108, 'TF', 'TF', NULL, '2019-11-27 04:05:08', '2019-11-27 04:05:08', NULL),
(1574849126, 'PC', 'PC', '', '2019-11-27 04:05:26', '2020-03-14 04:17:34', ''),
(1574849148, 'PF', 'PF', NULL, '2019-11-27 04:05:48', '2019-11-27 04:05:48', NULL);

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
  `class` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_attendance`
--

INSERT INTO `daily_attendance` (`student_id`, `device_id`, `date`, `time`, `status`, `created_at`, `updated_at`, `sl_no`, `department`, `class`, `subject`) VALUES
('8517111', 'system_does_not_track', '14-03-2020', '1584178231', 'Present', '2020-03-14 03:30:31', '2020-03-14 03:30:31', 1, 'Computer Science & Technology', 'Sixth Semester', 'MVC Framework Development');

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
  `grade_for` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_grade_list`
--

INSERT INTO `exam_grade_list` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `grade_for`, `created_at`, `updated_at`) VALUES
(1, 'D', '2', '1', '40', '100', '2020-03-20 17:41:27', '2020-03-20 17:41:27'),
(2, 'C+', '2.5', '41', '50', '100', '2020-03-20 17:42:09', '2020-03-20 17:42:09'),
(3, 'C', '3', '51', '55', '100', '2020-03-20 17:42:37', '2020-03-20 17:42:37'),
(4, 'B+', '3.5', '56', '60', '100', '2020-03-20 17:43:23', '2020-03-20 17:43:23'),
(5, 'B', '4', '61', '65', '100', '2020-03-20 17:43:50', '2020-03-20 17:43:50'),
(6, 'A-', '4', '66', '70', '100', '2020-03-20 17:44:32', '2020-03-20 17:44:32'),
(7, 'A', '4.5', '71', '75', '100', '2020-03-20 18:10:03', '2020-03-20 18:10:03'),
(8, 'A+', '5', '76', '100', '100', '2020-03-20 18:10:28', '2020-03-20 18:10:28'),
(9, 'F', '0', '0', '39', '100', '2020-03-20 18:13:04', '2020-03-20 18:13:04'),
(10, 'D', '2', '1', '15', '50', '2020-03-20 17:41:27', '2020-03-20 17:41:27'),
(11, 'C+', '2.5', '15', '20', '50', '2020-03-20 17:42:09', '2020-03-20 17:42:09'),
(12, 'C', '3', '21', '25', '50', '2020-03-20 17:42:37', '2020-03-20 17:42:37'),
(13, 'B+', '3.5', '26', '30', '50', '2020-03-20 17:43:23', '2020-03-20 17:43:23'),
(14, 'B', '4', '31', '35', '50', '2020-03-20 17:43:50', '2020-03-20 17:43:50'),
(15, 'A-', '4', '36', '40', '50', '2020-03-20 17:44:32', '2020-03-20 17:44:32'),
(16, 'A', '4.5', '41', '45', '50', '2020-03-20 18:10:03', '2020-03-20 18:10:03'),
(17, 'A+', '5', '45', '50', '50', '2020-03-20 18:10:28', '2020-03-20 18:10:28'),
(18, 'F', '0', '0', '14', '50', '2020-03-20 18:13:04', '2020-03-20 18:13:04'),
(19, 'D', '2', '1', '50', '150', '2020-03-20 17:41:27', '2020-03-20 17:41:27'),
(20, 'C+', '2.5', '51', '65', '150', '2020-03-20 17:42:09', '2020-03-20 17:42:09'),
(21, 'C', '3', '66', '77', '150', '2020-03-20 17:42:37', '2020-03-20 17:42:37'),
(22, 'B+', '3.5', '78', '90', '150', '2020-03-20 17:43:23', '2020-03-20 17:43:23'),
(23, 'B', '4', '91', '105', '150', '2020-03-20 17:43:50', '2020-03-20 17:43:50'),
(24, 'A-', '4', '106', '114', '150', '2020-03-20 17:44:32', '2020-03-20 17:44:32'),
(25, 'A', '4.5', '115', '130', '150', '2020-03-20 18:10:03', '2020-03-20 18:10:03'),
(26, 'A+', '5', '131', '150', '150', '2020-03-20 18:10:28', '2020-03-20 18:10:28'),
(27, 'F', '0', '0', '49', '150', '2020-03-20 18:13:04', '2020-03-20 18:13:04'),
(28, 'D', '2', '1', '60', '200', '2020-03-20 17:41:27', '2020-03-20 17:41:27'),
(29, 'C+', '2.5', '61', '75', '200', '2020-03-20 17:42:09', '2020-03-20 17:42:09'),
(30, 'C', '3', '76', '85', '200', '2020-03-20 17:42:37', '2020-03-20 17:42:37'),
(31, 'B+', '3.5', '86', '95', '200', '2020-03-20 17:43:23', '2020-03-20 17:43:23'),
(32, 'B', '4', '96', '120', '200', '2020-03-20 17:43:50', '2020-03-20 17:43:50'),
(33, 'A-', '4', '121', '150', '200', '2020-03-20 17:44:32', '2020-03-20 17:44:32'),
(34, 'A', '4.5', '151', '170', '200', '2020-03-20 18:10:03', '2020-03-20 18:10:03'),
(35, 'A+', '5', '171', '200', '200', '2020-03-20 18:10:28', '2020-03-20 18:10:28'),
(36, 'F', '0', '0', '59', '200', '2020-03-20 18:13:04', '2020-03-20 18:13:04');

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
(9, 'Midterm Exam', '0', '2020-03-24', '2020-04-01', 'Yes', '2018-10-10 06:24:34', '2020-03-09 04:04:56'),
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
(1, ' TMSS INSTITUTE OF SCIENCE & ICT (TISI)', ' TMSS INSTITUTE OF SCIENCE & ICT (TISI)', '01711405998', 'Sujabad ( Dohopara  ) , Sajahanpur , Bogra ', 'Bangladesh', '5800', '20287', NULL, '2020-03-21 23:38:53', '1', '2017-2018', 'TISI Conference Room', '22:00:00', '00:00:00');

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
  `cash_status` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `form_name` varchar(191) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `medium`, `class_name`, `department`, `student_roll`, `title`, `on_net_total`, `waber`, `waber_purpose`, `Payment`, `from_date`, `to_date`, `invoice_creator`, `created_at`, `updated_at`, `cash_status`, `form_name`) VALUES
(2, 'TISI', 'Second Semester', 'Computer Science & Technology', '191', 'Mid Term', '3050', '', '', '0', '2019-01-01', '2019-01-31', 'Md Abu Raihan', '2019-11-27 01:25:41', '2019-11-27 01:25:41', NULL, 'academic'),
(3, 'TISI', 'Sixth Semester', 'Computer Science & Technology', '8519118', 'Md. Nasim Uddin/8519118-Second Semester-Payment Invoice', '21350', '500', 'Good Result', '0', '2020-02-05', '2020-03-27', 'Md Jubayer Hossain', '2020-03-28 05:53:19', '2020-03-28 05:53:19', NULL, 'academic'),
(5, '', '', '', '', '', '', '', '', '0', '2020-02-01', '2020-03-30', 'Md Jubayer Hossain', '2020-03-30 09:47:22', '2020-03-30 09:47:22', NULL, 'academic'),
(6, 'TISI', 'Sixth Semester', 'Graphics Technology ', '981383', 'Md.Rokibul Islam/981383-Sixth Semester-Payment Invoice', '34211', '', '', '0', '2020-02-01', '2020-03-30', 'Md Jubayer Hossain', '2020-03-31 04:40:51', '2020-03-31 04:40:51', NULL, 'academic'),
(7, 'TISI', 'Sixth Semester', 'Graphics Technology ', '6517104', 'Newton Barman/6517104-Sixth Semester-Dormitory Invoice', '1043477', '', '', '0', '2020-3-01', '2020-3-31', 'Md Jubayer Hossain', '2020-03-31 09:50:56', '2020-03-31 09:50:56', NULL, 'dormitory'),
(8, 'TISI', 'Sixth Semester', 'Graphics Technology ', '6517104', 'Newton Barman/6517104-Sixth Semester-Dormitory Invoice', '558524', '', '', '0', '2020-1-01', '2020-1-31', 'Md Jubayer Hossain', '2020-03-31 09:53:01', '2020-03-31 09:53:01', NULL, 'dormitory'),
(9, 'TISI', 'Sixth Semester', 'Graphics Technology ', '19125', 'Mst. Janntul Fersosi /19125-Second Semester-Library Invoice', '81752', '', '', '0', '2020-1-01', '2020-1-31', 'Md Jubayer Hossain', '2020-03-31 09:58:43', '2020-03-31 09:58:43', NULL, 'library'),
(10, 'TISI', 'Sixth Semester', 'Computer Science & Technology', '2010242', 'Manzudur Rahman/2010242-Sixth Semester-Payment Invoice', '5987100', '', '', '0', '2020-03-01', '2020-04-30', 'Md Jubayer Hossain', '2020-04-01 06:34:26', '2020-04-01 06:34:26', NULL, 'academic'),
(11, 'TISI', 'Fifth Semester', 'Computer Science & Technology', '2010242', 'Manzudur Rahman/2010242-Sixth Semester-Payment Invoice', '254551', '', '', '0', '2020-02-01', '2020-04-01', 'Md Jubayer Hossain', '2020-04-01 09:58:07', '2020-04-01 09:58:07', NULL, 'academic'),
(12, 'TISI', 'Sixth Semester', 'Graphics Technology ', '159921', 'MD.ZUBAYER RAHMAN/159921-Sixth Semester-Payment Invoice', '930431', '', '', '0', '2020-02-01', '2020-04-02', 'Md Jubayer Hossain', '2020-04-02 04:30:42', '2020-04-02 04:30:42', NULL, 'academic'),
(13, 'TISI', 'Sixth Semester', 'Graphics Technology ', '981375', 'MD.ZUBAYER RAHMAN/981375-Sixth Semester-Payment Invoice', '918598', '', '', '0', '2020-03-01', '2020-04-30', 'Md Jubayer Hossain', '2020-04-02 04:39:55', '2020-04-02 04:39:55', NULL, 'academic');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_child`
--

CREATE TABLE `invoice_child` (
  `invoice_child_id` int(11) NOT NULL,
  `invoice_id` varchar(191) NOT NULL,
  `component_id` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_child`
--

INSERT INTO `invoice_child` (`invoice_child_id`, `invoice_id`, `component_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '3', '1539255451', '500', '2020-03-28 05:53:19', '2020-03-28 05:53:19'),
(2, '3', '1539255467', '500', '2020-03-28 05:53:19', '2020-03-28 05:53:19'),
(3, '3', '1539255506', '100', '2020-03-28 05:53:19', '2020-03-28 05:53:19'),
(4, '3', '1539255552', '250', '2020-03-28 05:53:19', '2020-03-28 05:53:19'),
(5, '3', '1539255706', '10000', '2020-03-28 05:53:19', '2020-03-28 05:53:19'),
(6, '3', '1539255743', '10000', '2020-03-28 05:53:19', '2020-03-28 05:53:19'),
(7, '3', '1539255759', '500', '2020-03-28 05:53:19', '2020-03-28 05:53:19'),
(8, '4', '1539255451', '500', '2020-03-28 06:08:48', '2020-03-28 06:08:48'),
(9, '4', '1539255467', '500', '2020-03-28 06:08:48', '2020-03-28 06:08:48'),
(10, '4', '1539255743', '5000', '2020-03-28 06:08:48', '2020-03-28 06:08:48'),
(11, '6', '1539255451', '500', '2020-03-31 04:40:51', '2020-03-31 04:40:51'),
(12, '6', '1539255467', '455', '2020-03-31 04:40:51', '2020-03-31 04:40:51'),
(13, '6', '1539255489', '544', '2020-03-31 04:40:51', '2020-03-31 04:40:51'),
(14, '6', '1539255506', '4455', '2020-03-31 04:40:51', '2020-03-31 04:40:51'),
(15, '6', '1539255552', '4545', '2020-03-31 04:40:51', '2020-03-31 04:40:51'),
(16, '6', '1539255706', '4545', '2020-03-31 04:40:51', '2020-03-31 04:40:51'),
(17, '6', '1539255743', '454', '2020-03-31 04:40:51', '2020-03-31 04:40:51'),
(18, '6', '1539255759', '545', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(19, '6', '1539255780', '545', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(20, '6', '1539255814', '433', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(21, '6', '1539255837', '4343', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(22, '6', '1539256598', '3434', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(23, '6', '1539257056', '3435', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(24, '6', '1539257118', '544', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(25, '6', '1539257247', '5434', '2020-03-31 04:40:52', '2020-03-31 04:40:52'),
(26, '7', '1539256598', '4354', '2020-03-31 09:50:56', '2020-03-31 09:50:56'),
(27, '7', '1539257024', '4354', '2020-03-31 09:50:56', '2020-03-31 09:50:56'),
(28, '7', '1539257039', '3454', '2020-03-31 09:50:56', '2020-03-31 09:50:56'),
(29, '7', '1539257056', '4354', '2020-03-31 09:50:56', '2020-03-31 09:50:56'),
(30, '7', '1539257118', '543', '2020-03-31 09:50:56', '2020-03-31 09:50:56'),
(31, '7', '1539257148', '534', '2020-03-31 09:50:56', '2020-03-31 09:50:56'),
(32, '7', '1539257657', '435345', '2020-03-31 09:50:56', '2020-03-31 09:50:56'),
(33, '7', '1539257673', '345', '2020-03-31 09:50:57', '2020-03-31 09:50:57'),
(34, '7', '1539257701', '35445', '2020-03-31 09:50:57', '2020-03-31 09:50:57'),
(35, '7', '1543020853', '543534', '2020-03-31 09:50:57', '2020-03-31 09:50:57'),
(36, '7', '1546272381', '5345', '2020-03-31 09:50:57', '2020-03-31 09:50:57'),
(37, '7', '1585561760', '435', '2020-03-31 09:50:57', '2020-03-31 09:50:57'),
(38, '7', '1585629835', '5435', '2020-03-31 09:50:57', '2020-03-31 09:50:57'),
(39, '8', '1539255451', '4545', '2020-03-31 09:53:01', '2020-03-31 09:53:01'),
(40, '8', '1539255467', '4354', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(41, '8', '1539255489', '544', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(42, '8', '1539255506', '4534', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(43, '8', '1539255552', '5435', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(44, '8', '1539255706', '435435', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(45, '8', '1539255743', '435', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(46, '8', '1539255759', '435', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(47, '8', '1539255780', '5434', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(48, '8', '1539255814', '5434', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(49, '8', '1539255837', '43543', '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(50, '8', '1539256598', '43543', '2020-03-31 09:53:03', '2020-03-31 09:53:03'),
(51, '8', '1539257171', '45', '2020-03-31 09:53:03', '2020-03-31 09:53:03'),
(52, '8', '1539257207', '4354', '2020-03-31 09:53:03', '2020-03-31 09:53:03'),
(53, '8', '1539257228', '454', '2020-03-31 09:53:03', '2020-03-31 09:53:03'),
(54, '9', '1539255451', '32432', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(55, '9', '1539255467', '432', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(56, '9', '1539255489', '2344', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(57, '9', '1539255506', '2343', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(58, '9', '1539255552', '423', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(59, '9', '1539255706', '324', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(60, '9', '1539255743', '32', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(61, '9', '1539255759', '2344', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(62, '9', '1539255780', '32432', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(63, '9', '1539255814', '4322', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(64, '9', '1539255837', '4324', '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(65, '10', '1539255451', '34543', '2020-04-01 06:34:26', '2020-04-01 06:34:26'),
(66, '10', '1539255467', '5345345', '2020-04-01 06:34:26', '2020-04-01 06:34:26'),
(67, '10', '1539255489', '5345', '2020-04-01 06:34:26', '2020-04-01 06:34:26'),
(68, '10', '1539255506', '3455', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(69, '10', '1539255552', '3543', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(70, '10', '1539255706', '43543', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(71, '10', '1539255759', '53', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(72, '10', '1539256598', '5435', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(73, '10', '1539257024', '435', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(74, '10', '1539257039', '534534', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(75, '10', '1546272381', '5435', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(76, '10', '1585561760', '5434', '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(77, '11', '1539255451', '4534', '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(78, '11', '1539255467', '53453', '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(79, '11', '1539255489', '43534', '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(80, '11', '1539255506', '35434', '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(81, '11', '1539255552', '54354', '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(82, '11', '1539255706', '5433', '2020-04-01 09:58:08', '2020-04-01 09:58:08'),
(83, '11', '1539255743', '4355', '2020-04-01 09:58:08', '2020-04-01 09:58:08'),
(84, '11', '1539255759', '53454', '2020-04-01 09:58:08', '2020-04-01 09:58:08'),
(85, '12', '1539255451', '787', '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(86, '12', '1539255467', '78', '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(87, '12', '1539255489', '867', '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(88, '12', '1539255506', '867', '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(89, '12', '1539255552', '67867', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(90, '12', '1539255706', '8678', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(91, '12', '1539255743', '67867', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(92, '12', '1539255759', '8678', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(93, '12', '1539255780', '768', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(94, '12', '1539255814', '6788', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(95, '12', '1539255837', '86787', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(96, '12', '1539256598', '678767', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(97, '12', '1539257024', '868', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(98, '12', '1539257039', '86', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(99, '12', '1539257056', '678', '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(100, '13', '1539255451', '6767', '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(101, '13', '1539255467', '765756', '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(102, '13', '1539255489', '7657', '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(103, '13', '1539255506', '57657', '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(104, '13', '1539255552', '765', '2020-04-02 04:39:56', '2020-04-02 04:39:56'),
(105, '13', '1539255706', '65765', '2020-04-02 04:39:56', '2020-04-02 04:39:56'),
(106, '13', '1539255743', '7655', '2020-04-02 04:39:56', '2020-04-02 04:39:56'),
(107, '13', '1539255759', '6576', '2020-04-02 04:39:56', '2020-04-02 04:39:56');

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
(1539255451, 'Admission Form', '', '', 'Cash', '105', '10', '2018-10-11 04:57:31', '2018-10-11 04:57:31'),
(1539255467, 'Admission Fee', '200', '', 'Cash', '105', '10', '2018-10-11 04:57:47', '2020-03-30 09:49:32'),
(1539255489, 'Re - Admission Fee', '', '', 'Cash', '105', '10', '2018-10-11 04:58:09', '2018-10-11 04:58:09'),
(1539255506, 'Department Transfer Fee', '', '', 'Cash', '105', '10', '2018-10-11 04:58:26', '2018-10-11 04:58:26'),
(1539255552, 'Board Registration Fee ', '100', '', 'Cash', '105', '10', '2018-10-11 04:59:12', '2020-03-30 07:26:32'),
(1539255706, 'Semester Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:01:46', '2018-10-11 05:01:46'),
(1539255743, 'Tuition Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:02:23', '2018-10-11 05:02:23'),
(1539255759, 'Development Fee ', '', '', 'Cash', '105', '10', '2018-10-11 05:02:39', '2018-10-11 05:02:39'),
(1539255780, 'Identity Card Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:03:00', '2018-10-11 05:03:00'),
(1539255814, 'Library & Lab Fee ', '', '', 'Cash', '105', '10', '2018-10-11 05:03:34', '2018-10-11 05:04:24'),
(1539255837, 'Library Card Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:03:57', '2018-10-11 05:04:49'),
(1539256598, 'Library & Lab Security ( Returnable )', '', '', 'Cash', '105', '10', '2018-10-11 05:16:38', '2018-10-11 05:16:38'),
(1539257024, 'Electricity Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:23:44', '2018-10-11 05:23:44'),
(1539257039, 'Garage Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:23:59', '2018-10-11 05:23:59'),
(1539257056, 'Transport Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:24:16', '2018-10-11 05:24:16'),
(1539257118, 'Sports / Milad / Cultural Acti / Others Fee ', '', '', 'Cash', '105', '10', '2018-10-11 05:25:18', '2018-10-11 05:25:18'),
(1539257133, 'Health Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:25:33', '2018-10-11 05:25:33'),
(1539257148, 'Service Charge ', '', '', 'Cash', '105', '10', '2018-10-11 05:25:48', '2018-10-11 05:25:48'),
(1539257171, 'Poor Fund ', '', '', 'Cash', '105', '10', '2018-10-11 05:26:11', '2018-10-11 05:26:11'),
(1539257207, 'Hostel Fee ', '334', '', 'Cash', '105', '10', '2018-10-11 05:26:47', '2020-03-30 07:25:33'),
(1539257228, 'Money Receipts ', '', '', 'Cash', '105', '10', '2018-10-11 05:27:08', '2018-10-11 05:27:08'),
(1539257247, 'Mid Term Examination Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:27:27', '2018-10-11 05:27:27'),
(1539257303, 'Semester Final Examination Fee', '', '', 'Cash', '105', '10', '2018-10-11 05:28:23', '2018-10-11 05:28:23'),
(1539257349, 'Refered Examination Fee ', '', '', 'Cash', '105', '10', '2018-10-11 05:29:09', '2018-10-11 05:29:09'),
(1539257568, 'Late Fine ( Form Fill - up & Others )', '', '', 'Cash', '105', '10', '2018-10-11 05:32:48', '2018-10-11 05:32:48'),
(1539257590, 'Tie , Solider ', '', '', 'Cash', '105', '10', '2018-10-11 05:33:10', '2018-10-11 05:33:10'),
(1539257657, 'Appeared / Mark Sheet / Testimonial Fee ', '', '', 'Cash', '105', '10', '2018-10-11 05:34:17', '2018-10-11 05:34:17'),
(1539257673, 'Previous Due', '', '', 'Cash', '105', '10', '2018-10-11 05:34:33', '2018-10-11 05:34:33'),
(1539257701, 'Miscellaneous', '', '', 'Cash', '105', '10', '2018-10-11 05:35:01', '2018-10-11 05:35:01'),
(1543020853, 'Canteen Fee', '', '', 'Cash', '105', '1', '2018-11-23 18:54:13', '2018-11-23 18:54:13'),
(1546272381, 'Hostel / Dormitory Fee', '10000', '100', 'Cash', '115', '1', '2018-12-31 10:06:21', '2018-12-31 10:06:21'),
(1585561760, 'weqwe', '323', '', 'Check', '102', '1', '2020-03-30 09:49:20', '2020-03-30 09:49:20'),
(1585629835, 'Demo Invoice Component', '1000', '', 'Cash', '101', '1', '2020-03-31 04:43:55', '2020-03-31 04:43:55');

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
-- Table structure for table `live_class`
--

CREATE TABLE `live_class` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `session` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `live_class`
--

INSERT INTO `live_class` (`id`, `topic`, `class_name`, `department`, `start_time`, `end_time`, `duration`, `subject`, `medium`, `session`, `meeting_id`, `start_url`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(26, 'sdsad', 'Second Semester', 'Computer Science & Technology', '2020-03-03 01:03:00', '2020-03-03 01:03:00', '1 Hour', NULL, 'TISI', '2017-2018', NULL, NULL, 0, 48, '2020-03-24 08:13:20', '2020-03-29 05:05:54'),
(27, 'Physic Class', 'Sixth Semester', 'Graphics Technology', '2020-03-09 00:30:00', '2020-03-25 01:00:00', '1 Hour', NULL, 'TISI', '2017-2018', NULL, NULL, 1, 48, '2020-03-24 08:14:20', '2020-03-24 15:04:05'),
(28, 'Physic Class', 'Sixth Semester', 'Graphics Technology', '2020-03-09 00:30:00', '2020-03-25 01:00:00', '1 Hour', NULL, 'TISI', '2017-2018', '336312221', 'https://us04web.zoom.us/s/336312221?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJaRzdLcUdpcVRtYWlfWlZsbXFVamt3IiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6InVzMDQiLCJjbHQiOjAsInN0ayI6Il9sUlBTVnNndHhsc2x5Z1BmeG', 1, 48, '2020-03-24 08:17:00', '2020-03-24 14:39:14'),
(32, 'Test Live Class', 'Sixth Semester', 'Graphics Technology', '2020-03-25 00:00:00', '2020-03-25 01:00:00', '1 Hour', NULL, 'TISI', '2017-2018', '609493490', 'https://us04web.zoom.us/s/609493490?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJaRzdLcUdpcVRtYWlfWlZsbXFVamt3IiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6InVzMDQiLCJjbHQiOjAsInN0ayI6Il9sUlBTVnNndHhsc2x5Z1BmeG', 1, 48, '2020-03-24 17:54:52', '2020-03-24 17:55:00'),
(33, 'Demo Class test', 'Forth Semester', 'Graphics Technology', '2020-03-28 00:30:00', '2020-03-11 01:30:00', '1 Hour', NULL, 'TISI', '2018-2019', '161141717', 'https://us04web.zoom.us/s/161141717?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJ0b3BiM2pOTk1jSDhpSVh0S055UG', 0, 48, '2020-03-28 11:19:05', '2020-03-28 11:19:05'),
(34, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '831978238', 'https://us04web.zoom.us/s/831978238?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJnaG56S0lTeV9GYjB6LVI4MkV4N0', 0, 48, '2020-03-29 06:23:55', '2020-03-29 06:23:55'),
(35, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '255770973', 'https://us04web.zoom.us/s/255770973?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJuZWJGcHBEUFNYVVhXWWYwU21MYU', 0, 48, '2020-03-29 06:24:17', '2020-03-29 06:24:17'),
(36, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '484237527', 'https://us04web.zoom.us/s/484237527?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiI2aVZVWGgyTUVmbUlJYXF6RUxqSz', 0, 48, '2020-03-29 06:24:49', '2020-03-29 06:24:49'),
(37, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '492983323', 'https://us04web.zoom.us/s/492983323?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJmN3VfcnFBS1g2aFZod3FvQWpxdH', 0, 48, '2020-03-29 06:25:41', '2020-03-29 06:25:41'),
(38, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '345796376', 'https://us04web.zoom.us/s/345796376?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJoaUZjWTQ0c09DRDdKRmtaVDRXYW', 0, 48, '2020-03-29 06:26:14', '2020-03-29 06:26:14'),
(39, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '607640553', 'https://us04web.zoom.us/s/607640553?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiIyRG81djZhTzhLMVVLNWNDLS1uZH', 0, 48, '2020-03-29 06:26:48', '2020-03-29 06:26:48'),
(40, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '752723410', 'https://us04web.zoom.us/s/752723410?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJIbDJEYU1ud1NZdnNET1lRTmotSV', 0, 48, '2020-03-29 06:53:40', '2020-03-29 06:53:40'),
(41, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '596134554', 'https://us04web.zoom.us/s/596134554?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJPT1BFWWE4LUdZQXRiUTctd2xVOF', 0, 48, '2020-03-29 06:54:08', '2020-03-29 06:54:08'),
(42, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '232903545', 'https://us04web.zoom.us/s/232903545?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJ0cUJFaGVfMWZBb3pORnFobXU2ck', 0, 48, '2020-03-29 06:55:10', '2020-03-29 06:55:10'),
(43, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '320654558', 'https://us04web.zoom.us/s/320654558?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiI1cGNqdzV6TWc0OUtnbkJGNUxIRk', 0, 48, '2020-03-29 06:58:06', '2020-03-29 06:58:06'),
(44, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '311122505', 'https://us04web.zoom.us/s/311122505?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJXRjRLZmpFZGJndjBObWdjVWVUSn', 0, 48, '2020-03-29 06:59:11', '2020-03-29 06:59:11'),
(45, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '941983515', 'https://us04web.zoom.us/s/941983515?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJRQnhmX1ZOMzFqa3UxZjZSckZFcy', 0, 48, '2020-03-29 07:09:30', '2020-03-29 07:09:30'),
(46, 'asdsad', 'Sixth Semester', 'Graphics Technology', '2020-03-29 02:00:00', '2020-03-29 02:30:00', 'sdsdas', NULL, 'TISI', '2017-2018', '964089914', 'https://us04web.zoom.us/s/964089914?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJHOTV1aVpMc1Yxd2V0eUZPekE3WU', 0, 48, '2020-03-29 07:09:50', '2020-03-29 07:09:50'),
(47, 'sadsa', 'Sixth Semester', 'Graphics Technology', '2020-03-29 03:00:00', '2020-03-29 04:00:00', '1 Hour', NULL, 'TISI', '2017-2018', '127449804', 'https://us04web.zoom.us/s/127449804?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJjUDlYNE1WSU81V0t3akQ4UUlacH', 0, 48, '2020-03-29 09:21:37', '2020-03-29 09:21:37'),
(48, 'sadsa', 'Sixth Semester', 'Graphics Technology', '2020-03-29 03:00:00', '2020-03-29 04:00:00', '1 Hour', NULL, 'TISI', '2017-2018', '371947802', 'https://us04web.zoom.us/s/371947802?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJ3X2F6MElKWUxfMUluR0lXQ1pXek', 0, 48, '2020-03-29 09:21:52', '2020-03-29 09:21:52'),
(49, 'sadsa', 'Sixth Semester', 'Graphics Technology', '2020-04-02 04:00:00', '2020-05-02 04:00:00', '1 Hour', NULL, 'TISI', '2017-2018', '347264883', 'https://us04web.zoom.us/s/347264883?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJmY1k0bFFDUFRYZXJXc0VITzVqdEpBIiwiaXNzIjoid2ViIiwic3R5IjoxLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJ2bDlnakRZMm5hOHN6alBxRE5oWm', 0, 48, '2020-03-29 09:26:36', '2020-03-29 09:26:36'),
(50, 'Zoom Version Test Class', 'Sixth Semester', 'Graphics Technology', '2020-04-07 21:00:00', '2020-04-07 22:00:00', '1 Hour', NULL, 'TISI', '2017-2018', '403675554', 'https://us04web.zoom.us/s/403675554?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJaRzdLcUdpcVRtYWlfWlZsbXFVamt3IiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6InVzMDQiLCJjbHQiOjAsInN0ayI6Il9sUlBTVnNndHhsc2x5Z1BmeG', 0, 48, '2020-04-07 14:54:00', '2020-04-07 14:54:00'),
(51, 'Zoom Version  2', 'Sixth Semester', 'Graphics Technology ', '2020-04-07 21:04:00', '2020-04-07 22:04:00', '1 Hour', NULL, 'TISI', '2017-2018', '680940995', 'https://us04web.zoom.us/s/680940995?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJaRzdLcUdpcVRtYWlfWlZsbXFVamt3IiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6InVzMDQiLCJjbHQiOjAsInN0ayI6Il9sUlBTVnNndHhsc2x5Z1BmeG', 1, 48, '2020-04-07 14:54:39', '2020-04-07 15:33:52'),
(52, 'Physic Class', 'Forth Semester', 'Graphics Technology', '2020-04-08 01:00:00', '2020-04-29 02:30:00', '1 Hours, 30 Minuets', NULL, 'TISI', '2017-2018', '239753512', 'https://us04web.zoom.us/s/239753512?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJaRzdLcUdpcVRtYWlfWlZsbXFVamt3IiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6InVzMDQiLCJjbHQiOjAsInN0ayI6Il9sUlBTVnNndHhsc2x5Z1BmeG', 0, 48, '2020-04-08 09:41:14', '2020-04-08 09:41:14'),
(53, 'Physic Class', 'Forth Semester', 'Graphics Technology', '2020-04-08 01:00:00', '2020-04-29 02:30:00', '1 Hours, 30 Minuets', NULL, 'TISI', '2017-2018', '539951326', 'https://us04web.zoom.us/s/539951326?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJaRzdLcUdpcVRtYWlfWlZsbXFVamt3IiwiaXNzIjoid2ViIiwic3R5IjoxMDAsIndjZCI6InVzMDQiLCJjbHQiOjAsInN0ayI6Il9sUlBTVnNndHhsc2x5Z1BmeG', 0, 48, '2020-04-08 09:41:36', '2020-04-08 09:41:36');

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
  `department_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_department`
--

INSERT INTO `manage_department` (`id`, `department_name`, `department_code`, `class_name`, `medium`, `description`, `created_at`, `updated_at`) VALUES
(31, 'Computer Science & Technology', '85', 'First Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:05:10', '2019-11-28 04:33:20'),
(32, 'Computer Science & Technology', '85', 'Second Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:05:29', '2019-11-28 04:53:10'),
(33, 'Computer Science & Technology', '85', 'Third Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:05:43', '2019-11-28 04:50:21'),
(34, 'Computer Science & Technology', '85', 'Forth Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:05:50', '2019-11-28 04:52:31'),
(35, 'Computer Science & Technology', '85', 'Fifth Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:05:57', '2019-11-28 04:51:58'),
(36, 'Computer Science & Technology', '85', 'Sixth Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:06:03', '2019-11-28 04:54:14'),
(37, 'Computer Science & Technology', '85', 'Seventh Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:06:11', '2019-11-28 04:53:44'),
(38, 'Computer Science & Technology', '85', 'Eighth Semester', 'TISI', 'Computer Science & Technology', '2018-10-10 06:06:21', '2019-11-28 04:51:09'),
(39, 'Graphics Technology ', '96', 'First Semester', 'TISI', 'Graphics Technology ', '2018-10-10 06:06:40', '2019-11-28 04:34:12'),
(40, 'Graphics Technology ', '96', 'Second Semester', 'TISI', 'Graphics Technology ', '2018-10-10 06:06:47', '2019-11-28 04:53:27'),
(41, 'Graphics Technology ', '96', 'Third Semester', 'TISI', 'Graphics Technology ', '2018-10-10 06:06:54', '2019-11-28 04:50:47'),
(42, 'Graphics Technology ', '96', 'Forth Semester', 'TISI', 'Graphics Technology', '2018-10-10 06:07:02', '2019-11-28 04:52:48'),
(43, 'Graphics Technology ', '96', 'Fifth Semester', 'TISI', 'Graphics Technology ', '2018-10-10 06:07:15', '2019-11-28 04:52:13'),
(44, 'Graphics Technology ', '96', 'Sixth Semester', 'TISI', 'Graphics Technology ', '2018-10-10 06:07:22', '2019-11-28 04:54:28'),
(45, 'Graphics Technology ', '96', 'Seventh Semester', 'TISI', 'Graphics Technology ', '2018-10-10 06:07:30', '2019-11-28 04:53:59'),
(46, 'Graphics Technology ', '96', 'Eighth Semester', 'TISI', 'Graphics Technology ', '2018-10-10 06:07:48', '2019-11-28 04:51:41'),
(47, 'Glass Technology', '77', 'First Semester', 'TISI', 'Glass and Ceramic Technology', '2018-12-02 07:16:06', '2019-11-28 04:49:03'),
(48, 'Ceramic Technology', '76', 'First Semester', 'TISI', 'Ceramic Technology', '2018-12-02 07:16:39', '2019-11-28 04:49:21'),
(49, 'Civil Technology', '64', 'First Semester', 'TISI', 'Civil Technology', '2018-12-02 07:16:59', '2019-11-28 04:49:37'),
(50, 'Electrical Technology', '67', 'First Semester', 'TISI', 'Electrical Technology', '2018-12-02 07:18:21', '2019-11-28 04:49:55'),
(51, 'Glass Technology	', '77', 'Second Semester', 'TISI', 'Glass Technology	', '2019-11-28 04:56:22', '2019-11-28 04:56:22'),
(52, 'Ceramic Technology', '76', 'Second Semester', 'TISI', 'Ceramic Technology', '2019-11-28 04:56:43', '2019-11-28 04:56:43'),
(53, 'Civil Technology', '64', 'Second Semester', 'TISI', 'Civil Technology', '2019-11-28 04:57:00', '2019-11-28 04:57:00'),
(54, 'Electrical Technology', '67', 'Second Semester', 'TISI', 'Electrical Technology', '2019-11-28 04:57:14', '2019-11-28 04:57:14'),
(55, 'Glass Technology', '77', 'Third Semester', 'TISI', 'Glass Technology', '2019-11-28 04:57:52', '2019-11-28 04:57:52'),
(56, 'Ceramic Technology', '76', 'Third Semester', 'TISI', 'Ceramic Technology', '2019-11-28 04:58:12', '2019-11-28 04:58:12'),
(57, 'Civil Technology', '64', 'Third Semester', 'TISI', 'Civil Technology', '2019-11-28 04:58:29', '2019-11-28 04:58:29'),
(58, 'Electrical Technology', '67', 'Third Semester', 'TISI', 'Electrical Technology', '2019-11-28 04:58:47', '2019-11-28 04:58:47'),
(59, 'Glass Technology', '77', 'Forth Semester', 'TISI', 'Glass Technology', '2019-11-28 04:59:27', '2019-11-28 04:59:27'),
(60, 'Ceramic Technology', '76', 'Forth Semester', 'TISI', 'Ceramic Technology', '2019-11-28 04:59:44', '2019-11-28 04:59:44'),
(61, 'Civil Technology', '64', 'Forth Semester', 'TISI', 'Civil Technology', '2019-11-28 04:59:58', '2019-11-28 04:59:58'),
(62, 'Electrical Technology', '67', 'Forth Semester', 'TISI', 'Electrical Technology', '2019-11-28 05:00:14', '2019-11-28 05:00:14'),
(63, 'Glass Technology', '77', 'Fifth Semester', 'TISI', 'Glass Technology', '2019-11-28 05:01:00', '2019-11-28 05:01:00'),
(64, 'Ceramic Technology', '76', 'Fifth Semester', 'TISI', 'Ceramic Technology', '2019-11-28 05:01:16', '2019-11-28 05:01:16'),
(65, 'Civil Technology', '64', 'Fifth Semester', 'TISI', 'Civil Technology', '2019-11-28 05:01:34', '2019-11-28 05:01:34'),
(66, 'Electrical Technology', '67', 'Fifth Semester', 'TISI', 'Electrical Technology', '2019-11-28 05:01:47', '2019-11-28 05:01:47'),
(67, 'Glass Technology', '77', 'Sixth Semester', 'TISI', 'Glass Technology', '2019-11-28 05:02:31', '2019-11-28 05:02:31'),
(68, 'Ceramic Technology', '76', 'Sixth Semester', 'TISI', 'Ceramic Technology', '2019-11-28 05:02:55', '2019-11-28 05:02:55'),
(69, 'Civil Technology', '64', 'Sixth Semester', 'TISI', 'Civil Technology', '2019-11-28 05:03:09', '2019-11-28 05:03:09'),
(70, 'Electrical Technology', '67', 'Sixth Semester', 'TISI', 'Electrical Technology', '2019-11-28 05:03:27', '2019-11-28 05:03:27'),
(71, 'Glass Technology', '77', 'Seventh Semester', 'TISI', 'Glass Technology', '2019-11-28 05:04:09', '2019-11-28 05:04:09'),
(72, 'Ceramic Technology', '76', 'Seventh Semester', 'TISI', 'Ceramic Technology', '2019-11-28 05:04:25', '2019-11-28 05:04:25'),
(73, 'Civil Technology', '64', 'Seventh Semester', 'TISI', 'Civil Technology', '2019-11-28 05:04:40', '2019-11-28 05:04:40'),
(74, 'Electrical Technology', '67', 'Seventh Semester', 'TISI', 'Electrical Technology', '2019-11-28 05:04:55', '2019-11-28 05:04:55'),
(75, 'Glass Technology', '77', 'Eighth Semester', 'TISI', 'Glass Technology', '2019-11-28 05:05:38', '2019-11-28 05:05:38'),
(76, 'Ceramic Technology', '76', 'Eighth Semester', 'TISI', 'Ceramic Technology', '2019-11-28 05:06:01', '2019-11-28 05:06:01'),
(77, 'Civil Technology', '64', 'Eighth Semester', 'TISI', 'Civil Technology', '2019-11-28 05:06:18', '2019-11-28 05:06:18'),
(78, 'Electrical Technology', '67', 'Eighth Semester', 'TISI', 'Electrical Technology', '2019-11-28 05:06:35', '2019-11-28 05:06:35');

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
  `total_seat_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_dormitory`
--

INSERT INTO `manage_dormitory` (`manage_dormitory_id`, `dormitory_title`, `dormitory_author`, `dormitory_no`, `dormitory_name`, `dormitory_floor`, `total_room_number`, `total_seat_number`, `dormitory_location`, `description`, `created_at`, `updated_at`) VALUES
(1575269449, 'Bijoy Hostel TISI', 'Mezbah Ahmmed', '1', 'Bijoy Hostel TISI', '1', '4', '21', 'TISI', 'TISI', '2019-12-02 00:50:49', '2020-03-14 00:43:53'),
(1575269491, 'Bonolota TISI Dormitory', 'Mezbah Ahmmed', '2', 'Bonolota TISI Dormitory', '1', '3', '18', 'TISI ', 'TISI ', '2019-12-02 00:51:31', '2019-12-05 02:20:24'),
(1575534327, 'Sadhen Hostel TISI', 'Mezbah Ahmmed', '3', 'Sadhen', '1', '7', '45', 'TISI', 'TISI', '2019-12-05 02:25:27', '2019-12-05 02:25:27');

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

-- --------------------------------------------------------

--
-- Table structure for table `manage_mark_component`
--

CREATE TABLE `manage_mark_component` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `student_roll` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `component_id` varchar(255) NOT NULL,
  `component_name` varchar(255) NOT NULL,
  `component_mark` varchar(255) NOT NULL,
  `component_grade` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_mark_component`
--

INSERT INTO `manage_mark_component` (`id`, `exam_name`, `student_roll`, `subject_name`, `component_id`, `component_name`, `component_mark`, `component_grade`, `created_at`, `updated_at`) VALUES
(455, 'Midterm Exam', '2010242', '1583727057', '1574849085', 'TC', '30', 'Pass', '2020-03-21 07:10:02', '2020-03-21 01:10:02'),
(456, 'Midterm Exam', '2010242', '1583727057', '1574849108', 'TF', '20', 'Pass', '2020-03-21 07:10:53', '2020-03-21 01:10:53'),
(457, 'Midterm Exam', '2010242', '1583727057', '1574849126', 'PC', '25', 'Pass', '2020-03-21 07:10:07', '2020-03-21 01:10:07'),
(458, 'Midterm Exam', '2010242', '1583727057', '1574849148', 'PF', '22', 'Pass', '2020-03-21 07:11:42', '2020-03-21 01:11:42'),
(459, 'Midterm Exam', '159921', '1583906966', '1574849126', 'PC', '4', 'Fail', '2020-04-02 06:05:10', '2020-04-02 06:05:10'),
(460, 'Midterm Exam', '2010242', '1583726631', '1574849126', 'PC', '45', 'Pass', '2020-04-02 06:07:55', '2020-04-02 06:07:55'),
(461, 'Midterm Exam', '2010242', '1583726631', '1574849148', 'PF', '45', 'Pass', '2020-04-02 06:07:56', '2020-04-02 06:07:56'),
(462, 'Midterm Exam', '2010244', '1583726631', '1574849126', 'PC', '45', 'Pass', '2020-04-02 06:07:59', '2020-04-02 06:07:59'),
(463, 'Midterm Exam', '2010243', '1583726631', '1574849126', 'PC', '45', 'Pass', '2020-04-02 06:07:57', '2020-04-02 06:07:57'),
(464, 'Midterm Exam', '2010243', '1583726631', '1574849148', 'PF', '4', 'Fail', '2020-04-02 06:07:58', '2020-04-02 06:07:58'),
(465, 'Midterm Exam', '2010244', '1583726631', '1574849148', 'PF', '45', 'Pass', '2020-04-02 06:08:00', '2020-04-02 06:08:00'),
(466, 'Midterm Exam', '2010245', '1583726631', '1574849126', 'PC', '45', 'Pass', '2020-04-02 06:08:14', '2020-04-02 06:08:14'),
(467, 'Midterm Exam', '2010245', '1583726631', '1574849148', 'PF', '45', 'Pass', '2020-04-02 06:08:17', '2020-04-02 06:08:17'),
(468, 'Midterm Exam', '2010246', '1583726631', '1574849126', 'PC', '43', 'Pass', '2020-04-02 06:08:19', '2020-04-02 06:08:19'),
(469, 'Midterm Exam', '2010246', '1583726631', '1574849148', 'PF', '45', 'Pass', '2020-04-02 06:08:20', '2020-04-02 06:08:20'),
(470, 'Midterm Exam', '2010247', '1583726631', '1574849126', 'PC', '34', 'Pass', '2020-04-02 06:08:21', '2020-04-02 06:08:21'),
(471, 'Midterm Exam', '2010247', '1583726631', '1574849148', 'PF', '43', 'Pass', '2020-04-02 06:08:23', '2020-04-02 06:08:23'),
(472, 'Midterm Exam', '20241', '1583726631', '1574849126', 'PC', '34', 'Pass', '2020-04-02 06:08:24', '2020-04-02 06:08:24'),
(473, 'Midterm Exam', '20241', '1583726631', '1574849148', 'PF', '23', 'Pass', '2020-04-02 06:08:25', '2020-04-02 06:08:25'),
(474, 'Midterm Exam', '8517104', '1583726631', '1574849126', 'PC', '23', 'Pass', '2020-04-02 06:08:27', '2020-04-02 06:08:27'),
(475, 'Midterm Exam', '8517104', '1583726631', '1574849148', 'PF', '34', 'Pass', '2020-04-02 06:08:29', '2020-04-02 06:08:29'),
(476, 'Midterm Exam', '8517109', '1583726631', '1574849126', 'PC', '23', 'Pass', '2020-04-02 06:08:30', '2020-04-02 06:08:30'),
(477, 'Midterm Exam', '8517109', '1583726631', '1574849148', 'PF', '34', 'Pass', '2020-04-02 06:08:31', '2020-04-02 06:08:31'),
(478, 'Midterm Exam', '8517111', '1583726631', '1574849126', 'PC', '23', 'Pass', '2020-04-02 06:08:33', '2020-04-02 06:08:33'),
(479, 'Midterm Exam', '8517111', '1583726631', '1574849148', 'PF', '34', 'Pass', '2020-04-02 06:08:34', '2020-04-02 06:08:34');

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
(1539174343, 'Physical Education & Life Skill Development', 'First Semester', 'TISI', 'Tech', 'Md Sohel Rana', 'Md Abu Raihan', '2018-10-10 06:40:35', '2018-11-23 19:56:20', '65812', '150', '3', 'Computer Science & Technology', 'General'),
(1539175237, 'Social Science', 'First Semester', 'TISI', 'Non-Tech', 'Rabya Khathun', 'Md Imran', '2018-10-10 06:41:39', '2018-11-01 08:39:13', '65811', '150', '3', 'Computer Science & Technology', 'General'),
(1539178157, 'Mathematics-1', 'First Semester', 'TISI', 'Non-Tech', 'Md. Imran Ali', 'Md Imran', '2018-10-10 07:29:52', '2018-11-01 08:40:14', '65911', '200', '4', 'Computer Science & Technology', 'General'),
(1539271906, 'Electrical Engineering Fundamentals', 'First Semester', 'TISI', 'Tech', 'Jakiya Jafrin', 'ForSubject', '2018-10-11 09:33:11', '2019-11-28 04:25:32', '66712', '200', '4', 'Computer Science & Technology', 'General'),
(1539272019, 'Engineering Drawing', 'First Semester', 'TISI', 'Tech', 'Jakiya Jafrin', 'Jakiya Jafrin', '2018-10-11 09:34:39', '2018-11-01 06:20:43', '61011', '100', '2', 'Graphics Technology ', 'General'),
(1539272579, 'Chemistry', 'First Semester', 'TISI', 'Non-Tech', 'A.T.M Tazmilur Rahman', 'Md Imran', '2018-10-11 09:44:29', '2018-11-01 08:44:00', '65913', '200', '4', 'Computer Science & Technology', 'General'),
(1539272726, 'Computer Application', 'First Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Jakiya Jafrin', '2018-10-11 09:49:08', '2018-11-01 06:21:44', '66611', '100', '2', 'Computer Science & Technology', 'General'),
(1539272948, 'Basic Graphics Design', 'First Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'Jakiya Jafrin', '2018-10-11 09:50:54', '2018-11-01 06:22:14', '69611', '150', '3', 'Graphics Technology ', 'General'),
(1539273064, 'Programming Essentials', 'Third Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Md Jubayer Hossain', '2018-10-11 09:53:10', '2018-11-06 05:43:46', '66631', '150', '3', 'Computer Science & Technology', 'General'),
(1539273191, 'Mathematics ‐III', 'Third Semester', 'TISI', 'Non-Tech', 'Md. Imran Ali', 'Jakiya Jafrin', '2018-10-11 09:54:23', '2018-11-07 03:48:22', '65931', '200', '4', 'Computer Science & Technology', 'General'),
(1539273535, 'Physics‐2', 'Third Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Md Jubayer Hossain', '2018-10-11 09:59:31', '2019-11-28 01:01:55', '65922', '200', '4', 'Graphics Technology ', 'General'),
(1539273572, 'Communicative English', 'Third Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Jakiya Jafrin', '2018-10-11 10:00:21', '2018-11-07 04:03:00', '65722', '100', '2', 'Computer Science & Technology', 'General'),
(1539273686, 'Graphics Design‐II', 'Third Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'Jakiya Jafrin', '2018-10-11 10:03:18', '2018-11-07 03:54:11', '66633', '100', '2', 'Computer Science & Technology', 'General'),
(1539273799, 'Digital Electronics', 'Third Semester', 'TISI', 'Tech', 'Shaima Hanif', 'ForSubject', '2018-10-11 10:04:20', '2019-11-28 01:07:32', '66834', '200', '4', 'Computer Science & Technology', 'General'),
(1539273860, 'Web Design', 'Third Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'Jakiya Jafrin', '2018-10-11 10:05:09', '2018-11-07 03:58:30', '66632', '100', '2', 'Computer Science & Technology', 'General'),
(1539274000, 'Computer Lab. Practice (IT support-I)', 'First Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'Jakiya Jafrin', '2018-10-11 10:07:27', '2018-11-07 03:42:50', '66622', '100', '2', 'Graphics Technology ', 'General'),
(1541083468, 'Chemistry', 'First Semester', 'TISI', 'Non-Tech', 'A.T.M Tazmilur Rahman', 'Md Imran', '2018-11-01 08:45:24', '2018-11-01 08:45:24', '65913', '200', '4', 'Graphics Technology ', 'General'),
(1541085276, 'English', 'Second Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Md Abu Raihan', '2018-11-01 09:18:09', '2019-11-26 23:06:13', '65712', '100', '2', 'Computer Science & Technology', 'General'),
(1541085648, 'Physics-1', 'Second Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Jakiya Jafrin', '2018-11-01 09:23:16', '2020-03-08 21:33:13', '65912', '200', '4', 'Computer Science & Technology', 'General'),
(1541583185, ' 	Physical Education & Life Skill Development', 'First Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Jakiya Jafrin', '2018-11-07 03:36:41', '2018-11-07 03:36:41', '65812', '50', '1', 'Graphics Technology ', 'General'),
(1541583401, 'Social Science', 'First Semester', 'TISI', 'Non-Tech', 'Rabya Khathun', 'Jakiya Jafrin', '2018-11-07 03:38:49', '2018-11-07 03:38:49', '65811', '150', '3', 'Graphics Technology ', 'General'),
(1541583926, 'Mathematics ‐III', 'Third Semester', 'TISI', 'Non-Tech', 'Md. Imran Ali', 'Jakiya Jafrin', '2018-11-07 03:47:55', '2018-11-07 03:47:55', '65931', '200', '4', 'Graphics Technology ', 'General'),
(1541584734, 'Physics‐2', 'Third Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Jakiya Jafrin', '2018-11-07 04:02:26', '2018-11-07 04:02:26', ' 	65922', '200', '4', 'Graphics Technology ', 'General'),
(1541584998, 'Communicative English', 'Third Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Jakiya Jafrin', '2018-11-07 04:04:09', '2018-11-07 04:04:09', '65722', '100', '2', 'Graphics Technology ', 'General'),
(1574849157, 'Image Preparation 1', 'Third Semester', 'TISI', 'Tech', 'towfiq hasan', 'ForSubject', '2019-11-27 04:09:49', '2019-11-27 04:09:49', '69531', '150', '4', 'Graphics Technology ', 'General'),
(1574850160, 'Graphics Materials', 'Third Semester', 'TISI', 'Tech', 'towfiq hasan', 'Md Abu Raihan', '2019-11-27 04:29:01', '2019-11-27 04:29:01', '69533', '150', '4', 'Graphics Technology ', 'General'),
(1574850559, 'Fabric Design', 'Fifth Semester', 'TISI', 'Tech', 'towfiq hasan', 'Md Abu Raihan', '2019-11-27 04:32:47', '2019-11-27 04:32:47', '69652', '150', '4', 'Graphics Technology ', 'General'),
(1574850767, 'Video & Sound Editing', 'Fifth Semester', 'TISI', 'Tech', 'towfiq hasan', 'Md Abu Raihan', '2019-11-27 04:54:27', '2019-11-27 04:54:27', '69656', '150', '4', 'Graphics Technology ', 'General'),
(1574852092, 'Web Design', 'Third Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'ForSubject', '2019-11-27 04:57:16', '2019-11-27 04:57:16', '66632', '100', '2', 'Computer Science & Technology', 'General'),
(1574853030, 'Business', 'Fifth Semester', 'TISI', 'Non-Tech', 'Md. Masud Rana', 'Md Abu Raihan', '2019-11-27 05:11:22', '2019-11-27 05:11:22', '015', '150', '5', 'Computer Science & Technology', 'General'),
(1574916218, 'Microprocessor & interfacing', 'Fifth Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'ForSubject', '2019-11-27 22:45:15', '2019-11-27 22:45:15', '66662', '150', '4', 'Computer Science & Technology', 'General'),
(1574917750, 'Data Communication System', 'Fifth Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Md Jubayer Hossain', '2019-11-27 23:12:16', '2019-11-27 23:12:16', '66644', '200', '4', 'Computer Science & Technology', 'General'),
(1574918218, 'Mathematics-1', 'First Semester', 'TISI', 'Non-Tech', 'Md.Altab Hossain', 'ForSubject', '2019-11-27 23:18:45', '2019-11-27 23:18:45', '65911', '200', '3', 'Ceramic Technology', 'General'),
(1574918326, 'Mathematics-1', 'First Semester', 'TISI', 'Non-Tech', 'Md.Altab Hossain', 'ForSubject', '2019-11-27 23:20:07', '2019-11-27 23:20:07', '65911', '200', '3', 'Civil Technology', 'General'),
(1574918407, 'Mathematics-1', 'First Semester', 'TISI', 'Non-Tech', 'Md.Altab Hossain', 'ForSubject', '2019-11-27 23:21:13', '2019-11-27 23:21:13', '65911', '200', '3', 'Electrical Technology', 'General'),
(1574918522, 'Mathematics-3', 'Third Semester', 'TISI', 'Non-Tech', 'Md.Altab Hossain', 'ForSubject', '2019-11-27 23:23:22', '2019-11-27 23:23:22', '65931', '200', '3', 'Computer Science & Technology', 'General'),
(1574918602, 'Mathematics-3', 'Third Semester', 'TISI', 'Non-Tech', 'Md.Altab Hossain', 'ForSubject', '2019-11-27 23:24:11', '2019-11-27 23:24:11', '65931', '200', '3', 'Graphics Technology ', 'General'),
(1574924042, 'Physics-1', 'First Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Md Jubayer Hossain', '2019-11-28 00:57:50', '2019-11-28 00:57:50', '65912', '200', '4', 'Civil Technology', 'General'),
(1574924211, 'Basic Electronics', 'First Semester', 'TISI', 'Tech', 'Shaima Hanif', 'ForSubject', '2019-11-28 01:02:57', '2019-11-28 01:02:57', '66811', '150', '3', 'Electrical Technology', 'General'),
(1574924578, 'Basic Electricity', 'First Semester', 'TISI', 'Tech', 'Shaima Hanif', 'ForSubject', '2019-11-28 01:04:22', '2019-11-28 01:04:22', '66711', '200', '4', 'Electrical Technology', 'General'),
(1574924621, 'Programming in Java', 'Fifth Semester', 'TISI', 'Tech', 'Ali Azom', 'ForSubject', '2019-11-28 01:25:16', '2019-11-28 01:25:16', '66651', '150', '3', 'Computer Science & Technology', 'General'),
(1574925916, 'Content Management System', 'Fifth Semester', 'TISI', 'Tech', 'Ali Azom', 'ForSubject', '2019-11-28 01:27:44', '2019-11-28 01:27:44', '68552', '50', '1', 'Computer Science & Technology', 'General'),
(1574926064, 'Database Management System', 'Fifth Semester', 'TISI', 'Tech', 'Ali Azom', 'ForSubject', '2019-11-28 01:30:23', '2019-11-28 01:30:23', '68551', '150', '3', 'Computer Science & Technology', 'General'),
(1574928199, 'Chemistry', 'First Semester', 'TISI', 'Non-Tech', 'A.T.M Tazmilur Rahman', 'ForSubject', '2019-11-28 02:05:19', '2019-11-28 02:05:19', '65913', '200', '4', 'Graphics Technology ', 'General'),
(1574928333, 'Chemistry', 'First Semester', 'TISI', 'Non-Tech', 'A.T.M Tazmilur Rahman', 'ForSubject', '2019-11-28 02:06:49', '2019-11-28 02:06:49', '65913', '200', '4', 'Ceramic Technology', 'General'),
(1574928419, 'Chemistry', 'First Semester', 'TISI', 'Non-Tech', 'A.T.M Tazmilur Rahman', 'ForSubject', '2019-11-28 02:09:04', '2019-11-28 02:09:04', '65913', '200', '4', 'Electrical Technology', 'General'),
(1574930249, 'Database Aplication', 'Third Semester', 'TISI', 'Tech', 'Ali Azom', 'ForSubject', '2019-11-28 02:39:03', '2019-11-28 02:39:03', '66621', '100', '2', 'Graphics Technology ', 'General'),
(1574936812, 'Engineering Drawing', 'First Semester', 'TISI', 'Tech', 'Engr Zakia Sultana', 'ForSubject', '2019-11-28 04:28:39', '2019-11-28 04:28:39', '61011', '100', '2', 'Civil Technology', 'General'),
(1574936919, 'Engineering Drawing', 'First Semester', 'TISI', 'Tech', 'Engr Zakia Sultana', 'ForSubject', '2019-11-28 04:29:44', '2019-11-28 04:29:44', '61011', '100', '2', 'Electrical Technology', 'General'),
(1574937205, 'Engineering Drawing', 'First Semester', 'TISI', 'Tech', 'Engr Zakia Sultana', 'ForSubject', '2019-11-28 04:34:16', '2019-11-28 04:34:16', '61011', '100', '2', 'Ceramic Technology', 'General'),
(1574937256, 'Basic Graphics Design', 'First Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'ForSubject', '2019-11-28 04:38:45', '2019-11-28 04:38:45', '69611', '150', '4', 'Graphics Technology ', 'General'),
(1574938153, 'Computer Graphics Design-1', 'Fifth Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'ForSubject', '2019-11-28 04:51:09', '2019-11-28 04:51:09', '69655', '150', '4', 'Graphics Technology ', 'General'),
(1574938269, 'Packaging Design-1', 'Fifth Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'ForSubject', '2019-11-28 04:53:37', '2019-11-28 04:53:37', '69654', '100', '4', 'Graphics Technology ', 'General'),
(1574938447, 'Workshop Practice', 'First Semester', 'TISI', 'Tech', 'Mizanur Rahman', 'ForSubject', '2019-11-28 04:55:25', '2019-11-28 04:55:25', '67012', '50', '2', 'Civil Technology', 'General'),
(1574938526, 'Engineering Drawing', 'First Semester', 'TISI', 'Tech', 'Mizanur Rahman', 'ForSubject', '2019-11-28 04:56:42', '2019-11-28 04:56:42', '61011', '100', '2', 'Graphics Technology ', 'General'),
(1574938653, 'Bangla', 'First Semester', 'TISI', 'Non-Tech', 'Md Maznu Miah', 'ForSubject', '2019-11-28 04:59:05', '2019-11-28 04:59:05', '65711', '200', '3', 'Civil Technology', 'General'),
(1574938906, 'Electrical Engineering Fundamentals', 'First Semester', 'TISI', 'Tech', 'Md. Touhidul Islam', 'ForSubject', '2019-11-28 05:03:20', '2019-11-28 05:03:20', '66712', '200', '4', 'Computer Science & Technology', 'General'),
(1574939001, 'Electrical Engineering Fundamentals', 'First Semester', 'TISI', 'Tech', 'Md. Touhidul Islam', 'ForSubject', '2019-11-28 05:04:39', '2019-11-28 05:04:39', '66712', '200', '4', 'Civil Technology', 'General'),
(1574939080, 'Electrical Engineering Materials', 'First Semester', 'TISI', 'Tech', 'Md. Touhidul Islam', 'ForSubject', '2019-11-28 05:06:12', '2019-11-28 05:06:12', '66713', '100', '2', 'Electrical Technology', 'General'),
(1574939191, 'Basic Design and Drawing', 'Third Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'ForSubject', '2019-11-28 05:07:49', '2019-11-28 05:07:49', '69532', '100', '4', 'Graphics Technology ', 'General'),
(1574939278, 'Image Preparation-2', 'Forth Semester', 'TISI', 'Tech', 'Towfiq Hasan', 'Jakiya Jafrin', '2019-11-28 05:08:55', '2020-03-10 23:20:06', '69641', '150', '3', 'Graphics Technology ', 'General'),
(1574939366, 'Graphics Design-2', 'Third Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'ForSubject', '2019-11-28 05:10:26', '2019-11-28 05:10:26', '66633', '100', '2', 'Computer Science & Technology', 'General'),
(1574939559, 'Mathematics-1', 'First Semester', 'TISI', 'Non-Tech', 'ANKUR KUMER DEY', 'ForSubject', '2019-11-28 05:14:14', '2019-11-28 05:14:14', '65911', '200', '3', 'Computer Science & Technology', 'General'),
(1574939654, 'Mathematics-1', 'First Semester', 'TISI', 'Non-Tech', 'ANKUR KUMER DEY', 'ForSubject', '2019-11-28 05:15:10', '2019-11-28 05:15:10', '65911', '200', '3', 'Graphics Technology ', 'General'),
(1574939767, 'Accounting Theory & Practice', 'Fifth Semester', 'TISI', 'Non-Tech', 'Md. Rezaul Haque', 'ForSubject', '2019-11-28 05:17:26', '2019-11-28 05:17:26', '65851', '150', '3', 'Computer Science & Technology', 'General'),
(1574939846, 'Accounting Theory & Practice', 'Fifth Semester', 'TISI', 'Non-Tech', 'Md. Rezaul Haque', 'ForSubject', '2019-11-28 05:18:33', '2019-11-28 05:18:33', '65851', '150', '3', 'Graphics Technology ', 'General'),
(1575193071, 'Basic Design & Drawing', 'Third Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Md. Arif Ahmed', '2019-12-01 03:42:58', '2019-12-01 03:42:58', '69532', '100', '4', 'Graphics Technology ', 'General'),
(1575193445, 'Advertising Design', 'Fifth Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Md. Arif Ahmed', '2019-12-01 03:45:40', '2019-12-01 03:45:40', '69651', '100', '4', 'Graphics Technology ', 'General'),
(1575193549, 'Design & Editing', 'Fifth Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Md. Arif Ahmed', '2019-12-01 03:47:15', '2019-12-01 03:47:15', '69653', '200', '4', 'Graphics Technology ', 'General'),
(1575193651, 'Graphics Design‐II', 'Third Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Md. Arif Ahmed', '2019-12-01 03:50:05', '2019-12-01 03:50:05', '66633', '100', '2', 'Computer Science & Technology', 'General'),
(1575195865, 'English', 'First Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'ForSubject', '2019-12-01 04:26:34', '2019-12-01 04:26:34', '65711', '100', '2', 'Civil Technology', 'General'),
(1575196023, 'Communicative English', 'Third Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'ForSubject', '2019-12-01 04:28:40', '2019-12-01 04:28:40', '65722', '100', '2', 'Computer Science & Technology', 'General'),
(1575196120, 'Communicative English', 'Third Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'ForSubject', '2019-12-01 04:29:56', '2019-12-01 04:29:56', '65722', '100', '2', 'Graphics Technology ', 'General'),
(1575267738, 'Ceramic Engineering Materials-1', 'First Semester', 'TISI', 'Tech', 'Jakiya Jafrin', 'Md. Masud Rana', '2019-12-02 00:24:39', '2019-12-02 00:24:39', '67611', '150', '4', 'Ceramic Technology', 'General'),
(1575281215, 'Environmental Studies', 'Fifth Semester', 'TISI', 'Non-Tech', 'Jakiya Jafrin', 'Md. Masud Rana', '2019-12-02 04:09:42', '2019-12-02 04:09:42', '69054', '100', '2', 'Computer Science & Technology', 'General'),
(1583724817, 'Bangla', 'Second Semester', 'TISI', 'Non-Tech', 'Md Maznu Miah', 'Jakiya Jafrin', '2020-03-08 21:36:39', '2020-03-08 21:36:39', '65711', '200', '4', 'Computer Science & Technology', 'General'),
(1583725001, 'Math-2', 'Second Semester', 'TISI', 'Non-Tech', 'ANKUR KUMER DEY', 'Jakiya Jafrin', '2020-03-08 21:38:39', '2020-03-08 21:45:31', '65921', '200', '4', 'Computer Science & Technology', 'General'),
(1583725120, 'Graphic Design-1', 'Second Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'Jakiya Jafrin', '2020-03-08 21:40:29', '2020-03-08 21:40:29', '66623', '100', '2', 'Computer Science & Technology', 'General'),
(1583725231, 'Analog Electronics', 'Second Semester', 'TISI', 'Tech', 'Md. Touhidul Islam', 'Jakiya Jafrin', '2020-03-08 21:42:12', '2020-03-08 21:42:12', '66823', '200', '4', 'Computer Science & Technology', 'General'),
(1583725333, 'Database Application', 'Second Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'Jakiya Jafrin', '2020-03-08 21:43:28', '2020-03-08 21:43:28', '66621', '100', '2', 'Computer Science & Technology', 'General'),
(1583726631, 'MVC Framework Development', 'Sixth Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'Md Abu Raihan', '2020-03-08 22:09:30', '2020-03-16 03:45:41', '68561', '100', '2', 'Computer Science & Technology', 'General'),
(1583726971, 'Software Testing', 'Sixth Semester', 'TISI', 'Tech', 'Ali Azom', 'Md Abu Raihan', '2020-03-08 22:10:56', '2020-03-16 03:53:51', '68562', '50', '1', 'Computer Science & Technology', 'General'),
(1583727057, 'Advanced Database Management System', 'Sixth Semester', 'TISI', 'Tech', 'Ali Azom', 'Md Abu Raihan', '2020-03-08 22:12:41', '2020-03-16 03:58:25', '66678', '150', '3', 'Computer Science & Technology', 'General'),
(1583727163, 'Multimedia & Animation', 'Sixth Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Md Abu Raihan', '2020-03-08 22:14:56', '2020-03-16 04:08:01', '66668', '200', '4', 'Computer Science & Technology', 'General'),
(1583727298, 'Programming in Advanced Java', 'Sixth Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'Md Abu Raihan', '2020-03-08 22:16:21', '2020-03-16 04:13:24', '66669', '150', '3', 'Computer Science & Technology', 'General'),
(1583727382, 'Network Administration & Services', 'Sixth Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Md Abu Raihan', '2020-03-08 22:17:45', '2020-03-16 04:16:36', '66672', '200', '4', 'Computer Science & Technology', 'General'),
(1583727513, 'Industrial Management', 'Sixth Semester', 'TISI', 'Non-Tech', 'Md. Rezaul Haque', 'Md Abu Raihan', '2020-03-08 22:20:04', '2020-03-16 04:18:23', '65852', '100', '2', 'Computer Science & Technology', 'General'),
(1583730675, 'English', 'Second Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Jakiya Jafrin', '2020-03-08 23:14:57', '2020-03-08 23:14:57', '65712', '100', '2', 'Graphics Technology ', 'General'),
(1583730898, 'Math-2', 'Second Semester', 'TISI', 'Non-Tech', 'Md.Altab Hossain', 'Jakiya Jafrin', '2020-03-08 23:17:10', '2020-03-08 23:17:10', '65921', '200', '4', 'Graphics Technology ', 'General'),
(1583731031, 'Physics-1', 'Second Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Jakiya Jafrin', '2020-03-08 23:22:18', '2020-03-08 23:22:18', '65912', '200', '4', 'Graphics Technology ', 'General'),
(1583731340, 'Computer Application', 'Second Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Jakiya Jafrin', '2020-03-08 23:25:11', '2020-03-08 23:25:11', '66611', '100', '2', 'Graphics Technology ', 'General'),
(1583731512, 'Electrical Engineering Fundamental', 'Second Semester', 'TISI', 'Non-Tech', 'Shaima Hanif', 'Jakiya Jafrin', '2020-03-08 23:26:48', '2020-03-08 23:26:48', '66712', '200', '4', 'Graphics Technology ', 'General'),
(1583731610, 'Offset Machine operation', 'Second Semester', 'TISI', 'Tech', 'Towfiq Hasan', 'Jakiya Jafrin', '2020-03-08 23:29:20', '2020-03-08 23:29:20', '69521', '100', '2', 'Graphics Technology ', 'General'),
(1583731762, 'Bangla', 'Second Semester', 'TISI', 'Non-Tech', 'Md Maznu Miah', 'Jakiya Jafrin', '2020-03-08 23:31:19', '2020-03-08 23:31:19', '65711', '200', '4', 'Graphics Technology ', 'General'),
(1583836328, 'Bangla', 'Second Semester', 'TISI', 'Non-Tech', 'Md Maznu Miah', 'Jakiya Jafrin', '2020-03-10 04:34:14', '2020-03-10 04:34:14', '65711', '200', '4', 'Ceramic Technology', 'General'),
(1583836458, 'English', 'Second Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Jakiya Jafrin', '2020-03-10 04:35:27', '2020-03-10 04:35:27', '65712', '100', '2', 'Ceramic Technology', 'General'),
(1583836530, 'Math-2', 'Second Semester', 'TISI', 'Non-Tech', 'ANKUR KUMER DEY', 'Jakiya Jafrin', '2020-03-10 04:36:43', '2020-03-10 04:36:43', '65921', '200', '4', 'Ceramic Technology', 'General'),
(1583837073, 'Physics-1', 'Second Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Jakiya Jafrin', '2020-03-10 04:46:16', '2020-03-10 04:46:16', '65912', '200', '4', 'Ceramic Technology', 'General'),
(1583837178, 'Electronic Engineering Fundamentals', 'Second Semester', 'TISI', 'Tech', 'Md. Touhidul Islam', 'Jakiya Jafrin', '2020-03-10 04:47:55', '2020-03-10 04:47:55', '66822', '150', '3', 'Ceramic Technology', 'General'),
(1583837278, 'Ceramic Engineering Materials-2', 'Second Semester', 'TISI', 'Tech', 'Jakiya Jafrin', 'Jakiya Jafrin', '2020-03-10 04:49:12', '2020-03-10 04:49:12', '67621', '150', '3', 'Ceramic Technology', 'General'),
(1583837355, 'Ceramic Model Making', 'Second Semester', 'TISI', 'Tech', 'Jakiya Jafrin', 'Jakiya Jafrin', '2020-03-10 04:50:17', '2020-03-10 04:50:17', '67622', '100', '2', 'Ceramic Technology', 'General'),
(1583837419, 'Civil Engineering Materials', 'Second Semester', 'TISI', 'Tech', 'Engr Zakia Sultana', 'Jakiya Jafrin', '2020-03-10 04:54:04', '2020-03-10 04:54:04', '66421', '150', '3', 'Civil Technology', 'General'),
(1583837646, 'Communicative English', 'Second Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Jakiya Jafrin', '2020-03-10 04:55:08', '2020-03-10 04:55:08', '65722', '100', '2', 'Civil Technology', 'General'),
(1583837710, 'Math-2', 'Second Semester', 'TISI', 'Non-Tech', 'Md.Altab Hossain', 'Jakiya Jafrin', '2020-03-10 04:56:45', '2020-03-10 04:56:45', '65921', '200', '4', 'Civil Technology', 'General'),
(1583837808, 'Physics-2', 'Second Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Jakiya Jafrin', '2020-03-10 04:58:39', '2020-03-10 04:58:39', '65922', '200', '4', 'Civil Technology', 'General'),
(1583837922, 'Computer Application', 'Second Semester', 'TISI', 'Tech', 'Ali Azom', 'Jakiya Jafrin', '2020-03-10 04:59:52', '2020-03-10 04:59:52', '66611', '100', '2', 'Civil Technology', 'General'),
(1583837995, 'Electronic Engineering Fundamentals', 'Second Semester', 'TISI', 'Tech', 'Shaima Hanif', 'Jakiya Jafrin', '2020-03-10 05:01:49', '2020-03-10 05:01:49', '66822', '150', '3', 'Civil Technology', 'General'),
(1583838209, 'physical Education and Lifeskill Development', 'Second Semester', 'TISI', 'Non-Tech', 'Md. Rezaul Haque', 'Jakiya Jafrin', '2020-03-10 05:04:18', '2020-03-10 05:04:18', '65812', '50', '1', 'Civil Technology', 'General'),
(1583901081, 'Electrical Circuits-1', 'Second Semester', 'TISI', 'Tech', 'Shaima Hanif', 'Jakiya Jafrin', '2020-03-10 22:33:33', '2020-03-10 22:33:33', '66721', '200', '4', 'Electrical Technology', 'General'),
(1583901216, 'Electrical Appliances', 'Second Semester', 'TISI', 'Tech', 'Md. Touhidul Islam', 'Jakiya Jafrin', '2020-03-10 22:34:55', '2020-03-10 22:34:55', '66722', '150', '3', 'Electrical Technology', 'General'),
(1583901298, 'Computer Application', 'Second Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Jakiya Jafrin', '2020-03-10 22:35:44', '2020-03-10 22:35:44', '66611', '100', '2', 'Electrical Technology', 'General'),
(1583901347, 'Math-2', 'Second Semester', 'TISI', 'Non-Tech', 'ANKUR KUMER DEY', 'Jakiya Jafrin', '2020-03-10 22:36:51', '2020-03-10 22:36:51', '65921', '200', '4', 'Electrical Technology', 'General'),
(1583901414, 'Physics-1', 'Second Semester', 'TISI', 'Non-Tech', 'Md. Muraduzzaman', 'Jakiya Jafrin', '2020-03-10 22:38:14', '2020-03-10 22:38:14', '65912', '200', '4', 'Electrical Technology', 'General'),
(1583901496, 'Bangla', 'Second Semester', 'TISI', 'Non-Tech', 'Md Maznu Miah', 'Jakiya Jafrin', '2020-03-10 22:39:03', '2020-03-10 22:39:03', '65711', '200', '4', 'Electrical Technology', 'General'),
(1583901546, 'English', 'Second Semester', 'TISI', 'Non-Tech', 'Md Sohel Rana', 'Jakiya Jafrin', '2020-03-10 22:39:54', '2020-03-10 22:39:54', '65712', '100', '2', 'Electrical Technology', 'General'),
(1583903840, 'Elementary Graphic Design', 'Forth Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Jakiya Jafrin', '2020-03-10 23:18:32', '2020-03-10 23:18:32', '69642', '200', '4', 'Graphics Technology ', 'General'),
(1583903914, 'Photography', 'Forth Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'Jakiya Jafrin', '2020-03-10 23:19:51', '2020-03-10 23:19:51', '69643', '150', '3', 'Graphics Technology ', 'General'),
(1583904016, 'Basic Vedio Editing', 'Forth Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Jakiya Jafrin', '2020-03-10 23:21:29', '2020-03-10 23:21:29', '69644', '150', '3', 'Graphics Technology ', 'General'),
(1583904091, 'Screen Printing', 'Forth Semester', 'TISI', 'Tech', 'Towfiq Hasan', 'Jakiya Jafrin', '2020-03-10 23:22:53', '2020-03-10 23:22:53', '69541', '200', '4', 'Graphics Technology ', 'General'),
(1583904175, 'Business Organization & Communication', 'Forth Semester', 'TISI', 'Non-Tech', 'Md. Rezaul Haque', 'Jakiya Jafrin', '2020-03-10 23:24:03', '2020-03-10 23:24:03', '65841', '100', '2', 'Graphics Technology ', 'General'),
(1583904244, 'Environmental Studies', 'Forth Semester', 'TISI', 'Non-Tech', 'Jakiya Jafrin', 'Jakiya Jafrin', '2020-03-10 23:25:06', '2020-03-10 23:25:06', '69054', '100', '2', 'Graphics Technology ', 'General'),
(1583904308, 'Business Organization & Communication', 'Forth Semester', 'TISI', 'Non-Tech', 'Md. Rezaul Haque', 'Jakiya Jafrin', '2020-03-10 23:26:44', '2020-03-11 00:07:43', '65841', '100', '2', 'Computer Science & Technology', 'General'),
(1583904406, 'Operating System', 'Forth Semester', 'TISI', 'Tech', 'Ali Azom', 'Jakiya Jafrin', '2020-03-10 23:29:29', '2020-03-10 23:29:29', '68541', '200', '4', 'Computer Science & Technology', 'General'),
(1583904571, 'Web Programming', 'Forth Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'Jakiya Jafrin', '2020-03-10 23:30:31', '2020-03-10 23:30:31', '68542', '100', '2', 'Computer Science & Technology', 'General'),
(1583904633, 'Mathematics for Computing', 'Forth Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Jakiya Jafrin', '2020-03-10 23:31:37', '2020-03-10 23:31:37', '68543', '100', '2', 'Computer Science & Technology', 'General'),
(1583904699, 'Object Oriented Programming', 'Forth Semester', 'TISI', 'Tech', 'Ali Azom', 'Jakiya Jafrin', '2020-03-10 23:33:19', '2020-03-10 23:33:19', '66641', '150', '3', 'Computer Science & Technology', 'General'),
(1583904801, 'Data STructure & Algorithm', 'Forth Semester', 'TISI', 'Tech', 'Md. Masud Rana', 'Jakiya Jafrin', '2020-03-10 23:34:45', '2020-03-10 23:34:45', '66642', '150', '3', 'Computer Science & Technology', 'General'),
(1583904886, 'Seqential Logic System', 'Forth Semester', 'TISI', 'Tech', 'Md. Touhidul Islam', 'Jakiya Jafrin', '2020-03-10 23:36:35', '2020-03-10 23:36:35', '66653', '200', '4', 'Computer Science & Technology', 'General'),
(1583906966, 'Printers Costing & Estimating', 'Sixth Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'Jakiya Jafrin', '2020-03-11 00:11:54', '2020-03-11 00:11:54', '69561', '150', '3', 'Graphics Technology ', 'General'),
(1583907116, 'Desktop Publishing', 'Sixth Semester', 'TISI', 'Tech', 'Md. Arif Ahmed', 'Jakiya Jafrin', '2020-03-11 00:14:03', '2020-03-11 00:14:03', '69661', '200', '4', 'Graphics Technology ', 'General'),
(1583907245, 'Project Work', 'Sixth Semester', 'TISI', 'Tech', 'Md. Shariful Islam', 'Jakiya Jafrin', '2020-03-11 00:15:37', '2020-03-11 00:15:37', '69662', '100', '2', 'Graphics Technology ', 'General'),
(1583907339, 'Basic Web Design', 'Sixth Semester', 'TISI', 'Tech', 'Md. Jubayer Hossain', 'Jakiya Jafrin', '2020-03-11 00:17:38', '2020-03-11 00:17:38', '69663', '150', '3', 'Graphics Technology ', 'General'),
(1583907460, 'Computer Graphic Design-2', 'Sixth Semester', 'TISI', 'Tech', 'Towfiq Hasan', 'Jakiya Jafrin', '2020-03-11 00:18:46', '2020-03-11 00:18:46', '69664', '200', '4', 'Graphics Technology ', 'General'),
(1583907528, 'Industrial Management', 'Sixth Semester', 'TISI', 'Tech', 'Md. Rezaul Haque', 'Jakiya Jafrin', '2020-03-11 00:19:37', '2020-03-11 00:19:37', '65852', '100', '2', 'Graphics Technology ', 'General');

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

-- --------------------------------------------------------

--
-- Table structure for table `mark_component_details`
--

CREATE TABLE `mark_component_details` (
  `mark_component_id` int(11) NOT NULL,
  `general_details_id` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `component_id` varchar(255) NOT NULL,
  `component_name` varchar(255) NOT NULL,
  `component_mark` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark_component_details`
--

INSERT INTO `mark_component_details` (`mark_component_id`, `general_details_id`, `roll`, `component_id`, `component_name`, `component_mark`, `created_at`, `updated_at`) VALUES
(1, '1584771213', '2010242', '1574849126', 'PC', '20', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(2, '1584771213', '2010242', '1574849148', 'PF', '30', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(3, '1584771213', '2010243', '1574849148', 'PF', '49', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(4, '1584771213', '2010243', '1574849126', 'PC', '40', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(5, '1584771213', '2010244', '1574849126', 'PC', '40', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(6, '1584771213', '2010244', '1574849148', 'PF', '20', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(7, '1584771213', '2010245', '1574849126', 'PC', '10', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(8, '1584771213', '2010245', '1574849148', 'PF', '10', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(9, '1584771213', '2010246', '1574849126', 'PC', '40', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(10, '1584771213', '2010246', '1574849148', 'PF', '44', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(11, '1584771213', '2010247', '1574849126', 'PC', '30', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(12, '1584771213', '2010247', '1574849148', 'PF', '20', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(13, '1584771213', '20241', '1574849126', 'PC', '20', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(14, '1584771213', '20241', '1574849148', 'PF', '50', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(15, '1584771213', '8517104', '1574849126', 'PC', '10', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(16, '1584771213', '8517104', '1574849148', 'PF', '30', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(17, '1584771213', '8517109', '1574849126', 'PC', '20', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(18, '1584771213', '8517109', '1574849148', 'PF', '30', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(19, '1584771213', '8517111', '1574849126', 'PC', '30', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(20, '1584771213', '8517111', '1574849148', 'PF', '50', '2020-03-21 00:13:34', '2020-03-21 00:13:34'),
(21, '1584772439', '2010242', '1574849126', 'PC', '20', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(22, '1584772439', '2010242', '1574849148', 'PF', '10', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(23, '1584772439', '2010243', '1574849126', 'PC', '10', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(24, '1584772439', '2010243', '1574849148', 'PF', '10', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(25, '1584772439', '2010244', '1574849126', 'PC', '5', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(26, '1584772439', '2010244', '1574849148', 'PF', '5', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(27, '1584772439', '2010245', '1574849126', 'PC', '20', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(28, '1584772439', '2010245', '1574849148', 'PF', '20', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(29, '1584772439', '2010246', '1574849126', 'PC', '10', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(30, '1584772439', '2010246', '1574849148', 'PF', '20', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(31, '1584772439', '2010247', '1574849126', 'PC', '5', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(32, '1584772439', '2010247', '1574849148', 'PF', '25', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(33, '1584772439', '20241', '1574849126', 'PC', '20', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(34, '1584772439', '20241', '1574849148', 'PF', '20', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(35, '1584772439', '8517104', '1574849126', 'PC', '10', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(36, '1584772439', '8517104', '1574849148', 'PF', '24', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(37, '1584772439', '8517109', '1574849126', 'PC', '10', '2020-03-21 00:34:01', '2020-03-21 00:34:01'),
(38, '1584772439', '8517109', '1574849148', 'PF', '20', '2020-03-21 00:34:01', '2020-03-21 00:34:01'),
(39, '1584772439', '8517111', '1574849126', 'PC', '22', '2020-03-21 00:34:01', '2020-03-21 00:34:01'),
(40, '1584772439', '8517111', '1574849148', 'PF', '22', '2020-03-21 00:34:01', '2020-03-21 00:34:01'),
(41, '1584772621', '2010242', '1574849085', 'TC', '20', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(42, '1584772621', '2010242', '1574849108', 'TF', '20', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(43, '1584772621', '2010242', '1574849126', 'PC', '22', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(44, '1584772621', '2010242', '1574849148', 'PF', '15', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(45, '1584772621', '2010243', '1574849085', 'TC', '20', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(46, '1584772621', '2010243', '1574849108', 'TF', '20', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(47, '1584772621', '2010243', '1574849126', 'PC', '20', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(48, '1584772621', '2010243', '1574849148', 'PF', '20', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(49, '1584772621', '2010244', '1574849085', 'TC', '20', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(50, '1584772621', '2010244', '1574849108', 'TF', '20', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(51, '1584772621', '2010244', '1574849126', 'PC', '20', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(52, '1584772621', '2010244', '1574849148', 'PF', '20', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(53, '1584772621', '2010245', '1574849085', 'TC', '20', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(54, '1584772621', '2010245', '1574849108', 'TF', '22', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(55, '1584772621', '2010245', '1574849126', 'PC', '20', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(56, '1584772621', '2010245', '1574849148', 'PF', '22', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(57, '1584772621', '2010246', '1574849085', 'TC', '30', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(58, '1584772621', '2010246', '1574849108', 'TF', '40', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(59, '1584772621', '2010246', '1574849126', 'PC', '22', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(60, '1584772621', '2010246', '1574849148', 'PF', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(61, '1584772621', '2010247', '1574849085', 'TC', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(62, '1584772621', '2010247', '1574849108', 'TF', '34', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(63, '1584772621', '2010247', '1574849126', 'PC', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(64, '1584772621', '2010247', '1574849148', 'PF', '11', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(65, '1584772621', '20241', '1574849085', 'TC', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(66, '1584772621', '20241', '1574849108', 'TF', '32', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(67, '1584772621', '20241', '1574849126', 'PC', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(68, '1584772621', '20241', '1574849148', 'PF', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(69, '1584772621', '8517104', '1574849085', 'TC', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(70, '1584772621', '8517104', '1574849108', 'TF', '34', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(71, '1584772621', '8517104', '1574849126', 'PC', '12', '2020-03-21 00:37:02', '2020-03-21 00:37:02'),
(72, '1584772621', '8517104', '1574849148', 'PF', '10', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(73, '1584772621', '8517109', '1574849085', 'TC', '12', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(74, '1584772621', '8517109', '1574849108', 'TF', '13', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(75, '1584772621', '8517109', '1574849126', 'PC', '21', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(76, '1584772621', '8517109', '1574849148', 'PF', '13', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(77, '1584772621', '8517111', '1574849085', 'TC', '40', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(78, '1584772621', '8517111', '1574849108', 'TF', '60', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(79, '1584772621', '8517111', '1574849126', 'PC', '10', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(80, '1584772621', '8517111', '1574849148', 'PF', '25', '2020-03-21 00:37:03', '2020-03-21 00:37:03'),
(81, '1584772946', '2010242', '1574849085', 'TC', '40', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(82, '1584772946', '2010242', '1574849108', 'TF', '40', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(83, '1584772946', '2010242', '1574849126', 'PC', '50', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(84, '1584772946', '2010242', '1574849148', 'PF', '50', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(85, '1584772946', '2010243', '1574849085', 'TC', '20', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(86, '1584772946', '2010243', '1574849108', 'TF', '20', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(87, '1584772946', '2010243', '1574849126', 'PC', '20', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(88, '1584772946', '2010243', '1574849148', 'PF', '21', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(89, '1584772946', '2010244', '1574849085', 'TC', '30', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(90, '1584772946', '2010244', '1574849108', 'TF', '40', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(91, '1584772946', '2010244', '1574849126', 'PC', '30', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(92, '1584772946', '2010244', '1574849148', 'PF', '50', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(93, '1584772946', '2010245', '1574849085', 'TC', '20', '2020-03-21 00:42:28', '2020-03-21 00:42:28'),
(94, '1584772946', '2010245', '1574849108', 'TF', '30', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(95, '1584772946', '2010245', '1574849126', 'PC', '40', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(96, '1584772946', '2010245', '1574849148', 'PF', '50', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(97, '1584772946', '2010246', '1574849085', 'TC', '15', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(98, '1584772946', '2010246', '1574849108', 'TF', '20', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(99, '1584772946', '2010246', '1574849126', 'PC', '30', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(100, '1584772946', '2010246', '1574849148', 'PF', '40', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(101, '1584772946', '2010247', '1574849085', 'TC', '15', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(102, '1584772946', '2010247', '1574849108', 'TF', '12', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(103, '1584772946', '2010247', '1574849126', 'PC', '14', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(104, '1584772946', '2010247', '1574849148', 'PF', '50', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(105, '1584772946', '20241', '1574849085', 'TC', '10', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(106, '1584772946', '20241', '1574849108', 'TF', '30', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(107, '1584772946', '20241', '1574849126', 'PC', '50', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(108, '1584772946', '20241', '1574849148', 'PF', '50', '2020-03-21 00:42:29', '2020-03-21 00:42:29'),
(109, '1584772946', '8517104', '1574849085', 'TC', '20', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(110, '1584772946', '8517104', '1574849108', 'TF', '20', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(111, '1584772946', '8517104', '1574849126', 'PC', '20', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(112, '1584772946', '8517104', '1574849148', 'PF', '20', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(113, '1584772946', '8517109', '1574849085', 'TC', '30', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(114, '1584772946', '8517109', '1574849108', 'TF', '30', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(115, '1584772946', '8517109', '1574849126', 'PC', '50', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(116, '1584772946', '8517109', '1574849148', 'PF', '50', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(117, '1584772946', '8517111', '1574849085', 'TC', '24', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(118, '1584772946', '8517111', '1574849108', 'TF', '10', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(119, '1584772946', '8517111', '1574849126', 'PC', '30', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(120, '1584772946', '8517111', '1574849148', 'PF', '30', '2020-03-21 00:42:30', '2020-03-21 00:42:30'),
(121, '1584773126', '2010242', '1574849085', 'TC', '30', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(122, '1584773126', '2010242', '1574849108', 'TF', '40', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(123, '1584773126', '2010242', '1574849126', 'PC', '25', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(124, '1584773126', '2010242', '1574849148', 'PF', '22', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(125, '1584773126', '2010243', '1574849085', 'TC', '21', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(126, '1584773126', '2010243', '1574849108', 'TF', '22', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(127, '1584773126', '2010243', '1574849126', 'PC', '12', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(128, '1584773126', '2010243', '1574849148', 'PF', '12', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(129, '1584773126', '2010244', '1574849085', 'TC', '23', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(130, '1584773126', '2010244', '1574849108', 'TF', '23', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(131, '1584773126', '2010244', '1574849126', 'PC', '21', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(132, '1584773126', '2010244', '1574849148', 'PF', '23', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(133, '1584773126', '2010245', '1574849085', 'TC', '24', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(134, '1584773126', '2010245', '1574849108', 'TF', '12', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(135, '1584773126', '2010245', '1574849126', 'PC', '25', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(136, '1584773126', '2010245', '1574849148', 'PF', '2', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(137, '1584773126', '2010246', '1574849085', 'TC', '4', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(138, '1584773126', '2010246', '1574849108', 'TF', '32', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(139, '1584773126', '2010246', '1574849126', 'PC', '25', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(140, '1584773126', '2010246', '1574849148', 'PF', '24', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(141, '1584773126', '2010247', '1574849126', 'PC', '23', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(142, '1584773126', '2010247', '1574849148', 'PF', '4', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(143, '1584773126', '2010247', '1574849108', 'TF', '34', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(144, '1584773126', '2010247', '1574849085', 'TC', '34', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(145, '1584773126', '20241', '1574849126', 'PC', '21', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(146, '1584773126', '20241', '1574849148', 'PF', '22', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(147, '1584773126', '20241', '1574849108', 'TF', '23', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(148, '1584773126', '20241', '1574849085', 'TC', '26', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(149, '1584773126', '8517104', '1574849126', 'PC', '24', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(150, '1584773126', '8517104', '1574849148', 'PF', '2', '2020-03-21 00:45:27', '2020-03-21 00:45:27'),
(151, '1584773126', '8517104', '1574849108', 'TF', '23', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(152, '1584773126', '8517104', '1574849085', 'TC', '23', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(153, '1584773126', '8517109', '1574849126', 'PC', '23', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(154, '1584773126', '8517109', '1574849148', 'PF', '22', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(155, '1584773126', '8517109', '1574849108', 'TF', '34', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(156, '1584773126', '8517109', '1574849085', 'TC', '23', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(157, '1584773126', '8517111', '1574849126', 'PC', '22', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(158, '1584773126', '8517111', '1574849148', 'PF', '12', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(159, '1584773126', '8517111', '1574849108', 'TF', '43', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(160, '1584773126', '8517111', '1574849085', 'TC', '23', '2020-03-21 00:45:28', '2020-03-21 00:45:28'),
(161, '1584773249', '2010242', '1574849085', 'TC', '32', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(162, '1584773249', '2010242', '1574849108', 'TF', '32', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(163, '1584773249', '2010242', '1574849126', 'PC', '23', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(164, '1584773249', '2010242', '1574849148', 'PF', '22', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(165, '1584773249', '2010243', '1574849085', 'TC', '23', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(166, '1584773249', '2010243', '1574849108', 'TF', '23', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(167, '1584773249', '2010243', '1574849126', 'PC', '21', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(168, '1584773249', '2010243', '1574849148', 'PF', '22', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(169, '1584773249', '2010244', '1574849085', 'TC', '23', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(170, '1584773249', '2010244', '1574849108', 'TF', '23', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(171, '1584773249', '2010244', '1574849126', 'PC', '12', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(172, '1584773249', '2010244', '1574849148', 'PF', '22', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(173, '1584773249', '2010245', '1574849085', 'TC', '32', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(174, '1584773249', '2010245', '1574849108', 'TF', '23', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(175, '1584773249', '2010245', '1574849126', 'PC', '20', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(176, '1584773249', '2010245', '1574849148', 'PF', '22', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(177, '1584773249', '2010246', '1574849085', 'TC', '23', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(178, '1584773249', '2010246', '1574849108', 'TF', '43', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(179, '1584773249', '2010246', '1574849126', 'PC', '22', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(180, '1584773249', '2010246', '1574849148', 'PF', '22', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(181, '1584773249', '2010247', '1574849085', 'TC', '34', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(182, '1584773249', '2010247', '1574849108', 'TF', '23', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(183, '1584773249', '2010247', '1574849126', 'PC', '21', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(184, '1584773249', '2010247', '1574849148', 'PF', '22', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(185, '1584773249', '20241', '1574849108', 'TF', '34', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(186, '1584773249', '20241', '1574849126', 'PC', '12', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(187, '1584773249', '20241', '1574849148', 'PF', '22', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(188, '1584773249', '8517104', '1574849085', 'TC', '23', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(189, '1584773249', '8517104', '1574849108', 'TF', '43', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(190, '1584773249', '8517104', '1574849126', 'PC', '23', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(191, '1584773249', '8517104', '1574849148', 'PF', '22', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(192, '1584773249', '8517109', '1574849085', 'TC', '12', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(193, '1584773249', '8517109', '1574849108', 'TF', '3', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(194, '1584773249', '8517109', '1574849126', 'PC', '12', '2020-03-21 00:47:31', '2020-03-21 00:47:31'),
(195, '1584773249', '8517109', '1574849148', 'PF', '22', '2020-03-21 00:47:32', '2020-03-21 00:47:32'),
(196, '1584773249', '8517111', '1574849085', 'TC', '10', '2020-03-21 00:47:32', '2020-03-21 00:47:32'),
(197, '1584773249', '8517111', '1574849108', 'TF', '43', '2020-03-21 00:47:32', '2020-03-21 00:47:32'),
(198, '1584773249', '8517111', '1574849126', 'PC', '23', '2020-03-21 00:47:32', '2020-03-21 00:47:32'),
(199, '1584773249', '8517111', '1574849148', 'PF', '22', '2020-03-21 00:47:32', '2020-03-21 00:47:32'),
(200, '1584773352', '2010242', '1574849085', 'TC', '23', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(201, '1584773352', '2010242', '1574849108', 'TF', '44', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(202, '1584773352', '2010243', '1574849085', 'TC', '23', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(203, '1584773352', '2010243', '1574849108', 'TF', '54', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(204, '1584773352', '2010244', '1574849085', 'TC', '33', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(205, '1584773352', '2010244', '1574849108', 'TF', '54', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(206, '1584773352', '2010245', '1574849085', 'TC', '23', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(207, '1584773352', '2010245', '1574849108', 'TF', '44', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(208, '1584773352', '2010246', '1574849085', 'TC', '23', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(209, '1584773352', '2010246', '1574849108', 'TF', '34', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(210, '1584773352', '2010247', '1574849085', 'TC', '22', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(211, '1584773352', '2010247', '1574849108', 'TF', '33', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(212, '1584773352', '20241', '1574849085', 'TC', '23', '2020-03-21 00:49:14', '2020-03-21 00:49:14'),
(213, '1584773352', '20241', '1574849108', 'TF', '50', '2020-03-21 00:49:14', '2020-03-21 00:49:14'),
(214, '1584773352', '8517104', '1574849085', 'TC', '33', '2020-03-21 00:49:14', '2020-03-21 00:49:14'),
(215, '1584773352', '8517104', '1574849108', 'TF', '55', '2020-03-21 00:49:14', '2020-03-21 00:49:14'),
(216, '1584773352', '8517109', '1574849085', 'TC', '20', '2020-03-21 00:49:14', '2020-03-21 00:49:14'),
(217, '1584773352', '8517109', '1574849108', 'TF', '22', '2020-03-21 00:49:14', '2020-03-21 00:49:14'),
(218, '1584773352', '8517111', '1574849085', 'TC', '3', '2020-03-21 00:49:14', '2020-03-21 00:49:14'),
(219, '1584773352', '8517111', '1574849108', 'TF', '10', '2020-03-21 00:49:14', '2020-03-21 00:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `mark_general_details`
--

CREATE TABLE `mark_general_details` (
  `general_details_id` int(11) NOT NULL,
  `exam_name` varchar(191) NOT NULL,
  `class_name` varchar(191) NOT NULL,
  `section` varchar(191) NOT NULL,
  `Department` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `default_session` varchar(191) NOT NULL,
  `entry_here` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publishing_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark_general_details`
--

INSERT INTO `mark_general_details` (`general_details_id`, `exam_name`, `class_name`, `section`, `Department`, `subject`, `default_session`, `entry_here`, `created_at`, `updated_at`, `publishing_status`) VALUES
(1584771213, 'Midterm Exam', 'Sixth Semester', 'General', 'Computer Science & Technology', '1583726631', '2017-2018', 'Md Jubayer Hossain', '2020-03-21 06:50:03', '2020-03-21 00:50:03', 1),
(1584772439, 'Midterm Exam', 'Sixth Semester', 'General', 'Computer Science & Technology', '1583726971', '2017-2018', 'Md Jubayer Hossain', '2020-03-21 06:50:03', '2020-03-21 00:50:03', 1),
(1584772621, 'Midterm Exam', 'Sixth Semester', 'General', 'Computer Science & Technology', '1583727057', '2017-2018', 'Md Jubayer Hossain', '2020-03-21 06:50:03', '2020-03-21 00:50:03', 1),
(1584772946, 'Midterm Exam', 'Sixth Semester', 'General', 'Computer Science & Technology', '1583727163', '2017-2018', 'Md Jubayer Hossain', '2020-03-21 06:50:03', '2020-03-21 00:50:03', 1),
(1584773126, 'Midterm Exam', 'Sixth Semester', 'General', 'Computer Science & Technology', '1583727298', '2017-2018', 'Md Jubayer Hossain', '2020-03-21 06:50:03', '2020-03-21 00:50:03', 1),
(1584773249, 'Midterm Exam', 'Sixth Semester', 'General', 'Computer Science & Technology', '1583727382', '2017-2018', 'Md Jubayer Hossain', '2020-03-21 06:50:03', '2020-03-21 00:50:03', 1),
(1584773352, 'Midterm Exam', 'Sixth Semester', 'General', 'Computer Science & Technology', '1583727513', '2017-2018', 'Md Jubayer Hossain', '2020-03-21 06:50:03', '2020-03-21 00:50:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark_student_details`
--

CREATE TABLE `mark_student_details` (
  `student_details_id` int(11) NOT NULL,
  `general_details_id` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark_student_details`
--

INSERT INTO `mark_student_details` (`student_details_id`, `general_details_id`, `roll`, `cgpa`, `grade_name`, `comment`, `created_at`, `updated_at`) VALUES
(1, '1584771213', '2010242', '2.5', 'C+', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(2, '1584771213', '2010243', '5', 'A+', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(3, '1584771213', '2010244', '3.5', 'B+', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(4, '1584771213', '2010245', '0.0', 'F', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(5, '1584771213', '2010246', '5', 'A+', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(6, '1584771213', '2010247', '2.5', 'C+', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(7, '1584771213', '20241', '4', 'A-', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(8, '1584771213', '8517104', '0', 'F', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(9, '1584771213', '8517109', '2.5', 'C+', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(10, '1584771213', '8517111', '5', 'A+', 'N/A', '2020-03-21 00:13:33', '2020-03-21 00:13:33'),
(11, '1584772439', '2010242', '3.5', 'B+', 'N/A', '2020-03-21 00:33:59', '2020-03-21 00:33:59'),
(12, '1584772439', '2010243', '2.5', 'C+', 'N/A', '2020-03-21 00:33:59', '2020-03-21 00:33:59'),
(13, '1584772439', '2010244', '0.0', 'F', 'N/A', '2020-03-21 00:33:59', '2020-03-21 00:33:59'),
(14, '1584772439', '2010245', '4', 'A-', 'N/A', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(15, '1584772439', '2010246', '3.5', 'B+', 'N/A', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(16, '1584772439', '2010247', '0', 'F', 'N/A', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(17, '1584772439', '20241', '4', 'A-', 'N/A', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(18, '1584772439', '8517104', '4', 'B', 'N/A', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(19, '1584772439', '8517109', '3.5', 'B+', 'N/A', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(20, '1584772439', '8517111', '4.5', 'A', 'N/A', '2020-03-21 00:34:00', '2020-03-21 00:34:00'),
(21, '1584772621', '2010242', '3', 'C', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(22, '1584772621', '2010243', '3.5', 'B+', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(23, '1584772621', '2010244', '3.5', 'B+', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(24, '1584772621', '2010245', '3.5', 'B+', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(25, '1584772621', '2010246', '4', 'B', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(26, '1584772621', '2010247', '3', 'C', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(27, '1584772621', '20241', '3', 'C', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(28, '1584772621', '8517104', '3', 'C', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(29, '1584772621', '8517109', '0', 'F', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(30, '1584772621', '8517111', '5', 'A+', 'N/A', '2020-03-21 00:37:01', '2020-03-21 00:37:01'),
(31, '1584772946', '2010242', '5', 'A+', 'N/A', '2020-03-21 00:42:26', '2020-03-21 00:42:26'),
(32, '1584772946', '2010243', '0', 'F', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(33, '1584772946', '2010244', '4', 'A-', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(34, '1584772946', '2010245', '4', 'A-', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(35, '1584772946', '2010246', '0', 'F', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(36, '1584772946', '2010247', '0', 'F', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(37, '1584772946', '20241', '0', 'F', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(38, '1584772946', '8517104', '0', 'F', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(39, '1584772946', '8517109', '4.5', 'A', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(40, '1584772946', '8517111', '0', 'F', 'N/A', '2020-03-21 00:42:27', '2020-03-21 00:42:27'),
(41, '1584773126', '2010242', '4.5', 'A', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(42, '1584773126', '2010243', '3', 'C', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(43, '1584773126', '2010244', '3.5', 'B+', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(44, '1584773126', '2010245', '0', 'F', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(45, '1584773126', '2010246', '3.5', 'B+', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(46, '1584773126', '2010247', '0', 'F', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(47, '1584773126', '20241', '4', 'B', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(48, '1584773126', '8517104', '0', 'F', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(49, '1584773126', '8517109', '4', 'B', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(50, '1584773126', '8517111', '4', 'B', 'N/A', '2020-03-21 00:45:26', '2020-03-21 00:45:26'),
(51, '1584773249', '2010242', '4', 'B', 'N/A', '2020-03-21 00:47:29', '2020-03-21 00:47:29'),
(52, '1584773249', '2010243', '3.5', 'B+', 'N/A', '2020-03-21 00:47:29', '2020-03-21 00:47:29'),
(53, '1584773249', '2010244', '3', 'C', 'N/A', '2020-03-21 00:47:29', '2020-03-21 00:47:29'),
(54, '1584773249', '2010245', '4', 'B', 'N/A', '2020-03-21 00:47:29', '2020-03-21 00:47:29'),
(55, '1584773249', '2010246', '4', 'B', 'N/A', '2020-03-21 00:47:29', '2020-03-21 00:47:29'),
(56, '1584773249', '2010247', '4', 'B', 'N/A', '2020-03-21 00:47:29', '2020-03-21 00:47:29'),
(57, '1584773249', '20241', '2.5', 'C+', 'N/A', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(58, '1584773249', '8517104', '4', 'B', 'N/A', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(59, '1584773249', '8517109', '0', 'F', 'N/A', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(60, '1584773249', '8517111', '4', 'B', 'N/A', '2020-03-21 00:47:30', '2020-03-21 00:47:30'),
(61, '1584773352', '2010242', '4', 'A-', 'N/A', '2020-03-21 00:49:12', '2020-03-21 00:49:12'),
(62, '1584773352', '2010243', '5', 'A+', 'N/A', '2020-03-21 00:49:12', '2020-03-21 00:49:12'),
(63, '1584773352', '2010244', '5', 'A+', 'N/A', '2020-03-21 00:49:12', '2020-03-21 00:49:12'),
(64, '1584773352', '2010245', '4', 'A-', 'N/A', '2020-03-21 00:49:12', '2020-03-21 00:49:12'),
(65, '1584773352', '2010246', '3.5', 'B+', 'N/A', '2020-03-21 00:49:12', '2020-03-21 00:49:12'),
(66, '1584773352', '2010247', '3', 'C', 'N/A', '2020-03-21 00:49:12', '2020-03-21 00:49:12'),
(67, '1584773352', '20241', '4.5', 'A', 'N/A', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(68, '1584773352', '8517104', '5', 'A+', 'N/A', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(69, '1584773352', '8517109', '2.5', 'C+', 'N/A', '2020-03-21 00:49:13', '2020-03-21 00:49:13'),
(70, '1584773352', '8517111', '0', 'F', 'N/A', '2020-03-21 00:49:13', '2020-03-21 00:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `roll_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `teacher_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `membership` (`member_id`, `member_name`, `roll_number`, `teacher_id`, `teacher_name`, `teacher_phone`, `teacher_email`, `type`, `reg_number`, `status`, `email`, `phone`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1575283690, 'MD. Milon Mia', '19103', '', '', '', '', 'Student', '1502008257', 'Active', 'milon@gmail.com', '', '2019-12-01', '2020-01-31', NULL, NULL),
(1575284091, 'Rocky Baba', '19104', '', '', '', '', 'Student', '1502008267', 'Active', 'RockyBaba@gmail.com', '01317955804', '2019-12-02', '2023-12-02', NULL, NULL),
(1575347513, 'Md siyam hossian ', '19107', '', '', '', '', 'Student', '1502008266', 'Active', 'Mdsiyamhossian@gmail.com', '01318450873', '2019-08-01', '2023-07-30', NULL, NULL),
(1575347581, 'Asme Azom', '19109', '', '', '', '', 'Student', '1502008265', 'Active', 'AsmeAzom@gmail.com', '01778496981', '2019-08-01', '2023-07-30', NULL, NULL),
(1575347654, 'Arif shahria', '19112', '', '', '', '', 'Student', '1502008261', 'Active', 'Arifshahria@gmail.com', '01758196688', '2019-08-01', '2023-07-30', NULL, NULL),
(1575347833, 'Monawar Hossain', '19113', '', '', '', '', 'Student', '1502008262', 'Active', 'MonawarHossain@gmail.com', '01714152583', '2019-08-01', '2023-07-30', NULL, NULL),
(1575348039, 'Sabbir Hossain', '19117', '', '', '', '', 'Student', '1502008260', 'Active', 'SabbirHossain@gmail.com', '01773202306', '2019-08-01', '2023-07-30', NULL, NULL),
(1575348108, 'MD Naimur Rahman', '19120', '', '', '', '', 'Student', '150200825', 'Active', '19120', '01795313148', '2019-07-01', '2023-07-30', NULL, NULL),
(1575348165, 'Mst.Rima Hasan', '19124', '', '', '', '', 'Student', '15020082288', 'Active', '19124', '01752637142', '2019-08-01', '2023-07-30', NULL, NULL),
(1575348211, 'Mst. Janntul Fersosi ', '19125', '', '', '', '', 'Student', '1502008287', 'Active', 'jannatul@gamil.com', '01724018286', '2019-08-01', '2023-07-30', NULL, NULL),
(1575348303, 'md:thajib hassan titas', '19126', '', '', '', '', 'Student', '1502008276', 'Active', '19126', '01851268423', '2019-08-01', '2023-07-30', NULL, NULL),
(1575348857, 'MD. Asaduzzaman Tamim', '19127', '', '', '', '', 'Student', '1502008273', 'Active', 'tamim@gmail.com', '', '2019-08-01', '2023-07-30', NULL, NULL),
(1575348925, ' md:shahira hosen', '19130', '', '', '', '', 'Student', '1502008179', 'Active', '19130', '01307668842', '2019-08-01', '2023-07-30', NULL, NULL),
(1575348978, 'MD. Shajahan Ali', '19134', '', '', '', '', 'Student', '1502008280', 'Active', '19134', '', '2019-08-01', '2023-07-30', NULL, NULL),
(1575349018, 'MD. Lokman Hossain', '19135', '', '', '', '', 'Student', '1502008281', 'Active', 'lokman@gmail.com', '', '2019-08-01', '2023-07-30', NULL, NULL),
(1575349074, 'MD.Meherab Hossin', '19136', '', '', '', '', 'Student', '1502008292', 'Active', '19136', '01737033503', '2019-08-01', '2023-07-30', NULL, NULL),
(1575349115, 'md:touhidujjaman', '19138', '', '', '', '', 'Student', '1502008277', 'Active', '19138', '01797830757', '2019-08-01', '2023-07-30', NULL, NULL),
(1575349157, 'Mst. Marufa Akter ', '19139', '', '', '', '', 'Student', '1502008275', 'Active', '19139', '', '2019-08-01', '2023-07-30', NULL, NULL),
(1575349192, 'Md. Anik Mia', '113739', '', '', '', '', 'Student', '1500914781', 'Active', 'anikchowdhury340@gmail.com', '01756646337', '2019-08-01', '2023-07-30', NULL, NULL),
(1575349228, 'Md: masud rana', '981369', '', '', '', '', 'Student', '813422', 'Active', '981369', '01722933826', '2019-08-01', '2023-07-30', NULL, NULL),
(1575349291, 'Md.Nur Alam', '6418101', '', '', '', '', 'Student', '6418101', 'Active', '6418101', '01747679060', '2019-08-01', '2023-07-30', NULL, NULL);

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

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`notice_id`, `notice_title`, `notice_subject`, `author`, `to`, `Notice`, `created_at`, `updated_at`) VALUES
(1584157033, 'করোনা ভাইরাস', '', '', 'Option', '', '2020-03-13 21:39:48', '2020-03-13 21:39:48');

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
(18, 'Job Type', 'Instructor', '2017-10-18 14:52:30', '2018-11-02 06:34:55'),
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
(42, 'Job Type', 'Administritive Officer', '2018-10-20 07:29:31', '2019-12-01 04:34:10'),
(43, 'Job Type', 'Marketing Officer', '2018-10-20 07:29:50', '2018-10-20 07:29:50'),
(44, 'Job Type', 'MLS', '2018-10-20 07:29:58', '2018-10-20 07:29:58'),
(45, 'Job Type', 'Foreman', '2018-10-20 07:30:52', '2018-10-20 07:30:52'),
(46, 'Job Type', 'Canteen Manager', '2018-10-20 07:31:20', '2018-10-20 07:31:20'),
(47, 'Job Type', 'Store Keeper', '2018-10-21 06:46:48', '2018-10-21 06:46:48'),
(48, 'work Department', 'Library', '2018-10-21 10:35:33', '2018-10-21 10:35:33'),
(49, 'Medium', 'TISI & TFAUMCH', '2018-12-23 04:52:12', '2018-12-23 04:52:12'),
(50, 'Job Type', 'Accounts Officer', '2018-12-31 09:34:31', '2018-12-31 09:34:31'),
(51, 'Job Type', 'Electircian', '2019-11-27 03:02:31', '2019-11-27 03:02:31'),
(52, 'Job Type', 'Gardener', '2019-11-27 03:17:27', '2019-11-27 03:17:27'),
(53, 'Session', '2019-2020', '2019-11-30 02:57:25', '2019-11-30 02:57:25'),
(54, 'Batch', '3', '2019-11-30 04:05:58', '2019-11-30 04:05:58'),
(55, 'Job Type', 'Cleaner ', '2020-03-14 01:16:47', '2020-03-14 01:16:47');

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
(1575099058, 'Md. Mohatab Ali', 'mohatab@gmail.com', '$2y$10$xRWSwjDnr3/GeOCaQrI6bOfRbCHzFyy6CcItC0HtLqC5CpsRI3V5.', '01760797683', 'Female', 'N/A', 'N/A', '2019-11-30 01:30:58', '2019-11-30 01:30:58'),
(1575101370, 'Md shohidul islam', 'shohidul@gmail.com', '$2y$10$Fo2zuvq2IlgpJRqdNxIO0eWyzpyI2m5rRw93jdU0HaruUHOUi0tge', '01719203344', 'Male', 'N/A', 'N/A', '2019-11-30 02:09:30', '2019-11-30 02:09:30'),
(1575102536, 'Sikender Mondol', 'sikder@gmail.com', '$2y$10$hqk51Yyer77/77wBZWU9S.o.o./HeS8/O0hDBbs7nFu4QWPleB5ym', '01939520750', 'Male', 'N/A', 'N/A', '2019-11-30 02:28:56', '2019-11-30 02:28:56'),
(1575105024, 'Md.Johurul Islam', 'Johurul@gmail.com', '$2y$10$8t3SOTD/G4fOgGawtEjKXuF4iFtFy4sQ.awNfxx3N8A9sJsjydMTK', '01782976708', 'Male', 'Businessman', '4000', '2019-11-30 03:10:24', '2019-11-30 03:10:24'),
(1575105231, 'Md: Sha-alom Sheikh', 'n/a', '$2y$10$.gag4Iqj8XhKj.NtTR3a9.X.UeO4lDQugx9cP8MJwrpJf4wnv/pGG', '01728405248', 'Male', 'Business', '20', '2019-11-30 03:13:51', '2019-11-30 03:13:51'),
(1575105759, 'Md. Abu Talim Khan', 'toufiktuhin23@gmail.com', '$2y$10$RLA9aGr/xXuLgleSN3CwpOwF8oFt7EIB3y/jRSPpddHhLbXbAb2Be', '01737732282', 'Male', 'Tailors', '10000', '2019-11-30 03:22:39', '2019-11-30 03:22:39'),
(1575105818, 'Md. Sharajul Islam', 'Sharajul@gmail.com', '$2y$10$toOW5oyd9rK8fhlXC1RAFOebY3lWZEDqet1eaUgMRjrAY70OpXHlm', '01789345362', 'Male', 'Farmer', 'N/A', '2019-11-30 03:23:38', '2019-11-30 03:23:38'),
(1575105868, 'Md. Nurul Islam', 'nahid4098rana@gmail.com', '$2y$10$rqJHDBDdVmeBfp.TN1RByOrHlw5qr9A3IN9.cfIvEy9LRZSUn3e5y', '01728100512', 'Male', 'Business', '10000', '2019-11-30 03:24:28', '2019-11-30 03:24:28'),
(1575105903, 'md.rafiqul islam', 'rafuqul@gmail.com', '$2y$10$nkP1kC4K4edq7nrD1sIlcebfFl/Bgm.8FZnYFhLm03IVpfOzdhMha', '01751255630', 'Male', 'day labour', '4000', '2019-11-30 03:25:03', '2019-11-30 03:25:03'),
(1575105914, 'bishonath borman', 'bishonath gamil.com', '$2y$10$7qWL7x1NQeAX9dsdpTR9W..NP0h/StNOJM4bAHOYMQ8.qJpML8dvq', '01751383095', 'Male', 'Farmare', '3000', '2019-11-30 03:25:14', '2019-11-30 03:25:14'),
(1575106083, 'Md.Abdul Mannan', 'rokibulislam2641@gmail.com', '$2y$10$3hVHgQIugBz.rLd//pj4GeuZgf3vVJKAJiQht2mJrw8fbZgOFAUsO', '0174979476', 'Male', 'Farmer', '5000', '2019-11-30 03:28:03', '2019-11-30 03:28:03'),
(1575106134, 'Md. Abdul Basid', 'abdulbasid@gmail.com', '$2y$10$DqZOtxeVuz35XCijPgSPCeTpNJY3eMzoUFBSxdsl6Tylskp/i/KsS', '01820869326', 'Male', 'N/A', 'N/A', '2019-11-30 03:28:54', '2019-11-30 03:28:54'),
(1575106172, 'Md:Kamal', 'parvase@gmail.com', '$2y$10$TsQybgn4hTZBN8V4/k1tLO8d0muzK0kQLVZUCqErPzpDps/dbA7Z6', '01648227575', 'Male', 'N/A', 'N/A', '2019-11-30 03:29:32', '2019-11-30 03:29:32'),
(1575106230, 'Kartik Kumar', 'Kartik@gmail.com', '$2y$10$ynz/U5ceqW4MyiXcDLB2o.KCAJGdnXJGOo/Uy0ucuKQ3V.Fd0O/9u', '01758498733', 'Male', 'Farmar', '6000', '2019-11-30 03:30:31', '2019-11-30 03:30:31'),
(1575106370, 'SwapanChandra', 'Swapan@gmail.com', '$2y$10$NfY1IdG/jGDskSkYZoL3yOpIY5VVpd3hmcqFy3C/JjPB1pHD5gg7e', '01736895342', 'Female', 'Farmer', 'N/A', '2019-11-30 03:32:50', '2019-11-30 03:32:50'),
(1575106650, 'Md. Ikramul Haque', 'ikramul@gmail.com', '$2y$10$Os.EkS/PEHGroZkUYOXWiuUmbbQielhFJGqb8gG8FaDLMWaMazoAi', '01761681416', 'Male', 'N/A', 'N/A', '2019-11-30 03:37:30', '2019-11-30 03:37:30'),
(1575106799, 'md.azizul talukder', 'azizul@gmail.com', '$2y$10$xvnAkwWIPDbquCbye5aGh.XyNBoMJGx8nyc1tV3CblyGxW06b9M6y', '01741049278', 'Male', 'business man', '8000', '2019-11-30 03:39:59', '2019-11-30 03:39:59'),
(1575106801, 'Md.Saidur', 'Saidur@gmail.com', '$2y$10$IG.uq7rXI7okYZ3CCaK68.t58iALz6oZSVLWEfeH5PZ9hdFv22S1W', '01858306416', 'Male', 'Farmer', 'N/A', '2019-11-30 03:40:01', '2019-11-30 03:40:01'),
(1575107292, 'Md. Nannu Mia', 'Shihab@gmail.com', '$2y$10$7VrlNlTL3x9ij38e5R/Oz.qm4NPZ0HamDleupuiFOBTk1eNIa.Lse', '01752857973', 'Male', 'Farmer', 'N/A', '2019-11-30 03:48:12', '2019-11-30 03:54:37'),
(1575107406, 'Abdul-Khalek-shek', 'abdul@gmail.com', '$2y$10$cbPtbxmSKEu7VPwWdwcbGuLEw857vlugrV636rpVlne7gNswl.wRa', '01775743148', 'Male', 'N/A', 'N/A', '2019-11-30 03:50:06', '2019-11-30 03:50:06'),
(1575107575, 'Md. Abdullah Al Hadi', 'No', '$2y$10$B8Mey2KAOWO5QmoF1kz0ru7nr3vZ5Gr.wtPL9GYXKT5zl.78R/83K', '01703554430', 'Male', 'Farmer', '50000', '2019-11-30 03:52:55', '2019-11-30 03:52:55'),
(1575107598, 'belal hossain', 'belal@gmail.com', '$2y$10$QCYzz4a7ZZYf6VNGtDBRL.TUsHcyddHJxUKH3I6BBIWeDL2fBuuYi', '01305048758', 'Male', 'farmer', '5000', '2019-11-30 03:53:18', '2019-11-30 03:53:18'),
(1575107602, 'Imam Hosen', 'Imam@gmail.com', '$2y$10$xAeEdezc.jX74EqGagj0TO2z5NTgtkWiPGC962ZX8lhPAHHzXVmZG', '01723574016', 'Female', 'Farmar', '2500', '2019-11-30 03:53:22', '2019-11-30 03:53:22'),
(1575107671, 'Md. Zillur Rahman', 'zillurrahman@gmail.com', '$2y$10$LFhfSa/9VKNG1PghedUwPuJoruoFC1iE3dljJPP3sJjjEZd9UJ7/e', '01779243469', 'Male', 'N/A', 'N/A', '2019-11-30 03:54:31', '2019-11-30 03:54:31'),
(1575107827, 'Abdul Khaleque', 'Abdul Khaleque@gmail.com', '$2y$10$5DBFNY7VNke54u3w0M422OxbMAOCWht8TjpNU3a6Tqgehcyy1b8Om', '01728248172', 'Male', 'Farmer', 'N/A', '2019-11-30 03:57:07', '2019-11-30 03:57:07'),
(1575108067, 'Md. Sadequl Islam', 'sadequl@gmail.com', '$2y$10$elcCerwAFlk95R31kBvORu8l43zzUx.gu0k8VX6Achm823lPBgu9a', '01772440074', 'Male', 'N/A', 'N/A', '2019-11-30 04:01:07', '2019-11-30 04:01:07'),
(1575108129, 'Md. Mahabubur Rahman', 'Md. Mahabubur Rahman@gmail.com', '$2y$10$DZJx7nJCrysdDQ0Asz3z4umBtxz8P0a8S9WAfIWGXGMcnyzc9aVmq', '0192153050', 'Male', 'Farmer', 'N/A', '2019-11-30 04:02:09', '2019-11-30 04:02:09'),
(1575108453, 'Md. Abdur Roshid', 'Md. Abdur Roshid@gmail.com', '$2y$10$5M8fwJg1DYPnLc5lXBlwheo9/OEbz6WlDN6QGKEAxYEyT0.lhkT5y', '01740967083', 'Male', 'Farmer', 'N/A', '2019-11-30 04:07:33', '2019-11-30 04:07:33'),
(1575108480, 'Rojob Molla', 'rojob@gmail.com', '$2y$10$TIZ6R/G37BSyyCp7MTLj4OTQPiKeRmIfOnQF7DgC.i5M7STeMn4eW', '01795741622', 'Male', 'N/A', 'N/A', '2019-11-30 04:08:00', '2019-11-30 04:08:00'),
(1575108692, 'Md. Rakibul Islam', 'Md. Rakibul Islam@gmail.com', '$2y$10$HkiUA/ShsgmyHZzc7WLd.u7zDncdlTR0y4ScDsX3anmGkw7z0Ne0K', '01820520042', 'Male', 'Farmer', 'N/A', '2019-11-30 04:11:32', '2019-11-30 04:11:32'),
(1575109118, 'Hasan Hamidur Rahman', 'hasan@gmail.com', '$2y$10$wdnPl3MKMZgY7FIhbqk1f.uGZaFyKGsgBXALJ1D0DBFEWf2sDH6fa', '01711578307', 'Male', 'N/A', 'N/A', '2019-11-30 04:18:38', '2019-11-30 04:18:38'),
(1575109274, 'Abdul Lotif Khan', 'Abdul Lotif Khan@gmail.com', '$2y$10$EJJIZko8o7crHYKEqm3uCeaWETPlV.iThoxLfy.cXxPuvQjDCeSQy', '01310843347', 'Male', 'Farmer', 'N/A', '2019-11-30 04:21:14', '2019-11-30 04:21:14'),
(1575109554, 'Md. Bellal Hossain', 'Hossain@gmail.com', '$2y$10$suTSqtbhpDuGZB0EIxq7teGFOl8hBOq0yzdvyIwuLX3fY1KfejICG', '01773351333', 'Male', 'Farmer', 'N/A', '2019-11-30 04:25:54', '2019-11-30 04:25:54'),
(1575110089, 'Abdul-Khalek-shek', 'abdulkhalakshek@gmail.com', '$2y$10$zh5JvXpBxoJ7ItFl6aDgLupTnXKwxy66r9.RPCd3HfLUw77BCkTV.', '01757007563', 'Male', 'N/A', 'N/A', '2019-11-30 04:34:49', '2019-11-30 04:34:49'),
(1575110101, 'Md.Sha Alam', 'Md.Sha Alam@gmail.com', '$2y$10$w4YlxiwMQS9R9SXCxTYoCOxlHUY3.ae5smf4PK73RgVvlT8vIjKIO', '01705462182', 'Male', 'Farmer', 'N/A', '2019-11-30 04:35:01', '2019-11-30 04:35:01'),
(1575110209, 'Abdul-Khalek-shek', 'abdukhalek@gmail.com', '$2y$10$F/qUrbQhrLNV3jDPAxV/ze0I2YQBcTGg3aX29DAoux6wQZ0oaKFsC', '01757007563', 'Male', 'N/A', 'N/A', '2019-11-30 04:36:49', '2019-11-30 04:36:49'),
(1575110246, 'Md Abul Kalam Ajad', 'AbulKalamAjad@gmail.com', '$2y$10$M4mspPMKP.Gz0ery0KUFlOkQDIX4533rHA6ZDzVy1fXv2KrehLyTK', '01761294420', 'Male', 'N/A', 'N/A', '2019-11-30 04:37:26', '2019-11-30 04:37:26'),
(1575110349, 'Md. Harun Or Rashid', 'harun@gmail.com', '$2y$10$W9faaWctC3XbJ79rsExAte3M.PU.itaLf0fbO18.JCX5c6lWNoWTC', '01738139133', 'Male', 'N/A', 'N/A', '2019-11-30 04:39:09', '2019-11-30 04:39:09'),
(1575110366, 'Md. NAJRUL iSLAM', 'Md. NAJRUL iSLAM@GMAIL.COM', '$2y$10$NaTI/oTK43i6mtZBG02hbeit9.TH0EFUS3/hbcvJLjW1rLpf2E4p2', '01730675069', 'Male', 'Farmer', 'N/A', '2019-11-30 04:39:26', '2019-11-30 04:39:26'),
(1575110562, 'md.sofiqul islam', 'sofiqul@gmail.com', '$2y$10$R33LvoVo7SdR/HAUK2ACLeoyQKdbMQvivMnXzZO1fEzJMIHy0M0yy', '01784015893', 'Male', 'salesman', '8000', '2019-11-30 04:42:42', '2019-11-30 04:42:42'),
(1575110575, 'Alamgir Hossain', 'Alamgir Hossain@gmail.com', '$2y$10$KuEfq7ufFsqFDVMIlvUDXuS2gaTpeu9yJ76hlZpEFw24kEFSyB7sC', '01785843567', 'Male', 'Farmer', 'N/A', '2019-11-30 04:42:55', '2019-11-30 04:42:55'),
(1575110801, 'Ensan Ali', 'ensan@gmail.com', '$2y$10$2SVxEdsCjSMIcv0gjADs8.QtjJFLcz6VcnEau.N.S.1Itb3W81GVq', '01741640809', 'Male', 'N/A', 'N/A', '2019-11-30 04:46:42', '2019-11-30 04:46:42'),
(1575111055, 'Md.Rofikul Islam', 'RofikulIslam@gmail.com', '$2y$10$64QwfQ6pB9kuzttNCx0qEuvYbVcpitbkr28hy8XKkIAH6QEmgeBQa', '01732082406', 'Female', 'Farmar', 'N/A', '2019-11-30 04:50:55', '2019-11-30 05:18:52'),
(1575111068, 'md.shofiqul islam', 'shofiqul@gmail.com', '$2y$10$nQzTB90y24ubLdKdcq9nweeqhIy/KpscQZnE2sJ/.Ie2PYrqNtPNm', '01784015893', 'Male', 'salesman', '8000', '2019-11-30 04:51:08', '2019-11-30 04:51:08'),
(1575111154, 'Md. Abdul Azij', 'abdulazij@gmail.com', '$2y$10$UQRiGWV4c.8pKjA0qq/ac.pqJY7QvfNW5.02XzJRAqazHK9CKIsNe', '01705263886', 'Male', 'N/A', '50000', '2019-11-30 04:52:34', '2019-11-30 04:52:34'),
(1575111273, 'Rahmatul bari', 'rahmatul@gmail.com', '$2y$10$8Gp88U8TkDTuS0XRiQ3RRu1q.CSupjvEUwhbxzXORokkpH1qqzda2', '01792823061', 'Male', 'N/A', 'N/A', '2019-11-30 04:54:33', '2019-11-30 04:54:33'),
(1575111297, 'Ujjal Talukder', 'ujjal@gmail.com', '$2y$10$qcoo/y4oII.QW6jMrhnPjOgHqXMDoIEMH1JvLoe.akOU8RhCRGkV.', '017905777537', 'Male', 'N/A', 'N/A', '2019-11-30 04:54:57', '2019-11-30 04:54:57'),
(1575111362, 'Md.Osman Goni', 'OsmanGoni@gmail.com', '$2y$10$OJqcB2X2GPq8fcRaUFOHveXbtmckR1XvdhHsJDaR/noo0DhmlhV5i', '01777026472', 'Male', 'N/A', '20', '2019-11-30 04:56:03', '2019-11-30 04:56:03'),
(1575111397, 'Md.Abdul Mojid', 'abdulmojid@gmail.com', '$2y$10$nkGSM9TOkF.T4OKb9tDQUu4ORZasemKUjlrSPp78j5uXrE9PnixM6', '01705823981', 'Male', 'Business', '10000', '2019-11-30 04:56:37', '2019-11-30 04:56:37'),
(1575111399, 'Md Matin Sardar', 'MatinSardar@gmail.com', '$2y$10$KJBQdX/Ht3q0NgnZPxtq2.3bpaZo1K/C32J7I4j04YPaLInlUV3/C', '01724384385', 'Male', 'N/A', 'N/A', '2019-11-30 04:56:39', '2019-11-30 04:56:39'),
(1575111561, 'Md. Abu jafor', 'Abujaford@gmail.com', '$2y$10$mfRzMxdDZauQaWru.BLQqe2QjYEuRLxR6RadUZ2KzgRrNV6KDXhK2', '01708019681', 'Male', 'N/A', 'N/A', '2019-11-30 04:59:21', '2019-11-30 05:02:00'),
(1575111756, 'Nazrul Islam', 'nazrul@gmail.com', '$2y$10$J1hkIJZlYBU3AIHeRxs67.FaT7fnaM9nreuoHiQg2ItnPZw3/2LPi', '01821616843', 'Male', 'N/A', 'N/A', '2019-11-30 05:02:36', '2019-11-30 05:02:36'),
(1575111787, 'shahidul islam', 'shahidulislam@gamil.com', '$2y$10$oO69h2kKQoa7xVHYoaA8EOY1WEPjanrU.hrHq1JIDL2kauSiLF0HK', '01714929062', 'Male', 'N/A', 'N/A', '2019-11-30 05:03:07', '2019-11-30 05:03:07'),
(1575111857, 'Md. Amzad Hossain', 'amzad@gmail.com', '$2y$10$3R1Hux01uVExEcef5h1AVe/auyASYSRqXbt5B5zz2EsUCR4NfWCZ6', '01712438025', 'Male', 'N/A', 'N/A', '2019-11-30 05:04:17', '2019-11-30 05:04:17'),
(1575112666, 'Azahar Ali', 'AzaharAli@gmail.com', '$2y$10$VT.yPEMXFRMzDLyAQz7A7eCcF/yfZzfXRZn3DFNoCzViTfKaTDNbK', '01950812337', 'Male', 'N/A', 'N/A', '2019-11-30 05:17:46', '2019-11-30 05:17:46'),
(1575112725, 'md.faruk hossain', 'farukhossain@gamil.com', '$2y$10$3X4reCOEQp.VsKN9FWDrCeJh0yfa2ONgYRS/3Q2WGxmwA0goYvQ7e', '01725506219', 'Male', 'N/A', 'N/A', '2019-11-30 05:18:45', '2019-11-30 05:18:45'),
(1575112824, 'Md Aminur Islam', 'AminurIslam@gmail.com', '$2y$10$R0lefOcAq0NQe/p1ZBfHCOxsflI9uNl3CpcHqWeNt4bRkN5z5o6aC', '01764716946', 'Male', 'N/A', 'N/A', '2019-11-30 05:20:24', '2019-11-30 05:20:24'),
(1575112849, 'Md.Ashadul Islam', 'ashadurislam@gmaile.com', '$2y$10$BCVrTpXBaLfizU/7Yi6kReC16Oqm5H9l0NDL9A5NUIkGafzXNdhNS', '01703202067', 'Male', 'N/A', '50000', '2019-11-30 05:20:49', '2019-11-30 05:20:49'),
(1575113247, 'Sre Sunil Chandra Mondol', 'SunilChandraMondol@gmail.com', '$2y$10$ncWEYisAMvD.L.612XVYEuOXCgZ7c1iVemcg8SWaqb1W41ge.qNfK', '01733438004', 'Male', 'N/A', 'N/A', '2019-11-30 05:27:27', '2019-11-30 05:27:27'),
(1575113367, 'Md. Abdur Rahman', 'AbdurRahman@gmail.com', '$2y$10$8KTKnJv5C68iC2TvzZH57OVyBlvrwINgNFMmZwFgWs.c6GICtwLlu', '01931233320', 'Male', 'N/A', 'N/A', '2019-11-30 05:29:27', '2019-11-30 05:29:27'),
(1575113503, 'aroare rohoman', 'aroarerohoman@gamil.com', '$2y$10$gwxXQAsHiI3UWSzc6KDoPunKmN3hrJI91jhBUT1nmSRgCnKTfySey', '01773804474', 'Male', 'N/A', 'N/A', '2019-11-30 05:31:43', '2019-11-30 05:31:43'),
(1575173374, 'Md:Abdul Khalek', 'abdul123@gmail.com', '$2y$10$nmyVf7SMk5cBYh957MXFVOGLc/9gaNnquVx0d2sM9lkpeqi79ewTi', '01795313148', 'Male', 'N/A', 'N/A', '2019-11-30 22:09:34', '2019-11-30 22:09:34'),
(1575173680, 'Md. Samsul Islam', 'samsul@gmail.com', '$2y$10$/S.0NheKE.SLUgxNjVMrzOvhqWNBEKNoZeBjI1hhBdTiA3nmPWZqu', '01734956227', 'Male', 'N/A', 'N/A', '2019-11-30 22:14:40', '2019-11-30 22:14:40'),
(1575173785, 'Md:Abdul Lotif Ahamed', 'mdabdullotifahamed@gmail.com', '$2y$10$bgWJjXpVSTrkhsaecQqm3OjyvqzLGuPnES9Ued.LDx8mc6trUkYsG', '01711983636', 'Male', 'N/A', 'N/A', '2019-11-30 22:16:25', '2019-11-30 22:16:25'),
(1575174132, 'Antaj Ali', 'antaj@gmail.com', '$2y$10$Q81/BFJ5qu/KXFvSC0edwepq2ztUmWaN99MTFwUthOcxtsNrUvY3W', '01761574163', 'Male', 'N/A', 'N/A', '2019-11-30 22:22:12', '2019-11-30 22:22:12'),
(1575174301, 'Md:Saju Mia', 'mdsajumia@gmail.com', '$2y$10$AXQ0ajWMGzaewri2N2rHKuQDZgv6DGMjL.ktiFdndXJyUTS2RRHIy', '01760037484', 'Male', 'N/A', 'N/A', '2019-11-30 22:25:01', '2019-11-30 22:25:01'),
(1575174436, 'Md. Alamgir Hossin', 'alamgir@gmail.com', '$2y$10$CpOnOYxQufY.vQGjycEnde6HaO7FstN.baIc.kPFCeg0brvQ4rzMe', '01719454789', 'Male', 'N/A', 'N/A', '2019-11-30 22:27:16', '2019-11-30 22:27:16'),
(1575174663, 'Shofiqul Islam', 'shofiqulislam@gmail.com', '$2y$10$4ZF4VYMijlGV8BOiQpbjIeR4cOrI1vpRqBAXGfHsrezJkLFgx4QzS', '01992363652', 'Male', 'N/A', 'N/A', '2019-11-30 22:31:03', '2019-11-30 22:31:03'),
(1575174756, 'Abdur Rashid', 'rashid@gmail.com', '$2y$10$7JHRJIti2SXdW5prbOAiXegCAYwTFltmU1v3g.u6fJnuRnh44mNIG', '01724556012', 'Male', 'N/A', 'N/A', '2019-11-30 22:32:36', '2019-11-30 22:32:36'),
(1575175271, 'Nazrul Islam', 'nazrulislam123@gmail.com', '$2y$10$Z6PewaAK79IG6DQ6pk7GMuy8YSU23xMZzB5VMS3n7FO0AtCyJcf5C', '01821616843', 'Male', 'N/A', 'N/A', '2019-11-30 22:41:11', '2019-11-30 22:41:11'),
(1575175346, 'Md. Nur Alam', 'nuralam@gmail.com', '$2y$10$dxfRpyHKblUhWYCSyLUtwe7juzboGLavHY86qARHvmuD2zMm3sw5G', '01748705108', 'Male', 'N/A', 'N/A', '2019-11-30 22:42:26', '2019-11-30 22:42:26'),
(1575175637, 'Md:Mohsin Ali', 'mdmohsinali@gmail.com', '$2y$10$rd5gG/FP3IHqhlL8N6NXp.Vy0t.Znmoc8s90gdHjt/CNjPMOjGFme', '01781932354', 'Male', 'N/A', 'N/A', '2019-11-30 22:47:17', '2019-11-30 22:47:17'),
(1575175654, 'Azizaer Rahman', 'azizaer@gmail.com', '$2y$10$KA9zoEeFkgvYMDq/anqKnOs51NF2PdpUPe.X.OqaRx0aLSr1SEaR6', '01758987786', 'Male', 'N/A', 'N/A', '2019-11-30 22:47:34', '2019-11-30 22:47:34'),
(1575175938, 'Md. Bazlur Rashid', 'bazlur@gmail.com', '$2y$10$mOI7Ojr126CWiKvHkwzbLeRsJKIrqEhh/7vjOr2WJPfUxFLHA.0zC', '01746907732', 'Male', 'N/A', 'N/A', '2019-11-30 22:52:18', '2019-11-30 22:52:18'),
(1575176207, 'Md. Chan Mia', 'chanmia@gmail.com', '$2y$10$rc0bVhKbAkOSjrWioHAAd.BhgfkDYGzoqSYoY4mGl/uu7vyFz.0Ty', '01993392808', 'Male', 'N/A', 'N/A', '2019-11-30 22:56:47', '2019-11-30 22:56:47'),
(1575177835, 'Md. Kamal parvej', 'kamal@gmail.com', '$2y$10$QcEwO9f0MogtqTqANf3e1e3zEj1O9AFuGnkYCuOsVvaDqWWRNxlTK', '01778359160', 'Male', 'N/A', 'N/A', '2019-11-30 23:23:55', '2019-11-30 23:23:55'),
(1575178128, 'MD.Abdul Hakim', 'AbdulHakim@gmail.com', '$2y$10$ZN4Ztcl21lYM0EG1Sf7c8./iTxQZlQ0Az7ux4FVOdkMUDJrr3L9em', '01714513949', 'Male', 'N/A', 'N/A', '2019-11-30 23:28:48', '2019-11-30 23:28:48'),
(1575178328, 'Arid Hossain', 'AridHossain@gmail.com', '$2y$10$DdhqPOXzZesBxA927UT3uecETnAwUl7VrEdfVCC.zmvyCL3AOwAGW', '01773202306', 'Male', 'N/A', 'N/A', '2019-11-30 23:32:08', '2019-11-30 23:32:08'),
(1575178332, 'Md. Solayman', 'solayman@gmailcom', '$2y$10$Pr0v2FwfJZSSNw.o7BhFROmYFSGAssvZMMzVmSyQmb937Y2ExHqha', '01730824013', 'Female', 'Farmer', '2000', '2019-11-30 23:32:12', '2019-11-30 23:46:17'),
(1575178337, 'MD. SAROWAR HOSSAIN', 'sarowarhossain@gmail.com', '$2y$10$DmtoZjHd/OzLTs9MZHNekeTtAMRz44Lp4.wiljhFlVOW9oh6Alzpy', '01764992768', 'Female', 'Farmer', '2000', '2019-11-30 23:32:17', '2019-11-30 23:32:17'),
(1575178416, 'Md: Jahangir alam', 'Jahangiralam@gamil.com', '$2y$10$7riFuluIbWs7x60EbQfi5OPaYq1fxhawA4bSoUAOxcVqzddq1eEHK', '01725856250', 'Male', 'N/A', 'N/A', '2019-11-30 23:33:36', '2019-11-30 23:33:36'),
(1575178819, 'Md. Abdus Sobahan Mondol', 'abdussobahan@gmail.com', '$2y$10$yZCD0eFU6EqXWhHnIckgcOwvgF.tIzAeOSA/R.gRNa8ebkh9vBtLS', '01920405602', 'Male', 'Employee', '5000', '2019-11-30 23:40:19', '2019-11-30 23:40:19'),
(1575179427, 'Md. Amzad Hossain', 'amzadhossain@gmail.com', '$2y$10$Yer.O9BDaw367LB9wM3g4.L0C75JIdNvaLgp5RqzJI6TH9vf/0MuK', '01723320575', 'Male', 'N/A', 'N/A', '2019-11-30 23:50:27', '2019-11-30 23:50:27'),
(1575179613, 'Md.Saiful Islam', 'Saiful@gmail.com', '$2y$10$Z2uCD9ShSu7U8m0R4vgeNe0zxPlS/O4mO/nrimD7G5dAlRoOPZQZm', '01777903567', 'Male', 'N/A', '2500', '2019-11-30 23:53:33', '2019-11-30 23:53:33'),
(1575180015, 'md badsha miah', 'mdbadshamiah@gmail.com', '$2y$10$/X1h4E2d4lnqkN4BZ9ftzOjn9Y9PYlpeWsKG8fDK.jN3ERn/UYIMu', '01753058052', 'Male', 'N\\A', 'N\\A', '2019-12-01 00:00:15', '2019-12-01 00:00:15'),
(1575180041, 'Md. Farhad Hossain', 'mdfarhadhossain05@gmail.com', '$2y$10$PNoctitQKsyNdbtWGLFy9.kncIv0pNNfRFPVZg9zCCFWkrXs9R5bK', '01756422805', 'Male', 'N/A', 'N/A', '2019-12-01 00:00:41', '2019-12-01 03:40:01'),
(1575180088, 'Md.Ashraful Alom', 'ashrafulalom@gmail.com', '$2y$10$7fNtOhe8FdEzHw5hvKwGreUcc10A8rDUyVTFR0/Oe/TOI.y.x3xK.', '01737332448', 'Male', 'N/A', '15000', '2019-12-01 00:01:28', '2019-12-01 00:01:28'),
(1575180129, 'Abdul Aziz', 'abdulaziz@gmail.com', '$2y$10$iglUhXRtIVQdShKXcGT55u62iX9AxPwZ9O2EKWjDEnLIAzf.UR7v.', '01745579212', 'Male', 'N/A', 'N/A', '2019-12-01 00:02:09', '2019-12-01 00:02:09'),
(1575180146, 'Md. Jahangir Alom', 'jahangir@gamil.com', '$2y$10$FFeWUHdKA28hdbNyrghjmOKw/Fyxvdg/mAdaIWio9.omqGnmPMDYe', '01722542648', 'Male', 'Farmer', '2000', '2019-12-01 00:02:26', '2019-12-01 00:02:26'),
(1575180276, 'Md.Shihab Hosan', 'ShihabHosan@gmail.com', '$2y$10$e.ytbdW/gtWg4Oi44L0TleNCZfIJft9Z5bbOsGfDskyMAmQfpCshK', '01777471377', 'Male', 'Businessman', '2500', '2019-12-01 00:04:36', '2019-12-01 00:04:36'),
(1575180316, 'MD. Abu Taher', 'taher@gmail.com', '$2y$10$ENcULdIVcwMSO0ue3XiSVuhhEBJ40Y67BVJp6aKs.klLe0BNsxO9C', '01650104868', 'Female', 'Farmer', '4000', '2019-12-01 00:05:16', '2019-12-01 00:05:16'),
(1575180321, 'md:shahria hosen', 'shahriahosen@gamil.com', '$2y$10$0Hqf5HNaAy/Hxo4m.JTKeOCmBxwTWKAx6fb4gv0VveYyuj6Ogi50.', '01920405602', 'Male', 'N/A', 'N/A', '2019-12-01 00:05:21', '2019-12-01 00:05:21'),
(1575180463, 'MD.Abdul khalek', 'Abdulkhalek@gmail.com', '$2y$10$H5YPIgF/XW1ZeuctEgFkOeD44H3X.l5N8z5T2KmHM96xv2cAKwbFW', '01795313184', 'Male', 'N/A', 'N/A', '2019-12-01 00:07:43', '2019-12-01 00:07:43'),
(1575180516, 'Shaful Hossain', 'ShafulHossain@gmail.com', '$2y$10$rO5JW6dFeltP7yFo8nuVc.noFRcwcrVHiGh8.cg8kP2XVzjNfnYxW', '01758196688', 'Male', 'N/A', 'N/A', '2019-12-01 00:08:36', '2019-12-01 00:08:36'),
(1575180694, 'Md. Bablu', 'bablu123@gmail.com', '$2y$10$QzMJCgAHBRBDyqK00UUm7.IyVBBuVYwvFowoNG3crPImhvxKErxiC', '01737076352', 'Male', 'N/A', 'N/A', '2019-12-01 00:11:34', '2019-12-01 00:11:34'),
(1575180776, 'md.ainur hossain', 'ainur@gmail.com', '$2y$10$Wre.CQf8SAF1eDDhSBXgSeUemiVR1YZc3ZGXTy23tdtI/CHfHalRO', '01760680366', 'Male', 'day labour', '6000', '2019-12-01 00:12:56', '2019-12-01 00:12:56'),
(1575180804, 'Md.Shamser Ali', 'mdshamserali@gmail.com', '$2y$10$LDjyESbYpVmM33ZJ0JV9Se6YaveLuLsUphYNecoANe2MHXaEKaTuq', '01734376179', 'Male', 'Farmer', '7000', '2019-12-01 00:13:24', '2019-12-01 00:13:24'),
(1575180831, 'MD. Abdul Gofur', 'gofur@gmail.com', '$2y$10$rzlBy4dcMs6exZ6T36vpIeYl6LrwxMVlcQoJYL8uxMrqug0QQbef6', '01768822975', 'Male', 'Farmer', '1500', '2019-12-01 00:13:51', '2019-12-01 00:13:51'),
(1575180860, 'Raju Hemrom', 'Raju@gmail.com', '$2y$10$sHCZ.CdVRbzs4IaIPlfH.uGow7NKN1a09AaM.CdvJdjnQbFg.yeXe', '01304605921', 'Male', 'Farmar', '2500', '2019-12-01 00:14:21', '2019-12-01 00:14:21'),
(1575180870, 'Md.Ahshan Habib Sarkar', 'ahshanhabib346@gmail.com', '$2y$10$1/i46X7UJB3xqqWwMxxzAuBTcrSe6sLUGmvtHmnqWMQ/tiq8oriYS', '01782964346', 'Male', 'N/A', '15000', '2019-12-01 00:14:30', '2019-12-01 00:14:30'),
(1575180980, 'Md. Fariudul Islam', 'faridul@gmail.com', '$2y$10$mQOYQqW7kJcrszVwCkJvM.6c6eiaex8NFF.W9yxFAhGw9kDyCeov6', '01744369291', 'Male', 'Farmer', '4000', '2019-12-01 00:16:20', '2019-12-01 00:16:20'),
(1575181102, 'Md.Tajul Islam', 'TajulIslam@gmail.com', '$2y$10$O.Y7Q9Ux6ykFHsGhp2d1aORwzM.obF8QbCHNvD8lbEu.dPCXHntL2', '01737033503', 'Male', 'N/A', 'N/A', '2019-12-01 00:18:22', '2019-12-01 00:18:22'),
(1575181175, 'Md.Monju  Miah', 'MonjuMiah@gmail.com', '$2y$10$s4HBTm7cM4a8MSvMA6ghPeltxyLoT7zamnK7qfqAY92CMJ7VQGCEa', '01774793853', 'Male', 'N/A', 'N/A', '2019-12-01 00:19:35', '2019-12-01 00:19:35'),
(1575181258, 'md:alauddin', 'alauddin@gamil.com', '$2y$10$d174VAKxrc4dUT8Ant4IFecMllOuyW.s3olncJpLwI8S8ZUxO2V0q', '01751494497', 'Male', 'N/A', 'N/A', '2019-12-01 00:20:58', '2019-12-01 00:20:58'),
(1575181499, 'MD.Ashrafuzzaman', 'mdashraf@gmail.com', '$2y$10$9S.U71TraP4RTvfRJdCzZ.zpj1HcpNcnYKgIfVsH9u3zPMYC0q9UW', '01747431489', 'Male', 'Businessman', '10000', '2019-12-01 00:24:59', '2019-12-01 00:24:59'),
(1575181544, 'md.joynal abedin', 'joynal@gmail.com', '$2y$10$T4JTtbbNnSB7hdNsI/dZE.m3rkpT6iHHMjzsQbxn99o8fQiMko866', '01797460473', 'Male', 'farmer', '6000', '2019-12-01 00:25:44', '2019-12-01 00:25:44'),
(1575181669, 'Md. Pares', 'pares123@gmail.com', '$2y$10$zBBF7cvDpt2PwSJEfk8WQOIoIia9kHLqABMunQXiNRLq.o8ZRDj/W', '01915306837', 'Male', 'N/A', 'N/A', '2019-12-01 00:27:49', '2019-12-01 00:27:49'),
(1575181731, 'Md. Masud Rana', 'masudrana@gmail.com', '$2y$10$UUVdi2Xa1LrvdUMvfR3cO.KayM32mZp/ifzv2SfbNZftDlJ3E6lqG', '01750791165', 'Male', 'N/A', 'M/A', '2019-12-01 00:28:51', '2019-12-01 00:28:51'),
(1575181732, 'Md. Zinna Sheikh', 'zinna@gmail.com', '$2y$10$RqH74HzM5bbqngEMU9/mSuNDqO.VGfQdFJApVotHLl5SOsyXMK5eK', '01753245674', 'Female', 'Business man', '5000', '2019-12-01 00:28:52', '2019-12-01 00:28:52'),
(1575181910, 'MD. Angur Mia', 'angur@gmail.com', '$2y$10$Fj6Nnc9jwz0f8wRdSECCLOFawems2hp4PQ1B7XyJgl7R8PGcvi5wW', '01713710829', 'Male', 'Farmer', '1000', '2019-12-01 00:31:50', '2019-12-01 00:31:50'),
(1575182059, 'Md. Rondro Mia ', 'RondroMia@gmail.com', '$2y$10$HcbET4/5dCFFpv.CD.Htp.HfHXqGOCsazV.3sgf7e62UB9q0PEqLK', '01317955804', 'Male', 'N/A', 'N/A', '2019-12-01 00:34:19', '2019-12-01 00:34:19'),
(1575182075, 'md.ferddus', 'ferddus@gmail.com', '$2y$10$8srNwNcW3h2KhxjfmOlJt.jNhABF47iUhNsnV6DlNX2voCppq6x5a', '01795570719', 'Male', 'day labour', '6000', '2019-12-01 00:34:35', '2019-12-01 00:34:35'),
(1575182124, 'Rimon Talukder ', 'RimonTalukder@gmail.com', '$2y$10$GZKWYQlV31UkHl8QSk7wAeXbNiz8vCin3yNkyQodOkaNMnA1x6PN.', '01719330443', 'Male', 'N/A', 'N/A', '2019-12-01 00:35:24', '2019-12-01 00:35:24'),
(1575182133, 'Mojammel Hossain', 'mojammel@gmail.com', '$2y$10$qx0E8UJmvHFT5nC21n/ih.NJ40DY0r/UkMwM8oghHvFwu/Lmi3PKy', '01630493630', 'Male', 'N/A', 'N/A', '2019-12-01 00:35:33', '2019-12-01 00:35:33'),
(1575182148, 'md:julfikar ali', 'julfikarali@gamil.com', '$2y$10$lrG.SpT3jkVR4.KjtPfQreODisaVj1VJqvPG3b2X.K/8ccp0TOv3O', '01737840799', 'Male', 'N/A', 'N/A', '2019-12-01 00:35:48', '2019-12-01 00:35:48'),
(1575182192, 'Shafiqul Islam', 'shafiqulislam@gmail.com', '$2y$10$ARoVCNyKwuSAxeLmaqyQs.SNT1fRgYfXZ0jgCC2j4q2MzyEyDS2km', '01735113585', 'Male', 'N/A', 'N/A', '2019-12-01 00:36:32', '2019-12-01 00:36:32'),
(1575182253, 'Md.Nazrul Islam', 'mdnazrulislam@gmail.com', '$2y$10$cCgXWDahH560Hj5.Yaupmu96KUIyyoVeVHWAZBlgZuf4AmahLMvlS', '01723208444', 'Male', 'N/A', 'N/A', '2019-12-01 00:37:33', '2019-12-01 00:37:33'),
(1575182261, 'Md. Dulal Sheikh', 'dulal@gmail.com', '$2y$10$MTS8yFlVuyfgoYAz/Yf15en/EFlJNpZr55wr1v/aeZ9Oii8LC99fq', '01724018286', 'Male', 'Business man', '7000', '2019-12-01 00:37:41', '2019-12-01 00:37:41'),
(1575182324, 'Harun Muhammad Afjal', 'harunafjal@gmail.com', '$2y$10$oYXSTKkA7rHHM04Q7vsz6OOUbhJJDIGg.LEcMKGeM.kgrFalfilYm', '01710055101', 'Male', 'Government Employe', '17000', '2019-12-01 00:38:44', '2019-12-01 00:38:44'),
(1575182449, 'Md. Tayoub Ali', 'TayoubAli@gmail.com', '$2y$10$7HWZU6pJyzE4bBT.MxawEu8c.v6cBimzVp9uEqfL/YQmIzrTIYXL2', '01778496981', 'Male', 'N/A', 'N/A', '2019-12-01 00:40:49', '2019-12-01 00:40:49'),
(1575182487, 'Md:Yunus Ali', 'mdyunusali@gmail.com', '$2y$10$DRxgTt1I4w9Uy.0sJz7ruegfRiGvZRfuFAYoJU9pm6JUI9NniphLO', '01723685449', 'Male', 'N/A', 'N/A', '2019-12-01 00:41:27', '2019-12-01 00:41:27'),
(1575182525, 'Md.Rofiqul Islam', 'Rofiqul@gmail.com', '$2y$10$vq2jUz.XGVZgRtPi45VxWuIUKZLX82DW7Ur9W1ybRtURNeAyJCzi2', '01719790194', 'Male', 'Teacher', '2500', '2019-12-01 00:42:05', '2019-12-01 00:42:05'),
(1575182597, 'Md. Aminul Huq', 'aminul.huque60@bb.org.bd', '$2y$10$BuLmF96FYr2Xq5sSEp9aze7yjqEYELbZUxp5/xl98uHkOz340agWK', '01712276556', 'Male', 'Banker', '30000', '2019-12-01 00:43:17', '2019-12-01 00:52:01'),
(1575182801, 'shahidur Rahaman Zoarder', 'shahidur@gmail.com', '$2y$10$e7KvZU3Kyk9pwOY8erXHBOTlTNn4G24/yzqDJHENJ/ohjpy3TvLIO', '01710632846', 'Male', 'N/A', 'N/A', '2019-12-01 00:46:41', '2019-12-01 00:46:41'),
(1575183033, 'Md.Abdul Karim', 'abdulkarim@gmail.com', '$2y$10$SYXsdf28dYvhgHSOoJGoNuDuq.PUTrPGinJuYwS9F8o0FzscJ9A/a', '01783806700', 'Male', 'Teacher', '25000', '2019-12-01 00:50:33', '2019-12-01 00:50:33'),
(1575183672, 'Md.Abdur Razzak', '123abrurrazzak@gmail.com', '$2y$10$0F7ZUkRxktVPlsidzTzGZOsYhxxkGYRpN4I1BCDUogVpDDDT/e7ou', '01713720394', 'Male', 'N/A', 'N/A', '2019-12-01 01:01:12', '2019-12-01 01:01:12'),
(1575193216, 'Md.Mozammel Haque', 'Mozammel@gmail.com', '$2y$10$iAyAJBOz0Y9qd1mZuHwRcufHQ/GsHOGjFtno9x37CZsK0b.sAtQ5u', '01743921217', 'Male', 'Businessman', '4000', '2019-12-01 03:40:16', '2019-12-01 03:40:16'),
(1575193543, 'Md.Kuddus Ali', 'kuddus@gmail.com', '$2y$10$GoJNWyRtVCsB4r6Z4o98tOaCnJ2mJsyrbTASnBbU.nX1Gemkob9B6', '01724674583', 'Male', 'Farmar', '3000', '2019-12-01 03:45:43', '2019-12-01 03:45:43'),
(1575196182, 'Azadur Rahman', 'azadur@gmail.com', '$2y$10$fqlBPgR57kEP1lqpfLGQs.ESWijsWgW8FgjXOiLSiwAUSJMT18TXO', '01733014229', 'Male', 'Farmar', '2500', '2019-12-01 04:29:42', '2019-12-01 04:29:42'),
(1575277546, 'Abu Taleb', 'abutaleb@gmail.com', '$2y$10$/UryyOYqqnS23A9z.cVn6evhMfaK2ceWLsmx5npIx7zEJLeAlXmWS', '01727855569', 'Male', 'N/A', 'N/A', '2019-12-02 03:05:46', '2019-12-02 03:05:46'),
(1575277550, 'Md.Entaj Ali ', 'EntajAli@gmail.com', '$2y$10$9w0391AbXIBdrfW3PxycIuXlVQz4u.BhHccBTTegTzve7R0JmlCry', '01762962630', 'Male', 'N/A', 'N/A', '2019-12-02 03:05:50', '2019-12-02 03:05:50'),
(1575278286, 'Md. Zahangir Alam', 'Zahangiralam@gmail.com', '$2y$10$nNYB6nGnh6y8YlwR.hQvge1bF.21id8VDkZXt99UzBYzFFGSKiH9m', '01761766141', 'Male', 'N/A', 'N/A', '2019-12-02 03:18:06', '2019-12-02 03:18:06'),
(1575453598, 'Md. Kutub Uddin', 'Md.KutubUddin@gmail.com', '$2y$10$ZUhr/x4xiccZWe5n/MGA0.cl9JfF3FE8qcOngAUDpsYKzbP7dYuOq', '01740180310', 'Male', 'Businessman', '5000', '2019-12-04 03:59:58', '2019-12-04 03:59:58'),
(1575453966, 'Md.Hanif Akundo', 'hanif@gmail.com', '$2y$10$NnVNlFPrx/XRqNus/VPrDORrBEoiXw1mUUNT0L.gxjHCZx963.gHW', '01708614638', 'Male', 'Farmar', '4000', '2019-12-04 04:06:06', '2019-12-04 04:06:06'),
(1583725170, 'Insan Ali', '01752567032', '$2y$10$AdmWUYNKo4ZUL.o9BZOG2.bbejWYZJ3f5T6dSSxf0YxFyAkNwo6u2', '01752567032', 'Male', 'Farmer', '5000', '2020-03-08 21:39:30', '2020-03-08 21:39:30'),
(1583825639, 'Md. Saidur Rahman', 'saidurrahman@gmail.com', '$2y$10$6MUZ0Md.6oBl68JP2G03u.MC01otaeCK0A/WU79ANhlTC35m1R96q', '01737709766', 'Male', 'Businessman', '5000', '2020-03-10 01:33:59', '2020-03-10 01:33:59'),
(1583826379, 'Md. Shawkat Islam', 'shawkatislam@gmail.com', '$2y$10$Oi6VggA/gMXO4kvyqPJcquk8jaKQoQlLxyEKUjDkEr/qSa6ziueea', '01968015452', 'Male', 'Farmer', '2000', '2020-03-10 01:46:19', '2020-03-10 01:46:19'),
(1583830023, 'Md. Rana Molla', 'ranamolla@gmail.com', '$2y$10$zgVqTPzmBMj5aVhAO4vNxurNip4MoAygTH5NfIUWj9C7CzCCRUr1i', '01739492705', 'Male', 'Farmer', '4000', '2020-03-10 02:47:03', '2020-03-10 02:47:03'),
(1583830205, 'Md. Minaruzzaman', 'minaruzzaman@gmail.com', '$2y$10$74E.7D2miR7JFSodJdK/Ae52wOL06O5lw7jiBfI9cVzVmgJHwtUPO', '01719735437', 'Male', 'Businessman', '8000', '2020-03-10 02:50:05', '2020-03-10 02:50:05'),
(1583830385, 'Biplob Chandra Sutradhaor', 'biplobchandra@gmail.com', '$2y$10$8krfcMfOnGcbM6YQhg.9luKTl5oPprZxvYOdhggfLZTsH/owWK38O', '01756975645', 'Male', 'Businessman', '4000', '2020-03-10 02:53:05', '2020-03-10 02:53:05'),
(1583830641, 'Md. Abul Hossin', 'abulhossin@gmail.com', '$2y$10$iA0e83MmGvfGkeoLBcDesOGEbEuuIhDYBj4pIylgetp1y4/WbvI8m', '01712839745', 'Male', 'Businessman', '7000', '2020-03-10 02:57:21', '2020-03-10 02:57:21'),
(1583830895, 'Kartik Chandro Saha', 'kartikchandro@gmail.com', '$2y$10$0ymIVVOMrhae9xXBwlSD6OFKeVbA/pySTz7GmOwp4Frv4B/g.byLO', '01774925597', 'Male', 'Worker', '8000', '2020-03-10 03:01:35', '2020-03-10 03:01:35');

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
(1540298658, 'Shahajahanpur', 'Bogra', 'Rajshahi', 'Madla', '2018-10-23 06:44:18', '2018-10-23 06:44:18'),
(1546771758, 'Proranapoile', 'Joypurhat', 'Rajshahi', 'Shyampur', '2019-01-06 04:49:18', '2019-01-06 04:49:18'),
(1575099058, 'Madla', 'Bogura', 'Rajshahi', 'Nondogram', '2019-11-30 01:30:58', '2019-11-30 01:30:58'),
(1575101370, 'Bogura', 'Bogura', 'Rajshahi', 'Lotifpur', '2019-11-30 02:09:30', '2019-11-30 02:09:30'),
(1575102536, 'Madla', 'Bogura', 'Rajshahi', 'Nondogram', '2019-11-30 02:28:56', '2019-11-30 02:28:56'),
(1575105024, 'Narsatpur', 'Bogura', 'Rajshahi', 'Muriall', '2019-11-30 03:10:24', '2019-11-30 03:10:24'),
(1575105231, 'Sherpur', 'Bogura', 'Rajshahi', 'Dublagari', '2019-11-30 03:13:51', '2019-11-30 03:13:51'),
(1575105759, 'Gokul', 'Bogura', 'Rajshahi', 'Gokul', '2019-11-30 03:22:39', '2019-11-30 03:22:39'),
(1575105818, 'Gokul', 'Bogura', 'Rajshahi', 'Bagopara', '2019-11-30 03:23:38', '2019-11-30 03:23:38'),
(1575105868, 'Ayra', 'Bogura', 'Rajshahi', 'Amoin', '2019-11-30 03:24:28', '2019-11-30 03:24:28'),
(1575105903, 'bogura', 'bogura', 'rajshahi', 'baropur', '2019-11-30 03:25:03', '2019-11-30 03:25:03'),
(1575105914, 'Belkuri', 'Alidowna', 'Rajshahi', 'Alidowna', '2019-11-30 03:25:14', '2019-11-30 03:25:14'),
(1575106083, 'Perihat', 'Bogura', 'Rajshahi', 'Shurimara', '2019-11-30 03:28:03', '2019-11-30 03:28:03'),
(1575106134, 'Pollimongol Hat', 'Bogura', 'Rajshahi', 'calitabari', '2019-11-30 03:28:54', '2019-11-30 03:28:54'),
(1575106172, 'Shapahar', 'Naogaon', 'Rajshahi', 'Vat karaa', '2019-11-30 03:29:32', '2019-11-30 03:29:32'),
(1575106231, 'Tushbhandar', 'Lalmonirhat', 'Rangpur', 'Gegra', '2019-11-30 03:30:31', '2019-11-30 03:30:31'),
(1575106370, 'Kundarhat', 'Bogura', 'Rajshahi', 'Singjani', '2019-11-30 03:32:50', '2019-11-30 03:32:50'),
(1575106650, 'Shatibaria', 'Rangpur', 'Rangpur', 'Boromirjapukur', '2019-11-30 03:37:30', '2019-11-30 03:37:30'),
(1575106799, 'chandaicona', 'bogura', 'rajshahi', 'chandaicona', '2019-11-30 03:39:59', '2019-11-30 03:39:59'),
(1575106801, 'Rotonpur', 'Dinajpur', 'Rangpur', 'Vaggir', '2019-11-30 03:40:01', '2019-11-30 03:40:01'),
(1575107292, 'Parihat', 'Bogura', 'Rajshahi', 'Pari', '2019-11-30 03:48:12', '2019-11-30 03:48:12'),
(1575107406, 'Vobanipur', 'Bogura', 'Rajshahi', 'Aminpur', '2019-11-30 03:50:06', '2019-11-30 03:50:06'),
(1575107575, 'Khonjonpur', 'Joypurhat', 'Rajshahi', 'Khonjonpur', '2019-11-30 03:52:55', '2019-11-30 03:52:55'),
(1575107598, 'kantonagor', 'bogura', 'rajshahi', 'kadai', '2019-11-30 03:53:18', '2019-11-30 03:53:18'),
(1575107602, 'Saintmartin', 'Cox\'sBazar', 'Chittagong', 'SaintmartinKona Para', '2019-11-30 03:53:22', '2019-11-30 03:53:22'),
(1575107671, 'orunpur', 'Nougun', 'Rajshahi', 'Hosendanga', '2019-11-30 03:54:31', '2019-11-30 03:54:31'),
(1575107827, 'Khamar Kandi', 'Bogura', 'Rajshahi', 'Fulbari', '2019-11-30 03:57:07', '2019-11-30 03:57:07'),
(1575108067, 'Ashrondo', 'Nougun', 'Rajshahi', 'Moruil', '2019-11-30 04:01:07', '2019-11-30 04:01:07'),
(1575108129, 'Chandaikona', 'Sirajgong', 'Rajshahi', 'Simla Moddopara', '2019-11-30 04:02:09', '2019-11-30 04:02:09'),
(1575108453, 'Shaker Kola', 'Bogura', 'Rajshahi', 'Shaker Kola', '2019-11-30 04:07:33', '2019-11-30 04:07:33'),
(1575108480, 'Sher nogor', 'Sirajgonj', 'Rajshahi', 'MasudPur', '2019-11-30 04:08:00', '2019-11-30 04:08:00'),
(1575108692, 'Adomdighi', 'Bogura', 'Rajshahi', 'Kolabagan', '2019-11-30 04:11:32', '2019-11-30 04:11:32'),
(1575109118, 'Binecapor', 'Bogura', 'Rajshahi', 'Khauni', '2019-11-30 04:18:38', '2019-11-30 04:18:38'),
(1575109274, 'Kalaipara', 'Bogura', 'Rajshahi', 'Kantannagor', '2019-11-30 04:21:14', '2019-11-30 04:21:14'),
(1575109554, 'Alanghi', 'Bogura', 'Rajshahi', 'Haspotol', '2019-11-30 04:25:54', '2019-11-30 04:25:54'),
(1575110089, 'Vobanipur', 'Bogura', 'Rajshahi', 'Aminpur', '2019-11-30 04:34:49', '2019-11-30 04:34:49'),
(1575110101, 'RDA', 'Bogura', 'Rajshahi', 'Jamalpur', '2019-11-30 04:35:01', '2019-11-30 04:35:01'),
(1575110209, 'Vobanipur', 'Bogura', 'Rajshahi', 'Aminpur', '2019-11-30 04:36:49', '2019-11-30 04:36:49'),
(1575110246, 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', '2019-11-30 04:37:26', '2019-11-30 04:37:26'),
(1575110349, 'Nojipur', 'Nougun', 'Rajshahi', 'Nojipur', '2019-11-30 04:39:09', '2019-11-30 04:39:09'),
(1575110366, 'sHERPUR', 'Bogura', 'Rajshahi', 'mATPARA', '2019-11-30 04:39:26', '2019-11-30 04:39:26'),
(1575110562, 'sonka', 'bogura', 'bogura', 'sonka', '2019-11-30 04:42:42', '2019-11-30 04:42:42'),
(1575110575, 'Jamalpur', 'Bogura', 'Rajshahi', 'Jamalpur', '2019-11-30 04:42:55', '2019-11-30 04:42:55'),
(1575110802, 'RDA', 'Bogura', 'Rajshahi', 'Jamalpur', '2019-11-30 04:46:42', '2019-11-30 04:46:42'),
(1575111055, 'Joypurhat', 'akkelpur', 'Rajshahi', 'sricondighi', '2019-11-30 04:50:55', '2019-11-30 05:18:52'),
(1575111068, 'sonka', 'bogura', 'rajshahi', 'sonka', '2019-11-30 04:51:08', '2019-11-30 04:51:08'),
(1575111154, 'Dupchaceya', 'Bogura', 'Bogura', 'Bogura', '2019-11-30 04:52:34', '2019-11-30 04:52:34'),
(1575111273, 'darkipara', 'Bogura', 'Rajshahi', 'darkipara', '2019-11-30 04:54:33', '2019-11-30 04:54:33'),
(1575111297, 'Kollanpur', 'Sirajgonj', 'Rajshahi', 'Kumar Saldai', '2019-11-30 04:54:57', '2019-11-30 04:54:57'),
(1575111363, 'Sherpur', 'Bogura', 'Rajshahi', 'Dublagari', '2019-11-30 04:56:03', '2019-11-30 04:56:03'),
(1575111397, 'Torokpur', 'Kurigram', 'Kurigram', 'Kurigram', '2019-11-30 04:56:37', '2019-11-30 04:56:37'),
(1575111399, 'Noagon', 'Noagon', 'Noagon', 'Noagon', '2019-11-30 04:56:39', '2019-11-30 04:56:39'),
(1575111561, 'Shahajanpur', 'Bogura', 'Rajshahi', 'Majhira', '2019-11-30 04:59:21', '2019-11-30 04:59:21'),
(1575111756, 'Kunder Hat', 'Bogura', 'Rajshahi', 'Teghori', '2019-11-30 05:02:36', '2019-11-30 05:02:36'),
(1575111787, 'shapjram', 'Bogra Sadar', 'Bogra Sadar', 'shapjram', '2019-11-30 05:03:07', '2019-11-30 05:03:07'),
(1575111857, 'Sharpur', 'Bogura', 'Rajshahi', 'Town ccoloni', '2019-11-30 05:04:17', '2019-11-30 05:04:17'),
(1575112666, 'Puranapoil', 'Joypurhat', 'Joypurhat(Shadar)', 'Shyampur', '2019-11-30 05:17:46', '2019-11-30 05:17:46'),
(1575112725, 'polhart', 'sodor', 'denajpur', 'polhart', '2019-11-30 05:18:45', '2019-11-30 05:18:45'),
(1575112824, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-11-30 05:20:24', '2019-11-30 05:20:24'),
(1575112849, 'Bogura', 'Bogura', 'Bogura', 'Bogura', '2019-11-30 05:20:49', '2019-11-30 05:20:49'),
(1575113247, 'Noagon', 'Noagon', 'Noagon', 'Noagon', '2019-11-30 05:27:27', '2019-11-30 05:27:27'),
(1575113367, 'Puranapoil', 'Joypurhat', 'Joypurhat(Shadar)', 'Shyampur', '2019-11-30 05:29:27', '2019-11-30 05:29:27'),
(1575113503, 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', '2019-11-30 05:31:43', '2019-11-30 05:31:43'),
(1575173374, 'Chondon Ghati', 'Sirajgonj', 'Rajshahi', 'Garamasi', '2019-11-30 22:09:34', '2019-11-30 22:09:34'),
(1575173680, 'Kicok', 'Bogura', 'Rajshahi', 'Kicok belai', '2019-11-30 22:14:40', '2019-11-30 22:14:40'),
(1575173785, 'Vatra', 'Bogura', 'Rajshahi', 'Amgacii', '2019-11-30 22:16:25', '2019-11-30 22:16:25'),
(1575174132, 'Belkuri', 'Nougun', 'Rajshahi', 'Malahar', '2019-11-30 22:22:12', '2019-11-30 22:22:12'),
(1575174301, 'Bogura Sodor', 'Bogura', 'Rajshahi', 'ChokSutrapur', '2019-11-30 22:25:01', '2019-11-30 22:25:01'),
(1575174436, 'Madla', 'Bogura', 'Rajshahi', 'Niscintopur', '2019-11-30 22:27:16', '2019-11-30 22:27:16'),
(1575174663, 'Pirgaca', 'Bogura', 'Rajshahi', 'Komolpur(Doyagriya)', '2019-11-30 22:31:03', '2019-11-30 22:31:03'),
(1575174756, 'Majira', 'Bogura', 'Rajshahi', 'Dumor pukur', '2019-11-30 22:32:36', '2019-11-30 22:32:36'),
(1575175271, 'Kunder Hat', 'Bogura', 'Rajshahi', 'Teghori', '2019-11-30 22:41:11', '2019-11-30 22:41:11'),
(1575175346, 'perihat', 'Bogura', 'Rajshahi', 'Ramchondopur', '2019-11-30 22:42:26', '2019-11-30 22:42:26'),
(1575175637, 'Pirgaca', 'Bogura', 'Rajshahi', 'Komolpur(Doyagriya)', '2019-11-30 22:47:17', '2019-11-30 22:47:17'),
(1575175654, 'perihat', 'Bogura', 'Rajshahi', 'Ramchondopur', '2019-11-30 22:47:34', '2019-11-30 22:47:34'),
(1575175938, 'Madla', 'Bogura', 'Rajshahi', 'Sharkul', '2019-11-30 22:52:18', '2019-11-30 22:52:18'),
(1575176207, 'Dulotpur', 'Sirajgonj', 'Rajshahi', 'belkuci', '2019-11-30 22:56:47', '2019-11-30 22:56:47'),
(1575177835, 'Shajjatpur', 'Sirajgonj', 'Rajshahi', 'Dorgahat', '2019-11-30 23:23:55', '2019-11-30 23:23:55'),
(1575178128, 'Adomdigi', 'Adomdigi', 'Rajshahi', 'Dhorpur', '2019-11-30 23:28:48', '2019-11-30 23:28:48'),
(1575178328, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-11-30 23:32:08', '2019-11-30 23:32:08'),
(1575178332, 'Koloni', 'Bogura', 'Rajshahi', 'Koloni', '2019-11-30 23:32:12', '2019-11-30 23:32:12'),
(1575178337, 'sonka', 'Bogura', 'Rajshahi', 'sonka', '2019-11-30 23:32:17', '2019-11-30 23:32:17'),
(1575178416, 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', '2019-11-30 23:33:36', '2019-11-30 23:33:36'),
(1575178819, 'sherpur', 'Bogura', 'Rajshahi', 'dublagary', '2019-11-30 23:40:19', '2019-11-30 23:40:19'),
(1575179427, 'Bollomjhar', 'Gaibandha', 'Rangpur', 'Modhodhanpara', '2019-11-30 23:50:27', '2019-11-30 23:50:27'),
(1575179613, 'Berebari', 'Bogura', 'Rajshahi', 'Berebari', '2019-11-30 23:53:33', '2019-11-30 23:53:33'),
(1575180015, 'shajahanpur', 'bogura', 'rajshahi', 'duruliay', '2019-12-01 00:00:15', '2019-12-01 00:00:15'),
(1575180041, 'Rasulpur', 'Naogaon', 'Rajshahi', 'Gidisha', '2019-12-01 00:00:41', '2019-12-01 00:00:41'),
(1575180088, 'Beshubari', 'Gaibandha', 'Rangpur', 'Satana Balua', '2019-12-01 00:01:28', '2019-12-01 00:01:28'),
(1575180129, 'Mullickpur', 'Naogaon', 'Rajshahi', 'Patiamly', '2019-12-01 00:02:09', '2019-12-01 00:02:09'),
(1575180146, 'Bagbari', 'Bogura', 'Rajshahi', 'small italy', '2019-12-01 00:02:26', '2019-12-01 00:02:26'),
(1575180276, 'Gabtoli', 'Bogura', 'Rajshahi', 'hasnapara', '2019-12-01 00:04:36', '2019-12-01 00:04:36'),
(1575180316, 'Shapahar', 'Noagon', 'Rajshahi', 'Shapahar', '2019-12-01 00:05:16', '2019-12-01 00:05:16'),
(1575180321, 'sharpur', 'sharpur', 'Bogra Sadar', 'sharpur', '2019-12-01 00:05:21', '2019-12-01 00:05:21'),
(1575180463, 'chondati', 'Sirajganj', 'Rajshahi', 'Belkuchi', '2019-12-01 00:07:43', '2019-12-01 00:07:43'),
(1575180516, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-12-01 00:08:36', '2019-12-01 00:08:36'),
(1575180694, 'Domar', 'Nilphamary', 'Rangpur', 'Chikonmati', '2019-12-01 00:11:34', '2019-12-01 00:11:34'),
(1575180776, 'erulia', 'bogura', 'rajshahi', 'bandighi', '2019-12-01 00:12:56', '2019-12-01 00:12:56'),
(1575180804, 'Binodpur', 'Chapainawabgonj', 'Rajshahi', 'Bissawnathpur', '2019-12-01 00:13:24', '2019-12-01 00:13:24'),
(1575180831, 'Poyalgacha', 'Bogura', 'Rajshahi', 'Khatash', '2019-12-01 00:13:51', '2019-12-01 00:13:51'),
(1575180861, 'Daudpur', 'Dinajpur', 'Rangpur', 'Horirampur', '2019-12-01 00:14:21', '2019-12-01 00:14:21'),
(1575180870, 'Bamoile', 'Naogaon', 'Rajshahi', 'Khoraile', '2019-12-01 00:14:30', '2019-12-01 00:14:30'),
(1575180980, 'vullibazar', 'thakurgoan', 'RANGPUR', 'borobaliya', '2019-12-01 00:16:20', '2019-12-01 00:16:20'),
(1575181102, 'Sherpur', 'Bogura', 'Rajshahi', 'Ullipur', '2019-12-01 00:18:22', '2019-12-01 00:18:22'),
(1575181175, 'Gohail', 'Bogura', 'Rajshahi', 'Agra', '2019-12-01 00:19:35', '2019-12-01 00:19:35'),
(1575181258, 'mohondoro', 'hortvanga', 'lalmonerhort', 'hortvanga', '2019-12-01 00:20:58', '2019-12-01 00:20:58'),
(1575181499, 'Bogura', 'Bogura', 'Rajshahi', 'Koloni', '2019-12-01 00:24:59', '2019-12-01 00:24:59'),
(1575181544, 'boalia', 'sirajgonj', 'rajshahi', 'chakcoubila', '2019-12-01 00:25:44', '2019-12-01 00:25:44'),
(1575181669, 'Chamrul', 'Bogura', 'Rajshahi', 'Johal Matai', '2019-12-01 00:27:49', '2019-12-01 00:27:49'),
(1575181731, 'Naruamala', 'Bogura', 'Rajshahi', 'Sagatiya', '2019-12-01 00:28:51', '2019-12-01 00:28:51'),
(1575181732, 'sherpur', 'Bogura', 'Rajshahi', 'mohipur ', '2019-12-01 00:28:52', '2019-12-01 00:28:52'),
(1575181910, 'Gohail', 'Bogura', 'Rajshahi', 'Agra', '2019-12-01 00:31:50', '2019-12-01 00:31:50'),
(1575182059, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-12-01 00:34:19', '2019-12-01 00:34:19'),
(1575182075, 'kahalu', 'bogura', 'rajshahi', 'kalora', '2019-12-01 00:34:35', '2019-12-01 00:34:35'),
(1575182124, 'Kunder', 'Nondigram', 'Rajshahi', 'Vatgram', '2019-12-01 00:35:24', '2019-12-01 00:35:24'),
(1575182133, 'Kunder Hat', 'Bogura', 'Rajshahi', 'VatGram', '2019-12-01 00:35:33', '2019-12-01 00:35:33'),
(1575182148, 'jumarbari', 'jumarbari', 'jgaibandha', 'jumarbari', '2019-12-01 00:35:48', '2019-12-01 00:35:48'),
(1575182192, 'Govindhashi', 'Tangail', 'Dhaka', 'Jigatula', '2019-12-01 00:36:32', '2019-12-01 00:36:32'),
(1575182253, 'Cehadmohut', 'Bogura', 'Rajshahi', 'Borosorolpur', '2019-12-01 00:37:33', '2019-12-01 00:37:33'),
(1575182261, 'kundarhat', 'Bogura', 'Rajshahi', 'vatgram', '2019-12-01 00:37:41', '2019-12-01 00:37:41'),
(1575182324, 'Rahmatpur', 'Gaibandha', 'Rangpur', 'Dhopadanga', '2019-12-01 00:38:44', '2019-12-01 00:38:44'),
(1575182449, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-12-01 00:40:49', '2019-12-01 00:40:49'),
(1575182487, 'BoguraSodor', 'Bogura', 'Rajshahi', 'Fulbari Moddapara', '2019-12-01 00:41:27', '2019-12-01 00:41:27'),
(1575182525, 'Poyalgasah', 'Bogura', 'Rajshahi', 'Shonaidhighe', '2019-12-01 00:42:05', '2019-12-01 00:42:05'),
(1575182597, 'Bogra', 'Shahjahanpur', 'Rajshahi', 'Bogra', '2019-12-01 00:43:17', '2019-12-01 00:52:01'),
(1575182801, 'KantoNogor', 'Bogura', 'Rajshahi', 'Kantannagor', '2019-12-01 00:46:41', '2019-12-01 00:46:41'),
(1575183033, 'shariyakandi', 'Bogura', 'Rajshahi', 'hindukandi', '2019-12-01 00:50:33', '2019-12-01 00:50:33'),
(1575183672, 'Potnitola', 'Naogaon', 'Rajshahi', 'Porbo napalpur', '2019-12-01 01:01:12', '2019-12-01 01:01:12'),
(1575193216, 'Bhawanigonj', 'Rajshahi', 'Rajshahi', 'Paharpur', '2019-12-01 03:40:16', '2019-12-01 03:40:16'),
(1575193543, 'Lohakuchi', 'Lalmonirhat', 'Rangpur', 'Shibram', '2019-12-01 03:45:43', '2019-12-01 03:45:43'),
(1575196182, 'Gohail', 'Bogura', 'Rajshahi', 'Lotagari', '2019-12-01 04:29:42', '2019-12-01 04:29:42'),
(1575277546, 'Namurihat', 'Lalmonirhat', 'Rangpur', 'Namuri', '2019-12-02 03:05:46', '2019-12-02 03:05:46'),
(1575277550, 'Haripur', 'Thakurgaon', 'Rangpur', 'Vhaturia', '2019-12-02 03:05:50', '2019-12-02 03:05:50'),
(1575278286, 'Pirgasha', 'Bogura', 'Rajshahi', 'kamalpur', '2019-12-02 03:18:06', '2019-12-02 03:18:06'),
(1575453598, 'Natuyar Para', 'Kutubpur', 'Shirajgong', 'KHoyagacha', '2019-12-04 03:59:58', '2019-12-04 03:59:58'),
(1575453966, 'Kundarhut', 'Bogura', 'Rajshahi', 'Ailpuniea', '2019-12-04 04:06:06', '2019-12-04 04:06:06'),
(1583725170, 'Eruliya', 'Bogra', 'Bogra', 'Eruliya', '2020-03-08 21:39:30', '2020-03-08 21:39:30'),
(1583825639, 'Gobindagang', 'Gaibandha', 'Rajshahi', 'Pantamara', '2020-03-10 01:33:59', '2020-03-10 01:33:59'),
(1583826379, 'Alompur', 'Kushtia', 'Khulna', 'Baliapara', '2020-03-10 01:46:19', '2020-03-10 01:46:19'),
(1583830023, 'shekherkola', 'Bogura', 'Rajshahi', 'Moshishbathan', '2020-03-10 02:47:03', '2020-03-10 02:47:03'),
(1583830206, 'Gaganpur', 'naogaon', 'Rajshahi', 'Adhuna', '2020-03-10 02:50:06', '2020-03-10 02:50:06'),
(1583830385, 'Madla', 'Bogura', 'Rajshahi', 'Madla', '2020-03-10 02:53:05', '2020-03-10 02:53:05'),
(1583830641, 'Bogura Sadar', 'Bogura', 'Rajshahi', 'Erulia', '2020-03-10 02:57:21', '2020-03-10 02:57:21'),
(1583830895, 'Merihat', 'Gaibandha', 'Rajshahi', 'Kordoma para', '2020-03-10 03:01:35', '2020-03-10 03:01:35');

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
('Sharifbdd@gmail.com', 'aa22b0c8999b3867dec0b0fd9bfac3be6a1d31e51cfc2b0a503a0acfcdd2cc46', '2018-10-21 06:57:36'),
('rabyarabu112@gmail.com', 'f8dc122ecde6f72a35f0b420665c97bdde8db00104b8a3dc48fbace6bab79363', '2018-11-06 06:10:28'),
('jakjafrin28@gmail.com', 'bb42dd3258d77b81a60aead9350341350a5d020d06b484b698d4bf79ef4c90f3', '2018-12-23 04:40:07'),
('tazmilurtmss@gmail.com', '05315738ee2cf922a8e8627de9fe0834db0209b702092bea51c6853b70a2f335', '2019-02-14 08:56:14'),
('muraduzzamanmrd@gmail.com', 'f98f8b4a187058962cd46a8a0692e1c6ad897b31f2961452c8cda6b2f4ac9eb6', '2019-12-04 04:30:13'),
('subrotoa@gmail.com', 'abfee462f2bc40b7b132f338eb3fc3ccdfd64d45fd6e47a8e641fa6d901a1c3f', '2019-12-05 04:48:53'),
('ankurdeybangladesh@gmail.com', '3d1535ec4f2e1b9999cefb3934616ae99850955a17edfbab0328c372bc81dd7b', '2019-12-08 02:24:16'),
('altabnatore1991@gmail.com', 'e10246614fde58b12e7e7d642c0d236ed7472cce7ef09ac3b6ecbc9f3b056c28', '2020-03-10 01:37:27'),
('jubayer.inf@gmail.com', '61f00357d5bc04d0bbce2573bd280c81f4f84a5d9144e7991ac86dd4fdf3db8f', '2020-03-10 01:40:19'),
('Jabbar2910@gmail.com', '870e9ebc572343b17a1d24dc1deea4278d0efbd54659b18b4d4a8511f32b13e9', '2020-03-10 04:31:19'),
('aazom847@gmail.com', '3a8c2ee9365f45261fa4112f52b1b1d0543de630a87a73315a399bb628750413', '2020-03-14 03:34:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_receipt`
--

INSERT INTO `payment_receipt` (`payment_receipt_id`, `receipt_date`, `receipt_by`, `receipt_amount`, `student_roll`, `class`, `created_at`, `updated_at`) VALUES
(1585375784, '2020-03-28', 'Md Jubayer Hossain', '5000', '2010242', 'Sixth Semester', '2020-03-28 06:09:44', '2020-03-28 06:09:44'),
(1585725087, '2020-04-01', 'Md Jubayer Hossain', '470045248', '2010242', 'Sixth Semester', '2020-04-01 07:11:27', '2020-04-01 07:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment_receipt_child`
--

CREATE TABLE `payment_receipt_child` (
  `payment_receipt_child_id` int(11) NOT NULL,
  `payment_receipt_id` varchar(191) NOT NULL,
  `component_id` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_receipt_child`
--

INSERT INTO `payment_receipt_child` (`payment_receipt_child_id`, `payment_receipt_id`, `component_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '1585375784', '1539255451', '500', '2020-03-28 06:09:45', '2020-03-28 06:09:45'),
(2, '1585375784', '1539255467', '500', '2020-03-28 06:09:45', '2020-03-28 06:09:45'),
(3, '1585375784', '1539255743', '4000', '2020-03-28 06:09:45', '2020-03-28 06:09:45'),
(4, '1585725087', '1539255451', '545', '2020-04-01 07:11:27', '2020-04-01 07:11:27'),
(5, '1585725087', '1539255467', '5434', '2020-04-01 07:11:27', '2020-04-01 07:11:27'),
(6, '1585725087', '1539255489', '435435435', '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(7, '1585725087', '1539255506', '5435', '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(8, '1585725087', '1539255552', '534', '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(9, '1585725087', '1539255706', '543', '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(10, '1585725087', '1539255743', '53434', '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(11, '1585725087', '1539255759', '34543543', '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(12, '1585725087', '1539255780', '345', '2020-04-01 07:11:28', '2020-04-01 07:11:28');

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
(76, 'DOWNLOAD', 'DOWNLOAD', 'Content Permission', NULL, NULL),
(77, 'CANTEEN', 'CANTEEN', 'MODULE', NULL, NULL);

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
(1, 41, '2017-10-03 12:01:45', '2017-10-03 12:01:45'),
(1, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(1, 44, '2018-12-01 05:31:13', '2018-12-01 05:31:13'),
(1, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(1, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(1, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(1, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(2, 41, '2017-10-03 12:20:21', '2017-10-03 12:20:21'),
(2, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(2, 44, '2018-12-01 05:31:13', '2018-12-01 05:31:13'),
(2, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(2, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(2, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(2, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(3, 41, '2017-10-03 12:21:45', '2017-10-03 12:21:45'),
(3, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(3, 44, '2018-12-01 05:31:13', '2018-12-01 05:31:13'),
(3, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(3, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(3, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(3, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(4, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(4, 44, '2018-12-01 05:31:13', '2018-12-01 05:31:13'),
(4, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(4, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(4, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(4, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(5, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(5, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(5, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(5, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(6, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(6, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(6, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(6, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(6, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(7, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(7, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(7, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(7, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(7, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(8, 42, '2018-10-11 08:46:32', '2018-10-11 08:46:32'),
(8, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(8, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(8, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(8, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(9, 42, '2018-10-11 07:13:55', '2018-10-11 07:13:55'),
(9, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(9, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(9, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(9, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(10, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(10, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(10, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(10, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(10, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(11, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(11, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(11, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(11, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(11, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(12, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(12, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(12, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(12, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(12, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(13, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(13, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(13, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(13, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(13, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(14, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(14, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(14, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(14, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(14, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(15, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(15, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(15, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(15, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(15, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(16, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(16, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(16, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(16, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(17, 44, '2018-12-01 05:31:13', '2018-12-01 05:31:13'),
(17, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(17, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(17, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(17, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(18, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(18, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(18, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(18, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(19, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(19, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(19, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(19, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(19, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(20, 41, '2019-11-25 01:56:08', '2019-11-25 01:56:08'),
(20, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(20, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(20, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(20, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(21, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(21, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(21, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(21, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(22, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(22, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(22, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(22, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(23, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(23, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(24, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(24, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(25, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(25, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(26, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(26, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(27, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(27, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(27, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(28, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(29, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(29, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(30, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(30, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(31, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(31, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(31, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(31, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(31, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(32, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(32, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(33, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(33, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(33, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(33, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(33, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(33, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(34, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(34, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(34, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(34, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(34, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(35, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(35, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(35, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(35, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(35, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(36, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(36, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(36, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(36, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(36, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(37, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(37, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(37, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(37, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(37, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(38, 41, '2018-10-11 08:44:52', '2018-10-11 08:44:52'),
(38, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(38, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(38, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(38, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(38, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(39, 41, '2018-10-11 08:44:52', '2018-10-11 08:44:52'),
(39, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(39, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(39, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(39, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(39, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(40, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(40, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(40, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(40, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(40, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(41, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(41, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(41, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(41, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(41, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(42, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(42, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(42, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(42, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(42, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(43, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(43, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(43, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(43, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(43, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(44, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(44, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(44, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(44, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(44, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(45, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(45, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(45, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(45, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(45, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(46, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(46, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(46, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(46, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(46, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(47, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(47, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(47, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(47, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(47, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(48, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(48, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(48, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(48, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(48, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(49, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(49, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(49, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(49, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(49, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(50, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(50, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(50, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(50, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(50, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(51, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(51, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(51, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(51, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(51, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(52, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(52, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(52, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(52, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(52, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(53, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(53, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(53, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(53, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(53, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(54, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(54, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(54, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(54, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(54, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(55, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(55, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(55, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(55, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(55, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(56, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(56, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(56, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(56, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(56, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(57, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(57, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(57, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(57, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(57, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(58, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(58, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(58, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(58, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(58, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(59, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(59, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(59, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(59, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(59, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(60, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(60, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(60, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(60, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(60, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(61, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(61, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(61, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(61, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(61, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(62, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(62, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(62, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(62, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(62, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(63, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(63, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(63, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(63, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(64, 44, '2019-11-25 01:55:14', '2019-11-25 01:55:14'),
(64, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(64, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(64, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(65, 44, '2019-11-25 01:55:14', '2019-11-25 01:55:14'),
(65, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(65, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(65, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(65, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(65, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(66, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(66, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(66, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(66, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(67, 44, '2019-11-25 01:55:14', '2019-11-25 01:55:14'),
(67, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(67, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(67, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(67, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(68, 44, '2019-11-25 01:55:14', '2019-11-25 01:55:14'),
(68, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(68, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(68, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(68, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(69, 44, '2019-11-25 01:55:14', '2019-11-25 01:55:14'),
(69, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(69, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(69, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(69, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(70, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(70, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(70, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(71, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(71, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(71, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(71, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(72, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(72, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(72, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(73, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(73, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(73, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(73, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(74, 47, '2018-12-23 04:59:28', '2018-12-23 04:59:28'),
(74, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(74, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(75, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(75, 44, '2018-12-01 05:31:13', '2018-12-01 05:31:13'),
(75, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(75, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(75, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(75, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(75, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(75, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(76, 42, '2018-10-10 06:53:31', '2018-10-10 06:53:31'),
(76, 44, '2018-12-01 05:31:13', '2018-12-01 05:31:13'),
(76, 47, '2018-12-23 04:59:27', '2018-12-23 04:59:27'),
(76, 48, '2018-12-23 05:01:24', '2018-12-23 05:01:24'),
(76, 49, '2018-12-23 05:18:34', '2018-12-23 05:18:34'),
(76, 50, '2018-12-23 05:24:21', '2018-12-23 05:24:21'),
(76, 51, '2018-12-23 05:36:40', '2018-12-23 05:36:40'),
(76, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04'),
(77, 54, '2019-11-25 00:18:04', '2019-11-25 00:18:04');

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
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`id`, `exam_name`, `class_name`, `section_name`, `teacher_name`, `department`, `created_at`, `updated_at`, `file_extension`, `title`) VALUES
(1, 'Frist Term Exam ss', 'Two', 'A', 'Tania', 'Science ', '2017-08-09 15:13:00', '2017-08-09 15:13:00', 'pdf', 'frist-term-exam-ss-a-science'),
(2, 'Midterm Exam', 'Sixth Semester', 'General', 'Md. Faruk Hossain', 'Computer Science & Technology', '2020-03-22 04:20:11', '2020-03-22 04:20:11', 'pdf', 'midterm-exam-general-computer-science-technol'),
(3, 'Midterm Exam', 'Eighth Semester', 'General', 'Md Sohel Rana', 'Computer Science & Technology', '2020-03-22 04:30:20', '2020-03-22 04:30:20', 'pdf', 'midterm-exam-general-computer-science-technology');

-- --------------------------------------------------------

--
-- Table structure for table `report_settings`
--

CREATE TABLE `report_settings` (
  `report_settings_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `designation` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_settings`
--

INSERT INTO `report_settings` (`report_settings_id`, `name`, `designation`, `created_at`, `updated_at`) VALUES
(6, 'Md Sohel Rana	', 'Author', '2018-11-25 17:33:43', '2018-11-25 17:33:43'),
(7, 'Md. Imran Ali	', 'Author', '2018-11-25 20:53:44', '2018-11-25 20:53:44');

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
(41, 'parent', 'Parent', 'Parent', '2017-06-08 10:55:14', '2019-11-25 00:16:15'),
(42, 'instructor', 'Instructor ', 'Instructor ', '2018-10-10 06:50:32', '2018-10-10 06:50:32'),
(44, 'librarian', 'Librarian', 'Librarian', '2018-10-24 07:31:19', '2018-11-07 03:35:07'),
(47, 'vice_principal', 'Vice Principal', 'Vice Principal of TISI', '2018-12-23 04:55:34', '2018-12-23 04:55:34'),
(48, 'principal', 'Principal', 'Principal of TISI', '2018-12-23 04:56:17', '2018-12-23 04:56:17'),
(49, 'admin_tisi', 'Admin TISI', 'Administrative officer of TISI', '2018-12-23 05:14:46', '2018-12-23 05:14:46'),
(50, 'dormitory_manager', 'Dormitory Manager', 'Dormitory Manager of TISI & TFAUMCH', '2018-12-23 05:21:15', '2018-12-23 05:21:15'),
(51, 'accountant', 'Accountant', 'Accountant of TISI & TFAUMCH', '2018-12-23 05:32:50', '2018-12-23 05:32:50'),
(52, 'computer_operator', 'Computer Operator', 'Computer Operator', '2019-11-25 00:15:22', '2019-11-25 00:15:22'),
(53, 'it', 'IT', 'IT', '2019-11-25 00:15:42', '2019-11-25 00:15:42'),
(54, 'super_admin', 'Super Admin', 'Super Admin', '2019-11-25 00:17:44', '2019-11-25 00:17:44'),
(55, 'subject_entry', 'Subject Entry', 'Subject Entry', '2019-11-27 03:44:21', '2019-11-27 03:44:21'),
(58, 'canteen_manager', 'Canteen Manager', 'Canteen Manager', '2020-03-14 01:20:00', '2020-03-14 01:20:00');

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
(47, 42, '2020-03-23 07:03:08', '2020-03-23 07:03:08'),
(48, 54, '2020-03-09 05:44:33', '2020-03-09 05:44:33'),
(49, 42, '2018-10-11 08:38:15', '2018-10-11 08:38:15'),
(50, 54, '2019-11-25 01:47:54', '2019-11-25 01:47:54'),
(53, 42, '2018-10-24 07:39:43', '2018-10-24 07:39:43'),
(54, 42, '2018-10-24 07:02:24', '2018-10-24 07:02:24'),
(55, 42, '2019-11-27 04:22:40', '2019-11-27 04:22:40'),
(56, 42, '2018-11-07 03:33:55', '2018-11-07 03:33:55'),
(58, 42, '2018-10-24 07:41:10', '2018-10-24 07:41:10'),
(59, 42, '2018-10-24 07:41:37', '2018-10-24 07:41:37'),
(60, 54, '2019-11-30 03:02:39', '2019-11-30 03:02:39'),
(64, 42, '2018-11-07 03:34:33', '2018-11-07 03:34:33'),
(66, 47, '2018-12-23 05:11:59', '2018-12-23 05:11:59'),
(67, 51, '2018-12-31 09:28:00', '2018-12-31 09:28:00'),
(68, 51, '2018-12-31 09:40:39', '2018-12-31 09:40:39'),
(69, 51, '2018-12-31 10:12:01', '2018-12-31 10:12:01'),
(71, 42, '2019-11-27 04:23:04', '2019-11-27 04:23:04'),
(72, 42, '2019-11-27 04:23:15', '2019-11-27 04:23:15'),
(73, 42, '2019-11-27 04:23:23', '2019-11-27 04:23:23'),
(75, 42, '2019-11-27 04:21:40', '2019-11-27 04:21:40'),
(81, 44, '2019-11-29 23:49:40', '2019-11-29 23:49:40'),
(82, 54, '2019-12-07 21:42:37', '2019-12-07 21:42:37');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`roster_id`, `date`, `student_roll`, `component_id`, `amount`, `created_at`, `updated_at`) VALUES
(3, '22-10-2018', '1820014', '1540148344', '25', '2018-10-22 16:59:29', '2018-10-22 10:59:29'),
(4, '22-10-2018', '1820014', '1540149072', '50', '2018-10-22 17:33:15', '2018-10-22 11:33:15'),
(5, '22-10-2018', '1720012', '1540148344', '25', '2018-10-22 17:35:22', '2018-10-22 11:35:22'),
(6, '22-10-2018', '1720012', '1540149072', '55', '2018-10-22 17:35:25', '2018-10-22 11:35:25'),
(7, '22-10-2018', '1720013', '1540148344', '30', '2018-10-22 17:35:30', '2018-10-22 11:35:30'),
(8, '21-10-2018', '1720013', '1540149072', '54', '2018-10-22 17:37:21', '2018-10-22 11:35:34'),
(9, '22-10-2018', '1820015', '1540149084', '70', '2018-10-22 19:42:11', '2018-10-22 13:41:09'),
(10, '21-10-2018', '1820014', '1540148344', '25', '2018-10-22 20:07:09', '2018-10-22 14:07:09'),
(11, '21-10-2018', '1820014', '1540149072', '40', '2018-10-22 20:07:40', '2018-10-22 14:07:40'),
(12, '21-10-2018', '1820014', '1540149084', '40', '2018-10-22 20:07:44', '2018-10-22 14:07:44'),
(13, '21-10-2018', '1720012', '1540148344', '25', '2018-10-22 20:07:47', '2018-10-22 14:07:47'),
(14, '21-10-2018', '1720012', '1540149072', '48', '2018-10-22 20:07:50', '2018-10-22 14:07:50'),
(15, '21-10-2018', '1720012', '1540149084', '50', '2018-10-22 20:07:53', '2018-10-22 14:07:53'),
(16, '21-10-2018', '1720013', '1540148344', '30', '2018-10-22 20:07:56', '2018-10-22 14:07:56'),
(17, '21-10-2018', '1720013', '1540149084', '40', '2018-10-22 20:07:59', '2018-10-22 14:07:59'),
(18, '21-10-2018', '1820015', '1540148344', '20', '2018-10-22 20:08:03', '2018-10-22 14:08:03'),
(19, '21-10-2018', '1820015', '1540149072', '60', '2018-10-22 20:08:06', '2018-10-22 14:08:06'),
(20, '21-10-2018', '1820015', '1540149084', '50', '2018-10-22 20:08:08', '2018-10-22 14:08:08'),
(21, '22-10-2018', '1720013', '1540149072', '50', '2018-10-22 20:10:17', '2018-10-22 14:10:17'),
(22, '22-10-2018', '1820014', '1540149084', '70', '2018-10-22 20:10:21', '2018-10-22 14:10:21'),
(23, '22-10-2018', '1720012', '1540149084', '75', '2018-10-22 20:10:24', '2018-10-22 14:10:24'),
(24, '22-10-2018', '1720013', '1540149084', '55', '2018-10-22 20:10:27', '2018-10-22 14:10:27'),
(25, '23-10-2018', '1820014', '1540149099', '70', '2018-10-22 20:10:52', '2018-10-22 14:10:52'),
(26, '23-10-2018', '1720012', '1540149099', '70', '2018-10-22 20:10:54', '2018-10-22 14:10:54'),
(27, '23-10-2018', '1720013', '1540149099', '70', '2018-10-22 20:10:56', '2018-10-22 14:10:56'),
(28, '23-10-2018', '1820015', '1540149099', '70', '2018-10-22 20:10:59', '2018-10-22 14:10:59'),
(29, '23-10-2018', '1820019', '1540149099', '70', '2018-10-22 20:11:01', '2018-10-22 14:11:01'),
(30, '25-10-2018', '182006', '1540148344', '25', '2018-10-25 01:33:29', '2018-10-24 19:33:29'),
(31, '25-10-2018', '182006', '1540149072', '25', '2018-10-25 01:33:55', '2018-10-24 19:33:55'),
(32, '2018-11-01', '182006', '1540148344', '14', '2018-11-01 14:58:00', '2018-11-01 08:58:00'),
(33, '2018-11-01', '182006', '1540149099', '1', '2018-11-01 14:57:22', '2018-11-01 08:57:22'),
(34, '2018-11-01', '182006', '1540149072', '45', '2018-11-01 14:57:15', '2018-11-01 08:57:15'),
(35, '2018-11-01', '182006', '1540149084', '45', '2018-11-01 14:57:22', '2018-11-01 08:57:22'),
(36, '2018-11-24', '182006', '1540148344', '80', '2018-11-24 00:58:35', '2018-11-23 18:58:35'),
(37, '2018-11-24', '182006', '1540149072', '80', '2018-11-24 00:58:37', '2018-11-23 18:58:37'),
(38, '2018-11-24', '182006', '1540149084', '80', '2018-11-24 00:58:39', '2018-11-23 18:58:39'),
(39, '2018-11-24', '182006', '1540149099', '80', '2018-11-24 00:58:41', '2018-11-23 18:58:41'),
(40, '2019-10-30', '182006', '1540148344', '50', '2019-10-30 03:46:03', '2019-10-29 21:46:03'),
(41, '2019-10-30', '182006', '1540149072', '50', '2019-10-30 03:46:06', '2019-10-29 21:46:06'),
(42, '2019-10-30', '182006', '1540149084', '50', '2019-10-30 03:46:10', '2019-10-29 21:46:10'),
(43, '2019-12-05', '182006', '1540148344', '40', '2019-12-05 09:59:42', '2019-12-05 03:59:42'),
(44, '2019-12-05', '182006', '1540149072', '60', '2019-12-05 09:59:45', '2019-12-05 03:59:45'),
(45, '2019-12-05', '182006', '1540149084', '60', '2019-12-05 09:59:49', '2019-12-05 03:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `roster_configuration`
--

CREATE TABLE `roster_configuration` (
  `id` int(11) NOT NULL,
  `default_component` varchar(191) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster_configuration`
--

INSERT INTO `roster_configuration` (`id`, `default_component`, `created_at`, `updated_at`) VALUES
(1540318856, '1543020853', '2019-11-27 07:46:10', '2019-11-27 01:46:10');

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
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `name`, `info`, `create_at`, `updated_at`) VALUES
(1, 'ORSMS', '{\"username\":\"01865801556\",\"password\":\"84513\",\"mask\":\"i-school\"}', '2018-03-17 19:45:01', '2018-03-17 13:45:01');

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
  `edition` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `stock_article` (`stock_id`, `article_name`, `language`, `author`, `isbn`, `edition`, `stock_date`, `publisher`, `price_details`, `net_price`, `purchase_price`, `discount`, `quantity`, `created_at`, `updated_at`) VALUES
(1575191223, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', '14 th ed.', '2017-09-16', 'Technical Publication', '220', '220', '200', '40', '40', '2019-12-01 03:09:22', '2019-12-01 03:09:22'),
(1575191603, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', '6 th ed.', '2017-09-16', 'Technical Publication', '300', '300', '260', '40', '40', '2019-12-01 03:15:13', '2019-12-01 03:15:13'),
(1575192166, 'Physical Education & Life Skill Development', 'Bangla', 'Md. Elias ', 'N/A', '10 th ed.', '2017-09-16', 'Technical Publication', '130', '130', '100', '30', '40', '2019-12-01 03:23:38', '2019-12-01 03:23:38'),
(1575192443, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', '13 th ed.', '2017-09-16', 'Technical Publication', '280', '280', '250', '30', '40', '2019-12-01 03:28:20', '2019-12-01 03:28:20'),
(1575194371, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', '8th ed.', '2017-09-16', 'Technical Publication', '160', '160', '130', '30', '40', '2019-12-01 04:00:31', '2019-12-01 04:00:31'),
(1575194595, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', '4th ed.', '2017-09-16', 'Technical Publication', '160', '160', '130', '30', '40', '2019-12-01 04:05:04', '2019-12-01 04:05:04'),
(1575194891, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', '4th ed.', '2017-09-16', 'Technical Publication', '200', '200', '170', '30', '40', '2019-12-01 04:09:17', '2019-12-01 04:09:17'),
(1575195112, 'Computer Application', 'Bangla', 'A F M Mizanur Rahman', 'N/A', '8th ed.', '2017-10-14', 'Technical Publication', '160', '160', '130', '30', '8', '2019-12-01 04:12:54', '2019-12-01 04:12:54'),
(1575195654, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', '8th ed.', '2017-10-14', 'Technical Publication', '300', '300', '250', '50', '47', '2019-12-01 04:21:41', '2019-12-01 04:21:41'),
(1575195823, 'Chemistry', 'Bangla', 'Md. Jobaidur Rahman', 'N/A', '10 th ed.', '2017-10-14', 'Technical Publication', '280', '280', '250', '30', '8', '2019-12-01 04:24:45', '2019-12-01 04:24:45'),
(1575196054, 'Electrical Engineering Fundamentals', 'Bangla', 'Bhaboshindhu Biswas', 'N/A', '4th ed.', '2017-10-14', 'Technical Publication', '160', '160', '130', '30', '8', '2019-12-01 04:28:35', '2019-12-01 04:28:35'),
(1575197067, 'Mathematics-1', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', '4th ed.', '2019-10-14', 'Technical Publication', '200', '200', '170', '30', '8', '2019-12-01 04:46:06', '2019-12-01 04:46:06'),
(1575197500, 'Computer Lab Practice', 'Bangla', 'Saima Akter', 'N/A', '1st ed.', '2017-10-14', 'Haque Publications', '140', '140', '120', '20', '48', '2019-12-01 04:52:43', '2019-12-01 04:52:43'),
(1575429745, 'Graphics Design-1', 'Bangla', 'Md. Shahabuddin Sowkot', 'N/A', '9th ed.', '2018-02-08', 'Technical Publication', '76', '76', '70', '6', '30', '2019-12-03 21:23:56', '2019-12-03 21:23:56'),
(1575430038, 'English', 'English', 'Md. Ikbal Hossain', 'N/A', '6 th ed.', '2018-02-08', 'Technical Publication', '300', '300', '260', '40', '13', '2019-12-03 21:29:48', '2019-12-03 21:29:48'),
(1575430620, 'অসমাপ্ত আত্নজীবনী', 'বাংলা', 'শেখ মুজিবুর রহমান', '9789845061957', 'প্রথম প্রকাশ', '2019-02-07', 'ইউনিভার্সিটি প্রেস', '200', '200', '190', '10', '2', '2019-12-03 21:39:39', '2019-12-03 21:39:39'),
(1575431931, 'Analog Electronics', 'Bangla', 'Md. Ziaul Karim Zia', 'N/A', '8th ed.', '2018-02-08', 'Technical Publication', '300', '300', '260', '40', '30', '2019-12-03 21:59:51', '2019-12-03 21:59:51'),
(1575432240, 'Database Application', 'Bangla', 'Rumana Khatun', 'N/A', '3rd ed.', '2018-02-08', 'Technical Publication', '88', '88', '80', '8', '30', '2019-12-03 22:05:07', '2019-12-03 22:05:07'),
(1575432735, 'Mathematics-2', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', '15th ed. (2018)', '2018-02-08', 'Technical Publication', '300', '300', '260', '40', '45', '2019-12-03 22:13:16', '2019-12-03 22:13:16'),
(1575443936, 'Mathematics-2 (Solution)', 'Bangla', 'Md. Delwar Hossen Mia', 'N/A', '6 th ed.', '2018-02-08', 'Technical Publication', '248', '248', '230', '18', '5', '2019-12-04 01:19:43', '2019-12-04 01:19:43'),
(1575444134, 'Physics-1', 'Bangla', 'Md. Ashraf Hossain', 'N/A', '13 th ed.', '2018-02-08', 'Technical Publication', '280', '280', '250', '30', '13', '2019-12-04 01:27:13', '2019-12-04 01:27:13'),
(1575444547, 'Bangla', 'Bangla', 'M.M. Nazmul Haque', 'N/A', '14 th ed.', '2018-02-08', 'Technical Publication', '220', '220', '200', '20', '15', '2019-12-04 01:29:52', '2019-12-04 01:29:52'),
(1575444989, 'Lithographic Printing-1', 'Bangla', 'Md. Abul Mannan', 'N/A', '1st ed.', '2018-07-20', 'BTEB', '180', '180', '150', '30', '20', '2019-12-04 01:39:24', '2019-12-04 01:39:24'),
(1575445379, 'Lithographic Printing-2', 'Bangla', 'Md. Golam Mostafa', 'N/A', '1st ed.', '2018-07-20', 'BTEB', '180', '180', '150', '30', '20', '2019-12-04 01:44:30', '2019-12-04 01:44:30'),
(1575445741, 'Screen Printing 1-2', 'Bangla', 'Md. Shaif Shahariar  Jahedi', 'N/A', '1st ed.', '2018-07-20', 'BTEB', '180', '180', '150', '30', '15', '2019-12-04 01:52:11', '2019-12-04 01:52:11'),
(1575448572, 'Communicative English', 'English', 'Md. Babul Hossain', 'N/A', '4th ed.', '2018-07-28', 'Haque Publications', '148', '148', '140', '8', '20', '2019-12-04 02:38:36', '2019-12-04 02:38:36'),
(1575453537, 'Social Science', 'Bangla', 'A K M Mozzammel Haque', 'N/A', '8th ed.', '2018-07-29', 'Technical Publication', '300', '300', '250', '50', '20', '2019-12-04 04:00:51', '2019-12-04 04:00:51'),
(1575454299, 'Graphic Design-2', 'Bangla', 'Hena Akter', 'N/A', '9th ed.', '2018-07-29', 'Technical Publication', '72', '72', '72', '00', '5', '2019-12-04 04:12:40', '2019-12-04 04:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_name` int(11) NOT NULL,
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
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `session` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `batch` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `shift` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `medium` varchar(191) CHARACTER SET utf8 NOT NULL,
  `applicant_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `reponsible_teacher` varchar(191) CHARACTER SET utf8 NOT NULL,
  `is_family_member_of_hem_section` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `parent_name`, `relation`, `roll`, `class`, `reg_number`, `birth_date`, `gender`, `phone`, `mobile`, `status`, `created_at`, `updated_at`, `type`, `section`, `department`, `email`, `password`, `session`, `batch`, `shift`, `medium`, `applicant_id`, `reponsible_teacher`, `is_family_member_of_hem_section`) VALUES
(117, 'Md: Nasim Akter', 1575101370, 'Father', '8518101', 'Forth Semester', '8518101', '1999-11-08', 'Male', '01316855579', '01316855579', 'Active', '2019-11-30 02:18:38', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'shohidul@gmail.com', '$2y$10$3NtBM2i1/8dD2hj/cogy9O0QDDvNuujWRQJddl', '2018-2019', '2', '1st', 'TISI', NULL, 'Ali Azom', ''),
(120, 'Md.Joy Pramanik', 1575105024, 'Father', '6719101', 'Second Semester', '6719101', '2000-06-14', 'Male', '01776396783', '01776396783', 'Active', '2019-11-30 03:19:06', '2020-03-09 05:40:11', 'Regular', 'General', 'Electrical Technology', 'Joy@gmail.com', '$2y$10$llgi53DHmSThKHIxRgmzS.bgyCkOGU4o/zJC/5', '2019-2020', '2', '1st', 'TISI', NULL, 'Shaima Hanif', ''),
(121, 'Md. Toufik Hasan', 1575105759, 'Father', '981382', 'Sixth Semester', '813409', '1997-10-12', 'Male', '01773541035', '0197354103.5', 'Active', '2019-11-30 03:32:31', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', 'toufiktuhin23@gmail.com', '$2y$10$qFFGxLM0FyJta7rWok6kZ.YJjYHCGirhpDI.u3', '2017-2018', '1', '1st', 'TISI', NULL, 'Md. Shariful Islam', ''),
(122, 'Md. Hasan Mia', 1575106134, 'Father', '19112', 'Second Semester', '8519101', '2003-06-27', 'Male', '01749313028', '01749313028', 'Active', '2019-11-30 03:33:58', '2020-03-10 00:23:50', 'Regular', 'General', 'Computer Science & Technology', '8519101', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(123, 'rupa khatun', 1575105903, 'father', '6419101', 'Second Semester', '6419101', '2003-03-25', 'Female', '01753277822', '07753277822', 'Active', '2019-11-30 03:36:07', '2020-03-09 05:40:11', 'Regular', 'General', 'Civil Technology', 'rupa@gmail.com', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', ''),
(124, 'Chiranjit Kumar', 1575106230, 'Father', '6719102', 'Second Semester', '6719102', '2002-05-11', 'Male', '01751035191', '01751035191', 'Active', '2019-11-30 03:40:49', '2020-03-09 05:40:11', 'Regular', 'General', 'Electrical Technology', 'Chiranjitroy@gmail.com', '$2y$10$pwGulQiM.Ke.frS9W7kvg.TWecHIOYQEu.JhiY', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(125, 'Parves Mosharaf', 1575106172, 'Father', '8519155', 'Second Semester', '19155', '2000-10-11', 'Male', '', '', 'Active', '2019-11-30 03:43:27', '2020-03-09 05:40:11', 'Regular', 'General', 'Computer Science & Technology', '19155', '', '2019-2020', '2', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(126, 'Md.Rokibul Islam', 1575106083, 'Father', '981383', 'Sixth Semester', '813408', '1997-01-11', 'Male', '01309935801', '01993172641', 'Active', '2019-11-30 03:46:01', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', 'rakib4design@gmail.com', '$2y$10$szMj.HVD4hZjyA.f7uWHr.ZafmJlbvCN9XnOaV', '2017-2018', '1', '1st', 'TISI', NULL, 'Md. Shariful Islam', ''),
(128, 'Md. Nahid Rana', 1575105868, 'Father', '981381', 'Sixth Semester', '813410', '1997-12-22', 'Male', '01758624098', '', 'Active', '2019-11-30 03:47:40', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', 'nahid4098rana@gmail.com', '', '2017-2018', '1', '1st', 'TISI', NULL, 'Md. Shariful Islam', ''),
(129, 'Mst: Shamima Akter', 1575105231, 'Father', '981372', 'Sixth Semester', '813419', '2002-10-09', 'Female', '', '01770073278', 'Active', '2019-11-30 03:48:12', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', '981372', '$2y$10$vUDOq0YN2dSYWWvFRh5L/.1FKynJgnf2XpISR5', '2017-2018', '2', '1st', 'TISI', NULL, 'Md. Shariful Islam', 'no'),
(130, 'md.sajib talukder', 1575106799, 'father', '6419102', 'Second Semester', '6419102', '2003-05-11', 'Male', '01762761365', '01762761365', 'Active', '2019-11-30 03:50:10', '2020-03-09 05:40:11', 'Regular', 'General', 'Civil Technology', '6419102', '$2y$10$6oVIC9CQhOTbV0WCFqzoDuZXv2ieshxac0js45', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', ''),
(131, 'Newton Barman', 1575105914, 'Father', '6517104', 'Sixth Semester', '981968', '1998-07-23', 'Male', '01757196887', '01757196887', 'Active', '2019-11-30 03:51:07', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', '981968', '', '2017-2018', '1', '1st', 'TISI', NULL, 'Md. Shariful Islam', ''),
(132, 'Md. Rakib Hasan Ramim', 1575106650, 'Father', '8519111', 'Second Semester', '8519111', '2003-05-15', 'Male', '01644660952', '01644660952', 'Active', '2019-11-30 03:52:07', '2020-03-09 05:40:11', 'Regular', 'General', 'Computer Science & Technology', '8519156', '', '2019-2020', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(134, 'Mohammad Shahin', 1575107602, 'Father', '6719104', 'Second Semester', '6719104', '2001-05-14', 'Male', '01823029784', '01823029784', 'Active', '2019-11-30 03:57:54', '2020-03-09 05:40:11', 'Regular', 'General', 'Electrical Technology', 'md.shahinsami2003@gmail.com', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(137, 'MD.ZUBAYER RAHMAN', 1575107801, 'Father', '159921', 'Sixth Semester', '1418875703', '2002-02-03', 'Male', '01767737460', '01767737460', 'Active', '2019-11-30 04:03:40', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', '159921', '', '2017-2018', '1', '1st', 'TISI', NULL, 'Md. Shariful Islam', 'no'),
(140, 'Md. Naiem Islam', 1575108067, 'Father', '8519114', 'Second Semester', '8519114', '2003-09-27', 'Male', '01309879437', '01309879437', 'Active', '2019-11-30 04:11:38', '2020-03-09 05:40:11', 'Regular', 'General', 'Computer Science & Technology', '8519114', '$2y$10$kQ502oZEf/F58WJ4MP6UaewdJDIDfIU.pYdYQE', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(142, 'Toukir Ahmed', 1575109274, 'Father', '6419125', 'Second Semester', '6419125', '2002-12-07', 'Male', '01761019840', '01761019840', 'Active', '2019-11-30 04:24:21', '2020-03-09 05:40:12', 'Regular', 'General', 'Civil Technology', '6419125', '$2y$10$hXodMMpqvGbFaajjCcRVlOkxK6Kw2FvtiryDQU', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', 'no'),
(143, 'Musfiqur Rahman', 1575109118, 'Father', '8519115', 'Second Semester', '8519115', '2004-04-21', 'Male', '01707464090', '01707464090', 'Active', '2019-11-30 04:26:46', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519115', '$2y$10$Q4bWOclsa0t3u4pNeMyZBurMkynyXb5dV3EZ0j', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(144, 'Md:Shakil Molla', 1575108480, 'Father', '8519157', 'Second Semester', '8519157', '2003-01-10', 'Male', '', '', 'Active', '2019-11-30 04:29:39', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519157', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(145, 'Md.Robiul Auwal', 1575109554, 'Father', '6419127', 'Second Semester', '6419127', '1998-03-11', 'Male', '01738542773', '01738542773', 'Active', '2019-11-30 04:31:57', '2020-03-09 05:40:12', 'Regular', 'General', 'Civil Technology', '6419127', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', 'no'),
(146, 'Md.Moshiur Rahman', 1575110101, 'Father', '6419128', 'Second Semester', '6419128', '2004-02-09', 'Male', '01705462182', '01705462182', 'Active', '2019-11-30 04:37:54', '2020-03-09 05:40:12', 'Regular', 'General', 'Civil Technology', '6419128', '$2y$10$GhkcptFHOuIQMvf7S.ia/OaPlBKUh185JyEKae', '2019-2020', '1', '1st', '', NULL, 'Engr Zakia Sultana', 'no'),
(147, 'Md. Hasibur Rahman', 1575110366, 'Father', '6419129', 'Second Semester', '6419129', '2004-12-02', 'Male', '01723443893', '01723443893', 'Active', '2019-11-30 04:41:48', '2020-03-09 05:40:12', 'Regular', 'General', 'Civil Technology', '6419129', '$2y$10$7NQ7viyXeBXnsb68u4F58eOQyID0cqsk6fwv6y', '2019-2020', '0', '1st', 'TISI', NULL, 'Engr Zakia Sultana', 'no'),
(148, 'Ahmed Hossain', 1575110349, 'Father', '8519116', 'Second Semester', '8519116', '2002-10-25', 'Male', '01317179844', '01317179844', 'Active', '2019-11-30 04:43:03', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519116', '$2y$10$ySZfkNnvFwZQEp2RPH9tZ.d0.wxakCaMSCgZtL', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(149, 'Md:Ali hasan shek', 1575107406, 'Father', '8519156', 'Second Semester', '8519156', '2002-02-25', 'Male', '', '01757007563', 'Active', '2019-11-30 04:44:56', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', 'abdulkhalek@gmail.com', '$2y$10$IcAwnx4vONwDqesRaKL4x.PqM1VQHa2./uVaH9', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(150, 'Rakibul Hassan', 1575110575, 'Father', '6419144', 'Second Semester', '6419144', '2001-02-02', 'Male', '01785843567', '01785843567', 'Active', '2019-11-30 04:45:36', '2020-03-09 05:40:12', 'Regular', 'General', 'Civil Technology', '6419144', '$2y$10$okmHwnb5mnEURGwp/Z0fruOZ7dSptjV0CZaEwa', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', 'no'),
(151, 'Md. Nasim Uddin', 1575110801, 'Father', '8519118', 'Second Semester', '8519118', '2002-02-02', 'Male', '01744255020', '01744255020', 'Active', '2019-11-30 04:51:33', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519118', '$2y$10$0xbRXnnAi8PYo2bs2PX13uspdvWyAvRQP3sRVY', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(152, 'md.atikur rahman ashik', 1575111068, 'father', '6419105', 'Second Semester', '6419105', '2003-12-08', 'Male', '01793000729', '01793000729', 'Active', '2019-11-30 04:57:22', '2020-03-09 05:40:12', 'Regular', 'General', 'Civil Technology', '6419105', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', 'no'),
(153, 'Md, Akash Shake', 1575111273, 'Father', '8519130', 'Second Semester', '8519130', '2002-09-14', 'Male', '01788085575', '01788085575', 'Active', '2019-11-30 04:57:53', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519130', '$2y$10$ecnrwWdgxDzKJ0QliY0x7eQLuJML9k1h.Hv3s7', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(154, 'Md:Sobuj Hosen', 1575111297, 'Father', '8519122', 'Second Semester', '8519122', '2003-01-06', 'Male', '', '', 'Active', '2019-11-30 04:58:23', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519122', '$2y$10$InzZ1eKQ77GkemeK/FOGOu65wLWd6hHKB/rMrg', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(155, 'Mst. Suraiya Jahan Nupur', 1575110246, 'Father', '6518114', 'Forth Semester', '113776', '1994-05-27', 'Female', '01761294420', '01761294420', 'Active', '2019-11-30 04:58:29', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', 'SuraiyaJahanNupur@gmail.com', '', '2018-2019', '2', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(156, 'MD.Belal Hossain', 1575111362, 'Father', '113766', 'Forth Semester', '1500914804', '2000-08-06', 'Male', '01777026472', '01770073278', 'Active', '2019-11-30 05:04:58', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113766', '$2y$10$sgTABCL0r30c4bdOAro2tO7FCKlAOP98aW6Wbs', '2018-2019', '2', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(157, 'Asadujjaman', 1575111399, 'Father', '113768', 'Forth Semester', '1500914801', '2002-06-05', 'Male', '', '', 'Active', '2019-11-30 05:07:43', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113768', '$2y$10$Gzgr4Ub6vrCGdX/DiWSXReozzCdhUW/TOVxqmT', '2018-2019', '2', '1st', 'TISI', NULL, 'towfiq hasan', ''),
(158, 'Md. Arafatujjaman Ashik', 1575111857, 'Father', '8519133', 'Second Semester', '8519133', '2003-11-24', 'Male', '01761536153', '01761536153', 'Active', '2019-11-30 05:09:41', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519133', '$2y$10$.PjWV5z6wWpS/iOZ92gtLepCKIb93JnAl9geka', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(159, 'Md.Jahid Amahed', 1575111397, 'Father', '113772', 'Forth Semester', ' 1500914792', '1998-10-10', 'Male', '0170523981', '0170523981', 'Active', '2019-11-30 05:10:13', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113772', '$2y$10$fLktyt8n1bSua7fAlJgQfuBPDFUZMbSqIrAxTd', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Shariful Islam', 'no'),
(160, 'jlhan ali', 1575101370, 'Father', '113775 ', 'Forth Semester', '1500914789', '2003-01-11', 'Male', '01745949117', '01745949117', 'Active', '2019-11-30 05:12:57', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113775 ', '$2y$10$UlIDvGhjwAcsnWf0dbuJzuelKv8Mg0RUlMu7ib', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Arif Ahmed', ''),
(161, 'MD.ZUBAYER RAHMAN', 1575111055, 'Father', '981375', 'Sixth Semester', '813416', '2002-02-03', 'Male', '01767737460', '01767737460', 'Active', '2019-11-30 05:14:25', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', 'rajzubayer@gmail.com', '$2y$10$hZRkINIaYT29ezo6uiVqZ.QirjRoMplieRoJDQq3T6b0l6jS7JzCW', '2017-2018', '1', '1st', 'TISI', NULL, 'Md. Shariful Islam', 'no'),
(162, 'Md.Pavel Ahmed', 1575111561, 'Father', '981378', 'Sixth Semester', '813413', '2000-01-09', 'Male', '01708019681', '01708019681', 'Active', '2019-11-30 05:14:25', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', 'PavelAhmed@gmail.com', '$2y$10$PClpSSennoch4N.x2vNd9u112V5kgONmlJMUsX', '2017-2018', '1', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(163, 'Md.Mehedi Hasan', 1575111154, 'Father', '113762', 'Forth Semester', '1500914809', '2001-03-11', 'Male', '', '', 'Active', '2019-11-30 05:17:09', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113762', '$2y$10$G..MhY/QhpNyNtH2fg9IY.KVC2PRodJ1ajMPc8', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', 'no'),
(164, 'Mst Manisha Akter', 1575112824, 'Father', '113773', 'Forth Semester', '1500914791', '1994-09-25', 'Female', '01764716946', '01764716946', 'Active', '2019-11-30 05:25:04', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113773', '$2y$10$c9r.1pOBT3F1chnpkrCD5OH.hrNlS91l6xut1P', '2018-2019', '2', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(165, 'AJ Asikur Rahman', 1575112666, 'Father', '6517103', 'Sixth Semester', '813417', '2000-02-01', 'Male', '01761010374', '01761010374', 'Active', '2019-11-30 05:25:48', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', 'asikasikur12@gmail.com', '', '2017-2018', '1', '1st', 'TISI', NULL, 'Md Sohel Rana', 'no'),
(166, 'faysal habib', 1575112725, 'Father', '113770', 'Forth Semester', '1500914797', '2001-05-13', 'Male', '01744262269', '01744262269', 'Active', '2019-11-30 05:26:11', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113770', '$2y$10$M8mdR4F1FVwBxRMC44s0cuaIpwpFtj6J5EiBNu', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Arif Ahmed', ''),
(167, 'Mst.Asha Akter', 1575112849, 'Father', '6518125', 'Forth Semester', '1500914785', '1999-11-11', 'Female', '', '', 'Active', '2019-11-30 05:26:43', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113777', '', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', 'no'),
(168, 'Mst.RATNA Banu', 1575108692, 'Father', '177308', 'Forth Semester', '1500914795', '2000-09-05', 'Female', '01798449457', '01798449457', 'Active', '2019-11-30 05:26:59', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '177308', '$2y$10$dK7kGj2aZxav3TbCCx416.kCvC0KB1raggVEf2', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Arif Ahmed', ''),
(169, 'Sagor Kumar', 1575113247, 'Father', '113771', 'Forth Semester', '1500914794', '2001-04-25', 'Male', '01733438004', '01733438004', 'Active', '2019-11-30 05:31:25', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '113771', '$2y$10$9vwfA/YTtL06Op8HYmNXnOS1B9n63hFZy/ivQq', '2018-2019', '2', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(170, 'Md. Alif Hossen', 1575113367, 'Father', '981384', 'Sixth Semester', '813407', '1999-10-06', 'Male', '01774109264', '01774109264', 'Active', '2019-11-30 05:36:18', '2020-03-09 05:50:02', 'Regular', 'General', 'Graphics Technology', 'alifhossen@gmail.com', '$2y$10$FXlpntyrlWm1/gWaWVj/OurBla1CLJlNspDL2K', '2017-2018', '1', '1st', 'TISI', NULL, 'Md Sohel Rana', ''),
(171, 'md.hasanuzzaman hridoy', 1575113503, 'Father', '177307', 'Forth Semester', '1500914802', '2001-06-18', 'Male', '01747774105', '01747774105', 'Active', '2019-11-30 05:38:07', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', '177307', '$2y$10$AUY36/DucQydBR8Cu0sRO.nB3yMXrs8j1Xx.nM', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Arif Ahmed', ''),
(172, 'Md:Sobuj Hosen', 1575171826, 'Father', '8519134', 'Second Semester', '8519134', '2003-01-06', 'Male', '', '', 'Active', '2019-11-30 21:49:04', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519134', '$2y$10$NbHKvjPP5/pZyIDFxOzwrOuMdC4qwXCl75UjbP', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(173, 'nazmul Islam', 1575173374, 'Father', '8519121', 'Second Semester', '8519121', '2003-11-10', 'Male', '', '', 'Active', '2019-11-30 22:13:28', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519121', '$2y$10$TTJcA097gCUdrIPxWbkDeup1OqGs5g7FBTA/ml', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(174, 'Nasima Khatun', 1575173680, 'Father', '8519135', 'Second Semester', '8519135', '2002-11-23', 'Female', '01765505403', '01765505403', 'Active', '2019-11-30 22:19:45', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519135', '', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(175, 'Md:Bulbul Ahamed', 1575173785, 'Father', '8519125', 'Second Semester', '8519125', '2004-03-31', 'Male', '', '', 'Active', '2019-11-30 22:20:31', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519125', '$2y$10$yy.rWQnymcdBHZA8EzmmrOJhWe3rFmG.wi057c', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(176, 'Shakil', 1575174132, 'Father', '8519136', 'Second Semester', '8519136', '2003-06-20', 'Male', '01760272661', '01760272661', 'Active', '2019-11-30 22:25:24', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519136', '$2y$10$Rc.PbkNbf6Ut9WmkM.dP3uCbIj8nYri6t.3DlI', '2019-2020', '3', '1st', 'TISI', NULL, 'Md Sohel Rana', ''),
(177, 'Md: Sohanur Rohman', 1575174301, 'Father', '8519126', 'Second Semester', '8519126', '1997-12-23', 'Male', '', '', 'Active', '2019-11-30 22:28:21', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519126', '$2y$10$2LIclgJDSwQ.ySSS50YaH.r3F9xTZ8lr.dyzAq', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(178, 'Md. Rakibul Hassan', 1575174436, 'Father', '8519139', 'Second Semester', '8519139', '2002-01-10', 'Male', '01736004611', '01736004611', 'Active', '2019-11-30 22:30:37', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519139', '$2y$10$6fJHS595snyBPULipIXki.U5v1rH0x4kJ1020K', '2019-2020', '3', '1st', 'TISI', NULL, 'Md Sohel Rana', ''),
(179, 'Rabbi Hassa', 1575174663, 'Father', '8519129', 'Second Semester', '8519129', '2004-03-01', 'Male', '', '', 'Active', '2019-11-30 22:33:33', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519129', '', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(180, 'Shamim Reza', 1575174756, 'Father', '8519140', 'Second Semester', '8519140', '2001-04-19', 'Male', '01975205908', '01975205908', 'Active', '2019-11-30 22:36:34', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519140', '$2y$10$qujqDm5l8k14c09YozjW9.H/DTTrDV9xCmAaBg', '2019-2020', '3', '1st', 'TISI', NULL, 'Md Sohel Rana', ''),
(181, 'Md:Ashik Ali', 1575175271, 'Father', '8519128', 'Second Semester', '8519128', '2002-11-18', 'Male', '', '', 'Active', '2019-11-30 22:44:38', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519128', '$2y$10$sYUClMJnWP9i8bFA5OVpq.umrDHDWUVe971q6w', '2019-2020', '3', '1st', 'TISI', NULL, 'Md.Altab Hossain', ''),
(182, 'Mst. Nadira Khatun', 1575175346, 'Father', '8519145', 'Second Semester', '8519145', '2003-10-10', 'Female', '01700956752', '01700956752', 'Active', '2019-11-30 22:45:48', '2020-03-09 06:10:59', 'Regular', 'General', 'Computer Science & Technology', '8519145', '', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(183, 'Arjuman Ara', 1575175654, 'Father', '8519147', 'Second Semester', '8519147', '2001-01-18', 'Female', '01959221216', '01959221216', 'Active', '2019-11-30 22:50:32', '2020-03-09 05:40:12', 'Regular', 'General', 'Computer Science & Technology', '8519147', '$2y$10$nn06zAKfieta/yiYzPUpu.PMh0H8jhEBRk3CLx', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(184, 'Md:Abu Sayed', 1575175637, 'Father', '8519154', 'Second Semester', '8519154', '2000-01-15', 'Male', '', '', 'Active', '2019-11-30 22:50:36', '2020-03-09 05:40:13', 'Regular', 'General', 'Computer Science & Technology', '8519154', '$2y$10$c5MMTHX7itWoBf9yPDyaOuUmiKq1rvm/s1HKDH', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(185, 'Meharul Islam', 1575175938, 'Father', '8519148', 'Second Semester', '8519148', '2003-01-01', 'Male', '01789720125', '01789720125', 'Active', '2019-11-30 22:55:10', '2020-03-09 05:40:13', 'Regular', 'General', 'Computer Science & Technology', '8519148', '$2y$10$W4DVdzNMMFXX9I1/VaCzBuSaTtF4DgJsHiX2Jo', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(186, 'Md. Monirul Islam', 1575176207, 'Father', '8519152', 'Second Semester', '8519152', '2003-08-10', 'Male', '013052565548', '013052565548', 'Active', '2019-11-30 23:00:01', '2020-03-09 05:40:13', 'Regular', 'General', 'Computer Science & Technology', '8519152', '', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(187, 'Jarif Ahammed', 1575177835, 'Father', '8519151', 'Second Semester', '8519151', '2004-07-27', 'Male', '01743974725', '01743974725', 'Active', '2019-11-30 23:27:12', '2020-03-09 05:40:13', 'Regular', 'General', 'Computer Science & Technology', '8519151', '$2y$10$PmPgBsg6IfNTwhbiVLwhQ.KEV6zTCKxLGXLutT', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Rezaul Haque', ''),
(188, 'Md. Mosharrof Hossain', 1575179427, 'Father', '113752', 'Forth Semester', '1500914760', '05/03/1999', 'Male', '01995044856', '01995044856', 'Active', '2019-11-30 23:56:35', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'mosharrofhossainniloy@gmail.com', '$2y$10$14Cbwaq0YmENaGzjXp2wFO9z/5v/2sGvAFIv01', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(189, 'Md.Tarek Rahman', 1575179613, 'Father', '6719106', 'Second Semester', '6719106', '2002-10-18', 'Male', '01715963439', '01715963439', 'Active', '2019-11-30 23:57:23', '2020-03-09 05:40:13', 'Regular', 'General', 'Electrical Technology', 'Tarek@gmail.com', '$2y$10$GZRxRARHlN7l1hwKR3xJ1uHUKdx.2Xyk3y7s4H', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(190, 'MST. SAFIYA KHATUN', 1575178337, 'Father', '6519128', 'Second Semester', '1502008272', '2003-05-25', 'Female', '01749330491', '', 'Active', '2019-11-30 23:57:45', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'shfiya@gmail.com', '', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', ''),
(191, 'Farzana Akter', 1575178332, 'Father', '6519133', 'Second Semester', '1502008279', '2004-05-17', 'Female', '', '0177474468', 'Active', '2019-11-30 23:59:53', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'farzanaakter@gmail.com', '', '2019-2020', '3', '1st', 'TISI', NULL, 'A.T.M Tazmilur Rahman', 'no'),
(194, 'Shamima Khatun', 1575180129, 'Father', '8518101', 'Forth Semester', '1500914782', '1999-04-10', 'Female', '01313033097', '01313033097', 'Active', '2019-12-01 00:07:22', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'shamima@gmail.com', '', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', 'no'),
(195, 'Md.Nasim Mahmud', 1575180041, 'Father', '8518106', 'Forth Semester', '1500914777', '12/18/1999', 'Male', '01768618385', '01768618385', 'Active', '2019-12-01 00:07:22', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'mdnasimmahmud85@gmail.com', '', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', ''),
(196, 'Md.Nokibul Islam', 1575180088, 'Father', '8518105', 'Forth Semester', '1500914778', '2000-01-12', 'Male', '01855214865', '01855214865', 'Active', '2019-12-01 00:07:40', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'nokibulislam720@gmail.com', '', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', 'no'),
(197, 'Mst.jima khatun', 1575178416, 'Father', '6519101', 'Second Semester', '1502008258', '2002-02-17', 'Female', '01799348311', '', 'Active', '2019-12-01 00:10:51', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'jima@gmail.com', '', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Shariful Islam', 'no'),
(198, 'Md.Shimul', 1575180276, 'Father', '6719108', 'Second Semester', '6719108', '2000-04-23', 'Male', '01700642254', '01700642254', 'Active', '2019-12-01 00:10:52', '2020-03-09 05:40:13', 'Regular', 'General', 'Electrical Technology', 'Shimul@gmail.com', '$2y$10$UyFo4wHu5KNapubsyNl07emrhD2W85fg.5vLQk', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(199, 'MD. Asaduzzaman Tamim', 1575180316, 'Father', '19127', 'Second Semester', '1502008273', '2003-07-04', 'Male', '', '01650104868', 'Active', '2019-12-01 00:10:59', '2020-03-10 04:42:27', 'Regular', 'General', 'Graphics Technology', 'tamim@gmail.com', '', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', ''),
(200, 'Arif shahria', 1575179613, 'Father', '19112', 'Second Semester', '1502008261', '2001-12-29', 'Female', '01758196688', '0175819668801758196688', 'Active', '2019-12-01 00:14:12', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'Arifshahria@gmail.com', '$2y$10$5BVwqxM7LPa9.g3nYE.cKeI8xYH3rymSTStw/9', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', ''),
(202, 'MD Naimur Rahman', 1575173374, 'Father', '19120', 'Second Semester', '150200825', '2003-11-10', 'Male', '01795313148', '01795313148', 'Active', '2019-12-01 00:14:48', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', '19120', '$2y$10$iMsYos8YJGL0YnJ8XCr0Re94O/Czmt1/BEnp61', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(204, 'mst.antora khatun', 1575180776, 'father', '6419106', 'Second Semester', '6419106', '2001-01-10', 'Female', '01747760186', '01747760786', 'Active', '2019-12-01 00:19:07', '2020-03-09 05:40:13', 'Regular', 'General', 'Civil Technology', '6419106', '$2y$10$ivfJlzwY9rtfPsfrOFDG8OEmAttcyJhU4SdXMk', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', ''),
(205, 'MD. Milon Mia', 1575180831, 'Father', '19103', 'Second Semester', '1502008257', '2004-02-04', 'Male', '', '01889392669', 'Active', '2019-12-01 00:19:54', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'milon@gmail.com', '$2y$10$8xAk3J7IyJ7z2bhuMoPCNOYBs05M7VWXNK..qD', '2019-2020', '3', '3rd', 'TISI', NULL, 'Md. Shariful Islam', ''),
(206, 'Md.Jisan Ahmed', 1575180804, 'Father', '113736', 'Forth Semester', '1500914784', '01/10/2001', 'Male', '01738529283', '01738529283', 'Active', '2019-12-01 00:20:40', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'mdzisanahmed83@gmail.com', '$2y$10$BoNzjh4zHGhHTPepE8WiwOfVbOMBKQnTpUGoKV', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', ''),
(207, 'Eshita Sarkar', 1575180870, 'Father', '6518122', 'Forth Semester', '1500914811', '2002-08-06', 'Female', '01758171720', '01758171720', 'Active', '2019-12-01 00:22:33', '2020-03-08 02:10:01', 'Regular', 'General', 'Graphics Technology', 'eshitasarkar720@gmail.com', '', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', 'no'),
(208, 'MD. Shajahan Ali', 1575181175, 'Father', '19134', 'Second Semester', '1502008280', '2003-01-02', 'Male', '', '017510', 'Active', '2019-12-01 00:24:33', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', '19134', '$2y$10$G5eDMq5pNia8GVi0Urg0wefW9D3xSe3xHLNQwB', '2019-2020', '3', '1st', 'TISI', NULL, 'A.T.M Tazmilur Rahman', ''),
(209, 'Mst. Yasmin Akter', 1575180980, 'Father', '6519114', 'Second Semester', '1502008284', '2003-06-25', 'Female', '01744369291', '', 'Active', '2019-12-01 00:25:35', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'yasmin@gmail.com', '', '2019-2020', '3', '1st', 'TISI', NULL, 'Md. Arif Ahmed', ''),
(210, 'Md. Sujon Islam', 1575180694, 'Father', '113745', 'Forth Semester', '1500914772', '2002-05-05', 'Male', '01738259251', '01738259251', 'Active', '2019-12-01 00:26:29', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'sojun720@gmail.com', '$2y$10$h/2rum2V.kAm/cjQEbO5IeiNjeSVk7MEqkt7r8', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', ''),
(211, 'MD.Meherab Hossin', 1575107406, 'Father', '19136', 'Second Semester', '1502008292', '2003-02-03', 'Male', '01737033503', '01737033503', 'Active', '2019-12-01 00:27:50', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', '19136', '$2y$10$5RIbui/Ng9bk8dUy7pSYT./rLRILCBXn2jP6bd', '2019-2020', '3', '1st', '', NULL, 'towfiq hasan', 'no'),
(212, 'MD.Nazmus Sakib', 1575181499, 'Father', '113747', 'Forth Semester', '1500914774', '07/27/2003', 'Male', '01302217096', '01302217096', 'Active', '2019-12-01 00:29:35', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'sakibnazmus795@gmail.com', '$2y$10$77GmCx3T5WNf28Mk7XMuAe.eyDf5DD3rbLar65', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', ''),
(213, 'md.mafujjol hossen', 1575181544, 'father', '6419107', 'Second Semester', '6419107', '2002-01-01', 'Male', '01746988431', '01746988431', 'Active', '2019-12-01 00:30:09', '2020-03-09 05:40:13', 'Regular', 'General', 'Civil Technology', '6419107', '$2y$10$ciraV2sc/CZ/Qv4A27gljOjTgQNUhtfEm.i0AM', '2019-2020', '1', '1st', 'TISI', NULL, 'Engr Zakia Sultana', ''),
(214, 'Monawar Hossain', 1575111055, 'Father', '19113', 'Second Semester', '1502008262', '2001-12-21', 'Male', '01714152583', '01714152583', 'Active', '2019-12-01 00:30:51', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'MonawarHossain@gmail.com', '$2y$10$5HDJfn05AjZmRe.W7qLaX.kbUXZrF9HZpCOLDw', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(216, 'Md. Mamunur Rahman', 1575181731, 'Father', '113748', 'Forth Semester', '1500914768', '2002-07-06', 'Male', '01736485527', '01736485527', 'Active', '2019-12-01 00:32:17', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'shuvohr798@gmail.com', '$2y$10$3.UbTNgNOal4S/Goa4jG0Okw1dkIL1.XxXDaZS', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', ''),
(217, 'Rahima Khatun', 1575181669, 'Father', '8518114', 'Forth Semester', '1500914767', '2000-07-08', 'Female', '01736906754', '01736906754', 'Active', '2019-12-01 00:32:31', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'rahima54@gmail.com', '', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', ''),
(218, 'Mst. Marufa Akter ', 1575181732, 'Father', '19139', 'Second Semester', '1502008275', '2003-10-27', 'Female', '', '', 'Active', '2019-12-01 00:33:34', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', '19139', '$2y$10$wGC7a4W7bgbqU6MVTmaNWeh1fhkQBLWjpOAint', '2019-2020', '3', '1st', 'TISI', NULL, 'A.T.M Tazmilur Rahman', ''),
(219, 'Sohel Hamrom', 1575180860, 'Father', '6719111', 'Second Semester', '6719111', '1997-10-13', 'Male', '01728446474', '01728446474', 'Active', '2019-12-01 00:34:03', '2020-03-09 05:40:13', 'Regular', 'General', 'Electrical Technology', 'sohel@gmail.com', '$2y$10$MEetAbrVrJfBI.61/nO8UejrT2.n0GtaQWMeBv', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(220, 'MD. Lokman Hossain', 1575181910, 'Father', '19135', 'Second Semester', '1502008281', '2002-11-30', 'Male', '', '01787957960', 'Active', '2019-12-01 00:36:33', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'lokman@gmail.com', '$2y$10$hu8wV5bZxX9ZPLpuT.rRO.JC6i59dxvgbInCeS', '2019-2020', '3', '1st', 'TISI', NULL, 'A.T.M Tazmilur Rahman', 'no'),
(221, 'Rocky Baba', 1575182059, 'Father', '19104', 'Second Semester', '1502008267', '2002-05-03', 'Male', '01317955804', '01317955804', 'Active', '2019-12-01 00:38:56', '2020-03-09 05:40:13', 'Regular', 'General', 'Graphics Technology', 'RockyBaba@gmail.com', '$2y$10$dEA.zmXk.d0HRyrYZhrTvezXyyq73tJBwCREhw', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(222, 'Muttalib Hossain', 1575182133, 'Father', '6419108', 'Second Semester', '6419108', '2003-03-30', 'Male', '', '', 'Active', '2019-12-01 00:39:13', '2020-03-09 05:40:13', 'Regular', 'General', 'Civil Technology', '6419108', '$2y$10$s0sDEHkmUOpkxLjfdQOwqefUvdy123E3S95aaM', '2019-2020', '3', '1st', 'TISI', NULL, 'Engr Zakia Sultana', ''),
(225, 'Mst. Janntul Fersosi ', 1575182261, 'Father', '19125', 'Second Semester', '1502008287', '2003-06-02', 'Female', '01724018286', '', 'Active', '2019-12-01 00:43:04', '2020-03-09 05:40:14', 'Regular', 'General', 'Graphics Technology', 'jannatul@gamil.com', '$2y$10$z6eq.akWS3QpOI9v5O3IPOD6XDIdl8epgc/T/c', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', ''),
(226, 'Mst.Rima Hasan', 0, 'Father', '19124', 'Second Semester', '15020082288', '2003-05-12', 'Female', '01752637142', '01752637142', 'Active', '2019-12-01 00:43:35', '2020-03-09 05:40:14', 'Regular', 'General', 'Graphics Technology', '19124', '$2y$10$yqUltxUACKOpJY7qpko5B..k/b0qRLa9AUAn7W', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(227, 'Faisal Muhammad Jahin', 1575182324, 'Father', '113742', 'Forth Semester', '1500914776', '01/01/2003', 'Male', '01710098574', '01710098574', 'Active', '2019-12-01 00:43:37', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'faisaljahin18107@gmail.com', '$2y$10$d5iuy5Qr97JDYBMYVkQClOjUNYK3JO7adCy6Du', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', ''),
(228, 'Asme Azom', 1575182449, 'Father', '19109', 'Second Semester', '1502008265', '2003-10-15', 'Male', '01778496981', '01778496981', 'Active', '2019-12-01 00:44:11', '2020-03-09 05:40:14', 'Regular', 'General', 'Graphics Technology', 'AsmeAzom@gmail.com', '$2y$10$X4F1Mq3N0OV0bFXBSwae1ORwhmPITYSQ/5Y5cX', '2019-2020', '3', '1st', 'TISI', NULL, 'towfiq hasan', 'no'),
(229, 'Md:Redoy Sheikh', 1575182487, 'Father', '6419111', 'Second Semester', '6419111', '2002-06-10', 'Male', '', '', 'Active', '2019-12-01 00:44:27', '2020-03-09 05:40:14', 'Regular', 'General', 'Civil Technology', '6419111', '$2y$10$axjrZ2Z.ywT58568A.sO.uy.KZ3XUzs032Cm/d', '2019-2020', '3', '1st', 'TISI', NULL, 'Engr Zakia Sultana', ''),
(230, 'Emon hossain Zoarder', 1575182801, 'Father', '6419112', 'Second Semester', '6419112', '2003-02-07', 'Male', '', '', 'Active', '2019-12-01 00:49:58', '2020-03-09 05:40:14', 'Regular', 'General', 'Civil Technology', '6419112', '$2y$10$IV7vSb6PSy76hbg.0MrsX.OEjKbd8y3sr5wks9', '2019-2020', '3', '1st', 'TISI', NULL, 'Engr Zakia Sultana', ''),
(231, 'Md.Noman Islam', 1575182525, 'Father', '6719118', 'Second Semester', '6719118', '2003-08-18', 'Male', '01700855712', '01700855712', 'Active', '2019-12-01 00:50:18', '2020-03-09 05:40:14', 'Regular', 'General', 'Electrical Technology', 'nomanislam@gmail.com', '$2y$10$HMGPVPCdKHTx.0fL7AFr0OllViEfO77lJ3iPAk', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(232, 'Anika Tahseen', 1575182597, 'Father', '113737', 'Forth Semester', '1500914783', '1997-12-19', 'Female', '01723069472', '01723069472', 'Active', '2019-12-01 00:50:43', '2020-03-08 02:10:01', 'Regular', 'General', 'Computer Science & Technology', 'anikatahseen1998@gmail.com', '', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Jubayer Hossain', ''),
(233, 'Md sumon mia ', 1575183033, 'Father', '177306', 'Forth Semester', '1500914764', '7/6/2002', 'Male', '01758640807', '01758640807', 'Active', '2019-12-01 00:57:37', '2020-03-08 02:10:02', 'Regular', 'General', 'Computer Science & Technology', 'ms3460489@gmail.com', '$2y$10$LrF0FZ9duPTXxS9JvJaO2useGZJUOFFtTSkzou', '2018-2019', '2', '1st', 'TISI', NULL, 'Md. Masud Rana', 'no'),
(234, 'Md.Monirul Islam', 1575193216, 'Father', '6719119', 'Second Semester', '6719119', '2002-12-16', 'Male', '01751420993', '01751420993', 'Active', '2019-12-01 03:43:30', '2020-03-09 05:40:14', 'Regular', 'General', 'Electrical Technology', 'monirul@gmail.com', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(235, 'Md.Hasanul Bari Tufan', 1575193543, 'Father', '6719120', 'Second Semester', '6719120', '2002-04-18', 'Male', '01757389428', '01757389428', 'Active', '2019-12-01 03:49:29', '2020-03-09 05:40:14', 'Regular', 'General', 'Electrical Technology', 'hasanul@gmail.com', '$2y$10$fymfTv8A1ObEvVUNB2nGm.0rlMsrKOEXat.4hf', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(236, 'Toheruz Zaman', 1575196182, 'Father', '6719121', 'Second Semester', '6719121', '2000-10-20', 'Male', '01709769132', '01709769132', 'Active', '2019-12-01 04:36:34', '2020-03-09 05:40:14', 'Regular', 'General', 'Electrical Technology', 'toheruz@gmail.com', '$2y$10$7lzpP4DX3GNbYPhIfKbNmeOgOj1qI2BzIZCl09', '2019-2020', '0', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(237, 'Eakhruzzaman Rony', 1575110801, 'Father', '8517111', 'Sixth Semester', '0000813431', '1996-09-21', 'Male', '01738468570', '01738468570', 'Active', '2019-12-02 03:11:57', '2020-03-09 05:50:02', 'Regular', 'General', 'Computer Science & Technology', 'ezrony2018@gmail.com', '', '2017-2018', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', 'no'),
(238, 'Hazrat Ali', 1575277546, 'Brother', '8517104', 'Sixth Semester', '0000813443', '1998-10-10', 'Male', '01716271186', '01716271186', 'Active', '2019-12-02 03:12:32', '2020-03-09 05:50:02', 'Regular', 'General', 'Computer Science & Technology', 'hazratbd96@gmail.com', '$2y$10$551KFluf4PsqaSdwrmphl.Cvsrk9C6YVmMf1JJ', '2017-2018', '1', '1st', 'TISI', NULL, 'A.T.M Tazmilur Rahman', ''),
(239, 'Md. Ammar Hossain Selim', 1575278286, 'Father', '8517109', 'Sixth Semester', '0000813436', '1999-01-10', 'Male', '01742069914', '01742069914', 'Active', '2019-12-02 03:26:31', '2020-03-09 05:50:02', 'Regular', 'General', 'Computer Science & Technology', 'mdammarhossain75@gmail.com', '', '2017-2018', '1', '1st', 'TISI', NULL, 'A.T.M Tazmilur Rahman', 'no'),
(240, 'Md.Hosen Ali', 1575453966, 'Father', '6719123', 'Second Semester', '6719123', '2000-12-02', 'Male', '01717630693', '01717630693', 'Active', '2019-12-04 04:08:51', '2020-03-09 05:40:14', 'Regular', 'General', 'Electrical Technology', 'hosen@gmailcom', '$2y$10$yo3WUxkNOTqH12uSndp6OumP1PMAr2bD/azFvt', '2019-2020', '1', '1st', 'TISI', NULL, 'Shaima Hanif', 'no'),
(241, 'Delowar Hossain', 0, '', '20241', 'Sixth Semester', '123', '', '', '', '', 'Active', '2020-03-09 06:06:11', '2020-03-09 06:06:11', NULL, 'General', 'Computer Science & Technology', '20241', '$2y$10$6PdCeb3wBsnvtxaOe.eTle.a5675j.swPTGI.F', '2017-2018', '1', '1st', 'TISI', NULL, '', ''),
(242, 'Manzudur Rahman', 0, '', '2010242', 'Sixth Semester', '124', '', '', '', '', 'Active', '2020-03-09 06:06:11', '2020-03-09 06:06:11', NULL, 'General', 'Computer Science & Technology', '2010242', '$2y$10$GhItVKQDkbWRZPmebrazH.x77kxpniWH3vFnod', '2017-2018', '1', '1st', 'TISI', NULL, '', ''),
(243, 'Al Hasnat Nahid', 0, '', '2010243', 'Sixth Semester', '125', '', '', '', '', 'Active', '2020-03-09 06:06:11', '2020-03-09 06:06:11', NULL, 'General', 'Computer Science & Technology', '2010243', '$2y$10$ikCzZYEwuY/qqaCcs0x.GOld7v/mMklev5oBpJ', '2017-2018', '1', '1st', 'TISI', NULL, '', ''),
(244, 'Moktarul Islam', 0, '', '2010244', 'Sixth Semester', '126', '', '', '', '', 'Active', '2020-03-09 06:06:11', '2020-03-09 06:06:11', NULL, 'General', 'Computer Science & Technology', '2010244', '$2y$10$CO99mhosDwaGo4jetEo5Q.0WEPW6Xi77XNoOEQ', '2017-2018', '1', '1st', 'TISI', NULL, '', ''),
(245, 'Mehidi Hasan', 0, '', '2010245', 'Sixth Semester', '127', '', '', '', '', 'Active', '2020-03-09 06:06:12', '2020-03-09 06:06:12', NULL, 'General', 'Computer Science & Technology', '2010245', '$2y$10$FvR7Sdneox5ESAnzjDX8zuUYAr5Q3MEmBQW9Ha', '2017-2018', '1', '1st', 'TISI', NULL, '', ''),
(246, 'Rabbi Hossain', 0, '', '2010246', 'Sixth Semester', '128', '', '', '', '', 'Active', '2020-03-09 06:06:12', '2020-03-09 06:06:12', NULL, 'General', 'Computer Science & Technology', '2010246', '$2y$10$fCfqZ2dWp8fJM8oii/CZXOYly0.qym20Ae6yDa', '2017-2018', '1', '1st', 'TISI', NULL, '', ''),
(247, 'Masud Rana', 0, '', '2010247', 'Sixth Semester', '129', '', '', '', '', 'Active', '2020-03-09 06:06:12', '2020-03-09 06:06:12', NULL, 'General', 'Computer Science & Technology', '2010247', '$2y$10$rsH/70/ZkqLo9D/oOViJbeIk0vjLmshSICnOtO', '2017-2018', '1', '1st', 'TISI', NULL, '', ''),
(248, 'Nijhum Hossain', 0, '', '20248', 'Second Semester', '123456', '', '', '', '', 'Active', '2020-03-10 01:06:29', '2020-03-10 01:06:29', NULL, 'General', 'Computer Science & Technology', '20248', '$2y$10$6ofofH5584OUGNMRHnUcY.BfntIQDndAPdewUR', '2019-2020', '1', '1st', 'TISI', NULL, '', ''),
(249, 'Mst. Tasnim Akter Sony', 1583825639, 'Father-Daughter', '7619117', 'Second Semester', '415621', '2004-11-19', 'Female', '', '01306142116', 'Active', '2020-03-10 01:42:45', '2020-03-10 01:42:45', 'Regular', 'General', 'Ceramic Technology', 'tasnimakter@gmail.com', '$2y$10$xdiq7x9myEdj1tF3fiCk/eiyWOajMwC9a9Jlrk', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', ''),
(250, 'Akash Saha', 1583830895, 'Father-Son', '7619111', 'Second Semester', '415610', '2003-04-01', 'Male', '', '01737619918', 'Active', '2020-03-10 03:09:59', '2020-03-10 04:28:27', 'Regular', 'General', 'Ceramic Technology', 'akashsaha@gmail.com', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', ''),
(251, 'Md. Sohan Hossin', 1583830641, 'Father-Son', '7619112', 'Second Semester', '415612', '2002-02-13', 'Male', '', '01755728365', 'Active', '2020-03-10 03:35:22', '2020-03-10 04:30:19', 'Regular', 'General', 'Ceramic Technology', 'sohanhossin@gmail.com', '', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', ''),
(252, 'Md. Jakaria', 1575453598, 'Father-Son', '7619102', 'Second Semester', '415619', '2003-07-05', 'Male', '', '01728136995', 'Active', '2020-03-10 03:41:19', '2020-03-10 03:41:19', 'Regular', 'General', 'Ceramic Technology', 'jakaria@gmail.com', '$2y$10$oBkyRzGlY2IpgErvvMFMnOM5I5NLLsAqGChyA3', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', ''),
(253, 'Bishwanath Chandra Sutradhaor', 1583830385, 'Father-Son', '7619104', 'Second Semester', '415617', '2001-01-23', 'Male', '', '01402356692', 'Active', '2020-03-10 03:57:32', '2020-03-10 03:57:32', 'Regular', 'General', 'Ceramic Technology', 'bishwanath@gmail.com', '$2y$10$S16yqRWUXaqNme/.2EOPU.uXfKIRDM0dBeNjG.', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', ''),
(254, 'Md. Abdul Alim', 1583830023, 'Father-Son', '7619108', 'Second Semester', '415624', '2002-12-31', 'Male', '', '01739492705', 'Active', '2020-03-10 04:13:34', '2020-03-10 04:13:34', 'Regular', 'General', 'Ceramic Technology', 'abdulalim@gmail.com', '$2y$10$9K1fP5smvSR7Lc8dDrkhuuC83He8hWI7.qEmun', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', ''),
(255, 'Md. Kamrul Islam', 1583826379, 'Father-Son', '7619110', 'Second Semester', '415623', '2017-11-25', 'Male', '', '01781940903', 'Active', '2020-03-10 04:18:50', '2020-03-10 04:18:50', 'Regular', 'General', 'Ceramic Technology', 'kamrulislam@gmail.com', '$2y$10$mgGHKqiHvmlXTEMVUsV7FOLUi3S.oPXkT59VGa', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', ''),
(256, 'Fayel Hossen Tanim', 1583830205, 'Father-Son', '7619106', 'Second Semester', '415611', '2003-12-12', 'Male', '', '01755773305', 'Active', '2020-03-10 04:25:32', '2020-03-10 04:25:32', 'Regular', 'General', 'Ceramic Technology', 'fayelhossen@gmail.com', '$2y$10$ORmkj5FNpTcAmPQnb9fp4OF5aWfJXT/E4QS69y', '2019-2020', '1', '1st', 'TISI', NULL, 'Jakiya Jafrin', '');

-- --------------------------------------------------------

--
-- Table structure for table `students_child`
--

CREATE TABLE `students_child` (
  `id` int(10) UNSIGNED NOT NULL,
  `roll` int(11) NOT NULL,
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
(126, 8518101, 'Bogura', 'Bogura', 'Rajshahi', 'Lotifpur', '2019-11-30 02:18:38', '2019-11-30 02:18:38'),
(129, 6719101, 'Narsatpur', 'Bogura', 'Rajshahi', 'Muriall', '2019-11-30 03:19:06', '2019-11-30 03:19:06'),
(130, 981382, 'Gokul', 'Bogura', 'Rajshahi', 'Gokul', '2019-11-30 03:32:31', '2019-11-30 03:32:31'),
(131, 19112, 'Pollimongol Hat', 'Bogura', 'Rajshahi', 'calitabari', '2019-11-30 03:33:58', '2020-03-10 00:23:50'),
(132, 6419101, 'bogura', 'bogura', 'rajshahi', 'baropur', '2019-11-30 03:36:07', '2019-11-30 03:43:28'),
(133, 6719102, 'Tushbhandar', 'Lalmonirhat', 'Rangpur', 'Gegra', '2019-11-30 03:40:49', '2019-11-30 03:40:49'),
(134, 8519155, 'Shapahar', 'Naogaon', 'Rajshahi', 'Vat karaa', '2019-11-30 03:43:27', '2019-11-30 03:46:46'),
(135, 981383, 'Perihat', 'Bogura', 'Rajshahi', 'Shurimara', '2019-11-30 03:46:01', '2019-11-30 03:46:01'),
(137, 981381, 'Ayra', 'Bogura', 'Rajshahi', 'Amoin', '2019-11-30 03:47:40', '2019-11-30 03:47:40'),
(138, 981372, 'Sherpur', 'Bogura', 'Rajshahi', 'Dublagari', '2019-11-30 03:48:12', '2019-11-30 03:48:12'),
(139, 6419102, 'chandaicona', 'bogura', 'rajshahi', 'chandaicona', '2019-11-30 03:50:10', '2019-11-30 04:01:06'),
(140, 6517104, 'Belkuri', 'Alidowna', 'Rajshahi', 'Alidowna', '2019-11-30 03:51:07', '2019-12-02 04:10:48'),
(141, 8519111, 'Shatibaria', 'Rangpur', 'Rangpur', 'Boromirjapukur', '2019-11-30 03:52:07', '2019-11-30 04:44:27'),
(143, 6719104, 'Saintmartin', 'Cox\'sBazar', 'Chittagong', 'SaintmartinKona Para', '2019-11-30 03:57:54', '2019-11-30 04:37:50'),
(146, 159921, 'bogura', 'Bogura', 'Rajshahi', 'Rojakpur', '2019-11-30 04:03:40', '2019-11-30 04:03:40'),
(149, 8519114, 'Ashrondo', 'Nougun', 'Rajshahi', 'Moruil', '2019-11-30 04:11:38', '2019-11-30 04:11:38'),
(151, 6419125, 'Kalaipara', 'Bogura', 'Rajshahi', 'Kantannagor', '2019-11-30 04:24:21', '2019-11-30 04:24:21'),
(152, 8519115, 'Binecapor', 'Bogura', 'Rajshahi', 'Khauni', '2019-11-30 04:26:46', '2019-11-30 04:26:46'),
(153, 8519157, 'Sher nogor', 'Sirajgonj', 'Rajshahi', 'MasudPur', '2019-11-30 04:29:39', '2019-11-30 04:29:39'),
(154, 6419127, 'Alanghi', 'Bogura', 'Rajshahi', 'Haspotol', '2019-11-30 04:31:57', '2019-11-30 04:31:57'),
(155, 6419128, 'RDA', 'Bogura', 'Rajshahi', 'Jamalpur', '2019-11-30 04:37:54', '2019-11-30 04:37:54'),
(156, 6419129, 'sHERPUR', 'Bogura', 'Rajshahi', 'mATPARA', '2019-11-30 04:41:48', '2019-11-30 04:41:48'),
(157, 8519116, 'Nojipur', 'Nougun', 'Rajshahi', 'Nojipur', '2019-11-30 04:43:03', '2019-11-30 04:43:03'),
(158, 8519156, 'Vobanipur', 'Bogura', 'Rajshahi', 'Aminpur', '2019-11-30 04:44:56', '2019-11-30 04:44:56'),
(159, 6419144, 'Jamalpur', 'Bogura', 'Rajshahi', 'Jamalpur', '2019-11-30 04:45:36', '2019-11-30 04:45:36'),
(160, 8519118, 'RDA', 'Bogura', 'Rajshahi', 'Jamalpur', '2019-11-30 04:51:33', '2019-11-30 04:51:33'),
(161, 6419105, 'sonka', 'bogura', 'rajshahi', 'sonka', '2019-11-30 04:57:22', '2019-11-30 10:43:23'),
(162, 8519130, 'darkipara', 'Bogura', 'Rajshahi', 'darkipara', '2019-11-30 04:57:53', '2019-11-30 04:57:53'),
(163, 8519122, 'Kollanpur', 'Sirajgonj', 'Rajshahi', 'Kumar Saldai', '2019-11-30 04:58:23', '2019-11-30 04:58:23'),
(164, 6518114, 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', '2019-11-30 04:58:29', '2019-12-02 03:50:49'),
(165, 113766, 'Sherpur', 'Bogura', 'Rajshahi', 'Dublagari', '2019-11-30 05:04:58', '2019-11-30 05:04:58'),
(166, 8519133, 'Sharpur', 'Bogura', 'Rajshahi', 'Town coloni', '2019-11-30 05:09:41', '2019-11-30 05:09:41'),
(167, 113772, 'Kurigram', 'Kurigram', 'Kurigram', 'Kurigram', '2019-11-30 05:10:13', '2019-11-30 05:10:13'),
(168, 113775, 'shapjram', 'Bogra Sadar', 'Bogra Sadar', 'shapjram', '2019-11-30 05:12:57', '2019-11-30 05:12:57'),
(169, 981375, 'bogura', 'Bogura', 'Rajshahi', 'Rojakpur', '2019-11-30 05:14:25', '2019-11-30 05:14:25'),
(170, 981378, 'Shahajanpur', 'Bogura', 'Rajshahi', 'Majhira', '2019-11-30 05:14:25', '2019-11-30 05:14:25'),
(171, 113762, 'Dupchaceya', 'Dupchaceya', 'Dupchaceya', 'Dupchaceya', '2019-11-30 05:17:09', '2019-11-30 05:17:09'),
(172, 113773, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-11-30 05:25:04', '2019-11-30 05:25:04'),
(173, 6517103, 'Puranapoil', 'Joypurhat', 'Joypurhat(Shadar)', 'Shyampur', '2019-11-30 05:25:48', '2019-12-02 04:04:22'),
(174, 113770, 'polhart', 'sodor', 'denajpur', 'polhart', '2019-11-30 05:26:11', '2019-11-30 05:26:11'),
(175, 6518125, 'Bogura', 'Bogura', 'Bogura', 'Bogura', '2019-11-30 05:26:43', '2019-12-02 03:58:45'),
(176, 177308, 'Joypurhat', 'akkelpur', 'Rajshahi', 'sricondighi', '2019-11-30 05:26:59', '2019-11-30 05:26:59'),
(177, 113771, 'Noagon', 'Noagon', 'Noagon', 'Noagon', '2019-11-30 05:31:25', '2019-11-30 05:31:25'),
(178, 981384, 'Puranapoil', 'Joypurhat', 'Joypurhat(Shadar)', 'Shyampur', '2019-11-30 05:36:18', '2019-11-30 05:36:18'),
(179, 177307, 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', 'Bogra Sadar', '2019-11-30 05:38:07', '2019-11-30 05:38:07'),
(180, 8519134, 'Kollanpur', 'Sirajgonj', 'Rajshahi', 'Kumar Saldai', '2019-11-30 21:49:04', '2019-11-30 21:49:04'),
(181, 8519121, 'Chondon Ghati', 'Sirajgonj', 'Rajshahi', 'Garamasi', '2019-11-30 22:13:28', '2019-11-30 22:13:28'),
(182, 8519135, 'Kicok', 'Bogura', 'Rajshahi', 'Kicok belai', '2019-11-30 22:19:45', '2019-11-30 22:19:45'),
(183, 8519125, 'Vatra', 'Bogura', 'Rajshahi', 'Amgacii', '2019-11-30 22:20:31', '2019-11-30 22:20:31'),
(184, 8519136, 'Belkuri', 'Nougun', 'Rajshahi', 'Malahar', '2019-11-30 22:25:24', '2019-11-30 22:25:24'),
(185, 8519126, 'Bogura Sodor', 'Bogura', 'Rajshahi', 'ChokSutrapur', '2019-11-30 22:28:21', '2019-11-30 22:28:21'),
(186, 8519139, 'Madla', 'Bogura', 'Rajshahi', 'Niscintopur', '2019-11-30 22:30:37', '2019-11-30 22:30:37'),
(187, 8519129, 'Pirgaca', 'Bogura', 'Rajshahi', 'Komolpur(Doyagriya)', '2019-11-30 22:33:33', '2019-11-30 22:34:48'),
(188, 8519140, 'Majira', 'Bogura', 'Rajshahi', 'Dumor pukur', '2019-11-30 22:36:34', '2019-11-30 22:36:34'),
(189, 8519128, 'Kunder Hat', 'Bogura', 'Rajshahi', 'Teghori', '2019-11-30 22:44:38', '2019-11-30 22:44:38'),
(190, 8519145, 'perihat', 'Bogura', 'Rajshahi', 'Ramchondopur', '2019-11-30 22:45:48', '2019-11-30 22:45:48'),
(191, 8519147, 'perihat', 'Bogura', 'Rajshahi', 'Ramchondopur', '2019-11-30 22:50:32', '2019-11-30 22:50:32'),
(192, 8519154, 'Pirgaca', 'Bogura', 'Rajshahi', 'Komolpur(Doyagriya)', '2019-11-30 22:50:36', '2019-11-30 22:50:36'),
(193, 8519148, 'Madla', 'Bogura', 'Rajshahi', 'Sharkul', '2019-11-30 22:55:10', '2019-11-30 22:55:10'),
(194, 8519152, 'Dulotpur', 'Sirajgonj', 'Rajshahi', 'belkuci', '2019-11-30 23:00:01', '2019-11-30 23:00:01'),
(195, 8519151, 'Shajjatpur', 'Sirajgonj', 'Rajshahi', 'Dorgahat', '2019-11-30 23:27:12', '2019-11-30 23:27:12'),
(196, 113752, 'Bollomjhar', 'Gaibandha', 'Rangpur', 'Modhodhanpara', '2019-11-30 23:56:35', '2019-11-30 23:56:35'),
(197, 6719106, 'Berebari', 'Bogura', 'Rajshahi', 'Berebari', '2019-11-30 23:57:23', '2019-11-30 23:57:23'),
(198, 6519128, 'sonka', 'Bogura', 'Rajshahi', 'sonka', '2019-11-30 23:57:45', '2019-12-02 03:55:52'),
(199, 6519133, 'Bogura', 'Bogura', 'Rajshahi', 'Koloni', '2019-11-30 23:59:53', '2019-12-02 03:53:19'),
(202, 8518101, 'Mullickpur', 'Naogaon', 'Rajshahi', 'Patiamly', '2019-12-01 00:07:22', '2019-12-02 03:51:41'),
(203, 8518106, 'Rasulpur', 'Naogaon', 'Rajshahi', 'Gidisha', '2019-12-01 00:07:22', '2019-12-02 04:12:56'),
(204, 8518105, 'Beshubari', 'Gaibandha', 'Rangpur', 'Satana Balua', '2019-12-01 00:07:40', '2019-12-02 04:14:41'),
(205, 6519101, 'Bagbari', 'Bogura', 'Rajshahi', 'small italy', '2019-12-01 00:10:51', '2019-12-02 03:54:40'),
(206, 6719108, 'Gabtoli', 'Bogura', 'Rajshahi', 'hasnapara', '2019-12-01 00:10:52', '2019-12-01 00:10:52'),
(207, 19127, 'Shapahar', 'Noagon', 'Rajshahi', 'Shapahar', '2019-12-01 00:10:59', '2019-12-01 00:10:59'),
(208, 19112, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-12-01 00:14:12', '2019-12-01 00:14:12'),
(210, 19120, 'chondati', 'Sirajganj', 'Rajshahi', 'Belkuchi', '2019-12-01 00:14:48', '2019-12-01 00:14:48'),
(212, 6419106, 'erulia', 'bogura', 'rajshahi', 'bandighi', '2019-12-01 00:19:07', '2019-12-01 00:19:07'),
(213, 19103, 'Poyalgacha', 'Bogura', 'Rajshahi', 'Khatash', '2019-12-01 00:19:54', '2019-12-01 00:19:54'),
(214, 113736, 'Binodpur', 'Chapainawabgonj', 'Rajshahi', 'Bissawnathpur', '2019-12-01 00:20:40', '2019-12-01 00:20:40'),
(215, 6518122, 'Bamoile', 'Naogaon', 'Rajshahi', 'Khoraile', '2019-12-01 00:22:33', '2019-12-02 03:50:16'),
(216, 19134, 'Gohail', 'Bogura', 'Rajshahi', 'Agra', '2019-12-01 00:24:33', '2019-12-01 00:24:33'),
(217, 6519114, 'vullibazar', 'thakurgoan', 'RANGPUR', 'borobaliya', '2019-12-01 00:25:35', '2019-12-02 04:00:28'),
(218, 113745, 'Domar', 'Nilphamary', 'Rangpur', 'Chikonmati', '2019-12-01 00:26:29', '2019-12-01 00:26:29'),
(219, 19136, 'Sherpur', 'Bogura', 'Rajshahi', 'Ullipur', '2019-12-01 00:27:50', '2019-12-01 00:27:50'),
(220, 113747, 'Bogura', 'Bogura', 'Rajshahi', 'Koloni', '2019-12-01 00:29:35', '2019-12-01 00:29:35'),
(221, 6419107, 'boalia', 'sirajgong', 'rajshahi', 'chakcoubila', '2019-12-01 00:30:09', '2019-12-01 00:30:09'),
(222, 19113, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-12-01 00:30:51', '2019-12-01 00:30:51'),
(224, 113748, 'Naruamala', 'Bogura', 'Rajshahi', 'Sagatiya', '2019-12-01 00:32:17', '2019-12-01 00:32:17'),
(225, 8518114, 'Chamrul', 'Bogura', 'Rajshahi', 'Johal Matai', '2019-12-01 00:32:31', '2019-12-09 01:56:16'),
(226, 6719111, 'Daudpur', 'Dinajpur', 'Rangpur', 'Horirampur', '2019-12-01 00:34:03', '2019-12-01 00:34:03'),
(227, 19135, 'Gohail', 'Bogura', 'Rajshahi', 'Agra', '2019-12-01 00:36:33', '2019-12-01 00:36:33'),
(228, 19104, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-12-01 00:38:56', '2019-12-01 00:38:56'),
(229, 6419108, 'Kundarhat', 'Bogura', 'Rajshahi', 'VatGram', '2019-12-01 00:39:13', '2019-12-01 00:39:13'),
(232, 19125, 'kundarhat', 'Bogura', 'Rajshahi', 'vatgram', '2019-12-01 00:43:04', '2019-12-01 00:43:04'),
(233, 19124, 'Kunder', 'Nondigram', 'Rajshahi', 'Vatgram', '2019-12-01 00:43:35', '2019-12-01 00:43:35'),
(234, 113742, 'Rahmatpur', 'Gaibandha', 'Rangpur', 'Dhopadanga', '2019-12-01 00:43:37', '2019-12-01 00:43:37'),
(235, 19109, 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', 'Bogura Sadar', '2019-12-01 00:44:11', '2019-12-01 00:44:11'),
(236, 6419111, 'BoguraSodor', 'Bogura', 'Rajshahi', 'Fulbari Moddapara', '2019-12-01 00:44:27', '2019-12-01 00:44:27'),
(237, 6419112, 'KantoNogor', 'Bogura', 'Rajshahi', 'Kantannagor', '2019-12-01 00:49:58', '2019-12-01 00:49:58'),
(238, 6719118, 'Poyalgasah', 'Bogura', 'Rajshahi', 'Shonaidhighe', '2019-12-01 00:50:18', '2019-12-01 00:50:18'),
(239, 113737, 'Bogra', 'Shahjahanpur', 'Rajshahi', 'Bogra', '2019-12-01 00:50:43', '2019-12-01 00:52:25'),
(240, 177306, 'shariyakandi', 'Bogura', 'Rajshahi', 'hindukandi', '2019-12-01 00:57:37', '2019-12-01 00:57:37'),
(241, 6719119, 'Bhawanigonj', 'Rajshahi', 'Rajshahi', 'Paharpur', '2019-12-01 03:43:30', '2019-12-01 03:43:30'),
(242, 6719120, 'Lohakuchi', 'Lalmonirhat', 'Rangpur', 'Shibram', '2019-12-01 03:49:29', '2019-12-01 03:49:29'),
(243, 6719121, 'Gohail', 'Bogura', 'Rajshahi', 'Lotagari', '2019-12-01 04:36:34', '2019-12-01 04:36:34'),
(244, 8517111, 'Haripur', 'Thakurgaon', 'Rangpur', 'Vhaturia', '2019-12-02 03:11:57', '2019-12-02 03:11:57'),
(245, 8517104, 'Namurihat', 'Lalmonirhat', 'Rangpur', 'Namuri', '2019-12-02 03:12:32', '2019-12-02 03:12:32'),
(246, 8517109, 'Pirgasha', 'Bogura', 'Rajshahi', 'kamalpur', '2019-12-02 03:26:31', '2019-12-02 03:26:31'),
(247, 6719123, 'Kundarhut', 'Bogura', 'Rajshahi', 'Ailpuniea', '2019-12-04 04:08:51', '2019-12-04 04:08:51'),
(248, 7619117, 'Gobindagang', 'Gaibandha', 'Rajshahi', 'Pantamara', '2020-03-10 01:42:45', '2020-03-10 01:42:45'),
(249, 7619111, 'Merihat', 'Gaibandha', 'Dibajpur', 'Kordoma para', '2020-03-10 03:09:59', '2020-03-10 04:28:28'),
(250, 7619112, 'Bogura Sadar', 'Bogura', 'Rajshahi', 'Erulia', '2020-03-10 03:35:22', '2020-03-10 04:30:19'),
(251, 7619102, 'Natua para', 'Shirajgong', 'Rajshahi', 'Khoyapara', '2020-03-10 03:41:19', '2020-03-10 03:41:19'),
(252, 7619104, 'Madla', 'Bogura', 'Rajshahi', 'Madla', '2020-03-10 03:57:32', '2020-03-10 03:57:32'),
(253, 7619108, 'shekherkola', 'Bogura', 'Rajshahi', 'Moshishbathan', '2020-03-10 04:13:34', '2020-03-10 04:13:34'),
(254, 7619110, 'Alompur', 'Kushtia', 'Khulna', 'Baliapara', '2020-03-10 04:18:50', '2020-03-10 04:18:50'),
(255, 7619106, 'Gogonpur', 'naogaon', 'Rajshahi', 'Adhuna', '2020-03-10 04:25:32', '2020-03-10 04:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_educational_qualification`
--

CREATE TABLE `student_educational_qualification` (
  `eqalification_id` int(11) NOT NULL,
  `student_roll` varchar(191) NOT NULL,
  `exam_name` varchar(191) NOT NULL,
  `borad` varchar(191) NOT NULL,
  `reg_no` varchar(191) NOT NULL,
  `roll_no` varchar(191) NOT NULL,
  `group` varchar(191) NOT NULL,
  `passing_year` varchar(191) NOT NULL,
  `gpa` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_educational_qualification`
--

INSERT INTO `student_educational_qualification` (`eqalification_id`, `student_roll`, `exam_name`, `borad`, `reg_no`, `roll_no`, `group`, `passing_year`, `gpa`, `created_at`, `updated_at`) VALUES
(52, '8518101', 'SSC', 'Rajshahi', '1612788931', '567592', 'Humanities', '2019', '3.89', '2019-11-30 08:18:38', '0000-00-00 00:00:00'),
(55, '6719101', 'SSC', 'Rajshahi', '6719101', '6719101', '', '2019', '3.50', '2019-11-30 09:19:06', '0000-00-00 00:00:00'),
(56, '981382', 'SSC', 'Rajshahi', '1012660347', '812129', 'Business Studies', '2013', '4.50', '2019-11-30 09:32:31', '0000-00-00 00:00:00'),
(57, '981382', 'HSC', 'Rajshahi', '1012660347', '515892', 'Business Studies', '2015', '3.17', '2019-11-30 09:32:31', '0000-00-00 00:00:00'),
(60, '6719102', 'SSC', 'Dinajpur', '6719102', '6719102', 'Business', '2019', '3.32', '2019-11-30 09:40:49', '0000-00-00 00:00:00'),
(63, '981383', 'SSC', 'Rajshahi', '1012682697', '550556', 'Humanities', '2013', '3.88', '2019-11-30 09:46:01', '0000-00-00 00:00:00'),
(65, '19155', 'SSC', 'Rajshahi', '1412701490', '536342', 'Humanities', '2019', '3.55', '2019-11-30 09:46:46', '0000-00-00 00:00:00'),
(75, '19102', 'ssc', 'rajshahi', '1612801664', '571644', 'humanities', '2019', '4.56', '2019-11-30 10:01:06', '0000-00-00 00:00:00'),
(76, '981381', 'SSC', 'Dhaka', '129876', '272179', '', '2017', '4.68', '2019-11-30 10:02:00', '0000-00-00 00:00:00'),
(78, '981372', 'SSC', 'Rajshahi', '1412780914', '156773', 'Science', '2017', '4.77', '2019-11-30 10:04:03', '0000-00-00 00:00:00'),
(81, '8519114', 'SSC', 'Rajshahi', '1612710999', '133672', 'Science', '2019', '4.28', '2019-11-30 10:11:38', '0000-00-00 00:00:00'),
(85, '6419125', 'SSC', 'Rajshahi', '1612798715', '169004', 'Science', '2019', '4.28', '2019-11-30 10:24:21', '0000-00-00 00:00:00'),
(86, '8519115', 'SSC', 'Rajshahi', '1612795577', '167300', 'Science', '2019', '3.50', '2019-11-30 10:26:46', '0000-00-00 00:00:00'),
(88, '6419102', '', '', '', '', '', '', '', '2019-11-30 10:30:44', '0000-00-00 00:00:00'),
(90, '6719103', 'SSC', 'Chittagong', '6719104', '6719103', 'Humanities', '2019', '3.17', '2019-11-30 10:37:50', '0000-00-00 00:00:00'),
(91, '6419128', 'SSC', 'Rajshahi', '1612825899', '178333', 'Science', '2019', '4.33', '2019-11-30 10:37:54', '0000-00-00 00:00:00'),
(92, '6419129', 'SSC', 'Rajshahi', '1612804605', '171364', 'Science', '2019', '4.28', '2019-11-30 10:41:48', '0000-00-00 00:00:00'),
(93, '8519116', 'SSC', 'Madrasah', '1618893571', '160373', 'Humanities', '2019', '3.88', '2019-11-30 10:43:03', '0000-00-00 00:00:00'),
(94, '8519156', 'SSC', 'Dinajpur', '1617625738', '194856', 'Science', '2019', '3.78', '2019-11-30 10:44:27', '0000-00-00 00:00:00'),
(95, '8519156', 'SSC', 'Rajshahi', '1612803656', '270885', 'Science', '2019', '4.22', '2019-11-30 10:44:56', '0000-00-00 00:00:00'),
(96, '6419144', 'SSC', 'Dhaka', '1518876653', '177791', 'Humanaties', '2019', '3.75', '2019-11-30 10:45:36', '0000-00-00 00:00:00'),
(97, '8519118', 'SSC', 'Rajshahi', '1618875688', '179425', 'Science', '2019', '4.28', '2019-11-30 10:51:33', '0000-00-00 00:00:00'),
(99, '8519130', 'SSC', 'Rajshahi', '1612802468', '171266', 'Science', '2019', '4.28', '2019-11-30 10:57:53', '0000-00-00 00:00:00'),
(100, '8519122', 'SSC', 'Rajshahi', '1612771636', '156199', 'Science', '2019', '4.22', '2019-11-30 10:58:23', '0000-00-00 00:00:00'),
(102, '113766', 'SSC', 'Rajshahi', '630105', '524644', 'Science', '2016', '4.29', '2019-11-30 11:04:58', '0000-00-00 00:00:00'),
(103, '113768', 'SSC', 'Rajshahi', '1512693404', '129106', '', '2018', '3.69S', '2019-11-30 11:07:43', '0000-00-00 00:00:00'),
(104, '8519133', 'SSC', 'Rajshahi', '1612805196', '811554', 'Business', '2019', '3.78', '2019-11-30 11:09:41', '0000-00-00 00:00:00'),
(105, '113772', 'SSC', 'Dhaka', '1500914792', '113772', 'science', '2015', '4.56', '2019-11-30 11:10:13', '0000-00-00 00:00:00'),
(106, '113775 ', 'SSC', 'madrasah', '172881', '172881', 'general', '2018', '4.00', '2019-11-30 11:12:57', '0000-00-00 00:00:00'),
(107, '981375', 'SSC', 'Madrasha', '159921', '1418875703', 'Arts', '2017', '3.90', '2019-11-30 11:14:25', '0000-00-00 00:00:00'),
(108, '981378', 'SSC', 'Rajshahi', '1212775898', '146251', 'Science', '2015', '4.33', '2019-11-30 11:14:25', '0000-00-00 00:00:00'),
(109, '113762', 'SSC', 'Dhaka', '1518873911', '169891', 'Generel', '2018', '3.45', '2019-11-30 11:17:09', '0000-00-00 00:00:00'),
(110, '113773', 'SSC', 'Rajshahi', '725854', '328214', 'Humanities', '2010', '3.25', '2019-11-30 11:25:04', '0000-00-00 00:00:00'),
(112, '113770', 'SSC', 'dinajpur', '1517739141', '234422', 'science', '2018', '3.94', '2019-11-30 11:26:11', '0000-00-00 00:00:00'),
(114, '177308', 'SSC', 'Rajshahi', '183718', '183718', 'Science', '2018', '4.78', '2019-11-30 11:26:59', '0000-00-00 00:00:00'),
(115, '113771', 'SSC', 'Rajshahi', '1512690077', '538110', 'Humanities', '2018', '2.89', '2019-11-30 11:31:25', '0000-00-00 00:00:00'),
(116, '981384', 'SSC', 'Rajshahi', '1312784902', '157732', 'Science', '2016', '4.78', '2019-11-30 11:36:18', '0000-00-00 00:00:00'),
(117, '177307', 'SSC', 'Rajsahi', '814557', '814557', 'comash', '2018', '3.89', '2019-11-30 11:38:07', '0000-00-00 00:00:00'),
(119, '19105', 'ssc', 'rajshahi', '1612803028', '571506', 'humanities', '2019', '2.94', '2019-11-30 16:43:23', '0000-00-00 00:00:00'),
(120, '8519157', 'SSC', 'Rajshahi', '1612710208', '134062', 'Science', '2019', '4.72', '2019-11-30 17:29:40', '0000-00-00 00:00:00'),
(121, '8519157', 'SSC', 'Rajshahi', '1612771639', '559012', 'Humanities', '2019', '3.22', '2019-11-30 17:29:40', '0000-00-00 00:00:00'),
(122, '8519134', 'SSC', 'Rajshahi', '1612771636', '156199', 'Science', '2019', '4.22', '2019-12-01 03:49:04', '0000-00-00 00:00:00'),
(123, '8519121', 'SSC', 'Rajshahi', '1618883765', '415581', 'Science', '2019', '4.06', '2019-12-01 04:13:28', '0000-00-00 00:00:00'),
(125, '8519125', 'SSC', 'Rajshahi', '1612812856', '173311', 'Science', '2019', '3.56', '2019-12-01 04:20:31', '0000-00-00 00:00:00'),
(126, '8519136', 'SSC', 'Rajshahi', '1612688088', '533072', 'Humanities', '2019', '3.89', '2019-12-01 04:25:24', '0000-00-00 00:00:00'),
(127, '8519126', 'SSC', 'Rajshahi', '1112850270', '550054', 'Humanities', '2014', '3.75', '2019-12-01 04:28:21', '0000-00-00 00:00:00'),
(128, '8519139', 'SSC', 'Madrasah', '1618875622', '171698', 'Humanities', '2019', '4.13', '2019-12-01 04:30:37', '0000-00-00 00:00:00'),
(130, '8519129', 'SSC', 'Rajshahi', '1618876538', '567785', 'Humanities', '2019', '3.72', '2019-12-01 04:34:48', '0000-00-00 00:00:00'),
(131, '8519140', 'SSC', 'Madrasah', '1418884304115', '416925', 'Science', '2017', '3.78', '2019-12-01 04:36:34', '0000-00-00 00:00:00'),
(133, '8519128', 'SSC', 'Rajshahi', '1612812931', '573183', 'Humanities', '2019', '3.72', '2019-12-01 04:44:38', '0000-00-00 00:00:00'),
(135, '159921', 'SSC', 'Rajshahi', '1418875703', '159921', 'Arts', '2017', '3.90', '2019-12-01 04:46:02', '0000-00-00 00:00:00'),
(136, '8519147', 'SSC', 'Rajshahi', '1412801693', '162785', 'Science', '2017', '4.32', '2019-12-01 04:50:32', '0000-00-00 00:00:00'),
(137, '8519154', 'SSC', 'Rajshahi', '1412772824', '153797', 'Science', '2017', '4.68', '2019-12-01 04:50:36', '0000-00-00 00:00:00'),
(138, '6419127', 'SSC', 'Rajshahi', '1212752077', '304326', 'Humanaties', '2016', '3.11', '2019-12-01 04:51:40', '0000-00-00 00:00:00'),
(139, '8519148', 'Dakhil', 'Madrasah', '1518877249', '415931', 'Science', '2019', '3.94', '2019-12-01 04:55:10', '0000-00-00 00:00:00'),
(141, '8519151', 'SSC', 'Rajshahi', '1612760240', '153918', 'Science', '2019', '3.78', '2019-12-01 05:27:12', '0000-00-00 00:00:00'),
(142, '113752', 'SSC', 'Dinajpur', '1217633513', '162824', 'Science', '2015', '4.39', '2019-12-01 05:56:35', '0000-00-00 00:00:00'),
(143, '6719106', 'SSC', 'Rajshahi', '6719106', '6719106', 'Science', '2018', '3.67', '2019-12-01 05:57:23', '0000-00-00 00:00:00'),
(152, '6719108', 'SSC', 'Rajshahi', '6719108', '6719108', 'Humanities', '2019', '3.28', '2019-12-01 06:10:52', '0000-00-00 00:00:00'),
(154, '19112', 'SSC', 'Rajshahi', '1502008261', '19112', 'Dhaka', '2018', '3.69', '2019-12-01 06:14:12', '0000-00-00 00:00:00'),
(156, '19120', 'ssc', 'Rajshahi', '1618883766', '155574', 'Science', '2019', '4.17', '2019-12-01 06:14:48', '0000-00-00 00:00:00'),
(158, '6419106', 'ssc', 'rajshahi', '1312755100', '556293', 'humanities', '2016', '3.94', '2019-12-01 06:19:07', '0000-00-00 00:00:00'),
(159, '19103', 'SSC', 'Rajshahi', '1612825605', '179323', 'Science', '2019', '4.44', '2019-12-01 06:19:54', '0000-00-00 00:00:00'),
(160, '113736', 'SSC', 'Rajshahi', '1512646531', '115900', 'Science', '2018', '3.50', '2019-12-01 06:20:40', '0000-00-00 00:00:00'),
(162, '19134', 'SSC', 'Rajshahi', '1612827198', '812146', 'Business Studies', '2019', '3.39', '2019-12-01 06:24:33', '0000-00-00 00:00:00'),
(164, '113745', 'SSC', 'Dinajpur', '1517678321', '630921', 'Humanities', '2018', '3.11', '2019-12-01 06:26:29', '0000-00-00 00:00:00'),
(165, '19136', 'SSC', 'Rajshahi', '1612820131', '811559', 'Com', '2019', '3.94', '2019-12-01 06:27:50', '0000-00-00 00:00:00'),
(166, '113747', 'SSC', 'Madrasaha', '1518878191', '172833', 'General', '2018', '4.15', '2019-12-01 06:29:35', '0000-00-00 00:00:00'),
(167, '6419107', 'ssc', 'dhaka', '1518879155', '414777', 'science', '2018', '3.39', '2019-12-01 06:30:09', '0000-00-00 00:00:00'),
(168, '19113', 'SSC', 'Rajshahi', '1502008262', '19113', 'Dhaka', '2019', '3.69', '2019-12-01 06:30:51', '0000-00-00 00:00:00'),
(170, '113748', 'Dakhil', 'Madrasha', '1518872857', '415776', 'Science', '2018', '3.83', '2019-12-01 06:32:17', '0000-00-00 00:00:00'),
(172, '19139', 'SSC', 'Rajshahi', '1612803471', '571253', '', '', '', '2019-12-01 06:33:34', '0000-00-00 00:00:00'),
(173, '6719111', 'SSC', 'Dinajpur', '6719111', '6719111', 'Humanities', '2015', '3.22', '2019-12-01 06:34:03', '0000-00-00 00:00:00'),
(174, '19135', 'SSC', 'Rajshahi', '1612827190', '812140', 'Business Studies', '2019', '3.61', '2019-12-01 06:36:33', '0000-00-00 00:00:00'),
(175, '19104', 'SSC', 'Rajshahi', '1502008267', '19104', 'Humanities', '2019', '3.69', '2019-12-01 06:38:56', '0000-00-00 00:00:00'),
(177, '6419108', 'SSC', 'Rajshahi', '1612812946', '573198', 'Humanaties', '2019', '3.61', '2019-12-01 06:39:13', '0000-00-00 00:00:00'),
(180, '19125', 'SSC', 'Rajshahi', '1612813955', '573524', 'Humanities', '2019', '3.33', '2019-12-01 06:43:04', '0000-00-00 00:00:00'),
(181, '19124', 'SSC', 'Rajshahi', '1612812893', '573164', 'Hume', '2019', '4.61', '2019-12-01 06:43:35', '0000-00-00 00:00:00'),
(182, '113742', 'SSC', 'Dinajpur', '1417638131', '201868', 'Science', '2018', '4.18', '2019-12-01 06:43:37', '0000-00-00 00:00:00'),
(183, '19109', 'SSC', 'Rajshahi', '1502008265', '19109', 'Science', '2019', '3.50', '2019-12-01 06:44:11', '0000-00-00 00:00:00'),
(184, '6419111', 'SSC', 'Rajshahi', '1612789441', '164878', 'Science', '2019', '3.89', '2019-12-01 06:44:27', '0000-00-00 00:00:00'),
(185, '6419112', 'SSC', 'Rajshahi', '1612798732', '569522', 'Humanaties', '2019', '3.72', '2019-12-01 06:49:58', '0000-00-00 00:00:00'),
(186, '6719118', 'SSC', 'Rajshahi', '6719118', '6719118', 'Science', '2018', '3.50', '2019-12-01 06:50:18', '0000-00-00 00:00:00'),
(188, '113737', 'SSC', 'Rajshahi', '1212775559', '815124', 'Business', '2015', '4.44', '2019-12-01 06:52:25', '0000-00-00 00:00:00'),
(189, '177306', 'ssc', 'Rajshahi', '1512810424', '581327', 'Humanities', '2017', '3.17', '2019-12-01 06:57:37', '0000-00-00 00:00:00'),
(193, '6719120', 'SSC', 'Dinajpur', '6719120', '6719120', 'Science', '2019', '3.39', '2019-12-01 09:49:29', '0000-00-00 00:00:00'),
(194, '6719121', 'SSC', 'Madrasa', '6719121', '6719121', 'General', '2017', '3.22', '2019-12-01 10:36:34', '0000-00-00 00:00:00'),
(198, '8517104', 'SSC', 'Dinajpur', '1217700427', '181593', 'Science', '2015', '3.89', '2019-12-02 09:12:32', '0000-00-00 00:00:00'),
(199, '8517111', 'SSC', 'Dnajpur', '857778', '171135', 'Science', '13-14', '4.00', '2019-12-02 09:13:12', '0000-00-00 00:00:00'),
(201, '113760', 'ssc', 'Rajshahi', '1512693395', '129100', 'Science', '2018', '4.11', '2019-12-02 09:36:03', '0000-00-00 00:00:00'),
(202, '113776', 'SSC', 'Rajsahi', '644323', '541969', 'Humanities', '2010', '3.31', '2019-12-02 09:39:06', '0000-00-00 00:00:00'),
(203, '113738', 'SSC', 'Rajshahi', '1218893024', '120728', 'Science', '2015', '4.00', '2019-12-02 09:40:16', '0000-00-00 00:00:00'),
(205, '18122', '', '', '', '', '', '', '', '2019-12-02 09:50:16', '0000-00-00 00:00:00'),
(206, '18114', '', '', '', '', '', '', '', '2019-12-02 09:50:49', '0000-00-00 00:00:00'),
(207, '18101', '', '', '', '', '', '', '', '2019-12-02 09:51:41', '0000-00-00 00:00:00'),
(208, '19133', 'SSC', 'Rajshahi', '1612684920', '531592', 'Humanities', '2019', '4.44', '2019-12-02 09:53:19', '0000-00-00 00:00:00'),
(209, '19101', 'ssc', 'rajshahi', '1512787559', '277902', 'business studies', '2018', '4.22', '2019-12-02 09:54:40', '0000-00-00 00:00:00'),
(210, '19101', 'SSC', 'MADRASHA', '1618815468', '177861', 'Humanities', '2019', '4.56', '2019-12-02 09:54:40', '0000-00-00 00:00:00'),
(211, '19128', 'SSC', 'Rajshahi', '161280', '170829', 'science', '2019', '3.83', '2019-12-02 09:55:52', '0000-00-00 00:00:00'),
(212, '113749', 'SSC', 'Rajshahi', '1418881259', '416541', 'Science', '2018', '4.22', '2019-12-02 09:57:25', '0000-00-00 00:00:00'),
(213, '113777', 'SSC', 'Rajshahi', '565145', '1312781673', 'Humanities', '2016', '3.94', '2019-12-02 09:58:45', '0000-00-00 00:00:00'),
(214, '19114', 'SSC', 'Dinajpur', '1617787342', '654923', 'Humanities', '2019', '3.50', '2019-12-02 10:00:28', '0000-00-00 00:00:00'),
(215, '8519135', 'Dakhil', 'Madrasah', '1618867162', '172314', 'General', '2019', '4.38', '2019-12-02 10:01:42', '0000-00-00 00:00:00'),
(216, '981374', 'SSC', 'Rajshahi', '1412804166', '573812', 'Humanities', '2017', '4.36', '2019-12-02 10:04:22', '0000-00-00 00:00:00'),
(217, '8517109', 'SSC', 'Rajshahi', '1212748538', '547652', 'Humanatis', '2015', '4.43', '2019-12-02 10:05:29', '0000-00-00 00:00:00'),
(218, '6719119', 'SSC', 'Rajshahi', '6719119', '6719119', 'Science', '2019', '3.83', '2019-12-02 10:08:16', '0000-00-00 00:00:00'),
(219, '981968', 'SSC', 'Rajsahi', '1112766769/2012-13', '115366', 'science', '2014', '3.88', '2019-12-02 10:10:48', '0000-00-00 00:00:00'),
(220, '113741', 'SSC', 'Rajshahi', '1312676012', '529364', 'Humanity', '2016', '3.33', '2019-12-02 10:12:56', '0000-00-00 00:00:00'),
(221, '113740', 'ssc', 'Dnajpur', '1317654622', '178714', 'Science', '2016', '3.72', '2019-12-02 10:14:41', '0000-00-00 00:00:00'),
(222, '8519152', 'SSC', 'Rajshahi', '1612770455', '808334', 'Business', '2019', '3.33', '2019-12-03 04:46:51', '0000-00-00 00:00:00'),
(223, '6719123', 'SSC', 'Rajshahi', '6719123', '6719123', 'Science', '2018', '3.17', '2019-12-04 10:08:51', '0000-00-00 00:00:00'),
(224, '8518104', '', '', '', '', '', '', '', '2019-12-09 07:56:16', '0000-00-00 00:00:00'),
(225, '8519145', 'SSC', 'Rajshahi', '1512824704', '176600', 'Science', '2018', '3.89', '2020-03-09 12:10:59', '0000-00-00 00:00:00'),
(226, '8519101', 'SSC', 'Rajshahi', '1618876720', '166734', 'Science', '2019', '4.17', '2020-03-10 06:23:50', '0000-00-00 00:00:00'),
(227, '7619117', 'SSC', 'Dinajpur', '1617664300', '210464', 'Science', '2019', '5', '2020-03-10 07:42:45', '0000-00-00 00:00:00'),
(230, '7619102', 'SSC', 'Madrasah', '1618881877', '170810', 'Hum', '2019', '3.50', '2020-03-10 09:41:19', '0000-00-00 00:00:00'),
(231, '7619104', 'SSC', 'Rajshahi', '1612825445', '577568', 'hum', '2019', '2.83', '2020-03-10 09:57:32', '0000-00-00 00:00:00'),
(232, '7619108', 'SSC', 'Rajshahi', '1612794356', '288217', 'Hum', '2019', '', '2020-03-10 10:13:34', '0000-00-00 00:00:00'),
(233, '7619110', 'SSC', 'Jessore', '1413336758', '511555', 'Business Studues', '2017', '3.50', '2020-03-10 10:18:50', '0000-00-00 00:00:00'),
(234, '7619106', 'SSC', 'Rajshahi', '1612692062', '128762', 'Science', '2019', '4.56', '2020-03-10 10:25:32', '0000-00-00 00:00:00'),
(235, '7619118', 'SSC', 'Dinajpur', '1617781838', '674680', 'Science', '2019', '3.61', '2020-03-10 10:28:27', '0000-00-00 00:00:00'),
(236, '7619119', 'SSC', '568372', '1612792708', '568372', 'Hum', '2019', '3.00', '2020-03-10 10:30:19', '0000-00-00 00:00:00'),
(237, '19127', 'SSC', 'Rajshahi', '1612710375', '133893', 'Science', '2019', '3.28', '2020-03-10 10:42:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_hem_info`
--

CREATE TABLE `student_hem_info` (
  `student_hem_info_id` int(11) NOT NULL,
  `hem_member_no` varchar(191) NOT NULL,
  `hem_group` varchar(191) NOT NULL,
  `hem_village` varchar(191) NOT NULL,
  `hem_section` varchar(191) NOT NULL,
  `hem_zilla` varchar(191) NOT NULL,
  `student_roll` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_office_copy`
--

CREATE TABLE `student_office_copy` (
  `id` int(11) NOT NULL,
  `student_roll` varchar(191) NOT NULL,
  `inspection_no` varchar(191) NOT NULL,
  `reference` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_office_copy`
--

INSERT INTO `student_office_copy` (`id`, `student_roll`, `inspection_no`, `reference`, `created_at`, `updated_at`) VALUES
(4, '8518101', '19153', 'Rejuana Talukder', '2019-11-30 08:18:38', '0000-00-00 00:00:00'),
(7, '6719101', '19101', 'Rejawana', '2019-11-30 09:19:06', '0000-00-00 00:00:00'),
(8, '19101', '1', 'rabeya khatun', '2019-11-30 09:36:07', '0000-00-00 00:00:00'),
(9, '6719102', '19102', 'Sohel Rana', '2019-11-30 09:40:49', '0000-00-00 00:00:00'),
(10, '19155', '19155', 'Abu-Raihan', '2019-11-30 09:43:27', '0000-00-00 00:00:00'),
(12, '19102', '1', 'principal,tisi', '2019-11-30 09:50:10', '0000-00-00 00:00:00'),
(13, '8519156', 'CST-19111', 'Abu Raihan', '2019-11-30 09:52:07', '0000-00-00 00:00:00'),
(15, '6719103', '19104', 'Raihan', '2019-11-30 10:37:50', '2019-11-30 04:37:50'),
(16, '8519157', 'CST-19110', 'Abu Raihan', '2019-11-30 09:58:47', '0000-00-00 00:00:00'),
(20, '8519114', 'CST-19114', 'Abu Raihan', '2019-11-30 10:11:38', '0000-00-00 00:00:00'),
(22, '6419125', '1', 'VP Sir', '2019-11-30 10:24:21', '0000-00-00 00:00:00'),
(23, '8519115', 'CST-19115', 'Sohel Rana', '2019-11-30 10:26:46', '0000-00-00 00:00:00'),
(24, '6419127', '1', 'Rabeya', '2019-11-30 10:31:57', '0000-00-00 00:00:00'),
(25, '6419128', '1', 'Abu Rayhan', '2019-11-30 10:37:54', '0000-00-00 00:00:00'),
(26, '6419129', '1', 'Abu Rayhan', '2019-11-30 10:41:48', '0000-00-00 00:00:00'),
(27, '8519116', 'CST-19116', 'Gulam Rabbani', '2019-11-30 10:43:03', '0000-00-00 00:00:00'),
(28, '6419144', '1', 'Abu Rayhan', '2019-11-30 10:45:36', '0000-00-00 00:00:00'),
(29, '8519118', 'CST-19118', 'Abu Raihan', '2019-11-30 10:51:33', '0000-00-00 00:00:00'),
(30, '19105', '1', 'vp,tisi', '2019-11-30 10:57:22', '0000-00-00 00:00:00'),
(31, '113776', '1', 'Towfiq', '2019-11-30 10:58:29', '0000-00-00 00:00:00'),
(32, '113766', '1', 'towfik ', '2019-11-30 11:04:58', '0000-00-00 00:00:00'),
(33, '8519133', 'CST-19133', 'Md. Shariful Islam', '2019-11-30 11:09:41', '0000-00-00 00:00:00'),
(34, '113772', '1', 'Taufik hasan', '2019-11-30 11:10:13', '0000-00-00 00:00:00'),
(35, '113775 ', '1', 'arif ahmed', '2019-11-30 11:12:57', '0000-00-00 00:00:00'),
(36, '981375', '1', 'towfik ', '2019-11-30 11:14:25', '0000-00-00 00:00:00'),
(37, '981378', '1', 'tufik', '2019-11-30 11:14:25', '0000-00-00 00:00:00'),
(38, '113762', '1', 'Taufik hasan', '2019-11-30 11:17:09', '0000-00-00 00:00:00'),
(39, '113773', '1', 'Towfiq Hasan', '2019-11-30 11:25:04', '0000-00-00 00:00:00'),
(40, '981374', '1', 'Sharif Islam', '2019-11-30 11:25:48', '0000-00-00 00:00:00'),
(41, '113770', '1', 'arif ahmed', '2019-11-30 11:26:11', '0000-00-00 00:00:00'),
(42, '113777', '1', 'Md.Masud Rana', '2019-11-30 11:26:43', '0000-00-00 00:00:00'),
(43, '113771', '1', 'Towfiq Hasan', '2019-11-30 11:31:25', '0000-00-00 00:00:00'),
(44, '981384', '1', 'Sharif Islam', '2019-11-30 11:36:18', '0000-00-00 00:00:00'),
(45, '177307', '1', 'arif ahmed', '2019-11-30 11:38:07', '0000-00-00 00:00:00'),
(46, '8519135', 'CST-19135', 'ATM Tajmilur Rahman', '2019-12-01 04:19:45', '0000-00-00 00:00:00'),
(47, '8519125', '19125', 'Emran ferdus islam', '2019-12-01 04:20:31', '0000-00-00 00:00:00'),
(48, '8519126', '19126', 'Abu-Raihan', '2019-12-01 04:28:21', '0000-00-00 00:00:00'),
(49, '8519139', 'CST-19139', 'Faruk Hossain', '2019-12-01 04:30:37', '0000-00-00 00:00:00'),
(50, '8519129', '19129', 'Masud Rana', '2019-12-01 04:34:48', '0000-00-00 00:00:00'),
(51, '8519140', 'CST-19140', 'Abu Raihan', '2019-12-01 04:36:34', '0000-00-00 00:00:00'),
(52, '8519128', '19128', 'Abu-Raihan', '2019-12-01 04:44:38', '0000-00-00 00:00:00'),
(53, '8519145', 'CST-19145', 'Md. Sohel Rana', '2019-12-01 04:45:48', '0000-00-00 00:00:00'),
(54, '8519147', 'CST-19147', 'Md. Sohel Rana', '2019-12-01 04:50:32', '0000-00-00 00:00:00'),
(55, '8519154', '19154', 'Masud Rana', '2019-12-01 04:50:36', '0000-00-00 00:00:00'),
(56, '8519148', 'CST-19148', 'Md. Sohel Rana', '2019-12-01 04:55:10', '0000-00-00 00:00:00'),
(57, '8519152', 'CST-19152', 'ATM Tajmilur Rahman', '2019-12-01 05:00:01', '0000-00-00 00:00:00'),
(58, '8519151', 'CST-19151', 'Md. Moradujjaman', '2019-12-01 05:27:12', '0000-00-00 00:00:00'),
(59, '113752', '1', 'Md. Masud Rana', '2019-12-01 05:56:35', '0000-00-00 00:00:00'),
(60, '6719106', '19106', 'Zakia Sultana', '2019-12-01 05:57:23', '0000-00-00 00:00:00'),
(61, '113738', '1', 'Abdul Gofur', '2019-12-01 06:07:22', '0000-00-00 00:00:00'),
(62, '113740', '1', 'Md.Masud Rana', '2019-12-01 06:07:40', '0000-00-00 00:00:00'),
(63, '6719108', '19108', 'VP', '2019-12-01 06:10:52', '0000-00-00 00:00:00'),
(65, '6419106', '1', 'rabeya khatun', '2019-12-01 06:19:07', '0000-00-00 00:00:00'),
(66, '113760', '1', 'Md.Masud Rana', '2019-12-01 06:22:33', '0000-00-00 00:00:00'),
(67, '113745', '1', 'All Hasan Gazi', '2019-12-01 06:26:29', '0000-00-00 00:00:00'),
(68, '113748', '1', 'Md. Sohel Rana', '2019-12-01 06:32:17', '0000-00-00 00:00:00'),
(69, '6719111', '19111', 'Sohel Rana', '2019-12-01 06:34:03', '0000-00-00 00:00:00'),
(70, '6419108', '19108', 'Arif Ahammed', '2019-12-01 06:39:13', '0000-00-00 00:00:00'),
(72, '19124', '1', 'towfik ', '2019-12-01 06:43:35', '0000-00-00 00:00:00'),
(73, '6419111', '19111', 'Rabeya', '2019-12-01 06:44:27', '0000-00-00 00:00:00'),
(74, '6419112', '19112', 'Jakiya Sultana', '2019-12-01 06:49:58', '0000-00-00 00:00:00'),
(75, '6719118', '19118', 'Rezaul', '2019-12-01 06:50:18', '0000-00-00 00:00:00'),
(76, '177306', '1', 'Md.Aminul Islam', '2019-12-01 06:57:37', '0000-00-00 00:00:00'),
(77, '113741', '1', 'Md. Abu Rayhan', '2019-12-01 09:00:57', '0000-00-00 00:00:00'),
(78, '113749', '1', 'Md. Abu Rayhan', '2019-12-01 09:02:08', '0000-00-00 00:00:00'),
(79, '6719119', '19119', 'DELOWAR', '2019-12-01 09:43:30', '0000-00-00 00:00:00'),
(80, '6719120', '19120', 'Sohel Rana', '2019-12-01 09:49:29', '0000-00-00 00:00:00'),
(81, '6719121', '19121', 'emran', '2019-12-01 10:36:34', '0000-00-00 00:00:00'),
(82, '8517104', '1', 'MD Khairul Islam', '2019-12-02 09:12:32', '0000-00-00 00:00:00'),
(83, '8517111', '1', 'Abu Sayed', '2019-12-02 09:13:12', '0000-00-00 00:00:00'),
(84, '8517109', '1', 'Abu Sayed', '2019-12-02 09:26:31', '0000-00-00 00:00:00'),
(85, '6719123', '6719123', 'Shaima hanif', '2019-12-04 10:08:51', '0000-00-00 00:00:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
(1539178192, '1539178157', '1515756206', '200', '40', '2018-11-01 14:40:14', '2018-10-10 07:29:52'),
(1539271991, '1539271906', '1515756206', '200', '40', '2018-11-01 12:19:54', '2018-10-11 09:33:11'),
(1539272079, '1539272019', '1515756206', '100', '40', '2018-11-01 12:20:43', '2018-10-11 09:34:39'),
(1539272669, '1539272579', '1515756206', '200', '40', '2018-11-01 14:44:00', '2018-10-11 09:44:29'),
(1539272948, '1539272726', '1515756206', '100', '40', '2018-11-01 12:21:44', '2018-10-11 09:49:08'),
(1539273054, '1539272948', '1515756206', '150', '40', '2018-11-01 12:22:14', '2018-10-11 09:50:54'),
(1539273190, '1539273064', '1515756206', '', '', '2018-10-11 09:53:10', '2018-10-11 09:53:10'),
(1539273263, '1539273191', '1515756206', '75', '40', '2018-11-07 09:48:32', '2018-10-11 09:54:23'),
(1539273415, '1539273263', '1515756206', '', '', '2018-10-11 09:56:55', '2018-10-11 09:56:55'),
(1539273464, '1539273415', '1515756206', '', '', '2018-10-11 09:57:44', '2018-10-11 09:57:44'),
(1539273535, '1539273464', '1515756206', '', '', '2018-10-11 09:58:55', '2018-10-11 09:58:55'),
(1539273571, '1539273535', '1515756206', '', '', '2018-10-11 09:59:31', '2018-10-11 09:59:31'),
(1539273621, '1539273572', '1515756206', '', '', '2018-10-11 10:00:21', '2018-10-11 10:00:21'),
(1539273686, '1539273622', '1515756206', '', '', '2018-10-11 10:01:26', '2018-10-11 10:01:26'),
(1539273798, '1539273686', '1515756206', '', '', '2018-10-11 10:03:18', '2018-10-11 10:03:18'),
(1539273860, '1539273799', '1515756206', '', '', '2018-10-11 10:04:20', '2018-10-11 10:04:20'),
(1539273909, '1539273860', '1515756206', '', '', '2018-10-11 10:05:09', '2018-10-11 10:05:09'),
(1539274047, '1539274000', '1515756206', '100', '40', '2018-11-07 09:32:58', '2018-10-11 10:07:27'),
(1539274048, '1539175237', '1510074756', '', '', '2018-11-01 08:39:13', '2018-11-01 08:39:13'),
(1539274049, '1539175237', '1510388196', '', '', '2018-11-01 08:39:13', '2018-11-01 08:39:13'),
(1539274050, '1539175237', '1515756206', '', '', '2018-11-01 08:39:13', '2018-11-01 08:39:13'),
(1539274051, '1541083231', '1510074756', '', '', '2018-11-01 08:41:48', '2018-11-01 08:41:48'),
(1539274052, '1541083231', '1510388196', '', '', '2018-11-01 08:41:48', '2018-11-01 08:41:48'),
(1539274053, '1541083231', '1515756206', '', '', '2018-11-01 08:41:48', '2018-11-01 08:41:48'),
(1539274054, '1541083468', '1510074756', '', '', '2018-11-01 08:45:24', '2018-11-01 08:45:24'),
(1539274055, '1541083468', '1510388196', '', '', '2018-11-01 08:45:24', '2018-11-01 08:45:24'),
(1539274056, '1541083468', '1515756206', '', '', '2018-11-01 08:45:24', '2018-11-01 08:45:24'),
(1539274058, '1541085276', '1510388196', '60', '10', '2019-11-27 05:15:18', '2018-11-01 09:18:09'),
(1539274059, '1541085276', '1515756206', '40', '10', '2019-11-27 05:15:18', '2018-11-01 09:18:09'),
(1539274060, '1541085489', '1510074756', '', '', '2018-11-01 09:20:48', '2018-11-01 09:20:48'),
(1539274061, '1541085489', '1510388196', '60', '40', '2018-11-01 09:20:48', '2018-11-01 09:20:48'),
(1539274062, '1541085489', '1515756206', '40', '40', '2018-11-01 09:20:48', '2018-11-01 09:20:48'),
(1539274063, '1541085648', '1510074756', '20', '10', '2019-11-27 06:22:20', '2018-11-01 09:23:16'),
(1539274064, '1541085648', '1510388196', '60', '20', '2019-11-27 06:22:20', '2018-11-01 09:23:16'),
(1539274065, '1541085648', '1515756206', '10', '10', '2019-11-27 06:22:20', '2018-11-01 09:23:16'),
(1539274066, '1541583185', '1510074756', '25', '0', '2018-11-07 03:36:41', '2018-11-07 03:36:41'),
(1539274067, '1541583185', '1510388196', '0', '0', '2018-11-07 03:36:41', '2018-11-07 03:36:41'),
(1539274068, '1541583185', '1515756206', '25', '0', '2018-11-07 03:36:41', '2018-11-07 03:36:41'),
(1539274069, '1541583401', '1510074756', '60', '40', '2018-11-07 03:38:49', '2018-11-07 03:38:49'),
(1539274070, '1541583401', '1510388196', '90', '40', '2018-11-07 03:38:49', '2018-11-07 03:38:49'),
(1539274071, '1541583401', '1515756206', '', '', '2018-11-07 03:38:49', '2018-11-07 03:38:49'),
(1539274072, '1541583926', '1510074756', '0', '0', '2018-11-07 03:47:55', '2018-11-07 03:47:55'),
(1539274073, '1541583926', '1510388196', '200', '40', '2018-11-07 03:47:55', '2018-11-07 03:47:55'),
(1539274074, '1541583926', '1515756206', '75', '40', '2018-11-07 03:47:55', '2018-11-07 03:47:55'),
(1539274075, '1541584734', '1510074756', '100', '40', '2018-11-07 04:02:26', '2018-11-07 04:02:26'),
(1539274076, '1541584734', '1510388196', '100', '40', '2018-11-07 04:02:26', '2018-11-07 04:02:26'),
(1539274077, '1541584734', '1515756206', '', '', '2018-11-07 04:02:26', '2018-11-07 04:02:26'),
(1539274078, '1541584998', '1510074756', '', '', '2018-11-07 04:04:09', '2018-11-07 04:04:09'),
(1539274079, '1541584998', '1510388196', '', '', '2018-11-07 04:04:09', '2018-11-07 04:04:09'),
(1539274080, '1541584998', '1515756206', '', '', '2018-11-07 04:04:09', '2018-11-07 04:04:09'),
(1539274081, '1539174343', '1510074756', '60', '40', '2018-11-24 01:56:20', '2018-11-09 13:54:44'),
(1539274082, '1539174343', '1510388196', '60', '40', '2018-11-24 01:56:20', '2018-11-09 13:54:44'),
(1539274083, '1539174343', '1515756206', '30', '30', '2018-11-24 01:56:21', '2018-11-09 13:54:44'),
(1539274084, '1541085276', '1539274057', '0', '0', '2019-11-26 23:06:13', '2019-11-26 23:06:13'),
(1539274085, '1541085276', '1543021901', '0', '0', '2019-11-26 23:06:13', '2019-11-26 23:06:13'),
(1539274086, '1541085276', '1510074756', '0', '0', '2019-11-26 23:08:51', '2019-11-26 23:08:51'),
(1539274087, '1541085648', '1543021901', '10', '10', '2019-11-27 00:22:20', '2019-11-27 00:22:20'),
(1539274088, '1574849157', '1574849085', '40', '33', '2019-11-28 04:06:05', '2019-11-27 04:09:49'),
(1539274089, '1574849157', '1574849108', '60', '33', '2019-11-28 04:06:16', '2019-11-27 04:09:49'),
(1539274090, '1574849157', '1574849126', '25', '33', '2019-11-28 04:06:26', '2019-11-27 04:09:49'),
(1539274091, '1574849157', '1574849148', '25', '33', '2019-11-28 04:06:31', '2019-11-27 04:09:49'),
(1539274092, '1574850160', '1574849085', '40', '14', '2019-11-27 04:29:01', '2019-11-27 04:29:01'),
(1539274093, '1574850160', '1574849108', '60', '20', '2019-11-27 04:29:01', '2019-11-27 04:29:01'),
(1539274094, '1574850160', '1574849126', '25', '9', '2019-11-27 04:29:01', '2019-11-27 04:29:01'),
(1539274095, '1574850160', '1574849148', '25', '9', '2019-11-27 04:29:01', '2019-11-27 04:29:01'),
(1539274096, '1574850559', '1574849085', '40', '14', '2019-11-27 04:32:47', '2019-11-27 04:32:47'),
(1539274097, '1574850559', '1574849108', '60', '20', '2019-11-27 04:32:47', '2019-11-27 04:32:47'),
(1539274098, '1574850559', '1574849126', '25', '9', '2019-11-27 04:32:47', '2019-11-27 04:32:47'),
(1539274099, '1574850559', '1574849148', '25', '9', '2019-11-27 04:32:47', '2019-11-27 04:32:47'),
(1539274100, '1574850767', '1574849085', '20', '7', '2019-11-27 04:54:27', '2019-11-27 04:54:27'),
(1539274101, '1574850767', '1574849108', '30', '10', '2019-11-27 04:54:27', '2019-11-27 04:54:27'),
(1539274102, '1574850767', '1574849126', '50', '17', '2019-11-27 04:54:27', '2019-11-27 04:54:27'),
(1539274103, '1574850767', '1574849148', '50', '17', '2019-11-27 04:54:27', '2019-11-27 04:54:27'),
(1539274104, '1574852092', '1574849085', '', '', '2019-11-27 04:57:16', '2019-11-27 04:57:16'),
(1539274105, '1574852092', '1574849108', '', '', '2019-11-27 04:57:16', '2019-11-27 04:57:16'),
(1539274106, '1574852092', '1574849126', '50', '', '2019-11-27 04:57:16', '2019-11-27 04:57:16'),
(1539274107, '1574852092', '1574849148', '50', '', '2019-11-27 04:57:16', '2019-11-27 04:57:16'),
(1539274108, '1574853030', '1574849085', '', '', '2019-11-27 05:11:22', '2019-11-27 05:11:22'),
(1539274109, '1574853030', '1574849108', '', '', '2019-11-27 05:11:22', '2019-11-27 05:11:22'),
(1539274110, '1574853030', '1574849126', '', '', '2019-11-27 05:11:22', '2019-11-27 05:11:22'),
(1539274111, '1574853030', '1574849148', '', '', '2019-11-27 05:11:22', '2019-11-27 05:11:22'),
(1539274112, '1574914957', '1574849085', '60', '24', '2019-11-27 22:27:36', '2019-11-27 22:27:36'),
(1539274113, '1574914957', '1574849108', '90', '36', '2019-11-27 22:27:36', '2019-11-27 22:27:36'),
(1539274114, '1574914957', '1574849126', '25', '10', '2019-11-27 22:27:36', '2019-11-27 22:27:36'),
(1539274115, '1574914957', '1574849148', '25', '10', '2019-11-27 22:27:36', '2019-11-27 22:27:36'),
(1539274116, '1574916218', '1574849085', '40', '', '2019-11-27 22:45:15', '2019-11-27 22:45:15'),
(1539274117, '1574916218', '1574849108', '60', '', '2019-11-27 22:45:15', '2019-11-27 22:45:15'),
(1539274118, '1574916218', '1574849126', '25', '', '2019-11-27 22:45:15', '2019-11-27 22:45:15'),
(1539274119, '1574916218', '1574849148', '25', '', '2019-11-27 22:45:15', '2019-11-27 22:45:15'),
(1539274120, '1539273064', '1574849085', '40', '40', '2019-11-27 23:08:48', '2019-11-27 23:08:48'),
(1539274121, '1539273064', '1574849108', '60', '40', '2019-11-27 23:08:48', '2019-11-27 23:08:48'),
(1539274122, '1539273064', '1574849126', '25', '40', '2019-11-27 23:08:48', '2019-11-27 23:08:48'),
(1539274123, '1539273064', '1574849148', '25', '40', '2019-11-27 23:08:48', '2019-11-27 23:08:48'),
(1539274124, '1574917750', '1574849085', '40', '40', '2019-11-27 23:12:16', '2019-11-27 23:12:16'),
(1539274125, '1574917750', '1574849108', '60', '40', '2019-11-27 23:12:16', '2019-11-27 23:12:16'),
(1539274126, '1574917750', '1574849126', '50', '40', '2019-11-27 23:12:16', '2019-11-27 23:12:16'),
(1539274127, '1574917750', '1574849148', '50', '40', '2019-11-27 23:12:16', '2019-11-27 23:12:16'),
(1539274128, '1574917705', '1574849085', '60', '', '2019-11-27 23:16:58', '2019-11-27 23:16:58'),
(1539274129, '1574917705', '1574849108', '90', '', '2019-11-27 23:16:58', '2019-11-27 23:16:58'),
(1539274130, '1574917705', '1574849126', '50', '', '2019-11-27 23:16:58', '2019-11-27 23:16:58'),
(1539274131, '1574917705', '1574849148', '', '', '2019-11-27 23:16:58', '2019-11-27 23:16:58'),
(1539274132, '1574918218', '1574849085', '60', '', '2019-11-27 23:18:45', '2019-11-27 23:18:45'),
(1539274133, '1574918218', '1574849108', '90', '', '2019-11-27 23:18:45', '2019-11-27 23:18:45'),
(1539274134, '1574918218', '1574849126', '50', '', '2019-11-27 23:18:45', '2019-11-27 23:18:45'),
(1539274135, '1574918218', '1574849148', '', '', '2019-11-27 23:18:45', '2019-11-27 23:18:45'),
(1539274136, '1574918326', '1574849085', '60', '40', '2019-11-27 23:20:07', '2019-11-27 23:20:07'),
(1539274137, '1574918326', '1574849108', '90', '40', '2019-11-27 23:20:07', '2019-11-27 23:20:07'),
(1539274138, '1574918326', '1574849126', '50', '40', '2019-11-27 23:20:07', '2019-11-27 23:20:07'),
(1539274139, '1574918326', '1574849148', '', '', '2019-11-27 23:20:07', '2019-11-27 23:20:07'),
(1539274140, '1574918407', '1574849085', '60', '40', '2019-11-27 23:21:13', '2019-11-27 23:21:13'),
(1539274141, '1574918407', '1574849108', '90', '40', '2019-11-27 23:21:13', '2019-11-27 23:21:13'),
(1539274142, '1574918407', '1574849126', '50', '40', '2019-11-27 23:21:13', '2019-11-27 23:21:13'),
(1539274143, '1574918407', '1574849148', '', '', '2019-11-27 23:21:13', '2019-11-27 23:21:13'),
(1539274144, '1574918522', '1574849085', '60', '40', '2019-11-27 23:23:22', '2019-11-27 23:23:22'),
(1539274145, '1574918522', '1574849108', '90', '40', '2019-11-27 23:23:22', '2019-11-27 23:23:22'),
(1539274146, '1574918522', '1574849126', '50', '40', '2019-11-28 05:24:31', '2019-11-27 23:23:22'),
(1539274147, '1574918522', '1574849148', '', '', '2019-11-27 23:23:22', '2019-11-27 23:23:22'),
(1539274148, '1574918602', '1574849085', '60', '40', '2019-11-27 23:24:11', '2019-11-27 23:24:11'),
(1539274149, '1574918602', '1574849108', '90', '40', '2019-11-27 23:24:11', '2019-11-27 23:24:11'),
(1539274150, '1574918602', '1574849126', '50', '40', '2019-11-27 23:24:11', '2019-11-27 23:24:11'),
(1539274151, '1574918602', '1574849148', '', '', '2019-11-27 23:24:11', '2019-11-27 23:24:11'),
(1539274152, '1574918522', '1539274147', '0', '0', '2019-11-27 23:24:31', '2019-11-27 23:24:31'),
(1539274153, '1574924042', '1574849085', '60', '24', '2019-11-28 00:57:50', '2019-11-28 00:57:50'),
(1539274154, '1574924042', '1574849108', '90', '36', '2019-11-28 00:57:50', '2019-11-28 00:57:50'),
(1539274155, '1574924042', '1574849126', '25', '10', '2019-11-28 00:57:50', '2019-11-28 00:57:50'),
(1539274156, '1574924042', '1574849148', '25', '10', '2019-11-28 00:57:50', '2019-11-28 00:57:50'),
(1539274157, '1539273535', '1574849085', '60', '24', '2019-11-28 01:01:38', '2019-11-28 01:01:38'),
(1539274158, '1539273535', '1574849108', '90', '36', '2019-11-28 01:01:38', '2019-11-28 01:01:38'),
(1539274159, '1539273535', '1574849126', '25', '10', '2019-11-28 01:01:38', '2019-11-28 01:01:38'),
(1539274160, '1539273535', '1574849148', '25', '10', '2019-11-28 01:01:38', '2019-11-28 01:01:38'),
(1539274161, '1574924211', '1574849085', '40', '40', '2019-11-28 01:02:57', '2019-11-28 01:02:57'),
(1539274162, '1574924211', '1574849108', '60', '40', '2019-11-28 01:02:57', '2019-11-28 01:02:57'),
(1539274163, '1574924211', '1574849126', '25', '40', '2019-11-28 01:02:57', '2019-11-28 01:02:57'),
(1539274164, '1574924211', '1574849148', '25', '40', '2019-11-28 01:02:57', '2019-11-28 01:02:57'),
(1539274165, '1574924578', '1574849085', '60', '40', '2019-11-28 01:04:22', '2019-11-28 01:04:22'),
(1539274166, '1574924578', '1574849108', '90', '40', '2019-11-28 01:04:22', '2019-11-28 01:04:22'),
(1539274167, '1574924578', '1574849126', '25', '40', '2019-11-28 01:04:22', '2019-11-28 01:04:22'),
(1539274168, '1574924578', '1574849148', '25', '40', '2019-11-28 01:04:22', '2019-11-28 01:04:22'),
(1539274169, '1539273799', '1574849085', '60', '40', '2019-11-28 01:07:32', '2019-11-28 01:07:32'),
(1539274170, '1539273799', '1574849108', '90', '40', '2019-11-28 01:07:32', '2019-11-28 01:07:32'),
(1539274171, '1539273799', '1574849126', '25', '40', '2019-11-28 01:07:32', '2019-11-28 01:07:32'),
(1539274172, '1539273799', '1574849148', '25', '40', '2019-11-28 01:07:32', '2019-11-28 01:07:32'),
(1539274173, '1574924621', '1574849085', '40', '16', '2019-11-28 01:25:16', '2019-11-28 01:25:16'),
(1539274174, '1574924621', '1574849108', '60', '24', '2019-11-28 01:25:16', '2019-11-28 01:25:16'),
(1539274175, '1574924621', '1574849126', '25', '10', '2019-11-28 01:25:16', '2019-11-28 01:25:16'),
(1539274176, '1574924621', '1574849148', '25', '10', '2019-11-28 01:25:16', '2019-11-28 01:25:16'),
(1539274177, '1574925916', '1574849085', '', '', '2019-11-28 01:27:44', '2019-11-28 01:27:44'),
(1539274178, '1574925916', '1574849108', '', '', '2019-11-28 01:27:44', '2019-11-28 01:27:44'),
(1539274179, '1574925916', '1574849126', '25', '10', '2019-11-28 01:27:44', '2019-11-28 01:27:44'),
(1539274180, '1574925916', '1574849148', '25', '10', '2019-11-28 01:27:44', '2019-11-28 01:27:44'),
(1539274181, '1574926064', '1574849085', '40', '16', '2019-11-28 01:30:23', '2019-11-28 01:30:23'),
(1539274182, '1574926064', '1574849108', '60', '24', '2019-11-28 01:30:23', '2019-11-28 01:30:23'),
(1539274183, '1574926064', '1574849126', '25', '10', '2019-11-28 01:30:23', '2019-11-28 01:30:23'),
(1539274184, '1574926064', '1574849148', '25', '10', '2019-11-28 01:30:23', '2019-11-28 01:30:23'),
(1539274185, '1574926272', '1574849085', '', '', '2019-11-28 01:33:22', '2019-11-28 01:33:22'),
(1539274186, '1574926272', '1574849108', '', '', '2019-11-28 01:33:22', '2019-11-28 01:33:22'),
(1539274187, '1574926272', '1574849126', '50', '20', '2019-11-28 01:33:22', '2019-11-28 01:33:22'),
(1539274188, '1574926272', '1574849148', '50', '20', '2019-11-28 01:33:22', '2019-11-28 01:33:22'),
(1539274189, '1574928086', '1574849085', '60', '', '2019-11-28 02:03:00', '2019-11-28 02:03:00'),
(1539274190, '1574928086', '1574849108', '9', '', '2019-11-28 02:03:00', '2019-11-28 02:03:00'),
(1539274191, '1574928086', '1574849126', '', '', '2019-11-28 02:03:00', '2019-11-28 02:03:00'),
(1539274192, '1574928086', '1574849148', '', '', '2019-11-28 02:03:00', '2019-11-28 02:03:00'),
(1539274193, '1574928199', '1574849085', '60', '24', '2019-11-28 02:05:19', '2019-11-28 02:05:19'),
(1539274194, '1574928199', '1574849108', '90', '36', '2019-11-28 02:05:19', '2019-11-28 02:05:19'),
(1539274195, '1574928199', '1574849126', '25', '10', '2019-11-28 02:05:19', '2019-11-28 02:05:19'),
(1539274196, '1574928199', '1574849148', '25', '10', '2019-11-28 02:05:19', '2019-11-28 02:05:19'),
(1539274197, '1574928333', '1574849085', '60', '24', '2019-11-28 02:06:49', '2019-11-28 02:06:49'),
(1539274198, '1574928333', '1574849108', '90', '36', '2019-11-28 02:06:49', '2019-11-28 02:06:49'),
(1539274199, '1574928333', '1574849126', '25', '10', '2019-11-28 02:06:49', '2019-11-28 02:06:49'),
(1539274200, '1574928333', '1574849148', '25', '10', '2019-11-28 02:06:49', '2019-11-28 02:06:49'),
(1539274201, '1574928419', '1574849085', '60', '24', '2019-11-28 02:09:04', '2019-11-28 02:09:04'),
(1539274202, '1574928419', '1574849108', '90', '36', '2019-11-28 02:09:04', '2019-11-28 02:09:04'),
(1539274203, '1574928419', '1574849126', '25', '10', '2019-11-28 02:09:04', '2019-11-28 02:09:04'),
(1539274204, '1574928419', '1574849148', '25', '10', '2019-11-28 02:09:04', '2019-11-28 02:09:04'),
(1539274205, '1539273464', '1574849085', '0', '0', '2019-11-28 02:34:57', '2019-11-28 02:34:57'),
(1539274206, '1539273464', '1574849108', '0', '0', '2019-11-28 02:34:57', '2019-11-28 02:34:57'),
(1539274207, '1539273464', '1574849126', '25', '10', '2019-11-28 02:34:57', '2019-11-28 02:34:57'),
(1539274208, '1539273464', '1574849148', '25', '10', '2019-11-28 02:34:57', '2019-11-28 02:34:57'),
(1539274209, '1574930249', '1574849085', '', '', '2019-11-28 02:39:03', '2019-11-28 02:39:03'),
(1539274210, '1574930249', '1574849108', '', '', '2019-11-28 02:39:03', '2019-11-28 02:39:03'),
(1539274211, '1574930249', '1574849126', '25', '10', '2019-11-28 02:39:03', '2019-11-28 02:39:03'),
(1539274212, '1574930249', '1574849148', '25', '10', '2019-11-28 02:39:03', '2019-11-28 02:39:03'),
(1539274213, '1539271906', '1574849085', '60', '40', '2019-11-28 04:25:32', '2019-11-28 04:25:32'),
(1539274214, '1539271906', '1574849108', '90', '40', '2019-11-28 04:25:32', '2019-11-28 04:25:32'),
(1539274215, '1539271906', '1574849126', '25', '40', '2019-11-28 04:25:32', '2019-11-28 04:25:32'),
(1539274216, '1539271906', '1574849148', '25', '40', '2019-11-28 04:25:32', '2019-11-28 04:25:32'),
(1539274217, '1574936812', '1574849085', '', '', '2019-11-28 04:28:39', '2019-11-28 04:28:39'),
(1539274218, '1574936812', '1574849108', '', '', '2019-11-28 04:28:39', '2019-11-28 04:28:39'),
(1539274219, '1574936812', '1574849126', '50', '40', '2019-11-28 04:28:39', '2019-11-28 04:28:39'),
(1539274220, '1574936812', '1574849148', '50', '40', '2019-11-28 04:28:39', '2019-11-28 04:28:39'),
(1539274221, '1574936919', '1574849085', '', '', '2019-11-28 04:29:44', '2019-11-28 04:29:44'),
(1539274222, '1574936919', '1574849108', '', '', '2019-11-28 04:29:44', '2019-11-28 04:29:44'),
(1539274223, '1574936919', '1574849126', '50', '40', '2019-11-28 04:29:44', '2019-11-28 04:29:44'),
(1539274224, '1574936919', '1574849148', '50', '40', '2019-11-28 04:29:44', '2019-11-28 04:29:44'),
(1539274225, '1574937205', '1574849085', '', '', '2019-11-28 04:34:16', '2019-11-28 04:34:16'),
(1539274226, '1574937205', '1574849108', '', '', '2019-11-28 04:34:16', '2019-11-28 04:34:16'),
(1539274227, '1574937205', '1574849126', '50', '40', '2019-11-28 04:34:16', '2019-11-28 04:34:16'),
(1539274228, '1574937205', '1574849148', '50', '40', '2019-11-28 04:34:16', '2019-11-28 04:34:16'),
(1539274229, '1574937256', '1574849085', '40', '40', '2019-11-28 04:38:45', '2019-11-28 04:38:45'),
(1539274230, '1574937256', '1574849108', '60', '40', '2019-11-28 04:38:45', '2019-11-28 04:38:45'),
(1539274231, '1574937256', '1574849126', '25', '40', '2019-11-28 04:38:45', '2019-11-28 04:38:45'),
(1539274232, '1574937256', '1574849148', '25', '40', '2019-11-28 04:38:45', '2019-11-28 04:38:45'),
(1539274233, '1574938153', '1574849085', '40', '40', '2019-11-28 04:51:09', '2019-11-28 04:51:09'),
(1539274234, '1574938153', '1574849108', '60', '40', '2019-11-28 04:51:09', '2019-11-28 04:51:09'),
(1539274235, '1574938153', '1574849126', '25', '40', '2019-11-28 04:51:09', '2019-11-28 04:51:09'),
(1539274236, '1574938153', '1574849148', '25', '40', '2019-11-28 04:51:09', '2019-11-28 04:51:09'),
(1539274237, '1574938269', '1574849085', '20', '40', '2019-11-28 04:53:37', '2019-11-28 04:53:37'),
(1539274238, '1574938269', '1574849108', '30', '40', '2019-11-28 04:53:37', '2019-11-28 04:53:37'),
(1539274239, '1574938269', '1574849126', '25', '40', '2019-11-28 04:53:37', '2019-11-28 04:53:37'),
(1539274240, '1574938269', '1574849148', '25', '40', '2019-11-28 04:53:37', '2019-11-28 04:53:37'),
(1539274241, '1574938447', '1574849085', '', '', '2019-11-28 04:55:25', '2019-11-28 04:55:25'),
(1539274242, '1574938447', '1574849108', '', '', '2019-11-28 04:55:25', '2019-11-28 04:55:25'),
(1539274243, '1574938447', '1574849126', '25', '40', '2019-11-28 10:56:56', '2019-11-28 04:55:25'),
(1539274244, '1574938447', '1574849148', '25', '40', '2019-11-28 10:56:56', '2019-11-28 04:55:25'),
(1539274245, '1574938526', '1574849085', '', '', '2019-11-28 04:56:42', '2019-11-28 04:56:42'),
(1539274246, '1574938526', '1574849108', '', '', '2019-11-28 04:56:42', '2019-11-28 04:56:42'),
(1539274247, '1574938526', '1574849126', '50', '40', '2019-11-28 04:56:42', '2019-11-28 04:56:42'),
(1539274248, '1574938526', '1574849148', '50', '40', '2019-11-28 04:56:42', '2019-11-28 04:56:42'),
(1539274249, '1574938447', '1539274241', '0', '0', '2019-11-28 04:56:56', '2019-11-28 04:56:56'),
(1539274250, '1574938447', '1539274242', '0', '0', '2019-11-28 04:56:56', '2019-11-28 04:56:56'),
(1539274251, '1574938653', '1574849085', '60', '40', '2019-11-28 04:59:05', '2019-11-28 04:59:05'),
(1539274252, '1574938653', '1574849108', '90', '40', '2019-11-28 04:59:05', '2019-11-28 04:59:05'),
(1539274253, '1574938653', '1574849126', '50', '40', '2019-11-28 04:59:05', '2019-11-28 04:59:05'),
(1539274254, '1574938653', '1574849148', '', '', '2019-11-28 04:59:05', '2019-11-28 04:59:05'),
(1539274255, '1574938906', '1574849085', '60', '40', '2019-11-28 05:03:20', '2019-11-28 05:03:20'),
(1539274256, '1574938906', '1574849108', '90', '40', '2019-11-28 05:03:20', '2019-11-28 05:03:20'),
(1539274257, '1574938906', '1574849126', '25', '40', '2019-11-28 05:03:20', '2019-11-28 05:03:20'),
(1539274258, '1574938906', '1574849148', '25', '40', '2019-11-28 05:03:20', '2019-11-28 05:03:20'),
(1539274259, '1574939001', '1574849085', '60', '40', '2019-11-28 05:04:39', '2019-11-28 05:04:39'),
(1539274260, '1574939001', '1574849108', '90', '40', '2019-11-28 05:04:39', '2019-11-28 05:04:39'),
(1539274261, '1574939001', '1574849126', '25', '40', '2019-11-28 05:04:39', '2019-11-28 05:04:39'),
(1539274262, '1574939001', '1574849148', '25', '40', '2019-11-28 05:04:39', '2019-11-28 05:04:39'),
(1539274263, '1574939080', '1574849085', '40', '40', '2019-11-28 05:06:12', '2019-11-28 05:06:12'),
(1539274264, '1574939080', '1574849108', '60', '40', '2019-11-28 05:06:12', '2019-11-28 05:06:12'),
(1539274265, '1574939080', '1574849126', '', '', '2019-11-28 05:06:12', '2019-11-28 05:06:12'),
(1539274266, '1574939080', '1574849148', '', '', '2019-11-28 05:06:12', '2019-11-28 05:06:12'),
(1539274267, '1574939191', '1574849085', '20', '40', '2019-11-28 05:07:49', '2019-11-28 05:07:49'),
(1539274268, '1574939191', '1574849108', '30', '40', '2019-11-28 05:07:49', '2019-11-28 05:07:49'),
(1539274269, '1574939191', '1574849126', '25', '40', '2019-11-28 05:07:49', '2019-11-28 05:07:49'),
(1539274270, '1574939191', '1574849148', '25', '40', '2019-11-28 05:07:49', '2019-11-28 05:07:49'),
(1539274271, '1574939278', '1574849085', '40', '40', '2020-03-11 05:16:48', '2019-11-28 05:08:55'),
(1539274272, '1574939278', '1574849108', '60', '40', '2020-03-11 05:16:48', '2019-11-28 05:08:55'),
(1539274273, '1574939278', '1574849126', '25', '40', '2019-11-28 05:08:55', '2019-11-28 05:08:55'),
(1539274274, '1574939278', '1574849148', '25', '40', '2019-11-28 05:08:55', '2019-11-28 05:08:55'),
(1539274275, '1574939366', '1574849085', '', '', '2019-11-28 05:10:26', '2019-11-28 05:10:26'),
(1539274276, '1574939366', '1574849108', '', '', '2019-11-28 05:10:26', '2019-11-28 05:10:26'),
(1539274277, '1574939366', '1574849126', '50', '40', '2019-11-28 05:10:26', '2019-11-28 05:10:26'),
(1539274278, '1574939366', '1574849148', '50', '40', '2019-11-28 05:10:26', '2019-11-28 05:10:26'),
(1539274279, '1574939559', '1574849085', '60', '40', '2019-11-28 05:14:14', '2019-11-28 05:14:14'),
(1539274280, '1574939559', '1574849108', '90', '40', '2019-11-28 05:14:14', '2019-11-28 05:14:14'),
(1539274281, '1574939559', '1574849126', '50', '40', '2019-11-28 05:14:14', '2019-11-28 05:14:14'),
(1539274282, '1574939559', '1574849148', '', '', '2019-11-28 05:14:14', '2019-11-28 05:14:14'),
(1539274283, '1574939654', '1574849085', '60', '40', '2019-11-28 05:15:10', '2019-11-28 05:15:10'),
(1539274284, '1574939654', '1574849108', '90', '40', '2019-11-28 05:15:10', '2019-11-28 05:15:10'),
(1539274285, '1574939654', '1574849126', '50', '40', '2019-11-28 05:15:10', '2019-11-28 05:15:10'),
(1539274286, '1574939654', '1574849148', '', '', '2019-11-28 05:15:10', '2019-11-28 05:15:10'),
(1539274287, '1574939767', '1574849085', '40', '40', '2019-11-28 05:17:26', '2019-11-28 05:17:26'),
(1539274288, '1574939767', '1574849108', '60', '40', '2019-11-28 05:17:26', '2019-11-28 05:17:26'),
(1539274289, '1574939767', '1574849126', '50', '40', '2019-11-28 05:17:26', '2019-11-28 05:17:26'),
(1539274290, '1574939767', '1574849148', '', '', '2019-11-28 05:17:26', '2019-11-28 05:17:26'),
(1539274291, '1574939846', '1574849085', '40', '40', '2019-11-28 05:18:33', '2019-11-28 05:18:33'),
(1539274292, '1574939846', '1574849108', '60', '40', '2019-11-28 05:18:33', '2019-11-28 05:18:33'),
(1539274293, '1574939846', '1574849126', '50', '40', '2019-11-28 05:18:33', '2019-11-28 05:18:33'),
(1539274294, '1574939846', '1574849148', '', '', '2019-11-28 05:18:33', '2019-11-28 05:18:33'),
(1539274295, '1575193071', '1574849085', '20', '40', '2019-12-01 03:42:58', '2019-12-01 03:42:58'),
(1539274296, '1575193071', '1574849108', '30', '40', '2019-12-01 03:42:58', '2019-12-01 03:42:58'),
(1539274297, '1575193071', '1574849126', '25', '40', '2019-12-01 03:42:58', '2019-12-01 03:42:58'),
(1539274298, '1575193071', '1574849148', '25', '40', '2019-12-01 03:42:58', '2019-12-01 03:42:58'),
(1539274299, '1575193445', '1574849085', '20', '40', '2019-12-01 03:45:40', '2019-12-01 03:45:40'),
(1539274300, '1575193445', '1574849108', '30', '40', '2019-12-01 03:45:40', '2019-12-01 03:45:40'),
(1539274301, '1575193445', '1574849126', '25', '40', '2019-12-01 03:45:40', '2019-12-01 03:45:40'),
(1539274302, '1575193445', '1574849148', '25', '40', '2019-12-01 03:45:40', '2019-12-01 03:45:40'),
(1539274303, '1575193549', '1574849085', '40', '40', '2019-12-01 03:47:15', '2019-12-01 03:47:15'),
(1539274304, '1575193549', '1574849108', '60', '40', '2019-12-01 03:47:15', '2019-12-01 03:47:15'),
(1539274305, '1575193549', '1574849126', '50', '40', '2019-12-01 03:47:15', '2019-12-01 03:47:15'),
(1539274306, '1575193549', '1574849148', '50', '40', '2019-12-01 03:47:15', '2019-12-01 03:47:15'),
(1539274307, '1575193651', '1574849085', '', '', '2019-12-01 03:50:05', '2019-12-01 03:50:05'),
(1539274308, '1575193651', '1574849108', '', '', '2019-12-01 03:50:05', '2019-12-01 03:50:05'),
(1539274309, '1575193651', '1574849126', '50', '40', '2019-12-01 03:50:05', '2019-12-01 03:50:05'),
(1539274310, '1575193651', '1574849148', '50', '40', '2019-12-01 03:50:05', '2019-12-01 03:50:05'),
(1539274311, '1575195865', '1574849085', '40', '40', '2019-12-01 04:26:34', '2019-12-01 04:26:34'),
(1539274312, '1575195865', '1574849108', '60', '40', '2019-12-01 04:26:34', '2019-12-01 04:26:34'),
(1539274313, '1575195865', '1574849126', '', '', '2019-12-01 04:26:34', '2019-12-01 04:26:34'),
(1539274314, '1575195865', '1574849148', '', '', '2019-12-01 04:26:34', '2019-12-01 04:26:34'),
(1539274315, '1575196023', '1574849085', '20', '40', '2019-12-01 04:28:40', '2019-12-01 04:28:40'),
(1539274316, '1575196023', '1574849108', '30', '40', '2019-12-01 04:28:40', '2019-12-01 04:28:40'),
(1539274317, '1575196023', '1574849126', '50', '40', '2019-12-01 04:28:40', '2019-12-01 04:28:40'),
(1539274318, '1575196023', '1574849148', '', '', '2019-12-01 04:28:40', '2019-12-01 04:28:40'),
(1539274319, '1575196120', '1574849085', '20', '40', '2019-12-01 04:29:56', '2019-12-01 04:29:56'),
(1539274320, '1575196120', '1574849108', '30', '40', '2019-12-01 04:29:56', '2019-12-01 04:29:56'),
(1539274321, '1575196120', '1574849126', '50', '40', '2019-12-01 04:29:56', '2019-12-01 04:29:56'),
(1539274322, '1575196120', '1574849148', '', '', '2019-12-01 04:29:56', '2019-12-01 04:29:56'),
(1539274323, '1575267738', '1574849085', '40', '40', '2019-12-02 00:24:39', '2019-12-02 00:24:39'),
(1539274324, '1575267738', '1574849108', '60', '40', '2019-12-02 00:24:39', '2019-12-02 00:24:39'),
(1539274325, '1575267738', '1574849126', '25', '40', '2019-12-02 00:24:39', '2019-12-02 00:24:39'),
(1539274326, '1575267738', '1574849148', '25', '40', '2019-12-02 00:24:39', '2019-12-02 00:24:39'),
(1539274327, '1575281215', '1574849085', '40', '40', '2019-12-02 04:09:42', '2019-12-02 04:09:42'),
(1539274328, '1575281215', '1574849108', '60', '40', '2019-12-02 04:09:42', '2019-12-02 04:09:42'),
(1539274329, '1575281215', '1574849126', '', '', '2019-12-02 04:09:42', '2019-12-02 04:09:42'),
(1539274330, '1575281215', '1574849148', '', '', '2019-12-02 04:09:42', '2019-12-02 04:09:42'),
(1539274331, '1583724454', '1574849085', '40', '40', '2020-03-08 21:31:35', '2020-03-08 21:31:35'),
(1539274332, '1583724454', '1574849108', '60', '40', '2020-03-08 21:31:35', '2020-03-08 21:31:35'),
(1539274333, '1583724454', '1574849126', '', '', '2020-03-08 21:31:35', '2020-03-08 21:31:35'),
(1539274334, '1583724454', '1574849148', '', '', '2020-03-08 21:31:35', '2020-03-08 21:31:35'),
(1539274335, '1583724696', '1574849085', '40', '40', '2020-03-08 21:32:20', '2020-03-08 21:32:20'),
(1539274336, '1583724696', '1574849108', '60', '40', '2020-03-08 21:32:21', '2020-03-08 21:32:21'),
(1539274337, '1583724696', '1574849126', '', '', '2020-03-08 21:32:21', '2020-03-08 21:32:21'),
(1539274338, '1583724696', '1574849148', '', '', '2020-03-08 21:32:21', '2020-03-08 21:32:21'),
(1539274339, '1541085648', '1574849085', '60', '40', '2020-03-08 21:33:13', '2020-03-08 21:33:13'),
(1539274340, '1541085648', '1574849108', '90', '40', '2020-03-08 21:33:13', '2020-03-08 21:33:13'),
(1539274341, '1541085648', '1574849126', '0', '0', '2020-03-08 21:33:13', '2020-03-08 21:33:13'),
(1539274342, '1541085648', '1574849148', '0', '0', '2020-03-08 21:33:13', '2020-03-08 21:33:13'),
(1539274343, '1583724817', '1574849085', '60', '40', '2020-03-08 21:36:40', '2020-03-08 21:36:40'),
(1539274344, '1583724817', '1574849108', '90', '', '2020-03-08 21:36:40', '2020-03-08 21:36:40'),
(1539274345, '1583724817', '1574849126', '50', '', '2020-03-08 21:36:40', '2020-03-08 21:36:40'),
(1539274346, '1583724817', '1574849148', '', '', '2020-03-08 21:36:40', '2020-03-08 21:36:40'),
(1539274347, '1583725001', '1574849085', '60', '40', '2020-03-08 21:38:39', '2020-03-08 21:38:39'),
(1539274348, '1583725001', '1574849108', '90', '40', '2020-03-08 21:38:39', '2020-03-08 21:38:39'),
(1539274349, '1583725001', '1574849126', '50', '', '2020-03-08 21:38:39', '2020-03-08 21:38:39'),
(1539274350, '1583725001', '1574849148', '', '', '2020-03-08 21:38:39', '2020-03-08 21:38:39'),
(1539274351, '1583725120', '1574849085', '', '', '2020-03-08 21:40:29', '2020-03-08 21:40:29'),
(1539274352, '1583725120', '1574849108', '', '', '2020-03-08 21:40:29', '2020-03-08 21:40:29'),
(1539274353, '1583725120', '1574849126', '50', '40', '2020-03-08 21:40:29', '2020-03-08 21:40:29'),
(1539274354, '1583725120', '1574849148', '50', '40', '2020-03-08 21:40:29', '2020-03-08 21:40:29'),
(1539274355, '1583725231', '1574849085', '60', '40', '2020-03-08 21:42:12', '2020-03-08 21:42:12'),
(1539274356, '1583725231', '1574849108', '90', '40', '2020-03-08 21:42:12', '2020-03-08 21:42:12'),
(1539274357, '1583725231', '1574849126', '25', '40', '2020-03-08 21:42:12', '2020-03-08 21:42:12'),
(1539274358, '1583725231', '1574849148', '25', '40', '2020-03-08 21:42:12', '2020-03-08 21:42:12'),
(1539274359, '1583725333', '1574849085', '', '', '2020-03-08 21:43:28', '2020-03-08 21:43:28'),
(1539274360, '1583725333', '1574849108', '', '', '2020-03-08 21:43:28', '2020-03-08 21:43:28'),
(1539274361, '1583725333', '1574849126', '50', '40', '2020-03-08 21:43:28', '2020-03-08 21:43:28'),
(1539274362, '1583725333', '1574849148', '50', '40', '2020-03-08 21:43:28', '2020-03-08 21:43:28'),
(1539274363, '1583725001', '1539274350', '0', '0', '2020-03-08 21:45:32', '2020-03-08 21:45:32'),
(1539274364, '1583726631', '1574849085', '', '', '2020-03-08 22:09:30', '2020-03-08 22:09:30'),
(1539274365, '1583726631', '1574849108', '', '', '2020-03-08 22:09:30', '2020-03-08 22:09:30'),
(1539274366, '1583726631', '1574849126', '50', '40', '2020-03-16 09:45:41', '2020-03-08 22:09:30'),
(1539274367, '1583726631', '1574849148', '50', '30', '2020-03-16 09:45:41', '2020-03-08 22:09:30'),
(1539274368, '1583726971', '1574849085', '', '', '2020-03-08 22:10:56', '2020-03-08 22:10:56'),
(1539274369, '1583726971', '1574849108', '', '', '2020-03-08 22:10:56', '2020-03-08 22:10:56'),
(1539274370, '1583726971', '1574849126', '25', '40', '2020-03-16 09:56:36', '2020-03-08 22:10:56'),
(1539274371, '1583726971', '1574849148', '25', '30', '2020-03-16 09:56:36', '2020-03-08 22:10:56'),
(1539274372, '1583727057', '1574849085', '40', '30', '2020-03-16 09:58:25', '2020-03-08 22:12:41'),
(1539274373, '1583727057', '1574849108', '60', '30', '2020-03-16 09:58:25', '2020-03-08 22:12:41'),
(1539274374, '1583727057', '1574849126', '25', '30', '2020-03-16 09:58:25', '2020-03-08 22:12:41'),
(1539274375, '1583727057', '1574849148', '25', '30', '2020-03-16 09:58:25', '2020-03-08 22:12:41'),
(1539274376, '1583727163', '1574849085', '40', '30', '2020-03-16 10:08:01', '2020-03-08 22:14:56'),
(1539274377, '1583727163', '1574849108', '60', '40', '2020-03-16 10:08:01', '2020-03-08 22:14:56'),
(1539274378, '1583727163', '1574849126', '50', '30', '2020-03-16 10:08:01', '2020-03-08 22:14:56'),
(1539274379, '1583727163', '1574849148', '50', '20', '2020-03-16 10:08:02', '2020-03-08 22:14:56'),
(1539274380, '1583727298', '1574849085', '40', '10', '2020-03-16 10:13:24', '2020-03-08 22:16:21'),
(1539274381, '1583727298', '1574849108', '60', '10', '2020-03-16 10:13:24', '2020-03-08 22:16:21'),
(1539274382, '1583727298', '1574849126', '25', '10', '2020-03-16 10:13:24', '2020-03-08 22:16:21'),
(1539274383, '1583727298', '1574849148', '25', '20', '2020-03-16 10:13:25', '2020-03-08 22:16:21'),
(1539274384, '1583727382', '1574849085', '40', '20', '2020-03-16 10:16:36', '2020-03-08 22:17:45'),
(1539274385, '1583727382', '1574849108', '60', '30', '2020-03-16 10:16:36', '2020-03-08 22:17:45'),
(1539274386, '1583727382', '1574849126', '50', '10', '2020-03-16 10:16:36', '2020-03-08 22:17:45'),
(1539274387, '1583727382', '1574849148', '50', '20', '2020-03-16 10:16:36', '2020-03-08 22:17:45'),
(1539274388, '1583727513', '1574849085', '40', '20', '2020-03-16 10:18:23', '2020-03-08 22:20:04'),
(1539274389, '1583727513', '1574849108', '60', '10', '2020-03-16 10:18:23', '2020-03-08 22:20:04'),
(1539274390, '1583727513', '1574849126', '', '', '2020-03-08 22:20:04', '2020-03-08 22:20:04'),
(1539274391, '1583727513', '1574849148', '', '', '2020-03-08 22:20:04', '2020-03-08 22:20:04'),
(1539274392, '1583730675', '1574849085', '40', '40', '2020-03-08 23:14:57', '2020-03-08 23:14:57'),
(1539274393, '1583730675', '1574849108', '60', '40', '2020-03-08 23:14:57', '2020-03-08 23:14:57'),
(1539274394, '1583730675', '1574849126', '', '', '2020-03-08 23:14:57', '2020-03-08 23:14:57'),
(1539274395, '1583730675', '1574849148', '', '', '2020-03-08 23:14:57', '2020-03-08 23:14:57'),
(1539274396, '1583730898', '1574849085', '60', '40', '2020-03-08 23:17:10', '2020-03-08 23:17:10'),
(1539274397, '1583730898', '1574849108', '90', '40', '2020-03-08 23:17:10', '2020-03-08 23:17:10'),
(1539274398, '1583730898', '1574849126', '50', '40', '2020-03-08 23:17:10', '2020-03-08 23:17:10'),
(1539274399, '1583730898', '1574849148', '', '', '2020-03-08 23:17:10', '2020-03-08 23:17:10'),
(1539274400, '1583731031', '1574849085', '60', '40', '2020-03-08 23:22:18', '2020-03-08 23:22:18'),
(1539274401, '1583731031', '1574849108', '90', '40', '2020-03-08 23:22:19', '2020-03-08 23:22:19'),
(1539274402, '1583731031', '1574849126', '25', '40', '2020-03-08 23:22:19', '2020-03-08 23:22:19'),
(1539274403, '1583731031', '1574849148', '25', '40', '2020-03-08 23:22:19', '2020-03-08 23:22:19'),
(1539274404, '1583731340', '1574849085', '', '', '2020-03-08 23:25:11', '2020-03-08 23:25:11'),
(1539274405, '1583731340', '1574849108', '', '', '2020-03-08 23:25:11', '2020-03-08 23:25:11'),
(1539274406, '1583731340', '1574849126', '50', '40', '2020-03-08 23:25:11', '2020-03-08 23:25:11'),
(1539274407, '1583731340', '1574849148', '50', '40', '2020-03-08 23:25:11', '2020-03-08 23:25:11'),
(1539274408, '1583731512', '1574849085', '60', '40', '2020-03-08 23:26:48', '2020-03-08 23:26:48'),
(1539274409, '1583731512', '1574849108', '90', '40', '2020-03-08 23:26:48', '2020-03-08 23:26:48'),
(1539274410, '1583731512', '1574849126', '25', '40', '2020-03-08 23:26:48', '2020-03-08 23:26:48'),
(1539274411, '1583731512', '1574849148', '25', '40', '2020-03-08 23:26:48', '2020-03-08 23:26:48'),
(1539274412, '1583731610', '1574849085', '20', '40', '2020-03-08 23:29:20', '2020-03-08 23:29:20'),
(1539274413, '1583731610', '1574849108', '30', '40', '2020-03-08 23:29:20', '2020-03-08 23:29:20'),
(1539274414, '1583731610', '1574849126', '25', '40', '2020-03-08 23:29:20', '2020-03-08 23:29:20'),
(1539274415, '1583731610', '1574849148', '25', '40', '2020-03-08 23:29:20', '2020-03-08 23:29:20'),
(1539274416, '1583731762', '1574849085', '60', '40', '2020-03-08 23:31:19', '2020-03-08 23:31:19'),
(1539274417, '1583731762', '1574849108', '90', '40', '2020-03-08 23:31:19', '2020-03-08 23:31:19'),
(1539274418, '1583731762', '1574849126', '50', '40', '2020-03-08 23:31:19', '2020-03-08 23:31:19'),
(1539274419, '1583731762', '1574849148', '', '', '2020-03-08 23:31:19', '2020-03-08 23:31:19'),
(1539274420, '1583819589', '1574849085', '60', '40', '2020-03-09 23:54:14', '2020-03-09 23:54:14'),
(1539274421, '1583819589', '1574849108', '90', '40', '2020-03-09 23:54:14', '2020-03-09 23:54:14'),
(1539274422, '1583819589', '1574849126', '25', '40', '2020-03-09 23:54:14', '2020-03-09 23:54:14'),
(1539274423, '1583819589', '1574849148', '25', '40', '2020-03-09 23:54:14', '2020-03-09 23:54:14'),
(1539274424, '1583819657', '1574849085', '60', '40', '2020-03-09 23:55:22', '2020-03-09 23:55:22'),
(1539274425, '1583819657', '1574849108', '90', '40', '2020-03-09 23:55:22', '2020-03-09 23:55:22'),
(1539274426, '1583819657', '1574849126', '25', '40', '2020-03-09 23:55:22', '2020-03-09 23:55:22'),
(1539274427, '1583819657', '1574849148', '25', '40', '2020-03-09 23:55:22', '2020-03-09 23:55:22'),
(1539274428, '1583819724', '1574849085', '60', '40', '2020-03-09 23:56:28', '2020-03-09 23:56:28'),
(1539274429, '1583819724', '1574849108', '90', '40', '2020-03-09 23:56:29', '2020-03-09 23:56:29'),
(1539274430, '1583819724', '1574849126', '25', '40', '2020-03-09 23:56:29', '2020-03-09 23:56:29'),
(1539274431, '1583819724', '1574849148', '25', '', '2020-03-09 23:56:29', '2020-03-09 23:56:29'),
(1539274432, '1583836328', '1574849085', '60', '40', '2020-03-10 04:34:14', '2020-03-10 04:34:14'),
(1539274433, '1583836328', '1574849108', '90', '40', '2020-03-10 04:34:14', '2020-03-10 04:34:14'),
(1539274434, '1583836328', '1574849126', '50', '40', '2020-03-10 04:34:14', '2020-03-10 04:34:14'),
(1539274435, '1583836328', '1574849148', '', '', '2020-03-10 04:34:15', '2020-03-10 04:34:15'),
(1539274436, '1583836458', '1574849085', '40', '40', '2020-03-10 04:35:27', '2020-03-10 04:35:27'),
(1539274437, '1583836458', '1574849108', '60', '40', '2020-03-10 04:35:27', '2020-03-10 04:35:27'),
(1539274438, '1583836458', '1574849126', '', '', '2020-03-10 04:35:27', '2020-03-10 04:35:27'),
(1539274439, '1583836458', '1574849148', '', '', '2020-03-10 04:35:28', '2020-03-10 04:35:28'),
(1539274440, '1583836530', '1574849085', '60', '40', '2020-03-10 04:36:43', '2020-03-10 04:36:43'),
(1539274441, '1583836530', '1574849108', '90', '40', '2020-03-10 04:36:43', '2020-03-10 04:36:43'),
(1539274442, '1583836530', '1574849126', '50', '', '2020-03-10 04:36:43', '2020-03-10 04:36:43'),
(1539274443, '1583836530', '1574849148', '', '', '2020-03-10 04:36:43', '2020-03-10 04:36:43'),
(1539274444, '1583837073', '1574849085', '60', '40', '2020-03-10 04:46:16', '2020-03-10 04:46:16'),
(1539274445, '1583837073', '1574849108', '90', '40', '2020-03-10 04:46:16', '2020-03-10 04:46:16'),
(1539274446, '1583837073', '1574849126', '25', '40', '2020-03-10 04:46:16', '2020-03-10 04:46:16'),
(1539274447, '1583837073', '1574849148', '25', '40', '2020-03-10 04:46:16', '2020-03-10 04:46:16'),
(1539274448, '1583837178', '1574849085', '40', '40', '2020-03-10 04:47:55', '2020-03-10 04:47:55'),
(1539274449, '1583837178', '1574849108', '60', '40', '2020-03-10 04:47:55', '2020-03-10 04:47:55'),
(1539274450, '1583837178', '1574849126', '25', '40', '2020-03-10 04:47:55', '2020-03-10 04:47:55'),
(1539274451, '1583837178', '1574849148', '25', '40', '2020-03-10 04:47:55', '2020-03-10 04:47:55'),
(1539274452, '1583837278', '1574849085', '40', '40', '2020-03-10 04:49:12', '2020-03-10 04:49:12'),
(1539274453, '1583837278', '1574849108', '60', '40', '2020-03-10 04:49:12', '2020-03-10 04:49:12'),
(1539274454, '1583837278', '1574849126', '25', '40', '2020-03-10 04:49:12', '2020-03-10 04:49:12'),
(1539274455, '1583837278', '1574849148', '25', '40', '2020-03-10 04:49:12', '2020-03-10 04:49:12'),
(1539274456, '1583837355', '1574849085', '20', '40', '2020-03-10 04:50:17', '2020-03-10 04:50:17'),
(1539274457, '1583837355', '1574849108', '30', '40', '2020-03-10 04:50:17', '2020-03-10 04:50:17'),
(1539274458, '1583837355', '1574849126', '25', '40', '2020-03-10 04:50:17', '2020-03-10 04:50:17'),
(1539274459, '1583837355', '1574849148', '25', '40', '2020-03-10 04:50:17', '2020-03-10 04:50:17'),
(1539274460, '1583837419', '1574849085', '40', '40', '2020-03-10 04:54:04', '2020-03-10 04:54:04'),
(1539274461, '1583837419', '1574849108', '60', '40', '2020-03-10 04:54:04', '2020-03-10 04:54:04'),
(1539274462, '1583837419', '1574849126', '25', '40', '2020-03-10 04:54:04', '2020-03-10 04:54:04'),
(1539274463, '1583837419', '1574849148', '25', '40', '2020-03-10 04:54:04', '2020-03-10 04:54:04'),
(1539274464, '1583837646', '1574849085', '20', '40', '2020-03-10 04:55:08', '2020-03-10 04:55:08'),
(1539274465, '1583837646', '1574849108', '30', '40', '2020-03-10 04:55:08', '2020-03-10 04:55:08'),
(1539274466, '1583837646', '1574849126', '50', '40', '2020-03-10 04:55:08', '2020-03-10 04:55:08'),
(1539274467, '1583837646', '1574849148', '', '', '2020-03-10 04:55:08', '2020-03-10 04:55:08'),
(1539274468, '1583837710', '1574849085', '60', '40', '2020-03-10 04:56:45', '2020-03-10 04:56:45'),
(1539274469, '1583837710', '1574849108', '90', '40', '2020-03-10 04:56:45', '2020-03-10 04:56:45'),
(1539274470, '1583837710', '1574849126', '50', '40', '2020-03-10 04:56:45', '2020-03-10 04:56:45'),
(1539274471, '1583837710', '1574849148', '', '', '2020-03-10 04:56:45', '2020-03-10 04:56:45'),
(1539274472, '1583837808', '1574849085', '60', '40', '2020-03-10 04:58:39', '2020-03-10 04:58:39'),
(1539274473, '1583837808', '1574849108', '90', '40', '2020-03-10 04:58:39', '2020-03-10 04:58:39'),
(1539274474, '1583837808', '1574849126', '25', '40', '2020-03-10 04:58:39', '2020-03-10 04:58:39'),
(1539274475, '1583837808', '1574849148', '25', '40', '2020-03-10 04:58:39', '2020-03-10 04:58:39'),
(1539274476, '1583837922', '1574849085', '', '', '2020-03-10 04:59:52', '2020-03-10 04:59:52'),
(1539274477, '1583837922', '1574849108', '', '', '2020-03-10 04:59:52', '2020-03-10 04:59:52'),
(1539274478, '1583837922', '1574849126', '50', '40', '2020-03-10 04:59:52', '2020-03-10 04:59:52'),
(1539274479, '1583837922', '1574849148', '50', '40', '2020-03-10 04:59:52', '2020-03-10 04:59:52'),
(1539274480, '1583837995', '1574849085', '40', '40', '2020-03-10 05:01:49', '2020-03-10 05:01:49'),
(1539274481, '1583837995', '1574849108', '60', '40', '2020-03-10 05:01:49', '2020-03-10 05:01:49'),
(1539274482, '1583837995', '1574849126', '25', '40', '2020-03-10 05:01:49', '2020-03-10 05:01:49'),
(1539274483, '1583837995', '1574849148', '25', '40', '2020-03-10 05:01:49', '2020-03-10 05:01:49'),
(1539274484, '1583838209', '1574849085', '', '', '2020-03-10 05:04:18', '2020-03-10 05:04:18'),
(1539274485, '1583838209', '1574849108', '', '', '2020-03-10 05:04:19', '2020-03-10 05:04:19'),
(1539274486, '1583838209', '1574849126', '25', '40', '2020-03-10 05:04:19', '2020-03-10 05:04:19'),
(1539274487, '1583838209', '1574849148', '25', '40', '2020-03-10 05:04:19', '2020-03-10 05:04:19'),
(1539274488, '1583901081', '1574849085', '60', '40', '2020-03-10 22:33:33', '2020-03-10 22:33:33'),
(1539274489, '1583901081', '1574849108', '90', '40', '2020-03-10 22:33:34', '2020-03-10 22:33:34'),
(1539274490, '1583901081', '1574849126', '25', '40', '2020-03-10 22:33:34', '2020-03-10 22:33:34'),
(1539274491, '1583901081', '1574849148', '25', '40', '2020-03-10 22:33:34', '2020-03-10 22:33:34'),
(1539274492, '1583901216', '1574849085', '40', '40', '2020-03-10 22:34:56', '2020-03-10 22:34:56'),
(1539274493, '1583901216', '1574849108', '60', '40', '2020-03-10 22:34:56', '2020-03-10 22:34:56'),
(1539274494, '1583901216', '1574849126', '25', '40', '2020-03-10 22:34:56', '2020-03-10 22:34:56'),
(1539274495, '1583901216', '1574849148', '25', '40', '2020-03-10 22:34:56', '2020-03-10 22:34:56'),
(1539274496, '1583901298', '1574849085', '', '', '2020-03-10 22:35:44', '2020-03-10 22:35:44'),
(1539274497, '1583901298', '1574849108', '', '', '2020-03-10 22:35:44', '2020-03-10 22:35:44'),
(1539274498, '1583901298', '1574849126', '50', '40', '2020-03-10 22:35:44', '2020-03-10 22:35:44'),
(1539274499, '1583901298', '1574849148', '50', '40', '2020-03-10 22:35:44', '2020-03-10 22:35:44'),
(1539274500, '1583901347', '1574849085', '60', '40', '2020-03-10 22:36:51', '2020-03-10 22:36:51'),
(1539274501, '1583901347', '1574849108', '90', '40', '2020-03-10 22:36:51', '2020-03-10 22:36:51'),
(1539274502, '1583901347', '1574849126', '50', '40', '2020-03-10 22:36:51', '2020-03-10 22:36:51'),
(1539274503, '1583901347', '1574849148', '', '', '2020-03-10 22:36:51', '2020-03-10 22:36:51'),
(1539274504, '1583901414', '1574849085', '60', '40', '2020-03-10 22:38:14', '2020-03-10 22:38:14'),
(1539274505, '1583901414', '1574849108', '90', '40', '2020-03-10 22:38:14', '2020-03-10 22:38:14'),
(1539274506, '1583901414', '1574849126', '25', '40', '2020-03-10 22:38:14', '2020-03-10 22:38:14'),
(1539274507, '1583901414', '1574849148', '25', '40', '2020-03-10 22:38:14', '2020-03-10 22:38:14'),
(1539274508, '1583901496', '1574849085', '60', '40', '2020-03-10 22:39:03', '2020-03-10 22:39:03'),
(1539274509, '1583901496', '1574849108', '90', '40', '2020-03-10 22:39:03', '2020-03-10 22:39:03'),
(1539274510, '1583901496', '1574849126', '50', '40', '2020-03-10 22:39:03', '2020-03-10 22:39:03'),
(1539274511, '1583901496', '1574849148', '', '', '2020-03-10 22:39:03', '2020-03-10 22:39:03'),
(1539274512, '1583901546', '1574849085', '40', '40', '2020-03-10 22:39:54', '2020-03-10 22:39:54'),
(1539274513, '1583901546', '1574849108', '60', '40', '2020-03-10 22:39:54', '2020-03-10 22:39:54'),
(1539274514, '1583901546', '1574849126', '', '', '2020-03-10 22:39:54', '2020-03-10 22:39:54'),
(1539274515, '1583901546', '1574849148', '', '', '2020-03-10 22:39:54', '2020-03-10 22:39:54'),
(1539274516, '1583903840', '1574849085', '40', '', '2020-03-10 23:18:32', '2020-03-10 23:18:32'),
(1539274517, '1583903840', '1574849108', '60', '', '2020-03-10 23:18:32', '2020-03-10 23:18:32'),
(1539274518, '1583903840', '1574849126', '50', '', '2020-03-10 23:18:33', '2020-03-10 23:18:33'),
(1539274519, '1583903840', '1574849148', '50', '', '2020-03-10 23:18:33', '2020-03-10 23:18:33'),
(1539274520, '1583903914', '1574849085', '40', '40', '2020-03-10 23:19:51', '2020-03-10 23:19:51'),
(1539274521, '1583903914', '1574849108', '60', '40', '2020-03-10 23:19:51', '2020-03-10 23:19:51'),
(1539274522, '1583903914', '1574849126', '25', '40', '2020-03-10 23:19:51', '2020-03-10 23:19:51'),
(1539274523, '1583903914', '1574849148', '25', '40', '2020-03-10 23:19:51', '2020-03-10 23:19:51'),
(1539274524, '1583904016', '1574849085', '20', '40', '2020-03-10 23:21:30', '2020-03-10 23:21:30'),
(1539274525, '1583904016', '1574849108', '30', '40', '2020-03-10 23:21:30', '2020-03-10 23:21:30'),
(1539274526, '1583904016', '1574849126', '50', '40', '2020-03-10 23:21:30', '2020-03-10 23:21:30'),
(1539274527, '1583904016', '1574849148', '50', '40', '2020-03-10 23:21:30', '2020-03-10 23:21:30'),
(1539274528, '1583904091', '1574849085', '40', '40', '2020-03-10 23:22:53', '2020-03-10 23:22:53'),
(1539274529, '1583904091', '1574849108', '60', '40', '2020-03-10 23:22:53', '2020-03-10 23:22:53'),
(1539274530, '1583904091', '1574849126', '50', '40', '2020-03-10 23:22:53', '2020-03-10 23:22:53'),
(1539274531, '1583904091', '1574849148', '50', '40', '2020-03-10 23:22:53', '2020-03-10 23:22:53'),
(1539274532, '1583904175', '1574849085', '40', '40', '2020-03-10 23:24:03', '2020-03-10 23:24:03'),
(1539274533, '1583904175', '1574849108', '60', '40', '2020-03-10 23:24:03', '2020-03-10 23:24:03'),
(1539274534, '1583904175', '1574849126', '', '', '2020-03-10 23:24:03', '2020-03-10 23:24:03'),
(1539274535, '1583904175', '1574849148', '', '', '2020-03-10 23:24:03', '2020-03-10 23:24:03'),
(1539274536, '1583904244', '1574849085', '40', '40', '2020-03-10 23:25:06', '2020-03-10 23:25:06'),
(1539274537, '1583904244', '1574849108', '60', '40', '2020-03-10 23:25:06', '2020-03-10 23:25:06'),
(1539274538, '1583904244', '1574849126', '', '', '2020-03-10 23:25:06', '2020-03-10 23:25:06'),
(1539274539, '1583904244', '1574849148', '', '', '2020-03-10 23:25:06', '2020-03-10 23:25:06'),
(1539274540, '1583904308', '1574849085', '40', '40', '2020-03-10 23:26:44', '2020-03-10 23:26:44');
INSERT INTO `subject_component` (`subject_component_id`, `subject_id`, `component_id`, `total_mark`, `pass_mark`, `created_at`, `updated_at`) VALUES
(1539274541, '1583904308', '1574849108', '60', '40', '2020-03-10 23:26:44', '2020-03-10 23:26:44'),
(1539274542, '1583904308', '1574849126', '', '', '2020-03-10 23:26:44', '2020-03-10 23:26:44'),
(1539274543, '1583904308', '1574849148', '', '', '2020-03-10 23:26:44', '2020-03-10 23:26:44'),
(1539274544, '1583904406', '1574849085', '40', '40', '2020-03-10 23:29:29', '2020-03-10 23:29:29'),
(1539274545, '1583904406', '1574849108', '60', '40', '2020-03-10 23:29:29', '2020-03-10 23:29:29'),
(1539274546, '1583904406', '1574849126', '50', '40', '2020-03-10 23:29:29', '2020-03-10 23:29:29'),
(1539274547, '1583904406', '1574849148', '50', '40', '2020-03-10 23:29:29', '2020-03-10 23:29:29'),
(1539274548, '1583904571', '1574849085', '', '', '2020-03-10 23:30:31', '2020-03-10 23:30:31'),
(1539274549, '1583904571', '1574849108', '', '', '2020-03-10 23:30:31', '2020-03-10 23:30:31'),
(1539274550, '1583904571', '1574849126', '50', '40', '2020-03-10 23:30:31', '2020-03-10 23:30:31'),
(1539274551, '1583904571', '1574849148', '50', '40', '2020-03-10 23:30:31', '2020-03-10 23:30:31'),
(1539274552, '1583904633', '1574849085', '40', '40', '2020-03-10 23:31:37', '2020-03-10 23:31:37'),
(1539274553, '1583904633', '1574849108', '60', '40', '2020-03-10 23:31:37', '2020-03-10 23:31:37'),
(1539274554, '1583904633', '1574849126', '', '', '2020-03-10 23:31:37', '2020-03-10 23:31:37'),
(1539274555, '1583904633', '1574849148', '', '', '2020-03-10 23:31:37', '2020-03-10 23:31:37'),
(1539274556, '1583904699', '1574849085', '40', '40', '2020-03-10 23:33:19', '2020-03-10 23:33:19'),
(1539274557, '1583904699', '1574849108', '60', '40', '2020-03-10 23:33:19', '2020-03-10 23:33:19'),
(1539274558, '1583904699', '1574849126', '25', '40', '2020-03-10 23:33:19', '2020-03-10 23:33:19'),
(1539274559, '1583904699', '1574849148', '25', '40', '2020-03-10 23:33:20', '2020-03-10 23:33:20'),
(1539274560, '1583904801', '1574849085', '40', '40', '2020-03-10 23:34:45', '2020-03-10 23:34:45'),
(1539274561, '1583904801', '1574849108', '60', '40', '2020-03-10 23:34:45', '2020-03-10 23:34:45'),
(1539274562, '1583904801', '1574849126', '25', '40', '2020-03-10 23:34:45', '2020-03-10 23:34:45'),
(1539274563, '1583904801', '1574849148', '25', '40', '2020-03-10 23:34:45', '2020-03-10 23:34:45'),
(1539274564, '1583904886', '1574849085', '60', '40', '2020-03-10 23:36:35', '2020-03-10 23:36:35'),
(1539274565, '1583904886', '1574849108', '90', '40', '2020-03-10 23:36:35', '2020-03-10 23:36:35'),
(1539274566, '1583904886', '1574849126', '25', '40', '2020-03-10 23:36:35', '2020-03-10 23:36:35'),
(1539274567, '1583904886', '1574849148', '25', '40', '2020-03-10 23:36:35', '2020-03-10 23:36:35'),
(1539274568, '1583904308', '1539274542', '0', '0', '2020-03-11 00:07:44', '2020-03-11 00:07:44'),
(1539274569, '1583904308', '1539274543', '0', '0', '2020-03-11 00:07:44', '2020-03-11 00:07:44'),
(1539274570, '1583906966', '1574849085', '40', '40', '2020-03-11 00:11:54', '2020-03-11 00:11:54'),
(1539274571, '1583906966', '1574849108', '60', '40', '2020-03-11 00:11:54', '2020-03-11 00:11:54'),
(1539274572, '1583906966', '1574849126', '25', '40', '2020-03-11 00:11:54', '2020-03-11 00:11:54'),
(1539274573, '1583906966', '1574849148', '25', '40', '2020-03-11 00:11:54', '2020-03-11 00:11:54'),
(1539274574, '1583907116', '1574849085', '40', '40', '2020-03-11 00:14:03', '2020-03-11 00:14:03'),
(1539274575, '1583907116', '1574849108', '60', '40', '2020-03-11 00:14:03', '2020-03-11 00:14:03'),
(1539274576, '1583907116', '1574849126', '50', '40', '2020-03-11 00:14:03', '2020-03-11 00:14:03'),
(1539274577, '1583907116', '1574849148', '50', '40', '2020-03-11 00:14:03', '2020-03-11 00:14:03'),
(1539274578, '1583907245', '1574849085', '', '', '2020-03-11 00:15:37', '2020-03-11 00:15:37'),
(1539274579, '1583907245', '1574849108', '', '', '2020-03-11 00:15:37', '2020-03-11 00:15:37'),
(1539274580, '1583907245', '1574849126', '50', '40', '2020-03-11 00:15:37', '2020-03-11 00:15:37'),
(1539274581, '1583907245', '1574849148', '50', '40', '2020-03-11 00:15:37', '2020-03-11 00:15:37'),
(1539274582, '1583907339', '1574849085', '40', '40', '2020-03-11 00:17:38', '2020-03-11 00:17:38'),
(1539274583, '1583907339', '1574849108', '60', '40', '2020-03-11 00:17:38', '2020-03-11 00:17:38'),
(1539274584, '1583907339', '1574849126', '50', '40', '2020-03-11 00:17:38', '2020-03-11 00:17:38'),
(1539274585, '1583907339', '1574849148', '50', '40', '2020-03-11 00:17:38', '2020-03-11 00:17:38'),
(1539274586, '1583907460', '1574849085', '40', '40', '2020-03-11 00:18:47', '2020-03-11 00:18:47'),
(1539274587, '1583907460', '1574849108', '60', '40', '2020-03-11 00:18:47', '2020-03-11 00:18:47'),
(1539274588, '1583907460', '1574849126', '50', '40', '2020-03-11 00:18:47', '2020-03-11 00:18:47'),
(1539274589, '1583907460', '1574849148', '50', '40', '2020-03-11 00:18:47', '2020-03-11 00:18:47'),
(1539274590, '1583907528', '1574849085', '40', '40', '2020-03-11 00:19:37', '2020-03-11 00:19:37'),
(1539274591, '1583907528', '1574849108', '60', '40', '2020-03-11 00:19:37', '2020-03-11 00:19:37'),
(1539274592, '1583907528', '1574849126', '', '', '2020-03-11 00:19:37', '2020-03-11 00:19:37'),
(1539274593, '1583907528', '1574849148', '', '', '2020-03-11 00:19:37', '2020-03-11 00:19:37'),
(1539274594, '1583726631', '1539274364', '0', '0', '2020-03-16 03:45:41', '2020-03-16 03:45:41'),
(1539274595, '1583726631', '1539274365', '0', '0', '2020-03-16 03:45:41', '2020-03-16 03:45:41'),
(1539274596, '1583726971', '1539274368', '0', '0', '2020-03-16 03:53:51', '2020-03-16 03:53:51'),
(1539274597, '1583726971', '1539274369', '0', '0', '2020-03-16 03:53:51', '2020-03-16 03:53:51'),
(1539274598, '1583726971', '1539274368', '0', '0', '2020-03-16 03:54:36', '2020-03-16 03:54:36'),
(1539274599, '1583726971', '1539274369', '0', '0', '2020-03-16 03:54:36', '2020-03-16 03:54:36'),
(1539274600, '1583726971', '1539274368', '0', '0', '2020-03-16 03:55:18', '2020-03-16 03:55:18'),
(1539274601, '1583726971', '1539274369', '0', '0', '2020-03-16 03:55:19', '2020-03-16 03:55:19'),
(1539274602, '1583726971', '1539274368', '0', '0', '2020-03-16 03:56:35', '2020-03-16 03:56:35'),
(1539274603, '1583726971', '1539274369', '0', '0', '2020-03-16 03:56:36', '2020-03-16 03:56:36'),
(1539274604, '1583727513', '1539274390', '0', '0', '2020-03-16 04:18:23', '2020-03-16 04:18:23'),
(1539274605, '1583727513', '1539274391', '0', '0', '2020-03-16 04:18:23', '2020-03-16 04:18:23');

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
(1, NULL, 4545, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:01', '2020-03-31 09:53:01'),
(2, NULL, 4354, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:01', '2020-03-31 09:53:01'),
(3, NULL, 544, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(4, NULL, 4534, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(5, NULL, 5435, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(6, NULL, 435435, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(7, NULL, 435, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(8, NULL, 435, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(9, NULL, 5434, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(10, NULL, 5434, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(11, NULL, 43543, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(12, NULL, 43543, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:02', '2020-03-31 09:53:02'),
(13, NULL, 45, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:03', '2020-03-31 09:53:03'),
(14, NULL, 4354, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:03', '2020-03-31 09:53:03'),
(15, NULL, 454, 105, '6517104', 'Student', 'Student Dormitory Invoice', 8, '2020-03-31 09:53:03', '2020-03-31 09:53:03'),
(16, NULL, 32432, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:43', '2020-03-31 09:58:43'),
(17, NULL, 432, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(18, NULL, 2344, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(19, NULL, 2343, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(20, NULL, 423, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(21, NULL, 324, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(22, NULL, 32, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(23, NULL, 2344, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(24, NULL, 32432, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(25, NULL, 4322, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(26, NULL, 4324, 105, '19125', 'Student', 'Student Library Invoice', 9, '2020-03-31 09:58:44', '2020-03-31 09:58:44'),
(27, NULL, 34543, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:26', '2020-04-01 06:34:26'),
(28, NULL, 5345345, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:26', '2020-04-01 06:34:26'),
(29, NULL, 5345, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:26', '2020-04-01 06:34:26'),
(30, NULL, 3455, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:26', '2020-04-01 06:34:26'),
(31, NULL, 3543, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(32, NULL, 43543, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(33, NULL, 53, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(34, NULL, 5435, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(35, NULL, 435, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(36, NULL, 534534, 105, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(37, NULL, 5435, 115, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(38, NULL, 5434, 102, '2010242', 'Student', 'Student Invoice', 10, '2020-04-01 06:34:27', '2020-04-01 06:34:27'),
(39, 545, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:27', '2020-04-01 07:11:27'),
(40, 5434, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(41, 435435435, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(42, 5435, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(43, 534, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(44, 543, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(45, 53434, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(46, 34543543, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(47, 345, NULL, 10, '2010242', 'Student', 'Student Payment', 1585725087, '2020-04-01 07:11:28', '2020-04-01 07:11:28'),
(48, NULL, 4534, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(49, NULL, 53453, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(50, NULL, 43534, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(51, NULL, 35434, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(52, NULL, 54354, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(53, NULL, 5433, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:07', '2020-04-01 09:58:07'),
(54, NULL, 4355, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:08', '2020-04-01 09:58:08'),
(55, NULL, 53454, 105, '2010242', 'Student', 'Student Invoice', 11, '2020-04-01 09:58:08', '2020-04-01 09:58:08'),
(56, NULL, 787, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(57, NULL, 78, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(58, NULL, 867, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(59, NULL, 867, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:42', '2020-04-02 04:30:42'),
(60, NULL, 67867, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(61, NULL, 8678, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(62, NULL, 67867, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(63, NULL, 8678, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(64, NULL, 768, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(65, NULL, 6788, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(66, NULL, 86787, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(67, NULL, 678767, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(68, NULL, 868, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(69, NULL, 86, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(70, NULL, 678, 105, '159921', 'Student', 'Student Invoice', 12, '2020-04-02 04:30:43', '2020-04-02 04:30:43'),
(71, NULL, 6767, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(72, NULL, 765756, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(73, NULL, 7657, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(74, NULL, 57657, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:55', '2020-04-02 04:39:55'),
(75, NULL, 765, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:56', '2020-04-02 04:39:56'),
(76, NULL, 65765, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:56', '2020-04-02 04:39:56'),
(77, NULL, 7655, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:56', '2020-04-02 04:39:56'),
(78, NULL, 6576, 105, '981375', 'Student', 'Student Invoice', 13, '2020-04-02 04:39:56', '2020-04-02 04:39:56');

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
(3, 'transport', 1539257056, 1990, 0, 'Receipt', NULL, NULL),
(4, 'library', 1539255814, 1990, 0, 'Receipt', NULL, NULL),
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
  `designation` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `employment_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `fathers_name`, `mothers_name`, `birth_date`, `marital_status`, `gender`, `religion`, `mobile_no`, `job_type`, `work_department`, `medium`, `created_at`, `updated_at`, `status`, `user_id`, `email`, `type`, `designation`, `employment_id`) VALUES
(1539174032, 'Md Sohel Rana', 'Md Zobed Ali', 'Farida Begum', '1990-11-22', 'Married', 'Male', 'Islam', '01738664192', 'English', 'Academic ', 'TISI', '2018-10-10 06:20:32', '2020-03-08 22:22:58', 'Teacher', '47', 'manikmilon@gmail.com', 'Non-Tech', 'Instructor', '201-01850'),
(1539269726, 'Md. Jubayer Hossain', 'Md. Moksed Hossain', 'Most. Afsana Khatun', '1993-01-01', 'Married', 'Male', 'Islam', '01737170087', 'Computer Science & Technology', 'Academic ', 'TISI', '2018-10-11 08:55:26', '2019-12-02 01:15:16', 'Teacher', '53', 'jubayer.inf1@gmail.com', 'Tech', 'instructor', '201-02504'),
(1539270198, 'A.T.M Tazmilur Rahman', 'Late Haris Uddin Talukdar  ', 'Mst . Akhterun Nessa', '1978-10-07', 'Married', 'Male', 'Islam', '01716190099', 'Chemistry', 'Academic ', 'TISI', '2018-10-11 09:03:19', '2018-11-01 08:37:01', 'Teacher', '54', 'tazmilurtmss@gmail.com', 'Non-Tech', 'instructor', ''),
(1539270355, 'Md. Muraduzzaman', 'Md. Abdul Karim Talukdar', 'Mst. Mile Begum', '1982-11-27', 'Married', 'Male', 'Islam', '01722713671', 'Physic', 'Academic ', 'TISI', '2018-10-11 09:05:55', '2019-12-04 04:35:52', 'Teacher', '55', 'muraduzzamanmrd@gmail.com', 'Non-Tech', 'instructor', '201-02503'),
(1539270530, 'Jakiya Jafrin', 'Md. Shahabuddin Ahmed', 'Sharmin Ahmed', '1995-09-01', 'Married', 'Male', 'Islam', '01754355639', 'Glass Technology', 'Academic ', 'TISI', '2018-10-11 09:08:50', '2018-12-02 07:20:23', 'Teacher', '56', 'jakiya.tisi@gmail.com', 'Tech', 'Instructor', ''),
(1539270700, 'Md. Shariful Islam', 'Md. Baschu', 'Mrs. Shirina Begum', '1994-06-25', 'Married', 'Male', 'Islam', '01707558403', 'Graphics Technology', 'Academic ', 'TISI', '2018-10-11 09:11:40', '2019-12-04 04:26:16', 'Teacher', '57', 'Sharifbdd@gmail.com', 'Tech', 'instructor', '201-02520'),
(1539271331, 'Md. Arif Ahmed', 'Md. Golam Mostafa', 'Miss. Sajeda Begum', '1993-12-01', 'Married', 'Male', 'Islam', '01722741750', 'Graphics Technology', 'Academic ', 'TISI', '2018-10-11 09:22:11', '2019-12-02 01:14:17', 'Teacher', '59', 'arif.dtp@gmail.com', 'Tech', 'Junior Instructor', '201-02519'),
(1539271725, 'Shaima Hanif', 'Md. Abu Hanif', 'Kohinoor Begum', '1993-12-14', 'Married', 'Male', 'Islam', '01737502224', 'Electrical Technology', 'Academic ', 'TISI', '2018-10-11 09:28:45', '2019-11-28 01:10:13', 'Teacher', '60', 'shaimashuchi@gmail.com', 'Tech', 'Instructor', ''),
(1539273589, 'Md. Masud Rana', 'Md. Nurul Islam', 'Delara Begum', '1997-12-12', 'Married', 'Male', 'Islam', '01794352889', 'Computer Science & Technology', 'Academic ', 'TISI', '2018-10-11 09:59:49', '2019-12-02 01:16:50', 'Teacher', '61', 'masudrana.bbpi@gmail.com', 'Tech', 'Junior Instructor', '201-02496'),
(1541504305, 'Rabya Khathun', 'Md. Abdur Rahim', 'Mst. Merina Begum', '1990-12-11', 'Married', 'Male', 'Islam', '01684883090', 'Social Science', 'Non Tech', 'TISI', '2018-11-06 05:38:25', '2020-03-08 22:00:22', 'Teacher', '65', 'rabyarabu@gmail.com', 'Non-Tech', 'Instructor', '201-02472'),
(1544454144, 'Subroto Subon Acharjee', 'Shyama Rajan Acharjee', 'Swapna Acharjee', '1977-12-12', 'Married', 'Male', 'Islam', '01558852080', 'Physic(Four)', 'Academic & Administrative', 'TISI', '2018-12-10 09:02:24', '2020-03-14 01:37:52', 'Teacher', '67', 'subrotoa@gmail.com', 'Non-Tech', 'Vice Principal', '01'),
(1545568415, 'Md. Abu Raihan', 'Md. Asraf Ali', 'Sahar banu', '1992-12-24', 'Married', 'Male', 'Islam', '01711405998', 'Administritive Officer', 'Administrative ', 'TISI', '2018-12-23 06:33:35', '2019-12-01 04:34:25', 'Staff', NULL, 'aburaihanbss@gmail.com', '', '', ''),
(1546270743, 'Md. Abu Sayed ', 'Md. Zahedur Rhaman', 'Mst. Bedena Khatun ', '1987-01-03', 'Married', 'Male', 'Islam', '01712230047', 'Accounts Officer', 'Finance & Accounts ', 'TISI & TFAUMCH', '2018-12-31 09:39:03', '2018-12-31 09:39:03', 'Staff', NULL, 'sayedsafollo@gmail.com', '', '', ''),
(1574844745, 'MD. A. Jabbar', 'MD. Manirul Islam', 'MST. Jahanara Begum', '1987-11-01', 'Married', 'Male', 'Islam', '01728245600', 'Librarian', 'Administrative ', 'TISI', '2019-11-27 02:52:25', '2019-11-27 02:55:43', 'Staff', NULL, 'Jabbar2910@gmail.com', '', '', ''),
(1574844910, 'Mst Rejuana Talukder', 'Md. Rafiqul Islam', 'Mst Shahida Tajmeri', '1992-12-15', 'Married', 'Female', 'Islam', '01777798113', 'Accounts Officer', 'Finance & Accounts ', 'TISI', '2019-11-27 02:55:10', '2020-03-14 01:29:49', 'Staff', NULL, 'Rejuana@gmail.com', '', '', 'CB'),
(1574845478, 'Md. Faruk Hossain', 'Late. Zolilur Fokir', 'Mst. Nurunnahar', '1982-10-29', 'Married', 'Male', 'Islam', '01773959289', 'Electircian', 'Academic & Administrative', 'TISI', '2019-11-27 03:04:38', '2019-11-27 03:04:38', 'Staff', NULL, 'Faruk@gmail.com', '', '', ''),
(1574845697, 'Md . Maksedul Islam', 'Golam Rabbani', 'Mrs.Momena Begum', '2000-07-10', 'Married', 'Male', 'Islam', '01316835824', 'Gardener', 'Administrative ', 'TISI', '2019-11-27 03:08:17', '2020-03-14 02:50:10', 'Staff', NULL, 'Maksedul@gmail.com', '', '', 'WB-C221'),
(1574845859, 'Amran Ferdhos Islam', 'Akramul Islam', 'Mrs Ferdhosi Nasrin Islam', '1983-09-26', 'Married', 'Male', 'Islam', '01716942641', 'Marketing Officer', 'Academic ', 'TISI', '2019-11-27 03:10:59', '2019-11-27 03:10:59', 'Staff', NULL, 'amran.ferdhos@yahoo.co.uk', '', '', ''),
(1574845973, 'Md.Golam Robbani', 'Md.Mozam Ali Shakidar', 'Mst.Shofia Begum', '1990-03-15', 'Married', 'Male', 'Islam', '01724018208', 'Foreman', 'Administrative ', 'TISI', '2019-11-27 03:12:53', '2019-11-27 03:12:53', 'Staff', NULL, 'Golam@gmail.com', '', '', ''),
(1574846217, 'Md Shafiq Rohman', 'Sohiruddin', 'Rahema Beoya', '1969-01-01', 'Married', 'Male', 'Islam', '01745909318', 'MLS', 'Administrative ', 'TISI', '2019-11-27 03:16:57', '2020-03-14 01:26:36', 'Staff', NULL, 'Shafiq@gmail.com', '', '', 'WB-C218'),
(1574846606, 'Md Maznu Miah', 'Md Abdur Rahman', 'Mrs Laily Khatun', '1989-12-15', 'Unmarried', 'Male', 'Islam', '01722708732', 'Bangla(One)', 'Academic ', 'TISI', '2019-11-27 03:23:26', '2019-11-27 03:23:26', 'Teacher', '73', 'mahmudh5y@gmail.com', 'Non-Tech', 'Instructor', ''),
(1574846973, 'Ali Azom', 'Attab Ali', 'Sanowara', '1995-05-06', 'Unmarried', 'Male', 'Islam', '01780809842', 'Computer Science & Technology', 'Academic ', 'TISI', '2019-11-27 03:29:33', '2019-11-28 02:21:14', 'Teacher', '74', 'aazom847@gmail.com', 'Tech', 'Junior Instructor', ''),
(1574848728, 'Towfiq Hasan', 'Shamsul Huda', 'Shahida Yesmin', '1997-02-20', 'Married', 'Male', 'Islam', '01746239853', 'Graphics Technology', 'Academic ', 'TISI', '2019-11-27 03:58:48', '2020-03-08 23:14:33', 'Teacher', '76', 'towfiqhasan456@gmail.com', 'Tech', 'Junior Instructor', '201-03284'),
(1574850534, 'Md. Touhidul Islam', 'Md. Mahfuzar Rahman', 'Most. Fatima Khatun', '1992-09-01', 'Married', 'Male', 'Islam', '01718246890', 'Electrical Technology', 'Academic ', 'TISI', '2019-11-27 04:28:54', '2019-12-02 01:13:55', 'Teacher', '77', 'touhid041@gmail.com', 'Tech', 'Junior Instructor', '201-03270'),
(1574851655, 'ANKUR KUMER DEY', 'ANANDA CHADRA DEY', 'RADHA RANI DEY', '1990-12-01', 'Married', 'Male', 'Hindu', '01798648634', 'Mathematics-1(First Semester)', 'Non Tech', 'TISI', '2019-11-27 04:47:35', '2019-11-27 04:47:35', 'Teacher', '79', 'ankurdeybangladesh@gmail.com', 'Non-Tech', 'Instructor', ''),
(1574915235, 'Shawon Horijon', 'Bimol Horjon', 'Shima Rani', '1992-04-08', 'Married', 'Male', 'Hindu', '01718996782', 'Cleaner ', 'Administrative ', 'TISI', '2019-11-27 22:27:15', '2020-03-14 01:23:52', 'Staff', NULL, 'Shawon@gmail.com', '', '', 'WB-C220'),
(1574915637, 'Md. Rezaul Haque', 'Md. Mottur Rahman', 'Mst. Rafiya Begum', '1992-10-01', 'Married', 'Male', 'Islam', '01719408653', 'Business', 'Academic ', 'TISI', '2019-11-27 22:33:57', '2020-03-10 00:15:59', 'Teacher', '80', 'rezaulhaq1992@gmail.com', 'Non-Tech', 'Instructor', '201-02577'),
(1574917694, 'Md.Altab Hossain', 'Md. Ataher Ali ', 'Zahiron Begam', '1991-07-20', 'Married', 'Male', 'Islam', '01721703148', 'Mathematics-1', 'Academic ', 'TISI', '2019-11-27 23:08:14', '2020-03-10 00:07:52', 'Teacher', '81', 'altabnatore1991@gmail.com', 'Non-Tech', 'Instructor', '201-02574'),
(1575533959, 'Mezbah Ahmmed', 'Md. Khairul Alam', 'Akter Banu', '1989-01-01', 'Unmarried', 'Male', 'Islam', '01719929619', 'Store Keeper', 'Administrative ', 'TISI', '2019-12-05 02:19:19', '2020-03-14 01:25:24', 'Staff', NULL, 'mazbah@gmail.com', '', '', 'WB-C219'),
(1583838907, 'Rabbi Hassan', 'Aftab Hossin', 'Mst. Meherun Nesa', '1995-11-30', 'Unmarried', 'Male', 'Islam', '01827431416', 'Civil Technology', 'Academic ', 'TISI', '2020-03-10 05:15:07', '2020-03-10 05:15:07', 'Teacher', '85', 'rabbihassan1000@gmail.com', 'Tech', 'Junior Instructor', '1111111');

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
(1539269726, 'Basudebpur', 'Dinajpur', 'Rangpur', 'Basudebpur', 'Hossain Vila', '2018-10-11 08:55:26', '2018-10-11 08:55:26'),
(1539270198, 'Taluch hat', 'Bogra', 'Rajshai ', 'Boronilahaly', 'None', '2018-10-11 09:03:19', '2018-10-11 09:03:19'),
(1539270355, 'Paikor-5870', 'Bogura', 'Rajshahi', 'Borongashoni', '', '2018-10-11 09:05:55', '2018-10-11 09:05:55'),
(1539270530, 'Madla-5800', 'Bogra', 'Rajshahi', 'Sujabad', '', '2018-10-11 09:08:50', '2018-10-11 09:08:50'),
(1539270700, 'Moshipur 6770', 'Sirajganj', 'Rajshahi', 'Moshirpur', '', '2018-10-11 09:11:40', '2018-10-11 09:11:40'),
(1539271331, 'Bozra', 'Kurigram', 'Rajshahi', 'Modha Bozra', '', '2018-10-11 09:22:11', '2018-10-11 09:22:11'),
(1539271725, 'Bogra', 'Bogra', 'Bogra', 'Bogra', '', '2018-10-11 09:28:45', '2018-10-11 09:28:45'),
(1539273589, 'Charkasimnagor', 'Narsingdi', 'Dhaka', 'Charchayet', '', '2018-10-11 09:59:49', '2018-10-11 09:59:49'),
(1541504305, 'Bogra', 'Bogra', 'Rajshahi', 'Namajgore', 'Rabu Vila', '2018-11-06 05:38:25', '2018-11-06 05:38:25'),
(1544454144, 'Sree Ongon', 'Faridpur', 'Dhaka', 'Shovarampur', 'Titu', '2018-12-10 09:02:24', '2018-12-10 09:02:24'),
(1545568415, 'RDA', 'Bogra', 'Rajshahi', 'Jamalpur, Shajahanpur', '', '2018-12-23 06:33:35', '2018-12-23 06:33:35'),
(1546270743, 'Shekherkola ', 'Bogra', 'Rajshahi', 'Mohisbathan', '', '2018-12-31 09:39:03', '2018-12-31 09:39:03'),
(1574844745, 'Malshira', 'Rajshahi', 'Rajshahi', 'Bhabanipur', 'Bhabanipur', '2019-11-27 02:52:25', '2019-11-27 02:52:25'),
(1574844910, 'Bogra', 'Bogra', 'Bogra', 'Bogra', 'Bogra', '2019-11-27 02:55:10', '2019-11-27 02:55:10'),
(1574845478, 'Parihat', 'Bogra', 'Rajshahi', 'Loxmicola', 'Loxmicola', '2019-11-27 03:04:38', '2019-11-27 03:04:38'),
(1574845697, 'Berer Bari', 'Bogra', 'Rajshahi', 'Berer Bari', 'Berer Bari', '2019-11-27 03:08:17', '2019-11-27 03:08:17'),
(1574845859, 'Dhaka', 'Dhaka', 'Dhaka', 'Mohamamdpur', 'Mohamamdpur', '2019-11-27 03:10:59', '2019-11-27 03:10:59'),
(1574845973, 'Noongola', 'Bogra', 'Rajshahi', 'Noongola', 'Noongola', '2019-11-27 03:12:53', '2019-11-27 03:12:53'),
(1574846217, 'Perirhat', 'Bogra', 'Rajshahi', 'Ramchondpur', 'Ramchondpur', '2019-11-27 03:16:57', '2019-11-27 03:16:57'),
(1574846606, 'Doripara', 'Bogra', 'Rajshahi', 'Howakhai', 'Maznu', '2019-11-27 03:23:26', '2019-11-27 03:23:26'),
(1574846973, 'Shihaly hat', 'Bogra', 'Rajshahi ', 'Bockthota', 'Bockthota', '2019-11-27 03:29:33', '2019-11-28 02:21:14'),
(1574848728, 'Sherpur', 'Bogura', 'Rajshahi', 'Khondokar Para', 'Khondokar Para', '2019-11-27 03:58:48', '2020-03-08 23:14:33'),
(1574850534, 'Bonarpara', 'Gaibandha', 'Rangpur', 'Daldalia', 'Daldalia', '2019-11-27 04:28:54', '2019-11-27 04:28:54'),
(1574851655, 'Bogura', 'Bogura', 'Rajahahi', 'Jalesaritola', 'Localoy Properties', '2019-11-27 04:47:35', '2019-11-27 04:47:35'),
(1574915235, 'Bogra', 'Bogra', 'Bogra', 'Bogra', 'Bogra', '2019-11-27 22:27:15', '2019-11-27 22:27:15'),
(1574915637, 'Nagorhat', 'Bogura', 'Rajshahi', 'Rampur', 'Rampur', '2019-11-27 22:33:57', '2019-11-27 22:33:57'),
(1574917694, 'Bildohor', 'Natore', 'Rajshahi', 'Krishnonagor', '', '2019-11-27 23:08:14', '2019-11-27 23:08:14'),
(1575533959, 'Valurpara', 'Bogura', 'Rajshahi', 'Shicharpara', 'Shicharpara', '2019-12-05 02:19:19', '2019-12-05 02:19:19'),
(1583838907, 'Shihali Hat', 'Bogura', 'Rajshahi', 'Shihali Master Para', 'Khondokar Para', '2020-03-10 05:15:07', '2020-03-10 05:15:07');

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
(1539269726, 'BSc', 'Daffodil International University', '2016', 'CSE', '2018-10-11 08:55:26', '2018-10-11 08:55:26'),
(1539270198, 'MSC', 'NU', '2003', 'CHEMISTRY', '2018-10-11 09:03:19', '2018-10-11 09:03:19'),
(1539270355, 'M.Sc', 'National University', '2008', 'Physics', '2018-10-11 09:05:55', '2018-10-11 09:05:55'),
(1539270530, 'B.Sc Engineering', 'Rajshahi University Of Engineering & Technology', '2017', 'Glass & Ceramic Engineering', '2018-10-11 09:08:50', '2018-10-11 09:08:50'),
(1539270700, 'B.Sc', 'Bangladesh University', '2018', 'CSE', '2018-10-11 09:11:40', '2018-10-11 09:11:40'),
(1539271331, 'Diploma-in-Engineering', 'Graphic Arts Institute', '2016', 'Graphic Design', '2018-10-11 09:22:11', '2018-10-11 09:22:11'),
(1539271725, 'M.Sc', 'America International University-Bangladesh', '2017', 'Computer Science & Engineering', '2018-10-11 09:28:45', '2018-10-11 09:28:45'),
(1539273589, 'Diploma-in-Engineering', 'BTEB', '2017', 'Computer Technology', '2018-10-11 09:59:49', '2018-12-02 09:36:33'),
(1541504305, 'Master\'s', 'National', '2016', 'Sociology', '2018-11-06 05:38:25', '2018-11-06 05:38:25'),
(1544454144, 'M.Phil', 'KUET', '2018', 'Physics', '2018-12-10 09:02:24', '2018-12-10 09:02:24'),
(1545568415, 'BSS', 'National University', '2015', 'Social Science ', '2018-12-23 06:33:35', '2018-12-23 06:33:35'),
(1546270743, 'MBS', 'National University', '2011', 'Management', '2018-12-31 09:39:03', '2018-12-31 09:39:03'),
(1574844745, 'MSS', 'Rajshahi University', '2011', 'Library Management', '2019-11-27 02:52:25', '2019-11-27 02:52:25'),
(1574844910, 'N/A', 'N/A', 'N/A', 'N/A', '2019-11-27 02:55:10', '2019-11-27 02:55:10'),
(1574845478, 'JSC', 'N/A', 'N/A', 'N/A', '2019-11-27 03:04:38', '2019-11-27 03:04:38'),
(1574845697, 'Dhakil', 'Dhaka', '2016', 'Humanitics', '2019-11-27 03:08:17', '2019-11-27 03:08:17'),
(1574845859, 'MBA', 'Private University', '2007', 'Marketing', '2019-11-27 03:10:59', '2019-11-27 03:10:59'),
(1574845973, 'N/A', 'N/A', 'N/A', 'N/A', '2019-11-27 03:12:53', '2019-11-27 03:12:53'),
(1574846217, 'SSC', 'Rajshahi', '1991', 'Humanitics', '2019-11-27 03:16:57', '2019-11-27 03:16:57'),
(1574846606, 'MA', 'NU', '2015', 'Bangla', '2019-11-27 03:23:26', '2019-11-27 03:23:26'),
(1574846973, 'Diploma', 'BTEB', '2015', 'CMT', '2019-11-27 03:29:33', '2019-11-27 03:29:33'),
(1574848728, 'Diploma', 'BTEB', '2018', 'Graphic Design', '2019-11-27 03:58:48', '2020-03-08 23:14:33'),
(1574850534, 'BSc in Engineering', 'Presidency University', '2016', 'EEE', '2019-11-27 04:28:54', '2019-11-27 04:28:54'),
(1574851655, 'MSC', 'NU', '2013', 'MATHEMATICS', '2019-11-27 04:47:35', '2019-11-27 04:47:35'),
(1574915235, 'N/A', 'N/A', 'N/A', 'N/A', '2019-11-27 22:27:15', '2019-11-27 22:27:15'),
(1574915637, 'MBA', 'National University', '2016', 'Accounting', '2019-11-27 22:33:57', '2019-11-27 22:33:57'),
(1574917694, 'M.Sc', 'National University', '2013', 'Mathematics ', '2019-11-27 23:08:14', '2019-11-27 23:08:14'),
(1575533959, 'HSC', 'BTEB', '2007', 'Business', '2019-12-05 02:19:19', '2019-12-05 02:19:19'),
(1583838907, 'BSc', 'Farest International University', '2020', 'Civil Engineering', '2020-03-10 05:15:07', '2020-03-10 05:15:07');

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
  `edition` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `call_no` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `templet_article`
--

INSERT INTO `templet_article` (`templet_id`, `article_name`, `author`, `publisher`, `language`, `edition`, `isbn`, `call_no`, `created_at`, `updated_at`) VALUES
(1575191208, 'Bangla', 'M.M. Nazmul Haque', 'Technical Publication', 'Bangla', '14 th ed.', 'N/A', '420 NAB', '2019-12-01 03:06:48', '2019-12-01 03:06:48'),
(1575191585, 'English', 'Md. Ikbal Hossain', 'Technical Publication', 'English', '6 th ed.', 'N/A', '400', '2019-12-01 03:13:05', '2019-12-01 03:13:05'),
(1575192144, 'Physical Education & Life Skill Development', 'Md. Elias ', 'Technical Publication', 'Bangla', '10 th ed.', 'N/A', '613 ELP', '2019-12-01 03:22:24', '2019-12-01 03:22:24'),
(1575192420, 'Physics-1', 'Md. Ashraf Hossain', 'Technical Publication', 'Bangla', '13 th ed.', 'N/A', '530 PHY', '2019-12-01 03:27:00', '2019-12-01 03:27:00'),
(1575192971, 'Computer Application', 'A F M Mizanur Rahman', 'Technical Publication', 'Bangla', '8th ed.', 'N/A', '005 MIC', '2019-12-01 03:36:11', '2019-12-01 03:36:11'),
(1575194587, 'Electrical Engineering Fundamentals', 'Bhaboshindhu Biswas', 'Technical Publication', 'Bangla', '4th ed.', 'N/A', '621.3 BIE', '2019-12-01 04:03:07', '2019-12-11 23:38:05'),
(1575194873, 'Mathematics-1', 'Md. Delwar Hossen Mia', 'Technical Publication', 'Bangla', '4th ed.', 'N/A', '510', '2019-12-01 04:07:53', '2019-12-01 04:07:53'),
(1575195098, 'Computer Application', 'A F M Mizanur Rahman', 'Technical Publication', 'Bangla', '8th ed.', 'N/A', '005 MIC', '2019-12-01 04:11:38', '2019-12-01 04:11:38'),
(1575195648, 'Social Science', 'A K M Mozzammel Haque', 'Technical Publication', 'Bangla', '8th ed.', 'N/A', '200', '2019-12-01 04:20:48', '2019-12-01 04:20:48'),
(1575195817, 'Chemistry', 'Md. Jobaidur Rahman', 'Technical Publication', 'Bangla', '10 th ed.', 'N/A', '540 CHE', '2019-12-01 04:23:37', '2019-12-01 04:23:37'),
(1575196046, 'Electrical Engineering Fundamentals', 'Bhaboshindhu Biswas', 'Technical Publication', 'Bangla', '4th ed.', 'N/A', '621 BIE', '2019-12-01 04:27:26', '2019-12-01 04:27:26'),
(1575196220, 'Mathematics-1', 'Md. Delwar Hossen Mia', 'Technical Publication', 'Bangla', '4th ed.', 'N/A', '510 MIM', '2019-12-01 04:30:20', '2019-12-01 04:30:20'),
(1575197489, 'Computer Lab Practice', 'Saima Akter', 'Haque Publications', 'Bangla', '1st ed.', 'N/A', '005.1 COM', '2019-12-01 04:51:29', '2019-12-01 04:51:29'),
(1575197794, 'Physical Education & Life Skill Development', 'Md. Elias', 'Technical Publication', 'Bangla', '10th ed.', 'N/A', '613 ELP', '2019-12-01 04:56:34', '2019-12-01 04:56:34'),
(1575429735, 'Graphics Design-1', 'Md. Shahabuddin Sowkot', 'Technical Publication', 'Bangla', '9th ed.', 'N/A', ' 604.2 SOG', '2019-12-03 21:22:15', '2019-12-03 21:22:15'),
(1575430008, 'English', 'Md. Ikbal Hossain', 'Technical Publication', 'English', '6 th ed.', 'N/A', '400', '2019-12-03 21:26:48', '2019-12-03 21:26:48'),
(1575430599, 'অসমাপ্ত আত্নজীবনী', 'শেখ মুজিবুর রহমান', 'ইউনিভার্সিটি প্রেস', 'বাংলা', 'প্রথম প্রকাশ', '9789845061957', '954 মুজিঅ', '2019-12-03 21:36:39', '2019-12-03 21:36:39'),
(1575431907, 'Analog Electronics', 'Md. Ziaul Karim Zia', 'Technical Publication', 'Bangla', '8th ed.', 'N/A', '621.381 ZIA', '2019-12-03 21:58:27', '2019-12-03 21:58:27'),
(1575432230, 'Database Application', 'Rumana Khatun', 'Technical Publication', 'Bangla', '3rd ed. 2018', 'N/A', '005.1 RUD', '2019-12-03 22:03:50', '2019-12-03 22:07:06'),
(1575432728, 'Mathematics-2', 'Md. Delwar Hossen Mia', 'Technical Publication', 'Bangla', '15th ed. (2018)', 'N/A', '510 MIM', '2019-12-03 22:12:08', '2019-12-03 22:12:08'),
(1575443928, 'Mathematics-2 (Solution)', 'Md. Delwar Hossen Mia', 'Technical Publication', 'Bangla', '6 th ed.', 'N/A', '510 MIM', '2019-12-04 01:18:48', '2019-12-04 01:18:48'),
(1575444128, 'Physics-1', 'Md. Ashraf Hossain', 'Technical Publication', 'Bangla', '13 th ed.', 'N/A', '530 PHY', '2019-12-04 01:22:08', '2019-12-04 01:22:08'),
(1575444542, 'Bangla', 'M.M. Nazmul Haque', 'Technical Publication', 'Bangla', '14 th ed.', 'N/A', '400', '2019-12-04 01:29:02', '2019-12-04 01:29:02'),
(1575444971, 'Lithographic Printing-1', 'Md. Abul Mannan', 'BTEB', 'Bangla', '1st ed.', 'N/A', '686.2 MAL', '2019-12-04 01:36:11', '2019-12-04 01:36:11'),
(1575445361, 'Lithographic Printing-2', 'Md. Golam Mostafa', 'BTEB', 'Bangla', '1st ed.', 'N/A', '686.2 MOL', '2019-12-04 01:42:41', '2019-12-04 01:42:41'),
(1575445731, 'Screen Printing 1-2', 'Md. Shaif Shahariar  Jahedi', 'BTEB', 'Bangla', '1st ed.', 'N/A', '764.8 JAH', '2019-12-04 01:48:51', '2019-12-04 01:48:51'),
(1575448559, 'Communicative English', 'Md. Babul Hossain', 'Haque Publications', 'English', '4th ed.', 'N/A', '420 BAC ', '2019-12-04 02:35:59', '2019-12-04 02:35:59'),
(1575453510, 'Social Science', 'A K M Mozzammel Haque', 'Technical Publication', 'Bangla', '8th ed.', 'N/A', '300  HAS', '2019-12-04 03:58:30', '2019-12-04 03:58:30'),
(1575454291, 'Graphic Design-2', 'Hena Akter', 'Technical Publication', 'Bangla', '9th ed.', 'N/A', '604.2 AKG', '2019-12-04 04:11:31', '2019-12-04 04:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `unathorized_api`
--

CREATE TABLE `unathorized_api` (
  `id` int(11) NOT NULL,
  `unathorized_ip` varchar(191) NOT NULL,
  `information` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unathorized_api`
--

INSERT INTO `unathorized_api` (`id`, `unathorized_ip`, `information`, `created_at`, `updated_at`) VALUES
(6, '45.251.231.6', '{\"TZ\":\"Asia\\/Dhaka\",\"REDIRECT_REDIRECT_UNIQUE_ID\":\"XAs3hgn@FtgGeMTpIetS7AAAAAs\",\"REDIRECT_REDIRECT_SCRIPT_URL\":\"\\/library_data\\/y3vW6tVpVwJJ396jJ4\\/5911d00c64b30daaa92f40a85486ffb7\\/$2y$10$NN', '2018-12-07 21:16:22', '2018-12-07 21:16:22'),
(7, '116.68.200.201', '{\"TZ\":\"Asia\\/Dhaka\",\"REDIRECT_REDIRECT_UNIQUE_ID\":\"XIvI2IXhXqwkjoIvSrPPcwAAABM\",\"REDIRECT_REDIRECT_SCRIPT_URL\":\"\\/student_data\\/y3vW6tVpVwJJ396jJ4\\/5911d00c64b30daaa92f40a85486ffb\\/$2y$10$NNV', '2019-03-15 09:46:32', '2019-03-15 09:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zoom_user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `zoom_user_id`, `status`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(47, 'Md Imran Ali', 'mdimranali246@gmail.com', '$2y$10$/Sf5TfAlsAN9lTcewVYERuPWGlmUgWR0ny6inI9enVNnCSXuffiQW', NULL, 'Active', 'ft6KvMVVa02aee1iGKEv058FSy6vWxs4BZ24tOTI1kDKGIdr3rYpU3pId0F8', '2018-10-10 06:49:31', '2019-12-27 23:22:47', 'Software User'),
(48, 'Md Jubayer Hossain', 'tisiict@gmail.com', '$2y$10$hZRkINIaYT29ezo6uiVqZ.QirjRoMplieRoJDQq3T6b0l6jS7JzCW', 'ZG7KqGiqTmai_ZVlmqUjkw', 'Active', 'TSawBhiLBkUaf8p4awBcjFkHmgD5CgxA0fOM2e8TvNYsoNL8iFJ7bXn84TXX', '2018-10-11 06:49:14', '2020-04-08 09:58:35', 'Software User'),
(49, 'Jakiya Jafrin', 'jakjafrin28@gmail.com', '$2y$10$R0f7JNsqJegsSeoIowVgdeiqNR0abEizbu2uERJOZviwYkJ3GT266', NULL, 'Active', 'ASp32HzI7IoNz2uwiiZrAxoju02XxXEWrOFy9HFdEdojh2G1bVRUxjZDNLAO', '2018-10-11 08:38:02', '2019-12-04 04:09:04', 'Software User'),
(50, 'Md Abu Raihan', 'raihantmss@gmail.com', '$2y$10$iqmS.qvIVdw2ngTw85SuoeRoiA1iuORF4HsHo3c2m11URvyjaFV1K', NULL, 'Active', 'kzlsMxHFQ5wo70fwSmtZ3Ipurg00bPPO6yfIZXwnSg4w2vDZYRuyn1Wjhmju', '2018-10-11 08:47:38', '2020-03-15 14:14:19', 'Software User'),
(51, 'Md. Imran Ali', 'mindcreative264@gmail.com', '$2y$10$cFTdD/8VX1inj/FwwkMMd.Z5y2OBU4O7N.6A.j5cprfVbw6CcgfCa', NULL, 'Active', 'CTQNAsMuCDNtsexyOKKll1DCj9UggcjwmWXT73wwn5RmpYFBA5RoIasrv50a', '2018-10-11 08:52:16', '2018-10-24 07:27:37', 'Software User'),
(52, 'Md. Jubayer Hossain', 'jubayer.inf1@gmail.com', '$2y$10$US0BqRScCDb4gNT5RJtUYuHn5S9cFIE8gE2RI/hi6K0.8UZb2QhGq', NULL, 'Active', NULL, '2018-10-11 08:55:26', '2018-10-11 08:55:26', 'Software User'),
(53, 'A.T.M Tazmilur Rahman', 'tazmilurtmss@gmail.com', '$2y$10$/Sf5TfAlsAN9lTcewVYERuPWGlmUgWR0ny6inI9enVNnCSXuffiQW', NULL, 'Active', 'PE2hHWt2i3yP7hBHGH3djxuLofVVwICvZvcWyBAjMf6FtoPuwbNzLP5C9Wer', '2018-10-11 09:03:19', '2020-03-23 07:01:25', 'Software User'),
(54, 'Md. Muraduzzaman', 'muraduzzamanmrd@gmail.com', '$2y$10$DGA3n5Ami7hRbkR5KN52rewwD0n0xv9SMX2Swxt2v1PuiIW5egGB6', NULL, 'Active', 'R9hPTbZi1x9ykKJYoI3kW1P17LAyg670SwqvZUkt6OpdMdBjed1orTysQqxS', '2018-10-11 09:05:55', '2019-12-04 04:38:37', 'Software User'),
(55, 'Jakiya Jafrin', 'jakiya.tisi@gmail.com', '$2y$10$I/K6AmmAZvmAC/CDlu5a3O80rZFzf2zjEmDx04NmZuGUgfbBsYmyO', NULL, 'Active', NULL, '2018-10-11 09:08:50', '2018-10-11 09:08:50', 'Software User'),
(56, 'Md. Shariful Islam', 'Sharifbdd@gmail.com', '$2y$10$QJtrVXhBeNYOhmFbOmZqmOkigyw5a9LtAC/pqAePkxKxmmwvuVizm', NULL, 'Active', '1f9mgEJO1SYYLEd52j0poiVRk03kaJ6zceFKeH660j0GfxoqR1rPVAjq1kuQ', '2018-10-11 09:11:40', '2020-02-01 00:22:49', 'Software User'),
(57, 'Rabya Khathun', 'rabyarabu112@gmail.com', '$2y$10$Uv99vPt6EZZzGzLxkTYa.OWT8tRsfZBJtxarD56ktwI09i/4i/YMe', NULL, 'Active', NULL, '2018-10-11 09:17:24', '2018-10-11 09:17:24', 'Software User'),
(58, 'Md. Arif Ahmed', 'arif.dtp@gmail.com', '$2y$10$2FpubmD/MwYMVU0YfbjepemW3LaQx0skbuVwD.5KXlnAsWJPilr6u', NULL, 'Active', NULL, '2018-10-11 09:22:11', '2018-10-11 09:22:11', 'Software User'),
(59, 'Shaima Hanif', 'shaimashuchi@gmail.com', '$2y$10$X..ZFk5/BgbsNzRGV/BdaOqT34kffTIrnSV6pbQwBwbzhnSytJjDu', NULL, 'Active', '4eDF1CoEPOudq2IdexuyMjSMXg1Wenal1m5zx5YT0KWNkygQvEFUu3Fa3UiM', '2018-10-11 09:28:45', '2019-12-04 04:08:57', 'Software User'),
(60, 'Md. Masud Rana', 'masudrana.bbpi@gmail.com', '$2y$10$hc7WATx/7BYFtT/NaCfNWeYkuMxL4EbQV8oR15fMw4LMmzNKIiWrC', NULL, 'Active', 'i7qGYsB8aKNX2SLHcHAGJYBJ8OCHmPaY3DCQGsOP6gcbyOjeYSeHPdNJBH4p', '2018-10-11 09:59:49', '2020-03-14 04:42:52', 'Software User'),
(63, 'Supriya Islam', 'supriyaislam01@gmail.com', '$2y$10$PdEPFAa3NaW3lIQI3lPmuutAu.Ge0dM/kV8brctvWg4AcTPth0Qeu', NULL, 'Active', 'TZG4W3tAi9YSdjuC0B2tn2rfQ1TwAdnScX38hYshZNYEnUX4K7RCZ6ZdV9ee', '2018-10-24 07:33:02', '2018-12-03 10:43:24', 'Software User'),
(64, 'Rabya Khathun', 'rabyarabu@gmail.com', '$2y$10$iqCA.zcgLjsSGS584exoXePBuOqX1GbhDxjwhMDf62chWkgoln8Vi', NULL, 'Active', 'EYl13diitpsSLm0BFZkUJYhxRy87tiaBwSBi5xMQGmvcrG2n65VW8r3p2jer', '2018-11-06 05:38:25', '2018-11-06 05:39:31', 'Software User'),
(65, 'api@api.com', 'api@api.com', '$2y$10$NNVDuGWyecpaQMYEbaK6y.UaBGJk4JP9FBrMBLL5xXkGIEdAiE7KC', NULL, 'Active', 'rAqiibpYD9WgXd39pLI8aETqDfb5Vj031ccKskri', '2018-12-07 21:10:59', '2018-12-07 21:10:59', 'Software User'),
(66, 'Subroto Subon Acharjee', 'subrotoa@gmail.com', '$2y$10$Lge53E.xJuYuuqZUJA//ROcYFkeJVKr1QoN44gF6XKRnsRVXV.J2u', NULL, 'Active', 'Udo8NtYTcnEXgXdenraKSA6egT56EcsYndoI9eeAVbaO4KofcrvKmruYY2eU', '2018-12-10 09:02:24', '2018-12-10 09:05:08', 'Software User'),
(67, 'Md Delower Hossain', 'delower.m@gmail.com', '$2y$10$RfV6jvssbj3KkABIKwdkeeImITPal9C9jehrJ0v18Wu1wiCJESOTS', NULL, 'Active', 'Ukhg10B1aNYcDSBx2FABaNfxRSos3T1dA6xvR4ds', '2018-12-31 09:27:46', '2018-12-31 09:27:46', 'Software User'),
(68, 'Abu Sayed', 'sayedsafollo@gmail.com', '$2y$10$TwiLIw9koaM0LPghNvc0O.2tTO6RLOzU8z9WM5tFHT.K8OCzOCQdC', NULL, 'Active', 'RkxE26RsIxL9Nbh0NwbVHz3fKXGTU2wtNdF8vgjX2oTUe1SqiRuzlsDrQQvm', '2018-12-31 09:40:07', '2018-12-31 09:43:58', 'Software User'),
(69, 'Rejuana', 'suchi.sahed68@gmail.com', '$2y$10$VUJAqB09kolUoNcLn/6ygeDRPw3JM1TdIcT9J1enu2AnSA9NPYg8e', NULL, 'Deactive', 'Ukhg10B1aNYcDSBx2FABaNfxRSos3T1dA6xvR4ds', '2018-12-31 10:11:45', '2019-10-05 21:54:07', 'Software User'),
(70, 'Shakil Ahmmed', 'shakil@codebool.com', '$2y$10$8IaOV0lRHoz4lFJIUVODOuTXjXLBF7jiF92lyOcUyNC2T2V8uH2aa', NULL, 'Active', NULL, '2019-02-14 13:09:47', '2019-02-14 13:09:47', 'Software User'),
(71, 'Engr Zakia Sultana', 'zakia-zarin@hotmail.com', '$2y$10$yhV.4sDqL/.uh94ekhr1s.P8U381eSmI.VQp1j4ikf.InVgg76DMW', NULL, 'Active', NULL, '2019-11-27 03:20:00', '2019-11-27 03:20:00', 'Software User'),
(72, 'Md Maznu Miah', 'mahmudh5y@gmail.com', '$2y$10$vSx6nyk4ulN5aY7PTJbBNegcEixOHoTuWHePh98wHiZPrfHKoIVlS', NULL, 'Active', NULL, '2019-11-27 03:23:26', '2019-11-27 03:23:26', 'Software User'),
(73, 'Ali Azom', 'aazom847@gmail.com', '$2y$10$KZoP9K9NayZwl59GoeRPluvR9Cum7fbMVT1VT4.3Gm/PRrf9ZM.kW', NULL, 'Active', NULL, '2019-11-27 03:29:33', '2019-11-27 03:29:33', 'Software User'),
(75, 'towfiq hasan', 'towfiqhasan456@gmail.com', '$2y$10$JZra80U6zo7pMywJFmez6u4mUZ8mB7WW3lc.mppZjJYY6LxEQdQn2', NULL, 'Active', 'HqaQq6p0kYsbvuUz6bIxoM57EVQSV2rto1HmC0kEjrafmT5Ks0inNWwjvwlg', '2019-11-27 03:58:48', '2019-12-08 04:29:08', 'Software User'),
(76, 'Md. Touhidul Islam', 'touhid041@gmail.com', '$2y$10$eMiuMWnIIOh3MD5HHtIe5OXtA9mvaSI4g1tDgbZ3Uh04ZOgVXO5SS', NULL, 'Active', 'SYtUbsdAfnNsXPtXYz1GIBTq41zM9cILqFhRGbBxdEyB2KUxVn8dCXYkEiYg', '2019-11-27 04:28:54', '2020-03-14 02:18:43', 'Software User'),
(77, 'Mizanur Rahman', 'mr01711575209@gmail.com', '$2y$10$NKsUXABWsCAtLclUemK4DuH.P/vnwT.PyrEw5wac1W4tncceFjiqq', NULL, 'Active', 'UFrgwcsVhiD03iaONBw52nezXe1up0BiIm0WNn1hd7u4CaiGAtj0owWevqgM', '2019-11-27 04:37:59', '2019-11-30 03:17:46', 'Software User'),
(78, 'ANKUR KUMER DEY', 'ankurdeybangladesh@gmail.com', '$2y$10$QpzQN25NgssTZsfLp6vmsu/8obTqGze72rZ6pEar.lKD1Ev95bxi6', NULL, 'Active', '4STjdfRxCV8MGDyREG80NoDwyKSK5LKNAxWbtET28myhXYNboEt19kODxUq6', '2019-11-27 04:47:35', '2019-12-08 04:48:45', 'Software User'),
(79, 'Md. Rezaul Haque', 'rezaulhaq1992@gmail.com', '$2y$10$v4FDnSHN6LO3zmSNOMLatevapn5GDxg5nqz5azeNh8458BMTKxv9K', NULL, 'Active', NULL, '2019-11-27 22:33:57', '2019-11-27 22:33:57', 'Software User'),
(80, 'Md.Altab Hossain', 'altabnatore1991@gmail.com', '$2y$10$0QRT8.8Nk76we6fsebIza.H.DMf1ADTSVTh6wg9wTFMYv1a2Th6Ca', NULL, 'Active', 'E5IxwFQULtiC0va9TYVlTIU99wABlTLnMqZ0caNPHkjPfYCevTpAJfkCEZtj', '2019-11-27 23:08:14', '2020-03-14 03:23:43', 'Software User'),
(81, 'MD. A. Jabbar', 'Jabbar2910@gmail.com', '$2y$10$iaYjVW71HzyZUQZ.b5h./.UPcf4gSZc5paMTGh/yJKVuUByM9xfay', NULL, 'Active', 'KDHooF2qn9XwB1VQYe4uzkOPEce0qq0y3rliM8zHiGrCrVYw9NTWGc8jRiP3', '2019-11-29 23:49:25', '2020-01-20 02:12:09', 'Software User'),
(82, 'Shakil Ahmmed', 'shakilfci461@gmail.com', '$2y$10$Ma5YqiPznC4UypTp.BEVqePrsWLTrdqkByxGwB91KvDL4BcqTRBvK', NULL, 'Active', 'G2lqusE3asOsZlZbYTcub53VBn4X03qUbtH6wTVDr5t3LLD4exoNut4t44Xe', '2019-12-07 21:42:24', '2019-12-23 11:14:06', 'Software User'),
(83, 'admin', 'admin@tmss.com', '$2y$10$pJKX6pbtG1NXBbMg29DuzO/R6B2UvOJYVjDO1zkXBXa4vgkg0PzB6', NULL, 'Active', 'WYASdiBUMSdz43sKCacgvWPBiF8ea72LqP6w2mdD8Uet1sh6HNpkIsFT5eAo', '2018-10-11 08:47:38', '2020-01-19 08:40:47', 'Software User'),
(84, 'Rabbi Hassan', 'rabbihassan1000@gmail.com', '$2y$10$GxalgTd0ePrcaKKgEb0TEulrnwHzw/emXaLex6wVaoVKoZsXeLdA2', NULL, 'Active', NULL, '2020-03-10 05:15:07', '2020-03-10 05:15:07', 'Software User');

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
-- Indexes for table `applicant_student_educational_q`
--
ALTER TABLE `applicant_student_educational_q`
  ADD PRIMARY KEY (`eqalification_id`);

--
-- Indexes for table `applicant_student_hem_info`
--
ALTER TABLE `applicant_student_hem_info`
  ADD PRIMARY KEY (`applicant_student_hem_info_id`);

--
-- Indexes for table `applicant_student_office_copy`
--
ALTER TABLE `applicant_student_office_copy`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `class_files`
--
ALTER TABLE `class_files`
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
-- Indexes for table `live_class`
--
ALTER TABLE `live_class`
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
-- Indexes for table `manage_mark_component`
--
ALTER TABLE `manage_mark_component`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mark_component_details`
--
ALTER TABLE `mark_component_details`
  ADD PRIMARY KEY (`mark_component_id`);

--
-- Indexes for table `mark_general_details`
--
ALTER TABLE `mark_general_details`
  ADD PRIMARY KEY (`general_details_id`);

--
-- Indexes for table `mark_student_details`
--
ALTER TABLE `mark_student_details`
  ADD PRIMARY KEY (`student_details_id`);

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
-- Indexes for table `report_settings`
--
ALTER TABLE `report_settings`
  ADD PRIMARY KEY (`report_settings_id`);

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
-- Indexes for table `student_educational_qualification`
--
ALTER TABLE `student_educational_qualification`
  ADD PRIMARY KEY (`eqalification_id`);

--
-- Indexes for table `student_hem_info`
--
ALTER TABLE `student_hem_info`
  ADD PRIMARY KEY (`student_hem_info_id`);

--
-- Indexes for table `student_office_copy`
--
ALTER TABLE `student_office_copy`
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
-- Indexes for table `unathorized_api`
--
ALTER TABLE `unathorized_api`
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
-- AUTO_INCREMENT for table `applicant_student_educational_q`
--
ALTER TABLE `applicant_student_educational_q`
  MODIFY `eqalification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `applicant_student_hem_info`
--
ALTER TABLE `applicant_student_hem_info`
  MODIFY `applicant_student_hem_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applicant_student_office_copy`
--
ALTER TABLE `applicant_student_office_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `apprisal_goals`
--
ALTER TABLE `apprisal_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `apprisal_templete_child`
--
ALTER TABLE `apprisal_templete_child`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `article_info`
--
ALTER TABLE `article_info`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1508861941;

--
-- AUTO_INCREMENT for table `assign_canteen`
--
ALTER TABLE `assign_canteen`
  MODIFY `assign_canteen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1543021097;

--
-- AUTO_INCREMENT for table `canteen_component`
--
ALTER TABLE `canteen_component`
  MODIFY `canteen_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1540149100;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `class_files`
--
ALTER TABLE `class_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1574849149;

--
-- AUTO_INCREMENT for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_grade_list`
--
ALTER TABLE `exam_grade_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `exam_list`
--
ALTER TABLE `exam_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice_child`
--
ALTER TABLE `invoice_child`
  MODIFY `invoice_child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `invoice_component`
--
ALTER TABLE `invoice_component`
  MODIFY `invoice_component_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1585629836;

--
-- AUTO_INCREMENT for table `invoice_templete`
--
ALTER TABLE `invoice_templete`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `live_class`
--
ALTER TABLE `live_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `manage_class`
--
ALTER TABLE `manage_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `manage_department`
--
ALTER TABLE `manage_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `manage_mark`
--
ALTER TABLE `manage_mark`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_mark_component`
--
ALTER TABLE `manage_mark_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `manage_section`
--
ALTER TABLE `manage_section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `manage_subject`
--
ALTER TABLE `manage_subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1583907529;

--
-- AUTO_INCREMENT for table `mark_component_details`
--
ALTER TABLE `mark_component_details`
  MODIFY `mark_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `mark_general_details`
--
ALTER TABLE `mark_general_details`
  MODIFY `general_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1584773353;

--
-- AUTO_INCREMENT for table `mark_student_details`
--
ALTER TABLE `mark_student_details`
  MODIFY `student_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `ov_setup`
--
ALTER TABLE `ov_setup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  MODIFY `payment_receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1585725088;

--
-- AUTO_INCREMENT for table `payment_receipt_child`
--
ALTER TABLE `payment_receipt_child`
  MODIFY `payment_receipt_child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report_settings`
--
ALTER TABLE `report_settings`
  MODIFY `report_settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `roster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `students_child`
--
ALTER TABLE `students_child`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `student_educational_qualification`
--
ALTER TABLE `student_educational_qualification`
  MODIFY `eqalification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `student_hem_info`
--
ALTER TABLE `student_hem_info`
  MODIFY `student_hem_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_office_copy`
--
ALTER TABLE `student_office_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `subject_component`
--
ALTER TABLE `subject_component`
  MODIFY `subject_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1539274606;

--
-- AUTO_INCREMENT for table `subsidiary_cal`
--
ALTER TABLE `subsidiary_cal`
  MODIFY `trancation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `subsidiary_configuration`
--
ALTER TABLE `subsidiary_configuration`
  MODIFY `configuration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unathorized_api`
--
ALTER TABLE `unathorized_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
