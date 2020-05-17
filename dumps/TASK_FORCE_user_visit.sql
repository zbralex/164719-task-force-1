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
-- Table structure for table `user_visit`
--

DROP TABLE IF EXISTS `user_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_visit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_visitor_id` int NOT NULL,
  `user_guest_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_visitor_id` (`user_visitor_id`),
  KEY `user_guest_id` (`user_guest_id`),
  CONSTRAINT `user_visit_ibfk_1` FOREIGN KEY (`user_visitor_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_visit_ibfk_2` FOREIGN KEY (`user_guest_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_visit`
--

LOCK TABLES `user_visit` WRITE;
/*!40000 ALTER TABLE `user_visit` DISABLE KEYS */;
INSERT INTO `user_visit` VALUES (1,19,38),(2,21,94),(3,98,65),(4,73,10),(5,35,57),(6,46,40),(7,98,39),(8,28,26),(9,52,97),(10,1,44),(11,5,36),(12,56,36),(13,79,48),(14,58,52),(15,43,72),(16,95,80),(17,75,16),(18,83,88),(19,19,32),(20,36,7),(21,65,44),(22,87,28),(23,4,26),(24,30,87),(25,21,47),(26,83,62),(27,23,61),(28,41,63),(29,47,35),(30,17,20),(31,91,36),(32,100,78),(33,81,99),(34,82,77),(35,1,29),(36,16,20),(37,34,58),(38,71,66),(39,54,61),(40,26,68),(41,15,39),(42,80,98),(43,29,36),(44,34,75),(45,19,28),(46,89,95),(47,9,7),(48,80,72),(49,85,57),(50,75,60),(51,32,96),(52,34,82),(53,95,53),(54,50,39),(55,19,39),(56,17,34),(57,44,93),(58,62,8),(59,56,93),(60,39,46),(61,80,53),(62,69,66),(63,87,3),(64,17,5),(65,93,71),(66,62,15),(67,99,60),(68,70,6),(69,91,41),(70,62,94),(71,22,41),(72,38,28),(73,29,14),(74,36,33),(75,80,67),(76,1,13),(77,24,88),(78,89,98),(79,98,92),(80,98,54),(81,88,51),(82,100,38),(83,94,26),(84,86,84),(85,45,9),(86,31,27),(87,36,80),(88,14,83),(89,8,75),(90,62,24),(91,87,59),(92,30,51),(93,45,10),(94,27,20),(95,4,61),(96,32,65),(97,12,48),(98,9,14),(99,61,100),(100,97,23);
/*!40000 ALTER TABLE `user_visit` ENABLE KEYS */;
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
