-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2022 pada 11.11
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
(1, 'Accouting'),
(2, 'Admin Staff'),
(3, 'Factory Manager'),
(4, 'Finance'),
(5, 'Fishmeal'),
(6, 'IT'),
(7, 'HRD'),
(8, 'Marketing'),
(9, 'Maintenance'),
(10, 'PPJK'),
(11, 'Production'),
(12, 'Purchasing'),
(13, 'PPIC'),
(14, 'Pouch'),
(15, 'TAX'),
(16, 'QA'),
(17, 'QC'),
(18, 'Warehouse');

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
  `username` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `helpdesk`
--

INSERT INTO `helpdesk` (`id_help`, `no_tiket`, `lokasi`, `nama_user`, `depart`, `jenis`, `deskrip1`, `deskrip2`, `username`, `status`, `created`, `updated`) VALUES
(1, 'IT2201170001', 'PBN HO', 'Bu Linda', 'Finance', 'Request', 'Pengecekan File Excel laporan error pada saat dibuka', 'Sudah selesai', 'Winarto', 'Close', '2022-01-17 09:28:26', '2022-01-17 17:26:38'),
(2, 'IT2201170002', 'PSFI', 'Bu Acen', 'Accouting', 'Problem', 'Laptop tidak dapat IP address', 'install ulang driver network', 'Syuhada', 'Close', '2022-01-17 09:46:39', '2022-01-21 10:45:48'),
(3, 'IT2201170003', 'PBN HO', 'Ika', 'Marketing', 'Problem', 'Email bermasalah', 'User lupa \"Yes\" certificate', 'Syuhada', 'Close', '2022-01-17 09:47:54', '2022-01-17 09:56:42'),
(4, 'IT2201170004', 'PBN HO', 'Tika', 'Accouting', 'Request', 'Keyboard tidak berfungsi dengan normal', 'Mengganti keyboard', 'Daniel', 'Close', '2022-01-17 10:44:52', '2022-01-17 10:46:10'),
(5, 'IT2201170005', 'PBN Factory', 'Wafa Nadia', 'Production', 'Request', 'PC Disconnect network', '- instal ulang driver network', 'Heriyanto', 'Close', '2022-01-17 13:06:10', '2022-01-17 13:06:59'),
(6, 'IT2201170006', 'PBN Factory', 'Dinda', 'HRD', 'Problem', 'PC SERING MATI MENDADAK', 'Ganti Power Supply', 'Heriyanto', 'Close', '2022-01-17 13:08:29', '2022-01-17 14:35:52'),
(7, 'IT2201170007', 'PBN Factory', 'Indah', 'QC', 'Request', 'setting wifi HP (HP sebelumnya ke reset)', 'oke', 'Heriyanto', 'Close', '2022-01-17 13:09:54', '2022-01-17 13:10:04'),
(8, 'IT2201170008', 'PBN Factory', 'Aida', 'Production', 'Problem', 'Timbangan Rusak', 'sudah oke', 'Heriyanto', 'Close', '2022-01-17 13:10:49', '2022-01-31 05:38:41'),
(9, 'IT2201170009', 'PBN Factory', 'Siti Nur', 'QA', 'Problem', 'Printer Disconnect', '- restart print spooler', 'Heriyanto', 'Close', '2022-01-17 13:11:37', '2022-01-17 13:33:35'),
(10, 'IT2201170010', 'PBN Factory', 'Nanda', 'QC', 'Problem', 'tidak bisa Print', 'oke', 'Heriyanto', 'Close', '2022-01-17 13:12:54', '2022-01-17 13:13:04'),
(11, 'IT2201170011', 'PBN HO', 'Liany', 'Marketing', 'Request', 'Scann di Printer L6190', 'Install driver printer', 'Syuhada', 'Close', '2022-01-17 13:44:03', '2022-01-17 13:55:42'),
(12, 'IT2201170012', 'PBN Factory', 'QA', 'QA', 'Request', 'Instal software Nitro', 'Ok', 'Heriyanto', 'Close', '2022-01-17 14:34:24', '2022-01-17 14:34:42'),
(13, 'IT2201170013', 'PBN Factory', 'Nanda', 'QC', 'Problem', 'PC bluescreen', 'Ganti kipas Fan', 'Heriyanto', 'Close', '2022-01-17 14:35:15', '2022-01-17 14:36:17'),
(14, 'IT2201170014', 'PBN Factory', 'Bu Aang', 'PPIC', 'Problem', 'PC tidak bisa masuk windows dan lemot', 'bersihkan tembaga VGA, RAM, sama Checking Disk win 7', 'Heriyanto', 'Close', '2022-01-17 14:35:51', '2022-01-17 14:37:08'),
(15, 'IT2201170015', 'PBN HO', 'April', 'Finance', 'Request', 'Perubahan PI', 'Sudah selesai', 'Syuhada', 'Close', '2022-01-17 15:18:33', '2022-01-17 16:24:20'),
(16, 'IT2201170016', 'PSFI', 'Putri', 'Admin Staff', 'Request', 'Upgrade PPH Pasal 4 ayat 2', 'Upgrade PPH Pasal 4 ayat 2', 'Daniel', 'Close', '2022-01-17 15:40:57', '2022-01-17 15:43:11'),
(17, 'IT2201170017', 'PSB', 'April', 'Finance', 'Problem', 'Akses data ke server \"Read Only\", seharusnya \"Full Akses\"', 'Close data file yang sedang dibuka di server', 'Daniel', 'Close', '2022-01-17 15:56:00', '2022-01-17 15:58:41'),
(18, 'IT2201170018', 'PBN HO', 'Bu Vienty', 'Finance', 'Problem', 'Koneksi ke server dan internet sering putus', 'Crimping ulang connector RJ45', 'Daniel', 'Close', '2022-01-17 16:52:27', '2022-01-17 16:53:09'),
(19, 'IT2201170019', 'PBN Factory', 'Bu Iis', 'HRD', 'Request', 'Setting Printer ke Pak sugi', 'oke', 'Heriyanto', 'Close', '2022-01-17 17:26:56', '2022-01-17 17:29:19'),
(20, 'IT2201170020', 'PBN Factory', 'Admin Staff', 'Admin Staff', 'Request', 'test Printer bekas Pak Ferly \r\nnoted : adaptor tidak ada yang cocok harus beli', 'Masih setting', 'Heriyanto', 'Close', '2022-01-17 17:28:09', '2022-01-17 17:28:44'),
(21, 'IT2201170021', 'PBN Factory', 'Bu Iis', 'HRD', 'Request', 'membuat sosialisasi vidio di layar kantin', 'video sudah oke', 'Heriyanto', 'Close', '2022-01-17 17:29:00', '2022-01-25 10:28:26'),
(22, 'IT2201180001', 'PBN Factory', 'Bu Mei', 'QC', 'Problem', 'Windows Corrupt tidak bisa masuk windows', '- repair windows\r\n- repair hdd', 'Heriyanto', 'Close', '2022-01-18 07:55:32', '2022-01-18 09:36:35'),
(23, 'IT2201180002', 'PBN HO', 'Vienty', 'Finance', 'Request', 'JValas tidak bisa connecting', 'Perbaikan dari sisi security jaringan BCA', 'Winarto', 'Close', '2022-01-18 08:37:04', '2022-01-19 13:20:50'),
(24, 'IT2201180003', 'PSFI', 'Bu Acen', 'Finance', 'Problem', 'Excel file data tertimpa', 'Sudah di backup', 'Winarto', 'Close', '2022-01-18 09:04:56', '2022-01-18 09:36:30'),
(25, 'IT2201180004', 'PBN HO', 'Adil', 'Marketing', 'Request', 'Install Mozila', 'Sudah terinstal', 'Winarto', 'Close', '2022-01-18 09:05:21', '2022-01-18 09:07:46'),
(26, 'IT2201180005', 'Samico', 'Admin', 'Warehouse', 'Problem', 'Printer error', 'sudah oke', 'Heriyanto', 'Close', '2022-01-18 11:24:28', '2022-01-27 10:31:03'),
(27, 'IT2201180006', 'PBN Factory', 'Pak Dede', 'Warehouse', 'Request', 'Req Pc baru > pemindahan PC lama d wirehouse ke pouch', 'Menunggu PC', 'Heriyanto', 'OPEN', '2022-01-18 11:25:43', '2022-01-18 17:50:43'),
(28, 'IT2201180007', 'PBN Factory', 'Dinda', 'HRD', 'Problem', 'Excel notresponding', 'ok', 'Heriyanto', 'Close', '2022-01-18 11:26:12', '2022-01-18 13:35:41'),
(29, 'IT2201180008', 'PBN Factory', 'Hrd', 'HRD', 'Request', 'Isi tinta & kalibrasi printer', 'OK', 'Heriyanto', 'Close', '2022-01-18 11:27:00', '2022-01-18 13:48:34'),
(30, 'IT2201180009', 'PBN HO', 'Albert', 'TAX', 'Request', 'Eksport data Accurate Samico ke Accurate Samico TAX', 'Eksport Data Accurate', 'Daniel', 'Close', '2022-01-18 11:30:24', '2022-01-18 11:31:16'),
(31, 'IT2201180010', 'PBN HO', 'Albert', 'TAX', 'Request', 'Eksport Data Accurate PSB ke PSB Tax', 'Eksport data Accurate', 'Daniel', 'Close', '2022-01-18 11:33:15', '2022-01-18 11:33:32'),
(32, 'IT2201180011', 'PBN HO', 'Jori', 'Marketing', 'Problem', 'Akses ke Liner agak lambat', 'Cek Virus di PC', 'Winarto', 'Close', '2022-01-18 11:48:27', '2022-01-18 11:49:03'),
(33, 'IT2201180012', 'PBN HO', 'Bambang', 'Marketing', 'Request', 'Pasang email di HP', 'sudah di setting email di HP', 'Winarto', 'Close', '2022-01-18 11:52:07', '2022-01-18 11:52:40'),
(34, 'IT2201180013', 'PBN HO', 'Vienty', 'Finance', 'Request', 'Permintaan Create Folder Asset untuk Asset Management', 'Sudah dibukakan Folder Asset di Server Akunting dan Akses ke folder Asset oleh Pak David, Bu Linda, Ricky, Vienty, dan Sonty', 'Winarto', 'Close', '2022-01-18 12:57:15', '2022-01-18 13:26:56'),
(35, 'IT2201180014', 'PSFI', 'Tasya', 'Finance', 'Request', 'Akses Edit tanggal di Accurate Samico Modul Sales dan Purchasing', 'Sudah dibukakan akes editing di Accurate SAMICO (Permintaan Lulu dan Tasya sudah di approve Ibu Acen', 'Winarto', 'Close', '2022-01-18 14:22:09', '2022-01-18 14:23:28'),
(36, 'IT2201180015', 'PBN Factory', 'QA', 'QA', 'Problem', 'PC LEMOT', 'DELETE PROGRAM YANG TIDAK TERPAKAI', 'Heriyanto', 'Close', '2022-01-18 14:47:42', '2022-01-18 14:48:06'),
(37, 'IT2201190001', 'PBN Factory', 'Eka', 'QA', 'Problem', 'email kena SPAM', '- Scan AV\r\n- info Pak Wins blok spam', 'Heriyanto', 'Close', '2022-01-19 08:07:25', '2022-01-19 11:01:54'),
(38, 'IT2201190002', 'PBN HO', 'Albert', 'TAX', 'Request', 'Transfer data Accurate PBN ke PBN TAX', 'Transfer data Accurate', 'Daniel', 'Close', '2022-01-19 09:42:55', '2022-01-19 09:43:50'),
(39, 'IT2201190003', 'PBN Factory', 'Muliya', 'Admin Staff', 'Request', 'setting wifi untuk meeting managament review', 'cancel', 'Heriyanto', 'Close', '2022-01-19 11:49:25', '2022-01-19 17:02:43'),
(40, 'IT2201190004', 'PBN Factory', 'Pak Dede', 'Maintenance', 'Problem', 'tidak bisa konek ke share', '- tarik kabel\r\n- info pak wins mac address', 'Heriyanto', 'Close', '2022-01-19 11:49:47', '2022-01-20 11:26:46'),
(41, 'IT2201190005', 'PBN Factory', 'Ibu Endang', 'QA', 'Request', 'Design logo untuk gelas PBN', 'sudah oke', 'Heriyanto', 'Close', '2022-01-19 11:50:23', '2022-01-19 16:59:59'),
(42, 'IT2201190006', 'PBN Factory', 'Anggi', 'QC', 'Problem', 'PC mati', '- ganti kabel sata hdd', 'Heriyanto', 'Close', '2022-01-19 11:50:55', '2022-01-22 17:05:47'),
(43, 'IT2201190007', 'PBN Factory', 'usman', 'HRD', 'Problem', 'facethermal 2 error', 'sudah oke', 'Heriyanto', 'Close', '2022-01-19 11:51:58', '2022-01-19 17:00:13'),
(44, 'IT2201190008', 'PBN Factory', 'Nanda', 'QC', 'Problem', 'PC47 blue screen', 'sudah oke', 'Heriyanto', 'Close', '2022-01-19 16:58:39', '2022-01-19 17:02:14'),
(45, 'IT2201190009', 'PBN Factory', 'Nanda', 'QC', 'Request', 'PC 68 Minta akses internet', 'ok', 'Heriyanto', 'Close', '2022-01-19 16:59:13', '2022-01-20 13:25:41'),
(46, 'IT2201190010', 'PBN Factory', 'Pak Edi', 'IT', 'Request', 'info 3 titik cctv lokasi FE ke vendor', 'oke', 'Heriyanto', 'Close', '2022-01-19 17:00:58', '2022-01-19 17:01:10'),
(47, 'IT2201200001', 'PBN HO', 'Henny', 'Marketing', 'Request', 'Peremajaan PC (PC lama dan spek rendah)', '- Order CPU spek (core i3, ram 4gb) via div. purchasing\r\n- Instalasi windows dan setting printer', 'Daniel', 'Close', '2022-01-18 10:03:44', '2022-01-20 10:05:16'),
(48, 'IT2201200002', 'PBN Factory', 'Nina', 'Fishmeal', 'Problem', 'Email bermasalah dan tidak bisa print', 'ok', 'Heriyanto', 'Close', '2022-01-20 11:22:29', '2022-01-20 11:25:20'),
(49, 'IT2201200003', 'PBN Factory', 'Nanda', 'QC', 'Request', 'minta akses internet dan setting web browser', 'ok', 'Heriyanto', 'Close', '2022-01-20 11:23:06', '2022-01-20 11:24:46'),
(50, 'IT2201200004', 'PBN Factory', 'Security', 'HRD', 'Request', 'minta isi tinta', 'ok', 'Heriyanto', 'Close', '2022-01-20 11:23:40', '2022-01-20 11:24:36'),
(51, 'IT2201200005', 'PBN Factory', 'Gudang', 'Warehouse', 'Request', 'minta isi tinta', 'ok', 'Heriyanto', 'Close', '2022-01-20 11:24:01', '2022-01-20 11:24:10'),
(52, 'IT2201200006', 'PBN HO', 'Henny', 'Marketing', 'Request', 'Penambahan Signature Email', 'Done', 'Daniel', 'Close', '2022-01-20 13:35:21', '2022-01-20 13:35:37'),
(53, 'IT2201200007', 'PBN HO', 'Henny', 'Marketing', 'Request', 'Penambahan rumus \"terbilang\" di excel', 'Done', 'Daniel', 'Close', '2022-01-20 14:02:56', '2022-01-20 14:03:08'),
(54, 'IT2201200008', 'PBN Factory', 'Bu Endang', 'QA', 'Problem', 'Tidak bisa print khusu word', 'OK', 'Heriyanto', 'Close', '2022-01-20 14:14:14', '2022-01-21 11:29:25'),
(55, 'IT2201200009', 'PBN Factory', 'Hanifa', 'Production', 'Problem', 'Print Epson tinta hitam tidak keluar', 'kalibrasi ulang', 'Heriyanto', 'Close', '2022-01-20 14:14:53', '2022-01-21 11:29:54'),
(56, 'IT2201210001', 'PBN HO', 'Amelia', 'Marketing', 'Request', 'Penambahan Hardisk untuk penyimpanan Data', '- Order hardisk via div. purchasing\r\n- Pemasangan hardisk di PC user', 'Daniel', 'Close', '2022-01-21 09:50:10', '2022-01-21 09:52:08'),
(57, 'IT2201210002', 'PBN HO', 'Amelia', 'Marketing', 'Request', 'Pemindahan data dan setting email dari server ke local disk', '- Pindah data email\r\n- Setting email di PC user', 'Daniel', 'Close', '2022-01-21 09:51:17', '2022-01-21 09:52:48'),
(58, 'IT2201210003', 'PBN HO', 'Pak Agus', 'Marketing', 'Request', 'Tidak bisa buka web ONE', 'Sudah dibukakan access', 'Syuhada', 'Close', '2022-01-21 10:02:39', '2022-01-21 10:47:04'),
(59, 'IT2201210004', 'PSFI', 'Bu acen', 'Accouting', 'Request', 'Disconnecting mapping data PSFI untuk user Putri, Iwan dan PC Ex-Widyanto ', 'Done', 'Daniel', 'Close', '2022-01-21 10:14:59', '2022-01-21 10:15:10'),
(60, 'IT2201210005', 'PBN Factory', 'Nita', 'QC', 'Request', 'instal teams buat meeting', 'oke', 'Heriyanto', 'Close', '2022-01-21 11:28:20', '2022-01-22 10:06:12'),
(61, 'IT2201210006', 'PBN Factory', 'Ayu', 'QC', 'Problem', 'PC HANK', '- Req PC', 'Heriyanto', 'OPEN', '2022-01-21 11:28:48', '2022-01-27 10:29:37'),
(62, 'IT2201210007', 'PBN Factory', 'Astrida', 'Production', 'Request', 'req keyboard untuk Asmen produksi', 'ok', 'Heriyanto', 'Close', '2022-01-21 11:37:50', '2022-01-22 11:04:06'),
(63, 'IT2201210008', 'PBN HO', 'Albert', 'TAX', 'Request', 'Open sharing folder PC Pak Albert ke PC Pak Alex', '- Share folder di PC pak Albert\r\n- Mapping folder di PC pak Alex', 'Daniel', 'Close', '2022-01-21 13:27:13', '2022-01-21 13:29:15'),
(67, 'IT2201220001', 'PBN Factory', 'Ibu Lia', 'Warehouse', 'Problem', 'PC hank', 'sudah oke', 'Heriyanto', 'Close', '2022-01-22 08:04:44', '2022-01-24 09:59:20'),
(68, 'IT2201220002', 'PBN Factory', 'Eka', 'QA', 'Problem', 'tidak bisa tehubung teams', 'oke', 'Heriyanto', 'Close', '2022-01-22 08:06:38', '2022-01-22 08:06:48'),
(69, 'IT2201220003', 'PBN Factory', 'Pak Ferly', 'Factory Manager', 'Problem', 'outlook problem', '- koordinasi dengan Pak Wins\r\n- setting ulang outlook buat profile baru', 'Heriyanto', 'Close', '2022-01-22 10:07:42', '2022-01-24 10:03:37'),
(70, 'IT2201240001', 'PBN Factory', 'Ayu', 'QC', 'Problem', 'tidak bisa masuk share', 'sudah oke', 'Heriyanto', 'Close', '2022-01-24 08:56:05', '2022-01-24 08:59:04'),
(71, 'IT2201240002', 'PBN Factory', 'Astrida', 'Production', 'Problem', 'koneksi PC Pak bobi bermasalah', '- ganti psu (NF)\r\n- ganti mainboard (NF)\r\n- ganti kabel power (fix)', 'Heriyanto', 'Close', '2022-01-24 08:57:42', '2022-01-24 09:58:46'),
(72, 'IT2201240003', 'PBN Factory', 'Nanda', 'QC', 'Problem', 'PC Mati', 'sudah nyala', 'Heriyanto', 'Close', '2022-01-24 08:58:06', '2022-01-24 11:57:30'),
(73, 'IT2201240004', 'PBN HO', 'Deasy', 'Finance', 'Problem', 'Koneksi Jaringan Putus', 'LAN Onboard ada masalah, sudah di order LAN Card', 'Heriyanto', 'Close', '2022-01-24 12:47:36', '2022-01-24 12:48:28'),
(74, 'IT2201240005', 'PBN Factory', 'amel', 'QC', 'Problem', 'outlook hank', 'ok', 'Heriyanto', 'Close', '2022-01-24 13:14:13', '2022-01-24 14:56:56'),
(75, 'IT2201240006', 'PBN Factory', 'Bu Retno', 'Purchasing', 'Problem', 'Print bermasalah', 'ok', 'Heriyanto', 'Close', '2022-01-24 13:14:43', '2022-01-24 14:56:43'),
(76, 'IT2201240007', 'PSFI', 'Tia', 'Admin Staff', 'Request', 'Printer tidak connect', '- Port USB CPU belakang kadang-kadang tidak terdeteksi\r\n- Kabel pindah ke port USB depan', 'Daniel', 'Close', '2022-01-24 13:23:43', '2022-01-24 13:38:13'),
(77, 'IT2201240008', 'PSFI', 'Cinda', 'Accouting', 'Request', 'Koneksi printer ke PC Tia', 'Add printer dari PC Tia', 'Daniel', 'Close', '2022-01-24 13:35:09', '2022-01-24 13:39:46'),
(78, 'IT2201240009', 'PSFI', 'Rizky', 'Admin Staff', 'Request', 'Koneksi printer ke PC Krendy', 'Add printer dari PC Krendy', 'Daniel', 'Close', '2022-01-24 13:35:39', '2022-01-24 13:39:29'),
(79, 'IT2201240010', 'PSFI', 'Putri', 'TAX', 'Request', 'Koneksi printer LQ-310 ke PC Tia', 'Add printer dari PC Tia', 'Daniel', 'Close', '2022-01-24 13:36:23', '2022-01-24 13:40:03'),
(80, 'IT2201240011', 'PBN Factory', 'Bu Tina SPV Produksi', 'Production', 'Problem', 'HP tidak bisa konek ke wifi', 'ok', 'Heriyanto', 'Close', '2022-01-24 15:13:36', '2022-01-25 15:46:35'),
(81, 'IT2201250001', 'Samico', 'Tasya', 'Admin Staff', 'Problem', 'Tampilan pada layar komputer tidak menyala', 'Penyebab: RAM kotor\r\nSolusi: Bersihkan kuningan pada RAM ', 'Daniel', 'Close', '2022-01-25 09:31:10', '2022-01-25 09:33:51'),
(82, 'IT2201250002', 'Samico', 'Tasya', 'Admin Staff', 'Request', 'Koneksi printer ke PC Tia ', 'Add printer dari PC Tia', 'Daniel', 'Close', '2022-01-25 09:36:39', '2022-01-25 09:37:23'),
(83, 'IT2201250003', 'PBN HO', 'Sonti', 'Finance', 'Request', 'Setting Zoom Meeting - Asset', 'Setting zoom meeting', 'Daniel', 'Close', '2022-01-25 10:03:34', '2022-01-25 10:25:10'),
(84, 'IT2201250004', 'PBN HO', 'Albert', 'TAX', 'Problem', 'Data inbox email hilang - user tidak sengaja delete', 'Moving data email dari delete item ke inbox', 'Daniel', 'Close', '2022-01-25 10:23:04', '2022-01-25 10:23:58'),
(85, 'IT2201250005', 'PBN Factory', 'Pak Ferly', 'Factory Manager', 'Problem', 'email masih problem', '- koordinasi Pak Wins', 'Heriyanto', 'Close', '2022-01-25 11:17:47', '2022-01-25 11:42:11'),
(86, 'IT2201250006', 'PBN Factory', 'Bu Ririn', 'HRD', 'Problem', 'tidak bisa akses dc hrd kasir', '- cek akses client mapping ulang \r\n- cek akses server (fix)', 'Heriyanto', 'Close', '2022-01-25 11:21:00', '2022-01-25 11:42:49'),
(87, 'IT2201250007', 'PBN Factory', 'Bu Retno', 'Purchasing', 'Problem', 'tidak bisa print', 'restart PC karena hank', 'Heriyanto', 'Close', '2022-01-25 11:21:29', '2022-01-25 11:43:14'),
(88, 'IT2201250008', 'PBN Factory', 'Bu Retno', 'Purchasing', 'Problem', 'email kena spam', 'info Pak Wins ubah Password', 'Heriyanto', 'Close', '2022-01-25 11:21:50', '2022-01-25 13:43:29'),
(89, 'IT2201250009', 'PBN Factory', 'Pak Rusli', 'Purchasing', 'Problem', 'tidak bisa print', 'delete print dan print ulang', 'Heriyanto', 'Close', '2022-01-25 11:22:11', '2022-01-25 12:43:54'),
(90, 'IT2201250010', 'PBN Factory', 'Muliya', 'Admin Staff', 'Problem', 'laptop Pak Ferly trouble email tida bisa di buka', 'repair pst menggunakan SCANPST', 'Heriyanto', 'Close', '2022-01-25 11:22:55', '2022-01-25 11:44:27'),
(91, 'IT2201250011', 'Samico', 'Anggi', 'QC', 'Problem', 'monitor kedip kedip', 'Req VGA Card', 'Heriyanto', 'OPEN', '2022-01-25 11:23:40', '2022-01-27 12:30:03'),
(92, 'IT2201250012', 'PBN Factory', 'Anita', 'Pouch', 'Request', 'isi tinta', 'ok', 'Heriyanto', 'Close', '2022-01-25 11:40:53', '2022-01-25 11:44:38'),
(93, 'IT2201250013', 'PBN Factory', 'Ibu Endang', 'QA', 'Problem', 'tidak bisa buka file rar', 'upgrade rar', 'Heriyanto', 'Close', '2022-01-25 11:45:04', '2022-01-25 12:46:56'),
(94, 'IT2201250014', 'PBN Factory', 'Muliya', 'Admin Staff', 'Request', 'test printer eks Pak Ferly', '- Req adaptor Printer\r\n-  Tes Printer (oke)', 'Heriyanto', 'Close', '2022-01-25 11:47:38', '2022-01-25 12:48:03'),
(95, 'IT2201250015', 'PBN Factory', 'Eka', 'QA', 'Problem', 'PC Mia ga bisa masuk windows\r\n', 'sudah oke', 'Heriyanto', 'Close', '2022-01-25 13:48:21', '2022-01-25 14:29:14'),
(96, 'IT2201250015', 'PBN HO', 'Fenny', 'Marketing', 'Request', 'Toner printer laser HP 150A habis', 'Pergantian toner HP laser HP 150A', 'Daniel', 'Close', '2022-01-25 13:51:22', '2022-01-25 13:53:22'),
(97, 'IT2201250016', 'PBN Factory', 'Pak Rusli', 'Purchasing', 'Problem', 'outlook kena spam', '- koordinasi Pak Wins reset pass', 'Heriyanto', 'OPEN', '2022-01-25 16:21:46', '2022-01-31 16:43:52'),
(98, 'IT2201250017', 'PBN HO', 'Bu Jori', 'Marketing', 'Request', 'Mapping server MKT folder \"Final Settlement\" di laptop MKT', 'Mapping folder \"Final Settlement\" di laptop MKT', 'Daniel', 'Close', '2022-01-25 16:36:38', '2022-01-25 16:37:24'),
(99, 'IT2201250018', 'PBN HO', 'Fenny', 'Marketing', 'Problem', 'Tidak bisa kirim dan terima email, muncul notification \"Contacting the server for information\"', 'Repair Microsoft Outlook di PC user', 'Daniel', 'Close', '2022-01-25 17:14:33', '2022-01-25 17:15:38'),
(100, 'IT2201250019', 'PBN Factory', 'Ibu Mei', 'QC', 'Problem', 'PC Bu Mei restart sendiri', '- update windows \r\n- desable windows update', 'Heriyanto', 'Close', '2022-01-25 17:39:59', '2022-01-25 17:41:26'),
(101, 'IT2201250020', 'PBN Factory', 'Ibu Mei', 'QC', 'Request', 'Mapping DC QC', 'oke', 'Heriyanto', 'Close', '2022-01-25 17:41:48', '2022-01-25 17:41:55'),
(102, 'IT2201250021', 'PBN Factory', 'Siti Nur', 'QA', 'Problem', 'PC tidak bisa masuk windows', 'ganti kabel sata', 'Heriyanto', 'Close', '2022-01-25 18:05:40', '2022-01-25 18:25:48'),
(103, 'IT2201250022', 'PBN Factory', 'Anita', 'Pouch', 'Problem', 'tidak keluar hasil print', 'Kalibrasi ulang', 'Heriyanto', 'Close', '2022-01-25 18:06:14', '2022-01-25 18:25:28'),
(104, 'IT2201260001', 'PBN HO', 'Jori', 'Marketing', 'Request', 'Permintaan alamat email \"logexim4@pbn.co.id\" keluar dari  Email group Logistic dan Eksport', 'Menghapus email logexim4@pbn.co.id dari Email group logistic dan eksport ', 'Daniel', 'Close', '2022-01-26 11:30:30', '2022-01-26 11:52:29'),
(105, 'IT2201260002', 'PSFI', 'Tasya', 'Admin Staff', 'Request', 'Ganti alamat email menjadi kasir@psfi.co.id, sebelumnya user menggunakan alamat email admin.ho@samico.co.id', 'Transfer data email dan setting email di PC user', 'Daniel', 'Close', '2022-01-26 11:49:11', '2022-01-26 11:53:30'),
(106, 'IT2201260003', 'Samico', 'Lulu', 'Admin Staff', 'Request', 'Ganti alamat email menjadi admin.ho@samico.co.id, sebelumnya user menggunakan alamat email kasir@psfi.co.id', 'Transfer data email dan setting email di laptop user', 'Daniel', 'Close', '2022-01-26 11:49:52', '2022-01-26 11:53:45'),
(107, 'IT2201260004', 'Samico', 'Lulu', 'Admin Staff', 'Request', 'Koneksi ke printer Epson L3210 (PC Tia - PSFI)', 'Connect ke printer Epson L3210 (PC Tia - PSFI)', 'Daniel', 'Close', '2022-01-26 11:55:22', '2022-01-26 11:57:08'),
(108, 'IT2201260005', 'PBN HO', 'WS', 'TAX', 'Request', 'Penambahan Vendor di Accurate internal dan external', 'Sudah di update penambahan vendor di Accurate TAX', 'Winarto', 'Close', '2022-01-26 13:24:36', '2022-01-26 13:41:05'),
(109, 'IT2201260006', 'PBN Factory', 'Mia', 'QA', 'Problem', 'Printer  Mati', '- ganti kabel power', 'Heriyanto', 'Close', '2022-01-26 17:11:56', '2022-01-27 10:25:08'),
(110, 'IT2201260007', 'PBN Factory', 'Dinda', 'HRD', 'Request', 'input data master Hris 2021', '- input master data di Haris Payroll', 'Heriyanto', 'Close', '2022-01-26 17:14:25', '2022-01-27 10:25:58'),
(111, 'IT2201260008', 'PBN Factory', 'Astrida', 'Production', 'Problem', 'PC Pak Bobi Mati lagi', '- Ganti PSU bekas (tunggu order)\r\n- Ganti Mainboard\r\n- Info Pak wins utk aktivasi jaringan', 'Heriyanto', 'Close', '2022-01-26 17:16:37', '2022-02-02 11:04:11'),
(112, 'IT2201260007', 'PSFI', 'Putri', 'TAX', 'Problem', 'Tidak bisa cetak bukti potong PPH 21', 'Install Crystal Report di PC user', 'Daniel', 'Close', '2022-01-26 17:17:09', '2022-01-26 17:18:16'),
(113, 'IT2201260009', 'PBN Factory', 'Nova', 'HRD', 'Problem', 'Printer Pak Sugi habis Tinta', 'oke', 'Heriyanto', 'Close', '2022-01-26 17:17:16', '2022-01-27 17:29:02'),
(114, 'IT2201260010', 'PBN Factory', 'Pak Sugi', 'HRD', 'Problem', 'tidak bisa print', '- Reset Printer\r\n- cleaning head\r\n- flushing Print', 'Heriyanto', 'Close', '2022-01-26 17:18:32', '2022-01-27 17:24:52'),
(115, 'IT2201260011', 'PBN Factory', 'Aida', 'Admin Staff', 'Problem', 'Timbangan Line 6 suka mati matian', '- koordinasi maintenance\r\n- cek kelistrikan', 'Heriyanto', 'Close', '2022-01-26 17:19:31', '2022-01-31 14:48:02'),
(116, 'IT2201260012', 'PBN Factory', 'Tami', 'HRD', 'Problem', 'Facethermal error', 'sudah oke', 'Heriyanto', 'Close', '2022-01-26 17:20:01', '2022-01-27 10:30:36'),
(117, 'IT2201270001', 'PSFI', 'Lulu', 'Admin Staff', 'Request', 'Mapping Alias database Accurate ABC 2022', 'Setting  alias \"Accurate ABC 2022\" di laptop user', 'Daniel', 'Close', '2022-01-27 10:24:10', '2022-01-27 10:26:48'),
(118, 'IT2201270002', 'PSFI', 'Rizky', 'Admin Staff', 'Problem', 'Lampu Printer Epson L3110 berkedip bersamaan', 'Reset printer Epson L3110', 'Daniel', 'Close', '2022-01-27 10:25:24', '2022-01-27 10:27:17'),
(119, 'IT2201270003', 'PBN Factory', 'Pak Dede', 'Maintenance', 'Request', 'Pemindahan PC', 'sudah oke', 'Heriyanto', 'Close', '2022-01-27 18:07:24', '2022-01-31 09:43:08'),
(120, 'IT2201270004', 'PBN Factory', 'Muliya', 'Admin Staff', 'Request', 'Cek outlook Pak Ferly full', 'sudah oke', 'Heriyanto', 'Close', '2022-01-27 18:08:51', '2022-01-31 09:44:48'),
(121, 'IT2201270005', 'PBN Factory', 'Indra', 'Maintenance', 'Request', 'butuh PC di maintenance Fe PC lama di pinjam pak samsul ke sizing', '', 'Heriyanto', 'IN PROGRESS', '2022-01-27 18:10:18', NULL),
(122, 'IT2201270006', 'PBN Factory', 'Eka', 'QA', 'Request', 'Setting wifi customer', 'sudak oke', 'Heriyanto', 'Close', '2022-01-27 18:10:54', '2022-01-31 10:44:09'),
(123, 'IT2201270007', 'PBN Factory', 'Mia', 'QA', 'Request', 'setting wifi untuk bu endang meeting dengan auditor', 'sudah oke', 'Heriyanto', 'Close', '2022-01-27 18:11:25', '2022-01-31 10:44:31'),
(124, 'IT2201270008', 'PBN Factory', 'Astrida', 'Production', 'Problem', 'PC filling coding mati', '- mainboard rusak\r\n- SPP mainboard', 'Heriyanto', 'OPEN', '2022-01-27 18:12:31', '2022-01-31 13:45:28'),
(125, 'IT2201270009', 'PBN Factory', 'Ayu', 'QC', 'Request', 'req printer untuk samico . printer lama rusak', '', 'Heriyanto', 'IN PROGRESS', '2022-01-27 18:13:40', NULL),
(126, 'IT2201270010', 'PBN Factory', 'Bu Iis', 'HRD', 'Problem', 'ganti flashdisk untuk sosialisasi video kantin', 'sudah oke', 'Heriyanto', 'Close', '2022-01-27 18:14:35', '2022-01-31 10:42:22'),
(127, 'IT2201270011', 'PBN Factory', 'Bu Enung', 'Warehouse', 'Problem', 'Cek laptop minboard rusak', 'rusak mainboard perlu service', 'Heriyanto', 'Close', '2022-01-27 18:16:54', '2022-01-31 10:46:44'),
(128, 'IT2201280001', 'PBN Factory', 'Ovi', 'QC', 'Problem', 'tidak bisa print di QC FE', '- reset printer epson', 'Heriyanto', 'Close', '2022-01-28 09:46:56', '2022-01-31 11:36:32'),
(129, 'IT2201280002', 'PBN HO', 'Sonti', 'Finance', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:44:49', '2022-01-28 15:53:07'),
(130, 'IT2201280003', 'PBN HO', 'Luis', 'Accouting', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:45:16', '2022-01-28 15:53:22'),
(131, 'IT2201280004', 'PBN HO', 'Christy', 'Accouting', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:45:35', '2022-01-28 15:55:17'),
(132, 'IT2201280005', 'PBN HO', 'Ina', 'Accouting', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:45:48', '2022-01-28 15:55:29'),
(133, 'IT2201280006', 'PBN HO', 'Maya', 'Accouting', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:46:09', '2022-01-28 15:55:37'),
(134, 'IT2201280007', 'PBN HO', 'Anna', 'Finance', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:46:28', '2022-01-28 15:55:08'),
(135, 'IT2201280008', 'PSB', 'Yenny', 'Accouting', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:47:17', '2022-01-28 15:55:00'),
(136, 'IT2201280009', 'PSB', 'April', 'Finance', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:47:35', '2022-01-28 15:54:53'),
(137, 'IT2201280010', 'PBN HO', 'Sri Lestari', 'TAX', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk\r\n- Install dan setting Mobile Vpn \r\n- Mapping folder server', 'Daniel', 'Close', '2022-01-28 15:48:00', '2022-01-28 17:54:45'),
(138, 'IT2201280011', 'PBN HO', 'Willyamsah', 'Marketing', 'Request', 'Open Akses Server \"Local Document\"', '- Buka akses server \"Local Document\"\r\n- Mapping folder \"Local Document\" di laptop user', 'Daniel', 'Close', '2022-01-28 15:49:37', '2022-01-28 17:54:35'),
(139, 'IT2201280012', 'PBN Factory', 'Lia', 'Admin Staff', 'Request', 'Input Vendor Baru di Accurate', 'Input Vendor Baru di Accurate PBN', 'Daniel', 'Close', '2022-01-28 15:51:04', '2022-01-28 16:53:45'),
(140, 'IT2201280013', 'PSB', 'Yenny', 'Accouting', 'Request', 'Pemindahan email acct1@pahalasukses.co.id ke laptop baru Yenny', '- Pindah data email\r\n- Setting email user', 'Daniel', 'Close', '2022-01-28 15:58:16', '2022-01-28 16:58:52'),
(141, 'IT2201310001', 'PBN HO', 'Stefanny', 'Finance', 'Request', 'Setting Laptop untuk WFH', '- Install dan setting Anydesk \r\n- Install dan setting Mobile Vpn ', 'Daniel', 'Close', '2022-01-31 10:06:54', '2022-01-31 10:07:26'),
(142, 'IT2201310002', 'PBN Factory', 'Uma', 'HRD', 'Problem', 'PC suka mati sendiri', '- ganti kipas Fan', 'Heriyanto', 'Close', '2022-01-31 10:49:27', '2022-01-31 11:39:05'),
(143, 'IT2201310003', 'PBN Factory', 'Tami', 'HRD', 'Problem', 'Hdd tidak ada data', 'Flashdisk kena virus hide, \r\nscan Fd restore file', 'Heriyanto', 'Close', '2022-01-31 10:52:07', '2022-01-31 12:41:19'),
(144, 'IT2201310004', 'PBN Factory', 'Bibah', 'Warehouse', 'Problem', '- tidak bisa wa web\r\n- tidak bisa akses share', 'sudah oke', 'Heriyanto', 'Close', '2022-01-31 10:52:42', '2022-01-31 11:49:19'),
(145, 'IT2201310005', 'PBN Factory', 'Pak Dede', 'Maintenance', 'Request', 'Pindah PC', 'ok', 'Heriyanto', 'Close', '2022-01-31 10:53:41', '2022-01-31 11:36:10'),
(146, 'IT2201310006', 'PBN Factory', 'Ibu Endang & Pak Ferly', 'Factory Manager', 'Request', 'Pemasangan CCTV Pouch 5 Titik + 1Titik jalur baru', '-tarik kabel baru\r\n-instlasi cctv\r\n-koordinasi Pak wins mengenai jaringan\r\n-cek akses cctv browser', 'Heriyanto', 'Close', '2022-01-31 10:54:38', '2022-01-31 14:37:16'),
(147, 'IT2201310007', 'PBN Factory', 'Ismah', 'Production', 'Problem', 'tidak bisa Print', '- alihkan print ke astrida\r\n- printer spp service', 'Heriyanto', 'OPEN', '2022-01-31 10:55:00', '2022-01-31 11:46:00'),
(148, 'IT2201310008', 'PBN Factory', 'Hanifa', 'Production', 'Problem', 'Tidak bisa Print', '', 'Heriyanto', 'IN PROGRESS', '2022-01-31 10:56:12', NULL),
(149, 'IT2201310009', 'PBN Factory', 'Evalintina', 'QC', 'Request', 'Isi Tinta print canon', 'ok', 'Heriyanto', 'Close', '2022-01-31 11:01:45', '2022-01-31 12:35:48'),
(150, 'IT2201310010', 'PBN Factory', 'Pak Bayu', 'PPIC', 'Problem', 'PC suka mati sendiri (blue Screen)', '', 'Heriyanto', 'IN PROGRESS', '2022-01-31 11:02:22', NULL),
(151, 'IT2201310011', 'PBN Factory', 'Bu Aang', 'PPIC', 'Problem', 'Restore autlook 2019-2020', '- sudah oke', 'Heriyanto', 'Close', '2022-01-31 11:02:56', '2022-01-31 11:37:29'),
(152, 'IT2201310012', 'Samico', 'Anggi', 'QC', 'Problem', 'PC layar kedip kedip', 'double input', 'Heriyanto', 'Close', '2022-01-31 11:31:56', '2022-01-31 11:40:00'),
(153, 'IT2201310013', 'PBN Factory', 'Wafa Nadia', 'Production', 'Problem', 'Pc panel tidak bisa konek share', '- restart PC\r\n- driver konek kembali\r\n- req LAN card', 'Heriyanto', 'Close', '2022-01-31 11:32:51', '2022-01-31 11:35:00'),
(154, 'IT2201310014', 'PBN Factory', 'Aida', 'Admin Staff', 'Problem', 'Timbangan line 10 problem', 'timbangn Line 8\r\n- ganti loadcell', 'Heriyanto', 'Close', '2022-01-31 11:33:27', '2022-01-31 11:34:27'),
(155, 'IT2201310015', 'PBN HO', 'Deasy', 'Finance', 'Problem', 'Tidak bisa connect VPN untuk WFH', 'Install ulang aplikasi Mobile VPN with SSL client di laptop user', 'Daniel', 'Close', '2022-01-31 13:28:13', '2022-01-31 13:29:00'),
(156, 'IT2201310016', 'PBN Factory', 'Bu Aang', 'PPIC', 'Problem', 'tidak bisa searching email', 'setting outlook searching serta index searching', 'Heriyanto', 'Close', '2022-01-31 17:29:42', '2022-01-31 17:35:47'),
(157, 'IT2201310017', 'PBN Factory', 'Nova', 'HRD', 'Problem', 'tidak bisa tarik absen', '- Tarik Kabel Baru\r\n- Info Pak Wins IP dan Port Kabel LAN', 'Heriyanto', 'Close', '2022-01-31 17:30:03', '2022-02-02 10:13:04'),
(158, 'IT2201310018', 'PBN Factory', 'Hendra', 'QA', 'Problem', 'CCTV Pouch Mati', '- UPS ada yang matiin\r\n- hidupkan kembali ups dan sosialisasi Power agar jangan di matikan', 'Heriyanto', 'Close', '2022-01-31 17:31:31', '2022-01-31 17:33:56'),
(159, 'IT2201310019', 'PBN Factory', 'Pak Dede', 'Maintenance', 'Problem', 'tidak bisa konek ke share', '- Close by Pak Wins', 'Heriyanto', 'Close', '2022-01-31 17:32:06', '2022-01-31 17:33:00'),
(160, 'IT2202020001', 'PBN Factory', 'Mia', 'QA', 'Problem', 'setting email HP karena mau cuti', '- Minta Pass email Pak Wins\r\n- Setting email di HP', 'Heriyanto', 'Close', '2022-02-02 13:14:13', '2022-02-02 14:01:26'),
(161, 'IT2202020002', 'PBN Factory', 'Ayu', 'QC', 'Problem', 'PC belum eks FE blm setting outlook', '- Info Pass Ke Pak wins\r\n- Setting Outlook', 'Heriyanto', 'Close', '2022-02-02 13:14:47', '2022-02-02 14:02:00'),
(162, 'IT2202020003', 'PBN Factory', 'Astrida', 'Production', 'Problem', 'Monitor layar berwarna garis garis', '- Ganti Kabel VGA', 'Heriyanto', 'Close', '2022-02-02 13:17:04', '2022-02-02 14:02:19'),
(163, 'IT2202020004', 'PBN Factory', 'Pak Yacob', 'Warehouse', 'Request', 'setting wifi di HP , HP lama ganti', '- catat mac Address\r\n- Info Pak Wins', 'Heriyanto', 'Close', '2022-02-02 13:19:11', '2022-02-02 15:00:49'),
(164, 'IT2202020005', 'PBN Factory', 'Hendra', 'QA', 'Request', 'Minta data CCTV untuk Produksi POUCH', 'sudah oke', 'Heriyanto', 'Close', '2022-02-02 13:21:03', '2022-02-03 10:34:59'),
(165, 'IT2202020006', 'PBN HO', 'Jori', 'Marketing', 'Request', 'Nonaktifkan email ypw@pbn.co.id dan Ganti Mac Address HP Pak Jacob Cikarang                                                      ', 'Done', 'Winarto', 'Close', '2022-02-02 15:36:27', '2022-02-02 15:36:50'),
(166, 'IT2202030001', 'PSB', 'April', 'Finance', 'Problem', 'Email Pahalasukses.co.id tidak bisa terima dan kirim email, terindikasi IP Publik HO kena block', 'Email sudah ok dan sudah solved', 'Winarto', 'Close', '2022-02-03 10:43:32', '2022-02-03 11:17:27'),
(167, 'IT2202030002', 'PBN HO', 'Liany', 'Marketing', 'Problem', 'Tidak bisa save excel, terindikasi type file excel beda versi', 'Sudah di jelaskan ke user untuk menggunakan file type excel yang sesuai dengan file asalnya', 'Winarto', 'Close', '2022-02-03 13:51:12', '2022-02-03 13:51:56'),
(168, 'IT2202030003', 'PBN Factory', 'Dinda', 'HRD', 'Problem', 'windows bermasalah', 'aktivasi windows', 'Heriyanto', 'Close', '2022-02-03 16:09:25', '2022-02-03 16:32:03'),
(169, 'IT2202030004', 'PBN Factory', 'Anita', 'Pouch', 'Problem', 'tidak bisa print share', 'restart print spooler dan add printer ulang', 'Heriyanto', 'Close', '2022-02-03 16:10:00', '2022-02-03 16:32:30'),
(170, 'IT2202030005', 'PBN Factory', 'Herryanto', 'Pouch', 'Request', 'minta di mapping share', 'sudah oke', 'Heriyanto', 'Close', '2022-02-03 16:10:47', '2022-02-03 16:33:08'),
(171, 'IT2202030006', 'PBN Factory', 'Pak Bobi', 'Production', 'Problem', 'PC mati lagi', '- di buatkan jalur listrik baru karena listrik lama kabelnya tpis di ganti dengan tebel\r\n- instalasi kabel listrik\r\n- perapihan kabel', 'Heriyanto', 'Close', '2022-02-03 16:11:07', '2022-02-03 16:34:18'),
(172, 'IT2202030007', 'PBN Factory', 'Astrida', 'Production', 'Problem', 'PC Mati', 'ganti kabel power cpu', 'Heriyanto', 'Close', '2022-02-03 16:20:15', '2022-02-03 16:34:44'),
(173, 'IT2202030008', 'PBN Factory', 'Hendra', 'QA', 'Request', 'Minta data CCTV Pouch', 'OK', 'Heriyanto', 'Close', '2022-02-03 16:20:44', '2022-02-03 16:50:57'),
(174, 'IT2202030009', 'PBN Factory', 'Bu Retno', 'Purchasing', 'Request', 'Instal anydesk dan setting anydesk PC ledina WFH', 'sudah oke', 'Heriyanto', 'Close', '2022-02-03 16:22:31', '2022-02-03 17:32:56'),
(175, 'IT2202030010', 'PBN Factory', 'sylviani', 'PPIC', 'Problem', 'aktivasi office', 'sudah oke', 'Heriyanto', 'Close', '2022-02-03 16:23:42', '2022-02-03 17:32:47'),
(176, 'IT2202040001', 'PBN Factory', 'Nanda', 'QC', 'Problem', 'icon jadi word semua', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:04:02', NULL),
(177, 'IT2202040002', 'PBN Factory', 'Pak Bobi', 'Production', 'Problem', 'pc mati lagi', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:04:26', NULL),
(178, 'IT2202040003', 'PBN Factory', 'user FE', 'Production', 'Problem', 'tidak bisa konek ke share', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:05:27', NULL),
(179, 'IT2202040004', 'PBN Factory', 'Ismah', 'Production', 'Problem', 'mouse rusak', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:05:56', NULL),
(180, 'IT2202040005', 'PBN Factory', 'Hendra', 'QA', 'Request', 'Data CCTV Pouch', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:06:33', NULL),
(181, 'IT2202040006', 'PBN Factory', 'Herryanto', 'Pouch', 'Problem', 'tidak bisa akses share', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:06:55', NULL),
(182, 'IT2202040007', 'PBN Factory', 'Wanidah', 'Production', 'Request', 'perapihan kabel timbangan karena kena audit', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:08:35', NULL),
(183, 'IT2202040008', 'PBN Factory', 'Ledina', 'Purchasing', 'Problem', 'tidak bisa anydesk', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:09:16', NULL),
(184, 'IT2202040009', 'PBN Factory', 'Bu Ririn', 'HRD', 'Request', 'Pemindagan Line telp Telkom', '', 'Heriyanto', 'IN PROGRESS', '2022-02-04 17:10:09', NULL),
(185, 'IT2202070001', 'PBN Factory', 'Nina', 'Fishmeal', 'Problem', 'Tidak bisa print & Setting outlook di HP', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:00:57', NULL),
(186, 'IT2202070002', 'PBN Factory', 'Aida', 'Admin Staff', 'Problem', 'Timbangan line 5 error', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:01:20', NULL),
(187, 'IT2202070003', 'PBN Factory', 'Wafa Nadia', 'Production', 'Problem', 'PC timbangan Sizing error', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:02:32', NULL),
(188, 'IT2202070004', 'PBN Factory', 'Bu Iis', 'HRD', 'Problem', 'tidak bisa print', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:03:03', NULL),
(189, 'IT2202070005', 'PBN Factory', 'Dinda', 'HRD', 'Problem', 'Tidak bisa Print ke Pak Sugi', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:03:28', NULL),
(190, 'IT2202070006', 'PBN Factory', 'Mia', 'QA', 'Problem', 'Tidak bisa konek jaringan', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:04:14', NULL),
(191, 'IT2202070007', 'PBN Factory', 'Bu Uma', 'HRD', 'Problem', 'PC tidak nampil monitor', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:05:37', NULL),
(192, 'IT2202070008', 'PBN Factory', 'Nova', 'HRD', 'Request', 'Delete presensi absensi', '', 'Heriyanto', 'IN PROGRESS', '2022-02-07 17:06:49', NULL);

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
(1, 'PBN HO'),
(2, 'PBN Factory'),
(3, 'PSFI'),
(4, 'Samico'),
(5, 'PSB'),
(6, 'Holding'),
(7, 'BTS');

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
  `level` int(1) NOT NULL COMMENT '1. Administrator 2. Admin 3. Pimpinan',
  `image` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `divisi`, `level`, `image`, `date_created`) VALUES
(1, 'Syuhada', 'e00cf25ad42683b3df678c61f42c6bda', 'syuhada@pbn.co.id', 'IT', 1, 'default.png', '2021-04-14 10:25:11'),
(2, 'Eddy', 'd7d70e72a02499f1637dbd8862f3e4b4', 'eddy.sutanto@pbn.co.id', 'IT Manager', 3, 'default.png', '2021-04-14 10:25:11'),
(3, 'Winarto', 'd560217b253528b64edafecfab13e357', 'it@pbn.co.id', 'IT', 2, 'default.png', '2021-04-14 10:25:11'),
(4, 'Daniel', 'b5ea8985533defbf1d08d5ed2ac8fe9b', 'daniel@pbn.co.id', 'IT', 2, 'default.png', '2021-04-15 09:10:40'),
(5, 'Heriyanto', 'af25458116a2464f9401870dff1e11f5', 'it.factory@pbn.co.id', 'IT', 2, 'default.png', '2021-05-18 08:50:12');

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
  MODIFY `id_help` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
