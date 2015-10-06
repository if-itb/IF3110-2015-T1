-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 04:33 PM
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
`num_answer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `answer_date` datetime NOT NULL,
  `num_votes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`num_answer`, `id_question`, `username`, `email`, `content`, `answer_date`, `num_votes`) VALUES
(1, 5, 'sdfsdf', 'fsdfs', 'fsdfsdf', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`id_question` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `question_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic` varchar(100) NOT NULL,
  `num_vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `username`, `email`, `content`, `question_date`, `topic`, `num_vote`) VALUES
(3, 'devina_deph', 'devinaa@gmail.com', 'What is Stack Exchange?', '2015-10-05 22:33:53', 'Stack Exchange', 0),
(4, 'irene', 'irene@gmail.com', 'How to use Stack Exchange?', '2015-10-05 22:36:36', 'Stack Exchange', 0),
(5, 'candyolivia', 'candycandy@gmail.com', 'How to install PHP?', '2015-10-05 22:38:20', 'PHP', 0),
(8, 'candy', '13513031@std.stei.itb.ac.id', 'How to connect SQL by using PHP?', '2015-10-06 20:15:26', 'PHP and SQL', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`num_answer`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `num_answer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
