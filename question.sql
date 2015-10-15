-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 07:32 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `question`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `Question_ID` int(11) NOT NULL,
  `Answer_ID` int(11) NOT NULL,
  `Content` varchar(100) NOT NULL,
  `Vote` int(11) NOT NULL,
  `Answered_by` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `Question_ID` int(11) NOT NULL,
  `Content` varchar(100) NOT NULL,
  `Asked_by` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Vote_Point` int(11) NOT NULL DEFAULT '0',
  `Answers` int(11) NOT NULL DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `QuestionTopic` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Question_ID`, `Content`, `Asked_by`, `Email`, `Vote_Point`, `Answers`, `datetime`, `QuestionTopic`) VALUES
(1, 'Content\r\n        ', 'Name', 'Email@example.com', 0, 0, '2015-10-15 05:30:45', 'Question Topic'),
(2, 'Content editan aja\r\n\r\n\r\n                        ', 'Name', 'Email@example.com', 0, 0, '2015-10-15 05:30:48', 'Question Topic'),
(3, 'Content\r\n        ', 'Name', 'Email@example.com', 0, 0, '2015-10-15 05:30:51', 'Question Topic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`Answer_ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`Question_ID`), ADD UNIQUE KEY `Question_ID` (`Question_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
