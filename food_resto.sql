-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2022 pada 02.01
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hugga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_foto` varchar(255) NOT NULL,
  `admin_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`, `admin_level`) VALUES
('0904d1ec671370b71091880210991d38', 'Anwar', 'ksr1', '$2y$10$zWXT/M9icPzxudoAJ4qtje.iAb0QqfJgTKxyHMrYlERqSqNYNSiC.', 'avatar.jpg', 2),
('391959cea0895afd0c754b20de28d139', 'Ryan', 'koki1', '$2y$10$LKOCDRC5t/dKRDumHyznx.nzaCvgEyFiMzwg6AISwGSdDP2jm1kCq', 'avatar.jpg', 3),
('a6084148c57270000774fcda5f51832b', 'Admin', 'adm1', '$2y$10$XyJ7/N06NLuG9vZC5Zv0Q.VRDsNkHfr5aY03gRGdgUAAPzhidmp8C', 'avatar.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `dt_id` varchar(255) NOT NULL,
  `dt_item` varchar(255) NOT NULL,
  `dt_qty` int(11) NOT NULL,
  `dt_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`dt_id`, `dt_item`, `dt_qty`, `dt_subtotal`) VALUES
('dc8f276fabdf82600c3c72e467df3c12', '011605bee6aab192b4d195bd433cdac6', 1, 7000),
('dc8f276fabdf82600c3c72e467df3c12', '0da9fd384bc57d1225b05806dbe07bad', 1, 25000),
('d34fe60c76400abf17bda3edcf2a66c5', '181ecf20fae21411bc361fdfa3858f06', 1, 5000),
('d34fe60c76400abf17bda3edcf2a66c5', '217c420c3f26d8560d254ed1a1760f8b', 1, 6000),
('d34fe60c76400abf17bda3edcf2a66c5', 'a6fda163a4829057fb7531e1305cec04', 2, 12000),
('d34fe60c76400abf17bda3edcf2a66c5', '6cf4f6b9e9b7abbab9d5607e466b221c', 1, 3500),
('d17541651beed4616936a54ec65a73ac', '011605bee6aab192b4d195bd433cdac6', 1, 7000),
('d17541651beed4616936a54ec65a73ac', '217c420c3f26d8560d254ed1a1760f8b', 1, 6000),
('d17541651beed4616936a54ec65a73ac', 'c8970e25d27ec23d4d07ecb6917670bc', 1, 37000),
('d17541651beed4616936a54ec65a73ac', '5ff1dff4654ab66e116e2febad27e0e2', 1, 4000),
('c879d71d58ec26a143f0f03f6523b8c8', '011605bee6aab192b4d195bd433cdac6', 1, 7000),
('c879d71d58ec26a143f0f03f6523b8c8', '09ac4d5629617fe348bf5caad5d98aba', 1, 22000),
('36e42b4da704d1378e9d8ff2d979e631', '1d7819503f83da21edf582ed936c3f8c', 1, 35000),
('36e42b4da704d1378e9d8ff2d979e631', '3cfed870e71702fc909919c912814b81', 1, 18000),
('f82eb6cf11ac86a64c009150e8fc7cdc', '011605bee6aab192b4d195bd433cdac6', 1, 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(93803358, 'Aneka Mie'),
(415521233, 'Aneka Ayam'),
(590259289, 'Sayuran'),
(919387705, 'Fish & Seafood'),
(1001381012, 'Minuman'),
(1230920544, 'Pembuka'),
(1895936792, 'Aneka Nasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_meja`
--

CREATE TABLE `tb_meja` (
  `meja_id` int(11) NOT NULL,
  `meja_no` int(11) NOT NULL,
  `meja_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_meja`
--

INSERT INTO `tb_meja` (`meja_id`, `meja_no`, `meja_status`) VALUES
(368453307, 3, 2),
(548773073, 1, 2),
(1268705115, 2, 2),
(1318441330, 4, 1),
(1882383911, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `menu_id` varchar(255) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `menu_harga` int(11) NOT NULL,
  `menu_foto` varchar(255) NOT NULL,
  `menu_stok` varchar(255) NOT NULL,
  `menu_kategori` int(11) NOT NULL,
  `menu_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`menu_id`, `menu_nama`, `menu_harga`, `menu_foto`, `menu_stok`, `menu_kategori`, `menu_created`) VALUES
('011605bee6aab192b4d195bd433cdac6', 'Jus Jeruk', 7000, 'fc52786b399751d9d9b32bf705655b66.jpg', 'Tersedia', 1001381012, '2022-08-15 04:02:38'),
('0360af40816dd42ce8e59baf85862a67', 'Ayam Penyet Pepes Tahu', 32000, '927f9d68b998da2e8d411a0af09bc0f3.jpg', 'Tersedia', 415521233, '2022-08-15 03:37:27'),
('09ac4d5629617fe348bf5caad5d98aba', 'Nasi Goreng Seafood', 22000, 'b0be97ddc5e4200051eedf58a4bcbd58.jpg', 'Tersedia', 1895936792, '2022-08-15 03:24:27'),
('0da9fd384bc57d1225b05806dbe07bad', 'Gurame Goreng Bumbu Kuning', 25000, '9d04377d4a9bd9c54f641d8394f0b356.jpg', 'Tersedia', 919387705, '2022-08-15 03:50:48'),
('159a3b27bce724e91f3916c0249d21ed', 'Nila Bakar Pedas Manis', 28000, '18c876e2dad7dfd270ebdbf2cda3cca4.jpg', 'Tersedia', 919387705, '2022-08-15 03:52:30'),
('181ecf20fae21411bc361fdfa3858f06', 'Es Teh', 5000, 'e4582875ae50ad4a1790b55b93b7299d.jpg', 'Tersedia', 1001381012, '2022-08-15 04:03:16'),
('1d7819503f83da21edf582ed936c3f8c', 'Cumi Goreng Tepung', 35000, 'eb721b0a6c9e5b03ee97efe20c96936a.jpg', 'Tersedia', 919387705, '2022-08-15 03:53:28'),
('217c420c3f26d8560d254ed1a1760f8b', 'Nasi Putih', 6000, 'fe325ca5531bd8e658d7d7557fadfc2e.jpg', 'Tersedia', 1895936792, '2022-08-15 03:20:34'),
('31ce48dbc74b19d7b8a5fc14cc469d25', 'Bihun Goreng Spesial', 15000, 'c7c4979f5629ea2c5bbbfa15c636f49f.jpg', 'Tersedia', 93803358, '2022-08-15 03:48:10'),
('341726c8e318068525310966a7baf3e0', 'Cumi Saus Tiram', 32000, '737367f712e419b9a899786ac9711446.jpg', 'Tersedia', 919387705, '2022-08-15 03:54:43'),
('3cfed870e71702fc909919c912814b81', 'Nasi Capcay', 18000, '87ca72c90c4119da43ee9e1b75311a90.jpg', 'Tersedia', 1895936792, '2022-08-15 03:26:07'),
('4a6904f12f133ac794d402470b55d845', 'Gurame Bakar Pedas Manis', 28000, 'de7ab12f6e56e7222bc77204eb1ea094.jpg', 'Tersedia', 919387705, '2022-08-15 03:49:41'),
('5ff1dff4654ab66e116e2febad27e0e2', 'Sayur Asem', 4000, '952e0dada0656c8d97c7f6749b0afacc.jpg', 'Tersedia', 590259289, '2022-08-15 04:01:20'),
('61b27c51be70e971f68bb475d11ccdea', 'Nasi Timbel', 10000, '3fc3769a9c1fbfa0648acad90f820ea0.jpg', 'Tersedia', 1895936792, '2022-08-15 03:22:28'),
('6cf4f6b9e9b7abbab9d5607e466b221c', 'Tempe Goreng', 3500, 'ff951fa1eb8075f4c02b8be70d764558.jpg', 'Tersedia', 1230920544, '2022-08-15 03:14:25'),
('9fa5a6784e25dd485bfd941cf2f3cec4', 'Kangkung Tumis', 7000, '4778c2df36c283f6f43f9b008e7e8eb3.jpg', 'Tersedia', 590259289, '2022-08-15 03:59:35'),
('a6fda163a4829057fb7531e1305cec04', 'Kentang Goreng', 6000, '3737624bee8c87ce70cfa9a46b800990.jpg', 'Tersedia', 1230920544, '2022-08-15 03:10:12'),
('be0b1780c9339d4f85535a3394a9abc2', 'Mie Goreng Seafood', 20000, '473e88e61aa5d4a833e4a5f6244caebd.jpg', 'Tersedia', 93803358, '2022-08-15 03:44:38'),
('c8970e25d27ec23d4d07ecb6917670bc', 'Udang Goreng Tepung', 37000, 'f32554592cec89e223503afd244f666b.jpg', 'Tersedia', 919387705, '2022-08-15 03:57:37'),
('ce772f9c7f65b0f8804359d2fbb259db', 'Mie Goreng Spesial', 17500, 'bd6efaee85d61f424f88646f270575d7.jpg', 'Tersedia', 93803358, '2022-08-15 03:45:55'),
('deacc4ee4709af9d207e0b4d5516a774', 'Cumi Goreng Asem', 35000, 'aa721d7b0270639e068c4c6b19555084.jpg', 'Tersedia', 919387705, '2022-08-15 03:56:26'),
('e59d7fe5f4b40f6f6e0b178dab1b1bea', 'Ayam Bakar Madu', 25000, '571d922171c8671aa99feb434f9145df.jpg', 'Tersedia', 415521233, '2022-08-15 03:36:23'),
('e7eea6f12f464a834eda5c060fb20bc8', 'Tahu Petis', 5000, 'c92c5449956e0ca89d4a44bc4bae1560.jpg', 'Kosong', 1230920544, '2022-08-15 03:16:40'),
('fcc7dfe4190e06040ec0dba028e73a6f', 'Ayam Goreng Tulang Lunak', 25000, '04064078fd9261166f33fb2187f91b99.jpg', 'Tersedia', 415521233, '2022-08-15 03:34:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` varchar(255) NOT NULL,
  `transaksi_kode` varchar(255) NOT NULL,
  `transaksi_urut` int(11) NOT NULL,
  `transaksi_tgl` date NOT NULL,
  `transaksi_meja` int(11) NOT NULL,
  `transaksi_total` int(11) NOT NULL,
  `transaksi_status` varchar(255) NOT NULL,
  `transaksi_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_kode`, `transaksi_urut`, `transaksi_tgl`, `transaksi_meja`, `transaksi_total`, `transaksi_status`, `transaksi_created`) VALUES
('36e42b4da704d1378e9d8ff2d979e631', 'PSN22080005', 5, '2022-08-16', 3, 53000, 'Pending', '2022-08-16 09:49:27'),
('c879d71d58ec26a143f0f03f6523b8c8', 'PSN22080004', 4, '2022-08-16', 1, 29000, 'Pending', '2022-08-16 09:36:32'),
('d17541651beed4616936a54ec65a73ac', 'PSN22080003', 3, '2022-08-16', 5, 54000, 'Diproses', '2022-08-16 09:19:21'),
('d34fe60c76400abf17bda3edcf2a66c5', 'PSN22080002', 2, '2022-08-16', 4, 26500, 'Selesai', '2022-08-16 09:14:44'),
('dc8f276fabdf82600c3c72e467df3c12', 'PSN22080001', 1, '2022-08-16', 2, 32000, 'Selesai', '2022-08-16 03:59:00'),
('f82eb6cf11ac86a64c009150e8fc7cdc', 'PSN22080006', 6, '2022-08-16', 2, 7000, 'Pending', '2022-08-16 10:00:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD KEY `dt_id` (`dt_id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`meja_id`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`dt_id`) REFERENCES `tb_transaksi` (`transaksi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
