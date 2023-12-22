-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 09:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `tanggal` date NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `judul`, `deskripsi`, `tanggal`, `date_created`) VALUES
(24, 'Kenaikan gaji', 'Honor petugas dengan 2 tahun bekerja naik 0.1%', '2023-12-17', 1702942102),
(25, 'Jam shift malam', 'Shift malam dimulai pukul 18.00 PM', '2023-12-18', 1702942164);

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(125) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(11, 'Dokter', '10000000', '750000', '500000'),
(12, 'Staff', '5000000', '300000', '300000'),
(13, 'Admin', '5000000', '500000', '300000'),
(14, 'IT Developer', '10000000', '1000000', '500000'),
(15, 'Ceo', '20000000', '2000000', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alfa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alfa`) VALUES
(53, '122022', '12345', 'Muhammad Wendy Martadiansyah', 'Laki-laki', 'Ceo', 20, 0, 0),
(54, '122023', '12345', 'Muhammad Wendy Martadiansyah', 'Laki-laki', 'Ceo', 25, 0, 0),
(55, '122023', '123456', 'Najdah Ibtisamah Safira Alifah', 'Perempuan', 'Staff', 25, 0, 0),
(56, '122023', '1212', 'Ryan Alfaret Hidayah', 'Laki-laki', 'IT Developer', 25, 0, 0),
(57, '122022', '123456', 'Najdah Ibtisamah Safira Alifah', 'Perempuan', 'Staff', 23, 2, 5),
(58, '122022', '1212', 'Ryan Alfaret Hidayah', 'Laki-laki', 'IT Developer', 20, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(60) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `email`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `foto`, `role`) VALUES
(18, '12345', 'Muhammad Wendy Martadiansyah', '', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', 'Ceo', '2020-03-02', 'Pegawai Tetap', '', 0),
(19, '123456', 'Najdah Ibtisamah Safira Alifah', '', '', 'Perempuan', 'Staff', '2022-01-03', 'Pegawai Tidak Tetap', '', 2),
(20, '1212', 'Ryan Alfaret Hidayah', '', '', 'Laki-laki', 'IT Developer', '2023-01-09', 'Pegawai Tetap', '', 0),
(21, '124589001', 'Refy Fitriani Saputri', '', '', 'Perempuan', 'Admin', '2023-06-05', 'Pegawai Tetap', '', 1),
(22, '12121', 'Irsyad Amien', '', 'd9b1d7db4cd6e70935368a1efb10e377', 'Laki-laki', 'IT Developer', '2023-05-08', 'Pegawai Tetap', '', 2),
(23, '1212121', 'Alfie Hamzami ', 'alfieH', 'e10adc3949ba59abbe56e057f20f883e', 'Laki-laki', 'Dokter', '2023-01-09', 'Pegawai Tetap', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `announcement_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `announcement_content`) VALUES
(1, 'wkwkkwkwkwkw'),
(2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(5, 'Alfa', 250000),
(9, 'Sakit', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `hak_akses`) VALUES
(1, 'administrator', 0),
(2, 'pegawai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(126) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(126) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(126) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(2, 'Ryan alfaret hidayah', 'ryanalfareth@gmail.com', 'pro1700544701.png', '$2y$10$JYfJAvYRGrVahg69WB33z.RdjrRMoFkxAjqjrfwYC9eFjo0.3H00u', 2, 1, 1700540437),
(3, 'wendy', 'wendy123@gmail.com', 'default.jpg', '$2y$10$2dNTX/xeQpDlOr6fr5NWyOOC4wDLy6sPJHQfr/IJQwUVbWd/o2yai', 2, 0, 1702471920),
(4, 'Muhammad Wendy', 'wendy.martadiandsyah75@gmail.com', 'default.jpg', '$2y$10$lHd1GvKTTIwmUCPI1Zi6p./MtXUX9F7SGxvX6tGkFY98boqjzdA3G', 1, 1, 1702635137),
(5, 'wend', 'martadiansyah89@gmail.com', 'default.jpg', '$2y$10$f/vX3hieuAaY0Z0NB3q2Uei6aFq9zv/0NuE7jcBlAEgGdSJwWu6z.', 1, 1, 1702643830);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
