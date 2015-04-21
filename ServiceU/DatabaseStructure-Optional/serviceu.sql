-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 10:32 PM
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
-- Table structure for table `apptable`
--

CREATE TABLE IF NOT EXISTS `apptable` (
  `jobID` int(8) NOT NULL,
  `employeeID` int(8) NOT NULL,
  `orderApp` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commenttable`
--

CREATE TABLE IF NOT EXISTS `commenttable` (
  `receiverID` int(8) NOT NULL,
  `senderID` int(8) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `stars` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobtable`
--

CREATE TABLE IF NOT EXISTS `jobtable` (
  `jobID` int(8) NOT NULL AUTO_INCREMENT,
  `employeerID` int(8) NOT NULL,
  `jobTitle` varchar(20) NOT NULL,
  `jobDescription` varchar(45) NOT NULL,
  `payment` int(3) NOT NULL,
  `category` varchar(20) NOT NULL,
  `totalApp` int(2) NOT NULL,
  PRIMARY KEY (`jobID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `userID` int(8) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL DEFAULT '',
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(30) NOT NULL DEFAULT ' na',
  `degree` varchar(20) NOT NULL DEFAULT 'na',
  `interest` varchar(40) NOT NULL DEFAULT 'na',
  `rate` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userID`, `email`, `firstName`, `lastName`, `password`, `verify`, `photo`, `degree`, `interest`, `rate`) VALUES
(1, 'test1@gmail.com', 'Name1', 'Lastname1', 'password1', 1, ' na', 'na', 'na', 0),
(2, 'test2@gmail.com', 'Name2', 'LastName2', 'password2', 0, ' na', 'na', 'meow, kel, shii, asdasd,asdasd', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
