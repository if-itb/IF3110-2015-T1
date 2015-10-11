-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2015 at 02:26 PM
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
`a_id` int(11) NOT NULL,
  `a_vote` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_content` varchar(5000) NOT NULL,
  `a_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `a_vote`, `q_id`, `a_name`, `a_email`, `a_content`, `a_date`) VALUES
(2, 0, 13, 'VanjiSekian', 'vanjisekian@gmail.com', 'abrakadabra kamehameha duar duar jedor jedor beledur jelegur bom buarrrrrr meledak bro bro bro bro bro sis sis sis sis durrrrr', '2015-10-11 11:43:17'),
(3, 0, 13, 'VanjiSekian1', 'vanjisekian1@gmail.com', 'kamehameha abrakadabra duar duar jedor jedor beledur jelegur bom buarrrrrr meledak brosis jebom', '2015-10-11 11:43:17'),
(7, 0, 14, 'a', 'blackjack.vaporizer@gmail.com', 'saidowqoid saiojd wqoij doiwq diowq jdiwqid jioqwj doijq wiodj iwqoj diqw jid', '2015-10-11 12:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`q_id` int(11) NOT NULL,
  `q_name` varchar(30) NOT NULL,
  `q_email` varchar(40) NOT NULL,
  `q_topic` varchar(100) NOT NULL,
  `q_content` text NOT NULL,
  `q_vote` int(11) NOT NULL,
  `q_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_name`, `q_email`, `q_topic`, `q_content`, `q_vote`, `q_date`) VALUES
(13, 'Ih', 'Kasi', 'an', 'Abis. ini we yg dihapus', 0, '2015-10-10 16:51:33'),
(14, 'Lagih', 'Tambahin', 'dikit', 'we. wkwk. Abis. ini we yg dihapus', 0, '2015-10-10 16:51:44'),
(15, 'Vanji28', 'vanji28@gmail.com', 'Tetep bisa kan?', 'bisa lah bisa lah ieu masa ga bisa yang boneng gans boneng lah', 0, '2015-10-11 10:14:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
