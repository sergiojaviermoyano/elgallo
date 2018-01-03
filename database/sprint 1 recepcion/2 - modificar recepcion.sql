ALTER TABLE `receptions`
ADD COLUMN `tcId`  int NULL AFTER `recObservacion`,
ADD COLUMN `tcNumero`  varchar(12) NULL AFTER `tcId`,
ADD COLUMN `tcImporte`  decimal(10,2) NULL DEFAULT 0 AFTER `tcNumero`;

ALTER TABLE `receptions` ADD FOREIGN KEY (`tcId`) REFERENCES `tipo_comprobante` (`tcId`) ON DELETE RESTRICT ON UPDATE CASCADE;