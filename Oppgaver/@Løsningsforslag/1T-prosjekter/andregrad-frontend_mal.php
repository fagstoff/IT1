<?php
require 'andregrad-backend_mal.php'; 
?>
<!DOCTYPE html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="author" content="bitjungle">
  <link rel="stylesheet" href="andregrad-stil_mal.css" />
  <title>Demo som kan brukes til matte-app</title>
</head>

<body>
    <h1>Demo som kan brukes til matte-app</h1>
    <form action="andregrad-frontend_mal.php" method="post">
      <h2>Skriv inn parametre</h2>
      <fieldset id="params">
        <input type="number" name="a" id="her_er_a" placeholder="a" required />
        <input type="number" name="b" id="her_er_b" placeholder="b" required />
        <input type="submit" value="&nbsp;Beregn!&nbsp;">
      </fieldset><!-- param -->
    </form>
    <div id="svaromraade">
      <?php
      //echo funksjonstest();
      echo "Her er svaret: x = 999 :-)";
      ?>
    </div>
</body>
</html>