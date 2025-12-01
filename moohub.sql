-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 05:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moohub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$TKh8H1.PBktLSDWqglNOHe.PjG0KfQw2fytZj5uyv0/jY5Rz3Up.G'),
(4, 'admin2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `penulis`, `tanggal`) VALUES
(1, 'Peluncuran Moohub v2.0', 'Moohub resmi meluncurkan versi terbaru dengan fitur katalog layanan dinamis dan desain responsif.', 'Admin Moohub', '2025-12-01 21:46:39'),
(2, 'Tips Optimasi Website 2025', 'Pelajari strategi terbaru untuk meningkatkan performa website bisnis Anda di era mobile-first.', 'Tech Team', '2025-11-29 21:46:39'),
(3, 'Peluncuran Moohub v2.0', 'Moohub resmi meluncurkan versi terbaru dengan fitur katalog layanan dinamis dan desain responsif.', 'Admin Moohub', '2025-12-01 21:47:07'),
(4, 'Tips Optimasi Website 2025', 'Pelajari strategi terbaru untuk meningkatkan performa website bisnis Anda di era mobile-first.', 'Tech Team', '2025-11-29 21:47:07'),
(5, 'Peluncuran Moohub v2.0', 'Moohub resmi meluncurkan versi terbaru dengan fitur katalog layanan dinamis dan desain responsif.', 'Admin Moohub', '2025-12-01 21:47:24'),
(6, 'Tips Optimasi Website 2025', 'Pelajari strategi terbaru untuk meningkatkan performa website bisnis Anda di era mobile-first.', 'Tech Team', '2025-11-29 21:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `nama`, `deskripsi`, `urutan`, `aktif`) VALUES
(1, 'Digital Marketing', 'Google Ads, Facebook Ads, SEO organik untuk tingkatkan traffic & konversi penjualan', 2, 1),
(2, 'Mobile App Development', 'Aplikasi Android & iOS native dengan UI/UX premium dan integrasi backend lengkap', 3, 1),
(3, 'Branding & Logo Design', 'Identitas visual profesional yang kuat dan memorable untuk brand Anda', 4, 1),
(4, 'E-commerce Solution', 'Toko online lengkap dengan payment gateway, stok, dan pengiriman terintegrasi', 5, 1),
(5, 'IT Consulting', 'Konsultasi sistem IT, cybersecurity, cloud migration, dan transformasi digital', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
