<?php

/*
 * I forrige leksjon opprettet vi en tabell i testdatabasen vår, men vi la ikke inn noe innhold i den.
 * Nå skal vi fylle opp med innhold slik at vi får dette:
 *
 * +----+---------+-----------+----------+------------------+-----------------------------------+
 * | id | fornavn | etternavn |  mobil   |      epost       |             facebook              |
 * +----+---------+-----------+----------+------------------+-----------------------------------+
 * |  1 | Rune    | Mathisen  | 12345678 | rune@eksempel.no | http://www.facebook.com/bitjungle |
 * |  2 | Orvar   | Odd       | 87654321 | orvar@odd.no     |                                   |
 * |  3 | Kari    | Nordmann  | 88877666 | kari@norge.no    | http://www.facebook.com/726d97x36 |
 * +----+---------+-----------+----------+------------------+-----------------------------------+
 *
 * Nedenfor har jeg satt opp spørringene vi må kjøre for å få inn data i tabellen. Legg merke til
 * at jeg ikke angir noen verdi i det første feltet (id). Når vi satte opp tabellen definerte vi
 * id-feltet som en indeks, og vi spesifiserte at det skulle ha auto_increment. Om vi ikke angir
 * noen startverdi vil det første innlegget av data få id 1, og deretter vil id-en automatisk øke
 * med 1 for hvert nye innlegg av data.
 */
$rune = "INSERT INTO kontakter VALUES
('','Rune','Mathisen','12345678','rune@eksempel.no','http://www.facebook.com/bitjungle')";
$orvar = "INSERT INTO kontakter VALUES
('','Orvar','Odd','87654321','orvar@odd.no','')";
$kari = "INSERT INTO kontakter VALUES
('','Kari','Nordmann','88877666','kari@norge.no','http://www.facebook.com/726d97x36')";

//Vi trenger informasjon om brukernavn, passord og navn på databasen vi skal koble oss til.
$username='root';
$password='';
$databasenavn='testdatabase';

//Vi oppretter forbindelsen til databasen vår.
$mysql = new mysqli('localhost', $username, $password, $databasenavn);
if ($mysql->connect_error) {
    die('Kunne ikke koble til MySQL: ' . $mysql->connect_error);
}

$mysql->query($rune);
$mysql->query($orvar);
$mysql->query($kari);

$mysql->close();
?>
