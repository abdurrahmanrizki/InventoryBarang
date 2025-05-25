-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 01:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `satuan_barang` varchar(20) NOT NULL,
  `harga_beli` decimal(20,2) NOT NULL,
  `status_barang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `harga_beli`, `status_barang`) VALUES
(2, 'BRG001', 'Buku Tulis', 50, 'pcs', 500.00, 1),
(3, 'BRG002', 'Pensil 2B', 100, 'pcs', 2000.00, 1),
(4, 'BRG003', 'Penghapus', 30, 'pcs', 1500.00, 1),
(5, 'BRG004', 'Penggaris 30cm', 25, 'pcs', 3000.00, 1),
(6, 'BRG005', 'Spidol Whiteboard', 20, 'pcs', 10000.00, 1),
(7, 'BRG006', 'Kertas HVS A4', 10, 'pack', 35000.00, 1),
(8, 'BRG007', 'Stapler', 15, 'pcs', 25000.00, 1),
(9, 'BRG008', 'Isi Stapler', 5, 'box', 15000.00, 1),
(10, 'BRG009', 'Gunting', 12, 'pcs', 18000.00, 1),
(11, 'BRG010', 'Lem Kertas', 8, 'pcs', 8000.00, 1),
(12, 'BRG011', 'Tinta Printer Hitam', 5, 'pcs', 75000.00, 1),
(13, 'BRG012', 'Tinta Printer Warna', 5, 'pcs', 90000.00, 1),
(14, 'BRG013', 'Binder Clip', 200, 'pcs', 500.00, 1),
(15, 'BRG014', 'Post-it Note', 20, 'pack', 12000.00, 1),
(16, 'BRG015', 'Map Plastik', 40, 'pcs', 2000.00, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
