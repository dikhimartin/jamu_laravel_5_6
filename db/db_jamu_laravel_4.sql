-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2020 pada 04.43
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
-- Database: `db_jamu_laravel_4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_group_users`
--

CREATE TABLE `ek_group_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Y = aktif, N= Tidak Aktif ',
  `additional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(16, '2019_07_04_044417_create_divisis_table', 3),
(17, '2020_03_09_003544_create_group_users_table', 4);

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
(9, 'group_user-list', 'Group List', 'Group List', 5, '2019-07-03 21:39:00', '2019-07-03 21:39:01'),
(10, 'group_user-create', 'Group Create', 'Group Create', 5, '2019-07-03 21:39:22', '2019-07-03 21:39:23'),
(11, 'group_user-edit', 'Group Edit', 'Group Edit', 5, '2019-07-03 21:39:42', '2019-07-03 21:39:43'),
(12, 'group_user-delete', 'Group Delete', 'Group Delete', 5, '2019-07-03 21:40:00', '2019-07-03 21:40:01');

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
(5, 1),
(1, 1),
(9, 1),
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
(5, 2),
(1, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_roles`
--

CREATE TABLE `ek_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `additional` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_roles`
--

INSERT INTO `ek_roles` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`, `additional`) VALUES
(1, 'Member Of Division', 'Sales', 'Sales', 'Y', '2017-06-21 01:58:15', '2020-03-20 03:38:13', ''),
(2, 'Head of Division', 'Admin', 'Admin', 'Y', '2018-07-13 06:31:05', '2019-07-03 13:40:58', ''),
(3, 'Super Admin', 'Super Admin', 'Super Admin', 'Y', '2019-01-18 03:27:27', '2020-03-20 03:37:56', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ek_role_user`
--

CREATE TABLE `ek_role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` char(10) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ek_role_user`
--

INSERT INTO `ek_role_user` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'K00001', NULL, NULL),
(2, 'K00002', '2019-07-03 13:41:42', '2019-07-03 13:41:42'),
(1, 'K00003', '2019-07-03 13:42:05', '2019-07-03 13:42:05');

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
('K00001', 'superadmin', 'Super Admin', '$2y$10$beG1x0J/8Gk9DvgvHO579.az8lhIJj02fHR/w4nsXQyx8u83mg/im', 'dikhimartin@gmail.com', '081748334809sas', '2019-02-16', 'Bd. Silvy Kusmiran Jl. Lama Citarik No. 185 Rt. 0101 Ds. Jatireja1aa', 'L', 3, '', 'VUUxjwJ8GJcEllYFo49KDTpWOLAnRuhOTT0Wh08yX9ouiuppNhFCn6TkOOUJ', 'K00001', 'K00001', '2019-01-07 16:33:38', '2020-03-20 05:04:29', 'Y', NULL),
('K00002', 'admin', 'Admin', '$2y$10$i6m3f/s1m8syXrub.nTamepK/UsHVCiej3jUwUZvzDLjAYezFRLwS', 'dikhi.martin@gmail.com', '085693086800', '2019-07-03', 'Ciketing Udik Rt.002/003, Bantargebang', 'P', 2, NULL, 'usFZhLNJcm2aanXVPWgGPBpEhbA09LP4w24Vz0GdJxdTD25LH6jh7URjHTdI', 'K00001', 'K00001', '2019-07-03 20:41:42', '2019-07-05 15:12:55', 'Y', NULL),
('K00003', 'user', 'User', '$2y$10$IGXwb2SORE8Uyh6GpXguyOZNR5EW4V9hmI5sJPIlRTfQNpqfDd.Ey', 'dikhi.martin@gmail.com', '085219378505', '2019-07-03', 'Bd. Silvy Kusmiran Jl. Lama Citarik No. 185 Rt. 0101 Ds. Jatireja', 'L', 1, NULL, 'N0g2T14tf1tZs7yh4kjObFSS5a1vX5yeNBdonyQSmSYfq7WYtN1ReZybyy57', 'K00001', 'K00001', '2019-07-03 20:42:05', '2020-03-20 05:06:32', 'Y', NULL);

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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ek_group_users`
--
ALTER TABLE `ek_group_users`
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
-- Indeks untuk tabel `ek_permission_role`
--
ALTER TABLE `ek_permission_role`
  ADD KEY `FK_ek_permission_role_ek_roles` (`role_id`);

--
-- Indeks untuk tabel `ek_roles`
--
ALTER TABLE `ek_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ek_role_user`
--
ALTER TABLE `ek_role_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_ek_role_user_ek_roles` (`role_id`);

--
-- Indeks untuk tabel `ek_users`
--
ALTER TABLE `ek_users`
  ADD PRIMARY KEY (`id_users`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ek_group_users`
--
ALTER TABLE `ek_group_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ek_migrations`
--
ALTER TABLE `ek_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ek_permission_role`
--
ALTER TABLE `ek_permission_role`
  ADD CONSTRAINT `FK_ek_permission_role_ek_roles` FOREIGN KEY (`role_id`) REFERENCES `ek_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ek_role_user`
--
ALTER TABLE `ek_role_user`
  ADD CONSTRAINT `FK_ek_role_user_ek_roles` FOREIGN KEY (`role_id`) REFERENCES `ek_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users join roles_user` FOREIGN KEY (`user_id`) REFERENCES `ek_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
