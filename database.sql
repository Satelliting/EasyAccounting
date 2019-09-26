-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 01:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs_categories`
--

CREATE TABLE `logs_categories` (
  `categoryID` bigint(20) NOT NULL,
  `categoryName` varchar(25) NOT NULL,
  `categoryDescription` text NOT NULL,
  `categoryCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs_events`
--

CREATE TABLE `logs_events` (
  `logID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `logCategoryID` int(11) NOT NULL,
  `logBeforeInfo` text NOT NULL,
  `logAfterInfo` text NOT NULL,
  `logCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs_users`
--

CREATE TABLE `logs_users` (
  `logID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `logInfo` text NOT NULL,
  `logCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_users`
--

INSERT INTO `logs_users` (`logID`, `userID`, `logInfo`, `logCreationDate`) VALUES
(1, 1000001, 'User logged in.', '2019-09-19 21:48:31'),
(2, 1000001, 'User logged out.', '2019-09-19 21:50:15'),
(3, 1000003, 'User logged in.', '2019-09-19 21:50:26'),
(4, 1000003, 'User logged out.', '2019-09-19 21:50:27'),
(5, 1000002, 'User logged in.', '2019-09-19 21:50:32'),
(6, 1000002, 'User logged out.', '2019-09-19 21:50:33'),
(7, 1000001, 'User logged in.', '2019-09-19 21:50:49'),
(8, 1000001, 'User logged out.', '2019-09-19 21:51:29'),
(9, 1000003, 'User logged in.', '2019-09-19 21:51:33'),
(10, 1000003, 'User logged out.', '2019-09-19 21:57:30'),
(11, 1000001, 'User logged in.', '2019-09-19 21:57:36'),
(12, 1000001, 'User logged out.', '2019-09-19 21:58:37'),
(13, 1000003, 'User logged in.', '2019-09-19 21:58:42'),
(14, 1000003, 'User logged out.', '2019-09-19 23:17:52'),
(15, 1000001, 'User logged in.', '2019-09-19 23:18:11'),
(16, 1000001, 'User logged out.', '2019-09-19 23:18:51'),
(17, 1000003, 'User logged in.', '2019-09-19 23:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` bigint(20) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userFirstName` varchar(25) NOT NULL,
  `userLastName` varchar(25) NOT NULL,
  `userPassword` varchar(32) NOT NULL,
  `userPasswordAttempts` int(1) NOT NULL DEFAULT '0',
  `userPrevPassword` text,
  `userPasswordDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userRole` int(2) NOT NULL DEFAULT '0',
  `userActive` int(1) NOT NULL DEFAULT '1',
  `userActiveDate` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userEmail`, `userFirstName`, `userLastName`, `userPassword`, `userPasswordAttempts`, `userPrevPassword`, `userPasswordDate`, `userCreationDate`, `userRole`, `userActive`, `userActiveDate`) VALUES
(1000001, 'accountant@test.com', 'Accountant', 'Person', '519524d3e2c7de2020f4cca2ae373b5b', 0, NULL, '2019-09-19 17:18:18', '2019-09-19 17:18:18', 0, 1, NULL),
(1000002, 'manager@test.com', 'Manager', 'Person', '5980ba484aeddde546d5e79eb893dc58', 0, NULL, '2019-09-19 18:15:02', '2019-09-19 18:15:02', 10, 1, NULL),
(1000003, 'administrator@test.com', 'Administrator', 'Person', '985de320ae9dc7cb28692edd5b3afa72', 0, NULL, '2019-09-19 20:27:39', '2019-09-19 20:27:39', 20, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs_categories`
--
ALTER TABLE `logs_categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `logs_events`
--
ALTER TABLE `logs_events`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `logs_users`
--
ALTER TABLE `logs_users`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs_categories`
--
ALTER TABLE `logs_categories`
  MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs_events`
--
ALTER TABLE `logs_events`
  MODIFY `logID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs_users`
--
ALTER TABLE `logs_users`
  MODIFY `logID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
