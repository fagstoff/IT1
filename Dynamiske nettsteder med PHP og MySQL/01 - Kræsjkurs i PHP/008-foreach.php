<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Vi setter opp en liten tallrekke i et array
$tallrekke = array(1, 2, 3, 4);

//For hvert tall i dette arrayet skal vi gange det aktuelle tallet med 2
foreach($tallrekke as $tall) {
    $tall = $tall * 2;
    echo "Tallet er $tall \n";
}

//Det opprinnelige arrayet er uendret
print_r($tallrekke);

//Nå gjennomfører vi den samme operasjonen, men refererer til den
//opprinnelige variabel i arrayet med tegnet &. Isteden for å opprette
//en ny variabel, har vi nå en referanse rett inn i arrayet vårt.
//Da kan vi endre på verdiene som ligger lagret der.
foreach($tallrekke as &$tall) {
    $tall = $tall * 2;
}
//Når vi er ferdige med operasjonen er det viktig at vi bryter variabelreferansen,
//ellers kan vi risikere å få uønskede verdier inn i arrayet.
unset($tall);

//Hvordan ser arrayet ut nå?
print_r($tallrekke);


?>