/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : elgallo

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2018-02-05 17:12:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for retiros
-- ----------------------------
DROP TABLE IF EXISTS `retiros`;
CREATE TABLE `retiros` (
  `retId` int(11) NOT NULL AUTO_INCREMENT,
  `retFecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usrId` int(11) NOT NULL,
  `retImporte` decimal(10,2) NOT NULL,
  `retDescripcion` varchar(100) DEFAULT NULL,
  `cajaId` int(11) NOT NULL,
  PRIMARY KEY (`retId`),
  KEY `usrId` (`usrId`),
  KEY `cajaId` (`cajaId`),
  CONSTRAINT `retiros_ibfk_1` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE,
  CONSTRAINT `retiros_ibfk_2` FOREIGN KEY (`cajaId`) REFERENCES `cajas` (`cajaId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
