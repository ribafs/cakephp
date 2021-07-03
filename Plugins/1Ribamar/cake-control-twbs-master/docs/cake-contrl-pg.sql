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

CREATE TABLE users (
    id serial primary key,
    username character varying(55) UNIQUE NOT NULL,
    password character varying(255) NOT NULL,
    group_id integer NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL
);

CREATE TABLE permissions (
    id serial primary key,
    group_id integer NOT NULL,
    controller character varying(50) NOT NULL,
    action character varying(100) NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL,    
    CONSTRAINT unique_key UNIQUE (group_id, controller, action)
);

CREATE TABLE servidores (
	id SERIAL PRIMARY KEY,
	nome varchar(55) NOT NULL,
	nascimento date default null, -- Requerido default null em campos data peço cake
	cpf char(11),
	fone varchar(14),
	user_id integer not null,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL,  
	observacao text
);

INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Basil Weiss','2017-02-21','25316124382','(847) 691-7205',3,'massa. Vestibulum accumsan neque et'),('Fletcher Mosley','2016-03-17','36828311247','(792) 412-3157',1,'egestas a, dui. Cras pellentesque.'),('Arden Manning','2017-02-02','39354492116','(521) 351-1780',2,'Aliquam rutrum lorem ac risus.'),('Sydney W. Charles','2016-08-05','39918219241','(333) 828-9063',1,'sem, consequat nec, mollis vitae,'),('Joan Santos','2016-01-14','58643417153','(629) 357-0427',1,'auctor velit. Aliquam nisl. Nulla'),('Brianna Figueroa','2016-03-29','61573758177','(776) 116-1550',2,'ipsum. Donec sollicitudin adipiscing ligula.'),('Glenna Carpenter','2017-08-15','68566521191','(347) 835-4983',4,'congue. In scelerisque scelerisque dui.'),('Maggy Munoz','2015-11-25','44982485471','(907) 638-1844',2,'arcu. Vestibulum ante ipsum primis'),('Jessamine Glover','2017-06-04','26315745568','(641) 935-1158',2,'facilisi. Sed neque. Sed eget'),('Colette Strong','2016-09-18','16477313322','(208) 111-4769',1,'in sodales elit erat vitae');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Katell Mann','2016-09-20','35528446563','(265) 442-0027',4,'pellentesque a, facilisis non, bibendum'),('Chancellor D. James','2016-03-08','92459815733','(783) 517-7233',4,'Nunc sollicitudin commodo ipsum. Suspendisse'),('John Berger','2017-06-21','19487147656','(920) 339-3317',4,'dolor. Donec fringilla. Donec feugiat'),('Karly Perez','2017-05-15','88657779748','(722) 968-7126',2,'Duis gravida. Praesent eu nulla'),('Connor A. Brady','2016-01-23','82213684752','(671) 844-0617',2,'sagittis augue, eu tempor erat'),('Madeson Oliver','2015-11-28','56388114571','(348) 703-9091',2,'ac facilisis facilisis, magna tellus'),('Geraldine Benton','2016-11-04','17716942886','(611) 572-9799',1,'eu tempor erat neque non'),('Allen W. Compton','2016-03-04','85748881216','(732) 352-2199',4,'risus. Donec nibh enim, gravida'),('Astra P. Madden','2016-10-16','66915472858','(355) 240-1916',2,'eu augue porttitor interdum. Sed'),('Dustin Vinson','2017-01-08','72436919536','(894) 116-6351',2,'dui. Cras pellentesque. Sed dictum.');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Delilah Glass','2016-05-16','57162266973','(813) 339-9700',2,'ac mattis ornare, lectus ante'),('Beverly Y. Lowery','2016-07-12','89173675311','(714) 529-8063',1,'purus sapien, gravida non, sollicitudin'),('Ruth S. Rowe','2016-02-23','45828477333','(347) 308-2896',1,'Mauris quis turpis vitae purus'),('Dana K. Nash','2017-01-31','38215833482','(940) 273-7045',2,'sociosqu ad litora torquent per'),('Carly Burris','2016-02-10','76874139182','(775) 923-1655',3,'risus a ultricies adipiscing, enim'),('Mufutau J. Mckay','2016-03-04','99715583782','(412) 417-2854',3,'Suspendisse aliquet molestie tellus. Aenean'),('Justina Nash','2017-05-19','55939534853','(700) 829-0676',1,'semper rutrum. Fusce dolor quam,'),('Clare M. Atkinson','2017-04-17','29213563733','(687) 739-2741',4,'dolor. Quisque tincidunt pede ac'),('Cain Fulton','2017-02-06','66257939284','(180) 235-3664',4,'Nullam feugiat placerat velit. Quisque'),('Todd I. Hill','2016-09-28','73838663264','(309) 789-6057',3,'sed, est. Nunc laoreet lectus');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Fay William','2017-01-01','81791356312','(522) 307-7080',3,'Pellentesque tincidunt tempus risus. Donec'),('Dante D. White','2017-02-26','51261335248','(473) 177-4343',1,'Integer tincidunt aliquam arcu. Aliquam'),('Craig J. Hess','2017-02-10','95773521891','(746) 186-7331',3,'posuere cubilia Curae; Donec tincidunt.'),('Rebekah T. Moran','2015-11-08','72551593222','(941) 481-8165',4,'massa lobortis ultrices. Vivamus rhoncus.'),('Brennan Mcmahon','2016-10-29','78421974149','(900) 561-9450',4,'adipiscing. Mauris molestie pharetra nibh.'),('Rahim Huffman','2016-04-10','74429962318','(247) 574-9791',2,'massa. Quisque porttitor eros nec'),('Nora A. Spears','2016-11-25','37981317528','(477) 711-1149',2,'arcu. Sed eu nibh vulputate'),('Callum S. Raymond','2017-05-12','21733612793','(620) 769-1271',3,'Phasellus at augue id ante'),('September U. Maddox','2016-04-05','33577952222','(525) 825-9018',3,'neque. Nullam nisl. Maecenas malesuada'),('Aspen Weaver','2017-09-07','87686937996','(655) 851-8071',1,'leo, in lobortis tellus justo');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Ezra Gomez','2016-06-22','33546772478','(736) 692-7951',3,'eu eros. Nam consequat dolor'),('George Z. Spence','2016-06-29','18821439885','(447) 935-7449',4,'vitae dolor. Donec fringilla. Donec'),('Byron Copeland','2017-03-26','23268885381','(537) 564-3370',1,'nunc sed pede. Cum sociis'),('Quemby Castro','2017-01-14','31876712763','(626) 202-6621',4,'fames ac turpis egestas. Fusce'),('Nayda Hopper','2016-01-27','95943862985','(935) 633-1330',1,'penatibus et magnis dis parturient'),('Tucker I. Yates','2017-02-28','44677653119','(854) 186-2024',2,'felis ullamcorper viverra. Maecenas iaculis'),('Medge G. Oneil','2017-06-05','12782992112','(371) 522-3712',1,'dignissim magna a tortor. Nunc'),('Oliver Michael','2016-03-08','66998514283','(406) 820-6265',4,'parturient montes, nascetur ridiculus mus.'),('Pearl Mathews','2015-10-17','49112271394','(145) 409-8634',3,'Morbi neque tellus, imperdiet non,'),('Adara F. Rodriquez','2016-06-09','38431417997','(781) 226-9038',1,'non massa non ante bibendum');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Sarah N. Rodgers','2016-06-16','54677715656','(989) 559-2338',1,'Proin nisl sem, consequat nec,'),('Jordan I. Logan','2015-09-24','29832816148','(321) 115-6017',4,'In scelerisque scelerisque dui. Suspendisse'),('Noel Waters','2016-10-17','79792295855','(960) 690-9995',4,'eget laoreet posuere, enim nisl'),('Zelenia F. Mcpherson','2016-08-28','84461379666','(809) 210-4382',1,'interdum ligula eu enim. Etiam'),('Ivory L. Yang','2017-02-10','53878982296','(484) 167-4027',3,'Quisque fringilla euismod enim. Etiam'),('Xenos Knight','2016-06-05','53255224426','(648) 102-5311',4,'magnis dis parturient montes, nascetur'),('Hunter D. Albert','2016-03-02','46292448386','(468) 116-8106',4,'egestas a, dui. Cras pellentesque.'),('Kai Mcpherson','2016-07-29','22993883353','(411) 467-3201',2,'In tincidunt congue turpis. In'),('Autumn V. Perkins','2016-10-24','99168269567','(638) 245-3983',4,'et nunc. Quisque ornare tortor'),('Vielka C. Ford','2017-03-23','35374726321','(131) 492-2125',1,'fringilla purus mauris a nunc.');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Sarah Gross','2015-09-25','18826945987','(784) 260-6365',2,'auctor, velit eget laoreet posuere,'),('Omar Rogers','2016-10-17','13484198316','(718) 533-2547',3,'consectetuer adipiscing elit. Etiam laoreet,'),('Keiko W. Reilly','2016-01-23','55926743948','(328) 491-9140',1,'aliquet libero. Integer in magna.'),('Cally I. Brooks','2017-06-07','93491954278','(680) 255-5258',3,'urna et arcu imperdiet ullamcorper.'),('Courtney G. Cooke','2017-03-18','39811515376','(807) 254-9214',2,'quis, tristique ac, eleifend vitae,'),('Grady Maddox','2017-03-28','43151236175','(294) 874-4494',3,'sed orci lobortis augue scelerisque'),('Lila Benson','2017-06-30','93359379697','(319) 904-3669',3,'vel pede blandit congue. In'),('Ulysses Keith','2016-06-21','67158666331','(417) 723-0219',2,'orci luctus et ultrices posuere'),('Plato Hansen','2016-11-22','43657786569','(314) 927-8912',1,'faucibus leo, in lobortis tellus'),('India Cardenas','2016-07-16','83659131111','(711) 293-3124',3,'mollis. Integer tincidunt aliquam arcu.');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Shelley Foreman','2016-03-21','38412181358','(119) 174-1110',1,'Nulla semper tellus id nunc'),('Gavin B. Powers','2016-07-22','63876197572','(905) 335-0646',3,'vitae erat vel pede blandit'),('Dominique Holden','2016-05-02','13832414693','(372) 528-7014',1,'lectus, a sollicitudin orci sem'),('Madaline Holder','2016-11-15','14841174184','(738) 137-0233',1,'varius orci, in consequat enim'),('Denton I. Glover','2017-06-04','41124749437','(429) 821-8168',4,'Integer mollis. Integer tincidunt aliquam'),('Ali J. Martinez','2015-09-25','32276974696','(805) 887-8850',4,'at lacus. Quisque purus sapien,'),('Barry Beard','2017-02-25','35198621664','(969) 767-4285',1,'metus. In lorem. Donec elementum,'),('Walter V. Bernard','2016-02-14','58825485236','(801) 887-3461',3,'pretium neque. Morbi quis urna.'),('Cyrus B. Mathews','2016-05-03','82795453229','(926) 892-9713',3,'leo. Cras vehicula aliquet libero.'),('Buckminster I. Rivas','2016-09-02','91188175374','(509) 357-6143',1,'nisl arcu iaculis enim, sit');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Hunter Horne','2015-10-31','41682523417','(171) 210-0124',4,'fermentum fermentum arcu. Vestibulum ante'),('Julie Patton','2015-11-18','82919595677','(447) 204-8365',1,'dapibus ligula. Aliquam erat volutpat.'),('Katell Romero','2017-07-02','84249238964','(553) 765-2590',4,'Nam nulla magna, malesuada vel,'),('Noel Wiley','2016-08-02','54116414965','(823) 482-0263',2,'interdum enim non nisi. Aenean'),('Aquila B. Hyde','2017-07-30','68391761283','(582) 527-2686',1,'Cras pellentesque. Sed dictum. Proin'),('April Deleon','2017-05-11','94696962835','(185) 799-1898',1,'Cras dictum ultricies ligula. Nullam'),('Hakeem Q. Delacruz','2017-07-24','36167735465','(956) 670-2543',1,'lorem eu metus. In lorem.'),('Hadassah R. Dorsey','2016-09-10','67749882436','(540) 983-8427',2,'ultricies ligula. Nullam enim. Sed'),('Ivan Gilbert','2015-09-17','81486123823','(175) 766-3955',1,'Aliquam erat volutpat. Nulla facilisis.'),('Cally N. Perez','2016-04-21','26996769439','(516) 583-7848',3,'odio vel est tempor bibendum.');
INSERT INTO servidores (nome,nascimento,cpf,fone,user_id,observacao) VALUES ('Noah Howell','2017-03-02','67984522195','(505) 864-4741',4,'metus sit amet ante. Vivamus'),('Chandler Perkins','2016-06-14','22748559225','(697) 680-5712',3,'Sed neque. Sed eget lacus.'),('Bethany Gonzalez','2017-03-28','44678417244','(631) 269-0500',1,'nec, mollis vitae, posuere at,'),('Erasmus Preston','2016-09-03','81958328284','(275) 842-8721',4,'eu tempor erat neque non'),('Allistair Orr','2017-06-09','53618618127','(847) 936-3764',1,'sem. Nulla interdum. Curabitur dictum.'),('Erin Ford','2016-02-22','28761382319','(910) 177-1858',2,'vulputate, risus a ultricies adipiscing,'),('Tobias I. Chandler','2017-09-02','82767282278','(977) 295-1582',2,'Integer vitae nibh. Donec est'),('Jolene J. Cantrell','2016-10-19','93966274656','(731) 909-6112',2,'dictum eleifend, nunc risus varius'),('Garth U. Chandler','2016-12-23','59217449724','(569) 315-0992',2,'per conubia nostra, per inceptos'),('Cameran U. Garza','2015-12-18','58359499965','(807) 331-7038',3,'nunc sed libero. Proin sed');

