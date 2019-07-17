-- MySQL dump 10.13  Distrib 5.6.39, for Linux (x86_64)
--
-- Host: localhost    Database: drdiary_qa
-- ------------------------------------------------------
-- Server version	5.6.39-cll-lve

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
-- Current Database: `drdiary_qa`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `drdiary_qa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `drdiary_qa`;

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advices`
--

DROP TABLE IF EXISTS `advices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `advice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advices`
--

LOCK TABLES `advices` WRITE;
/*!40000 ALTER TABLE `advices` DISABLE KEYS */;
/*!40000 ALTER TABLE `advices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_date_times`
--

DROP TABLE IF EXISTS `appointment_date_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment_date_times` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_date_times`
--

LOCK TABLES `appointment_date_times` WRITE;
/*!40000 ALTER TABLE `appointment_date_times` DISABLE KEYS */;
INSERT INTO `appointment_date_times` VALUES (1,1,'Tuesday','02:02:00','03:03:00',3,'2019-02-06 14:28:56','2019-02-06 14:28:56'),(2,1,'Wednesday','11:00:00','12:00:00',3,'2019-02-11 08:15:33','2019-02-11 08:15:33');
/*!40000 ALTER TABLE `appointment_date_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,'shifa hospital','157, 1, Manipal County Rd, Above Domino\'s pizza, Singasandra','test','dr100@gmail.com','shiffa name',3,'2019-02-06 13:44:06','2019-02-06 13:44:06');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_advices`
--

DROP TABLE IF EXISTS `drug_advices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_advices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `drug_advice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_advices`
--

LOCK TABLES `drug_advices` WRITE;
/*!40000 ALTER TABLE `drug_advices` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_advices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_doses`
--

DROP TABLE IF EXISTS `drug_doses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_doses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_doses`
--

LOCK TABLES `drug_doses` WRITE;
/*!40000 ALTER TABLE `drug_doses` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_doses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_durations`
--

DROP TABLE IF EXISTS `drug_durations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_durations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_durations`
--

LOCK TABLES `drug_durations` WRITE;
/*!40000 ALTER TABLE `drug_durations` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_durations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_strengths`
--

DROP TABLE IF EXISTS `drug_strengths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_strengths` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strength` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_strengths`
--

LOCK TABLES `drug_strengths` WRITE;
/*!40000 ALTER TABLE `drug_strengths` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_strengths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_types`
--

DROP TABLE IF EXISTS `drug_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_types`
--

LOCK TABLES `drug_types` WRITE;
/*!40000 ALTER TABLE `drug_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
INSERT INTO `drugs` VALUES (1,'calpol','test','for temprature',1,3,'2019-02-06 13:04:03','2019-02-06 13:04:03');
/*!40000 ALTER TABLE `drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fee_details`
--

DROP TABLE IF EXISTS `fee_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fee_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fee_id` int(11) NOT NULL,
  `fee` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fee_details`
--

LOCK TABLES `fee_details` WRITE;
/*!40000 ALTER TABLE `fee_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `fee_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_10_01_121933_create_drug_types_table',1),(4,'2017_10_01_121955_create_drug_strengths_table',1),(5,'2017_10_01_122008_create_drugs_table',1),(6,'2017_10_01_122039_create_patients_table',1),(7,'2017_10_01_122207_create_prescription_templates_table',1),(8,'2017_10_01_122257_create_prescription_template_drugs_table',1),(9,'2017_10_01_123254_create_prescription_template_lefts_table',1),(10,'2017_10_01_123309_create_prescriptions_table',1),(11,'2017_10_01_123315_create_prescription_drugs_table',1),(12,'2017_10_01_123323_create_prescription_lefts_table',1),(13,'2017_10_01_123407_create_advices_table',1),(14,'2017_10_01_123533_create_patient_documents_table',1),(15,'2017_10_01_123708_create_appointments_table',1),(16,'2017_10_01_123801_create_fees_table',1),(17,'2017_10_01_131228_create_appointment_date_times_table',1),(18,'2017_10_01_131558_create_fee_details_table',1),(19,'2017_10_10_143448_create_patient_appointments_table',1),(20,'2017_10_10_230447_create_patient_payments_table',1),(21,'2017_10_13_020835_create_drug_doses_table',1),(22,'2017_10_13_021029_create_drug_durations_table',1),(23,'2017_10_13_021041_create_drug_advices_table',1),(24,'2017_10_17_135311_create_abouts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_appointments`
--

DROP TABLE IF EXISTS `patient_appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_appointments`
--

LOCK TABLES `patient_appointments` WRITE;
/*!40000 ALTER TABLE `patient_appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_documents`
--

DROP TABLE IF EXISTS `patient_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_documents`
--

LOCK TABLES `patient_documents` WRITE;
/*!40000 ALTER TABLE `patient_documents` DISABLE KEYS */;
INSERT INTO `patient_documents` VALUES (1,2,0,1,'uploads/medical_files/615916.jpeg',3,'2019-02-09 14:57:00','2019-02-09 14:57:00'),(2,2,0,1,'uploads/medical_files/610589.jpeg',3,'2019-02-11 08:05:00','2019-02-11 08:05:00'),(3,2,0,1,'uploads/medical_files/721567.png',3,'2019-02-11 08:10:00','2019-02-11 08:10:00');
/*!40000 ALTER TABLE `patient_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_payments`
--

DROP TABLE IF EXISTS `patient_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `patient_appointment_id` int(11) DEFAULT NULL,
  `payment` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_payments`
--

LOCK TABLES `patient_payments` WRITE;
/*!40000 ALTER TABLE `patient_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'moktarul Anam',1,'1990-02-02',NULL,'moktarul@gmail.com','adugodi kormangala','9986694413',1,3,'2019-02-06 12:58:56','2019-02-06 12:58:56'),(2,'saleem1',1,'1990-09-09',NULL,'aaa@gmail.com','adugodi','1111111111',1,3,'2019-02-07 07:11:13','2019-02-07 07:11:13'),(3,'K. Chandrasekhar Rao',1,'1980-01-01','uploads/patient/506751.png',NULL,NULL,'9999999999',1,3,'2019-02-13 08:32:02','2019-02-13 08:32:02');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription_drugs`
--

DROP TABLE IF EXISTS `prescription_drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription_drugs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strength` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription_drugs`
--

LOCK TABLES `prescription_drugs` WRITE;
/*!40000 ALTER TABLE `prescription_drugs` DISABLE KEYS */;
INSERT INTO `prescription_drugs` VALUES (1,1,1,'tab','before lunch','7days','500mg',NULL,'2019-02-10 15:28:48','2019-02-10 15:28:48'),(2,2,1,'tab','aftr meals','7days','500mg','dont take water immediate','2019-02-11 08:12:07','2019-02-11 08:12:07'),(3,3,1,'tab','after lunch','30days','500mg','dont dring....','2019-02-16 19:17:23','2019-02-16 19:17:23');
/*!40000 ALTER TABLE `prescription_drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription_lefts`
--

DROP TABLE IF EXISTS `prescription_lefts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription_lefts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `cc` text COLLATE utf8mb4_unicode_ci,
  `oe` text COLLATE utf8mb4_unicode_ci,
  `pd` text COLLATE utf8mb4_unicode_ci,
  `dd` text COLLATE utf8mb4_unicode_ci,
  `lab_workup` text COLLATE utf8mb4_unicode_ci,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription_lefts`
--

LOCK TABLES `prescription_lefts` WRITE;
/*!40000 ALTER TABLE `prescription_lefts` DISABLE KEYS */;
INSERT INTO `prescription_lefts` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,NULL,'2019-02-10 15:28:48','2019-02-10 15:28:48'),(2,2,'headacg','Xray','rerer','rere','rerer','rere','2019-02-11 08:12:07','2019-02-11 08:12:07'),(3,3,NULL,NULL,NULL,NULL,NULL,NULL,'2019-02-16 19:17:23','2019-02-16 19:17:23');
/*!40000 ALTER TABLE `prescription_lefts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription_template_drugs`
--

DROP TABLE IF EXISTS `prescription_template_drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription_template_drugs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_template_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strength` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription_template_drugs`
--

LOCK TABLES `prescription_template_drugs` WRITE;
/*!40000 ALTER TABLE `prescription_template_drugs` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescription_template_drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription_template_lefts`
--

DROP TABLE IF EXISTS `prescription_template_lefts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription_template_lefts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_template_id` int(11) NOT NULL,
  `cc` text COLLATE utf8mb4_unicode_ci,
  `oe` text COLLATE utf8mb4_unicode_ci,
  `pd` text COLLATE utf8mb4_unicode_ci,
  `dd` text COLLATE utf8mb4_unicode_ci,
  `lab_workup` text COLLATE utf8mb4_unicode_ci,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription_template_lefts`
--

LOCK TABLES `prescription_template_lefts` WRITE;
/*!40000 ALTER TABLE `prescription_template_lefts` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescription_template_lefts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription_templates`
--

DROP TABLE IF EXISTS `prescription_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription_templates`
--

LOCK TABLES `prescription_templates` WRITE;
/*!40000 ALTER TABLE `prescription_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescription_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `prescription_template_id` int(11) DEFAULT NULL,
  `prescription_date` date NOT NULL,
  `next_visit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescriptions`
--

LOCK TABLES `prescriptions` WRITE;
/*!40000 ALTER TABLE `prescriptions` DISABLE KEYS */;
INSERT INTO `prescriptions` VALUES (1,1,NULL,'2019-02-10',NULL,NULL,3,'2019-02-10 15:28:48','2019-02-10 15:28:48'),(2,2,NULL,'2019-02-11','ererererer',NULL,3,'2019-02-11 08:12:07','2019-02-11 08:12:07'),(3,2,NULL,'2019-02-16',NULL,NULL,3,'2019-02-16 19:17:23','2019-02-16 19:17:23');
/*!40000 ALTER TABLE `prescriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Dr. Naushad Ahmed Peeran','dr1@gmail.com','$2y$10$jJkOJAy0zfMYCgCT8xgCbeVeBZKGzZIIdKRoQEV5BmDTB8DCc32Zy','uploads/assistant/440401.png','MBBS, MD - General Medicine, \r\nDNB - Cardiology , Consultant - Cardiology\r\n29 Years Experience','9986694413','157, 1, Manipal County Rd, Above Domino\'s pizza, Singasandra',1,1,'Cv98vDIc2iwFRlvDFLsRJ80yLCZFNVBzKzod9du7pN90f7MOT39WNrJSXLtf','2019-01-31 13:22:32','2019-02-14 20:51:05'),(4,'assistant1','assistant1@gmail.com','$2y$10$/SJOHUKmTs0AVjsBghNGZOhy6x0P4fDPWW9FkGciwZFCfLQpd559W',NULL,NULL,'9999999998','test address',2,1,'RD7axq3jlgJlommuXbav2zSD6gsLivZlqzcZa4B85rPVa3Sy3rNSY3qDVAYy','2019-02-14 20:53:25','2019-02-14 20:53:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'drdiary_qa'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-05  3:50:48
