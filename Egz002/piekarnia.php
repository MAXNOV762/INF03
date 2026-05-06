<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <title>PIEKARNIA</title>
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">

    <nav>
        <a href="kw1.png">KWERENDA1</a>
        <a href="kw2.png">KWERENDA2</a>
        <a href="kw3.png">KWERENDA3</a>
        <a href="kw4.png">KWERENDA4</a>
    </nav>

    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>

    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form action="piekarnia.php" method="POST">
            <select name="rodzaj_list">
                <?php
                // Połączenie z bazą
                $conn = mysqli_connect("localhost", "root", "", "piekarnia");

                // SKRYPT 1: Wypełnianie listy rozwijanej
                $q2 = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                $res1 = mysqli_query($conn, $q2);
                
                // Używamy mysqli_fetch_assoc, aby móc używać nazw kolumn
                while($row = mysqli_fetch_assoc($res1)) {
                    echo "<option value='" . $row['Rodzaj'] . "'>" . $row['Rodzaj'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="submit">Wybierz</button>
        </form>

        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>
            <?php
            // SKRYPT 2: Wyświetlanie danych w tabeli
            if (isset($_POST['submit']) && isset($_POST['rodzaj_list'])) {
                $wybrany = $_POST['rodzaj_list'];
                
                // Zapytanie 1 przefiltrowane przez wybór z listy
                $q1 = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$wybrany';";
                $res2 = mysqli_query($conn, $q1);
                
                while($row = mysqli_fetch_assoc($res2)) {
                    echo "<tr>
                            <td>{$row['Rodzaj']}</td>
                            <td>{$row['Nazwa']}</td>
                            <td>{$row['Gramatura']}</td>
                            <td>{$row['Cena']}</td>
                          </tr>";
                }
            }
            // Zamknięcie połączenia
            mysqli_close($conn);
            ?>
        </table>
    </main>

    <footer>
        <p>AUTOR: TwójNumerPESEL</p> 
        <p>Data: 06.05.2026</p> 
    </footer>
</body>
</html>