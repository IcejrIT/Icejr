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
    <title>Logowanie 鈱笍</title>
</head>
<body>
    <?php
    if (isset($_SESSION['zalogowany'])){
        print("<div class='box'><p>".$_SESSION['login']." Jeste艣 ju偶 zalogowany 馃構</p>
        <p>Wr贸膰 na stron臋 g艂贸wn膮</p>
        <center><a href='index.php'><button type='button' class='btn'>Strona g艂贸wna</button></a></center>
        <form action='logout.php' method='post'><br><br>
        <p>Chcesz si臋 wylogowa膰?</p>
        <center><input type='submit' class='btn' value='Wyloguj'><center>
        </form>");
        
    }
    else {
        print("<div class='box'>
        <form action='logon.php' method='post'>
		    <span class='text-center'>Logowanie 馃構</span>
	    <div class='input-container'>
		    <input type='text' required='' name='login'/>
		    <label>Login</label>		
	    </div>
        <div class='input-container'>
		    <input type='text' required='' name='haslo'/>
		    <label>Has艂o</label>		
	    </div>
	    <div class='input-container'>		
		    <input type='mail' required='' name='email'/>
		    <label>Email</label>
	    </div>
		<center><button type='submit' class='btn' name='zaloguj'>Zaloguj</button></center>
        <p>Nie masz konta?<br>
        Zarejestruj si臋</p>
        <center><a href='Rejestracja.php'><button type='button' class='btn'>Zarejestruj</button></a></center>
        <p>Wr贸膰 na stron臋 g艂贸wn膮</p>
        <center><a href='index.php'><button type='button' class='btn'>Strona g艂贸wna</button></a></center>     
        </form>	
        </div>");
    }
    ?>
    
    
</body>
</html>