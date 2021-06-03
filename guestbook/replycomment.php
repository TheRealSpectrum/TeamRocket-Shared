<?php include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'includes/functions.inc.php'; ?>
<?php date_default_timezone_set('Europe/Amsterdam'); ?>

<?php
    if (isset($_SESSION["useruid"])) {
        echo "<div class='usergreet'><p>Your are logged in as: " . $_SESSION["useruid"] . "<br>Welcome!</p></div>";
    }
    // Welkomst tekst voor de ingelogde user.
?>

<?php

$cid = $_POST["cid"];
$uid = $_SESSION["userid"];
$date = $_POST["date"];

echo    "<form class='edit-box' action='".replyComments($conn)."' method='post'>
        <h2>Reply to this message</h2>
        <input type='hidden' name='cid' value='".$cid."'>
        <input type='hidden' name= 'uid' value='".$uid."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea>
        <button type='submit' name='commentSubmit'>Reply</button>
        </form>";
?>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
    }
    // Message form met datum en foutmeldingen.
    // zodra er op de knop is gedrukt linked deze door naar andere code met functionaliteit.
?>

<?php include_once 'footer.php'; ?>