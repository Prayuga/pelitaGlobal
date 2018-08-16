-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: 16 Agu 2018 pada 06.16
-- Versi Server: 5.6.26
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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getUmur`(IN `tgl_p` VARCHAR(10), IN `batas` INT(1))
BEGIN
	DECLARE tglnya VARCHAR(5);
	DECLARE stat CHAR(1);
	DECLARE tgl VARCHAR(10);
    DECLARE tahun int(2);
    DECLARE bulan int(2);
    SELECT RIGHT(tgl_p,3) into tglnya;
	SELECT CONCAT(YEAR(NOW()),"-10", tglnya) into tgl;
    SELECT TIMESTAMPDIFF( YEAR, tgl_p, tgl ) into tahun;
    SELECT TIMESTAMPDIFF( MONTH, tgl_p, tgl ) % 12 into bulan;
     IF(tahun<batas)THEN
    SET STAT = "N";
    SELECT tahun,bulan,stat;
    ELSE
    SET STAT = "Y";
    SELECT tahun,bulan,stat;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `msagama`
--

CREATE TABLE IF NOT EXISTS `msagama` (
  `ID_Agama` int(11) NOT NULL,
  `Agama` varchar(20) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `msdetailkelas` (
  `ID_DetailKelas` int(11) NOT NULL,
  `ID_Kelas` int(11) NOT NULL,
  `ID_Siswa` varchar(20) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msdetailkelas`
--

INSERT INTO `msdetailkelas` (`ID_DetailKelas`, `ID_Kelas`, `ID_Siswa`, `FlagActive`) VALUES
(1, 1, 'tes', 'y'),
(2, 1, '1', 'Y'),
(3, 1, '2', 'Y'),
(4, 1, '1', 'Y'),
(5, 1, '1', 'Y'),
(6, 1, '3', 'Y'),
(7, 1, '1', 'Y'),
(8, 2, '2', 'Y'),
(9, 2, '3', 'Y'),
(10, 1, '1', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msdetailseragam`
--

CREATE TABLE IF NOT EXISTS `msdetailseragam` (
  `ID_detailseragam` int(2) NOT NULL,
  `Id_seragam` int(2) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `flagactive` char(1) NOT NULL DEFAULT 'y'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `msheaderkelas` (
  `ID_Kelas` int(11) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `ID_TahunAjaran` char(9) NOT NULL,
  `NamaKelas` varchar(50) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msheaderkelas`
--

INSERT INTO `msheaderkelas` (`ID_Kelas`, `ID_Kategori`, `ID_TahunAjaran`, `NamaKelas`, `FlagActive`) VALUES
(1, 1, '2017/2018', 'Kelas1', 'Y'),
(2, 1, '2017/2018', 'Kelas2', 'Y'),
(3, 3, '2018/2019', 'Kelas3', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msheaderseragam`
--

CREATE TABLE IF NOT EXISTS `msheaderseragam` (
  `Id_seragam` int(2) NOT NULL,
  `Nama_seragam` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `msjenispengeluaran`
--

CREATE TABLE IF NOT EXISTS `msjenispengeluaran` (
  `ID_JenisPengeluuaran` int(11) NOT NULL,
  `JenisPengeluaran` varchar(200) NOT NULL,
  `Keterangan` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mskategorikelas`
--

CREATE TABLE IF NOT EXISTS `mskategorikelas` (
  `ID_Kategori` int(11) NOT NULL,
  `NamaKategori` varchar(100) NOT NULL,
  `SingkatanKategori` varchar(20) NOT NULL,
  `MinUmur` int(11) NOT NULL,
  `Keterangan` text,
  `EntryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mskategorikelas`
--

INSERT INTO `mskategorikelas` (`ID_Kategori`, `NamaKategori`, `SingkatanKategori`, `MinUmur`, `Keterangan`, `EntryDate`, `FlagActive`) VALUES
(1, 'Play Group', 'PG', 2, '-', '2018-07-31 15:50:25', 'Y'),
(2, 'Pre-Kindergarten', 'Pre-K', 3, '-', '2018-07-31 16:33:06', 'Y'),
(3, 'Kindergarten 1', 'KG-1', 4, '-', '2018-07-31 16:33:39', 'Y'),
(4, 'Kindergarten 2', 'KG-2', 5, '-', '2018-07-31 16:34:00', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msmenu`
--

CREATE TABLE IF NOT EXISTS `msmenu` (
  `ID_Menu` int(11) NOT NULL,
  `Menu` varchar(50) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msmenu`
--

INSERT INTO `msmenu` (`ID_Menu`, `Menu`, `URL`, `FlagActive`) VALUES
(1, 'Home', 'http://localhost:81/pelitaGlobal/pendataanSiswa/view', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msorangtua`
--

CREATE TABLE IF NOT EXISTS `msorangtua` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msorangtua`
--

INSERT INTO `msorangtua` (`ID_OrangTua`, `ID_Siswa`, `NamaAyah`, `TempatLahirAyah`, `TanggalLahirAyah`, `PekerjaanAyah`, `PendidikanAyah`, `NamaIbu`, `TempatLahirIbu`, `TanggalLahirIbu`, `Alamat`, `NoTelp`, `FlagActive`) VALUES
(1, '1', 'Yatno', 'gg', '2018-08-01', 'gabut', 'sma', 'Yanti', 'gg', '2018-08-01', 'gatau', '1234', 'Y'),
(2, '3', 'babah', 'asa', '2018-08-01', 'sss', 'sd', 'bebe', 'gg', '2018-08-01', 'aaa', '5555', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mssiswa`
--

CREATE TABLE IF NOT EXISTS `mssiswa` (
  `NomorIndukSiswa` int(16) NOT NULL,
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
  `Dari` int(11) DEFAULT NULL,
  `JumlahSaudaraKandung` int(11) DEFAULT NULL,
  `JumlahSaudaraAngkat` int(11) DEFAULT NULL,
  `JumlahSaudaraTiri` int(11) DEFAULT NULL,
  `TahunAjaranMasuk` char(9) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `ID_Kelas` int(11) DEFAULT NULL,
  `UmurSaatMendaftar` varchar(20) NOT NULL,
  `FlagSuratPernyataan` char(1) DEFAULT 'Y',
  `BahasaSehariHari` varchar(50) DEFAULT NULL,
  `JenisKelamin` char(1) NOT NULL,
  `BeratBadan` int(11) DEFAULT NULL,
  `TinggiBadan` int(11) DEFAULT NULL,
  `GolonganDarah` varchar(2) DEFAULT NULL,
  `RiwayatPenyakit` varchar(200) DEFAULT NULL,
  `Alergi` varchar(200) DEFAULT NULL,
  `PendidikanSebelumnya` varchar(200) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mssiswa`
--

INSERT INTO `mssiswa` (`NomorIndukSiswa`, `NamaSiswa`, `NamaPanggilan`, `TempatLahir`, `TanggalLahir`, `ID_Agama`, `Alamat`, `NoTelp`, `TinggalPada`, `JarakRumah`, `AnakKe`, `Dari`, `JumlahSaudaraKandung`, `JumlahSaudaraAngkat`, `JumlahSaudaraTiri`, `TahunAjaranMasuk`, `ID_Kategori`, `ID_Kelas`, `UmurSaatMendaftar`, `FlagSuratPernyataan`, `BahasaSehariHari`, `JenisKelamin`, `BeratBadan`, `TinggiBadan`, `GolonganDarah`, `RiwayatPenyakit`, `Alergi`, `PendidikanSebelumnya`, `FlagActive`) VALUES
(1, 'yugaZZZZZZZZZZZZZZZZZZZZZZZZZZ', 'yugs', 'jakarta', '2018-06-06', '1', 'asdadsAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA BBBBBBBBBBBBBBBBBBBBBBBB', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015', 3, 1, '5 tahun', 'Y', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(2, 'Bah', 'ab', 'bogor', '2018-06-06', '1', 'asdads', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015', 3, 2, '9 tahun', 'Y', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(3, 'daen', 'nen', 'betawi', '2018-06-06', '1', 'asdads', '32321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015', 3, 3, '6 tahun', 'Y', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(5, 'aasdas', 'yugs', 'jakarta', '2018-06-06', '1', 'asdadsAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA BBBBBBBBBBBBBBBBBBBBBBBB', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015', 3, 1, '5 tahun', 'Y', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msstationary`
--

CREATE TABLE IF NOT EXISTS `msstationary` (
  `ID_Stationary` int(11) NOT NULL,
  `NamaStationary` varchar(150) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Satuan` varchar(20) NOT NULL,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `mssubmenu` (
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

CREATE TABLE IF NOT EXISTS `mstahunajaran` (
  `ID_TahunAjaran` int(11) NOT NULL,
  `TahunAjaran` varchar(9) NOT NULL,
  `Start` date NOT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `EntryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mstahunajaran`
--

INSERT INTO `mstahunajaran` (`ID_TahunAjaran`, `TahunAjaran`, `Start`, `Keterangan`, `EntryDate`, `FlagActive`) VALUES
(1, '2017/2018', '2018-07-30', 'test', '2018-07-30 13:30:25', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
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

CREATE TABLE IF NOT EXISTS `trauthorizonemenu` (
  `ID_AutorizoneMenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `ID_User` char(4) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trauthorizonesubmenu`
--

CREATE TABLE IF NOT EXISTS `trauthorizonesubmenu` (
  `ID_AutorizoneSubmenu` int(11) NOT NULL,
  `ID_Submenu` int(11) NOT NULL,
  `ID_User` char(4) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trdetailpengeluaran`
--

CREATE TABLE IF NOT EXISTS `trdetailpengeluaran` (
  `ID_Detail Pengeluaran` int(11) NOT NULL,
  `ID_Header Pengeluaran` int(11) NOT NULL,
  `ID_Jenis Pengeluaran` int(11) DEFAULT NULL,
  `Keterangan` text NOT NULL,
  `Debit` int(11) NOT NULL,
  `Kredit` int(11) NOT NULL,
  `Saldo` int(11) NOT NULL,
  `Tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trheaderpengeluaran`
--

CREATE TABLE IF NOT EXISTS `trheaderpengeluaran` (
  `ID_HeaderPengeluaran` int(11) NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tahun` date NOT NULL,
  `Start Date` date NOT NULL,
  `End Date` date NOT NULL,
  `Keterangan` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trstationary`
--

CREATE TABLE IF NOT EXISTS `trstationary` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Stationary` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `NamaPengambil` varchar(150) NOT NULL,
  `Keterangan` text NOT NULL,
  `Tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
-- Indexes for table `msjenispengeluaran`
--
ALTER TABLE `msjenispengeluaran`
  ADD PRIMARY KEY (`ID_JenisPengeluuaran`);

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
-- Indexes for table `msorangtua`
--
ALTER TABLE `msorangtua`
  ADD PRIMARY KEY (`ID_OrangTua`);

--
-- Indexes for table `mssiswa`
--
ALTER TABLE `mssiswa`
  ADD PRIMARY KEY (`NomorIndukSiswa`);

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
-- Indexes for table `trdetailpengeluaran`
--
ALTER TABLE `trdetailpengeluaran`
  ADD PRIMARY KEY (`ID_Detail Pengeluaran`);

--
-- Indexes for table `trheaderpengeluaran`
--
ALTER TABLE `trheaderpengeluaran`
  ADD PRIMARY KEY (`ID_HeaderPengeluaran`);

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
  MODIFY `ID_Agama` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `msdetailkelas`
--
ALTER TABLE `msdetailkelas`
  MODIFY `ID_DetailKelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `msdetailseragam`
--
ALTER TABLE `msdetailseragam`
  MODIFY `ID_detailseragam` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `msheaderkelas`
--
ALTER TABLE `msheaderkelas`
  MODIFY `ID_Kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `msheaderseragam`
--
ALTER TABLE `msheaderseragam`
  MODIFY `Id_seragam` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `msjenispengeluaran`
--
ALTER TABLE `msjenispengeluaran`
  MODIFY `ID_JenisPengeluuaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mskategorikelas`
--
ALTER TABLE `mskategorikelas`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `msmenu`
--
ALTER TABLE `msmenu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `msorangtua`
--
ALTER TABLE `msorangtua`
  MODIFY `ID_OrangTua` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mssiswa`
--
ALTER TABLE `mssiswa`
  MODIFY `NomorIndukSiswa` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `msstationary`
--
ALTER TABLE `msstationary`
  MODIFY `ID_Stationary` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mssubmenu`
--
ALTER TABLE `mssubmenu`
  MODIFY `ID_Submenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mstahunajaran`
--
ALTER TABLE `mstahunajaran`
  MODIFY `ID_TahunAjaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `trdetailpengeluaran`
--
ALTER TABLE `trdetailpengeluaran`
  MODIFY `ID_Detail Pengeluaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trheaderpengeluaran`
--
ALTER TABLE `trheaderpengeluaran`
  MODIFY `ID_HeaderPengeluaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trstationary`
--
ALTER TABLE `trstationary`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
