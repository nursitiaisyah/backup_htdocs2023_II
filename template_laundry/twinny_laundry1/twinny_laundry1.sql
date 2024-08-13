-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2021 pada 07.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twinny_laundry1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_dettransaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_dettransaksi`, `id_transaksi`, `id_paket`, `qty`, `keterangan`, `total_harga`) VALUES
(1, 3, 1, 1, 'ket1', 6000),
(2, 3, 2, 2, 'ket2', 12000),
(3, 2, 1, 2, '1', 12000),
(4, 2, 2, 2, '2', 12000),
(5, 3, 1, 2, '2', 12000),
(6, 4, 1, 2, 'ket2', 12000),
(7, 5, 1, 2, '12', 12000),
(8, 2, 1, 5, '1', 30000),
(9, 3, 1, 2, '1', 12000),
(10, 3, 3, 2, '', 20000),
(11, 4, 1, 2, 'ket 1', 12000),
(12, 2, 1, 2, 'Berat pakaian 2kg', 12000),
(13, 2, 3, 1, 'jumlah nya 1', 9000),
(14, 3, 2, 3, 'Beratnya 3kg', 27000),
(15, 3, 4, 2, 'Jumlah selimutnya ada 2', 14000),
(16, 4, 1, 2, 'berat pakaian 2kg', 12000),
(17, 4, 4, 5, 'total ada 5 selimut', 35000),
(18, 5, 1, 2, 'Berat nya 2kg', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(1, 'Fajar Bimantara', 'Kp Areman RT07/08', 'L', '089624098171'),
(2, 'Resti', 'Kelapa 2 ', 'P', '0891278161'),
(3, 'Echa', 'Kp Tipar ', 'L', '08976182910');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama`, `alamat`, `tlp`) VALUES
(1, 'Owner', 'Depok', '089789012101'),
(2, 'Owner 2', 'Kelapa Dua', '08912771921');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lainnya') NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(1, 1, 'kiloan', 'Pakaian Biasa Regulers', 6000),
(2, 1, 'kiloan', 'Pakaian Biasa Express', 9000),
(3, 1, 'bed_cover', 'Bed Cover', 9000),
(4, 1, 'selimut', 'Selimut ', 7000),
(5, 1, 'lainnya', 'Hanya  Setrika', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kd_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `cash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kd_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`, `total_bayar`, `cash`) VALUES
(1, 1, 'TR-050621001', 1, '2021-06-05 08:48:00', '2021-06-07 08:48:00', '2021-06-07 08:49:00', 2000, 20, 1000, 'proses', 'belum_dibayar', 1, 19200, 50000),
(2, 1, 'TR-050621002', 2, '2021-06-05 08:53:00', '2021-06-05 08:53:00', '2021-06-05 08:53:00', 1000, 10, 1000, 'baru', 'dibayar', 1, 38700, 50000),
(3, 1, 'TR-070621003', 3, '2021-06-07 10:08:00', '2021-06-09 10:08:00', '2021-06-07 10:09:00', 2000, 50, 1000, 'baru', 'dibayar', 4, 25000, 50000),
(4, 1, 'TR-070621004', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2000, 10, 1000, 'baru', 'dibayar', 4, 13500, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `id_outlet`, `role`) VALUES
(1, 'Admin', 'admin', '$2y$10$aUtUKVBxLhtH4vFu936R7./5Vcrr9b2fZ8HO4bvtCDZYaeaB7dUze', 1, 'admin'),
(3, 'Owner', 'owner', '$2y$10$YjFITDrKJfA0ioiQ15kJfugUwdxZaAErcVheQRzxkeGDdlESF1g22', 1, 'owner'),
(4, 'Kasir 1', 'kasir1', '$2y$10$rHK8d43HutZaXYZHJmsqBuP/rNCc7mnA5YAKIHkhHQS0/tDFWGUym', 1, 'admin'),
(5, 'Owner 2', 'owner2', '$2y$10$gQ1nek.vffswWLCdisdkTuoB26K7BAwNZM7IxdyTY2oydvX.sc.Ha', 2, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_dettransaksi`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_dettransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
