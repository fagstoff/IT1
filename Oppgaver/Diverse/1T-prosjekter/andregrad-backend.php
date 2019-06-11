<?php

function hent_skjemadata($feltnavn, $htmlspecialchars = false) {
  if (isset($_POST[$feltnavn])) {
    if ($htmlspecialchars) {
      return htmlspecialchars($_POST[$feltnavn]);
    } else {
      return $_POST[$feltnavn];
    }
  } else {
    return null;
  }  
}

function hent_parameter($parameternavn) {
  $param = hent_skjemadata($parameternavn);
  if (is_numeric($param)) {
    return $param;
  } else {
    return null;
  }
}

function beregn_nullpunkter($a, $b, $c) {
  $rotuttrykk = beregn_rotuttrykk($a, $b, $c);
  if ($a == 0) {
    return "Dette er ikke et andregradsuttrykk, a kan ikke være 0";
  } elseif($rotuttrykk < 0) {
    return "Ingen nullpunkter";
  } elseif ($rotuttrykk == 0) {
    $x = beregn_nullpunkt($a, $b, $rotuttrykk, 0);
    return "x = {$x}";
  } else {
    $x1 = round(beregn_nullpunkt($a, $b, $rotuttrykk, 1), 4);
    $x2 = round(beregn_nullpunkt($a, $b, $rotuttrykk, -1), 4);
    return "x<sub>1</sub> = {$x1} og x<sub>2</sub> = {$x2}";
  }
}

function beregn_nullpunkt($a, $b, $rotuttrykk, $pm) {
  return (-$b + $pm*sqrt($rotuttrykk)) / 2*$a;
}

function beregn_rotuttrykk($a, $b, $c) {
  return $b**2 - 4*$a*$c;
}

?>