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
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `userID` int(8) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL DEFAULT '',
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `userPhone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `degree` int(1) NOT NULL DEFAULT '0',
  `skill` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'na',
  `interest` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'na',
  `rate` int(1) NOT NULL DEFAULT '0',
  `verificationCode` varchar(10) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userID`, `email`, `firstName`, `lastName`, `userPhone`, `password`, `verify`, `degree`, `skill`, `interest`, `rate`, `verificationCode`, `admin`) VALUES
(49, 'admin@serviceu.com', 'Admin', 'Admin', NULL, 'passwordadmin', 0, 0, 'na', 'na', 0, '2STj1tcmqQ', 1),
(41, 'dad@yahoo.com', 'James', 'Esward', '0', 'dada', 0, 0, 'na', 'na', 0, 'rMFbHUlqQd', 0),
(40, 'das@ka.com', 'Michelle', 'Tong', '0', 'dasda', 0, 0, 'na', 'na', 0, 'XE86WS4cWC', 0),
(42, 'fada@yahoo.com', 'Eric', 'Meng', '0', 'dad', 0, 0, 'na', 'na', 0, 'GJzsOzu8pA', 0),
(38, 'fd@laalo.com', 'lo', 'ds', '0', '12', 0, 0, 'na', 'na', 0, 'C87KMKI1ij', 0),
(37, 'mark@gmail.com', 'Marvin', 'Caragay', '(925)325-0540', 'volcom12', 0, 1, 'C++ Java PHP JavaScript Ajax', 'Music Movie', 0, 'hD02NfEP94', 0),
(36, 'marv@gmail.com', 'k', 'm', '0', 'volcom12', 0, 0, 'na', 'na', 0, 'jyKFcwO1VV', 0),
(47, 'SADAM@GMAIL.COM', 'Lo', 'Desenberg', '0', '123', 0, 0, 'na', 'na', 0, 'LOmiMStOXB', 0),
(48, 'sadamn2@yahoo.com', 'sadamn2', 'mike', '0', '123', 0, 0, 'na', 'na', 0, 'EliG7XGKh0', 0),
(1, 'testemail1@gmail.com', 'Michael', 'Johnson', '', 'password1', 1, 0, 'na', 'computers software css php groceries', 0, '', 0),
(2, 'testemail2@gmail.com', 'Luke', 'Walker', '0', 'password2', 0, 0, 'na', 'na', 0, '', 0),
(3, 'testemail3@gmail.com', 'Test Name3', 'Last Name3', '0', 'password3', 1, 0, 'na', 'BS Software Engineering', 0, '', 0),
(4, 'testmail4@gmail.com', 'Test Name4', 'Last Name4', '0', 'password4', 1, 1, 'na', 'groceries, computers', 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
