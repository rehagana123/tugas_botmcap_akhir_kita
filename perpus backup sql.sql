-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 08:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `jenis_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul_buku`, `jenis_buku`, `pengarang`, `penerbit`, `tahun`, `jumlah_buku`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'AP_38726k', 'Metamoforsis', 'IPA', 'Ibnu Sahida', 'PT Gerhana', 2019, 9, 4, '2023-04-27 22:49:32', '2023-04-29 00:27:04'),
(3, 'B_2872h', 'Perkalian', 'Matematika Dasar', 'Ratna', 'PT KARMA', 2018, 31, 3, '2023-04-29 00:00:48', '2023-04-29 00:27:08'),
(4, 'P_0287IIU', 'Legenda Satria', 'Cerita Rakyat', 'Sangklesa', 'PT ABADI GT', 2020, 1, 5, '2023-04-29 00:23:56', '2023-04-29 00:23:56'),
(5, 'FH_82672', 'Kimia', 'Kimia', 'Johin & Peter', 'PT RAHASA', 2021, 1, 4, '2023-04-29 00:24:58', '2023-04-29 00:27:11'),
(6, 'PH_0287', 'cerita seram', 'CRA', 'Ahmad', 'PT ROZI', 2023, 4, 7, '2023-04-29 00:43:50', '2023-04-29 00:43:50'),
(7, 'KC_028', 'Si Kancil Mantap', 'Cerita', 'POLO', 'PT START', 2022, 13, 6, '2023-04-29 00:44:24', '2023-04-29 00:44:24'),
(8, 'PK_10826', 'PPKN', 'PANCASILA', 'SUJOKI', 'PT ARAME', 2001, 15, 8, '2023-04-29 00:48:03', '2023-04-29 00:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa', '2023-04-27 22:46:15', '2023-04-27 22:46:15'),
(3, 'Matematika', '2023-04-27 22:48:41', '2023-04-27 22:48:41'),
(4, 'Ilmu Pengetahuan Alam', '2023-04-27 22:48:52', '2023-04-27 22:48:52'),
(5, 'Cerita Rakyat', '2023-04-29 00:01:25', '2023-04-29 00:01:25'),
(6, 'Fiksi', '2023-04-29 00:43:01', '2023-04-29 00:43:01'),
(7, 'Donggeng', '2023-04-29 00:43:05', '2023-04-29 00:43:05'),
(8, 'PENDIDIKAN PANCASILA', '2023-04-29 00:47:27', '2023-04-29 00:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_14_141745_create_role_table', 1),
(6, '2022_12_14_142303_create_category_table', 1),
(7, '2022_12_14_142656_create_profile_table', 1),
(8, '2022_12_14_143227_create_buku_table', 1),
(9, '2022_12_14_143523_create_pinjam_table', 1),
(10, '2022_12_16_052813_alter_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pinjam` varchar(255) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `denda` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id`, `kode_pinjam`, `tanggal_pinjam`, `tanggal_kembali`, `denda`, `users_id`, `buku_id`, `created_at`, `updated_at`) VALUES
(2, 'PJ-AP_38726k-372', '2023-04-29 14:12:49', '2023-05-06 14:12:49', 0, 2, 2, '2023-04-29 00:12:49', '2023-05-03 05:16:30'),
(3, 'PJ-B_2872h-946', '2023-04-29 14:12:55', '2023-05-06 14:12:55', 0, 2, 3, '2023-04-29 00:12:55', '2023-05-03 05:16:30'),
(5, 'PJ-AP_38726k-781', '2023-04-29 14:27:04', '2023-05-06 14:27:04', 0, 3, 2, '2023-04-29 00:27:04', '2023-05-03 05:16:30'),
(6, 'PJ-B_2872h-995', '2023-04-29 14:27:08', '2023-05-06 14:27:08', 0, 3, 3, '2023-04-29 00:27:08', '2023-05-03 05:16:30'),
(7, 'PJ-FH_82672-784', '2023-04-29 14:27:11', '2023-05-06 14:27:11', 0, 3, 5, '2023-04-29 00:27:11', '2023-05-03 05:16:30'),
(8, 'PJ-PK_10826-486', '2023-04-29 14:48:29', '2023-05-06 14:48:29', 0, 2, 8, '2023-04-29 00:48:29', '2023-05-03 05:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `jenis_kelamin`, `alamat`, `nomor_telepon`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'kelompok kami', 'Laki-laki', 'jalan di penjaitan', '8427215757', 1, '2023-04-27 22:22:21', '2023-04-27 22:22:21'),
(2, 'nana nani', 'Perempuan', 'jalan nani', '0813678787', 2, '2023-04-27 23:30:21', '2023-04-27 23:30:21'),
(3, 'rehagana sinulingga', 'Laki-laki', 'jalan pembanggunan', '81536182634', 3, '2023-04-28 23:22:08', '2023-04-28 23:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-04-27 22:20:44', '2023-04-27 22:20:44'),
(2, 'guest', '2023-04-27 22:20:44', '2023-04-27 22:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'kelompok@kami.com', NULL, '$2y$10$6Ub3/6wsYMwT8S/EvjXwR.r7P.Lea6C7o2e/PiL8ciKaBpudVX86K', 1, NULL, '2023-04-27 22:22:21', '2023-04-27 22:22:21'),
(2, 'nana', 'nani@gmail.com', NULL, '$2y$10$PfhU7uP5XuaaTicU75V6CuFB9ywyZZEnrZsMmtO/vXxchVwFvpw6q', 2, NULL, '2023-04-27 23:30:21', '2023-04-27 23:30:21'),
(3, 'rehagana', 'rehaganasinulingga10@gmail.com', NULL, '$2y$10$ngPxfvsfXoIIzvmx8sL49O5mR62kPMjE3OBbDv0q8WfHVoCD4h9aW', 2, NULL, '2023-04-28 23:22:08', '2023-04-28 23:22:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buku_kode_buku_unique` (`kode_buku`),
  ADD KEY `buku_category_id_foreign` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjam_users_id_foreign` (`users_id`),
  ADD KEY `pinjam_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_users_id_foreign` (`users_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `pinjam_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
