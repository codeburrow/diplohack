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
) ENGINE=InnoDB AUTO_INCREMENT=1111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_fund`
--

LOCK TABLES `area_fund` WRITE;
/*!40000 ALTER TABLE `area_fund` DISABLE KEYS */;
INSERT INTO `area_fund` VALUES (1,221,241),(11,91,1),(21,91,91),(31,91,101),(41,91,111),(51,91,121),(61,91,131),(71,131,141),(81,141,151),(91,151,161),(101,161,171),(111,171,181),(121,181,191),(131,191,201),(141,181,211),(151,201,221),(161,211,231),(171,221,241),(181,231,251),(651,131,261),(661,141,261),(671,91,271),(681,211,281),(691,221,281),(701,231,281),(711,161,641),(721,151,641),(731,241,641),(741,141,291),(751,151,291),(761,91,301),(771,91,311),(781,131,321),(791,141,321),(801,91,331),(811,91,341),(821,91,351),(831,91,361),(841,91,371),(851,91,381),(861,91,391),(871,91,401),(881,91,411),(891,91,421),(901,91,431),(911,91,441),(921,91,451),(931,91,461),(941,91,471),(951,91,481),(961,91,491),(971,91,511),(981,91,521),(991,91,531),(1001,91,541),(1011,91,551),(1021,91,561),(1031,91,571),(1041,91,581),(1051,91,591),(1061,91,601),(1071,91,611),(1081,91,621),(1091,91,631),(1101,91,641);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_fund`
--

LOCK TABLES `category_fund` WRITE;
/*!40000 ALTER TABLE `category_fund` DISABLE KEYS */;
INSERT INTO `category_fund` VALUES (1,141,241);
/*!40000 ALTER TABLE `category_fund` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=611 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund_link`
--

LOCK TABLES `fund_link` WRITE;
/*!40000 ALTER TABLE `fund_link` DISABLE KEYS */;
INSERT INTO `fund_link` VALUES (11,11,1),(21,111,91),(31,81,91),(41,121,101),(51,131,111),(61,141,121),(71,151,131),(81,161,131),(91,171,141),(101,181,151),(111,191,161),(121,201,171),(131,211,181),(141,221,191),(151,231,201),(161,241,211),(171,251,221),(181,261,231),(191,271,241),(201,281,251),(211,291,261),(221,301,271),(231,291,281),(241,291,641),(251,291,291),(261,291,301),(271,311,311),(281,321,321),(291,331,331),(301,341,341),(311,351,351),(321,361,361),(331,371,371),(341,381,381),(351,391,391),(361,401,401),(371,411,411),(381,421,421),(391,431,431),(401,441,441),(411,441,451),(421,451,461),(431,461,471),(441,471,481),(451,481,491),(461,491,511),(471,501,521),(481,511,531),(491,641,491),(501,641,481),(511,641,471),(521,701,461),(531,711,451),(541,731,441),(551,721,451),(561,741,441),(571,641,411),(581,751,391),(591,641,381),(601,641,361);
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
) ENGINE=InnoDB AUTO_INCREMENT=841 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funds_profile`
--

LOCK TABLES `funds_profile` WRITE;
/*!40000 ALTER TABLE `funds_profile` DISABLE KEYS */;
INSERT INTO `funds_profile` VALUES (1,241,151),(11,241,131),(21,241,121),(31,241,111),(41,1,101),(51,91,101),(61,151,101),(71,181,101),(81,191,101),(91,221,101),(101,231,101),(111,261,101),(121,271,101),(131,281,101),(141,641,101),(151,291,101),(161,301,101),(171,311,101),(181,321,101),(191,331,101),(201,441,101),(211,451,101),(221,461,101),(231,471,101),(241,481,101),(251,491,101),(261,511,101),(271,521,101),(281,531,101),(291,541,101),(301,551,101),(311,621,101),(321,631,101),(331,1,111),(341,91,111),(351,101,111),(361,111,111),(371,121,111),(381,141,111),(391,151,111),(401,161,111),(411,171,111),(421,181,111),(431,191,111),(441,201,111),(451,211,111),(461,221,111),(471,231,111),(481,241,111),(491,251,111),(501,261,111),(511,271,111),(521,281,111),(531,641,111),(541,291,111),(551,301,111),(561,311,111),(571,321,111),(581,331,111),(591,341,111),(601,351,111),(611,361,111),(621,371,111),(631,381,111),(641,391,111),(651,401,111),(661,411,111),(671,421,111),(681,431,111),(691,91,131),(701,101,131),(711,111,131),(721,141,131),(731,151,131),(741,161,131),(751,171,131),(761,181,131),(771,191,131),(781,201,131),(791,211,131),(801,221,131),(811,231,131),(821,241,131),(831,251,131);
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

-- Dump completed on 2016-04-10 15:28:21
