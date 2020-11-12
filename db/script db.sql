-- MySQL Script generated by MySQL Workbench
-- Wed Nov 11 12:40:46 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `db` ;

-- -----------------------------------------------------
-- Table `db`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`tipo_usuario` (
  `idtipo_usuario` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipo_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nombre_completo` VARCHAR(255) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `telefono` INT NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `idtipo_usuario` INT NOT NULL,
  PRIMARY KEY (`idusuarios`),
  INDEX `fk_usuarios_tipo_usuario_idx` (`idtipo_usuario` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  CONSTRAINT `fk_usuarios_tipo_usuario`
    FOREIGN KEY (`idtipo_usuario`)
    REFERENCES `db`.`tipo_usuario` (`idtipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`categorias` (
  `idcategorias` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategorias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db`.`tipo_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`tipo_servicio` (
  `idtipo_servicio` INT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(255) NOT NULL,
  `categorias_idcategorias` INT NOT NULL,
  PRIMARY KEY (`idtipo_servicio`),
  INDEX `fk_tipo_servicio_categorias1_idx` (`categorias_idcategorias` ASC) VISIBLE,
  CONSTRAINT `fk_tipo_servicio_categorias1`
    FOREIGN KEY (`categorias_idcategorias`)
    REFERENCES `db`.`categorias` (`idcategorias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db`.`requerimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`requerimientos` (
  `idrequerimientos` INT NOT NULL AUTO_INCREMENT,
  `codigo` INT NOT NULL,
  `estado` VARCHAR(255) NULL,
  `descripcion` VARCHAR(255) NULL,
  `ubiicacion` VARCHAR(255) NULL,
  `detalle` VARCHAR(255) NULL,
  `fecha_creacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_atencion` DATETIME NULL DEFAULT ON UPDATE CURRENT_TIMESTAMP,
  `fecha_finalizacion` DATETIME NULL,
  `requerimientoscol` VARCHAR(45) NULL,
  `solicitante_idusuarios` INT NOT NULL,
  `soporte_idusuarios` INT NULL,
  `idcategorias` INT NOT NULL,
  `idtipo_servicio` INT NOT NULL,
  PRIMARY KEY (`idrequerimientos`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) VISIBLE,
  INDEX `fk_requerimientos_usuarios1_idx` (`solicitante_idusuarios` ASC) VISIBLE,
  INDEX `fk_requerimientos_usuarios2_idx` (`soporte_idusuarios` ASC) VISIBLE,
  INDEX `fk_requerimientos_categorias1_idx` (`idcategorias` ASC) VISIBLE,
  INDEX `fk_requerimientos_tipo_servicio1_idx` (`idtipo_servicio` ASC) VISIBLE,
  CONSTRAINT `fk_requerimientos_usuarios1`
    FOREIGN KEY (`solicitante_idusuarios`)
    REFERENCES `db`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requerimientos_usuarios2`
    FOREIGN KEY (`soporte_idusuarios`)
    REFERENCES `db`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requerimientos_categorias1`
    FOREIGN KEY (`idcategorias`)
    REFERENCES `db`.`categorias` (`idcategorias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requerimientos_tipo_servicio1`
    FOREIGN KEY (`idtipo_servicio`)
    REFERENCES `db`.`tipo_servicio` (`idtipo_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
