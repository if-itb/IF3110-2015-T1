-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2015 at 04:31 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
-- Table structure for table `Answer`
--

CREATE TABLE IF NOT EXISTS `Answer` (
`answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_name` varchar(30) NOT NULL,
  `answer_email` varchar(30) NOT NULL,
  `answer_content` longtext NOT NULL,
  `answer_vote` int(11) NOT NULL,
  `answer_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Answer`
--

INSERT INTO `Answer` (`answer_id`, `question_id`, `answer_name`, `answer_email`, `answer_content`, `answer_vote`, `answer_date`) VALUES
(4, 5, 'vanya', 'vanya@gmail.com', 'Hai juga zulva', 3, '2015-10-12 11:53:11'),
(7, 5, 'jessica', 'jessica@rocket.ac.id', 'Annyeooong', 3, '2015-10-12 12:28:02'),
(11, 23, 'Venny', 'vennylaras@yahoo.com', 'Proin mattis sem id egestas tempus. Etiam consectetur justo massa, non fringilla sapien efficitur vitae. Maecenas id molestie ligula. Etiam dignissim, odio in blandit mattis, dolor nisl elementum dui, quis mollis nulla mi ac eros. Fusce gravida lacus nec diam porta iaculis. Aliquam eu nunc odio. Quisque id facilisis sapien. Vestibulum est nunc, tincidunt non urna quis, vestibulum dictum libero. In erat tellus, consequat non justo sit amet, laoreet feugiat magna. Donec id tincidunt felis, quis ornare lorem. Sed quis leo et velit mattis sagittis. Ut sit amet justo a augue malesuada finibus ut ac massa. Praesent vulputate condimentum nunc, quis aliquam leo varius et.', 3, '2015-10-12 15:36:58'),
(12, 26, 'Anonim2', 'Anonim2@gmail.co.id', 'Apeeeeeeeel ', 1, '2015-10-14 01:56:51'),
(13, 26, 'Anonim3', 'Anonim3@gmail.co.id', 'Alpukat', 3, '2015-10-14 01:57:28'),
(14, 5, 'pipin', 'pipin@example.com', 'Helllooooowww', 3, '2015-10-14 02:00:26'),
(15, 26, 'Anonim4', 'Anonim4@gmail.com', 'A strawberry', -8, '2015-10-14 02:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE IF NOT EXISTS `Question` (
`question_id` int(11) NOT NULL,
  `question_name` varchar(30) NOT NULL,
  `question_email` varchar(30) NOT NULL,
  `question_topic` text NOT NULL,
  `question_content` longtext NOT NULL,
  `question_vote` int(11) NOT NULL,
  `question_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`question_id`, `question_name`, `question_email`, `question_topic`, `question_content`, `question_vote`, `question_date`) VALUES
(5, 'Zulva Fachrina', 'zfachrina@hotmail.com', 'Perkenalan', 'Hai semua, perkenalkan namaku Zulva Fachrina \r\n13513010', 9, '2015-10-13 11:51:49'),
(17, 'chaer', 'chairuni@yahoo.com', 'Cras in orci leo', 'Cras in orci leo. Nullam eu elit eu lectus aliquet congue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque blandit, ante sed vehicula pulvinar, velit dui tincidunt massa, quis pretium eros nunc sed diam. Donec pellentesque ornare lectus. In hac habitasse platea dictumst. Sed vel tellus non est condimentum luctus. Maecenas efficitur dignissim orci quis sollicitudin.', -5, '2015-10-13 11:52:14'),
(23, 'Dininta', 'dininta@gmail.com', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in diam a felis posuere tristique. Morbi feugiat, arcu at scelerisque dapibus, nisl lacus lacinia diam, vitae ultrices sapien est eget elit. Aenean venenatis pellentesque felis, a pulvinar nisi sagittis non. Duis condimentum ac ex et egestas. Nam a nisl diam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed et lacus maximus, aliquet diam et, pretium nisi. Vivamus ligula ligula, scelerisque nec congue pellentesque, pretium et turpis. Praesent vel fermentum massa. Integer rutrum porta congue. Mauris aliquam euismod nisl.', 6, '2015-10-14 02:07:22'),
(24, 'Himawari', 'sunflower@gmail.com', 'Sunflower', 'Apa bahasa inggrisnya bunga matahari? Dijawab ya :)', 0, '2015-10-14 01:58:27'),
(26, 'Anonymous', 'Anonym@hotmail.com', 'Buah Berawalan Huruf A', 'Sebutin nama buah yang berawalan huruf A!', 2, '2015-10-14 01:56:26'),
(28, 'XXX', 'Anonym@hotmail.com', 'Spamming', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum, leo quis pulvinar euismod, magna ante gravida augue, at fringilla mi turpis finibus ante. Suspendisse sed interdum urna, rhoncus pharetra lacus. Nullam ultrices sapien enim, vitae commodo neque porta quis. Sed ipsum orci, egestas at elementum id, aliquet eget nisi. Curabitur ut aliquam ipsum. Cras convallis at ligula ut ornare. Donec convallis, leo sit amet consequat venenatis, dui nunc porta lectus, quis molestie turpis dui et ex. Curabitur rhoncus sapien in tortor consectetur efficitur eget quis augue. Integer dui urna, feugiat sed dolor et, tempus venenatis urna. Aenean rhoncus placerat tellus eu mattis. Pellentesque pharetra ligula erat, nec ullamcorper eros malesuada blandit. Sed mauris nunc, sodales non pellentesque at, rutrum sit amet elit. Curabitur at risus risus. Nullam tristique est eu ipsum tempor bibendum.\r\n\r\nSuspendisse ullamcorper vulputate porta. Aliquam elementum posuere justo. Maecenas erat orci, vestibulum quis est vitae, ullamcorper faucibus dui. Suspendisse eu auctor ex. Maecenas sed diam semper leo cursus blandit. Quisque aliquam nunc eget sapien sollicitudin pharetra. Sed ut odio ut dui tristique mollis. Suspendisse non lorem ut ligula pulvinar posuere.\r\n\r\nQuisque ut odio odio. Quisque venenatis feugiat imperdiet. Aliquam erat volutpat. Maecenas sed aliquet nisi, at laoreet nunc. Duis volutpat neque eget nibh maximus viverra. Sed vestibulum commodo metus a pulvinar. Fusce vitae nunc id eros tristique tristique vitae sed nulla. Duis rhoncus sed augue non maximus. Donec in nisi nunc. Integer elementum arcu at felis porttitor sollicitudin. Nulla ultricies purus erat. Aenean sed velit eu turpis luctus pulvinar.', -10, '2015-10-14 02:06:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answer`
--
ALTER TABLE `Answer`
 ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
 ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Answer`
--
ALTER TABLE `Answer`
MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
