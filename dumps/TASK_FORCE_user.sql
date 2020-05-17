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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'magnis@euodiotristique.net','786613737',1,'2020-05-17 12:53:38'),(2,'justo.nec.ante@Nunc.co.uk','442907960',2,'2020-05-17 12:53:38'),(3,'vitae@ornare.co.uk','050124353',3,'2020-05-17 12:53:38'),(4,'auctor.velit.Aliquam@lectus.co.uk','976086744',4,'2020-05-17 12:53:38'),(5,'mi.lacinia.mattis@bibendumDonecfelis.net','885185843',5,'2020-05-17 12:53:38'),(6,'elementum@miAliquam.edu','067119636',6,'2020-05-17 12:53:38'),(7,'Nulla@dictum.com','057576985',7,'2020-05-17 12:53:38'),(8,'gravida.mauris.ut@conubianostra.net','868015736',8,'2020-05-17 12:53:38'),(9,'fermentum.fermentum@egestas.co.uk','723460218',9,'2020-05-17 12:53:38'),(10,'malesuada.malesuada@amet.co.uk','007339484',10,'2020-05-17 12:53:38'),(11,'Quisque.porttitor@sit.co.uk','006730071',11,'2020-05-17 12:53:38'),(12,'elit@arcu.co.uk','963925276',12,'2020-05-17 12:53:38'),(13,'non.bibendum.sed@maurisrhoncusid.co.uk','197559248',13,'2020-05-17 12:53:38'),(14,'lectus.Cum.sociis@Loremipsum.edu','142882117',14,'2020-05-17 12:53:38'),(15,'Quisque@orciadipiscing.org','032452427',15,'2020-05-17 12:53:38'),(16,'vulputate@Curabiturconsequatlectus.edu','032782500',16,'2020-05-17 12:53:38'),(17,'quis.pede@nasceturridiculus.edu','386609655',17,'2020-05-17 12:53:38'),(18,'lobortis.ultrices@consequat.com','321856999',18,'2020-05-17 12:53:38'),(19,'Nulla.tempor@ridiculusmusDonec.net','205082373',19,'2020-05-17 12:53:38'),(20,'tortor.Nunc@dictumPhasellusin.co.uk','881868392',20,'2020-05-17 12:53:38'),(21,'sit.amet.consectetuer@et.co.uk','134403492',21,'2020-05-17 12:53:38'),(22,'erat.nonummy.ultricies@ametrisus.org','110013190',22,'2020-05-17 12:53:38'),(23,'In.nec.orci@sapien.com','166816199',23,'2020-05-17 12:53:38'),(24,'accumsan.neque@Sedpharetrafelis.co.uk','669238446',24,'2020-05-17 12:53:38'),(25,'nascetur.ridiculus@acmetus.net','337205900',25,'2020-05-17 12:53:38'),(26,'ultricies.dignissim@urnaNunc.com','498646959',26,'2020-05-17 12:53:38'),(27,'magna@massa.com','525483178',27,'2020-05-17 12:53:38'),(28,'ut@Pellentesque.com','697638054',28,'2020-05-17 12:53:38'),(29,'Quisque.ornare@pedenec.net','481234334',29,'2020-05-17 12:53:38'),(30,'facilisis@erosnectellus.com','883545253',30,'2020-05-17 12:53:38'),(31,'diam@Fuscefermentumfermentum.org','314364019',31,'2020-05-17 12:53:38'),(32,'ullamcorper.velit@lectus.com','763348224',32,'2020-05-17 12:53:38'),(33,'egestas.ligula.Nullam@egetvenenatisa.ca','841825458',33,'2020-05-17 12:53:38'),(34,'amet.ante.Vivamus@lobortismaurisSuspendisse.ca','738694819',34,'2020-05-17 12:53:38'),(35,'lacus.vestibulum.lorem@ullamcorperDuis.ca','507279065',35,'2020-05-17 12:53:38'),(36,'turpis.Nulla@Crassed.co.uk','260215934',36,'2020-05-17 12:53:38'),(37,'elit@Aeneanmassa.co.uk','588117416',37,'2020-05-17 12:53:38'),(38,'fermentum.convallis.ligula@Aeneaneget.ca','587206061',38,'2020-05-17 12:53:38'),(39,'risus.Quisque@ornarelectusjusto.com','071689251',39,'2020-05-17 12:53:38'),(40,'ut.molestie.in@nequeSed.edu','492053848',40,'2020-05-17 12:53:38'),(41,'porttitor.scelerisque@acmattis.org','965487556',41,'2020-05-17 12:53:38'),(42,'egestas@tempor.org','809991888',42,'2020-05-17 12:53:38'),(43,'vel.arcu@purusin.org','224663393',43,'2020-05-17 12:53:38'),(44,'eu.turpis@egestas.ca','285592275',44,'2020-05-17 12:53:38'),(45,'velit.Sed@lobortisnisinibh.org','745075424',45,'2020-05-17 12:53:38'),(46,'mi.tempor.lorem@urnaVivamus.co.uk','046460424',46,'2020-05-17 12:53:38'),(47,'Sed.molestie@purussapien.net','772014585',47,'2020-05-17 12:53:38'),(48,'neque.In.ornare@veliteusem.net','296946981',48,'2020-05-17 12:53:38'),(49,'egestas.hendrerit.neque@nisi.edu','794481374',49,'2020-05-17 12:53:38'),(50,'risus@Aliquameratvolutpat.org','897870184',50,'2020-05-17 12:53:38'),(51,'sed.turpis.nec@nec.net','393913538',51,'2020-05-17 12:53:38'),(52,'dictum.augue.malesuada@malesuadafamesac.edu','882751522',52,'2020-05-17 12:53:38'),(53,'at@pedeultricesa.com','222852253',53,'2020-05-17 12:53:38'),(54,'Vivamus@nisl.com','072601974',54,'2020-05-17 12:53:38'),(55,'sociosqu.ad.litora@musProinvel.com','220042949',55,'2020-05-17 12:53:38'),(56,'imperdiet@varius.net','393903539',56,'2020-05-17 12:53:38'),(57,'nonummy@leo.co.uk','716648688',57,'2020-05-17 12:53:38'),(58,'Vivamus@utipsumac.net','245875562',58,'2020-05-17 12:53:38'),(59,'felis.ullamcorper@liberolacusvarius.org','184440188',59,'2020-05-17 12:53:38'),(60,'nonummy.Fusce.fermentum@eratvolutpat.org','897893749',60,'2020-05-17 12:53:38'),(61,'egestas.Fusce.aliquet@sagittisNullam.ca','159561844',61,'2020-05-17 12:53:38'),(62,'diam@odiotristiquepharetra.ca','010887172',62,'2020-05-17 12:53:38'),(63,'netus.et.malesuada@massaIntegervitae.ca','174924860',63,'2020-05-17 12:53:38'),(64,'nunc@Sed.net','540653540',64,'2020-05-17 12:53:38'),(65,'Aenean@vitaesodalesnisi.ca','329644124',65,'2020-05-17 12:53:38'),(66,'nec.tempus.scelerisque@etmalesuadafames.ca','029325792',66,'2020-05-17 12:53:38'),(67,'gravida.molestie.arcu@eratEtiamvestibulum.com','098047905',67,'2020-05-17 12:53:38'),(68,'mattis.semper@nascetur.edu','889313011',68,'2020-05-17 12:53:38'),(69,'Quisque.fringilla.euismod@Mauris.org','172514580',69,'2020-05-17 12:53:38'),(70,'ut.lacus@ante.edu','223961517',70,'2020-05-17 12:53:38'),(71,'accumsan.convallis.ante@Maurisvel.ca','726641178',71,'2020-05-17 12:53:38'),(72,'nunc@Integereu.net','949578470',72,'2020-05-17 12:53:38'),(73,'nonummy.ultricies@Fuscealiquet.edu','371702150',73,'2020-05-17 12:53:38'),(74,'purus.ac@pedeultrices.co.uk','678096652',74,'2020-05-17 12:53:38'),(75,'pede.sagittis.augue@Cumsociis.com','204325112',75,'2020-05-17 12:53:38'),(76,'blandit@interdumfeugiat.net','650028673',76,'2020-05-17 12:53:38'),(77,'dui.Suspendisse.ac@pedeblandit.ca','493939037',77,'2020-05-17 12:53:38'),(78,'vitae@famesac.co.uk','950864298',78,'2020-05-17 12:53:38'),(79,'blandit.at@fermentum.org','368343257',79,'2020-05-17 12:53:38'),(80,'nec.leo.Morbi@necmalesuadaut.ca','359523222',80,'2020-05-17 12:53:38'),(81,'ipsum@nislelementumpurus.co.uk','531227221',81,'2020-05-17 12:53:38'),(82,'tempus.mauris.erat@imperdiet.net','218143477',82,'2020-05-17 12:53:38'),(83,'vitae.aliquet@Phaselluselit.ca','531749596',83,'2020-05-17 12:53:38'),(84,'tempor.est.ac@lectusconvallis.edu','528995814',84,'2020-05-17 12:53:38'),(85,'dui@cursusdiamat.org','681940623',85,'2020-05-17 12:53:38'),(86,'ridiculus.mus.Proin@eros.net','637315300',86,'2020-05-17 12:53:38'),(87,'neque@ultricesaauctor.net','983844754',87,'2020-05-17 12:53:38'),(88,'imperdiet@fermentum.edu','396743478',88,'2020-05-17 12:53:38'),(89,'magna.malesuada@orciinconsequat.co.uk','309137503',89,'2020-05-17 12:53:38'),(90,'ut.erat@sit.edu','275283182',90,'2020-05-17 12:53:38'),(91,'egestas.lacinia@justo.com','444579965',91,'2020-05-17 12:53:38'),(92,'dolor@in.org','969180439',92,'2020-05-17 12:53:38'),(93,'sem.semper@Praesenteudui.co.uk','794680892',93,'2020-05-17 12:53:38'),(94,'dui@pedenecante.co.uk','772569034',94,'2020-05-17 12:53:38'),(95,'facilisis.facilisis.magna@Proinvel.ca','742263874',95,'2020-05-17 12:53:38'),(96,'non@auctorvelit.ca','508980638',96,'2020-05-17 12:53:38'),(97,'primis.in@ultricesVivamus.co.uk','024527848',97,'2020-05-17 12:53:38'),(98,'turpis@Crasloremlorem.co.uk','536550577',98,'2020-05-17 12:53:38'),(99,'Suspendisse.aliquet.sem@odioNam.org','704033042',99,'2020-05-17 12:53:38'),(100,'nibh.dolor@eu.com','879465953',100,'2020-05-17 12:53:38');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-17 16:05:19
