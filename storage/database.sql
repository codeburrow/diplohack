-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: 192.168.10.10    Database: diplohack
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `area_funding`
--

DROP TABLE IF EXISTS `area_funding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_funding` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `funding_id` int(11) NOT NULL,
  `area_fundingcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_area_funding_aread_id_idx` (`area_id`),
  KEY `fk_area_funding_funding_id_idx` (`funding_id`),
  CONSTRAINT `fk_area_funding_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_area_funding_funding_id` FOREIGN KEY (`funding_id`) REFERENCES `fundings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_funding`
--

LOCK TABLES `area_funding` WRITE;
/*!40000 ALTER TABLE `area_funding` DISABLE KEYS */;
/*!40000 ALTER TABLE `area_funding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_funding`
--

DROP TABLE IF EXISTS `category_funding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_funding` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `funding_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_funding_funding_id_idx` (`funding_id`),
  KEY `fk_category_funding_category_id_idx` (`category_id`),
  CONSTRAINT `fk_category_funding_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_funding_funding_id` FOREIGN KEY (`funding_id`) REFERENCES `fundings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_funding`
--

LOCK TABLES `category_funding` WRITE;
/*!40000 ALTER TABLE `category_funding` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_funding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funding_district`
--

DROP TABLE IF EXISTS `funding_district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funding_district` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `funding_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `funding_districtcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funding_district_funding_id_idx` (`funding_id`),
  KEY `fk_funding_district_district_id_idx` (`district_id`),
  CONSTRAINT `fk_funding_district_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funding_district_funding_id` FOREIGN KEY (`funding_id`) REFERENCES `fundings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funding_district`
--

LOCK TABLES `funding_district` WRITE;
/*!40000 ALTER TABLE `funding_district` DISABLE KEYS */;
/*!40000 ALTER TABLE `funding_district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funding_link`
--

DROP TABLE IF EXISTS `funding_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funding_link` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `funding_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funding_id_idx` (`funding_id`),
  KEY `fk_link_id_idx` (`link_id`),
  CONSTRAINT `fk_funding_id` FOREIGN KEY (`funding_id`) REFERENCES `fundings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_link_id` FOREIGN KEY (`link_id`) REFERENCES `links` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funding_link`
--

LOCK TABLES `funding_link` WRITE;
/*!40000 ALTER TABLE `funding_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `funding_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funding_profile`
--

DROP TABLE IF EXISTS `funding_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funding_profile` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `funding_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funding_profile_profile_id_idx` (`profile_id`),
  KEY `fk_funding_profile_funding_id_idx` (`funding_id`),
  CONSTRAINT `fk_funding_profile_funding_id` FOREIGN KEY (`funding_id`) REFERENCES `fundings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funding_profile_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funding_profile`
--

LOCK TABLES `funding_profile` WRITE;
/*!40000 ALTER TABLE `funding_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `funding_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fundings`
--

DROP TABLE IF EXISTS `fundings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fundings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fundings`
--

LOCK TABLES `fundings` WRITE;
/*!40000 ALTER TABLE `fundings` DISABLE KEYS */;
/*!40000 ALTER TABLE `fundings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-09 11:39:41
