DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1,	'Supers',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(2,	'Admins',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(3,	'Managers',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(4,	'Users',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  CONSTRAINT `group_fk` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1,	'super',	'$2y$10$DPJQQvPAOpae23WWWVmVQ.5PsRJfUdCa/BUdu4eZWoX6Hu98aTdnq',	1,	'2016-09-15 15:57:16',	'2016-09-15 15:57:16'),
(2,	'admin',	'$2y$10$2aTDwGEtcayt859lMTuwN.Bys.5Mpmii5pIN2oQkfzYbgGtM7v9q6',	2,	'2016-09-15 15:57:28',	'2016-09-15 15:57:28'),
(3,	'manager',	'$2y$10$08jYO5pe/ib9rdJetizQZexgb6czFArx72ZZ8tp4rcGzhvgrloPLy',	3,	'2016-09-15 15:57:39',	'2016-09-15 15:57:39'),
(4,	'user',	'$2y$10$pxNdOGydRKprWn/levNz/eyoUxa/zXONDj29ReIXdCqu.l.IxjYb6',	4,	'2016-09-15 15:58:21',	'2016-09-15 15:58:21');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `controller` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_key` (`group_id`,`controller`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `observation` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_fk` (`user_id`),
  CONSTRAINT `customer_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customers` (`id`, `name`, `birthday`, `phone`, `user_id`, `observation`, `created`, `modified`) VALUES
(1,	'Brennan G. Wilcox',	'2016-04-15',	'(851) 190-1314',	3,	'ante. Maecenas mi felis, adipiscing',	NULL,	NULL),
(2,	'Chase Summers',	'2016-08-27',	'(846) 297-4733',	3,	'Sed molestie. Sed id risus',	NULL,	NULL),
(3,	'Sonia L. Mckay',	'2015-12-02',	'(131) 453-1690',	2,	'fermentum vel, mauris. Integer sem',	NULL,	NULL),
(4,	'Isadora L. Bowers',	'2015-10-24',	'(939) 798-4625',	2,	'consequat, lectus sit amet luctus',	NULL,	NULL),
(5,	'Sophia Cochran',	'2017-06-15',	'(811) 687-0491',	2,	'Aliquam tincidunt, nunc ac mattis',	NULL,	NULL),
(6,	'Maxwell T. Burton',	'2016-01-12',	'(147) 962-3265',	2,	'at arcu. Vestibulum ante ipsum',	NULL,	NULL),
(7,	'Desiree Y. Henry',	'2017-07-21',	'(148) 711-3747',	2,	'vitae dolor. Donec fringilla. Donec',	NULL,	NULL),
(8,	'Asher Key',	'2015-11-07',	'(355) 668-5871',	3,	'a, aliquet vel, vulputate eu,',	NULL,	NULL),
(9,	'Tyler Castro',	'2016-08-31',	'(567) 793-5061',	4,	'nec tempus mauris erat eget',	NULL,	NULL),
(10,	'Rudyard Weber',	'2015-10-26',	'(445) 457-4552',	1,	'Morbi vehicula. Pellentesque tincidunt tempus',	NULL,	NULL),
(11,	'Allen Austin',	'2016-04-15',	'(758) 867-2179',	4,	'ipsum. Phasellus vitae mauris sit',	NULL,	NULL),
(12,	'Octavius Cooper',	'2015-10-13',	'(101) 625-3985',	4,	'ipsum non arcu. Vivamus sit',	NULL,	NULL),
(13,	'Dustin M. Oneill',	'2016-04-24',	'(276) 722-0976',	1,	'magnis dis parturient montes, nascetur',	NULL,	NULL),
(14,	'Giacomo K. Horton',	'2016-07-03',	'(773) 532-7468',	3,	'neque. Sed eget lacus. Mauris',	NULL,	NULL),
(15,	'Signe T. Weaver',	'2016-06-17',	'(210) 895-3664',	3,	'dui nec urna suscipit nonummy.',	NULL,	NULL),
(16,	'Avram O. Delaney',	'2016-08-05',	'(609) 552-7572',	2,	'Donec luctus aliquet odio. Etiam',	NULL,	NULL),
(17,	'Cara Parker',	'2016-07-24',	'(854) 169-4797',	3,	'ornare lectus justo eu arcu.',	NULL,	NULL),
(18,	'Chelsea Mcclain',	'2016-08-06',	'(363) 636-1560',	3,	'mollis lectus pede et risus.',	NULL,	NULL),
(19,	'Wesley Garner',	'2016-06-11',	'(578) 231-2389',	1,	'Fusce feugiat. Lorem ipsum dolor',	NULL,	NULL),
(20,	'Irene P. Arnold',	'2016-02-12',	'(253) 631-9830',	1,	'accumsan laoreet ipsum. Curabitur consequat,',	NULL,	NULL),
(21,	'Austin S. Wall',	'2016-01-21',	'(225) 694-9511',	2,	'Sed eget lacus. Mauris non',	NULL,	NULL),
(22,	'Roanna K. Ortiz',	'2016-08-28',	'(336) 788-2145',	1,	'congue a, aliquet vel, vulputate',	NULL,	NULL),
(23,	'Jenette X. Sexton',	'2017-01-03',	'(788) 349-8719',	3,	'vestibulum. Mauris magna. Duis dignissim',	NULL,	NULL),
(24,	'Raya C. Foster',	'2017-05-10',	'(456) 872-8316',	2,	'a, facilisis non, bibendum sed,',	NULL,	NULL),
(25,	'Ori Chapman',	'2017-03-16',	'(782) 146-0174',	3,	'Curabitur dictum. Phasellus in felis.',	NULL,	NULL),
(26,	'Samantha Coffey',	'2016-06-25',	'(810) 586-5638',	4,	'est. Nunc ullamcorper, velit in',	NULL,	NULL),
(27,	'Hannah Pittman',	'2016-02-21',	'(391) 945-3210',	4,	'sem magna nec quam. Curabitur',	NULL,	NULL),
(28,	'April Walton',	'2015-10-09',	'(328) 217-3934',	3,	'tincidunt, nunc ac mattis ornare,',	NULL,	NULL),
(29,	'Flynn B. Willis',	'2016-10-30',	'(898) 157-2500',	1,	'Suspendisse non leo. Vivamus nibh',	NULL,	NULL),
(30,	'Coby L. Duke',	'2015-10-15',	'(520) 634-0436',	4,	'tristique senectus et netus et',	NULL,	NULL),
(31,	'Natalie W. Lewis',	'2016-06-05',	'(148) 747-9979',	3,	'mauris sagittis placerat. Cras dictum',	NULL,	NULL),
(32,	'Angelica T. Daniels',	'2016-11-18',	'(881) 755-2951',	4,	'diam eu dolor egestas rhoncus.',	NULL,	NULL),
(33,	'Serina Rush',	'2016-11-15',	'(988) 136-7179',	3,	'at, egestas a, scelerisque sed,',	NULL,	NULL),
(34,	'Jessamine Bright',	'2015-10-10',	'(659) 268-8156',	1,	'penatibus et magnis dis parturient',	NULL,	NULL),
(35,	'Hannah Hobbs',	'2016-07-21',	'(151) 679-7163',	4,	'id ante dictum cursus. Nunc',	NULL,	NULL),
(36,	'Charity Allison',	'2017-02-09',	'(697) 761-4890',	4,	'Sed nec metus facilisis lorem',	NULL,	NULL),
(37,	'Nathaniel Jefferson',	'2017-02-17',	'(601) 671-1557',	2,	'lorem, luctus ut, pellentesque eget,',	NULL,	NULL),
(38,	'Amos Holcomb',	'2016-06-13',	'(320) 249-8062',	1,	'ullamcorper, nisl arcu iaculis enim,',	NULL,	NULL),
(39,	'Sierra Dickerson',	'2016-04-03',	'(772) 676-9252',	4,	'orci lobortis augue scelerisque mollis.',	NULL,	NULL),
(40,	'Vincent Patrick',	'2017-05-21',	'(655) 479-0250',	4,	'adipiscing ligula. Aenean gravida nunc',	NULL,	NULL),
(41,	'Lee B. Lang',	'2016-03-26',	'(418) 950-4721',	4,	'fermentum convallis ligula. Donec luctus',	NULL,	NULL),
(42,	'Rashad S. Le',	'2016-04-13',	'(469) 302-1629',	1,	'placerat, orci lacus vestibulum lorem,',	NULL,	NULL),
(43,	'Mufutau S. Head',	'2016-09-14',	'(426) 374-0954',	4,	'felis purus ac tellus. Suspendisse',	NULL,	NULL),
(44,	'Maite X. Dunlap',	'2017-08-25',	'(867) 538-7251',	3,	'Ut nec urna et arcu',	NULL,	NULL),
(45,	'Cassady Newton',	'2017-01-23',	'(298) 700-8481',	2,	'erat eget ipsum. Suspendisse sagittis.',	NULL,	NULL),
(46,	'Jorden Galloway',	'2016-09-11',	'(930) 855-8859',	1,	'blandit at, nisi. Cum sociis',	NULL,	NULL),
(47,	'Jakeem Stanley',	'2017-06-01',	'(407) 952-4742',	2,	'blandit at, nisi. Cum sociis',	NULL,	NULL),
(48,	'Armando O. Thomas',	'2017-05-18',	'(253) 534-3585',	3,	'magna et ipsum cursus vestibulum.',	NULL,	NULL),
(49,	'Mary Henson',	'2016-04-05',	'(530) 651-2228',	3,	'nonummy. Fusce fermentum fermentum arcu.',	NULL,	NULL),
(50,	'Preston N. May',	'2016-01-24',	'(233) 386-3409',	2,	'convallis erat, eget tincidunt dui',	NULL,	NULL),
(51,	'Nell Y. Burke',	'2016-05-09',	'(641) 510-4487',	2,	'sed consequat auctor, nunc nulla',	NULL,	NULL),
(52,	'Colorado K. Johnston',	'2015-10-07',	'(694) 733-6952',	2,	'Nam consequat dolor vitae dolor.',	NULL,	NULL),
(53,	'Dana Huber',	'2016-03-04',	'(870) 167-6225',	2,	'Praesent luctus. Curabitur egestas nunc',	NULL,	NULL),
(54,	'Colorado R. Lane',	'2016-02-10',	'(146) 264-1474',	2,	'semper cursus. Integer mollis. Integer',	NULL,	NULL),
(55,	'Dane M. Morrow',	'2015-10-13',	'(494) 572-0004',	1,	'Duis ac arcu. Nunc mauris.',	NULL,	NULL),
(56,	'Baker Parker',	'2015-10-25',	'(880) 195-3158',	4,	'eros. Proin ultrices. Duis volutpat',	NULL,	NULL),
(57,	'Basil J. Nelson',	'2016-03-20',	'(797) 389-8349',	1,	'turpis egestas. Aliquam fringilla cursus',	NULL,	NULL),
(58,	'Aspen Wood',	'2017-07-24',	'(880) 308-5744',	2,	'purus, accumsan interdum libero dui',	NULL,	NULL),
(59,	'Suki Morgan',	'2017-08-10',	'(417) 983-7701',	3,	'Nulla tincidunt, neque vitae semper',	NULL,	NULL),
(60,	'Josiah I. Barrera',	'2016-11-01',	'(242) 478-6171',	1,	'cursus, diam at pretium aliquet,',	NULL,	NULL),
(61,	'Jarrod Y. Reilly',	'2016-11-02',	'(739) 917-3117',	2,	'facilisis eget, ipsum. Donec sollicitudin',	NULL,	NULL),
(62,	'Noble D. Johnston',	'2017-02-20',	'(419) 478-5918',	1,	'Duis sit amet diam eu',	NULL,	NULL),
(63,	'Grant P. Morton',	'2016-08-01',	'(983) 130-8454',	3,	'mollis dui, in sodales elit',	NULL,	NULL),
(64,	'Beau Delacruz',	'2016-09-23',	'(357) 479-4057',	4,	'ante ipsum primis in faucibus',	NULL,	NULL),
(65,	'Eaton R. Carlson',	'2015-10-23',	'(651) 713-5372',	3,	'dolor elit, pellentesque a, facilisis',	NULL,	NULL),
(66,	'Candice T. Bruce',	'2017-04-08',	'(597) 716-4390',	3,	'est ac mattis semper, dui',	NULL,	NULL),
(67,	'Noelani K. Todd',	'2016-11-24',	'(196) 634-6147',	4,	'fringilla est. Mauris eu turpis.',	NULL,	NULL),
(68,	'Joel Giles',	'2016-11-15',	'(308) 918-6363',	1,	'Sed neque. Sed eget lacus.',	NULL,	NULL),
(69,	'Micah T. Whitaker',	'2017-06-18',	'(882) 776-3407',	1,	'at, libero. Morbi accumsan laoreet',	NULL,	NULL),
(70,	'Irene Harmon',	'2016-05-13',	'(312) 982-8432',	1,	'non sapien molestie orci tincidunt',	NULL,	NULL),
(71,	'Benjamin Evans',	'2016-02-01',	'(954) 608-2193',	4,	'sit amet ultricies sem magna',	NULL,	NULL),
(72,	'Jaden V. Snow',	'2017-06-11',	'(129) 287-1852',	2,	'enim consequat purus. Maecenas libero',	NULL,	NULL),
(73,	'Lois I. Monroe',	'2017-04-30',	'(561) 356-4051',	4,	'parturient montes, nascetur ridiculus mus.',	NULL,	NULL),
(74,	'Fitzgerald F. Hodge',	'2017-07-09',	'(635) 741-8709',	3,	'risus. Morbi metus. Vivamus euismod',	NULL,	NULL),
(75,	'Evangeline Harrington',	'2017-01-18',	'(379) 320-1729',	1,	'enim. Mauris quis turpis vitae',	NULL,	NULL),
(76,	'Vincent Wade',	'2015-10-05',	'(629) 652-1065',	4,	'at fringilla purus mauris a',	NULL,	NULL),
(77,	'Beverly S. Dalton',	'2017-08-02',	'(109) 903-6686',	3,	'consequat purus. Maecenas libero est,',	NULL,	NULL),
(78,	'Aretha Cummings',	'2015-11-10',	'(725) 814-9857',	4,	'convallis convallis dolor. Quisque tincidunt',	NULL,	NULL),
(79,	'Zachary I. Sweeney',	'2017-03-07',	'(548) 146-2685',	1,	'pede ac urna. Ut tincidunt',	NULL,	NULL),
(80,	'Dominique C. Mason',	'2016-06-01',	'(263) 893-9386',	3,	'tellus lorem eu metus. In',	NULL,	NULL),
(81,	'Vaughan Wilcox',	'2017-08-20',	'(583) 161-2497',	3,	'sem magna nec quam. Curabitur',	NULL,	NULL),
(82,	'Jarrod B. Oneal',	'2016-11-23',	'(775) 692-0184',	1,	'Suspendisse ac metus vitae velit',	NULL,	NULL),
(83,	'Dexter Kennedy',	'2017-03-17',	'(802) 465-9811',	1,	'Nulla tempor augue ac ipsum.',	NULL,	NULL),
(84,	'Ross V. Simpson',	'2017-04-28',	'(615) 773-2137',	2,	'neque pellentesque massa lobortis ultrices.',	NULL,	NULL),
(85,	'Desiree H. Chaney',	'2017-08-27',	'(881) 809-1454',	3,	'faucibus leo, in lobortis tellus',	NULL,	NULL),
(86,	'Trevor Parrish',	'2017-07-17',	'(651) 788-9732',	1,	'felis. Donec tempor, est ac',	NULL,	NULL),
(87,	'Jacob Suarez',	'2016-05-08',	'(413) 657-2282',	2,	'placerat, augue. Sed molestie. Sed',	NULL,	NULL),
(88,	'Zenia W. Ramos',	'2016-12-10',	'(504) 651-3900',	2,	'vitae mauris sit amet lorem',	NULL,	NULL),
(89,	'Macy Jenkins',	'2016-12-12',	'(216) 786-1537',	2,	'amet orci. Ut sagittis lobortis',	NULL,	NULL),
(90,	'Sylvia Harmon',	'2016-01-27',	'(358) 874-1157',	2,	'fringilla ornare placerat, orci lacus',	NULL,	NULL),
(91,	'Derek O. Leach',	'2016-05-06',	'(276) 466-7185',	1,	'iaculis quis, pede. Praesent eu',	NULL,	NULL),
(92,	'Callie Beasley',	'2017-04-26',	'(736) 940-5926',	1,	'tristique ac, eleifend vitae, erat.',	NULL,	NULL),
(93,	'Madeline Mccullough',	'2016-06-07',	'(447) 953-7112',	3,	'a, facilisis non, bibendum sed,',	NULL,	NULL),
(94,	'Dacey K. Barnes',	'2016-12-09',	'(808) 944-1291',	1,	'eu elit. Nulla facilisi. Sed',	NULL,	NULL),
(95,	'Aimee Crawford',	'2016-03-25',	'(433) 180-8813',	2,	'ultrices sit amet, risus. Donec',	NULL,	NULL),
(96,	'Brennan Fox',	'2015-12-01',	'(151) 364-5439',	2,	'semper. Nam tempor diam dictum',	NULL,	NULL),
(97,	'Chelsea C. Tran',	'2015-10-11',	'(509) 783-6846',	2,	'justo eu arcu. Morbi sit',	NULL,	NULL),
(98,	'Galvin P. Farmer',	'2017-05-18',	'(914) 669-5904',	3,	'at auctor ullamcorper, nisl arcu',	NULL,	NULL),
(99,	'Samuel J. Camacho',	'2017-06-10',	'(406) 890-0419',	3,	'lacus. Aliquam rutrum lorem ac',	NULL,	NULL),
(100,	'Steven Mercer',	'2017-05-16',	'(651) 284-6016',	2,	'semper, dui lectus rutrum urna,',	NULL,	NULL);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unity` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `register` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk` (`user_id`),
  KEY `customer2_fk` (`customer_id`),
  CONSTRAINT `customer2_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `products` (`id`, `name`, `unity`, `register`, `user_id`, `customer_id`, `created`, `modified`) VALUES
(1,	'consectetuer',	'HTPEY',	'2016-09-04',	1,	31,	NULL,	NULL),
(2,	'quis,',	'VMSWK',	'2016-09-24',	2,	77,	NULL,	NULL),
(3,	'et',	'UYRWE',	'2017-08-08',	1,	98,	NULL,	NULL),
(4,	'ipsum',	'FCSCT',	'2016-03-30',	4,	67,	NULL,	NULL),
(5,	'Integer',	'IKTNX',	'2017-04-27',	2,	59,	NULL,	NULL),
(6,	'vulputate,',	'TJDAS',	'2017-02-04',	4,	61,	NULL,	NULL),
(7,	'augue,',	'PQQOA',	'2016-11-21',	3,	98,	NULL,	NULL),
(8,	'vulputate',	'DREMK',	'2016-08-15',	3,	100,	NULL,	NULL),
(9,	'facilisis',	'XWMWQ',	'2016-08-08',	1,	8,	NULL,	NULL),
(10,	'odio.',	'OHJLP',	'2017-05-24',	4,	29,	NULL,	NULL),
(11,	'Phasellus',	'YGTET',	'2015-11-17',	3,	32,	NULL,	NULL),
(12,	'Proin',	'QBZNG',	'2017-03-23',	4,	10,	NULL,	NULL),
(13,	'pede',	'LPWII',	'2017-02-12',	2,	85,	NULL,	NULL),
(14,	'Nunc',	'VSRSQ',	'2016-06-14',	1,	80,	NULL,	NULL),
(15,	'lectus',	'VUCZI',	'2017-06-21',	4,	83,	NULL,	NULL),
(16,	'tellus',	'TGVXD',	'2017-01-18',	3,	22,	NULL,	NULL),
(17,	'a',	'MINIQ',	'2017-09-10',	1,	79,	NULL,	NULL),
(18,	'a',	'YGMAB',	'2016-01-31',	2,	77,	NULL,	NULL),
(19,	'Aenean',	'NJPML',	'2017-07-21',	1,	28,	NULL,	NULL),
(20,	'nec',	'KRQIR',	'2017-03-18',	2,	7,	NULL,	NULL),
(21,	'magna,',	'HBDLZ',	'2016-10-02',	2,	2,	NULL,	NULL),
(22,	'Suspendisse',	'DPRPO',	'2016-08-10',	1,	62,	NULL,	NULL),
(23,	'sociosqu',	'UZUAU',	'2016-03-19',	3,	13,	NULL,	NULL),
(24,	'lacinia',	'PAPYR',	'2017-08-26',	4,	17,	NULL,	NULL),
(25,	'ac',	'EQDGJ',	'2017-06-01',	1,	38,	NULL,	NULL),
(26,	'nunc',	'SXQPG',	'2017-08-14',	1,	39,	NULL,	NULL),
(27,	'Donec',	'WCEED',	'2016-08-05',	3,	37,	NULL,	NULL),
(28,	'est',	'FMVBP',	'2016-10-03',	2,	99,	NULL,	NULL),
(29,	'mattis.',	'CHTFN',	'2016-02-19',	2,	58,	NULL,	NULL),
(30,	'Proin',	'OZMWW',	'2017-06-22',	2,	40,	NULL,	NULL),
(31,	'Sed',	'ZUTLA',	'2016-10-15',	2,	20,	NULL,	NULL),
(32,	'urna',	'EMIER',	'2016-12-20',	2,	56,	NULL,	NULL),
(33,	'sem,',	'DZQRR',	'2016-12-26',	3,	91,	NULL,	NULL),
(34,	'non',	'CSEGA',	'2017-06-20',	3,	1,	NULL,	NULL),
(35,	'risus.',	'HSTRN',	'2017-04-01',	3,	9,	NULL,	NULL),
(36,	'non,',	'DIDHX',	'2017-05-20',	2,	78,	NULL,	NULL),
(37,	'Fusce',	'NZZZA',	'2017-06-23',	2,	79,	NULL,	NULL),
(38,	'Sed',	'TEWCU',	'2016-07-16',	1,	16,	NULL,	NULL),
(39,	'ultrices,',	'WHWXY',	'2015-11-02',	1,	64,	NULL,	NULL),
(40,	'sodales',	'TEHFS',	'2016-09-04',	2,	51,	NULL,	NULL),
(41,	'tellus',	'WGESE',	'2015-10-27',	4,	77,	NULL,	NULL),
(42,	'Integer',	'VASKV',	'2017-03-14',	4,	96,	NULL,	NULL),
(43,	'lorem',	'TUVCV',	'2016-09-16',	1,	42,	NULL,	NULL),
(44,	'erat,',	'BGUHK',	'2017-05-08',	2,	1,	NULL,	NULL),
(45,	'ridiculus',	'LJBZW',	'2015-10-06',	3,	70,	NULL,	NULL),
(46,	'nunc',	'KIWKN',	'2017-07-28',	1,	32,	NULL,	NULL),
(47,	'placerat',	'RLWQI',	'2016-11-22',	3,	66,	NULL,	NULL),
(48,	'magna,',	'ZVPCH',	'2016-04-29',	1,	61,	NULL,	NULL),
(49,	'posuere',	'BJAYT',	'2015-11-15',	3,	73,	NULL,	NULL),
(50,	'enim.',	'DGSMJ',	'2015-10-03',	3,	20,	NULL,	NULL),
(51,	'nibh',	'IXPQI',	'2016-03-13',	3,	4,	NULL,	NULL),
(52,	'Nulla',	'HXPGO',	'2016-04-27',	1,	91,	NULL,	NULL),
(53,	'blandit',	'VOWKE',	'2016-09-16',	1,	78,	NULL,	NULL),
(54,	'diam',	'EETTV',	'2015-12-14',	4,	59,	NULL,	NULL),
(55,	'sagittis',	'CTQNR',	'2016-09-05',	1,	35,	NULL,	NULL),
(56,	'Sed',	'MSKYI',	'2016-01-03',	4,	48,	NULL,	NULL),
(57,	'magna',	'YZMVV',	'2016-04-01',	4,	11,	NULL,	NULL),
(58,	'nec',	'QZQUN',	'2017-08-11',	2,	15,	NULL,	NULL),
(59,	'dignissim',	'NLWVF',	'2016-04-17',	2,	56,	NULL,	NULL),
(60,	'dignissim.',	'SSVEY',	'2016-02-22',	4,	59,	NULL,	NULL),
(61,	'Integer',	'APLXQ',	'2017-04-22',	1,	65,	NULL,	NULL),
(62,	'molestie',	'TSPCQ',	'2016-01-25',	2,	5,	NULL,	NULL),
(63,	'Donec',	'HPENR',	'2017-06-14',	4,	88,	NULL,	NULL),
(64,	'lorem',	'JCQIO',	'2016-10-14',	4,	84,	NULL,	NULL),
(65,	'orci,',	'QPYFP',	'2016-07-12',	4,	81,	NULL,	NULL),
(66,	'tempor',	'OIPXA',	'2015-12-08',	1,	44,	NULL,	NULL),
(67,	'ut,',	'GMZEE',	'2016-06-17',	4,	69,	NULL,	NULL),
(68,	'interdum',	'RODUG',	'2015-10-27',	3,	58,	NULL,	NULL),
(69,	'et,',	'KBQAJ',	'2017-09-09',	1,	66,	NULL,	NULL),
(70,	'Integer',	'GAZUY',	'2016-01-25',	1,	26,	NULL,	NULL),
(71,	'aliquam',	'QXQZQ',	'2017-09-16',	4,	88,	NULL,	NULL),
(72,	'adipiscing',	'UYRAG',	'2016-04-17',	4,	26,	NULL,	NULL),
(73,	'dolor',	'HKDRJ',	'2015-12-05',	4,	15,	NULL,	NULL),
(74,	'metus.',	'AZWHK',	'2017-07-10',	2,	45,	NULL,	NULL),
(75,	'at,',	'SBYTB',	'2016-04-20',	4,	92,	NULL,	NULL),
(76,	'libero',	'NXUUK',	'2015-12-27',	2,	71,	NULL,	NULL),
(77,	'non,',	'EBKRZ',	'2015-11-05',	3,	97,	NULL,	NULL),
(78,	'eget',	'ASBVM',	'2016-10-29',	1,	33,	NULL,	NULL),
(79,	'mauris',	'KHIBU',	'2017-07-08',	1,	74,	NULL,	NULL),
(80,	'vitae',	'SCVLP',	'2017-08-10',	1,	91,	NULL,	NULL),
(81,	'mollis',	'SGIWF',	'2016-06-03',	4,	92,	NULL,	NULL),
(82,	'aliquet',	'YJRHI',	'2016-03-23',	4,	28,	NULL,	NULL),
(83,	'Duis',	'VZOFY',	'2015-12-26',	1,	97,	NULL,	NULL),
(84,	'Nunc',	'RKZJV',	'2017-02-28',	1,	68,	NULL,	NULL),
(85,	'venenatis',	'BJTUA',	'2015-10-06',	2,	9,	NULL,	NULL),
(86,	'Mauris',	'AZGPW',	'2015-11-15',	3,	80,	NULL,	NULL),
(87,	'interdum',	'LBYSH',	'2016-05-08',	3,	72,	NULL,	NULL),
(88,	'non,',	'VUZLD',	'2016-03-27',	2,	83,	NULL,	NULL),
(89,	'Suspendisse',	'ZMLTZ',	'2017-05-08',	1,	55,	NULL,	NULL),
(90,	'sagittis',	'MVKIQ',	'2015-11-04',	2,	34,	NULL,	NULL),
(91,	'ipsum',	'HZXMN',	'2017-02-10',	3,	2,	NULL,	NULL),
(92,	'Proin',	'DRXNQ',	'2016-07-09',	4,	62,	NULL,	NULL),
(93,	'a',	'KHKEC',	'2016-06-02',	3,	54,	NULL,	NULL),
(94,	'quis,',	'NWJHL',	'2016-04-15',	1,	33,	NULL,	NULL),
(95,	'dolor',	'JATIW',	'2015-12-25',	4,	47,	NULL,	NULL),
(96,	'in,',	'ZLPXD',	'2015-11-28',	1,	25,	NULL,	NULL),
(97,	'arcu.',	'QJMLB',	'2016-05-03',	3,	83,	NULL,	NULL),
(98,	'orci,',	'ZHVQM',	'2015-10-07',	2,	67,	NULL,	NULL),
(99,	'sollicitudin',	'NYRJI',	'2016-01-23',	1,	20,	NULL,	NULL),
(100,	'Integer',	'GESSE',	'2016-08-20',	4,	85,	NULL,	NULL);

DROP TABLE IF EXISTS `product_items`;
CREATE TABLE `product_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_fk` (`product_id`),
  CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_items` (`id`, `product_id`, `quantity`, `price`, `created`, `modified`) VALUES
(1,	16,	8,	58.18,	NULL,	NULL),
(2,	51,	19,	75.95,	NULL,	NULL),
(3,	3,	5,	77.74,	NULL,	NULL),
(4,	52,	12,	45.22,	NULL,	NULL),
(5,	85,	20,	52.12,	NULL,	NULL),
(6,	6,	6,	22.37,	NULL,	NULL),
(7,	42,	6,	15.06,	NULL,	NULL),
(8,	40,	5,	28.81,	NULL,	NULL),
(9,	40,	6,	65.98,	NULL,	NULL),
(10,	71,	19,	55.03,	NULL,	NULL),
(11,	8,	1,	31.62,	NULL,	NULL),
(12,	71,	9,	6.83,	NULL,	NULL),
(13,	78,	18,	5.01,	NULL,	NULL),
(14,	38,	6,	61.58,	NULL,	NULL),
(15,	44,	4,	4.35,	NULL,	NULL),
(16,	5,	18,	79.91,	NULL,	NULL),
(17,	64,	16,	67.48,	NULL,	NULL),
(18,	11,	12,	53.80,	NULL,	NULL),
(19,	41,	7,	40.43,	NULL,	NULL),
(20,	97,	10,	77.96,	NULL,	NULL),
(21,	5,	19,	11.18,	NULL,	NULL),
(22,	32,	17,	19.93,	NULL,	NULL),
(23,	48,	11,	53.44,	NULL,	NULL),
(24,	12,	7,	73.75,	NULL,	NULL),
(25,	51,	13,	61.57,	NULL,	NULL),
(26,	67,	2,	33.45,	NULL,	NULL),
(27,	79,	3,	30.97,	NULL,	NULL),
(28,	30,	11,	44.75,	NULL,	NULL),
(29,	95,	1,	5.39,	NULL,	NULL),
(30,	17,	17,	81.68,	NULL,	NULL),
(31,	4,	18,	58.41,	NULL,	NULL),
(32,	74,	11,	95.05,	NULL,	NULL),
(33,	78,	11,	69.04,	NULL,	NULL),
(34,	60,	7,	52.04,	NULL,	NULL),
(35,	40,	5,	76.02,	NULL,	NULL),
(36,	1,	5,	69.52,	NULL,	NULL),
(37,	80,	7,	72.77,	NULL,	NULL),
(38,	73,	12,	23.22,	NULL,	NULL),
(39,	100,	9,	26.60,	NULL,	NULL),
(40,	100,	19,	80.03,	NULL,	NULL),
(41,	85,	13,	52.58,	NULL,	NULL),
(42,	74,	11,	84.67,	NULL,	NULL),
(43,	34,	10,	82.32,	NULL,	NULL),
(44,	18,	15,	54.93,	NULL,	NULL),
(45,	54,	9,	92.67,	NULL,	NULL),
(46,	5,	14,	51.29,	NULL,	NULL),
(47,	20,	7,	60.08,	NULL,	NULL),
(48,	20,	16,	68.35,	NULL,	NULL),
(49,	90,	18,	22.77,	NULL,	NULL),
(50,	81,	3,	36.69,	NULL,	NULL),
(51,	94,	18,	94.34,	NULL,	NULL),
(52,	21,	17,	79.83,	NULL,	NULL),
(53,	88,	1,	80.64,	NULL,	NULL),
(54,	71,	3,	23.22,	NULL,	NULL),
(55,	76,	6,	93.35,	NULL,	NULL),
(56,	90,	13,	9.61,	NULL,	NULL),
(57,	34,	3,	29.54,	NULL,	NULL),
(58,	61,	11,	97.86,	NULL,	NULL),
(59,	36,	5,	71.51,	NULL,	NULL),
(60,	59,	4,	82.21,	NULL,	NULL),
(61,	22,	14,	43.42,	NULL,	NULL),
(62,	74,	20,	7.79,	NULL,	NULL),
(63,	98,	19,	48.63,	NULL,	NULL),
(64,	46,	19,	20.74,	NULL,	NULL),
(65,	9,	10,	6.04,	NULL,	NULL),
(66,	19,	19,	47.60,	NULL,	NULL),
(67,	76,	9,	50.84,	NULL,	NULL),
(68,	19,	11,	33.68,	NULL,	NULL),
(69,	38,	15,	30.91,	NULL,	NULL),
(70,	18,	18,	66.32,	NULL,	NULL),
(71,	67,	19,	11.60,	NULL,	NULL),
(72,	88,	8,	27.91,	NULL,	NULL),
(73,	26,	12,	74.82,	NULL,	NULL),
(74,	51,	17,	50.83,	NULL,	NULL),
(75,	54,	6,	7.74,	NULL,	NULL),
(76,	97,	7,	69.87,	NULL,	NULL),
(77,	51,	12,	19.76,	NULL,	NULL),
(78,	40,	13,	31.21,	NULL,	NULL),
(79,	19,	8,	79.70,	NULL,	NULL),
(80,	12,	5,	89.36,	NULL,	NULL),
(81,	87,	16,	84.44,	NULL,	NULL),
(82,	62,	8,	72.31,	NULL,	NULL),
(83,	64,	18,	53.12,	NULL,	NULL),
(84,	58,	13,	55.74,	NULL,	NULL),
(85,	66,	8,	99.04,	NULL,	NULL),
(86,	3,	2,	5.60,	NULL,	NULL),
(87,	74,	17,	78.71,	NULL,	NULL),
(88,	10,	13,	3.28,	NULL,	NULL),
(89,	36,	17,	72.20,	NULL,	NULL),
(90,	61,	18,	11.36,	NULL,	NULL),
(91,	57,	12,	83.08,	NULL,	NULL),
(92,	48,	13,	30.67,	NULL,	NULL),
(93,	44,	15,	3.58,	NULL,	NULL),
(94,	23,	18,	90.88,	NULL,	NULL),
(95,	6,	5,	1.04,	NULL,	NULL),
(96,	39,	7,	31.59,	NULL,	NULL),
(97,	94,	12,	52.65,	NULL,	NULL),
(98,	8,	6,	4.39,	NULL,	NULL),
(99,	8,	19,	73.29,	NULL,	NULL),
(100,	58,	2,	50.35,	NULL,	NULL);
