<?php
session_start();
session_unset();

$conn = mysqli_connect('localhost','root','','sklep');
mysqli_query($conn,"DELETE FROM `koszyk` WHERE `koszyk`.`ID` >0;");
header('location: index.php');
?>