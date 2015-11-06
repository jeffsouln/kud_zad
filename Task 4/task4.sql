-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 03:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task4`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from` bigint(20) unsigned NOT NULL,
  `to` bigint(20) unsigned NOT NULL,
  `type` text COLLATE utf8_unicode_ci,
  `replyto` text COLLATE utf8_unicode_ci,
  `date_sent` text COLLATE utf8_unicode_ci,
  `date_read` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  `message_formatted` text COLLATE utf8_unicode_ci,
  `date_sent_formatted` bigint(20) unsigned NOT NULL,
  `date_read_formatted` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `from` (`from`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2147 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `from`, `to`, `type`, `replyto`, `date_sent`, `date_read`, `subject`, `message`, `message_formatted`, `date_sent_formatted`, `date_read_formatted`) VALUES
(2023, 234, 5606, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2024, 234, 5608, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2025, 234, 5618, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2026, 234, 5623, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2027, 234, 5625, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2028, 234, 5627, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2029, 234, 5628, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2030, 234, 4949, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2031, 234, 5731, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2032, 234, 5734, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2033, 234, 5742, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2034, 234, 5743, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2035, 234, 5735, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2036, 234, 5730, '1', '0', '1340878624', '0', 'This is SP', 'This is SP..Thais is SP', 'This is SP..Thais is SP', 1156, 0),
(2037, 234, 4949, '1', '0', '1340985832', '0', 'test', 'testtest', 'testtest', 1157, 0),
(2038, 234, 4982, '1', '0', '1341053992', '0', 'adfads', 'agsgsggasgasgasas', 'agsgsggasgasgasas', 1158, 0),
(2039, 234, 5226, '1', '0', '1341091049', '0', 'Events', 'Good to hear that.', 'Good to hear that.', 1159, 0),
(2040, 234, 5226, '1', '0', '1341091171', '0', 'asdad', 'adasdasdada', 'adasdasdada', 1159, 0),
(2041, 234, 5226, '1', '0', '1341091202', '0', 'asdasd', 'asdasfagfsdgsgsgasg', 'asdasfagfsdgsgsgasg', 1159, 0),
(2042, 234, 5226, '1', '0', '1341364262', '0', 'adaasd', 'asdadadas', 'asdadadas', 1162, 0),
(2043, 234, 5399, '1', '0', '1342560365', '0', 'asda', 'ASDASDAS', 'ASDASDAS', 1176, 0),
(2046, 5245, 234, '1', '0', '1343232908', '1344001216', 'Hello', 'Hi', 'Hi', 1183, 1192),
(2047, 5245, 234, '1', '0', '1343234342', '1343837983', 're: This is SP', 'Hi How are you[quote=Alan Ford]This is SP..Thais is SP[/quote]', 'Hi How are you', 1183, 1190),
(2048, 234, 8110, '1', '0', '1343248577', '0', 'afd', 'asdfads', 'asdfads', 1184, 0),
(2146, 234, 4949, '1', '0', '1344359836', '0', 'test', 'test inbox', 'test inbox', 1196, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_date_read_formatted`
--

CREATE TABLE IF NOT EXISTS `data_date_read_formatted` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `timestamp` bigint(20) DEFAULT NULL,
  `month` bigint(20) DEFAULT NULL,
  `day` bigint(20) DEFAULT NULL,
  `year` bigint(20) DEFAULT NULL,
  `week` bigint(20) DEFAULT NULL,
  `dayid` bigint(20) DEFAULT NULL,
  `weekday` text COLLATE utf8_unicode_ci,
  `mname` text COLLATE utf8_unicode_ci,
  `formatted` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1193 ;

--
-- Dumping data for table `data_date_read_formatted`
--

INSERT INTO `data_date_read_formatted` (`id`, `timestamp`, `month`, `day`, `year`, `week`, `dayid`, `weekday`, `mname`, `formatted`) VALUES
(1190, 1343779200, 8, 1, 2012, 31, 4, 'Wed', 'Aug', 'Aug 1, 2012'),
(1192, 1343952000, 8, 3, 2012, 31, 6, 'Fri', 'Aug', 'Aug 3, 2012');

-- --------------------------------------------------------

--
-- Table structure for table `data_date_sent_formatted`
--

CREATE TABLE IF NOT EXISTS `data_date_sent_formatted` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `timestamp` bigint(20) NOT NULL,
  `month` bigint(20) NOT NULL,
  `day` bigint(20) NOT NULL,
  `year` bigint(20) NOT NULL,
  `week` bigint(20) NOT NULL,
  `dayid` bigint(20) NOT NULL,
  `weekday` text COLLATE utf8_unicode_ci NOT NULL,
  `mname` text COLLATE utf8_unicode_ci NOT NULL,
  `formatted` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1197 ;

--
-- Dumping data for table `data_date_sent_formatted`
--

INSERT INTO `data_date_sent_formatted` (`id`, `timestamp`, `month`, `day`, `year`, `week`, `dayid`, `weekday`, `mname`, `formatted`) VALUES
(1156, 1340841600, 6, 28, 2012, 26, 5, 'Thu', 'Jun', 'Jun 28, 2012'),
(1157, 1340928000, 6, 29, 2012, 26, 6, 'Fri', 'Jun', 'Jun 29, 2012'),
(1158, 1341014400, 6, 30, 2012, 26, 7, 'Sat', 'Jun', 'Jun 30, 2012'),
(1159, 1341100800, 7, 1, 2012, 26, 1, 'Sun', 'Jul', 'Jul 1, 2012'),
(1162, 1341360000, 7, 4, 2012, 27, 4, 'Wed', 'Jul', 'Jul 4, 2012'),
(1176, 1342569600, 7, 18, 2012, 29, 4, 'Wed', 'Jul', 'Jul 18, 2012'),
(1183, 1343174400, 7, 25, 2012, 30, 4, 'Wed', 'Jul', 'Jul 25, 2012'),
(1184, 1343260800, 7, 26, 2012, 30, 5, 'Thu', 'Jul', 'Jul 26, 2012'),
(1196, 1344297600, 8, 7, 2012, 32, 3, 'Tue', 'Aug', 'Aug 7, 2012');

-- --------------------------------------------------------

--
-- Table structure for table `data_from`
--

CREATE TABLE IF NOT EXISTS `data_from` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5246 ;

--
-- Dumping data for table `data_from`
--

INSERT INTO `data_from` (`id`, `name`) VALUES
(234, 'Alan Ford'),
(5245, 'Ian Graham');

-- --------------------------------------------------------

--
-- Table structure for table `data_to`
--

CREATE TABLE IF NOT EXISTS `data_to` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8111 ;

--
-- Dumping data for table `data_to`
--

INSERT INTO `data_to` (`id`, `name`) VALUES
(234, 'Alan Ford'),
(4949, 'Eric Owens'),
(4982, 'Hamza Nadeem'),
(5226, '1341478142_Kareena kapoor'),
(5399, 'Kob Bryant'),
(5606, '1341474388_sgdfgdfg'),
(5608, '1344517115_Test22'),
(5618, 'Tiengo Mass'),
(5623, 'El Homo'),
(5625, 'Test'),
(5627, '1341059685_dejan email test'),
(5628, 'Test email'),
(5730, 'Mobile Employee'),
(5731, 'Mobile Scheduler'),
(5734, 'Adalph'),
(5735, 'Fsdfsdghh'),
(5742, 'double dots2'),
(5743, 'double dots3'),
(8110, 'Event');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
