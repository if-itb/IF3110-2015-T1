-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 06:31 PM
-- Server version: 5.6.24-log
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
`answerID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vote` int(11) DEFAULT '0',
  `questionID` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answerID`, `name`, `email`, `content`, `date`, `vote`, `questionID`) VALUES
(1, 'cDCSDCADC', 'dininta-annisa@live.com', 'VWCDSCWDC', '2015-10-14 03:56:05', 0, 24),
(2, 'DWCWDC', 'icha@spartahmif.com', 'DWCWCWQC', '2015-10-13 11:24:55', 3, 24);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`questionID` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `question_topic` text NOT NULL,
  `content` text NOT NULL,
  `vote` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answers` int(10) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `name`, `email`, `question_topic`, `content`, `vote`, `date`, `answers`) VALUES
(24, 'Zulva', 'nadine_novie@yahoo.com', 'Zulva mau nanya', 'Lorem ipsum dolor sit amet, odio laboramus vix id. Vim facilisi petentium suscipiantur no, eos sapientem adolescens in. Quo voluptua iracundia eu. Ne nostro constituam usu, et maiorum mnesarchum has. Ne mollis omittam per, nisl sint possim vel ea. Iusto commodo civibus ea qui, an rebum altera molestiae sit. Scaevola deserunt democritum nec at. At sumo habeo erroribus nec, commune postulant an eum. In sea meliore sensibus, usu nihil verterem in, labitur veritus cu vel. Ut tation epicurei voluptaria vel. Iuvaret constituam est at. Eam aliquip verterem id, vim veniam bonorum vulputate ea, iudico option repudiare at qui. Pro no dicta offendit noluisse.', 6, '2015-10-14 03:56:02', 2),
(25, 'Icha', 'tes@123.com', 'Mau tanya', 'Lorem ipsum dolor sit amet, odio laboramus vix id.', 1, '2015-10-14 16:29:35', 0),
(26, 'chaer', 'icha@spartahmif.com', 'test', 'Lorem ipsum dolor sit amet, odio laboramus vix id.', 0, '2015-10-12 10:21:25', 0),
(27, 'ica', '13513066@std.stei.itb.ac.id', 'lalal', 'ica ip 4', 0, '2015-10-12 10:37:57', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `questionID` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
