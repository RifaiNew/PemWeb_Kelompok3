-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 14.25
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_topup`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `game`
--

CREATE TABLE `game` (
  `id_game` int(5) NOT NULL,
  `nama_game` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `game`
--

INSERT INTO `game` (`id_game`, `nama_game`, `produk`, `harga`) VALUES
(14, 'valorant', '300', 26000),
(15, 'valorant', '625', 52000),
(16, 'valorant', '1075', 86000),
(17, 'valorant', '2200', 172000),
(18, 'valorant', '4700', 368000),
(19, 'mobile legend', '172', 36000),
(20, 'mobile legend', '514', 110000),
(21, 'mobile legend', '1049', 220000),
(22, 'mobile legend', '2194', 446000),
(23, 'mobile legend', '3688', 742000),
(24, 'pubg', '263', 50000),
(26, 'pubg', '630', 115000),
(27, 'pubg', '800', 150000),
(28, 'pubg', '1000', 185000),
(33, 'pubg', '1800', 397500),
(36, 'apex', '1000', 159000),
(37, 'apex', '2150', 310000),
(38, 'apex', '4350', 581000),
(39, 'apex', '6700', 891000),
(40, 'apex', '11500', 1482000),
(41, 'free fire', '5', 1000),
(42, 'free fire', '12', 2000),
(43, 'free fire', '50', 8000),
(44, 'free fire', '70', 10000),
(45, 'free fire', '140', 20000),
(46, 'free fire', '355', 50000),
(47, 'free fire', '720', 100000),
(48, 'genshin', '60', 16500),
(49, 'genshin', '300+30', 81000),
(50, 'genshin', '980+110', 255000),
(51, 'genshin', '1980+260', 489000),
(52, 'genshin', '3280+600', 815000),
(53, 'coc', '80+8', 16000),
(54, 'coc', '500+50', 79000),
(55, 'coc', '1200+120', 329000),
(56, 'coc', '2500+250', 329000),
(57, 'coc', '6500+650', 799000),
(58, 'codm', '31', 5000),
(59, 'codm', '62', 10000),
(60, 'codm', '127', 20000),
(61, 'codm', '320', 50000),
(62, 'codm', '645', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_game` int(50) NOT NULL,
  `gameid` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_game`, `gameid`, `jumlah`) VALUES
(37, 15, 28, '', 1),
(38, 15, 18, '', 1),
(47, 12, 14, '', 1),
(48, 12, 24, '', 1),
(50, 12, 58, '', 1),
(54, 19, 26, '', 1),
(57, 25, 38, '', 1),
(58, 25, 15, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `gameid` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` int(50) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `id_game`, `gameid`, `jumlah`, `total`, `tanggal_bayar`) VALUES
(8, 15, 17, '321', 1, 172000, '2023-10-28'),
(9, 15, 14, '321313', 1, 26000, '2023-10-28'),
(12, 16, 14, '132', 1, 26000, '2023-10-28'),
(13, 12, 19, '321', 1, 36000, '2023-10-28'),
(14, 12, 19, '234', 1, 36000, '2023-10-30'),
(15, 12, 14, '123', 1, 26000, '2023-11-09'),
(16, 12, 19, '321', 1, 36000, '2023-11-09'),
(228, 12, 36, 'asda123', 2, 318000, '2023-11-16'),
(229, 12, 14, '213dsa', 3, 78000, '2023-11-16'),
(230, 24, 37, '0987', 1, 310000, '2023-11-16'),
(231, 25, 24, '1233', 1, 50000, '2023-11-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(12, 'Rifai', '$2y$10$uRGZItQ4W5dUOhnutAJhJ.IJNkWDzh2l45IuKn/MJ53ili0QtXCLW', 'crossbyxd052@gmail.com'),
(13, 'popo', '$2y$10$XKBlqi8S7miezQEvMIN25OXbHxpIdSOeEgpGcSO8UJ7zG1ClkWBC.', 'crossbyxd052@gmail.com'),
(14, 'aaa', '$2y$10$pXMWmdR7DNPoEMmgunw6euXQyezoEa4hrotmS7ro1wNfYXYOXQVlO', 'crossbyxd052@gmail.com'),
(15, 'asd', '$2y$10$xd6E3b/iwnZ7Ly6CA7UAyuvScTIe87HC2kJJo4LgOV.AOZ5z17jPi', 'asd@gmail.com'),
(16, 'fasda', '$2y$10$gwlmXH3b0J1ClRi/y97ATe8OfN2WUofo9UuXfbJv4L8OrvcNvblIe', 'crossbyxd052@gmail.com'),
(17, 'a', '$2y$10$DU3LajL7Da5Okx4A/dgQ1Oz7WRAbahwXJWgmX3oNIuOF.zsCKPRj.', 'rifaiar252@gmail.com'),
(19, 'ripai', '$2y$10$PmxgGYmQjhT/21E6L4xGPu73Y587XfUqjuE0oFmnFnMBngaA0g9Tu', 'asd@gmail.com'),
(20, 'PopiPA', '$2y$10$.rO5QwJexJYDfGFe6RifKux1P2iL4r1g7IJJjRRZ5XEsZpavJMuyu', 'cross@gmail.com'),
(21, 'popi', '$2y$10$BRfsRkjXrJCIcviX10OV0uYDOfO0R4bm1JqjXb0pOoDm67fPkyw3e', 'cross@gmail.com'),
(22, 'wiki', '$2y$10$2zS1iuzekAGRMgbGN79VPOmEubqs7ePJD43sm2k7MfVBSir59YGqa', 'w@gmail.com'),
(23, 'zaky', '$2y$10$yrsK53yZwitStetjxtJWJeNNGVxVeMJONyrQZ0aFgkaybitw0dQq2', 'z@gmail.com'),
(24, 'mamat', '$2y$10$1948SzwfU73/aEoEPa80D.rRAtPHv/9hZy2kwRdehnhPAItD8EEMK', 'm@gmail.com'),
(25, 'bn', '$2y$10$tTEdtqc3NKgqkVghULNfdeT9Axu7.bMtBqmTpzV5ITZ0AK.R63z4S', 'cross@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_id_user_kj` (`id_user`),
  ADD KEY `fk_id_game_kj` (`id_game`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_game` (`id_game`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_id_game_kj` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`),
  ADD CONSTRAINT `fk_id_user_kj` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_id_game` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
