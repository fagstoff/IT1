<?php
// Starter ny sesjonen eller fortsetter eksisterende sesjon
session_start();
// Kodeord som brukeren må taste inn riktig
$kodeord = "superhemmelig";
// Funksjon som lager skjema for å taste inn kodeordet
function kodeordskjema() {
    $skjema = "<form action=\"kodeord.php\" method=\"post\">";
    $skjema .= "<input type=\"text\" name=\"brukerens_kodeord\">";
    $skjema .= "<input type=\"submit\" value=\"Send\">";
    $skjema .= "</form>";
    return $skjema;
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
$sidetekst = ""; //Her legger vi inn det som skal vises på siden
if (isset($_SESSION['kodeord_ok']) && $_SESSION['kodeord_ok'] == true) {
    $sidetekst = "<p>Har tastet inn riktig kodeord for lenge siden.</p>";
} elseif (isset($_POST['brukerens_kodeord'])) {
    if ($_POST['brukerens_kodeord'] == $kodeord) {
        $_SESSION['kodeord_ok'] = true;
        $sidetekst = "<p>Du har tastet inn riktig kodeord. Veldig bra!</p>";
    } else {
        $_SESSION['kodeord_ok'] = false;
        $sidetekst = "<p>Du har tastet inn <strong>FEIL</strong> kodeord.</p>";
        $sidetekst .= kodeordskjema();
    }
} else {
    $sidetekst = "<p>Du har <strong>IKKE</strong> tastet inn riktig kodeord ennå.</p>";
    $sidetekst .= kodeordskjema();
}
echo $sidetekst;
?>
</body>
</html>