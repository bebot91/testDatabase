-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema User
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema User
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `User` DEFAULT CHARACTER SET utf8 ;
USE `User` ;

-- -----------------------------------------------------
-- Table `User`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`User` (
  `ID_User` INT NOT NULL AUTO_INCREMENT,
  `ID_UserAccount` INT NULL,
  `ID_UserKK` VARCHAR(75) NULL,
  `Aktiv` INT NULL,
  `Art` INT NULL,
  `DatumErstellt` DATETIME NULL,
  PRIMARY KEY (`ID_User`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`Session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`Session` (
  `ID_Session` INT NOT NULL AUTO_INCREMENT,
  `SessionIP` VARCHAR(55) NULL,
  `Client` VARCHAR(65) NULL,
  `Action` VARCHAR(45) NULL,
  `LastDate` DATETIME NULL,
  PRIMARY KEY (`ID_Session`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`UserHistory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`UserHistory` (
  `ID_History` INT NOT NULL AUTO_INCREMENT,
  `ID_User` INT NOT NULL,
  `User_Action` VARCHAR(45) NULL,
  `param1` INT NULL,
  `param2` FLOAT NULL,
  `LastDate` DATETIME NULL,
  `ID_Session` INT NOT NULL,
  PRIMARY KEY (`ID_History`, `ID_User`),
  INDEX `fk_UserHistory_User_idx` (`ID_User` ASC) VISIBLE,
  INDEX `fk_UserHistory_Session1_idx` (`ID_Session` ASC) VISIBLE,
  CONSTRAINT `fk_UserHistory_User`
    FOREIGN KEY (`ID_User`)
    REFERENCES `User`.`User` (`ID_User`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserHistory_Session1`
    FOREIGN KEY (`ID_Session`)
    REFERENCES `User`.`Session` (`ID_Session`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`UserSettings`
-- -----------------------------------------------------

CREATE TABLE `User`.`Coindata` (
  `ID_System` INT NOT NULL,
  `KursBez` VARCHAR(15) NULL,
  `iRoot` VARCHAR(5) NULL,
  `iCall` VARCHAR(5) NULL,
  `k1` FLOAT NULL,
  `k2` FLOAT NULL,
  `k3` FLOAT NULL,
  `k` FLOAT NULL)
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `User`.`UserSettings` (
  `ID_Settings` INT NOT NULL AUTO_INCREMENT,
  `ID_User` INT NOT NULL,
  `Art` INT NULL,
  `State` INT NULL,
  `LastDate` DATETIME NULL,
  PRIMARY KEY (`ID_Settings`, `ID_User`),
  INDEX `fk_UserSettings_User1_idx` (`ID_User` ASC) VISIBLE,
  CONSTRAINT `fk_UserSettings_User1`
    FOREIGN KEY (`ID_User`)
    REFERENCES `User`.`User` (`ID_User`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`Korrespondenz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`Korrespondenz` (
  `ID_Korrespondenz` INT NOT NULL AUTO_INCREMENT,
  `Aktiv` INT NULL,
  `Art` INT NULL,
  `Betreff` VARCHAR(75) NULL,
  `UserErstellt` INT NULL,
  `DatumErstellt` DATETIME NULL,
  `LastUser` INT NULL,
  `LastDate` DATETIME NULL,
  PRIMARY KEY (`ID_Korrespondenz`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`Korrespondenzteilnehmer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`Korrespondenzteilnehmer` (
  `ID_User` INT NOT NULL,
  `ID_Korrespondenz` INT NOT NULL,
  PRIMARY KEY (`ID_User`, `ID_Korrespondenz`),
  INDEX `fk_User_has_Korrespondenz_Korrespondenz1_idx` (`ID_Korrespondenz` ASC) VISIBLE,
  INDEX `fk_User_has_Korrespondenz_User1_idx` (`ID_User` ASC) VISIBLE,
  CONSTRAINT `fk_User_has_Korrespondenz_User1`
    FOREIGN KEY (`ID_User`)
    REFERENCES `User`.`User` (`ID_User`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Korrespondenz_Korrespondenz1`
    FOREIGN KEY (`ID_Korrespondenz`)
    REFERENCES `User`.`Korrespondenz` (`ID_Korrespondenz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`Nachricht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`Nachricht` (
  `ID_Nachricht` INT NOT NULL AUTO_INCREMENT,
  `Art` INT NULL,
  `Nachricht` TEXT NULL,
  `LastUser` INT NULL,
  `LastDate` DATETIME NULL,
  `Korrespondenz_ID_Korrespondenz` INT NOT NULL,
  PRIMARY KEY (`ID_Nachricht`),
  INDEX `fk_Nachricht_Korrespondenz1_idx` (`Korrespondenz_ID_Korrespondenz` ASC) VISIBLE,
  CONSTRAINT `fk_Nachricht_Korrespondenz1`
    FOREIGN KEY (`Korrespondenz_ID_Korrespondenz`)
    REFERENCES `User`.`Korrespondenz` (`ID_Korrespondenz`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`Kommunikation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`Kommunikation` (
  `ID_Kommunikation` INT NOT NULL AUTO_INCREMENT,
  `ID_User` INT NOT NULL,
  `Kommunikation` VARCHAR(65) NULL,
  `Art` INT NULL,
  `Verwendung` INT NULL,
  `DatumErstellt` DATETIME NULL,
  PRIMARY KEY (`ID_Kommunikation`),
  INDEX `fk_Kommunikation_User1_idx` (`ID_User` ASC) VISIBLE,
  CONSTRAINT `fk_Kommunikation_User1`
    FOREIGN KEY (`ID_User`)
    REFERENCES `User`.`User` (`ID_User`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `User`.`Wertebereich`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User`.`Wertebereich` (
  `ID_Wertebereich` INT NOT NULL AUTO_INCREMENT,
  `TabelleAttribut` VARCHAR(45) NULL,
  `Herkunft` VARCHAR(55) NULL,
  `Bezeichnung` VARCHAR(65) NULL,
  `Hardcode` INT NULL,
  `param1` INT NULL,
  `param2` VARCHAR(65) NULL,
  `LastDate` DATETIME NULL,
  `GueltigVon` DATETIME NULL,
  `GueltigBis` DATETIME NULL,
  PRIMARY KEY (`ID_Wertebereich`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- procedure sps_IN_PublicSession
-- -----------------------------------------------------

DELIMITER $$
USE `User`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sps_IN_PublicSession`(ip varchar(65),clint varchar(65), actn varchar(60))
BEGIN

	insert into User.Session (SessionIP,Client,Action,LastDate) values (ip,clint,actn,now());

END$$
DELIMITER ;

-- -----------------------------------------------------
-- procedure sps_IN_newUser
-- -----------------------------------------------------

DELIMITER $$
USE `User`$$
CREATE DEFINER=`remote1`@`%` PROCEDURE `sps_GET_COINDATA` (plattform int)
BEGIN
if (plattform = 2) THEN
	select * from User.Coindata where ID_System = 2;
ELSEIF (plattform = 1) THEN
	select * from User.Coindata where ID_System = 1;
END IF;

END$$
DELIMITER ;




-- -----------------------------------------------------
-- procedure sps_IN_newKommunikation
-- -----------------------------------------------------

DELIMITER $$
USE `User`$$
CREATE DEFINER=`remote1`@`%` PROCEDURE `sps_IN_newKommunikation`(		
										idKK varchar(75), 			-- ID Aus Keycloak
										kArt int,					-- wb kommunikation.art
                                        kVerw int,					-- wb kommunikation.verwendung
                                        kBezeichnung varchar(65),	-- Bezeichnung (also Mail oder Nummer)
										ip varchar(65), 
                                        clint varchar(65)
                                        )
BEGIN
	declare exArt boolean;
    declare exVerw boolean;
    
	declare doAction varchar(65);
    declare doState int;
	declare doUser int;
    declare doDatum datetime;

    
    
    -- WENN User EXISTIERT und Aktiv...
    IF (idKK in (select ID_UserKK from User.User where Aktiv = 1)) THEN
    
		-- TODO - prüfe, ob Wertebereiche existieren
        set exArt = true;
        set exVerw = true;
        
	-- WENN WERTEBEREICHE existieren ...
	IF (exArt and exVerw) THEN
    
			-- SELECT User-ID
			set doUser = (select max(ID_User) from User.User where ID_UserKK = idKK);
            
            -- INSERT KOMMUNIKATION
			insert into User.Kommunikation (ID_User,Kommunikation,Art,Verwendung,DatumErstellt)
								values (doUser,kBezeichnung,kArt,kVerw,now());
			
			-- Erfolg
            set doAction = 'Kommunikation Angelegt'; 		-- TODO Kommt aus Wertebereich 
			set doState = 1;	 						   	-- TODO Kommt aus Wertebereich 
            SELECT doState , doAction;
			insert into User.Session (SessionIP,Client,Action,LastDate) values (ip,clint,doAction, doDatum); 
			insert into User.UserHistory (ID_User, ID_Session, UserAction,LastDate) values ( doUser, (select max(ID_Session) from User.session),doAction, doDatum);
	ELSE	-- Misserfolg - Wb Existiert nicht
			set doAction = 'Kommunikation nicht Angelegt'; -- TODO Kommt aus Wertebereich 
            set doState = 2;	 						   -- TODO Kommt aus Wertebereich 
			SELECT doState, doAction;
			insert into User.Session (SessionIP,Client,Action,LastDate) values (ip,clint,doAction, doDatum); 
			insert into User.UserHistory (ID_User, ID_Session, UserAction,LastDate) values ( doUser, (select max(ID_Session) from User.session),doAction, doDatum); 
    END IF;

	ELSE 	-- Misserfolg - User existiert nicht
			set doAction = 'Kommunikation nicht Angelegt'; -- TODO Kommt aus Wertebereich 
            set doState = 3;	 						   -- TODO Kommt aus Wertebereich 
			SELECT doState , doAction;
			insert into User.Session (SessionIP,Client,Action,LastDate) values (ip,clint,doAction, doDatum); 

    END IF;



END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sps_LOG_HISTORY
-- -----------------------------------------------------

DELIMITER $$
USE `User`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sps_LOG_HISTORY`(
										ip varchar(65), 
                                        clint varchar(65),
                                        doUser int,
                                        doAction varchar(65),
                                        doState int,
                                        doDatum datetime,
                                        param int
									)
BEGIN
	-- Logge auf Userbezogen
	IF (param = 1) THEN
			insert into User.Session (SessionIP,Client,Action,LastDate) values (ip,clint,doAction, doDatum); 
			insert into User.UserHistory (ID_User, ID_Session, UserAction,LastDate) values ( doUser, (select max(ID_Session) from user.session),doAction, doDatum);
	
    -- Logge nicht Userbezogen (Keine verbundung zum USer vorhanden)
    ELSEIF (param = 2) THEN
			insert into User.Session (SessionIP,Client,Action,LastDate) values (ip,clint,doAction, doDatum); 
    END IF;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sps_IN_INITIAL
-- -----------------------------------------------------

DELIMITER $$
USE `User`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sps_IN_INITIAL`()
BEGIN
	-- Hier wird verhindert dass der Wb mehrfach imortiert wird
	IF ((select count(*) from User.Wertebereich) < 1) THEN

	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','index','Login',		1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','index','Anmelden',	2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','index','Produkte',	3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','index','Wer wir sind',4,now(),now());
    
  	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','anmelden','Login',		1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','anmelden','Anmelden',	2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','anmelden','Produkte',	3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','anmelden','Wer wir sind',4,now(),now());
  
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','login','Login',		1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','login','Anmelden',	2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','login','Produkte',	3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','login','Wer wir sind',4,now(),now());
  
  	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','info','Login',		1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','info','Anmelden',	2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','info','Produkte',	3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','info','Wer wir sind',4,now(),now());
  
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','products','Login',		1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','products','Anmelden',	2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','products','Produkte',	3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','products','Wer wir sind',4,now(),now());
  
  	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','main','Übersicht',1,now(),now());
   	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','main','Settings',	2,now(),now()); 
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','main','Produkte',	3,now(),now()); 
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','main','Logout',	4,now(),now()); 
    
    
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','settup','Übersicht',  1,now(),now());
   	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','settup','Settings',	2,now(),now()); 
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','settup','Produkte',	3,now(),now()); 
   	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pgbutton','settup','Logout',	    4,now(),now());  
    
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','index','CRYBOT/Feautures/public/login.php',1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','index','CRYBOT/Feautures/public/anmelden.php',2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','index','CRYBOT/Feautures/public/produkte.php',3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','index','CRYBOT/Feautures/public/info.php',4,now(),now());
  
  	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','anmelden','/CRYBOT/Feautures/public/login.php',1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','anmelden','/CRYBOT/Feautures/public/anmelden.php',2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','anmelden','/CRYBOT/Feautures/public/produkte.php',3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','anmelden','/CRYBOT/Feautures/public/info.php',4,now(),now());
    
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','login','/CRYBOT/Feautures/public/login.php',1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','login','/CRYBOT/Feautures/public/anmelden.php',2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','login','/CRYBOT/Feautures/public/produkte.php',3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','login','/CRYBOT/Feautures/public/info.php',4,now(),now());
    
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','info','/CRYBOT/Feautures/public/login.php',1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','info','/CRYBOT/Feautures/public/anmelden.php',2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','info','/CRYBOT/Feautures/public/produkte.php',3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','info','/CRYBOT/Feautures/public/info.php',4,now(),now());
    
    
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','products','/CRYBOT/Feautures/public/login.php',1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','products','/CRYBOT/Feautures/public/anmelden.php',2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','products','/CRYBOT/Feautures/public/produkte.php',3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','products','/CRYBOT/Feautures/public/info.php',4,now(),now());

	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','main','/CRYBOT/Feautures/private/main.php',1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','main','/CRYBOT/Feautures/private/settings.php',2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','main','/CRYBOT/Feautures/private/products.php',3,now(),now());
 	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','main','/CRYBOT/Feautures/public/login.php',4,now(),now());
    
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','settup','/CRYBOT/Feautures/private/main.php',1,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','settup','/CRYBOT/Feautures/private/settings.php',2,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','settup','/CRYBOT/Feautures/private/products.php',3,now(),now());
	insert into User.Wertebereich (TabelleAttribut,Herkunft,Bezeichnung,Hardcode,LastDate,GueltigVon) values ('pagedef.pglink','settup','/CRYBOT/Feautures/public/login.php',4,now(),now());
    
    
     insert into User.Coindata (ID_System,KursBez,iRoot,iCall,k1,k2,k3,k)
 					values (1,'CRO_USDT','USDT','CRO',0.112,0.110,0.111,0.110),
						   (1,'BTC_USDT','USDT','BTC',35.112,36.110,37.111,36.110);
    
insert into User.User (ID_UserAccount,ID_UserKK,Aktiv,Art,DatumErstellt) 
				values (1,'772270f2-61e6-415f-8932-f79c86776ef3',1,1,NOW());

END IF;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sps_GET_WERTEBEREICH
-- -----------------------------------------------------

DELIMITER $$
USE `User`$$
CREATE PROCEDURE `sps_GET_WERTEBEREICH` (TabAttr varchar(65), herkunft varchar(65))
BEGIN

	select Bezeichnung,Hardcode from User.Wertebereich
		where TabelleAttribut = TabAttr and Herkunft = herkunft
        order by Hardcode;
    
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure sps_GET_MENUEBUTTON
-- -----------------------------------------------------

DELIMITER $$
USE `User`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sps_GET_MENUEBUTTON`(herkunft varchar(65))
BEGIN

	select 
			wb.Bezeichnung as Bezeichnung,
			wb1.Bezeichnung as Link,  
			wb.Hardcode as HC 
    from User.Wertebereich wb
		left join User.Wertebereich wb1 on wb.Hardcode = wb1.Hardcode and wb1.TabelleAttribut = 'pagedef.pglink' and  wb1.Herkunft = herkunft
		where wb.TabelleAttribut = 'pagedef.pgbutton' and wb.Herkunft = herkunft
        order by wb.Hardcode;
    
END$$

DELIMITER ;

CALL User.sps_IN_INITIAL();


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
