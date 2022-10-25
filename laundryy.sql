-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 02:01 AM
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
-- Database: `laundryy`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_paket`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(3, 1, 1, 1),
(4, 1, 1, 1),
(5, 1, 1, 1),
(6, 2, 1, 1),
(7, 2, 2, 1),
(8, 2, 3, 1),
(9, 3, 1, 5),
(10, 4, 1, 40),
(11, 4, 2, 4),
(12, 4, 3, 2),
(13, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `alamat`, `jk`, `telp`, `kota`) VALUES
(1, 'Rafif', 'jl.malang', 'L', '081252255258', 'Nganjuk'),
(2, 'Hegel', 'Jl. Danau Poso 1 Sawojajar, Kedungkandang, Kota Malang, Jawa Timur', 'L', '081252255258', 'Malang'),
(3, 'Kunz', 'jl.malang', 'L', '085851547479', 'Nganjuk');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(1, 'Paket Gede (5Kg)', 20000),
(2, 'Paket Hemat (3Kg)', 15000),
(3, 'Paket Super Hemat (1 KG)', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` enum('lunas','belum lunas') NOT NULL,
  `status_order` enum('baru','diproses','selesai','diambil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_member`, `id_user`, `tgl_transaksi`, `batas_waktu`, `tgl_bayar`, `status_bayar`, `status_order`) VALUES
(1, 3, 1, '2022-10-04', '2022-10-09', '2022-10-04', 'lunas', 'diambil'),
(2, 1, 1, '2022-10-08', '2022-10-13', '2022-10-11', 'lunas', 'diambil'),
(3, 2, 1, '2022-10-11', '2022-10-16', '2022-10-11', 'lunas', 'diambil'),
(4, 2, 1, '2022-10-20', '2022-10-25', '2022-10-20', 'lunas', 'diambil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','kasir') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Nayottama Lucky Mustafa', 'Nayo', '202cb962ac59075b964b07152d234b70', 'admin', 'img.jfif'),
(2, 'Nur Aliyah Zizi Hamidah', 'Zz', '250cf8b51c773f3f8dc8b4be867a9a02', 'kasir', ''),
(3, 'Hegel', 'Heg', '202cb962ac59075b964b07152d234b70', 'kasir', '9480-Dokumentasi MCC (1).jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
