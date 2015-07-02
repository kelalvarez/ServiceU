-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2015 at 02:02 AM
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
  `employeeID` varchar(40) NOT NULL,
  `orderApp` int(2) NOT NULL,
  `dateApplication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `selectedEmployee` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apptable`
--

INSERT INTO `apptable` (`jobID`, `employeeID`, `orderApp`, `dateApplication`, `selectedEmployee`) VALUES
(1, 'testemail4@gmail.com', 1, '2015-06-14 16:36:58', 0),
(2, 'testemail4@gmail.com', 1, '2015-06-14 16:36:58', 0),
(3, 'testemail4@gmail.com', 1, '2015-06-14 16:36:58', 0),
(6, 'testemail3@gmail.com', 1, '2015-06-14 16:36:58', 0),
(7, 'testemail3@gmail.com', 1, '2015-06-14 16:36:58', 0),
(17, 'misha.neko@gmail.com', 1, '2015-06-14 16:36:58', 0),
(9, 'testemail4@gmail.com', 1, '2015-06-14 16:36:58', 0),
(9, 'testemail3@gmail.com', 2, '2015-06-14 16:40:38', 0),
(5, 'testemail1@gmail.com', 1, '2015-06-14 17:30:58', 0),
(18, 'testemail1@gmail.com', 1, '2015-06-20 13:27:29', 0);

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
  `jobID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commenttable`
--

INSERT INTO `commenttable` (`receiverID`, `senderID`, `comment`, `stars`, `entryDate`, `recommend`, `jobID`) VALUES
('testemail1@gmail.com', 'testemail2@gmail.com', 'This is a fantastic moisturizing cream! The day I got this in the mail, I happened to have really puffy dark circles under my eyes due to not sleepiing much the night before. As an experiment I put the cream under one eye to see what it would do. I came back to the bathroom about 10 minutes later and was AMAZED! The dark circle that had the cream on it was about 70% smaller than the one without the cream. I mean, I literally could measure the difference between the two.\r\nI also live in a very dr', 4, '2015-06-20 14:22:37', 'yes', 0),
('testemail1@gmail.com', 'testemail2@gmail.com', 'This is a fantastic moisturizing cream! The day I got this in the mail, I happened to have really puffy dark circles under my eyes due to not sleepiing much the night before. As an experiment I put the cream under one eye to see what it would do. I came back to the bathroom about 10 minutes later and was AMAZED! The dark circle that had the cream on it was about 70% smaller than the one without the cream. I mean, I literally could measure the difference between the two.\r\nI also live in a very dr', 2, '2015-06-20 14:22:37', 'yes', 0),
('testemail1@gmail.com', 'testemail4@gmail.com', 'COMMENT', 4, '2015-07-01 15:30:10', 'none', 0),
('testemail1@gmail.com', 'testemail4@gmail.com', 'aslkdjlsak', 3, '2015-07-01 15:30:10', 'none', 0),
('testemail4@gmail.com', 'testemail1@gmail.com', 'Meowmeowmeowmo', 3, '2015-07-01 15:34:51', 'yes', 0),
('testemail4@gmail.com', 'testemail3@gmail.com', 'rorororororo', 4, '2015-07-01 15:34:51', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `degreetable`
--

CREATE TABLE IF NOT EXISTS `degreetable` (
  `emailID` varchar(30) NOT NULL,
  `degree1` varchar(40) NOT NULL DEFAULT 'na',
  `degree2` varchar(40) NOT NULL DEFAULT 'na',
  `degree3` varchar(40) NOT NULL DEFAULT 'na',
  `degree4` varchar(40) NOT NULL DEFAULT 'na',
  UNIQUE KEY `emailID` (`emailID`),
  UNIQUE KEY `emailID_2` (`emailID`),
  UNIQUE KEY `emailID_3` (`emailID`),
  UNIQUE KEY `emailID_4` (`emailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degreetable`
--

INSERT INTO `degreetable` (`emailID`, `degree1`, `degree2`, `degree3`, `degree4`) VALUES
('misha.neko@gmail.com', 'bs Software Engineering', 'na', 'na', 'na'),
('testemail4@gmail.com', 'bs Software Engineering', 'na', 'na', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `jobtable`
--

CREATE TABLE IF NOT EXISTS `jobtable` (
  `jobID` int(8) NOT NULL AUTO_INCREMENT,
  `employeerID` varchar(40) NOT NULL,
  `jobTitle` varchar(200) NOT NULL,
  `jobDescription` mediumtext NOT NULL,
  `payment` int(3) NOT NULL,
  `category` varchar(20) NOT NULL,
  `totalApp` int(2) NOT NULL DEFAULT '0',
  `closeJob` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`jobID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `jobtable`
--

INSERT INTO `jobtable` (`jobID`, `employeerID`, `jobTitle`, `jobDescription`, `payment`, `category`, `totalApp`, `closeJob`) VALUES
(1, 'testemail1@gmail.com', 'Sample Job Title 1', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 100, 'Software', 1, 1),
(2, 'testemail1@gmail.com', 'Sample Job Title 2', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 150, 'Shopping', 1, 0),
(3, 'testemail1@gmail.com', 'Sample Job Title 3', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 200, 'Software', 1, 1),
(4, 'testemail3@gmail.com', 'Sample Job Title 4', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 50, 'Shopping', 0, 0),
(5, 'testemail3@gmail.com', 'Sample Job Title 5', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 150, 'Software', 1, 0),
(6, 'testemail4@gmail.com', 'Sample Job Title 7', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 200, 'Computers', 1, 0),
(7, 'testemail4@gmail.com', 'Sample Job Title 8', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 200, 'Shopping', 1, 0),
(8, 'testemail1@gmail.com', 'Sample Job Title 9', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 150, 'Shopping', 0, 0),
(9, 'testemail1@gmail.com', 'Sample Job Title 10', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 20, 'Shopping', 2, 1),
(14, 'testemail1@gmail.com', 'Job Title', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 100, 'Tutor', 0, 1),
(17, 'testemail1@gmail.com', 'as', '', 0, '', 1, 1),
(18, 'misha.neko@gmail.com', 'Job Title', 'Accounting Clerk Job Responsibilities: Supports accounting operations by filing documents; reconciling statements; running software programs. Accounting Clerk Job Duties: Maintains accounting records by making copies; filing documents. Reconciles bank statements by comparing statements with general ledger. Maintains accounting databases by entering data into the computer; processing backups. Verifies financial reports by running performance analysis software program. Determines value of depreciable assets by running depreciation software program. Protects organization''s value by keeping information confidential. Updates job knowledge by participating in educational opportunities. Accomplishes accounting and organization mission by completing related results as needed. Accounting Clerk Skills and Qualifications: Organization, Financial Software, Reporting Skills, Attention to Detail, PC Proficiency, Typing, Productivity, Dependabilit', 100, 'Computers', 1, 0);

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
  `degree` int(1) NOT NULL DEFAULT '0',
  `interest` varchar(300) NOT NULL DEFAULT 'na',
  `rate` int(1) NOT NULL DEFAULT '0',
  `verificationCode` varchar(10) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userID`, `email`, `firstName`, `lastName`, `password`, `verify`, `photo`, `degree`, `interest`, `rate`, `verificationCode`) VALUES
(5, 'misha.neko@gmail.com', 'Kelly', 'Alvarez', 'kel', 1, ' na', 1, 'computers, programming', 0, '4lOEKH7E8c'),
(1, 'testemail1@gmail.com', 'Joel', 'Tapia', 'password1', 1, ' na', 0, 'computers, software, css, php, groceries', 3, ''),
(2, 'testemail2@gmail.com', 'Nancy', 'Alvarez', 'password2', 0, ' na', 0, 'na', 0, ''),
(3, 'testemail3@gmail.com', 'Lily', 'Aguirre', 'password3', 1, ' na', 0, 'BS Software Engineering', 0, ''),
(4, 'testemail4@gmail.com', 'Kelly', 'Ram', 'password4', 1, ' na', 1, 'groceries, computers', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
