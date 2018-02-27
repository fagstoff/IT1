<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
require 'funksjoner.php';

//Først må vi opprette en forbindelse med databasen
$db_forbindelse = apne_db_forbindelse();
//Så henter vi alle bestillinger som ligger i databasen
$bestillinger = hent_bestillinger($db_forbindelse);
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
          <div id="logo">McBergbys<br>burgersjappe</div>
        </li>
        <li>
          <a href="index.php">Bestilling</a>
        </li>
        <li>
          <a href="om.php">Om McBergbys</a>
        </li>
        <li>
          <a href="hamburgerskolen.php">Hamburgerskolen</a>
        </li>
      </ul>
    </nav>
    <div class="hoved">
      <h1>Liste over bestillinger</h1>
      <div id="bestillinger">
      <!-- Her tar vi bestillingene vi hentet ovenfor og gjør om til en pent formattert liste -->
      <?php echo bestillingsliste_til_html($bestillinger); ?>
      </div>
    </div>
    <footer>
      <a href="personvern.php">Personvernerklæring</a>
    </footer>
  </body>
</html>

<?php
//Nå må vi frigjøre resultatet fra spørringen vi kjørte tidligere,
//sånn at det ikke opptar noe minne.
frigjør_data($bestillinger);
//Nå er vi ferdig, og kan lukke forbindelsen til databasen.
lukke_db_forbindelse($db_forbindelse);
?>