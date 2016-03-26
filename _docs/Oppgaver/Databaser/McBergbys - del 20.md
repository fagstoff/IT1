# McBergbys - del 20: SQL injection

**TODO**


## Oppgave

TODO

Tenk deg at noen fyller ut denne kundeinformasjonen i bestillingsskjemaet

>Fornavn: Slem
>Etternavn: Hacker',666); DROP TABLE Kunder; -- 
>Mobilnr.: 99999999

Dette er PHP-koden i `funksjoner.php` som genererer SQL-spørringen:

``` php
$spørring_legg_til_kunde = "INSERT INTO Kunder(fornavn,etternavn,tlf)
                            VALUES ('{$fornavn}','{$etternavn}','{$tlf}');";
```

Resultatet blir:

``` sql
INSERT INTO Kunder(fornavn,etternavn,tlf) VALUES ('Slem','Hacker',666); DROP TABLE Kunder; -- ','99999999');
```

## Ressurser

* [SQL Injection](http://www.w3schools.com/sql/sql_injection.asp) fra W3Schools


## Vurderingskriterier

* Forklar hvorfor denne tegneseriestripen er morsom:

![xkcd: Exploits of a Mom](http://imgs.xkcd.com/comics/exploits_of_a_mom.png)


## Kompetansemål

* utvikle, presentere og begrunne databaseapplikasjoner
* beskrive og foreslå tiltak mot trusler i den digitale verden

>Denne oppgaven er laget av [bitjungle](https://github.com/bitjungle).  
>Oppgaven er lisensiert under en
>[Creative Commons Navngivelse-DelPåSammeVilkår 4.0 Internasjonal lisens.
](http://creativecommons.org/licenses/by-sa/4.0/)
