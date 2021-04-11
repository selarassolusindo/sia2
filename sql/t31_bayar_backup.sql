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
-- Table structure for table `t31_bayar_backup`
--

CREATE TABLE `t31_bayar_backup` (
  `idbayar` int(11) NOT NULL,
  `TripNo` varchar(10) NOT NULL,
  `TripTgl` date NOT NULL,
  `Total` double NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t31_bayar_backup`
--

INSERT INTO `t31_bayar_backup` (`idbayar`, `TripNo`, `TripTgl`, `Total`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'T-43', '2020-12-26', 0, 0, '2021-04-08 10:31:53', '2021-04-09 13:49:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t31_bayar_backup`
--
ALTER TABLE `t31_bayar_backup`
  ADD PRIMARY KEY (`idbayar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t31_bayar_backup`
--
ALTER TABLE `t31_bayar_backup`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
