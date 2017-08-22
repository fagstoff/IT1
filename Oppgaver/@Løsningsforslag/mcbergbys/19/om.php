<?php
//For å lage en ryddig implementering og for å kunne gjenbruke kode,
//har mye av PHP-koden blitt laget som funksjoner i fila 'funksjoner.php'.
//Vi inkluderer fila her, sånn at vi kan bruke funksjonene nedenfor.
require 'funksjoner.php';
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8" />
    <title>McBergbys hamburgerskole</title>
    <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
  </head>
  <body>
    <?php lag_navigasjonsmeny("om"); ?>
    <div class="hoved">
      <h1>Om McBergbys</h1>
      <div id="kartboks">
        <h2>Her er vi</h2>
        <a href="http://kart.finn.no?lng=9.6382631483415&amp;lat=59.152884151367&amp;zoom=17&amp;mapType=normap&amp;WT.mc_id=hp_map_cb&amp;showPin=true">
          <img title="Klikk for større kart" alt="Kart som viser hvor McBergbys ligger"
          src="http://kart.finn.no/map/image?lat=59.15288&amp;lng=9.63826&amp;mapType=norwayVector&amp;height=250&amp;width=250&amp;zoom=17&amp;title=&amp;showPin=on&amp;key=3b5e87ea4f3ec3580cfa068dd0e64d82" />
        </a>
      </div>
      <div id="garantiboks">
        <p>Vi i McBergbys lover deg:</p>
        <ul>
          <li>Lynrask servering</li>
          <li>Helt greie priser</li>
          <li>Mat som smaker sånn passe</li>
        </ul>
      </div>
      <div id="omboks">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quis lectus ut felis gravida pellentesque. Mauris lacinia
        tellus non nunc bibendum vulputate. Donec consectetur convallis maximus. Curabitur consequat, quam a dapibus posuere,
        sapien tortor gravida purus, at gravida ipsum est a ligula. Duis posuere ante dolor, et pharetra tellus semper a. Cras nisl
        magna, iaculis vel ipsum sit amet, vehicula suscipit nunc. Aliquam erat volutpat. Mauris id lacinia massa, non convallis
        nisi. Praesent imperdiet erat ut nisl ullamcorper, a ornare tellus pretium.</p>
        <p>Nulla facilisi. In ac scelerisque quam. Fusce mi tortor, pulvinar nec metus ac, sodales viverra mi. Class aptent taciti
        sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin ut libero a lectus semper consectetur ut in
        nulla. Morbi et leo ac augue condimentum congue eu sit amet arcu. Nullam congue felis id laoreet lobortis. Aenean ac est
        luctus, euismod massa non, tincidunt purus. Etiam risus purus, porttitor eu dictum eget, porttitor ac nunc.</p>
        <p>Etiam a metus vitae metus porta vehicula ac eget eros. Ut velit lectus, aliquam eu felis ut, porttitor blandit nunc.
        Aliquam erat volutpat. Ut viverra erat lectus, ac imperdiet lectus facilisis ut. Etiam in diam vitae orci vulputate
        sagittis a sit amet metus. Donec in ante a massa egestas tincidunt. Aliquam ut augue pretium, bibendum dui at, consequat
        ipsum. Morbi eget convallis felis. Mauris quis feugiat arcu.</p>
      </div>
    </div>
    <?php lag_footer(); ?>
  </body>
</html>
