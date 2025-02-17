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
  `expiryDate` date DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('A','D','I','S','R') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'A',
  `isApproved` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

/*Data for the table `agents` */

insert  into `agents`(`id`,`firstName`,`lastName`,`email`,`mobile`,`countryId`,`stateId`,`expiryDate`,`createdOn`,`modifiedOn`,`status`,`isApproved`) values 
(1,'Srimani','Chennam','mani@gmail.com','8555005489',1,2,'2024-10-24','2024-08-29 13:53:07','2024-08-29 13:53:07','A',1),
(3,'Ramesh','Rusum','rameshrusum2001@gmail.com','9390451420',1,1,'2024-10-08','2024-09-17 13:55:01','2024-09-17 13:55:01','A',1),
(8,'teja','Kollapudi','teja@gmail.com','9390451420',1,3,'2024-10-30','2024-09-17 14:07:26','2024-09-17 14:07:26','A',0),
(9,'test','test','test@gmail.com','1234567890',1,1,'2025-10-06','2024-09-18 11:54:23','2024-09-18 11:54:23','A',1),
(15,'Chiranjeevi','Konidala','chiru@gmail.com','9390451420',1,2,'2024-11-06','2024-09-25 12:01:34','2024-09-25 12:01:34','A',0),
(16,'Charan','Deva','charan@gmail.com','9874563210',1,1,'2024-11-06','2024-09-25 12:19:44','2024-09-25 12:19:44','A',0),
(18,'pavan','Kollapudi','teja@gmail.com','9390451420',1,2,'2024-12-06','2024-09-25 17:21:23','2024-09-25 17:21:23','A',0),
(19,'frdrf','ashok','frdrf@gmail.com','96399258',1,1,'2024-10-11','2024-10-07 16:56:43','2024-10-07 16:56:43','A',0),
(20,'test','test','test@gmail.com','8527419630',1,3,'2025-01-08','2025-01-08 08:25:08','2025-01-08 08:25:08','A',0);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) DEFAULT NULL,
  `status` enum('A','I') DEFAULT 'A',
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

/*Data for the table `categories` */

insert  into `categories`(`id`,`categoryName`,`status`,`createdOn`) values 
(1,'Flat/Apartment','A','2024-08-29 13:51:24'),
(2,'Residential Land','A','2024-08-29 13:51:34'),
(3,'Farm House','A','2024-08-29 13:51:56'),
(4,'Independent House/Villa','A','2024-08-29 13:52:16'),
(5,'Farming Land','A','2024-08-29 13:52:19'),
(8,'Other','A','2024-10-09 12:10:36');

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `countryId` int DEFAULT '0',
  `stateId` int DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `status` enum('A','I') CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf16;

/*Data for the table `city` */

insert  into `city`(`id`,`countryId`,`stateId`,`name`,`status`) values 
(1,1,1,'Narasaraopet','A'),
(2,1,2,'Hyderabad','A'),
(3,1,2,'warangal','A'),
(4,1,1,'Guntur','A'),
(5,2,4,'virgina','A'),
(6,2,4,'Dallas','A'),
(7,1,1,'vizag','A');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `status` enum('A','D','I') DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

/*Data for the table `countries` */

insert  into `countries`(`id`,`name`,`status`) values 
(1,'India','A'),
(2,'America','A'),
(3,'South America','A'),
(4,'Australia','A'),
(5,'Canada','A');

/*Table structure for table `customerconnects` */

DROP TABLE IF EXISTS `customerconnects`;

CREATE TABLE `customerconnects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `propertyId` int DEFAULT NULL,
  `agentId` int DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `message` text,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf16;

/*Data for the table `customerconnects` */

insert  into `customerconnects`(`id`,`propertyId`,`agentId`,`name`,`email`,`mobile`,`message`,`createdOn`) values 
(8,137,16,'Ramesh Rusum','mani@gmail.com','09390451420','tyhtjy','2024-10-13 19:00:12'),
(9,137,16,'Ramesh Rusum','mani@gmail.com','09390451420','tyhtjy','2024-10-13 19:00:58'),
(10,137,16,'Ramesh Rusum','mani@gmail.com','09390451420','tyhtjy','2024-10-13 19:02:13'),
(11,137,16,'Ramesh Rusum','info@fanadaq.com','09390451420','xbvn','2024-10-13 19:03:11'),
(12,137,16,'Ramesh Rusum','info@fanadaq.com','09390451420','','2024-10-14 07:05:17'),
(13,137,16,'Ramesh Rusum','info@property.com','09390451420','test','2024-10-14 07:15:59'),
(14,81,3,'Ramesh Rusum','info@fanadaq.com','09390451420','test','2024-10-14 07:17:44'),
(15,140,3,'Ramesh Rusum','mani@gmail.com','9390451420','Test','2025-01-08 08:17:37'),
(16,140,3,'Ramesh Rusum','rameshrusum2001@gmail.com','9390451420','hello','2025-01-08 08:18:35');

/*Table structure for table `facingtype` */

DROP TABLE IF EXISTS `facingtype`;

CREATE TABLE `facingtype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;

/*Data for the table `facingtype` */

insert  into `facingtype`(`id`,`type`) values 
(1,'North'),
(2,'South'),
(3,'East'),
(4,'West'),
(5,'Other');

/*Table structure for table `features` */

DROP TABLE IF EXISTS `features`;

CREATE TABLE `features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `status` enum('A','I') DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf16;

/*Data for the table `features` */

insert  into `features`(`id`,`name`,`status`) values 
(1,'Swimming Pool','A'),
(2,'Parking','A'),
(3,'Gym','A'),
(4,'CCTV','A'),
(5,'Alivator','A'),
(6,'Security','A');

/*Table structure for table `loginaccounts` */

DROP TABLE IF EXISTS `loginaccounts`;

CREATE TABLE `loginaccounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agentId` int DEFAULT '0',
  `type` enum('MASTER','AGENT','USER') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int DEFAULT '0',
  `modifiedBy` int DEFAULT '0',
  `status` enum('A','I','D','S') DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

/*Data for the table `loginaccounts` */

insert  into `loginaccounts`(`id`,`agentId`,`type`,`email`,`password`,`createdOn`,`modifiedOn`,`createdBy`,`modifiedBy`,`status`) values 
(1,0,'MASTER','info@property.com','827ccb0eea8a706c4c34a16891f84e7b','2024-08-29 13:53:56','2024-08-29 13:53:56',0,0,'A'),
(2,1,'AGENT','mani@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2024-09-16 13:06:14','2024-09-16 13:06:19',0,0,'A'),
(24,3,'AGENT','rameshrusum2001@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2024-10-08 15:42:23','2024-10-08 15:42:23',0,0,'A'),
(25,9,'AGENT','test@gmail.com','2467d3744600858cc9026d5ac6005305','2024-10-09 11:17:07','2024-10-09 11:17:07',0,0,'A');

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `KeyName` varchar(50) DEFAULT NULL,
  `value` int DEFAULT '0',
  `status` enum('A','I') DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;

/*Data for the table `notification` */

insert  into `notification`(`id`,`KeyName`,`value`,`status`) values 
(1,'property',0,'A');

/*Table structure for table `properties` */

DROP TABLE IF EXISTS `properties`;

CREATE TABLE `properties` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agentId` int DEFAULT '0',
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `categoryId` int DEFAULT '0',
  `bhk` int DEFAULT '0',
  `saletypeId` int DEFAULT '0',
  `facingType` int DEFAULT '0',
  `floor` int DEFAULT '0',
  `totalFloor` int DEFAULT '0',
  `price` decimal(10,0) DEFAULT '0',
  `areaSize` varchar(50) DEFAULT NULL,
  `cityId` int DEFAULT NULL,
  `area` text,
  `address` text,
  `url` text,
  `views` int DEFAULT NULL,
  `userId` int DEFAULT NULL,
  `countryId` int DEFAULT NULL,
  `stateId` int DEFAULT NULL,
  `propertyAge` int DEFAULT '0',
  `featuresId` varchar(300) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `mainImage` varchar(50) DEFAULT NULL,
  `otherImages` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `floorPlanImage` varchar(50) DEFAULT NULL,
  `status` enum('A','I','D','S','') DEFAULT 'A',
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isApproved` tinyint(1) DEFAULT '0',
  `isFeatured` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf16;

/*Data for the table `properties` */

insert  into `properties`(`id`,`agentId`,`title`,`description`,`categoryId`,`bhk`,`saletypeId`,`facingType`,`floor`,`totalFloor`,`price`,`areaSize`,`cityId`,`area`,`address`,`url`,`views`,`userId`,`countryId`,`stateId`,`propertyAge`,`featuresId`,`mainImage`,`otherImages`,`floorPlanImage`,`status`,`createdOn`,`modifiedOn`,`isApproved`,`isFeatured`) values 
(58,15,'Chiru Estates','                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Testing                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ',1,5,1,3,8,11,2500000,'2000',7,'Rishikonda','                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Rishikonda Beach, Vizag, Andhra Pradesh -522302                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ','https://maps.app.goo.gl/y3fgkMn37tvK9hrS6',NULL,0,1,1,1,'','1727584640.jpg','a:2:{i:0;s:16:\"17275853870.jpeg\";i:1;s:16:\"17281970780.jpeg\";}','1727585386.jpg','A','2024-09-26 16:19:54','2024-09-26 16:19:54',1,0),
(78,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/BGjaaEJ6VVLbeUGG7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(81,3,'Tulip plaza','Test',2,1,1,1,1,1,8500000,'1563',2,'Kukatpally','Test','https://maps.app.goo.gl/BGjaaEJ6VVLbeUGG7',3,0,1,2,3,'a:3:{i:0;s:9:\"2_feature\";i:1;s:9:\"3_feature\";i:2;s:9:\"4_feature\";}','1728389801.jpg','a:3:{i:0;s:16:\"17283896820.jpeg\";i:1;s:16:\"17283897231.jpeg\";i:2;s:16:\"17283898020.jpeg\";}','1728389802.jpg','A','2024-10-03 15:41:04','2024-10-03 15:41:04',1,1),
(90,3,'Ramesh Plaza','Available for Sale',2,3,2,3,5,6,9000000,'4000',1,'Barampet','Nrt','https://maps.app.goo.gl/BGjaaEJ6VVLbeUGG7',NULL,0,1,1,2,'a:2:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";}','1728197110.jpeg','a:4:{i:0;s:16:\"17281966900.jpeg\";i:1;s:16:\"17281970980.jpeg\";i:2;s:16:\"17284477060.jpeg\";i:3;s:16:\"17284477061.jpeg\";}','1728196702.jpg','A','2024-10-06 12:04:53','2024-10-06 12:04:53',1,0),
(127,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/BGjaaEJ6VVLbeUGG7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(128,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/BGjaaEJ6VVLbeUGG7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(129,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/BGjaaEJ6VVLbeUGG7',1,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(130,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(131,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(132,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',1,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(133,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(134,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(135,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',NULL,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(136,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',1,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(137,16,'Charan Developers','                                                                                                                                                                                              test                                                                                                                                                                                            ',2,4,2,1,10,15,300000,'4000',1,'Barampet','                                                                                                                                                                                1-183, kunkalagunta, Nekarikallu                                                                                                                                                                ','https://maps.app.goo.gl/rDY3PcqiujTfAwkf7',4,0,2,4,12,'a:6:{i:0;s:9:\"1_feature\";i:1;s:9:\"2_feature\";i:2;s:9:\"3_feature\";i:3;s:9:\"4_feature\";i:4;s:9:\"5_feature\";i:5;s:9:\"6_feature\";}','1728196896.jpeg','a:2:{i:0;s:16:\"17281970371.jpeg\";i:1;s:16:\"17281970590.jpeg\";}','1727585539.jpg','A','2024-09-26 17:00:09','2024-09-26 17:00:09',1,0),
(139,15,'Chiru Estates','                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Testing                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ',3,5,1,3,8,11,2500000,'2000',7,'Rishikonda','                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Rishikonda Beach, Vizag, Andhra Pradesh -522302                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ','https://maps.app.goo.gl/y3fgkMn37tvK9hrS6',2,0,1,1,1,'','1727584640.jpg','a:2:{i:0;s:16:\"17275853870.jpeg\";i:1;s:16:\"17281970780.jpeg\";}','1727585386.jpg','A','2024-09-26 16:19:54','2024-09-26 16:19:54',1,0),
(140,3,'Hello','Test',8,0,2,1,0,0,0,'1456',1,'Barampet','Test','https://maps.app.goo.gl/RRtd1dEq3wXVqLQo9',15,3,1,1,0,'a:1:{i:0;s:9:\"6_feature\";}','1728640707.jpg','a:2:{i:0;s:16:\"17286405200.jpeg\";i:1;s:16:\"17286405201.jpeg\";}','17286405200.jpeg','A','2024-10-11 15:25:20','2024-10-11 15:25:20',1,0);

/*Table structure for table `propertydetails` */

DROP TABLE IF EXISTS `propertydetails`;

CREATE TABLE `propertydetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `propertyId` int DEFAULT NULL,
  `bedroom` int DEFAULT NULL,
  `bathroom` int DEFAULT NULL,
  `balcony` int DEFAULT NULL,
  `kitchen` int DEFAULT NULL,
  `hall` int DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf16;

/*Data for the table `propertydetails` */

insert  into `propertydetails`(`id`,`propertyId`,`bedroom`,`bathroom`,`balcony`,`kitchen`,`hall`,`createdOn`) values 
(9,58,0,0,0,0,0,'2024-10-07 18:02:34'),
(10,78,1,1,1,1,1,'2024-10-07 18:02:34'),
(11,81,2,2,2,2,2,'2024-10-07 18:02:34'),
(12,90,1,2,2,3,2,'2024-10-07 18:02:34'),
(30,127,1,3,1,1,2,'2024-10-11 13:00:07'),
(31,128,1,3,1,1,2,'2024-10-11 13:00:07'),
(32,129,1,3,1,1,2,'2024-10-11 13:00:07'),
(33,130,1,2,1,1,1,'2024-10-11 13:00:07'),
(34,131,2,1,2,1,1,'2024-10-11 13:00:07'),
(35,132,3,2,2,1,1,'2024-10-11 13:00:07'),
(36,133,4,1,1,1,1,'2024-10-11 13:00:07'),
(37,134,3,1,1,1,1,'2024-10-11 13:00:07'),
(38,135,3,1,2,1,1,'2024-10-11 13:00:07'),
(39,136,5,2,1,1,1,'2024-10-11 13:00:07'),
(40,137,4,3,1,1,1,'2024-10-11 13:00:07'),
(41,138,3,2,1,1,1,'2024-10-11 13:00:07'),
(42,139,2,2,1,2,2,'2024-10-11 13:00:07'),
(57,140,0,0,0,0,0,'2024-10-11 15:25:20');

/*Table structure for table `saletype` */

DROP TABLE IF EXISTS `saletype`;

CREATE TABLE `saletype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

/*Data for the table `saletype` */

insert  into `saletype`(`id`,`name`,`createdOn`) values 
(1,'Rent','2024-09-15 11:10:49'),
(2,'Sale','2024-09-15 11:11:15');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `countryId` int DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `status` enum('A','D','I') DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

/*Data for the table `states` */

insert  into `states`(`id`,`countryId`,`name`,`status`) values 
(1,1,'Andhra Pradesh','A'),
(2,1,'Telangana','I'),
(3,1,'Tamilnadu','I'),
(4,2,'Newyork','A'),
(6,2,'washington','A'),
(7,1,'Arunachal Pradesh','A'),
(15,4,'Texas','A'),
(16,1,'Maharastra','A'),
(17,4,'Tokyo','A'),
(18,1,'Delhi','A');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `authId` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf16;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`mobile`,`password`,`createdOn`,`authId`) values 
(5,'Ramesh Rusum','mani@gmail.com','9390451420','827ccb0eea8a706c4c34a16891f84e7b','2024-10-06 16:08:18',0),
(6,'Ramesh Rusum','mani@gmail.com','9390451420','827ccb0eea8a706c4c34a16891f84e7b','2024-10-06 16:52:46',0),
(7,'Ramesh Rusum','rameshrusum2001@gmail.com','9390451420','827ccb0eea8a706c4c34a16891f84e7b','2024-10-06 17:43:30',0),
(9,'Ramesh Rusum','info@property.com','9390451420','3d186804534370c3c817db0563f0e461','2024-10-11 08:55:24',0),
(10,'Ramesh Rusum','mani@gmail.com','9390451420','e10adc3949ba59abbe56e057f20f883e','2024-10-15 11:33:27',0);

/* Trigger structure for table `properties` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_notifications` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_notifications` AFTER INSERT ON `properties` FOR EACH ROW BEGIN
	    IF EXISTS (SELECT id FROM properties WHERE id = NEW.id) THEN
	    UPDATE notification 
	    SET `value` = `value` + 1 
	    WHERE keyName = 'property';
	END IF;

    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
