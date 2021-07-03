CREATE TABLE groups (
    id serial primary key,
    name character varying(100) NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL
);

INSERT INTO groups VALUES (1, 'Supers', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
INSERT INTO groups VALUES (2, 'Admins', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
INSERT INTO groups VALUES (3, 'Managers', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
INSERT INTO groups VALUES (4, 'Users', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
ALTER SEQUENCE "groups_id_seq" RESTART WITH 5;

CREATE TABLE users (
    id serial primary key,
    username character varying(55) UNIQUE NOT NULL,
    password character varying(255) NOT NULL,
    group_id integer NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL,
    constraint group_fk foreign key (group_id) references groups(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO users VALUES (1, 'super', '$2y$10$xYFpaipCoUJw6LmYr6SuFe/XH3w/GsiTd7DefUf1Ky3CHmkTAMDIe', 1, '2016-09-28 20:41:02', '2016-09-28 20:41:02');
INSERT INTO users VALUES (2, 'admin', '$2y$10$GYRI2Ze7sRn/65bZDdUYTexEP1bifK2guHqPmCcdAa41MTD6u1gka', 2, '2016-09-28 20:41:12', '2016-09-28 20:41:12');
INSERT INTO users VALUES (3, 'manager', '$2y$10$Fpv1fmHwJxC10/qIEPCkt.PvwcsJqYL2d4ceBHzyc9C.huSiHygM.', 3, '2016-09-28 20:41:23', '2016-09-28 20:41:23');
INSERT INTO users VALUES (4, 'user', '$2y$10$.7Nr1.zDhq69axFaPviZauKNl7Gg9pHV3E110H.bx9euPwiJDl3Au', 4, '2016-09-28 20:41:33', '2016-09-28 20:41:33');
ALTER SEQUENCE "users_id_seq" RESTART WITH 5;

CREATE TABLE permissions (
    id serial primary key,
    group_id integer NOT NULL,
    controller character varying(50) NOT NULL,
    action character varying(100) NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL,    
    CONSTRAINT unique_key UNIQUE (group_id, controller, action)
);

CREATE TABLE customers (
  id SERIAL PRIMARY KEY,
  name varchar(55) default NULL,
  birthday date default null,
  phone varchar(15) default NULL,
  user_id int NOT NULL,
  observation TEXT default NULL,
  created timestamp(0) without time zone DEFAULT NULL,
  modified timestamp(0) without time zone DEFAULT NULL,    
  constraint user_fk foreign key (user_id) references users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Eleanor Holden','2017-03-22','(314) 415-4663',2,'inceptos hymenaeos. Mauris ut quam'),('Lee D. Baker','2017-04-20','(126) 696-6268',1,'nonummy ultricies ornare, elit elit'),('Lance Mercado','2016-06-04','(121) 656-3365',1,'elit pede, malesuada vel, venenatis'),('Charlotte Harding','2017-05-05','(307) 714-9319',2,'nec, cursus a, enim. Suspendisse'),('Kirk S. Hodge','2016-06-14','(249) 235-0027',1,'lectus pede et risus. Quisque'),('Medge Petersen','2016-01-28','(168) 508-3620',1,'nec enim. Nunc ut erat.'),('Tyler Sawyer','2015-11-28','(544) 621-3518',2,'Donec non justo. Proin non'),('Cheyenne Hebert','2017-04-06','(232) 690-1422',3,'tincidunt, neque vitae semper egestas,'),('Gage Ross','2017-05-10','(605) 454-4657',1,'dapibus gravida. Aliquam tincidunt, nunc'),('Stephanie C. Wynn','2017-02-24','(864) 432-9931',2,'montes, nascetur ridiculus mus. Proin');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Rudyard R. Leonard','2017-05-16','(865) 454-0888',3,'feugiat metus sit amet ante.'),('Deirdre K. Pruitt','2017-06-09','(798) 341-1585',1,'tristique neque venenatis lacus. Etiam'),('Rinah Waters','2016-01-04','(173) 370-0983',3,'rutrum, justo. Praesent luctus. Curabitur'),('Ingrid N. Garrison','2017-03-02','(699) 110-3529',2,'Duis ac arcu. Nunc mauris.'),('Yolanda Terry','2017-09-02','(121) 216-3420',1,'Quisque ornare tortor at risus.'),('Mannix C. Compton','2015-11-09','(556) 161-6269',1,'facilisis non, bibendum sed, est.'),('Keiko J. Harmon','2016-06-19','(784) 164-2804',2,'primis in faucibus orci luctus'),('Evangeline S. Walton','2015-12-01','(842) 819-5881',2,'est tempor bibendum. Donec felis'),('Magee T. Castaneda','2016-12-04','(103) 816-0404',3,'auctor, velit eget laoreet posuere,'),('Zenia Mcleod','2016-05-07','(158) 320-6301',3,'non dui nec urna suscipit');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Amy R. Burch','2016-02-20','(964) 966-9900',2,'libero. Integer in magna. Phasellus'),('Sybil Sharp','2017-02-10','(858) 397-9819',4,'tempor diam dictum sapien. Aenean'),('Adria Gay','2015-10-02','(855) 606-0991',1,'ullamcorper. Duis cursus, diam at'),('Guinevere U. Wilkinson','2016-10-19','(834) 348-9206',4,'interdum ligula eu enim. Etiam'),('Ethan V. Hebert','2015-12-23','(836) 498-8772',1,'non leo. Vivamus nibh dolor,'),('Caleb Pate','2016-04-10','(790) 210-4042',3,'enim. Nunc ut erat. Sed'),('Jaime Estes','2017-03-22','(965) 358-3212',2,'dolor. Fusce feugiat. Lorem ipsum'),('Nichole Warren','2017-04-08','(474) 991-9133',4,'non quam. Pellentesque habitant morbi'),('Aubrey Cash','2017-04-08','(900) 205-1626',1,'Phasellus dolor elit, pellentesque a,'),('Kellie Bradshaw','2016-02-21','(984) 254-4034',2,'semper, dui lectus rutrum urna,');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Glenna Powell','2017-09-13','(887) 662-4995',3,'facilisis, magna tellus faucibus leo,'),('Aileen Jacobson','2016-03-14','(277) 489-2777',4,'velit. Cras lorem lorem, luctus'),('Valentine Booker','2016-01-02','(290) 859-7743',4,'Duis at lacus. Quisque purus'),('Elmo Hull','2016-01-19','(534) 761-8258',1,'sapien, gravida non, sollicitudin a,'),('Harlan Kane','2016-09-04','(400) 613-6079',2,'dolor. Fusce feugiat. Lorem ipsum'),('Ora P. Goff','2015-11-18','(840) 516-3185',2,'malesuada vel, venenatis vel, faucibus'),('Melissa Golden','2016-10-15','(565) 789-3022',1,'Fusce mi lorem, vehicula et,'),('Imogene Alford','2016-08-10','(343) 326-2274',3,'feugiat. Lorem ipsum dolor sit'),('Jerry Nielsen','2016-05-12','(799) 966-6978',2,'ut, pharetra sed, hendrerit a,'),('Zeph West','2017-06-27','(721) 816-4129',4,'natoque penatibus et magnis dis');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Dana Eaton','2017-08-21','(591) 490-5605',1,'nisl. Maecenas malesuada fringilla est.'),('Isaiah S. Peck','2016-02-11','(780) 271-4001',4,'malesuada. Integer id magna et'),('Hollee I. Henry','2017-09-17','(510) 643-4036',2,'dui, semper et, lacinia vitae,'),('Danielle F. Baker','2016-09-13','(938) 501-3188',2,'ac, fermentum vel, mauris. Integer'),('Owen K. Robles','2017-05-09','(949) 943-8572',4,'Duis volutpat nunc sit amet'),('Alyssa Garner','2017-09-06','(556) 802-9355',3,'neque tellus, imperdiet non, vestibulum'),('Jamalia Lindsey','2016-11-07','(418) 145-4204',2,'vestibulum. Mauris magna. Duis dignissim'),('Yvonne Q. Horton','2017-07-29','(122) 166-2694',3,'a, malesuada id, erat. Etiam'),('Rhea Lloyd','2016-05-15','(673) 805-8608',4,'odio, auctor vitae, aliquet nec,'),('Medge R. Cabrera','2017-04-04','(200) 178-9287',2,'et, lacinia vitae, sodales at,');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Hyatt Z. Dillard','2017-05-08','(129) 808-4691',4,'Etiam ligula tortor, dictum eu,'),('Quentin Houston','2016-02-29','(667) 743-0864',2,'Donec tempor, est ac mattis'),('Vernon Levy','2016-03-01','(527) 585-1959',1,'dui. Cras pellentesque. Sed dictum.'),('Blair Lamb','2017-08-03','(531) 374-8997',4,'enim. Nunc ut erat. Sed'),('Lara Decker','2016-04-07','(147) 687-6682',3,'libero. Proin sed turpis nec'),('Amber Vargas','2017-04-11','(471) 874-0289',1,'tellus, imperdiet non, vestibulum nec,'),('Regina Page','2015-10-08','(195) 973-3154',2,'penatibus et magnis dis parturient'),('Dorian B. Oliver','2015-10-08','(271) 819-1634',4,'nunc nulla vulputate dui, nec'),('Aiko Gilliam','2016-03-01','(853) 680-8558',4,'interdum. Sed auctor odio a'),('Dustin Ayala','2017-01-04','(667) 467-9066',4,'erat vel pede blandit congue.');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Beau Garza','2017-09-02','(624) 977-6552',2,'Lorem ipsum dolor sit amet,'),('Nissim O. Massey','2016-07-27','(605) 149-0552',1,'sit amet orci. Ut sagittis'),('Tate J. Weaver','2016-04-08','(202) 592-9160',4,'eros. Proin ultrices. Duis volutpat'),('Wynne T. Hewitt','2016-10-28','(920) 545-5193',2,'mi. Aliquam gravida mauris ut'),('Isaiah Velez','2016-06-19','(321) 191-4193',3,'montes, nascetur ridiculus mus. Proin'),('Coby Browning','2017-07-12','(960) 698-8565',2,'eleifend nec, malesuada ut, sem.'),('Keegan Y. Fields','2015-12-22','(149) 151-7953',1,'tincidunt nibh. Phasellus nulla. Integer'),('Alexandra O. Blanchard','2017-05-10','(219) 595-0064',3,'nunc sed pede. Cum sociis'),('Knox Whitley','2016-10-07','(858) 118-6054',4,'a feugiat tellus lorem eu'),('Kevin G. Lowe','2016-10-11','(256) 492-8021',1,'Vivamus euismod urna. Nullam lobortis');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Francis H. Goff','2015-12-23','(542) 565-3239',2,'magna. Sed eu eros. Nam'),('Damian Guerrero','2016-02-11','(854) 966-6397',4,'auctor odio a purus. Duis'),('Travis Y. Gardner','2017-08-13','(582) 722-9998',3,'viverra. Donec tempus, lorem fringilla'),('Chandler Reeves','2015-12-05','(822) 693-8054',2,'Fusce feugiat. Lorem ipsum dolor'),('Leslie H. Mosley','2017-01-15','(387) 315-4091',4,'mollis. Integer tincidunt aliquam arcu.'),('Akeem Y. Bauer','2016-09-27','(276) 975-5480',4,'imperdiet dictum magna. Ut tincidunt'),('Nell K. Lamb','2016-08-14','(254) 732-4651',2,'Cras vehicula aliquet libero. Integer'),('Moses C. Peters','2015-10-19','(128) 436-6380',4,'iaculis aliquet diam. Sed diam'),('Kane Weiss','2017-02-05','(474) 848-3564',4,'turpis. Aliquam adipiscing lobortis risus.'),('Denise Q. Lee','2016-11-23','(496) 908-2997',2,'Aenean euismod mauris eu elit.');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Jeanette G. Fields','2017-09-10','(717) 327-0665',4,'lobortis ultrices. Vivamus rhoncus. Donec'),('Keegan V. Valdez','2016-08-18','(641) 561-9366',1,'Integer in magna. Phasellus dolor'),('Freya S. Ryan','2016-11-29','(449) 608-0666',2,'vitae, aliquet nec, imperdiet nec,'),('Hammett Shepherd','2016-07-20','(175) 278-3040',2,'magna sed dui. Fusce aliquam,'),('Jamal Berg','2016-01-08','(312) 491-4751',4,'amet diam eu dolor egestas'),('Holmes R. Fulton','2017-06-16','(794) 587-2607',2,'porttitor scelerisque neque. Nullam nisl.'),('Tarik Mcneil','2016-02-10','(295) 319-2198',3,'facilisis lorem tristique aliquet. Phasellus'),('Athena Berg','2016-05-07','(481) 833-4099',1,'lorem tristique aliquet. Phasellus fermentum'),('Deanna P. Henderson','2016-07-15','(521) 341-5096',4,'egestas. Aliquam nec enim. Nunc'),('Daria Russell','2016-05-16','(462) 477-3620',3,'eleifend. Cras sed leo. Cras');
INSERT INTO customers (name,birthday,phone,user_id,observation) VALUES ('Cherokee W. Vega','2015-11-04','(675) 675-8402',2,'rutrum lorem ac risus. Morbi'),('Janna K. Pena','2017-07-25','(222) 486-2308',1,'elit. Curabitur sed tortor. Integer'),('Dustin I. Fox','2016-03-18','(646) 541-2714',4,'cubilia Curae Donec tincidunt. Donec'),('Irma W. Travis','2017-08-21','(616) 719-1091',2,'ante ipsum primis in faucibus'),('Damon Nieves','2016-08-23','(315) 372-0961',2,'in, cursus et, eros. Proin'),('Yoshi Hampton','2017-02-19','(741) 928-6615',4,'eget metus. In nec orci.'),('Ori Mullins','2016-10-16','(982) 272-7295',1,'dui, in sodales elit erat'),('Sacha U. Rose','2016-11-30','(590) 267-2957',2,'tincidunt pede ac urna. Ut'),('Leonard Galloway','2016-06-11','(862) 219-3397',3,'Cras vehicula aliquet libero. Integer'),('Tobias H. Montoya','2016-03-05','(608) 398-6541',1,'Donec felis orci, adipiscing non,');

CREATE TABLE products (
  id SERIAL PRIMARY KEY,
  name varchar(55) default NULL,
  unity varchar(5),
  register date,
  user_id int NOT NULL,
  customer_id int NOT NULL,
  created timestamp(0) without time zone DEFAULT NULL,
  modified timestamp(0) without time zone DEFAULT NULL,    
  constraint user2_fk foreign key (user_id) references users(id) ON DELETE CASCADE ON UPDATE CASCADE,
  constraint customer2_fk foreign key (customer_id) references customers(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('pede.','HEKFJ','2016-01-09',1,66),('mi','JKSYT','2016-03-18',4,89),('ullamcorper,','ZCWOW','2016-05-13',2,82),('a','MJVTU','2016-05-16',4,36),('sem.','TYBMA','2017-04-01',4,77),('a','UUOWJ','2017-06-09',2,100),('Nulla','HPLDY','2015-11-15',4,95),('quam,','KESCQ','2017-09-16',1,36),('quis','EMKEY','2016-05-18',4,68),('natoque','QHKSV','2017-02-17',4,39);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('urna.','GPMIZ','2016-02-06',3,89),('placerat.','YRWAV','2016-02-25',4,20),('molestie.','AWQUZ','2015-11-15',3,43),('ipsum','TSCYJ','2017-01-31',3,17),('a,','BMETE','2016-06-09',3,9),('ante','HZBIB','2016-05-23',2,8),('sed','WXKUC','2016-01-10',3,10),('nunc','XQNXL','2016-03-01',1,90),('tristique','AJDKE','2017-04-06',1,82),('orci,','ZEHXC','2017-03-13',1,82);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('eget','AKEPX','2017-09-21',3,86),('euismod','OPPBC','2016-02-08',3,21),('ridiculus','AMFBI','2016-05-03',4,13),('Proin','HZAUF','2016-03-13',4,60),('urna','EZKDK','2016-07-12',3,93),('ad','CUROE','2015-12-06',3,30),('Aliquam','RWNCL','2017-02-04',1,54),('semper','HTXGY','2016-03-21',1,36),('elementum,','YPSXR','2017-01-24',3,36),('Duis','ZMHUP','2017-04-09',1,50);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('aliquam','JEWNV','2016-06-16',1,98),('mauris,','LBECD','2017-05-29',3,46),('mauris','QHZYQ','2015-12-06',3,86),('dis','LHSEC','2017-06-04',1,72),('Donec','RXEVP','2017-06-12',1,53),('natoque','CFAVF','2016-06-08',1,57),('odio.','IMLYM','2016-10-14',2,24),('bibendum','GHUDP','2017-02-17',3,43),('arcu.','IRZSE','2016-10-09',4,11),('aliquam,','XEEJY','2016-04-12',1,32);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('Praesent','NYZJL','2017-06-26',3,56),('sodales.','EQHQK','2016-10-19',3,80),('Aliquam','GSNQW','2017-03-05',2,89),('sem,','RDZRK','2016-01-26',4,68),('sed','EHQFP','2017-08-15',1,54),('sociis','GFQBA','2016-04-01',4,82),('libero','FFUCU','2015-12-23',2,14),('ipsum','YEBVB','2017-08-30',3,73),('euismod','TYGGI','2017-03-01',1,63),('id','TBLCH','2015-12-14',4,7);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('et','PACNT','2016-06-26',2,45),('vitae','AQISB','2016-08-26',4,39),('Phasellus','XLPCS','2016-08-01',2,90),('et','HAIZY','2016-08-23',1,45),('id','XEQJB','2016-02-08',2,78),('eu','DZAZF','2016-12-21',3,94),('sem','PBCZB','2015-11-11',2,74),('accumsan','KMLYC','2016-01-28',1,46),('aliquet','QZAYB','2017-09-08',2,6),('magna','XWJYJ','2017-04-15',4,9);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('Fusce','WPXAZ','2016-02-13',4,32),('Nunc','ICPLK','2016-05-14',3,20),('mollis','EKDQS','2017-07-25',3,91),('sagittis.','OQKOD','2017-03-06',3,65),('Aenean','UUUJB','2016-12-19',2,82),('ut','FCPNW','2017-08-31',1,18),('lacinia','AOXML','2017-05-08',2,46),('erat.','EBUIM','2016-10-04',2,74),('Curabitur','TPRPQ','2016-05-16',4,97),('facilisis,','ANSTQ','2016-07-28',4,25);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('mattis.','NMFRE','2016-04-24',3,19),('erat,','MEDBH','2016-04-30',4,21),('commodo','YHXGG','2016-12-14',3,80),('nec','OAGLY','2016-10-20',4,93),('imperdiet','OOLWR','2016-12-12',1,27),('Duis','AVAUF','2017-04-12',4,70),('magna.','AJDKH','2016-04-23',4,80),('lacinia','ISKGA','2016-04-01',2,55),('amet','HMRZC','2016-06-07',4,7),('Nulla','UGUYQ','2017-07-28',1,95);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('orci','VOBYE','2016-03-05',2,60),('arcu','TSFKI','2016-12-30',1,99),('Proin','GZUYT','2016-02-05',4,74),('ut','BUDVC','2017-01-04',1,100),('dolor','LFRKS','2015-11-09',3,34),('Duis','WKIHJ','2016-10-08',3,14),('sed','JYMCM','2017-06-11',3,54),('ipsum','RMCGD','2017-06-24',2,98),('scelerisque','LTVIG','2016-05-06',3,61),('Proin','APDAQ','2016-08-14',2,100);
INSERT INTO products (name,unity,register,user_id,customer_id) VALUES ('pretium','EFSXB','2017-02-02',4,92),('arcu','FKAXS','2017-02-25',1,71),('justo','QMSCV','2016-09-25',4,42),('odio','FTWUM','2015-09-28',2,22),('Quisque','ZAPTZ','2016-02-01',2,63),('montes,','YLEWD','2015-11-09',1,41),('Aliquam','RSWLP','2016-02-25',4,98),('urna','KYZTN','2016-09-13',3,98),('tellus','AMNJG','2016-06-17',1,20),('mauris.','KKZBB','2016-10-26',2,24);

CREATE TABLE product_items (
  id SERIAL PRIMARY KEY,
  product_id int NOT NULL,
  quantity int NULL,
  price numeric(6,2) default NULL,
  created timestamp(0) without time zone DEFAULT NULL,
  modified timestamp(0) without time zone DEFAULT NULL,    
  constraint product_fk foreign key (product_id) references products(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO product_items (product_id,quantity,price) VALUES (85,5,'35.05'),(90,12,'65.34'),(100,13,'75.71'),(26,9,'98.73'),(78,12,'84.09'),(55,9,'14.19'),(44,4,'8.07'),(65,20,'63.28'),(60,2,'48.33'),(35,18,'34.10');
INSERT INTO product_items (product_id,quantity,price) VALUES (22,12,'15.71'),(1,4,'73.00'),(60,15,'62.25'),(95,2,'48.73'),(100,20,'44.65'),(30,19,'3.64'),(98,1,'25.70'),(83,5,'17.85'),(48,7,'27.58'),(64,19,'91.59');
INSERT INTO product_items (product_id,quantity,price) VALUES (27,9,'60.22'),(57,9,'32.68'),(13,19,'56.42'),(36,2,'19.23'),(75,9,'8.52'),(2,1,'47.87'),(62,5,'51.37'),(39,4,'30.03'),(57,3,'82.15'),(14,11,'22.28');
INSERT INTO product_items (product_id,quantity,price) VALUES (90,17,'74.52'),(98,11,'79.19'),(14,14,'20.34'),(34,4,'68.66'),(53,7,'5.19'),(37,8,'97.86'),(33,11,'56.28'),(6,7,'71.00'),(95,15,'17.18'),(13,10,'79.93');
INSERT INTO product_items (product_id,quantity,price) VALUES (63,20,'9.62'),(12,14,'15.87'),(72,5,'91.75'),(31,10,'31.33'),(68,5,'28.14'),(98,4,'57.80'),(2,1,'78.90'),(75,13,'88.42'),(83,12,'17.77'),(100,19,'30.66');
INSERT INTO product_items (product_id,quantity,price) VALUES (77,8,'67.12'),(52,18,'85.01'),(49,15,'31.80'),(16,8,'55.53'),(82,8,'89.96'),(100,8,'91.69'),(59,15,'43.30'),(52,11,'84.63'),(53,15,'81.58'),(46,3,'11.97');
INSERT INTO product_items (product_id,quantity,price) VALUES (23,8,'72.47'),(47,14,'71.57'),(99,9,'87.27'),(92,3,'19.33'),(67,10,'79.41'),(89,4,'22.34'),(67,6,'3.82'),(74,5,'46.62'),(37,6,'36.77'),(62,16,'77.35');
INSERT INTO product_items (product_id,quantity,price) VALUES (71,5,'60.01'),(10,18,'42.61'),(52,1,'10.18'),(37,17,'14.57'),(91,12,'63.87'),(10,13,'77.84'),(50,12,'57.62'),(100,12,'41.58'),(67,2,'53.32'),(50,5,'78.26');
INSERT INTO product_items (product_id,quantity,price) VALUES (98,8,'67.31'),(9,1,'37.87'),(4,3,'95.86'),(33,12,'97.47'),(20,13,'58.90'),(52,9,'39.05'),(78,15,'42.18'),(5,14,'42.60'),(89,6,'31.21'),(97,9,'84.61');
INSERT INTO product_items (product_id,quantity,price) VALUES (4,11,'11.12'),(30,1,'69.66'),(53,17,'34.59'),(52,10,'76.69'),(100,13,'73.39'),(41,10,'44.19'),(29,7,'60.68'),(61,6,'32.43'),(97,3,'43.18'),(76,20,'67.98');
