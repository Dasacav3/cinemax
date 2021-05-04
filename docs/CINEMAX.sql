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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cinemax.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CLIENTE` varchar(70) NOT NULL,
  `APELLIDO_CLIENTE` varchar(70) NOT NULL,
  `EDAD` int(11) NOT NULL,
  `EMAIL_CLIENTE` varchar(70) NOT NULL,
  `CELULAR_CLIENTE` varchar(10) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`),
  UNIQUE KEY `EMAIL_CLIENTE` (`EMAIL_CLIENTE`),
  UNIQUE KEY `CELULAR_CLIENTE` (`CELULAR_CLIENTE`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cinemax.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_GENERO` varchar(100) NOT NULL,
  `DESCRIPCION_GENERO` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_GENERO`),
  UNIQUE KEY `NOMBRE_GENERO` (`NOMBRE_GENERO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cinemax.pelicula
CREATE TABLE IF NOT EXISTS `pelicula` (
  `ID_PELICULA` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO_PELICULA` varchar(60) NOT NULL,
  `ID_GENERO` int(11) NOT NULL,
  `AÑO_PUBLICACION` year(4) NOT NULL DEFAULT 0000,
  PRIMARY KEY (`ID_PELICULA`),
  UNIQUE KEY `TITULO_PELICULA` (`TITULO_PELICULA`),
  KEY `FK_pelicula_genero` (`ID_GENERO`),
  CONSTRAINT `FK_pelicula_genero` FOREIGN KEY (`ID_GENERO`) REFERENCES `genero` (`ID_GENERO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cinemax.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PELICULA` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_SALA` int(11) NOT NULL,
  `ASIENTOS` int(11) NOT NULL,
  `FECHA_RESERVACION` date NOT NULL,
  `HORA_RESERVACION` time NOT NULL,
  `ESTADO_RESERVACION` enum('Activa','Completada','Cancelada') NOT NULL,
  PRIMARY KEY (`ID_RESERVA`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`),
  KEY `ID_PELICULA` (`ID_PELICULA`),
  KEY `FK_reserva_sala` (`ID_SALA`),
  CONSTRAINT `FK_reserva_sala` FOREIGN KEY (`ID_SALA`) REFERENCES `sala` (`ID_SALA`) ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`) ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`ID_PELICULA`) REFERENCES `pelicula` (`ID_PELICULA`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cinemax.sala
CREATE TABLE IF NOT EXISTS `sala` (
  `ID_SALA` int(11) NOT NULL AUTO_INCREMENT,
  `CAPACIDAD_SALA` int(11) NOT NULL,
  `CAPACIDAD_ACTUAL` int(11) NOT NULL,
  PRIMARY KEY (`ID_SALA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla cinemax.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(70) NOT NULL,
  `CLAVE_USUARIO` varchar(255) NOT NULL,
  `TIPO_USUARIO` enum('Cliente','Administrador') NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
