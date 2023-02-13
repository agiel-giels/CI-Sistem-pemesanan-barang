-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 08:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miftah`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `id_pesanan` int(5) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jenis_barang` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(50) NOT NULL,
  `tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id`, `id_pesanan`, `nama_barang`, `jenis_barang`, `qty`, `harga`, `tersedia`) VALUES
(132, 30, 98, 'buku', 'atk', 20, 20000, 1),
(133, 30, 98, 'pulpen', 'atk', 20, 20000, 1),
(135, 30, 100, 'Kursi', 'Furnitur', 20, 20000, 1),
(136, 30, 100, 'Meja', 'Furnitur', 5, 150000, 2),
(138, 30, 101, 'Mouse', 'Komputer', 5, 150000, 1),
(139, 30, 101, 'Monitor', 'Komputer', 5, 200000, 1),
(140, 30, 102, 'Buku IPA', 'Buku', 40, 30000, 1),
(144, 30, 104, 'buku', 'ATK', 12, 20000, 1),
(145, 30, 105, 'Kertas A4', 'ATK', 1000, 2000, 1),
(146, 30, 106, 'buku', 'ATK', 20, 20000, 1),
(148, 30, 107, 'buku', 'atk', 12, 20000, 0),
(149, 30, 108, 'buku', 'atk', 12, 123, 0),
(150, 30, 109, 'buku', 'atk', 20, 20000, 0),
(151, 30, 109, 'pulpen', 'atk', 12, 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `status_pesan` int(11) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id`, `status_pesan`, `tgl_pesan`) VALUES
(98, 30, 4, '2021-11-21 22:29:34'),
(100, 30, 4, '2021-11-22 01:24:02'),
(101, 30, 3, '2021-11-22 01:24:10'),
(102, 30, 2, '2021-11-22 01:22:36'),
(104, 30, 2, '2021-12-21 08:22:55'),
(105, 30, 2, '2021-12-21 10:14:32'),
(106, 30, 2, '2021-12-21 10:15:10'),
(107, 30, 5, '2021-12-21 18:56:18'),
(108, 30, 2, '2021-12-21 19:16:22'),
(109, 30, 1, '2021-12-21 19:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `no_telp` bigint(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `jabatan`, `no_telp`, `alamat`, `username`, `password`) VALUES
(28, 'Shinta Nur Sayyidah', 'admin', 832718723, 'Gg. Sukarela', 'shinta', '123'),
(29, 'Hatta Nur Aripin', 'pimpinan', 832718723, 'Gg. Sukarela', 'hatta', '123'),
(30, 'Dinas Pemadam Kebakaran', 'pelanggan', 89977788772, 'Jl. Sukabumi', 'dinas_kebakaran', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
