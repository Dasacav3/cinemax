-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para cinemax
CREATE DATABASE IF NOT EXISTS `cinemax` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cinemax.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cinemax.cliente: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE_CLIENTE`, `APELLIDO_CLIENTE`, `EDAD`, `EMAIL_CLIENTE`, `CELULAR_CLIENTE`, `ID_USUARIO`) VALUES
	(1, 'Daniel Santiago', 'Velasquez', 17, 'dscv3719@gmail.com', '3194608272', 1),
	(8, 'Fabian', 'Combita', 18, 'fdcombita24@misena.edu.co', '3114308741', 8),
	(12, 'Jeison', 'Prieto', 18, 'japs@gmail.com', '3022470908', 12),
	(13, 'Alejandra', 'Niño', 23, 'aleja14@gmail.com', '3208099556', 13),
	(14, 'Sergio', 'Ayala', 18, 'sergioayala@gmail.com', '3172589094', 14),
	(15, 'Jairo', 'Poveda', 20, 'jairopoveda@gmail.com', '3197364101', 15);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla cinemax.pelicula
CREATE TABLE IF NOT EXISTS `pelicula` (
  `ID_PELICULA` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO_PELICULA` varchar(60) NOT NULL,
  `GENERO` varchar(60) NOT NULL,
  `AÑO_PUBLICACION` varchar(4) NOT NULL,
  PRIMARY KEY (`ID_PELICULA`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cinemax.pelicula: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
INSERT INTO `pelicula` (`ID_PELICULA`, `TITULO_PELICULA`, `GENERO`, `AÑO_PUBLICACION`) VALUES
	(1, 'Godzilla vs. Kong', 'Accion/Ciencia Ficcion', '2021'),
	(2, 'Tom y Jerry', 'Infantil/Comedia', '2021'),
	(3, 'Los Croods 2', 'Aventura/Infantil', '2021'),
	(4, 'Harry Potter y la Orden del Fénix', 'Suspenso/Accion/Aventura', '2007'),
	(5, 'Up : una aventura de altura', 'Infantil/Aventura', '2009'),
	(6, 'Monster Hunter: la cacería comienza', 'Acción/Aventura', '2020'),
	(7, 'Resident Evil 5: la venganza', 'Acción/Terror', '2012'),
	(8, 'Sonic la película', 'Infantil/Comedia', '2020'),
	(9, 'Soul', 'Infantil/Comedia', '2020'),
	(10, 'El increíble castillo vagabundo', 'Fantasía/Aventura', '2004'),
	(11, 'Avengers: Endgame', 'Acción/Ciencia ficción', '2019'),
	(12, 'Misterio a bordo', 'Comedia/Misterio', '2019');
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
) ENGINE=InnoDB AUTO_INCREMENT=444 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cinemax.reserva: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`ID_RESERVA`, `ID_PELICULA`, `ID_CLIENTE`, `NUMERO_SALA`, `CODIGO_ASIENTO`, `FECHA_RESERVACION`, `HORA_RESERVACION`, `ESTADO_RESERVACION`) VALUES
	(35, 2, 1, 30, 45, '2021-03-30', '16:25:00', 'Activa'),
	(38, 11, 1, 30, 40, '2021-03-30', '17:25:00', 'Activa'),
	(65, 10, 1, 21, 14, '2021-03-30', '12:48:00', 'Activa'),
	(66, 1, 1, 21, 10, '2021-03-23', '12:46:00', 'Activa'),
	(68, 12, 1, 24, 21, '2021-03-22', '14:50:00', 'Activa'),
	(114, 3, 1, 35, 20, '2021-03-17', '03:00:00', 'Activa'),
	(439, 9, 1, 44, 44, '2021-03-10', '22:40:00', 'Activa'),
	(442, 2, 8, 44, 11, '2021-03-02', '13:12:00', 'Activa'),
	(443, 3, 1, 44, 30, '2021-03-23', '13:27:00', 'Activa'),
	(498, 7, 15, 11, 11, '2021-03-10', '13:57:00', 'Completada'),
	(499, 8, 15, 20, 20, '2021-03-31', '13:58:00', 'Activa');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Volcando estructura para tabla cinemax.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(70) NOT NULL,
  `CLAVE_USUARIO` varchar(20) NOT NULL,
  `TIPO_USUARIO` enum('Cliente','Administrador') NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cinemax.usuario: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE_USUARIO`, `CLAVE_USUARIO`, `TIPO_USUARIO`) VALUES
	(1, 'dscv3719@gmail.com', '1234', 'Administrador'),
	(8, 'fdcombita24@misena.edu.co', '123456789', 'Cliente'),
	(12, 'japs@gmail.com', '123456', 'Cliente'),
	(13, 'aleja14@gmail.com', '123456', 'Cliente'),
	(14, 'sergioayala@gmail.com', '123456', 'Cliente'),
	(15, 'jairopoveda@gmail.com', '123456', 'Administrador');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
