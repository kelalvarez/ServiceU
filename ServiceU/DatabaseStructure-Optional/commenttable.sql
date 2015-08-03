-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 02:26 AM
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
-- Table structure for table `commenttable`
--

CREATE TABLE IF NOT EXISTS `commenttable` (
  `receiverID` varchar(40) NOT NULL,
  `senderID` varchar(40) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `stars` int(1) NOT NULL DEFAULT '6',
  `entryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recommend` varchar(5) NOT NULL DEFAULT 'none',
  `jobID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commenttable`
--

INSERT INTO `commenttable` (`receiverID`, `senderID`, `comment`, `stars`, `entryDate`, `recommend`, `jobID`) VALUES
('mark@gmail.com', 'testemail2@gmail.com', 'This is a fantastic moisturizing cream! The day I got this in the mail, I happened to have really puffy dark circles under my eyes due to not sleepiing much the night before. As an experiment I put the cream under one eye to see what it would do. I came back to the bathroom about 10 minutes later and was AMAZED! The dark circle that had the cream on it was about 70% smaller than the one without the cream. I mean, I literally could measure the difference between the two.\r\nI also live in a very dr', 4, '2015-06-20 14:22:37', 'yes', 0),
('mark@gmail.com', 'testemail2@gmail.com', 'This is a fantastic moisturizing cream! The day I got this in the mail, I happened to have really puffy dark circles under my eyes due to not sleepiing much the night before. As an experiment I put the cream under one eye to see what it would do. I came back to the bathroom about 10 minutes later and was AMAZED! The dark circle that had the cream on it was about 70% smaller than the one without the cream. I mean, I literally could measure the difference between the two.\r\nI also live in a very dr', 2, '2015-06-20 14:22:37', 'yes', 0),
('mark@gmail.com', 'testemail4@gmail.com', 'COMMENT', 4, '2015-07-01 15:30:10', 'none', 0),
('mark@gmail.com', 'testemail4@gmail.com', 'aslkdjlsak', 3, '2015-07-01 15:30:10', 'none', 0),
('testemail4@gmail.com', 'testemail1@gmail.com', 'Meowmeowmeowmo', 3, '2015-07-01 15:34:51', 'yes', 0),
('testemail4@gmail.com', 'testemail3@gmail.com', 'rorororororo', 4, '2015-07-01 15:34:51', 'no', 0),
('mark@gmail.com', 'testemail2@gmail.com', 'This is a fantastic moisturizing cream! The day I got this in the mail, I happened to have really puffy dark circles under my eyes due to not sleepiing much the night before. As an experiment I put the cream under one eye to see what it would do. I came back to the bathroom about 10 minutes later and was AMAZED! The dark circle that had the cream on it was about 70% smaller than the one without the cream. I mean, I literally could measure the difference between the two.\r\nI also live in a very dr', 4, '2015-06-20 14:22:37', 'yes', 0),
('mark@gmail.com', 'testemail2@gmail.com', 'This is a fantastic moisturizing cream! The day I got this in the mail, I happened to have really puffy dark circles under my eyes due to not sleepiing much the night before. As an experiment I put the cream under one eye to see what it would do. I came back to the bathroom about 10 minutes later and was AMAZED! The dark circle that had the cream on it was about 70% smaller than the one without the cream. I mean, I literally could measure the difference between the two.\r\nI also live in a very dr', 2, '2015-06-20 14:22:37', 'yes', 0),
('mark@gmail.com', 'testemail4@gmail.com', 'COMMENT', 4, '2015-07-01 15:30:10', 'none', 0),
('mark@gmail.com', 'testemail4@gmail.com', 'aslkdjlsak', 3, '2015-07-01 15:30:10', 'none', 0),
('testemail4@gmail.com', 'testemail1@gmail.com', 'Meowmeowmeowmo', 3, '2015-07-01 15:34:51', 'yes', 0),
('testemail4@gmail.com', 'testemail3@gmail.com', 'rorororororo', 4, '2015-07-01 15:34:51', 'no', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
