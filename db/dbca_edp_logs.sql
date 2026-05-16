-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 10:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbca_edp_logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_edp_logs`
--

CREATE TABLE `tbl_edp_logs` (
  `id` int(11) NOT NULL,
  `ticketId` varchar(100) DEFAULT NULL,
  `date_troubleshoot` varchar(100) DEFAULT NULL,
  `services` varchar(100) DEFAULT NULL,
  `end_user` varchar(100) DEFAULT NULL,
  `problem` longtext DEFAULT NULL,
  `assessment` longtext DEFAULT NULL,
  `unit_status` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `remarks_specific` longtext DEFAULT NULL,
  `status_report` varchar(100) DEFAULT NULL,
  `stats_report_specify` longtext DEFAULT NULL,
  `technician` varchar(100) DEFAULT NULL,
  `tech_user_id` varchar(100) DEFAULT NULL,
  `upload_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_edp_logs`
--

INSERT INTO `tbl_edp_logs` (`id`, `ticketId`, `date_troubleshoot`, `services`, `end_user`, `problem`, `assessment`, `unit_status`, `remarks`, `remarks_specific`, `status_report`, `stats_report_specify`, `technician`, `tech_user_id`, `upload_file`) VALUES
(1, 'DBLS-687962', '05/11/2026', 'Aris', 'Rodrigo Manzano', 'Update Firmware but freeze in update of bios firmware for 5 days', 'Firmware is already updated', 'Computer good in condition', 'Problem Resolved/Repaired', '', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', NULL),
(3, 'DBLS-147127', '05/11/2026', 'Osec', 'Anabelle', 'Speaker has no audio', 'Speaker volume is down i up the volume then have an audio', 'Pc Good Condition', 'Problem Resolved/Repaired', '', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', NULL),
(6, 'DBLS-133298', '05/12/2026', 'Legal', 'Marivic Guzman', 'Request to delete all data in hard drive', 'Clean all the Data using Diskpart in Command Prompt', 'PC Good Condition', 'Software Installed/Reconfigured', '', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', '6a02c26691460_IMG_20260512_134817_927.jpg'),
(7, 'DBLS-120517', '05/12/2026', 'Budget', 'Mark Ambayec', 'no internet', 'lan cable', 'working', 'Network Troubleshoot', '', 'Accomplished', '', 'Cyruss Brian Lucena', '3', NULL),
(8, 'DBLS-166106', '05/12/2026', 'Dbls', 'All Network', 'Network distribution unstable', 'Check Directly firewall and connection is stable but in distribution unstable connection ping 10.10.1.254 in network almost no reply', 'Stable', 'Network Troubleshoot', '', 'Resolved', 'Upon check in switch there is a jump cable connected in the same one device', 'Jeff Ronald Gamasan', '2', '6a03c3f458e23_Messenger_creation_B9F6CCF1-AB72-4F5A-8218-99B99EE71887.jpeg'),
(9, 'DBLS-869391', '05/13/2026', 'Tss', 'Maureen Licayen', 'Request for Printer Installation', 'Printer Installation Success', 'Good Condition', 'Software Installed/Reconfigured', '', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', NULL),
(10, 'DBLS-795155', '05/13/2026', 'Tss', 'Ronald Duhig', 'Request for Printer Installation', 'Printer Installation Success', 'Good Condition', 'Software Installed/Reconfigured', '', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', NULL),
(11, 'DBLS-056745', '05/13/2026', 'Tss', 'Zsarina', 'can\\\'t print', '', 'working', 'Software Installed/Reconfigured', '', 'Accomplished', '', 'Cyruss Brian Lucena', '3', NULL),
(12, 'DBLS-886720', '05/13/2026', 'Budget', 'Christine', 'no internet', '', 'working', 'Network Troubleshoot', '', 'Accomplished', '', 'Cyruss Brian Lucena', '3', NULL),
(13, 'DBLS-764045', '05/13/2026', 'Odsiar', 'Pat', 'can\\\'t print', '', 'working', 'Others', 'printer problem', 'Accomplished', '', 'Cyruss Brian Lucena', '3', NULL),
(14, 'DBLS-610152', '05/13/2026', 'Gs', 'Adrian Policarpio', 'Request to remove windows password', 'Remove windows password with cmd or command prompt', 'working', 'Others', 'Reset windows password', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', '6a041de6d59d3_1000004923.jpg'),
(15, 'DBLS-731125', '05/13/2026', 'Osec', 'Anabelle', 'no sounds', '', 'working', 'Others', 'PC MUTED', 'Accomplished', '', 'Cyruss Brian Lucena', '3', NULL),
(17, 'DBLS-623770', '05/14/2026', 'Legal', 'Paris Lison', 'request to setup router and cables', 'setup router and cables', 'working', 'Network Troubleshoot', '', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', NULL),
(18, 'DBLS-047083', '05/14/2026', 'Tss', 'Joey', 'can\\\'t print', '', 'working', 'Others', 'ip problem', 'Accomplished', '', 'Cyruss Brian Lucena', '3', NULL),
(19, 'DBLS-141809', '05/14/2026', 'Tss', 'Zsarina', 'image convert to PDF', '', 'working', 'Others', 'JPEG to PDF', 'Accomplished', '', 'Cyruss Brian Lucena', '3', NULL),
(20, 'DBLS-823087', '05/14/2026', 'Legal', 'Dir Miles', 'Request to delete all data in hard drive', 'Clean all the Data using Diskpart in Command Prompt', 'Good Condition', 'Software Installed/Reconfigured', '', 'Accomplished', '', 'Jeff Ronald Gamasan', '2', '6a05827e631c2_1000004931.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_edp_logs_history`
--

CREATE TABLE `tbl_edp_logs_history` (
  `id` int(11) NOT NULL,
  `ticketId` varchar(100) DEFAULT NULL,
  `date_troubleshoot` varchar(100) DEFAULT NULL,
  `services` varchar(100) DEFAULT NULL,
  `end_user` varchar(100) DEFAULT NULL,
  `problem` longtext DEFAULT NULL,
  `assessment` longtext DEFAULT NULL,
  `unit_status` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `remarks_specific` longtext DEFAULT NULL,
  `status_report` varchar(100) DEFAULT NULL,
  `stats_report_specify` longtext DEFAULT NULL,
  `technician` varchar(100) DEFAULT NULL,
  `update_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_edp_logs_history`
--

INSERT INTO `tbl_edp_logs_history` (`id`, `ticketId`, `date_troubleshoot`, `services`, `end_user`, `problem`, `assessment`, `unit_status`, `remarks`, `remarks_specific`, `status_report`, `stats_report_specify`, `technician`, `update_by`) VALUES
(2, 'DBLS-687962', '05/11/2026', 'Aris', 'Rodrigo Manzano', 'Update Firmware but freeze in update of bios firmware for 5 days', '', 'Not in used', '', NULL, '', NULL, 'Jeff Ronald Gamasan', 'Jeff Ronald Gamasan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `account_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `last_name`, `first_name`, `email`, `password`, `contact`, `account_type`, `account_status`) VALUES
(1, 'Gamasan', 'Jeff Ronald', 'jeff.admin@comappt.gov.ph', '$2y$10$f8FvdEJqJas82UlvRl2/M.EVBv5CiHsMKMV2/.bh0Dw4vEB7J2cFW', '9452869822', 'admin', NULL),
(2, 'Gamasan', 'Jeff Ronald', 'jeff.gamasan@comappt.gov.ph', '$2y$10$zxanTbTjA6mVMgq1IQRSCuYWhBjnci4Ei0OSLrJmrDDa93v58ttxe', '09350448736', 'technician', NULL),
(3, 'Lucena', 'Cyruss Brian', 'brianlucena@comappt.gov.ph', '$2y$10$ezMjvgRAu8FwIQbF1uovRO9AsNPEC0hlwP.9agvaDmN72PlpYZh8O', '09351606569', 'technician', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_edp_logs`
--
ALTER TABLE `tbl_edp_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_edp_logs_history`
--
ALTER TABLE `tbl_edp_logs_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_edp_logs`
--
ALTER TABLE `tbl_edp_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_edp_logs_history`
--
ALTER TABLE `tbl_edp_logs_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
