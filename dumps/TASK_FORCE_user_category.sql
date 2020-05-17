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
-- Table structure for table `user_category`
--

DROP TABLE IF EXISTS `user_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `user_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`),
  CONSTRAINT `user_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_category`
--

LOCK TABLES `user_category` WRITE;
/*!40000 ALTER TABLE `user_category` DISABLE KEYS */;
INSERT INTO `user_category` VALUES (1,1,7),(2,2,6),(3,3,1),(4,4,2),(5,5,8),(6,6,1),(7,7,6),(8,8,1),(9,9,4),(10,10,5),(11,11,1),(12,12,6),(13,13,8),(14,14,2),(15,15,1),(16,16,4),(17,17,8),(18,18,4),(19,19,7),(20,20,5),(21,21,7),(22,22,7),(23,23,1),(24,24,3),(25,25,3),(26,26,4),(27,27,5),(28,28,1),(29,29,8),(30,30,1),(31,31,4),(32,32,4),(33,33,7),(34,34,4),(35,35,7),(36,36,8),(37,37,4),(38,38,2),(39,39,3),(40,40,3),(41,41,7),(42,42,7),(43,43,5),(44,44,8),(45,45,4),(46,46,6),(47,47,1),(48,48,8),(49,49,8),(50,50,2),(51,51,2),(52,52,8),(53,53,1),(54,54,1),(55,55,7),(56,56,5),(57,57,7),(58,58,1),(59,59,7),(60,60,3),(61,61,6),(62,62,8),(63,63,8),(64,64,4),(65,65,8),(66,66,5),(67,67,7),(68,68,4),(69,69,8),(70,70,4),(71,71,5),(72,72,5),(73,73,8),(74,74,5),(75,75,6),(76,76,4),(77,77,4),(78,78,7),(79,79,3),(80,80,2),(81,81,3),(82,82,6),(83,83,4),(84,84,2),(85,85,1),(86,86,5),(87,87,2),(88,88,4),(89,89,2),(90,90,7),(91,91,4),(92,92,6),(93,93,3),(94,94,1),(95,95,4),(96,96,7),(97,97,6),(98,98,7),(99,99,3),(100,100,7);
/*!40000 ALTER TABLE `user_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-17 16:05:18
