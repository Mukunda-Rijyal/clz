-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 04:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `sn` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Attendance_Status` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`sn`, `Student_ID`, `Attendance_Status`, `Date`) VALUES
(1, 0, 'present', '2024-12-27'),
(2, 0, 'absent', '2024-12-27'),
(3, 0, 'present', '2024-12-27'),
(4, 103, 'present', '2024-12-27'),
(5, 103, 'present', '2024-12-30'),
(6, 101, 'present', '2024-12-30'),
(7, 102, 'present', '2024-12-30'),
(8, 104, 'absent', '2024-12-30'),
(9, 104, 'present', '2024-12-30'),
(10, 101, 'present', '2024-12-30'),
(11, 102, 'present', '2024-12-30'),
(12, 102, 'present', '2024-12-30'),
(13, 101, 'present', '2024-12-30'),
(14, 102, 'absent', '2024-12-30'),
(15, 101, 'present', '2024-12-30'),
(16, 102, 'absent', '2024-12-30'),
(17, 108, 'present', '2024-12-30'),
(18, 505, 'absent', '2024-12-30'),
(19, 101, 'present', '2024-12-30'),
(20, 102, 'present', '2024-12-30'),
(21, 108, 'present', '2024-12-30'),
(22, 505, 'absent', '2024-12-30'),
(23, 108, 'absent', '2024-12-31'),
(24, 505, 'present', '2024-12-31'),
(25, 101, 'present', '2024-12-31'),
(26, 102, 'absent', '2024-12-31'),
(27, 101, 'present', '2025-01-08'),
(28, 102, 'present', '2025-01-08'),
(29, 69, 'absent', '2025-01-08'),
(30, 1001, 'present', '2025-01-08'),
(31, 1002, 'present', '2025-01-08'),
(32, 101, 'present', '2025-01-08'),
(33, 102, 'present', '2025-01-08'),
(34, 69, 'absent', '2025-01-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
