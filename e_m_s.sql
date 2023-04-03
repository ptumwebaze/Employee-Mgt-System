-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 12:14 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e.m.s`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_employee`
--

CREATE TABLE `add_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `nin` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` varchar(100) DEFAULT '0',
  `appoint` varchar(100) NOT NULL,
  `contract` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `nok` varchar(100) NOT NULL,
  `nokc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_employee`
--

INSERT INTO `add_employee` (`id`, `name`, `email`, `phone1`, `phone2`, `address`, `birth`, `nin`, `position`, `salary`, `appoint`, `contract`, `photo`, `nok`, `nokc`) VALUES
(22, 'TUMWEBAZE PETERSON', 'ptersont@gmail.com', '+256757254271', '0776468124', 'Kampala, Uganda', '2021-09-14', 'Any', '12', '600000', '2021-09-17', 'part-time', '1a730ed245bd311c4eb6fc752b9971a3.jpg', 'Alex', '0757272626'),
(23, 'Mark Ahimbisibwe', 'mu0160045@muni.ac.ug', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-17', 'Any', '12', '900000', '2021-09-13', 'full-time', 'a3674b85236c9610afd3cbf686822f62.jpg', 'Alex', '0757272626'),
(24, 'TOM Tumuhimbise', 'tom@gmail.com', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-21', 'xzd', '13', '600000', '2021-09-06', '', '98b27416362c93d44523b72728406ed7.jpg', 'Alex', '0757272626'),
(28, 'Amili Ayikolu', 'amili@gmail.com', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-01', 'xzd', '15', '1000000', '2021-09-15', 'Full-time', '36889868_112872679632342_4764138206176215040_n.jpg', 'Alex', '0757272626'),
(29, 'Mr. Nyanzi Shaffik', 'nyanzishaffik@gmail.com', '+256702346241', '+2567254271', 'Kampala - Uganda', '2021-09-16', 'Any', '13', '900000', '2021-09-07', 'Full-time', '36889868_112872679632342_4764138206176215040_n.jpg', 'Alex', '0757272626'),
(46, 'Oscar Amanzo', 'os@gmail.com', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-16', 'xzd', '13', '900000', '2021-09-09', 'full-time', '98b27416362c93d44523b72728406ed7.jpg', 'Alex', '0757272626'),
(47, 'James Dradi', 'james@gmail.com', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-10', 'Any', '15', '600000', '2021-09-11', 'full-time', 'PELEL PROPOSAL.docx', 'zs', '0757272626'),
(48, 'Bridget Aleni Soft', 'bridget@gmail.com', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-10', 'Any', '15', '600000', '2021-09-09', 'full-time', 'Capture.PNG', 'zs', 'jkkhkh'),
(49, 'Laban', 'laban@gmail.com', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-02', 'xzd', '14', '5000', '2021-09-10', 'full-time', 'Capture.PNG', 'zs', '0757272626'),
(50, 'Kalimasi Yonah', 'yonah@gmail.com', '+2567254271', '+2567254271', 'Muni, Aria,  Uganda', '2021-09-23', 'Any', '14', '5000', '2021-07-13', 'part-time', '1538728415409.jpg', 'Alex', '0757272626');

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

CREATE TABLE `advances` (
  `advance_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `amount` varchar(50) DEFAULT '0',
  `date` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `addedby` varchar(100) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT current_timestamp(),
  `month` int(2) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advances`
--

INSERT INTO `advances` (`advance_id`, `emp_id`, `amount`, `date`, `reason`, `addedby`, `addedon`, `month`, `year`) VALUES
(18, 28, '200000', '2021-09-09', 'jnhkj', '13', '2021-09-07 17:12:14', 10, 2021),
(20, 22, '200000', '2021-09-06', 'jnhkj', '13', '2021-09-08 23:26:28', 9, 2021),
(21, 24, '980', '2021-09-02', 'jnhkj', '35', '2021-09-13 17:28:42', 8, 2014),
(23, 48, '980', '2021-09-15', 'jnhkj', '22', '2021-09-20 19:04:45', 9, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `doc` varchar(100) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT current_timestamp(),
  `addedby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `emp_id`, `name`, `doc`, `addedon`, `addedby`) VALUES
(8, 24, 'Pass  slip', 'S18_Registration-of-Company.pdf', '2021-09-02 17:45:13', '23'),
(10, 23, 'Routing and switching ', 'Head shot.jpg', '2021-09-02 18:01:26', '28'),
(11, 46, 'passport', 'Head shot.jpg', '2021-09-03 05:55:34', '22'),
(12, 28, 'Paper', 'Application-to-Search-a-Record_.pdf', '2021-09-03 17:37:30', '46'),
(16, 22, 'Diaz', '1a730ed245bd311c4eb6fc752b9971a3.jpg', '2021-09-13 17:52:21', '47'),
(17, 24, 'Diaz', '1538728414842.jpg', '2021-09-13 17:54:44', '23');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `login_id` int(11) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`login_id`, `activity`, `user`, `date_time`) VALUES
(241, 'Deleted an employee with name Oscar', '28', '2021-09-13 18:35:54'),
(242, 'Deleted an employee with name Oscar', '28', '2021-09-13 18:36:01'),
(243, 'Deleted an employee with name Oscar', '28', '2021-09-13 18:36:10'),
(244, 'Added Employee with name Oscar and email ont@gmail.com', '28', '2021-09-13 18:36:54'),
(245, 'Deleted an employee with name Oscar', '28', '2021-09-13 18:37:48'),
(246, 'Added Employee with name TUMWEBAZE PTERSON and email pterst@gmail.com', '28', '2021-09-13 19:11:33'),
(247, 'Deleted an employee with name TUMWEBAZE PTERSON', '28', '2021-09-13 19:17:55'),
(248, 'Added Employee with name TUMWEBAZE PTERSON and email ptent@gmail.com', '28', '2021-09-13 19:18:46'),
(249, 'Added Employee with name TUMWEBAZE PTERSON and email ptent@gmail.com', '28', '2021-09-13 19:18:48'),
(250, 'Added Employee with name TUMWEBAZE PTERSON and email ptent@gmail.com', '28', '2021-09-13 19:18:48'),
(251, 'Added Employee with name TUMWEBAZE PTERSON and email ptent@gmail.com', '28', '2021-09-13 19:18:48'),
(252, 'Added Employee with name TUMWEBAZE PTERSON and email ptent@gmail.com', '28', '2021-09-13 19:18:49'),
(253, 'Added Employee with name Oscar and email os@gmail.com', '28', '2021-09-13 19:34:07'),
(254, 'Successfully logged into the system', '22', '2021-09-14 15:11:16'),
(255, 'Deleted Role ', '22', '2021-09-14 19:41:10'),
(256, 'Deleted Role Super User', '22', '2021-09-14 19:41:24'),
(257, 'Deleted details for User with the name 21', '22', '2021-09-14 19:44:29'),
(258, 'Deleted details for User with the name 9', '22', '2021-09-14 19:44:37'),
(259, 'Deleted details for User with the name 18', '22', '2021-09-14 19:44:44'),
(260, 'Added new position Marketing Manager', '22', '2021-09-14 19:46:26'),
(261, 'Deleted Role Marketing Manager', '22', '2021-09-14 20:04:08'),
(262, 'Deleted Role Employee', '22', '2021-09-14 20:04:17'),
(263, 'Deleted Role Customer', '22', '2021-09-14 20:04:35'),
(264, 'Deleted Role New Role', '22', '2021-09-14 20:12:17'),
(265, 'Added new position Supervisor', '22', '2021-09-14 20:15:19'),
(266, 'Added new position New Role', '22', '2021-09-14 20:15:55'),
(267, 'Deleted Role New Role', '22', '2021-09-14 20:16:13'),
(268, 'Updated user details for Amili with email amili@gmail.com', '22', '2021-09-14 20:18:37'),
(269, 'Updated user details for Amili with email amili@gmail.com', '22', '2021-09-14 20:19:29'),
(270, 'Added a user with name 46 and email os@gmail.com', '22', '2021-09-14 20:25:58'),
(271, 'Deleted details for User with the name Amili', '22', '2021-09-14 20:26:09'),
(272, 'Added a user with name 29 and email nyanzishaffik@gmail.com', '22', '2021-09-14 20:29:13'),
(273, 'Added new position Marketing Manager', '22', '2021-09-14 22:02:10'),
(274, 'Deleted Role ', '22', '2021-09-14 22:02:21'),
(275, 'Deleted Role ', '22', '2021-09-14 22:02:27'),
(276, 'Added Employee with name James and email james@gmail.com', '22', '2021-09-14 22:11:28'),
(277, 'Deleted document with name ', '22', '2021-09-14 23:17:32'),
(278, 'Successfully logged out of the system', '22', '2021-09-14 23:24:58'),
(279, 'Successfully logged into the system', '29', '2021-09-14 23:25:27'),
(280, 'Successfully logged out of the system', '29', '2021-09-14 23:25:32'),
(281, 'Successfully logged into the system', '29', '2021-09-14 23:26:25'),
(282, 'Added Employee with name Bridget and email bridget@gmail.com', '29', '2021-09-14 23:31:09'),
(283, 'Added a user with name 48 and email bridget@gmail.com', '29', '2021-09-14 23:31:36'),
(284, 'Added an advance for staff with name Bridget and amount 200000 for the month of 9', '29', '2021-09-14 23:39:52'),
(285, 'Successfully logged into the system', '29', '2021-09-15 15:28:49'),
(286, 'Added Employee with name Laban and email laban@gmail.com', '29', '2021-09-15 15:52:27'),
(287, 'Deleted an advance for Bridget', '29', '2021-09-15 16:57:55'),
(288, 'Deleted salary details for Bridget', '29', '2021-09-15 16:58:11'),
(289, 'Deleted salary details for Bridget', '29', '2021-09-15 16:58:23'),
(290, 'Deleted salary details for Bridget', '29', '2021-09-15 17:01:17'),
(291, 'Deleted salary details for Bridget', '29', '2021-09-15 17:01:31'),
(292, 'Deleted salary details for ', '29', '2021-09-15 17:03:56'),
(293, 'Deleted salary details for ', '29', '2021-09-15 17:06:09'),
(294, 'Deleted salary details for ', '29', '2021-09-15 17:06:15'),
(295, 'Deleted salary details for Bridget', '29', '2021-09-15 17:21:15'),
(296, 'Successfully logged into the system', '29', '2021-09-15 21:02:31'),
(297, 'Successfully logged into the system', '29', '2021-09-17 06:47:27'),
(298, 'Successfully logged into the system', '29', '2021-09-17 15:45:49'),
(299, 'Successfully logged out of the system', '29', '2021-09-17 15:46:15'),
(300, 'Successfully logged into the system', '29', '2021-09-17 15:46:41'),
(301, 'Successfully logged out of the system', '29', '2021-09-17 15:46:47'),
(302, 'Successfully logged into the system', '48', '2021-09-17 15:48:12'),
(303, 'Successfully logged into the system', '48', '2021-09-17 15:48:13'),
(304, 'Successfully logged out of the system', '48', '2021-09-17 15:48:30'),
(305, 'Successfully logged into the system', '29', '2021-09-17 15:48:54'),
(306, 'Successfully logged out of the system', '29', '2021-09-17 20:19:23'),
(307, 'Successfully logged into the system', '22', '2021-09-17 20:20:05'),
(308, 'Updated user details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-17 23:08:48'),
(309, 'Successfully logged out of the system', '22', '2021-09-17 23:13:35'),
(310, 'Successfully logged into the system', '22', '2021-09-17 23:13:59'),
(311, 'Successfully logged into the system', '22', '2021-09-18 15:44:43'),
(312, 'Updated user details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-18 19:05:31'),
(313, 'Successfully logged into the system', '22', '2021-09-20 05:52:38'),
(314, 'Deleted salary details for Bridget', '22', '2021-09-20 06:45:41'),
(315, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 07:31:56'),
(316, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 07:33:59'),
(317, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 07:36:22'),
(318, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 07:39:18'),
(319, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 07:47:37'),
(320, 'Updated an advance for staff with name  and amount 10000 ', '22', '2021-09-20 07:49:59'),
(321, 'Deleted an advance for ', '22', '2021-09-20 07:55:12'),
(322, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 08:01:35'),
(323, 'Updated details for Mark Ahimbisibwe with email mu0160045@muni.ac.ug', '22', '2021-09-20 08:02:43'),
(324, 'Updated details for Mark Ahimbisibwe with email mu0160045@muni.ac.ug', '22', '2021-09-20 08:03:52'),
(325, 'Updated details for TOM Tumuhimbise with email tom@gmail.com', '22', '2021-09-20 08:04:36'),
(326, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 18:35:18'),
(327, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 18:46:13'),
(328, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 18:55:01'),
(329, 'Added a user with name 23 and email mu0160045@muni.ac.ug', '22', '2021-09-20 18:56:28'),
(330, 'Added a user with name 49 and email laban@gmail.com', '22', '2021-09-20 18:57:07'),
(331, 'Updated an advance for staff with name  and amount 200000 ', '22', '2021-09-20 19:02:44'),
(332, 'Added an advance for staff with name Bridget Aleni Soft and amount 980 for the month of 9', '22', '2021-09-20 19:04:45'),
(333, 'Updated an advance for staff with name  and amount 200000 ', '22', '2021-09-20 19:14:47'),
(334, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 19:31:08'),
(335, 'Added Employee with name Kalimasi Yonah and email yonah@gmail.com', '22', '2021-09-20 19:34:46'),
(336, 'Deleted salary details for Oscar Amanzo', '22', '2021-09-20 19:44:15'),
(337, 'Added an advance for staff with name Bridget Aleni Soft and amount 200000 for the month of 8', '22', '2021-09-20 23:13:25'),
(338, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 23:46:07'),
(339, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 23:47:27'),
(340, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 23:47:50'),
(341, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 23:48:35'),
(342, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 23:49:09'),
(343, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 23:49:55'),
(344, 'Updated details for TOM Tumuhimbise with email tom@gmail.com', '22', '2021-09-20 23:51:26'),
(345, 'Updated user details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-20 23:56:00'),
(346, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-21 00:04:57'),
(347, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-21 00:06:43'),
(348, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-21 00:09:02'),
(349, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-21 00:10:13'),
(350, 'Updated details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '22', '2021-09-21 00:11:10'),
(351, 'Successfully logged into the system', '22', '2021-09-21 16:02:52'),
(352, 'Successfully logged out of the system', '22', '2021-09-21 16:03:24'),
(353, 'Successfully logged into the system', '22', '2021-09-21 16:12:58'),
(354, 'Successfully logged out of the system', '22', '2021-09-21 16:13:22'),
(355, 'Successfully logged into the system', '29', '2021-09-21 16:14:30'),
(356, 'Updated user details for TUMWEBAZE PETERSON with email ptersont@gmail.com', '29', '2021-09-21 16:16:12'),
(357, 'Successfully logged out of the system', '29', '2021-09-21 16:50:44'),
(358, 'Successfully logged into the system', '22', '2021-09-21 16:50:52'),
(359, 'Deleted salary details for James Dradi', '22', '2021-09-21 17:27:05'),
(360, 'Deleted an advance for Bridget Aleni Soft', '22', '2021-09-21 17:32:58'),
(361, 'Deleted salary details for ', '22', '2021-09-21 17:46:16'),
(362, 'Deleted an advance for James Dradi', '22', '2021-09-21 17:51:57'),
(363, 'Deleted salary details for ', '22', '2021-09-21 17:52:12'),
(364, 'Deleted salary details for ', '22', '2021-09-21 17:52:37'),
(365, 'Deleted salary details for ', '22', '2021-09-21 17:52:51'),
(366, 'Deleted salary details for ', '22', '2021-09-21 17:55:12'),
(367, 'Successfully logged out of the system', '22', '2021-09-22 00:35:56'),
(368, 'Successfully logged into the system', '22', '2021-09-22 00:36:20'),
(369, 'Successfully logged into the system', '29', '2021-09-22 15:54:17'),
(370, 'Successfully logged into the system', '29', '2021-09-23 15:55:48'),
(371, 'Successfully logged into the system', '22', '2021-09-23 23:54:11'),
(372, 'Successfully logged into the system', '29', '2021-09-24 16:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `view_home` varchar(100) NOT NULL DEFAULT '0',
  `add_employees` varchar(100) NOT NULL DEFAULT '0',
  `edit_employees` varchar(100) NOT NULL DEFAULT '0',
  `delete_employees` varchar(100) NOT NULL DEFAULT '0',
  `view_employees` varchar(100) NOT NULL DEFAULT '0',
  `view_employee_details` varchar(100) NOT NULL DEFAULT '0',
  `add_position` varchar(100) NOT NULL DEFAULT '0',
  `view_position` varchar(100) NOT NULL DEFAULT '0',
  `edit_position` varchar(100) NOT NULL DEFAULT '0',
  `delete_position` varchar(100) NOT NULL DEFAULT '0',
  `add_document` varchar(100) NOT NULL DEFAULT '0',
  `view_document` varchar(100) NOT NULL DEFAULT '0',
  `view_document_details` varchar(100) NOT NULL DEFAULT '0',
  `edit_document` varchar(100) NOT NULL DEFAULT '0',
  `delete_document` varchar(100) NOT NULL DEFAULT '0',
  `add_salary` varchar(100) NOT NULL DEFAULT '0',
  `view_salary` varchar(100) NOT NULL DEFAULT '0',
  `edit_salary` varchar(100) NOT NULL DEFAULT '0',
  `delete_salary` varchar(100) NOT NULL DEFAULT '0',
  `add_advance` varchar(100) NOT NULL DEFAULT '0',
  `edit_advance` varchar(100) NOT NULL DEFAULT '0',
  `view_advances` varchar(100) NOT NULL DEFAULT '0',
  `view_advance_details` varchar(100) NOT NULL DEFAULT '0',
  `delete_advance` varchar(100) NOT NULL DEFAULT '0',
  `add_user` varchar(100) NOT NULL DEFAULT '0',
  `view_user` varchar(100) NOT NULL DEFAULT '0',
  `edit_user` varchar(100) NOT NULL DEFAULT '0',
  `delete_user` varchar(100) NOT NULL DEFAULT '0',
  `add_roles` varchar(100) NOT NULL DEFAULT '0',
  `view_roles` varchar(100) NOT NULL DEFAULT '0',
  `delete_roles` varchar(100) NOT NULL DEFAULT '0',
  `edit_roles` varchar(100) NOT NULL DEFAULT '0',
  `view_permissions` varchar(100) NOT NULL DEFAULT '0',
  `view_audits` varchar(100) NOT NULL DEFAULT '0',
  `view_salaryreports` varchar(100) NOT NULL DEFAULT '0',
  `view_advance_reports` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`perm_id`, `role_id`, `view_home`, `add_employees`, `edit_employees`, `delete_employees`, `view_employees`, `view_employee_details`, `add_position`, `view_position`, `edit_position`, `delete_position`, `add_document`, `view_document`, `view_document_details`, `edit_document`, `delete_document`, `add_salary`, `view_salary`, `edit_salary`, `delete_salary`, `add_advance`, `edit_advance`, `view_advances`, `view_advance_details`, `delete_advance`, `add_user`, `view_user`, `edit_user`, `delete_user`, `add_roles`, `view_roles`, `delete_roles`, `edit_roles`, `view_permissions`, `view_audits`, `view_salaryreports`, `view_advance_reports`) VALUES
(1, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(2, 2, '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', '1', '0', '0', '1', '1', '1', '0', '0', '1'),
(3, 3, '1', '1', '0', '1', '1', '0', '1', '1', '1', '1', '1', '1', '0', '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0'),
(14, 20, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(16, 24, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`pos_id`, `pos_name`, `salary`, `added_by`, `added_on`) VALUES
(12, 'Chief', '600000', '47', '2021-09-09 17:49:05'),
(13, 'IT Specialist', '900000', '22', '2021-09-10 20:30:22'),
(14, 'Member', '5000', '28', '2021-09-10 20:30:32'),
(15, 'Nurse', '600000', '46', '2021-09-10 20:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_by` int(11) NOT NULL,
  `addedon` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `name`, `contact`, `contact2`, `email`, `role`, `password`, `status`, `added_by`, `addedon`) VALUES
(33, '24', '+2567254271', '034747464', 'tom@gmail.com', '3', '9c17ec7526726646106bb2a55409efaa', 1, 29, '2021-09-10 04:48:46.690563'),
(34, '22', '+256757254271', '074636322', 'ptersont@gmail.com', '0', 'a989ab1fde33fff8f1d6659e2026f7d5', 1, 24, '2021-09-10 15:39:07.399327'),
(36, '46', '+2567254271', '0764837443', 'os@gmail.com', '0', '2291d647c47b8059feab0c82d01a7da9', 1, 22, '2021-09-14 20:25:57.989107'),
(37, '29', '+256702346241', '0784534273', 'nyanzishaffik@gmail.com', '1', 'ff8bff8baee51d2f0866689dbe73f132', 1, 22, '2021-09-14 20:29:12.770532'),
(38, '48', '+2567254271', '078563736', 'bridget@gmail.com', '3', 'f5c0c4da1f91f20f9bb3a0e0fe376d4f', 1, 29, '2021-09-14 23:31:36.123975'),
(39, '23', '+2567254271', '+2567254271', 'mu0160045@muni.ac.ug', '3', '21ecb052dbf38c0b27df59c0292f39a5', 1, 22, '2021-09-20 18:56:27.422723'),
(40, '49', '+2567254271', '+2567254271', 'laban@gmail.com', '3', 'fbcbaacf8fc759ae6d78807422ffd146', 1, 22, '2021-09-20 18:57:07.323592');

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `reset_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `user_id`, `added_by`, `added_on`) VALUES
(1, 'Admin', 0, '24', '2021-09-03 16:34:07'),
(2, 'Manager', 0, '29', '2021-09-03 16:51:21'),
(3, 'Client', 0, '22', '2021-09-03 18:00:26'),
(20, 'Supervisor', 0, '22', '2021-09-14 20:15:19'),
(24, 'Marketing Manager', 0, '22', '2021-09-14 22:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `pydate` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `rec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `emp_id`, `amount`, `balance`, `month`, `year`, `pydate`, `added_on`, `rec`) VALUES
(25, '23', '980', '899020', '8', 2012, '2021-09-13', '2021-09-13 17:02:53', '46'),
(26, '28', '300000', '-300000', '7', 2017, '2021-09-13', '2021-09-13 17:03:28', '28'),
(37, '48', '300000', '299020', '9', 2021, '2021-09-17', '2021-09-21 17:48:13', '22'),
(38, '48', '300000', '-980', '9', 2021, '2021-09-20', '2021-09-21 17:49:26', '22'),
(39, '22', '300000', '100000', '9', 2021, '2021-09-17', '2021-09-21 17:53:43', '22'),
(40, '22', '100000', '0', '9', 2021, '2021-09-19', '2021-09-21 17:54:37', '22'),
(41, '29', '300000', '600000', '9', 2021, '2021-09-17', '2021-09-21 18:10:39', '22'),
(42, '49', '5000', '0', '9', 2021, '2021-09-09', '2021-09-21 18:11:35', '22'),
(43, '50', '5000', '0', '9', 2021, '2021-09-17', '2021-09-21 18:12:02', '22'),
(44, '46', '200000', '700000', '7', 2014, '2021-09-10', '2021-09-22 17:05:33', '29'),
(45, '28', '200000', '800000', '7', 2013, '2021-09-10', '2021-09-22 17:08:20', '29');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `month` int(10) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `emp_id`, `amount`, `balance`, `month`, `year`) VALUES
(6, 24, '203980', '396020', 9, 2021),
(7, 23, '980', '899020', 8, 2012),
(13, 22, '400000', '0', 9, 2021),
(14, 29, '300000', '600000', 9, 2021),
(15, 49, '5000', '0', 9, 2021),
(16, 50, '5000', '0', 9, 2021),
(17, 28, '200000', '800000', 7, 2013);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_employee`
--
ALTER TABLE `add_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advances`
--
ALTER TABLE `advances`
  ADD PRIMARY KEY (`advance_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_employee`
--
ALTER TABLE `add_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `advances`
--
ALTER TABLE `advances`
  MODIFY `advance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
