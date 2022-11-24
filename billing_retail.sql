-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 05:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_retail`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(255) NOT NULL,
  `barcode` text DEFAULT NULL,
  `productname` varchar(255) NOT NULL,
  `anothername` varchar(255) DEFAULT NULL,
  `datereg` text DEFAULT NULL,
  `measure` varchar(255) NOT NULL,
  `weightunit` varchar(255) DEFAULT NULL,
  `weightvalue` double NOT NULL,
  `sizevalue` varchar(255) DEFAULT NULL,
  `piecesvalue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `barcode`, `productname`, `anothername`, `datereg`, `measure`, `weightunit`, `weightvalue`, `sizevalue`, `piecesvalue`) VALUES
(1, '10000000', 'test', '', '18/9/2022', 'weight', 'kilogram', 1.5, '', 0),
(2, '10000001', 'we', 'wewe', '18/09/2022', 'weight', 'kilogram', 1, '', 0),
(3, '10000001', 'weed', 'rtw', '18/09/2022', 'weight', 'gram', 25, '', 0),
(4, '10000002', 'weed', 'rtw', '18/09/2022', 'weight', 'gram', 25, '', 0),
(6, '10000001', 'wer', 're', '18/09/2022', 'size', '', 0, 'm', 0),
(7, '10000002', 'wer', 're', '18/09/2022', 'size', '', 0, 'm', 0),
(8, '10000003', 'wer', 're', '18/09/2022', 'size', '', 0, 'm', 0),
(9, '10000004', 'wqe', 'fdd', '18/09/2022', 'pieces', '', 0, '', 4),
(10, '10000005', 'chips', 'chips', '24/09/2022', 'weight', 'gram', 100, NULL, 0);

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
  `qty` int(255) NOT NULL DEFAULT 1,
  `anothername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `barcode`, `datereg`, `productname`, `rate`, `qty`, `anothername`) VALUES
(1, '890515131139', '28/08/2022', 'watch', 2400, 1, ''),
(3, '213214432', '31/08/2022', 'phone', 1000, 1, ''),
(5, '51045553', '12/09/2022', 'Tea', 200, 20, ''),
(7, '517940503182238', '13/09/2022', 'Juice', 699, 1, ''),
(14, '95616182256', '20/09/2022', 'coffee', 15, 1, ''),
(15, '325531415', '24/09/2022', 'rice', 45, 1, 'r'),
(16, '24543234532', '24/09/2022', 'chocolate', 10, 1, 'chococ'),
(17, '10000005', '24/09/2022', 'chips', 10, 1, 'chips');

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
(75, 'chocolate', '10', '24543234532', '3', '30', '2022-09-24 22:30'),
(48, 'Yashvendra', '699', '173314', '2', '1398', '2022-09-15 15:12:29'),
(52, 'Harshit', '22', '772474916150071', '1', '22', '2022-09-20 16:41'),
(50, 'phone', '1000', '213214432', '4', '4000', '2022-09-20 16:36'),
(80, 'phone', '1000', '213214432', '2', '2000', '2022-09-24 22:58'),
(78, 'phone', '1000', '213214432', '4', '4000', '2022-09-24 22:30'),
(79, 'phone', '1000', '213214432', '2', '2000', '2022-09-24 22:58'),
(57, 'fffff', '21', '956161822562551', '10', '210', '2022-09-20 16:49'),
(58, 'Juice', '699', '517940503182238', '3', '2097', '2022-09-20 16:49'),
(76, 'phone', '1000', '213214432', '4', '4000', '2022-09-24 22:30'),
(77, 'chocolate', '10', '24543234532', '3', '30', '2022-09-24 22:30'),
(61, 'coffee', '100', '57638469245', '1', '100', '2022-09-20 16:49'),
(62, 'Harshit', '22', '772474916150071', '1', '22', '2022-09-20 16:49'),
(81, 'watch', '2400', '890515131139', '1', '2400', '2022-10-02 17:49'),
(64, 'fffff', '21', '956161822562551', '7', '147', '2022-09-20 16:52'),
(82, 'watch', '2400', '890515131139', '1', '2400', '2022-10-02 17:49'),
(66, 'coffee', '100', '57638469245', '2', '200', '2022-09-24 19:02'),
(83, 'watch', '2400', '890515131139', '1', '2400', '2022-10-02 17:51'),
(84, 'watch', '2400', '890515131139', '1', '2400', '2022-10-02 17:51'),
(69, 'Watch', '2500', '8905151311390', '1', '2500', '2022-09-24 19:02'),
(70, 'phone', '1000', '213214432', '2', '2000', '2022-09-24 19:02'),
(73, 'Watch', '2500', '8905151311390', '1', '2500', '2022-09-24 19:09'),
(74, 'phone', '1000', '213214432', '1', '1000', '2022-09-24 19:09');

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
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58);

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
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=716;

--
-- AUTO_INCREMENT for table `totalamount`
--
ALTER TABLE `totalamount`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
