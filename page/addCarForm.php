<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest strona, na której jest formularz do dodania auta

 -->
<?php
    require_once("./../private/connect.php");
    //zapytania potrzebne do uzskania potrzebnych informacji, aby stworzyć formularz
    $sql1 = "SELECT * FROM `marka`";
    $sql3 = "SELECT * FROM `paliwo`";
    $sql4 = "SELECT * FROM `skrzynia`";
    session_start();

    //przekierowanie do formularza logowania w przypadku osoby niezalogowanej
    if (!isset($_SESSION['osoba'])) {
        header("Location: loginForm.php?l=false");
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wstaw Auto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
            if (isset( $_SESSION['osoba'])) {
                echo('<a href="../index.php?logout=true">Wyloguj</a>');
                

            }else {
                echo('<a href="loginForm.php">Zaloguj</a>');
            }
        ?>
        </div>
    </div>
    <!-- Formularz do dodania auta -->
    <form action="/Projekt/app/insertCar.php"  method="post" enctype="multipart/form-data">
        <h2>Dodaj nowe ogłoszenie</h2>
        <label>Tytuł:</label>
        <input type="text" name="tytul" required />
        <br/>
        <label>Marka i model:</label>
        <select name="model" required>
            <option></option>
            <?php
                //wyświetlanie modeli aut do wyboru  
                $stmt = $pdo->query($sql1);
                foreach ($stmt as $row) {
                    echo('<optgroup label="'.$row['marka'].'">');
                    $sql2 = "SELECT * FROM `model` join marka on model.markaId=marka.markaId where marka='".$row['marka']."'";
                    $stmt2 = $pdo->query($sql2);
                    foreach ($stmt2 as $row2) {
                        echo('<option value="'.$row2['modelId'].'">');
                        echo($row2['marka'].' '.$row2['model']);
                        echo('</option>');
                    }
                } 
            ?>
        </select>
        <br/>
        <label>Paliwo</label>
        <select name="paliwo" required>
            <option></option>
            <?php
            //wyświetlanie paliw aut do wyboru 
                $stmt = $pdo->query($sql3);
                foreach ($stmt as $row) {
                    echo('<option value="'.$row['paliwoId'].'">');
                    echo($row['paliwo']);
                    echo('</option>');
                } 
            ?>
        </select>
        <br/>
        <label>Rok produkcji:</label>
        <input type="number" name="rok" min="1900" maxlength="4" max="2100" required>
        <br/>
        <label>Przebieg:</label>
        <input type="number" name="przebieg" min="1" maxlength="10" max="10000000" required>
        <br/>
        <label>Pojemność skokowa:</label>
        <input type="number" name="pojemnosc" min="1" maxlength="7" max="20000" required>
        <br/>
        <label>Moc silnika:</label>
        <input type="number" name="moc" min="1" maxlength="7" max="20000" required>
        <br/>
        <label>Skrzynia:</label>
        <select name="skrzynia"  required>
        <?php
            //wyświetlanie skrzyń biegów do wyboru 
            $stmt = $pdo->query($sql4);
                foreach ($stmt as $row) {
                        
                    echo('<option value="'.$row['skrzyniaId'].'">');
                    echo($row['skrzynia']);
                    echo('</option>');
                
                } 
            ?>
        </select>
        <br/>
        <label>Cena</label>
        <input type="number" name="cena" min="500" maxlength="15" max="10000000000" required>
        <br/>
        <label>Opis</label>
        <Textarea name="opis" ></Textarea required>
        <br/>
        <label>Zdjęcia</label>
        <input type="file" name="file[]" id="file" accept="image/*" multiple required>
        <br/>
        <br/>
        <input type="submit" name="submit" value="Dodaj auto" />
        <input type="reset" value="Wyczyść formularz">
        
        
    </form>
    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>
   
</body>
</html>
