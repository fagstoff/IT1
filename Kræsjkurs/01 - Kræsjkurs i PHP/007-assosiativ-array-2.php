<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Vi kan sette arrays inne i arrays, da kan vi få veldig ryddige og fine datastrukturer
$persondata = array(
    "unik_nøkkel_1" => array(
        "navn" => "Rune",
        "øyner" => "blå",
        "alder" => 48,
        "vekt" => 84.2,
        "kjønn" => "mann",
        "nerd" => true
    ),
    "unik_nøkkel_2" => array(
        "navn" => "Randi",
        "øyner" => "grønne",
        "alder" => 45,
        "vekt" => 67.4,
        "kjønn" => "kvinne",
        "nerd" => false
    )
);
print_r($persondata);

//La oss plukke ut noe data fra arrayet
echo $persondata['unik_nøkkel_1']['navn'] . ' veier ' . $persondata['unik_nøkkel_1']['vekt'] . ' kg';
?> 