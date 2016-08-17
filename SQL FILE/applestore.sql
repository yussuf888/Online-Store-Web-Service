-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2015 at 06:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `applestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`AdminID` int(11) NOT NULL,
  `Admin_Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Admin_Username`, `Password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE IF NOT EXISTS `orderproduct` (
`OrderProductID` int(11) NOT NULL,
  `Model_Name` varchar(200) NOT NULL,
  `Storage` varchar(200) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price_Selling` double NOT NULL,
  `Company_Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Contact` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`OrderProductID`, `Model_Name`, `Storage`, `Color`, `Quantity`, `Price_Selling`, `Company_Name`, `Address`, `Contact`, `Email`) VALUES
(1, 'iPhone 6', '16GB', 'Black', 4, 2545, 'Charu Store', 'Taman Pakatan', '016 2890746', 'yussuf888@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`ProductID` int(11) NOT NULL,
  `Model_Name` varchar(50) NOT NULL,
  `Storage` varchar(20) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Price_Selling` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Model_Name`, `Storage`, `Color`, `Price_Selling`) VALUES
(1, 'iPhone 6', '16GB', 'Black', 2545),
(2, 'iPhone 6 Plus', '16GB', 'Black', 2949),
(4, 'iPhone 6 Plus', '16GB', 'Black', 2654),
(5, 'iPhone 6', '64GB', 'White', 2989),
(7, 'iPad', '32GB', 'Gold', 1234),
(8, 'iPhone 6 Plus', '64GB', 'Gold', 2854),
(9, 'iPod', '32GB', 'Black', 765);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
 ADD PRIMARY KEY (`OrderProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
MODIFY `OrderProductID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
