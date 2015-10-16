-- MySQL dump 10.15  Distrib 10.0.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: aster
-- ------------------------------------------------------
-- Server version	10.0.20-MariaDB

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
-- Table structure for table `Answer`
--

DROP TABLE IF EXISTS `Answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionID` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `content` text NOT NULL,
  `voters` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `questionID` (`questionID`),
  CONSTRAINT `Answer_ibfk_1` FOREIGN KEY (`questionID`) REFERENCES `Question` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Answer`
--

LOCK TABLES `Answer` WRITE;
/*!40000 ALTER TABLE `Answer` DISABLE KEYS */;
INSERT INTO `Answer` VALUES (10,39,'Luqman','lala@asu.com','Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis tellus ante, porta eu tempus eu, placerat non neque. Donec mollis a diam vel hendrerit. Etiam tortor justo, aliquam eu rhoncus a, faucibus non elit. In tellus turpis, sagittis nec porttitor ac, fringilla vel augue. Morbi ligula ante, sollicitudin ut aliquam dignissim, placerat sed dolor. Phasellus in tempus nulla.\r\n\r\nCras vel ipsum pellentesque, egestas quam eget, convallis diam. Suspendisse malesuada, nisi sed scelerisque facilisis, magna nulla mollis mauris, non fermentum magna libero a elit. Donec ac dui elementum, iaculis ligula et, semper nisi. Vestibulum cursus, risus vitae sollicitudin volutpat, mauris dui mattis tellus, ac egestas lorem dolor ut nibh. Donec eget placerat turpis, eget scelerisque massa. Aenean tincidunt scelerisque mi, a rutrum erat gravida vel. Cras augue neque, pretium a tempus a, volutpat quis magna. Nunc ex libero, dignissim eget ex ac, commodo convallis diam. Integer ut consectetur sapien. Phasellus at velit interdum metus dapibus finibus vitae tristique magna. Curabitur fermentum, quam non elementum convallis, magna nunc varius mauris, quis posuere risus erat vel libero.',12,'2015-10-07 14:34:36'),(11,39,'Ibrohim Kholilul Islam','ib@dsdf.com','asasas',4,'2015-10-09 04:24:18');
/*!40000 ALTER TABLE `Answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Question`
--

DROP TABLE IF EXISTS `Question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `topic` text NOT NULL,
  `content` text NOT NULL,
  `voters` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`),
  FULLTEXT KEY `searchIndex` (`name`,`topic`,`content`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Question`
--

LOCK TABLES `Question` WRITE;
/*!40000 ALTER TABLE `Question` DISABLE KEYS */;
INSERT INTO `Question` VALUES (39,'Ibrohim','ibrohimislam@gmail.com','Lorem ipsum dolor sit amet?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec sem in lorem ornare fermentum ac a erat. Vivamus dolor magna, porta eu felis eu, cursus gravida metus. Donec id arcu non enim pretium molestie. Curabitur tempus nisl ac sagittis dictum. Phasellus at quam sodales, finibus libero et, posuere erat. Vivamus ut elit at elit lobortis mollis. Integer pretium neque et ullamcorper malesuada. Nulla in nibh eget augue tristique scelerisque.\r\n\r\nSed nec lacus sit amet odio pharetra posuere vitae id ante. Nam odio quam, fringilla id fermentum a, consectetur quis lectus. Phasellus dignissim sed lacus et placerat. Suspendisse nibh nunc, viverra at libero eget, semper iaculis lacus. Nullam efficitur viverra ex vel egestas. Nam varius massa vitae tincidunt pellentesque. Fusce id aliquet ex. In lacus risus, lobortis vel aliquet sed, auctor ac urna. Praesent volutpat at sapien ornare luctus. Vivamus quis velit rhoncus, auctor ligula non, vehicula risus. Mauris ultrices varius neque. Suspendisse ultricies vitae sem ut iaculis. Pellentesque tempor condimentum tortor id vehicula.\r\n\r\nDonec dapibus est eget massa auctor, a vestibulum nunc placerat. Suspendisse congue augue sed dui interdum mollis. Vestibulum sit amet interdum arcu, a vehicula quam. Curabitur urna est, fermentum ac elit eu, viverra dignissim purus. Praesent cursus augue lorem, fermentum sagittis neque rutrum nec. Integer sodales metus et vehicula iaculis. In commodo nibh non dolor tincidunt tristique. Nunc pharetra ante elit, eleifend pulvinar velit tristique sed. Praesent semper lacinia metus vitae tempor. Nam urna ex, ultricies sit amet urna quis, ultricies egestas sem. Pellentesque fringilla iaculis blandit. Donec mollis commodo tincidunt. Pellentesque eu fringilla elit. Donec quis tempus velit.',9,'2015-10-07 14:34:21');
/*!40000 ALTER TABLE `Question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `QuestionView`
--

DROP TABLE IF EXISTS `QuestionView`;
/*!50001 DROP VIEW IF EXISTS `QuestionView`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `QuestionView` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `topic` tinyint NOT NULL,
  `content` tinyint NOT NULL,
  `voters` tinyint NOT NULL,
  `timestamp` tinyint NOT NULL,
  `answers` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `QuestionView`
--

/*!50001 DROP TABLE IF EXISTS `QuestionView`*/;
/*!50001 DROP VIEW IF EXISTS `QuestionView`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY INVOKER */
/*!50001 VIEW `QuestionView` AS select `Question`.`id` AS `id`,`Question`.`name` AS `name`,`Question`.`email` AS `email`,`Question`.`topic` AS `topic`,`Question`.`content` AS `content`,`Question`.`voters` AS `voters`,`Question`.`timestamp` AS `timestamp`,(select count(0) from `Answer` where (`Answer`.`questionID` = `Question`.`id`)) AS `answers` from `Question` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-09 17:14:47
