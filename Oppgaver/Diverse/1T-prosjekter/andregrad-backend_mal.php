<?php
// De fem kodelinjene nedenfor brukes kun til å teste funksjonene
// uten å bruke en front-end. Linjene fjernes når prosjektet er 
// klart til utrulling for brukere.

$_POST['her_er_a'] = 2; //Simulerer verdier fra et HTML-skjema
$_POST['her_er_b'] = -3;//Simulerer verdier fra et HTML-skjema
$a = hent_tall('her_er_a');
$b = hent_tall('her_er_b');
echo funksjonstest($a, $b);

function hent_tall($navn) {
  return $_POST[$navn];
}

function funksjonstest($a, $b) {
  return $a * $b;
}

?>