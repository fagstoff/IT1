<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Denne fila gjør identisk operasjon som det som ble vist i fila 002-streng-1.php,
//men her bruker vi en for-løkke isteden for å hardkode inn referanser til hver
//enkelt karakter i tekststrengen.

$var = 'Hei du';

//Bruker funksjonen strlen() for å finne ut hvor mange tegn det er i strengen.
$antalltegn = strlen($var);

//Vi går steg for steg gjennom strengen med indeksen $i i en for-løkke.
//I linja nedenfor står det:
//    start med at $i har verdien 0, og øk med 1 for hver løkke ($i++)
//    og fortsett så lenge verdien av $i er mindre enn lengden på strengen.
for ($i = 0; $i < $antalltegn; $i++) {
    //Skriver ut gjeldende bokstav i strengen
    echo "Indeks $i : $var[$i] \n";
}
?>