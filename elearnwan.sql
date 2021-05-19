-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2021 at 03:17 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearnwan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblabsensi`
--

CREATE TABLE `tblabsensi` (
  `idabsensi` int(11) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `kelas` enum('P1','P2','M1') NOT NULL,
  `nim` varchar(10) NOT NULL,
  `namamhs` varchar(50) NOT NULL,
  `kelompok` int(11) NOT NULL,
  `a1` enum('Hadir','Tidak') DEFAULT NULL,
  `a2` enum('Hadir','Tidak') DEFAULT NULL,
  `a3` enum('Hadir','Tidak') DEFAULT NULL,
  `a4` enum('Hadir','Tidak') DEFAULT NULL,
  `a5` enum('Hadir','Tidak') DEFAULT NULL,
  `a6` enum('Hadir','Tidak') DEFAULT NULL,
  `a7` enum('Hadir','Tidak') DEFAULT NULL,
  `a8` enum('Hadir','Tidak') DEFAULT NULL,
  `a9` enum('Hadir','Tidak') DEFAULT NULL,
  `a10` enum('Hadir','Tidak') DEFAULT NULL,
  `a11` enum('Hadir','Tidak') DEFAULT NULL,
  `a12` enum('Hadir','Tidak') DEFAULT NULL,
  `a13` enum('Hadir','Tidak') DEFAULT NULL,
  `a14` enum('Hadir','Tidak') DEFAULT NULL,
  `a15` enum('Hadir','Tidak') DEFAULT NULL,
  `a16` enum('Hadir','Tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `idadmin` int(11) NOT NULL,
  `namaadmin` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `status` enum('admin','dosen') NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`idadmin`, `namaadmin`, `alamat`, `email`, `tanggallahir`, `agama`, `jekel`, `telepon`, `status`, `password`) VALUES
(1002, 'admin', 'Jakarta', 'admin@gmail.com', '1990-05-10', 'Islam', 'L', '02199218232', 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `tbldiskusi`
--

CREATE TABLE `tbldiskusi` (
  `iddiskusi` int(11) NOT NULL,
  `idmateri` int(11) NOT NULL,
  `userid` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `komentar` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldosen`
--

CREATE TABLE `tbldosen` (
  `iddosen` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgambar`
--

CREATE TABLE `tblgambar` (
  `idgambar` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `file` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbljawaban`
--

CREATE TABLE `tbljawaban` (
  `idjawaban` int(11) NOT NULL,
  `idtugas` int(11) NOT NULL,
  `idmhs` varchar(25) NOT NULL,
  `namamhs` varchar(50) NOT NULL,
  `jawaban` longtext NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmahasiswa`
--

CREATE TABLE `tblmahasiswa` (
  `nim` varchar(10) NOT NULL,
  `namamhs` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `kelas` enum('P1','P2','M1') NOT NULL,
  `password` varchar(100) NOT NULL,
  `file` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmatakuliah`
--

CREATE TABLE `tblmatakuliah` (
  `kodemk` varchar(20) NOT NULL,
  `namamk` varchar(50) NOT NULL,
  `iddosen` int(11) NOT NULL,
  `namadosen` varchar(50) NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmatakuliah_sec`
--

CREATE TABLE `tblmatakuliah_sec` (
  `kodemk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmatakuliah_sec`
--

INSERT INTO `tblmatakuliah_sec` (`kodemk`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22);

-- --------------------------------------------------------

--
-- Table structure for table `tblmateri`
--

CREATE TABLE `tblmateri` (
  `idmateri` int(11) NOT NULL,
  `idpengirim` varchar(25) NOT NULL,
  `namapengirim` varchar(50) NOT NULL,
  `matakuliah` varchar(100) NOT NULL,
  `judulmateri` mediumtext NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `file` longtext NOT NULL,
  `tipe` enum('m','d') DEFAULT NULL,
  `prodi` enum('TI','SI') DEFAULT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `pertemuan` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpengumuman`
--

CREATE TABLE `tblpengumuman` (
  `idpengumuman` int(11) NOT NULL,
  `idpengirim` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblriwayatnilai`
--

CREATE TABLE `tblriwayatnilai` (
  `idnilai` int(11) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tipesoal` enum('e','p') NOT NULL,
  `tipetugas` enum('quiz','tugas','uts','kelompok') NOT NULL,
  `idsoal` varchar(50) NOT NULL,
  `nosoal` int(11) NOT NULL,
  `isisoal` longtext NOT NULL,
  `jawabesai` longtext,
  `jawabpilgan` enum('a','b','c','d') DEFAULT NULL,
  `a` longtext,
  `b` longtext,
  `c` longtext,
  `d` longtext,
  `status` enum('proses','belum','selesai') NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kelompok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblriwayatsoal`
--

CREATE TABLE `tblriwayatsoal` (
  `idriwayatsoal` int(11) NOT NULL,
  `idsoalriw` int(11) NOT NULL,
  `tipesoal` enum('e','p') NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `namamhs` varchar(50) DEFAULT NULL,
  `tipetugas` enum('quiz','tugas','uts','kelompok') NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `status` enum('selesai','belum','proses') NOT NULL,
  `tanggal` datetime NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `absensike` varchar(2) DEFAULT NULL,
  `kelompok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsoalesai`
--

CREATE TABLE `tblsoalesai` (
  `idesai` int(11) NOT NULL,
  `idsoal` int(11) NOT NULL,
  `noesai` int(11) NOT NULL,
  `matakuliah` text NOT NULL,
  `isiesai` longtext NOT NULL,
  `jawaban` longtext,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsoalpilgan`
--

CREATE TABLE `tblsoalpilgan` (
  `idpilgan` int(11) NOT NULL,
  `idsoalpil` varchar(11) NOT NULL,
  `nopilgan` int(11) NOT NULL,
  `matakuliah` text NOT NULL,
  `isipilgan` longtext NOT NULL,
  `jawabanpilgan` enum('A','B','C','D') NOT NULL,
  `a` longtext NOT NULL,
  `b` longtext NOT NULL,
  `c` longtext NOT NULL,
  `d` longtext NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltugas`
--

CREATE TABLE `tbltugas` (
  `idtugas` int(11) NOT NULL,
  `iddosen` varchar(25) NOT NULL,
  `namadosen` varchar(50) NOT NULL,
  `matakuliah` varchar(100) NOT NULL,
  `judultugas` mediumtext NOT NULL,
  `tanggal_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batas_tanggal` datetime DEFAULT NULL,
  `isi` longtext NOT NULL,
  `tipe` enum('quiz','tugas','uts','uas') NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userid` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('AKD','MHS') NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_images`
--

CREATE TABLE `uploaded_images` (
  `id` int(11) NOT NULL,
  `file_dir` varchar(120) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblabsensi`
--
ALTER TABLE `tblabsensi`
  ADD PRIMARY KEY (`idabsensi`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tbldiskusi`
--
ALTER TABLE `tbldiskusi`
  ADD PRIMARY KEY (`iddiskusi`);

--
-- Indexes for table `tbldosen`
--
ALTER TABLE `tbldosen`
  ADD PRIMARY KEY (`iddosen`);

--
-- Indexes for table `tblgambar`
--
ALTER TABLE `tblgambar`
  ADD PRIMARY KEY (`idgambar`);

--
-- Indexes for table `tbljawaban`
--
ALTER TABLE `tbljawaban`
  ADD PRIMARY KEY (`idjawaban`);

--
-- Indexes for table `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tblmatakuliah`
--
ALTER TABLE `tblmatakuliah`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indexes for table `tblmatakuliah_sec`
--
ALTER TABLE `tblmatakuliah_sec`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indexes for table `tblmateri`
--
ALTER TABLE `tblmateri`
  ADD PRIMARY KEY (`idmateri`);

--
-- Indexes for table `tblpengumuman`
--
ALTER TABLE `tblpengumuman`
  ADD PRIMARY KEY (`idpengumuman`);

--
-- Indexes for table `tblriwayatnilai`
--
ALTER TABLE `tblriwayatnilai`
  ADD PRIMARY KEY (`idnilai`);

--
-- Indexes for table `tblriwayatsoal`
--
ALTER TABLE `tblriwayatsoal`
  ADD PRIMARY KEY (`idriwayatsoal`);

--
-- Indexes for table `tblsoalesai`
--
ALTER TABLE `tblsoalesai`
  ADD PRIMARY KEY (`idesai`);

--
-- Indexes for table `tblsoalpilgan`
--
ALTER TABLE `tblsoalpilgan`
  ADD PRIMARY KEY (`idpilgan`);

--
-- Indexes for table `tbltugas`
--
ALTER TABLE `tbltugas`
  ADD PRIMARY KEY (`idtugas`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `uploaded_images`
--
ALTER TABLE `uploaded_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblabsensi`
--
ALTER TABLE `tblabsensi`
  MODIFY `idabsensi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `tbldiskusi`
--
ALTER TABLE `tbldiskusi`
  MODIFY `iddiskusi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblgambar`
--
ALTER TABLE `tblgambar`
  MODIFY `idgambar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbljawaban`
--
ALTER TABLE `tbljawaban`
  MODIFY `idjawaban` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmatakuliah_sec`
--
ALTER TABLE `tblmatakuliah_sec`
  MODIFY `kodemk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tblmateri`
--
ALTER TABLE `tblmateri`
  MODIFY `idmateri` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpengumuman`
--
ALTER TABLE `tblpengumuman`
  MODIFY `idpengumuman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblriwayatnilai`
--
ALTER TABLE `tblriwayatnilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblriwayatsoal`
--
ALTER TABLE `tblriwayatsoal`
  MODIFY `idriwayatsoal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblsoalesai`
--
ALTER TABLE `tblsoalesai`
  MODIFY `idesai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblsoalpilgan`
--
ALTER TABLE `tblsoalpilgan`
  MODIFY `idpilgan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbltugas`
--
ALTER TABLE `tbltugas`
  MODIFY `idtugas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploaded_images`
--
ALTER TABLE `uploaded_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
