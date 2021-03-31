/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - siltap_base
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`siltap_base` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `siltap_base`;

/*Table structure for table `ref_kelompok_jabatan` */

DROP TABLE IF EXISTS `ref_kelompok_jabatan`;

CREATE TABLE `ref_kelompok_jabatan` (
  `KJabatanId` int(11) NOT NULL AUTO_INCREMENT,
  `KJabatanNama` varchar(200) DEFAULT NULL,
  `GajiTetap` int(11) DEFAULT NULL,
  `BpjsKesehatan1` decimal(10,0) DEFAULT NULL,
  `BpjsKesehatan2` decimal(10,0) DEFAULT NULL,
  `BpjsJkk` decimal(10,0) DEFAULT NULL,
  `BpjsJkm` decimal(10,0) DEFAULT NULL,
  `BpjsJht` decimal(10,0) DEFAULT NULL,
  `BpjsJp` decimal(10,0) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  PRIMARY KEY (`KJabatanId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_kelompok_jabatan` */

insert  into `ref_kelompok_jabatan`(`KJabatanId`,`KJabatanNama`,`GajiTetap`,`BpjsKesehatan1`,`BpjsKesehatan2`,`BpjsJkk`,`BpjsJkm`,`BpjsJht`,`BpjsJp`,`Status`) values 
(1,'Kepala Desa Non Pns',2426640,24266,97064,5824,7280,0,0,1),
(2,'Kepala Desa Pns',2426640,0,0,0,0,0,0,1),
(3,'Seketaris Desa Non Pns\r\n',2224420,22244,88976,5338,6673,0,0,1),
(4,'Seketaris Desa Pns\r\n',1500000,0,0,0,0,0,0,1),
(5,'Perangkat Desa\r\n',2022200,20222,80888,4853,6066,0,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
