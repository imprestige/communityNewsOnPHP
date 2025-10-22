<?php
session_start();

if (isset($_POST['rozp_website_id'])) {
    $_SESSION['rozp_website_id'] = $_POST['rozp_website_id'];
    $rozp = $_SESSION['rozp_website_id'];
    header("Location: gotowaStronaDoRozpatrzenia.php");
    exit;
} else {
    echo "Brak ID strony.";
}
?>
