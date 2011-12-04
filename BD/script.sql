/*
SQLyog Ultimate v9.02 
MySQL - 5.5.8-log : Database - randomtest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`randomtest` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `randomtest`;

/*Table structure for table `administrador` */

DROP TABLE IF EXISTS `administrador`;

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL AUTO_INCREMENT,
  `rut_admin` varchar(10) NOT NULL,
  `nombre_admin` varchar(45) NOT NULL,
  `apePat_admin` varchar(45) NOT NULL,
  `apeMat_admin` varchar(45) NOT NULL,
  `fnac_admin` date NOT NULL,
  `direccion_admin` varchar(45) NOT NULL,
  `telefono_admin` varchar(45) NOT NULL,
  `estado_admin` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_admin` varchar(8) NOT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `administrador` */

/*Table structure for table `alternativas` */

DROP TABLE IF EXISTS `alternativas`;

CREATE TABLE `alternativas` (
  `idalternativas` int(11) NOT NULL AUTO_INCREMENT,
  `alternativa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_idPregunta` int(11) NOT NULL,
  `alternativascol` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idalternativas`,`pregunta_idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `alternativas` */

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `rut_alumno` varchar(10) NOT NULL,
  `nombre_alumno` varchar(45) NOT NULL,
  `apePat_alumno` varchar(45) NOT NULL,
  `apeMat_alumno` varchar(45) NOT NULL,
  `fnac_alumno` date NOT NULL,
  `direccion_alumno` varchar(45) NOT NULL,
  `telefono_alumno` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_alumno` varchar(8) NOT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `alumno` */

insert  into `alumno`(`idalumno`,`rut_alumno`,`nombre_alumno`,`apePat_alumno`,`apeMat_alumno`,`fnac_alumno`,`direccion_alumno`,`telefono_alumno`,`estado`,`password_alumno`) values (1,'17.312.391','catherine','velasquez','miranda','0000-00-00','adfasdf','9871504','ACTIVO','holahola');

/*Table structure for table `alumno_has_curso` */

DROP TABLE IF EXISTS `alumno_has_curso`;

CREATE TABLE `alumno_has_curso` (
  `alumno_idalumno` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  PRIMARY KEY (`alumno_idalumno`,`curso_idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `alumno_has_curso` */

/*Table structure for table `asignatura` */

DROP TABLE IF EXISTS `asignatura`;

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(45) NOT NULL,
  `descripcion_asignatura` varchar(100) NOT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `asignatura` */

insert  into `asignatura`(`idasignatura`,`nombre_asignatura`,`descripcion_asignatura`) values (1,'Lenguaje','dsfdfsfsd'),(2,'Lenguaje','asdasd'),(3,'Lenguaje','akjsdajsj'),(4,'Matematicas','asdf');

/*Table structure for table `contenido` */

DROP TABLE IF EXISTS `contenido`;

CREATE TABLE `contenido` (
  `idcontenido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_contenido` varchar(45) NOT NULL,
  `descripcion_contenido` varchar(100) NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL,
  PRIMARY KEY (`idcontenido`,`asignatura_idasignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `contenido` */

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `letra_curso` varchar(1) NOT NULL,
  `generacion` year(4) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `nivel_enseñanza` varchar(45) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `curso` */

/*Table structure for table `detalle_prueba` */

DROP TABLE IF EXISTS `detalle_prueba`;

CREATE TABLE `detalle_prueba` (
  `iddetalle_prueba` int(11) NOT NULL AUTO_INCREMENT,
  `prueba_idprueba` int(11) NOT NULL,
  `iddificultad` int(11) NOT NULL,
  `idcontenido` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_prueba`,`prueba_idprueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_prueba` */

/*Table structure for table `dificultad` */

DROP TABLE IF EXISTS `dificultad`;

CREATE TABLE `dificultad` (
  `iddificultad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_dificultad` varchar(45) NOT NULL,
  PRIMARY KEY (`iddificultad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `dificultad` */

/*Table structure for table `nivel` */

DROP TABLE IF EXISTS `nivel`;

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `curso_idcurso` int(11) NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`id_nivel`,`curso_idcurso`,`asignatura_idasignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `nivel` */

/*Table structure for table `pregunta` */

DROP TABLE IF EXISTS `pregunta`;

CREATE TABLE `pregunta` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` longtext NOT NULL,
  `respuesta` longtext NOT NULL,
  `profesor_idprofesor` int(11) NOT NULL,
  `dificultad_iddificultad` int(11) NOT NULL,
  `contenido_idcontenido` int(11) NOT NULL,
  PRIMARY KEY (`idPregunta`,`profesor_idprofesor`,`dificultad_iddificultad`,`contenido_idcontenido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pregunta` */

/*Table structure for table `profesor` */

DROP TABLE IF EXISTS `profesor`;

CREATE TABLE `profesor` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
  `rut_profesor` varchar(10) NOT NULL,
  `nombre_profesor` varchar(45) NOT NULL,
  `apePat_profesor` varchar(45) NOT NULL,
  `apeMat_profesor` varchar(45) NOT NULL,
  `fnac_profesor` date NOT NULL,
  `direccion_profesor` varchar(45) NOT NULL,
  `telefono_profesor` varchar(45) NOT NULL,
  `estado_profesor` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_profesor` varchar(8) NOT NULL,
  PRIMARY KEY (`idprofesor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `profesor` */

insert  into `profesor`(`idprofesor`,`rut_profesor`,`nombre_profesor`,`apePat_profesor`,`apeMat_profesor`,`fnac_profesor`,`direccion_profesor`,`telefono_profesor`,`estado_profesor`,`password_profesor`) values (1,'16.414.117','pablo','salgado','arias','0000-00-00','elqui','8298390','ACTIVO','holahola'),(2,'17.312.391','catherine','velasquez','miranda','0000-00-00','kajsdlkjsaddkj','2398293','ACTIVO','holahola');

/*Table structure for table `profesor_has_asignatura` */

DROP TABLE IF EXISTS `profesor_has_asignatura`;

CREATE TABLE `profesor_has_asignatura` (
  `id_profe_asig` int(11) NOT NULL AUTO_INCREMENT,
  `profesor_idprofesor` int(11) NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL,
  PRIMARY KEY (`profesor_idprofesor`,`asignatura_idasignatura`),
  UNIQUE KEY `id_profe_asig` (`id_profe_asig`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `profesor_has_asignatura` */

insert  into `profesor_has_asignatura`(`id_profe_asig`,`profesor_idprofesor`,`asignatura_idasignatura`) values (3,2,4);

/*Table structure for table `prueba` */

DROP TABLE IF EXISTS `prueba`;

CREATE TABLE `prueba` (
  `idprueba` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `alumno_idalumno` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVA',
  `fechaHora_inicio` datetime NOT NULL,
  `fechaHora_termino` datetime NOT NULL,
  PRIMARY KEY (`idprueba`,`alumno_idalumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prueba` */

/*Table structure for table `resultado` */

DROP TABLE IF EXISTS `resultado`;

CREATE TABLE `resultado` (
  `idresultado` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(45) NOT NULL,
  `analisis` varchar(45) NOT NULL,
  `prueba_idprueba` int(11) NOT NULL,
  PRIMARY KEY (`idresultado`,`prueba_idprueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `resultado` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
