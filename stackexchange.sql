-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 07:35 PM
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
  `answer_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `num_votes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`num_answer`, `id_question`, `username`, `email`, `content`, `answer_date`, `num_votes`) VALUES
(24, 8, 'olivia', 'olivia@stei.itb.ac.id', '\r\n\r\nProblem solved... The first answer is to install the correct SQL Server drivers, which may force you to use an older version of PHP, XAMPP, and Apache Web Server...info can be found here;\r\n\r\nFor me it was necessary to install an older version of XAMPP, the most recent release for my system (WinXP, PHP 5.2.4) is XAMPP 1.6.4, which can be found here. Find the most compatible version of XAMPP for your system by checking out this article. Be sure you choose the most recent XAMPP release that is compatible with your version of PHP.\r\n\r\nThe next problem was the installation of SQL Server drivers. It turns out that the php configuration file(php.ini) can be found in two places in the XAMPP 1.6.4 installation directory. The first location is D:/xampp/php/php.ini, which is the file that the documentation and all forums suggest you modify in order to add the extensions...however, it was necessary to modify the php configuration file found in the Apache bin directory(D:/xamp/apache/bin/php.ini), from which XAMPP 1.6.4 is loading the php configuration file.\r\n\r\nThe topmost table of the phpInfo() page indicates the location of the loaded php configuration file. The table key is: Loaded Configuration File.\r\n', '2015-10-15 16:12:49', 2),
(25, 27, 'olivia', 'olivia@stei.itb.ac.id', 'I don''t know...', '2015-10-15 21:13:03', 0),
(26, 46, 'benita', 'benita@gmail.com', 'JavaScript is a programming language used to make web pages interactive. It runs on your visitor''s computer and doesn''t require constant downloads from your website. JavaScript is often used to create polls and quizzes.', '2015-10-15 23:55:34', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `username`, `email`, `content`, `question_date`, `topic`, `num_vote`) VALUES
(8, 'candy', '13513031@std.stei.itb.ac.id', 'How to connect SQL by using PHP?', '2015-10-06 20:15:26', 'PHP and SQL', 1),
(14, 'candy', 'candyoliviamawalim@gmail.com', 'I would like to create an HTML button that acts like a link. So, when you click the button, it redirects to a page. I would like it to be as accessible as possible.\r\n\r\nI would also like it so there aren''t any extra characters, or parameters in the URL.\r\n\r\nHow can I achieve this?', '2015-10-07 21:44:38', 'How to create an HTML button that acts like a link?', 0),
(25, 'candy', 'candycandy@gmail.com', 'I know I will be voted down for this, but I need to ask. What does the code below mean? Specifically, I am confused by', '2015-10-08 11:55:03', 'What exactly does the PHP function â€œtest_input()â€ do?', 2),
(46, 'olivia', 'olivia@stei.itb.ac.id', 'what is JavaScript?', '2015-10-15 23:54:41', 'JavaScript Definition', 1);

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
MODIFY `num_answer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
