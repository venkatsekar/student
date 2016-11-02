-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2016 at 02:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `firstsprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `board_id` int(2) NOT NULL AUTO_INCREMENT,
  `school_board_id` int(2) NOT NULL,
  `school_sub_board_id` int(2) NOT NULL,
  `other_text` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `boardcol` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`board_id`),
  KEY `fk_board_school_board_id_idx` (`school_board_id`),
  KEY `fk_board_school_sub_board_id_idx` (`school_sub_board_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `school_board_id`, `school_sub_board_id`, `other_text`, `updated_by`, `date_added`, `last_modified`, `status`, `boardcol`) VALUES
(1, 1, 1, 'CBSE1', 0, '2016-10-27 16:22:16', '2016-10-27 16:22:16', 1, NULL),
(2, 1, 2, 'CBSE2', 0, '2016-10-27 16:22:24', '2016-10-27 16:22:24', 1, NULL),
(3, 2, 3, 'CBSEADD1', 0, '2016-10-27 16:22:41', '2016-10-27 16:22:41', 1, NULL),
(4, 2, 4, 'CBSEADD2', 0, '2016-10-27 16:22:48', '2016-10-27 16:22:48', 1, NULL),
(5, 1, 5, 'ddddd', 0, '2016-10-28 18:24:29', '2016-10-28 18:24:37', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `class_id` int(2) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `remarks`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 'First', 'First', 0, '2016-10-27 16:21:41', '2016-10-27 16:21:41', 1),
(2, 'second', 'First', 0, '2016-10-27 16:21:46', '2016-10-27 16:21:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `edu_setting`
--

CREATE TABLE IF NOT EXISTS `edu_setting` (
  `edu_setting_id` int(2) NOT NULL AUTO_INCREMENT,
  `terms_students` varchar(1025) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terms_teachers` varchar(1025) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primary_ph_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secondary_ph_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`edu_setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_content`
--

CREATE TABLE IF NOT EXISTS `email_content` (
  `email_content_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email_content_text` varchar(1025) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`email_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grading_system`
--

CREATE TABLE IF NOT EXISTS `grading_system` (
  `grading_id` int(2) NOT NULL AUTO_INCREMENT,
  `grading_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`grading_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `lang_id` int(1) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `module_lesson`
--

CREATE TABLE IF NOT EXISTS `module_lesson` (
  `module_lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preparation_module_id` int(11) NOT NULL,
  `number_test` int(11) DEFAULT NULL,
  `test_timing` datetime DEFAULT NULL,
  `number_home_work` int(11) DEFAULT NULL,
  `examination_timing` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`module_lesson_id`),
  KEY `fk_module_lesson_preparation_module_id_idx` (`preparation_module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `module_lesson_topic`
--

CREATE TABLE IF NOT EXISTS `module_lesson_topic` (
  `module_lesson_topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_lesson_id` int(11) NOT NULL,
  `topic_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`module_lesson_topic_id`),
  KEY `fk_module_lesson_topic_module_lesson_id_idx` (`module_lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `preparation_module`
--

CREATE TABLE IF NOT EXISTS `preparation_module` (
  `preparation_module_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `virtual_rack_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`preparation_module_id`),
  KEY `fk_preparation_module_subject_id_idx` (`subject_id`),
  KEY `fk_preparation_module_class_id_idx` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 'Admin', 0, '2016-10-28 18:26:41', '2016-10-28 18:28:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_pages`
--

CREATE TABLE IF NOT EXISTS `roles_pages` (
  `role_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(2) NOT NULL,
  `page_id` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`role_page_id`),
  KEY `fk_role_id_idx` (`role_id`),
  KEY `fk_page_id_idx` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_boards`
--

CREATE TABLE IF NOT EXISTS `school_boards` (
  `school_board_id` int(2) NOT NULL AUTO_INCREMENT,
  `board_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`school_board_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_boards`
--

INSERT INTO `school_boards` (`school_board_id`, `board_name`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 'CBSE', 0, '2016-10-27 16:21:55', '2016-10-27 16:21:55', 1),
(2, 'CBSEsdd', 0, '2016-10-27 16:21:58', '2016-10-27 16:21:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_sub_board`
--

CREATE TABLE IF NOT EXISTS `school_sub_board` (
  `school_sub_board_id` int(2) NOT NULL AUTO_INCREMENT,
  `school_board_id` int(2) NOT NULL,
  `sub_board_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`school_sub_board_id`),
  KEY `fk_school_sub_board_school_board_id_idx` (`school_board_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `school_sub_board`
--

INSERT INTO `school_sub_board` (`school_sub_board_id`, `school_board_id`, `sub_board_name`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 1, 'CBSE1', 0, '2016-10-27 16:22:16', '2016-10-27 16:22:16', 1),
(2, 1, 'CBSE2', 0, '2016-10-27 16:22:24', '2016-10-27 16:22:24', 1),
(3, 2, 'CBSEADD1', 0, '2016-10-27 16:22:41', '2016-10-27 16:22:41', 1),
(4, 2, 'CBSEADD2', 0, '2016-10-27 16:22:48', '2016-10-27 16:22:48', 1),
(5, 1, 'ddddd', 0, '2016-10-28 18:24:29', '2016-10-28 18:24:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_content`
--

CREATE TABLE IF NOT EXISTS `sms_content` (
  `sms_content_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sms_content_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sms_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
  `student_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_info_id` int(11) NOT NULL,
  `father_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `address_line1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `first_contact_number` int(11) DEFAULT NULL,
  `second_contact_number` int(11) DEFAULT NULL,
  `third_contact_number` int(11) DEFAULT NULL,
  `photo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brother_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brother_dob` datetime DEFAULT NULL,
  `sister_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sister_dob` datetime DEFAULT NULL,
  `school_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `board_id` int(2) DEFAULT NULL,
  `class_id` int(2) DEFAULT NULL,
  `first_score_card` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_score_card` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `third_score_card` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_subject_id` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`student_info_id`),
  KEY `fk_student_info_user_info_id_idx` (`user_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_info_id`, `user_info_id`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `date_of_birth`, `address_line1`, `address_line2`, `city`, `state_id`, `first_contact_number`, `second_contact_number`, `third_contact_number`, `photo`, `bank_account_number`, `bank_name`, `ifsc_code`, `bank_branch`, `brother_name`, `brother_dob`, `sister_name`, `sister_dob`, `school_name`, `board_id`, `class_id`, `first_score_card`, `second_score_card`, `third_score_card`, `student_subject_id`, `remarks`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 2, 'sekars', 'Farmers', 'sankaris', 'house wifes', '0000-00-00 00:00:00', 'No 12 bajanai kloil streets', NULL, 'cheenais', 0, 2147483647, 2147483647, 2147483647, NULL, '998989897', 'Indian banks', 'IB00587', 'kalavais', 'nithiya nandams', '0000-00-00 00:00:00', 'venkatis', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cardss', 'second score cardss', 'third score cardss', 1, '', NULL, '2016-10-28 16:00:03', '2016-10-28 18:28:59', 0),
(2, 3, 'sekar', 'Farmer', 'sankari', 'house wife', '0000-00-00 00:00:00', 'No 12 bajanai kloil street', NULL, 'cheenai', 0, 2147483647, 2147483647, 2147483647, NULL, '99898989', 'Indian bank', 'IB0058', 'kalavai', 'nithiya nandam', '0000-00-00 00:00:00', 'venkati', '0000-00-00 00:00:00', 'Government higher secondary school', 1, 1, 'first score cards', 'second score cards', 'third score cards', 1, 'sdfsdfsdfsdfsd', NULL, '2016-10-27 16:36:24', '2016-10-27 16:36:24', 1),
(3, 4, '', '', '', '', '0000-00-00 00:00:00', '', NULL, '', 0, 0, NULL, NULL, NULL, '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 0, '', '', '', 0, '', NULL, '2016-10-27 17:11:34', '2016-10-28 17:43:44', 0),
(4, 5, '', '', '', '', '0000-00-00 00:00:00', '', NULL, '', 0, 0, NULL, NULL, NULL, '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 3, 1, '', '', '', 0, '', NULL, '2016-10-27 17:15:13', '2016-10-28 17:44:56', 0),
(5, 6, '', '', '', '', '0000-00-00 00:00:00', '', NULL, '', 0, 0, NULL, NULL, NULL, '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, 0, '', '', '', 0, '', NULL, '2016-10-27 17:17:19', '2016-10-28 17:52:44', 0),
(6, 7, 'sekars', 'Farmers', 'sankaris', 'house wifes', '0000-00-00 00:00:00', 'No 12 bajanai kloil streets', NULL, 'cheenais', 0, 2147483647, 2147483647, 2147483647, NULL, '998989897', 'Indian banks', 'IB00587', 'kalavai', 'nithiya nandams', '0000-00-00 00:00:00', 'venkatis', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cards', 'second score cards', 'third score cards', 9, '', NULL, '2016-10-28 16:04:45', '2016-10-28 18:28:55', 0),
(7, 8, 'sekar', 'Farmer', 'sankari', 'house wife', '0000-00-00 00:00:00', 'No 12 bajanai kloil street', NULL, 'cheenai', 0, 2147483647, 2147483647, 2147483647, NULL, '99898989', 'Indian bank', 'IB0058', 'kalavai', 'nithiya nandam', '0000-00-00 00:00:00', 'venkati', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cards', 'second score cards', 'third score cards', 1, '', NULL, '2016-10-28 15:22:47', '2016-10-28 15:22:47', 1),
(8, 9, 'sekar', 'Farmer', 'sankari', 'house wife', '0000-00-00 00:00:00', 'No 12 bajanai kloil street', NULL, 'cheenai', 0, 2147483647, 2147483647, 2147483647, NULL, '99898989', 'Indian bank', 'IB0058', 'kalavai', 'nithiya nandam', '0000-00-00 00:00:00', 'venkati', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cards', 'second score cards', 'third score cards', 1, '', NULL, '2016-10-28 15:26:35', '2016-10-28 18:29:02', 0),
(9, 10, 'sekar', 'Farmer', 'sankari', 'house wife', '0000-00-00 00:00:00', 'No 12 bajanai kloil street', NULL, 'cheenai', 0, 2147483647, 2147483647, 2147483647, NULL, '99898989', 'Indian bank', 'IB0058', 'kalavai', 'nithiya nandam', '0000-00-00 00:00:00', 'venkati', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cards', 'second score cards', 'third score cards', 1, '', NULL, '2016-10-28 15:54:12', '2016-10-28 18:29:08', 0),
(10, 11, 'sekar', 'Farmer', 'sankari', 'house wife', '0000-00-00 00:00:00', 'No 12 bajanai kloil street', NULL, 'cheenai', 0, 2147483647, 2147483647, 2147483647, NULL, '99898989', 'Indian bank', 'IB0058', 'kalavai', 'nithiya nandam', '0000-00-00 00:00:00', 'venkati', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cards', 'second score cards', 'third score cards', 1, '', NULL, '2016-10-28 15:55:24', '2016-10-28 18:29:12', 0),
(11, 12, 'sekar', 'Farmer', 'sankari', 'house wife', '0000-00-00 00:00:00', 'No 12 bajanai kloil street', NULL, 'cheenai', 0, 2147483647, 2147483647, 2147483647, NULL, '99898989', 'Indian bank', 'IB0058', 'kalavai', 'nithiya nandam', '0000-00-00 00:00:00', 'venkati', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cards', 'second score cards', 'third score cards', 1, '', NULL, '2016-10-28 15:57:04', '2016-10-28 18:29:15', 0),
(12, 13, 'sekar', 'Farmer', 'sankari', 'house wife', '0000-00-00 00:00:00', 'No 12 bajanai kloil street', NULL, 'cheenai', 0, 2147483647, 2147483647, 2147483647, NULL, '99898989', 'Indian bank', 'IB0058', 'kalavai', 'nithiya nandam', '0000-00-00 00:00:00', 'venkati', '0000-00-00 00:00:00', 'Government higher secondary school', 0, 0, 'first score cards', 'second score cards', 'third score cards', 1, '', NULL, '2016-10-28 15:57:49', '2016-10-28 18:29:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE IF NOT EXISTS `student_subject` (
  `student_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(2) DEFAULT NULL,
  `student_info_id` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`student_subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`student_subject_id`, `subject_id`, `student_info_id`, `date_added`, `updated_by`, `last_modified`, `status`) VALUES
(1, 1, 1, '2016-10-28 16:00:03', 0, '2016-10-28 18:28:59', 0),
(2, 1, 1, '2016-10-27 16:35:04', 0, '2016-10-27 16:35:04', 1),
(3, 1, 2, '2016-10-27 16:36:24', 0, '2016-10-27 16:36:24', 1),
(4, 0, 3, '2016-10-27 17:11:34', 0, '2016-10-28 17:43:44', 0),
(5, 0, 4, '2016-10-27 17:15:13', 0, '2016-10-28 17:44:56', 0),
(6, NULL, 0, '2016-10-27 17:15:15', 0, '2016-10-27 17:15:15', 1),
(7, 0, 5, '2016-10-27 17:17:19', 0, '2016-10-28 17:52:44', 0),
(8, NULL, 0, '2016-10-28 14:16:42', 0, '2016-10-28 14:16:42', 1),
(9, 9, 6, '2016-10-28 16:04:45', 0, '2016-10-28 18:28:55', 0),
(10, 1, 7, '2016-10-28 15:22:47', 0, '2016-10-28 15:22:47', 1),
(11, NULL, 0, '2016-10-28 15:22:49', 0, '2016-10-28 15:22:49', 1),
(12, NULL, 0, '2016-10-28 15:26:18', 0, '2016-10-28 15:26:18', 1),
(13, 1, 8, '2016-10-28 15:26:35', 0, '2016-10-28 18:29:02', 0),
(14, 1, 9, '2016-10-28 15:54:12', 0, '2016-10-28 18:29:08', 0),
(15, 1, 10, '2016-10-28 15:55:24', 0, '2016-10-28 18:29:12', 0),
(16, 1, 11, '2016-10-28 15:57:04', 0, '2016-10-28 18:29:15', 0),
(17, 1, 12, '2016-10-28 15:57:49', 0, '2016-10-28 18:29:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(2) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `grading_id` int(2) NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `fk_subject_grading_id_idx` (`grading_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
  `syllabus_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(2) NOT NULL,
  `class_id` int(2) DEFAULT NULL,
  `lang_id` int(2) DEFAULT NULL,
  `lesson_id` int(2) DEFAULT NULL,
  `lesson_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syllabus_topic_id` int(11) DEFAULT NULL,
  `mark_lesson` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last-modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`syllabus_id`),
  KEY `fk_syllabus_subject_id_idx` (`subject_id`),
  KEY `fk_sysllabus_class_id_idx` (`class_id`),
  KEY `fk_sysllabus_topic_id_idx` (`syllabus_topic_id`),
  KEY `fk_sysllabus_lang_id_idx` (`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_topic`
--

CREATE TABLE IF NOT EXISTS `syllabus_topic` (
  `syllabus_topic_id` int(11) NOT NULL,
  `topic_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `satus` int(1) NOT NULL,
  PRIMARY KEY (`syllabus_topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classes`
--

CREATE TABLE IF NOT EXISTS `teacher_classes` (
  `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `teacher_info_id` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`teacher_class_id`),
  KEY `fk_teacher_classes_teacher_info_id_idx` (`teacher_info_id`),
  KEY `fk_teacher_classes_class_id_idx` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teacher_classes`
--

INSERT INTO `teacher_classes` (`teacher_class_id`, `class_id`, `teacher_info_id`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 1, 1, 0, '2016-11-02 15:16:15', '2016-11-02 19:04:51', 1),
(2, 2, 1, 0, '2016-11-02 15:16:15', '2016-11-02 19:04:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE IF NOT EXISTS `teacher_info` (
  `teacher_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_info_id` int(11) NOT NULL,
  `address_line_1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `first_contact_number` int(11) DEFAULT NULL,
  `second_contact_number` int(11) DEFAULT NULL,
  `third_contact_number` int(11) DEFAULT NULL,
  `photo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bracnh_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_room` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `current_school_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_school_joining_date` datetime DEFAULT NULL,
  `current_school_to_date` datetime DEFAULT NULL,
  `previous_school_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `previous_school_joining_date` datetime DEFAULT NULL,
  `previous_school_to_date` datetime DEFAULT NULL,
  `remarks` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`teacher_info_id`),
  KEY `fk_teacher_info_user_info_id_idx` (`user_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_info_id`, `user_info_id`, `address_line_1`, `address_line_2`, `city`, `state`, `country`, `first_contact_number`, `second_contact_number`, `third_contact_number`, `photo`, `bank_account_number`, `bank_name`, `ifsc_code`, `bracnh_name`, `class_room`, `date_of_birth`, `current_school_name`, `current_school_joining_date`, `current_school_to_date`, `previous_school_name`, `previous_school_joining_date`, `previous_school_to_date`, `remarks`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 14, 'No 12 bajanai koil street', NULL, 'chennai', 0, NULL, 2147483647, 2147483647, 2147483647, NULL, '98789789789789', 'Indian bank', 'IB1001', 'kalavai', 'first roo,', '2020-06-21 06:00:00', 'nallure government elementary school', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vadamanappakkam', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sfdfsfsdfsdfsd', 0, '2016-11-02 15:16:15', '2016-11-02 19:04:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_qualification`
--

CREATE TABLE IF NOT EXISTS `teacher_qualification` (
  `teacher_qualification_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_info_id` int(11) NOT NULL,
  `qualification_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`teacher_qualification_id`),
  KEY `fk_teacher_qualification_teacher_info_id_idx` (`teacher_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher_qualification`
--

INSERT INTO `teacher_qualification` (`teacher_qualification_id`, `teacher_info_id`, `qualification_name`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 1, 'B.com Commerce', 0, '2016-11-02 15:16:15', '2016-11-02 19:04:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(2) NOT NULL,
  `answer` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `know_about` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_pass_change` datetime NOT NULL,
  `last_login_date` datetime NOT NULL,
  `login_expire_date` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_info_id`, `first_name`, `last_name`, `email_id`, `login_id`, `password`, `question_id`, `answer`, `know_about`, `last_pass_change`, `last_login_date`, `login_expire_date`, `updated_by`, `date_added`, `last_modified`, `status`) VALUES
(1, 'raman', 'venkat', 'venkatsekara@gmail.com', '', '456321', 0, 'this is my answer', 'sdfsdfsdf', '2016-10-27 16:30:50', '2016-10-27 16:30:50', '2016-10-27 16:30:50', 0, '2016-10-27 16:30:50', '2016-10-27 16:30:50', 1),
(2, 'ramans', 'venkats', 'venkatsekara@gmail.coms', 'sss', '456321s', 0, 'this is my answers', '', '2016-10-28 16:00:03', '2016-10-28 16:00:03', '2016-10-28 16:00:03', 0, '2016-10-28 16:00:03', '2016-10-28 18:28:59', 0),
(3, 'raman', 'venkat', 'venkatsekara@gmail.com', '', '456321', 0, 'this is my answer', 'sdfsdfsdf', '2016-10-27 16:36:24', '2016-10-27 16:36:24', '2016-10-27 16:36:24', 0, '2016-10-27 16:36:24', '2016-10-27 16:36:24', 1),
(4, '', '', 'ddd', '', 'ddd', 0, '', '', '2016-10-27 17:11:34', '2016-10-27 17:11:34', '2016-10-27 17:11:34', 0, '2016-10-27 17:11:34', '2016-10-28 17:43:44', 0),
(5, '', '', 'ddd', '', 'ddd', 0, '', '', '2016-10-27 17:15:13', '2016-10-27 17:15:13', '2016-10-27 17:15:13', 0, '2016-10-27 17:15:13', '2016-10-28 17:44:56', 0),
(6, '', '', 'dfd', '', 'ddd', 0, '', '', '2016-10-27 17:17:19', '2016-10-27 17:17:19', '2016-10-27 17:17:19', 0, '2016-10-27 17:17:19', '2016-10-28 17:52:44', 0),
(7, 'ramans', 'venkats', 'venkatsekaras@gmail.com', 'sssss', '456321', 0, 'this is my answers', '', '2016-10-28 16:04:45', '2016-10-28 16:04:45', '2016-10-28 16:04:45', 0, '2016-10-28 16:04:45', '2016-10-28 18:28:55', 0),
(8, 'raman', 'venkat', 'venkatsekara@gmail.com', 'sss', '456321', 0, 'this is my answer', '', '2016-10-28 15:22:47', '2016-10-28 15:22:47', '2016-10-28 15:22:47', 0, '2016-10-28 15:22:47', '2016-10-28 15:22:47', 1),
(9, 'raman', 'venkat', 'venkatsekara@gmail.com', 'sss', '456321', 0, 'this is my answer', '', '2016-10-28 15:26:35', '2016-10-28 15:26:35', '2016-10-28 15:26:35', 0, '2016-10-28 15:26:35', '2016-10-28 18:29:02', 0),
(10, 'raman', 'venkat', 'venkatsekara@gmail.com', 'sss', '456321', 0, 'this is my answer', '', '2016-10-28 15:54:12', '2016-10-28 15:54:12', '2016-10-28 15:54:12', 0, '2016-10-28 15:54:12', '2016-10-28 18:29:08', 0),
(11, 'raman', 'venkat', 'venkatsekara@gmail.com', 'ddd', '456321', 0, 'this is my answer', '', '2016-10-28 15:55:24', '2016-10-28 15:55:24', '2016-10-28 15:55:24', 0, '2016-10-28 15:55:24', '2016-10-28 18:29:12', 0),
(12, 'raman', 'venkat', 'venkatsekara@gmail.com', 'ddd', '456321', 0, 'this is my answer', '', '2016-10-28 15:57:04', '2016-10-28 15:57:04', '2016-10-28 15:57:04', 0, '2016-10-28 15:57:04', '2016-10-28 18:29:15', 0),
(13, 'raman', 'venkat', 'venkatsekara@gmail.com', 'ddd', '456321', 0, 'this is my answer', '', '2016-10-28 15:57:49', '2016-10-28 15:57:49', '2016-10-28 15:57:49', 0, '2016-10-28 15:57:49', '2016-10-28 18:29:17', 0),
(14, 'sathyas', 'narayanans', 'sathya@gmails.com', 'sathya narayanans', 'sathyas', 0, 'this is my firstss ', '', '2016-11-02 18:41:48', '2016-11-02 18:41:48', '2016-11-02 18:41:48', 0, '2016-11-02 18:41:48', '2016-11-02 19:04:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_info_id` int(11) NOT NULL,
  `role_id` int(2) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_role_id`),
  KEY `fk_user_role_role_id_idx` (`role_id`),
  KEY `fk_user_info_user_info_id_idx` (`user_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `fk_board_school_board_id` FOREIGN KEY (`school_board_id`) REFERENCES `school_boards` (`school_board_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_board_school_sub_board_id` FOREIGN KEY (`school_sub_board_id`) REFERENCES `school_sub_board` (`school_sub_board_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module_lesson`
--
ALTER TABLE `module_lesson`
  ADD CONSTRAINT `fk_module_lesson_preparation_module_id` FOREIGN KEY (`preparation_module_id`) REFERENCES `preparation_module` (`preparation_module_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module_lesson_topic`
--
ALTER TABLE `module_lesson_topic`
  ADD CONSTRAINT `fk_module_lesson_topic_module_lesson_id` FOREIGN KEY (`module_lesson_id`) REFERENCES `module_lesson` (`module_lesson_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `preparation_module`
--
ALTER TABLE `preparation_module`
  ADD CONSTRAINT `fk_preparation_module_class_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_preparation_module_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `roles_pages`
--
ALTER TABLE `roles_pages`
  ADD CONSTRAINT `fk_roles_pages_page_id` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roles_pages_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_sub_board`
--
ALTER TABLE `school_sub_board`
  ADD CONSTRAINT `fk_school_sub_board_school_board_id` FOREIGN KEY (`school_board_id`) REFERENCES `school_boards` (`school_board_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `fk_student_info_student_subject_info_id` FOREIGN KEY (`student_info_id`) REFERENCES `student_subject` (`student_subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_info_user_info_id` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`user_info_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_subject_grading_id` FOREIGN KEY (`grading_id`) REFERENCES `grading_system` (`grading_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD CONSTRAINT `fk_syllabus_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sysllabus_class_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sysllabus_lang_id` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sysllabus_topic_id` FOREIGN KEY (`syllabus_topic_id`) REFERENCES `syllabus_topic` (`syllabus_topic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD CONSTRAINT `fk_teacher_classes_class_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_classes_teacher_info_id` FOREIGN KEY (`teacher_info_id`) REFERENCES `teacher_info` (`teacher_info_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD CONSTRAINT `fk_teacher_info_user_info_id` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`user_info_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_qualification`
--
ALTER TABLE `teacher_qualification`
  ADD CONSTRAINT `fk_teacher_qualification_teacher_info_id` FOREIGN KEY (`teacher_info_id`) REFERENCES `teacher_info` (`teacher_info_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_user_info_user_info_id` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`user_info_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_role_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
