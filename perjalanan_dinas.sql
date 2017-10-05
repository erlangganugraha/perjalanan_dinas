-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 05, 2017 at 06:43 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perjalanan_dinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `bidang` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`bidang`) VALUES
('Bidang Tata Kelola Pemerintahan Berbasis Elektronik'),
('Bidang Infrastruktur TIK'),
('Jabatan Fungsional'),
('Bidang Komunikasi dan Informasi Publik'),
('Bidang Aplikasi Informatika'),
('Sekretariat');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `golongan` varchar(10) NOT NULL,
  `pangkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`golongan`, `pangkat`) VALUES
('I/a', 'Juru Muda'),
('I/b', 'Juru Muda Tingkat I'),
('I/c', 'Juru'),
('I/d', 'Juru Tingkat I'),
('II/a', 'Pengatur Muda'),
('II/b', 'Pengatur Muda Tingkat I'),
('II/c', 'Pengatur'),
('II/d', 'Pengatur Tingkat I'),
('III/a', 'Penata Muda'),
('III/b', 'Penata Muda Tingkat I'),
('III/c', 'Penata'),
('III/d', 'Penata Tingkat I'),
('IV/a', 'Pembina'),
('IV/b', 'Pembina Tingkat I'),
('IV/c', 'Pembina Utama Muda'),
('IV/d', 'Pembina Utama Madya'),
('IV/e', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_perjalanan` varchar(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_perjalanan`, `judul`, `isi`, `tgl_input`) VALUES
(2, '18', 'testing', '<p>asasasas</p>\r\n', '2017-09-18'),
(3, '16', 'etourne le segment de string défini par start et length.', '<p>I have a code snippet written in PHP that pulls a block of text from a database and sends it out to a widget on a webpage. The original block of text can be a lengthy article or a short sentence or two; but for this widget I can&#39;t display more than, say, 200 characters. I could use substr() to chop off the text at 200 chars, but the result would be cutting off in the middle of words-- what I really want is to chop the text at the end of the last <em>word</em> before 200 chars.</p>\r\n', '2017-09-18'),
(4, '15', 'http://localhost:8080/perjalanan_dinas/laporan/add/15', '<p><img alt="" src="/perjalanan_dinas/images/images/A0P0d77CAAAQ2lS.jpg" style="height:469px; width:402px" /></p>\r\n\r\n<p>asasasas</p>\r\n', '2017-09-18'),
(5, '19', 'Test Hallo', '<p><img alt="" src="/perjalanan_dinas/images/images/A0P0d77CAAAQ2lS.jpg" style="height:469px; width:402px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tetsing aksjaks http://localhost:8080/perjalanan_dinas/assets/kcfinder/browse.php?opener=ckeditor&amp;type=images&amp;CKEditor=editor1&amp;CKEditorFuncNum=1&amp;langCode=en</p>\r\n', '2017-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` tinytext NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `tingkatan` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `password`, `nama`, `pangkat`, `golongan`, `jabatan`, `bidang`, `tingkatan`, `status`) VALUES
('1', '21232f297a57a5a743894a0e4a801fc3', 'System', '', '', 'System Administrator', '', 'Kepegawaian', 'Aktif'),
('19570828 198903 1 004', 'c84df94082e7cbdfec8fb18a4fd7d369', 'Dr. H. Anton Gustoni, M.Si', 'Pembina Utama Madya', 'IV/d', 'KEPALA DINAS KOMUNIKASI DAN  INFORMATIKA PROVINSI JAWA BARAT', 'Sekretariat', 'Kepala Dinas', 'Aktif'),
('19580815 198303 1 020', 'eafd94b29c3eabb392df1fbcf6ea8edf', 'H. Dede Sugandhi', 'Penata Muda Tingkat I', 'III/b', 'PENGURUS BARANG PEMBANTU ', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19581012 198503 1 008', '42bd7c145947d1a589139a20e0420eec', 'Dede Durahim', 'Penata Muda Tingkat I', 'III/b', 'PENGADMINISTRASI UMUM SEKSI KOMPILASI DATA PADA BIDANG PENGOLAHAN DATA ELEKTRONIK', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19581105 198603 1 011', 'e4cd680785499845ce1012fcf6504614', 'Drs. Hernadi Natawidjaja, MM', 'Pembina', 'IV/a', 'Pengadministrasi Penanganan Perkara', 'Sarana Komunikasi dan Diseminasi Informasi', 'Pegawai', 'Aktif'),
('19581202 198703 1 003', '9cbb5798a31466a46893d52f93012942', 'H. Rd. Jimmy Sudrajat Iskandar, SH', 'Penata Tingkat I', 'III/d', 'Pengadministrasi Penanganan Perkara', 'Sarana Komunikasi dan Diseminasi Informasi', 'Pegawai', 'Aktif'),
('19590329 198703 1 006', 'b946b22c2432fedfd5dd1825f0774877', 'Ir. Sri Lesmonodjati, MM', 'Pembina', 'IV/a', 'KEPALA SEKSI STANDARDISASI POS DAN TELEKOMUNIKASI ', 'Pos dan Telekomunikasi', 'Kepala Seksi', 'Aktif'),
('19590527 198012 1 001', '98a41f4d9d71b852392c8d6ffe85b43c', 'Drs. Sukir', 'Penata Tingkat I', 'III/d', 'KEPALA SEKSI KOMUNIKASI SOSIAL BIDANG SARANA KOM. DAN DISEMINASI INFORMASI', 'Sarana Komunikasi dan Diseminasi Informasi', 'Kepala Seksi', 'Aktif'),
('19590608 198203 1 002', 'ea274d02dcdd3297e32d666bdfaccdf0', 'H. Abdul Karim', 'Penata', 'III/c', 'PENGELOLA ADM KEPEGAWAIAN DAN UMUM', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19600310 198503 2 004', 'cb4418cac7d47aa9b2b3007ee3259703', 'Hj. Mimi Maryani', 'Penata Muda Tingkat I', 'III/b', 'BENDAHARA PENGELUARAN PEMBANTU', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19600613 199203 2 002', '5f9353400d0fdf9b5108bd6adb9a2f73', 'Dra. Yeni Sri Mulyati', 'Penata Tingkat I', 'III/d', 'KEPALA SEKSI INTEGRASI DATA ', 'Sarana Komunikasi dan Diseminasi Informasi', 'Kepala Seksi', 'Aktif'),
('19600715 198503 1 014', 'b93c10d7de37507c937c70956be3dc09', 'Mahmud', 'Penata Muda Tingkat I', 'III/b', 'PENGADMINISTRASI UMUM ', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19600715 199403 1 001', 'e7f8f2546ab19a741446bcf6cd612ab9', 'Dedi Jayadi Bin Marta, SE', 'Pengatur', 'II/c', 'PENGADMINISTRASI KOMUNIKASI SOSIAL SEKSI KOMUNIKASI SOSIAL ', 'Sarana Komunikasi dan Diseminasi Informasi', 'Pegawai', 'Aktif'),
('19610302 198503 1 011', 'e70542dc9ee58011237b7b3e2b194369', 'Drs. Kusnadi, MM', 'Pembina', 'IV/a', 'Kepala Seksi Penerapan Telematika', 'Telematika', 'Kepala Seksi', 'Aktif'),
('19610329 198703 1 006', '72b78feb0b83113bd83c9f558620c8c4', 'Drs. Kiagus Denny Sofian, M.Si.', 'Pembina Tingkat I', 'IV/b', 'KEPALA BIDANG APLIKASI INFORMATIKA', 'Bidang Aplikasi Informatika', 'Kepala Bidang', 'Aktif'),
('19610405 198301 2 004', 'e275adc427bbfba77643cf6c50d7f08c', 'Lies Nina Yulia', 'Penata Muda Tingkat I', 'III/b', 'PENATAUSAHA PIMPINAN ', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19610523 198203 1 005', '7f873991bfcebc7f855a0f180f57fd77', 'Iwan Gunawan, SE, M.Si.', 'Pembina', 'IV/a', 'KEPALA SEKSI KOMPILASI DATA ', 'Pengolahan Data Elektronik', 'Kepala Seksi', 'Aktif'),
('19620215 198909 1 002', '56993db0ca8c747c399bd035acc93267', 'Jamaludin', 'Pengatur', 'II/c', 'Pengelola Rapat', 'Sekretariat', 'Pegawai', 'Aktif'),
('19620418 199003 2 005', '12312ada36c2c81ed5f9981ce85da764', 'Ir. Hj. Latifah, MT', 'Pembina Tingkat I', 'IV/b', 'KEPALA BIDANG TELEMATIKA ', 'Telematika', 'Kepala Bidang', 'Aktif'),
('19620523 198603 1 005', 'ee891f41ff2823ac5d7769301538b038', 'Margo Raharjo', 'Penata Muda', 'III/a', 'PENGADMINISTRASI  PADA BIDANG SARANA KOMUNIKASI DAN DISEMINASI INFORMASI', 'Sarana Komunikasi dan Diseminasi Informasi', 'Pegawai', 'Aktif'),
('19621018 199303 1 006', 'f149dc36681ccd14951bdbe2ebc1d2af', 'A. Dedi Dharmawan,SH, MM', 'Pembina Tingkat I', 'IV/b', 'KEPALA BIDANG SARANA KOMUNIKASI DAN DISEMINASI INFORMASI  ', 'Sarana Komunikasi dan Diseminasi Informasi', 'Kepala Bidang', 'Aktif'),
('19630117 198603 1 007', 'cd26e88d3471af0833b115a29ea9be8c', 'Dede Sutarsa', 'Penata Muda', 'III/a', 'ADMINISTRATOR JARINGAN SIPKD SEKSI PENGEMBANGAN TELEMATIKA', 'Telematika', 'Pegawai', 'Aktif'),
('19630123 198403 2 007', '715bf78e673790114fc8a34ebc967128', 'Ike Hartika', 'Penata Muda Tingkat I', 'III/b', 'Penyimpan Barang OPD', 'Subbag Kepegawaian Dan Umum', 'Pegawai', 'Aktif'),
('19630203 199303 1 003', 'fe176cef0d16287bee4a37e18d1e468c', 'Ir. Iksan Kholiq', 'Penata Tingkat I', 'III/d', 'KEPALA SEKSI MONITORING DAN PENERTIBAN SPEKTRUM FREKUENSI  ', 'Pos dan Telekomunikasi', 'Kepala Seksi', 'Aktif'),
('19640403 199503 2 001', '72e1da6aea7c747d0d666decfa1b6949', 'Nurlela, ST., M.M', 'Pembina', 'IV/a', 'KEPALA SUBBAGIAN TATA USAHA PADA BALAI LAYANAN PENGADAAN SECARA ELEKTRONIK', 'Balai LPSE', 'Kepala Subbagian', 'Aktif'),
('19640605 200701 1 014', '0013f0a88c06c85f7e487b8703e8046d', 'Dede Hadiansah', 'Juru', 'I/c', 'KOORDINATOR PENGAWAS KEAMANAN ', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19640809 200901 1 001', '7e8a82f3a3b9dca4f161d66cf1581699', 'Edy Sugiatno', 'Pengatur Muda Tingkat I', 'II/b', 'Pengelola Administrasi Kepegawaian', 'Subbag Kepegawaian Dan Umum', 'Pegawai', 'Aktif'),
('19650125 198803 1 006', '4a7764323928b89d34eea3736991326d', 'Herry Pasya Sumbada,ATD', 'Pembina Tingkat I', 'IV/b', 'KEPADA BIDANG POS DAN TELEKOMUNIKASI', 'Pos dan Telekomunikasi', 'Kepala Bidang', 'Aktif'),
('19650317 200701 1 005', 'e42513b3b015eb76b8cac031a1442183', 'Mamat', 'Pengatur Muda Tingkat I', 'II/b', 'PENGURUS BARANG PEMBANTU ', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19650331 199103 2 003', 'aa35afe072e30b231476f538583aa855', 'Dra. Sri Endang Marwati, MM', 'Pembina Tingkat I', 'IV/b', 'SEKRETARIS DINAS KOMUNIKASI DAN INFORMATIKA PROVINSI JAWA BARAT', 'Sekretariat', 'Sekretaris', 'Aktif'),
('19660107 198801 1 003', 'ab66773975f982087bfb13cea33b0342', 'T. Sukmana', 'Pengatur', 'II/c', 'BPP/BENDAHARA GAJI', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19660123 200701 1 008', 'f94a21113f5f30d95db42dbd37dcd0a5', 'Dadang Hidayat, SE', 'Pengatur', 'II/c', 'VERIFIKATOR SEKSI LAYANAN INFORMASI BALAI LPSE', 'Pos dan Telekomunikasi', 'Pegawai', 'Aktif'),
('19660606 199303 1 012', '2f90a3f444083dbf55025db1d636e039', 'Drs. Yaya Sudia, MM', 'Pembina', 'IV/a', 'KEPALA SUBBAGIAN KEPEGAWAIAN DAN UMUM PADA SEKRETARIAT  ', 'Sekretariat', 'Kepala Subbagian', 'Aktif'),
('19661031 198703 1 005', '6daae498f108f2ad34ad12340d8ad219', 'Dedi Dartono, S.IP', 'Penata Tingkat I', 'III/d', 'PENGADMINISTRASI UMUM SEKSI STANDARDISASI POS DAN TELEKOMUNIKASI ', 'Pos dan Telekomunikasi', 'Pegawai', 'Aktif'),
('19670323 200701 1 006', '2c15e51df43bacc71ade8c35d2b0fcc5', 'Eko Radiantoro Suharto, A.Md', 'Pengatur', 'II/c', 'ADMINISTRATOR AGENCY SIPKD-SKPD SEKSI PENERAPAN TELEMATIKA', 'Telematika', 'Pegawai', 'Aktif'),
('19670406 199402 2 002', 'b9e373715eb47d413c208142eaada91d', 'Dra. Ika Mardiah, M.Si.', 'Pembina Tingkat I', 'IV/b', 'KEPALA BALAI LAYANAN PENGADAAN SECARA ELEKTRONIK   ', 'Balai LPSE', 'Kepala Bidang', 'Aktif'),
('19680331 200701 2 004', '73a86ba036f91f55f70b825bdc6629ed', 'Ani Harliani, SH., M.Si', 'Penata', 'III/c', 'Analis Jabatan', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19680419 199003 2 003', '1eb02c770be1a7fd4301dbba572e7f4d', 'Maemunah', 'Penata Muda Tingkat I', 'III/b', 'BENDAHARA PENGELUARAN PEMBANTU', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19690115 199803 1 005', '81dc9bdb52d04dc20036dbd8313ed055', 'Bambang Indra Rachmawan, A.Md', 'Penata Muda Tingkat I', 'III/b', 'ADMINISTRATOR JARINGAN SIPKD  SEKSI PENGEMBANGAN TELEMATIKA', 'Telematika', 'Pegawai', 'Aktif'),
('19690211 199803 2 002', '92a9dd8ba2502d0ed33369cda68898ee', 'Dra. Hj. Lovita Adriana Rosa, M.Si', 'Pembina', 'IV/a', 'KEPALA SEKSI KOMUNIKASI PEMERINTAH DAN PEMERINTAH DAERAH ', 'Sarana Komunikasi dan Diseminasi Informasi', 'Kepala Seksi', 'Aktif'),
('19690620 198803 2 003', '889bf7b0413187ace2f58d060e544ec2', 'Dra. Iis Rostiasih, M.Si.', 'Pembina', 'IV/a', 'KEPALA SUBBAG KEUANGAN PADA SEKRETARIAT   ', 'Sekretariat', 'Kepala Subbagian', 'Aktif'),
('19690703 200801 1 004', '6134acc6460fe85c5a25f9fbcce3fc28', 'Cony Trijulianto, ST', 'Penata', 'III/c', 'Pengelola Data', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19690908 199603 1 006', '3120bfa50d740f746cdd2ba56c5f3cf2', 'H. Asep Saepuloh, ST., MT', 'Pembina', 'IV/a', 'Kepala Seksi Standardisasi Postel', 'Pos dan Telekomunikasi', 'Kepala Seksi', 'Aktif'),
('19700523 199803 1 006', '7b6231b19cafe9605523cd66befc8122', 'Teguh Kristianto, S.Si., MT', 'Penata Tingkat I', 'III/d', 'KEPALA SEKSI STANDARDISASI DAN MONITORING EVALUASI TELEMATIKA  ', 'Telematika', 'Kepala Seksi', 'Aktif'),
('19700915 199603 2 001', '5bcc3d799bbcb0f8c5252fefb88e2f93', 'Tiomaida Seviana H,H, SH., M.A.P', 'Pembina', 'IV/a', 'KEPALA SUBBAGIAN PERENCANAAN DAN PROGRAM PADA SEKRETARIAT  ', 'Sekretariat', 'Kepala Subbagian', 'Aktif'),
('19701013 200801 2 006', '40e2be59e668b67f2473e005d49da312', 'Tanti Sulianti Koeryaman, S.S., MM', 'Penata', 'III/c', 'VERIFIKATOR SEKSI LAYANAN INFORMASI BALAI LPSE', 'Balai LPSE', 'Pegawai', 'Aktif'),
('19710503 200701 2 009', '821a65342244fdf26e428db74826162e', 'Ai Popon Hernawati', 'Pengatur', 'II/c', 'PELAKSANA PENATA DOKUMEN KEUANGAN OPD ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19710527 200701 1 008', 'a3ec7a676d56664389bc22c7355ca15c', 'Kusyadi', 'Pengatur', 'II/c', 'BENDAHARA PENGELUARAN PEMBANTU ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19710810 200801 1 003', 'e94ae8a16133545144f0c1e92ee4df76', 'Endang Kurniadi', 'Pengatur Muda Tingkat I', 'II/b', 'PENGELOLA SIMPEG ', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19710919 200701 2 004', '232a9e6e1fe3c12873382ec549f25b99', 'Imas Rosidah, SP', 'Pengatur', 'II/c', 'BENDAHARA PENGELUARAN PEMBANTU ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19711127 200701 2 005', '8b9f77d0f63e7c13a5efe56cde77eada', 'Hj. Astria Priantie, SE., M.M', 'Penata Muda Tingkat I', 'III/b', 'BENDAHARA PENGELUARAN SUBBAGIAN KEUANGAN ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19720528 200501 1 004', '4ead9867cef7c04e64273b715a0b342c', 'Purnomo Yustianto, S.T., M.T', 'Penata', 'III/c', 'Analisis Sistem Informasi dan Jaringan', 'Subbag Kepegawaian Dan Umum', 'Pegawai', 'Aktif'),
('19720626 199703 2 007', 'e33c171392e5a272b264f9c2dcd69e9a', 'Sri Wulan Nurnaningsih, S.E., M.M', 'Pembina', 'IV/a', 'Kepala Seksi Penyiaran dan Kemitraan Media', 'Sarana Komunikasi dan Diseminasi Informasi', 'Kepala Seksi', 'Aktif'),
('19721124 200701 1 004', 'a5b98b78b7b5e5c339e678c569afea00', 'Aji Permana, S.ST', 'Penata Muda Tingkat I', 'III/b', 'PENGADMINISTRASI UMUM SEKSI PENYIARAN DAN KEMITRAAN MEDIA ', 'Sarana Komunikasi dan Diseminasi Informasi', 'Pegawai', 'Aktif'),
('19730306 200801 1 004', '3252d9d555a247b9691fc7c6a21f5ad3', 'Dari Darohman', 'Pengatur Muda Tingkat I', 'II/b', 'HELPDESK SEKSI LAYANAN INFORMASI BALAI LPSE', 'Balai LPSE', 'Pegawai', 'Aktif'),
('19730512 199503 1 007', '4de54ac74cc03bf6c45ec635c0edfed4', 'Gustiman, S.Sos', 'Penata', 'III/c', 'PENGURUS BARANG PEMBANTU OPD', 'Subbag Kepegawaian Dan Umum', 'Kepegawaian', 'Aktif'),
('19730731 200901 1 001', '1ef3aea2199af77217d66eaa4628a7da', 'H. Bagus Firmansjah, SH', 'Penata Muda Tingkat I', 'III/b', 'Bendahara Pengeluaran Pembantu', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19730916 199803 2 002', '09fd7f8c1dafd9b1ce4d63618ac31793', 'Hermin Wijaya, ST, M.Kom', 'Penata Tingkat I', 'III/d', 'KEPALA SEKSI  LAYANAN INFORMASI BALAI LAYANAN PENGADAAN SECARA ELELKTRONIK ', 'Balai LPSE', 'Kepala Seksi', 'Aktif'),
('19741124 199903 1 005', '43f41d127a81c54d4c8f5f93daeb7118', 'Muh. Deni Hendriawan, S.Si', 'Penata', 'III/c', 'PRANATA KOMPUTER MUDA', 'Telematika', 'Pegawai', 'Aktif'),
('19741130 200701 1 006', 'f333fa7b638e1403db1e1d44b2719024', 'Nandang Suherman, A.Md', 'Pengatur', 'II/c', 'OPERATOR KOMPUTER SEKSI PENERAPAN TELEMATIKA ', 'Telematika', 'Pegawai', 'Aktif'),
('19741211 200604 1 007', 'aebdce3395fc99fc8c0de80168ef43b3', 'Andri Priatna Kusuma S, S.Kom., M.AP', 'Penata', 'III/c', 'Pengelola Data', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19750428 199002 2 001', '9508820436f5072465e42e4c7a1377f2', 'Kelly Damayanti, SE', 'Penata Muda Tingkat I', 'III/b', 'PULAHTA SEKSI KOMUNIKASI PEMERINTAH DAN PEMERINTAH DAERAH', 'Sarana Komunikasi dan Diseminasi Informasi', 'Pegawai', 'Aktif'),
('19750704 200501 1 006', '51b3607bd4ae1ac546eb19876ad3864a', 'Agustinus Andriyanto, ST.MT', 'Penata', 'III/c', 'HELPDESK SEKSI LAYANAN INFORMASI BALAI LPSE', 'Balai LPSE', 'Pegawai', 'Aktif'),
('19750721 199803 2 003', 'db9437b4c3b2c0326d31b777264569e7', 'Yuli Hapiah, S.Sos., M.AP', 'Penata', 'III/c', 'Pulahta Bid.Postel', 'Pos dan Telekomunikasi', 'Pegawai', 'Aktif'),
('19760726 200701 1 005', 'ade2b41b14866d140f14334a33821fac', 'Atoilah, S.ST', 'Penata Muda Tingkat I', 'III/b', 'Pengelola Administasi dan Dokumentasi', 'Sarana Komunikasi dan Diseminasi Informasi', 'Pegawai', 'Aktif'),
('19760818 200801 2 010', 'c390377eea20f51dff99db99bc3516a1', 'Rani Fardiani', 'Pengatur Muda Tingkat I', 'II/b', 'PELAKSANA VERIFIKATUR ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19760828 200901 1 003', '70e2522630d5a308fa061b4337817a9f', 'Yoga Bagus Sulistyo', 'Pengatur Muda Tingkat I', 'II/b', 'Pengadministrasi Umum Bid Postel', 'Pos dan Telekomunikasi', 'Kepegawaian', 'Aktif'),
('19760904 200901 1 001', 'f4ad342872909d39401043614b52472d', 'Jefri Paisha, A.Md', 'Pengatur Tingkat I', 'II/d', 'PELAKSANA VERIFIKATUR SUBBAGIAN KEUANGAN ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19761214 200501 1 004', '5c9ba43babc1cf3915692493cf3dbd7e', 'Asep Denny Surbakti ST., MT', 'Penata', 'III/c', 'KEPALA SEKSI PENGEMBANGAN TELEMATIKA ', 'Telematika', 'Kepala Seksi', 'Aktif'),
('19770309 200902 1 001', '94c4d311faa42c341639927019f17ff2', 'Irwan Hadi, ST', 'Penata Muda Tingkat I', 'III/b', 'PENGOLAH DATA SEKSI INTEGRASI DATA ', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19780719 200501 1 008', '3aa65c9f82eda0db6a64f465a55fa78d', 'Edri Wilastono, S.Sos', 'Penata', 'III/c', 'PENGOLAH DATA INFORMASI', 'Pos dan Telekomunikasi', 'Pegawai', 'Aktif'),
('19790311 201410 1 001', 'a7bb966df1667cdde6c86967ff1d4ef2', 'Suharyono Adhi Saswinto', 'Pengatur', 'II/c', 'PULAHTA PERANCANAAN PROGRAM', 'Subbag Perencanaan dan Program', 'Pegawai', 'Aktif'),
('19790727 200502 2 008', '177f4d4ecf0641b42e73530a3b710c8d', 'Yulianti Ramadhan, ST', 'Penata', 'III/c', 'PENGOLAH DATA DAN EVALUASI SEKSI PENYAJIAN DATA DAN INFORMASI', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19800323 200801 1 002', '05b1dfb264570a4f3b7d71c4ac3a000a', 'Dasum', 'Pengatur Muda Tingkat I', 'II/b', 'Operator Perencana SKPD', 'Subbag Perencanaan dan Program', 'Pegawai', 'Aktif'),
('19800512 201001 1 004', 'cde13be8ed32f5450587699cb3c570ba', 'Rachmad Hadinata, ST', 'Penata Muda Tingkat I', 'III/b', 'ADMINISTRATOR SISTEM SEKSI DUKUNGAN PENDAYAGUNAAN T.I.K. BALAI LPSE', 'Balai LPSE', 'Pegawai', 'Aktif'),
('19801001 201001 1 003', 'd703b9a3f4a94fe7c3179050d9b1198c', 'Ruslan Rukman Syah, A.Md', 'Pengatur Tingkat I', 'II/d', 'HELPDESK SEKSI LAYANAN INFORMASI PADA BALAI LPSE', 'Balai LPSE', 'Pegawai', 'Aktif'),
('19811015 200501 1 001', 'ebf20d5724c8408103f03ef6cd278377', 'Buddhi Sudrajat, ST', 'Penata', 'III/c', 'OPERATOR KOMPUTER SEKSI PENYAJIAN DATA DAN INFORMASI ', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19811126 201101 1 001', '88927f262ed6bc027c07a720435be5ea', 'Rahmat Hidayatulloh Tasdiq, ST', 'Penata Muda', 'III/a', 'Pengeloa Informasi', 'Sarana Komunikasi dan Diseminasi Informasi', 'Kepegawaian', 'Aktif'),
('19820203 200604 2 008', '81cd118ccbc8dcb2428e83275c8e5265', 'Fera Tri Hartanti, ST., M.T', 'Penata', 'III/c', 'KEPALA SEKSI DUKUNGAN DAN PENDAYAGUNAAN T.I.K. PADA BALAI LPSE', 'Balai LPSE', 'Kepala Seksi', 'Aktif'),
('19820318 201101 1 001', '6a24fc19dacb8cedb0dc5a5212b12f36', 'Mark Aditya, SE', 'Penata Muda', 'III/a', 'PELAKSANA PEMBUKUAN/AKUNTANSI ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19830813 201410 1 001', '52822e052f6d9421b5cf88efd6c5e8d2', 'Sunu Nugraha', 'Pengatur Muda', 'II/a', 'PENGADMINITRASIAN UMUM', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19831117 201101 1 002', 'acafa80658c9a5a47c0b6f6a19564ee4', 'Ivan Novemberia, S.Si', 'Penata Muda', 'III/a', 'OPERATOR PERENCANA SIPKD- OPD ', 'Subbag Perencanaan dan Program', 'Pegawai', 'Aktif'),
('19840510 201001 1 002', '63b844349c2058a93da1633ae3879cb5', 'Adi Setiadi Ramdhani, A.Md', 'Pengatur Tingkat I', 'II/d', 'Bendahara Pengeluaran Pembantu', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19841121 201101 1 001', '632c4f2f8a50e1b87c50c997b348eb0f', 'Nova Friady WP, ST', 'Penata Muda Tingkat I', 'III/b', 'Pengelola Teknologi Informasi', 'Pengolahan Data Elektronik', 'Pegawai', 'Aktif'),
('19860315 201001 1 002', '3a96c93bddec49e5e5c279bae6de2322', 'Asep Suryadi, ST', 'Penata Muda', 'III/a', 'ADMINISTRATOR JARINGAN SEKSI DUKUNGAN PENDAYAGUNAAN T.I.K. BALAI LPSE', 'Balai LPSE', 'Pegawai', 'Aktif'),
('19861027 201001 2 006', 'afc39f72bf9a3b7a54d860169bec77c8', 'Wenti Sahidahsari, SE', 'Penata Muda', 'III/a', 'OPERATOR PENATAUSAHAAN SIPKD-OPD ', 'Subbag Keuangan', 'Pegawai', 'Aktif'),
('19871024 201001 1 001', 'b4ad3ec9d4ace90a31cf78a67d9cd021', 'Billy Maulana Permadhi, ST', 'Penata Muda', 'III/a', 'Operator Atisisbada', 'Subbag Kepegawaian Dan Umum', 'Pegawai', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksana`
--

CREATE TABLE `pelaksana` (
  `id_pelaksana` int(11) NOT NULL,
  `id_perjalanan` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelaksana`
--

INSERT INTO `pelaksana` (`id_pelaksana`, `id_perjalanan`, `nip`, `tgl_berangkat`, `tgl_kembali`) VALUES
(19, 14, '19670323 200701 1 006', '2017-08-21', '2017-08-30'),
(22, 14, '19581012 198503 1 008', '2017-08-21', '2017-08-30'),
(23, 14, '19581105 198603 1 011', '2017-08-21', '2017-08-30'),
(24, 14, '19590608 198203 1 002', '2017-08-21', '2017-08-30'),
(25, 14, '19600310 198503 2 004', '2017-08-21', '2017-08-30'),
(27, 15, '19790311 201410 1 001', '2017-08-28', '2017-08-31'),
(28, 15, '19750428 199002 2 001', '2017-08-28', '2017-08-31'),
(29, 15, '19650331 199103 2 003', '2017-08-28', '2017-08-31'),
(30, 15, '19660123 200701 1 008', '2017-08-28', '2017-08-31'),
(31, 16, '19670323 200701 1 006', '2017-08-24', '2017-08-26'),
(32, 16, '19860315 201001 1 002', '2017-08-24', '2017-08-26'),
(33, 16, '19690115 199803 1 005', '2017-08-24', '2017-08-26'),
(35, 18, '19670323 200701 1 006', '2017-03-01', '2017-03-17'),
(36, 18, '19860315 201001 1 002', '2017-03-01', '2017-03-17'),
(37, 18, '19690115 199803 1 005', '2017-03-01', '2017-03-17'),
(38, 19, '19730731 200901 1 001', '2017-09-19', '2017-09-22'),
(39, 19, '19840510 201001 1 002', '2017-09-19', '2017-09-22'),
(40, 19, '19711127 200701 2 005', '2017-09-19', '2017-09-22'),
(41, 19, '19660107 198801 1 003', '2017-09-19', '2017-09-22'),
(42, 19, '19730306 200801 1 004', '2017-09-19', '2017-09-22'),
(43, 19, '19750704 200501 1 006', '2017-09-19', '2017-09-22'),
(44, 20, '19670323 200701 1 006', '2017-09-19', '2017-09-28'),
(45, 20, '19860315 201001 1 002', '2017-09-19', '2017-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan`
--

CREATE TABLE `perjalanan` (
  `id_perjalanan` int(11) NOT NULL,
  `no_surat` varchar(12) NOT NULL,
  `dasar` text NOT NULL,
  `untuk` text NOT NULL,
  `maksud_perjalanan` tinytext NOT NULL,
  `tingkat_biaya` varchar(30) NOT NULL,
  `kpa` varchar(100) NOT NULL,
  `tempat_berangkat` varchar(100) NOT NULL,
  `tempat_tujuan` varchar(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `akun` varchar(100) NOT NULL,
  `penugas` varchar(100) NOT NULL,
  `alat_angkut` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perjalanan`
--

INSERT INTO `perjalanan` (`id_perjalanan`, `no_surat`, `dasar`, `untuk`, `maksud_perjalanan`, `tingkat_biaya`, `kpa`, `tempat_berangkat`, `tempat_tujuan`, `tgl_berangkat`, `tgl_kembali`, `instansi`, `akun`, `penugas`, `alat_angkut`, `tgl_input`) VALUES
(14, '800', '<ol>\n	<li>Peraturan Gubernur Jawa Barat Nomor 102 Tahun 2016 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2017 (Berita Daerah Provinsi Jawa Barat Tahun 2016 Nomor 102 Seria A); dan (baku).</li>\n	<li>Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah (DPA SKPD) Tahun 2017 Nomor : 1.16.01.55.019.5.2 Kegiatan Pemutakhiran Konten Website Jabarprov.go.id</li>\n</ol>\n', '<ol>\r\n	<li>Melaksanakan Peliputan Khusus dan Hunting Potensi Wisata Gunung Tangkuban Perahu, untuk Pemutakhiran Media Jabarprov.go.id pada tanggal <em><strong>6 Juli 2017</strong></em> di Kabupaten Subang.</li>\r\n	<li>Pembiayaan dibebankan pada Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah Tahun 2017. 1.16.01 Dinas Komunikasi dan Informatika Provinsi Jawa Barat Sub Organisasi 1.16.01.04 Bidang Aplikasi Informatika (55.019) Kegiatan Pemutakhiran Konten Website Jabarprov.go.id.</li>\r\n	<li>Melaksanakan tugas ini dengan sebaik-baiknya dan penuh rasa tanggung jawab serta memberikan laporan kegiatan sesuai dengan ketentuan berlaku.</li>\r\n</ol>\r\n', 'Hunting', '10000', '19570828 198903 1 004', 'Bandung', 'Bogor', '2017-08-21', '2017-08-30', 'Diskominfo', '23', '19650331 199103 2 003', 'Angkot', '2017-08-15'),
(15, '100', '                  	<ol>\r\n						<li>Peraturan Gubernur Jawa Barat Nomor 102 Tahun 2016 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2017 (Berita Daerah Provinsi Jawa Barat Tahun 2016 Nomor 102 Seria A); dan (baku).</li>\r\n						<li>Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah (DPA SKPD) Tahun 2017 Nomor : 1.16.01.55.019.5.2 Kegiatan Pemutakhiran Konten Website Jabarprov.go.id</li>\r\n					</ol>\r\n                  ', '                  	<ol>\r\n						<li>Melaksanakan Peliputan Khusus dan Hunting Potensi Wisata Gunung Tangkuban Perahu, untuk Pemutakhiran Media Jabarprov.go.id pada tanggal <em><strong>6 Juli 2017</strong></em> di Kabupaten Subang.</li>\r\n						<li>Pembiayaan dibebankan pada Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah Tahun 2017. 1.16.01 Dinas Komunikasi dan Informatika Provinsi Jawa Barat Sub Organisasi 1.16.01.04 Bidang Aplikasi Informatika (55.019) Kegiatan Pemutakhiran Konten Website Jabarprov.go.id.</li>\r\n						<li>Melaksanakan tugas ini dengan sebaik-baiknya dan penuh rasa tanggung jawab serta memberikan laporan kegiatan sesuai dengan ketentuan berlaku.</li>\r\n					</ol>\r\n                  ', 'Jalan-jalan', '10000', '19650331 199103 2 003', 'Bandung', 'Sumedang', '2017-08-28', '2017-08-31', 'Diskominfo', '5.2', '19650331 199103 2 003', 'Angkot', '2017-08-21'),
(16, '100', '                  	<ol>\r\n						<li>Peraturan Gubernur Jawa Barat Nomor 102 Tahun 2016 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2017 (Berita Daerah Provinsi Jawa Barat Tahun 2016 Nomor 102 Seria A); dan (baku).</li>\r\n						<li>Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah (DPA SKPD) Tahun 2017 Nomor : 1.16.01.55.019.5.2 Kegiatan Pemutakhiran Konten Website Jabarprov.go.id</li>\r\n					</ol>\r\n                  ', '                  	<ol>\r\n						<li>Melaksanakan Peliputan Khusus dan Hunting Potensi Wisata Gunung Tangkuban Perahu, untuk Pemutakhiran Media Jabarprov.go.id pada tanggal <em><strong>6 Juli 2017</strong></em> di Kabupaten Subang.</li>\r\n						<li>Pembiayaan dibebankan pada Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah Tahun 2017. 1.16.01 Dinas Komunikasi dan Informatika Provinsi Jawa Barat Sub Organisasi 1.16.01.04 Bidang Aplikasi Informatika (55.019) Kegiatan Pemutakhiran Konten Website Jabarprov.go.id.</li>\r\n						<li>Melaksanakan tugas ini dengan sebaik-baiknya dan penuh rasa tanggung jawab serta memberikan laporan kegiatan sesuai dengan ketentuan berlaku.</li>\r\n					</ol>\r\n                  ', 'Konsultasi', 'Tingkat C', '19570828 198903 1 004', 'Bandung', 'Bogor', '2017-08-24', '2017-08-26', 'Diskominfo', '5.2', '19650331 199103 2 003', 'Angkot', '2017-08-23'),
(18, '170', '<ol>\r\n	<li>Perah Provinsi Jawa Barat Tahun 2016 Nomor 102 Seria A); dan (baku).</li>\r\n	<li>Dokumen</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Melaksanakaa tanggal <em><strong>6 Juli 2017</strong></em> di Kabupaten Subang.</li>\r\n	<li>Pembiayaan</li>\r\n</ol>\r\n', 'Pindah', '12000', '19650331 199103 2 003', 'Bagdad', 'Rusi', '2017-03-01', '2017-03-17', 'S', '12', '19621018 199303 1 006', 'Motor', '2017-09-18'),
(19, '', '<ol>\r\n	<li>Peraturan Gubernur Jawa Barat Nomor 102 Tahun 2016 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2017</li>\r\n	<li>KAkaka</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Melaksanakan Peliputan Khusus dan Hunting Potensi Wisata Gunung Tangkuban Perahu, untuk Pemutakhiran Media Jabarprov.go.id pada tanggal <em><strong>6 Juli 2017</strong></em> di Kabupaten Tasik</li>\r\n	<li>Test</li>\r\n	<li>Test1</li>\r\n</ol>\r\n', 'Observasi', 'Tingkat C', '19570828 198903 1 004', 'Bandung', 'Tasik', '2017-09-19', '2017-09-22', 'Diskominfo', '5.2', '19570828 198903 1 004', 'Motor', '2017-09-19'),
(20, '', '<ol>\r\n	<li>Peraturan Gubernur Jawa Barat Nomor 102 Tahun 2016 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2017 (Berita Daerah Provinsi Jawa Barat Tahun 2016 Nomor 102 Seria A); dan (baku).</li>\r\n	<li>Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah (DPA SKPD) Tahun 2017 Nomor : 1.16.01.55.019.5.2 Kegiatan Pemutakhiran Konten Website Jabarprov.go.id</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Melaksanakan Peliputan Khusus dan Hunting Potensi Wisata Gunung Tangkuban Perahu, untuk Pemutakhiran Media Jabarprov.go.id pada tanggal <em><strong>6 Juli 2017</strong></em> di Kabupaten Subang.</li>\r\n	<li>Pembiayaan dibebankan pada Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah Tahun 2017. 1.16.01 Dinas Komunikasi dan Informatika Provinsi Jawa Barat Sub Organisasi 1.16.01.04 Bidang Aplikasi Informatika (55.019) Kegiatan Pemutakhiran Konten Website Jabarprov.go.id.</li>\r\n	<li>Melaksanakan tugas ini dengan sebaik-baiknya dan penuh rasa tanggung jawab serta memberikan laporan kegiatan sesuai dengan ketentuan berlaku.</li>\r\n</ol>\r\n', 'aa', 'B', '19570828 198903 1 004', 'Bandung', 'Bogo', '2017-09-19', '2017-09-28', 'Diskominfo', '5.2', '19570828 198903 1 004', 'BB', '2017-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `tingkatan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`tingkatan`) VALUES
('Kepala Dinas'),
('Sekretaris'),
('Kepala Bidang'),
('Kepala Seksi'),
('Kepala Subbagian'),
('Jabatan Fungsional'),
('Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`golongan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pelaksana`
--
ALTER TABLE `pelaksana`
  ADD PRIMARY KEY (`id_pelaksana`);

--
-- Indexes for table `perjalanan`
--
ALTER TABLE `perjalanan`
  ADD PRIMARY KEY (`id_perjalanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelaksana`
--
ALTER TABLE `pelaksana`
  MODIFY `id_pelaksana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `perjalanan`
--
ALTER TABLE `perjalanan`
  MODIFY `id_perjalanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
