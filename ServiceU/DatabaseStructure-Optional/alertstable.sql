-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2015 at 11:16 PM
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
-- Table structure for table `alertstable`
--

CREATE TABLE IF NOT EXISTS `alertstable` (
  `email` varchar(35) NOT NULL,
  `alertTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderNum` int(3) NOT NULL AUTO_INCREMENT,
  `message` varchar(600) NOT NULL,
  PRIMARY KEY (`orderNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `alertstable`
--

INSERT INTO `alertstable` (`email`, `alertTime`, `orderNum`, `message`) VALUES
('testemail1@gmail.com', '2015-07-21 21:10:28', 1, 'New Test Notification'),
('testemail1@gmail.com', '2015-07-21 21:10:54', 2, 'New Notification 2'),
('testemail1@gmail.com', '2015-07-21 21:10:54', 3, 'New Notification 3'),
('', '2015-07-21 22:38:06', 4, ''),
('', '2015-07-21 22:38:06', 5, ''),
('testemail1@gmail.com', '2015-07-21 22:38:43', 6, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=testemail4@gmail.com" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 22:38:43', 7, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=testemail3@gmail.com" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 22:38:52', 8, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=testemail4@gmail.com" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 22:38:52', 9, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=testemail3@gmail.com" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 22:39:51', 10, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 22:39:51', 11, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 22:40:15', 12, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 22:40:16', 13, 'The owner of the post, which you applied for, has changed. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 23:11:17', 14, 'sdas'),
('testemail1@gmail.com', '2015-07-21 23:11:17', 15, 'sdas'),
('testemail1@gmail.com', '2015-07-21 23:13:03', 16, 'akdjlaksjda The owner of the post'),
('testemail1@gmail.com', '2015-07-21 23:13:03', 17, 'akdjlaksjda The owner of the post'),
('testemail1@gmail.com', '2015-07-21 23:13:33', 18, ' Sample Job Title 1 The owner of the post'),
('testemail1@gmail.com', '2015-07-21 23:13:33', 19, ' Sample Job Title 1 The owner of the post'),
('testemail1@gmail.com', '2015-07-21 23:13:52', 20, '<strong> Sample Job Title 1 </strong> The owner of the post'),
('testemail1@gmail.com', '2015-07-21 23:13:52', 21, '<strong> Sample Job Title 1 </strong> The owner of the post'),
('testemail1@gmail.com', '2015-07-21 23:14:44', 22, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information.'),
('testemail1@gmail.com', '2015-07-21 23:14:44', 23, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information.'),
('testemail1@gmail.com', '2015-07-21 23:15:07', 24, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail1@gmail.com', '2015-07-21 23:15:07', 25, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail4@gmail.com', '2015-07-21 23:17:21', 26, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail3@gmail.com', '2015-07-21 23:17:21', 27, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail4@gmail.com', '2015-07-21 23:19:42', 28, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail3@gmail.com', '2015-07-21 23:19:42', 29, '<strong> Sample Job Title 1 </strong> :: The owner of the post, which you applied for, has changed the jobs information. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the changes'),
('testemail4@gmail.com', '2015-07-22 13:27:23', 30, '<strong>  </strong> :: You have been selected for the job. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review job'),
('testemail3@gmail.com', '2015-07-22 13:28:49', 31, '<strong> Sample Job Title 1 </strong> :: You have been selected for the job. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review job'),
('testemail1@gmail.com', '2015-07-22 14:06:46', 32, '<strong> Sample Job Title 1 </strong> :: The applicant that you selected has confirm his/her application. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review job'),
('testemail4@gmail.com', '2015-07-22 14:06:46', 33, '<strong> <a href="postComplete.php?jobID=9" target="_parent"></a> </strong> :: The job has been closed. Thank you for your application.'),
('testemail4@gmail.com', '2015-07-22 14:08:51', 34, '<strong> Sample Job Title 1 </strong> :: You have been selected for the job. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review job'),
('testemail1@gmail.com', '2015-07-22 14:09:48', 35, '<strong> Sample Job Title 1 </strong> :: The applicant that you selected has deny the job offer. <a href="postComplete.php?jobID=9" target="_parent">Click here </a> to review the job');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
