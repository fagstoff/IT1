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

  </div><!-- container -->

  <footer>
    <a href="personvern.html">Personvernerklæring</a>
  </footer>

  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>