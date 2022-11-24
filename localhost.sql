-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2022 at 07:03 AM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vysoxnyu_billing_retail`
--
CREATE DATABASE IF NOT EXISTS `vysoxnyu_billing_retail` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vysoxnyu_billing_retail`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(255) NOT NULL,
  `barcode` text DEFAULT NULL,
  `datereg` text DEFAULT NULL,
  `productname` varchar(255) NOT NULL,
  `rate` int(255) NOT NULL,
  `qty` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `barcode`, `datereg`, `productname`, `rate`, `qty`) VALUES
(1, '8905151311390', '28/08/2022', 'Watch', 2500, 1),
(2, '57638469245', '28/08/2022', 'coffee', 100, 1),
(3, '213214432', '31/08/2022', 'phone', 1000, 1),
(5, '51045553', '12/09/2022', 'Tea', 200, 0),
(7, '517940503182238', '13/09/2022', 'Juice', 699, 0),
(12, '173314', '13/09/2022', 'Yashvendra', 699, 0),
(13, '772474916150071', '14/09/2022', 'Harshit', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `sno` int(200) NOT NULL,
  `name` varchar(600) NOT NULL,
  `rate` varchar(666) NOT NULL,
  `code` varchar(2000) NOT NULL,
  `qty` varchar(400) NOT NULL,
  `total` varchar(666) NOT NULL,
  `date` varchar(600) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`sno`, `name`, `rate`, `code`, `qty`, `total`, `date`) VALUES
(47, 'Yashvendra', '699', '173314', '2', '1398', '2022-09-15 15:12:29'),
(48, 'Yashvendra', '699', '173314', '2', '1398', '2022-09-15 15:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(255) NOT NULL,
  `sno` int(100) NOT NULL,
  `rate` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sno`, `rate`, `product`, `qty`, `amount`, `code`) VALUES
(642, 1, 100, 'coffee', 1, 100, '57638469245');

-- --------------------------------------------------------

--
-- Table structure for table `savesales`
--

CREATE TABLE `savesales` (
  `invoice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savesales`
--

INSERT INTO `savesales` (`invoice`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46);

-- --------------------------------------------------------

--
-- Table structure for table `totalamount`
--

CREATE TABLE `totalamount` (
  `id` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totalamount`
--
ALTER TABLE `totalamount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

--
-- AUTO_INCREMENT for table `totalamount`
--
ALTER TABLE `totalamount`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
