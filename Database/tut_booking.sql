-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 09:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tut_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(10) NOT NULL,
  `time` varchar(50) NOT NULL,
  `bus_from` varchar(50) NOT NULL,
  `bus_to` varchar(50) NOT NULL,
  `num_booked` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `notice_id` int(10) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`notice_id`, `subject`, `details`, `date`) VALUES
(8, 'SUSPENSSION OF CONTACT CLASSES', 'Due to the continuous increase in positive COVID-19 cases i n the country ,and especially Gauteng, TUT management yesterday resolved to suspend contact classes .So please\nnot Bus booking will be closed until further notice.', '2021-11-16 23:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `day` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `from_campus` varchar(50) NOT NULL,
  `to_campus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_booking`
--

CREATE TABLE `student_booking` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `bookid` int(10) NOT NULL,
  `date_booked` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` int(50) NOT NULL,
  `from_to` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `numBooked` int(10) NOT NULL,
  `notAllowed` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `from_to`, `time`, `numBooked`, `notAllowed`) VALUES
(5, 'south_north', '09:00', 0, 1),
(6, 'south_north', '09:30', 0, 1),
(7, 'south_north', '10:00', 0, 1),
(8, 'south_north', '10:30', 0, 1),
(9, 'south_north', '11:00', 0, 1),
(10, 'south_north', '23:20', 0, 1),
(11, 'south_north', '12:00', 0, 1),
(12, 'south_north', '12:30', 0, 1),
(13, 'south_north', '13:00', 0, 1),
(14, 'south_north', '13:30', 0, 1),
(15, 'south_north', '14:00', 0, 1),
(16, 'south_north', '14:30', 0, 1),
(17, 'south_north', '15:00', 0, 1),
(18, 'south_north', '15:30', 0, 1),
(19, 'south_north', '16:00', 0, 1),
(20, 'south_north', '16:30', 0, 1),
(21, 'south_north', '17:00', 0, 1),
(22, 'south_north', '17:30', 0, 1),
(23, 'south_north', '23:00', 0, 1),
(24, 'south_arcadia', '07:00', 0, 0),
(25, 'south_arcadia', '08:00', 0, 0),
(26, 'south_arcadia', '09:00', 0, 0),
(28, 'south_arcadia', '10:00', 0, 0),
(29, 'south_arcadia', '11:00', 0, 0),
(30, 'south_arcadia', '12:00', 0, 0),
(31, 'south_arcadia', '13:00', 0, 0),
(32, 'south_arcadia', '14:00', 0, 0),
(33, 'south_arcadia', '15:00', 0, 0),
(34, 'south_arcadia', '16:00', 0, 0),
(35, 'south_arcadia', '17:00', 0, 0),
(36, 'south_arcadia', '22:00', 0, 0),
(38, 'south_north', '20:20', 0, 1),
(41, 'south_north', '22:30', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login_type` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `first_name`, `surname`, `password`, `login_type`) VALUES
('218352162', '218352162@tut4life.ac.za', 'MAKHENSA IKE', 'SAMBO', 'admin123', 1),
('218352162', '218352162@tut4life.ac.za', 'MAKHENSA IKE', 'SAMBO', 'admin123', 1),
('ikesambo47@gmail.com', 'ikesambo47@gmail.com', 'Makhensa', 'Sambo', 'Admin123', 2),
('', '', '', '', '', 1),
('', '', '', '', '', 1),
('ike', '', '', '', '', 0),
('54', 'ikesambo47@gmail.com', 'kdmnx', 'nxmxnm', 'nxmx', 1),
('54', 'ikesambo47@gmail.com', 'kdmnx', 'nxmxnm', 'nxmx', 1),
('12', 'ikesambo47@gmail.com', 'IKE', 'Sambo', 'nxnxb', 1),
('12', 'ikesambo47@gmail.com', 'IKE', 'Sambo', 'nxnxb', 1),
('21835', 'ikesambo47@gmail.com', 'IK', 'nxmxnm', 'nmxmnx', 1),
('21835', 'ikesambo47@gmail.com', 'IK', 'nxmxnm', 'nmxmnx', 1),
('125', 'ikesambo47@gmail.com', 'username', 'Sambo', 'nxmx', 1),
('125', 'ikesambo47@gmail.com', 'username', 'Sambo', 'nxmx', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `student_booking`
--
ALTER TABLE `student_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `notice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_booking`
--
ALTER TABLE `student_booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
