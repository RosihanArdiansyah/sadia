-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 05:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `category_code` varchar(256) DEFAULT NULL,
  `category_price` int(100) DEFAULT NULL,
  `category_sum` int(100) DEFAULT NULL,
  `category_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_code`, `category_price`, `category_sum`, `category_date`) VALUES
(3, 'Jersey home', 'Anfield1', 1, 14, '2022-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_navbar`
--

CREATE TABLE `tbl_navbar` (
  `navbar_id` int(11) NOT NULL,
  `navbar_name` varchar(50) DEFAULT NULL,
  `navbar_slug` varchar(200) DEFAULT NULL,
  `navbar_direct` enum('Y','N') DEFAULT 'N',
  `navbar_parent_id` int(11) DEFAULT 0,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_navbar`
--

INSERT INTO `tbl_navbar` (`navbar_id`, `navbar_name`, `navbar_slug`, `navbar_direct`, `navbar_parent_id`, `urutan`) VALUES
(1, 'Halaman Depan', '', 'N', 0, 0),
(2, 'Profil LPMP', '', 'N', 0, 0),
(3, 'Informasi', 'berita', 'N', 0, 0),
(4, 'Survey', '#', 'N', 0, 0),
(5, 'Berita', 'berita', 'N', 3, 0),
(10, 'Artikel', 'artikel', 'N', 3, 0),
(12, 'Sejarah LPMP SULSEL', 'page/sejarah-lpmp-sulawesi-selatan', 'N', 2, 0),
(13, 'Visi Dan Misi', 'page/visi-dan-misi', 'N', 2, 0),
(15, 'Struktur Organisasi', 'page/struktur-organisasi', 'N', 2, 0),
(17, 'Tupoksi', 'page/tupoksi', 'N', 2, 0),
(18, 'Fasilitas', 'page/fasilitas', 'N', 2, 0),
(19, 'SAKIP', 'page/sakip', 'N', 2, 0),
(20, 'Layanan Publik', '#', 'N', 0, 0),
(21, 'ULT', 'http://ult.kemdikbud.go.id', 'Y', 20, 1),
(22, 'Form 02 Permohonan Info Sulsel', 'https://lpmpsulsel.kemdikbud.go.id/assets/document/Form-02-permohonan-info-sulsel.doc', 'Y', 20, 3),
(23, 'Form 05 Permohonan Informasi Sulsel', 'https://lpmpsulsel.kemdikbud.go.id/assets/document/form-05-pernyataan-pemohon-informasi-sulsel.rtf', 'Y', 20, 4),
(24, 'Pranala', 'http://www.pranala.web.id', 'Y', 0, 0),
(33, 'Katalog', 'https://perpus-lpmpsulsel.kemdikbud.go.id', 'Y', 0, 0),
(34, 'Galeri', '', 'N', 0, 0),
(36, 'Tautan', '', 'N', 0, 0),
(37, 'Foto', 'album', 'N', 34, 0),
(38, 'Video', '', 'N', 34, 0),
(39, 'Whistleblowing System', 'page/whistleblowing-system', 'N', 36, 0),
(40, 'Lapor Aduan Online', 'page/layanan-aspirasi-dan-pengaduan-online-rakyat', 'N', 36, 0),
(41, 'Pengumuman', 'pengumuman', 'N', 3, 0),
(42, 'Buletin / Jurnal', 'buletin', 'N', 3, 0),
(43, 'Survei Layanan Informasi Laman', 'https://docs.google.com/forms/d/e/1FAIpQLSfP0KvjOcwXCOxT9sJc5nEfE3N2dl7v5V0067fjhaHLB5NSVQ/viewform', 'Y', 4, 0),
(44, 'Survey Integritas Jabatan', 'https://docs.google.com/forms/d/1Ik1Ogt1TLUzYe5rDa6ZG0VCqzZ6YHOfBCSiT1FpEuq0/viewform?edit_requested=true', 'Y', 4, 0),
(45, 'SOP ULT SULSEL 2018', 'https://lpmpsulsel.kemdikbud.go.id/assets/document/SOP-ULT-lpmpsulsel-2018.doc', 'Y', 20, 5),
(46, 'Kegiatan', 'agenda', 'N', 3, 0),
(47, 'Kontak', 'page/kontak', 'N', 2, 0),
(48, 'Lapor Gratifikasi', 'page/lapor-gratifikasi', 'N', 36, 0),
(49, 'Posko Pengaduan Itjen Kemdikbud', 'page/posko-pengaduan-itjen-kemdikbud', 'N', 36, 0),
(50, 'JDIH Kemdikbud', 'https://jdih.kemdikbud.go.id/', 'Y', 36, 0),
(52, 'E-SKP Kemdikbud', 'http://skp.sdm.kemdikbud.go.id/skp/site/login.jsp', 'Y', 36, 0),
(53, 'Sisfo Kehadiran', 'http://kehadiran.kemdikbud.go.id/', 'Y', 36, 0),
(54, 'STANDAR PELAYANAN 2020', 'https://lpmpsulsel.kemdikbud.go.id/assets/document/SP2020.pdf', 'Y', 20, 6),
(55, 'FORM 01 DAFTAR TAMU LPMP SULSEL', 'https://lpmpsulsel.kemdikbud.go.id/assets/document/Form-01-01-Daftar-Tamu-lpmp-sulsel.docx', 'Y', 20, 7),
(60, 'Laporan Kinerja ULT', 'page/info-grafis-ult', 'N', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `post_title` text COLLATE latin1_general_ci NOT NULL,
  `post_category_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post_user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_last_update` datetime DEFAULT NULL,
  `post_sum` int(100) NOT NULL DEFAULT 1,
  `post_tags` text COLLATE latin1_general_ci DEFAULT NULL,
  `post_status` int(3) DEFAULT 0,
  `post_acc` int(3) NOT NULL DEFAULT 0,
  `post_description` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `post_title`, `post_category_id`, `post_date`, `post_user_id`, `post_last_update`, `post_sum`, `post_tags`, `post_status`, `post_acc`, `post_description`) VALUES
(1, 'anu', 3, '2022-02-03 11:22:14', 2, NULL, 1, 'Lusin', 1, 0, 'beli anu'),
(2, 'anu', 3, '2022-02-03 11:22:14', 1, NULL, 1, 'Lusin', 0, 0, 'beli anu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rents`
--

CREATE TABLE `tbl_rents` (
  `rent_id` int(11) UNSIGNED NOT NULL,
  `rent_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `rent_date` datetime NOT NULL DEFAULT current_timestamp(),
  `rent_user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `rent_last_update` datetime DEFAULT NULL,
  `rent_sum` int(100) NOT NULL DEFAULT 1,
  `rent_tags` text COLLATE latin1_general_ci DEFAULT NULL,
  `rent_status` int(3) DEFAULT NULL,
  `rent_acc` int(3) NOT NULL DEFAULT 0,
  `rent_description` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_rents`
--

INSERT INTO `tbl_rents` (`rent_id`, `rent_name`, `rent_date`, `rent_user_id`, `rent_last_update`, `rent_sum`, `rent_tags`, `rent_status`, `rent_acc`, `rent_description`) VALUES
(1, 'anu', '2022-02-03 11:22:14', 2, NULL, 1, 'Lusin', 1, 0, 'beli anu'),
(2, 'anu', '2022-02-03 11:22:14', 1, NULL, 1, 'Lusin', 0, 0, 'beli anu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`room_id`, `room_name`) VALUES
(1, 'Anu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`tag_id`, `tag_name`) VALUES
(1, 'Lusin'),
(2, 'Gross'),
(3, 'Kodi'),
(4, 'Rim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_level` varchar(10) DEFAULT NULL,
  `user_room_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_status` varchar(10) DEFAULT '1',
  `user_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `user_room_id`, `user_status`, `user_photo`) VALUES
(1, 'Jurgen Klopp', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', 1, '1', 'f2a5c4c75207ab21a3d1d336078b44ea.jpg'),
(2, 'Sadio Mane', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', 1, '1', '4d17db079a45e1e7346e8ce84f72e9f0.jpg'),
(3, 'FSG', 'lead@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3', 1, '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_navbar`
--
ALTER TABLE `tbl_navbar`
  ADD PRIMARY KEY (`navbar_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `idx_catid` (`post_category_id`),
  ADD KEY `idx_createdby` (`post_user_id`);

--
-- Indexes for table `tbl_rents`
--
ALTER TABLE `tbl_rents`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `idx_createdby` (`rent_user_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `room_id` (`user_room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_navbar`
--
ALTER TABLE `tbl_navbar`
  MODIFY `navbar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rents`
--
ALTER TABLE `tbl_rents`
  MODIFY `rent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
