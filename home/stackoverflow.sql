-- MySQL dump 10.13  Distrib 5.6.25, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: stackoverflow
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `content` text NOT NULL,
  `vote` int(11) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `question_no` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'jojon','jojoncantik@cimehemehe.co.me','i wanna sleep',3,'2015-10-07 20:55:03',0),(2,'mabul','ah.cabuls@std.stei.itb.ac.id','i wanna go home',3,'2015-10-07 21:02:25',0),(3,'budi','guru@roket.com','aku kentut.',0,'2015-10-07 21:12:28',0),(5,'wiwit','wiwit@gmail.com','ini jawaban yang bener',0,'2015-10-13 14:53:05',0),(6,'wiwit','wiwit@gmail.com','ini jawaban yang bener',0,'2015-10-13 14:53:51',0),(7,'wawan','wawan@gmail.com','buy it first',0,'2015-10-13 14:59:45',11),(8,'aody','aody@rocketmail.com','play it then',0,'2015-10-13 15:01:00',11),(9,'wiwit','wiwit@yahoo.com','dont be stupid',0,'2015-10-13 15:04:07',11),(10,'wiwit','wiwit.again@gmail.com','dont be stupid',0,'2015-10-13 15:09:22',11),(12,'dadan','dadan@gmail.com','you can contact me',3,'2015-10-13 17:26:55',16),(13,'efge','efge666@gmail.com','up up',0,'2015-10-13 17:46:51',17);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `email` text,
  `name` text,
  `question` text,
  `content` text,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (16,'syamsul@gmail.com','syamsi','email','what if i forget my email password??','2015-10-13 17:24:44',3),(17,'efge666@gmail.com','eefganteng','who?','who are you?','2015-10-13 17:40:58',0),(18,'miftah@gmail.co.id','miftah','kambing','ini kambing siapa?','2015-10-16 16:29:38',2);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-16 20:57:41
