-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2022 pada 18.47
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `id_role_project` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `read` varchar(10) NOT NULL,
  `update` varchar(10) NOT NULL,
  `delete` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `artefak_project`
--

CREATE TABLE `artefak_project` (
  `id_artefak` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_versi` int(11) NOT NULL,
  `nama_artefak` varchar(50) NOT NULL,
  `deskripsi_artefak` text NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artefak_project`
--

INSERT INTO `artefak_project` (`id_artefak`, `id_project`, `id_versi`, `nama_artefak`, `deskripsi_artefak`, `id_jenis`) VALUES
(41, 46, 3, 'ada', '', 4),
(42, 46, 3, 'ada', '', 5),
(43, 12, 8, 'cnc', '', 2),
(45, 12, 8, 'jhjkh', '', 2),
(72, 30, 9, 'coba', '', 2),
(74, 61, 21, 'dad', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `backlog`
--

CREATE TABLE `backlog` (
  `id_backlog` int(11) NOT NULL,
  `id_jenis_backlog` int(11) NOT NULL,
  `nama_backlog` varchar(50) NOT NULL,
  `isi_backlog` varchar(100) NOT NULL,
  `status_backlog` varchar(50) NOT NULL,
  `priority_backlog` varchar(50) NOT NULL,
  `order_backlog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `backlog`
--

INSERT INTO `backlog` (`id_backlog`, `id_jenis_backlog`, `nama_backlog`, `isi_backlog`, `status_backlog`, `priority_backlog`, `order_backlog`) VALUES
(2, 4, 'ada', '', '', '', ''),
(3, 4, 'lagi', '', '', '', ''),
(4, 5, 'coba', '', '', '', ''),
(5, 8, 'coba1', '', '', '', ''),
(7, 6, 'coba1', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_artefak` int(11) NOT NULL,
  `nama_berkas` text NOT NULL,
  `isi_berkas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_artefak`, `nama_berkas`, `isi_berkas`) VALUES
(37, 74, 'ERDDiagram1_Najib.png', 'artefak/R6EecVTud9GwCCSVhcJPSW5aaWEKhMGg78dyqRZq.png'),
(40, 72, 'ABSENSIONLINE.mdj', 'artefak/rDbfnBplF0kCERaU0iEN5MllLt1qCPZ4gTCbAM0K.txt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_backlog`
--

CREATE TABLE `berkas_backlog` (
  `id_berkas_backlog` int(20) NOT NULL,
  `id_backlog` int(20) NOT NULL,
  `nama_berkas_backlog` text NOT NULL,
  `isi_berkas_backlog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas_backlog`
--

INSERT INTO `berkas_backlog` (`id_berkas_backlog`, `id_backlog`, `nama_berkas_backlog`, `isi_berkas_backlog`) VALUES
(12, 2, '38814932_1661471317312466_6050386692630642688_n.jpg', 'artefak/oapLMtisFWKRpfvb5TgvbKMztwGkjgH61aAsQZwS.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `index`
--

CREATE TABLE `index` (
  `id_index` int(11) NOT NULL,
  `id_berkas` int(11) NOT NULL,
  `kata` varchar(20) NOT NULL,
  `frek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invite`
--

CREATE TABLE `invite` (
  `id_invite` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `date_sent` date NOT NULL,
  `date_accept` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_artefak`
--

CREATE TABLE `jenis_artefak` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL,
  `id_sdlc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_artefak`
--

INSERT INTO `jenis_artefak` (`id_jenis`, `nama_jenis`, `id_sdlc`) VALUES
(2, 'Analisa', 1),
(3, 'Backlog', 3),
(4, 'Design', 1),
(5, 'Proses', 1),
(6, 'Release', 1),
(7, 'Maintenance', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_backlog`
--

CREATE TABLE `jenis_backlog` (
  `id_jenis_backlog` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_sdlc` int(11) NOT NULL,
  `id_versi` int(11) NOT NULL,
  `nama_jenis_backlog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_backlog`
--

INSERT INTO `jenis_backlog` (`id_jenis_backlog`, `id_project`, `id_sdlc`, `id_versi`, `nama_jenis_backlog`) VALUES
(4, 48, 3, 13, 'coba'),
(5, 48, 3, 13, 'lagi'),
(6, 48, 3, 13, 'sfsf'),
(8, 48, 3, 13, 'apa'),
(12, 55, 3, 20, 'ada'),
(16, 48, 3, 13, 'dsds'),
(17, 58, 3, 23, 'undefined'),
(22, 50, 3, 24, 'ada'),
(23, 50, 3, 24, 'ada'),
(24, 55, 3, 20, 'uuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_project`
--

CREATE TABLE `member_project` (
  `id_member` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member_project`
--

INSERT INTO `member_project` (`id_member`, `id_project`, `id_user`, `id_role_project`) VALUES
(6, 30, 1, 1),
(15, 30, 9, 2),
(17, 30, 3, 4),
(21, 12, 9, 1),
(23, 46, 1, 2),
(24, 46, 9, 3),
(26, 12, 1, 2),
(27, 48, 9, 2),
(28, 48, 1, 1),
(31, 50, 1, 2),
(32, 51, 1, 2),
(33, 52, 9, 2),
(34, 53, 9, 2),
(35, 54, 9, 2),
(36, 52, 1, 1),
(37, 51, 9, 3),
(38, 50, 9, 3),
(39, 55, 1, 2),
(40, 55, 9, 3),
(41, 56, 9, 2),
(42, 57, 9, 2),
(43, 58, 9, 2),
(44, 59, 9, 2),
(45, 60, 1, 2),
(46, 61, 1, 2),
(47, 61, 9, 4),
(48, 58, 1, 3),
(49, 62, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `nama_project` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sdlc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_project`, `nama_project`, `id_user`, `id_sdlc`) VALUES
(12, 'coba1', 3, 1),
(13, 'coba 2', 3, 1),
(14, 'coba 2', 3, 1),
(28, 'Amin Rois', 2, 1),
(29, 'coba', 8, 1),
(30, 'coba', 9, 1),
(31, 'artef', 16, 1),
(32, 'ketiga', 16, 3),
(42, 'percobaan', 3, 1),
(43, 'percobaan', 3, 3),
(46, 'ayo', 1, 1),
(48, 'mana lagi', 9, 3),
(50, 'mana mana', 1, 3),
(51, 'coba lagi', 1, 1),
(52, 'percobaan', 9, 1),
(53, 'VSM', 9, 1),
(54, 'Lagi', 9, 1),
(55, 'cobacoba2', 1, 3),
(56, 'coba1', 9, 1),
(57, 'coba2', 9, 1),
(58, 'coba3', 9, 3),
(59, 'coba4', 9, 3),
(60, 'mana lagi 3', 1, 1),
(61, 'bersama', 1, 1),
(62, 'mana lagi 3', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_project`
--

CREATE TABLE `role_project` (
  `id_role_project` int(11) NOT NULL,
  `nama_role_project` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_project`
--

INSERT INTO `role_project` (`id_role_project`, `nama_role_project`) VALUES
(1, 'Analis'),
(2, 'Admin'),
(3, 'Programmer'),
(4, 'Tester');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sdlc`
--

CREATE TABLE `sdlc` (
  `id_sdlc` int(11) NOT NULL,
  `nama_sdlc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sdlc`
--

INSERT INTO `sdlc` (`id_sdlc`, `nama_sdlc`) VALUES
(1, 'Waterfall'),
(3, 'Scrum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `password_user`, `nama_user`) VALUES
(1, 'aminrois@gmail.com', '1234', 'aminrois'),
(2, 'amin12@gmail.com', '123', 'rois'),
(3, 'amin123@gmail.com', '123', 'amin123'),
(4, 'amin212@gmail.com', '123', 'amin'),
(5, 'coba@gmail.com', '123', 'coba 5'),
(6, 'kocak@gmail.com', '123', 'kocak'),
(7, 'kocak2', '123', 'kocak2'),
(8, 'roisamin@gmail.com', '123', 'Rois Amin'),
(9, 'aminrois6@gmail.com', '12345', 'AMIN ROIS'),
(10, 'rois123@gmail.com', '123', 'rois'),
(11, 'coba2@gmail.com', '123', 'coba'),
(12, 'cobacoba2@gmail.com', '123', 'cobacoba2'),
(13, 'coba3@gmail.com', '123', 'cobacoba3'),
(14, 'ketiga@gmail.com', '123', 'ketiga'),
(15, 'cobalah@gmail.com', '123', 'cobalah'),
(16, 'aminrois265@gmail.com', '123', 'Rois Amin'),
(17, 'ahmadiaziz312@gmail.com', '123', 'AminR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `versi`
--

CREATE TABLE `versi` (
  `id_versi` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `major` varchar(11) NOT NULL,
  `minor` varchar(11) NOT NULL,
  `patch` varchar(11) NOT NULL,
  `fase_release` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `versi`
--

INSERT INTO `versi` (`id_versi`, `id_project`, `major`, `minor`, `patch`, `fase_release`) VALUES
(3, 46, '1', '2', '0', '2022-08-05'),
(8, 12, '1', '0', '0', '2022-08-05'),
(9, 30, '1', '0', '0', '2022-08-05'),
(11, 46, '1', '2', '3', '2022-08-05'),
(13, 48, '1', '0', '0', '2022-08-05'),
(20, 55, '1', '2', '0', '2022-08-07'),
(21, 61, '1', '0', '0', '2022-08-07'),
(22, 52, '1', '0', '0', '2022-08-08'),
(23, 58, '1', '1', '1', '2022-08-08'),
(24, 50, '1', '0', '0', '2022-08-08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_role_project` (`id_role_project`) USING BTREE;

--
-- Indeks untuk tabel `artefak_project`
--
ALTER TABLE `artefak_project`
  ADD PRIMARY KEY (`id_artefak`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_versi` (`id_versi`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `backlog`
--
ALTER TABLE `backlog`
  ADD PRIMARY KEY (`id_backlog`),
  ADD KEY `id_jenis_backlog` (`id_jenis_backlog`);

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_artefak` (`id_artefak`);

--
-- Indeks untuk tabel `berkas_backlog`
--
ALTER TABLE `berkas_backlog`
  ADD PRIMARY KEY (`id_berkas_backlog`),
  ADD KEY `id_backlog` (`id_backlog`);

--
-- Indeks untuk tabel `index`
--
ALTER TABLE `index`
  ADD PRIMARY KEY (`id_index`),
  ADD KEY `id_berkas` (`id_berkas`) USING BTREE;

--
-- Indeks untuk tabel `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id_invite`),
  ADD KEY `id_user1` (`id_user1`),
  ADD KEY `id_user2` (`id_user2`),
  ADD KEY `id_project` (`id_project`);

--
-- Indeks untuk tabel `jenis_artefak`
--
ALTER TABLE `jenis_artefak`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `id_sdlc` (`id_sdlc`);

--
-- Indeks untuk tabel `jenis_backlog`
--
ALTER TABLE `jenis_backlog`
  ADD PRIMARY KEY (`id_jenis_backlog`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_sdlc` (`id_sdlc`),
  ADD KEY `id_versi` (`id_versi`);

--
-- Indeks untuk tabel `member_project`
--
ALTER TABLE `member_project`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role_project` (`id_role_project`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sdlc` (`id_sdlc`);

--
-- Indeks untuk tabel `role_project`
--
ALTER TABLE `role_project`
  ADD PRIMARY KEY (`id_role_project`);

--
-- Indeks untuk tabel `sdlc`
--
ALTER TABLE `sdlc`
  ADD PRIMARY KEY (`id_sdlc`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `versi`
--
ALTER TABLE `versi`
  ADD PRIMARY KEY (`id_versi`),
  ADD KEY `id_project` (`id_project`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `artefak_project`
--
ALTER TABLE `artefak_project`
  MODIFY `id_artefak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `backlog`
--
ALTER TABLE `backlog`
  MODIFY `id_backlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `berkas_backlog`
--
ALTER TABLE `berkas_backlog`
  MODIFY `id_berkas_backlog` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `index`
--
ALTER TABLE `index`
  MODIFY `id_index` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invite`
--
ALTER TABLE `invite`
  MODIFY `id_invite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_artefak`
--
ALTER TABLE `jenis_artefak`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_backlog`
--
ALTER TABLE `jenis_backlog`
  MODIFY `id_jenis_backlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `member_project`
--
ALTER TABLE `member_project`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `role_project`
--
ALTER TABLE `role_project`
  MODIFY `id_role_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sdlc`
--
ALTER TABLE `sdlc`
  MODIFY `id_sdlc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `versi`
--
ALTER TABLE `versi`
  MODIFY `id_versi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD CONSTRAINT `akses_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_artefak` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akses_ibfk_2` FOREIGN KEY (`id_role_project`) REFERENCES `role_project` (`id_role_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `artefak_project`
--
ALTER TABLE `artefak_project`
  ADD CONSTRAINT `artefak_project_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_artefak` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artefak_project_ibfk_2` FOREIGN KEY (`id_versi`) REFERENCES `versi` (`id_versi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artefak_project_ibfk_3` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `backlog`
--
ALTER TABLE `backlog`
  ADD CONSTRAINT `backlog_ibfk_1` FOREIGN KEY (`id_jenis_backlog`) REFERENCES `jenis_backlog` (`id_jenis_backlog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`id_artefak`) REFERENCES `artefak_project` (`id_artefak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berkas_backlog`
--
ALTER TABLE `berkas_backlog`
  ADD CONSTRAINT `berkas_backlog_ibfk_1` FOREIGN KEY (`id_backlog`) REFERENCES `backlog` (`id_backlog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `index`
--
ALTER TABLE `index`
  ADD CONSTRAINT `index_ibfk_1` FOREIGN KEY (`id_berkas`) REFERENCES `berkas` (`id_berkas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invite_ibfk_2` FOREIGN KEY (`id_user1`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invite_ibfk_3` FOREIGN KEY (`id_user2`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_artefak`
--
ALTER TABLE `jenis_artefak`
  ADD CONSTRAINT `jenis_artefak_ibfk_1` FOREIGN KEY (`id_sdlc`) REFERENCES `sdlc` (`id_sdlc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_backlog`
--
ALTER TABLE `jenis_backlog`
  ADD CONSTRAINT `jenis_backlog_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jenis_backlog_ibfk_2` FOREIGN KEY (`id_sdlc`) REFERENCES `sdlc` (`id_sdlc`),
  ADD CONSTRAINT `jenis_backlog_ibfk_3` FOREIGN KEY (`id_versi`) REFERENCES `versi` (`id_versi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member_project`
--
ALTER TABLE `member_project`
  ADD CONSTRAINT `member_project_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_project_ibfk_2` FOREIGN KEY (`id_role_project`) REFERENCES `role_project` (`id_role_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_project_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`id_sdlc`) REFERENCES `sdlc` (`id_sdlc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `versi`
--
ALTER TABLE `versi`
  ADD CONSTRAINT `versi_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
