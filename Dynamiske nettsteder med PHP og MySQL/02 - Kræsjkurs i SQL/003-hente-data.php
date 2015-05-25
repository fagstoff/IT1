<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

/*
 * 
 */

$query = 'SELECT * FROM kontakter';

//Vi trenger informasjon om brukernavn, passord og navn på databasen vi skal koble oss til.
$username='root';
$password='';
$databasenavn='testdatabase';

//Vi oppretter forbindelsen til databasen vår.
$mysql = new mysqli('localhost', $username, $password, $databasenavn);
if ($mysql->connect_error) {
    die('Kunne ikke koble til MySQL: ' . $mysql->connect_error);
}

$resultat = $mysql->query($query);

if ($resultat->num_rows > 0) {
    // output data of each row
    while($rad = $resultat->fetch_assoc()) {
        echo "id: " . $rad["id"]. " - Navn: " . $rad["fornavn"]. " " . $rad["etternavn"]. "\n";
    }
} else {
    echo "Ingen treff\n";
}

$mysql->close();
?>
