-- Dette løsningsforslaget er laget for MySQL
CREATE TABLE Kunder (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    fornavn VARCHAR(255), 
    etternavn VARCHAR(255), 
    tlf INTEGER NOT NULL
);
CREATE TABLE Ordrer (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    kunde_id INTEGER,
    tidspunkt DATETIME,
    totalpris DECIMAL(5,2),
    status ENUM('bestilt','utfører','ferdig','utlevert')
);
CREATE TABLE Produkter (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    produktnavn VARCHAR(255),
    beholdning INTEGER,
    pris DECIMAL(5,2)
);
CREATE TABLE Ordredetaljer (
    ordre_id INTEGER NOT NULL,
    produkt_id INTEGER NOT NULL,
    kvantitet INTEGER,
    enhetspris DECIMAL(5,2),
    PRIMARY KEY (ordre_id, produkt_id)
);