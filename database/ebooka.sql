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
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'A new story is posted','2018-01-04 20:31:45',1),(2,'A new story is posted','2018-01-04 20:32:19',1),(3,'A new book is inserted','2018-01-04 20:34:23',1),(4,'A new book is inserted','2018-01-04 21:23:50',1),(5,'A story is updated','2018-01-05 01:13:27',1),(6,'A story is updated','2018-01-05 05:33:12',1),(7,'A story is updated','2018-01-05 05:33:54',1),(8,'A story is updated','2018-01-05 05:34:10',1),(9,'A book has been updated','2018-01-05 05:34:33',1),(10,'A book has been updated','2018-01-05 05:34:56',1),(11,'A book has been updated','2018-01-05 05:36:35',1),(12,'A new book is inserted','2018-01-05 19:53:58',1),(13,'A new story is posted','2018-01-05 20:08:58',1),(14,'New user is added','2018-01-05 20:27:22',4);
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
  `book_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upload_type` set('Private','Public') NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Hey','Hey','rolleenao',3,'89186-hey','default_cover.jpg','2018-01-05 05:36:35','Public',1),(2,'Char','Xhar','rolleenao',2,'9611-char','default_cover.jpg','2018-01-05 05:34:56','Public',1),(3,'Go','Go','rolleenao',3,'23171-go','default_cover.jpg','2018-01-05 19:53:58','Public',1);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_books_insert` AFTER INSERT ON `books` FOR EACH ROW begin

insert into activities(activity, activity_date, user_id)

values ('A new book is inserted', NOW(), NEW.user_id);

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_books_update
after update on books
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('A book has been updated', NOW(), NEW.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_books_delete
after delete on books
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('A book has been deleted', NOW(), OLD.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(128) NOT NULL,
  `category_cover` text NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'All Categories','default_cover.jpg','2018-01-04 08:05:02'),(2,'Sci-Fi','default_cover.jpg','2018-01-04 20:30:57'),(3,'Fantasy','default_cover.jpg','2018-01-04 21:41:02'),(4,'Horror','default_cover.jpg','2018-01-05 20:16:07');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_category_insert` AFTER INSERT ON `category` FOR EACH ROW begin

insert into category_activity(activity, activity_date)

values ('A new category is created', NOW());

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_category_update` AFTER UPDATE ON `category` FOR EACH ROW begin

insert into category_activity(activity, activity_date)

values ('A category is updated', NOW());

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_category_delete` AFTER DELETE ON `category` FOR EACH ROW begin

insert into category_activity(activity, activity_date)

values ('A category is deleted', NOW());

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `category_activity`
--

DROP TABLE IF EXISTS `category_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_activity` (
  `category_act_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(60) NOT NULL,
  `activity_date` varchar(60) NOT NULL,
  PRIMARY KEY (`category_act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_activity`
--

LOCK TABLES `category_activity` WRITE;
/*!40000 ALTER TABLE `category_activity` DISABLE KEYS */;
INSERT INTO `category_activity` VALUES (7,'A new category is created','2018-01-05 05:41:02'),(8,'A new category is created','2018-01-06 04:16:07');
/*!40000 ALTER TABLE `category_activity` ENABLE KEYS */;
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
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_type` set('Private','Public') NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_author` varchar(128) NOT NULL,
  `post_cover` varchar(128) NOT NULL,
  `post_description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Gura','Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura Gura ','2018-01-05 05:34:10','Private',2,'romalepali','default_cover.jpg','Gura',1),(2,'Super','Super','2018-01-05 05:33:54','Private',2,'romalepali','default_cover.jpg','Super',1),(3,'Hey You','Hey You','2018-01-05 20:08:58','Private',3,'romalepali','default_cover.jpg','Hey You',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_posts_insert
after insert on posts
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('A new story is posted', NOW(), NEW.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_posts_update
after update on posts
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('A story is updated', NOW(), NEW.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_posts_delete
after delete on posts
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('A post is deleted', NOW(), OLD.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
  `user_type` set('Administrator','Standard') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'romalepali','bc0e8f1ccdda2784055034726babd660','Rolly','Lee','Linao','Male','73206-img_1956.png','2017-12-10 11:11:42','Administrator'),(2,'pinky','daea4d0b55ef6c16f04b8997a51e7e6a','Pinky','Buscas','Corpin09','Female','profile.jpg','2017-12-12 08:47:40','Standard'),(3,'dannah','0d8dbb27156dfb455835b71d3cfaacc8','Dannah','Rose','Sanda','Female','profile.jpg','2017-12-15 18:08:00','Standard'),(4,'dems','500cbc92550c4f3e5cff41536ac7eabd','Dems','Rey','Roca','Male','profile.jpg','0000-00-00 00:00:00','Standard');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_users_insert
after insert on users
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('New user is added', NOW(), NEW.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_users_update
after update on users
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('A user has been updated', NOW(), NEW.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_users_delete
after delete on users
for each row
begin
insert into activities(activity, activity_date, user_id)
values ('A user has been deleted', NOW(), OLD.user_id);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-06  7:32:17
