<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="doneStyle.scss">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-image: url("./images/community.jpg");
        background-size: cover;
        background-repeat: no-repeat;    
        background-attachment: fixed;
    }
    body::before{
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    z-index: -1;
    pointer-events: none;
}
</style>
<?php
    session_start();
    if (isset($_POST['send'])) {
        $template_id = $_POST['thema'];
        $title = $_POST['tytul'];
        $paragraph1 = $_POST['paragraf1'];
        $paragraph2 = $_POST['paragraf2'];
        $polaczenie = mysqli_connect("localhost","root","","generator");
        mysqli_query($polaczenie, "
        INSERT INTO na_rozpatrzeniu (template_id, title, paragraph1, paragraph2) VALUES ('$template_id', '$title', '$paragraph1', '$paragraph2');
        ");
        header('Location: wyslano.php');
        mysqli_close($polaczenie);
    }
?>
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
        <form method="POST">
            Dodaj tytuł: <input type="text" placeholder="Tytuł..." name="tytul">
        <div class="conteiner">
            <p>Pierwszy paragraf:</p>
            <textarea type="text" placeholder="Paragraf..." name="paragraf1" class="paragrafs"></textarea><br>
            <p>Drugi paragraf:</p>
            <textarea type="text" placeholder="Paragraf..." name="paragraf2" class="paragrafs"></textarea><br>
            <p style="font-size: 80%; margin-top:10px; margin-bottom:5px;">Do jakiej kategorii należy twój artykuł: </p>
            <select name="thema" style="font-size: 80%; margin-top:5px;" >
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
            </select>
        </div>
    </main>
    <footer>
        <input type="submit" id="zapisz" value="Wyślij" name="send">
        <input type="reset" value="Reset">
    </form>
    </footer>
</body>
</html>