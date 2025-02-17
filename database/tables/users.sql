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

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf16;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`mobile`,`password`,`createdOn`) values 
(5,'Ramesh Rusum','mani@gmail.com','9390451420','827ccb0eea8a706c4c34a16891f84e7b','2024-10-06 16:08:18'),
(6,'Ramesh Rusum','mani@gmail.com','9390451420','827ccb0eea8a706c4c34a16891f84e7b','2024-10-06 16:52:46'),
(7,'Ramesh Rusum','rameshrusum2001@gmail.com','9390451420','827ccb0eea8a706c4c34a16891f84e7b','2024-10-06 17:43:30'),
(8,'','','','d41d8cd98f00b204e9800998ecf8427e','2024-10-06 18:00:49');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
