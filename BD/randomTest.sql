-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2011 a las 02:11:44
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `randomtest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternativas`
--

CREATE TABLE IF NOT EXISTS `alternativas` (
  `idalternativas` int(11) NOT NULL AUTO_INCREMENT,
  `alternativa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_idPregunta` int(11) NOT NULL,
  `alternativascol` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idalternativas`,`pregunta_idPregunta`),
  KEY `fk_alternativas_Pregunta1` (`pregunta_idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `alternativas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `rut_alumno` varchar(10) NOT NULL,
  `nombre_alumno` varchar(45) NOT NULL,
  `apePat_alumno` varchar(45) NOT NULL,
  `apeMat_alumno` varchar(45) NOT NULL,
  `fnac_alumno` date NOT NULL,
  `direccion_alumno` varchar(45) NOT NULL,
  `telefono_alumno` varchar(45) NOT NULL,
  `estado_alumno` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_alumno` varchar(45) NOT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `rut_alumno`, `nombre_alumno`, `apePat_alumno`, `apeMat_alumno`, `fnac_alumno`, `direccion_alumno`, `telefono_alumno`, `estado_alumno`, `password_alumno`) VALUES
(1, '173123914', 'catherine', 'velasquez', 'miranda', '1989-11-10', 'El pino 853', '2261587', 'ACTIVO', 'holahola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_has_curso`
--

CREATE TABLE IF NOT EXISTS `alumno_has_curso` (
  `alumno_idalumno` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  PRIMARY KEY (`alumno_idalumno`,`curso_idcurso`),
  KEY `fk_alumno_has_curso_curso1` (`curso_idcurso`),
  KEY `fk_alumno_has_curso_alumno1` (`alumno_idalumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `alumno_has_curso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(45) NOT NULL,
  `descripcion_asignatura` varchar(100) NOT NULL,
  `profesor_idprofesor` int(11) NOT NULL,
  PRIMARY KEY (`idasignatura`),
  KEY `fk_asignatura_profesor1` (`profesor_idprofesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idasignatura`, `nombre_asignatura`, `descripcion_asignatura`, `profesor_idprofesor`) VALUES
(2, 'Lenguaje', 'kfaljkdljsadkljÃ±kajsd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_has_curso`
--

CREATE TABLE IF NOT EXISTS `asignatura_has_curso` (
  `asignatura_idasignatura` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  PRIMARY KEY (`asignatura_idasignatura`,`curso_idcurso`),
  KEY `fk_asignatura_has_curso_curso1` (`curso_idcurso`),
  KEY `fk_asignatura_has_curso_asignatura1` (`asignatura_idasignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `asignatura_has_curso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `idcontenido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_contenido` varchar(45) NOT NULL,
  `descripcion_contenido` varchar(100) NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL,
  PRIMARY KEY (`idcontenido`,`asignatura_idasignatura`),
  KEY `fk_contenido_asignatura1` (`asignatura_idasignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `contenido`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_curso` int(1) NOT NULL,
  `letra_curso` varchar(1) NOT NULL,
  `generacion` year(4) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `nivel_ens` varchar(45) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `nivel_curso`, `letra_curso`, `generacion`, `estado`, `nivel_ens`) VALUES
(1, 1, 'b', 2011, 'ACTIVO', 'basica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prueba`
--

CREATE TABLE IF NOT EXISTS `detalle_prueba` (
  `iddetalle_prueba` int(11) NOT NULL AUTO_INCREMENT,
  `prueba_idprueba` int(11) NOT NULL,
  `id_dificultad` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_prueba`,`prueba_idprueba`),
  KEY `fk_detalle_prueba_prueba1` (`prueba_idprueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detalle_prueba`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultad`
--

CREATE TABLE IF NOT EXISTS `dificultad` (
  `iddificultad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_dificultad` varchar(45) NOT NULL,
  `dificultadcol` varchar(45) NOT NULL,
  PRIMARY KEY (`iddificultad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `dificultad`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `profesor_idprofesor` int(11) NOT NULL,
  `dificultad_iddificultad` int(11) NOT NULL,
  `contenido_idcontenido` int(11) NOT NULL,
  PRIMARY KEY (`idPregunta`,`profesor_idprofesor`,`dificultad_iddificultad`,`contenido_idcontenido`),
  KEY `fk_Pregunta_profesor` (`profesor_idprofesor`),
  KEY `fk_Pregunta_Dificultad1` (`dificultad_iddificultad`),
  KEY `fk_Pregunta_contenido1` (`contenido_idcontenido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pregunta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
  `rut_profesor` varchar(10) NOT NULL,
  `nombre_profesor` varchar(45) NOT NULL,
  `apePat_profesor` varchar(45) NOT NULL,
  `apeMat_profesor` varchar(45) NOT NULL,
  `fnac_profesor` date NOT NULL,
  `direccion_profesor` varchar(45) NOT NULL,
  `telefono_profesor` varchar(45) NOT NULL,
  `estado_profesor` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `password_profesor` varchar(45) NOT NULL,
  PRIMARY KEY (`idprofesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idprofesor`, `rut_profesor`, `nombre_profesor`, `apePat_profesor`, `apeMat_profesor`, `fnac_profesor`, `direccion_profesor`, `telefono_profesor`, `estado_profesor`, `password_profesor`) VALUES
(1, '17.312.391', 'catherine', 'velasquez', 'miranda', '1989-11-10', 'El pino, el bosque', '2261587', 'ACTIVO', 'sjsjsj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `idprueba` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `alumno_idalumno` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVA',
  `fechaHora_inicio` datetime NOT NULL,
  `fechaHora_termino` datetime NOT NULL,
  PRIMARY KEY (`idprueba`,`alumno_idalumno`),
  KEY `fk_prueba_alumno1` (`alumno_idalumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `prueba`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `idresultado` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(45) NOT NULL,
  `analisis` varchar(45) NOT NULL,
  `prueba_idprueba` int(11) NOT NULL,
  PRIMARY KEY (`idresultado`,`prueba_idprueba`),
  KEY `fk_resultado_prueba1` (`prueba_idprueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `resultado`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `alternativas`
--
ALTER TABLE `alternativas`
  ADD CONSTRAINT `fk_alternativas_Pregunta1` FOREIGN KEY (`pregunta_idPregunta`) REFERENCES `pregunta` (`idPregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumno_has_curso`
--
ALTER TABLE `alumno_has_curso`
  ADD CONSTRAINT `fk_alumno_has_curso_alumno1` FOREIGN KEY (`alumno_idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_has_curso_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_asignatura_profesor1` FOREIGN KEY (`profesor_idprofesor`) REFERENCES `profesor` (`idprofesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignatura_has_curso`
--
ALTER TABLE `asignatura_has_curso`
  ADD CONSTRAINT `fk_asignatura_has_curso_asignatura1` FOREIGN KEY (`asignatura_idasignatura`) REFERENCES `asignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignatura_has_curso_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `fk_contenido_asignatura1` FOREIGN KEY (`asignatura_idasignatura`) REFERENCES `asignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_prueba`
--
ALTER TABLE `detalle_prueba`
  ADD CONSTRAINT `fk_detalle_prueba_prueba1` FOREIGN KEY (`prueba_idprueba`) REFERENCES `prueba` (`idprueba`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_Pregunta_contenido1` FOREIGN KEY (`contenido_idcontenido`) REFERENCES `contenido` (`idcontenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pregunta_Dificultad1` FOREIGN KEY (`dificultad_iddificultad`) REFERENCES `dificultad` (`iddificultad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pregunta_profesor` FOREIGN KEY (`profesor_idprofesor`) REFERENCES `profesor` (`idprofesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD CONSTRAINT `fk_prueba_alumno1` FOREIGN KEY (`alumno_idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `fk_resultado_prueba1` FOREIGN KEY (`prueba_idprueba`) REFERENCES `prueba` (`idprueba`) ON DELETE NO ACTION ON UPDATE NO ACTION;
