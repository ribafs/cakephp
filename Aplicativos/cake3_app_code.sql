CREATE SEQUENCE groups_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."groups" (
    "id" integer DEFAULT nextval('groups_id_seq') NOT NULL,
    "name" character varying(100) NOT NULL,
    "created" timestamp(0),
    "modified" timestamp(0),
    CONSTRAINT "groups_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "groups" ("id", "name", "created", "modified") VALUES
(1,	'Supers',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(2,	'Admins',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(3,	'Managers',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01'),
(4,	'Users',	'2016-08-30 21:15:01',	'2016-08-30 21:15:01');

CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "username" character varying(55) NOT NULL,
    "password" character varying(255) NOT NULL,
    "group_id" integer NOT NULL,
    "created" timestamp(0),
    "modified" timestamp(0),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "users_username_key" UNIQUE ("username"),
    CONSTRAINT "group_fk" FOREIGN KEY (group_id) REFERENCES groups(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

INSERT INTO "users" ("id", "username", "password", "group_id", "created", "modified") VALUES
(1,	'super',	'$2y$10$xYFpaipCoUJw6LmYr6SuFe/XH3w/GsiTd7DefUf1Ky3CHmkTAMDIe',	1,	'2016-09-28 20:41:02',	'2016-09-28 20:41:02'),
(2,	'admin',	'$2y$10$GYRI2Ze7sRn/65bZDdUYTexEP1bifK2guHqPmCcdAa41MTD6u1gka',	2,	'2016-09-28 20:41:12',	'2016-09-28 20:41:12'),
(3,	'manager',	'$2y$10$Fpv1fmHwJxC10/qIEPCkt.PvwcsJqYL2d4ceBHzyc9C.huSiHygM.',	3,	'2016-09-28 20:41:23',	'2016-09-28 20:41:23'),
(4,	'user',	'$2y$10$.7Nr1.zDhq69axFaPviZauKNl7Gg9pHV3E110H.bx9euPwiJDl3Au',	4,	'2016-09-28 20:41:33',	'2016-09-28 20:41:33');

