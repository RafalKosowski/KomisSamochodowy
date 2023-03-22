<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        Tutaj wyświetlają się wszystkie ogłoszenia dodane przez aktualnie zalogowaną osobę. 
 -->
<?php
    //dołącznaie plików 
    require_once("./../private/connect.php");
    require_once("./../app/car.php");
    require_once("./../app/carsFromDatabase.php");
    require_once("./../app/Person.php");

    session_start(); //start sesji

    //informacja pojawiająca się, gdy zostanie dodane nowe auto
    if (isset($_GET['dodane'])&&$_GET['dodane']=='true') {
        echo '<script>  alert("Auto zostało dodane") </script>'; 
    }
    if (isset($_GET['delete'])&&$_GET['delete']=='tak') {
        echo '<script>  alert("Auto zostało skasowane") </script>'; 
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje auta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <!-- menu strony -->
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
                // status logowania
                if (isset( $_SESSION['osoba'])) echo('<a href="../index.php?logout=true">Wyloguj</a>');
                    else echo('<a href="loginForm.php">Zaloguj</a>');
            ?>
        </div>
    </div>

    <div id="auta">
        <?php 
            // wyświetlanie swoich ogłoszeń
            if (isset($_SESSION['osoba'])) {
                // tablica pomocnicza, która będzie zawierała przefiltrowane auta
                $moje=[];

                //filtrowanie aut, sprawdzanie czy należą do zalogowanej osoby
                foreach($samochody as $s)
                {
                    if ($s->osoba==$_SESSION['osoba']->id){
                        array_push($moje,$s);
                    }
                }

                //wyświetlanie aut
                foreach($moje as $m){
                    $m->pokazAutoMini(true);
                }

                //komuikat o braku dodanych aut
                if (count($moje)==0) {
                    echo "<h1>Nie masz aktualnie aut na sprzedaż</h1>";
                }

            }
            else {
                //przekierowanie na stronę główną, gdy nikt nie jest zalogowany
                header("Location: loginForm.php?l=false");
            }


        ?>
    </div>

    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>
    
</body>
</html>