<?php
require 'andregrad-backend.php'; 

$a = hent_parameter("a");
$b = hent_parameter("b");
$c = hent_parameter("c");
?>
<!DOCTYPE html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="author" content="bitjungle">
  <link rel="stylesheet" href="andregrad-stil.css" />
  <title>Finne nullpunkter for andregradsfunksjoner</title>
</head>

<body>
    <h1>Finne nullpunkter for andregradsfunksjoner</h1>
    <form action="andregrad-frontend.php" method="post">
      <h2>Skriv inn parametre</h2>
      <fieldset id="params">
        <input type="number" name="a" placeholder="a" value="<?php echo $a ?>" required />
        <label for="a">x<sup>2</sup>&nbsp;+&nbsp;</label>
        <input type="number" name="b" placeholder="b" value="<?php echo $b ?>" required />
        <label for="b">x&nbsp;+&nbsp;</label>
        <input type="number" name="c" placeholder="c" value="<?php echo $c ?>" required />
        <label for="c">=&nbsp;0&nbsp;</label>
        <input type="submit" value="&nbsp;Beregn!&nbsp;">
      </fieldset><!-- params -->
    </form>
    <hr/>
    <img src="andregrad-abc.png" id="abc-formel-bilde" alt="abc-formelen" />
    <div id="svaromraade">
      <?php
      if($a == null or $b == null or $c == null) {
        echo "Du må taste inn tall for a, b og c";
      } else {
        echo beregn_nullpunkter($a, $b, $c);
      }

      ?>
    </div>
</body>
</html>