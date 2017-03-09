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
-- Table structure for table `orderdeliverydtls`
--

CREATE TABLE IF NOT EXISTS `orderdeliverydtls` (
  `oid` bigint(10) NOT NULL,
  `dt` datetime NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Under Process',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdeliverydtls`
--

INSERT INTO `orderdeliverydtls` (`oid`, `dt`, `address`, `email`, `mobile`, `status`) VALUES
(1000000000, '2011-11-19 17:52:32', 'yyyyyyyyyy', 'greatestarijit@yahoo.co.in', 9999999990, 'In Process'),
(1000000001, '2011-11-20 10:58:10', '1889uhb bfubu jfbwofb jnfnz', 'greatestarijit@yahoo.co.in', 9999999990, 'In Process'),
(1000000002, '2011-11-20 14:00:00', 'eghsdhbbwu bwub', 'greatestarijit@yahoo.co.in', 9999999990, 'In Process'),
(1000000003, '2011-11-20 16:50:46', 'ryryr', 'greatestarijit@yahoo.co.in', 9999999990, 'In Process'),
(1000000004, '2011-11-20 18:28:58', '4525', 'greatestarijit@yahoo.co.in', 9999999990, 'In Process'),
(1000000005, '2011-11-21 13:00:49', 'yyyyyyyyyyyy', 'greatestarijit@yahoo.co.in', 9999999990, 'In Process');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
