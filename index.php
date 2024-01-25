<!-- 
Oggi pomeriggio ripassate i primi concetti di classe, variabili e metodi d'istanza che abbiamo visto stamattina e create un file index.php in cui:
è definita una classe ‘Movie’ :
=> all'interno della classe sono dichiarate delle variabili d'istanza
=> all'interno della classe è definito un costruttore
=> all'interno della classe è definito almeno un metodo
vengono istanziati almeno due oggetti ‘Movie’ e stampati a schermo i valori delle relative proprietà (vietato usare var_dump)
Bonus 1:
Modificare la classe Movie in modo che accetti piú di un genere.
Bonus 2:
Creare un layout completo per stampare a schermo una lista di movies. Facciamo attenzione all’organizzazione del codice, suddividendolo in appositi file e cartelle. Possiamo ad esempio organizzare il codice
creando un file dedicato ai dati (tipo le array di oggetti) che potremmo chiamare db.php
mettendo ciascuna classe nel proprio file e magari raggruppare tutte le classi in una cartella dedicata che possiamo chiamare Models/
organizzando il layout dividendo la struttura ed i contenuti in file e parziali dedicati.
 -->

<?php

class Movie
{
    public $copertina;
    public $nome;
    public $durata;
    public $regista;
    public $annoPubblicazione;

    public function mostraInizialiRegista()
    {
        $parole = explode(" ", $this->nome);
        $primeLettere = "";

        foreach ($parole as $parola) {
            $primeLettere .= substr($parola, 0, 1) . '. ';
        }

        return strtoupper($primeLettere);
    }

    /**
     * Nuovo film
     *
     * @param [type] $_copertina /ULR copertina film
     * @param [type] $_nome /Nome film
     * @param [type] $_durata /Durata film
     * @param [type] $_regista /Regista film
     * @param [type] $_annoPubblicazione /Anno di pubblicazione del film
     */
    function __construct($_copertina, $_nome, $_durata, $_regista, $_annoPubblicazione)
    {
        $this->copertina = $_copertina;
        $this->nome = $_nome;
        $this->durata = $_durata;
        $this->regista = $_regista;
        $this->annoPubblicazione = $_annoPubblicazione;
    }
}


$ilPadrino = new Movie('./img/ilPadrino.jpeg', 'Il Padrino', 175, 'Francis Ford Coppola', 1972);
$titanic = new Movie('./img/titanic.jpeg', 'Titaic', 195, 'James Cameron', 1997);
$matrix = new Movie('./img/matrix.jpeg', 'Matrix', 136, 'The Wachowskis', 1999);
$laLaLand = new Movie('./img/laLaLand.jpeg', 'La La Land', 128, 'Damien Chazelle', 2016);

$movies = [$ilPadrino, $titanic, $matrix, $laLaLand];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-oop-1</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div id="app">
        <main class="container">
            <div class="row">
                <?php foreach ($movies as $movie) { ?>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $movie->copertina ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $movie->nome ?></h5>
                                <p class="card-text">Durata: <?php echo $movie->durata ?> minuti</p>
                                <p class="card-text">Autore: <?php echo $movie->regista ?></p>
                                <p class="card-text">Anno: <?php echo $movie->annoPubblicazione ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>


</body>

</html>