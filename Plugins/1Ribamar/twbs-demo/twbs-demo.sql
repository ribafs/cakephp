-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `twbs-demo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `twbs-demo`;

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1,	'Supers',	'2016-09-15 12:28:26',	'2016-09-15 12:28:26'),
(2,	'Admins',	'2016-09-15 12:28:26',	'2016-09-15 12:28:26'),
(3,	'Managers',	'2016-09-15 12:28:26',	'2016-09-15 12:28:26'),
(4,	'Users',	'2016-09-15 12:28:26',	'2016-09-15 12:28:26');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id` (`group_id`,`controller`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `permissions` (`id`, `group_id`, `controller`, `action`) VALUES
(3,	1,	'Groups',	'add'),
(5,	1,	'Groups',	'delete'),
(4,	1,	'Groups',	'edit'),
(1,	1,	'Groups',	'index'),
(2,	1,	'Groups',	'view'),
(8,	1,	'Permissions',	'add'),
(10,	1,	'Permissions',	'delete'),
(9,	1,	'Permissions',	'edit'),
(6,	1,	'Permissions',	'index'),
(7,	1,	'Permissions',	'view'),
(13,	1,	'Servidores',	'add'),
(15,	1,	'Servidores',	'delete'),
(14,	1,	'Servidores',	'edit'),
(11,	1,	'Servidores',	'index'),
(12,	1,	'Servidores',	'view'),
(18,	1,	'Users',	'add'),
(20,	1,	'Users',	'delete'),
(19,	1,	'Users',	'edit'),
(16,	1,	'Users',	'index'),
(17,	1,	'Users',	'view'),
(23,	2,	'Groups',	'add'),
(25,	2,	'Groups',	'delete'),
(24,	2,	'Groups',	'edit'),
(21,	2,	'Groups',	'index'),
(22,	2,	'Groups',	'view'),
(28,	2,	'Permissions',	'add'),
(30,	2,	'Permissions',	'delete'),
(29,	2,	'Permissions',	'edit'),
(26,	2,	'Permissions',	'index'),
(27,	2,	'Permissions',	'view'),
(33,	2,	'Users',	'add'),
(35,	2,	'Users',	'delete'),
(34,	2,	'Users',	'edit'),
(31,	2,	'Users',	'index'),
(32,	2,	'Users',	'view'),
(38,	3,	'Servidores',	'add'),
(40,	3,	'Servidores',	'delete'),
(39,	3,	'Servidores',	'edit'),
(36,	3,	'Servidores',	'index'),
(37,	3,	'Servidores',	'view');

DROP TABLE IF EXISTS `servidores`;
CREATE TABLE `servidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `cnpj` char(14) DEFAULT NULL,
  `fone` varchar(14) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `observacao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `servidores` (`id`, `nome`, `email`, `nascimento`, `cpf`, `cnpj`, `fone`, `user_id`, `observacao`) VALUES
(1,	'Phillip H. Bass',	'tellus.Nunc@turpisegestasFusce.org',	'2016-03-01',	'54274561281',	'86721316751128',	'1295142231892',	71,	'vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu,'),
(2,	'Norman Fowler',	'Phasellus@inconsequatenim.ca',	'2016-06-16',	'55143712212',	'94362674487472',	'8734155165158',	86,	'sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec'),
(3,	'Walter L. Velez',	'aliquam@musProin.net',	'2016-10-02',	'35364258582',	'69165324293947',	'7893496681761',	5,	'diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula.'),
(4,	'Rosalyn Leonard',	'a.aliquet.vel@at.net',	'2016-03-01',	'82872219721',	'93155688238484',	'2573379761319',	70,	'vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat'),
(5,	'Alfonso W. Osborne',	'dolor.Quisque.tincidunt@Crasvulputate.ca',	'2015-09-26',	'14438952816',	'48796773579537',	'8582288625218',	93,	'sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus,'),
(6,	'Rhonda Roy',	'id@ultricesaauctor.net',	'2017-07-27',	'73275252968',	'58833233385899',	'3938827177516',	8,	'pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor'),
(7,	'Solomon M. Horton',	'nonummy@lacusUt.edu',	'2017-03-29',	'83467126875',	'18415954743769',	'7124189126594',	81,	'hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus'),
(8,	'Evelyn W. Hogan',	'risus.Donec.egestas@nuncidenim.edu',	'2016-07-15',	'66565898143',	'81483427364788',	'9275864713579',	73,	'hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut'),
(9,	'Palmer T. Schwartz',	'egestas.a.scelerisque@etmalesuada.net',	'2017-06-24',	'33956363676',	'78559543278524',	'3731112347855',	27,	'nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum'),
(10,	'Melodie Crawford',	'malesuada.augue@dolorquamelementum.co.uk',	'2016-04-04',	'24993546443',	'47191858223967',	'5775879185432',	30,	'fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu'),
(11,	'Nina C. Gaines',	'dui.semper.et@insodales.com',	'2017-02-28',	'65778785366',	'88117851889311',	'2791979967218',	11,	'nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et'),
(12,	'Melanie C. Sanders',	'a.feugiat@morbi.com',	'2015-09-20',	'83162253153',	'69871344762348',	'6117621916222',	2,	'pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi.'),
(13,	'Hayley Bright',	'tempor.est.ac@inhendreritconsectetuer.net',	'2016-10-25',	'25792918199',	'36235612493534',	'8184263831197',	53,	'quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique'),
(14,	'Noble Holloway',	'ut.sem@pharetraNamac.ca',	'2016-10-26',	'33119898558',	'32916857497821',	'7147737429392',	50,	'sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non,'),
(15,	'Shea I. Mcbride',	'cursus.a.enim@ProinultricesDuis.org',	'2016-04-11',	'14855457199',	'15567677757596',	'8573886197654',	85,	'arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec'),
(16,	'Inga M. Bonner',	'Nunc@nisia.co.uk',	'2016-10-13',	'33456393197',	'72988178396384',	'9977827989611',	2,	'rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus.'),
(17,	'Stephanie G. Nguyen',	'non@acmattis.ca',	'2016-10-08',	'62465797568',	'18333925228419',	'7972544289614',	70,	'odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est'),
(18,	'Erin Mejia',	'in@sociisnatoque.edu',	'2016-09-21',	'19189649475',	'31662683839823',	'9216924765145',	27,	'faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet'),
(19,	'Porter Reynolds',	'dictum@mi.ca',	'2016-08-06',	'35221796789',	'23442498945678',	'9127583882515',	98,	'turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper'),
(20,	'Tanek L. Knapp',	'nulla.ante@vulputatevelit.edu',	'2016-11-04',	'85286784543',	'93553723454195',	'4644674986392',	40,	'ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci.'),
(21,	'Marvin C. Caldwell',	'nunc@ametdiam.co.uk',	'2017-02-28',	'56929913213',	'69341689445136',	'6722246941534',	40,	'fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur'),
(22,	'Miranda Washington',	'sit.amet.ultricies@duiFuscealiquam.net',	'2017-08-01',	'74237991294',	'57889819533875',	'2449382556579',	54,	'eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit'),
(23,	'Harding Mcleod',	'dolor.sit.amet@bibendumDonecfelis.net',	'2017-04-29',	'84685185913',	'25194465952874',	'2893889887454',	40,	'senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque'),
(24,	'Quinn O. Powers',	'a.felis.ullamcorper@duiFuscediam.co.uk',	'2015-12-14',	'12856886648',	'97165115225774',	'9965561887936',	96,	'habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus'),
(25,	'Colt Brock',	'Vestibulum.accumsan.neque@Donectempus.org',	'2016-06-30',	'94913354184',	'86736568846226',	'7739453522195',	76,	'non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent'),
(26,	'Emma L. Kelly',	'ut.eros.non@arcuSedeu.ca',	'2016-11-21',	'37866892453',	'77867853257415',	'6263571485754',	69,	'dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec'),
(27,	'Brady Buckner',	'nonummy.Fusce.fermentum@aliquamerosturpis.co.uk',	'2016-02-03',	'17635663852',	'18251154611324',	'8772186482382',	89,	'ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,'),
(28,	'Charde K. Olsen',	'semper.et@nequesed.net',	'2016-04-03',	'58918182594',	'32348831735438',	'4531931737339',	88,	'Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida'),
(29,	'Cassandra C. Gamble',	'libero.Integer@adipiscing.org',	'2015-12-04',	'22242325498',	'99947537256853',	'6696227574781',	14,	'facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque'),
(30,	'Madeline Meadows',	'tellus.Phasellus@ullamcorperviverraMaecenas.com',	'2016-11-24',	'77135214551',	'66368874616498',	'5655519683821',	64,	'pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi.'),
(31,	'Aline N. Velazquez',	'pellentesque.tellus@maurisid.ca',	'2016-10-12',	'62317552574',	'54251232224182',	'1394963563511',	79,	'aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor'),
(32,	'Edan Dickson',	'Sed.nunc@variuseteuismod.edu',	'2017-01-05',	'35272357566',	'31735738781857',	'5221541699941',	2,	'sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris'),
(33,	'Amos Underwood',	'dictum@velitQuisque.ca',	'2017-08-15',	'78126952892',	'77823316331796',	'1975969183577',	34,	'eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris'),
(34,	'Phoebe Clayton',	'fringilla@magna.co.uk',	'2016-09-19',	'12145759487',	'98399617128193',	'4533895167583',	41,	'eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante,'),
(35,	'Edward Spence',	'natoque.penatibus@Integereu.com',	'2016-10-29',	'26591152323',	'14638287952943',	'6511369818228',	76,	'Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie'),
(36,	'Henry Dennis',	'ac.tellus@faucibus.ca',	'2016-03-02',	'36689563762',	'63837349131965',	'5991262757281',	45,	'luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae'),
(37,	'Malik Kane',	'quis@dolorsitamet.com',	'2016-09-11',	'75341888158',	'87599841212291',	'5161898828478',	56,	'pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque'),
(38,	'Charity Booth',	'lobortis.augue@nonummy.org',	'2016-11-09',	'59176195411',	'66948693554758',	'3943326698276',	5,	'cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum'),
(39,	'Barclay Hardy',	'tellus@neque.edu',	'2017-07-14',	'74887818345',	'59333127252737',	'4669849512636',	41,	'nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend'),
(40,	'Denton M. Wilkinson',	'egestas.a@congueaaliquet.ca',	'2015-09-14',	'84254163651',	'37769796182782',	'9691921972484',	35,	'lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida'),
(41,	'Paul Mathews',	'montes@fringillamilacinia.org',	'2017-04-30',	'12985516299',	'49316382999473',	'3933633763268',	78,	'Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit eget laoreet'),
(42,	'Christine C. Decker',	'risus@ategestas.co.uk',	'2017-01-15',	'81445685141',	'45333294311893',	'7995225811964',	3,	'adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum.'),
(43,	'Adrian Carney',	'urna.suscipit.nonummy@Cras.net',	'2015-12-25',	'63461485451',	'83456995418643',	'9959838315161',	35,	'tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia'),
(44,	'Nola E. Cooley',	'euismod.et@Lorem.org',	'2016-04-06',	'99693314165',	'12714278957613',	'4451126577414',	64,	'mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod'),
(45,	'Alden Casey',	'odio@euligula.org',	'2017-08-07',	'61916985653',	'54827219515625',	'2696457756937',	81,	'nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas'),
(46,	'Sylvia R. Hansen',	'elementum.sem.vitae@necleo.com',	'2016-10-16',	'12166954845',	'81631619437934',	'7479956197395',	81,	'malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede'),
(47,	'Hu Clements',	'tristique@et.net',	'2016-04-01',	'38958666552',	'91498961673924',	'1254987777138',	69,	'Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam'),
(48,	'Curran K. Horn',	'metus.Vivamus.euismod@Donec.org',	'2016-02-26',	'91716985647',	'81396689176235',	'8235813671935',	27,	'orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc'),
(49,	'Maxwell O. Morales',	'neque@acrisusMorbi.co.uk',	'2016-03-08',	'84472179158',	'12944919325498',	'6576743597596',	76,	'sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna.'),
(50,	'Lyle G. Dickerson',	'Mauris.magna@in.org',	'2016-12-31',	'59311713391',	'39218395777561',	'6471292439747',	3,	'Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus'),
(51,	'William U. Swanson',	'non.quam@nuncinterdum.com',	'2015-12-18',	'55185494729',	'23649987821972',	'7435313469672',	65,	'Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget'),
(52,	'Hedda Z. Dillon',	'ipsum@cursusetmagna.ca',	'2017-04-14',	'85382827893',	'71298769774212',	'3361787188771',	76,	'consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci,'),
(53,	'Kyra Strong',	'tempus@nisi.org',	'2017-08-11',	'22743626477',	'97533812124589',	'6854277897148',	57,	'convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec'),
(54,	'Ayanna U. Browning',	'magna.Phasellus@Duissit.net',	'2017-08-06',	'32995454699',	'34984126432476',	'4696694465679',	16,	'consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id'),
(55,	'Dieter Ellis',	'amet.metus@congue.co.uk',	'2016-10-25',	'16155423498',	'72341343967345',	'4815349839617',	18,	'pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan'),
(56,	'Acton Cline',	'laoreet.lectus@a.co.uk',	'2016-07-10',	'55943756958',	'73684136652395',	'8297157843854',	67,	'amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy'),
(57,	'Kim Q. Henry',	'pulvinar.arcu.et@Donec.edu',	'2015-12-18',	'35348685168',	'26525223757791',	'6249673817472',	100,	'velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum'),
(58,	'Marvin Fox',	'luctus@euismodest.ca',	'2016-10-05',	'75182747467',	'74166451398914',	'5892198633172',	9,	'ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes,'),
(59,	'Alan D. Drake',	'amet.risus.Donec@eteuismod.com',	'2015-10-05',	'35437354798',	'78718542885444',	'2459335661776',	9,	'lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus,'),
(60,	'Melissa Hayes',	'et@sit.co.uk',	'2017-01-31',	'66468429541',	'19158582377628',	'3591337623625',	78,	'augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor'),
(61,	'Thaddeus N. Hogan',	'ut.pellentesque@Aliquam.edu',	'2016-08-31',	'89595272137',	'55981799237445',	'2517443449713',	64,	'dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac'),
(62,	'Skyler Ferrell',	'mollis.dui.in@aptenttacitisociosqu.co.uk',	'2016-01-12',	'91515447942',	'15872411588432',	'8323367862523',	84,	'eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend'),
(63,	'Basil Knight',	'Ut.sagittis@dignissimmagnaa.org',	'2015-12-18',	'29126392342',	'27578325582486',	'9767452963234',	11,	'quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per'),
(64,	'Colby Carver',	'ac@ornaresagittisfelis.net',	'2016-02-25',	'91987868353',	'28593711563394',	'9777738688416',	33,	'id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia'),
(65,	'Kiona L. Hatfield',	'egestas.a@molestietortor.com',	'2016-07-28',	'44179796694',	'79299343249724',	'3516483185273',	76,	'auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est.'),
(66,	'Marshall G. Rodriguez',	'lectus.convallis@nuncsitamet.net',	'2016-02-19',	'24976473656',	'83568282867234',	'1769363936738',	9,	'auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit'),
(67,	'Teagan A. Rodriguez',	'Nulla@variusNamporttitor.ca',	'2015-10-05',	'45642182989',	'67445573783576',	'2574475299371',	22,	'nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat,'),
(68,	'Tucker Smith',	'augue.eu.tellus@pellentesqueeget.net',	'2016-06-19',	'72888468271',	'14523766433868',	'7475615933145',	71,	'Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam.'),
(69,	'Melodie R. Montgomery',	'Suspendisse.non@tellusloremeu.edu',	'2017-05-04',	'75834438755',	'17289454385895',	'2267552954818',	16,	'fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia'),
(70,	'Xyla H. Flynn',	'vestibulum.neque.sed@sed.net',	'2016-01-19',	'76348672142',	'24555271315456',	'9456389485842',	23,	'libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis'),
(71,	'Elaine E. Faulkner',	'mollis.dui@ac.com',	'2017-06-07',	'91265412965',	'97894763816849',	'6346886121184',	76,	'libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat,'),
(72,	'Allen Bush',	'vehicula.risus@Praesenteu.ca',	'2016-07-07',	'19497647143',	'17824958545845',	'8518816214989',	12,	'ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl.'),
(73,	'Nasim M. Sparks',	'sodales@luctusipsumleo.ca',	'2017-01-10',	'46787443412',	'84912493616569',	'3698574192464',	87,	'non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet,'),
(74,	'Keefe T. Gaines',	'facilisis.vitae.orci@ut.edu',	'2016-03-25',	'19724945697',	'19289854859287',	'4295435272335',	31,	'amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis'),
(75,	'Colton B. Kelly',	'arcu.eu.odio@maurisSuspendissealiquet.edu',	'2016-09-15',	'15558677678',	'62528914882687',	'5226892321763',	84,	'magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque,'),
(76,	'Hanae Hill',	'egestas.lacinia@quamCurabitur.org',	'2017-02-24',	'19988148961',	'19999882787552',	'1911435596147',	50,	'mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec,'),
(77,	'Lamar I. Shelton',	'lorem.luctus.ut@elit.co.uk',	'2016-08-01',	'39355559877',	'78155128446187',	'2543489679286',	48,	'sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum'),
(78,	'Keane Jarvis',	'eros@vitaealiquet.ca',	'2016-05-20',	'28618883295',	'63519665169518',	'5244522137111',	93,	'mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero'),
(79,	'Jamalia Medina',	'iaculis.quis.pede@nullavulputate.co.uk',	'2016-03-24',	'96964683659',	'58242536871151',	'4499657129378',	2,	'Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio.'),
(80,	'Orla V. Barnett',	'lacinia@nibhQuisquenonummy.edu',	'2016-07-29',	'51322985623',	'31645431617154',	'5931371762881',	73,	'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt.'),
(81,	'Maisie K. Flowers',	'lorem@Sedeunibh.edu',	'2016-02-18',	'31228194454',	'56789834519729',	'3729683372961',	10,	'pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et'),
(82,	'Yeo Q. Guerrero',	'mauris@purusMaecenaslibero.net',	'2016-09-27',	'52562965737',	'55548659859978',	'6678615258522',	83,	'nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing'),
(83,	'Shellie Duke',	'placerat@Nuncmauris.edu',	'2016-08-02',	'12841343332',	'42251834764438',	'6234924895228',	78,	'mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum.'),
(84,	'Isabella Chan',	'aptent@Sed.com',	'2017-08-14',	'39851944863',	'52298128278371',	'5399663619798',	83,	'lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris'),
(85,	'Montana Cox',	'libero.lacus@sit.com',	'2016-08-10',	'67965967135',	'22747135553158',	'3677333389951',	2,	'dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae'),
(86,	'Raphael Velez',	'libero.at@nislQuisque.co.uk',	'2016-04-05',	'76569519525',	'18884236781936',	'4442828971252',	33,	'hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut'),
(87,	'Dennis M. Simpson',	'nibh.sit.amet@tellus.ca',	'2016-07-10',	'12875846858',	'48657443274127',	'1371833173276',	3,	'turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula.'),
(88,	'Vivian F. Herman',	'risus.Nulla@pulvinararcu.ca',	'2016-01-20',	'78174264824',	'85896677528211',	'4639948964156',	83,	'consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent'),
(89,	'Acton Wolfe',	'justo.Praesent@In.org',	'2015-10-01',	'76676176165',	'34233539982381',	'3236178218961',	33,	'velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras'),
(90,	'Bryar M. Levy',	'id.ante@Praesenteunulla.org',	'2017-07-29',	'21682843548',	'25664565249718',	'9888586933533',	63,	'eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras'),
(91,	'Cain O. Stein',	'posuere.enim.nisl@dolorquamelementum.com',	'2016-02-24',	'99525678354',	'55352197212457',	'7864266569956',	31,	'nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla'),
(92,	'Mercedes Guthrie',	'primis.in.faucibus@gravida.co.uk',	'2017-08-04',	'14816118883',	'36268176656258',	'2537329161915',	8,	'vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget'),
(93,	'Martina Camacho',	'ullamcorper@liberomauris.net',	'2016-01-11',	'59619176565',	'41122362176458',	'4355742974823',	30,	'lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus'),
(94,	'Tashya K. Bailey',	'semper@arcuvelquam.co.uk',	'2017-07-06',	'89769775329',	'35988766256715',	'7383178499728',	21,	'lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat'),
(95,	'Camille U. Dyer',	'adipiscing@Nuncuterat.org',	'2017-03-24',	'56995272111',	'34365438295112',	'5246475335332',	97,	'Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec'),
(96,	'Rosalyn Richmond',	'tristique.senectus@tellus.co.uk',	'2016-08-20',	'92486876815',	'88177544268823',	'5353974593161',	46,	'dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque.'),
(97,	'Cherokee O. Farley',	'rhoncus@semmollisdui.co.uk',	'2016-08-27',	'99625222748',	'74424281818849',	'1417228128273',	75,	'metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum'),
(98,	'Grant V. Shepard',	'Aliquam.erat@vulputaterisus.edu',	'2015-11-09',	'43529957431',	'12549858334888',	'3246873295963',	39,	'sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam'),
(99,	'Tatiana Beck',	'sollicitudin.adipiscing@ultricesmauris.ca',	'2016-01-18',	'83352388672',	'76459824956516',	'6716882559566',	48,	'pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare,'),
(100,	'Marah J. Castro',	'sollicitudin@Quisquepurus.co.uk',	'2015-11-10',	'22628142492',	'16621482647138',	'8386163653177',	87,	'ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1,	'super',	'$2y$10$DPJQQvPAOpae23WWWVmVQ.5PsRJfUdCa/BUdu4eZWoX6Hu98aTdnq',	1,	'2016-09-15 15:57:16',	'2016-09-15 15:57:16'),
(2,	'admin',	'$2y$10$2aTDwGEtcayt859lMTuwN.Bys.5Mpmii5pIN2oQkfzYbgGtM7v9q6',	2,	'2016-09-15 15:57:28',	'2016-09-15 15:57:28'),
(3,	'manager',	'$2y$10$08jYO5pe/ib9rdJetizQZexgb6czFArx72ZZ8tp4rcGzhvgrloPLy',	3,	'2016-09-15 15:57:39',	'2016-09-15 15:57:39'),
(4,	'user',	'$2y$10$pxNdOGydRKprWn/levNz/eyoUxa/zXONDj29ReIXdCqu.l.IxjYb6',	4,	'2016-09-15 15:58:21',	'2016-09-15 15:58:21');

-- 2016-09-15 16:38:42

