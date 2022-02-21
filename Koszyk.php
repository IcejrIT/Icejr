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
if (isset($_POST["usun"]))
{
    $item_array = array(
        'item_id' => $_POST['item_id'],
        'item_name' => $_POST['nazwa'],
        'item_price' => $_POST['cena'],
        'item_img' => $_POST['obrazek'],
        'item_quantity' => $_POST['quanity']
        );
        
        mysqli_query($conn, "DELETE FROM `koszyk` WHERE `koszyk`.`ID` = '".$item_array['item_id']."';");
}


?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/koszyk.css">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>🛒 Koszyk 🛒</title>
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
        <div class="object">
        <table>
                <tr class="main">
                    <td>Obrazek</td>
                    <td>Nazwa Produktu</td>
                    <td>Cena</td>
                    <td>Ilość</td>
                </tr>
        <?php

            $wynik = $conn -> query("SELECT * FROM koszyk");
            $sum=0;
            while ($row = mysqli_fetch_array($wynik))
            {   
                $sum+=$row['cena']*$row['ilosc'];
                print(
                "<tr class='dane'>
                    <form name='action' action='' method='post'>
                    <td><img src='obrazki/all/".$row['obrazek'].".png'></td>
                    <td>".$row['nazwa']."</td>
                    <td>".$row['cena']."</td>
                    <td><input type='number' name='quanity' placeholder='".$row['ilosc']."' minlength='1' required></td>
                    <input type='hidden' name='item_id' value='".$row['ID']."'>
                    <input type='hidden' name='obrazek' value='".$row['obrazek']."'>
                    <input type='hidden' name='nazwa' value='".$row['nazwa']."'>
                    <input type='hidden' name='cena' value='".$row['cena']."'>
                    <td><input type='submit' name='usun' value='Usuń' class='btn'></td>
                    <td><input type='submit' name='dodaj' value='Aktualizuj' class='btn'></td>
                    </form>
                    </tr>");
                }
            echo (
            "<tr class='dane'>
            <td>Łączny koszt wynosi: </td>
            <td>".$sum." zł</td>
            </tr>");
        ?>
        
        </table>
        </div>
        <center><a href="zamow.php"><button class="btn">Zamów Teraz</button></a></center>
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