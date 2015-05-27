<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Vi var kort innom innebygde funksjoner i PHP i 010-innebygde-funksjoner.php.
//Ofte vil du oppleve at du taster inn mer eller mindre samme kode om og om igjen,
//men at det ikke finnes noen innebygd PHP-funksjon som kan hjelpe deg. Da kan du
//definere dine egne funksjoner. Vi skal se på hvordan det gjøres.

//Definisjoner av funksjoner starter alltid med nøkkelordet function().
//Inne i parentesene etter function() skriver du variabelnavn på verdier som
//skal sendes inn i funksjonen. Du trenger ikke å sende noe inn i en funksjon.

//Denne funksjonen sender ut strengen ping hver gang den kalles. Jepp, det heter
//"å kalle en funksjon" når du ber om at den skal utføres i programmet ditt.
function ping() {
    return "ping\n";
}

//Denne funksjonen legger sammen to tall og returnerer resultatet.
function leggSammen($tall1, $tall2) {
    return $tall1 + $tall2;
}

//Her er en funksjon som legger til litt tekst rundt navnet vi sender inn i funksjonen.
function hilsen($navn) {
    return "Hei $navn, hyggelig å høre fra deg.\n";
}

//Variabler du oppretter inne i funksjonen vil ikke være tilgjengelige fra "utsiden"
//av funksjonen. Tisvarende er ikke variabler som finnes på utsiden av en funksjon
//automatisk tilgjengelige inne i funksjonen. Det er derfor du må definere de variablene
//som skal sendes inn i funksjonen. Dette kalles for "variable scoping", som betyr noe
//sånt som virkeområdet til en variabel.
function kvadratrot($tall) {
    $resultat = $tall ** (1/2);
    //Variablen $resultat er ikke tilgjengelig på utsiden av funksjonen, selv
    //om vi sender ut verdien her.
    return $resultat;
}

echo ping();
echo 'To pluss fem er lik ' . leggSammen(2, 5);
echo "\n";
echo hilsen('Rune');
echo hilsen('Haakon Magnus');
$tallet = 3;
echo "Kvadratroten av $tallet er " . kvadratrot($tallet);
echo "Vi får en feilmelding om vi prøver å referere til variablen $resultat utenfor funksjonen."
?>