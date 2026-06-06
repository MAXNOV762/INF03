<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="styl.css">
    <title>Konfigurator samochodów</title>
</head>
<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>

    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>

    <main>
        <section class="lewy">
            <table>
                <?php  
                $conn = mysqli_connect("localhost", "root", "", "samochody1");

                $sql = "SELECT pojazdy.marka, pojazdy.model, kolory.nazwa, (pojazdy.cena + kolory.doplata) AS 'suma' FROM pojazdy JOIN kolory ON pojazdy.kolor = kolory.id WHERE model = 'alfa'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>". $row['marka'] ."</td>
                    <td>". $row['model'] ."</td>
                    <td>". $row['nazwa'] ."</td>
                    <td>". $row['suma'] ."</td>
                    </tr>";
                }
                
                ?>
            </table>
        </section>
        <section class="srodkowy">
            <table>
                <thead>
                    <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th>Cena</th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <td colspan="3"><img src="a1.jpg" alt="Konfiguracja 1"></td>
                     </tr>
                     <?php 
                     
                       $sql1 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 1;";
                       $result1 = mysqli_query($conn, $sql1);
                       

                        while($row = mysqli_fetch_assoc($result1)) {
                            
                            echo " 
                            <tr>
                            <td>Marka</td>
                            <td>". $row['marka'] ."</td>
                            <td rowspan='2'>". $row['cena'] ."</td>
                            </tr>
                            <tr>
                            <td>Model</td>
                            <td>". $row['model'] ."</td>
                            </tr>";
                             
                        }

                       
                     
                     ?>
                     <tr>
                        <td colspan="3"><img src="a2.jpg" alt="Konfiguracja 2"></td>
                     </tr>
                     <?php 
                     $sql2 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 1;";
                     $result2 = mysqli_query($conn, $sql2);
                     
                      while($row = mysqli_fetch_assoc($result2)) {
                            
                            echo " 
                            <tr>
                            <td>Marka</td>
                            <td>". $row['marka'] ."</td>
                            <td rowspan='2'>". $row['cena'] ."</td>
                            </tr>
                            <tr>
                            <td>Model</td>
                            <td>". $row['model'] ."</td>
                            </tr>";
                             
                        }

                        mysqli_close($conn);
                     ?>
                     
                </tbody>
            </table>
        </section>
        <section class="prawy">
            <h3>111 222 444</h3>
            <img src="a3.png" alt="Samochód">
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: 0000</p>
    </footer>

    
</body>
</html>