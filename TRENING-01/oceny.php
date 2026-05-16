<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Katalog Filmów</title>
</head>
<body>
    <header>
        <h1>Moje Filmy</h1>
    </header>

    <nav>
        <a href="index.html">Strona główna</a>
        <a href="oceny.php">Oceny filmów</a>
    </nav>

      <main>
           <h2>Przeglądaj filmy według gatunku</h2>
           <form action="oceny.php" method="POST">
            <label for="wybor">Gatunek: </label>
            <select name="gatunek">
                <option value="Sci-Fi">Sci-Fi</option>
                <option value="Historyczny">Historyczny</option>
                <option value="Dramat">Dramat</option>
            </select>
        <button type="submit" name="submit">Pokaż</button>
           </form>
           <ul>
          <?php  

          // tabela asocjacyjna
          $filmy =[ 
            [
            "tytul" => "Incepcja",
            "gatunek" => "Sci-Fi",
            "rok" => 2010,
            "ocena" => 9
                     
          ], 
          [
            "tytul" => "Gladiator",
            "gatunek" => "Historyczny",
            "rok" => 2000,
            "ocena" => 8
          ],
          [
            "tytul" => "Interstellar",
            "gatunek" => "Sci-Fi",
            "rok" => 2014,
            "ocena" => 10
          ],
          [
            "tytul" => "Pianista",
            "gatunek" => "Dramat",
            "rok" => 2002,
            "ocena" => 9
          ],
          [
            "tytul" => "Zielona Mila",
            "gatunek" => "Dramat",
            "rok" => 1999,
            "ocena" => 9
          ]
          
          
          ];

          //walidacja formularza
          if(isset($_POST['submit'])) {
            //zmienne które potrzebne dla zadania
            $gatunek = $_POST['gatunek'];
            $liczba = 0;
            $suma = 0;
            
            //przeszukujemy tabele zgodnie z wybarnym gatunkiem i wypisujemy
          foreach( $filmy as $indeks => $film) {

           //sprawdza czy gatunek z tabeli taki sam jak z pola wyboru i go wypisuje
           if ($film['gatunek'] == $gatunek) {

           // dodajemy ocene do sumy ocen oraz zwiekszamy ilosc z kazdym znalezionym filmem i wypisujemy wszystkie znalezione filmy
            $suma += $film['ocena'];
            $liczba++;
            echo "<li>". $film['tytul'] ." - Rok: ". $film['rok'] .", Ocena: ". $film['ocena'] ."/10</li>";
            
           
           };
          }
           //sprawdza czy zostały znalezione filmy
          if ($liczba > 0) {

          // obliczamy średnią
            $srednia = round($suma / $liczba, 2);

            echo "<p class = 'podsumowanie'>";
            echo "Liczba filmów w kategorii: $liczba <br>";
            //number_format() zeby wypisac 2 miejsca po przecinku
            echo "Średnia ocena:". number_format($srednia, 2, ',', '');
            echo "</p>";
          }
          
          
          };
          ?>
          </ul>

           
      </main>

    <footer>
        <p>Projekt: 0000</p>
    </footer>
</body>
</html>