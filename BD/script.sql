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
  `rut_admin` varchar(12) NOT NULL,
  `nombre_admin` varchar(45) NOT NULL,
  `apePat_admin` varchar(45) NOT NULL,
  `apeMat_admin` varchar(45) NOT NULL,
  `fnac_admin` date NOT NULL,
  `direccion_admin` varchar(45) NOT NULL,
  `telefono_admin` varchar(45) NOT NULL,
  `estado_admin` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_admin` varchar(8) NOT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `administrador` */

insert  into `administrador`(`idadministrador`,`rut_admin`,`nombre_admin`,`apePat_admin`,`apeMat_admin`,`fnac_admin`,`direccion_admin`,`telefono_admin`,`estado_admin`,`password_admin`) values (1,'17.312.391-4','Catherine','Velásquez','Miranda','1989-11-10','el pino 853','9871504','ACTIVO','wishyou');

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
  `rut_alumno` varchar(12) NOT NULL,
  `nombre_alumno` varchar(45) NOT NULL,
  `apePat_alumno` varchar(45) NOT NULL,
  `apeMat_alumno` varchar(45) NOT NULL,
  `fnac_alumno` date NOT NULL,
  `direccion_alumno` varchar(45) NOT NULL,
  `telefono_alumno` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_alumno` varchar(8) NOT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `alumno` */

insert  into `alumno`(`idalumno`,`rut_alumno`,`nombre_alumno`,`apePat_alumno`,`apeMat_alumno`,`fnac_alumno`,`direccion_alumno`,`telefono_alumno`,`estado`,`password_alumno`) values (1,'18.608.786-0','Maria','Cerda','Ramirez','1996-12-04','Esadffds','545454545','ACTIVO','hola'),(2,'20.803.254-2','Alex','Perez','Salazar','2005-12-10','asas','5216444','ACTIVO','hola'),(3,'13.535.560-7','Alan','Cabezas','Cabezon','2004-12-22','sadasd','5254584','ACTIVO','hola'),(4,'17.558.173-1','Alexandra','Tapia','Herrera','2008-12-19','sdsd','525447','ACTIVO','hola'),(5,'18.257.595-k','Antonio','Arancibia','Aguirre','2004-12-16','sdasd44ds','5874158','ACTIVO','hola'),(6,'7.635.601-7','Karla','Rojas','Rivera','2003-12-17','sadads','2345566','ACTIVO','hola'),(7,'14.605.759-4','Karol','Villaroel','Massa','2002-12-13','sdsdsdsd','2344556','ACTIVO','hola'),(8,'16.168.600-k','Valeria','Massa','Perez','2002-12-12','sadasd454','5214587','ACTIVO','hola'),(9,'19.097.697-1','Alexis','Sanchez','Mora','2004-12-09','asasd22','2334567','ACTIVO','hola'),(10,'19.097.697-1','Felipe','Gutierres','Perez','1997-12-19','sadad22','2345566','ACTIVO','hola'),(11,'9.530.554-7','Kassandra','Villa','Sanchez','2004-12-23','sadsd22','5215478','ACTIVO','hola'),(12,'20.579.729-7','Carlos','Villanueva','Valdivia','2006-12-08','sdad2','4114589','ACTIVO','hola'),(13,'13.205.437-1','Christian','Diaz','Aguirre	','2002-12-18','sadasd','2345678','ACTIVO','hola'),(14,'5.141.607-4','Catalina','Fernandez','Quiroz','1999-12-09','qdsfdsdgsdf','2345678','ACTIVO','hola'),(15,'5.014.806-8','Clara','Aguirre','MuÃƒÂ±oz','1996-12-27','23123rsdf','2345678','ACTIVO','hola'),(16,'24.346.531-1','Cristobal','Salazar','Herrera','1996-12-19','adsdas232','5412369','ACTIVO','hola'),(17,'11.249.780-3','Celia','Cruz','Rivera','2006-12-15','sadsd23','5236478','ACTIVO','hola'),(18,'6.550.435-9','Ivan','Pacheco','Villanueva','2006-12-14','sadasd2','5235489','ACTIVO','hola'),(19,'22.701.391-5','Ismael','Plaza','Prieto','2007-12-14','sadsadasd2','5236987','ACTIVO','hola'),(20,'19.774.485-5','Martin','Serrano','Salas','2005-12-16','sadasda3','5236587','ACTIVO','hola');

/*Table structure for table `alumno_has_curso` */

DROP TABLE IF EXISTS `alumno_has_curso`;

CREATE TABLE `alumno_has_curso` (
  `alumno_idalumno` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  PRIMARY KEY (`alumno_idalumno`,`curso_idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `alumno_has_curso` */

insert  into `alumno_has_curso`(`alumno_idalumno`,`curso_idcurso`,`estado`) values (1,1,'ACTIVO'),(2,1,'ACTIVO'),(3,1,'ACTIVO'),(4,1,'ACTIVO'),(5,1,'ACTIVO'),(6,1,'ACTIVO'),(7,1,'ACTIVO'),(8,1,'ACTIVO'),(9,1,'ACTIVO'),(10,1,'ACTIVO'),(11,2,'ACTIVO'),(12,2,'ACTIVO'),(13,2,'ACTIVO'),(14,2,'ACTIVO'),(15,2,'ACTIVO'),(16,2,'ACTIVO'),(17,2,'ACTIVO'),(18,2,'ACTIVO'),(19,2,'ACTIVO'),(20,2,'ACTIVO');

/*Table structure for table `asignatura` */

DROP TABLE IF EXISTS `asignatura`;

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(45) NOT NULL,
  `descripcion_asignatura` varchar(100) NOT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `asignatura` */

insert  into `asignatura`(`idasignatura`,`nombre_asignatura`,`descripcion_asignatura`) values (1,'Lenguaje','klsdjfklsfjkld'),(2,'Matematicas','dsfdasdf'),(3,'Historia','sdfsafd'),(4,'Lenguaje','asdasdasd'),(5,'Matematicas','aasdasd'),(6,'Historia','asdasdasd');

/*Table structure for table `contenido` */

DROP TABLE IF EXISTS `contenido`;

CREATE TABLE `contenido` (
  `idcontenido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_contenido` varchar(45) NOT NULL,
  `descripcion_contenido` varchar(100) NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL,
  PRIMARY KEY (`idcontenido`,`asignatura_idasignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `contenido` */

insert  into `contenido`(`idcontenido`,`nombre_contenido`,`descripcion_contenido`,`asignatura_idasignatura`) values (1,'Introduccion','asdfasdf',1),(2,'Lengua Castellana','asdfdsaf',1),(3,'Literatura','sadfsadfdsaf',1),(4,'Ortografia','sdfasdf',1),(5,'Poesia','asdfsadf',1),(6,'Sumas','asdasd',2),(7,'Restas','safdsf',2),(8,'Divisiones','sdfsf',2),(9,'Multiplicaciones','asdfasdf',2),(10,'Numeros Primos','sdfsadf',2),(11,'Historia Chile','sdfsadf',3),(12,'Politica','sdfsfdsd',3),(13,'Historia Universal','asdfsadf',3),(14,'Introduccion','asdasda',4),(15,'Lengua Castellana','asdasdas',4),(16,'Literatura','asdasdasd',4),(17,'Ortografia','asdasdasd',4),(18,'Sumas','asdasd',5),(19,'Restas','asdasda',5),(20,'Divisiones','asdasdasd',5),(21,'Multiplicaciones','asdasdasd',5),(22,'Numeros Primos','asdasdasd',5),(23,'Historia Chile','asdasd',6),(24,'Politica','asdasd',6),(25,'Historia Universal','asdasd',6);

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `letra_curso` varchar(1) NOT NULL,
  `generacion` year(4) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `tipo_ens` varchar(45) NOT NULL,
  `nivel_ens` varchar(45) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `curso` */

insert  into `curso`(`idcurso`,`letra_curso`,`generacion`,`estado`,`tipo_ens`,`nivel_ens`) values (1,'A',2011,'ACTIVO','1','1'),(2,'B',2009,'ACTIVO','1','5'),(3,'A',2009,'ACTIVO','1','8'),(4,'B',2005,'ACTIVO','1','7');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `nivel` */

insert  into `nivel`(`id_nivel`,`curso_idcurso`,`asignatura_idasignatura`,`nivel`) values (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,2,6,5),(5,2,4,5),(6,2,5,5);

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
  `rut_profesor` varchar(12) NOT NULL,
  `nombre_profesor` varchar(45) NOT NULL,
  `apePat_profesor` varchar(45) NOT NULL,
  `apeMat_profesor` varchar(45) NOT NULL,
  `fnac_profesor` date NOT NULL,
  `direccion_profesor` varchar(45) NOT NULL,
  `telefono_profesor` varchar(45) NOT NULL,
  `estado_profesor` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_profesor` varchar(8) NOT NULL,
  PRIMARY KEY (`idprofesor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `profesor` */

insert  into `profesor`(`idprofesor`,`rut_profesor`,`nombre_profesor`,`apePat_profesor`,`apeMat_profesor`,`fnac_profesor`,`direccion_profesor`,`telefono_profesor`,`estado_profesor`,`password_profesor`) values (1,'11.686.636-6','Miriam','Suarez','Santana','1985-12-13','sadad22','4232683','ACTIVO','hola'),(2,'12.481.700-5','Mauricio','Sarmiento','Valdivia','1981-12-24','sadasd2','5236588','ACTIVO','hola'),(3,'6.412.030-1','Macarena','Rivas','Cruz','1964-12-17','asdadasd22','5236947','ACTIVO','hola'),(4,'5.746.204-3','Javiera','Jimenez','Diaz','1978-12-21','sadasd2','2544896','ACTIVO','hola'),(5,'11.180.542-3','Natalia','Jaque','Rojas','1954-12-24','sadsadw2','4236574','ACTIVO','hola'),(6,'13.278.930-4','Bruno','Navarro','Jaramillo','1957-12-25','sadkflasdkjlsadfjl','5412369','ACTIVO','hola'),(7,'16.414.117-9','Pablo','Salgado','Arias','1987-02-16','asdasd','5254766','ACTIVO','123');

/*Table structure for table `profesor_has_asignatura` */

DROP TABLE IF EXISTS `profesor_has_asignatura`;

CREATE TABLE `profesor_has_asignatura` (
  `id_profe_asig` int(11) NOT NULL AUTO_INCREMENT,
  `profesor_idprofesor` int(11) NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL,
  PRIMARY KEY (`profesor_idprofesor`,`asignatura_idasignatura`),
  UNIQUE KEY `id_profe_asig` (`id_profe_asig`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `profesor_has_asignatura` */

insert  into `profesor_has_asignatura`(`id_profe_asig`,`profesor_idprofesor`,`asignatura_idasignatura`) values (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,6,5),(6,4,6),(7,7,1),(8,7,2);

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
