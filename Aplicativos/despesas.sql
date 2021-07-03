SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE `despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `mes` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `receita_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `despesas` (`id`, `descricao`, `valor`, `mes`, `created`, `modified`, `receita_id`) VALUES
(1,	'Mercantil',	500,	'05/2017',	'2017-05-11',	'2017-05-15',	1),
(2,	'Condomínio',	100,	'05/2017',	'2017-05-11',	'2017-05-15',	1),
(3,	'Teste',	300,	'06/2017',	'2017-05-11',	'2017-05-11',	2);

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mes` char(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `receitas` (`id`, `descricao`, `mes`, `valor`, `created`, `modified`) VALUES
(1,	'Salário',	'05/2017',	3000,	'2017-05-11',	'2017-05-15'),
(2,	'Extra',	'05/2017',	100,	'2017-05-11',	'2017-05-15');

-- 2017-05-15 10:55:02
