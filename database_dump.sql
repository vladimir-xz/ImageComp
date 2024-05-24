-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: image_compare
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ad` (
  `ad_id` bigint NOT NULL,
  `client_id` bigint DEFAULT NULL,
  `image_url` text,
  `pictures` text,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad`
--

LOCK TABLES `ad` WRITE;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;
INSERT INTO `ad` VALUES (136586398,15641551,NULL,NULL),(150967188,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]',NULL),(150967191,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(150967194,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(151028978,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(153602207,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(153602210,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(153869604,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/FD\\/210195.png\"]','[]'),(154041219,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(154041362,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(154992869,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F3\\/21D7C7.png\"]','[]'),(155316032,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/FD\\/210195.png\"]','[]'),(155829130,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/1C\\/EE6355.jpg\"]','[]'),(155829158,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/1C\\/EE6355.jpg\"]','[]'),(156042348,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/1C\\/EE6355.jpg\"]','[]'),(156803169,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/25\\/AFF5D1.jpg\"]','[]'),(156803170,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F4\\/D28A24.jpg\"]','[]'),(156803286,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/25\\/AFF5D1.jpg\"]','[]'),(156959048,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/25\\/AFF5D1.jpg\"]','[]'),(156959049,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F4\\/D28A24.jpg\"]','[]'),(156959051,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/25\\/AFF5D1.jpg\"]','[]'),(157199166,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157199167,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/25\\/AFF5D1.jpg\"]','[]'),(157283073,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/F4\\/D28A24.jpg\"]','[]'),(157283074,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/25\\/AFF5D1.jpg\"]','[]'),(157283075,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157579066,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157579067,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157579068,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157579069,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157862070,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157862071,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157862072,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]'),(157862143,15641551,'[\"https:\\/\\/r.mradx.net\\/img\\/07\\/8BCEDD.jpg\"]','[]');
/*!40000 ALTER TABLE `ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES ('AU','Australia',24016400),('BR','Brazil',205722000),('CA','Canada',35985751),('CN','China',1375210000),('DE','Germany',81459000),('FR','France',64513242),('GB','United Kingdom',65097000),('IN','India',1285400000),('RU','Russia',146519759),('US','United States',322976000);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-23 21:33:34
