<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SpaceBook</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h2>Edit your comment.</h2>
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

</body>
</html>