DROP TABLE IF EXISTS `#__reservations_reservations`;
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

CREATE TABLE `#__reservations_reservations` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`space_id` INT(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`),
  FOREIGN KEY (`space_id`) REFERENCES `#__reservations_spaces` (`id`) ON DELETE CASCADE
) ENGINE =MyISAM AUTO_INCREMENT =0 DEFAULT CHARSET =utf8;

INSERT INTO `#__reservations_spaces` (`space`, `place`, `type`, `area`, `capacity`) VALUES
('Room 123', 'Building A', 'Classroom', '20', '35'),
('Amphitheater 0', 'Building A', 'Amphitheater', '15', '15'),
('Auditorium 1', 'Building B', 'Auditorium', '30', '50');

INSERT INTO `#__reservations_reservations` (`name`, `space_id`, `start`, `end`) VALUES
('Person 1', '1', '2017-05-03 22:30:00', '2017-05-03 23:55:00');