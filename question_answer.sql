-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 02:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `question_answer`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`A_id` int(5) NOT NULL,
  `Q_id` int(5) NOT NULL,
  `A_Name` varchar(35) NOT NULL,
  `A_Email` varchar(35) NOT NULL,
  `A_Content` varchar(3000) NOT NULL,
  `A_Vote` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`A_id`, `Q_id`, `A_Name`, `A_Email`, `A_Content`, `A_Vote`) VALUES
(21, 9, 'Putra', 'q', 'sxsax', 0),
(22, 9, 'Putra', 'poy@poy.poy', 'poy apoy poypoy', 0),
(24, 10, 'Putra', 'rizdaputra@gmail.com', 'poyyyy poyyy apoyyyy', -2),
(25, 9, 'try', 'try@gmail.com', 'try alay', 0),
(26, 10, 'Putra', 'rizdaputra@gmail.com', 'askanskna', 2),
(27, 10, 'asd', 'poy@poy.poy', 'aasas', 2),
(28, 19, 'asd', 'poy@poy.poy', 'asa', 0),
(29, 22, 'Halo juga', 'poy@poy.poy', 'hai', 0),
(30, 23, 'poy', 'poy@poy.poy', 'poyyy apooyyyy poy poy poy apoyyyyyy poy poy poy poyyyyy poy apoy poypoypoyyyyy poy poypoyyyy poyyy apooyyyy poy poy poy apoyyyyyy poy poy poy poyyyyy poy apoy poypoypoyyyyy poy poypoyyyy poyyy apooyyyy poy poy poy apoyyyyyy poy poy poy poyyyyy poy apoy poypoypoyyyyy poy poypoyyyy poyyy apooyyyy poy poy poy apoyyyyyy poy poy poy poyyyyy poy apoy poypoypoyyyyy poy poypoyyyy poyyy apooyyyy poy poy poy apoyyyyyy poy poy poy poyyyyy poy apoy poypoypoyyyyy poy poypoyyyy poyyy apooyyyy poy poy poy apoyyyyyy poy poy poy poyyyyy poy apoy poypoypoyyyyy poy poypoyyyy', 15),
(31, 24, 'Putra', 'poy@poy.poy', 'Lorem ipsum dolor sit amet, sea quaeque iudicabit pertinacia no, cu choro audire aeterno nec, est reque viris at. Sit eu ludus altera labores, pertinacia vituperatoribus pro ex. Amet magna verear sea cu, cu deserunt comprehensam conclusionemque vis. Est augue singulis cu. Sit tation vivendo ut, simul tacimates quo ad, pri exerci nemore conclusionemque cu. Nostro melius scribentur ea vix, odio porro eu est, ut deserunt reprimique est. Et ipsum affert equidem est, mei rebum primis reprimique et, ad per decore sapientem intellegat. Odio idque eam et. An sonet doming eos, quo no wisi tempor viderer, sed cu eruditi imperdiet incorrupte. Ad vix altera repudiare temporibus. Quo probo etiam legere ea. Vis ferri porro mentitum cu, no vix enim nominati. Vim an graece adipiscing suscipiantur, duo dico epicurei no. Latine nominati ex pri, has ex quodsi persius corpora. Partem euripidis mnesarchum in eum, ad mel adolescens consectetuer. Ad amet iuvaret mei, et his vidit consul liberavisse.', 20),
(32, 23, 'Putra', 'rizdaputra@gmail.com', 'aku', -8),
(33, 25, 'asd', 'asd@fgh.jkl', 'alay', 2),
(37, 25, 'a', 'asd@fgh.jkl', 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`Q_id` int(5) NOT NULL,
  `Q_Name` varchar(35) NOT NULL,
  `Q_Email` varchar(35) NOT NULL,
  `Q_Topic` varchar(90) NOT NULL,
  `Q_Content` varchar(3000) NOT NULL,
  `Q_Vote` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Q_id`, `Q_Name`, `Q_Email`, `Q_Topic`, `Q_Content`, `Q_Vote`) VALUES
(10, 'Apoy', 'poy@poy.poy', 'apoy poy poypoy', 'poyyyyapoyy poy apoy poy apoy', 19),
(23, 'poy', 'poy@poy.poy', 'Apoy poy', 'poyyy apooyyyy poy poy poy apoyyyyyy poy poy poy poyyyyy\r\npoy apoy poypoypoyyyyy\r\npoy poypoyyyy poy apoy poypoypoyyyyy\r\npoy poypoyyyy poy apoy poypoypoyyyyy\r\npoy poypoyyyy', 18),
(24, 'Putra', 'rizdaputra@gmail.com', 'aku', 'Lorem ipsum dolor sit amet, sea quaeque iudicabit pertinacia no, cu choro audire aeterno nec, est reque viris at. Sit eu ludus altera labores, pertinacia vituperatoribus pro ex. Amet magna verear sea cu, cu deserunt comprehensam conclusionemque vis. Est augue singulis cu. Sit tation vivendo ut, simul tacimates quo ad, pri exerci nemore conclusionemque cu. Nostro melius scribentur ea vix, odio porro eu est, ut deserunt reprimique est.\r\n\r\nEt ipsum affert equidem est, mei rebum primis reprimique et, ad per decore sapientem intellegat. Odio idque eam et. An sonet doming eos, quo no wisi tempor viderer, sed cu eruditi imperdiet incorrupte. Ad vix altera repudiare temporibus. Quo probo etiam legere ea.\r\n\r\nVis ferri porro mentitum cu, no vix enim nominati. Vim an graece adipiscing suscipiantur, duo dico epicurei no. Latine nominati ex pri, has ex quodsi persius corpora. Partem euripidis mnesarchum in eum, ad mel adolescens consectetuer. Ad amet iuvaret mei, et his vidit consul liberavisse.', 5),
(25, 'abc', 'def@ghi.jkl', 'mno', 'pqrstu', -3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`Q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `A_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `Q_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
