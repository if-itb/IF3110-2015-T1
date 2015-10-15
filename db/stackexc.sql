-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2015 at 05:39 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stackexc`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id_a` int(9) NOT NULL,
  `q_id` int(9) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `vote` int(9) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_a`, `q_id`, `content`, `date`, `vote`, `username`, `email`) VALUES
(1000, 1, 'Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1Untuk answer 1 pertanyaan 1', '2015-10-11 06:11:37', -1, 'tama', 'tamadamanik@gmail.com'),
(1001, 1, 'Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1Untuk answer 2 pertanyaan 1', '2015-10-11 06:12:01', 0, 'tata', 'tata@yahoo.com'),
(3000, 3, 'Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2Untuk answer 1 pertanyaan 2', '2015-10-11 06:12:25', 0, 'budi', 'budi@gmail.com'),
(4000, 4, 'Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3Untuk answer 1 pertanyaan 3', '2015-10-11 06:12:42', 0, 'tama', 'tamadamanik@yahoo.co.id'),
(4001, 4, 'Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3Untuk answer 2 pertanyaan 3', '2015-10-11 06:12:59', 0, 'tama-', 'tamadamanik@yahoo.co.id'),
(4002, 4, 'Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3Untuk answer 3 pertanyaan 3', '2015-10-11 06:13:13', 0, 'tata', 'tata@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_q` int(9) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `vote` int(9) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_q`, `title`, `content`, `vote`, `date`, `username`, `email`) VALUES
(1, 'First Ever Question', 'lorem ipsum lorem ipsum  lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange simple stack exchange ', 7, '2015-10-07 18:20:01', 'tamanugraha', 'tama.damanik@yahoo.co.id'),
(3, 'Another Question', ' more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char', 2, '2015-10-10 13:47:19', 'tatamadamanik', 'tatamadamanik@gmail.com'),
(4, 'Try from ask here', 'Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here', -1, '2015-10-10 23:27:31', 'Tama', 'tama.damanik@yahoo.co.id'),
(5, 'Fourth Question Test :D', 'Fourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth QuestionFourth Question', 0, '2015-10-11 06:18:28', 'tama_n', 'tama.damanik@yahoo.co.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`id_a`), ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`id_q`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `question` (`id_q`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
