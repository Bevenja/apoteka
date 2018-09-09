-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: apoteka
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `general_info`
--

DROP TABLE IF EXISTS `general_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(45) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_general_info_city1_idx` (`city_id`),
  CONSTRAINT `fk_general_info_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_info`
--

LOCK TABLES `general_info` WRITE;
/*!40000 ALTER TABLE `general_info` DISABLE KEYS */;
INSERT INTO `general_info` VALUES (1,'Kralja Petra 12','3193093','neki@mail.com',1),(2,'Cara Dusana 3','0319309322','bas.neki@mail.com',1),(3,'Batajnički drum b.b.','(+381 11) 307 1077 ','info@galenika.rs',1),(4,'Omladinskih brigada 88b','011/207-0270','bayer@srbija.com',1),(5,'Batajnički drum b.b.','4343554543','mali@mejl.com',1),(6,'Cara Dusana 33','098338229','neki@mail.com',1),(7,'aaaa','333666','moj@mejl',1),(8,'neka adresa','2343234','kompanija@mail.com',1),(9,'neka adresa','123123','maoj@mejl',1),(10,'neka  ','12376543','moj@mejl',1),(11,'aaaa','234878','moj@mejl',1),(12,'neka tamo bb','232221','moj@mejl',1),(13,'neka tamo','543312','moj@mejl',1),(14,'Diljska','8874554','dd',1),(15,'beogradski put bb','983948298','hemofarm@nesto.com',1),(16,'Pančevačka bb, 23000','2234566','moj@mejl',1),(17,'negde tamo 5','33456778','moj@mejl',1),(18,'negde tamo 5','876543','blinki.bil@hej.hej.com',1);
/*!40000 ALTER TABLE `general_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-24 15:08:18
