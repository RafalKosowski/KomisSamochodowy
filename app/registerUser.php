<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tutaj jest mechanika rejestrowania się do serwisu
 -->
<?php
    session_start();
    require_once("../private/connect.php");

    if (isset($_POST['reg']) ) {
        //dane z formularza
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $imie = $_POST['imie'];
        $nazwsiko = $_POST['nazwisko'];
        $login = $_POST['telefon'];

        //zapytania do bazy danych
        $sql = "SELECT `osobaId`, `imie`, `nazwisko`, `email`, `telefon`,haslo FROM `osoby` WHERE `email`='$email'";
        $stmt = $pdo->query($sql);
        $licz=$stmt->rowCount();  
        if ($licz > 0) {
            foreach ($stmt as $row) {
                if ($row['email']==$email ) {
                    //sprawdzenie czy osoba ma już konto
                    header("Location: ../page/loginForm.php?jest=tak");
                }else{
                    echo "Wystąpił nieznany błąd";
                }
            }  
        }
        else {
            // dodawanie osoby do bazy danych
            $sql2 = "INSERT INTO `osoby`( `imie`, `nazwisko`, `email`, `telefon`, `haslo`) VALUES (:imie,:nazwsko,:email,:telefon,:haslo)";
                    $dane = [
                        'imie' => $_POST['imie'],
                        'nazwsko' => $_POST['nazwisko'],
                        'email' => $_POST['email'],
                        'telefon' => $_POST['telefon'],
                        'haslo' => md5($_POST['haslo'])
                    ];
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->execute($dane);
        }
    }
    else {
        echo "Wystąpił nieznany błąd";
    }
?>