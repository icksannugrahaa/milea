-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: db_milea
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `booking_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `bookings_FK` (`user_id`),
  KEY `bookings_FK_1` (`book_id`),
  CONSTRAINT `bookings_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bookings_FK_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,1,110,'2020-03-18'),(2,2,110,'2020-03-18'),(3,3,110,'2020-03-19'),(4,4,111,'2020-03-18');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `jumlahhal` int(11) NOT NULL,
  `sinopsis` mediumtext NOT NULL,
  `cover` longblob,
  `tahunterbit` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (110,'Matematika Diskrit','Rinaldi Munir','INFORMATIKA',4,'Matematika Diskrit (descrete mathematics atau finite mathematics) adalah cabang matematika yang mengkaji objek-objek diskrit. Buku Matematika disusun sebagai buku teks mahasiswa yang mengambil mata kuliah Matematika Diskrit. Matematika Diskrit merupakan mata kuliah yang fundamental dalam pendidikan Ilmu Komputer atau Teknik Informatika. Bahkan, saat ini Matematika Dsikrit merupakan mata kuliah wajib pada program pendidikan yang termasuk dalam kelompok teknologi informasi. Bahan kuliah matematika diskrit yang disajikan di dalam buku ini meliputi : - Logika - Himpunan - Matriks, relasi dan fungsi - Induksi matematika - Algoritma dan bilangan bulat (integer) - Kombinatorial dan peluang diskrit - Aljabar boolean - Graf - Pohon',NULL,2016),(111,'Algoritma & Pemrograman dalam Bahasa Pascal dan C Edisi Revisi','Rinaldi Munir','INFORMATIKA',3,'Buku Algoritma dan Pemrograman dalam Bahasa Pascal, C, dan C++ merupakan edisi\r\nbaru dari buku sebelumnya, yaitu Algoritma dan Pemrograman dalam Bahasa Pascal\r\ndan C. Buku ini disusun bagi siapapun (siswa, mahasiswa, umum) yang ingin\r\nmempelajari bidang pemrograman. ',NULL,2011),(112,'Rekayasa Perangkat Lunak Terstruktur dan Berorientasi Objek','Rosa Ariani Sukanto','INFORMATIKA',5,'Pada buku ini akan membahas tentang analisis dan desain sistem dengan disertai suatu studi kasus untuk memudahkan dalam pemahaman. Analisis dan desain sistem itu dimulai dengan analisis dan desain basis data, analisis dan desain sistem untuk pemrograman terstruktur dengan menggunakan DFD, dan analisis dan desain sistem untuk pemrograman berorientasi objek dengan menggunakan UML. Setelah membaca studi kasus tersebut, pembaca diharapkan dapat memahami bagaimana melakukan analisis dan desain sistem untuk pemrograman terstruktur maupun pemrograman berorientasi objek. Untuk menghasilkan analisis dan desain perangkat lunak yang baik, seorang analis seharusnya memahami konsep pemrograman. Tanpa pemahaman konsep pemrograman yang baik, analis tidak mungkin menghasilkan perancangan perangkat lunak yang baik. Pada buku ini juga dijelaskan mengenai tahapan-tahapan yang harus dilalui dalam rakayasa perangkat lunak serta penjelasan secara umum tentang manajemen proyek perangkat lunak.\r\n\r\n\r\n',NULL,2018),(150100,'Emotional Intelligence','Tim Wesfix','GRASINDO',150,'Buku ini tidak sekadar membuat informasi anda bertambah, tapi juga akan memebuat anda tersenyum, terpengaruh, sekaligus manggut-manggut.',NULL,2015),(150101,'Langkahkan Kakimu','Endrik Safudin','PT Elex Media Komputindo',176,'Setiap orang harus melangkahkan kaki untuk mencapai apa yang diimpi-impikannya. Impian impian itulah yang menjadikannya lebih baik daripada hari-hari sebelumnya.',NULL,2015),(150102,'Hasrat Untuk Berubah','H.SOEMARNO SOEDARSONO','PT Elex Media Komputindo',175,'SOEMARNO SOEDARSONO adalah seorang Brigadir Jendral TNI (Purn.) dan seorang pendidik yang berpengalaman dibidang pendidikan baik di akademi militer, Lemhannas, maupun di lembaga pemerintahan dan swasta.',NULL,2005),(150103,'Harus Bisa! Seni memimpin Ala SBY','Dr.Dino Patti Jalal','Red & White Publishing',434,'Buku ini berisikan dinamika pengambilan keputusan dan tindakan Presiden SBY yang direkam dan dipotret oleh Dino Patti Djalal, Staff Khusus Presiden Republik Indonesia. Banyak Pelajaran yang dapat dipetik dari kisah-kisah yang ada, terutama oleh para gnerasi muda bangsa dan para prajurit TNI. ',NULL,2008),(150104,'Paris Belum Ingin Tidur','Afina & Fauzan Iskandar','Bhuana Sastra',137,'Berisikan sebuah Perjalanan di kota Paris, dengan mengabadikan berbagai tempat di kota Paris Prancis.',NULL,2018);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat`
--

DROP TABLE IF EXISTS `riwayat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riwayat` (
  `riw_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `petugas` bigint(20) NOT NULL,
  PRIMARY KEY (`riw_id`),
  KEY `riwayat_FK` (`petugas`),
  KEY `riwayat_FK_1` (`user_id`),
  KEY `riwayat_FK_2` (`book_id`),
  CONSTRAINT `riwayat_FK` FOREIGN KEY (`petugas`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `riwayat_FK_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `riwayat_FK_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat`
--

LOCK TABLES `riwayat` WRITE;
/*!40000 ALTER TABLE `riwayat` DISABLE KEYS */;
INSERT INTO `riwayat` VALUES (1,1,1,110,'2020-03-18','2020-03-20',5),(2,NULL,1,111,'2020-03-20','2020-03-25',5);
/*!40000 ALTER TABLE `riwayat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagihan`
--

DROP TABLE IF EXISTS `tagihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagihan` (
  `id_tagihan` bigint(20) NOT NULL AUTO_INCREMENT,
  `riw_id` bigint(20) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `tgl_pengembalian` date NOT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `tagihan_FK` (`riw_id`),
  CONSTRAINT `tagihan_FK` FOREIGN KEY (`riw_id`) REFERENCES `riwayat` (`riw_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagihan`
--

LOCK TABLES `tagihan` WRITE;
/*!40000 ALTER TABLE `tagihan` DISABLE KEYS */;
INSERT INTO `tagihan` VALUES (2,2,20000,'2020-03-30');
/*!40000 ALTER TABLE `tagihan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` longblob,
  `akses` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'icksan nugraha','083822145705','cijagra No.1 Buahbatu Bandung','icksan.nugrahaa@gmail.com','123456',NULL,3),(2,'fikri al ghany supendi','0895632332204','banjaran bawah pangalengan','fikrighany@gmail.com','123456',NULL,3),(3,'aldi herdiansyah','081381807061','katanya sih rancaekek','aldihery@gmail.com','123456',NULL,3),(4,'muchammad fahd ishamuddin','081384666233','katapang deket soreang','fxhdmhmmd@gmail.com','123456',NULL,3),(5,'muchammad karel','081384666221','katapang deket soreang','karel@gmail.com','123456',NULL,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_milea'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-19  1:09:12
