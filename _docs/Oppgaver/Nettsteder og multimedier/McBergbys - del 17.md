# McBergbys - del 17: Databasedesign

**McBergbys har nettopp ansatt en ny SQL-sjef i utviklingsteamet sitt, og når den nye sjefen så hva vi hadde gjort med databasen vår så langt ble han sjokkert. "Hva i all verden" sa han, og slo hardt i bordet. "Dette er ikke godt nok!". Dessverre er den nye SQL-sjefen en travel mann, og nå skal han på en SQL-konferanse i Australia. "Dette må dere fikse mens jeg er borte", sa han mens han var på vei ut døra. "Dere bør ha minst fire tabeller: Ordre, Ordredetaljer, Produkter og Kunder. Og husk 1., 2. og 3. normalform!". Så forsvant han, og nå har du fått ansvaret med å fikse databasedesignet til McBergbys.**

## Oppgave

Det settes ned flere prosjektgrupper som hver for seg skal utarbeide et forslag til design. Forslagene skal presenteres for alle de andre gruppene. Hver prosjektgruppe skal ha 3-5 deltakere.

Prosjektgruppene skal ta utgangspunkt i det du laget i `McBergbys automagiske bestillingssystem - del 16` og lage et nytt databasedesign som er i henhold til reglene for 1., 2. og 3. normalform så langt som det er praktisk mulig. Det skal tegnes et ER-diagram som viser designet. Det kan også hende at gruppene må foreslå endringer i bestillingsskjemaet for å få til det nye databasedesignet.

Når prosjektgruppene har laget designet skal de implementere det i et databasesystem (for eksempel MySQL), og legge inn noen testdata manuelt. Lag også noen spørringer som bruker `JOIN` for å få ut hensiktsmessige og lett lesbare lister over bestillinger. Prosjektgruppene skal foreløpig ikke gjøre noen endringer i web-applikasjonen, det gjør vi etter at vi har tatt et endelig valg og testet databasedesignet vårt.


## Ressurser

* Se sidene som handler om databasedesign i læreboka di!
* [Artikkel om databasedesign på engelsk Wikipedia](https://en.wikipedia.org/wiki/Database_design)
* [Artikkel om ER-modellering på engelsk Wikipedia](https://en.wikipedia.org/wiki/Entity–relationship_model)
* Et dataprogram for å tegne ER-diagrammer, for eksempel Visio (desktop) eller [draw.io (online)](https://www.draw.io/)

## Vurderingskriterier

* Designet skal være i henhold til 1., 2. og 3. normalform. Eventuelle avvik må begrunnes godt.
* En spørring som henter ut relevante data fra tabellene, og som kan brukes for å liste opp bestillinger.

## Kompetansemål

* utvikle normaliserte datamodeller ut fra problemstillinger og begrunne valgene som er gjort
* lage databaser i henhold til gitte datamodeller
* utvikle, presentere og begrunne databaseapplikasjoner

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
