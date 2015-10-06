-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2015 at 02:59 PM
-- Server version: 5.5.44-0+deb8u1
-- PHP Version: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stack_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `vote` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `answer`, `vote`, `name`, `email`, `datetime`) VALUES
(1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 'theguy', 'theguy@only.man', '2015-10-06 02:00:00'),
(2, 1, 'jwqnekewbbewkjfbkljewbjbewkjfbew', 2, 'lalala', 'lala@lol.com', '2015-10-07 00:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`id` int(11) NOT NULL,
  `topic` varchar(60) NOT NULL,
  `question` text NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `topic`, `question`, `vote`, `name`, `email`, `datetime`) VALUES
(1, 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non ipsum sollicitudin, pellentesque felis nec, malesuada sapien. In hac habitasse platea dictumst. Sed quis fermentum tortor. Maecenas eget augue lorem. Cras scelerisque ex ac sem rhoncus, eu dictum dui rhoncus. Phasellus sit amet ornare neque. Phasellus arcu orci, auctor sed convallis tristique, convallis eget mi. Suspendisse accumsan neque a lacinia ullamcorper. Etiam gravida erat nec mi blandit condimentum. Cras convallis sollicitudin blandit. Nam consequat vel dolor sit amet sollicitudin. Aenean vel justo vel diam volutpat pellentesque id ut lacus.', 9, 'anonymousChahaha', 'anonymous@anon.onion', '2015-10-05 17:06:00'),
(2, 'Lol', 'sadjbbdklDFAHDFiwpNFHWERIHAEWOPIRHOEAWIHROWEWIofwPNUasadnsadnkackjBAKB', 2, 'POPO', 'pop@po.com', '2015-10-05 22:00:00'),
(3, 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 0, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaa', '2015-10-06 06:30:35'),
(4, 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non ipsum sollicitudin, pellentesque felis nec, malesuada sapien. In hac habitasse platea dictumst. Sed quis fermentum tortor. Maecenas eget augue lorem. Cras scelerisque ex ac sem rhoncus, eu dictum dui rhoncus. Phasellus sit amet ornare neque. Phasellus arcu orci, auctor sed convallis tristique, convallis eget mi. Suspendisse accumsan neque a lacinia ullamcorper. Etiam gravida erat nec mi blandit condimentum. Cras convallis sollicitudin blandit. Nam consequat vel dolor sit amet sollicitudin. Aenean vel justo vel diam volutpat pellentesque id ut lacus.', 0, 'anonymousZ', 'anonymous@anon.onion', '2015-10-06 07:10:07');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
