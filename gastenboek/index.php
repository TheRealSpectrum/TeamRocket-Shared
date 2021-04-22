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
    </div>
    <h1>SpaceBook</h1>
    <form action="form.php" method="post">
        <label for="username">Username: </label><input type="text" name="username">
        <label for="password">Password: </label><input type="password" name="password">
        <input type="submit">
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="reset">
        <button type="submit">log-out</button>
    </form>
    
    <?php
    
    // Leest guests file en echoed content.
    $guests = fopen("guests.txt", "r");
    if(!file_exists("guests.txt")) {
    echo "File not found";
    } else {
    echo file_get_contents('guests.txt');
    fclose($guests);
    }

    // Link delete button aan functie
    if(array_key_exists('delete', $_POST)) {
      button1();
    }
    
    ?>
    
    <form method="post">
        <input type="submit" name="delete" class="button" value="delete all" />
    </form>

</body>
</html>