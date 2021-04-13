-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2021 at 05:22 AM
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
-- Table structure for table `t30_tamu`
--

CREATE TABLE `t30_tamu` (
  `idtamu` int(11) NOT NULL,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PackageName` varchar(10) NOT NULL,
  `Night` tinyint(4) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Agent` varchar(50) NOT NULL,
  `PriceList` double NOT NULL,
  `FeeTanas` double NOT NULL,
  `PricePay` double NOT NULL,
  `Remarks` text NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t30_tamu`
--

INSERT INTO `t30_tamu` (`idtamu`, `TripNo`, `TripTgl`, `Name`, `PackageName`, `Night`, `CheckIn`, `CheckOut`, `Agent`, `PriceList`, `FeeTanas`, `PricePay`, `Remarks`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'T-45', '2021-04-12', 'GERALDINE', 'VIP', 3, '2021-04-12', '2021-04-15', 'NICK CHONG', 1000, 1000, 1000, '.', 1, '2021-04-13 20:07:07', '2021-04-13 20:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `t30_tamu_old`
--

CREATE TABLE `t30_tamu_old` (
  `idtamu` int(11) NOT NULL,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Facility` varchar(25) NOT NULL,
  `MFC` varchar(1) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `IDNo` varchar(50) NOT NULL,
  `PackageNight` varchar(5) NOT NULL,
  `PackageType` varchar(3) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Agent` varchar(50) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `DaysStay` tinyint(4) NOT NULL,
  `Price` double NOT NULL DEFAULT 0,
  `FeeTaNas` double NOT NULL DEFAULT 0,
  `Price2` double NOT NULL DEFAULT 0,
  `Remarks` text NOT NULL DEFAULT '-',
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t30_tamu_old`
--

INSERT INTO `t30_tamu_old` (`idtamu`, `TripNo`, `TripTgl`, `Nama`, `Facility`, `MFC`, `Country`, `IDNo`, `PackageNight`, `PackageType`, `CheckIn`, `CheckOut`, `Agent`, `Status`, `DaysStay`, `Price`, `FeeTaNas`, `Price2`, `Remarks`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'T-38', '2019-07-19', 'ANTHONY PARIS', 'AC', 'M', 'OZ', '3515112412740001', '6N', 'SUP', '2019-07-19', '2019-07-25', 'Fotografer', '', 6, 0, 0, 0, '.', 1, '2021-04-11 15:17:31', '2021-04-11 15:17:31'),
(2, 'T-45', '2021-04-11', 'GERALDINE', 'AC', 'F', 'OZ', '3515112412740001', '3N', 'VIP', '2021-04-11', '2021-04-14', 'Fotografer', '', 3, 0, 0, 0, '.', 1, '2021-04-11 15:17:52', '2021-04-11 15:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `t31_bayar`
--

CREATE TABLE `t31_bayar` (
  `idbayar` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t31_bayar`
--

INSERT INTO `t31_bayar` (`idbayar`, `idtamu`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-04-13 20:07:07', '2021-04-13 20:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `t32_bayard`
--

CREATE TABLE `t32_bayard` (
  `idbayard` int(11) NOT NULL,
  `idbayar` int(11) NOT NULL,
  `idtop` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t32_bayard`
--

INSERT INTO `t32_bayard` (`idbayard`, `idbayar`, `idtop`, `Jumlah`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000, 1, '2021-04-13 20:07:07', '2021-04-13 20:07:07');

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
-- Indexes for table `t30_tamu`
--
ALTER TABLE `t30_tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- Indexes for table `t30_tamu_old`
--
ALTER TABLE `t30_tamu_old`
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
-- AUTO_INCREMENT for table `t30_tamu`
--
ALTER TABLE `t30_tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t30_tamu_old`
--
ALTER TABLE `t30_tamu_old`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t31_bayar`
--
ALTER TABLE `t31_bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t32_bayard`
--
ALTER TABLE `t32_bayard`
  MODIFY `idbayard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
