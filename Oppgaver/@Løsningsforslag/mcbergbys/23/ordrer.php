<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
require 'funksjoner.php';
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta author="bitjungle">
    <title>Ordrer</title>
    <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
  </head>
  <body>
    <!-- Vi lager navigasjonsmenyen -->
    <?php lag_navigasjonsmeny("ordrer"); ?>
    <div class="hoved">
      <h1>Ordreliste</h1>
      <form action="ordreliste.php" method="get">
        <label for="ordrestatus">Velg ordrer med status: </label> 
        <select name="ordrestatus">
          <option value="">Alle</option>
          <option value="bestilt">Bestilt</option>
          <option value="utfører">Utfører</option>
          <option value="ferdig">Ferdig</option>
          <option value="utlevert">Utlevert</option>
        </select>
        <input type="submit" value="Hent ordreliste" />
      </form>
      <h1>Ordredetaljer</h1>
      <form action="ordredetaljer.php" method="get">
        <label for="ordreid">Hent detaljer for ordre med id:</label> 
        <input type="number" name="ordreid" id="ordreid" />
        <input type="submit" value="Hent ordredetaljer" />
      </form>
    </div>
    <!-- Vi lager en footer -->
    <?php lag_footer(); ?>
  </body>
</html>
