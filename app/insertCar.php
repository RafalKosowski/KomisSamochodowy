<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        Tutaj jest mechanika dodawania samochodów do bazy danych.  
 -->
<?php
    require_once("../private/connect.php");
    require_once("car.php");
    require_once("carsFromDatabase.php");
    require_once("Person.php");
    session_start();

    if (isset($_POST['submit'])) {
        
        $osobaId=$_SESSION['osoba']->id;
        //dane pobrane metodą post(z wyjątkiem osoby)
        $dane=[
            'tytul'=>$_POST['tytul'],
            'model'=>(int)$_POST['model'],
            'paliwo'=>(int)$_POST['paliwo'],
            'rok'=>(int)$_POST['rok'],
            'przebieg'=>(int)$_POST['przebieg'],
            'pojemnosc'=>(int) $_POST['pojemnosc'],
            'moc'=>(int)$_POST['moc'],
            'skrzynia' =>(int) $_POST['skrzynia'],
            'cena'=>(int)$_POST['cena'],
            'opis'=>$_POST['opis'],
            'osoba'=>$osobaId
        ];

        //zapytanie do bazy
        $sql2 = "INSERT INTO samochody(nazwa, modelId, paliwoId, rokProdukcji, przebieg, pojemnosc, moc, skrzyniaId, cena, opis,osobaId) 
        VALUES (:tytul,:model, :paliwo, :rok, :przebieg, :pojemnosc, :moc, :skrzynia, :cena, :opis,:osoba)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute($dane);

        require_once("car.php");
            
        //dodanie zdjeć do bazy danych
        $countfiles = count($_FILES['file']['name']);
        $licz=(end($samochody)->id)+1;
        @mkdir('../auta/'.$licz.'/', 0777);
        for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'][$i];
            move_uploaded_file($_FILES['file']['tmp_name'][$i],'../auta/'.$licz.'/'.$filename);
        }
        header("Location: ../page/userCars.php?dodane=true");
    }
?>