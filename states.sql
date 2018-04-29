-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 04:16 PM
-- Server version: 5.6.16-1~exp1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `license_checker`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'AL', 'Alabama', NULL, NULL),
(2, 1, 'AK', 'Alaska', NULL, NULL),
(3, 1, 'AZ', 'Arizona', NULL, NULL),
(4, 1, 'AR', 'Arkansas', NULL, NULL),
(5, 1, 'CA', 'California', NULL, NULL),
(6, 1, 'CO', 'Colorado', NULL, NULL),
(7, 1, 'CT', 'Connecticut', NULL, NULL),
(8, 1, 'DE', 'Delaware', NULL, NULL),
(9, 1, 'DC', 'District of Columbia', NULL, NULL),
(10, 1, 'FL', 'Florida', NULL, NULL),
(11, 1, 'GA', 'Georgia', NULL, NULL),
(12, 1, 'HI', 'Hawaii', NULL, NULL),
(13, 1, 'ID', 'Idaho', NULL, NULL),
(14, 1, 'IL', 'Illinois', NULL, NULL),
(15, 1, 'IN', 'Indiana', NULL, NULL),
(16, 1, 'IA', 'Iowa', NULL, NULL),
(17, 1, 'KS', 'Kansas', NULL, NULL),
(18, 1, 'KY', 'Kentucky', NULL, NULL),
(19, 1, 'LA', 'Louisiana', NULL, NULL),
(20, 1, 'ME', 'Maine', NULL, NULL),
(21, 1, 'MD', 'Maryland', NULL, NULL),
(22, 1, 'MA', 'Massachusetts', NULL, NULL),
(23, 1, 'MI', 'Michigan', NULL, NULL),
(24, 1, 'MN', 'Minnesota', NULL, NULL),
(25, 1, 'MS', 'Mississippi', NULL, NULL),
(26, 1, 'MO', 'Missouri', NULL, NULL),
(27, 1, 'MT', 'Montana', NULL, NULL),
(28, 1, 'NE', 'Nebraska', NULL, NULL),
(29, 1, 'NV', 'Nevada', NULL, NULL),
(30, 1, 'NH', 'New Hampshire', NULL, NULL),
(31, 1, 'NJ', 'New Jersey', NULL, NULL),
(32, 1, 'NM', 'New Mexico', NULL, NULL),
(33, 1, 'NY', 'New York', NULL, NULL),
(34, 1, 'NC', 'North Carolina', NULL, NULL),
(35, 1, 'ND', 'North Dakota', NULL, NULL),
(36, 1, 'OH', 'Ohio', NULL, NULL),
(37, 1, 'OK', 'Oklahoma', NULL, NULL),
(38, 1, 'OR', 'Oregon', NULL, NULL),
(39, 1, 'PA', 'Pennsylvania', NULL, NULL),
(40, 1, 'PR', 'Puerto Rico', NULL, NULL),
(41, 1, 'RI', 'Rhode Island', NULL, NULL),
(42, 1, 'SC', 'South Carolina', NULL, NULL),
(43, 1, 'SD', 'South Dakota', NULL, NULL),
(44, 1, 'TN', 'Tennessee', NULL, NULL),
(45, 1, 'TX', 'Texas', NULL, NULL),
(46, 1, 'UT', 'Utah', NULL, NULL),
(47, 1, 'VT', 'Vermont', NULL, NULL),
(48, 1, 'VA', 'Virginia', NULL, NULL),
(49, 1, 'WA', 'Washington', NULL, NULL),
(50, 1, 'WV', 'West Virginia', NULL, NULL),
(51, 1, 'WI', 'Wisconsin', NULL, NULL),
(52, 1, 'WY', 'Wyoming', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
