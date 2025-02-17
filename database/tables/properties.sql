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
  `price` decimal(10,2) DEFAULT '0.00',
  `areaSize` varchar(50) DEFAULT NULL,
  `cityId` int DEFAULT NULL,
  `area` text,
  `address` text,
  `url` text,
  `userId` int DEFAULT '0',
  `countryId` int DEFAULT NULL,
  `stateId` int DEFAULT NULL,
  `propertyAge` int DEFAULT '0',
  `featuresId` varchar(300) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `mainImage` varchar(50) DEFAULT NULL,
  `otherImages` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `floorPlanImage` varchar(50) DEFAULT NULL,
  `status` enum('A','I','D','S') DEFAULT 'A',
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf16;

/*Data for the table `properties` */

insert  into `properties`(`id`,`agentId`,`title`,`description`,`categoryId`,`bhk`,`saletypeId`,`facingType`,`floor`,`totalFloor`,`price`,`areaSize`,`cityId`,`area`,`address`,`url`,`countryId`,`stateId`,`propertyAge`,`featuresId`,`mainImage`,`otherImages`,`floorPlanImage`,`status`,`createdOn`,`modifiedOn`) values 
(30,3,'dasd','                                                                                                               asd                                                                                                     ',1,4,1,1,11,13,299.00,'2000',3,'Guntur','                                                                                                              1-183, kunkalagunta, Nekarikallu                                                                                                    ','www.laalabs.com',1,2,1,'a:1:{i:0;s:9:\"2_feature\";}','172699259000.Screenshot (1)','a:2:{i:0;s:15:\"17269925900.png\";i:1;s:15:\"17269925901.png\";}','172699259000.Screenshot (1)','I','2024-09-22 13:40:00','2024-09-22 13:40:00'),
(32,1,'sanjana Developers','                                                                               test                                                                                         ',1,4,2,3,11,10,88.00,'4444',1,'Guntur','                                                                  1-183, kunkalagunta, Nekarikallu                                                            ','www.google.com',1,1,3,'a:1:{i:0;s:9:\"1_feature\";}','172700013200.Screenshot (1)','a:2:{i:0;s:15:\"17270001320.png\";i:1;s:15:\"17270001321.png\";}','172700013200.Screenshot (1)','I','2024-09-22 15:45:32','2024-09-22 15:45:32'),
(33,8,'Ram Estates','                                                test                                    ',3,3,2,3,2,10,47.00,'2000',3,'Kukatpally,Hyderabad','                      1-183, kunkalagunta, Nekarikallu                    ','www.laalabs.com',1,2,12,'a:1:{i:0;s:9:\"1_feature\";}','172700148100.Laalabs Logo','a:2:{i:0;s:15:\"17270014810.png\";i:1;s:15:\"17270014811.png\";}','172700148100.Laalabs Logo','I','2024-09-22 16:08:01','2024-09-22 16:08:01'),
(34,1,'asdf','                           asdfrews               ',2,2,2,2,11,14,47.00,'4000',1,'BaramPet','                         asdfgrr                 ','www.laalabs.com',1,1,1,'a:3:{i:0;s:9:\"2_feature\";i:1;s:9:\"4_feature\";i:2;s:9:\"5_feature\";}','172709466500.Screenshot (1)','a:3:{i:0;s:15:\"17270946650.png\";i:1;s:15:\"17270946651.png\";i:2;s:15:\"17270946652.png\";}','172709466500.Screenshot (1)','I','2024-09-23 18:01:05','2024-09-23 18:01:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
