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
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `task_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,'felis, adipiscing fringilla, porttitor vulputate,','2020-05-17 12:58:40',1,1),(2,'montes, nascetur ridiculus mus. Proin vel arcu eu','2020-05-17 12:58:40',2,2),(3,'erat vitae risus.','2020-05-17 12:58:40',3,3),(4,'non, feugiat nec, diam. Duis','2020-05-17 12:58:40',4,4),(5,'pellentesque eget, dictum placerat, augue. Sed molestie.','2020-05-17 12:58:40',5,5),(6,'volutpat.','2020-05-17 12:58:40',6,6),(7,'dapibus gravida. Aliquam tincidunt, nunc ac','2020-05-17 12:58:40',7,7),(8,'diam. Sed','2020-05-17 12:58:40',8,8),(9,'sit amet metus.','2020-05-17 12:58:40',9,9),(10,'ligula. Aenean gravida nunc sed','2020-05-17 12:58:40',10,10),(11,'Maecenas iaculis aliquet diam. Sed','2020-05-17 12:58:40',11,11),(12,'pede. Praesent eu dui. Cum sociis natoque penatibus','2020-05-17 12:58:40',12,12),(13,'morbi tristique senectus et','2020-05-17 12:58:40',13,13),(14,'orci luctus et ultrices posuere cubilia Curae;','2020-05-17 12:58:40',14,14),(15,'in lobortis tellus justo sit amet nulla. Donec non','2020-05-17 12:58:40',15,15),(16,'nibh. Quisque nonummy ipsum non arcu.','2020-05-17 12:58:40',16,16),(17,'Fusce aliquam, enim nec tempus scelerisque,','2020-05-17 12:58:40',17,17),(18,'Cras interdum. Nunc sollicitudin','2020-05-17 12:58:40',18,18),(19,'Morbi','2020-05-17 12:58:40',19,19),(20,'tellus, imperdiet non, vestibulum nec, euismod in,','2020-05-17 12:58:40',20,20),(21,'Sed neque. Sed','2020-05-17 12:58:40',21,21),(22,'tristique pharetra.','2020-05-17 12:58:40',22,22),(23,'sed orci lobortis augue scelerisque mollis. Phasellus libero mauris,','2020-05-17 12:58:40',23,23),(24,'convallis dolor. Quisque tincidunt pede','2020-05-17 12:58:40',24,24),(25,'diam at pretium aliquet, metus urna convallis erat, eget tincidunt','2020-05-17 12:58:40',25,25),(26,'dolor.','2020-05-17 12:58:40',26,26),(27,'tempor lorem, eget mollis lectus','2020-05-17 12:58:40',27,27),(28,'placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna','2020-05-17 12:58:40',28,28),(29,'orci, adipiscing non, luctus sit amet,','2020-05-17 12:58:40',29,29),(30,'pretium aliquet, metus urna convallis erat, eget tincidunt dui','2020-05-17 12:58:40',30,30),(31,'tincidunt','2020-05-17 12:58:40',31,31),(32,'semper auctor. Mauris vel turpis. Aliquam','2020-05-17 12:58:40',32,32),(33,'vulputate, posuere vulputate,','2020-05-17 12:58:40',33,33),(34,'ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris','2020-05-17 12:58:40',34,34),(35,'Proin ultrices. Duis volutpat nunc sit amet metus.','2020-05-17 12:58:40',35,35),(36,'et arcu imperdiet ullamcorper. Duis at lacus. Quisque','2020-05-17 12:58:40',36,36),(37,'natoque penatibus et magnis','2020-05-17 12:58:40',37,37),(38,'Aliquam auctor, velit eget laoreet posuere,','2020-05-17 12:58:40',38,38),(39,'erat','2020-05-17 12:58:40',39,39),(40,'vitae, sodales at, velit. Pellentesque','2020-05-17 12:58:40',40,40),(41,'sodales purus, in','2020-05-17 12:58:40',41,41),(42,'purus, in','2020-05-17 12:58:40',42,42),(43,'ut cursus luctus, ipsum leo elementum sem,','2020-05-17 12:58:40',43,43),(44,'semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies','2020-05-17 12:58:40',44,44),(45,'eget varius ultrices, mauris','2020-05-17 12:58:40',45,45),(46,'risus, at fringilla purus mauris a nunc. In at pede.','2020-05-17 12:58:40',46,46),(47,'Curae; Phasellus ornare. Fusce mollis.','2020-05-17 12:58:40',47,47),(48,'In mi pede, nonummy ut, molestie in, tempus eu, ligula.','2020-05-17 12:58:40',48,48),(49,'est,','2020-05-17 12:58:40',49,49),(50,'mauris sit amet lorem semper auctor.','2020-05-17 12:58:40',50,50),(51,'eget ipsum. Suspendisse sagittis. Nullam vitae diam.','2020-05-17 12:58:40',51,51),(52,'amet,','2020-05-17 12:58:40',52,52),(53,'lacinia at, iaculis quis,','2020-05-17 12:58:40',53,53),(54,'lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus','2020-05-17 12:58:40',54,54),(55,'non quam. Pellentesque habitant morbi tristique senectus et','2020-05-17 12:58:40',55,55),(56,'Integer vitae nibh. Donec est mauris,','2020-05-17 12:58:40',56,56),(57,'mi eleifend egestas. Sed','2020-05-17 12:58:40',57,57),(58,'Maecenas libero est, congue','2020-05-17 12:58:40',58,58),(59,'est. Nunc','2020-05-17 12:58:40',59,59),(60,'nisi. Cum sociis natoque penatibus et magnis dis parturient montes,','2020-05-17 12:58:40',60,60),(61,'nisl. Maecenas malesuada fringilla est. Mauris eu','2020-05-17 12:58:40',61,61),(62,'Donec tincidunt. Donec vitae erat','2020-05-17 12:58:40',62,62),(63,'neque venenatis lacus. Etiam bibendum fermentum metus. Aenean','2020-05-17 12:58:40',63,63),(64,'ullamcorper, nisl arcu iaculis','2020-05-17 12:58:40',64,64),(65,'elit,','2020-05-17 12:58:40',65,65),(66,'mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut,','2020-05-17 12:58:40',66,66),(67,'tincidunt, nunc ac mattis ornare, lectus ante dictum','2020-05-17 12:58:40',67,67),(68,'rutrum magna. Cras convallis','2020-05-17 12:58:40',68,68),(69,'non, bibendum sed, est.','2020-05-17 12:58:40',69,69),(70,'egestas.','2020-05-17 12:58:40',70,70),(71,'Sed congue, elit sed consequat','2020-05-17 12:58:40',71,71),(72,'fermentum arcu. Vestibulum ante ipsum primis in','2020-05-17 12:58:40',72,72),(73,'non, bibendum sed, est. Nunc laoreet lectus','2020-05-17 12:58:40',73,73),(74,'tristique','2020-05-17 12:58:40',74,74),(75,'Aliquam gravida mauris ut mi. Duis','2020-05-17 12:58:40',75,75),(76,'Nulla','2020-05-17 12:58:40',76,76),(77,'rutrum urna, nec luctus felis','2020-05-17 12:58:40',77,77),(78,'bibendum sed, est. Nunc laoreet lectus quis','2020-05-17 12:58:40',78,78),(79,'sapien. Nunc pulvinar arcu et pede.','2020-05-17 12:58:40',79,79),(80,'non magna.','2020-05-17 12:58:40',80,80),(81,'volutpat. Nulla dignissim. Maecenas','2020-05-17 12:58:40',81,81),(82,'facilisis.','2020-05-17 12:58:40',82,82),(83,'malesuada id, erat. Etiam vestibulum massa rutrum','2020-05-17 12:58:40',83,83),(84,'eros turpis non enim. Mauris','2020-05-17 12:58:40',84,84),(85,'ridiculus','2020-05-17 12:58:40',85,85),(86,'eu neque pellentesque massa lobortis ultrices. Vivamus','2020-05-17 12:58:40',86,86),(87,'dolor. Fusce feugiat. Lorem ipsum','2020-05-17 12:58:40',87,87),(88,'mauris sit amet','2020-05-17 12:58:40',88,88),(89,'tristique senectus','2020-05-17 12:58:40',89,89),(90,'suscipit, est ac facilisis','2020-05-17 12:58:40',90,90),(91,'Pellentesque habitant morbi tristique senectus','2020-05-17 12:58:40',91,91),(92,'ornare, facilisis eget, ipsum.','2020-05-17 12:58:40',92,92),(93,'orci lobortis augue scelerisque mollis. Phasellus','2020-05-17 12:58:40',93,93),(94,'elit elit fermentum risus, at','2020-05-17 12:58:40',94,94),(95,'tellus sem mollis dui, in sodales elit','2020-05-17 12:58:40',95,95),(96,'est. Nunc ullamcorper, velit','2020-05-17 12:58:40',96,96),(97,'amet massa. Quisque porttitor eros nec tellus. Nunc','2020-05-17 12:58:40',97,97),(98,'Nam consequat dolor vitae dolor.','2020-05-17 12:58:40',98,98),(99,'lacus. Mauris non dui nec','2020-05-17 12:58:40',99,99),(100,'ac metus vitae velit egestas lacinia. Sed','2020-05-17 12:58:40',100,100);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
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
