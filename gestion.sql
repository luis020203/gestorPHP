/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 8.0.32 : Database - gestion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gestion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `gestion`;

/*Table structure for table `archivo` */

DROP TABLE IF EXISTS `archivo`;

CREATE TABLE `archivo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(150) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `ruta` text,
  `tipo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `archivo` */

/*Table structure for table `gestionar_usuario_archivo` */

DROP TABLE IF EXISTS `gestionar_usuario_archivo`;

CREATE TABLE `gestionar_usuario_archivo` (
  `id_gestion` int NOT NULL AUTO_INCREMENT,
  `id_archivo` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_gestion`),
  KEY `id_archivo` (`id_archivo`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `gestionar_usuario_archivo_ibfk_1` FOREIGN KEY (`id_archivo`) REFERENCES `archivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gestionar_usuario_archivo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `gestionar_usuario_archivo` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
