<?php 
// En superenkel gjestebok for IT1-elever (med oppgaver)
// Lisens: Creative Commons BY-SA bitjungle (Rune Mathisen) 2018

/**
 * Du må lage denne tabellen i en database:
 *    CREATE TABLE `Gjestebok` (
 *        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
 *        `tidspunkt` datetime NOT NULL,
 *        `navn` varchar(255) NOT NULL,
 *        `kommentar` text NOT NULL
 *      );
 *
 * I tillegg må di legge inn nødvendig informasjon for å koble seg
 * til databasen. Fyll ut med korrekt informasjon nedenfor.
 */

$db_host = 'localhost';
$db_navn = 'mcbergbys';
$db_bruker = 'mcbergbys';
$db_pass = 'Skriv inn passordet ditt her';

/** 
 * OPPGAVER
 * ========
 * 1. Gi gjesteboken en pen layout. Bruk CSS, og gjør eventuelt
 *    endringer i HTML-koden.
 * 
 * 2. Legg inn flere "fy-ord" sånn at uønskede kommentarer sensureres.
 *    Test for å sjekke at det fungerer.
 * 
 * 3. Du skal dele opp "navn" i "fornavn" og "etternavn". For å få 
 *    til det, må du endre HTML-koden, SQL-koden og definisjonen
 *    av tabellen i databasen.
 * 
 * 4. Gjør nødvendige endringer sånn at kolonna "id" ikke vises 
 *    i gjesteboka.
 * 
 * 5. Bruk alt du kan om HTML, CSS, PHP og SQL. 
 *    Lag verdens stiligste gjestebok!
 */




/** 
 * Dersom kommentaren eller brukernavnet inneholder uønskede ord, 
 * sensurerer vi det. Legg gjerne inn flere ord i $fyord_liste
 */
function sjekk_fyord($tekststreng) {
    $fyord_liste = array('faen', 'helvete', 'dritt');
    $tekststreng_liste = explode(' ', strtolower($tekststreng));
    foreach ($fyord_liste as $fyord) {
        if (in_array($fyord, $tekststreng_liste)) {
            return 'Sensurert';
        }
    }
    return $tekststreng;    
}

/**
 * Henter ut verdien fra et bestemt felt i et HTML-skjema. 
 * Her må $feltnavn stemme overens med 'name'-parameteren  
 * til det aktuelle feltet i skjemaet.
 */
function hent_skjemadata($feltnavn) {
    if (isset($_POST[$feltnavn])&& $_POST[$feltnavn] != '') {
        $verdi = trim($_POST[$feltnavn]);
        $verdi = sjekk_fyord($verdi);
        return htmlspecialchars($verdi);
    } else {
        return '';
    }        
}

/**
 * Gjør resultatet fra en SQL-spørring om til en HTML-tabell.
 */
function resultat_til_html_tabell($resultat, $cssklasse = "sqltabell") {
    $tabell = "<table class=\"{$cssklasse}\">\n";
    $tabell .= "<tr>\n";
    // Se https://secure.php.net/manual/en/mysqli-result.fetch-fields.php
    $kolonneinfo = mysqli_fetch_fields($resultat);
    // Først lager vi kolonneoverskriftene
    foreach ($kolonneinfo as $k) {
      $tabell .= "\t<th>".ucfirst($k->name)."</th>\n";
    }
    $tabell .= "</tr>\n";
    // Nå er vi ferdige med første rad, som inneholder
    // kolonneoverskrifter. La oss gå gjennom alle 
    // kommentarene, og lage en rad i HTML-tabellen for  
    // hver enkelt kommentar som er lagret i databasen.
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


// Henter navn fra skjemaet
$navn = hent_skjemadata('navn');

// Henter kommentar fra skjemaet
$kommentar = hent_skjemadata('kommentar');

// Registrerer tidspunkt for komentaren
$tidspunkt = date("Y-m-d H:i:s");

// Vi forsøker først å opprette forbindelsen med databasen.
$db_forbindelse = mysqli_connect($db_host, $db_bruker, $db_pass, $db_navn);
// Vi sjekker om forbindelsen ble opprettet
if (mysqli_connect_errno()) {
    die('Kunne ikke opprette forbindelse med databasen: ' . mysqli_connect_error());
}

// Har vi en kommentar som skal lagres?
if ($kommentar != '') {
    // Har vi fått en anonym kommentar?
    if ($navn == '') {
        $navn = 'Anonym';
    }
    // Nå lager vi SQL-spørringen som skal kjøres (INSERT INTO...), og så
    // kjører vi den i databasen som vi har opprettet en forbindelse til.
    $spørring = "INSERT INTO Gjestebok(tidspunkt, navn, kommentar) VALUES ('{$tidspunkt}', '{$navn}', '{$kommentar}');";
    mysqli_query($db_forbindelse, $spørring);
}

?>

<!DOCTYPE html>
<html lang="nb">
    <head>
        <meta charset="UTF-8">
        <title>Gjestebok</title>
    </head>
    <body>
        <main>
            <h1>Gjestebok</h1>
            <div id="skjema">
                <form action="gjestebok.php" method="post" id="kommentarskjema">
                    <label for="navn">Navn</label> 
                    <input type="text" name="navn" id="navn"/>
                    <br />
                    <textarea name="kommentar" form="kommentarskjema" rows="4" cols="50"></textarea>
                    <br />
                    <input type="submit" value="Send inn kommentar"> 
                </form>
                <hr/>
            </div>
            <div id="kommentarer">
                <h2>Dette har tidligere besøkende sagt</h2>

                <?php 
                // Her henter vi alt innhold i tabellen Gjestebok, 
                // og lager en HTML-tabell av innholdet.
                $spørring = 'SELECT * FROM Gjestebok;';
                $kommentarer = mysqli_query($db_forbindelse, $spørring);
                echo resultat_til_html_tabell($kommentarer);
                ?>

            </div>
        </main>
    </body>
</html>

<?php
//Nå er vi ferdig, og kan lukke forbindelsen til databasen
mysqli_close($db_forbindelse);
?>