<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="stylesheet" href="">
<title>Guestbook</title>
</head>
<body>
  <h1>Guestbook</h1>
  <a href="index.php" class="gb-link">View Guestbook</a>
  <a href="form.php" class="msg-link">Leave a Message</a>
</body>
</html>

<?php
$guests = fopen("guests.txt", "r") or die("Unable to open file!");
echo fread($guests,filesize("guests.txt"));
fclose($guests);
?>