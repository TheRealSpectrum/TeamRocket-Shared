<?php include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'includes/functions.inc.php'; ?>

<?php

$cid = $_POST["cid"];
$uid = $_POST["uid"];
$date = $_POST["date"];
$message = $_POST["message"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

echo    "<form class='edit-box' action='".editComments($conn)."' method='post'>
        <input type='hidden' name='cid' value='".$cid."'>
        <input type='hidden' name='uid' value='".$uid."'>
        <input type='hidden' name='date' value='".$date."'>
        <textarea name='message'>".$message."</textarea>
        <button type='submit' name='commentSubmit'>Edit</button>
        </form>";

?>

<?php include_once 'footer.php'; ?>