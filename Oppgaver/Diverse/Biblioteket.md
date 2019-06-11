# Biblioteket

Biblioteket på Porsgrunn videregående skole skal ha et nytt databasesystem, og du har fått jobben med å lage en prototype til det nye systemet. I utgangspunktet er det interessant å lagre data om:

* Bøker
 * Tittel
 * Forfatter
 * Forlag
 * Utgivelsesår
 * Utgave
 * Språk
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

Eksempeldata er gitt nedenfor.


## Eksempeldata

### Bøker:

* Boktittel: Tekniske tenester, faktabok
 * Forfattere: Jørn Kenneth Andersen, Eyolf Herø, Svein Olaf Michelsen, Rolf Rønning, Rune Mathisen
 * Forlag: Gyldendal
 * Utgivelsesår: 2012
 * 2. utgave
 * Nynorsk
 * ISBN: 9788205418066 
* Boktittel: Sosial kapital i et velferdsperspektiv
 * Forfattere: Rolf Rønning, Bengt Starrin 
 * Forlag: Gyldendal
 * Utgivelsesår: 2009
 * 1. utgave
 * Bokmål
 * ISBN: 9788205392489
* Boktittel: Empowerment i teori og praksis
 * Forfattere: Lars Dahlgren, Bengt Starrin
 * Forlag: Liber
 * Utgivelsesår: 2004
 * 1. utgave
 * Svensk
 * ISBN: 9789147074334

### Forfattere: 
* Jørn Kenneth Andersen
 * Statsborgerskap: Norsk
 * Fødselsår: 1964
* Eyolf Herø
 * Statsborgerskap: Norsk
 * Fødselsår: 1944
* Svein Olaf Michelsen
 * Statsborgerskap: Norsk
 * Fødselsår: 1943
* Rolf Rønning
 * Statsborgerskap: Norsk
 * Fødselsår: 1946
* Rune Mathisen
 * Statsborgerskap: Norsk
 * Fødselsår: 1968
* Bengt Starrin
 * Statsborgerskap: Svensk
 * Fødselsår: 1947
* Lars Dahlgren
 * Statsborgerskap: Svensk
 * Fødselsår: 1948

### Låntakere:
* Ole Olsen
 * Nygata 2
 * 4609
 * 99988777
* Jens Jensen
 * Gamlegata 3
 * 4609
 * 44455666
* Nils Nilsen
 * Slottsplassen 1
 * 0010 Oslo
 * 12345678

