<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest strona główna projektu. Tutaj wyświetlają się wszystkie ogłoszenia.

 -->
<?php
// dołączenie plików php
require_once("./private/connect.php");
require_once("./app/car.php");
require_once("./app/carsFromDatabase.php");
session_start();

// powiadomienia o pomyślnym logowaniu i wylogowaniu
if (isset($_GET['login'])&&$_GET['login']&&isset($_SESSION['osoba'])) {
    echo (
        '<script>
            alert("Logowanie przebiegło pomyślnie");
        </script>'
    );
}else if(isset($_GET['logout'])&&$_GET['logout']&&isset($_SESSION['osoba'])){
    unset($_SESSION['osoba']);
    session_destroy();
    echo (
        '<script>
            alert("Zostałeś wylogowany");
        </script>'
    );
    
    
}else echo "";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- głowa strony -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kup auto już teraz</title>
    <link rel="stylesheet" href="./page/style.css">
</head>
<body>
    <!-- Tu jest górne menu strony -->
    <div id="menu">
       <nav>
            <ul>
                <li> <a href="index.php">Szukaj auta </a></li>
                <li> <a href="page/addCarForm.php">Sprzedaj auto </a></li>
                <li> <a href="page/userCars.php">Moje auta </a></li>
                <li> <a href="page/kontakt.html">Kontakt </a></li>
            </ul>
       </nav> 
       <div id="osoba">
        <?php
            // sprawdzanie czy ktoś jest zalogowanu
            if (isset( $_SESSION['osoba'])) {
                echo('<a href="index.php?logout=true">Wyloguj</a>');
            }else {
                echo('<a href="page/loginForm.php">Zaloguj</a>');
            }
        ?>
        </div>
    </div>
     
    <!-- Miejsce do wyświetlania aut -->
    <div id="auta">
    <?php 

     foreach($samochody as $s)
     {
        // wyświetlanie aut
        @ $s->pokazAutoMini(false);
     };
   
    ?>
    </div>
    <!-- Stopka -->
    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>
</body>
    
</html>