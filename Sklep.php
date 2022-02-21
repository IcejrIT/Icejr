<?php
session_start();

$conn = mysqli_connect('localhost','root','','sklep');
$wynik = $conn -> query("SELECT * FROM przedmioty");

if(isset($_POST["dodaj"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_POST["item_id"], $item_array_id))
    {
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array(
            'item_id' => $_POST['item_id'],
            'item_name' => $_POST['nazwa'],
            'item_price' => $_POST['cena'],
            'item_img' => $_POST['obrazek'],
            'item_quantity' => $_POST['quanity']
        );
        $count = count($_SESSION["shopping_cart"]);
        $product_array = $conn -> query("SELECT ID FROM koszyk WHERE '".$item_array['item_id']."';");
        mysqli_query($conn,"INSERT INTO `koszyk` (`ID`, `nazwa`, `cena`, `obrazek`, `ilosc`) VALUES ('".$item_array['item_id']."', '".$item_array['item_name']."', '".$item_array['item_price']."', '".$item_array['item_img']."', '".$item_array['item_quantity']."' )");
        mysqli_query($conn, "UPDATE `koszyk` SET `ilosc` = '" .$item_array['item_quantity']."' WHERE `ID`= '".$item_array['item_id']."';");
    }
    else 
    {
        $item_array = array(
            'item_id' => $_POST['item_id'],
            'item_name' => $_POST['nazwa'],
            'item_price' => $_POST['cena'],
            'item_img' => $_POST['obrazek'],
            'item_quantity' => $_POST['quanity']
        );
        $product_array = $conn -> query("SELECT ID FROM koszyk WHERE '".$item_array['item_id']."';");
        mysqli_query($conn,"INSERT INTO `koszyk` (`ID`, `nazwa`, `cena`, `obrazek`, `ilosc`) VALUES ('".$item_array['item_id']."', '".$item_array['item_name']."', '".$item_array['item_price']."', '".$item_array['item_img']."', '".$item_array['item_quantity']."' )");
        mysqli_query($conn, "UPDATE `koszyk` SET `ilosc` = '" .$item_array['item_quantity']."' WHERE `ID`= '".$item_array['item_id']."';");
    }
    }
    else
    {
    $item_array = array(
        'item_id' => $_POST['item_id'],
        'item_name' => $_POST['nazwa'],
        'item_price' => $_POST['cena'],
        'item_img' => $_POST['obrazek'],
        'item_quantity' => $_POST['quanity']
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        $product_array = $conn -> query("SELECT ID FROM koszyk WHERE '".$item_array['item_id']."';");
        mysqli_query($conn,"INSERT INTO `koszyk` (`ID`, `nazwa`, `cena`, `obrazek`, `ilosc`) VALUES ('".$item_array['item_id']."', '".$item_array['item_name']."', '".$item_array['item_price']."', '".$item_array['item_img']."', '".$item_array['item_quantity']."' )");
        mysqli_query($conn, "UPDATE `koszyk` SET `ilosc` = '" .$item_array['item_quantity']."' WHERE `ID`= '".$item_array['item_id']."';");

    }
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sklep.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <script src="js/menu-sklep.js"></script>
    <title>Sklep 📱</title>
</head>
<body>
    <div id="header" class="sticky">
        <ul>
        <?php 
        if (isset($_SESSION['zalogowany']))
        {
            print("<li><a href='Koszyk.php'><img src='obrazki/shopping-cart.png' id='cart'> </a></li>");
        }
        else 
        {
            print("<li><a href='Logowanie.php'><img src='obrazki/shopping-cart.png' id='cart'> </a></li>");
        }
        ?>
            <li><a href="Logowanie.php"><img src="obrazki/user.png" id="user"> </a></li>
            <li><a href="index.php" id="Sklep">Strona Glowna</a></li>
            <?php
                    if (isset($_SESSION['myrank']))
                    {
                        if ($_SESSION['myrank']=='admin')
                        {
                            print("<li><a href='admin.php' >Panel Administracyjny</a></li>");
                        }
                    }
            ?>
        </ul>
     </div>
    <div class="menu-left">
        <ul>
            <li><p id="Telefony">Telefony</p></a></li>
            <li><p id="Sluchawki">Słuchawki</p></a></li>
            <li><p id="Myszki">Myszki</p></a></li>
            <li><p id="Klawiatury">Klawiatury</p></a></li> 
            <li><p id="Pralki">Pralki</p></a></li>
            <li><p id="Miksery">Miksery</p></a></li> 
            <li><p id="Telewizory">Telewizory</p></a></li>
            <li><p id="Monitory">Monitory</p></a></li>
            <li><p id="Wszystkie">Wszystkie</p></a></li>
        </ul>
    </div>

    <div class="content2">
        <?php
        if (isset($_SESSION['zalogowany']))
        {
        while ($row = mysqli_fetch_array($wynik))
        {
            print("<form name='action' method='post' action='' >
            <div id='przedmiot' class='".$row['klasa']."'>
            <img src='obrazki/all/".$row['obrazek'].".png'>
            <p>".$row['nazwa']."</p>
            <p> <span class='cena'>".$row['cena']."</span> zł</p>
            Ilość: <input type='number' name='quanity'>
            <input type='hidden' name='item_id' value='".$row['ID']."'>
            <input type='hidden' name='obrazek' value='".$row['obrazek']."'>
            <input type='hidden' name='nazwa' value='".$row['nazwa']."'>
            <input type='hidden' name='cena' value='".$row['cena']."'><br>
            <input type='submit' name='dodaj' class='btn' value='KUP TERAZ'></div> </form>");
        }
        }
        else {
            while ($row = mysqli_fetch_array($wynik))
        {
            print("<div id='przedmiot' class='".$row['klasa']."'><img src='obrazki/all/".$row['obrazek'].".png'><p>".$row['nazwa']."</p><p> <span class='cena'>".$row['cena']."</span> zł</p> <a href='Logowanie.php'><button class='btn'>KUP TERAZ</button></a></div>");
        }
        }
        ?>
        </div>
</body>
</html>