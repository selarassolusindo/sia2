-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2021 at 11:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

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
-- Table structure for table `t32_bayard_backup`
--

CREATE TABLE `t32_bayard_backup` (
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
-- Dumping data for table `t32_bayard_backup`
--

INSERT INTO `t32_bayard_backup` (`idbayard`, `idbayar`, `tamu`, `pt_ci`, `kurs_usd_ci`, `kurs_aud_ci`, `usd_ci`, `aud_ci`, `paypal_ci`, `bca_d_ci`, `rp_ci`, `cc_bca_ci`, `cc_mdr_ci`, `tot_rp_ci`, `slsh_ci`, `slsh_blm_ci`, `slsh_krg_ci`, `slsh_disc_ci`, `slsh_chrg_ci`, `slsh_kurs_ci`, `sha_inc_piw`, `sha_inc_ssw`, `paid_by`, `idusers`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 4, 13800, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-08 10:57:37', '2021-04-09 13:49:52'),
(8, 1, 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2021-04-08 10:57:37', '2021-04-09 10:55:55'),
(9, 1, 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2021-04-08 10:57:37', '2021-04-09 10:55:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t32_bayard_backup`
--
ALTER TABLE `t32_bayard_backup`
  ADD PRIMARY KEY (`idbayard`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t32_bayard_backup`
--
ALTER TABLE `t32_bayard_backup`
  MODIFY `idbayard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
