-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 07:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`name`, `email`, `password`) VALUES
('admin Ahsam', 'admin@gmail.com', 'admin'),
('Shusmita Aziz', 'aziz@gmail.com', '77');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`name`, `email`, `problem`, `doctor`, `appointment_date`) VALUES
('eee uuu', 'eee@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-07'),
('eee uuu', 'eee@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-07'),
('eee uuu', 'eee@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-07'),
('eee uuu', 'eee@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-06'),
('eee uuu', 'eee@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-06'),
('eee uuu', 'eee@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-06'),
('eee uuu', 'eee@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-05'),
('fff ttt', 'ft@gmail.com', 'mhgv', 'A (9.00AM - 2.00AM)', '2025-01-06'),
('fff ttt', 'ft@gmail.com', 'hbkb', 'A (9.00AM - 2.00AM)', '2025-01-06'),
('ggg sss', 'gs@gmail.com', 'huhui', 'A (9.00AM - 2.00AM)', '2025-01-04'),
('hhh rrr', 'hr@gmail.com', 'fhoj4jg', 'A (9.00AM - 2.00AM)', '2025-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_pending`
--

CREATE TABLE `appointment_pending` (
  `appointment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_date` date NOT NULL,
  `problem` text NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `appointment_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `appointment_time` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `problem` varchar(250) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_request`
--

INSERT INTO `appointment_request` (`appointment_id`, `name`, `email`, `doctor_id`, `doctor_name`, `appointment_time`, `appointment_date`, `problem`, `token`) VALUES
(1, 'ggg sss', 'gs@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-03', 'Fever', '1'),
(2, 'hhh rrr', 'hr@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-07', 'fnjkrb', '2'),
(3, 'iii qqq', 'iq@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-09', 'gnjkgb', '1'),
(4, 'jjj ppp', 'jp@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-07', 'headache', '1'),
(5, 'kkk ooo', 'ko@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-07', 'ohiug', '3'),
(6, 'mmm nnn', 'mn@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-08', 'ohiug', '1'),
(7, 'zzz aaa', 'za@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-07', 'headache', '2'),
(8, 'Farzana Kafil', 'farzana.kafil@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-07', 'headache', '3'),
(9, 'Saiba', 'saiba@yahoo.com', 1, 'Samia Jahan', '3.00 PM - 5.00 PM', '2025-01-02', 'stomach ache', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `name` varchar(100) NOT NULL,
  `available_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `available_time`) VALUES
('', ''),
('A', '9.00AM - 2.00AM');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `available_time` varchar(100) NOT NULL,
  `speciality` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`id`, `phone`, `email`, `name`, `available_time`, `speciality`, `hospital`, `password`) VALUES
(3, '11111111111', 'a1@gmail.com', 'Azhar Hossain', '9.00PM - 111.00PM', 'Surgery', 'Rajshahi Medical College Hospital', '&1111111'),
(4, '22222222222', 'b2@gmail.com', 'Noor Azad', '7.00PM - 9.00PM', 'Surgery', 'Dhaka Medical College Hospital', '&2222222'),
(5, '12345678901', 'farhana@gmail.com', 'Farhana Ahmed', '3.00 PM - 5.00 PM', 'Medicine', 'Mymensingh Medical College Hospital', '1111111$'),
(1, '01234567890', 'samia@gmail.com', 'Samia Jahan', '9:00 AM- 11:00 AM', 'Neurology', 'Dhaka Medical College Hospital', '11');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `medical_history` varchar(500) NOT NULL,
  `emergency_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`first_name`, `last_name`, `email`, `phone`, `nid`, `password`, `dob`, `gender`, `address`, `medical_history`, `emergency_contact`) VALUES
('aaa', 'zzz', 'az@gmail.com', '11111111111', '1234567890', '0000000#', '2008-01-07', 'Male', 'aazz', 'zzaa', '11111111111'),
('bbb', 'yyy', 'by@gmail.com', '22222222222', '2345678901', '1111111#', '2008-02-03', 'Male', 'bbbb', 'yyyy', '22222222222'),
('ccc', 'xxx', 'cx@gmail.com', '33333333333', '3456789012', '2222222#', '2005-06-14', 'Female', 'cccc', 'xxxx', '33333333333'),
('ddd', 'vvv', 'dv@gmail.com', '44444444444', '4567890123', '3333333#', '1998-12-16', 'Male', 'dddd', 'vvvv', '44444444444'),
('eee', 'uuu', 'eu@gmail.com', '55555555555', '5678901234', '4444444#', '1998-12-16', 'Female', 'eeee', 'uuuu', '55555555555'),
('Farzana', 'Kafil', 'farzana.kafil@gmail.com', '01302926514', '1122334455', '1234567@', '2001-08-04', 'Female', 'Khilkhet, Dhaka', 'none', '01302926514'),
('fff', 'ttt', 'ft@gmail.com', '66666666666', '6789012345', '5555555#', '1996-09-15', 'Female', 'ffff', 'tttt', '66666666666'),
('ggg', 'sss', 'gs@gmail.com', '77777777777', '7890123456', '6666666#', '2003-05-11', 'Male', 'gggg', 'ssss', '77777777777'),
('hhh', 'rrr', 'hr@gmail.com', '88888888888', '8901234567', '7777777#', '2003-05-11', 'Male', 'hhhh', 'rrrr', '88888888888'),
('iii', 'qqq', 'iq@gmail.com', '99999999999', '9012345678', '8888888#', '2003-05-11', 'Male', 'iiii', 'qqqq', '99999999999'),
('jjj', 'ppp', 'jp@gmail.com', '00000000000', '0123456789', '9999999#', '2003-05-11', 'Male', 'jjjj', 'pppp', '00000000000'),
('kkk', 'ooo', 'ko@gmail.com', '11111111111', '9123456780', '0000000$', '2003-05-11', 'Male', 'kkkk', 'oooo', '00000000000'),
('mmm', 'nnn', 'mn@gmail.com', '11111111111', '8912345670', '@$000000', '2003-05-11', 'Male', 'mmmm', 'nnnn', '00000000000'),
('zzz', 'aaa', 'za@gmail.com', '11111111111', '8912345671', '@@000000', '2003-05-11', 'Male', 'mmmm', 'nnnn', '00000000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointment_pending`
--
ALTER TABLE `appointment_pending`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`,`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`,`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_request`
--
ALTER TABLE `appointment_request`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
