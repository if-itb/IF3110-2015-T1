-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 10:50 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simplestack`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `A_ID` int(3) NOT NULL,
  `Q_ID` int(3) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Content` varchar(12000) NOT NULL,
  `Vote` int(3) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`A_ID`, `Q_ID`, `Name`, `Email`, `Content`, `Vote`, `Date`) VALUES
(1, 1, 'Ben', 'Ben@gmail.com', 'Hi Dick, I once has the same problem as you.\r\nThe most important thing in this situation is to remain calm and composed.\r\n\r\nFirst, search your surrounding for a long and slender object. Then, look for something that can be used as a lubricant.\r\n\r\nThe main idea is to lubricate your genital and try to slide it out with the long object.\r\n\r\nHope this helps!', 5, '2015-10-12 11:41:55'),
(2, 1, 'Ben', 'Ben@gmail.com', 'Hi Dick, I once has the same problem as you. The most important thing in this situation is to remain calm and composed. First, search your surrounding for a long and slender object. Then, look for something that can be used as a lubricant. The main idea is to lubricate your genital and try to slide it out with the long object. Hope this helps!', -1, '2015-10-12 12:10:53'),
(8, 2, 'Dick', 'Dickinson@gmail.com', 'Hi Dick, I once has the same problem as you. The most important thing in this situation is to remain calm and composed. First, search your surrounding for a long and slender object. Then, look for something that can be used as a lubricant. The main idea is to lubricate your genital and try to slide it out with the long object. Hope this helps!', 1, '2015-10-12 15:47:50'),
(9, 2, 'Dick', 'Dickinson@gmail.com', 'Hi Ben, I once has the same problem as you. The most important thing in this situation is to remain calm and composed. First, search your surrounding for a long and slender object. Then, look for something that can be used as a lubricant. The main idea is to lubricate your genital and try to slide it out with the long object. Hope this helps!', 2, '2015-10-12 15:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `Q_ID` int(3) NOT NULL,
  `Vote` int(3) NOT NULL,
  `Date` date NOT NULL,
  `Name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Content` varchar(12000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Q_ID`, `Vote`, `Date`, `Name`, `Email`, `Title`, `Content`) VALUES
(1, 3, '2015-10-01', 'Dick', 'Dick@gmail.com', 'HALP!', 'Halp! My d*ck is stuck on the air conditioner what should I do?'),
(2, 1, '2015-10-08', 'Ben', 'Ben@gmail.com', 'HALP!', 'Help! My d*ck is stuck on the fridge, what should I do?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `Q_ID` (`Q_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Q_ID`),
  ADD UNIQUE KEY `Q_ID` (`Q_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `A_ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Q_ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`Q_ID`) REFERENCES `question` (`Q_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
