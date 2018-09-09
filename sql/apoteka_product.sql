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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `sifra` int(11) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `proizvodjac_id` int(11) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sifra_UNIQUE` (`sifra`),
  KEY `fk_products_proizvodjac1_idx` (`proizvodjac_id`),
  KEY `fk_products_kategorija1_idx` (`kategorija_id`),
  KEY `fk_product_img1_idx` (`img_id`),
  CONSTRAINT `fk_product_img1` FOREIGN KEY (`img_id`) REFERENCES `img` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_kategorija1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_proizvodjac1` FOREIGN KEY (`proizvodjac_id`) REFERENCES `proizvodjac` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Klometol',500.00,1111,'tableta 30 x 10mg',0,1,'2018-07-23 17:08:38',1,1,2),(2,'Damaton',295.25,22222,'Damaton je indikovan u lečenju periferne vaskularne bolesti, uključujući intermitentne klaudikacije i bol u mirovanju. Tableta sa produženim oslobađanjem 20 x 400mg',3,1,'2018-07-03 04:53:09',1,2,2),(3,'brufen',211.17,1122,'Lek Brufen je indikovan za odrasle i decu stariju od 12 godina. Za kratkotrajnu simptomatsku terapiju:\r\n.',0,1,'2018-07-23 17:13:00',3,2,5),(4,'Aspirin',119.23,500,'Aspirin®\r\n 500 tablete se upotrebljavaju za :\r\n- simptomatsko lečenje povišene telesne temperature i/ili, lečenje blagog do\r\n umerenog bola kao što je glavobolja, sindrom sličan gripu, zubobolja,\r\n bol u mišićima*\r\nOralna primena. Tablete uzimati uz veliku količinu tečnosti. ',12,1,'2018-07-02 01:36:57',2,3,12),(5,'Canesten',243.39,334,'Canesten®\r\n krem 1%\r\nKlotrimazol\r\nKrem za lečenje gljivičnih infekcija kože*\r\nCanesten®\r\n krem se koristi za lečenje gljivičnih infekcija kože i sluzokože.\r\nCanesten®\r\n krem se nanosi u tankom sloju, 2-3 puta na dan i pažljivo\r\nutrljava u kožu.*',3,1,'2018-07-02 01:43:53',2,1,13),(6,'PARACETAMOL',360.00,233234,'Doza i pakovanje:	tableta 20 x 500 mg\r\nIndikacije ili namena:	kratkotrajna terapija glavobolje, bolova u mišićima i zglobovima, menstrualnih bolova, zubobolje;\r\nfebrilna stanja i tegobe koje prate prehladu i grip; simptomatska terapija blagih do umerenih bolova kod osteoartritisa',1,1,'2018-07-23 17:11:12',1,2,24);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-24 15:08:17
