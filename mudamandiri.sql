-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 06:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mudamandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(15) NOT NULL,
  `harga` int(20) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `kode_warna` int(11) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` int(11) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga`, `jumlah`, `jenis`, `kode_warna`, `updated_time`, `total`, `supplier`) VALUES
('sdg', 'sfdg', 12000, 8, 'Polyester (', 1, '2019-11-08 15:41:45', 96000, 'PT.a');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(15) NOT NULL,
  `pengambil` varchar(25) NOT NULL,
  `jenis` varchar(4) NOT NULL,
  `kode_warna` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`kode_barang`, `nama_barang`, `jumlah`, `harga`, `pengambil`, `jenis`, `kode_warna`, `tanggal_keluar`, `updated_time`, `total`) VALUES
('dedede', 'etet', 12, 313, 'Manager Proyek', 'Poly', 4, '0000-00-00', '2019-11-06 13:15:54', NULL),
('ppp', 'jfj', 9, 17000, 'Pelanggan', 'Poly', 0, '0000-00-00', '2019-11-08 15:57:07', 153000),
('sdg', 'sfdg', 8, 19000, 'Pelanggan', 'Poly', 0, '0000-00-00', '2019-11-08 15:49:52', 152000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `warna`, `harga`) VALUES
(1, 'Polyester (PE)', 'Kuning', 20000),
(2, 'Polyester (PE)', 'Merah', 30000),
(3, 'Polyester (PE)', 'Biru', 25000),
(4, 'Polyester (PE)', 'Putih', 19000),
(5, 'Poly Vinil De Plouride (PVDF)', 'Biru', 15000),
(6, 'Poly Vinil De Plouride (PVDF)', 'Ungu', 17000),
(7, 'Poly Vinil De Plouride (PVDF)', 'Kuning', 19000),
(8, 'Poly Vinil De Plouride (PVDF)', 'Hijau', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `kode_pengguna` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`kode_pengguna`, `nama`, `jabatan`, `foto`, `email`, `username`, `password`) VALUES
(1, 'staff', 'staff', NULL, 'staff@staff.com', 'staff', '1253208465b1efa876f982d8a9e73eef'),
(2, 'kepala gudang', 'kepala gudang', NULL, 'kepalagudang@gudang.com', 'kepagu', '6d4c376f94e6d22bd2f2be753ad0e2d9'),
(10, 'edi', 'staff', NULL, 'e@e.e', 'root', ''),
(11, 'umi', 'staff', NULL, 'udin@u.i', 'root', ''),
(12, 'umi', 'staff', NULL, 'udin@u.i', 'root', ''),
(13, 'umi', 'staff', NULL, 'udin@u.i', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `kode_warna` int(11) NOT NULL,
  `nama_warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`kode_warna`, `nama_warna`) VALUES
(1, 'Bright Silver'),
(2, 'Sub Silver'),
(3, 'White'),
(4, 'Red'),
(5, 'Dark Blue'),
(6, 'Orange'),
(7, 'Ruby Red'),
(8, 'White Glossy'),
(9, 'Red Glossy'),
(10, 'Yellow Glossy'),
(11, 'Blue Glossy'),
(12, 'Green Glossy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kode_pengguna`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`kode_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `kode_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kode_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `kode_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
