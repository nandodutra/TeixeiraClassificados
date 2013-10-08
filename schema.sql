SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `teixeira_classificados` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `teixeira_classificados` ;

-- -----------------------------------------------------
-- Table `teixeira_classificados`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teixeira_classificados`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `facebook_id` INT NOT NULL ,
  `full_name` VARCHAR(45) NOT NULL ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `facebook_link` VARCHAR(100) NOT NULL ,
  `gender` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teixeira_classificados`.`location`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teixeira_classificados`.`location` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `facebook_location_id` INT NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_location_user` (`user_id` ASC) ,
  CONSTRAINT `fk_location_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `teixeira_classificados`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teixeira_classificados`.`announcement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teixeira_classificados`.`announcement` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `full_description` TEXT NOT NULL ,
  `type` CHAR(1) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  `situation` CHAR(1) NOT NULL ,
  `value` DECIMAL(10,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_anuncio_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_anuncio_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `teixeira_classificados`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teixeira_classificados`.`announcement_comments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teixeira_classificados`.`announcement_comments` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `announcement_id` INT NOT NULL ,
  `message` VARCHAR(255) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_announcement_comments_user1` (`user_id` ASC) ,
  INDEX `fk_announcement_comments_announcement1` (`announcement_id` ASC) ,
  CONSTRAINT `fk_announcement_comments_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `teixeira_classificados`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_announcement_comments_announcement1`
    FOREIGN KEY (`announcement_id` )
    REFERENCES `teixeira_classificados`.`announcement` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teixeira_classificados`.`announcement_photo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teixeira_classificados`.`announcement_photo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `announcement_id` INT NOT NULL ,
  `file` VARCHAR(64) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_announcement_photo_announcement1` (`announcement_id` ASC) ,
  CONSTRAINT `fk_announcement_photo_announcement1`
    FOREIGN KEY (`announcement_id` )
    REFERENCES `teixeira_classificados`.`announcement` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
