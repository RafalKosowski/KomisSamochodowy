<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest strona na której jest wyświetlane aktualne ogłoszenie.
 -->
<?php
    require_once("../private/connect.php");
    require_once("../app/car.php");
    require_once("../app/carsFromDatabase.php");
    require_once("../app/Person.php");
    require_once("../app/peopleFromDatabase.php");
    
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            //wyświetlanie tytułu ogłoszenia
            $a=0;
            foreach ($samochody as $s) {
                if (isset($_GET["id"])&& $s->id==$_GET["id"]) {
                 echo( $s->nazwa);
                  $a=1;
                }
             }
             if ($a==0) echo ("Tego auta już nie ma");

        ?>
     </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- menu -->
    <div id="menu">
        <nav>
            <ul>
                <li> <a href="../index.php">Szukaj auta </a></li>
                <li> <a href="addCarForm.php">Sprzedaj auto </a></li>
                <li> <a href="userCars.php">Moje auta </a></li>
                <li> <a href="kontakt.html">Kontakt </a></li>
            </ul>
       </nav> 
       <div id="osoba">
        <?php
            if (isset( $_SESSION['osoba'])) echo('<a href="../index.php?logout=true">Wyloguj</a>');
                else echo('<a href="loginForm.php">Zaloguj</a>');
        ?>
        </div>
    </div>
    <!-- zawartość ogłoszenia -->
    <div id="auto">
        <?php

        $x=0;
            foreach ($samochody as $s) {
                //wyświetlenie ogłoszenia , które jest zgodne z id uzyskanym za pomocą metody get
                if ($s->id==$_GET["id"]) {
                    $s->wyswietlAuto();
                    foreach ($ludzie as $l) {
                        //wyświetlenie właściciela pojazdu
                        if ($s->osoba==$l->id) $l->wyswietlOsobe();
                    }
                    $x=1;
                }
            }
            if (isset($_GET["id"])) {
                // info o nie istniejącym ogłoszeniu
                if ($x==0) echo ("<h1>Tego auta już nie ma</h1>");
            }else{
                //przekierowanie na stronę główną
                header("Location: ../index.php");
            }
        ?>
        <script>
            // skrypt odpowiadający za zmianę zdjęć przy naciśnięciu przycisku
            var slide = document.getElementsByTagName("img");
            index=0;
            //funkcja czyscząca pole na zdjęcia i ustawiająca odpowiednie wartości indeksów przy granicznych zdjęciach 
            function clear(params) {
                for (var i = 0; i < slide.length; i++) {
                    slide[i].style.display = "none";
                }
                if (index > slide.length-1) {
                    index = 0;
                }
                if (index <0) {
                    index = slide.length-1;
                }
            }

            clear();
            slide[index].style.display = "inline-block";

            // funkcja odpowiadająca wyświetlenie następnego zdjęcia
            function next(){
                clear();
                slide[index].style.display = "inline-block";
                index++;
            }
            // funkcja odpowiadająca wyświetlenie poprzedniego zdjęcia
            function prev(){
                clear();
                slide[index].style.display = "inline-block";
                index--;
            }

        </script>
    </div>
    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>
</body>
</html>
