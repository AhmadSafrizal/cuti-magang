-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 03:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `lokasi`, `status`, `keterangan`) VALUES
(1, 'Biodiesel', 'Tampil', 'Proyek biodiesel'),
(2, 'Jetty 1', 'Tampil', 'proyek jeety 1 adalah proyek yang dikerjakan oleh wrk sjiwjo deidoiw'),
(3, 'Jetty 2', 'Tampil', NULL),
(4, 'Tanki 6x5000', 'Tampil', NULL),
(5, 'Migor', 'Tampil', NULL),
(6, 'Bunati', 'Tampil', NULL),
(7, 'Setangga & Serongga', 'Tampil', 'Setangga Coal Terminal 2x12 MTPY'),
(8, 'Bankirai Onground', 'Tampil', NULL),
(9, 'PKS Kotabaru', 'Tampil', NULL),
(10, 'CCSP', 'Tampil', NULL),
(11, 'Kuranji', 'Tampil', NULL),
(12, 'Guest House Kuranji', 'Tampil', NULL),
(13, 'gyjythj', 'Hide', NULL),
(14, 'kiukuik', 'Hide', NULL),
(15, 'yiyu', 'Hide', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
