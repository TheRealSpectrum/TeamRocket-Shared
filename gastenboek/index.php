<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="icon" href=../img/spacebook-website-icons.png>
<link rel="stylesheet" href="styles.css">
<title>SpaceBook</title>
<?php include "functies.php" ?>
</head>
<body>

    <?php session();?>

    <div class="bannercontainer">
      <div class="banner"></div>
      <h1>SpaceBook</h1>
    </div>
    <form action="index.php" method="post">
        <label for="username">Username: </label><input type="text" name="username">
        <label for="password">Password: </label><input type="password" name="password">
        <input type="submit">
    </form>

    <?php loggedIn();?>
    
    <form action="index.php" method="post">
        <input type="hidden" name="reset">
        <button type="submit">log-out</button>
    </form>
    <form action="form.php" method="post">
        <input type="hidden" name="form">
        <button type="submit">Post a message</button>
    </form>
    
    <?php showPosts(); ?>

    <form action="index.php" method="post">
        <input type="hidden" name="deleteAll">
        <button class="button" type="submit">Delete all</button>
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deleteAll']))
    {
        deleteAll();
    }
    // Linking deleteAll button to the function

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
    {
        deleteSingle();
    }
    // Linking single delete button to function
    ?>

</body>
</html>