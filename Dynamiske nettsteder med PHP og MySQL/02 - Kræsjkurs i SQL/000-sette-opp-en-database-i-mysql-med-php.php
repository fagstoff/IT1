<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

/*
 * Nå skal vi sette opp en eksempeldatabase som vi skal bruke i de neste øvingene.
 *
 *
 */

$username='root';
$password='';
$databasenavn='testdatabase';
$databaseoppsett='CREATE DATABASE ' . $databasenavn;
$tabelloppsett='CREATE TABLE kontakter (
id int(8) NOT NULL auto_increment,
fornavn varchar(25) NOT NULL,
etternavn varchar(25) NOT NULL,
mobil varchar(12) NOT NULL,
epost varchar(50) NOT NULL,
facebook varchar(255),
PRIMARY KEY (id), UNIQUE id (id), KEY id_2(id))';


$mysql = new mysqli('localhost', $username, $password);
if ($mysql->connect_error) {
    die('Kunne ikke koble til MySQL: ' . $mysql->connect_error);
}

if ($mysql->query($databaseoppsett) === TRUE) {
    echo 'Ny database opprettet';
} else {
    echo $mysql->error;
}

$mysql->select_db($databasenavn);

if ($mysql->query($tabelloppsett) === TRUE) {
    echo 'Ny tabell opprettet';
} else {
    echo $mysql->error;
}
$mysql->close();
?>