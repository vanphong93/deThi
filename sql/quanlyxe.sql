-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 12:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `MAKH` varchar(4) NOT NULL,
  `MAXE` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hopdong`
--

CREATE TABLE `hopdong` (
  `MAHD` varchar(4) NOT NULL,
  `TENHD` varchar(40) DEFAULT NULL,
  `NGAYLAP` datetime DEFAULT NULL,
  `MAKH` varchar(4) DEFAULT NULL,
  `TONGTIEN` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hopdong`
--

INSERT INTO `hopdong` (`MAHD`, `TENHD`, `NGAYLAP`, `MAKH`, `TONGTIEN`) VALUES
('HD02', 'XE DU LICH DI CAMPUCHIA', '2023-09-08 11:26:46', 'KH02', 18000000),
('HD03', 'XE DU LICH DI CAMPUCHIA', '2023-09-08 11:27:23', 'KH03', 12000000),
('HD05', 'XE DU LICH DI CAMPUCHIA', '2023-09-08 11:28:15', 'KH02', 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(4) NOT NULL,
  `HOTEN` varchar(40) DEFAULT NULL,
  `SDT` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `HOTEN`, `SDT`) VALUES
('KH01', 'LE THI BUOI', '0344333'),
('KH02', 'LE THI NAM', '0344333'),
('KH03', 'LE THI NAM', '45444333');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `MAXE` varchar(4) NOT NULL,
  `TENXE` varchar(40) DEFAULT NULL,
  `MAUXE` varchar(40) DEFAULT NULL,
  `SOCHO` int(11) DEFAULT NULL,
  `TENHANG` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`MAXE`, `TENXE`, `MAUXE`, `SOCHO`, `TENHANG`) VALUES
('X01', 'ATILA', 'XANH', 12, 'YAMAHA'),
('X02', 'JUPITER', 'ĐEN', 4, 'HONDA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`MAKH`,`MAXE`),
  ADD KEY `MAXE` (`MAXE`);

--
-- Indexes for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`MAXE`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `cthd_ibfk_2` FOREIGN KEY (`MAXE`) REFERENCES `xe` (`MAXE`);

--
-- Constraints for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
