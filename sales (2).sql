-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 08:27 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `tgl_absen` date NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(50) NOT NULL,
  `foto1` varchar(125) DEFAULT NULL,
  `foto2` varchar(125) DEFAULT NULL,
  `foto3` varchar(125) DEFAULT NULL,
  `foto4` varchar(125) DEFAULT NULL,
  `total` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `tgl_absen`, `nama`, `foto1`, `foto2`, `foto3`, `foto4`, `total`) VALUES
(1, '2021-07-29', 'aldo', 'default.png', NULL, NULL, NULL, '1'),
(2, '2021-07-29', 'lutfi', 'WhatsApp_Image_2021-07-29_at_09_10_28.jpeg', NULL, NULL, NULL, '2'),
(3, '2021-07-31', 'aldo', NULL, NULL, NULL, NULL, '1'),
(4, '2021-07-31', 'aldi skax', 'ttd.png', 'ttd1.png', 'ttd2.png', 'ttd3.png', '2'),
(5, '2021-07-31', 'pasar online', 'top6.png', NULL, NULL, NULL, '1'),
(6, '2021-07-31', 'admin', 'spiral1.png', 'download3.png', NULL, NULL, '2'),
(7, '2021-07-31', 'lutfi', 'SpongeBob SquarePants.gif', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok` varchar(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `deskripsi`, `gambar`, `harga_barang`, `stok`, `created`) VALUES
(1, 'BRG0001', 'Hampers Natal', 'barang mas bagus', 'defaul.jpg', 100000, '40', '2021-08-02'),
(2, 'BRG0002', 'Makanan', 'enak tau', 'defaul.jpg', 100000, '55', '2021-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id` int(200) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `sales` varchar(125) NOT NULL,
  `tgl_order` date NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `qty` varchar(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id`, `id_produk`, `id_toko`, `sales`, `tgl_order`, `nama_toko`, `alamat`, `qty`, `keterangan`, `status`) VALUES
(2, 2, 0, '', '2021-07-31', 'ruang rumi', 'sepatan', '3', 'Makanan Enak', 1),
(3, 3, 0, '', '2021-07-31', 'Toko Rumah', 'sepatn timur', '1', 'kualitasnya baik', 1),
(4, 4, 0, '', '2021-07-31', 'toko hampers', 'sepatan', '2', 'bagus', 2),
(6, 1, 0, '', '2021-08-02', 'rumah serba ada', 'tanah merah', '2', 'bagus bre', 1),
(8, 2, 0, '', '2021-08-02', 'FC ELEKTRIK', 'sepatan', '4', 'bagus', 3),
(9, 3, 0, '', '2021-08-10', 'Seblak mania', 'cikokol', '3', 'barang berkualitas', 0),
(12, 1, 0, '', '2021-08-10', 'Seblak mania', 'jauh', '33', 'barang masi berkualitas', 0),
(13, 12, 0, '', '2021-08-10', 'Seblak mania', 'sepatan', '2', 'ada', 0),
(14, 3, 0, '', '2021-08-10', 'Seblak Kuy', 'sebrang', '3', 'bagus dan berkulitas', 1),
(15, 3, 0, 'lutfi', '2021-08-20', 'Pasar online', 'tanah merah sepatan', '2', 'banyak', 0),
(16, 4, 0, 'lutfi', '2021-08-20', 'FC ELEKTRIK', 'ada', '4', 'ada', 0),
(17, 4, 0, 'lutfi', '2021-08-20', 'Pasar Lama', 'aaa', '4', 'aaaa', 0);

--
-- Triggers `orderan`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `orderan` FOR EACH ROW BEGIN

UPDATE produk set stok = stok - NEW.qty WHERE id_produk = NEW.id_produk;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `kode_sales` varchar(20) NOT NULL,
  `nama_sales` varchar(30) NOT NULL,
  `ttl` date NOT NULL,
  `no_telpon` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `kode_sales`, `nama_sales`, `ttl`, `no_telpon`, `email`, `alamat`) VALUES
(3, '1325ghb', 'dara ayu', '2021-06-30', 2147483647, 'darayu02@gmail.com', 'cimone'),
(4, 'sss-221', 'dara ayu', '2021-06-24', 2147483647, 'darayu02@gmail.com', 'cimone'),
(5, 'sss-221', 'dara ayu', '2021-07-09', 2147483647, 'darayu02@gmail.com', 'cimone'),
(6, 'gfdh45', 'dara ayu', '2021-07-07', 2147483647, 'darayu02@gmail.com', 'cimone'),
(7, '12gr', 'risya', '2021-06-28', 42627299, 'ejwb@twn.vom', 'citra');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `kategori_produk` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `harga_produk` varchar(13) NOT NULL,
  `stok` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `kategori_produk`, `deskripsi`, `gambar`, `harga_produk`, `stok`) VALUES
(1, 'BRG00001', 'Hampers Natal', 'Hampers', 'barang dengan kualiitas terbaik', 'Basic_Elements__28141_29.jpg', '100000', '90'),
(2, 'BRG00002', 'Hampers Imlek ', 'Spanduk', 'barang kualiitas terbaik dan bagus', 'default.jpg', '150000', '9'),
(3, 'BRG00003', 'Box Custom', 'Box', 'terbaik', 'top3.png', '55000', '98'),
(4, 'BRG00004', 'Box Natal', 'Box', 'Untuk kkeperluan natal', 'ttd.png', '95000', '2'),
(12, 'BRG00005', 'Kabel Anti Air', 'Kabel', 'anti air', 'wa.png', '550000', '100'),
(13, 'BRG00006', 'Vicenza', 'Hampers', 'hampers untukk teman', 'Untitled2.png', '125000', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `date`) VALUES
(1, 'Sepanduk', '2021-08-04 16:24:40'),
(2, 'X Banner', '2021-08-07 05:41:39'),
(3, 'Lampu', '2021-08-07 05:49:44'),
(4, 'Kabel', '2021-08-07 05:49:51'),
(5, 'Besi', '2021-08-10 08:47:32'),
(6, 'Hampers', '2021-08-12 14:24:41'),
(8, 'Box', '2021-08-23 23:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(18) NOT NULL,
  `kode_toko` varchar(20) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` varchar(170) NOT NULL,
  `no_telpon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `kode_toko`, `nama_toko`, `alamat`, `no_telpon`) VALUES
(2, 'FE00001', 'FCS ELEKTRIK', 'citra raya', '2147483647'),
(7, 'FE00002', 'FC ELEKTRIK', 'FCS ELEKTRIK', '2147483647'),
(10, 'FE00004', 'Pasar online', 'sepatan', '2147483647'),
(11, 'FE00005', 'Pasar Lama', 'Pasar Lama', '02147483647'),
(12, 'FE00006', 'Seblak mania', 'tanah merah', '893663817'),
(13, 'FE00007', 'Seblak Enak', 'Seblak mania', '0893663817'),
(14, 'FE00008', 'Seblak Kuy', 'Seblak mania', '0893663817'),
(16, 'FE00009', 'Toko Rumah', 'Tanah Merah', '0893663817');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(125) NOT NULL,
  `company` varchar(11) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `active` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `company`, `phone`, `active`, `created`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$hA1VNKNfLG242RJu08N2FuUetcBDK56RuwzFeNOnAFy7O54Ewfrv.', 'ADMIN', '09809097082', 1, '2021-07-30'),
(3, 'muhamad aldi setaiwan', 'muhamadaldisetiawan02@gmail.com', '$2y$10$SyMe0Tzk4FZpDS4Hx80Eq.GPkkkJBwM3NjF1pe.ZRMcTHVAqw0dsa', 'PIMPINAN', '09809097081', 1, '2021-07-30'),
(5, 'lutfi', 'lutfi@gmail.com', '$2y$10$PSBvF8h4jjMugeJq80W.NeFh1sfFScemhkzCJBBXtJhO.DTzm/yCS', 'SALES', '09809097082', 1, '2021-07-30'),
(6, 'verdian', 'verdian@gmail.com', '$2y$10$D8q3TWAq9puTjIndTP3vKODI7EzjgTPpYGt4bbGVyCaZGyCICzKR2', 'SALES', '09809097081', 0, '2021-08-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderan`
--
ALTER TABLE `orderan`
  ADD CONSTRAINT `orderan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
