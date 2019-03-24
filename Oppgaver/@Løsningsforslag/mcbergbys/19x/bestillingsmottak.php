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
$totalpris = hent_skjemadata('totalpris');

//Nå skal vi lagre bestillingen til databasen,
//men bare dersom skjemaet validerte til ok
if ($tlf_ok) {
  //Først må vi opprette en forbindelse med databasen.
  $db_forbindelse = åpne_db_forbindelse();
  //Så lagrer vi bestillingen
  $kundeid = lagre_kunde($db_forbindelse, $fornavn, $etternavn, $tlf);
  $ordreid= lagre_ordre($db_forbindelse, $kundeid, $totalpris);
  //echo "kundeid: $kundeid ordreid: $ordreid produkt: $burger";
  lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $burger);
  lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $drikke);
  lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $tilbehør);
  if (is_array($ekstra)) {
    foreach($ekstra as $e) {//Går gjennom alle bestillingene i "ekstra"
      lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $e);
    }
  }
  //Nå er vi ferdig, og kan lukke forbindelsen til databasen
  lukke_db_forbindelse($db_forbindelse);
}

?>
<!DOCTYPE html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="author" content="bitjungle">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="stiler/mcbergbys-bootstrap.css" />
  <title>McBergbys bestillingssystem</title>
</head>

<body>
  <nav class="navbar nav-tabs fixed-top bg-dark navbar-dark navbar-expand-sm pb-0">
    <div class="container">
      <a class="navbar-brand" id="logo" href="#">
        <img src="bilder/burger-1487481.svg" alt="McBergbys logo - CC0 midicomp" style="width: 40px;">McBergbys</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburgermeny" aria-controls="hamburgermeny"
        aria-expanded="false" aria-label="Vis navigasjonsmeny">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="hamburgermeny">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="index.php">Bestilling</a>
          <a class="nav-item nav-link" href="om.php">Om&nbsp;McBergbys</a>
          <a class="nav-item nav-link" href="hamburgerskolen.php">Burgerskolen</a>
        </div><!-- navbar-bar -->
      </div><!-- navbar-collapse -->
      <span class="navbar-text d-none d-xl-inline-block ml-5 bg-dark text-white" id="slogan">Vi har de feteste
        burgerne!</span>
    </div><!-- container -->
  </nav>
  <div class="container" id="hovedomraade">

      <h1>Din bestilling</h1>
      <?php
//Nedenfor skal vi skrive ut en bestillingsbekreftelse.
if ($tlf_ok == false) {//Om det er noe galt med tlf-nummeret, gir vi en beskjed om det.
  echo "<p>Det er noe galt med telefonnummeret ditt! ";
  echo "Gå tilbake til bestillingsskjemaet og rett det opp ";
  echo "(trykk på tilbakeknappen i nettleseren din).</p>";
} else {//Dersom telefonnummeret er ok, kjøres koden nedenfor.
  echo "<p>Tusen takk for din bestilling {$fornavn}. ";
  echo "Vi har registrert bestillingen din på telefonnummer "; 
  echo "<strong>{$tlf}</strong>. "; 
  echo "Vennligst oppgi dette nummeret når du henter bestillingen din.</p>\n";
  echo "<p>";//Begynner et nytt avsnitt her
  if (isset($burger)) {//Brukeren har bestilt burger
    echo "Vi ser at du bestilte en {$burger}, det er et godt valg. ";
  }
  if (isset($drikke)) {//Brukeren har bestilt drikke
    if ($drikke == 'vann') {//Brukeren bestilte vann
      echo "Du bestilte vann, det er veldig bra! ";
    } else {//Brukeren bestilte noe annet enn vann
      echo "Du bestilte {$drikke}. ";
      echo "Jaja. Vann hadde vært et bedre valg, men du vet vel liksom best du da. ";
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
    echo "Her er hva vi har registrert:</p>\n";
    echo "<ul>\n";
    //Nå jobber vi oss steg for steg gjennom hele lista, 
    //og skriver ut innholdet som en punktliste i HTML.
    //Se http://php.net/manual/en/control-structures.foreach.php
    foreach($ekstra as $e) {
      echo "<li>{$e}</li>\n";
    }
    echo "</ul>\n";
  }
}
?>
    
    <footer>
      <a href="personvern.php">Personvernerklæring</a>
    </footer>

  </div><!-- hoved -->

  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>
</html>