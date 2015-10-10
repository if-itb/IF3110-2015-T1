-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 06:40 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_stackexchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id_answer` int(4) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `vote_num` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `id_answerer` int(4) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id_answer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `content`, `vote_num`, `datetime`, `id_answerer`, `id_question`) VALUES
(1, 'The request limit for users/self/media/likes is 33 (default is 20). The next_url that''s returned in the pagination section will grab the chronologically preceding liked items, using the same count (if you''ve supplied one) and next_max_like_id, which is the id of the last result returned.\r\n\r\nIf by "track changes" you mean keep a running tally, as far as I know you can''t access the total number of liked items via an endpoint. You''d have to write a script that scrapes like history, using the paginination info to jump backwards until you can see you''ve hit the original like by catching on a duplicate next_max_like_id (side note: the data returned only includes posts that the user still has access to).\r\n\r\nIf you have a lot of users, you''ll have to stagger your queries with a cron job for the original scrape since there''s a limit of 5000 API calls per hour. Once that''s complete you could have a last_id_liked field in your database for continued count maintenance.\r\n\r\nThe only optimization I can offer is instead of counting returned results you can count the number of times you jump backwards and multiply by the count... but you''re still using up an API call each time.', 2, '2015-10-10 00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `vote_num` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `id_questioner` int(11) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `topic`, `content`, `vote_num`, `datetime`, `id_questioner`) VALUES
(1, 'Count number of Instagram media user', 'Currently I use /users/self/media/liked method, get the response, read next_max_like_id and request the data again and again. I''ve tried to pass huge count value, but looks like max count value is just 30. I need to track changes in the number of media user liked. Is there any way to optimize it? I don''t understand well what next_max_like_id means? Is there any way to keep it and use it next time somehow?', 1, '2015-10-10 08:46:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(535) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`) VALUES
(1, 'Irene Wiliudarsan', 'irene@gmail.com'),
(2, 'Ji Chang Wook', 'jichangwook@yahoo.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
