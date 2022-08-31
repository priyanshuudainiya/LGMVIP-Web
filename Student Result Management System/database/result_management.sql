-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 11:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(25) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) NOT NULL,
  `class_code` int(10) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_created_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_code`, `class_name`, `class_created_date`) VALUES
(7, 1, 'First', '31-08-2022'),
(8, 2, 'Second', '31-08-2022'),
(9, 3, 'Third', '31-08-2022'),
(10, 4, 'Fourth', '31-08-2022'),
(11, 5, 'Fifth', '31-08-2022'),
(12, 6, 'Sixth', '31-08-2022'),
(13, 7, 'Seventh', '31-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) NOT NULL,
  `result_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `result_id`, `subject_id`, `marks`) VALUES
(1, 1, 2, 80),
(2, 2, 3, 55),
(3, 3, 4, 80),
(4, 3, 5, 55),
(5, 3, 3, 72),
(6, 3, 6, 63),
(7, 4, 4, 55),
(8, 4, 5, 15),
(9, 4, 3, 20),
(10, 4, 6, 70),
(11, 5, 4, 55),
(12, 5, 5, 15),
(13, 5, 3, 20),
(14, 5, 6, 70),
(15, 6, 4, 80),
(16, 6, 5, 55),
(17, 6, 3, 45),
(18, 6, 6, 50);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `mobile`, `message`) VALUES
(2, 'Prashant Jain', 'prashantjain4419@gma', '8120234419', 'hello!');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `total_marks` int(10) NOT NULL,
  `percentage` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `result_create_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `class_id`, `student_id`, `total_marks`, `percentage`, `status`, `result_create_date`) VALUES
(3, 7, 8, 270, 68, 'PASS', '31-08-2022'),
(5, 7, 9, 160, 40, 'PASS', '31-08-2022'),
(6, 7, 10, 230, 58, 'PASS', '31-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `student_add_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `class_id`, `student_name`, `father_name`, `roll_no`, `email`, `gender`, `class_name`, `dob`, `student_add_date`) VALUES
(9, 7, 'Vikesh Dhakad', 'Hari', '01', 'vikesh@gmail.com', 'Male', 'First', '0002-02-04', '31-08-2022'),
(10, 7, 'Ronak Dubey', 'Akhilesh', '02', 'ronakdubey@gmail.com', 'Female', 'First', '0002-02-02', '31-08-2022'),
(11, 7, 'Prashant Jain', 'Sanajay', '03', 'prashantjain4419@gmail.com', 'Male', 'First', '0002-02-02', '31-08-2022'),
(12, 7, 'Atul Purohit', 'Pradeep', '04', 'atulpurohit@gmail.com', 'Male', 'First', '0002-10-02', '31-08-2022'),
(13, 7, 'Hetu Khashyap', 'hemant', '05', 'hetrammanjhi@gmail.com', 'Male', 'First', '0002-05-10', '31-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_created_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_code`, `subject_name`, `subject_created_date`) VALUES
(3, '101', 'Hindi', '31-08-2022'),
(4, '105', 'English', '31-08-2022'),
(5, '104', 'Evs', '31-08-2022'),
(6, '102', 'Math', '31-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `subjectcombination`
--

CREATE TABLE `subjectcombination` (
  `id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `subjectCombination_create_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjectcombination`
--

INSERT INTO `subjectcombination` (`id`, `class_id`, `subject_id`, `subjectCombination_create_date`) VALUES
(2, 1, 2, '30-08-2022 '),
(3, 3, 2, '30-08-2022 '),
(4, 7, 3, '31-08-2022 '),
(5, 7, 4, '31-08-2022 '),
(6, 7, 5, '31-08-2022 '),
(7, 7, 6, '31-08-2022 '),
(8, 8, 3, '31-08-2022 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjectcombination`
--
ALTER TABLE `subjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjectcombination`
--
ALTER TABLE `subjectcombination`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
