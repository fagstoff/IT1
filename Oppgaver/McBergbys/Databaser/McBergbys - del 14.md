# McBergbys - del 14: Lagring av skjemadata til database

**McBergbys har et flott bestillingsskjema , men alle bestillinger som kundene sender inn forsvinner ut i det store intet. Vi må få på plass et system som lagrer bestillingene i en database, og det raskt!**

## Oppgave

Du skal ta utgangspunkt i det du laget i `McBergbys automagiske bestillingssystem - del 13`, og legge inn nødvendig kode for å lagre bestillingene til en database.

Du må også opprette en database for bestillingssystemet, det kan du for eksempel gjøre i MySQL. Du kan bruke denne koden for å opprette databasen og en databasebruker med nødvendige rettigheter:

``` sql
CREATE DATABASE mcbergbysdb;
GRANT ALL PRIVILEGES ON mcbergbysdb.* TO 'mcbruker'@'localhost' IDENTIFIED BY 'keHH-172QW_p';
FLUSH PRIVILEGES;
```

Her har vi valgt å kalle databasen for `mcbergbysdb`. Brukeren heter `mcbruker` og har passordet `keHH-172QW_p`. Du kan godt bruke noe annet, men husk å notere ned det du velger å bruke.

Foreløpig skal vi ikke jobbe så mye med databasedesignet for McBergbys, men velger en løsning som er enkel og fleksibel og lett å utvide. Opprett denne tabellen i databasen:

``` sql
CREATE TABLE Bestillinger (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  tidspunkt DATETIME, 
  bestilling TEXT
);
```

Det kreves en god del PHP-kode for å få dette til å fungere, men heldigvis har utviklingsteamet til McBerbys en PHP-ekspert med på laget. Hun har skrevet denne koden:

``` php
//Vi trenger et tidspunkt for når bestillingen ble gjort.
//Se https://secure.php.net/manual/en/function.date.php 
$tidspunkt = date("Y-m-d H:i:s");  

//Her legger vi inn databasenavn, brukernavn og passord som vi har satt opp i MySQL:
$db_host = 'localhost';
$db_navn = 'mcbergbysdb';
$db_bruker = 'mcbruker';
$db_pass = 'keHH-172QW_p';

//Vi forsøker først å opprette forbindelsen med databasen.
//Se https://secure.php.net/manual/en/function.mysqli-connect.php
$db_forbindelse = mysqli_connect($db_host, $db_bruker, $db_pass, $db_navn);
//Vi sjekker om forbindelsen ble opprettet
if (mysqli_connect_errno()) {
  die('Kunne ikke opprette forbindelse med databasen: ' . mysqli_connect_error()) ;
}

//For å kunne lagre informasjonen i $_POST til databasen, må vi gjøre den om til
//en spesielt formatert tekststreng. Det gjør vi enkelt med funksjonen serialize().
//Se https://secure.php.net/manual/en/function.serialize.php
$bestilling = serialize($_POST);

//Nå lager vi SQL-spørringen som skal kjøres (INSERT INTO...), og så
//kjører vi den i databasen som vi har opprettet en forbindelse til.
//Se https://secure.php.net/manual/en/mysqli.query.php
$spørring = "INSERT INTO Bestillinger(tidspunkt, bestilling) VALUES ('{$tidspunkt}', '{$bestilling}');";
mysqli_query($db_forbindelse, $spørring);

//Nå er vi ferdig, og kan lukke forbindelsen til databasen
mysqli_close($db_forbindelse);
```

Denne koden skal du legge inn etter skjemavalideringen du har implementert i `bestillingsmottak.php`, men før `<html>`. Her er det mye som skal klaffe for at alt skal fungere. Spør om hjelp dersom du står helt fast (men prøv først selv).

## Ressurser

* Du trenger en teksteditor og en nettleser til denne oppgaven.
* Du må ha tilgang til en Web-server som kan kjøre PHP-filer.
* Relevant fagtekst til oppgaven [finner du her](https://github.com/fagstoff/IT1/blob/master/Fagstoff/databaser/04.%20PHP.md).
* Du bør også bruke [PHP 5 Tutorial](http://www.w3schools.com/php/default.asp) fra W3Schools som oppslagsverk når du jobber.

## Vurderingskriterier

* Når du trykker "Send bestilling" i bestillingsskjemaet skal bestillingen lagres til en database.

## Kompetansemål

* lage dynamiske nettsider som bruker en database ved hjelp av spørrespråk og programvare på tjener

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
