<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
require 'funksjoner.php';
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8" />
    <title>McBergbys bestillingssystem</title>
    <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
    <link rel="icon" type="image/png" href="bilder/mcbergbys-favicon.png">
  </head>
  <body>
    <?php lag_navigasjonsmeny("index"); ?>
    <div class="hoved">
      <h1>Velkommen til McBergbys</h1>
      <img src="bilder/mcbergbys-350x350.jpg" class="float-right" alt="McBergbys-logo" />
      <h2>Sett sammen din meny</h2>
      <form action="bestillingsmottak.php" method="post">
        <div id="personinfo">
        <h4>Din kontaktinfo:</h4>
        <label for="fornavn">Fornavn</label> 
        <input type="text" name="fornavn" id="fornavn" />
        <br />
        <label for="etternavn">Etternavn</label>
        <input type="text" name="etternavn" id="etternavn" /> 
        <br />
        <label for="tlf">Mobilnr.</label> 
        <input type="number" name="tlf" id="tlf" /></div>
        <div id="drikkevelger">
        <h4>Drikke:</h4>
        <input type="radio" name="drikke" id="cola" value="cola" /> 
        <label for="cola">Cola</label>
        <br />
        <input type="radio" name="drikke" id="solo" value="solo" /> 
        <label for="solo">Solo</label>
        <br />
        <input type="radio" name="drikke" id="sitronbrus" value="sitronbrus" /> 
        <label for="sitronbrus">Sitronbrus</label>
        <br />
        <input type="radio" name="drikke" id="vann" value="vann" /> 
        <label for="vann">Vann</label>
        <br /></div>
        <div id="burgervelger">
        <h4>Burger:</h4>
        <input type="radio" name="burger" id="superburger" value="superburger" /> 
        <label for="superburger">Superburger - alles favoritt</label>
        <br />
        <input type="radio" name="burger" id="cheeseburger" value="cheeseburger" /> 
        <label for="cheeseburger">Cheeseburger - hvis du liker ost</label>
        <br />
        <input type="radio" name="burger" id="veggisburger" value="veggisburger" /> 
        <label for="veggisburger">Veggis - for deg som er glad i planter</label>
        <br /></div>
        <div id="tilbehør">
        <h4>Tilbehør:</h4>
        <input type="radio" name="tilbehør" id="pommesfrites" value="pommesfrites" /> 
        <label for="pommesfrites">Pommes frites</label>
        <br />
        <input type="radio" name="tilbehør" id="løkringer" value="løkringer" /> 
        <label for="løkringer">Løkringer</label>
        <br />
        <input type="radio" name="tilbehør" id="cheesesticks" value="cheesesticks" /> 
        <label for="cheesesticks">Cheese sticks</label>
        <br /></div>
        <div id="ekstra">
        <h4>Annet:</h4>
        <input type="checkbox" name="ekstra[]" id="ketchup" value="ketchup" /> 
        <label for="ketchup">Ketchup laget av ekte tomater</label>
        <br />
        <input type="checkbox" name="ekstra[]" id="sennep" value="sennep" /> 
        <label for="sennep">Sennep av den knallsterke typen</label>
        <br />
        <input type="checkbox" name="ekstra[]" id="grillkrydder" value="grillkrydder" /> 
        <label for="grillkrydder">Grillkrydder som passer til alt</label>
        <br />
        <input type="checkbox" name="ekstra[]" id="dip" value="dip" /> 
        <label for="dip">Dip laget etter vår hemmelige oppskrift</label>
        <br /></div>
        <div id="skjemaknapper">
        <input type="submit" value="Send bestilling" /> 
        <input type="reset" value="Nullstill skjema" /></div>
      </form>
    </div>
    <?php lag_footer(); ?>
  </body>
</html>
