# McBergbys - del 11: Motta innhold fra HTML-skjemaer

**Bestillingsskjemaet til McBergbys ser flott ut, men hvor blir det av det som kundene fyller inn? Du har fått jobben med å implementere systemet som tar imot bestillingene.**

## Oppgave

Du skal ta utgangspunkt i det du laget i `McBergbys automagiske bestillingssystem - del 10`, og lage en PHP-fil som tar imot innholdet i bestillingsskjemaet. Fila skal hete `bestillingsmottak.php`. Legg denne koden inn i form-elementet i HTML-fila som inneholder bestillingsskjemaet:

`<form action="bestillingsmottak.php" method="post">`

I mottaksfila `bestillingsmottak.php` bruker du PHP-funksjonen `print_r` for å skrive ut innholdet i variablen `$_POST`. Mottaksfila skal bruke den CSS-fila du har brukt på de andre McBergbys-sidene, sånn at vi får en side som passer godt sammen med de eksisterende sidene. Du kan for eksempel implementere mottaksfila slik:

``` html
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="utf-8" />
  <title>Bestillingsmottak</title>
  <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
</head>
<body>
  <h1>Din bestilling</h1>
  <pre>
    <code>
    <?php 
       print_r($_POST);
    ?>
    </code>
  </pre>
</body> 
</html>
```

Når du fyller ut bestillingsskjemaet og trykker "Send bestilling" skal resultatet se omtrent slik ut:

![McBergbys](https://raw.githubusercontent.com/fagstoff/IT1/master/Bilder/mcbergbys-11.png)

## Ressurser

* Du trenger en teksteditor og en nettleser til denne oppgaven.
* Du må ha tilgang til en Web-server som kan kjøre PHP-filer.
* Relevant fagtekst til oppgaven [finner du her](https://github.com/fagstoff/IT1/blob/master/_docs/fagstoff/databaser/04.%20PHP.md).

## Vurderingskriterier

* Når du trykker "Send bestilling" i bestillingsskjemaet skal resultatsiden se omtrent ut som bildet over (avhengig av hva som bestilles og av CSS-fila du bruker).

## Kompetansemål

* lage dynamiske nettsider som bruker en database ved hjelp av spørrespråk og programvare på tjener

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
