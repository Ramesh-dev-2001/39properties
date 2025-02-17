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

/*Table structure for table `agents` */

DROP TABLE IF EXISTS `agents`;

CREATE TABLE `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `countryId` int DEFAULT '0',
  `stateId` int DEFAULT '0',
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('A','D','I','S','R') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'A',
  `isApproved` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

/*Data for the table `agents` */

insert  into `agents`(`id`,`firstName`,`lastName`,`email`,`mobile`,`countryId`,`stateId`,`createdOn`,`modifiedOn`,`status`,`isApproved`) values 
(1,'srimani','Chennam','mani@gmail.com','8555005489',1,2,'2024-08-29 13:53:07','2024-08-29 13:53:07','S',1),
(3,'Ram','Rusum','rameshrusum2001@gmail.com','9390451420',0,0,'2024-09-17 13:55:01','2024-09-17 13:55:01','A',1),
(8,'teja','Kollapudi','mani@gmail.com','09390451420',1,3,'2024-09-17 14:07:26','2024-09-17 14:07:26','A',1),
(9,'test','test','test@gmail.com','1234567890',1,1,'2024-09-18 11:54:23','2024-09-18 11:54:23','A',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
