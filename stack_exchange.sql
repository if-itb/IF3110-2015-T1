-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 06:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stack_exchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `question_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` longtext NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`question_id`, `name`, `email`, `content`, `votes`) VALUES
(1, 'Dino', 'dino@itb.ac.id', 'Saya Dino.\r\nKamu siapa ?', 0),
(1, 'dina', 'dina@ymail.com', 'Saya Dina.', 0),
(2, 'Bill', 'bill@microsoft.com', 'Di kampus', 0),
(3, 'Jack', 'jack@jack.co.id', 'karena keinginan', 0),
(3, 'Vince', 'vince@std.stei.itb.ac.id', 'karena kebetulan.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `name`, `email`, `topic`, `content`, `votes`) VALUES
(1, 'Andi', 'andi@gmail.com', 'Siapa Anda', 'Siapa Anda ?', 0),
(2, 'Budi', 'budi@yahoo.com', 'Di Mana ', 'Ada di mana saya ?', 0),
(3, 'Joe', 'joe@hotmail.com', 'Kenapa Anda ', 'Kenapa Anda berada di sini ?', 0),
(4, 'John', 'john@hotmail.com', 'Who Am I', 'Who am I ?\r\nDo you know me ?\r\nhaha...', 0),
(5, 'Greg', 'greg@hello.com', 'Stack Exchange', 'What is stack exchange ?', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`question_id`), ADD KEY `question_id` (`question_id`), ADD KEY `question_id_2` (`question_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
