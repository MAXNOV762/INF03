<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System zarządzania magazynem komputerowym</title>
    <style>
        table, th, td {
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <form action="" name="MyForm" method="POST">
        <select name="wybor">
            <option value="Wszystkie">Wszystkie</option>
            <?php
            // laczenie z baza danych
             $conn = mysqli_connect("localhost", "root", "", "sklep");

             //zapytanie SQL zeby wyswietlic w liscie rozwijanej kategorie 
            $sql = "SELECT DISTINCT kategoria FROM podzespoly;";

            $result = mysqli_query($conn, $sql);
                  
            // petla dla wyswietlania wyniku zapytania w postaci listy rozwijanej
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value = '". $row['kategoria'] ."'>" . $row['kategoria'] . "</option>";
            }


?>
        </select>
        <button type="submit" name="submit">Wybierz</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena</th>
            </tr>
        </thead>
        <tbody>
            
                <?php 
                //walidacja formularza
                if (isset($_POST['submit'])) {

                    //pobieranie wartosci formularza
                    $wybor = $_POST['wybor'];

                    //warunek jesli wybrane wszystkie kategorie oraz modyfikacja zapytania
                    if($wybor == 'Wszystkie') {
                        $sql1 = "SELECT nazwa, opis, cena FROM podzespoly";

                    } else {
                        $sql1 = "SELECT nazwa, opis, cena FROM podzespoly WHERE kategoria = '$wybor'";
                 }


                $result1 = mysqli_query($conn, $sql1);


                      //wyswietlanie wyniku w postaci zawartosci tabeli 
                    while($row = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        echo "<td>". $row['nazwa']."</td>";
                        echo "<td>". $row['opis']."</td>";
                        echo "<td>". $row['cena']."</td>";
                        echo "</tr>";
                    }
                }
                ?>
            
        </tbody>
    </table>
    <?php 
    
    //zamykanie polaczenia z baza danych
    mysqli_close($conn); 
    ?>
</body>
</html>