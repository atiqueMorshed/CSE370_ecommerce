-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2019 at 09:49 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `buy_order`
--

DROP TABLE IF EXISTS `buy_order`;
CREATE TABLE IF NOT EXISTS `buy_order` (
  `ORDER_ID` varchar(10) NOT NULL,
  `PROPERTY_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `USERNAME` varchar(10) NOT NULL,
  `ORDER_DATE` date NOT NULL,
  PRIMARY KEY (`ORDER_ID`),
  KEY `USERNAME` (`USERNAME`),
  KEY `PROPERTY_ID` (`PROPERTY_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  PRIMARY KEY (`EMP_ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=10003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `USERNAME`, `EMAIL`, `Password`, `Name`, `Address`) VALUES
(10002, 'ArrowX17', 'iamsamix17@gmail.com', 'aaaaaaaaaa', 'Atique Morshed', '69 Mohakhali, Dhaka');

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
-- Table structure for table `preproperty`
--

DROP TABLE IF EXISTS `preproperty`;
CREATE TABLE IF NOT EXISTS `preproperty` (
  `PRE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(10) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `washroom` int(11) NOT NULL,
  `balcony` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`PRE_ID`,`USERNAME`),
  KEY `USERNAME` (`USERNAME`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `PROPERTY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_ID` int(11) NOT NULL,
  `PROPERTY_NAME` varchar(100) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BEDROOM` int(11) NOT NULL,
  `WASHROOM` int(11) NOT NULL,
  `BALCONY` int(11) DEFAULT NULL,
  `SIZE` int(11) NOT NULL,
  `LOCATION` varchar(200) NOT NULL,
  PRIMARY KEY (`PROPERTY_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `USERNAME` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `PHONE` int(10) NOT NULL,
  PRIMARY KEY (`USERNAME`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `PHONE` (`PHONE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `Password`, `EMAIL`, `Name`, `ADDRESS`, `PHONE`) VALUES
('aaaaaa', '$2y$10$aediQi48CAjcxQ8QwvMWV.UX0G1hl6DVJ2KV2riWueHTnyZenZ17S', 'a@a.com', 'a', 'a', 1787451364),
('ArrowX17', '$2y$10$oJZ9cjOtHgQjFf0JsRFzr.CIX2J8sozXrE3pJKojHDHLofhXQX6dC', 'iamsamix17@gmail.com', 'Atique Morshed Sami', 'Dhaka', 1778752909),
('dedadeda', '$2y$10$O5EOnQi/VYum8TJ4rKs1t.quy4mWODJOZivOsZLZ6wU.1bfLvjk8C', 'ddd@d.com', 'ddd', 'd', 1554725398),
('Demo01', 'demo', 'demo@d.com', 'Demo Guy', 'DDD', 1768595206),
('Demo02', '$2y$10$wIkjJ3iiOF6VsTdT6ikIcuMnMCriUbcAGSwMXG4QQ5pDTtedWYopu', 'demo@d2.com', 'Demo Guy', 'D', 2127121212),
('Demo05', '$2y$10$ZunaDU1EFHL6shLZ/L6miOHkOeGZEVHWrYikmjdQCGQbx1nUMwcy6', 'demo@d5.com', 'Demo Guy', 'dd', 1784521365);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy_order`
--
ALTER TABLE `buy_order`
  ADD CONSTRAINT `buy_order_ibfk_1` FOREIGN KEY (`PROPERTY_ID`) REFERENCES `property` (`PROPERTY_ID`),
  ADD CONSTRAINT `buy_order_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`),
  ADD CONSTRAINT `buy_order_ibfk_3` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `buy_order` (`ORDER_ID`);

--
-- Constraints for table `preproperty`
--
ALTER TABLE `preproperty`
  ADD CONSTRAINT `preproperty_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`),
  ADD CONSTRAINT `preproperty_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;