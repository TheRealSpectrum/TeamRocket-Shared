<?php session_start() ?>
<?php

if (isset($_POST["messageform"])) {

    $username = $_SESSION["useruid"];
    $message = $_POST["messageform"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createMessage($conn, $username, $message);

}
else {
    header("location: ../message.php");
}

?>