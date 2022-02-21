<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/logowanie.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Logowanie ⌨️</title>
</head>
<body>
<div class="box">
<?php
$conn = mysqli_connect('localhost','root','','sklep');

if (isset($_POST['zaloguj']))
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $email = $_POST['email'];
}

$dzisiaj = date("Y-m-d H:i:s");

$logon = $conn -> query("SELECT login FROM konta WHERE login = '".$login."' AND haslo ='".$haslo."' AND email='".$email."';");

$uprawnienia = $conn -> query("SELECT Uprawnienia From konta WHERE login='".$login."';");

if (mysqli_num_rows($logon) >0)
    {
        mysqli_query($conn,"UPDATE `konta` SET (`logowanie` = '".$dzisiaj."') WHERE login = '".$login."';");

            while ($row = mysqli_fetch_array($uprawnienia))
            {
                $ranga = $row['Uprawnienia'];
            }

            $_SESSION['zalogowany'] = true;
            $_SESSION['login'] = $login;
            $_SESSION['myrank'] = $ranga;

            header('location: index.php');
        
    }
else
{
    print("<p>⚠️ Wpisano złe dane ⚠️</p>
            <p>Spróbuj jeszcze raz</p>
            <center><a href='Logowanie.php'><button type='button' class='btn'>Zaloguj Się</button></a></center>
            <br><br>");
}

?>
</div>
</body>
</html>