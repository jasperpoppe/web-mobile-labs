SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `wingsplatform` ;
CREATE SCHEMA IF NOT EXISTS `wingsplatform` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `wingsplatform` ;

-- -----------------------------------------------------
-- Table `wingsplatform`.`Countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Countries` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Countries` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Country` VARCHAR(100) NOT NULL ,
  `Continent` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`User_Roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`User_Roles` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`User_Roles` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Role` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Users` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Users` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `First_name` VARCHAR(50) NOT NULL ,
  `Last_name` VARCHAR(60) NOT NULL ,
  `Email` VARCHAR(100) NOT NULL ,
  `Password` VARCHAR(100) NOT NULL ,
  `Biography` TEXT NULL ,
  `Profession` VARCHAR(100) NULL ,
  `Picture` VARCHAR(100) NULL ,
  `LinkedIn` VARCHAR(200) NULL ,
  `Website` VARCHAR(200) NULL ,
  `Mentor` TINYINT(1) NOT NULL ,
  `Countries_ID` INT NOT NULL ,
  `User_Roles_ID` INT NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NULL ,
  `Accept_date` DATETIME NULL ,
  `remember_token` VARCHAR(100) NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Users_Countries` (`Countries_ID` ASC) ,
  INDEX `fk_Users_User_Roles1` (`User_Roles_ID` ASC) ,
  CONSTRAINT `fk_Users_Countries`
    FOREIGN KEY (`Countries_ID` )
    REFERENCES `wingsplatform`.`Countries` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_User_Roles1`
    FOREIGN KEY (`User_Roles_ID` )
    REFERENCES `wingsplatform`.`User_Roles` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Partners`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Partners` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Partners` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  `Consortium` TINYINT(1) NOT NULL ,
  `Picture` VARCHAR(100) NOT NULL ,
  `URL` VARCHAR(200) NULL ,
  `Description` TEXT NULL ,
  `Address` VARCHAR(100) NULL ,
  `Countries_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Partners_Countries1` (`Countries_ID` ASC) ,
  CONSTRAINT `fk_Partners_Countries1`
    FOREIGN KEY (`Countries_ID` )
    REFERENCES `wingsplatform`.`Countries` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Media_Types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Media_Types` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Media_Types` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Categories` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Categories` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Tags` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Tags` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Languages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Languages` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Languages` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Language` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Learning_Materials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Learning_Materials` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Learning_Materials` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Title` VARCHAR(100) NOT NULL ,
  `Summary` TEXT NOT NULL ,
  `Full_Text` TEXT NOT NULL ,
  `Time` TIME NULL ,
  `Provider` VARCHAR(60) NULL ,
  `URL_to_provider` VARCHAR(200) NULL ,
  `URL_to_learning_resource` VARCHAR(200) NULL ,
  `Author_linkedin` VARCHAR(200) NULL ,
  `Picture` VARCHAR(100) NULL ,
  `Public` TINYINT(1) NOT NULL ,
  `Media_Types_ID` INT NOT NULL ,
  `Categories_ID` INT NOT NULL ,
  `Countries_ID` INT NOT NULL ,
  `Languages_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Learning_Materials_Media_Types1` (`Media_Types_ID` ASC) ,
  INDEX `fk_Learning_Materials_Categories1` (`Categories_ID` ASC) ,
  INDEX `fk_Learning_Materials_Countries1` (`Countries_ID` ASC) ,
  INDEX `fk_Learning_Materials_Languages1` (`Languages_ID` ASC) ,
  CONSTRAINT `fk_Learning_Materials_Media_Types1`
    FOREIGN KEY (`Media_Types_ID` )
    REFERENCES `wingsplatform`.`Media_Types` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Learning_Materials_Categories1`
    FOREIGN KEY (`Categories_ID` )
    REFERENCES `wingsplatform`.`Categories` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Learning_Materials_Countries1`
    FOREIGN KEY (`Countries_ID` )
    REFERENCES `wingsplatform`.`Countries` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Learning_Materials_Languages1`
    FOREIGN KEY (`Languages_ID` )
    REFERENCES `wingsplatform`.`Languages` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Users_has_Learning_Materials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Users_has_Learning_Materials` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Users_has_Learning_Materials` (
  `Users_ID` INT NOT NULL ,
  `Learning_Materials_ID` INT NOT NULL ,
  PRIMARY KEY (`Users_ID`, `Learning_Materials_ID`) ,
  INDEX `fk_Users_has_Learning_Materials_Learning_Materials1` (`Learning_Materials_ID` ASC) ,
  INDEX `fk_Users_has_Learning_Materials_Users1` (`Users_ID` ASC) ,
  CONSTRAINT `fk_Users_has_Learning_Materials_Users1`
    FOREIGN KEY (`Users_ID` )
    REFERENCES `wingsplatform`.`Users` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Users_has_Learning_Materials_Learning_Materials1`
    FOREIGN KEY (`Learning_Materials_ID` )
    REFERENCES `wingsplatform`.`Learning_Materials` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Shop_Items_Service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Shop_Items_Service` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Shop_Items_Service` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Title` VARCHAR(100) NOT NULL ,
  `Description` TEXT NOT NULL ,
  `Email` VARCHAR(100) NOT NULL ,
  `Pic1` VARCHAR(100) NOT NULL ,
  `Pic2` VARCHAR(100) NULL ,
  `Pic3` VARCHAR(100) NULL ,
  `Start_date` DATE NULL ,
  `End_date` DATE NULL ,
  `Users_ID` INT NOT NULL ,
  `Categories_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Shop_Items_Service_Users1` (`Users_ID` ASC) ,
  INDEX `fk_Shop_Items_Service_Categories1` (`Categories_ID` ASC) ,
  CONSTRAINT `fk_Shop_Items_Service_Users1`
    FOREIGN KEY (`Users_ID` )
    REFERENCES `wingsplatform`.`Users` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Shop_Items_Service_Categories1`
    FOREIGN KEY (`Categories_ID` )
    REFERENCES `wingsplatform`.`Categories` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Shop_Items_Product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Shop_Items_Product` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Shop_Items_Product` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Title` VARCHAR(100) NOT NULL ,
  `Description` TEXT NOT NULL ,
  `Price` FLOAT NOT NULL ,
  `Amount` INT NOT NULL ,
  `Pic1` VARCHAR(100) NOT NULL ,
  `Pic2` VARCHAR(100) NULL ,
  `Pic3` VARCHAR(100) NULL ,
  `Users_ID` INT NOT NULL ,
  `Categories_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Shop_Items_Product_Users1` (`Users_ID` ASC) ,
  INDEX `fk_Shop_Items_Product_Categories1` (`Categories_ID` ASC) ,
  CONSTRAINT `fk_Shop_Items_Product_Users1`
    FOREIGN KEY (`Users_ID` )
    REFERENCES `wingsplatform`.`Users` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Shop_Items_Product_Categories1`
    FOREIGN KEY (`Categories_ID` )
    REFERENCES `wingsplatform`.`Categories` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Project_Types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Project_Types` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Project_Types` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Type` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Good_Practices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Good_Practices` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Good_Practices` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Project_Types_ID` INT NOT NULL ,
  `Organisation_name` VARCHAR(60) NOT NULL ,
  `Contact_information` VARCHAR(100) NOT NULL ,
  `Project_name` VARCHAR(200) NOT NULL ,
  `Acronym` VARCHAR(60) NULL ,
  `Website` VARCHAR(200) NULL ,
  `Contact_name` VARCHAR(60) NULL ,
  `Email` VARCHAR(100) NULL ,
  `Countries_ID` INT NOT NULL ,
  `Project_funding_start_date` DATE NULL ,
  `Project_funding_end_date` DATE NULL ,
  `Status` VARCHAR(45) NULL ,
  `Target_group_number_reached` VARCHAR(20) NULL ,
  `Number_of_languages` INT NULL ,
  `Level` VARCHAR(45) NULL ,
  `Training_format` VARCHAR(60) NULL ,
  `Materials_licence` VARCHAR(45) NULL ,
  `Materials_available` VARCHAR(45) NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Good_Practices_Countries1` (`Countries_ID` ASC) ,
  INDEX `fk_Good_Practices_Project_Types1` (`Project_Types_ID` ASC) ,
  CONSTRAINT `fk_Good_Practices_Countries1`
    FOREIGN KEY (`Countries_ID` )
    REFERENCES `wingsplatform`.`Countries` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Good_Practices_Project_Types1`
    FOREIGN KEY (`Project_Types_ID` )
    REFERENCES `wingsplatform`.`Project_Types` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Event_Types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Event_Types` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Event_Types` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Type` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Events` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Events` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Title` VARCHAR(100) NOT NULL ,
  `Date` DATE NOT NULL ,
  `Address` VARCHAR(200) NULL ,
  `Picture` VARCHAR(100) NULL ,
  `Summary` TEXT NOT NULL ,
  `URL` VARCHAR(200) NULL ,
  `Description` TEXT NOT NULL ,
  `Event_Types_ID` INT NOT NULL ,
  `Countries_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Events_Event_Types1` (`Event_Types_ID` ASC) ,
  INDEX `fk_Events_Countries1` (`Countries_ID` ASC) ,
  CONSTRAINT `fk_Events_Event_Types1`
    FOREIGN KEY (`Event_Types_ID` )
    REFERENCES `wingsplatform`.`Event_Types` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Events_Countries1`
    FOREIGN KEY (`Countries_ID` )
    REFERENCES `wingsplatform`.`Countries` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Speakers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Speakers` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Speakers` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(60) NOT NULL ,
  `Biography` TEXT NULL ,
  `Profession` VARCHAR(60) NOT NULL ,
  `Picture` VARCHAR(100) NOT NULL ,
  `Linkedin` VARCHAR(200) NULL ,
  `Website` VARCHAR(100) NULL ,
  `Countries_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Speakers_Countries1` (`Countries_ID` ASC) ,
  CONSTRAINT `fk_Speakers_Countries1`
    FOREIGN KEY (`Countries_ID` )
    REFERENCES `wingsplatform`.`Countries` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Speakers_has_Events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Speakers_has_Events` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Speakers_has_Events` (
  `Speakers_ID` INT NOT NULL ,
  `Events_ID` INT NOT NULL ,
  PRIMARY KEY (`Speakers_ID`, `Events_ID`) ,
  INDEX `fk_Speakers_has_Events_Events1` (`Events_ID` ASC) ,
  INDEX `fk_Speakers_has_Events_Speakers1` (`Speakers_ID` ASC) ,
  CONSTRAINT `fk_Speakers_has_Events_Speakers1`
    FOREIGN KEY (`Speakers_ID` )
    REFERENCES `wingsplatform`.`Speakers` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Speakers_has_Events_Events1`
    FOREIGN KEY (`Events_ID` )
    REFERENCES `wingsplatform`.`Events` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Learning_Materials_has_Tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Learning_Materials_has_Tags` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Learning_Materials_has_Tags` (
  `Learning_Materials_ID` INT NOT NULL ,
  `Tags_ID` INT NOT NULL ,
  PRIMARY KEY (`Learning_Materials_ID`, `Tags_ID`) ,
  INDEX `fk_Learning_Materials_has_Tags_Tags1` (`Tags_ID` ASC) ,
  INDEX `fk_Learning_Materials_has_Tags_Learning_Materials1` (`Learning_Materials_ID` ASC) ,
  CONSTRAINT `fk_Learning_Materials_has_Tags_Learning_Materials1`
    FOREIGN KEY (`Learning_Materials_ID` )
    REFERENCES `wingsplatform`.`Learning_Materials` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Learning_Materials_has_Tags_Tags1`
    FOREIGN KEY (`Tags_ID` )
    REFERENCES `wingsplatform`.`Tags` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`News`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`News` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`News` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Title` VARCHAR(100) NOT NULL ,
  `Picture` VARCHAR(100) NULL ,
  `Summary` TEXT NOT NULL ,
  `Description` TEXT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`News_has_Tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`News_has_Tags` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`News_has_Tags` (
  `News_ID` INT NOT NULL ,
  `Tags_ID` INT NOT NULL ,
  PRIMARY KEY (`News_ID`, `Tags_ID`) ,
  INDEX `fk_News_has_Tags_Tags1` (`Tags_ID` ASC) ,
  INDEX `fk_News_has_Tags_News1` (`News_ID` ASC) ,
  CONSTRAINT `fk_News_has_Tags_News1`
    FOREIGN KEY (`News_ID` )
    REFERENCES `wingsplatform`.`News` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_News_has_Tags_Tags1`
    FOREIGN KEY (`Tags_ID` )
    REFERENCES `wingsplatform`.`Tags` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Questions` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Questions` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Subject` VARCHAR(100) NOT NULL ,
  `Question` TEXT NOT NULL ,
  `Users_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Questions_Users1` (`Users_ID` ASC) ,
  CONSTRAINT `fk_Questions_Users1`
    FOREIGN KEY (`Users_ID` )
    REFERENCES `wingsplatform`.`Users` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Answers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Answers` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Answers` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Answer` TEXT NOT NULL ,
  `Correct` TINYINT(1) NOT NULL ,
  `Questions_ID` INT NOT NULL ,
  `Users_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Answers_Questions1` (`Questions_ID` ASC) ,
  INDEX `fk_Answers_Users1` (`Users_ID` ASC) ,
  CONSTRAINT `fk_Answers_Questions1`
    FOREIGN KEY (`Questions_ID` )
    REFERENCES `wingsplatform`.`Questions` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Answers_Users1`
    FOREIGN KEY (`Users_ID` )
    REFERENCES `wingsplatform`.`Users` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Questions_has_Tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Questions_has_Tags` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Questions_has_Tags` (
  `Questions_ID` INT NOT NULL ,
  `Tags_ID` INT NOT NULL ,
  PRIMARY KEY (`Questions_ID`, `Tags_ID`) ,
  INDEX `fk_Questions_has_Tags_Tags1` (`Tags_ID` ASC) ,
  INDEX `fk_Questions_has_Tags_Questions1` (`Questions_ID` ASC) ,
  CONSTRAINT `fk_Questions_has_Tags_Questions1`
    FOREIGN KEY (`Questions_ID` )
    REFERENCES `wingsplatform`.`Questions` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Questions_has_Tags_Tags1`
    FOREIGN KEY (`Tags_ID` )
    REFERENCES `wingsplatform`.`Tags` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Partner_Contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Partner_Contacts` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Partner_Contacts` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(60) NOT NULL ,
  `Email` VARCHAR(50) NOT NULL ,
  `Linkedin` VARCHAR(200) NULL ,
  `Partners_ID` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `fk_Partner_Contacts_Partners1` (`Partners_ID` ASC) ,
  CONSTRAINT `fk_Partner_Contacts_Partners1`
    FOREIGN KEY (`Partners_ID` )
    REFERENCES `wingsplatform`.`Partners` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Client_Descriptions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Client_Descriptions` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Client_Descriptions` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Good_Practices_has_Client_Descriptions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Good_Practices_has_Client_Descriptions` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Good_Practices_has_Client_Descriptions` (
  `Good_Practices_ID` INT NOT NULL ,
  `Client_Descriptions_ID` INT NOT NULL ,
  PRIMARY KEY (`Good_Practices_ID`, `Client_Descriptions_ID`) ,
  INDEX `fk_Good_Practices_has_Client_Descriptions_Client_Descriptions1` (`Client_Descriptions_ID` ASC) ,
  INDEX `fk_Good_Practices_has_Client_Descriptions_Good_Practices1` (`Good_Practices_ID` ASC) ,
  CONSTRAINT `fk_Good_Practices_has_Client_Descriptions_Good_Practices1`
    FOREIGN KEY (`Good_Practices_ID` )
    REFERENCES `wingsplatform`.`Good_Practices` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Good_Practices_has_Client_Descriptions_Client_Descriptions1`
    FOREIGN KEY (`Client_Descriptions_ID` )
    REFERENCES `wingsplatform`.`Client_Descriptions` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Recognition_Supporters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Recognition_Supporters` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Recognition_Supporters` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Supporter` VARCHAR(45) NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Good_Practices_has_Recognition_Supporters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Good_Practices_has_Recognition_Supporters` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Good_Practices_has_Recognition_Supporters` (
  `Good_Practices_ID` INT NOT NULL ,
  `Recognition_Supporters_ID` INT NOT NULL ,
  PRIMARY KEY (`Good_Practices_ID`, `Recognition_Supporters_ID`) ,
  INDEX `fk_Good_Practices_has_Recognition_Supporters_Recognition_Supp1` (`Recognition_Supporters_ID` ASC) ,
  INDEX `fk_Good_Practices_has_Recognition_Supporters_Good_Practices1` (`Good_Practices_ID` ASC) ,
  CONSTRAINT `fk_Good_Practices_has_Recognition_Supporters_Good_Practices1`
    FOREIGN KEY (`Good_Practices_ID` )
    REFERENCES `wingsplatform`.`Good_Practices` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Good_Practices_has_Recognition_Supporters_Recognition_Supp1`
    FOREIGN KEY (`Recognition_Supporters_ID` )
    REFERENCES `wingsplatform`.`Recognition_Supporters` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Sectors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Sectors` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Sectors` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Sector` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Good_Practices_has_Sectors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Good_Practices_has_Sectors` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Good_Practices_has_Sectors` (
  `Good_Practices_ID` INT NOT NULL ,
  `Sectors_ID` INT NOT NULL ,
  PRIMARY KEY (`Good_Practices_ID`, `Sectors_ID`) ,
  INDEX `fk_Good_Practices_has_Sectors_Sectors1` (`Sectors_ID` ASC) ,
  INDEX `fk_Good_Practices_has_Sectors_Good_Practices1` (`Good_Practices_ID` ASC) ,
  CONSTRAINT `fk_Good_Practices_has_Sectors_Good_Practices1`
    FOREIGN KEY (`Good_Practices_ID` )
    REFERENCES `wingsplatform`.`Good_Practices` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Good_Practices_has_Sectors_Sectors1`
    FOREIGN KEY (`Sectors_ID` )
    REFERENCES `wingsplatform`.`Sectors` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Services`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Services` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Services` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Service` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Good_Practices_has_Services`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Good_Practices_has_Services` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Good_Practices_has_Services` (
  `Good_Practices_ID` INT NOT NULL ,
  `Services_ID` INT NOT NULL ,
  PRIMARY KEY (`Good_Practices_ID`, `Services_ID`) ,
  INDEX `fk_Good_Practices_has_Services_Services1` (`Services_ID` ASC) ,
  INDEX `fk_Good_Practices_has_Services_Good_Practices1` (`Good_Practices_ID` ASC) ,
  CONSTRAINT `fk_Good_Practices_has_Services_Good_Practices1`
    FOREIGN KEY (`Good_Practices_ID` )
    REFERENCES `wingsplatform`.`Good_Practices` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Good_Practices_has_Services_Services1`
    FOREIGN KEY (`Services_ID` )
    REFERENCES `wingsplatform`.`Services` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Soft_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Soft_Skills` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Soft_Skills` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Soft_skill` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Good_Practices_has_Soft_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Good_Practices_has_Soft_Skills` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Good_Practices_has_Soft_Skills` (
  `Good_Practices_ID` INT NOT NULL ,
  `Soft_Skills_ID` INT NOT NULL ,
  PRIMARY KEY (`Good_Practices_ID`, `Soft_Skills_ID`) ,
  INDEX `fk_Good_Practices_has_Soft_Skills_Soft_Skills1` (`Soft_Skills_ID` ASC) ,
  INDEX `fk_Good_Practices_has_Soft_Skills_Good_Practices1` (`Good_Practices_ID` ASC) ,
  CONSTRAINT `fk_Good_Practices_has_Soft_Skills_Good_Practices1`
    FOREIGN KEY (`Good_Practices_ID` )
    REFERENCES `wingsplatform`.`Good_Practices` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Good_Practices_has_Soft_Skills_Soft_Skills1`
    FOREIGN KEY (`Soft_Skills_ID` )
    REFERENCES `wingsplatform`.`Soft_Skills` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Hard_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Hard_Skills` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Hard_Skills` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Hard_skill` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`Good_Practices_has_Hard_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`Good_Practices_has_Hard_Skills` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`Good_Practices_has_Hard_Skills` (
  `Good_Practices_ID` INT NOT NULL ,
  `Hard_Skills_ID` INT NOT NULL ,
  PRIMARY KEY (`Good_Practices_ID`, `Hard_Skills_ID`) ,
  INDEX `fk_Good_Practices_has_Hard_Skills_Hard_Skills1` (`Hard_Skills_ID` ASC) ,
  INDEX `fk_Good_Practices_has_Hard_Skills_Good_Practices1` (`Good_Practices_ID` ASC) ,
  CONSTRAINT `fk_Good_Practices_has_Hard_Skills_Good_Practices1`
    FOREIGN KEY (`Good_Practices_ID` )
    REFERENCES `wingsplatform`.`Good_Practices` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Good_Practices_has_Hard_Skills_Hard_Skills1`
    FOREIGN KEY (`Hard_Skills_ID` )
    REFERENCES `wingsplatform`.`Hard_Skills` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wingsplatform`.`User_Acceptances`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wingsplatform`.`User_Acceptances` ;

CREATE  TABLE IF NOT EXISTS `wingsplatform`.`User_Acceptances` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `Users_ID` INT NOT NULL ,
  `Token` VARCHAR(200) NOT NULL ,
  INDEX `fk_User_Acceptances_Users1` (`Users_ID` ASC) ,
  PRIMARY KEY (`ID`) ,
  CONSTRAINT `fk_User_Acceptances_Users1`
    FOREIGN KEY (`Users_ID` )
    REFERENCES `wingsplatform`.`Users` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`User_Roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`User_Roles` (`ID`, `Role`) VALUES (NULL, 'Admin');
INSERT INTO `wingsplatform`.`User_Roles` (`ID`, `Role`) VALUES (NULL, 'User');
INSERT INTO `wingsplatform`.`User_Roles` (`ID`, `Role`) VALUES (NULL, 'Webshop user');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Countries`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `Countries` (`Country`,`Continent`) VALUES ('Afghanistan','Asia'),
('Netherlands','Europe'),
('Netherlands Antilles','North America'),
('Albania','Europe'),
('Algeria','Africa'),
('American Samoa','Oceania'),
('Andorra','Europe'),
('Angola','Africa'),
('Anguilla','North America'),
('Antigua and Barbuda','North America'),
('United Arab Emirates','Asia'),
('Argentina','South America'),
('Armenia','Asia'),
('Aruba','North America'),
('Australia','Oceania'),
('Azerbaijan','Asia'),
('Bahamas','North America'),
('Bahrain','Asia'),
('Bangladesh','Asia'),
('Barbados','North America'),
('Belgium','Europe'),
('Belize','North America'),
('Benin','Africa'),
('Bermuda','North America'),
('Bhutan','Asia'),
('Bolivia','South America'),
('Bosnia and Herzegovina','Europe'),
('Botswana','Africa'),
('Brazil','South America'),
('United Kingdom','Europe'),
('Virgin Islands, British','North America'),
('Brunei','Asia'),
('Bulgaria','Europe'),
('Burkina Faso','Africa'),
('Burundi','Africa'),
('Cayman Islands','North America'),
('Chile','South America'),
('Cook Islands','Oceania'),
('Costa Rica','North America'),
('Djibouti','Africa'),
('Dominica','North America'),
('Dominican Republic','North America'),
('Ecuador','South America'),
('Egypt','Africa'),
('El Salvador','North America'),
('Eritrea','Africa'),
('Spain','Europe'),
('South Africa','Africa'),
('Ethiopia','Africa'),
('Falkland Islands','South America'),
('Fiji Islands','Oceania'),
('Philippines','Asia'),
('Faroe Islands','Europe'),
('Gabon','Africa'),
('Gambia','Africa'),
('Georgia','Asia'),
('Ghana','Africa'),
('Gibraltar','Europe'),
('Grenada','North America'),
('Greenland','North America'),
('Guadeloupe','North America'),
('Guam','Oceania'),
('Guatemala','North America'),
('Guinea','Africa'),
('Guinea-Bissau','Africa'),
('Guyana','South America'),
('Haiti','North America'),
('Honduras','North America'),
('Hong Kong','Asia'),
('Svalbard and Jan Mayen','Europe'),
('Indonesia','Asia'),
('India','Asia'),
('Iraq','Asia'),
('Iran','Asia'),
('Ireland','Europe'),
('Iceland','Europe'),
('Israel','Asia'),
('Italy','Europe'),
('East Timor','Asia'),
('Austria','Europe'),
('Jamaica','North America'),
('Japan','Asia'),
('Yemen','Asia'),
('Jordan','Asia'),
('Christmas Island','Oceania'),
('Yugoslavia','Europe'),
('Cambodia','Asia'),
('Cameroon','Africa'),
('Canada','North America'),
('Cape Verde','Africa'),
('Kazakstan','Asia'),
('Kenya','Africa'),
('Central African Republic','Africa'),
('China','Asia'),
('Kyrgyzstan','Asia'),
('Kiribati','Oceania'),
('Colombia','South America'),
('Comoros','Africa'),
('Congo','Africa'),
('Congo, The Democratic Republic of the','Africa'),
('Cocos (Keeling) Islands','Oceania'),
('North Korea','Asia'),
('South Korea','Asia'),
('Greece','Europe'),
('Croatia','Europe'),
('Cuba','North America'),
('Kuwait','Asia'),
('Cyprus','Europe'),
('Laos','Asia'),
('Latvia','Europe'),
('Lesotho','Africa'),
('Lebanon','Asia'),
('Liberia','Africa'),
('Libyan Arab Jamahiriya','Africa'),
('Liechtenstein','Europe'),
('Lithuania','Europe'),
('Luxembourg','Europe'),
('Western Sahara','Africa'),
('Macao','Asia'),
('Madagascar','Africa'),
('Macedonia','Europe'),
('Malawi','Africa'),
('Maldives','Asia'),
('Malaysia','Asia'),
('Mali','Africa'),
('Malta','Europe'),
('Morocco','Africa'),
('Marshall Islands','Oceania'),
('Martinique','North America'),
('Mauritania','Africa'),
('Mauritius','Africa'),
('Mayotte','Africa'),
('Mexico','North America'),
('Micronesia, Federated States of','Oceania'),
('Moldova','Europe'),
('Monaco','Europe'),
('Mongolia','Asia'),
('Montserrat','North America'),
('Mozambique','Africa'),
('Myanmar','Asia'),
('Namibia','Africa'),
('Nauru','Oceania'),
('Nepal','Asia'),
('Nicaragua','North America'),
('Niger','Africa'),
('Nigeria','Africa'),
('Niue','Oceania'),
('Norfolk Island','Oceania'),
('Norway','Europe'),
('Côte d\Ivoire','Africa'),
('Oman','Asia'),
('Pakistan','Asia'),
('Palau','Oceania'),
('Panama','North America'),
('Papua New Guinea','Oceania'),
('Paraguay','South America'),
('Peru','South America'),
('Pitcairn','Oceania'),
('Northern Mariana Islands','Oceania'),
('Portugal','Europe'),
('Puerto Rico','North America'),
('Poland','Europe'),
('Equatorial Guinea','Africa'),
('Qatar','Asia'),
('France','Europe'),
('French Guiana','South America'),
('French Polynesia','Oceania'),
('Réunion','Africa'),
('Romania','Europe'),
('Rwanda','Africa'),
('Sweden','Europe'),
('Saint Helena','Africa'),
('Saint Kitts and Nevis','North America'),
('Saint Lucia','North America'),
('Saint Vincent and the Grenadines','North America'),
('Saint Pierre and Miquelon','North America'),
('Germany','Europe'),
('Solomon Islands','Oceania'),
('Zambia','Africa'),
('Samoa','Oceania'),
('San Marino','Europe'),
('Sao Tome and Principe','Africa'),
('Saudi Arabia','Asia'),
('Senegal','Africa'),
('Seychelles','Africa'),
('Sierra Leone','Africa'),
('Singapore','Asia'),
('Slovakia','Europe'),
('Slovenia','Europe'),
('Somalia','Africa'),
('Sri Lanka','Asia'),
('Sudan','Africa'),
('Finland','Europe'),
('Suriname','South America'),
('Swaziland','Africa'),
('Switzerland','Europe'),
('Syria','Asia'),
('Tajikistan','Asia'),
('Taiwan','Asia'),
('Tanzania','Africa'),
('Denmark','Europe'),
('Thailand','Asia'),
('Togo','Africa'),
('Tokelau','Oceania'),
('Tonga','Oceania'),
('Trinidad and Tobago','North America'),
('Chad','Africa'),
('Czech Republic','Europe'),
('Tunisia','Africa'),
('Turkey','Asia'),
('Turkmenistan','Asia'),
('Turks and Caicos Islands','North America'),
('Tuvalu','Oceania'),
('Uganda','Africa'),
('Ukraine','Europe'),
('Hungary','Europe'),
('Uruguay','South America'),
('New Caledonia','Oceania'),
('New Zealand','Oceania'),
('Uzbekistan','Asia'),
('Belarus','Europe'),
('Wallis and Futuna','Oceania'),
('Vanuatu','Oceania'),
('Holy See (Vatican City State)','Europe'),
('Venezuela','South America'),
('Russian Federation','Europe'),
('Vietnam','Asia'),
('Estonia','Europe'),
('United States','North America'),
('Virgin Islands, U.S.','North America'),
('Zimbabwe','Africa'),
('Palestine','Asia'),
('Antarctica','Antarctica'),
('Bouvet Island','Antarctica'),
('British Indian Ocean Territory','Africa'),
('South Georgia and the South Sandwich Islands','Antarctica'),
('Heard Island and McDonald Islands','Antarctica'),
('French Southern territories','Antarctica'),
('United States Minor Outlying Islands','Oceania');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Users`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Users` (`ID`, `First_name`, `Last_name`, `Email`, `Password`, `Biography`, `Profession`, `Picture`, `LinkedIn`, `Website`, `Mentor`, `Countries_ID`, `User_Roles_ID`, `created_at`, `updated_at`, `Accept_date`, `remember_token`) VALUES (NULL, 'Jasper', 'Poppe', 'jasper.poppe@odisee.be', '$2y$10$5n2NsxC4FcRBc422rYq05O.axSuBgds4nnYz4pvWnQNf1M8VoHUcq', 'I live in Lokeren.', 'Developer at Odisee.', '1.jpg', 'https://www.linkedin.com/pub/jasper-poppe/a4/7a1/563', NULL, 1, 21, 1, '2014-10-13 13:21:31', '2014-10-13 13:21:31', '2014-10-14 13:21:31', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Project_Types`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Project_Types` (`ID`, `Type`) VALUES (NULL, 'EU Funded Project');
INSERT INTO `wingsplatform`.`Project_Types` (`ID`, `Type`) VALUES (NULL, 'National/Regional Project');
INSERT INTO `wingsplatform`.`Project_Types` (`ID`, `Type`) VALUES (NULL, 'Private Initiative project/programme');
INSERT INTO `wingsplatform`.`Project_Types` (`ID`, `Type`) VALUES (NULL, 'Networks');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Good_Practices`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Good_Practices` (`ID`, `Project_Types_ID`, `Organisation_name`, `Contact_information`, `Project_name`, `Acronym`, `Website`, `Contact_name`, `Email`, `Countries_ID`, `Project_funding_start_date`, `Project_funding_end_date`, `Status`, `Target_group_number_reached`, `Number_of_languages`, `Level`, `Training_format`, `Materials_licence`, `Materials_available`) VALUES (NULL, 1, 'Inova Consultancy', 'Helen Pearson', 'Female Entrepreneurs: mentoring & lifelong learning across Europe', 'Female', 'femaleproject.eu', 'Helen Pearson', 'projects@inovaconsult.com', 229, '01-10-2010', '30-09-2012', 'Still running', '50-99', 3, 'Start-up', 'Workshop lessons, Powerpoint, Podcasts', 'Paid', 'Yes');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Event_Types`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Event_Types` (`ID`, `Type`) VALUES (NULL, 'Consortium');
INSERT INTO `wingsplatform`.`Event_Types` (`ID`, `Type`) VALUES (NULL, 'Partner');
INSERT INTO `wingsplatform`.`Event_Types` (`ID`, `Type`) VALUES (NULL, 'Related');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Client_Descriptions`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Client_Descriptions` (`ID`, `Description`) VALUES (NULL, 'BME (Black and Ethnic Minority Group)');
INSERT INTO `wingsplatform`.`Client_Descriptions` (`ID`, `Description`) VALUES (NULL, 'Single parent');
INSERT INTO `wingsplatform`.`Client_Descriptions` (`ID`, `Description`) VALUES (NULL, 'Long term unemployed (2+ yrs)');
INSERT INTO `wingsplatform`.`Client_Descriptions` (`ID`, `Description`) VALUES (NULL, 'Disabled');
INSERT INTO `wingsplatform`.`Client_Descriptions` (`ID`, `Description`) VALUES (NULL, 'Migrants');
INSERT INTO `wingsplatform`.`Client_Descriptions` (`ID`, `Description`) VALUES (NULL, 'Young person (26 yrs and under)');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Good_Practices_has_Client_Descriptions`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Good_Practices_has_Client_Descriptions` (`Good_Practices_ID`, `Client_Descriptions_ID`) VALUES (1, 1);
INSERT INTO `wingsplatform`.`Good_Practices_has_Client_Descriptions` (`Good_Practices_ID`, `Client_Descriptions_ID`) VALUES (1, 2);
INSERT INTO `wingsplatform`.`Good_Practices_has_Client_Descriptions` (`Good_Practices_ID`, `Client_Descriptions_ID`) VALUES (1, 4);
INSERT INTO `wingsplatform`.`Good_Practices_has_Client_Descriptions` (`Good_Practices_ID`, `Client_Descriptions_ID`) VALUES (1, 5);

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Recognition_Supporters`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Recognition_Supporters` (`ID`, `Supporter`) VALUES (NULL, 'Chambers of Commerce');
INSERT INTO `wingsplatform`.`Recognition_Supporters` (`ID`, `Supporter`) VALUES (NULL, 'NGOs');
INSERT INTO `wingsplatform`.`Recognition_Supporters` (`ID`, `Supporter`) VALUES (NULL, 'Educational Institutions');
INSERT INTO `wingsplatform`.`Recognition_Supporters` (`ID`, `Supporter`) VALUES (NULL, 'Private sector');
INSERT INTO `wingsplatform`.`Recognition_Supporters` (`ID`, `Supporter`) VALUES (NULL, 'Trade unions');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Sectors`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Sectors` (`ID`, `Sector`) VALUES (NULL, 'Business');
INSERT INTO `wingsplatform`.`Sectors` (`ID`, `Sector`) VALUES (NULL, 'Education');
INSERT INTO `wingsplatform`.`Sectors` (`ID`, `Sector`) VALUES (NULL, 'Health');
INSERT INTO `wingsplatform`.`Sectors` (`ID`, `Sector`) VALUES (NULL, 'Trade');
INSERT INTO `wingsplatform`.`Sectors` (`ID`, `Sector`) VALUES (NULL, 'Culture');
INSERT INTO `wingsplatform`.`Sectors` (`ID`, `Sector`) VALUES (NULL, 'Industry');
INSERT INTO `wingsplatform`.`Sectors` (`ID`, `Sector`) VALUES (NULL, 'Craft');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Good_Practices_has_Sectors`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Good_Practices_has_Sectors` (`Good_Practices_ID`, `Sectors_ID`) VALUES (1, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Services`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'Workshops');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'Networking');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'Face to face training');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'Coaching/Mentoring');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'Online delivery');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'Blended (online & face to face)');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'External evaluation');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'Case studies');
INSERT INTO `wingsplatform`.`Services` (`ID`, `Service`) VALUES (NULL, 'IT Services');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Good_Practices_has_Services`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Good_Practices_has_Services` (`Good_Practices_ID`, `Services_ID`) VALUES (1, 1);
INSERT INTO `wingsplatform`.`Good_Practices_has_Services` (`Good_Practices_ID`, `Services_ID`) VALUES (1, 2);
INSERT INTO `wingsplatform`.`Good_Practices_has_Services` (`Good_Practices_ID`, `Services_ID`) VALUES (1, 6);
INSERT INTO `wingsplatform`.`Good_Practices_has_Services` (`Good_Practices_ID`, `Services_ID`) VALUES (1, 7);
INSERT INTO `wingsplatform`.`Good_Practices_has_Services` (`Good_Practices_ID`, `Services_ID`) VALUES (1, 8);

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Soft_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Communication');
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Leadership');
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Action planning');
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Team working');
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Risk management');
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Adaptability');
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Flexibility');
INSERT INTO `wingsplatform`.`Soft_Skills` (`ID`, `Soft_skill`) VALUES (NULL, 'Organisation');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Good_Practices_has_Soft_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 1);
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 2);
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 3);
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 4);
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 5);
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 6);
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 7);
INSERT INTO `wingsplatform`.`Good_Practices_has_Soft_Skills` (`Good_Practices_ID`, `Soft_Skills_ID`) VALUES (1, 8);

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Hard_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'Finance');
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'Marketing');
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'Computer programming');
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'Web design');
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'Business planning');
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'Accounting');
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'IT training');
INSERT INTO `wingsplatform`.`Hard_Skills` (`ID`, `Hard_skill`) VALUES (NULL, 'Business management');

COMMIT;

-- -----------------------------------------------------
-- Data for table `wingsplatform`.`Good_Practices_has_Hard_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `wingsplatform`;
INSERT INTO `wingsplatform`.`Good_Practices_has_Hard_Skills` (`Good_Practices_ID`, `Hard_Skills_ID`) VALUES (1, 2);
INSERT INTO `wingsplatform`.`Good_Practices_has_Hard_Skills` (`Good_Practices_ID`, `Hard_Skills_ID`) VALUES (1, 8);

COMMIT;
