<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Definerer en array med tre årstider
$årstider = array("Vår", "Sommer", "Høst");
echo "Årstid 3 er $årstider[2] \n";

//Legger til en ny årstid bakerst i arrayet
$årstider[] = "Vinter";

//Skriver ut hele arrayen med årstidene
print_r($årstider);

//Hvis vi vil ha Vinter i starten av arrayet, kan vi gjøre slik:
array_unshift($årstider, "Vinter");

//Men nå har vi vinter både i starten og slutten
print_r($årstider);

//Vi fjerner den bakerste vinteren
array_pop($årstider);

//La oss se om det ble riktig
print_r($årstider);
?>