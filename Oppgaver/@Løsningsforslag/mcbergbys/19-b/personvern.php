<?php
require 'funksjoner.php'; 
?>
<!DOCTYPE html>
<html lang="no">

<head>
  <meta charset="utf-8">
  <meta name="author" content="bitjungle">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="stiler/mcbergbys-bootstrap.css" />
  <title>McBergbys bestillingssystem</title>
</head>

<body>
  <nav class="navbar nav-tabs fixed-top bg-dark navbar-dark navbar-expand-sm pb-0">
    <div class="container">
      <a class="navbar-brand" id="logo" href="#">
        <img src="bilder/burger-1487481.svg" alt="McBergbys logo - CC0 midicomp" style="width: 40px;">McBergbys</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburgermeny" aria-controls="hamburgermeny"
        aria-expanded="false" aria-label="Vis navigasjonsmeny">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="hamburgermeny">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link" href="index.php">Bestilling</a>
          <a class="nav-item nav-link" href="om.php">Om&nbsp;McBergbys</a>
          <a class="nav-item nav-link" href="hamburgerskolen.php">Burgerskolen</a>
        </div><!-- navbar-bar -->
      </div><!-- navbar-collapse -->
      <span class="navbar-text d-none d-xl-inline-block ml-5 bg-dark text-white" id="slogan">Vi har de feteste
        burgerne!</span>
    </div><!-- container -->
  </nav>

  <div class="container">
    <h1>McBergbys personvernerklæring</h1>
    <!-- Teksten nedenfor er i hovedsak lånt fra MatPrat.no -->
    <p>Vi hos McBergbys er opptatt av å ivareta personvernet til brukerne av vårt nettsted. Vi har utarbeidet denne
      personvernerklæringen for å beskrive hvordan vi som behandlingsansvarlig innhenter, lagrer og anvender dine
      personopplysninger, samt hvilke rettigheter du som bruker har i tilknytning til dette.</p>
    <h2>Hvilke personopplysninger behandles og hvorfor?</h2>
    <p>Som ledd i driften av våre nettsider vil vi kunne be om, samle inn og lagre personopplysninger som navn, e-post
      adresse og telefonnummer fra våre brukere, samt andre opplysninger som er relevante for tjenesten.</p>
    <p>Personopplysningene behandles utelukkende for det formål å utføre de tjenestene vi tilbyr og til å oppfylle
      gjøremål etter brukernes ønsker. Opplysningene vil ikke bli brukt eller utlevert til andre formål.</p>
    <h2>Tilgang og utlevering av opplysninger</h2>
    <p>Det er kun ansatte hos McBergbys som har tilgang til personopplysningene som lagres om deg, og kun i den
      utstrekning slik tilgang er nødvendig for utvikling, drift og vedlikehold av tjenesten. Opplysningene utleveres
      ikke til tredjeparter.</p>
    <h2>Informasjon og rett til innsyn</h2>
    <p>Som bruker av våre nettsteder har du rett til innsyn i de personopplysninger vi behandler om deg. Videre har du
      krav på retting av mangelfulle eller uriktige opplysninger og/eller sletting.</p>
    <h2>Cookies (informasjonskapsler)</h2>
    <p>Cookies er små tekstfiler som plasseres på din datamaskin når du laster ned en nettside. Slike cookies innhenter
      blant annet informasjon om nettleser, oppløsning, operativsystem hos brukerne, samt informasjon om hvorvidt
      brukeren er pålogget eller ikke. Formålet med dette er å gjøre din bruk av tjenesten raskere og bedre.</p>
    <p>Ved å endre innstillingene på din datamaskin kan du forhindre bruk av cookies, men du vil da kunne oppleve at
      ikke alle funksjoner på nettstedet vil fungere. Bruker kan også slette cookies på maskinen sin manuelt etter å ha
      besøkt et nettsted.</p>
    <h2>Kontakt</h2>
    <p>Dersom du ønsker innsyn eller har spørsmål knyttet til denne personvernerklæring kan disse rettes til McBergbys
      på e-post: kontakt@mcbergbys.no.</p>
  </div>

<?php
  lag_footer();
?>
</body>

</html>