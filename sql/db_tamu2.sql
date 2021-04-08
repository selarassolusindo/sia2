-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2021 at 09:26 PM
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
(1, 'STANDARD', 'STD', 625.51, 750, 100, 80, 450000, 385.51, '0.62', 270, '0.36', 20, '0.20', 240, '0.38', 480, '0.64', 80, '0.80', 1, '2020-09-19 13:05:59', '2021-04-01 17:47:11'),
(2, 'DELUXE', 'DEL', 725.03, 930, 166, 95, 550000, 440.03, '0.61', 360, '0.39', 71, '0.43', 285, '0.39', 570, '0.61', 95, '0.57', 1, '2020-09-19 13:22:52', '2021-04-01 17:47:15'),
(3, 'SUPERIOR', 'SUP', 800, 1020, 133, 100, 650000, 500, '0.63', 420, '0.41', 33, '0.25', 300, '0.38', 600, '0.59', 100, '0.75', 1, '2020-09-19 13:23:24', '2021-04-01 17:47:17'),
(4, 'VIP', 'VIP', 850, 1080, 150, 105, 750000, 535, '0.63', 450, '0.42', 45, '0.30', 315, '0.37', 630, '0.58', 105, '0.70', 1, '2020-09-19 13:27:10', '2021-04-01 17:47:20'),
(5, 'VIP COBAy', 'VICOBx', 2, 3, 4, 5, 6, 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 0, '0.00', 1, '2021-04-01 17:47:51', '2021-04-01 17:48:07');

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
(1, 'USD', 1, '2021-04-08 02:13:01', '2021-04-08 02:13:01'),
(2, 'AUD', 1, '2021-04-08 02:13:11', '2021-04-08 02:13:11'),
(3, 'PAYPAL', 1, '2021-04-08 02:13:25', '2021-04-08 02:13:25'),
(4, 'BCA$', 1, '2021-04-08 02:13:36', '2021-04-08 02:13:36'),
(5, 'RP', 1, '2021-04-08 02:13:46', '2021-04-08 02:13:46'),
(6, 'CC BCA', 1, '2021-04-08 02:13:54', '2021-04-08 02:13:54'),
(7, 'CC MDR', 1, '2021-04-08 02:14:00', '2021-04-08 02:14:00'),
(8, 'CC BNI', 1, '2021-04-08 12:18:00', '2021-04-08 12:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `t30_tamu`
--

CREATE TABLE `t30_tamu` (
  `idtamu` int(11) NOT NULL,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `MFC` varchar(1) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `PackageNight` varchar(5) NOT NULL,
  `PackageType` varchar(3) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Agent` varchar(50) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `DaysStay` tinyint(4) NOT NULL,
  `Price` double NOT NULL DEFAULT 0,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t30_tamu`
--

INSERT INTO `t30_tamu` (`idtamu`, `TripNo`, `TripTgl`, `Nama`, `MFC`, `Country`, `PackageNight`, `PackageType`, `CheckIn`, `CheckOut`, `Agent`, `Status`, `DaysStay`, `Price`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'T-43', '2020-12-26', 'Maulana', 'F', 'ID', '9N', 'SUP', '2020-12-26', '2020-12-26', 'WS', '1', 6, 8000700, 1, '2021-04-08 03:44:11', '2021-04-08 03:44:11'),
(2, 'T-43', '2020-12-26', 'Nani', 'F', 'ID', '6N', 'SUP', '2020-12-26', '2020-12-26', 'WS', '1', 3, 9000800, 1, '2021-04-08 03:44:11', '2021-04-08 03:44:11'),
(3, 'T-43', '2020-12-26', 'Ombudsman', 'F', 'ID', '3N', 'SUP', '2020-12-26', '2020-12-26', 'WS', '1', 3, 10000900, 1, '2021-04-08 03:44:11', '2021-04-08 03:44:11'),
(4, 'T-44', '2021-04-04', 'Meilani', 'F', 'ID', '9N', 'SUP', '2021-04-04', '2021-04-13', 'WS', '1', 9, 10000800, 1, '2021-04-08 03:59:15', '2021-04-08 03:59:15'),
(5, 'T-44', '2021-04-04', 'Nina', 'F', 'ID', '6N', 'SUP', '2021-04-04', '2021-04-10', 'WS', '1', 6, 7000600, 1, '2021-04-08 03:59:15', '2021-04-08 03:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `t31_bayar`
--

CREATE TABLE `t31_bayar` (
  `idbayar` int(11) NOT NULL,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Total` double NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t31_bayar`
--

INSERT INTO `t31_bayar` (`idbayar`, `TripNo`, `TripTgl`, `Total`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'T-43', '2020-12-26', 0, 1, '2021-04-08 10:31:53', '2021-04-08 10:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `t32_bayard`
--

CREATE TABLE `t32_bayard` (
  `idbayard` int(11) NOT NULL,
  `idbayar` int(11) NOT NULL,
  `tamu` int(11) NOT NULL,
  `pt_ci` int(4) NOT NULL,
  `kurs_usd_ci` double NOT NULL DEFAULT 0,
  `kurs_aud_ci` double NOT NULL DEFAULT 0,
  `usd_ci` double NOT NULL DEFAULT 0,
  `aud_ci` double NOT NULL DEFAULT 0,
  `paypal_ci` double NOT NULL DEFAULT 0,
  `bca_d_ci` double NOT NULL DEFAULT 0,
  `rp_ci` double NOT NULL DEFAULT 0,
  `cc_bca_ci` double NOT NULL DEFAULT 0,
  `cc_mdr_ci` double NOT NULL DEFAULT 0,
  `tot_rp_ci` double NOT NULL DEFAULT 0,
  `slsh_ci` double NOT NULL DEFAULT 0,
  `slsh_blm_ci` double NOT NULL DEFAULT 0,
  `slsh_krg_ci` double NOT NULL DEFAULT 0,
  `slsh_disc_ci` double NOT NULL DEFAULT 0,
  `slsh_chrg_ci` double NOT NULL DEFAULT 0,
  `slsh_kurs_ci` double NOT NULL DEFAULT 0,
  `sha_inc_piw` double NOT NULL DEFAULT 0,
  `sha_inc_ssw` double NOT NULL DEFAULT 0,
  `paid_by` int(11) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t32_bayard`
--

INSERT INTO `t32_bayard` (`idbayard`, `idbayar`, `tamu`, `pt_ci`, `kurs_usd_ci`, `kurs_aud_ci`, `usd_ci`, `aud_ci`, `paypal_ci`, `bca_d_ci`, `rp_ci`, `cc_bca_ci`, `cc_mdr_ci`, `tot_rp_ci`, `slsh_ci`, `slsh_blm_ci`, `slsh_krg_ci`, `slsh_disc_ci`, `slsh_chrg_ci`, `slsh_kurs_ci`, `sha_inc_piw`, `sha_inc_ssw`, `paid_by`, `idusers`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 4, 13801, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-08 10:57:37', '2021-04-08 13:29:19'),
(8, 1, 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-08 10:57:37', '2021-04-08 10:57:37'),
(9, 1, 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-08 10:57:37', '2021-04-08 13:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `t33_bayard2`
--

CREATE TABLE `t33_bayard2` (
  `idbayard2` int(11) NOT NULL,
  `idbayard` int(11) NOT NULL,
  `idtop` tinyint(4) NOT NULL,
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
-- Indexes for table `t33_bayard2`
--
ALTER TABLE `t33_bayard2`
  ADD PRIMARY KEY (`idbayard2`);

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
  MODIFY `idtop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t30_tamu`
--
ALTER TABLE `t30_tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t31_bayar`
--
ALTER TABLE `t31_bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t32_bayard`
--
ALTER TABLE `t32_bayard`
  MODIFY `idbayard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t33_bayard2`
--
ALTER TABLE `t33_bayard2`
  MODIFY `idbayard2` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
