-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 06:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coppeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `q_id`, `name`, `email`, `content`, `vote`) VALUES
(5, 2, 'Edward Elrich', 'ed.elrich@yahoo.com', 'Wah, bagus yah.', 1),
(6, 2, 'Muhtar', 'muhtarhartopo@gmail.com', 'Baru tahu', 0),
(9, 6, 'Edward Elrich', 'ed.elrich@yahoo.com', 'They would be a "breakroom", or "break room" a place where staff go when they have their breaks.\r\n\r\nhttp://dictionary.reference.com/browse/breakroom', 4),
(11, 6, 'Killua Zoldyck', 'killzoldyck@gmail.com', 'Masa nda nu tauki', -1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `name`, `email`, `topic`, `content`, `vote`) VALUES
(2, 'Muhtar', 'mhartopo@gmail.com', 'Piring', 'Piring adalah alat makan yang berbentuk datar dan juga ada yang sedikit cekung, di mana makanan disajjkan, terbuat dari kaca, rotan, porselen, batu, plastik, logam, atau gelas bahkan yang semakin berkembang terbuat dari melamin. Kadang-kadang kayu juga digunakan. Ada juga piring yang berfungsi sebagai penghias ruangan, biasanya berupa piring yang banyak hiasannya atau berbahan logam mulia atau batu mulia. Piring juga ada bermacam-macam ukuran. Untuk piring sekali pakai biasanya digunakan bahan dari kertas atau styrofoam.\r\n\r\nSeiring perkembangan zaman, piring tidak hanya menjadi alat makan. Piring juga bisa digunakan untuk keperluan lain seperti sebagai souvenir, plakat, dan media promosi.', 5),
(6, 'Muhtar Hartopo', 'muhtarhartopo@gmail.com', 'What is â€œa room a company provides for eating foodâ€ called?', 'Companies provide a room which has tables and chairs. In some companies, the room may have other things such as refrigerators and microwaves.\r\n\r\nI have been calling this place pantry, but I noticed that pantry is actually a storage for food in addition to kitchen.\r\n\r\nI want to know what the correct term is to call that place?', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
