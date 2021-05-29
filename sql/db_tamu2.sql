-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2021 at 02:37 PM
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
  `Currency` int(11) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t02_top`
--

INSERT INTO `t02_top` (`idtop`, `Type`, `Currency`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'USD', 1, 1, '2021-04-11 09:31:01', '2021-04-22 13:39:10'),
(2, 'AUD', 2, 1, '2021-04-11 09:31:10', '2021-04-22 13:40:51'),
(3, 'PAYPAL', 1, 1, '2021-04-11 09:31:25', '2021-04-22 13:40:57'),
(4, 'BCA$', 1, 1, '2021-04-11 09:31:47', '2021-04-22 13:41:03'),
(5, 'RP', 3, 1, '2021-04-11 09:31:59', '2021-04-22 13:41:09'),
(6, 'CC BCA', 3, 1, '2021-04-11 09:32:13', '2021-04-22 13:41:15'),
(7, 'CC MDR', 3, 1, '2021-04-13 20:05:36', '2021-04-22 13:41:19');

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
-- Table structure for table `t06_currency`
--

CREATE TABLE `t06_currency` (
  `idcurrency` int(11) NOT NULL,
  `Currency` varchar(10) NOT NULL,
  `Konstanta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t06_currency`
--

INSERT INTO `t06_currency` (`idcurrency`, `Currency`, `Konstanta`) VALUES
(1, 'USD', 'KURS_1'),
(2, 'AUD', 'KURS_2'),
(3, 'RP', 'KURS_3');

-- --------------------------------------------------------

--
-- Table structure for table `t30_tamu`
--

CREATE TABLE `t30_tamu` (
  `idtamu` int(11) NOT NULL,
  `no` tinyint(4) DEFAULT 0,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Kurs` text DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `MF` varchar(1) DEFAULT '-',
  `Country` varchar(50) DEFAULT '-',
  `IdCard` varchar(50) DEFAULT '-',
  `PackageName` varchar(10) NOT NULL,
  `Night` tinyint(4) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Agent` varchar(50) NOT NULL,
  `PriceList` double DEFAULT 0,
  `FeeTanas` double DEFAULT 0,
  `PricePay` double DEFAULT 0,
  `Remarks` text DEFAULT '-',
  `Company` varchar(10) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t30_tamu`
--

INSERT INTO `t30_tamu` (`idtamu`, `no`, `TripNo`, `TripTgl`, `Kurs`, `Name`, `MF`, `Country`, `IdCard`, `PackageName`, `Night`, `CheckIn`, `CheckOut`, `Agent`, `PriceList`, `FeeTanas`, `PricePay`, `Remarks`, `Company`, `idusers`, `created_at`, `updated_at`) VALUES
(649, 1, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Peter Geofry', 'M', 'Canada', NULL, 'SUP', 7, '2020-08-02', '2020-08-09', 'Direct', 1153, 100, 0, 'AC, special price Rp500000 / night', '', 1, '2021-05-28 10:22:43', '2021-05-29 04:54:21'),
(650, 2, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Todd Gisondi', 'F', NULL, '351511', 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, 'AC, special price Rp500000 / night', 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(651, 3, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Xenia Maria', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, 'AC, special price Rp500000 / night', 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(652, 4, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Ace Will (4thn)', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, 'AC, special price Rp500000 / night', 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(653, 5, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Brad Buckle', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, 'AC, special price Rp500000 / night', 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(654, 6, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Kiana Buckle (3 thn)', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(655, 7, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Rahma Kristin', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(656, 8, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Nick Chonge', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'FREE', 800, NULL, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(657, 9, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Alisa Chonge (anak 6 thn)', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'FREE', 800, NULL, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(658, 10, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Evgeni Ivkov', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, NULL, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(659, 11, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Salmon Aidan John', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 800, 100, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(660, 12, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Joao Machado ', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 625, 100, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(661, 13, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Karolina  Hajova', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Nic Chong', 625, 100, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(662, 14, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Svetlanna', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Direct', 800, 100, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(663, 15, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Ilya Vasilyev', NULL, NULL, NULL, 'SUP', 6, '2020-08-02', '2020-08-08', 'Direct', 800, 100, NULL, NULL, 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34'),
(664, 16, 'T-03', '2020-08-02', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 'Jarrod Moore', NULL, NULL, NULL, 'SUP', 4, '2020-08-02', '2020-08-06', 'Direct', 800, NULL, NULL, 'AC, special price Rp500000 / night', 'SSW', 5, '2021-05-28 10:22:43', '2021-05-28 10:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `t31_bayar`
--

CREATE TABLE `t31_bayar` (
  `idbayar` int(11) NOT NULL,
  `Kurs` text DEFAULT NULL,
  `no` tinyint(4) DEFAULT 0,
  `idtamu` int(11) NOT NULL,
  `PaidBy` int(11) NOT NULL,
  `PriceList` double DEFAULT 0,
  `PricePay` double DEFAULT 0,
  `SelisihPL` double DEFAULT 0,
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

INSERT INTO `t31_bayar` (`idbayar`, `Kurs`, `no`, `idtamu`, `PaidBy`, `PriceList`, `PricePay`, `SelisihPL`, `Total`, `Selisih`, `ShareP`, `ShareS`, `idusers`, `created_at`, `updated_at`) VALUES
(645, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 1, 649, 649, 1153, 14280000, 0, 4350000, 11380000, 0, 0, 1, '2021-05-29 04:54:21', '2021-05-29 04:54:21'),
(646, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 2, 650, 650, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(647, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 3, 651, 651, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(648, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 4, 652, 652, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(649, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 5, 653, 653, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(650, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 6, 654, 654, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(651, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 7, 655, 655, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(652, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 8, 656, 656, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(653, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 9, 657, 657, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(654, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 10, 658, 658, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(655, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 11, 659, 659, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(656, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 12, 660, 660, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(657, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 13, 661, 661, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(658, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 14, 662, 662, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(659, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 15, 663, 663, 1020, 14280000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13'),
(660, 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}', 16, 664, 664, 933, 13062000, 0, 0, 0, 0, 0, 5, '2021-05-28 10:47:13', '2021-05-28 10:47:13');

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
(127, 645, 1, NULL, 400, 1, '2021-05-28 17:33:49', '2021-05-28 17:33:49');

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

--
-- Dumping data for table `t33_bayars`
--

INSERT INTO `t33_bayars` (`idbayars`, `idbayar`, `idtos`, `Jumlah`, `idusers`, `created_at`, `updated_at`) VALUES
(11, 645, 1, 11380000, 1, '2021-05-28 17:33:49', '2021-05-28 17:33:49');

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

-- --------------------------------------------------------

--
-- Table structure for table `t35_kurs`
--

CREATE TABLE `t35_kurs` (
  `idbkm` int(11) NOT NULL,
  `no` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `company` varchar(10) NOT NULL,
  `kurs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t35_kurs`
--

INSERT INTO `t35_kurs` (`idbkm`, `no`, `tgl`, `company`, `kurs`) VALUES
(4, 'T-03', '2020-08-02', 'SSW', 'a:2:{i:0;a:2:{s:8:\"MataUang\";s:3:\"USD\";s:5:\"Nilai\";s:5:\"14500\";}i:1;a:2:{s:8:\"MataUang\";s:3:\"AUD\";s:5:\"Nilai\";s:5:\"17500\";}}');

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
-- Indexes for table `t06_currency`
--
ALTER TABLE `t06_currency`
  ADD PRIMARY KEY (`idcurrency`);

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
-- Indexes for table `t35_kurs`
--
ALTER TABLE `t35_kurs`
  ADD PRIMARY KEY (`idbkm`);

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
-- AUTO_INCREMENT for table `t06_currency`
--
ALTER TABLE `t06_currency`
  MODIFY `idcurrency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t30_tamu`
--
ALTER TABLE `t30_tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;

--
-- AUTO_INCREMENT for table `t31_bayar`
--
ALTER TABLE `t31_bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

--
-- AUTO_INCREMENT for table `t32_bayard`
--
ALTER TABLE `t32_bayard`
  MODIFY `idbayard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `t33_bayars`
--
ALTER TABLE `t33_bayars`
  MODIFY `idbayars` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t34_bayars2`
--
ALTER TABLE `t34_bayars2`
  MODIFY `idbayars2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t35_kurs`
--
ALTER TABLE `t35_kurs`
  MODIFY `idbkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
