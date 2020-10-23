-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 03:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibakul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_access_menu`
--

CREATE TABLE `tb_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_access_menu`
--

INSERT INTO `tb_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id` int(2) NOT NULL,
  `bulan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`id`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `ikon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `menu`, `ikon`) VALUES
(1, 'Admin', 'fas fa-user-tie'),
(2, 'Mahasiswa', 'fas fa-user-friends'),
(3, 'User', 'fas fa-user-shield');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_upload` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `bulan`, `tahun`, `nim`, `total`, `tgl_upload`, `bukti`, `status`) VALUES
(1, 10, 2020, '1218001', 4000000, '1603453779', '2020101218001.jpg', 1),
(5, 10, 2020, '1216008', 2500000, '1603460453', '2020101216008.jpg', 1),
(6, 10, 2020, '1218002', 1000000, '1603461124', '2020101218002.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_req_tagihan`
--

CREATE TABLE `tb_req_tagihan` (
  `id` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `date_req` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `pesan_req` text NOT NULL,
  `pesan_resp` text NOT NULL,
  `status` int(1) NOT NULL,
  `sisa_req` int(11) NOT NULL,
  `date_resp` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_req_tagihan`
--

INSERT INTO `tb_req_tagihan` (`id`, `bulan`, `tahun`, `date_req`, `nim`, `nama`, `jenis`, `pesan_req`, `pesan_resp`, `status`, `sisa_req`, `date_resp`, `keterangan`) VALUES
(2, 10, 2020, 1603453711, '1218001', 'MARTEN UMBU LOLO', 'plus', '4000000', 'di ijikan', 1, 1, 1603453725, 'tagihan bulan depan dikurangi Rp.1.000.000'),
(6, 10, 2020, 1603456283, '1216008', 'PETRUS RAFAEL DHAE', 'minus', '2500000', 'maaf tidak bisa', 1, 0, 1603456328, 'tagihan selanjutnya ditambah Rp. 660.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_menu`
--

CREATE TABLE `tb_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_menu`
--

INSERT INTO `tb_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt'),
(2, 1, 'Master Mahasiswa', 'admin/mahasiswa', 'fas fa-fw fa-users'),
(3, 1, 'Master Tagihan', 'admin/tagihan', 'fas fa-fw fa-money-check'),
(4, 2, 'Dashboard', 'mahasiswa', 'fas fa-fw fa-tachometer-alt'),
(5, 2, 'Tagihan', 'mahasiswa/tagihan', 'fas fa-fw fa-money-check'),
(6, 2, 'Bayar Kuliah', 'mahasiswa/bayarkuliah', 'fas fa-fw fa-coins'),
(7, 3, 'Profil Saya', 'user', 'fas fa-fw fa-user-edit'),
(8, 3, 'Ganti Password', 'user/gantipassword', 'fas fa-fw fa-user-lock'),
(9, 1, 'Master Pembayaran', 'admin/pembayaran', 'fas fa-fw fa-coins'),
(10, 1, 'Request Tagihan', 'admin/reqtagihan', 'fas fa-fw fa-envelope');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id` int(11) NOT NULL,
  `id_tagihan` varchar(20) NOT NULL,
  `created` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `deadline` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `cuti` int(11) NOT NULL,
  `dpp` int(11) NOT NULL,
  `almamater` int(11) NOT NULL,
  `pspt` int(11) NOT NULL,
  `kp` int(11) NOT NULL,
  `pkp` int(11) NOT NULL,
  `ta` int(11) NOT NULL,
  `pta` int(11) NOT NULL,
  `spp` int(11) NOT NULL,
  `konversi` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id`, `id_tagihan`, `created`, `bulan`, `tahun`, `deadline`, `nim`, `nama`, `jumlah`, `cuti`, `dpp`, `almamater`, `pspt`, `kp`, `pkp`, `ta`, `pta`, `spp`, `konversi`, `denda`, `status`) VALUES
(5, '2020091218003', 1599709634, 9, 2020, 1601416800, '1218003', 'FLORIDA DOWA', 1680000, 500000, 500000, 150000, 0, 0, 0, 0, 0, 500000, 0, 30000, 0),
(6, '2020091218004', 1599709634, 9, 2020, 1601416800, '1218004', 'DAVID UMBU NGAILU', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(7, '2020091218006', 1599709634, 9, 2020, 1601416800, '1218006', 'MARSELINUS MONGGO', 1220000, 0, 700000, 0, 0, 0, 0, 0, 0, 500000, 0, 20000, 0),
(8, '2020091218007', 1599709634, 9, 2020, 1601416800, '1218007', 'WENIUS LOKOBAL', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(9, '2020091218008', 1599709634, 9, 2020, 1601416800, '1218008', 'GAUDENSIA NATALIA LEDE', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(10, '2020091218009', 1599709634, 9, 2020, 1601416800, '1218009', 'PAULUS REHI KALLI GHOBA', 1030000, 0, 0, 0, 0, 0, 0, 0, 0, 1000000, 0, 30000, 0),
(11, '2020091219012', 1599709634, 9, 2020, 1601416800, '1219012', 'ALEXANDER DINGU JAGA MEHA', 1350000, 0, 600000, 150000, 0, 0, 0, 0, 0, 550000, 0, 50000, 0),
(24, '2020101218009', 1603349177, 10, 2020, 1604098800, '1218009', 'PAULUS REHI KALLI GHOBA', 170000, 0, 0, 0, 0, 0, 0, 0, 0, 150000, 0, 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_total_tagihan`
--

CREATE TABLE `tb_total_tagihan` (
  `id` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_total_tagihan`
--

INSERT INTO `tb_total_tagihan` (`id`, `nim`, `nama`, `bulan`, `tahun`, `total`, `status`) VALUES
(4, '1218003', 'FLORIDA DOWA', 9, 2020, 1680000, 0),
(5, '1218004', 'DAVID UMBU NGAILU', 9, 2020, 500000, 0),
(7, '1218007', 'WENIUS LOKOBAL', 9, 2020, 500000, 0),
(8, '1218008', 'GAUDENSIA NATALIA LEDE', 9, 2020, 500000, 0),
(9, '1218009', 'PAULUS REHI KALLI GHOBA', 10, 2020, 1200000, 0),
(12, '1219012', 'ALEXANDER DINGU JAGA MEHA', 9, 2020, 1350000, 0),
(13, '1218006', 'MARSELINUS MONGGO', 9, 2020, 1220000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` varchar(56) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `actived` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `nim`, `image`, `password`, `prodi`, `noHp`, `role_id`, `actived`) VALUES
(1, 'Admin Utama', 'admin', 'default.jpg', '$2y$10$.ZjMQ/f1IpImwopCfI3riepiuwCVTTaM3KgKoiv/wqzVgmsP74LRq', '-', '0', 1, 1),
(2, 'PETRUS RAFAEL DHAE', '1216008', 'default.jpg', '$2y$10$wpcVg3IXDOAbOh2g73KUlOVQthZkzl0zJ0KVUx.3DXdOCebn2vtYi', 'Teknik Informatika', '0', 2, 1),
(3, 'MIKIRON WEYA', '1216015', 'default.jpg', '$2y$10$jgv1ySJqBWdnhOh76nqCiO5BfvAqvntSI/v3FExI0uXSzADOdcygS', 'Teknik Informatika', '0', 2, 1),
(4, 'MARTEN UMBU LOLO', '1218001', 'default.jpg', '$2y$10$GkeZlDfQjoPzUCl94PhRCub7qLuIvsIgxeVJLBXL2tgPnG59lEYV.', 'Teknik Informatika', '0', 2, 1),
(5, 'IGNASIUS ALANS TUNJUNG', '1218002', 'default.jpg', '$2y$10$2KEiqqgjvbuxxGb/XNGhyOuXnyxO41PW4j0y4AV8p1VfoNHyyQJsm', 'Teknik Informatika', '0', 2, 1),
(6, 'FLORIDA DOWA', '1218003', 'default.jpg', '$2y$10$BgaU33jFKY/nydTcb/RpqefL8U6jVyNDs5.YOUAjWVfuzBSRJgF8i', 'Teknik Informatika', '0', 2, 1),
(7, 'DAVID UMBU NGAILU', '1218004', 'default.jpg', '$2y$10$pNNjYDJ310Lq9riqTst02eGSz6ftGFOhW5GNnkBTY4LkmcQU8OMOS', 'Teknik Informatika', '0', 2, 1),
(8, 'MARSELINUS MONGGO', '1218006', 'default.jpg', '$2y$10$RLzqBHu5B9cvSBaS7yCJt.UEcOQNi/VQ3KwUZi/5GbD.itVhy43ky', 'Teknik Informatika', '0', 2, 1),
(9, 'WENIUS LOKOBAL', '1218007', 'default.jpg', '$2y$10$d7GW8jOHka3efmx.m3SZMupNGUduIg7zLysT714MjCMBC5p4OIAPW', 'Teknik Informatika', '0', 2, 1),
(10, 'GAUDENSIA NATALIA LEDE', '1218008', 'default.jpg', '$2y$10$pRwOy3SQag4Wy604xPiMHuFOiIYu2p8yiyz3V7xK/VZ8M7u0KxyFm', 'Teknik Informatika', '0', 2, 1),
(11, 'PAULUS REHI KALLI GHOBA', '1218009', 'default.jpg', '$2y$10$LdFaPAAozfRWUzahGcsOS.dnmlSioE0sHxgkf3X/32NHYoPRVChCS', 'Teknik Informatika', '0', 2, 1),
(12, 'OKTAVIANA KALLU ATE', '1218013', 'default.jpg', '$2y$10$/kutVq65KhzKIhZc5jyinuTQUKXSZhAfUistudH1g8RrqW.cbi8T6', 'Teknik Informatika', '0', 2, 1),
(13, 'APLIANA AMBU KAKA', '1218014', 'default.jpg', '$2y$10$CEacvMwzvd.yoEsAyKlQ5OcXWikF7BY29KPY.EMf7F9N8pvS1KjSu', 'Teknik Informatika', '0', 2, 1),
(14, 'VERONIKA WALU', '1219001', 'default.jpg', '$2y$10$fR5tJrPcLD5/0x/DdssdGO810c8QKXl6n.QibB7hVc4dz9/ez.ule', 'Teknik Informatika', '0', 2, 1),
(15, 'YOHANES EWALDUS WOI GOA', '1219002', 'default.jpg', '$2y$10$RYa7Kkvv73g/3XvJYGVAheXMno5eE4x2HsvNK4Wsh1x3upvUrFeOm', 'Teknik Informatika', '0', 2, 1),
(16, 'YOHANES JEFFRIANUS PORA', '1219003', 'default.jpg', '$2y$10$dXaS7WFf85UNji5wsSmPCu9JlDyP6PZwGy6yhw9bJ1EUMfjacx/PS', 'Teknik Informatika', '0', 2, 1),
(17, 'YANSENSIUS YONIS DALE', '1219005', 'default.jpg', '$2y$10$wAKVBRmg0/sI83BAyevpG.uoTUc0RkP//2cg7WQWC2T5ajAL.W8de', 'Teknik Informatika', '0', 2, 1),
(18, 'HARTON NUHAMARA', '1219006', 'default.jpg', '$2y$10$qyCdhRl7t8pxV6HJ.MmXtOxoA.POD5SHR/We1kKBmBkgkWEmfZ/3S', 'Teknik Informatika', '0', 2, 1),
(19, 'MARTHA BELA', '1219007', 'default.jpg', '$2y$10$4tkFsX9UdCYAY6bAXIIl1.mQNFaFj2MjRGn8Qy5fJ8WaoV5vJJmb2', 'Teknik Informatika', '0', 2, 1),
(20, 'FEMIATI DANGGA', '1219008', 'default.jpg', '$2y$10$4bMkIg20x0S03tV1AE/ZM.9jyEgfSuqcmz7.us6JYHYIPvv30kr/i', 'Teknik Informatika', '0', 2, 1),
(21, 'ADELFINA PATI BEBE', '1219009', 'default.jpg', '$2y$10$xraf2ItF8kRQ.2wBsussj.yim2QzNvCzk6iH6g/v5HEmcopl7EiNS', 'Teknik Informatika', '0', 2, 1),
(22, 'APOLONIA RENDA MALO', '1219011', 'default.jpg', '$2y$10$DWZ0R4FaYpooOSKOJtAC2.AS3PKQvcAIPbqVvjjeLYnjb7S.v7ADu', 'Teknik Informatika', '0', 2, 1),
(23, 'ALEXANDER DINGU JAGA MEHA', '1219012', 'default.jpg', '$2y$10$nzia4YEjydanRTVOCdJdZeuOrNLrqDbgoE.emgHskWbcxprMB0.0.', 'Teknik Informatika', '0', 2, 1),
(24, 'GETRUDIS DAPPA', '1219014', 'default.jpg', '$2y$10$tIvFKdT/J6.b3BXyEXZ3UOgeCUgS7BesnYNNYLcvS.TdtkEL2sv8i', 'Teknik Informatika', '0', 2, 1),
(25, 'ESTER BALI ATE', '1220001', 'default.jpg', '$2y$10$W4jZVYV2HTLV4pqBRCZdqOHkh0fkJKZbI4pxi/S5WpqMs1AF3T2m.', 'Teknik Informatika', '0', 2, 1),
(26, 'ANTONIUS NGEDANG', '1220002', 'default.jpg', '$2y$10$aa2KDpfO1OtfIunYtLb8/.sHk5OaN/Qa27NfGO8h5yYzJSGJsSpC2', 'Teknik Informatika', '0', 2, 1),
(27, 'BONIFASIUS MORI UMA', '1220003', 'default.jpg', '$2y$10$fRmmakaLUN6BanF6BSm/aOCR4wsC2wK70gIzkKlWdbWvRD7YoEoPq', 'Teknik Informatika', '0', 2, 1),
(28, 'MELFIANUS NGONGO', '1220004', 'default.jpg', '$2y$10$/66Ra.DCo2nrj6kd22CP/OBvxf4KObOocsEgkQRFSuINPVcYniYIC', 'Teknik Informatika', '0', 2, 1),
(29, 'ANASTASYA SARMINCE TONDA', '1220005', 'default.jpg', '$2y$10$YhI45wXduPX5JylkpMrSruc0khcLVMlMI2HfH6vzGoQyK6Zj0hS72', 'Teknik Informatika', '0', 2, 1),
(30, 'YUSTIYANA MESA', '1220006', 'default.jpg', '$2y$10$5EZKmR7OwnCvvPI7Jew/4OuyjDEd7zSnNs7Shd443LLxoPYGfFzIm', 'Teknik Informatika', '0', 2, 1),
(31, 'MAKSIANUS BILI', '1220007', 'default.jpg', '$2y$10$NSDWBJKjDywTIMHm1n2jtem7bVFKyqMCrA3GpznMDRGHvLbq3MXim', 'Teknik Informatika', '0', 2, 1),
(32, 'ERLINA ANGGRIYANI R. J. M', '1220008', 'default.jpg', '$2y$10$0/OAyr2hlpJ06Zv3j9o8Eu5A/S7YN84wnrpkZeZPnojIPWnBWSl7e', 'Teknik Informatika', '0', 2, 1),
(33, 'MINCE PATA', '1220009', 'default.jpg', '$2y$10$ajGgKw4/Vf/atp7bhAbEC.AbTZYsHbchcX8gpNlYUFHssdmnPkHuO', 'Teknik Informatika', '0', 2, 1),
(34, 'YOHANIS BILI', '3214003', 'default.jpg', '$2y$10$eKF6zM6MIU/crFdNOK7U1uqbniyttwSSkw2VQBHMXE/k/28RIAFPi', 'Sistem Informasi', '0', 2, 1),
(35, 'HIZKIA MULAIT', '3216007', 'default.jpg', '$2y$10$wdWc2GWry5QbCJnx/UQ9EOQM5CbIn6CumfiisDsKP2SnsBCDwxie2', 'Sistem Informasi', '0', 2, 1),
(36, 'ANGELIUS NGASI', '3216025', 'default.jpg', '$2y$10$PjSO.F1aWDDi65O0P95nVeoIY8638jVx516N4AsRsycqyL58evZvK', 'Sistem Informasi', '0', 2, 1),
(37, 'KORNELIS NUMA CEME', '3216026', 'default.jpg', '$2y$10$Xbn2FSg87FT.P1sX5sozruwDo25WJam.giLZa1JZM50YOz3o/0o7K', 'Sistem Informasi', '0', 2, 1),
(38, 'LODOVIKUS REBA', '3217003', 'default.jpg', '$2y$10$mCgnB1il.zJQ/apFpcJ4s.3AstdnBQAdICQgwmq9vDknwm9aUi31G', 'Sistem Informasi', '0', 2, 1),
(39, 'TIMOTEUS PANGKUR', '3217005', 'default.jpg', '$2y$10$52sCX7aT.Vt30Y3fg0q//.FUJlY1I89hGLangorgXMMYYCX0fG1Ta', 'Sistem Informasi', '0', 2, 1),
(40, 'OKTAVINA NIWA LAPIR', '3217006', 'default.jpg', '$2y$10$cHMeuLlCtivjkQwu4x2UOOiiJfLnXujGlWmQD90TrrAe0jwJmQuJ.', 'Sistem Informasi', '0', 2, 1),
(41, 'YUMIATI WUNDA', '3217008', 'default.jpg', '$2y$10$8lNzwdj/VdbLGzZIkMcDJOPhlVUnJxno4uRSOV/UdmGY1o0yQ/wPG', 'Sistem Informasi', '0', 2, 1),
(42, 'YUNITA LADA', '3217009', 'default.jpg', '$2y$10$7TrcCotJJNDwUDE8Yps7Wu7Tr/kRg2XOz7oz.4oSYzEf9BqRufQ/S', 'Sistem Informasi', '0', 2, 1),
(43, 'MARIA NELSI GODAT', '3217017', 'default.jpg', '$2y$10$5LbD.fQqDsKT5So6zet.Nej8oM8G1ZXVRbw99hhX415CHeUHMeDmu', 'Sistem Informasi', '0', 2, 1),
(44, 'ANASTASIA JENIATI LENDE', '3218001', 'default.jpg', '$2y$10$kF3urKe5xKPUwfIbgJztNeIt6xMMluZr9HrHjWsfR93L4ATxxohK6', 'Sistem Informasi', '0', 2, 1),
(45, 'INCE DAMA MIJUK', '3218006', 'default.jpg', '$2y$10$y0PPY4a4FnfEeyGY2hBk7eeITHR7S5dfwQ3ucBnC4nj2QHLA8hj5C', 'Sistem Informasi', '0', 2, 1),
(46, 'MARIA LEDE PAHA', '3218011', 'default.jpg', '$2y$10$9LIGRscxKyUp4YJ756Q7zuNzzymT.Ye5QhQqVIHesSmA8XfpAgWHC', 'Sistem Informasi', '0', 2, 1),
(47, 'MERI KAHI KATUDA MEHA', '3218012', 'default.jpg', '$2y$10$wq2YXfyi6jGHTMa8voUQEu4016P14.Rhsn5oVc6DFJqfj.lgXtwN6', 'Sistem Informasi', '0', 2, 1),
(48, 'MARIA FATIMA WEA', '3218014', 'default.jpg', '$2y$10$AR4lDcwEzfGstVV4cQmo4uOnGI5PNDp9KMh2o4iPUjWTpyJFoyEy2', 'Sistem Informasi', '0', 2, 1),
(49, 'GIDION JAKA MERE', '3218017', 'default.jpg', '$2y$10$LICH0jfYfVmdc.SACVcDY.TgBpDj/53oTx97bUz9jvUMtS9NmVnoS', 'Sistem Informasi', '0', 2, 1),
(50, 'KORNELIS PANDI', '3218021', 'default.jpg', '$2y$10$Uy.PFa0mr3piTIZT.f5j7et9rvt9l1x2A7yH6aInrTOjmPV/P03bW', 'Sistem Informasi', '0', 2, 1),
(51, 'DINA MARIANA LENDE', '3218022', 'default.jpg', '$2y$10$O2BsDwsjA1DuRtVC5XcGe.TTGkcSd56gMhEBwNegveSYZ4pzCYvtm', 'Sistem Informasi', '0', 2, 1),
(52, 'KRISTINA DADA MERE', '3219001', 'default.jpg', '$2y$10$3oznA/u9iNNVXlBUcg1Ws.TsUaIyMd8Rn7.G2A/pxiTNajgsY0x/K', 'Sistem Informasi', '0', 2, 1),
(53, 'AGNES LULAILA GADI', '3219002', 'default.jpg', '$2y$10$YzhgIg2v6Ry1td3WvIdCDOHmprLfbNddqpqQsqwep249sG3NWS6DK', 'Sistem Informasi', '0', 2, 1),
(54, 'RACHMAD DWIKI P', '3219003', 'default.jpg', '$2y$10$nMgoRFBxPWmQTqVrpgnet.FenYMj0x8C6BQratHuoKsHWja7YKoiu', 'Sistem Informasi', '0', 2, 1),
(55, 'GERARDUS DEKE DETA', '3219004', 'default.jpg', '$2y$10$lFYvd5oPGd90rZgovRTnNONItViuhkmr/LJQshyAo9K3uAwyNiUxq', 'Sistem Informasi', '0', 2, 1),
(56, 'PELIPUS WINYO BULU', '3219005', 'default.jpg', '$2y$10$de.m0haVwiz/l/ekQn8k1uBU9lIGm7S3sFPmHpBYsvFC4o.3BaCQO', 'Sistem Informasi', '0', 2, 1),
(57, 'KRISTINA KALLI GHOBA', '3219006', 'default.jpg', '$2y$10$knvRzEGeVCBd.1EPNFz2UeUTPdP7Z/3AzV1Dbp56YJnTsQ01PRuC.', 'Sistem Informasi', '0', 2, 1),
(58, 'SARIYANTI WOLLA MAWO', '3219008', 'default.jpg', '$2y$10$l0C1xOpArjDt79.9UL2rB.F9A5XxoF9a1xcOczqJkyUm3h7CKs3hm', 'Sistem Informasi', '0', 2, 1),
(59, 'YAKOB DANIEL TANGKO', '3219009', 'default.jpg', '$2y$10$9Sb.1GuF5lCwhdY8yIf5U.3FWLrn3M3zumlxTA29iYcGalJ49wZrW', 'Sistem Informasi', '0', 2, 1),
(60, 'URBANUS UMBU ROBAKA', '3219013', 'default.jpg', '$2y$10$lms.0to66rpUOGBIFXuiFeL0AmiDXzvB2knxV26jE/ic1y7L33Bje', 'Sistem Informasi', '0', 2, 1),
(61, 'ALIUS JONI KAHA', '3219017', 'default.jpg', '$2y$10$Bk.itMgJMSLco6EA3A4mQ.zNQFZ53HGDTmMfcXrLtjBwSlRrw7eES', 'Sistem Informasi', '0', 2, 1),
(62, 'DOMINGGUS BILI N', '3219019', 'default.jpg', '$2y$10$wPlYtIRo04edyhUiwc0qsOArkL2OoZIsrLi2tUtwJPV698i8SLs0u', 'Sistem Informasi', '0', 2, 1),
(63, 'DORCE BULU', '3219020', 'default.jpg', '$2y$10$jBZwlQ4noUX4vhLeEKkJMOIlmDSZeiS9M1ZMWDPyVIGY6ePVmcyvO', 'Sistem Informasi', '0', 2, 1),
(64, 'ANASTASIA POTE', '3219022', 'default.jpg', '$2y$10$4HW0mZulb2wWd0rcFvpRKejoDAN9j0vYWfifz6q.2TZEE1UP/7Z1O', 'Sistem Informasi', '0', 2, 1),
(65, 'YASINTA BILI', '3219023', 'default.jpg', '$2y$10$Zjd1opTTfMuC.5tDmCQhQedbZynfKeUHqNjh435RyysfSNaUroa.2', 'Sistem Informasi', '0', 2, 1),
(66, 'ADRIANA HALATO', '3219024', 'default.jpg', '$2y$10$A0OZYy70wJae6/TErdprRe1ss7FZMdLfQwNxsVPS4fa24rSN0YRoy', 'Sistem Informasi', '0', 2, 1),
(67, 'FRANSISKUS SAVERINUS L', '3219025', 'default.jpg', '$2y$10$Wtq08o5X4GYQpu4KIdqfx.ENNT.hqgHkagjKjsMnQ6CWMmJy/m8Km', 'Sistem Informasi', '0', 2, 1),
(68, 'DAMIANUS LENDE', '3219026', 'default.jpg', '$2y$10$oXKcCcYLAH/kj1eaHX8.yeipRTy7QRmbGAeZAi5uf2S91L/Ou7TO2', 'Sistem Informasi', '0', 2, 1),
(69, 'NINGSI KONGA NAHA', '3219027', 'default.jpg', '$2y$10$2CtCJWno/pJjdgA.UB8V4esac/FySEQHuumWvcVi8PMmQOABnMIRi', 'Sistem Informasi', '0', 2, 1),
(70, 'RANSENI DONA ATE', '3219028', 'default.jpg', '$2y$10$oXKm0yL9NVXllkbFGaRnne2CKASFaxVe2v4OiPoei5Tro4GiuHw9q', 'Sistem Informasi', '0', 2, 1),
(71, 'KANISIUS KIA LADOPURAB', '3219029', 'default.jpg', '$2y$10$8NsmEYwiaFgmiqNNNPg7auMfktIfMYYRVYsOhRg9i7IAyZvSYAAAS', 'Sistem Informasi', '0', 2, 1),
(72, 'RAFAEL EUSABIUS DHAE', '3219031', 'default.jpg', '$2y$10$868lN6qssKw3U06INram5OVws3Zoy/Bp.p6z4B61WARaQyAvn3XxK', 'Sistem Informasi', '0', 2, 1),
(73, 'YOVENTA MIKU ATE', '3219032', 'default.jpg', '$2y$10$vX7ZCUQKqz41EuHteGtu3OSxtvR6iL2GU73SUd8rNbn607pFbUs3C', 'Sistem Informasi', '0', 2, 1),
(74, 'YESHI THALITA PRILIETUKA', '3219033', 'default.jpg', '$2y$10$rhoIP46bmj.z1S5HRiJ0bew32PHTNwF93jzS.CFhygqVtZdqvDHGe', 'Sistem Informasi', '0', 2, 1),
(75, 'CORNELIS LEDI', '3220001', 'default.jpg', '$2y$10$/RMCdG2uS1CvguBi7TLYeO1ZJhBULlIO.LDIzQd2rApNM4qAsf8s2', 'Sistem Informasi', '0', 2, 1),
(76, 'LUKAS NDARA TILU', '3220002', 'default.jpg', '$2y$10$CNCBMnY36UMloxUhH/mKlerxlVB8MzImls6bkky6TXieEhbCL/2cS', 'Sistem Informasi', '0', 2, 1),
(77, 'ANTONETA NATALIA DAPA', '3220003', 'default.jpg', '$2y$10$kGBfcqP68wMLDrBAISRsQetpW1m3aF.0RCdV4//OIQ3in/91Hg4vy', 'Sistem Informasi', '0', 2, 1),
(78, 'YETA KOSSAY', '3220004', 'default.jpg', '$2y$10$cT2jC30vFZ8oNeMThMtg7Ofms5/021kdfJLruMaqzNZhq8tjWXBMK', 'Sistem Informasi', '0', 2, 1),
(79, 'IDA BAGUS PUTRA', '3220005', 'default.jpg', '$2y$10$5KacIXm/V7gw1utXdLDPb.W7b0eQiEMgxbUYk1exN3DsO4814vbHy', 'Sistem Informasi', '0', 2, 1),
(80, 'ERMIYANI RAMBU MEJA', '3220006', 'default.jpg', '$2y$10$mRaIw4HRvGyJpm0xTHwwnOk/L0t4ilXpOQgTpeGfcwwKP1S8l7S7C', 'Sistem Informasi', '0', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_access_menu`
--
ALTER TABLE `tb_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_req_tagihan`
--
ALTER TABLE `tb_req_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_total_tagihan`
--
ALTER TABLE `tb_total_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_access_menu`
--
ALTER TABLE `tb_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_req_tagihan`
--
ALTER TABLE `tb_req_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_total_tagihan`
--
ALTER TABLE `tb_total_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
