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
 * @return bool  TRUE ved suksess, FALSE ved feil (ikke i bruk)
 */
function lukke_db_forbindelse($db_forbindelse) {
  return mysqli_close($db_forbindelse);
}


/**
 * Lagrer en ny kunde til Kunder-tabellen og returnerer tildelt id.
 * Dersom telefonnummer allerede eksisterer i tabellen, returneres den lagrede id-en.
 * Funksjonen forutsetter at denne tabellen er satt opp i databasen:
 * CREATE TABLE Kunder (
 *   id INTEGER PRIMARY KEY AUTO_INCREMENT,
 *   fornavn VARCHAR(255), 
 *   etternavn VARCHAR(255), 
 *   tlf INTEGER
 * );
 *
 * @param object $db_forbindelse Forbindelsen til databasen
 * @param string $fornavn
 * @param string $etternavn
 * @param integer $tlf
 * @return integer Brukerens id
 */
function lagre_kunde($db_forbindelse, $fornavn, $etternavn, $tlf) {
  //Spørring for å finne id som hører til et gitt telefonnummer i tabellen Kunder
  $spørring_hent_kundeid = "SELECT id FROM Kunder WHERE tlf = {$tlf}";
  //Spørring for å legge inn en ny kunde med fornavn, etternavn og telefonnummer
  $spørring_legg_til_kunde = "INSERT INTO Kunder(fornavn,etternavn,tlf)
                              VALUES ('{$fornavn}','{$etternavn}','{$tlf}');";

  //Vi prøver å hente ut id-en for det gitte telefonnummeret
  $resultat = mysqli_query($db_forbindelse, $spørring_hent_kundeid);
  if ($rad = mysqli_fetch_row($resultat)) {
    //Vi fant telefonnummeret i databasen
    $kundeid = $rad[0];
    mysqli_free_result($resultat);
  } else {
    //Telefonnummeret fantes ikke i databasen fra før, vi legger det inn
    $resultat = mysqli_query($db_forbindelse, $spørring_legg_til_kunde);
    if (!$resultat) die("Lagring av kunde feilet - " . mysqli_error($db_forbindelse));
    $kundeid = mysqli_insert_id($db_forbindelse);
  }
  return $kundeid;
}


/**
 * Lagrer en ny ordre til Ordrer-tabellen og returnerer tildelt id.
 * Funksjonen forutsetter at denne tabellen er satt opp i databasen:
 * CREATE TABLE Ordrer (
 *   id INTEGER PRIMARY KEY AUTO_INCREMENT,
 *   kunde_id INTEGER,
 *   tidspunkt DATETIME,
 *   totalpris DECIMAL(5,2),
 *   status ENUM('bestilt','utfører','ferdig','utlevert')
 * );
 *
 * @param object $db_forbindelse Forbindelsen til databasen
 * @param string $kundeid
 * @param string $totalpris
 * @return integer Ordre-id
 */
function lagre_ordre($db_forbindelse, $kundeid, $totalpris) {
  //Vi registrerer tidspunktet for innlegging av ordren
  $tidspunkt = tid_nå();
  //Spørring for å legge inn en ny ordre
  $spørring_legg_til_ordre = "INSERT INTO Ordrer(kunde_id,tidspunkt,totalpris,status)
                              VALUES ('{$kundeid}','{$tidspunkt}','{$totalpris}','bestilt');";

  $resultat = mysqli_query($db_forbindelse, $spørring_legg_til_ordre);
  if (!$resultat) die("Lagring av ordre feilet - " . mysqli_error($db_forbindelse));
  return mysqli_insert_id($db_forbindelse);
}


/**
 * Lagrer en ny rad til Ordredetaljer-tabellen.
 * Funksjonen forutsetter at denne tabellen er satt opp i databasen:
 * CREATE TABLE Ordredetaljer (
 *   ordre_id INTEGER NOT NULL,
 *   produkt_id INTEGER NOT NULL,
 *   kvantitet INTEGER,
 *   enhetspris DECIMAL(5,2),
 *   PRIMARY KEY (ordre_id, produkt_id)
 * );
 *
 * @param object $db_forbindelse Forbindelsen til databasen
 * @param string $kundeid
 * @param string $ordreid
 * @param string $produkt Må være en av oppslagene i produktnavn-kolonna i Produkter-tabellen
 * @return bool  TRUE ved suksess, FALSE ved feil (ikke i bruk)
 */
function lagre_ordredetaljer($db_forbindelse, $kundeid, $ordreid, $produkt) {
  //Vi trenger en spørring for å hente ut produktid og pris for det ønskede produktet
  $spørring_finn_produkt = "SELECT id, pris FROM Produkter WHERE produktnavn = '{$produkt}'";
  //Vi må også ha en spørring for å redusere lagerbehodningen for produktet
  $spørring_reduser_beholdning = "UPDATE Produkter SET beholdning = beholdning - 1 WHERE produktnavn = '{$produkt}'";
  //Spørringen for å sette inn en ny rad i Ordredetaljer gjøres bare delvis klar her, 
  //det som skal stå etter VALUES blir lagt inn lenger ned i funksjonen.
  $spørring_legg_til_ordredetalj = "INSERT INTO Ordredetaljer(ordre_id, produkt_id, kvantitet, enhetspris) VALUES ";
  
  //Først må vi hente ut informasjon om produktet i Produkter-tabellen
  $resultat = mysqli_query($db_forbindelse, $spørring_finn_produkt);
  if (!$resultat) die("Oppslag på produktdetaljer feilet - " . mysqli_error($db_forbindelse));
  $produktinfo = mysqli_fetch_assoc($resultat);
  frigjør_data($resultat);
  
  //Så må vi redusere beholdningen til det aktuelle produktet med én. 
  $resultat = mysqli_query($db_forbindelse, $spørring_reduser_beholdning);
  if (!$resultat) die("Reduksjon av produktbeholdning feilet - " . mysqli_error($db_forbindelse));
  
  //Nå har vi nok informasjon til å gjøre klar en ny rad med ordredetaljer
  $spørring_legg_til_ordredetalj .= "({$ordreid}, {$produktinfo['id']}, 1, {$produktinfo['pris']})";

  $resultat = mysqli_query($db_forbindelse, $spørring_legg_til_ordredetalj);
  if (!$resultat) die("Innlegging av ordredetaljer feilet - " . mysqli_error($db_forbindelse));
  return TRUE;//Alternativt droppe die() og heller sette denne til FALSE ved problemer.
}


/**
 * Henter ut en liste over alle ordrer fra databasen.
 *
 * @param object $db_forbindelse Forbindelsen til databasen
 * @param boolean $status Henter alt som standard. Kan settes til bestilt/utfører/ferdig/utlevert.
 * @return object Resultatet fra spørringen
 */
function hent_ordrer($db_forbindelse, $status = NULL) {
  $spørring = "SELECT Ordrer.id, Kunder.fornavn, Kunder.etternavn, Kunder.tlf, Ordrer.tidspunkt, Ordrer.status
               FROM Ordrer
               JOIN Kunder ON kunde_id = Kunder.id ";
  if ($status) {
    $spørring .= " WHERE Ordrer.status = '{$status}';";
  }
  return mysqli_query($db_forbindelse, $spørring);
}


/**
 * Henter ut detaljer for enkelt ordre.
 *
 * @param object $ordreid Id-en til ordren 
 * @return object Resultatet fra spørringen
 */
function hent_ordredetaljer($db_forbindelse, $ordreid) {
  $spørring = "SELECT Produkter.produktnavn, kvantitet, enhetspris
               FROM Ordredetaljer 
               JOIN Produkter ON produkt_id = Produkter.id
               WHERE ordre_id = {$ordreid}";
  return mysqli_query($db_forbindelse, $spørring);
}


/**
 * Frigjør resultatet fra en database-spørring.
 *
 * @param $resultat Resultatet fra en spørring som er kjørt tidligere
 * @return bool TRUE ved suksess, FALSE ved feil
 */
function frigjør_data($resultat) {
  return mysqli_free_result($resultat);  
}


/**
 * Gjør resultatet fra en SQL-spørring om til en HTML-tabell.
 *
 * @param $resultat
 * @param $cssklasse
 * @return string HTML-tabell
 */
function resultat_til_html_tabell($resultat, $cssklasse = "sqltabell") {
  $tabell = "<table class=\"{$cssklasse}\">\n";
  $tabell .= "<tr>\n";
  //Se https://secure.php.net/manual/en/mysqli-result.fetch-fields.php
  $kolonneinfo = mysqli_fetch_fields($resultat);
  foreach ($kolonneinfo as $k) {
    $tabell .= "\t<th>".ucfirst($k->name)."</th>\n";
  }
  $tabell .= "</tr>\n";
  while ($rad = mysqli_fetch_row($resultat)) {
    $tabell .= "<tr>\n";
    foreach ($rad as $felt) {
      $tabell .= "\t<td>{$felt}</td>\n";
    }
    $tabell .= "</tr>\n";
  }
  $tabell .= "</table>\n";
  return $tabell;
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
 * @param string $aktiv_side Siden som skal settes som aktiv i menyen (verdier: index/om/skolen)
 */
function lag_navigasjonsmeny($aktiv_side) {
  $index = NULL;
  $om = NULL;
  $skolen = NULL;
  $ordrer = NULL;
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
    case 'ordrer':
      $ordrer = $aktiv;
      break;    
  }
echo <<<EOT
  <nav>
    <ul>
      <li>
        <div id="logo">McBergbys</div>
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
      <li>
        <a href="ordrer.php" {$ordrer}>Ordrer</a>
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