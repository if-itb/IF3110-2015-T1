-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 08:20 PM
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
(1, 1, 'First Answer', '2015-10-07 18:21:08', 1, 'tata', 'tata@gmail.com'),
(2, 1, 'answer kedua', '2015-10-07 23:09:30', 1, 'budi', 'budi@gmail.com');

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
(1, 'First Question', 'TESQ 11', 0, '2015-10-07 18:20:01', 'tamanugraha', 'tama.damanik@yahoo.co.id'),
(2, 'Second Question', 'test', 1, '2015-10-07 23:08:58', 'tatama', 'tamadamanik@yahoo.co.id'),
(3, 'Another Question', ' more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char more than 100 char', 2, '2015-10-10 13:47:19', 'tatamadamanik', 'tatamadamanik@gmail.com'),
(4, 'Try from ask here', 'Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here Try from ask here', 0, '2015-10-10 23:27:31', 'Tama', 'tama.damanik@yahoo.co.id'),
(5, 'Second try', 'Second try Second try Second try Second try ', 0, '2015-10-11 01:03:43', 'tama_n', 'tamadamanik@yahoo.co.id'),
(6, 'Third retry', 'Third', 0, '2015-10-11 01:19:25', 'tata', 'tata@yahoo.com');

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
