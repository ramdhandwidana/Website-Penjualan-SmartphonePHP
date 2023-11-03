-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.infinityfree.com
-- Waktu pembuatan: 16 Jun 2023 pada 04.45
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33999778_rayhana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `foto_profil` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`, `nama_lengkap`, `foto_profil`) VALUES
(1, 'rayhana@admin.com', 'ramdhandwidana@gmail.com', 'rayhana@admin.com', 'Ramdhan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(5, 'Handphone'),
(6, 'Aksesoris'),
(10, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(8) NOT NULL,
  `nama_daerah` varchar(40) NOT NULL,
  `tarif` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_daerah`, `tarif`) VALUES
(1, 'Jabodetabek', 13000),
(2, 'Diluar Jabodetabek', 200009),
(4, 'Luar Jawa (Kalimantan)', 30000),
(5, 'Luar Jawa (Papua)', 40000),
(8, 'Banten (Diluar Jabodetabek)', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(8) NOT NULL,
  `id_pembelian` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(13, 34, 'Axel Gravensenn', 'BRI', 5112000, '2022-06-12', '20220612011403gunda.png'),
(14, 37, 'Andi', 'BCA', 9017000, '2022-06-14', '202206141106189f053-image_itsm_blog_en_2.jpg'),
(15, 38, '', '', 0, '2022-06-16', '20220616023549'),
(16, 42, 'BUDIMAN', 'BRI', 5112000, '2022-06-17', '20220617050713A4.png'),
(17, 48, 'Zainudin', 'BSI', 12016000, '2022-06-19', '20220619065152tarikreasi.png'),
(18, 56, 'Ramdhan', 'BTN', 46200000, '2022-06-23', '20220623061631pp.png'),
(19, 52, 'Van de Beek', 'BSI', 3054000, '2022-06-27', '20220627035542download (1).png'),
(20, 57, 'Ramdhan', 'BCA', 2242000, '2022-07-02', '20220702110433image.jpg'),
(21, 59, 'Ramdhan Dwidana Putra', 'BTN', 9010000, '2022-07-09', '202207091157192-pemain-yang-ingin-bruno-fernandes-datangkan-ke-man-united-N3ZLwwtJUY.jpg'),
(22, 60, 'Ramdhan Dwidana Putra', 'BCA', 4884500, '2022-07-13', '20220713045920image (1).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `penerima` varchar(40) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_daerah` varchar(40) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(30) NOT NULL DEFAULT 'Belum Dibayar',
  `resi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_users`, `id_ongkir`, `penerima`, `no_telp`, `tanggal_pembelian`, `total_pembelian`, `nama_daerah`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(34, 9, 1, '', 0, '2022-06-12', 5112000, 'Jabodetabek', 13000, 'Margonda City, Depok 155534', 'Barang Sudah Sampai', '233232424'),
(37, 9, 2, '', 0, '2022-06-14', 9017000, 'Diluar Jabodetabek', 20000, 'Kp.Ciseeng Bogor Jawa barat 15442', 'Barang Dikirim', '135137183171'),
(38, 9, 2, '', 0, '2022-06-14', 3019000, 'Diluar Jabodetabek', 20000, 'Surabaya, Jawa Timur, Indonesi 15212', 'Sudah Kirim Pembayaran', ''),
(39, 9, 1, '', 0, '2022-06-14', 2118000, 'Jabodetabek', 13000, 'Pagedangan, Kab. Tangerang, Banten', 'Batal', ''),
(40, 9, 1, '', 0, '2022-06-14', 3012000, 'Jabodetabek', 13000, 'Cisauk, Kab.Tangerang, Banten 12552', 'Batal', ''),
(41, 9, 1, '', 0, '2022-06-16', 8418000, 'Jabodetabek', 13000, 'Balaraja, Banten', 'Belum Dibayar', ''),
(42, 14, 1, '', 0, '2022-06-17', 5112000, 'Jabodetabek', 13000, 'BSD Timur, Tangerang Selatan, Banten 15344', 'Barang Dikirim', '3223232'),
(43, 9, 1, '', 0, '2022-06-18', 2113000, 'Jabodetabek', 13000, 'Depok,Jawa Barat', 'BATAL', ''),
(44, 0, 1, 'ASEP', 2147483647, '2022-06-18', 2113000, 'Jabodetabek', 13000, 'Kelapa Dua, Kab. Tangerang Banten', 'Belum Dibayar', ''),
(45, 9, 1, 'Budi', 380309238, '2022-06-18', 2113000, 'Jabodetabek', 13000, 'BSD Barat, Tangerang Selatan Banten', 'Batal', ''),
(46, 9, 1, 'Rudi ', 2147483647, '2022-06-18', 2113000, 'Jabodetabek', 13000, 'Menteng, Jakarta Pusat', 'Belum Dibayar', ''),
(47, 9, 2, 'Rama', 2147483647, '2022-06-18', 2120000, 'Diluar Jabodetabek', 20000, 'Semarang, Jawa Tengah', 'Belum Dibayar', ''),
(48, 9, 2, 'Zainudin', 2147483647, '2022-06-19', 12016000, 'Diluar Jabodetabek', 20000, 'Kuta, Bali 13221', 'Barang Dikirim', '1823872379793'),
(49, 9, 1, 'Michael', 2147483647, '2022-06-20', 5117000, 'Jabodetabek', 13000, 'Bintaro, Jakarta Selatan, Banten 15221', 'Belum Dibayar', ''),
(50, 9, 0, '', 0, '2022-06-20', 2999000, '', 0, '', 'Belum Dibayar', ''),
(51, 9, 0, '', 0, '2022-06-20', 21005000, '', 0, '', 'Belum Dibayar', ''),
(52, 9, 0, '', 0, '2022-06-20', 3054000, '', 0, '', 'Sudah Kirim Pembayaran', ''),
(53, 9, 0, '', 0, '2022-06-20', 2999000, '', 0, '', 'Belum Dibayar', ''),
(54, 9, 0, '', 0, '2022-06-20', 5000, '', 0, '', 'Belum Dibayar', ''),
(55, 9, 2, '', 97979, '2022-06-20', 21013000, 'Diluar Jabodetabek', 20000, 'assas', 'Belum Dibayar', ''),
(56, 9, 0, 'iqbal', 2323, '2022-06-20', 46200000, '', 0, 'w', 'Sudah Kirim Pembayaran', ''),
(57, 9, 1, 'Rama', 2147483647, '2022-06-23', 2242000, 'Jabodetabek', 13000, 'Kelapa Dua, Kab. Tangerang Banten', 'Sudah Kirim Pembayaran', ''),
(58, 9, 1, 'jennk', 890, '2022-06-24', 3141000, 'Jabodetabek', 13000, 'mfmfe', 'Belum Dibayar', ''),
(59, 9, 1, 'Rama', 2147483647, '2022-07-09', 9010000, 'Jabodetabek', 13000, 'Kelapa Dua, Kab. Tangerang Banten', 'Sudah Kirim Pembayaran', ''),
(60, 9, 1, 'Rama', 2147483647, '2022-07-13', 4884500, 'Jabodetabek', 13000, 'Kelapa Dua, Kab. Tangerang Banten', 'Sudah Kirim Pembayaran', ''),
(61, 9, 1, 'ASEP', 2147483647, '2022-07-14', 2913000, 'Jabodetabek', 13000, 'BSD Timur, Tangerang Selatan, Banten 15344', 'Batal', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(8) NOT NULL,
  `id_pembelian` int(8) NOT NULL,
  `id_produk` int(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(41, 34, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(42, 34, 35, 1, 'Redmi 10s', 2999000, 2999000),
(43, 35, 35, 1, 'Redmi 10s', 2999000, 2999000),
(44, 35, 34, 1, 'Vivo Y27', 2499000, 2499000),
(45, 35, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(46, 36, 35, 1, 'Redmi 10s', 2999000, 2999000),
(47, 37, 35, 3, 'Redmi 10s', 2999000, 8997000),
(48, 38, 35, 1, 'Redmi 10s', 2999000, 2999000),
(49, 39, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(50, 39, 41, 1, 'Kartu Telkomsel', 5000, 5000),
(51, 40, 35, 1, 'Redmi 10s', 2999000, 2999000),
(52, 41, 41, 1, 'Kartu Telkomsel', 5000, 5000),
(53, 41, 37, 4, 'Infinix Hot 11', 2100000, 8400000),
(54, 42, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(55, 42, 35, 1, 'Redmi 10s', 2999000, 2999000),
(56, 43, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(57, 44, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(58, 45, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(59, 46, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(60, 47, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(61, 48, 35, 4, 'Redmi 10s', 2999000, 11996000),
(62, 49, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(63, 49, 41, 1, 'Kartu Telkomsel', 5000, 5000),
(64, 49, 35, 1, 'Redmi 10s', 2999000, 2999000),
(65, 50, 35, 1, 'Redmi 10s', 2999000, 2999000),
(66, 51, 37, 10, 'Infinix Hot 11', 2100000, 21000000),
(67, 51, 41, 1, 'Kartu Telkomsel', 5000, 5000),
(68, 52, 35, 1, 'Redmi 10s', 2999000, 2999000),
(69, 52, 41, 11, 'Kartu Telkomsel', 5000, 55000),
(70, 53, 35, 1, 'Redmi 10s', 2999000, 2999000),
(71, 54, 41, 1, 'Kartu Telkomsel', 5000, 5000),
(72, 55, 35, 7, 'Redmi 10s', 2999000, 20993000),
(73, 56, 37, 22, 'Infinix Hot 11', 2100000, 46200000),
(74, 57, 43, 1, 'Earphone Buds Mi', 129000, 129000),
(75, 57, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(76, 58, 43, 1, 'Earphone Buds Mi', 129000, 129000),
(77, 58, 35, 1, 'Redmi 10s', 2999000, 2999000),
(78, 59, 35, 3, 'Redmi 10s', 2999000, 8997000),
(79, 60, 37, 1, 'Infinix Hot 11', 2100000, 2100000),
(80, 60, 43, 1, 'Mi Earbuds Basic 2', 129000, 129000),
(81, 60, 42, 1, 'Kabel Charger Type C', 42500, 42500),
(82, 60, 51, 1, 'Redmi Note 11 6/128', 2600000, 2600000),
(83, 61, 50, 1, 'Redmi 10s 6/128 New', 2900000, 2900000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(8) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` int(10) NOT NULL,
  `foto_produk` varchar(80) NOT NULL,
  `dekripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `dekripsi_produk`, `stok_produk`) VALUES
(37, 5, 'Infinix Hot 11', 2100000, 'Infinix-Hot-11-NFC-Indonesia.webp', '<p>Ukuran layar 6,7 inci Full HD+, IPS LCD</p>\r\n\r\n<p>Prosesor Mali G52 GPU</p>\r\n\r\n<p>RAM 6/128</p>\r\n\r\n<p>Kapasitas baterai Li ion 5.000 mAh</p>\r\n', 1),
(42, 6, 'Kabel Charger Type C', 42500, 'kabel type c.jpg', '<p>Koneksi : USB-C</p>\r\n', 9),
(43, 6, 'Mi Earbuds Basic 2', 129000, 'covertiga.jpg', '<p>Xiaomi Mi True Wireless Earbuds Basic 2 Headphone Headset Earphone</p>\r\n', 2),
(44, 5, 'Redmi Note 9', 1999000, 'note 9.png', 'RAM 6/128', 2),
(45, 6, 'Xiaomi Mi 10 Pro Earphone ', 88000, 'earphonexiaomi.jpg', '<p>Dengan Mic Untuk Mi 9t 9se 8 8se 6 6x A1 Mix 2s 3 Note 3.</p>\r\n\r\n<p>Menggunakan kabel type c</p>\r\n', 4),
(46, 5, 'Infinix Hot 10 Play', 1500000, 'hot10play.jpg', 'RAM 3/32 GB', 4),
(47, 5, 'Redmi 9c', 1499000, 'redmi9c.jpg', 'RAM 3/32 GB', 4),
(48, 5, 'Vivo Y33T', 3499000, 'vivoy33t.png', '<ul>\r\n	<li>Dimensi: 164,26 &times; 76,08 &times; 8,00mm</li>\r\n	<li>Berat: 182g</li>\r\n	<li>Bahan: Plastik Kaca dengan AG Dynamic Color &amp; Mirror Finishing</li>\r\n</ul>\r\n', 2),
(49, 5, 'iPhone XR 128GB', 4600000, 'ipxr128gb.webp', '<p>Kapasitas : 128GB</p>\r\n\r\n<p>Layar : 6.1 inch</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2),
(50, 5, 'Redmi 10s 6/128 New', 2900000, '596FB904-E3EA-2DDB-DEB4-3BEB49461BD3.png', '<p>Layar 6.43&quot;</p>\r\n\r\n<p>RAM 6/64</p>\r\n\r\n<p>Prosesor MediaTek Helio G95</p>\r\n', 1),
(51, 5, 'Redmi Note 11 6/128', 2600000, 'xiaomi-redmi-note-11-global-1.jpg', '<p>RAM 6/128 GB</p>\r\n\r\n<p>Layar 6.43&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0),
(52, 10, 'PowerBank ROBOT 10000mAh', 131000, '598a51f7-4def-47b9-94bf-e61439bf875d.jpg', '<p>Ringan hanya 225 Gram</p>\r\n\r\n<p>Desain yang sangat tipis dan mudah disimpan, berpergian lebih mudah</p>\r\n\r\n<p>Anti skip dan anti- fingerprints</p>\r\n\r\n<p>Daya powerbank terisi penuh hanya dalam waktu 5,5 jam<br />\r\n&nbsp;</p>\r\n', 4),
(53, 10, 'Kivee Powerbank 10000mah Dual ', 90000, 'da30612f00884629077f847f0877a099.jpg', '<p>Model: PT69P</p>\r\n\r\n<p>tampilan layar bank daya</p>\r\n\r\n<p>Kapasitas: 10000mAh</p>\r\n\r\n<p>Bahan: PC + ABS</p>\r\n\r\n<p>Nilai masukan: 5V/2A</p>\r\n\r\n<p>Keluaran: 5V/2.1A</p>\r\n\r\n<p>Keluaran: USB*2</p>\r\n\r\n<p>Masukan: Tipe C &amp; Mikro</p>\r\n\r\n<p>Ukuran produk: 138*69*15mm</p>\r\n\r\n<p>Berat bersih 215g</p>\r\n', 2),
(54, 6, 'LENOVO LP40 PRO TRUE WIRELESS ', 147500, 'c642cf97-7328-4857-833e-66b3675bd113.png', '<p>Model : Touch Control</p>\r\n\r\n<p>Bluetooth Version : V5.0</p>\r\n\r\n<p>Working Range : &ge; Up to 10m</p>\r\n\r\n<p>Speaker size : 13mm</p>\r\n\r\n<p>Impedance : 32&Omega;</p>\r\n\r\n<p>Mic Type : Silicon Microphone (MEMS Microphone)</p>\r\n\r\n<p>Mic Sensitivity : -32dB&plusmn;3dB</p>\r\n\r\n<p>Speaker Power : 20mW*2</p>\r\n', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `email`, `password`) VALUES
(9, 'ramdhandwi', 'cobasaja', 'aeshigh@gmail.com', '12345'),
(10, 'aji', 'ajibianglala', 'bianglala@gmail.com', '12345'),
(14, 'budiman', 'teskedua', 'rama@gmail.com', '12345'),
(25, 'Alvin', 'alvin25', 'alvinnur@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
