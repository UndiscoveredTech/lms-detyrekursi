-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2022 at 09:37 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luarasi-lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` text NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `course` varchar(25) NOT NULL,
  `register_no` varchar(15) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `regdate`, `first_name`, `last_name`, `gender`, `course`, `register_no`, `phno`, `email`, `photo`, `username`, `password`, `status`) VALUES
(1, '30/04/2016', 'VINAY', 'S M', 'MALE', 'MCA', '15MCAL58', '9945543108', 'vinaysmgowda@gmail.com', 'IMG_20160409_094423.jpg', 'vinay', 'gowda', 'accept'),
(2, '24/02/2022', 'Albin', 'Cani', 'MALE', 'MCA', '123', '0699974016', 'albincani@gmail.com', '', 'a', 'a', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'USER'),
(3, 'SIMPLE');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

DROP TABLE IF EXISTS `subject_master`;
CREATE TABLE IF NOT EXISTS `subject_master` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`sub_id`, `subject`, `logo`) VALUES
(2, 'JAVA', 'Desert.jpg'),
(3, 'JAVA', 'Desert.jpg'),
(1, 'javascript', 'pafoto');

-- --------------------------------------------------------

--
-- Table structure for table `system_permissions`
--

DROP TABLE IF EXISTS `system_permissions`;
CREATE TABLE IF NOT EXISTS `system_permissions` (
  `permission_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_permissions`
--

INSERT INTO `system_permissions` (`permission_id`, `permission_name`) VALUES
(1, 'CREATE'),
(2, 'EDIT'),
(3, 'DELETE'),
(4, 'LIST');

-- --------------------------------------------------------

--
-- Table structure for table `system_permission_to_roles`
--

DROP TABLE IF EXISTS `system_permission_to_roles`;
CREATE TABLE IF NOT EXISTS `system_permission_to_roles` (
  `ref_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) DEFAULT NULL,
  `permission_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_permission_to_roles`
--

INSERT INTO `system_permission_to_roles` (`ref_id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `system_users_to_roles`
--

DROP TABLE IF EXISTS `system_users_to_roles`;
CREATE TABLE IF NOT EXISTS `system_users_to_roles` (
  `ref_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_users_to_roles`
--

INSERT INTO `system_users_to_roles` (`ref_id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes_details`
--

DROP TABLE IF EXISTS `tbl_notes_details`;
CREATE TABLE IF NOT EXISTS `tbl_notes_details` (
  `notes_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` text NOT NULL,
  `subject` text NOT NULL,
  `topic` text NOT NULL,
  `date` text NOT NULL,
  `notes` text NOT NULL,
  `video` text NOT NULL,
  `summary` text NOT NULL,
  PRIMARY KEY (`notes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notes_details`
--

INSERT INTO `tbl_notes_details` (`notes_id`, `course`, `subject`, `topic`, `date`, `notes`, `video`, `summary`) VALUES
(7, 'MCA', 'JAVA', 'INTRODUCTION', '30/04/2016', 'os_linux.pdf', 'bomb.mp4', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
