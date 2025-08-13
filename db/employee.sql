-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2023 at 04:28 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `circulars`
--

DROP TABLE IF EXISTS `circulars`;
CREATE TABLE IF NOT EXISTS `circulars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date1` varchar(150) NOT NULL,
  `image` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `text` varchar(180) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circulars`
--

INSERT INTO `circulars` (`id`, `date1`, `image`, `text`) VALUES
(178, '2023-06-19', '2023-06-19 _ ST0073.jpg', 'Welcome you all the graduation function of the batch 2016-2020 held at 9AM in VPMM Engineering College For Woman!'),
(179, '2023-06-19', '2023-06-19 _ ST0090.jpg', 'Welcome!');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

DROP TABLE IF EXISTS `employee_attendance`;
CREATE TABLE IF NOT EXISTS `employee_attendance` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `m_attendance` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'A',
  `timing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_status` int DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=445 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`a_id`, `name`, `m_attendance`, `timing`, `approved_status`) VALUES
(444, 'Shanthi Narain', 'P', '2023-07-21 11:52:21', 0),
(438, '', 'A', '2023-07-09 16:44:11', 0),
(439, 'Shanthi Narain', 'A', '2023-07-09 16:53:44', 2),
(440, 'Raj Kumar', 'A', '2023-07-09 16:54:18', 1),
(441, 'Gughan Subramani', 'P', '2023-07-09 16:54:36', 1),
(442, 'Raj Kumar', 'A', '2023-07-13 10:29:25', 0),
(443, 'Shanthi Narain', 'A', '2023-07-13 12:23:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

DROP TABLE IF EXISTS `employee_details`;
CREATE TABLE IF NOT EXISTS `employee_details` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `dob` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `supervisor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `designation` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `photo_path` varchar(300) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `salary` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `eff_date` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`e_id`, `name`, `email`, `mobile`, `dob`, `pan`, `address`, `location`, `supervisor`, `designation`, `photo_path`, `status`, `salary`, `role`, `eff_date`) VALUES
(52, 'Shanthi Narain', 'shanthi@gmail.com', '9988765544', '1999-02-02', 'ALWPG5809L', '30 C,NagarKovil Street,Trichy-620001,TN,IN', 'Bangalore', 'Raj Kumar', 'Developer', 'Shanthi.jpg', 1, '30000,45000', 'Employee', '2023-07-26,2023-07-31'),
(51, 'Raj Kumar', 'rastapathi3737@gmail.com', '8665735735', '1999-03-01', 'ABCTY1234D', '67 C, CChinnakadai Street, Madurai-625601, Tamilnadu, India', 'Bangalore', 'Partha Thiyagu', 'Manager', 'ethetj', 1, '50000', 'S-Employee', NULL),
(50, 'Gughan Subramani', 'sirtpa@gmail.com', '9576453453', '2023-08-01', 'ABCTY1234D', '60 C ,Kon Palayam,Pattukottai-635463,KA,IN', 'Chennai', 'Karthika Velan', 'Analyst', 'Gughan.jpg', 1, '25000', 'Employee', NULL),
(61, 'Karthika Velan', 'Karunicka7012001@gmail.com', '9988765544', '1996-07-21', 'ALWPG5809L', '30 C,NagarKovil Street,Trichy-620001,TN,IN', 'Bangalore', 'Raj Kumar', 'Senior Test Engineer', 'Karthika.jpg', 1, '50000', 'S-Employee', NULL),
(62, 'Partha Thiyagu', 'tparthasatathi2266@gmail.com', '9988766544', '1992-06-09', 'ALWPG5909L', '60 C,NedumaraKovil Street,Trunelvei-625086,TN,IN', 'Cheenai', 'Karthika Velan', 'Assistant Manager', 'Partha.jpg', 1, '50000,75000', 'S-Employee', '2023-07-01,2023-08-01'),
(72, NULL, 'parth55a@gmail.com', NULL, '', NULL, NULL, NULL, 'Raj Kumar', 'Analyst', NULL, 1, '35600', 'Employee', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

DROP TABLE IF EXISTS `leave_request`;
CREATE TABLE IF NOT EXISTS `leave_request` (
  `sl_id` int NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(5) DEFAULT NULL,
  `name` varchar(155) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `from_date` varchar(15) DEFAULT NULL,
  `to_date` varchar(15) DEFAULT NULL,
  `approved_status` int DEFAULT '0',
  `reason` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`sl_id`, `leave_type`, `name`, `from_date`, `to_date`, `approved_status`, `reason`) VALUES
(38, 'SL', 'Shanthi Narain', '21-07-2023', '29-07-2023', 1, 'Function'),
(37, 'SL', 'Shanthi Narain', '12-07-2023', '14-07-2023', 1, 'Health issue'),
(36, 'AL', 'Raj Kumar', '05-08-2023', '', 1, 'Physical Illness'),
(35, 'AL', 'Raj Kumar', '05-08-2023', '', 0, 'Parents meeting'),
(33, 'SL', 'Raj Kumar', '12-07-2023', '29-07-2023', 0, 'Graduation function'),
(29, 'SL', 'Shanthi Narain', '19-07-2023', '', 1, 'UPSC exam'),
(30, 'AL', 'Shanthi Narain', '30-07-2023', '02-08-2023', 1, 'Personal work'),
(31, 'SL', 'Gughan Subramani', '16-07-2023', '17-07-2023', 0, 'Daughter\'s marriage'),
(32, 'AL', 'Gughan Subramani', '20-07-2023', '', 0, 'Son\'s Engagement'),
(45, 'SL', 'Raj Kumar', '2023-07-02', '2023-07-02', 1, 'Personal Work'),
(46, 'SL', 'Shanthi Narain', '2023-07-31', '2023-08-02', 1, 'Health issue');

-- --------------------------------------------------------

--
-- Table structure for table `pay_slip`
--

DROP TABLE IF EXISTS `pay_slip`;
CREATE TABLE IF NOT EXISTS `pay_slip` (
  `ps_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int NOT NULL,
  `generated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_slip`
--

INSERT INTO `pay_slip` (`ps_id`, `name`, `supervisor`, `salary`, `generated_at`, `status`, `designation`, `date1`) VALUES
(1, 'Shanthi Narain', 'Raj Kumar', 30000, '2023-06-26 06:45:49', 1, 'Developer', '2023-07-26'),
(2, 'Raj Kumar', 'Partha Thiyagu', 50000, '2023-06-26 06:45:49', 1, 'Manager', '2023-07-26'),
(3, 'Gughan Subramani', 'Karthika Velan', 25000, '2023-06-26 06:45:49', 1, 'Analyst', '2023-07-26'),
(4, 'Karthika Velan', 'Raj Kumar', 50000, '2023-06-26 06:45:49', 1, 'Senior Test Engineer', '2023-07-26'),
(5, 'Partha Thiyagu', 'Karthika Velan', 75000, '2023-06-26 06:45:49', 1, 'Assistant Manager', '2023-07-26'),
(19, 'Karthika Velan', 'Raj Kumar', 50000, '2023-04-26 07:03:41', 1, 'Senior Test Engineer', '2023-07-26'),
(18, 'Gughan Subramani', 'Karthika Velan', 25000, '2023-04-26 07:03:41', 1, 'Analyst', '2023-07-26'),
(17, 'Raj Kumar', 'Partha Thiyagu', 50000, '2023-04-26 07:03:41', 1, 'Manager', '2023-07-26'),
(16, 'Shanthi Narain', 'Raj Kumar', 30000, '2023-07-16 07:03:41', 1, 'Developer', '2023-07-16'),
(11, 'Shanthi Narain', 'Raj Kumar', 30000, '2023-04-26 07:00:05', 1, 'Developer', '2023-07-26'),
(12, 'Raj Kumar', 'Partha Thiyagu', 50000, '2023-05-26 07:00:05', 1, 'Manager', '2023-07-26'),
(13, 'Gughan Subramani', 'Karthika Velan', 25000, '2023-05-26 07:00:05', 1, 'Analyst', '2023-07-26'),
(14, 'Karthika Velan', 'Raj Kumar', 50000, '2023-05-26 07:00:05', 1, 'Senior Test Engineer', '2023-07-26'),
(15, 'Partha Thiyagu', 'Karthika Velan', 75000, '2023-05-26 07:00:05', 1, 'Assistant Manager', '2023-07-26'),
(20, 'Partha Thiyagu', 'Karthika Velan', 75000, '2023-04-26 07:03:41', 1, 'Assistant Manager', '2023-07-26'),
(21, 'Shanthi Narain', 'Raj Kumar', 30000, '2023-05-26 10:44:37', 1, 'Developer', '2023-07-26'),
(22, 'Raj Kumar', 'Partha Thiyagu', 50000, '2023-07-16 10:44:37', 1, 'Manager', '2023-07-16'),
(23, 'Gughan Subramani', 'Karthika Velan', 25000, '2023-07-16 10:44:37', 1, 'Analyst', '2023-07-16'),
(24, 'Karthika Velan', 'Raj Kumar', 50000, '2023-07-16 10:44:37', 1, 'Senior Test Engineer', '2023-07-16'),
(25, 'Partha Thiyagu', 'Karthika Velan', 75000, '2023-07-16 10:44:37', 1, 'Assistant Manager', '2023-07-16'),
(34, 'Karthika Velan', 'Raj Kumar', 50000, '2023-08-01 13:41:51', 1, 'Senior Test Engineer', '2023-08-01'),
(33, 'Gughan Subramani', 'Karthika Velan', 25000, '2023-08-01 13:41:51', 1, 'Analyst', '2023-08-01'),
(32, 'Raj Kumar', 'Partha Thiyagu', 50000, '2023-08-01 13:41:51', 1, 'Manager', '2023-08-01'),
(31, 'Shanthi Narain', 'Raj Kumar', 45000, '2023-08-01 13:41:51', 1, 'Developer', '2023-08-01'),
(35, 'Partha Thiyagu', 'Karthika Velan', 75000, '2023-08-01 13:41:51', 1, 'Assistant Manager', '2023-08-01'),
(36, 'Shanthi Narain', 'Raj Kumar', 45000, '2023-08-01 16:05:35', 1, 'Developer', '2023-08-08'),
(37, 'Raj Kumar', 'Partha Thiyagu', 50000, '2023-08-01 16:05:35', 1, 'Manager', '2023-08-08'),
(38, 'Gughan Subramani', 'Karthika Velan', 25000, '2023-08-01 16:05:35', 1, 'Analyst', '2023-08-08'),
(39, 'Karthika Velan', 'Raj Kumar', 50000, '2023-08-01 16:05:35', 1, 'Senior Test Engineer', '2023-08-08'),
(40, 'Partha Thiyagu', 'Karthika Velan', 75000, '2023-08-01 16:05:35', 1, 'Assistant Manager', '2023-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `project_allocation`
--

DROP TABLE IF EXISTS `project_allocation`;
CREATE TABLE IF NOT EXISTS `project_allocation` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `prj_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `s_date` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `e_date` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `approved_status` int DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_allocation`
--

INSERT INTO `project_allocation` (`p_id`, `prj_name`, `s_date`, `e_date`, `name`, `status`, `approved_status`) VALUES
(174, 'KRP Automation', '2023-06-25', '2023-08-30', 'Gughan Subramani', '0', 1),
(176, 'GenAI Management', '2023-07-10', '2023-10-11', 'Gughan Subramani', '1', 0),
(177, 'Finance', '2023-06-25', '2023-09-20', 'Shanthi Narain', '1', 1),
(179, 'Billing Software', '2023-06-25', '2023-07-28', 'Gughan Subramani', '1', 2),
(185, 'Electricals Billing', '2023-06-25', '2023-08-19', 'Raj Kumar', '1', 0),
(186, 'Construction software', '2023-06-25', '2023-08-19', 'Karthika Velan', '1', 0),
(187, 'Employee portal', '2023-08-01', '2023-10-14', 'Shanthi Narain', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

DROP TABLE IF EXISTS `timesheet`;
CREATE TABLE IF NOT EXISTS `timesheet` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day3` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day4` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day5` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  
  `prj1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prj2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prj3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a1` int NOT NULL,
  `b1` int NOT NULL,
  `c1` int NOT NULL,
  `d1` int NOT NULL,
  `e1` int NOT NULL,
  `a2` int NOT NULL,
  `b2` int NOT NULL,
  `c2` int NOT NULL,
  `d2` int NOT NULL,
  `e2` int NOT NULL,
  `a3` int NOT NULL,
  `b3` int NOT NULL,
  `c3` int NOT NULL,
  `d3` int NOT NULL,
  `e3` int NOT NULL,
  `a4` int NOT NULL,
  `b4` int NOT NULL,
  `c4` int NOT NULL,
  `d4` int NOT NULL,
  `e4` int NOT NULL,
  `total_hrs` int NOT NULL,
  `approved_status` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`t_id`, `name`, `supervisor`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `prj1`, `prj2`, `prj3`, `a1`, `b1`, `c1`, `d1`, `e1`, `a2`, `b2`, `c2`, `d2`, `e2`, `a3`, `b3`, `c3`, `d3`, `e3`, `a4`, `b4`, `c4`, `d4`, `e4`, `total_hrs`, `approved_status`, `status`) VALUES
(60, 'Shanthi Narain', 'Raj Kumar', '2023-07-17 ', '2023-07-25 ', '2023-07-26 ', '2023-07-27 ', '2023-07-28 ', '2023-07-29 ', 'Finance', 'dgqrgh', 'Employee portal', 2, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 2, 2, 15, 1, 2),
(65, 'Gughan Subramani', 'Karthika Velan', '2023-07-24 ', '2023-07-25 ', '2023-07-26 ', '2023-07-27 ', '2023-07-28 ', '2023-07-29 ', 'KRP Automation', 'GenAI Management', 'Billing Software', 2, 2, 2, 2, 0, 2, 2, 2, 2, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 8, 1, 2),
(67, 'Shanthi Narain', 'Raj Kumar', '2023-07-10 ', '2023-07-11 ', '2023-07-12 ', '2023-07-13 ', '2023-07-14 ', '2023-07-15 ', 'Finance', 'dgqrgh', 'Employee portal', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 6, 1, 2),
(74, 'Shanthi Narain', 'Raj Kumar', '2023-12-26 ', '2023-12-27 ', '2023-12-28 ', '2023-12-29 ', '2023-12-30 ', '2023-12-31 ', 'Finance', 'Employee portal', '', 3, 3, 3, 3, 3, 3, 3, 3, 6, 0, 0, 0, 0, 0, 0, 6, 6, 6, 9, 3, 30, 0, 2),
(62, 'Raj Kumar', 'Partha Thiyagu', '2023-07-24', '2023-12-27 ', '2023-12-28 ', '2023-12-29 ', '2023-12-30 ', '2023-12-31 ', 'Electricals Billing', '', '', 2, 6, 4, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 4, 5, 3, 20, 1, 2),
(63, 'Karthika Velan', 'Raj Kumar', '2023-07-24', '2023-07-18 ', '2023-07-19 ', '2023-07-20 ', '2023-07-21 ', '2023-07-22 ', 'Construction software', '', '', 2, 6, 5, 54, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6, 5, 5, 2, 69, 1, 2),
(66, 'Shanthi Narain', 'Raj Kumar', '2023-07-03 ', '2023-07-04 ', '2023-07-05 ', '2023-07-06 ', '2023-07-07 ', '2023-07-08 ', 'Finance', 'dgqrgh', 'Employee portal', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 4, 1, 1, 1, 6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `name`) VALUES
(1, 'admin@gmail.com', 'rootadmin1', 'Admin', NULL),
(59, 'sirtpa@gmail.com', '4567uytr', 'Employee', 'Gughan Subramani'),
(60, 'rastapathi3737@gmail.com', '45735737', 'S-Employee', 'Raj Kumar'),
(61, 'shanthi@gmail.com', 'abcdefgh', 'Employee', 'Shanthi Narain'),
(71, 'Karunicka7012001@gmail.com', '3547fgvj', 'S-Employee', 'Karthika Velan'),
(72, 'tparthasatathi2266@gmail.com', 'qwer4321', 'S-Employee', 'Partha Thiyagu'),
(81, 'parth55a@gmail.com', '376487698', 'Employee', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
