/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - u8152132_rsupayangan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u8152132_rsupayangan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `u8152132_rsupayangan`;

/*Table structure for table `tb_peng_edit_hapus` */

DROP TABLE IF EXISTS `tb_peng_edit_hapus`;

CREATE TABLE `tb_peng_edit_hapus` (
  `id_p_edit_hapus` tinyint(5) NOT NULL AUTO_INCREMENT,
  `pengajuan` text,
  `kepada` tinyint(7) DEFAULT NULL,
  `balasan_pengajuan` text NOT NULL,
  `yang_mengajukan` tinyint(7) DEFAULT NULL,
  PRIMARY KEY (`id_p_edit_hapus`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_peng_edit_hapus` */

insert  into `tb_peng_edit_hapus`(`id_p_edit_hapus`,`pengajuan`,`kepada`,`balasan_pengajuan`,`yang_mengajukan`) values (12,'Saya ingin edit data neraca saldo',3,'ditolak',5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
