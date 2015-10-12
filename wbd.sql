-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 11:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `vote` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `name`, `email`, `content`, `date`, `vote`) VALUES
(27, 12, 'Cliff', 'cliffjs@santoso.com', 'Besok', '2015-10-10 23:29:28', 0),
(28, 12, 'Jonathan', 'joben@gmail.com', '2016', '2015-10-10 23:31:40', 0),
(33, 13, 'Kim Seolhyun', 'seolhyun95@gmail.com', 'Mau', '2015-10-12 09:44:35', 13),
(34, 13, 'DongDong', 'dongdong@gmail.com', 'Aku juga mau', '2015-10-12 09:46:34', 20),
(35, 13, 'Kwon Yuri', 'yuri@gmail.com', 'Sama aku ya', '2015-10-12 16:28:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `topic` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `vote` int(255) NOT NULL,
  `answers` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `nama`, `email`, `topic`, `content`, `date`, `vote`, `answers`) VALUES
(12, 'Empoleon', 'empoleon@pokemon.com', 'Pokemon', 'Kapan Pokemon GO keluar?', '2015-10-10 23:28:44', -3, 2),
(13, 'Steven Andianto', 'pangerankesepian@gmail.com', 'Cinta', 'Maukah kamu menjadi milikku?', '2015-10-12 09:44:06', 40, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
