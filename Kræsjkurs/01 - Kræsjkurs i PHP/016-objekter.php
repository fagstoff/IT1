<?php
//Copyright 2015 BITJUNGLE Rune Mathisen
//Lisens: https://www.apache.org/licenses/LICENSE-2.0

//PHP kan brukes som et såkalt objektorientert programmeringsspråk. I slike språk
//er klasser og objekter helt sentrale. En klasse er den formelle beskrivelse av
//hva et objekt skal inneholde, og det kan være både variabler og funksjoner.
//Det er et stort og langt studium å lære seg objektorientert programmering,
//så vi må nøye oss med et veldig enkelt eksempel. Vi setter opp en klasse som er
//en generell beskrivelse av en person, deretter oppretter vi to objekter som er
//konkrete personer.

class Person {
    //Objekter av denne klassen inneholder to variabler.
    //Her kunne vi fylt opp med masse informasjon som definerer personer,
    //for eksempel høyde, vekt, kjønn, skostørrelse og så videre.
    public $fornavn;
    public $etternavn;
 
    //Når du konstruerer et nytt objekt fra klassen Person, må du
    //angi fornavn og etternavn. Funksjonen nedenfor kjøres når det
    //opprettes nye objekter.
    public function __construct($fornavn, $etternavn) { 
        $this->fornavn = $fornavn;
        $this->etternavn  = $etternavn;
    }
 
    //Funksjoner i klasser kalles for metoder. Vi definerer en enkel metode.
    public function hilsen() {
        return 'Hei, jeg heter ' . $this->fornavn . ' ' . $this->etternavn . '.';
    }
}

//Vi bruker klassen Personer til å opprette to objekter:
$nerd    = new Person('Rune', 'Mathisen');
$helt   = new Person('Orvar', 'Odd');
 
echo $nerd->hilsen() . "\n";
echo $helt->hilsen() . "\n";

?>