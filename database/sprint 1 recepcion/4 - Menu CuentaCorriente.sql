INSERT INTO `elgallo`.`sismenu` (`menuId`, `menuName`, `menuIcon`, `menuController`, `menuView`, `menuFather`, `menuOrder`) VALUES ('24', 'Cuenta_Corriente', 'fa fa-fw fa-line-chart', '', '', NULL, '9');
INSERT INTO `elgallo`.`sismenu` (`menuId`, `menuName`, `menuIcon`, `menuController`, `menuView`, `menuFather`, `menuOrder`) VALUES ('25', 'Cta_Cte_Proveedores', '', 'cuentacorriente', 'indexp', '24', '1');

INSERT INTO `elgallo`.`sismenuactions` (`menuAccId`, `menuId`, `actId`) VALUES ('52', '25', '1');
INSERT INTO `elgallo`.`sismenuactions` (`menuAccId`, `menuId`, `actId`) VALUES ('53', '25', '4');

