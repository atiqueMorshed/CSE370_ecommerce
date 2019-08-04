-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2019 at 09:01 AM
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
  `USERNAME` varchar(10) NOT NULL,
  `ORDER_DATE` date NOT NULL,
  PRIMARY KEY (`ORDER_ID`),
  KEY `USERNAME` (`USERNAME`),
  KEY `PROPERTY_ID` (`PROPERTY_ID`)
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
  `type` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  PRIMARY KEY (`EMP_ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `USERNAME`, `EMAIL`, `type`, `Password`, `Name`, `Address`) VALUES
(10002, 'ArrowX17', 'iamsamix17@gmail.com', 'Admin', 'aaaaaaaa', 'Atique Morshed', '69 Mohakhali, Dhaka'),
(10003, 'Sadat', 'sadat@sadat.com', 'agent', 'sadat12345', 'Sadat', 'Sadat');

-- --------------------------------------------------------

--
-- Table structure for table `preproperty`
--

DROP TABLE IF EXISTS `preproperty`;
CREATE TABLE IF NOT EXISTS `preproperty` (
  `PRE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(10) NOT NULL,
  `verify` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `washroom` int(11) NOT NULL,
  `balcony` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Image1` longblob,
  `Image2` longblob,
  `Image3` longblob,
  `Image4` longblob,
  `Image5` longblob,
  `floor1` longblob,
  `floor2` longblob,
  `floor3` longblob,
  `floor4` longblob,
  `floor5` longblob,
  PRIMARY KEY (`PRE_ID`,`USERNAME`),
  KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preproperty`
--

INSERT INTO `preproperty` (`PRE_ID`, `USERNAME`, `verify`, `bedroom`, `washroom`, `balcony`, `size`, `street`, `city`, `area`, `Description`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `floor1`, `floor2`, `floor3`, `floor4`, `floor5`) VALUES
(4, 'ArrowX17', 1, 2, 2, 2, 1, 'wada', 'dd', 'dd', 'wdswadwdadw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'abudada', 0, 2, 3, 4, 1, 'dd', 'Dhaka', 'Dhaka', 'aaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'ArrowX17', 0, 1, 2, 3, 6, 'Sadat', 'Sadat', 'Sadat', 'Sadat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'ArrowX17', 0, 2, 1, 1, 1, '338 Elephant Road, Dhaka', 'Rangpur', 'a', 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ArrowX17', 0, 2, 3, 4, 1, '11', 'Dhaka', 'Banani', 'aaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `PROPERTY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_ID` int(11) NOT NULL,
  `USERNAME` varchar(10) NOT NULL,
  `PROPERTY_NAME` varchar(100) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BEDROOM` int(11) NOT NULL,
  `WASHROOM` int(11) NOT NULL,
  `BALCONY` int(11) DEFAULT NULL,
  `SIZE` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Image1` longblob,
  `Image2` longblob,
  `Image3` longblob,
  `Image4` longblob,
  `Image5` longblob,
  `floor1` longblob,
  `floor2` longblob,
  `floor3` longblob,
  `floor4` longblob,
  `floor5` longblob,
  PRIMARY KEY (`PROPERTY_ID`),
  KEY `EMP_ID` (`EMP_ID`),
  KEY `USERNAME` (`USERNAME`)
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
  PRIMARY KEY (`USERNAME`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `Password`, `EMAIL`, `Name`, `ADDRESS`) VALUES
('abudada', '$2y$10$oIUN2l.QhgQmom.wa3QkXOI371wR13hOfNq2DBNVlx0K0mdIWXjKi', 'abu@sadat.com', 'Sadat', 'Dhaka'),
('ArrowX17', '$2y$10$TISDyaGGqbijR/QwMqofx.XwVi8goR1BE/QFP24RdM7j2qj/.YCX.', 'iamsamix17@gmail.com', 'Atique Morshed Sami', 'Dhaka'),
('Rahimm', '$2y$10$CG5K4wAJ4dkYhTR4cJgMWe6365f9b8w4/UoM4cA1O7iXyJy2eJlFy', 'r@r.com', 'Rahim', 'AAA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy_order`
--
ALTER TABLE `buy_order`
  ADD CONSTRAINT `buy_order_ibfk_1` FOREIGN KEY (`PROPERTY_ID`) REFERENCES `property` (`PROPERTY_ID`),
  ADD CONSTRAINT `buy_order_ibfk_3` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `preproperty`
--
ALTER TABLE `preproperty`
  ADD CONSTRAINT `preproperty_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`),
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
