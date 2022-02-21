<?php
session_start();

$conn = mysqli_connect('localhost','root','','sklep');
mysqli_query($conn,"DELETE FROM `koszyk` WHERE `koszyk`.`ID` >0;");

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
print("<div class='box'><p>".$_SESSION['login']." Dziękujemy że wybrałeś nasz sklep ❤️</p>
<p>Twoja paczka jest już przygotowywana 📦</p>
<p>✈️ Zapraszamy ponownie ✈️</p>
<p>Wróć na stronę główną</p>
<center><a href='index.php'><button type='button' class='btn'>Strona główna</button></a></center>
");

?>

</body>

</html>