# Eksamen i IT1 - eksempeloppgavesett 1

## Oppgave 1
Drittjobber.no er et nystartet selskap med store ambisjoner. Forretningsidéen deres er å koble sammen enkeltpersoner som har litt ledig tid og trenger penger med firmaer som har små og tidsavgrensede jobber som de selv ikke har ressurser til å utføre. Det skal de gjøre gjennom et smart utformet nettsted hvor enkeltpersoner registrerer seg og firmaer legger ut jobbene de har. Det skal så gjøres en automatisk “matching” mellom jobber og jobbsøkere, og firmaene som har ledige småjobber får automatisk tilsendt kontaktinformasjon om aktuelle personer på SMS.

Du skal lage nettsidene til Drittjobber.no. Nettsidene skal bestå av en side med registreringsskjema for jobbsøkere, en side med registreringsskjema for bedrifter og en side med info om Drittjobber.no. I tillegg skal det være en side som lister opp alle jobbsøkere, og en side som lister opp alle bedrifter. **Et rammeverk for implementering av nettstedet er gitt i vedlegg 1**.

Sidene skal utformes etter følgende spesifikasjoner. Alle sider skal:
* fungere godt på en smal skjerm
* validere uten feil og advarsler som HTML5 på [validator.w3.org](https://validator.w3.org)
* være utformet i henhold til kravene om universell utforming
* inneholde en enkel logo som du skal utforme og lagre i en bildefil
* inneholde minst ett illustrativt bilde, med korrekt henvisning til opphavsmann og lisensbetingelser

Siden med registreringsskjema for jobbsøkere skal inneholde:
* et skjema for innlegg av:
 * navn
 * mobilnummer
 * utdanningsnivå (ingen, grunnskole, videregående, høyere utdanning)
 * hvilket ukenummer søkeren er ledig for småjobber (kun èn uke)
 * hvilken bransje jobbsøkeren er interessert i (IT, industri, varehandel, servering, kultur, annet)
* nødvendig kode for lagring av skjemadata til en tabell i en database

Side som lister opp alle jobbsøkere skal inneholde:
* en tabell som viser all informasjon om alle jobbsøkere i databasen

Siden med registreringsskjema for bedrifter skal inneholde:
* et skjema for innlegg av:
 * bedriftens navn
 * mobilnummer til kontaktperson i bedriften
 * ønsket utdanningsnivå (ingen, grunnskole, videregående, høyere utdanning)
 * hvilket ukenummer småjobben er ønsket utført (kun èn uke)
 * hvilken bransje bedriften hører til (IT, industri, varehandel, servering, kultur, annet)
* nødvendig kode for lagring av skjemadata til en tabell i en database

Side som lister opp alle bedrifter skal inneholde:
* en tabell som viser all informasjon om alle bedrifter i databasen

Siden med informasjon om Drittjobber.no skal inneholde:
* tekst som på en enkel måte forklarer konseptet (se det innledende avsnittet i denne oppgaveteksten).
* en innebygget video fra YouTube, for eksempel denne: https://www.youtube.com/watch?v=J01jnOxbzM0 

Legg merke til at sidene med skjema for registrering av jobbsøkere og bedrifter skal lagres til en database. Det betyr at du også må designe og implementere disse to tabellene i en SQL-database.

Under eksamineringen må du demonstrere nettstedet, og du må forklare og begrunne de tekniske valgene du har gjort. Avvik fra spesifikasjonen som er gitt ovenfor kan aksepteres dersom de er bevisste og velbegrunnede. 

Du må også gjøre rede for hva personopplysninger er, og hva slags tiltak du må gjøre for at Drittjobber.no skal holde seg innenfor gjeldende lovverk på dette området.


## Oppgave 2
Biblioteket på Porsgrunn videregående skole skal ha et nytt databasesystem, og du har fått jobben med å lage en prototype til det nye systemet. I utgangspunktet er det interessant å lagre data om:

* Bøker
 * Tittel
 * Forfatter
 * Årstall for første utgivelse
 * ISBN
* Forfattere 
 * Navn
 * Statsborgerskap
 * Fødselsår
* Låntakere
 * Navn
 * Gatedresse
 * Postnummer
 * Mobilnummer

I tillegg til dette må du sørge for at du har nødvendige datafelter i designet ditt for å holde rede på hvilke bøker en forfatter har skrevet, og hvilke bøker en låntaker har lånt. Vær også obs på at biblioteket ofte har flere kopier av samme bok, og at flere låntakere kan låne samme bok (men ulike kopier).

Du skal designe og implementere denne databasen. I tillegg skal du gjøre klar ulike SQL-spørringer som bruker JOIN og GROUP BY og eventuelt andre SQL-kommandoer som du mener at er interessante å bruke i denne databasen.

Eksempeldata er gitt i vedlegg 2.


## Oppgave 3
En av disse fire oppgavene vil bli trukket tilfeldig ut under eksamineringen, og du skal da gjøre rede for dette. Her er de fire oppgavene du kan trekke:

* Hva skjer når du trykker på en lenke i nettleseren din? Forklar!
* Gi argumenter for og imot muligheten for å være anonym på nett. Ta utgangspunkt i hendelser som har vært i nyhetsbildet det siste skoleåret.
* Blir lærerne overflødige? Ta utgangspunkt i din erfaring med Khan Academy, og argumenter for og imot nettbasert og maskinstyrt læring.
* Høsten 2015 ble norske nettleverandører (ISP-er) pålagt av norske myndigheter å blokkere nettstedet PirateBay for sine kunder. Vurder dette pålegget fra myndighetene opp mot begrepet “nettnøytralitet”. 


## Vedlegg 1: Rammeverk for nettsted
TODO

## Vedlegg 2: Eksempeldata for biblioteksdatabase
TODO

