# McBergbys - del 23: HTML, CSS og PHP (repetisjonsoppgave 2)

**I den nyeste versjonen av McBergbys web-applikasjon er mulig å hente ut ordrelister og ordredetaljer, men disse sidene er ikke  tilgjengelige fra navigasjonsmenyen. Nå må du lage en ny side som gir tilgang til de to ordresidene, samtidig som du lager et system for å velge hvilke detaljer som skal vises.**

## Oppgave

Lag en ny side `ordrer.php`. Denne siden skal inneholde to skjemaer:

1. Ett skjema som starter med `<form action="ordreliste.php" method="get">` og som bruker HTML-taggen `select` for å sette en verdi til parameteren `ordrestatus`. Valgbare verdier for ordrestatus skal være:
2. Ett skjema som starter med `<form action="ordredetaljer.php" method="get">` og som bruker HTML-taggen `input` for å sette en verdi til parameteren `ordreid`. 

Du ser et eksempel på hvordan løsningen kan se ut nedenfor.

![McBergbys oppgave 23](https://raw.githubusercontent.com/fagstoff/IT1/master/img/mcbergbys-23.png)


## Ressurser

* [Om HTML form-elementer](http://www.w3schools.com/html/html_form_elements.asp) fra W3Schools


## Vurderingskriterier

* Siden skal validere som HTML5 uten feil og advarsler på [validator.w3.org](https://validator.w3.org/).
* Submit fra det ene skjemaet skal hente fram siden `ordreliste.php` og vise det aktuelle ordrer ut fra hva som er valgt for ordrestatus i skjemaet.
* Submit fra det andre skjemaet skal hente fram siden `ordredetaljer.php` og vise detaljene for den spesifiserte ordren.

## Kompetansemål

* utvikle nettsteder i henhold til planer og vurdere om krav til brukergrensesnitt er oppfylt
* redigere nettsteder ved bruk av standardiserte oppmerkingsspråk
* lage dynamiske nettsider som bruker en database ved hjelp av spørrespråk og programvare på tjener


>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
