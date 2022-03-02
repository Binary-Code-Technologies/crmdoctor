-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 01:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ipaddress` varchar(100) NOT NULL,
  `loginid` int(11) NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adduser`
--

INSERT INTO `adduser` (`id`, `userid`, `username`, `password`, `usertype`, `mobile`, `address`, `ipaddress`, `loginid`, `createdate`) VALUES
(15, '', 'admin', '123', 'Admin', '88994466', 'raipur', '::1', 15, '2022-01-27'),
(28, '', 'Manager', 'm123', 'Manager', '9340923320', 'Bhilai', '::1', 15, '2022-01-27'),
(32, '', 'Executive', 'e123', 'Executive', '8871181890', 'Baloda Bazar', '::1', 15, '2022-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `cal_events`
--

CREATE TABLE `cal_events` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_events` varchar(255) NOT NULL,
  `end_events` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dep_details`
--

CREATE TABLE `dep_details` (
  `dep_id` int(11) NOT NULL,
  `dep_name` int(11) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_entry`
--

INSERT INTO `doctor_entry` (`doc_id`, `doc_name`, `doc_email`, `doc_password`, `doc_mobile`, `doc_address`, `doc_profile`, `doc_img`, `ipaddress`, `createdate`) VALUES
(1, 'Suraj Tiwari', 'suraj@gmail.com', '1230', '8810202526', 'Raipur', 'Heart Doctor', 'DOC1646030184781.1.jfif', '', '0000-00-00 00:00:00'),
(2, 'Sandeep', 'sandeep@gmail.com', '123', '8888888888', 'Raipur', 'Heart Doctor', 'DOC1646049758466.9.jfif', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pat_document`
--

CREATE TABLE `pat_document` (
  `pat_doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pat_description` text NOT NULL,
  `pat_doc` varchar(200) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pat_document`
--

INSERT INTO `pat_document` (`pat_doc_id`, `patient_id`, `pat_description`, `pat_doc`, `ipaddress`, `createdate`) VALUES
(1, 1, 'statement or account giving the characteristics of someone or something : a descriptive statement or account', 'DOC1646026262766.5.jfif', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `ipaddress` varchar(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE `username` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `pat_address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pat_img` varchar(200) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`patient_id`, `name`, `email`, `password`, `mobile`, `pat_address`, `dob`, `gender`, `blood_group`, `doc_id`, `pat_img`, `ipaddress`, `createdate`) VALUES
(1, 'sohan', 'sohan@gmail.com', '123', '8020304050', 'Raipur', '1998-02-10', 'Male', 'B+', 0, 'DOC1645955974072.9.jfif', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cal_events`
--
ALTER TABLE `cal_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pat_document`
--
ALTER TABLE `pat_document`
  ADD PRIMARY KEY (`pat_doc_id`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cal_events`
--
ALTER TABLE `cal_events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pat_document`
--
ALTER TABLE `pat_document`
  MODIFY `pat_doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_name`
--
ALTER TABLE `test_name`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `username`
--
ALTER TABLE `username`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
