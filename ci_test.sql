-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 03:47 PM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `accountName` text NOT NULL,
  `accountCategory` varchar(50) NOT NULL,
  `accountCategorySub` varchar(50) NOT NULL,
  `accountSide` varchar(1) NOT NULL,
  `accountBalance` decimal(10,2) NOT NULL,
  `accountDebit` decimal(10,2) NOT NULL,
  `accountCredit` decimal(10,2) NOT NULL,
  `accountOrder` int(11) NOT NULL,
  `accountStatement` varchar(2) NOT NULL,
  `accountCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountID`, `userID`, `accountName`, `accountCategory`, `accountCategorySub`, `accountSide`, `accountBalance`, `accountDebit`, `accountCredit`, `accountOrder`, `accountStatement`, `accountCreationDate`) VALUES
(10000001, 1000003, 'Cash', 'Assets', 'Cash Related Accounts', 'L', '0.00', '12400.00', '12750.00', 1, 'BS', '2019-09-30 16:43:37'),
(10000021, 1000003, 'Notes Receivable', 'Assets', 'Recievables', 'L', '0.00', '0.00', '0.00', 1, 'BS', '2019-09-30 17:52:00'),
(10000022, 1000003, 'Accounts Receivable', 'Assets', 'Recievables', 'L', '0.00', '1500.00', '2400.00', 0, 'BS', '2019-10-11 19:25:26'),
(10000031, 1000003, 'Merchandise Inventory', 'Assets', 'Inventories', 'R', '0.00', '0.00', '0.00', 0, 'BS', '2019-10-11 19:26:00'),
(10000042, 1000003, 'Office Supplies', 'Assets', 'Prepaid Items', 'R', '0.00', '3800.00', '0.00', 0, 'BS', '2019-10-11 19:27:03'),
(10000045, 1000003, 'Prepaid Insurance', 'Assets', 'Prepaid Items', 'R', '0.00', '1800.00', '0.00', 0, 'BS', '2019-10-11 19:27:35'),
(10000061, 1000003, 'Land', 'Assets', 'Land', 'R', '0.00', '0.00', '0.00', 0, 'BS', '2019-10-11 19:27:46'),
(10000071, 1000003, 'Buildings', 'Assets', 'Cash Related Accounts', 'R', '0.00', '4500.00', '0.00', 0, 'BS', '2019-10-11 19:28:11'),
(10000081, 1000003, 'Office Equipment', 'Assets', 'Equipment', 'R', '0.00', '7500.00', '0.00', 0, 'BS', '2019-10-11 19:27:59'),
(20000001, 1000003, 'Notes Payable', 'Liabilities', 'Cash Related Accounts', 'R', '0.00', '0.00', '0.00', 0, 'BS', '2019-10-11 19:28:29'),
(20000002, 1000003, 'Accounts Payable', 'Liabilities', 'Short-term Payables', 'R', '0.00', '800.00', '1800.00', 0, 'BS', '2019-10-11 19:28:40'),
(30000001, 1000003, 'Capital', 'Owner\'s Equity', 'Owner\'s Equity', 'L', '0.00', '0.00', '20250.00', 0, 'BS', '2019-10-11 19:28:53'),
(30000002, 1000003, 'Drawing', 'Owner\'s Equity', 'Owner\'s Equity', 'R', '0.00', '0.00', '0.00', 0, 'BS', '2019-10-11 19:29:06'),
(40000001, 1000003, 'Sales', 'Revenues', 'Operating Revenues', 'L', '0.00', '0.00', '0.00', 0, 'IS', '2019-10-11 19:29:24'),
(40000011, 1000003, 'Interest Revenue', 'Revenues', 'Other Revenues', 'L', '0.00', '0.00', '0.00', 0, 'IS', '2019-10-11 19:29:36'),
(50000001, 1000003, 'Purchases', 'Operating Expenses', 'Cost of Goods Sold', 'R', '0.00', '0.00', '0.00', 0, 'IS', '2019-10-11 19:30:09'),
(50000011, 1000003, 'Wages Expense', 'Operating Expenses', 'Selling Expenses', 'R', '0.00', '4900.00', '0.00', 0, 'IS', '2019-10-11 19:30:31'),
(50000021, 1000003, 'Rent Expense', 'Operating Expenses', 'General and Administrative Expenses', 'R', '0.00', '0.00', '0.00', 0, 'IS', '2019-10-11 19:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_categories`
--

CREATE TABLE `accounts_categories` (
  `categoryID` bigint(20) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `categoryDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_categories_sub`
--

CREATE TABLE `accounts_categories_sub` (
  `subCategoryID` bigint(20) NOT NULL,
  `categoryID` bigint(20) NOT NULL,
  `subCategoryName` varchar(50) NOT NULL,
  `subCategoryDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `entryID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `entryDescription` text NOT NULL,
  `entryDebitAccount` text NOT NULL,
  `entryDebitBalance` text NOT NULL,
  `entryCreditAccount` text NOT NULL,
  `entryCreditBalance` text NOT NULL,
  `entryStatus` int(1) NOT NULL DEFAULT '0',
  `entryStatusComment` text,
  `entryCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`entryID`, `userID`, `entryDescription`, `entryDebitAccount`, `entryDebitBalance`, `entryCreditAccount`, `entryCreditBalance`, `entryStatus`, `entryStatusComment`, `entryCreateDate`) VALUES
(10000001, 1000001, 'John Addams recievables', '[\"10000001\",\"10000022\",\"10000042\",\"10000081\"]', '[\"10000\",\"1500\",\"1250\",\"7500\"]', '[\"30000001\"]', '[\"20250\"]', 1, NULL, '2019-10-24 20:00:25'),
(10000002, 1000001, 'Rent Payment', '[\"10000071\"]', '[\"4500\"]', '[\"10000001\"]', '[\"4500\"]', 1, NULL, '2019-10-24 20:02:46'),
(10000003, 1000001, 'Paid Insurance', '[\"10000045\"]', '[\"1800\"]', '[\"10000001\"]', '[\"1800\"]', 1, NULL, '2019-10-24 20:04:03'),
(10000004, 1000001, 'Purchased additional office furniture', '[\"10000042\"]', '[\"1800\"]', '[\"20000002\"]', '[\"1800\"]', 1, NULL, '2019-10-24 20:10:16'),
(10000005, 1000001, 'Received payment from client', '[\"10000001\"]', '[\"800\"]', '[\"10000022\"]', '[\"800\"]', 1, NULL, '2019-10-24 20:11:02'),
(10000006, 1000001, 'Paid Morllton Company for debt', '[\"20000002\"]', '[\"800\"]', '[\"10000001\"]', '[\"800\"]', 1, NULL, '2019-10-24 20:12:00'),
(10000007, 1000001, 'Paid salaries of employees', '[\"50000011\"]', '[\"400\"]', '[\"10000001\"]', '[\"400\"]', 1, NULL, '2019-10-24 20:13:04'),
(10000008, 1000001, 'Purchased more supplies for the office', '[\"10000042\"]', '[\"750\"]', '[\"10000001\"]', '[\"750\"]', 1, NULL, '2019-10-24 20:13:44'),
(10000009, 1000001, 'Received cash from clients on account', '[\"10000001\"]', '[\"1600\"]', '[\"10000022\"]', '[\"1600\"]', 1, NULL, '2019-10-24 20:14:54'),
(10000010, 1000001, 'Had to payout full salaries for month', '[\"50000011\"]', '[\"4500\"]', '[\"10000001\"]', '[\"4500\"]', 1, NULL, '2019-10-24 20:15:42'),
(10000011, 1000001, 'Testing form validation', '[\"10000001\"]', '[\"100\"]', '[\"10000021\"]', '[\"100\"]', 0, 'Purely done for testing purposes.', '2019-10-25 20:51:24'),
(10000012, 1000002, 'Testing log creation', '[\"10000001\"]', '[\"100\"]', '[\"10000061\"]', '[\"100\"]', 0, 'Testing log creation, not needed.', '2019-10-25 21:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `logType` varchar(25) NOT NULL,
  `logBefore` text NOT NULL,
  `logAfter` text NOT NULL,
  `logDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `userID`, `logType`, `logBefore`, `logAfter`, `logDate`) VALUES
(10000001, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-08 20:58:43'),
(10000002, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 21:03:02'),
(10000003, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountants\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 21:16:02'),
(10000004, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountants\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 21:16:05'),
(10000005, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-08 21:16:14'),
(10000006, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-08 21:16:16'),
(10000007, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"10\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Managers\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:01'),
(10000008, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Managers\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"10\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:04'),
(10000009, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"10\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:35'),
(10000010, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"20\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:38'),
(10000011, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"20\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:41'),
(10000012, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountants\",\"userLastName\":\"Persons\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"10\",\"userActive\":\"0\",\"userID\":\"1000001\"}', '2019-10-08 22:00:57'),
(10000013, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountants\",\"userLastName\":\"Persons\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"10\",\"userActive\":\"0\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountants@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 22:01:09'),
(10000014, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountants@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 22:01:13'),
(10000015, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userPassword\":\"9839bdd0ed4842dab367036fa233d871\",\"userID\":\"1000001\"}', '2019-10-08 22:01:22'),
(10000016, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"9839bdd0ed4842dab367036fa233d871\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userPassword\":\"c2391dedefcd683e3c5e5c50f5ef9615\",\"userID\":\"1000001\"}', '2019-10-08 22:01:33'),
(10000017, 1000003, 'accounts', '{\"accountID\":\"101\",\"userID\":\"1000003\",\"accountName\":\"Cash\",\"accountDescription\":\"This is the cash account.\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"1\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-09-30 12:43:37\"}', '{\"accountName\":\"Cashs\",\"accountDescription\":\"This is the cash account.s\",\"accountCategory\":\"Liabilities\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"R\",\"accountStatement\":\"IS\",\"accountID\":\"101\"}', '2019-10-08 22:06:30'),
(10000018, 1000003, 'accounts', '{\"accountID\":\"101\",\"userID\":\"1000003\",\"accountName\":\"Cashs\",\"accountDescription\":\"This is the cash account.s\",\"accountCategory\":\"Liabilities\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"R\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"1\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-09-30 12:43:37\"}', '{\"accountName\":\"Cashs\",\"accountDescription\":\"This is the cash account.s\",\"accountCategory\":\"Assets\",\"accountSide\":\"L\",\"accountStatement\":\"BS\",\"accountID\":\"101\"}', '2019-10-08 22:06:45'),
(10000019, 1000003, 'accounts', '{\"accountID\":\"101\",\"userID\":\"1000003\",\"accountName\":\"Cashs\",\"accountDescription\":\"This is the cash account.s\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"1\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-09-30 12:43:37\"}', '{\"accountName\":\"Cash\",\"accountDescription\":\"This is the cash account.\",\"accountID\":\"101\"}', '2019-10-08 22:11:47'),
(10000020, 1000003, 'accounts', '{\"accountID\":\"401\",\"userID\":\"0\",\"accountName\":\"Sales\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:29:24\"}', '{\"accountName\":\"Sales\",\"accountStatement\":\"IS\",\"accountID\":\"401\"}', '2019-10-11 19:29:55'),
(10000021, 1000003, 'accounts', '{\"accountID\":\"411\",\"userID\":\"0\",\"accountName\":\"Interest Revenue\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:29:36\"}', '{\"accountName\":\"Interest Revenue\",\"accountStatement\":\"IS\",\"accountID\":\"411\"}', '2019-10-11 19:29:59'),
(10000022, 1000003, 'accounts', '{\"accountID\":\"521\",\"userID\":\"0\",\"accountName\":\"Rent Expense\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:30:43\"}', '{\"accountName\":\"Rent Expense\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"General and Administrative Expenses\",\"accountSide\":\"R\",\"accountStatement\":\"BS\",\"accountID\":\"521\"}', '2019-10-11 19:34:37'),
(10000023, 1000003, 'accounts', '{\"accountID\":\"511\",\"userID\":\"0\",\"accountName\":\"Wages Expense\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:30:31\"}', '{\"accountName\":\"Wages Expense\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"Selling Expenses\",\"accountSide\":\"R\",\"accountStatement\":\"IS\",\"accountID\":\"511\"}', '2019-10-11 19:34:49'),
(10000024, 1000003, 'accounts', '{\"accountID\":\"521\",\"userID\":\"0\",\"accountName\":\"Rent Expense\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"General and Administrative Expenses\",\"accountSide\":\"R\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:30:43\"}', '{\"accountName\":\"Rent Expense\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"General and Administrative Expenses\",\"accountStatement\":\"IS\",\"accountID\":\"521\"}', '2019-10-11 19:34:59'),
(10000025, 1000003, 'accounts', '{\"accountID\":\"504\",\"userID\":\"0\",\"accountName\":\"Overhead\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:30:16\"}', '{\"accountName\":\"Overhead\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"Cost of Goods Sold\",\"accountSide\":\"R\",\"accountStatement\":\"IS\",\"accountID\":\"504\"}', '2019-10-11 19:35:21'),
(10000026, 1000003, 'accounts', '{\"accountID\":\"504\",\"userID\":\"0\",\"accountName\":\"Overhead\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"Cost of Goods Sold\",\"accountSide\":\"R\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:30:16\"}', '{\"accountName\":\"Overhead\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"Cost of Goods Sold\",\"accountSide\":\"L\",\"accountStatement\":\"IS\",\"accountID\":\"504\"}', '2019-10-11 19:35:31'),
(10000027, 1000003, 'accounts', '{\"accountID\":\"501\",\"userID\":\"0\",\"accountName\":\"Purchases\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:30:09\"}', '{\"accountName\":\"Purchases\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"Cost of Goods Sold\",\"accountSide\":\"R\",\"accountID\":\"501\"}', '2019-10-11 19:36:22'),
(10000028, 1000003, 'accounts', '{\"accountID\":\"411\",\"userID\":\"0\",\"accountName\":\"Interest Revenue\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:29:36\"}', '{\"accountName\":\"Interest Revenue\",\"accountCategory\":\"Revenues\",\"accountCategorySub\":\"Other Revenues\",\"accountID\":\"411\"}', '2019-10-11 19:36:36'),
(10000029, 1000003, 'accounts', '{\"accountID\":\"401\",\"userID\":\"0\",\"accountName\":\"Sales\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:29:24\"}', '{\"accountName\":\"Sales\",\"accountCategory\":\"Revenues\",\"accountCategorySub\":\"Operative Revenues\",\"accountID\":\"401\"}', '2019-10-11 19:36:51'),
(10000030, 1000003, 'accounts', '{\"accountID\":\"401\",\"userID\":\"0\",\"accountName\":\"Sales\",\"accountCategory\":\"Revenues\",\"accountCategorySub\":\"Operative Revenues\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:29:24\"}', '{\"accountName\":\"Sales\",\"accountCategory\":\"Revenues\",\"accountCategorySub\":\"Operating Revenues\",\"accountID\":\"401\"}', '2019-10-11 19:37:23'),
(10000031, 1000003, 'accounts', '{\"accountID\":\"302\",\"userID\":\"0\",\"accountName\":\"Drawing\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:29:06\"}', '{\"accountName\":\"Drawing\",\"accountCategory\":\"Owner\'s Equity\",\"accountCategorySub\":\"Owner\'s Equity\",\"accountSide\":\"R\",\"accountID\":\"302\"}', '2019-10-11 19:37:50'),
(10000032, 1000003, 'accounts', '{\"accountID\":\"301\",\"userID\":\"0\",\"accountName\":\"Capital\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:28:53\"}', '{\"accountName\":\"Capital\",\"accountCategory\":\"Owner\'s Equity\",\"accountCategorySub\":\"Owner\'s Equity\",\"accountSide\":\"L\",\"accountID\":\"301\"}', '2019-10-11 19:37:59'),
(10000033, 1000003, 'accounts', '{\"accountID\":\"202\",\"userID\":\"0\",\"accountName\":\"Accounts Payable\",\"accountCategory\":\"Liabilities\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:28:40\"}', '{\"accountName\":\"Accounts Payable\",\"accountCategorySub\":\"Short-term Payables\",\"accountSide\":\"R\",\"accountID\":\"202\"}', '2019-10-11 19:38:14'),
(10000034, 1000003, 'accounts', '{\"accountID\":\"201\",\"userID\":\"0\",\"accountName\":\"Notes Payable\",\"accountCategory\":\"Liabilities\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:28:29\"}', '{\"accountName\":\"Notes Payable\",\"accountCategorySub\":\"Short-term Payables\",\"accountSide\":\"L\",\"accountID\":\"201\"}', '2019-10-11 19:38:27'),
(10000035, 1000003, 'accounts', '{\"accountID\":\"181\",\"userID\":\"0\",\"accountName\":\"Office Equipment\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:27:59\"}', '{\"accountName\":\"Office Equipment\",\"accountCategorySub\":\"Equipment\",\"accountSide\":\"R\",\"accountID\":\"181\"}', '2019-10-11 19:38:41'),
(10000036, 1000003, 'accounts', '{\"accountID\":\"171\",\"userID\":\"0\",\"accountName\":\"Buildings\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:28:11\"}', '{\"accountName\":\"Buildings\",\"accountCategorySub\":\"Buildings\",\"accountID\":\"171\"}', '2019-10-11 19:38:52'),
(10000037, 1000003, 'accounts', '{\"accountID\":\"161\",\"userID\":\"0\",\"accountName\":\"Land\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:27:46\"}', '{\"accountName\":\"Land\",\"accountCategorySub\":\"Land\",\"accountSide\":\"R\",\"accountID\":\"161\"}', '2019-10-11 19:38:57'),
(10000038, 1000003, 'accounts', '{\"accountID\":\"171\",\"userID\":\"0\",\"accountName\":\"Buildings\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Buildings\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:28:11\"}', '{\"accountName\":\"Buildings\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"R\",\"accountID\":\"171\"}', '2019-10-11 19:39:03'),
(10000039, 1000003, 'accounts', '{\"accountID\":\"145\",\"userID\":\"0\",\"accountName\":\"Prepaid Insurance\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:27:35\"}', '{\"accountName\":\"Prepaid Insurance\",\"accountCategorySub\":\"Prepaid Items\",\"accountSide\":\"R\",\"accountID\":\"145\"}', '2019-10-11 19:39:11'),
(10000040, 1000003, 'accounts', '{\"accountID\":\"142\",\"userID\":\"0\",\"accountName\":\"Office Supplies\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:27:03\"}', '{\"accountName\":\"Office Supplies\",\"accountCategorySub\":\"Prepaid Items\",\"accountSide\":\"R\",\"accountID\":\"142\"}', '2019-10-11 19:39:20'),
(10000041, 1000003, 'accounts', '{\"accountID\":\"131\",\"userID\":\"0\",\"accountName\":\"Merchandise Inventory\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:26:00\"}', '{\"accountName\":\"Merchandise Inventory\",\"accountCategorySub\":\"Inventories\",\"accountSide\":\"R\",\"accountID\":\"131\"}', '2019-10-11 19:39:26'),
(10000042, 1000003, 'accounts', '{\"accountID\":\"122\",\"userID\":\"0\",\"accountName\":\"Accounts Receivable\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:25:26\"}', '{\"accountName\":\"Accounts Receivable\",\"accountCategorySub\":\"Recievables\",\"accountID\":\"122\"}', '2019-10-11 19:39:31'),
(10000043, 1000003, 'accounts', '{\"accountID\":\"121\",\"userID\":\"1000003\",\"accountName\":\"Notes Receivable\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Receivables\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"1\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-09-30 13:52:00\"}', '{\"accountName\":\"Notes Receivable\",\"accountCategorySub\":\"Recievables\",\"accountID\":\"121\"}', '2019-10-11 19:39:35'),
(10000044, 1000003, 'accounts', '{\"accountID\":\"201\",\"userID\":\"0\",\"accountName\":\"Notes Payable\",\"accountCategory\":\"Liabilities\",\"accountCategorySub\":\"Short-term Payables\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"BS\",\"accountCreationDate\":\"2019-10-11 15:28:29\"}', '{\"accountName\":\"Notes Payable\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"R\",\"accountID\":\"201\"}', '2019-10-11 19:39:43'),
(10000045, 1000003, 'accounts', '{\"accountID\":\"504\",\"userID\":\"0\",\"accountName\":\"Overhead\",\"accountCategory\":\"Operating Expenses\",\"accountCategorySub\":\"Cost of Goods Sold\",\"accountSide\":\"L\",\"accountBalance\":\"0\",\"accountDebit\":\"0\",\"accountCredit\":\"0\",\"accountOrder\":\"0\",\"accountStatement\":\"IS\",\"accountCreationDate\":\"2019-10-11 15:30:16\"}', '{\"accountName\":\"Overhead\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Cash Related Accounts\",\"accountSide\":\"R\",\"accountID\":\"504\"}', '2019-10-11 19:42:43'),
(10000046, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"c2391dedefcd683e3c5e5c50f5ef9615\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userID\":\"1000001\"}', '2019-10-13 22:09:23'),
(10000047, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userPassword\":\"6a0c60f307c789f24b3b65a88e04dbf4\",\"userID\":\"1000003\"}', '2019-10-25 20:18:37'),
(10000048, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userPassword\":\"985de320ae9dc7cb28692edd5b3afa72\",\"userID\":\"1000003\"}', '2019-10-25 20:19:03'),
(10000049, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-25 20:20:11'),
(10000050, 1000002, 'entries', '10000012', 'Created', '2019-10-25 21:01:18'),
(10000051, 1000002, 'entries', '10000012', 'Rejected: Testing log creation, not needed.', '2019-10-25 21:21:37'),
(10000052, 1000002, 'users', '{\"userID\":\"1000002\",\"userName\":\"MPerson0919\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\"}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userID\":\"1000002\"}', '2019-10-25 22:30:31'),
(10000053, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userPassword\":\"985de320ae9dc7cb28692edd5b3afa72\",\"userID\":\"1000003\"}', '2019-10-25 22:31:21');

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
  `userActiveDate` text,
  `userForgot` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userEmail`, `userFirstName`, `userLastName`, `userPassword`, `userPasswordAttempts`, `userPrevPassword`, `userPasswordDate`, `userCreationDate`, `userRole`, `userActive`, `userActiveDate`, `userForgot`) VALUES
(1000001, 'accountant@test.com', 'Accountant', 'Person', '519524d3e2c7de2020f4cca2ae373b5b', 0, NULL, '2019-09-19 17:18:18', '2019-09-19 17:18:18', 0, 1, NULL, NULL),
(1000002, 'manager@test.com', 'Manager', 'Person', '5980ba484aeddde546d5e79eb893dc58', 0, NULL, '2019-09-19 18:15:02', '2019-09-19 18:15:02', 10, 1, NULL, NULL),
(1000003, 'administrator@test.com', 'Admins', 'Person', '985de320ae9dc7cb28692edd5b3afa72', 0, NULL, '2019-09-19 20:27:39', '2019-09-19 20:27:39', 20, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `accounts_categories`
--
ALTER TABLE `accounts_categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `accounts_categories_sub`
--
ALTER TABLE `accounts_categories_sub`
  ADD PRIMARY KEY (`subCategoryID`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
-- AUTO_INCREMENT for table `accounts_categories`
--
ALTER TABLE `accounts_categories`
  MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts_categories_sub`
--
ALTER TABLE `accounts_categories_sub`
  MODIFY `subCategoryID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `entryID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000013;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000054;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
