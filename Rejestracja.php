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
    <title>Rejestracja ⌨️</title>
</head>
<body>
    <div class="box_reg">
        <form action="Register.php" method="post">
		    <span class="text-center">Rejestracja 😋</span>
	    <div class="input-container">
		    <input type="text" required="" minlength="3" name="login">
		    <label>Login</label>		
	    </div>
        <div class="input-container">
		    <input type="text" required="password" minlength="3" name="haslo">
		    <label>Hasło</label>		
	    </div>
		<div class="input-container">
		    <input type="text" required="password" minlength="3" name="pow_haslo">
		    <label>Powtórz Hasło</label>		
	    </div>
	    <div class="input-container">		
		    <input type="email" required="email" minlength="3" name="email">
		    <label>Email</label>
	    </div>
    
        <div class="input-container">
		    <input type="text" pattern="\d*" required="tel" minlength="9" name="nr_tel">
		    <label>nr Telefonu</label>		
	    </div>
		<p>Wybierz swoją płeć: </p>
		<p>Mężczyzna: <input type="radio" name="plec" requied="radio" value="Male"></p> <p>Kobieta: <input type="radio" name="plec" requied="radio" value="Female"></p>
		<p>Akceptuję politykę prywatności: <input type="checkbox" name="accept" requied="checkbox"></p>
		<center><button type="submit" class="btn" name="rejestruj">Zarejestruj</button></center>
        <p>Masz już konto<br>
        Zaloguj się</p>
        <center><a href="Logowanie.php"><button type="button" class="btn">Zaloguj</button></a></center>
		<p>Wróć na stronę główną</p>
        <center><a href="index.php"><button type="button" class="btn">Strona główna</button></a></center>
        </form>
			
    </div>
    
</body>
</html>