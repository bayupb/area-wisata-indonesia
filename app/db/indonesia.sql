-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for indonesia
CREATE DATABASE IF NOT EXISTS `indonesia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `indonesia`;

-- Dumping structure for table indonesia.budaya
CREATE TABLE IF NOT EXISTS `budaya` (
  `budaya_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_budaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kawasan_id` bigint(20) unsigned NOT NULL,
  `provinsi_id` bigint(20) unsigned NOT NULL,
  `kabupaten_id` bigint(20) unsigned NOT NULL,
  `daerah_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`budaya_id`),
  KEY `budaya_kawasan_id_foreign` (`kawasan_id`),
  KEY `budaya_provinsi_id_foreign` (`provinsi_id`),
  KEY `budaya_kabupaten_id_foreign` (`kabupaten_id`),
  KEY `budaya_daerah_id_foreign` (`daerah_id`),
  CONSTRAINT `budaya_daerah_id_foreign` FOREIGN KEY (`daerah_id`) REFERENCES `daerah` (`daerah_id`) ON DELETE CASCADE,
  CONSTRAINT `budaya_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`kabupaten_id`) ON DELETE CASCADE,
  CONSTRAINT `budaya_kawasan_id_foreign` FOREIGN KEY (`kawasan_id`) REFERENCES `kawasan` (`kawasan_id`) ON DELETE CASCADE,
  CONSTRAINT `budaya_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.budaya: ~0 rows (approximately)
DELETE FROM `budaya`;
/*!40000 ALTER TABLE `budaya` DISABLE KEYS */;
/*!40000 ALTER TABLE `budaya` ENABLE KEYS */;

-- Dumping structure for table indonesia.daerah
CREATE TABLE IF NOT EXISTS `daerah` (
  `daerah_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_daerah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kawasan_id` bigint(20) unsigned NOT NULL,
  `provinsi_id` bigint(20) unsigned NOT NULL,
  `kabupaten_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`daerah_id`),
  KEY `daerah_kawasan_id_foreign` (`kawasan_id`),
  KEY `daerah_provinsi_id_foreign` (`provinsi_id`),
  KEY `daerah_kabupaten_id_foreign` (`kabupaten_id`),
  CONSTRAINT `daerah_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`kabupaten_id`) ON DELETE CASCADE,
  CONSTRAINT `daerah_kawasan_id_foreign` FOREIGN KEY (`kawasan_id`) REFERENCES `kawasan` (`kawasan_id`) ON DELETE CASCADE,
  CONSTRAINT `daerah_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.daerah: ~0 rows (approximately)
DELETE FROM `daerah`;
/*!40000 ALTER TABLE `daerah` DISABLE KEYS */;
/*!40000 ALTER TABLE `daerah` ENABLE KEYS */;

-- Dumping structure for table indonesia.kabupaten
CREATE TABLE IF NOT EXISTS `kabupaten` (
  `kabupaten_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kawasan_id` bigint(20) unsigned NOT NULL,
  `provinsi_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`kabupaten_id`),
  KEY `kabupaten_kawasan_id_foreign` (`kawasan_id`),
  KEY `kabupaten_provinsi_id_foreign` (`provinsi_id`),
  CONSTRAINT `kabupaten_kawasan_id_foreign` FOREIGN KEY (`kawasan_id`) REFERENCES `kawasan` (`kawasan_id`) ON DELETE CASCADE,
  CONSTRAINT `kabupaten_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.kabupaten: ~0 rows (approximately)
DELETE FROM `kabupaten`;
/*!40000 ALTER TABLE `kabupaten` DISABLE KEYS */;
/*!40000 ALTER TABLE `kabupaten` ENABLE KEYS */;

-- Dumping structure for table indonesia.kawasan
CREATE TABLE IF NOT EXISTS `kawasan` (
  `kawasan_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_kawasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`kawasan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.kawasan: ~6 rows (approximately)
DELETE FROM `kawasan`;
/*!40000 ALTER TABLE `kawasan` DISABLE KEYS */;
INSERT INTO `kawasan` (`kawasan_id`, `no_kawasan`, `nama`, `slug`) VALUES
	(1, '1571c722-986e-4aa2-bd3b-39aacd31fd32', 'Sumatra', 'sumatra'),
	(2, '48d3a963-2630-4f4a-a90a-8a518699aa60', 'Bali dan Nusa Tenggara', 'bali-dan-nusa-tenggara'),
	(3, 'de9f29de-6352-41ca-bc0b-e29ea5831310', 'Kalimantan', 'kalimantan'),
	(4, 'c98034b9-d3a4-4b54-be82-ec4890cc58d5', 'Jawa', 'jawa'),
	(5, '8ef364c6-0f56-4c47-9ebe-f1efb35dfd3f', 'Sulawesi', 'sulawesi'),
	(6, '06614f80-a020-4698-80fc-4f2762f84319', 'Maluku dan Papua', 'maluku-dan-papua');
/*!40000 ALTER TABLE `kawasan` ENABLE KEYS */;

-- Dumping structure for table indonesia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.migrations: ~7 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2022_06_25_032217_create_kepulauan_table', 1),
	(2, '2022_06_25_032905_create_provinsi_table', 1),
	(3, '2022_06_25_033224_create_kabupaten_table', 1),
	(4, '2022_06_25_033339_create_daerah_table', 1),
	(5, '2022_06_25_033838_create_wisata_table', 1),
	(6, '2022_06_25_033848_create_slider_gambar_wisata_table', 1),
	(7, '2022_06_25_035034_create_budaya_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table indonesia.provinsi
CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kawasan_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`provinsi_id`),
  KEY `provinsi_kawasan_id_foreign` (`kawasan_id`),
  CONSTRAINT `provinsi_kawasan_id_foreign` FOREIGN KEY (`kawasan_id`) REFERENCES `kawasan` (`kawasan_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.provinsi: ~0 rows (approximately)
DELETE FROM `provinsi`;
/*!40000 ALTER TABLE `provinsi` DISABLE KEYS */;
INSERT INTO `provinsi` (`provinsi_id`, `no_provinsi`, `nama`, `slug`, `kawasan_id`) VALUES
	(1, '890d6be5-9f58-490b-afd3-b1538a0ffac3', 'Aceh', 'aceh', 1),
	(2, '612c1111-c6a1-47eb-ba30-a541fc20db41', 'Bali', 'bali', 2),
	(3, 'aa5d01ae-6199-4b76-b0da-92108e8dad99', 'Bangka Belitung', 'bangka-belitung', 1);
/*!40000 ALTER TABLE `provinsi` ENABLE KEYS */;

-- Dumping structure for table indonesia.slider_gambar_wisata
CREATE TABLE IF NOT EXISTS `slider_gambar_wisata` (
  `slider_gambar_wisata_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wisata_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`slider_gambar_wisata_id`),
  KEY `slider_gambar_wisata_wisata_id_foreign` (`wisata_id`),
  CONSTRAINT `slider_gambar_wisata_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`wisata_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.slider_gambar_wisata: ~0 rows (approximately)
DELETE FROM `slider_gambar_wisata`;
/*!40000 ALTER TABLE `slider_gambar_wisata` DISABLE KEYS */;
/*!40000 ALTER TABLE `slider_gambar_wisata` ENABLE KEYS */;

-- Dumping structure for table indonesia.wisata
CREATE TABLE IF NOT EXISTS `wisata` (
  `wisata_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_wisata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_gambar_wisata_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kawasan_id` bigint(20) unsigned NOT NULL,
  `provinsi_id` bigint(20) unsigned NOT NULL,
  `kabupaten_id` bigint(20) unsigned NOT NULL,
  `daerah_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`wisata_id`),
  KEY `wisata_kawasan_id_foreign` (`kawasan_id`),
  KEY `wisata_provinsi_id_foreign` (`provinsi_id`),
  KEY `wisata_kabupaten_id_foreign` (`kabupaten_id`),
  KEY `wisata_daerah_id_foreign` (`daerah_id`),
  CONSTRAINT `wisata_daerah_id_foreign` FOREIGN KEY (`daerah_id`) REFERENCES `daerah` (`daerah_id`) ON DELETE CASCADE,
  CONSTRAINT `wisata_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`kabupaten_id`) ON DELETE CASCADE,
  CONSTRAINT `wisata_kawasan_id_foreign` FOREIGN KEY (`kawasan_id`) REFERENCES `kawasan` (`kawasan_id`) ON DELETE CASCADE,
  CONSTRAINT `wisata_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table indonesia.wisata: ~0 rows (approximately)
DELETE FROM `wisata`;
/*!40000 ALTER TABLE `wisata` DISABLE KEYS */;
/*!40000 ALTER TABLE `wisata` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
