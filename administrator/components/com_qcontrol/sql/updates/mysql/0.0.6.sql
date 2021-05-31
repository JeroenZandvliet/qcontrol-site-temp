DROP TABLE IF EXISTS `#__qcontrol_extensions`;

CREATE TABLE `#__qcontrol_extensions` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`extensionName` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__qcontrol_extensions` (`extensionName`) VALUES
('Hello World!'),
('Good bye World!');