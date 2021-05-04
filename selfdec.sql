-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2021 at 05:28 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selfdec`
--

-- --------------------------------------------------------

--
-- Table structure for table `declarationdata`
--

CREATE TABLE `declarationdata` (
  `userId` int(96) NOT NULL,
  `decid` varchar(99) NOT NULL,
  `casereport` varchar(999) NOT NULL,
  `casedetail` varchar(99) DEFAULT NULL,
  `datereport` datetime(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `declarationdata`
--

INSERT INTO `declarationdata` (`userId`, `decid`, `casereport`, `casedetail`, `datereport`) VALUES
(7, '812652023608f9ba943c95', 'Yes', 'Ada la sikit heheh', '2021-05-03 14:43:53.2776'),
(9, '515990385608f9bb5c6fa5', 'Yes', 'Boleh la tu', '2021-05-03 14:44:05.8150'),
(10, '237686838608f9bc16074d', 'No', '', '2021-05-03 14:44:17.3951'),
(8, '1205758372608f9bd55017e', 'No', '', '2021-05-03 14:44:37.3280'),
(7, '459682808608fb032ccad4', 'Yes', 'Ada lah sikit kan', '2021-05-03 16:11:30.8383'),
(7, '1242450893608fb03904721', 'Yes', 'Ada lah sikit kan', '2021-05-03 16:11:37.0182'),
(7, '19199664316090b85381ca6', 'No', '', '2021-05-04 10:58:27.5316'),
(7, '405580766090b85b166e7', 'No', '', '2021-05-04 10:58:35.0919'),
(7, '20555947216090ba5e249da', 'Yes', 'dadsa', '2021-05-04 11:07:10.1500'),
(7, '19255581016090bb5ddb822', 'Yes', 'dadsa', '2021-05-04 11:11:25.8991'),
(8, '14196679216090be158c249', 'No', '', '2021-05-04 11:23:01.5740');

-- --------------------------------------------------------

--
-- Table structure for table `positivedata`
--

CREATE TABLE `positivedata` (
  `userId` int(99) NOT NULL,
  `decid` varchar(999) NOT NULL,
  `casedetail` varchar(999) NOT NULL,
  `datepositive` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positivedata`
--

INSERT INTO `positivedata` (`userId`, `decid`, `casedetail`, `datepositive`) VALUES
(7, '812652023608f9ba943c95', 'Ada la sikit heheh', '2021-05-03 14:43:53.278276'),
(9, '515990385608f9bb5c6fa5', 'Boleh la tu', '2021-05-03 14:44:05.815611'),
(7, '459682808608fb032ccad4', 'Ada lah sikit kan', '2021-05-03 16:11:30.839158'),
(7, '1242450893608fb03904721', 'Ada lah sikit kan', '2021-05-03 16:11:37.018712'),
(7, '20555947216090ba5e249da', 'dadsa', '2021-05-04 11:07:10.150395'),
(7, '19255581016090bb5ddb822', 'dadsa', '2021-05-04 11:11:25.899589');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(99) NOT NULL,
  `email` varchar(999) NOT NULL,
  `password` varchar(999) NOT NULL,
  `staffId` varchar(999) NOT NULL,
  `fullName` varchar(999) NOT NULL,
  `dept` varchar(999) NOT NULL,
  `role` int(99) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `staffId`, `fullName`, `dept`, `role`) VALUES
(7, 'vicevirus@gmail.com', '$2y$10$gJlor7lxh29v1SfGLUb2UeRAiYK9/Krh.1r8M4gs5jVNG5J6ib92.', '8383838', 'Muhammad Firdaus', 'Engineering', 1),
(8, 'jamal@gmail.com', '$2y$10$67falUoCQ8M88e5mkptVqOi8sLDsTeMUx1JNdJPfLE8c9Z/PJJ1Zi', '83838383131', 'Muhammad Shariff', 'HRA', 0),
(9, 'majo@gmail.com', '$2y$10$gie.g2Hr.clGO1U5VwZvQOltOOLmvktgTB7.Z8TAR4A4txaZldnSq', '833193913', 'Majdul', 'QSHE', 0),
(10, 'maoieoeo@gmail.com', '$2y$10$7JjqE4rDpmOsGUIHYmuM4ehQgQ1sEX/xViyeIMH0o2xbLeLKOWskG', '312312312', 'Majoeoeo', 'HRA', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `declarationdata`
--
ALTER TABLE `declarationdata`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `positivedata`
--
ALTER TABLE `positivedata`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
