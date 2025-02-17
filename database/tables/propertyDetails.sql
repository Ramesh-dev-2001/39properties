/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.2.0 : Database - properties
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`properties` /*!40100 DEFAULT CHARACTER SET utf16 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `properties`;

/*Table structure for table `propertyDetails` */

DROP TABLE IF EXISTS `propertyDetails`;

CREATE TABLE `propertyDetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `propertyId` int DEFAULT NULL,
  `bedroom` int DEFAULT NULL,
  `bathroom` int DEFAULT NULL,
  `balcony` int DEFAULT NULL,
  `kitchen` int DEFAULT NULL,
  `hall` int DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf16;

/*Data for the table `propertyDetails` */

insert  into `propertyDetails`(`id`,`propertyId`,`bedroom`,`bathroom`,`balcony`,`kitchen`,`hall`,`createdOn`) values 
(9,58,NULL,NULL,NULL,NULL,NULL,'2024-10-07 18:02:34'),
(10,78,NULL,NULL,NULL,NULL,NULL,'2024-10-07 18:02:34'),
(11,81,NULL,NULL,NULL,NULL,NULL,'2024-10-07 18:02:34'),
(12,90,1,2,2,3,2,'2024-10-07 18:02:34'),
(13,108,NULL,NULL,NULL,NULL,NULL,'2024-10-07 18:02:34'),
(14,109,1,2,1,2,2,'2024-10-07 18:02:34');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
