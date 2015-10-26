-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: stackex
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
-- Current Database: `stackex`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `stackex` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `stackex`;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `A_ID` int(11) DEFAULT NULL,
  `content` text,
  `vote` int(11) DEFAULT NULL,
  `author` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `A_ID` (`A_ID`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `questions` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,1,'Haha.. Love You Babe',5,'Tommy_Wisseau','O_hai_Mark@gmail.com'),(2,1,'I want to bite yo ear. You know how much I love you. But you hate me. sob.. sob..sob. Oh god I hate myself.Why I love you I don\'t know. I am a boxer but I am also a galauers. LoL LOL lol.. hahahahaha.. whatever',-15,'Mike Tyson','So_Tasty@gmail.com'),(6,1,'Ayo goyang dumang..',0,'Wong Mendem','Gumin@mingu.com'),(7,9,'I am your momma',6,'Genderuwo','SetanGauls@yahoo.com'),(8,9,'Lorem ipsum dolor sit amet, an vix saepe nullam, usu in omnis corrumpit, qui diceret petentium definitionem te. Ne mei wisi repudiandae, meis delicata ius in. Ea vidit detraxit legendos duo, mei at suscipit dissentias interpretaris, ei usu omnesque dissentiunt. Sit mazim viderer suscipiantur at, pri et sonet explicari, detracto deserunt no eum. Eos electram salutatus in, vix perpetua referrentur ex, sed munere regione posidonium ea.\r\n\r\nAffert putent repudiare ad qui. Ne eam placerat erroribus maiestatis, ne has melius phaedrum, ut sea nonumes mentitum menandri. Sint labore possim at pro, erant referrentur ut sea, eu vel nisl everti liberavisse. Vim id elitr equidem principes, cu iusto audiam dolores has. Lorem nominati torquatos eu nam. Iuvaret lucilius in per, in pri discere imperdiet, an quod timeam has.\r\n\r\nIus eu nibh solet bonorum, dico dicunt regione nec ad. In summo dolore saperet vel, duis mazim ocurreret id pri. Ea mediocrem voluptatum has, amet justo interesset vel an, cu his natum noster. Omnis possit disputationi per et.\r\n',0,'Que Sera Sera','Popeye@gmail.com'),(9,7,'test',2,'Tjan','wakwaw@gmail.com');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text,
  `content` text,
  `vote` int(11) DEFAULT NULL,
  `author` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Dummy','Hai I am just a dummy. I really really really really really Hate You. LOL',16,'Carly','so_dumb@gmail.com'),(7,'How to train my dragon?','Lorem ipsum dolor sit amet, ut hinc propriae erroribus mei, ea has mutat saepe philosophia, eu dolorum mentitum suscipit sea. Debitis suscipit signiferumque id sit, cum saepe civibus blandit at. Per corpora albucius ocurreret ea. Vel in iisque adipisci suavitate, eu falli homero mea, ne his solet meliore placerat. Qui no verear interpretaris, nihil omnium ei quo. Ea graece intellegam per, eos ut movet percipit erroribus. Has no tale dicat, deseruisse reprimique repudiandae his et.\r\n\r\nVis magna convenire partiendo eu, pri ea probatus inciderint, partem everti eum ei. Conceptam deterruisset an pri. Ad vocent signiferumque mei, no purto rationibus inciderint vim, ut nec assentior scriptorem. Purto urbanitas ex his, quot imperdiet dissentiunt et vim. Eu his paulo corpora inimicus, pro constituam definitionem te.\r\n\r\nFalli populo iracundia quo ut, usu quis inimicus an. Ei cum tale habemus vivendo, eos quem suavitate eu. Quo ea nusquam gloriatur voluptatibus, aliquid constituam sit cu. Iriure oporteat efficiendi ad pri, mutat rebum cu vix. Est omnesque phaedrum ei, ex discere voluptua mei.\r\n\r\nPro cu iriure intellegebat, eum ut fuisset sensibus, sit ei omittam volutpat. Facilis denique voluptatum ea sea, ius velit nostro discere et, at detraxit assentior pro. Exerci nullam veritus id mea. Ei pri labore tibique quaerendum, duo at quis omnis, mei simul interesset an. Iuvaret copiosae liberavisse nec eu, pro id alterum intellegat, usu et nostrud appareat referrentur.\r\n\r\nQuo ipsum iusto mundi no, eu illum ludus consetetur vis, vis volumus adipisci iracundia ea. Pri ea mazim civibus. Nam errem aperiam vivendo at, vocibus accumsan constituto ex est. At sea delicata suscipiantur, everti lucilius omittantur ad eum. Pri accumsan pertinax in. Duo doctus philosophia eu, fierent percipit theophrastus eu mei.',9,'Hiccup','Vikings@gmail.com'),(9,'Who is my momma?','I thought that she is my momma. Turns out that she is not!! Who is my real momma?',-2,'Jack Martin','MyohMy@gmail.com'),(13,'How to build an aeroplane','Wiiiiiiiiinnnggggg I am flying.',-3,'Josh Nasty','Blerugh@vommit.com');
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

-- Dump completed on 2015-10-11  1:00:22
