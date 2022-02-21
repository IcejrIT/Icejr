<?php
session_start();

if (isset($_SESSION['myrank'])=='admin')
{
    echo('

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
        </ul>
    </div>
    <div id="content2">
        <div class="objectADM">
        <a href="uzytkownicy.php"><button class="btn_adm">Użytkownicy</button></a>
        <a href="zamowienia.php"><button class="btn_adm">Zamówienia</button></a>
        <a href="asortyment.php"><button class="btn_adm">Asortyment</button></a>
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
<?php
    ');
}
else {
    header('location: index.php');
}
?>