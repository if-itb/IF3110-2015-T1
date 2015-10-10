-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: tubeswbd
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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `IDans` int(11) NOT NULL AUTO_INCREMENT,
  `IDquestion` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `vote` int(11) DEFAULT NULL,
  `timeans` date DEFAULT NULL,
  PRIMARY KEY (`IDans`),
  KEY `IDquestion` (`IDquestion`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`IDquestion`) REFERENCES `question` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,1,'hhhhhhadhsfa','hasdhfhsdaf@wqew.com','kfdasljjjjjjjjjjjjjjjjjjjjjj',0,'2015-10-02'),(2,1,'jjjasdf','jjjasdf@gasdf.com','fddddddddddddjjjjsdf',0,'2015-10-02'),(3,2,'jsadfhsdafh','jhadsfjh@hshh.co.id','sjadfkjuusfuadiifas',0,'2015-10-02'),(4,3,'jjjjjjjjssssssssssssss','js.sdf@hai.org','sdafdsjfjksdjkflsdafjlksfalalsdfkj',0,'2015-10-03'),(5,3,'Satria','satria@ghsi.com','sdfakkkkkjkflsdfljsklaf',0,'2015-10-04');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `vote` int(11) DEFAULT NULL,
  `timeask` date DEFAULT NULL,
  `num_ans` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'Satria','satria_priambada@yaya.com','fads sdaf','ksladfj oiewqrp sjadfkl n;adsfkl pjoiewjqr kanfm ,sdfkjh sdafka sd',0,'2015-10-01',2),(2,'Yoisadf','yoaisdf@jsfaj.com','sdfeeerrew','sdfeeerrewasf fdfadsf safsfda',0,'2015-10-06',1),(3,'fskljlsadfjk','aksfjksafd@gaga.com','sadfffffffffffffff','sfdaaaaaaaaaaaaaaaaaaaaaaaaaaddddddd',0,'2015-10-07',2),(4,'tioa','asfsadf@aksdlf.com','sdafsdafkl','saldfkjlsaf',0,'2015-10-08',0),(5,'tioa','asfsadf@aksdlf.com','sdafsdafkl','saldfkjlsaf',0,'2015-10-08',0),(6,'tioa','asfsadf@aksdlf.com','sdafsdafkl','saldfkjlsaf',0,'2015-10-08',0),(7,'tioa','sdfa@gmail.com','sdf','jdjfjsdfjsdfjdsjfsdf',0,'2015-10-08',0),(8,'tioa','sdfa@gmail.com','sdf','jdjfjsdfjsdfjdsjfsdf',0,'2015-10-08',0),(9,'tioa','sdfa@gmail.com','sdf','jdjfjsdfjsdfjdsjfsdf',0,'2015-10-08',0),(10,'sadfklj','dsafkier@kdsaflj','fsadfa','ierqoupewopwqhsgl',0,'2015-10-08',0),(11,'sadfklj','fdsfsfasdfsadf@gmasdifo','sdafko','sfaklqeiroquer',0,'2015-10-08',0),(12,'woi','werewrewr','aweflsdfj','sadfkllsdfjdsalf jsdlafjl sd;jlafl ;sdafj; sdlf jksdfj;ak kdfs ajk;dfsjk; jafs j;faj; ',0,'2015-10-08',0);
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

-- Dump completed on 2015-10-10 23:27:50
