-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 09:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
