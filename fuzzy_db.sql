-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 01:37 PM
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
-- Database: `fuzzy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporanprediksi`
--

CREATE TABLE `laporanprediksi` (
  `id` int(11) NOT NULL,
  `prediksi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporanprediksi`
--

INSERT INTO `laporanprediksi` (`id`, `prediksi`) VALUES
(6, 17587);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `tahun` int(255) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `semester`, `tahun`, `nama_pemesan`, `produk`, `jumlah`) VALUES
(18, '1', 2018, 'test', 'kecil', 17750),
(19, '2', 2018, 'test', 'kecil', 18857),
(20, '1', 2019, 'test', 'besar', 18600),
(21, '2', 2019, 'test', 'besar', 19490),
(22, '1', 2020, 'test', 'kecil', 19200),
(23, '2', 2020, 'test', 'kecil', 19000),
(24, '1', 2021, 'test', 'besar', 18650),
(25, '2', 2021, 'TEST', 'besar', 18500),
(26, '1', 2022, 'test', 'kecil', 19700),
(27, '2', 2022, 'test', 'kecil', 18700);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id` int(11) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `tahun` int(255) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id`, `semester`, `tahun`, `nama_pemesan`, `produk`, `jumlah`) VALUES
(15, '1', 2018, 'test', 'besar', 9800),
(16, '2', 2018, 'test', 'besar', 10350),
(17, '1', 2019, 'test', 'besar', 7200),
(18, '2', 2019, 'test', 'kecil', 8000),
(19, '1', 2020, 'test', 'besar', 6800),
(20, '2', 2020, 'test', 'kecil', 7200),
(21, '1', 2021, 'test', 'kecil', 7700),
(22, '2', 2021, 'test', 'kecil', 6300),
(23, '1', 2022, 'test', 'kecil', 6360),
(24, '2', 2022, 'test', 'kecil', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id` int(11) NOT NULL,
  `sediaMax` int(255) NOT NULL,
  `sediaMin` int(255) NOT NULL,
  `mintaMax` int(255) NOT NULL,
  `mintaMin` int(255) NOT NULL,
  `prodMax` int(255) NOT NULL,
  `prodMin` int(255) NOT NULL,
  `mintaSkr` int(255) NOT NULL,
  `sediaSkr` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prediksi`
--

INSERT INTO `prediksi` (`id`, `sediaMax`, `sediaMin`, `mintaMax`, `mintaMin`, `prodMax`, `prodMin`, `mintaSkr`, `sediaSkr`) VALUES
(37, 10350, 6000, 19700, 17750, 19930, 18570, 18000, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `tahun` int(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `semester`, `tahun`, `produk`, `jumlah`) VALUES
(20, '1', 2018, 'kecil', 19700),
(22, '2', 2018, 'besar', 19250),
(23, '1', 2019, 'kecil', 19930),
(24, '2', 2019, 'kecil', 18820),
(25, '1', 2020, 'kecil', 19900),
(26, '2', 2020, 'kecil', 19340),
(27, '1', 2021, 'kecil', 18920),
(28, '2', 2021, 'kecil', 19800),
(29, '1', 2022, 'besar', 19800),
(30, '2', 2022, 'kecil', 18570);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`) VALUES
(3, 'admin', 'admin', 'letmein', 'admin'),
(4, 'owner', 'owner', 'letmein', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporanprediksi`
--
ALTER TABLE `laporanprediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporanprediksi`
--
ALTER TABLE `laporanprediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
