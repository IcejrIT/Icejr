<?php
session_start();

$conn = mysqli_connect('localhost','root','','sklep');
if (isset($_POST['dodaj']))
    {
        $login = $_POST['login'];
        $uprawnienia = $_POST['Uprawnienia'];
        $haslo1 = $_POST['haslo'];
        $email = $_POST['email'];
        $nr_tel = $_POST['nr_tel'];
        $dzisiaj = $_POST['rejestracja'];
        $accept = $_POST['accept'];
        $plec = $_POST['plec'];
            
        $wynik2 = $conn -> query("SELECT login FROM konta WHERE login = '".$login."';");

        if (mysqli_num_rows($wynik2) == 0)
        {
            mysqli_query($conn,"INSERT INTO `konta` (`login`, `haslo`, `rejestracja`, `Uprawnienia`, `Email`, `nr_tel`, `accept`, `plec`) VALUES ('".$login."', '".$haslo1."', '".$dzisiaj."', '".$uprawnienia."', '".$email."', '".$nr_tel."', '".$accept."', '".$plec."');");
            print ('<script type="text/JavaScript"> location.reload(); </script>');
        }
        }

if (isset($_POST['usun']))
    {
        $login = $_POST['login1'];
                
        mysqli_query($conn,"DELETE FROM `konta` WHERE `login` = '".$login."';");
    }
		    

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/admin.css">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>👨‍💻 Zamówienia 👨‍💻</title>
</head>
<body>
    <div id="header" class="sticky">
        <ul>
            <li> <a href="Koszyk.php"><img src="obrazki/shopping-cart.png" id="cart"> </a></li>
            <li><a href="Logowanie.php"><img src="obrazki/user.png" id="user"> </a></li>
            <li><a href="Sklep.php" id="Sklep">Sklep</a></li>
            <li><a href="index.php">Strona Glowna</a></li>
            <li><a href='admin.php' >Panel Administracyjny</a></li>
        </ul>
    </div>
    <div id="content2">
        <div class="object">
        <table>
                <tr class="main">
                    <td>ID: </td>
                    <td>Uzytkownik:</td>
                    <td>Produkty</td>
                    <td>Cena</td>
                    <td>Ilosc</td>
                    <td>Dostawa</td>
                    <td>Platnosc</td>
                    <td>Ulica</td>
                    <td>Nr_domu</td>
                    <td>Kod_pocztowy</td>
                    <td>Miejscowość</td>
                    <td>Uwagi</td>
                </tr>
        <?php

            $conn = mysqli_connect('localhost','root','','sklep');

            $wynik = $conn -> query("SELECT * FROM zamowienia");

            while ($row = mysqli_fetch_array($wynik))
            {   
                print(
                "<tr class='dane'>
                    <td>".$row['ID']."</td>
                    <td>".$row['uzytkownik']."</td>
                    <td>".$row['nazwa']."</td>
                    <td>".$row['cena']." z�</td>
                    <td>".$row['ilosc']."</td>
                    <td>".$row['dostawa']."</td>
                    <td>".$row['platnosc']."</td>
                    <td>".$row['Ulica']."</td>
                    <td>".$row['nr_domu']."</td>
                    <td>".$row['Kod_pocztowy']."</td>
                    <td>".$row['Miejscowosc']."</td>
                    <td>".$row['uwagi']."</td>
                </tr>");
            }
        ?>
        </table>
        </div>
    </div>
    <br><br>
    <div class="footer">
        <div class="leftOne">
            <a href="Sklep.php">Sklep</a><br>
            <a href="Logowanie.php">Logowanie</a><br>
            <a href="Koszyk.php">Koszyk</a>
        </div>
        <div class="leftTwo">
            <h2>Kontakt</h2>
            <p>Tel. 510 579 491</p>
            <a>kubadan166@gmail.com</a>   
        </div>
        <div class="rightOne">
            <h4>Stronę wykonał:</h4>
            <p>Jakub Daniel</p>
            <p>4TI</p>  
        </div>
    </div>
</body>
</html>
