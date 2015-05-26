<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

/*
 * 
 */

//Henter data fra POST
$fornavn = $_POST['fornavn'];
$etternavn = $_POST['etternavn'];
$mobil = $_POST['mobil'];
$epost = $_POST['epost'];
$facebook = $_POST['facebook'];

//Forbereder en prepared statement
$query = "INSERT INTO kontakter (fornavn,etternavn,mobil,epost,facebook) VALUES (?,?,?,?,?)";

//Vi trenger informasjon om brukernavn, passord og navn på databasen vi skal koble oss til.
$username = 'root';
$password = '';
$databasenavn = 'testdatabase';

//Vi oppretter forbindelsen til databasen vår.
$mysql = new mysqli('localhost', $username, $password, $databasenavn);
if ($mysql->connect_error) {
    die('Kunne ikke koble til MySQL: ' . $mysql->connect_error);
}

//Dokumentasjon: https://php.net/manual/en/mysqli.prepare.php
$stmt = $mysql->prepare($query);
$stmt->bind_param("s",$fornavn,$etternavn,$mobil,$epost,$facebook);

//Vi rydder opp etter oss.
$stmt->close();
$mysql->close();
?>