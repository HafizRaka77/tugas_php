-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2023 pada 17.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8_unicode_ci NOT NULL,
  `telpon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telpon`, `alamat`) VALUES
(1, 'Pelanggan A', 'pria', '0829174111', 'Bandung'),
(2, 'Pelanggan B', 'wanita', '0129174111', 'Bandung'),
(3, 'Pelanggan C', 'pria', '07401641', 'Jakarta'),
(4, 'Pelanggan D', 'wanita', '0129174111', 'Cimahi'),
(5, 'Pelanggan E', 'pria', '0829174111', 'Bandung'),
(6, 'Pelanggan F', 'wanita', '0129174111', 'Bandung'),
(7, 'Pelanggan G', 'pria', '07401641', 'Jakarta'),
(8, 'Pelanggan H', 'wanita', '0129174111', 'Cimahi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) UNSIGNED NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total` int(11) NOT NULL,
  `metode` enum('tunai','edc','transfer') COLLATE utf8_unicode_ci NOT NULL,
  `penjualan_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tanggal_bayar`, `total`, `metode`, `penjualan_id`) VALUES
(1, '2021-09-01', 1000, 'tunai', 1),
(2, '2021-09-01', 1000, 'tunai', 2),
(3, '2021-09-01', 1000, 'tunai', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `pelanggan_id` int(11) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `keterangan`, `pelanggan_id`, `total`) VALUES
(1, '2021-08-11', '-', 2, 1000),
(2, '2021-08-18', '-', 5, 1000),
(3, '2021-09-07', '-', 1, 1000),
(4, '2021-09-01', '-', 7, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `penjualan_id` int(11) UNSIGNED NOT NULL,
  `produk_id` int(11) UNSIGNED NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `total`) VALUES
(1, 1, 4, 1, 200),
(2, 1, 1, 1, 200),
(3, 2, 5, 1, 1000),
(4, 3, 8, 2, 1000),
(6, 4, 6, 1, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) UNSIGNED NOT NULL,
  `kode_produk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga`, `stok`, `satuan`, `supplier_id`) VALUES
(1, '1889', 'Produk 1', 1000, 10, 'pcs', 1),
(2, '3788', 'Produk 2', 1500, 20, 'pcs', 1),
(3, '1881', 'Produk 3', 4000, 15, 'pcs', 3),
(4, '1788', 'Produk 4', 5500, 18, 'pcs', 4),
(5, '4889', 'Produk 5', 1000, 10, 'pcs', 1),
(6, '4788', 'Produk 6', 1500, 20, 'pcs', 1),
(7, '4881', 'Produk 7', 4000, 15, 'pcs', 3),
(8, '3788', 'Produk 8', 5500, 18, 'pcs', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telpon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telpon`, `alamat`) VALUES
(1, 'Supplier 1', '0829174111', 'Bandung'),
(2, 'Supplier 2', '1937737302', 'Jakarta'),
(3, 'Supplier 3', '72727199', 'Cimahi'),
(4, 'Supplier 4', '447741010', 'Bandung');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_penjualan_id` (`penjualan_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_detail_penjualan_id` (`penjualan_id`),
  ADD KEY `penjualan_detail_produk_id` (`produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_penjualan_id` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_pelanggan_id` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_detail_penjualan_id` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penjualan_detail_produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
