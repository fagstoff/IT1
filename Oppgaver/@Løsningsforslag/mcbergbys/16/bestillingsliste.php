<?php
require 'funksjoner.php';

//Først må vi opprette en forbindelse med databasen
$db_forbindelse = åpne_db_forbindelse();
//Så henter vi alle bestillinger som ligger i databasen
$bestillinger = hent_bestillinger($db_forbindelse);
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
                <div id="logo"><img src="bilder/burger-1487481.svg" alt="McBergbys logo - CC0 midicomp" style="width: 40px;">McBergbys</div>
            </li>
            <li>
                <a href="index.php" id="aktiv">Bestilling</a>
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
        <h1>Liste over bestillinger</h1>
        <div id="bestillinger">
            <?php
      while($bestilling = hent_bestilling($bestillinger)) {
        echo "<div class=\"bestilling\"><strong>Bestilling som ble registrert den {$bestilling['tidspunkt']}:</strong><br>";
        echo bestilling_til_html(unserialize($bestilling['bestilling']));
        echo "</div><hr>";
      }
      ?>
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