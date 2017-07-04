-- CRUD PHP PDO
--
-- Creates the database
CREATE DATABASE IF NOT EXISTS `crudphppdo`
-- Creates the table
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `registro` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11;
-- Populates the table
INSERT INTO `users` (`id`, `nombre`, `email`, `registro`) VALUES
(1, 'Isra', 'israel965@yahoo.es', '2013-02-23'),
(2, 'Andrés', 'andres@mail.com', '2013-02-23'),
(3, 'Manuel', 'manuel@mail.com', '2013-02-23'),
(4, 'Vanessa', 'vanessa@mail.com', '2013-02-23'),
(5, 'Sonia', 'sonia@mail.com', '2013-02-23');
