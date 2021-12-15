-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.5.10-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cinemax
CREATE DATABASE IF NOT EXISTS `cinemax` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cinemax`;

-- Volcando estructura para tabla cinemax.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ADMIN` varchar(60) NOT NULL,
  `APELLIDO_ADMIN` varchar(60) NOT NULL,
  `EMAIL_ADMIN` varchar(70) NOT NULL,
  `CELULAR_ADMIN` varchar(10) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`),
  UNIQUE KEY `EMAIL_ADMIN` (`EMAIL_ADMIN`),
  UNIQUE KEY `CELULAR_ADMIN` (`CELULAR_ADMIN`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cinemax.administrador: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`ID_ADMIN`, `NOMBRE_ADMIN`, `APELLIDO_ADMIN`, `EMAIL_ADMIN`, `CELULAR_ADMIN`, `ID_USUARIO`) VALUES
	(1, 'Fabian', 'Combita', 'fdcombita24@misena.edu.co', '3145896237', 8),
	(2, 'Daniel', 'Carrillo', 'dscarrillo37@misena.edu.co', '3194608272', 1);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Volcando estructura para tabla cinemax.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CLIENTE` varchar(60) NOT NULL,
  `APELLIDO_CLIENTE` varchar(60) NOT NULL,
  `EDAD` int(11) NOT NULL,
  `EMAIL_CLIENTE` varchar(70) NOT NULL,
  `CELULAR_CLIENTE` varchar(10) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`),
  UNIQUE KEY `EMAIL_CLIENTE` (`EMAIL_CLIENTE`),
  UNIQUE KEY `CELULAR_CLIENTE` (`CELULAR_CLIENTE`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cinemax.cliente: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE_CLIENTE`, `APELLIDO_CLIENTE`, `EDAD`, `EMAIL_CLIENTE`, `CELULAR_CLIENTE`, `ID_USUARIO`) VALUES
	(14, 'Sergio', 'Ayala', 18, 'sergioayala@gmail.com', '3172589094', 14),
	(18, 'Jaime', 'Mogollon', 40, 'jaime@gmail.com', '3114789532', 18);

/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla cinemax.pelicula
CREATE TABLE IF NOT EXISTS `pelicula` (
  `ID_PELICULA` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO_PELICULA` varchar(60) NOT NULL,
  `GENERO` varchar(60) NOT NULL,
  `AÑO_PUBLICACION` varchar(4) NOT NULL,
  `IMAGEN` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_PELICULA`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cinemax.pelicula: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
INSERT INTO `pelicula` (`ID_PELICULA`, `TITULO_PELICULA`, `GENERO`, `AÑO_PUBLICACION`, `IMAGEN`) VALUES
	(1, 'Godzilla vs. Kong', 'Accion/Ciencia Ficcion', '2021', 'godzilla-vs-kong.jpg'),
	(2, 'Tom y Jerry', 'Infantil/Comedia', '2021', 'tom_y_jerry.jpg'),
	(3, 'Los Croods 2', 'Aventura/Infantil', '2021', 'los_croods_2.jpg'),
	(4, 'Harry Potter y la Orden del Fénix', 'Suspenso/Accion/Aventura', '2007', 'harry_potter_fenix_order.jpg'),
	(5, 'Up : una aventura de altura', 'Infantil/Aventura', '2009', 'up-una-aventura-de-altura.jpeg'),
	(6, 'Monster Hunter: la cacería comienza', 'Acción/Aventura', '2020', 'monster_hunter.jpg'),
	(7, 'Resident Evil 5: la venganza', 'Acción/Terror', '2012', 'resident_evil_v.jpg'),
	(8, 'Sonic la película', 'Infantil/Comedia', '2020', 'sonic_la_pelicula.jpg'),
	(9, 'Soul', 'Infantil/Comedia', '2020', 'soul.jpg'),
	(10, 'El increíble castillo vagabundo', 'Fantasía/Aventura', '2004', 'castillo_vagabundo.jpg'),
	(11, 'Avengers: Endgame', 'Acción/Ciencia ficción', '2019', 'avengers-endgame.jpeg'),
	(12, 'Misterio a bordo', 'Comedia/Misterio', '2019', 'murder_mystery.jpg'),
	(13, 'Dragon Ball Super Broly', ' Acción/Anime', '2018', 'thumbs/images.jpg'),
	(14, 'El rey león', 'Infantil/Aventura', '2019', 'thumbs/The_Lion_King_Teaser_Poster_3_2019_Español.jpg'),
	(15, 'A mi altura', 'Comedia/Romántica', '2019', 'thumbs/0126387.jpg');
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;

-- Volcando estructura para tabla cinemax.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PELICULA` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `NUMERO_SALA` int(11) NOT NULL,
  `CODIGO_ASIENTO` int(11) NOT NULL,
  `FECHA_RESERVACION` date NOT NULL,
  `HORA_RESERVACION` time NOT NULL,
  `ESTADO_RESERVACION` enum('Activa','Completada','Cancelada') NOT NULL,
  PRIMARY KEY (`ID_RESERVA`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`),
  KEY `ID_PELICULA` (`ID_PELICULA`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`ID_PELICULA`) REFERENCES `pelicula` (`ID_PELICULA`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=577 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cinemax.reserva: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`ID_RESERVA`, `ID_PELICULA`, `ID_CLIENTE`, `NUMERO_SALA`, `CODIGO_ASIENTO`, `FECHA_RESERVACION`, `HORA_RESERVACION`, `ESTADO_RESERVACION`) VALUES
	(541, 8, 14, 36, 30, '2021-04-02', '23:26:00', 'Activa'),
	(542, 3, 18, 44, 40, '2021-04-30', '20:00:00', 'Cancelada'),
	(543, 9, 18, 88, 88, '2021-04-28', '17:00:00', 'Completada'),
	(558, 8, 14, 98, 14, '2021-04-21', '19:00:00', 'Completada'),
	(562, 5, 18, 15, 12, '2021-04-14', '12:00:00', 'Activa'),
	(563, 8, 18, 130, 130, '2021-04-21', '12:00:00', 'Activa'),
	(566, 2, 18, 15, 100, '2021-04-14', '12:00:00', 'Cancelada'),
	(573, 4, 18, 3, 3, '2021-05-18', '11:11:00', 'Cancelada'),
	(575, 3, 18, 20, 20, '2021-06-05', '19:35:00', 'Cancelada'),
	(576, 9, 18, 22, 22, '2021-06-05', '18:55:00', 'Completada');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Volcando estructura para tabla cinemax.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(70) NOT NULL,
  `CLAVE_USUARIO` varchar(100) NOT NULL,
  `TIPO_USUARIO` enum('Cliente','Admin') NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `NOMBRE_USUARIO` (`NOMBRE_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cinemax.usuario: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE_USUARIO`, `CLAVE_USUARIO`, `TIPO_USUARIO`) VALUES
	(1, 'example@gmail.com', '$2y$10$sh3v/2UJET8vdkR0KxAlb.XyCRAYl5ObyrzqFWI8nTAiQS/FyKKX.', 'Admin'),
	(8, 'fdcombita24@misena.edu.co', '$2y$10$gSWFQwIDLnfXvp96xKIiQuK0B7ynwAGsa6HOcvTE0nBodj.uIc1s2', 'Admin'),
	(14, 'sergioayala@gmail.com', '$2y$10$uSrP67TSMUCqnI4r9HCK/eHZFJWIPsozsygdFx9ScT6VLbe3K.n4K', 'Cliente'),
	(18, 'jaime@gmail.com', '$2y$10$uSrP67TSMUCqnI4r9HCK/eHZFJWIPsozsygdFx9ScT6VLbe3K.n4K', 'Cliente');

/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
