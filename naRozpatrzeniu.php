<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje artykuly</title>
    <link rel="stylesheet" href="artStyle.scss">
                <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
    <main>
        <h2>Artykuły do rozpatrzenia</h2>
        <div id="div_conteiner">
            <?php
                session_start();
                $session_id = $_SESSION['user_id'];
                $polaczenie = mysqli_connect('localhost', 'root', '', 'generator');
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['website_id'])) {
                    $website_id = $_POST['website_id'];
                    $delete_query = "DELETE FROM saved WHERE user_id = '$session_id' AND website_id = '$website_id' LIMIT 1";
                    mysqli_query($polaczenie, $delete_query);
                }
                $zapytanie = "
                SELECT id ,title
                FROM na_rozpatrzeniu 
                ";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                while ($wiersz = mysqli_fetch_array($wynik)) {
                    $rozp_website_id = $wiersz[0];
                    $title = htmlspecialchars($wiersz[1]);
                
                    echo "<form method='POST' action='set_rozpatrzenie_website.php'>";
                    echo "<input type='hidden' name='rozp_website_id' value='$rozp_website_id'>";
                    echo "<button type='submit' class='conteinerElement' style='border:none; background:white; padding:0; width:100%; text-align:left; cursor:pointer;'>";

                    echo "<p style='padding:10px; border-bottom:1px solid black;'>$title</p>";
                    echo "</button>";
                    echo "</form>";
                }

            ?>

        </div>
    </main>
</body>
</html>