-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 12:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `noisbn` int(50) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `stok` int(50) DEFAULT NULL,
  `harga_pokok` int(255) DEFAULT NULL,
  `harga_jual` int(255) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `gambar`) VALUES
(18, 'Mission Impossible 7', 987651, 'Muhammad', 'bintang', 2023, 211, 25000, 36000, 'Mission Impossible 7.jpg'),
(24, 'Belajar Coding', 987611, 'zainur', 'bintang', 2023, 8, 25000, 36000, 'coding211.jpeg'),
(25, 'Bahasa Inggris', 987611, 'Muhammad', 'bintang', 2023, 70, 40000, 80000, 'inggris1.jpeg'),
(26, 'One Piece 100', 98721, 'Muhammad', 'bintang', 2023, 211, 42000, 80000, 'One_Piece_100.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah` int(50) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_buku`, `jumlah`, `harga`, `total`) VALUES
(3, 19, 18, 2, 28000, 56000),
(4, 20, 20, 1, 30000, 30000),
(58, 84, 18, 3, 36000, 108000),
(59, 85, 24, 2, 36000, 72000);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `transaksi` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
	UPDATE buku SET stok = stok-NEW.jumlah
    WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(3, 'bintang', 'Jl.Ikan ', '+62 398-47-58483'),
(9, 'Muhammad Zainur', 'JL. Kendal Sari Gang 03', '+62 880-73-44470'),
(10, 'zainur', 'Jl.Ikan Piranha Atas', '1213311'),
(11, 'bintang', 'Malang', '1213354');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(15) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `level`) VALUES
(1, 'bintang', 'JL.KendalSari', 856744, '0', 'bintang', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'zainur', 'JL.Malang', 856765, '0', 'zainur', '202cb962ac59075b964b07152d234b70', 'pemilik'),
(6, 'Muhammad Zainur', 'Jl.Ikan Piranha Atas', 1213311, '1', 'muhammad zainur', '202cb962ac59075b964b07152d234b70', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(32, 11, 18, 12, '2023-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_kasir` int(11) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_kasir`, `total`, `tanggal`) VALUES
(19, 1, 116000, '2023-12-01'),
(20, 1, 30000, '2023-11-01'),
(84, 1, 108000, '2023-12-07'),
(85, 2, 72000, '2023-12-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_distributor` (`id_distributor`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`);

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
