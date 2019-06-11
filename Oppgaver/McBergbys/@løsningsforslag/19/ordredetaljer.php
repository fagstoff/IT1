<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
require 'funksjoner.php';

//Vi henter den aktuelle ordreid-en fra URL-en. 
//Dersom den ikke er satt,nbruker vi ordreid 1 som standard.
if (isset($_GET['ordreid'])) {
  $ordreid = $_GET['ordreid'];
} else {
  $ordreid = 1;
}

//Vi oppretter en forbindelse med databasen
$db_forbindelse = åpne_db_forbindelse();
//Så henter vi ordredetaljer som ligger i databasen for den aktuelle ordren
$ordredetaljer = hent_ordredetaljer($db_forbindelse, $ordreid);
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
      <h1>Ordredetaljer for ordre <?php echo $ordreid ?></h1>
      <div id="bestillinger">
      <!-- Her tar vi bestillingene vi hentet ovenfor og gjør om til en pent formattert liste -->
      <?php
        //echo bestillingsliste_til_html($bestillinger);
        echo resultat_til_html_tabell($ordredetaljer);
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
frigjør_data($ordredetaljer);
//Nå er vi ferdig, og kan lukke forbindelsen til databasen.
lukke_db_forbindelse($db_forbindelse);
?>