CREATE TABLE `despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `mes` char(8) NOT NULL,
  `created` DATETIME DEFAULT NULL,
  `modified` DATETIME DEFAULT NULL,
  `receita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `despesas` (`id`, `descricao`, `valor`, `mes`, `created`, `modified`, `receita_id`) VALUES
(1,	'Mercantil',	900,	'05/2017',	'2017-05-11',	'2017-05-11',	1),
(2,	'Condomínio',	120,	'05/2017',	'2017-05-11',	'2017-05-11',	1);

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `mes` char(7) NOT NULL,
  `valor` int(11) NOT NULL,
  `created` DATETIME DEFAULT NULL,
  `modified` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `receitas` (`id`, `descricao`, `mes`, `valor`, `created`, `modified`) VALUES
(1,	'Salário de Maio',	'05/2017',	5400,	'2017-05-11',	'2017-05-11'),
(2,	'Extra',	'05/2017',	600,	'2017-05-11',	'2017-05-11');
