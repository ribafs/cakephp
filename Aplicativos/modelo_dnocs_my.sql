CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);

INSERT INTO `groups` (`id`,`name`, `created`, `modified`) VALUES (1,'Supers',now(),now());
INSERT INTO `groups` (`id`,`name`, `created`, `modified`) VALUES (2,'Admins',now(),now());
INSERT INTO `groups` (`id`,`name`, `created`, `modified`) VALUES (3,'Managers',now(),now());
INSERT INTO `groups` (`id`,`name`, `created`, `modified`) VALUES (4,'Users',now(),now());

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) NOT NULL UNIQUE,
  `password` char(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(100) NOT NULL,
   UNIQUE (`group_id`,`controller`,`action`)
);


