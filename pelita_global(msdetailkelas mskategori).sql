-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 06:22 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelita_global`
--

-- --------------------------------------------------------

--
-- Table structure for table `msdetailkelas`
--

CREATE TABLE IF NOT EXISTS `msdetailkelas` (
  `ID_DetailKelas` int(11) NOT NULL,
  `ID_Kelas` int(11) NOT NULL,
  `ID_Siswa` varchar(20) NOT NULL,
  `UmurSiswa` int(11) NOT NULL,
  `FlagSuratPernyataan` char(1) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mskategorikelas`
--

CREATE TABLE IF NOT EXISTS `mskategorikelas` (
  `ID_Kategori` int(11) NOT NULL,
  `NamaKategori` varchar(100) NOT NULL,
  `SingkatanKategori` varchar(20) NOT NULL,
  `MinUmur` int(11) NOT NULL,
  `Keterangan` text NOT NULL,
  `EntryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mskategorikelas`
--

INSERT INTO `mskategorikelas` (`ID_Kategori`, `NamaKategori`, `SingkatanKategori`, `MinUmur`, `Keterangan`, `EntryDate`, `FlagActive`) VALUES
(1, 'Play Group', 'PG', 0, '-', '2018-07-31 15:50:25', 'Y'),
(2, 'Pre-Kindergarten', 'Pre-K', 0, '-', '2018-07-31 16:33:06', 'Y'),
(3, 'Kindergarten 1', 'KG-1', 0, '-', '2018-07-31 16:33:39', 'Y'),
(4, 'Kindergarten 2', 'KG-2', 0, '-', '2018-07-31 16:34:00', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msdetailkelas`
--
ALTER TABLE `msdetailkelas`
  ADD PRIMARY KEY (`ID_DetailKelas`);

--
-- Indexes for table `mskategorikelas`
--
ALTER TABLE `mskategorikelas`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msdetailkelas`
--
ALTER TABLE `msdetailkelas`
  MODIFY `ID_DetailKelas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mskategorikelas`
--
ALTER TABLE `mskategorikelas`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
