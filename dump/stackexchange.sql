-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 05:28 PM
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
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `content` text NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `name`, `email`, `content`, `vote`, `date_created`) VALUES
(7, 22, 'Sadam', 'sadam@yahoo.co.id', 'Siapa yang takut?', 0, '2015-10-14 07:00:00'),
(8, 22, 'Sherina M. Darmawan', 'sherina@yahoo.co.id', 'Mau minta maaf ngga udah ngatain aku monyet?', 8, '2015-10-06 03:31:19'),
(9, 22, 'Sadam', 'sadam@yahoo.co.id', 'Dih geer, aku ngomong monyet, kamu aja yang ngerasa dipanggil', 8, '2015-10-22 11:00:00'),
(10, 26, 'Selena Gomez', 'selena@gomez.com', 'I wanna know what do you mean', 24, '2015-10-01 05:11:00'),
(14, 37, 'Vanya Deasy Safrina', '13513035@std.stei.itb.ac.', 'Baik :)', 0, '2015-10-15 10:37:57'),
(15, 25, 'Tyler Oakley', 'tyler@live.com', 'Don''t be sad, Troye :"(', -3, '2015-10-15 10:44:08'),
(16, 38, 'Enderland', 'enderland@gmail.com', 'Imagine you are on a first date and your date says, "oh, I routinely steal from people, it''s great fun."\r\n\r\nYou would almost assuredly be skeptical of everything else this person does because you are questioning their integrity. Stealing is not normal - what else does it imply? Most people would not go on additional dates with them. And this is a normal reaction. And dare I say, appropriate.\r\n\r\nThe same thing applies for companies. When a company has wholeheartedly endorsed a [stupid, unethical, whatever] business practice it''s totally reasonable to be equally concerned there are other, more deeply systemic problems.\r\n\r\nThere is a big difference between not being perfect and being horribly imperfect. It''s just like dating. It''s not reasonable to expect a perfect partner. But it''s not terrible to expect some level of decency from a partner.. whether that partner is a company or person, obvious, glaring flaws should cause you some significant skepticism about "what''s on the inside."\r\n\r\nBut just as with dating there are some non-negotiables...', 3, '2015-10-15 22:18:14'),
(17, 38, 'HLGEM', 'hlgem@gmail.com', 'Everyone has to judge for himself or herself, but those type of things that bring on that reaction show an attitude of lack of business sense or using employees badly or general immoral behavior that in my experience will reflect elsewhere as well. This is especially true when they reflect that finances might be less than stellar which is of particular concern when dealing with start ups (unless you want to risk not having a salary). What you have to do is get the sense of how serious the issue is and what the implications are. Financial issues and being asked to do something illegal (like being paid under the table) are the most serious because they more often than not reflect a business that is badly run and one that may get you in legal hot water. Better not to take the risk. Of course some of us are more risk adverse than others. So you have to learn to judge for yourself. Usually if there is a little voice telling you that something is wrong, you should listen though. You might miss some great places, but you will avoid a lot of really bad places.', 5, '2015-10-15 22:20:45'),
(18, 38, 'Bohemian', 'bohemian@yahoo.com', 'I would distinguish operational problems from ethical problems.\r\n\r\nEvery business has operational problems; processes/systems that are a mess. That''s life and that''s why they hire people to improve them.\r\n\r\nBut if you discover ethical problems, that to me is a red flag. It is reasonable to assume that if they treat their customers badly, they also treat their employees badly too and/or will sooner or later go out of business leaving you without a job or any entitlements you accrued.', -6, '2015-10-15 22:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`question_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `topic` varchar(25) NOT NULL,
  `content` text NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `name`, `email`, `topic`, `content`, `vote`, `date_created`) VALUES
(4, 'Cassie Sullivan', 'cassie@live.com', 'Am I The Last Human?', '“It doesn’t begin inside my head like I expected. Instead a delicious warmth spreads through my body, expanding from my heart outward, and my bones and muscles and skin dissolve in the warmth that spreads out from me, until the warmth overcomes the Earth and the boundaries of the universe. The warmth is everywhere and everything. My body and everything outside my body belongs to it. Then I feel him; he is in the warmth, too, and there’s no separation between us, no spot where I end and he begins, and I open up like a flower to the rain, achingly slow and dizzyingly fast, dissolving in the warmth, dissolving in him and there’s nothing to see, that’s just the convenient word he used because there is no word to describe him, he just is. \r\nAnd I open to him, a flower to the rain.”', 20, '2015-09-10 00:00:00'),
(22, 'Sherina M. Darmawan', 'sherina.munaf@yahoo.co.id', 'Takut', 'Kenapa? Takut?', -3, '2015-10-12 11:43:19'),
(26, 'Justin Bieber', 'justin@bieber.com', 'What Do You Mean', 'What do you mean when you nod your head yes but you wanna say no what do you mean? What do you mean when you dont want me to move but you tell me to go what do you mean?', 10, '2015-10-12 11:50:13'),
(36, 'Azra Tabassum', 'azra@writer.cr', 'Poem', '“You’re wearing your last goodbye on your face like dirty clothing and she won’t look at you, she won’t look at you because she loves you and this means forgetting, this means closing every door that leads to your hands and the bedpost notches on your spine, the both of you passing each other like lonely ghosts in the night except you held onto her wrist before she could leave and she stayed with you ever since. \r\nShe loves you so she won’t meet your eyes or unshackle her unsteady deer like legs to get up from the sofa and tell you to go and fuck yourself for making her love you and not staying around for the collateral”', 1, '2015-10-12 22:14:56'),
(38, 'Emrakul', 'emrakul@stack.com', 'Is it really a bad idea?', 'On The Workplace, I see very frequently a comment along the lines of:\r\n\r\nThat is a company I would personally never consider working for. That is so stupid and short-sighted that it means the rest of the way the company operates will be similarly mismanaged... (from this comment, emph. mine)\r\n(I don''t mean to pick on this user, and I apologize in advance to them. It was the most recent example I''ve seen, though, and I need an example for this question.)\r\n\r\nAnother variant I see is "if they do X, then you don''t want to work there anyway."\r\n\r\nTo me, this sounds like the logical fallacy of hasty generalization. The logic I see very often here is, "if one small part of the company''s policies are mismanaged, then the entire company is mismanaged."\r\n\r\nIs this ever actually a correct line of reasoning?', 3, '2015-10-15 22:15:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
