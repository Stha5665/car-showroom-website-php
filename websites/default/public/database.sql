-- Adminer 4.8.1 MySQL 5.5.5-10.9.4-MariaDB-1:10.9.4+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `cars`;
CREATE DATABASE `cars` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `cars`;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_posted` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `articles` (`id`, `title`, `description`, `date_posted`, `added_by`) VALUES
(1,	'Bumper Sale',	'50% off on these cars',	'2022-05-11',	'Claires'),
(2,	'New Launch',	'Fast, speedy, comfy car in the market',	'2022-11-05',	'Claires'),
(3,	'Broom Broom !!! 2022',	'Roar of the speed. Ultra speed in racing cars has given the trust of the speed lover where you love to compete with other speeds of car. The sound make you feel like enjoying the best speed track along with natural air. Reduction of co2 ejection from this car which make the best choice of 2022',	'2022-11-05',	'Fred'),
(4,	'ok1z',	'',	'2022-11-11',	'Claires'),
(5,	'',	'',	'2022-11-11',	'Claires'),
(6,	'',	'',	'2022-11-11',	'Claires');

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `mileage` varchar(45) DEFAULT NULL,
  `engine_type` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `manufacturerId` int(11) DEFAULT NULL,
  `description` longblob DEFAULT NULL,
  `archive` char(1) DEFAULT NULL,
  `old_price` varchar(45) DEFAULT NULL,
  `added_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cars` (`id`, `name`, `mileage`, `engine_type`, `price`, `manufacturerId`, `description`, `archive`, `old_price`, `added_by`) VALUES
(1,	'XJS',	'12 km/l',	'petrol',	'15000',	2,	'Made in 1996, available in green and black.',	'N',	'17000',	'Claires'),
(3,	'E-Type',	'11 km/l',	'diesel',	'30000',	2,	'Excellent condition used E-Type, only 20,000 miles. ',	'N',	'31500',	'Claires'),
(4,	'280SL',	'12 km/l',	'petrol',	'35000',	3,	'Gold, in excellent condition',	'N',	NULL,	NULL),
(5,	'300SL',	NULL,	NULL,	'14000',	3,	'1992 model with just 70,000 miles.',	'Y',	NULL,	NULL),
(6,	'DB4',	NULL,	NULL,	'99000',	4,	'Classic DB4. Minor scratches but otherwise flawless condition. ',	'N',	NULL,	NULL),
(17,	'Lamborgini xz',	'12.5 km',	'diesel',	'15000',	2,	'Fastest riding',	'Y',	'12000',	'Fred'),
(24,	'Sportz j3',	'14 km/l',	'petrol',	'235000',	5,	'Beautiful stylish sport cars for ultimate roar. Go and roar with acceleration. ...100 !!',	'N',	'',	'Claires');

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone_no` varchar(255) NOT NULL,
  `enquiry_date` date NOT NULL,
  `enquiry` text NOT NULL,
  `completed` char(1) NOT NULL,
  `completed_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `enquiries` (`id`, `person_name`, `email`, `telephone_no`, `enquiry_date`, `enquiry`, `completed`, `completed_by`) VALUES
(1,	'Jalpa',	'jalpa@gmail.com',	'9876543321',	'2022-11-08',	'Any new car available ? It should be speed and comfy.',	'Y',	'Fred'),
(2,	'null',	'akak',	'998',	'2022-11-11',	'Null minded',	'Y',	'Claires');

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jobs` (`id`, `name`, `description`) VALUES
(1,	'ok',	'12');

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(2,	'Jaguar'),
(3,	'Mercedes'),
(4,	'Aston Martin'),
(5,	'java');

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Users` (`id`, `username`, `password`, `role`) VALUES
(1,	'Claires',	'opensesame',	'admin'),
(2,	'Fred',	'ok',	'user'),
(3,	'kk',	'k',	'user');

-- 2022-11-12 13:23:37