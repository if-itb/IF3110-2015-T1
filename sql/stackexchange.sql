-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 06:59 AM
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
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `QID` int(11) NOT NULL,
`AID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Content` longtext NOT NULL,
  `Date` date NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`QID`, `AID`, `Name`, `Email`, `Content`, `Date`, `vote`) VALUES
(1, 1, 'Elvan Owen', 'Elvan@gmail.com', 'Elvan Owen', '2015-10-10', 0),
(2, 2, 'Elvan Owen', 'Elvan@gmail.com', '19', '2015-10-10', 0),
(1, 13, 'Rand', 'Randi@yahoo.com', 'Elvan O', '2015-10-10', 0),
(3, 14, 'Randi', 'Randi@yahoo.com', '5678', '2015-10-10', 0),
(11, 15, 'Randi', 'Randi@yahoo.com', 'Randi Chilyon', '2015-10-10', 0),
(11, 16, 'Randi', 'Randi@yahoo.com', 'RCA', '2015-10-10', 0),
(12, 17, 'Elvan Owen', 'elvan@gmail.com', '19', '2015-10-10', 0),
(15, 18, 'Randi', 'Randi@yahoo.com', 'RCA', '2015-10-10', 0),
(15, 19, 'Randi', 'Randi@yahoo.com', 'Randi Chilyon', '2015-10-10', 0),
(12, 20, 'randi', 'Randi@yahoo.com', '15', '1970-01-01', 0),
(12, 21, 'Randi', 'Randi@yahoo.com', '45', '2015-10-11', 0),
(17, 22, 'Randi Chilyon', '222@gmail.co.id', 'awqe', '2015-10-11', 0),
(18, 23, '12', 'elvan@gmail.com', '123', '2015-10-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`QID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Topic` varchar(100) NOT NULL,
  `Content` text NOT NULL,
  `Date` date NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QID`, `Name`, `Email`, `Topic`, `Content`, `Date`, `vote`) VALUES
(12, 'Elvan', 'elvan@gmail.com', 'Umur', 'Berapa Umur Saya?', '2015-10-10', 0),
(15, 'Randi', 'chilyon@yahoo.com', 'Siapa', 'Siapa Nama saya', '2015-10-10', 0),
(17, 'Randi', 'ra@gmail.coma', 'Berhitung', '12345678910111213141516171819202122232425262728293031323334353637383940', '2015-10-11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`QID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
