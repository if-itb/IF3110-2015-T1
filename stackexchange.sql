-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2015 at 09:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
  `answer_id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `vote` int(10) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `name`, `email`, `content`, `vote`, `date`) VALUES
(1, 3, 'Manusia Imba', 'iamimba@yahoo.com', 'banyak2 lah belajar dan berdoa', 3, '2015-10-09 23:34:52'),
(2, 3, 'IMBAESTPERSONEVER', 'imdabest@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie justo in lectus mollis egestas. Aenean at sagittis felis. Aliquam sagittis dolor at ante convallis, et facilisis nisi cursus. Aliquam vitae pharetra magna. Aliquam maximus, est ac cursus dictum, odio ligula cursus leo, ut interdum metus libero blandit massa. Pellentesque malesuada orci quis mauris dignissim maximus. Mauris aliquet sapien eget erat varius vulputate. In dignissim interdum nulla, ut pharetra sapien blandit vitae. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis cursus turpis vitae ultrices bibendum. Morbi lacinia nisi at volutpat posuere. Quisque ultricies rutrum sagittis. Maecenas eu augue fermentum, finibus velit et, posuere odio. Integer sollicitudin eros vitae euismod pharetra. Maecenas cursus, ante id pellentesque congue, tortor nibh tempor quam, nec vehicula sapien turpis bibendum erat. Sed sagittis nisi ac velit lobortis, id gravida diam pulvinar. Vestibulum sed mi elit. Vivamus tincidunt commodo suscipit. Nullam et eleifend orci, vitae dapibus enim. Nullam nec porta augue, et tincidunt sem. In at metus id lorem eleifend molestie. Aliquam mollis sit amet magna vitae rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque neque nunc, viverra et urna vel, dapibus interdum ex. Praesent ornare nunc pretium luctus placerat. Nunc id leo in leo pulvinar viverra a mollis augue. Proin convallis accumsan gravida. Maecenas dignissim laoreet congue. Quisque eget lacus cursus justo malesuada cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut et sollicitudin libero. Integer interdum at metus non congue. Suspendisse feugiat mi id purus cursus, quis rutrum risus interdum. Duis et ligula ac enim faucibus ultricies. Sed ac nisi ac elit sollicitudin bibendum. Nam ut placerat nunc, tincidunt gravida felis. Aenean congue ac ex in condimentum. Pellentesque imperdiet mauris vel aliquam sodales. Donec sodales erat sit amet aliquam placerat. Suspendisse ullamcorper maximus quam, lobortis scelerisque tortor sollicitudin ut. Nam vestibulum blandit iaculis. Quisque ut arcu diam. Fusce rutrum euismod nibh in consectetur. In maximus ornare velit eget posuere. Sed venenatis condimentum eros quis convallis. In ornare ipsum mauris, sit amet varius justo aliquam ut. Cras ac ultricies libero. Nam ac ullamcorper enim. Donec interdum massa quis ex tristique, vel consectetur justo vestibulum. Suspendisse potenti. Quisque elementum congue tincidunt. Donec at rhoncus magna, cursus tincidunt justo. Nam mauris tortor, tincidunt quis libero eu, luctus maximus orci.', 0, '2015-10-10 00:44:45'),
(18, 3, 'asdasda', 'dasdasd@gmail.com', 'Tergantung orang bro\r\n', 1, '2015-10-10 01:16:55'),
(19, 9, 'Test', 'Test@test.com', 'asdasdsd', -2, '2015-10-10 21:01:28'),
(24, 9, 'asdasd', 'alexander.sukono@gmail.com', 'Dude, you&#039;re drunk', 30, '2015-10-10 21:09:08'),
(25, 10, 'sad', 'sad@itb.com', 'sadasd', -1, '2015-10-11 12:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(350) NOT NULL,
  `content` text NOT NULL,
  `vote` int(10) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `name`, `email`, `title`, `content`, `vote`, `date`) VALUES
(3, 'Alexander Sukono', 'alexander.sukono@gmail.com', 'How to become IMBA ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie justo in lectus mollis egestas. Aenean at sagittis felis. Aliquam sagittis dolor at ante convallis, et facilisis nisi cursus. Aliquam vitae pharetra magna. Aliquam maximus, est ac cursus dictum, odio ligula cursus leo, ut interdum metus libero blandit massa. Pellentesque malesuada orci quis mauris dignissim maximus. Mauris aliquet sapien eget erat varius vulputate. In dignissim interdum nulla, ut pharetra sapien blandit vitae. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis cursus turpis vitae ultrices bibendum. Morbi lacinia nisi at volutpat posuere. Quisque ultricies rutrum sagittis. Maecenas eu augue fermentum, finibus velit et, posuere odio. Integer sollicitudin eros vitae euismod pharetra.\r\n\r\nMaecenas cursus, ante id pellentesque congue, tortor nibh tempor quam, nec vehicula sapien turpis bibendum erat. Sed sagittis nisi ac velit lobortis, id gravida diam pulvinar. Vestibulum sed mi elit. Vivamus tincidunt commodo suscipit. Nullam et eleifend orci, vitae dapibus enim. Nullam nec porta augue, et tincidunt sem. In at metus id lorem eleifend molestie.\r\n\r\nAliquam mollis sit amet magna vitae rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque neque nunc, viverra et urna vel, dapibus interdum ex. Praesent ornare nunc pretium luctus placerat. Nunc id leo in leo pulvinar viverra a mollis augue. Proin convallis accumsan gravida. Maecenas dignissim laoreet congue. Quisque eget lacus cursus justo malesuada cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut et sollicitudin libero. Integer interdum at metus non congue. Suspendisse feugiat mi id purus cursus, quis rutrum risus interdum. Duis et ligula ac enim faucibus ultricies. Sed ac nisi ac elit sollicitudin bibendum. Nam ut placerat nunc, tincidunt gravida felis.\r\n\r\nAenean congue ac ex in condimentum. Pellentesque imperdiet mauris vel aliquam sodales. Donec sodales erat sit amet aliquam placerat. Suspendisse ullamcorper maximus quam, lobortis scelerisque tortor sollicitudin ut. Nam vestibulum blandit iaculis. Quisque ut arcu diam. Fusce rutrum euismod nibh in consectetur. In maximus ornare velit eget posuere. Sed venenatis condimentum eros quis convallis.\r\n\r\nIn ornare ipsum mauris, sit amet varius justo aliquam ut. Cras ac ultricies libero. Nam ac ullamcorper enim. Donec interdum massa quis ex tristique, vel consectetur justo vestibulum. Suspendisse potenti. Quisque elementum congue tincidunt. Donec at rhoncus magna, cursus tincidunt justo. Nam mauris tortor, tincidunt quis libero eu, luctus maximus orci.', 5, '2015-10-09 19:06:12'),
(6, 'asdasdaadsa', 'adas', 'asdasd', 'aadasda', -2, '2015-10-10 19:07:19'),
(9, 'V For Vendetta', 'vendeta@vdt.com', 'VENDETA', 'VENDETAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA ??????\r\n\r\nV FOR VENDETA ', 2, '2015-10-10 20:53:44'),
(10, 'asdasda', 'sad@itb.com', 'asd', 'asd', 2, '2015-10-11 12:32:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
