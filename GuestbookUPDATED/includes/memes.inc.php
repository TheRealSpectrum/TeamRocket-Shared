<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $date = $_POST["date"];
    $link = $_POST["link"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputMessage($username, $link) !== false) {
        header("location: ../memes.php?error=emptyinput");
        exit();
    }

    setUrl($conn, $username, $link, $date);

}
else {
    header("location: ../memes.php");
}

?>