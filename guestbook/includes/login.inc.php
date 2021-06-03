<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}
// Als er op de login knop is gedrukt logged deze code via een functie de user in op de database.
// Als dit niet lukt geeft hij een error weer en stuurt hij je terug naar de login pagina.

function emptyInputLogin($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
// Een functie om te kijken of het login form is ingevuld of niet.

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdhashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdhashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}
// Een functie om de user in te loggen.
// Password check.
// Geeft foutmeldingen weer.
?>