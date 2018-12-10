<?php
// Starter ny sesjonen eller fortsetter eksisterende sesjon
session_start();

// Kodeord som brukeren må taste inn riktig
$kodeord = "superhemmelig";

//Her legger vi inn det som skal vises på siden
$sidetekst = ""; 

// Funksjon som lager skjema for å taste inn kodeordet
function kodeordskjema() {
    $skjema = "<form action=\"kodeord.php\" method=\"post\">";
    $skjema .= "<input type=\"text\" name=\"brukerens_kodeord\">";
    $skjema .= "<input type=\"submit\" value=\"Send\">";
    $skjema .= "</form>";
    return $skjema;
}

// Nå tester vi vilken tilstand vi er i.
if (isset($_SESSION['kodeord_ok']) && $_SESSION['kodeord_ok'] == true) {
    // Brukeren har tastet inn et kodeord, og vi har sjekket at det er riktig.
    $sidetekst = "<p>Har tastet inn riktig kodeord for lenge siden.</p>";
} elseif (isset($_POST['brukerens_kodeord'])) {
    // Brukeren har tastet inn et kodeord, men vi har ikke sjekket det ennå.
    if ($_POST['brukerens_kodeord'] == $kodeord) {
        // Kodeordet er riktig,
        $_SESSION['kodeord_ok'] = true;
        $sidetekst = "<p>Du har tastet inn riktig kodeord. Veldig bra!</p>";
    } else {
        // Kodeordet er feil.
        $_SESSION['kodeord_ok'] = false;
        $sidetekst = "<p>Du har tastet inn <strong>FEIL</strong> kodeord.</p>";
        // Lager skjema for inntasting av kodeord.
        $sidetekst .= kodeordskjema();
    }
} else {
    // Brukeren har ikke tastet inn noe kodeord ennå.
    $sidetekst = "<p>Du har <strong>IKKE</strong> tastet inn riktig kodeord ennå.</p>";
    // Lager skjema for inntasting av kodeord.
    $sidetekst .= kodeordskjema();
}

?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Tester sesjon</title>
</head>
<body>
<?php
echo $sidetekst;
?>
</body>
</html>