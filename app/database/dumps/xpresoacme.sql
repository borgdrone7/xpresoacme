-- MySQL dump 10.13  Distrib 5.6.19, for Win64 (x86_64)
--
-- Host: localhost    Database: xpresoacme
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned DEFAULT '0',
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `question_id_value` (`question_id`,`value`),
  CONSTRAINT `FK_metas_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
INSERT INTO `metas` VALUES (16,1,'No'),(17,1,'Yes'),(5,4,'In a relationship'),(4,4,'Married'),(3,4,'Single'),(13,5,'Female'),(12,5,'Male'),(6,5,'Prefer not to disclose'),(14,6,'Bosnian'),(8,6,'British'),(10,6,'French'),(7,6,'Irish'),(11,6,'Other'),(9,6,'Spanish'),(82,8,'Blue'),(83,8,'Green'),(84,8,'Red'),(85,8,'Yellow'),(89,24,'Completely'),(90,24,'Maybe'),(91,24,'Not sure'),(92,24,'Of course');
/*!40000 ALTER TABLE `metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questiontype_id` int(10) unsigned DEFAULT '0',
  `question` varchar(5000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `required` int(10) unsigned NOT NULL DEFAULT '0',
  `locked` int(10) unsigned DEFAULT '0' COMMENT 'Is it locked for editing?',
  PRIMARY KEY (`id`),
  KEY `FK_questions_questiontypes` (`questiontype_id`),
  CONSTRAINT `FK_questions_questiontypes` FOREIGN KEY (`questiontype_id`) REFERENCES `questiontypes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,5,'Do you smoke?',1,0),(2,3,'What is your name?',1,0),(3,1,'When were you born?',1,0),(4,4,'Martial status?',1,0),(5,5,'Gender?',0,0),(6,4,'Nationality?',0,0),(7,2,'How many years of experience you have?',0,0),(8,5,'What color do you like the most?',1,0),(24,4,'Are you really sure?',1,0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questiontypes`
--

DROP TABLE IF EXISTS `questiontypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questiontypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questiontypes`
--

LOCK TABLES `questiontypes` WRITE;
/*!40000 ALTER TABLE `questiontypes` DISABLE KEYS */;
INSERT INTO `questiontypes` VALUES (1,'Date'),(4,'Drop down'),(2,'Number'),(5,'Radio'),(3,'Text');
/*!40000 ALTER TABLE `questiontypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useranswers`
--

DROP TABLE IF EXISTS `useranswers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useranswers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned NOT NULL DEFAULT '0',
  `meta_id` int(10) unsigned DEFAULT NULL,
  `num` float unsigned DEFAULT NULL,
  `text` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filledformid_questionid` (`user_id`,`question_id`),
  KEY `FK_filledformslines_answerstructmetas` (`meta_id`),
  KEY `FK_filledformslines_questions` (`question_id`),
  CONSTRAINT `FK_useranswers_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  CONSTRAINT `FK_useranswers_metas` FOREIGN KEY (`meta_id`) REFERENCES `metas` (`id`),
  CONSTRAINT `FK_useranswers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=359 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useranswers`
--

LOCK TABLES `useranswers` WRITE;
/*!40000 ALTER TABLE `useranswers` DISABLE KEYS */;
INSERT INTO `useranswers` VALUES (1,1,1,16,NULL,NULL,NULL),(2,1,2,NULL,NULL,'Amir Cicak',NULL),(3,1,3,NULL,NULL,NULL,'1977-07-26'),(4,1,4,4,NULL,NULL,NULL),(5,1,5,12,NULL,NULL,NULL),(6,1,6,14,NULL,NULL,NULL),(7,1,7,NULL,18,NULL,NULL),(11,1,8,82,NULL,NULL,NULL),(12,6,3,NULL,NULL,NULL,'1975-01-28'),(13,6,7,NULL,3,NULL,NULL),(14,6,2,NULL,NULL,'John Doe',NULL),(15,6,4,5,NULL,NULL,NULL),(16,6,6,10,NULL,NULL,NULL),(17,6,1,17,NULL,NULL,NULL),(18,6,5,12,NULL,NULL,NULL),(19,6,8,82,NULL,NULL,NULL),(30,7,3,NULL,NULL,NULL,'1980-10-30'),(31,7,7,NULL,5,NULL,NULL),(32,7,2,NULL,NULL,'Terence Buttrey',NULL),(33,7,4,3,NULL,NULL,NULL),(34,7,6,9,NULL,NULL,NULL),(35,7,1,16,NULL,NULL,NULL),(36,7,5,12,NULL,NULL,NULL),(37,7,8,83,NULL,NULL,NULL),(45,8,3,NULL,NULL,NULL,'1985-02-06'),(46,8,7,NULL,3,NULL,NULL),(47,8,2,NULL,NULL,'Ranae Hosley',NULL),(48,8,4,4,NULL,NULL,NULL),(49,8,6,10,NULL,NULL,NULL),(50,8,1,17,NULL,NULL,NULL),(51,8,5,6,NULL,NULL,NULL),(52,8,8,85,NULL,NULL,NULL),(60,9,3,NULL,NULL,NULL,'1980-12-08'),(61,9,7,NULL,7,NULL,NULL),(62,9,2,NULL,NULL,'Jonell Dolin',NULL),(63,9,4,4,NULL,NULL,NULL),(64,9,6,8,NULL,NULL,NULL),(65,9,1,16,NULL,NULL,NULL),(66,9,5,12,NULL,NULL,NULL),(67,9,8,83,NULL,NULL,NULL),(75,11,3,NULL,NULL,NULL,'1988-07-05'),(76,11,7,NULL,2,NULL,NULL),(77,11,2,NULL,NULL,'Kasey Athey  ',NULL),(78,11,4,3,NULL,NULL,NULL),(79,11,6,11,NULL,NULL,NULL),(80,11,1,16,NULL,NULL,NULL),(81,11,5,13,NULL,NULL,NULL),(82,11,8,84,NULL,NULL,NULL),(90,12,3,NULL,NULL,NULL,'1979-08-16'),(91,12,7,NULL,5,NULL,NULL),(92,12,2,NULL,NULL,'Forrest Lindsey  ',NULL),(93,12,4,5,NULL,NULL,NULL),(94,12,6,7,NULL,NULL,NULL),(95,12,1,17,NULL,NULL,NULL),(96,12,5,12,NULL,NULL,NULL),(97,12,8,82,NULL,NULL,NULL),(105,13,3,NULL,NULL,NULL,'1994-10-29'),(106,13,7,NULL,2,NULL,NULL),(107,13,2,NULL,NULL,'Josephine Meese  ',NULL),(108,13,4,3,NULL,NULL,NULL),(109,13,6,14,NULL,NULL,NULL),(110,13,1,16,NULL,NULL,NULL),(111,13,5,12,NULL,NULL,NULL),(112,13,8,82,NULL,NULL,NULL),(120,14,3,NULL,NULL,NULL,'1970-09-24'),(121,14,7,NULL,8,NULL,NULL),(122,14,2,NULL,NULL,'Marilynn Shemwell  ',NULL),(123,14,4,4,NULL,NULL,NULL),(124,14,6,14,NULL,NULL,NULL),(125,14,1,17,NULL,NULL,NULL),(126,14,5,13,NULL,NULL,NULL),(127,14,8,85,NULL,NULL,NULL),(135,15,3,NULL,NULL,NULL,'1981-02-15'),(136,15,7,NULL,5,NULL,NULL),(137,15,2,NULL,NULL,'Daria Yamada  ',NULL),(138,15,4,4,NULL,NULL,NULL),(139,15,6,14,NULL,NULL,NULL),(140,15,1,16,NULL,NULL,NULL),(141,15,5,13,NULL,NULL,NULL),(142,15,8,84,NULL,NULL,NULL),(150,16,3,NULL,NULL,NULL,'1977-01-07'),(151,16,7,NULL,4,NULL,NULL),(152,16,2,NULL,NULL,'Flora Mullis ',NULL),(153,16,4,3,NULL,NULL,NULL),(154,16,6,9,NULL,NULL,NULL),(155,16,1,17,NULL,NULL,NULL),(156,16,5,13,NULL,NULL,NULL),(157,16,8,85,NULL,NULL,NULL),(165,17,3,NULL,NULL,NULL,'1991-04-26'),(166,17,7,NULL,2,NULL,NULL),(167,17,2,NULL,NULL,'Marina Herzig  ',NULL),(168,17,4,3,NULL,NULL,NULL),(169,17,6,11,NULL,NULL,NULL),(170,17,1,16,NULL,NULL,NULL),(171,17,5,13,NULL,NULL,NULL),(172,17,8,85,NULL,NULL,NULL),(180,18,3,NULL,NULL,NULL,'1964-01-30'),(181,18,7,NULL,15,NULL,NULL),(182,18,2,NULL,NULL,'Paul Flom  ',NULL),(183,18,4,4,NULL,NULL,NULL),(184,18,6,10,NULL,NULL,NULL),(185,18,1,16,NULL,NULL,NULL),(186,18,5,6,NULL,NULL,NULL),(187,18,8,83,NULL,NULL,NULL),(195,19,3,NULL,NULL,NULL,'1989-05-17'),(196,19,7,NULL,4,NULL,NULL),(197,19,2,NULL,NULL,'Marleen Vandyke ',NULL),(198,19,4,5,NULL,NULL,NULL),(199,19,6,8,NULL,NULL,NULL),(200,19,1,17,NULL,NULL,NULL),(201,19,5,12,NULL,NULL,NULL),(202,19,8,84,NULL,NULL,NULL),(210,21,3,NULL,NULL,NULL,'1974-03-03'),(211,21,7,NULL,11,NULL,NULL),(212,21,2,NULL,NULL,'Mai Mazzei  ',NULL),(213,21,4,3,NULL,NULL,NULL),(214,21,6,11,NULL,NULL,NULL),(215,21,1,17,NULL,NULL,NULL),(216,21,5,13,NULL,NULL,NULL),(217,21,8,82,NULL,NULL,NULL),(225,22,3,NULL,NULL,NULL,'1986-09-03'),(226,22,7,NULL,7,NULL,NULL),(227,22,2,NULL,NULL,'Mitchell Mancino  ',NULL),(228,22,4,3,NULL,NULL,NULL),(229,22,6,7,NULL,NULL,NULL),(230,22,1,16,NULL,NULL,NULL),(231,22,5,6,NULL,NULL,NULL),(232,22,8,83,NULL,NULL,NULL),(240,23,3,NULL,NULL,NULL,'1970-01-01'),(241,23,7,NULL,9,NULL,NULL),(242,23,2,NULL,NULL,'Valda Rosario  ',NULL),(243,23,4,3,NULL,NULL,NULL),(244,23,6,10,NULL,NULL,NULL),(245,23,1,17,NULL,NULL,NULL),(246,23,5,6,NULL,NULL,NULL),(247,23,8,85,NULL,NULL,NULL),(255,24,3,NULL,NULL,NULL,'1988-07-28'),(256,24,7,NULL,6,NULL,NULL),(257,24,2,NULL,NULL,'Charise Tuff  ',NULL),(258,24,4,5,NULL,NULL,NULL),(259,24,6,10,NULL,NULL,NULL),(260,24,1,16,NULL,NULL,NULL),(261,24,5,12,NULL,NULL,NULL),(262,24,8,83,NULL,NULL,NULL),(270,25,3,NULL,NULL,NULL,'1993-10-09'),(271,25,7,NULL,2,NULL,NULL),(272,25,2,NULL,NULL,'Ruthanne Putt  ',NULL),(273,25,4,3,NULL,NULL,NULL),(274,25,6,14,NULL,NULL,NULL),(275,25,1,17,NULL,NULL,NULL),(276,25,5,12,NULL,NULL,NULL),(277,25,8,82,NULL,NULL,NULL),(285,26,3,NULL,NULL,NULL,'1963-09-05'),(286,26,7,NULL,15,NULL,NULL),(287,26,2,NULL,NULL,'Fannie Newquist  ',NULL),(288,26,4,4,NULL,NULL,NULL),(289,26,6,7,NULL,NULL,NULL),(290,26,1,17,NULL,NULL,NULL),(291,26,5,13,NULL,NULL,NULL),(292,26,8,84,NULL,NULL,NULL),(300,27,3,NULL,NULL,NULL,'1986-06-17'),(301,27,7,NULL,5,NULL,NULL),(302,27,2,NULL,NULL,'Kareen Crimi  ',NULL),(303,27,4,3,NULL,NULL,NULL),(304,27,6,11,NULL,NULL,NULL),(305,27,1,17,NULL,NULL,NULL),(306,27,5,6,NULL,NULL,NULL),(307,27,8,85,NULL,NULL,NULL),(315,28,3,NULL,NULL,NULL,'1982-03-18'),(316,28,7,NULL,6,NULL,NULL),(317,28,2,NULL,NULL,'Mattie Quezada  ',NULL),(318,28,4,5,NULL,NULL,NULL),(319,28,6,10,NULL,NULL,NULL),(320,28,1,16,NULL,NULL,NULL),(321,28,5,13,NULL,NULL,NULL),(322,28,8,84,NULL,NULL,NULL),(355,1,24,90,NULL,NULL,NULL);
/*!40000 ALTER TABLE `useranswers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(200) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Amir Cicak','borg','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','qDNggMj3UdfQmKj0UDuap6ZCdQETmfHPQtubqm80kpfSipj2rvFL8b0jDlDm'),(6,'John Doe','john','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','EZda9Z9Xe7vHIIOZLlUYpsbz9deWpqR3X9Hyi8DEeRy8jKM5oH9xcj2MvOPa'),(7,'Terence Buttrey ','terence','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','KrrN8MfIjYPfSTwKxQcEGMJd7UB87bVHJmfTRJWnhgwBIv5lWByf8unUatbx'),(8,'Ranae Hosley','ranae','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','GY6FRKBZlOGoQY2dwyIiZCIA8HqPQEj2SCUVBXxNze2GKQlhHq9wYFtkUJFO'),(9,'Jonell Dolin','jonell','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','qS40kDOqOaiAUmVwGOOlp3WM14UtoAMwzjgD87V7eDqTBLUhgfNE6FnnU7IB'),(11,'Kasey Athey  ','kasey','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','lRN0s1EolTCmXOq9cGSzGxJ0jWKZMmHy6hJurfiZcC1M3FDWNA9CemGmiQNw'),(12,'Forrest Lindsey  ','forrest','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','IAecdOI3ghQ3XtyArk9JExXOAnYiiz5rkAKvBfCpeN0JkUtS13QyctgLC5ce'),(13,'Josephine Meese  ','josephine','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','kmdyxo0tznI7xWC0jDst6sqbnQ8LU6PuUcm1OZvYqEABj83zvGx2FBB9gKhx'),(14,'Marilynn Shemwell  ','marilynn','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','B4bSCZvBcsdChOmviMbnfVtWM69ftJ0uvkCjYUmjuQONmf0EHQUJHw31RmxF'),(15,'Daria Yamada  ','daria','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','pDjHgUp4RgYmmwxTJ8sfnvelWjvpwAsGSUfsSUqnRyjhBAQRYfjdzCaznZHr'),(16,'Flora Mullis ','flora','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','9teY8SeQS5ZTj5Ptd0kW10uoCzPxMx7c0oBpE5ho8edzHIoJVqmhCrBfgDzY'),(17,'Marina Herzig  ','marina','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','2cB7bihkzeQYExEXAKKavCvHmcBLNrkEKeXYFIpSd0fhb7GiBkenVPIUr5h6'),(18,'Paul Flom  ','paul','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','apvWwnKTcHiAqc8XWXLkz7SH6pu8l9cqUbXUit2zq07LKhENTWNsML3I8n3S'),(19,'Marleen Vandyke ','marleen','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','Ij8TT1BqefOG5DIIFYhRkffbzYjQjLCkUaUnuIKqas73ZKulaXcl3j7hvASM'),(21,'Mai Mazzei  ','mai','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','kxeAeRvdWWbpiQgQQ0cqbYRO2nO6fXO3vTTFiVs4dIh64HF9TsWKJSSP152c'),(22,'Mitchell Mancino  ','mitchell','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','8wLk4GUgPxfea1Hj2I3zMhLEtKM3RGLxSzjnCKUPIebwcyYWi8zlNoyU0W0F'),(23,'Valda Rosario  ','valda','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','SVI6REHL82j2kkKAdxDrC7iKFWJDnK5OvelmqhS4fort3FdxX7Xq6sFPizJP'),(24,'Charise Tuff  ','charise','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','2bPwYR0FDH86OvpzwdbSbe0WqXUDQvT5p0Qs0tSZQfvYjvTdVsqCUVxZlRcC'),(25,'Ruthanne Putt  ','ruthanne','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','l5GjYzraXUVVLRs9CEbocPLOTqQxwxJVptEIp58l0uYFYQiBJFGo99FFmaA8'),(26,'Fannie Newquist  ','fannie','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','Z78gZK8EaOLAjluRCknzixPVZCMmsOm5E49be7SnITcfY5iCKHghTLZZ58jT'),(27,'Kareen Crimi  ','kareen','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','9572ogxolx4nGoc9SyxKKeMPPI3lWL0fzKufxf059vUCnioppURd9jZTuKXf'),(28,'Mattie Quezada  ','mattie','$2y$10$4YkDE89c27JskNxysAW9VujC5euciBrI5ajRjkDhgv1LMpkpjYZtW','Tu6PAM5NOKohlpYk00Rul0AsG7M5ozjOLspOJTQfRwh7LZaWhGeDEW29Nnen');
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

-- Dump completed on 2014-10-20  2:13:50
