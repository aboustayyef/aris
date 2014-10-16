# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: aris
# Generation Time: 2014-10-16 06:33:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `name`, `parentId`, `active`)
VALUES
	(1,'About Us',NULL,1),
	(2,'Curriculum',NULL,1),
	(3,'Pastoral',NULL,1),
	(4,'Co-Curricular',NULL,1),
	(5,'Admissions',NULL,1),
	(6,'News & Events',NULL,1),
	(7,'Calendar',NULL,1),
	(8,'Alumni',NULL,1),
	(9,'Contact Us',NULL,1),
	(10,'Principal\'s Welcome',1,1),
	(11,'Mission and Aims',1,1),
	(12,'Why ARIS?',1,1),
	(13,'Facilities',1,1),
	(14,'Faculty',1,1),
	(15,'Policy Document',1,1),
	(16,'Administrive Staff',1,1),
	(17,'Student Representative Council',1,1),
	(18,'Publications',1,1),
	(19,'Early Years',2,1),
	(20,'Infants',2,1),
	(21,'Junior School',2,1),
	(22,'Secondary School',2,1),
	(23,'Guidance Department',3,1),
	(24,'Health and Wellbeing',3,1),
	(25,'Medical Care',3,1),
	(26,'House System',3,1),
	(27,'Buddy System',3,1),
	(28,'Tutorial System',3,1),
	(29,'Art',4,1),
	(30,'Music',4,1),
	(31,'Drama',4,1),
	(32,'Clubs & Societies',4,1),
	(33,'Sports',4,1),
	(34,'CAS in the IB Diploma Programme',4,1),
	(35,'Request Prospectus',5,1),
	(36,'Admissions Policy',5,1),
	(37,'Admissions Procedure',5,1),
	(38,'Fees',5,1),
	(39,'Scholarships',5,1),
	(40,'Stop Press',6,1),
	(41,'What\'s Blogging',6,1),
	(42,'Primary School Calendar',7,1),
	(43,'Secondary School Calendar',7,1),
	(44,'Composite Calendar',7,1),
	(45,'ARIS Alumni',8,1),
	(46,'News & Letters',8,1),
	(47,'Who and How',9,1);

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
