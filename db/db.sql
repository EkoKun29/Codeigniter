/*
SQLyog Ultimate
MySQL - 10.4.14-MariaDB : Database - desk_tik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `yk_aksi` */

CREATE TABLE `yk_aksi` (
  `AksiId` int(3) NOT NULL AUTO_INCREMENT,
  `AksiName` char(100) DEFAULT NULL,
  `AksiFungsi` char(250) DEFAULT NULL,
  PRIMARY KEY (`AksiId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `yk_aksi` */

insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (1,'Lihat','index');
insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (2,'Cari','search');
insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (3,'Tambah','add');
insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (4,'Ubah','update');
insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (5,'Hapus','delete');
insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (6,'Detail','detail');
insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (7,'Cetak','cetak');
insert  into `yk_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values (8,'Export','export');

/*Table structure for table `yk_group` */

CREATE TABLE `yk_group` (
  `GroupId` int(3) NOT NULL AUTO_INCREMENT,
  `GroupName` char(150) DEFAULT NULL,
  `GroupDescription` char(255) DEFAULT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `yk_group` */

insert  into `yk_group`(`GroupId`,`GroupName`,`GroupDescription`) values (1,'Super Administrator','Responsible for technical systems');
insert  into `yk_group`(`GroupId`,`GroupName`,`GroupDescription`) values (2,'Pengelola','Pengelola');

/*Table structure for table `yk_group_menu_aksi` */

CREATE TABLE `yk_group_menu_aksi` (
  `GroupMenuMenuAksiId` int(3) DEFAULT NULL,
  `GroupMenuGroupId` int(3) DEFAULT NULL,
  `GroupMenuSegmen` varchar(250) DEFAULT NULL,
  KEY `FK_ci_group_menu_dummy_menu` (`GroupMenuMenuAksiId`),
  KEY `FK_ci_group_menu_aksi` (`GroupMenuGroupId`),
  KEY `segen` (`GroupMenuSegmen`),
  CONSTRAINT `FK_ci_group_menu_aksi` FOREIGN KEY (`GroupMenuGroupId`) REFERENCES `yk_group` (`GroupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ci_group_menu_aksi_aksi` FOREIGN KEY (`GroupMenuMenuAksiId`) REFERENCES `yk_menu_aksi` (`MenuAksiId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `yk_group_menu_aksi` */

insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (1,1,'sistem/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (2,1,'sistem/group/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (3,1,'sistem/group/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (4,1,'sistem/group/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (5,1,'sistem/group/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (6,1,'sistem/group/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (7,1,'sistem/user/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (8,1,'sistem/user/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (9,1,'sistem/user/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (10,1,'sistem/user/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (11,1,'sistem/user/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (12,1,'sistem/menu/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (13,1,'sistem/menu/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (14,1,'sistem/menu/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (15,1,'sistem/menu/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (16,1,'sistem/menu/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (17,1,'sistem/auth/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (18,1,'sistem/auth/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (19,1,'sistem/auth/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (84,1,'master/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (247,1,'master/kecamatan/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (248,1,'master/kecamatan/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (249,1,'master/kecamatan/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (250,1,'master/kecamatan/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (251,1,'master/kecamatan/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (252,1,'master/kecamatan/detail');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (253,1,'master/kecamatan/cetak');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (254,1,'master/kecamatan/export');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (255,1,'master/desa/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (256,1,'master/desa/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (257,1,'master/desa/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (258,1,'master/desa/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (259,1,'master/desa/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (260,1,'master/desa/detail');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (261,1,'master/desa/cetak');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (262,1,'master/desa/export');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (263,1,'master/perangkat/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (264,1,'master/perangkat/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (265,1,'master/perangkat/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (266,1,'master/perangkat/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (267,1,'master/perangkat/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (268,1,'master/perangkat/detail');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (269,1,'master/perangkat/cetak');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (270,1,'master/perangkat/export');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (1,2,'sistem/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (7,2,'sistem/user/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (8,2,'sistem/user/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (9,2,'sistem/user/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (10,2,'sistem/user/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (11,2,'sistem/user/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (84,2,'master/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (247,2,'master/kecamatan/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (248,2,'master/kecamatan/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (249,2,'master/kecamatan/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (250,2,'master/kecamatan/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (251,2,'master/kecamatan/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (252,2,'master/kecamatan/detail');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (253,2,'master/kecamatan/cetak');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (254,2,'master/kecamatan/export');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (255,2,'master/desa/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (256,2,'master/desa/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (257,2,'master/desa/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (258,2,'master/desa/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (259,2,'master/desa/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (260,2,'master/desa/detail');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (261,2,'master/desa/cetak');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (262,2,'master/desa/export');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (263,2,'master/perangkat/index');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (264,2,'master/perangkat/search');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (265,2,'master/perangkat/add');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (266,2,'master/perangkat/update');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (267,2,'master/perangkat/delete');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (268,2,'master/perangkat/detail');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (269,2,'master/perangkat/cetak');
insert  into `yk_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values (270,2,'master/perangkat/export');

/*Table structure for table `yk_menu` */

CREATE TABLE `yk_menu` (
  `MenuId` int(3) NOT NULL AUTO_INCREMENT,
  `MenuParentId` int(3) DEFAULT NULL,
  `MenuName` char(150) DEFAULT NULL,
  `MenuModule` char(150) DEFAULT NULL,
  `MenuHasSubmenu` tinyint(1) NOT NULL DEFAULT 0,
  `MenuIcon` char(50) DEFAULT NULL,
  `MenuOrder` int(2) DEFAULT NULL,
  `MenuIsShow` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `yk_menu` */

insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (1,0,'Sistem','sistem',1,'settings',1,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (2,1,'Group','sistem/group',0,NULL,1,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (3,1,'User','sistem/user',0,NULL,2,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (4,1,'Menu','sistem/menu',0,NULL,3,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (5,1,'Hak Akses','sistem/auth',0,'',4,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (18,0,'Master','master',1,'list',2,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (46,18,'Kecamatan','master/kecamatan',0,'',2,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (47,18,'Desa','master/desa',0,'',3,'1');
insert  into `yk_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuHasSubmenu`,`MenuIcon`,`MenuOrder`,`MenuIsShow`) values (48,18,'Perangkat Desa','master/perangkat',0,'',4,'1');

/*Table structure for table `yk_menu_aksi` */

CREATE TABLE `yk_menu_aksi` (
  `MenuAksiId` int(6) NOT NULL AUTO_INCREMENT,
  `MenuAksiMenuId` int(6) DEFAULT NULL,
  `MenuAksiAksiId` int(3) DEFAULT NULL,
  PRIMARY KEY (`MenuAksiId`),
  KEY `FK_ci_dummy_menu_aksi` (`MenuAksiMenuId`),
  KEY `FK_ci_dummy_menu_aksi_aksi` (`MenuAksiAksiId`),
  CONSTRAINT `FK_yk_menu_aksi` FOREIGN KEY (`MenuAksiAksiId`) REFERENCES `yk_aksi` (`AksiId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_yk_menu_menu` FOREIGN KEY (`MenuAksiMenuId`) REFERENCES `yk_menu` (`MenuId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=latin1;

/*Data for the table `yk_menu_aksi` */

insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (1,1,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (2,2,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (3,2,2);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (4,2,3);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (5,2,4);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (6,2,5);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (7,3,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (8,3,2);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (9,3,3);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (10,3,4);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (11,3,5);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (12,4,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (13,4,2);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (14,4,3);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (15,4,4);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (16,4,5);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (17,5,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (18,5,2);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (19,5,4);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (84,18,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (247,46,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (248,46,2);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (249,46,3);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (250,46,4);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (251,46,5);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (252,46,6);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (253,46,7);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (254,46,8);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (255,47,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (256,47,2);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (257,47,3);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (258,47,4);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (259,47,5);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (260,47,6);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (261,47,7);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (262,47,8);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (263,48,1);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (264,48,2);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (265,48,3);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (266,48,4);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (267,48,5);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (268,48,6);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (269,48,7);
insert  into `yk_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values (270,48,8);

/*Table structure for table `yk_user` */

CREATE TABLE `yk_user` (
  `UserId` int(6) NOT NULL AUTO_INCREMENT,
  `UserNip` varchar(20) DEFAULT NULL,
  `UserRealName` char(250) DEFAULT NULL,
  `UserName` char(150) DEFAULT NULL,
  `UserPassword` char(40) DEFAULT NULL,
  `UserActive` tinyint(1) DEFAULT 0,
  `UserHp` varchar(20) DEFAULT NULL,
  `UserEmail` varchar(250) DEFAULT '',
  `UserFoto` varchar(250) DEFAULT NULL,
  `UserExpired` date NOT NULL,
  `UserLastLogin` datetime DEFAULT NULL,
  `UserNote` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `NewIndex1` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=431 DEFAULT CHARSET=latin1;

/*Data for the table `yk_user` */

insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (1,'','Super Administrator','admin','76767a368c1f9e446847c2645a9796530a2c69b5',1,'','','','0000-00-00','0000-00-00 00:00:00','admin');
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (3,'','Sekretariat Daerah','Sekretariat Daerah','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (4,'','Sekretariat Dewan','Sekretariat Dewan','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (5,'','BAPPEDA Pati','BAPPEDA Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (6,'','BPBD Pati','BPBD Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (7,'','BPKAD Pati','BPKAD Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (8,'','Dinas Arpusda Pati','Dinas Arpusda Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (9,'','Dinas Ketahanan Pangan Pati','Dinas Ketahanan Pangan Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (10,'','Dinkes Pati','Dinkes Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (11,'','Dinkopumkm Pati','Dinkopumkm Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (12,'','Dinporapar Pati','Dinporapar Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (13,'','Dinsos Pati','Dinsos Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (14,'','Disdagperin Pati','Disdagperin Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (15,'','Disdikbud Pati','Disdikbud Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (16,'','Disdukcapil Pati','Disdukcapil Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (17,'','Dishub Pati','Dishub Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (18,'','Diskominfo Pati','Diskominfo Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (19,'','Disnaker Pati','Disnaker Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (20,'','Disperkim Pati','Disperkim Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (21,'','Dispermades Pati','Dispermades Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (22,'','Dispertan Pati','Dispertan Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (23,'','DKP Pati','DKP Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (24,'','DLH Pati','DLH Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (25,'','DPMPTSP Pati','DPMPTSP Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (26,'','DPUTR Pati','DPUTR Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (27,'','Inspektorat Pati','Inspektorat Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (28,'','Kesbangpol Pati','Kesbangpol Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (29,'','SatpolPP Pati','SatpolPP Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (30,'','RSUD Soewondo Pati','RSUD Soewondo Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (31,'','RSU Kayen Pati','RSU Kayen Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (32,'','Kecamatan Batangan Pati','Kecamatan Batangan Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (33,'','Kecamatan Cluwak Pati','Kecamatan Cluwak Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (34,'','Kecamatan Dukuhseti Pati','Kecamatan Dukuhseti Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (35,'','Kecamatan Gabus Pati','Kecamatan Gabus Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (36,'','Kecamatan Gembong Pati','Kecamatan Gembong Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (37,'','Kecamatan Gunungwungkal Pati','Kecamatan Gunungwungkal Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (38,'','Kecamatan Jaken Pati','Kecamatan Jaken Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (39,'','Kecamatan Jakenan Pati','Kecamatan Jakenan Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (40,'','Kecamatan Juwana Pati','Kecamatan Juwana Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (41,'','Kecamatan Kayen Pati','Kecamatan Kayen Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (42,'','Kecamatan Margorejo Pati','Kecamatan Margorejo Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (43,'','Kecamatan Margoyoso Pati','Kecamatan Margoyoso Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (44,'','Kecamatan Pati Kab. Pati','Kecamatan Pati Kab. Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (45,'','Kecamatan Pucakwangi Pati','Kecamatan Pucakwangi Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (46,'','Kecamatan Sukolilo Pati','Kecamatan Sukolilo Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (47,'','Kecamatan Tambakromo Pati','Kecamatan Tambakromo Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (48,'','Kecamatan Tayu Pati','Kecamatan Tayu Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (49,'','Kecamatan Tlogowungu Pati','Kecamatan Tlogowungu Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (50,'','Kecamatan Trangkil Pati','Kecamatan Trangkil Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (51,'','Kecamatan Wedarijaksa Pati','Kecamatan Wedarijaksa Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);
insert  into `yk_user`(`UserId`,`UserNip`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserHp`,`UserEmail`,`UserFoto`,`UserExpired`,`UserLastLogin`,`UserNote`) values (52,'','Kecamatan Winong Pati','Kecamatan Winong Pati','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',1,'','','','0000-00-00','0000-00-00 00:00:00',NULL);

/*Table structure for table `yk_user_group` */

CREATE TABLE `yk_user_group` (
  `UserGroupUserId` int(10) NOT NULL,
  `UserGroupGroupId` int(5) NOT NULL,
  PRIMARY KEY (`UserGroupUserId`,`UserGroupGroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `yk_user_group` */

insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (1,1);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (2,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (3,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (4,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (5,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (6,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (7,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (8,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (9,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (10,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (11,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (12,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (13,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (14,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (15,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (16,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (17,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (18,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (19,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (20,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (21,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (22,4);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (23,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (24,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (25,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (26,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (27,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (28,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (29,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (30,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (31,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (32,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (33,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (34,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (35,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (36,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (37,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (38,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (39,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (40,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (41,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (42,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (43,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (44,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (45,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (46,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (47,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (48,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (49,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (50,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (51,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (52,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (53,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (54,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (55,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (56,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (57,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (58,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (59,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (60,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (61,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (62,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (63,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (64,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (65,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (66,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (67,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (68,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (69,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (70,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (71,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (72,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (73,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (74,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (75,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (76,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (77,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (78,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (79,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (80,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (81,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (82,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (83,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (84,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (85,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (86,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (87,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (88,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (89,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (90,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (91,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (92,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (93,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (94,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (95,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (96,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (97,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (98,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (99,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (100,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (101,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (102,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (103,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (104,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (105,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (106,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (107,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (108,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (109,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (110,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (111,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (112,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (113,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (114,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (115,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (116,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (117,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (118,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (119,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (120,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (121,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (122,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (123,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (124,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (125,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (126,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (127,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (128,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (129,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (130,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (131,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (132,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (133,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (134,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (135,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (136,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (137,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (138,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (139,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (140,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (141,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (142,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (143,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (144,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (145,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (146,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (147,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (148,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (149,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (150,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (151,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (152,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (153,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (154,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (155,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (156,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (157,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (158,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (159,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (160,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (161,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (162,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (163,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (164,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (165,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (166,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (167,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (168,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (169,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (170,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (171,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (172,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (173,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (174,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (175,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (176,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (177,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (178,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (179,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (180,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (181,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (182,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (183,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (184,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (185,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (186,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (187,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (188,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (189,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (190,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (191,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (192,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (193,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (194,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (195,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (196,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (197,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (198,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (199,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (200,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (201,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (202,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (203,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (204,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (205,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (206,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (207,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (208,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (209,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (210,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (211,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (212,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (213,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (214,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (215,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (216,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (217,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (218,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (219,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (220,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (221,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (222,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (223,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (224,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (225,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (226,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (227,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (228,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (229,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (230,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (231,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (232,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (233,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (234,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (235,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (236,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (237,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (238,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (239,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (240,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (241,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (242,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (243,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (244,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (245,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (246,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (247,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (248,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (249,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (250,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (251,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (252,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (253,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (254,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (255,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (256,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (257,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (258,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (259,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (260,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (261,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (262,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (263,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (264,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (265,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (266,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (267,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (268,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (269,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (270,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (271,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (272,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (273,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (274,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (275,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (276,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (277,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (278,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (279,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (280,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (281,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (282,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (283,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (284,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (285,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (286,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (287,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (288,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (289,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (290,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (291,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (292,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (293,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (294,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (295,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (296,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (297,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (298,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (299,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (300,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (301,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (302,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (303,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (304,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (305,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (306,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (307,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (308,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (309,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (310,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (311,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (312,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (313,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (314,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (315,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (316,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (317,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (318,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (319,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (320,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (321,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (322,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (323,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (324,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (325,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (326,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (327,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (328,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (329,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (330,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (331,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (332,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (333,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (334,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (335,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (336,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (337,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (338,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (339,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (340,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (341,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (342,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (343,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (344,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (345,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (346,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (347,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (348,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (349,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (350,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (351,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (352,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (353,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (354,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (355,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (356,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (357,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (358,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (359,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (360,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (361,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (362,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (363,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (364,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (365,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (366,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (367,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (368,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (369,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (370,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (371,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (372,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (373,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (374,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (375,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (376,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (377,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (378,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (379,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (380,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (381,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (382,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (383,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (384,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (385,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (386,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (387,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (388,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (389,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (390,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (391,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (392,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (393,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (394,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (395,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (396,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (397,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (398,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (399,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (400,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (401,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (402,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (403,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (404,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (405,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (406,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (407,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (408,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (409,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (410,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (411,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (412,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (413,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (414,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (415,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (416,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (417,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (418,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (419,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (420,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (421,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (422,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (423,3);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (424,2);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (425,5);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (426,5);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (427,5);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (428,5);
insert  into `yk_user_group`(`UserGroupUserId`,`UserGroupGroupId`) values (429,5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
