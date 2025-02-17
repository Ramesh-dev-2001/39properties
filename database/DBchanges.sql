ALTER TABLE `properties`.`properties` ADD COLUMN `userId` INT DEFAULT '0' AFTER `url`;
ALTER TABLE `properties`.`properties` CHANGE `price` `price` INT DEFAULT 0 NULL;
ALTER TABLE `properties`.`properties` ADD COLUMN `isApproved` TINYINT(1) DEFAULT 0 NULL AFTER `modifiedOn`;
 
UPDATE `properties`.`features` SET `name` = 'Parking' WHERE `id` = '2'; 
UPDATE `properties`.`features` SET `name` = 'Gym' WHERE `id` = '3';

CREATE TABLE `properties`.`users` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `name` VARCHAR(50), `email` VARCHAR(50), `mobile` VARCHAR(50), `createdOn` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`) ) ENGINE=INNODB CHARSET=utf16 COLLATE=utf16_general_ci; 
ALTER TABLE `properties`.`loginaccounts` CHANGE `type` `type` ENUM('MASTER','AGENT','USER') CHARSET utf8mb3 COLLATE utf8mb3_general_ci NULL; 

ALTER TABLE `properties`.`agents` ADD COLUMN `expiryDate` DATE NULL AFTER `stateId`;
ALTER TABLE `properties`.`properties` CHANGE `status` `status` ENUM('A','I','D','S','') CHARSET utf16 COLLATE utf16_general_ci DEFAULT 'A' NULL; 
ALTER TABLE `properties`.`properties` ADD COLUMN `isFeatured` TINYINT(1) DEFAULT 0 NULL AFTER `isApproved`;

ALTER TABLE `properties`.`categories` ADD COLUMN `status` ENUM('A','I') DEFAULT 'A' NULL AFTER `categoryName`;
ALTER TABLE `properties`.`features` ADD COLUMN `status` ENUM('A','I') DEFAULT 'A' NULL AFTER `name`;

ALTER TABLE `properties`.`properties` ADD COLUMN `views` INT NULL AFTER `url`; 

CREATE TABLE `properties`.`customerConnects` 
    ( `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `propertyId` INT(50),
    `agentId` INT(50),
    `name` VARCHAR(50), 
    `email` VARCHAR(50), 
    `mobile` VARCHAR(15), 
    `message` TEXT, 
    `createdOn` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`) ) ENGINE=INNODB CHARSET=utf16 COLLATE=utf16_general_ci; 
