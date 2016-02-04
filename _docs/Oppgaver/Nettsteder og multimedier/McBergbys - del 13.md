# McBergbys - del 13: Validering av skjemadata

**Nettsidene til McBergbys har nå et fungerende bestillingsskjema som skriver ut en proff ordrebekreftelse til brukeren, men dessverre er det mange brukere som surrer med telefonnummeret. De skriver inn alt mulig rart, så nå må du lage en test som sjekker at nummeret de taster inn er et gyldig telefonnummer.**

## Oppgave

Du skal ta utgangspunkt i det du laget i `McBergbys automagiske bestillingssystem - del 12`, og legge inn en kontroll av det inntastede telefonnummeret. Dersom det ikke er et gyldig telefonnummer, skal du gjøre brukeren oppmerksom på det.

En gammel IT-lærer har laget et enkelt forslag til validering av telefonnummeret, det kan du bruke som utgangspunkt for din implementering. Forslaget ser slik ut:

``` php
<?php
//Noen kan finne på å skrive telefonnummeret slik: 999 88 777.
//Vi fjerner alle mellomrom før vi sjekker om det er et gyldig nummer.
//Se http://php.net/manual/en/function.str-replace.php
$tlf = str_replace(" ","", $_POST['tlf']);

//Nå er vi klare for å teste om det er et gyldig telefonnummer.
//Vi sjekker om det er et tall med 8 siffer.
//Se http://php.net/manual/en/function.is-numeric.php
//og http://php.net/manual/en/function.strlen.php
if (is_numeric($tlf) && strlen((string)$tlf) == 8) {//Vi har et gyldig nummer
  $tlf_ok = true;
} else {//Brukeren har ikke tastet inn telefonnummeret riktig
  $tlf_ok = false;
}
?>
```

## Ressurser

* Du trenger en teksteditor og en nettleser til denne oppgaven.
* Du må ha tilgang til en Web-server som kan kjøre PHP-filer.
* Relevant fagtekst til oppgaven [finner du her](https://github.com/fagstoff/IT1/blob/master/_docs/fagstoff/databaser/04.%20PHP.md).
* Du bør også bruke [PHP 5 Tutorial](http://www.w3schools.com/php/default.asp) fra W3Schools som oppslagsverk når du jobber.

## Vurderingskriterier

* Når du trykker "Send bestilling" i bestillingsskjemaet og har tastet inn et ugyldig telefonnummer, skal resultatsiden vise en advarsel. Dersom nummeret er ok, skal siden vise en ordrebekreftelse.

## Kompetansemål

* lage dynamiske nettsider som bruker en database ved hjelp av spørrespråk og programvare på tjener

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
