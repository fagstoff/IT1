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
      <p>Tusen takk for din bestilling <?php echo $_POST['navn']?>. Vi har registrert bestillingen din på telefonnummer 
      <strong><?php echo $_POST['tlf']?></strong>. Vennligst oppgi dette nummeret når du henter bestillingen din. Her er en oversikt over hva du har bestilt:</p>
      <table>
        <thead>
          <tr>
            <th>Varegruppe</th>
            <th>Varenavn</th>
            <th>Pris</th>
          </tr>
        </thead>
		<?php 
		foreach($_POST as $key => $value) {
		  //Vi vil bare skrive ut innholdet dersom det ikke er
		  //navn eller telefonnummer (som allerede er skrevet ut ovenfor).
		  if (!in_array($key,array("navn","tlf"))) {
			//Dersom $value er en array må vi loope over innholdet.
			//I vårt tilfelle er det "ekstra" i bestillingsskjemaet
			//som kan inneholde en array.
			if (is_array($value)) {
			  //Funksjonen ucfirst gjør første bokstav i ordet stor
			  echo "<tr><td>".ucfirst($key).":</td><td><ul>\n";
			  foreach($value as $v) {
				echo "<li>".ucfirst($v)."</li>\n";
			  }
			  echo "</ul></td><td>???</td></tr>\n";
			} else { //Her skriver vi ut innholdet i bestillingen
				echo "<tr><td>".ucfirst($key).":</td><td>".ucfirst($value)."</td><td>???</td></tr>\n";
			}
		  }
		}
      ?>
      </table>
    </div>
    <footer>
      <a href="personvern.html">Personvernerklæring</a>
    </footer>
  </body>
</html>
