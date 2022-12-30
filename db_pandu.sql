/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_pandu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pandu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_pandu`;

/*Table structure for table `adms` */

DROP TABLE IF EXISTS `adms`;

CREATE TABLE `adms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `adms` */

insert  into `adms`(`id`,`email`,`password`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`) values 
(1,'wanabud@gmail.com','$2y$10$BWEkQzre.FoQe00x32bO4eQRj74yyfWx72G8jxNqS97mKflINGxK6',NULL,NULL,NULL,NULL);

/*Table structure for table `aduan_files` */

DROP TABLE IF EXISTS `aduan_files`;

CREATE TABLE `aduan_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_aduan` bigint(20) unsigned NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aduan_files_id_aduan_foreign` (`id_aduan`),
  CONSTRAINT `aduan_files_id_aduan_foreign` FOREIGN KEY (`id_aduan`) REFERENCES `aduans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aduan_files` */

insert  into `aduan_files`(`id`,`id_aduan`,`link`,`created_at`,`updated_at`) values 
(1,6,'gambar/sVkCMk4EEM5IAUj5aqjzdZUYGFPPsO7pGFtzMPcn.png','2021-12-15 09:53:04','2021-12-15 09:53:04'),
(2,6,'gambar/04OGPyUtKegAmwdFxkbcd1OrFqw1jBwLS45NSNJ3.png','2021-12-15 10:20:35','2021-12-15 10:20:35'),
(3,8,'gambar/OjnRJpXextQpHR5TB4MYDpFavp6w32MwERKnW7mf.jpg','2021-12-22 18:16:31','2021-12-22 18:16:31'),
(4,9,'gambar/wIQuW479hNJSrJB4B5pVVvd80HabMx3ZYEjeLr4w.jpg',NULL,NULL),
(5,9,'gambar/HHY4iUFTRAjPaFGqyFMtnBUz7EgfbWFBA9MtmuZd.jpg',NULL,NULL),
(6,9,'gambar/69UpMA3W7HRXD3m9dhwdCFWp01noUbnn9oyGcZgq.jpg',NULL,NULL),
(7,9,'gambar/aoqQaPYSv5NN26sEjVad9l7DPVE5T9yuNkD3zBiU.jpg',NULL,NULL);

/*Table structure for table `aduan_kategoris` */

DROP TABLE IF EXISTS `aduan_kategoris`;

CREATE TABLE `aduan_kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aduan_kategoris` */

insert  into `aduan_kategoris`(`id`,`kategori`,`created_at`,`updated_at`) values 
(1,'Kesehatan',NULL,NULL),
(2,'Kriminal',NULL,NULL),
(3,'Pembangunan',NULL,NULL),
(4,'Sosial',NULL,NULL),
(5,'Kebijakan',NULL,NULL);

/*Table structure for table `aduan_statuses` */

DROP TABLE IF EXISTS `aduan_statuses`;

CREATE TABLE `aduan_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aduan_statuses` */

insert  into `aduan_statuses`(`id`,`status`,`created_at`,`updated_at`) values 
(1,'Menunggu',NULL,NULL),
(2,'Selesai',NULL,NULL);

/*Table structure for table `aduans` */

DROP TABLE IF EXISTS `aduans`;

CREATE TABLE `aduans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_aduan_kategori` bigint(20) unsigned NOT NULL,
  `id_aduan_status` bigint(20) unsigned NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aduan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dukungan` bigint(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `hide_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aduans_id_aduan_kategori_foreign` (`id_aduan_kategori`),
  KEY `aduans_id_aduan_status_foreign` (`id_aduan_status`),
  KEY `aduans_id_user_foreign` (`id_user`),
  CONSTRAINT `aduans_id_aduan_kategori_foreign` FOREIGN KEY (`id_aduan_kategori`) REFERENCES `aduan_kategoris` (`id`),
  CONSTRAINT `aduans_id_aduan_status_foreign` FOREIGN KEY (`id_aduan_status`) REFERENCES `aduan_statuses` (`id`),
  CONSTRAINT `aduans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `userrs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aduans` */

insert  into `aduans`(`id`,`id_aduan_kategori`,`id_aduan_status`,`id_user`,`judul`,`aduan`,`dukungan`,`waktu`,`hide_status`,`created_at`,`updated_at`) values 
(1,2,2,1,'Kriminal Maling','TES INI kriminal bersenjata',1266,'2021-12-01 06:40:31',0,NULL,'2021-12-28 22:31:39'),
(2,5,1,1,'Korupsi Bansos','Pada 6 Desember 2020, KPK menetapkan Mantan Menteri Sosial Juliari Batubara sebagai tersangka kasus dugaan suap bantuan sosial penanganan pandemi Covid-19 untuk wilayah Jabodetabek tahun 2020.  Penetapan tersangka Juliari saat itu merupakan tindak lanjut atas operasi tangkap tangan yang dilakukan KPK pada Jumat, 5 Desember 2020. Usai ditetapkan sebagai tersangka, pada malam harinya Juliari menyerahkan diri ke KPK. Selain Juliari, KPK juga menetapkan Matheus Joko Santoso, Adi Wahyono, Ardian I M dan Harry Sidabuke sebagai tersangka selalu pemberi suap.',11,'2021-12-15 02:54:28',0,'2021-12-15 03:54:28','2022-02-16 10:26:10'),
(3,3,1,1,'Jalan berlubang','Kondisi hujan seperti sekarang memang menyebabkan banyak munjul lubang di jalanan. Tak terkecuali di Jember Jawa Timur.\r\n\r\nSeorang warga mengeluhkan kondisi seperti itu. Namanya Imam Arifin. Pemotor itu mengeluhkan rusaknya jalan penghubung antar Kecamatan Mumbulsari dan Tempurejo.\r\n\r\nJalan penghubung itu mengalami kerusakan parah sehingga menyerupai kolam. Menurut dia, selain berlubang, jalan tersebut juga tergenang oleh air saat hujan turun. Sehingga mengancam keselamatan pengendara.\r\n\r\n\"Dari arah Lengkong (Mumbulsari), disana memang paling parah sekali. Terus sampai Temperejo sini, minta ampun pak sering terjadi kecelakaan,\" katanya seperti dikutip dari suaraindonesia.co.id, jejaring media suara.com, Kamis (18/11/2021)',1,'2021-12-15 03:10:06',0,'2021-12-15 04:10:06','2022-02-16 10:27:13'),
(4,5,1,1,'vfssvfss','svdsdvs',6,'2021-12-15 08:16:29',0,'2021-12-15 09:16:29','2022-02-16 10:27:12'),
(5,5,2,1,'VXVvX','xvxVX',1,'2021-12-15 08:51:58',1,'2021-12-15 09:51:58','2021-12-28 22:35:13'),
(6,5,1,1,'Download','czxbxcbxcbcxz',7,'2021-12-15 08:53:04',1,'2021-12-15 09:53:04','2022-01-30 09:43:04'),
(7,2,1,1,'Lort rico mendadak kaya','17 Desember lort rico kejatuhan uang di atas genteng',1,'2021-12-15 09:20:35',1,'2021-12-15 10:20:35','2022-02-16 10:27:15'),
(8,5,1,3,'Tes Kebijakan','uihfgHEHGUhghUGHe',0,'2021-12-22 17:16:30',0,'2021-12-22 18:16:30','2021-12-22 18:16:30'),
(9,3,1,4,'sumur resapan bikin jalanan berlubang','aofaafnafoafeaf',0,'2021-12-23 00:53:47',1,'2021-12-23 01:53:48','2021-12-29 02:44:38');

/*Table structure for table `balasan_files` */

DROP TABLE IF EXISTS `balasan_files`;

CREATE TABLE `balasan_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_balasan` bigint(20) unsigned NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `balasan_files_id_balasan_foreign` (`id_balasan`),
  CONSTRAINT `balasan_files_id_balasan_foreign` FOREIGN KEY (`id_balasan`) REFERENCES `balasans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `balasan_files` */

insert  into `balasan_files`(`id`,`id_balasan`,`link`,`created_at`,`updated_at`) values 
(1,1,'iiohhoi',NULL,NULL),
(2,1,'oihhihiohio',NULL,NULL),
(3,4,'gambar/s35aeavGU1H44rDVmwSrWjxXMtjuisgOKBN6AV8H.png','2021-12-15 23:24:59','2021-12-15 23:24:59'),
(4,6,'gambar/UzxkX1vJbZu9oZNNBKkOHyTFykvBdbGf4fttUSpq.jpg','2021-12-15 23:27:23','2021-12-15 23:27:23'),
(5,8,'gambar/EBkNeMb3MbXh7O1Dn1kGwvyBwZJBGJ5Lcixal7i9.png','2021-12-15 23:29:07','2021-12-15 23:29:07'),
(6,9,'0','2021-12-15 23:42:52','2021-12-15 23:42:52'),
(7,10,'0','2021-12-15 23:58:37','2021-12-15 23:58:37'),
(8,11,'gambar/MNRl819ZQyaAXfcaRUVG3CkwAPaDDX2qo82WPziw.jpg','2021-12-15 23:58:52','2021-12-15 23:58:52'),
(9,13,'gambar/PvabTG7lQpPOBpBy3TLcflCx6ICga7p3lT5Uxm7g.jpg',NULL,NULL),
(10,13,'gambar/UDAAnJ4U9CZS8zFmREDL7AxMninkBfwC7NHucQk1.jpg',NULL,NULL),
(11,13,'gambar/B1W8M9mVtmbfyw6kJQy3xxDG11upu03YLtKn12vV.jpg',NULL,NULL),
(12,13,'gambar/mZg53g0WlVACfO1Wio6wMnp8jkFEzh6wZDUdEomC.jpg',NULL,NULL),
(13,13,'gambar/Ict1hDIcaWw2ZiGZrF4AQbixycyMjbrOxWMUEgx7.jpg',NULL,NULL);

/*Table structure for table `balasans` */

DROP TABLE IF EXISTS `balasans`;

CREATE TABLE `balasans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pemerintah` bigint(20) unsigned NOT NULL,
  `id_aduan` bigint(20) unsigned NOT NULL,
  `balasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `balasans_id_pemerintah_foreign` (`id_pemerintah`),
  KEY `balasans_id_aduan_foreign` (`id_aduan`),
  CONSTRAINT `balasans_id_aduan_foreign` FOREIGN KEY (`id_aduan`) REFERENCES `aduans` (`id`),
  CONSTRAINT `balasans_id_pemerintah_foreign` FOREIGN KEY (`id_pemerintah`) REFERENCES `pemerintahs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `balasans` */

insert  into `balasans`(`id`,`id_pemerintah`,`id_aduan`,`balasan`,`waktu`,`created_at`,`updated_at`) values 
(1,1,6,'oiiohiohoihhioiho','2021-12-01 22:08:09',NULL,NULL),
(2,1,2,'qwfwaQgawgwwq','2021-12-15 22:16:22','2021-12-15 23:16:22','2021-12-15 23:16:22'),
(3,1,2,'vuuvuuvvvevevee','2021-12-15 22:17:14','2021-12-15 23:17:14','2021-12-15 23:17:14'),
(4,1,2,'jjjijijjipjp','2021-12-15 22:24:58','2021-12-15 23:24:58','2021-12-15 23:24:58'),
(6,1,2,'eeeeeeeeeeee','2021-12-15 22:27:23','2021-12-15 23:27:23','2021-12-15 23:27:23'),
(8,1,2,'faefaefa','2021-12-15 22:29:07','2021-12-15 23:29:07','2021-12-15 23:29:07'),
(9,1,2,'tes ini asli','2021-12-15 22:42:52','2021-12-15 23:42:52','2021-12-15 23:42:52'),
(10,1,3,'jalan akan diperbaiki :)','2021-12-15 22:58:37','2021-12-15 23:58:37','2021-12-15 23:58:37'),
(11,1,3,'info dari ketua','2021-12-15 22:58:52','2021-12-15 23:58:52','2021-12-15 23:58:52'),
(12,1,9,'Sebentar akan dikoordinasikan dengan pak gubernur','2021-12-23 01:08:59','2021-12-23 02:08:59','2021-12-23 02:08:59'),
(13,1,9,'Sebentar akan dikoordinasikan dengan pak gubernur','2021-12-23 01:09:56','2021-12-23 02:09:56','2021-12-23 02:09:56');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(64,'2014_10_12_000000_create_users_table',1),
(65,'2014_10_12_100000_create_password_resets_table',1),
(66,'2019_08_19_000000_create_failed_jobs_table',1),
(67,'2019_12_14_000001_create_personal_access_tokens_table',1),
(68,'2021_11_24_000001_create_userrs_table',1),
(69,'2021_11_24_155416_create_aduan_statuses_table',1),
(70,'2021_11_24_155510_create_pemerintah_jabatans_table',1),
(71,'2021_11_24_155637_create_pandu_helps_table',1),
(72,'2021_11_24_155745_create_pemerintahs_table',1),
(73,'2021_11_24_155746_create_pemerintah_datas_table',1),
(74,'2021_11_24_160011_create_user_statuses_table',1),
(75,'2021_11_24_160103_create_aduan_kategoris_table',1),
(76,'2021_11_24_160413_create_file_jenis_table',1),
(77,'2021_11_24_160451_create_user_datas_table',1),
(78,'2021_11_24_160452_create_user_ktps_table',1),
(79,'2021_11_24_162025_create_aduans_table',1),
(80,'2021_11_24_162731_create_aduan_files_table',1),
(81,'2021_11_24_163122_create_balasans_table',1),
(82,'2021_11_24_163410_create_balasan_files_table',1),
(83,'2021_12_01_114150_create_adms_table',1),
(84,'2021_12_01_120021_create_user_likes_table',1);

/*Table structure for table `pandu_helps` */

DROP TABLE IF EXISTS `pandu_helps`;

CREATE TABLE `pandu_helps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pandu_helps` */

insert  into `pandu_helps`(`id`,`pertanyaan`,`jawaban`,`created_at`,`updated_at`) values 
(2,'Bagaimana cara register?','Pada landing page klik registrasi','2021-12-22 17:19:34','2021-12-22 17:35:24'),
(3,'Bagaimana cara login?','Pada landing page klik masuk',NULL,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pemerintah_datas` */

DROP TABLE IF EXISTS `pemerintah_datas`;

CREATE TABLE `pemerintah_datas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pemerintah_jabatan` bigint(20) unsigned NOT NULL,
  `id_pemerintah` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pemerintah_datas_id_pemerintah_jabatan_foreign` (`id_pemerintah_jabatan`),
  KEY `pemerintah_datas_id_pemerintah_foreign` (`id_pemerintah`),
  CONSTRAINT `pemerintah_datas_id_pemerintah_foreign` FOREIGN KEY (`id_pemerintah`) REFERENCES `pemerintahs` (`id`),
  CONSTRAINT `pemerintah_datas_id_pemerintah_jabatan_foreign` FOREIGN KEY (`id_pemerintah_jabatan`) REFERENCES `pemerintah_jabatans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pemerintah_datas` */

insert  into `pemerintah_datas`(`id`,`nik`,`nip`,`nama`,`tanggal_lahir`,`no_telepon`,`alamat`,`foto`,`id_pemerintah_jabatan`,`id_pemerintah`,`created_at`,`updated_at`) values 
(3,'8717127821','142641212','Ikan Buntal','2021-12-22','1641278124','DKI Jakarta','foto/UpVQG01rW9Xw6uuYzK1u3yF8JAgWoKeS6MtUhcD2.jpg',1,1,NULL,'2021-12-22 13:25:28'),
(4,'12476177421724176','164212461821261278','Saitamol','2021-12-22','1784641278641786','dimana-mana',NULL,1,2,'2021-12-22 15:11:58','2021-12-22 15:11:58');

/*Table structure for table `pemerintah_jabatans` */

DROP TABLE IF EXISTS `pemerintah_jabatans`;

CREATE TABLE `pemerintah_jabatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pemerintah_jabatans` */

insert  into `pemerintah_jabatans`(`id`,`jabatan`,`created_at`,`updated_at`) values 
(1,'Kepala Daerah',NULL,NULL),
(2,'Staff',NULL,NULL);

/*Table structure for table `pemerintahs` */

DROP TABLE IF EXISTS `pemerintahs`;

CREATE TABLE `pemerintahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pemerintahs` */

insert  into `pemerintahs`(`id`,`email`,`password`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`) values 
(1,'ikanbuntal@gmail.com','$2y$10$qzvFwfGnobDkCLIAwz6B5.t9CGGk1x67CETlCzLZg1TU1hFiafrse',NULL,NULL,NULL,NULL),
(2,'saitamol@gmail.com','$2y$10$kV5I40MGQpV0QsSP1rtyZOqiGe5uz3QiqbxptWi.ttL273nXw9p4S',NULL,NULL,'2021-12-22 15:11:58','2021-12-22 15:11:58');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `user_datas` */

DROP TABLE IF EXISTS `user_datas`;

CREATE TABLE `user_datas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_datas_id_user_foreign` (`id_user`),
  CONSTRAINT `user_datas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `userrs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_datas` */

insert  into `user_datas`(`id`,`nik`,`nama`,`tanggal_lahir`,`no_telepon`,`alamat`,`foto`,`id_user`,`created_at`,`updated_at`) values 
(1,'172671287781','Joko','2021-12-01','082615987345','DKI Jakarta','foto/zGFD0DeTCZO68M9N3rBELEhr9iqfVPuZQCVvlP99.jpg',1,'2021-12-08 19:53:30','2021-12-22 06:44:22'),
(3,'78261421214','Kaho','2021-12-22','1277817124','Semarang','foto/47nb3o0P5MGnr8fPkkRTttyp3QbpZvHYUAXnWLWv.jpg',3,'2021-12-22 13:22:47','2021-12-22 13:44:37'),
(4,'4178417846178','Lizal Lamli','2021-12-23','319827421434151','Jalan CIbubur',NULL,4,'2021-12-23 01:21:17','2021-12-23 01:21:17');

/*Table structure for table `user_ktps` */

DROP TABLE IF EXISTS `user_ktps`;

CREATE TABLE `user_ktps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user_data` bigint(20) unsigned NOT NULL,
  `ktp_scan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ktps_id_user_data_foreign` (`id_user_data`),
  CONSTRAINT `user_ktps_id_user_data_foreign` FOREIGN KEY (`id_user_data`) REFERENCES `user_datas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_ktps` */

insert  into `user_ktps`(`id`,`id_user_data`,`ktp_scan`,`ktp_foto`,`created_at`,`updated_at`) values 
(1,1,'ktp/ktp-scan/eiqWCUnYq7b8EUBt70GkahyyyEvB0s3kuhOhMpPc.jpg','ktp/ktp-foto/WIF4QvS4AYsp4P24IQK2NMew3UtJUQWPnPCGJmzM.png','2021-12-08 19:53:30','2021-12-08 19:53:30'),
(3,3,'ktp/ktp-scan/6iS6deVrD79aQ1c1eZEfbDtluOlbRw05EM4S9oda.png','ktp/ktp-foto/FYMWhVJ22eFll6k33EJy2OtIjMsCGRoGjHWpum1M.png','2021-12-22 13:22:48','2021-12-22 13:22:48'),
(4,4,'ktp/ktp-scan/Rx39qKgHC6KvMHilVRhuwSCafSSKhThSQgmnC7jd.jpg','ktp/ktp-foto/0KP0ogsPSMtoS5leXYR19cnDAAOrhO8pXy09Xu0C.jpg','2021-12-23 01:21:18','2021-12-23 01:21:18');

/*Table structure for table `user_likes` */

DROP TABLE IF EXISTS `user_likes`;

CREATE TABLE `user_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `like_status` int(11) NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `id_aduan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_likes_id_user_foreign` (`id_user`),
  KEY `user_likes_id_aduan_foreign` (`id_aduan`),
  CONSTRAINT `user_likes_id_aduan_foreign` FOREIGN KEY (`id_aduan`) REFERENCES `aduans` (`id`),
  CONSTRAINT `user_likes_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `userrs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_likes` */

insert  into `user_likes`(`id`,`like_status`,`id_user`,`id_aduan`,`created_at`,`updated_at`) values 
(116,0,3,2,'2021-12-28 21:26:10','2021-12-29 06:49:40'),
(117,0,3,4,'2021-12-28 21:26:10','2021-12-29 06:49:34'),
(118,1,3,6,'2021-12-28 21:26:11','2021-12-29 06:49:37'),
(119,0,3,3,'2021-12-28 21:26:11','2021-12-29 06:49:38'),
(120,0,3,7,'2021-12-28 21:26:11','2021-12-29 03:20:22'),
(121,0,3,2,'2021-12-28 21:26:13','2021-12-28 21:26:13'),
(122,0,3,2,'2021-12-28 21:30:21','2021-12-28 21:30:21'),
(123,0,3,4,'2021-12-28 21:30:21','2021-12-28 21:30:21'),
(124,0,3,6,'2021-12-28 21:30:22','2021-12-28 21:30:22'),
(125,0,3,3,'2021-12-28 21:30:22','2021-12-28 21:30:22'),
(126,0,3,7,'2021-12-28 21:30:22','2021-12-28 21:30:22'),
(127,0,3,2,'2021-12-28 21:30:24','2021-12-28 21:30:24'),
(128,0,3,4,'2021-12-28 21:30:24','2021-12-28 21:30:24'),
(129,0,3,6,'2021-12-28 21:30:24','2021-12-28 21:30:24'),
(130,0,3,3,'2021-12-28 21:30:24','2021-12-28 21:30:24'),
(131,0,3,7,'2021-12-28 21:30:24','2021-12-28 21:30:24'),
(132,0,3,2,'2021-12-28 21:30:26','2021-12-28 21:30:26'),
(133,0,3,4,'2021-12-28 21:34:54','2021-12-28 21:34:54'),
(134,0,3,4,'2021-12-28 21:34:55','2021-12-28 21:34:55'),
(135,0,3,2,'2021-12-28 21:35:15','2021-12-28 21:35:15'),
(136,0,3,6,'2021-12-28 21:36:36','2021-12-28 21:36:36'),
(137,0,3,6,'2021-12-28 21:36:37','2021-12-28 21:36:37'),
(138,0,3,6,'2021-12-28 21:37:58','2021-12-28 21:37:58'),
(139,0,3,6,'2021-12-28 21:37:59','2021-12-28 21:37:59'),
(140,0,3,6,'2021-12-28 21:38:00','2021-12-28 21:38:00'),
(141,0,3,4,'2021-12-28 21:38:02','2021-12-28 21:38:02'),
(142,0,3,2,'2021-12-28 21:38:05','2021-12-28 21:38:05'),
(143,0,3,4,'2021-12-28 21:39:41','2021-12-28 21:39:41'),
(144,0,3,4,'2021-12-28 21:39:43','2021-12-28 21:39:43'),
(145,0,3,4,'2021-12-28 21:39:46','2021-12-28 21:39:46'),
(146,0,3,3,'2021-12-28 21:45:40','2021-12-28 21:45:40'),
(147,0,3,3,'2021-12-28 21:45:44','2021-12-28 21:45:44'),
(148,0,3,7,'2021-12-28 21:46:09','2021-12-28 21:46:09'),
(149,0,3,3,'2021-12-28 22:07:42','2021-12-28 22:07:42'),
(150,0,3,2,'2021-12-28 22:07:44','2021-12-28 22:07:44'),
(151,0,3,7,'2021-12-28 22:28:34','2021-12-28 22:28:34'),
(152,0,3,1,'2021-12-28 22:31:39','2021-12-28 22:31:39'),
(153,0,3,7,'2021-12-28 22:34:59','2021-12-28 22:34:59'),
(154,0,3,7,'2021-12-28 22:35:04','2021-12-28 22:35:04'),
(155,1,3,5,'2021-12-28 22:35:13','2021-12-28 22:35:13'),
(156,0,3,3,'2021-12-29 02:37:14','2021-12-29 02:37:14'),
(157,0,3,3,'2021-12-29 02:43:59','2021-12-29 02:43:59'),
(158,0,3,3,'2021-12-29 02:44:09','2021-12-29 02:44:09'),
(159,0,3,7,'2021-12-29 02:44:20','2021-12-29 02:44:20'),
(160,0,3,7,'2021-12-29 02:44:25','2021-12-29 02:44:25'),
(161,0,3,9,'2021-12-29 02:44:28','2021-12-29 02:44:38'),
(162,0,3,9,'2021-12-29 02:44:38','2021-12-29 02:44:38'),
(163,0,3,6,'2021-12-29 03:09:09','2021-12-29 03:09:09'),
(164,0,3,6,'2021-12-29 03:09:10','2021-12-29 03:09:10'),
(165,0,3,2,'2021-12-29 03:14:12','2021-12-29 03:14:12'),
(166,0,3,7,'2021-12-29 03:20:21','2021-12-29 03:20:21'),
(167,0,3,7,'2021-12-29 03:20:22','2021-12-29 03:20:22'),
(168,0,3,2,'2021-12-29 06:36:30','2021-12-29 06:36:30'),
(169,0,3,4,'2021-12-29 06:36:32','2021-12-29 06:36:32'),
(170,0,3,2,'2021-12-29 06:36:35','2021-12-29 06:36:35'),
(171,0,3,2,'2021-12-29 06:36:35','2021-12-29 06:36:35'),
(172,0,3,2,'2021-12-29 06:36:35','2021-12-29 06:36:35'),
(173,0,3,2,'2021-12-29 06:36:35','2021-12-29 06:36:35'),
(174,0,3,2,'2021-12-29 06:36:39','2021-12-29 06:36:39'),
(175,0,3,2,'2021-12-29 06:36:40','2021-12-29 06:36:40'),
(176,0,3,2,'2021-12-29 06:36:43','2021-12-29 06:36:43'),
(177,0,3,2,'2021-12-29 06:36:45','2021-12-29 06:36:45'),
(178,0,3,2,'2021-12-29 06:36:49','2021-12-29 06:36:49'),
(179,0,3,4,'2021-12-29 06:36:51','2021-12-29 06:36:51'),
(180,0,3,6,'2021-12-29 06:36:54','2021-12-29 06:36:54'),
(181,0,3,6,'2021-12-29 06:36:56','2021-12-29 06:36:56'),
(182,0,3,2,'2021-12-29 06:38:01','2021-12-29 06:38:01'),
(183,0,3,2,'2021-12-29 06:38:07','2021-12-29 06:38:07'),
(184,0,3,2,'2021-12-29 06:38:20','2021-12-29 06:38:20'),
(185,0,3,2,'2021-12-29 06:38:21','2021-12-29 06:38:21'),
(186,0,3,3,'2021-12-29 06:39:55','2021-12-29 06:39:55'),
(187,0,3,2,'2021-12-29 06:49:01','2021-12-29 06:49:01'),
(188,0,3,2,'2021-12-29 06:49:22','2021-12-29 06:49:22'),
(189,0,3,2,'2021-12-29 06:49:30','2021-12-29 06:49:30'),
(190,0,3,4,'2021-12-29 06:49:34','2021-12-29 06:49:34'),
(191,0,3,6,'2021-12-29 06:49:36','2021-12-29 06:49:36'),
(192,0,3,3,'2021-12-29 06:49:38','2021-12-29 06:49:38'),
(193,0,3,2,'2021-12-29 06:49:40','2021-12-29 06:49:40'),
(194,0,1,2,'2022-01-30 09:43:00','2022-02-16 10:26:10'),
(195,1,1,6,'2022-01-30 09:43:04','2022-01-30 09:43:04'),
(196,1,1,3,'2022-01-30 09:43:10','2022-02-16 10:27:13'),
(197,0,1,3,'2022-02-16 10:25:44','2022-02-16 10:25:44'),
(198,1,1,7,'2022-02-16 10:25:46','2022-02-16 10:27:15'),
(199,0,1,3,'2022-02-16 10:25:49','2022-02-16 10:25:49'),
(200,0,1,2,'2022-02-16 10:26:10','2022-02-16 10:26:10'),
(201,0,1,3,'2022-02-16 10:26:13','2022-02-16 10:26:13'),
(202,0,1,7,'2022-02-16 10:26:18','2022-02-16 10:26:18'),
(203,0,1,3,'2022-02-16 10:26:21','2022-02-16 10:26:21'),
(204,0,1,3,'2022-02-16 10:26:22','2022-02-16 10:26:22'),
(205,0,1,7,'2022-02-16 10:26:23','2022-02-16 10:26:23'),
(206,0,1,7,'2022-02-16 10:26:23','2022-02-16 10:26:23'),
(207,0,1,3,'2022-02-16 10:26:24','2022-02-16 10:26:24'),
(208,0,1,3,'2022-02-16 10:27:10','2022-02-16 10:27:10'),
(209,1,1,4,'2022-02-16 10:27:12','2022-02-16 10:27:12'),
(210,0,1,3,'2022-02-16 10:27:13','2022-02-16 10:27:13'),
(211,0,1,7,'2022-02-16 10:27:15','2022-02-16 10:27:15');

/*Table structure for table `user_statuses` */

DROP TABLE IF EXISTS `user_statuses`;

CREATE TABLE `user_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_statuses_id_user_foreign` (`id_user`),
  CONSTRAINT `user_statuses_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `userrs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_statuses` */

insert  into `user_statuses`(`id`,`status`,`id_user`,`created_at`,`updated_at`) values 
(1,'Terverifikasi',1,'2021-12-08 19:53:30','2021-12-08 19:53:30'),
(3,'Terverifikasi',3,'2021-12-22 13:22:47','2021-12-22 13:37:37'),
(4,'Terverifikasi',4,'2021-12-23 01:21:17','2021-12-23 01:22:42');

/*Table structure for table `userrs` */

DROP TABLE IF EXISTS `userrs`;

CREATE TABLE `userrs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `userrs` */

insert  into `userrs`(`id`,`email`,`password`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`) values 
(1,'wanabud@gmail.com','$2y$10$BWEkQzre.FoQe00x32bO4eQRj74yyfWx72G8jxNqS97mKflINGxK6',NULL,NULL,'2021-12-08 19:53:30','2021-12-08 19:53:30'),
(3,'kaho@gmail.com','$2y$10$7/GRP6U0NSHA2DroU43jp.F1HKAeiTTFEESgK2rmBxyCBr1SX/NJO',NULL,NULL,'2021-12-22 13:22:47','2021-12-22 13:22:47'),
(4,'lizallamli@gmail.com','$2y$10$uVvH.qLzLWdvOCh9e6I6iuYCvlJXLEv7hp6pq/HXtQ57htGSI2N1G',NULL,NULL,'2021-12-23 01:21:16','2021-12-23 01:21:16');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
