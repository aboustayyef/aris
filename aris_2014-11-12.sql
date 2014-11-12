# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.16)
# Database: aris
# Generation Time: 2014-11-12 22:09:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_15_181919_create_sections_table',1),
	('2014_10_15_193505_create_user_table',1),
	('2014_10_16_055615_add_column_active_to_sections',2),
	('2014_10_17_174320_add_section_image_and_section_description_to_sections',3),
	('2014_10_18_183458_create_table_pages',4),
	('2014_10_18_213130_add_column_slug_to_table_sections',5),
	('2014_10_18_220929_add_columns_to_section',5),
	('2014_11_02_085348_create_news_table',6),
	('2014_11_12_190547_create_table_nodes',7);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table nodes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nodes`;

CREATE TABLE `nodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `nodes` WRITE;
/*!40000 ALTER TABLE `nodes` DISABLE KEYS */;

INSERT INTO `nodes` (`id`, `name`, `parent_id`, `excerpt`, `content`, `feature_image`, `type`, `slug`, `redirect`, `created_at`, `updated_at`)
VALUES
	(1,'About Us',NULL,'This is the description of the About Us Section.. In which we put a little introduction to the school and the about us section',NULL,'','normal','about-us',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,'Curriculum',NULL,NULL,NULL,'','normal','curriculum',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'Pastoral',NULL,NULL,NULL,'','normal','pastoral',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(4,'Co-Curricular',NULL,NULL,NULL,'','normal','co-curricular',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,'Admissions',NULL,NULL,NULL,'','normal','admissions',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(6,'News & Events',NULL,NULL,NULL,'','normal','news-events',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(7,'Calendar',NULL,NULL,NULL,'','normal','calendar',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(8,'Alumni',NULL,NULL,NULL,'','normal','alumni',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(9,'Contact Us',NULL,NULL,NULL,'','normal','contact-us',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(10,'Principal\'s Welcome',1,'This is the description of the principal\'s welcome page','<p>Welcome to the Al-Rayan International School website. Recognized as a young and forward thinking school ARIS is an outstanding place to work and go to school. Our students are from over twenty different countries, are hard working and high achieving, our parents are supportive, our faculty is inspirational and our Board of Directors is very dedicated and strategically focused.</p><div class=\"half\"><p>As a not-for-profit International Cambridge School, our curriculum is international and challenging. At the same time, we place a high value on the quality of relationships within the school as we attempt to</p></div><div class=\"half last\"><p>This is the second half</p></div><p>As a not-for-profit International Cambridge School, our curriculum is international and challenging. At the same time, we place a high value on the quality of relationships within the school as we attempt to model behaviors that we hope to see in students. We are dedicated to nurturing creative, resilient, interdependent and socially responsible students with the knowledge and skills necessary to be active contributors in the global community. In this way, we are more than just a school&hellip;we are a place where students emerge as responsible stewards of our global society and natural environment.</p><p>The ARIS family is undertaking big challenges in the coming five years, as our guiding statements so eloquently states. We will keep you updated of our achievements through our website. It is my sincere hope that you will find this website user friendly and you will consider it as the main source of information about the school. Enjoy your browsing.</p><p>Yours Sincerely, <br />Dr Fatma Odaymat</p>','','normal','principals-welcome',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(11,'Mission and Aims',1,NULL,NULL,'','normal','mission-and-aims',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(12,'Why ARIS?',1,NULL,NULL,'','normal','why-aris',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(13,'Facilities',1,NULL,NULL,'','normal','facilities',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(14,'Faculty',1,NULL,NULL,'','normal','faculty',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(15,'Policy Documents',1,NULL,NULL,'','normal','policy-document',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(16,'Administrive Staff',1,NULL,NULL,'','normal','administrive-staff',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(17,'Student Representative Council',1,NULL,NULL,'','normal','student-representative-council',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(18,'Publications',1,NULL,NULL,'','normal','publications',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(21,'Primary School',2,NULL,NULL,'','normal','primary-school',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(22,'Secondary School',2,NULL,NULL,'','normal','secondary-school',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(23,'Guidance Department',3,NULL,NULL,'','normal','guidance-department',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(24,'Health and Wellbeing',3,NULL,NULL,'','normal','health-and-wellbeing',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(26,'House System',3,NULL,NULL,'','normal','house-system',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(27,'Buddy System',3,NULL,NULL,'','normal','buddy-system',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(28,'Tutorial System',3,NULL,NULL,'','normal','tutorial-system',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(29,'Art',4,NULL,NULL,'','normal','art',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(30,'Music',4,NULL,NULL,'','normal','music',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(31,'Drama',4,NULL,NULL,'','normal','drama',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(32,'Clubs & Societies',4,NULL,NULL,'','normal','clubs-societies',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(33,'Sports',4,NULL,NULL,'','normal','sports',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(34,'CAS in the IB Diploma Programme',4,NULL,NULL,'','normal','cas-in-the-ib-diploma-programme',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(35,'Request Prospectus',5,NULL,NULL,'','normal','request-prospectus',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(36,'Admissions Policy',5,NULL,NULL,'','normal','admissions-policy',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(37,'Admissions Procedure',5,NULL,NULL,'','normal','admissions-procedure',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(38,'Fees',5,NULL,NULL,'','normal','fees',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(39,'Scholarships',5,NULL,NULL,'','normal','scholarships',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(40,'Stop Press',6,NULL,NULL,'','normal','stop-press',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(41,'What\'s Blogging',6,NULL,NULL,'','normal','whats-blogging',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(42,'Primary School Calendar',7,NULL,NULL,'','normal','primary-school-calendar',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(43,'Secondary School Calendar',7,NULL,NULL,'','normal','secondary-school-calendar',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(44,'Composite Calendar',7,NULL,NULL,'','normal','composite-calendar',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(45,'ARIS Alumni',8,NULL,NULL,'','normal','aris-alumni',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(46,'News & Letters',8,NULL,NULL,'','normal','news-letters',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(49,'Aris Mission and Aims',11,NULL,'<h2>Mission</h2><p>Al-Rayan International School is a multicultural, non-discriminatory community of learners committed to motivating students to attain their fullest potential through broad-based, world-class curricula that promote critical thinking, foster self-motivation, and encourage self-development.The school is dedicated to nurturing creative, resilient and socially responsible students able to take initiatives, and endowed with the knowledge, skills and global awareness necessary to continue their education and become active contributors to the global community.</p><h2>Aims</h2><p>By 2018, Al-Rayan International School will be recognized nationally and internationally as a leading international school in Ghana, providing a stimulating multicultural learning environment in accordance with the best international standards in education. ARIS will also ensure high quality school support programmes that positively influence less advantaged students&rsquo; opportunities to access teaching and learning.ARIS students and staff will work well in teams and make a positive contribution to the school and to the wider world. Students will enjoy a programme of extended learning opportunities and a school climate characterized by academic excellence, fairness, trust, and mutual respect.</p>',NULL,'normal','missions',NULL,'2014-10-26 09:13:27','2014-11-04 21:08:20'),
	(50,'Why Choose Aris',12,NULL,'<p>Al-Rayan International School (ARIS) was established in September 2003. As a forward thinking school, our mission focuses on the provision of the highest level of International standards in education adopting the Cambridge International and British National Curricula.</p><blockquote><p>We are committed to inspiring students to attain their fullest potential through a broad based curriculum that promotes critical thinking, fosters self-motivation, and encourages self- development.</p></blockquote><p>We are dedicated to nurturing creative, resilient, interdependent and socially responsible students with the knowledge and skills necessary to be active contributors in the global community. Within a caring, multicultural and courteous environment, the school is committed to instilling in each student a desire to learn, take appropriate risks, accept responsibility and face challenges. It is our task to keep the welfare and well-being of our students at the forefront and provide them with a morally sound learning environment that is respectful of all.</p><p>ARIS also ensures high quality school support programs that positively influences students&rsquo; opportunities to access teaching and learning.</p><p>Our students enjoy a wide program of extended learning opportunities and a school climate characterized by fairness, trust, and mutual respect that supports student development, learning and well-being.</p><p>Further, we aim to build highly professional and dynamic teams across the school that are committed to continuous learning and development in addition to finding fulfillment in their work.</p><p>At ARIS, we encourage our students to learn foreign languages since this exposes them to different cultures as well as different linguistic systems, thereby enabling an understanding of diversities and similarities in the global communities. We believe that intercultural competence is not only one of the essential skills for modern life and work, but is in itself exciting, pleasurable and rewarding. We currently offer Arabic, French, and Hindi.</p><p>In addition ARIS runs an Arabic Language Saturday program. This program caters to more than 120 students who attend other schools in Ghana.</p>',NULL,'normal','ten-good-reasons-for-choosing-al-rayaan-international-school',NULL,'2014-10-26 09:14:36','2014-11-04 21:37:24'),
	(51,'Primary School Campus',13,NULL,'<p>Page for Primary School Campus</p>',NULL,'normal','primary-school-campus',NULL,'2014-10-26 09:15:03','2014-10-26 09:15:03'),
	(52,'Secondary School Campus',13,NULL,'<p>Secondary School Campus</p>',NULL,'normal','secondary-school-campus',NULL,'2014-10-26 09:15:25','2014-10-26 09:15:25'),
	(53,'Library / Multimedia Center',13,NULL,'<p>Library / Multimedia Center Page</p>',NULL,'normal','library-multimedia-center',NULL,'2014-10-26 09:16:14','2014-10-26 09:16:14'),
	(54,'ICT Laboratory',13,NULL,'<p>The Page for ICT Laboratory</p>',NULL,'normal','ict-laboratory',NULL,'2014-10-26 09:16:50','2014-10-26 09:16:50'),
	(55,'Science Labs',13,NULL,'<p>Science Labs</p>',NULL,'normal','science-labs',NULL,'2014-10-26 09:17:59','2014-10-26 09:17:59'),
	(56,'Interactive Learning Center',13,NULL,'<p>Interactive Learning Centre</p>',NULL,'normal','interactive-learning-center',NULL,'2014-10-26 09:18:30','2014-10-26 09:18:30'),
	(57,'Medical Clinic / Infirmary',13,NULL,'<p>Medical Clinic / Infirmary</p>',NULL,'normal','medical-clinic-infirmary',NULL,'2014-10-26 09:19:16','2014-10-26 09:19:16'),
	(58,'Art Spaces',13,NULL,'<p>Art Spaces</p>',NULL,'normal','art-spaces',NULL,'2014-10-26 09:19:34','2014-10-26 09:19:34'),
	(59,'Primary School Teachers',14,NULL,'<p>Primary School Teachers</p>',NULL,'normal','primary-school-teachers',NULL,'2014-10-26 09:25:39','2014-10-26 09:25:39'),
	(60,'Secondary School Teachers',14,NULL,'<p>Secondary School Teachers</p>',NULL,'normal','secondary-school-teachers',NULL,'2014-10-26 09:26:02','2014-10-26 09:26:02'),
	(61,'Admissions and Placement Policy',15,NULL,'<p>Admissions and Placement Policy</p>',NULL,'normal','admissions-and-placement-policy',NULL,'2014-10-26 09:27:14','2014-10-26 09:27:14'),
	(62,'Languages Policy',15,NULL,'<p>Languages Policy</p>',NULL,'normal','languages-policy',NULL,'2014-10-26 09:27:56','2014-10-26 09:27:56'),
	(63,'Special Educational Needs Policy',15,NULL,'<p>Special Educational Needs Policy</p>',NULL,'normal','special-educational-needs-policy',NULL,'2014-10-26 09:28:32','2014-10-26 09:28:32'),
	(64,'Homework Policy',15,NULL,'<p>Homework Policy</p>',NULL,'normal','homework-policy',NULL,'2014-10-26 09:28:56','2014-10-26 09:28:56'),
	(65,'Attendance Policy',15,NULL,'<p>Attendance Policy</p>',NULL,'normal','attendance-policy',NULL,'2014-10-26 09:30:11','2014-10-26 09:30:11'),
	(66,'Network Policy',15,NULL,'<p>Network Policy</p>',NULL,'normal','network-policy',NULL,'2014-10-26 09:31:16','2014-10-26 09:31:16'),
	(67,'Academic Honesty Policy',15,NULL,'<p>Academic Honesty policy</p>',NULL,'normal','academic-honesty-policy',NULL,'2014-10-26 09:31:54','2014-10-26 09:31:54'),
	(68,'Assessment Policy',15,NULL,'<p>Assessment Policy</p>',NULL,'normal','assessment-policy',NULL,'2014-10-26 09:32:14','2014-10-26 09:32:14'),
	(69,'Security Policy',15,NULL,'<p>Security Policy</p>',NULL,'normal','security-policy',NULL,'2014-10-26 09:32:38','2014-10-26 09:32:38'),
	(70,'Primary School Staff',16,NULL,'<p>Primary school admin staff</p>',NULL,'normal','primary-school-staff',NULL,'2014-10-26 09:39:56','2014-10-26 09:39:56'),
	(71,'Secondary School Staff',16,NULL,'<p>Secondary School Staff</p>',NULL,'normal','secondary-school-staff',NULL,'2014-10-26 09:41:58','2014-10-26 09:41:58'),
	(72,'Primary SRC?',17,NULL,'<p>Primary SRC?</p>',NULL,'normal','primary-src',NULL,'2014-10-26 10:45:47','2014-10-26 10:45:47'),
	(73,'Secondary SRC',17,NULL,'<p>Secondary SRC</p>',NULL,'normal','secondary-src',NULL,'2014-10-26 10:46:01','2014-10-26 10:46:01'),
	(74,'The Aristotalian',18,NULL,'<p>The Aristotalian</p>',NULL,'normal','the-aristotalian',NULL,'2014-10-26 10:46:28','2014-10-26 10:46:28'),
	(75,'ARIS Together',18,NULL,'<p>Aris Together</p>',NULL,'normal','aris-together',NULL,'2014-10-26 10:47:13','2014-10-26 10:47:13'),
	(76,'Early Years',21,NULL,'<p>Early Years</p>',NULL,'normal','early-years',NULL,'2014-11-02 19:38:22','2014-11-02 19:38:22'),
	(77,'Seven Areas of Learning',21,NULL,'<p class=\"p1\">Covers the seven areas of learning and gives information on languages</p>',NULL,'normal','seven-areas-of-learning',NULL,'2014-11-06 18:12:19','2014-11-06 18:12:19'),
	(78,'Progress & Development',21,NULL,'<p class=\"p1\">Early Years development guide covers every aspect of EYFS</p>',NULL,'normal','progress-development',NULL,'2014-11-06 18:15:53','2014-11-06 18:15:53'),
	(79,'Early Years Gallery',21,NULL,'<p>Photographs</p>',NULL,'normal','early-years-gallery',NULL,'2014-11-06 18:17:26','2014-11-06 18:17:26'),
	(80,'Infants',21,NULL,'<p class=\"p1\">Let us tell you a story, all about the children in Infant School</p>',NULL,'normal','infants',NULL,'2014-11-06 18:21:00','2014-11-06 18:21:00'),
	(81,'Infants Gallery',21,NULL,'<p class=\"p1\">All the pictures of our Infants in action!</p>',NULL,'normal','infants-gallery',NULL,'2014-11-06 18:21:43','2014-11-06 18:21:43'),
	(82,'Junior School Handbook',21,NULL,'<p class=\"p1\">Junior School includes all children in Years 3, 4, 5 and 6</p>',NULL,'normal','junior-school-handbook',NULL,'2014-11-07 18:23:27','2014-11-07 18:23:27'),
	(83,'Junior School Gallery',21,NULL,'<p class=\"p1\">All the pictures of our Juniors in action!</p>',NULL,'normal','junior-school-gallery',NULL,'2014-11-07 18:23:59','2014-11-07 18:23:59'),
	(84,'Student Handbook',22,NULL,'<p>Student Handbook</p>',NULL,'normal','student-handbook',NULL,'2014-11-07 18:24:28','2014-11-07 18:24:28'),
	(85,'Departments',22,NULL,'<p>Secondary School Departments</p>',NULL,'normal','departments',NULL,'2014-11-07 18:24:54','2014-11-07 18:24:54'),
	(86,'Organogram / Staff Diagram',22,NULL,'<p>Organogram / Staff Diagram page</p>',NULL,'normal','organogram-staff-diagram',NULL,'2014-11-09 17:50:56','2014-11-09 17:50:56'),
	(87,'Secondary Level 1',22,NULL,'<p class=\"p1\">Years 7, 8 and 9: International Key Stage 3</p>',NULL,'normal','secondary-level-1',NULL,'2014-11-09 17:51:44','2014-11-09 17:51:44'),
	(88,'L1 Curriculum',22,NULL,'<p class=\"p1\">Subjects mandated for all students</p>',NULL,'normal','l1-curriculum',NULL,'2014-11-09 17:52:21','2014-11-09 17:52:21'),
	(89,'Secondary Level 2',22,NULL,'<p class=\"p1\">Years 10 and 11: International General Certificate of Secondary Education (IGCSE)</p>',NULL,'normal','secondary-level-2',NULL,'2014-11-09 17:52:45','2014-11-09 17:52:45'),
	(90,'L2 Curriculum',22,NULL,'<p class=\"p1\">Core and optional subjects</p>',NULL,'normal','l2-curriculum',NULL,'2014-11-09 17:53:10','2014-11-09 17:53:10'),
	(91,'Upper Secondary',22,NULL,'<p class=\"p1\">Years 12 and 13: ARIS is a Candidate School for the International Baccalaureate Diploma Programme</p>',NULL,'normal','upper-secondary',NULL,'2014-11-09 17:53:34','2014-11-09 17:53:34'),
	(92,'Upper Secondary Curriculum',22,NULL,'<p class=\"p1\">Proposed DP subjects in Groups 1 - 6, TOK, CAS and Extended Essay</p>',NULL,'normal','upper-secondary-curriculum',NULL,'2014-11-09 17:54:01','2014-11-09 17:54:01'),
	(93,'Primary School',23,NULL,'<p>Primary School Guidance Page</p>',NULL,'normal','primary-school',NULL,'2014-11-11 20:16:41','2014-11-11 20:16:41'),
	(94,'Secondary: Social and Emotional',23,NULL,'<p>Secondary School Social and emotional</p>\n',NULL,'normal','secondary-school-social-emotional',NULL,'2014-11-11 20:17:40','2014-11-11 20:17:40'),
	(95,'Tertiary Education',23,NULL,'<p>Tertiary Education</p>',NULL,'normal','tertiary-education',NULL,'2014-11-11 20:18:42','2014-11-11 20:18:42'),
	(96,'Vocational',23,NULL,'<p>Vocational </p>',NULL,'normal','vocational',NULL,'2014-11-11 20:19:27','2014-11-11 20:19:27'),
	(97,'Nurse and Infirmary',24,NULL,'<p>Nurse and Infirmary Page</p>',NULL,'normal','nurse-and-infirmary',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(98,'Clinic',24,NULL,'<p>Clinic</p>',NULL,'normal','clinic',NULL,'2014-11-11 20:21:22','2014-11-11 20:21:22'),
	(99,'Security',24,NULL,'<p>Security</p>',NULL,'normal','security',NULL,'2014-11-11 20:22:09','2014-11-11 20:22:09'),
	(100,'Air Quality',24,NULL,'<p>Air Quality</p>',NULL,'normal','air-quality',NULL,'2014-11-11 20:23:08','2014-11-11 20:23:08'),
	(101,'The Four Aris Houses',26,NULL,'<p>The Four Aris Houses</p>',NULL,'normal','four-aris-houses',NULL,'2014-11-11 20:24:01','2014-11-11 20:24:01'),
	(102,'The Buddy / Mentoring System',27,NULL,'<p>The Buddy, Mentoring System</p>',NULL,'normal','buddy-mentoring-system',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(103,'Tutorial System',28,NULL,'<p>The Tutorial System</p>',NULL,'normal','tutorial-system',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `nodes` ENABLE KEYS */;
UNLOCK TABLES;


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
	(8,'Welcome Letter','welcome-letter',10,'<p>Welcome to the Al-Rayan International School website. Recognized as a young and forward thinking school ARIS is an outstanding place to work and go to school. Our students are from over twenty different countries, are hard working and high achieving, our parents are supportive, our faculty is inspirational and our Board of Directors is very dedicated and strategically focused.</p><div class=\"half\"><p>As a not-for-profit International Cambridge School, our curriculum is international and challenging. At the same time, we place a high value on the quality of relationships within the school as we attempt to</p></div><div class=\"half last\"><p>This is the second half</p></div><p>As a not-for-profit International Cambridge School, our curriculum is international and challenging. At the same time, we place a high value on the quality of relationships within the school as we attempt to model behaviors that we hope to see in students. We are dedicated to nurturing creative, resilient, interdependent and socially responsible students with the knowledge and skills necessary to be active contributors in the global community. In this way, we are more than just a school&hellip;we are a place where students emerge as responsible stewards of our global society and natural environment.</p><p>The ARIS family is undertaking big challenges in the coming five years, as our guiding statements so eloquently states. We will keep you updated of our achievements through our website. It is my sincere hope that you will find this website user friendly and you will consider it as the main source of information about the school. Enjoy your browsing.</p><p>Yours Sincerely, <br />Dr Fatma Odaymat</p>','2014-10-26 09:12:48','2014-11-11 18:41:00'),
	(9,'Aris Mission and Aims','missions',11,'<h2>Mission</h2><p>Al-Rayan International School is a multicultural, non-discriminatory community of learners committed to motivating students to attain their fullest potential through broad-based, world-class curricula that promote critical thinking, foster self-motivation, and encourage self-development.The school is dedicated to nurturing creative, resilient and socially responsible students able to take initiatives, and endowed with the knowledge, skills and global awareness necessary to continue their education and become active contributors to the global community.</p><h2>Aims</h2><p>By 2018, Al-Rayan International School will be recognized nationally and internationally as a leading international school in Ghana, providing a stimulating multicultural learning environment in accordance with the best international standards in education. ARIS will also ensure high quality school support programmes that positively influence less advantaged students&rsquo; opportunities to access teaching and learning.ARIS students and staff will work well in teams and make a positive contribution to the school and to the wider world. Students will enjoy a programme of extended learning opportunities and a school climate characterized by academic excellence, fairness, trust, and mutual respect.</p>','2014-10-26 09:13:27','2014-11-04 21:08:20'),
	(10,'Why Choose Aris','ten-good-reasons-for-choosing-al-rayaan-international-school',12,'<p>Al-Rayan International School (ARIS) was established in September 2003. As a forward thinking school, our mission focuses on the provision of the highest level of International standards in education adopting the Cambridge International and British National Curricula.</p><blockquote><p>We are committed to inspiring students to attain their fullest potential through a broad based curriculum that promotes critical thinking, fosters self-motivation, and encourages self- development.</p></blockquote><p>We are dedicated to nurturing creative, resilient, interdependent and socially responsible students with the knowledge and skills necessary to be active contributors in the global community. Within a caring, multicultural and courteous environment, the school is committed to instilling in each student a desire to learn, take appropriate risks, accept responsibility and face challenges. It is our task to keep the welfare and well-being of our students at the forefront and provide them with a morally sound learning environment that is respectful of all.</p><p>ARIS also ensures high quality school support programs that positively influences students&rsquo; opportunities to access teaching and learning.</p><p>Our students enjoy a wide program of extended learning opportunities and a school climate characterized by fairness, trust, and mutual respect that supports student development, learning and well-being.</p><p>Further, we aim to build highly professional and dynamic teams across the school that are committed to continuous learning and development in addition to finding fulfillment in their work.</p><p>At ARIS, we encourage our students to learn foreign languages since this exposes them to different cultures as well as different linguistic systems, thereby enabling an understanding of diversities and similarities in the global communities. We believe that intercultural competence is not only one of the essential skills for modern life and work, but is in itself exciting, pleasurable and rewarding. We currently offer Arabic, French, and Hindi.</p><p>In addition ARIS runs an Arabic Language Saturday program. This program caters to more than 120 students who attend other schools in Ghana.</p>','2014-10-26 09:14:36','2014-11-04 21:37:24'),
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
	(35,'ARIS Together','aris-together',18,'<p>Aris Together</p>','2014-10-26 10:47:13','2014-10-26 10:47:13'),
	(36,'Early Years','early-years',21,'<p>Early Years</p>','2014-11-02 19:38:22','2014-11-02 19:38:22'),
	(38,'Seven Areas of Learning','seven-areas-of-learning',21,'<p class=\"p1\">Covers the seven areas of learning and gives information on languages</p>','2014-11-06 18:12:19','2014-11-06 18:12:19'),
	(39,'Progress & Development','progress-development',21,'<p class=\"p1\">Early Years development guide covers every aspect of EYFS</p>','2014-11-06 18:15:53','2014-11-06 18:15:53'),
	(40,'Early Years Gallery','early-years-gallery',21,'<p>Photographs</p>','2014-11-06 18:17:26','2014-11-06 18:17:26'),
	(41,'Infants','infants',21,'<p class=\"p1\">Let us tell you a story, all about the children in Infant School</p>','2014-11-06 18:21:00','2014-11-06 18:21:00'),
	(42,'Infants Gallery','infants-gallery',21,'<p class=\"p1\">All the pictures of our Infants in action!</p>','2014-11-06 18:21:43','2014-11-06 18:21:43'),
	(43,'Junior School Handbook','junior-school-handbook',21,'<p class=\"p1\">Junior School includes all children in Years 3, 4, 5 and 6</p>','2014-11-07 18:23:27','2014-11-07 18:23:27'),
	(44,'Junior School Gallery','junior-school-gallery',21,'<p class=\"p1\">All the pictures of our Juniors in action!</p>','2014-11-07 18:23:59','2014-11-07 18:23:59'),
	(45,'Student Handbook','student-handbook',22,'<p>Student Handbook</p>','2014-11-07 18:24:28','2014-11-07 18:24:28'),
	(46,'Departments','departments',22,'<p>Secondary School Departments</p>','2014-11-07 18:24:54','2014-11-07 18:24:54'),
	(47,'Organogram / Staff Diagram','organogram-staff-diagram',22,'<p>Organogram / Staff Diagram page</p>','2014-11-09 17:50:56','2014-11-09 17:50:56'),
	(48,'Secondary Level 1','secondary-level-1',22,'<p class=\"p1\">Years 7, 8 and 9: International Key Stage 3</p>','2014-11-09 17:51:44','2014-11-09 17:51:44'),
	(49,'L1 Curriculum','l1-curriculum',22,'<p class=\"p1\">Subjects mandated for all students</p>','2014-11-09 17:52:21','2014-11-09 17:52:21'),
	(50,'Secondary Level 2','secondary-level-2',22,'<p class=\"p1\">Years 10 and 11: International General Certificate of Secondary Education (IGCSE)</p>','2014-11-09 17:52:45','2014-11-09 17:52:45'),
	(51,'L2 Curriculum','l2-curriculum',22,'<p class=\"p1\">Core and optional subjects</p>','2014-11-09 17:53:10','2014-11-09 17:53:10'),
	(52,'Upper Secondary','upper-secondary',22,'<p class=\"p1\">Years 12 and 13: ARIS is a Candidate School for the International Baccalaureate Diploma Programme</p>','2014-11-09 17:53:34','2014-11-09 17:53:34'),
	(53,'Upper Secondary Curriculum','upper-secondary-curriculum',22,'<p class=\"p1\">Proposed DP subjects in Groups 1 - 6, TOK, CAS and Extended Essay</p>','2014-11-09 17:54:01','2014-11-09 17:54:01'),
	(54,'Primary School','primary-school',23,'<p>Primary School Guidance Page</p>','2014-11-11 20:16:41','2014-11-11 20:16:41'),
	(55,'Secondary: Social and Emotional','secondary-school-social-emotional',23,'<p>Secondary School Social and emotional</p>\n','2014-11-11 20:17:40','2014-11-11 20:17:40'),
	(56,'Tertiary Education','tertiary-education',23,'<p>Tertiary Education</p>','2014-11-11 20:18:42','2014-11-11 20:18:42'),
	(57,'Vocational','vocational',23,'<p>Vocational </p>','2014-11-11 20:19:27','2014-11-11 20:19:27'),
	(58,'Nurse and Infirmary','nurse-and-infirmary',24,'<p>Nurse and Infirmary Page</p>','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(59,'Clinic','clinic',24,'<p>Clinic</p>','2014-11-11 20:21:22','2014-11-11 20:21:22'),
	(60,'Security','security',24,'<p>Security</p>','2014-11-11 20:22:09','2014-11-11 20:22:09'),
	(61,'Air Quality','air-quality',24,'<p>Air Quality</p>','2014-11-11 20:23:08','2014-11-11 20:23:08'),
	(62,'The Four Aris Houses','four-aris-houses',26,'<p>The Four Aris Houses</p>','2014-11-11 20:24:01','2014-11-11 20:24:01'),
	(63,'The Buddy / Mentoring System','buddy-mentoring-system',27,'<p>The Buddy, Mentoring System</p>','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(64,'Tutorial System','tutorial-system',28,'<p>The Tutorial System</p>','0000-00-00 00:00:00','0000-00-00 00:00:00');

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
	(1,'mustapha.hamoui@gmail.com','$2y$10$ToI3AblR7eruE6pt9MJ.U.TC.NQhGN4l9MAWvcxbPY41e1Uc7clZu','p0b6ryUnx0LgPBpszeS9heL4GMgOsQaR6ldhZogcdkYSA7l9gKsl61bl7OWz','2014-10-16 05:40:24','2014-11-02 14:51:48');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
