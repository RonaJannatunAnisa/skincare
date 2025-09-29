-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2025 at 01:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `skincare`
--

CREATE TABLE `skincare` (
  `id_skincare` varchar(10) NOT NULL,
  `nama_skincare` varchar(255) NOT NULL,
  `jenis_skincare` varchar(100) NOT NULL,
  `expdate` date NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trs_pembelian`
--

CREATE TABLE `trs_pembelian` (
  `id_pembelian` varchar(10) NOT NULL,
  `id_skincare` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skincare`
--
ALTER TABLE `skincare`
  ADD PRIMARY KEY (`id_skincare`);

--
-- Indexes for table `trs_pembelian`
--
ALTER TABLE `trs_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `fkSkincare` (`id_skincare`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trs_pembelian`
--
ALTER TABLE `trs_pembelian`
  ADD CONSTRAINT `fkSkincare` FOREIGN KEY (`id_skincare`) REFERENCES `skincare` (`id_skincare`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
