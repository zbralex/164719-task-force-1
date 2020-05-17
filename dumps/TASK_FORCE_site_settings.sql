-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: localhost    Database: TASK_FORCE
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `new_message` tinyint(1) DEFAULT '1',
  `actions_in_task` tinyint(1) DEFAULT '1',
  `show_contacts_client` tinyint(1) DEFAULT '1',
  `show_profile` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `site_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,1,0,0,1,1),(2,2,1,1,1,0),(3,3,1,0,0,1),(4,4,0,1,0,0),(5,5,1,1,1,1),(6,6,0,0,1,1),(7,7,1,1,0,0),(8,8,0,1,0,0),(9,9,1,1,1,1),(10,10,0,1,1,0),(11,11,1,0,1,0),(12,12,1,0,0,1),(13,13,1,0,0,0),(14,14,0,0,1,1),(15,15,1,0,0,1),(16,16,1,0,0,0),(17,17,0,0,1,1),(18,18,1,1,1,0),(19,19,1,1,0,1),(20,20,1,0,1,1),(21,21,0,1,1,1),(22,22,0,1,1,1),(23,23,1,0,1,0),(24,24,1,1,1,1),(25,25,1,1,1,0),(26,26,0,1,1,0),(27,27,0,0,1,0),(28,28,1,0,1,0),(29,29,0,0,1,0),(30,30,1,1,0,1),(31,31,1,1,1,0),(32,32,1,1,0,0),(33,33,0,0,1,1),(34,34,1,1,1,0),(35,35,1,0,0,1),(36,36,1,1,1,0),(37,37,0,1,1,0),(38,38,0,1,0,0),(39,39,1,1,0,1),(40,40,0,1,0,1),(41,41,1,1,0,0),(42,42,1,1,1,1),(43,43,0,1,0,0),(44,44,1,0,0,0),(45,45,1,1,1,0),(46,46,1,1,0,0),(47,47,1,1,1,0),(48,48,0,1,1,0),(49,49,1,1,0,0),(50,50,1,0,1,1),(51,51,0,0,1,0),(52,52,0,0,0,0),(53,53,1,0,0,0),(54,54,1,1,1,0),(55,55,1,1,0,0),(56,56,1,1,0,1),(57,57,1,0,0,0),(58,58,1,0,0,1),(59,59,0,0,1,0),(60,60,0,0,1,0),(61,61,0,1,1,1),(62,62,1,0,0,0),(63,63,0,1,0,0),(64,64,1,0,1,0),(65,65,1,1,1,1),(66,66,1,1,0,1),(67,67,1,0,0,0),(68,68,0,1,0,0),(69,69,1,1,0,1),(70,70,0,1,0,0),(71,71,0,1,0,1),(72,72,0,1,0,0),(73,73,1,1,1,0),(74,74,0,1,0,0),(75,75,1,1,0,0),(76,76,1,0,0,0),(77,77,0,1,0,0),(78,78,0,0,0,0),(79,79,0,1,0,0),(80,80,1,0,0,0),(81,81,1,1,1,0),(82,82,1,0,1,1),(83,83,1,1,1,0),(84,84,0,0,1,1),(85,85,1,1,1,0),(86,86,0,0,0,0),(87,87,1,1,1,1),(88,88,1,1,0,0),(89,89,1,1,1,0),(90,90,1,0,1,0),(91,91,0,1,1,1),(92,92,1,0,0,1),(93,93,0,1,0,0),(94,94,0,1,1,1),(95,95,0,0,1,1),(96,96,1,1,0,1),(97,97,0,1,1,0),(98,98,1,1,1,0),(99,99,0,0,1,0),(100,100,1,0,0,1);
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-17 16:05:17
