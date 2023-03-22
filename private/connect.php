<!-- 
	Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest plik odpowiedzialny za połączenie z bazą danych
 -->
<?php
$mysql_host = 'localhost'; //host
$port = '3306'; //port
$username = 'root'; // użytkownik
$password = ''; //hasło
$database = 'komis'; //nazwa bazy danych
// obsługa wyjątku PDOException przy połączeniu z bazą danych
try{
	$pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password ); //połączenie z bazą danych
	$pdo->exec("set names utf8mb4"); //ustawienie polskich znaków
}catch(PDOException $e){
	//błąd połączenia
	echo 'Połączenie nie mogło zostać utworzone.<br />'; 
}
?>