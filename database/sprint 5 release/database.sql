/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : elgallo

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2018-05-22 11:27:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `artId` int(11) NOT NULL AUTO_INCREMENT,
  `artBarCode` varchar(50) NOT NULL,
  `artDescription` varchar(50) NOT NULL,
  `artCoste` decimal(14,2) NOT NULL,
  `artMargin` decimal(10,2) NOT NULL,
  `artMarginIsPorcent` bit(1) NOT NULL,
  `artEstado` varchar(2) NOT NULL DEFAULT 'AC',
  `marcId` int(11) NOT NULL,
  `subrId` int(11) NOT NULL,
  `artEsSimple` bit(1) NOT NULL DEFAULT b'1',
  `artEsPrecioVariable` bit(1) NOT NULL DEFAULT b'0',
  `artProvCode` varchar(50) DEFAULT NULL,
  `artMinimo` int(11) DEFAULT NULL,
  `artMedio` int(11) DEFAULT NULL,
  `artMaximo` int(11) DEFAULT NULL,
  PRIMARY KEY (`artId`),
  UNIQUE KEY `artBarCode` (`artBarCode`) USING BTREE,
  UNIQUE KEY `artDescription` (`artDescription`) USING BTREE,
  KEY `marcId` (`marcId`) USING BTREE,
  KEY `subrId` (`subrId`) USING BTREE,
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`marcId`) REFERENCES `marcaart` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`subrId`) REFERENCES `subrubros` (`subrId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=478 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('17', '7798001693002', 'CITROEN/ BERLINGO/PEUGEOT/ECOSPORT/FORD FIESTA', '127.69', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-110', '2', '3', '5');
INSERT INTO `articles` VALUES ('23', '7798001699219', 'FIAT / CHEVROLET ', '96.16', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-120', '2', '3', '13');
INSERT INTO `articles` VALUES ('24', '7798001699226', 'CHEVROLET ', '94.33', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-130', '1', '2', '4');
INSERT INTO `articles` VALUES ('25', '7798001693019', 'FORD RANGER/NISSAN FRONTIER', '150.73', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-130', '1', '2', '3');
INSERT INTO `articles` VALUES ('26', '7798159128685', 'FORD RANGER NUEVA', '175.86', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-131', '1', '2', '5');
INSERT INTO `articles` VALUES ('27', '7798001694979', 'CHEVROLET VECTRA ', '182.78', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-131', '2', '3', '5');
INSERT INTO `articles` VALUES ('28', '7798151944764', 'TODAS HONDAS XR/ TODOS CUATRICICLOS HONDA', '102.89', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-0014', '1', '1', '3');
INSERT INTO `articles` VALUES ('29', '7798001699240', 'FORD FIESTA/ KA ', '129.59', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-150', '2', '3', '6');
INSERT INTO `articles` VALUES ('30', '7798159121686', 'FORD FOCUS II / S-MAX ', '130.05', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-152', '1', '1', '3');
INSERT INTO `articles` VALUES ('31', '7798159128661', 'FORD FOCUS II / MONDEO ', '151.69', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-154', '1', '1', '2');
INSERT INTO `articles` VALUES ('32', '7798001699257', 'PEUGEOT 106,205,306,405,504 / BERLINGO/ PARTNER/CI', '93.96', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-160', '2', '3', '6');
INSERT INTO `articles` VALUES ('33', '7798001699271', 'FORD MONDEO ', '103.91', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-180', '1', '2', '4');
INSERT INTO `articles` VALUES ('34', '7798001699295', 'RENAULT MEGANE/SCENIC/ CLIO / KANGOO', '91.58', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-200', '1', '2', '5');
INSERT INTO `articles` VALUES ('35', '7798001699974', 'RENAULT CLIO', '101.91', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-205', '1', '1', '3');
INSERT INTO `articles` VALUES ('36', '7798001693088', 'TOYOTA HILUX', '123.64', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-206', '1', '1', '2');
INSERT INTO `articles` VALUES ('37', '7798159129453', 'TOYOTA ETIOS', '100.74', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-0209', '1', '2', '3');
INSERT INTO `articles` VALUES ('38', '7798001693132', 'TOYOTA COROLLA ', '126.62', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-210', '1', '1', '2');
INSERT INTO `articles` VALUES ('40', '7798001694665', 'TOYOTA COROLLA 1.8 16V', '184.35', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-210/1', '1', '1', '2');
INSERT INTO `articles` VALUES ('42', '7798001693095', 'TOYOTA HILUX 2.5', '123.64', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-211', '1', '2', '4');
INSERT INTO `articles` VALUES ('43', '7798001694689', 'TOYOTA LAND / CRUISER DIESEL ', '402.97', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-213', '0', '1', '2');
INSERT INTO `articles` VALUES ('44', '7798001699356', 'FOCUS/ FORD TRANSIT ', '155.76', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-260', '1', '1', '4');
INSERT INTO `articles` VALUES ('45', '7798001699387', 'MERCEDES BENZ SPRINTER', '184.78', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-290', '1', '1', '3');
INSERT INTO `articles` VALUES ('46', '7798001693057', 'CHEVROLET ASTRA/ VECTRA ', '190.27', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-300', '1', '1', '2');
INSERT INTO `articles` VALUES ('47', '7798151944511', 'MERDECES BENZ CLASE C/E/SPRINTER/VIANO', '158.51', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-300/1', '1', '1', '2');
INSERT INTO `articles` VALUES ('48', '7798001697659', 'CHEVROLET CAPTIVA', '265.52', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-312', '1', '1', '2');
INSERT INTO `articles` VALUES ('49', '7798159121556', 'CHEVROLET CRUZE ', '192.32', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-312', '1', '1', '2');
INSERT INTO `articles` VALUES ('50', '7798159128272', 'CHEVROLET S10 2.8', '31.61', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-314', '1', '1', '2');
INSERT INTO `articles` VALUES ('51', '7798001693125', 'VITARA/ ISUZU', '352.24', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-314', '1', '1', '2');
INSERT INTO `articles` VALUES ('52', '7798001697109', 'IVECO DAILY', '266.30', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-331', '0', '0', '1');
INSERT INTO `articles` VALUES ('53', '8997879207352', 'TOYOYA CELICA ', '193.32', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-214', '1', '1', '2');
INSERT INTO `articles` VALUES ('54', '7798001692968', 'VOLKSWAGEN FOX', '119.60', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-340', '2', '3', '6');
INSERT INTO `articles` VALUES ('55', '7798159122133', 'AUDI A1 ', '275.34', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-342', '0', '1', '2');
INSERT INTO `articles` VALUES ('56', '7798001699431', 'FORD FALCON/ F100', '117.23', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-350', '1', '1', '2');
INSERT INTO `articles` VALUES ('57', '7798001699448', 'PEUGEOT/ RENAULT/CITROEN', '124.37', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-360', '1', '2', '4');
INSERT INTO `articles` VALUES ('58', '7798001699455', 'VOLKSWAGEN / FORD ', '99.77', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-370', '2', '3', '6');
INSERT INTO `articles` VALUES ('59', '7798001699462', 'PEUGEOT ', '150.63', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-380', '1', '1', '3');
INSERT INTO `articles` VALUES ('60', '7798001699479', 'FIAT', '95.79', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-390', '1', '1', '2');
INSERT INTO `articles` VALUES ('61', '7798001699493', 'RENAULT', '116.13', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-410', '1', '2', '4');
INSERT INTO `articles` VALUES ('62', '7798001699509', 'FIAT UNO ', '175.79', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-420', '1', '1', '2');
INSERT INTO `articles` VALUES ('63', '7798001699516', 'RENAULT/ FIAT ', '113.56', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-430', '1', '2', '4');
INSERT INTO `articles` VALUES ('64', '7798159129316', 'MERCEDES BENZ CLASE C', '236.93', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-455', '1', '1', '2');
INSERT INTO `articles` VALUES ('65', '7798001699547', 'FIAT / RENAULT / DODGE', '147.45', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-460', '1', '2', '4');
INSERT INTO `articles` VALUES ('66', '7798151944597', 'MERCEDES BENZ ', '270.89', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-460', '1', '1', '2');
INSERT INTO `articles` VALUES ('67', '7798151944566', 'MERCEDES BENZ ELECTRONICO ', '258.19', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-440', '1', '1', '3');
INSERT INTO `articles` VALUES ('68', '7798001699554', 'FORD F100/F150/F4000', '176.12', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-470', '0', '1', '2');
INSERT INTO `articles` VALUES ('69', '7798001699561', 'FORD 14000', '26.76', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-480', '1', '1', '2');
INSERT INTO `articles` VALUES ('70', '7798001699585', 'RENAULT 18/19', '160.78', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-500', '1', '1', '2');
INSERT INTO `articles` VALUES ('71', '4047024746374', 'ISUZU', '219.52', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-504', '1', '1', '3');
INSERT INTO `articles` VALUES ('72', '7798001694801', 'MITSUBISHI L200', '246.57', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-505', '0', '0', '1');
INSERT INTO `articles` VALUES ('73', '7798001692951', 'CHEVROLET S10', '357.17', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-540', '0', '1', '2');
INSERT INTO `articles` VALUES ('74', '7798001699646', 'POLO CLASIC', '182.82', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-590', '1', '1', '3');
INSERT INTO `articles` VALUES ('75', '7798159121969', 'AUDI/ VOLKSWAGEN/ SEAT ', '423.79', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-592', '1', '1', '2');
INSERT INTO `articles` VALUES ('76', '7798001694580', 'MITSUBISHI ', '316.88', '40.00', '', 'AC', '8', '7', '', '\0', 'JFC-582', '1', '1', '3');
INSERT INTO `articles` VALUES ('77', '4047024768222', 'MITSUBISHI GALANT ', '164.27', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-598', '1', '1', '2');
INSERT INTO `articles` VALUES ('78', '7798001694870', 'DAIHATSU HI-JET CUORE', '164.27', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-601', '0', '0', '1');
INSERT INTO `articles` VALUES ('79', '7798001693026', 'VOLKSWAGEN BORA/ GOLF / PASSAT ', '194.16', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-610', '1', '1', '2');
INSERT INTO `articles` VALUES ('80', '7798001697123', 'AUDI A4/ A5 / A6', '514.76', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-612', '1', '1', '2');
INSERT INTO `articles` VALUES ('81', '7798186471266', 'AUDI A3/ A4/ VOLKSWAGEN ', '266.51', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-624', '1', '1', '2');
INSERT INTO `articles` VALUES ('82', '7798001691121', 'AUDI A3 II / A4/ VOLKSWAGEN BORA/GOLF/FOX', '169.06', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-630', '1', '1', '2');
INSERT INTO `articles` VALUES ('83', '7798001694160', 'AUDI/ VOLKSWAGEN GOLF/ PASSAT/ VENTO', '167.32', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-640', '1', '1', '2');
INSERT INTO `articles` VALUES ('84', '7797954870256', 'DEUTZ TRACTOR A30 - A40 ', '176.36', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-640', '0', '1', '2');
INSERT INTO `articles` VALUES ('85', '7797954870423', 'CARGO 914 CUMMINS', '183.17', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-670', '0', '0', '1');
INSERT INTO `articles` VALUES ('86', '7798001699875', 'FORD F100/ FORD CARGO ', '253.51', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-680', '1', '1', '2');
INSERT INTO `articles` VALUES ('87', '7798159120399', 'VOLKSWAGEN AMAROK ', '160.27', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-680', '1', '2', '4');
INSERT INTO `articles` VALUES ('88', '7798001692999', 'CITROEN/ BERLINGO / PEUGEOT', '146.53', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-700', '1', '1', '2');
INSERT INTO `articles` VALUES ('89', '7798001692982', 'PEUGEOT/ CITROEN', '115.36', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-710', '2', '3', '5');
INSERT INTO `articles` VALUES ('91', '7798159121525', 'TOYOTA COROLA ', '183.17', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-803', '1', '1', '2');
INSERT INTO `articles` VALUES ('92', '7798001696348', 'ALFA ROMEO / FIAT ', '165.77', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-909', '1', '1', '2');
INSERT INTO `articles` VALUES ('93', '8997879201398', ' SUZUKI SWIFT-VITARA', '164.27', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-898', '1', '1', '2');
INSERT INTO `articles` VALUES ('94', '7798151949271', 'FIAT PUNTO ', '234.66', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-911', '1', '1', '2');
INSERT INTO `articles` VALUES ('96', '7798159121747', 'FIAT / SIENA', '159.35', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-912', '1', '1', '2');
INSERT INTO `articles` VALUES ('97', '7798186473406', 'CHERY TIGGO', '234.66', '40.00', '', 'AC', '8', '6', '', '\0', 'WOE-930', '1', '1', '2');
INSERT INTO `articles` VALUES ('98', '7798001695778', ' JEEP CHEROKKE D-DT', '599.03', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-985', '0', '0', '1');
INSERT INTO `articles` VALUES ('99', '103', 'FIAT 600 R', '224.91', '40.00', '', 'AC', '12', '6', '', '\0', 'MAP-103', '0', '1', '2');
INSERT INTO `articles` VALUES ('100', '255', ' M.BENZ 1517 - 1518 - 1114', '217.66', '40.00', '', 'AC', '12', '6', '', '\0', 'EA-255', '0', '1', '2');
INSERT INTO `articles` VALUES ('101', '267', 'MERCEDES BENZ 1633 ', '339.84', '40.00', '', 'AC', '12', '6', '', '\0', 'EA-267', '1', '1', '5');
INSERT INTO `articles` VALUES ('102', '268', 'MERCEDES BENS 608 NUEVO', '171.52', '40.00', '', 'AC', '12', '6', '', '\0', 'EA-268', '1', '1', '4');
INSERT INTO `articles` VALUES ('103', '265', 'M. BENS 1938-1935', '406.98', '40.00', '', 'AC', '12', '6', '', '\0', 'EA-265', '0', '0', '2');
INSERT INTO `articles` VALUES ('104', '7798001695204', 'PERKINS 004060-PEUGEOT  ', '87.55', '40.00', '', 'AC', '8', '7', '', '\0', 'MCP-155', '1', '1', '3');
INSERT INTO `articles` VALUES ('105', '207', 'RENAULT EXPRESS-CLIO', '75.02', '40.00', '', 'AC', '12', '7', '', '\0', 'EC-207', '0', '0', '2');
INSERT INTO `articles` VALUES ('106', '7798001698045', 'FORD FOCUS II ', '343.72', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-110', '0', '0', '2');
INSERT INTO `articles` VALUES ('107', '210', 'CAMION MEDIANO ', '600.00', '40.00', '', 'AC', '10', '7', '', '\0', 'MCP-210', '0', '0', '2');
INSERT INTO `articles` VALUES ('108', '7798001690988', 'TOYOTA HILUX 3.0', '174.01', '40.00', '', 'AC', '8', '7', '', '\0', 'JFC-207/1', '1', '1', '4');
INSERT INTO `articles` VALUES ('109', '7798001694528', 'MITSUBISHI / TOYOTA / DAIHATSU', '284.23', '40.00', '', 'AC', '8', '7', '', '\0', 'JFC-215', '1', '1', '3');
INSERT INTO `articles` VALUES ('110', '7798001693569', 'UNIV. WEGA DOBLE PICO TRANSP.', '65.20', '40.00', '', 'AC', '8', '7', '', '\0', 'FC-216TC', '0', '1', '3');
INSERT INTO `articles` VALUES ('111', '203', 'PERKINS', '76.69', '40.00', '', 'AC', '12', '7', '', '\0', 'EC-203', '0', '1', '3');
INSERT INTO `articles` VALUES ('112', '7798001697277', 'HYUNDAI ', '306.66', '40.00', '', 'AC', '8', '7', '', '\0', 'JFC-583', '0', '0', '1');
INSERT INTO `articles` VALUES ('128', '7798159127411', 'AUDI / VOLKSWAGEN VENTO ', '397.88', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-600', '1', '1', '2');
INSERT INTO `articles` VALUES ('129', '7798001695693', 'VOLKSWAGEN VENTO ', '352.24', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-601', '1', '1', '3');
INSERT INTO `articles` VALUES ('130', '7798001698649', 'AUDI / VW PASSAT/TIGUAN', '484.13', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-602', '0', '1', '3');
INSERT INTO `articles` VALUES ('131', '7798001699172', '1/2 LITRO', '60.53', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-710', '1', '2', '4');
INSERT INTO `articles` VALUES ('132', '7798001698267', '1 LITRO ', '83.66', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-720', '1', '1', '4');
INSERT INTO `articles` VALUES ('133', '771', 'FIAT DUCATO-IVECO JTD', '334.63', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-771', '1', '1', '3');
INSERT INTO `articles` VALUES ('134', '754', 'RENAULT KANGOO', '112.92', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-754', '0', '1', '2');
INSERT INTO `articles` VALUES ('137', '7798159128241', 'CHEVROLET S10 2.8 16V', '425.86', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-777', '1', '1', '3');
INSERT INTO `articles` VALUES ('138', '7798001693644', 'CITROEN / PEUGEOT / BERLINGO / PARTNER ', '125.56', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-766', '1', '2', '4');
INSERT INTO `articles` VALUES ('139', '7798151943538', 'MERCEDES BENZ 914C ELECTRONICO ', '333.49', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-768', '0', '1', '2');
INSERT INTO `articles` VALUES ('140', '7798159129750', 'FORD RANGER', '251.22', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-785', '0', '0', '2');
INSERT INTO `articles` VALUES ('141', '174', 'RENAULT CLIO EXPRES ', '131.08', '40.00', '', 'AC', '12', '7', '', '\0', 'MCP-174', '0', '0', '2');
INSERT INTO `articles` VALUES ('142', '7798001697963', 'RENAULT TRAFIC', '162.62', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-796', '1', '1', '2');
INSERT INTO `articles` VALUES ('143', '7798001694597', 'MITSUBISHI / HYUNDAI / SUZUKI ', '228.96', '40.00', '', 'AC', '8', '7', '', '\0', 'JFC-901', '1', '1', '3');
INSERT INTO `articles` VALUES ('144', '7798001695198', 'FORD-CITROEN-PEUGEOT', '824.25', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-915', '0', '0', '1');
INSERT INTO `articles` VALUES ('145', '7798001695181', 'CITROEN C4-PICASO II-307 06', '838.00', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-916', '0', '0', '1');
INSERT INTO `articles` VALUES ('147', '7798159121570', 'VOLKSWAGEN AMAROK 2.0', '583.38', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-919', '1', '1', '2');
INSERT INTO `articles` VALUES ('148', '7798186475882', 'VW AMAROK ', '975.56', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-922', '0', '0', '1');
INSERT INTO `articles` VALUES ('149', '7798001692272', 'PEUGEOT 405 / VW GOLF / PASSAT', '210.81', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1105A', '0', '1', '2');
INSERT INTO `articles` VALUES ('150', '7798151948557', 'INYECCION CHEVROLET CORSA', '175.40', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1101S', '1', '1', '2');
INSERT INTO `articles` VALUES ('151', '7798001698922', 'CITROEN / PEUGEOT / RENAULT ', '121.81', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1101C', '2', '3', '9');
INSERT INTO `articles` VALUES ('152', '7798001692289', 'CHEVROLET CORSA / FIAT PALIO ', '121.81', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1110S', '1', '1', '3');
INSERT INTO `articles` VALUES ('153', '7798001698496', 'VW VENTO 2.5', '487.70', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1303', '1', '1', '2');
INSERT INTO `articles` VALUES ('154', '7798159122430', 'VW VENTO / AUDI ', '532.54', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1304', '1', '1', '3');
INSERT INTO `articles` VALUES ('155', '7798001693972', 'INYECCION VW GOLF IV - AUDI A3 ', '228.96', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1288', '1', '1', '3');
INSERT INTO `articles` VALUES ('156', '7798001693996', 'FIAT PALIO/GRAND SIENA/ STRADA', '142.89', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1600', '2', '2', '4');
INSERT INTO `articles` VALUES ('157', '7798001699813', 'FIAT PALIO/SIENA/UNO', '160.27', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1610', '1', '2', '4');
INSERT INTO `articles` VALUES ('159', '7798186470153', 'TOYOTA ETIOS  1.3', '217.48', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1616', '1', '1', '2');
INSERT INTO `articles` VALUES ('160', '7798001699660', 'VOLKSWAGEN FOX / GOL', '136.49', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1620', '1', '2', '4');
INSERT INTO `articles` VALUES ('161', '7798001697024', 'CITROEN/ VOLKSWAGEN/ RENAULT ', '128.22', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1630', '2', '3', '6');
INSERT INTO `articles` VALUES ('162', '7798151943828', 'CHEVROLET AGILE/CORSA/MERIVA/ ONIX - IDEA / PALIO/', '120.59', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1660', '2', '2', '5');
INSERT INTO `articles` VALUES ('163', '7798151943804', 'INYECCION VW GOL - ORION', '188.48', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1640', '1', '1', '3');
INSERT INTO `articles` VALUES ('164', '7488151943811', 'FORD ESCORT ZETEC ', '197.26', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1650', '1', '1', '3');
INSERT INTO `articles` VALUES ('165', '7798159129880', 'FORD ECOSPORT/ FOCUS ', '160.27', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1694', '1', '1', '2');
INSERT INTO `articles` VALUES ('166', '7798001690278', 'FORD FIESTA / ECOSPORT', '134.65', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1695', '1', '1', '3');
INSERT INTO `articles` VALUES ('167', '7798001694023', 'FORD FOCUS', '232.00', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1697', '0', '0', '1');
INSERT INTO `articles` VALUES ('168', '7798159121952', 'INYECCION FIESTA KINETIC - TOYOTA COROLLA', '220.53', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1698', '1', '2', '3');
INSERT INTO `articles` VALUES ('169', '7798001694078', 'INYECCION FOCUS 2,0 CC 16 V', '212.15', '40.00', '', 'AC', '8', '7', '', '\0', 'FCI-1881', '1', '2', '3');
INSERT INTO `articles` VALUES ('170', '179', 'FORD ESCORT/ ORION/ MONDEO 1.8 DIESEL', '326.72', '40.00', '', 'AC', '8', '7', '', '\0', 'MCP-179', '0', '0', '1');
INSERT INTO `articles` VALUES ('171', '7798186471204', 'CITROEN C4 II / PICASSO/ BERLINGO/ PEUGEOT 308-408', '580.71', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2035', '1', '1', '2');
INSERT INTO `articles` VALUES ('172', '7798001692302', 'CHEVROLET CORSA/ S10  FORD F250-350', '167.61', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2058', '1', '2', '4');
INSERT INTO `articles` VALUES ('173', '7798001699769', 'FIAT DUNA/ PALIO / DUCATO ', '130.63', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2058B', '1', '2', '4');
INSERT INTO `articles` VALUES ('174', '7798001693705', 'FORD RANGER (POWERSTROKE) 2005', '402.97', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2061', '0', '1', '2');
INSERT INTO `articles` VALUES ('175', '7798001693712', 'FORD RANGER 2002', '430.44', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2062', '0', '1', '2');
INSERT INTO `articles` VALUES ('176', '7798001693729', 'FORD FOCUS 2004', '492.95', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2063', '1', '1', '2');
INSERT INTO `articles` VALUES ('177', '7798001693743', 'CHEVROLET S10 2002', '361.05', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2064', '0', '0', '1');
INSERT INTO `articles` VALUES ('178', '7798001692319', 'FORD FIESTA DIESEL ', '293.07', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2065', '1', '1', '2');
INSERT INTO `articles` VALUES ('179', '7798001693750', 'CHEVROLET S10 / NISSAN ', '442.15', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2066/1', '0', '0', '1');
INSERT INTO `articles` VALUES ('180', '7798001692333', ' VW GOLF-PASSAT TD', '307.38', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2067', '1', '1', '2');
INSERT INTO `articles` VALUES ('181', '7798001693767', 'GOLF-SEAT-TOLEDO 1,9TD ', '322.75', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2068', '0', '1', '2');
INSERT INTO `articles` VALUES ('182', '7798151949417', 'FIAT PUNTO MOTOR JTD', '686.15', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2076/3', '1', '1', '2');
INSERT INTO `articles` VALUES ('184', '7798001697833', 'IVECO DAILY 2007', '261.93', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2096', '1', '1', '2');
INSERT INTO `articles` VALUES ('185', '7798159122744', 'IVECO DAILY ELECTRONICO ', '532.54', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2099', '0', '1', '2');
INSERT INTO `articles` VALUES ('187', '7798001693804', 'MERCEDES BENZ SPRINTER 2.2', '614.85', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2158', '0', '0', '1');
INSERT INTO `articles` VALUES ('188', '7798001697130', ' M. BENS CLASE B 2,0 ', '1064.73', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2163', '0', '0', '1');
INSERT INTO `articles` VALUES ('189', '7798001693811', 'MERCEDES BENZ SPRINTER 2.2 S/SENSOR', '614.85', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2158/1', '1', '1', '2');
INSERT INTO `articles` VALUES ('190', '2170', 'FIAT CAMION-TRACTOR 400 ', '248.88', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2170', '1', '1', '2');
INSERT INTO `articles` VALUES ('191', '7798186472010', 'MERCEDES BENZ SPRINTER 2012', '1002.38', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2184', '0', '0', '1');
INSERT INTO `articles` VALUES ('192', '2203', 'M. BENZ EVOBUS-AXOR ', '681.32', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-2203', '0', '0', '1');
INSERT INTO `articles` VALUES ('193', '7798001693835', 'RENAULT MASTER 06', '481.21', '40.00', '', 'AC', '8', '7', '', '\0', 'FCD-3010', '0', '0', '1');
INSERT INTO `articles` VALUES ('194', ' 7798001690711', 'CITROEN SAXO/ BERLINGO / PEUGEOT PARTNER', '150.86', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-107', '0', '0', '2');
INSERT INTO `articles` VALUES ('195', '118', 'NISSAN FRONTIER 2,5 ', '359.30', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-118', '0', '1', '2');
INSERT INTO `articles` VALUES ('196', '116', 'PEUGEOT 205 DIESEL POLIURETANO', '167.00', '40.00', '', 'AC', '12', '5', '', '\0', 'AMP-116', '0', '0', '1');
INSERT INTO `articles` VALUES ('197', '180', 'CHEV. SILVERADO-NISSAN MWM 6', '248.71', '40.00', '', 'AC', '12', '5', '', '\0', 'AMP-180', '0', '0', '1');
INSERT INTO `articles` VALUES ('198', '7798151943378', 'FIAT IVECO TURBO DAILY 2.5', '390.14', '40.00', '', 'AC', '8', '5', '', '\0', 'WAP-161', '0', '1', '2');
INSERT INTO `articles` VALUES ('199', '7798151943385', 'M. BENS 1517-1518 ', '457.91', '40.00', '', 'AC', '8', '5', '', '\0', 'WAP-163', '1', '1', '2');
INSERT INTO `articles` VALUES ('200', '200/4S', 'SECUNDARIO CHEVROLET-NISSAN FRONTIER', '284.43', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-200/4S', '1', '1', '2');
INSERT INTO `articles` VALUES ('201', '7798159126957', 'SECUNDARIO ', '276.17', '40.00', '', 'AC', '8', '5', '', '\0', 'WAP-186/S', '0', '0', '1');
INSERT INTO `articles` VALUES ('202', '168', 'FORD RANGER C/MAXION ->99', '562.90', '40.00', '', 'AC', '12', '5', '', '\0', 'AMP-168', '0', '0', '1');
INSERT INTO `articles` VALUES ('204', '7798001695891', 'FORD FOCUS II 2.0', '251.85', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-192', '0', '0', '2');
INSERT INTO `articles` VALUES ('205', '1081', 'RENAULT KANGOO 1,9 DIESEL', '189.83', '40.00', '', 'AC', '12', '5', '', '\0', 'AMP-1081', '0', '0', '1');
INSERT INTO `articles` VALUES ('206', '1007/1', 'FORD ESCORT/GOL/GALAXY', '152.38', '40.00', '', 'AC', '12', '5', '', '\0', 'AMP-1007/1', '1', '2', '6');
INSERT INTO `articles` VALUES ('207', '7798001692852', 'FORD RANGER 3.0 (POWERSTROKE) MITSUBISHI L200 / NI', '283.91', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-198', '1', '1', '3');
INSERT INTO `articles` VALUES ('208', '7798001692821', 'CHEVROLET S10 2.2 - 2.8 ', '210.00', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-200/3', '1', '1', '2');
INSERT INTO `articles` VALUES ('209', '7798001694221', 'NISSAN FRONTIER 2.8 TDI  (MOTOR MWM)', '270.35', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-200/4', '1', '1', '2');
INSERT INTO `articles` VALUES ('210', '7798001692425', 'VW GOL/ GACEL / CARAT / SENDA ', '103.85', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-201', '1', '1', '3');
INSERT INTO `articles` VALUES ('211', '7798001692418', 'RENAULT 9/11/19', '103.85', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-229', '1', '1', '3');
INSERT INTO `articles` VALUES ('212', '7798001692401', 'FIAT /128/147/FIORINO/SPAZIO', '86.55', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-213', '1', '2', '4');
INSERT INTO `articles` VALUES ('213', '7798159121228', 'TOYOTA HILUX 97', '274.75', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-227', '0', '0', '1');
INSERT INTO `articles` VALUES ('214', '252', 'FORD ECO SPORT 2,0 CC NAFTA', '193.31', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-252', '0', '0', '1');
INSERT INTO `articles` VALUES ('215', '7798001692920', 'RENAULT CLIO II / KANGOO / LOGAN / DUSTER', '138.67', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-244', '1', '2', '5');
INSERT INTO `articles` VALUES ('216', '7798001692913', 'FORD FIESTA 1.3 ', '190.01', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-251', '1', '1', '2');
INSERT INTO `articles` VALUES ('217', '7798001690834', 'TOYOTA CAMRY 2.4 / TOYOTA RAV 2.0 ', '200.00', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-257', '1', '1', '2');
INSERT INTO `articles` VALUES ('218', '249', 'TOYOTA COROLLA SW 1,3I-1,6I', '264.19', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-249', '1', '1', '2');
INSERT INTO `articles` VALUES ('219', '283', 'TOYOTA NEW COROLLA NAFTA 2,0', '243.05', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-283', '0', '0', '1');
INSERT INTO `articles` VALUES ('220', '7798001692838', 'RENAULT 19 / MEGANE / SCENIC', '153.21', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-274', '1', '1', '3');
INSERT INTO `articles` VALUES ('221', '7798151943408', 'FORD F100 / 150 / 4000 / 1400 MOTORES MWM ', '422.20', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-285', '0', '1', '2');
INSERT INTO `articles` VALUES ('222', '7798001690216', 'RENAULT CLIO / EXPRESS MOTOR DIESEL ', '141.04', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-282', '0', '0', '1');
INSERT INTO `articles` VALUES ('223', '263', 'FIAT DUCATO 1.9', '206.81', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-263', '0', '0', '1');
INSERT INTO `articles` VALUES ('224', '7798001698182', 'TOYOTA COROLLA 2008', '224.38', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-285', '1', '1', '2');
INSERT INTO `articles` VALUES ('225', '7798151942609', 'TOYOTA HILUX SW4 3.0', '476.23', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-292', '0', '0', '1');
INSERT INTO `articles` VALUES ('226', '292/1', 'TOYOTA HILUX 2.8 3.0 2001', '366.33', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-292/1', '0', '0', '1');
INSERT INTO `articles` VALUES ('227', '7798001692623', 'TOYOTA HI-LUX 3.0 CC 2005', '319.55', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-292/2', '1', '1', '3');
INSERT INTO `articles` VALUES ('228', '7798001690223', 'CITROEN XSARA / BERLINGO / PEUGEOT 205 - 306 / PAR', '109.90', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-308', '1', '1', '3');
INSERT INTO `articles` VALUES ('229', '300', 'PEUGEOT 505 2,2 POLIURETANO', '163.66', '40.00', '', 'AC', '12', '5', '', '\0', 'AMP-113', '0', '0', '1');
INSERT INTO `articles` VALUES ('230', '7798001694344', 'FIAT DUCATO 2.8 / PEUGEOT BOXER 2.8 HDI ', '299.07', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-316', '0', '0', '1');
INSERT INTO `articles` VALUES ('231', '7798186472973', 'PEUGEOT 504 / PERKINS', '239.40', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-347', '0', '0', '1');
INSERT INTO `articles` VALUES ('232', '7798001695785', 'M. BENZ CLASE C 2004 ', '825.99', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-365', '0', '0', '1');
INSERT INTO `articles` VALUES ('233', '7798001697598', 'HONDA CITY / FIT ', '308.63', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-428/3', '0', '0', '2');
INSERT INTO `articles` VALUES ('234', '7798151943439', 'FORD RANGER TD MAXION', '338.86', '40.00', '', 'AC', '8', '5', '', '\0', 'WAP-383', '0', '0', '2');
INSERT INTO `articles` VALUES ('235', '7798151943422', ' M. BENZ 1215-1618 ELECTRONICO ', '717.19', '40.00', '', 'AC', '8', '5', '', '\0', 'WAP-382', '1', '1', '2');
INSERT INTO `articles` VALUES ('236', '382/S', 'SECUNDARIO MERCEDES BENZ ', '500.00', '40.00', '', 'AC', '8', '5', '', '\0', 'WAP-382/S', '0', '0', '1');
INSERT INTO `articles` VALUES ('237', '7798151942869', 'MERCEDES BENZ 608/ MITSUBISHI L200-300/ MONTERO ', '414.25', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-514', '0', '0', '1');
INSERT INTO `articles` VALUES ('238', '7798001698199', 'MITSUBISHI L-200', '401.56', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-500', '0', '1', '3');
INSERT INTO `articles` VALUES ('239', '7798001690575', 'MITSUBISHI MONTERO 3.8 ', '804.65', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-588', '0', '0', '2');
INSERT INTO `articles` VALUES ('240', '7798001696003', 'CHEVROLET AVEO LS / LT / G3  2008 - 2011', '174.46', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-602', '1', '1', '2');
INSERT INTO `articles` VALUES ('241', '800', 'FIAT 128 / 125', '70.00', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-800', '1', '1', '3');
INSERT INTO `articles` VALUES ('242', '7798186473642', 'CHERY TIGGO 1.6  2013', '359.01', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-F08', '0', '1', '2');
INSERT INTO `articles` VALUES ('243', '7798151943071', 'SUZUKI JUMNY  1.3 ', '603.50', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-815', '0', '0', '2');
INSERT INTO `articles` VALUES ('244', '429', 'HONDA CIVIC 2006->', '317.03', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-429', '0', '0', '1');
INSERT INTO `articles` VALUES ('245', '810', 'SUZUKI VITARA 1,6 ', '327.93', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-810', '0', '1', '2');
INSERT INTO `articles` VALUES ('246', '895', 'SUZUKI GRAN VITARA XL-7 2.8', '359.30', '40.00', '', 'AC', '8', '5', '', '\0', 'JFA-895', '0', '0', '2');
INSERT INTO `articles` VALUES ('247', '700', 'DODGE 1.8  1500/1800 - VOLKSWAGEN ', '113.74', '40.00', '', 'AC', '8', '5', '', '\0', 'WR-700', '0', '0', '2');
INSERT INTO `articles` VALUES ('248', '4826', 'VW POLO-SEAT TD', '165.64', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4826', '1', '1', '3');
INSERT INTO `articles` VALUES ('249', '7798186473079', 'FIAT 500L / FIAT DOBLO CARGO 2012', '207.99', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-2822', '1', '1', '3');
INSERT INTO `articles` VALUES ('252', '2823', 'CLIO ', '158.66', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-1022', '0', '0', '2');
INSERT INTO `articles` VALUES ('253', '7798001690018', 'CHEVROLET CORSA CLASIC / AGILE ', '87.00', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-2827', '2', '2', '5');
INSERT INTO `articles` VALUES ('254', '7798001692388', 'FIAT IDEA / PALIO / SIENA / STRADA ', '96.16', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-2831', '2', '2', '4');
INSERT INTO `articles` VALUES ('255', '7798001692395', 'FORD FIESTA / KA / CURRIER ', '146.36', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-2832', '2', '2', '5');
INSERT INTO `articles` VALUES ('256', '7798159128067', 'FIAT QUBO 1.4 / FIORINO ', '180.88', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-2835', '1', '1', '3');
INSERT INTO `articles` VALUES ('257', '7798001693408', 'FORD KA (MOTOR ZETEC )', '186.35', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-2840', '1', '1', '2');
INSERT INTO `articles` VALUES ('258', '7798001690025', 'FIAT FIORINO / DUNA / SPAZIO', '145.22', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3215', '1', '1', '3');
INSERT INTO `articles` VALUES ('259', '7798159127633', 'CHEVROLET COBALT / SPIN / SONIC ', '165.77', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3269', '1', '1', '3');
INSERT INTO `articles` VALUES ('260', '3241', 'FORD MONDEO 1,6-1,8-2,0 INYECC', '205.21', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-1016', '0', '0', '2');
INSERT INTO `articles` VALUES ('261', '3257', 'FORD F-100 4,9 INY.-BROCO V-8', '274.12', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-1062', '0', '0', '2');
INSERT INTO `articles` VALUES ('262', '7798159121532', 'CHEVROLET CRUZE 1.8CC', '238.63', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3261', '1', '1', '3');
INSERT INTO `articles` VALUES ('263', '7798001692746', ' CHEVROLET ASTRA NAFTA', '150.73', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3268', '1', '1', '3');
INSERT INTO `articles` VALUES ('264', '3271/2', ' RENAULT MASTER 2.5 CC ', '258.19', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3271/2', '0', '0', '1');
INSERT INTO `articles` VALUES ('265', '7798001698557', 'RENAULT MASTER 2.5 CC', '258.19', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3271/3', '0', '0', '1');
INSERT INTO `articles` VALUES ('266', '7798186471808', 'VOLKSWAGEN UP ', '186.43', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3288', '1', '1', '2');
INSERT INTO `articles` VALUES ('267', '7798159127206', 'CHEVROLET MONTANA ', '190.93', '40.00', '\0', 'AC', '8', '5', '', '\0', 'FAP-3279', '1', '1', '2');
INSERT INTO `articles` VALUES ('268', '7798001699912', 'CHEVROLET CORSA / MERIVA', '164.11', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3280', '2', '2', '4');
INSERT INTO `articles` VALUES ('269', '7798001693446', 'VW FOX-SURAN / GOLF', '125.37', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3287', '1', '2', '3');
INSERT INTO `articles` VALUES ('270', '7798159129460', 'CHEVROLET ONIX', '139.43', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3286', '1', '1', '2');
INSERT INTO `articles` VALUES ('271', '7798001692760', 'SUZUKI FUN/ CHEVROLET CELTA - PRISMA ', '138.33', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3289', '1', '1', '2');
INSERT INTO `articles` VALUES ('272', '3272', 'PEUGEOT 207 NAFTA', '150.82', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3272', '2', '2', '4');
INSERT INTO `articles` VALUES ('273', '7798001697086', 'FORD FOCUS 2000', '183.70', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3281', '2', '2', '4');
INSERT INTO `articles` VALUES ('274', '7798001692432', 'VOLKSWAGEN GOL ', '119.06', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3602', '2', '2', '4');
INSERT INTO `articles` VALUES ('275', '7798001699110', 'FORD KA 1.0 - 1.3', '151.99', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3608', '2', '2', '3');
INSERT INTO `articles` VALUES ('276', '7798001698823', 'FORD FOCUS 1.6 - 1.8 - 2.0', '170.66', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-3610', '2', '2', '5');
INSERT INTO `articles` VALUES ('277', '4037', 'PEUGEOT 405-306 SRI ', '149.75', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4037', '1', '1', '2');
INSERT INTO `articles` VALUES ('278', '7798001690049', 'FIAT DUNA / UNO ', '132.80', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4024', '0', '0', '1');
INSERT INTO `articles` VALUES ('279', ' 4041', 'TOYOTA ETIOS 1.5 CC - YARIS 2016-> ', '132.29', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-1246', '0', '0', '2');
INSERT INTO `articles` VALUES ('280', '7798001692715', 'RENAULT CLIO II / KANGOO', '154.75', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4060', '0', '0', '1');
INSERT INTO `articles` VALUES ('281', '7798001692777', 'FORD FIESTA / ECOSPORT / CITROEN C3', '164.85', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4055', '0', '0', '1');
INSERT INTO `articles` VALUES ('282', '7798001690056', 'FIAT DUNA / UNO / FIORINO ', '118.23', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4033', '1', '1', '3');
INSERT INTO `articles` VALUES ('283', '7798001690063', 'FORD ESCORT / ORION / GALAXY / VOLKSWAGEN SAVEIRO ', '147.72', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4034', '1', '1', '3');
INSERT INTO `articles` VALUES ('284', '7798159129224', 'TOYOTA ETIOS SEDAN 1.3', '195.65', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4043', '1', '1', '2');
INSERT INTO `articles` VALUES ('285', '7798001697369', 'FORD ECOSPORT 2.0 AUTOMATICA', '204.01', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4056', '1', '1', '2');
INSERT INTO `articles` VALUES ('286', '7798001698915', 'VOLKSWAGEN BORA TDI / GOLF / AUDI A3', '165.81', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4045', '0', '1', '3');
INSERT INTO `articles` VALUES ('287', '7798001699028', 'VW BORA', '220.15', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4045/1', '1', '2', '4');
INSERT INTO `articles` VALUES ('290', '7798159121075', 'VOLKSWAGEN AMAROK 2.0 2010', '253.50', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4046/1', '1', '1', '4');
INSERT INTO `articles` VALUES ('291', '7798001696768', 'CITROEN C4 / PEUGEOT 207 - 307', '167.32', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4052/2', '1', '1', '3');
INSERT INTO `articles` VALUES ('292', '4202', 'FIAT TIPO INY./TEMPRA/UNO', '135.09', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-1009', '2', '2', '4');
INSERT INTO `articles` VALUES ('293', '4871', ' RENAULT CLIO II MOTOR 1,2 CC', '136.82', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-1100', '1', '1', '3');
INSERT INTO `articles` VALUES ('294', '7798001693507', 'RENAULT CLIO II 1.2', '134.17', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4872/1', '1', '2', '4');
INSERT INTO `articles` VALUES ('295', '7798186473376', 'RENAULT LOGAN / SANDERO ', '151.11', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4878/1', '1', '1', '2');
INSERT INTO `articles` VALUES ('296', '7798001699998', 'RENAULT CLIO 2003 1.5', '137.37', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4872', '1', '2', '3');
INSERT INTO `articles` VALUES ('297', '7798001690568', 'CITROEN C3 / BERLINGO ( MOTOR 1.6 ', '144.70', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4873', '1', '1', '3');
INSERT INTO `articles` VALUES ('298', '1011', 'FIAT 1,1 - SMART', '171.08', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-1011', '1', '1', '3');
INSERT INTO `articles` VALUES ('299', '7798001690100', 'VOLSWAGEN GOL / SENDA / SAVEIRO ', '144.41', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4803', '1', '2', '3');
INSERT INTO `articles` VALUES ('300', '4823', 'FORD TRANSIT MAXXION', '174.01', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4823', '0', '0', '2');
INSERT INTO `articles` VALUES ('301', '7798001690117', 'CITROEN BERLINGO / PEUGEOT 405', '185.00', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4812', '0', '0', '2');
INSERT INTO `articles` VALUES ('302', '7798001692784', 'VOLKSWAGEN POLO DIESEL ', '165.77', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4826/1', '1', '1', '2');
INSERT INTO `articles` VALUES ('303', '4827', 'VW GOLF 1.8-1.9 ', '219.56', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4827', '1', '1', '3');
INSERT INTO `articles` VALUES ('304', '4831', 'ESCORT-FIESTA ZETEC  ', '183.17', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4831', '0', '0', '2');
INSERT INTO `articles` VALUES ('305', '7798151949127', 'CHEVROLET / FORD TRANSIT MAXXION', '183.90', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4834', '1', '1', '3');
INSERT INTO `articles` VALUES ('306', '7798159127251', 'CITROEN C4/ PICASSO/ BERLINGO/ PEUGEOT 207/308/408', '172.18', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4892', '1', '1', '2');
INSERT INTO `articles` VALUES ('307', '7798151949196', 'PEUGEOT 206 TDI', '137.37', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-4865/1', '0', '0', '1');
INSERT INTO `articles` VALUES ('308', '7798151949295', 'FIAT PUNTO 1.3 ', '344.70', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-5306', '1', '1', '2');
INSERT INTO `articles` VALUES ('309', '7798001697529', 'PEUGEOT 207 1.4', '155.69', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-6000', '1', '2', '4');
INSERT INTO `articles` VALUES ('310', '7798001696737', 'MB SPRINTER CON PREFILTRO ', '297.64', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-6003/1', '1', '1', '3');
INSERT INTO `articles` VALUES ('311', '7798001695679', 'AUDI A3 / VOLKSWAGEN GOLF - PASSAT - SCIROCCO - VE', '237.03', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-6012', '1', '1', '2');
INSERT INTO `articles` VALUES ('312', '6004', ' PEUGEOT 207 COMPAC', '263.46', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-6004', '0', '0', '2');
INSERT INTO `articles` VALUES ('313', '7798001693514', 'CITROEN C4 / PEUGEOT 307', '166.68', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-6010', '1', '2', '3');
INSERT INTO `articles` VALUES ('314', '7798001695686', 'VW VENTO 2.5 CC  ', '189.93', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-6012/2', '1', '2', '3');
INSERT INTO `articles` VALUES ('315', '7798159124267', 'PEUGEOT 308/508/ DS3 / CITROEN C3 II', '315.65', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-6013', '1', '2', '3');
INSERT INTO `articles` VALUES ('316', '7798001695402', 'VOLKSWAGEN FOX / CROSSFOX / SURAN / VOYAGE', '174.93', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-7007', '2', '2', '5');
INSERT INTO `articles` VALUES ('317', '7006', 'VW SURAN - FOX', '174.93', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-7006', '1', '2', '5');
INSERT INTO `articles` VALUES ('318', '7798001699141', 'FORD RANGER C/ MOTOR MAXION ', '188.92', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9002', '1', '1', '3');
INSERT INTO `articles` VALUES ('320', '7798001691138', 'FORD FIESTA / ECOSPORT (NAFTA)', '144.70', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9003', '2', '2', '4');
INSERT INTO `articles` VALUES ('321', '7798151942296', 'PEUGEOT 307 / CITROEN C4 / PICASSO / GRAND PICASSO', '188.92', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9013', '2', '2', '5');
INSERT INTO `articles` VALUES ('322', '7798001690865', 'FIAT PUNTO 1.8 2007 ', '193.64', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9014', '0', '0', '2');
INSERT INTO `articles` VALUES ('323', '7798001690872', 'FIAT PUNTO 1.4 ', '170.84', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9015', '1', '2', '4');
INSERT INTO `articles` VALUES ('324', '7798151942340', 'VOLKSWAGEN VENTO / AUDI A3 ', '379.22', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9025', '1', '1', '3');
INSERT INTO `articles` VALUES ('325', '7798151947970', 'CITROEN BERLINGO / PEUGEOT 207/307/ PARTNER', '164.85', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9027', '1', '2', '3');
INSERT INTO `articles` VALUES ('326', '7798001695037', 'FORD FOCUS 2.0 ', '278.86', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9028', '1', '1', '2');
INSERT INTO `articles` VALUES ('327', '7798159121884', 'PALIO-IDEA  - PUNTO - SIENA - DOBLO - BRAVO ', '181.33', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9121', '1', '2', '3');
INSERT INTO `articles` VALUES ('328', '7798001698595', 'AUDI A4', '502.73', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9053', '1', '1', '2');
INSERT INTO `articles` VALUES ('329', '9039', ' AUDI A3-3,2 V6-PASSAT 3,2 05->', '224.61', '40.00', '', 'AC', '8', '5', '', '\0', 'AM-1130', '0', '0', '1');
INSERT INTO `articles` VALUES ('330', '7798159121945', 'FIAT UNO/ GRAN SIENA', '146.53', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9054', '1', '2', '3');
INSERT INTO `articles` VALUES ('331', '7798001692708', 'RENAULT CLIO / KANGOO / LOGAN / SANDERO / MEGANE /', '141.95', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9273', '2', '2', '6');
INSERT INTO `articles` VALUES ('332', '7798159124090', 'FIESTA KINETIC 1.6', '160.27', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9286', '1', '2', '3');
INSERT INTO `articles` VALUES ('333', '9274', 'PEUGEOT 306 2.0 HDI ', '285.44', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9274', '0', '0', '1');
INSERT INTO `articles` VALUES ('334', '7798159125547', 'RENAULT FLUENCE / MEGANE', '262.36', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9283', '1', '1', '2');
INSERT INTO `articles` VALUES ('335', '7798001699790', 'RENAULT CLIO / KANGOO', '225.96', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9469', '1', '2', '3');
INSERT INTO `articles` VALUES ('337', '7798159129439', 'MBENZ SPRINTER', '459.38', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9112', '0', '0', '1');
INSERT INTO `articles` VALUES ('338', '7798159129484', 'FORD ECOSPORT KINETIC ', '207.12', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9296', '0', '1', '2');
INSERT INTO `articles` VALUES ('339', '9295', 'FORD ECOSPORT 2.0 16V KINETIC', '207.12', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9295', '1', '1', '2');
INSERT INTO `articles` VALUES ('340', '9299', 'RENAULT CLIO IV 1,2 CC-DUSTER 2.0-OROCH', '202.44', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9299', '0', '0', '2');
INSERT INTO `articles` VALUES ('341', '62', 'RENAULT 18 / TRAFIC ', '180.40', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-62', '0', '1', '2');
INSERT INTO `articles` VALUES ('342', '132', 'RENAULT 19 TURBO DIESEL ', '210.68', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-132', '0', '0', '2');
INSERT INTO `articles` VALUES ('343', '112', ' EQUIPO ANSI TUBULAR', '114.48', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-112', '2', '2', '5');
INSERT INTO `articles` VALUES ('344', '14', 'RENAULT 12 TUBULAR', '119.26', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-14', '0', '1', '2');
INSERT INTO `articles` VALUES ('345', '57/1', 'PEUGEOT 505 ', '101.13', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-57/1', '0', '0', '2');
INSERT INTO `articles` VALUES ('346', '38/1', ' FIAT UNO-DUNA M/TIPO ', '131.94', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-38/1', '0', '0', '2');
INSERT INTO `articles` VALUES ('347', '129', 'FORD FIESTA NAFTA ', '167.00', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-129', '0', '0', '1');
INSERT INTO `articles` VALUES ('348', '111', 'FORD F-100 XLT NAFTA DESDE 94', '210.34', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-111', '0', '0', '2');
INSERT INTO `articles` VALUES ('349', '125/1', 'FIAT FIORINO - VIVACE', '104.43', '40.00', '', 'AC', '12', '5', '', '\0', 'AM-125/1', '1', '1', '3');
INSERT INTO `articles` VALUES ('350', '214', ' TOYOTA CELICA 1,6-1,8-2,0 I', '193.32', '40.00', '', 'AC', '8', '6', '', '\0', 'JFO-214', '1', '1', '3');
INSERT INTO `articles` VALUES ('351', '151', 'COMB.FIAT TRACTOR 1ø SERIE 400', '290.68', '40.00', '', 'AC', '12', '7', '', '\0', 'MC-151', '0', '1', '3');
INSERT INTO `articles` VALUES ('352', '1375', 'FIAT LINEA - PUNTO', '244.26', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1375', '0', '1', '2');
INSERT INTO `articles` VALUES ('353', '7798151949431', 'RENAULT MEGANE II', '166.90', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1394', '1', '1', '3');
INSERT INTO `articles` VALUES ('354', '7798159123024', 'RENAULT FLUENCE', '277.94', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1396', '1', '1', '3');
INSERT INTO `articles` VALUES ('355', '7798159123062', 'RENAULT LOGAN-SANDERO ', '123.28', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1397', '1', '1', '3');
INSERT INTO `articles` VALUES ('356', '7798151941060', 'AUDI A3 04->', '224.55', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1100/C', '1', '1', '2');
INSERT INTO `articles` VALUES ('359', '7798151941107', 'VOLKSWAGEN AMAROK / TIGUAN ', '312.94', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1140/C', '1', '1', '3');
INSERT INTO `articles` VALUES ('360', '1430', 'CITROEN XANTIA-C3', '136.49', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1430', '0', '0', '2');
INSERT INTO `articles` VALUES ('361', '7798001693194', 'PEUGEOT 307-CITROEN ', '123.28', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1446', '1', '1', '2');
INSERT INTO `articles` VALUES ('362', '7798159122065', 'PEUGEOT 207/208', '224.55', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1444', '0', '0', '2');
INSERT INTO `articles` VALUES ('363', '1963 ', 'TOYOTA COROLLA 06->', '156.29', '40.00', '', 'AC', '12', '8', '', '\0', 'HM-2085', '0', '0', '2');
INSERT INTO `articles` VALUES ('364', '7798001697499', ' TOYOTA HI-LUX', '145.38', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1965', '1', '2', '4');
INSERT INTO `articles` VALUES ('365', '1993', 'CHEVROLET S-10 2012->-MITSUBISHI', '212.93', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-1993', '1', '2', '3');
INSERT INTO `articles` VALUES ('366', '7798186471648', 'TOYOTA COROLLA-ETIOS', '139.21', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-2161', '1', '1', '2');
INSERT INTO `articles` VALUES ('367', '7798159121983', 'CHEVROLET AVEO ', '173.98', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-3534', '0', '0', '2');
INSERT INTO `articles` VALUES ('368', '7798001692470', ' CHEV. CORSA-ASTRA', '116.31', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-3536', '0', '0', '1');
INSERT INTO `articles` VALUES ('369', '7798001693224', ' RENAULT CLIO II / LOGAN / MEGANE / KANGOO', '185.16', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35112', '0', '1', '2');
INSERT INTO `articles` VALUES ('370', '7798001692524', 'POLO-GOLF-SEAT ', '152.26', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35132', '1', '1', '2');
INSERT INTO `articles` VALUES ('371', '7798001693279', 'PEUGEOT 206 / 207', '133.75', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35157', '1', '1', '3');
INSERT INTO `articles` VALUES ('372', '7798001693286', 'CHEV. CORSA 02-> MONTANA', '231.98', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35159', '1', '2', '4');
INSERT INTO `articles` VALUES ('373', '7798001693293', ' VW FOX / CROSSFOX / SURAN / SEAT ', '124.61', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35163', '1', '1', '4');
INSERT INTO `articles` VALUES ('374', '7798186472768', ' FORD RANGER 3.2 CC', '195.44', '40.00', '\0', 'AC', '8', '8', '', '\0', 'AKX-35177', '0', '0', '1');
INSERT INTO `articles` VALUES ('375', '35179', 'FORD FOCUS 06-> ', '170.69', '40.00', '', 'AC', '8', '8', '', '\0', 'HM-2079', '0', '1', '2');
INSERT INTO `articles` VALUES ('376', '7798001693316', 'CHEVROLET ZAFIRA / ASTRA / VECTRA ', '233.66', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35285', '0', '0', '2');
INSERT INTO `articles` VALUES ('377', '7798001693323', 'FIAT PALIO-SIENA', '106.34', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35321', '1', '1', '2');
INSERT INTO `articles` VALUES ('378', '35323', ' FIAT UNO WAY 1.4 / GRAND SIENA / PALIO ', '141.23', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35323', '0', '0', '1');
INSERT INTO `articles` VALUES ('379', '7798159128876', 'FIAT DOBLO-QUBO-FIORINO', '245.76', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35324', '0', '0', '1');
INSERT INTO `articles` VALUES ('380', '7798001693347', 'FORD ECO SPORT-FIESTA II ', '149.54', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35346', '1', '2', '3');
INSERT INTO `articles` VALUES ('381', '7798159122034', 'FORD FIESTA KINETIC', '141.23', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35347', '0', '0', '2');
INSERT INTO `articles` VALUES ('382', '7798001693361', ' VW BORA / AUDI / GOLF', '273.83', '40.00', '', 'AC', '8', '8', '', '\0', 'AKX-35634/C', '1', '1', '2');
INSERT INTO `articles` VALUES ('383', '2002', 'CITROEN XANTIA / BERLINGO / XSARA CLIMA', '180.32', '40.00', '', 'AC', '12', '8', '', '\0', 'HM-2002', '0', '0', '1');
INSERT INTO `articles` VALUES ('384', '2015', 'RENAULT MEGANE / SCENIC ', '145.35', '40.00', '', 'AC', '12', '8', '', '\0', 'HM-2015', '0', '0', '1');
INSERT INTO `articles` VALUES ('385', '2082', 'JEEP CHEROKEE', '242.25', '40.00', '', 'AC', '12', '8', '', '\0', 'HM-2082', '0', '0', '1');
INSERT INTO `articles` VALUES ('386', '2134', 'M. BENS SPRINTER 415/515', '232.72', '40.00', '', 'AC', '12', '8', '', '\0', 'HM-2134', '0', '0', '1');
INSERT INTO `articles` VALUES ('387', '7790968000855', 'REFRIGERANTE ORGANICO ', '125.00', '40.00', '', 'AC', '7', '10', '', '\0', 'KRIOK', '2', '2', '5');
INSERT INTO `articles` VALUES ('388', '7790968911502', 'REFRIGERANTE INORGANICO ', '115.00', '40.00', '', 'AC', '7', '10', '', '\0', 'KRIOK', '2', '2', '5');
INSERT INTO `articles` VALUES ('389', '7790968000831', 'LAVA PARABRISAS', '65.00', '40.00', '', 'AC', '7', '11', '', '\0', 'LAVAPARABRISAS', '2', '3', '6');
INSERT INTO `articles` VALUES ('390', '7790968125442', 'ACEITE HIDRAULICO X 1 LT', '114.00', '40.00', '', 'AC', '7', '9', '', '\0', 'HIDROATF', '2', '2', '4');
INSERT INTO `articles` VALUES ('391', '7897707506064', 'CORTA 12', '54.00', '40.00', '', 'AC', '10', '12', '', '\0', 'BP5HS', '3', '5', '10');
INSERT INTO `articles` VALUES ('392', '7897707505722', 'LARGA RESISTIVA', '50.00', '40.00', '', 'AC', '10', '12', '', '\0', 'BPR5EY', '4', '6', '20');
INSERT INTO `articles` VALUES ('393', '7897707506040', 'LARGA FIAT- PEUGEOT', '45.00', '40.00', '', 'AC', '10', '12', '', '\0', 'BP5EY', '4', '6', '20');
INSERT INTO `articles` VALUES ('394', '7897707505708', 'RENAULT TWINGOII M.B.320 BMW CHEROK', '61.75', '40.00', '', 'AC', '10', '12', '', '\0', 'BKR5E', '4', '6', '20');
INSERT INTO `articles` VALUES ('395', '7897707505692', 'BUJIA', '61.00', '40.00', '', 'AC', '10', '12', '', '\0', 'BCPR5EY', '4', '6', '10');
INSERT INTO `articles` VALUES ('396', '7897707511488', 'PEUGEOT-CITROEN 307-PARTNER 1.6 16V', '175.00', '40.00', '', 'AC', '10', '12', '', '\0', 'LFR5B', '4', '5', '10');
INSERT INTO `articles` VALUES ('397', '7897707505272', 'FORD FALCON / TAUNUS ', '54.00', '40.00', '', 'AC', '10', '12', '', '\0', 'AP5FS', '4', '5', '10');
INSERT INTO `articles` VALUES ('398', '7897707506033', 'FORD TAUNUS- RENAULT 18', '54.00', '40.00', '', 'AC', '10', '12', '', '\0', 'BP5EFS', '4', '6', '10');
INSERT INTO `articles` VALUES ('399', '7897707505746', 'FIAT / MERCEDES BENZ', '50.00', '40.00', '', 'AC', '10', '12', '', '\0', 'BPR6EY', '4', '6', '10');
INSERT INTO `articles` VALUES ('400', '7790968000947', 'SHAMPOO P/AUTOS', '72.00', '40.00', '', 'AC', '7', '13', '', '\0', 'LAVAAUTOS', '1', '2', '4');
INSERT INTO `articles` VALUES ('401', '7790968000954', 'CERA P/AUTO ', '79.00', '40.00', '', 'AC', '7', '13', '', '\0', 'CERABRILLOFINAL', '1', '1', '3');
INSERT INTO `articles` VALUES ('402', '7790968000978', 'SILICONA EN SPRAY ', '107.14', '40.00', '', 'AC', '7', '13', '', '\0', 'RENOVADORCONSILICONAS', '1', '2', '5');
INSERT INTO `articles` VALUES ('403', '7790968000985', 'DESENGRASANTE P/AUTOS', '136.00', '40.00', '', 'AC', '7', '13', '', '\0', 'LIMPIATAPIZADOSYALFOMBRAS', '0', '0', '2');
INSERT INTO `articles` VALUES ('404', '7790968000992', 'DESENGRASANTE P/MOTOR ', '100.00', '40.00', '', 'AC', '7', '13', '', '\0', 'LIMPIAMOTORES', '1', '1', '2');
INSERT INTO `articles` VALUES ('405', '4050300001470', 'H4 ORIGINAL  12V 60/55W', '53.57', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '20');
INSERT INTO `articles` VALUES ('406', '4050300222028', 'H4 HALOGENA R2 12V  60/55W', '53.57', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '20');
INSERT INTO `articles` VALUES ('407', '4008321650894', 'H4 BLUE 12V  60/55W ', '121.43', '40.00', '', 'AC', '9', '14', '', '\0', '', '3', '3', '10');
INSERT INTO `articles` VALUES ('408', '4050300332185', 'H7 ORIGINAL  12V 55W', '100.00', '40.00', '', 'AC', '9', '14', '', '\0', '', '5', '5', '25');
INSERT INTO `articles` VALUES ('409', '4008321651341', 'H7 BLUE  12V 55W', '164.30', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '4', '10');
INSERT INTO `articles` VALUES ('410', '4050300524313', 'H11 ORIGINAL  12V 55W', '307.14', '40.00', '', 'AC', '9', '14', '', '\0', '', '2', '2', '6');
INSERT INTO `articles` VALUES ('411', '4050300386522', 'H7 HALOGENA 12VOLT ', '142.86', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '4', '10');
INSERT INTO `articles` VALUES ('412', '4050300016535', 'H3 HALOGENA 24VOLT ', '57.14', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '4', '10');
INSERT INTO `articles` VALUES ('413', '4050300016498', 'H1 HALOGENA 24VOLT', '60.72', '40.00', '', 'AC', '9', '14', '', '\0', '', '3', '4', '10');
INSERT INTO `articles` VALUES ('414', '4050300001494', 'H3 HALOGENA 12VOLT', '42.86', '40.00', '', 'AC', '9', '14', '', '\0', '', '5', '5', '20');
INSERT INTO `articles` VALUES ('415', '4050300001487', 'H1 HALOGENA 12VOLT', '35.72', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '10');
INSERT INTO `articles` VALUES ('416', '4050300524849', 'P21W 12VOLT ORIGINAL ', '7.14', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '20');
INSERT INTO `articles` VALUES ('417', '4050300525129', 'P21/5W 12VOLT ORIGINAL ', '8.57', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '20');
INSERT INTO `articles` VALUES ('418', '4050300524863', 'P21/5W  24VOLT ORIGINAL', '14.29', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '20');
INSERT INTO `articles` VALUES ('419', '4050300525068', 'T4W 12 VOLT ', '7.14', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '20');
INSERT INTO `articles` VALUES ('420', '4050300891484', 'PY21W  21W 12VOLT', '14.29', '40.00', '', 'AC', '9', '14', '', '\0', '', '3', '4', '10');
INSERT INTO `articles` VALUES ('421', '4050300525464', 'R10W  10W 12VOLT', '10.72', '40.00', '', 'AC', '9', '14', '', '\0', '', '4', '5', '20');
INSERT INTO `articles` VALUES ('422', '4050300525082', 'R5W  5W 12VOLT', '7.14', '40.00', '', 'AC', '9', '14', '', '\0', '', '3', '4', '10');
INSERT INTO `articles` VALUES ('423', '4008321795212', 'TRUCKSTAR PRO R10W  10W 12VOLT', '21.43', '40.00', '', 'AC', '9', '14', '', '\0', '', '3', '4', '10');
INSERT INTO `articles` VALUES ('424', '4050300525228', 'P21W  21W 24VOLT', '28.57', '40.00', '', 'AC', '9', '14', '', '\0', '', '3', '4', '10');
INSERT INTO `articles` VALUES ('425', '7790327053652', 'LIQUIDO PARA FRENOS TIPO 3 - 200CM ', '39.29', '40.00', '', 'AC', '14', '15', '', '\0', '', '2', '3', '7');
INSERT INTO `articles` VALUES ('426', '7790327053676', 'LIQUIDO PARA FRENOS TIPO 3 - 500CM', '71.43', '40.00', '', 'AC', '14', '15', '', '\0', '', '2', '3', '7');
INSERT INTO `articles` VALUES ('427', '7790327053638', 'LIQUIDO PARA FRENOS ', '128.57', '40.00', '', 'AC', '14', '15', '', '\0', '', '2', '3', '7');
INSERT INTO `articles` VALUES ('428', '7798038701275', 'GLACELF 1 LT', '121.43', '40.00', '', 'AC', '11', '10', '', '\0', '', '2', '2', '10');
INSERT INTO `articles` VALUES ('429', '7798038701268', 'GLACELF SUPRA TIPO A  1 LT', '142.86', '40.00', '', 'AC', '11', '10', '', '\0', '', '2', '3', '10');
INSERT INTO `articles` VALUES ('430', '7798038704955', 'SUPRA RED TIPO A  1LT', '164.29', '40.00', '', 'AC', '11', '10', '', '\0', '', '2', '3', '10');
INSERT INTO `articles` VALUES ('431', '7790968000770', 'LUBRICANTE MULTIPROPOSITO ', '81.43', '40.00', '', 'AC', '7', '9', '', '\0', 'LIMIT', '2', '3', '15');
INSERT INTO `articles` VALUES ('432', '7790968001197', 'LUBRICANTE SEMIFLUIDO ESPECIAL PARA CADENAS', '77.15', '40.00', '', 'AC', '7', '9', '', '\0', 'ELAIONMOTOCADENAS', '2', '3', '15');
INSERT INTO `articles` VALUES ('433', '7790968000275', 'ELAION F10  15W-40', '570.00', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '3', '20');
INSERT INTO `articles` VALUES ('434', '7790968000176', 'EXTRAVIDA XV 300  15W- 40', '437.15', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '3', '20');
INSERT INTO `articles` VALUES ('435', '7790968000619', 'ELAION F10  20W- 50', '450.00', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '3', '20');
INSERT INTO `articles` VALUES ('436', '7790968911922', 'ELAION TORQUE 15W- 40', '180.00', '40.00', '', 'AC', '7', '9', '', '\0', '', '0', '0', '5');
INSERT INTO `articles` VALUES ('437', '7790968000282', 'ELAION F30  10W- 40', '231.43', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '3', '20');
INSERT INTO `articles` VALUES ('438', '7790968000299', 'ELAION F50  5W- 40', '325.72', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '3', '20');
INSERT INTO `articles` VALUES ('439', '7790968001203', 'ELAION F50 d1  5W- 30', '347.15', '40.00', '', 'AC', '7', '9', '', '\0', '', '1', '2', '5');
INSERT INTO `articles` VALUES ('440', '7790968000381', 'ELAION F10  15W- 40  4LTS', '570.00', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '2', '10');
INSERT INTO `articles` VALUES ('442', '7790968000183', 'EXTRAVIDA XV 300  15W- 40  4LTS', '437.15', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '2', '6');
INSERT INTO `articles` VALUES ('443', '7790968000626', 'ELAION F10 20W- 50  4LTS', '450.00', '40.00', '', 'AC', '7', '9', '', '\0', '', '1', '1', '5');
INSERT INTO `articles` VALUES ('444', '7790968000398', 'ELAION F30  10W- 40  4 LTS', '754.28', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '3', '15');
INSERT INTO `articles` VALUES ('445', '7790968000404', 'ELAION F50  5W- 40  4LTS', '1122.86', '40.00', '', 'AC', '7', '9', '', '\0', '', '2', '3', '8');
INSERT INTO `articles` VALUES ('446', '7790968001210', 'ELAION F50 d1  5W- 30 4LTS', '1165.72', '40.00', '', 'AC', '7', '9', '', '\0', '', '1', '2', '4');
INSERT INTO `articles` VALUES ('447', '7790968001333', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '40.00', '', 'AC', '7', '9', '', '\0', '', '1', '1', '4');
INSERT INTO `articles` VALUES ('448', '7790968001326', 'ELAION F50 PLUS  5W- 40  1LT', '355.72', '40.00', '', 'AC', '7', '9', '', '\0', '', '1', '1', '3');
INSERT INTO `articles` VALUES ('449', '3267025007460', 'MOTO TECH 4  10W-50  1LT', '300.00', '40.00', '', 'AC', '13', '9', '', '\0', '', '4', '5', '50');
INSERT INTO `articles` VALUES ('450', '3374650247205', '4T  15W-50', '167.15', '40.00', '', 'AC', '15', '9', '', '\0', '', '2', '3', '20');
INSERT INTO `articles` VALUES ('451', '7798038700735', 'TOTAL 7000  10W-40 DIESEL  1LT ', '368.57', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '2', '8');
INSERT INTO `articles` VALUES ('452', '7798038700704', 'TOTAL 7000  10W-40 NAFTA 1LT', '368.57', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '2', '8');
INSERT INTO `articles` VALUES ('453', '7798038700438', 'TOTAL 5000  15W-40  1LT', '248.57', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '2', '8');
INSERT INTO `articles` VALUES ('454', '7798038700315', 'TOTAL 5000  20W-50 GNC  1LT', '248.57', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '1', '5');
INSERT INTO `articles` VALUES ('455', '7798038706157', '500TS  20W-50  1LT', '222.86', '40.00', '', 'AC', '13', '9', '', '\0', '', '1', '1', '5');
INSERT INTO `articles` VALUES ('456', '7798038705747', 'TOTAL 9000  5W-40  4LTS', '1705.72', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '1', '6');
INSERT INTO `articles` VALUES ('457', '7798038700698', 'TOTAL 7000 10W-40 NAFTA   4LTS ', '1088.57', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '2', '8');
INSERT INTO `articles` VALUES ('458', '7798038700728', 'TOTAL 7000 10W-40 DIESEL  4LTS ', '1088.57', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '2', '6');
INSERT INTO `articles` VALUES ('459', '7798038700568', 'TOTAL 5000  15W-40  4LTS', '745.72', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '2', '5');
INSERT INTO `articles` VALUES ('460', '7798038700322', 'TOTAL 5000  20W-50  4LTS ', '745.72', '40.00', '', 'AC', '11', '9', '', '\0', '', '1', '2', '5');
INSERT INTO `articles` VALUES ('461', '7798038706195', '500TS  20W-50  4LTS', '814.28', '40.00', '', 'AC', '13', '9', '', '\0', '', '1', '2', '5');
INSERT INTO `articles` VALUES ('462', '7793815100050', 'FLUIDO ANTIFRICCION PARA DIFERENCIAL Y CAJA 60CM', '107.14', '40.00', '', 'AC', '16', '16', '', '\0', 'FCPLUS', '2', '2', '15');
INSERT INTO `articles` VALUES ('463', '7793815100067', 'FLUIDO ANTIFRICCION PARA DIFERENCIAL Y CAJA 100CM', '178.57', '40.00', '', 'AC', '16', '16', '', '\0', '', '2', '2', '8');
INSERT INTO `articles` VALUES ('464', '7793815000763', 'ANTIFRICCION PARA MOTOR 150ML', '85.72', '40.00', '', 'AC', '16', '16', '', '\0', 'AF2', '2', '2', '10');
INSERT INTO `articles` VALUES ('465', '7793815200873', 'LIMPIA INYECTORES DIESEL 150ML', '139.29', '40.00', '', 'AC', '16', '16', '', '\0', 'CHEM10ACTIVECLEANER', '3', '4', '10');
INSERT INTO `articles` VALUES ('466', '7793815200774', 'LIMPIA INYECTORES NAFTA  150ML', '107.14', '40.00', '', 'AC', '16', '16', '', '\0', 'CHEM10CLEANER', '2', '3', '10');
INSERT INTO `articles` VALUES ('467', '7791782003343', 'CEPILLO LAVA AUTO ECONOMICO ', '11.00', '40.00', '', 'AC', '17', '13', '', '\0', '', '1', '2', '10');
INSERT INTO `articles` VALUES ('468', '7791782001349', 'CEPILLO LAVA AUTO PREMIUM', '137.60', '40.00', '', 'AC', '17', '13', '', '\0', 'ART.134', '2', '3', '10');
INSERT INTO `articles` VALUES ('469', '7791782001394', 'CEPILLO LAVA AUTO GRANDE PREMIUM', '10.00', '40.00', '', 'AC', '17', '13', '', '\0', 'ART.139', '2', '3', '10');
INSERT INTO `articles` VALUES ('470', '7798159129477', 'FORD ECOSPORT', '231.19', '40.00', '', 'AC', '8', '5', '', '\0', 'FAP-9295', '1', '1', '4');
INSERT INTO `articles` VALUES ('471', '29/1', 'RENAULT 18 - FUEGO', '140.52', '40.00', '', 'AC', '12', '5', '', '\0', 'AMP-29/1', '1', '1', '4');
INSERT INTO `articles` VALUES ('473', '7798001699486', 'RENAULT 9/11/19/18', '139.48', '40.00', '', 'AC', '8', '6', '', '\0', 'WO-400', '1', '2', '6');
INSERT INTO `articles` VALUES ('474', '264', 'MERCEDES BENZ 1215/1315', '156.08', '40.00', '', 'AC', '12', '6', '', '\0', 'EA-264', '1', '1', '4');
INSERT INTO `articles` VALUES ('475', 'lv100', 'lavado común', '100.00', '25.00', '', 'AC', '7', '6', '\0', '\0', '', '0', '0', '0');
INSERT INTO `articles` VALUES ('476', 'sil', 'Silicona', '1.00', '1.00', '\0', 'AC', '6', '9', '', '\0', '', '0', '0', '0');
INSERT INTO `articles` VALUES ('477', 'cha', 'champu', '1.00', '1.00', '\0', 'AC', '6', '9', '', '\0', '', '0', '0', '0');

-- ----------------------------
-- Table structure for articulosdetalle
-- ----------------------------
DROP TABLE IF EXISTS `articulosdetalle`;
CREATE TABLE `articulosdetalle` (
  `artDetId` int(11) NOT NULL AUTO_INCREMENT,
  `artId` int(11) NOT NULL,
  `artDetCantidad` decimal(10,2) NOT NULL,
  `artId_` int(11) NOT NULL,
  PRIMARY KEY (`artDetId`),
  KEY `artId` (`artId`) USING BTREE,
  KEY `artId_` (`artId_`) USING BTREE,
  CONSTRAINT `articulosdetalle_ibfk_1` FOREIGN KEY (`artId`) REFERENCES `articles` (`artId`) ON UPDATE CASCADE,
  CONSTRAINT `articulosdetalle_ibfk_2` FOREIGN KEY (`artId_`) REFERENCES `articles` (`artId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of articulosdetalle
-- ----------------------------
INSERT INTO `articulosdetalle` VALUES ('3', '475', '0.50', '477');
INSERT INTO `articulosdetalle` VALUES ('4', '475', '2.00', '476');

-- ----------------------------
-- Table structure for cajas
-- ----------------------------
DROP TABLE IF EXISTS `cajas`;
CREATE TABLE `cajas` (
  `cajaId` int(11) NOT NULL AUTO_INCREMENT,
  `cajaApertura` datetime NOT NULL,
  `cajaCierre` datetime DEFAULT NULL,
  `usrId` int(11) DEFAULT NULL,
  `cajaImpApertura` decimal(10,2) NOT NULL,
  `cajaImpVentas` decimal(10,2) DEFAULT NULL,
  `cajaImpRendicion` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`cajaId`),
  KEY `usrId` (`usrId`),
  CONSTRAINT `cajas_ibfk_1` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cajas
-- ----------------------------
INSERT INTO `cajas` VALUES ('1', '2018-02-05 14:19:39', '2018-02-05 16:15:50', '4', '500.00', '0.00', '10.00');
INSERT INTO `cajas` VALUES ('2', '2018-02-05 17:04:07', '2018-02-07 10:45:43', '4', '20.00', '0.00', '500.00');
INSERT INTO `cajas` VALUES ('3', '2018-02-07 12:04:32', '2018-02-09 13:49:22', '4', '10.00', '0.00', '50.00');
INSERT INTO `cajas` VALUES ('4', '2018-02-09 13:49:39', '2018-02-09 16:52:22', '4', '10.00', '9958.14', '10.00');
INSERT INTO `cajas` VALUES ('5', '2018-02-09 16:52:54', '2018-02-17 12:01:31', '4', '100.00', '11256.06', '80.00');
INSERT INTO `cajas` VALUES ('6', '2018-02-17 12:05:42', '2018-02-22 15:35:53', '4', '700.00', '9263.88', '100.00');
INSERT INTO `cajas` VALUES ('7', '2018-02-22 15:36:02', '2018-02-22 16:27:10', '4', '50.00', '7940.00', '10.00');
INSERT INTO `cajas` VALUES ('8', '2018-02-22 16:31:06', '2018-03-07 20:51:20', '4', '1.00', '0.00', '200.00');
INSERT INTO `cajas` VALUES ('9', '2018-03-07 20:54:19', '2018-03-07 20:59:44', '4', '900.00', '1860.00', '3300.00');
INSERT INTO `cajas` VALUES ('10', '2018-03-07 21:02:47', '2018-03-22 20:24:26', '4', '0.01', '4942.02', '3000.00');
INSERT INTO `cajas` VALUES ('11', '2018-03-23 13:26:37', '2018-04-23 11:24:17', '4', '10.00', '0.00', '20.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('1', 'Sergio', 'Moyano', '1', '3124208', '', '123465', '', 'AC', '\0');
INSERT INTO `clientes` VALUES ('2', 'Consumidor Final', '', '1', '1', '', ' ', '', 'AC', '');
INSERT INTO `clientes` VALUES ('3', 'Sergio', 'Mo', '1', '31324208', '', '123', '', 'AC', '\0');

-- ----------------------------
-- Table structure for cuentacorrientecliente
-- ----------------------------
DROP TABLE IF EXISTS `cuentacorrientecliente`;
CREATE TABLE `cuentacorrientecliente` (
  `cctepId` int(11) NOT NULL AUTO_INCREMENT,
  `cctepConcepto` varchar(50) NOT NULL,
  `cctepRef` int(11) DEFAULT NULL,
  `cctepTipo` varchar(2) NOT NULL,
  `cctepDebe` decimal(10,2) DEFAULT NULL,
  `cctepHaber` decimal(10,2) DEFAULT NULL,
  `cctepFecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cliId` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `cajaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`cctepId`),
  KEY `cliId` (`cliId`) USING BTREE,
  KEY `usrId` (`usrId`) USING BTREE,
  KEY `cajaId` (`cajaId`),
  CONSTRAINT `cuentacorrientecliente_ibfk_1` FOREIGN KEY (`cliId`) REFERENCES `clientes` (`cliId`) ON UPDATE CASCADE,
  CONSTRAINT `cuentacorrientecliente_ibfk_2` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE,
  CONSTRAINT `cuentacorrientecliente_ibfk_3` FOREIGN KEY (`cajaId`) REFERENCES `cajas` (`cajaId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cuentacorrientecliente
-- ----------------------------
INSERT INTO `cuentacorrientecliente` VALUES ('1', 'Servicio: 1', '1', 'SV', '2442.02', null, '2018-02-09 17:30:07', '1', '4', null);
INSERT INTO `cuentacorrientecliente` VALUES ('2', 'le voy a pagar', null, 'MN', '0.00', '2000.00', '2018-02-09 17:44:02', '1', '4', null);
INSERT INTO `cuentacorrientecliente` VALUES ('3', 'Servicio: -1', '67', 'VN', '250.00', null, '2018-02-14 15:17:35', '1', '4', null);
INSERT INTO `cuentacorrientecliente` VALUES ('4', 'Venta: 68', '68', 'VN', '125.00', null, '2018-02-14 15:19:11', '1', '4', null);
INSERT INTO `cuentacorrientecliente` VALUES ('5', 'Servicio: 4', '4', 'SV', '1860.00', null, '2018-02-17 12:15:23', '3', '4', null);
INSERT INTO `cuentacorrientecliente` VALUES ('6', 'me pagaron', null, 'MN', '0.00', '500.00', '2018-02-22 16:44:10', '3', '4', '8');
INSERT INTO `cuentacorrientecliente` VALUES ('7', 'pago', null, 'MN', '0.00', '1000.00', '2018-03-07 20:56:54', '3', '4', '9');

-- ----------------------------
-- Table structure for cuentacorrienteproveedor
-- ----------------------------
DROP TABLE IF EXISTS `cuentacorrienteproveedor`;
CREATE TABLE `cuentacorrienteproveedor` (
  `cctepId` int(11) NOT NULL AUTO_INCREMENT,
  `cctepConcepto` varchar(50) NOT NULL,
  `cctepRef` int(11) DEFAULT NULL,
  `cctepTipo` varchar(2) NOT NULL,
  `cctepDebe` decimal(10,2) DEFAULT NULL,
  `cctepHaber` decimal(10,2) DEFAULT NULL,
  `cctepFecha` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `prvId` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `cajaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`cctepId`),
  KEY `prvId` (`prvId`) USING BTREE,
  KEY `usrId` (`usrId`) USING BTREE,
  KEY `cajaId` (`cajaId`),
  CONSTRAINT `cuentacorrienteproveedor_ibfk_1` FOREIGN KEY (`prvId`) REFERENCES `proveedores` (`prvId`) ON UPDATE CASCADE,
  CONSTRAINT `cuentacorrienteproveedor_ibfk_2` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE,
  CONSTRAINT `cuentacorrienteproveedor_ibfk_3` FOREIGN KEY (`cajaId`) REFERENCES `cajas` (`cajaId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cuentacorrienteproveedor
-- ----------------------------
INSERT INTO `cuentacorrienteproveedor` VALUES ('8', 'Valor del sistema de Lubricentro', null, 'MN', '18000.00', '0.00', '2018-01-16 02:00:47', '2', '4', null);
INSERT INTO `cuentacorrienteproveedor` VALUES ('9', 'Entrega a cuenta sin recibo ', null, 'MN', '0.00', '2000.00', '2018-05-18 17:37:17', '2', '4', null);
INSERT INTO `cuentacorrienteproveedor` VALUES ('11', 'Recepción Factura B número: 001000005168', '2', 'RC', '5335.79', null, '2018-01-25 00:00:00', '1', '4', null);
INSERT INTO `cuentacorrienteproveedor` VALUES ('12', 'Recepción Remito X número: 000100008132', '3', 'RC', '3864.55', null, '2018-01-26 00:00:00', '1', '4', null);
INSERT INTO `cuentacorrienteproveedor` VALUES ('13', 'pgo con asdasd', null, 'MN', '0.00', '1000.00', '2018-02-08 22:36:14', '1', '4', null);
INSERT INTO `cuentacorrienteproveedor` VALUES ('14', 'prueba de erroro', null, 'MN', '0.00', '500.00', '2018-02-22 16:31:25', '4', '4', null);
INSERT INTO `cuentacorrienteproveedor` VALUES ('15', 'pruebaaaaa', null, 'MN', '0.00', '100.00', '2018-02-22 16:35:14', '4', '4', '8');
INSERT INTO `cuentacorrienteproveedor` VALUES ('16', 'negativo', null, 'MN', '20.00', '0.00', '2018-02-22 16:35:44', '4', '4', null);
INSERT INTO `cuentacorrienteproveedor` VALUES ('17', 'pago a provv', null, 'MN', '500.00', '0.00', '2018-05-18 17:37:18', '2', '4', '9');

-- ----------------------------
-- Table structure for listadeprecios
-- ----------------------------
DROP TABLE IF EXISTS `listadeprecios`;
CREATE TABLE `listadeprecios` (
  `lpId` int(11) NOT NULL AUTO_INCREMENT,
  `lpDescripcion` varchar(50) NOT NULL,
  `lpDefault` bit(1) NOT NULL DEFAULT b'0',
  `lpMargen` decimal(10,2) NOT NULL DEFAULT '0.00',
  `lpEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`lpId`),
  UNIQUE KEY `lpDescripcion` (`lpDescripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of listadeprecios
-- ----------------------------
INSERT INTO `listadeprecios` VALUES ('1', 'Contado', '', '0.00', 'AC');
INSERT INTO `listadeprecios` VALUES ('2', 'tarjetas', '\0', '10.00', 'AC');

-- ----------------------------
-- Table structure for marcaart
-- ----------------------------
DROP TABLE IF EXISTS `marcaart`;
CREATE TABLE `marcaart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion` (`descripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of marcaart
-- ----------------------------
INSERT INTO `marcaart` VALUES ('6', 'Bardahl');
INSERT INTO `marcaart` VALUES ('17', 'CERCRIN ');
INSERT INTO `marcaart` VALUES ('13', 'ELF');
INSERT INTO `marcaart` VALUES ('12', 'MASTERFIL ');
INSERT INTO `marcaart` VALUES ('16', 'MOLYKOTE');
INSERT INTO `marcaart` VALUES ('15', 'MOTUL ');
INSERT INTO `marcaart` VALUES ('10', 'NGK ');
INSERT INTO `marcaart` VALUES ('9', 'OSRAM ');
INSERT INTO `marcaart` VALUES ('11', 'TOTAL');
INSERT INTO `marcaart` VALUES ('19', 'TRICO');
INSERT INTO `marcaart` VALUES ('14', 'WAGNER ');
INSERT INTO `marcaart` VALUES ('8', 'WEGA');
INSERT INTO `marcaart` VALUES ('7', 'YPF');

-- ----------------------------
-- Table structure for marcaveh
-- ----------------------------
DROP TABLE IF EXISTS `marcaveh`;
CREATE TABLE `marcaveh` (
  `marId` int(11) NOT NULL AUTO_INCREMENT,
  `marDescripcion` varchar(30) NOT NULL,
  `marEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`marId`),
  UNIQUE KEY `marDescripcion` (`marDescripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of marcaveh
-- ----------------------------
INSERT INTO `marcaveh` VALUES ('2', 'Vovlo', 'AC');

-- ----------------------------
-- Table structure for mediosdepago
-- ----------------------------
DROP TABLE IF EXISTS `mediosdepago`;
CREATE TABLE `mediosdepago` (
  `medId` int(11) NOT NULL AUTO_INCREMENT,
  `medCodigo` varchar(3) NOT NULL,
  `medDescripcion` varchar(50) NOT NULL,
  `tmpId` int(11) NOT NULL,
  `medEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`medId`),
  UNIQUE KEY `medCodigo` (`medCodigo`) USING BTREE,
  UNIQUE KEY `medDescripcion` (`medDescripcion`) USING BTREE,
  KEY `tmpId` (`tmpId`),
  CONSTRAINT `mediosdepago_ibfk_1` FOREIGN KEY (`tmpId`) REFERENCES `tipomediopago` (`tmpId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mediosdepago
-- ----------------------------
INSERT INTO `mediosdepago` VALUES ('1', 'EFE', 'Efectivo', '1', 'AC');
INSERT INTO `mediosdepago` VALUES ('2', 'VIS', 'Visa', '2', 'AC');
INSERT INTO `mediosdepago` VALUES ('3', 'MAS', 'MasterCard', '2', 'AC');
INSERT INTO `mediosdepago` VALUES ('4', 'CAB', 'Cabal', '2', 'AC');
INSERT INTO `mediosdepago` VALUES ('5', 'CCT', 'Cuenta Corriente', '3', 'AC');

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `prvId` int(11) NOT NULL AUTO_INCREMENT,
  `prvNombre` varchar(100) DEFAULT NULL,
  `prvApellido` varchar(100) DEFAULT NULL,
  `prvRazonSocial` varchar(100) DEFAULT NULL,
  `docId` int(11) NOT NULL,
  `prvDocumento` varchar(13) NOT NULL,
  `prvDomicilio` varchar(250) DEFAULT NULL,
  `prvMail` varchar(50) DEFAULT NULL,
  `prvEstado` varchar(2) DEFAULT NULL,
  `prvTelefono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prvId`),
  UNIQUE KEY `docId` (`docId`,`prvDocumento`) USING BTREE,
  CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`docId`) REFERENCES `tipos_documentos` (`docId`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedores
-- ----------------------------
INSERT INTO `proveedores` VALUES ('1', 'VICTOR ', 'RODRIGUEZ', 'WEGA', '2', '20-17078612-3', '', '', 'AC', '4216060');
INSERT INTO `proveedores` VALUES ('2', 'Sergio', 'Moyano', 'Sergio Moyano', '1', '31324208', '', '', 'AC', '264 5095890');
INSERT INTO `proveedores` VALUES ('3', 'MARGARIT HNOS.', '', 'YPF', '2', '33-71440392-9', 'Ruta 20 Km 15 - 9 de Julio', '', 'AC', '4214604 / 4274546');
INSERT INTO `proveedores` VALUES ('4', 'CARLOS', '', 'CG. AUTOPARTES', '2', '23-14696455-9', 'Aberastain 1093 sur- CP 5400 Capital', 'autopartescg@hotmail.com', 'AC', '4226322');

-- ----------------------------
-- Table structure for receptions
-- ----------------------------
DROP TABLE IF EXISTS `receptions`;
CREATE TABLE `receptions` (
  `recId` int(11) NOT NULL AUTO_INCREMENT,
  `recFecha` datetime NOT NULL,
  `recEstado` varchar(2) NOT NULL,
  `prvId` int(11) NOT NULL,
  `recObservacion` varchar(250) DEFAULT NULL,
  `tcId` int(11) DEFAULT NULL,
  `tcNumero` varchar(12) DEFAULT NULL,
  `tcImporte` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`recId`),
  KEY `prvId` (`prvId`) USING BTREE,
  KEY `tcId` (`tcId`) USING BTREE,
  CONSTRAINT `receptions_ibfk_1` FOREIGN KEY (`prvId`) REFERENCES `proveedores` (`prvId`) ON UPDATE CASCADE,
  CONSTRAINT `receptions_ibfk_2` FOREIGN KEY (`tcId`) REFERENCES `tipo_comprobante` (`tcId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of receptions
-- ----------------------------
INSERT INTO `receptions` VALUES ('2', '2018-01-25 00:00:00', 'CF', '1', '', '2', '001000005168', '5335.79');
INSERT INTO `receptions` VALUES ('3', '2018-01-26 00:00:00', 'CF', '1', '', '4', '000100008132', '3864.55');

-- ----------------------------
-- Table structure for receptionsdetail
-- ----------------------------
DROP TABLE IF EXISTS `receptionsdetail`;
CREATE TABLE `receptionsdetail` (
  `recdId` int(11) NOT NULL AUTO_INCREMENT,
  `recId` int(11) NOT NULL,
  `artId` int(11) NOT NULL,
  `recdCant` int(11) NOT NULL,
  PRIMARY KEY (`recdId`),
  KEY `recId` (`recId`) USING BTREE,
  KEY `artId` (`artId`) USING BTREE,
  CONSTRAINT `receptionsdetail_ibfk_1` FOREIGN KEY (`recId`) REFERENCES `receptions` (`recId`) ON UPDATE CASCADE,
  CONSTRAINT `receptionsdetail_ibfk_2` FOREIGN KEY (`artId`) REFERENCES `articles` (`artId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of receptionsdetail
-- ----------------------------
INSERT INTO `receptionsdetail` VALUES ('2', '2', '471', '2');
INSERT INTO `receptionsdetail` VALUES ('3', '2', '147', '1');
INSERT INTO `receptionsdetail` VALUES ('4', '2', '30', '2');
INSERT INTO `receptionsdetail` VALUES ('5', '2', '80', '1');
INSERT INTO `receptionsdetail` VALUES ('6', '2', '34', '4');
INSERT INTO `receptionsdetail` VALUES ('7', '2', '207', '1');
INSERT INTO `receptionsdetail` VALUES ('8', '2', '470', '2');
INSERT INTO `receptionsdetail` VALUES ('9', '2', '290', '1');
INSERT INTO `receptionsdetail` VALUES ('10', '2', '199', '1');
INSERT INTO `receptionsdetail` VALUES ('11', '2', '359', '2');
INSERT INTO `receptionsdetail` VALUES ('12', '2', '104', '2');
INSERT INTO `receptionsdetail` VALUES ('13', '3', '474', '2');
INSERT INTO `receptionsdetail` VALUES ('14', '3', '174', '1');
INSERT INTO `receptionsdetail` VALUES ('15', '3', '24', '4');
INSERT INTO `receptionsdetail` VALUES ('16', '3', '88', '2');
INSERT INTO `receptionsdetail` VALUES ('17', '3', '87', '2');
INSERT INTO `receptionsdetail` VALUES ('18', '3', '473', '2');
INSERT INTO `receptionsdetail` VALUES ('19', '3', '307', '2');
INSERT INTO `receptionsdetail` VALUES ('20', '3', '295', '1');
INSERT INTO `receptionsdetail` VALUES ('21', '3', '253', '4');
INSERT INTO `receptionsdetail` VALUES ('22', '3', '227', '1');

-- ----------------------------
-- Table structure for recibos
-- ----------------------------
DROP TABLE IF EXISTS `recibos`;
CREATE TABLE `recibos` (
  `rcbId` int(11) NOT NULL AUTO_INCREMENT,
  `venId` int(11) NOT NULL,
  `medId` int(11) NOT NULL,
  `rcbImporte` decimal(10,2) NOT NULL,
  `rcbDesc1` varchar(50) DEFAULT NULL,
  `rcbDesc2` varchar(50) DEFAULT NULL,
  `rcbDesc3` varchar(50) DEFAULT NULL,
  `rcbEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`rcbId`),
  KEY `venId` (`venId`),
  KEY `medId` (`medId`),
  CONSTRAINT `recibos_ibfk_1` FOREIGN KEY (`venId`) REFERENCES `ventas` (`venId`) ON UPDATE CASCADE,
  CONSTRAINT `recibos_ibfk_2` FOREIGN KEY (`medId`) REFERENCES `mediosdepago` (`medId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recibos
-- ----------------------------
INSERT INTO `recibos` VALUES ('2', '49', '1', '2442.02', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('3', '50', '1', '2442.02', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('4', '51', '1', '1442.02', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('5', '51', '2', '1000.00', 'lote', 'autorizacion ', 'cuotas', 'AC');
INSERT INTO `recibos` VALUES ('6', '53', '1', '7516.12', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('7', '54', '1', '2442.02', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('8', '55', '1', '2000.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('9', '55', '3', '442.02', '1', '1', '1', 'AC');
INSERT INTO `recibos` VALUES ('10', '56', '1', '3442.02', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('13', '59', '5', '2442.02', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('14', '60', '1', '125.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('15', '61', '1', '125.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('16', '62', '1', '125.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('17', '63', '1', '125.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('18', '64', '1', '125.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('19', '65', '1', '250.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('20', '66', '1', '1680.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('21', '67', '5', '250.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('22', '68', '5', '125.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('23', '69', '1', '4656.38', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('24', '70', '2', '247.50', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('25', '71', '5', '1860.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('26', '72', '1', '2500.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('27', '74', '1', '250.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('28', '75', '1', '1860.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('29', '76', '1', '1860.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('30', '77', '1', '1860.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('31', '78', '1', '1860.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('32', '79', '1', '1860.00', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('33', '80', '1', '2442.02', '', '', '', 'AC');
INSERT INTO `recibos` VALUES ('34', '81', '1', '2500.00', '', '', '', 'AC');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of retiros
-- ----------------------------
INSERT INTO `retiros` VALUES ('1', '2018-02-05 17:21:59', '4', '100.00', 'para comprar una coca', '2');
INSERT INTO `retiros` VALUES ('2', '2018-02-05 17:35:44', '4', '50.00', 'para el zurdo', '2');
INSERT INTO `retiros` VALUES ('3', '2018-02-09 17:00:11', '4', '100.00', 'para el zurdo', '5');
INSERT INTO `retiros` VALUES ('4', '2018-02-17 12:17:53', '4', '10.00', 'Le preste al zurdo', '6');
INSERT INTO `retiros` VALUES ('5', '2018-03-05 22:09:43', '4', '4.00', 'asjdnasjkdasdnj', '8');

-- ----------------------------
-- Table structure for rubros
-- ----------------------------
DROP TABLE IF EXISTS `rubros`;
CREATE TABLE `rubros` (
  `rubId` int(11) NOT NULL AUTO_INCREMENT,
  `rubDescripcion` varchar(30) NOT NULL,
  `rubEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`rubId`),
  UNIQUE KEY `rubDescripcion` (`rubDescripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rubros
-- ----------------------------
INSERT INTO `rubros` VALUES ('2', 'Lubricantes', 'IN');
INSERT INTO `rubros` VALUES ('4', 'ACEITES Y LUBRICANTES', 'AC');
INSERT INTO `rubros` VALUES ('5', 'FILTROS ', 'AC');
INSERT INTO `rubros` VALUES ('6', 'LAMPARAS ', 'AC');
INSERT INTO `rubros` VALUES ('8', 'ARTICULOS DE LUBRICENTRO ', 'AC');

-- ----------------------------
-- Table structure for servicedetalle
-- ----------------------------
DROP TABLE IF EXISTS `servicedetalle`;
CREATE TABLE `servicedetalle` (
  `srvdId` int(11) NOT NULL AUTO_INCREMENT,
  `srvId` int(11) NOT NULL,
  `artId` int(11) DEFAULT NULL,
  `srvdCant` decimal(10,2) NOT NULL,
  `artDescripcion` varchar(100) NOT NULL,
  `artCosto` decimal(10,2) NOT NULL,
  `artVenta` decimal(10,2) NOT NULL,
  PRIMARY KEY (`srvdId`),
  KEY `srvId` (`srvId`) USING BTREE,
  KEY `artId` (`artId`) USING BTREE,
  CONSTRAINT `servicedetalle_ibfk_1` FOREIGN KEY (`srvId`) REFERENCES `services` (`srvId`) ON UPDATE CASCADE,
  CONSTRAINT `servicedetalle_ibfk_2` FOREIGN KEY (`artId`) REFERENCES `articles` (`artId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of servicedetalle
-- ----------------------------
INSERT INTO `servicedetalle` VALUES ('1', '1', '470', '6.00', 'FORD ECOSPORT', '231.19', '323.67');
INSERT INTO `servicedetalle` VALUES ('2', '1', null, '1.00', 'Mano de Obra', '500.00', '500.00');
INSERT INTO `servicedetalle` VALUES ('3', '2', '470', '14.00', 'FORD ECOSPORT', '231.19', '323.67');
INSERT INTO `servicedetalle` VALUES ('4', '3', '475', '1.00', 'lavado común', '100.00', '125.00');
INSERT INTO `servicedetalle` VALUES ('5', '3', null, '1.00', 'prueba', '100.00', '100.00');
INSERT INTO `servicedetalle` VALUES ('6', '4', '427', '1.00', 'LIQUIDO PARA FRENOS ', '128.57', '180.00');
INSERT INTO `servicedetalle` VALUES ('7', '4', '447', '1.00', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00');
INSERT INTO `servicedetalle` VALUES ('8', '5', '310', '1.00', 'MB SPRINTER CON PREFILTRO ', '297.64', '416.70');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `srvId` int(11) NOT NULL AUTO_INCREMENT,
  `srvFecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vehId` int(11) NOT NULL,
  `srvKm` int(11) NOT NULL,
  `srvEstado` varchar(255) NOT NULL DEFAULT 'AC',
  `srvObservacion` text,
  `usrId` int(11) NOT NULL,
  `cliId` int(11) NOT NULL,
  `srvKmProxService` int(11) DEFAULT '0',
  PRIMARY KEY (`srvId`),
  KEY `vehId` (`vehId`) USING BTREE,
  KEY `usrId` (`usrId`) USING BTREE,
  KEY `cliId` (`cliId`) USING BTREE,
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`vehId`) REFERENCES `vehiculos` (`vehId`) ON UPDATE CASCADE,
  CONSTRAINT `services_ibfk_2` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE,
  CONSTRAINT `services_ibfk_3` FOREIGN KEY (`cliId`) REFERENCES `clientes` (`cliId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', '2018-03-22 19:43:07', '1', '10000', 'FA', '', '2', '1', '20000');
INSERT INTO `services` VALUES ('2', '2018-03-22 19:43:39', '1', '700000', 'AC', '', '4', '1', '800000');
INSERT INTO `services` VALUES ('3', '2018-02-17 12:12:57', '1', '900', 'FA', '', '4', '1', '7000');
INSERT INTO `services` VALUES ('4', '2018-03-07 20:55:56', '2', '9000', 'FA', '', '4', '3', '7000');
INSERT INTO `services` VALUES ('5', '2018-04-05 11:05:17', '5', '12', 'AC', '', '4', '3', '13');

-- ----------------------------
-- Table structure for serviceticket
-- ----------------------------
DROP TABLE IF EXISTS `serviceticket`;
CREATE TABLE `serviceticket` (
  `srvId` int(11) NOT NULL,
  `lavado` bit(1) DEFAULT b'0',
  `lavadoMotor` bit(1) DEFAULT b'0',
  `lavadoConMotor` bit(1) DEFAULT b'0',
  `pulido` bit(1) DEFAULT b'0',
  `acMotor` bit(1) DEFAULT NULL,
  `acNombre` varchar(50) DEFAULT NULL,
  `acLitros` varchar(20) DEFAULT NULL,
  `fAire` bit(1) DEFAULT NULL,
  `fAceite` bit(1) DEFAULT NULL,
  `fCombustible` bit(1) DEFAULT NULL,
  `fHabitaculo` bit(1) DEFAULT NULL,
  `agAgua` bit(1) DEFAULT NULL,
  `cAgua` bit(1) DEFAULT NULL,
  `aLiquiFre` bit(1) DEFAULT NULL,
  `aditivoAceite` bit(1) DEFAULT NULL,
  `aHidraulico` bit(1) DEFAULT NULL,
  `aLiquidoParabrisa` bit(1) DEFAULT NULL,
  `cAceiteHidraulico` bit(1) DEFAULT NULL,
  `aTransCaja` bit(1) DEFAULT NULL,
  `aTransCajaLitros` varchar(20) DEFAULT NULL,
  `aDifer` bit(1) DEFAULT NULL,
  `aDiferLitros` varchar(20) DEFAULT NULL,
  `otros` text,
  PRIMARY KEY (`srvId`),
  CONSTRAINT `serviceticket_ibfk_1` FOREIGN KEY (`srvId`) REFERENCES `services` (`srvId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of serviceticket
-- ----------------------------
INSERT INTO `serviceticket` VALUES ('1', '\0', '\0', '\0', '\0', '', 'Elaion', '4', '', '', '', '', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '', '\0', '', '              \n            ');
INSERT INTO `serviceticket` VALUES ('2', '\0', '\0', '\0', '\0', '\0', '', '', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '', '\0', '', '');
INSERT INTO `serviceticket` VALUES ('3', '\0', '\0', '\0', '\0', '\0', '', '', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '', '\0', '', '');
INSERT INTO `serviceticket` VALUES ('4', '', '', '', '', '', 'Elaion', '12', '', '', '', '', '', '', '', '', '', '', '', '\0', '', '', '3', 'ok nada tre');
INSERT INTO `serviceticket` VALUES ('5', '\0', '\0', '\0', '\0', '\0', '', '', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '\0', '', '\0', '', '');

-- ----------------------------
-- Table structure for sisactions
-- ----------------------------
DROP TABLE IF EXISTS `sisactions`;
CREATE TABLE `sisactions` (
  `actId` int(11) NOT NULL AUTO_INCREMENT,
  `actDescription` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `actDescriptionSpanish` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of sisactions
-- ----------------------------
INSERT INTO `sisactions` VALUES ('1', 'Add', 'Agregar');
INSERT INTO `sisactions` VALUES ('2', 'Edit', 'Editar');
INSERT INTO `sisactions` VALUES ('3', 'Del', 'Eliminar');
INSERT INTO `sisactions` VALUES ('4', 'View', 'Consultar');
INSERT INTO `sisactions` VALUES ('5', 'Imprimir', 'Imprimir');
INSERT INTO `sisactions` VALUES ('6', 'Saldo', 'Consultar Saldo');
INSERT INTO `sisactions` VALUES ('7', 'Close', 'Cerrar');
INSERT INTO `sisactions` VALUES ('8', 'Box', 'Caja');
INSERT INTO `sisactions` VALUES ('9', 'Conf', 'Confirmar');
INSERT INTO `sisactions` VALUES ('10', 'Disc', 'Descartar');

-- ----------------------------
-- Table structure for sisgroups
-- ----------------------------
DROP TABLE IF EXISTS `sisgroups`;
CREATE TABLE `sisgroups` (
  `grpId` int(11) NOT NULL AUTO_INCREMENT,
  `grpName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`grpId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of sisgroups
-- ----------------------------
INSERT INTO `sisgroups` VALUES ('2', 'Administrador');
INSERT INTO `sisgroups` VALUES ('6', 'Lavadero');

-- ----------------------------
-- Table structure for sisgroupsactions
-- ----------------------------
DROP TABLE IF EXISTS `sisgroupsactions`;
CREATE TABLE `sisgroupsactions` (
  `grpactId` int(11) NOT NULL AUTO_INCREMENT,
  `grpId` int(11) NOT NULL,
  `menuAccId` int(11) NOT NULL,
  PRIMARY KEY (`grpactId`),
  KEY `grpId` (`grpId`) USING BTREE,
  KEY `menuAccId` (`menuAccId`) USING BTREE,
  CONSTRAINT `sisgroupsactions_ibfk_1` FOREIGN KEY (`grpId`) REFERENCES `sisgroups` (`grpId`) ON UPDATE CASCADE,
  CONSTRAINT `sisgroupsactions_ibfk_2` FOREIGN KEY (`menuAccId`) REFERENCES `sismenuactions` (`menuAccId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of sisgroupsactions
-- ----------------------------
INSERT INTO `sisgroupsactions` VALUES ('852', '2', '1');
INSERT INTO `sisgroupsactions` VALUES ('853', '2', '2');
INSERT INTO `sisgroupsactions` VALUES ('854', '2', '3');
INSERT INTO `sisgroupsactions` VALUES ('855', '2', '4');
INSERT INTO `sisgroupsactions` VALUES ('856', '2', '5');
INSERT INTO `sisgroupsactions` VALUES ('857', '2', '6');
INSERT INTO `sisgroupsactions` VALUES ('858', '2', '7');
INSERT INTO `sisgroupsactions` VALUES ('859', '2', '8');
INSERT INTO `sisgroupsactions` VALUES ('860', '2', '71');
INSERT INTO `sisgroupsactions` VALUES ('861', '2', '40');
INSERT INTO `sisgroupsactions` VALUES ('862', '2', '41');
INSERT INTO `sisgroupsactions` VALUES ('863', '2', '42');
INSERT INTO `sisgroupsactions` VALUES ('864', '2', '43');
INSERT INTO `sisgroupsactions` VALUES ('865', '2', '44');
INSERT INTO `sisgroupsactions` VALUES ('866', '2', '45');
INSERT INTO `sisgroupsactions` VALUES ('867', '2', '46');
INSERT INTO `sisgroupsactions` VALUES ('868', '2', '47');
INSERT INTO `sisgroupsactions` VALUES ('869', '2', '48');
INSERT INTO `sisgroupsactions` VALUES ('870', '2', '49');
INSERT INTO `sisgroupsactions` VALUES ('871', '2', '50');
INSERT INTO `sisgroupsactions` VALUES ('872', '2', '51');
INSERT INTO `sisgroupsactions` VALUES ('873', '2', '58');
INSERT INTO `sisgroupsactions` VALUES ('874', '2', '59');
INSERT INTO `sisgroupsactions` VALUES ('875', '2', '60');
INSERT INTO `sisgroupsactions` VALUES ('876', '2', '61');
INSERT INTO `sisgroupsactions` VALUES ('877', '2', '9');
INSERT INTO `sisgroupsactions` VALUES ('878', '2', '10');
INSERT INTO `sisgroupsactions` VALUES ('879', '2', '11');
INSERT INTO `sisgroupsactions` VALUES ('880', '2', '12');
INSERT INTO `sisgroupsactions` VALUES ('881', '2', '21');
INSERT INTO `sisgroupsactions` VALUES ('882', '2', '22');
INSERT INTO `sisgroupsactions` VALUES ('883', '2', '23');
INSERT INTO `sisgroupsactions` VALUES ('884', '2', '24');
INSERT INTO `sisgroupsactions` VALUES ('885', '2', '33');
INSERT INTO `sisgroupsactions` VALUES ('886', '2', '34');
INSERT INTO `sisgroupsactions` VALUES ('887', '2', '35');
INSERT INTO `sisgroupsactions` VALUES ('888', '2', '36');
INSERT INTO `sisgroupsactions` VALUES ('889', '2', '37');
INSERT INTO `sisgroupsactions` VALUES ('890', '2', '38');
INSERT INTO `sisgroupsactions` VALUES ('891', '2', '39');
INSERT INTO `sisgroupsactions` VALUES ('892', '2', '25');
INSERT INTO `sisgroupsactions` VALUES ('893', '2', '26');
INSERT INTO `sisgroupsactions` VALUES ('894', '2', '28');
INSERT INTO `sisgroupsactions` VALUES ('895', '2', '29');
INSERT INTO `sisgroupsactions` VALUES ('896', '2', '30');
INSERT INTO `sisgroupsactions` VALUES ('897', '2', '31');
INSERT INTO `sisgroupsactions` VALUES ('898', '2', '32');
INSERT INTO `sisgroupsactions` VALUES ('952', '6', '1');
INSERT INTO `sisgroupsactions` VALUES ('953', '6', '2');
INSERT INTO `sisgroupsactions` VALUES ('954', '6', '3');
INSERT INTO `sisgroupsactions` VALUES ('955', '6', '4');
INSERT INTO `sisgroupsactions` VALUES ('956', '6', '5');
INSERT INTO `sisgroupsactions` VALUES ('957', '6', '6');
INSERT INTO `sisgroupsactions` VALUES ('958', '6', '7');
INSERT INTO `sisgroupsactions` VALUES ('959', '6', '8');
INSERT INTO `sisgroupsactions` VALUES ('960', '6', '71');
INSERT INTO `sisgroupsactions` VALUES ('961', '6', '70');
INSERT INTO `sisgroupsactions` VALUES ('962', '6', '72');
INSERT INTO `sisgroupsactions` VALUES ('963', '6', '40');
INSERT INTO `sisgroupsactions` VALUES ('964', '6', '41');
INSERT INTO `sisgroupsactions` VALUES ('965', '6', '42');
INSERT INTO `sisgroupsactions` VALUES ('966', '6', '43');
INSERT INTO `sisgroupsactions` VALUES ('967', '6', '44');
INSERT INTO `sisgroupsactions` VALUES ('968', '6', '45');
INSERT INTO `sisgroupsactions` VALUES ('969', '6', '46');
INSERT INTO `sisgroupsactions` VALUES ('970', '6', '47');
INSERT INTO `sisgroupsactions` VALUES ('971', '6', '48');
INSERT INTO `sisgroupsactions` VALUES ('972', '6', '49');
INSERT INTO `sisgroupsactions` VALUES ('973', '6', '50');
INSERT INTO `sisgroupsactions` VALUES ('974', '6', '51');
INSERT INTO `sisgroupsactions` VALUES ('975', '6', '62');
INSERT INTO `sisgroupsactions` VALUES ('976', '6', '63');
INSERT INTO `sisgroupsactions` VALUES ('977', '6', '64');
INSERT INTO `sisgroupsactions` VALUES ('978', '6', '65');
INSERT INTO `sisgroupsactions` VALUES ('979', '6', '67');
INSERT INTO `sisgroupsactions` VALUES ('980', '6', '9');
INSERT INTO `sisgroupsactions` VALUES ('981', '6', '10');
INSERT INTO `sisgroupsactions` VALUES ('982', '6', '11');
INSERT INTO `sisgroupsactions` VALUES ('983', '6', '12');
INSERT INTO `sisgroupsactions` VALUES ('984', '6', '21');
INSERT INTO `sisgroupsactions` VALUES ('985', '6', '22');
INSERT INTO `sisgroupsactions` VALUES ('986', '6', '23');
INSERT INTO `sisgroupsactions` VALUES ('987', '6', '24');
INSERT INTO `sisgroupsactions` VALUES ('988', '6', '33');
INSERT INTO `sisgroupsactions` VALUES ('989', '6', '34');
INSERT INTO `sisgroupsactions` VALUES ('990', '6', '35');
INSERT INTO `sisgroupsactions` VALUES ('991', '6', '36');
INSERT INTO `sisgroupsactions` VALUES ('992', '6', '37');
INSERT INTO `sisgroupsactions` VALUES ('993', '6', '38');
INSERT INTO `sisgroupsactions` VALUES ('994', '6', '39');
INSERT INTO `sisgroupsactions` VALUES ('995', '6', '25');
INSERT INTO `sisgroupsactions` VALUES ('996', '6', '26');
INSERT INTO `sisgroupsactions` VALUES ('997', '6', '28');
INSERT INTO `sisgroupsactions` VALUES ('998', '6', '52');
INSERT INTO `sisgroupsactions` VALUES ('999', '6', '53');
INSERT INTO `sisgroupsactions` VALUES ('1000', '6', '68');
INSERT INTO `sisgroupsactions` VALUES ('1001', '6', '69');
INSERT INTO `sisgroupsactions` VALUES ('1002', '6', '54');
INSERT INTO `sisgroupsactions` VALUES ('1003', '6', '55');
INSERT INTO `sisgroupsactions` VALUES ('1004', '6', '56');
INSERT INTO `sisgroupsactions` VALUES ('1005', '6', '57');

-- ----------------------------
-- Table structure for sismenu
-- ----------------------------
DROP TABLE IF EXISTS `sismenu`;
CREATE TABLE `sismenu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuIcon` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuController` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuView` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `menuFather` int(11) DEFAULT NULL,
  `menuOrder` int(11) DEFAULT '1',
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of sismenu
-- ----------------------------
INSERT INTO `sismenu` VALUES ('9', 'Seguridad', 'fa fa-key', '', '', null, '1');
INSERT INTO `sismenu` VALUES ('10', 'Usuarios', '', 'user', 'index', '9', '1');
INSERT INTO `sismenu` VALUES ('11', 'Grupos', '', 'group', 'index', '9', '2');
INSERT INTO `sismenu` VALUES ('12', 'Administración', 'fa fa-fw fa-cogs', '', '', null, '2');
INSERT INTO `sismenu` VALUES ('13', 'Artículos', 'fa fa-cart-plus', 'article', 'index', null, '3');
INSERT INTO `sismenu` VALUES ('16', 'Proveedores', 'fa fa-truck', 'provider', 'index', null, '4');
INSERT INTO `sismenu` VALUES ('17', 'Cajas', 'fa fa-money', 'box', 'index', null, '7');
INSERT INTO `sismenu` VALUES ('18', 'Ventas', 'fa fa-cart-plus', 'sale', 'index', null, '8');
INSERT INTO `sismenu` VALUES ('19', 'Recepción', 'fa fa-fw fa-archive', 'reception', 'index', null, '5');
INSERT INTO `sismenu` VALUES ('20', 'Stock', 'fa fa-fw fa-industry', 'stock', 'index', null, '6');
INSERT INTO `sismenu` VALUES ('21', 'Marca_Artículos', '', 'brand', 'index', '12', '1');
INSERT INTO `sismenu` VALUES ('22', 'Rubros', '', 'rubro', 'index', '12', '2');
INSERT INTO `sismenu` VALUES ('23', 'Subrubros', '', 'rubro', 'indexSR', '12', '3');
INSERT INTO `sismenu` VALUES ('24', 'Cuenta_Corriente', 'fa fa-fw fa-line-chart', '', '', null, '9');
INSERT INTO `sismenu` VALUES ('25', 'Cta_Cte_Proveedores', '', 'cuentacorriente', 'indexp', '24', '1');
INSERT INTO `sismenu` VALUES ('26', 'Clientes', 'fa fa-fw fa-users', 'customer', 'index', null, '10');
INSERT INTO `sismenu` VALUES ('27', 'Marca_Vehículos', '', 'brand', 'indexVh', '12', '4');
INSERT INTO `sismenu` VALUES ('28', 'Lista_de_Precios', '', 'lista', 'index', '12', '5');
INSERT INTO `sismenu` VALUES ('29', 'Actualización_de_Precios', '', 'rubro', 'upgrate', '12', '6');
INSERT INTO `sismenu` VALUES ('30', 'Cta_Cte_Clientes', '', 'cuentacorriente', 'indexc', '24', '2');
INSERT INTO `sismenu` VALUES ('31', 'Servicios', 'fa fa-fw fa-wrench', 'service', 'index', null, '1');
INSERT INTO `sismenu` VALUES ('32', 'BackUp', 'fa fa-fw fa-database', 'backup', 'index', null, '1');
INSERT INTO `sismenu` VALUES ('33', 'Faltantes', 'fa fa-fw fa-bell', 'article', 'faltante', null, '1');

-- ----------------------------
-- Table structure for sismenuactions
-- ----------------------------
DROP TABLE IF EXISTS `sismenuactions`;
CREATE TABLE `sismenuactions` (
  `menuAccId` int(11) NOT NULL AUTO_INCREMENT,
  `menuId` int(11) NOT NULL,
  `actId` int(11) DEFAULT NULL,
  PRIMARY KEY (`menuAccId`),
  KEY `menuId` (`menuId`) USING BTREE,
  KEY `actId` (`actId`) USING BTREE,
  CONSTRAINT `sismenuactions_ibfk_1` FOREIGN KEY (`menuId`) REFERENCES `sismenu` (`menuId`) ON UPDATE CASCADE,
  CONSTRAINT `sismenuactions_ibfk_2` FOREIGN KEY (`actId`) REFERENCES `sisactions` (`actId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of sismenuactions
-- ----------------------------
INSERT INTO `sismenuactions` VALUES ('1', '10', '1');
INSERT INTO `sismenuactions` VALUES ('2', '10', '2');
INSERT INTO `sismenuactions` VALUES ('3', '10', '3');
INSERT INTO `sismenuactions` VALUES ('4', '10', '4');
INSERT INTO `sismenuactions` VALUES ('5', '11', '1');
INSERT INTO `sismenuactions` VALUES ('6', '11', '2');
INSERT INTO `sismenuactions` VALUES ('7', '11', '3');
INSERT INTO `sismenuactions` VALUES ('8', '11', '4');
INSERT INTO `sismenuactions` VALUES ('9', '13', '1');
INSERT INTO `sismenuactions` VALUES ('10', '13', '2');
INSERT INTO `sismenuactions` VALUES ('11', '13', '3');
INSERT INTO `sismenuactions` VALUES ('12', '13', '4');
INSERT INTO `sismenuactions` VALUES ('21', '16', '1');
INSERT INTO `sismenuactions` VALUES ('22', '16', '2');
INSERT INTO `sismenuactions` VALUES ('23', '16', '3');
INSERT INTO `sismenuactions` VALUES ('24', '16', '4');
INSERT INTO `sismenuactions` VALUES ('25', '17', '1');
INSERT INTO `sismenuactions` VALUES ('26', '17', '7');
INSERT INTO `sismenuactions` VALUES ('28', '17', '4');
INSERT INTO `sismenuactions` VALUES ('29', '18', '1');
INSERT INTO `sismenuactions` VALUES ('30', '18', '3');
INSERT INTO `sismenuactions` VALUES ('31', '18', null);
INSERT INTO `sismenuactions` VALUES ('32', '18', null);
INSERT INTO `sismenuactions` VALUES ('33', '19', '1');
INSERT INTO `sismenuactions` VALUES ('34', '19', '9');
INSERT INTO `sismenuactions` VALUES ('35', '19', '10');
INSERT INTO `sismenuactions` VALUES ('36', '19', '4');
INSERT INTO `sismenuactions` VALUES ('37', '20', '1');
INSERT INTO `sismenuactions` VALUES ('38', '20', '4');
INSERT INTO `sismenuactions` VALUES ('39', '20', '5');
INSERT INTO `sismenuactions` VALUES ('40', '21', '1');
INSERT INTO `sismenuactions` VALUES ('41', '21', '2');
INSERT INTO `sismenuactions` VALUES ('42', '21', '3');
INSERT INTO `sismenuactions` VALUES ('43', '21', '4');
INSERT INTO `sismenuactions` VALUES ('44', '22', '1');
INSERT INTO `sismenuactions` VALUES ('45', '22', '2');
INSERT INTO `sismenuactions` VALUES ('46', '22', '3');
INSERT INTO `sismenuactions` VALUES ('47', '22', '4');
INSERT INTO `sismenuactions` VALUES ('48', '23', '1');
INSERT INTO `sismenuactions` VALUES ('49', '23', '2');
INSERT INTO `sismenuactions` VALUES ('50', '23', '3');
INSERT INTO `sismenuactions` VALUES ('51', '23', '4');
INSERT INTO `sismenuactions` VALUES ('52', '25', '1');
INSERT INTO `sismenuactions` VALUES ('53', '25', '4');
INSERT INTO `sismenuactions` VALUES ('54', '26', '1');
INSERT INTO `sismenuactions` VALUES ('55', '26', '2');
INSERT INTO `sismenuactions` VALUES ('56', '26', '3');
INSERT INTO `sismenuactions` VALUES ('57', '26', '4');
INSERT INTO `sismenuactions` VALUES ('58', '27', '1');
INSERT INTO `sismenuactions` VALUES ('59', '27', '2');
INSERT INTO `sismenuactions` VALUES ('60', '27', '3');
INSERT INTO `sismenuactions` VALUES ('61', '27', '4');
INSERT INTO `sismenuactions` VALUES ('62', '28', '1');
INSERT INTO `sismenuactions` VALUES ('63', '28', '2');
INSERT INTO `sismenuactions` VALUES ('64', '28', '3');
INSERT INTO `sismenuactions` VALUES ('65', '28', '4');
INSERT INTO `sismenuactions` VALUES ('66', '27', '2');
INSERT INTO `sismenuactions` VALUES ('67', '29', '2');
INSERT INTO `sismenuactions` VALUES ('68', '30', '1');
INSERT INTO `sismenuactions` VALUES ('69', '30', '4');
INSERT INTO `sismenuactions` VALUES ('70', '31', '4');
INSERT INTO `sismenuactions` VALUES ('71', '32', '1');
INSERT INTO `sismenuactions` VALUES ('72', '33', '4');

-- ----------------------------
-- Table structure for sisusers
-- ----------------------------
DROP TABLE IF EXISTS `sisusers`;
CREATE TABLE `sisusers` (
  `usrId` int(11) NOT NULL AUTO_INCREMENT,
  `usrNick` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `usrName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usrLastName` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usrComision` int(11) NOT NULL,
  `usrPassword` varchar(5000) COLLATE utf8_spanish_ci NOT NULL,
  `grpId` int(11) NOT NULL,
  `usrLastAcces` datetime DEFAULT NULL,
  `usrToken` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`usrId`),
  KEY `grpId` (`grpId`) USING BTREE,
  CONSTRAINT `sisusers_ibfk_1` FOREIGN KEY (`grpId`) REFERENCES `sisgroups` (`grpId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of sisusers
-- ----------------------------
INSERT INTO `sisusers` VALUES ('2', 'admin', 'admin', 'admin', '1', 'e10adc3949ba59abbe56e057f20f883e', '2', '2018-02-05 14:18:58', 'ZYkXNnK2azzFTQeeLDhh3R5OlFWnYnO62chAg0KbP2HrAvWp53hMxXrH3RwNrO57WJWqya58XxeVHN1OttZUURgQRnVsnOY1nbj2D4Id1XXLwXimwtK2YxDFCOZCihwGHxJAOlFYfj5LDi3RdYStyXVkpJrSunvt6RmItRREFu9MpamJOfASJ585I90lPwVfoqaW3TKraLg3rVRfpZAFG9XhfqElFkCnKoDbMp5ACZDCnUeBiROXDXJRdfz5wwG');
INSERT INTO `sisusers` VALUES ('4', 'mica', 'Mica', 'Duarte', '1', 'e10adc3949ba59abbe56e057f20f883e', '6', '2018-05-22 11:12:45', '10UNTca3e8lLs73h4od6Z2Yiz1pafjhvaQZOCd5ajn0O4foBeUzVCWHfZdzqdBRUcRRH6W4WIt1jPuz9JZrKjCY6EyulwDKonSaC83qzD9GvecobnnnZ8nXP5FXLfJTmIrv7IDMU7vtUtHDSc2ELU3NjowhtwmjLSYnyUWR05BddyOpaUbgcufnhrxpud42G4sBuDihvzV0uhbNEeN1xUf9p3fotqU2Cd8l32kll5CdrgDISGZcZDhrWLIbBBi7');
INSERT INTO `sisusers` VALUES ('5', 'marcos', 'Marcos', 'Tello', '1', 'e10adc3949ba59abbe56e057f20f883e', '6', '2018-02-05 14:21:22', 'Hhr57Bq9PfiFOf2taMEMLfeNEeIM1SDbmGFy7i6KVsdZmfNTYyK3HdDahSeWqUXaBFDGxwuxyC5zUrRVMunwsDoBLL31TMBa0vsSdVEth8lfCTgidqKHxbGKlSdHdTcM37JD2tTnpKhCfw0cWPBGUCXlnBODStn6TbkTCfnK4QmffodGo1c2Am29mjcholSkXBNmPwbPDhmJfz8jJbGcgcn49hTSKESuecc7NTvQitHbt1U1WjiVRrTdn6D7vCg');

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stkId` int(11) NOT NULL AUTO_INCREMENT,
  `artId` int(11) NOT NULL,
  `stkCant` decimal(10,4) NOT NULL,
  `recId` int(11) DEFAULT NULL,
  `stkOrigen` varchar(2) NOT NULL DEFAULT 'RC',
  `stkFecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`stkId`),
  KEY `artId` (`artId`) USING BTREE,
  KEY `recId` (`recId`) USING BTREE,
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`artId`) REFERENCES `articles` (`artId`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES ('5', '471', '2.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('6', '147', '1.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('7', '30', '2.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('8', '80', '1.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('9', '34', '4.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('10', '207', '1.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('11', '470', '2.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('12', '290', '1.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('13', '199', '1.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('14', '359', '2.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('15', '104', '2.0000', '2', 'RC', '2018-01-25 21:11:08');
INSERT INTO `stock` VALUES ('16', '474', '2.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('17', '174', '1.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('18', '24', '4.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('19', '88', '2.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('20', '87', '2.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('21', '473', '2.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('22', '307', '2.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('23', '295', '1.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('24', '253', '4.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('25', '227', '1.0000', '3', 'RC', '2018-01-25 21:23:16');
INSERT INTO `stock` VALUES ('26', '470', '-6.0000', '1', 'SV', '2018-01-26 13:15:25');
INSERT INTO `stock` VALUES ('27', '170', '-10.0000', null, 'VN', '2018-02-09 16:04:25');
INSERT INTO `stock` VALUES ('28', '470', '-14.0000', null, 'SV', '2018-02-14 09:26:15');
INSERT INTO `stock` VALUES ('29', '477', '-1.0000', '62', 'VN', '2018-02-14 13:06:35');
INSERT INTO `stock` VALUES ('30', '476', '-2.0000', '62', 'VN', '2018-02-14 13:06:35');
INSERT INTO `stock` VALUES ('31', '475', '-1.0000', '62', 'VN', '2018-02-14 13:06:35');
INSERT INTO `stock` VALUES ('32', '477', '-1.0000', '63', 'VN', '2018-02-14 13:06:57');
INSERT INTO `stock` VALUES ('33', '476', '-2.0000', '63', 'VN', '2018-02-14 13:06:57');
INSERT INTO `stock` VALUES ('34', '475', '-1.0000', '63', 'VN', '2018-02-14 13:06:57');
INSERT INTO `stock` VALUES ('35', '477', '-0.5000', '64', 'VN', '2018-02-14 13:09:27');
INSERT INTO `stock` VALUES ('36', '476', '-2.0000', '64', 'VN', '2018-02-14 13:09:27');
INSERT INTO `stock` VALUES ('37', '475', '-1.0000', '64', 'VN', '2018-02-14 13:09:27');
INSERT INTO `stock` VALUES ('38', '477', '-1.0000', '65', 'VN', '2018-02-14 13:10:38');
INSERT INTO `stock` VALUES ('39', '476', '-4.0000', '65', 'VN', '2018-02-14 13:10:38');
INSERT INTO `stock` VALUES ('40', '475', '-2.0000', '65', 'VN', '2018-02-14 13:10:38');
INSERT INTO `stock` VALUES ('41', '447', '-1.0000', '66', 'VN', '2018-02-14 13:18:57');
INSERT INTO `stock` VALUES ('42', '477', '-1.0000', '67', 'VN', '2018-02-14 15:17:35');
INSERT INTO `stock` VALUES ('43', '476', '-4.0000', '67', 'VN', '2018-02-14 15:17:35');
INSERT INTO `stock` VALUES ('44', '475', '-2.0000', '67', 'VN', '2018-02-14 15:17:35');
INSERT INTO `stock` VALUES ('45', '477', '-0.5000', '68', 'VN', '2018-02-14 15:19:11');
INSERT INTO `stock` VALUES ('46', '476', '-2.0000', '68', 'VN', '2018-02-14 15:19:11');
INSERT INTO `stock` VALUES ('47', '475', '-1.0000', '68', 'VN', '2018-02-14 15:19:11');
INSERT INTO `stock` VALUES ('48', '477', '-0.5000', '69', 'VN', '2018-02-17 12:08:30');
INSERT INTO `stock` VALUES ('49', '476', '-2.0000', '69', 'VN', '2018-02-17 12:08:30');
INSERT INTO `stock` VALUES ('50', '475', '-1.0000', '69', 'VN', '2018-02-17 12:08:30');
INSERT INTO `stock` VALUES ('51', '477', '-0.5000', '3', 'SV', '2018-02-17 12:09:46');
INSERT INTO `stock` VALUES ('52', '476', '-2.0000', '3', 'SV', '2018-02-17 12:09:46');
INSERT INTO `stock` VALUES ('53', '475', '-1.0000', '3', 'SV', '2018-02-17 12:09:46');
INSERT INTO `stock` VALUES ('54', '427', '-1.0000', '4', 'SV', '2018-02-17 12:14:58');
INSERT INTO `stock` VALUES ('55', '447', '-1.0000', '4', 'SV', '2018-02-17 12:14:58');
INSERT INTO `stock` VALUES ('56', '477', '-10.0000', '72', 'VN', '2018-02-17 12:42:42');
INSERT INTO `stock` VALUES ('57', '476', '-40.0000', '72', 'VN', '2018-02-17 12:42:42');
INSERT INTO `stock` VALUES ('58', '475', '-20.0000', '72', 'VN', '2018-02-17 12:42:42');
INSERT INTO `stock` VALUES ('59', '477', '-1.0000', '73', 'VN', '2018-02-22 15:45:06');
INSERT INTO `stock` VALUES ('60', '476', '-4.0000', '73', 'VN', '2018-02-22 15:45:06');
INSERT INTO `stock` VALUES ('61', '475', '-2.0000', '73', 'VN', '2018-02-22 15:45:06');
INSERT INTO `stock` VALUES ('62', '477', '-1.0000', '74', 'VN', '2018-02-22 15:46:00');
INSERT INTO `stock` VALUES ('63', '476', '-4.0000', '74', 'VN', '2018-02-22 15:46:00');
INSERT INTO `stock` VALUES ('64', '475', '-2.0000', '74', 'VN', '2018-02-22 15:46:00');
INSERT INTO `stock` VALUES ('65', '463', '-10.0000', '81', 'VN', '2018-03-22 20:24:05');
INSERT INTO `stock` VALUES ('66', '310', '-1.0000', '5', 'SV', '2018-04-05 11:05:17');

-- ----------------------------
-- Table structure for subrubros
-- ----------------------------
DROP TABLE IF EXISTS `subrubros`;
CREATE TABLE `subrubros` (
  `subrId` int(11) NOT NULL AUTO_INCREMENT,
  `subrDescripcion` varchar(30) NOT NULL,
  `rubId` int(11) NOT NULL,
  `subrEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`subrId`),
  UNIQUE KEY `subrDescripcion` (`subrDescripcion`) USING BTREE,
  KEY `subrubros_ibfk_1` (`rubId`) USING BTREE,
  CONSTRAINT `subrubros_ibfk_1` FOREIGN KEY (`rubId`) REFERENCES `rubros` (`rubId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subrubros
-- ----------------------------
INSERT INTO `subrubros` VALUES ('4', 'Aceite', '4', 'IN');
INSERT INTO `subrubros` VALUES ('5', 'FILTROS DE AIRE ', '5', 'AC');
INSERT INTO `subrubros` VALUES ('6', 'FILTROS DE ACEITE ', '5', 'AC');
INSERT INTO `subrubros` VALUES ('7', 'FILTROS DE COMBUSTIBLE ', '5', 'AC');
INSERT INTO `subrubros` VALUES ('8', 'FILTROS DE HABITÁCULO ', '5', 'AC');
INSERT INTO `subrubros` VALUES ('9', 'ACEITES ', '4', 'AC');
INSERT INTO `subrubros` VALUES ('10', 'REFRIGERANTES', '4', 'AC');
INSERT INTO `subrubros` VALUES ('11', 'LIMPIA PARABRISAS ', '4', 'AC');
INSERT INTO `subrubros` VALUES ('12', 'BUJIAS ', '8', 'AC');
INSERT INTO `subrubros` VALUES ('13', 'LIMPIEZA', '8', 'AC');
INSERT INTO `subrubros` VALUES ('14', 'LAMPARAS ', '8', 'AC');
INSERT INTO `subrubros` VALUES ('15', 'LIQUIDO PARA FRENOS ', '4', 'AC');
INSERT INTO `subrubros` VALUES ('16', 'LUBRICANTES', '4', 'AC');
INSERT INTO `subrubros` VALUES ('17', 'PLUMAS ', '8', 'AC');

-- ----------------------------
-- Table structure for tipomediopago
-- ----------------------------
DROP TABLE IF EXISTS `tipomediopago`;
CREATE TABLE `tipomediopago` (
  `tmpId` int(11) NOT NULL AUTO_INCREMENT,
  `tmpCodigo` varchar(3) NOT NULL,
  `tmpDescripcion` varchar(50) NOT NULL,
  `tmpEstado` varchar(2) NOT NULL DEFAULT 'AC',
  `tmpDescripcion1` varchar(50) DEFAULT NULL,
  `tmpDescripcion2` varchar(50) DEFAULT NULL,
  `tmpDescripcion3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tmpId`),
  UNIQUE KEY `tmpCodigo` (`tmpCodigo`) USING BTREE,
  UNIQUE KEY `tmpDescripcion` (`tmpDescripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipomediopago
-- ----------------------------
INSERT INTO `tipomediopago` VALUES ('1', 'EFE', 'Efectivo', 'AC', null, null, null);
INSERT INTO `tipomediopago` VALUES ('2', 'TJT', 'Tarjeta', 'AC', 'N° Lote', 'N° Autorización', 'Cuotas');
INSERT INTO `tipomediopago` VALUES ('3', 'CCT', 'Cuenta Corriente', 'AC', null, null, null);

-- ----------------------------
-- Table structure for tipos_documentos
-- ----------------------------
DROP TABLE IF EXISTS `tipos_documentos`;
CREATE TABLE `tipos_documentos` (
  `docId` int(11) NOT NULL AUTO_INCREMENT,
  `docDescripcion` varchar(50) NOT NULL,
  `docTipo` varchar(2) NOT NULL,
  `docEstado` varchar(2) NOT NULL,
  PRIMARY KEY (`docId`),
  UNIQUE KEY `docDescripcion` (`docDescripcion`,`docTipo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipos_documentos
-- ----------------------------
INSERT INTO `tipos_documentos` VALUES ('1', 'DNI', 'DP', 'AC');
INSERT INTO `tipos_documentos` VALUES ('2', 'CUIT', 'DP', 'AC');
INSERT INTO `tipos_documentos` VALUES ('3', 'LC', 'DP', 'AC');
INSERT INTO `tipos_documentos` VALUES ('4', 'LE', 'DP', 'AC');

-- ----------------------------
-- Table structure for tipo_comprobante
-- ----------------------------
DROP TABLE IF EXISTS `tipo_comprobante`;
CREATE TABLE `tipo_comprobante` (
  `tcId` int(11) NOT NULL AUTO_INCREMENT,
  `tcDescripcion` varchar(25) NOT NULL,
  `tcEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`tcId`),
  UNIQUE KEY `tcDescripcion` (`tcDescripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_comprobante
-- ----------------------------
INSERT INTO `tipo_comprobante` VALUES ('1', 'Factura A', 'AC');
INSERT INTO `tipo_comprobante` VALUES ('2', 'Factura B', 'AC');
INSERT INTO `tipo_comprobante` VALUES ('3', 'Factura C', 'AC');
INSERT INTO `tipo_comprobante` VALUES ('4', 'Remito X', 'AC');

-- ----------------------------
-- Table structure for tipo_vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_vehiculo`;
CREATE TABLE `tipo_vehiculo` (
  `tpvId` int(11) NOT NULL AUTO_INCREMENT,
  `tpvDescripcion` varchar(30) NOT NULL,
  `tpvEstado` varchar(2) NOT NULL DEFAULT 'AC',
  PRIMARY KEY (`tpvId`),
  UNIQUE KEY `tpvDescripcion` (`tpvDescripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_vehiculo
-- ----------------------------
INSERT INTO `tipo_vehiculo` VALUES ('1', 'Auto', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('2', 'Camioneta', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('3', 'Utilitario', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('4', 'Camión', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('5', 'Combi', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('6', 'Colectivo', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('7', 'Máquina', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('8', 'Moto', 'AC');
INSERT INTO `tipo_vehiculo` VALUES ('9', 'Cuatriciclo', 'AC');

-- ----------------------------
-- Table structure for vehiculos
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE `vehiculos` (
  `vehId` int(11) NOT NULL AUTO_INCREMENT,
  `vehPatente` varchar(10) NOT NULL,
  `marId` int(11) NOT NULL,
  `vehModelo` varchar(50) NOT NULL,
  `tpvId` int(11) NOT NULL,
  `cliId` int(11) DEFAULT NULL,
  `vehEstado` varchar(2) NOT NULL,
  `vehMovil` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`vehId`),
  UNIQUE KEY `vehPatente` (`vehPatente`) USING BTREE,
  KEY `marId` (`marId`) USING BTREE,
  KEY `tpvId` (`tpvId`) USING BTREE,
  KEY `cliId` (`cliId`) USING BTREE,
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`marId`) REFERENCES `marcaveh` (`marId`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`tpvId`) REFERENCES `tipo_vehiculo` (`tpvId`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`cliId`) REFERENCES `clientes` (`cliId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES ('1', 'JUU958', '2', 'Carrier', '1', '1', 'AC', null);
INSERT INTO `vehiculos` VALUES ('2', 'JUU990', '2', 'cxxx', '4', '3', 'AC', null);
INSERT INTO `vehiculos` VALUES ('3', 'JUU999', '2', 'Austin Power', '1', null, 'AC', null);
INSERT INTO `vehiculos` VALUES ('5', 'JUU900', '2', 'Uastin Power', '4', '3', 'AC', '122');

-- ----------------------------
-- Table structure for vehiculo_articulo
-- ----------------------------
DROP TABLE IF EXISTS `vehiculo_articulo`;
CREATE TABLE `vehiculo_articulo` (
  `vehartId` int(11) NOT NULL AUTO_INCREMENT,
  `vehId` int(11) NOT NULL,
  `artId` int(11) NOT NULL,
  `vehartCant` decimal(10,2) NOT NULL,
  PRIMARY KEY (`vehartId`),
  KEY `vehId` (`vehId`) USING BTREE,
  KEY `artId` (`artId`) USING BTREE,
  CONSTRAINT `vehiculo_articulo_ibfk_1` FOREIGN KEY (`vehId`) REFERENCES `vehiculos` (`vehId`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculo_articulo_ibfk_2` FOREIGN KEY (`artId`) REFERENCES `articles` (`artId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculo_articulo
-- ----------------------------
INSERT INTO `vehiculo_articulo` VALUES ('1', '1', '470', '14.00');
INSERT INTO `vehiculo_articulo` VALUES ('2', '2', '316', '1.00');
INSERT INTO `vehiculo_articulo` VALUES ('3', '2', '317', '1.00');
INSERT INTO `vehiculo_articulo` VALUES ('4', '1', '310', '100.00');
INSERT INTO `vehiculo_articulo` VALUES ('5', '1', '310', '10.00');
INSERT INTO `vehiculo_articulo` VALUES ('6', '1', '452', '10.00');
INSERT INTO `vehiculo_articulo` VALUES ('7', '5', '390', '10.00');
INSERT INTO `vehiculo_articulo` VALUES ('8', '5', '310', '1.00');
INSERT INTO `vehiculo_articulo` VALUES ('9', '5', '426', '1.00');

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `venId` int(11) NOT NULL AUTO_INCREMENT,
  `venFecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `venEstado` varchar(2) NOT NULL DEFAULT 'AC',
  `usrId` int(11) NOT NULL,
  `cajaId` int(11) NOT NULL,
  `srvId` int(11) DEFAULT NULL,
  `cliId` int(11) DEFAULT NULL,
  PRIMARY KEY (`venId`),
  KEY `usrId` (`usrId`) USING BTREE,
  KEY `cajaId` (`cajaId`) USING BTREE,
  KEY `srvId` (`srvId`),
  KEY `cliId` (`cliId`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usrId`) REFERENCES `sisusers` (`usrId`) ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`cajaId`) REFERENCES `cajas` (`cajaId`) ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`srvId`) REFERENCES `services` (`srvId`) ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`cliId`) REFERENCES `clientes` (`cliId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ventas
-- ----------------------------
INSERT INTO `ventas` VALUES ('49', '0000-00-00 00:00:00', 'AC', '4', '4', '1', null);
INSERT INTO `ventas` VALUES ('50', '2018-02-09 14:20:34', 'AC', '4', '4', '1', null);
INSERT INTO `ventas` VALUES ('51', '2018-02-09 14:21:39', 'AC', '4', '4', '1', null);
INSERT INTO `ventas` VALUES ('53', '2018-02-09 16:04:25', 'AC', '4', '4', '1', null);
INSERT INTO `ventas` VALUES ('54', '2018-02-09 16:09:50', 'AC', '4', '4', '1', null);
INSERT INTO `ventas` VALUES ('55', '2018-02-09 16:53:53', 'AC', '4', '5', '1', null);
INSERT INTO `ventas` VALUES ('56', '2018-02-09 17:03:58', 'AC', '4', '5', '1', null);
INSERT INTO `ventas` VALUES ('59', '2018-02-09 17:30:07', 'AC', '4', '5', '1', null);
INSERT INTO `ventas` VALUES ('60', '2018-02-14 12:59:37', 'AC', '4', '5', null, '2');
INSERT INTO `ventas` VALUES ('61', '2018-02-14 13:00:04', 'AC', '4', '5', null, '2');
INSERT INTO `ventas` VALUES ('62', '2018-02-14 13:06:35', 'AC', '4', '5', null, '2');
INSERT INTO `ventas` VALUES ('63', '2018-02-14 13:06:57', 'AC', '4', '5', null, '2');
INSERT INTO `ventas` VALUES ('64', '2018-02-14 13:09:27', 'AC', '4', '5', null, '2');
INSERT INTO `ventas` VALUES ('65', '2018-02-14 13:10:38', 'AC', '4', '5', null, '2');
INSERT INTO `ventas` VALUES ('66', '2018-02-14 13:18:57', 'AC', '4', '5', null, '2');
INSERT INTO `ventas` VALUES ('67', '2018-02-14 15:17:35', 'AC', '4', '5', null, '1');
INSERT INTO `ventas` VALUES ('68', '2018-02-14 15:19:11', 'AC', '4', '5', null, '1');
INSERT INTO `ventas` VALUES ('69', '2018-02-17 12:08:30', 'AC', '4', '6', '2', null);
INSERT INTO `ventas` VALUES ('70', '2018-02-17 12:12:57', 'AC', '4', '6', '3', null);
INSERT INTO `ventas` VALUES ('71', '2018-02-17 12:15:23', 'AC', '4', '6', '4', null);
INSERT INTO `ventas` VALUES ('72', '2018-02-17 12:42:42', 'AC', '4', '6', null, '2');
INSERT INTO `ventas` VALUES ('73', '2018-02-22 15:45:06', 'AC', '4', '7', null, '2');
INSERT INTO `ventas` VALUES ('74', '2018-02-22 15:46:00', 'AC', '4', '7', null, '2');
INSERT INTO `ventas` VALUES ('75', '2018-02-22 16:12:37', 'AC', '4', '7', '4', null);
INSERT INTO `ventas` VALUES ('76', '2018-02-22 16:13:18', 'AC', '4', '7', '4', null);
INSERT INTO `ventas` VALUES ('77', '2018-02-22 16:14:00', 'AC', '4', '7', '4', null);
INSERT INTO `ventas` VALUES ('78', '2018-02-22 16:16:51', 'AC', '4', '7', '4', null);
INSERT INTO `ventas` VALUES ('79', '2018-03-07 20:55:56', 'AC', '4', '9', '4', null);
INSERT INTO `ventas` VALUES ('80', '2018-03-22 19:43:07', 'AC', '4', '10', '1', null);
INSERT INTO `ventas` VALUES ('81', '2018-03-22 20:24:05', 'AC', '4', '10', null, '2');

-- ----------------------------
-- Table structure for ventasdetalle
-- ----------------------------
DROP TABLE IF EXISTS `ventasdetalle`;
CREATE TABLE `ventasdetalle` (
  `vendId` int(11) NOT NULL AUTO_INCREMENT,
  `venId` int(11) NOT NULL,
  `artId` int(11) NOT NULL,
  `artCode` varchar(50) NOT NULL,
  `artDescription` varchar(200) NOT NULL,
  `artCoste` decimal(10,2) NOT NULL,
  `artFinal` decimal(10,2) NOT NULL,
  `venCant` int(11) NOT NULL,
  PRIMARY KEY (`vendId`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ventasdetalle
-- ----------------------------
INSERT INTO `ventasdetalle` VALUES ('65', '53', '170', 'MCP - 179', 'FORD ESCORT/ ORION/ MONDEO 1.8 DIESEL', '326.72', '457.41', '10');
INSERT INTO `ventasdetalle` VALUES ('66', '53', '0', '-', 'Cambio de Aceite', '500.00', '500.00', '1');
INSERT INTO `ventasdetalle` VALUES ('67', '53', '470', 'FAP - 9295', 'FORD ECOSPORT', '231.19', '323.67', '6');
INSERT INTO `ventasdetalle` VALUES ('68', '53', '0', '', 'Mano de Obra', '500.00', '500.00', '1');
INSERT INTO `ventasdetalle` VALUES ('69', '54', '470', 'FAP - 9295', 'FORD ECOSPORT', '231.19', '323.67', '6');
INSERT INTO `ventasdetalle` VALUES ('70', '54', '0', '', 'Mano de Obra', '500.00', '500.00', '1');
INSERT INTO `ventasdetalle` VALUES ('71', '55', '470', 'FAP - 9295', 'FORD ECOSPORT', '231.19', '323.67', '6');
INSERT INTO `ventasdetalle` VALUES ('72', '55', '0', '', 'Mano de Obra', '500.00', '500.00', '1');
INSERT INTO `ventasdetalle` VALUES ('73', '56', '0', '-', 'bollllalsl', '1000.00', '1000.00', '1');
INSERT INTO `ventasdetalle` VALUES ('74', '56', '470', 'FAP - 9295', 'FORD ECOSPORT', '231.19', '323.67', '6');
INSERT INTO `ventasdetalle` VALUES ('75', '56', '0', '', 'Mano de Obra', '500.00', '500.00', '1');
INSERT INTO `ventasdetalle` VALUES ('80', '59', '470', 'FAP - 9295', 'FORD ECOSPORT', '231.19', '323.67', '6');
INSERT INTO `ventasdetalle` VALUES ('81', '59', '0', '', 'Mano de Obra', '500.00', '500.00', '1');
INSERT INTO `ventasdetalle` VALUES ('82', '60', '475', '', 'lavado común', '100.00', '125.00', '1');
INSERT INTO `ventasdetalle` VALUES ('83', '61', '475', '', 'lavado común', '100.00', '125.00', '1');
INSERT INTO `ventasdetalle` VALUES ('84', '62', '475', '', 'lavado común', '100.00', '125.00', '1');
INSERT INTO `ventasdetalle` VALUES ('85', '63', '475', '', 'lavado común', '100.00', '125.00', '1');
INSERT INTO `ventasdetalle` VALUES ('86', '64', '475', '', 'lavado común', '100.00', '125.00', '1');
INSERT INTO `ventasdetalle` VALUES ('87', '65', '475', '', 'lavado común', '100.00', '125.00', '2');
INSERT INTO `ventasdetalle` VALUES ('88', '66', '447', '', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00', '1');
INSERT INTO `ventasdetalle` VALUES ('89', '67', '475', '', 'lavado común', '100.00', '125.00', '2');
INSERT INTO `ventasdetalle` VALUES ('90', '68', '475', '', 'lavado común', '100.00', '125.00', '1');
INSERT INTO `ventasdetalle` VALUES ('91', '69', '475', '', 'lavado común', '100.00', '125.00', '1');
INSERT INTO `ventasdetalle` VALUES ('92', '69', '470', 'FAP - 9295', 'FORD ECOSPORT', '231.19', '323.67', '14');
INSERT INTO `ventasdetalle` VALUES ('93', '70', '475', '', 'lavado común', '100.00', '137.50', '1');
INSERT INTO `ventasdetalle` VALUES ('94', '70', '0', '', 'prueba', '100.00', '110.00', '1');
INSERT INTO `ventasdetalle` VALUES ('95', '71', '427', '', 'LIQUIDO PARA FRENOS ', '128.57', '180.00', '1');
INSERT INTO `ventasdetalle` VALUES ('96', '71', '447', '', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00', '1');
INSERT INTO `ventasdetalle` VALUES ('97', '72', '475', '', 'lavado común', '100.00', '125.00', '20');
INSERT INTO `ventasdetalle` VALUES ('98', '73', '475', '', 'lavado común', '100.00', '125.00', '2');
INSERT INTO `ventasdetalle` VALUES ('99', '74', '475', '', 'lavado común', '100.00', '125.00', '2');
INSERT INTO `ventasdetalle` VALUES ('100', '75', '427', '', 'LIQUIDO PARA FRENOS ', '128.57', '180.00', '1');
INSERT INTO `ventasdetalle` VALUES ('101', '75', '447', '', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00', '1');
INSERT INTO `ventasdetalle` VALUES ('102', '76', '427', '', 'LIQUIDO PARA FRENOS ', '128.57', '180.00', '1');
INSERT INTO `ventasdetalle` VALUES ('103', '76', '447', '', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00', '1');
INSERT INTO `ventasdetalle` VALUES ('104', '77', '427', '', 'LIQUIDO PARA FRENOS ', '128.57', '180.00', '1');
INSERT INTO `ventasdetalle` VALUES ('105', '77', '447', '', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00', '1');
INSERT INTO `ventasdetalle` VALUES ('106', '78', '427', '', 'LIQUIDO PARA FRENOS ', '128.57', '180.00', '1');
INSERT INTO `ventasdetalle` VALUES ('107', '78', '447', '', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00', '1');
INSERT INTO `ventasdetalle` VALUES ('108', '79', '427', '', 'LIQUIDO PARA FRENOS ', '128.57', '180.00', '1');
INSERT INTO `ventasdetalle` VALUES ('109', '79', '447', '', 'ELAION F50 PLUS  5W- 40  4 LTS', '1200.00', '1680.00', '1');
INSERT INTO `ventasdetalle` VALUES ('110', '80', '470', 'FAP-9295', 'FORD ECOSPORT', '231.19', '323.67', '6');
INSERT INTO `ventasdetalle` VALUES ('111', '80', '0', '', 'Mano de Obra', '500.00', '500.00', '1');
INSERT INTO `ventasdetalle` VALUES ('112', '81', '463', '', 'FLUIDO ANTIFRICCION PARA DIFERENCIAL Y CAJA 100CM', '178.57', '250.00', '10');
