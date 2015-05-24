<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//Resultatet av sammenlikninger i PHP blir en boolean verdi (sann/usann, true/false)
//De enkleste typene sammenlikninger er:
//		7 > 4     TRUE     (sant at 7 er større enn 4)
//		7 < 4     FALSE    (usant at 7 er ikke mindre enn 4)
//		7 == 4    FALSE    (usant at 7 er lik 4)
//		7 != 4    TRUE     (sant at 7 ikke er lik 4)
//Vi kan også bruke større enn eller lik >= og mindre enn eller lik <=

$alder = 17;

//La oss først se om alderen er ulik fra 42
if ($alder != 42) {
    echo "Du er i alle fall ikke 42.\n";
}

//Vi sjekker alderen nærmere og skriver noen kloke ord avhengig av hva den er
if ($alder < 18) {
    echo "Du er ikke gammel nok!";  
} elseif ($alder >= 18 && $alder < 21) {
    echo "Du er over 18, men du er ikke 21 ennå.";
} elseif ($alder == 21) {
    echo "Oi, du er akkurat 21!";
} else {
    echo "Øy, du er en gamling.";
}
?>