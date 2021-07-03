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
