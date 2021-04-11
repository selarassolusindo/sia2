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
-- Table structure for table `t33_bayard2_backup`
--

CREATE TABLE `t33_bayard2_backup` (
  `idbayard2` int(11) NOT NULL,
  `idbayard` int(11) NOT NULL,
  `idtop` tinyint(4) NOT NULL,
  `Jumlah` double NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t33_bayard2_backup`
--

INSERT INTO `t33_bayard2_backup` (`idbayard2`, `idbayard`, `idtop`, `Jumlah`, `idusers`, `created_at`, `updated_at`) VALUES
(3, 9, 2, 1250, 1, '2021-04-09 10:56:10', '2021-04-09 10:56:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t33_bayard2_backup`
--
ALTER TABLE `t33_bayard2_backup`
  ADD PRIMARY KEY (`idbayard2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t33_bayard2_backup`
--
ALTER TABLE `t33_bayard2_backup`
  MODIFY `idbayard2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
