# McBergbys - del 15: Vi rydder!

**Bestillingssystemet til McBerbys begynner allerede å bli ganske omfattende, og det er på tide å rydde litt. Du har ansvaret, men du får heldigvis god hjelp av noen som kan PHP fra før.**

## Oppgave

Du skal ta utgangspunkt i det du laget i `McBergbys automagiske bestillingssystem - del 14`. Fram til nå har vi lagt all PHP-kode inn i fila `bestillingsmottak.php`, men det begynner å bli litt rotete og uoversiktlig. Det kan dessuten være lurt å legge opp til å kunne gjenbruke en del av PHP-koden på andre sider.

Hun som er PHP-ekspert i utviklingsteamet til McBerbys har laget en fil som er full av kjekke funksjoner. Du kan kopiere koden hennes nedenfor, og legge den inn i en fil som du kaller `funksjoner.php`. Disse funksjonene kan du så få tilgang til i alle andre filer ved å skrive koden `<?php require 'funksjoner.php';?>. Her er innholdet i `funksjoner.php`:

``` php
<?php
/**
 * Henter skjemadata fra $_POST.
 *
 * @param string $feltnavn Navnet på feltet du vil hente data fra
 * @param boolean $htmlspecialchars Konverterer spesialtegn til HTML-entiteter ved TRUE. Default er FALSE.
 * @return string Verdien i feltet, eller NULL dersom feltet ikke er satt
 */
function hent_skjemadata($feltnavn, $htmlspecialchars = FALSE) {
  if (isset($_POST[$feltnavn])) {
    if ($htmlspecialchars) {
      return htmlspecialchars($_POST[$feltnavn]);
    } else {
      return $_POST[$feltnavn];
    }
  } else {
    return NULL;
  }  
}


/**
 * Test for å sjekke om vi har et gyldig telefonnummer.
 * Vi sjekker om det er et tall med 8 siffer.
 * Utvid gjerne med andre smarte tester.
 * Hva med dem som ikke har et norsk mobilnummer?
 * 
 * Se http://php.net/manual/en/function.is-numeric.php
 * og http://php.net/manual/en/function.strlen.php
 *
 * @param $nummer Nummeret som skal testes
 * @return boolean Returnerer true dersom nummeret er ok, false ved feil
 */
function valider_telefonnummer($nummer) {
  if (is_numeric($nummer) && strlen((string)$nummer) == 8) {//Vi har et gyldig nummer
    return true;
  } else {//Brukeren har ikke tastet inn telefonnummeret riktig
    return false;
  }
}


/**
 * Åpner forbindelsen mot McBergbys-databasen.
 * Før du kjører denne koden må du manuelt opprette en database i MySQL.
 * Nedenfor finner du SQL-koden du kan kjøre for å opprette databasen.
 * Du kan godt endre brukernavn og passord som er brukt nedenfor, men
 * pass på at du gjør endringene i både SQL-koden og PHP-koden!
 * Husk å fjerne // før du kjører koden i MySQL.
 * 
 * CREATE DATABASE mcbergbysdb;
 * GRANT ALL PRIVILEGES ON mcbergbysdb.* TO 'mcbruker'@'localhost' IDENTIFIED BY 'keHH-172QW_p';
 * FLUSH PRIVILEGES;
 *
 * @return object databaseforbindelse
 */
function åpne_db_forbindelse() {
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
  } else {
    return $db_forbindelse;
  }
}


/**
 * Lukker forbindelsen til en database.
 * 
 * @param object $db_forbindelse Forbindelsen som skal lukkes
 */
function lukke_db_forbindelse($db_forbindelse) {
  mysqli_close($db_forbindelse);
}


/**
 * Lagrer innholdet i bestillingsskjemaet til databasen.
 * Funksjonen forutsetter at denne tabellen er satt opp i databasen:
 * 
 * CREATE TABLE Bestillinger (
 *   id INTEGER PRIMARY KEY AUTO_INCREMENT,
 *   tidspunkt DATETIME, 
 *   bestilling TEXT
 * );
 *
 * @param array $bestillingsdata Array med bestillingen som skal lagres til databasen
 * @param object $db_forbindelse Forbindelsen til databasen
 */
function lagre_bestilling($bestillingsdata, $db_forbindelse) {
  //For å kunne lagre informasjonen i $_POST til databasen, må bi gjøre den om til
  //en spesielt formatert tekststreng. Det gjør vi enkelt med funksjonen serialize().
  //Se https://secure.php.net/manual/en/function.serialize.php
  $bestilling = serialize($bestillingsdata);
  $tidspunkt = tid_nå();
  
  //Nå lager vi SQL-spørringen som skal kjøres (INSERT INTO...), og så
  //kjører vi den i databasen som vi har opprettet en forbindelse til.
  //Se https://secure.php.net/manual/en/mysqli.query.php
  $spørring = "INSERT INTO Bestillinger(tidspunkt, bestilling) VALUES ('{$tidspunkt}', '{$bestilling}');";
  mysqli_query($db_forbindelse, $spørring);
}


/**
 * Returnerer nåtidspunktet på formatet Y-m-d H:i:s
 * Se https://secure.php.net/manual/en/function.date.php
 *
 * @return string Dato og klokkeslett
 */
 function tid_nå() {
  return date("Y-m-d H:i:s");  
}


/**
 * Fjerner alle mellomrom i en tekststreng.
 * Se http://php.net/manual/en/function.str-replace.php
 *
 * @param string $tekststreng Tekststrengen som skal behandles
 * @return string Tekststreng med alle mellomrom fjernet
 */
function fjern_mellomrom($tekststreng) {
  return str_replace(" ","", $tekststreng);
}
?>
```

For at du skal kunne bruke `funksjoner.php` i alle filene på nettstedet til McBergbys, må du endre navn sånn at alle slutter på `.php`. Deretter skriver du koden `<?php require 'funksjoner.php';?>` inn i toppen av alle filene.

Når du har tilgang til alle funksjonene ovenfor, kan du forenkle starten av `bestillingsmottak.php` ganske mye. Her er et eksempel på hvordan denne nå kan se ut (mesteparten av koden nedenfor er bare kommentarer):

``` php
<?php
require 'funksjoner.php';

//Før vi gir brukeren en bestillingsbekreftelse og lagrer bestillingen 
//i en database, må vi sjekke om vi har fått all nødvendig informasjon.
//Vi sier at vi "validerer" informasjonen som brukeren sender fra skjemaet.
//Foreløpig velger vi å bare sjekke brukerens telefonnummer og navn.

//Noen kan finne på å skrive telefonnummeret med mellomrom
//slik: 999 88 777 eller slik: 33 44 55 66.
//Først henter vi det oppgitte telefonnummeret fra skjemaet.
//Deretter fjerner alle mellomrom.
//Til slutt sjekker vi om det er et gyldig nummer.
$tlf =  hent_skjemadata('tlf');
$tlf = fjern_mellomrom($tlf);
$tlf_ok = valider_telefonnummer($tlf);

//Inputfeltet "navn" fra HTML-skjemaet er et tekstfelt, og av sikkerhetsmessige
//grunner er det lurt å gjøre noen sjekker her også. Vi velger å kode alle 
//spesialtegn i tekststrengen brukeren har tastet inn. Hvis brukeren for eksempel
//taster inn ">" vil det kodes til "&gt;".
$navn =  hent_skjemadata('navn', TRUE);

//I koden nedenfor henter vi resten av verdiene fra $_POST og setter interne variabler.
//Vi gjør en sjekk på innholdet i $_POST, og setter eventuelt de interne variablene 
//til tomme verdier (NULL) dersom det ikke finnes noe relatert innhold i $_POST.
//Ønsker du å gjøre en grundigere validering av verdiene i bestillingsskjemaet,
//kan du gjøre det her.
$burger =  hent_skjemadata('burger');
$drikke = hent_skjemadata('drikke');
$tilbehør = hent_skjemadata('tilbehør');
$ekstra = hent_skjemadata('ekstra');

//Først må vi opprette en forbindelse med databasen
$db_forbindelse = åpne_db_forbindelse();

//Så lagrer vi bestillingen til databasen,
//men bare dersom skjemaet validerte til ok
if ($tlf_ok) {
  lagre_bestilling($_POST, $db_forbindelse);
}

//Nå er vi ferdig, og kan lukke forbindelsen til databasen
lukke_db_forbindelse($db_forbindelse);

?>
<!DOCTYPE html>
<html lang="no">
 ... (resten av html-koden her) ...
```

Her er det mye som skal klaffe for at alt skal fungere. Spør om hjelp dersom du står helt fast (men prøv først selv). 


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
