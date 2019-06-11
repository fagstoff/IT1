<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <title>Testside med PHP</title>
  </head>
  <body>
      <p>Rune 





      Mathisen</p>
    <div style="white-space: pre; font-family: monospace;"> 
    <!-- Kommentar i HTML -->
<?php

$tall_1 = 2;
$tall_2 = 3;
$tall_3 = $tall_1 ** $tall_2;

$tall_4 = (2+3)*4;
$tall_5 = 2+3*4;

echo "$tall_1 opphøyd i $tall_2 er lik $tall_3 \n";
?>
    </div>
  </body>
</html>