<?php
// Starter ny sesjonen eller fortsetter eksisterende sesjon
session_start();
define('MAX_TALL', 16); // Maks antall valgbare tall

/**
 * Lager tallrekka som brukeren kan klikke på. 
 * Tall som allerede er gjettet, blir ikke klikkbare.
 */
function tallrekka($ekskluder = array()) {
    $rekke = '';
    for ($i = 1; $i < MAX_TALL+1; $i++) {
        if (in_array($i, $ekskluder)) {
            $rekke .= "<span style=\"text-decoration: line-through;\">{$i}</span>&nbsp;";
        } else {
            $rekke .= "<a href=\"?num={$i}\">{$i}</a>&nbsp;";
        }
    }
    return $rekke;
}

// Vi sjekker om brukeren vil starte et nytt spill
if (isset($_GET['nyttspill']) && $_GET['nyttspill'] == 'j') {
    $reset = true;
} else {
    $reset = false;
}

// Lager en teller som holder rede på hvor mange ganger brukeren har gjettet
if (!isset($_SESSION['antallforsøk'])) {
    $_SESSION['antallforsøk'] = 0;
}

// Vi lager et nytt hemmelig tall
// dersom vi ikke har noe hemmelig tall fra før, 
// eller dersom brukeren vil starte et nytt spill.
if (!isset($_SESSION['hemmeligtall']) || $reset) {
    $_SESSION['hemmeligtall'] = rand(1, MAX_TALL);
    // Nullstiller arrayen som inneholder det brukeren har gjettet.
    $_SESSION['hargjettet'] = array();
    // Nullstiller teller
    $_SESSION['antallforsøk'] = 0;
}

// Vi oppretter en array som skal inneholde alle tallene
// som brukeren har gjettet.
if (!isset($_SESSION['hargjettet'])) {
    $_SESSION['hargjettet'] = array();
}

$feedback = "";

// Vi lagrer alle tallene brukeren har gjettet
if (isset($_GET['num']) && !in_array($_GET['num'], $_SESSION['hargjettet'])) {
    // Legger til det nye tallet i arrayen som inneholder alt brukeren har forsøkt
    array_push($_SESSION['hargjettet'], $_GET['num']);
    // Teller dette forsøket
    $_SESSION['antallforsøk']++;
    // Sjekker om forsøket var for høyt, for lavt eller helt riktig
    if ($_GET['num'] < $_SESSION['hemmeligtall']) {
        $feedback = "Du gjettet for lavt."; 
    } elseif ($_GET['num'] > $_SESSION['hemmeligtall']) {
        $feedback = "Du gjettet for høyt.";
    } else {
        $feedback = "Wow, du gjettet riktig!"; 
    }
}

$sidetekst = "<p>"; // I denne variablen lagrer vi det som skal skrives ut på nettsiden
$sidetekst .= tallrekka($_SESSION['hargjettet']);
$sidetekst .= "</p>";
$sidetekst .= "<p>Antall forsøk: {$_SESSION['antallforsøk']}</p>";
$sidetekst .= "<p>{$feedback}</p>";
$sidetekst .= "<p><a href=\"?nyttspill=j\">Klikk for å starte et nytt spill</a></p>";

?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Spill: gjett tallet!</title>
</head>
<body>
<h1>Gjett tallet jeg tenker på</h1>
<?php
echo $sidetekst;
?>
</body>
</html>