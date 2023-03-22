<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        Tutaj jest formularz przeznaczony do logowania i rejestracji użytkowników serwisu.
 -->

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //info o błędnym logowaniu się 
        if (isset($_GET['login'])&&$_GET['login']=='false') {
            echo (
                '<script>
                    alert("Niepoprawne dane logowania. Zaloguj się ponownie");
                </script>'
            );
        }
        if (isset($_GET['jest'])&&$_GET['jest']=='tak') {
            echo (
                '<script>
                    alert("Masz już u nas konto. Zaloguj się.");
                </script>'
            );
        }
    ?>
    <!-- menu -->
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
                if (isset( $_SESSION['osoba'])) echo('<a href="../index.php?logout=true">Wyloguj</a>');
                    else echo('<a href="loginForm.php">Zaloguj</a>');
            ?>
        </div>
    </div>

    <?php
        // powiadomienie przesłane z innej strony o konieczności logowania
        if (isset($_GET['l'])&&$_GET['l']=='false') {
            echo '<script>  alert("Najpierw musisz się zalogować") </script>'; 
        }
    ?>
    
    <!-- Formularz służący do logowania się na stronie -->
    <form action="./../app/login.php" method="post">
        <h1>Logowanie  </h1>
        <label>E-mail</label>
        <input type="email" name="login" id="" required>
        <br/>
        <label>Hasło</label>
        <input type="password" name="haslo" id="" required>
        <br/>
        <input type="submit" name="log" value="Zaloguj się">
    </form>
    
    <!-- Formularz służący do rejestracji -->
    <form action="./../app/registerUser.php" method="post">
        <h1> Zarejestruj się</h1>
        <label>Imię: </label>
        <input type="text" name="imie" id="" required>
        <br/>
        <label>Nazwisko: </label>
        <input type="text" name="nazwisko" id="" required>
        <br/>
        <label>E-mail: </label>
        <input type="email" name="email" id="" required>
        <br/>
        <label>Numer telefonu: </label>
        <input type="tel" name="telefon" id="" required>
        <br/>
        <label>Hasło: </label>
        <input type="password" name="haslo" id="password" required>
        <br/>
        <label>Potwierdź hasło: </label>
        <input type="password" name="potwierdz_haslo" oninput="check(this)" id="confirm_password" required>

        <script language='javascript' type='text/javascript'>
            // skrypt sprawdzający czy hasła w dwóch polach są takie same
            function check(input) {
                if (input.value != document.getElementById('password').value) {
                    input.setCustomValidity('Password Must be Matching.');
                } else {
                    // input is valid -- reset the error message
                    input.setCustomValidity('');
                }
            }
        </script>
        <br>
        <input type="submit" name="reg" value="Zarejestruj się">
        <br>
        <input type="reset"  value="Wyczyść formularz">
    </form>

    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>

</body>
</html>