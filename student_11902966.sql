-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `data_iot`;
CREATE TABLE `data_iot` (
  `id` int(6) unsigned NOT NULL,
  `waarde` float NOT NULL,
  `tijd` timestamp NOT NULL DEFAULT current_timestamp(),
  KEY `id` (`id`),
  CONSTRAINT `data_iot_ibfk_1` FOREIGN KEY (`id`) REFERENCES `IO_devices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `IO_devices`;
CREATE TABLE `IO_devices` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `IP` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-01-14 18:37:47
