-- Dette løsningsforslaget er laget for MySQL
CREATE TABLE Kunder (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    fornavn VARCHAR(255), 
    etternavn VARCHAR(255), 
    tlf INTEGER NOT NULL UNIQUE
);

CREATE TABLE Ordrer (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    kunde_id INTEGER,
    tidspunkt DATETIME,
    totalpris DECIMAL(5,2),
    status ENUM('bestilt','utfører','ferdig','utlevert')
);

CREATE TABLE Ordredetaljer (
    ordre_id INTEGER NOT NULL,
    produkt_id INTEGER NOT NULL,
    kvantitet INTEGER,
    enhetspris DECIMAL(5,2),
    PRIMARY KEY (ordre_id, produkt_id)
);

CREATE TABLE Produkter (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    produktnavn VARCHAR(191) NOT NULL UNIQUE,
    beholdning INTEGER,
    pris DECIMAL(5,2)
);
-- Vi starter med at alle produkter har en lagerbeholdning på 999 enheter
INSERT INTO Produkter (produktnavn,beholdning,pris)
VALUES
    ('superburger', 999, 50.00),
    ('cheeseburger', 999, 50.00),
    ('veggisburger', 999, 50.00),
    ('cola', 999, 19.00),
    ('solo', 999, 19.00),
    ('sitronbrus', 999, 19.00),
    ('vann', 999, 19.00),
    ('pommesfrites', 999, 30.00),
    ('løkringer', 999, 30.00),
    ('cheesesticks', 999, 30.00),
    ('ketchup', 999, 2.50),
    ('sennep', 999, 2.50),
    ('grillkrydder', 999, 2.50),
    ('dip', 999, 2.50);
