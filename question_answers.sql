-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2015 at 04:28 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `question_answers`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`ID` int(4) NOT NULL COMMENT 'ID jawaban',
  `QuestionID` int(4) NOT NULL COMMENT 'ID pertanyaan yang dijawab',
  `Name` varchar(25) NOT NULL COMMENT 'Nama user yang menjawab',
  `Email` varchar(40) NOT NULL COMMENT 'Email user yang menjawab',
  `Content` text NOT NULL COMMENT 'Jawaban user',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Tanggal jawaban dikirim',
  `Vote` int(4) NOT NULL COMMENT 'Jumlah vote jawaban'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Berisi jawaban-jawaban dari pertanyaan' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ID`, `QuestionID`, `Name`, `Email`, `Content`, `Date`, `Vote`) VALUES
(1, 1, 'c', 'c@c.com', 'casd', '2015-10-14 07:27:42', 0),
(3, 1, 'nama', 'b@std.stei.itb.ac.id', 'isi', '2015-10-16 05:55:07', 0),
(4, 1, '123', 'octavianusmarcel12@gmail.com', 'asd', '2015-10-16 11:48:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`ID` int(4) NOT NULL COMMENT 'ID pertanyaan',
  `Name` varchar(25) NOT NULL COMMENT 'Nama user yang bertanya',
  `Email` varchar(40) NOT NULL COMMENT 'Email user yang bertanya',
  `Topic` varchar(100) NOT NULL COMMENT 'Topik yang ditanyakan',
  `Content` text NOT NULL COMMENT 'Isi pertanyaan',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Tanggal pertanyaan diajukan',
  `Vote` int(4) NOT NULL DEFAULT '0' COMMENT 'Jumlah vote pada pertanyaan'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Berisi pertanyaan-pertanyaan yang diajukan user' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `Name`, `Email`, `Topic`, `Content`, `Date`, `Vote`) VALUES
(1, 'ba', 'bauhu@something.com', 'asdsaad', 'fdbgiusd', '2015-10-16 11:48:16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID jawaban',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID pertanyaan',AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
