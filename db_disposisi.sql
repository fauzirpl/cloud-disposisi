-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2021 at 10:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_disposisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `surat_masuk_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `user_id`, `surat_masuk_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 4, NULL, '2020-10-24 10:29:55', '2020-10-24 10:29:55', NULL),
(7, 4, 4, 1, '2020-10-24 10:29:55', '2020-10-28 03:25:28', NULL),
(8, 4, 5, 1, '2020-10-28 02:58:01', '2020-10-28 03:25:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Kepala Dinas'),
(2, 'Kepala Bidang Pertanian'),
(3, 'Kepala Bidang Keuangan Rakyat'),
(4, 'Kepala Bidang Peralatan');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_surat`
--

CREATE TABLE `klasifikasi_surat` (
  `id` int(4) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_surat`
--

INSERT INTO `klasifikasi_surat` (`id`, `kode`, `nama`) VALUES
(4, '001.2', 'Bendera Kebangsaan'),
(8, '001.32', 'Kabupaten/Kota'),
(9, '002', 'Tanda Kehormatan/Penghargaan untuk pegawai '),
(11, '002.2', 'Satyalencana'),
(13, '002.4', 'Monumen'),
(14, '002.5', 'Penghargaan Secara Adat'),
(15, '002.6', 'Penghargaan lainnya'),
(16, '003', 'Hari Raya/Besar Keagamaan'),
(17, '003.1', 'Nasional 17 Agustus, Hari Pahlawan, dan sebagainya'),
(18, '003.2', 'Hari Raya Keagamaan'),
(19, '003.3', 'Hari Ulang Tahun'),
(20, '003.4', 'Hari-hari Besar Internasional'),
(21, '004', 'Ucapan'),
(22, '004.1', 'Ucapan Terima Kasih'),
(23, '004.2', 'Ucapan Selamat'),
(24, '004.3', 'Ucapan Belasungkawa'),
(25, '004.4', 'Ucapan Lainnya'),
(26, '005', 'Undangan'),
(27, '006', 'Tanda Jabatan'),
(28, '006.1', 'Pamong Praja'),
(29, '006.2', 'Tanda Pengenal'),
(30, '006.3', 'Pejabat lainnya'),
(31, '007', '-'),
(32, '008', '-'),
(33, '009', '-'),
(34, '010', 'URUSAN DALAM '),
(35, '011', 'Kantor Dinas'),
(36, '012', 'Rumah Dinas'),
(37, '012.1', 'Tanah Untuk Rumah Dinas'),
(38, '012.2', 'Perabot Rumah Dinas'),
(39, '012.3', 'Rumah Dinas Golongan 1'),
(40, '012.4', 'Rumah Dinas Golongan 2'),
(41, '012.5', 'Rumah Dinas Golongan 3'),
(42, '012.6', 'Rumah/Bangunan Lainnya'),
(43, '012.7', 'Rumah Pejabat Negara'),
(44, '013', 'Mess/Guest House'),
(45, '014', 'Rumah Susun/Apartemen'),
(46, '015', 'Penerangan Listrik/Jasa Listrik'),
(47, '016', 'Telepon/Faximile/Internet'),
(48, '017', 'Keamanan/Ketertiban Kantor'),
(49, '018', 'Kebersihan Kantor'),
(50, '019', 'Protokol'),
(51, '019.1', 'Upacara Bendera'),
(52, '019.2', 'Tata Tempat'),
(53, '019.21', 'Pemasangan Gambar Presiden/Wakil Presiden'),
(54, '019.3', 'Audiensi / Menghadap Pimpinan'),
(55, '019.4', 'Alamat-Alamat Kantor Pejabat'),
(56, '019.5', 'Bandir/Umbul-Umbul/Spanduk'),
(57, '020', 'PERALATAN'),
(58, '020.1', 'Penawaran'),
(59, '021', 'Alat Tulis'),
(60, '022', 'Mesin Kantor'),
(61, '023', 'Perabot Kantor'),
(62, '024', 'Alat Angkutan'),
(63, '025', 'Pakaian Dinas'),
(64, '026', 'Senjata'),
(65, '027', 'Pengadaan'),
(66, '028', 'Inventaris'),
(67, '029', '-'),
(68, '030', 'KEKAYAAN DAERAH'),
(69, '031', 'Sumber Daya Alam'),
(70, '032', 'Asset Daerah'),
(71, '033', '-'),
(72, '034', '-'),
(73, '035', '-'),
(74, '036', '-'),
(75, '040', 'PERPUSTAKAAN DOKUMENTASI / KEARSIPAN / SANDI'),
(76, '041', 'Perpustakaan'),
(77, '041.1', 'Umum'),
(78, '041.2', 'Khusus'),
(79, '041.3', 'Perguruan Tinggi'),
(80, '041.4', 'Sekolah'),
(81, '041.5', 'Keliling'),
(82, '042', 'Dokumentasi'),
(83, '043', '-'),
(84, '044', '-'),
(85, '045', 'Kearsipan'),
(86, '045.1', 'Pola Klasifikasi'),
(87, '045.2', 'Penataan Berkas'),
(88, '045.3', 'Penyusutan Arsip'),
(89, '045.31', 'Jadwal Retensi Arsip'),
(90, '045.32', 'Pemindahan Arsip'),
(91, '045.33', 'Penilaian Arsip'),
(92, '045.34', 'Pemusnahan Arsip'),
(93, '045.35', 'Penyerahan Arsip'),
(94, '045.36', 'Berita Acara Penyusutan Arsip'),
(95, '045.37', 'Daftar Pencarian Arsip'),
(96, '045.4', 'Pembinaan Kearsipan'),
(97, '045.41', 'Bimbingan Teknis'),
(98, '045.5', 'Pemeliharaan /Perawatan Arsip'),
(99, '045.6', 'Pengawetan/Fumigasi'),
(100, '046', 'Sandi'),
(101, '047', 'Website'),
(102, '048', 'Pengelolaan Data'),
(103, '049', 'Jaringan Komunikasi Data'),
(104, '050', 'PERENCANAAN'),
(105, '050.1', 'Repelita/8 Sukses'),
(106, '050.11', 'Pelita Daerah'),
(107, '050.12', 'Bantuan Pembangunan Daerah'),
(108, '050.13', 'Bappeda'),
(109, '051', 'Proyek Bidang Pemerintahan, '),
(110, '052', 'Bidang Politik'),
(111, '053', 'Bidang Keamanan Dan Ketertiban'),
(112, '054', 'Bidang Kesejahteraan Rakyat '),
(113, '055', 'Bidang Perekonomian '),
(114, '056', 'Bidang Pekerjaan Umum '),
(115, '057', 'Bidang Pengawasan'),
(116, '058', 'Bidang Kepegawaian'),
(117, '059', 'Bidang Keuangan'),
(118, '060', 'ORGANISASI / KETATALAKSANAAN'),
(119, '060.1', 'Program Kerja'),
(120, '061', 'Organisasi Instansi Pemerintah (struktur organisasi)'),
(121, '061.1', 'Susunan dan Tata Kerja'),
(122, '061.2', 'Tata Tertib Kantor, Jam Kerja di Bulan Puasa'),
(123, '062', 'Organisasi Badan Non Pemerintah'),
(124, '063', 'Organisasi Badan Internasional'),
(125, '064', 'Organisasi Semi Pemerintah, BKS-AKSI'),
(126, '065', 'Ketatalaksanaan / Tata Naskah / Sistem'),
(127, '066', 'Stempel Dinas'),
(128, '067', 'Pelayanan Umum / Pelayanan Publik / Analisis'),
(129, '068', 'Komputerisasi / Siskomdagri'),
(130, '069', 'Standar Pelayanan Minimal'),
(131, '070', 'PENELITIAN'),
(132, '071', 'Riset'),
(133, '072', 'Survey'),
(134, '073', 'Kajian'),
(135, '074', 'Kerjasama Penelitian Dengan Perguruan Tinggi'),
(136, '075', 'Kementerian Lainnya'),
(137, '076', 'Non Kementerian'),
(138, '077', 'Provinsi'),
(139, '078', 'Kabupaten/Kota'),
(140, '079', 'Kecamatan /Desa'),
(141, '080', 'KONFERENSI / RAPAT / SEMINAR'),
(142, '081', 'Gubernur'),
(143, '082', 'Bupati / Walikota'),
(144, '083', 'Komponen, Eselon Lainnya'),
(145, '084', 'Instansi Lainnya'),
(146, '085', 'Internasional Di Dalam Negeri'),
(147, '086', 'Internasional Di Luar Negeri'),
(148, '087', '-'),
(149, '088', '-'),
(150, '089', '-'),
(151, '090', 'PERJALANAN DINAS'),
(152, '091', 'Perjalanan Presiden/Wakil Presiden Ke Daerah'),
(153, '092', 'Perjalanan Menteri Ke Daerah'),
(154, '093', 'Perjalanan Pejabat Tinggi (Pejabat Eselon 1)'),
(155, '094', 'Perjalanan Pegawai Termasuk Pemanggilan Pegawai'),
(156, '095', 'Perjalanan Tamu Asing Ke Daerah'),
(157, '096', 'Perjalanan Presiden/Wakil Presiden Ke Luar Negeri'),
(158, '097', 'Perjalanan Menteri Ke Luar Negeri'),
(159, '098', 'Perjalanan Pejabat Tinggi Ke Luar Negeri'),
(160, '099', 'Perjalanan Pegawai ke Luar Negeri'),
(161, '100', 'PEMERINTAHAN'),
(162, '101', 'negeri'),
(163, '102', 'GDN'),
(164, '103', '-'),
(165, '104', '-'),
(166, '105', '-'),
(167, '110', 'PEMERINTAHAN PUSAT'),
(168, '111', 'Presiden'),
(169, '111.1', 'Pertanggung jawaban presiden kpd MPR'),
(170, '111.2', 'Amanat Presiden/Amanat Kenegaraan/Pidato'),
(171, '112', 'Wakil Presiden'),
(172, '112.1', 'Pertanggung jawaban wakil presiden kepada MPR'),
(173, '112.2', 'Amanat Wakil Presiden/Amanat Kenegaraan/Pidato'),
(174, '113', 'Susunan Kabinet'),
(175, '113.1', 'Reshuffle'),
(176, '113.2', 'Penunjukan Menteri ad interim'),
(177, '113.3', 'Sidang Kabinet'),
(178, '114', 'Kementerian Dalam Negeri'),
(179, '114.1', 'Amanat Menteri Dalam Negeri/Sambutan'),
(180, '115', 'Kementerian lainnya'),
(181, '116', 'Lembaga Tinggi Negara'),
(182, '117', 'Lembaga Non Kementerian'),
(183, '118', 'Otonomi/Desentralisasi/Dekonsentrasi'),
(184, '119', 'Kerjasama Antar Kementerian'),
(185, '120', 'PEMERINTAH PROVINSI'),
(186, '120.04', 'Laporan daerah'),
(187, '120.42', 'Monografi tambahkan kode wilayah'),
(188, '120.1', 'Koordinasi'),
(189, '120.2', 'Instansi Tingkat Provinsi'),
(190, '120.21', 'Dinas Otonomi'),
(191, '120.22', 'Instansi Vertikal'),
(192, '120.23', 'Kerjasama antar Provinsi/Daerah'),
(193, '121', 'Gubernur tambahkan kode wilayah, '),
(194, '122', 'Wakil Gubernur tambahkan kode wilayah, '),
(195, '123', 'Sekretaris Wilayah tambahkan kode wilayah, '),
(196, '124', 'Pembentukan/Pemekaran Wilayah'),
(197, '124.1', 'Pembinaan/Perubahan Nama kepada: Daerah, Kota,Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas laut, dan sebagainya'),
(198, '124.2', 'Pemekaran  Wilayah'),
(199, '124.3', 'Forum Koordinasi lainnya'),
(200, '125', 'Pembentukan Pemekaran Wilayah'),
(201, '125.1', 'Pembinaan/Perubahan Nama Kepada: Daerah, Kota, Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas Laut, dan sebagainya.'),
(202, '125.2', 'Pembentukan Wialayah'),
(203, '125.3', 'Pemindahan Ibukota'),
(204, '125.4', 'Perubahan batas Wilayah'),
(205, '125.5', 'Pemekaran Wialayah'),
(206, '126', 'Pembagian Wilayah'),
(207, '127', 'Penyerahan Urusan'),
(208, '128', 'Swaparaja/Penataan Wilayah/Daerah'),
(209, '129', '-'),
(210, '130', 'PEMERINTAH KABUPATEN / KOTA'),
(211, '131', 'Pemberhentian, Serah Terima Jabatan, dsb'),
(212, '132', 'Pemberhentian, Serah Terima Jabatan, Sekretaris Daerah Kabupaten/Kota, Tambahkan Kode Wilayah, '),
(213, '133', 'Pelantikan, Pemberhentian, Serah Terima Jabatan,.'),
(214, '134', 'Forum Koordinasi Pemerintah Di Daerah'),
(215, '134.1', 'Muspida'),
(216, '134.2', 'Forum PAN (Panitian Anggaran Nasional)'),
(217, '134.3', 'Forum Koordinasi Lainnya'),
(218, '134.4', 'Kerjasama antar Kabupaten/Kota'),
(219, '135', 'Pembentukan / Pemekaran Wilayah'),
(220, '135.1', 'Pemindahan Ibukota'),
(221, '135.2', 'Pembentukan Wilayah Pembantu Bupati/Walikota'),
(222, '135.3', 'Pemabagian Wilayah Kabupaten/Kota'),
(223, '135.4', 'Perubahan Batas Wilayah'),
(224, '135.5', 'Pemekaran Wilayah'),
(225, '135.6', 'Permasalahan Batas Wilayah'),
(226, '135.7', 'Pembentukan Ibukota Kabupaten/Kota Pemberian dan Penggantian Nama Kabupaten/Kota, Daerah,'),
(227, '135.8', 'Jalan'),
(228, '136', 'Pembagian Wilayah'),
(229, '137', 'Penyerahan Urusan'),
(230, '138', 'Pemerintah Wilayah Kecamatan'),
(231, '138.1', 'Sambutan / Pengarahan / Amanat'),
(232, '138.2', 'Pembentukan Kecamatan'),
(233, '138.3', 'Pemekaran Kecamatan'),
(234, '138.4', 'Perluasan/Perubahan Batas Wilayah Kecamatan'),
(235, '138.5', 'Pembentukan Perwakilan Kecamatan/Kemantren'),
(236, '138.6', '-'),
(237, '138.7', '-'),
(238, '139', '-'),
(239, '140', 'PEMERINTAHAN DESA / KELURAHAN'),
(240, '141', 'Pengangkatan, Pemberhenian, dan sebagainya'),
(241, '142', 'Penghasilan Pamong Desa'),
(242, '143', 'Kekayaan Desa'),
(243, '144', 'Dewan Tingkat Desa, Dewan Marga, Rembug Desa'),
(244, '145', 'Administrasi Desa'),
(245, '146', 'Kewilayahan'),
(246, '146.1', 'Pembentukan Desa/Kelurahan'),
(247, '146.2', 'Pemekaran Desa/Kelurahan'),
(248, '146.3', 'Perubahan Batas Wilayah / Perluasan Desa / Kelurahan'),
(249, '146.4', 'Perubahan Nama Desa / Kelurahan'),
(250, '146.5', 'Kerjasama Antar Desa / Kelurahan'),
(251, '147', 'Lembaga-lembaga Tingkat Desa'),
(252, '148', 'Perangkat Kelurahan'),
(253, '148.1', 'Kepala Kelurahan'),
(254, '148.2', 'Sekretaris Kelurahan'),
(255, '148.3', 'Staf Kelurahan'),
(256, '149.1', 'Dewan Kelurahan'),
(257, '149.2', 'Rukun Tetangga'),
(258, '149.3', 'Rukun Warga'),
(259, '149.4', 'Rukun Kampung'),
(260, '150', 'LEGISLATIF MPR / DPR / DPD'),
(261, '151', 'Keanggotaan MPR'),
(262, '151.1', 'Pencalonan'),
(263, '151.2', 'Pemberhentian'),
(264, '151.3', 'Recall'),
(265, '151.4', 'Pelanggaran'),
(266, '152', 'Persidangan'),
(267, '153', 'Kesejahteraan'),
(268, '153.1', 'Keuangan'),
(269, '153.2', 'Penghargaan'),
(270, '154', 'Hak'),
(271, '155', 'Keanggotaan DPR '),
(272, '156', 'Reses'),
(273, '157', 'Kesejahteraan'),
(274, '157.1', 'Keuangan'),
(275, '157.2', 'Penghargaan'),
(276, '158', 'Jawaban Pemerintah'),
(277, '159', 'Hak'),
(278, '160', 'DPRD PROVINSI TAMBAHKAN KODE WILAYAH'),
(279, '161', 'Keanggotaan'),
(280, '161.1', 'Pencalonan'),
(281, '161.2', 'Pengangkatan'),
(282, '161.3', 'Pemberhentian'),
(283, '161.4', 'Recall'),
(284, '161.5', 'Meninggal'),
(285, '161.6', 'Pelanggaran'),
(286, '162', 'Persidangan'),
(287, '162.1', 'Reses'),
(288, '163', 'Kesejahteraan'),
(289, '163.1', 'Keuangan'),
(290, '163.2', 'Penghargaan'),
(291, '164', 'Hak'),
(292, '165', 'Sekretaris DPRD Provinsi'),
(293, '166', '-'),
(294, '167', '-'),
(295, '168', '-'),
(296, '169', '-'),
(297, '170', 'DPRD KABUPATEN TAMBAHKAN KODE WILAYAH'),
(298, '171', 'Keanggotaan'),
(299, '171.1', 'Pencalonan'),
(300, '171.2', 'Pengangkatan'),
(301, '171.3', 'Pemberhentian'),
(302, '171.4', 'Recall'),
(303, '171.5', 'Pelanggaran'),
(304, '172', 'Persidangan'),
(305, '173', 'Kesejahteraan'),
(306, '173.1', 'Keuangan'),
(307, '173.2', 'Penghargaan'),
(308, '174', 'Hak'),
(309, '175', 'Sekretaris DPRD Kabupaten/Kota'),
(310, '176', '-'),
(311, '177', '-'),
(312, '178', '-'),
(313, '180', 'HUKUM'),
(314, '180.1', 'Kontitusi'),
(315, '180.11', 'Dasar Hukum'),
(316, '180.12', 'Undang-Undang Dasar'),
(317, '180.2', 'GBHN'),
(318, '180.3', 'Amnesti, Abolisi dan Grasi'),
(319, '181', 'Perdata'),
(320, '181.1', 'Tanah'),
(321, '181.2', 'Rumah'),
(322, '181.3', 'Utang/Piutang'),
(323, '181.31', 'Gadai'),
(324, '181.32', 'Hipotik'),
(325, '181.4', 'Notariat'),
(326, '182', 'Pidana'),
(327, '182.1', 'Penyidik Pegawai Negeri Sipil (PPNS)'),
(328, '183', 'Peradilan'),
(329, '183.1', 'Bantuan Hukum'),
(330, '184', 'Hukum Internasional'),
(331, '185', 'Imigrasi'),
(332, '185.1', 'Visa'),
(333, '185.2', 'Pasport'),
(334, '185.3', 'Exit'),
(335, '185.4', 'Reentry'),
(336, '185.5', 'Lintas Batas/Batas Antar Negara'),
(337, '186', 'Kepenjaraan'),
(338, '187', 'Kejaksaan'),
(339, '188', 'Peraturan Perundang-Undangan'),
(340, '188.1', 'TAP MPR'),
(341, '188.2', 'Undang-Undang Dasar'),
(342, '188.3', 'Peraturan'),
(343, '188.31', 'Peraturan Pemerintah'),
(344, '188.32', 'Peraturan Menteri'),
(345, '188.33', 'Peraturan Lembaga Non Departemen'),
(346, '188.34', 'Peraturan Daerah'),
(347, '188.341', 'Peraturan Provinsi'),
(348, '188.342', 'Peraturan Kabupaten/Kota'),
(349, '188.4', 'Keputusan'),
(350, '188.41', 'Presiden'),
(351, '188.42', 'Menteri'),
(352, '188.43', 'Lembaga Non Departemen'),
(353, '188.44', 'Gubernur'),
(354, '188.45', 'Bupati/Walikota'),
(355, '188.5', 'Instruksi'),
(356, '188.51', 'Presiden'),
(357, '188.52', 'Menteri'),
(358, '188.53', 'Lembaga Non Departemen'),
(359, '188.54', 'Gubernur'),
(360, '188.55', 'Bupati/Walikota'),
(361, '189', 'Hukum Adat'),
(362, '189.1', 'Tokoh Adat/Masyarakat'),
(363, '190', 'HUBUNGAN LUAR NEGERI'),
(364, '191', 'Perwakilan Asing'),
(365, '192', 'Tamu Negara'),
(366, '193', 'Kerjasama Dengan Negara Asing'),
(367, '193.1', 'Asean'),
(368, '193.2', 'Bantuan Luar Negeri/Hibah'),
(369, '194', 'Perwakilan RI Di Luar Negeri/Hibah'),
(370, '195', 'PBB'),
(371, '196', 'Laporan Luar Negeri'),
(372, '197', 'Hutang Luar Negeri PHLN/LOAN'),
(373, '198', '-'),
(374, '199', '-'),
(375, '200', 'POLITIK'),
(376, '201', 'Kebijaksanaan umum'),
(377, '202', 'Orde baru'),
(378, '203', 'Reformasi'),
(379, '204', '-'),
(380, '205', '-'),
(381, '206', '-'),
(382, '210', 'KEPARTAIAN'),
(383, '211', 'Lambang partai'),
(384, '212', 'Kartu tanda anggota'),
(385, '213', 'Bantuan keuangan parpol'),
(386, '214', '-'),
(387, '215', '-'),
(388, '216', '-'),
(389, '220', 'ORGANISASI KEMASYARAKATAN'),
(390, '221', 'Berdasarkan perjuangan'),
(391, '221.1', 'Perintis kemerdekaan'),
(392, '221.2', 'angkatan 45'),
(393, '221.3', 'Veteran'),
(394, '222', 'Berdasarkan Kekaryaan'),
(395, '222.1', 'PEPABRI'),
(396, '222.2', 'Wredatama'),
(397, '223', 'Berdasarkan kerohanian'),
(398, '224', 'Lembaga adat'),
(399, '225', 'Lembaga Swadaya Masyarakat'),
(400, '226', '-'),
(401, '230', 'ORGANISASI PROFESI DAN FUNGSIONAL'),
(402, '231', 'Ikatan Dokter Indonesia'),
(403, '232', 'Persatuan Guru Republik Indonesia'),
(404, '233', 'PERSATUAN SARJANA HUKUM INDONESIA'),
(405, '234', 'Persatuan Advokat Indonesia'),
(406, '235', 'Lembaga Bantuan Hukum Indonesia'),
(407, '236', 'Korps Pegawai Republik Indonesia'),
(408, '237', 'Persatuan Wartawan Indonesia'),
(409, '238', 'Ikatan Cendikiawan Muslim Indonesia'),
(410, '239', 'Organisasi Profesi Dan Fungsional Lainnya'),
(411, '240', 'ORGANISASI PEMUDA'),
(412, '241', 'Komite Nasional Pemuda Indonesia'),
(413, '242', 'Organisasi Mahasiswa'),
(414, '243', 'Organisasi Pelajar'),
(415, '244', 'Gerakan Pemuda Ansor'),
(416, '245', 'Gerakan Pemuda Islam Indonesia'),
(417, '246', 'Gerakan Pemuda Marhaenis'),
(418, '247', '-'),
(419, '248', '-'),
(420, '250', 'ORGANISASI BURUH, TANI, NELAYAN DAN ANGKUTAN'),
(421, '251', 'Federasi Buruh Seluruh Indonesia'),
(422, '252', 'Organisasi Buruh Internasional'),
(423, '253', 'Himpunan Kerukunan Tani'),
(424, '254', 'Himpunan Nelayan Seluruh Indonesia'),
(425, '255', 'Keluarga Sopir Proporsional Indonesia'),
(426, '256', '-'),
(427, '257', '-'),
(428, '258', '-'),
(429, '260', 'ORGANISASI WANITA'),
(430, '261', 'Dharma Wanita'),
(431, '262', 'Persatuan Wanita Indonesia'),
(432, '263', 'Pemberdayaan Perempuan (wanita)'),
(433, '264', 'Kongres Wanita'),
(434, '265', '-'),
(435, '266', '-'),
(436, '267', '-'),
(437, '268', '-'),
(438, '269', '-'),
(439, '270', 'PEMILIHAN UMUM'),
(440, '271', 'Pencalonan'),
(441, '272', 'Nomor Urut Partai / Tanda Gambar'),
(442, '273', 'Kampanye'),
(443, '274', 'Petugas Pemilu'),
(444, '275', 'Pemilih / Daftar Pemilih'),
(445, '276', 'Sarana'),
(446, '276.1', 'TPS'),
(447, '276.2', 'Kendaraan'),
(448, '276.3', 'Surat Suara'),
(449, '276.4', 'Kotak Suara'),
(450, '276.5', 'Dana'),
(451, '277', 'Pemungutan Suara / Perhitungan Suara'),
(452, '278', 'Penetapan Hasil Pemilu'),
(453, '279', 'Penetapan Perolehan Jumlah Kursi Dan Calon Terpilih'),
(454, '280', 'Pengucapan Sumpah Janji MPR,DPR,DPD'),
(455, '281', ''),
(456, '282', '-'),
(457, '283', '-'),
(458, '284', '-'),
(459, '300', 'KEAMANAN / KETERTIBAN'),
(460, '301', 'Keamanan'),
(461, '302', 'Ketertiban'),
(462, '303', '-'),
(463, '310', 'PERTAHANAN'),
(464, '311', 'Darat'),
(465, '312', 'Laut'),
(466, '313', 'Udara'),
(467, '314', 'Perbatasan'),
(468, '315', '-'),
(469, '316', '-'),
(470, '317', '-'),
(471, '320', 'KEMILITERAN'),
(472, '321', 'Latihan Militer'),
(473, '322', 'Wajib Militer'),
(474, '323', 'Operasi Militer'),
(475, '324', 'Kekaryaan TNI Pejabat Sipil dari TNI'),
(476, '324.1', 'TMD'),
(477, '325', '-'),
(478, '326', '-'),
(479, '327', '-'),
(480, '328', '-'),
(481, '330', 'KEAMANAN'),
(482, '331', 'Kepolisian'),
(483, '331.1', 'Polisi Pamong Praja'),
(484, '331.2', 'Kamra'),
(485, '331.3', 'Kamling'),
(486, '331.4', 'Jaga Wana'),
(487, '332', 'Huru-Hara / Demonstrasi'),
(488, '333', 'Senjata Api Tajam'),
(489, '334', 'Bahan Peledak'),
(490, '335', 'Perjudian'),
(491, '336', 'Surat-Surat Kaleng'),
(492, '337', 'Pengaduan'),
(493, '338', 'Himbauan / Larangan'),
(494, '339', 'Teroris'),
(495, '340', 'PERTAHANAN SIPIL'),
(496, '341', 'Perlindungan Sipil'),
(497, '342', '-'),
(498, '343', '-'),
(499, '344', '-'),
(500, '350', 'KEJAHATAN'),
(501, '351', 'Makar / Pemberontak'),
(502, '352', 'Pembunuhan'),
(503, '353', 'Penganiayaan, Pencurian'),
(504, '354', 'Subversi / Penyelundupan / Narkotika'),
(505, '355', 'Pemalsuan'),
(506, '356', 'Korupsi / Penyelewengan / Penyalahgunaan Jabatan / KKN'),
(507, '357', 'Pemerkosaan / Perbuatan Cabul'),
(508, '358', 'Kenakalan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `kode_surat` varchar(10) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi_singkat` varchar(200) DEFAULT NULL,
  `berkas_scan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_surat`, `kode_surat`, `tanggal_surat`, `created_at`, `updated_at`, `deleted_at`, `tujuan`, `isi_singkat`, `berkas_scan`) VALUES
(2, '934/ASD/1231', '004.2', '2020-10-14', '2020-10-23 08:16:29', '2020-10-23 08:16:29', NULL, 'Dinas Cloud Code ID', 'Singkat aja deh yah', '1603466189_24TechnoLabs Proposal.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `nomor_surat` varchar(35) DEFAULT NULL,
  `kode_surat` varchar(10) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `isi_singkat` varchar(200) DEFAULT NULL,
  `sifat` varchar(20) NOT NULL,
  `disposisi_ke` varchar(255) NOT NULL DEFAULT '[]',
  `isi_disposisi` varchar(200) DEFAULT NULL,
  `berkas_scan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `tanggal_penerimaan`, `nomor_surat`, `kode_surat`, `tanggal_surat`, `pengirim`, `isi_singkat`, `sifat`, `disposisi_ke`, `isi_disposisi`, `berkas_scan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2020-10-23', '021021102020', '020.1', '2020-10-21', 'CLOUD CODE ID', 'Penawaran website dinas', 'Rahasia', '[\"1\",\"4\"]', 'Tolong dilihat, jika menarik sikat ajja', '1603471719_24TechnoLabs Proposal(1).pdf', '2020-10-23 09:48:39', '2020-10-23 09:53:09', '2020-10-23 09:53:09'),
(2, '2020-10-26', '201/STIES\'EXT/X/2020', '001.2', '2020-10-22', 'STIE SYARIAH BKS', 'UNDANGAN SOSIALISASI UU CIPTAKER', 'BIASA', '[\"1\"]', 'AGAR DIPAHAMI DAN DIHADIRI SESUAI TANGGAL YG TERTERA', '1603554386_24TechnoLabs Proposal(1).pdf', '2020-10-24 08:46:26', '2020-10-24 08:47:36', '2020-10-24 08:47:36'),
(3, '2020-10-26', '201/STIES\'EXT/X/2020', '001.2', '2020-10-22', 'STIE SYARIAH BKS', 'UNDANGAN SOSIALISASI UU CIPTAKER', 'BIASA', '[\"4\"]', 'AGAR DIPAHAMI DAN DIHADIRI SESUAI TANGGAL YG TERTERA', '1603554435_24TechnoLabs Proposal(1).pdf', '2020-10-24 08:47:15', '2020-10-24 09:49:11', '2020-10-24 09:49:11'),
(4, '2020-10-24', '201/CCID/X/2020', '001.2', '2020-10-22', 'CLOUD CODE ID', 'Penawaran sisten ERP', 'Rahasia', '[\"1\",\"4\"]', 'SEGERA DI PERIKSA PROPOSALNYA, DAN SAMPAIKAN HASIL ANALISA KE SEKRETARIS SAYA', '1603560595_24TechnoLabs Proposal.pdf', '2020-10-24 10:29:55', '2020-10-28 02:58:29', NULL),
(5, '2020-10-28', '203/BENGKALIS/III/2020', '003.3', '2020-10-27', 'Politeknik Negeri Bengkalis', 'Undangan acara dies natalis Polbeng', 'Segera', '[\"4\"]', 'Tolong hadiri mewakilkan saya', '1603879081_1594620786_3-1-3-1-10-20181210 (1).pdf', '2020-10-28 02:58:01', '2020-10-28 02:58:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `track_disposisi`
--

CREATE TABLE `track_disposisi` (
  `id` int(11) NOT NULL,
  `disposisi_id` int(11) NOT NULL,
  `hasil_disposisi` varchar(255) DEFAULT NULL,
  `seen` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_disposisi`
--

INSERT INTO `track_disposisi` (`id`, `disposisi_id`, `hasil_disposisi`, `seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 6, 'Belum ditanggapi', NULL, '2020-10-24 10:29:55', '2020-10-28 10:29:32', NULL),
(7, 7, 'Belum ditanggapi', NULL, '2020-10-24 10:29:55', '2020-10-28 10:29:36', NULL),
(8, 8, 'Siap bang jago', NULL, '2020-10-28 03:25:13', '2020-10-28 03:25:13', NULL),
(9, 7, 'Nanti saya cek yah pak', NULL, '2020-10-28 03:25:28', '2020-10-28 03:25:28', NULL),
(10, 8, 'Sudah saya hadiri pak e', NULL, '2020-10-28 08:17:14', '2020-10-28 08:17:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pegawai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pegawai',
  `jabatan_id` tinyint(4) NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `jabatan_id`, `nip`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sisayu', 'admin', 1, '35250511059700123', 'admin@dinas.com', NULL, '$2y$10$orSthdsFLeldo5QITbHLbufUUIrFoTghcV5P4asE3xau3MjcQ1yHW', 'eXJUHKge3DZCD2sculouQNIWk40q7OCGZcvwz1dIqlItLwLUdObn9P01TQC4', '2020-10-16 11:15:15', '2020-10-28 09:09:01'),
(4, 'Wiliam Jansen', 'pegawai', 3, '213838122313123', 'wiliam@gmail.com', NULL, '$2y$10$kqK3NT2rFQH2LOYHzGSF/.6c9suvvWjh9NW0YaSL/dmC.xRYEDUX2', 'o6OnJQMs5gLmxqluvlcLTBuiEa9kYdCUgCBtQRgqtYSvb2IuzATkEwLqIa45', '2020-10-20 08:08:12', '2020-10-28 09:08:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_disposisi`
--
ALTER TABLE `track_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2335;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `track_disposisi`
--
ALTER TABLE `track_disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
