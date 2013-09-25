/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : serviceworld

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-09-25 16:01:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `siteinfo`
-- ----------------------------
DROP TABLE IF EXISTS `siteinfo`;
CREATE TABLE `siteinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `siteName` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `siteUrl` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachInfo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `user_site` (`userId`) USING BTREE,
  CONSTRAINT `siteinfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of siteinfo
-- ----------------------------

-- ----------------------------
-- Table structure for `slider`
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('1', 'tr', '#441.png', 'rt', 'tet', '0', '0');
INSERT INTO `slider` VALUES ('2', 'hh', 'IMG_04092013_001302.png', 'hh', 'hh', '1', '1');
INSERT INTO `slider` VALUES ('3', 'fgdg', '#441.png', 'ut', 'uyt', '2', '1');
INSERT INTO `slider` VALUES ('4', 'tre', '#441.png', 'ttttt', '', '0', '1');
INSERT INTO `slider` VALUES ('5', 'test', 'addRecipient.png', 'test', 'test', '0', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyAddress` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateCreate` int(11) DEFAULT NULL,
  `lastVisit` int(11) DEFAULT NULL,
  `privilege` int(11) DEFAULT '100',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '0192023a7bbd73250516f069df18b500', 'trinh', 'duy luong', '1', null, 'Nam dinh', ' duyluongnd@gmail.com', '0986636039', 'Smartphp', 'My dinh', '0986636039', null, null, '1', '1');
INSERT INTO `user` VALUES ('3', 'tess', '8b8be2799a2796a36a02004608426bdb', null, 'Tes', '1', '0', 'te', 'eee@gmail.com', '32321313', 'sdasd', 'dasda', 'sada', '1380097377', '1380097377', '100', '0');
INSERT INTO `user` VALUES ('4', 'eerwe', '7b91e738dcdcd9011b3bea8c2f8c46d8', null, 'da', '0', '0', 'das', 'info@gmail.com', '31', 'dad', 'dasd', 'da', '1380097432', '1380097432', '100', '0');
INSERT INTO `user` VALUES ('5', 'duyluong', '0192023a7bbd73250516f069df18b500', null, 'duy luong', '1', '0', 'nam dinh', 'duyluongnd@gmail.com', '0986636039', 'Smartphp', 'Ha Noi', '84986636039', '1380097761', '1380097761', '100', '1');
