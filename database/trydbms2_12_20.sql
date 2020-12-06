-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 08:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trydbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminuserid` varchar(500) NOT NULL,
  `apassword` longtext NOT NULL,
  `afname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminuserid`, `apassword`, `afname`) VALUES
(1, 'tb73', 'tanmay73', 'tanmay');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `bookid` int(11) NOT NULL,
  `bookno` varchar(500) NOT NULL,
  `bookfrom` varchar(250) NOT NULL,
  `bookto` varchar(250) NOT NULL,
  `noofpeoples` int(3) NOT NULL DEFAULT 1,
  `bookprice` int(11) NOT NULL,
  `bookdate` date NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`bookid`, `bookno`, `bookfrom`, `bookto`, `noofpeoples`, `bookprice`, `bookdate`, `cid`, `bid`, `rid`, `sid`) VALUES
(56, '24.22.20.6.24.7500.5', 'mumbai', 'hyderabad', 5, 7500, '2020-12-04', 6, 22, 24, 20),
(57, '23.21.19.30.30.1000.1', 'mumbai', 'pune', 1, 1000, '2020-12-05', 6, 21, 23, 19),
(58, '26.24.22.10.20.6000.2', 'mumbai', 'srinagar', 2, 6000, '2020-12-06', 6, 24, 26, 22),
(60, '26.24.22.8.22.9000.3', 'mumbai', 'srinagar', 3, 9000, '2020-12-06', 7, 24, 26, 22),
(61, '23.21.19.29.31.1000.1', 'mumbai', 'pune', 1, 1000, '2020-12-05', 9, 21, 23, 19),
(63, '26.24.22.5.25.6000.2', 'mumbai', 'srinagar', 2, 6000, '2020-12-06', 9, 24, 26, 22),
(64, '24.22.20.1.29.1500.1', 'mumbai', 'hyderabad', 1, 1500, '2020-12-04', 11, 22, 24, 20),
(67, '23.21.19.28.32.2000.2', 'mumbai', 'pune', 2, 2000, '2020-12-05', 11, 21, 23, 19),
(70, '23.21.19.23.37.6000.6', 'mumbai', 'pune', 6, 6000, '2020-12-05', 12, 21, 23, 19);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bid` int(11) NOT NULL,
  `bname` varchar(256) NOT NULL,
  `bno` varchar(15) NOT NULL,
  `rid` int(11) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bid`, `bname`, `bno`, `rid`, `did`) VALUES
(21, 'rickybuses', '265', 23, 13),
(22, 'aniltravels', '267', 24, 14),
(24, 'nakulbuses', '302', 26, 16),
(26, 'trybuses', '309', 25, 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cuserid` varchar(250) NOT NULL,
  `cpassword` varchar(250) NOT NULL,
  `cfname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cuserid`, `cpassword`, `cfname`) VALUES
(6, 'ganesh123', 'ganesh123', 'ganesh'),
(7, 'zahir123', 'zahir123', 'zahir'),
(8, 'yadu123', 'yadu123', 'yudu'),
(9, 'suresh123', 'suresh123', 'suresh'),
(10, 'charlie123', 'charlie123', 'charlie'),
(11, 'bharat123', 'bharat123', 'bharat'),
(12, 'eddie123', 'eddie123', 'eddie');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `did` int(11) NOT NULL,
  `dfname` varchar(250) NOT NULL,
  `driveruserid` varchar(250) NOT NULL,
  `driverpassword` varchar(250) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `dfname`, `driveruserid`, `driverpassword`, `rid`) VALUES
(13, 'dinesh', 'dinesh123', 'dinesh123', 23),
(14, 'vijay', 'vijay123', 'vijay123', 24),
(15, 'azhar', 'azhar123', 'azhar123', 25),
(16, 'kalyan', 'kalyan123', 'kalyan123', 26);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `rid` int(11) NOT NULL,
  `rfrom` varchar(200) NOT NULL,
  `rto` varchar(200) NOT NULL,
  `rfare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`rid`, `rfrom`, `rto`, `rfare`) VALUES
(23, 'mumbai', 'pune', 1000),
(24, 'mumbai', 'hyderabad', 1500),
(25, 'mumbai', 'delhi', 2000),
(26, 'mumbai', 'srinagar', 3000),
(29, 'mumbai', 'delhi', 1500),
(30, 'mumbai', 'aurangabad', 1000),
(31, 'aurangabad', 'mumbai', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `sid` int(11) NOT NULL,
  `srdate` date NOT NULL,
  `sbooked` int(11) NOT NULL,
  `savail` int(11) NOT NULL,
  `bid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`sid`, `srdate`, `sbooked`, `savail`, `bid`) VALUES
(19, '2020-12-05', 40, 20, 21),
(20, '2020-12-04', 30, 0, 22),
(22, '2020-12-06', 27, 3, 24),
(24, '2020-12-05', 0, 30, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`bookid`),
  ADD KEY `booked_ibfk_1` (`cid`),
  ADD KEY `booked_ibfk_2` (`bid`),
  ADD KEY `booked_ibfk_3` (`rid`),
  ADD KEY `booked_ibfk_4` (`sid`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bno` (`bno`),
  ADD KEY `bus_ibfk_1` (`rid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cuserid` (`cuserid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`did`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `seats_ibfk_1` (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `bus` (`bid`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `route` (`rid`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_ibfk_4` FOREIGN KEY (`sid`) REFERENCES `seats` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `route` (`rid`) ON DELETE CASCADE,
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`did`) REFERENCES `driver` (`did`) ON DELETE CASCADE;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `route` (`rid`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bus` (`bid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
