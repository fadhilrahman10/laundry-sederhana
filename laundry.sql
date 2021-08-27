-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2021 pada 07.28
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
('ADM001', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_jasa`
--

CREATE TABLE `jenis_jasa` (
  `id_jasa` varchar(8) NOT NULL,
  `nama_jasa` varchar(255) NOT NULL,
  `harga_jasa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_jasa`
--

INSERT INTO `jenis_jasa` (`id_jasa`, `nama_jasa`, `harga_jasa`) VALUES
('JS001', 'Cuci', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `status`) VALUES
('P001', 'Ramadhani Spd', 'tidak member'),
('P002', 'Tomi', 'tidak member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_order` char(8) NOT NULL,
  `id_pelanggan` char(8) NOT NULL,
  `id_jasa` varchar(8) NOT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `total_berat` float NOT NULL,
  `diskon` float NOT NULL,
  `total_bayar` double DEFAULT NULL,
  `admin_id` int(8) NOT NULL DEFAULT 1,
  `status` enum('belum','sudah') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_order`, `id_pelanggan`, `id_jasa`, `tgl_terima`, `tgl_ambil`, `total_berat`, `diskon`, `total_bayar`, `admin_id`, `status`) VALUES
('OR001', 'P001', 'JS001', '2021-06-25', '2021-06-25', 3, 0, 15000, 21, 'sudah'),
('OR002', 'P003', 'JS001', '2021-06-25', '2021-06-25', 2, 0, 10000, 21, 'sudah'),
('OR005', 'P001', 'JS001', '2021-06-27', NULL, 3, 0, 15000, 21, 'belum'),
('OR004', 'P003', 'JS001', '2021-06-27', '2021-06-27', 2, 0, 10000, 21, 'sudah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_jasa`
--
ALTER TABLE `jenis_jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_order`),
  ADD KEY `No_Identitas` (`id_pelanggan`),
  ADD KEY `No_Identitas_2` (`id_pelanggan`),
  ADD KEY `No_Identitas_3` (`id_pelanggan`),
  ADD KEY `admin_id` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
