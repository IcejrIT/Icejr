<?php
session_start();

$conn = mysqli_connect('localhost','root','','sklep');
$wynik = $conn -> query("SELECT * FROM koszyk");

if(isset($_POST["zakup"]))
{   
    $item_array = array(
        'dostawy' => $_POST['dostawy'],
        'platnosci' => $_POST['platnosci'],
        'Ulica' => $_POST['Ulica'],
        'nr_domu' => $_POST['nr_domu'],
        'Kod_pocztowy' => $_POST['Kod_pocztowy'],
        'Miejscowosc' => $_POST['Miejscowosc'],
        'uwagi' => $_POST['uwagi']
        );
        $cena = 0;
        while ($row = mysqli_fetch_array($wynik))
        {   
            $nazwy[]= $row['nazwa'];
            $cena += $row['cena']*$row['ilosc'];
            $ilosci[] = $row['ilosc']; 
        }

        $uzytkownik = $_SESSION['login'];
        $nazwa = implode(", ", $nazwy);
        $ilosc = implode(", ", $ilosci);

        mysqli_query($conn,"INSERT INTO `zamowienia` (`uzytkownik` , `nazwa` , `cena`, `ilosc`,`dostawa`, `platnosc`, `Ulica`, `nr_domu`, 
        `Kod_pocztowy`, `Miejscowosc`,`uwagi`) 
        VALUES ('".$uzytkownik."', '".$nazwa."', '".$cena."', '".$ilosc.
        "', '".$item_array['dostawy']."', '".$item_array['platnosci']."', '".$item_array['Ulica'].
        "', '".$item_array['nr_domu']."', '".$item_array['Kod_pocztowy']."', '".$item_array['Miejscowosc']."', '".$item_array['uwagi']."');");

        header('location: dziekujemy.php');
}

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/zamowienia.css">
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
        <div class="box_reg">
        <form action="" method="post" name="action">
		    <span class="text-center">📦 Zamów 📦</span>
            <p>Wybierz rodzaj dostawy: </p>
            <center><input list="dostawa" name="dostawy"></center>
            <datalist id="dostawa">
            <option value="Paczkomat Inpost">
            <option value="Kurier Inpost">
            <option value="Poszta Polska">
            <option value="Kurier DPD">
            <option value="Kurier DHL">
            </datalist>
            <p>Wybierz rodzaj Platności: </p>
            <center><input list="platnosc" name="platnosci"></center>
            <datalist id="platnosc">
            <option value="BLIK">
            <option value="Przelew">
            <option value="Paypal">
            <option value="Paysafecard">
            </datalist><br><br>
	    <div class="input-container">
		    <input type="text" required="" minlength="3" name="Ulica">
		    <label>Ulica</label>		
	    </div>
        <div class="input-container">
		    <input type="text" required="password" minlength="" name="nr_domu">
		    <label>Nr. domu</label>		
	    </div>
		<div class="input-container">
		    <input type="nr" required="password" minlength="3" name="Kod_pocztowy">
		    <label>Kod pocztowy</label>		
	    </div>
	    <div class="input-container">		
		    <input type="text" required="email" minlength="3" name="Miejscowosc">
		    <label>Miejscowosc</label>
	    </div>
        <div class="input-container">
        <p><span>Uwagi</span></p><br>
        <center><textarea name="uwagi" cols="30" rows="10"></textarea></center>
	    </div>
        <center><input type="submit" name="zakup" value="Zakup" class="btn"></center>
        </form>
    </div>
    </div>
    </div>
        
</body>
</html>