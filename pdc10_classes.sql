-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 10:28 AM
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
-- Database: `pdc10_classes`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `code`, `name`, `description`, `teacher_id`) VALUES
(3, 'PDC10', 'Professional Domain Course 1', 'Programming Course for BSIT3', 5),
(5, 'PDC20', 'Professional Domain Course 2', 'Angular JS', 2),
(7, 'IAS10', 'Information Assurance and Security', 'Securityy', 4);

-- --------------------------------------------------------

--
-- Table structure for table `class_rosters`
--

CREATE TABLE `class_rosters` (
  `id` int(11) NOT NULL,
  `class_code` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `enrolled_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_rosters`
--

INSERT INTO `class_rosters` (`id`, `class_code`, `student_id`, `enrolled_date`) VALUES
(2, 3, 4, NULL),
(3, 8, 5, NULL),
(6, 8, 3, NULL),
(7, 7, 3, NULL),
(8, 7, 4, NULL),
(15, 3, 5, NULL),
(19, 9, 3, NULL),
(20, 5, 4, NULL),
(21, 5, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_id`, `phone_number`, `email`, `program`) VALUES
(3, 'Choi Yeonjun', 190913, 37367228, 'yeonjun@gmail.com', 'BAPA'),
(4, 'Lee Seokmin', 983929213, 2147483647, 'dk@gmail.com', 'BPA'),
(5, 'Aki Jeon', 390920, 2147483647, 'aki@gmail.com', 'BS Stat');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `phone_number`, `email`, `employee_id`) VALUES
(2, 'Choi Soobin', 120500, 'soobinie@gmail.com', 456),
(3, 'Choi Beomgyu', 2147483647, 'beomgyu@email.com', 7878),
(4, 'Kang Taehyun', 873382922, 'taehyun@email.com', 3892882),
(5, 'Huening Kai', 392892892, 'kai@email.com', 82928982);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_teacher_id` (`teacher_id`);

--
-- Indexes for table `class_rosters`
--
ALTER TABLE `class_rosters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_student` (`student_id`),
  ADD KEY `FK_class` (`class_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_rosters`
--
ALTER TABLE `class_rosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `FK_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `class_rosters`
--
ALTER TABLE `class_rosters`
  ADD CONSTRAINT `FK_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
