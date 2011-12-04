SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `randomtest` ;
CREATE SCHEMA IF NOT EXISTS `randomtest` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `randomtest` ;

-- -----------------------------------------------------
-- Table `profesor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `profesor` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `profesor` (
  `idprofesor` INT(11) NOT NULL AUTO_INCREMENT ,
  `rut_profesor` VARCHAR(10) NOT NULL ,
  `nombre_profesor` VARCHAR(45) NOT NULL ,
  `apePat_profesor` VARCHAR(45) NOT NULL ,
  `apeMat_profesor` VARCHAR(45) NOT NULL ,
  `fnac_profesor` DATE NOT NULL ,
  `direccion_profesor` VARCHAR(45) NOT NULL ,
  `telefono_profesor` VARCHAR(45) NOT NULL ,
  `estado_profesor` VARCHAR(45) NOT NULL DEFAULT 'ACTIVO' ,
  `password_profesor` VARCHAR(8) NOT NULL ,
  PRIMARY KEY (`idprofesor`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `dificultad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dificultad` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `dificultad` (
  `iddificultad` INT(11) NOT NULL AUTO_INCREMENT ,
  `descripcion_dificultad` VARCHAR(45) NOT NULL ,
  `dificultadcol` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`iddificultad`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `asignatura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `asignatura` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `asignatura` (
  `idasignatura` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre_asignatura` VARCHAR(45) NOT NULL ,
  `descripcion_asignatura` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`idasignatura`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `contenido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `contenido` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `contenido` (
  `idcontenido` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre_contenido` VARCHAR(45) NOT NULL ,
  `descripcion_contenido` VARCHAR(100) NOT NULL ,
  `asignatura_idasignatura` INT(11) NOT NULL ,
  PRIMARY KEY (`idcontenido`, `asignatura_idasignatura`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pregunta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pregunta` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pregunta` (
  `idPregunta` INT(11) NOT NULL AUTO_INCREMENT ,
  `pregunta` LONGTEXT NOT NULL ,
  `respuesta` LONGTEXT NOT NULL ,
  `profesor_idprofesor` INT(11) NOT NULL ,
  `dificultad_iddificultad` INT(11) NOT NULL ,
  `contenido_idcontenido` INT(11) NOT NULL ,
  PRIMARY KEY (`idPregunta`, `profesor_idprofesor`, `dificultad_iddificultad`, `contenido_idcontenido`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `alternativas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alternativas` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `alternativas` (
  `idalternativas` INT(11) NOT NULL AUTO_INCREMENT ,
  `alternativa` VARCHAR(100) NOT NULL ,
  `pregunta_idPregunta` INT NOT NULL ,
  `alternativascol` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idalternativas`, `pregunta_idPregunta`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alumno` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `alumno` (
  `idalumno` INT(11) NOT NULL AUTO_INCREMENT ,
  `rut_alumno` VARCHAR(10) NOT NULL ,
  `nombre_alumno` VARCHAR(45) NOT NULL ,
  `apePat_alumno` VARCHAR(45) NOT NULL ,
  `apeMat_alumno` VARCHAR(45) NOT NULL ,
  `fnac_alumno` DATE NOT NULL ,
  `direccion_alumno` VARCHAR(45) NOT NULL ,
  `telefono_alumno` VARCHAR(45) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL DEFAULT 'ACTIVO' ,
  `password_alumno` VARCHAR(8) NOT NULL ,
  PRIMARY KEY (`idalumno`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `prueba`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prueba` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `prueba` (
  `idprueba` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `alumno_idalumno` INT(11) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL DEFAULT 'ACTIVA' ,
  `fechaHora_inicio` DATETIME NOT NULL ,
  `fechaHora_termino` DATETIME NOT NULL ,
  PRIMARY KEY (`idprueba`, `alumno_idalumno`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `detalle_prueba`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `detalle_prueba` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `detalle_prueba` (
  `iddetalle_prueba` INT NOT NULL AUTO_INCREMENT ,
  `prueba_idprueba` INT NOT NULL ,
  `iddificultad` INT(11) NOT NULL ,
  `idcontenido` INT(11) NOT NULL ,
  PRIMARY KEY (`iddetalle_prueba`, `prueba_idprueba`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `curso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `curso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `curso` (
  `idcurso` INT(11) NOT NULL AUTO_INCREMENT ,
  `letra_curso` VARCHAR(1) NOT NULL ,
  `generacion` YEAR NOT NULL ,
  `estado` VARCHAR(45) NOT NULL DEFAULT 'ACTIVO' ,
  `nivel_enseñanza` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idcurso`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `resultado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `resultado` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `resultado` (
  `idresultado` INT(11) NOT NULL AUTO_INCREMENT ,
  `resultado` VARCHAR(45) NOT NULL ,
  `analisis` VARCHAR(45) NOT NULL ,
  `prueba_idprueba` INT NOT NULL ,
  PRIMARY KEY (`idresultado`, `prueba_idprueba`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `alumno_has_curso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alumno_has_curso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `alumno_has_curso` (
  `alumno_idalumno` INT(11) NOT NULL ,
  `curso_idcurso` INT(11) NOT NULL ,
  `estado` VARCHAR(45) NULL DEFAULT 'ACTIVO' ,
  PRIMARY KEY (`alumno_idalumno`, `curso_idcurso`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `administrador` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `administrador` (
  `idadministrador` INT(11) NOT NULL AUTO_INCREMENT ,
  `rut_admin` VARCHAR(10) NOT NULL ,
  `nombre_admin` VARCHAR(45) NOT NULL ,
  `apePat_admin` VARCHAR(45) NOT NULL ,
  `apeMat_admin` VARCHAR(45) NOT NULL ,
  `fnac_admin` DATE NOT NULL ,
  `direccion_admin` VARCHAR(45) NOT NULL ,
  `telefono_admin` VARCHAR(45) NOT NULL ,
  `estado_admin` VARCHAR(45) NOT NULL DEFAULT 'ACTIVO' ,
  `password_admin` VARCHAR(8) NOT NULL ,
  PRIMARY KEY (`idadministrador`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `profesor_has_asignatura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `profesor_has_asignatura` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `profesor_has_asignatura` (
  `profesor_idprofesor` INT(11) NOT NULL ,
  `asignatura_idasignatura` INT(11) NOT NULL ,
  PRIMARY KEY (`profesor_idprofesor`, `asignatura_idasignatura`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `nivel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nivel` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `nivel` (
  `curso_idcurso` INT(11) NOT NULL ,
  `asignatura_idasignatura` INT(11) NOT NULL ,
  `nivel` INT(1) NOT NULL ,
  PRIMARY KEY (`curso_idcurso`, `asignatura_idasignatura`) )
ENGINE = InnoDB;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
