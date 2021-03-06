-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 10:10 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPembayaranGlobal`(IN `jenis` INT(11), IN `ta` INT(11), IN `lunas` CHAR(1))
BEGIN

SET @sql_dinamis = (
	SELECT GROUP_CONCAT( DISTINCT CONCAT('SUM( IF( a.ID_DetailJenisPembayaran = ' , ID_DetailJenisPembayaran , ', a.Saldo, 0) ) AS "' , /*(SELECT DetailPembayaran FROM msdetailjenispembayaran WHERE msdetailjenispembayaran.ID_DetailJenisPembayaran = trheaderpembayaran.ID_DetailJenisPembayaran )*/ ID_DetailJenisPembayaran,'"' )) FROM trheaderpembayaran where ID_DetailJenisPembayaran IN (SELECT ID_DetailJenisPembayaran FROM msdetailjenispembayaran where ID_HeaderJenisPembayaran = jenis)
);

SET @SQL = CONCAT('SELECT IFNULL(a.NomorIndukSiswa, "TOTAL") AS NomorIndukSiswa, b.NamaSiswa,', 
			  @sql_dinamis, ' 
		    ,SUM( IF(a.Discount = "Y", a.JumlahDiskon, 0)) as diskon, SUM( IF(a.Discount = "Y", a.KeteranganDiskon, "-")) as Keterangan, 
			SUM( a.Saldo) as saldo 
			FROM trheaderpembayaran as a, mssiswa as b 
            WHERE a.NomorIndukSiswa = b.NomorIndukSiswa 
            AND a.ID_TahunAjaran = "',ta,'"
			AND a.StatusLunas = "',lunas,'"
            AND a.ID_DetailJenisPembayaran IN (SELECT ID_DetailJenisPembayaran FROM msdetailjenispembayaran WHERE ID_DetailJenisPembayaran ="',jenis,'")
			GROUP BY a.NomorIndukSiswa 
			WITH ROLLUP'
	   );


PREPARE stmt FROM @SQL;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUmur`(IN `tgl_p` VARCHAR(10), IN `batas` INT(1))
BEGIN
	DECLARE tglnya VARCHAR(5);
	DECLARE stat CHAR(1);
	DECLARE tgl VARCHAR(10);
    DECLARE tahun int(2);
    DECLARE bulan int(2);
    DECLARE batasumur int(2);
    SELECT RIGHT(tgl_p,3) into tglnya;
	SELECT CONCAT(YEAR(NOW()),"-10", tglnya) into tgl;
    SELECT TIMESTAMPDIFF( YEAR, tgl_p, tgl ) into tahun;
    SELECT TIMESTAMPDIFF( MONTH, tgl_p, tgl ) % 12 into bulan;
    SELECT MinUmur FROM mskategorikelas WHERE ID_Kategori = batas into batasumur;
     IF(tahun<batasumur)THEN
    SET STAT = "N";
    SELECT tahun,bulan,stat;
    ELSE
    SET STAT = "Y";
    SELECT tahun,bulan,stat;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `setTrDetailPembayaran`(IN `id_head` INT(11), IN `jml` INT(11), IN `ket` VARCHAR(200), IN `usernya` CHAR(4), IN `id_det` INT(11))
BEGIN
    DECLARE hargaNya int(11);
    DECLARE saldoTotal int(11);
    DECLARE jmlAkhir int(11);
    SELECT (b.Harga-a.Jumlah) as Harga from trheaderpembayaran a, msdetailjenispembayaran b where a.ID_DetailJenisPembayaran = b.ID_DetailJenisPembayaran and a.ID_DetailJenisPembayaran = id_det and a.ID_HeaderPembayaran = id_head  into hargaNya;
    SELECT (saldo+jml) from trheaderpembayaran where ID_HeaderPembayaran = id_head into saldoTotal;
    SELECT (hargaNya-saldoTotal) into jmlAkhir;

    IF(jmlAkhir<=0)THEN
        INSERT INTO `trdetailpembayaran` (`ID_DetailPembayaran`, `ID_HeaderPembayaran`, `Jumlah`, `Keterangan`, `ID_User`, `TanggalPengisian`) VALUES (NULL, id_head, jml, ket, usernya, CURRENT_TIMESTAMP);
        UPDATE trheaderpembayaran set StatusLunas = 'Y', Saldo = saldoTotal where ID_HeaderPembayaran = id_head;
    ELSE
     INSERT INTO `trdetailpembayaran` (`ID_DetailPembayaran`, `ID_HeaderPembayaran`, `Jumlah`, `Keterangan`, `ID_User`, `TanggalPengisian`) VALUES (NULL, id_head, jml, ket, usernya, CURRENT_TIMESTAMP);
        UPDATE trheaderpembayaran set Saldo = saldoTotal where ID_HeaderPembayaran = id_head;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `test`()
    NO SQL
    DETERMINISTIC
begin
SET @sql_dinamis = (
	SELECT GROUP_CONCAT( DISTINCT CONCAT('SUM( IF( ID_DetailJenisPembayaran = ' , ID_DetailJenisPembayaran , ', Saldo, 0) ) AS "' , (SELECT DetailPembayaran FROM msdetailjenispembayaran WHERE msdetailjenispembayaran.ID_DetailJenisPembayaran = trheaderpembayaran.ID_DetailJenisPembayaran ),'"' )) as xxx FROM trheaderpembayaran
);

SET @SQL = CONCAT('SELECT IFNULL(NomorIndukSiswa, "TOTAL") AS NomorIndukSiswa,', 
			  @sql_dinamis, ' 
		    ,SUM( IF(Discount = "Y", Jumlah, 0)) as diskon, 
			SUM( Saldo) as saldo 
			FROM trheaderpembayaran 
			GROUP BY NomorIndukSiswa 
			WITH ROLLUP'
	   );

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `testttt`(IN `b` INT(11))
BEGIN

DECLARE a int(11);

SELECT b into a;
SELECT a;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `msagama`
--

CREATE TABLE IF NOT EXISTS `msagama` (
  `ID_Agama` int(11) NOT NULL,
  `Agama` varchar(20) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msagama`
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
-- Table structure for table `msdetailjenispembayaran`
--

CREATE TABLE IF NOT EXISTS `msdetailjenispembayaran` (
  `ID_DetailJenisPembayaran` int(11) NOT NULL,
  `ID_HeaderJenisPembayaran` int(11) NOT NULL,
  `DetailPembayaran` varchar(100) NOT NULL,
  `Keterangan` text,
  `Harga` int(11) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y',
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msdetailjenispembayaran`
--

INSERT INTO `msdetailjenispembayaran` (`ID_DetailJenisPembayaran`, `ID_HeaderJenisPembayaran`, `DetailPembayaran`, `Keterangan`, `Harga`, `FlagActive`, `LastUpdate`) VALUES
(1, 1, 'Pendaftaran', '', 150000, 'Y', '2018-09-07 12:17:47'),
(2, 1, 'Gedung dan Fasilitas', '', 8000000, 'Y', '2018-09-07 13:45:26'),
(3, 3, 'tes', 'test', 100000, 'Y', '2018-09-11 23:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `msdetailkelas`
--

CREATE TABLE IF NOT EXISTS `msdetailkelas` (
  `ID_DetailKelas` int(11) NOT NULL,
  `ID_Kelas` int(11) NOT NULL,
  `ID_Siswa` varchar(20) NOT NULL,
  `UmurSaatMendaftar` varchar(20) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msdetailseragam`
--

CREATE TABLE IF NOT EXISTS `msdetailseragam` (
  `ID_detailseragam` int(2) NOT NULL,
  `Id_seragam` int(2) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `flagactive` char(1) NOT NULL DEFAULT 'y'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msdetailseragam`
--

INSERT INTO `msdetailseragam` (`ID_detailseragam`, `Id_seragam`, `ukuran`, `stok`, `flagactive`) VALUES
(1, 1, 's', 20, 'y'),
(2, 1, 'm', 22, 'y'),
(4, 3, 's', 50, 'y'),
(5, 3, 'm', 48, 'y'),
(6, 3, 'l', 50, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `msheaderjenispembayaran`
--

CREATE TABLE IF NOT EXISTS `msheaderjenispembayaran` (
  `ID_HeaderJenisPembayaran` int(11) NOT NULL,
  `JenisPembayaran` varchar(100) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msheaderjenispembayaran`
--

INSERT INTO `msheaderjenispembayaran` (`ID_HeaderJenisPembayaran`, `JenisPembayaran`, `FlagActive`) VALUES
(1, 'Pendaftaran Siswa Masuk', 'Y'),
(2, 'Biaya Bulanan', 'Y'),
(3, 'Biaya Lain-lain', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `msheaderkelas`
--

CREATE TABLE IF NOT EXISTS `msheaderkelas` (
  `ID_Kelas` int(11) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `ID_TahunAjaran` char(9) NOT NULL,
  `NamaKelas` varchar(50) NOT NULL,
  `Keterangan` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msheaderkelas`
--

INSERT INTO `msheaderkelas` (`ID_Kelas`, `ID_Kategori`, `ID_TahunAjaran`, `NamaKelas`, `Keterangan`, `FlagActive`) VALUES
(1, 1, '1', 'Pagi', 'jam 8 sampe jam 9', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `msheaderseragam`
--

CREATE TABLE IF NOT EXISTS `msheaderseragam` (
  `Id_seragam` int(2) NOT NULL,
  `Nama_seragam` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msheaderseragam`
--

INSERT INTO `msheaderseragam` (`Id_seragam`, `Nama_seragam`, `JK`, `FlagActive`) VALUES
(1, 'Dress', 'L', 'Y'),
(2, 'Coba 2', 'P', 'Y'),
(3, 'Coba 3', 'Campur', 'Y'),
(11, 'Coba 5', 'L', 'Y'),
(12, 'Baju', 'L', 'Y'),
(13, 'Baju', 'L', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `msjenispengeluaran`
--

CREATE TABLE IF NOT EXISTS `msjenispengeluaran` (
  `ID_JenisPengeluaran` int(11) NOT NULL,
  `JenisPengeluaran` varchar(200) NOT NULL,
  `Keterangan` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msjenispengeluaran`
--

INSERT INTO `msjenispengeluaran` (`ID_JenisPengeluaran`, `JenisPengeluaran`, `Keterangan`, `FlagActive`) VALUES
(1, 'Air Minum', 'Aqua galon & aqua gelas', 'Y'),
(2, 'Dana yayasan', 'dana tambahan dari yayasan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mskategorikelas`
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
-- Dumping data for table `mskategorikelas`
--

INSERT INTO `mskategorikelas` (`ID_Kategori`, `NamaKategori`, `SingkatanKategori`, `MinUmur`, `Keterangan`, `EntryDate`, `FlagActive`) VALUES
(1, 'Play Group', 'PG', 2, '-', '2018-07-31 15:50:25', 'Y'),
(2, 'Pre-Kindergarten', 'Pre-K', 3, '-', '2018-07-31 16:33:06', 'Y'),
(3, 'Kindergarten 1', 'KG-1', 4, '-', '2018-07-31 16:33:39', 'Y'),
(4, 'Kindergarten 2', 'KG-2', 5, '-', '2018-07-31 16:34:00', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `msmenu`
--

CREATE TABLE IF NOT EXISTS `msmenu` (
  `ID_Menu` int(11) NOT NULL,
  `Menu` varchar(50) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `Icon` varchar(50) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msmenu`
--

INSERT INTO `msmenu` (`ID_Menu`, `Menu`, `URL`, `Icon`, `FlagActive`) VALUES
(1, 'Home', 'pendataanSiswa/view', '<i class="fa fa-home fa-fw"></i>', 'N'),
(2, 'PendataanSiswa', '#', '<i class="fa fa-file-text-o fa-fw"></i>', 'Y'),
(3, 'Keuangan', '#', '<i class="fa fa-money fa-fw"></i>', 'Y'),
(4, 'Laporan', '#', '<i class="fa fa-files-o fa-fw"></i>', 'Y'),
(5, 'Master', '#', '<i class="fa fa-pencil-square-o fa-fw"></i>', 'Y'),
(6, 'Katering', '#', '<i class="fa fa-coffee fa-fw"></i>', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `msorangtua`
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
  `PendidikanIbu` varchar(100) DEFAULT NULL,
  `PekerjaanIbu` varchar(100) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `NoTelp` varchar(100) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msorangtua`
--

INSERT INTO `msorangtua` (`ID_OrangTua`, `ID_Siswa`, `NamaAyah`, `TempatLahirAyah`, `TanggalLahirAyah`, `PekerjaanAyah`, `PendidikanAyah`, `NamaIbu`, `TempatLahirIbu`, `TanggalLahirIbu`, `PendidikanIbu`, `PekerjaanIbu`, `Alamat`, `NoTelp`, `FlagActive`) VALUES
(1, '11/001/PGM', 'edy wardoyo', '', '1997-03-12', '', '', '', '', '1997-03-12', '', '', '', '', 'Y'),
(2, '2017KG-1/002/PGM', 'Wardhani', 'Jakarta', '2018-08-09', 'Karyawan', 'D3', 'Wardhani', 'Jakarta', '2018-08-09', 'SMA', 'IRT', 'Jakarta', '0215487', 'Y'),
(3, '2017PG/003/PGM', 'dedi s', 'Jakarta', '1996-01-08', 'Karyawan', 'D4', 'hardilah', 'Jakarta', '2018-09-20', 'S3', 'karyawan', 'utan kayu', '01245787963', 'Y'),
(4, '2017KG-2/004/PGM', 'Edy', 'Jakarta', '1986-04-26', 'Karyawan', 'S1', 'Tri', 'Jakarta', '1986-04-26', 'S2', 'karyawan', 'tambun', '00214536987', 'Y'),
(5, '2017PG/005/PGM', 'yy', 'Jakarta', '2018-09-20', 'Karyawan', 'D3', 'mm', 'Jakarta', '2018-09-20', 'D4', 'karyawan', 'ciakrang', '0214563987', 'Y'),
(6, '2017KG-1/006/PGM', 'ddd', 'Jakarta', '2018-09-20', 'Karyawan', 'S2', 'ggg', 'Jakarta', '2018-09-20', 'D4', 'karyawan', 'pulogadung', '0213654789', 'Y'),
(7, 'Pre-K/007/PGM', 'dedi', 'Jakarta', '2018-09-20', 'Karyawan', 'S1', 'hardilah', 'Jakarta', '2018-09-20', 'D4', 'karyawan', 'pulomas', '021453698', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mssiswa`
--

CREATE TABLE IF NOT EXISTS `mssiswa` (
  `NomorIndukSiswa` varchar(16) NOT NULL,
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
  `JumlahSaudaraKandung` int(11) DEFAULT '0',
  `JumlahSaudaraAngkat` int(11) DEFAULT '0',
  `JumlahSaudaraTiri` int(11) DEFAULT '0',
  `TahunAjaranMasuk` char(9) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `ID_Kelas` int(11) NOT NULL DEFAULT '0',
  `UmurSaatMendaftar` varchar(20) NOT NULL,
  `FlagSuratPernyataan` char(1) DEFAULT NULL,
  `BahasaSehariHari` varchar(50) DEFAULT NULL,
  `JenisKelamin` char(1) NOT NULL,
  `BeratBadan` int(11) DEFAULT NULL,
  `TinggiBadan` int(11) DEFAULT NULL,
  `GolonganDarah` varchar(2) DEFAULT NULL,
  `RiwayatPenyakit` varchar(200) DEFAULT NULL,
  `Alergi` varchar(200) DEFAULT NULL,
  `PendidikanSebelumnya` varchar(200) DEFAULT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mssiswa`
--

INSERT INTO `mssiswa` (`NomorIndukSiswa`, `NamaSiswa`, `NamaPanggilan`, `TempatLahir`, `TanggalLahir`, `ID_Agama`, `Alamat`, `NoTelp`, `TinggalPada`, `JarakRumah`, `AnakKe`, `Dari`, `JumlahSaudaraKandung`, `JumlahSaudaraAngkat`, `JumlahSaudaraTiri`, `TahunAjaranMasuk`, `ID_Kategori`, `ID_Kelas`, `UmurSaatMendaftar`, `FlagSuratPernyataan`, `BahasaSehariHari`, `JenisKelamin`, `BeratBadan`, `TinggiBadan`, `GolonganDarah`, `RiwayatPenyakit`, `Alergi`, `PendidikanSebelumnya`, `FlagActive`) VALUES
('11/001/PGM', 'Annisa Alifah', 'awewe', 'Jakarta', '2018-08-28', '3', 'Pulomas Jakarta Timur 13210', '0214782353561', 'Orang Tua', 1, 0, 0, 0, 0, NULL, '1', 1, 0, '1 tahun 5 bulan', 'Y', 'Indonesia', '', 0, 0, '', '       Asma', 'mi goreng', '', 'Y'),
('2017KG-1/002/PGM', 'Alifah', 'Annisa', 'Jakarta', '2018-08-09', '3', 'Jakarta', '0215478', 'Orang Tua', 1, 3, 3, 2, 0, NULL, '2017/2018', 0, 0, '0 tahun 2 bulan', '-', 'Indonesia', 'P', 20, 140, 'B', '', NULL, '', 'Y'),
('2017KG-1/006/PGM', 'Yugsky', 'yyy', 'Jakarta', '2018-09-20', '3', 'pulogadung', '0213654789', 'Orang Tua', 1, 1, 1, 1, 0, NULL, '2017/2018', 3, 0, '0 tahun 1 bulan', 'N', 'Indonesia', 'L', 55, 155, 'A', 'asma', 'buah', '', 'Y'),
('2017KG-2/004/PGM', 'wardhani', 'www', 'Jakarta', '2014-06-26', '4', 'tambun', '0214578963', 'Orang Tua', 1, 1, 1, 1, 0, NULL, '2017/2018', 4, 0, '4 tahun 4 bulan', 'N', 'Indonesia', 'P', 50, 150, 'A', 'jus kiding', 'jus', '', 'Y'),
('2017PG/003/PGM', 'Kurniadi ganteng', 'kurrrssss', 'Jakarta', '2018-09-20', '3', 'utan kayu', '0215478963', 'Orang Tua', 1, 1, 1, 1, 0, NULL, '2017/2018', 1, 0, '2 tahun 3 bulan', '-', 'Indonesia', 'L', 30, 130, 'A', ' batuks', 'ayam', '', 'Y'),
('2017PG/005/PGM', 'yonglek', 'yong', 'Jakarta', '2013-05-15', '4', 'cikarang', '0213654789', 'Orang Tua', 1, 1, 1, 1, 0, NULL, '2017/2018', 1, 0, '5 tahun 5 bulan', '-', 'Indonesia', 'L', 33, 133, 'B', 'jus jas jus', 'jus', '', 'Y'),
('Pre-K/007/PGM', 'kursss', 'kkk', 'Jakarta', '2018-09-19', '5', 'pulomas', '021456389', 'Orang Tua', 1, 1, 1, 1, 0, NULL, '', 2, 0, '0 tahun 1 bulan', 'N', 'Indonesia', 'L', 22, 122, 'B', 'xxx', 'xxx', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `msstationary`
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
-- Dumping data for table `msstationary`
--

INSERT INTO `msstationary` (`ID_Stationary`, `NamaStationary`, `Stok`, `Satuan`, `LastUpdate`, `FlagActive`) VALUES
(1, 'Ordner Hitam', 6, 'Unit', '2018-07-24 00:00:00', 'N'),
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
-- Table structure for table `mssubmenu`
--

CREATE TABLE IF NOT EXISTS `mssubmenu` (
  `ID_Submenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `SubMenu` varchar(50) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `FlagActive` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mssubmenu`
--

INSERT INTO `mssubmenu` (`ID_Submenu`, `ID_Menu`, `SubMenu`, `URL`, `FlagActive`) VALUES
(1, 2, 'Pendataan Siswa Baru', 'pendataanSiswa/siswabaru', 'Y'),
(2, 2, 'Pendataan Kelas', 'pendataanSiswa/kelas', 'Y'),
(3, 2, 'Data Siswa', 'pendataanSiswa/editSiswa', 'Y'),
(4, 3, 'Entri Data & Cetak Kwitansi', '/keuangan', 'Y'),
(5, 3, 'Entri Data Kas Bulan Baru', 'keuangan/kasBulan', 'Y'),
(6, 3, 'Entri Data Kas Harian', 'keuangan/KasHarian', 'Y'),
(7, 4, 'Data Siswa Global', 'laporan/siswa_all', 'Y'),
(8, 4, 'Laporan Pembayaran Global', 'laporan/pembayaran', 'Y'),
(9, 4, 'Kas Rumah Tangga', 'laporan/kasRT', 'Y'),
(10, 5, 'Tahun Ajaran, Kategori, dan Kelas', 'master/tahunAjaran', 'Y'),
(11, 5, 'Seragam', 'master/seragam', 'Y'),
(12, 5, 'Stationary', 'master/stationary', 'Y'),
(13, 5, 'Kas Rumah Tangga', 'master/kasRT', 'Y'),
(14, 5, 'Jenis Pembayaran', 'master/jenisPembayaran', 'Y'),
(15, 2, 'Pendataan Seragam', 'pendataanSiswa/seragam', 'Y'),
(16, 6, 'Entri Data Katering', 'katering/entri', 'Y'),
(17, 6, 'Print Data Katering', 'katering/prints', 'Y'),
(18, 2, 'Reset Status Kelas', 'pendataanSiswa/resetKelas', 'Y'),
(19, 3, 'Pembayaran Siswa', 'keuangan/pembayaranSiswa', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mstahunajaran`
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
-- Dumping data for table `mstahunajaran`
--

INSERT INTO `mstahunajaran` (`ID_TahunAjaran`, `TahunAjaran`, `Start`, `Keterangan`, `EntryDate`, `FlagActive`) VALUES
(1, '2017/2018', '2018-07-30', 'test', '2018-07-30 13:30:25', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
  `ID_User` char(4) NOT NULL,
  `NamaUser` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` char(4) NOT NULL,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`ID_User`, `NamaUser`, `Password`, `LastUpdate`, `UpdatedBy`, `FlagActive`) VALUES
('0000', 'Administrator', '1234', '2018-09-03 11:07:12', '0000', 'Y'),
('0001', 'miss yani', '1234', '2018-09-03 11:07:32', '0000', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `trauthorizemenu`
--

CREATE TABLE IF NOT EXISTS `trauthorizemenu` (
  `ID_AuthorizeMenu` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `ID_User` char(4) NOT NULL,
  `TanggalPengisian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trauthorizemenu`
--

INSERT INTO `trauthorizemenu` (`ID_AuthorizeMenu`, `ID_Menu`, `ID_User`, `TanggalPengisian`) VALUES
(23, 2, '0000', '2018-09-20 14:06:07'),
(24, 3, '0000', '2018-09-20 14:06:07'),
(25, 4, '0000', '2018-09-20 14:06:07'),
(26, 5, '0000', '2018-09-20 14:06:07'),
(27, 6, '0000', '2018-09-20 14:06:07'),
(32, 2, '0001', '2018-09-20 21:07:54'),
(33, 3, '0001', '2018-09-20 21:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `trauthorizesubmenu`
--

CREATE TABLE IF NOT EXISTS `trauthorizesubmenu` (
  `ID_AuthorizeSubmenu` int(11) NOT NULL,
  `ID_Submenu` int(11) NOT NULL,
  `ID_User` char(4) NOT NULL,
  `TanggalPengisian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trauthorizesubmenu`
--

INSERT INTO `trauthorizesubmenu` (`ID_AuthorizeSubmenu`, `ID_Submenu`, `ID_User`, `TanggalPengisian`) VALUES
(75, 1, '0000', '2018-09-20 14:06:07'),
(76, 2, '0000', '2018-09-20 14:06:07'),
(77, 3, '0000', '2018-09-20 14:06:07'),
(78, 15, '0000', '2018-09-20 14:06:07'),
(79, 18, '0000', '2018-09-20 14:06:07'),
(80, 4, '0000', '2018-09-20 14:06:07'),
(81, 5, '0000', '2018-09-20 14:06:07'),
(82, 6, '0000', '2018-09-20 14:06:07'),
(83, 7, '0000', '2018-09-20 14:06:08'),
(84, 8, '0000', '2018-09-20 14:06:08'),
(85, 9, '0000', '2018-09-20 14:06:08'),
(86, 10, '0000', '2018-09-20 14:06:08'),
(87, 11, '0000', '2018-09-20 14:06:08'),
(88, 12, '0000', '2018-09-20 14:06:08'),
(89, 13, '0000', '2018-09-20 14:06:08'),
(90, 14, '0000', '2018-09-20 14:06:08'),
(91, 16, '0000', '2018-09-20 14:06:08'),
(92, 17, '0000', '2018-09-20 14:06:08'),
(108, 1, '0001', '2018-09-20 21:07:54'),
(109, 2, '0001', '2018-09-20 21:07:54'),
(110, 3, '0001', '2018-09-20 21:07:54'),
(111, 15, '0001', '2018-09-20 21:07:54'),
(112, 18, '0001', '2018-09-20 21:07:54'),
(113, 4, '0001', '2018-09-20 21:07:54'),
(114, 5, '0001', '2018-09-20 21:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `trdetailpembayaran`
--

CREATE TABLE IF NOT EXISTS `trdetailpembayaran` (
  `ID_DetailPembayaran` int(11) NOT NULL,
  `ID_HeaderPembayaran` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Keterangan` text NOT NULL,
  `ID_User` char(4) NOT NULL,
  `TanggalPengisian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trdetailpembayaran`
--

INSERT INTO `trdetailpembayaran` (`ID_DetailPembayaran`, `ID_HeaderPembayaran`, `Jumlah`, `Keterangan`, `ID_User`, `TanggalPengisian`) VALUES
(1, 1, 50000, 'pembayaran pertama', '0000', '2018-09-10 10:27:12'),
(2, 1, 150000, 'pembayaran kedua', '0000', '2018-09-10 10:27:12'),
(3, 2, 20000, 'ke1', '0000', '2018-09-10 10:29:05'),
(4, 2, 10000, 'ke2', '0000', '2018-09-10 10:29:05'),
(5, 3, 10000, '', '0000', '2018-09-10 10:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `trdetailpengeluaran`
--

CREATE TABLE IF NOT EXISTS `trdetailpengeluaran` (
  `ID_DetailPengeluaran` int(11) NOT NULL,
  `ID_HeaderPengeluaran` int(11) NOT NULL,
  `ID_JenisPengeluaran` int(11) DEFAULT NULL,
  `Keterangan` text NOT NULL,
  `Debit` int(11) NOT NULL,
  `Kredit` int(11) NOT NULL,
  `Saldo` int(11) NOT NULL,
  `Tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trdetailpengeluaran`
--

INSERT INTO `trdetailpengeluaran` (`ID_DetailPengeluaran`, `ID_HeaderPengeluaran`, `ID_JenisPengeluaran`, `Keterangan`, `Debit`, `Kredit`, `Saldo`, `Tanggal`, `FlagActive`) VALUES
(1, 1, 1, 'air aqua gelas', 0, 10000, -10000, '2018-08-21 11:11:57', 'Y'),
(2, 1, 2, 'income dari yayasan', 1000000, 0, 990000, '2018-08-21 11:12:59', 'Y'),
(3, 1, 1, 'galonsky', 0, 10000, 980000, '2018-08-24 15:20:25', 'Y'),
(4, 4, 2, 'ddd', 20000, 0, 20000, '2018-09-20 11:50:04', 'Y'),
(5, 4, 2, 'sss', 120000, 0, 140000, '2018-09-20 11:50:56', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `trheaderpembayaran`
--

CREATE TABLE IF NOT EXISTS `trheaderpembayaran` (
  `ID_HeaderPembayaran` int(11) NOT NULL,
  `NomorIndukSiswa` varchar(20) NOT NULL,
  `ID_TahunAjaran` int(11) NOT NULL,
  `ID_DetailJenisPembayaran` int(11) NOT NULL,
  `Saldo` int(11) NOT NULL DEFAULT '0',
  `Discount` char(1) NOT NULL DEFAULT 'N',
  `JumlahDiskon` int(11) DEFAULT NULL,
  `StatusLunas` char(1) NOT NULL DEFAULT 'N',
  `ID_User` char(4) NOT NULL,
  `TanggalPengisian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trheaderpembayaran`
--

INSERT INTO `trheaderpembayaran` (`ID_HeaderPembayaran`, `NomorIndukSiswa`, `ID_TahunAjaran`, `ID_DetailJenisPembayaran`, `Saldo`, `Discount`, `JumlahDiskon`, `StatusLunas`, `ID_User`, `TanggalPengisian`, `FlagActive`) VALUES
(1, '2017KG-1/002/PGM', 1, 2, 200000, 'N', 0, 'N', '0000', '2018-09-10 10:26:29', 'Y'),
(2, '2017KG-1/002/PGM', 1, 1, 30000, 'N', 0, 'N', '0000', '2018-09-10 10:28:19', 'Y'),
(3, '11/001/PGM', 1, 1, 10000, 'N', 0, 'N', '0000', '2018-09-10 10:29:42', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `trheaderpengeluaran`
--

CREATE TABLE IF NOT EXISTS `trheaderpengeluaran` (
  `ID_HeaderPengeluaran` int(11) NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Keterangan` text,
  `FlagActive` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trheaderpengeluaran`
--

INSERT INTO `trheaderpengeluaran` (`ID_HeaderPengeluaran`, `Bulan`, `Tahun`, `StartDate`, `EndDate`, `Keterangan`, `FlagActive`) VALUES
(1, 'Agustus', 2018, '2018-08-01', '2018-08-31', '', 'Y'),
(4, 'September', 2018, '2018-09-01', '2018-09-30', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `trkatering`
--

CREATE TABLE IF NOT EXISTS `trkatering` (
  `ID_Transaksi` int(11) NOT NULL,
  `UntukTanggal` date NOT NULL,
  `NomorIndukSiswa` varchar(20) NOT NULL,
  `Keterangan` text,
  `ID_Pengentri` char(4) NOT NULL,
  `TanggalEntri` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trkatering`
--

INSERT INTO `trkatering` (`ID_Transaksi`, `UntukTanggal`, `NomorIndukSiswa`, `Keterangan`, `ID_Pengentri`, `TanggalEntri`) VALUES
(1, '2018-09-13', '11/001/PGM', 'alergi mi', '', '2018-09-13 16:36:39'),
(2, '2018-09-14', '11/001/PGM', 'alergi ayam', '0000', '2018-09-13 16:40:52'),
(3, '2018-09-15', '11/001/PGM', 'sas', '0000', '2018-09-13 16:45:57'),
(4, '2018-09-14', '11/001/PGM', 'dasd', '0000', '2018-09-13 16:46:50'),
(5, '2018-09-14', '11/001/PGM', 'dasd', '0000', '2018-09-13 16:46:58'),
(6, '2018-09-14', '11/001/PGM', 'dasdsadas', '0000', '2018-09-13 16:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `trseragam`
--

CREATE TABLE IF NOT EXISTS `trseragam` (
  `ID_Transaksi` int(11) NOT NULL,
  `NomorIndukSiswa` varchar(20) NOT NULL,
  `ID_DetailSeragam` int(11) NOT NULL,
  `TanggalTransaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trseragam`
--

INSERT INTO `trseragam` (`ID_Transaksi`, `NomorIndukSiswa`, `ID_DetailSeragam`, `TanggalTransaksi`) VALUES
(4, '11/001/PGM', 1, '2018-09-12 20:49:26'),
(5, '11/001/PGM', 5, '2018-09-12 20:49:27'),
(6, '2017PG/003/PGM', 1, '2018-09-20 11:33:04'),
(7, '2017KG-2/004/PGM', 5, '2018-09-20 11:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `trstationary`
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
-- Dumping data for table `trstationary`
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
-- Indexes for table `msdetailjenispembayaran`
--
ALTER TABLE `msdetailjenispembayaran`
  ADD PRIMARY KEY (`ID_DetailJenisPembayaran`);

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
-- Indexes for table `msheaderjenispembayaran`
--
ALTER TABLE `msheaderjenispembayaran`
  ADD PRIMARY KEY (`ID_HeaderJenisPembayaran`);

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
  ADD PRIMARY KEY (`ID_JenisPengeluaran`);

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
-- Indexes for table `trauthorizemenu`
--
ALTER TABLE `trauthorizemenu`
  ADD PRIMARY KEY (`ID_AuthorizeMenu`);

--
-- Indexes for table `trauthorizesubmenu`
--
ALTER TABLE `trauthorizesubmenu`
  ADD PRIMARY KEY (`ID_AuthorizeSubmenu`);

--
-- Indexes for table `trdetailpembayaran`
--
ALTER TABLE `trdetailpembayaran`
  ADD PRIMARY KEY (`ID_DetailPembayaran`);

--
-- Indexes for table `trdetailpengeluaran`
--
ALTER TABLE `trdetailpengeluaran`
  ADD PRIMARY KEY (`ID_DetailPengeluaran`);

--
-- Indexes for table `trheaderpembayaran`
--
ALTER TABLE `trheaderpembayaran`
  ADD PRIMARY KEY (`ID_HeaderPembayaran`);

--
-- Indexes for table `trheaderpengeluaran`
--
ALTER TABLE `trheaderpengeluaran`
  ADD PRIMARY KEY (`ID_HeaderPengeluaran`);

--
-- Indexes for table `trkatering`
--
ALTER TABLE `trkatering`
  ADD PRIMARY KEY (`ID_Transaksi`);

--
-- Indexes for table `trseragam`
--
ALTER TABLE `trseragam`
  ADD PRIMARY KEY (`ID_Transaksi`);

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
-- AUTO_INCREMENT for table `msdetailjenispembayaran`
--
ALTER TABLE `msdetailjenispembayaran`
  MODIFY `ID_DetailJenisPembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `msdetailkelas`
--
ALTER TABLE `msdetailkelas`
  MODIFY `ID_DetailKelas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `msdetailseragam`
--
ALTER TABLE `msdetailseragam`
  MODIFY `ID_detailseragam` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `msheaderjenispembayaran`
--
ALTER TABLE `msheaderjenispembayaran`
  MODIFY `ID_HeaderJenisPembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `msheaderkelas`
--
ALTER TABLE `msheaderkelas`
  MODIFY `ID_Kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `msheaderseragam`
--
ALTER TABLE `msheaderseragam`
  MODIFY `Id_seragam` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `msjenispengeluaran`
--
ALTER TABLE `msjenispengeluaran`
  MODIFY `ID_JenisPengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mskategorikelas`
--
ALTER TABLE `mskategorikelas`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `msmenu`
--
ALTER TABLE `msmenu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `msorangtua`
--
ALTER TABLE `msorangtua`
  MODIFY `ID_OrangTua` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `msstationary`
--
ALTER TABLE `msstationary`
  MODIFY `ID_Stationary` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mssubmenu`
--
ALTER TABLE `mssubmenu`
  MODIFY `ID_Submenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mstahunajaran`
--
ALTER TABLE `mstahunajaran`
  MODIFY `ID_TahunAjaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trauthorizemenu`
--
ALTER TABLE `trauthorizemenu`
  MODIFY `ID_AuthorizeMenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `trauthorizesubmenu`
--
ALTER TABLE `trauthorizesubmenu`
  MODIFY `ID_AuthorizeSubmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `trdetailpembayaran`
--
ALTER TABLE `trdetailpembayaran`
  MODIFY `ID_DetailPembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trdetailpengeluaran`
--
ALTER TABLE `trdetailpengeluaran`
  MODIFY `ID_DetailPengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trheaderpembayaran`
--
ALTER TABLE `trheaderpembayaran`
  MODIFY `ID_HeaderPembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trheaderpengeluaran`
--
ALTER TABLE `trheaderpengeluaran`
  MODIFY `ID_HeaderPengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trkatering`
--
ALTER TABLE `trkatering`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trseragam`
--
ALTER TABLE `trseragam`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trstationary`
--
ALTER TABLE `trstationary`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
