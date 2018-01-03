/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : elgallo

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2018-01-03 16:22:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `cliId` int(11) NOT NULL AUTO_INCREMENT,
  `cliNombre` varchar(20) NOT NULL,
  `cliApellido` varchar(20) NOT NULL,
  `docId` int(11) DEFAULT NULL,
  `cliDocumento` varchar(14) DEFAULT NULL,
  `cliDomicilio` varchar(100) DEFAULT NULL,
  `cliTelefono` varchar(50) DEFAULT NULL,
  `cliObservacion` varchar(100) DEFAULT NULL,
  `cliEstado` varchar(2) DEFAULT NULL,
  `cliDefault` bit(1) DEFAULT b'0',
  PRIMARY KEY (`cliId`),
  UNIQUE KEY `docId` (`docId`,`cliDocumento`) USING BTREE,
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`docId`) REFERENCES `tipos_documentos` (`docId`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
