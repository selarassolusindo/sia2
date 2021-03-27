-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2021 at 11:10 PM
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
-- Database: `db_ssw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `t99_company`
--

CREATE TABLE `t99_company` (
  `idcompany` tinyint(4) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `idusers` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t99_company`
--

INSERT INTO `t99_company` (`idcompany`, `Nama`, `Alamat`, `Kota`, `idusers`, `created_at`, `updated_at`) VALUES
(1, 'PT. SUPA SARANA WISATA', 'SURABAYA', 'SURABAYA', 1, '2021-03-23 01:15:53', '2021-03-23 01:15:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t99_company`
--
ALTER TABLE `t99_company`
  ADD PRIMARY KEY (`idcompany`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t99_company`
--
ALTER TABLE `t99_company`
  MODIFY `idcompany` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
