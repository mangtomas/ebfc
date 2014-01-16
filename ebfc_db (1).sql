-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2014 at 08:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebfc_db`
--
CREATE DATABASE IF NOT EXISTS `ebfc_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ebfc_db`;

-- --------------------------------------------------------

--
-- Table structure for table `_dtr`
--

CREATE TABLE IF NOT EXISTS `_dtr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(4) NOT NULL,
  `_in` time NOT NULL,
  `_out` time NOT NULL,
  `_date` date NOT NULL,
  `p_status` tinyint(1) NOT NULL,
  `isOut` tinyint(1) NOT NULL,
  `isAbsent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `_dtr`
--

INSERT INTO `_dtr` (`id`, `users_id`, `_in`, `_out`, `_date`, `p_status`, `isOut`, `isAbsent`) VALUES
(31, 47, '07:27:02', '10:46:21', '2013-10-07', 1, 1, 1),
(32, 44, '07:28:26', '14:05:43', '2013-10-07', 1, 0, 1),
(33, 45, '13:29:19', '10:31:38', '2013-10-07', 1, 1, 1),
(34, 46, '07:30:37', '14:00:00', '2013-10-07', 1, 0, 1),
(35, 42, '13:53:19', '07:53:25', '2013-10-07', 1, 0, 1),
(36, 51, '08:42:21', '00:00:00', '2013-10-07', 1, 0, 1),
(37, 50, '08:43:31', '00:00:00', '2013-10-07', 1, 0, 1),
(38, 47, '18:19:13', '18:19:25', '2013-10-16', 0, 1, 0),
(39, 47, '21:55:48', '00:00:00', '2013-10-16', 0, 0, 0),
(40, 47, '17:19:17', '17:27:56', '2014-01-14', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_ireport`
--

CREATE TABLE IF NOT EXISTS `_ireport` (
  `ireport_id` int(11) NOT NULL AUTO_INCREMENT,
  `dtr_id` int(11) NOT NULL,
  `file` varchar(254) NOT NULL,
  `date_submit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ireport_id`),
  KEY `dtr_id` (`dtr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1216 ;

--
-- Dumping data for table `_ireport`
--

INSERT INTO `_ireport` (`ireport_id`, `dtr_id`, `file`, `date_submit`, `status`) VALUES
(1215, 31, 'file_1381171479.docx', '2013-10-07 18:44:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_module`
--

CREATE TABLE IF NOT EXISTS `_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `back_end` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `_create` tinyint(1) NOT NULL,
  `_read` tinyint(1) NOT NULL,
  `_update` tinyint(1) NOT NULL,
  `_delete` tinyint(1) NOT NULL,
  `_export` tinyint(1) NOT NULL,
  `_print` tinyint(1) NOT NULL,
  `_sort` int(11) NOT NULL,
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `module` (`module`),
  KEY `reference_id` (`reference_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `_module`
--

INSERT INTO `_module` (`module_id`, `reference_id`, `module`, `url`, `back_end`, `status`, `_create`, `_read`, `_update`, `_delete`, `_export`, `_print`, `_sort`) VALUES
(1, 5, 'Modules', 'module', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 5, 'Labels', 'labels', 1, 1, 1, 1, 1, 1, 0, 0, 0),
(15, 5, 'Role', 'role', 1, 1, 1, 1, 1, 1, 0, 0, 0),
(16, 2, 'Suppliers', 'suppliers', 1, 1, 1, 1, 1, 1, 1, 1, 0),
(19, 5, 'Users', 'users', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(24, 2, 'Payroll', 'payroll', 0, 1, 1, 1, 1, 1, 1, 1, 0),
(25, 2, 'Daily Time Record', 'dtr', 0, 1, 1, 1, 1, 1, 1, 1, 0),
(26, 2, 'Employees', 'employees', 0, 1, 1, 1, 1, 1, 1, 1, 0),
(27, 2, 'Payslip', 'payslip', 0, 1, 0, 1, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_module_label`
--

CREATE TABLE IF NOT EXISTS `_module_label` (
  `label_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `_sort` int(11) NOT NULL,
  PRIMARY KEY (`label_id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `_module_label`
--

INSERT INTO `_module_label` (`label_id`, `label`, `_sort`) VALUES
(1, 'Home', 1),
(2, 'Manipulation', 5),
(3, 'Reports', 3),
(4, 'Print Request', 2),
(5, 'System Management', 4);

-- --------------------------------------------------------

--
-- Table structure for table `_payroll`
--

CREATE TABLE IF NOT EXISTS `_payroll` (
  `payroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(4) NOT NULL,
  `_date` date NOT NULL,
  `lates` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `total_rate_perday` float NOT NULL,
  `rates` double NOT NULL,
  PRIMARY KEY (`payroll_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `_payroll`
--

INSERT INTO `_payroll` (`payroll_id`, `users_id`, `_date`, `lates`, `total_hours`, `total_rate_perday`, `rates`) VALUES
(15, 44, '2013-10-07', '0:28', '7:6', 377, 54.14),
(16, 51, '2013-10-07', '1:42', '7:0', 372, 54.14),
(17, 50, '2013-10-07', '1:43', '7:0', 372, 54.14),
(18, 46, '2013-10-07', '0:30', '7:0', 372, 54.14),
(19, 47, '2013-10-07', '0:27', '6:32', 347, 54.14),
(20, 51, '2013-10-07', '1:42', '7:0', 372, 54.14),
(21, 44, '2013-10-07', '0:28', '7:6', 377, 54.14),
(22, 50, '2013-10-07', '1:43', '7:0', 372, 54.14),
(23, 46, '2013-10-07', '0:30', '7:0', 372, 54.14);

-- --------------------------------------------------------

--
-- Table structure for table `_permission`
--

CREATE TABLE IF NOT EXISTS `_permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `_create` tinyint(1) NOT NULL DEFAULT '0',
  `_update` tinyint(1) NOT NULL DEFAULT '0',
  `_delete` tinyint(1) NOT NULL DEFAULT '0',
  `_read` tinyint(1) NOT NULL DEFAULT '0',
  `_export` tinyint(1) NOT NULL DEFAULT '0',
  `_print` tinyint(1) NOT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `module_id` (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `_permission`
--

INSERT INTO `_permission` (`permission_id`, `module_id`, `role_id`, `_create`, `_update`, `_delete`, `_read`, `_export`, `_print`) VALUES
(1, 24, 2, 1, 1, 1, 1, 0, 0),
(2, 25, 2, 1, 1, 1, 1, 0, 0),
(3, 26, 2, 1, 1, 1, 1, 0, 0),
(4, 27, 2, 0, 0, 0, 1, 0, 0),
(5, 1, 2, 0, 0, 0, 0, 0, 0),
(6, 2, 2, 0, 0, 0, 0, 0, 0),
(7, 15, 2, 1, 1, 1, 0, 0, 0),
(8, 19, 2, 1, 1, 1, 0, 0, 0),
(10, 24, 1, 1, 1, 1, 1, 0, 0),
(12, 25, 1, 1, 1, 1, 1, 0, 0),
(13, 26, 1, 1, 1, 1, 1, 0, 0),
(14, 27, 1, 0, 0, 0, 1, 0, 0),
(15, 1, 1, 0, 0, 1, 1, 0, 0),
(16, 2, 1, 0, 0, 0, 0, 0, 0),
(17, 15, 1, 1, 1, 1, 1, 0, 0),
(18, 19, 1, 1, 1, 1, 1, 0, 0),
(19, 16, 7, 0, 0, 0, 0, 0, 0),
(20, 24, 7, 0, 0, 0, 0, 0, 0),
(21, 25, 7, 0, 0, 0, 0, 0, 0),
(22, 26, 7, 0, 0, 0, 0, 0, 0),
(23, 27, 7, 0, 0, 0, 1, 0, 0),
(24, 1, 7, 0, 0, 0, 0, 0, 0),
(25, 2, 7, 0, 0, 0, 0, 0, 0),
(26, 15, 7, 0, 0, 0, 0, 0, 0),
(27, 19, 7, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_role`
--

CREATE TABLE IF NOT EXISTS `_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `_role`
--

INSERT INTO `_role` (`role_id`, `role`, `status`) VALUES
(1, 'Boss', 1),
(2, 'Administrator', 1),
(3, 'Human Resource', 1),
(4, 'Accounting', 1),
(5, 'Employee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_users`
--

CREATE TABLE IF NOT EXISTS `_users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `employee_id` varchar(4) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(25) NOT NULL,
  `cv_stat` varchar(255) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `hire_date` varchar(254) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_registered` datetime DEFAULT NULL,
  `varKey` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `user_role_id` (`role_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `_users`
--

INSERT INTO `_users` (`users_id`, `role_id`, `employee_id`, `password`, `email_address`, `firstname`, `middlename`, `lastname`, `avatar`, `company_name`, `address`, `gender`, `cv_stat`, `contact_number`, `hire_date`, `mobile_number`, `rate`, `status`, `date_updated`, `date_registered`, `varKey`) VALUES
(1, 1, '0', 'j+0UEnnGMqJe+9XWJHsOz1ftr5xweRjE', 'king.marikudo@gmail.com', 'Red', 'Mariano', 'De Juan', 'avatar_1380478155.png', 'Crackerjack Startup', 'Peso Street CBE Quezon City', 'Male', 'Single', '987654321', '', '299611613', 0, 1, '2013-09-18 16:19:10', '2013-04-12 22:38:51', '1g1cSyV4HSfB'),
(2, 2, '0002', 'j+0UEnnGMqJe+9XWJHsOz1ftr5xweRjE', 'shirlymae.perez@localhost.com', 'Shirly Mae', '', 'Perez', 'avatar_1379835215.jpg', '', 'Eastern Blends Food Corporation', 'female', 'Single', '0987654321', '', '987654321', 1500, 1, '2013-09-30 01:48:21', '2013-09-28 15:56:47', '1g1cSyV4HSfB'),
(41, 7, '0041', 'sQ+dFJFZssO95e+eOR8ihSzPs5plOpg=', 'cza.cza@ebfc.com', 'cza', 'cza', 'cza', 'avatar_1379490540.jpg', '', 'bsqc', 'male', '', '123-24-35', '1970-01-01', '312432432', 426, 1, '2013-10-07 11:41:01', NULL, '1M4Hi4f3cyov'),
(42, 7, '0042', 'o5C15zxMRM/HoeaKJ6sVmgPaESqx3xI=', 'cez.cez@ebfc.com', 'cez', 'cez', 'cez', 'avatar_1379490540.jpg', '', 'sadasd', 'male', '', '341-23-23', '2013-10-18', '213232312', 3234234, 1, '2013-10-07 11:43:03', NULL, 'g00i3RvMYv'),
(50, 7, '0050', 'jM435iQs+pMV5XGCIQ5Az8Y0WPtgR2E=', 'ana.cruz@ebfc.com', 'ana', 'carolina', 'cruz', 'avatar_1379490540.jpg', '', 'quezon city', 'female', '', '123-45-67', '2013-10-07', '123456789', 426, 1, '2013-10-07 21:53:56', NULL, 'w3J050ePwq5n'),
(44, 7, '0044', 'sov5RCfcdseMBi6NhayPl9fPre6hyv/uDud1', 'czarina_Lei.bonafe@ebfc.com', 'czarina lei', 'laureta', 'bonafe', 'avatar_1379490540.jpg', '', 'Bagong Silangan', 'female', '', '440-39-63', '2013-10-07', '098765432', 426, 1, '2013-10-07 15:59:46', NULL, 'pfuVEm7QQD01'),
(45, 7, '0045', '/9wW6e0iveYY3YlKQ2H2pNmqh12E/3N/Mj3ltwOc', 'Cecille.Narca@ebfc.com', 'Cecille', 'Agang', 'Narca', 'avatar_1379490540.jpg', '', '18#c Kalayaan Avenue V-Luna QC', 'female', '', '921-44-88', '1970-01-01', '309814722', 426, 1, '2013-10-07 16:02:36', NULL, 'wk000Aa0rQiT'),
(46, 7, '0046', 'FGL/sZscLj1R07uGR9avvEwwLJQbmVJAAw==', 'maria_beverlyn.roxas@ebfc.com', 'maria beverlyn', 'barcelino', 'roxas', 'avatar_1379490540.jpg', '', 'bulacan', 'female', '', '123-78-21', '2013-10-07', '174673649', 426, 1, '2013-10-07 16:05:52', NULL, 'OHfLcvWJU5qU'),
(47, 7, '0047', 'zqUOajFwuAsV1Q3fZA+ZJi9jxbHl7rk=', 'shirly_mae.perez@ebfc.com', 'shirly mae', 'c', 'perez', 'avatar_1379490540.jpg', '', 'Bagong Silangan', 'female', '', '654-23-54', '2013-10-07', '376423846', 426, 1, '2013-10-07 16:07:32', NULL, 'aPO2CWVr4NSB'),
(48, 7, '0048', 'ifEe80v+AH5y08LzlYukJzjXphllMnVYUg==', 'garry.perez@ebfc.com', 'garry', 'c', 'perez', 'avatar_1379490540.jpg', '', 'ajfkh', 'female', '', '496-32-49', '2013-10-07', '384718501', 426, 0, '2013-10-07 16:08:44', NULL, 'I0fkIUiu00Bi'),
(49, 7, '0049', 'pVXk0+YZd9MJJq4cYEvEo0Vcxslk1cOT1A==', 'sarah.narca@ebfc.com', 'sarah', 'Agang', 'Narca', 'avatar_1379490540.jpg', '', 'kalayaan', 'male', '', '764-91-37', '2013-10-07', '134691347', 426, 1, '2013-10-07 16:09:56', NULL, 'bxwQlALHr4wv'),
(51, 7, '0051', 'ZZRjP8O/iE928bcTLXk1UWsYUCcyRi52I/s=', 'junpyo.leeminhoo@ebfc.com', 'junpyo', 'min', 'leeminhoo', 'avatar_1379490540.jpg', '', 'taiwan', 'male', '', '123-45-67', '2013-10-07', '123456789', 426, 1, '2013-10-07 21:55:45', NULL, 'XLGL0aB0YeqL'),
(55, 7, '0054', 'NxgBgGmvlQ8MuqzIUBFauimTh/oqLlgq2GrL4BC1aZU=', 'test.test@ebfc.com', 'test', 'test', 'test', 'avatar_1379490540.jpg', '', 'test', 'male', '', '234-23-42', '1970-01-01', '234234234', 234234, 1, '2014-01-16 13:11:24', NULL, '0l1EjiayL1v'),
(53, 7, '0053', 'c03nwEgzII8Bxq5zLpoK4fxHhHMlwCeCpP/+NoYKDg==', 'roger.pagdato@ebfc.com', 'roger', 's', 'pagdato', 'avatar_1379490540.jpg', '', 'aics', 'male', '', '234-52-43', '1970-01-01', '234324342', 426, 1, '2013-10-17 12:52:52', NULL, '0K1aoqj11eoz'),
(56, 7, '0056', 'SZAi6Rf3MOPzqVi3MYeuHTaZ/poOWGn2nz6gPKKlexo=', '.asdf@ebfc.com', '234234234', 'asdf', 'asdf', 'avatar_1379490540.jpg', '', 'asdfasdf', 'male', '', '324-23-42', '1970-01-01', '234234234', 234234243, 1, '2014-01-16 13:58:11', NULL, 'Ls5f1l0RmHFK'),
(57, 7, '0057', 'caEB5YKex0hB6gylmN9Z1GfNjBXSQzvCks2H85G/faE=', 'testad.testasd@ebfc.com', 'testad', 'testasd', 'testasd', 'avatar_1379490540.jpg', '', '34242342', 'male', '', '234-24-23', '1970-01-01', '234234234', 2147483647, 1, '2014-01-16 14:02:33', NULL, 'bERNHrttAIxN'),
(58, 7, '0058', 'bnHKbIeVJztmVeWnHXfIwTtJBsoULmbzm8wL9d+rWdM=', 'lorem.lorem@ebfc.com', 'lorem', 'lorem', 'lorem', 'avatar_1379490540.jpg', '', 'lorem', 'female', '', '213-12-31', '1970-01-01', '098876544', 123123232, 1, '2014-01-16 14:36:44', NULL, 'lIME06fjH0Kd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_module`
--
ALTER TABLE `_module`
  ADD CONSTRAINT `_module_ibfk_1` FOREIGN KEY (`reference_id`) REFERENCES `_module_label` (`label_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_permission`
--
ALTER TABLE `_permission`
  ADD CONSTRAINT `_permission_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `_module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
