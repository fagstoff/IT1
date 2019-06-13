db03 - Design av databaser
==========================
**Før vi begynner å lage et databasesystem må vi tenke grundig gjennom hva det er vi ønsker å oppnå. Hva er egentlig målet med systemet, og hvilke behov skal det dekke? I den innledende fasen av designprosessen er det viktig å kun ha fokus på hva systemet skal gjøre, og ikke på hvordan systemet skal gjøre det.**

## Design av databaser

Vi begynner designprosessen med å formulere et overordnet designmål for databasesystemet vårt. Dette overordnede målet skal være veiledende under hele prosessen, sånn at vi unngår å legge til funksjoner som er "kjekt å ha" underveis. Da risikerer vi å få et prosjekt som sklir ut i omfang, og som aldri blir ferdig.

Vi skal lage et databasesystem for hurtigmatkjeden McBergbys, og vi starter med å formulere et overordnet designmål: 

> McBergbys skal ha et databasesystem som holder rede på lagerbeholdning av råvarer, oppskrifter, menyer med priser og registrering av salg.

Når vi har det overordende designmålet på plass, kan vi formulere flere målsetninger som er mer detaljerte i forhold til oppgavene som systemet skal gjøre. I denne delen av designprosessen bør brukerne delta aktivt. Brukerne er de som skal bruke systemet og kjenner behovene. Brukerne kan fortelle systemutviklerne hva systemet må kunne utføre av oppgaver for å nå det overordnede designmålet.

For systemet til McBergbys kan vi for eksempel sette opp disse målsetningene:
 * Til enhver tid ha oversikt over råvarelagerbeholdningen
 * Hente frem oppskriften for en gitt meny
 * Holde rede på menyene og utsalgsprisene for disse
 * Registrere alle salg og samtidig oppdatere lagerbeholdning for råvarer


## Datamodell

**Nå har vi det overordnede målet på plass, og vi har planlagt hvilke oppgaver databasen vår skal løse. Da er tiden inne for å lage en datamodell. Denne datamodellen er en grafisk representasjon av databasen vi skal lage.**

**TODO: Kort om normalisering. Vise eksempler, f.eks. vise hvorfor det ikke er noen god idé å ha oppskriften som en kolonne i menytabellen.**