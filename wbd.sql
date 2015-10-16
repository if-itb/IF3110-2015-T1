-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 01:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`IDAns` int(11) NOT NULL,
  `IDQ` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `Answer` text NOT NULL,
  `Vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`IDAns`, `IDQ`, `Nama`, `Email`, `Answer`, `Vote`) VALUES
(13, 47, 'wdqidjoi', 'oif@hotmail.com', 'ifeoeoefew', 0),
(14, 47, 'emfejqafoi', 'epi@gmail.com', 'ipefpoiweiofwoeijfpq', 0),
(15, 48, 'dasadadsa', 'dasdadad@gmail.com', '', 0),
(16, 48, 'adadad', 'adadadad@gmail.com', 'asdsadasda', 0),
(22, 51, 'Luminto', 'lumintolhur@gmail.com', 'Bacot', 15),
(23, 51, 'afasdsa', 'dasdasdas@yahoo.com', 'dasdasdasda', 2),
(24, 51, 'Luminto', '13513080@std.stei.itb.ac.id', 'bacot', 6);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`IDQ` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `QuestionTopic` varchar(30) NOT NULL,
  `Content` text NOT NULL,
  `Vote` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`IDQ`, `Nama`, `Email`, `QuestionTopic`, `Content`, `Vote`) VALUES
(51, 'fqkwfqoiwfj', 'iqejfoieqoi', 'ifjofioi', 'gjwogiewewg', 17),
(52, 'fqijqi', 'ifiqfoiq', 'iifiefjqpi', 'pifqpfjpqefqfe', 0),
(53, 'adadadadadadad', 'dadadadada@gmail.com', 'adadada', 'adadadada', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`IDAns`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`IDQ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `IDAns` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `IDQ` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
