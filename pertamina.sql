-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Okt 2018 pada 01.44
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertamina`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderpro`
--

CREATE TABLE `orderpro` (
  `id_trans` int(11) DEFAULT NULL,
  `id_product` smallint(6) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderpro`
--

INSERT INTO `orderpro` (`id_trans`, `id_product`, `jumlah`) VALUES
(14, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` smallint(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `stock` int(5) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `nama`, `link`, `stock`, `warna`, `merek`) VALUES
(1, 'proyektor asus', 'https://my-best.id/wp-content/uploads/2018/02/Simple-Beam-Smart-Projector-GP70UP-275x214.png', 4, 'hitam', 'asusz732');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(6) NOT NULL,
  `user` varchar(15) NOT NULL,
  `date_trans` date NOT NULL,
  `time` smallint(3) NOT NULL,
  `necessity` varchar(100) NOT NULL,
  `more_info` varchar(50) NOT NULL,
  `approved_date` date DEFAULT NULL,
  `back_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `user`, `date_trans`, `time`, `necessity`, `more_info`, `approved_date`, `back_date`) VALUES
(14, 'wahyu', '2018-09-13', 2, 'acara pesta', 'full spec', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `first` varchar(15) NOT NULL,
  `last` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`first`, `last`, `email`, `hp`, `username`, `password`) VALUES
('wahyu', 'sogata', 'wahyudi98.ww@gmail.com', '082285658594', 'wahyu', 'wahyu');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_approvedlist`
--
CREATE TABLE `v_approvedlist` (
`id_trans` int(6)
,`date` date
,`days` bigint(12)
,`username` varchar(15)
,`nama` varchar(20)
,`jumlah` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_count`
--
CREATE TABLE `v_count` (
`users` bigint(21)
,`product` bigint(21)
,`request` bigint(21)
,`onuser` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_expiredlist`
--
CREATE TABLE `v_expiredlist` (
`id_trans` int(6)
,`user` varchar(15)
,`tglexpired` date
,`days` bigint(12)
,`nama` varchar(20)
,`jumlah` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_product`
--
CREATE TABLE `v_product` (
`id` smallint(3)
,`nama` varchar(20)
,`link` varchar(100)
,`stock` int(5)
,`warna` varchar(10)
,`merek` varchar(20)
,`id_product` smallint(6)
,`taken` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_requestlist`
--
CREATE TABLE `v_requestlist` (
`id_trans` int(6)
,`date_trans` date
,`time` smallint(3)
,`username` varchar(15)
,`nama` varchar(20)
,`jumlah` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_taken`
--
CREATE TABLE `v_taken` (
`id_product` smallint(6)
,`taken` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_approvedlist`
--
DROP TABLE IF EXISTS `v_approvedlist`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_approvedlist`  AS  select `tr`.`id_trans` AS `id_trans`,cast((`tr`.`date_trans` + `tr`.`time`) as date) AS `date`,(cast((`tr`.`date_trans` + `tr`.`time`) as date) - cast(now() as date)) AS `days`,`u`.`username` AS `username`,`p`.`nama` AS `nama`,`op`.`jumlah` AS `jumlah` from (((`transaksi` `tr` join `users` `u`) join `product` `p`) join `orderpro` `op`) where ((`op`.`id_trans` = `tr`.`id_trans`) and (`u`.`username` = `tr`.`user`) and (`p`.`id` = `op`.`id_product`) and (`tr`.`approved_date` is not null) and (cast((`tr`.`date_trans` + `tr`.`time`) as date) >= cast(now() as date))) order by `tr`.`date_trans` desc ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_count`
--
DROP TABLE IF EXISTS `v_count`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_count`  AS  select (select count(0) from `users`) AS `users`,(select count(0) from `product`) AS `product`,(select count(distinct `v_requestlist`.`id_trans`) from `v_requestlist`) AS `request`,(select count(distinct `v_approvedlist`.`id_trans`) from `v_approvedlist`) AS `onuser` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_expiredlist`
--
DROP TABLE IF EXISTS `v_expiredlist`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_expiredlist`  AS  select `tr`.`id_trans` AS `id_trans`,`tr`.`user` AS `user`,cast((`tr`.`date_trans` + `tr`.`time`) as date) AS `tglexpired`,(cast(now() as date) - cast((`tr`.`date_trans` + `tr`.`time`) as date)) AS `days`,`p`.`nama` AS `nama`,`op`.`jumlah` AS `jumlah` from ((`transaksi` `tr` join `product` `p`) join `orderpro` `op`) where ((`tr`.`id_trans` = `op`.`id_trans`) and (`op`.`id_product` = `p`.`id`) and (`tr`.`approved_date` is not null) and isnull(`tr`.`back_date`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_product`
--
DROP TABLE IF EXISTS `v_product`;

CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `v_product`  AS  select `product`.`id` AS `id`,`product`.`nama` AS `nama`,`product`.`link` AS `link`,`product`.`stock` AS `stock`,`product`.`warna` AS `warna`,`product`.`merek` AS `merek`,`v_taken`.`id_product` AS `id_product`,`v_taken`.`taken` AS `taken` from (`product` left join `v_taken` on((`product`.`id` = `v_taken`.`id_product`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_requestlist`
--
DROP TABLE IF EXISTS `v_requestlist`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_requestlist`  AS  select `tr`.`id_trans` AS `id_trans`,`tr`.`date_trans` AS `date_trans`,`tr`.`time` AS `time`,`u`.`username` AS `username`,`p`.`nama` AS `nama`,`op`.`jumlah` AS `jumlah` from (((`transaksi` `tr` join `users` `u`) join `product` `p`) join `orderpro` `op`) where ((`op`.`id_trans` = `tr`.`id_trans`) and (`u`.`username` = `tr`.`user`) and (`p`.`id` = `op`.`id_product`) and isnull(`tr`.`approved_date`)) order by `tr`.`date_trans` desc ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_taken`
--
DROP TABLE IF EXISTS `v_taken`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_taken`  AS  select `op`.`id_product` AS `id_product`,sum(`op`.`jumlah`) AS `taken` from (`orderpro` `op` join `transaksi` `tr`) where ((`op`.`id_trans` = `tr`.`id_trans`) and isnull(`tr`.`back_date`)) group by `op`.`id_product` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderpro`
--
ALTER TABLE `orderpro`
  ADD KEY `id_trans` (`id_trans`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orderpro`
--
ALTER TABLE `orderpro`
  ADD CONSTRAINT `orderpro_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transaksi` (`id_trans`),
  ADD CONSTRAINT `orderpro_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
