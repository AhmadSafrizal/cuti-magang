-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2022 at 12:33 PM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1631712_db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `no_cuti` varchar(30) NOT NULL,
  `npp` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `cuti_awal` date NOT NULL DEFAULT current_timestamp(),
  `cuti_akhir` date NOT NULL DEFAULT current_timestamp(),
  `job_skrg` varchar(200) NOT NULL,
  `job_depan` varchar(200) NOT NULL,
  `proyek` varchar(100) NOT NULL,
  `pengganti` varchar(50) NOT NULL,
  `kasi` varchar(20) NOT NULL,
  `mp` varchar(30) NOT NULL,
  `dmp` varchar(20) NOT NULL,
  `hrd` varchar(30) NOT NULL,
  `stt_cuti` varchar(50) NOT NULL,
  `ket_reject` text NOT NULL,
  `hrd_app` int(2) NOT NULL,
  `lead_app` int(2) NOT NULL,
  `spv_app` int(2) NOT NULL,
  `mng_app` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`no_cuti`, `npp`, `tgl_pengajuan`, `tgl_awal`, `tgl_akhir`, `durasi`, `cuti_awal`, `cuti_akhir`, `job_skrg`, `job_depan`, `proyek`, `pengganti`, `kasi`, `mp`, `dmp`, `hrd`, `stt_cuti`, `ket_reject`, `hrd_app`, `lead_app`, `spv_app`, `mng_app`) VALUES
('26112022095119', '20002', '2022-11-26', '2022-12-26', '2023-01-02', 8, '2022-11-01', '2022-11-08', '<ol>\r\n<li>Submit dokumen transmital</li>\r\n<li>Membuat lembar distribusi</li>\r\n<li>nnnnnn</li>\r\n</ol>', '<ol>\r\n<li>Monitoring Transmital</li>\r\n<li>Monitoring Lembar distribusi</li>\r\n<li>Monitoring Surat</li>\r\n</ol>', 'setangga & serongga', '10002', '20001', '', '30001', '54321', 'Approved', '', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `npp` varchar(20) NOT NULL,
  `nama_emp` varchar(100) NOT NULL,
  `jk_emp` varchar(20) NOT NULL,
  `status_nikah` varchar(30) NOT NULL,
  `telp_emp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_emp` text NOT NULL,
  `ttd` varchar(100) NOT NULL,
  `active` varchar(20) NOT NULL,
  `proyek1` varchar(30) DEFAULT NULL,
  `proyek2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`npp`, `nama_emp`, `jk_emp`, `status_nikah`, `telp_emp`, `email`, `divisi`, `jabatan`, `alamat`, `hak_akses`, `password`, `foto_emp`, `ttd`, `active`, `proyek1`, `proyek2`) VALUES
('10001', 'Bapak Engineering', 'Laki-Laki', 'Kawin', '0896429639812', 'jhon9021o9012@gmail.com', 'engineering', 'staff', 'Kudus', 'pegawai', 'd89f3a35931c386956c1a402a8e09941', 'foto39185310001q.jpg', 'ttd637283100015.png', 'Aktif', 'setangga & serongga', 'bankirai onground'),
('10002', 'Latif', 'Laki-Laki', 'Kawin', '1234566778', 'jj852108@gmail.com', 'engineering', 'staff', 'Semarang', 'pegawai', '9103c8c82514f39d8360c7430c4ee557', 'foto824742wrk-01q.jpg', 'ttd583727100021.png', 'Aktif', 'setangga & serongga', 'bankirai onground'),
('11111', 'Kasi Engineering', 'Laki-Laki', 'Kawin', '012381238', 'ooi721362@gmail.com', 'engineering', 'kasi', 'Bogor', 'kasi', 'b0baee9d279d34fa1dfd71aadb908c3f', 'foto36946611111q.jpg', 'ttd16319911111d.jpg', 'Aktif', 'setangga & serongga', 'migor'),
('12345', 'Ulin A', 'Laki-Laki', 'Belum Kawin', '0896429639812', 'aea118494@gmail.com', 'komersial', 'Staff', 'Semarang Barat', 'mp', '827ccb0eea8a706c4c34a16891f84e7b', 'foto47920212345p.jpg', '', 'Aktif', 'bankirai onground', 'jetty 1'),
('20001', 'Joko', '', '', '', '', 'komersial', 'kasi', '', 'kasi', '2383c7d07bce3c82e6da7741782de416', '', 'ttd53306520001).png', 'Aktif', 'setangga & serongga', ''),
('20002', 'Jono', '', '', '', '', 'adkon', 'staff', '', 'pegawai', '66df243d406353d0e9db6c5dd027d2d6', 'foto76623520002s.jpg', 'ttd86595420002d.png', 'Aktif', 'kuranji', 'setangga & serongga'),
('20003', 'Jojon', '', '', '', '', 'adkon', 'staff', '', 'pegawai', 'e463f97ca6bc46b1ba706474e108c7e1', '', '', 'Aktif', 'kuranji', 'migor'),
('20004', 'Gus', 'Laki-Laki', 'Belum-Kawin', '0896429639810', 'wikarekonbatulicin@gmail.com', 'komersial', 'kasi', 'Jakarta', 'kasi', 'e98cb037f376fa53b314c166766ef55e', 'foto93486620004n.png', '', 'Aktif', 'kuranji', ''),
('20005', 'Ira', '', '', '', '', 'engineering', 'kasi', '', 'kasi', '8381872fa17f9dcb5fdb58802461c46e', '', '', 'Aktif', 'kuranji', ''),
('22222', 'Bapak DMP', 'Laki-Laki', 'Kawin', '08129181998', 'io0392992@gmail.com', '', 'dmp', 'Jakarta', 'dmp', '3d2172418ce305c7d16d4b05597c6a59', 'foto71245122222a.jpg', 'ttd192375222225.png', 'Aktif', 'setangga & serongga', ''),
('30001', 'Adi', '', '', '', '', '', 'dmp', '', 'dmp', '451fbb024d0794ffcda2258170740a1e', '', 'ttd30750330001).png', 'Aktif', 'kuranji', ''),
('30002', 'Ria', '', '', '', '', '', 'mp', '', 'mp', '705e2dd2077bc06fbc5e2c754e75e500', '', '', 'Aktif', 'kuranji', ''),
('30003', 'Metta', '', '', '', '', 'komersial', 'staff', '', 'pegawai', '09510d526df60f47c2797dee42254939', '', '', 'Aktif', 'kuranji', ''),
('30004', 'Wah', '', '', '', '', 'adkon', 'staff', '', 'pegawai', 'ac17d8a48126ac3ddd82489b35c0cd32', '', '', 'Aktif', 'guest house kuranji', 'kuranji'),
('33333', 'Bapak Manajer', 'Laki-Laki', 'Kawin', '081287189898', 'lelelel6678@gmail.com', '', 'mp', 'Jogja', 'mp', 'b7bc2a2f5bb6d521e64c8974c143e9a0', 'foto45153433333p.jpg', 'ttd37628933333d.jpg', 'Aktif', 'setangga & serongga', ''),
('54321', 'Bapak HRD 1', 'Laki-Laki', 'Kawin', '902830131', 'wikarekonbatulicin@gmail.com', '', 'HRD', 'Jombang', 'admin', '01cfcd4f6b8770febfb40cb906715822', '', 'ttd801757543211.png', 'Aktif', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`no_cuti`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`npp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
