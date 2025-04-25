-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: best
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidate` (
  `id_candidate` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_candidate`),
  KEY `fk_employee_candidate` (`nip`),
  KEY `fk_event_candidate` (`id_event`),
  CONSTRAINT `fk_employee_candidate` FOREIGN KEY (`nip`) REFERENCES `employee` (`nip`),
  CONSTRAINT `fk_event_candidate` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate`
--

LOCK TABLES `candidate` WRITE;
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` VALUES (1,'197312011995121001',1),(2,'198109262004122002',1),(3,'198205262007012001',2),(4,'200112102024122001',2);
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `nip` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `hash_password` varchar(128) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('197108232006041013','Susanto','Sosial','susanto5','340018928_regresi'),('197312011995121001','Drisnaf Swastyardi','Kepala','drisnaf','340015135_regresi'),('197407222003121004','Yuliadi','Produksi','yuliadi','340017167_regresi'),('197709241998032002','Astryati Marganingsih','Sosial','astryati','340015572_regresi'),('197803112002122006','Lenna Nalurita','Distribusi','lenna.nalurita','340016663_regresi'),('198109262004122002','Siti Qodariyati','Kepala Subbagian Umum','sitiq','340017331_korelasi'),('198204262004121002','Wisnu Pratiko','Statistisi Madya','wpratiko','340017368_regresi'),('198205262007012001','Defika','Subbagian Umum','defika','340019484_distribusi'),('198209092011011016','Purwanto','Nerwilis','purwanto4','340054801_regresi'),('198407042011011010','John Fernando Silaban','Sosial','john.fs','340054792_regresi'),('198612292022032005','Iin Aryani','Subbagian Umum','iin.aryani','340061340_regresi'),('198706112011011006','Rizqi Bagaskoro','Produksi','rizqi.bagaskoro','340054803_regresi'),('198706252010032001','Yunida Rachmawati','Subbagian Umum','yunida.rachmawati','340053720_regresi'),('198808302010031001','Della Krisna Prayuga','ZI','dellakape','340053592_regresi'),('198903072024211003','Edi Ristanto','IPDS','ediristanto-pppk','340062814_regresi'),('199203292016021001','Dwi Hendro Siswo Purnomo','IPDS','dwi.hendro','340057351_regresi'),('199207262014122001','Woro Ayu Prasetyaningtyas','Nerwilis','woro.ayu','340057242_regresi'),('199507232018021003','Ahmad Mutawally','Sosial','ahmadmutawally','340058112_regresi'),('199610012019012002','Nurul Afifah','Nerwilis','nurul.afifah','340058898_regresi'),('199708172019121002','Aditya Anggit Pradika','IPDS','adit.anggit','340059369_regresi'),('199801152022032011','Jantika Ayu Ramadhani','Subbagian Umum','jantika.ayu','340061357_regresi'),('199804022019122001','Wiwik Dwi Aprilliyanti','Sosial','wiwik.dwi','340059816_regresi'),('199909072022011002','Joseph Gabriel Napitupulu','Produksi','josephgabriel','340060706_regresi'),('200010312023022004','Faradilla Anastasya','IPDS','faradilla.anastasya','340061784_regresi'),('200101212023102002','Fidya Alhayu','Distribusi','fidya.alhayu','340062453_regresi'),('200112102024122001','Aisyah Azizah Nur Rahmah','Sosial','aisyah.azizah','340062991_inferensia'),('200211162024122002','Rahma Fajri Ramdhani','IPDS','rahma.fajri','340063451_regresi');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Employee of the Month','2025-04-21 00:00:00','2025-04-25 23:59:59'),(2,'Employee of the Month','2025-04-28 00:00:00','2025-04-29 23:59:59'),(3,'Employee of the Month','2025-04-28 00:00:00','2025-04-29 23:59:59'),(4,'Employee of the Month','2025-04-28 00:00:00','2025-04-29 23:59:59');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll`
--

DROP TABLE IF EXISTS `poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poll` (
  `id_poll` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_event` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_poll`),
  KEY `fk_employee_poll` (`nip`),
  KEY `fk_candidate_poll` (`id_candidate`),
  CONSTRAINT `fk_candidate_poll` FOREIGN KEY (`id_candidate`) REFERENCES `candidate` (`id_candidate`) ON DELETE CASCADE,
  CONSTRAINT `fk_employee_poll` FOREIGN KEY (`nip`) REFERENCES `employee` (`nip`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll`
--

LOCK TABLES `poll` WRITE;
/*!40000 ALTER TABLE `poll` DISABLE KEYS */;
INSERT INTO `poll` VALUES (13,'197312011995121001',1,'2025-04-23 21:50:55',1),(14,'197312011995121001',2,'2025-04-23 21:50:55',1),(15,'200010312023022004',1,'2025-04-23 22:07:11',1),(16,'200010312023022004',2,'2025-04-23 22:07:11',1),(17,'200010312023022004',1,'2025-04-24 14:12:17',1),(18,'200010312023022004',2,'2025-04-24 14:12:17',1);
/*!40000 ALTER TABLE `poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(256) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_question`),
  KEY `question_question_category_FK` (`id_category`),
  CONSTRAINT `question_question_category_FK` FOREIGN KEY (`id_category`) REFERENCES `question_category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'Memahami dan memenuhi kebutuhan masyarakat',1),(2,'Dapat diandalkan',1),(3,'Melakukan perbaikan tiada henti',1),(4,'Melaksanakan tugas dengan jujur',2),(5,'Menggunakan BMN secara bertanggung jawab',2),(6,'Tidak menyalahgunakan kewenangan jabatan',2),(7,'Meningkatkan kompetensi diri',3),(8,'Membantu orang lain belajar',3),(9,'Melaksanakan tugas dengan kualitas terbaik',3),(10,'Menghargai setiap orang ',4),(11,'Suka menolong orang lain',4),(12,'Membangun lingkungan kerja',4),(13,'Memegang teguh ideologi',5),(14,'Menjaga nama baik sesama ASN',5),(15,'Menjaga rahasia jabatan dan negara',5),(16,'Cepat menyesuaikan diri',6),(17,'Berinovasi dan mengembangkan kreativitas',6),(18,'Bertindak proaktif',6),(19,'Memberi kesempatan kepada berbagai pihak untuk berkontribusi',7),(20,'Terbuka dalam bekerja sama',7),(21,'Menggerakkan pemanfaatan berbagai sumber daya',7);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_category`
--

DROP TABLE IF EXISTS `question_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `weight` double NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_category`
--

LOCK TABLES `question_category` WRITE;
/*!40000 ALTER TABLE `question_category` DISABLE KEYS */;
INSERT INTO `question_category` VALUES (1,'Berorientasi Pelayanan',0.145),(2,'Akuntabel',0.15),(3,'Kompeten',0.155),(4,'Harmonis',0.135),(5,'Loyal',0.14),(6,'Adaptif',0.14),(7,'Kolaboratif',0.135);
/*!40000 ALTER TABLE `question_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `score` (
  `id_score` int(11) NOT NULL AUTO_INCREMENT,
  `id_poll` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id_score`),
  KEY `fk_poll_score` (`id_poll`),
  KEY `fk_question_score` (`id_question`),
  CONSTRAINT `fk_poll_score` FOREIGN KEY (`id_poll`) REFERENCES `poll` (`id_poll`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_question_score` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
INSERT INTO `score` VALUES (127,13,1,5),(128,13,2,5),(129,13,3,5),(130,13,4,5),(131,13,5,5),(132,13,6,5),(133,13,7,5),(134,13,8,5),(135,13,9,5),(136,13,10,5),(137,13,11,5),(138,13,12,5),(139,13,13,5),(140,13,14,5),(141,13,15,5),(142,13,16,5),(143,13,17,5),(144,13,18,5),(145,13,19,5),(146,13,20,5),(147,13,21,5),(148,14,1,5),(149,14,2,5),(150,14,3,5),(151,14,4,5),(152,14,5,5),(153,14,6,5),(154,14,7,5),(155,14,8,5),(156,14,9,5),(157,14,10,5),(158,14,11,5),(159,14,12,5),(160,14,13,5),(161,14,14,5),(162,14,15,5),(163,14,16,5),(164,14,17,5),(165,14,18,5),(166,14,19,5),(167,14,20,5),(168,14,21,5),(169,15,1,5),(170,15,2,5),(171,15,3,5),(172,15,4,5),(173,15,5,5),(174,15,6,5),(175,15,7,5),(176,15,8,5),(177,15,9,5),(178,15,10,5),(179,15,11,5),(180,15,12,5),(181,15,13,5),(182,15,14,5),(183,15,15,5),(184,15,16,5),(185,15,17,5),(186,15,18,5),(187,15,19,5),(188,15,20,5),(189,15,21,5),(190,16,1,5),(191,16,2,5),(192,16,3,5),(193,16,4,5),(194,16,5,5),(195,16,6,5),(196,16,7,5),(197,16,8,5),(198,16,9,5),(199,16,10,5),(200,16,11,5),(201,16,12,5),(202,16,13,5),(203,16,14,5),(204,16,15,5),(205,16,16,5),(206,16,17,5),(207,16,18,5),(208,16,19,5),(209,16,20,5),(210,16,21,5),(211,15,1,5),(212,15,2,5),(213,15,3,5),(214,15,4,5),(215,15,5,5),(216,15,6,5),(217,15,7,5),(218,15,8,5),(219,15,9,5),(220,15,10,5),(221,15,11,5),(222,15,12,5),(223,15,13,5),(224,15,14,5),(225,15,15,5),(226,15,16,5),(227,15,17,5),(228,15,18,5),(229,15,19,5),(230,15,20,5),(231,15,21,5),(232,16,1,5),(233,16,2,5),(234,16,3,5),(235,16,4,5),(236,16,5,5),(237,16,6,5),(238,16,7,5),(239,16,8,5),(240,16,9,5),(241,16,10,5),(242,16,11,5),(243,16,12,5),(244,16,13,5),(245,16,14,1),(246,16,15,5),(247,16,16,5),(248,16,17,5),(249,16,18,5),(250,16,19,5),(251,16,20,5),(252,16,21,5);
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'best'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-25 14:14:47
