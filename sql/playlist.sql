-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 06:14 PM
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
-- Database: `playlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `baihat`
--

CREATE TABLE `baihat` (
  `MaBaiHat` varchar(20) NOT NULL,
  `TenBaiHat` varchar(100) DEFAULT NULL,
  `TheLoai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baihat`
--

INSERT INTO `baihat` (`MaBaiHat`, `TenBaiHat`, `TheLoai`) VALUES
('BH1', 'Nắng Mai', 'Nhac trẻ'),
('BH2', 'anh yêu em', 'nhạc tình'),
('BH3', 'Đêm Chơi Vơi', 'Nhạc xưa'),
('BH4', 'Đêm Đông', 'Nhạc xưa'),
('BH5', 'Đêm Tối Khuya', 'Nhạc xưa');

-- --------------------------------------------------------

--
-- Table structure for table `casi`
--

CREATE TABLE `casi` (
  `MaCaSi` varchar(20) NOT NULL,
  `TenCaSi` varchar(100) DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `NamSinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casi`
--

INSERT INTO `casi` (`MaCaSi`, `TenCaSi`, `GioiTinh`, `NamSinh`) VALUES
('CS1', 'Thanh Lam', 0, '0000-00-00'),
('CS2', 'Thanh Hằng', 0, '0000-00-00'),
('CS3', 'Thanh My', 0, '0000-00-00'),
('CS4', 'Thanh Hải', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `casi_baihat`
--

CREATE TABLE `casi_baihat` (
  `MaCaSi` varchar(20) NOT NULL,
  `MaBaiHat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casi_baihat`
--

INSERT INTO `casi_baihat` (`MaCaSi`, `MaBaiHat`) VALUES
('CS1', 'BH1'),
('CS1', 'BH2'),
('CS2', 'BH1'),
('CS2', 'BH2');

-- --------------------------------------------------------

--
-- Table structure for table `nguoinghe`
--

CREATE TABLE `nguoinghe` (
  `MaNN` varchar(20) NOT NULL,
  `TenNN` varchar(100) DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoinghe`
--

INSERT INTO `nguoinghe` (`MaNN`, `TenNN`, `GioiTinh`) VALUES
('NN1', 'Thanh Trúc', 0),
('NN2', 'Thanh Phi', 0),
('NN3', 'Thanh My', 0),
('NN4', 'Thanh Hải', 0),
('NN5', 'Thanh Lan', 0),
('NN6', 'Thanh Nam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `MaPlayList` varchar(20) NOT NULL,
  `TenPlayList` varchar(100) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `MaNN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`MaPlayList`, `TenPlayList`, `SoLuong`, `MaNN`) VALUES
('PL1', 'Sáng sớm', 3, 'NN1'),
('PL2', 'Sáng chiều', 3, 'NN1'),
('PL3', 'Tối Muộn', 2, 'NN2'),
('PL4', 'Sáng trư', 3, 'NN1'),
('PL5', 'Sáng mai', 3, 'NN1');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_baihat`
--

CREATE TABLE `playlist_baihat` (
  `MaPlayList` varchar(20) NOT NULL,
  `MaBaiHat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist_baihat`
--

INSERT INTO `playlist_baihat` (`MaPlayList`, `MaBaiHat`) VALUES
('PL1', 'BH1'),
('PL2', 'BH1'),
('PL2', 'BH2'),
('PL2', 'BH3'),
('PL3', 'BH1'),
('PL3', 'BH4'),
('PL4', 'BH1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baihat`
--
ALTER TABLE `baihat`
  ADD PRIMARY KEY (`MaBaiHat`);

--
-- Indexes for table `casi`
--
ALTER TABLE `casi`
  ADD PRIMARY KEY (`MaCaSi`);

--
-- Indexes for table `casi_baihat`
--
ALTER TABLE `casi_baihat`
  ADD PRIMARY KEY (`MaCaSi`,`MaBaiHat`),
  ADD KEY `MaBaiHat` (`MaBaiHat`);

--
-- Indexes for table `nguoinghe`
--
ALTER TABLE `nguoinghe`
  ADD PRIMARY KEY (`MaNN`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`MaPlayList`),
  ADD KEY `MaNN` (`MaNN`);

--
-- Indexes for table `playlist_baihat`
--
ALTER TABLE `playlist_baihat`
  ADD PRIMARY KEY (`MaPlayList`,`MaBaiHat`),
  ADD KEY `MaBaiHat` (`MaBaiHat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `casi_baihat`
--
ALTER TABLE `casi_baihat`
  ADD CONSTRAINT `casi_baihat_ibfk_1` FOREIGN KEY (`MaCaSi`) REFERENCES `casi` (`MaCaSi`),
  ADD CONSTRAINT `casi_baihat_ibfk_2` FOREIGN KEY (`MaBaiHat`) REFERENCES `baihat` (`MaBaiHat`);

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`MaNN`) REFERENCES `nguoinghe` (`MaNN`);

--
-- Constraints for table `playlist_baihat`
--
ALTER TABLE `playlist_baihat`
  ADD CONSTRAINT `playlist_baihat_ibfk_1` FOREIGN KEY (`MaPlayList`) REFERENCES `playlist` (`MaPlayList`),
  ADD CONSTRAINT `playlist_baihat_ibfk_2` FOREIGN KEY (`MaBaiHat`) REFERENCES `baihat` (`MaBaiHat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
