<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Setter opp en assosiativ array
$persondata = array(
  "øyner" => "blå",
  "alder" => 48,
  "vekt" => 84.2,
  "kjønn" => "mann",
  "nerd" => true
);
print_r($persondata);

//Nå kan vi hente ut data fra arrayen med feltnavn som referanse
echo "Vekten er " . $persondata["vekt"];
?> 