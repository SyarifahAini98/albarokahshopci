-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2022 pada 09.50
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_barokah_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Syarifah Aini', 'UUAj8WAOz8j88rxQnz3vHxcnr.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_trs` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(7) NOT NULL,
  `total_harga` int(7) NOT NULL,
  `testimoni` varchar(100) NOT NULL,
  `tgl_testimoni` date NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_trs`, `id_transaksi`, `id_produk`, `qty`, `total_harga`, `testimoni`, `tgl_testimoni`, `nilai`) VALUES
(1, 1, 2, 1, 27000, '', '0000-00-00', 0),
(2, 2, 2, 1, 27000, '', '0000-00-00', 0),
(3, 2, 19, 2, 300000, '', '0000-00-00', 0),
(4, 3, 2, 1, 27000, '', '0000-00-00', 0),
(5, 3, 19, 2, 300000, '', '0000-00-00', 0),
(6, 4, 2, 1, 27000, '', '0000-00-00', 0),
(7, 4, 19, 2, 300000, '', '0000-00-00', 0),
(8, 5, 2, 1, 27000, '', '0000-00-00', 0),
(9, 6, 2, 1, 27000, '', '0000-00-00', 0),
(10, 7, 2, 2, 27000, '', '0000-00-00', 0),
(11, 8, 2, 2, 54000, '', '0000-00-00', 0),
(12, 9, 58, 1, 5000, '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `jkel` varchar(1) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `email`, `nama_lengkap`, `jkel`, `foto`, `no_telp`, `alamat`) VALUES
(1, 'genius_unlimited', '$2y$10$iE2WzCCBEkzA9e8.0OdlGOHN.go3DreA6ImhDOfE32aUK2H26sS4y', 'syarifahaini0912@gmail.com', 'Syarifah Aini', 'P', '1547566065_1546361724_FB_IMG_15364282448578812.jpg', '089695356694', 'Perum. Kebonsari Indah DD 3 Jember'),
(9, 'ipehipeh', '$2y$10$iE2WzCCBEkzA9e8.0OdlGOHN.go3DreA6ImhDOfE32aUK2H26sS4y', 'syarifahain12@gmail.com', 'Syarifah Aini1', 'P', 'default_foto_pelanggan.jpg', '089', 'Alamatkuuu'),
(11, 'ipeh', '$2y$10$iE2WzCCBEkzA9e8.0OdlGOHN.go3DreA6ImhDOfE32aUK2H26sS4y', 'syarifahaini091@gmail.com', 'Syarifah Aini', 'P', 'default_foto_pelanggan.jpg', '0896', 'Perumahan Kebonsari Indah DD 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `harga_produk` int(7) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok_produk` int(5) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `merek`, `ukuran`, `harga_produk`, `berat`, `stok_produk`, `kategori`, `foto`, `terjual`) VALUES
(1, 'Palesan', 'Swan', '180m', 22000, 500, 10, 'Alat Pancing', '1546147183_77.Bola Pimpong Nittaku 5000.jpg', 0),
(2, 'Palesan', 'Swan', '270m', 27000, 500, 10, 'Alat Pancing', '1546142630_1b.Palesan Merk Swan 270m 27000.jpg', 0),
(3, 'Palesan', 'Swan', '3m', 45000, 500, 10, 'Alat Pancing', '1546142703_1c.Palesan Merk Swan 3m 45000.jpg', 0),
(4, 'Palesan', 'Swan', '360m', 65000, 500, 10, 'Alat Pancing', '1546143223_1d.Palesan Merk Swan 360m 65000.jpg', 0),
(5, 'Pancing', 'Carbon plus', '1-10', 5000, 500, 10, 'Alat Pancing', '1546145614_2.Pancing Merk Carbon plus uk 1_10 5000.jpg', 0),
(6, 'Kambangan Stela Besar', 'Stela', 'Besar', 6000, 500, 10, 'Alat Pancing', '1546145649_3.Kambangan Stela besar 6000.jpg', 0),
(7, 'Kambangan Stela Kecil', 'Stela', 'Kecil', 3000, 500, 10, 'Alat Pancing', '1546145678_3.Kambangan Stela kecil 3000.jpg', 0),
(8, 'Kambangan Stela Tanggung', 'Stela', 'Tanggung', 5000, 500, 10, 'Alat Pancing', '1546145697_3.Kambangan Stela tanggung 5000.jpg', 0),
(9, 'Senar Pancing', 'Formula', '0.22m', 8000, 500, 10, 'Alat Pancing', '1546145739_5a.Senar Pancing Merk Formula uk 0.22 8000.jpg', 0),
(10, 'Senar Pancing', 'Revel', '0.28m', 10000, 500, 10, 'Alat Pancing', '1546145764_6a.Senar Pancing Merk Revel uk 0.28 10000.jpg', 0),
(11, 'Senar Pancing', 'Storm', '100m', 13000, 500, 10, 'Alat Pancing', '1546145783_7.Senar Pancing Merk Storm pj 100 m 13000.jpg', 0),
(12, 'Anting Anting', '', '1-5', 5000, 500, 10, 'Alat Pancing', '1546145808_8a.Anting-Anting no 1-5 5000 500.jpg', 0),
(13, 'Pancing Rangkaian Lumut', '', '1-7', 3000, 500, 10, 'Alat Pancing', '1546145878_9.Pancing Rangkaian Lumut no 1-7 3000.jpg', 0),
(14, 'Kerekan', '', '', 40000, 500, 10, 'Alat Pancing', '1546145926_13a.Kerekan 40000.jpg', 0),
(15, 'Kerekan', '', '', 45000, 500, 10, 'Alat Pancing', '1546145944_13b.Kerekan 45000.jpg', 0),
(16, 'Kerekan', '', '', 50000, 500, 10, 'Alat Pancing', '1546145962_13c.Kerekan 50000.jpg', 0),
(17, 'Kerekan', '', '', 75000, 500, 10, 'Alat Pancing', '1546145980_13e.Kerekan 75000.jpg', 0),
(18, 'Kecruk', '', '', 85000, 500, 10, 'Alat Musik', '1546146009_15.Kecruk 85000.jpg', 0),
(19, 'Raket Bulu Tangkis', 'Nano Flex', '80', 300000, 500, 10, 'Alat Olahraga', '1546146047_19.Nano Flex 80 300000.jpg', 0),
(20, 'Pancing Lengkap', '', '75cm', 75000, 500, 10, 'Alat Pancing', '1546146076_20a.Pancing Lengkap p 75 cm 7500.jpg', 0),
(21, 'Pancing Lengkap', '', '1m', 10000, 500, 10, 'Alat Pancing', '1546146104_20b.Pancing Lengkap p 1m 10000.jpg', 0),
(22, 'Senar Kecruk', '', '3m', 3000, 500, 10, 'Alat Musik', '1546146127_24.Senar Kecruk uk 3m 3000.jpg', 0),
(23, 'Gitar Junior', '', '', 150000, 500, 10, 'Alat Musik', '1546146149_26.Gitar Junior 150000.jpg', 0),
(24, 'Gitar Sayur', '', '', 190000, 500, 10, 'Alat Musik', '1546148544_27.Gitar Sayur 190000.jpg', 0),
(25, 'Senar Gitar', 'Pyramid', '1-3', 2500, 500, 10, 'Alat Musik', '1546146222_28a.Senar Gitar Merk Pyramid no 1-3 2500.jpg', 0),
(26, 'Senar Gitar', 'Fuji', '1-2', 3500, 500, 10, 'Alat Musik', '1546146246_29a.Senar Gitar Merk Fuji no 1-2 3500.jpg', 0),
(27, 'Raket Bulu Tangkis Yonex', 'Yonex', '', 40000, 500, 10, 'Alat Olahraga', '1546146281_33.Raket Yonex 40000.jpg', 0),
(28, 'Raket Bulu Tangkis Morris', 'Morris', '', 15000, 500, 10, 'Alat Olahraga', '1546146309_34.Raket Morris 15000.jpg', 0),
(29, 'Raket Bulu Tangkis King', 'King', '79', 20000, 500, 10, 'Alat Olahraga', '1546146334_35.Raket King 79 20000.jpg', 0),
(30, 'Raket Bulu Tangkis Aero', 'Aero', '', 35000, 500, 10, 'Alat Olahraga', '1546146363_36.Raket Aero 35000.jpg', 0),
(31, 'Raket Bulu Tangkis Power Mix 100', 'Power Mix', '100', 305000, 500, 10, 'Alat Olahraga', '1546146406_37.Raket Power Mix 100 305000.jpg', 0),
(32, 'Raket Bulu Tangkis Matrix Power', 'Matrix Power', '', 285000, 500, 10, 'Alat Olahraga', '1546146445_38.Raket Matrix Power 5000 285000.jpg', 0),
(33, 'Raket Bulu Tangkis Power Shoot Pro', 'Power Shoot Pro', '', 295000, 500, 10, 'Alat Olahraga', '1546146482_41.Power Shoot Pro 295000.jpg', 0),
(34, 'Raket Bulu Tangkis Turbo XSO', 'Turbo XSO', '', 270000, 500, 10, 'Alat Olahraga', '1546146516_42.Turbo XSO 270000.jpg', 0),
(35, 'Raket Bulu Tangkis Ultra Carbon UC', 'Ultra Carbon UC', '', 325000, 500, 10, 'Alat Olahraga', '1546146557_43.Ultra Carbon UC 7300 325000.jpg', 0),
(36, 'Raket Bulu Tangkis Yonex ArcSaber', 'Yonex ArcSaber', '', 195000, 500, 10, 'Alat Olahraga', '1546146599_46.Yonex ArcSaber 195000.jpg', 0),
(37, 'Raket Bulu Tangkis Voltrix 80', 'Voltrix', '80', 200000, 500, 10, 'Alat Olahraga', '1546146627_47.Voltric 80 200000.jpg', 0),
(38, 'Bola Sepak', '', '4', 85000, 500, 10, 'Alat Olahraga', '1546146656_49a.Bola Sepak uk 4 85000.jpg', 0),
(39, 'Bola Sepak', '', '5', 95000, 500, 10, 'Alat Olahraga', '1546146683_49b.Bola Sepak uk 5 95000.jpg', 0),
(40, 'Bola Basket', '', '', 125000, 500, 10, 'Alat Olahraga', '1546146737_50.Bola Basket 125000.jpg', 0),
(41, 'Bola Tenis', '', '', 6000, 500, 10, 'Alat Olahraga', '1546146751_51.Bola Tenis 6000.jpg', 0),
(42, 'Towel Handuk', '', '', 5000, 500, 10, 'Alat Olahraga', '1546146769_52.Towel Handuk 5000.jpg', 0),
(43, 'Senar Raket Yonex', 'Yonex', '', 95000, 500, 10, 'Alat Olahraga', '1546146799_55.Senar Raket Yonex 95000.jpg', 0),
(44, 'Kok Bulu Tangkis Prospek Kuning', '', '', 30000, 500, 9, 'Alat Olahraga', '1546146861_57.Kok Prospek Kuning 30000 3000.jpg', 1),
(45, 'Kok Bulu Tangkis Prospek Orange', 'Prospek Orange', '', 65000, 500, 10, 'Alat Olahraga', '1546146891_58.Kok Prospek Orange 65000 5500.jpg', 0),
(46, 'Deker Remora', 'Remora', '', 35000, 500, 10, 'Alat Olahraga', '1546146911_61.Deker Remora 35000.jpg', 0),
(47, 'Skak', '', '25', 28000, 500, 10, 'Alat Olahraga', '1546146931_62a.Skak uk 25 28000.jpg', 0),
(48, 'Setip Billiard', '', '', 3000, 500, 10, 'Alat Olahraga', '1546146946_64.Setip Billiard 3000.jpg', 0),
(49, 'Karet Karambol', '', '', 20000, 500, 10, 'Alat Olahraga', '1546146972_65.Karet Karambol 20000.jpg', 0),
(50, 'Bola Karambol Mercedez Benz', 'Mercedez Benz', '', 15000, 500, 10, 'Alat Olahraga', '1546147000_66.Bola Karambol Mercedez Benz 15000.jpg', 0),
(51, 'Bola Karambol Mikasa', 'Mikasa', '', 15000, 500, 10, 'Alat Olahraga', '1546147017_67.Bola Karambol Mikasa 15000.jpg', 0),
(52, 'Bola Takraw Double', '', '', 30000, 500, 10, 'Alat Olahraga', '1546147035_71.Bola Takraw Double 30000.jpg', 0),
(53, 'Tongkat Kasti', '', '', 12000, 500, 10, 'Alat Olahraga', '1546147050_72.Tongkat Kasti 12000.jpg', 0),
(54, 'Bola Pimpong Orange Ball', 'Orange Ball', '', 6000, 500, 10, 'Alat Olahraga', '1546147074_73.Bola Pimpong Orange Ball 6000.jpg', 0),
(55, 'Bola Pimpong 3 Star T.T.Ball', '3 Star T.T.Ball', '', 12500, 500, 10, 'Alat Olahraga', '1546147107_74.Bola Pimpong 3 Star T.T.Ball 12500.jpg', 0),
(56, 'Bola Pingpong Shield 101', 'Shield 101', '', 2000, 500, 10, 'Alat Olahraga', '1546147132_75.Bola Pingpong Shield 101 2000.jpg', 0),
(57, 'Bola Pompong DHS', 'DHS', '', 10000, 500, 8, 'Alat Olahraga', '1546147159_76.Bola Pimpong DHS 10000.jpg', 0),
(58, 'Bola Pimpong Nittaku', 'Nittaku', '', 5000, 500, 2, 'Alat Olahraga', '1546147183_77.Bola Pimpong Nittaku 5000.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tarif_ongkir` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `perkiraan` int(11) NOT NULL,
  `rekening` bigint(30) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `sub_total`, `tarif_ongkir`, `total_bayar`, `tgl_pemesanan`, `tgl_transaksi`, `foto`, `status`, `alamat`, `perkiraan`, `rekening`, `kurir`, `berat`) VALUES
(1, 9, 27000, 6000, 0, '2019-06-15', '0000-00-00', '', 'Belum Upload', 'Perumahan Kebonsari Indah DD 3', 4, 0, 'ECO', 500),
(2, 1, 627000, 12000, 0, '2019-06-15', '2019-06-16', '0GlKLjZI4BjGGidrtLfaygsna.png', 'Terbayar', 'Perumahan Kebonsari Indah DD 3', 4, 123, 'ECO', 1500),
(3, 1, 627000, 6000, 0, '2019-06-15', '0000-00-00', '', 'Belum Upload', 'Perumahan Kebonsari Indah DD 3', 5, 0, 'ECO', 1500),
(4, 11, 627000, 6000, 1000, '2019-06-15', '2019-06-16', 'login-page.png', 'Terbayar', 'Perumahan Kebonsari Indah DD 3sdsdsdsd', 4, 1231212121, 'ECO', 1500),
(5, 9, 27000, 6000, 0, '2019-06-15', '0000-00-00', '', 'Belum Upload', 'Perumahan Kebonsari Indah DD 3', 5, 0, 'ECO', 500),
(6, 1, 27000, 6000, 0, '2019-06-15', '0000-00-00', '', 'Belum Upload', 'Perumahan Kebonsari Indah DD 3', 5, 0, 'ECO', 500),
(7, 1, 54000, 6000, 0, '2019-06-15', '0000-00-00', '', 'Belum Upload', 'Perumahan Kebonsari Indah DD 3', 5, 0, 'ECO', 1000),
(8, 11, 54000, 6000, 1000, '2019-06-15', '2019-06-16', '735663.jpg', 'Belum Upload', 'Perumahan Kebonsari Indah DD 3', 5, 123, 'ECO', 1000),
(9, 1, 5000, 10000, 15000, '2019-06-15', '0000-00-00', '', 'Belum Upload', 'Jombang Jawa Timur', 1, 0, 'Paket Kilat Khusus', 500);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_trs`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_trs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
