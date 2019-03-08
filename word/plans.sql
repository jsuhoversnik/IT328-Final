-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2019 at 04:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsuhover_grc`
--

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `planNumber` int(11) NOT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `motherboard` varchar(255) DEFAULT NULL,
  `gpu` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `ssd` varchar(255) DEFAULT NULL,
  `hdd` varchar(255) DEFAULT NULL,
  `power` int(11) DEFAULT NULL,
  `monitor` int(11) DEFAULT NULL,
  `computerCase` int(11) DEFAULT NULL,
  `other` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`planNumber`, `cpu`, `motherboard`, `gpu`, `ram`, `ssd`, `hdd`, `power`, `monitor`, `computerCase`, `other`) VALUES
(1, 'AMD Ryzen 3 1200', 'MSI B350M PRO-VDH', 'Sapphire RX 460 4G D5 Super Platinum OC', 'G.Skill DDR4 3200 8GB', NULL, 'Western Digital 500GB 7200 to 16MB SATA3 Blue Disk (WD5000AAKX)', 30, 100, 70, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`planNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `planNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
