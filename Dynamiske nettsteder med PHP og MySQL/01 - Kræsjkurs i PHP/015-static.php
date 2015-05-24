<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Variabler som bare eksisterer innenfor en funksjon, mister verdien 
//hver gang funksjonen har utført jobben sin. Noen ganger ønsker vi at
//verdien skal huskes. Da kan vi bruke nøkkelordet static.
//De to funksjonene nedenfor har en teller som øker med 1 hver gang
//funksjonen kalles. Legg merke til hva slags effekt static-nøkkelordet har.

function tellOgGlem() {
    $teller = 0;
    $teller++;
    echo "Telleren i tellOgGlem har nå verdien $teller \n";
}

function tellOgHusk() {
    static $teller = 0;
    $teller++;
    echo "Telleren i tellOgHusk har nå verdien $teller \n";
}

tellOgGlem();
tellOgGlem();
tellOgGlem();
echo "--------------------------------------\n";
tellOgHusk();
tellOgHusk();
tellOgHusk();
echo "--------------------------------------\n";
tellOgGlem();
tellOgHusk();

?>