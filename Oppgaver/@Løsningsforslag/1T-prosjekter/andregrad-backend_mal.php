<?php
//Koden her brukes kun til å teste funksjonene nedenfor.
//Fjernes når prosjektet er klart til utrulling for brukere.

$_POST['her_er_a'] = 2;
$_POST['her_er_b'] = -3;

$a = hent_tall('her_er_a');
$b = hent_tall('her_er_b');

echo beregn($a, $b);

function hent_tall($navn)
{
  return $_POST[$navn];
}

function beregn($a, $b) 
{
  return $a*$b; 
}

function funksjonstest() 
{
  return "Hallo verden";
}

?>