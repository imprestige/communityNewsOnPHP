<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="doneStyle.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

</head>
<body>
    <main>
            <?php
                session_start();
                echo '<style> body{background-color: rgb(10,10,10);}.conteiner{ background-color: rgb(36, 36, 36); color: white;}#p1 , #p2 {background-color:rgb(20, 20, 20);}</style>';
                if (isset($_SESSION['rozp_website_id'])) {
                    $rozp_website_id = $_SESSION['rozp_website_id'];
                    $polaczenie = mysqli_connect("localhost", "root", "", "generator");
                    $wynik = mysqli_query($polaczenie, "
                    SELECT title, paragraph1, paragraph2, template_id
                    FROM na_rozpatrzeniu
                    WHERE id = '$rozp_website_id'
                    ");
                    while ($wiersz = mysqli_fetch_row($wynik)) {
                        $template_id = $wiersz[3];
                        switch ($template_id) {
                            case 1:
                                $nazwa .= " Polityka i Skandale";
                                break;
                            case 2:
                                $nazwa .= " Sensacja i Teorie Spiskowe";
                                break;
                            case 3:
                                $nazwa .= " Nauka i Technologie z Przyszłości";
                                break;
                            case 4:
                                $nazwa .= " Gwiazdy i Plotki";
                                break;
                            case 5:
                                $nazwa .= " Apokalipsa i Katastrofy";
                                break;
                            case 6:
                                $nazwa .= " Lokalne absurdy";
                                break;
                            case 7:
                                $nazwa .= " Sportowe Szaleństwo";
                                break;
                            case 8:
                                $nazwa .= " Magia, Horoskopy i Przepowiednie";
                                break;
                            case 9:
                                $nazwa .= " Zwierzęta Kontra Ludzie";
                                break;
                            case 10:
                                $nazwa .= " Ekstremalna Moda i Trendy";
                                break;
                            case 11:
                                $nazwa .= " Inne";
                                break;
                        }
                        echo '<h2>'.$wiersz[0].'</h2><br><br>';
                        echo '<div class="conteiner">';
                        echo '<div id="p1"><p>'.$wiersz[1].'</p></div><br>';
                        echo '<div id="p2"><p>'.$wiersz[2].'</p></div><br>';
                        echo 'należy do kategorii: '.$nazwa;
                        echo '</div>';
                }
                mysqli_close($polaczenie);
                }
                else {
                    $rozp_website_id = $_SESSION['rozp_website_id'];
                    echo "Something wrong...";
                    echo "$rozp_website_id";
                }
                if (isset($_POST['ok'])) {
                    $rozp_website_id = $_SESSION['rozp_website_id'];
                    $polaczenie = mysqli_connect("localhost", "root", "", "generator");
                    $wynik = mysqli_query($polaczenie, "
                    SELECT title, paragraph1, paragraph2, template_id
                    FROM na_rozpatrzeniu
                    WHERE id = '$rozp_website_id'
                    ");
                    while ($wiersz = mysqli_fetch_row($wynik)) {
                        $title = $wiersz[0];
                        $paragraph1 = $wiersz[1];
                        $paragraph2 = $wiersz[2];
                        $template_id = (int)$wiersz[3];
                        mysqli_query($polaczenie, "
                        INSERT INTO fake_sites(template_id, title, paragraph1, paragraph2) VALUES ('$template_id', '$title', '$paragraph1', '$paragraph2');
                        ");
                        mysqli_query($polaczenie, "
                            DELETE FROM na_rozpatrzeniu WHERE id = '$rozp_website_id'
                        ");
                        header("Location: naRozpatrzeniu.php");
                }
                mysqli_close($polaczenie);
                }
                if (isset($_POST['noOk'])) {
                    $rozp_website_id = $_SESSION['rozp_website_id'];
                    $polaczenie = mysqli_connect("localhost", "root", "", "generator");
                    mysqli_query($polaczenie, "
                        DELETE FROM na_rozpatrzeniu WHERE id = '$rozp_website_id'
                    ");
                    header("Location: naRozpatrzeniu.php");
                }
            ?>
    </main>
    <footer>
        <form method="POST">
            <input type="submit" name="ok" value="Jest OK" id="ok">
            <input type="submit" name="noOk" value="Nie jest OK" id="noOk">
        </form>
    </footer>
</body>
</html>