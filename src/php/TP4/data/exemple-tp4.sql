-- MySQL Script generated by MySQL Workbench
-- Wed May  5 23:34:41 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema exemple-tp4
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `exemple-tp4` ;

-- -----------------------------------------------------
-- Schema exemple-tp4
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `exemple-tp4` DEFAULT CHARACTER SET utf8 ;
USE `exemple-tp4` ;

-- -----------------------------------------------------
-- Table `province`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `province` (
  `idprovince` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  PRIMARY KEY (`idprovince`))
ENGINE = InnoDB;
insert into province (nom) values ('Qu&eacute;bec');
insert into province (nom) values ('Ontario');
insert into province (nom) values ('Nouveau-Brunswick');

-- -----------------------------------------------------
-- Table `utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` INT NOT NULL AUTO_INCREMENT,
  `nomComplet` VARCHAR(100) NULL,
  `courriel` VARCHAR(100) NULL,
  `mdp` VARCHAR(120) NULL,
  PRIMARY KEY (`idutilisateur`))
ENGINE = InnoDB;

-- https://dev.w3.org/html5/html-author/charref
insert into utilisateur (nomComplet) values ('Évangéline D&apos;Alberville');
insert into utilisateur (nomComplet) values ('Antony Mass&eacute;');
