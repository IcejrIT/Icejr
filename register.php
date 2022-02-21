<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/logowanie.css">
</head>
<body>
<div class="box">
<?php
		$conn = mysqli_connect('localhost','root','','sklep');
        if (isset($_POST['rejestruj']))
    	{
        $login = $_POST['login'];
        $haslo1 = $_POST['haslo'];
        $haslo2 = $_POST['pow_haslo'];
        $email = $_POST['email'];
        $nr_tel = $_POST['nr_tel'];
        $plec = $_POST['plec'];
        }

        if (isset($_POST['accept']))
        {
            $accept = "true";
        }
        else
        {
            $accept = "false";
        }


        $dzisiaj = date("Y-m-d H:i:s");

        $wynik = $conn -> query("SELECT login FROM konta WHERE login = '".$login."';");
        $uprawnienia = "klient";
		
        if (mysqli_num_rows($wynik) == 0)
        {
            if ($haslo1 == $haslo2)
            {
                mysqli_query($conn,"INSERT INTO `konta` (`login`, `haslo`, `rejestracja`, `logowanie`, `Uprawnienia`, `Email`, `nr_tel`, `accept`, `plec`) VALUES ('".$login."', '".$haslo1."', '".$dzisiaj."', '".$dzisiaj."', '".$uprawnienia."', '".$email."', '".$nr_tel."', '".$accept."', '".$plec."');");
                
                echo "<p>❤️ Konto zostało utworzone! ❤️</p>
                <p>Masz już konto<br>
                Zaloguj się</p>
                <center><a href='Logowanie.php'><button type='button' class='btn'>Zaloguj</button></a></center><br><br>";
            }
            else echo "<p>⚠️ Hasła nie są takie same ⚠️</p>
            <p>Spróbuj jeszcze raz</p>
            <center><a href='Rejestracja.php'><button type='button' class='btn'>Zarejestruj</button></a></center>
            <br><br>";
        }
        else 
        {
        echo "<p> ⚠️ Podany login jest już zajęty. ⚠️ </p>
            <p>Spróbuj jeszcze raz</p>
            <center><a href='Rejestracja.php'><button type='button' class='btn'>Zarejestruj</button></a></center>
            <br><br>";
    	}
		mysqli_close($conn);
?>
        
		<p>Wróć na stronę główną</p>
        <center><a href="index.php"><button type="button" class="btn">Strona główna</button></a></center>
        </form>
</body>

</html>