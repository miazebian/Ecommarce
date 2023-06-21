-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2022 at 10:26 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommarce`
--
CREATE DATABASE IF NOT EXISTS `ecommarce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecommarce`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `number` int(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`email`),
  UNIQUE KEY `UNIQUE1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `id`, `email`, `password`, `number`, `dob`) VALUES
('admin', 1, 'none', '1234', NULL, NULL),
('MIAAAA', 3, 'najwan@gmail.com', 'MIa123!', NULL, NULL),
('NAJA', 4, 'najwafen@gmail.com', 'MIa1234!', NULL, NULL),
('vdcx z', 5, 'najwsdn@gmail.com', 'brbrbrb', NULL, NULL),
('najaaans', 6, 'najwkhbhafen@gmail.com', 'nfjdfdvf', NULL, NULL),
('hadi', 7, 'hadi@gmail.com', 'dddddddd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `nameA` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nameA`,`username`),
  KEY `Foriegn` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`nameA`, `username`, `country`, `city`, `description`, `phone`, `email`) VALUES
('home', 'MIAAAA', 'Austria', 'Beruit', 'beirut, Lebanon', 70647026, 'csc@gmail.com'),
('home3', 'MIAAAA', 'Cambodia', 'beirut', 'beirut, Lebanon', 70647026, 'csc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `meassge` varchar(1000) NOT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactID`, `name`, `email`, `meassge`) VALUES
(1, 'mia', 'najwan@gmail.com', 'FVEWSADVGF'),
(12, 'grg', 'najwsdn@gmail.com', 'dvvdvdvdv'),
(13, 'xscsc', 'csc@gmail.com', 'getrggrgr'),
(14, 'hadi', 'aaaaaaa@gmail.com', 'aaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Validtill` date NOT NULL,
  `Discount` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`code`, `name`, `Validtill`, `Discount`) VALUES
('', 'ajax', '2022-12-23', 10);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`email`) VALUES
('najwafen@gmail.com'),
('najwan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `productD` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `foriegn2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `productD`, `username`, `quantity`) VALUES
(1, 25, 'MIAAAA', 1),
(2, 21, 'MIAAAA', 1),
(3, 14, 'MIAAAA', 1),
(4, 16, 'MIAAAA', 1),
(5, 25, 'najaaans', 1),
(6, 21, 'najaaans', 1),
(7, 22, 'hadi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cardinfo` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  PRIMARY KEY (`paymentID`) USING BTREE,
  KEY `foriegn5` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `username`, `address`, `cardinfo`, `price`) VALUES
(15, 'MIAAAA', 'mfmf', 'card name name card number 5500 0000 0000 0004 expiry year 4 2022 zip code 8451', 49),
(16, 'MIAAAA', 'home', 'card name mia card number 5500 0000 0000 0004 expiry year 4 2023 zip code 0000', 49),
(17, 'MIAAAA', 'work', 'card name name card number 5500 0000 0000 0004 expiry year 5 2002 zip code 0000', 49),
(18, 'MIAAAA', 'home2', 'card name mamm card number 5500 0000 0000 0004 expiry year 3 2022 zip code 0000', 49),
(19, 'MIAAAA', 'home3', 'card name name card number 5500 0000 0000 0004 expiry year 5 2022 zip code 0000', 49),
(20, 'najaaans', 'BEIRUT', '1111111', 50),
(21, 'hadi', 'aaaaaaaaaa', '1111111111111111111', 27);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int(254) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `category`, `description`, `price`, `img`) VALUES
(16, 'skirt', 'women', NULL, 20, '/img/photo-5.jpg'),
(21, 'purple skirt', 'women', NULL, 50, '/img/photo-1.jpg'),
(22, 'mango skirt', 'women', NULL, 27, '/img/photo-0.jpg'),
(23, 'hadis style', 'men', 'hadi', 100, '/img/photo-2.jpg'),
(24, 'hadi\"s style', 'men', 'hadi\"s\r\n', 60, '/img/photo-3.jpg'),
(25, 'hello', 'kids', 'tyeb helwin', 80, '/img/photo-4.jpg'),
(26, 'aaaaaaaaaaaaaa', 'kids', NULL, 10, '/img/photo-6.jpg'),
(27, 'why', 'kids', NULL, 10, '/img/photo-7.jpg'),
(28, 'working', 'kids', NULL, 22, '/img/photo-8.jpg'),
(30, 'working girl', 'kids', NULL, 22, '/img/photo-5.jpg'),
(32, 'dana', 'women', 'photosss', 100, '/img/photo-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productssaved`
--

DROP TABLE IF EXISTS `productssaved`;
CREATE TABLE IF NOT EXISTS `productssaved` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `productD` int(11) NOT NULL,
  `forwhich` text NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `FOREIGN9` (`username`),
  KEY `FOREIGN8` (`productD`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productssaved`
--

INSERT INTO `productssaved` (`pid`, `username`, `productD`, `forwhich`) VALUES
(88, 'MIAAAA', 25, 'cart'),
(95, 'MIAAAA', 16, 'cart'),
(96, 'MIAAAA', 21, 'cart'),
(97, 'MIAAAA', 23, 'cart'),
(99, 'MIAAAA', 30, 'cart'),
(100, 'MIAAAA', 28, 'cart'),
(101, 'MIAAAA', 16, 'cart'),
(102, 'MIAAAA', 23, 'cart'),
(103, 'MIAAAA', 23, 'wish'),
(104, 'MIAAAA', 24, 'cart'),
(105, 'MIAAAA', 25, 'cart');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `Foriegn` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `foriegn2` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `foriegn5` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `productssaved`
--
ALTER TABLE `productssaved`
  ADD CONSTRAINT `FOREIGN8` FOREIGN KEY (`productD`) REFERENCES `product` (`productID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FOREIGN9` FOREIGN KEY (`username`) REFERENCES `account` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
