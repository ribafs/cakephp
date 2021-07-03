CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `clientes` (`nome`, `email`) VALUES
('Ribamar FS',	'ribafs@gmail.com'),
('João Britu Cunha',	'joao@gmail.com'),
('Pedro Álvares',	'pedro@gmail.com'),
('Antônio',	'ant@gm.com'),
('Jorge',	'jo@df.com'),
('Cliente',	'cli@cli.com'),
('Apagar',	'pa@cli.com'),
('Apagar2',	'pa@cli.com2'),
('Apagar22',	'pa@cli.com22');

