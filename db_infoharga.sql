-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 09:36 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_infoharga`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `noid` int(10) NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pernikahan` varchar(20) NOT NULL,
  `ipk` decimal(4,2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`noid`, `kelamin`, `status`, `pernikahan`, `ipk`, `keterangan`) VALUES
(1, 'L', 'MAHASISWA', 'BELUM', '3.17', 'TEPAT'),
(2, 'L', 'BEKERJA', 'BELUM', '3.30', 'TEPAT'),
(3, 'P', 'MAHASISWA', 'BELUM ', '3.01', 'TEPAT'),
(4, 'P', 'MAHASISWA', 'MENIKAH', '3.25', 'TEPAT'),
(5, 'L', 'BEKERJA', 'MENIKAH', '3.20', 'TEPAT'),
(6, 'L', 'BEKERJA', 'MENIKAH', '2.50', 'TERLAMBAT'),
(7, 'P', 'BEKERJA', 'MENIKAH', '3.00', 'TERLAMBAT'),
(8, 'P', 'BEKERJA', 'BELUM', '2.70', 'TERLAMBAT'),
(9, 'L', 'BEKERJA', 'BELUM', '2.40', 'TERLAMBAT'),
(10, 'P', 'MAHASISWA', 'MENIKAH', '2.50', 'TERLAMBAT'),
(11, 'P', 'MAHASISWA', 'BELUM', '2.50', 'TEPAT'),
(12, 'P', 'MAHASISWA', 'BELUM', '3.50', 'TEPAT'),
(13, 'L', 'BEKERJA', 'MENIKAH', '3.30', 'TEPAT'),
(14, 'L', 'MAHASISWA', 'MENIKAH', '3.25', 'TEPAT'),
(15, 'L', 'MAHASISWA', 'BELUM', '2.30', 'TERLAMBAT'),
(96, 'L', 'MAHASISWA', 'BELUM', '2.70', 'TERLAMBAT'),
(97, 'L', 'MAHASISWA', 'MENIKAH', '2.30', 'TERLAMBAT'),
(100, 'P', 'MAHASISWA', 'BELUM', '2.70', 'TERLAMBAT'),
(101, 'L', 'BEKERJA', 'MENIKAH', '2.80', 'TEPAT'),
(102, 'P', 'MAHASISWA', 'MENIKAH', '2.99', 'TEPAT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahanpokok`
--

CREATE TABLE `tb_bahanpokok` (
  `id_bahanpokok` int(11) NOT NULL,
  `nama_bahan_pokok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bahanpokok`
--

INSERT INTO `tb_bahanpokok` (`id_bahanpokok`, `nama_bahan_pokok`) VALUES
(7, 'Beras'),
(8, 'Sayuran'),
(9, 'Buah-buahan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hargakomoditas`
--

CREATE TABLE `tb_hargakomoditas` (
  `id_komoditas` int(11) NOT NULL,
  `id_bahanpokok` int(11) NOT NULL,
  `id_jenisbahanpokok` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `tgl_update` date NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hargakomoditas`
--

INSERT INTO `tb_hargakomoditas` (`id_komoditas`, `id_bahanpokok`, `id_jenisbahanpokok`, `id_pasar`, `satuan`, `tgl_update`, `harga`) VALUES
(77, 7, 14, 1, 'Kg', '2017-01-17', 7200),
(78, 7, 14, 1, 'Kg', '2017-01-18', 7300),
(79, 7, 14, 1, 'Kg', '2017-01-19', 7500),
(80, 7, 14, 1, 'Kg', '2017-01-20', 7600),
(81, 9, 24, 1, 'Bh', '2017-01-17', 16000),
(82, 9, 24, 1, 'Bh', '2017-01-18', 17000),
(83, 9, 24, 1, 'Bh', '2017-01-19', 19300),
(84, 9, 24, 1, 'Bh', '2017-01-20', 17700),
(85, 9, 25, 1, 'Bh', '2017-01-17', 16000),
(86, 9, 25, 1, 'Bh', '2017-01-18', 13700),
(87, 9, 25, 1, 'Bh', '2017-01-19', 15700),
(88, 9, 25, 1, 'Bh', '2017-01-20', 15000),
(89, 8, 16, 1, 'Kg', '2017-01-17', 6000),
(90, 8, 16, 1, 'Kg', '2017-01-18', 5300),
(91, 8, 16, 1, 'Kg', '2017-01-19', 7700),
(92, 8, 16, 1, 'Kg', '2017-01-20', 7700),
(93, 8, 17, 1, 'Kg', '2017-01-17', 8700),
(94, 8, 17, 1, 'Kg', '2017-01-18', 7000),
(96, 8, 17, 1, 'Kg', '2017-01-19', 13300),
(97, 8, 17, 1, 'Kg', '2017-01-20', 11300),
(98, 8, 18, 1, 'Kg', '2017-01-17', 11300),
(99, 9, 18, 1, 'Kg', '2017-01-18', 8300),
(100, 9, 18, 1, 'Kg', '2017-01-19', 12300),
(101, 8, 18, 1, 'Kg', '2017-01-20', 12700),
(102, 8, 19, 1, 'Kg', '2017-01-17', 7000),
(103, 8, 19, 1, 'Kg', '2017-01-18', 8700),
(104, 8, 19, 1, 'Kg', '2017-01-19', 4000),
(105, 8, 19, 1, 'Kg', '2017-01-20', 4700),
(106, 8, 20, 1, 'Kg', '2017-01-17', 30700),
(107, 8, 20, 1, 'Kg', '2017-01-18', 38700),
(108, 8, 20, 1, 'Kg', '2017-01-19', 23700),
(109, 8, 20, 1, 'Kg', '2017-01-20', 28300),
(113, 9, 24, 3, 'Kg', '2017-02-25', 89772),
(114, 9, 24, 1, 'Bh', '2017-02-27', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_prediksi`
--

CREATE TABLE `tb_hasil_prediksi` (
  `id` int(11) NOT NULL,
  `kondisi_bahan_pokok` varchar(50) NOT NULL,
  `cuaca` varchar(50) NOT NULL,
  `persediaan` varchar(50) NOT NULL,
  `kondisi_kendaraan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil_prediksi`
--

INSERT INTO `tb_hasil_prediksi` (`id`, `kondisi_bahan_pokok`, `cuaca`, `persediaan`, `kondisi_kendaraan`, `keterangan`) VALUES
(35, 'Baik', 'Baik', 'Banyak', 'Baik', 'Turun'),
(36, 'Rusak', 'Buruk', 'kurang', 'Rusak', 'Turun'),
(37, 'Baik', 'Baik', 'kurang', 'Rusak', 'Turun'),
(38, 'Baik', 'Buruk', 'kurang', 'Rusak', 'Naik'),
(39, 'Rusak', 'Baik', 'Banyak', 'Baik', 'Turun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisbahanpokok`
--

CREATE TABLE `tb_jenisbahanpokok` (
  `id_jenisbahanpokok` int(11) NOT NULL,
  `nama_jenis_bahan_pokok` varchar(100) NOT NULL,
  `foto_jenis_bahan_pokok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenisbahanpokok`
--

INSERT INTO `tb_jenisbahanpokok` (`id_jenisbahanpokok`, `nama_jenis_bahan_pokok`, `foto_jenis_bahan_pokok`) VALUES
(14, 'Beras IR 1', 'b0ea6-beras.png'),
(15, 'Beras Ketan Putih', '030c1-5ae08-c7cf9-putih-beras_zps2dfdcce7.jpg'),
(16, 'Kol', '22022-kol.jpg'),
(17, 'Wortel', 'ae9a3-wortel.jpg'),
(18, 'Kentang', '8502c-kentang.jpg'),
(19, 'Tomat', 'a8a8a-082399700_1444710907-tomat-rsmadkotakediri.jpg'),
(20, 'Bawang Merah', '58cd9-fakta-mengejutkan-manfaat-bawang-merah-sangat-manjur-untuk-kesehatan.jpg'),
(21, 'Cabe Merah Besar', 'd3317-download.jpg'),
(24, 'Semangka', '9e69b-semangka1.jpg'),
(25, 'Pepaya', '33b9c-manfaat-pepaya-300x206.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasar`
--

CREATE TABLE `tb_pasar` (
  `id_pasar` int(11) NOT NULL,
  `nama_pasar` varchar(100) NOT NULL,
  `alamat_pasar` varchar(200) NOT NULL,
  `biografi_pasar` text NOT NULL,
  `foto_pasar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasar`
--

INSERT INTO `tb_pasar` (`id_pasar`, `nama_pasar`, `alamat_pasar`, `biografi_pasar`, `foto_pasar`) VALUES
(1, 'Minasa Maupa', 'Sungguminasa', '<div style="text-align: justify;">\r\n	Pasar terbaik di gowa Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</div>\r\n<div>\r\n	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>\r\n<div>\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</div>\r\n<div>\r\n	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</div>\r\n<div>\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</div>\r\n<div>\r\n	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>\r\n', '1d1c5-eu-tomato-import-rules-change-to-incorporate-variety.jpg'),
(3, 'Sentral', 'jl gowa', '<p>\r\n	lorem ipsum</p>\r\n', '51cd4-al-qur-an-lebih-utama-1366.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prediksi`
--

CREATE TABLE `tb_prediksi` (
  `id` int(11) NOT NULL,
  `kondisi_bahan_pokok` varchar(50) NOT NULL,
  `cuaca` varchar(50) NOT NULL,
  `persediaan` varchar(50) NOT NULL,
  `kondisi_kendaraan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prediksi`
--

INSERT INTO `tb_prediksi` (`id`, `kondisi_bahan_pokok`, `cuaca`, `persediaan`, `kondisi_kendaraan`, `keterangan`) VALUES
(23, 'Baik', 'Baik', 'Banyak', 'Baik', 'Turun'),
(24, 'Baik', 'Baik', 'Banyak', 'Rusak', 'Turun'),
(26, 'Baik', 'Baik', 'kurang', 'Rusak', 'Naik'),
(27, 'Rusak', 'Buruk', 'kurang', 'Rusak', 'Turun'),
(28, 'Rusak', 'Baik', 'Banyak', 'Baik', 'Turun'),
(29, 'Rusak', 'Buruk', 'kurang', 'Baik', 'Turun'),
(30, 'Baik', 'Buruk', 'kurang', 'Rusak', 'Naik'),
(31, 'Baik', 'Buruk', 'Banyak', 'Baik', 'Naik'),
(32, 'Baik', 'Buruk', 'Banyak', 'Rusak', 'Naik'),
(33, 'Rusak', 'Baik', 'Banyak', 'Rusak', 'Turun'),
(34, 'Rusak', 'Buruk', 'kurang', 'Baik', 'Naik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` enum('admin','staff','staff-2','staff-3') NOT NULL DEFAULT 'staff',
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `role`, `username`, `password`, `full_name`, `active`, `created_at`) VALUES
(5, 'staff', 'lutfi', 'f1c495f0a1cda1847aff63723c409be0', 'muh lutfi', 1, '2017-01-20 01:29:35'),
(6, 'staff', 'staff', 'f7a841964721c3bef72896d4591d405c', 'staff', 1, '2017-01-20 01:31:59'),
(7, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2017-01-20 01:38:38'),
(8, 'admin', 'lutfi', '21232f297a57a5a743894a0e4a801fc3', 'muh lutfi', 1, '2017-01-25 06:00:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`noid`);

--
-- Indexes for table `tb_bahanpokok`
--
ALTER TABLE `tb_bahanpokok`
  ADD PRIMARY KEY (`id_bahanpokok`);

--
-- Indexes for table `tb_hargakomoditas`
--
ALTER TABLE `tb_hargakomoditas`
  ADD PRIMARY KEY (`id_komoditas`),
  ADD KEY `id_bahanpokok` (`id_bahanpokok`),
  ADD KEY `id_jenisbahanpokok` (`id_jenisbahanpokok`),
  ADD KEY `id_pasar` (`id_pasar`);

--
-- Indexes for table `tb_hasil_prediksi`
--
ALTER TABLE `tb_hasil_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenisbahanpokok`
--
ALTER TABLE `tb_jenisbahanpokok`
  ADD PRIMARY KEY (`id_jenisbahanpokok`);

--
-- Indexes for table `tb_pasar`
--
ALTER TABLE `tb_pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indexes for table `tb_prediksi`
--
ALTER TABLE `tb_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `noid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tb_bahanpokok`
--
ALTER TABLE `tb_bahanpokok`
  MODIFY `id_bahanpokok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_hargakomoditas`
--
ALTER TABLE `tb_hargakomoditas`
  MODIFY `id_komoditas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `tb_hasil_prediksi`
--
ALTER TABLE `tb_hasil_prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_jenisbahanpokok`
--
ALTER TABLE `tb_jenisbahanpokok`
  MODIFY `id_jenisbahanpokok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_pasar`
--
ALTER TABLE `tb_pasar`
  MODIFY `id_pasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_prediksi`
--
ALTER TABLE `tb_prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hargakomoditas`
--
ALTER TABLE `tb_hargakomoditas`
  ADD CONSTRAINT `tb_hargakomoditas_ibfk_1` FOREIGN KEY (`id_bahanpokok`) REFERENCES `tb_bahanpokok` (`id_bahanpokok`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_hargakomoditas_ibfk_2` FOREIGN KEY (`id_jenisbahanpokok`) REFERENCES `tb_jenisbahanpokok` (`id_jenisbahanpokok`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_hargakomoditas_ibfk_3` FOREIGN KEY (`id_pasar`) REFERENCES `tb_pasar` (`id_pasar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
