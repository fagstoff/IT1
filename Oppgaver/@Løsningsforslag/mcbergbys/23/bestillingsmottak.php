<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
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

//Inputfeltene "fornavn" og "etternavn" fra HTML-skjemaet er et tekstfelt, og av 
//sikkerhetsmessige grunner er det lurt å gjøre noen sjekker her også. Vi velger å 
//kode alle spesialtegn i tekststrengen brukeren har tastet inn. Hvis brukeren for 
//eksempel taster inn ">" vil det kodes til "&gt;".
$fornavn =  hent_skjemadata('fornavn', TRUE);
$etternavn =  hent_skjemadata('etternavn', TRUE);

//I koden nedenfor henter vi resten av verdiene fra $_POST og setter interne variabler.
//Vi gjør en sjekk på innholdet i $_POST, og setter eventuelt de interne variablene 
//til tomme verdier (NULL) dersom det ikke finnes noe relatert innhold i $_POST.
//Ønsker du å gjøre en grundigere validering av verdiene i bestillingsskjemaet,
//kan du gjøre det her.
$burger =  hent_skjemadata('burger');
$drikke = hent_skjemadata('drikke');
$tilbehør = hent_skjemadata('tilbehør');
$ekstra = hent_skjemadata('ekstra');

//Vi beregner ikke prisen foreløpig, hos McBergbys koster alle menyer kr. 99 uansett!
$totalpris = 99;

//Først må vi opprette en forbindelse med databasen. Vi må alltid huske å lukke denne
//forbindelsen igjen, men gjør ikke det før vi er sikker på at vi er helt ferdig
//med å bruke forbindelsen. Helt i bunn av denne fila blir forbindelsen lukket (sjekk!).
$db_forbindelse = åpne_db_forbindelse();

//Så lagrer vi bestillingen til databasen,
//men bare dersom skjemaet validerte til ok
if ($tlf_ok) {
  $kundeid = lagre_kunde($db_forbindelse, $fornavn, $etternavn, $tlf);
  $ordreid= lagre_ordre($db_forbindelse, $kundeid, $totalpris);
  //echo "kundeid: $kundeid ordreid: $ordreid produkt: $burger";
  lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $burger);
  lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $drikke);
  lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $tilbehør);
  foreach($ekstra as $e) {//Går gjennom alle bestillingene i "ekstra"
    lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $e);
  }
}
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="bitjungle">
    <title>Bestillingsmottak</title>
    <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
  </head>
  <body>
    <?php lag_navigasjonsmeny("index"); ?>
    <div class="hoved">
      <h1>Din bestilling</h1>     
<?php
//Nedenfor skal vi skrive ut en bestillingsbekreftelse.
if ($tlf_ok == false) {//Om det er noe galt med tlf-nummeret, gir vi en beskjed om det.
  echo "<p>Det er noe galt med telefonnummeret ditt! ";
  echo "Gå tilbake til bestillingsskjemaet og rett det opp ";
  echo "(trykk på tilbakeknappen i nettleseren din).</p>";
} else {//Dersom telefonnummeret er ok, kjøres koden nedenfor.
  echo "<p>Tusen takk for din bestilling {$fornavn} {$etternavn} med kundenummer {$kundeid}. ";
  echo "Vi har registrert bestillingen din med ordrenummer {$ordreid} på telefonnummer "; 
  echo "<strong>{$tlf}</strong>. "; 
  echo "Vennligst oppgi dette nummeret når du henter bestillingen din.</p>\n";
  echo "<p>";//Begynner et nytt avsnitt her
  if (isset($burger)) {//Brukeren har bestilt burger
    echo "Vi ser at du bestilte en {$burger}, det er et godt valg. ";
  }
  if (isset($drikke)) {//Brukeren har bestilt drikke
    if ($drikke == 'vann') {//Brukeren bestilte vann
      echo "Du bestilte vann, det er veldig bra!";
    } else {//Brukeren bestilte noe annet enn vann
      echo "Du bestilte {$drikke}. ";
      echo "Jaja. Vann hadde vært et bedre valg, men du vet vel liksom best du da.";
    }
  }
  if (isset($tilbehør)) {//Brukeren har bestilt tilbehør
    echo "Som tilbehør bestilte du {$tilbehør}. Greit nok.";
  }
  echo "</p>\n<p>";//Avslutter avsnitt og starter et nytt avsnitt
  
  //Nå skal vi se på hva brukeren eventuelt har bestilt av ekstra ting.
  //Først tester vi om vi faktisk har en array i variabelen $ekstra.
  //Se http://php.net/manual/en/function.is-array.php
  if(is_array($ekstra)) {
    echo "Vi noterte oss også at du bestilte litt ekstrautstyr til burgeren din. ";
    echo "Her er hva vi har registrert:\n";
    echo lag_liste($ekstra);
  }
  echo "</p>\n";
}
?>
    </div>
    <?php lag_footer(); ?>
  </body>
</html>
<?php
  //Nå er vi ferdig, og kan lukke forbindelsen til databasen.
  lukke_db_forbindelse($db_forbindelse);
?>