<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        Tutaj są pobierane osoby z bazy danych i jest tworzenie nowych obiektów w tablicy.    
 -->
<?php
    @include_once("./private/connect.php");
    @include_once("./../private/connect.php");
    require_once("Person.php");
    $sql2 = "SELECT * FROM `osoby`";
    $stmt2 = $pdo->query($sql2);
    $ludzie=[];
    $stmt2 = $pdo->query($sql2);  
    foreach($stmt2 as $row)
    {
        array_push($ludzie, 
        new Osoba($row['osobaId'],$row['imie'],$row['nazwisko'],$row['telefon'],$row['email']));
    }
    $stmt2->closeCursor();
?>
