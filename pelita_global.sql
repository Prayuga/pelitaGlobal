-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jul 2018 pada 09.58
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `msagama`
--

CREATE TABLE `msagama` (
  `ID_Agama` int(11) NOT NULL,
  `Agama` varchar(20) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msagama`
--

INSERT INTO `msagama` (`ID_Agama`, `Agama`, `FlagActive`) VALUES
(1, 'Budha', 'Y'),
(2, 'Hindu', 'Y'),
(3, 'Islam', 'Y'),
(4, 'Katholik', 'Y'),
(5, 'Kristen', 'Y'),
(6, 'Konghucu', 'Y'),
(7, 'Lainnya', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msdetailkelas`
--

CREATE TABLE `msdetailkelas` (
  `ID_DetailKelas` int(11) NOT NULL,
  `ID_Kelas` int(11) NOT NULL,
  `ID_Siswa` varchar(20) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `msdetailseragam`
--

CREATE TABLE `msdetailseragam` (
  `ID_detailseragam` int(2) NOT NULL,
  `Id_seragam` int(2) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `flagactive` char(1) NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msdetailseragam`
--

INSERT INTO `msdetailseragam` (`ID_detailseragam`, `Id_seragam`, `ukuran`, `stok`, `flagactive`) VALUES
(1, 1, 's', 22, 'y'),
(2, 1, 'm', 22, 'y'),
(3, 1, 's', 21, 'y'),
(4, 3, 's', 50, 'y'),
(5, 3, 'm', 50, 'y'),
(6, 3, 'l', 50, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msheaderkelas`
--

CREATE TABLE `msheaderkelas` (
  `ID_Kelas` int(11) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `ID_TahunAjaran` char(9) NOT NULL,
  `NamaKelas` varchar(50) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `msheaderseragam`
--

CREATE TABLE `msheaderseragam` (
  `Id_seragam` int(2) NOT NULL,
  `Nama_seragam` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msheaderseragam`
--

INSERT INTO `msheaderseragam` (`Id_seragam`, `Nama_seragam`, `JK`, `FlagActive`) VALUES
(1, 'Dress', 'Laki-laki', 'Y'),
(2, 'Coba 2', 'Perempuan', 'Y'),
(3, 'Coba 3', 'Campur', 'Y'),
(11, 'Coba 5', 'Laki-laki', 'Y'),
(12, 'Baju', 'Laki-laki', 'Y'),
(13, 'Baju', 'Laki-laki', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mskategorikelas`
--

CREATE TABLE `mskategorikelas` (
  `ID_Kategori` int(11) NOT NULL,
  `NamaKategori` varchar(100) NOT NULL,
  `SingkatanKategori` varchar(20) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `msmenu`
--

CREATE TABLE `msmenu` (
  `ID_Menu` int(11) NOT NULL,
  `Menu` varchar(50) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msmenu`
--

INSERT INTO `msmenu` (`ID_Menu`, `Menu`, `URL`, `FlagActive`) VALUES
(1, 'Home', 'http://localhost:81/pelitaGlobal/pendataanSiswa/view', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msorangtua`
--

CREATE TABLE `msorangtua` (
  `ID_OrangTua` int(11) NOT NULL,
  `ID_Siswa` varchar(20) NOT NULL,
  `NamaAyah` varchar(200) DEFAULT NULL,
  `TempatLahirAyah` varchar(100) DEFAULT NULL,
  `TanggalLahirAyah` date DEFAULT NULL,
  `PekerjaanAyah` varchar(100) DEFAULT NULL,
  `PendidikanAyah` varchar(100) DEFAULT NULL,
  `NamaIbu` varchar(200) DEFAULT NULL,
  `TempatLahirIbu` varchar(100) DEFAULT NULL,
  `TanggalLahirIbu` date DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `NoTelp` varchar(100) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mssiswa`
--

CREATE TABLE `mssiswa` (
  `ID_Siswa` varchar(20) NOT NULL,
  `NamaSiswa` varchar(200) NOT NULL,
  `NamaPanggilan` varchar(100) NOT NULL,
  `TempatLahir` varchar(100) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `ID_Agama` char(1) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `NoTelp` varchar(20) NOT NULL,
  `TinggalPada` varchar(50) DEFAULT NULL,
  `JarakRumah` int(11) DEFAULT NULL,
  `AnakKe` int(11) DEFAULT NULL,
  `JumlahSaudaraKandung` int(11) DEFAULT NULL,
  `JumlahSaudaraAngkat` int(11) DEFAULT NULL,
  `TahunAjaranMasuk` char(9) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `BahasaSehariHari` varchar(50) DEFAULT NULL,
  `JenisKelamin` char(1) NOT NULL,
  `BeratBadan` int(11) DEFAULT NULL,
  `TinggiBadan` int(11) DEFAULT NULL,
  `GolonganDarah` varchar(2) DEFAULT NULL,
  `RiwayatPenyakit` varchar(200) DEFAULT NULL,
  `Alergi` varchar(200) DEFAULT NULL,
  `PendidikanSebelumnya` varchar(200) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `msstationary`
--

CREATE TABLE `msstationary` (
  `ID_Stationary` int(11) NOT NULL,
  `NamaStationary` varchar(150) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Satuan` varchar(20) NOT NULL,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msstationary`
--

INSERT INTO `msstationary` (`ID_Stationary`, `NamaStationary`, `Stok`, `Satuan`, `LastUpdate`, `FlagActive`) VALUES
(1, 'Ordner Hitam', 6, 'Unit', '2018-07-24 00:00:00', 'Y'),
(2, 'Ordner Warna', 3, 'Unit', '2018-07-24 00:00:00', 'Y'),
(3, 'Map Business File Biru', 8, 'Unit', '2018-07-24 12:53:15', 'Y'),
(4, 'Map Business File Merah', 12, 'Unit', '2018-07-24 13:06:49', 'Y'),
(5, 'Name Tag', 50, 'Unit', '2018-07-24 13:07:34', 'Y'),
(6, 'Map Business File Biru', 8, 'Unit', '2018-07-24 13:26:14', 'N'),
(7, 'Buku Tulis Kotak Besar', 100, 'Unit', '2018-07-24 14:20:50', 'Y'),
(8, 'Buku Tulis Big Boss', 19, 'Unit', '2018-07-25 22:24:43', 'Y'),
(9, 'Buku Besar Lesson Plan', 10, 'Unit', '2018-07-27 14:36:57', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mssubmenu`
--

CREATE TABLE `mssubmenu` (
  `ID_Submenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `SubMenu` varchar(50) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mstahunajaran`
--

CREATE TABLE `mstahunajaran` (
  `ID_TahunAjaran` char(9) NOT NULL,
  `Start` date NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `msuser`
--

CREATE TABLE `msuser` (
  `ID_User` char(4) NOT NULL,
  `NamaUser` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msuser`
--

INSERT INTO `msuser` (`ID_User`, `NamaUser`, `Password`, `FlagActive`) VALUES
('0000', 'Administrator', '1234', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trauthorizonemenu`
--

CREATE TABLE `trauthorizonemenu` (
  `ID_AutorizoneMenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `ID_User` char(4) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trauthorizonesubmenu`
--

CREATE TABLE `trauthorizonesubmenu` (
  `ID_AutorizoneSubmenu` int(11) NOT NULL,
  `ID_Submenu` int(11) NOT NULL,
  `ID_User` char(4) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trstationary`
--

CREATE TABLE `trstationary` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Stationary` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `NamaPengambil` varchar(150) NOT NULL,
  `Keterangan` text NOT NULL,
  `Tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trstationary`
--

INSERT INTO `trstationary` (`ID_Transaksi`, `ID_Stationary`, `Jumlah`, `NamaPengambil`, `Keterangan`, `Tanggal`) VALUES
(1, 1, 1, 'Miss Yani', 'Untuk Kelas KG-1', '2018-07-25 09:54:07'),
(2, 1, 1, 'test', 'test', '2018-07-25 21:52:28'),
(3, 8, 10, 'test', 'test', '2018-07-25 21:54:22'),
(4, 8, 1, 'test', 'test', '2018-07-25 21:59:20'),
(5, 8, 1, 'test', 'test', '2018-07-25 22:02:27'),
(6, 8, 1, 'test', 'test', '2018-07-25 22:04:31'),
(7, 8, 1, 'test akhir', 'test akhir', '2018-07-25 22:24:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msagama`
--
ALTER TABLE `msagama`
  ADD PRIMARY KEY (`ID_Agama`);

--
-- Indexes for table `msdetailkelas`
--
ALTER TABLE `msdetailkelas`
  ADD PRIMARY KEY (`ID_DetailKelas`);

--
-- Indexes for table `msdetailseragam`
--
ALTER TABLE `msdetailseragam`
  ADD PRIMARY KEY (`ID_detailseragam`);

--
-- Indexes for table `msheaderkelas`
--
ALTER TABLE `msheaderkelas`
  ADD PRIMARY KEY (`ID_Kelas`);

--
-- Indexes for table `msheaderseragam`
--
ALTER TABLE `msheaderseragam`
  ADD PRIMARY KEY (`Id_seragam`);

--
-- Indexes for table `mskategorikelas`
--
ALTER TABLE `mskategorikelas`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indexes for table `msmenu`
--
ALTER TABLE `msmenu`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `mssiswa`
--
ALTER TABLE `mssiswa`
  ADD PRIMARY KEY (`ID_Siswa`);

--
-- Indexes for table `msstationary`
--
ALTER TABLE `msstationary`
  ADD PRIMARY KEY (`ID_Stationary`);

--
-- Indexes for table `mssubmenu`
--
ALTER TABLE `mssubmenu`
  ADD PRIMARY KEY (`ID_Submenu`);

--
-- Indexes for table `mstahunajaran`
--
ALTER TABLE `mstahunajaran`
  ADD PRIMARY KEY (`ID_TahunAjaran`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `trauthorizonemenu`
--
ALTER TABLE `trauthorizonemenu`
  ADD PRIMARY KEY (`ID_AutorizoneMenu`);

--
-- Indexes for table `trauthorizonesubmenu`
--
ALTER TABLE `trauthorizonesubmenu`
  ADD PRIMARY KEY (`ID_AutorizoneSubmenu`);

--
-- Indexes for table `trstationary`
--
ALTER TABLE `trstationary`
  ADD PRIMARY KEY (`ID_Transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msagama`
--
ALTER TABLE `msagama`
  MODIFY `ID_Agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `msdetailkelas`
--
ALTER TABLE `msdetailkelas`
  MODIFY `ID_DetailKelas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `msdetailseragam`
--
ALTER TABLE `msdetailseragam`
  MODIFY `ID_detailseragam` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `msheaderkelas`
--
ALTER TABLE `msheaderkelas`
  MODIFY `ID_Kelas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `msheaderseragam`
--
ALTER TABLE `msheaderseragam`
  MODIFY `Id_seragam` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mskategorikelas`
--
ALTER TABLE `mskategorikelas`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `msmenu`
--
ALTER TABLE `msmenu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `msstationary`
--
ALTER TABLE `msstationary`
  MODIFY `ID_Stationary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mssubmenu`
--
ALTER TABLE `mssubmenu`
  MODIFY `ID_Submenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trauthorizonemenu`
--
ALTER TABLE `trauthorizonemenu`
  MODIFY `ID_AutorizoneMenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trauthorizonesubmenu`
--
ALTER TABLE `trauthorizonesubmenu`
  MODIFY `ID_AutorizoneSubmenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trstationary`
--
ALTER TABLE `trstationary`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
