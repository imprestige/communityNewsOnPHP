<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Losowe fejkowe Artykuły</title>
    <link rel="stylesheet" href="mainStyle.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    
              <?php
                session_start();
                if ($_SESSION["user"] != null) {
                    echo '<form method="POST"><button name="logout" id="logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                              </svg></button></form>';
                }

               if (isset($_POST["logout"])) {
                   $_SESSION["user"] = null;
                   $_SESSION["user_id"] = null;
                   header("Location: index.php");
                   exit();
          }
          
          ?>
    <main>
        <h3>Fejkowe artykuły nowościowe</h3>
        <?php

            if (isset($_SESSION["user"])) {
                if ($_SESSION['user_id'] == 0) {
                    $a = $_SESSION["user"];
                    echo '<h4>Witaj '.$a."!</h4>";
                    echo "<br>";
                    echo '<a href="stronaKonfigurujaca.php"><button style="width:300px; font-size: 90%; margin-top: 20px; padding: 20px;"> Losuj artykuł </button></a><br>';
                    echo '<a href="naRozpatrzeniu.php"><button style="width:300px; margin-top: 10px; font-size: 90%; padding: 20px;">Otwórz artykuły na rozpatrzeniu </button></a><br>';
                    echo '<a href="create.php"><button style="width:300px; font-size: 90%; margin-top: 10px;  padding: 20px;"> Stwórz własny artykuł </button></a>';
                }
                else {
                    $a = $_SESSION["user"];
                    echo '<h4>Witaj '.$a."!</h4>";
                    echo "<br>";
                    echo '<a href="stronaKonfigurujaca.php"><button style="width:300px; font-size: 90%; margin-top: 20px; padding: 20px;"> Losuj artykuł </button></a><br>';
                    echo '<a href="mojeArtk.php"><button style="width:300px; margin-top: 10px; font-size: 90%; padding: 20px;">Otwórz zapisane przez ciebie artykuły </button></a><br>';
                    echo '<a href="create.php"><button style="width:300px; font-size: 90%; margin-top: 10px;  padding: 20px;"> Stwórz własny artykuł </button></a>';
                }
            }
            else {
                echo '
                <h4>Aby zacząć używać togo serwisu: </h4>
                <a href="login.php"><button>Zaloguj się</button></a> 
                <a href="register.php"><button>Zarejestruj się</button></a>';
            }
        ?>

    </main>
</body>
</html>