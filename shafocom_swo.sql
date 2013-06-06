-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2013 at 12:13 AM
-- Server version: 5.1.69-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shafocom_swo`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotateam`
--

CREATE TABLE IF NOT EXISTS `anggotateam` (
  `id_anggotateam` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(10) NOT NULL,
  `id_sto` varchar(20) DEFAULT NULL,
  `nama_anggotateam` varchar(20) NOT NULL,
  `jabatan_anggotateam` varchar(10) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_anggotateam`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `anggotateam`
--

INSERT INTO `anggotateam` (`id_anggotateam`, `id_team`, `id_sto`, `nama_anggotateam`, `jabatan_anggotateam`, `no_telpon`, `email`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 1, 'TLK.GGK.01.07', 'Anggota1', 'Ketua', '081334887', 'ang@gmail.com', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(2, 2, 'TLK.GGK.01.07', 'Anggota2', 'Ketua', '0811234454', 'ang@gmail.com', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(3, 3, 'TLK.GGK.01.07', 'Ahmad', 'Ketua', '08122334444', 'jualan@gmail.com', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(4, 3, 'TLK.GGK.01.07', 'Ops_bdgCTR_05', 'Anggota', '081222233494', 'jaja@jaja.com', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(5, 1, 'TLK.GGK.01.07', 'AngBdg01', 'Anggota', '081228888', 'dora@explorer.com', 0, '0000-00-00 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(10) NOT NULL AUTO_INCREMENT,
  `id_sto` int(10) NOT NULL,
  `id_team` int(10) NOT NULL,
  `nama_area` varchar(40) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_area`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id_area`, `id_sto`, `id_team`, `nama_area`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 1, 1, 'Dayeuh Kolot', 0, '2013-04-17 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 1, 0, 'Bojong Soang', 0, '2013-04-17 09:22:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `area_team`
--

CREATE TABLE IF NOT EXISTS `area_team` (
  `id_area_team` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_area_team`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `divre`
--

CREATE TABLE IF NOT EXISTS `divre` (
  `id_divre` int(10) NOT NULL AUTO_INCREMENT,
  `nama_divre` varchar(20) NOT NULL,
  `alamat_divre` varchar(100) NOT NULL,
  `lintang_divre` varchar(20) NOT NULL,
  `bujur_divre` varchar(20) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_divre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `divre`
--

INSERT INTO `divre` (`id_divre`, `nama_divre`, `alamat_divre`, `lintang_divre`, `bujur_divre`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 'Divre I', 'Jl. Prof.HM. Yamin SH No. 2, Medan 2011, Sumatra Utara', '3.5962', '98.6886', 1, '2013-04-25 00:00:00', NULL, NULL, 1),
(2, 'Divre II', 'Jl. Sisingamangaraja No.4-6 Kebayoran Baru\nJakarta Selatan, DKI Jakarta', '-6.23049', '106.79955', 1, '2013-04-25 00:00:00', NULL, NULL, 1),
(3, 'Divre III', 'Jl. Supratman No.66 Bandung, Jawa Barat', '-6.9101', '107.6753', 1, '2013-04-24 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dp_lama`
--

CREATE TABLE IF NOT EXISTS `dp_lama` (
  `id_dp_lama` int(10) NOT NULL AUTO_INCREMENT,
  `dp_lama` varchar(20) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_dp_lama`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dp_lama`
--

INSERT INTO `dp_lama` (`id_dp_lama`, `dp_lama`, `createby`, `createdate`, `isactive`) VALUES
(1, 'DCLA001', 1, '2013-05-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ont`
--

CREATE TABLE IF NOT EXISTS `jenis_ont` (
  `id_ont` int(10) NOT NULL AUTO_INCREMENT,
  `nama_ont` varchar(20) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_ont`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jenis_ont`
--

INSERT INTO `jenis_ont` (`id_ont`, `nama_ont`, `createby`, `createdate`, `isactive`) VALUES
(1, 'HG 8245', 1, '2013-05-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `line_pelanggan`
--

CREATE TABLE IF NOT EXISTS `line_pelanggan` (
  `id_line_pelanggan` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(20) NOT NULL,
  `jenis_ont` varchar(10) DEFAULT NULL,
  `dp_lama` varchar(10) DEFAULT NULL,
  `layanan_pots` varchar(20) NOT NULL DEFAULT '0',
  `layanan_speedy` varchar(20) NOT NULL DEFAULT '0',
  `layanan_iptv` varchar(20) NOT NULL DEFAULT '0',
  `odc` varchar(20) DEFAULT NULL,
  `odp_baru` varchar(20) DEFAULT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_line_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `line_pelanggan`
--

INSERT INTO `line_pelanggan` (`id_line_pelanggan`, `id_pelanggan`, `jenis_ont`, `dp_lama`, `layanan_pots`, `layanan_speedy`, `layanan_iptv`, `odc`, `odp_baru`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, '147394', 'HG 8245', 'RN001', '8989', '9900', '6677', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(2, '147614', 'HG 8245', 'RN001', '8990', '9901', '6678', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(3, '147614', 'HG 8246', 'RN001', '8991', '9902', '6679', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(4, '148460', 'HG 8246', 'RN001', '8992', '9903', '6680', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(5, '149812', 'HG 8247', 'RN001', '8993', '9904', '6681', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(6, '151181', 'HG 8247', 'RN001', '8994', '9905', '6682', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(7, '151951', 'HG 8248', 'RN001', '8995', '9906', '6683', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(8, '151951', 'HG 8248', 'RN001', '8996', '9907', '6684', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(9, '156641', 'HG 8249', 'RN001', '8997', '9908', '6685', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(10, '156641', 'HG 8250', 'RN001', '8998', '9909', '6686', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(11, '427896', 'HG 8250', 'RN001', '8999', '9910', '6687', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(12, '645738', 'HG 8245', 'RN001', '9000', '9911', '6688', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(13, '147879', 'HG 8245', 'RN002', '9001', '9912', '6689', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(14, '157869', 'HG 8245', 'RN002', '9002', '9913', '6690', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(15, '158192', 'HG 8245', 'RN002', '9003', '9914', '6691', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(16, '158192', 'HG 8245', 'RN002', '9004', '9915', '6692', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(17, '159031', 'HG 8245', 'RN002', '9005', '9916', '6693', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(18, '159031', 'HG 8245', 'RN002', '9006', '9917', '6694', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(19, '159347', 'HG 8245', 'RN002', '9007', '9918', '6695', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(20, '159347', 'HG 8245', 'RN002', '9008', '9919', '6696', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(21, '534122', 'HG 8245', 'RN002', '9009', '9920', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(22, '427800', 'HG 8245', 'RN002', '9010', '9921', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(23, '427800', 'HG 8245', 'RN002', '9011', '9922', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(24, '151442', 'HG 8245', 'RN004', '9012', '9923', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(25, '151950', 'HG 8245', 'RN004', '9013', '9924', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(26, '153817', 'HG 8245', 'RN004', '9014', '9925', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(27, '153817', 'HG 8245', 'RN004', '9015', '9926', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(28, '157210', 'HG 8245', 'RN004', '9016', '9927', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(29, '158672', 'HG 8245', 'RN004', '9017', '9928', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(30, '158672', 'HG 8245', 'RN004', '9018', '9929', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(31, '159287', 'HG 8245', 'RN004', '9019', '9930', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(32, '159692', 'HG 8245', 'RN004', '9020', '9931', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(33, '160033', 'HG 8245', 'RN004', '9021', '9932', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(34, '143532', 'HG 8245', 'RN005', '9022', '9933', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(35, '152497', 'HG 8245', 'RN005', '9023', '9934', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(36, '155508', 'HG 8245', 'RN005', '9024', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(37, '160118', 'HG 8245', 'RN005', '9025', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(38, '160248', 'HG 8245', 'RN005', '9026', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(39, '160426', 'HG 8245', 'RN005', '9027', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(40, '147464', 'HG 8245', 'RN006', '9028', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(41, '150341', 'HG 8245', 'RN006', '9029', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(42, '150813', 'HG 8245', 'RN006', '9030', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(43, '150813', 'HG 8245', 'RN006', '9031', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(44, '155517', 'HG 8245', 'RN006', '9032', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(45, '158038', 'HG 8245', 'RN006', '9033', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(46, '145755', 'HG 8245', 'RN007', '9034', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(47, '148605', 'HG 8245', 'RN007', '9035', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(48, '150424', 'HG 8245', 'RN007', '9036', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(49, '150441', 'HG 8245', 'RN007', '9037', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(50, '151073', 'HG 8245', 'RN007', '9038', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(51, '157608', 'HG 8245', 'RN007', '9039', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(52, '157608', 'HG 8245', 'RN007', '9040', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(53, '144679', 'HG 8245', 'RN008', '9041', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(54, '144876', 'HG 8245', 'RN008', '9042', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(55, '144876', 'HG 8245', 'RN008', '9043', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(56, '145222', 'HG 8245', 'RN008', '9044', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1),
(57, '145222', 'HG 8245', 'RN008', '9045', '', '', NULL, NULL, 5, '2013-06-03 07:50:07', 5, '2013-06-03 07:50:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` bigint(20) NOT NULL AUTO_INCREMENT,
  `aksi` varchar(100) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `aksi`, `createby`, `createdate`) VALUES
(1, 'Delete User', 1, '2013-05-16 06:48:18'),
(2, 'update penggunaanmaterial, pengambilanmaterial, perubahantable', 5, '2013-05-19 07:40:50'),
(3, 'update penggunaanmaterial, pengambilanmaterial, perubahantable', 5, '2013-05-19 07:44:27'),
(4, 'pengembalian material', 5, '2013-05-19 07:54:16'),
(5, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 07:59:20'),
(6, 'Penambahan Team oleh Admin', 5, '2013-05-19 08:06:43'),
(7, 'Penambahan Team oleh Admin', 5, '2013-05-19 08:08:07'),
(8, 'Input Pelanggan -> 111-abc-fff', 5, '2013-05-19 10:47:07'),
(9, 'Call Instalasi (diterima) > 111-abc-fff', 5, '2013-05-19 10:49:38'),
(10, 'Input Pelanggan -> 222-FFF-222', 14, '2013-05-19 10:58:41'),
(11, 'Call Instalasi (diterima) > 222-FFF-222', 2, '2013-05-19 10:59:51'),
(12, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:00:24'),
(13, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:00:24'),
(14, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:01:22'),
(15, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:12:28'),
(16, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:14:54'),
(17, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:21:37'),
(18, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:27:45'),
(19, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:30:11'),
(20, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:35:21'),
(21, 'Assigntment WO (instalasi) > 222-FFF-222', 2, '2013-05-19 11:35:21'),
(22, 'Assigntment WO (migrasi) > 222-FFF-222', 2, '2013-05-19 11:40:42'),
(23, 'Assigntment WO (migrasi) > 222-FFF-222', 2, '2013-05-19 11:40:43'),
(24, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-19 13:33:46'),
(25, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-19 15:47:25'),
(26, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 15:47:41'),
(27, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 15:47:48'),
(28, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 16:30:08'),
(29, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 16:30:17'),
(30, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 17:53:11'),
(31, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 17:53:51'),
(32, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 17:54:26'),
(33, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-19 17:58:59'),
(34, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 18:01:21'),
(35, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 18:03:35'),
(36, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-19 18:56:21'),
(37, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 21:32:26'),
(38, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 21:35:15'),
(39, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-19 21:37:04'),
(40, 'Penambahan Material oleh Salah Satu Team', 1, '2013-05-20 00:50:21'),
(41, 'Penambahan Material oleh Salah Satu Team', 1, '2013-05-20 00:50:54'),
(42, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-20 02:19:09'),
(43, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-20 02:19:23'),
(44, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-20 02:20:00'),
(45, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-20 02:50:18'),
(46, 'Awal Pengambilan Material Oleh Team -> 5', 5, '2013-05-20 02:53:37'),
(47, 'Call Instalasi (diterima) > vbn-vbn-vbn', 5, '2013-05-20 02:54:45'),
(48, 'Call Instalasi (diterima) > ret-ert-ter', 2, '2013-05-20 02:56:53'),
(49, 'Assigntment WO (instalasi) > ret-ert-ter', 2, '2013-05-20 02:58:55'),
(50, 'Assigntment WO (instalasi) > ret-ert-ter', 2, '2013-05-20 02:58:55'),
(51, 'Assigntment WO (instalasi) > ret-ert-ter', 2, '2013-05-20 03:01:13'),
(52, 'Assigntment WO (migrasi) > ret-ert-ter', 2, '2013-05-20 03:11:13'),
(53, 'Assigntment WO (migrasi) > ret-ert-ter', 2, '2013-05-20 03:11:13'),
(54, 'Assigntment WO (migrasi) > ret-ert-ter', 2, '2013-05-20 03:15:56'),
(55, 'Call Instalasi (diterima) > nvb-nbn-mbn', 2, '2013-05-20 03:33:00'),
(56, 'Assigntment WO (instalasi) > nvb-nbn-mbn', 2, '2013-05-20 03:33:14'),
(57, 'Assigntment WO (instalasi) > nvb-nbn-mbn', 2, '2013-05-20 03:33:14'),
(58, 'Call Instalasi (diterima) > asd-234-wer', 5, '2013-05-20 05:01:53'),
(59, 'Call Instalasi (pending1) > gfh-fg3-423', 2, '2013-05-20 05:04:45'),
(60, 'Call Instalasi (ditolak) > gfh-fg3-423', 2, '2013-05-20 05:04:49'),
(61, 'Assigntment WO (instalasi) > vbn-vbn-vbn', 5, '2013-05-20 05:05:38'),
(62, 'Assigntment WO (instalasi) > vbn-vbn-vbn', 5, '2013-05-20 05:05:38'),
(63, 'Call Instalasi (diterima) > zxc-zxc-zxc', 5, '2013-05-20 05:07:52'),
(64, 'Assigntment WO (instalasi) > zxc-zxc-zxc', 5, '2013-05-20 05:08:54'),
(65, 'Assigntment WO (instalasi) > zxc-zxc-zxc', 5, '2013-05-20 05:08:54'),
(66, 'Assigntment WO (instalasi) > zxc-zxc-zxc', 5, '2013-05-20 05:10:04'),
(67, 'Call Instalasi (diterima) > nvb-nbn-mbn', 5, '2013-05-20 05:13:37'),
(68, 'Call Instalasi (diterima) > ret-ert-ter', 5, '2013-05-20 05:14:01'),
(69, 'Assigntment WO (instalasi) > nvb-nbn-mbn', 5, '2013-05-20 05:16:32'),
(70, 'Assigntment WO (instalasi) > nvb-nbn-mbn', 5, '2013-05-20 05:16:32'),
(71, 'Assigntment WO (instalasi) > nvb-nbn-mbn', 5, '2013-05-20 05:16:38'),
(72, 'Assigntment WO (instalasi) > nvb-nbn-mbn', 5, '2013-05-20 05:16:50'),
(73, 'Input Pelanggan -> fff-lkj-lkj', 1, '2013-05-20 05:29:52'),
(74, 'Input Pelanggan -> 342-343-423', 1, '2013-05-20 05:53:26'),
(75, 'Call Instalasi (diterima) > zxc-zxc-zxc', 2, '2013-05-20 05:56:06'),
(76, 'Assigntment WO (instalasi) > zxc-zxc-zxc', 2, '2013-05-20 05:56:22'),
(77, 'Assigntment WO (instalasi) > zxc-zxc-zxc', 2, '2013-05-20 05:56:22'),
(78, 'Call Instalasi (diterima) > gfh-fg3-423', 2, '2013-05-20 05:59:43'),
(79, 'Assigntment WO (instalasi) > gfh-fg3-423', 2, '2013-05-20 05:59:50'),
(80, 'Assigntment WO (instalasi) > gfh-fg3-423', 2, '2013-05-20 05:59:50'),
(81, 'Call Instalasi (diterima) > vbn-vbn-vbn', 2, '2013-05-20 06:16:08'),
(82, 'Assigntment WO (instalasi) > vbn-vbn-vbn', 2, '2013-05-20 06:16:30'),
(83, 'Assigntment WO (instalasi) > vbn-vbn-vbn', 2, '2013-05-20 06:16:30'),
(84, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-21 06:39:58'),
(85, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-21 06:40:39'),
(86, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-21 06:45:51'),
(87, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-21 06:49:22'),
(88, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-21 06:53:53'),
(89, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-21 06:54:21'),
(90, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-21 21:37:00'),
(91, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:07:04'),
(92, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:07:16'),
(93, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:07:38'),
(94, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:10:06'),
(95, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:10:21'),
(96, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:12:00'),
(97, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:14:54'),
(98, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:16:52'),
(99, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:18:51'),
(100, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:20:30'),
(101, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:42:55'),
(102, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:47:24'),
(103, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:49:11'),
(104, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:49:23'),
(105, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 17:51:58'),
(106, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-22 17:52:10'),
(107, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 18:26:00'),
(108, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 18:58:02'),
(109, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 19:02:58'),
(110, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-22 19:03:11'),
(111, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-24 04:00:33'),
(112, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-24 04:01:03'),
(113, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-24 04:01:26'),
(114, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-24 04:11:10'),
(115, 'Awal Pengambilan Material Oleh Team', 5, '2013-05-24 06:56:17'),
(116, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-24 06:56:27'),
(117, 'Penambahan Material oleh Salah Satu Team', 5, '2013-05-24 06:56:38'),
(118, 'Assigntment WO (instalasi) > 222016589', 3, '2013-05-24 08:41:14'),
(119, 'Assigntment WO (instalasi) > 222016589', 3, '2013-05-24 08:41:24'),
(120, 'Assigntment WO (instalasi) > 222016589', 3, '2013-05-24 08:45:10'),
(121, 'Assigntment WO (instalasi) > 222016589', 3, '2013-05-24 08:49:14'),
(122, 'Awal Pengambilan Material Oleh Team', 2, '2013-05-24 08:54:50'),
(123, 'Assigntment WO (migrasi) > 222016589', 2, '2013-05-24 09:26:11'),
(124, 'Penambahan Material oleh Salah Satu Team', 2, '2013-05-24 09:32:57'),
(125, 'Awal Pengambilan Material Oleh Team', 1, '2013-05-26 19:48:13'),
(126, 'Awal Pengambilan Material Oleh Team', 1, '2013-05-26 19:49:42'),
(127, 'Assigntment WO (instalasi) > 222016589', 1, '2013-05-27 07:35:16'),
(128, 'Assigntment WO (instalasi) > 222016589', 1, '2013-05-27 07:35:23'),
(129, 'Assigntment WO (instalasi) > 222016589', 1, '2013-05-27 07:47:23'),
(130, 'Assigntment WO (instalasi) > 222016589', 1, '2013-05-27 07:47:29'),
(131, 'Assigntment WO (instalasi) > 222016589', 1, '2013-05-27 07:47:31'),
(132, 'Penambahan Material oleh Salah Satu Team', 1, '2013-05-29 01:10:45'),
(133, 'Input Pelanggan -> ', 1, '2013-05-29 08:37:32'),
(134, 'Penambahan Material oleh Salah Satu Team', 5, '2013-06-01 20:34:00'),
(135, 'Penambahan Material oleh Salah Satu Team', 5, '2013-06-01 20:43:19'),
(136, 'Penambahan Material oleh Salah Satu Team', 5, '2013-06-02 10:28:58'),
(137, 'Call Instalasi (diterima) > 147394', 5, '2013-06-03 00:51:41'),
(138, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 00:51:41'),
(139, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 00:51:45'),
(140, 'Call Instalasi (diterima) > 147394', 5, '2013-06-03 01:25:24'),
(141, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:25:24'),
(142, 'Call Instalasi (diterima) > 147394', 5, '2013-06-03 01:33:44'),
(143, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:33:44'),
(144, 'Call Instalasi (ditolak) > 147394', 0, '2013-06-03 01:34:23'),
(145, 'Call Instalasi (pending1) > 149812', 5, '2013-06-03 01:34:32'),
(146, 'Call Instalasi (no tone) > 151951', 0, '2013-06-03 01:34:42'),
(147, 'Call Instalasi (diterima) > 427896', 5, '2013-06-03 01:35:11'),
(148, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:35:11'),
(149, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:36:10'),
(150, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:36:36'),
(151, 'Call Instalasi (diterima) > 158192', 5, '2013-06-03 01:41:45'),
(152, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:41:45'),
(153, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:43:25'),
(154, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 01:58:08'),
(155, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:01:47'),
(156, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:02:32'),
(157, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:04:13'),
(158, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:04:22'),
(159, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:06:16'),
(160, 'Call Instalasi (diterima) > 156641', 5, '2013-06-03 02:11:02'),
(161, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:11:03'),
(162, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:11:34'),
(163, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:17:21'),
(164, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:18:39'),
(165, 'Call Instalasi (diterima) > 156641', 5, '2013-06-03 02:18:40'),
(166, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:19:34'),
(167, 'Call Instalasi (diterima) > 427896', 5, '2013-06-03 02:43:36'),
(168, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:43:36'),
(169, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:53:49'),
(170, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:57:12'),
(171, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 02:57:21'),
(172, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:00:49'),
(173, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:00:59'),
(174, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:01:40'),
(175, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:02:59'),
(176, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:03:52'),
(177, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:05:16'),
(178, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:08:16'),
(179, 'Assigntment WO (instalasi) > ', 5, '2013-06-03 03:11:36'),
(180, 'Call Instalasi (diterima) > 645738', 5, '2013-06-03 03:11:37'),
(181, 'Assigntment WO (instalasi) > 645738', 5, '2013-06-03 03:12:22'),
(182, 'Assigntment WO (instalasi) > 645738', 5, '2013-06-03 03:12:28'),
(183, 'Assigntment WO (instalasi) > 645738', 5, '2013-06-03 03:13:25'),
(184, 'Assigntment WO (instalasi) > 645738', 5, '2013-06-03 04:31:24'),
(185, 'Assigntment WO (instalasi) > ', 5, '2013-06-06 10:08:58'),
(186, 'Assigntment WO (instalasi) > ', 5, '2013-06-06 10:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `materialterpakai`
--

CREATE TABLE IF NOT EXISTS `materialterpakai` (
  `id_penggunaan_material` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(10) NOT NULL,
  `jumlah_ont` varchar(10) NOT NULL,
  `sn_ont` varchar(20) NOT NULL,
  `jumlah_roset` varchar(5) NOT NULL,
  `panjang_kabel` varchar(5) NOT NULL,
  `jumlah_duct` varchar(5) NOT NULL,
  `jumlah_flexible_pipe` varchar(5) NOT NULL,
  `kabel_50` int(3) NOT NULL,
  `kabel_75` int(3) NOT NULL,
  `kabel_100` int(3) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_penggunaan_material`),
  UNIQUE KEY `id_team` (`id_team`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(10) DEFAULT NULL,
  `id_wo` varchar(30) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `jam_janji` datetime DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `id_team`, `id_wo`, `id_pelanggan`, `jam_janji`, `keterangan`, `penerima`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(22, 1, '1-TLK.GGK.01.07-645738', '645738', '2013-06-03 11:30:00', '', '', 5, '2013-06-03 10:11:37', 5, '2013-06-03 11:31:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(20) NOT NULL,
  `id_sto` varchar(20) NOT NULL,
  `id_team` int(10) DEFAULT NULL,
  `id_caller` int(10) DEFAULT NULL,
  `id_area` int(10) DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(300) NOT NULL,
  `nomor_rumah` varchar(8) DEFAULT NULL,
  `provinsi_pelanggan` varchar(50) NOT NULL,
  `kota_kabupaten_pelanggan` varchar(50) DEFAULT NULL,
  `kecamatan_pelanggan` varchar(50) DEFAULT NULL,
  `kelurahan_pelanggan` varchar(50) DEFAULT NULL,
  `kode_pos_pelanggan` varchar(10) DEFAULT NULL,
  `layanan_pots` int(2) DEFAULT NULL,
  `layanan_speedy` int(2) DEFAULT NULL,
  `layanan_iptv` int(2) DEFAULT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pelanggan`),
  KEY `index` (`index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`index`, `id_pelanggan`, `id_sto`, `id_team`, `id_caller`, `id_area`, `nama_pelanggan`, `alamat_pelanggan`, `nomor_rumah`, `provinsi_pelanggan`, `kota_kabupaten_pelanggan`, `kecamatan_pelanggan`, `kelurahan_pelanggan`, `kode_pos_pelanggan`, `layanan_pots`, `layanan_speedy`, `layanan_iptv`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(6, '147394', 'TLK.GGK.01.07', 1, 1, 0, 'IIS WIDIANINGRUM', 'Kp RANCAHERANG', '9', 'Jawa Barat', 'bandung', 'dayeuhkolot', 'bojongsoang', '88999', 0, 0, 0, 0, '2013-06-03 07:50:07', NULL, '2013-06-06 23:31:57', 1),
(8, '147614', 'TLK.GGK.01.07', NULL, 3, NULL, 'MIMI MARYATI', 'Kp RANCAHERANG', '1/178A', 'Jawa Barat', 'bandung', 'dayeuhkolot', 'bojongsoang', '89000', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(10, '148460', 'TLK.GGK.01.07', NULL, 7, NULL, 'ATANG NOVE ALSYAM', 'Kp RANCAHERANG', '18/178A', 'Jawa Barat', 'bandung', 'dayeuhkolot', 'bojongsoang', '89002', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(12, '149812', 'TLK.GGK.01.07', 1, 9, 0, 'HENGKI RIADI', 'Kp RANCAHERANG', '14', 'Jawa Barat', 'bandung', 'dayeuhkolot', 'bojongsoang', '89003', 0, 0, 0, 0, '2013-06-03 07:50:07', NULL, '2013-06-06 23:39:11', 1),
(18, '151181', 'TLK.GGK.01.07', NULL, 10, NULL, 'SUDIRMO ER S SI', 'Kp RANCAHERANG', '', 'Jawa Barat', 'bandung', 'dayeuhkolot', 'bojongsoang', '89004', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(21, '151951', 'TLK.GGK.01.07', 1, 1, NULL, 'HERAWATI SAEFUDIN', 'SARIINDAH', '6', 'Jawa Barat', 'bandung', 'dayeuhkolot', 'bojongsoang', '89005', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(26, '156641', 'TLK.GGK.01.07', NULL, 3, NULL, 'NOOR DJOKO', 'SARIKASO', 'KAV.14', 'Jawa Barat', 'bandung', 'antapani', 'geger kalong', '89007', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(42, '427896', 'TLK.GGK.01.07', NULL, 7, NULL, 'MAMAN', 'Kp RANCAHERANG', '13', 'Jawa Barat', 'bandung', 'antapani', 'geger kalong', '89009', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(44, '645738', 'TLK.GGK.01.07', 1, 9, 0, 'MARWIN DOUGLAS HARAHAP', 'Kp RANCAHERANG', '15', 'Jawa Barat', 'bandung', 'antapani', 'geger kalong', '89010', 0, 0, 0, 0, '2013-06-03 07:50:07', NULL, '2013-06-06 23:18:53', 1),
(9, '147879', 'TLK.GGK.01.07', NULL, 10, NULL, 'ANA SUPRIATIN', 'CIJEROKASO', '73 BLK', 'Jawa Barat', 'bandung', 'antapani', 'geger kalong', '89011', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(29, '157869', 'TLK.GGK.01.07', NULL, 1, NULL, 'NANI ROCHAENI', 'CIJEROKASO', '50', 'Jawa Barat', 'bandung', 'antapani', 'geger kalong', '89012', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(31, '158192', 'TLK.GGK.01.07', NULL, 3, NULL, 'UAT', 'CIJEROKASO', '', 'Jawa Barat', 'bandung', 'antapani', 'geger kalong', '89013', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(33, '159031', 'TLK.GGK.01.07', NULL, 7, NULL, 'AMUNG SETIAWAN', 'CIJEROKASO', '58/178 A', 'Jawa Barat', 'bandung', 'antapani', 'dayeuh kolot', '89015', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(35, '159347', 'TLK.GGK.01.07', NULL, 9, NULL, 'UTAM ENGKOS', 'CIJEROKASO', '73', 'Jawa Barat', 'bandung', 'antapani', 'dayeuh kolot', '89017', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(43, '534122', 'TLK.GGK.01.07', NULL, 10, NULL, 'D ARNAS L', 'CIJEROKASO', '4/178A', 'Jawa Barat', 'bandung', 'antapani', 'dayeuh kolot', '89019', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(41, '427800', 'TLK.GGK.01.07', NULL, 1, NULL, 'MARLENAWATI, SH', 'TERUSAN SARIKASO', 'VII/NO.5', 'Jawa Barat', 'bandung', 'dayeuh kolot', 'dayeuh kolot', '89020', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(19, '151442', 'TLK.GGK.01.07', NULL, 3, NULL, 'IPAH SURYATI', 'GEGERKALONG HILIR', '34/178A', 'Jawa Barat', 'bandung', 'dayeuh kolot', 'dayeuh kolot', '89022', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(20, '151950', 'TLK.GGK.01.07', NULL, 7, NULL, 'LASMARIA THERESIA S', 'CIJEROKASO', '53', 'Jawa Barat', 'bandung', 'dayeuh kolot', 'dayeuh kolot', '89023', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(23, '153817', 'TLK.GGK.01.07', NULL, 9, NULL, 'SUGIANTI BAMBANG S', 'CIJEROKASO', '110', 'Jawa Barat', 'bandung', 'ujung berung', 'ujung berung', '89024', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(27, '157210', 'TLK.GGK.01.07', NULL, 10, NULL, 'ELLY HELLYA', 'Kp CIJEROKASO', '51', 'Jawa Barat', 'bandung', 'ujung berung', 'ujung berung', '89026', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(32, '158672', 'TLK.GGK.01.07', NULL, 1, NULL, 'DENNY SAIFUL ISKANDAR', 'CIJEROKASO', '', 'Jawa Barat', 'bandung', 'ujung berung', 'ujung berung', '89027', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(34, '159287', 'TLK.GGK.01.07', NULL, 3, NULL, 'TATI ROHANAH', 'GEGERKALONG HILIR', '30/178A', 'Jawa Barat', 'bandung', 'ujung berung', 'ujung berung', '89029', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(36, '159692', 'TLK.GGK.01.07', NULL, 7, NULL, 'SONNY WINARDHI MSC', 'CIJEROKASO', '93', 'Jawa Barat', 'bandung', 'ujung berung', 'ujung berung', '89030', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(37, '160033', 'TLK.GGK.01.07', NULL, 9, NULL, 'TUTY ROCHAETY S PD', 'GEGERKALONG HILIR', '46/178 A', 'Jawa Barat', 'bandung', 'ujung berung', 'ujung berung', '89031', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(1, '143532', 'TLK.GGK.01.07', NULL, 10, NULL, 'ETTY SUMIATI', 'GEGERKALONG HILIR', '35/1878A', 'Jawa Barat', 'bandung', 'ujung berung', 'ujung berung', '89032', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(22, '152497', 'TLK.GGK.01.07', NULL, 1, NULL, 'SUYAMAN', 'CIJEROKASO', '6', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89033', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(24, '155508', 'TLK.GGK.01.07', NULL, 3, NULL, 'ADE JUHAENI', 'CIJEROKASO', '4', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89034', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(38, '160118', 'TLK.GGK.01.07', NULL, 7, NULL, 'JALU NUGRAHA', 'CIJEROKASO', '116', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89035', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(39, '160248', 'TLK.GGK.01.07', NULL, 9, NULL, 'DEDI DJUNAEDI', 'CIJEROKASO', '107', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89036', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(40, '160426', 'TLK.GGK.01.07', NULL, 10, NULL, 'DADANG KARTIWA', 'CIJEROKASO', '120', 'Jawa Barat', 'bandung', 'antabaru', 'antabaru', '89037', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(7, '147464', 'TLK.GGK.01.07', NULL, 1, NULL, 'DADI ROSADI', 'CIJEROKASO', '128', 'Jawa Barat', 'bandung', 'antabaru', 'antabaru', '89038', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(13, '150341', 'TLK.GGK.01.07', NULL, 3, NULL, 'NANANG SUPRIATNA', 'GEGERKALONG HILIR', '130', 'Jawa Barat', 'bandung', 'antabaru', 'antabaru', '89039', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(16, '150813', 'TLK.GGK.01.07', NULL, 7, NULL, 'DADI ROSADI', 'CIJEROKASO', '128 B', 'Jawa Barat', 'bandung', 'antabaru', 'antabaru', '89040', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(25, '155517', 'TLK.GGK.01.07', NULL, 9, NULL, 'EDEN DARWITA', 'CIJEROKASO', '24', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89042', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(30, '158038', 'TLK.GGK.01.07', NULL, 10, NULL, 'EUIS SUPARTI', 'GEGERKALONG HILIR', '22/178A', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89043', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(5, '145755', 'TLK.GGK.01.07', NULL, 1, NULL, '3AP-186/DACEP SURATMAN', 'CIWARUGA', '207', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89044', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(11, '148605', 'TLK.GGK.01.07', NULL, 3, NULL, 'ANANG', 'GEGERKALONG HILIR', '6', 'Jawa Barat', 'bandung', 'pasir kaliki', 'pasir kaliki', '89045', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(14, '150424', 'TLK.GGK.01.07', NULL, 7, NULL, 'AGUS LAKSANA', 'Gg ARJUNA', '', 'Jawa Barat', 'bandung', 'pasir kaliki', 'pasir kaliki', '89046', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(15, '150441', 'TLK.GGK.01.07', NULL, 9, NULL, 'HERI SUHAERI', 'GEGERKALONG HILIR', '10/178A', 'Jawa Barat', 'bandung', 'pasir kaliki', 'pasir kaliki', '89047', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(17, '151073', 'TLK.GGK.01.07', NULL, 10, NULL, 'TEDDY M ZULKARNAEN SE', 'GEGERKALONG HILIR', '235', 'Jawa Barat', 'bandung', 'pasir kaliki', 'pasir kaliki', '89048', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(28, '157608', 'TLK.GGK.01.07', NULL, 1, NULL, 'TITI ARSITY', 'GEGERKALONG HILIR', '17/178A', 'Jawa Barat', 'bandung', 'pasir kaliki', 'pasir kaliki', '89049', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(2, '144679', 'TLK.GGK.01.07', NULL, 3, NULL, 'TISNA', 'GEGERKALONG HILIR', '9/178A', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89051', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(3, '144876', 'TLK.GGK.01.07', NULL, 7, NULL, 'OBAN SOBANA', 'GEGERKALONG HILIR', '205', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89052', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1),
(4, '145222', 'TLK.GGK.01.07', NULL, 9, NULL, 'NANANG', 'GEGERKALONG HILIR', '', 'Jawa Barat', 'bandung', 'bojongsoang', 'bojongsoang', '89054', NULL, NULL, NULL, 0, '2013-06-03 07:50:07', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengambilanmaterial`
--

CREATE TABLE IF NOT EXISTS `pengambilanmaterial` (
  `id_penggunaan_material` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(10) NOT NULL,
  `jumlah_ont` varchar(10) NOT NULL,
  `sn_ont` varchar(20) NOT NULL,
  `jumlah_roset` varchar(5) NOT NULL,
  `panjang_kabel` varchar(5) NOT NULL,
  `jumlah_duct` varchar(5) NOT NULL,
  `jumlah_flexible_pipe` varchar(5) NOT NULL,
  `kabel_50` int(3) NOT NULL,
  `kabel_75` int(3) NOT NULL,
  `kabel_100` int(3) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_penggunaan_material`),
  UNIQUE KEY `id_team` (`id_team`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaanmaterial`
--

CREATE TABLE IF NOT EXISTS `penggunaanmaterial` (
  `id_penggunaan_material` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(10) NOT NULL,
  `jumlah_ont` varchar(10) NOT NULL,
  `sn_ont` varchar(20) NOT NULL,
  `jumlah_roset` varchar(5) NOT NULL,
  `panjang_kabel` varchar(5) NOT NULL,
  `jumlah_duct` varchar(5) NOT NULL,
  `jumlah_flexible_pipe` varchar(5) NOT NULL,
  `kabel_50` int(3) NOT NULL,
  `kabel_75` int(3) NOT NULL,
  `kabel_100` int(3) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_penggunaan_material`),
  UNIQUE KEY `id_team` (`id_team`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penggunadevice`
--

CREATE TABLE IF NOT EXISTS `penggunadevice` (
  `id_pengguna_device` int(10) NOT NULL AUTO_INCREMENT,
  `id_sto` varchar(20) NOT NULL,
  `id_team` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `username_pengguna_device` varchar(20) NOT NULL,
  `password_pengguna_device` varchar(20) NOT NULL,
  `interval_update_posisi` int(5) NOT NULL,
  `createby` varchar(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pengguna_device`),
  UNIQUE KEY `id_team` (`id_team`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `penggunadevice`
--

INSERT INTO `penggunadevice` (`id_pengguna_device`, `id_sto`, `id_team`, `id_area`, `username_pengguna_device`, `password_pengguna_device`, `interval_update_posisi`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 'TLK.GGK.01.07', 1, 0, 'tes', 'tes', 0, '', '0000-00-00 00:00:00', NULL, NULL, 1),
(7, '1', 3, 0, 'kamu', 'kamu', 0, '', '0000-00-00 00:00:00', NULL, NULL, 1),
(6, '1', 2, 0, 'akua', 'aku', 0, '', '0000-00-00 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penggunaweb`
--

CREATE TABLE IF NOT EXISTS `penggunaweb` (
  `id_pengguna_web` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `nomor_telpon` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username_pengguna_web` varchar(20) NOT NULL,
  `password_pengguna_web` varchar(20) NOT NULL,
  `id_sto` varchar(20) DEFAULT NULL,
  `hak_pengguna_web` enum('super','admin','call') NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_pengguna_web`),
  UNIQUE KEY `username_pengguna_web` (`username_pengguna_web`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `penggunaweb`
--

INSERT INTO `penggunaweb` (`id_pengguna_web`, `nama`, `nomor_telpon`, `email`, `username_pengguna_web`, `password_pengguna_web`, `id_sto`, `hak_pengguna_web`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 'CC_Bdg_01', '', '', 'cc1', 'cc1', 'TLK.GGK.01.07', 'call', 1, '2013-06-01 16:42:32', 5, '2013-06-02 04:24:21', 1),
(2, 'CC_Bdg_02', '', '', 'cc2', 'cc2', 'TLK.GGK.01.08', 'call', 1, '2013-06-01 16:43:20', NULL, NULL, 1),
(3, 'CC_Bdg_03', '', '', 'cc3', 'cc3', 'TLK.GGK.01.07', 'call', 1, '2013-06-01 16:44:08', NULL, NULL, 1),
(4, 'CC_Bdg_04', '', '', 'cc4', 'cc4', 'TLK.GGK.01.08', 'call', 1, '2013-06-01 16:44:31', 1, '2013-06-01 16:44:38', 1),
(5, 'SU_Bdg_01', '', '', 'superadmin', 'as', 'TLK.GGK.01.07', 'super', 1, '2013-06-01 16:45:27', NULL, NULL, 1),
(6, 'admin', '', '', 'admin', 'admin', 'TLK.GGK.01.07', 'admin', 1, '2013-06-01 17:07:52', NULL, NULL, 1),
(7, 'CC_Bdg_05', '', '', 'cc5', 'cc5', 'TLK.GGK.01.07', 'call', 1, '2013-06-01 17:25:24', NULL, NULL, 1),
(8, 'CC_Bdg_07', '', '', 'cc7', 'cc7', 'TLK.GGK.01.08', 'call', 1, '2013-06-01 17:33:30', NULL, NULL, 1),
(9, 'CC_Bdg_08', '', '', 'cc8', 'cc8', 'TLK.GGK.01.07', 'call', 5, '2013-06-01 22:52:39', NULL, NULL, 1),
(10, 'CC_Bdg_09', '', '', 'cc9', 'cc9', 'TLK.GGK.01.07', 'call', 5, '2013-06-02 16:41:24', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perubahanlayanan`
--

CREATE TABLE IF NOT EXISTS `perubahanlayanan` (
  `id_perubahanlayanan` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(10) NOT NULL,
  `layanan_speedy_sebelum` int(1) NOT NULL,
  `layanan_speedy_sesudah` int(1) NOT NULL,
  `layanan_pots_sebelum` int(1) NOT NULL,
  `layanan_pots_sesudah` int(1) NOT NULL,
  `layanan_iptv_sebelum` int(1) NOT NULL,
  `layanan_iptv_sesudah` int(1) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_perubahanlayanan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `perubahanlayanan`
--

INSERT INTO `perubahanlayanan` (`id_perubahanlayanan`, `id_pelanggan`, `layanan_speedy_sebelum`, `layanan_speedy_sesudah`, `layanan_pots_sebelum`, `layanan_pots_sesudah`, `layanan_iptv_sebelum`, `layanan_iptv_sesudah`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 1, 0, 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(2, 1, 0, 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(3, 1, 0, 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(4, 1, 0, 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(5, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(6, 1, 0, 1, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(7, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(8, 1, 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(9, 1, 1, 1, 1, 1, 1, 1, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(10, 1, 1, 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(11, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(12, 12, 1, 1, 1, 1, 0, 1, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(13, 13, 1, 1, 1, 1, 0, 1, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(14, 16, 1, 1, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(15, 0, 0, 0, 0, 0, 0, 0, 0, '2013-05-18 12:34:54', NULL, NULL, 1),
(16, 0, 0, 0, 0, 0, 0, 0, 0, '2013-05-18 12:45:42', NULL, NULL, 1),
(17, 0, 0, 0, 0, 0, 0, 0, 0, '2013-05-18 12:53:59', NULL, NULL, 1),
(18, 0, 0, 0, 0, 0, 0, 0, 0, '2013-05-18 13:07:31', NULL, NULL, 1),
(19, 0, 0, 1, 0, 1, 0, 1, 0, '2013-05-18 13:17:47', NULL, NULL, 1),
(20, 0, 0, 1, 0, 1, 0, 1, 0, '2013-05-18 13:28:22', NULL, NULL, 1),
(21, 0, 0, 0, 0, 0, 0, 0, 0, '2013-05-18 13:46:19', NULL, NULL, 1),
(22, 0, 0, 1, 0, 1, 0, 1, 0, '2013-05-18 14:05:51', NULL, NULL, 1),
(23, 0, 1, 2, 1, 2, 1, 2, 0, '2013-05-19 15:55:35', NULL, NULL, 1),
(24, 222, 0, 1, 0, 1, 0, 1, 0, '2013-05-19 18:42:17', NULL, NULL, 1),
(25, 0, 0, 0, 0, 0, 0, 0, 0, '2013-05-20 10:16:44', NULL, NULL, 1),
(26, 0, 2, 2, 2, 2, 2, 2, 0, '2013-05-24 11:20:35', NULL, NULL, 1),
(27, 222016589, 0, 0, 0, 0, 0, 0, 0, '2013-05-24 16:37:13', NULL, NULL, 1),
(28, 147394, 0, 0, 1, 1, 0, 0, 0, '2013-06-03 06:22:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perubahantable`
--

CREATE TABLE IF NOT EXISTS `perubahantable` (
  `id_perubahan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_table` varchar(30) NOT NULL,
  `id_team` int(3) NOT NULL,
  `tgl_perubahan` date NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_perubahan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `perubahantable`
--

INSERT INTO `perubahantable` (`id_perubahan`, `nama_table`, `id_team`, `tgl_perubahan`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 'penggunaanmaterial', 1, '2013-06-02', 5, '2013-05-19 13:41:20', 5, '2013-06-02 17:28:58', 1),
(2, 'womigrasi', 1, '2013-06-02', 5, '2013-05-24 16:26:11', 5, '2013-06-03 21:41:58', 1),
(3, 'woinstalasi', 1, '2013-06-02', 5, '2013-05-19 18:01:22', 5, '2013-06-06 17:10:59', 1),
(4, 'penggunaanmaterial', 2, '2013-05-29', 5, '2013-05-19 20:33:46', 1, '2013-05-29 08:10:45', 1),
(5, 'penggunaanmaterial', 3, '2013-06-02', 5, '2013-05-19 22:47:25', 5, '2013-06-02 03:43:19', 1),
(6, 'penggunaanmaterial', 1, '2013-06-02', 5, '2013-05-20 00:58:59', 5, '2013-06-02 17:28:58', 1),
(7, 'penggunaanmaterial', 2, '2013-05-29', 5, '2013-05-20 01:56:21', 1, '2013-05-29 08:10:45', 1),
(8, 'penggunaanmaterial', 3, '2013-06-02', 5, '2013-05-20 09:19:09', 5, '2013-06-02 03:43:19', 1),
(9, 'penggunaanmaterial', 4, '2013-05-24', 5, '2013-05-20 09:19:23', 5, '2013-05-24 11:01:26', 1),
(10, 'penggunaanmaterial', 5, '2013-05-20', 5, '2013-05-20 09:53:37', NULL, NULL, 1),
(11, 'woinstalasi', 2, '2013-05-29', 5, '2013-05-20 12:16:50', 5, '2013-06-03 10:13:25', 1),
(12, 'penggunaanmaterial', 0, '2013-05-21', 5, '2013-05-21 13:39:58', NULL, NULL, 1),
(13, 'penggunaanmaterial', 0, '2013-05-21', 5, '2013-05-21 13:40:39', NULL, NULL, 1),
(14, 'penggunaanmaterial', 0, '2013-05-21', 5, '2013-05-21 13:45:51', NULL, NULL, 1),
(15, 'penggunaanmaterial', 0, '2013-05-21', 5, '2013-05-21 13:49:22', NULL, NULL, 1),
(16, 'penggunaanmaterial', 0, '2013-05-21', 5, '2013-05-21 13:53:53', NULL, NULL, 1),
(17, 'penggunaanmaterial', 0, '2013-05-21', 5, '2013-05-21 13:54:21', NULL, NULL, 1),
(18, 'penggunaanmaterial', 0, '2013-05-22', 5, '2013-05-22 04:37:00', NULL, NULL, 1),
(19, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:10:06', NULL, NULL, 1),
(20, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:10:21', NULL, NULL, 1),
(21, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:12:00', NULL, NULL, 1),
(22, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:14:54', NULL, NULL, 1),
(23, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:16:52', NULL, NULL, 1),
(24, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:18:51', NULL, NULL, 1),
(25, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:47:24', NULL, NULL, 1),
(26, 'penggunaanmaterial', 0, '2013-05-23', 5, '2013-05-23 00:52:10', NULL, NULL, 1),
(27, 'penggunaanmaterial', 0, '2013-05-24', 5, '2013-05-24 13:56:17', NULL, NULL, 1),
(28, 'penggunaanmaterial', 0, '2013-05-24', 2, '2013-05-24 15:54:50', NULL, NULL, 1),
(29, 'penggunaanmaterial', 0, '2013-05-27', 1, '2013-05-27 02:48:13', NULL, NULL, 1),
(30, 'penggunaanmaterial', 0, '2013-05-27', 1, '2013-05-27 02:49:42', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posisipelanggan`
--

CREATE TABLE IF NOT EXISTS `posisipelanggan` (
  `id_posisipelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `posisi_bujur` double NOT NULL,
  `posisi_lintang` double NOT NULL,
  PRIMARY KEY (`id_posisipelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posisipelanggan`
--

INSERT INTO `posisipelanggan` (`id_posisipelanggan`, `posisi_bujur`, `posisi_lintang`) VALUES
(1, 107.6092487, -6.9502583);

-- --------------------------------------------------------

--
-- Table structure for table `posisi_team`
--

CREATE TABLE IF NOT EXISTS `posisi_team` (
  `id_team` int(10) NOT NULL,
  `lintang_pertama` varchar(20) NOT NULL,
  `bujur_pertama` varchar(20) NOT NULL,
  `lintang_kedua` varchar(20) DEFAULT NULL,
  `bujur_kedua` varchar(20) DEFAULT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi_team`
--

INSERT INTO `posisi_team` (`id_team`, `lintang_pertama`, `bujur_pertama`, `lintang_kedua`, `bujur_kedua`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, '-6.9502581', '107.6092509', '-6.9502581', '107.6092509', 0, '0000-00-00 00:00:00', 0, '2013-06-07 00:13:21', 1),
(2, '-6.932562', '107.662754', '-6.932562', '107.662754', 0, '0000-00-00 00:00:00', 1, '2013-04-24 00:00:00', 1),
(3, '-6.946535', '107.662239', '-6.946535', '107.662239', 0, '0000-00-00 00:00:00', 1, '2013-04-17 00:00:00', 1),
(4, '-6.946705', '107.644386', '-6.946705', '107.644386', 0, '0000-00-00 00:00:00', 1, '2013-04-18 00:00:00', 1),
(5, '-6.867973', '107.585024', '-6.867973', '107.585024', 5, '2013-05-23 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `snmaterial`
--

CREATE TABLE IF NOT EXISTS `snmaterial` (
  `id_snmaterial` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(10) NOT NULL,
  `id_team` int(10) NOT NULL,
  `sn_material` varchar(20) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_snmaterial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `snmaterial`
--

INSERT INTO `snmaterial` (`id_snmaterial`, `id_pelanggan`, `id_team`, `sn_material`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 1, 1, '343444', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(2, 1, 2, '2322', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(6, 1, 1, '112', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(7, 1, 1, '23232', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(8, 1, 1, '232', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(9, 1, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(10, 12, 1, '45444', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(11, 13, 1, '4444', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(12, 16, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(13, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(14, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(15, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(16, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(17, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(18, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(19, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(20, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(21, 0, 1, '', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(22, 222, 1, '565555', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(23, 0, 1, '676666', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(24, 0, 1, '6677709', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(25, 222016589, 1, '78910', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(26, 147394, 1, '78777676', 0, '0000-00-00 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE IF NOT EXISTS `sto` (
  `id_sto` varchar(20) NOT NULL,
  `id_sto2` int(10) NOT NULL AUTO_INCREMENT,
  `nama_sto` varchar(40) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `lintang_sto` varchar(20) NOT NULL,
  `bujur_sto` varchar(20) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_sto2`),
  UNIQUE KEY `id_sto` (`id_sto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`id_sto`, `id_sto2`, `nama_sto`, `provinsi`, `alamat`, `lintang_sto`, `bujur_sto`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
('TLK.GGK.01.07', 1, 'Bandung Centrum', 'Jawa Barat', 'Bandung, Lembong', '-6.91682', '107.611213', 1, '2013-05-24 15:06:47', NULL, NULL, 1),
('TLK.GGK.01.08', 2, 'Geger Kalong', 'Jawa Barat', 'Geger Kalong', '-6.870316', '107.590163', 1, '2013-05-24 15:09:06', NULL, NULL, 1),
('TLK.GGK.01.09', 3, 'Bandung Toha', 'Jawa Barat', 'Mohamad Toha', '-6.870316', '107.590163', 1, '2013-05-24 15:09:06', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kab_kec_kel`
--

CREATE TABLE IF NOT EXISTS `tb_kab_kec_kel` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tb_kab_kec_kel`
--

INSERT INTO `tb_kab_kec_kel` (`id`, `provinsi`) VALUES
(1, 'Aceh'),
(2, 'Bali'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'Gorontalo'),
(6, 'Jakarta'),
(7, 'Jambi'),
(8, 'Jawa Barat'),
(9, 'Jawa Tengah'),
(10, 'Jawa Timur'),
(11, 'Kalimantan Barat'),
(12, 'Kalimantan Selatan'),
(13, 'Kalimantan Tengah'),
(14, 'Kalimantan Timur'),
(15, 'Kalimantan Utara'),
(16, 'Kep. Bangka Belitung'),
(17, 'Kep. Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'NTB'),
(22, 'NTT'),
(23, 'Papua'),
(24, 'Papua Barat'),
(25, 'Riau'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Utara'),
(31, 'Sumatera Barat'),
(32, 'Sumatera Selatan'),
(33, 'Sumatera Utara'),
(34, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id_team` int(10) NOT NULL AUTO_INCREMENT,
  `id_sto` varchar(20) NOT NULL,
  `nama_team` varchar(40) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_team`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `id_sto`, `nama_team`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
(1, 'TLK.GGK.01.07', 'Ops_bdgCTR_01', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(2, 'TLK.GGK.01.07', 'Ops_bdgCTR_02', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(3, 'TLK.GGK.01.07', 'Ops_bdgCTR_03', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(4, 'TLK.GGK.01.08', 'Ops_bdgCTR_04', 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(5, 'TLK.GGK.01.08', 'Ops_bdg CTR_05', 2, '2013-05-27 05:15:08', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testinput`
--

CREATE TABLE IF NOT EXISTS `testinput` (
  `angka` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testinput`
--

INSERT INTO `testinput` (`angka`) VALUES
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
(1),
(2),
(3),
(4),
(5),
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
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(155),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172),
(173),
(174),
(175),
(176),
(177),
(178),
(179),
(180),
(181),
(182),
(183),
(184),
(185),
(186),
(187),
(188),
(189),
(190),
(191),
(192),
(193),
(194),
(195),
(196),
(197),
(198),
(199),
(200),
(201),
(202),
(203),
(204),
(205),
(206),
(207),
(208),
(209),
(210),
(211),
(212),
(213),
(214),
(215),
(216),
(217),
(218),
(219),
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
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(155),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172),
(173),
(174),
(175),
(176),
(177),
(178),
(179),
(180),
(181),
(182),
(183),
(184),
(185),
(186),
(187),
(188),
(189),
(190),
(191),
(192),
(193),
(194),
(195),
(196),
(197),
(198),
(199),
(200),
(201),
(202),
(203),
(204),
(205),
(206),
(207),
(208),
(209),
(210),
(211),
(212),
(213),
(214),
(215),
(216),
(217),
(218),
(219),
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
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(155),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172),
(173),
(174),
(175),
(176),
(177),
(178),
(179),
(180),
(181),
(182),
(183),
(184),
(185),
(186),
(187),
(188),
(189),
(190),
(191),
(192),
(193),
(194),
(195),
(196),
(197),
(198),
(199),
(200),
(201),
(202),
(203),
(204),
(205),
(206),
(207),
(208),
(209),
(210),
(211),
(212),
(213),
(214),
(215),
(216),
(217),
(218),
(219);

-- --------------------------------------------------------

--
-- Table structure for table `tolak_wo`
--

CREATE TABLE IF NOT EXISTS `tolak_wo` (
  `id_tolak_wo` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(20) NOT NULL,
  `id_sto` varchar(20) NOT NULL,
  `id_wo` varchar(30) NOT NULL,
  `id_team` int(10) NOT NULL,
  `alasan` varchar(200) NOT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tolak_wo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `woassignment`
--

CREATE TABLE IF NOT EXISTS `woassignment` (
  `id_woassignment` int(10) NOT NULL AUTO_INCREMENT,
  `id_wo` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `id_team` int(10) NOT NULL,
  `jam_janji` datetime NOT NULL,
  `createdby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_woassignment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `woinstalasi`
--

CREATE TABLE IF NOT EXISTS `woinstalasi` (
  `id_woinstalasi` varchar(30) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `id_sto` varchar(20) NOT NULL,
  `id_team` int(10) DEFAULT NULL,
  `id_area` int(10) NOT NULL,
  `waktu_instalasi` varchar(10) DEFAULT NULL,
  `tgl_instalasi` datetime DEFAULT NULL,
  `status_instalasi` varchar(20) DEFAULT NULL,
  `foto_depan_rumah` varchar(100) DEFAULT NULL,
  `foto_jaringan` varchar(100) DEFAULT NULL,
  `foto_roset` varchar(100) DEFAULT NULL,
  `foto_bobokan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `createby` varchar(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_woinstalasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `woinstalasi`
--

INSERT INTO `woinstalasi` (`id_woinstalasi`, `id_pelanggan`, `id_sto`, `id_team`, `id_area`, `waktu_instalasi`, `tgl_instalasi`, `status_instalasi`, `foto_depan_rumah`, `foto_jaringan`, `foto_roset`, `foto_bobokan`, `keterangan`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
('1-TLK.GGK.01.07-1473', '147394', 'TLK.GGK.01.07', 1, 0, '53', '2013-06-06 23:31:56', 'selesai', '/mnt/sdcard/proyek tito/depanrumah1-TLK.GGK.01.07-1473.jpg', '/mnt/sdcard/proyek tito/jaringan1-TLK.GGK.01.07-1473.jpg', '/mnt/sdcard/proyek tito/roset1-TLK.GGK.01.07-1473.jpg', '/mnt/sdcard/proyek tito/bobokan1-TLK.GGK.01.07-1473.jpg', '', '', '2013-06-03 08:34:23', NULL, NULL, 1),
('1-TLK.GGK.01.07-1498', '149812', 'TLK.GGK.01.07', 1, 0, '59', '2013-06-06 23:39:09', 'selesai', 'null', '/mnt/sdcard/proyek tito/jaringan1-TLK.GGK.01.07-1498.jpg', '/mnt/sdcard/proyek tito/roset1-TLK.GGK.01.07-1498.jpg', '/mnt/sdcard/proyek tito/bobokan1-TLK.GGK.01.07-1498.jpg', '', '5', '2013-06-03 08:34:32', NULL, NULL, 1),
('1-TLK.GGK.01.07-1519', '151951', 'TLK.GGK.01.07', 1, 0, NULL, NULL, 'mulai', NULL, NULL, NULL, NULL, NULL, '', '2013-06-03 08:34:42', NULL, NULL, 1),
('1-TLK.GGK.01.07-645738', '645738', 'TLK.GGK.01.07', 1, 0, '78', '2013-06-06 23:18:52', 'mulai', '/mnt/sdcard/proyek tito/depanrumah1-TLK.GGK.01.07-645738.jpg', '/mnt/sdcard/proyek tito/jaringan1-TLK.GGK.01.07-645738.jpg', '/mnt/sdcard/proyek tito/roset1-TLK.GGK.01.07-645738.jpg', '/mnt/sdcard/proyek tito/bobokan1-TLK.GGK.01.07-645738.jpg', '', '5', '2013-06-03 10:11:37', 5, '2013-06-03 11:31:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `womigrasi`
--

CREATE TABLE IF NOT EXISTS `womigrasi` (
  `id_womigrasi` varchar(30) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `id_sto` varchar(20) NOT NULL,
  `id_team` int(10) DEFAULT NULL,
  `id_area` int(10) DEFAULT NULL,
  `waktu_migrasi` varchar(10) DEFAULT NULL,
  `tgl_migrasi` date DEFAULT NULL,
  `status_migrasi` varchar(20) DEFAULT NULL,
  `foto_depan_rumah` varchar(100) DEFAULT NULL,
  `foto_samping_rumah` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(10) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_womigrasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `womigrasi`
--

INSERT INTO `womigrasi` (`id_womigrasi`, `id_pelanggan`, `id_sto`, `id_team`, `id_area`, `waktu_migrasi`, `tgl_migrasi`, `status_migrasi`, `foto_depan_rumah`, `foto_samping_rumah`, `keterangan`, `createby`, `createdate`, `updateby`, `updatedate`, `isactive`) VALUES
('2-TLK.GGK.01.07-645738', '645738', 'TLK.GGK.01.07', NULL, NULL, NULL, NULL, 'belum', NULL, NULL, NULL, 1, '2013-06-06 23:18:52', NULL, NULL, 1),
('2-TLK.GGK.01.07-1473', '147394', 'TLK.GGK.01.07', NULL, NULL, NULL, NULL, 'belum', NULL, NULL, NULL, 1, '2013-06-06 23:31:56', NULL, NULL, 1),
('2-TLK.GGK.01.07-1498', '149812', 'TLK.GGK.01.07', NULL, NULL, NULL, NULL, 'belum', NULL, NULL, NULL, 1, '2013-06-06 23:39:09', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `woreject`
--

CREATE TABLE IF NOT EXISTS `woreject` (
  `id_woreject` int(10) NOT NULL AUTO_INCREMENT,
  `id_sto` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `penerima` varchar(200) DEFAULT NULL,
  `createby` int(10) NOT NULL,
  `createdate` datetime NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_woreject`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `woreject`
--

INSERT INTO `woreject` (`id_woreject`, `id_sto`, `id_pelanggan`, `keterangan`, `penerima`, `createby`, `createdate`, `isactive`) VALUES
(1, 'TLK.GGK.01.07', '147394', '', '', 0, '2013-06-03 08:34:23', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
