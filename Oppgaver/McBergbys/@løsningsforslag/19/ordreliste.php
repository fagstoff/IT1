<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
require 'funksjoner.php';

//Vi henter ønsket ordrestatus fra URL-en. 
//Dersom den ikke er satt, henter vi alle ordrer
if (isset($_GET['ordrestatus'])) {
  //Gyldige verdier er bestilt/utfører/ferdig/utlevert
  $ordrestatus = $_GET['ordrestatus'];
} else {
  $ordrestatus = NULL;
}


//Vi oppretter en forbindelse med databasen
$db_forbindelse = åpne_db_forbindelse();
//Så henter vi alle ordrer som ligger i databasen
$ordrer = hent_ordrer($db_forbindelse, $ordrestatus);
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
    <nav>
      <ul>
        <li>
        <div id="logo"><img src="bilder/burger-1487481.svg" alt="McBergbys logo - CC0 midicomp" style="width: 40px;">McBergbys</div>
          
        </li>
        <li>
          <a href="index.php">Bestilling</a>
        </li>
        <li>
          <a href="om.php">Om McBergbys</a>
        </li>
        <li>
          <a href="hamburgerskolen.php">Burgerskolen</a>
        </li>
      </ul>
    </nav>
    <div class="hoved">
      <h1>Liste over ordrer som er registrert i systemet</h1>
      <div id="bestillinger">
      <!-- Her tar vi bestillingene vi hentet ovenfor og gjør om til en pent formattert liste -->
      <?php
        //echo bestillingsliste_til_html($bestillinger);
        echo resultat_til_html_tabell($ordrer);
      ?>
      </div>
    </div>
    <!-- Vi lager en footer -->
    <?php lag_footer(); ?>
  </body>
</html>

<?php
//Nå må vi frigjøre resultatet fra spørringen vi kjørte tidligere,
//sånn at det ikke opptar noe minne.
frigjør_data($ordrer);
//Nå er vi ferdig, og kan lukke forbindelsen til databasen.
lukke_db_forbindelse($db_forbindelse);
?>