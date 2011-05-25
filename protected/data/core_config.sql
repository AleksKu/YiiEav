/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.10
Source Server Version : 50149
Source Host           : localhost:3306
Source Database       : eav_yii

Target Server Type    : MYSQL
Target Server Version : 50149
File Encoding         : 65001

Date: 2011-05-25 10:41:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `core_config`
-- ----------------------------
DROP TABLE IF EXISTS `core_config`;
CREATE TABLE `core_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of core_config
-- ----------------------------
INSERT INTO `core_config` VALUES ('1', 'core', 'name', 'Интернет-магазин');
INSERT INTO `core_config` VALUES ('2', 'core', 'language', 'ru_RU');
