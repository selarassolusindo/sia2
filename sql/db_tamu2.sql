-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2021 at 07:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tamu2`
--

-- --------------------------------------------------------

--
-- Table structure for table `t01_package`
--

CREATE TABLE `t01_package` (
  `idprice` int(11) NOT NULL,
  `PackageName` varchar(50) NOT NULL,
  `PackageCode` varchar(10) NOT NULL,
  `SN3LN` double NOT NULL DEFAULT 0,
  `SN6LN` double NOT NULL DEFAULT 0,
  `SNELN` double NOT NULL DEFAULT 0,
  `PN1LN` double NOT NULL DEFAULT 0,
  `PN1DN` double NOT NULL DEFAULT 0,
  `SN3C` double NOT NULL DEFAULT 0,
  `SN3CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `SN6C` double NOT NULL DEFAULT 0,
  `SN6CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `SNEC` double NOT NULL DEFAULT 0,
  `SNECP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `PN3C` double NOT NULL DEFAULT 0,
  `PN3CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `PN6C` double NOT NULL DEFAULT 0,
  `PN6CP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `PNEC` double NOT NULL DEFAULT 0,
  `PNECP` decimal(10,2) NOT NULL DEFAULT 0.00,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t01_package`
--

INSERT INTO `t01_package` (`idprice`, `PackageName`, `PackageCode`, `SN3LN`, `SN6LN`, `SNELN`, `PN1LN`, `PN1DN`, `SN3C`, `SN3CP`, `SN6C`, `SN6CP`, `SNEC`, `SNECP`, `PN3C`, `PN3CP`, `PN6C`, `PN6CP`, `PNEC`, `PNECP`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'STANDARD', 'STD', 625, 750, 100, 80, 450000, 385, '0.62', 270, '0.36', 20, '0.20', 240, '0.38', 480, '0.64', 80, '0.80', 0, '2020-09-19 13:05:59', '2021-04-10 11:43:13'),
(2, 'DELUXE', 'DEL', 725.03, 930, 166, 95, 550000, 440.03, '0.61', 360, '0.39', 71, '0.43', 285, '0.39', 570, '0.61', 95, '0.57', 1, '2020-09-19 13:22:52', '2021-04-01 17:47:15'),
(3, 'SUPERIOR', 'SUP', 800, 1020, 133, 100, 650000, 500, '0.63', 420, '0.41', 33, '0.25', 300, '0.38', 600, '0.59', 100, '0.75', 1, '2020-09-19 13:23:24', '2021-04-01 17:47:17'),
(4, 'VIP', 'VIP', 850, 1080, 150, 105, 750000, 535, '0.63', 450, '0.42', 45, '0.30', 315, '0.37', 630, '0.58', 105, '0.70', 1, '2020-09-19 13:27:10', '2021-04-01 17:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `t02_top`
--

CREATE TABLE `t02_top` (
  `idtop` int(11) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t02_top`
--

INSERT INTO `t02_top` (`idtop`, `Type`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'USD', 1, '2021-04-11 09:31:01', '2021-04-11 09:31:01'),
(2, 'AUD', 1, '2021-04-11 09:31:10', '2021-04-11 09:31:10'),
(3, 'PAYPAL', 1, '2021-04-11 09:31:25', '2021-04-11 09:31:25'),
(4, 'BCA$', 1, '2021-04-11 09:31:47', '2021-04-13 20:05:03'),
(5, 'RP', 1, '2021-04-11 09:31:59', '2021-04-13 20:05:13'),
(6, 'CC BCA', 1, '2021-04-11 09:32:13', '2021-04-13 20:05:20'),
(7, 'CC MDR', 1, '2021-04-13 20:05:36', '2021-04-13 20:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `t03_agent`
--

CREATE TABLE `t03_agent` (
  `idagent` int(11) NOT NULL,
  `Agent` varchar(25) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t03_agent`
--

INSERT INTO `t03_agent` (`idagent`, `Agent`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'Anak', 1, '2021-04-10 06:30:51', '2021-04-10 06:30:51'),
(2, 'Fotografer', 1, '2021-04-10 06:31:04', '2021-04-10 06:31:04'),
(3, 'Dokter', 1, '2021-04-10 06:31:13', '2021-04-10 06:31:13'),
(4, 'Surfguide', 1, '2021-04-10 06:31:26', '2021-04-10 06:31:26'),
(5, 'Teacher', 1, '2021-04-10 06:31:33', '2021-04-10 06:31:33'),
(6, 'Giftfree', 1, '2021-04-10 06:31:42', '2021-04-10 06:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `t04_tos`
--

CREATE TABLE `t04_tos` (
  `idtos` tinyint(4) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t04_tos`
--

INSERT INTO `t04_tos` (`idtos`, `Type`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'BELUM BAYAR', 1, '2021-04-16 18:14:00', '2021-04-16 18:14:00'),
(2, 'KURANG BAYAR', 1, '2021-04-16 18:14:06', '2021-04-16 18:14:06'),
(3, 'DISCOUNT', 1, '2021-04-16 18:14:13', '2021-04-16 18:14:13'),
(4, 'CHARGE CC', 1, '2021-04-16 18:14:23', '2021-04-16 18:14:23'),
(5, 'SELISIH KURS', 1, '2021-04-16 18:14:35', '2021-04-16 18:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `t05_tos2`
--

CREATE TABLE `t05_tos2` (
  `idtos2` tinyint(4) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t05_tos2`
--

INSERT INTO `t05_tos2` (`idtos2`, `Type`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'PROMO', 1, '2021-04-20 13:03:30', '2021-04-20 13:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `t30_tamu`
--

CREATE TABLE `t30_tamu` (
  `idtamu` int(11) NOT NULL,
  `no` tinyint(4) DEFAULT 0,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PackageName` varchar(10) NOT NULL,
  `Night` tinyint(4) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Agent` varchar(50) NOT NULL,
  `PriceList` double DEFAULT 0,
  `FeeTanas` double DEFAULT 0,
  `PricePay` double DEFAULT 0,
  `Remarks` text DEFAULT '-',
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t30_tamu`
--

INSERT INTO `t30_tamu` (`idtamu`, `no`, `TripNo`, `TripTgl`, `Name`, `PackageName`, `Night`, `CheckIn`, `CheckOut`, `Agent`, `PriceList`, `FeeTanas`, `PricePay`, `Remarks`, `idusers`, `created_at`, `updated_at`) VALUES
(324, 1, 'T-04', '2020-01-08', 'James Hendy', 'DEL', 3, '2020-08-01', '2020-08-04', 'Direct', 725, NULL, 1500000, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(325, 2, 'T-04', '2020-01-08', 'Ruben Jack Hendy', 'DEL', 3, '2020-08-01', '2020-08-04', 'Direct', 725, NULL, 1500000, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(326, 3, 'T-04', '2020-01-08', 'Koa Hendy', 'DEL', 3, '2020-08-01', '2020-08-04', 'Direct', 725, NULL, 1500000, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(327, 4, 'T-04', '2020-01-08', 'Nick Haynes', 'DEL', 3, '2020-08-01', '2020-08-04', 'Direct', 725, NULL, 1500000, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(328, 5, 'T-04', '2020-01-08', 'Luke Oliver Cromwell', 'DEL', 3, '2020-08-01', '2020-08-04', 'Direct', 725, NULL, 1500000, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(329, 6, 'T-04', '2020-01-08', 'Eugene Tollemache', 'DEL', 3, '2020-08-01', '2020-08-04', 'Direct', 725, NULL, 1500000, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(346, 1, 'T-03', '2020-02-08', 'Peter Geofry ', 'SUP', 6, '2020-08-02', '2020-08-08', 'Direct', 725, 100, NULL, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(347, 2, 'T-03', '2020-02-08', 'Todd Gisondi', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(348, 3, 'T-03', '2020-02-08', 'Xenia Maria', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(349, 4, 'T-03', '2020-02-08', 'Ace Will (4thn)', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(350, 5, 'T-03', '2020-02-08', 'Brad Buckle', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(351, 6, 'T-03', '2020-02-08', 'Kiana Buckle (3 thn)', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(352, 7, 'T-03', '2020-02-08', 'Rahma Kristin', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(353, 8, 'T-03', '2020-02-08', 'Nick Chonge', 'SUP', 6, '2020-08-02', '2020-08-08', 'FREE', 800, NULL, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(354, 9, 'T-03', '2020-02-08', 'Alisa Chonge (anak 6 thn)', 'SUP', 6, '2020-08-02', '2020-08-08', 'FREE', 800, NULL, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(355, 10, 'T-03', '2020-02-08', 'Evgeni Ivkov', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(356, 11, 'T-03', '2020-02-08', 'Salmon Aidan John', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(357, 12, 'T-03', '2020-02-08', 'Joao Machado ', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 625, 100, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(358, 13, 'T-03', '2020-02-08', 'Karolina  Hajova', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 625, 100, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(359, 14, 'T-03', '2020-02-08', 'Svetlanna', 'SUP', 6, '2020-08-02', '2020-08-08', 'Direct', 800, 100, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(360, 15, 'T-03', '2020-02-08', 'Ilya Vasilyev', 'SUP', 6, '2020-08-02', '2020-08-08', 'Direct', 800, 100, NULL, NULL, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(361, 16, 'T-03', '2020-02-08', 'Jarrod Moore', 'SUP', 4, '2020-08-02', '2020-08-06', 'Direct', 800, NULL, NULL, 'AC, special price Rp500000 / night', 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `t31_bayar`
--

CREATE TABLE `t31_bayar` (
  `idbayar` int(11) NOT NULL,
  `no` tinyint(4) DEFAULT 0,
  `idtamu` int(11) NOT NULL,
  `PaidBy` int(11) NOT NULL,
  `PriceList` double DEFAULT 0,
  `PricePay` double DEFAULT 0,
  `SelisihPL` double DEFAULT 0,
  `Kurs` double DEFAULT 0,
  `Total` double DEFAULT 0,
  `Selisih` double DEFAULT 0,
  `ShareP` double DEFAULT 0,
  `ShareS` double DEFAULT 0,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t31_bayar`
--

INSERT INTO `t31_bayar` (`idbayar`, `no`, `idtamu`, `PaidBy`, `PriceList`, `PricePay`, `SelisihPL`, `Kurs`, `Total`, `Selisih`, `ShareP`, `ShareS`, `idusers`, `created_at`, `updated_at`) VALUES
(323, 1, 324, 324, 725.03, 1500000, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:33:11', '2021-04-20 23:33:11'),
(324, 2, 325, 325, 725.03, 1500000, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(325, 3, 326, 326, 725.03, 1500000, 0, 0, 0, 0, 0, 0, 1, '2021-04-20 23:33:11', '2021-04-20 23:33:11'),
(326, 4, 327, 327, 725.03, 1500000, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:32:58', '2021-04-20 23:32:58'),
(327, 5, 328, 328, 725.03, 1500000, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(328, 6, 329, 329, 725.03, 1500000, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(345, 1, 346, 346, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(346, 2, 347, 347, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(347, 3, 348, 348, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(348, 4, 349, 349, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(349, 5, 350, 350, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(350, 6, 351, 351, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(351, 7, 352, 352, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(352, 8, 353, 353, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(353, 9, 354, 354, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(354, 10, 355, 355, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(355, 11, 356, 356, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(356, 12, 357, 357, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(357, 13, 358, 358, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(358, 14, 359, 359, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(359, 15, 360, 360, 1020, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11'),
(360, 16, 361, 361, 933, NULL, 0, NULL, 0, 0, 0, 0, 1, '2021-04-20 23:42:11', '2021-04-20 23:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `t32_bayard`
--

CREATE TABLE `t32_bayard` (
  `idbayard` int(11) NOT NULL,
  `idbayar` int(11) NOT NULL,
  `idtop` int(11) NOT NULL,
  `TglBayar` date DEFAULT NULL,
  `Jumlah` double NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t32_bayard`
--

INSERT INTO `t32_bayard` (`idbayard`, `idbayar`, `idtop`, `TglBayar`, `Jumlah`, `idusers`, `created_at`, `updated_at`) VALUES
(73, 323, 5, '2020-01-08', 4500000, 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36'),
(74, 324, 5, '2020-01-08', 4500000, 1, '2021-04-20 23:31:36', '2021-04-20 23:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `t33_bayars`
--

CREATE TABLE `t33_bayars` (
  `idbayars` int(11) NOT NULL,
  `idbayar` int(11) NOT NULL,
  `idtos` int(11) NOT NULL,
  `Jumlah` double NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t34_bayars2`
--

CREATE TABLE `t34_bayars2` (
  `idbayars2` int(11) NOT NULL,
  `idbayar` int(11) NOT NULL,
  `idtos2` int(11) NOT NULL,
  `Jumlah` double NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t01_package`
--
ALTER TABLE `t01_package`
  ADD PRIMARY KEY (`idprice`);

--
-- Indexes for table `t02_top`
--
ALTER TABLE `t02_top`
  ADD PRIMARY KEY (`idtop`);

--
-- Indexes for table `t03_agent`
--
ALTER TABLE `t03_agent`
  ADD PRIMARY KEY (`idagent`);

--
-- Indexes for table `t04_tos`
--
ALTER TABLE `t04_tos`
  ADD PRIMARY KEY (`idtos`);

--
-- Indexes for table `t05_tos2`
--
ALTER TABLE `t05_tos2`
  ADD PRIMARY KEY (`idtos2`);

--
-- Indexes for table `t30_tamu`
--
ALTER TABLE `t30_tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- Indexes for table `t31_bayar`
--
ALTER TABLE `t31_bayar`
  ADD PRIMARY KEY (`idbayar`);

--
-- Indexes for table `t32_bayard`
--
ALTER TABLE `t32_bayard`
  ADD PRIMARY KEY (`idbayard`);

--
-- Indexes for table `t33_bayars`
--
ALTER TABLE `t33_bayars`
  ADD PRIMARY KEY (`idbayars`);

--
-- Indexes for table `t34_bayars2`
--
ALTER TABLE `t34_bayars2`
  ADD PRIMARY KEY (`idbayars2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t01_package`
--
ALTER TABLE `t01_package`
  MODIFY `idprice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t02_top`
--
ALTER TABLE `t02_top`
  MODIFY `idtop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t03_agent`
--
ALTER TABLE `t03_agent`
  MODIFY `idagent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t04_tos`
--
ALTER TABLE `t04_tos`
  MODIFY `idtos` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t05_tos2`
--
ALTER TABLE `t05_tos2`
  MODIFY `idtos2` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t30_tamu`
--
ALTER TABLE `t30_tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `t31_bayar`
--
ALTER TABLE `t31_bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `t32_bayard`
--
ALTER TABLE `t32_bayard`
  MODIFY `idbayard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `t33_bayars`
--
ALTER TABLE `t33_bayars`
  MODIFY `idbayars` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t34_bayars2`
--
ALTER TABLE `t34_bayars2`
  MODIFY `idbayars2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
