<?php include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'includes/functions.inc.php'; ?>

<?php
    if (isset($_SESSION["useruid"])) {
        echo "<div class='usergreet'><p>Your are logged in as: " . $_SESSION["useruid"] . "<br>Welcome!</p></div>";
    }
    // Welkomst tekst voor de ingelogde user.
?>

<?php

$cid = $_POST["cid"];
$uid = $_POST["uid"];
$date = $_POST["date"];
$message = $_POST["message"];

echo    "<form class='edit-box' action='".editComments($conn)."' method='post'>
        <h2>Edit your message</h2>
        <input type='hidden' name='cid' value='".$cid."'>
        <input type='hidden' name='uid' value='".$uid."'>
        <input type='hidden' name='date' value='".$date."'>
        <textarea name='message'>".$message."</textarea>
        <button type='submit' name='commentSubmit'>Edit</button>
        </form>";

?>

<?php include_once 'footer.php'; ?>