<!DOCTYPE html>
<html lang="no">
<head>
	<meta charset="utf-8" />
	<title>Bestillingsmottak</title>
  <link rel="stylesheet" href="stiler/mcbergbys-2.css" />
</head>
<body>
	<pre>
<code>
<?php 
 print_r($_POST);
?>
</code>
</pre>
	<p>
		Slik kan du lage din egen bestillingsmottaksfil:
		<ol>
			<li>Opprett en fil med navnet "bestillingsmottak.php" (se på det du har lagt inn i "form action" i bestillingsskjemaet ditt).</li>
			<li>I den fila du opprettet legger du inn &lt;?php print_r($_POST);?&gt;.</li>
			<li>Overfør fila til elevweb.skit.no, i samme mappe som fila med bestillingsskjema ligger.</li>
		</ol>
</body> 
</html>