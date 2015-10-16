-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 09:58 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answerer_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answerer_email` varchar(100) NOT NULL,
  `answer_content` text NOT NULL,
  `answer_vote` int(11) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id_index` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answerer_name`, `answerer_email`, `answer_content`, `answer_vote`, `question_id`) VALUES
(13, 'admin', 'admin@live.com', 'Website ini untuk nanya-nanya tentang berbagai macam hal mas, kalo mau nanya monggo ya, siapa tau yang laen bisa bantuin mas.. hehe', 1, 9),
(14, 'Roni', 'roni@yahool.com', 'Untuk nanya-nanya doang kok', 3, 9),
(15, 'William', 'william@gmail.com', 'Coba cari apa yang namanya integral deh. Ini referensinya :\r\nIntegral adalah sebuah konsep penjumlahan secara berkesinambungan dalam matematika, dan bersama dengan inversnya, diferensiasi, adalah satu dari dua operasi utama dalam kalkulus. Integral dikembangkan menyusul dikembangkannya masalah dalam diferensiasi di mana matematikawan harus berpikir bagaimana menyelesaikan masalah yang berkebalikan dengan solusi diferensiasi. Lambang integral adalah int,\r\nBila diberikan suatu fungsi f dari variabel real x dengan interval [a, b] dari sebuah garis lurus, maka integral tertentu', 6, 10),
(16, 'Rachel', 'rachel@live.com', 'That would be an alleged affair but no not why he stepped down. ', 0, 11),
(17, 'alex', 'alex@yahoo.com', 'From his own answer on Quora; \r\n"When I said that my leadership style is based on listening, I meant it. You may have trouble believing this – I truly didn’t seek public office to be someone, but to do something for our country. \r\n\r\nI know people are angry at Congress. I know people are frustrated by Washington’s seeming inability to do the work that you send people there to do. I know people are skeptical of anything an elected official has to say. To be completely candid, I understand why you feel that way, because I feel the same way. \r\n\r\nI truly believe that we are here as public servants; our job is to work for you – period. Your public servants should not be here to gain power or positions; we should be here to do what’s best for our country. \r\n\r\nHouse Republicans need a new leader that can unite them, and after many days of talking with my colleagues, it became clear that I would not be that person. The selection of a new Speaker can never be about a single person, it must be about doing what s right for the country. \r\n\r\nWe need a new start – a fresh face who can bring Congress together. I hope that my choice will help heal the wounds that are keeping well-meaning people from finding common cause for our country. \r\n"', 0, 11),
(18, 'billy', 'billy@rocketmail.com', 'No, dont upgrade ', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `asker_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asker_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `question_topic` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `question_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `question_vote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `asker_name`, `asker_email`, `question_topic`, `question_content`, `question_vote`) VALUES
(9, 'William', 'william@gmail.com', 'Website ini gunanya untuk apa sih ?', 'Aku baru aja ketemu website ini. Website ini dibuat untuk apa sih ? Aku bingung..', 8),
(10, 'Momo', 'momo@yahoo.co.id', 'Bagaimana cara menghitung luas di suatu kurva ?', 'Saya baru aja dapet PR tentang luas di suatu kurva, yang bisa tolong bantuin dong.. Makasih ', 2),
(11, 'Billy', 'billy@gmail.com', 'Do we now know why McCarthy suddenly dropped out of the vote for House Speaker?', 'Is it because he was was carrying on a long running affair with a Congresswoman? \r\n\r\nMultiple sources within Bakersfield, North Carolina, & on Capitol Hill tell Gotnews.com that Majority Leader Kevin McCarthy (R-CA) and Renee Ellmers (R-NC) have been carrying on a long-running affair since 2011. \r\n\r\nThe affair is something of an open secret in Washington, D.C. Reporters at other publications, lobbyists, congressional staffers of both parties all know about it. One staffer for a congressman describes it as the “biggest open secret” in D.C. A lobbyist describes Ellmers as a “social climber who has ingratiated herself” with McCarthy. ', 0),
(12, 'shana', 'shana@gmail.com', 'Should I get windows 10? Is it worth it?', 'I am so confused whether i should upgrade my computer or not', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
