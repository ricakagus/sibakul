-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 11:19 AM
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
  `id_tagihan` varchar(20) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_bayar` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `id_tagihan`, `nim`, `jumlah`, `tgl_bayar`, `bukti`, `status`) VALUES
(1, '2020083219001', '3219001', 1450000, '1598409240', '2020083219001.jpg', 1),
(2, '2020081219001', '1219001', 1010000, '1598495759', '20200812190011.jpg', 1),
(3, '2020091216008', '1216008', 1800000, '1600534220', '20200912160081.jpg', 1),
(4, '2020091218001', '1218001', 2260000, '1600534901', '2020091218001.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_req_tagihan`
--

CREATE TABLE `tb_req_tagihan` (
  `id` int(11) NOT NULL,
  `date_req` int(11) NOT NULL,
  `id_tagihan` varchar(20) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pesan_req` text NOT NULL,
  `pesan_resp` text NOT NULL,
  `status` int(1) NOT NULL,
  `sisa_req` int(11) NOT NULL,
  `date_resp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_req_tagihan`
--

INSERT INTO `tb_req_tagihan` (`id`, `date_req`, `id_tagihan`, `nim`, `nama`, `pesan_req`, `pesan_resp`, `status`, `sisa_req`, `date_resp`) VALUES
(3, 1600512899, '2020091216008', '1216008', 'PETRUS RAFAEL DHAE', 'saya hanya bisa bayar 1 juta', '', 1, 0, 1600512940),
(4, 1600523341, '2020091219012', '1219012', 'ALEXANDER DINGU JAGA MEHA', 'saya mau bayar 2 juta langsung', '', 1, 1, 1600523437),
(5, 1601880197, '2020091218004', '1218004', 'DAVID UMBU NGAILU', 'maaf bu saya cuma bisa bayar 200 ribu hakjs ahsk akjhskja kjhaksj haksja kjhaskj haksja kjahskja kjahskja', '', 2, 0, 1601880391),
(16, 1601967319, '2020091218002', '1218002', 'IGNASIUS ALANS TUNJUNG', 'bu saya mau bayar 3 juta', '', 1, 0, 1601967329);

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
  `bulan` varchar(20) NOT NULL,
  `tahun` int(4) NOT NULL,
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

INSERT INTO `tb_tagihan` (`id`, `id_tagihan`, `created`, `bulan`, `tahun`, `nim`, `nama`, `jumlah`, `cuti`, `dpp`, `almamater`, `pspt`, `kp`, `pkp`, `ta`, `pta`, `spp`, `konversi`, `denda`, `status`) VALUES
(2, '2020091216015', 1600243556, '9', 2020, '1216015', 'MIKIRON WEYA', 1520000, 500000, 300000, 0, 0, 0, 0, 0, 0, 700000, 0, 20000, 0),
(3, '2020101218001', 1600243556, '9', 2020, '1218001', 'MARTEN UMBU LOLO', 1000000, 500000, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(4, '2020091218002', 1600243556, '9', 2020, '1218002', 'IGNASIUS ALANS TUNJUNG', 1780000, 0, 0, 0, 0, 0, 0, 1300000, 0, 450000, 0, 30000, 0),
(5, '2020091218003', 1600243556, '9', 2020, '1218003', 'FLORIDA DOWA', 1680000, 500000, 500000, 150000, 0, 0, 0, 0, 0, 500000, 0, 30000, 0),
(6, '2020091218004', 1600243556, '9', 2020, '1218004', 'DAVID UMBU NGAILU', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(7, '2020091218006', 1600243556, '9', 2020, '1218006', 'MARSELINUS MONGGO', 1220000, 0, 700000, 0, 0, 0, 0, 0, 0, 500000, 0, 20000, 0),
(8, '2020091218007', 1600243556, '9', 2020, '1218007', 'WENIUS LOKOBAL', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(9, '2020091218008', 1600243556, '9', 2020, '1218008', 'GAUDENSIA NATALIA LEDE', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(10, '2020091218009', 1600243556, '9', 2020, '1218009', 'PAULUS REHI KALLI GHOBA', 530000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 30000, 0),
(11, '2020091219012', 1600243556, '9', 2020, '1219012', 'ALEXANDER DINGU JAGA MEHA', 1350000, 0, 600000, 150000, 0, 0, 0, 0, 0, 550000, 0, 50000, 0),
(13, '2020091216015', 1600533212, '9', 2020, '1216015', 'MIKIRON WEYA', 1520000, 500000, 300000, 0, 0, 0, 0, 0, 0, 700000, 0, 20000, 0),
(14, '2020101218001', 1600533212, '9', 2020, '1218001', 'MARTEN UMBU LOLO', 1000000, 500000, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(16, '2020091218003', 1600533212, '9', 2020, '1218003', 'FLORIDA DOWA', 1680000, 500000, 500000, 150000, 0, 0, 0, 0, 0, 500000, 0, 30000, 0),
(17, '2020091218004', 1600533212, '9', 2020, '1218004', 'DAVID UMBU NGAILU', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(18, '2020091218006', 1600533212, '9', 2020, '1218006', 'MARSELINUS MONGGO', 1220000, 0, 700000, 0, 0, 0, 0, 0, 0, 500000, 0, 20000, 0),
(19, '2020091218007', 1600533212, '9', 2020, '1218007', 'WENIUS LOKOBAL', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(20, '2020091218008', 1600533212, '9', 2020, '1218008', 'GAUDENSIA NATALIA LEDE', 500000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0),
(21, '2020091218009', 1600533212, '9', 2020, '1218009', 'PAULUS REHI KALLI GHOBA', 530000, 0, 0, 0, 0, 0, 0, 0, 0, 500000, 0, 30000, 0),
(22, '2020091219012', 1600533212, '9', 2020, '1219012', 'ALEXANDER DINGU JAGA MEHA', 1350000, 0, 600000, 150000, 0, 0, 0, 0, 0, 550000, 0, 50000, 0);

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
(1, 'Admin Utama ', 'admin', 'default.jpg', '$2y$10$.ZjMQ/f1IpImwopCfI3riepiuwCVTTaM3KgKoiv/wqzVgmsP74LRq', '-', '0', 1, 1),
(2, 'PETRUS RAFAEL DHAE', '1216008', '1216008.jpg', '$2y$10$TWUPZIszCp/h8dg0kukuy.f4jQ3BFqY55Sn0ODpnd1/ZjhSCVP8Wy', 'Teknik Informatika', '0881111', 2, 1),
(3, 'MIKIRON WEYA', '1216015', 'default.jpg', '$2y$10$f4REGlOmf6nfelWLgvf.Ie2vdOaRKKZBpz1aFGnOvRRKArKVqmlaG', 'Teknik Informatika', '', 2, 1),
(4, 'MARTEN UMBU LOLO', '1218001', 'default.jpg', '$2y$10$tVwqQEA7Bxie/GIp9jGZGOGVY2fC9sGHfRHu1hH1uhhkN21pDwRoK', 'Teknik Informatika', '', 2, 1),
(5, 'IGNASIUS ALANS TUNJUNG', '1218002', 'default.jpg', '$2y$10$Ie9hGB5GG6aXwz68TZizieCn3JztujihjPPjc.KbsKI5ps6H5O19q', 'Teknik Informatika', '', 2, 1),
(6, 'FLORIDA DOWA', '1218003', 'default.jpg', '$2y$10$dnU5YA9F7o1RDOUTEJ94ueCEPloOQN.yWrkcEa55oRuFLlqv2uKaS', 'Teknik Informatika', '', 2, 1),
(7, 'DAVID UMBU NGAILU', '1218004', 'default.jpg', '$2y$10$lgVRfDVueXGJp8Hag5B9WO3oRXxW90NE8ypfBosJdry5KQ9ijfiPC', 'Teknik Informatika', '', 2, 1),
(8, 'MARSELINUS MONGGO', '1218006', 'default.jpg', '$2y$10$YMQTV5eTIEBQnlI2XC1Ix.6K1t7hzWoWLofONBfg03cjeDigWc52O', 'Teknik Informatika', '', 2, 1),
(9, 'WENIUS LOKOBAL', '1218007', 'default.jpg', '$2y$10$OrLHzQLHMcICW9bO1RPfCOL4ZjTmPxAS0I5KSifurkXmG/p6xHOXm', 'Teknik Informatika', '', 2, 1),
(10, 'GAUDENSIA NATALIA LEDE', '1218008', 'default.jpg', '$2y$10$2BNXw6aR1dGa0aulRHgLKOb0bMLHvcyzuOON..L2HjgV4qrm/0IVS', 'Teknik Informatika', '', 2, 1),
(11, 'PAULUS REHI KALLI GHOBA', '1218009', 'default.jpg', '$2y$10$d5gqVm7zNlaf9sUkOXekXuTD7H/4aTGPSIeDom.LbTXueKgBK3ND6', 'Teknik Informatika', '', 2, 1),
(12, 'OKTAVIANA KALLU ATE', '1218013', 'default.jpg', '$2y$10$9uLqnLakBdZVjCimOG8poeiY62OgxmTBtlaVKhFn7s5ll0omF1IPu', 'Teknik Informatika', '', 2, 1),
(13, 'APLIANA AMBU KAKA', '1218014', 'default.jpg', '$2y$10$0/UAotXt1F8G9Ij62Kr/2OBBO59nsP5i9TNnnFsYzAKEBAkU9LR6W', 'Teknik Informatika', '', 2, 1),
(14, 'VERONIKA WALU', '1219001', 'default.jpg', '$2y$10$2rIePTQxhYbJKYayoXcgcukKhbId2tnB5ZI9nJIRF51kWIOFZZDqy', 'Teknik Informatika', '', 2, 1),
(15, 'YOHANES EWALDUS WOI GOA', '1219002', 'default.jpg', '$2y$10$vhFfKXgh4TCIhPyOBNsgIe/G1Jhtm4D4L.G1QCebn9P0FI6BcrjJu', 'Teknik Informatika', '', 2, 1),
(16, 'YOHANES JEFFRIANUS PORA', '1219003', 'default.jpg', '$2y$10$xi5WcuwXRObAFeI2ETK4gu6QKzDTZBfmA7TOAstOzwFTKezLyiA2a', 'Teknik Informatika', '', 2, 1),
(17, 'YANSENSIUS YONIS DALE', '1219005', 'default.jpg', '$2y$10$KqLwSxmQLXl6EMWDJuUjZOD/NNMotB.adr7XAgR2GCuk/DPgH08Cq', 'Teknik Informatika', '', 2, 1),
(18, 'HARTON NUHAMARA', '1219006', 'default.jpg', '$2y$10$KEEPDSbvCfVxt0MWd6I07.RATct4hkisWw8jYRPOr8CcWvbbEBaMS', 'Teknik Informatika', '', 2, 1),
(19, 'MARTHA BELA', '1219007', 'default.jpg', '$2y$10$fUTl0vpi4PkvnWz55q7ZoOz1zFMuJ5NWaa2OfjbLUfssqRmrWha4u', 'Teknik Informatika', '', 2, 1),
(20, 'FEMIATI DANGGA', '1219008', 'default.jpg', '$2y$10$BV0CIV.EbpgrhNdg4VhImeZQoTNwBX5mBQuBrsisr9QWNfNAVvt4u', 'Teknik Informatika', '', 2, 1),
(21, 'ADELFINA PATI BEBE', '1219009', 'default.jpg', '$2y$10$NCAgg5X.3IU5rYlGHrxwyec5EVZYHyeQ8uAWS46sZXPA2YrT21rFS', 'Teknik Informatika', '', 2, 1),
(22, 'APOLONIA RENDA MALO', '1219011', 'default.jpg', '$2y$10$smWD57A6mGuoZVxtNXVtWe586OR0LOta4acKKwOzAaHanCYsnEa1q', 'Teknik Informatika', '', 2, 1),
(23, 'ALEXANDER DINGU JAGA MEHA', '1219012', 'default.jpg', '$2y$10$tFAZeiW92wGcrER55DT9SOYLDVVJZs8fXGKO9rr/hlgp6jC3ObIb2', 'Teknik Informatika', '', 2, 1),
(24, 'GETRUDIS DAPPA', '1219014', 'default.jpg', '$2y$10$T7fucDBdQyTnevtFYu4WZOjlhxcR4u8GiOvPv6.JmCmq96e6WqVFC', 'Teknik Informatika', '', 2, 1),
(25, 'ESTER BALI ATE', '1220001', 'default.jpg', '$2y$10$5KYnVkPccw2eowbSkHhIz.22N.AgO4Z0EVYJxxwVCoAylYA5VdXLK', 'Teknik Informatika', '', 2, 1),
(26, 'ANTONIUS NGEDANG', '1220002', 'default.jpg', '$2y$10$2PAV/KrPgzgiKekYpI0kd.mWLyRLk4FSCuGGIXaWyCqJWRprha53m', 'Teknik Informatika', '', 2, 1),
(27, 'BONIFASIUS MORI UMA', '1220003', 'default.jpg', '$2y$10$xYCdwTTK5DE3G9w9PEJZR.LvSLOJRfrkYAMEgR3stULHQR2HUtGv6', 'Teknik Informatika', '', 2, 1),
(28, 'MELFIANUS NGONGO', '1220004', 'default.jpg', '$2y$10$NgaDjVQdd7XOAg/nxzVRsOYlkBMcr.nskyCSDSXUE4wZak/X84XP6', 'Teknik Informatika', '', 2, 1),
(29, 'ANASTASYA SARMINCE TONDA', '1220005', 'default.jpg', '$2y$10$5cJjOd5ZVvp4nghLtf0Wfe72ALXglOHSrWinslONeAI3Fo4kHc/OG', 'Teknik Informatika', '', 2, 1),
(30, 'YUSTIYANA MESA', '1220006', 'default.jpg', '$2y$10$6lq/tr0npAHlyjHVwM9m/O0ft.XuZ1PHJFJuz9.Ms8jIn1YyTrSr6', 'Teknik Informatika', '', 2, 1),
(31, 'MAKSIANUS BILI', '1220007', 'default.jpg', '$2y$10$fR40sVlSyDqHFBa74xNOKO8hRfhLcnVnvhLV7frqt5rlUn3B5VSae', 'Teknik Informatika', '', 2, 1),
(32, 'ERLINA ANGGRIYANI R. J. M', '1220008', 'default.jpg', '$2y$10$DrnTCA/jRMCP3.MB6wA5IOoBeq1AnCKafI.nHOrwLkw.ugW1SfPUq', 'Teknik Informatika', '', 2, 1),
(33, 'MINCE PATA', '1220009', 'default.jpg', '$2y$10$4Y7JcW1N5OxbnLPz/o3eGuGeXp0aqrwj2LhceyGQoeriBblD.567u', 'Teknik Informatika', '', 2, 1),
(34, 'YOHANIS BILI', '3214003', 'default.jpg', '$2y$10$DPsoFq3.MLl7hAiiiBa.SefmZYDmo2PQIXuSzccPoti6Y1oini3ru', 'Sistem Informasi', '', 2, 1),
(35, 'HIZKIA MULAIT', '3216007', 'default.jpg', '$2y$10$3LcXb7vFlbzEyBf0Il06DOpEa1ESFbvSlCYTwlYRp/fCxe2iSpLSm', 'Sistem Informasi', '', 2, 1),
(36, 'ANGELIUS NGASI', '3216025', 'default.jpg', '$2y$10$Ugtn024.sdqIvL17r3AcSO7j8kgYjclRvnoICxpeJz/WeGi1y9vFK', 'Sistem Informasi', '', 2, 1),
(37, 'KORNELIS NUMA CEME', '3216026', 'default.jpg', '$2y$10$DmQegrqMl34nI0DFN6WbgOREDc5Rcdal9LNgAUdEG1SqJsBq55VG.', 'Sistem Informasi', '', 2, 1),
(38, 'LODOVIKUS REBA', '3217003', 'default.jpg', '$2y$10$0Pz9OC0fq7SSQr24Svt3XOkW32O/dk6Gr4hWetFsjW0IDOXDSMSeq', 'Sistem Informasi', '', 2, 1),
(39, 'TIMOTEUS PANGKUR', '3217005', 'default.jpg', '$2y$10$PKdwHC8eM258RvSpLoCoIe1MEimsZI/ieUpFU6gsH9UIB3kOE9QIq', 'Sistem Informasi', '', 2, 1),
(40, 'OKTAVINA NIWA LAPIR', '3217006', 'default.jpg', '$2y$10$M34b//QVxj6ksO9VFSFSKOh904cNNfGWw58SGpbJZZbKpku9zBx5m', 'Sistem Informasi', '', 2, 1),
(41, 'YUMIATI WUNDA', '3217008', 'default.jpg', '$2y$10$1YhveaRAmdU41QK4WfbOSuNUj2Q9Pq0ynDPRZSCzaVmjqp58k1SEK', 'Sistem Informasi', '', 2, 1),
(42, 'YUNITA LADA', '3217009', 'default.jpg', '$2y$10$7wC3noNCodbcA2.tznZUjOrD7xruaMxrhG5yfafvWxkqbFbP9ZvSC', 'Sistem Informasi', '', 2, 1),
(43, 'MARIA NELSI GODAT', '3217017', 'default.jpg', '$2y$10$k4lnvBQk8QKwa6HpbB784uFiDJcs3YJ7Uj6p6ipAqvqu6H2DXMlIW', 'Sistem Informasi', '', 2, 1),
(44, 'ANASTASIA JENIATI LENDE', '3218001', 'default.jpg', '$2y$10$bZ5bL5Z5cY3XlbpbcvfkTOlLXUzIIke5ECQFq1duETlZv.sF43qyC', 'Sistem Informasi', '', 2, 1),
(45, 'INCE DAMA MIJUK', '3218006', 'default.jpg', '$2y$10$YgFbLX8tUMPGdovP0QrYqebKSH0V/Btos0aifC1iAFbp42rN1ren6', 'Sistem Informasi', '', 2, 1),
(46, 'MARIA LEDE PAHA', '3218011', 'default.jpg', '$2y$10$/U6YkqGSnTneERHz1YJ3SuZPospOB2VqdL16gsMMDqjkcBxAklDSS', 'Sistem Informasi', '', 2, 1),
(47, 'MERI KAHI KATUDA MEHA', '3218012', 'default.jpg', '$2y$10$vBqOmKrehXOPrU4GGTmGge2creWXvUVPQPpKLG...leoL9ITDfMWK', 'Sistem Informasi', '', 2, 1),
(48, 'MARIA FATIMA WEA', '3218014', 'default.jpg', '$2y$10$wGa0im/AwsB2zpA1jO3kNuEvbpzW9zKpvN3QZCx3.WOpzx94SHvky', 'Sistem Informasi', '', 2, 1),
(49, 'GIDION JAKA MERE', '3218017', 'default.jpg', '$2y$10$PTzLdVD3hVUTWo/1ApAZle/kvtWHvEBunblBknj5EP9waGHsyw/8G', 'Sistem Informasi', '', 2, 1),
(50, 'KORNELIS PANDI', '3218021', 'default.jpg', '$2y$10$ocD.o8ReWR6ycBrkgxi9eueYTGErUBOOmnxNNfIX6U5e6wn9eRR6.', 'Sistem Informasi', '', 2, 1),
(51, 'DINA MARIANA LENDE', '3218022', 'default.jpg', '$2y$10$mfaEFlphzqF4KecTE1BuueYRzrzbIVueRVsl29JWv3QLMmSXIZ98.', 'Sistem Informasi', '', 2, 1),
(52, 'KRISTINA DADA MERE', '3219001', 'default.jpg', '$2y$10$D9C3mBcJv.zth/Rc.7yM0eNUBKtme0KMMsfZ5t2j1Z1y0kolCav5.', 'Sistem Informasi', '', 2, 1),
(53, 'AGNES LULAILA GADI', '3219002', 'default.jpg', '$2y$10$F3D/vgK6wGa.ctf35IQ2LOo846mhz9NCBMZ8DxsPJhNdZpfi5fMuC', 'Sistem Informasi', '', 2, 1),
(54, 'RACHMAD DWIKI P', '3219003', 'default.jpg', '$2y$10$NPcL0V.MsOwmL8YzGT0QtecxQpYvDhbc5no/qs7AoQ9kk.C6w7MZS', 'Sistem Informasi', '', 2, 1),
(55, 'GERARDUS DEKE DETA', '3219004', 'default.jpg', '$2y$10$BJEvCJEecYiJbHZlwOIDHuqn5MaaK31x1o1FlS6GkefKP0J6mzaVa', 'Sistem Informasi', '', 2, 1),
(56, 'PELIPUS WINYO BULU', '3219005', 'default.jpg', '$2y$10$axu5f0KsIPhpqca2ja8osOAegzr0/aLzKdky8R5yNwJuzOXkhYE1q', 'Sistem Informasi', '', 2, 1),
(57, 'KRISTINA KALLI GHOBA', '3219006', 'default.jpg', '$2y$10$FSqU3VVpCpzdWEgf94QMie.wUhu3hMLYn45xTENxao50sgbrO1sn.', 'Sistem Informasi', '', 2, 1),
(58, 'SARIYANTI WOLLA MAWO', '3219008', 'default.jpg', '$2y$10$KKTQ.HWonn9Chua9ecFv4.b9pXKbeSxFcQUI7kdTSe37LvifkK5IK', 'Sistem Informasi', '', 2, 1),
(59, 'YAKOB DANIEL TANGKO', '3219009', 'default.jpg', '$2y$10$bIUluoOt8llYU6XXbn34HOomHkvDirBtLTcNr4baW5l405hMAx3NO', 'Sistem Informasi', '', 2, 1),
(60, 'URBANUS UMBU ROBAKA', '3219013', 'default.jpg', '$2y$10$Tpx4mZ/eiDAhNJKsfHZm0.lMNLnDpO5geDMDvnhe6cPxDzPoOOaIO', 'Sistem Informasi', '', 2, 1),
(61, 'ALIUS JONI KAHA', '3219017', 'default.jpg', '$2y$10$Y5Aok1bOcV8wo5rmGO8Et.2yXC/JiIwCeFDeYCqd4Y2C9QEFAJtOq', 'Sistem Informasi', '', 2, 1),
(62, 'DOMINGGUS BILI N', '3219019', 'default.jpg', '$2y$10$z.1JLGguYKl7Hj/BImv94uOJy9Rze0Ebsa3RKZBOKztsgPO.2Wp9m', 'Sistem Informasi', '', 2, 1),
(63, 'DORCE BULU', '3219020', 'default.jpg', '$2y$10$7bZWjvLRxuef.Jt4Wb3jPeDnqxY9.y0qSPsWKpIzsMO0L45IJdoTa', 'Sistem Informasi', '', 2, 1),
(64, 'ANASTASIA POTE', '3219022', 'default.jpg', '$2y$10$wTcgHiBL6LFgmNy5J91wN.eFN5qHvyOZ7xqwCa4Wux6VYgr3Z7yuy', 'Sistem Informasi', '', 2, 1),
(65, 'YASINTA BILI', '3219023', 'default.jpg', '$2y$10$QczT0yv2FiIb6ftPv30kmO6RVZFZwWSuam35qpS7SvFUNQg54l8ti', 'Sistem Informasi', '', 2, 1),
(66, 'ADRIANA HALATO', '3219024', 'default.jpg', '$2y$10$fGQrXldIECJZ6r3J/Lnns.3.SJu7/QbTZyxs2./YPpQZ8OBsWcBl6', 'Sistem Informasi', '', 2, 1),
(67, 'FRANSISKUS SAVERINUS L', '3219025', 'default.jpg', '$2y$10$9vLb8Z8QnMI27ZxMFbsBCuRGutzbX0nrzj.PpwhKaWli.QY/56wae', 'Sistem Informasi', '', 2, 1),
(68, 'DAMIANUS LENDE', '3219026', 'default.jpg', '$2y$10$Rpob9BypdSIqoLkttljoc.DCGlUNRRi4FBmPGbJABQp/Z040ilBWi', 'Sistem Informasi', '', 2, 1),
(69, 'NINGSI KONGA NAHA', '3219027', 'default.jpg', '$2y$10$8fJszL2RrGC41BmMoCIDX.9u0nqqth7OYbYY/WV0VANnfG8rSs36e', 'Sistem Informasi', '', 2, 1),
(70, 'RANSENI DONA ATE', '3219028', 'default.jpg', '$2y$10$jkGA7QpdeeKC/S8GMqDx5egqO0e11T00FPZ16As5BicheQrJXEB1G', 'Sistem Informasi', '', 2, 1),
(71, 'KANISIUS KIA LADOPURAB', '3219029', 'default.jpg', '$2y$10$3AhLV3mLnQ7Er2Th3rkS7e7zg76cL4TNq87bmnbvzLLkGnJi4s1Ua', 'Sistem Informasi', '', 2, 1),
(72, 'RAFAEL EUSABIUS DHAE', '3219031', 'default.jpg', '$2y$10$OSeIKFT7oOty8RI5XAj8/eJ/liFSj0p4kpjZBvLgybXOvbEudCZ5.', 'Sistem Informasi', '', 2, 1),
(73, 'YOVENTA MIKU ATE', '3219032', 'default.jpg', '$2y$10$t5GlX48IxamcYFEYgco7n.dOYmAJslDjDQRPrXuBmwL7ybR0TIPd.', 'Sistem Informasi', '', 2, 1),
(74, 'YESHI THALITA PRILIETUKA', '3219033', 'default.jpg', '$2y$10$qPIPgSDpNMtr5UCReSHBTOPzRYXJYG9VZiopEE5Kotw.EZV3Z2k96', 'Sistem Informasi', '', 2, 1),
(75, 'CORNELIS LEDI', '3220001', 'default.jpg', '$2y$10$J5T6HYIFlHAd3VcqRKq78uko9CUYFGYkTZccBuCK1HZdpoGQgKn4O', 'Sistem Informasi', '', 2, 1),
(76, 'LUKAS NDARA TILU', '3220002', 'default.jpg', '$2y$10$nvYo47xJSx3zvDo0CUFNVuXmZv5UXFRWbIt5SwLrAFhQKI3um8dwS', 'Sistem Informasi', '', 2, 1),
(77, 'ANTONETA NATALIA DAPA', '3220003', 'default.jpg', '$2y$10$7jKzZBcGHZeV.PQKPaLBJOLTmq54PmfSwoiLGu.1lfwJ7TrebcDqa', 'Sistem Informasi', '', 2, 1),
(78, 'YETA KOSSAY', '3220004', 'default.jpg', '$2y$10$ArV5eZKdafmD8BnKl/7YYOQfdr6j0AFeIvhegH4DJ21Db8ibUcwsa', 'Sistem Informasi', '', 2, 1),
(79, 'IDA BAGUS PUTRA', '3220005', 'default.jpg', '$2y$10$ApH0u..gSkokx0x8diXr2ubP8ODvDNBkaxUPHBWcHA5JQWvFmEDKm', 'Sistem Informasi', '', 2, 1),
(80, 'ERMIYANI RAMBU MEJA', '3220006', 'default.jpg', '$2y$10$LfAKgLMC28CIQmYctKhk9eHmJuzhjBTo6uQmFVbm0t43/RvtLoav6', 'Sistem Informasi', '', 2, 1),
(81, 'PETRUS RAFAEL DHAE', '1216008', '1216008.jpg', '$2y$10$TWUPZIszCp/h8dg0kukuy.f4jQ3BFqY55Sn0ODpnd1/ZjhSCVP8Wy', 'Teknik Informatika', '0881111', 2, 1),
(82, 'MIKIRON WEYA', '1216015', 'default.jpg', '$2y$10$7q7QFYyLlQk70klpDq0ejeoglH3tH1EZcncMZegce4Rn2EY5e.65m', 'Teknik Informatika', '0', 2, 1),
(83, 'MARTEN UMBU LOLO', '1218001', 'default.jpg', '$2y$10$gdqq4vJMmumOsCudf0vjaeINKx0z6gDm5R4uNmr4RblJdDpxndGF2', 'Teknik Informatika', '0', 2, 1),
(84, 'IGNASIUS ALANS TUNJUNG', '1218002', 'default.jpg', '$2y$10$9vyw5DRVkAcAkV61OMU4p.z7Mp24Cbu3xlAMPbKDkPJ4dn83kDAdS', 'Teknik Informatika', '0', 2, 1),
(85, 'FLORIDA DOWA', '1218003', 'default.jpg', '$2y$10$2XrqOOB74abywIzDEX.RS.OdYa4InYD.qPnpoxzHZh5b4s0AvryS2', 'Teknik Informatika', '0', 2, 1),
(86, 'DAVID UMBU NGAILU', '1218004', 'default.jpg', '$2y$10$MbrUtLU3kEFrZZUox4LvguIvroaLDs5d8gHiCK4DO1IhJptRbxDcO', 'Teknik Informatika', '0', 2, 1),
(87, 'MARSELINUS MONGGO', '1218006', 'default.jpg', '$2y$10$u2NuoMzg91Kql5Q2QYdiZ.HZSa7TI8azW2Z1mGOajma0tK/OOihzS', 'Teknik Informatika', '0', 2, 1),
(88, 'WENIUS LOKOBAL', '1218007', 'default.jpg', '$2y$10$ociFfz9byzNap3/rGMGbUOlFoHot5XjHX46sxu0wPescl/Natw.Fe', 'Teknik Informatika', '0', 2, 1),
(89, 'GAUDENSIA NATALIA LEDE', '1218008', 'default.jpg', '$2y$10$4X7LXyyDsUVC0mafPPyHCOc2tbQ718u6X/vYj56EhQuccSLqar8YG', 'Teknik Informatika', '0', 2, 1),
(90, 'PAULUS REHI KALLI GHOBA', '1218009', 'default.jpg', '$2y$10$LQK8ee09WKQ6JSuWEWbsLOuz5l5l53ms/VIMzemmqxH.T2zcNeKxq', 'Teknik Informatika', '0', 2, 1),
(91, 'OKTAVIANA KALLU ATE', '1218013', 'default.jpg', '$2y$10$UApZcN6RF3TERU3lH.xT5eGzjVCqi90D0kS4iA8hRnPOUsLJfB7Di', 'Teknik Informatika', '0', 2, 1),
(92, 'APLIANA AMBU KAKA', '1218014', 'default.jpg', '$2y$10$e/ZYSI8ibLm5lm0QbjTheu1nAGnOpk1Nb1WiLqWPWFUI4A5dlh.Yi', 'Teknik Informatika', '0', 2, 1),
(93, 'VERONIKA WALU', '1219001', 'default.jpg', '$2y$10$enIOdqbllfmciSyaUREM5eGQIyqnAjtiWDNWPpFEGUc1VVXhbkHOe', 'Teknik Informatika', '0', 2, 1),
(94, 'YOHANES EWALDUS WOI GOA', '1219002', 'default.jpg', '$2y$10$8wbc6I2P3Xit13ry0VCwM.JSI7NexQJOuvrM.bSAFkd.iOPuu98KS', 'Teknik Informatika', '0', 2, 1),
(95, 'YOHANES JEFFRIANUS PORA', '1219003', 'default.jpg', '$2y$10$kP4m7GFjquXPB9CGDOScZubWGuH5ZWeRphhuiMAv6B/HC/P8VRW/6', 'Teknik Informatika', '0', 2, 1),
(96, 'YANSENSIUS YONIS DALE', '1219005', 'default.jpg', '$2y$10$YNJp5pL09/J01lKeHvYxaOsfp6Fyh1Wek2dbPxTyZmG6O8bJlK3t.', 'Teknik Informatika', '0', 2, 1),
(97, 'HARTON NUHAMARA', '1219006', 'default.jpg', '$2y$10$3dPVDGXq2g48X5oHQoC1ZeQC9kvaOQYFmZkKqUCain.8OJQ1ZoO0K', 'Teknik Informatika', '0', 2, 1),
(98, 'MARTHA BELA', '1219007', 'default.jpg', '$2y$10$ZgthRPomyicg3QFQeNCGzOn7jMR.4x01kDrP9bEowCtV1U4vstSJ6', 'Teknik Informatika', '0', 2, 1),
(99, 'FEMIATI DANGGA', '1219008', 'default.jpg', '$2y$10$ZnjbQxQkWA6r818AFRUr2.0l6PivT/BmKqLvxPYILsGZYG86xmxjC', 'Teknik Informatika', '0', 2, 1),
(100, 'ADELFINA PATI BEBE', '1219009', 'default.jpg', '$2y$10$OXfhX8MtCuWNzEi1qmHJ0eXI4ugGalPMhm051PKjwPRNbI3xD9F2K', 'Teknik Informatika', '0', 2, 1),
(101, 'APOLONIA RENDA MALO', '1219011', 'default.jpg', '$2y$10$B9CJv1Abtn22zCGZOfjr3e2ALYxiaEVDJ3WThBn0rU7gzkpEGcWrG', 'Teknik Informatika', '0', 2, 1),
(102, 'ALEXANDER DINGU JAGA MEHA', '1219012', 'default.jpg', '$2y$10$Bb6EVLgxNoGecoRL9AuLEOJogKgiiKVDZYLmkOQP/yBxEEqhaAogy', 'Teknik Informatika', '0', 2, 1),
(103, 'GETRUDIS DAPPA', '1219014', 'default.jpg', '$2y$10$kCpcG9unKzpCfSZAvNyVTu0Gn5s5G/WAuix/m/3kcVHTnScFCUDly', 'Teknik Informatika', '0', 2, 1),
(104, 'ESTER BALI ATE', '1220001', 'default.jpg', '$2y$10$QdkAc9INlFz1sxV7V5Sh6uH63H7crLjIOxE2K2ETaYRk.Ju.Mqwc.', 'Teknik Informatika', '0', 2, 1),
(105, 'ANTONIUS NGEDANG', '1220002', 'default.jpg', '$2y$10$83Q.0JitK3tNTE0mh/jxjeDLC.lDuKZg/91n2/pk.gZpCI6xYIEmm', 'Teknik Informatika', '0', 2, 1),
(106, 'BONIFASIUS MORI UMA', '1220003', 'default.jpg', '$2y$10$Cypoye1JJF5HRr61eW3RD.UYyUmYtDRTbCDceKS6SVrASZOKbb4n6', 'Teknik Informatika', '0', 2, 1),
(107, 'MELFIANUS NGONGO', '1220004', 'default.jpg', '$2y$10$Iqwv/MdmOYtVn2s8lXIuwuYcY7hK0SNX8q7OGUV8sn8QLkjOuYbs2', 'Teknik Informatika', '0', 2, 1),
(108, 'ANASTASYA SARMINCE TONDA', '1220005', 'default.jpg', '$2y$10$FQitv6epBdwh2SHKRbJIbe44I9uE4rnuK/J1.zbh4WWSHHDuJj04C', 'Teknik Informatika', '0', 2, 1),
(109, 'YUSTIYANA MESA', '1220006', 'default.jpg', '$2y$10$lHj0zOy1ndDrq.o1jIq/TeBxnXAV.pyD4LCibYChTgtlDlpYnN8HO', 'Teknik Informatika', '0', 2, 1),
(110, 'MAKSIANUS BILI', '1220007', 'default.jpg', '$2y$10$S6HSIO20HHZ2kzAQDV283OdyOAtvX3RKYq/zEDHbLmXvGviXNeLR.', 'Teknik Informatika', '0', 2, 1),
(111, 'ERLINA ANGGRIYANI R. J. M', '1220008', 'default.jpg', '$2y$10$fxRLGdUBEQgsBd381Wcu3OzD4KHA.U8VdPks81x3jSn4ryBY96nCy', 'Teknik Informatika', '0', 2, 1),
(112, 'MINCE PATA', '1220009', 'default.jpg', '$2y$10$Kqg5bQCCd2QrlI0Stf5Pu.mkS/XJ36VZCbknURF1Lvoi.c.xz6i6i', 'Teknik Informatika', '0', 2, 1),
(113, 'YOHANIS BILI', '3214003', 'default.jpg', '$2y$10$nEEGPKMCc4VxOiQCC4.6g.1eppDKvYA5vjBX7SVr//U749P4ZaiZS', 'Sistem Informasi', '0', 2, 1),
(114, 'HIZKIA MULAIT', '3216007', 'default.jpg', '$2y$10$sYsXtGmH.hWWMj4FfU8VlOSPECDY74.sLTEmc6dBuAsrdkxGpoKxC', 'Sistem Informasi', '0', 2, 1),
(115, 'ANGELIUS NGASI', '3216025', 'default.jpg', '$2y$10$drerMmD9T77Dcjqw2IgqSu2LhI2YD2VyJJ/OlgvrmvG1VpkZ9O/y.', 'Sistem Informasi', '0', 2, 1),
(116, 'KORNELIS NUMA CEME', '3216026', 'default.jpg', '$2y$10$f/t/SXmDa3Rlj4PR6YvbiOY1xsNcJCiKHt4M0cR78vWqnpeCDY2/6', 'Sistem Informasi', '0', 2, 1),
(117, 'LODOVIKUS REBA', '3217003', 'default.jpg', '$2y$10$Q854fCnasm8zlqqcNqpGoeWGAf0oOVGduJLqA0Yvn9k3qGojwkz7C', 'Sistem Informasi', '0', 2, 1),
(118, 'TIMOTEUS PANGKUR', '3217005', 'default.jpg', '$2y$10$z6PI8DqOFjINKFolp/stJurPiUW2VxTB6NBpULeceiJTW3O51rmVq', 'Sistem Informasi', '0', 2, 1),
(119, 'OKTAVINA NIWA LAPIR', '3217006', 'default.jpg', '$2y$10$EDbYZv5.Ky.l1vxdJ4vnG.rhcREuZNyTnLjiDtcoEQDqagXhyjkKa', 'Sistem Informasi', '0', 2, 1),
(120, 'YUMIATI WUNDA', '3217008', 'default.jpg', '$2y$10$e3c4QP6aW96w30qjpISUieie368WI8LonYPxFxXi9PGwKF09Nneia', 'Sistem Informasi', '0', 2, 1),
(121, 'YUNITA LADA', '3217009', 'default.jpg', '$2y$10$unvcURlS7I.ImpUZd3MeTOHD89uLb.aNx5CsQ4LymiHnxv8xXrs.q', 'Sistem Informasi', '0', 2, 1),
(122, 'MARIA NELSI GODAT', '3217017', 'default.jpg', '$2y$10$TccSwf4VZ7OfERPuOem.6e42X1rmYIUJ/rwKx9ikfHtPrexzsnvjO', 'Sistem Informasi', '0', 2, 1),
(123, 'ANASTASIA JENIATI LENDE', '3218001', 'default.jpg', '$2y$10$jwUBMuXc2YywBlXddEzl0.Sj5GFvGO76rXvpHnlzKktpMuUIhkP5u', 'Sistem Informasi', '0', 2, 1),
(124, 'INCE DAMA MIJUK', '3218006', 'default.jpg', '$2y$10$i7cv1ipzwvyN5Ut5/aGzGuQLlz2mu3VcmOiW0zkneR8yRavL64aCK', 'Sistem Informasi', '0', 2, 1),
(125, 'MARIA LEDE PAHA', '3218011', 'default.jpg', '$2y$10$rmicdRY3Z/XTZw5rQBcq2.7RHuGr187jpTSYnuA8t2KN1AY2.ZFFu', 'Sistem Informasi', '0', 2, 1),
(126, 'MERI KAHI KATUDA MEHA', '3218012', 'default.jpg', '$2y$10$3OFgB6vTF/UDtO4LunkKPu4OmDlG2yLfg7NiSdx5QWB3lN6vB9z52', 'Sistem Informasi', '0', 2, 1),
(127, 'MARIA FATIMA WEA', '3218014', 'default.jpg', '$2y$10$M2.8Yf6H2xNymBerHTaNLOveLIaHDiQNENA0/SYwKBaqZ41z3mtte', 'Sistem Informasi', '0', 2, 1),
(128, 'GIDION JAKA MERE', '3218017', 'default.jpg', '$2y$10$KGVammiIybaat2.sDYh5POwMVji3qDQX.s3ZFoQEXZuZbnD4u9GBq', 'Sistem Informasi', '0', 2, 1),
(129, 'KORNELIS PANDI', '3218021', 'default.jpg', '$2y$10$E82QiGwU6SK1yF6DtrUen.JOIZxvG/L93VBTJIoqnhsL.4P7ATmjq', 'Sistem Informasi', '0', 2, 1),
(130, 'DINA MARIANA LENDE', '3218022', 'default.jpg', '$2y$10$hqcczehiRdO1tGqQtNDJlODwFVlJPERG30Q/vjI5XCRWbzEnzhnNy', 'Sistem Informasi', '0', 2, 1),
(131, 'KRISTINA DADA MERE', '3219001', 'default.jpg', '$2y$10$74Cj1gx8rPihI6rZ4jVcMOrW99hYTQz7RCiLeIyB28HqGerbR2.9u', 'Sistem Informasi', '0', 2, 1),
(132, 'AGNES LULAILA GADI', '3219002', 'default.jpg', '$2y$10$nZHkIHiRFztCmjsaqM.5hO0ztWNe9RTgBRcL2GIA/RT03/B3vlKTm', 'Sistem Informasi', '0', 2, 1),
(133, 'RACHMAD DWIKI P', '3219003', 'default.jpg', '$2y$10$H1X9bYwx0nMzuTtjhGPOlOIdcxgHh.DidHZCbd34AL1KovjgDUXM6', 'Sistem Informasi', '0', 2, 1),
(134, 'GERARDUS DEKE DETA', '3219004', 'default.jpg', '$2y$10$s9cuDaF0V.FjbDIpjjlMmu844q.8gz6OvT7T/uEJjcGFVZXSTOhxm', 'Sistem Informasi', '0', 2, 1),
(135, 'PELIPUS WINYO BULU', '3219005', 'default.jpg', '$2y$10$Cwu1qwqbvblEjUZmW8VAceocWOoV13hYG8WjSkVk5cvPSmFS9wFG2', 'Sistem Informasi', '0', 2, 1),
(136, 'KRISTINA KALLI GHOBA', '3219006', 'default.jpg', '$2y$10$6yq0SVzfY4kiyWIlb/gjC.C.CvQs8aXWj27b2gyA6dwKJfZBFm7S.', 'Sistem Informasi', '0', 2, 1),
(137, 'SARIYANTI WOLLA MAWO', '3219008', 'default.jpg', '$2y$10$bbfpYEbyH2CW33Mga5tmXuD0M/DcvGn4aJvF.ET5R5.Rn9q9/9Qdm', 'Sistem Informasi', '0', 2, 1),
(138, 'YAKOB DANIEL TANGKO', '3219009', 'default.jpg', '$2y$10$TrUPsxlP3WW1WD.wamB9kuRDJJO5hp89ywbP7LFmoNJJnPXGOMy5a', 'Sistem Informasi', '0', 2, 1),
(139, 'URBANUS UMBU ROBAKA', '3219013', 'default.jpg', '$2y$10$Rd61qJ3GPvgEKvVuAcIILu26ha6S3ZAvcTPB9hAQ.lh5ekX91aHn.', 'Sistem Informasi', '0', 2, 1),
(140, 'ALIUS JONI KAHA', '3219017', 'default.jpg', '$2y$10$qPuFN9.vSc.ZMDD8UyEEA.Kdto7de50MEmZAp.3IF80tZNaYS3nmy', 'Sistem Informasi', '0', 2, 1),
(141, 'DOMINGGUS BILI N', '3219019', 'default.jpg', '$2y$10$lqrLJvResYkkA.3IDI9w4.Tm6.IasFW7M5qqwbCEvRMsV4EDtd5xe', 'Sistem Informasi', '0', 2, 1),
(142, 'DORCE BULU', '3219020', 'default.jpg', '$2y$10$uvHQpS3d1LAv5x52w664QOpX86Uh9mNpJYgtEvS7cCAweDdMcBN4O', 'Sistem Informasi', '0', 2, 1),
(143, 'ANASTASIA POTE', '3219022', 'default.jpg', '$2y$10$XKV5CzHKNXt0RTdH7SgUCuG3RxGhYrmKNo/vdglcfSvctNIqtiTD6', 'Sistem Informasi', '0', 2, 1),
(144, 'YASINTA BILI', '3219023', 'default.jpg', '$2y$10$79HZnRDCNrd3PeJyIOhgbe/99INWu9VaNEUEAu95d5utrCm6RopvK', 'Sistem Informasi', '0', 2, 1),
(145, 'ADRIANA HALATO', '3219024', 'default.jpg', '$2y$10$WrerLGMZXtFIDmvqn7mLZeHeKwEEKq.pc13RMcv0ewO0C8qrCuVJi', 'Sistem Informasi', '0', 2, 1),
(146, 'FRANSISKUS SAVERINUS L', '3219025', 'default.jpg', '$2y$10$ygfDY2NvA5EeEJPhvm83quPXwvRKwbUeTd2KRoRi8MfnCNn09AaSO', 'Sistem Informasi', '0', 2, 1),
(147, 'DAMIANUS LENDE', '3219026', 'default.jpg', '$2y$10$NXCXixvcuOUDJQVPs/ww8uv0ovNRueWQwM0wFGQwzALnfgUd9D3BG', 'Sistem Informasi', '0', 2, 1),
(148, 'NINGSI KONGA NAHA', '3219027', 'default.jpg', '$2y$10$rZfQZxA0KVarNIgJppNXU.DbwCxgjpmT58c5K32tfHnAiB.1jouvm', 'Sistem Informasi', '0', 2, 1),
(149, 'RANSENI DONA ATE', '3219028', 'default.jpg', '$2y$10$nqlSOOeXVLeAiMjxgDCUreA9gTIxFMWgKqAEL9DkZjLWT3VYVQDRK', 'Sistem Informasi', '0', 2, 1),
(150, 'KANISIUS KIA LADOPURAB', '3219029', 'default.jpg', '$2y$10$4tt3QI8RWmFn/IZlwsLLJemwT4oFinvLxB6bpGvBZ7i8CMY1AJVgG', 'Sistem Informasi', '0', 2, 1),
(151, 'RAFAEL EUSABIUS DHAE', '3219031', 'default.jpg', '$2y$10$8kG5e65IgIl0TUosc8E4Se.PV3sgGTcODTUKlyIWcAqovZs.8wk1K', 'Sistem Informasi', '0', 2, 1),
(152, 'YOVENTA MIKU ATE', '3219032', 'default.jpg', '$2y$10$/4mEzApo4ZzusSZ/zHG1G.AWkVXgmvHHQ5fMyWL0MW2iUXuZuUlM2', 'Sistem Informasi', '0', 2, 1),
(153, 'YESHI THALITA PRILIETUKA', '3219033', 'default.jpg', '$2y$10$1vv60ZBORez1Z2EoK7yh2OiLhbDqOa/I/iZ1rDAXbdmzN3x0uVfwW', 'Sistem Informasi', '0', 2, 1),
(154, 'CORNELIS LEDI', '3220001', 'default.jpg', '$2y$10$l3fZu91fCUsvnK7y.Z5cOO1hrPSKGD/CVqG3aDDrL53UkwK94OWl6', 'Sistem Informasi', '0', 2, 1),
(155, 'LUKAS NDARA TILU', '3220002', 'default.jpg', '$2y$10$l7taaCpF0R9a1O2Kc6vfBON40eCFPalalLVLpYwHLUuinpB7UVgsG', 'Sistem Informasi', '0', 2, 1),
(156, 'ANTONETA NATALIA DAPA', '3220003', 'default.jpg', '$2y$10$s/2HE/TV57ACks4/4mtXEugfkvHSIvF6mil3fxhCijcWuULNcjxPu', 'Sistem Informasi', '0', 2, 1),
(157, 'YETA KOSSAY', '3220004', 'default.jpg', '$2y$10$BoLuLYG9DUXME2h3wUKzpOO.WPKqMqrhqGyyQdn8zoDN559pnAf3G', 'Sistem Informasi', '0', 2, 1),
(158, 'IDA BAGUS PUTRA', '3220005', 'default.jpg', '$2y$10$wbotss6WNzYcHTFnJ1b/a.3iUYMG1tUJxeUrISyRaysNb2p/4TVyK', 'Sistem Informasi', '0', 2, 1),
(159, 'ERMIYANI RAMBU MEJA', '3220006', 'default.jpg', '$2y$10$7yMIz4O8/PCAJ5WNkuVs8Ol9PIGk2SGIiuBxYHD/HhNUk4P3S42Vy', 'Sistem Informasi', '0', 2, 1),
(160, 'PETRUS RAFAEL DHAE', '1216008', '1216008.jpg', '$2y$10$TWUPZIszCp/h8dg0kukuy.f4jQ3BFqY55Sn0ODpnd1/ZjhSCVP8Wy', 'Teknik Informatika', '0881111', 2, 1),
(161, 'MIKIRON WEYA', '1216015', 'default.jpg', '$2y$10$DWojneZmYTfxP35Tw2YtWuxUjIRbbGiHxMfi/RF1mgd5Bew92EHhG', 'Teknik Informatika', '0', 2, 1),
(162, 'MARTEN UMBU LOLO', '1218001', 'default.jpg', '$2y$10$BiopZSMO8jJcxbclfx7UH.6MQEDts3dTWCT7w7fYp7ceHcZI9NZjC', 'Teknik Informatika', '0', 2, 1),
(163, 'IGNASIUS ALANS TUNJUNG', '1218002', 'default.jpg', '$2y$10$oVLBzQjJmAHa6XNt3QMDu.xCutyNvYscH18EqdnxhnxmUIToP8Tom', 'Teknik Informatika', '0', 2, 1),
(164, 'FLORIDA DOWA', '1218003', 'default.jpg', '$2y$10$jvn.7hswgePLv.d1limYou2KtCAGUHWXlY3CVMNB0eLwvD0ipPbYe', 'Teknik Informatika', '0', 2, 1),
(165, 'DAVID UMBU NGAILU', '1218004', 'default.jpg', '$2y$10$STj5mmf4JigsTOrU4VO12eFrdvuKrNjdSjpKfn35WSloMQMhVWIXG', 'Teknik Informatika', '0', 2, 1),
(166, 'MARSELINUS MONGGO', '1218006', 'default.jpg', '$2y$10$rpX0yVlHyIS0wvelQBi9GO9UZkGUqn5iqS/VCjgvkeD3pNXeApbJC', 'Teknik Informatika', '0', 2, 1),
(167, 'WENIUS LOKOBAL', '1218007', 'default.jpg', '$2y$10$A0PGGBhdM2TppfKojYOJKeTHl4g79E8aEScwxvXWGqAIuoWRiw2q.', 'Teknik Informatika', '0', 2, 1),
(168, 'GAUDENSIA NATALIA LEDE', '1218008', 'default.jpg', '$2y$10$wD89l/.kkgPDxiprUV3cj.zCYalprP.i0QqQjXYqZcoYGquhiod3e', 'Teknik Informatika', '0', 2, 1),
(169, 'PAULUS REHI KALLI GHOBA', '1218009', 'default.jpg', '$2y$10$SI9af1XL3zNJSFKzxd9O2OnqaWt3w74juUZynGKai5v5Z34WmCLWW', 'Teknik Informatika', '0', 2, 1),
(170, 'OKTAVIANA KALLU ATE', '1218013', 'default.jpg', '$2y$10$z5DVD/09RHAJ2bPWSoO1JOSXab0nJqe9a4BFW2LX1ws2uAlGJNGwW', 'Teknik Informatika', '0', 2, 1),
(171, 'APLIANA AMBU KAKA', '1218014', 'default.jpg', '$2y$10$WlUnZeCN1ygtpkClZDQajuWejr7I/80VEZs518TDmWq5fl5JUof1q', 'Teknik Informatika', '0', 2, 1),
(172, 'VERONIKA WALU', '1219001', 'default.jpg', '$2y$10$OTVHqLyFtyaH.xIuthZRe.jtCiGxgWNyOOeSEbvnVR26d206cjFbu', 'Teknik Informatika', '0', 2, 1),
(173, 'YOHANES EWALDUS WOI GOA', '1219002', 'default.jpg', '$2y$10$pb/.i.bIvdlW6bhvO3V8XuRjUgBczJp3Q7c44HhdDh8uBGEUbv6ua', 'Teknik Informatika', '0', 2, 1),
(174, 'YOHANES JEFFRIANUS PORA', '1219003', 'default.jpg', '$2y$10$oKGDZCOE4VKl9PFMvWFnCOwnUAksHKlvef1bNeKbRBLpZVxgWgrFy', 'Teknik Informatika', '0', 2, 1),
(175, 'YANSENSIUS YONIS DALE', '1219005', 'default.jpg', '$2y$10$yPevWiD/Up6I8sHHG.4InOv3wNNyb61OrYvb6BsOLoEMmrOuBMm.W', 'Teknik Informatika', '0', 2, 1),
(176, 'HARTON NUHAMARA', '1219006', 'default.jpg', '$2y$10$UA8Tad2YuONt9oSdEc2u0uPG9W6r6v.sObGQBpMJlwFzLDJN6Kgju', 'Teknik Informatika', '0', 2, 1),
(177, 'MARTHA BELA', '1219007', 'default.jpg', '$2y$10$eavtv0Frdn2h9NmjxEdffuCkvmyxEkZqPfI2Ie3kPrM7KuvKyWw2W', 'Teknik Informatika', '0', 2, 1),
(178, 'FEMIATI DANGGA', '1219008', 'default.jpg', '$2y$10$x79oeGvpYxODF1bsSsuNvuaPKsOc1wdWlFsJ2GaJ8usoWB9dq1vdm', 'Teknik Informatika', '0', 2, 1),
(179, 'ADELFINA PATI BEBE', '1219009', 'default.jpg', '$2y$10$hvxJoiyf8EPO.RjWzHNi3.2RiJgNtC9oOjiFurwbX5NcqverV9FVG', 'Teknik Informatika', '0', 2, 1),
(180, 'APOLONIA RENDA MALO', '1219011', 'default.jpg', '$2y$10$TqwOj2FCSNRsxLisYfEz2ugAf7irZqibwKPH/TN3bmLtP8C8zMvVi', 'Teknik Informatika', '0', 2, 1),
(181, 'ALEXANDER DINGU JAGA MEHA', '1219012', 'default.jpg', '$2y$10$.CEYKcginzjb6SN3JmRI1uzxpoTOmlzcmZKxYazMumAMWSihoS8/W', 'Teknik Informatika', '0', 2, 1),
(182, 'GETRUDIS DAPPA', '1219014', 'default.jpg', '$2y$10$eRxEpRG7MAnkCUu2pSZJPeetAVrg.bFX1QC1cWA0w/keqYJc6VYUC', 'Teknik Informatika', '0', 2, 1),
(183, 'ESTER BALI ATE', '1220001', 'default.jpg', '$2y$10$DYlPF4A5tujHWBaGDJWDbeGS9goTW3bozlcV8DEVVQ3mZDFZKHti6', 'Teknik Informatika', '0', 2, 1),
(184, 'ANTONIUS NGEDANG', '1220002', 'default.jpg', '$2y$10$a7EvicSh4fLGIdZeBhNgDORb134daEsfaq71qPPRNeOdLoiXinwv.', 'Teknik Informatika', '0', 2, 1),
(185, 'BONIFASIUS MORI UMA', '1220003', 'default.jpg', '$2y$10$cUNFdgG9xblS8YD1ZqKRxumAgUpRByAaiO4.EY0PChXTn4g9E8cVi', 'Teknik Informatika', '0', 2, 1),
(186, 'MELFIANUS NGONGO', '1220004', 'default.jpg', '$2y$10$TNzFuu3k99RMq72FKMOHGe0zADzFMvjQqdycx3EU3sONJXWSy4uxK', 'Teknik Informatika', '0', 2, 1),
(187, 'ANASTASYA SARMINCE TONDA', '1220005', 'default.jpg', '$2y$10$C8TyK2epYh1bvELBD3ZCae18leYal50v5EaW2lfmqx0K691aHxjiK', 'Teknik Informatika', '0', 2, 1),
(188, 'YUSTIYANA MESA', '1220006', 'default.jpg', '$2y$10$j9irfWI7NRsZe6n1c0tioeywddHuBK4xootkyizvr430FdI1H999K', 'Teknik Informatika', '0', 2, 1),
(189, 'MAKSIANUS BILI', '1220007', 'default.jpg', '$2y$10$8q9iHDOGQTHI9xRhfaScQ.NQGlbaNjaLrXwtdZ7C3tGYZREAP8zKW', 'Teknik Informatika', '0', 2, 1),
(190, 'ERLINA ANGGRIYANI R. J. M', '1220008', 'default.jpg', '$2y$10$SOl20hxXGBtioeSzKIPY8eboKYO58SjBSgZ2btX2QIJsG9bzDbgGG', 'Teknik Informatika', '0', 2, 1),
(191, 'MINCE PATA', '1220009', 'default.jpg', '$2y$10$nGDoAiNOgX2auBw/anEuRe8Gal58fDKMhVc3yfb.Mnr5W.tU.BX.q', 'Teknik Informatika', '0', 2, 1),
(192, 'YOHANIS BILI', '3214003', 'default.jpg', '$2y$10$fuobX1T8eD.8kOU.foBmt.0K2nuAhKti470vTuCb0tm8WwYhuwAEK', 'Sistem Informasi', '0', 2, 1),
(193, 'HIZKIA MULAIT', '3216007', 'default.jpg', '$2y$10$hk2.g0BysfuWJILsodoAdONhSPWhH3jOzDJGO477m8h12uw74rv7u', 'Sistem Informasi', '0', 2, 1),
(194, 'ANGELIUS NGASI', '3216025', 'default.jpg', '$2y$10$/cVihJWYT1Y8uSdwKsAWleV7N/nMj.c/UdaXcmwBC9a2A7gSV5o.S', 'Sistem Informasi', '0', 2, 1),
(195, 'KORNELIS NUMA CEME', '3216026', 'default.jpg', '$2y$10$5WUDKcI0M3GWc7t3oS68ReAVH0ClkNd736SG/6aBWi9DL8ax4m2f6', 'Sistem Informasi', '0', 2, 1),
(196, 'LODOVIKUS REBA', '3217003', 'default.jpg', '$2y$10$KZlFe/crlUlHpl3HBVtEk.hiYw.qes5kFDdfGwiqz.wBYZAOz6YQ.', 'Sistem Informasi', '0', 2, 1),
(197, 'TIMOTEUS PANGKUR', '3217005', 'default.jpg', '$2y$10$EGArJsrzhdbJwrolGfVVgOlhVNU4Z2li.3VqHV2y9JMVFhfZQXgx.', 'Sistem Informasi', '0', 2, 1),
(198, 'OKTAVINA NIWA LAPIR', '3217006', 'default.jpg', '$2y$10$mb4RdpPo1QMrgyXbFVkMaOFBZj5Uu68tyUnWGerDwX9CNGEIlDh3G', 'Sistem Informasi', '0', 2, 1),
(199, 'YUMIATI WUNDA', '3217008', 'default.jpg', '$2y$10$Yuy4MKLbriPc52MNoqPQTORSp207MPBDoz4lfQlHt1HcbtUm/faVC', 'Sistem Informasi', '0', 2, 1),
(200, 'YUNITA LADA', '3217009', 'default.jpg', '$2y$10$4cTZ2er4Wy2R.g7o2m3Okutwn34EokQdbop1nwmAFcxNwuFllljCe', 'Sistem Informasi', '0', 2, 1),
(201, 'MARIA NELSI GODAT', '3217017', 'default.jpg', '$2y$10$odgHiJ0BgdHSI7awGjamKuqRPiDdtuxoPE1nLAw69a/myug40Fn7C', 'Sistem Informasi', '0', 2, 1),
(202, 'ANASTASIA JENIATI LENDE', '3218001', 'default.jpg', '$2y$10$OhIVmJe2yUUvaU1UJLvdQO.fwiRIPpCAkBnESQEQUqEZQ8DGNukZu', 'Sistem Informasi', '0', 2, 1),
(203, 'INCE DAMA MIJUK', '3218006', 'default.jpg', '$2y$10$hJUPebRha7P20h0cHDmL6elFHE5ifCEWMCRGAn4cf4wkOtlwnGojG', 'Sistem Informasi', '0', 2, 1),
(204, 'MARIA LEDE PAHA', '3218011', 'default.jpg', '$2y$10$Ykp1KnLrKuNTydB.Pfb5OO9d2i2HnBsTNGr2KK4JVXm1LYfyHzL26', 'Sistem Informasi', '0', 2, 1),
(205, 'MERI KAHI KATUDA MEHA', '3218012', 'default.jpg', '$2y$10$4nWDKte1IpMDnXcPSorFUecZbkWZWUWKJF9gKl.Txrv2JDDgh0VLC', 'Sistem Informasi', '0', 2, 1),
(206, 'MARIA FATIMA WEA', '3218014', 'default.jpg', '$2y$10$lERx5z5C/rQX6ouGG/bZOuhNn37CCCK5rMdNTYarIOF6DCDWjcm12', 'Sistem Informasi', '0', 2, 1),
(207, 'GIDION JAKA MERE', '3218017', 'default.jpg', '$2y$10$M3SfCJTDk3QwWcwQPl6trez3i9bK6Gp8uZ0MX4gzMUZQ3Bw/RLYPu', 'Sistem Informasi', '0', 2, 1),
(208, 'KORNELIS PANDI', '3218021', 'default.jpg', '$2y$10$5qMfYhKg5zHbs6AKzXyZZOcj0qykj.Q1frV3qQH5RYjJ6bRHQLS6W', 'Sistem Informasi', '0', 2, 1),
(209, 'DINA MARIANA LENDE', '3218022', 'default.jpg', '$2y$10$8PFPVBHy4q2hZ5.qbfAqgO6euuZYfa9dMh2VNsABCUd.KfTZOBg96', 'Sistem Informasi', '0', 2, 1),
(210, 'KRISTINA DADA MERE', '3219001', 'default.jpg', '$2y$10$Drxo5qXRznSthohpg6Zf..BAT8ALbjUtSH1L969vQ92cWe2sFUVVK', 'Sistem Informasi', '0', 2, 1),
(211, 'AGNES LULAILA GADI', '3219002', 'default.jpg', '$2y$10$RuHOovCGFej/piCKJgTH5OKYrJRh3/rqCumM6G54aVcEYlNTMDiv.', 'Sistem Informasi', '0', 2, 1),
(212, 'RACHMAD DWIKI P', '3219003', 'default.jpg', '$2y$10$OKutyd5bgY4qCe8WUf234O1EGe45fq9xJwHqaw1Sp1zhQ3mY7dHvm', 'Sistem Informasi', '0', 2, 1),
(213, 'GERARDUS DEKE DETA', '3219004', 'default.jpg', '$2y$10$8TJSA9eCPKeAin1dpEDU6uhZnjFMWRe5LJHf478W5R4aWPew8sP9C', 'Sistem Informasi', '0', 2, 1),
(214, 'PELIPUS WINYO BULU', '3219005', 'default.jpg', '$2y$10$AwQd04lfqWmLryerincWy.CJhvVbpEhIJGQjle2ME9cL80XmJW3BS', 'Sistem Informasi', '0', 2, 1),
(215, 'KRISTINA KALLI GHOBA', '3219006', 'default.jpg', '$2y$10$7iUmOsZyJkuj6/t7NpbMWu7Bp7CyInofUGLwQ22EHrPfhGYvBLU5C', 'Sistem Informasi', '0', 2, 1),
(216, 'SARIYANTI WOLLA MAWO', '3219008', 'default.jpg', '$2y$10$7lBnEtWb9TFrJuf4qu75W.scs.juT.XXZdtt6Xv4P4MEWLjyc663.', 'Sistem Informasi', '0', 2, 1),
(217, 'YAKOB DANIEL TANGKO', '3219009', 'default.jpg', '$2y$10$.XOZIroayq/1gYDfFvsZtOkukmHO6D.9/.Hex//90FZoxYSllA2jW', 'Sistem Informasi', '0', 2, 1),
(218, 'URBANUS UMBU ROBAKA', '3219013', 'default.jpg', '$2y$10$hH1eeDeh4LU4gNn.WZeR0.C3bvby7NwSOGA5Y0p3X3OiBHnZly9ou', 'Sistem Informasi', '0', 2, 1),
(219, 'ALIUS JONI KAHA', '3219017', 'default.jpg', '$2y$10$85x8GqJ3dlpbFrAbBWQffejMCAVDYJ.UIw1rjgFtpQ3IGW/XsZ0c.', 'Sistem Informasi', '0', 2, 1),
(220, 'DOMINGGUS BILI N', '3219019', 'default.jpg', '$2y$10$hkrmYCYiTR/Tpcq0xuHxaufydRc3pxQWGpSQYFAspRItQ0haQV8kG', 'Sistem Informasi', '0', 2, 1),
(221, 'DORCE BULU', '3219020', 'default.jpg', '$2y$10$dKO8Vlp1Zkwu7uRcL9g2DehqhsR9MUJLmoiSlPSJZQ9gKDCfNE3ri', 'Sistem Informasi', '0', 2, 1),
(222, 'ANASTASIA POTE', '3219022', 'default.jpg', '$2y$10$s5Z9TIgkZkqiTUqEmbgYB.t1KLDh.qaxaJbTTGo7DvKudPGx92gey', 'Sistem Informasi', '0', 2, 1),
(223, 'YASINTA BILI', '3219023', 'default.jpg', '$2y$10$.v70P.0x0iPKu1Bb2GGfiej.Va3vmNrH5qV1/0.Cx7NmpMSW4Oca.', 'Sistem Informasi', '0', 2, 1),
(224, 'ADRIANA HALATO', '3219024', 'default.jpg', '$2y$10$Wzk8b9U25/8Hb0FSwfl/q.1.4vQEWx.rPdXKa7.E40FZjHIyJChde', 'Sistem Informasi', '0', 2, 1),
(225, 'FRANSISKUS SAVERINUS L', '3219025', 'default.jpg', '$2y$10$TpC2M6.DWRKtwdSlqtfR3OKn3OPId1j5qP19aS4JJfdedFFxPlPRm', 'Sistem Informasi', '0', 2, 1),
(226, 'DAMIANUS LENDE', '3219026', 'default.jpg', '$2y$10$CGxItn1VoDXAa3lITPi1yeu9ovvWwQO5L3aL5l79/TGSipawhTz2.', 'Sistem Informasi', '0', 2, 1),
(227, 'NINGSI KONGA NAHA', '3219027', 'default.jpg', '$2y$10$rTV13RusP4dCKuKF2h69q.hQmh54LADgEZ5l7JUyHtxFmyZeuGL8S', 'Sistem Informasi', '0', 2, 1),
(228, 'RANSENI DONA ATE', '3219028', 'default.jpg', '$2y$10$FiQXuXNs.VTwT8AOWYfo0.EDSUmiaoZae3sT8KmkwJlocttgLLpki', 'Sistem Informasi', '0', 2, 1),
(229, 'KANISIUS KIA LADOPURAB', '3219029', 'default.jpg', '$2y$10$GXaEA3amoFhQgEa3nGl03OPYYGGC63KfB4TJYPsG7aCAaT74dXzlO', 'Sistem Informasi', '0', 2, 1),
(230, 'RAFAEL EUSABIUS DHAE', '3219031', 'default.jpg', '$2y$10$uOoPYMlUWEybEF1ujwtEROO.1bI2rjAIp0imHRnpaGd2Q7oorokd6', 'Sistem Informasi', '0', 2, 1),
(231, 'YOVENTA MIKU ATE', '3219032', 'default.jpg', '$2y$10$1AG68r97iKA2Gyq0mMBvaOOBp8QuBrye.D.U/NAHtT70P8kor/8cG', 'Sistem Informasi', '0', 2, 1),
(232, 'YESHI THALITA PRILIETUKA', '3219033', 'default.jpg', '$2y$10$lAgQpP09yOmP3qrEH/Yctur0cAur/ZtTKaX2/twmTwbkc2VXyOuZe', 'Sistem Informasi', '0', 2, 1),
(233, 'CORNELIS LEDI', '3220001', 'default.jpg', '$2y$10$oK7IPzr/x3JmzgB1ckRfO.7T0YzRkzA3UwhV0LFgr/fIy8sjU9PjC', 'Sistem Informasi', '0', 2, 1),
(234, 'LUKAS NDARA TILU', '3220002', 'default.jpg', '$2y$10$TUxDV67tbN/TaWFkVWUcTutgqLrN/i0zNu.no0CJJWEKmCsMlCvjO', 'Sistem Informasi', '0', 2, 1),
(235, 'ANTONETA NATALIA DAPA', '3220003', 'default.jpg', '$2y$10$Z6Vx7E1XWHHx7oxoXLzp8eRCTOCuYsZknDtBSYAzMbXm6w7.AfsBe', 'Sistem Informasi', '0', 2, 1),
(236, 'YETA KOSSAY', '3220004', 'default.jpg', '$2y$10$3l71wi7I/nhLHBVpye6J5.57tMENSd0N3TIgv4ut7C9F0AFlZ.UVW', 'Sistem Informasi', '0', 2, 1),
(237, 'IDA BAGUS PUTRA', '3220005', 'default.jpg', '$2y$10$XgUCHeYdaQlhxGr1SzRF5Ohl9kFArtWVGAVD7JYrECmHdAeKBoqLW', 'Sistem Informasi', '0', 2, 1),
(238, 'ERMIYANI RAMBU MEJA', '3220006', 'default.jpg', '$2y$10$Ya56b1aS0vYwr/o8uf.icuhnx2L4kUsWMdWTEOdvMt.chjL9uASqy', 'Sistem Informasi', '0', 2, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_req_tagihan`
--
ALTER TABLE `tb_req_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
