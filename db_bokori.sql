-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2022 pada 17.28
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bokori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kapal`
--

CREATE TABLE `tb_kapal` (
  `id_kapal` int(11) NOT NULL,
  `nama_kapal` varchar(30) NOT NULL,
  `nik_papalimbang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kapal`
--

INSERT INTO `tb_kapal` (`id_kapal`, `nama_kapal`, `nik_papalimbang`) VALUES
(1, 'Bahari2', '11110000'),
(2, 'Cantika', '740321101010130'),
(3, 'Bahari', '740321240010004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_papalimbang`
--

CREATE TABLE `tb_papalimbang` (
  `nik_papalimbang` varchar(20) NOT NULL,
  `nama_papalimbang` varchar(30) NOT NULL,
  `alamat_papalimbang` varchar(50) NOT NULL,
  `nohp_papalimbang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_papalimbang`
--

INSERT INTO `tb_papalimbang` (`nik_papalimbang`, `nama_papalimbang`, `alamat_papalimbang`, `nohp_papalimbang`) VALUES
('11110000', 'Ian', 'Laplea', '12345'),
('740321101010130', 'Fahri', 'Desa Latugho', '2224'),
('740321110001', 'Adzan fahra', 'Desa Lasalep', '1233'),
('740321240010004', 'Muhamad Amhar Rayadin', 'Desa Bungkolo', '082292249581');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyeberangan`
--

CREATE TABLE `tb_penyeberangan` (
  `id_penyeberangan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `jumlah_penyeberangan` int(5) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `status_penyeberangan` tinyint(1) NOT NULL DEFAULT 0,
  `admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penyeberangan`
--

INSERT INTO `tb_penyeberangan` (`id_penyeberangan`, `nik`, `id_stok`, `jumlah_penyeberangan`, `total_harga`, `status_penyeberangan`, `admin`) VALUES
(4, '7403212401030002', 1, 2, 200000, 2, ''),
(5, '7403212401030002', 2, 2, 100000, 1, 'Riano Ramadhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok_tiket`
--

CREATE TABLE `tb_stok_tiket` (
  `id_stok` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `tgl_stok` date NOT NULL,
  `jam_stok` time DEFAULT NULL,
  `jumlah_stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stok_tiket`
--

INSERT INTO `tb_stok_tiket` (`id_stok`, `id_tiket`, `tgl_stok`, `jam_stok`, `jumlah_stok`) VALUES
(1, 1, '2022-10-12', '16:00:00', 7),
(2, 2, '2022-10-12', '16:00:00', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_tiket` varchar(10) NOT NULL,
  `harga_tiket` int(12) NOT NULL,
  `id_kapal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `nama_tiket`, `harga_tiket`, `id_kapal`) VALUES
(1, 'Desawa', 100000, 2),
(2, 'Anak Anak', 50000, 2),
(3, 'Desawa', 100000, 3),
(4, 'Anak Anak', 50000, 3),
(5, 'VIP', 150000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(12) NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT 'no-image.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`nik`, `nama`, `alamat`, `nohp`, `email`, `username`, `password`, `level`, `gambar`) VALUES
('123344455555', 'Amhar', 'South East Sulawesi, West Muna, Matakidi', '082292249581', 'amharraydin@gmail.com', 'amhar', '$2y$10$ydpnQF3raHUCOfHldiN7me.ds4Q861dF8ZsNl68/jyhWTKigaRmOi', 'Public', '634ac8323150c.png'),
('7403212401030002', 'Muhamad Amhar Rayadin', 'South East Sulawesi, West Muna, Matakidi', '082292249581', 'artmardesign24@gmail.com', 'ray', '$2y$10$rHXpw8Zo8Xu7.SAT0eXSYe8H0OoR7GozYdc.04MfA58I9dvG/OUUK', 'Public', 'no-image.jpeg'),
('7403214040409902', 'Riano Ramadhan', 'Lapas Kaliman', '123456789082', 'riano@gmail.com', 'rian', '$2y$10$rHXpw8Zo8Xu7.SAT0eXSYe8H0OoR7GozYdc.04MfA58I9dvG/OUUK', 'Admin', '634ab0a370645.png'),
('7403214040409990', 'Setyanovanto', 'Lapas Kuningan', '123456789012', 'setyano@gmail.com', 'setya', '67aca154855ef15dcee26ede8c7b313d', 'Public', 'no-image.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kapal`
--
ALTER TABLE `tb_kapal`
  ADD PRIMARY KEY (`id_kapal`),
  ADD KEY `nik_papalimbang` (`nik_papalimbang`);

--
-- Indeks untuk tabel `tb_papalimbang`
--
ALTER TABLE `tb_papalimbang`
  ADD PRIMARY KEY (`nik_papalimbang`);

--
-- Indeks untuk tabel `tb_penyeberangan`
--
ALTER TABLE `tb_penyeberangan`
  ADD PRIMARY KEY (`id_penyeberangan`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indeks untuk tabel `tb_stok_tiket`
--
ALTER TABLE `tb_stok_tiket`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indeks untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_kapal` (`id_kapal`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_penyeberangan`
--
ALTER TABLE `tb_penyeberangan`
  MODIFY `id_penyeberangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_stok_tiket`
--
ALTER TABLE `tb_stok_tiket`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kapal`
--
ALTER TABLE `tb_kapal`
  ADD CONSTRAINT `tb_kapal_ibfk_1` FOREIGN KEY (`nik_papalimbang`) REFERENCES `tb_papalimbang` (`nik_papalimbang`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `tb_penyeberangan`
--
ALTER TABLE `tb_penyeberangan`
  ADD CONSTRAINT `tb_penyeberangan_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tb_user` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penyeberangan_ibfk_3` FOREIGN KEY (`id_stok`) REFERENCES `tb_stok_tiket` (`id_stok`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_stok_tiket`
--
ALTER TABLE `tb_stok_tiket`
  ADD CONSTRAINT `tb_stok_tiket_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tb_tiket` (`id_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD CONSTRAINT `tb_tiket_ibfk_1` FOREIGN KEY (`id_kapal`) REFERENCES `tb_kapal` (`id_kapal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
