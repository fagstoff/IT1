<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Det finnes spesielle operatorer i PHP for å øke (increment) og minske (decrement)
//verdien av en heltallsvariabel med 1. La oss se på hvordan de virker.

$var = 1; //Vi starter med verdien 1
echo 'Verdien er ' . $var . "\n";
echo 'Med ++ før variablen blir verdien ' . ++$var . "\n";//Variabelen øker med 1 før strengen evalueres
echo 'Med ++ etter variablen blir verdien ' . $var++ . "\n";//Variabelen øker med 1 etter at strengen evalueres
echo '...og nå er verdien ' . $var . "\n";
echo 'Med -- før variablen blir verdien ' . --$var . "\n";//Variabelen minker med 1 før strengen evalueres
echo 'Med ++ etter variablen blir verdien ' . $var-- . "\n";//Variabelen minker med 1 etter at strengen evalueres
echo '...og nå er verdien ' . $var . "\n";
?>