-- 1
SELECT id FROM Kunder WHERE tlf = 44455666;

-- 2
INSERT INTO Kunder(fornavn,etternavn,tlf)
  VALUES ('Jan', 'Johansen', 40011222);

-- 3
INSERT INTO Ordrer(kunde_id,tidspunkt,totalpris,status)
  VALUES (20, '2016-03-26 08:18', 99.00, 'bestilt');

-- 4
INSERT INTO Ordredetaljer(ordre_id, produkt_id, kvantitet, enhetspris)
  VALUES (20, 1, 1, 50.00);

-- 5
UPDATE Produkter SET beholdning = beholdning - 1 WHERE produktnavn = 'superburger';

-- 6
SELECT id, pris FROM Produkter WHERE produktnavn = 'superburger';

-- 7
SELECT Ordrer.id, Kunder.fornavn, Kunder.etternavn, Kunder.tlf, Ordrer.tidspunkt, Ordrer.status
               FROM Ordrer
               JOIN Kunder ON kunde_id = Kunder.id;

-- 8
SELECT Produkter.produktnavn, Ordredetaljer.kvantitet, Ordredetaljer.enhetspris
               FROM Ordredetaljer 
               JOIN Produkter ON produkt_id = Produkter.id
               WHERE ordre_id = 14;