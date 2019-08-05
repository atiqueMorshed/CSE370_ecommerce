-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2019 at 01:34 AM
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
  `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROPERTY_ID` int(11) NOT NULL,
  `USERNAME` varchar(10) NOT NULL,
  `ORDER_DATE` date NOT NULL,
  PRIMARY KEY (`ORDER_ID`),
  KEY `USERNAME` (`USERNAME`),
  KEY `PROPERTY_ID` (`PROPERTY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy_order`
--

INSERT INTO `buy_order` (`ORDER_ID`, `PROPERTY_ID`, `USERNAME`, `ORDER_DATE`) VALUES
(1, 1, 'ArrowX17', '2019-08-05'),
(2, 1, 'ArrowX17', '2019-08-05'),
(3, 1, 'ArrowX17', '2019-08-05'),
(4, 2, 'ArrowX17', '2019-08-05');

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
) ENGINE=InnoDB AUTO_INCREMENT=10014 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `USERNAME`, `EMAIL`, `type`, `Password`, `Name`, `Address`) VALUES
(10002, 'ArrowX17', 'iamsamix17@gmail.com', 'Admin', 'aaaaaaaa', 'Atique Morshed', '69 Mohakhali, Dhaka'),
(10003, 'Sadat', 'sadat@sadat.com', 'agent', 'sadat12345', 'Sadat', 'Sadat'),
(10004, 'Sh3zAn', 'shezanmahmud001@gmail.com', 'Admin', 'aaaaaaaa', 'Shezan Mahmud', 'house 21,road 8,Mirpur Dohs,Dhaka'),
(10005, 'R1dhy', 'ridhyrahman88@gmail.com', 'Admin', 'aaaaaaaa', 'Ridhy Rahman', 'B block,house 124, road 4,Bashundhara RA,Dhaka'),
(10006, 'FARhan', 'farhansiraj121@gmail.com', 'Admin', 'aaaaaaaa', 'Farhan Siraj', 'house 45,road 11,Uttara,Dhaka'),
(10007, 'ay0n', 'ayonchow99@gmail.com', 'Admin', 'aaaaaaaa', 'Ayon Chowdhury', 'House 88, Road 6, Jamal Khan Road,Chittagong'),
(10008, 'Fariha', 'farihatahsin619@gmail.com', 'Admin', 'aaaaaaaa', 'Fariha Tahsin', 'house 67,BSCIC Road,Rajshahi'),
(10009, 'Arafat', 'arafathossain25@gmail.com', 'agent', 'aaaaaaaa', 'Arafat Hossain', 'house 266,Hazi Mohsin Road,Khulna'),
(10010, 'Fahim', 'fahimhasnat.cse14@gmail.com', 'agent', 'aaaaaaaa', 'Fahim Hasnat', 'house 23,road 7,Fulbari bus stand, Dinajpur\r\n'),
(10011, 'imran', 'imran.khan@gmail.com', 'agent', 'aaaaaaaa', 'Imran Khan', 'house 158,road 12,Bodikuna,Sylhet'),
(10012, 'Morshed', 'morshedulislam10@gmail.com', 'agent', 'aaaaaaaa', 'Morshedul Islam', 'house 46,Bir Uttam AK Khandakar Rd,Mohakhali,Dhaka'),
(10013, 'Mehrab', 'mehrab.sattar007@gmail.com', 'agent', 'aaaaaaaa', 'Mehrab Sattar', 'house 12,Road 4,Monipuri Para,Farmgate,Dhaka');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preproperty`
--

INSERT INTO `preproperty` (`PRE_ID`, `USERNAME`, `verify`, `bedroom`, `washroom`, `balcony`, `size`, `street`, `city`, `area`, `Description`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `floor1`, `floor2`, `floor3`, `floor4`, `floor5`) VALUES
(4, 'ArrowX17', 1, 2, 2, 2, 1, 'wada', 'dd', 'dd', 'wdswadwdadw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'abudada', 1, 2, 3, 4, 1, 'dd', 'Dhaka', 'Dhaka', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et omnis minima fugiat reprehenderit mollitia. Dicta, esse officiis voluptates perspiciatis saepe alias, natus blanditiis sequi dignissimos totam cupiditate fuga molestias optio magni ipsum pariatur dolorum. Sint quos aut sapiente animi possimus accusamus iure dolores eius nesciunt, iusto saepe, pariatur incidunt, ea.', '', '', '', '', '', '', '', '', '', ''),
(12, 'ArrowX17', 0, 2, 1, 1, 1, '338 Elephant Road, Dhaka', 'Rangpur', 'a', 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ArrowX17', 0, 2, 3, 4, 1, '11', 'Dhaka', 'Banani', 'aaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'ArrowX1237', 0, 3, 2, 1, 3000, 'Road 19', 'Dhaka', 'Banani', 'Donec nec dui eros. Aenean vitae massa mauris. Mauris maximus vulputate erat id molestie. Cras eu elementum justo. Sed non nunc non dolor eleifend imperdiet. Nullam quis nunc sit amet magna lacinia lacinia. Suspendisse sagittis augue diam, ut facilisis neque sollicitudin ac. Curabitur eleifend est nisl. Maecenas elementum orci id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'ArrowX1237', 0, 2, 1, 0, 2500, 'Road 35', 'Rangpur', 'CHECK POST', 'Maecenas pharetra nisi nisl, quis imperdiet nibh porta at. Nam aliquam erat vel aliquam ornare. Nunc vitae urna eu augue viverra maximus quis sed nisi. Pellentesque ante sapien, commodo nec enim vel, interdum euismod felis. Integer laoreet lorem elementum nulla sagittis, et elementum est porta. Vivamus gravida congue orci at', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'ArrowX1237', 0, 3, 2, 2, 3000, 'Road 17', 'Chittagong', 'Mehdibag', 'Aliquam eu interdum sem, et mollis sapien. Integer a justo odio. Quisque nulla felis, luctus eu consectetur eget, sagittis at justo. Suspendisse ac sodales orci. Donec suscipit sapien quam, eu varius enim condimentum non. Donec at nibh vitae ipsum vehicula ultrices quis et lectus. Pellentesque vehicula aliquam turpis, id posuere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`PROPERTY_ID`, `EMP_ID`, `USERNAME`, `PROPERTY_NAME`, `PRICE`, `BEDROOM`, `WASHROOM`, `BALCONY`, `SIZE`, `street`, `city`, `area`, `Description`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `floor1`, `floor2`, `floor3`, `floor4`, `floor5`) VALUES
(1, 10002, 'abudada', 'Demo House 1', 10000, 3, 2, 1, 1500, 'wireless street', 'Dhaka', 'Mohakhali', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non quod sapiente mollitia assumenda iure officiis beatae, cupiditate esse quam maxime molestias expedita fugiat ut placeat dignissimos temporibus maiores. Perspiciatis, mollitia!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 10003, 'Rahimm', 'Demo House 2', 20000, 4, 3, 2, 2000, 'Chatteswary Street', 'Chittagong', 'Mehdibag', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 10002, 'ArrowX17', 'Demo House 3', 30000, 5, 4, 2, 2500, '13/b', 'Dhaka', 'Banani', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 10003, 'Rahimm', 'Demo House 4', 5000, 1, 1, 0, 600, 'Korail Bosti', 'Dhaka', 'Korail', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 10003, 'Rahimm', 'Demo House 5', 18000, 3, 2, 1, 1200, '17/c', 'Rangpur', 'Circuit House', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, impedit officiis, nesciunt ullam modi ea maiores voluptatibus alias quia in accusantium excepturi, dolore libero? Deserunt vel blanditiis sapiente placeat nobis.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 10004, 'ArrowX2417', 'Chalet', 150000, 3, 2, 1, 2200, 'Road 13', 'Chittagong', 'Agrabad', 'Nulla ligula risus, vehicula eu sagittis eu, euismod et quam. Integer venenatis purus sed commodo tristique. Etiam sed magna pulvinar nulla lacinia vestibulum. Fusce vehicula pulvinar dictum. Sed quis nisi accumsan, egestas sapien vitae, finibus sapien. In volutpat consectetur hendrerit. Suspendisse feugiat, mi et maximus consequat, sapien felis dictum tortor.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 10005, 'Arrow111s', 'Coastline', 220000, 3, 3, 3, 4000, 'BashirUddin Road', 'Dhaka', 'Dhanmondi', 'Nunc varius laoreet volutpat. Vestibulum massa quam, rhoncus eu ullamcorper eu, luctus et enim. Maecenas id ipsum purus. Nunc ultrices diam tortor, a laoreet lacus tincidunt quis. Proin laoreet libero ut lectus mollis, a fringilla tellus hendrerit. Pellentesque velit diam, pharetra et maximus sit amet, porta vel neque. Quisque lacinia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 10011, 'ArrowX1237', 'Outback', 120000, 3, 2, 0, 2000, 'Road 3', 'Chittagong', 'Khulshi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id imperdiet orci, ac tempus lectus. Duis aliquet sed nulla vitae pharetra. Nunc ullamcorper libero quis orci viverra sodales. Donec et luctus ligula. Sed scelerisque id turpis quis dictum. Nam id massa sed urna cursus dictum. Etiam fringilla dui non nibh.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 10008, 'ArrowX17', 'Skyscrapper', 150000, 2, 2, 1, 40000, 'Road 2/1', 'Rangpur', 'RK ROAD', 'Proin ligula mauris, dapibus nec rutrum euismod, bibendum non dolor. Praesent aliquet lorem nec justo convallis pharetra. Phasellus imperdiet arcu sit amet quam vulputate malesuada. Nam bibendum purus sed tellus fringilla, sed tempus neque elementum. Mauris sodales, ligula ut dictum cursus, lacus elit pulvinar ligula, id commodo sapien velit a.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10010, 'Rahimm', 'Villa', 200000, 3, 2, 2, 3500, 'Road 11', 'Rangpur', 'Circuit House', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec ex consequat nulla tristique fringilla. Vestibulum congue sit amet augue ac vestibulum. Mauris rhoncus diam venenatis risus pretium, nec cursus dui bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce faucibus vitae enim quis.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 10013, 'abudada', 'Fortress', 200000, 3, 2, 2, 3200, 'Road 7', 'Dhaka', 'Uttara', 'Nullam iaculis sem quis dolor ultricies, in ullamcorper nisl sodales. Nunc sagittis vestibulum tortor ut convallis. Proin interdum tempor velit, eu venenatis orci mollis sed. Praesent tincidunt tincidunt mauris fermentum volutpat. Pellentesque mi ante, facilisis sit amet lectus sit amet, aliquam finibus leo. Ut ante dui, venenatis non tempus placerat.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
('Arrow111s', '$2y$10$0bnlbxV8nEvFvrLZRZp/2uRPDg0EgQecOp3KQYRZ03mirl4VlGYJO', 'jerem1yruta@isda.com', 'sad', 'afg'),
('ArrowX1237', '$2y$10$55u/SugKzvPCgUUgP2E6PeZZg60byihXWukaM0zdTmmytJCRurR5q', 'jeremy23ruta@isda.com', 'zxczcc', 'asdadsadadsa'),
('ArrowX17', '$2y$10$TISDyaGGqbijR/QwMqofx.XwVi8goR1BE/QFP24RdM7j2qj/.YCX.', 'iamsamix17@gmail.com', 'Atique Morshed Sami', 'Dhaka'),
('ArrowX2417', '$2y$10$JEP6tLS2Y238TqecqIhayOEMlxGdziwXW9JdR6HUhAIZpbffrOSGy', 'jeremyrusaddsdadta@isda.com', 'asda', 'zxcczxcczc'),
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
