-- Dette løsningsforslaget er laget for SQLite
CREATE TABLE Kunder (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    fornavn VARCHAR(255), 
    etternavn VARCHAR(255), 
    tlf INTEGER NOT NULL
);
CREATE TABLE Ordrer (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    kunde_id INTEGER,
    tidspunkt DATETIME,
    totalpris DECIMAL(5,2),
    status VARCHAR(8) NOT NULL DEFAULT ('bestilt') REFERENCES Ordrestatustyper(status)
);
CREATE TABLE Produkter (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
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
CREATE TABLE Ordrestatustyper (
    status VARCHAR(8) PRIMARY KEY NOT NULL,
    sekvens INTEGER
);
INSERT INTO Ordrestatustyper(status, sekvens) VALUES ('bestilt',1);
INSERT INTO Ordrestatustyper(status, sekvens) VALUES ('utfører',2);
INSERT INTO Ordrestatustyper(status, sekvens) VALUES ('ferdig',3);
INSERT INTO Ordrestatustyper(status, sekvens) VALUES ('utlevert',4);