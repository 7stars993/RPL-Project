-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2024 pada 02.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `ID_KARYAWAN` int(11) NOT NULL,
  `ID_ROLE` int(11) DEFAULT NULL,
  `USERNAME_KARYAWAN` varchar(30) NOT NULL,
  `PASSWORD_KARYAWAN` varchar(256) NOT NULL,
  `NAMA_KARYAWAN` varchar(100) NOT NULL,
  `NO_TELP_KARYAWAN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`ID_KARYAWAN`, `ID_ROLE`, `USERNAME_KARYAWAN`, `PASSWORD_KARYAWAN`, `NAMA_KARYAWAN`, `NO_TELP_KARYAWAN`) VALUES
(1, 1, 'star993', 'e4bee8699d14227d5d58ef72b593233c152b1572013a8ddb8b2d6bd3b6bdc505', 'Bintang Widya Narendra', '82143759812'),
(2, 2, 'bintang12', '3f8981477fb6e4458919b3d920942e5b107aca572728af81d69f0219e3947e77', 'bintang', '812446588913');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `KODE_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`KODE_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'Sarapan'),
(2, 'Daging'),
(3, 'Ayam'),
(4, 'Ikan'),
(5, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `KODE_MAKANAN` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `CREATED_AT_K` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_AT_M` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `KODE_MAKANAN` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) DEFAULT NULL,
  `KODE_KATEGORI` int(11) DEFAULT NULL,
  `NAMA_MAKANAN` varchar(100) NOT NULL,
  `GAMBAR_MAKANAN` varchar(255) NOT NULL,
  `HARGA_MAKANAN` int(11) NOT NULL,
  `STOK_PRODUK` int(11) NOT NULL,
  `CREATED_AT_M` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_AT_M` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`KODE_MAKANAN`, `ID_SUPPLIER`, `KODE_KATEGORI`, `NAMA_MAKANAN`, `GAMBAR_MAKANAN`, `HARGA_MAKANAN`, `STOK_PRODUK`, `CREATED_AT_M`, `UPDATE_AT_M`) VALUES
(3, 1, 1, 'Egg McMuffin', 'Egg McMuffin.png', 19000, 988, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(4, 1, 1, 'Chicken Muffin with Egg', 'Chicken Muffin with Egg.png', 24000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(5, 1, 1, 'Sausage McMuffin with Egg', 'Sausage McMuffin with Egg.png', 25000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(6, 1, 1, 'Egg and Cheese Muffin', 'Egg and Cheese Muffin.png', 20000, 996, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(7, 1, 1, 'Hotcakes 3 pcs', 'Hotcakes 3 pcs.png', 21000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(8, 1, 1, 'Hotcakes 2 pcs', 'Hotcakes 2 pcs.png', 18000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(9, 1, 1, 'Hashbrown', 'Hashbrown.png', 14000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(10, 1, 1, 'Big Breakfast', 'Big Breakfast.png', 35000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(11, 1, 1, 'Sausage Wrap', 'Sausage Wrap.png', 23000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(12, 1, 1, 'Nasi Uduk McD', 'Nasi Uduk McD.png', 18000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(13, 1, 1, 'Bubur Ayam McD', 'Bubur Ayam McD.png', 17000, 1000, '2024-04-24 08:26:29', '2024-04-24 08:26:29'),
(14, 1, 2, 'Paket Hebat - Beef Burger Deluxe', 'Paket Hebat.png', 40000, 1000, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(15, 1, 2, 'Beef Burger', 'Beef Burger.png', 28000, 997, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(16, 1, 2, 'Cheeseburger', 'Cheeseburger.png', 30000, 1000, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(17, 1, 2, 'Double Cheeseburger', 'Double Cheeseburger.png', 37000, 1000, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(18, 1, 2, 'Triple Cheeseburger', 'Triple Cheeseburger.png', 45000, 999, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(19, 1, 2, 'Bic Mac', 'Bic Mac.png', 54000, 1000, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(20, 1, 2, 'Beef Burger Deluxe', 'Beef Burger Deluxe.png', 35000, 1000, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(21, 1, 2, 'Cheeseburger Deluxe', 'Cheeseburger Deluxe.png', 42000, 1000, '2024-04-24 08:43:27', '2024-04-24 08:43:27'),
(22, 1, 3, 'Paket Hebat - Chicken Burger Deluxe', 'Paket Hebat.png', 45000, 1000, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(23, 1, 3, 'Paket Hebat - Korean Soy Garlic Wings', 'Paket Hebat Korean.png', 45000, 1000, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(24, 1, 3, 'Spicy Chicken McNuggets', 'Spicy Chicken McNuggets.png', 18000, 1000, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(25, 1, 3, 'Panas Spesial Ayam McD Gulai', 'Panas Spesial Ayam McD Gulai.png', 30000, 1000, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(26, 1, 3, 'Panas 1 Ayam McD Gulai', 'Panas 1 Ayam McD Gulai.png', 28000, 999, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(27, 1, 3, 'Panas 2 Ayam McD Gulai', 'Panas 2 Ayam McD Gulai.png', 36000, 999, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(28, 1, 3, 'Pamer 5 Ayam McD Gulai', 'Pamer 5 Ayam McD Gulai.png', 68000, 1000, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(29, 1, 3, 'Pamer 7 Ayam McD Gulai', 'Pamer 7 Ayam McD Gulai.png', 89000, 1000, '2024-04-24 08:55:22', '2024-04-24 08:55:22'),
(30, 1, 3, '2 PaNas 1 Ayam dan 2 McFlurry OREO', '2 Panas 1 Ayam dan 2 McFlurry OREO.png', 36000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(31, 1, 3, 'Korean Soy Garlic Wings', 'Korean Soy Garlic Wings.png', 29000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(32, 1, 3, 'PaNas Wings Korean Soy', 'Panas Wings Korean Soy.png', 34000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(33, 1, 3, 'Ayam Krispy McDonald\'s', 'Ayam Krispy McDonald\'s.png', 16000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(34, 1, 3, 'Ayam Spicy McDonald\'s', 'Ayam Spicy McDonald\'s.png', 18000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(35, 1, 3, 'PaNas 1', 'Panas 1.png', 33000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(36, 1, 3, 'PaNas 2 whit Fries', 'Panas 2 whit Fries.png', 36000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(37, 1, 3, 'PaNas 2 whit Rice', 'Panas 2 whit Rice.png', 38000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(38, 1, 3, 'PaNas Spesial', 'Panas Spesial.png', 36000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(39, 1, 3, 'PaMer 5', 'PaMer 5.png', 74000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(40, 1, 3, 'PaMer 7', 'Pamer 7.png', 98000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(41, 1, 3, 'Honey Garlic Chicken Rice McD', 'Honey Garlic Chicken Rice McD.png', 42000, 1000, '2024-04-24 09:09:49', '2024-04-24 09:09:49'),
(42, 1, 3, 'Chicken Burger Deluxe', 'Chicken Burger Deluxe.png', 27000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(43, 1, 3, 'Chiken Burger', 'Chiken Burger.png', 24000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(44, 1, 3, 'McSpicy', 'McSpicy.png', 28000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(45, 1, 3, 'McChicken', 'McChicken.png', 25000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(46, 1, 3, 'McNuggets', 'McNuggets.png', 19000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(47, 1, 3, 'Chicken Snack Wrap', 'Chicken Snack Wrap.png', 23000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(48, 1, 3, 'Spicy Chicken Bites', 'Spicy Chicken Bites.png', 17000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(49, 1, 3, 'Chicken Fingers', 'Chicken Fingers.png', 19000, 1000, '2024-04-24 09:14:17', '2024-04-24 09:14:17'),
(50, 1, 4, 'Fish Fillet Burger', 'Fish Fillet Burger.png', 39000, 1000, '2024-04-24 09:28:07', '2024-04-24 09:28:07'),
(51, 1, 4, 'Fish Snack Wrap', 'Fish Snack Wrap.png', 26000, 1000, '2024-04-24 09:28:07', '2024-04-24 09:28:07'),
(52, 1, 4, 'Honey Garlic Fish Rice McD', 'Honey Garlic Fish Rice McD.png', 34000, 1000, '2024-04-24 09:28:07', '2024-04-24 09:28:07'),
(53, 1, 5, 'Fruit Tea Lemon', 'Fruit Tea Lemon.png', 7000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(54, 1, 5, 'Coca - Cola', 'Coca Cola.png', 10000, 999, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(55, 1, 5, 'Sprite', 'Sprite.png', 10000, 999, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(56, 1, 5, 'Fanta', 'Fanta.png', 10000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(57, 1, 5, 'Iced Coffee Matcha Jelly Float', 'Iced Coffee Matcha Jelly Float.png', 24000, 999, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(58, 1, 5, 'Iced Coffee Matcha Float', 'Iced Coffee Matcha Float.png', 21000, 999, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(59, 1, 5, 'Iced Coffee Matcha Jelly', 'Iced Coffee Matcha Jelly.png', 19000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(60, 1, 5, 'Iced Coffee Matcha', 'Iced Coffee Matcha.png', 17000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(61, 1, 5, 'Fruit Tea Cocopandan', 'Fruit Tea Cocopandan.png', 9000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(62, 1, 5, 'Coca - Cola McFloat', 'Coca Cola McFloat.png', 15000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(63, 1, 5, 'Teh Botol Sosro Tawar', 'Teh Botol Sosro Tawar.png', 9000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(64, 1, 5, 'Iced Milo', 'Iced Milo.png', 12000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(65, 1, 5, 'Iced Lychee Tea', 'Iced Lychee Tea.png', 10000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(66, 1, 5, 'Fanta McFloat', 'Fanta McFloat.png', 15000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(67, 1, 5, 'Iced Coffee Jelly Float', 'Iced Coffee Jelly Float.png', 25000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(68, 1, 5, 'Iced Coffee Float', 'Iced Coffee Float.png', 23000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(69, 1, 5, 'Iced Coffee Jelly', 'Iced Coffee Jelly.png', 19000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(70, 1, 5, 'Iced Coffee', 'Iced Coffee.png', 17000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(71, 1, 5, 'Teh Botol Sosro', 'Teh Botol Sosro.png', 12000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(72, 1, 5, 'Teh Botol Sosro Kotak', 'Teh Botol Sosro Kotak.png', 14000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(73, 1, 5, 'Fruit Tea Blackcurrant', 'Fruit Tea Blackcurrant.png', 13000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(74, 1, 5, 'Mineral Water Prim-a', 'Mineral Water Prim-a.png', 6000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52'),
(75, 1, 5, 'Hot Coffee', 'Hot Coffee.png', 14000, 1000, '2024-04-24 09:40:52', '2024-04-24 09:40:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `ID_METODE` int(11) NOT NULL,
  `ID_KARYAWAN` int(11) NOT NULL,
  `NAMA_METODE` varchar(20) NOT NULL,
  `NO_REKENING` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `metode_bayar`
--

INSERT INTO `metode_bayar` (`ID_METODE`, `ID_KARYAWAN`, `NAMA_METODE`, `NO_REKENING`) VALUES
(1, 1, 'Rekening BRI', '090903030103'),
(2, 1, 'Rekening BCA', '030103030103'),
(3, 1, 'Digital DANA', '030103022222'),
(4, 1, 'Digital OVO', '9738619090072');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `USERNAME_PELANGGAN` varchar(30) NOT NULL,
  `PASSWORD_PELANGGAN` varchar(256) NOT NULL,
  `NAMA_PELANGGAN` varchar(50) NOT NULL,
  `NO_TELP_PELANGGAN` varchar(15) NOT NULL,
  `ALAMAT_PELANGGAN` text NOT NULL,
  `PROFIL` varchar(255) NOT NULL,
  `JENIS_KELAMIN` enum('L','P') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `USERNAME_PELANGGAN`, `PASSWORD_PELANGGAN`, `NAMA_PELANGGAN`, `NO_TELP_PELANGGAN`, `ALAMAT_PELANGGAN`, `PROFIL`, `JENIS_KELAMIN`) VALUES
(6, 'bintang', '3f8981477fb6e4458919b3d920942e5b107aca572728af81d69f0219e3947e77', 'bintang', '08765432155', 'nganjuk', '66311ee871003.jpg', 'L'),
(7, 'aldy', 'c1d1eebc496a7525a176eb886e728e0e2c7b3a7b06631daf932dc0b46f4fb774', 'aldy', '812222345612', 'pamekasan', 'Screenshot 2024-06-09 195326.png', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `KODE_PROMO` int(11) NOT NULL,
  `NAMA_PROMO` varchar(255) NOT NULL,
  `POTONGAN` int(11) NOT NULL,
  `KETERANGAN` varchar(255) NOT NULL,
  `TANGGAL_MULAI` date NOT NULL,
  `TANGGAL_SELESAI` date NOT NULL,
  `FOTO_PROMO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`KODE_PROMO`, `NAMA_PROMO`, `POTONGAN`, `KETERANGAN`, `TANGGAL_MULAI`, `TANGGAL_SELESAI`, `FOTO_PROMO`) VALUES
(1, 'Akhir Bulan Ceria', 15, 'POTONGAN 15 PERSEN', '2024-05-23', '2024-06-12', 'promo1.jpg'),
(10, 'diskon idul adha', 10, 'potongan 10 pesen', '2024-06-07', '2024-06-13', 'Promo2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `NAMA_ROLE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`ID_ROLE`, `NAMA_ROLE`) VALUES
(1, 'admin'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPPLIER` int(11) NOT NULL,
  `NAMA_SUPPLIER` varchar(100) NOT NULL,
  `NO_TELP_SUPPLIER` varchar(15) NOT NULL,
  `ALAMAT_SUPPLIER` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`ID_SUPPLIER`, `NAMA_SUPPLIER`, `NO_TELP_SUPPLIER`, `ALAMAT_SUPPLIER`) VALUES
(1, 'McDonald\'s Indonesia', '0315317520', 'Seluruh Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `KODE_TRANSAKSI` int(11) NOT NULL,
  `ID_PELANGGAN` int(11) NOT NULL,
  `TANGGAL_PESAN` datetime NOT NULL DEFAULT current_timestamp(),
  `TOTAL` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `WAKTU_BAYAR` datetime DEFAULT NULL,
  `METODE_BAYAR` varchar(50) DEFAULT NULL,
  `BUKTI_BAYAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`KODE_TRANSAKSI`, `ID_PELANGGAN`, `TANGGAL_PESAN`, `TOTAL`, `STATUS`, `WAKTU_BAYAR`, `METODE_BAYAR`, `BUKTI_BAYAR`) VALUES
(12, 6, '2024-06-06 21:47:23', 16958, 1, '2024-06-06 21:50:44', 'Rekening BRI', '6661ccc488aaf.png'),
(13, 6, '2024-06-06 22:06:26', 16065, 1, '2024-06-06 22:06:37', 'Rekening BRI', '6661d07d51576.jpg'),
(14, 6, '2024-06-08 01:27:13', 131355, 1, '2024-06-08 01:27:52', 'Rekening BCA', '6663512861ecf.png'),
(16, 6, '2024-06-08 01:40:31', 113400, 1, '2024-06-08 01:41:11', 'Rekening BRI', '666354470ac09.png'),
(17, 6, '2024-06-08 01:53:21', 63000, 1, '2024-06-08 01:53:49', 'Rekening BRI', '6663573d7fc6d.png'),
(18, 6, '2024-06-08 22:13:54', 88200, 0, NULL, NULL, ''),
(19, 6, '2024-06-10 12:41:59', 19950, 0, NULL, NULL, ''),
(20, 7, '2024-06-10 13:21:21', 38850, 1, '2024-06-10 13:22:12', 'Rekening BRI', '66669b9476dc7.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `KODE_TRANSAKSI` int(11) NOT NULL,
  `KODE_MAKANAN` int(11) NOT NULL,
  `HARGA_MAKANAN` int(11) NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`KODE_TRANSAKSI`, `KODE_MAKANAN`, `HARGA_MAKANAN`, `QTY`) VALUES
(12, 3, 19000, 1),
(14, 15, 28000, 1),
(14, 18, 45000, 1),
(14, 54, 10000, 1),
(16, 15, 28000, 2),
(16, 57, 24000, 1),
(17, 3, 19000, 1),
(17, 6, 20000, 1),
(17, 58, 21000, 1),
(18, 3, 19000, 1),
(18, 6, 20000, 1),
(18, 22, 45000, 1),
(19, 3, 19000, 1),
(20, 3, 19000, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_KARYAWAN`),
  ADD KEY `FK_MEMILIKI5` (`ID_ROLE`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KODE_KATEGORI`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`ID_PELANGGAN`,`KODE_MAKANAN`),
  ADD KEY `FK_MEMPUNYAI5` (`KODE_MAKANAN`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`KODE_MAKANAN`),
  ADD KEY `FK_MENYEDIAKAN` (`ID_SUPPLIER`),
  ADD KEY `FK_BERISI` (`KODE_KATEGORI`);

--
-- Indeks untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`ID_METODE`) USING BTREE,
  ADD KEY `FK_MEMPUNYAI9` (`ID_KARYAWAN`) USING BTREE;

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`KODE_PROMO`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPPLIER`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`KODE_TRANSAKSI`),
  ADD KEY `FK_MELAKUKAN` (`ID_PELANGGAN`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`KODE_TRANSAKSI`,`KODE_MAKANAN`),
  ADD KEY `FK_TERDAPAT` (`KODE_MAKANAN`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_KARYAWAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `KODE_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `KODE_MAKANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `KODE_PROMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `KODE_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_MEMILIKI5` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEMPUNYAI5` FOREIGN KEY (`KODE_MAKANAN`) REFERENCES `makanan` (`KODE_MAKANAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `FK_BERISI` FOREIGN KEY (`KODE_KATEGORI`) REFERENCES `kategori` (`KODE_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENYEDIAKAN` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD CONSTRAINT `metode_bayar_ibfk_1` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `FK_MEMILIKI2` FOREIGN KEY (`KODE_TRANSAKSI`) REFERENCES `transaksi` (`KODE_TRANSAKSI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TERDAPAT` FOREIGN KEY (`KODE_MAKANAN`) REFERENCES `makanan` (`KODE_MAKANAN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
