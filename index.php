<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/content.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/font/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <script src="js/skrypty.js" type="text/javascript" async></script>
        <?php
            $conn = mysqli_connect('localhost','root','','sklep');

            $promo = $conn -> query("SELECT * FROM promocje");

            $polecane = $conn -> query("SELECT * FROM polecane");

            while ($row = mysqli_fetch_array($promo))
            {
                $new_price[] = $row['nowa_cena'];
                $old_price[] = $row['stara_cena'];
                $img_number_promocja[] = $row['obrazek'];
                $produkt_name_promocja[] = $row['nazwa'];
            }

            while ($row2 = mysqli_fetch_array($polecane))
            {
                $polecane_price[] = $row2['cena'];
                $img_number_polecane[] = $row2['obrazek'];
                $produkt_name_polecane[] = $row2['nazwa'];
            }
        ?>
        <title>Strona Główna 💻</title>
    </head>
    
    <body>
        <div id="header">
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
                <li><a href="Sklep.php" id="Sklep">Sklep</a></li>
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
        <div id="content">
            <div id="info">
                <img src="obrazki/main.png" class="info_img">
            </div>

            <br>

            <div class="carousel">
            <h1>Promocje</h1><br>
            <div class="carousel-container">
                <div class="carousel-slide">
                    <?php
                        print ("<div class='carousel-slide-div'><a href='promocje/sluchawki2.php'><img src='obrazki/promocja/$img_number_promocja[4].png' id='lastClone'><p>$produkt_name_promocja[4]</p><p class='OldPrice'>$old_price[4]</p><p class='NewPrice'>$new_price[4]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/sluchawki.php'><img src='obrazki/promocja/$img_number_promocja[0].png'><p>$produkt_name_promocja[0]</p><p class='OldPrice'>$old_price[0]</p><p class='NewPrice'>$new_price[0]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/mikser.php'><img src='obrazki/promocja/$img_number_promocja[1].png'><p>$produkt_name_promocja[1]</p><p class='OldPrice'>$old_price[1]</p><p class='NewPrice'>$new_price[1]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/powerBank.php'><img src='obrazki/promocja/$img_number_promocja[2].png'><p>$produkt_name_promocja[2]</p><p class='OldPrice'>$old_price[2]</p><p class='NewPrice'>$new_price[2]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/myszka.php'><img src='obrazki/promocja/$img_number_promocja[3].png'><p>$produkt_name_promocja[3]</p><p class='OldPrice'>$old_price[3]</p><p class='NewPrice'>$new_price[3]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/sluchawki2.php'><img src='obrazki/promocja/$img_number_promocja[4].png'><p>$produkt_name_promocja[4]</p><p class='OldPrice'>$old_price[4]</p><p class='NewPrice'>$new_price[4]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/sluchawki.php'><img src='obrazki/promocja/$img_number_promocja[0].png' id='firstClone'><p>$produkt_name_promocja[0]</p><p class='OldPrice'>$old_price[0]</p><p class='NewPrice'>$new_price[0]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/mikser.php'><img src='obrazki/promocja/$img_number_promocja[1].png'><p>$produkt_name_promocja[1]</p><p class='OldPrice'>$old_price[1]</p><p class='NewPrice'>$new_price[1]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/powerBank.php'><img src='obrazki/promocja/$img_number_promocja[2].png'><p>$produkt_name_promocja[2]</p><p class='OldPrice'>$old_price[2]</p><p class='NewPrice'>$new_price[2]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/myszka.php'><img src='obrazki/promocja/$img_number_promocja[3].png'><p>$produkt_name_promocja[3]</p><p class='OldPrice'>$old_price[3]</p><p class='NewPrice'>$new_price[3]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='promocje/sluchawki2.php'><img src='obrazki/promocja/$img_number_promocja[4].png'><p>$produkt_name_promocja[4]</p><p class='OldPrice'>$old_price[4]</p><p class='NewPrice'>$new_price[4]<span> zł</span></p></a></div>");
                        ?>
                    </div>
            </div>
            </div>

            <br><br>

            <div class="carousel-sec">
                <h1>Polecane</h1><br>
                
                <div class="carousel-container">
                <i class="fas fa-arrow-left" id="prev"></i>
                    <div class="carousel-slide-sec">
                    <?php
                        print ("<div class='carousel-slide-div'><a href='polecane/telewizor.php'><img src='obrazki/polecane/$img_number_polecane[4].png' id='secLastClone'><p>$produkt_name_polecane[4]</p><p class='NewPrice'>$polecane_price[4]<span> zł</span></p></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/sluchawki.php'><img src='obrazki/polecane/$img_number_polecane[0].png'><p>$produkt_name_polecane[0]</p><p class='NewPrice'>$polecane_price[0]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/klawiatura.php'><img src='obrazki/polecane/$img_number_polecane[1].png'><p>$produkt_name_polecane[1]</p><p class='NewPrice'>$polecane_price[1]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/pralka.php'><img src='obrazki/polecane/$img_number_polecane[2].png'><p>$produkt_name_polecane[2]</p><p class='NewPrice'>$polecane_price[2]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/telefon.php'><img src='obrazki/polecane/$img_number_polecane[3].png'><p>$produkt_name_polecane[3]</p><p class='NewPrice'>$polecane_price[3]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/telewizor.php'><img src='obrazki/polecane/$img_number_polecane[4].png'><p>$produkt_name_polecane[4]</p><p class='NewPrice'>$polecane_price[4]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/sluchawki.php'><img src='obrazki/polecane/$img_number_polecane[0].png' id='secfirstClone'><p>$produkt_name_polecane[0]</p><p class='NewPrice'>$polecane_price[0]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/klawiatura.php'><img src='obrazki/polecane/$img_number_polecane[1].png'><p>$produkt_name_polecane[1]</p><p class='NewPrice'>$polecane_price[1]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/pralka.php'><img src='obrazki/polecane/$img_number_polecane[2].png'><p>$produkt_name_polecane[2]</p><p class='NewPrice'>$polecane_price[2]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/telefon.php'><img src='obrazki/polecane/$img_number_polecane[3].png'><p>$produkt_name_polecane[3]</p><p class='NewPrice'>$polecane_price[3]<span> zł</span></p></a></div>");
                        print ("<div class='carousel-slide-div'><a href='polecane/telewizor.php'><img src='obrazki/polecane/$img_number_polecane[4].png'><p>$produkt_name_polecane[4]</p><p class='NewPrice'>$polecane_price[4]<span> zł</span></p></a></div>");
                        ?>
                    </div>
                    <i class="fas fa-arrow-right" id="next"></i>
                </div>
                
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