<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Den (kjempe-)store gangetabellen</title>
</head>
<body>
<h1>Den (kjempe-)store gangetabellen</h1>
<?php
define('START', 11);//Vi starter beregninga på denne verdien
define('STOPP', 20);//Vi stopper beregninga på denne verdien

$a = START;//Setter til startverdi
$b = START;//Setter til startverdi

// Lager den første raden (kolonnenavn)
echo "<table>\n<thead>\n<tr><th>&nbsp;</th>\n";
for ($i = START; $i < STOPP+1; $i++) {
  echo "<th>{$i}</th>";
}

//Avslutter raden med kolonnenavn, og gjør klar til den første
//raden med utregninger. Den første kolonna inneholder radnavn.
echo "</tr>\n</thead>\n<tbody>\n<tr><td><strong>{$b}</strong></td>";

while ($b <= STOPP) {//Kjører beregning inntil $b når stopp-verdien
  echo '<td>' . $a*$b . '</td>';//Her skrives resultatet av utregninga
  $a++;//Øker verdien til $a med 1
  if ($a > STOPP) {//Har $a passert stopp-verdien?
    $a = START;//Stiller $a tilbake til startverdien
    echo "</tr>\n";//Her slutter raden
    $b++;//Øker verdien til $b med 1
    if ($b <= STOPP) {//Gjør klar en ny rad dersom $b er mindre enn stoppverdien
      echo "<tr><td><strong>{$b}</strong></td>";
    }
  } 
}

//Avslutter tabellen
echo "\n</table>\n";
?>
</body>
</html>