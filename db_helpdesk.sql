-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2022 pada 06.04
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_depart` int(11) NOT NULL,
  `nama_depart` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_depart`, `nama_depart`) VALUES
(1, 'Accounting'),
(2, 'Admin Staff'),
(3, 'Finance'),
(4, 'HRD'),
(5, 'Marketing'),
(6, 'IT'),
(7, 'Maintenance'),
(8, 'PPJK'),
(9, 'Production'),
(10, 'Purchasing'),
(11, 'PPIC'),
(12, 'TAX'),
(13, 'QA'),
(14, 'QC'),
(15, 'Warehouse');

-- --------------------------------------------------------

--
-- Struktur dari tabel `helpdesk`
--

CREATE TABLE `helpdesk` (
  `id_help` int(11) NOT NULL,
  `no_tiket` varchar(100) NOT NULL,
  `lokasi` varchar(15) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `depart` varchar(225) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `deskrip1` varchar(225) NOT NULL,
  `deskrip2` varchar(225) NOT NULL,
  `deskrip3` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `opened` datetime DEFAULT NULL,
  `closed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Kantor Pusat'),
(2, 'Kantor Cabang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `divisi` varchar(225) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1. Administrator 2. Team 3. Pimpinan 4. User',
  `image` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `divisi`, `lokasi`, `level`, `image`, `date_created`) VALUES
(1, 'Administrator', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 'IT', 'Kantor Pusat', 1, 'default.png', '2022-08-04 10:59:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_depart`);

--
-- Indeks untuk tabel `helpdesk`
--
ALTER TABLE `helpdesk`
  ADD PRIMARY KEY (`id_help`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_depart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `helpdesk`
--
ALTER TABLE `helpdesk`
  MODIFY `id_help` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
