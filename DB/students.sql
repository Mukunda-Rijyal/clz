-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 04:36 AM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_ID` varchar(255) NOT NULL,
  `Student_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Batch_Year` year(4) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Department_IT` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Profile_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_ID`, `Student_Name`, `Password`, `Address`, `Batch_Year`, `Contact`, `Email`, `Department`, `Department_IT`, `Gender`, `Profile_img`) VALUES
('1001', 'Manish', '1001', 'Butwal', '2078', '978686427', 'Manish@gmail.com', 'IT', '1', 'male', '682810.jpg'),
('1002', 'Himal', '1002', 'Ranibagiya', '2078', '98768976988', 'himal@123.gmail.com', 'IT', '1', 'male', '682810.jpg'),
('101', 'Mukunda Rijyal', '101', 'Bankatta', '2078', '2147483647', 'muku@gmail.com', 'IT', '1', 'male', ''),
('102', 'sabin', '102', 'btl', '2078', '234543', ' sabin@gmail.com', 'IT', '1', 'male', ''),
('103', 'Niharika', '103', 'Bankatta', '2079', '12345678', ' asd@gmail.com', 'IT', '1', 'female', ''),
('104', 'birat', '104', '123', '2020', '123232', ' b@g.com', 'Ele', '2', 'female', ''),
('105', 'mkdir', '105', 'sadfsadfasdf', '2020', '655649845564', 'adsdd@sedf.com', 'asdsd', '12', 'Female', 'index.jpg'),
('108', 'tilak', 'gfdgh', 'jhghjgfvhjg', '2080', '2134556', 'hggf@gf.com', 'Ele', '101', 'female', 'spiderman-logo-illustration-958x575.jpg'),
('12', 'asdsad', 'waedwe', 'asdasd', '2020', '12312323', 'qwe@s.com', 'Auto', '12', 'female', '3cfa2067c8ad2ad9db5b452e90d0d143.jpg'),
('505', 'Alok', 'nalina', 'bankatta', '2080', '9874563218', 'alok@gmail.com', 'Ele', '102', 'female', 'frightening-halloween-realistic-background_33099-1052.avif'),
('69', 'Nabin', '69', 'Bankatta', '2078', '9874837628346', 'kajsk@h.com', 'IT', '101', 'female', '0b3c3dc7b4fdcfc07de49ddca47826cb.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `Student_ID` (`Student_ID`,`Contact`,`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
