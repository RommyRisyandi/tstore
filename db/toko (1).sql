-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2024 pada 07.16
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `keterangan`, `gambar`, `tanggal_post`, `tanggal_update`) VALUES
(5, 'New Promotion 2024 10%', '<p>new Promotion in 2024</p>\r\n', 'season.jpg', '2024-03-09 08:24:21', '2024-03-09 07:24:21'),
(6, 'New Promotion 2024', '<p>Discount 50%</p>\r\n', 'BI-SG-Featured-Images-Batch-2-2-1-1024x5363.jpg', '2024-03-10 09:11:34', '2024-03-10 08:11:34'),
(7, 'New Promotion 2024 25%', '<p>New Promiton 2024 10%</p>\r\n', 'BI-SG-Featured-Images-Batch-2-2-1-1024x5364.jpg', '2024-03-10 09:12:29', '2024-03-10 08:12:29'),
(8, 'Promotion New', '<p>Promotion New</p>\r\n', 'season1.jpg', '2024-03-10 09:12:59', '2024-03-10 08:12:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `link_alamat` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `id_toko`, `nama_cabang`, `no_wa`, `gambar`, `alamat`, `link_alamat`, `tanggal_update`) VALUES
(2, 12, 'Toko3 Sumedang', '08561246347', 'komugi-min-800x600-11.jpg', '<p>Alamat Toko3 Sumedang</p>\r\n', 'https://maps.app.goo.gl/Mj2GUK8dWpRA41K78', '2024-03-07 03:42:52'),
(3, 12, 'toko 3 Banten', '08561246347', 'almondine1.jpg', '<p>Jl.Banten</p>\r\n', 'https://maps.app.goo.gl/Mj2GUK8dWpRA41K78', '2024-03-08 00:39:33'),
(4, 12, 'Toko 3 Sudirman', '08561246347', 'komugi-min-800x600-12.jpg', '<p>jl.Sudirman</p>\r\n', 'https://maps.app.goo.gl/Mj2GUK8dWpRA41K78', '2024-03-08 00:40:20'),
(5, 12, 'Toko 3 Ahmad Yani', '08561246347', 'almondine2.jpg', '<p>jl.Ahmad Yani</p>\r\n', 'https://maps.app.goo.gl/Mj2GUK8dWpRA41K78', '2024-03-08 00:40:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'Roti', 'roti', 1, '2024-03-01 03:25:44'),
(2, 'Cake', 'cake', 2, '2024-03-08 00:34:16'),
(3, 'Lapis', 'lapis', 3, '2024-03-08 00:41:45'),
(4, 'cookies', 'cookies', 4, '2024-03-08 00:41:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `namaweb` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_update` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `alamat`, `email`, `facebook`, `icon`, `instagram`, `keywords`, `logo`, `metatext`, `namaweb`, `tagline`, `telepon`, `website`, `deskripsi`, `tanggal_update`) VALUES
(1, 'Jl.Sudarso', 'sudarso@gmail.com', 'sudarso cake', 'pngwing1.png', '@sudarsocake', 'sudarso cake', 'pngwing.png', 'farina_cake', 'Farina cake', '#farinacake', '08654312436', 'sudarsocake.co.id', 'deskripsi toko sudarso cake', '2024-03-07 01:14:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status_produk` varchar(64) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_toko`, `id_user`, `nama_produk`, `slug_produk`, `id_kategori`, `status_produk`, `gambar`, `harga`, `keterangan`, `tanggal_post`, `tanggal_update`) VALUES
(3, 12, 1, 'Black Forest', 'black-forest', 2, 'Publish', 'ebd3364ffc5ce43a5b53af5252d58f1c.jpeg', 25000, '<p>Keterangan American Cheese Roll</p>\r\n', '2024-03-05 03:42:26', '2024-03-08 00:36:16'),
(4, 12, 1, 'American Cheese Roll', 'american-cheese-roll', 1, 'Publish', '1a3cfbc9beae961052bf264ab159a4d61.jpeg', 20000, '<p>Keterangan Produk</p>\r\n', '2024-03-08 01:35:42', '2024-03-08 00:36:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai_rating` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_produk`, `nama`, `nilai_rating`, `keterangan`, `tanggal_post`, `tanggal_update`) VALUES
(1, 4, 'Adira', 3, 'mayan', '2024-03-12 09:02:32', '2024-03-12 08:02:32'),
(3, 4, 'Adira', 5, 'mantep', '2024-03-12 09:14:54', '2024-03-12 08:14:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slider` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `judul`, `slider`, `tanggal_post`) VALUES
(3, 'slider1', 'BI-SG-Featured-Images-Batch-2-2-1-1024x536.jpg', '0000-00-00 00:00:00'),
(4, 'slider2', 'season.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `link_alamat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `nama_pemilik`, `no_wa`, `alamat`, `link_alamat`, `gambar`, `tanggal_post`) VALUES
(10, 'Toko2', 'Surandi', '5854535421', '<p>asdasdasdasd</p>\r\n', 'https://maps.app.goo.gl/Mj2GUK8dWpRA41K78', 'almondine.jpg', '2024-03-04 04:04:45'),
(11, 'Toko1', 'Jl.Sudarso', '82215451515212', '<p>keterangan</p>\r\n', 'https://maps.app.goo.gl/Mj2GUK8dWpRA41K78', 'BI-SG-Featured-Images-Batch-2-2-1-1024x536.jpg', '2024-03-04 08:18:58'),
(12, 'Toko3', 'Surandi', '25788745663', '<p>keterangan</p>\r\n', 'https://maps.app.goo.gl/Mj2GUK8dWpRA41K78', 'season.jpg', '2024-03-04 09:12:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Admin', 'risyandirommy@gmail.com', 'risyandirommy', 'fff07fb189958ded368224a9890ffb7a8686bd87', 'Admin', '2024-02-28 00:20:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_toko_2` (`id_toko`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_toko` (`id_toko`,`id_user`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
