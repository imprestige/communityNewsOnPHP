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
    </style><br><br><br><br>
     <main>
          <br>
          <h1>Witamy z powrotem!</h1><br>
          			<h2>Zaloguj się</h2><br>
          <div class="login" style="margin-top: 20px; margin-bottom:20px;">

			<form method="post">
				<input type="text" name="nick" id="nick" placeholder=" " required>
                    <label id="labelUsername" for="nick">Username:</label><br><br>
				<input id="password" type="password"name="haslo" placeholder=" " required>
                    <label id="labelPassword" for="haslo">Hasło:</label><br><br></div>   

				<input type="submit" value="Zaloguj się"name="logowanie"><br>
                    <input type="reset" value="Reset"><br>
                    <p class="offer">Nie masz konta? Załóż je <a href="register.php">tutaj</a></p>
			</form>
          </div>
     </main>
     <?php
               session_start();
			if (isset($_POST["logowanie"])) 
			{
		          $login = $_POST["nick"] ?? '';
		          $haslo = $_POST["haslo"] ?? '';
				$polaczenie = mysqli_connect("localhost","root","","generator");

                    if (!$polaczenie) {
                        die("Błąd połączenia z bazą: " . mysqli_connect_error());
                    }

				$zapytanie = "SELECT name,password,id FROM user";
				$wynik = mysqli_query($polaczenie,$zapytanie);
				while ($wiersz = mysqli_fetch_row($wynik))
				{
					if ($wiersz[0] == $login) {
						if ($wiersz[1] == $haslo) {
                                   $_SESSION["user"] = $login;
                                   $_SESSION["user_id"]=$wiersz[2];
							header("Location: index.php");
							exit();
						}
                              else {
                              echo"<script>alert('Something worng...')</script>";
                              }
					}
                         else {
                              echo"<script>alert('Something worng...')</script>";
                         }
				};
                    mysqli_close($polaczenie);
			};

     ?>
</body>
</html>
