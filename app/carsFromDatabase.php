
<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        Tutaj są pobierane samochody z bazy danych i jest tworzenie nowych obiektów.   
 -->
<?php
    @include_once("./private/connect.php");
    @include_once("./../private/connect.php");
    require_once("car.php");
    $sql = "SELECT `autoId`, `nazwa`,  marka.marka, model.model, paliwo.paliwo, `rokProdukcji`, `przebieg`, `pojemnosc`, `moc`, skrzynia.skrzynia,  `cena`, `opis`, `osobaId` FROM `samochody` JOIN skrzynia on samochody.skrzyniaId=skrzynia.skrzyniaId Join paliwo on samochody.paliwoId=paliwo.paliwoId JOIN model on samochody.modelId= model.modelId JOIN marka on model.markaId=marka.markaId";
    $samochody=[];
    $stmt = $pdo->query($sql);
      
    foreach($stmt as $row)
    {
        //tworzenie samochodów i dodawanie ich do tablicy na podstawie informacji z bazy danych
        array_push($samochody, 
        new Samochod($row['autoId'],$row['nazwa'],$row['marka'],$row['model'],$row['paliwo'],$row['rokProdukcji'],$row['przebieg'],$row['pojemnosc'],$row['moc'],$row['skrzynia'],$row['cena'],$row['opis'],$row['osobaId']));
    }
    $stmt->closeCursor();
?>
