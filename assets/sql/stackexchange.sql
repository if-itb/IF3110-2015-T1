-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2015 at 07:30 AM
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
`ans_id` int(10) NOT NULL,
  `ans_name` varchar(50) NOT NULL,
  `ans_email` varchar(50) NOT NULL,
  `ans_q_id` int(10) NOT NULL,
  `ans_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ans_content` text NOT NULL,
  `ans_vote` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `ans_name`, `ans_email`, `ans_q_id`, `ans_time`, `ans_content`, `ans_vote`) VALUES
(3, 'pipin', 'farid@akbar.com', 16, '2015-10-12 20:50:26', 'apanya kau boy. enngak kenapa?', -1),
(4, 'farid', 'farid@akbar.com', 16, '2015-10-12 20:50:57', 'gapapa. kan aku nanyak salah -_-', 2),
(5, 'pipin', 'pipin_k@ymail.com', 16, '2015-10-12 20:51:39', 'jan lebay -_-', 2),
(6, 'pipin', 'pipin_k@ymail.com', 25, '2015-10-13 17:29:24', 'hhah iya?', 2),
(8, 'pipin', 'pipin_k@ymail.com', 32, '2015-10-16 12:26:57', 'bukan saya jugaaaaa :D', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`q_id` int(10) NOT NULL,
  `q_name` varchar(50) NOT NULL,
  `q_email` varchar(50) NOT NULL,
  `q_topic` varchar(100) NOT NULL,
  `q_content` text NOT NULL,
  `q_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `q_vote` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_name`, `q_email`, `q_topic`, `q_content`, `q_time`, `q_vote`) VALUES
(16, 'farid', 'farid@akbar.com', 'cieeee', 'wak besok kau kemana?', '2015-10-12 20:47:45', 1),
(17, 'zulva', 'zulvaf@gmail.com', 'haloohalo', 'Lorem Ipsum is simply dummy', '2015-10-13 15:25:52', 0),
(18, 'zulva', 'zulvaf@gmail.com', 'lorem ipsum', 'Hello im trying to get my login system going and i keep getting this error here is my code:', '2015-10-13 15:31:38', 0),
(21, 'venny', 'vennylaras@gmail.com', 'stay', 'I need some time just deliver the things that I need for now\r\nEverything that I feels', '2015-10-13 15:34:24', 0),
(25, 'vany', 'vanya@gmail.com', 'tegar', 'haaai pin tadi doi ngechat gue:)))', '2015-10-13 17:28:42', 0),
(27, 'putra', 'putra@schemo.com', 'apoy', 'haaaai apoy poooy poyyy', '2015-10-13 17:46:35', 0),
(28, 'visat', 'visat@gmail.com', 'cewe', 'pin di kelas cv ada cewe baru ga?', '2015-10-13 17:49:32', -2),
(29, 'visat', 'visat@gmail.com', 'kelas', 'pin tungguin kelas cv jan ditinggal awas lo', '2015-10-13 17:50:50', 0),
(32, 'luqman', 'luqman@imba.com', 'bukan saya', 'saya yakin ada query yg lebih optimal, tapi yang bisa buat bukan sayaaa', '2015-10-14 11:58:39', -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`ans_id`,`ans_name`,`ans_email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`q_id`,`q_name`,`q_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `ans_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
