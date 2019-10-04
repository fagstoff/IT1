# 10: Timeplanen 4.0

Her skal du fortsette å forbedre HTML-siden som du laget i øvingen "Timeplanen", "Timeplanen 2.0" og "Timeplanen 3.0". Nå skal siden gjøres responsiv, sånn at den fungerer godt med både mobiltelefoner, nettbrett og PC-er.

## Oppgave

Jobb videre med fila `timeplan.html` fra forrige oppgave. I versjon 4 skal du jobbe med å få til en responsiv design. Lag siden som er vist i bildet nedenfor. Du skal bruke rammeverket [W3.CSS](https://www.w3schools.com/w3css/) når du lager siden.

Når du gjør nettleservinduet ditt smalt (simulerer en smal mobilskjerm), skal bildet, infoboksen og tabellen posisjoneres pent i en kolonne under hverandre. 

![Den ferdige nettsiden](https://raw.githubusercontent.com/fagstoff/IT1/master/Bilder/timeplan4.png)

## Ressurser

* Gå gjennom opplæringa på siden [W3.CSS](https://www.w3schools.com/w3css/).
* Se nøye gjennom dokumentasjonen for [W3.CSS Built-In Responsiveness](https://www.w3schools.com/w3css/w3css_responsive.asp).
* Bruk gjerne eksempelkoden nedenfor som utgangspunkt for siden din.

```html
<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>w3css demo</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <div class="w3-row">
    <div class="w3-half w3-container w3-blue">
      <h1>Blått!</h1>
      <p>Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått! Blått!</p>
    </div><!-- w3-half -->
    <div class="w3-half w3-container w3-yellow">
      <h1>Gult!</h1>
      <p>Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult! Gult!</p>
    </div><!-- w3-half -->
  </div><!-- w3-row-padding -->
  <div class="w3-row">
    <div class="w3-half w3-container w3-red">
      <h1>Rødt!</h1>
      <p>Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt! Rødt!</p>
    </div><!-- w3-half -->
    <div class="w3-half w3-container w3-green">
      <h1>Grønt!</h1>
      <p>Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt! Grønt!</p>
    </div><!-- w3-half -->
  </div><!-- w3-row-padding -->
</body>
</html>
```

## Vurderingskriterier

* HTML-siden skal validere uten feil og advarsler på [validator.w3.org](https://validator.w3.org/).
* Tabellen skal ha samme antall rader og kolonner som vist i eksempelbildet over, men du kan gjøre visuelle forbedringer av siden så lenge den valideres uten feil og advarsler.
* Når nettleservinduet gjøres smalt skal siden vises på samme måte som i "Timeplanen 2.0".

Kompetansemål
-------------
* redigere nettsteder ved bruk av standardiserte oppmerkingsspråk

>Denne oppgaven er laget av [fuzzbin](https://github.com/fuzzbin) og [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
