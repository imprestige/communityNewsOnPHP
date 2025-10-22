<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapisane!</title>
    <link rel="stylesheet" href="zapisaneStyle.scss">
                <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <h1>Zapisane!</h1>
        <form method="POST">
            <input name="back" value="Wróć na stronę główną" type="submit">
        </form>
        <?php
            session_start();
            if (isset($_POST['back'])) {
                header('Location: index.php');
            }
        ?>
    </main>
</body>
</html>