<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfiguracja</title>
    <link rel="stylesheet" href="cfgStyle.scss">
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
        <br>
        <h3>Ustaw preferencje</h3><br><br><br>
        <form method="POST">
            Temat strony: 
            <select name="thema">
                <option value="0" selected>bez preferencji</option>
                <option value="1">Polityka i Skandale</option>
                <option value="2">Sensacja i Teorie Spiskowe</option>
                <option value="3">Nauka i Technologie z Przyszłości</option>
                <option value="4">Gwiazdy i Plotki</option>
                <option value="5">Apokalipsa i Katastrofy</option>
                <option value="6">Lokalne Absurdy</option>
                <option value="7">Sportowe Szaleństwo</option>
                <option value="8">Magia, Horoskopy i Przepowiednie</option>
                <option value="9">Zwierzęta Kontra Ludzie</option>
                <option value="10">Ekstremalna Moda i Trendy</option>
                <option value="11">Inne</option>
            </select><br><br>
            Ciemny styl: <input name="color" type="checkbox" value="1"><br>
        <button type="submit" name="send" style="padding: 20px;">Generuj</button>
        </form>
        <?php

        session_start();
            $user_id = $_SESSION["user_id"];
        	$polaczenie = mysqli_connect("localhost","root","","generator");
            if (isset($_POST["send"])) {
                $preferencje = $_POST['thema'];
                $_SESSION["preferencje"] = $preferencje;

            // if ($_SESSION['preferencje'] == 0) {
            //     unset($_SESSION['preferencje']);
            //     $_SESSION['website_id'] = rand(2005, 3004);
            // }
            // elseif ($_SESSION['preferencje'] == 1) {
            //     $_SESSION['website_id'] = rand(2005, 2104);
            // }
            //             elseif ($_SESSION['preferencje'] == 2) {
            //     $_SESSION['website_id'] = rand(2105, 2204);
            // }
            //             elseif ($_SESSION['preferencje'] == 3) {
            //     $_SESSION['website_id'] = rand(2205, 2304);
            // }
            //             elseif ($_SESSION['preferencje'] == 4) {
            //     $_SESSION['website_id'] = rand(2305, 2404);
            // }
            //             elseif ($_SESSION['preferencje'] == 5) {
            //     $_SESSION['website_id'] = rand(2405, 2504);
            // }
            //             elseif ($_SESSION['preferencje'] == 6) {
            //     $_SESSION['website_id'] = rand(2505, 2604);
            // }
            //             elseif ($_SESSION['preferencje'] == 7) {
            //     $_SESSION['website_id'] = rand(2605, 2704);
            // }
            //             elseif ($_SESSION['preferencje'] == 8) {
            //     $_SESSION['website_id'] = rand(2705, 2804);
            // }
            //             elseif ($_SESSION['preferencje'] == 9) {
            //     $_SESSION['website_id'] = rand(2805, 2904);
            // }
            //             elseif ($_SESSION['preferencje'] == 10) {
            //     $_SESSION['website_id'] = rand(2905, 3004);
            // }

             if ($preferencje == 0){
                  $list = array();
                  $wynik = mysqli_query($polaczenie, "
                  SELECT id 
                  FROM fake_sites
                  ");
                  while ($wiersz = mysqli_fetch_row($wynik)) {
                        $list[] = $wiersz[0];
                  }
                }
                else{
                    $list = array();
                    $wynik = mysqli_query($polaczenie, "
                    SELECT id 
                    FROM fake_sites
                    WHERE template_id = '$preferencje';
                    ");
                    while ($wiersz = mysqli_fetch_row($wynik)) {
                          $list[] = $wiersz[0];
                    }
                }   


            $random_id = $list[rand(0, count($list) - 1)];
            $_SESSION['new_id'] = $random_id;

                $x = 0;
                if (isset($_POST['color'])) {
                    $x = 1; 
                }
                else {
                    $x = 0;
                }
                $_SESSION['set_color'] = $x;
                $query = "UPDATE user SET preferencje='$preferencje', color='$x' WHERE id='$user_id'";
                $query_run = mysqli_query($polaczenie, $query);
                if (!$query_run) {
                    die("Error updating preferences: " . mysqli_error($polaczenie));
                }

                header("Location: gotowaStrona.php");

                mysqli_close($polaczenie);
            }
        ?>
    </main>
</body>
</html>