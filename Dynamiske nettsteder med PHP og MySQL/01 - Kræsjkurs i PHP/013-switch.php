<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Husker du if-testen vi så på i fila 004-if-test.php?
//Det kan bli ganske kronglete når vi har mange else-if
//etter hverandre. Ofte kan det gjøres mer elegant med
//bruk av switch.

$alder = 18;

switch($alder) {
    case 17 :
        echo "Du er 17";
        break;//Denne kommandoen gjør at programmet hopper ut av switch-løkka.
    case 18 :
        echo "Du er 18";
        break;
    case 19 :
        echo "Du er 19";
        break;
    case 20 :
        echo "Du er 20";
        break;
    case 21 :
        echo "Du er 21";
        break;
    default : //Dersom ingen av casene over passet...
        echo "Du er under 17 eller over 21";
        break;
}

?>