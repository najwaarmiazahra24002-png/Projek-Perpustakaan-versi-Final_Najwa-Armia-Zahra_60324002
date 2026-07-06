-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2026 at 02:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_anggota` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_daftar` date NOT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `kode_anggota`, `nama`, `email`, `telepon`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `tanggal_daftar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AGT-001', 'Budi Santoso', 'budi.santoso@email.com', '081234567890', 'Jl. Merdeka No. 10, Jakarta Pusat', '1995-05-15', 'Laki-laki', 'Mahasiswa', '2026-05-10', 'Aktif', '2026-05-24 16:05:50', '2026-05-24 16:05:50'),
(2, 'AGT-002', 'Siti Nurhaliza', 'siti.nur@email.com', '081234567891', 'Jl. Sudirman No. 25, Bandung', '1998-08-20', 'Perempuan', 'Pegawai Swasta', '2024-01-15', 'Aktif', '2026-05-24 16:05:50', '2026-05-24 16:05:50'),
(3, 'AGT-003', 'Ahmad Dhani', 'ahmad.dhani@email.com', '081234567892', 'Jl. Gatot Subroto No. 5, Surabaya', '1992-03-10', 'Laki-laki', 'Dosen', '2024-02-01', 'Aktif', '2026-05-24 16:05:50', '2026-05-24 16:05:50'),
(4, 'AGT-004', 'Dewi Lestari', 'dewi.lestari@email.com', '081234567893', 'Jl. Ahmad Yani No. 30, Yogyakarta', '2000-12-05', 'Perempuan', 'Mahasiswa', '2024-02-10', 'Aktif', '2026-05-24 16:05:50', '2026-05-24 16:05:50'),
(5, 'AGT-005', 'Rizky Febian', 'rizky.feb@email.com', '081234567894', 'Jl. Diponegoro No. 15, Semarang', '1997-07-18', 'Laki-laki', 'Wiraswasta', '2023-12-15', 'Nonaktif', '2026-05-24 16:05:50', '2026-05-24 16:05:50'),
(7, 'AGT-2026-006', 'Najwa Armia Zahra', 'najwaaz15@gmail.com', '081427638794', 'Perum Griya Serasi, Pekuncen, Wiradesa, Kab. Pekalongan', '2000-01-01', 'Perempuan', 'Mahasiswa', '2026-07-06', 'Aktif', '2026-07-06 05:52:18', '2026-07-06 05:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_buku` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('Programming','Database','Web Design','Networking','Data Science') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara_penerbit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_penerbit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` year NOT NULL,
  `isbn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `bahasa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `kategori`, `pengarang`, `penerbit`, `negara_penerbit`, `kota_penerbit`, `tahun_terbit`, `isbn`, `harga`, `stok`, `deskripsi`, `bahasa`, `created_at`, `updated_at`) VALUES
(1, 'BK-001', 'Laravel 12 untuk Pemula', 'Programming', 'John Doe', 'Tech Publisher', NULL, NULL, 2024, '978-602-1234-56-1', '150000.00', 19, 'Buku panduan lengkap Laravel 12 dari dasar hingga mahir', 'Indonesia', '2026-05-24 16:00:54', '2026-07-05 21:07:10'),
(2, 'BK-002', 'MySQL Advanced Techniques', 'Database', 'Jane Smith', 'Data Press', NULL, NULL, 2023, '978-602-1234-56-2', '175000.00', 15, 'Teknik advanced untuk optimasi MySQL database', 'Inggris', '2026-05-24 16:00:54', '2026-05-24 16:00:54'),
(3, 'BK-WEB-001', 'Modern Web Design', 'Web Design', 'Ahmad Yani', 'Creative Media', NULL, NULL, 2024, '978-602-1234-56-3', '120000.00', 20, 'Prinsip dan praktik desain web modern', 'Indonesia', '2026-05-24 16:00:54', '2026-07-06 00:13:03'),
(4, 'BK-004', 'Network Security Fundamentals', 'Networking', 'Robert Johnson', 'Security Press', NULL, NULL, 2023, '978-602-1234-56-4', '200000.00', 10, 'Dasar-dasar keamanan jaringan komputer', 'Inggris', '2026-05-24 16:00:54', '2026-06-30 08:17:04'),
(5, 'BK-005', 'Data Science dengan Python', 'Data Science', 'Siti Nurhaliza', 'Analytics Publisher', NULL, NULL, 2024, '978-602-1234-56-5', '180000.00', 18, 'Panduan praktis data science menggunakan Python', 'Indonesia', '2026-05-24 16:00:54', '2026-06-30 08:47:14'),
(6, 'BK-006', 'PHP 8 Programming', 'Programming', 'Budi Raharjo', 'Code House', NULL, NULL, 2023, '978-602-1234-56-6', '130000.00', 0, 'Fitur-fitur terbaru PHP 8', 'Indonesia', '2026-05-24 16:00:54', '2026-05-24 16:00:54'),
(7, 'BK-007', 'PostgreSQL Administration', 'Database', 'David Wilson', 'Database Pro', NULL, NULL, 2024, '978-602-1234-56-7', '195000.00', 12, 'Administrasi dan optimasi PostgreSQL', 'Inggris', '2026-05-24 16:00:54', '2026-05-24 16:00:54'),
(8, 'BK-008', 'React & Next.js Development', 'Programming', 'Sarah Anderson', 'Frontend Press', NULL, NULL, 2024, '978-602-1234-56-8', '165000.00', 21, 'Membangun aplikasi modern dengan React dan Next.js', 'Inggris', '2026-05-24 16:00:54', '2026-07-05 05:03:49'),
(12, 'BK-WEB-002', 'Desain Web bagi Pemula', 'Web Design', 'Candra Surya dan', 'Elex Media Komputindo', NULL, NULL, 2020, '978-623-00-1634-9', '75000.00', 11, 'Buku ini sangat cocok untuk Anda yang benar-benar baru belajar merancang situs web dari nol, membahas dasar-dasar tampilan serta elemen web.', 'Indonesia', '2026-07-06 01:11:47', '2026-07-06 04:26:07'),
(13, 'BK-DS-001', 'Data Science from Scratch', 'Data Science', 'Joel Grus', 'O\'Reilly Media', NULL, NULL, 2021, '978-1098104030', '350000.00', 3, 'Buku ini sangat cocok untuk pemula yang ingin memahami konsep di balik algoritma data science. Anda akan belajar membangun dan memahami algoritma dari nol menggunakan bahasa Python, bukan hanya sekadar memakai library yang sudah jadi.', 'Inggris', '2026-07-06 04:44:31', '2026-07-06 06:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi`, `icon`, `warna`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'Kategori buku pemrograman', 'code-slash', 'primary', '2026-05-24 16:21:19', '2026-05-24 16:21:19'),
(2, 'Database', 'Kategori buku database', 'database', 'success', '2026-05-24 16:21:19', '2026-05-24 16:21:19'),
(3, 'Web Design', 'Kategori buku desain web', 'palette', 'info', '2026-05-24 16:21:19', '2026-05-24 16:21:19'),
(4, 'Networking', 'Kategori buku jaringan', 'wifi', 'warning', '2026-05-24 16:21:19', '2026-05-24 16:21:19'),
(5, 'Data Science', 'Kategori buku data science', 'graph-up', 'danger', '2026-05-24 16:21:19', '2026-05-24 16:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_19_015327_create_buku_table', 1),
(5, '2026_05_19_020953_create_anggota_table', 1),
(6, '2026_05_24_125440_add_penerbit_detail_to_buku_table', 1),
(7, '2026_05_24_140632_create_kategori_table', 1),
(8, '2026_06_23_025752_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ho5f3KIq2HWhncQgzZM69MEgXCkDNgX7aW8jfosP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid2RjMjUzb1dFT3BMSnpwWG1PVHYzMThVOTFscUg1bXI2OEhRckpobSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1783349284);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_transaksi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota_id` bigint UNSIGNED NOT NULL,
  `buku_id` bigint UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dipinjam',
  `denda` int NOT NULL DEFAULT '0',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `kode_transaksi`, `anggota_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`, `status`, `denda`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'TRX-001', 3, 4, '2026-06-30', '2026-07-07', '2026-06-30', 'Dikembalikan', 0, NULL, '2026-06-30 08:05:20', '2026-06-30 08:17:04'),
(2, 'TRX-002', 1, 5, '2026-06-30', '2026-07-07', '2026-06-30', 'Dikembalikan', 0, NULL, '2026-06-30 08:18:02', '2026-06-30 08:47:14'),
(3, 'TRX-003', 4, 8, '2026-07-05', '2026-07-12', NULL, 'Dipinjam', 0, NULL, '2026-07-05 05:03:49', '2026-07-05 05:03:49'),
(4, 'TRX-004', 3, 3, '2026-07-06', '2026-07-13', NULL, 'Dipinjam', 0, NULL, '2026-07-05 19:42:36', '2026-07-05 19:42:36'),
(5, 'TRX-005', 2, 1, '2026-07-06', '2026-07-13', NULL, 'Dipinjam', 0, NULL, '2026-07-05 21:07:10', '2026-07-05 21:07:10'),
(6, 'TRX-006', 7, 13, '2026-07-06', '2026-07-13', '2026-07-06', 'Dikembalikan', 0, NULL, '2026-07-06 06:40:39', '2026-07-06 06:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Perpustakaan', 'admin@perpustakaan.com', NULL, '$2y$12$Ou/BabXcMyHvRibV/7h5Le8QQgTLdzEkhgus60vMH8H534kFqS5su', NULL, '2026-06-23 08:25:17', '2026-06-23 08:25:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_kode_anggota_unique` (`kode_anggota`),
  ADD UNIQUE KEY `anggota_email_unique` (`email`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buku_kode_buku_unique` (`kode_buku`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `transaksis_anggota_id_foreign` (`anggota_id`),
  ADD KEY `transaksis_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
