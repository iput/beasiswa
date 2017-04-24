-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2017 at 09:52 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `user_id` varchar(12) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `status` enum('open','close') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id-beasiswa` int(11) NOT NULL,
  `nama-beasiswa` varchar(100) DEFAULT NULL,
  `penyelenggara-bea` varchar(100) DEFAULT NULL,
  `beasiswa-dibuka` date DEFAULT NULL,
  `beasiswa-tutup` date DEFAULT NULL,
  `status-beasiswa` tinyint(1) DEFAULT NULL,
  `status_tabel` enum('sudah','belum') DEFAULT NULL,
  `kuota` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fk` int(11) NOT NULL,
  `nama_fk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `identitas_mhs`
--

CREATE TABLE `identitas_mhs` (
  `nim_mhs` int(11) NOT NULL,
  `nama-lengkap` varchar(100) DEFAULT NULL,
  `tempat-lahir` text,
  `tgl-lahir` date DEFAULT NULL,
  `asal_kota` varchar(20) DEFAULT NULL,
  `nama_ortu` varchar(20) DEFAULT NULL,
  `alamat_ortu` text,
  `kota_ortu` varchar(30) DEFAULT NULL,
  `propinsi_ortu` varchar(30) DEFAULT NULL,
  `angkatan` char(5) DEFAULT NULL,
  `jenis-kel` tinyint(1) DEFAULT NULL,
  `alamat-lengkap` text,
  `email-aktif` varchar(100) DEFAULT NULL,
  `no-telp` char(12) DEFAULT NULL,
  `foto_mhs` varchar(10) DEFAULT NULL,
  `id_jrs` int(11) DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_admin`
--

CREATE TABLE `info_admin` (
  `id_adm` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` char(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` int(11) NOT NULL,
  `nama_jur` varchar(100) DEFAULT NULL,
  `id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerima_bea`
--

CREATE TABLE `penerima_bea` (
  `nim` int(11) DEFAULT NULL,
  `id_bea` int(11) DEFAULT NULL,
  `total_bobot` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bobot`
--

CREATE TABLE `tbl_bobot` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `length` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_default`
--

CREATE TABLE `tbl_default` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tipe` varchar(10) DEFAULT NULL,
  `length` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id-beasiswa`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fk`);

--
-- Indexes for table `identitas_mhs`
--
ALTER TABLE `identitas_mhs`
  ADD PRIMARY KEY (`nim_mhs`),
  ADD KEY `jurusan-mhs` (`id_jrs`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `info_admin`
--
ALTER TABLE `info_admin`
  ADD PRIMARY KEY (`id_adm`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`),
  ADD KEY `jurusan_fk` (`id_fk`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_default`
--
ALTER TABLE `tbl_default`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id-beasiswa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info_admin`
--
ALTER TABLE `info_admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses`
--
ALTER TABLE `akses`
  ADD CONSTRAINT `akses_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `identitas_mhs`
--
ALTER TABLE `identitas_mhs`
  ADD CONSTRAINT `identitas_mhs_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jurusan-mhs` FOREIGN KEY (`id_jrs`) REFERENCES `jurusan` (`id_jur`);

--
-- Constraints for table `info_admin`
--
ALTER TABLE `info_admin`
  ADD CONSTRAINT `info_admin_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_fk` FOREIGN KEY (`id_fk`) REFERENCES `fakultas` (`id_fk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
