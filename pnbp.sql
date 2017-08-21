-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 02:05 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pnbp`
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
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

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
(49, '2017-08-12 09:06:49', 1, 'Login from IP : 192.168.43.164', 1, 79, 2, 1),
(50, '2017-08-12 15:29:14', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(51, '2017-08-14 09:14:40', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(52, '2017-08-14 09:15:22', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(53, '2017-08-14 09:15:25', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(54, '2017-08-14 09:16:20', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(55, '2017-08-14 09:16:21', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(56, '2017-08-14 09:18:37', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(57, '2017-08-14 09:30:12', 0, 'Logout from IP : ::1', 0, 1, 0, 0),
(58, '2017-08-14 09:30:14', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(59, '2017-08-14 16:57:35', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(60, '2017-08-14 17:00:06', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(61, '2017-08-17 13:52:56', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(62, '2017-08-17 23:50:46', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(63, '2017-08-18 22:10:17', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(64, '2017-08-18 22:45:35', 1, 'Login from IP : ::1', 1, 1, 2, 1),
(65, '2017-08-19 20:04:45', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(66, '2017-08-20 10:03:58', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(67, '2017-08-20 13:50:39', 0, 'Logout from IP : 192.168.43.164', 0, 1, 0, 0),
(68, '2017-08-20 13:50:44', 1, 'Login from IP : 192.168.43.164', 1, 3, 2, 1),
(69, '2017-08-20 13:51:46', 0, 'Logout from IP : 192.168.43.164', 0, 3, 0, 0),
(70, '2017-08-20 13:51:51', 1, 'Login from IP : 192.168.43.164', 1, 3, 2, 1),
(71, '2017-08-20 14:07:18', 0, 'Logout from IP : 192.168.43.164', 0, 3, 0, 0),
(72, '2017-08-20 14:07:24', 1, 'Login from IP : 192.168.43.164', 1, 3, 2, 1),
(73, '2017-08-20 14:19:05', 0, 'Logout from IP : 192.168.43.164', 0, 3, 0, 0),
(74, '2017-08-20 14:19:11', 1, 'Login from IP : 192.168.43.164', 1, 2, 2, 1),
(75, '2017-08-20 14:19:16', 0, 'Logout from IP : 192.168.43.164', 0, 2, 0, 0),
(76, '2017-08-20 14:19:21', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(77, '2017-08-20 14:19:27', 0, 'Logout from IP : 192.168.43.164', 0, 1, 0, 0),
(78, '2017-08-20 14:19:33', 1, 'Login from IP : 192.168.43.164', 1, 2, 2, 1),
(79, '2017-08-20 14:20:03', 0, 'Logout from IP : 192.168.43.164', 0, 2, 0, 0),
(80, '2017-08-20 14:20:08', 1, 'Login from IP : 192.168.43.164', 1, 2, 2, 1),
(81, '2017-08-20 14:20:30', 0, 'Logout from IP : 192.168.43.164', 0, 2, 0, 0),
(82, '2017-08-20 14:20:37', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(83, '2017-08-20 14:21:23', 0, 'Logout from IP : 192.168.43.164', 0, 1, 0, 0),
(84, '2017-08-20 14:21:29', 1, 'Login from IP : 192.168.43.164', 1, 3, 2, 1),
(85, '2017-08-20 15:51:46', 0, 'Logout from IP : 192.168.43.164', 0, 3, 0, 0),
(86, '2017-08-20 15:51:53', 1, 'Login from IP : 192.168.43.164', 1, 2, 2, 1),
(87, '2017-08-20 17:28:04', 0, 'Logout from IP : 192.168.43.164', 0, 2, 0, 0),
(88, '2017-08-20 17:28:17', 1, 'Login from IP : 192.168.43.164', 1, 3, 2, 1),
(89, '2017-08-20 17:38:05', 0, 'Logout from IP : 192.168.43.164', 0, 3, 0, 0),
(90, '2017-08-20 17:38:11', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(91, '2017-08-20 17:48:10', 0, 'Logout from IP : 192.168.43.164', 0, 1, 0, 0),
(92, '2017-08-20 17:48:20', 1, 'Login from IP : 192.168.43.164', 1, 3, 2, 1),
(93, '2017-08-20 17:54:16', 0, 'Logout from IP : 192.168.43.164', 0, 3, 0, 0),
(94, '2017-08-20 17:54:20', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1),
(95, '2017-08-21 01:10:19', 0, 'Logout from IP : 192.168.43.164', 0, 1, 0, 0),
(96, '2017-08-21 01:13:38', 1, 'Login from IP : 192.168.43.164', 1, 1, 2, 1);

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
(1, 'BJR', 'Baja Ringan', 'fa fa-html5', 1, 1, 1),
(2, 'BTN', 'Beton', 'fa fa-css3', 1, 1, 1),
(3, 'BS', 'Besi', 'fa fa-google', 1, 1, 1),
(21, 'TNH', 'Tanah', 'fa fa-home', 1, 0, 1),
(22, 'ARM', 'Air Minum', 'fa fa-home', 1, 0, 1),
(23, 'ARL', 'Air Limbah', 'fa fa-home', 1, 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id_industry`, `name`, `description`, `status`) VALUES
(1, 'S000001', 'Pemerintah', 1),
(2, 'S000002', 'Swasta', 1),
(3, 'S000003', 'Organisasi Masyarakat', 1),
(4, 'S000004', 'Perguruan Tinggi', 1);

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
  `part_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_testing`
--

INSERT INTO `ref_testing` (`id_testing`, `code`, `name`, `part_id`, `lab_id`, `status`) VALUES
(1, 'C0001', 'Pengujian Bahan', 8, 12, 1),
(2, 'C0002', 'Pengujian Alat', 9, 13, 1),
(3, 'C0003', 'Pengujian Tingkat Ketahanan Api', 10, 14, 1),
(4, 'C0004', 'Pengujian Insulasi Bunyi', 11, 15, 1),
(5, 'C0005', 'Pengujian Thermal Thansmintance', 9, 14, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_unit`
--

INSERT INTO `ref_unit` (`id_unit`, `name`, `address`, `type`, `status`) VALUES
(1, 'Manajer Puncak', 'Prof. (R). Dr. Ir. Arief Sabaruddin, CES.', 3, 1),
(2, 'Manajer Teknik Balai Litbang AMPLP', '-', 3, 1),
(3, 'Manajer Teknik Balai Litbang Tata Bangunan dan Lingkungan', '-', 3, 1),
(4, 'Manajer Teknik Balai Litbang Sains Bangunan', '-', 3, 1),
(5, 'Manajer Teknik Balai Litbang Bahan dan Struktur Bangunan', '-', 3, 1),
(6, 'Manajer Administrasi', 'Ir. Riana Suwardi, M.Si', 3, 1),
(7, 'Bendahara Penerima Negara', 'Ahmad Gojali', 3, 1),
(8, 'Balai Litbang AMPLP', '-', 1, 1),
(9, 'Balai Litbang Tata Bangunan dan Lingkungan', '-', 1, 1),
(10, 'Balai Litbang Sains dan Bangunan', '-', 1, 1),
(11, 'Balai Litbang Bahan dan Struktur Bangunan', '-', 1, 1),
(12, 'Lab Air Minum dan PLP', '-', 2, 1),
(13, 'Lab Bahan Bangunan', '-', 2, 1),
(14, 'Lab Struktur dan Konstruksi Bangunan', '-', 2, 1),
(15, 'Lab Sains dan Bangunan', '-', 2, 1),
(16, '', '', 0, 0);

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
  `letter_code` varchar(255) NOT NULL,
  `letter_subject` varchar(150) NOT NULL,
  `letter_attachment` varchar(255) NOT NULL,
  `disposition_letter` varchar(255) NOT NULL,
  `disposition_to` int(11) NOT NULL,
  `color` varchar(8) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `code`, `created_date`, `created_id`, `update_date`, `update_id`, `date`, `company_id`, `letter_date`, `letter_code`, `letter_subject`, `letter_attachment`, `disposition_letter`, `disposition_to`, `color`, `status`) VALUES
(82, '123', '2017-08-19 01:24:39', 1, '2017-08-20 02:23:31', 3, '2017-08-01', 2, '2017-08-02', 'SR/VIII/X/2017', 'Permohonan Pengujian Air', 'surat-permohonan-123.pdf', 'surat-disposisi-123.pdf', 8, '#3d38bf', 2),
(85, '124', '2017-08-20 12:41:59', 1, '2017-08-20 03:14:35', 3, '2017-08-20', 3, '2017-08-21', 'SR/FI/VII/2017', 'Permohonan Pengujian Tanah', 'surat-permohonan-124.pdf', '', 0, '#d49016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_activity`
--

CREATE TABLE IF NOT EXISTS `request_activity` (
  `id_activity` int(11) NOT NULL,
  `activity_date` datetime NOT NULL,
  `request_id` int(11) NOT NULL,
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_activity`
--

INSERT INTO `request_activity` (`id_activity`, `activity_date`, `request_id`, `request_date`, `approve_id`, `approve_date`, `response_id`, `response_date`, `invoice_id`, `invoice_date`, `payment_id`, `payment_date`, `report_send_id`, `report_send_date`, `report_accept_id`, `report_accept_date`, `status`) VALUES
(64, '2017-08-20 23:19:47', 82, '2017-08-19 01:24:39', 3, '2017-08-20 17:48:26', 1, '2017-08-19 20:38:34', 1, '2017-08-20 11:14:41', 1, '2017-08-20 23:19:47', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, '2017-08-20 17:37:22', 85, '2017-08-20 12:42:00', 3, '2017-08-20 17:37:22', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_invoice`
--

INSERT INTO `request_invoice` (`id_invoice`, `created_date`, `created_id`, `update_date`, `update_id`, `code`, `date`, `description`, `total`, `note`, `signature_id`, `file_invoice`, `file_spk`, `request_id`, `status`) VALUES
(8, '2017-08-20 11:14:41', 1, '0000-00-00 00:00:00', 0, '123', '2017-08-20', 'Pengujian Tingkat Ketahanan Api Tungku Besar Vertikal Panel Dinding Satu Sampel', 2500000, '', 1, '', '', 82, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_payment`
--

INSERT INTO `request_payment` (`id_payment`, `created_date`, `created_id`, `update_date`, `update_id`, `code`, `date`, `term`, `total`, `file`, `invoice_id`, `request_id`, `status`) VALUES
(4, '2017-08-20 11:19:47', 1, '0000-00-00 00:00:00', 0, 'KU.06.11/KWT-PNBP/LP/133', '2017-08-20', 1, 1500000, 'bukti-pembayaran-123-1503245987.pdf', 8, 82, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_response`
--

INSERT INTO `request_response` (`id_response`, `created_date`, `created_id`, `update_date`, `update_id`, `letter_date`, `letter_code`, `letter_attachment`, `date_send`, `date_feedback`, `description`, `request_id`, `status`) VALUES
(11, '2017-08-17 04:12:33', 1, '0000-00-00 00:00:00', 0, '2017-08-17', 'T-001', 'Lampiran1.docx', '0000-00-00', '0000-00-00', 'Test', 11, 1),
(25, '2017-08-19 08:38:33', 1, '0000-00-00 00:00:00', 0, '2017-08-07', '123', 'surat-tanggapan-123-1503149913.pdf', '0000-00-00', '0000-00-00', '', 82, 1);

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
  `testing_type` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_schedule`
--

INSERT INTO `request_schedule` (`id_schedule`, `created_date`, `created_id`, `update_date`, `update_id`, `task`, `cost`, `start_date`, `end_date`, `description`, `note`, `testing_number`, `testing_id`, `testing_type`, `file`, `request_id`, `status`) VALUES
(15, '2017-08-20 12:16:30', 1, '0000-00-00 00:00:00', 0, 'Kegiatan A', 100000, '2017-08-20', '2017-08-31', '', '', 1, 13, 4, 'file-rab-123-1503206190.pdf', 82, 1),
(16, '2017-08-20 12:18:20', 1, '0000-00-00 00:00:00', 0, 'Kegiatan B', 500000, '2017-08-20', '2017-08-25', '', '', 2, 13, 4, '', 82, 1),
(17, '2017-08-20 12:43:02', 1, '0000-00-00 00:00:00', 0, 'Kegiatan X', 1000, '2017-08-07', '2017-08-11', '', '', 1, 15, 2, 'file-rab-124-1503207782.pdf', 85, 1),
(18, '2017-08-20 12:43:34', 1, '0000-00-00 00:00:00', 0, 'Kegiatan Y', 2500, '2017-08-10', '2017-08-14', '', '', 2, 15, 2, 'file-rab-124-1503207814.pdf', 85, 1),
(19, '2017-08-20 02:31:11', 3, '0000-00-00 00:00:00', 0, 'Kegiatan C', 245000, '2017-08-20', '2017-08-31', '', '', 1, 16, 3, '', 85, 1),
(20, '2017-08-20 02:31:53', 3, '0000-00-00 00:00:00', 0, 'Kegiatan D', 15000, '2017-08-20', '2017-08-30', '', '', 2, 16, 3, 'file-rab-124-1503214313.pdf', 85, 1);

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
  `testing_total` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_testing`
--

INSERT INTO `request_testing` (`id_testing`, `created_date`, `created_id`, `update_date`, `update_id`, `testing_type`, `testing_lab`, `testing_part`, `testing_total`, `request_id`, `status`) VALUES
(5, '2017-08-11 10:31:35', 1, '2017-08-11 11:43:37', 1, 1, 5, 1, 0, 1, 1),
(6, '2017-08-11 10:52:44', 1, '0000-00-00 00:00:00', 0, 4, 7, 2, 0, 1, 1),
(9, '2017-08-12 11:05:08', 79, '0000-00-00 00:00:00', 0, 1, 5, 1, 0, 10, 1),
(10, '2017-08-12 11:08:08', 79, '0000-00-00 00:00:00', 0, 1, 6, 2, 0, 10, 1),
(11, '2017-08-17 05:35:40', 1, '2017-08-17 07:54:06', 1, 1, 13, 11, 0, 11, 1),
(12, '2017-08-17 05:36:02', 1, '2017-08-17 07:55:48', 1, 4, 14, 10, 0, 11, 1),
(13, '2017-08-19 01:55:37', 1, '0000-00-00 00:00:00', 0, 4, 15, 11, 2, 82, 1),
(14, '2017-08-19 01:58:47', 1, '0000-00-00 00:00:00', 0, 1, 12, 8, 1, 82, 1),
(15, '2017-08-20 12:42:18', 1, '0000-00-00 00:00:00', 0, 2, 13, 9, 2, 85, 1),
(16, '2017-08-20 12:42:28', 1, '0000-00-00 00:00:00', 0, 3, 14, 10, 2, 85, 1);

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
(1, 'infomugi', '21232f297a57a5a743894a0e4a801fc3', 'admin@pu.go.id', 'Infomugi', 'Media', 'Jakarta', 'pu.go.id', 'Admin Aplikasi PNBP', 'Staff', '0', '087824931504', '27F8F758', '1994-03-26', 1, 'mugirachmat', 'mugirachmat', 'mugirachmat', 'infomugi.png', '#000', 'infomugi.png', 1, 1, 1, 1, 2, '2015-08-25 00:00:00', '2017-08-21 01:13:38', '192.168.43.164', 658, '7b3efaf779b20a45e8348b6e27726c28'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@pu.go.id', 'Admin', 'PNBP', 'Jakarta', 'pu.go.id', 'Admin Aplikasi PNBP', 'Staff', '', '087954684578', '25F7F845', '1994-03-26', 1, 'http://twitter.com/admin', 'http://twitter.com/admin', 'http://twitter.com/admin', 'male.png', '#FFF', 'male.png', 0, 0, 1, 0, 1, '1970-01-01 00:00:00', '2017-08-20 15:51:53', '192.168.43.164', 2, ''),
(3, 'balai', '21232f297a57a5a743894a0e4a801fc3', 'admin@pu.go.id', 'Balai', 'PNBP', 'Jakarta', 'pu.go.id', 'Admin Aplikasi PNBP', 'Staff', '', '087954684578', '25F7F845', '1994-03-26', 1, 'http://twitter.com/admin', 'http://twitter.com/admin', 'http://twitter.com/admin', 'avatar.png', '#FFF', 'avatar.png', 0, 0, 2, 0, 1, '1970-01-01 00:00:00', '2017-08-20 17:48:20', '192.168.43.164', 2, ''),
(4, 'petugas', '21232f297a57a5a743894a0e4a801fc3', 'admin@pu.go.id', 'Petugas', 'PNBP', 'Jakarta', 'pu.go.id', 'Admin Aplikasi PNBP', 'Staff', '', '087954684578', '25F7F845', '1994-03-26', 1, 'http://twitter.com/admin', 'http://twitter.com/admin', 'http://twitter.com/admin', 'image.png', '#FFF', 'image.png', 0, 0, 3, 1, 1, '1970-01-01 00:00:00', '2017-08-12 09:06:49', '192.168.43.164', 2, '');

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
  MODIFY `id_activities` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
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
  MODIFY `id_industry` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `request_activity`
--
ALTER TABLE `request_activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `request_invoice`
--
ALTER TABLE `request_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request_payment`
--
ALTER TABLE `request_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `request_response`
--
ALTER TABLE `request_response`
  MODIFY `id_response` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `request_schedule`
--
ALTER TABLE `request_schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `request_testing`
--
ALTER TABLE `request_testing`
  MODIFY `id_testing` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
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
