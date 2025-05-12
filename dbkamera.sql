-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.44 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbkamera
CREATE DATABASE IF NOT EXISTS `dbkamera` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbkamera`;

-- Dumping structure for table dbkamera.gambar
CREATE TABLE IF NOT EXISTS `gambar` (
  `kodegambar` varchar(6) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `tglupload` datetime DEFAULT NULL,
  `onview` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkamera.gambar: ~8 rows (approximately)
INSERT INTO `gambar` (`kodegambar`, `path`, `tglupload`, `onview`) VALUES
	('GR0001', 'upload/1744971985_680228d12c2f8.png', '2025-04-18 17:26:25', 1),
	('GR0002', 'upload/1744972043_6802290b3d8ed.png', '2025-04-18 17:27:23', 1),
	('GR0003', 'upload/1744972047_6802290faffa4.png', '2025-04-18 17:27:27', 1),
	('GR0004', 'upload/1744972459_68022aab4fc6b.png', '2025-04-18 17:34:19', 1),
	('GR0005', 'upload/1745003781_6802a505b9dfb.png', '2025-04-19 02:16:21', 1),
	('GR0006', 'upload/1745005387_6802ab4b4127d.png', '2025-04-19 02:43:07', 1),
	('GR0007', 'upload/1745005664_6802ac608e732.png', '2025-04-19 02:47:44', 1),
	('GR0008', 'upload/1745005677_6802ac6d27329.png', '2025-04-19 02:47:57', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
