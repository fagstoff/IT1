<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//PHP har mange innebygde funksjoner, se https://php.net/ manual/en/funcref.php

//Vi kan bruke funksjonen strlen() for å finne lengden av en streng.
$tekststreng = "Dette er en lang streng. Hvor mange tegn er det egentlig?";
echo 'Det er ' . strlen($tekststreng) . " tegn. \n";

//Det finnes mange matematikk-funksjoner også, her er ett eksempel:
$pi = 3.1415926535897932384626433832795028841971693993751;
echo 'Runder av pi til fire desimaler: ' . round($pi, 4) . "\n";

//Og datofunksjoner så klart:
echo "Dato og klokkeslett akkurat nå: " . date("Y-m-d H:i:s") . "\n";

//...og mange, mange andre funksjoner!
//   https://php.net/manual/en/funcref.php

?>