-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 12:57 PM
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
  `bulan` varchar(255) NOT NULL,
  `tahun` int(255) NOT NULL,
  `prediksi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporanprediksi`
--

INSERT INTO `laporanprediksi` (`id`, `bulan`, `tahun`, `prediksi`) VALUES
(1, 'November', 2022, 4373),
(2, 'November', 2022, 4373),
(3, 'November', 2022, 4373);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tahun` enum('2020','2021','2022','2023','2024') NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `bulan`, `tahun`, `nama_pemesan`, `produk`, `jumlah`) VALUES
(14, 'November', '2022', 'jane', 'kecil', 5204),
(15, 'November', '2022', 'jone', 'kecil', 3196);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id` int(11) NOT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tahun` enum('2020','2021','2022','2023','2024') NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id`, `bulan`, `tahun`, `nama_pemesan`, `produk`, `jumlah`) VALUES
(11, 'November', '2022', 'jaen', 'kecil', 452),
(12, 'November', '2022', 'test', 'kecil', 198);

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` int(255) NOT NULL,
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

INSERT INTO `prediksi` (`id`, `bulan`, `tahun`, `sediaMax`, `sediaMin`, `mintaMax`, `mintaMin`, `prodMax`, `prodMin`, `mintaSkr`, `sediaSkr`) VALUES
(14, 'November', 2022, 452, 198, 5204, 3196, 5570, 3400, 4017, 353),
(15, 'November', 2022, 452, 198, 5204, 3196, 5570, 3400, 4017, 353),
(16, 'November', 2022, 452, 198, 5204, 3196, 5570, 3400, 4017, 353),
(17, 'November', 2022, 452, 198, 5204, 3196, 5570, 3400, 4017, 353);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tahun` enum('2020','2021','2022','2023','2024') NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `bulan`, `tahun`, `produk`, `jumlah`) VALUES
(6, 'November', '2022', 'besar', 5570),
(7, 'November', '2022', 'besar', 3400);

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
(1, 'Aditya Suryana', 'adityasuryana', 'letmein', 'admin'),
(2, 'John Doe', 'johndoe', 'letmein', 'owner'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
