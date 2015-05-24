<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//I tidligere eksempler har vi sett på for-løkker.
//Når du ikke vet hvor lenge du skal holde på i en løkke, kan det
//være kjekt å bruke while. Det er en type løkke som holder det gående
//så lenge et eller annet kriterium er sant. Som oftest spiller det
//ingen rolle om du bruker for-løkker eller while-løkker, bruk det
//som du føler at er mest logisk for deg.

$alder = 12;
$under_18 = true;

while($under_18) {
    echo "Alderen er $alder \n";
    //Vi legger til 1 på alderen. Om den fortsatt er mindre enn 18
    //blir uttrykket nedenfor TRUE, større enn eller lik 18 gir FALSE.
    $under_18 = (++$alder < 18); 
}

echo "Nå er alderen $alder!";

//Eksperimenter gjerne med forskjellen på ++$alder og $alder++.
//
//Det finnes også en variant av while som sjekker kriteriet til slutt i løkka,
//og ikke i starten slik som vist over. Varianten skrives slik:
//do {
//    ...;
//} while ($under_18);
?>