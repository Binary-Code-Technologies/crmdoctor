-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 10:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adduser`
--

CREATE TABLE `adduser` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `user_img` varchar(150) NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `loginid` int(11) NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adduser`
--

INSERT INTO `adduser` (`id`, `userid`, `username`, `password`, `usertype`, `mobile`, `address`, `user_img`, `ipaddress`, `loginid`, `createdate`) VALUES
(15, '', 'admin', '123', 'Admin', '88994466', 'raipur', 'DOC1646469461686.jfif', '::1', 15, '2022-03-05'),
(28, '', 'Rahul', '123', 'Users', '9340923320', 'Bhilai', 'DOC1646469443274.4.jfif', '::1', 15, '2022-03-05'),
(32, '', 'Ajay', '123', 'Users', '8871181890', 'Baloda Bazar', 'DOC1646469403406.8.jfif', '::1', 15, '2022-03-05'),
(33, '', 'sonu', '123', 'Users', '8810203040', 'Raipur', 'DOC1646475189939.4.jfif', '::1', 15, '2022-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(50) NOT NULL,
  `com_email` varchar(30) NOT NULL,
  `com_mobile` varchar(20) NOT NULL,
  `com_address` varchar(100) NOT NULL,
  `com_img` varchar(200) NOT NULL,
  `loginid` int(11) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`com_id`, `com_name`, `com_email`, `com_mobile`, `com_address`, `com_img`, `loginid`, `ipaddress`, `createdate`) VALUES
(1, 'Demo', 'demo@gmail.com', '1023020200', 'Raipur', 'DOC1646301655342.jfif', 2, '::1', '2022-03-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department_entry`
--

CREATE TABLE `department_entry` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `loginid` int(11) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_entry`
--

INSERT INTO `department_entry` (`dep_id`, `dep_name`, `loginid`, `ipaddress`, `createdate`) VALUES
(3, 'General', 2, '::1', '2022-03-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_entry`
--

CREATE TABLE `doctor_entry` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `doc_email` varchar(25) NOT NULL,
  `doc_password` varchar(25) NOT NULL,
  `doc_mobile` varchar(15) NOT NULL,
  `doc_address` varchar(100) NOT NULL,
  `doc_profile` varchar(100) NOT NULL,
  `doc_img` varchar(200) NOT NULL,
  `loginid` int(11) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_entry`
--

INSERT INTO `doctor_entry` (`doc_id`, `doc_name`, `doc_email`, `doc_password`, `doc_mobile`, `doc_address`, `doc_profile`, `doc_img`, `loginid`, `ipaddress`, `createdate`) VALUES
(2, 'Tiwari', 'tiwari@gmail.com', '', '8810202526', 'Raipur', 'Heart Doctor', 'DOC1646301842086.2.jfif', 2, '::1', '2022-03-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_entry`
--

CREATE TABLE `patient_entry` (
  `pat_id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `patient_id` double NOT NULL,
  `pat_parents` varchar(50) NOT NULL,
  `pat_dob` date NOT NULL,
  `pat_age` varchar(10) NOT NULL,
  `pat_email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `pat_mobile` varchar(15) NOT NULL,
  `full_address` varchar(100) NOT NULL,
  `refer_name` varchar(50) NOT NULL,
  `pat_date` date NOT NULL,
  `reporting_time` time NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pat_amount` double NOT NULL,
  `paytype` varchar(50) NOT NULL,
  `paydate` date NOT NULL,
  `paidamount` varchar(50) NOT NULL,
  `loginid` int(11) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_entry`
--

INSERT INTO `patient_entry` (`pat_id`, `patient_name`, `patient_id`, `pat_parents`, `pat_dob`, `pat_age`, `pat_email`, `gender`, `pat_mobile`, `full_address`, `refer_name`, `pat_date`, `reporting_time`, `doc_id`, `pat_amount`, `paytype`, `paydate`, `paidamount`, `loginid`, `ipaddress`, `createdate`) VALUES
(2, 'sohan', 301, 'ramu', '1985-10-10', '36', 'sohan@gmail.com', 'Male', '8810203040', 'Raipur', 'raju', '2022-03-05', '12:31:51', 2, 100, '', '0000-00-00', '', 15, '::1', '2022-03-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_entry`
--

CREATE TABLE `test_entry` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `charge` double NOT NULL,
  `loginid` int(11) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_entry`
--

INSERT INTO `test_entry` (`test_id`, `test_name`, `charge`, `loginid`, `ipaddress`, `createdate`) VALUES
(3, 'Eye movement desensitization and reprocessing therapy', 400, 2, '::1', '2022-03-03 00:00:00'),
(4, 'Exposure therapy', 100, 2, '::1', '2022-03-03 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adduser`
--
ALTER TABLE `adduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `department_entry`
--
ALTER TABLE `department_entry`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `doctor_entry`
--
ALTER TABLE `doctor_entry`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `patient_entry`
--
ALTER TABLE `patient_entry`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `test_entry`
--
ALTER TABLE `test_entry`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adduser`
--
ALTER TABLE `adduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_entry`
--
ALTER TABLE `department_entry`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_entry`
--
ALTER TABLE `doctor_entry`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_entry`
--
ALTER TABLE `patient_entry`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_entry`
--
ALTER TABLE `test_entry`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
