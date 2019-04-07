-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bimbel.chapters
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `guruid` tinyint(4) NOT NULL,
  `materialid` tinyint(4) NOT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bimbel.chapters: ~9 rows (approximately)
/*!40000 ALTER TABLE `chapters` DISABLE KEYS */;
/*!40000 ALTER TABLE `chapters` ENABLE KEYS */;

-- Dumping structure for table bimbel.materials
CREATE TABLE IF NOT EXISTS `materials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subjectid` tinyint(4) NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bimbel.materials: ~2 rows (approximately)
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` (`id`, `subjectid`, `material`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Lingkaran', NULL, NULL),
	(2, 1, 'Bangun Datar', NULL, NULL),
	(3, 1, 'Bangun Ruang', NULL, NULL);
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;

-- Dumping structure for table bimbel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bimbel.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2019_03_25_164757_create_users_table', 1),
	(14, '2019_03_25_165437_create_subjects_table', 1),
	(15, '2019_03_25_165655_create_materials_table', 1),
	(16, '2019_03_26_143443_create_chapters_table', 1),
	(17, '2019_03_26_171839_add_field_to_table_users', 2),
	(18, '2019_03_26_172036_add_field_to_table_users', 3),
	(19, '2019_03_26_172729_add_field_to_table_users', 4),
	(20, '2019_03_28_153112_add_status_users', 5),
	(21, '2019_03_30_054250_add_id_guru_table_chapter', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bimbel.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bimbel.subjects: ~0 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `subject`, `created_at`, `updated_at`) VALUES
	(1, 'Matematika', NULL, NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table bimbel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_user` tinyint(4) NOT NULL,
  `nama_lengkap` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bimbel.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `jenis_user`, `nama_lengkap`, `alamat`, `email`, `no_hp`, `status`, `username`, `password`, `created_at`, `updated_at`) VALUES
	(8, 0, 'Admin', 'qFhEptPPdijhSrGhSpuB', 'HybnIzmMjv@gmail.com', '081212121212', 1, 'admin', '$2y$10$BEwyf4epkDZorHWZBAAI4.c4u61tDaCrs0T/YoHDbIzRN5tyLP2da', NULL, NULL),
	(9, 1, 'Guru 1', 'u8Omz1ZYswNaus1k7QN6', 'Cdb0aE7bcv@gmail.com', '081212121212', 1, 'guru1', '$2y$10$n8gTz4F0REa5bkFrsOb9S.EhqlwsR8jBNdDi1KOau8rmvU.Nh2wf.', NULL, '2019-03-28 23:33:56'),
	(10, 1, 'Guru 2', 'MYwy2cLMuMpV5BkdLCPM', 'LG05ggWudr@gmail.com', '081212121212', 1, 'guru2', '$2y$10$rMEsFri4d2YMgvqTniQTo.MfdUXfiLrzNhm4D9iNQ0DFtn7lfk2MO', NULL, '2019-03-28 23:43:16'),
	(11, 2, 'Siswa 1', 'ETnHfanHCnuik8fM859a', '1DNymFsMau@gmail.com', '081212121212', 0, 'siswa1', '$2y$10$5YW39W4WSzo1p7Z7Brg6SuOr0IdqQIxKgj7gyYGV1o31FFtYj5Vx2', NULL, NULL),
	(12, 2, 'Siswa 2', 'tUeLn8gCjlgk1VR61siD', 'ehUFyx5uJw@gmail.com', '081212121212', 0, 'siswa2', '$2y$10$TNXBiL9BukXPP4U4EJLxpOYtOKPn4ed0TPRC9z2phaJhalm/2k8du', NULL, NULL),
	(13, 2, 'Siswa 3', 'UBU0xnIEVT2Gk12Lcjhy', '0E0Mgaozh0@gmail.com', '081212121212', 0, 'siswa3', '$2y$10$yMKxvYugqsZTYc3meYuPbuxaH5frk7mRH4n5yKQtOLaKE5ZP0kNgW', NULL, NULL),
	(14, 2, 'Siswa 4', 'swgfnTU6Ep6I3xE2o96f', '43g7mvUq6V@gmail.com', '081212121212', 0, 'siswa4', '$2y$10$qEf7B4gqbVP5jWV3orUCfeJco8ySVzcFJH8cgXB9UN9Vuf1PW7TQi', NULL, NULL),
	(15, 2, 'Siswa Tambahan', 'tes alamat', 'tes@gmail.com', '0856237237237', 0, 'siswa_tambah', 'tes', '2019-03-29 00:15:45', '2019-03-29 00:15:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
