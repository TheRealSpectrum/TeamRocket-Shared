<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="stylesheet" href="styles.css">
<title>SpaceBook</title>
<?php include "functies.php" ?>
</head>
<body>

    <?php session();?>
    <?php loggedIn();?>

    <div class="bannercontainer">
      <div class="banner"></div>
      <h1>SpaceBook</h1>
    </div>
    <form action="index.php" method="post">
        <label for="username">Username: </label><input type="text" name="username">
        <label for="password">Password: </label><input type="password" name="password">
        <input type="submit">
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="reset">
        <button type="submit">log-out</button>
    </form>
    <form action="form.php" method="post">
        <input type="hidden" name="form">
        <button type="submit">Post a message</button>
    </form>
    
    <?php
    $messages = file_get_contents('guests.txt');
    echo $messages;
    ?>

    <form action="index.php" method="post">
        <input type="hidden" name="delete">
        <button class="button" type="submit">Delete all</button>
    </form>

    <?php

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
    {
        deleteAll();
    }

    ?>

</body>
</html>