CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL,
  `nome` char(45) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `cpf` char(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
);

INSERT INTO `clientes` (`id`, `nome`, `email`, `data_nasc`, `cpf`, `user_id`) VALUES
(1, 'Erin Pate Skinner', 'dolor.vitae.dolor@mollisvitaeposuere.ca', '2013-10-07', '74426302285', 1),
(2, 'Leonard Martinez Hays', 'dignissim.magna.a@dolorvitae.org', '2012-08-22', '75278965048', 1),
(3, 'Aladdin Curry French', 'eu.augue@eutemporerat.org', '2012-10-28', '10376915676', 1),
(4, 'Chloe Macdonald Dalton', 'parturient.montes@Mauris.ca', '2013-05-12', '64444679077', 1),
(5, 'Mallory Sweet Strong', 'lorem@fringillaporttitor.ca', '2013-05-19', '15687101505', 1),
(6, 'Jermaine Pierce Woodward', 'mi.pede.nonummy@molestiearcu.ca', '2013-03-22', '36712502261', 1),
(7, 'Bell Raymond Pruitt', 'dignissim.tempor.arcu@nuncac.org', '2013-03-09', '64629428663', 1),
(8, 'Lydia Bell Whitfield', 'Sed@semper.com', '2013-12-02', '41962749289', 1),
(9, 'Tad Mason Graham', 'elit.erat@vestibulum.edu', '2012-06-08', '05642745964', 1),
(10, 'Felix Bradshaw Mccray', 'dui@elitCurabitursed.edu', '2013-09-16', '82071617437', 2),
(11, 'Idona Jensen Garrett', 'sem@Crasvulputate.com', '2014-01-08', '07941004794', 2),
(12, 'Wayne Ray Padilla', 'luctus.felis.purus@nonjustoProin.org', '2014-04-03', '60934465323', 2),
(13, 'Nelle Finch Cantu', 'placerat.eget@Donec.ca', '2012-05-29', '64704574060', 2),
(14, 'Maite Emerson Best', 'dui.augue@quisdiam.com', '2014-04-01', '04531857574', 2),
(15, 'Jada Holman Wilkins', 'dolor@tristiquealiquet.com', '2013-01-11', '88994190741', 2),
(16, 'Beverly Lane Lindsay', 'et.euismod@ametfaucibusut.com', '2013-10-22', '40194697135', 2),
(17, 'Hayden Clayton Foreman', 'enim@aliquamenimnec.edu', '2013-04-16', '72583040904', 2),
(18, 'Hadassah Leonard Key', 'dui.quis@augueidante.com', '2013-04-07', '72626859924', 2),
(19, 'Adrian Ballard Peters', 'enim.Curabitur@faucibus.com', '2012-07-13', '50918748283', 2),
(20, 'Phyllis Richmond Wynn', 'eget.laoreet@justoeuarcu.org', '2013-07-01', '62712888794', 2),
(21, 'Amelia Baird Barrera', 'id.ante@dignissim.org', '2012-06-09', '12106836368', 2),
(22, 'Whitney Mack Lamb', 'quam.Curabitur.vel@PraesentluctusCurabitur.org', '2012-06-26', '52403407001', 2),
(23, 'Myra Mcmahon Valentine', 'ac.mi@fringillami.edu', '2012-07-27', '42961419194', 2);

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(11) NOT NULL,
  `group_name` char(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(100) NOT NULL
);

INSERT INTO `privileges` (`id`, `group_name`, `controller`, `action`) VALUES
(1, 'Admins', 'Groups', 'add'),
(2, 'Admins', 'Groups', 'delete'),
(3, 'Admins', 'Groups', 'edit'),
(4, 'Admins', 'Groups', 'index'),
(5, 'Admins', 'Groups', 'view'),
(6, 'Admins', 'Privileges', 'add'),
(7, 'Admins', 'Privileges', 'delete'),
(8, 'Admins', 'Privileges', 'edit'),
(9, 'Admins', 'Privileges', 'index'),
(10, 'Admins', 'Privileges', 'view'),
(11, 'Admins', 'Users', 'add'),
(12, 'Admins', 'Users', 'delete'),
(13, 'Admins', 'Users', 'edit'),
(14, 'Admins', 'Users', 'index'),
(15, 'Admins', 'Users', 'view');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `privilege` (`group_name`,`controller`,`action`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

