<!DOCTYPE html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="author" content="bitjungle">
  <title>McBergbys bestillingssystem</title>
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

    <h1>Velkommen til McBergbys</h1>
    <h2>Sett sammen din meny</h2>
    <p>En meny koster kr. 99,- uansett hvilken kombinasjon du velger.</p>
    <img src="bilder/hamburgers-400.jpg" class="float-right" alt="Hamburgere - bildet er tatt av Niklas Rhöse" />

    <form action="bestillingsmottak.php" method="post">
      <input type="hidden" id="totalpris" name="totalpris" value="99" />
      <fieldset id="personinfo">
        <h4>Din kontaktinfo:</h4>
        <label for="fornavn">Fornavn</label> 
        <input type="text" name="fornavn" id="fornavn" />
        <br />
        <label for="etternavn">Etternavn</label>
        <input type="text" name="etternavn" id="etternavn" /> 
        <br />
        <label for="tlf">Mobilnr.</label>
        <input type="text" name="tlf" id="tlf" />
      </fieldset><!-- personinfo -->
      <fieldset id="burgervelger">
        <h4>Burger:</h4>
        <input type="radio" name="burger" id="superburger" value="superburger" />
        <label for="superburger">Superburger - alles favoritt</label>
        <br />
        <input type="radio" name="burger" id="cheeseburger" value="cheeseburger" />
        <label for="cheeseburger">Cheeseburger - hvis du liker ost</label>
        <br />
        <input type="radio" name="burger" id="veggisburger" value="veggisburger" />
        <label for="veggisburger">Veggis - for deg som er glad i planter</label>
      </fieldset><!-- burgervelger -->
      <fieldset id="drikkevelger">
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
      </fieldset><!-- drikkevelger -->
      <fieldset id="tilbehør">
        <h4>Tilbehør:</h4>
        <input type="radio" name="tilbehør" id="pommesfrites" value="pommesfrites" />
        <label for="pommesfrites">Pommes frites</label>
        <br />
        <input type="radio" name="tilbehør" id="løkringer" value="løkringer" />
        <label for="løkringer">Løkringer</label>
        <br />
        <input type="radio" name="tilbehør" id="cheesesticks" value="cheesesticks" />
        <label for="cheesesticks">Cheese sticks</label>
      </fieldset><!-- tilbehør -->
      <fieldset id="ekstra">
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
      </fieldset><!-- ekstra -->
      <fieldset id="skjemaknapper">
        <input type="submit" value="Send bestilling" />
        <input type="reset" value="Nullstill skjema" />
      </fieldset><!-- skjemaknapper -->
    </form>
    
    <footer>
      <a href="personvern.php">Personvernerklæring</a>
    </footer>

  </div><!-- hoved -->
</body>

</html>