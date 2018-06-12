CREATE TABLE Bøker (
  `ISBN` VARCHAR(16) NOT NULL,
  `Tittel` TEXT,
  `Forlag` VARCHAR(255) DEFAULT NULL,
  `Utgivelsesår` INTEGER DEFAULT NULL,
  `Utgave` INT(10) unsigned DEFAULT NULL,
  `Språk` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
);

CREATE TABLE Eksemplarer (
  `Eksemplarnummer` INTEGER unsigned NOT NULL,
  `ISBN` varchar(16) NOT NULL,
  PRIMARY KEY (`Eksemplarnummer`,`ISBN`)
);

CREATE TABLE Bokforfattere (
  `ISBN` VARCHAR(16) NOT NULL,
  `Forfatter_ID` INTEGER NOT NULL,
  PRIMARY KEY (`ISBN`,`Forfatter_ID`)
);

CREATE TABLE Forfattere (
  `ID` INTEGER unsigned NOT NULL AUTO_INCREMENT,
  `Fornavn` VARCHAR(255) DEFAULT NULL,
  `Etternavn` VARCHAR(255) DEFAULT NULL,
  `Statsborgerskap` VARCHAR(255) DEFAULT NULL,
  `Fødselsår` INTEGER DEFAULT NULL,
  PRIMARY KEY (`ID`)
);


CREATE TABLE Låntakere (
  `ID` INTEGER unsigned NOT NULL AUTO_INCREMENT,
  `Fornavn` VARCHAR(255) NOT NULL,
  `Etternavn` VARCHAR(255) NOT NULL,
  `Gateadresse` TEXT NOT NULL,
  `Postnummer` CHAR(4) NOT NULL,
  `Mobilnummer` INT(8) DEFAULT NULL,
  PRIMARY KEY (`ID`)
);


CREATE TABLE Poststeder (
  `Postnummer` CHAR(4) NOT NULL,
  `Stedsnavn` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`Postnummer`)
);


CREATE TABLE Utlån (
  `Eksemplar_ID` INTEGER unsigned NOT NULL,
  `ISBN` VARCHAR(16) NOT NULL,
  `Låntaker_ID` INTEGER NOT NULL,
  `Utlånstidspunkt` DATETIME NOT NULL,
  `Innleveringstidspunkt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`Eksemplar_ID`,`Låntaker_ID`,`Utlånstidspunkt`,`ISBN`)
);


INSERT INTO `Låntakere` (`ID`, `Fornavn`, `Etternavn`, `Gateadresse`, `Postnummer`, `Mobilnummer`)
VALUES
	(1, 'Ole', 'Olsen', 'Nygata 2', '4609', 99988777),
	(2, 'Jens', 'Jensen', 'Gamlegata 3', '4609', 44455666),
	(3, 'Nils', 'Nilsen', 'Slottsplassen 1', '0010', 12345678);


INSERT INTO `Poststeder` (`Postnummer`, `Stedsnavn`)
VALUES
	(0010, 'Oslo'),
	(4609, 'Kardemomme by');


INSERT INTO `Forfattere` (`ID`, `Fornavn`, `Etternavn`, `Statsborgerskap`, `Fødselsår`)
VALUES
	(1, 'Jørn Kenneth', 'Andersen', 'Norsk', 1964),
	(2, 'Eyolf', 'Herø', 'Norsk', 1944),
	(3, 'Svein Olaf', 'Michelsen', 'Norsk', 1943),
	(4, 'Rolf', 'Rønning', 'Norsk', 1946),
	(5, 'Rune', 'Mathisen', 'Norsk', 1968),
	(6, 'Bengt', 'Starrin', 'Svensk', 1947),
	(7, 'Lars', 'Dahlgren', 'Svensk', 1948);

INSERT INTO `Bøker` (`ISBN`, `Tittel`, `Forlag`, `Utgivelsesår`, `Utgave`, `Språk`)
VALUES
	('9788205392489', 'Sosial kapital i et velferdsperspektiv', 'Gyldendal', 2009, 1, 'Bokmål'),
	('9788205418066', 'Tekniske tenester, faktabok', 'Gyldendal', 2012, 2, 'Nynorsk'),
	('9789147074334', 'Empowerment i teori og praksis', 'Liber', 2004, 1, 'Svensk');


INSERT INTO `Bokforfattere` (`ISBN`, `Forfatter_ID`)
VALUES
	('9788205392489', 4),
	('9788205392489', 6),
	('9788205418066', 1),
	('9788205418066', 2),
	('9788205418066', 3),
	('9788205418066', 4),
	('9788205418066', 5),
	('9789147074334', 6),
	('9789147074334', 7);


INSERT INTO `Eksemplarer` (`Eksemplarnummer`, `ISBN`)
VALUES
	(1, '9788205392489'),
	(1, '9788205418066'),
	(1, '9789147074334'),
	(2, '9788205392489'),
	(2, '9788205418066'),
	(2, '9789147074334'),
	(3, '9788205418066'),
	(3, '9789147074334'),
	(4, '9788205418066'),
	(5, '9788205418066'),
	(6, '9788205418066');


INSERT INTO `Utlån` (`Eksemplar_ID`, `ISBN`, `Låntaker_ID`, `Utlånstidspunkt`, `Innleveringstidspunkt`)
VALUES
	(1, '9788205418066', 1, '2016-05-13 08:41:00', NULL),
	(1, '9788205392489', 2, '2016-05-13 08:43:50', NULL),
	(2, '9788205418066', 2, '2016-05-13 08:42:00', NULL),
	(2, '9789147074334', 3, '2016-05-13 08:40:00', NULL);


-- List opp alle bøker med tilhørende forfatter-ider.
SELECT Bøker.Tittel, Bokforfattere.Forfatter_ID  FROM Bøker 
		JOIN Bokforfattere 
		ON Bøker.ISBN = Bokforfattere.ISBN;


-- List opp alle bøker sammen med fornavn og etternavn på forfatterne.
SELECT B.Tittel, F.Fornavn, F.Etternavn FROM Bokforfattere
    JOIN Bøker B
    ON Bokforfattere.ISBN = B.ISBN
    JOIN Forfattere F
    ON Bokforfattere.Forfatter_ID = F.ID;


--- Har forfatterne av boka "Tekniske tenester" skrevet noen andre bøker? Hent ut forfatter-idene og sjekk!
SELECT B.Tittel, F.Fornavn, F.Etternavn FROM Bokforfattere
    JOIN Bøker B
    ON Bokforfattere.ISBN = B.ISBN
    JOIN Forfattere F
    ON Bokforfattere.Forfatter_ID = F.ID 
    WHERE F.ID IN (
    	SELECT Forfatter_ID FROM Bokforfattere WHERE ISBN = '9788205418066'
    );

--- List opp låntakernes fornavn, etternavn og stedsnavn
SELECT Låntakere.Fornavn, Låntakere.Etternavn, Poststeder.Stedsnavn FROM Låntakere 
		JOIN Poststeder 
		ON Låntakere.Postnummer = Poststeder.Postnummer;

--- List opp tittel på utlånte bøker og utlånstidspunkt sammen med fornavn og etternavn på låntaker
SELECT B.Tittel, L.Fornavn, L.Etternavn, Utlån.Utlånstidspunkt FROM Utlån
    JOIN Bøker B
    ON Utlån.ISBN = B.ISBN
    JOIN Låntakere L 
    ON Utlån.Låntaker_ID = L.ID;