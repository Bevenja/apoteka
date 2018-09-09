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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_users1_idx` (`users_id`),
  KEY `fk_admin_employees1_idx` (`employees_id`),
  CONSTRAINT `fk_admin_employees1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_admin_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,1,1),(2,9,2);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advices`
--

DROP TABLE IF EXISTS `advices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `advice_text` longtext NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employees_id` int(11) NOT NULL,
  `img_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_advices_employees1_idx` (`employees_id`),
  KEY `fk_advices_img1_idx` (`img_id`),
  CONSTRAINT `fk_advices_employees1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_advices_img1` FOREIGN KEY (`img_id`) REFERENCES `img` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advices`
--

LOCK TABLES `advices` WRITE;
/*!40000 ALTER TABLE `advices` DISABLE KEYS */;
INSERT INTO `advices` VALUES (1,'Naslov prvog teksta izmenjen 2','ovde ide neki kratak opis teksta ','','2018-07-23 18:44:17',1,8,1),(2,'Naslov drugog teksta','		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut ','﻿Olujno nevreme uz snažan vetar i veliku količinu padavina pogodilo je Suboticu, a kako javljaju mediji, u tom gradu veliki broj ulica je poplavljen, saobraćaj je usporen, a izvaljena su i mnoga stabla, a jedna osoba je lakše povređena. Opširnije OVDE.\r\n\r\nNajveca materijalna šteta do sada je zabeležna na krovu zgrade Ekonomskog fakulteta i Studentskog centra, odakle je odleteo deo krovne konstrukcije.\r\n\r\nKiša i dalje povremeno snažno pada, a saobracaj je usporen.\r\n\r\nI saobraćaj na Ibarskoj magistrali kod Stepojevca je gotovo blokiran zbog bujice koja je večeras od puta napravila jezero, navode mediji.\r\n\r\nSaobraćaj je bio potpuno blokiran oko 18 .30, a sada se odvija veoma otežano, na momente od vode može da se prodje, a na momente ne.\r\n\r\nKiša koja u prekidima pada ceo dan napravila je veliki problem, a ta saobraćajnica je kod ovog naselja u blizini Beograda zatvorena.\r\n\r\nReka Vrbovica napravila je velike probleme žiteljima u selima Vrbovno i Konatice kod Stepojevca.\r\n\r\nPrema navodima medija, spasilačke ekipe su sa čamcima hitno upućene na poplavljeno područje.\r\n\r\nPored toga što je voda potopila puteve, meštani u Konaticama su se peli na kuće kako bi se sklonili od vodene stihije koja je nadirala.\r\n\r\nBujica je u tom mestu odnela nekoliko automobila, te su ljudi bili prinudjeni zajedno sa decom beže iz vozila od nadolazeće vode.\r\n\r\nNeka mesta, kako se navodi, u okolini Stepojevca ostala su bez električne energije.\r\n\r\nNačelnik Sektora za vanredne situacije Predrag Marić stigao je u opštinu Lazarevac, tačnije mesto Stepojevac, gde je trenutno angažovano 17 vatrogasaca-spasilaca sa šest vozila i četiri čamca i trenutno rade na evakuaciji najugroženijih građana.\r\n\r\nDo sada je u Stepojevcu evakuisano 30 ljudi.Olujno nevreme uz snažan vetar i veliku količinu padavina pogodilo je Suboticu, a kako javljaju mediji, u tom gradu veliki broj ulica je poplavljen, saobraćaj je usporen, a izvaljena su i mnoga stabla, a jedna osoba je lakše povređena. Opširnije OVDE.\r\n\r\nNajveca materijalna šteta do sada je zabeležna na krovu zgrade Ekonomskog fakulteta i Studentskog centra, odakle je odleteo deo krovne konstrukcije.\r\n\r\nKiša i dalje povremeno snažno pada, a saobracaj je usporen.\r\n\r\nI saobraćaj na Ibarskoj magistrali kod Stepojevca je gotovo blokiran zbog bujice koja je večeras od puta napravila jezero, navode mediji.\r\n\r\nSaobraćaj je bio potpuno blokiran oko 18 .30, a sada se odvija veoma otežano, na momente od vode može da se prodje, a na momente ne.\r\n\r\nKiša koja u prekidima pada ceo dan napravila je veliki problem, a ta saobraćajnica je kod ovog naselja u blizini Beograda zatvorena.\r\n\r\nReka Vrbovica napravila je velike probleme žiteljima u selima Vrbovno i Konatice kod Stepojevca.\r\n\r\nPrema navodima medija, spasilačke ekipe su sa čamcima hitno upućene na poplavljeno područje.\r\n\r\nPored toga što je voda potopila puteve, meštani u Konaticama su se peli na kuće kako bi se sklonili od vodene stihije koja je nadirala.\r\n\r\nBujica je u tom mestu odnela nekoliko automobila, te su ljudi bili prinudjeni zajedno sa decom beže iz vozila od nadolazeće vode.\r\n\r\nNeka mesta, kako se navodi, u okolini Stepojevca ostala su bez električne energije.\r\n\r\nNačelnik Sektora za vanredne situacije Predrag Marić stigao je u opštinu Lazarevac, tačnije mesto Stepojevac, gde je trenutno angažovano 17 vatrogasaca-spasilaca sa šest vozila i četiri čamca i trenutno rade na evakuaciji najugroženijih građana.\r\n\r\nDo sada je u Stepojevcu evakuisano 30 ljudi.Olujno nevreme uz snažan vetar i veliku količinu padavina pogodilo je Suboticu, a kako javljaju mediji, u tom gradu veliki broj ulica je poplavljen, saobraćaj je usporen, a izvaljena su i mnoga stabla, a jedna osoba je lakše povređena. Opširnije OVDE.\r\n\r\nNajveca materijalna šteta do sada je zabeležna na krovu zgrade Ekonomskog fakulteta i Studentskog centra, odakle je odleteo deo krovne konstrukcije.\r\n\r\nKiša i dalje povremeno snažno pada, a saobracaj je usporen.\r\n\r\nI saobraćaj na Ibarskoj magistrali kod Stepojevca je gotovo blokiran zbog bujice koja je večeras od puta napravila jezero, navode mediji.\r\n\r\nSaobraćaj je bio potpuno blokiran oko 18 .30, a sada se odvija veoma otežano, na momente od vode može da se prodje, a na momente ne.\r\n\r\nKiša koja u prekidima pada ceo dan napravila je veliki problem, a ta saobraćajnica je kod ovog naselja u blizini Beograda zatvorena.\r\n\r\nReka Vrbovica napravila je velike probleme žiteljima u selima Vrbovno i Konatice kod Stepojevca.\r\n\r\nPrema navodima medija, spasilačke ekipe su sa čamcima hitno upućene na poplavljeno područje.\r\n\r\nPored toga što je voda potopila puteve, meštani u Konaticama su se peli na kuće kako bi se sklonili od vodene stihije koja je nadirala.\r\n\r\nBujica je u tom mestu odnela nekoliko automobila, te su ljudi bili prinudjeni zajedno sa decom beže iz vozila od nadolazeće vode.\r\n\r\nNeka mesta, kako se navodi, u okolini Stepojevca ostala su bez električne energije.\r\n\r\nNačelnik Sektora za vanredne situacije Predrag Marić stigao je u opštinu Lazarevac, tačnije mesto Stepojevac, gde je trenutno angažovano 17 vatrogasaca-spasilaca sa šest vozila i četiri čamca i trenutno rade na evakuaciji najugroženijih građana.\r\n\r\nDo sada je u Stepojevcu evakuisano 30 ljudi.','2018-06-29 22:45:27',1,7,1),(3,'Nov naslov','ovo je tekst koji dodajem iz brozera','﻿Olujno nevreme uz snažan vetar i veliku količinu padavina pogodilo je Suboticu, a kako javljaju mediji, u tom gradu veliki broj ulica je poplavljen, saobraćaj je usporen, a izvaljena su i mnoga stabla, a jedna osoba je lakše povređena. Opširnije OVDE.\r\n\r\nNajveca materijalna šteta do sada je zabeležna na krovu zgrade Ekonomskog fakulteta i Studentskog centra, odakle je odleteo deo krovne konstrukcije.\r\n\r\nKiša i dalje povremeno snažno pada, a saobracaj je usporen.\r\n\r\nI saobraćaj na Ibarskoj magistrali kod Stepojevca je gotovo blokiran zbog bujice koja je večeras od puta napravila jezero, navode mediji.\r\n\r\nSaobraćaj je bio potpuno blokiran oko 18 .30, a sada se odvija veoma otežano, na momente od vode može da se prodje, a na momente ne.\r\n\r\nKiša koja u prekidima pada ceo dan napravila je veliki problem, a ta saobraćajnica je kod ovog naselja u blizini Beograda zatvorena.\r\n\r\nReka Vrbovica napravila je velike probleme žiteljima u selima Vrbovno i Konatice kod Stepojevca.\r\n\r\nPrema navodima medija, spasilačke ekipe su sa čamcima hitno upućene na poplavljeno područje.\r\n\r\nPored toga što je voda potopila puteve, meštani u Konaticama su se peli na kuće kako bi se sklonili od vodene stihije koja je nadirala.\r\n\r\nBujica je u tom mestu odnela nekoliko automobila, te su ljudi bili prinudjeni zajedno sa decom beže iz vozila od nadolazeće vode.\r\n\r\nNeka mesta, kako se navodi, u okolini Stepojevca ostala su bez električne energije.\r\n\r\nNačelnik Sektora za vanredne situacije Predrag Marić stigao je u opštinu Lazarevac, tačnije mesto Stepojevac, gde je trenutno angažovano 17 vatrogasaca-spasilaca sa šest vozila i četiri čamca i trenutno rade na evakuaciji najugroženijih građana.\r\n\r\nDo sada je u Stepojevcu evakuisano 30 ljudi.Olujno nevreme uz snažan vetar i veliku količinu padavina pogodilo je Suboticu, a kako javljaju mediji, u tom gradu veliki broj ulica je poplavljen, saobraćaj je usporen, a izvaljena su i mnoga stabla, a jedna osoba je lakše povređena. Opširnije OVDE.\r\n\r\nNajveca materijalna šteta do sada je zabeležna na krovu zgrade Ekonomskog fakulteta i Studentskog centra, odakle je odleteo deo krovne konstrukcije.\r\n\r\nKiša i dalje povremeno snažno pada, a saobracaj je usporen.\r\n\r\nI saobraćaj na Ibarskoj magistrali kod Stepojevca je gotovo blokiran zbog bujice koja je večeras od puta napravila jezero, navode mediji.\r\n\r\nSaobraćaj je bio potpuno blokiran oko 18 .30, a sada se odvija veoma otežano, na momente od vode može da se prodje, a na momente ne.\r\n\r\nKiša koja u prekidima pada ceo dan napravila je veliki problem, a ta saobraćajnica je kod ovog naselja u blizini Beograda zatvorena.\r\n\r\nReka Vrbovica napravila je velike probleme žiteljima u selima Vrbovno i Konatice kod Stepojevca.\r\n\r\nPrema navodima medija, spasilačke ekipe su sa čamcima hitno upućene na poplavljeno područje.\r\n\r\nPored toga što je voda potopila puteve, meštani u Konaticama su se peli na kuće kako bi se sklonili od vodene stihije koja je nadirala.\r\n\r\nBujica je u tom mestu odnela nekoliko automobila, te su ljudi bili prinudjeni zajedno sa decom beže iz vozila od nadolazeće vode.\r\n\r\nNeka mesta, kako se navodi, u okolini Stepojevca ostala su bez električne energije.\r\n\r\nNačelnik Sektora za vanredne situacije Predrag Marić stigao je u opštinu Lazarevac, tačnije mesto Stepojevac, gde je trenutno angažovano 17 vatrogasaca-spasilaca sa šest vozila i četiri čamca i trenutno rade na evakuaciji najugroženijih građana.\r\n\r\nDo sada je u Stepojevcu evakuisano 30 ljudi.','2018-06-30 03:07:18',1,9,1),(4,'najnoviji tekst','Ovo je neki tekst koji je jako vazan za probleme sa kozom i nacinima njegovog lecenja','﻿Olujno nevreme uz snažan vetar i veliku količinu padavina pogodilo je Suboticu, a kako javljaju mediji, u tom gradu veliki broj ulica je poplavljen, saobraćaj je usporen, a izvaljena su i mnoga stabla, a jedna osoba je lakše povređena. Opširnije OVDE.\r\n\r\nNajveca materijalna šteta do sada je zabeležna na krovu zgrade Ekonomskog fakulteta i Studentskog centra, odakle je odleteo deo krovne konstrukcije.\r\n\r\nKiša i dalje povremeno snažno pada, a saobracaj je usporen.\r\n\r\nI saobraćaj na Ibarskoj magistrali kod Stepojevca je gotovo blokiran zbog bujice koja je večeras od puta napravila jezero, navode mediji.\r\n\r\nSaobraćaj je bio potpuno blokiran oko 18 .30, a sada se odvija veoma otežano, na momente od vode može da se prodje, a na momente ne.\r\n\r\nKiša koja u prekidima pada ceo dan napravila je veliki problem, a ta saobraćajnica je kod ovog naselja u blizini Beograda zatvorena.\r\n\r\nReka Vrbovica napravila je velike probleme žiteljima u selima Vrbovno i Konatice kod Stepojevca.\r\n\r\nPrema navodima medija, spasilačke ekipe su sa čamcima hitno upućene na poplavljeno područje.\r\n\r\nPored toga što je voda potopila puteve, meštani u Konaticama su se peli na kuće kako bi se sklonili od vodene stihije koja je nadirala.\r\n\r\nBujica je u tom mestu odnela nekoliko automobila, te su ljudi bili prinudjeni zajedno sa decom beže iz vozila od nadolazeće vode.\r\n\r\nNeka mesta, kako se navodi, u okolini Stepojevca ostala su bez električne energije.\r\n\r\nNačelnik Sektora za vanredne situacije Predrag Marić stigao je u opštinu Lazarevac, tačnije mesto Stepojevac, gde je trenutno angažovano 17 vatrogasaca-spasilaca sa šest vozila i četiri čamca i trenutno rade na evakuaciji najugroženijih građana.\r\n\r\nDo sada je u Stepojevcu evakuisano 30 ljudi.Olujno nevreme uz snažan vetar i veliku količinu padavina pogodilo je Suboticu, a kako javljaju mediji, u tom gradu veliki broj ulica je poplavljen, saobraćaj je usporen, a izvaljena su i mnoga stabla, a jedna osoba je lakše povređena. Opširnije OVDE.\r\n\r\nNajveca materijalna šteta do sada je zabeležna na krovu zgrade Ekonomskog fakulteta i Studentskog centra, odakle je odleteo deo krovne konstrukcije.\r\n\r\nKiša i dalje povremeno snažno pada, a saobracaj je usporen.\r\n\r\nI saobraćaj na Ibarskoj magistrali kod Stepojevca je gotovo blokiran zbog bujice koja je večeras od puta napravila jezero, navode mediji.\r\n\r\nSaobraćaj je bio potpuno blokiran oko 18 .30, a sada se odvija veoma otežano, na momente od vode može da se prodje, a na momente ne.\r\n\r\nKiša koja u prekidima pada ceo dan napravila je veliki problem, a ta saobraćajnica je kod ovog naselja u blizini Beograda zatvorena.\r\n\r\nReka Vrbovica napravila je velike probleme žiteljima u selima Vrbovno i Konatice kod Stepojevca.\r\n\r\nPrema navodima medija, spasilačke ekipe su sa čamcima hitno upućene na poplavljeno područje.\r\n\r\nPored toga što je voda potopila puteve, meštani u Konaticama su se peli na kuće kako bi se sklonili od vodene stihije koja je nadirala.\r\n\r\nBujica je u tom mestu odnela nekoliko automobila, te su ljudi bili prinudjeni zajedno sa decom beže iz vozila od nadolazeće vode.\r\n\r\nNeka mesta, kako se navodi, u okolini Stepojevca ostala su bez električne energije.\r\n\r\nNačelnik Sektora za vanredne situacije Predrag Marić stigao je u opštinu Lazarevac, tačnije mesto Stepojevac, gde je trenutno angažovano 17 vatrogasaca-spasilaca sa šest vozila i četiri čamca i trenutno rade na evakuaciji najugroženijih građana.\r\n\r\nDo sada je u Stepojevcu evakuisano 30 ljudi.https://www.pornhub.com/album/26462021  https://www.pornhub.com/users/givingprincess','2018-07-23 18:46:20',1,25,1);
/*!40000 ALTER TABLE `advices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `akcija`
--

DROP TABLE IF EXISTS `akcija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `akcija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `percentage` decimal(6,2) NOT NULL,
  `old_price` decimal(6,2) NOT NULL,
  `new_price` decimal(6,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_akcija_product1_idx` (`product_id`),
  CONSTRAINT `fk_akcija_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akcija`
--

LOCK TABLES `akcija` WRITE;
/*!40000 ALTER TABLE `akcija` DISABLE KEYS */;
INSERT INTO `akcija` VALUES (3,'2018-07-12 03:49:50',5.00,125.50,119.23,1,4),(4,'2018-07-14 00:06:10',10.00,300.00,270.00,1,1),(5,'2018-07-14 00:06:20',15.00,248.44,211.17,1,3),(6,'2018-07-23 17:20:50',10.00,400.00,360.00,1,6);
/*!40000 ALTER TABLE `akcija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(45) NOT NULL,
  `shiping_price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Beograd',150.40);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_company`
--

DROP TABLE IF EXISTS `client_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clients_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client_company_clients1_idx` (`clients_id`),
  KEY `fk_client_company_company1_idx` (`company_id`),
  CONSTRAINT `fk_client_company_clients1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_company_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_company`
--

LOCK TABLES `client_company` WRITE;
/*!40000 ALTER TABLE `client_company` DISABLE KEYS */;
INSERT INTO `client_company` VALUES (1,'2018-06-19 02:41:32',2,1),(2,'2018-07-06 03:25:36',4,5),(3,'2018-07-06 03:29:24',5,6);
/*!40000 ALTER TABLE `client_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_person`
--

DROP TABLE IF EXISTS `client_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clients_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client_person_clients1_idx` (`clients_id`),
  KEY `fk_client_person_person1_idx` (`person_id`),
  CONSTRAINT `fk_client_person_clients1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_client_person_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_person`
--

LOCK TABLES `client_person` WRITE;
/*!40000 ALTER TABLE `client_person` DISABLE KEYS */;
INSERT INTO `client_person` VALUES (1,'2018-06-19 01:52:45',1,1),(2,'2018-07-06 03:04:35',3,3),(3,'2018-07-06 03:20:28',4,4),(4,'2018-07-06 03:27:29',5,5),(5,'2018-07-07 03:47:14',6,6);
/*!40000 ALTER TABLE `client_person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clients_users_idx` (`users_id`),
  CONSTRAINT `fk_clients_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,1,1,2),(2,2,1,3),(3,1,0,4),(4,2,0,5),(5,1,0,6),(6,1,0,8);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `pib` int(11) NOT NULL,
  `general_info_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_company_general_info1_idx` (`general_info_id`),
  CONSTRAINT `fk_company_general_info1` FOREIGN KEY (`general_info_id`) REFERENCES `general_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'firma',123456,2),(2,'galenika',123455,3),(3,'bayer',211233,4),(4,'FAMAR A.V.E. ANTHOUSSA PLANT',222444,5),(5,'Kompanija',123456,8),(6,'neka nova',123321,9),(7,'Moja Firma',123412,10),(8,'Hemofarm',888222,15),(9,'JUGOREMEDIJA',100653193,16);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employees_person1_idx` (`person_id`),
  KEY `fk_employees_img1_idx` (`img_id`),
  CONSTRAINT `fk_employees_img1` FOREIGN KEY (`img_id`) REFERENCES `img` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,2,6),(2,7,6),(3,8,6),(4,9,6),(5,10,6),(6,11,26);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `kategorija`
--

DROP TABLE IF EXISTS `kategorija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorija` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorija`
--

LOCK TABLES `kategorija` WRITE;
/*!40000 ALTER TABLE `kategorija` DISABLE KEYS */;
INSERT INTO `kategorija` VALUES (1,'digestivni sistem i metabolizam'),(2,'Krv i krvotvorni organi'),(3,'Kardiovaskularni sistem');
/*!40000 ALTER TABLE `kategorija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `jmbg` varchar(13) NOT NULL,
  `general_info_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_person_general_info1_idx` (`general_info_id`),
  CONSTRAINT `fk_person_general_info1` FOREIGN KEY (`general_info_id`) REFERENCES `general_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'Pera','Peric','1234567890123',1),(2,'Marko','Markovic','1234567890122',6),(3,'Milan','Tarot','121213243546',7),(4,'Neko','Neko','12343212123',8),(5,'neko','Drugi','756462372892',9),(6,'Jovan','Jovanovic','34459828',11),(7,'Radnik','Meseca','123123131',12),(8,'Zika','Zivkovic','84713871837',13),(9,'Novi ','Radnik','059209095',14),(10,'Janko','Jankovic','873827892498',17),(11,'Blinki','Bil','345876543',18);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `product_purchase`
--

DROP TABLE IF EXISTS `product_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_product_purchase_purchase1_idx` (`purchase_id`),
  KEY `fk_product_purchase_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_purchase_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_purchase_purchase1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_purchase`
--

LOCK TABLES `product_purchase` WRITE;
/*!40000 ALTER TABLE `product_purchase` DISABLE KEYS */;
INSERT INTO `product_purchase` VALUES (9,1,1,1),(10,1,3,4),(11,2,3,1),(12,3,2,2),(13,3,5,3),(14,4,1,1),(15,4,3,10),(16,5,1,1),(17,5,2,4),(18,5,4,11),(19,6,2,1),(20,7,1,4),(21,7,4,2),(22,9,6,3);
/*!40000 ALTER TABLE `product_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_symptoms`
--

DROP TABLE IF EXISTS `products_symptoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_symptoms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `symptoms_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_symptoms_products1_idx` (`products_id`),
  KEY `fk_products_symptoms_symptoms1_idx` (`symptoms_id`),
  CONSTRAINT `fk_products_symptoms_products1` FOREIGN KEY (`products_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_symptoms_symptoms1` FOREIGN KEY (`symptoms_id`) REFERENCES `symptoms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_symptoms`
--

LOCK TABLES `products_symptoms` WRITE;
/*!40000 ALTER TABLE `products_symptoms` DISABLE KEYS */;
INSERT INTO `products_symptoms` VALUES (2,1,1),(3,1,2),(5,4,3),(6,6,3),(7,3,3);
/*!40000 ALTER TABLE `products_symptoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proizvodjac`
--

DROP TABLE IF EXISTS `proizvodjac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proizvodjac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proizvodjac_company1_idx` (`company_id`),
  KEY `fk_proizvodjac_img1_idx` (`img_id`),
  CONSTRAINT `fk_proizvodjac_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proizvodjac_img1` FOREIGN KEY (`img_id`) REFERENCES `img` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proizvodjac`
--

LOCK TABLES `proizvodjac` WRITE;
/*!40000 ALTER TABLE `proizvodjac` DISABLE KEYS */;
INSERT INTO `proizvodjac` VALUES (1,2,1),(2,3,3),(3,4,4),(4,8,16),(5,9,16);
/*!40000 ALTER TABLE `proizvodjac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` decimal(6,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clients_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_purchase_clients1_idx` (`clients_id`),
  CONSTRAINT `fk_purchase_clients1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (1,1444.16,3,'2018-06-28 16:45:20',1),(2,398.84,0,'2018-06-28 16:50:53',1),(3,1412.03,2,'2018-07-15 03:08:28',2),(4,2532.10,2,'2018-07-15 03:47:34',2),(5,2794.85,2,'2018-07-16 01:18:35',2),(6,416.13,2,'2018-07-19 18:06:01',2),(7,1468.86,1,'2018-07-19 18:59:32',2),(8,1230.40,1,'2018-07-23 18:52:58',1),(9,1230.40,1,'2018-07-23 18:54:56',1);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `symptoms`
--

DROP TABLE IF EXISTS `symptoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symptom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `symptoms`
--

LOCK TABLES `symptoms` WRITE;
/*!40000 ALTER TABLE `symptoms` DISABLE KEYS */;
INSERT INTO `symptoms` VALUES (1,'mucnina'),(2,'povracanje'),(3,'glavobolja'),(4,'nesanica'),(5,'gubitak_apetita');
/*!40000 ALTER TABLE `symptoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(20) NOT NULL,
  `salt` varchar(70) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `level` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'aaa','111','aaaaaaaaaa',1,2),(2,'qqq','111','eeeeeeeeee',1,1),(3,'www','111','skdji29jd29dj92jd9',1,1),(4,'mmm','aaa','1111111111111',1,1),(5,'kkk','111','1111111111111',0,1),(6,'ooo','111','1111111111111',1,1),(7,'nnn','111','1111111111111',0,1),(8,'jjj','111','1111111111111',1,1),(9,'rrr','111','1111111111111',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-24 15:22:15
