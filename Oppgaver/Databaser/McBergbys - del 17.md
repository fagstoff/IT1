# McBergbys - del 17: Databasedesign

**McBergbys har nettopp ansatt en ny SQL-sjef i utviklingsteamet sitt, og når den nye sjefen så hva vi hadde gjort med databasen vår så langt ble han sjokkert. "Hva i all verden" sa han, og slo hardt i bordet. "Dette er ikke godt nok!". Dessverre er den nye SQL-sjefen en travel mann, og nå skal han på en SQL-konferanse i Australia. "Dette må dere fikse mens jeg er borte", sa han mens han var på vei ut døra. "Dere bør ha minst fire tabeller: Ordre, Ordredetaljer, Produkter og Kunder. Og husk 1., 2. og 3. normalform!". Så forsvant han, og nå har du fått ansvaret med å fikse databasedesignet til McBergbys.**

## Oppgave

Det settes ned flere prosjektgrupper som hver for seg skal utarbeide et forslag til design. Forslagene skal presenteres for alle de andre gruppene. Hver prosjektgruppe skal ha 3-5 deltakere.

Prosjektgruppene skal ta utgangspunkt i det du laget i `McBergbys automagiske bestillingssystem - del 16` og lage et nytt databasedesign som er i henhold til reglene for 1., 2. og 3. normalform så langt som det er praktisk mulig. Det skal tegnes et ER-diagram (eventuelt med kråkefot-notasjon) som viser designet.

Tenk nøye gjennom hva slags data dere vil lagre. Hvilke tabeller (entiteter) trenger dere? Hva skal lagres i hver enkelt tabell? Kan det være nyttig å vite hvilken status en bestilling har (bestilt, laget, utlevert osv.)? Bør vi registrere og oppdatere lagerstatus for råvarer? Hva er relasjonene mellom tabellene? Det er mange spørsmål dere bør tenke gjennom her. Det kan også hende at gruppene må foreslå endringer i bestillingsskjemaet for å få til det nye databasedesignet.

## Ressurser

* Se sidene som handler om databasedesign i læreboka di!
* [Artikkel om databasedesign på engelsk Wikipedia](https://en.wikipedia.org/wiki/Database_design)
* [Artikkel om ER-modellering på engelsk Wikipedia](https://en.wikipedia.org/wiki/Entity–relationship_model)
* [Artikkel om ER-modellering og kråkefot-notasjon](http://www.codeproject.com/Articles/878359/Data-modelling-using-ERD-with-Crow-Foot-Notation)
* Et dataprogram for å tegne ER-diagrammer, for eksempel Visio (desktop) eller [draw.io (online)](https://www.draw.io/)
* [Datatyper i SQL (W3Schools)](http://www.w3schools.com/sql/sql_datatypes_general.asp)

## Vurderingskriterier

* Designet skal være i henhold til 1., 2. og 3. normalform. Eventuelle avvik må begrunnes godt.
* Datatypene for de ulike kolonnene i tabellene skal være gjennomtenkte og velbegrunnede.

## Kompetansemål

* gjøre rede for begrepene primærnøkkel, kandidatnøkkel, fremmednøkkel og atomærkravet
* utvikle normaliserte datamodeller ut fra problemstillinger og begrunne valgene som er gjort
* lage databaser i henhold til gitte datamodeller
* utvikle, presentere og begrunne databaseapplikasjoner

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
