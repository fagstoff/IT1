<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta author="bitjungle">
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
      <p>
        <!-- I teksten som kommer nedenfor har jeg blandet sammen HTML- og PHP-kode
        sånn at vi får en side med dynamisk generert innhold. Jeg henter informasjonen
        fra variabelen $_POST. Innholdet i denne variabelen kommer fra et HTML-skjema.-->
	  Tusen takk for din bestilling <?php echo $_POST['navn']?>. Vi har registrert bestillingen din på telefonnummer 
      <strong><?php echo $_POST['tlf']?></strong>. Vennligst oppgi dette nummeret når du henter bestillingen din.
	  </p>
	  <p>
	  Vi ser at du bestilte en <?php echo $_POST['burger']?>, det er et godt valg.
    <!-- I PHP-koden nedenfor sjekker jeg først hva slags drikke brukeren har bestilt,
    og så gir jeg en tilpasset respons ut ifra valget. -->
	  <?php 
        if ($_POST['drikke'] == 'vann') {
          echo "Du bestilte også vann, det er veldig bra!";
        } else {
          echo "Du bestilte også {$_POST['drikke']}. Jaja. Vann hadde vært et bedre valg, men du vet vel liksom best du da.";
        }
	  ?>
	  Som tilbehør bestilte du <?php echo $_POST['tilbehør']?>. Greit nok.
	  </p>
	  <p>
      <!-- I PHP-koden nedenfor brukes flere funksjoner som har med lister (arrays) å gjøre. -->
	  <?php
      // Først tester vi om vi faktisk har en array i variabelen $_POST['ekstra']
      if(isset($_POST['ekstra']) && is_array($_POST['ekstra'])) {
        echo "Vi noterte oss også at du bestilte litt ekstrautstyr til burgeren din. Her er hva vi har registrert:\n";
        echo "<ul>\n";
        //Nå jobber vi oss steg for steg gjennom hele lista, 
        //og skriver ut innholdet som en punktliste i HTML.
        foreach($_POST['ekstra'] as $e) {
          echo "<li>{$e}</li>\n";
        }
        echo "</ul>\n";
      }
	  ?>
	  </p>
    </div>
    <footer>
      <a href="personvern.html">Personvernerklæring</a>
    </footer>
  </body>
</html>
