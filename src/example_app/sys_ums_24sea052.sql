-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 30, 2025 at 05:16 PM
-- Server version: 8.0.43
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sys_ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `last_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `is_active`, `last_updated_on`) VALUES
(1, 'HR Department', 1, '2025-10-30 13:57:01'),
(2, 'Finance Department', 1, '2025-10-30 13:57:20'),
(3, 'IT Department', 1, '2025-10-30 13:57:44'),
(4, 'R&D Department', 1, '2025-10-30 13:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint NOT NULL,
  `name_initials` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `mid_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `nic_no` varchar(20) NOT NULL,
  `mobile_no` varchar(12) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `department_id` int NOT NULL,
  `address_no` varchar(20) NOT NULL,
  `address_street` varchar(100) DEFAULT NULL,
  `address_city` varchar(100) NOT NULL,
  `address_state` varchar(100) DEFAULT NULL,
  `address_country` varchar(100) NOT NULL,
  `address_zip_code` varchar(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_level_id` int NOT NULL,
  `last_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `registered_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name_initials`, `first_name`, `mid_name`, `last_name`, `nic_no`, `mobile_no`, `email`, `dob`, `department_id`, `address_no`, `address_street`, `address_city`, `address_state`, `address_country`, `address_zip_code`, `username`, `password`, `user_level_id`, `last_updated_on`, `registered_on`) VALUES
(1, 'Super Admin', 'Super', NULL, 'Admin', '0000000000', '0000000000', 'admin@ums.com', '1900-01-01', 1, '94', 'Kumarathunga Muinidasa Mw', 'Colombo 07', NULL, 'Sri Lanka', '00700', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2025-10-30 14:12:42', '2025-10-30 19:42:40'),
(2, 'R. P. L. Manoj', 'Lilan', '', 'Manoj', '199017102530', '0776226440', 'lilanmanoj@gmail.com', '1990-06-19', 3, 'No: 94/3', 'Station Road', 'Kelaniya', '', 'Sri Lanka', '11600', 'lilanmanoj', '81dc9bdb52d04dc20036dbd8313ed055', 6, '2025-10-30 16:52:28', '2025-10-30 16:52:28'),
(3, 'K.A.P. Silva', 'Kamal', 'Ananda', 'Silva', '198512345678', '0771234567', 'kamal.silva@email.com', '1985-06-15', 1, '45', 'Temple Road', 'Colombo', 'Western', 'Sri Lanka', '10500', 'kamalsilva', '32250170a0dca92d53ec9624f336ca24', 3, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(4, 'M.R.T. Fernando', 'Malini', 'Rashmi', 'Fernando', '199023456789', '0772345678', 'malini.f@email.com', '1990-03-22', 2, '78/A', 'Lake Drive', 'Kandy', 'Central', 'Sri Lanka', '20000', 'malinif', '32250170a0dca92d53ec9624f336ca24', 5, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(5, 'S.D. Perera', 'Sunil', 'Darshana', 'Perera', '198734567890', '0773456789', 'sunil.p@email.com', '1987-11-30', 3, '12/B', 'Hill Street', 'Galle', 'Southern', 'Sri Lanka', '80000', 'sunilp', '32250170a0dca92d53ec9624f336ca24', 7, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(6, 'R.M.N. Bandara', 'Rohan', 'Mahesh', 'Bandara', '198845678901', '0774567890', 'rohan.b@email.com', '1988-09-14', 4, '34', 'Beach Road', 'Negombo', 'Western', 'Sri Lanka', '11500', 'rohanb', '32250170a0dca92d53ec9624f336ca24', 9, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(7, 'T.K. Gunasekara', 'Tharaka', '', 'Gunasekara', '199156789012', '0775678901', 'tharaka.g@email.com', '1991-07-25', 1, '56/C', 'Main Street', 'Matara', 'Southern', 'Sri Lanka', '81000', 'tharakag', '32250170a0dca92d53ec9624f336ca24', 11, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(8, 'W.A.D. Costa', 'Wasantha', 'Amal', 'Costa', '198667890123', '0776789012', 'wasantha.c@email.com', '1986-04-18', 2, '90', 'River Road', 'Kurunegala', 'North Western', 'Sri Lanka', '60000', 'wasanthac', '32250170a0dca92d53ec9624f336ca24', 2, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(9, 'P.L.S. Kumara', 'Pradeep', 'Lanka', 'Kumara', '198978901234', '0777890123', 'pradeep.k@email.com', '1989-12-03', 3, '23/D', 'School Lane', 'Badulla', 'Uva', 'Sri Lanka', '90000', 'pradeepk', '32250170a0dca92d53ec9624f336ca24', 4, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(10, 'N.K.R. Dias', 'Nimal', 'Kumar', 'Dias', '198789012345', '0778901234', 'nimal.d@email.com', '1987-08-21', 4, '67', 'Park Road', 'Jaffna', 'Northern', 'Sri Lanka', '40000', 'nimald', '32250170a0dca92d53ec9624f336ca24', 6, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(11, 'H.M.C. Mendis', 'Himali', 'Madhavi', 'Mendis', '199290123456', '0779012345', 'himali.m@email.com', '1992-01-09', 1, '89/E', 'Hospital Road', 'Anuradhapura', 'North Central', 'Sri Lanka', '50000', 'himalim', '32250170a0dca92d53ec9624f336ca24', 8, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(12, 'B.G.R. Fonseka', 'Bandula', 'Gamini', 'Fonseka', '198601234567', '0770123456', 'bandula.f@email.com', '1986-05-27', 2, '12', 'Station Road', 'Ratnapura', 'Sabaragamuwa', 'Sri Lanka', '70000', 'bandulaf', '32250170a0dca92d53ec9624f336ca24', 10, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(13, 'L.P.K. Rajapaksa', 'Lakshmi', 'Prabha', 'Rajapaksa', '199312345678', '0771234568', 'lakshmi.r@email.com', '1993-10-12', 3, '45/F', 'Temple Lane', 'Gampaha', 'Western', 'Sri Lanka', '11000', 'lakshmir', '32250170a0dca92d53ec9624f336ca24', 1, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(14, 'D.M.S. Wijesinghe', 'Dimuth', 'Mohan', 'Wijesinghe', '198823456789', '0772345679', 'dimuth.w@email.com', '1988-02-28', 4, '78', 'Lake Road', 'Kalutara', 'Western', 'Sri Lanka', '12000', 'dimuthw', '32250170a0dca92d53ec9624f336ca24', 3, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(15, 'A.B.C. Gunawardena', 'Amara', 'Bandara', 'Gunawardena', '198734567891', '0773456780', 'amara.g@email.com', '1987-06-15', 1, '90/G', 'Hill Road', 'Matale', 'Central', 'Sri Lanka', '21000', 'amarag', '32250170a0dca92d53ec9624f336ca24', 5, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(16, 'E.F.G. Wickramasinghe', 'Eranga', 'Fazil', 'Wickramasinghe', '199045678901', '0774567891', 'eranga.w@email.com', '1990-11-30', 2, '34/H', 'Beach Street', 'Hambantota', 'Southern', 'Sri Lanka', '82000', 'erangaw', '32250170a0dca92d53ec9624f336ca24', 7, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(17, 'I.J.K. Karunaratne', 'Ishara', 'Janaki', 'Karunaratne', '198856789012', '0775678902', 'ishara.k@email.com', '1988-09-14', 3, '56', 'Main Road', 'Polonnaruwa', 'North Central', 'Sri Lanka', '51000', 'isharak', '32250170a0dca92d53ec9624f336ca24', 9, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(18, 'O.P.Q. Dissanayake', 'Oshan', 'Pathira', 'Dissanayake', '199167890123', '0776789013', 'oshan.d@email.com', '1991-07-25', 4, '23', 'School Road', 'Trincomalee', 'Eastern', 'Sri Lanka', '31000', 'oshand', '32250170a0dca92d53ec9624f336ca24', 11, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(19, 'U.V.W. Seneviratne', 'Udaya', 'Vishwa', 'Seneviratne', '198678901234', '0777890124', 'udaya.s@email.com', '1986-04-18', 1, '67/I', 'Park Lane', 'Batticaloa', 'Eastern', 'Sri Lanka', '30000', 'udayas', '32250170a0dca92d53ec9624f336ca24', 2, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(20, 'X.Y.Z. Ratnayake', 'Xavia', 'Yashodha', 'Ratnayake', '198989012345', '0778901235', 'xavia.r@email.com', '1989-12-03', 2, '89', 'Hospital Lane', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', '71000', 'xaviar', '32250170a0dca92d53ec9624f336ca24', 4, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(21, 'J.H.M. Jayawardena', 'Janaka', 'Hemantha', 'Jayawardena', '198790123456', '0779012346', 'janaka.j@email.com', '1987-08-21', 3, '12/J', 'Station Lane', 'Ampara', 'Eastern', 'Sri Lanka', '32000', 'janakaj', '32250170a0dca92d53ec9624f336ca24', 6, '2025-10-30 16:57:16', '2025-10-30 16:57:16'),
(22, 'C.V.B. Samaraweera', 'Chaminda', 'Vikum', 'Samaraweera', '199201234567', '0770123457', 'chaminda.s@email.com', '1992-01-09', 4, '45', 'River Lane', 'Monaragala', 'Uva', 'Sri Lanka', '91000', 'chamindas', '32250170a0dca92d53ec9624f336ca24', 8, '2025-10-30 16:57:16', '2025-10-30 16:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `user_level_id` int NOT NULL,
  `user_level_name` varchar(100) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `last_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`user_level_id`, `user_level_name`, `is_active`, `last_updated_on`) VALUES
(1, 'Super Admin', 1, '2025-10-30 13:58:38'),
(2, 'CEO', 1, '2025-10-30 13:58:44'),
(3, 'CFO', 1, '2025-10-30 13:58:52'),
(4, 'Head - IT', 1, '2025-10-30 13:59:44'),
(5, 'Head - R&D', 1, '2025-10-30 13:59:44'),
(6, 'Senior Software Engineer', 1, '2025-10-30 13:59:44'),
(7, 'Senior R&D Engineer', 1, '2025-10-30 14:01:15'),
(8, 'Software Engineer', 1, '2025-10-30 14:01:15'),
(9, 'R&D Engineer', 1, '2025-10-30 14:01:15'),
(10, 'Associate Software Engineer', 1, '2025-10-30 14:01:15'),
(11, 'Associate R&D Engineer', 1, '2025-10-30 14:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employees_unique_nic` (`nic_no`),
  ADD UNIQUE KEY `employees_unique_email` (`email`),
  ADD UNIQUE KEY `employees_unique_username` (`username`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`user_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `user_level_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
