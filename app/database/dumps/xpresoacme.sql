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
-- Table structure for table `filledforms`
--

DROP TABLE IF EXISTS `filledforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filledforms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_filledforms_users` (`user_id`),
  KEY `FK_filledforms_forms` (`form_id`),
  CONSTRAINT `FK_filledforms_forms` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`),
  CONSTRAINT `FK_filledforms_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filledforms`
--

LOCK TABLES `filledforms` WRITE;
/*!40000 ALTER TABLE `filledforms` DISABLE KEYS */;
INSERT INTO `filledforms` VALUES (1,1,1);
/*!40000 ALTER TABLE `filledforms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filledformslines`
--

DROP TABLE IF EXISTS `filledformslines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filledformslines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filledform_id` int(10) unsigned NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned NOT NULL DEFAULT '0',
  `meta_id` int(10) unsigned DEFAULT NULL,
  `num` float unsigned DEFAULT NULL,
  `text` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filledformid_questionid` (`filledform_id`,`question_id`),
  KEY `FK_filledformslines_answerstructmetas` (`meta_id`),
  KEY `FK_filledformslines_questions` (`question_id`),
  CONSTRAINT `FK_filledformslines_filledforms` FOREIGN KEY (`filledform_id`) REFERENCES `filledforms` (`id`),
  CONSTRAINT `FK_filledformslines_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filledformslines`
--

LOCK TABLES `filledformslines` WRITE;
/*!40000 ALTER TABLE `filledformslines` DISABLE KEYS */;
INSERT INTO `filledformslines` VALUES (1,1,1,2,NULL,NULL,NULL),(2,1,2,NULL,NULL,'Amir Cicak',NULL),(3,1,3,NULL,NULL,NULL,'1977-07-26'),(4,1,4,4,NULL,NULL,NULL),(5,1,5,12,NULL,NULL,NULL),(6,1,6,14,NULL,NULL,NULL);
/*!40000 ALTER TABLE `filledformslines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formquestions`
--

DROP TABLE IF EXISTS `formquestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formquestions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(10) unsigned NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `formid_questionid` (`form_id`,`question_id`),
  KEY `FK_formquestions_questions` (`question_id`),
  CONSTRAINT `FK_formquestions_forms` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`),
  CONSTRAINT `FK_formquestions_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formquestions`
--

LOCK TABLES `formquestions` WRITE;
/*!40000 ALTER TABLE `formquestions` DISABLE KEYS */;
INSERT INTO `formquestions` VALUES (1,1,1),(2,1,2),(4,1,3),(5,1,4),(6,1,5),(7,1,6);
/*!40000 ALTER TABLE `formquestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` VALUES (1,'Visa application');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
INSERT INTO `metas` VALUES (2,1,'No'),(1,1,'Yes'),(5,4,'In a relationship'),(4,4,'Married'),(3,4,'Single'),(13,5,'Female'),(12,5,'Male'),(6,5,'Prefer not to disclose'),(14,6,'Bosnian'),(8,6,'British'),(10,6,'French'),(7,6,'Irish'),(11,6,'Other'),(9,6,'Spanish');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,5,'Do you smoke?',1,0),(2,3,'What is your name?',1,0),(3,1,'When were you born?',1,0),(4,4,'Martial status?',1,0),(5,5,'Gender?',0,0),(6,4,'Nationality?',0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `passMD5` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Amir Cicak','borgdrone7','xyz');
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

-- Dump completed on 2014-10-15 13:52:49
