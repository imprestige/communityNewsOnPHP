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

        $polaczenie = mysqli_connect("localhost", "root", "", "generator");
        $preferencje = $_SESSION['preferencje'];
        switch ($preferencje) {
            case 0: echo '<style> body{background-image: url("./images/background2.jpg");}</style>'; break;
            case 1: echo '<style> body{background-image: url("images/polityka.jpg");}</style>'; break;
            case 2: echo '<style> body{background-image: url("images/teorie.jpg");}</style>'; break;
            case 3: echo '<style> body{background-image: url("images/nauka.jpg");}</style>'; break;
            case 4: echo '<style> body{background-image: url("images/gwiazda.webp");}</style>'; break;
            case 5: echo '<style> body{background-image: url("images/apokalipsa.jpg");}</style>'; break;
            case 6: echo '<style> body{background-image: url("images/absurd.jpg");}</style>'; break;
            case 7: echo '<style> body{background-image: url("images/sport.jpg");}</style>'; break;
            case 8: echo '<style> body{background-image: url("images/horoskop.jpg");}</style>'; break;
            case 9: echo '<style> body{background-image: url("images/zwierzeta.jpg");}</style>'; break;
            case 10: echo '<style> body{background-image: url("images/fashion.webp");}</style>'; break;
            case 11: echo '<style> body{background-image: url("images/community.jpg");}</style>'; break;
        }


                if ($_SESSION['set_color'] == 0) {

                    echo '<style> .conteiner{ background-color: white; color: black;}#p1 , #p2 {background-color:rgb(165, 165, 165);} </style>';
                }
                elseif ($_SESSION['set_color'] == 1) {
                    echo '<style> .conteiner{ background-color: rgb(36, 36, 36); color: white;}#p1 , #p2 {background-color:rgb(20, 20, 20);}</style>';
                }
            

        // $polaczenie = mysqli_connect("localhost","root","","generator");
        // if (isset($_SESSION['preferencje'])) {


            // if (isset($_SESSION['website_id'])) {
                // $website_id = $_SESSION['website_id'];
                // $preferencje = $_SESSION['preferencje'];
                $new_id = $_SESSION['new_id'];
                $wynik = mysqli_query($polaczenie, "
                SELECT title, paragraph1, paragraph2
                FROM fake_sites
                WHERE id = '$new_id'
                ");
                while ($wiersz = mysqli_fetch_row($wynik)) {
                    echo '<h2>'.$wiersz[0].'</h2><br><br>';
                    echo '<div class="conteiner">';
                    echo '<div id="p1"><p>'.$wiersz[1].'</p></div><br>';
                    echo '<div id="p2"><p>'.$wiersz[2].'</p></div>';
                    echo '</div>';
                }


        //     }
        // }
        // else{
        //             if (isset($_SESSION['website_id'])) {
        //             $website_id = $_SESSION['website_id'];
        //             $wynik = mysqli_query($polaczenie, "
        //             SELECT title, paragraph1, paragraph2
        //             FROM fake_sites
        //             WHERE id = '$website_id';
        //             ");
        //             while ($wiersz = mysqli_fetch_row($wynik)) {
        //                 echo '<h2>'.$wiersz[0].'</h2><br><br>';
        //                 echo '<div class="conteiner">';
        //                 echo '<div id="p1"><p>'.$wiersz[1].'</p></div><br>';
        //                 echo '<div id="p2"><p>'.$wiersz[2].'</p></div>';
        //                 echo '</div>';
        //             }


        //     }
        // }

        mysqli_close($polaczenie);



        if (isset($_POST['goback'])) {
            header("Location: stronaKonfigurujaca.php");
        }
        $user_id = $_SESSION["user_id"];
        $color = $_SESSION['set_color'];
        if (isset($_POST['save'])) {
            $polaczenie = mysqli_connect("localhost","root","","generator");

            $wynik = mysqli_query($polaczenie, "
            INSERT INTO saved (user_id, website_id, color)VALUES ('$user_id', '$new_id', '$color')
            ");
            header("Location: zapisane.php");            
        }
    ?>
    </main>
    <footer>
        <form method="POST">
            <input name="save" value="Zapisz" type="submit">
            <input name="goback" value="Wróć" type="submit">
        </form>
    </footer>
</body>
</html>