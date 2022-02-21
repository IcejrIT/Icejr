<?php
session_start();

$conn = mysqli_connect('localhost','root','','sklep');


if(isset($_POST["dodaj"]))
{   
    $item_array = array(
        'item_id' => $_POST['item_id'],
        'item_name' => $_POST['nazwa'],
        'item_price' => $_POST['cena'],
        'item_img' => $_POST['obrazek'],
        'item_quantity' => $_POST['quanity']
        );
        mysqli_query($conn,"INSERT INTO `koszyk` (`ID`, `nazwa`, `cena`, `obrazek`, `ilosc`) VALUES ('".$item_array['item_id']."', '".$item_array['item_name']."', '".$item_array['item_price']."', '".$item_array['item_img']."', '".$item_array['item_quantity']."' )");
        mysqli_query($conn, "UPDATE `koszyk` SET `ilosc` = '" .$item_array['item_quantity']."' WHERE `ID`= '".$item_array['item_id']."';");
}


?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/promocje.css">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>📱 Smartfon SAMSUNG Galaxy S20 FE 📱</title>
</head>
<body>
    <div id="header" class="sticky">
        <ul>
        <?php 
        if (isset($_SESSION['zalogowany']))
        {
            print("<li><a href='../Koszyk.php'><img src='../obrazki/shopping-cart.png' id='cart'> </a></li>");
        }
        else 
        {
            print("<li><a href='../Logowanie.php'><img src='../obrazki/shopping-cart.png' id='cart'> </a></li>");
        }
        ?>
            <li><a href="../Logowanie.php"><img src="../obrazki/user.png" id="user"> </a></li>
            <li><a href="../Sklep.php" id="Sklep">Sklep</a></li>
            <li><a href="../index.php">Strona Glowna</a></li>
        </ul>
    </div>
    <div id="content2">
        <div class="left1">
            <img src='../obrazki/polecane/4.png'>
        </div>
        <div class="right1">
            <form name='action' method='post' action=''>
            <h2>📱 Smartfon SAMSUNG Galaxy S20 FE 📱</h2><br>
            <p>Cena</p><br>
            <p><span>2299,99</span> zł</p> <br>
            <?php
                    if (isset($_SESSION['zalogowany']))
                    {
                    print ("
                    Ilość: <td><input type='number' name='quanity' placeholder='1' minlength='1' required></td><br><br>
                    <input type='hidden' name='item_id' value='9'>
                    <input type='hidden' name='obrazek' value='9'>
                    <input type='hidden' name='nazwa' value='Smartfon SAMSUNG Galaxy S20 FE'>
                    <input type='hidden' name='cena' value='2299.99'>
                    <input type='submit' name='dodaj' class='btn' value='KUP TERAZ'>
                    ");
                    }
                    else
                    {
                    print ("<a href='../Logowanie.php'><input type='button' class='btn' value='KUP TERAZ'></a>");
                    }
                    ?>
            </form> 
        </div>

    </div>

    <br><br>
    <div class="footer">
        <div class="leftOne">
        <a href="../Sklep.php">Sklep</a><br>
            <a href="../Logowanie.php">Logowanie</a><br>
            <a href="../Koszyk.php">Koszyk</a>
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