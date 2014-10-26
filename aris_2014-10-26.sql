# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: aris
# Generation Time: 2014-10-26 19:00:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `title`, `slug`, `section_id`, `content`, `created_at`, `updated_at`)
VALUES
	(8,'Welcome Letter','welcome-letter',10,'<p>Welcome Letter</p>','2014-10-26 09:12:48','2014-10-26 09:12:48'),
	(9,'Missions','missions',11,'<p>Our Mission and Aims</p>','2014-10-26 09:13:27','2014-10-26 09:13:27'),
	(10,'Ten Good Reasons for choosing Al-Rayaan International School','ten-good-reasons-for-choosing-al-rayaan-international-school',12,'<p>Ten Good reasons for choosing Al-Rayaan</p>','2014-10-26 09:14:36','2014-10-26 09:14:36'),
	(11,'Primary School Campus','primary-school-campus',13,'<p>Page for Primary School Campus</p>','2014-10-26 09:15:03','2014-10-26 09:15:03'),
	(12,'Secondary School Campus','secondary-school-campus',13,'<p>Secondary School Campus</p>','2014-10-26 09:15:25','2014-10-26 09:15:25'),
	(13,'Library / Multimedia Center','library-multimedia-center',13,'<p>Library / Multimedia Center Page</p>','2014-10-26 09:16:14','2014-10-26 09:16:14'),
	(14,'ICT Laboratory','ict-laboratory',13,'<p>The Page for ICT Laboratory</p>','2014-10-26 09:16:50','2014-10-26 09:16:50'),
	(15,'Science Labs','science-labs',13,'<p>Science Labs</p>','2014-10-26 09:17:59','2014-10-26 09:17:59'),
	(16,'Interactive Learning Center','interactive-learning-center',13,'<p>Interactive Learning Centre</p>','2014-10-26 09:18:30','2014-10-26 09:18:30'),
	(17,'Medical Clinic / Infirmary','medical-clinic-infirmary',13,'<p>Medical Clinic / Infirmary</p>','2014-10-26 09:19:16','2014-10-26 09:19:16'),
	(18,'Art Spaces','art-spaces',13,'<p>Art Spaces</p>','2014-10-26 09:19:34','2014-10-26 09:19:34'),
	(19,'Primary School Teachers','primary-school-teachers',14,'<p>Primary School Teachers</p>','2014-10-26 09:25:39','2014-10-26 09:25:39'),
	(20,'Secondary School Teachers','secondary-school-teachers',14,'<p>Secondary School Teachers</p>','2014-10-26 09:26:02','2014-10-26 09:26:02'),
	(21,'Admissions and Placement Policy','admissions-and-placement-policy',15,'<p>Admissions and Placement Policy</p>','2014-10-26 09:27:14','2014-10-26 09:27:14'),
	(22,'Languages Policy','languages-policy',15,'<p>Languages Policy</p>','2014-10-26 09:27:56','2014-10-26 09:27:56'),
	(23,'Special Educational Needs Policy','special-educational-needs-policy',15,'<p>Special Educational Needs Policy</p>','2014-10-26 09:28:32','2014-10-26 09:28:32'),
	(24,'Homework Policy','homework-policy',15,'<p>Homework Policy</p>','2014-10-26 09:28:56','2014-10-26 09:28:56'),
	(25,'Attendance Policy','attendance-policy',15,'<p>Attendance Policy</p>','2014-10-26 09:30:11','2014-10-26 09:30:11'),
	(26,'Network Policy','network-policy',15,'<p>Network Policy</p>','2014-10-26 09:31:16','2014-10-26 09:31:16'),
	(27,'Academic Honesty Policy','academic-honesty-policy',15,'<p>Academic Honesty policy</p>','2014-10-26 09:31:54','2014-10-26 09:31:54'),
	(28,'Assessment Policy','assessment-policy',15,'<p>Assessment Policy</p>','2014-10-26 09:32:14','2014-10-26 09:32:14'),
	(29,'Security Policy','security-policy',15,'<p>Security Policy</p>','2014-10-26 09:32:38','2014-10-26 09:32:38'),
	(30,'Primary School Staff','primary-school-staff',16,'<p>Primary school admin staff</p>','2014-10-26 09:39:56','2014-10-26 09:39:56'),
	(31,'Secondary School Staff','secondary-school-staff',16,'<p>Secondary School Staff</p>','2014-10-26 09:41:58','2014-10-26 09:41:58'),
	(32,'Primary SRC?','primary-src',17,'<p>Primary SRC?</p>','2014-10-26 10:45:47','2014-10-26 10:45:47'),
	(33,'Secondary SRC','secondary-src',17,'<p>Secondary SRC</p>','2014-10-26 10:46:01','2014-10-26 10:46:01'),
	(34,'The Aristotalian','the-aristotalian',18,'<p>The Aristotalian</p>','2014-10-26 10:46:28','2014-10-26 10:46:28'),
	(35,'ARIS Together','aris-together',18,'<p>Aris Together</p>','2014-10-26 10:47:13','2014-10-26 10:47:13');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featureImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `name`, `parentId`, `active`, `image`, `description`, `slug`, `featureImage`)
VALUES
	(1,'About Us',NULL,1,NULL,'This is the description of the About Us Section.. In which we put a little introduction to the school and the about us section','about-us',''),
	(2,'Curriculum',NULL,1,NULL,NULL,'curriculum',''),
	(3,'Pastoral',NULL,1,NULL,NULL,'pastoral',''),
	(4,'Co-Curricular',NULL,1,NULL,NULL,'co-curricular',''),
	(5,'Admissions',NULL,1,NULL,NULL,'admissions',''),
	(6,'News & Events',NULL,1,NULL,NULL,'news-events',''),
	(7,'Calendar',NULL,1,NULL,NULL,'calendar',''),
	(8,'Alumni',NULL,1,NULL,NULL,'alumni',''),
	(9,'Contact Us',NULL,1,NULL,NULL,'contact-us',''),
	(10,'Principal\'s Welcome',1,1,NULL,'This is the description of the principal\'s welcome page','principals-welcome',''),
	(11,'Mission and Aims',1,1,NULL,NULL,'mission-and-aims',''),
	(12,'Why ARIS?',1,1,NULL,NULL,'why-aris',''),
	(13,'Facilities',1,1,NULL,NULL,'facilities',''),
	(14,'Faculty',1,1,NULL,NULL,'faculty',''),
	(15,'Policy Documents',1,1,NULL,NULL,'policy-document',''),
	(16,'Administrive Staff',1,1,NULL,NULL,'administrive-staff',''),
	(17,'Student Representative Council',1,1,NULL,NULL,'student-representative-council',''),
	(18,'Publications',1,1,NULL,NULL,'publications',''),
	(21,'Primary School',2,1,NULL,NULL,'primary-school',''),
	(22,'Secondary School',2,1,NULL,NULL,'secondary-school',''),
	(23,'Guidance Department',3,1,NULL,NULL,'guidance-department',''),
	(24,'Health and Wellbeing',3,1,NULL,NULL,'health-and-wellbeing',''),
	(25,'Medical Care',3,1,NULL,NULL,'medical-care',''),
	(26,'House System',3,1,NULL,NULL,'house-system',''),
	(27,'Buddy System',3,1,NULL,NULL,'buddy-system',''),
	(28,'Tutorial System',3,1,NULL,NULL,'tutorial-system',''),
	(29,'Art',4,1,NULL,NULL,'art',''),
	(30,'Music',4,1,NULL,NULL,'music',''),
	(31,'Drama',4,1,NULL,NULL,'drama',''),
	(32,'Clubs & Societies',4,1,NULL,NULL,'clubs-societies',''),
	(33,'Sports',4,1,NULL,NULL,'sports',''),
	(34,'CAS in the IB Diploma Programme',4,1,NULL,NULL,'cas-in-the-ib-diploma-programme',''),
	(35,'Request Prospectus',5,1,NULL,NULL,'request-prospectus',''),
	(36,'Admissions Policy',5,1,NULL,NULL,'admissions-policy',''),
	(37,'Admissions Procedure',5,1,NULL,NULL,'admissions-procedure',''),
	(38,'Fees',5,1,NULL,NULL,'fees',''),
	(39,'Scholarships',5,1,NULL,NULL,'scholarships',''),
	(40,'Stop Press',6,1,NULL,NULL,'stop-press',''),
	(41,'What\'s Blogging',6,1,NULL,NULL,'whats-blogging',''),
	(42,'Primary School Calendar',7,1,NULL,NULL,'primary-school-calendar',''),
	(43,'Secondary School Calendar',7,1,NULL,NULL,'secondary-school-calendar',''),
	(44,'Composite Calendar',7,1,NULL,NULL,'composite-calendar',''),
	(45,'ARIS Alumni',8,1,NULL,NULL,'aris-alumni',''),
	(46,'News & Letters',8,1,NULL,NULL,'news-letters',''),
	(47,'Who and How',9,1,NULL,NULL,'who-and-how','');

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'mustapha.hamoui@gmail.com','$2y$10$ToI3AblR7eruE6pt9MJ.U.TC.NQhGN4l9MAWvcxbPY41e1Uc7clZu',NULL,'2014-10-16 05:40:24','2014-10-16 05:40:24');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
