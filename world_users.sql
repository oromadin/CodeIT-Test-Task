-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: world
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `real_name` varchar(45) NOT NULL,
  `password` varchar(72) NOT NULL,
  `birth_date` varchar(45) NOT NULL,
  `country_code` varchar(45) NOT NULL,
  `ts` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (29,'a@mail.com','a@mail.com','a@mail.com','$2y$10$UhnL/h0yq9UOfgTeMPSANOLVwKhQZUnS77IKxOtCG94xakku2Ymuu','2017-03-15','ATF','1489435498'),(30,'b@mail.com','b@mail.com','b@mail.com','$2y$10$riWp8zEj2FzLg0YrpWwHLuIyjEZmMpOaMmNeLYXG.MdtPg4e.blty','2017-03-30','ATF','1489436529'),(31,'c@mail.com','c@mail.com','c@mail.com','$2y$10$2N7JH07AXUjOwbG62sc3PeeQbfP6xTELXCAOhFGdutLmKCIXhK6hi','2017-03-15','ASM','1489437038'),(36,'d@mail.com','d@mail.com','c@mail.com','$2y$10$1v9eXZlG.8b2pd7TwLummOmxPHjulBSlQ1JKyt03H15rEI6tM.aY6','2017-03-09','ABW','1489437543'),(37,'f@mail.com','f@mail.com','f@mail.com','$2y$10$9bRx.a5bIq8eZEG/0FCAtuvTU174DdG0OoH2U5Qz5sWVwcdJlXTX2','2017-03-30','ATG','1489437906'),(38,'w@mail.com','w@mail.com','w@mail.com','$2y$10$QZXOM7jUdAkrCfTTdZB7i.UaPZW4uqj7Z9JJPKuYj9DhwMUVemNLa','2017-03-23','ATA','1489438352');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-13 23:00:34
