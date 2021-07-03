-- Adminer 4.8.0 MySQL 5.5.5-10.3.29-MariaDB-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin_br_phinxlog`;
CREATE TABLE `admin_br_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin_br_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20190524233434,	'AdminBr',	'2021-05-19 17:36:29',	'2021-05-19 17:36:29',	0);

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `name`, `birthday`, `phone`, `observation`, `created`, `modified`) VALUES
(1,	'Brennan G. Wilcox',	'2016-04-15',	'(851) 190-1314',	'ante. Maecenas mi felis, adipiscing',	NULL,	NULL),
(2,	'Chase Summers',	'2016-08-27',	'(846) 297-4733',	'Sed molestie. Sed id risus',	NULL,	NULL),
(3,	'Sonia L. Mckay',	'2015-12-02',	'(131) 453-1690',	'fermentum vel, mauris. Integer sem',	NULL,	'2021-05-19 14:45:15'),
(4,	'Isadora L. Bowers',	'2015-10-24',	'(939) 798-4625',	'consequat, lectus sit amet luctus',	NULL,	NULL),
(5,	'Sophia Cochran',	'2017-06-15',	'(811) 687-0491',	'Aliquam tincidunt, nunc ac mattis',	NULL,	NULL),
(6,	'Maxwell T. Burton',	'2016-01-12',	'(147) 962-3265',	'at arcu. Vestibulum ante ipsum',	NULL,	NULL),
(7,	'Desiree Y. Henry',	'2017-07-21',	'(148) 711-3747',	'vitae dolor. Donec fringilla. Donec',	NULL,	NULL),
(8,	'Asher Key',	'2015-11-07',	'(355) 668-5871',	'a, aliquet vel, vulputate eu,',	NULL,	NULL),
(9,	'Tyler Castro',	'2016-08-31',	'(567) 793-5061',	'nec tempus mauris erat eget',	NULL,	NULL),
(10,	'Rudyard Weber',	'2015-10-26',	'(445) 457-4552',	'Morbi vehicula. Pellentesque tincidunt tempus',	NULL,	NULL),
(11,	'Allen Austin',	'2016-04-15',	'(758) 867-2179',	'ipsum. Phasellus vitae mauris sit',	NULL,	NULL),
(12,	'Octavius Cooper',	'2015-10-13',	'(101) 625-3985',	'ipsum non arcu. Vivamus sit',	NULL,	NULL),
(13,	'Dustin M. Oneill',	'2016-04-24',	'(276) 722-0976',	'magnis dis parturient montes, nascetur',	NULL,	NULL),
(14,	'Giacomo K. Horton',	'2016-07-03',	'(773) 532-7468',	'neque. Sed eget lacus. Mauris',	NULL,	NULL),
(15,	'Signe T. Weaver',	'2016-06-17',	'(210) 895-3664',	'dui nec urna suscipit nonummy.',	NULL,	NULL),
(16,	'Avram O. Delaney',	'2016-08-05',	'(609) 552-7572',	'Donec luctus aliquet odio. Etiam',	NULL,	NULL),
(17,	'Cara Parker',	'2016-07-24',	'(854) 169-4797',	'ornare lectus justo eu arcu.',	NULL,	NULL),
(18,	'Chelsea Mcclain',	'2016-08-06',	'(363) 636-1560',	'mollis lectus pede et risus.',	NULL,	NULL),
(19,	'Wesley Garner',	'2016-06-11',	'(578) 231-2389',	'Fusce feugiat. Lorem ipsum dolor',	NULL,	NULL),
(20,	'Irene P. Arnold',	'2016-02-12',	'(253) 631-9830',	'accumsan laoreet ipsum. Curabitur consequat,',	NULL,	NULL),
(21,	'Austin S. Wall',	'2016-01-21',	'(225) 694-9511',	'Sed eget lacus. Mauris non',	NULL,	NULL);

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1,	'Supers',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(2,	'Admins',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(3,	'Managers',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(4,	'Users',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `controller` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id` (`group_id`,`controller`,`action`),
  KEY `group_id_2` (`group_id`),
  CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `group_id`, `controller`, `action`, `created`, `modified`) VALUES
(1,	1,	'Customers',	'index',	NULL,	NULL),
(2,	1,	'Customers',	'view',	NULL,	NULL),
(3,	1,	'Customers',	'add',	NULL,	NULL),
(4,	1,	'Customers',	'edit',	NULL,	NULL),
(5,	1,	'Customers',	'delete',	NULL,	NULL),
(6,	1,	'Groups',	'index',	NULL,	NULL),
(7,	1,	'Groups',	'view',	NULL,	NULL),
(8,	1,	'Groups',	'add',	NULL,	NULL),
(9,	1,	'Groups',	'edit',	NULL,	NULL),
(10,	1,	'Groups',	'delete',	NULL,	NULL),
(11,	1,	'Permissions',	'index',	NULL,	NULL),
(12,	1,	'Permissions',	'view',	NULL,	NULL),
(13,	1,	'Permissions',	'add',	NULL,	NULL),
(14,	1,	'Permissions',	'edit',	NULL,	NULL),
(15,	1,	'Permissions',	'delete',	NULL,	NULL),
(16,	1,	'Users',	'index',	NULL,	NULL),
(17,	1,	'Users',	'view',	NULL,	NULL),
(18,	1,	'Users',	'add',	NULL,	NULL),
(19,	1,	'Users',	'edit',	NULL,	NULL),
(20,	1,	'Users',	'delete',	NULL,	NULL),
(21,	2,	'Groups',	'index',	NULL,	NULL),
(22,	2,	'Groups',	'view',	NULL,	NULL),
(23,	2,	'Groups',	'add',	NULL,	NULL),
(24,	2,	'Groups',	'edit',	NULL,	NULL),
(25,	2,	'Groups',	'delete',	NULL,	NULL),
(26,	2,	'Permissions',	'index',	NULL,	NULL),
(27,	2,	'Permissions',	'view',	NULL,	NULL),
(28,	2,	'Permissions',	'add',	NULL,	NULL),
(29,	2,	'Permissions',	'edit',	NULL,	NULL),
(30,	2,	'Permissions',	'delete',	NULL,	NULL),
(31,	2,	'Users',	'index',	NULL,	NULL),
(32,	2,	'Users',	'view',	NULL,	NULL),
(33,	2,	'Users',	'add',	NULL,	NULL),
(34,	2,	'Users',	'edit',	NULL,	NULL),
(35,	2,	'Users',	'delete',	NULL,	NULL),
(36,	3,	'Customers',	'index',	NULL,	NULL),
(37,	3,	'Customers',	'view',	NULL,	NULL),
(38,	3,	'Customers',	'add',	NULL,	NULL),
(39,	3,	'Customers',	'edit',	NULL,	NULL),
(40,	3,	'Customers',	'delete',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1,	'super',	'$2y$10$JSDAQhVzicXNOPsiFxSqL.w0tAO6GDCxUMxR.uP3yWMYUTBtv6W8.',	1,	'2016-09-15 15:57:16',	'2019-04-06 09:53:44'),
(2,	'admin',	'$2y$10$TGZG6d.9XCIh.y0qAuvNlupylnG7CR8fP7OvD1tGesNmbXdPLhyYi',	2,	'2016-09-15 15:57:28',	'2019-05-24 20:33:02'),
(3,	'manager',	'$2y$10$fx0/o/XU3WPO5.nnP7cnCeSuFsFjxCMkk72DciLqABzHp50cOFnre',	3,	'2016-09-15 15:57:39',	'2019-05-24 20:33:15'),
(4,	'user',	'$2y$10$BFj76H6cjH7D7pDxFFtEmu57HlJfKGPfmUEnl5zeRwxVtCMRCyxNG',	4,	'2016-09-15 15:58:21',	'2019-05-24 20:33:31');

-- 2021-05-19 18:02:53
