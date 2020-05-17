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
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attachment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachment`
--

LOCK TABLES `attachment` WRITE;
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
INSERT INTO `attachment` VALUES (1,1,'http://placehold.it/100x200'),(2,2,'http://placehold.it/100x200'),(3,3,'http://placehold.it/100x200'),(4,4,'http://placehold.it/100x200'),(5,5,'http://placehold.it/100x200'),(6,6,'http://placehold.it/100x200'),(7,7,'http://placehold.it/100x200'),(8,8,'http://placehold.it/100x200'),(9,9,'http://placehold.it/100x200'),(10,10,'http://placehold.it/100x200'),(11,11,'http://placehold.it/100x200'),(12,12,'http://placehold.it/100x200'),(13,13,'http://placehold.it/100x200'),(14,14,'http://placehold.it/100x200'),(15,15,'http://placehold.it/100x200'),(16,16,'http://placehold.it/100x200'),(17,17,'http://placehold.it/100x200'),(18,18,'http://placehold.it/100x200'),(19,19,'http://placehold.it/100x200'),(20,20,'http://placehold.it/100x200'),(21,21,'http://placehold.it/100x200'),(22,22,'http://placehold.it/100x200'),(23,23,'http://placehold.it/100x200'),(24,24,'http://placehold.it/100x200'),(25,25,'http://placehold.it/100x200'),(26,26,'http://placehold.it/100x200'),(27,27,'http://placehold.it/100x200'),(28,28,'http://placehold.it/100x200'),(29,29,'http://placehold.it/100x200'),(30,30,'http://placehold.it/100x200'),(31,31,'http://placehold.it/100x200'),(32,32,'http://placehold.it/100x200'),(33,33,'http://placehold.it/100x200'),(34,34,'http://placehold.it/100x200'),(35,35,'http://placehold.it/100x200'),(36,36,'http://placehold.it/100x200'),(37,37,'http://placehold.it/100x200'),(38,38,'http://placehold.it/100x200'),(39,39,'http://placehold.it/100x200'),(40,40,'http://placehold.it/100x200'),(41,41,'http://placehold.it/100x200'),(42,42,'http://placehold.it/100x200'),(43,43,'http://placehold.it/100x200'),(44,44,'http://placehold.it/100x200'),(45,45,'http://placehold.it/100x200'),(46,46,'http://placehold.it/100x200'),(47,47,'http://placehold.it/100x200'),(48,48,'http://placehold.it/100x200'),(49,49,'http://placehold.it/100x200'),(50,50,'http://placehold.it/100x200'),(51,51,'http://placehold.it/100x200'),(52,52,'http://placehold.it/100x200'),(53,53,'http://placehold.it/100x200'),(54,54,'http://placehold.it/100x200'),(55,55,'http://placehold.it/100x200'),(56,56,'http://placehold.it/100x200'),(57,57,'http://placehold.it/100x200'),(58,58,'http://placehold.it/100x200'),(59,59,'http://placehold.it/100x200'),(60,60,'http://placehold.it/100x200'),(61,61,'http://placehold.it/100x200'),(62,62,'http://placehold.it/100x200'),(63,63,'http://placehold.it/100x200'),(64,64,'http://placehold.it/100x200'),(65,65,'http://placehold.it/100x200'),(66,66,'http://placehold.it/100x200'),(67,67,'http://placehold.it/100x200'),(68,68,'http://placehold.it/100x200'),(69,69,'http://placehold.it/100x200'),(70,70,'http://placehold.it/100x200'),(71,71,'http://placehold.it/100x200'),(72,72,'http://placehold.it/100x200'),(73,73,'http://placehold.it/100x200'),(74,74,'http://placehold.it/100x200'),(75,75,'http://placehold.it/100x200'),(76,76,'http://placehold.it/100x200'),(77,77,'http://placehold.it/100x200'),(78,78,'http://placehold.it/100x200'),(79,79,'http://placehold.it/100x200'),(80,80,'http://placehold.it/100x200'),(81,81,'http://placehold.it/100x200'),(82,82,'http://placehold.it/100x200'),(83,83,'http://placehold.it/100x200'),(84,84,'http://placehold.it/100x200'),(85,85,'http://placehold.it/100x200'),(86,86,'http://placehold.it/100x200'),(87,87,'http://placehold.it/100x200'),(88,88,'http://placehold.it/100x200'),(89,89,'http://placehold.it/100x200'),(90,90,'http://placehold.it/100x200'),(91,91,'http://placehold.it/100x200'),(92,92,'http://placehold.it/100x200'),(93,93,'http://placehold.it/100x200'),(94,94,'http://placehold.it/100x200'),(95,95,'http://placehold.it/100x200'),(96,96,'http://placehold.it/100x200'),(97,97,'http://placehold.it/100x200'),(98,98,'http://placehold.it/100x200'),(99,99,'http://placehold.it/100x200'),(100,100,'http://placehold.it/100x200');
/*!40000 ALTER TABLE `attachment` ENABLE KEYS */;
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
