-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2018 pada 07.39
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_growbook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `penerbit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `kategori`, `nama`, `harga`, `stok`, `penerbit`) VALUES
('B1001', 'Keilmuan', 'Bisnis Online', 12000, 12, 'Andi Offset'),
('B1002', 'Bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', 67500, 20, 'Penerbit Informatika'),
('K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi', 50000, 60, 'Penerbit Informatika'),
('K1002', 'Keilmuan', 'Artificial Intelligence', 45000, 60, 'Penerbit Informatika'),
('K2003', 'Keilmuan', 'Autocad 3 Dimensi', 40000, 25, 'Penerbit Informatika'),
('K3004', 'Keilmuan', 'Cloud Computing Technology', 85000, 15, 'Penerbit Informatika'),
('N1001', 'Keilmuan', 'Cahaya Di Penjuru Hatis', 68000, 10, 'Andi Offset'),
('N1002', 'Novel', 'Aku Ingin Cerita', 48000, 12, 'Danendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_franchise`
--

CREATE TABLE `tb_franchise` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `telepon` int(11) NOT NULL,
  `masa_berlaku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_franchise`
--

INSERT INTO `tb_franchise` (`id`, `user_id`, `nama_pemilik`, `alamat`, `kota`, `telepon`, `masa_berlaku`) VALUES
('F001', 1, 'Febri Aganan', 'Jl. Iskandar Muda No 24', 'Medan', 614522222, 11),
('F002', 2, 'Selly Hasan', 'Jl. Kolonel Atmo No. 45', 'Palembang', 711357733, 25),
('F003', 3, 'Tenri Uleng', 'Jl. Gunung Bulukunyi No. 2', 'Makassar', 411852450, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `telepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id`, `nama`, `alamat`, `kota`, `telepon`) VALUES
('SP02', 'Andi Offset', 'Jl. Suryalaya IX No.3', 'Bandungs', 2147483647),
('SP03', 'Danendra', 'Jl. Moch. Toha 44', 'Bandung', 225201215),
('SP01', 'Penerbit Informatika', 'Jl. Buah Batu No. 121', 'Bandung', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `nama_pemesan`, `nama_buku`, `jumlah`, `total`) VALUES
(1, 'Selly Hasan', 'Analisis & Perancangan Sistem Informasi', 12, 600000),
(2, 'Febri Aganan', 'Bisnis Online', 12, 144000),
(3, 'Selly Hasan', 'Autocad 3 Dimensi', 23, 920000),
(4, 'Febri Aganan', 'Autocad 3 Dimensi', 2, 80000),
(5, 'Febri Aganan', 'Cahaya Di Penjuru Hatis', 5, 340000),
(6, 'Febri Aganan', 'Aku Ingin Cerita', 2, 96000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `password`, `email`, `role`) VALUES
(1, 'Febri Aganan', 'febri', 'febri@franchise.com', 'franchise'),
(2, 'Selly Hasan', 'selly', 'selly@franchise.com', 'franchise'),
(3, 'Tenri Uleng', 'tenri', 'tenri@franchise.com', 'franchise'),
(5, 'admin', 'admin', 'admin@franchise.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_PENERBIT_TBBUKU` (`penerbit`);

--
-- Indeks untuk tabel `tb_franchise`
--
ALTER TABLE `tb_franchise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_USERID_TBFRANCHISE` (`user_id`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`nama`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `FK_PENERBIT_TBBUKU` FOREIGN KEY (`penerbit`) REFERENCES `tb_penerbit` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_franchise`
--
ALTER TABLE `tb_franchise`
  ADD CONSTRAINT `FK_USERID_TBFRANCHISE` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
