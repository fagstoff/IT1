# McBergbys - del 18: Implementering av databasedesign - SQL

**SQL-sjefen i McBergbys har kommet hjem igjen fra SQL-konferansen i Australia, og nå har han sett over løsningsforslagene dere laget for nytt databasedesign. "Dette ser veldig bra ut" sa SQL-sjefen. "Jeg har finpusset litt på forslagene, og nå må du  implementere designet."**

## Oppgave

Bruk diagrammet nedenfor som utgangspunkt for implementeringen av databasen. Du må skrive all nødvendig SQL-kode for å opprette tabellene (`CREATE TABLE ...` og så videre). 

Pass på at primærnøkkelen i Ordredetaljer-tabellen er en sammensatt nøkkel. Primærnøklene i alle de andre tabellene kan du sette til `AUTO_INCREMENT`.

Kolonnene `tlf` i Kunder-tabellen og `produktnavn` i Produkter-tabellen skal brukes mye til oppslag i disse tabellene, og du må derfor skrive nødvendig kode for å indeksere disse kolonnene.

![McBergbys](https://raw.githubusercontent.com/fagstoff/IT1/master/Bilder/mcbergbys-18.png)

Når du har laget tabellene, kan du sette inn disse radene i Produkter-tabellen:
``` sql
INSERT INTO `Produkter` (`id`, `produktnavn`, `beholdning`, `pris`)
VALUES
	(1, 'superburger', 990, 50.00),
	(2, 'cheeseburger', 993, 50.00),
	(3, 'veggisburger', 996, 50.00),
	(4, 'cola', 989, 19.00),
	(5, 'solo', 998, 19.00),
	(6, 'sitronbrus', 999, 19.00),
	(7, 'vann', 994, 19.00),
	(8, 'pommesfrites', 991, 30.00),
	(9, 'løkringer', 992, 30.00),
	(10, 'cheesesticks', 987, 30.00),
	(11, 'ketchup', 985, 2.50),
	(12, 'sennep', 998, 2.50),
	(13, 'grillkrydder', 997, 2.50),
	(14, 'dip', 999, 2.50);
``` 

I tillegg til å sette opp alle tabellene i databasesystemet, må du skrive disse spørringene:

1. En spørring som henter `id` fra Kunder-tabellen for et gitt telefonnummer (`SELECT ...`).
2. En spørring som setter inn en ny kunde i Kunder-tabellen (`INSERT INTO ...`).
3. En spørring som setter inn en ny ordre i Ordrer-tabellen (`INSERT INTO ...`).
4. En spørring som setter inn en ny ordredetalj i Ordredetaljer-tabellen (`INSERT INTO ...`).
5. En spørring som reduserer beholdningen med èn for et gitt produktnavn i Produkter-tabellen (`UPDATE ...`).
6. En spørring som velger `id` og `pris` fra Produkter-tabellen for et gitt produktnavn.
7. En spørring som henter `Ordrer.id, Kunder.fornavn, Kunder.etternavn, Kunder.tlf, Ordrer.tidspunkt, Ordrer.status` fra Ordrer-tabellen og Kunder-tabellen (`SELECT ... JOIN ...`).
8. En spørring som henter `Produkter.produktnavn, Ordredetaljer.kvantitet, Ordredetaljer.enhetspris` fra Ordredetaljer-tabellen og Produkter-tabellen (`SELECT ... JOIN ...`).

Alle disse spørringene skal benyttes av PHP-eksperten i McBergbys når hun skal implementere ditt databasedesign i Web-applikasjonen.

For at du skal ha noe å teste med, kan du sette inn disse eksempel-dataene i databasen din (husk også Produkter ovenfor):

``` sql
INSERT INTO `Kunder` (`id`, `fornavn`, `etternavn`, `tlf`)
VALUES
	(1, 'Rune', 'Mathisen', 44455666),
	(2, 'Mikke', 'Mus', 99999111),
	(3, 'Donald ', 'Duck', 54321999);

INSERT INTO `Ordrer` (`id`, `kunde_id`, `tidspunkt`, `totalpris`, `status`)
VALUES
	(1, 1, '2016-03-24 08:12:54', 99.00, 'utlevert'),
	(2, 2, '2016-03-24 08:14:42', 99.00, 'utlevert'),
	(3, 3, '2016-03-24 08:14:55', 99.00, 'utlevert'),
	(4, 2, '2016-03-24 08:16:07', 99.00, 'utlevert'),
	(5, 3, '2016-03-24 08:20:14', 99.00, 'utlevert'),
	(6, 1, '2016-03-24 08:20:45', 99.00, 'utlevert'),
	(7, 1, '2016-03-24 08:22:51', 99.00, 'ferdig'),
	(8, 3, '2016-03-24 08:25:08', 99.00, 'ferdig'),
	(9, 1, '2016-03-24 08:26:22', 99.00, 'ferdig'),
	(10, 2, '2016-03-24 08:26:36', 99.00, 'utfører'),
	(11, 3, '2016-03-24 08:26:46', 99.00, 'utfører'),
	(12, 1, '2016-03-24 08:28:21', 99.00, 'bestilt'),
	(13, 1, '2016-03-24 09:09:18', 99.00, 'bestilt'),
	(14, 2, '2016-03-24 13:03:12', 99.00, 'bestilt'),
	(15, 3, '2016-03-24 15:45:54', 99.00, 'bestilt');

INSERT INTO `Ordredetaljer` (`ordre_id`, `produkt_id`, `kvantitet`, `enhetspris`)
VALUES
	(12, 1, 1, 50.00),
	(12, 5, 1, 19.00),
	(12, 8, 1, 30.00),
	(13, 1, 1, 50.00),
	(13, 5, 1, 19.00),
	(13, 8, 1, 30.00),
	(13, 11, 1, 2.50),
	(14, 3, 1, 50.00),
	(14, 6, 1, 19.00),
	(14, 9, 1, 30.00),
	(14, 11, 1, 2.50),
	(14, 12, 1, 2.50),
	(14, 13, 1, 2.50),
	(14, 14, 1, 2.50),
	(15, 3, 1, 50.00),
	(15, 7, 1, 19.00),
	(15, 10, 1, 30.00),
	(15, 12, 1, 2.50);
``` 


## Ressurser

* Se sidene som handler om databasedesign i læreboka di!
* [SQL Quick Reference](http://www.w3schools.com/sql/sql_quickref.asp) fra W3Schools


## Vurderingskriterier

* Alle de 8 SQL-spørringene fungerer og gir forventet resultat.

**Eksempel på forventet resultat fra spørring 7:**

![McBergbys](https://raw.githubusercontent.com/fagstoff/IT1/master/Bilder/mcbergbys-18-q7.png)

**Eksempel på forventet resultat fra spørring 8:**

![McBergbys](https://raw.githubusercontent.com/fagstoff/IT1/master/Bilder/mcbergbys-18-q8.png)


## Kompetansemål

* utvikle normaliserte datamodeller ut fra problemstillinger og begrunne valgene som er gjort
* lage databaser i henhold til gitte datamodeller
* utvikle, presentere og begrunne databaseapplikasjoner

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
