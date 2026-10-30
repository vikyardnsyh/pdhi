-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: pdhi_banten
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `berkas_dokter`
--

DROP TABLE IF EXISTS `berkas_dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berkas_dokter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_berkas` varchar(100) DEFAULT NULL,
  `id_jenis_berkas` int DEFAULT NULL,
  `id_dokter` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_berkas_dokter_id_jenis_berkas` (`id_jenis_berkas`),
  KEY `fk_berkas_dokter_id_dokter` (`id_dokter`),
  CONSTRAINT `fk_berkas_dokter_id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_berkas_dokter_id_jenis_berkas` FOREIGN KEY (`id_jenis_berkas`) REFERENCES `jenis_berkas_dokter` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berkas_dokter`
--

LOCK TABLES `berkas_dokter` WRITE;
/*!40000 ALTER TABLE `berkas_dokter` DISABLE KEYS */;
INSERT INTO `berkas_dokter` (`id`, `nama_berkas`, `id_jenis_berkas`, `id_dokter`) VALUES (38,'6ace1d3a37e1419aa5d93edf57d67cb8.jpeg',1,41),(39,'0de5ba4a320940679906ea9ded70479d.jpeg',2,41),(40,'56600c6e69f64c9bbc7e6f0f7b45d39c.jpeg',3,41),(41,'301cc8df72b7445cb0a5f10d273645d7.jpeg',4,41),(42,'e4da87d70207413c9439843af12f3336.jpeg',5,41),(43,'54fcab4e252449b5953ea7db38a9fa51.jpeg',6,41),(44,'cba2fa40686243a08fc66cbc171b0b52.jpeg',7,41),(45,'9c76feb69aa546a69c52e4dd0a157c92.jpeg',8,41),(53,'812ad2b222d64516b0a7f57c8cc7ad43.jpeg',2,36),(59,'08a577dfc81a4e7eb68d4157df89e458.jpeg',1,36),(60,'43fa9cb3a09c47e39a47f5408cb7e896.jpeg',3,36),(61,'919f9f3073a24049b873f174cd8fbfe1.jpeg',4,36),(62,'8f492e0d132f4fa5b13112dded4b5e9b.jpeg',5,36),(63,'437c3d30b4514169a2849f01aa66ec1c.jpeg',6,36),(64,'ea1d5762e04244c68f309af4c1f18f9b.jpeg',7,36),(65,'573897c75c8c47b8b09029280f871593.jpeg',8,36),(66,'sample_berkas.jpg',1,77),(67,'sample_berkas.jpg',2,77),(68,'sample_berkas.jpg',3,77),(69,'sample_berkas.jpg',4,77),(70,'sample_berkas.jpg',5,77),(71,'sample_berkas.jpg',6,77),(72,'sample_berkas.jpg',7,77),(73,'sample_berkas.jpg',8,77),(74,'sample_berkas.jpg',1,78),(75,'sample_berkas.jpg',2,78),(76,'sample_berkas.jpg',3,78),(77,'sample_berkas.jpg',4,78),(78,'sample_berkas.jpg',5,78),(79,'sample_berkas.jpg',6,78),(80,'sample_berkas.jpg',7,78),(81,'sample_berkas.jpg',8,78),(82,'sample_berkas.jpg',1,79),(83,'sample_berkas.jpg',2,79),(84,'sample_berkas.jpg',3,79),(85,'sample_berkas.jpg',4,79),(86,'sample_berkas.jpg',5,79),(87,'sample_berkas.jpg',6,79),(88,'sample_berkas.jpg',7,79),(89,'sample_berkas.jpg',8,79),(90,'sample_berkas.jpg',1,80),(91,'sample_berkas.jpg',2,80),(92,'sample_berkas.jpg',3,80),(93,'sample_berkas.jpg',4,80),(94,'sample_berkas.jpg',5,80),(95,'sample_berkas.jpg',6,80),(96,'sample_berkas.jpg',7,80),(97,'sample_berkas.jpg',8,80),(98,'sample_berkas.jpg',1,81),(99,'sample_berkas.jpg',2,81),(100,'sample_berkas.jpg',3,81),(101,'sample_berkas.jpg',4,81),(102,'sample_berkas.jpg',5,81),(103,'sample_berkas.jpg',6,81),(104,'sample_berkas.jpg',7,81),(105,'sample_berkas.jpg',8,81),(106,'sample_berkas.jpg',1,82),(107,'sample_berkas.jpg',2,82),(108,'sample_berkas.jpg',3,82),(109,'sample_berkas.jpg',4,82),(110,'sample_berkas.jpg',5,82),(111,'sample_berkas.jpg',6,82),(112,'sample_berkas.jpg',7,82),(113,'sample_berkas.jpg',8,82),(114,'sample_berkas.jpg',1,83),(115,'sample_berkas.jpg',2,83),(116,'sample_berkas.jpg',3,83),(117,'sample_berkas.jpg',4,83),(118,'sample_berkas.jpg',5,83),(119,'sample_berkas.jpg',6,83),(120,'sample_berkas.jpg',7,83),(121,'sample_berkas.jpg',8,83),(122,'sample_berkas.jpg',1,84),(123,'sample_berkas.jpg',2,84),(124,'sample_berkas.jpg',3,84),(125,'sample_berkas.jpg',4,84),(126,'sample_berkas.jpg',5,84),(127,'sample_berkas.jpg',6,84),(128,'sample_berkas.jpg',7,84),(129,'sample_berkas.jpg',8,84),(130,'sample_berkas.jpg',1,85),(131,'sample_berkas.jpg',2,85),(132,'sample_berkas.jpg',3,85),(133,'sample_berkas.jpg',4,85),(134,'sample_berkas.jpg',5,85),(135,'sample_berkas.jpg',6,85),(136,'sample_berkas.jpg',7,85),(137,'sample_berkas.jpg',8,85),(138,'sample_berkas.jpg',1,86),(139,'sample_berkas.jpg',2,86),(140,'sample_berkas.jpg',3,86),(141,'sample_berkas.jpg',4,86),(142,'sample_berkas.jpg',5,86),(143,'sample_berkas.jpg',6,86),(144,'sample_berkas.jpg',7,86),(145,'sample_berkas.jpg',8,86),(146,'sample_berkas.jpg',1,87),(147,'sample_berkas.jpg',2,87),(148,'sample_berkas.jpg',3,87),(149,'sample_berkas.jpg',4,87),(150,'sample_berkas.jpg',5,87),(151,'sample_berkas.jpg',6,87),(152,'sample_berkas.jpg',7,87),(153,'sample_berkas.jpg',8,87),(154,'sample_berkas.jpg',1,88),(155,'sample_berkas.jpg',2,88),(156,'sample_berkas.jpg',3,88),(157,'sample_berkas.jpg',4,88),(158,'sample_berkas.jpg',7,88),(159,'sample_berkas.jpg',1,89),(160,'sample_berkas.jpg',2,89),(161,'sample_berkas.jpg',3,89),(162,'sample_berkas.jpg',1,90),(163,'sample_berkas.jpg',2,90),(164,'sample_berkas.jpg',3,90),(165,'sample_berkas.jpg',4,90),(166,'sample_berkas.jpg',5,90),(167,'sample_berkas.jpg',6,90),(168,'sample_berkas.jpg',7,90),(169,'sample_berkas.jpg',8,90),(170,'sample_berkas.jpg',1,91),(171,'sample_berkas.jpg',2,91),(172,'sample_berkas.jpg',3,91),(173,'sample_berkas.jpg',4,91),(174,'sample_berkas.jpg',5,91),(175,'sample_berkas.jpg',6,91),(176,'sample_berkas.jpg',7,91),(177,'sample_berkas.jpg',8,91),(178,'sample_berkas.jpg',1,92),(179,'sample_berkas.jpg',2,92),(180,'sample_berkas.jpg',3,92),(181,'sample_berkas.jpg',4,92),(182,'sample_berkas.jpg',5,92),(183,'sample_berkas.jpg',6,92),(184,'sample_berkas.jpg',7,92),(185,'sample_berkas.jpg',8,92),(186,'sample_berkas.jpg',1,93),(187,'sample_berkas.jpg',2,93),(188,'sample_berkas.jpg',3,93),(189,'sample_berkas.jpg',4,93),(190,'sample_berkas.jpg',5,93),(191,'sample_berkas.jpg',6,93),(192,'sample_berkas.jpg',7,93),(193,'sample_berkas.jpg',8,93),(194,'sample_berkas.jpg',1,94),(195,'sample_berkas.jpg',2,94),(196,'sample_berkas.jpg',3,94),(197,'sample_berkas.jpg',4,94),(198,'sample_berkas.jpg',5,94),(199,'sample_berkas.jpg',6,94),(200,'sample_berkas.jpg',7,94),(201,'sample_berkas.jpg',8,94);
/*!40000 ALTER TABLE `berkas_dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dokter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `alumni` varchar(35) DEFAULT NULL,
  `tahun_alumni` varchar(5) DEFAULT NULL,
  `nama_pasangan` varchar(100) DEFAULT NULL,
  `alamat_rumah` text,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `bidang_kerja` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `id_klinik` int DEFAULT NULL,
  `id_keanggotaan` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dokter_pengguna` (`username`),
  KEY `fk_dokter_klinik` (`id_klinik`),
  KEY `fk_dokter_keanggotaan` (`id_keanggotaan`),
  CONSTRAINT `fk_dokter_keanggotaan` FOREIGN KEY (`id_keanggotaan`) REFERENCES `keanggotaan` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_dokter_klinik` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_dokter_pengguna` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` (`id`, `nama_lengkap`, `nama_panggilan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alumni`, `tahun_alumni`, `nama_pasangan`, `alamat_rumah`, `no_telp`, `email`, `bidang_kerja`, `username`, `id_klinik`, `id_keanggotaan`) VALUES (36,'Drh. Christine Pricilia','Christine','Medan','1992-03-11','Perempuan','Universitas Brawijaya','2001','Erwin Prakasa','Jl. Perintis No.1 RT.01/RW.02, Pondok Aren, Pondok Aren, Tangerang Selatan, Banten.','081807962110','christinepricillia42@gmail.com','Praktek Dokter Hewan','christine',3,5),(41,'Drh. Bima Wirasena','Bima Wirasena','Depok','1989-08-18','Laki-Laki','Institut Pertanian Bogor','2001','Rini Pratiwi','Jl. Perintis No.1 RT.01/RW.02, Pondok Aren, Pondok Aren, Tangerang Selatan, Banten.','081472385025','bimawirasena2@mail.com','Perusahaan Swasta','bima',10,1),(71,'Ayu Cahyaningrum',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ayu',40,35),(72,'Drh. Aldy Pratama',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'aldy',41,36),(73,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test1',42,37),(74,'test2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test2',43,38),(76,'test3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test3',45,40),(77,'Drh. Ahmad Fauzi','Ahmad','Tangerang','1990-05-14','Laki-Laki','Institut Pertanian Bogor','2015','Nurul Hidayah','Jl. Boulevard Bintaro Jaya No. 12, Pondok Aren, Tangerang Selatan','081234567801','ahmad.fauzi@example.com','Praktek Dokter Hewan Mandiri','ahmadfauzi',46,41),(78,'Drh. Siti Nurhaliza','Siti','Serang','1993-02-18','Perempuan','Universitas Gadjah Mada','2017','Rian Hidayat','Komplek Ciceri Indah Blok C No. 4, Serang, Banten','081234567802','siti.nurhaliza@example.com','Klinik Hewan Kesayangan','sitinurhaliza',47,42),(79,'Drh. Bagus Wicaksono','Bagus','Surabaya','1988-11-03','Laki-Laki','Universitas Airlangga','2012','Dwi Astuti','Jl. Pahlawan Seribu Blok F No. 2, BSD City, Tangerang Selatan','081234567803','bagus.wicaksono@example.com','Rumah Sakit Hewan','baguswicaksono',48,43),(80,'Drh. Maya Anggraini','Maya','Pandeglang','1987-07-22','Perempuan','Institut Pertanian Bogor','2011','Agus Priyono','Jl. Raya Labuan KM 4, Saruni, Pandeglang','081234567804','maya.anggraini@example.com','Praktek Mandiri & Ternak','mayaanggraini',49,44),(81,'Drh. Hendra Kurniawan','Hendra','Cilegon','1986-09-12','Laki-Laki','Universitas Brawijaya','2010','Rini Susanti','Perum Krakatau Steel Blok D No. 8, Cilegon','081234567805','hendra.kurniawan@example.com','Industri Pakan Ternak & Praktek','hendrakurniawan',50,45),(82,'Drh. Rina Wulandari','Rina','Bandung','1991-04-29','Perempuan','Universitas Padjadjaran','2016','Doni Kusuma','Jl. Alam Sutera Utama No. 18, Pinang, Kota Tangerang','081234567806','rina.wulandari@example.com','Klinik Hewan Kesayangan','rinawulandari',51,46),(83,'Drh. Dimas Prasetyo','Dimas','Yogyakarta','1992-12-08','Laki-Laki','Universitas Gadjah Mada','2016','Lestari Handayani','Jl. Boulevard Gading Serpong Kav. 22, Kelapa Dua, Tangerang','081234567807','dimas.prasetyo@example.com','Praktek Dokter Hewan Bersama','dimasprasetyo',52,47),(84,'Drh. Farah Nabila','Farah','Jakarta','1989-01-15','Perempuan','Institut Pertanian Bogor','2013','Ilham Pratama','Jl. Cirendeu Raya No. 30, Ciputat Timur, Tangsel','081234567808','farah.nabila@example.com','Praktek Mandiri','farahnabila',53,48),(85,'Drh. Eko Purnomo','Eko','Malang','1985-06-25','Laki-Laki','Universitas Brawijaya','2009','Endang Sri','Jl. Raya Rangkasbitung No. 17, Lebak, Banten','081234567809','eko.purnomo@example.com','Klinik & Peternakan Sapi Perah','ekopurnomo',54,49),(86,'Drh. Annisa Safitri','Annisa','Bogor','1995-08-30','Perempuan','Institut Pertanian Bogor','2019','-','Jl. Graha Raya Bintaro Blok GR 5 No. 8, Serpong Utara','081234567810','annisa.safitri@example.com','Klinik Hewan Kesayangan','annisasafitri',55,50),(87,'Drh. Bayu Pratama','Bayu','Semarang','1994-03-14','Laki-Laki','Universitas Airlangga','2018','Ria Sukma','Jl. Cikupa Asri Blok A2 No. 15, Tangerang Regency','081234567811','bayu.pratama@example.com','Praktek Hewan Eksotik & Kesayangan','bayupratama',56,51),(88,'Drh. Gita Kencana','Gita','Tangerang','1996-10-10','Perempuan','Universitas Syiah Kuala','2020','-','Jl. KH. Hasyim Ashari No. 90, Cipondoh, Kota Tangerang','081234567812','gita.kencana@example.com','Praktek Dokter Hewan','gitagutawa',57,52),(89,'Drh. Rizky Ramadhan','Rizky','Medan','1995-01-21','Laki-Laki','Universitas Hasanuddin','2019','-','Jl. Ciater Raya No. 45, Serpong, Tangerang Selatan','081234567813','rizky.ramadhan@example.com','Praktek Mandiri','rizkyramadhan',58,53),(90,'Drh. Dewi Sartika','Dewi','Solo','1993-11-17','Perempuan','Universitas Gadjah Mada','2017','Teguh Prabowo','Perum Modernland Blok CR No. 11, Kota Tangerang','081234567814','dewi.sartika@example.com','Klinik Hewan Kesayangan','dewisartika',59,54),(91,'Drh. Faisal Basri','Faisal','Palembang','1987-04-10','Laki-Laki','Institut Pertanian Bogor','2011','Mira Lestari','Jl. Raya Serpong KM 8, Pakulonan, Serpong Utara','081234567815','faisal.basri@example.com','Rumah Sakit Hewan','faisalbasri',60,55),(92,'Drh. Indah Permatasari','Indah','Surakarta','1990-09-09','Perempuan','Universitas Airlangga','2014','Bambang Irawan','Jl. Raya Cirendeu No. 12, Ciputat Timur','081234567816','indah.permata@example.com','Praktek Dokter Hewan','indahpermatasari',61,56),(93,'Drh. Denny Setiawan','Denny','Jakarta','1992-07-04','Laki-Laki','Institut Pertanian Bogor','2016','Yuliana Santi','Jl. Villa Melati Mas Blok J No. 14, Serpong Utara','081234567817','denny.setiawan@example.com','Praktek Hewan Kesayangan & Bedah','dennysetiawan',62,57),(94,'Drh. Fitriani Maharani','Fitri','Denpasar','1991-05-16','Perempuan','Universitas Udayana','2015','Ketut Sudarma','Jl. WR Supratman No. 20, Ciputat, Tangsel','081234567818','fitriani.maharani@example.com','Klinik Hewan Kesayangan & Akupunktur','fitrianimaharani',63,58);
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_berkas_dokter`
--

DROP TABLE IF EXISTS `jenis_berkas_dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_berkas_dokter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_berkas` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_berkas_dokter`
--

LOCK TABLES `jenis_berkas_dokter` WRITE;
/*!40000 ALTER TABLE `jenis_berkas_dokter` DISABLE KEYS */;
INSERT INTO `jenis_berkas_dokter` (`id`, `jenis_berkas`) VALUES (1,'pas_foto'),(2,'ijazah'),(3,'ktp'),(4,'kta'),(5,'strv'),(6,'skdhi'),(7,'tf_daftar'),(8,'tf_registrasi');
/*!40000 ALTER TABLE `jenis_berkas_dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keanggotaan`
--

DROP TABLE IF EXISTS `keanggotaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keanggotaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domisili_anggota` varchar(10) DEFAULT NULL,
  `tanggal_terdaftar` date DEFAULT NULL,
  `masa_aktif` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keanggotaan`
--

LOCK TABLES `keanggotaan` WRITE;
/*!40000 ALTER TABLE `keanggotaan` DISABLE KEYS */;
INSERT INTO `keanggotaan` (`id`, `domisili_anggota`, `tanggal_terdaftar`, `masa_aktif`) VALUES (1,'Tetap','2022-07-07','2024-07-14'),(5,'Tamu','2017-02-25','2022-02-20'),(35,NULL,NULL,NULL),(36,NULL,NULL,NULL),(37,NULL,NULL,NULL),(38,NULL,NULL,NULL),(40,NULL,NULL,NULL),(41,'Tetap','2023-08-15','2027-08-15'),(42,'Tetap','2024-01-20','2028-01-20'),(43,'Tetap','2022-12-10','2026-12-10'),(44,'Tetap','2020-03-01','2024-03-01'),(45,'Tetap','2019-11-20','2023-11-20'),(46,'Tamu','2023-05-18','2027-05-18'),(47,'Tamu','2024-06-30','2028-06-30'),(48,'Tamu','2021-02-14','2024-02-14'),(49,'Tamu','2020-09-05','2023-09-05'),(50,'Tetap',NULL,NULL),(51,'Tamu',NULL,NULL),(52,NULL,NULL,NULL),(53,NULL,NULL,NULL),(54,'Tetap',NULL,NULL),(55,'Tetap','2023-10-10','2027-10-10'),(56,'Tamu','2022-11-25','2026-11-25'),(57,'Tetap','2024-04-12','2028-04-12'),(58,'Tamu','2023-09-09','2027-09-09');
/*!40000 ALTER TABLE `keanggotaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_pengguna`
--

DROP TABLE IF EXISTS `kelas_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_pengguna`
--

LOCK TABLES `kelas_pengguna` WRITE;
/*!40000 ALTER TABLE `kelas_pengguna` DISABLE KEYS */;
INSERT INTO `kelas_pengguna` (`id`, `nama`) VALUES (1,'User'),(2,'Admin');
/*!40000 ALTER TABLE `kelas_pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klinik`
--

DROP TABLE IF EXISTS `klinik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `klinik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_klinik` varchar(100) DEFAULT NULL,
  `alamat_klinik` varchar(100) DEFAULT NULL,
  `no_telp_klinik` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klinik`
--

LOCK TABLES `klinik` WRITE;
/*!40000 ALTER TABLE `klinik` DISABLE KEYS */;
INSERT INTO `klinik` (`id`, `nama_klinik`, `alamat_klinik`, `no_telp_klinik`) VALUES (3,'Happy Vet','Jl.Merpati','081287364876'),(10,NULL,NULL,NULL),(40,NULL,NULL,NULL),(41,NULL,NULL,NULL),(42,NULL,NULL,NULL),(43,NULL,NULL,NULL),(45,NULL,NULL,NULL),(46,'Klinik Hewan Sejahtera Bintaro','Ruko Sentra Niaga Blok B No. 5, Pondok Aren, Tangsel','0217451234'),(47,'Serang Pet Clinic & Care','Jl. Veteran No. 88, Kota Serang','0254201999'),(48,'BSD Animal Medical Center','Jl. BSD Grand Boulevard No. 10, Serpong, Tangsel','0215312345'),(49,'Klinik Hewan Berkah Pandeglang','Jl. Ahmad Yani No. 15, Pandeglang','0253201112'),(50,'Cilegon Animal Health Centre','Jl. Sultan Ageng Tirtayasa No. 42, Cilegon','0254391234'),(51,'Alam Sutera Veterinary Clinic','Ruko Sutera Niaga 1 No. 3, Alam Sutera','0212900123'),(52,'Gading Serpong Pet Wellness','Ruko Fluorite Blok FR No. 12, Gading Serpong','0215420112'),(53,'Ciputat Pet Care Centre','Jl. Ir. H. Juanda No. 55, Ciputat','0217402345'),(54,'Rangkasbitung Vet Care','Jl. Multatuli No. 24, Rangkasbitung','0252203344'),(55,'Graha Animal Clinic','Ruko Melia Walk Blok MD No. 10, Graha Raya','0215319888'),(56,'Citra Raya Pet Clinic','Ruko Mardi Gras Blok KC No. 3, Citra Raya','0215961234'),(57,'Cipondoh Pet House','Jl. KH Hasyim Ashari No. 95, Tangerang','0215570123'),(58,'Ciater Pet & Equine Care','Jl. Ciater Barat No. 12, Serpong','0217588123'),(59,'Modernland Vet Clinic','Ruko Modern Town Market Blok A No. 7, Modernland','0215528899'),(60,'Serpong Pet Hospital','Jl. Pahlawan Seribu No. 99, Tangsel','0215381122'),(61,'Cirendeu Vet Care','Jl. Cirendeu Indah No. 3, Ciputat Timur','0217492211'),(62,'Melati Mas Animal Clinic','Ruko Melati Mas Square Blok A No. 1, BSD','0215383344'),(63,'Harmoni Pet Care','Jl. Menjangan Raya No. 8, Ciputat','0217429988');
/*!40000 ALTER TABLE `klinik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengguna` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_pengguna` tinyint NOT NULL,
  `id_kelas_pengguna` int NOT NULL,
  PRIMARY KEY (`username`),
  KEY `fk_pengguna_kelas_pengguna` (`id_kelas_pengguna`),
  CONSTRAINT `fk_pengguna_kelas_pengguna` FOREIGN KEY (`id_kelas_pengguna`) REFERENCES `kelas_pengguna` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`username`, `password`, `status_pengguna`, `id_kelas_pengguna`) VALUES ('ahmadfauzi','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('aldy','$2y$10$L4pC579Ft1RvK4zhqi3URO8vWd655yAWP.4WJog3bt2RgnKcqoA6q',1,1),('annisasafitri','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('ayu','$2y$10$sAPsjjbiZOT.Dbe8Ww34cevIq.7vcHYq2M1Omb7rA1/CG90NUwHBS',1,2),('baguswicaksono','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('bayupratama','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('bima','$2y$10$/GORso/AA6CwDUhsnZg5R.v.AAkYk7nWyib4gved5IVcxHLm5.sxm',1,1),('christine','$2y$10$Z.bTCeuDgXgtTFNcQ9Bjpu9zojcZEKdHfzIib9.AQwekfAj6Eskzm',1,1),('dennysetiawan','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('dewisartika','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('dimasprasetyo','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('ekopurnomo','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('faisalbasri','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',2,1),('farahnabila','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('fitrianimaharani','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('gitagutawa','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('hendrakurniawan','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('indahpermatasari','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',2,1),('mayaanggraini','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('rinawulandari','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('rizkyramadhan','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('sitinurhaliza','$2y$10$dr2nEb5hfXLw9hbAClEseuqGiQdFSTq0LBhcSrIf5ntkJv4e8OhAy',1,1),('test1','$2y$10$NlhCz5iBrsJEDHmrfJjjbehCyuViWaa4RtelPZvibh0wuvncD.H42',1,1),('test2','$2y$10$q5patU7WdLC10de/90pdW.4VoQWGkmdJ3z2FV5J2YZsAEltHgRwy6',1,1),('test3','$2y$10$QgjAb5q1FHY1q2RiFUDNQe2xf8y5M2mJzO04baIbTnkXcPR7lCYhm',1,1);
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-31  0:28:54
