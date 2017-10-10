-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 06:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cerdas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(5) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `makul` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `jam_mulai`, `jam_akhir`, `makul`) VALUES
(1, 'Senin', '08:00:00', '12:00:00', 'Perencanaan Sumber Daya Perusahaan (ERP)'),
(2, 'Senin', '12:00:00', '14:00:00', 'Multimedia Bisnis'),
(3, 'Selasa', '13:00:00', '17:00:00', 'Perangkat Cerdas'),
(4, 'Rabu', '08:00:00', '11:00:00', 'Interaksi Manusia dan Komputer'),
(5, 'Selasa', '08:00:00', '12:00:00', 'Kecerdasan Buatan'),
(6, 'Kamis', '08:00:00', '10:00:00', 'Multimedia Bisnis'),
(7, 'Kamis', '10:00:00', '12:00:00', 'Etika Profesi'),
(8, 'Kamis', '13:00:00', '17:00:00', 'Sistem Financial Perusahaan'),
(9, 'Jumat', '08:00:00', '11:00:00', 'Statistika');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_absen`
--

CREATE TABLE `rekap_absen` (
  `id` int(5) NOT NULL,
  `norf` int(20) NOT NULL,
  `makul_absen` varchar(200) NOT NULL,
  `tanggal_absen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_absen`
--

INSERT INTO `rekap_absen` (`id`, `norf`, `makul_absen`, `tanggal_absen`) VALUES
(2, 1235350, 'Kecerdasan Buatan', '2017-10-10 03:28:29'),
(3, 1236367, 'Perangkat Cerdas', '2017-10-10 09:33:52'),
(4, 1235350, 'Perangkat Cerdas', '2017-10-10 09:38:40'),
(6, 1236367, 'Perangkat Cerdas', '2017-10-10 10:38:33'),
(9, 5704694, 'Perangkat Cerdas', '2017-10-10 11:49:16'),
(10, 5708185, 'Tidak ada kelas', '2017-10-10 14:24:39'),
(11, 5815403, 'Tidak ada kelas', '2017-10-10 14:33:01'),
(12, 1236367, 'Tidak ada kelas', '2017-10-10 14:44:20'),
(13, 5704694, 'Tidak ada kelas', '2017-10-10 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `id` int(5) NOT NULL,
  `norf` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`id`, `norf`, `created_at`) VALUES
(1, 1, '2017-09-19 16:28:55'),
(3, 23, '2017-09-28 16:28:55'),
(5, 2, '2017-09-28 16:28:55'),
(14, 1111111, '2017-09-28 17:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(5) NOT NULL,
  `norf` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NIM` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `norf`, `nama`, `NIM`, `last_update`) VALUES
(1, 5708185, 'Stefanus Lintang', '15.N1.0020', '2017-10-10 14:11:05'),
(2, 5815403, 'Daniel Aditama', '15.N1.0015', '2017-10-10 14:11:16'),
(3, 1236367, 'Richard Juan', '15.N1.0011', '2017-10-10 14:11:21'),
(4, 1235350, 'Ricard Simon', '15.N1.0017', '2017-10-10 14:11:25'),
(5, 1230583, 'MIkael Duhantatya', '15.N1.0006', '2017-10-10 14:11:30'),
(6, 5704694, 'Edwin Leonardo', '15.N1.0005', '2017-10-10 11:45:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_absen`
--
ALTER TABLE `rekap_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rekap_absen`
--
ALTER TABLE `rekap_absen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rfid`
--
ALTER TABLE `rfid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
