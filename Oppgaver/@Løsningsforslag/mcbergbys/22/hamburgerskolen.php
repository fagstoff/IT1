<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
require 'funksjoner.php';
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta author="bitjungle">
    <title>McBergbys hamburgerskole</title>
    <link rel="stylesheet" href="stiler/mcbergbys-3.css" />
  </head>
  <body>
    <?php lag_navigasjonsmeny("skolen"); ?>
    <div class="hoved">
      <h1>McBergbys hamburgerskole</h1>
      <h2>Lær deg å spise en hamburger</h2>
      <!-- Mer om HTML5-video her: http://www.w3schools.com/tags/tag_video.asp -->
      <video width="720" height="418" controls="" preload="auto">
      <source src="video/how-to-eat-a-hamburger.mp4" type="video/mp4" />
      <source src="video/how-to-eat-a-hamburger.ogv" type="video/ogg" />Nettleseren din har ikke støtte for HTML-video!</video>
      <p class="kildeinfo">Kilde: 
      <a href="https://www.youtube.com/watch?v=fdrJPejMo80">Studio AnKa</a> - Lisens: Creative Commons BY</p>
      <h2>Lær deg å bestille en hamburger på engelsk</h2>
      <iframe width="720" height="405" src="https://www.youtube.com/embed/lz0IT4Uk2xQ?rel=0&amp;showinfo=0;start=17"
      allowfullscreen=""></iframe>
      <p class="kildeinfo">Kilde: 
      <a href="https://youtu.be/lz0IT4Uk2xQ?t=17s">Pink Panther - &quot; I Would like to buy a Hamburger&quot; - Lisens: Standard
      YouTube-lisens</a></p>
    </div>
    <?php lag_footer(); ?>
  </body>
</html>
