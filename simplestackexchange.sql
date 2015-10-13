-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2015 at 07:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplestackexchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`ID` int(15) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Content` text NOT NULL,
  `Question_ID` int(15) NOT NULL,
  `Vote` int(15) NOT NULL,
  `Date_Created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ID`, `Name`, `Email`, `Content`, `Question_ID`, `Vote`, `Date_Created`) VALUES
(8, 'Ryan Yonata', 'ryan.yonata@gmail.com', 'Emangggggg. Baru tau?', 4, 23, '2015-10-13 00:00:00'),
(9, 'Ryan Yonata', 'ryan.yonata@gmail.com', 'Test ah', 4, -9, '2015-10-13 00:00:00'),
(10, 'Ryan Yonata', 'ryan.yonata@gmail.com', '... completely transparent. The top, right, bottom, and left margin can be changed independently using separate properties. A shorthand margin property can also be used, to change all margins at once. ... auto, The browser calculates a margin.', 4, 12, '2015-10-13 00:00:00'),
(11, 'Ryan Yonata', 'ryan.yonata@gmail.com', 'Hah', 4, 0, '2015-10-13 14:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`ID` int(15) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Topic` varchar(256) NOT NULL,
  `Content` text NOT NULL,
  `Vote` int(15) NOT NULL,
  `Date_Created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `Name`, `Email`, `Topic`, `Content`, `Vote`, `Date_Created`) VALUES
(4, 'Ryan Yonata', 'ryan.yonata@gmail.com', 'Test', 'Putra bacot banget dah yak', 10, '2015-10-14 00:11:07'),
(5, 'Ryan Yonata', 'ryan.yonata@gmail.com', 'hhhhhhhhhhh', 'Apalau', 14, '2015-10-13 00:00:00'),
(6, 'Rendi Ahmad Rustandi', 'rendi@gmail.com', 'Test Q Panjang', 'In addition to canby23 at ms19 post\r\nIts a very bad idea to consider day having 24 hours 86400 secs because some days have 23 some 25 hours due to daylight saving changes. Using of mkdate and strtotime is always preferred. strtotime also has a very nice behaviour of datetime manipulations AAAAA In addition to canby23 at ms19 post\r\nIts a very bad idea to consider day having 24 hours 86400 secs because some days have 23 some 25 hours due to daylight saving changes. Using of mkdate and strtotime is always preferred. strtotime also has a very nice behaviour of datetime manipulations', -1, '2015-10-13 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
