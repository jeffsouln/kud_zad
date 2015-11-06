-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 06:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `delivery_methods`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_methods`
--

CREATE TABLE IF NOT EXISTS `delivery_methods` (
  `delivery_method_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company` int(10) unsigned NOT NULL,
  `fixed_price` decimal(12,2) unsigned DEFAULT NULL,
  `range_set` tinyint(1) NOT NULL,
  PRIMARY KEY (`delivery_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `delivery_methods`
--

INSERT INTO `delivery_methods` (`delivery_method_id`, `company`, `fixed_price`, `range_set`) VALUES
(1, 1, '55.00', 0),
(2, 1, '3.00', 1),
(3, 1, '45.00', 0),
(4, 1, '0.00', 1),
(5, 1, '1000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `delivery_url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `w_from` smallint(5) unsigned DEFAULT NULL,
  `w_to` smallint(5) unsigned DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `delivery_method` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`delivery_url`, `w_from`, `w_to`, `notes`, `delivery_method`) VALUES
('http://www.nesto.com', 10, 100, 'some text', 3),
('http://www.pera.com', 10, 100, 'na na na naaaaa', 0),
('http://www.oleole.com', 0, 8, 'deki', 2),
('http://www.idemoooo.com', 1, 2, 'http://www.pera.comhttp://www.pera.comhttp://www.pera.comhttp://www.pera.comhttp://www.pera.comhttp://www.pera.comhttp://www.pera.comhttp://www.pera.comhttp://www.pera.comhttp://www.pera.com', 4),
('http://www.peti.com', 3, 4444, 'loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm loerm ', 5),
('http://www.duki.com', 1, 444, 'null', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE IF NOT EXISTS `ranges` (
  `range_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_method` int(10) unsigned NOT NULL,
  `from` smallint(5) unsigned NOT NULL,
  `to` smallint(5) unsigned NOT NULL,
  `price` decimal(12,2) unsigned NOT NULL,
  PRIMARY KEY (`range_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`range_id`, `delivery_method`, `from`, `to`, `price`) VALUES
(29, 2, 4, 4, '44.00'),
(30, 4, 43, 34, '4.00'),
(31, 4, 44, 55, '5.00'),
(32, 4, 55, 55, '5.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
