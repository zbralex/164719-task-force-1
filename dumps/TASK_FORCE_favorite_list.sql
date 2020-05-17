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
-- Table structure for table `favorite_list`
--

DROP TABLE IF EXISTS `favorite_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorite_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_selected_id` int NOT NULL,
  `user_who_select_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_selected_id` (`user_selected_id`),
  KEY `user_who_select_id` (`user_who_select_id`),
  CONSTRAINT `favorite_list_ibfk_1` FOREIGN KEY (`user_selected_id`) REFERENCES `user` (`id`),
  CONSTRAINT `favorite_list_ibfk_2` FOREIGN KEY (`user_who_select_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite_list`
--

LOCK TABLES `favorite_list` WRITE;
/*!40000 ALTER TABLE `favorite_list` DISABLE KEYS */;
INSERT INTO `favorite_list` VALUES (1,73,96),(2,87,65),(3,14,7),(4,19,9),(5,66,78),(6,49,2),(7,63,23),(8,79,91),(9,66,97),(10,92,77),(11,58,65),(12,6,71),(13,87,69),(14,32,19),(15,97,56),(16,21,15),(17,42,54),(18,11,81),(19,39,97),(20,12,9),(21,70,18),(22,82,1),(23,7,96),(24,41,11),(25,48,49),(26,64,10),(27,9,4),(28,55,15),(29,60,5),(30,89,45),(31,46,68),(32,52,52),(33,99,4),(34,63,79),(35,55,53),(36,24,33),(37,13,27),(38,23,74),(39,52,93),(40,12,98),(41,93,16),(42,69,69),(43,56,37),(44,27,90),(45,42,81),(46,2,47),(47,74,2),(48,50,81),(49,44,48),(50,56,46),(51,61,6),(52,97,61),(53,20,24),(54,50,39),(55,15,37),(56,29,82),(57,28,68),(58,3,6),(59,81,74),(60,42,24),(61,13,63),(62,73,12),(63,62,87),(64,33,99),(65,88,67),(66,20,33),(67,27,33),(68,79,42),(69,40,69),(70,56,31),(71,58,26),(72,1,21),(73,72,89),(74,87,66),(75,39,30),(76,62,13),(77,41,92),(78,36,2),(79,8,68),(80,14,50),(81,39,100),(82,50,2),(83,100,55),(84,75,30),(85,80,11),(86,87,82),(87,39,5),(88,1,32),(89,34,58),(90,8,83),(91,19,36),(92,53,41),(93,1,80),(94,61,30),(95,5,48),(96,67,83),(97,70,61),(98,30,7),(99,77,44),(100,71,53);
/*!40000 ALTER TABLE `favorite_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-17 16:05:16
