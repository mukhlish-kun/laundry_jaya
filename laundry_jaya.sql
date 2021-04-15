-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2020 pada 22.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_jaya`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `keuntungan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `keuntungan` (
`id` bigint(20)
,`tanggal` date
,`paket` varchar(30)
,`berat` bigint(20)
,`biaya` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_laundry`
--

CREATE TABLE `paket_laundry` (
  `nama_paket` varchar(25) NOT NULL,
  `harga_paket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_laundry`
--

INSERT INTO `paket_laundry` (`nama_paket`, `harga_paket`) VALUES
('biasa', '5000'),
('karpet', '9500'),
('SatuHari', '7000'),
('Sprei', '6000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`username`, `password`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Fathul Mukhlish Al-haq', '2000-04-06', 'L', 'Jalan Kebon Nanas Selatan No.21B Cipinang Cempedak, Jatinegara, Jakarta Timur', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nama_lengkap` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`nama_lengkap`, `telp`) VALUES
('Yudha Aditya', '085220220220'),
('Aspari', '085227800382'),
('Sutiyatun', '085227800383'),
('Sutrisna', '085540545345'),
('Sutrisni', '085540560014'),
('Firman', '085540560018'),
('Abdul Hanif', '089123123123'),
('Roni majid', '089567567567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `berat` bigint(20) NOT NULL,
  `paket` varchar(30) NOT NULL,
  `status` enum('diambil','selesai','diproses') NOT NULL,
  `status_biaya` enum('lunas','belum_dibayar') NOT NULL,
  `biaya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `telp`, `berat`, `paket`, `status`, `status_biaya`, `biaya`) VALUES
(1, '2020-05-04', '085540545345', 5, 'biasa', 'diambil', 'lunas', '25000'),
(2, '2020-05-05', '085540560014', 5, 'biasa', 'diproses', 'lunas', '25000'),
(5, '2020-05-10', '089123123123', 3, 'biasa', 'diproses', 'lunas', '15000'),
(6, '2020-05-10', '085540560018', 5, 'SatuHari', 'diproses', 'lunas', '35000'),
(7, '2020-05-10', '089567567567', 3, 'Sprei', 'diproses', 'belum_dibayar', '18000'),
(9, '2020-05-10', '085220220220', 5, 'biasa', 'diproses', 'belum_dibayar', '25000'),
(10, '2020-05-10', '085227800382', 4, 'biasa', 'selesai', 'belum_dibayar', '17500'),
(11, '2020-05-10', '085227800383', 10, 'karpet', 'diambil', 'lunas', '95000');

-- --------------------------------------------------------

--
-- Struktur untuk view `keuntungan`
--
DROP TABLE IF EXISTS `keuntungan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `keuntungan`  AS  select `transaksi`.`id` AS `id`,`transaksi`.`tanggal` AS `tanggal`,`transaksi`.`paket` AS `paket`,`transaksi`.`berat` AS `berat`,`transaksi`.`biaya` AS `biaya` from `transaksi` where `transaksi`.`status_biaya` = 'lunas' WITH CASCADED CHECK OPTION ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `paket_laundry`
--
ALTER TABLE `paket_laundry`
  ADD PRIMARY KEY (`nama_paket`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`telp`),
  ADD KEY `telp` (`telp`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telp_cons` (`telp`),
  ADD KEY `paket_cons` (`paket`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `paket_cons` FOREIGN KEY (`paket`) REFERENCES `paket_laundry` (`nama_paket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `telp_cons` FOREIGN KEY (`telp`) REFERENCES `pelanggan` (`telp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
