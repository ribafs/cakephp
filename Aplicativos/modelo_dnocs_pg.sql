CREATE TABLE IF NOT EXISTS groups (
  id serial primary key,
  name varchar(100) NOT NULL,
  created timestamp,
  modified timestamp
);

INSERT INTO groups (id,name, created, modified) VALUES (1,'Supers',now(),now());
INSERT INTO groups (id,name, created, modified) VALUES (2,'Admins',now(),now());
INSERT INTO groups (id,name, created, modified) VALUES (3,'Managers',now(),now());
INSERT INTO groups (id,name, created, modified) VALUES (4,'Users',now(),now());

CREATE TABLE IF NOT EXISTS users (
  id serial primary key,
  username varchar(255) NOT NULL UNIQUE,
  password char(255) NOT NULL,
  group_id int NOT NULL,
  created timestamp,
  modified timestamp
);

CREATE TABLE IF NOT EXISTS permissions (
  id serial primary key,
  group_id int NOT NULL,
  controller varchar(50) NOT NULL,
  action varchar(100) NOT NULL,
  created timestamp,
  modified timestamp,  
  UNIQUE (group_id,controller,action)
);


