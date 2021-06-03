<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $date = $_POST["date"];
    $message = $_POST["message"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputMessage($username, $message) !== false) {
        header("location: ../message.php?error=emptyinput");
        exit();
    }

    setComments($conn, $username, $date, $message);

}
else {
    header("location: ../message.php");
}

?>