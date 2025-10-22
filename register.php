<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="regStyle.scss">
</head>
<body>
     <a href="index.php" id="back">🠔</a>
    <style>
        #back {
            width: 15px;
            left: 10px;
            top: 10px;
            padding: 5px;
            position: absolute;
            text-decoration: none;
            color: white;    
            background-color: black;
            border-radius: 5px;
            border: 1px solid white;
        }
    </style>
    <br><br><br><br>
     <main>
          <br>
          <h1>Witamy!</h1><br>
          <h2>Zarejestruj się</h2><br>
          <div class="rejestracja">

			<form method="post" action="register.php">
                    <input type="email" name="email" id="email" placeholder=" " required>
                    <label id="labelEmail" for="email">E-mail:</label><br><br>
				<input type="text" name="nick" id="nick" placeholder=" " required>
                    <label id="labelUsername" for="nick">Username:</label><br><br>
				<input id="password" type="password"name="haslo" placeholder=" " required>
                    <label id="labelPassword" for="haslo">Hasło:</label><br><br></div>   

				<input type="submit" value="Załóż konto"name="rejestracja"><br>
                    <input type="reset" value="Reset"><br>
                    <p class="offer">Masz już konto? <a href="login.php">Zaloguj się!</a></p>
			</form>
          </div>
     </main>
     <?php
     session_start();
	if (isset($_POST["rejestracja"])) {
          $polaczenie = mysqli_connect("localhost","root","","generator");
          if (!$polaczenie) {
               die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
          }
          $email = $_POST["email"] ?? '';
		$login = $_POST["nick"] ?? '';
		$haslo = $_POST["haslo"] ?? '';

		$zapytanie = "INSERT INTO user (email, name, password)VALUES ('$email', '$login', '$haslo')";
		$wynik = mysqli_query($polaczenie,$zapytanie);
          header ('Location: login.php');
		mysqli_close($polaczenie);
	};
     ?>
</body>
</html>
