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
-- Table structure for table `user1`
--

CREATE TABLE IF NOT EXISTS `user1` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`firstname`, `lastname`, `email`, `mobile`, `dob`, `state`, `country`, `city`, `password`) VALUES
('ans', 'vis', 'ader@gmail.com', 0, '0000-00-00', '', '', '', 'asd'),
('vishal', 'gupta', 'anki345@gmail.com', 8962252508, '2014-01-01', ' Madhya Pradesh', ' India', 'Dabra', 'asd'),
('vishal', 'gupta', 'shuvam@gmail.com', 0, '0000-00-00', '', '', '', 'asd'),
('vis', 'ans', 'vishalgupta34@gmail.com', 0, '0000-00-00', '', '', '', 'vis'),
('vis', 'ans', 'vishalgupta4567@gmail.com', 0, '0000-00-00', '', '', '', 'asw'),
('vishal', 'gupta', 'vishanshul1@gmail.com', 0, '0000-00-00', '', '', '', 'Vis');
