-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 09:41 AM
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
-- Database: `truonghoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `MAHS` varchar(10) NOT NULL,
  `TENHS` varchar(255) DEFAULT NULL,
  `GIOITINH` tinyint(1) DEFAULT NULL,
  `MALOP` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`MAHS`, `TENHS`, `GIOITINH`, `MALOP`) VALUES
('HS01', 'Nguyễn Hải Nam', 0, 'ML01'),
('HS02', 'Nguyễn Hải Phong', 0, 'ML02'),
('HS03', 'Nguyễn Hải Phong', 0, 'ML01');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MALOP` varchar(10) NOT NULL,
  `TENLOP` varchar(255) DEFAULT NULL,
  `MATRUONG` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MALOP`, `TENLOP`, `MATRUONG`) VALUES
('ML01', '12A2', 'TH01'),
('ML02', '10S1', 'TH01'),
('ML04', '12A2', 'TH03'),
('ML05', '12A1', 'TH01'),
('ML06', '12A2', 'TH01'),
('ML07', '12A2', 'TH01'),
('ML08', '12A2', 'TH02'),
('ML09', '12A2', 'TH03');

-- --------------------------------------------------------

--
-- Table structure for table `truong`
--

CREATE TABLE `truong` (
  `MATRUONG` varchar(10) NOT NULL,
  `TENTRUONG` varchar(255) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `truong`
--

INSERT INTO `truong` (`MATRUONG`, `TENTRUONG`, `DIACHI`) VALUES
('TH01', 'NGUYỄN KHUYẾN', '12 TRẦN QUANG DIỆU'),
('TH02', 'NGUYỄN KHUYẾN 2', '12 TRẦN QUANG DIỆU'),
('TH03', 'NGUYỄN KHUYẾN 4', '12 TRẦN QUANG DIỆU'),
('TH04', 'NGUYỄN KHUYẾN', '12 TRẦN QUANG DIỆU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`MAHS`),
  ADD KEY `MALOP` (`MALOP`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MALOP`),
  ADD KEY `MATRUONG` (`MATRUONG`);

--
-- Indexes for table `truong`
--
ALTER TABLE `truong`
  ADD PRIMARY KEY (`MATRUONG`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MATRUONG`) REFERENCES `truong` (`MATRUONG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
