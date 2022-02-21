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
    <title>👨‍💻 Panel Administracyjny 👨‍💻</title>
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
                    <td>Login</td>
                    <td>Haslo</td>
                    <td>Uprawnienia</td>
                    <td>Email</td>
                    <td>Nr. Tel</td>
                    <td>Data rejestracji</td>
                    <td>Akceptacja polityki prywatnośći</td>
                    <td>Płeć</td>
                </tr>
        <?php

            $conn = mysqli_connect('localhost','root','','sklep');

            $wynik = $conn -> query("SELECT * FROM konta");

            while ($row = mysqli_fetch_array($wynik))
            {   
                print(
                "<tr class='dane'><form action='' method='post'>
                    <td>".$row['login']."</td>
                    <td>".$row['haslo']."</td>
                    <td>".$row['Uprawnienia']."</td>
                    <td>".$row['Email']."</td>
                    <td>".$row['nr_tel']."</td>
                    <td>".$row['rejestracja']."</td>
                    <td>".$row['accept']."</td>
                    <td>".$row['plec']."</td>
                    <td>
                    <input type='hidden' name='login1' value='".$row['login']."'></input>
                    <input type='submit' name='usun' value='Usuń' class='btn'></form>
                    </td>
                </tr>");
            }
        ?>
            <tr class="dodaj">
                <form action="" method="post">
                    <td><input type='text' name="login" required></td>
                    <td><input type='text' name="haslo" required></td>
                    <td><input type='text' name="Uprawnienia" required></td>
                    <td><input type='text' name="email" required></td>
                    <td><input type='number' name="nr_tel" required></td>
                    <td><input type='date' name="rejestracja" required></td>
                    <td><input type='text' name="accept" required></td>
                    <td><input type='text' name="plec" required></td>
                    <td><input type='submit' value="dodaj" name="dodaj" class="btn_dodaj"></td>
                </form>
            </tr>
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
