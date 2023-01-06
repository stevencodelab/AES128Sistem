-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2023 pada 14.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aesdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `file_name_source` varchar(255) DEFAULT NULL,
  `file_name_finish` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `tgl_upload` timestamp NULL DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `namalengkap` varchar(50) DEFAULT NULL,
  `statuslogin` varchar(50) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `lastactive` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','2') DEFAULT NULL,
  `alamat` text NOT NULL,
  `level` varchar(25) NOT NULL,
  `jenkel` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `namalengkap`, `statuslogin`, `waktu`, `lastactive`, `status`, `alamat`, `level`, `jenkel`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Steven Morison', 'Admin', '2022-11-10', '2023-01-06 13:27:24', '1', 'Ngemplak, Nganti, RT 04/RW 08, Sendangadi, Mlati, Sleman, Yogyakarta', 'Admin', 'Laki-Laki'),
('pihak 1', 'ee11cbb19052e40b07aac0ca060c23ee', 'Pengguna 1', 'Pihak 1', '2022-12-23', '2023-01-05 19:22:14', '2', 'BANTUL', 'User', 'Laki-Laki'),
('pihak 2', 'ee11cbb19052e40b07aac0ca060c23ee', 'Pengguna 2', 'Pihak 2', '2022-12-29', '2022-12-29 10:09:12', '2', 'SLEMAN', 'User', 'Laki-Laki');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
