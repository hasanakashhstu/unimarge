-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2020 at 02:02 PM
-- Server version: 5.6.47
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tisibogr_new_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `website_management`
--

CREATE TABLE `website_management` (
  `website_management_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_management`
--

INSERT INTO `website_management` (`name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(' Mrs. Nigar Sultana', 'Director of ICT', 'img/1585561177.jpg', '2020-03-30 09:39:37', '2020-03-30 09:39:37'),
('M Khairul Islam', 'Consultant of TMSS ICT', 'img/1585561119.jpg', '2020-03-30 09:38:39', '2020-03-30 09:38:39'),
('Subroto Subon Acharjee', 'Principal of TISI', 'img/1586590409.jpg', '2020-04-11 07:33:29', '2020-04-11 07:33:29');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `website_management`
--
ALTER TABLE `website_management`
  ADD PRIMARY KEY (`website_management_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `website_management`
--
ALTER TABLE `website_management`
  MODIFY `website_management_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
