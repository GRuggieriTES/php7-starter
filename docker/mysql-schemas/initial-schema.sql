CREATE DATABASE IF NOT EXISTS `mydatabase`;

-- USE `mydatabasejoe`;

-- GRANT ALL ON *.* TO 'root'@'%';

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `surname` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `users` (`name`, `surname`) VALUES ('Joe', 'Ruggieri');
INSERT INTO `users` (`name`, `surname`) VALUES ('Joseph', 'Rullan');