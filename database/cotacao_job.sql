/*
 Navicat Premium Data Transfer

 Source Server         : xampp db
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : cotacao_job

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 02/20/2018 02:10:06 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `clerks`
-- ----------------------------
DROP TABLE IF EXISTS `clerks`;
CREATE TABLE `clerks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `clerks`
-- ----------------------------
BEGIN;
INSERT INTO `clerks` VALUES ('1', 'João Paulo'), ('2', 'José da Silva');
COMMIT;

-- ----------------------------
--  Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `home_phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `receive_offer_email` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `drivers`
-- ----------------------------
DROP TABLE IF EXISTS `drivers`;
CREATE TABLE `drivers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `birth_date` date NOT NULL,
  `identification_doc` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `drivers`
-- ----------------------------
BEGIN;
INSERT INTO `drivers` VALUES ('1', '2018-02-01', '344343342u7');
COMMIT;

-- ----------------------------
--  Table structure for `locations`
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zip_code` int(11) DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `complement` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `locations`
-- ----------------------------
BEGIN;
INSERT INTO `locations` VALUES ('1', '235454', 'rua clecio', null, 'rio de janeiro', 'rj');
COMMIT;

-- ----------------------------
--  Table structure for `quote_treatment_details`
-- ----------------------------
DROP TABLE IF EXISTS `quote_treatment_details`;
CREATE TABLE `quote_treatment_details` (
  `current_cleck_id` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `quotes`
-- ----------------------------
DROP TABLE IF EXISTS `quotes`;
CREATE TABLE `quotes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) unsigned NOT NULL,
  `location_id` int(11) unsigned NOT NULL,
  `driver_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `is_armored_car` tinyint(1) DEFAULT NULL COMMENT 'carro blindado',
  `is_taxi` tinyint(1) DEFAULT NULL,
  `is_uber` tinyint(1) DEFAULT NULL,
  `zero_km` tinyint(1) DEFAULT NULL,
  `already_own_vehicle` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `clerk_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `quotes`
-- ----------------------------
BEGIN;
INSERT INTO `quotes` VALUES ('1', '1', '1', '2', '3', '3', '4', '3', '2', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'), ('2', '2', '3', '2', '3', '2', '3', '4', '3', '4', '2018-02-01 22:38:29', '2018-02-01 22:38:22', '2018-02-01 22:38:15', '2');
COMMIT;

-- ----------------------------
--  Table structure for `vehicle_brands`
-- ----------------------------
DROP TABLE IF EXISTS `vehicle_brands`;
CREATE TABLE `vehicle_brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `vehicle_brands`
-- ----------------------------
BEGIN;
INSERT INTO `vehicle_brands` VALUES ('1', 'Chevrolet'), ('2', 'Fiat');
COMMIT;

-- ----------------------------
--  Table structure for `vehicle_models`
-- ----------------------------
DROP TABLE IF EXISTS `vehicle_models`;
CREATE TABLE `vehicle_models` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vehicle_brand_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `vehicle_models`
-- ----------------------------
BEGIN;
INSERT INTO `vehicle_models` VALUES ('1', 'Corsa', '1'), ('2', 'Cruze', '1'), ('3', 'Doblo', '2');
COMMIT;

-- ----------------------------
--  Table structure for `vehicle_versions`
-- ----------------------------
DROP TABLE IF EXISTS `vehicle_versions`;
CREATE TABLE `vehicle_versions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `car_version_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `vehicle_versions`
-- ----------------------------
BEGIN;
INSERT INTO `vehicle_versions` VALUES ('1', 'doblo 1.6', '205');
COMMIT;

-- ----------------------------
--  Table structure for `vehicles`
-- ----------------------------
DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL DEFAULT '0',
  `vehicle_model_id` int(11) unsigned NOT NULL,
  `vehicle_version_id` int(11) unsigned NOT NULL,
  `license_plate` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `vehicles`
-- ----------------------------
BEGIN;
INSERT INTO `vehicles` VALUES ('1', '1', '1', 'ASW-8967'), ('2', '1', '2', 'QWE-8967');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
