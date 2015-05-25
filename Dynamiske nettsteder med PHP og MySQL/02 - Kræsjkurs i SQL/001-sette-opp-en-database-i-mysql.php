<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

/*
 * Nå skal vi sette opp en eksempeldatabase som vi skal bruke i de neste øvingene. I databasen skal
 * vi opprette en tabell som vi skal bruke for å samle kontaktinformasjon for personer. Tabellen
 * skal se slik ut:
 *
 * +----+---------+-----------+----------+------------------+-----------------------------------+
 * | id | fornavn | etternavn |  mobil   |      epost       |             facebook              |
 * +----+---------+-----------+----------+------------------+-----------------------------------+
 * |    |         |           |          |                  |                                   |
 * |    |         |           |          |                  |                                   |
 * |    |         |           |          |                  |                                   |
 * +----+---------+-----------+----------+------------------+-----------------------------------+
 *
 */

//Sjekk at du har gyldige brukernavn og passord for å koble deg til databasen.
//I en standard XAMPP-installasjon kan du bruke 'root' uten passord.
//Du må ALLTID ha et skikkelig passord om du bruker serveren i et produksjonsmiljø,
//men det er greit i utviklermiljøet vi bruker i dette kurset.
$username = 'root';
$password = '';

//Databasen vi straks skal opprette kan vi kalle for 'testdatabase'. Endre den gjerne
//til noe annet om du ønsker det (men da må du endre i alle skriptene i dette kurset).
$databasenavn = 'testdatabase';

//Her setter vi opp spørringen som oppretter databasen for oss. Her er syntaksen ganske
//grei å forstå: "Lag en database med navnet testdatabase".
$databaseoppsett = "CREATE DATABASE $databasenavn";

//Nå kommer det en mye mer komplisert spørring som skal sette opp tabellen for oss.
$tabelloppsett = "CREATE TABLE kontakter (
id int(8) NOT NULL auto_increment,
fornavn varchar(25) NOT NULL,
etternavn varchar(25) NOT NULL,
mobil varchar(12) NOT NULL,
epost varchar(50) NOT NULL,
facebook varchar(255),
PRIMARY KEY (id), UNIQUE id (id), KEY id_2(id))";


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