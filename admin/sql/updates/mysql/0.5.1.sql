DROP TABLE IF EXISTS `#__reservations_reservations`;

CREATE TABLE `#__reservations_reservations` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`space_id` INT(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`),
	FOREIGN KEY (`start`) REFERENCES `#__reservations_spaces` (`id`) ON DELETE CASCADE,
	FOREIGN KEY (`end`) REFERENCES `#__reservations_spaces` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`space_id`) REFERENCES `#__reservations_spaces` (`id`) ON DELETE CASCADE
) ENGINE =MyISAM AUTO_INCREMENT =0 DEFAULT CHARSET =utf8;

INSERT INTO `#__reservations_reservations` (`name`, `space_id`, `start`, `end`) VALUES
('Super User', '1', '2017-05-03 22:30:00', '2017-05-03 23:55:00');