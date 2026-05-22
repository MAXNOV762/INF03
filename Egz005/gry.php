<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="styl.css">
    <title>Gry komputerowe</title>
</head>
<body>
    <header>
          <h1>Ranking gier komputerowych</h1>
    </header>

    <main>
        <section class = "lewy">
            <h3>Top 5 gier w tym miesiącu</h3>

            <?php 
            $conn = mysqli_connect("localhost", "root", "", "gry");

            $sql = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
            $result = mysqli_query($conn, $sql);
             echo "<ul>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>". $row['nazwa'] ." <div class = 'punkty'>". $row['punkty'] ."</div></li>";
            }
            echo "</ul>";
            
            ?>

            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>0000</p>
        </section>
        <section class = "srodkowy">
            <?php 
            $sql1 = "SELECT id, nazwa, zdjecie FROM gry";
            $result1 = mysqli_query($conn, $sql1);

           while($row = mysqli_fetch_assoc($result1)) {
                
                echo "<div class='gra'>";
                echo "<img src='". $row['zdjecie'] ."' alt='". $row['nazwa'] ."' title='". $row['nazwa'] ."'>";
                echo "<p>". $row['nazwa'] ."</p>";
                echo "</div>";
            }
            
            ?>
        </section>
        <section class = "prawy">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="POST">
                <label for="nazwa">nazwa</label><br>
                <input type="text" name="nazwa"><br>
                <label for="opis">opis</label><br>
                <input type="text" name="opis"><br>
                <label for="cena">cena</label><br>
                <input type="number" name="cena"><br>
                <label for="zdjecie">zdjecie</label><br>
                <input type="text" name="zdjecie"><br>
                <button type="submit" name="submit">DODAJ</button>
            </form>
            <?php 
            if(isset($_POST['submit']) && !empty($_POST['nazwa'])){
            $nazwa = $_POST['nazwa'];
            $opis = $_POST['opis'];
            $cena = $_POST['cena'];
            $zdjecie = $_POST['zdjecie'];

            $sql4 = "INSERT INTO `gry` (`id`, `nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES (NULL, '$nazwa', '$opis', '0', '$cena', '$zdjecie');";
            $result4 = mysqli_query($conn, $sql4);
            }
            ?>
        </section>
    </main>
    <footer>
         <form action="gry.php" method="POST">
            <input type="number" name="informacja">
            <button type="submit" name="submit1">Pokaż opis</button>
         </form>
         <?php 
         if(isset($_POST['submit1']) && !empty($_POST['informacja'])) {
         $informacja = $_POST['informacja'];
         $sql2 = "SELECT nazwa, LEFT(opis, 100), punkty, cena FROM gry WHERE id = $informacja;";
         $sql3 = "SELECT opis FROM gry WHERE id = $informacja;";
         $result3 = mysqli_query($conn, $sql3);
         $result2 = mysqli_query($conn, $sql2);

         while($row = mysqli_fetch_assoc($result2)) {
            echo "<h2>". $row['nazwa'] ." ". $row['punkty'] ." punktów ". $row['cena'] ." zł</h2>";
            
         }
         
         while($row = mysqli_fetch_assoc($result3)) {
            echo "<p>". $row['opis'] ."</p>";
         }
         }

         mysqli_close($conn);
         ?>
    </footer>
</body>
</html>