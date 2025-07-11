-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 10:52 AM
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
-- Database: `penggajian2`
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
(27, 'BESOK LIBUR', 'LIBURAN SEMESTERAN', '2024-01-02', 1704173461);

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
(11, 'Dokter Umum', '10000000', '750000', '500000'),
(12, 'Dokter Spesialis', '5000000', '300000', '300000'),
(13, 'Admin', '5000000', '500000', '300000'),
(16, 'Office boy', '9000000', '2000000', '0');

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
(62, '012024', '3663', 'Azhri Gans', 'Laki-laki', 'Dokter Umum', 13, 3330, 0),
(63, '012024', '3664', 'Azhri ganteng banget', 'Laki-laki', 'Dokter Umum', 0, 0, 0),
(64, '012024', '3659', 'Irsyad Amien', 'Laki-laki', 'Office boy', 0, 0, 0),
(65, '012024', '3660', 'Najdah Ibtisamah Safira Alifah', 'Perempuan', 'Dokter Spesialis', 0, 0, 0),
(66, '012024', '3662', 'Pangad Eko Putra', 'Laki-laki', 'Admin', 0, 0, 0),
(67, '012024', '3661', 'Refy Fitriani Saputri', 'Perempuan', 'Admin', 0, 0, 0),
(68, '122023', '3663', 'Azhri Gans', 'Laki-laki', 'Dokter Umum', 0, 0, 8),
(69, '122023', '3664', 'Azhri ganteng banget', 'Laki-laki', 'Dokter Umum', 0, 0, 0),
(70, '122023', '3659', 'Irsyad Amien', 'Laki-laki', 'Office boy', 0, 0, 0),
(71, '122023', '3660', 'Najdah Ibtisamah Safira Alifah', 'Perempuan', 'Dokter Spesialis', 0, 0, 0),
(72, '122023', '3662', 'Pangad Eko Putra', 'Laki-laki', 'Admin', 0, 0, 0),
(73, '122023', '3661', 'Refy Fitriani Saputri', 'Perempuan', 'Admin', 0, 0, 0),
(74, '012024', '3665', 'Rizky', 'Laki-laki', 'Dokter Umum', 20, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `no_telepon` varchar(120) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(60) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `no_telepon`, `alamat`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `foto`) VALUES
(0, '3658', 'Ryan Alfaret Hidayah', '0808080808080', 'Bonang', 'Laki-laki', 'IT Developer', '2020-06-08', 'Pegawai Tidak Tetap', ''),
(0, '3659', 'Irsyad Amien', '08090908', 'Bintaro', 'Laki-laki', 'Office boy', '2024-01-02', 'Pegawai Tidak Tetap', ''),
(0, '3660', 'Najdah Ibtisamah Safira Alifah', '09091212', 'Alsut', 'Perempuan', 'Dokter Spesialis', '2024-01-02', 'Pegawai Tidak Tetap', ''),
(0, '3661', 'Refy Fitriani Saputri', '121212', 'Pondok Kacang', 'Perempuan', 'Admin', '2023-12-04', 'Pegawai Tidak Tetap', ''),
(0, '3662', 'Pangad Eko Putra', '12121', 'Lengkong', 'Laki-laki', 'Admin', '2024-01-02', 'Pegawai Tidak Tetap', ''),
(0, '3663', 'Azhri Gans', '90190491094', 'Buaran 5', 'Laki-laki', 'Dokter Umum', '2024-01-02', 'Pegawai Tidak Tetap', ''),
(0, '3664', 'Azhri ganteng banget', '12345678', 'jl buaran jaya', 'Laki-laki', 'Dokter Umum', '2023-12-04', 'Pegawai Tetap', 'th_(1)1.jpg'),
(0, '3665', 'Rizky', '12121', 'Lengkong', 'Laki-laki', 'Dokter Umum', '2019-03-20', 'Pegawai Tetap', ''),
(0, '3666', 'Rizky', '12121', 'Lengkong', 'Laki-laki', 'Dokter Umum', '2018-01-07', 'Pegawai Tetap', ''),
(0, '3667', 'Rizky', '12121', 'Lengkong', 'Laki-laki', 'Dokter Umum', '2018-01-07', 'Pegawai Tetap', ''),
(0, '3668', 'Rizky', '12121', 'Lengkong', 'Laki-laki', 'Dokter Umum', '2018-01-07', 'Pegawai Tetap', ''),
(0, '3669', 'Rizky', '12121', 'Lengkong', 'Laki-laki', 'Dokter Umum', '2018-01-07', 'Pegawai Tetap', ''),
(0, '3670', 'Rizky', '12121', 'Lengkong', 'Laki-laki', 'Dokter Umum', '2018-01-07', 'Pegawai Tetap', ''),
(0, '3671', 'Rizky', '12121', 'Lengkong', 'Laki-laki', 'Dokter Umum', '2018-01-07', 'Pegawai Tetap', '');

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
(10, 'alfa', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(126) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(126) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `hak_akses`, `is_active`, `tanggal_input`) VALUES
(2, 'Ryan alfaret hidayah', 'ryanalfareth@gmail.com', 'pro1700544701.png', '$2y$10$JYfJAvYRGrVahg69WB33z.RdjrRMoFkxAjqjrfwYC9eFjo0.3H00u', 2, 1, 1700540437),
(3, 'wendy', 'wendy123@gmail.com', 'default.jpg', '$2y$10$2dNTX/xeQpDlOr6fr5NWyOOC4wDLy6sPJHQfr/IJQwUVbWd/o2yai', 2, 0, 1702471920),
(4, 'Muhammad Wendy', 'wendy.martadiandsyah75@gmail.com', 'default.jpg', '$2y$10$lHd1GvKTTIwmUCPI1Zi6p./MtXUX9F7SGxvX6tGkFY98boqjzdA3G', 1, 1, 1702635137),
(5, 'wend', 'martadiansyah89@gmail.com', 'default.jpg', '$2y$10$f/vX3hieuAaY0Z0NB3q2Uei6aFq9zv/0NuE7jcBlAEgGdSJwWu6z.', 1, 1, 1702643830),
(6, 'Muhammad Wendy Martadiansyah', '19220300@bsi.ac.id', 'userMuhammad_Wendy_Martadiansyah.png', '$2y$10$loISv2C1VO2wU4LwHJNpketRKcqzS7N7Wv/nDLsvhTz3hHc.sXEva', 1, 1, 1703424339),
(7, 'Muhammad Wendy Martadiansyah', 'wendy.diansyah94@gmail.com', 'userMuhammad_Wendy_Martadiansyah.png', '$2y$10$Jx7BPdbxzFHAgRDbO9/1ze0IJM.PeDmNs7DEKOwhDV28uk4tlUU/u', 1, 1, 1703506425),
(8, 'azri', 'azri123@gmail.com', 'default.jpg', '$2y$10$CD3dZe3J7yjulEF2JtSCNeKaBooMVdtf6.AVM/OHJCgJvX0fU4YNm', 1, 1, 1703507029),
(9, 'pangad tampan', 'pangad123@gmail.com', 'anya.jpg', '$2y$10$fWa2Vea/g8ThFzDim8Il/O83XoWulFqfgYTtnv9gwJc/RGD9Yetnq', 1, 1, 1703507340),
(10, 'Muhammad Wendy Martadiansyah', 'wendy94@gmail.com', 'userMuhammad_Wendy_Martadiansyah.png', '$2y$10$meCASMoCsmUz/iksvDE3yuwvX5GEAaM88PZN7DR6A81a.Wk.9LB6a', 2, 1, 1703514923),
(11, 'Muhammad Wendy Martadiansyah', 'diansyah94@gmail.com', 'userMuhammad_Wendy_Martadiansyah.png', '$2y$10$uCzqt4aHAIWhUqJq.d9WneFhFaxq/9t6Z0h7LaUWoA3QpIMxe2aXq', 1, 1, 1703602603),
(12, 'admin', 'admin@gmail.com', 'useradmin.jpeg', '$2y$10$WSL1XaXL5ARMfWJSdadjk.EMbmxUvsNKzZ9sqknhl1Z1hEdn607.u', 1, 1, 1704172451);

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
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
