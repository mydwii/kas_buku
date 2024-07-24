-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 05:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `keterangan` varchar(70) NOT NULL,
  `nominal` float NOT NULL,
  `username` varchar(50) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `keterangan`, `nominal`, `username`, `jenis_transaksi`, `tanggal`) VALUES
(12, 'uang kas', 175000, 'yoo', 'Pemasukan', '2023-08-20'),
(13, 'uang transport', 25000, 'fauzan', 'Pengeluaran', '2023-08-20'),
(14, 'kas rutin', 60000, 'yoo', 'Pemasukan', '2023-08-21'),
(15, 'bansos ', 100000, 'yoo', 'Pengeluaran', '2023-08-21'),
(16, 'dana wali kelas', 300000, 'fauzan', 'Pemasukan', '2023-08-18'),
(17, 'jual jahe', 20000, 'jeje', 'Pemasukan', '2023-08-21'),
(18, 'parkir', 5000, 'jeje', 'Pengeluaran', '2023-08-21'),
(19, 'laba bazar', 600000, 'admin', 'Pemasukan', '2023-05-26'),
(20, 'ganti uang modal', 100000, 'admin', 'Pengeluaran', '2023-06-08'),
(21, 'iyuran ', 700000, 'jeje', 'Pemasukan', '2023-08-23'),
(22, 'transport', 12000, 'jeje', 'Pengeluaran', '2023-08-22'),
(23, 'ganti roti', 5000, 'fauzan', 'Pemasukan', '2023-08-22'),
(24, 'beli perban', 20000, 'fauzan', 'Pengeluaran', '2023-08-22'),
(25, 'hasil jual temuireng', 12000, 'yoo', 'Pemasukan', '2023-08-22'),
(26, 'hasil jual kencur', 10000, 'yoo', 'Pemasukan', '2023-08-22'),
(27, 'uang dari bu guru', 50000, 'yoo', 'Pemasukan', '2023-08-22'),
(28, 'uang cair ', 20000, 'yoo', 'Pemasukan', '2023-08-22'),
(29, 'beli oksigen', 60000, 'yoo', 'Pengeluaran', '2023-08-22'),
(30, 'beli obat-obatan', 50000, 'yoo', 'Pengeluaran', '2023-08-24'),
(31, 'beli bibit tanaman obat', 40000, 'yoo', 'Pengeluaran', '2023-08-22'),
(32, 'transport', 20000, 'yoo', 'Pengeluaran', '2023-08-24'),
(33, 'beli perkab', 20000, 'yoo', 'Pengeluaran', '2023-08-22'),
(34, 'parkir 4 tempat', 8000, 'yoo', 'Pengeluaran', '2023-08-22'),
(38, 'kas nunggak', 10000, 'fauzan', 'Pengeluaran', '2023-08-23'),
(39, 'ganti konsumsi', 20000, 'yoo', 'Pemasukan', '2023-08-24'),
(40, 'beli oxicon dan promag', 70000, 'admin', 'Pengeluaran', '2023-08-31'),
(41, 'kas forpis', 15000, 'admin', 'Pengeluaran', '2023-08-31'),
(42, 'dr guru', 10000, 'yoo', 'Pemasukan', '2023-09-01'),
(43, 'makan ', 20000, 'yoo', 'Pengeluaran', '2023-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `kelas`, `alamat`, `password`, `level`, `gambar`) VALUES
(18, 'yoo', 'filip dwi utomo', 'XI RB', 'Matesih', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
