-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 05:44 PM
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
-- Database: `group1database`
--

-- --------------------------------------------------------

--
-- Table structure for table `dateleave`
--

CREATE TABLE `dateleave` (
  `applicationID` int(6) NOT NULL,
  `startLeave` date DEFAULT NULL,
  `endLeave` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dateleave`
--

INSERT INTO `dateleave` (`applicationID`, `startLeave`, `endLeave`) VALUES
(1, '2022-07-12', '2022-07-13'),
(2, '2022-07-15', '2022-07-18'),
(3, '2022-07-20', '2022-07-22'),
(4, '2022-07-26', '2022-07-28'),
(5, '2022-07-26', '2022-07-27'),
(6, '2022-07-29', '2022-08-02'),
(7, '2022-08-02', '2022-08-04'),
(8, '2022-08-03', '2022-08-04'),
(9, '2022-08-16', '2022-08-17'),
(10, '2022-08-24', '2022-08-25'),
(11, '2022-08-29', '2022-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `employeeposition`
--

CREATE TABLE `employeeposition` (
  `empID` varchar(5) NOT NULL,
  `position` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeposition`
--

INSERT INTO `employeeposition` (`empID`, `position`) VALUES
('A001', 'Admin'),
('A002', 'Admin'),
('M001', 'Manager'),
('M002', 'Manager'),
('M003', 'Manager'),
('S001', 'Staff'),
('S002', 'Staff'),
('S003', 'Staff'),
('S004', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `empprofile`
--

CREATE TABLE `empprofile` (
  `empName` varchar(25) DEFAULT NULL,
  `empID` varchar(5) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `noIC` varchar(15) DEFAULT NULL,
  `phoneNO` varchar(14) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empprofile`
--

INSERT INTO `empprofile` (`empName`, `empID`, `gender`, `noIC`, `phoneNO`, `email`, `address`) VALUES
('Ali', 'A001', 'male', '890101-02-9889', '019-2334567', 'ali@gmail.com', '13A Jalan Meranti'),
('Aminah', 'A002', 'female', '900107-02-9789', '017-2674567', 'aminah@gmail.com', '13H Jalan Meranti'),
('Megat', 'M001', 'male', '850304-01-0134', '013-4556780', 'megat@gmail.com', '145 Jalan Resak'),
('Mariam', 'M002', 'female', '8501123-01-2346', '016-9001002', 'mariam@gmail.com', '178 Jalan Resak'),
('Muaz', 'M003', 'male', '920603-02-0987', '012-8997809', 'muaz@gmail.com', '150 Jalan Resak'),
('Amirah', 'S001', 'female', '971218-01-9008', '013-8967807', 'amirah@gmail.com', '234 Jalan Universiti'),
('Fatin Aimi Ayuni', 'S002', 'female', '970322-02-8997', '013-8113899', 'fatin@gmail.com', '990 Jalan Universiti'),
('Bilkis', 'S003', 'female', '910918-01-2775', '016-9003298', 'bilkis@gmail.com', '190 Jalan Resak'),
('Nurin Sofiya', 'S004', 'female', '951028-01-2443', '019-6007894', 'nurin@gmail.com', '101 Jalan Resak');

-- --------------------------------------------------------

--
-- Table structure for table `leaveapplication`
--

CREATE TABLE `leaveapplication` (
  `applicationID` int(6) NOT NULL,
  `empID` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaveapplication`
--

INSERT INTO `leaveapplication` (`applicationID`, `empID`, `status`, `reason`, `description`) VALUES
(1, 'A001', 'Approve', 'Medical leave', 'Operation'),
(2, 'A001', 'Pending', 'Medical leave', 'Rest'),
(3, 'A002', 'Pending', 'Family matters', 'Relative wedding'),
(4, 'M001', 'Pending', 'Emergency', 'Family emergency'),
(5, 'M002', 'Pending', 'Others', 'Rest'),
(6, 'M001', 'Pending', 'Others', 'Rest'),
(7, 'S002', 'Pending', 'Family matters', 'Relative wedding'),
(8, 'S003', 'Pending', 'Family matters', 'Relative wedding'),
(9, 'S004', 'Pending', 'Others', 'Rest'),
(10, 'S002', 'Pending', 'Medical leave', 'Mini surgery'),
(11, 'S001', 'Pending', 'Family matters', 'Relative wedding');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `level` int(3) DEFAULT NULL,
  `empID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`, `empID`) VALUES
('admin1', 'adm123', 1, 'A001'),
('admin2', 'adm234', 1, 'A002'),
('amirah', 'amirah1', 3, 'S001'),
('bilkis', 'bilkis1', 3, 'S003'),
('fatin', 'fatin1', 3, 'S002'),
('manager1', 'mngr123', 2, 'M001'),
('manager2', 'mngr234', 2, 'M002'),
('manager3', 'mngr345', 2, 'M003'),
('nurin', 'nurin1', 3, 'S004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dateleave`
--
ALTER TABLE `dateleave`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexes for table `employeeposition`
--
ALTER TABLE `employeeposition`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `empprofile`
--
ALTER TABLE `empprofile`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dateleave`
--
ALTER TABLE `dateleave`
  MODIFY `applicationID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  MODIFY `applicationID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
