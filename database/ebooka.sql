-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: ebooka
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` longtext NOT NULL,
  `activity_date` datetime NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'Nag Update koe','2017-12-12 08:32:53');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(256) NOT NULL,
  `book_description` text NOT NULL,
  `book_author` varchar(128) NOT NULL,
  `book_category_id` int(11) NOT NULL,
  `book_file` text NOT NULL,
  `book_cover` varchar(256) NOT NULL,
  `book_date` datetime NOT NULL,
  `upload_type` set('Private','Public') NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Krissy','A dark cold night','Kris',1,'26117-o_holy_night-2.pdf','75994-windows10.jpg','2017-12-17 19:54:33','Public'),(2,'Kegwa','Kegwa','April',1,'25389-1-paskong-pasko-na-talaga.pdf','34670-windows10.jpg','2017-12-17 19:55:24','Public'),(3,'Haru Nicole','Har Nicole','Andrea',1,'82631-w72f4-african-noel.pdf','9644-windows10.jpg','2017-12-17 19:56:18','Private'),(4,'Fish & Tea','Fish and tea','rolly',1,'28229-windows10.jpg','64125-windows10.jpg','2017-12-19 05:43:00','Public'),(5,'Jajajaj','jajajaj','jajaj',1,'51849-windows10.jpg','89382-windows10.jpg','2017-12-17 19:57:44','Public'),(7,'Gurabelles','Gurabelles','Dannah',1,'89798-windows10.jpg','57234-img_2374.jpg','2017-12-19 06:08:48','Public');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(128) NOT NULL,
  `category_description` text NOT NULL,
  `category_cover` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Fiction','Fiction na Book','fiction.jpg');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(256) NOT NULL,
  `post_text` longtext NOT NULL,
  `post_date` datetime NOT NULL,
  `post_type` set('Private','Public') NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_author` varchar(128) NOT NULL,
  `post_cover` varchar(128) NOT NULL,
  `post_description` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (8,'Krissy & Darla','A dark cold night','2017-12-19 06:51:11','Public',1,'romalepali','91027-windows10.jpg','A dark cold night'),(9,'Kegwa','Kegwa na ds','2017-12-19 06:51:31','Public',1,'romalepali','6810-windows10.jpg','Kegwa na ds'),(10,'Keg','kdsnk','2017-12-19 06:50:27','Public',1,'romalepali','default_cover.jpg','kjsdj');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_uname` varchar(32) NOT NULL,
  `user_pword` varchar(32) NOT NULL,
  `user_fname` varchar(32) NOT NULL,
  `user_mname` varchar(32) NOT NULL,
  `user_lname` varchar(32) NOT NULL,
  `user_gender` set('Female','Male') NOT NULL,
  `user_profile` varchar(64) NOT NULL,
  `user_date_created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'romalepali','bc0e8f1ccdda2784055034726babd660','Rolly','Lee','Linao','Male','rolly.jpg','2017-12-10 11:11:42'),(2,'pinky','daea4d0b55ef6c16f04b8997a51e7e6a','Pinky','Bucas','Corpin','Female','profile.jpg','2017-12-12 08:47:40'),(3,'dannah','0d8dbb27156dfb455835b71d3cfaacc8','Dannah','Rose','Sanda','Female','profile.jpg','2017-12-15 18:08:00');
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

-- Dump completed on 2017-12-20 21:28:27
