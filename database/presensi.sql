-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 03:21 AM
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
-- Database: `kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `username`, `password`, `foto`) VALUES
(1, 'Doni Romdoni', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `jam_presensi`
--

CREATE TABLE `jam_presensi` (
  `id` int(11) NOT NULL,
  `jam_masuk1` time NOT NULL,
  `jam_masuk2` time NOT NULL,
  `jam_pulang1` time NOT NULL,
  `jam_pulang2` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_presensi`
--

INSERT INTO `jam_presensi` (`id`, `jam_masuk1`, `jam_masuk2`, `jam_pulang1`, `jam_pulang2`) VALUES
(1, '07:00:00', '07:30:00', '09:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(11) NOT NULL,
  `rfid` varchar(20) NOT NULL,
  `nama_pgw` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuann') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_pgw` text NOT NULL,
  `jabatan` enum('Project Manajer','Programmer','Analis','Desainer','Marketing') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `rfid`, `nama_pgw`, `jenis_kelamin`, `tanggal_lahir`, `alamat_pgw`, `jabatan`, `no_telp`, `email`, `password`, `foto`) VALUES
(1606102, '0000241129', 'rifan alamsyah', 'Laki-laki', '2019-12-17', '																		cibatu																		', 'Programmer', '089699838615', 'syarif@gmail.com', '1606109', ''),
(1606109, '0000191568', 'syarif ', 'Laki-laki', '2019-12-18', '								cibatu								', 'Programmer', '089699838615', 'syarif182x@gmail.com', '1606109', '');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `keterangan` enum('Hadir','Telat','Sakit','Izin','Mangkir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `nip`, `tanggal`, `jam_masuk`, `jam_pulang`, `keterangan`) VALUES
(47, 1606109, '2019-12-22', '02:28:44', '09:47:14', 'Telat'),
(48, 1606102, '2019-12-22', '02:32:23', '09:47:09', 'Telat'),
(49, 1606102, '2019-12-23', '10:32:28', '09:47:09', 'Hadir'),
(50, 1606102, '2019-12-23', '10:32:34', '09:47:09', 'Hadir'),
(51, 1606109, '2019-12-23', '10:32:47', '09:47:14', 'Hadir'),
(52, 1606102, '2019-12-23', '11:57:46', '09:47:09', 'Telat'),
(53, 1606102, '2019-12-23', '11:57:51', '09:47:09', 'Telat'),
(54, 1606109, '2019-12-23', '11:58:08', '09:47:14', 'Telat'),
(55, 1606102, '2019-12-23', '12:00:56', '09:47:09', 'Telat'),
(56, 1606102, '2019-12-23', '12:01:10', '09:47:09', 'Telat'),
(57, 1606102, '2019-12-23', '12:02:24', '09:47:09', 'Telat'),
(58, 1606102, '2019-12-23', '12:05:42', '09:47:09', 'Telat'),
(59, 1606102, '2019-12-25', '09:44:36', '09:47:09', 'Hadir'),
(60, 1606109, '2019-12-25', '09:45:12', '09:47:14', 'Telat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam_presensi`
--
ALTER TABLE `jam_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jam_presensi`
--
ALTER TABLE `jam_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
