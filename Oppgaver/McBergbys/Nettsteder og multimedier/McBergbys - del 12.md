# McBergbys - del 12: Dynamiske nettsider

**Du har laget en side som fungerer som en ordrebekreftelse, men kundene er ikke særlig fornøyd med siden. Den ser veldig kryptisk ut, og det er ingen mulighet for å navigere videre. Du må forbedre siden.**

## Oppgave

Du skal ta utgangspunkt i det du laget i `McBergbys automagiske bestillingssystem - del 11`, og legge inn navigasjonsmenyen som er på alle andre sider på McBergbys-nettstedet.

I tillegg til navigasjonsmenyen må du bruke PHP for å lage en side som ser pen ut, og som oppleves som nyttig for kundene. Bruk alle triks du kan i PHP for å lage en spennende ordrebekreftelse. Et enkelt løsningsforslag er vist nedenfor:

![McBergbys](https://raw.githubusercontent.com/fagstoff/IT1/master/Bilder/McB12.png)

Bestillingen av "annet", som for eksempel ketchup og sennep, kommer som et `array` i variablen `$_POST`. Du må lage en løkke som går gjennom alle elementene i arrayet. Du kan for eksempel bruke `foreach($_POST['ekstra'] as $e) {...}`. Pass på at variabelnavnet (`ekstra`) passer med det du har brukt i bestillingsskjemaet ditt.

## Ressurser

* Du trenger en teksteditor og en nettleser til denne oppgaven.
* Du må ha tilgang til en Web-server som kan kjøre PHP-filer.
* Relevant fagtekst til oppgaven [finner du her](https://github.com/fagstoff/IT1/blob/master/Fagtekster/databaser/04.%20PHP.md).
* Du bør også bruke [PHP 5 Tutorial](http://www.w3schools.com/php/default.asp) fra W3Schools som oppslagsverk når du jobber.

## Vurderingskriterier

* Når du trykker "Send bestilling" i bestillingsskjemaet skal resultatsiden vise en ordrebekreftelse som er oversiktlig og ryddig.

## Kompetansemål

* lage dynamiske nettsider som bruker en database ved hjelp av spørrespråk og programvare på tjener

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
