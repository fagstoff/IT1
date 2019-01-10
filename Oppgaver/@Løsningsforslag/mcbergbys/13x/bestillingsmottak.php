<?php
//Før vi gir brukeren en bestillingsbekreftelse og lagrer bestillingen 
//i en database, må vi sjekke om vi har fått et gyldig telefonnummer.
//Noen kan finne på å skrive telefonnummeret slik: 999 88 777.
//Vi fjerner alle mellomrom før vi sjekker om det er et gyldig nummer.
//Resultatet kopierer vi inn i en ny variabel $tlf
//Se http://php.net/manual/en/function.str-replace.php
if (isset($_POST['tlf'])) {
  $tlf = str_replace(" ","", $_POST['tlf']);
} else {
  $tlf = null;
}
//Nå er vi klare for å teste om det er et gyldig telefonnummer.
//Vi sjekker om det er et tall med 8 siffer. Dersom kravene ikke
//oppfylles sendes brukeren tilbake til forrige side.
//Se http://php.net/manual/en/function.is-numeric.php
//og http://php.net/manual/en/function.strlen.php
if (is_numeric($tlf) && strlen((string)$tlf) == 8) {
  $tlf_ok = true;//Vi har et gyldig nummer
} else {
  $tlf_ok = false;//Telefonnummeret var ugyldig
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
          <a class="nav-item nav-link active" href="index.html">Bestilling</a>
          <a class="nav-item nav-link" href="om.html">Om&nbsp;McBergbys</a>
          <a class="nav-item nav-link" href="hamburgerskolen.html">Burgerskolen</a>
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
} else {//Dersom telefonnummeret er ok, kjøres koden nedenfor.echo "<p>";//Begynner et nytt avsnitt her
  if (isset($_POST['navn'])) {
    echo "Tusen takk for din bestilling {$_POST['navn']}. ";
  }
  echo "Vi har registrert bestillingen din på telefonnummer "; 
  echo "<strong>{$tlf}</strong>. "; 
  echo "Vennligst oppgi dette nummeret når du henter bestillingen din.";
  echo "</p>\n<p>";//Begynner et nytt avsnitt her
  if (isset($_POST['burger'])) {//Brukeren har bestilt burger
    echo "Vi ser at du bestilte en {$_POST['burger']}, det er et godt valg. ";
  }
  if (isset($_POST['drikke'])) {//Brukeren har bestilt drikke
    if ($_POST['drikke'] == 'vann') {//Brukeren bestilte vann
      echo "Du bestilte vann, det er veldig bra! ";
    } else {//Brukeren bestilte noe annet enn vann
      echo "Du bestilte {$_POST['drikke']}. ";
      echo "Jaja. Vann hadde vært et bedre valg, men du vet vel liksom best du da. ";
    }
  }
  if (isset($_POST['tilbehør'])) {//Brukeren har bestilt tilbehør
    echo "Som tilbehør bestilte du {$_POST['tilbehør']}. Greit nok.";
  }
  echo "</p>\n<p>";//Avslutter avsnitt og starter et nytt avsnitt

  //Nå skal vi se på hva brukeren eventuelt har bestilt av ekstra ting.
  //Først tester vi om vi faktisk har en array i variabelen $ekstra.
  //Se http://php.net/manual/en/function.is-array.php
  if(is_array(isset($_POST['ekstra']))) {
    echo "Vi noterte oss også at du bestilte litt ekstrautstyr til burgeren din. ";
    echo "Her er hva vi har registrert:</p>\n";
    echo "<ul>\n";
    //Nå jobber vi oss steg for steg gjennom hele lista, 
    //og skriver ut innholdet som en punktliste i HTML.
    //Se http://php.net/manual/en/control-structures.foreach.php
    foreach($_POST['ekstra'] as $e) {
      echo "<li>{$e}</li>\n";
    }
    echo "</ul>\n";
  }
}
?>
    
    <footer>
      <a href="personvern.html">Personvernerklæring</a>
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