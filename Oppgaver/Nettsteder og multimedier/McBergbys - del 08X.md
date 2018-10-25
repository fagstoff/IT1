McBergbys del 8X: Mobiltilpassede nettsider
===========================================
**McBerbys forskningsavdeling, eller avdeling X, har nylig blitt oppretta. De skal jobbe med løsninger for framtida, for eksempel utkjøring av bestillinger med [autonome kjøretøy](https://en.wikipedia.org/wiki/Autonomous_car) og betaling med [kryptovaluta](https://en.wikipedia.org/wiki/Cryptocurrency). Du har lyst på en jobb i den avdelinga, og for å vise hva du kan skal du mobiltilpasse McBergbys-nettsidene med biblioteket [Bootstrap](https://getbootstrap.com/).**

Oppgave
-------
Kopier de tre sidene du har laget fra før (i oppgavedelene fra 1 til 8) over i et nytt prosjekt. Ta også med alle mapper som inneholder bilder, videoer og stilark. Du skal legge inn Bootstrap i alle html-filene.

For å legge inn støtte for Bootstrap må du følge anvisningene som er gitt i [dokumentasjonen til Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction/#starter-template). Legg merke til at du må legge inn litt kode i `<head>...</head>` i html-filene dine, og tre nye `<script>`-elementer rett før `</body>` (i slutten av HTML-fila).

Når du har lagt inn støtte for Bootstrap kan du lese videre i [dokumentasjonen der](https://getbootstrap.com/docs/4.1/layout/overview/), og du kan se på [eksempler på bruk](https://getbootstrap.com/docs/4.1/examples/). Prøv deg fram, og se hva du kan få til med McBergbys-sidene. Her er et litt avansert eksempel på hvordan du kan lage navigasjonsmenyen:

``` html 
  <nav class="navbar nav-tabs fixed-top bg-dark navbar-dark navbar-expand-sm pb-0">
    <div class="container">
      <a class="navbar-brand" id="logo" href="#">McBergbys</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburgermeny" aria-controls="hamburgermeny"
        aria-expanded="false" aria-label="Vis navigasjonsmeny">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="hamburgermeny">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="index.html">Bestilling</a>
          <a class="nav-item nav-link" href="om.html">Om&nbsp;McBergbys</a>
          <a class="nav-item nav-link" href="hamburgerskolen.html">Burgerskolen</a>
        </div><!-- navbar-bar -->
      </div><!-- navbar-collapse -->
      <span class="navbar-text d-none d-xl-inline-block ml-5 bg-dark text-white">Vi har de feteste burgerne!</span>
    </div><!-- container -->
  </nav>
```

Ressurser
---------
* Du trenger en teksteditor og en nettleser til denne oppgaven. 
* Du må legge inn Bootstrap-støtte i henhold til anvisningene ovenfor.

Vurderingskriterier
-------------------
* Navigasjonsmeny på alle sidene som gjør det enkelt for besøkende å gå til ønsket side.
* Alle sidene skal fungere godt på en smal skjerm.
* HTML-siden skal validere uten feil og advarsler på [validator.w3.org](https://validator.w3.org/).
* Siden skal være utformet i henhold til kravene om universell utforming, så lang det er mulig.

Kompetansemål
-------------
* redigere nettsteder ved bruk av standardiserte oppmerkingsspråk
* utvikle nettsteder i henhold til planer og vurdere om krav til brukergrensesnitt er oppfylt

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
