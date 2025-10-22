<?php
session_start();

if (isset($_POST['website_id'])) {
    $_SESSION['new_id'] = $_POST['website_id'];
    $_SESSION['set_color'] = $_POST['color'];
    header("Location: gotowaStrona.php");
    exit;
} else {
    echo "Brak ID strony.";
}
?>
