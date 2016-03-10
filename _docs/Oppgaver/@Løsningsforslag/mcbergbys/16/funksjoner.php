<?php
/**
 * I denne fila er det implementert en rekke funksjoner som brukes av web-applikasjonen til McBergbys.
 * Inkluder denne fila på alle sidene til McBergbys med denne koden helt i starten av hver fil:
 * 
 *     require 'funksjoner.php';
 * 
 * For å finne den siste og mest oppdaterte versjonen av denne fila må du gå til det siste 
 * løsningsforslaget i serien av McBergbys-oppgaver. 
 * 
 * Med noen tilpasninger bør denne fila kunne brukes i andre små webapplikasjonsprosjekter, 
 * og den er tenkt brukt som hjelpemiddel på eksamen i IT1.
 *
 * ---------------------------------------------------
 * Copyright 2016 BITJUNGLE Rune Mathisen
 * Lisens: https://www.apache.org/licenses/LICENSE-2.0
 * ---------------------------------------------------
 */

 
/**
 * Henter skjemadata fra $_POST.
 *
 * @param string $feltnavn Navnet på feltet du vil hente data fra
 * @param boolean $htmlspecialchars Konverterer spesialtegn til HTML-entiteter ved TRUE. Default er FALSE.
 * @return string Verdien i feltet, eller NULL dersom feltet ikke er satt
 */
function hent_skjemadata($feltnavn, $htmlspecialchars = FALSE) {
  if (isset($_POST[$feltnavn])) {
    if ($htmlspecialchars) {
      return htmlspecialchars($_POST[$feltnavn]);
    } else {
      return $_POST[$feltnavn];
    }
  } else {
    return NULL;
  }  
}


/**
 * Test for å sjekke om vi har et gyldig telefonnummer.
 * Vi sjekker om det er et tall med 8 siffer.
 * Utvid gjerne med andre smarte tester.
 * Hva med dem som ikke har et norsk mobilnummer?
 * 
 * Se http://php.net/manual/en/function.is-numeric.php
 * og http://php.net/manual/en/function.strlen.php
 *
 * @param $nummer Nummeret som skal testes
 * @return boolean TRUE dersom nummeret er ok, FALSE ved feil
 */
function valider_telefonnummer($nummer) {
  if (is_numeric($nummer) && strlen((string)$nummer) == 8) {//Vi har et gyldig nummer
    return true;
  } else {//Brukeren har ikke tastet inn telefonnummeret riktig
    return false;
  }
}


/**
 * Lager en HTML-formattert liste fra en array (liste i PHP).
 * Som standard lager funksjonen en unummerert liste (<ul>),
 * men den kan også lage nummererte lister (<ol>).
 *
 * @param array $listedata Array-et som skal gjøres om til en HTML-liste
 * @param boolean $nummerert Lager en nummerert <ol> liste ved TRUE
 * @return string En HTML-liste (<ol> eller <ul>)
 */
function lag_liste($listedata, $nummerert = FALSE) {
  if ($nummerert) {
    $liste = "<ol>\n";
  } else {
    $liste = "<ul>\n";
  }
  //Nå jobber vi oss steg for steg gjennom hele lista, 
  //og skriver ut innholdet som en liste i HTML.
  //Se http://php.net/manual/en/control-structures.foreach.php
  foreach($listedata as $l) {
    $liste .= "<li>{$l}</li>\n";
  }
  if ($nummerert) {
    $liste .= "</ol>\n";
  } else {
    $liste .= "</ul>\n";
  }
  return $liste;
}


/**
 * Åpner forbindelsen mot McBergbys-databasen.
 * Før du kjører denne koden må du manuelt opprette en database i MySQL.
 * Nedenfor finner du SQL-koden du kan kjøre for å opprette databasen.
 * Du kan godt endre brukernavn og passord som er brukt nedenfor, men
 * pass på at du gjør endringene i både SQL-koden og PHP-koden!
 * Husk å fjerne // før du kjører koden i MySQL.
 * 
 * CREATE DATABASE mcbergbysdb;
 * GRANT ALL PRIVILEGES ON mcbergbysdb.* TO 'mcbruker'@'localhost' IDENTIFIED BY 'keHH-172QW_p';
 * FLUSH PRIVILEGES;
 *
 * @return object databaseforbindelse
 */
function apne_db_forbindelse() {
  //Her legger vi inn databasenavn, brukernavn og passord som vi har satt opp i MySQL:
  $db_host = 'localhost';
  $db_navn = 'mcbergbysdb';
  $db_bruker = 'mcbruker';
  $db_pass = 'keHH-172QW_p';
  
  //Vi forsøker først å opprette forbindelsen med databasen.
  //Se https://secure.php.net/manual/en/function.mysqli-connect.php
  $db_forbindelse = mysqli_connect($db_host, $db_bruker, $db_pass, $db_navn);
  //Vi sjekker om forbindelsen ble opprettet
  if (mysqli_connect_errno()) {
    die('Kunne ikke opprette forbindelse med databasen: ' . mysqli_connect_error()) ;
  } else {
    return $db_forbindelse;
  }
}


/**
 * Lukker forbindelsen til en database.
 * 
 * @param object $db_forbindelse Forbindelsen som skal lukkes
 */
function lukke_db_forbindelse($db_forbindelse) {
  mysqli_close($db_forbindelse);
}


/**
 * Lagrer innholdet i bestillingsskjemaet til databasen.
 * Funksjonen forutsetter at denne tabellen er satt opp i databasen:
 * 
 * CREATE TABLE Bestillinger (
 *   id INTEGER PRIMARY KEY AUTO_INCREMENT,
 *   tidspunkt DATETIME, 
 *   bestilling TEXT
 * );
 *
 * @param array $bestillingsdata Array med bestillingen som skal lagres til databasen
 * @param object $db_forbindelse Forbindelsen til databasen
 * @return boolean TRUE hvis alt gikk ok, FALSE om noe gikk galt
 */
function lagre_bestilling($bestillingsdata, $db_forbindelse) {
  //For å kunne lagre informasjonen i $_POST til databasen, må bi gjøre den om til
  //en spesielt formatert tekststreng. Det gjør vi enkelt med funksjonen serialize().
  //Se https://secure.php.net/manual/en/function.serialize.php
  $bestilling = serialize($bestillingsdata);
  $tidspunkt = tid_nå();
  
  //Nå lager vi SQL-spørringen som skal kjøres (INSERT INTO...), og så
  //kjører vi den i databasen som vi har opprettet en forbindelse til.
  //Se https://secure.php.net/manual/en/mysqli.query.php
  $spørring = "INSERT INTO Bestillinger(tidspunkt, bestilling) VALUES ('{$tidspunkt}', '{$bestilling}');";
  return mysqli_query($db_forbindelse, $spørring);
  
  //Kode som er bedre/sikrere enn det som står ovenfor, og som vi skal bruke senere.
  //$spørring = "INSERT INTO Bestillinger(tidspunkt,bestilling) VALUES (?,?);";
  //$stmt = mysqli_prepare($db_forbindelse, $spørring);
  //mysqli_stmt_bind_param($stmt, 'ss', $tidspunkt, $bestilling);
  //$stmt->execute();
}


/**
 * Henter ut alle bestillinger fra databasen.
 * Funksjonen forutsetter at denne tabellen er satt opp i databasen:
 * 
 * CREATE TABLE Bestillinger (
 *   id INTEGER PRIMARY KEY AUTO_INCREMENT,
 *   tidspunkt DATETIME, 
 *   bestilling TEXT
 * );
 *
 * @param object $db_forbindelse Forbindelsen til databasen
 * @param boolean $stigende Ordne resultatet i stigende (TRUE) eller synkende (FALSE) rekkefølge
 * @return object Resultatet fra spørringen
 */
function hent_bestillinger($db_forbindelse, $stigende = TRUE) {
  //Nå lager vi SQL-spørringen som skal kjøres (SELECT...), og så
  //kjører vi den i databasen som vi har opprettet en forbindelse til.
  //Se https://secure.php.net/manual/en/mysqli.query.php
  $spørring = "SELECT * FROM Bestillinger ";
  if ($stigende) {
    $spørring .= "ORDER BY tidspunkt ASC;";
  } else {
    $spørring .= "ORDER BY tidspunkt DESC;";
  }
  return mysqli_query($db_forbindelse, $spørring);
}


/**
 * Henter ut en enkelt bestilling fra resultatet av hent_bestillinger().
 *
 * @param object $bestillinger Mange/alle bestillinger i databasen
 * @return array En assosiativ liste som med en enkelt rad 
 */
function hent_bestilling($bestillinger) {
  return mysqli_fetch_assoc($bestillinger);
}


/**
 * Frigjør resultatet fra en database-spørring
 *
 * @param $resultat Resultatet fra en spørring som er kjørt tidligere
 */
 function frigjør_data($resultat) {
  mysqli_free_result($resultat);  
}


/**
 * Gjør en array med bestillingsdata om til HTML.
 * Funksjonen forutsetter at disse feltene er tilgjengelige i
 * bestillingsdataene (sjekk HTML-skjemaet ditt):
 * navn, tlf, burger, drikke, tilbehør, ekstra
 *
 * @param $bestillingsdata En array med bestillingsdata, slik det kommer fra bestillingskjemaet
 * @return string HTML-formattert bestilling
 */
function bestilling_til_html($bestillingsdata) {
  $utdata = "<div class=\"bestilling\">\n";
  if (isset($bestillingsdata['navn']))
    $utdata .= "<span class=\"bestillernavn\">Bestilt av: " . $bestillingsdata['navn'] . "</span><br>\n";
  if (isset($bestillingsdata['tlf']))
    $utdata .= "<span class=\"telefonnummer\">Telefon: " . $bestillingsdata['tlf'] . "</span><br>\n";
  if (isset($bestillingsdata['burger']))
    $utdata .= "<span class=\"burger\">Burger: " . $bestillingsdata['burger'] . "</span><br>\n";
  if (isset($bestillingsdata['drikke']))
    $utdata .= "<span class=\"drikke\">Drikke: " . $bestillingsdata['drikke'] . "</span><br>\n";
  if (isset($bestillingsdata['tilbehør']))
    $utdata .= "<span class=\"tilbehør\">Tilbehør: " . $bestillingsdata['tilbehør'] . "</span><br>\n";
  if (isset($bestillingsdata['ekstra']))
    $utdata .= "<span class=\"ekstra\">Ekstra: " . lag_liste($bestillingsdata['ekstra']) . "</span><br>\n";
  $utdata .= "</div>\n";
  return $utdata;
}


/**
 * Returnerer nåtidspunktet på formatet Y-m-d H:i:s
 * Se https://secure.php.net/manual/en/function.date.php
 *
 * @return string Dato og klokkeslett
 */
 function tid_nå() {
  return date("Y-m-d H:i:s");  
}


/**
 * Fjerner alle mellomrom i en tekststreng.
 * Se http://php.net/manual/en/function.str-replace.php
 *
 * @param string $tekststreng Tekststrengen som skal behandles
 * @return string Tekststreng med alle mellomrom fjernet
 */
function fjern_mellomrom($tekststreng) {
  return str_replace(" ","", $tekststreng);
}


/**
 * Skriver ut en navigasjonsmeny med 'echo' for McBergbys-sidene.
 * Bruker HTML <nav>.
 * 
 * @param string $aktiv_side Siden som skal settes som aktiv i menyen
 */
function lag_navigasjonsmeny($aktiv_side) {
  $index = NULL;
  $om = NULL;
  $skolen = NULL;
  $aktiv = 'id="aktiv"';
  switch ($aktiv_side) {
    case 'index':
      $index = $aktiv;
      break;
    case 'om':
      $om = $aktiv;
      break;
    case 'skolen':
      $skolen = $aktiv;
      break;    
  }
echo <<<EOT
  <nav>
    <ul>
      <li>
        <div id="logo">McBergbys
        <br />burgersjappe</div>
      </li>
      <li>
        <a href="index.php" {$index}>Bestilling</a>
      </li>
      <li>
        <a href="om.php" {$om}>Om McBergbys</a>
      </li>
      <li>
        <a href="hamburgerskolen.php" {$skolen}>Hamburgerskolen</a>
      </li>
    </ul>
  </nav>
EOT;
}


/**
 * Skriver ut en footer med 'echo' for McBergbys-sidene.
 * Bruker HTML <footer>.
 *
 */
function lag_footer() {
echo <<<EOT
  <footer>
      <a href="personvern.php">Personvernerklæring</a>
  </footer>
EOT;
}

?>