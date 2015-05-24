<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Vi lager variablene $var1 og $var2 og fyller dem med tekststrenger.
//Tekststrenger plasseres mellom anførselstegn,
//både enkle ' ' og doble " " fungerer.

$var1 = 'Hei du.';
$var2 = "Hallo!";

//Vi skriver ut innholdet i de to variablene.
//Vi slår sammen innholdet ved å bruke . (punktum).
echo $var1 . $var2;

//Vi legger til linjeskift kommandoen \n plassert mellom doble anførselstegn.
echo "\n";

//Det ble ikke noe mellomrom mellom de to tekststrengene, det kan vi fikse.
echo $var1 . ' ' . $var2;
echo "\n";

//Nå plasserer vi variablene mellom to doble anførselstegn " ".
//Da kan vi få inn variabelverdiene, mellomrommet og ny linje i en og samme operasjon.
echo "$var1 $var2 \n";

//Forsøk videre på egen hånd. Hva fungerer og hva fungerer ikke?
?>