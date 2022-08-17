-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2022 at 06:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administrasi_ku`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_cabang`
--

CREATE TABLE `data_cabang` (
  `cabang_id` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `foto_cabang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_cabang`
--

INSERT INTO `data_cabang` (`cabang_id`, `nama_cabang`, `alamat`, `kecamatan_id`, `username`, `password`, `level`, `foto_cabang`) VALUES
(19, 'Cabang Kraksaan', 'kraksaan', 1, 'kraksaan', 'kraksaan', 1, '6e4dc40bf3c5144c6b75e9a2f0df9665.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_kecamatan`
--

CREATE TABLE `data_kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kecamatan`
--

INSERT INTO `data_kecamatan` (`kecamatan_id`, `nama_kecamatan`, `keterangan`) VALUES
(1, 'Kraksaan', ''),
(2, 'Pajarakan', ''),
(3, 'Besuk', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_kegiatan`
--

CREATE TABLE `data_kegiatan` (
  `kegiatan_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tempat` text NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `foto_kegiatan` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kegiatan`
--

INSERT INTO `data_kegiatan` (`kegiatan_id`, `nama_kegiatan`, `tempat`, `tgl`, `cabang_id`, `foto_kegiatan`, `user_id`, `keterangan`) VALUES
(4, 'olahraga bersama bareng', 'pantai duta', '2021-07-28', 19, 'e627ba501ad9e1c027b8e007e49db878.jpg', 19, ''),
(6, 'Rapat Anggota', 'Kantor Wangkal', '2022-08-12', 19, '34.jpg', 19, ''),
(7, 'Rapat Anggota', 'Kantor Wangkal', '2022-08-12', 19, '35.jpg', 19, ''),
(8, 'Rapat Persiapan Agustusan', 'Kantor Kraksaan', '2022-08-09', 19, 'rapat.jpg', 19, 'Rapat ini membahas Kegiatan - Kegiatan yang akan dilaksanakan untuk menyambut HUT Kemerdekaan HUT RI ke 74, yaitu Perlombaan Olahraga Volly, Futsal, Bulu Tangkis, Tenis Meja, Gaple; Lomba Tradisional Balap Karung, Makan Kerupuk, Kelereng; Tabur Bunga di Taman Makam Pahlawan; juga Upacara HUT RI dan Pemberian Remisi. '),
(9, 'Bersih Bersih', 'Kantor Kraksaan', '2022-08-15', 19, 'kegiatan1.jpg', 19, ''),
(10, 'Rapat', 'Paiton', '2022-12-12', 19, '89d50c2df4689cbfb19aecb374014b4e.jpg', 0, ''),
(11, 'Upacara 17 Agustus', 'Lapangan Gading', '2022-08-17', 19, 'kegiatan2.jpg', 19, 'Dalam rangka memperingati HUT ke-77 RI, dengan tema \"Pulih Lebih Cepat, Bangkit Lebih Kuat\", mari kita kita wujudkan Indonesia menjadi negara yang kuat, tumbuh dan berkembang cepat, memperkuat ketahanan nasional untuk menghadapi tantangan global.');

-- --------------------------------------------------------

--
-- Table structure for table `data_keluar`
--

CREATE TABLE `data_keluar` (
  `keluar_id` int(11) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cabang_id` int(11) DEFAULT NULL,
  `sifat_id` int(11) DEFAULT NULL,
  `perihal_id` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `berkas_keluar` varchar(100) DEFAULT NULL,
  `status_keluar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_keluar`
--

INSERT INTO `data_keluar` (`keluar_id`, `no_surat`, `tgl_keluar`, `user_id`, `cabang_id`, `sifat_id`, `perihal_id`, `isi`, `berkas_keluar`, `status_keluar`) VALUES
(20, 'SKJ/MTP/18/003', '2021-07-28', 17, 19, 7, 6, 'dfsfsf', '03fd78e64b7a60333512e746406588e7.jpg', 2),
(21, 'SKJ/MTP/18/00676', '2021-07-28', 18, 18, 7, 6, 'greyerye', 'f61172e5698a337c5ef898266fdfd7f3.jpg', 2),
(23, 'SKJ/MTP/18/003', '2021-07-28', 19, 19, 7, 7, 'Dengan hormat,\n\nSehubungan dengan kegiatan Rapat Anggota, yang akan kami laksanakan pada:\n\nHari/Tanggal   :  Senin / 05 - 08 - 2021        \n\nWaktu              : 08:00         \n\nTempat            : Kantor IPNU Kec. Gading        \n\nmaka dengan ini kami ingin memberitahukan perihal kegiatan tersebut kepada segenap Anggota Cabang Kraksaan, sekaligus untuk meminta izin perihal keamanan agar kegiatan yang akan kami laksanakan tersebut bisa berjalan dengan lancar dan sesuai dengan rencana.\n\nDemikian surat pemberitahuan kegiatan ini kami beritahukan, atas perhatian dan izin Cabang Kraksaan, kami ucapkan terimakasih.', '33.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_masuk`
--

CREATE TABLE `data_masuk` (
  `masuk_id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sifat_id` int(11) NOT NULL,
  `perihal_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_masuk`
--

INSERT INTO `data_masuk` (`masuk_id`, `no_surat`, `tgl_masuk`, `cabang_id`, `user_id`, `sifat_id`, `perihal_id`, `isi`, `berkas`, `status`) VALUES
(17, 'SKJ/MTP/18/003', '2021-07-28', 18, 17, 7, 6, 'dfsfsf', '03fd78e64b7a60333512e746406588e7.jpg', 2),
(18, 'SKJ/MTP/18/00676', '2021-07-28', 17, 18, 7, 6, 'greyerye', 'f61172e5698a337c5ef898266fdfd7f3.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_perihal`
--

CREATE TABLE `data_perihal` (
  `perihal_id` int(11) NOT NULL,
  `nama_perihal` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_perihal`
--

INSERT INTO `data_perihal` (`perihal_id`, `nama_perihal`, `keterangan`) VALUES
(6, 'Rapat', 'menghadiri undangan'),
(7, 'Normal', 'Biasa biasa saja\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `data_sifat`
--

CREATE TABLE `data_sifat` (
  `sifat_id` int(11) NOT NULL,
  `nama_sifat` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sifat`
--

INSERT INTO `data_sifat` (`sifat_id`, `nama_sifat`, `keterangan`) VALUES
(7, 'Sangat Penting', 'untuk pertemuan'),
(8, 'Tidak Penting', 'Biasa saja');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `user_id` int(11) NOT NULL,
  `cabang_id` int(11) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1.admin 2.petugas 3.nasabah'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`user_id`, `cabang_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(18, 19, 'kraksaan', 'kraksaan', 'Cabang Kraksaan', 'kraksaan', 1),
(19, 19, 'eko', 'eko', 'Eko Wahyudi P', 'wangkal', 2),
(20, 19, 'rizal', 'rizal', 'rizal Fahrizi', 'wangkal', 2),
(21, 19, 'putri', 'putri', 'Putri Silviani', 'Sidomukti', 2),
(22, 19, 'iqbal', 'iqbal', 'Iqbal Maulana', 'Genggong', 2),
(23, 19, 'samsuddin', 'samsuddin', 'Gus Samsuddin', 'Gading', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_cabang`
--
ALTER TABLE `data_cabang`
  ADD PRIMARY KEY (`cabang_id`);

--
-- Indexes for table `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indexes for table `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  ADD PRIMARY KEY (`kegiatan_id`);

--
-- Indexes for table `data_keluar`
--
ALTER TABLE `data_keluar`
  ADD PRIMARY KEY (`keluar_id`);

--
-- Indexes for table `data_masuk`
--
ALTER TABLE `data_masuk`
  ADD PRIMARY KEY (`masuk_id`);

--
-- Indexes for table `data_perihal`
--
ALTER TABLE `data_perihal`
  ADD PRIMARY KEY (`perihal_id`);

--
-- Indexes for table `data_sifat`
--
ALTER TABLE `data_sifat`
  ADD PRIMARY KEY (`sifat_id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_cabang`
--
ALTER TABLE `data_cabang`
  MODIFY `cabang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  MODIFY `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  MODIFY `kegiatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_keluar`
--
ALTER TABLE `data_keluar`
  MODIFY `keluar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `data_masuk`
--
ALTER TABLE `data_masuk`
  MODIFY `masuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `data_perihal`
--
ALTER TABLE `data_perihal`
  MODIFY `perihal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_sifat`
--
ALTER TABLE `data_sifat`
  MODIFY `sifat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
