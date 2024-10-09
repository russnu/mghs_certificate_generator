-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 04:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certificate-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern_certificates`
--

CREATE TABLE `intern_certificates` (
  `certificate_id` varchar(255) NOT NULL,
  `intern_first_name` varchar(100) NOT NULL,
  `intern_middle_name` varchar(100) DEFAULT NULL,
  `intern_last_name` varchar(100) NOT NULL,
  `intern_school` varchar(255) NOT NULL,
  `intern_department` varchar(100) NOT NULL,
  `intern_position` varchar(100) NOT NULL,
  `internship_period_start` date NOT NULL,
  `internship_period_end` date NOT NULL,
  `hours_rendered` int(11) NOT NULL,
  `certificate_type` enum('completion','partial') NOT NULL,
  `issuance_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `intern_certificates`
--

TRUNCATE TABLE `intern_certificates`;
--
-- Dumping data for table `intern_certificates`
--
-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(255) DEFAULT NULL,
  `setting_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `settings`
--

TRUNCATE TABLE `settings`;
--
-- Dumping data for table `settings`
--

INSERT IGNORE INTO `settings` (`id`, `setting_name`, `setting_value`) VALUES
(1, 'logo', 'uploads/logo2.png'),
(2, 'company_name', 'Dunder Mifflin'),
(3, 'signatory_name1', 'David Wallace'),
(4, 'signatory_name2', 'Michael Scott'),
(5, 'signatory_title1', 'COO'),
(6, 'signatory_title2', 'Regional Manager'),
(7, 'signature1', 'uploads/logo2.png'),
(8, 'signature2', 'uploads/AdobeStock_524870155_Preview.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intern_certificates`
--
ALTER TABLE `intern_certificates`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_name` (`setting_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
