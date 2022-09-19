-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 06:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdam_bandarmasih`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT 0,
  `stok` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `merk`, `tipe`, `harga`, `stok`) VALUES
(7, 'laptop', 'acer', 'aspire ', 2000000, 15),
(9, 'Mesin absen', 'Nac-5000', 'g100', 10000000, 5),
(10, 'swicth hub', 'cisco', 'rb951', 500000, 24),
(11, 'komputer', 'dell', 'intel', 0, 20),
(12, 'printer', 'canon', 'ix6500', 0, 12),
(13, 'laptop', 'Hp', 'pavilion5000', 0, 2),
(14, 'wifi', 'd-link', 'dgh1', 200000, 4),
(15, 'printer', 'scaner ', 'hp laserjet', 0, 3),
(16, 'catridge', 'canon', '810', 0, 50),
(17, 'laptop', 'acer', 'Z4732', 4000000, 51),
(18, 'harddish', 'seagate', '500Gb', 0, 4),
(19, 'Memory', 'Kongston', 'DDR3 8Gb', 0, 95),
(20, 'Powersupply', 'Simbadda', 'SimX 450W', 0, 50),
(21, 'laptop', 'lenovo', 'g41', 0, 41);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama`) VALUES
(1, 'Keuangan'),
(2, 'SDM'),
(3, 'Pelayanan'),
(4, 'ULP'),
(5, 'Transmisi Distribusi'),
(6, 'Pelaksana'),
(7, 'Produksi 1'),
(8, 'Produksi 2'),
(9, 'Asset'),
(10, 'IT'),
(11, 'SEKRETARIS PERUSAHAAN'),
(12, 'KOMISI KEPATUHAN INTERNAL');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `departemen` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `alamat`, `jabatan`, `departemen`, `keterangan`, `username`, `password`) VALUES
(5, '2320100', 'Abdul Hamid', 'Jl.Alalak Berangas Rt.002', 'staf', 'IT Infrastruktur', 'Karyawan', 'hamid', 'hamid'),
(6, '8304824', 'Afif', 'Jl.Martapura lama Rt.10', 'staf', 'Pelaksana', 'Karyawan ', 'afif', 'afif'),
(7, '2479247', 'Ahkmad', 'Jl.Belitung Rt.15', 'staf', 'IT Infrastruktur', 'Karyawan ', 'akhmad', 'akhmad'),
(8, '1361683', 'M.Sugianoor ', 'Jl.Belitung ', 'teknisi', 'IT Infrastruktur', 'Karyawan ', 'sugi', 'sugi'),
(9, '2683813618', 'Ferry Hidayat', 'Jl.Sungai lulut', 'teknisi', 'IT ', 'Karyawan', 'ferry', 'ferry'),
(10, '2823682', 'badrud zaman', 'sultan adam', 'teknisi', 'IT', 'karyawan', 'badrud', 'badrud'),
(11, '232536', 'M.Yusuf', 'tatah bangkal', 'supervisor', 'Produksi 1', 'karyawan', 'yusuf', 'yusuf'),
(12, '6242969257', 'mujahit', 'banua anyar', 'staf', 'database aset', 'karyawan', 'mujahit', 'mujahit'),
(13, '293724927', 'amrullah', 'simpang jagung', 'teknisi', 'program aset', 'karyawan', 'amrullah', 'amrullah'),
(14, '28628462', 'rommy', 'dahlia', 'staf', 'trasmisi distribusi', 'karyawan', 'rommy', 'rommy'),
(15, '248264283619', 'zulbadi', 'a.yani ', 'staf', 'IT', 'karyawan', 'zulbadi', 'zulbadi'),
(16, '0303423', 'M. Khaidir', 'Jl. Perumnas', 'teknisi', 'IT Infrastruktur', 'karyawan', 'khaidir', 'khaidir');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nota` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_suplier` int(5) DEFAULT 0,
  `qty` int(5) DEFAULT 0,
  `total_harga` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `nota`, `tanggal`, `id_suplier`, `qty`, `total_harga`) VALUES
(24, '12341231234', '2020-01-02', 2, 2, 400000),
(25, '111222', '2020-01-02', 4, 2, 8000000),
(26, '01', '2020-01-03', 5, 25, 125000000),
(28, '01234', '2020-01-20', 5, 3, 10000000),
(29, '012', '2020-02-04', 2, 2, 20000000),
(30, '0012', '2020-02-24', 5, 2, 4000000),
(31, '0331', '2020-05-08', 6, 1, 500000),
(32, '0331', '2020-05-08', 6, 1, 500000),
(33, '1212', '2020-08-06', 5, 10, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(5) DEFAULT 0,
  `id_barang` int(5) DEFAULT 0,
  `qty` int(5) DEFAULT 0,
  `harga` double DEFAULT 0,
  `satuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `id_pembelian`, `id_barang`, `qty`, `harga`, `satuan`) VALUES
(33, 24, 14, 2, 200000, '1'),
(34, 25, 17, 2, 4000000, '1'),
(35, 26, 7, 25, 5000000, '1'),
(37, 28, 8, 2, 2500000, '2'),
(38, 28, 7, 1, 5000000, 'unit'),
(39, 29, 9, 2, 10000000, 'Unit'),
(40, 30, 10, 2, 2000000, 'unit'),
(41, 32, 10, 1, 500000, 'unit'),
(42, 32, 10, 1, 500000, 'unit'),
(43, 33, 7, 10, 2000000, 'unit');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT 0,
  `jumlah` int(11) DEFAULT 0,
  `tanggal_kembali` date DEFAULT NULL,
  `peminjam` int(11) DEFAULT 0,
  `ket` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `penyerah` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tanggal`, `id_barang`, `jumlah`, `tanggal_kembali`, `peminjam`, `ket`, `status`, `penyerah`) VALUES
(5, '2020-06-03', 19, 1, NULL, 12, '-', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `id_departemen` int(5) DEFAULT 0,
  `tanggal` date DEFAULT NULL,
  `id_karyawan` int(5) DEFAULT 0,
  `mengetahui` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id`, `lokasi`, `id_departemen`, `tanggal`, `id_karyawan`, `mengetahui`) VALUES
(11, 'kasir', 0, '2019-08-10', 9, 'febry'),
(15, 'keuangan', 2, '2020-01-01', 6, 'ketua'),
(24, 'sdm', 2, '2020-01-03', 9, 'bp'),
(27, 'uang', 1, '2020-01-01', 5, 'arul'),
(31, 'tes', 3, '2020-01-08', 13, 'tes'),
(32, 'KEUANGAN', 1, '2020-01-01', 8, 'BAPA'),
(33, 'SDM', 2, '2020-01-01', 5, 'BPSDM'),
(34, 'keuangan', 1, '2020-01-01', 5, 'ketua'),
(35, 'tes', 7, '2020-02-24', 5, 'bapa'),
(36, 'tes', 2, '2020-05-01', 6, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan_detail`
--

CREATE TABLE `perawatan_detail` (
  `id` int(11) NOT NULL,
  `id_perawatan` int(5) DEFAULT 0,
  `id_barang` int(5) DEFAULT 0,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan_detail`
--

INSERT INTO `perawatan_detail` (`id`, `id_perawatan`, `id_barang`, `keterangan`) VALUES
(11, 11, 13, 'sudah dirawat'),
(15, 15, 10, ''),
(24, 24, 10, ''),
(27, 27, 8, ''),
(31, 31, 8, ''),
(32, 32, 8, ''),
(33, 33, 8, ''),
(34, 34, 8, ''),
(35, 35, 11, ''),
(36, 36, 8, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id` int(11) NOT NULL,
  `aduan` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `analisa` text DEFAULT NULL,
  `tindakan` text DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `ruangan` varchar(100) DEFAULT NULL,
  `tanggal_proses` date DEFAULT NULL,
  `teknisi` int(11) DEFAULT 0,
  `id_barang` int(11) DEFAULT 0,
  `vol` int(11) DEFAULT 0,
  `status` varchar(200) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `ket_selesai` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id`, `aduan`, `tanggal`, `analisa`, `tindakan`, `departemen`, `ruangan`, `tanggal_proses`, `teknisi`, `id_barang`, `vol`, `status`, `tanggal_selesai`, `ket_selesai`) VALUES
(1, 'tidak bisa masuk windows', '2019-08-01', 'windows rusak', 'install ulang ', NULL, NULL, '2019-08-02', 9, 7, 1, 'Proses', NULL, NULL),
(2, 'ups mati', '2019-08-04', 'batrai drop', 'ganti batrai ups', NULL, NULL, '2019-08-02', 9, 8, 1, 'Selesai', '2019-08-07', 'sudah diperbaiki'),
(3, 'laptop mati total', '2019-08-06', 'hardware rusak', 'service laptop', NULL, NULL, '2019-08-15', 7, 13, 1, 'Selesai', '2019-08-16', 'tidak bisa diperbaiki'),
(4, 'finger tidak berfungsi', '2019-08-07', 'finger mesin absen aus', 'ganti mesin absen', NULL, NULL, '2019-08-08', 6, 9, 1, 'Selesai', '0000-00-00', ''),
(7, 'tidak konek jaringan', '2019-07-10', 'adaptor switch rusak', 'ganti adaptor switch', NULL, NULL, '2019-08-01', 5, 14, 1, 'Selesai', '0000-00-00', ''),
(8, 'upgrade windows', '2019-07-11', 'windwos terinveksi virus', 'install ulang os', NULL, NULL, '2019-08-01', 5, 7, 1, 'Proses', NULL, NULL),
(12, 'windows rusak', '2019-08-16', 'windows rusak', 'install ulang', NULL, NULL, '2019-08-28', 5, 21, 1, 'Selesai', '2020-01-01', 'selesai'),
(13, 'Komputer tidak tampil', '2020-01-01', 'Rusak', 'Ganti', NULL, NULL, '2020-01-02', 5, 7, 1, 'Selesai', '2020-01-03', 'selesai'),
(14, 'tidak nyala', '2020-01-02', 'rusak', 'ganti switch', NULL, NULL, '2020-01-03', 8, 10, 1, 'Proses', NULL, NULL),
(15, 'tidak bisa print', '2020-01-20', 'pita print habis', 'ganti pita', NULL, NULL, '2020-01-20', 5, 12, 1, 'Proses', NULL, NULL),
(25, 'rusak', '2020-01-16', NULL, NULL, '3', 'pelayanan', NULL, 0, 10, 1, 'Baru', NULL, NULL),
(26, 'hang', '2020-01-09', NULL, NULL, '6', 'pelaksana', NULL, 0, 13, 1, 'Baru', NULL, NULL),
(27, 'buruk', '2020-01-09', NULL, NULL, '4', 'ULP', NULL, 0, 9, 1, 'Baru', NULL, NULL),
(28, 'rusak', '2020-01-01', 'rusak', 'ganti', '2', 'sdmsdm', '2020-01-02', 5, 9, 1, 'Proses', NULL, NULL),
(29, 'laptop hang', '2020-02-24', 'laptop rusak', 'ganti laptop', '2', 'SDM', '2020-02-24', 5, 7, 1, 'Selesai', '2020-02-24', 'selesai'),
(31, 'sidik jari tidak terbaca', '2020-05-02', 'rusak', 'mengganti barang', '3', 'PELAYANAN', '2020-05-22', 8, 9, 1, 'Proses', NULL, NULL),
(32, 'rusak', '2020-06-05', NULL, NULL, '1', 'keuangan', NULL, 0, 9, 1, 'Baru', NULL, NULL),
(33, 'tidak bisa print', '2020-08-07', 'pita rusak', 'ganti pita', '5', 'TD', '2020-08-06', 16, 12, 1, 'Proses', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_karyawan` int(5) DEFAULT 0,
  `id_departemen` int(5) DEFAULT 0,
  `id_barang` int(5) DEFAULT 0,
  `jumlah` int(5) DEFAULT 0,
  `jumlah_setujui` int(11) DEFAULT 0,
  `satuan` varchar(25) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `tanggal_status` date DEFAULT NULL,
  `ket_penyerahan` varchar(100) DEFAULT NULL,
  `tanggal_penyerahan` date DEFAULT NULL,
  `penyerah` int(11) DEFAULT 0,
  `penerima` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `tanggal`, `id_karyawan`, `id_departemen`, `id_barang`, `jumlah`, `jumlah_setujui`, `satuan`, `ket`, `status`, `tanggal_status`, `ket_penyerahan`, `tanggal_penyerahan`, `penyerah`, `penerima`) VALUES
(1, '2020-05-01', 5, 1, 7, 1, 1, 'unit', 'tes', 4, '2020-05-02', 'se', '2020-06-05', 8, 9),
(2, '2020-05-01', 6, 3, 7, 1, 1, 'laptop', 'laptop sebelumnya rusak', 2, '2020-06-03', NULL, NULL, 0, 0),
(3, '2020-05-02', 6, 2, 7, 1, 0, 'unit', '-', 1, NULL, NULL, NULL, 0, 0),
(4, '2020-07-02', 5, 5, 7, 1, 0, 'unit', 'sa', 1, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(150) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jenis` varchar(200) DEFAULT 'CPU'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `alamat`, `kota`, `telp`, `email`, `jenis`) VALUES
(2, 'cv.mitra mandiri', 'jl.manggis ', 'banjarmasin', '083286421011', 'mitramandiri@gmail.com', 'CPU'),
(3, 'koperasi pedami', 'jl. A Yani', 'Banjarmasin', '087462746972', 'kopkarpedami@gmail.com', 'CPU,Monitor'),
(4, 'multitama', 'jl. A Yani', 'Banjarmasin', '082462775124', 'multitama@gmail.com', 'CPU'),
(5, 'Bandung komputer', 'Jl.kampung melayu', 'Banjarmasin', '089797979798', 'bandungcom@gmail.com', 'Monitor,Accesoris,UPS'),
(6, 'Adil komputer', 'Jl.Melayu darat', 'Banjarmasin', '0845657645', 'Adilcom@gmail.com', 'CPU,Monitor,Accesoris,UPS'),
(7, 'Multiprima', 'Jl.Cempaka Besar', 'Banjarmasin', '008867564', 'Multiprima@gmail.com', 'Accesoris,UPS'),
(8, 'Lion', 'Jl.Melayu darat', 'Banjarmasin', '085645324535', 'LionC@gmail.com', 'CPU,Monitor'),
(9, 'SCK', 'Jl.A Yani km.3,5', 'Banjarmasin', '08978675656', 'Sck21@gmail.com', 'Printer,Mesin Absensi'),
(10, 'bandungkom', 'jl.sungaibilu', 'banjarmasin', '0899999999', 'bandungkom@gmail.com', 'CPU,Monitor,Accesoris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perawatan_detail`
--
ALTER TABLE `perawatan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `perawatan_detail`
--
ALTER TABLE `perawatan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
