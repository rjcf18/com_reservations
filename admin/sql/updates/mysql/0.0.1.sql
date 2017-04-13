DROP TABLE IF EXISTS `#__reservations_spaces`;

CREATE TABLE `#__reservations_spaces` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`space` VARCHAR(100) NOT NULL,
	`type` VARCHAR(100) NOT NULL,
  `place` VARCHAR(100) NOT NULL,
  `area` VARCHAR(100) NOT NULL,
  `capacity` VARCHAR(100) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
) ENGINE =MyISAM AUTO_INCREMENT =0 DEFAULT CHARSET =utf8;

DROP TABLE IF EXISTS `#__reservations_reservations`;

CREATE TABLE `#__reservations_reservations` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) NOT NULL,
	`space_id` INT(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`),
	FOREIGN KEY (`start`) REFERENCES `#__reservations_spaces` (`id`) ON DELETE CASCADE,
	FOREIGN KEY (`end`) REFERENCES `#__reservations_spaces` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`space_id`) REFERENCES `#__reservations_spaces` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `#__users` (`id`) ON DELETE CASCADE
) ENGINE =MyISAM AUTO_INCREMENT =0 DEFAULT CHARSET =utf8;

INSERT INTO `#__reservations_spaces` (`space`, `place`, `type`, `area`, `capacity`) VALUES
('Room 123', 'Building A', 'Classroom', '20', '35'),
('Amphitheater 0', 'Building A', 'Amphitheater', '15', '15'),
('Auditorium 1', 'Building B', 'Auditorium', '30', '50');