<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Løsningsforslag til programmeringskurs i PHP</title>
    <style>
        .kode {
            white-space: pre;
            font-family: monospace;
        }
    </style>
</head>

<body>

    <!-- ----------------------------------------------------------- -->
    <h1>Oppgave 3-1</h1>
    <div class="kode">
<?php 
echo "Hallo verden!\n";
?>
    </div>

    <!-- ----------------------------------------------------------- -->
    <h1>Oppgave 3-2</h1>
    <div class="kode">
<?php 
echo "Hallo Rune\n";
?>
    </div>

    <!-- ----------------------------------------------------------- -->
    <h1>Oppgave 4-1</h1>
    <div class="kode">
<?php 
$fornavn = "Rune";
echo "Hallo $fornavn\n";
?>
    </div>

    <!-- ----------------------------------------------------------- -->
    <h1>Oppgave 4-2</h1>
    <div class="kode">
<?php 
$hilsen = "Hei";
$fornavn = "Rune";
echo "$hilsen $fornavn\n";
?>
    </div>

    <!-- ----------------------------------------------------------- -->
    <h1>Oppgave 4-3</h1>
    <div class="kode">
<?php 
//Integer
$epler = 3;
$pærer = 4;
$frukt = $epler + $pærer;
echo "Antall frukt er $frukt \n";

//Float
$tall_1 = 2.71828; //Legg merke til at . brukes som desimalskille
$tall_2 = 3.14159; //Du kan også bruke funksjonen pi()
$tall_3 = $tall_1 ** $tall_2 - $tall_2;

echo "e opphøyd i pi minus pi er omtrent $tall_3 \n";
?>
    </div>

    <!-- ----------------------------------------------------------- -->
    <h1>Oppgave 4-4</h1>
    <div class="kode">
<?php 
//Integer
$epler = 3;
$pærer = 4;
$bananer = 7;
$frukt = $epler + $pærer + $bananer;
echo "Antall frukt er $frukt \n";
?>
    </div>

    <!-- ----------------------------------------------------------- -->
    <h1>Oppgave 4-5</h1>
    <div class="kode">
<?php 
//Integer
$radius = 4;
$pi = 3.14159;
$areal = $pi * $radius ** 2;
echo "Arealet til en sirkel med radius 4 er lik $areal \n";
?>
    </div>

</body>

</html>