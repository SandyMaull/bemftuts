-- MySQL dump 10.16  Distrib 10.1.41-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bemftuts
-- ------------------------------------------------------
-- Server version	10.1.41-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aspirasi`
--

DROP TABLE IF EXISTS `aspirasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspirasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspirasi` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspirasi`
--

LOCK TABLES `aspirasi` WRITE;
/*!40000 ALTER TABLE `aspirasi` DISABLE KEYS */;
INSERT INTO `aspirasi` VALUES (1,'Lenga Offcial','Bagus!','2019-10-03 20:18:50','2019-10-03 20:18:50'),(2,'Lenga Offcial','Bagus!2','2019-10-03 20:19:22','2019-10-03 20:19:22'),(3,'Trisman Sanjaya','Test Kotak Aspirasi','2019-10-04 09:21:32','2019-10-04 09:21:32'),(4,'Lala','Anda','2019-10-04 09:28:55','2019-10-04 09:28:55'),(5,'Sandy Maulana','EEK','2019-10-04 09:31:32','2019-10-04 09:31:32'),(6,'Sandy Maulana','SS','2019-10-04 09:34:17','2019-10-04 09:34:17'),(7,'Trisman Sanjaya','A','2019-10-04 09:46:31','2019-10-04 09:46:31'),(8,'Andi Maslahah','aaa','2019-10-04 09:52:43','2019-10-04 09:52:43'),(9,'sdfgh','sdfgh','2019-10-04 10:16:49','2019-10-04 10:16:49'),(10,'Yasser','lala','2019-10-04 10:37:50','2019-10-04 10:37:50'),(11,'Trisman Sanjaya','asa','2019-10-13 14:00:50','2019-10-13 14:00:50'),(12,'Test Kotak Aspirasi 17 Oct 2019','Test terbaru','2019-10-17 13:21:17','2019-10-17 13:21:17'),(13,'Andi Maslahahaaa','Lollll!','2019-10-17 14:40:15','2019-10-17 14:40:15'),(14,'Ujank','Test Aspirasi','2019-10-22 02:10:50','2019-10-22 02:10:50'),(15,'Lala','Test Aspirasi Ke2','2019-10-22 02:11:36','2019-10-22 02:11:36'),(16,'Nurul MS','Pengurus BEM-FT kayanya lagi pada down nihh ? What\'s on ?','2019-10-29 13:12:20','2019-10-29 13:12:20');
/*!40000 ALTER TABLE `aspirasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidang`
--

DROP TABLE IF EXISTS `bidang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bidang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bidang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidang`
--

LOCK TABLES `bidang` WRITE;
/*!40000 ALTER TABLE `bidang` DISABLE KEYS */;
INSERT INTO `bidang` VALUES (1,'MEDINFO'),(8,'Internal'),(9,'BPH'),(10,'Relasi'),(11,'Sospol'),(12,'Ekraf');
/*!40000 ALTER TABLE `bidang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prodi_id` int(10) unsigned DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` tinyint(4) NOT NULL,
  `edit_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  KEY `mahasiswa_prodi_id_foreign` (`prodi_id`),
  KEY `mahasiswa_edit_by_foreign` (`edit_by`),
  CONSTRAINT `mahasiswa_edit_by_foreign` FOREIGN KEY (`edit_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mahasiswa_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_09_09_135618_create_mahasiswa_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `bidang_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_bidang_id_foreign` (`bidang_id`),
  CONSTRAINT `posts_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (13,'What is Lorem Ipsum?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','1571255267_5da773e3da0e7_IMG_9978.JPG',1,9,'2019-10-17 07:47:48','2019-10-17 07:56:49'),(15,'malam santuy pengurus BEM FT 2019','Hari ini 26 Oktober 2019 melakukan upgreding untuk memberikan semangat  kembali para pengurus BEM FT dalam menjalankan segala macam program kerja yang telah dilaksanakan','1572077919_5db4015f7df7f_15720778854861110863379.jpg',1,9,'2019-10-26 20:18:40','2019-10-26 20:18:40');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (1,'Teknik Elektro'),(2,'Teknik Industri'),(3,'Teknik Informatika'),(4,'Teknik Metalurgi'),(5,'Teknik Mesin'),(6,'Teknik Sipil');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL,
  `roles` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'superadmin'),(2,'admin'),(3,'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bidang_id` int(10) unsigned DEFAULT NULL,
  `prodi_id` int(10) unsigned DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_nim_unique` (`nim`),
  KEY `users_bidang_id_foreign` (`bidang_id`),
  KEY `users_prodi_id_foreign` (`prodi_id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,3,1,'Sandy Maulana','sandy@google.co.lc',NULL,'$2y$12$KE0r1UOshvtC5OPQEf8S8.S6uuIyLYDZdon7KbIrsOo7adLb3uZLW','17.01.071.106','2017','082260879023','Bukit Cimanggu City Blok S11 No.4',NULL,'User - MEDINFO',NULL,'2019-09-17 13:51:49','2019-09-22 01:38:58'),(7,1,3,2,'Fadel Muhammad Rizky','fm936080@gmail.com',NULL,'$2y$10$MF591Gucr9gpwhamNOYG5eRzkououitvWzBwFZ8MZYeZ0MEaj0FyO','17.01.071.030','2017','081322119636','Jalan lintas kebayan',NULL,NULL,NULL,'2019-09-19 04:14:59','2019-09-20 09:38:03'),(8,1,3,3,'Sukma Asyfinawati','sukmaasyfina@gmail.com',NULL,'$2y$10$PpC4AefOmXlksJH/DzGgu.eMGnvP1RW6Gu3ajb3kHVl0KbMJaGhaa','17.01.071.113','2017','085359425620','Samapuin',NULL,NULL,NULL,'2019-09-19 04:51:18','2019-09-19 04:51:18'),(9,1,6,3,'Ghibra Maulana Umaro','ghibramaulana@gmail.com',NULL,'$2y$10$pHWZROHmQH06sG4Yuen1.eP8gKPYa7RyeVYVi5ESOLADR.hz/pA9q','18.01.016.014','2018','082339168952','Jalan Ki Hajar Dewantara No. 112 Rt 02 Rw 03 Kel. Pekat',NULL,NULL,NULL,'2019-09-19 04:56:17','2019-09-19 04:56:17'),(10,1,3,2,'AZZAHRAH MAULYA SAFIRA','azzahra.maulya@gmail.com',NULL,'$2y$12$YoHQkmTuhtKZ.KCox9i.x./0U/GmcEo3nDoIxdY/FH9fs8ofNxaoy','17.01.071.016','2017','082386383900','Desa Pungka',NULL,'Sandy Maulana - MEDINFO',NULL,'2019-09-19 05:16:19','2019-09-22 18:29:40'),(11,9,4,2,'Muhammad Farhan Fakhrudin','muhammadfarhanfakhrudin@gmail.com',NULL,'$2y$12$HN9DHPNplwrm0r34rdcugetq882xxUtM6BA2bBclxxOHemjyPHz0.','16.01.011.017','2016','085320224447','Brang Biji, NTB',NULL,'Sandy Maulana - MEDINFO',NULL,'2019-09-19 06:11:23','2019-10-03 20:20:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-31 17:19:47
