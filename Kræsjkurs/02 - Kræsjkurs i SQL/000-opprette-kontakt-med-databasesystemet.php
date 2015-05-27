<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

/*
 * 
 *
 *
 */

$username = 'root';
$password = '';

$mysql = new mysqli('localhost', $username, $password);
if ($mysql->connect_error) {
    die('Kunne ikke koble til MySQL: ' . $mysql->connect_error);
} else {
    echo 'Vi fikk kontakt med serveren!';
}
$mysql->close();
?>