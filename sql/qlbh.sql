-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 09:40 AM
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
-- Database: `qlbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MADH` varchar(10) NOT NULL,
  `MAHH` varchar(10) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MADH`, `MAHH`, `SOLUONG`) VALUES
('DH04', 'HH1', 10),
('DH04', 'HH10', 4),
('DH04', 'HH11', 5),
('DH04', 'HH12', 5),
('DH04', 'HH2', 20),
('DH04', 'HH6', 100),
('DH04', 'HH7', 1),
('DH04', 'HH8', 2),
('DH04', 'HH9', 3),
('DH05', 'HH3', 20),
('DH05', 'HH4', 20),
('DH05', 'HH5', 10);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MADH` varchar(10) NOT NULL,
  `TENDH` varchar(255) DEFAULT NULL,
  `NGAYDAT` date DEFAULT NULL,
  `MAKH` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MADH`, `TENDH`, `NGAYDAT`, `MAKH`) VALUES
('DH04', 'Hàng thưc phẩm', '2023-08-15', '3333'),
('DH05', 'Thiết bị điện tử', '2023-08-15', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MAHH` varchar(10) NOT NULL,
  `TENHH` varchar(255) DEFAULT NULL,
  `GIA` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MAHH`, `TENHH`, `GIA`) VALUES
('HH1', 'Áo sơ mi nam', '120000.00'),
('HH10', 'Tai nghe bluetooth', '500000.00'),
('HH11', 'Vớ nữ', '40000.00'),
('HH12', 'Nón nam', '40000.00'),
('HH2', 'Áo sơ mi nữ', '80000.00'),
('HH3', 'Quần Tây Nam', '220000.00'),
('HH4', 'Quần Tây Nữ', '200000.00'),
('HH5', 'Thắt lưng nam', '100000.00'),
('HH6', 'Thắt lưng nữ', '80000.00'),
('HH7', 'Kẹp tóc nữ', '30000.00'),
('HH8', 'Điện thoại di động', '2000000.00'),
('HH9', 'Đồng hồ thông minh', '1000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(10) NOT NULL,
  `TENKH` varchar(255) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `DIACHI`) VALUES
('1111', 'Nguyễn Hải Nam', 'tp.hcm'),
('2222', 'Hồ Văn Lan', '123 Nguyễn Trãi My Tho'),
('3333', 'Hồ Văn Cường', '123 Nguyễn Trãi My Tho'),
('4444', 'Hồ Văn hải', '123 Nguyễn Trãi My Tho'),
('5555', 'Nguyễn Thị Nam', '123 Nguyễn Trãi My Tho'),
('MKH01', 'Hồ Văn Cường', '123 Nguyễn Trãi My Tho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MADH`,`MAHH`),
  ADD KEY `MAHH` (`MAHH`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADH`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MAHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MADH`) REFERENCES `donhang` (`MADH`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MAHH`) REFERENCES `hanghoa` (`MAHH`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
