-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2023 pada 00.09
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pkl_daftar`
--

CREATE TABLE `tbl_pkl_daftar` (
  `id_daftar` int(11) NOT NULL,
  `id_info` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pkl_daftar`
--

INSERT INTO `tbl_pkl_daftar` (`id_daftar`, `id_info`, `id_siswa`) VALUES
(2, 3, 1),
(3, 3, 2),
(4, 6, 3),
(5, 6, 2),
(6, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sas_admin`
--

CREATE TABLE `tbl_sas_admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `lvl_admin` enum('sys','tu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sas_admin`
--

INSERT INTO `tbl_sas_admin` (`id_admin`, `name_admin`, `email_admin`, `password_admin`, `lvl_admin`) VALUES
(1, 'Raz', 'myadmin@admin.com', 'myadmin', 'sys');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sas_announcements`
--

CREATE TABLE `tbl_sas_announcements` (
  `id_ann` int(11) NOT NULL,
  `title_ann` varchar(50) NOT NULL,
  `content_ann` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sas_jurusan`
--

CREATE TABLE `tbl_sas_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `name_jurusan` varchar(50) NOT NULL,
  `deks_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sas_jurusan`
--

INSERT INTO `tbl_sas_jurusan` (`id_jurusan`, `name_jurusan`, `deks_jurusan`) VALUES
(1, 'RPL', 'Rekayasa Perangkat Lunak'),
(2, 'TKJ', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sas_pkl`
--

CREATE TABLE `tbl_sas_pkl` (
  `id_info` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `title_info` varchar(50) NOT NULL,
  `deks_info` varchar(50) NOT NULL,
  `jml_pendaftar` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sas_pkl`
--

INSERT INTO `tbl_sas_pkl` (`id_info`, `id_admin`, `title_info`, `deks_info`, `jml_pendaftar`, `created_by`, `created_at`) VALUES
(3, 1, 'PT. Bridgestone Indonesia', 'Operator Produksi', 2, 1, '2023-11-26 19:48:02'),
(6, 1, 'PT. Mencari Cinta Sejati', 'Sales', 3, 1, '2023-11-26 22:51:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sas_siswa`
--

CREATE TABLE `tbl_sas_siswa` (
  `id_siswa` int(11) NOT NULL,
  `name_siswa` varchar(50) NOT NULL,
  `nisn_siswa` varchar(10) NOT NULL,
  `address_siswa` varchar(255) NOT NULL,
  `noWA_siswa` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `rombel_siswa` varchar(20) NOT NULL,
  `jurusan_siswa` varchar(50) NOT NULL,
  `foto_siswa` longblob NOT NULL,
  `status_siswa_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sas_siswa`
--

INSERT INTO `tbl_sas_siswa` (`id_siswa`, `name_siswa`, `nisn_siswa`, `address_siswa`, `noWA_siswa`, `id_jurusan`, `rombel_siswa`, `jurusan_siswa`, `foto_siswa`, `status_siswa_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Siraj Nurul Bil Haq', '1234567890', 'wrb', '081281270880', 1, 'XII RPL 2', 'RPL', 0x363536336131313533383431612e6a7067, 1, '2023-11-26 19:21:54', '2023-11-26 19:48:54', NULL, 1),
(2, 'Alvin', '9090909090', 'subang', '1234567890', 2, 'XII TKJ 2', 'TKJ', '', 1, '2023-11-26 19:51:22', '2023-11-26 19:51:22', NULL, NULL),
(3, 'Fawaz', '2222233333', 'Perumnas', '8989898989', 2, 'XII TKJ 2', 'TKJ', '', 1, '2023-11-26 19:52:35', '2023-11-26 19:52:35', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_pkl_daftar`
--
ALTER TABLE `tbl_pkl_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_info` (`id_info`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_sas_admin`
--
ALTER TABLE `tbl_sas_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_sas_announcements`
--
ALTER TABLE `tbl_sas_announcements`
  ADD PRIMARY KEY (`id_ann`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tbl_sas_jurusan`
--
ALTER TABLE `tbl_sas_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_sas_pkl`
--
ALTER TABLE `tbl_sas_pkl`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tbl_sas_siswa`
--
ALTER TABLE `tbl_sas_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_pkl_daftar`
--
ALTER TABLE `tbl_pkl_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_sas_admin`
--
ALTER TABLE `tbl_sas_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sas_announcements`
--
ALTER TABLE `tbl_sas_announcements`
  MODIFY `id_ann` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_sas_jurusan`
--
ALTER TABLE `tbl_sas_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_sas_pkl`
--
ALTER TABLE `tbl_sas_pkl`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_sas_siswa`
--
ALTER TABLE `tbl_sas_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pkl_daftar`
--
ALTER TABLE `tbl_pkl_daftar`
  ADD CONSTRAINT `tbl_pkl_daftar_ibfk_1` FOREIGN KEY (`id_info`) REFERENCES `tbl_sas_pkl` (`id_info`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pkl_daftar_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_sas_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sas_announcements`
--
ALTER TABLE `tbl_sas_announcements`
  ADD CONSTRAINT `tbl_sas_announcements_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_sas_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sas_pkl`
--
ALTER TABLE `tbl_sas_pkl`
  ADD CONSTRAINT `tbl_sas_pkl_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_sas_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sas_siswa`
--
ALTER TABLE `tbl_sas_siswa`
  ADD CONSTRAINT `tbl_sas_siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_sas_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
