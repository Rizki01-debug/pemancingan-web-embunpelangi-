-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2024 pada 13.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_promosi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `gambar_fasilitas` varchar(255) DEFAULT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `gambar_fasilitas`, `nama_fasilitas`, `deskripsi`) VALUES
(2, '1718175213_gambar_fasilitas_fotoobjek-wisata02@2x.png', 'Pemancingan Ikan', 'Contoh Deskripsi Pemancingan Ikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan`
--

CREATE TABLE `ikan` (
  `id` int(11) NOT NULL,
  `gambar_ikan` varchar(255) DEFAULT NULL,
  `nama_ikan` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ikan`
--

INSERT INTO `ikan` (`id`, `gambar_ikan`, `nama_ikan`, `deskripsi`) VALUES
(1, '1718136267_gambar_ikan_fotoobjek01@2x.png', 'Ikan Nila', 'Ikan nila adalah salah satu spesies ikan air tawar yang populer di kalangan pembudidaya ikan. Ikan ini memiliki bentuk tubuh yang gepeng dengan warna yang umumnya keperakan atau keabu-abuan. Nila dikenal sebagai ikan yang tangguh dan mudah dipelihara dalam kolam-kolam budidaya karena pertumbuhannya yang cepat dan adaptasinya yang baik terhadap berbagai kondisi lingkungan. Selain itu, dagingnya yang lezat membuatnya menjadi pilihan favorit dalam konsumsi masyarakat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_web`
--

CREATE TABLE `info_web` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `nama_web` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `nama_ig` varchar(100) DEFAULT NULL,
  `link_ig` varchar(255) DEFAULT NULL,
  `link_yt` varchar(255) DEFAULT NULL,
  `link_gmaps` varchar(255) DEFAULT NULL,
  `gambar_beranda` varchar(255) DEFAULT NULL,
  `tentang_kami` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_web`
--

INSERT INTO `info_web` (`id`, `logo`, `nama_web`, `alamat`, `email`, `telepon`, `nama_ig`, `link_ig`, `link_yt`, `link_gmaps`, `gambar_beranda`, `tentang_kami`) VALUES
(1, '1718134682_logo_logo-1@2x.png', 'Pemancingan Embun Pelangi', 'Kiajaran Wetan Lohbener', 'mkarya058@gmail.com', '6281320545009', 'KARYAA JUARA', 'https://www.instagram.com/karya_juara?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', 'https://www.youtube.com/embed/YLl2cyk_Xs8?si=TgCj7TvXS_9793vb', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15860.46138562049!2d108.226041!3d-6.379109000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb78aa59b2779%3A0x2cd7d8067c941cf0!2sPemancingan%20EMBUN%20PELANGI!5e0!3m2!1sid!2sid!4v1718173155232!5m2!1sid!2', '1718134682_bg_homesection-1@2x.png', 'Terselip di tengah hamparan alam yang memukau, Embun Pelangi menjadi destinasi mancing kekinian yang tak tertandingi. Di sini, pengunjung bukan hanya dapat menikmati keindahan alam, tetapi juga dilengkapi dengan fasilitas rekreasi keluarga yang tak kalah menarik.\r\nDari momen pertama, ketika matahari mulai muncul di ufuk timur, Embun Pelangi menyambut pengunjung dengan keindahan embun pelangi yang mempesona. Setiap pagi, embun di permukaan air menciptakan spektrum warna yang memukau, memberikan kesan magis pada suasana.\r\nNamun, daya tarik Embun Pelangi tak berhenti di situ. Bagi para pengunjung yang mencintai memancing, tempat ini adalah surga kecil. Dengan peralatan yang lengkap dan fasilitas yang memadai, pengalaman memancing di Embun Pelangi menjadi tak terlupakan. Jenis ikan yang beragam dan ukuran yang menggiurkan menantang para pemancing untuk menaklukkan perairan yang tenang namun penuh kejutan.\r\nTidak hanya itu, Embun Pelangi juga memanjakan pengunjung dengan fasilitas rekreasi keluarga yang lengkap. Tempat foto yang indah menawarkan latar belakang alam yang memesona untuk momen-momen berharga bersama keluarga dan teman-teman. Kolam renang anak yang aman dan bersih menjadi tempat bermain yang menyenangkan bagi si kecil, sementara area piknik yang nyaman menawarkan suasana santai untuk bersantai dan menikmati waktu bersama.\r\nDengan segala keindahan alam dan fasilitas yang lengkap, Embun Pelangi bukan hanya tempat mancing kekinian, tetapi juga destinasi liburan keluarga yang sempurna. Setiap kunjungan ke sini menjadi pengalaman yang memuaskan dan memberi kenangan yang tak terlupakan bagi semua pengunjung.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_kantin`
--

CREATE TABLE `menu_kantin` (
  `id` int(11) NOT NULL,
  `gambar_menu` varchar(255) DEFAULT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu_kantin`
--

INSERT INTO `menu_kantin` (`id`, `gambar_menu`, `nama_menu`, `kategori`) VALUES
(1, '1718140199_gambar_menu_image-17@2x.png', 'Nasi Liwet', 'Makanan'),
(2, '1718172240_gambar_menu_image-21@2x.png', 'Es Teh', 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `created_at`) VALUES
(1, 'admin', '$2a$12$a5sXl79hiJuGX4kAetf3S.BnEfqlg0ELv/8RWcEbYjEqyRlAnR1d.', 'Admin', '2024-06-11 05:07:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `info_web`
--
ALTER TABLE `info_web`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_kantin`
--
ALTER TABLE `menu_kantin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `info_web`
--
ALTER TABLE `info_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu_kantin`
--
ALTER TABLE `menu_kantin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
