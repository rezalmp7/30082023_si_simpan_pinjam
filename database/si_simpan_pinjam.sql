-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 12, 2025 at 03:17 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_simpan_pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(255) NOT NULL,
  `id_nasabah` int(255) NOT NULL,
  `id_pinjaman` int(255) NOT NULL,
  `tgl_angsuran` date NOT NULL,
  `nominal_angsuran` bigint(20) NOT NULL,
  `tahap_angsuran` int(255) NOT NULL,
  `terlambat` int(255) NOT NULL,
  `denda` bigint(20) NOT NULL,
  `total_bayar` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_nasabah`, `id_pinjaman`, `tgl_angsuran`, `nominal_angsuran`, `tahap_angsuran`, `terlambat`, `denda`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2003-03-02', 140000, 1, 0, 0, 140000, '2025-05-12 03:16:08', '2025-05-12 03:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(255) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `jml_tabungan` bigint(20) NOT NULL,
  `jml_angsuran` bigint(20) NOT NULL,
  `jml_pinjaman` bigint(20) NOT NULL,
  `biaya_lain` bigint(20) NOT NULL,
  `pemasukan` bigint(20) NOT NULL,
  `pengeluaran` bigint(20) NOT NULL,
  `total_pendapatan` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_manager` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id_manager`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'manager', '1d0258c2440a8d19e716292b231e3190', '2025-05-12 02:47:55', '2025-05-12 02:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(255) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `almt_nasabah` text,
  `tmpt_lhr_nasabah` text,
  `tgl_lhr_nasabah` date DEFAULT NULL,
  `tlp_nasabah` varchar(15) DEFAULT NULL,
  `no_ktp_nasabah` text,
  `email_nasabah` text,
  `stts_kwn_nasabah` int(255) DEFAULT NULL,
  `pekerjaan_nasabah` text,
  `nm_prshaan_nasabah` text,
  `almt_prshaan_nasabah` text,
  `foto` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama`, `username`, `password`, `almt_nasabah`, `tmpt_lhr_nasabah`, `tgl_lhr_nasabah`, `tlp_nasabah`, `no_ktp_nasabah`, `email_nasabah`, `stts_kwn_nasabah`, `pekerjaan_nasabah`, `nm_prshaan_nasabah`, `almt_prshaan_nasabah`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Nasabah', 'nasabah', '3021bbb509429dde8ad1fc522448d56c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-12 03:00:13', '2025-05-12 03:00:13'),
(2, 'Ani', 'ani', '29d1e2357d7c14db51e885053a58ec67', 'Semarang', 'Semarang', '1998-03-11', '087721191222', '331231223110002', 'ani@gmail.com', 0, 'Wiraswasta', 'PT Andi', 'Semarang', 'hanandito-adi-kieIGjdPTno-unsplash.jpg', '2025-05-12 03:13:06', '2025-05-12 03:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(255) NOT NULL,
  `id_nasabah` int(255) NOT NULL,
  `nominal_penarikan` bigint(20) NOT NULL,
  `tgl_penarikan` date NOT NULL,
  `jns_tabungan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `id_nasabah`, `nominal_penarikan`, `tgl_penarikan`, `jns_tabungan`, `created_at`, `updated_at`) VALUES
(1, 2, 2000000, '2014-04-11', 'Si Suka', '2025-05-12 03:13:34', '2025-05-12 03:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(255) NOT NULL,
  `id_nasabah` int(255) NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `jangka_pinjaman` int(255) NOT NULL,
  `nominal_pinjaman` bigint(20) NOT NULL,
  `bunga` bigint(20) NOT NULL,
  `foto` text NOT NULL,
  `nominal_angsuran` bigint(20) NOT NULL,
  `nominal_setuju` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_nasabah`, `tgl_pinjaman`, `jangka_pinjaman`, `nominal_pinjaman`, `bunga`, `foto`, `nominal_angsuran`, `nominal_setuju`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2003-02-01', 12, 20000000, 12, '1747019654.jpg', 125000, 1500000, 0, '2025-05-12 03:14:14', '2025-05-12 03:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(255) NOT NULL,
  `id_nasabah` int(255) NOT NULL,
  `nominal_tabungan` bigint(20) NOT NULL,
  `tgl_tabungan` bigint(20) NOT NULL,
  `jns_tabungan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teller`
--

CREATE TABLE `teller` (
  `id_manager` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teller`
--

INSERT INTO `teller` (`id_manager`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Teller', 'teller', '8482dfb1bca15b503101eb438f52deed', '2025-05-12 02:47:55', '2025-05-12 02:50:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indexes for table `teller`
--
ALTER TABLE `teller`
  ADD PRIMARY KEY (`id_manager`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teller`
--
ALTER TABLE `teller`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
