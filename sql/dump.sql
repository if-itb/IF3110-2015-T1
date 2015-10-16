-- MySQL dump 10.13  Distrib 5.6.26, for Win32 (x86)
--
-- Host: localhost    Database: dbmy
-- ------------------------------------------------------
-- Server version	5.6.26

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
  `no_pertanyaan` int(11) NOT NULL,
  `no_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `konten` text NOT NULL,
  `vote` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_jawaban`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (26,8,'aodyra','sdfsdf@asdf.com','ok bro',2,'2015-10-14 13:54:26'),(26,9,'ntap','ntap@bro.com','ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ntap bro ',-1,'2015-10-14 13:54:51');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `email` text,
  `topik` text,
  `konten` text,
  `vote` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (26,'aodyra','aodyra@gmail.com','ntapbro','okokok',30,'2015-10-14 13:51:22'),(27,'ntapbro poi','poypoy@gmail.com','poypoypoy','poypoypoy',0,'2015-10-14 19:25:03');
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

-- Dump completed on 2015-10-16 15:40:47
