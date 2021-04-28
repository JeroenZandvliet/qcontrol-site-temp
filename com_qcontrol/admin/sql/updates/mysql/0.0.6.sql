DROP TABLE IF EXISTS `#__agenda`;

CREATE TABLE `#__agenda` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`greeting` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__agenda` (`greeting`) VALUES
('Hello World!'),
('Good bye World!');