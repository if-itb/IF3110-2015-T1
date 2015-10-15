-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 07:01 PM
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
  `id_user` int(4) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id_answer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `content`, `vote_num`, `datetime`, `id_user`, `id_question`) VALUES
(1, 'Almost same issue here http://stackoverflow.com/questions/10881511/instagram-api-how-to-get-all-user-m??edia and seems like there is a limit to results to and you have to use pagination for getting next results set using next_max_like_id passing to next request.', 2, '2015-10-10 00:00:00', 2, 1),
(6, 'See http://instagram.com/developer/endpoints/ for information on pagination. You need to subsequentially step through the result pages, each time requesting the next part with the next_url that the result specifies in the pagination object.', 0, '2015-10-14 17:26:30', 18, 1),
(7, 'next_max_like_id is for paginating to next set of likes data. You have to pass it to your next consecutive request. As Instagram API returning limited results, you can use this facility.', 0, '2015-10-14 17:34:57', 19, 1),
(8, 'The request limit for users/self/media/likes is 33 (default is 20). The next_url that''s returned in the pagination section will grab the chronologically preceding liked items, using the same count (if you''ve supplied one) and next_max_like_id, which is the id of the last result returned.\r<br>\r<br>If by "track changes" you mean keep a running tally, as far as I know you can''t access the total number of liked items via an endpoint. You''d have to write a script that scrapes like history, using the paginination info to jump backwards until you can see you''ve hit the original like by catching on a duplicate next_max_like_id (side note: the data returned only includes posts that the user still has access to).\r<br>\r<br>If you have a lot of users, you''ll have to stagger your queries with a cron job for the original scrape since there''s a limit of 5000 API calls per hour. Once that''s complete you could have a last_id_liked field in your database for continued count maintenance.\r<br>\r<br>The only optimization I can offer is instead of counting returned results you can count the number of times you jump backwards and multiply by the count... but you''re still using up an API call each time.', 0, '2015-10-14 17:38:04', 16, 1),
(11, 'Lets change the question a bit just to prove a point.\r<br>\r<br>What would make a painting expensive in a world where you can photocopy anything?\r<br>\r<br>About now you should see where i''m going right? You can get a painting of MonÃ©t fairly cheap (the cost of royalty and frame), but the original would still be super expensive. And with precious minerals it would be the same, and I''ll even have to correct my self here. It is the same.\r<br>\r<br>If you take a look at this article on Wikipedia: Synthetic diamond you will see that making a diamond is not impossible, in fact it is fairly easy everything considered.\r<br>\r<br>Conclusion: So what kind of jewelry would be valuable in a world where anything can be produced? The original kind of jewelry.', 0, '2015-10-14 20:43:51', 22, 3),
(12, 'English speakers distinguish these sounds almost perfectly. Certainly with well over 99% accuracy. As pointed out in another post here, any phonemes that create a difference in meaning in a language (in a substantial number of environments) will be clearly and reliably distinguished by native speakers.\r<br>\r<br>If you are a Japanese speaker planning to speak English with speakers whose first language also distinguishes /l/ from /r/, then it is ESSENTIAL that you learn to make these sounds so that they are distinguishable. Even if you don''t remember in every case, you need to be able to make these sounds completely distinct. It''s even better if you can train yourself to hear the difference. This is a much more difficult task, but it''s doable. Many very good Japanese speakers of English find it difficult to hear the difference. However, all very good speakers of English can produce the sounds correctly.', 0, '2015-10-14 23:03:46', 24, 6),
(13, 'I would suggest you a basic road-map about how to go about it:\n<br>\n<br>    You can brush up basic math and stats at Khan Academy, and/or take the Intro to Statistics course by Udacity.\n<br>    Then, you can take these two nice courses of Udacity. Descriptive Statistics and Inferential Statistics\n<br>    Then, you can dive into some Bayesian stats. And one of the best-related resource on the web which I have found is the Think Bayes free e-book\n<br>    Then, dive into the basics of Machine Learning. Coursera''s Andrew Ng''s course is the perfect start. And this resource: Machine Learning for developers is also very useful for skimming through the concepts quickly.\n<br>    Then, you are on your own. You have enough resources and blogs on the internet for building up on these concepts.\n<br>\n<br>Bonus:\n<br>\n<br>A wonderful site for such road maps is Metacademy, which I personally vouch as one of the best Data Science resources on the web.\n<br>\n<br>Gitxiv is another beautiful site, which connects the Arxiv research papers on Data Science with the relevant open source implementations/libraries.\n<br>', 1, '2015-10-14 23:09:15', 26, 8),
(42, 'English speakers distinguish these sounds almost perfectly. Certainly with well over 99% accuracy. As pointed out in another post here, any phonemes that create a difference in meaning in a language (in a substantial number of environments) will be clearly and reliably distinguished by native speakers.\r<br>\r<br>If you are a Japanese speaker planning to speak English with speakers whose first language also distinguishes /l/ from /r/, then it is ESSENTIAL that you learn to make these sounds so that they are distinguishable. Even if you don''t remember in every case, you need to be able to make these sounds completely distinct. It''s even better if you can train yourself to hear the difference. This is a much more difficult task, but it''s doable. Many very good Japanese speakers of English find it difficult to hear the difference. However, all very good speakers of English can produce the sounds correctly.', 2, '2015-10-15 17:06:49', 2, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
