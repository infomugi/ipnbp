-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 06:26 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_pnbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id_activities` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `description` text NOT NULL,
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id_activities`, `created_date`, `type`, `description`, `activity_id`, `user_id`, `point`, `status`) VALUES
(1, '2016-09-30 16:58:51', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(2, '2016-10-01 19:01:35', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(3, '2016-10-01 21:14:35', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(4, '2016-10-01 21:14:48', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(5, '2016-10-02 18:06:24', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(6, '2016-10-02 18:29:39', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(7, '2016-10-02 18:29:52', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(8, '2016-10-02 18:31:06', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(9, '2016-10-02 19:56:08', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(10, '2016-10-03 00:56:43', 8, 'Update profile ius', 1, 1, 2, 7),
(11, '2016-10-03 00:57:26', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(12, '2016-10-03 00:59:12', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(13, '2016-10-03 09:04:35', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(14, '2016-10-03 10:04:17', 1, 'Login from IP : 192.168.1.21', 1, 1, 2, 1),
(15, '2016-10-03 10:28:17', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(16, '2016-10-03 12:08:58', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(17, '2016-10-03 19:59:52', 1, 'Login from IP : 120.188.67.2', 1, 1, 2, 1),
(18, '2016-10-03 20:40:26', 1, 'Login from IP : 112.215.171.29', 1, 1, 2, 1),
(19, '2016-10-03 22:43:13', 1, 'Login from IP : 120.188.35.231', 1, 1, 2, 1),
(20, '2016-10-04 16:31:08', 1, 'Login from IP : 112.215.151.160', 1, 1, 2, 1),
(21, '2016-10-06 10:53:07', 1, 'Login from IP : 60.253.115.214', 1, 1, 2, 1),
(22, '2016-10-07 13:16:29', 1, 'Login from IP : 180.253.252.180', 1, 1, 2, 1),
(23, '2016-10-08 18:21:42', 1, 'Login from IP : 120.188.65.193', 1, 1, 2, 1),
(24, '2016-10-08 18:22:40', 0, 'Logout from IP : 120.188.65.193', 0, 1, 0, 0),
(25, '2016-10-09 00:10:21', 1, 'Login from IP : 120.188.65.193', 1, 1, 2, 1),
(26, '2016-10-19 12:54:32', 1, 'Login from IP : 36.72.194.47', 1, 1, 2, 1),
(27, '2016-11-13 12:33:25', 1, 'Login from IP : 112.215.65.189', 1, 1, 2, 1),
(28, '2016-11-13 12:39:15', 0, 'Logout from IP : 112.215.65.189', 0, 1, 0, 0),
(29, '2017-02-28 14:45:34', 1, 'Login from IP : 125.163.61.102', 1, 1, 2, 1),
(30, '2017-02-28 14:54:01', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(31, '2017-03-02 09:05:20', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(32, '2017-08-09 11:25:23', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(33, '2017-08-09 11:35:10', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(34, '2017-08-09 14:54:23', 8, 'Update profile infomugi', 1, 1, 2, 7),
(35, '2017-08-09 15:39:25', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(36, '2017-08-09 15:39:30', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(37, '2017-08-10 09:48:23', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(38, '2017-08-10 15:38:20', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(39, '2017-08-10 15:38:32', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(40, '2017-08-10 16:55:18', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(41, '2017-08-10 17:02:02', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(42, '2017-08-11 09:41:48', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(43, '2017-08-11 19:45:30', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(44, '2017-08-12 09:00:45', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(45, '2017-08-12 09:01:13', 0, 'Logout from IP : 192.168.43.164', 0, 1, 0, 0),
(46, '2017-08-12 09:01:19', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(47, '2017-08-12 09:05:17', 5, 'Add account admin', 79, 79, 50, 6),
(48, '2017-08-12 09:06:45', 0, 'Logout from IP : 192.168.43.164', 0, 1, 0, 0),
(49, '2017-08-12 09:06:49', 1, 'Login from IP : 192.168.43.164', 1, 79, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`, `icon`, `status`, `id_user`, `type`) VALUES
(1, 'ASP', 'Aspal', 'fa fa-html5', 1, 1, 1),
(2, 'BTN', 'Beton', 'fa fa-css3', 1, 1, 1),
(3, 'LPS-PDSI', 'Lapis Pondasi', 'fa fa-google', 1, 1, 1),
(21, 'TNH', 'Tanah', 'fa fa-home', 1, 0, 1),
(22, 'AGR', 'Agregat', 'fa fa-home', 1, 0, 1),
(23, 'LAP', 'Lapangan', 'fa fa-home', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id_company` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `company_code` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `faximile` varchar(25) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `classification` varchar(15) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `created_date`, `update_date`, `company_code`, `name`, `owner`, `address`, `email`, `phone`, `faximile`, `postal_code`, `type`, `place`, `classification`, `province`, `city`, `category_id`, `status`) VALUES
(1, '2017-08-12 09:26:28', '2017-08-12 09:41:05', 'P-001', 'PT. Indo Everest', 'Xian Liong', 'Jl. Surabaya No.456', 'indo@everest.com', '087954681446', '02245748784', 409154, 4, 1, '4', 'Jawa Barat', 'Bandung', 233, 1),
(2, '2017-08-12 09:26:28', '2017-08-12 09:41:05', 'P-003', 'PT. Metalurgi Pratama', 'Agus Suyoko', 'Jl. Aceh No.11', 'info@metalurgi.com', '087954681446', '02245748784', 409154, 4, 1, '4', 'Jawa Barat', 'Karawang', 233, 1),
(3, '2017-08-12 09:26:28', '2017-08-12 09:41:05', 'P-004', 'PT. Sudong Metal', 'Rendi Pratama', 'Jl. Jakarta No.1', 'info@sudong.com', '087954681446', '02245748784', 409154, 4, 1, '4', 'Jawa Barat', 'Bekasi', 233, 1);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `id_division` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_division`, `name`, `description`, `status`, `type`) VALUES
(1, 'Balai Litbang Perkerasan Jalan', 'Balai Litbang Perkerasan Jalan', 1, 1),
(2, 'Balai Litbang Sistem dan Teknik ', 'Balai Litbang Sistem dan Teknik Lalu Lintas', 1, 1),
(3, 'Balai Litbang Struktur Jalan', 'Balai Litbang Struktur Jalan', 1, 1),
(4, 'Balai Litbang Geoteknik Jalan', 'Balai Litbang Geoteknik Jalan', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `created_date`, `update_date`, `question`, `answer`, `category_id`) VALUES
(1, '2016-10-02 11:31:39', '2016-10-02 11:31:39', 'Questions REAAA #1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 1),
(2, '2016-10-02 11:32:10', '2016-10-02 11:32:10', 'Questions REAAA #2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 1),
(3, '2016-10-02 11:32:36', '2016-10-02 11:32:36', 'Questions REAAA #3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `id_industry` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=465 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id_industry`, `name`, `description`, `status`) VALUES
(1, 'S000001', 'Ayam Buras', 1),
(2, 'S000002', 'Industri Bibit, Media dan Jamur', 1),
(3, 'S000003', 'Industri Pakaian Jadi', 1),
(4, 'S000004', 'Jasa Catering & Jasa Tenaga Kerja', 1),
(5, 'S000005', 'Industri Pembuatan Gitar', 1),
(6, 'S000006', 'Industri Pemintalan Benang & Perajukan Kain', 1),
(7, 'S000007', 'Penyedia Jasa Tenaga Kerja', 1),
(8, 'S000008', 'Industri Textile', 1),
(9, 'S000009', 'Sarung Tangan Golf', 1),
(10, 'S000010', 'Textile', 1),
(11, 'S000011', 'Perdagangan Jasa Pengepakan Sayuran', 1),
(12, 'S000012', 'Industri Cat', 1),
(13, 'S000013', 'Industri Garment', 1),
(14, 'S000014', 'Perdagangan Kimia', 1),
(15, 'S000015', 'Karet', 1),
(16, 'S000016', 'Sarung Tangan', 1),
(17, 'S000017', 'Industri Makanan', 1),
(18, 'S000018', 'Pernekel', 1),
(19, 'S000019', 'Industri Sport Garment', 1),
(20, 'S000020', 'Developer', 1),
(21, 'S000021', 'Konfeksi', 1),
(22, 'S000022', 'Jas Pelayanan Kesehatan', 1),
(23, 'S000023', 'Gudang Penyortiran Teh', 1),
(24, 'S000024', 'Industri Makanan Roti', 1),
(25, 'S000025', 'Industri  Kaleng', 1),
(26, 'S000026', 'Industri  Mebel', 1),
(27, 'S000027', 'Perdagangan Umum dan Jasa Konsultasi Bisnis / manajement', 1),
(28, 'S000028', 'Industri Pakaian Jadi dari Textile ( Garment)', 1),
(29, 'S000029', 'Perajutan', 1),
(30, 'S000030', 'Industri Kimia', 1),
(31, 'S000031', 'Produksi Tas', 1),
(32, 'S000032', 'Industri Saus / Sambal', 1),
(33, 'S000033', 'Industri  Kecap', 1),
(34, 'S000034', 'Pupuk Organik', 1),
(35, 'S000035', 'Industri Textile Pertenunan', 1),
(36, 'S000036', 'Industri Knitting & Garment', 1),
(37, 'S000037', 'Ritail', 1),
(38, 'S000038', 'Industri Textile/ Tenun', 1),
(39, 'S000039', 'Industri Textile ( Grey )', 1),
(40, 'S000040', 'Pencelupan Benang Tekstil', 1),
(41, 'S000041', 'Perdagangan Umum dan Jasa', 1),
(42, 'S000042', 'Jasa Perbankan', 1),
(43, 'S000043', 'Industri Sepatu ', 1),
(44, 'S000044', 'Textile/ Pemintalan', 1),
(45, 'S000045', 'Industri  Textile', 1),
(46, 'S000046', 'Produksi Kerupuk', 1),
(47, 'S000047', 'Perdagangan/ Swalayan', 1),
(48, 'S000048', 'Industri Alat Kesehatan', 1),
(49, 'S000049', 'Perusahan Penyedia Jasa Tenaga Kerja (Cleaning Service, Satpam, Supir)', 1),
(50, 'S000050', 'Industri  Kertas Bungkus', 1),
(51, 'S000051', 'Jasa Loundry', 1),
(52, 'S000052', 'Distribusi Makanan', 1),
(53, 'S000053', 'Pom Bensin / SPBU', 1),
(54, 'S000054', 'Textile / Pemintalan', 1),
(55, 'S000055', 'Industri Pemintalan Benang', 1),
(56, 'S000056', 'Pemintalan Benang / Textile', 1),
(57, 'S000057', 'Industri Pupuk Organik', 1),
(58, 'S000058', 'Bengkel Dinamo', 1),
(59, 'S000059', 'Redimix Beton Curah', 1),
(60, 'S000060', 'Perbankan', 1),
(61, 'S000061', 'Ready Mix', 1),
(62, 'S000062', 'Elektronik & karton', 1),
(63, 'S000063', 'Perdagangan Barang dan Jasa', 1),
(64, 'S000064', 'Jasa', 1),
(65, 'S000065', 'Industri Plastic Injection', 1),
(66, 'S000066', 'Industri Kertas -Roll kain', 1),
(67, 'S000067', 'Industri Kertas', 1),
(68, 'S000068', 'Industri Sarung Tangan / Garment', 1),
(69, 'S000069', 'Furniture', 1),
(70, 'S000070', 'Service Tabung LPG Pertamina', 1),
(71, 'S000071', 'Penyedia Jasa Tenaga Kerja ', 1),
(72, 'S000072', 'Industri Mesin Perkakas Mesin untuk Pengerjaan Logam', 1),
(73, 'S000073', 'Penyedia Jasa Tenaga Kerja Keamanan ( Security )', 1),
(74, 'S000074', 'Jasa  Pengamanan', 1),
(75, 'S000075', 'Jasa Pengadaan Barang & Jasa', 1),
(76, 'S000076', 'Bengkel Bubut', 1),
(77, 'S000077', 'Industri Manufacture & Trading ( Furniture )', 1),
(78, 'S000078', 'Industri Kusen & Pintu Kayu', 1),
(79, 'S000079', 'Penyedia Jasa Tenaga Kerja / Outsourcing', 1),
(80, 'S000080', 'Retail', 1),
(81, 'S000081', 'Jasa Angkutan', 1),
(82, 'S000082', 'Industri Sepatu', 1),
(83, 'S000083', 'Joint Venture', 1),
(84, 'S000084', 'SPBU / Penyalur  BBM', 1),
(85, 'S000085', 'Trading ', 1),
(86, 'S000086', 'Statsion Pengisian & Pengangkutan BULK LPG ( SPPBE ) ', 1),
(87, 'S000087', 'Karung Plastik ', 1),
(88, 'S000088', 'Industri  Snack Food Industry', 1),
(89, 'S000089', 'Produksi Kaolin/ Penggilingan Batu Zeolit', 1),
(90, 'S000090', 'Industri Karton Box', 1),
(91, 'S000091', 'Printing ( Percetakan)', 1),
(92, 'S000092', 'Industri Plastik', 1),
(93, 'S000093', 'Retester LPG Ukuran 3 Kg Pertamina', 1),
(94, 'S000094', 'Pengadaan Barang dan Jasa', 1),
(95, 'S000095', 'Pengolahan Air Minum', 1),
(96, 'S000096', 'Perdagangan Umum & Jasa ', 1),
(97, 'S000097', 'Restoran', 1),
(98, 'S000098', 'Industri Karung Goni', 1),
(99, 'S000099', 'Kotak Perhiasan', 1),
(100, 'S000100', 'Pengolahan Benang    ( Twisting)', 1),
(101, 'S000101', 'Pom Bensin', 1),
(102, 'S000102', 'Industri Pemintalan', 1),
(103, 'S000103', 'Industri  Fine Chemicals', 1),
(104, 'S000104', 'Industri Perajutan', 1),
(105, 'S000105', 'Penggemukan Sapi Potong', 1),
(106, 'S000106', 'Industri / Produksi Sepatu', 1),
(107, 'S000107', 'Industri Plastik Compoand', 1),
(108, 'S000108', 'Industri Textile ', 1),
(109, 'S000109', 'Galian C', 1),
(110, 'S000110', 'Kofeksi', 1),
(111, 'S000111', 'Manufacture', 1),
(112, 'S000112', 'Pengolahan Kayu', 1),
(113, 'S000113', 'Industri Textile ( Spinning )', 1),
(114, 'S000114', 'Permadani', 1),
(115, 'S000115', 'Kontraktor', 1),
(116, 'S000116', 'Distributor / Gudang Kaca', 1),
(117, 'S000117', 'Rumah Sakit', 1),
(118, 'S000118', 'Mainan Plastik', 1),
(119, 'S000119', 'Perbanka Syariah', 1),
(120, 'S000120', 'Supermarket / Pedagangan', 1),
(121, 'S000121', 'Industri Sparepart Karet', 1),
(122, 'S000122', 'Penyedia Jasa/ Outsoursing', 1),
(123, 'S000123', 'Jasa Transportasi', 1),
(124, 'S000124', 'Industri Rol Karet', 1),
(125, 'S000125', 'Industri Makanan Olahan', 1),
(126, 'S000126', 'Consultan Outsourcing', 1),
(127, 'S000127', 'Distribusi ', 1),
(128, 'S000128', 'Industri Karet', 1),
(129, 'S000129', 'Jasa Jalan Tol  Marga', 1),
(130, 'S000130', 'Fumigasi / Press Control )', 1),
(131, 'S000131', 'Jasa Transportasi Peti Kemas', 1),
(132, 'S000132', 'Hotel', 1),
(133, 'S000133', 'Perdagangan & Jasa', 1),
(134, 'S000134', 'Rumah Makan', 1),
(135, 'S000135', 'Gudang Kecap & Saos', 1),
(136, 'S000136', 'Perdagangan Grosir', 1),
(137, 'S000137', 'Industri Garment / Pakaian Jadi', 1),
(138, 'S000138', 'Minuman', 1),
(139, 'S000139', 'Restourant', 1),
(140, 'S000140', 'Service Apartement', 1),
(141, 'S000141', 'Jasa dan Kontraktor', 1),
(142, 'S000142', 'Perhotelan', 1),
(143, 'S000143', 'Jasa Konsultasi Teknik  Perkeretaapian', 1),
(144, 'S000144', 'Perdagangan Jasa', 1),
(145, 'S000145', 'Perdagangan Kayu', 1),
(146, 'S000146', 'Hotel & Restoran', 1),
(147, 'S000147', 'Industri Sparepart', 1),
(148, 'S000148', 'Hotel & Restoran/ pariwisata', 1),
(149, 'S000149', 'Koperasi', 1),
(150, 'S000150', 'Perkebunan Teh ', 1),
(151, 'S000151', 'Perkebunan Teh', 1),
(152, 'S000152', 'Koperasi Susu', 1),
(153, 'S000153', 'Koperasi ', 1),
(154, 'S000154', 'Produksi Es / Makanan / Minuman', 1),
(155, 'S000155', 'Industri Spinning', 1),
(156, 'S000156', 'Industri Textile ( Pertenunan)', 1),
(157, 'S000157', 'Gudang Chemical', 1),
(158, 'S000158', 'Bengkel', 1),
(159, 'S000159', 'Produksi Pakaian Jadi', 1),
(160, 'S000160', 'Bank Perkreditan', 1),
(161, 'S000161', 'Cat Tembok', 1),
(162, 'S000162', 'Industri Farmasi', 1),
(163, 'S000163', 'Industri Makanan / Coklat', 1),
(164, 'S000164', 'Gudang  kain', 1),
(165, 'S000165', 'Jasa Keamanan', 1),
(166, 'S000166', 'Penyempurnaan Kain', 1),
(167, 'S000167', 'Distributor Makanan/Minuman', 1),
(168, 'S000168', 'Pengolahan Kapas', 1),
(169, 'S000169', 'Industri  Garment', 1),
(170, 'S000170', 'Industri Manufacture', 1),
(171, 'S000171', 'Industri Kerangka Beton', 1),
(172, 'S000172', 'Industri Elektronik', 1),
(173, 'S000173', 'Garment', 1),
(174, 'S000174', 'Sweater', 1),
(175, 'S000175', 'Benang Jahit', 1),
(176, 'S000176', 'Industri Sol', 1),
(177, 'S000177', 'Produksi Kompor Gas', 1),
(178, 'S000178', 'Makanan ', 1),
(179, 'S000179', 'Pertenunan/ Textile ', 1),
(180, 'S000180', 'Loundry', 1),
(181, 'S000181', 'Pengolahan Logam', 1),
(182, 'S000182', 'Jasa / Barang', 1),
(183, 'S000183', 'Industri Textile dan Produk Textile', 1),
(184, 'S000184', 'Industri Percetakan', 1),
(185, 'S000185', 'Industri Perhiasan', 1),
(186, 'S000186', 'Perdagangan Perhiasan', 1),
(187, 'S000187', 'Penyempurnaan Textile', 1),
(188, 'S000188', 'Makloon Perhiasan', 1),
(189, 'S000189', 'Garment Export', 1),
(190, 'S000190', 'Pertenunan', 1),
(191, 'S000191', 'Industri  kain Buludru', 1),
(192, 'S000192', 'Perdagangan Hasil Industri Tekstile', 1),
(193, 'S000193', 'Industri Cocoa', 1),
(194, 'S000194', 'Penjualan Tenun Mesin ( Perdagangan Import Mesin, Suku Cadang & Perlengkapan )', 1),
(195, 'S000195', 'Perdagangan', 1),
(196, 'S000196', 'Industri Textile & Sepatu', 1),
(197, 'S000197', 'Makloon Baju Jadi', 1),
(198, 'S000198', 'Industri Sparepart/Otomotif', 1),
(199, 'S000199', 'Tabung LPG', 1),
(200, 'S000200', 'Textile ', 1),
(201, 'S000201', 'Industri LaminasiPanel Kayu', 1),
(202, 'S000202', 'Perusahaan Penyedia Tenaga Kerja ( outsourshing)', 1),
(203, 'S000203', 'Distributor Obat Kain/ Kimia', 1),
(204, 'S000204', 'Sol Sepatu', 1),
(205, 'S000205', 'Industri Sablon', 1),
(206, 'S000206', 'Sablon/ Print', 1),
(207, 'S000207', 'Mesin Perajutan', 1),
(208, 'S000208', 'Industri Makanan/Roti', 1),
(209, 'S000209', 'Produksi Sol', 1),
(210, 'S000210', 'Industri   Garment ', 1),
(211, 'S000211', 'Dagang/Pasar Swalayan', 1),
(212, 'S000212', 'Industri Kantong Kresek', 1),
(213, 'S000213', 'Trading Kimia', 1),
(214, 'S000214', 'Industri Busa', 1),
(215, 'S000215', 'Industri Barang Jadi Tekstil Untuk Keperluan Rumah Tangga', 1),
(216, 'S000216', 'Industri Logam', 1),
(217, 'S000217', 'Distribusi', 1),
(218, 'S000218', 'Industri Tas fashion', 1),
(219, 'S000219', 'Jasa Washing Garment', 1),
(220, 'S000220', 'Industri Pengolahan lainnya/busa', 1),
(221, 'S000221', 'Produksi Sol Sepatu dari Bahan TPR', 1),
(222, 'S000222', 'Industri Peleburan Logam', 1),
(223, 'S000223', 'Industri Garment Sweater', 1),
(224, 'S000224', 'Manufacturing', 1),
(225, 'S000225', 'Textile Embroidery', 1),
(226, 'S000226', 'Perajutan / Industri Textile', 1),
(227, 'S000227', 'Penyempurnaan Kain /Textile', 1),
(228, 'S000228', 'Percetakan & Penerbitan', 1),
(229, 'S000229', 'Industri  Sablon', 1),
(230, 'S000230', 'Perakitan  Sepatu', 1),
(231, 'S000231', 'Pemintalan & Penyempurnaan Benang', 1),
(232, 'S000232', 'Distributor', 1),
(233, 'S000233', 'Industri Spareparts Mesin Pendingin', 1),
(234, 'S000234', 'Industri Kemasan dari Kertas', 1),
(235, 'S000235', 'Dyestuff, Chemical & Modified Starch', 1),
(236, 'S000236', 'Konfeksi Pakaian Bayi', 1),
(237, 'S000237', 'Industri Plastik ', 1),
(238, 'S000238', 'Percetakan', 1),
(239, 'S000239', 'Supplier Kimia', 1),
(240, 'S000240', 'Industri Aksesories Textile', 1),
(241, 'S000241', 'Industri Pakaian jadi/ Garment', 1),
(242, 'S000242', 'Rajut', 1),
(243, 'S000243', 'Bengkel Las', 1),
(244, 'S000244', 'Industri  Perajutan', 1),
(245, 'S000245', 'Industri Textile Non Woven/Padding', 1),
(246, 'S000246', 'Penerbitan & Percetakan', 1),
(247, 'S000247', 'Industri  Barang Jadi Tekstil Selain Pakaian Jadi', 1),
(248, 'S000248', 'Industri Sepatu Olah Raga', 1),
(249, 'S000249', 'Industri Karung Plastik', 1),
(250, 'S000250', 'Industri label', 1),
(251, 'S000251', 'Perakitan', 1),
(252, 'S000252', 'Industri Bed Sheet & Bed Cover', 1),
(253, 'S000253', 'Industri Textile / Kain Rajut', 1),
(254, 'S000254', 'Distributor Petsida & Pupuk', 1),
(255, 'S000255', 'Industri  Palstik', 1),
(256, 'S000256', 'Industry Plastic Sheet', 1),
(257, 'S000257', 'Garasi Mobil/ Jasa Angkutan ', 1),
(258, 'S000258', 'Industri Regulator Elpiji', 1),
(259, 'S000259', 'Industri  Pakaian Jadi / Garment', 1),
(260, 'S000260', 'Pengisian LPG', 1),
(261, 'S000261', 'Industri Penyempurnaan Kain', 1),
(262, 'S000262', 'Industri Produksi Tas', 1),
(263, 'S000263', 'Industri Sepatu Kulit  ', 1),
(264, 'S000264', 'Kontraktor & Supplier Loose & Fix Furniture', 1),
(265, 'S000265', 'Penyamak Kulit', 1),
(266, 'S000266', 'Textile Embriodery', 1),
(267, 'S000267', 'Bak Mandi', 1),
(268, 'S000268', 'Industri Makanan Ringan', 1),
(269, 'S000269', 'Industri Pencelupan', 1),
(270, 'S000270', 'Jasa Pelayanan Teknik Kelistrikan', 1),
(271, 'S000271', 'Industri Textile  /Pertenunan', 1),
(272, 'S000272', 'Industri Pencelupan & Pertenunan', 1),
(273, 'S000273', 'Pembangkit Tenaga Listrik', 1),
(274, 'S000274', 'Industri Barang/ Jasa/ Perdagangan', 1),
(275, 'S000275', 'Textile/Pertenunan', 1),
(276, 'S000276', 'Textile ( Bording)', 1),
(277, 'S000277', 'Industri Pencelupan Kain', 1),
(278, 'S000278', 'Pemintalan / Spinning Mills', 1),
(279, 'S000279', 'Pertenunan Textile', 1),
(280, 'S000280', 'Tenun Sarung', 1),
(281, 'S000281', 'Tekstil (Industri) kain rajut ', 1),
(282, 'S000282', 'Industri Textile Handuk', 1),
(283, 'S000283', 'Industri Kaleng', 1),
(284, 'S000284', 'Industri Makanan/Bakery', 1),
(285, 'S000285', 'Industri Pertenunan Textile', 1),
(286, 'S000286', 'Gulung Benang', 1),
(287, 'S000287', 'Plastik', 1),
(288, 'S000288', 'Industri Textile/ Pertenunan', 1),
(289, 'S000289', 'Rajut ( Knitting)', 1),
(290, 'S000290', 'Industi Textile', 1),
(291, 'S000291', 'Tenun & Kanji', 1),
(292, 'S000292', 'Pertenunan ', 1),
(293, 'S000293', 'Textile/ Pertenunan', 1),
(294, 'S000294', 'Pertenunan ( Lap Piring )', 1),
(295, 'S000295', 'Pertenunan/ Handuk', 1),
(296, 'S000296', 'Industrik Textile /Pertenunan', 1),
(297, 'S000297', 'Textile /Pertenunan', 1),
(298, 'S000298', 'Industri Tenun', 1),
(299, 'S000299', 'Industri Textile /Pertenunan', 1),
(300, 'S000300', 'Pembuatan Tahu ( Makanan )', 1),
(301, 'S000301', 'Pertenunan (Textile)', 1),
(302, 'S000302', 'Industri Karpet', 1),
(303, 'S000303', 'Industri Textile Chemical', 1),
(304, 'S000304', 'Industri Textile ( Sizing)', 1),
(305, 'S000305', 'Manufactur', 1),
(306, 'S000306', 'Industri Penyempurnaan Benang', 1),
(307, 'S000307', 'Industri Textile / Pemintalan', 1),
(308, 'S000308', 'Penyalur BBM', 1),
(309, 'S000309', 'Perdagangan & Industri', 1),
(310, 'S000310', 'Industri Pakaian Jadi  Rajutan', 1),
(311, 'S000311', 'Makloon Grey', 1),
(312, 'S000312', 'Industri  Pertenunan (Textile)', 1),
(313, 'S000313', 'Perdagangan Bahan Bakar Minyak ( BBM)', 1),
(314, 'S000314', 'Industri Pemintalan Benang/Spinning Mils', 1),
(315, 'S000315', 'Industri Plastik ( Bobbin & benang Plastik)', 1),
(316, 'S000316', 'Industri Textile (Kain Grey )', 1),
(317, 'S000317', 'Industri Benang Textile', 1),
(318, 'S000318', 'Industri Textile & garment', 1),
(319, 'S000319', 'Industri Textile ( Kain Grey) ', 1),
(320, 'S000320', 'Industri Textile (Pemintalan Benang)', 1),
(321, 'S000321', 'Industri Textile (Rajut )', 1),
(322, 'S000322', 'Industri Textile (Grey)', 1),
(323, 'S000323', 'Industri Terxtile', 1),
(324, 'S000324', 'Industri Terxtile/ Pertenunan ', 1),
(325, 'S000325', 'Textile ( Kain Grey )', 1),
(326, 'S000326', 'Industri Paper Cones & Paper Tube', 1),
(327, 'S000327', 'Perdagangan Eceran BBM/ Pengisian BBM', 1),
(328, 'S000328', 'Industri Pertenunan', 1),
(329, 'S000329', 'IndustriTextile Pemintalan ', 1),
(330, 'S000330', 'Textile ( Pertenunan)', 1),
(331, 'S000331', 'Industri Textile ( Handuk )', 1),
(332, 'S000332', 'Industri Kamoceng', 1),
(333, 'S000333', 'Industri Pembuatan Bobbin dan Barang dari Plastik', 1),
(334, 'S000334', 'Industri Textile (Weaving)', 1),
(335, 'S000335', 'Ekspedisi', 1),
(336, 'S000336', 'Industri Perdagangan Garment', 1),
(337, 'S000337', 'Industri Sarung Tangan Golf', 1),
(338, 'S000338', 'Industri Tas Golf', 1),
(339, 'S000339', 'Distributor Alat Kesehatan', 1),
(340, 'S000340', 'Industri Alas Kaki/Sepatu', 1),
(341, 'S000341', 'Industri barang-barang plastik', 1),
(342, 'S000342', 'Konfeksi/Rajut', 1),
(343, 'S000343', 'Industri  Tas', 1),
(344, 'S000344', 'Trading & Garment', 1),
(345, 'S000345', 'Perdagangan Khususnya Battery', 1),
(346, 'S000346', 'Pembiayaan Konsumen', 1),
(347, 'S000347', 'Industri Garment  ', 1),
(348, 'S000348', 'Industri Textil', 1),
(349, 'S000349', 'Perusahaan Penyedia Jasa  Out  Sourching', 1),
(350, 'S000350', 'Perusahaan Penyedia Jasa Tenaga Kerja', 1),
(351, 'S000351', 'Perakitan Sepeda', 1),
(352, 'S000352', 'Jasa dan Perdagangan', 1),
(353, 'S000353', 'Real Estate', 1),
(354, 'S000354', 'Industri Makanan ( Saos Sambel )', 1),
(355, 'S000355', 'Supermarket', 1),
(356, 'S000356', 'Padang Golf ,Jasa Hiburan & Rekreasi', 1),
(357, 'S000357', 'Industri Karet / Sparepart', 1),
(358, 'S000358', 'Industri Maklon', 1),
(359, 'S000359', 'Chemical', 1),
(360, 'S000360', 'Industri Retail', 1),
(361, 'S000361', 'Gudang Kain', 1),
(362, 'S000362', 'Jasa Perdagangan Legulator', 1),
(363, 'S000363', 'Showroom Mobil', 1),
(364, 'S000364', 'Perdagangan Jasa ( Konsultan)', 1),
(365, 'S000365', 'Garment Washing', 1),
(366, 'S000366', 'Perusahaan Penyedia Tenaga Kerja Pengamanan & Cleaning Service', 1),
(367, 'S000367', 'Industri Kasur  Busa', 1),
(368, 'S000368', 'Penjualan Keramik', 1),
(369, 'S000369', 'Industri  Sepatu', 1),
(370, 'S000370', 'Service/Rekreasi Ampli', 1),
(371, 'S000371', 'Pengecer bahan Bakar Umum', 1),
(372, 'S000372', 'Industri Brang dari Kulit & Imitasi', 1),
(373, 'S000373', 'Industri Sol Sepatu', 1),
(374, 'S000374', 'Industri Alat Kebersihan Berupa Keset', 1),
(375, 'S000375', 'Industri Tas', 1),
(376, 'S000376', 'Konpeksi', 1),
(377, 'S000377', 'Distributor Kimia', 1),
(378, 'S000378', 'Gudang / Distribusi Tas', 1),
(379, 'S000379', 'Galian C / Aspal Hotmik', 1),
(380, 'S000380', 'Interior Furniture/ Mebel', 1),
(381, 'S000381', 'Daur ulang plastic', 1),
(382, 'S000382', 'Jasa Tekuk Potong', 1),
(383, 'S000383', 'Produksi Plastik', 1),
(384, 'S000384', 'Distribusi Bahan Bagunan', 1),
(385, 'S000385', 'Industri Alat Musik ', 1),
(386, 'S000386', 'Penyedia Jasa Keamanan', 1),
(387, 'S000387', 'Potong Ayam', 1),
(388, 'S000388', 'Industri Rajut', 1),
(389, 'S000389', 'Industri kain Rajut & pakaian Jadi', 1),
(390, 'S000390', 'Industri Garment Loundry', 1),
(391, 'S000391', 'Industri  Busa  Kasur', 1),
(392, 'S000392', 'Industrri Karung Plastik ', 1),
(393, 'S000393', 'Industri Kimia Dasar', 1),
(394, 'S000394', 'Industri Pakaian Jadi dari Textile', 1),
(395, 'S000395', 'Makanan', 1),
(396, 'S000396', 'Pengolahan Plastik', 1),
(397, 'S000397', 'Logo Karet', 1),
(398, 'S000398', 'Knitting', 1),
(399, 'S000399', 'Aksesoris', 1),
(400, 'S000400', 'Part Sepeda Motor', 1),
(401, 'S000401', 'Jasa Bengkel Bubut', 1),
(402, 'S000402', 'Elektro Industri', 1),
(403, 'S000403', 'Perajutan Nylon', 1),
(404, 'S000404', 'Industri Textile Kain Rajut', 1),
(405, 'S000405', 'Industri Bordir', 1),
(406, 'S000406', 'Industri Perajutan Nylon', 1),
(407, 'S000407', 'Industri Knitting', 1),
(408, 'S000408', 'Industri Textile /Embroidery', 1),
(409, 'S000409', 'Alat-alat Sepeda Motor', 1),
(410, 'S000410', 'SPBU Pengisian Bahan Bakar Minyak ( BBM)', 1),
(411, 'S000411', 'Kasur Busa', 1),
(412, 'S000412', 'Perusahaan Penyedia Jasa / Out  Sourching', 1),
(413, 'S000413', 'Penjualan Barang dan Jasa', 1),
(414, 'S000414', 'Kerajinan Makloon', 1),
(415, 'S000415', 'Pengolahan Makanan', 1),
(416, 'S000416', 'Manufacture PCB', 1),
(417, 'S000417', 'Distributor Penyalur', 1),
(418, 'S000418', 'Industri Spare Part Tekstile', 1),
(419, 'S000419', 'Pengolahan Tembakau', 1),
(420, 'S000420', 'Industri Ducting (Ventilasi Udara)', 1),
(421, 'S000421', 'Industri Barang-barang Dari Tali', 1),
(422, 'S000422', 'Dyeing / Pencelupan Benang', 1),
(423, 'S000423', 'Garment/ Pkaian Jadi', 1),
(424, 'S000424', 'Trading Spare Parts', 1),
(425, 'S000425', 'Bubut /Trading Spare Parts', 1),
(426, 'S000426', 'Chemicals', 1),
(427, 'S000427', 'Industri Makanan ', 1),
(428, 'S000428', 'Industri Textile/Carpet ', 1),
(429, 'S000429', 'Garment ', 1),
(430, 'S000430', 'Makloon/ jaring', 1),
(431, 'S000431', 'Perbengkelan', 1),
(432, 'S000432', 'Tenun Handuk', 1),
(433, 'S000433', 'Pupuk Urea', 1),
(434, 'S000434', 'Jasa Pemeliharaan Tabung LPG', 1),
(435, 'S000435', 'Industri Makanan/ Roti', 1),
(436, 'S000436', 'Industri Pengolahan Spare Parts', 1),
(437, 'S000437', 'Pencelupan Benang & Penyempurnaan Kain', 1),
(438, 'S000438', 'Produksi Alat Tenun', 1),
(439, 'S000439', 'Embroidery', 1),
(440, 'S000440', 'Industri Textile / Pembuatan Handuk', 1),
(441, 'S000441', 'Industri  Farmasi', 1),
(442, 'S000442', 'Jasa Perbaikan Mesin-mesin Industri, Pembangkit Listrik & Komponennya', 1),
(443, 'S000443', 'Pemintalan dan Pencelupan Benang', 1),
(444, 'S000444', 'Industri Textile/ Embroidery', 1),
(445, 'S000445', 'Spinning', 1),
(446, 'S000446', 'Perdagangan Export  Sayur Mayur ', 1),
(447, 'S000447', 'Jasa Transportasi Darat & Persewaan Alat Berat', 1),
(448, 'S000448', 'Koperasi Peternak Sapi Perah', 1),
(449, 'S000449', 'Perkebunan Teh dan Kina', 1),
(450, 'S000450', 'Pengolahan Teh Hitam', 1),
(451, 'S000451', 'Jasa Boga', 1),
(452, 'S000452', 'Pembangkit Listrik Tenaga Panas Bumi', 1),
(453, 'S000453', 'Penyalur / Peternak Ayam', 1),
(454, 'S000454', 'Industri Mamin Minuman dlm Kemasan', 1),
(455, 'S000455', 'Peternakan Sapi', 1),
(456, 'S000456', 'Jasa Kontruksi', 1),
(457, 'S000457', 'Pariwisata ( Hotel )', 1),
(458, 'S000458', 'Perdagangan ', 1),
(459, 'S000459', 'Washing', 1),
(460, 'S000460', 'Industri Garemnt', 1),
(461, 'S000461', 'Penyalur Kendaraan', 1),
(462, 'S000462', 'Bubut', 1),
(463, 'S000463', 'Perdagangan (Toserba)', 1),
(464, 'S000464', 'Produksi Bandrek', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `title` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `read` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `created_date`, `title`, `name`, `email`, `message`, `read`, `status`) VALUES
(12, '2016-10-08 18:23:23', 'Halooo', 'Park Jiyeon', 'pak@jiyeon.com', 'Itsme', 0, 0),
(13, '2017-03-02 09:14:15', 'Infomasi', 'Mugi', 'infomugi@gmail.com', 'apa', 0, 0),
(14, '2017-03-02 10:21:45', 'Aku', 'Mughi', 'infomugi@gmail.com', 'Kamu', 0, 0),
(15, '2017-03-02 16:32:43', 'test', 'Mugi', 'infomugi@gmail.com', 'ok', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_company_contact`
--

CREATE TABLE IF NOT EXISTS `ref_company_contact` (
  `id_company_contact` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_company_contact`
--

INSERT INTO `ref_company_contact` (`id_company_contact`, `name`, `address`, `phone`, `email`, `company_id`, `status`) VALUES
(1, 'Wahyu Winoto', 'Jl. Balekamba', '08784664979496', 'wahyu@winoto.com', 1, 1),
(2, 'Ari Kuncoro', 'Jl. SInamung', '087546565446', 'ari@sinamung.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_testing`
--

CREATE TABLE IF NOT EXISTS `ref_testing` (
  `id_testing` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_testing`
--

INSERT INTO `ref_testing` (`id_testing`, `code`, `name`, `status`) VALUES
(1, 'C0001', 'Pengujian Bahan', 1),
(2, 'C0002', 'Pengujian Alat', 1),
(3, 'C0003', 'Pengujian Tingkat Ketahanan Api', 1),
(4, 'C0004', 'Pengujian Insulasi Bunyi', 1),
(5, 'C0004', 'Pengujian Thermal Thansmintance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_unit`
--

CREATE TABLE IF NOT EXISTS `ref_unit` (
  `id_unit` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_unit`
--

INSERT INTO `ref_unit` (`id_unit`, `name`, `address`, `type`, `status`) VALUES
(1, 'Balai Pengujian Bahan', 'Jl. Bandung', 1, 1),
(2, 'Balai Pengujian Data', 'Jl. Surabaya', 1, 1),
(3, 'Balai Pengelolaan Sumber Daya', 'Jl. Medan', 1, 1),
(4, 'Balai Pusat Data dan Informasi', 'Jl. Sumatera', 1, 1),
(5, 'Lab. Pengujian Bahan', 'Jl. Aceh', 2, 1),
(6, 'Lab. Pengujian Tanah', 'Jl. Meruke', 2, 1),
(7, 'Lab. Pengujian Air', 'Jl. Sapan', 2, 1),
(8, 'Lab. Pengujian Udara', 'Jl. Jakarta', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id_request` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `company_id` int(11) NOT NULL,
  `letter_date` date NOT NULL,
  `letter_code` varchar(520) NOT NULL,
  `letter_subject` varchar(150) NOT NULL,
  `letter_attachment` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `code`, `created_date`, `created_id`, `update_date`, `update_id`, `date`, `company_id`, `letter_date`, `letter_code`, `letter_subject`, `letter_attachment`, `status`) VALUES
(1, '123', '2017-08-11 11:12:07', 1, '2017-08-12 10:43:36', 79, '2017-08-11', 2, '2017-08-01', 'SR/1/DK/2017', 'Pengujian Bahan', '', 1),
(2, '234', '2017-08-11 02:55:07', 1, '0000-00-00 00:00:00', 0, '2017-08-11', 2, '2017-08-25', '235/XII/2016', 'Permohonan Pengujian', 'Lampiran.pdf', 1),
(3, '1124', '2017-08-12 12:25:03', 1, '0000-00-00 00:00:00', 0, '2017-08-07', 3, '2017-08-23', '12/XVI/45/2017', 'Pengujian Beton', 'PengujianBeton.pdf', 1),
(4, '2646', '2017-08-12 12:28:44', 1, '0000-00-00 00:00:00', 0, '2017-08-12', 1, '2017-08-12', '13/XVI/45/2017', 'Pengujian Tanah Basah', 'Pengujian.pdf', 1),
(5, '3652', '2017-08-12 12:40:09', 1, '0000-00-00 00:00:00', 0, '2017-08-12', 2, '2017-08-16', '14/XVI/45/2017', 'Pengujian Kelembabab Udara', 'Lampiran.pdf', 1),
(7, '1845', '2017-08-12 12:43:23', 1, '0000-00-00 00:00:00', 0, '2017-08-15', 3, '2017-08-31', '16/XVI/45/2017', 'Pengujian Listrik', 'Lampiran.pdf', 1),
(9, '6574', '2017-08-12 12:53:54', 1, '0000-00-00 00:00:00', 0, '2017-08-12', 2, '2017-08-01', 'SR/VII/4/2017', 'Pengujian Tanah Liat', '6574.pdf', 1),
(10, '123456', '2017-08-12 11:01:13', 79, '0000-00-00 00:00:00', 0, '2017-08-14', 2, '2017-08-15', 'SD/KR/VII/X/2017', 'Permohonan Pengujian Bahan', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_activity`
--

CREATE TABLE IF NOT EXISTS `request_activity` (
  `id_activity` int(11) NOT NULL,
  `activity_date` datetime NOT NULL,
  `request_date` datetime NOT NULL,
  `approve_id` int(11) NOT NULL,
  `approve_date` datetime NOT NULL,
  `response_id` int(11) NOT NULL,
  `response_date` datetime NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `report_send_id` int(11) NOT NULL,
  `report_send_date` datetime NOT NULL,
  `report_accept_id` int(11) NOT NULL,
  `report_accept_date` datetime NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_activity`
--

INSERT INTO `request_activity` (`id_activity`, `activity_date`, `request_date`, `approve_id`, `approve_date`, `response_id`, `response_date`, `invoice_id`, `invoice_date`, `payment_id`, `payment_date`, `report_send_id`, `report_send_date`, `report_accept_id`, `report_accept_date`, `request_id`, `status`) VALUES
(1, '2017-08-12 10:32:02', '2017-08-10 00:00:00', 1, '2017-08-11 21:52:00', 79, '2017-08-12 10:32:02', 79, '2017-08-12 10:21:52', 79, '2017-08-12 10:16:20', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, 0),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 4, 0),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 5, 0),
(4, '2017-08-12 00:45:46', '2017-08-12 12:43:23', 0, '0000-00-00 00:00:00', 1, '2017-08-12 00:45:46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 7, 0),
(5, '2017-08-12 12:53:54', '2017-08-12 12:53:54', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 9, 0),
(6, '2017-08-12 11:16:24', '2017-08-12 11:01:13', 0, '0000-00-00 00:00:00', 79, '2017-08-12 11:04:51', 79, '2017-08-12 11:11:38', 79, '2017-08-12 11:16:24', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_invoice`
--

CREATE TABLE IF NOT EXISTS `request_invoice` (
  `id_invoice` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `total` float NOT NULL,
  `note` text NOT NULL,
  `signature_id` int(11) NOT NULL,
  `file_invoice` varchar(255) NOT NULL,
  `file_spk` varchar(255) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_invoice`
--

INSERT INTO `request_invoice` (`id_invoice`, `created_date`, `created_id`, `update_date`, `update_id`, `code`, `date`, `description`, `total`, `note`, `signature_id`, `file_invoice`, `file_spk`, `request_id`, `status`) VALUES
(1, '2017-08-11 04:59:08', 1, '0000-00-00 00:00:00', 0, '456', '2017-08-11', 'Pembayaran Fase Ke-1', 150000, '-', 1, '', '', 1, 1),
(3, '2017-08-12 10:16:20', 79, '0000-00-00 00:00:00', 0, '234', '2017-08-12', 'Pembayaran Fase Ke-2', 1500000, '-', 1, '', '', 1, 1),
(4, '2017-08-12 10:21:52', 79, '0000-00-00 00:00:00', 0, '258', '2017-08-12', 'Pembayaran Fase Ke-3', 257000, '-', 1, '', '', 1, 1),
(5, '2017-08-12 11:10:39', 79, '0000-00-00 00:00:00', 0, '123', '2017-08-11', 'Pembayaran Fase Ke-1', 1500000, '-', 1, '', '', 10, 1),
(6, '2017-08-12 11:11:38', 79, '0000-00-00 00:00:00', 0, '234', '2017-08-08', 'Pembayaran Fase Ke-1', 25000000, '-', 1, '', '', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_payment`
--

CREATE TABLE IF NOT EXISTS `request_payment` (
  `id_payment` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `term` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_payment`
--

INSERT INTO `request_payment` (`id_payment`, `created_date`, `created_id`, `update_date`, `update_id`, `code`, `date`, `term`, `total`, `file`, `invoice_id`, `request_id`, `status`) VALUES
(3, '2017-08-12 11:16:24', 79, '0000-00-00 00:00:00', 0, '245', '2017-08-08', 1, 254, '', 5, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_response`
--

CREATE TABLE IF NOT EXISTS `request_response` (
  `id_response` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_id` int(11) NOT NULL,
  `letter_date` date NOT NULL,
  `letter_code` varchar(25) NOT NULL,
  `letter_attachment` varchar(255) NOT NULL,
  `date_send` date NOT NULL,
  `date_feedback` date NOT NULL,
  `description` text NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_response`
--

INSERT INTO `request_response` (`id_response`, `created_date`, `created_id`, `update_date`, `update_id`, `letter_date`, `letter_code`, `letter_attachment`, `date_send`, `date_feedback`, `description`, `request_id`, `status`) VALUES
(1, '2017-08-11 02:45:01', 1, '0000-00-00 00:00:00', 0, '2017-08-11', '12/XII/1/2017', 'File.pdf', '2017-08-11', '2017-08-11', 'Baik', 1, 1),
(2, '2017-08-11 02:55:43', 1, '0000-00-00 00:00:00', 0, '2017-08-11', '13/XII/1/2017', 'Data.pdf', '0000-00-00', '0000-00-00', 'Tidak Sesuai', 2, 1),
(3, '2017-08-11 09:37:32', 1, '0000-00-00 00:00:00', 0, '2017-08-11', '13/XII/2017', 'Lampiran.pdf', '0000-00-00', '0000-00-00', 'Fix', 1, 1),
(4, '2017-08-11 09:43:51', 1, '0000-00-00 00:00:00', 0, '2017-08-10', '15/XII/2017', 'Data.pdf', '0000-00-00', '0000-00-00', 'Nice', 1, 1),
(5, '2017-08-12 12:45:46', 1, '0000-00-00 00:00:00', 0, '2017-08-12', '15/XII/2017', 'Data.pdf', '0000-00-00', '0000-00-00', 'Perbaiki', 7, 1),
(10, '2017-08-12 11:04:51', 79, '0000-00-00 00:00:00', 0, '2017-08-12', '123/X/VII/2017', '', '0000-00-00', '0000-00-00', '-', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_schedule`
--

CREATE TABLE IF NOT EXISTS `request_schedule` (
  `id_schedule` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `cost` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL,
  `testing_number` int(11) NOT NULL,
  `testing_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_schedule`
--

INSERT INTO `request_schedule` (`id_schedule`, `created_date`, `created_id`, `update_date`, `update_id`, `task`, `cost`, `start_date`, `end_date`, `description`, `note`, `testing_number`, `testing_id`, `file`, `request_id`, `status`) VALUES
(3, '2017-08-11 10:44:46', 1, '0000-00-00 00:00:00', 0, 'Konstruksi Dilaksanakan Oleh Pemohon', 1000, '2017-08-11', '2017-08-18', '-', '-', 1, 5, '', 1, 1),
(4, '2017-08-11 10:51:32', 1, '0000-00-00 00:00:00', 0, 'Pelaksanaan Pengujian', 2000, '2017-08-26', '2017-08-31', '-', '-', 2, 5, '', 1, 1),
(5, '2017-08-11 10:53:53', 1, '0000-00-00 00:00:00', 0, 'Konstruksi Dilaksanakan Oleh Pemohon', 1000, '2017-09-01', '2017-09-09', '-', '-', 1, 6, '', 1, 1),
(6, '2017-08-11 10:55:43', 1, '0000-00-00 00:00:00', 0, 'Pelaksanaan Pengujian', 2000, '2017-09-10', '2017-09-16', '-', '-', 1, 6, '', 1, 1),
(7, '2017-08-12 11:05:49', 79, '0000-00-00 00:00:00', 0, 'Konstruksi Dilaksanakan Oleh Pemohon', 1000, '2017-08-12', '2017-08-26', '-', '-', 1, 9, '', 10, 1),
(8, '2017-08-12 11:09:49', 79, '0000-00-00 00:00:00', 0, 'Konstruksi Dilaksanakan Oleh Pemohon', 2000, '2017-08-12', '2017-08-26', 'Pengujian', '-', 1, 10, '', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_testing`
--

CREATE TABLE IF NOT EXISTS `request_testing` (
  `id_testing` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_id` int(11) NOT NULL,
  `testing_type` int(11) NOT NULL,
  `testing_lab` int(11) NOT NULL,
  `testing_part` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_testing`
--

INSERT INTO `request_testing` (`id_testing`, `created_date`, `created_id`, `update_date`, `update_id`, `testing_type`, `testing_lab`, `testing_part`, `request_id`, `status`) VALUES
(5, '2017-08-11 10:31:35', 1, '2017-08-11 11:43:37', 1, 1, 5, 1, 1, 1),
(6, '2017-08-11 10:52:44', 1, '0000-00-00 00:00:00', 0, 4, 7, 2, 1, 1),
(9, '2017-08-12 11:05:08', 79, '0000-00-00 00:00:00', 0, 1, 5, 1, 10, 1),
(10, '2017-08-12 11:08:08', 79, '0000-00-00 00:00:00', 0, 1, 6, 2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `favicon` varchar(25) NOT NULL,
  `logo` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `name`, `description`, `keywords`, `favicon`, `logo`, `address`, `phone`, `email`, `facebook`, `instagram`, `twitter`, `status`, `created_by`, `created_date`, `update_by`, `update_date`) VALUES
(1, 'PNBP', 'Menjadi fokus dan spesialisasi dibidang teknologi, mengembangkan bisnis melalui ekosistem IT, menghadirkan inovasi solusi yang terintegrasi.', 'infomugi, apps, mobile, web', '1.ico', '1.png', 'Jl. Raya Sorekarno Hatta No.46 Bandung', '087824931504', 'admin@pnbp.com', 'http://facebook.com/infomugi', 'http://instagram.com/infomugi', 'http://twitter.com/infomugi', 0, 1, '0000-00-00 00:00:00', 1, '2017-08-11 09:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(128) NOT NULL,
  `bio` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) NOT NULL,
  `maps` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `pin` varchar(32) NOT NULL,
  `birth` date NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `gplus` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `background` varchar(256) NOT NULL,
  `cover` varchar(128) NOT NULL,
  `verified` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_visit` datetime NOT NULL,
  `ipaddress` varchar(35) NOT NULL,
  `views` int(11) NOT NULL,
  `token` varchar(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `first_name`, `last_name`, `location`, `website`, `bio`, `job`, `maps`, `phone`, `pin`, `birth`, `gender`, `facebook`, `twitter`, `gplus`, `image`, `background`, `cover`, `verified`, `status`, `level`, `active`, `division`, `create_date`, `last_visit`, `ipaddress`, `views`, `token`) VALUES
(1, 'infomugi', '21232f297a57a5a743894a0e4a801fc3', 'infomugi@gmail.com', 'Infomugi', 'Media', 'Bandung', 'www.infomugi.com', '-', 'Designer & Web Developer', '0', '087824931504', '27F8F758', '1994-03-26', 1, 'mugirachmat', 'mugirachmat', 'mugirachmat', 'infomugi.png', '#000', 'admin.jpg', 1, 1, 1, 0, 2, '2015-08-25 00:00:00', '2017-08-12 09:01:19', '192.168.43.164', 658, '7b3efaf779b20a45e8348b6e27726c28'),
(79, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@pu.go.id', 'Admin', 'PNBP', 'Jakarta', 'pu.go.id', 'Admin Aplikasi PNBP', 'Staff', '', '087954684578', '25F7F845', '1994-03-26', 1, 'http://twitter.com/admin', 'http://twitter.com/admin', 'http://twitter.com/admin', 'default.png', '#FFF', 'default.jpg', 0, 0, 1, 1, 1, '1970-01-01 00:00:00', '2017-08-12 09:06:49', '192.168.43.164', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id_activities`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id_division`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id_industry`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `ref_company_contact`
--
ALTER TABLE `ref_company_contact`
  ADD PRIMARY KEY (`id_company_contact`);

--
-- Indexes for table `ref_testing`
--
ALTER TABLE `ref_testing`
  ADD PRIMARY KEY (`id_testing`);

--
-- Indexes for table `ref_unit`
--
ALTER TABLE `ref_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `request_activity`
--
ALTER TABLE `request_activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indexes for table `request_invoice`
--
ALTER TABLE `request_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `request_payment`
--
ALTER TABLE `request_payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `request_response`
--
ALTER TABLE `request_response`
  ADD PRIMARY KEY (`id_response`);

--
-- Indexes for table `request_schedule`
--
ALTER TABLE `request_schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `request_testing`
--
ALTER TABLE `request_testing`
  ADD PRIMARY KEY (`id_testing`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id_activities` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id_division` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id_industry` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=465;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ref_company_contact`
--
ALTER TABLE `ref_company_contact`
  MODIFY `id_company_contact` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_testing`
--
ALTER TABLE `ref_testing`
  MODIFY `id_testing` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_unit`
--
ALTER TABLE `ref_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `request_activity`
--
ALTER TABLE `request_activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `request_invoice`
--
ALTER TABLE `request_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `request_payment`
--
ALTER TABLE `request_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `request_response`
--
ALTER TABLE `request_response`
  MODIFY `id_response` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `request_schedule`
--
ALTER TABLE `request_schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request_testing`
--
ALTER TABLE `request_testing`
  MODIFY `id_testing` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
