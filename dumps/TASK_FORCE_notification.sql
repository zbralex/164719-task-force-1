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
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_view` tinyint(1) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(255) NOT NULL,
  `task_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,1,'consequat, lectus sit',1,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',1),(2,2,'risus. Duis a',0,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',2),(3,3,'Quisque libero lacus,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',3),(4,4,'et, lacinia vitae,',0,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',4),(5,5,'Suspendisse aliquet, sem',0,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',5),(6,6,'enim. Suspendisse aliquet,',0,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',6),(7,7,'Ut nec urna',0,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',7),(8,8,'pede blandit congue.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',8),(9,9,'torquent per conubia',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',9),(10,10,'augue, eu tempor',1,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',10),(11,11,'convallis ligula. Donec',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',11),(12,12,'lacus. Ut nec',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',12),(13,13,'fringilla cursus purus.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',13),(14,14,'non sapien molestie',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',14),(15,15,'fringilla purus mauris',1,'http://placehold.it/200x200','2020-05-17 12:58:30','green',15),(16,16,'egestas nunc sed',0,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',16),(17,17,'volutpat nunc sit',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',17),(18,18,'consectetuer ipsum nunc',0,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',18),(19,19,'in, cursus et,',0,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',19),(20,20,'et netus et',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',20),(21,21,'luctus ut, pellentesque',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',21),(22,22,'elit, dictum eu,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',22),(23,23,'Nullam vitae diam.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','green',23),(24,24,'enim. Mauris quis',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',24),(25,25,'vitae odio sagittis',1,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',25),(26,26,'quis diam. Pellentesque',0,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',26),(27,27,'Aliquam erat volutpat.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',27),(28,28,'massa. Integer vitae',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',28),(29,29,'magnis dis parturient',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',29),(30,30,'rutrum urna, nec',0,'http://placehold.it/200x200','2020-05-17 12:58:30','green',30),(31,31,'tempus, lorem fringilla',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',31),(32,32,'non, sollicitudin a,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',32),(33,33,'est. Nunc ullamcorper,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','green',33),(34,34,'lacus pede sagittis',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',34),(35,35,'cursus purus. Nullam',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',35),(36,36,'tellus. Phasellus elit',0,'http://placehold.it/200x200','2020-05-17 12:58:30','green',36),(37,37,'diam. Pellentesque habitant',1,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',37),(38,38,'facilisis facilisis, magna',1,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',38),(39,39,'dui quis accumsan',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',39),(40,40,'Curabitur consequat, lectus',0,'http://placehold.it/200x200','2020-05-17 12:58:30','green',40),(41,41,'cursus et, magna.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',41),(42,42,'egestas. Aliquam nec',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',42),(43,43,'Suspendisse sagittis. Nullam',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',43),(44,44,'dapibus quam quis',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',44),(45,45,'sed leo. Cras',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',45),(46,46,'Donec sollicitudin adipiscing',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',46),(47,47,'tincidunt aliquam arcu.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',47),(48,48,'justo. Praesent luctus.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',48),(49,49,'Curabitur dictum. Phasellus',0,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',49),(50,50,'Nam tempor diam',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',50),(51,51,'Cum sociis natoque',1,'http://placehold.it/200x200','2020-05-17 12:58:30','green',51),(52,52,'tempor erat neque',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',52),(53,53,'dolor egestas rhoncus.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',53),(54,54,'Sed diam lorem,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',54),(55,55,'eleifend. Cras sed',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',55),(56,56,'ante, iaculis nec,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','red',56),(57,57,'sit amet ornare',1,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',57),(58,58,'et pede. Nunc',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',58),(59,59,'erat volutpat. Nulla',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',59),(60,60,'Duis cursus, diam',1,'http://placehold.it/200x200','2020-05-17 12:58:30','red',60),(61,61,'Aliquam auctor, velit',1,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',61),(62,62,'erat, in consectetuer',1,'http://placehold.it/200x200','2020-05-17 12:58:30','red',62),(63,63,'nec metus facilisis',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',63),(64,64,'tellus. Phasellus elit',0,'http://placehold.it/200x200','2020-05-17 12:58:30','green',64),(65,65,'egestas. Sed pharetra,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','green',65),(66,66,'eu metus. In',0,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',66),(67,67,'non, vestibulum nec,',0,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',67),(68,68,'sem magna nec',0,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',68),(69,69,'ullamcorper. Duis at',1,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',69),(70,70,'a ultricies adipiscing,',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',70),(71,71,'mi felis, adipiscing',0,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',71),(72,72,'orci sem eget',0,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',72),(73,73,'nisi sem semper',0,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',73),(74,74,'Duis ac arcu.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',74),(75,75,'malesuada id, erat.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',75),(76,76,'tempor, est ac',0,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',76),(77,77,'rutrum urna, nec',1,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',77),(78,78,'lacinia vitae, sodales',0,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',78),(79,79,'Praesent eu dui.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',79),(80,80,'nulla. In tincidunt',1,'http://placehold.it/200x200','2020-05-17 12:58:30','red',80),(81,81,'velit. Quisque varius.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',81),(82,82,'ac libero nec',0,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',82),(83,83,'vel, vulputate eu,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','red',83),(84,84,'Curabitur massa. Vestibulum',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',84),(85,85,'diam dictum sapien.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',85),(86,86,'at sem molestie',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',86),(87,87,'nec tellus. Nunc',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',87),(88,88,'nulla. Integer urna.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','red',88),(89,89,'non, dapibus rutrum,',1,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',89),(90,90,'mi felis, adipiscing',1,'http://placehold.it/200x200','2020-05-17 12:58:30','orange',90),(91,91,'Donec sollicitudin adipiscing',0,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',91),(92,92,'sem eget massa.',1,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',92),(93,93,'vitae diam. Proin',1,'http://placehold.it/200x200','2020-05-17 12:58:30','yellow',93),(94,94,'elit. Aliquam auctor,',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',94),(95,95,'a odio semper',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',95),(96,96,'eros non enim',0,'http://placehold.it/200x200','2020-05-17 12:58:30','indigo',96),(97,97,'augue. Sed molestie.',0,'http://placehold.it/200x200','2020-05-17 12:58:30','violet',97),(98,98,'malesuada vel, venenatis',0,'http://placehold.it/200x200','2020-05-17 12:58:30','red',98),(99,99,'ligula tortor, dictum',0,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',99),(100,100,'lobortis mauris. Suspendisse',1,'http://placehold.it/200x200','2020-05-17 12:58:30','blue',100);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
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
