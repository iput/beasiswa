-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2017 at 05:37 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bea`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE IF NOT EXISTS `akses` (
  `id` int(11) NOT NULL,
  `userId` varchar(12) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `idLevel` int(11) DEFAULT NULL,
  `status` enum('open','close') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `userId`, `password`, `idLevel`, `status`) VALUES
(1, '15650025', '12345678', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bea`
--

CREATE TABLE IF NOT EXISTS `bea` (
  `id` int(11) NOT NULL,
  `namaBeasiswa` varchar(100) DEFAULT NULL,
  `penyelenggaraBea` varchar(100) DEFAULT NULL,
  `beasiswaDibuka` date DEFAULT NULL,
  `beasiswaTutup` date DEFAULT NULL,
  `statusBeasiswa` tinyint(1) DEFAULT '2' COMMENT '0=tutup, 1=aktif, 2=ditolak, 3=dikonfirmasi',
  `kuota` char(10) DEFAULT NULL,
  `selektor` int(1) NOT NULL COMMENT '1=kasubag kemahasiswaa, 2=kasubag fakultas, 3=keduanya',
  `keterangan` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bea`
--

INSERT INTO `bea` (`id`, `namaBeasiswa`, `penyelenggaraBea`, `beasiswaDibuka`, `beasiswaTutup`, `statusBeasiswa`, `kuota`, `selektor`, `keterangan`) VALUES
(1, 'Prestasi', 'UIN Malang', '2017-07-04', '2017-07-18', 3, '50', 3, NULL),
(12, 'BRI Prestasi', 'Bank BRI Syariah', '2017-07-05', '2017-07-19', 2, '45', 1, 'scoring masih kosong');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` int(11) NOT NULL,
  `namaFk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `namaFk`) VALUES
(1, 'Saintek');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_mhs`
--

CREATE TABLE IF NOT EXISTS `identitas_mhs` (
  `nimMhs` int(11) NOT NULL,
  `namaLengkap` varchar(100) DEFAULT NULL,
  `tempatLahir` text,
  `tglLahir` date DEFAULT NULL,
  `asalKota` varchar(20) DEFAULT NULL,
  `namaOrtu` varchar(20) DEFAULT NULL,
  `alamatOrtu` text,
  `kotaOrtu` varchar(30) DEFAULT NULL,
  `propinsiOrtu` varchar(30) DEFAULT NULL,
  `angkatan` char(5) DEFAULT NULL,
  `jenisKel` tinyint(1) DEFAULT NULL,
  `alamatLengkap` text,
  `emailAktif` varchar(100) DEFAULT NULL,
  `noTelp` char(12) DEFAULT NULL,
  `fotoMhs` varchar(10) DEFAULT NULL,
  `idJrs` int(11) DEFAULT NULL,
  `idAkses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_mhs`
--

INSERT INTO `identitas_mhs` (`nimMhs`, `namaLengkap`, `tempatLahir`, `tglLahir`, `asalKota`, `namaOrtu`, `alamatOrtu`, `kotaOrtu`, `propinsiOrtu`, `angkatan`, `jenisKel`, `alamatLengkap`, `emailAktif`, `noTelp`, `fotoMhs`, `idJrs`, `idAkses`) VALUES
(15650025, 'Fulan', 'Surabaya', '1999-05-29', 'Surabaya', 'Orang Tua Fulan', 'Surabaya, Jl. Barokah', 'Surabaya', 'Jawa Timur', '2015', NULL, 'Surabaya, Jl. Barokah', NULL, NULL, NULL, 2, 1),
(15650026, 'Fuli', 'Mojokerto', '2017-07-19', 'Mojokerto', 'Orang Tua Fuli', 'Alamat Jl. Mojokerto', 'Mojokerto', 'Jawa Timur', '2015', NULL, 'Alamat Jl. Mojokerto', NULL, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL,
  `namaJur` varchar(100) DEFAULT NULL,
  `idFk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `namaJur`, `idFk`) VALUES
(2, 'Teknik Informatika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_skor`
--

CREATE TABLE IF NOT EXISTS `kategori_skor` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_skor`
--

INSERT INTO `kategori_skor` (`id`, `nama`) VALUES
(1, 'PLN'),
(2, 'Penghasilan Ayah');

-- --------------------------------------------------------

--
-- Table structure for table `levellog`
--

CREATE TABLE IF NOT EXISTS `levellog` (
  `id` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levellog`
--

INSERT INTO `levellog` (`id`, `level`) VALUES
(1, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE IF NOT EXISTS `pendaftar` (
  `id` int(11) NOT NULL,
  `idBea` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `semester` int(1) NOT NULL,
  `sks` int(2) NOT NULL,
  `ipk` float NOT NULL,
  `alamatMalang` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `idBea`, `nim`, `semester`, `sks`, `ipk`, `alamatMalang`, `tanggal`) VALUES
(2, 1, 15650025, 3, 24, 3.95, 'Jl. Sukarno Hatta', '2017-07-05'),
(3, 1, 15650026, 3, 24, 2.55, 'Sukarno Hatta', '2017-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_skor`
--

CREATE TABLE IF NOT EXISTS `pendaftar_skor` (
  `id` int(40) NOT NULL,
  `idPendaftar` int(11) NOT NULL,
  `idBea` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `idSubKategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendaftar_skor`
--

INSERT INTO `pendaftar_skor` (`id`, `idPendaftar`, `idBea`, `idKategori`, `idSubKategori`) VALUES
(1, 2, 1, 1, 4),
(2, 2, 1, 2, 8),
(3, 3, 1, 1, 2),
(4, 3, 1, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `penerima_bea`
--

CREATE TABLE IF NOT EXISTS `penerima_bea` (
  `nim` int(11) DEFAULT NULL,
  `idBea` int(11) DEFAULT NULL,
  `totalBobot` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_admin`
--

CREATE TABLE IF NOT EXISTS `profil_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `noTelp` char(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `idAkses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_bea_kategori_skor`
--

CREATE TABLE IF NOT EXISTS `set_bea_kategori_skor` (
  `id` int(11) NOT NULL,
  `idBea` int(11) NOT NULL,
  `idKategoriSkor` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_bea_kategori_skor`
--

INSERT INTO `set_bea_kategori_skor` (`id`, `idBea`, `idKategoriSkor`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `set_sub_kategori_skor`
--

CREATE TABLE IF NOT EXISTS `set_sub_kategori_skor` (
  `id` int(11) NOT NULL,
  `idKategoriSkor` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `skor` int(7) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_sub_kategori_skor`
--

INSERT INTO `set_sub_kategori_skor` (`id`, `idKategoriSkor`, `nama`, `skor`) VALUES
(1, 1, '<450', 1),
(2, 1, '450-750', 2),
(3, 1, '750-900', 3),
(4, 1, '900-1000', 4),
(8, 2, '700-900rb', 3),
(9, 2, '900-1000rb', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `skor_mahasiswa`
--
CREATE TABLE IF NOT EXISTS `skor_mahasiswa` (
`nimMhs` int(11)
,`namaLengkap` varchar(100)
,`idBea` int(11)
,`namaBeasiswa` varchar(100)
,`ipk` float
,`skor` decimal(32,0)
,`jumlah` double
);

-- --------------------------------------------------------

--
-- Structure for view `skor_mahasiswa`
--
DROP TABLE IF EXISTS `skor_mahasiswa`;

CREATE VIEW skor_mahasiswa AS
SELECT pendaftar.nim nimMhs, identitas_mhs.namaLengkap, pendaftar.idBea, bea.namaBeasiswa, pendaftar.ipk, (
    SELECT SUM(set_sub_kategori_skor.skor)
    FROM pendaftar
    RIGHT JOIN pendaftar_skor ON pendaftar.id=pendaftar_skor.idPendaftar
    LEFT JOIN kategori_skor ON pendaftar_skor.idKategori=kategori_skor.id
    LEFT JOIN set_sub_kategori_skor ON pendaftar_skor.idSubKategori=set_sub_kategori_skor.id
    WHERE pendaftar.nim=nimMhs
) skor, (
    SELECT SUM(set_sub_kategori_skor.skor)+pendaftar.ipk
    FROM pendaftar
    RIGHT JOIN pendaftar_skor ON pendaftar.id=pendaftar_skor.idPendaftar
    LEFT JOIN kategori_skor ON pendaftar_skor.idKategori=kategori_skor.id
    LEFT JOIN set_sub_kategori_skor ON pendaftar_skor.idSubKategori=set_sub_kategori_skor.id
    WHERE pendaftar.nim=nimMhs
) jumlah
FROM pendaftar
LEFT JOIN bea ON pendaftar.idBea=bea.id
LEFT JOIN identitas_mhs ON pendaftar.nim=identitas_mhs.nimMhs
ORDER BY jumlah DESC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`idLevel`);

--
-- Indexes for table `bea`
--
ALTER TABLE `bea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitas_mhs`
--
ALTER TABLE `identitas_mhs`
  ADD PRIMARY KEY (`nimMhs`),
  ADD UNIQUE KEY `nimMhs` (`nimMhs`),
  ADD KEY `jurusan-mhs` (`idJrs`),
  ADD KEY `id_akses` (`idAkses`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_fk` (`idFk`);

--
-- Indexes for table `kategori_skor`
--
ALTER TABLE `kategori_skor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levellog`
--
ALTER TABLE `levellog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `idBea` (`idBea`);

--
-- Indexes for table `pendaftar_skor`
--
ALTER TABLE `pendaftar_skor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPendaftar` (`idPendaftar`),
  ADD KEY `idBea` (`idBea`),
  ADD KEY `idKategori` (`idKategori`),
  ADD KEY `idSubKategori` (`idSubKategori`);

--
-- Indexes for table `penerima_bea`
--
ALTER TABLE `penerima_bea`
  ADD KEY `nim` (`nim`),
  ADD KEY `id_bea` (`idBea`);

--
-- Indexes for table `profil_admin`
--
ALTER TABLE `profil_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akses` (`idAkses`);

--
-- Indexes for table `set_bea_kategori_skor`
--
ALTER TABLE `set_bea_kategori_skor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bea` (`idBea`),
  ADD KEY `id_kategori_skor` (`idKategoriSkor`);

--
-- Indexes for table `set_sub_kategori_skor`
--
ALTER TABLE `set_sub_kategori_skor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori_skor` (`idKategoriSkor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bea`
--
ALTER TABLE `bea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_skor`
--
ALTER TABLE `kategori_skor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `levellog`
--
ALTER TABLE `levellog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pendaftar_skor`
--
ALTER TABLE `pendaftar_skor`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profil_admin`
--
ALTER TABLE `profil_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `set_bea_kategori_skor`
--
ALTER TABLE `set_bea_kategori_skor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `set_sub_kategori_skor`
--
ALTER TABLE `set_sub_kategori_skor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses`
--
ALTER TABLE `akses`
  ADD CONSTRAINT `akses_ibfk_1` FOREIGN KEY (`idLevel`) REFERENCES `levellog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `identitas_mhs`
--
ALTER TABLE `identitas_mhs`
  ADD CONSTRAINT `identitas_mhs_ibfk_1` FOREIGN KEY (`idAkses`) REFERENCES `akses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jurusan-mhs` FOREIGN KEY (`idJrs`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_fk` FOREIGN KEY (`idFk`) REFERENCES `fakultas` (`id`);

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `identitas_mhs` (`nimMhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftar_ibfk_2` FOREIGN KEY (`idBea`) REFERENCES `bea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftar_skor`
--
ALTER TABLE `pendaftar_skor`
  ADD CONSTRAINT `pendaftar_skor_ibfk_1` FOREIGN KEY (`idPendaftar`) REFERENCES `pendaftar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftar_skor_ibfk_2` FOREIGN KEY (`idBea`) REFERENCES `bea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftar_skor_ibfk_3` FOREIGN KEY (`idKategori`) REFERENCES `kategori_skor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftar_skor_ibfk_4` FOREIGN KEY (`idSubKategori`) REFERENCES `set_sub_kategori_skor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerima_bea`
--
ALTER TABLE `penerima_bea`
  ADD CONSTRAINT `penerima_bea_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `identitas_mhs` (`nimMhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penerima_bea_ibfk_2` FOREIGN KEY (`idBea`) REFERENCES `bea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profil_admin`
--
ALTER TABLE `profil_admin`
  ADD CONSTRAINT `profil_admin_ibfk_1` FOREIGN KEY (`idAkses`) REFERENCES `akses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `set_bea_kategori_skor`
--
ALTER TABLE `set_bea_kategori_skor`
  ADD CONSTRAINT `set_bea_kategori_skor_ibfk_1` FOREIGN KEY (`idBea`) REFERENCES `bea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `set_bea_kategori_skor_ibfk_2` FOREIGN KEY (`idKategoriSkor`) REFERENCES `kategori_skor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `set_sub_kategori_skor`
--
ALTER TABLE `set_sub_kategori_skor`
  ADD CONSTRAINT `set_sub_kategori_skor_ibfk_1` FOREIGN KEY (`idKategoriSkor`) REFERENCES `kategori_skor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
