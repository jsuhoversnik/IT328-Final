-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2019 at 04:00 PM
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
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `type` varchar(255) DEFAULT NULL,
  `partName` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `partSet` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`type`, `partName`, `price`, `performance`, `partSet`) VALUES
('cpu', 'Intel Core i9-9960X', 1699, 30641, 1),
('mobo', 'MSI MEG X299 CREATION', 599, 0, 1),
('gpu', 'Gefore RTX 2080 TI', 1069, 17018, 0),
('ssd', 'Samsung 860 EVO 500GB', 75, 500, 0),
('ssd', 'Samsung 860 EVO 1TB', 148, 1000, 0),
('ssd', 'Samsung 860 EVO 250GB', 58, 250, 0),
('hdd', 'Seagate Barracuda 2TB', 60, 2000, 0),
('hdd', 'Seagate Barracuda 500GB', 40, 500, 0),
('hdd', 'Seagate Barracuda 1TB', 45, 1000, 0),
('hdd', 'Seagate Barracuda 3TB', 85, 3000, 0),
('ram', 'G.Skill DDR4 3200 16GB', 109, 1632, 0),
('ram', 'G.Skill DDR4 3200 8GB', 74, 832, 0),
('ram', 'G.Skill DDR4 3200 32GB', 219, 3232, 0),
('ram', 'G.Skill DDR4 3200 64GB', 429, 5500, 0),
('cpu', 'Intel Core i3 7100 ', 110, 5780, 2),
('mobo', 'ASUS EX-B250M-V3', 70, NULL, 2),
('ram', 'Kingston low voltage 4GB DDR4 2400 (KVR24N17S8/4)', 80, 115, NULL),
('hdd', 'Western Digital Blue 1TB 7200rpm 64MB sata3 (WD10EZEX)', 40, NULL, NULL),
('cpu', 'Intel Core i5 8400', 180, 11628, 3),
('mobo', 'ASUS PRIME B250M-PLUS', 80, NULL, 3),
('ram', 'Corsair 16GB DDR4 2133 (CMV16GX4M1A2133C15)', 100, 1566, NULL),
('hdd', 'Western Digital 1TB 7200 to 64MB SATA3 Blue Disk (WD10EZEX)', 50, NULL, NULL),
('ssd', 'Toshiba TR200 (240GB)', 70, NULL, NULL),
('gpu', 'ASUS DUAL-GTX 1050Ti-4G', 180, 5999, NULL),
('cpu', 'AMD Ryzen 3 1200', 110, 6741, 4),
('gpu', 'Sapphire R9 290X 4G GDDR5 Platinum Edition OC', 480, 7432, NULL),
('mobo', 'MSI B350M PRO-VDH', 80, NULL, 4),
('hdd', 'Western Digital 500GB 7200 to 16MB SATA3 Blue Disk (WD5000AAKX)', 30, NULL, NULL),
('ssd', 'GALAXY Iron Armor (120GB)', 50, NULL, NULL),
('gpu', 'Sapphire RX 460 4G D5 Super Platinum OC', 120, 4329, NULL),
('cpu', 'Intel Core i5-8500', 190, 12639, 5),
('mobo', 'ASUS TUF B360M-PLUS GAMING', 80, NULL, 5),
('ram', 'Kingston Fury series DDR4 2400 16G memory', 130, 1809, NULL),
('gpu', 'Dylan DEVIL RX590 8G', 260, 9402, NULL),
('cpu', 'Intel Core i7-8700K', 350, 15969, 6),
('mobo', 'MSI Z370 TOMAHAWK Tomahawk missile motherboard', 180, NULL, 6),
('ram', 'American Pirate Ship Avengers LPX DDR4 3000 8GB Memory', 100, 1606, NULL),
('ssd', 'Samsung PM961 256G M.2 NVMe Solid State Drive', 90, NULL, NULL),
('hdd', 'Seagate (ST) 2TB 7200 to 64M mechanical hard drive', 60, NULL, NULL),
('gpu', 'MSI GTX 1080 Ti DUKE 11G Dark Dragon', 1000, 14220, NULL),
('cpu', 'Intel Pentium G4500', 70, 3799, 7),
('mobo', 'Gigabyte H110M-DS2V motherboard', 80, NULL, 7),
('ram', 'Kingston DDR4 2133 8G', 60, 610, NULL),
('ssd', 'Kingston UV400 Series 120G', 40, NULL, NULL),
('cpu', 'AMD Ryzen 5 2600', 180, 13548, 8),
('mobo', 'ASUS PRIME B450M-A motherboard', 100, NULL, 8),
('ram', 'Kingston hacker god 8g ddr4 2400', 60, 614, NULL),
('ssd', 'Western Digital Green Series 240G M.2 Solid State Drive', 30, NULL, NULL),
('gpu', 'Sapphire RX590 8G D5 Super Platinum OC', 300, 9402, NULL),
('mobo', 'ASUS PRIME Z370-P motherboard', 180, NULL, 8),
('ram', 'Kingston hacker gods Fury series DDR4 2400 16G memory', 240, 4511, NULL),
('ssd', 'Samsung 960 EVO 250G M.2 NVMe Solid State Drive', 110, NULL, NULL),
('cpu', 'Intel Core-i3 8100', 110, 8431, 10),
('gpu', 'Leadtek Quadro P2000 5GB GDDR5', 300, 7402, NULL),
('mobo', 'GALAXY B360M-M.2 motherboard', 60, NULL, 10),
('ram', 'Awesome red 8G DDR4 2400 memory ', 50, 575, NULL),
('ssd', 'Electrode light series A750 256G\r\n', 30, NULL, NULL),
('cpu', 'AMD Ryzen 5 2400g', 180, 9290, 11),
('mobo', 'ASRock B450M Pro4 motherboard', 80, NULL, 11),
('ram', 'Kingston 8G DDR4 2400 memory ', 70, 780, NULL),
('ssd', 'Taipower NP800 Phantom Series NVMe 240GB M.2 SSD', 80, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`partName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
