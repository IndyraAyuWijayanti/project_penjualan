-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2021 pada 11.00
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwm_tokoonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `jenis_berita`, `judul_berita`, `slug_berita`, `keywords`, `status_berita`, `keterangan`, `gambar`, `tanggal_post`, `tanggal_update`) VALUES
(2, 8, 'Style', 'Cowokmu Dijamin Suka, Ini Referensi Warna Kemeja Flanel Selain Hitam!', 'style-cowokmu-dijamin-suka-ini-referensi-warna-kemeja-flanel-selain-hitam', 'Cowokmu Dijamin Suka, Ini Referensi Warna Kemeja Flanel Selain Hitam!', 'Publish', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'Shopee_abf293768f0696f96bad30118e7dc494-01.jpeg', '2020-12-29 11:42:00', '2020-12-29 11:53:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(2, 13, 'Jumper Hoodie Kuning', '20200825153020_IMG_0129-02.jpeg', '2020-12-30 03:21:50'),
(3, 13, 'Jumper Hoodie Kuning', 'CollageMaker_20190904_110541066.jpg', '2020-12-30 03:22:07'),
(4, 13, 'Jumper Hoodie Kuning', 'CollageMaker_20190904_104620495.jpg', '2020-12-30 03:22:32'),
(5, 14, 'Jumper Hoodie blue', '20200825153807_IMG_0137-01.jpeg', '2020-12-30 03:23:24'),
(6, 14, 'Jumper Hoodie blue', 'CollageMaker_20190904_142346980.jpg', '2020-12-30 03:23:46'),
(7, 14, 'Jumper Hoodie blue', 'IMG_20200714_141717.jpg', '2020-12-30 03:24:01'),
(8, 15, 'Jumper Hoodie ', '20200825161339_IMG_0179-02.jpeg', '2020-12-30 03:24:20'),
(9, 15, 'Jumper Hoodie ', '20200825161405_IMG_0182-01.jpeg', '2020-12-30 03:24:29'),
(10, 15, 'Jumper Hoodie ', '20200825161410_IMG_0183-01.jpeg', '2020-12-30 03:24:41'),
(13, 18, 'Zipper Hoodie', '20200110_060828.jpg', '2021-01-14 15:52:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan1` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `nama_bank` varchar(150) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan1`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `batas_bayar`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(20, 0, 31, 'Agung Wahyu Gunawan', 'agung@gmail.com', '085816908859', 'Umbulsari', '210120216F3KBPDV', '2021-01-21 13:57:24', '2021-01-21 14:57:24', 210000, 'Konfirmasi', 210000, '0123909111', 'AGung', '5677080_cf2ef623-8e05-4c90-80ec-0a6edb107d3e_648_648.jpg', 1, NULL, 'BRI', '2021-01-21 13:57:24', '2021-01-21 07:44:14');

--
-- Trigger `header_transaksi`
--
DELIMITER $$
CREATE TRIGGER `transaksi_after_chgStatus` AFTER UPDATE ON `header_transaksi` FOR EACH ROW UPDATE transaksi
SET
id_user = new.id_user
WHERE
kode_transaksi = new.kode_transaksi
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(155) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(5, 'sweater-pria', 'Sweater Pria', 1, '2020-11-17 12:52:02'),
(6, 'sweater-wanita', 'Sweater Wanita', 2, '2020-11-17 12:52:11'),
(7, 'jaket-denim', 'Jaket Denim', 3, '2020-11-17 12:52:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'SWIPO Jember', NULL, 'swipojember@gmail.com', 'www.swipojember.com', 'ok', 'ok', '098766554444', 'Jember', 'swipo_jember', '@swipo', 'Website Untuk Reseller', 'logo_swipo.PNG', 'logo_swipo1.PNG', 'ok', '2020-12-22 18:00:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(20, 8, 'Pending', 'Agung Wahyu Gunawan', 'agungwahyu23699@gmail.com', 'e3e86d43002a494b7203dad168da9eb5e42dae14', '085816908859', 'Jl. Cokroaminoto 85 Gunungsari, Umbulsari, Jember                ', '2021-01-14 15:54:24', '2021-01-14 15:54:24'),
(21, 0, 'Pending', 'Fiqi Zulkarnain', 'fiqi12@gmail.com', '4a5b570c991f356c9ea0ee969f4442a3188a01a3', '09888819999', 'Jl. Semeru Sumbersari, Jember                ', '2021-01-14 08:56:06', '2021-01-14 14:56:06'),
(22, 0, 'Pending', 'Romi Alfandi', 'romi12@gmail.com', 'e2baca9350c0b80e7682977d2fda92210b48e457', '085816908859', 'Jl. Semeru Sumbersari, Jember', '2021-01-14 08:57:54', '2021-01-14 14:57:54'),
(23, 0, 'Pending', 'Sefia Novita', 'sefia123@gmail.com', 'e4a4cc7fbe3a4c866570d605e17627753edb727d', '0912233', 'Jl. Karimata 7, Sumbersari, Jember', '2021-01-14 08:58:48', '2021-01-14 14:58:48'),
(24, 0, 'Pending', 'Arina Rahmawati', 'arina12@gmail.com', 'c3d3299f3065b31d4c5d694d4c4b64ee5f7251c1', '09888819999', 'Jl. Jawa Gang 5 No 1, Jember', '2021-01-14 08:59:39', '2021-01-14 14:59:39'),
(25, 0, 'Pending', 'Utiya Listy Biyuma', 'utiya12@gmail.com', 'cfaee6552c3435a08aceaf34307d88e9bbe70a2e', '085816908859', 'Jl. Slamet Riyadi 90 Patrang, Jember', '2021-01-14 09:00:44', '2021-01-14 15:00:44'),
(26, 0, 'Pending', 'Ahmad Hadi', 'hadi12@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '08911188829', 'Jl. Karimata 90 Sumbersari, Jember', '2021-01-14 09:02:44', '2021-01-14 15:02:44'),
(27, 0, 'Pending', 'Bayu Lezka', 'bayu12@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '089123898777', 'Jl. Pb. Sudirman 12 Kaliwates, Jember', '2021-01-14 09:04:10', '2021-01-14 15:04:10'),
(28, 0, 'Pending', 'Sintya Karina', 'sintya12@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '098111928991', 'Jl. Cokroaminoto 90 Tanggul, Jember', '2021-01-14 09:05:31', '2021-01-14 15:05:31'),
(29, 0, 'Pending', 'Akbar Rayyan', 'akbar12@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '089787129888', 'Jl. Kalimantan IX No.12, Jember', '2021-01-14 09:06:39', '2021-01-14 15:06:39'),
(30, 0, 'Pending', 'Damar Aji Nugraha', 'damaraji12@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '089128111888', 'Jl. Sumatra 90 Sumbersari, Jember', '2021-01-14 09:07:34', '2021-01-14 15:07:34'),
(31, 8, 'Aktif', 'Gulam Mubarik', 'gulam@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '085816908859', 'Perum Tegal Gede No 12, Jember', '2021-01-14 15:58:31', '2021-01-14 15:58:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(13, 8, 5, 'JP001', 'Jumper Hoodie Kuning', 'jumper-hoodie-kuning-jp001', '<p>Jumper Hoodie Pria</p>\r\n', NULL, 100000, 4, '20200825152510_IMG_0121-01.jpeg', 1000, '10x10', 'Publish', '2020-12-21 09:40:00', '2021-01-20 15:21:25'),
(14, 8, 5, 'JP002', 'Jumper Hoodie Baby Blue', 'jumper-hoodie-baby-blue-jp002', '<p>Jumper Hoodie Baby Blue</p>\r\n', NULL, 100000, 3, '20200825153658_IMG_0132-01.jpeg', 1000, '10x10', 'Publish', '2020-12-21 09:40:00', '2021-01-20 15:00:20'),
(15, 8, 5, 'JP003', 'Jumper Hoodie Hitam', 'jumper-hoodie-hitam-jp003', '<p>Jumper Hoodie</p>\r\n', NULL, 100000, 6, '20200825161357_IMG_0181-01.jpeg', 1000, '10x10', 'Publish', '2020-12-21 09:41:00', '2021-01-21 06:57:24'),
(16, 8, 7, 'JJ001', 'Jaket Jeans Mocca', 'jaket-jeans-mocca-jj001', '<p>Jaket Jeans</p>\r\n', NULL, 110000, 5, 'IMG_20201006_131047-01.jpeg', 1000, '10x10', 'Publish', '2020-12-21 09:43:00', '2020-12-29 15:25:47'),
(17, 8, 7, 'JJ002', 'Jaket Jeans  Biru', 'jaket-jeans-biru-jj002', '<p>Jaket Jeans</p>\r\n', NULL, 110000, 995, 'IMG_20201006_123051-01.jpeg', 1000, '10x10', 'Publish', '2020-12-21 09:44:00', '2021-01-21 06:57:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(150) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BCA CABANG TANGGUL', '230699', 'AGUNG WAHYU', NULL, '2020-12-01 13:36:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(24, 0, 31, '210120216F3KBPDV', 15, 100000, 1, 100000, '2021-01-21 13:57:24', '2021-01-21 06:57:24'),
(25, 0, 31, '210120216F3KBPDV', 17, 110000, 1, 110000, '2021-01-21 13:57:24', '2021-01-21 06:57:24');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `barang_after_checkout` AFTER INSERT ON `transaksi` FOR EACH ROW UPDATE produk
SET
stok = stok-NEW.jumlah
WHERE
id_produk = new.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(8, 'SAIFUL BAHRI', 'saifulbahri@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2021-01-14 14:44:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

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
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
