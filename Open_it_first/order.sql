-- phpMyAdmin SQL Dump
-- version 3.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2011 at 04:08 AM
-- Server version: 5.5.17
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xyz`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `oid` bigint(10) NOT NULL,
  `pid` bigint(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `discount` int(3) NOT NULL,
  `price` bigint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`oid`, `pid`, `qty`, `discount`, `price`) VALUES
(1000000000, 1000000002, 1, 20, 28000),
(1000000001, 1000000017, 1, 5, 1045),
(1000000002, 1000000006, 1, 5, 4749),
(1000000003, 1000000007, 1, 10, 6300),
(1000000004, 1000000002, 1, 20, 28000),
(1000000005, 1000000004, 1, 20, 9600),
(1000000005, 1000000008, 1, 10, 8100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
