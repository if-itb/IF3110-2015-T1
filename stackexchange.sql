-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: stackexchange
-- ------------------------------------------------------
-- Server version	5.6.24-log

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
  `id` int(11) NOT NULL,
  `id_ans` int(11) NOT NULL AUTO_INCREMENT,
  `name_ans` varchar(50) NOT NULL,
  `email_ans` varchar(50) NOT NULL,
  `content_ans` varchar(2000) NOT NULL,
  `vote_ans` int(11) NOT NULL,
  `datetime_ans` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ans`),
  KEY `id_idx` (`id`),
  CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (2,1,'Coba','coba@coba.com','Coba menjawab',0,'2015-10-12 16:17:00'),(2,2,'Coba lagi','coba@coba.com','Mau coba lagi nih',-1,'2015-10-12 16:17:00'),(9,4,'Newt','Newt@theglade.com','Let\'s get out of here right now.',0,'2015-10-12 16:17:00'),(4,5,'Levi','levi@fangirl.com','I like knowledge. Life. Work. Class. The great outdoors. Other people.',2,'2015-10-12 16:17:00'),(9,6,'Teresa','teresa@theglade.com','If you\'re going to decipher a hidden code from a complex set of different mazes, I\'m pretty sure you need a girl\'s brain running the show.',0,'2015-10-12 16:17:00'),(9,7,'Wicked','wicked@wicked.com','WICKED is good.',0,'2015-10-12 16:17:00'),(19,9,'Peeta','','They strung up a man, they say who murdered three. Strange things did happen here, no stranger would it be. If we met at midnight in the hanging tree.',0,'2015-10-12 16:17:00'),(2,10,'Icha','icha@icha.com','Hai',0,'2015-10-12 16:17:00'),(20,12,'Halo','halo@gmail.com','Halo halo bandung',0,'2015-10-13 16:40:26');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `vote` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (2,'Cobain','coba@coba.com','Percobaan Submit','Apakah pertanyaan ini berhasil masuk ke database?',-2,'2015-10-12 16:17:00'),(4,'Cath Avery','cath@fangirl.com','Internet','How do you not like the Internet? That\'s like saying, I don\'t like things that are convenient. And easy. I don\'t like having access to all of mankind\'s recorded discoveries at my fingertips. I don\'t like light. And knowledge.',1,'2015-10-12 16:17:00'),(6,'Marina Keegan','marina@email.com','After College','If you’re like most people, you’ll do one thing for two to three years, then something else for two to three years, and then somewhere in that five to seven-year distance from Yale you’ll see a need to fully commit to something that’s a longer-term project: graduate school, for example, or a job you need to stick with for some real time. The question is: where do you need to be with yourself such that when the time comes to ‘cast your whole vote,’ you’re reasonably confident you’re not being either fear-based or ego-driven in your choice . . . that the journey you’re on is really yours, and not someone else’s?',3,'2015-10-12 16:17:00'),(7,'Dumbledore','dumbledore@hogwarts.edu','Inside of Your Head','Of course it is happening inside your head, Harry, but why on earth should that mean that it is not real?',4,'2015-10-12 16:17:00'),(9,'Thomas','thomas@theglade.com','Death and Victory','Despite the alternative, despite knowing that if they hadn\'t tried to escape, all of them might have died, it still hurt, even though I didn\'t know them very well. Such a display of death, how could it be considered a victory?',2,'2015-10-12 16:17:00'),(10,'Pixies','pixies@pixies.com','My Mind','With your feet on the air and your head on the ground. Try this trick and spin it. Your head will collapse but there\'s nothing in it and you\'ll ask yourself where is my mind?',0,'2015-10-12 16:17:00'),(11,'Justin Bieber','justin@jb.com','What Do You Mean','When you don’t want me to move but you tell me to go, what do you mean?',-1,'2015-10-12 16:17:00'),(13,'Riddle','riddle@riddle.com','What Am I','Golden treasures I contain, guarded by hundreds and thousands. Stored in a labyrinth where no man walks, yet men come often to seize my gold. By smoke I am overcome and robbed, then left to build my treasure anew. \r\n\r\nWhat am I?',0,'2015-10-12 16:17:00'),(19,'Katniss','katniss@everdeen.com','The Hanging Tree','Are you, are you coming to the tree?',0,'2015-10-12 16:17:00'),(20,'Coba','coba@coba.com','Coba Coba','Ini cuma coba-coba',0,'2015-10-12 16:17:00'),(22,'Cobain Dong','coba@coba.com','Cobain Lagi','cobain cobain lagi dong',0,'2015-10-13 16:47:52');
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

-- Dump completed on 2015-10-16  5:18:25
