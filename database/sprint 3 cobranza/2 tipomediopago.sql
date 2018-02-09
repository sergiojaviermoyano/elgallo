/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : cuyomateriales

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2018-02-05 15:39:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tipomediopago
-- ----------------------------
DROP TABLE IF EXISTS `tipomediopago`;
CREATE TABLE `tipomediopago` (
  `tmpId` int(11) NOT NULL AUTO_INCREMENT,
  `tmpCodigo` varchar(3) NOT NULL,
  `tmpDescripción` varchar(50) NOT NULL,
  `tmpEstado` varchar(2) NOT NULL DEFAULT 'AC',
  `tmpDescripcion1` varchar(50) DEFAULT NULL,
  `tmpDescripcion2` varchar(50) DEFAULT NULL,
  `tmpDescripcion3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tmpId`),
  UNIQUE KEY `tmpCodigo` (`tmpCodigo`) USING BTREE,
  UNIQUE KEY `tmpDescripciÃ³n` (`tmpDescripción`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipomediopago
-- ----------------------------
INSERT INTO `tipomediopago` VALUES ('1', 'EFE', 'Efectivo', 'AC', null, null, null);
INSERT INTO `tipomediopago` VALUES ('2', 'TJT', 'Tarjeta', 'AC', 'N° Lote', 'N° Autorización', 'Cuotas');
