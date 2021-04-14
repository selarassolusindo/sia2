-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2021 at 02:26 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t30_tamu_old`
--
ALTER TABLE `t30_tamu_old`
  ADD PRIMARY KEY (`idtamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t30_tamu_old`
--
ALTER TABLE `t30_tamu_old`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
