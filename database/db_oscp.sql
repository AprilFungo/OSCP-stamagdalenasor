-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 07:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oscp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `clm_adminid` varchar(255) NOT NULL,
  `clm_name` varchar(255) NOT NULL,
  `clm_username` varchar(255) NOT NULL,
  `clm_password` varchar(255) NOT NULL,
  `clm_status` int(1) NOT NULL DEFAULT '1',
  `clm_type` int(1) NOT NULL DEFAULT '0',
  `clm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`clm_adminid`, `clm_name`, `clm_username`, `clm_password`, `clm_status`, `clm_type`, `clm_date`) VALUES
('A211008023310', 'dawdawd', 'staff', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, '2021-10-08 20:33:10'),
('admin1', 'ADMINISTRATOR', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2021-10-07 15:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE `tbl_announcements` (
  `clm_id` bigint(255) NOT NULL,
  `clm_title` varchar(255) NOT NULL,
  `clm_body` varchar(255) NOT NULL,
  `clm_file` varchar(255) NOT NULL,
  `clm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clm_author` varchar(50) NOT NULL,
  `clm_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`clm_id`, `clm_title`, `clm_body`, `clm_file`, `clm_date`, `clm_author`, `clm_status`) VALUES
(1, 'Pension for October', 'The pension for october will be released on Oct. 15, 2021.', '', '2021-10-07 13:28:32', 'admin1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applications`
--

CREATE TABLE `tbl_applications` (
  `clm_id` bigint(255) NOT NULL,
  `clm_scid` varchar(255) NOT NULL,
  `clm_name` varchar(255) NOT NULL,
  `clm_citizenship` varchar(50) NOT NULL,
  `clm_address` varchar(255) NOT NULL,
  `clm_age` int(255) NOT NULL,
  `clm_sex` varchar(50) NOT NULL,
  `clm_civil_status` varchar(50) NOT NULL,
  `clm_religion` varchar(200) NOT NULL,
  `clm_bday` date NOT NULL,
  `clm_birthplace` varchar(100) NOT NULL,
  `clm_education` varchar(50) NOT NULL,
  `clm_listahanan` int(1) NOT NULL DEFAULT '0',
  `clm_household_number` varchar(255) DEFAULT NULL,
  `clm_pantawid` int(1) NOT NULL DEFAULT '0',
  `clm_senior_organization` int(1) NOT NULL DEFAULT '0',
  `clm_indigenous_people` int(1) NOT NULL DEFAULT '0',
  `clm_please_specify` varchar(255) DEFAULT NULL,
  `clm_others` int(1) NOT NULL DEFAULT '0',
  `clm_other_specify` varchar(255) DEFAULT NULL,
  `clm_osca` varchar(255) DEFAULT NULL,
  `clm_tin` varchar(255) DEFAULT NULL,
  `clm_gsis` varchar(255) DEFAULT NULL,
  `clm_sss` varchar(255) DEFAULT NULL,
  `clm_philhealth` varchar(255) DEFAULT NULL,
  `clm_others_id` varchar(255) DEFAULT NULL,
  `clm_name1` varchar(255) DEFAULT NULL,
  `clm_relationship1` varchar(255) DEFAULT NULL,
  `clm_age1` int(255) DEFAULT NULL,
  `clm_civil_status1` varchar(255) DEFAULT NULL,
  `clm_occupation1` varchar(255) DEFAULT NULL,
  `clm_income1` varchar(255) DEFAULT NULL,
  `clm_name2` varchar(255) DEFAULT NULL,
  `clm_relationship2` varchar(255) DEFAULT NULL,
  `clm_age2` int(255) DEFAULT NULL,
  `clm_civil_status2` varchar(255) DEFAULT NULL,
  `clm_occupation2` varchar(255) DEFAULT NULL,
  `clm_income2` varchar(255) DEFAULT NULL,
  `clm_name3` varchar(255) DEFAULT NULL,
  `clm_relationship3` varchar(255) DEFAULT NULL,
  `clm_age3` int(255) DEFAULT NULL,
  `clm_civil_status3` varchar(255) DEFAULT NULL,
  `clm_occupation3` varchar(255) DEFAULT NULL,
  `clm_income3` varchar(255) DEFAULT NULL,
  `clm_living` varchar(255) NOT NULL,
  `clm_pensioner` varchar(50) NOT NULL,
  `clm_how_much` float DEFAULT NULL,
  `clm_source_gsis` int(1) NOT NULL DEFAULT '0',
  `clm_source_sss` int(1) NOT NULL DEFAULT '0',
  `clm_source_afpslai` int(1) NOT NULL DEFAULT '0',
  `clm_source_others` int(1) NOT NULL DEFAULT '0',
  `clm_permanent_source` varchar(255) DEFAULT 'None',
  `clm_what_source` varchar(255) DEFAULT NULL,
  `clm_regular_support` varchar(255) DEFAULT NULL,
  `clm_type_of_support` varchar(255) DEFAULT NULL,
  `clm_how_much_cash` float DEFAULT NULL,
  `clm_condition` varchar(255) DEFAULT NULL,
  `clm_maintenance` varchar(50) DEFAULT NULL,
  `clm_maintenance_details` varchar(255) DEFAULT NULL,
  `clm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clm_status` int(1) NOT NULL DEFAULT '1' COMMENT '1 - pending, 2 - approved, 3 - cancelled',
  `clm_status_by` varchar(255) DEFAULT NULL,
  `clm_date_status` datetime DEFAULT NULL,
  `clm_remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `clm_id` bigint(255) NOT NULL,
  `clm_desc` varchar(255) NOT NULL,
  `clm_mode` varchar(50) NOT NULL,
  `clm_module` varchar(50) NOT NULL,
  `clm_incharge` varchar(50) NOT NULL,
  `clm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `clm_id` bigint(255) NOT NULL,
  `clm_desc` varchar(255) NOT NULL,
  `clm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clm_status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = unread | 0 = read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seniors`
--

CREATE TABLE `tbl_seniors` (
  `clm_scid` varchar(255) NOT NULL,
  `clm_fullname` varchar(255) NOT NULL,
  `clm_citizenship` varchar(50) NOT NULL,
  `clm_email` varchar(50) NOT NULL,
  `clm_contact` bigint(255) NOT NULL,
  `clm_bday` date NOT NULL,
  `clm_bplace` varchar(255) NOT NULL,
  `clm_address` varchar(255) NOT NULL,
  `clm_civil` varchar(50) NOT NULL,
  `clm_religion` varchar(255) NOT NULL,
  `clm_valid` varchar(255) NOT NULL,
  `clm_seniorid` varchar(255) NOT NULL,
  `clm_username` varchar(50) DEFAULT NULL,
  `clm_password` varchar(255) DEFAULT NULL,
  `clm_status` int(1) NOT NULL DEFAULT '1' COMMENT '0 = inactive | 1 = pending | 2 = approved | 3 = declined',
  `clm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clm_status_by` varchar(50) DEFAULT NULL,
  `clm_status_date` datetime DEFAULT NULL,
  `clm_status_remarks` varchar(255) DEFAULT NULL,
  `clm_delete_by` varchar(50) DEFAULT NULL,
  `clm_date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`clm_adminid`),
  ADD UNIQUE KEY `clm_username` (`clm_username`),
  ADD UNIQUE KEY `clm_name` (`clm_name`);

--
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD PRIMARY KEY (`clm_id`);

--
-- Indexes for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  ADD PRIMARY KEY (`clm_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`clm_id`);

--
-- Indexes for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD PRIMARY KEY (`clm_id`);

--
-- Indexes for table `tbl_seniors`
--
ALTER TABLE `tbl_seniors`
  ADD PRIMARY KEY (`clm_scid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `clm_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  MODIFY `clm_id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `clm_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `clm_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
