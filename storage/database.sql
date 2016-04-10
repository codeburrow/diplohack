CREATE DATABASE  IF NOT EXISTS `heroku_f1f86cdaba26a8d` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `heroku_f1f86cdaba26a8d`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: eu-cdbr-west-01.cleardb.com    Database: heroku_f1f86cdaba26a8d
-- ------------------------------------------------------
-- Server version	5.5.40-log

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
-- Table structure for table `area_fund`
--

DROP TABLE IF EXISTS `area_fund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_fund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `fund_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_area_fund_aread_id_idx` (`area_id`),
  KEY `fk_area_fund_funding_id_idx` (`fund_id`),
  CONSTRAINT `fk_area_fund_fund_id` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_area_fund_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_fund`
--

LOCK TABLES `area_fund` WRITE;
/*!40000 ALTER TABLE `area_fund` DISABLE KEYS */;
/*!40000 ALTER TABLE `area_fund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (91,'All',NULL),(131,'East Macedonia - Thrace',NULL),(141,'Central Macedonia',NULL),(151,'Western Macedonia',NULL),(161,'Epirus',NULL),(171,'Thessaly',NULL),(181,'Continental Greece',NULL),(191,'Attica',NULL),(201,'Peloponesus',NULL),(211,'North Aegean ',NULL),(221,'South Aegean',NULL),(231,'Crete',NULL),(241,'Ionian Islands',NULL);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Research and Innovation',''),(31,'Education',NULL),(71,'Jobs & Growth',NULL),(101,'Agriculture',NULL),(111,'Maritime and Fisheries',NULL),(121,'Environment',NULL),(131,'Transport, Energy and ICT',NULL),(141,'All',NULL),(151,'Culture and media',NULL),(161,'Citizenship',NULL),(171,'Development and Humanitarian aid',NULL),(181,'Education and Culture',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_fund`
--

DROP TABLE IF EXISTS `category_fund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_fund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `fund_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_funding_funding_id_idx` (`fund_id`),
  KEY `fk_category_funding_category_id_idx` (`category_id`),
  CONSTRAINT `fk_category_funding_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_funding_funding_id` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_fund`
--

LOCK TABLES `category_fund` WRITE;
/*!40000 ALTER TABLE `category_fund` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_fund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,'destrict1','description1'),(2,'district2','description2');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fund_link`
--

DROP TABLE IF EXISTS `fund_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fund_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  `fund_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funding_id_idx` (`fund_id`),
  KEY `fk_link_id_idx` (`link_id`),
  CONSTRAINT `fk_funding_id` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_link_id` FOREIGN KEY (`link_id`) REFERENCES `links` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund_link`
--

LOCK TABLES `fund_link` WRITE;
/*!40000 ALTER TABLE `fund_link` DISABLE KEYS */;
INSERT INTO `fund_link` VALUES (11,11,1),(21,81,91);
/*!40000 ALTER TABLE `fund_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funds`
--

DROP TABLE IF EXISTS `funds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(180) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=651 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funds`
--

LOCK TABLES `funds` WRITE;
/*!40000 ALTER TABLE `funds` DISABLE KEYS */;
INSERT INTO `funds` VALUES (1,'OP Public Sector Reform',''),(91,'OP Human Resources Development, Education and Lifelong Learning',NULL),(101,'OP Rural Development',NULL),(111,'OP Maritime and Fisheries',NULL),(121,'OP Competitiveness, Entrepreneurship & Innovation',NULL),(131,'OP Transport, Infrastructure, Environment & Sustainable Development',NULL),(141,'OP Macedonia – Thrace',NULL),(151,'OP Central Macedonia',NULL),(161,'OP Western Macedonia',NULL),(171,'OP Epirus',NULL),(181,'OP Thessaly',NULL),(191,'OP Continental Greece',NULL),(201,'OP Attica',NULL),(211,'OP Ionian Islands',NULL),(221,'OP Peloponnesus',NULL),(231,'OP North Aegean',NULL),(241,'OP South Aegean',NULL),(251,'OP Crete',NULL),(261,'Interreg Greece - Bulgaria',NULL),(271,'Adrion Interreg',NULL),(281,'Greece - Cyprus',NULL),(291,'Greece - FYROM',NULL),(301,'Balkan-Mediterranean',NULL),(311,'Mediterreanean',NULL),(321,'Black Sea',NULL),(331,'Interreg Europe',NULL),(341,'Competitiveness of Enterprises and Small and Medium-sized Enterprises (COSME)',NULL),(351,'Connecting Europe Facility (CEF)',NULL),(361,'Horizon 2020\'s SME Instrument',NULL),(371,'Your Europe Business',NULL),(381,'H2020 SME Innovation Associate',NULL),(391,'Enterprise Europe Network',NULL),(401,'Fast Track to Innovation (FTI) Pilot',NULL),(411,'Horizon 2020 INNOSUP',NULL),(421,'Intellectual property',NULL),(431,'Common Agriculture Policy',NULL),(441,'Creative Europe - MEDIA',NULL),(451,'Creative Europe - CULTURE',NULL),(461,'Europe for Citizens',NULL),(471,'Horizon 2020 - Societal Challenges',NULL),(481,'Horizon 2020 - Smart, Green and Integrated Transport',NULL),(491,'Horizon 2020 - Secure, Clean and Efficient energy',NULL),(511,'EUROPEAID - International Cooperation and Development',NULL),(521,'ECHO - Humanitarian Aid and Civil Protection',NULL),(531,'Connecting Europe Facility (CEF) ',NULL),(541,'Erasmus + / KA2',NULL),(551,'Erasmus + / KA1',NULL),(561,'Erasmus + / KA3',NULL),(571,'Marie Sk?odowska-Curie Actions',NULL),(581,'Competitiveness of Enterprises and Small and Medium-sized Enterprises (COSME) - Erasmus for young entrepreneurs',NULL),(591,'H2020',NULL),(601,'European Research Council',NULL),(611,'Common Agriculture Policy',NULL),(621,'Employment and Social Innovation (EaSI)',NULL),(631,'LIFE+',NULL),(641,'Greece - Albania',NULL);
/*!40000 ALTER TABLE `funds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funds_district`
--

DROP TABLE IF EXISTS `funds_district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funds_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funding_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `funding_districtcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funding_district_funding_id_idx` (`funding_id`),
  KEY `fk_funding_district_district_id_idx` (`district_id`),
  CONSTRAINT `fk_funding_district_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funding_district_funding_id` FOREIGN KEY (`funding_id`) REFERENCES `funds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funds_district`
--

LOCK TABLES `funds_district` WRITE;
/*!40000 ALTER TABLE `funds_district` DISABLE KEYS */;
/*!40000 ALTER TABLE `funds_district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funds_profile`
--

DROP TABLE IF EXISTS `funds_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funds_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funding_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funding_profile_profile_id_idx` (`profile_id`),
  KEY `fk_funding_profile_funding_id_idx` (`funding_id`),
  CONSTRAINT `fk_funding_profile_funding_id` FOREIGN KEY (`funding_id`) REFERENCES `funds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funding_profile_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funds_profile`
--

LOCK TABLES `funds_profile` WRITE;
/*!40000 ALTER TABLE `funds_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `funds_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=761 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (11,'http://www.epdm.gr/',''),(81,'http://www.epanad.gov.gr/',''),(111,'http://www.edulll.gr/',''),(121,'http://www.agrotikianaptixi.gr/',''),(131,'http://www.alieia.gr/',''),(141,'http://www.antagonistikotita.gr/ ',''),(151,'http://www.epperaa.gr/',''),(161,'http://www.epep.gr/ ',''),(171,'http://www.eydamth.gr/ ',''),(181,'http://www.pepkm.gr/',''),(191,'http://www.pepdym.gr/',''),(201,'http://www.peproe.gr/ ',''),(211,'http://www.thessalia-espa.gr/ ',''),(221,'http://www.stereaellada.gr/',''),(231,'http://www.pepattikis.gr/',''),(241,'http://www.pepionia.gr/',''),(251,'http://www.dytikiellada-peloponnisos-ionio.gr/ ',''),(261,'http://www.pepba.gr/',''),(271,'http://www.pepna.gr/',''),(281,'http://www.pepkritis.gr/',''),(291,'http://www.interreg.gr/ ',''),(301,'http://www.adrioninterreg.eu/',''),(311,'http://interreg-med.eu/',''),(321,'www.blacksea-cbc.net ',''),(331,'www.interregeurope.eu  ',''),(341,'http://ec.europa.eu/easme/en/cosme',''),(351,'http://ec.europa.eu/inea/en/connecting-europe-facility',''),(361,'http://ec.europa.eu/easme/en/horizons-2020-sme-instrument',''),(371,'http://ec.europa.eu/easme/en/your-europe-business',''),(381,'http://ec.europa.eu/easme/en/h2020-sme-innovation-associate',''),(391,'http://ec.europa.eu/easme/en/enterprise-europe-network',''),(401,'http://ec.europa.eu/easme/en/fast-track-innovation-fti-pilot-0',''),(411,'http://ec.europa.eu/easme/en/horizon-2020-innosup',''),(421,'http://ec.europa.eu/easme/en/intellectual-property',''),(431,'http://ec.europa.eu/agriculture/cap-funding/funding-opportunities/index_en.htm',''),(441,'http://eacea.ec.europa.eu/creative-europe_en',''),(451,'http://eacea.ec.europa.eu/europe-for-citizens_en',''),(461,'http://ec.europa.eu/programmes/horizon2020/en/h2020-section/societal-challenges',''),(471,'http://ec.europa.eu/programmes/horizon2020/en/h2020-section/smart-green-and-integrated-transport',''),(481,'http://ec.europa.eu/programmes/horizon2020/en/h2020-section/secure-clean-and-efficient-energy',''),(491,'https://ec.europa.eu/europeaid/about-funding_en',''),(501,'http://ec.europa.eu/echo/funding-evaluations/funding-for-humanitarian-aid_en',''),(511,'https://ec.europa.eu/digital-single-market/en/connecting-europe-facility',''),(521,'http://ec.europa.eu/programmes/erasmus-plus/individuals_en',''),(531,'http://ec.europa.eu/programmes/erasmus-plus/organisations_en',''),(541,'http://ec.europa.eu/programmes/erasmus-plus/',''),(551,'http://ec.europa.eu/research/mariecurieactions/',''),(561,'http://ec.europa.eu/easme/en/cos-wp2014-4-05-erasmus-young-entrepreneurs',''),(571,'http://ec.europa.eu/programmes/horizon2020/en/area/funding-researchers',''),(581,'https://erc.europa.eu/',''),(591,'http://ec.europa.eu/rea/apply_for_funding/index_en.htm',''),(601,'http://ec.europa.eu/programmes/horizon2020/',''),(611,'http://ec.europa.eu/social/main.jsp?langId=en&catId=1081',''),(621,'http://ec.europa.eu/environment/life/funding/life.htm',''),(631,'http://www.ypeka.gr/Default.aspx?tabid=468&language=el-GR',''),(641,'http://innovation.ekt.gr/horizon2020',''),(651,'http://www.ekt.gr/',''),(661,'http://www.erasmus-entrepreneurs.eu/page.php?cid=5&pid=018&ctr=GR&country=%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1',''),(671,'https://www.iky.gr/erasmusplus',''),(681,'http://www.inedivim.gr/%CF%80%CF%81%CE%BF%CE%B3%CF%81%CE%AC%CE%BC%CE%BC%CE%B1%CF%84%CE%B1/erasmus%CE%BD%CE%B5%CE%BF%CE%BB%CE%B1%CE%AF%CE%B1',''),(691,'https://www.iky.gr/erasmusplus',''),(701,'http://efc.ypes.gr/',''),(711,'http://www.yppo.gr/4/g40.jsp?obj_id=55433',''),(721,'http://www.yppo.gr/4/g40.jsp?obj_id=55432',''),(731,'http://mediadeskhellas.eu/Index.asp?C=24',''),(741,'http://mediadeskhellas.eu/Index.asp?C=23',''),(751,'http://www.enterprise-hellas.gr/','');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (101,'NGOs',NULL),(111,'Small and Medium-sized Enterprises (SMEs)',NULL),(121,'Public Bodies',NULL),(131,'Individuals',NULL),(141,'Research Institutes',NULL),(151,'Academic Institutions, Research Centers, Univ',NULL),(161,'Chambers, Associations, Professional and Scie',NULL),(171,'Researchers',NULL);
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

-- Dump completed on 2016-04-10 13:18:57
