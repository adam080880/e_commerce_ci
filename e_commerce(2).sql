-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Okt 2019 pada 13.35
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_profile`
--

CREATE TABLE `alamat_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kode_pos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tipe` text NOT NULL,
  `size` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `image_url` text,
  `stok` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `tipe`, `size`, `harga`, `kategori_id`, `image_url`, `stok`, `created_at`) VALUES
(7, 'Celana Partai Negara Laut', 'Celana Partai', 'XL', 15000, 10, NULL, 100, '2019-10-14 13:30:43'),
(8, 'Baju Partai Negara Internet', 'test,seru,bagus', 'XXL', 15000, 9, NULL, 200, '2019-10-16 13:22:13'),
(9, 'Celana Jeans', 'Keras', '10', 1000, 10, NULL, 10, '2019-10-14 13:30:43'),
(10, 'Baju malas', 'Baju Malas', 'XL', 25000, 9, NULL, 50, '2019-10-16 13:20:35'),
(11, 'lil baju', 'santuy,calm,free', 'XXL', 150000, 9, NULL, 1000, '2019-10-16 13:23:19'),
(12, 'test', 'testa,coba,main', 'M', 4000, 9, NULL, 20, '2019-10-16 13:28:06');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_v`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_v` (
`nama` text
,`kategori` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `amount` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(9, 'Baju'),
(10, 'Celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `kirim` date NOT NULL,
  `terima` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `alamat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `diskon` double UNSIGNED NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pengiriman_id` int(11) DEFAULT NULL,
  `status` enum('unverified','verified') NOT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT NULL,
  `verified` enum('verified_admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `token`, `role`, `verified`) VALUES
(2, 'muhamadadam20@gmail.com', 'mrzombie80', '$2y$10$rPiiucr7PKDY58cZlTMP.eq/xi.y/Boex94KffKf3esMHYtzzFdSy', '$2y$10$S20TmVfbqrMPQYS/njLILO9qvBpS609e3q4RyksmrDPLEeHE/uH9.', 'admin', 'verified_admin'),
(4, 'coba@test.com', 'cobacoba', '$2y$10$AHT9EI2pRxJJYmNPKs12y.sM9MwxnEyCoBqv0op.21zz4MGI9dcNa', '$2y$10$J7SRABvgzL8xFxofrsuCHO9qLAaExwoFHkbqVX3UfasrGUMwoK3jm', 'admin', ''),
(5, 'coba@testtest.com', 'test', '$2y$10$JT6EZA2DDoaBXGAAjd54kuHyvNCRG91Edmi5Gqnk.ZCvPnUv85b0m', '$2y$10$0VGvzCTToAQ4yaiSH5gplOrXvzMM33eb3P8FXLa0GXgfJWb/jC6CO', 'admin', ''),
(6, 'akusampah404@gmail.com', 'akunsampah', '$2y$10$ioSJ7eMxwGjuwa/EfJF/I.lk9yWTqqr.IrOzyZeQ/eRLoiIMi3MfO', '$2y$10$cPXM.7Oki4SDngn5GgxXfeeaXK0f1ir6fr7QiKk3PgKPJ8mshoREK', 'customer', NULL),
(7, 'test@gmail.com', 'adamadam', '$2y$10$g1KWPeABNmHWZXuQSHUfAeUeoaVi.XWDCRxaOdKeJGsrxc76PNvM2', '$2y$10$qNyLmxi9AzbByUG4aRRUXOh5bmMxmG53KYVpEp2q8hvWmcmlUEu72', 'customer', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaksi` (
);

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_v`
--
DROP TABLE IF EXISTS `barang_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_v`  AS  select `b`.`nama` AS `nama`,`k`.`kategori` AS `kategori` from (`barang` `b` join `kategori` `k`) where (`b`.`kategori_id` = `k`.`id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `transaksi`.`id` AS `id`,`users`.`username` AS `username`,`alamat_profile`.`alamat` AS `alamat`,`alamat_profile`.`provinsi` AS `provinsi`,`alamat_profile`.`kota_kab` AS `kota_kab`,`alamat_profile`.`kecamatan` AS `kecamatan`,`alamat_profile`.`kelurahan` AS `kelurahan`,`alamat_profile`.`kode_pos` AS `kode_pos`,`transaksi`.`created_at` AS `created_at`,`transaksi`.`status` AS `status` from ((`transaksi` join `users`) join `alamat_profile`) where ((`transaksi`.`user_id` = `users`.`id`) and (`transaksi`.`alamat_id` = `alamat_profile`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat_profile`
--
ALTER TABLE `alamat_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_resi` (`no_resi`),
  ADD KEY `alamat_id` (`alamat_id`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_uniq` (`token`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengiriman_id` (`pengiriman_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat_profile`
--
ALTER TABLE `alamat_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_profile`
--
ALTER TABLE `alamat_profile`
  ADD CONSTRAINT `alamat_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`alamat_id`) REFERENCES `alamat_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
