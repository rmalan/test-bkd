-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2020 at 11:32 AM
-- Server version: 10.3.22-MariaDB-1:10.3.22+maria~bionic-log
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_bkd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `cuti_id` int(11) NOT NULL,
  `cuti_nip` varchar(18) NOT NULL,
  `cuti_tanggal_mulai` date NOT NULL,
  `cuti_tanggal_selesai` date NOT NULL,
  `cuti_sub_jenis_id` int(11) NOT NULL,
  `cuti_nomor_surat` varchar(50) NOT NULL,
  `cuti_keterangan` text NOT NULL,
  `cuti_created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`cuti_id`, `cuti_nip`, `cuti_tanggal_mulai`, `cuti_tanggal_selesai`, `cuti_sub_jenis_id`, `cuti_nomor_surat`, `cuti_keterangan`, `cuti_created_at`) VALUES
(1, '1', '2020-02-20', '2020-02-21', 1, '111/BKD', '-', '2020-02-19'),
(2, '2', '2020-02-28', '2020-02-28', 4, '111/BKD', '-', '2020-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keterangan`
--

CREATE TABLE `jenis_keterangan` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_keterangan`
--

INSERT INTO `jenis_keterangan` (`jenis_id`, `jenis_nama`) VALUES
(1, 'Cuti'),
(2, 'Pendidikan'),
(3, 'Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nip` varchar(18) NOT NULL,
  `pegawai_nama` varchar(50) NOT NULL,
  `pegawai_jk` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_nama`, `pegawai_jk`) VALUES
(1, '196609101988052001', 'Test Pegawai Perempuan', 'Perempuan'),
(2, '196506221986051001', 'Test Pegawai Laki-Laki', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `sub_jenis_keterangan`
--

CREATE TABLE `sub_jenis_keterangan` (
  `sub_jenis_id` int(11) NOT NULL,
  `sub_jenis_jenis_id` int(11) NOT NULL,
  `sub_jenis_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_jenis_keterangan`
--

INSERT INTO `sub_jenis_keterangan` (`sub_jenis_id`, `sub_jenis_jenis_id`, `sub_jenis_nama`) VALUES
(1, 1, 'Cuti Tahunan'),
(2, 1, 'Cuti Alasan Penting'),
(3, 1, 'Cuti Sakit'),
(4, 1, 'Cuti Besar'),
(5, 1, 'Cuti Bersalin'),
(6, 1, 'Cuti Luar Tanggungan Negara'),
(7, 2, 'Diklat Teknis'),
(8, 2, 'Diklat Struktural'),
(9, 2, 'Diklat Struktur'),
(10, 2, 'Tugas Belajar'),
(11, 3, 'Dinas Dalam Daerah'),
(12, 3, 'Dinas Luar Daerah'),
(13, 3, 'Dinas Dalam Kota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indexes for table `jenis_keterangan`
--
ALTER TABLE `jenis_keterangan`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `sub_jenis_keterangan`
--
ALTER TABLE `sub_jenis_keterangan`
  ADD PRIMARY KEY (`sub_jenis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_keterangan`
--
ALTER TABLE `jenis_keterangan`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_jenis_keterangan`
--
ALTER TABLE `sub_jenis_keterangan`
  MODIFY `sub_jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
