-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2016 at 08:47 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `live`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `Name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `employee` int(200) NOT NULL,
  `web` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Name`, `email`, `date`, `employee`, `web`, `country`, `state`, `city`, `pincode`, `contact`, `logo`, `password`) VALUES
('sodhi', 'myname@gmail.com', '2016-12-31', 2147483647, 'sodhi', ' India', ' Himachal Pradesh', 'Gwal Pathar', '21', 55645, 'icon-1.png', 'vis'),
('vishal', 'vishanshul91@gmail.c', '2017-03-01', 852, 'vishal.com', ' India', ' Uttar Pradesh', 'Gwalior Grint', '475110', 2147483647, 'client-logo8.png', 'vis'),
('weRhr', 'vishanshul9@gmail.co', '2016-12-05', 89, 'asd.com', ' India', ' Madhya Pradesh', 'Dabra', '475110', 2147483647, 'client-logo1.png', 'asd');
