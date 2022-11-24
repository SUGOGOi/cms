-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 03:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` varchar(20) NOT NULL,
  `coursename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `coursename`) VALUES
('C01', 'BCA'),
('C02', 'MCA'),
('C03', 'PGDCA');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `cid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `photo`, `phno`, `address`, `email`, `cid`) VALUES
('S01', 'Sumsum', 'Gogoi', 'uploads/photo.jpg', '8876412531', 'Assam', 'sumsumgogoi51@gmail.com', 'C01'),
('S02', 'Manoj', 'Chetry', 'uploads/th (2) (1).jpg', '8876412532', 'Assam', 'manoj1@gmail.com', 'C01'),
('S03', 'suraj', 'nepal', 'uploads/best-small-dog-breeds-pug-1598986985.jpg', '8876412533', 'Assam', 'suraj@gmail.com', 'C01'),
('S04', 'Bishal', 'payeng', 'uploads/th (3).jpg', '8876412539', 'Assam', 'bishal@gmail.com', 'C01');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `photo` longblob NOT NULL,
  `phno` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `cid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `fname`, `lname`, `photo`, `phno`, `address`, `email`, `cid`) VALUES
('T01', 'Ankuman', 'Sharma', 0x75706c6f6164742f646f776e6c6f6164202832292e6a7067, 2147483647, 'Assam', 'ankuman@gmail.com', 'C01'),
('T02', 'ABC', 'XYZ', 0x75706c6f6164742f646f776e6c6f6164202831292e6a7067, 2147483647, 'Assam', 'abc@gmail.com', 'C01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `password`, `dt`) VALUES
(1, 'sumsum', '$2y$10$4uExg9mJG4BtdkWyrXIHROh5DSuS.AdGQ4vIgt4aI20oaaJ6esSPe', '2022-07-23 14:59:23'),
(2, 'suraj', '$2y$10$A9Qi55D/qAlPQKiXxVEuIOg2CrSfwFJJ8ttsVd3tOk3LXQlB9kmX6', '2022-07-24 08:25:58'),
(3, 'manoj', '$2y$10$xyK.FdTWju6N7pgQeHDOBOdcGsC47bMK.NHqNYS3RPNEEydx38IEi', '2022-07-24 10:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
