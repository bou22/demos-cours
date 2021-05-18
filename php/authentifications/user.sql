CREATE TABLE `Écrire le nom de votre BD`.`authentification` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(255) NOT NULL,
  `pwd` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `user_UNIQUE` (`user` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;