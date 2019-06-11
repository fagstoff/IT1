<?php
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
          <a class="nav-item nav-link active" href="index.php">Bestilling</a>
          <a class="nav-item nav-link" href="om.php">Om&nbsp;McBergbys</a>
          <a class="nav-item nav-link" href="hamburgerskolen.php">Burgerskolen</a>
        </div><!-- navbar-bar -->
      </div><!-- navbar-collapse -->
      <span class="navbar-text d-none d-xl-inline-block ml-5 bg-dark text-white" id="slogan">Vi har de feteste
        burgerne!</span>
    </div><!-- container -->
  </nav>
  <div class="container" id="hovedomraade">
    <h1>Liste over ordrer som er registrert i systemet</h1>
    <div id="bestillinger">
      <!-- Her tar vi bestillingene vi hentet ovenfor og gjør om til en pent formattert liste -->
      <?php
        //echo bestillingsliste_til_html($bestillinger);
        echo resultat_til_html_tabell($ordrer);
      ?>
    </div>
  </div>

<?php
  lag_footer();
?>
</body>

</html>

<?php
//Nå må vi frigjøre resultatet fra spørringen vi kjørte tidligere,
//sånn at det ikke opptar noe minne.
frigjør_data($ordrer);
//Nå er vi ferdig, og kan lukke forbindelsen til databasen.
lukke_db_forbindelse($db_forbindelse);
?>