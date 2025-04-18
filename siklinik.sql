-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2025 pada 05.56
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
-- Database: `siklinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `pendaftaran_id` int(11) NOT NULL,
  `jenis` enum('baru','kontrol') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `pendaftaran_id`, `jenis`) VALUES
(1, 1, 'kontrol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `satuan` varchar(50) DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `jenis`, `stok`, `satuan`, `harga`) VALUES
(2, 'paracetamol', 'obat keras', 100, '7000', 675000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `wilayah_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `nik`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `wilayah_id`) VALUES
(2, 'Sasa', '32131411', '2025-04-17', 'P', 'eaaa', 2),
(3, 'sisi', '3525669688888', '2009-12-28', 'L', 'kooo', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `jabatan`, `no_hp`, `alamat`) VALUES
(2, 'sasa', '1234567', 'Staff', '0897654321', 'lalalala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `pasien_id`, `tanggal`) VALUES
(1, 3, '2025-04-17 15:26:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id` int(11) NOT NULL,
  `pendaftaran_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `dosis` varchar(50) NOT NULL,
  `aturan_pakai` text NOT NULL,
  `tanggal_resep` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`id`, `pendaftaran_id`, `obat_id`, `dosis`, `aturan_pakai`, `tanggal_resep`) VALUES
(1, 1, 2, '1 tablet', '2x3', '2025-04-17 21:58:53'),
(2, 1, 2, '2', '3 x1', '2025-04-17 23:02:17'),
(3, 1, 2, '3 ', '3 x 1', '2025-04-18 08:53:46'),
(4, 1, 2, '3 ', '3 x 1', '2025-04-18 08:55:28'),
(5, 1, 2, '3 ', '3 x 1', '2025-04-18 08:57:26'),
(6, 1, 2, '3 ', '3 x 1', '2025-04-18 09:00:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `pendaftaran_id` int(11) NOT NULL,
  `total_tindakan` decimal(10,2) DEFAULT 0.00,
  `total_obat` decimal(10,2) DEFAULT 0.00,
  `total_tagihan` decimal(10,2) GENERATED ALWAYS AS (`total_tindakan` + `total_obat`) STORED,
  `status_pembayaran` varchar(50) DEFAULT 'belum',
  `tanggal_pembayaran` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `pendaftaran_id`, `total_tindakan`, `total_obat`, `status_pembayaran`, `tanggal_pembayaran`) VALUES
(1, 1, 0.00, 0.00, 'Sudah Lunas', '2025-04-18 04:00:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id`, `nama_tindakan`, `deskripsi`, `harga`) VALUES
(2, 'Periksa darah', 'Darah', 60000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan_medis`
--

CREATE TABLE `tindakan_medis` (
  `id` int(11) NOT NULL,
  `pendaftaran_id` int(11) NOT NULL,
  `tindakan_id` int(11) NOT NULL,
  `tanggal_tindakan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan_medis`
--

INSERT INTO `tindakan_medis` (`id`, `pendaftaran_id`, `tindakan_id`, `tanggal_tindakan`) VALUES
(1, 1, 2, '2025-04-17 21:58:53'),
(2, 1, 2, '2025-04-17 23:02:17'),
(3, 1, 2, '2025-04-18 08:53:46'),
(4, 1, 2, '2025-04-18 08:55:28'),
(5, 1, 2, '2025-04-18 08:57:26'),
(6, 1, 2, '2025-04-18 09:00:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pendaftaran','dokter','kasir') NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `auth_key`, `access_token`) VALUES
(1, 'admin', 'admin123', 'admin', 'test_auth_key', NULL),
(2, 'kasir', 'kasir123', 'kasir', NULL, NULL),
(3, 'pendaftaran', 'pendaftaran123', 'pendaftaran', NULL, NULL),
(4, 'dokter', 'dokter123', 'dokter', NULL, NULL),
(6, 'admin1', 'admin1', 'admin', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('provinsi','kabupaten') NOT NULL,
  `id_induk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `jenis`, `id_induk`) VALUES
(2, 'Bandung', 'kabupaten', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_id` (`pendaftaran_id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wilayah_id` (`wilayah_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id` (`pasien_id`);

--
-- Indeks untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_id` (`pendaftaran_id`),
  ADD KEY `obat_id` (`obat_id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_id` (`pendaftaran_id`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tindakan_medis`
--
ALTER TABLE `tindakan_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_id` (`pendaftaran_id`),
  ADD KEY `tindakan_id` (`tindakan_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_induk` (`id_induk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tindakan_medis`
--
ALTER TABLE `tindakan_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayah` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`);

--
-- Ketidakleluasaan untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_ibfk_1` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_obat_ibfk_2` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `tindakan_medis`
--
ALTER TABLE `tindakan_medis`
  ADD CONSTRAINT `tindakan_medis_ibfk_1` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tindakan_medis_ibfk_2` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD CONSTRAINT `wilayah_ibfk_1` FOREIGN KEY (`id_induk`) REFERENCES `wilayah` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
