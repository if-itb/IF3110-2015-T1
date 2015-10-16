-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2015 at 12:11 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stackexchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`ID` int(12) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Content` text NOT NULL,
  `Quest_ID` int(12) NOT NULL,
  `Vote` int(12) NOT NULL,
  `Date_Create` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ID`, `Name`, `Email`, `Content`, `Quest_ID`, `Vote`, `Date_Create`) VALUES
(5, 'try', 'cintaparent@gmail.com', 'huhan', 3, 0, '0000-00-00 00:00:00'),
(9, 'Try ', 'cintaparent@gmail.com', 'hhahah', 4, 0, '2015-10-14 00:00:00'),
(10, 'try', 'try@gmail.com', 'rararar\r\n\r\n', 4, 0, '2015-10-13 00:00:00'),
(17, 'try', 'cintaparent@gmail.com', 'guna dharma ', 7, 0, '2015-10-15 15:23:19'),
(19, 'Tru', 'cintaparent@gmail.com', 'selalu ada ', 8, 2, '2015-10-16 14:59:11'),
(20, 'Geraldi ', 'geraldi_saya@yahoo.com', 'sangkuriang berasal dari bandung', 9, 0, '2015-10-16 15:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`ID` int(12) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Topic` varchar(256) NOT NULL,
  `Content` text NOT NULL,
  `Vote` int(12) NOT NULL,
  `Date_Create` date NOT NULL,
  `Date_Edit` date NOT NULL,
  `IsDelete` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `Name`, `Email`, `Topic`, `Content`, `Vote`, `Date_Create`, `Date_Edit`, `IsDelete`) VALUES
(7, 'Mochamad ', 'cintaparent@gmail.com', 'WBS', 'Model proses yang kami gunakan ', 17, '2015-10-14', '0000-00-00', 0),
(8, 'Dinan', 'fakhri@yahoo.com', 'UBT', 'Unit Bulu Tangkis\r\n', 7, '2015-10-14', '0000-00-00', 0),
(9, 'Try', 'cintaparent@gmail.com', 'Legenda Sangkuriang', 'Sangkuriang  ', 1, '2015-10-16', '0000-00-00', 0);

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
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
