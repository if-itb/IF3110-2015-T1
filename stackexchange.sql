-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 03:00 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stackexchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id_answer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `votecounts` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id_answer`, `id_question`, `name`, `email`, `votecounts`, `content`, `timestamp`) VALUES
(5, 4, 'Budi Santoso', 'budi@gmail.com', 4, 'What a great question!', '2015-10-15 12:49:20'),
(6, 4, 'John Smith', 'johnsmith@gmail.com', 0, 'Thanks.', '2015-10-15 12:49:34'),
(7, 3, 'Budi Santoso', 'budi@gmail.com', 0, 'Sorry i dont understant your language.', '2015-10-15 12:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `votecounts` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_question`, `name`, `email`, `topic`, `votecounts`, `content`, `timestamp`) VALUES
(3, 'Husni Munaya', 'husnimun@gmai.com', 'Lorem ipsum dolor sit amet', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis sapiente ipsam, sunt eius esse perferendis quaerat? Animi, magnam tempora libero nam modi recusandae porro temporibus cupiditate, natus quae quisquam voluptates. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dicta rerum ducimus excepturi, ipsam nostrum possimus! Dolore cum harum tempore, expedita officia, laboriosam hic sunt, explicabo voluptate, in repudiandae voluptas.', '2015-10-15 12:48:25'),
(4, 'John Smith', 'johnsmith@gmail.com', 'Consectetur adipisicing elit', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, facere, vitae? Ut aliquid laborum eaque, quibusdam velit ipsum harum asperiores praesentium vero laboriosam sit distinctio, officia, quas voluptates, sint molestias. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt obcaecati cumque voluptas est iusto, sit, consequuntur quo consequatur aperiam quibusdam, doloremque quis perferendis explicabo dignissimos assumenda illum, temporibus quos magni.', '2015-10-15 12:49:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `FOREIGN_KEY` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
