<?php
//Før vi gir brukeren en bestillingsbekreftelse og lagrer bestillingen 
//i en database, må vi sjekke om vi har fått all nødvendig informasjon.
//Foreløpig velger vi å bare sjekke brukerens telefonnummer.

//Noen kan finne på å skrive telefonnummeret slik: 999 88 777.
//Vi fjerner alle mellomrom før vi sjekker om det er et gyldig nummer.
//Se http://php.net/manual/en/function.str-replace.php
$tlf = str_replace(" ","", $_POST['tlf']);

//Nå er vi klare for å teste om det er et gyldig telefonnummer.
//Vi sjekker om det er et tall med 8 siffer. Dersom kravene ikke
//oppfylles sendes brukeren tilbake til forrige side.
//Se http://php.net/manual/en/function.is-numeric.php
//og http://php.net/manual/en/function.strlen.php
if (is_numeric($tlf) && strlen((string)$tlf) == 8) {//Vi har et gyldig nummer
  $tlf_ok = true;
} else {//Brukeren har ikke tastet inn telefonnummeret riktig
  $tlf_ok = false;
}
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8" />
    <title>Bestillingsmottak</title>
    <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
  </head>
  <body>
    <nav>
      <ul>
        <li>
          <div id="logo">McBergbys
          <br />burgersjappe</div>
        </li>
        <li>
          <a href="index.html">Bestilling</a>
        </li>
        <li>
          <a href="om.html">Om McBergbys</a>
        </li>
        <li>
          <a href="hamburgerskolen.html">Hamburgerskolen</a>
        </li>
      </ul>
    </nav>
    <div class="hoved">
      <h1>Din bestilling</h1>     
<?php
//Nedenfor skal vi skrive ut en bestillingsbekreftelse.
if ($tlf_ok == false) {//Om det er noe galt med tlf-nummeret, gir vi en beskjed om det.
  echo "<p>Det er noe galt med telefonnummeret ditt! ";
  echo "Gå tilbake til bestillingsskjemaet og rett det opp ";
  echo "(trykk på tilbakeknappen i nettleseren din).</p>";
} else {//Dersom telefonnummeret er ok, kjøres koden nedenfor.
  echo "<p>Tusen takk for din bestilling {$_POST['navn']}.";
  echo "Vi har registrert bestillingen din på telefonnummer "; 
  echo "<strong>{$_POST['tlf']}</strong>. "; 
  echo "Vennligst oppgi dette nummeret når du henter bestillingen din.</p>\n";
  echo "<p>Vi ser at du bestilte en {$_POST['burger']}, det er et godt valg.";
  if ($_POST['drikke'] == 'vann') {//Brukeren bestilte vann
    echo "Du bestilte også vann, det er veldig bra!";
  } else {//Brukeren bestilte noe annet enn vann
    echo "Du bestilte også {$_POST['drikke']}. ";
    echo "Jaja. Vann hadde vært et bedre valg, men du vet vel liksom best du da.";
  }
  echo "Som tilbehør bestilte du {$_POST['tilbehør']}. Greit nok.</p>\n";
  echo "<p>";
  //Først tester vi om vi faktisk har en array i variabelen $_POST['ekstra']
  //Se http://php.net/manual/en/function.is-array.php
  if(is_array($_POST['ekstra'])) {
    echo "Vi noterte oss også at du bestilte litt ekstrautstyr til burgeren din. ";
    echo "Her er hva vi har registrert:\n";
    echo "<ul>\n";
    //Nå jobber vi oss steg for steg gjennom hele lista, 
    //og skriver ut innholdet som en punktliste i HTML.
    //Se http://php.net/manual/en/control-structures.foreach.php
    foreach($_POST['ekstra'] as $e) {
      echo "<li>{$e}</li>\n";
    }
    echo "</ul></p>\n";
  }
}
?>
    </div>
    <footer>
      <a href="personvern.html">Personvernerklæring</a>
    </footer>
  </body>
</html>
