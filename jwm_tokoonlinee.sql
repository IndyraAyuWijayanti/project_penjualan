-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 02:29 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwm_tokoonlinee`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `jenis_berita`, `judul_berita`, `slug_berita`, `keywords`, `status_berita`, `keterangan`, `gambar`, `tanggal_post`, `tanggal_update`) VALUES
(2, 8, 'Style', 'Cowokmu Dijamin Suka, Ini Referensi Warna Kemeja Flanel Selain Hitam!', 'style-cowokmu-dijamin-suka-ini-referensi-warna-kemeja-flanel-selain-hitam', 'Cowokmu Dijamin Suka, Ini Referensi Warna Kemeja Flanel Selain Hitam!', 'Publish', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'Shopee_abf293768f0696f96bad30118e7dc494-01.jpeg', '2020-12-29 11:42:00', '2020-12-29 11:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
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
-- Table structure for table `header_transaksi`
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
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kota` varchar(60) NOT NULL,
  `provinsi` varchar(60) NOT NULL,
  `klas` varchar(40) NOT NULL,
  `standar_harga` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `jumlah_bayar1` int(11) NOT NULL,
  `tgl_bayar1` date NOT NULL,
  `bukti_bayar1` varchar(255) NOT NULL,
  `bank1` varchar(20) NOT NULL,
  `tgl_bayar2` date NOT NULL,
  `bukti_bayar2` varchar(255) NOT NULL,
  `bank2` varchar(20) NOT NULL,
  `jumlah_bayar2` int(11) NOT NULL,
  `tgl_bayar3` date NOT NULL,
  `bukti_bayar3` varchar(255) NOT NULL,
  `bank3` varchar(20) NOT NULL,
  `jumlah_bayar3` int(11) NOT NULL,
  `nomor_spk` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_cetak_do` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan1`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `batas_bayar`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`, `kota`, `provinsi`, `klas`, `standar_harga`, `harga`, `ongkir`, `diskon`, `total_tagihan`, `jumlah_bayar1`, `tgl_bayar1`, `bukti_bayar1`, `bank1`, `tgl_bayar2`, `bukti_bayar2`, `bank2`, `jumlah_bayar2`, `tgl_bayar3`, `bukti_bayar3`, `bank3`, `jumlah_bayar3`, `nomor_spk`, `keterangan`, `tgl_cetak_do`) VALUES
(20, 0, 31, 'Agung Wahyu Gunawan', 'agung@gmail.com', '085816908859', 'Umbulsari', '210120216F3KBPDV', '2021-01-21 13:57:24', '2021-01-21 14:57:24', 210000, 'Konfirmasi', 210000, '0123909111', 'AGung', '5677080_cf2ef623-8e05-4c90-80ec-0a6edb107d3e_648_648.jpg', 1, NULL, 'BRI', '2021-01-21 13:57:24', '2021-01-21 07:44:14', '', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00', '', '', '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '', '', '0000-00-00');

--
-- Triggers `header_transaksi`
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(155) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(5, 'Benih Robusta/Liberika', 'Benih Robusta/Liberika', 1, '2021-11-10 14:17:53'),
(6, 'Benih Kopi Arabika', 'Benih Kopi Arabika', 2, '2021-11-10 14:18:30'),
(7, 'Bibit Kopi Robusta Super', 'Bibit Kopi Robusta Super', 3, '2021-11-10 14:19:02'),
(8, 'bibit-kopi-robusta-seedling', 'Bibit Kopi Robusta Seedling', 4, '2021-11-10 14:21:26'),
(9, 'bibit-kopi-robusta-setek', 'Bibit Kopi Robusta Setek', 5, '2021-11-10 14:21:54'),
(10, 'planlet-kopi-robusta-arabika-liberika-se', 'Planlet Kopi Robusta / Arabika/ Liberika/ SE', 6, '2021-11-10 14:22:48'),
(11, 'bibit-kopi-arabika-super', 'Bibit Kopi Arabika Super', 7, '2021-11-10 14:23:18'),
(12, 'bibit-kopi-arabika-seedling', 'Bibit Kopi Arabika Seedling', 8, '2021-11-10 14:23:46'),
(13, 'bibit-kopi-liberika', 'Bibit Kopi Liberika', 9, '2021-11-10 14:24:08'),
(14, 'bibit-pejenis-kopi', 'Bibit Pejenis Kopi', 10, '2021-11-10 14:24:28'),
(15, 'benih-kakao', 'Benih Kakao', 11, '2021-11-10 14:25:03'),
(16, 'bibit-kakao-pcc', 'Bibit Kakao PCC', 12, '2021-11-10 14:25:31'),
(17, 'bibit-kakao-osc', 'Bibit Kakao OSC', 13, '2021-11-10 14:25:56'),
(18, 'bibit-kakao-sambung-pucuk', 'Bibit Kakao Sambung Pucuk', 14, '2021-11-10 14:26:20'),
(19, 'bibit-kakao-mulia-klonal', 'Bibit Kakao Mulia Klonal', 15, '2021-11-10 14:27:00'),
(20, 'bibit-kakao-hibrida', 'Bibit Kakao Hibrida', 16, '2021-11-10 14:27:16'),
(21, 'planlet-kakao-se', 'Planlet Kakao SE', 17, '2021-11-10 14:27:42'),
(22, 'bibit-pejenis-kakao', 'Bibit Pejenis Kakao', 18, '2021-11-10 14:28:06'),
(23, 'bibit-pisang', 'Bibit Pisang', 19, '2021-11-10 14:28:27'),
(24, 'lamtoro-klonal-setekcangkok', 'Lamtoro Klonal (Setek/Cangkok)', 19, '2021-11-10 14:29:04'),
(25, 'benih-lamtoro', 'Benih Lamtoro', 20, '2021-11-10 14:29:21'),
(26, 'entres-kopi-dan-kakao', 'Entres Kopi Dan Kakao', 21, '2021-11-10 14:29:41'),
(27, 'saprodi', 'Saprodi', 22, '2021-11-10 14:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelanggan`
--

CREATE TABLE `kategori_pelanggan` (
  `id_kategoripelanggan` int(11) NOT NULL,
  `slug_kategoripelanggan` varchar(200) NOT NULL,
  `nama_kategoripelanggan` varchar(50) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pelanggan`
--

INSERT INTO `kategori_pelanggan` (`id_kategoripelanggan`, `slug_kategoripelanggan`, `nama_kategoripelanggan`, `urutan`, `tanggal_update`) VALUES
(2, 'pekebun', 'Pekebun', 1, '2021-11-29 01:36:37'),
(4, 'swastango', 'Swasta/NGO', 2, '2021-11-22 02:07:44'),
(5, 'dinas', 'Dinas', 3, '2021-11-22 02:08:39'),
(6, 'bumn', 'BUMN', 4, '2021-11-22 02:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'SWIPO Jember', NULL, 'swipojember@gmail.com', 'www.swipojember.com', 'ok', 'ok', '098766554444', 'Jember', 'swipo_jember', '@swipo', 'Website Untuk Reseller', 'logo_swipo.PNG', 'logo_swipo1.PNG', 'ok', '2020-12-22 18:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategoripelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_identitas` varchar(40) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `telepon_kantor` varchar(13) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alamat_pengiriman` varchar(150) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `iupb` varchar(255) NOT NULL,
  `nib` varchar(255) NOT NULL,
  `siup` varchar(255) NOT NULL,
  `slug_pelanggan` varchar(255) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `id_kategoripelanggan`, `nama_pelanggan`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`, `no_identitas`, `nama_perusahaan`, `telepon_kantor`, `no_rekening`, `hp`, `kota`, `provinsi`, `gambar`, `alamat_pengiriman`, `keterangan`, `iupb`, `nib`, `siup`, `slug_pelanggan`, `status_pelanggan`) VALUES
(5, 12, 2, 'indyra', '', NULL, 'Banyuwangiww', '2021-11-30 01:41:17', '2021-11-30 01:41:17', '357207778889900007', 'pt indy', '112232', '11222', '0856177722', 'blitar', 'jatim', '', '', 'lunas', 'bukurekeningindy.jpg', 'bukurekeningindy.jpg', 'bukurekeningindy.jpg', '', ''),
(6, 12, 2, 'indyra ayu', '', NULL, 'blitar', '2021-11-30 02:16:46', '2021-11-30 02:16:46', '357207778889900005', 'pt indy', '112232', '11222', '0856177722', 'blitar', 'jatim', '', '', 'lunas', 'iconadmin.png', 'iconadmin.png', 'iconadmin.png', '', ''),
(7, 12, 4, 'indyra ayu w', '', NULL, 'blitar', '2021-11-30 02:22:25', '2021-11-30 02:22:25', '357207778889900009', 'pt indy', '112232', '11222', '0856177722', 'blitar', 'jatim', '', '', 'hutang', 'images.png', 'images.png', 'images.png', '', ''),
(8, 12, 5, 'indyra ayu w', '', NULL, 'blitar', '2021-11-30 03:43:42', '2021-11-30 03:43:42', '357207778889900009', 'pt indy', '112232', '11222', '0856177722', 'blitar', 'jatim', '', '', 'hutang', 'brnda4.png', 'brnda4.png', 'brnda4.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(18, 12, 5, 'BNRPG', 'Benih Propelegetim BP 42 x BP 358', 'benih-propelegetim-bp-42-x-bp-358-bnrpg', NULL, NULL, 500, NULL, 'kopi8.jpg', NULL, NULL, 'Publish', '2021-11-10 16:42:00', '2021-11-11 00:51:57'),
(20, 12, 5, 'BNRHS', 'Benih Robusta Hibiro 1', 'benih-robusta-hibiro-1-bnrhs', NULL, NULL, 750, NULL, 'kopi9.jpg', NULL, NULL, 'Publish', '2021-11-11 01:51:00', '2021-11-11 00:51:43'),
(21, 12, 5, 'RBSH2', 'Benih Robusta Hibiro 2', 'benih-robusta-hibiro-2-rbsh2', NULL, NULL, 500, NULL, 'kopi10.jpg', NULL, NULL, 'Publish', '2021-11-15 02:19:00', '2021-11-15 01:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(150) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BCA CABANG TANGGUL', '230699', 'AGUNG WAHYU', NULL, '2020-12-01 13:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
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
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(24, 0, 31, '210120216F3KBPDV', 15, 100000, 1, 100000, '2021-01-21 13:57:24', '2021-01-21 06:57:24'),
(25, 0, 31, '210120216F3KBPDV', 17, 110000, 1, 110000, '2021-01-21 13:57:24', '2021-01-21 06:57:24');

--
-- Triggers `transaksi`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(10, 'admin', 'indyra.wijayanti@gmail.com', 'indyra12', '5e9795e3f3ab55e7790a6283507c085db0d764fc', 'Admin', '2021-11-15 01:17:16'),
(11, 'indy', 'indy@gmail.com', 'indy123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin', '2021-11-10 07:13:41'),
(12, 'admin', 'admin@gmail.com', 'admin1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2021-11-10 07:14:52'),
(13, 'eva', 'eva@gmail.com', 'eva123', '0050a3a1ab3d2530b34577213a85f11e8add3b42', 'Admin', '2021-11-15 01:16:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_pelanggan`
--
ALTER TABLE `kategori_pelanggan`
  ADD PRIMARY KEY (`id_kategoripelanggan`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori_pelanggan`
--
ALTER TABLE `kategori_pelanggan`
  MODIFY `id_kategoripelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
