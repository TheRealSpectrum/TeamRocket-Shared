<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "guestbook";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// maakt de connectie aan naar de database of geeft een error weer als dit niet lukt.
?>