-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2019 at 10:36 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_buy`
--
CREATE DATABASE IF NOT EXISTS `house_buy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `house_buy`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ADMIN_ID` varchar(10) NOT NULL,
  `EMP_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`),
  UNIQUE KEY `EMP_ID_2` (`EMP_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `AGENT_ID` varchar(10) NOT NULL,
  `EMP_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`AGENT_ID`),
  UNIQUE KEY `EMP_ID_2` (`EMP_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
CREATE TABLE IF NOT EXISTS `apartment` (
  `APARTMENT_NO` int(11) NOT NULL,
  `PROPERTY_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`APARTMENT_NO`),
  UNIQUE KEY `PROPERTY_ID_2` (`PROPERTY_ID`),
  KEY `PROPERTY_ID` (`PROPERTY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buy_order`
--

DROP TABLE IF EXISTS `buy_order`;
CREATE TABLE IF NOT EXISTS `buy_order` (
  `ORDER_ID` varchar(10) NOT NULL,
  `USERNAME` varchar(10) NOT NULL,
  `PROPERTY_ID` varchar(10) NOT NULL,
  `ORDER_DATE` date NOT NULL,
  PRIMARY KEY (`ORDER_ID`),
  KEY `USERNAME` (`USERNAME`),
  KEY `PROPERTY_ID` (`PROPERTY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CART_ID` varchar(10) NOT NULL,
  `ORDER_ID` varchar(10) NOT NULL,
  `PROPERTY_ID` varchar(10) NOT NULL,
  `NO_PRODUCTS` int(11) NOT NULL,
  `TOTAL PRICE` int(11) NOT NULL,
  PRIMARY KEY (`CART_ID`),
  KEY `ORDER_ID` (`ORDER_ID`),
  KEY `PROPERTY_ID` (`PROPERTY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EMP_ID` varchar(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `PHONE` int(10) NOT NULL,
  PRIMARY KEY (`EMP_ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `PHONE` (`PHONE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `EMAIL`, `Name`, `Address`, `PHONE`) VALUES
('5431487953', 'rahim@gmail.com', 'RAHIM', 'MOHAKHALI', 1795236954);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `MANAGER_ID` varchar(10) NOT NULL,
  `EMP_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`MANAGER_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PAYMENT_ID` varchar(10) NOT NULL,
  `ORDER_ID` varchar(10) NOT NULL,
  `Customer_name` varchar(100) NOT NULL,
  `BILL_DATE` date NOT NULL,
  `PAYMENT_METHOD` varchar(20) NOT NULL,
  PRIMARY KEY (`PAYMENT_ID`),
  KEY `ORDER_ID` (`ORDER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `PROPERTY_ID` varchar(10) NOT NULL,
  `AGENT_ID` varchar(10) NOT NULL,
  `PROPERTY_NAME` varchar(100) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BEDROOM` int(11) NOT NULL,
  `WASHROOM` int(11) NOT NULL,
  `BALCONY` int(11) DEFAULT NULL,
  `SIZE` int(11) NOT NULL,
  `LOCATION` varchar(200) NOT NULL,
  PRIMARY KEY (`PROPERTY_ID`),
  KEY `AGENT_ID` (`AGENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `USERNAME` varchar(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `PHONE` int(10) NOT NULL,
  PRIMARY KEY (`USERNAME`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `PHONE` (`PHONE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

DROP TABLE IF EXISTS `villa`;
CREATE TABLE IF NOT EXISTS `villa` (
  `PROPERTY_ID` varchar(10) NOT NULL,
  `POOL` int(11) NOT NULL,
  `GYM` int(11) NOT NULL,
  `GARDEN` int(11) NOT NULL,
  `PARKING_CAP` int(11) NOT NULL,
  KEY `PROPERTY_ID` (`PROPERTY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`PROPERTY_ID`) REFERENCES `property` (`PROPERTY_ID`);

--
-- Constraints for table `buy_order`
--
ALTER TABLE `buy_order`
  ADD CONSTRAINT `buy_order_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`),
  ADD CONSTRAINT `buy_order_ibfk_2` FOREIGN KEY (`PROPERTY_ID`) REFERENCES `property` (`PROPERTY_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`PROPERTY_ID`) REFERENCES `property` (`PROPERTY_ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `buy_order` (`ORDER_ID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `buy_order` (`ORDER_ID`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`AGENT_ID`) REFERENCES `agent` (`AGENT_ID`);

--
-- Constraints for table `villa`
--
ALTER TABLE `villa`
  ADD CONSTRAINT `villa_ibfk_1` FOREIGN KEY (`PROPERTY_ID`) REFERENCES `property` (`PROPERTY_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
