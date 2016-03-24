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
$db_forbindelse = apne_db_forbindelse();
//Så henter vi alle ordrer som ligger i databasen
$ordrer = hent_ordrer($db_forbindelse, $ordrestatus);
?>

<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8" />
    <title>Liste over ordre</title>
    <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
  </head>
  <body>
    <!-- Vi lager navigasjonsmenyen -->
    <?php lag_navigasjonsmeny(""); ?>
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