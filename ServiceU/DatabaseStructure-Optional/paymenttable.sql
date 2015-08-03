-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 02:27 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `serviceu`
--

-- --------------------------------------------------------

--
-- Table structure for table `paymenttable`
--

CREATE TABLE IF NOT EXISTS `paymenttable` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `jobID` int(11) NOT NULL,
  `employeerEmail` varchar(100) NOT NULL,
  `employeeEmail` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `initialstatus` int(1) NOT NULL DEFAULT '0',
  `clearstatus` int(11) NOT NULL DEFAULT '0',
  `completeEmployee` int(1) NOT NULL DEFAULT '0',
  `completeEmployer` int(1) NOT NULL DEFAULT '0',
  `finished` int(1) NOT NULL DEFAULT '0',
  `submitTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `paymenttable`
--

INSERT INTO `paymenttable` (`paymentID`, `jobID`, `employeerEmail`, `employeeEmail`, `amount`, `initialstatus`, `clearstatus`, `completeEmployee`, `completeEmployer`, `finished`, `submitTime`) VALUES
(4, 20, 'mark@gmail.com', 'testemail1@gmail.com', 200, 1, 1, 0, 0, 0, '2015-08-02 23:17:30'),
(5, 1, 'testemail1@gmail.com', 'testmail4@gmail.com', 100, 1, 1, 0, 0, 0, '2015-08-02 23:17:30'),
(6, 14, 'testemail1@gmail.com', 'testmail4@gmail.com', 100, 1, 1, 0, 0, 0, '2015-08-02 23:17:30'),
(7, 1, 'testemail1@gmail.com', 'testmail4@gmail.com', 150, 1, 1, 0, 0, 0, '2015-08-02 23:17:30'),
(8, 22, 'testmail4@gmail.com', 'testemail1@gmail.com', 1000, 1, 1, 0, 0, 0, '2015-08-02 23:17:30'),
(9, 23, 'testemail1@gmail.com', 'testmail4@gmail.com', 12312312, 1, 1, 0, 0, 0, '2015-08-02 23:17:30'),
(10, 25, 'testemail1@gmail.com', 'testmail4@gmail.com', 23121, 1, 1, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(12, 26, 'testemail1@gmail.com', 'testmail4@gmail.com', 1231, 1, 2, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(13, 27, 'testemail1@gmail.com', 'testmail4@gmail.com', 12321, 1, 2, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(14, 28, 'testemail1@gmail.com', 'admin@serviceu.com', 23121, 1, 2, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(15, 29, 'testemail1@gmail.com', 'admin@serviceu.com', 22, 1, 2, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(16, 30, 'testemail1@gmail.com', 'admin@serviceu.com', 213, 1, 3, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(17, 31, 'testemail1@gmail.com', 'admin@serviceu.com', 22, 1, 3, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(18, 32, 'testemail1@gmail.com', 'admin@serviceu.com', 22, 1, 3, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(19, 33, 'testemail1@gmail.com', 'admin@serviceu.com', 22, 1, 3, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(20, 34, 'testemail1@gmail.com', 'admin@serviceu.com', 232, 1, 3, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(21, 35, 'testemail1@gmail.com', 'admin@serviceu.com', 222, 1, 3, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(22, 35, 'testemail1@gmail.com', 'admin@serviceu.com', 222, 1, 0, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(23, 36, 'testemail1@gmail.com', 'admin@serviceu.com', 111, 1, 3, 0, 0, 2147483647, '2015-08-02 23:17:30'),
(24, 36, 'testemail1@gmail.com', 'admin@serviceu.com', 111, 1, 1, 1, 1, 1, '2015-08-02 23:17:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
