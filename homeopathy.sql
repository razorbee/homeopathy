-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 02:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeopathynew`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advices`
--

CREATE TABLE `advices` (
  `id` int(10) UNSIGNED NOT NULL,
  `advice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `address`, `phone`, `email`, `contact_person_name`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'SRI MAHIMA MULTISPECALITY HOMOEO CLINIC-JAYANAGAR', '#231,fortune tower,37th cross,11th main,4th t block,Jayanagar\r\nBengaluru, Karnataka 560041', '6363557925', 'crijalpj389@gmail.com', 'DR.PREMAJYOTHI FRASER.P', 5, '2019-05-11 02:05:11', '2019-07-13 11:50:19'),
(3, 'SRI MAHIMA MULTISPECALITY HOMOEO CLINIC-ANANTHAPUR', 'Circle, #12-4-75 Vidyuth Nagar, Anantapur, Andhra Pradesh- 515001', '085542 24899', 'drpkumarhomoeo@gmail.com', 'DR.KUMARAIAH.P', 5, '2019-05-11 02:07:36', '2019-07-13 11:51:02'),
(7, 'SRI MAHIMA MULTISPECALITY HOMOEO CLINIC-MARATHAHALLI', '#69.5th cross,ramanjaneya layout,outer ring road,marathahalli,bangalore-560037', '9740226156', 'pogulanagendrababu2gmail.com', 'DR.NAGENDRA BABU.P', 5, '2019-07-13 11:41:17', '2019-07-13 11:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_date_times`
--

CREATE TABLE `appointment_date_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_date_times`
--

INSERT INTO `appointment_date_times` (`id`, `appointment_id`, `days`, `start_time`, `end_time`, `user_id`, `created_at`, `updated_at`) VALUES
(54, 7, 'Thursday', '09:00:00', '21:00:00', 5, '2019-07-13 11:53:03', '2019-07-13 11:53:03'),
(53, 7, 'Wednesday', '09:00:00', '21:00:00', 5, '2019-07-13 11:52:48', '2019-07-13 11:52:48'),
(52, 7, 'Tuesday', '09:00:00', '21:00:00', 5, '2019-07-13 11:52:39', '2019-07-13 11:52:39'),
(51, 7, 'Monday', '09:00:00', '21:00:00', 5, '2019-07-13 11:52:23', '2019-07-13 11:52:23'),
(50, 2, 'Saturday', '09:00:00', '21:00:00', 5, '2019-07-13 11:49:41', '2019-07-13 11:49:41'),
(49, 2, 'Friday', '09:00:00', '21:00:00', 5, '2019-07-13 11:49:31', '2019-07-13 11:49:31'),
(43, 3, 'Friday', '09:00:00', '21:00:00', 5, '2019-07-13 11:36:07', '2019-07-13 11:36:07'),
(42, 3, 'Thursday', '09:00:00', '21:00:00', 5, '2019-07-13 11:35:51', '2019-07-13 11:35:51'),
(41, 3, 'Wednesday', '09:00:00', '21:00:00', 5, '2019-07-13 11:35:29', '2019-07-13 11:35:29'),
(40, 3, 'Tuesday', '09:00:00', '21:00:00', 5, '2019-07-13 11:35:13', '2019-07-13 11:35:13'),
(39, 3, 'Monday', '09:00:00', '21:00:00', 5, '2019-07-13 11:34:57', '2019-07-13 11:34:57'),
(56, 7, 'Sunday', '09:00:00', '21:00:00', 5, '2019-07-13 11:53:29', '2019-07-13 11:53:29'),
(55, 7, 'Friday', '09:00:00', '21:00:00', 5, '2019-07-13 11:53:17', '2019-07-13 11:53:17'),
(48, 2, 'Thursday', '09:00:00', '21:00:00', 5, '2019-07-13 11:49:19', '2019-07-13 11:49:19'),
(47, 2, 'Wednesday', '09:00:00', '21:00:00', 5, '2019-07-13 11:49:06', '2019-07-13 11:49:06'),
(46, 2, 'Tuesday', '09:00:00', '21:00:00', 5, '2019-07-13 11:48:53', '2019-07-13 11:48:53'),
(45, 2, 'Monday', '09:00:00', '21:00:00', 5, '2019-07-13 11:48:41', '2019-07-13 11:48:41'),
(44, 3, 'Saturday', '09:00:00', '21:00:00', 5, '2019-07-13 11:36:22', '2019-07-13 11:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `disease` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `disease`, `created_at`, `updated_at`) VALUES
(1, 'goitre', '2019-07-26 06:43:23', '2019-07-26 06:43:23'),
(2, 'heartburn', '2019-07-26 06:43:57', '2019-07-26 06:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `name`, `generic_name`, `note`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(556, 'F.P', 'Biochemic', NULL, 1, 1, '2019-07-26 06:40:38', '2019-07-26 06:40:38'),
(557, 'K.S', 'Biochemic', NULL, 1, 1, '2019-07-26 06:41:06', '2019-07-26 06:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `drug_advices`
--

CREATE TABLE `drug_advices` (
  `id` int(10) UNSIGNED NOT NULL,
  `drug_advice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_doses`
--

CREATE TABLE `drug_doses` (
  `id` int(10) UNSIGNED NOT NULL,
  `dose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_durations`
--

CREATE TABLE `drug_durations` (
  `id` int(10) UNSIGNED NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_strengths`
--

CREATE TABLE `drug_strengths` (
  `id` int(10) UNSIGNED NOT NULL,
  `strength` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_types`
--

CREATE TABLE `drug_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_details`
--

CREATE TABLE `fee_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee_id` int(11) NOT NULL,
  `fee` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_01_121933_create_drug_types_table', 1),
(4, '2017_10_01_121955_create_drug_strengths_table', 1),
(5, '2017_10_01_122008_create_drugs_table', 1),
(6, '2017_10_01_122039_create_patients_table', 1),
(7, '2017_10_01_122207_create_prescription_templates_table', 1),
(8, '2017_10_01_122257_create_prescription_template_drugs_table', 1),
(9, '2017_10_01_123254_create_prescription_template_lefts_table', 1),
(10, '2017_10_01_123309_create_prescriptions_table', 1),
(11, '2017_10_01_123315_create_prescription_drugs_table', 1),
(12, '2017_10_01_123323_create_prescription_lefts_table', 1),
(13, '2017_10_01_123407_create_advices_table', 1),
(14, '2017_10_01_123533_create_patient_documents_table', 1),
(15, '2017_10_01_123708_create_appointments_table', 1),
(16, '2017_10_01_123801_create_fees_table', 1),
(17, '2017_10_01_131228_create_appointment_date_times_table', 1),
(18, '2017_10_01_131558_create_fee_details_table', 1),
(19, '2017_10_10_143448_create_patient_appointments_table', 1),
(20, '2017_10_10_230447_create_patient_payments_table', 1),
(21, '2017_10_13_020835_create_drug_doses_table', 1),
(22, '2017_10_13_021029_create_drug_durations_table', 1),
(23, '2017_10_13_021041_create_drug_advices_table', 1),
(24, '2017_10_17_135311_create_abouts_table', 1),
(26, '2019_05_27_121058_create_diseases_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patientdetails` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `p_id`, `name`, `gender`, `date_of_birth`, `image`, `email`, `address`, `phone`, `patientdetails`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
('1907261', 1, 'Navena', 2, '1983-07-26', NULL, NULL, NULL, '9655421350', NULL, 1, 24, '2019-07-26 05:24:17', '2019-07-26 05:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointments`
--

CREATE TABLE `patient_appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_documents`
--

CREATE TABLE `patient_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_payments`
--

CREATE TABLE `patient_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_appointment_id` int(11) DEFAULT NULL,
  `payment` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `prescription_template_id` int(11) DEFAULT NULL,
  `prescription_date` date NOT NULL,
  `disease` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_visit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_drugs`
--

CREATE TABLE `prescription_drugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `drug_id1` int(32) DEFAULT NULL,
  `drug_id2` int(32) DEFAULT NULL,
  `multi_drug` int(2) NOT NULL DEFAULT '0',
  `drug_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strength` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequencies` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_lefts`
--

CREATE TABLE `prescription_lefts` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `cc` text COLLATE utf8mb4_unicode_ci,
  `oe` text COLLATE utf8mb4_unicode_ci,
  `pd` text COLLATE utf8mb4_unicode_ci,
  `dd` text COLLATE utf8mb4_unicode_ci,
  `lab_workup` text COLLATE utf8mb4_unicode_ci,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_templates`
--

CREATE TABLE `prescription_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_template_drugs`
--

CREATE TABLE `prescription_template_drugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_template_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strength` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_template_lefts`
--

CREATE TABLE `prescription_template_lefts` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_template_id` int(11) NOT NULL,
  `cc` text COLLATE utf8mb4_unicode_ci,
  `oe` text COLLATE utf8mb4_unicode_ci,
  `pd` text COLLATE utf8mb4_unicode_ci,
  `dd` text COLLATE utf8mb4_unicode_ci,
  `lab_workup` text COLLATE utf8mb4_unicode_ci,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `image`, `info`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin1@gmail.com', '$2y$10$Tr3YkLEZiQ9VD3GabpcduepabT1iiJqtf/YCmN.PtSGNf55e0Rs0O', NULL, NULL, NULL, NULL, 1, 1, NULL, '2019-07-26 06:03:29', '2019-07-26 06:03:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advices`
--
ALTER TABLE `advices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_date_times`
--
ALTER TABLE `appointment_date_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_advices`
--
ALTER TABLE `drug_advices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_doses`
--
ALTER TABLE `drug_doses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_durations`
--
ALTER TABLE `drug_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_strengths`
--
ALTER TABLE `drug_strengths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_types`
--
ALTER TABLE `drug_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_details`
--
ALTER TABLE `fee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_documents`
--
ALTER TABLE `patient_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_payments`
--
ALTER TABLE `patient_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_drugs`
--
ALTER TABLE `prescription_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_lefts`
--
ALTER TABLE `prescription_lefts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_templates`
--
ALTER TABLE `prescription_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_template_drugs`
--
ALTER TABLE `prescription_template_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_template_lefts`
--
ALTER TABLE `prescription_template_lefts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advices`
--
ALTER TABLE `advices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment_date_times`
--
ALTER TABLE `appointment_date_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=558;

--
-- AUTO_INCREMENT for table `drug_advices`
--
ALTER TABLE `drug_advices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_doses`
--
ALTER TABLE `drug_doses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drug_durations`
--
ALTER TABLE `drug_durations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drug_strengths`
--
ALTER TABLE `drug_strengths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drug_types`
--
ALTER TABLE `drug_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_details`
--
ALTER TABLE `fee_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `p_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_documents`
--
ALTER TABLE `patient_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_payments`
--
ALTER TABLE `patient_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_drugs`
--
ALTER TABLE `prescription_drugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_lefts`
--
ALTER TABLE `prescription_lefts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_templates`
--
ALTER TABLE `prescription_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescription_template_drugs`
--
ALTER TABLE `prescription_template_drugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescription_template_lefts`
--
ALTER TABLE `prescription_template_lefts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
