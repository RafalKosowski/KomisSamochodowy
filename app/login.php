<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tutaj jest mechanika logowania się do serwisu
 -->
<?php
session_start();
require_once("../private/connect.php");
require_once("Person.php");

if (isset($_POST['log'])) {
    //dane z formularza
    $login = $_POST['login'];
    $haslo = md5($_POST['haslo']);
    
    // zapytanie do bazy danych
    $sql = "SELECT * FROM `osoby` WHERE `email`='$login' AND `haslo`='$haslo'";
    $stmt = $pdo->query($sql);
    $licz=$stmt->rowCount();  
      if ($licz == 1) {
        foreach ($stmt as $row) {
            if ($row['email']==$login && $row['haslo']==$haslo) {
                $_SESSION['osoba']=new Osoba($row['osobaId'],$row['imie'],$row['nazwisko'],$row['telefon'],$row['email']);
                header("Location: ../index.php?login=true");
                // przekierowanie na stronę główną po zalogowaniu 
            }
            else{
              header("Location: ../page/loginForm.php?login=false");
              // przekierowanie po błędnym logowaniu
            }
        }

      }
      else {
        header("Location: ../page/loginForm.php?login=false");
        // przekierowanie po błędnym logowaniu
      }
}
else {
    echo "Wystąpił nieznany błąd";
}
?>