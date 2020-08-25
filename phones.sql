-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 05:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phones`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbl_brand`
--

CREATE TABLE `dbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbl_brand`
--

INSERT INTO `dbl_brand` (`brandId`, `brandName`) VALUES
(1, 'APPLE'),
(2, 'SAMSUNG'),
(5, 'LG'),
(10, 'ALCATEL');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_cart`
--

CREATE TABLE `dbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbl_cart`
--

INSERT INTO `dbl_cart` (`cartId`, `sId`, `productId`, `productName`, `quantity`, `image`, `price`) VALUES
(3, '', 24, 'Iphone', 8, 'upload/29420de950.jpg', 150),
(6, '', 24, 'Iphone', 8, 'upload/29420de950.jpg', 150),
(7, '', 24, 'Iphone', 8, 'upload/29420de950.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `dbl_category`
--

CREATE TABLE `dbl_category` (
  `catid` int(11) NOT NULL,
  `categoryName` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbl_category`
--

INSERT INTO `dbl_category` (`catid`, `categoryName`) VALUES
(2, 'Iphone12'),
(3, 'Iphone8'),
(9, 'Iphone10'),
(10, 'Iphone6'),
(11, 'Iphone7'),
(14, 'Samsung11'),
(15, 'LG G8');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_customer`
--

CREATE TABLE `dbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `pass` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbl_customer`
--

INSERT INTO `dbl_customer` (`id`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `pass`) VALUES
(1, 'Marko Kostic', 'Belgrade', '11000', 'marko123@gmail.com', 'Bilecka', 'Serbia', '0613412821', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_product`
--

CREATE TABLE `dbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbl_product`
--

INSERT INTO `dbl_product` (`productId`, `productName`, `catid`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(18, 'Iphone', 2, 1, 'Iphone', 145.00, 'upload/89b881d173.jpg', 0),
(23, 'Iphone', 10, 1, 'Best phone', 121.00, 'upload/20e078898d.webp', 1),
(24, 'Iphone', 9, 1, 'Best sellers', 150.00, 'upload/29420de950.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbl_brand`
--
ALTER TABLE `dbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `dbl_cart`
--
ALTER TABLE `dbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `dbl_category`
--
ALTER TABLE `dbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `dbl_customer`
--
ALTER TABLE `dbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbl_product`
--
ALTER TABLE `dbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbl_brand`
--
ALTER TABLE `dbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `dbl_cart`
--
ALTER TABLE `dbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dbl_category`
--
ALTER TABLE `dbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dbl_customer`
--
ALTER TABLE `dbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dbl_product`
--
ALTER TABLE `dbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
