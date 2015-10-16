-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: stackexchange
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `vote` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `q_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `q_id` (`q_id`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (3,'kucing','','',0,'2015-10-13 05:46:45',1),(4,'','','',0,'2015-10-13 11:21:54',2),(5,'','','',0,'2015-10-13 11:22:29',2),(6,'','','',0,'2015-10-13 11:24:09',1),(7,'sdfs','sfds@fm.codf','sdfdsfs',2,'2015-10-15 05:13:26',26),(8,'sdfsdfds','sdfsd@dfs.ds','sdfsdfdsfs',0,'2015-10-15 05:13:45',26),(9,'Jessica','jessicahandayani@snsd.com','Pest control personnel\r\ngo through life rarely telling\r\nthe rest of us\r\nabout the insect choruses\r\n\r\nThey get to snuff out\r\nwith football games on in the background.',4,'2015-10-16 06:52:00',36),(10,'Tifani','tifaniwarnita@gmail.com','I love cats too!',0,'2015-10-16 10:25:35',37);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `vote` int(10) NOT NULL,
  `answer` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'tifa','tifayu@gmail.com','kucing terbang','kucing itu lucu banget deh ga ngerti lagi',2,2,'2015-06-02 00:01:01','2015-02-03 03:03:02'),(2,'miaw','nyanko@gmail.com','kucing tifa?','quinsy dan bruno kakak beradik',7,2,'2015-06-02 00:01:01','2015-02-03 03:03:02'),(8,'Sakura','itsmylife@sakura.com','Daisuki datta ano uta','Lelah desu. Help me ._.',0,0,'2015-10-09 18:42:03',NULL),(22,'Tifani Warnita','tiffayumuyuka@gmail.com','Syalalaa','Kucing terbang meong meong!!',0,0,'2015-10-11 17:59:46',NULL),(24,'BlubLub','adfjh','AKU SUKA KUCING!!!!','Apa ini apa ini apa ini hahahahaha lelah juga yaaa',0,0,'2015-10-11 20:09:57',NULL),(26,'Tifani Warnita','tiffayumuyuka@gmail.com','Bubu Sayang Caca','Kucing Terbang',0,2,'2015-10-12 15:47:39',NULL),(36,'Tifani Warnita','tiffayumuyuka@gmail.com','Kucing Terbang?','I just think of this freaky idea. It begun a few weeks ago, I connected with Gabriel Weinberg, the founder of DuckDuckGo, a search engine that doesn’t track you. He was in the midst of launching the second edition of his book, Traction.\r\nI already was familiar with DuckDuckGo, but I had a few questions I wanted to ask Gabriel about his entrepreneurial journey (he’s been at it now for fifteen years).\r\nI hadn’t heard these questions asked anywhere before. My questions are in bold and numbered, Gabriel’s answers follow. Hope you enjoy…\r\n1. What are a few philosophical ideas or heuristics that have inspired you while building DDG?\r\nBefore choosing DuckDuckGo I started about a dozen side projects with the expressed purpose of trying to find something I could spend a decade or more on, as I didn’t have that inherent founder/product fit with my last company and felt I needed it in anything I did next. It was hard for me to tell in the abstract what would have that fit, which is why I started all the projects. After a year or so I combined several into DuckDuckGo and haven’t looked back.\r\nDay-to-day I’m motivated by being on the cusp of something big.\r\n2. What project or part of your life is most exciting for you right now? If it’s DDG, what specific part of the business is most exciting?\r\nRight this very moment the second edition of my book Traction is launching and that is the most exciting thing on my mind this week because it is launch week! We self published it last year, ultimately using the frameworkfrom the book to sell 37,617 copies. Over the past nine months we’ve been working with Penguin Random House to put out a much higher quality second edition and I’m excited to share it, that it will be in bookstores, and ultimately that it will help way more projects and business get traction.\r\nFor DuckDuckGo I’m excited about a much more long-term project, already years in the making, called DuckDuckHack, which is just starting to take off. DuckDuckHack is our open approach to instant answers, as opposed to Google’s closed approach. It is a completely open-source platform for instant answers, and anyone in the world can suggest sources, how answers should work, and even develop them.\r\nWe already have hundreds of instant answer sources live on the search engine with over a hundred more in development. Ultimately, we believe most searches will have an instant answer, and it is our job to get you that answer from the best source, by partnering with those best sources and showcasing their content and their brand in whatever category of searches they’re best at (lego parts, municipal bonds, anything). This only will work, however, if we can inspire our community to help us achieve our vision of a community-driven search engine with great results and great privacy.\r\n3. What was one of your darkest moments?\r\nI’ve been incredibly lucky in so many ways, having won multiple life lotteries, and consequently my darkest moments aren’t really that dark. From my career though I’d point personally to my first company, which failed pretty hard a couple of years out of college.\r\nI ran out of money, had to let all my friends whom I had hired go, and face the fact that I had really failed at a bunch of things. That was a major decision point for me to either give up on tech startups or double down on the failure, and I chose the latter. I developed out of that the mentality to a) treat startups as a career path as opposed to a one-and-done mentality that a lot of people have and I think primarily contributes to their failures in startups; and b) realize what is in and out of your control and focus on the former.\r\n4. What was the inspiration or reason you persevered through that dark moment?\r\nTaking a step back, I tried to formulate what I wanted out of my career, realizing that people legtimately can want a host of different attributes (discovery, wealth, respect, etc.). I think there are about twenty of these attributes. I realized for myself that I really want to make a unique, positive impact. If you want to do that then entrepreneurship is a great career choice, though there are others too that I am similarly attracted to (like writing). Once I had that grounding, moving forward became much easier.\r\n5. What was the feeling like after you overcame that challenge?\r\nI’ve never lacked motivation and my genetic data from 23andme tells me I am heavily pre-disposed to having it :). That said, I think having a purpose or north star so-to-speak helps frame what you’re doing and where you’re going, and feels great when you feel you have some sort of plan like that.\r\nThat said, I do a terrible job of actually celebrating milestones in the moment. I tend to just keep moving forward.\r\n6. Warning… cliche question alert… Do you have a morning routine or any daily habits? If so, what are they?\r\nI get anchored to routines pretty easily, even more so over the past few years as I have young kids (currently 6 and 4). My usual schedule involves reading a bit in bed, showering, getting the kids ready for school, taking my youngest to school and getting into the office around 8:10AM. Then I’ve been trying to exercise, usually walking with my wife.\r\nI’m then in the office until 4:20PM at which point I pick my son up from school, and spend the next few hours with the family. After the kids go to sleep around 8, I’m back at work for a couple hours and then to bed, unless I’m really tired in which case I’ll watch TV or some mindless Internet equivelent :).',5,1,'2015-10-13 12:41:01','2015-10-13 12:53:45'),(37,'Snowball','snowball@cat.com','I Love Cats. Do you?','I really love cats since I was born.  They are cute. Do you think so?',14,1,'2015-10-16 10:25:22',NULL);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-16 15:32:46
