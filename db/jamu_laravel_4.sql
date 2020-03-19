-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2019 pada 11.43
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_master_dokumen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_divisis`
--

CREATE TABLE `ek_divisis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Y = aktif, N= Tidak Aktif ',
  `additional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ek_divisis`
--

INSERT INTO `ek_divisis` (`id`, `nama_divisi`, `deskripsi`, `status`, `additional`, `created_at`, `updated_at`) VALUES
(19, 'Finance', 'Finance', 'Y', NULL, '2019-07-05 09:16:43', '2019-07-05 09:16:43'),
(20, 'Programmer', 'Programmer', 'N', NULL, '2019-07-05 09:16:51', '2019-07-05 09:21:26'),
(21, 'Admin', 'Admin', 'Y', NULL, '2019-07-05 09:21:32', '2019-07-05 09:21:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_document_types`
--

CREATE TABLE `ek_document_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_master_tipe_dokumen` int(11) NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Y = aktif, N= Tidak Aktif ',
  `additional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ek_document_types`
--

INSERT INTO `ek_document_types` (`id`, `id_master_tipe_dokumen`, `status`, `additional`, `created_at`, `updated_at`) VALUES
(68, 3, 'Y', NULL, '2019-07-05 09:29:09', '2019-07-05 09:35:31'),
(69, 4, 'Y', NULL, '2019-07-05 09:29:09', '2019-07-05 09:31:03'),
(70, 5, 'N', NULL, '2019-07-05 09:29:09', '2019-07-05 09:32:03'),
(71, 7, 'Y', NULL, '2019-07-05 09:29:09', '2019-07-05 09:29:27'),
(72, 8, 'Y', NULL, '2019-07-05 09:29:09', '2019-07-05 09:29:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_master_tipe_dokumen`
--

CREATE TABLE `ek_master_tipe_dokumen` (
  `id` int(11) DEFAULT NULL,
  `tipe_dokumen` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `additional` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ek_master_tipe_dokumen`
--

INSERT INTO `ek_master_tipe_dokumen` (`id`, `tipe_dokumen`, `keterangan`, `additional`) VALUES
(1, 'doc', 'Microsoft Word 97 - 2003 Document', NULL),
(2, 'docx', 'Microsoft Word Document', NULL),
(3, 'xls', 'Microsoft Excel 97 - 2003 Worksheet', NULL),
(4, 'xlsx', 'Microsoft Excel Worksheet', NULL),
(5, 'ppt', 'Microsoft PowerPoint 97 - 2003 Presentation', NULL),
(6, 'pptx', 'Microsoft PowerPoint Presentation', NULL),
(7, 'pdf', 'Portable Document Format', NULL),
(8, 'psd', 'Photoshop Document', NULL),
(9, 'rar', 'RAR Archive', NULL),
(10, 'zip', 'ZIP Archive', NULL),
(11, 'jpeg', 'Joint Photographic Experts Group', NULL),
(12, 'jpg', 'Joint Photographic Group', NULL),
(13, 'png', 'Portable Network Graphics', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_migrations`
--

CREATE TABLE `ek_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ek_migrations`
--

INSERT INTO `ek_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_24_215309_create_setting_divisions_table', 1),
(2, '2019_01_24_215331_create_setting_positions_table', 1),
(3, '2019_01_24_222445_create_setting_roles_divisions_table', 2),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(13, '2016_06_01_000004_create_oauth_clients_table', 3),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(15, '2019_07_03_234500_create_document_types_table', 3),
(16, '2019_07_04_044417_create_divisis_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_oauth_access_tokens`
--

CREATE TABLE `ek_oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_oauth_auth_codes`
--

CREATE TABLE `ek_oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_oauth_clients`
--

CREATE TABLE `ek_oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_oauth_personal_access_clients`
--

CREATE TABLE `ek_oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_oauth_refresh_tokens`
--

CREATE TABLE `ek_oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_password_resets`
--

CREATE TABLE `ek_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_password_resets`
--

INSERT INTO `ek_password_resets` (`email`, `token`, `created_at`) VALUES
('dikhimartin@gmail.com', '$2y$10$Ando8DIReXy1fFxiUCLnb.BY2yfIaOkC9q8UlzYchIDa8aK3NuDJi', '2019-02-17 03:27:44'),
('dikhhyymartieenzblogger@gmail.com', '$2y$10$53KvVeKK225vlPQVWGTKjuvtLvBUUAd.8NFjZoQrQUjLEqoyqQkPi', '2019-02-17 03:49:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_permissions`
--

CREATE TABLE `ek_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_permissions`
--

INSERT INTO `ek_permissions` (`id`, `name`, `display_name`, `description`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'Role List', 'Role List', 2, '2017-06-21 07:24:23', '2017-06-21 07:24:23'),
(2, 'role-create', 'Role Add', 'Role Add', 2, '2017-06-21 07:24:23', '2017-06-21 07:24:23'),
(3, 'role-edit', 'Role Edit', 'Role Edit', 2, '2017-06-21 07:24:23', '2017-06-21 07:24:23'),
(4, 'role-delete', 'Role Delete', 'Role Delete', 2, '2017-06-21 07:24:23', '2017-06-21 07:24:23'),
(5, 'users-list', 'Users List', 'users list', 1, '2017-06-22 00:00:00', '2017-06-22 00:00:00'),
(6, 'users-create', 'Users Create', 'users create', 1, '2017-06-22 00:00:00', '2017-06-22 00:00:00'),
(7, 'users-edit', 'Users Edit', 'users edit', 1, '2017-06-22 00:00:00', '2017-06-22 00:00:00'),
(8, 'users-delete', 'Users Delete', 'users delete', 1, '2017-06-22 00:00:00', '2017-06-22 00:00:00'),
(9, 'master-document-list', 'Master Document List', 'Master Document List', 3, '2019-07-03 13:57:27', '2019-07-03 13:57:29'),
(10, 'master-document-create', 'Master Document Create', 'Master Document Create', 3, '2019-07-03 13:58:14', '2019-07-03 13:58:15'),
(11, 'master-document-edit', 'Master Document Edit', 'Master Document Edit', 3, '2019-07-03 13:59:09', '2019-07-03 13:59:10'),
(12, 'master-document-delete', 'Master Document Delete', 'Master Document Delete', 3, '2019-07-03 13:59:34', '2019-07-03 13:59:35'),
(13, 'master-document-upload', 'Master Document Upload', 'Master Document Upload', 3, '2019-07-03 14:17:46', '2019-07-03 14:17:47'),
(14, 'master-document-download', 'Master Document Download', 'Master Document Download', 3, '2019-07-03 14:18:11', '2019-07-03 14:18:12'),
(15, 'document-types-list', 'Document Type List', 'Document Type List', 4, '2019-07-03 16:36:21', '2019-07-03 16:36:22'),
(16, 'document-types-create', 'Document Type Create', 'Document Type Create', 4, '2019-07-03 16:36:44', '2019-07-03 16:36:45'),
(17, 'document-types-edit', 'Document Type Edit', 'Document Type Edit', 4, '2019-07-03 16:37:06', '2019-07-03 16:37:07'),
(18, 'document-types-delete', 'Document Type Delete', 'Document Type Delete', 4, '2019-07-03 16:37:51', '2019-07-03 16:37:52'),
(19, 'divisi-list', 'Divisi List', 'Divisi List', 5, '2019-07-03 21:39:00', '2019-07-03 21:39:01'),
(20, 'divisi-create', 'Divisi Create', 'Divisi Create', 5, '2019-07-03 21:39:22', '2019-07-03 21:39:23'),
(21, 'divisi-edit', 'Divisi Edit', 'Divisi Edit', 5, '2019-07-03 21:39:42', '2019-07-03 21:39:43'),
(22, 'divisi-delete', 'Divisi Delete', 'Divisi Delete', 5, '2019-07-03 21:40:00', '2019-07-03 21:40:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_permission_role`
--

CREATE TABLE `ek_permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_permission_role`
--

INSERT INTO `ek_permission_role` (`permission_id`, `role_id`) VALUES
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(1, 2),
(2, 2),
(5, 1),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_roles`
--

CREATE TABLE `ek_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_roles`
--

INSERT INTO `ek_roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Member Of Division', 'User', 'User', '2017-06-21 01:58:15', '2019-07-03 13:41:08'),
(2, 'Head of Division', 'Admin', 'Admin', '2018-07-13 06:31:05', '2019-07-03 13:40:58'),
(3, 'Super Admin', 'Super Admin', 'Super Admin', '2019-01-18 03:27:27', '2019-01-18 03:27:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_role_user`
--

CREATE TABLE `ek_role_user` (
  `user_id` char(10) CHARACTER SET latin1 NOT NULL,
  `role_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_role_user`
--

INSERT INTO `ek_role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
('K00001', 3, NULL, NULL),
('K00002', 2, '2019-07-03 13:41:42', '2019-07-03 13:41:42'),
('K00003', 1, '2019-07-03 13:42:05', '2019-07-03 13:42:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_users`
--

CREATE TABLE `ek_users` (
  `id_users` char(10) CHARACTER SET latin1 NOT NULL DEFAULT 'NULL',
  `nik` char(20) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `telephone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('L','P') CHARACTER SET latin1 DEFAULT NULL,
  `id_level_user` int(11) DEFAULT NULL,
  `image` varchar(125) CHARACTER SET latin1 DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `created_by` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `updated_by` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('Y','N') CHARACTER SET latin1 DEFAULT NULL,
  `additional` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_users`
--

INSERT INTO `ek_users` (`id_users`, `nik`, `name`, `password`, `email`, `telephone`, `date_birth`, `address`, `gender`, `id_level_user`, `image`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `additional`) VALUES
('K00001', 'superadmin', 'Super Admin', '$2y$10$1cHRgWWWRW1ZUBrduUGn5eAY9aIVE2f.2//hhGDTvoj7qURDmrKNm', 'dikhimartin@gmail.com', '081748334809', '2019-02-16', 'Bd. Silvy Kusmiran Jl. Lama Citarik No. 185 Rt. 0101 Ds. Jatireja1aa', 'L', 3, '', 'wccbaF6Nk1JpjQOl8fylrF11IClRFYkM48jYOHGBN9ANcxvKEZPIkDxnCZfx', 'K00001', 'K00001', '2019-01-07 16:33:38', '2019-07-03 23:22:54', 'Y', NULL),
('K00002', 'admin', 'Admin', '$2y$10$i6m3f/s1m8syXrub.nTamepK/UsHVCiej3jUwUZvzDLjAYezFRLwS', 'dikhi.martin@gmail.com', '085693086800', '2019-07-03', 'Ciketing Udik Rt.002/003, Bantargebang', 'P', 2, NULL, 'V8DFOUwCdVqRhUjowoGEiONXMRRiok1x9SWJfu4kwBrmKJCclPnuo22Ogfw9', 'K00001', 'K00001', '2019-07-03 20:41:42', '2019-07-05 15:12:55', 'Y', NULL),
('K00003', 'user', 'User', '$2y$10$IGXwb2SORE8Uyh6GpXguyOZNR5EW4V9hmI5sJPIlRTfQNpqfDd.Ey', 'dikhi.martin@gmail.com', '085219378505', '2019-07-03', 'Bd. Silvy Kusmiran Jl. Lama Citarik No. 185 Rt. 0101 Ds. Jatireja', 'L', 1, NULL, 'N0g2T14tf1tZs7yh4kjObFSS5a1vX5yeNBdonyQSmSYfq7WYtN1ReZybyy57', 'K00001', NULL, '2019-07-03 20:42:05', '2019-07-03 20:42:05', 'Y', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `ek_v_get_tipe_document`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `ek_v_get_tipe_document` (
`id` int(10) unsigned
,`id_master_tipe_dokumen` int(11)
,`tipe_dokumen` varchar(50)
,`keterangan` varchar(50)
,`status` enum('Y','N')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(0, '2019_01_11_153834_create_companies_table', 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `ek_v_get_tipe_document`
--
DROP TABLE IF EXISTS `ek_v_get_tipe_document`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ek_v_get_tipe_document`  AS  select `ek_document_types`.`id` AS `id`,`ek_master_tipe_dokumen`.`id` AS `id_master_tipe_dokumen`,`ek_master_tipe_dokumen`.`tipe_dokumen` AS `tipe_dokumen`,`ek_master_tipe_dokumen`.`keterangan` AS `keterangan`,`ek_document_types`.`status` AS `status` from (`ek_document_types` join `ek_master_tipe_dokumen` on((`ek_document_types`.`id_master_tipe_dokumen` = `ek_master_tipe_dokumen`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ek_divisis`
--
ALTER TABLE `ek_divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ek_document_types`
--
ALTER TABLE `ek_document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ek_migrations`
--
ALTER TABLE `ek_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ek_oauth_access_tokens`
--
ALTER TABLE `ek_oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `ek_oauth_auth_codes`
--
ALTER TABLE `ek_oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ek_oauth_clients`
--
ALTER TABLE `ek_oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `ek_oauth_personal_access_clients`
--
ALTER TABLE `ek_oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `ek_oauth_refresh_tokens`
--
ALTER TABLE `ek_oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `ek_password_resets`
--
ALTER TABLE `ek_password_resets`
  ADD KEY `ek_password_resets_email_index` (`email`) USING BTREE;

--
-- Indeks untuk tabel `ek_roles`
--
ALTER TABLE `ek_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ek_role_user`
--
ALTER TABLE `ek_role_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `ek_users`
--
ALTER TABLE `ek_users`
  ADD PRIMARY KEY (`id_users`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ek_divisis`
--
ALTER TABLE `ek_divisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `ek_document_types`
--
ALTER TABLE `ek_document_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `ek_migrations`
--
ALTER TABLE `ek_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ek_oauth_clients`
--
ALTER TABLE `ek_oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ek_oauth_personal_access_clients`
--
ALTER TABLE `ek_oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ek_roles`
--
ALTER TABLE `ek_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ek_role_user`
--
ALTER TABLE `ek_role_user`
  ADD CONSTRAINT `users join roles_user` FOREIGN KEY (`user_id`) REFERENCES `ek_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
