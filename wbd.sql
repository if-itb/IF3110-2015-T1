-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2015 at 09:48 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `A_ID` int(20) NOT NULL AUTO_INCREMENT,
  `A_Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `A_Email` varchar(30) COLLATE utf8_bin NOT NULL,
  `A_Content` text COLLATE utf8_bin NOT NULL,
  `Q_ID` int(20) NOT NULL,
  `A_Vote` int(20) NOT NULL DEFAULT '0',
  `A_Datetime` datetime NOT NULL,
  PRIMARY KEY (`A_ID`),
  KEY `Q_ID` (`Q_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=25 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`A_ID`, `A_Name`, `A_Email`, `A_Content`, `Q_ID`, `A_Vote`, `A_Datetime`) VALUES
(12, 'jambu', 'jasdmasdma', 0x7361646d6173646d61736d64, 7, 0, '2015-10-07 03:25:59'),
(13, 'Anon', 'gazandic@gmail.com', 0x536573756e676775686e7961207465726c616c75, 9, 0, '2015-10-07 03:31:36'),
(14, 'asdasd', 'asasdas', 0x617364617364617364617364, 9, 0, '2015-10-08 12:35:06'),
(15, 'asda', 'asdasd', 0x617364617364617364, 9, 0, '2015-10-07 03:36:49'),
(16, 'asdasd', 'asdasda', 0x617364617364617364, 9, 0, '2015-10-07 08:38:10'),
(17, 'gazandi', 'gazandic@gmail.com', 0x64696b6172656e616b616e207065727365707369206d616e75736961206d656d62756174206b69746120626572616e67676170616e207365706572746920697475, 1, 23, '2015-10-08 10:33:31'),
(18, 'aidin', 'aidin@gmail.com', 0x6b6172656e6120616e646120746964616b2062657273756e676775682d73756e676775682c206b7572616e6720646f612c206b7572616e6720746177616b6b616c, 2, 19, '2015-10-08 11:04:37'),
(19, 'aidin', 'aidin@gmail.com', 0x6a616469206173642061732064612073646120647320676164206262642066766d762066646d762020737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373200d0a73646673646673642073666473647364667366200d0a73667364667364667364207364667364667364667364736620737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373, 1, 10, '2015-10-08 11:10:13'),
(20, '', '', 0x61736467, 5, 1, '2015-10-08 03:28:39'),
(21, 'asdasd', 'asdasda', 0x617364617364, 1, 8, '2015-10-08 03:30:48'),
(22, 'asdasd', 'asdasd', 0x616473617364, 1, 7, '2015-10-08 03:31:02'),
(23, 'asdasdasd', 'adsasd', 0x61736461736461, 1, 5, '2015-10-08 03:31:33'),
(24, 'asu', 'asdasdas@a.sas', 0x617364617364, 1, 11, '2015-10-09 06:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `Q_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Q_Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `Q_Email` varchar(30) COLLATE utf8_bin NOT NULL,
  `Q_Topic` text COLLATE utf8_bin NOT NULL,
  `Q_Content` text COLLATE utf8_bin NOT NULL,
  `Q_Vote` int(20) NOT NULL DEFAULT '0',
  `Q_SumAns` int(20) NOT NULL DEFAULT '0',
  `Q_Datetime` datetime NOT NULL,
  PRIMARY KEY (`Q_ID`),
  KEY `Q_ID` (`Q_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Q_ID`, `Q_Name`, `Q_Email`, `Q_Topic`, `Q_Content`, `Q_Vote`, `Q_SumAns`, `Q_Datetime`) VALUES
(1, 'd', 'gazandic@gmail.com', 0x6464, 0x736466, 12, 6, '2015-10-10 12:33:05'),
(2, 'gazandi', 'gazandic@gmail.com', 0x6d656e676170612073656c616c75206b75727573203f, 0x6d656e67617061206e696c616920736179612073656c616c75206b7572757320613f, 21, 1, '2015-10-09 06:48:13'),
(3, 'wawan', 'wawan@gmail.com', 0x6d656e67617061203f, 0x73656c616c75206461746172, 0, 0, '2015-10-08 11:07:59'),
(4, 'aidin jambu mete', 'aidin@gmail.com', 0x6a616d62752062657262656e74756b20617061203f, 0x736179612062696e67756e672062656e74756b206a616d62752062657275706120617061203f, 0, 0, '2015-10-08 11:49:30'),
(6, 'ff', 'o@gh.ok', 0x6666, 0x6666, 0, 0, '2015-10-08 03:37:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
