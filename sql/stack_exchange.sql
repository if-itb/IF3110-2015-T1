-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2015 at 12:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

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
`Ans_ID` int(10) NOT NULL,
  `Que_ID` int(10) NOT NULL,
  `Answer` text NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Vote` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`Ans_ID`, `Que_ID`, `Answer`, `Name`, `Email`, `Date`, `Vote`) VALUES
(3, 4, 'Justru karena ia susah ditemukan, maka dia disukai.', 'Anonim', 'anon@informatika.org', '2015-10-15 23:32:53', 3),
(4, 4, 'askaska', 'Justin Fikri', 'jfikri@alo.co.jp', '2015-10-16 00:00:04', 0),
(5, 6, 'Aspirasi aku sih....\r\n\r\nAku lelah sama tubes ini. Semoga bisa dikurang-kurangi biar bisa fokus ke HMIF tanpa alasan lagi ada akademik.', 'Feryandi', 'feryandi@hmifdra.ma', '2015-10-16 05:23:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`ID` int(10) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Topic` varchar(256) NOT NULL,
  `Content` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Vote` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='tabel berisi pertanyaan';

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ID`, `Name`, `Email`, `Topic`, `Content`, `Date`, `Vote`) VALUES
(4, 'Ahmad Darmawan', 'adarwawan@gmail.com', 'Tentang senja?', 'Mengapa banyak orang yang lebih senang menikmati senja daripada mentari siang? Padahal jika mereka suka mentari siang mereka tidak perlu menunggu terlalu lama', '2015-10-16 00:00:16', 4),
(6, 'Ryan Yonata', 'ryan@hmifdra.ma', 'Motivasi kahim', 'Guys, aku mau ngahim nih. Kira-kira apa aspirasi yang bisa aku bawa ke kalian biar aku termotivasi bahwa diriku mewakili massa hmif.', '2015-10-16 05:22:32', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`Ans_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `Ans_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
