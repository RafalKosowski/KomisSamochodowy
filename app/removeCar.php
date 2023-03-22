<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tutaj jest mechanika usuwania samochodu
      
 -->
<?php
    include_once("./../private/connect.php");
    if (isset($_GET['id'])) {
        $sql = "DELETE FROM `samochody` WHERE `autoId`=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]);
    }

    header("Location: ../page/userCars.php?delete=tak");

?>