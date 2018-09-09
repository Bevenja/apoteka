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
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (1,'galenika.png','galenika_logo'),(2,'KLOMETOL.jpg','KLOMETOL_LEK'),(3,'Jellyfish.jpg','bayer_logo'),(4,'galenika.png','FAMAR A.V.E. ANTHOUSSA PLANT'),(5,'brufen.jpg','brufen'),(6,'person_placeholder.jpg','person_placeholder'),(7,'Jellyfish.jpg','f'),(8,'Jellyfish.jpg','Jellyfish'),(9,'Tulips.jpg','Tulips'),(10,'medicine.png','placeholder'),(11,'APIRINnovo-228x228.jpg','APIRINnovo-228x228'),(12,'APIRINnovo-228x228.jpg','APIRINnovo-228x228'),(13,'Canesten.jpg','Canesten'),(14,'Canesten.jpg','Canesten'),(15,'Canesten.jpg','Canesten'),(16,'company_placeholder.png','company_placeholder'),(17,'paracetamol.png','paracetamol'),(18,'paracetamol.png','paracetamol'),(19,'paracetamol.png','paracetamol'),(20,'paracetamol.png','paracetamol'),(21,'paracetamol.png','paracetamol'),(22,'paracetamol.png','paracetamol'),(23,'paracetamol.png','paracetamol'),(24,'paracetamol.png','paracetamol'),(25,'Desert.jpg','Desert'),(26,'Koala.jpg','Koala');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
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
